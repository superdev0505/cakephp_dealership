<?php
//This Custom worksheet Mapped Author: Abha Sood Negi

$zone = AuthComponent::user('zone');
$dealer = AuthComponent::user('dealer');
$cid = AuthComponent::user('dealer_id');
$d_address = AuthComponent::user('d_address');
$sperson = AuthComponent::user('full_name');
$d_city = AuthComponent::user('d_city');
$d_state = AuthComponent::user('d_state');
$d_zip = AuthComponent::user('d_zip');
$d_phone = AuthComponent::user('d_phone');
$d_fax = AuthComponent::user('d_fax');
$d_email = AuthComponent::user('d_email');
$d_website = AuthComponent::user('d_website');

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
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
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 12px; margin-bottom: 1px;}
		table input[type="text"]{border: 0px;}
		td, th{border-bottom: 1px solid #000; border-left: 1px solid #000; padding: 3px; text-align: center;}
		td{font-size: 13px; padding: 3px;}
		th{font-size: 14px; padding: 3px;}
		table{border-top: 1px solid #000; border-right: 1px solid #000;}
		td:nth-child(2), th:nth-child(2){text-align: left;}
		td:nth-child(3), th:nth-child(3){text-align: right;}
		.title h3{font-size: 14px; font-weight: bold; color: #000; line-height: 18px;}
		.wraper.main input {padding: 1px;}
		@media print {
			.title{background-color: #ddd;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="logo" style="float: left; padding: 5px 0 6px 12px;  width: 12%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/utah_seal_n4195no2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="middel-text" style="float: left; margin: 2% 0 0 7%; text-align: center; width: 60%;">
				<p style="margin: 0; color: #000;">Utah State Tax Commission</p>
				<p style="margin: 0; color: #000;">Division of Motor Vehicles <span>.</span> PO Box 30412 <span>.</span>Salt Lake City, UT 84130 <span>.</span> 801-297-7780 or 1-800-368-8824</p>
				<h2 style="margin: 25px 0 0;">Vehicle Application For Utah Title</h2>
			</div>
			<div class="right" style=" padding: 43px 0 36px; text-align: center; float: right; width: 15%; border-left: 1px solid #000;">
				<h2 style="margin: 0;">TC-656</h2>
				<p style="margin: 0;">Rev. 12/16</p>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<p style="text-align: right; margin: 0;"><i>Get forms at <a href="#" style="color: #000; text-decoration: none;"><strong>tax.utah.gov/forms</strong></a></i></p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; font-size: 14px;">
			<span>
				<input type="checkbox" name="new_checkbox" value="yes" <?php echo (isset($info['new_checkbox'])&&$info['new_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>New</strong>
			</span>
			<span style="margin: 0 20px;">
				<input type="checkbox" name="ownership_checkbox" value="yes" <?php echo (isset($info['ownership_checkbox'])&&$info['ownership_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Change of ownership</strong>
			</span>
			<span>
				<input type="checkbox" name="lienholder_checkbox" value="yes" <?php echo (isset($info['lienholder_checkbox'])&&$info['lienholder_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Change of lienholder</strong>
			</span>
			<span style="margin: 0 20px;">
				<input type="checkbox" name="title_checkbox" value="yes" <?php echo (isset($info['title_checkbox'])&&$info['title_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Corrected title</strong>
			</span>
			<span>
				<input type="checkbox" name="salvage_checkbox" value="yes" <?php echo (isset($info['salvage_checkbox'])&&$info['salvage_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Salvage title</strong>
			</span>
			<span style="margin: 0 20px;">
				<input type="checkbox" name="repairable_checkbox" value="yes" <?php echo (isset($info['repairable_checkbox'])&&$info['repairable_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Non-repairable title</strong>
			</span>
			<span>
				<input type="checkbox" name="dismantling_checkbox" value="yes" <?php echo (isset($info['dismantling_checkbox'])&&$info['dismantling_checkbox']=='yes')?'checked="checked"':''; ?> /> <strong>Dismantling permit</strong>
			</span>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; border-bottom: 1px solid #000; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 1: New Owner Name Information</h3>
				<strong style="float: right;">Relationship to co-owner: <span style="margin: 0 20px;">
				<input type="checkbox" name="and_checkbox" value="yes" <?php echo (isset($info['and_checkbox'])&&$info['and_checkbox']=='yes')?'checked="checked"':''; ?> /> And</span> <span>
				<input type="checkbox" name="or_checkbox" value="yes" <?php echo (isset($info['or_checkbox'])&&$info['or_checkbox']=='yes')?'checked="checked"':''; ?> /> Or</span></strong>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 33%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Primary owner's driver's license no.	(or FEIN, if business)</label>
					<input type="text" name="license_no" value="<?php echo isset($info['license_no']) ? $info['license_no'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 7%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">DL state</label>
					<input type="text" name="dl_state" value="<?php echo isset($info['dl_state']) ? $info['dl_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 13%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Primary owner's DOB</label>
					<input type="text" name="owner_dob" value="<?php echo isset($info['owner_dob']) ? $info['owner_dob'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 30%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Co-owner's driver's license no.	(or FEIN, if business)</label>
					<input type="text" name="co_owner_license" value="<?php echo isset($info['co_owner_license']) ? $info['co_owner_license'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 7%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">DL state</label>
					<input type="text" name="co_owner_dl" value="<?php echo isset($info['co_owner_dl']) ? $info['co_owner_dl'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%;">
					<label style="display: block; padding: 0 3px;">Co-owner's DOB</label>
					<input type="text" name="co_owner_dob" value="<?php echo isset($info['co_owner_dob']) ? $info['co_owner_dob'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Primary owner's name (last, first, middle initial, or business name)</label>
					<input type="text" name="primary_owner_name" value="<?php echo isset($info['primary_owner_name']) ? $info['primary_owner_name'] : $info['first_name']." ".$info['last_name'];; ?>" style="width: 100%; height: 24px;">
				</div>
				<div class="form-filed" style="float: left; width: 47%;">
					<label style="display: block; padding: 0 3px 0; margin: 0;">co-owner's name (if at different Street address, check here <input type="checkbox"> and list on back)</label>
					<input type="text" name="co_owner_name" value="<?php echo isset($info['co_owner_name']) ? $info['co_owner_name'] : ''; ?>" style="width: 100%; padding: 0.3px;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Street address (primary owner)</label>
					<input type="text" name="primary_owner_address" value="<?php echo isset($info['primary_owner_address']) ? $info['primary_owner_address'] : $info['address']; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 23%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%; ">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%; ">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Mailing address, if different from street address (primary owner)</label>
					<input type="text" name="primary_owner_mail" value="<?php echo isset($info['primary_owner_mail']) ? $info['primary_owner_mail'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 23%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="primary_owner_city" value="<?php echo isset($info['primary_owner_city']) ? $info['primary_owner_city'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="primary_owner_state" value="<?php echo isset($info['primary_owner_state']) ? $info['primary_owner_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="primary_owner_zip" value="<?php echo isset($info['primary_owner_zip']) ? $info['primary_owner_zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 2: New Lease Information</h3>
				<strong style="float: right;">Relationship to co-lessee: <span style="margin: 0 20px;">
				<input type="checkbox" name="co_lessee_and_checkbox" value="yes" <?php echo (isset($info['co_lessee_and_checkbox'])&&$info['co_lessee_and_checkbox']=='yes')?'checked="checked"':''; ?> /> And</span> <span><input type="checkbox" name="co_lessee_or_checkbox" value="yes" <?php echo (isset($info['co_lessee_or_checkbox'])&&$info['co_lessee_or_checkbox']=='yes')?'checked="checked"':''; ?> /> Or</span></strong>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 33%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Lessee's owner's driver's license no.	(or FEIN, if business)</label>
					<input type="text" name="lessee_license" value="<?php echo isset($info['lessee_license']) ? $info['lessee_license'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 7%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">DL state</label>
					<input type="text" name="lessee_dl" value="<?php echo isset($info['lessee_dl']) ? $info['lessee_dl'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 13%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Primary owner's DOB</label>
					<input type="text" name="primary_owner_dob" value="<?php echo isset($info['primary_owner_dob']) ? $info['primary_owner_dob'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 30%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Co-owner's driver's license no.	(or FEIN, if business)</label>
					<input type="text" name="co_owner_license_no" value="<?php echo isset($info['co_owner_license_no']) ? $info['co_owner_license_no'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 7%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">DL state</label>
					<input type="text" name="dl" value="<?php echo isset($info['dl']) ? $info['dl'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%;">
					<label style="display: block; padding: 0 3px;">Co-owner's DOB</label>
					<input type="text" name="co_owners_dob" value="<?php echo isset($info['co_owners_dob']) ? $info['co_owners_dob'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Lessee's name (last, first, middle initial, or business name)</label>
					<input type="text" name="lessee_name" value="<?php echo isset($info['lessee_name']) ? $info['lessee_name'] : ''; ?>" style="width: 100%; height: 24px;">
				</div>
				<div class="form-filed" style="float: left; width: 47%;">
					<label style="display: block; padding: 0 3px 0; margin: 0;">Co-lessee's name (if at different Street address, check here <input type="checkbox" name="co_lessee_checkbox" value="yes" <?php echo (isset($info['co_lessee_checkbox'])&&$info['co_lessee_checkbox']=='yes')?'checked="checked"':''; ?> /> and list on back)</label>
					<input type="text" name="co_lessee_name" value="<?php echo isset($info['co_lessee_name']) ? $info['co_lessee_name'] : ''; ?>" style="width: 100%; padding: 0.3px;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Street address (primary owner)</label>
					<input type="text" name="primary_owners_address" value="<?php echo isset($info['primary_owners_address']) ? $info['primary_owners_address'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 23%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="primary_owners_city" value="<?php echo isset($info['primary_owners_city']) ? $info['primary_owners_city'] : ''; ?>" style="width: 100%; ">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="primary_owners_state" value="<?php echo isset($info['primary_owners_state']) ? $info['primary_owners_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="primary_owners_zip" value="<?php echo isset($info['primary_owners_zip']) ? $info['primary_owners_zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%; ">
				<div class="form-filed" style="float: left; width: 53%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Mailing address, if different from street address (primary owner)</label>
					<input type="text" name="primary_owners_mail" value="<?php echo isset($info['primary_owners_mail']) ? $info['primary_owners_mail'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 23%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="primary_mailing_city" value="<?php echo isset($info['primary_mailing_city']) ? $info['primary_mailing_city'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="primary_mailing_state" value="<?php echo isset($info['primary_mailing_state']) ? $info['primary_mailing_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="primary_mailing_zip" value="<?php echo isset($info['primary_mailing_zip']) ? $info['primary_mailing_zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>	
			
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 3: Vehicle Information (Note; Missing or incorrect information may result  in a rejected application.)</h3>
			</div>
			<div class="vehicle-inner" style="float: left; width: 100%;">
				<div class="left" style="width: 35%; float: left;">
					<span style="display: block;">
						<input type="checkbox" name="passanger_truck" value="yes" <?php echo (isset($info['passanger_truck'])&&$info['passanger_truck']=='yes')?'checked="checked"':''; ?> /> Passanger, light truck, van, or utility
					</span>
					<span style="display: block;">
						<input type="checkbox" name="street_motorcycle" value="yes" <?php echo (isset($info['street_motorcycle'])&&$info['street_motorcycle']=='yes')?'checked="checked"':''; ?> /> Street motorcycle
					</span>
					<span style="display: block;">
						<input type="checkbox" name="small_motor" value="yes" <?php echo (isset($info['small_motor'])&&$info['small_motor']=='yes')?'checked="checked"':''; ?> /> Small motor vehicles (CC
						<input type="text" name="cc" value="<?php echo isset($info['cc']) ? $info['cc'] : ''; ?>" style="width: 15%;"> HP
						<input type="text" name="hp" value="<?php echo isset($info['hp']) ? $info['hp'] : ''; ?>" style="width: 15%;">)
					</span>
					<span style="display: block;">
						<input type="checkbox" name="motor_home" value="yes" <?php echo (isset($info['motor_home'])&&$info['motor_home']=='yes')?'checked="checked"':''; ?> /> Motor home (Length:
						<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" style="width: 15%;"> ft.
						<input type="text" name="ft" value="<?php echo isset($info['ft']) ? $info['ft'] : ''; ?>" style="width: 15%;">in.) (Class 
						<input type="text" name="in" value="<?php echo isset($info['in']) ? $info['in'] : ''; ?>" style="width: 15%;">)
					</span>
					<span style="display: block;">
						<input type="checkbox" name="off_highway" value="yes" <?php echo (isset($info['off_highway'])&&$info['off_highway']=='yes')?'checked="checked"':''; ?> /> Off-highway vehicle (check one: 
						<input type="checkbox" name="atv" value="yes" <?php echo (isset($info['atv'])&&$info['atv']=='yes')?'checked="checked"':''; ?> /> ATV 
						<input type="checkbox" name="motorcycle" value="yes" <?php echo (isset($info['motorcycle'])&&$info['motorcycle']=='yes')?'checked="checked"':''; ?> /> Motorcycle)
					</span>
					<span>
						<input type="checkbox" name="street_legal_atv" value="yes" <?php echo (isset($info['street_legal_atv'])&&$info['street_legal_atv']=='yes')?'checked="checked"':''; ?> /> Street-legal ATV
					</span>
					<span style="display: block;">
						<input type="checkbox" name="low_speed_vehicle" value="yes" <?php echo (isset($info['low_speed_vehicle'])&&$info['low_speed_vehicle']=='yes')?'checked="checked"':''; ?> /> Low-speed vehicle
					</span>
					<span style="display: block;">
						<input type="checkbox" name="snowmobile" value="yes" <?php echo (isset($info['snowmobile'])&&$info['snowmobile']=='yes')?'checked="checked"':''; ?> /> Snowmobile
					</span>
					<span style="display: block;">
						<input type="checkbox" name="heavy_truck_checkbox" value="yes" <?php echo (isset($info['heavy_truck_checkbox'])&&$info['heavy_truck_checkbox']=='yes')?'checked="checked"':''; ?> /> Heavy truck (Registered weight) 
						<input type="text" name="heavy_truck" value="<?php echo isset($info['heavy_truck']) ? $info['heavy_truck'] : ''; ?>" style="width: 20%;"> <br> If this is a commercial vehicle with a registered weight of 10,001 lbs. and greather, you must provide your USDOT number: 
						<input type="text" name="usdot_number" value="<?php echo isset($info['usdot_number']) ? $info['usdot_number'] : ''; ?>" style="width: 15%;">
					</span>
				</div>
				
				<!-- rightside start -->
				<div class="right" style="float: right; width: 64%;">
					<div class="cover" style="float: left; width: 100%; ">
						<div class="form-filed" style="float: left; width: 15%; border-left: 1px solid #000; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Year</label>
							<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 35%; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Make</label>
							<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 32%;">
							<label style="display: block; padding: 0 3px;">Model</label>
							<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 17%; border-left: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Farm use? (Y/N)</label>
							<input type="text" name="farm_use" value="<?php echo isset($info['farm_use']) ? $info['farm_use'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="cover" style="float: left; width: 100%; ">
						<div class="form-filed" style="float: left; width: 59.2%; border-left: 1px solid #000; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Vehicle Identification Number (VIN)</label>
							<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 23%; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Cylinders</label>
							<input type="text" name="cylinders" value="<?php echo isset($info['cylinders']) ? $info['cylinders'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 17%;">
							<label style="display: block; padding: 0 3px;">Fuel type</label>
							<input type="text" name="fuel_type" value="<?php echo isset($info['fuel_type']) ? $info['fuel_type'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="cover" style="float: left; width: 100%; ">
						<div class="form-filed" style="float: left; width: 33%; border-left: 1px solid #000; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Color</label>
							<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 33%; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Fleet number</label>
							<input type="text" name="fleet_number" value="<?php echo isset($info['fleet_number']) ? $info['fleet_number'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 33%;">
							<label style="display: block; padding: 0 3px;">Unit Number</label>
							<input type="text" name="unit_number" value="<?php echo isset($info['unit_number']) ? $info['unit_number'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="cover" style="float: left; width: 100%; ">
						<div class="form-filed" style="float: left; width: 50%; border-left: 1px solid #000; border-right: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Body type (trailers)</label>
							<input type="text" name="body_type" value="<?php echo isset($info['body_type']) ? $info['body_type'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-filed" style="float: left; width: 49%;">
							<label style="display: block; padding: 0 3px;">If branded title, brand type</label>
							<input type="text" name="brand_type" value="<?php echo isset($info['brand_type']) ? $info['brand_type'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="cover" style="float: left; width: 100%; ">
						<div class="form-filed" style="float: left; width: 50%; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Manufature's Suggested Retail Price (MSRP)</label>
							$ <input type="text" name="msrp" value="<?php echo isset($info['msrp']) ? $info['msrp'] : ''; ?>" style="width: 94%; border: 0px;">
						</div>
						<div class="form-filed" style="float: left; width: 49%; border-bottom: 1px solid #000;">
							<label style="display: block; padding: 0 3px;">Purchase price</label>
							$<input type="text" name="purchase_price" value="<?php echo isset($info['purchase_price']) ? $info['purchase_price'] : ''; ?>" style="width: 94%; border: 0px;">
						</div>
					</div>
					
					<div class="odeometer" style="float: left; width: 100%;">
						<div class="odo-lft" style="width: 32%; float: left; margin: 5px 0 2px;">
							<strong style="display: block;">Odometer Disclosure</strong>
							<table cellpadding="0" cellspacing="0" width="0" style="margin: 3px 0 0;">
								<tr>
									<td>
										<input type="text" name="odometer1" value="<?php echo isset($info['odometer1']) ? $info['odometer1'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer2" value="<?php echo isset($info['odometer2']) ? $info['odometer2'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer3" value="<?php echo isset($info['odometer3']) ? $info['odometer3'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer4" value="<?php echo isset($info['odometer4']) ? $info['odometer4'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer5" value="<?php echo isset($info['odometer5']) ? $info['odometer5'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer6" value="<?php echo isset($info['odometer6']) ? $info['odometer6'] : ''; ?>" style="width: 100%;">
									</td>
									<td>
										<input type="text" name="odometer7" value="<?php echo isset($info['odometer7']) ? $info['odometer7'] : ''; ?>" style="width: 100%;">
									</td>
								</tr>
							</table>
							<p style="float: left; width: 100%; font-size: 14px; margin: 4px 0 6px;">Enter odometer reading (no tenths)</p>
						</div>
						
						<div class="odo-rgt" style="float: right; width: 65%; margin: 6px 0 0;">
							<i style="display: block;">I certify that the odometer reading (Check one):</i>
							<span style="display: inline-block;">
								<input type="checkbox" name="actual_mileage" value="yes" <?php echo (isset($info['actual_mileage'])&&$info['actual_mileage']=='yes')?'checked="checked"':''; ?> /> Reflects actual mileage for this vehicle
							</span>
							<span style="display: inline-block;">
								<input type="checkbox" name="excess_mileage" value="yes" <?php echo (isset($info['excess_mileage'])&&$info['excess_mileage']=='yes')?'checked="checked"':''; ?> /> Reflects the mileage in excess of odometer's mechanical limits
							</span>
							<span style="display: inline-block;">
								<input type="checkbox" name="odometer_discrepancy" value="yes" <?php echo (isset($info['odometer_discrepancy'])&&$info['odometer_discrepancy']=='yes')?'checked="checked"':''; ?> /> Is not the actual mileage <strong>Warning: Odometer discrepancy</strong>
							</span>
						</div>
					</div>
				</div>
				<!-- right side end -->
				
				<div class="checkbox" style="float: left; width: 100%; margin: 0;">
					<span>
						<input type="checkbox" name="camper" value="yes" <?php echo (isset($info['camper'])&&$info['camper']=='yes')?'checked="checked"':''; ?> /> Camper
					</span>
					<span>
						<input type="checkbox" name="park_model" value="yes" <?php echo (isset($info['park_model'])&&$info['park_model']=='yes')?'checked="checked"':''; ?> /> Park Model
					</span>
					<span>
						<input type="checkbox" name="tent_trailer" value="yes" <?php echo (isset($info['tent_trailer'])&&$info['tent_trailer']=='yes')?'checked="checked"':''; ?> /> Tent trailer
					</span>
					<span>
						<input type="checkbox" name="travel_trailer" value="yes" <?php echo (isset($info['travel_trailer'])&&$info['travel_trailer']=='yes')?'checked="checked"':''; ?> /> Travel trailer
					</span>
					<span>
						<input type="checkbox" name="utility_trailer" value="yes" <?php echo (isset($info['utility_trailer'])&&$info['utility_trailer']=='yes')?'checked="checked"':''; ?> /> Utility trailer
					</span>
					<span>
						<input type="checkbox" name="other_trailer" value="yes" <?php echo (isset($info['other_trailer'])&&$info['other_trailer']=='yes')?'checked="checked"':''; ?> /> Other trailer:
						<input type="text" name="length_trailer" value="<?php echo isset($info['length_trailer']) ? $info['length_trailer'] : ''; ?>" style="width: 11%"> Length of trailer selected: 
						<input type="text" name="ft_trailer" value="<?php echo isset($info['ft_trailer']) ? $info['ft_trailer'] : ''; ?>" style="width: 5%;"> ft.
						<input type="text" name="in_trailer" value="<?php echo isset($info['in_trailer']) ? $info['in_trailer'] : ''; ?>" style="width: 5%;"> in.
					</span>
				</div>
			</div>
			<!-- vehicle inner end -->
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 4: Registration Information</h3>
				<strong style="float: right;">Contribute $2 to: 
					<span style="margin: 0 20px;">
						<input type="checkbox" name="atv_off" value="yes" <?php echo (isset($info['atv_off'])&&$info['atv_off']=='yes')?'checked="checked"':''; ?> /> ATV-Off Highway Fund
					</span> 
					<span>
						<input type="checkbox" name="sight" value="yes" <?php echo (isset($info['sight'])&&$info['sight']=='yes')?'checked="checked"':''; ?> /> Friends For Sight
					</span> 
					<span>
						<input type="checkbox" name="organ_donation" value="yes" <?php echo (isset($info['organ_donation'])&&$info['organ_donation']=='yes')?'checked="checked"':''; ?> /> Organ Donation Support
					</span>
				</strong>
			</div>
			
			<div class="checkbox" style="float: left; width: 100%; margin: 0;">
					<span>
						<input type="checkbox" name="title_only" value="yes" <?php echo (isset($info['title_only'])&&$info['title_only']=='yes')?'checked="checked"':''; ?> /> Title only
					</span>
					<span>
						<input type="checkbox" name="we_trust" value="yes" <?php echo (isset($info['we_trust'])&&$info['we_trust']=='yes')?'checked="checked"':''; ?> /> In God We Trust
					</span>
					<span>
						<input type="checkbox" name="life_elevated_arches" value="yes" <?php echo (isset($info['life_elevated_arches'])&&$info['life_elevated_arches']=='yes')?'checked="checked"':''; ?> /> Life Elevated Arches
					</span>
					<span>
						<input type="checkbox" name="life_elevated_skier" value="yes" <?php echo (isset($info['life_elevated_skier'])&&$info['life_elevated_skier']=='yes')?'checked="checked"':''; ?> /> Life Elevated Skier
					</span>
					<span>
						<input type="checkbox" name="transfer" value="yes" <?php echo (isset($info['transfer'])&&$info['transfer']=='yes')?'checked="checked"':''; ?> /> Transfer: 
						<input type="text" name="text_transfer" value="<?php echo isset($info['text_transfer']) ? $info['text_transfer'] : ''; ?>" style="width: 15%">
					</span>
					<span>
						<input type="checkbox" name="other" value="yes" <?php echo (isset($info['other'])&&$info['other']=='yes')?'checked="checked"':''; ?> /> Other
						<input type="text" name="text_other" value="<?php echo isset($info['text_other']) ? $info['text_other'] : ''; ?>" style="width: 15%"> 
					</span>
			</div>
			
			<div class="cover" style="float: left; width: 100%; border-top: 1px solid #000; margin-top: 3px;">
				<div class="form-filed" style="float: left; width: 50.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Situs/Physical address of vehicle, if different  form Street address above</label>
					<input type="text" name="physical_address" value="<?php echo isset($info['physical_address']) ? $info['physical_address'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 25%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="physical_city" value="<?php echo isset($info['physical_city']) ? $info['physical_city'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="physical_state" value="<?php echo isset($info['physical_state']) ? $info['physical_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="physical_zip" value="<?php echo isset($info['physical_zip']) ? $info['physical_zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 5: Lien Holder Information</h3>
			</div>
			
			<div class="cover" style="float: left; width: 100%; border-top: 1px solid #000;">
				<div class="form-filed" style="float: left; width: 50.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Lien holder name</label>
					<input type="text" name="lien_holder_name" value="<?php echo isset($info['lien_holder_name']) ? $info['lien_holder_name'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 25%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">FEIN (or driver's license no., if individual)</label>
					<input type="text" name="fein" value="<?php echo isset($info['fein']) ? $info['fein'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 24.3%;">
					<label style="display: block; padding: 0 3px;">Branch number</label>
					<input type="text" name="branch_name" value="<?php echo isset($info['branch_name']) ? $info['branch_name'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 50.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Mailing address</label>
					<input type="text" name="mailing_address" value="<?php echo isset($info['mailing_address']) ? $info['mailing_address'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 25%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">City</label>
					<input type="text" name="mailing_city" value="<?php echo isset($info['mailing_city']) ? $info['mailing_city'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">State</label>
					<input type="text" name="mailing_state" value="<?php echo isset($info['mailing_state']) ? $info['mailing_state'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Zip Code</label>
					<input type="text" name="mailing_zip" value="<?php echo isset($info['mailing_zip']) ? $info['mailing_zip'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 6: Owner Signature($)</h3>
			</div>
			
			<p style="margin: 0;"><i>I declare that I am the owner of the vehicle described on this application and all the above information is accurate and true. I certify that I will maintain in effect owner's or operator's security (insurance) for this vehicle, as requiired by law, in order to operate this vehicle on a highway, quasi-public road, or parking area within this state.</i></p>
			
			<div class="cover" style="float: left; width: 100%; border-top: 1px solid #000; border-bottom: 1px solid #000;">
				<div class="form-filed" style="float: left; width: 35.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Owner's signature</label>
					X<input type="text" name="owner_x" value="<?php echo isset($info['owner_x']) ? $info['owner_x'] : ''; ?>" style="width: 96%; border: 0px;">
				</div>
				<div class="form-filed" style="float: left; width: 15%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Date </label>
					<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 100%; border: 0px;">
				</div>
				<div class="form-filed" style="float: left; width: 35.1%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Co-owner's signature</label>
					X<input type="text" name="co_owner_x" value="<?php echo isset($info['co_owner_x']) ? $info['co_owner_x'] : ''; ?>" style="width: 96%; border: 0px">
				</div>
				<div class="form-filed" style="float: left; width: 14%;">
					<label style="display: block; padding: 0 3px;">Date</label>
					<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="width: 100%; border: 0;">
				</div>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			<div class="title" style="background-color: #ddd; width: 100%; float: left; box-sizing: border-box; padding: 2px 4px;">
				<h3 style="margin: 0; float: left;">Section 7: Purchase and Dealer Information (For Utah Dealership Use Only)</h3>
			</div>
			
			<p><i>I Certify that the vehicle is accurately described on this application and has been delivered to the purchaser named above and that this dealership is in compliance with the licensing requirements set forth in Title 41, Chapter 3, Part 2 of the Utah Code. I also certify that thi transaction was completed in comliance with the sales tax reporying requirements set forth in Section 59-12-107 of the Utah Code.</i></p>
			
			<div class="cover" style="float: left; width: 100%; border-top: 1px solid #000;">
				<div class="form-filed" style="float: left; width: 50.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Purchase date</label>
					<input type="text" name="purchase_date" value="<?php echo isset($info['purchase_date']) ? $info['purchase_date'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 33%;">
					<label style="display: block; padding: 0 3px;">Dealer number</label>
					<input type="text" name="dealer_number" value="<?php echo isset($info['dealer_number']) ? $info['dealer_number'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="border-bottom: 1px solid #000; float: left; height: 39px; padding-top: 9px; width: 16.5%;">
					<span>
						<input type="checkbox" name="checkbox_new" value="yes" <?php echo (isset($info['checkbox_new'])&&$info['checkbox_new']=='yes')?'checked="checked"':''; ?> /> New
					</span>
					<span style="margin: 30px 20px;">
						<input type="checkbox" name="checkbox_used" value="yes" <?php echo (isset($info['checkbox_used'])&&$info['checkbox_used']=='yes')?'checked="checked"':''; ?> /> Used
					</span>
				</div>
			</div>
			
			<div class="cover" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 35.2%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Permit number</label>
					<input type="text" name="permit_number" value="<?php echo isset($info['permit_number']) ? $info['permit_number'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 15%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Permit issue date</label>
					<input type="text" name="permit_date" value="<?php echo isset($info['permit_date']) ? $info['permit_date'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-filed" style="float: left; width: 34%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 3px;">Dealer/Authorized representative's signature</label>
					<input type="text" name="dealer_sign" value="<?php echo isset($info['dealer_sign']) ? $info['dealer_sign'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-filed" style="float: left; width: 15%;">
					<label style="display: block; padding: 0 3px;">Date</label>
					<input type="text" name="dealer_date" value="<?php echo isset($info['dealer_date']) ? $info['dealer_date'] : ''; ?>" style="width: 100%;">
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
			$(".date_input_field").bdatepicker();
			
			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>