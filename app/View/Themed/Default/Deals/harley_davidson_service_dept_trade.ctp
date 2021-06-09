<?php
//This Custom form Mapped Author: Abha Sood Negi

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

	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	
	<style>
		#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 15px; font-weight: normal;}
		th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 7px; font-weight: normal;}
		table{border-top: 1px solid #000; border-right: 1px solid #000; margin: 15px 0; float: left; width: 100%; font-size: 14px;}
		table input[type="text"]{border: 0px;}
		.wraper.main input {padding: 2px;}
		td, td label {font-size: 13px;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" style="float: left; width: 100%; text-align: center;">
			<?php  if($cid == 4435 || $cid == 4430){ ?>
				<div class="logo" style="display: inline-block; width: 11%;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a1.jpg'); ?>" alt="" style="width: 100%;">
				</div>
			<?php } ?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo" style="display: inline-block; width: 16%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php  if($cid == 4440){?>
			<div class="logo" style="display: inline-block; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a3.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0; margin: 19px 0; font-size: 22px;">Pre-Owned Motorcycle Appraisal</h2>
		<h3 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0;">Service Department Form </h3>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 75%;">
				<label>Customer Name</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : date("m/d/Y"); ?>" style="width: 75%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: right; width: 65%;">
				<label>Customer Email Address</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label>Color</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>VIN#</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>ND Plate #</label>
				<input type="text" name="nd_plate" value="<?php echo isset($info['nd_plate']) ? $info['nd_plate'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 38%;">
				<label>Salesman</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 38%;">
				<label>Service Advisor</label>
				<input type="text" name="service_advisor" value="<?php echo isset($info['service_advisor']) ? $info['service_advisor'] : ''; ?>" style="width: 69%;">
			</div>
			<div class="form-field" style="float: left; width: 24%;">
				<label>Miles</label>
				<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 79%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; margin: 2px 0; font-size: 14px;">(Below to be filled out by Appraiser)</p>
		
		<table class="table" cellpadding="0" cellspacing="0" style="float: left; width: 100%;">
			<tr>
				<th style="width: 20%;">Item</th>
				<th style="width: 5%;">X</th>
				<th style="width: 7%;">Amount</th>
				<th style="width: 20%;">Item</th>
				<th style="width: 5%;">X</th>
				<th style="width: 7%;">Amount</th>
				<th style="width: 20%;">Item</th>
				<th style="width: 5%;">X</th>
				<th style="width: 7%;">Amount</th>
			</tr>
			
			<tr>
				<td>1. Handlebars/Bushings</td>
				<td><input type="text" name="handlebars1" value="<?php echo isset($info['handlebars1']) ? $info['handlebars1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="handlebars2" value="<?php echo isset($info['handlebars2']) ? $info['handlebars2'] : ''; ?>" style="width: 100%;"></td>
				<td>9. Windshield</td>
				<td><input type="text" name="windshield1" value="<?php echo isset($info['windshield1']) ? $info['windshield1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="windshield2" value="<?php echo isset($info['windshield2']) ? $info['windshield2'] : ''; ?>" style="width: 100%;"></td>
				<td>17. Engine Noise</td>
				<td><input type="text" name="engine_noise1" value="<?php echo isset($info['engine_noise1']) ? $info['engine_noise1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="engine_noise2" value="<?php echo isset($info['engine_noise2']) ? $info['engine_noise2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>2. Grips</td>
				<td><input type="text" name="grips1" value="<?php echo isset($info['grips1']) ? $info['grips1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="grips2" value="<?php echo isset($info['grips2']) ? $info['grips2'] : ''; ?>" style="width: 100%;"></td>
				<td>10. Painted Parts</td>
				<td><input type="text" name="painted_parts1" value="<?php echo isset($info['painted_parts1']) ? $info['painted_parts1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="painted_parts2" value="<?php echo isset($info['painted_parts2']) ? $info['painted_parts2'] : ''; ?>" style="width: 100%;"></td>
				<td>18. Transmission</td>
				<td><input type="text" name="transmission1" value="<?php echo isset($info['transmission1']) ? $info['transmission1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="transmission2" value="<?php echo isset($info['transmission2']) ? $info['transmission2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>3. Forks</td>
				<td><input type="text" name="forks1" value="<?php echo isset($info['forks1']) ? $info['forks1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="forks2" value="<?php echo isset($info['forks2']) ? $info['forks2'] : ''; ?>" style="width: 100%;"></td>
				<td>11. Physical Damage</td>
				<td><input type="text" name="physical_damage1" value="<?php echo isset($info['physical_damage1']) ? $info['physical_damage1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="physical_damage2" value="<?php echo isset($info['physical_damage2']) ? $info['physical_damage2'] : ''; ?>" style="width: 100%;"></td>
				<td>19. Oil Leaks</td>
				<td><input type="text" name="oil_leaks1" value="<?php echo isset($info['oil_leaks1']) ? $info['oil_leaks1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="oil_leaks2" value="<?php echo isset($info['oil_leaks2']) ? $info['oil_leaks2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>4. Lights</td>
				<td><input type="text" name="lights1" value="<?php echo isset($info['lights1']) ? $info['lights1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="lights2" value="<?php echo isset($info['lights2']) ? $info['lights2'] : ''; ?>" style="width: 100%;"></td>
				<td>12. Seat</td>
				<td><input type="text" name="seat1" value="<?php echo isset($info['seat1']) ? $info['seat1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="seat2" value="<?php echo isset($info['seat2']) ? $info['seat2'] : ''; ?>" style="width: 100%;"></td>
				<td>20. Cam Chest</td>
				<td><input type="text" name="cam_chest1" value="<?php echo isset($info['cam_chest1']) ? $info['cam_chest1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="cam_chest2" value="<?php echo isset($info['cam_chest2']) ? $info['cam_chest2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>5. Turn Signals</td>
				<td><input type="text" name="turn_signals1" value="<?php echo isset($info['turn_signals1']) ? $info['turn_signals1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="turn_signals2" value="<?php echo isset($info['turn_signals2']) ? $info['turn_signals2'] : ''; ?>" style="width: 100%;"></td>
				<td>13. Saddle Bags</td>
				<td><input type="text" name="saddle_bags1" value="<?php echo isset($info['saddle_bags1']) ? $info['saddle_bags1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="saddle_bags2" value="<?php echo isset($info['saddle_bags2']) ? $info['saddle_bags2'] : ''; ?>" style="width: 100%;"></td>
				<td>21. Belt</td>
				<td><input type="text" name="belt1" value="<?php echo isset($info['belt1']) ? $info['belt1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="belt2" value="<?php echo isset($info['belt2']) ? $info['belt2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>6. Gauges</td>
				<td><input type="text" name="gauges1" value="<?php echo isset($info['gauges1']) ? $info['gauges1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="gauges2" value="<?php echo isset($info['gauges2']) ? $info['gauges2'] : ''; ?>" style="width: 100%;"></td>
				<td>14. Floor Boards/Pegs</td>
				<td><input type="text" name="floor_pegs1" value="<?php echo isset($info['floor_pegs1']) ? $info['floor_pegs1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="floor_pegs2" value="<?php echo isset($info['floor_pegs2']) ? $info['floor_pegs2'] : ''; ?>" style="width: 100%;"></td>
				<td>22.</td>
				<td><input type="text" name="text22_1" value="<?php echo isset($info['text22_1']) ? $info['text22_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="text22_2" value="<?php echo isset($info['text22_2']) ? $info['text22_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>7. Sound System</td>
				<td><input type="text" name="sound_system1" value="<?php echo isset($info['sound_system1']) ? $info['sound_system1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="sound_system2" value="<?php echo isset($info['sound_system2']) ? $info['sound_system2'] : ''; ?>" style="width: 100%;"></td>
				<td>15. Brakes</td>
				<td><input type="text" name="brakes1" value="<?php echo isset($info['brakes1']) ? $info['brakes1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="brakes2" value="<?php echo isset($info['brakes2']) ? $info['brakes2'] : ''; ?>" style="width: 100%;"></td>
				<td>23.</td>
				<td><input type="text" name="text23_1" value="<?php echo isset($info['text23_1']) ? $info['text23_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="text23_2" value="<?php echo isset($info['text23_2']) ? $info['text23_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>8. Mirrors</td>
				<td><input type="text" name="mirrors1" value="<?php echo isset($info['mirrors1']) ? $info['mirrors1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col1-cal" name="mirrors2" value="<?php echo isset($info['mirrors2']) ? $info['mirrors2'] : ''; ?>" style="width: 100%;"></td>
				<td>16. Clutch</td>
				<td><input type="text" name="clutch1" value="<?php echo isset($info['clutch1']) ? $info['clutch1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col2-cal" name="clutch2" value="<?php echo isset($info['clutch2']) ? $info['clutch2'] : ''; ?>" style="width: 100%;"></td>
				<td>24.</td>
				<td><input type="text" name="text24_1" value="<?php echo isset($info['text24_1']) ? $info['text24_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" class="total-col3-cal" name="text24_2" value="<?php echo isset($info['text24_2']) ? $info['text24_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Total Column 1</td>
				<td>$</td>
				<td><input type="text" id="cal-total-col1" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;"></td>
				<td>Total Column 2</td>
				<td>$</td>
				<td><input type="text" id="cal-total-col2" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;"></td>
				<td>Total Column 3</td>
				<td>$</td>
				<td><input type="text" id="cal-total-col3" name="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="width: 25%;">
					<label>25. Battery</label>
					<input type="text" name="battery" value="<?php echo isset($info['battery']) ? $info['battery'] : ''; ?>" style="width: 50%;">
				</td>
				<td style="width: 25%;">
					<label>26. Front Tire</label>
					<input type="text" name="front_tire" value="<?php echo isset($info['front_tire']) ? $info['front_tire'] : ''; ?>" style="width: 50%;">
				</td>
				<td style="width: 25%;">
					<label>27. Rear Tire</label>
					<input type="text" name="rear_tire" value="<?php echo isset($info['rear_tire']) ? $info['rear_tire'] : ''; ?>" style="width: 50%;">
				</td>
				<td style="width: 25%;">
					<label>28. Scheduled Service</label>
					<input type="text" name="scheduled_service" value="<?php echo isset($info['scheduled_service']) ? $info['scheduled_service'] : ''; ?>" style="width: 34%;">
				</td>
			</tr>
			
			<tr>
				<td style="width: 25%;">
					<label>Replacement Date</label>
					<input type="text" name="rep_date_day" value="<?php echo isset($info['rep_date_day']) ? $info['rep_date_day'] : ''; ?>" style="width: 12%;">/
					<input type="text" name="rep_date_month" value="<?php echo isset($info['rep_date_month']) ? $info['rep_date_month'] : ''; ?>" style="width: 12%;">/
					<input type="text" name="rep_date_year" value="<?php echo isset($info['rep_date_year']) ? $info['rep_date_year'] : ''; ?>" style="width: 12%;">
				</td>
				<td style="width: 25%;">
					<label>Brand</label>
					<input type="text" name="brand1" value="<?php echo isset($info['brand1']) ? $info['brand1'] : ''; ?>" style="width: 50%;">
				</td>
				<td style="width: 25%;">
					<label>Brand</label>
					<input type="text" name="brand2" value="<?php echo isset($info['brand2']) ? $info['brand2'] : ''; ?>" style="width: 50%;">
				</td>
				<td style="width: 25%;">
					<label>Last Service Date</label>
					<input type="text" name="service_date_day" value="<?php echo isset($info['service_date_day']) ? $info['service_date_day'] : ''; ?>" style="width: 12%;">/
					<input type="text" name="service_date_month" value="<?php echo isset($info['service_date_month']) ? $info['service_date_month'] : ''; ?>" style="width: 12%;">/
					<input type="text" name="service_date_year" value="<?php echo isset($info['service_date_year']) ? $info['service_date_year'] : ''; ?>" style="width: 12%;">
				</td>
			</tr>
			
			<tr>
				<td style="width: 25%;">
					<label>Harley Brand</label>
					<span>
						<input type="radio" name="harley_brand" value="yes" <?php echo (isset($info['harley_brand']) && $info['harley_brand']=='yes')?'checked="checked"':''; ?> />
					</span> Yes /
					<span>
						<input type="radio" name="harley_brand" value="no" <?php echo (isset($info['harley_brand']) && $info['harley_brand']=='no')?'checked="checked"':''; ?> />
					</span> No
				</td>
				<td style="width: 25%;">
					<label>Tread Depth</label>
					<input type="text" name="tread_depth1" value="<?php echo isset($info['tread_depth1']) ? $info['tread_depth1'] : ''; ?>" style="width: 40%;">/32
				</td>
				<td style="width: 25%;">
					<label>Tread Depth</label>
					<input type="text" name="tread_depth2" value="<?php echo isset($info['tread_depth2']) ? $info['tread_depth2'] : ''; ?>" style="width: 40%;">/32
				</td>
				<td style="width: 25%;">
					<label>By Whom</label>
					<input type="text" name="by_whom" value="<?php echo isset($info['by_whom']) ? $info['by_whom'] : ''; ?>" style="width: 60%;">
				</td>
			</tr>
			
			<tr>
				<td style="width: 25%;">
					<label>Load Test</label>
					<input type="text" name="load_test" value="<?php echo isset($info['load_test']) ? $info['load_test'] : ''; ?>" style="width: 60%;">
				</td>
				<td style="width: 25%;">
					<label>Damage</label>
					<span>
						<input type="radio" name="damage1" value="yes" <?php echo (isset($info['damage1']) && $info['damage1']=='yes')?'checked="checked"':''; ?> />
					</span> Yes /
					<span>
						<input type="radio" name="damage1" value="no" <?php echo (isset($info['damage1']) && $info['damage1']=='no')?'checked="checked"':''; ?> />
					 </span> No
				</td>
				<td style="width: 25%;">
					<label>Damage</label>
					<span>
						<input type="radio" name="damage2" value="yes" <?php echo (isset($info['damage2']) && $info['damage2']=='yes')?'checked="checked"':''; ?> />
					</span> Yes /
					<span>
						<input type="radio" name="damage2" value="no" <?php echo (isset($info['damage2']) && $info['damage2']=='no')?'checked="checked"':''; ?> />
					</span> No
				</td>
				<td style="width: 25%;">
					<label>Receipt </label>
					<span>
						<input type="radio" name="receipt" value="yes" <?php echo (isset($info['receipt']) && $info['receipt']=='yes')?'checked="checked"':''; ?> />
					</span> Yes /
					<span>
						<input type="radio" name="receipt" value="no" <?php echo (isset($info['receipt']) && $info['receipt']=='no')?'checked="checked"':''; ?> />
					</span> No
				</td>
			</tr>

			<tr>
				<td style="width: 25%;">
					<label>Replacement Amount $</label>
					<input type="text" name="amount1" value="<?php echo isset($info['amount1']) ? $info['amount1'] : ''; ?>" style="width: 35%;">
				</td>
				<td style="width: 25%;">
					<label>Replacement Amount $</label>
					<input type="text" name="amount2" value="<?php echo isset($info['amount2']) ? $info['amount2'] : ''; ?>" style="width: 35%;">
				</td>
				<td style="width: 25%;">
					<label>Replacement Amount $</label>
					<input type="text" name="amount3" value="<?php echo isset($info['amount3']) ? $info['amount3'] : ''; ?>" style="width: 35%;">
				</td>
				<td style="width: 25%;">
					<label>Replacement Amount $</label>
					<input type="text" name="amount4" value="<?php echo isset($info['amount4']) ? $info['amount4'] : ''; ?>" style="width: 35%;">
				</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-filed" style="float: left; width: 46%;">
				<label>Remarks: (Use the number lines above)</label>
				<input type="text" name="remarks1" value="<?php echo isset($info['remarks1']) ? $info['remarks1'] : ''; ?>" style="width: 40%; margin-bottom: 3px;">
				<input type="text" name="remarks2" value="<?php echo isset($info['remarks2']) ? $info['remarks2'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="remarks3" value="<?php echo isset($info['remarks3']) ? $info['remarks3'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="remarks4" value="<?php echo isset($info['remarks4']) ? $info['remarks4'] : ''; ?>" style="width: 100%; margin: 3px 0;">
			</div>
			<div class="divider" style="border-right: 1px solid #000; height: 120px; float: left; margin: 1% 0 0 4%;"></div>
			<div class="form-filed" style="float: right; width: 46%;">
				<input type="text" name="remarks5" value="<?php echo isset($info['remarks5']) ? $info['remarks5'] : ''; ?>" style="width: 100%; margin-bottom: 7px;">
				<input type="text" name="remarks6" value="<?php echo isset($info['remarks6']) ? $info['remarks6'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="remarks7" value="<?php echo isset($info['remarks7']) ? $info['remarks7'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="remarks8" value="<?php echo isset($info['remarks8']) ? $info['remarks8'] : ''; ?>" style="width: 100%; margin: 3px 0;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 20px 0; font-size: 18px;">
			<div class="form-field" style="float: left; width: 100%; text-align: center; margin: 7px 0 5px;">
				<label><strong>Service Test Ride?</strong></label>
				<span>
					<input type="radio" name="service_ride" value="yes" <?php echo (isset($info['service_ride']) && $info['service_ride']=='yes')?'checked="checked"':''; ?> />
				</span> Yes /
				<span>
					<input type="radio" name="service_ride" value="no" <?php echo (isset($info['service_ride']) && $info['service_ride']=='no')?'checked="checked"':''; ?> />
				</span> No
			</div>
			<div class="form-field" style="float: left; width: 100%; text-align: center;">
				<label><strong>Total Reconditioning $</strong></label>
				<input type="text" name="total_reconditioning" value="<?php echo isset($info['total_reconditioning']) ? $info['total_reconditioning'] : ''; ?>" style="width: 20%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; font-size: 14px; margin: 20px 0 4px;">THIS APPRAISAL IS ONLY VALID IF IT PASSES VIN INSPECTION.</p>
		<p style="float: left; width: 100%; text-align: center; font-size: 14px; margin: 4px 0 20px;">ALL APPRAISALS PERFORMED BY HARLEY-DAVIDSON OF FARGO EXPIRE 7 DAYS.</p>
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


			 $(".table tr").on('change keyup paste',function(){
			    var $this = this; 
			    calculate_row_total($this);
			  });
		});

		function calculate_row_total($this) {
		    var sum1 = 0.00;
		    var sum2 = 0.00;
		    var sum3 = 0.00;

		    $(".table").find('tr').each(function () {
			    var x1 = $(this).find('td:eq(1) input').val();
			    x1 = x1 ? parseFloat(x1) : 0.00;
			    var x2 = $(this).find('td:eq(4) input').val();
			    x2 = x2 ? parseFloat(x2) : 0.00;
			    var x3 = $(this).find('td:eq(7) input').val();
			    x3 = x3 ? parseFloat(x3) : 0.00;

		       	var amount1 = $(this).find('td:eq(2) input').val();
			    amount1 = amount1 ? parseFloat(amount1) : 0.00;
			    var amount2 = $(this).find('td:eq(5) input').val();
			    amount2 = amount2 ? parseFloat(amount2) : 0.00;
			    var amount3 = $(this).find('td:eq(8) input').val();
			    amount3 = amount3 ? parseFloat(amount3) : 0.00;

		        var total1 = x1*amount1;
		        var total2 = x2*amount2;
		        var total3 = x3*amount3;

		        sum1 += total1;
		        $("#cal-total-col1").val(sum1.toFixed(2));
		        sum2 += total2;
		        $("#cal-total-col2").val(sum2.toFixed(2));
		         sum3 += total3;
		        $("#cal-total-col3").val(sum3.toFixed(2));
	     	});
	 	 }
	</script>
</div>