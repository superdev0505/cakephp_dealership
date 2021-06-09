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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="float: left; width: 100%; margin: 0;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/used-bike-evaulation-sheet-logo.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 60%;">
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 33%; float: left;">
						<label>YEAR</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 70%;"> 
					</div>
					<div class="form-field" style="width: 33%; float: left;">
						<label>MAKE</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 70%;"> 
					</div>
					<div class="form-field" style="width: 33%; float: left;">
						<label>MODEL</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 70%;"> 
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 75%; float: left;">
						<label>VIN #</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 87%;"> 
					</div>
					<div class="form-field" style="width: 25%; float: left;">
						<label>MILES</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 63%;"> 
					</div>
				</div>	
			</div>
			
			<div class="right" style="float: right; width: 36%;">
				<label style="font-size: 16px;">Mark An "X" For Noticeable Damage</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 47%; border: 20px solid #ededed; box-sizing: border-box;">
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Tires</b>
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 30%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="font_check" <?php echo (isset($info['font_check']) && $info['font_check']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="font_check" <?php echo (isset($info['font_check']) && $info['font_check']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="font_check" <?php echo (isset($info['font_check']) && $info['font_check']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Front:</label>
					</div>
					
					<div class="form-field" style="width: 20%; float: left; text-align: center; margin: 8px 3% 0 16%;">
						<label>Tread Depth</label>
						<input type="text" name="front_tread" value="<?php echo isset($info['front_tread']) ? $info['front_tread'] : ''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="width: 20%; float: left; text-align: center; margin: 8px 0 0 0;">
						<label>Tire Pressure</label>
						<input type="text" name="front_tire" value="<?php echo isset($info['front_tire']) ? $info['front_tire'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0 0 10px;">
					<div class="form-field" style="width: 30%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_check" <?php echo (isset($info['rear_check']) && $info['rear_check']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_check" <?php echo (isset($info['rear_check']) && $info['rear_check']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="rear_check" <?php echo (isset($info['rear_check']) && $info['rear_check']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Rear:</label>
					</div>
					
					<div class="form-field" style="width: 20%; float: left; text-align: center; margin: 8px 3% 0 16%;">
						<input type="text" name="rear_tread" value="<?php echo isset($info['rear_tread']) ? $info['rear_tread'] : ''; ?>" style="width: 100%;">
					</div>
					
					<div class="form-field" style="width: 20%; float: left; text-align: center; margin: 8px 0 0 0;">
						<input type="text" name="rear_tire" value="<?php echo isset($info['rear_tire']) ? $info['rear_tire'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Brake System</b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_pads" <?php echo (isset($info['front_pads']) && $info['front_pads']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_pads" <?php echo (isset($info['front_pads']) && $info['front_pads']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="front_pads" <?php echo (isset($info['front_pads']) && $info['front_pads']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Front Pads:</label>
						<input type="text" name="front_pads" value="<?php echo isset($info['front_pads']) ? $info['front_pads'] : ''; ?>" style="with: 50%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_pads" <?php echo (isset($info['rear_pads']) && $info['rear_pads']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_pads" <?php echo (isset($info['rear_pads']) && $info['rear_pads']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="rear_pads" <?php echo (isset($info['rear_pads']) && $info['rear_pads']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Rear Pads:</label>
						<input type="text" name="rear_pads" value="<?php echo isset($info['rear_pads']) ? $info['rear_pads'] : ''; ?>" style="with: 50%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_master" <?php echo (isset($info['front_master']) && $info['front_master']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_master" <?php echo (isset($info['front_master']) && $info['front_master']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="front_master" <?php echo (isset($info['front_master']) && $info['front_master']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Front Master Cylinder:</label>
						<input type="text" name="front_master" value="<?php echo isset($info['front_master']) ? $info['front_master'] : ''; ?>" style="width: 45%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_master" <?php echo (isset($info['rear_master']) && $info['rear_master']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_master" <?php echo (isset($info['rear_master']) && $info['rear_master']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="rear_master" <?php echo (isset($info['rear_master']) && $info['rear_master']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Rear Master Cylinder:</label>
						<input type="text" name="rear_master" value="<?php echo isset($info['rear_master']) ? $info['rear_master'] : ''; ?>" style="width: 45.5%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="parking_brake" <?php echo (isset($info['parking_brake']) && $info['parking_brake']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="parking_brake" <?php echo (isset($info['parking_brake']) && $info['parking_brake']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="parking_brake" <?php echo (isset($info['parking_brake']) && $info['parking_brake']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Parking Brake Adjust:</label>
						<input type="text" name="parking_brake" value="<?php echo isset($info['parking_brake']) ? $info['parking_brake'] : ''; ?>" style="width: 46%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 0 10px;">
					<div class="form-field" style="width: 100%; float: left; margin: 3% 0 0 20.5%;">
						<label><i>Tri-Glide Only</i></label>
					</div>
				</div>
				
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Wheels</b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="wheel_condition" <?php echo (isset($info['wheel_condition']) && $info['wheel_condition']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="wheel_condition" <?php echo (isset($info['wheel_condition']) && $info['wheel_condition']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="wheel_condition" <?php echo (isset($info['wheel_condition']) && $info['wheel_condition']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Wheel Condition:</label>
						<input type="text" name="wheel_condition" value="<?php echo isset($info['wheel_condition']) ? $info['wheel_condition'] : ''; ?>" style="width: 52%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="spokes" <?php echo (isset($info['spokes']) && $info['spokes']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="spokes" <?php echo (isset($info['spokes']) && $info['spokes']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="spokes" <?php echo (isset($info['spokes']) && $info['spokes']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Spokes <i>(if applicable)</i>:</label>
						<input type="text" name="spokes" value="<?php echo isset($info['spokes']) ? $info['spokes'] : ''; ?>" style="width: 45%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 10px 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="wheel_bearing" <?php echo (isset($info['wheel_bearing']) && $info['wheel_bearing']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="wheel_bearing" <?php echo (isset($info['wheel_bearing']) && $info['wheel_bearing']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="wheel_bearing" <?php echo (isset($info['wheel_bearing']) && $info['wheel_bearing']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Wheel Bearings:</label>
						<input type="text" name="wheel_bearing" value="<?php echo isset($info['wheel_bearing']) ? $info['wheel_bearing'] : ''; ?>" style="width: 53%;">
					</div>
				</div>
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b> </b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;">Powertrain/Chassis</h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="leak_weep" <?php echo (isset($info['leak_weep']) && $info['leak_weep']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="leak_weep" <?php echo (isset($info['leak_weep']) && $info['leak_weep']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="leak_weep" <?php echo (isset($info['leak_weep']) && $info['leak_weep']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Leaks/Weeps:</label>
						<input type="text" name="leak_weep" value="<?php echo isset($info['leak_weep']) ? $info['leak_weep'] : ''; ?>" style="width: 56%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="critical" <?php echo (isset($info['critical']) && $info['critical']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="critical" <?php echo (isset($info['critical']) && $info['critical']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="critical" <?php echo (isset($info['critical']) && $info['critical']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Critical Fasteners:</label>
						<input type="text" name="critical" value="<?php echo isset($info['critical']) ? $info['critical'] : ''; ?>" style="width: 50.5%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="pulley" <?php echo (isset($info['pulley']) && $info['pulley']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="pulley" <?php echo (isset($info['pulley']) && $info['pulley']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="pulley" <?php echo (isset($info['pulley']) && $info['pulley']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Sprocket/Pulley:</label>
						<input type="text" name="pulley" value="<?php echo isset($info['pulley']) ? $info['pulley'] : ''; ?>" style="width: 53%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="belt" <?php echo (isset($info['belt']) && $info['belt']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="belt" <?php echo (isset($info['belt']) && $info['belt']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="belt" <?php echo (isset($info['belt']) && $info['belt']=='below')?'checked="checked"':''; ?> value="below"></label></label>
						<label>Belt:</label>
						<input type="text" name="belt" value="<?php echo isset($info['belt']) ? $info['belt'] : ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 10px 4.5%;">
						<label>Notes:</label>
						<input type="text" name="note1" value="<?php echo isset($info['note1']) ? $info['note1'] : ''; ?>" style="width: 78%;">
						<input type="text" name="note2" value="<?php echo isset($info['note2']) ? $info['note2'] : ''; ?>" style="width: 88.4%;  margin: 5px 0;">
						<input type="text" name="note3" value="<?php echo isset($info['note3']) ? $info['note3'] : ''; ?>" style="width: 88.4%; 5px 0;">
						<input type="text" name="note4" value="<?php echo isset($info['note4']) ? $info['note4'] : ''; ?>" style="width: 88.4%; margin: 5px 0;">
					</div>
				</div>
			</div>
			<!-- left side end -->
			
			<!-- right side start -->
			<div class="right" style="float: right; width: 47%; border: 20px solid #ededed; box-sizing: border-box;">
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Charging System</b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="battery_voltage" <?php echo (isset($info['battery_voltage']) && $info['battery_voltage']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="battery_voltage" <?php echo (isset($info['battery_voltage']) && $info['battery_voltage']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="battery_voltage" <?php echo (isset($info['battery_voltage']) && $info['battery_voltage']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Battery Voltage:</label>
						<input type="text" name="battery_voltage" value="<?php echo isset($info['battery_voltage']) ? $info['battery_voltage'] : ''; ?>" style="width: 40%;">
						<label>VDC</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 20px 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="charging_output" <?php echo (isset($info['charging_output']) && $info['charging_output']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="charging_output" <?php echo (isset($info['charging_output']) && $info['charging_output']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="charging_output" <?php echo (isset($info['charging_output']) && $info['charging_output']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Charging Output:</label>
						<input type="text" name="charging_output" value="<?php echo isset($info['charging_output']) ? $info['charging_output'] : ''; ?>" style="width: 38.5%;">
						<label>VDC</label>
					</div>
				</div>
				
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Fluids</b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="engine" <?php echo (isset($info['engine']) && $info['engine']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="engine" <?php echo (isset($info['engine']) && $info['engine']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="engine" <?php echo (isset($info['engine']) && $info['engine']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Engine:</label>
						<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 65%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="primary" <?php echo (isset($info['primary']) && $info['primary']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="primary" <?php echo (isset($info['primary']) && $info['primary']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="primary" <?php echo (isset($info['primary']) && $info['primary']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Primary:</label>
						<input type="text" name="primary" value="<?php echo isset($info['primary']) ? $info['primary'] : ''; ?>" style="width: 64%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="transmission" <?php echo (isset($info['transmission']) && $info['transmission']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="transmission" <?php echo (isset($info['transmission']) && $info['transmission']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="transmission" <?php echo (isset($info['transmission']) && $info['transmission']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Transmission:</label>
						<input type="text" name="transmission" value="<?php echo isset($info['transmission']) ? $info['transmission'] : ''; ?>" style="width: 56.5%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="anti_freeze" <?php echo (isset($info['anti_freeze']) && $info['anti_freeze']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="anti_freeze" <?php echo (isset($info['anti_freeze']) && $info['anti_freeze']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="anti_freeze" <?php echo (isset($info['anti_freeze']) && $info['anti_freeze']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Anti-Freeze:</label>
						<input type="text" name="anti_freeze" value="<?php echo isset($info['anti_freeze']) ? $info['anti_freeze'] : ''; ?>" style="width: 59%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_cylinder" <?php echo (isset($info['front_cylinder']) && $info['front_cylinder']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="front_cylinder" <?php echo (isset($info['front_cylinder']) && $info['front_cylinder']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio"  name="front_cylinder" <?php echo (isset($info['front_cylinder']) && $info['front_cylinder']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Front Master Cylinder:</label>
						<input type="text" name="front_cylinder" value="<?php echo isset($info['front_cylinder']) ? $info['front_cylinder'] : ''; ?>" style="width: 45%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 7px 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_cylinder" <?php echo (isset($info['rear_cylinder']) && $info['rear_cylinder']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="rear_cylinder" <?php echo (isset($info['rear_cylinder']) && $info['rear_cylinder']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="rear_cylinder" <?php echo (isset($info['rear_cylinder']) && $info['rear_cylinder']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Rear Master Cylinder:</label>
						<input type="text" name="rear_cylinder" value="<?php echo isset($info['rear_cylinder']) ? $info['rear_cylinder'] : ''; ?>" style="width: 45.5%;">
					</div>
				</div>
				
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Miscellaneous</b> <img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/icons.jpg'); ?>" alt="" style="position: absolute; left: 17px; bottom: -16px; width: 16%;"></h2>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 5% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="clutch" <?php echo (isset($info['clutch']) && $info['clutch']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="clutch" <?php echo (isset($info['clutch']) && $info['clutch']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="clutch" <?php echo (isset($info['clutch']) && $info['clutch']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Clutch Operation:</label>
						<input type="text" name="clutch" value="<?php echo isset($info['clutch']) ? $info['clutch'] : ''; ?>" style="width: 52%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="air_filter" <?php echo (isset($info['air_filter']) && $info['air_filter']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="air_filter" <?php echo (isset($info['air_filter']) && $info['air_filter']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="air_filter" <?php echo (isset($info['air_filter']) && $info['air_filter']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Air Filter:</label>
						<input type="text" name="air_filter" value="<?php echo isset($info['air_filter']) ? $info['air_filter'] : ''; ?>" style="width: 64%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="lighting" <?php echo (isset($info['lighting']) && $info['lighting']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="lighting" <?php echo (isset($info['lighting']) && $info['lighting']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="lighting" <?php echo (isset($info['lighting']) && $info['lighting']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Lighting:</label>
						<input type="text" name="lighting" value="<?php echo isset($info['lighting']) ? $info['lighting'] : ''; ?>" style="width: 65%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="horn" <?php echo (isset($info['horn']) && $info['horn']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="horn" <?php echo (isset($info['horn']) && $info['horn']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="horn" <?php echo (isset($info['horn']) && $info['horn']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Horn:</label>
						<input type="text" name="horn" value="<?php echo isset($info['horn']) ? $info['horn'] : ''; ?>" style="width: 69.3%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 0 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="cables" <?php echo (isset($info['cables']) && $info['cables']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="cables" <?php echo (isset($info['cables']) && $info['cables']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="cables" <?php echo (isset($info['cables']) && $info['cables']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Cables/Lines:</label>
						<input type="text" name="cables" value="<?php echo isset($info['cables']) ? $info['cables'] : ''; ?>" style="width: 58%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 2% 0 7px 4.5%;">
						<label style="border: 1px solid #000; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="exhaust" <?php echo (isset($info['exhaust']) && $info['exhaust']=='top')?'checked="checked"':''; ?> value="top"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; margin: 0 -4px 0 0; height: 18px;"><input type="radio" name="exhaust" <?php echo (isset($info['exhaust']) && $info['exhaust']=='mid')?'checked="checked"':''; ?> value="mid"></label>
						<label style="border: 1px solid #000; border-left: 0px; line-height: 5px; display: inline-block; height: 18px;"><input type="radio" name="exhaust" <?php echo (isset($info['exhaust']) && $info['exhaust']=='below')?'checked="checked"':''; ?> value="below"></label>
						<label>Exhaust:</label>
						<input type="text" name="exhaust" value="<?php echo isset($info['exhaust']) ? $info['exhaust'] : ''; ?>" style="width: 65%;">
					</div>
				</div>
				
				
				<h2 style="float: left; position: relative; width: 100%; margin: 0; background-color: #000; font-weight: bold; color: #fff; text-align: center; padding: 10px 0; font-size: 18px;"><b>Technician Recommendations</b></h2>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 1% 0 7px 4.5%;">
						<label>1.</label>
						<input type="text" name="recommand1" value="<?php echo isset($info['recommand1']) ? $info['recommand1'] : ''; ?>" style="width: 85.5%; margin: 3px 0;">
						<input type="text" name="recommand2" value="<?php echo isset($info['recommand2']) ? $info['recommand2'] : ''; ?>" style="width: 89%;">
					</div>
					
					<div class="form-field" style="width: 100%; float: left; margin: 1% 0 7px 4.5%;">
						<label>2.</label>
						<input type="text" name="recommand3" value="<?php echo isset($info['recommand3']) ? $info['recommand3'] : ''; ?>" value="<?php echo isset($info['exhaust']) ? $info['exhaust'] : ''; ?>" style="width: 85.5%; margin: 3px 0;">
						<input type="text" name="recommand4" value="<?php echo isset($info['recommand4']) ? $info['recommand4'] : ''; ?>" style="width: 89%;">
					</div>
					
					<div class="form-field" style="width: 100%; float: left; margin: 1% 0 7px 4.5%;">
						<label>3.</label>
						<input type="text" name="recommand5" value="<?php echo isset($info['recommand5']) ? $info['recommand5'] : ''; ?>" value="<?php echo isset($info['exhaust']) ? $info['exhaust'] : ''; ?>" style="width: 85.5%; margin: 3px 0;">
						<input type="text" name="recommand6" value="<?php echo isset($info['recommand6']) ? $info['recommand6'] : ''; ?>" value="<?php echo isset($info['exhaust']) ? $info['exhaust'] : ''; ?>" style="width: 89%;">
					</div>
				</div>
			</div>
			<!-- right side end -->
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="form-field" style="float: left; width: 47%; box-sizing: border-box; padding: 5px; border: 3px solid #000;">
				<label>Technician Name:</label>
				<input type="text" name="technical_name" value="<?php echo isset($info['technical_name']) ? $info['technical_name'] : ''; ?>" style="width: 70%; border: 0px;">
			</div>
			
			<div class="form-field" style="float: right; width: 47%; box-sizing: border-box; padding: 5px; border: 3px solid #000;">
				<label>Test Ridden By:</label>
				<input type="text" name="ridden" value="<?php echo isset($info['ridden']) ? $info['ridden'] : ''; ?>" style="width: 70%; border: 0px;">
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
