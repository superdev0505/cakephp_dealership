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
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td, th{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 1%;}
	.right td{text-align: center; padding: 3px 6px 3px }
	
	
	
@media print {
	.right td{padding: 3px 6px 4px!imporatnt;}
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: .5px !important;}
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<p style="float: left; width: 100%; margin: 3px 0 0; font-size: 15px; text-align: center;">RV Appraisal Sheet</p>
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>First name</label>
				<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Last name</label>
				<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Salesperson</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 70%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="form-field" style="float: left; width: 27%;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 19%;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>Lien Holder</label>
				<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder'])?$info['lien_holder']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label>Mileage</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 65%;">
				<label>Vin #</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 94%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="form-field" style="float: left; width: 38%;">
				<label>Payoff Amount</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 62%;">
				<label>Do you currently have service protection plan?</label>
				<label style="margin: 0 7% 0 4%;"><input type="radio" name="service_status" value="yes" <?php echo (isset($info['service_status']) && $info['service_status']=='yes')?'checked="checked"':''; ?> /> Yes</label>
				<label><input type="radio" name="service_status" value="no" <?php echo (isset($info['service_status']) && $info['service_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-top: 1px solid #000; border-bottom: 1px solid #000; box-sizing: border-box;">
			<div class="left" style="float: left; width: 45%; margin: 0; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<th rowspan="2" style="height: 48px;">AVG Cost of Repair</th>
						<th rowspan="2" style="height: 48px;">Equipment</th>
					</tr>
					
					<tr></tr>
					
					<tr>
						<td>$3500-6000</td>
						<td>Engine G D 4 6 8 10</td>
					</tr>
					
					<tr>
						<td>$1000-4000</td>
						<td>Transmission</td>
					</tr>
					
					<tr>
						<td>$300-600</td>
						<td>Manifolds/Exhaust</td>
					</tr>
					
					
					<tr>
						<td>$400-600</td>
						<td>Brakes</td>
					</tr>
					
					<tr>
						<td>$300</td>
						<td>Cruise Control</td>
					</tr>
					<tr>
						<td>$150-750</td>
						<td>Auto A/C</td>
					</tr>
					<tr>
						<td>$300-500</td>
						<td>Windshield</td>
					</tr>
					<tr>
						<td>$100 HR + Parts</td>
						<td>Generator HRS.</td>
					</tr>
					<tr>
						<td>$110 HR + Parts</td>
						<td>Water System</td>
					</tr>
					<tr>
						<td>$120 HR + Parts</td>
						<td>110V Electrical</td>
					</tr>
					<tr>
						<td>$130 HR + Parts</td>
						<td>12V Electrical</td>
					</tr>
					<tr>
						<td>$1100 - 2500</td>
						<td>REFER - Gas 12V Electrical</td>
					</tr>
					<tr>
						<td>$450 - 550</td>
						<td>Hot Water Heater</td>
					</tr>
					<tr>
						<td>$65 - 400</td>
						<td>Furnace</td>
					</tr>
					<tr>
						<td>$100 HR + Parts</td>
						<td>Cook Stove</td>
					</tr>
					<tr>
						<td>$250</td>
						<td>Microwave</td>
					</tr>
					
					<tr>
						<td>$110-800</td>
						<td>Roof A/C</td>
					</tr>
					
					<tr>
						<td>$80-140 EA </td>
						<td>Tires G F P</td>
					</tr>
					
					<tr>
						<td>$350</td>
						<td>Electric Step</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Tent Fabric</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Screens</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Life System</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Carpet G F P</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Furniture G F P</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>LP System</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Slide Out # of</td>
					</tr>
					
					<tr>
						<td>$500 - 1000</td>
						<td>Awning</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Holding Tanks</td>
					</tr>
					
					<tr>
						<td>$5000 - 10000</td>
						<td>Sidewall Delam</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Hail Damage</td>
					</tr>
					
					<tr>
						<td>$100 HR + Parts</td>
						<td>Water Damage</td>
					</tr>
					
					<tr>
						<td>$500 - 5000</td>
						<td>Do Pets Camp With you?</td>
					</tr>
					
					<tr>
						<td>$500 - 5000</td>
						<td>Has Unit Been Smoked In ?</td>
					</tr>
					
					<tr>
						<td>$1000 - 2000</td>
						<td>Original Flooring</td>
					</tr>
					
					<tr>
						<td>$1000 - 2000</td>
						<td>Original Flooring</td>
					</tr>
					
				</table>
			</div>
			
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 45%; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td colspan="3"><b>Works</b></td>
						<td rowspan="2" style="width: 60%;"><b>Notes</b></td>
					</tr>
					
					<tr>
						<td><b>Yes</b></td>
						<td><b>No</b></td>
						<td><b>N/A</b></td>
					</tr>
					
					
					<tr>
						<td><input type="radio" name="work1_status" value="yes" <?php echo (isset($info['work1_status']) && $info['work1_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work1_status" value="no" <?php echo (isset($info['work1_status']) && $info['work1_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work1_status" value="n/a" <?php echo (isset($info['work1_status']) && $info['work1_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work1" value="<?php echo isset($info['work1'])?$info['work1']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work2_status" value="yes" <?php echo (isset($info['work2_status']) && $info['work2_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work2_status" value="no" <?php echo (isset($info['work2_status']) && $info['work2_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work2_status" value="n/a" <?php echo (isset($info['work2_status']) && $info['work2_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work2" value="<?php echo isset($info['work2'])?$info['work2']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work3_status" value="yes" <?php echo (isset($info['work3_status']) && $info['work3_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work3_status" value="no" <?php echo (isset($info['work3_status']) && $info['work3_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work3_status" value="n/a" <?php echo (isset($info['work3_status']) && $info['work3_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work3" value="<?php echo isset($info['work3'])?$info['work3']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work4_status" value="yes" <?php echo (isset($info['work4_status']) && $info['work4_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work4_status" value="no" <?php echo (isset($info['work4_status']) && $info['work4_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work4_status" value="n/a" <?php echo (isset($info['work4_status']) && $info['work4_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work4" value="<?php echo isset($info['work4'])?$info['work4']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work5_status" value="yes" <?php echo (isset($info['work5_status']) && $info['work5_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work5_status" value="no" <?php echo (isset($info['work5_status']) && $info['work5_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work5_status" value="n/a" <?php echo (isset($info['work5_status']) && $info['work5_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work5" value="<?php echo isset($info['work5'])?$info['work5']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work6_status" value="yes" <?php echo (isset($info['work6_status']) && $info['work6_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work6_status" value="no" <?php echo (isset($info['work6_status']) && $info['work6_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work6_status" value="n/a" <?php echo (isset($info['work6_status']) && $info['work6_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work6" value="<?php echo isset($info['work6'])?$info['work6']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work7_status" value="yes" <?php echo (isset($info['work7_status']) && $info['work7_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work7_status" value="no" <?php echo (isset($info['work7_status']) && $info['work7_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work7_status" value="n/a" <?php echo (isset($info['work7_status']) && $info['work7_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work7" value="<?php echo isset($info['work7'])?$info['work7']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work8_status" value="yes" <?php echo (isset($info['work8_status']) && $info['work8_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work8_status" value="no" <?php echo (isset($info['work8_status']) && $info['work8_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work8_status" value="n/a" <?php echo (isset($info['work8_status']) && $info['work8_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work8" value="<?php echo isset($info['work8'])?$info['work8']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work9_status" value="yes" <?php echo (isset($info['work9_status']) && $info['work9_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work9_status" value="no" <?php echo (isset($info['work9_status']) && $info['work9_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work9_status" value="n/a" <?php echo (isset($info['work9_status']) && $info['work9_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work9" value="<?php echo isset($info['work9'])?$info['work9']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work10_status" value="yes" <?php echo (isset($info['work10_status']) && $info['work10_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work10_status" value="no" <?php echo (isset($info['work10_status']) && $info['work10_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work10_status" value="n/a" <?php echo (isset($info['work10_status']) && $info['work10_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work10" value="<?php echo isset($info['work10'])?$info['work10']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work11_status" value="yes" <?php echo (isset($info['work11_status']) && $info['work11_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work11_status" value="no" <?php echo (isset($info['work11_status']) && $info['work11_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work11_status" value="n/a" <?php echo (isset($info['work11_status']) && $info['work11_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work11" value="<?php echo isset($info['work11'])?$info['work11']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work12_status" value="yes" <?php echo (isset($info['work12_status']) && $info['work12_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work12_status" value="no" <?php echo (isset($info['work12_status']) && $info['work12_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work12_status" value="n/a" <?php echo (isset($info['work12_status']) && $info['work12_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work12" value="<?php echo isset($info['work12'])?$info['work12']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work13_status" value="yes" <?php echo (isset($info['work13_status']) && $info['work13_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work13_status" value="no" <?php echo (isset($info['work13_status']) && $info['work13_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work13_status" value="n/a" <?php echo (isset($info['work13_status']) && $info['work13_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work13" value="<?php echo isset($info['work13'])?$info['work13']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work14_status" value="yes" <?php echo (isset($info['work14_status']) && $info['work14_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work14_status" value="no" <?php echo (isset($info['work14_status']) && $info['work14_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work14_status" value="n/a" <?php echo (isset($info['work14_status']) && $info['work14_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work14" value="<?php echo isset($info['work14'])?$info['work14']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work15_status" value="yes" <?php echo (isset($info['work15_status']) && $info['work15_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work15_status" value="no" <?php echo (isset($info['work15_status']) && $info['work15_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work15_status" value="n/a" <?php echo (isset($info['work15_status']) && $info['work15_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work15" value="<?php echo isset($info['work15'])?$info['work15']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work16_status" value="yes" <?php echo (isset($info['work16_status']) && $info['work16_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work16_status" value="no" <?php echo (isset($info['work16_status']) && $info['work16_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work16_status" value="n/a" <?php echo (isset($info['work16_status']) && $info['work16_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work16" value="<?php echo isset($info['work16'])?$info['work16']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work17_status" value="yes" <?php echo (isset($info['work17_status']) && $info['work17_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work17_status" value="no" <?php echo (isset($info['work17_status']) && $info['work17_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work17_status" value="n/a" <?php echo (isset($info['work17_status']) && $info['work17_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work17" value="<?php echo isset($info['work17'])?$info['work17']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work18_status" value="yes" <?php echo (isset($info['work18_status']) && $info['work18_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work18_status" value="no" <?php echo (isset($info['work18_status']) && $info['work18_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work18_status" value="n/a" <?php echo (isset($info['work18_status']) && $info['work18_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work18" value="<?php echo isset($info['work18'])?$info['work18']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work19_status" value="yes" <?php echo (isset($info['work19_status']) && $info['work19_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work19_status" value="no" <?php echo (isset($info['work19_status']) && $info['work19_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work19_status" value="n/a" <?php echo (isset($info['work19_status']) && $info['work19_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work19" value="<?php echo isset($info['work19'])?$info['work19']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work20_status" value="yes" <?php echo (isset($info['work20_status']) && $info['work20_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work20_status" value="no" <?php echo (isset($info['work20_status']) && $info['work20_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work20_status" value="n/a" <?php echo (isset($info['work20_status']) && $info['work20_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work20" value="<?php echo isset($info['work20'])?$info['work20']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work21_status" value="yes" <?php echo (isset($info['work21_status']) && $info['work21_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work21_status" value="no" <?php echo (isset($info['work21_status']) && $info['work21_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work21_status" value="n/a" <?php echo (isset($info['work21_status']) && $info['work21_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work21" value="<?php echo isset($info['work21'])?$info['work21']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work22_status" value="yes" <?php echo (isset($info['work22_status']) && $info['work22_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work22_status" value="no" <?php echo (isset($info['work22_status']) && $info['work22_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work22_status" value="n/a" <?php echo (isset($info['work22_status']) && $info['work22_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work22" value="<?php echo isset($info['work22'])?$info['work22']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work23_status" value="yes" <?php echo (isset($info['work23_status']) && $info['work23_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work23_status" value="no" <?php echo (isset($info['work23_status']) && $info['work23_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work23_status" value="n/a" <?php echo (isset($info['work23_status']) && $info['work23_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work23" value="<?php echo isset($info['work23'])?$info['work23']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work24_status" value="yes" <?php echo (isset($info['work24_status']) && $info['work24_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work24_status" value="no" <?php echo (isset($info['work24_status']) && $info['work24_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work24_status" value="n/a" <?php echo (isset($info['work24_status']) && $info['work24_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work24" value="<?php echo isset($info['work24'])?$info['work24']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work25_status" value="yes" <?php echo (isset($info['work25_status']) && $info['work25_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work25_status" value="no" <?php echo (isset($info['work25_status']) && $info['work25_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work25_status" value="n/a" <?php echo (isset($info['work25_status']) && $info['work25_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work25" value="<?php echo isset($info['work25'])?$info['work25']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work26_status" value="yes" <?php echo (isset($info['work26_status']) && $info['work26_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work26_status" value="no" <?php echo (isset($info['work26_status']) && $info['work26_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work26_status" value="n/a" <?php echo (isset($info['work26_status']) && $info['work26_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work26" value="<?php echo isset($info['work26'])?$info['work26']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work27_status" value="yes" <?php echo (isset($info['work27_status']) && $info['work27_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work27_status" value="no" <?php echo (isset($info['work27_status']) && $info['work27_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work27_status" value="n/a" <?php echo (isset($info['work27_status']) && $info['work27_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work27" value="<?php echo isset($info['work27'])?$info['work27']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work28_status" value="yes" <?php echo (isset($info['work28_status']) && $info['work28_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work28_status" value="no" <?php echo (isset($info['work28_status']) && $info['work28_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work28_status" value="n/a" <?php echo (isset($info['work28_status']) && $info['work28_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work28" value="<?php echo isset($info['work28'])?$info['work28']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work29_status" value="yes" <?php echo (isset($info['work29_status']) && $info['work29_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work29_status" value="no" <?php echo (isset($info['work29_status']) && $info['work29_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work29_status" value="n/a" <?php echo (isset($info['work29_status']) && $info['work29_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work29" value="<?php echo isset($info['work29'])?$info['work29']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work30_status" value="yes" <?php echo (isset($info['work30_status']) && $info['work30_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work30_status" value="no" <?php echo (isset($info['work30_status']) && $info['work30_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work30_status" value="n/a" <?php echo (isset($info['work30_status']) && $info['work30_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work30" value="<?php echo isset($info['work30'])?$info['work30']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work31_status" value="yes" <?php echo (isset($info['work31_status']) && $info['work31_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work31_status" value="no" <?php echo (isset($info['work31_status']) && $info['work31_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work31_status" value="n/a" <?php echo (isset($info['work31_status']) && $info['work31_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work31" value="<?php echo isset($info['work31'])?$info['work31']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work32_status" value="yes" <?php echo (isset($info['work32_status']) && $info['work32_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work32_status" value="no" <?php echo (isset($info['work32_status']) && $info['work32_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work32_status" value="n/a" <?php echo (isset($info['work32_status']) && $info['work32_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work32" value="<?php echo isset($info['work32'])?$info['work32']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work33_status" value="yes" <?php echo (isset($info['work33_status']) && $info['work33_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work33_status" value="no" <?php echo (isset($info['work33_status']) && $info['work33_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work33_status" value="n/a" <?php echo (isset($info['work33_status']) && $info['work33_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work33" value="<?php echo isset($info['work33'])?$info['work33']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work34_status" value="yes" <?php echo (isset($info['work34_status']) && $info['work34_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work34_status" value="no" <?php echo (isset($info['work34_status']) && $info['work34_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work34_status" value="n/a" <?php echo (isset($info['work34_status']) && $info['work34_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work34" value="<?php echo isset($info['work34'])?$info['work34']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td><input type="radio" name="work35_status" value="yes" <?php echo (isset($info['work35_status']) && $info['work35_status']=='yes')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work35_status" value="no" <?php echo (isset($info['work35_status']) && $info['work35_status']=='no')?'checked="checked"':''; ?> /></td>
						<td><input type="radio" name="work35_status" value="n/a" <?php echo (isset($info['work35_status']) && $info['work35_status']=='n/a')?'checked="checked"':''; ?> /></td>
						<td><input type="text" name="work35" value="<?php echo isset($info['work35'])?$info['work35']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			<!-- rightside end -->
			
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0">
				<label>Miscellaneous</label>
				<input type="text" name="miscell" value="<?php echo isset($info['miscell'])?$info['miscell']:''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label>Owner Signature</label>
				<input type="text" name="owner_sign" value="<?php echo isset($info['owner_sign'])?$info['owner_sign']:''; ?>" style="width: 88%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 3px 0 0; font-size: 14px;">Your signature on this document verifies that the information is correct to the best of your knowledge and you will be responsible foll repair/replacement needed to acheive the allowed value. This trade shall be subject to an inspection by RV General Store. This trade shall checked for condition and verification of the manufacturers model,year,length,options and marketable title (i.e not rebuilt or salvaged, Duplicate, Non-Discharged liens, etc.) RV General Store reserves the right to declare this sale null and void or adjust the Trade-In value if for any of the above reasons this trade is unacceptable or not as represented by your above signature.</p>
		
		<p style="float: left; width: 100%; margin: 3px 0 0; font-size: 14px; text-align: center;">Date / Time - <input type="text" name="date" style="border-bottom: 0px;" value="<?php echo($datetimefullview); ?>"></p>	
			
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
