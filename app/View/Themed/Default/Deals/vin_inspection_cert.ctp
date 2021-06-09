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
    <input type="hidden" name="vin_addon1" id="vin_addon1" value="<?php echo isset($info['vin_addon1'])?$info['vin_addon1']:$info['vin_addon1']; ?>">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	
@media print {
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	.bg{background-color: blue !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="float: left; width: 15%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 60%; margin-right: 4%; text-align: center;">
				<h3 style="float: left; width: 100%; margin: 3px 0; font-size: 20px;">Vehicle Identification Number Inspection Certification</h3>
				<p style="float: left; width: 100%; margin: 3px 0;">Idaho Transportation Department</p>
			</div>
			<div class="right" style="float: right; width: 20%; text-align: right;">
				<p style="float: left; width: 100%; margin: 0; font-size: 14px; margin: 3px 0;"> ITD 3403 (Rev. 08-16)</p>
				<p style="float: left; width: 100%; margin: 0; font-size: 14px;"> Supply # 019580380</p>
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; font-size: 15px; text-align: center; margin: 4px 0 0;"><b>Complete all sections related to Vehicle <span style="font-size: 12px;">.</span> Do not use codes from any title <span style="font-size: 12px;">.</span> Spell out makes and models</b></p>
		
		<p style="float: left; width: 100%; text-align: center; font-size: 15px; text-align: center; margin: 3px 0 7px;">This form must be filled out by a law enforcement officer or an authorized agent of the Idaho Transportation Department (ITD) <span style="text-decoration: underline;">directly from the vehicle without the use of other documentation.</span> <span style="margin: 0 0 0 0"> <b>Note:</b> This form is not an ownership document.</span></p>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px 2px 0; border-right: 1px solid #000;">
				<label style="display: block;">I<sup>st</sup> Vehicle (VIN) Identification Number - (VINs typically have 17 numbers)</label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="vin16" id="vin16" value="<?php echo isset($info['vin16']) ? $info['vin16'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
			</div>
			
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 2px 0;">
				<label><input type="radio" name="vin_check" <?php echo (isset($info['vin_check']) && $info['vin_check']=='vin_des')?'checked="checked"':''; ?> value="vin_des"> VIN Discrepancy (Explain)</label>
				<input type="text" name="vin_des1" value="<?php echo isset($info['vin_des1']) ? $info['vin_des1'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 2px 2px 0; border-right: 1px solid #000;">
				<label style="display: block;">2<sup>nd</sup> Vehicle (VIN) Identification Number - (VINs typically have 17 numbers)</label>
				<input type="text" name="addon1_vin0" id="addon1_vin0" value="<?php echo isset($info['addon1_vin0']) ? $info['addon1_vin0'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin1" id="addon1_vin1" value="<?php echo isset($info['addon1_vin1']) ? $info['addon1_vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin2" id="addon1_vin2" value="<?php echo isset($info['addon1_vin2']) ? $info['addon1_vin2'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin3" id="addon1_vin3" value="<?php echo isset($info['addon1_vin3']) ? $info['addon1_vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin4" id="addon1_vin4" value="<?php echo isset($info['addon1_vin4']) ? $info['addon1_vin4'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin5" id="addon1_vin5" value="<?php echo isset($info['addon1_vin5']) ? $info['addon1_vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin6" id="addon1_vin6" value="<?php echo isset($info['addon1_vin6']) ? $info['addon1_vin6'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin7" id="addon1_vin7" value="<?php echo isset($info['addon1_vin7']) ? $info['addon1_vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin8" id="addon1_vin8" value="<?php echo isset($info['addon1_vin8']) ? $info['addon1_vin8'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin9" id="addon1_vin9" value="<?php echo isset($info['addon1_vin9']) ? $info['addon1_vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin10" id="addon1_vin10" value="<?php echo isset($info['addon1_vin10']) ? $info['addon1_vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin11" id="addon1_vin11" value="<?php echo isset($info['addon1_vin11']) ? $info['addon1_vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin12" id="addon1_vin12" value="<?php echo isset($info['addon1_vin12']) ? $info['addon1_vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin13" id="addon1_vin13" value="<?php echo isset($info['addon1_vin13']) ? $info['addon1_vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin14" id="addon1_vin14" value="<?php echo isset($info['addon1_vin14']) ? $info['addon1_vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin15" id="addon1_vin15" value="<?php echo isset($info['addon1_vin15']) ? $info['addon1_vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
				<input type="text" name="addon1_vin16" id="addon1_vin16" value="<?php echo isset($info['addon1_vin16']) ? $info['addon1_vin16'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; border-bottom: 0px;">
			</div>
			
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 2px 2px 0;">
				<input type="text" name="vin_des2" value="<?php echo isset($info['vin_des2']) ? $info['vin_des2'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
				<input type="text" name="vin_des3" value="<?php echo isset($info['vin_des3']) ? $info['vin_des3'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
				<label style="display: block; text-align: center;"><b>VIN <br> Location</b></label> 
			</div>
			
			<div class="form-field" style="float: left; width: 85%; box-sizing: border-box; padding: 7px 2px 0;">
				<label><input type="radio" name="vin_location" <?php echo (isset($info['vin_location']) && $info['vin_location']=='dash')?'checked="checked"':''; ?> value="dash"> Dash</label>
				<label style="margin: 0 3%;"><input type="radio" name="vin_location" <?php echo (isset($info['vin_location']) && $info['vin_location']=='door')?'checked="checked"':''; ?> value="door"> Door</label>
				<label><input type="radio" name="vin_location" <?php echo (isset($info['vin_location']) && $info['vin_location']=='headstock')?'checked="checked"':''; ?> value="headstock"> Headstock</label>
				<label style="margin: 0 3%;"><input type="radio" name="vin_location" <?php echo (isset($info['vin_location']) && $info['vin_location']=='trailer')?'checked="checked"':''; ?> value="trailer"> Trailer Tongue L - R 	</label>
				<label><input type="radio" name="vin_location" <?php echo (isset($info['vin_location']) && $info['vin_location']=='other')?'checked="checked"':''; ?> value="other"> Other (Describe)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000;">
				<label style="display: block; text-align: center; padding: 10% 0 15%;"><b>Type <br>of Vehicle</b></label> 
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='auto')?'checked="checked"':''; ?> value="auto"> Auto/PU/Van</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='motorcycle')?'checked="checked"':''; ?> value="motorcycle"> Motorcycle</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='snowmobile')?'checked="checked"':''; ?> value="snowmobile"> Snowmobile</label>
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='truck')?'checked="checked"':''; ?> value="truck"> TRUCK</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='rv')?'checked="checked"':''; ?> value="rv"> RV</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='atv')?'checked="checked"':''; ?> value="atv"> ATV</label>
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='trailer')?'checked="checked"':''; ?> value="trailer">  Trailer</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='mobile')?'checked="checked"':''; ?> value="mobile"> Mobile Home</label>
				<label style="display: block;"><input type="radio" name="type_vehicle" <?php echo (isset($info['type_vehicle']) && $info['type_vehicle']=='utv')?'checked="checked"':''; ?> value="utv"> UTV</label>
			</div>
			
			<div class="right-side" style="float: left; width: 51%;">
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 40%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						OHV Engine Size <input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> cc
					</div>
					
					<div class="form-field" style="width: 60%; float: left; box-sizing: border-box; padding: 2px; font-size: 14px;">
						Motorcycle FMVSS Sticker <label><input type="radio" name="motorcycle" <?php echo (isset($info['motorcycle']) && $info['motorcycle']=='yes')?'checked="checked"':''; ?> value="yes"> Yes</label> <label><input type="radio" name="motorcycle" <?php echo (isset($info['motorcycle']) && $info['motorcycle']=='no')?'checked="checked"':''; ?> value="no"> No</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 60%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
						<label style="font-size: 12px;">Wheelbase on ATV or UTV (See back/bottom of form)</label>
						<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="width: 40%; float: left; box-sizing: border-box; padding: 2px; font-size: 14px;">
						<label style="font-size: 12px;">Number of Wheels on ATV or UTV</label>
						<input type="text" name="wheel" value="<?php echo isset($info['wheel']) ? $info['wheel'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 12%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">	
					<label style="font-size: 12px;">Model Year</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
				</div>
					
				<div class="form-field" style="width: 22%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Make</label>
					<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 22%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Body Type</label>
					<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 22%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Model</label>
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 22%; float: left; box-sizing: border-box; padding: 2px;">
					<label style="font-size: 12px;">Color</label>
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 25%; float: left; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">	
					<label style="font-size: 12px;">Length(trailers)</label>
					<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" style="width: 100%;">
				</div>
					
				<div class="form-field" style="width: 25%; float: left; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Width(trailers, ATVs, UTVs)</label>
					<input type="text" name="width" value="<?php echo isset($info['width']) ? $info['width'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 33%; float: left; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Weight(Utility and boat trailers, ATVs, UTVs)</label>
					<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 15%; float: left; box-sizing: border-box; padding: 2px;">
					<label style="font-size: 12px;">Fuel Type</label>
					<input type="text" name="fuel" value="<?php echo isset($info['fuel']) ? $info['fuel'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 35%; float: left; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">	
					<label style="font-size: 12px; float: left; display: block;margin-top: 3px;">Motorcycle Is:</label>
					<label><input type="radio" name="motorcycle_is" <?php echo (isset($info['motorcycle_is']) && $info['motorcycle_is']=='Off')?'checked="checked"':''; ?> value="Off"> Off-Highway</label>
					<label><input type="radio" name="motorcycle_is" <?php echo (isset($info['motorcycle_is']) && $info['motorcycle_is']=='On')?'checked="checked"':''; ?> value="On"> On-Highway</label>
				</div>
					
				<div class="form-field" style="width: 65%; float: left; box-sizing: border-box; padding: 2px; ">
					<label style="font-size: 12px;">Comments/Descripition/Other Pertinent Date</label>
					<input type="text" name="pertinent" value="<?php echo isset($info['pertinent']) ? $info['pertinent'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 25%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">	
					<label style="display: block;">Odometer Reading (no tenths):</label>
					<input type="text" name="odometer_reading" value="<?php echo isset($info['odometer_reading']) ? $info['odometer_reading'] : ''; ?>" style="width: 100%;">
				</div>
					
				<div class="form-field" style="width: 75%; float: left; box-sizing: border-box; padding: 2px; ">
					<label>Odometer Status, if known: <input type="radio" name="odometer_status" <?php echo (isset($info['odometer_status']) && $info['odometer_status']=='actual')?'checked="checked"':''; ?> value="actual"> Actual</label>
					<label style="margin:0 0 0 16%;"><input type="radio" name="odometer_status" <?php echo (isset($info['odometer_status']) && $info['odometer_status']=='waring')?'checked="checked"':''; ?> value="waring"> Not Actual - Waring - Odometer Discrepancy</label><br>
					<label ><input type="radio" name="odometer_status" <?php echo (isset($info['odometer_status']) && $info['odometer_status']=='exempt')?'checked="checked"':''; ?> value="exempt"> Exempt</label>
					<label style="margin: 0 16%;"><input type="radio" name="odometer_status" <?php echo (isset($info['odometer_status']) && $info['odometer_status']=='exceed')?'checked="checked"':''; ?> value="exceed"> Exceeds Mechnical Limits</label>
					<label ><input type="radio" name="odometer_status" <?php echo (isset($info['odometer_status']) && $info['odometer_status']=='odometer')?'checked="checked"':''; ?> value="odometer"> No Odometer</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 55%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">	
					<label style="font-size: 12px;">Inspection Officer or Agent's Signature (I certify I have <span style="text-decoration: underline;">physically inspected</span> the vehicle described above)</label>
					X <input type="text" name="inspection" value="<?php echo isset($info['inspection']) ? $info['inspection'] : ''; ?>" style="width: 94%;">
				</div>
					
				<div class="form-field" style="width: 45%; float: left; box-sizing: border-box; padding: 2px;">
					<label style="font-size: 12px;">Applicant's Name</label>
					<input type="text" name="app_name" value="<?php echo isset($info['app_name']) ? $info['app_name'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px; border-bottom: 0px;">
				<div class="form-field" style="width: 40%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">	
					<label style="font-size: 12px;">Agency Name</label>
					<input type="text" name="agency_name" value="<?php echo isset($info['agency_name']) ? $info['agency_name'] : 'RVs Northwest'; ?>" style="width: 94%;">
				</div>
				
				<div class="form-field" style="width: 15%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Badge Number</label>
					<input type="text" name="badge_num" value="<?php echo isset($info['badge_num']) ? $info['badge_num'] : ''; ?>" style="width: 100%;">
				</div>

				
				<div class="form-field" style="width: 45%; float: left; box-sizing: border-box; padding: 2px;">
					<label style="font-size: 12px;">Applicant's Address</label>
					<input type="text" name="app_address" value="<?php echo isset($info['app_address']) ? $info['app_address'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-right: 0px;">
				<div class="form-field" style="width: 40%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">	
					<label style="font-size: 12px;">City/Area</label>
					<input type="text" name="city_area" value="<?php echo isset($info['city_area']) ? $info['city_area'] : 'Spokane Valley WA'; ?>" style="width: 94%;">
				</div>
				
				<div class="form-field" style="width: 15%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">Date Inspected</label>
					<input type="text" name="inspected" value="<?php echo isset($info['inspected']) ? $info['inspected'] : ''; ?>" style="width: 100%;">
				</div>
				
				<div class="form-field" style="width: 30%; float: left; box-sizing: border-box; padding: 2px; border-right: 1px solid #000;">
					<label style="font-size: 12px;">City, State, Zip</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;">
				</div>

				
				<div class="form-field" style="width: 15%; float: left; box-sizing: border-box; padding: 2px;">
					<label style="font-size: 12px;">Daytime Phone Number</label>
					<input type="text" name="daytime" value="<?php echo isset($info['daytime']) ? $info['daytime'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="thumb" style="float: let; width: 100%;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/thumb-rv.jpg'); ?>" alt="" style="width: 100%;">
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
	
	var vin = $('#vin').val();
	var vin1 = $('#vin_addon1').val();
	
	var res = vin.split("");
	var res1 = vin1.split("");
	
	for (var i = 0; i <= 14; i++) {
		$("#vin" + i).val(res[i]);
	}

	for (var i = 0; i <= 14; i++) {
		$("#addon1_vin" + i).val(res1[i]);
	}
});

	
	
	
	
	
</script>
</div>
