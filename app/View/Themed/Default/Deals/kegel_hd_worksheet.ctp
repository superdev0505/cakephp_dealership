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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; margin: 0;}
	body{font-size: 12px;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
.mr-section .form-field{padding-top: 8px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 30px;">
			<div class="left" style="float: left; width: 40%; margin-left: 5%; text-align: center;">
				<h2 style="margin: 0; font-size: 18px;"><b>KEGEL HARLEY-DAVIDSON</b></h2>
				<p style="font-size: 15px; margin: 3px 0;">7125 Harrison Avenue <span>Rockford, IL 61112</span></p>
				<p style="font-size: 15px; margin: 3px 0;">Phone 815-332-7125 <span>Fax 815-332-9613</span></p>
			</div>
			<h3 style="border: 1px solid #000; float: right; line-height: 43px; margin: 4px 5% 4px; text-align: center; width: 30%; font-size: 18px;">SALES WORKSHEET</h3>
		</div>
		
		<div class="outer" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 10px;">
					<label>PURCHASER</label>
					<input type="text" name="purchaser" value="<?php echo isset($info['purchaser']) ? $info['purchaser'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 10px;">
					<label>HOME PHONE</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 10px;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 10px;">
					<label>STREET</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 10px;">
					<label>CELL PHONE</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 10px;">
					<label>SALESPERSON</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 10px;">
					<label>CITY, STATE, ZIP</label>
					<input type="text" name="state_city_zip" value="<?php echo isset($info['state_city_zip']) ? $info['state_city_zip'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 10px;">
					<label>EMAIL ADDRESS</label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="left" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box;">
					<h3 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 15px; border-bottom: 1px solid #000;"><b>DESCRIPTION OF PURCHASE</b></h3>
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000; box-sizing: border-box; padding: 0 4px;">
							<label>NEW/USED</label>
							<input type="text" name="condition" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>YEAR</label>
							<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>MAKE</label>
							<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 4px;">
							<label>MODEL</label>
							<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>VIN</label>
							<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>COLOR</label>
							<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 4px;">
							<label>MILEAGE</label>
							<input type="text" name="mileage" value="<?php echo isset($info['mileage']) ? $info['mileage'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>KEY NUMBER</label>
							<input type="text" name="key" value="<?php echo isset($info['key']) ? $info['key'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 4px;">
							<label>DELIVERED ON OR ABOUT</label>
							<input type="text" name="to_delivery" value="<?php echo isset($info['to_delivery'])?$info['to_delivery']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>LIENHOLDER</label>
							<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>ADDRESS</label>
							<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>CITY, STATE, ZIP</label>
							<input type="text" name="purchaser_address" value="<?php echo isset($info['purchaser_address']) ? $info['purchaser_address'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;">
						</div>
					</div>
					
					<h3 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 15px; border-bottom: 1px solid #000;"><b>ACCESSORIES</b></h3>
					
					<div class="left" style="float: left; width: 100%; margin: 0;">
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;text-align: center;">
							<label>Part Name</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;text-align: center;">
							<label>QTY</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;text-align: center;">
							<label>$Price</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access2_1" value="<?php echo isset($info['access2_1']) ? $info['access2_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access2_2" value="<?php echo isset($info['access2_2']) ? $info['access2_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access2_3" value="<?php echo isset($info['access2_3']) ? $info['access2_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access3_1" value="<?php echo isset($info['access3_1']) ? $info['access3_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access3_2" value="<?php echo isset($info['access3_2']) ? $info['access3_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access3_3" value="<?php echo isset($info['access3_3']) ? $info['access3_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access4_1" value="<?php echo isset($info['access4_1']) ? $info['access4_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access4_2" value="<?php echo isset($info['access4_2']) ? $info['access4_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access4_3" value="<?php echo isset($info['access4_3']) ? $info['access4_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access5_1" value="<?php echo isset($info['access5_1']) ? $info['access5_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access5_2" value="<?php echo isset($info['access5_2']) ? $info['access5_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access5_3" value="<?php echo isset($info['access5_3']) ? $info['access5_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access6_1" value="<?php echo isset($info['access6_1']) ? $info['access6_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access6_2" value="<?php echo isset($info['access6_2']) ? $info['access6_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access6_3" value="<?php echo isset($info['access6_3']) ? $info['access6_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access7_1" value="<?php echo isset($info['access7_1']) ? $info['access7_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access7_2" value="<?php echo isset($info['access7_2']) ? $info['access7_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access7_3" value="<?php echo isset($info['access7_3']) ? $info['access7_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access8_1" value="<?php echo isset($info['access8_1']) ? $info['access8_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access8_2" value="<?php echo isset($info['access8_2']) ? $info['access8_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access8_3" value="<?php echo isset($info['access8_3']) ? $info['access8_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access9_1" value="<?php echo isset($info['access9_1']) ? $info['access9_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access9_2" value="<?php echo isset($info['access9_2']) ? $info['access9_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access9_3" value="<?php echo isset($info['access9_3']) ? $info['access9_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access10_1" value="<?php echo isset($info['access10_1']) ? $info['access10_1'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access10_2" value="<?php echo isset($info['access10_2']) ? $info['access10_2'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<input type="text" name="access10_3" value="<?php echo isset($info['access10_3']) ? $info['access10_3'] : ''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px; padding-top: 7px;">
							<label>REMARKS</label>
							<textarea name="remarks" id="remarks" style="width: 100%; height: 150px; border: 0px;"><?php echo isset($info['remarks'])?$info['remarks']:'' ?></textarea>
						</div>
					</div>
					</div>
					
					
				</div>
				<div class="right" style="float: left; width: 50%; box-sizing: border-box;">
					<h3 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 15px; border-bottom: 1px solid #000;"><b>DESCRIPTION OF TRADE-IN</b></h3>
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>YEAR</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>MAKE</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 0 4px;">
							<label>MODEL</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>VIN</label>
							<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>COLOR</label>
							<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 4px;">
							<label>MILEAGE</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000;">
							<label>TITLE NUMBER</label>
							<input type="text" name="title_num" value="<?php echo isset($info['title_num'])?$info['title_num']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 0 4px;">
							<label>LICENSE NUMBER</label>
							<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>LIENHOLDER</label>
							<input type="text" name="lienholder_trade" value="<?php echo isset($info['lienholder_trade'])?$info['lienholder_trade']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>ADDRESS</label>
							<input type="text" name="address_trade" value="<?php echo isset($info['address_trade'])?$info['address_trade']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 4px;">
							<label>CITY, STATE, ZIP</label>
							<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<h3 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 15px; border-bottom: 1px solid #000;"><b>SETTLEMENT</b></h3>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">BASE PRICE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="base_price" value="<?php echo isset($info['base_price'])?$info['base_price']:''; ?>" class="sub_cal" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">FRIGHT & SET-UP</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="fright" value="<?php echo isset($info['fright'])?$info['fright']:''; ?>" class="sub_cal" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">DOC FEE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;  box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="doc_fee" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" class="sub_cal" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">TITLE SERVICE FEE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="service_fee" value="<?php echo isset($info['service_fee'])?$info['service_fee']:''; ?>" class="sub_cal" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">ACCESS & INSTALLATION</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="access_fee" id="access_fee" value="<?php echo isset($info['access_fee'])?$info['access_fee']:''; ?>" class="sub_cal" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">SUBTOTAL</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;  box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="subtotal" id="subtotal" value="<?php echo isset($info['subtotal'])?$info['subtotal']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">TRADE-IN ALLOWANCE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="allowance" class="amount_cal" id="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">TAXABLE AMOUNT</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;  box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="taxable" class="total_cal" id="taxable" value="<?php echo isset($info['taxable'])?$info['taxable']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">SALES TAX</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="sales_tax" class="total_cal" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">LICENSE FEE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="license_fee" class="total_cal" value="<?php echo isset($info['license_fee'])?$info['license_fee']:''; ?>"  style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">EXTENDED SERVICE PLAN</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;  box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="extended" class="total_cal" value="<?php echo isset($info['extended'])?$info['extended']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">TOTAL PRICE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;  box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="total" id="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;">
						</div>
						
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">TRADE PAY-OFF DUE</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="pay_off" class="pay_off" id="pay_off" value="<?php echo isset($info['pay_off'])?$info['pay_off']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">SUBTOTAL</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="sub_total" id="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">DOWN PAYMENT</label>
						</div>
						<div class="form-field" style="float: left; width: 50%;box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="down_pay" class="pay_off" id="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 10px;">
							<label style="display: block; text-align: right;">BALANCE DUE ON DELIVERY</label>
						</div>
						<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 0 4px; border-right: 1px solid #000; padding-top: 7px;">
							<input type="text" name="balance" id="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 100%;">
						</div>
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
	

	function calculate_left_total($this) {
		var sum = 0.00;
		$(".left").find('.row').each(function () {
		var qty = isNaN(parseFloat($(this).find('div:eq(1) input').val()))?0.00:parseFloat($(this).find('div:eq(1) input').val());
        var price = isNaN(parseFloat($(this).find('div:eq(2) input').val()))?0.00:parseFloat($(this).find('div:eq(2) input').val());
        var price_amount = qty*price;
        sum += price_amount;
        $("#access_fee").val(sum.toFixed(2));
        sub_total();
     });
	}

	$(".left .row div").on('change keyup paste',function(){
		var $this = this; 
		calculate_left_total($this);
	});

	function sub_total() {
		var subtotal = 0.00;
		$( ".sub_cal" ).each(function( index ) {
            subtotal += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
        });
        $("#subtotal").val(subtotal.toFixed(2));
		var allowance = isNaN(parseFloat($("#allowance").val()))?0.00:parseFloat($("#allowance").val());
        var taxable = subtotal - allowance;
           	$("#taxable").val(taxable.toFixed(2));
		total_price();
	}
	$(".sub_cal, .amount_cal").on('change keyup paste',function(){
        sub_total();
    });


	function total_price() {
		var total = 0.00;
		$( ".total_cal" ).each(function( index ) {
            total += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
        });
        var pay_off = isNaN(parseFloat($("#pay_off").val()))?0.00:parseFloat($("#pay_off").val());
        var down_pay = isNaN(parseFloat($("#down_pay").val()))?0.00:parseFloat($("#down_pay").val());
        var sub_total = total + pay_off;
        var balance = sub_total - down_pay;
        $("#sub_total").val(sub_total.toFixed(2));
		$("#total").val(total.toFixed(2));
		$("#balance").val(balance.toFixed(2));
	}

    $(".total_cal, .pay_off").on('change keyup paste',function(){
        total_price();
    });
     
});
</script>
</div>
