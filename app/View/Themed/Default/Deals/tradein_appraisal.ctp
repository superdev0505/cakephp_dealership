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

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 0px; border-bottom: 0px solid #000;}
	th{padding: 0px;}
	td:first-child{border-left: 0px solid #000;}
	td{border-right: 0px solid #000;}
	/*table input[type="text"]{border: 0px;}*/
	th, td{text-align: left; padding: 0px;}
	
	
	
@media print {
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%;margin: 3px 0; font-size: 25px; text-align: center; font-weight: 800;">PHARR I R.V.'s Inc.</h2>
		<h3 style="float: left; width: 100%;margin: 3px 0; font-size: 19px; text-align: center; font-weight: 800;">TRADE IN VALUE SHEET</h3>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 70%; float: left;">
				<label>Name:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 70%; float: left;">
				<label>Email:</label>
				<input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : $info['email']?>" style="width: 91%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>City/State:</label>
				<input type="text" name="city_state" value="<?php echo isset($info["city_state"]) ? $info['city_state'] : $info['city'].' '.$info['state'];?>" style="width: 77%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 33%; float: left;">
				<label>His Phone:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="width: 34%; float: left;">
				<label>Her Phone:</label>
				<input type="text" name="her_phone" value="<?php echo isset($info['her_phone'])?$info['her_phone']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>Salesman:</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 78.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 70%; float: left;">
				<label>Unit Interested In:</label>
				<input type="text" name="unit_interest" value="<?php echo isset($info['unit_interest'])?$info['unit_interest']: $info['year'].' '.$info['make'].' '.$info['model']; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>RV Type:</label>
				<input type="text" name="rv_type" value="<?php echo isset($info['rv_type'])?$info['rv_type']:''; ?>" style="width: 79%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 20%; float: left;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="width: 55%; float: left;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="width: 25%; float: left;">
				<label>Miles:</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 45%; float: left;">
				<label>Lien Holder:</label>
				<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder'])?$info['lien_holder']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="width: 27%; float: left;">
				<label>Payoff:</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="width: 28%; float: left;">
				<label>Payments:</label>
				<input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 74.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 34%; float: left;">
				<label>Engine/Size:</label>
				<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 73%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>Chassis:</label>
				<input type="text" name="chassis" value="<?php echo isset($info['chassis'])?$info['chassis']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>Last Service:</label>
				<input type="text" name="last_service" value="<?php echo isset($info['last_service'])?$info['last_service']:''; ?>" style="width: 74%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 34%; float: left;">
				<label>Batteries Good?</label>
				<label style="margin: 0 4%;"><input type="radio" name="batteries_status" value="yes" <?php echo (isset($info['batteries_status'])&&$info['batteries_status']=='yes')?'checked="checked"':''; ?> /> Yes</label> 
				<label><input type="radio" name="batteries_status" value="no" <?php echo (isset($info['batteries_status'])&&$info['batteries_status']=='no')?'checked="checked"':''; ?> /> No</label> 
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>Age?</label>
				<input type="text" name="age" value="<?php echo isset($info['age'])?$info['age']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>Tires/Age/Matching?</label>
				<label style="margin: 0 4%;"><input type="radio" name="tires_status" value="yes" <?php echo (isset($info['tires_status'])&&$info['tires_status']=='yes')?'checked="checked"':''; ?> /> Yes</label> 
				<label><input type="radio" name="tires_status" value="no" <?php echo (isset($info['tires_status'])&&$info['tires_status']=='no')?'checked="checked"':''; ?> /> No</label>
				<input type="text" name="tires" value="<?php echo isset($info['tires'])?$info['tires']:''; ?>" style="width: 27%;">
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%;" style="float: left; width: 100%; margin: 16px 0 7px;">
			<tr>
				<td style="width: 20%">Condition:</td>
				<td style="width: 20%; text-align: center;">Excellent</td>
				<td style="width: 20%; text-align: center;">Clean</td>
				<td style="width: 20%; text-align: center;">Avg.</td>
				<td style="width: 20%; text-align: center;">Poor</td>
			</tr>
			
			<tr>
				<td>Tires:</td>
				<td><input type="text" name="excellent1" value="<?php echo isset($info['excellent1'])?$info['excellent1']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="clean1" value="<?php echo isset($info['clean1'])?$info['clean1']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="age1" value="<?php echo isset($info['age1'])?$info['age1']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="poor1" value="<?php echo isset($info['poor1'])?$info['poor1']:''; ?>" style="width: 98%;"></td>
			</tr>
			
			<tr>
				<td>Carpeting/Flooring:</td>
				<td><input type="text" name="excellent2" value="<?php echo isset($info['excellent2'])?$info['excellent2']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="clean2" value="<?php echo isset($info['clean2'])?$info['clean2']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="age2" value="<?php echo isset($info['age2'])?$info['age2']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="poor2" value="<?php echo isset($info['poor2'])?$info['poor2']:''; ?>" style="width: 98%;"></td>
			</tr>
			
			<tr>
				<td>Batteries:</td>
				<td><input type="text" name="excellent3" value="<?php echo isset($info['excellent3'])?$info['excellent3']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="clean3" value="<?php echo isset($info['clean3'])?$info['clean3']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="age3" value="<?php echo isset($info['age3'])?$info['age3']:''; ?>" style="width: 96%;"></td>
				<td><input type="text" name="poor3" value="<?php echo isset($info['poor3'])?$info['poor3']:''; ?>" style="width: 98%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 25%; float: left;">
				<label>Interior Color:</label>
				<input type="text" name="interior_color" value="<?php echo isset($info['interior_color'])?$info['interior_color']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 20%; float: left;">
				<label>Wood/Color:</label>
				<input type="text" name="wood" value="<?php echo isset($info['wood'])?$info['wood']:''; ?>" style="width: 56%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>Has RV Been Lived In?</label>
				<label style="margin: 0 4%;"><input type="radio" name="lived_status" value="yes" <?php echo (isset($info['lived_status'])&&$info['lived_status']=='yes')?'checked="checked"':''; ?> /> Yes</label> 
				<label><input type="radio" name="lived_status" value="no" <?php echo (isset($info['lived_status'])&&$info['lived_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
			<div class="form-field" style="width: 25%; float: left;">
				<label>Ownership Period:</label>
				<input type="text" name="owner_period" value="<?php echo isset($info['owner_period'])?$info['owner_period']:''; ?>" style="width: 52%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 40%; float: left;">
				<label>Does Trade Have a Service Contract?:</label>
				<label style="margin: 0 4%;"><input type="radio" name="service_status" value="yes" <?php echo (isset($info['service_status'])&&$info['service_status']=='yes')?'checked="checked"':''; ?> /> Yes</label>/ 
				<label><input type="radio" name="service_status" value="no" <?php echo (isset($info['service_status'])&&$info['service_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>Fema Trailer:</label>
				<label style="margin: 0 4%;"><input type="radio" name="fema_status" value="yes" <?php echo (isset($info['fema_status'])&&$info['fema_status']=='yes')?'checked="checked"':''; ?> /> Yes</label>/ 
				<label><input type="radio" name="fema_status" value="no" <?php echo (isset($info['fema_status'])&&$info['fema_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>Insurance Clamis?:</label>
				<label style="margin: 0 4%;"><input type="radio" name="clamis_status" value="yes" <?php echo (isset($info['clamis_status'])&&$info['clamis_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="clamis_status" value="no" <?php echo (isset($info['clamis_status'])&&$info['clamis_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 100%; float: left;">
				<label>What Needs To Be Fixed?</label>
				<input type="text" name="fixed" value="<?php echo isset($info['fixed'])?$info['fixed']:''; ?>" style="width: 83.3%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 50%; float: left;">
				<label>Does Unit Have Salvaged Or Reconditioned Title?</label>
				<label style="margin: 0 4%;"><input type="radio" name="salvaged_status" value="yes" <?php echo (isset($info['salvaged_status'])&&$info['salvaged_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="salvaged_status" value="no" <?php echo (isset($info['salvaged_status'])&&$info['salvaged_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>Bonded Title:</label>
				<label style="margin: 0 4%;"><input type="radio" name="bonded_status" value="yes" <?php echo (isset($info['bonded_status'])&&$info['bonded_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="bonded_status" value="no" <?php echo (isset($info['bonded_status'])&&$info['bonded_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 25%; float: left;">
				<label>Unit Been Smoked In?</label>
				<label><input type="radio" name="smoked_status" value="yes" <?php echo (isset($info['smoked_status'])&&$info['smoked_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="smoked_status" value="no" <?php echo (isset($info['smoked_status'])&&$info['smoked_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="width: 13%; float: left;">
				<label>Pets?</label>
				<label><input type="radio" name="pet_status" value="yes" <?php echo (isset($info['pet_status'])&&$info['pet_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="pet_status" value="no" <?php echo (isset($info['pet_status'])&&$info['pet_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="width: 18%; float: left;">
				<label>Hail Damage</label>
				<label><input type="radio" name="damage_status" value="yes" <?php echo (isset($info['damage_status'])&&$info['damage_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="damage_status" value="no" <?php echo (isset($info['damage_status'])&&$info['damage_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="width: 21%; float: left;">
				<label>Blowout Damage:</label>
				<label><input type="radio" name="blowout_status" value="yes" <?php echo (isset($info['blowout_status'])&&$info['blowout_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="blowout_status" value="no" <?php echo (isset($info['blowout_status'])&&$info['blowout_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="width: 23%; float: left;">
				<label>Leaks/Water Damage:</label>
				<label><input type="radio" name="leak_status" value="yes" <?php echo (isset($info['leak_status'])&&$info['leak_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/ 
				<label><input type="radio" name="leak_status" value="no" <?php echo (isset($info['leak_status'])&&$info['leak_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 4px;">
			<div class="left" style="float: left; width: 48%;">
				<table>
					<tr>
						<td style="width: 50%;">&nbsp;</td>
						<td style="width: 20%;padding-left: 23px;">O.K.</td>
						<td style="width: 30%;padding-left: 10px;">Needs Repair/Type</td>
					</tr>
					
					<tr>
						<td>Pilot/Copilot Seats</td>
						<td><input type="text" name="pilot_ok" value="<?php echo isset($info['pilot_ok'])?$info['pilot_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="pilot_type" value="<?php echo isset($info['pilot_type'])?$info['pilot_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Sofa/Chair(S)</td>
						<td><input type="text" name="sofa_ok" value="<?php echo isset($info['sofa_ok'])?$info['sofa_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="sofa_type" value="<?php echo isset($info['sofa_type'])?$info['sofa_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Dinette</td>
						<td><input type="text" name="dinett_ok" value="<?php echo isset($info['dinett_ok'])?$info['dinett_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="dinett_type" value="<?php echo isset($info['dinett_type'])?$info['dinett_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Cabinet(S)</td>
						<td><input type="text" name="cabinet_ok" value="<?php echo isset($info['cabinet_ok'])?$info['cabinet_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="cabinet_type" value="<?php echo isset($info['cabinet_type'])?$info['cabinet_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Refrigerator</td>
						<td><input type="text" name="refreiger_ok" value="<?php echo isset($info['refreiger_ok'])?$info['refreiger_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="refreiger_type" value="<?php echo isset($info['refreiger_type'])?$info['refreiger_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Icemaker</td>
						<td><input type="text" name="icemaker_ok" value="<?php echo isset($info['icemaker_ok'])?$info['icemaker_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="icemaker_type" value="<?php echo isset($info['icemaker_type'])?$info['icemaker_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Stove/Oven</td>
						<td><input type="text" name="stove_ok" value="<?php echo isset($info['stove_ok'])?$info['stove_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="stove_type" value="<?php echo isset($info['stove_type'])?$info['stove_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Headliner</td>
						<td><input type="text" name="headliner_ok" value="<?php echo isset($info['headliner_ok'])?$info['headliner_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="headliner_type" value="<?php echo isset($info['headliner_type'])?$info['headliner_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Exterior Decals</td>
						<td><input type="text" name="exterior_ok" value="<?php echo isset($info['exterior_ok'])?$info['exterior_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="exterior_type" value="<?php echo isset($info['exterior_type'])?$info['exterior_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Delamination</td>
						<td><input type="text" name="delam_ok" value="<?php echo isset($info['delam_ok'])?$info['delam_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="delam_type" value="<?php echo isset($info['delam_type'])?$info['delam_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Exterior Decals</td>
						<td><input type="text" name="decals_ok" value="<?php echo isset($info['decals_ok'])?$info['decals_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="decals_type" value="<?php echo isset($info['decals_type'])?$info['decals_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Windshield 1pc/2pc</td>
						<td><input type="text" name="wind_ok" value="<?php echo isset($info['wind_ok'])?$info['wind_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="wind_type" value="<?php echo isset($info['wind_type'])?$info['wind_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Aluminum Wheels</td>
						<td><input type="text" name="aluminum_ok" value="<?php echo isset($info['aluminum_ok'])?$info['aluminum_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="aluminum_type" value="<?php echo isset($info['aluminum_type'])?$info['aluminum_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Auto Level</td>
						<td><input type="text" name="auto_ok" value="<?php echo isset($info['auto_ok'])?$info['auto_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="auto_type" value="<?php echo isset($info['auto_type'])?$info['auto_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Cameras</td>
						<td><input type="text" name="cameras_ok" value="<?php echo isset($info['cameras_ok'])?$info['cameras_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="cameras_type" value="<?php echo isset($info['cameras_type'])?$info['cameras_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Number of TVs</td>
						<td><input type="text" name="tv_ok" value="<?php echo isset($info['tv_ok'])?$info['tv_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="tv_type" value="<?php echo isset($info['tv_type'])?$info['tv_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Stereo System</td>
						<td><input type="text" name="stereo_ok" value="<?php echo isset($info['stereo_ok'])?$info['stereo_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="stereo_type" value="<?php echo isset($info['stereo_type'])?$info['stereo_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Washer/Dryer</td>
						<td><input type="text" name="washer_ok" value="<?php echo isset($info['washer_ok'])?$info['washer_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="washer_type" value="<?php echo isset($info['washer_type'])?$info['washer_type']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: right; width: 48%;">
				<table>
					<tr>
						<td>&nbsp;</td>
						<td style="padding-left: 30px;">O.K.</td>
						<td style="padding-left: 5px;">Needs Repair/Type</td>
					</tr>
					
					<tr>
						<td>Heating System</td>
						<td><input type="text" name="heating_ok" value="<?php echo isset($info['heating_ok'])?$info['heating_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="heating_type" value="<?php echo isset($info['heating_type'])?$info['heating_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Shades</td>
						<td><input type="text" name="shades_ok" value="<?php echo isset($info['shades_ok'])?$info['shades_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="shades_type" value="<?php echo isset($info['shades_type'])?$info['shades_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Enclosed Underbelly</td>
						<td><input type="text" name="name" style="width: 75%;"></td>
						<td><input type="text" name="name" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Awning: Manual/Power</td>
						<td><input type="text" name="awning_ok" value="<?php echo isset($info['awning_ok'])?$info['awning_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="awning_type" value="<?php echo isset($info['awning_type'])?$info['awning_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Satellite Dish/Type</td>
						<td><input type="text" name="satellite_ok" value="<?php echo isset($info['satellite_ok'])?$info['satellite_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="satellite_type" value="<?php echo isset($info['satellite_type'])?$info['satellite_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Owners Manuals</td>
						<td><input type="text" name="owners_ok" value="<?php echo isset($info['owners_ok'])?$info['owners_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="owners_type" value="<?php echo isset($info['owners_type'])?$info['owners_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Remote Controls</td>
						<td><input type="text" name="remote_ok" value="<?php echo isset($info['remote_ok'])?$info['remote_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="remote_type" value="<?php echo isset($info['remote_type'])?$info['remote_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>CD/DVD/Blu-ray</td>
						<td><input type="text" name="cd_ok" value="<?php echo isset($info['cd_ok'])?$info['cd_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="cd_type" value="<?php echo isset($info['cd_type'])?$info['cd_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Roof Air/No. <input type="text" name="roof" value="<?php echo isset($info['roof'])?$info['roof']:''; ?>" style="width: 20%;"></td>
						<td><input type="text" name="roof_ok" value="<?php echo isset($info['roof_ok'])?$info['roof_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="roof_type" value="<?php echo isset($info['roof_type'])?$info['roof_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Dash Air</td>
						<td><input type="text" name="dash_ok" value="<?php echo isset($info['dash_ok'])?$info['dash_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="dash_type" value="<?php echo isset($info['dash_type'])?$info['dash_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Cruise Control</td>
						<td><input type="text" name="cruise_ok" value="<?php echo isset($info['cruise_ok'])?$info['cruise_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="cruise_type" value="<?php echo isset($info['cruise_type'])?$info['cruise_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Microwave</td>
						<td><input type="text" name="micro_ok" value="<?php echo isset($info['micro_ok'])?$info['micro_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="micro_type" value="<?php echo isset($info['micro_type'])?$info['micro_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Spare</td>
						<td><input type="text" name="spare_ok" value="<?php echo isset($info['spare_ok'])?$info['spare_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="spare_type" value="<?php echo isset($info['spare_type'])?$info['spare_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Roof Rack/Ladder</td>
						<td><input type="text" name="rack_ok" value="<?php echo isset($info['rack_ok'])?$info['rack_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="rack_type" value="<?php echo isset($info['rack_type'])?$info['rack_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Dual Pane Windows</td>
						<td><input type="text" name="dual_ok" value="<?php echo isset($info['dual_ok'])?$info['dual_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="dual_type" value="<?php echo isset($info['dual_type'])?$info['dual_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Slide Outs</td>
						<td><input type="text" name="slide_ok" value="<?php echo isset($info['slide_ok'])?$info['slide_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="slide_type" value="<?php echo isset($info['slide_type'])?$info['slide_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Hitch</td>
						<td><input type="text" name="hitch_ok" value="<?php echo isset($info['hitch_ok'])?$info['hitch_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="hitch_type" value="<?php echo isset($info['hitch_type'])?$info['hitch_type']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Central Vacuum</td>
						<td><input type="text" name="central_ok" value="<?php echo isset($info['central_ok'])?$info['central_ok']:''; ?>" style="width: 75%;"></td>
						<td><input type="text" name="central_type" value="<?php echo isset($info['central_type'])?$info['central_type']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<p style="float: left; width: 100%; font-size: 14px; margin: 3px 0;">Generator/hrs<input type="text" name="generator" value="<?php echo isset($info['generator'])?$info['generator']:''; ?>" style="width: 7%;"> Size <input type="text" name="size" value="<?php echo isset($info['size'])?$info['size']:''; ?>" style="width: 7%;"> <input type="text" name="general_size" value="<?php echo isset($info['general_size'])?$info['general_size']:''; ?>" style="width: 28%;"></p>
			
			<p style="float: left; width: 100%; font-size: 14px; margin: 10px 0 4px;">Comment/Clarification of Above or Additional Equipment: <input type="text" name="comment1" value="<?php echo isset($info['comment1'])?$info['comment1']:''; ?>" style="float: right; width: 62%;">
				<input type="text" name="comment2" value="<?php echo isset($info['comment2'])?$info['comment2']:''; ?>" style="float: right; width: 100%; margin: 7px 0;">
				<input type="text" name="comment3" value="<?php echo isset($info['comment3'])?$info['comment3']:''; ?>" style="float: right; width: 100%; margin: 7px 0;">
			</p>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Signature: X</label>
					<input type="text" name="sign_X" value="<?php echo isset($info['sign_X'])?$info['sign_X']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Unit will be inspected upon arrival and value adjusted if necessary.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px; font-weight: bold; text-align: center; padding: 3px 0;"><b>INTERNAL USE ONLY</b><p>
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
					<label>Who Inspected Trade:</label>
					<input type="text" name="inspect_trade" value="<?php echo isset($info['inspect_trade'])?$info['inspect_trade']:''; ?>" style="width: 100%; border: 0px;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
					<label style="display: block;">NADA</label>
					<label>W/S</label><input type="text" name="nada_ws" value="<?php echo isset($info['nada_ws'])?$info['nada_ws']:''; ?>" style="width: 40%;">
					<label>Retail</label><input type="text" name="nada_retail" value="<?php echo isset($info['nada_retail'])?$info['nada_retail']:''; ?>" style="width: 40%;">
				</div>
				<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 3px;">
					<label style="display: block;">Black Book:</label>
					<label>W/S</label><input type="text" name="black_book" value="<?php echo isset($info['black_book'])?$info['black_book']:''; ?>" style="width: 27%;">
					<label>Avg</label><input type="text" name="black_avg" value="<?php echo isset($info['black_avg'])?$info['black_avg']:''; ?>" style="width: 27%;">
					<label>Retail</label><input type="text" name="black_retail" value="<?php echo isset($info['black_retail'])?$info['black_retail']:''; ?>" style="width: 26.6%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
					<label>ACV:</label>
					<input type="text" name="acv" value="<?php echo isset($info['acv'])?$info['acv']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
					<label>SP:</label>
					<input type="text" name="sp" value="<?php echo isset($info['sp'])?$info['sp']:''; ?>" style="width: 90%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
				<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
					<label>BY:</label>
					<input type="text" name="by" value="<?php echo isset($info['by'])?$info['by']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
					<label>RP:</label>
					<input type="text" name="rp" value="<?php echo isset($info['rp'])?$info['rp']:''; ?>" style="width: 90%;">
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
