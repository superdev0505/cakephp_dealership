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
	label{font-size: 13px; font-weight: normal;}
	
	.left label, .right label{font-size: 12px;}
	table input[type="text"]{border: 0px;}
	table{border-bottom: 1px solid #000; border-right: 1px solid #000;}
	td, th{border-left: 1px solid #000; border-top: 1px solid #000; padding: 2px; font-size: 12px;}
	th{text-align: center;}
	td input[type="text"]{text-align: center; padding: 1px !important;}
	.wraper.main input {padding: 0px;}
}
	.one-fourth label{font-size: 13px;}
	.one-fourth{font-size: 13px;}
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h2 style="float: left; width: 100%; text-align: center; font-size: 17px; margin: 10px 0;"><b>Motorcycle Appraisal & Inspection Form</b></h2>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Sales Person:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Owner’s Name:</label>
				<input type="text" name="owner_name" value="<?php echo isset($info['owner_name'])?$info['owner_name']:$info['first_name']." ".$info['last_name']; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: right; width: 50%;">
				<label>Co-Owner's Name:</label>
				<input type="text" name="co_owner" value="<?php echo isset($info['co_owner']) ? $info['co_owner'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: right; width: 34%;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 84%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>VIN #:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: right; width: 50%;">
				<label>Color:</label>
				<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 90%;">
			</div>
		</div>
		
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 17px; margin: 10px 0;"><b>Customer Questions</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="left" style="float: left; width: 46%">
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>1. When did you purchase this bike? </label>
					<input type="text" name="purcase_bike" value="<?php echo isset($info['purcase_bike'])?$info['purcase_bike']:''; ?>" style="width: 54%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>2. Are you the original owner of this bike?</label>
					<input type="text" name="original_bike" value="<?php echo isset($info['original_bike'])?$info['original_bike']:''; ?>" style="width: 47%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>3. Where did you purchase this bike?</label>
					<input type="text" name="place_bike" value="<?php echo isset($info['place_bike'])?$info['place_bike']:''; ?>" style="width: 53%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>4. In what state is the bike titled?</label>
					<input type="text" name="titled_bike" value="<?php echo isset($info['titled_bike'])?$info['titled_bike']:''; ?>" style="width: 58%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>5. What Name/s are listed on the title?</label>
					<input type="text" name="title_list1" value="<?php echo isset($info['title_list1'])?$info['title_list1']:''; ?>" style="width: 52%;">
					<input type="text" name="title_list2" value="<?php echo isset($info['title_list2'])?$info['title_list2']:''; ?>" style="width: 98%; margin: 7px 0;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 46%">
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>6. Does this bike have a transferable service contract?</label>
					<span style="float: right;">
						<label><input type="radio" name="service_bike" value="yes" <?php echo (isset($info['service_bike']) && $info['service_bike']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
						<label><input type="radio" name="service_bike" value="no" <?php echo (isset($info['service_bike']) && $info['service_bike']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>7. Do you have a second set of keys/fobs and owner’s manual?</label>
					<span style="float: right;">
						<label><input type="radio" name="set_bike" value="yes" <?php echo (isset($info['set_bike']) && $info['set_bike']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
						<label><input type="radio" name="set_bike" value="no" <?php echo (isset($info['set_bike']) && $info['set_bike']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>8. Has this bike ever been in an accident?</label>
					<span style="float: right;">
						<label><input type="radio" name="accident_bike" value="yes" <?php echo (isset($info['accident_bike']) && $info['accident_bike']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
						<label><input type="radio" name="accident_bike" value="no" <?php echo (isset($info['accident_bike']) && $info['accident_bike']=='yes')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>9. Does this bike have a tuner?</label>
					<span style="float: right;">
						<label><input type="radio" name="tuner_bike" value="yes" <?php echo (isset($info['tuner_bike']) && $info['tuner_bike']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
						<label><input type="radio" name="tuner_bike" value="no" <?php echo (isset($info['tuner_bike']) && $info['tuner_bike']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>10. Has the odometer ever been repaired or replaced?</label>
					<span style="float: right;">
						<label><input type="radio" name="repair_bike" value="yes" <?php echo (isset($info['repair_bike']) && $info['repair_bike']=='yes')?'checked="checked"':''; ?> /> Yes</label> or
						<label><input type="radio" name="repair_bike" value="no" <?php echo (isset($info['repair_bike']) && $info['repair_bike']=='no')?'checked="checked"':''; ?> /> No</label>
					</span>
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 2px 0;">
					<label>11. Odometer reading:</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 20%;">
					<label>(circle one)</label>
					
					<span style="float: right;">
						<label><input type="radio" name="odometer_circle" value="yes" <?php echo (isset($info['odometer_circle']) && $info['odometer_circle']=='yes')?'checked="checked"':''; ?> /> Actual</label> 
						<label><input type="radio" name="odometer_circle" value="no" <?php echo (isset($info['odometer_circle']) && $info['odometer_circle']=='no')?'checked="checked"':''; ?> /> Not Actual</label>
					</span>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label style="font-size: 16px;"><b>Customer Signature:</b></label>
				<input type="text" name="cust_sig" value="<?php echo isset($info['cust_sig'])?$info['cust_sig']:''; ?>" style="width: 57%;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label style="font-size: 16px;"><b>Date:</b></label>
				<input type="text" name="customer_date" value="<?php echo isset($info['customer_date']) ? $info['customer_date'] : ''; ?>" style="width: 85%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<table style="width: 100%;" cellpadding="0" cellspacing="0">
				<tr>
					<th style="width: 17%">Item</th>
					<th style="width: 4%">X</th>
					<th style="width: 9%">Amount</th>
					<th style="width: 17%">Item</th>
					<th style="width: 4%">X</th>
					<th style="width: 9%">Amount</th>
					<th style="width: 17%">Item</th>
					<th style="width: 4%">X</th>
					<th style="width: 9%">Amount</th>
				</tr>
				
				<tr>
					<td> 1. Wheel:  Spokes F/R</td>
					<td><input type="text" name="item1_x_1" value="<?php echo isset($info['item1_x_1'])?$info['item1_x_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_1" value="<?php echo isset($info['item1_amount_1'])?$info['item1_amount_1']:''; ?>" style="width: 100%;"></td>
					<td> 12. Fuel Tank (left)</td>
					<td><input type="text" name="item2_x_1" value="<?php echo isset($info['item2_x_1'])?$info['item2_x_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_1" value="<?php echo isset($info['item2_amount_1'])?$info['item2_amount_1']:''; ?>" style="width: 100%;"></td>
					<td> 23.Drive:Sprocket(rear)</td>
					<td><input type="text" name="item3_x_1" value="<?php echo isset($info['item3_x_1'])?$info['item3_x_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_1" value="<?php echo isset($info['item3_amount_1'])?$info['item3_amount_1']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>  2. Wheel:  Cast F/R</td>
					<td><input type="text" name="item1_x_2" value="<?php echo isset($info['item1_x_2'])?$info['item1_x_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_2" value="<?php echo isset($info['item1_amount_2'])?$info['item1_amount_2']:''; ?>" style="width: 100%;"></td>
					<td> 13. Fuel System (left)</td>
					<td><input type="text" name="item2_x_2" value="<?php echo isset($info['item2_x_2'])?$info['item2_x_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_2" value="<?php echo isset($info['item2_amount_2'])?$info['item2_amount_2']:''; ?>" style="width: 100%;"></td>
					<td> 24. Fork/Swing Arm (rear)</td>
					<td><input type="text" name="item3_x_2" value="<?php echo isset($info['item3_x_2'])?$info['item3_x_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_2" value="<?php echo isset($info['item3_amount_2'])?$info['item3_amount_2']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 3. Wheel:  Bearing F/R</td>
					<td><input type="text" name="item1_x_3" value="<?php echo isset($info['item1_x_3'])?$info['item1_x_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_3" value="<?php echo isset($info['item1_amount_3'])?$info['item1_amount_3']:''; ?>" style="width: 100%;"></td>
					<td> 14. Clutch (left)</td>
					<td><input type="text" name="item2_x_3" value="<?php echo isset($info['item2_x_3'])?$info['item2_x_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_3" value="<?php echo isset($info['item2_amount_3'])?$info['item2_amount_3']:''; ?>" style="width: 100%;"></td>
					<td> 25. Shocks (Left/Right)(rear)</td>
					<td><input type="text" name="item3_x_3" value="<?php echo isset($info['item3_x_3'])?$info['item3_x_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_3" value="<?php echo isset($info['item3_amount_3'])?$info['item3_amount_3']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 4. Wheel:  Seals F/R</td>
					<td><input type="text" name="item1_x_4" value="<?php echo isset($info['item1_x_4'])?$info['item1_x_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_4" value="<?php echo isset($info['item1_x_4'])?$info['item1_x_4']:''; ?>" style="width: 100%;"></td>
					<td> 15. Engine/Drive (left)</td>
					<td><input type="text" name="item2_x_4" value="<?php echo isset($info['item2_x_4'])?$info['item2_x_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_4" value="<?php echo isset($info['item2_amount_4'])?$info['item2_amount_4']:''; ?>" style="width: 100%;"></td>
					<td> 26.Fender/Bags/TourPak(rear)</td>
					<td><input type="text" name="item3_x_4" value="<?php echo isset($info['item3_x_4'])?$info['item3_x_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_4" value="<?php echo isset($info['item3_amount_4'])?$info['item3_amount_4']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 5.Brakes:Pad/Shoe/Disc F/R</td>
					<td><input type="text" name="item1_x_5" value="<?php echo isset($info['item1_x_5'])?$info['item1_x_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_5" value="<?php echo isset($info['item1_amount_5'])?$info['item1_amount_5']:''; ?>" style="width: 100%;"></td>
					<td> 16. Kickstand (left)</td>
					<td><input type="text" name="item2_x_5" value="<?php echo isset($info['item2_x_5'])?$info['item2_x_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_5" value="<?php echo isset($info['item2_amount_5'])?$info['item2_amount_5']:''; ?>" style="width: 100%;"></td>
					<td> 27. Transmission(right)</td>
					<td><input type="text" name="item3_x_5" value="<?php echo isset($info['item3_x_5'])?$info['item3_x_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_5" value="<?php echo isset($info['item3_amount_5'])?$info['item3_amount_5']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 6. Brakes:  Caliper F/R</td>
					<td><input type="text" name="item1_x_6" value="<?php echo isset($info['item1_x_6'])?$info['item1_x_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_6" value="<?php echo isset($info['item1_amount_6'])?$info['item1_amount_6']:''; ?>" style="width: 100%;"></td>
					<td> 17. Footrest (left)</td>
					<td><input type="text" name="item2_x_6" value="<?php echo isset($info['item2_x_6'])?$info['item2_x_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_6" value="<?php echo isset($info['item2_amount_6'])?$info['item2_amount_6']:''; ?>" style="width: 100%;"></td>
					<td> 28. Engine (right)</td>
					<td><input type="text" name="item3_x_6" value="<?php echo isset($info['item3_x_6'])?$info['item3_x_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_6" value="<?php echo isset($info['item3_amount_6'])?$info['item3_amount_6']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 7. Brakes:Hose/Line F/R)</td>
					<td><input type="text" name="item1_x_7" value="<?php echo isset($info['item1_x_7'])?$info['item1_x_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_7" value="<?php echo isset($info['item1_amount_7'])?$info['item1_amount_7']:''; ?>" style="width: 100%;"></td>
					<td> 18. Battery (electrical)</td>
					<td><input type="text" name="item2_x_7" value="<?php echo isset($info['item2_x_7'])?$info['item2_x_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_7" value="<?php echo isset($info['item2_amount_7'])?$info['item2_amount_7']:''; ?>" style="width: 100%;"></td>
					<td> 29. Carburetor (right)</td>
					<td><input type="text" name="item3_x_7" value="<?php echo isset($info['item3_x_7'])?$info['item3_x_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_7" value="<?php echo isset($info['item3_amount_7'])?$info['item3_amount_7']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 8. Brakes:Master Cyl R/R</td>
					<td><input type="text" name="item1_x_8" value="<?php echo isset($info['item1_x_8'])?$info['item1_x_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_8" value="<?php echo isset($info['item1_amount_8'])?$info['item1_amount_8']:''; ?>" style="width: 100%;"></td>
					<td> 19. Handlebar Controls</td>
					<td><input type="text" name="item2_x_8" value="<?php echo isset($info['item2_x_8'])?$info['item2_x_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_8" value="<?php echo isset($info['item2_amount_8'])?$info['item2_amount_8']:''; ?>" style="width: 100%;"></td>
					<td> 30. Throttle (right)</td>
					<td><input type="text" name="item3_x_8" value="<?php echo isset($info['item3_x_8'])?$info['item3_x_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_8" value="<?php echo isset($info['item3_amount_8'])?$info['item3_amount_8']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 9. Brakes:  Lever  (front)</td>
					<td><input type="text" name="item1_x_9" value="<?php echo isset($info['item1_x_9'])?$info['item1_x_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_9" value="<?php echo isset($info['item1_amount_9'])?$info['item1_amount_9']:''; ?>" style="width: 100%;"></td>
					<td> 20. Lights (electrical)</td>
					<td><input type="text" name="item2_x_9" value="<?php echo isset($info['item2_x_9'])?$info['item2_x_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_9" value="<?php echo isset($info['item2_amount_9'])?$info['item2_amount_9']:''; ?>" style="width: 100%;"></td>
					<td> 31. Brake Pedal (right)</td>
					<td><input type="text" name="item3_x_9" value="<?php echo isset($info['item3_x_9'])?$info['item3_x_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_9" value="<?php echo isset($info['item3_amount_9'])?$info['item3_amount_9']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 10. Fork/Steering  (front)</td>
					<td><input type="text" name="item1_x_10" value="<?php echo isset($info['item1_x_10'])?$info['item1_x_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_10" value="<?php echo isset($info['item1_amount_10'])?$info['item1_amount_10']:''; ?>" style="width: 100%;"></td>
					<td> 21. Accessories (elect)</td>
					<td><input type="text" name="item2_x_10" value="<?php echo isset($info['item2_x_10'])?$info['item2_x_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_10" value="<?php echo isset($info['item2_amount_10'])?$info['item2_amount_10']:''; ?>" style="width: 100%;"></td>
					<td> 32. Footrest (right)</td>
					<td><input type="text" name="item3_x_10" value="<?php echo isset($info['item3_x_10'])?$info['item3_x_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_10" value="<?php echo isset($info['item3_amount_10'])?$info['item3_amount_10']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 11. Fender   (front)</td>
					<td><input type="text" name="item1_x_11" value="<?php echo isset($info['item1_x_11'])?$info['item1_x_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item1_amount_11" value="<?php echo isset($info['item1_amount_11'])?$info['item1_amount_11']:''; ?>" style="width: 100%;"></td>
					<td> 22 Drive:Belt/Chain(rear)</td>
					<td><input type="text" name="item2_x_11" value="<?php echo isset($info['item2_x_11'])?$info['item2_x_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item2_amount_11" value="<?php echo isset($info['item2_amount_11'])?$info['item2_amount_11']:''; ?>" style="width: 100%;"></td>
					<td> 33. Exhaust System (right)</td>
					<td><input type="text" name="item3_x_11" value="<?php echo isset($info['item3_x_11'])?$info['item3_x_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item3_amount_11" value="<?php echo isset($info['item3_amount_11'])?$info['item3_amount_11']:''; ?>" style="width: 100%;">
					</td>
				</tr>
				
			</table>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>Pigtail Installed:</b></label>
				<span><input type="radio" name="pigtail" value="yes" <?php echo (isset($info['pigtail']) && $info['pigtail']=='yes')?'checked="checked"':''; ?> /> Yes</span> or
				<span><input type="radio" name="pigtail" value="no" <?php echo (isset($info['pigtail']) && $info['pigtail']=='no')?'checked="checked"':''; ?> /> No</span>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="one-fourth" style="float: left; width: 25%;">
				<strong style="float: left; width: 100%;">34. Battery</strong>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Replacement Date:</label>
					<input type="text" name="replace_date" value="<?php echo isset($info['replace_date'])?$info['replace_date']:''; ?>" style="width: 53%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Harley Brand: (circle one)</label>
					<span><input type="radio" name="brand" value="yes" <?php echo (isset($info['brand']) && $info['brand']=='yes')?'checked="checked"':''; ?> /> Yes</span> or
					<span><input type="radio" name="brand" value="no" <?php echo (isset($info['brand']) && $info['brand']=='no')?'checked="checked"':''; ?> /> No</span>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Load Test:</label>
					<input type="text" name="load" value="<?php echo isset($info['load'])?$info['load']:''; ?>" style="width: 72%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amount1" value="<?php echo isset($info['replace_amount1'])?$info['replace_amount1']:''; ?>" style="width: 46%;">
				</div>
			</div>
			<div class="one-fourth" style="float: left; width: 25%;">
				<strong style="float: left; width: 100%;">35. Front Tire</strong>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Brand:</label>
					<input type="text" name="brand1" value="<?php echo isset($info['brand1'])?$info['brand1']:''; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Damage: (circle one) </label>
					<span><input type="radio" name="damage1" value="yes" <?php echo (isset($info['damage1']) && $info['damage1']=='yes')?'checked="checked"':''; ?> /> Yes</span> or
					<span><input type="radio" name="damage1" value="no" <?php echo (isset($info['damage1']) && $info['damage1']=='no')?'checked="checked"':''; ?> /> No</span>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Tread Depth:</label>
					<input type="text" name="tread1" value="<?php echo isset($info['tread1'])?$info['tread1']:''; ?>" style="width: 63%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amount2" value="<?php echo isset($info['replace_amount2'])?$info['replace_amount2']:''; ?>" style="width: 43%;">
				</div>
			</div>
			<div class="one-fourth" style="float: left; width: 25%;">
				<strong style="float: left; width: 100%;">36. Rear Tire</strong>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Brand:</label>
					<input type="text" name="brand2" value="<?php echo isset($info['brand2'])?$info['brand2']:''; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Damage: (circle one) </label>
					<span><input type="radio" name="damage2" value="yes" <?php echo (isset($info['damage2']) && $info['damage2']=='yes')?'checked="checked"':''; ?> /> Yes</span> or
					<span><input type="radio" name="damage2" value="no" <?php echo (isset($info['damage2']) && $info['damage2']=='no')?'checked="checked"':''; ?> /> No</span>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Tread Depth:</label>
					<input type="text" name="tread2" value="<?php echo isset($info['tread2'])?$info['tread2']:''; ?>" style="width: 63%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Replacement Amount:</label>
					<input type="text" name="replace_amount3" value="<?php echo isset($info['replace_amount3'])?$info['replace_amount3']:''; ?>" style="width: 43%;">
				</div>
			</div>
			<div class="one-fourth" style="float: left; width: 25%;">
				<strong style="float: left; width: 100%;">37. Scheduled Services</strong>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Last Service Date:</label>
					<input type="text" name="service_date" value="<?php echo isset($info['service_date'])?$info['service_date']:''; ?>" style="width: 52%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>By Whom:</label>
					<span><input type="radio" name="whom" value="yes" <?php echo (isset($info['damage2']) && $info['damage2']=='yes')?'checked="checked"':''; ?> /> Yes</span> or
					<span><input type="radio" name="whom" value="no" <?php echo (isset($info['damage2']) && $info['damage2']=='no')?'checked="checked"':''; ?> /> No</span>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Receipt: (circle one) </label>
					<input type="text" name="receipt" value="<?php echo isset($info['receipt'])?$info['receipt']:''; ?>" style="width: 49%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>Service Amount:</label>
					<input type="text" name="service_amount" value="<?php echo isset($info['service_amount'])?$info['service_amount']:''; ?>" style="width: 56%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-top: 1px solid #000;">
			<div class="left" style="width: 60%; float: left;">
				<div class="form-field" style="float: left; width: 100%;">
					<label><b>Remarks:</b> (Reference the number lines above)</label>
					<input type="text" name="remarks1" value="<?php echo isset($info['remarks1'])?$info['remarks1']:''; ?>" style="width: 56%; margin: 0 0 2px;">
					<input type="text" name="remarks2" value="<?php echo isset($info['remarks2'])?$info['remarks2']:''; ?>" style="width: 100%; margin: 0 0 2px;">
					<input type="text" name="remarks3" value="<?php echo isset($info['remarks3'])?$info['remarks3']:''; ?>" style="width: 100%; margin: 0 0 2px;">
					<input type="text" name="remarks4" value="<?php echo isset($info['remarks4'])?$info['remarks4']:''; ?>" style="width: 100%; margin: 0 0 2px;">
					<input type="text" name="remarks5" value="<?php echo isset($info['remarks5'])?$info['remarks5']:''; ?>" style="width: 100%; margin: 0 0 2px;">
					<input type="text" name="remarks6" value="<?php echo isset($info['remarks6'])?$info['remarks6']:''; ?>" style="width: 100%; margin: 0 0 2px;">
					<input type="text" name="remarks7" value="<?php echo isset($info['remarks7'])?$info['remarks7']:''; ?>" style="width: 100%; margin: 0 0 2px;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 40%; margin: 0 0 7px; border-left: 1px solid #000; box-sizing: border-box; padding: 10px;">
				<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
					<label>	Reconditioning Amount: (Cost of Lines 1-37) </label>$ 
					<input type="text" name="recondition_amount" value="<?php echo isset($info['recondition_amount'])?$info['recondition_amount']:''; ?>" style="width: 32%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 10px 0 24px;">
					<label style="font-size: 16px;"><b>AS IS: </b> </label><span>$</span> 
					<input type="text" name="as" value="<?php echo isset($info['as'])?$info['as']:''; ?>"  style="width: 83%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 1px 0 7px;">
					<label style="font-size: 16px;"><b>RECONDITIONED: </b> </label><span>$</span> 
					<input type="text" name="recondition" value="<?php echo isset($info['recondition'])?$info['recondition']:''; ?>" style="width: 57%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<p style="font-size: 14px; text-align: center;">THIS TRADE-IN OFFER EXPIRES 15 DAYS FROM TODAY’S DATE AND IS EFFECTIVE ONLY <br>
				IF THE MOTORCYCLE IS IN THE SAME CONDITION AS WHEN IT WAS INSPECTED.</p>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="customer_initials" value="<?php echo isset($info['customer_initials'])?$info['customer_initials']:''; ?>" style="width: 100%;">
					<label style="display: block; text-align: center;">(Customer’s Initials)</label>
				</div>
				
				<div class="form-field" style="float: right; width: 30%;">
					<label style="text-align: right; display: block;">Form Revised 02/05/2016</label>
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
