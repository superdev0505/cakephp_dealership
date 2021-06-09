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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000; text-align: left;}
	td:nth-child(4), td:nth-child(7){text-align: left;}
	th:nth-child(4), th:nth-child(7){text-align: left;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: center; padding: 3px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 4px 0; text-align: center; font-size: 20px"><b>Motorcycle Appraisal & Inspection Form</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Owners Name:</label>
				<input type="text" name="owner_name" value="<?php echo isset($info['owner_name']) ? $info['owner_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 78%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Co-owner Name:</label>
				<input type="text" name="co_owner" value="<?php echo isset($info['co_owner']) ? $info['co_owner'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 93.5%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 86%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 71%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>County:</label>
				<input type="text" name="county" value="<?php echo isset($info['county']) ? $info['county'] : ''; ?>" style="width: 82.5%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Cell Phone:</label>
				<input type="text" name="mobile" value="<?php $mobile = $info['mobile']; $mobile_number = preg_replace('/[^0-9]+/', '', $mobile); $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $mobile_number); echo $cleaned;  ?>" style="width: 73%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Home Phone:</label>
				<input type="text" name="phone" value="<?php $phone = $info['phone']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $cleaned;  ?>" style="width: 73%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Work Phone:</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 73%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 84.5%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>VIN #:</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 84%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Color:</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 84%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Sales Person:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 71.5%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 16px;"><b>Customer Questions</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 49%; box-sizing: border-box;">
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>1. When did you purchase this bike?</label>
					<input type="text" name="when_purchase" value="<?php echo isset($info['when_purchase'])?$info['when_purchase']:''; ?>" style="width: 53%;">
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>2. Are you the original owner of this bike?</label>
					<input type="text" name="owner_bike" value="<?php echo isset($info['owner_bike'])?$info['owner_bike']:''; ?>" style="width: 46.3%;">
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>3. Where did you purchase this bike?</label>
					<input type="text" name="where_purchase" value="<?php echo isset($info['where_purchase'])?$info['where_purchase']:''; ?>" style="width: 52%;">
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>4. In what state is the bike titled?</label>
					<input type="text" name="bike_title" value="<?php echo isset($info['bike_title'])?$info['bike_title']:''; ?>" style="width: 57.3%;">
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>5. What names are listed on the title?</label>
					<input type="text" name="list_card1" value="<?php echo isset($info['list_card1'])?$info['list_card1']:''; ?>" style="width: 50.4%;">
					<input type="text" name="list_card2" value="<?php echo isset($info['list_card2'])?$info['list_card2']:''; ?>" style="width: 98.8%; margin: 4px 0;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 49%; box-sizing: border-box;">
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>6. Does this bike have a transferable service contract?</label>
					<span style="float: right;">
						<label><input type="radio" name="bike_check" value="yes" <?php echo (isset($info['bike_check']) && $info['bike_check']=='yes')?'checked="checked"':''; ?> /> Yes</label>
						<label> or <input type="radio" name="bike_check" value="no" <?php echo (isset($info['bike_check']) && $info['bike_check']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>7. Do you have a second set of keys/fabs and owners manual?</label>
					<span style="float: right;">
						<label><input type="radio" name="set_check" value="yes" <?php echo (isset($info['set_check']) && $info['set_check']=='yes')?'checked="checked"':''; ?> /> Yes</label>
						<label> or <input type="radio" name="set_check" value="no" <?php echo (isset($info['set_check']) && $info['set_check']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>8. Has this bike ever been in an accident?</label>
					<span style="float: right;">
						<label><input type="radio" name="accident_check" value="yes" <?php echo (isset($info['accident_check']) && $info['accident_check']=='yes')?'checked="checked"':''; ?> /> Yes</label>
						<label> or <input type="radio" name="accident_check" value="no" <?php echo (isset($info['accident_check']) && $info['accident_check']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label style="font-size: 12px;">9. Has this bike ever been titled as a setvage, junk, or rebuilt bike?</label>
					<span style="float: right;">
						<label><input type="radio" name="setvage_check" value="yes" <?php echo (isset($info['setvage_check']) && $info['setvage_check']=='yes')?'checked="checked"':''; ?> /> Yes</label>
						<label> or <input type="radio" name="setvage_check" value="no" <?php echo (isset($info['setvage_check']) && $info['setvage_check']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label>10. Has the odometer ever been repaired or replaced?</label>
					<span style="float: right;">
						<label><input type="radio" name="odometer_check" value="yes" <?php echo (isset($info['odometer_check']) && $info['odometer_check']=='yes')?'checked="checked"':''; ?> /> Yes</label>
						<label> or <input type="radio" name="odometer_check" value="no" <?php echo (isset($info['odometer_check']) && $info['odometer_check']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="width: 100%; float: left; margin: 3px 0;">
					<label style="width: 50%;">11. Odometer reading: <input type="text" name="odomteer_reading" value="<?php echo isset($info['odomteer_reading']) ? $info['odomteer_reading'] : ''; ?>" style="width: 35%;"></label>
					<span style="float: right; ">
						<label>(Circle one)</label>
						<label><input type="radio" name="circle_check" value="yes" <?php echo (isset($info['circle_check']) && $info['circle_check']=='yes')?'checked="checked"':''; ?> /> Actual</label>
						<label> or <input type="radio" name="circle_check" value="no" <?php echo (isset($info['circle_check']) && $info['circle_check']=='no')?'checked="checked"':''; ?> /> 	Not Actual</label>
					</span>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label><b>Customer Signature</b></label>
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>Date</b></label>
				<input type="text" name="customer_date" value="<?php echo isset($info['customer_date']) ? $info['customer_date'] : ''; ?>" style="width: 85%;">
			</div>
		</div>
		
		
		<table class="no-border" cellspacing="0" cellpadding="0" width="100%;">
			<tr>
				<th style="width: 16%;"><b>Item</b></th>
				<th style="width: 5%;"><b>X</b></th>
				<th style="width: 12%;"><b>Amount</b></th>
				<th style="width: 17%;"><b>Item</b></th>
				<th style="width: 5%;"><b>X</b></th>
				<th style="width: 12%;"><b>Amount</b></th>
				<th style="width: 16%;"><b>Item</b></th>
				<th style="width: 5%;"><b>X</b></th>
				<th style="width: 12%;"><b>Amount</b></th>
			</tr>
			<tr>
				<td>1. Handlebars/Bushings</td>
				<td><input type="text" name="x1_1" value="<?php echo isset($info['x1_1']) ? $info['x1_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_1" value="<?php echo isset($info['amt1_1']) ? $info['amt1_1'] : ''; ?>" style="width: 100%;"></td>
				<td>12. Windshield</td>
				<td><input type="text" name="x2_1" value="<?php echo isset($info['x2_1']) ? $info['x2_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_1" value="<?php echo isset($info['amt2_1']) ? $info['amt2_1'] : ''; ?>" style="width: 100%;"></td>
				<td>23. Engine Noise</td>
				<td><input type="text" name="x3_1" value="<?php echo isset($info['x3_1']) ? $info['x3_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_1" value="<?php echo isset($info['amt3_1']) ? $info['amt3_1'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>2. Grips</td>
				<td><input type="text" name="x1_2" value="<?php echo isset($info['x1_2']) ? $info['x1_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_2" value="<?php echo isset($info['amt1_2']) ? $info['amt1_2'] : ''; ?>" style="width: 100%;"></td>
				<td>13. Painted Parts</td>
				<td><input type="text" name="x2_2" value="<?php echo isset($info['x2_2']) ? $info['x2_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_2" value="<?php echo isset($info['amt2_2']) ? $info['amt2_2'] : ''; ?>" style="width: 100%;"></td>
				<td>24. Oil Leaks</td>
				<td><input type="text" name="x3_2" value="<?php echo isset($info['x3_2']) ? $info['x3_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_2" value="<?php echo isset($info['amt3_2']) ? $info['amt3_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>3. Forks</td>
				<td><input type="text" name="x1_3" value="<?php echo isset($info['x1_3']) ? $info['x1_3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_3" value="<?php echo isset($info['amt1_3']) ? $info['amt1_3'] : ''; ?>" style="width: 100%;"></td>
				<td>14. Physical Damage</td>
				<td><input type="text" name="x2_3" value="<?php echo isset($info['x2_3']) ? $info['x2_3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_3" value="<?php echo isset($info['amt2_3']) ? $info['amt2_3'] : ''; ?>" style="width: 100%;"></td>
				<td>25. Clutch</td>
				<td><input type="text" name="x3_3" value="<?php echo isset($info['x3_3']) ? $info['x3_3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_3" value="<?php echo isset($info['amt3_3']) ? $info['amt3_3'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>4. Lights</td>
				<td><input type="text" name="x1_4" value="<?php echo isset($info['x1_4']) ? $info['x1_4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_4" value="<?php echo isset($info['amt1_4']) ? $info['amt1_4'] : ''; ?>" style="width: 100%;"></td>
				<td>15. Mirrors</td>
				<td><input type="text" name="x2_4" value="<?php echo isset($info['x2_4']) ? $info['x2_4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_4" value="<?php echo isset($info['amt2_4']) ? $info['amt2_4'] : ''; ?>" style="width: 100%;"></td>
				<td>26. Levers</td>
				<td><input type="text" name="x3_4" value="<?php echo isset($info['x3_4']) ? $info['x3_4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_4" value="<?php echo isset($info['amt3_4']) ? $info['amt3_4'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>5. Horn</td>
				<td><input type="text" name="x1_5" value="<?php echo isset($info['x1_5']) ? $info['x1_5'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_5" value="<?php echo isset($info['amt1_5']) ? $info['amt1_5'] : ''; ?>" style="width: 100%;"></td>
				<td>16. Turn Signal Lens</td>
				<td><input type="text" name="x2_5" value="<?php echo isset($info['x2_5']) ? $info['x2_5'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_5" value="<?php echo isset($info['amt2_5']) ? $info['amt2_5'] : ''; ?>" style="width: 100%;"></td>
				<td>27. Cables</td>
				<td><input type="text" name="x3_5" value="<?php echo isset($info['x3_5']) ? $info['x3_5'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_5" value="<?php echo isset($info['amt3_5']) ? $info['amt3_5'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>6 Cruise</td>
				<td><input type="text" name="x1_6" value="<?php echo isset($info['x1_6']) ? $info['x1_6'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_6" value="<?php echo isset($info['amt1_6']) ? $info['amt1_6'] : ''; ?>" style="width: 100%;"></td>
				<td>17. Engine Guards</td>
				<td><input type="text" name="x2_6" value="<?php echo isset($info['x2_6']) ? $info['x2_6'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_6" value="<?php echo isset($info['amt2_6']) ? $info['amt2_6'] : ''; ?>" style="width: 100%;"></td>
				<td>28. Air Filter</td>
				<td><input type="text" name="x3_6" value="<?php echo isset($info['x3_6']) ? $info['x3_6'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_6" value="<?php echo isset($info['amt3_6']) ? $info['amt3_6'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>7. Switch Housings</td>
				<td><input type="text" name="x1_7" value="<?php echo isset($info['x1_7']) ? $info['x1_7'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_7" value="<?php echo isset($info['amt1_7']) ? $info['amt1_7'] : ''; ?>" style="width: 100%;"></td>
				<td>18. Seat</td>
				<td><input type="text" name="x2_7" value="<?php echo isset($info['x2_7']) ? $info['x2_7'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_7" value="<?php echo isset($info['amt2_7']) ? $info['amt2_7'] : ''; ?>" style="width: 100%;"></td>
				<td>29. Pipes</td>
				<td><input type="text" name="x3_7" value="<?php echo isset($info['x3_7']) ? $info['x3_7'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_7" value="<?php echo isset($info['amt3_7']) ? $info['amt3_7'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			
			
			<tr>
				<td>8. Gauges</td>
				<td><input type="text" name="x1_8" value="<?php echo isset($info['x1_8']) ? $info['x1_8'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_8" value="<?php echo isset($info['amt1_8']) ? $info['amt1_8'] : ''; ?>" style="width: 100%;"></td>
				<td>19. Saddle Bags</td>
				<td><input type="text" name="x2_8" value="<?php echo isset($info['x2_8']) ? $info['x2_8'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_8" value="<?php echo isset($info['amt2_8']) ? $info['amt2_8'] : ''; ?>" style="width: 100%;"></td>
				<td>30. Fuel Management</td>
				<td><input type="text" name="x3_8" value="<?php echo isset($info['x3_8']) ? $info['x3_8'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_8" value="<?php echo isset($info['amt3_8']) ? $info['amt3_8'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>9. Buttons</td>
				<td><input type="text" name="x1_9" value="<?php echo isset($info['x1_9']) ? $info['x1_9'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_9" value="<?php echo isset($info['amt1_9']) ? $info['amt1_9'] : ''; ?>" style="width: 100%;"></td>
				<td>20. Sissy Bar</td>
				<td><input type="text" name="x2_9" value="<?php echo isset($info['x2_9']) ? $info['x2_9'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_9" value="<?php echo isset($info['amt2_9']) ? $info['amt2_9'] : ''; ?>" style="width: 100%;"></td>
				<td>31. Heal/Toe Shifter</td>
				<td><input type="text" name="x3_9" value="<?php echo isset($info['x3_9']) ? $info['x3_9'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_9" value="<?php echo isset($info['amt3_9']) ? $info['amt3_9'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>10. Sound System</td>
				<td><input type="text" name="x1_10" value="<?php echo isset($info['x1_10']) ? $info['x1_10'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_10" value="<?php echo isset($info['amt1_10']) ? $info['amt1_10'] : ''; ?>" style="width: 100%;"></td>
				<td>21. Lowers</td>
				<td><input type="text" name="x2_10" value="<?php echo isset($info['x2_10']) ? $info['x2_10'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_10" value="<?php echo isset($info['amt2_10']) ? $info['amt2_10'] : ''; ?>" style="width: 100%;"></td>
				<td>32. Master Cyl. Cover</td>
				<td><input type="text" name="x3_10" value="<?php echo isset($info['x3_10']) ? $info['x3_10'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_10" value="<?php echo isset($info['amt3_10']) ? $info['amt3_10'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>11. Motor Mounts</td>
				<td><input type="text" name="x1_11" value="<?php echo isset($info['x1_11']) ? $info['x1_11'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt1_11" value="<?php echo isset($info['amt1_11']) ? $info['amt1_11'] : ''; ?>" style="width: 100%;"></td>
				<td>22. Floor Boards/Pegs</td>
				<td><input type="text" name="x2_11" value="<?php echo isset($info['x2_11']) ? $info['x2_11'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2_11" value="<?php echo isset($info['amt2_11']) ? $info['amt2_11'] : ''; ?>" style="width: 100%;"></td>
				<td>33. Brakes</td>
				<td><input type="text" name="x3_11" value="<?php echo isset($info['x3_11']) ? $info['x3_11'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt3_11" value="<?php echo isset($info['amt3_11']) ? $info['amt3_11'] : ''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="width: 100%; float: left;">
				<label style="font-size: 17px;"><b>Pigtall Installed :</b> </label>
				<label style="margin: 0 0 0 4%;"><input type="radio" name="pigtall_check" value="yes" <?php echo (isset($info['pigtall_check']) && $info['pigtall_check']=='yes')?'checked="checked"':''; ?> /> Yes </label> /
				<label><input type="radio" name="pigtall_check" value="no" <?php echo (isset($info['pigtall_check']) && $info['pigtall_check']=='no')?'checked="checked"':''; ?> /> No </label> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="one-fourth" style="float: left; width: 24%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 17px;"><b>34. Battery</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Replacement Date:</label>
					<input type="text" name="replace_date" value="<?php echo isset($info['replace_date']) ? $info['replace_date'] : ''; ?>" style="width: 48%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Harley Brand:</label>
					<input type="text" name="harley_brand" value="<?php echo isset($info['harley_brand']) ? $info['harley_brand'] : ''; ?>" style="width: 19%;">
					<label><input type="radio" name="harley_check" value="yes" <?php echo (isset($info['harley_check']) && $info['harley_check']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
					<label><input type="radio" name="harley_check" value="no" <?php echo (isset($info['harley_check']) && $info['harley_check']=='no')?'checked="checked"':''; ?> /> No</label>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Load Test:</label>
					<input type="text" name="load_test" value="<?php echo isset($info['load_test']) ? $info['load_test'] : ''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amt1" value="<?php echo isset($info['replace_amt1']) ? $info['replace_amt1'] : ''; ?>" style="width: 39%;">
				</div>
			</div>
			
			<div class="one-fourth" style="float: left; width: 24%; margin: 0 1%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 17px;"><b>35. Front Tire</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Brand:</label>
					<input type="text" name="brand" value="<?php echo isset($info['brand']) ? $info['brand'] : ''; ?>" style="width: 78%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Trend Depth:</label>
					<input type="text" name="trend_depth" value="<?php echo isset($info['trend_depth']) ? $info['trend_depth'] : ''; ?>" style="width: 63%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Damage:</label>
					<input type="text" name="damage1" value="<?php echo isset($info['damage1']) ? $info['damage1'] : ''; ?>" style="width: 28%;">
					<label><input type="radio" name="damage1_check" value="yes" <?php echo (isset($info['damage1_check']) && $info['damage1_check']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
					<label><input type="radio" name="damage1_check" value="no" <?php echo (isset($info['damage1_check']) && $info['damage1_check']=='no')?'checked="checked"':''; ?> /> No</label>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amt2" value="<?php echo isset($info['replace_amt2']) ? $info['replace_amt2'] : ''; ?>" style="width: 41%;">
				</div>
			</div>
			
			<div class="one-fourth" style="float: left; width: 24%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 17px;"><b>36. Rear Tire</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Brand:</label>
					<input type="text" name="brand1" value="<?php echo isset($info['brand1']) ? $info['brand1'] : ''; ?>" style="width: 78%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Trend Depth:</label>
					<input type="text" name="trend_depth" value="<?php echo isset($info['trend_depth']) ? $info['trend_depth'] : ''; ?>" style="width: 63%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Damage:</label>
					<input type="text" name="damage2" value="<?php echo isset($info['damage2']) ? $info['damage2'] : ''; ?>" style="width: 28%;">
					<label><input type="radio" name="damage2_check" value="yes" <?php echo (isset($info['damage2_check']) && $info['damage2_check']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
					<label><input type="radio" name="damage2_check" value="no" <?php echo (isset($info['damage2_check']) && $info['damage2_check']=='no')?'checked="checked"':''; ?> /> No</label>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amt3" value="<?php echo isset($info['replace_amt3']) ? $info['replace_amt3'] : ''; ?>" style="width: 41%;">
				</div>
			</div>
			
			<div class="one-fourth" style="float: right; width: 24%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 17px;"><b>37. Scheduled Services</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Last Service Date:</label>
					<input type="text" name="last_service" value="<?php echo isset($info['last_service']) ? $info['last_service'] : ''; ?>" style="width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>By Whom:</label>
					<input type="text" name="whom" value="<?php echo isset($info['whom']) ? $info['whom'] : ''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Receipt:</label>
					<input type="text" name="receipt" value="<?php echo isset($info['receipt']) ? $info['receipt'] : ''; ?>" style="width: 30%;">
					<label><input type="radio" name="receipt_check" value="yes" <?php echo (isset($info['receipt_check']) && $info['receipt_check']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
					<label><input type="radio" name="receipt_check" value="no" <?php echo (isset($info['receipt_check']) && $info['receipt_check']=='no')?'checked="checked"':''; ?> /> No</label>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Service Amount:</label>
					<input type="text" name="service_amt" value="<?php echo isset($info['service_amt']) ? $info['service_amt'] : ''; ?>" style="width: 53%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-top: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label style="font-size: 17px;"><b>Remarks</b></label>
				<input type="text" name="remarks1" value="<?php echo isset($info['remarks1']) ? $info['remarks1'] : ''; ?>" style="width: 80%; float: right;">
				<input type="text" name="remarks2" value="<?php echo isset($info['remarks2']) ? $info['remarks2'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks3" value="<?php echo isset($info['remarks3']) ? $info['remarks3'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks4" value="<?php echo isset($info['remarks4']) ? $info['remarks4'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks5" value="<?php echo isset($info['remarks5']) ? $info['remarks5'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks6" value="<?php echo isset($info['remarks6']) ? $info['remarks6'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks7" value="<?php echo isset($info['remarks7']) ? $info['remarks7'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
				<input type="text" name="remarks8" value="<?php echo isset($info['remarks8']) ? $info['remarks8'] : ''; ?>" style="float: left; width: 100%; margin: 5px 0;">	
			</div>
			<div class="right" style="float: left; width: 50%; box-sizing: border-box; padding: 10px;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Average Motorcycle Value:</label>
					<input type="text" name="motor_value" value="<?php echo isset($info['motor_value']) ? $info['motor_value'] : ''; ?>" style="width: 56%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Reconditioning Amount:</label>
					<input type="text" name="reconition" value="<?php echo isset($info['reconition']) ? $info['reconition'] : ''; ?>" style="width: 59%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Adjusted Value:</label>
					<input type="text" name="adjust_value" value="<?php echo isset($info['adjust_value']) ? $info['adjust_value'] : ''; ?>" style="width: 71%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Clean-up/Detail:</label>
					<input type="text" name="detail" value="<?php echo isset($info['detail']) ? $info['detail'] : ''; ?>" style="width: 72%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Appraised value:</label>
					<input type="text" name="appraisal_value" value="<?php echo isset($info['appraisal_value']) ? $info['appraisal_value'] : ''; ?>" style="width: 72%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Appraised by:</label>
					<input type="text" name="appraised_by" value="<?php echo isset($info['appraised_by']) ? $info['appraised_by'] : ''; ?>" style="width: 75%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label style="font-size: 16px;">Service Associate:</label>
					<input type="text" name="service_associate" value="<?php echo isset($info['service_associate']) ? $info['service_associate'] : ''; ?>" style="width: 67%;">
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
