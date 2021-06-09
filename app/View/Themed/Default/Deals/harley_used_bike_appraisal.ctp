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
			input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
			label{font-size: 14px;}
			table input[type="text"]{border: 0px;}
			td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 3px; text-align: center;}
			td{font-size: 13px; padding: 7px;}
			th{font-size: 14px;}
			table{border-top: 1px solid #000; border-left: 1px solid #000;}
			.wraper.main input {padding: 2px;}
			@media print {.dontprint{display: none;}}
		</style>

		<div class="wraper header"> 
			<!-- container start -->
			<h2 style="float: left; width: 100%; text-decoration: underline; font-size: 15px; text-align: center; margin: 50px 0 30px;"><strong>PRE-OWNED MOTORCYCLE APPRAISAL</strong></h2>
			<div class="row" style="float: left; width: 100%; margin:  5px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label>CUSTOMER</label>
					<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 85%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 60%;">
					<label>INTERESTED IN</label>
					<input type="text" name="intrested_in" value="<?php echo isset($info['intrested_in']) ? $info['intrested_in'] : ''; ?>" style="width: 78%">
				</div>
				<div class="form-field" style="float: left; width: 27%;">
					<label>STOCK #</label>
					<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 72%">
				</div>
				<div class="form-field" style="float: left; width: 13%;">
					<label>SP</label>
					<input type="text" name="sp" value="<?php echo isset($info['sp']) ? $info['sp'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="width: 16%; float: left;">
					<label>YEAR</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="width: 16%; float: left;">
					<label>MAKE</label>
					<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label>MODEL</label>
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 28%;">
					<label>MILEAGE</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 53%;">
					<label>A <span>TMU</span></label>
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 53%;">
					<label>VIN #</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; margin: 5px 0;">
					<label>ENG SIZE</label>
					<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 65%">
				</div>
				<div class="form-field" style="float: left; width: 22%; margin: 5px 0;">
					<label>FLOOD/SALVAGE </label> 
					<span>
						<input type="checkbox" name="flood_y" <?php echo ($info['flood_y'] == "flood_y") ? "checked" : ""; ?> value="flood_y" > Y
					</span>
					<span>
						<input type="checkbox" name="flood_n" <?php echo ($info['flood_n'] == "flood_n") ? "checked" : ""; ?> value="flood_n" > N
					</span>
				</div>
			</div>
		
		
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
				<table width="100%;" cellspacing="0" cellpadding="0" >
					<tr>
						<th style="width: 20%;">ITEM</th>
						<th style="width: 10%;">COND<br>1-9</th>
						<th style="width: 20%;">COMMENTS/<br>RECON EXPENSE</th>
						<th style="width: 20%;">ITEM</th>
						<th style="width: 10%;">COND<br>1-9</th>
						<th style="width: 20%;">COMMENTS/<br>RECON EXPENSE</th>
					</tr>
					<tr>
						<td>ENGINE</td>
						<td>
							<input type="text" name="engine1" value="<?php echo isset($info['engine1']) ? $info['engine1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="engine2" value="<?php echo isset($info['engine2']) ? $info['engine2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>TRANSMISSION</td>
						<td>
							<input type="text" name="transmission1" value="<?php echo isset($info['transmission1']) ? $info['transmission1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="transmission2" value="<?php echo isset($info['transmission2']) ? $info['transmission2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>FENDERS<br>
							<div class="cover" style="float: left; width: 100%; margin: 4px 0 0;">
								<div class="form-field" style="width: 49%; float: left; text-align: left;">
									<label>F</label>
									<input type="text" name="fenders_f" value="<?php echo isset($info['fenders_f']) ? $info['fenders_f'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
								<div class="form-field" style="width: 49%; float: right; text-align: left;">
									<label>R</label>
									<input type="text" name="fenders_r" value="<?php echo isset($info['fenders_r']) ? $info['fenders_r'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
							</div>
						</td>
						<td>
							<input type="text" name="fenders1" value="<?php echo isset($info['fenders1']) ? $info['fenders1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="fenders2" value="<?php echo isset($info['fenders2']) ? $info['fenders2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>FRAME/<br>FRAME TAB</td>
						<td>
							<input type="text" name="frame1" value="<?php echo isset($info['frame1']) ? $info['frame1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="frame2" value="<?php echo isset($info['frame2']) ? $info['frame2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>FUEL TANK</td>
						<td>
							<input type="text" name="fuel_tank1" value="<?php echo isset($info['fuel_tank1']) ? $info['fuel_tank1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="fuel_tank2" value="<?php echo isset($info['fuel_tank2']) ? $info['fuel_tank2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>FAIRING/<br>TRUNK</td>
						<td>
							<input type="text" name="fairing1" value="<?php echo isset($info['fairing1']) ? $info['fairing1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="fairing2" value="<?php echo isset($info['fairing2']) ? $info['fairing2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>CHROME</td>
						<td>
							<input type="text" name="chrome1" value="<?php echo isset($info['chrome1']) ? $info['chrome1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="chrome2" value="<?php echo isset($info['chrome2']) ? $info['chrome2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>SADDLEBAGS</td>
						<td>
							<input type="text" name="saddlebags1" value="<?php echo isset($info['saddlebags1']) ? $info['saddlebags1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="saddlebags2" value="<?php echo isset($info['saddlebags2']) ? $info['saddlebags2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>SEAT</td>
						<td>
							<input type="text" name="seat1" value="<?php echo isset($info['seat1seat1']) ? $info['seat1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="seat2" value="<?php echo isset($info['seat2']) ? $info['seat2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>BATTERY</td>
						<td>
							<input type="text" name="battery1" value="<?php echo isset($info['battery1']) ? $info['battery1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="battery2" value="<?php echo isset($info['battery2']) ? $info['battery2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>SPEEDO/<br>TACH</td>
						<td>
							<input type="text" name="speedo1" value="<?php echo isset($info['speedo1']) ? $info['speedo1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="speedo2" value="<?php echo isset($info['speedo2']) ? $info['speedo2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>LEVERS/<br>GRIPS</td>
						<td>
							<input type="text" name="levers1" value="<?php echo isset($info['levers1']) ? $info['levers1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="levers2" value="<?php echo isset($info['levers2']) ? $info['levers2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>LUGGAGE RACK</td>
						<td>
							<input type="text" name="luggage_rack1" value="<?php echo isset($info['luggage_rack1']) ? $info['luggage_rack1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="luggage_rack2" value="<?php echo isset($info['luggage_rack2']) ? $info['luggage_rack2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>WINDSHIELD</td>
						<td>
							<input type="text" name="windshield1" value="<?php echo isset($info['windshield1']) ? $info['windshield1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="windshield2" value="<?php echo isset($info['windshield2']) ? $info['windshield2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>HANDLE BARS</td>
						<td>
							<input type="text" name="handle_bars1" value="<?php echo isset($info['handle_bars1']) ? $info['handle_bars1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="handle_bars2" value="<?php echo isset($info['handle_bars2']) ? $info['handle_bars2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>SISSY BAR/ BACKREST </td>
						<td>
							<input type="text" name="sissy_bar1" value="<?php echo isset($info['sissy_bar1']) ? $info['sissy_bar1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="sissy_bar2" value="<?php echo isset($info['sissy_bar2']) ? $info['sissy_bar2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>MIRRORS</td>
						<td>
							<input type="text" name="mirrors1" value="<?php echo isset($info['mirrors1']) ? $info['mirrors1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="mirrors2" value="<?php echo isset($info['mirrors2']) ? $info['mirrors2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>RADIO/<br>SPEAKERS</td>
						<td>
							<input type="text" name="radio1" value="<?php echo isset($info['radio1']) ? $info['radio1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="radio2" value="<?php echo isset($info['radio2']) ? $info['radio2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>RIMS/WHEEL <br>
							<div class="cover" style="float: left; width: 100%; margin: 4px 0 0;">
								<div class="form-field" style="width: 49%; float: left; text-align: left;">
									<label>C</label>
									<input type="text" name="rims_c" value="<?php echo isset($info['rims_c']) ? $info['rims_c'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
								<div class="form-field" style="width: 49%; float: right; text-align: left;">
									<label>L</label>
									<input type="text" name="rims_l" value="<?php echo isset($info['rims_l']) ? $info['rims_l'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
							</div>
						</td>
						<td>
							<input type="text" name="rims1" value="<?php echo isset($info['rims1']) ? $info['rims1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="rims2" value="<?php echo isset($info['rims2']) ? $info['rims2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>FRONT<br>BRAKES</td>
						<td>
							<input type="text" name="front_brakes1" value="<?php echo isset($info['front_brakes1']) ? $info['front_brakes1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="front_brakes2" value="<?php echo isset($info['front_brakes2']) ? $info['front_brakes2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>TIRES<br>
							<div class="cover" style="float: left; width: 100%; margin: 4px 0 0;">
								<div class="form-field" style="width: 49%; float: left; text-align: left;">
									<label>F</label>
									<input type="text" name="tires_f" value="<?php echo isset($info['tires_f']) ? $info['tires_f'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
								<div class="form-field" style="width: 49%; float: right; text-align: left;">
									<label>R</label>
									<input type="text" name="tires_r" value="<?php echo isset($info['tires_r']) ? $info['tires_r'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
								</div>
							</div>
						</td>
						<td>
							<input type="text" name="tires1" value="<?php echo isset($info['tires1']) ? $info['tires1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="tires2" value="<?php echo isset($info['tires2']) ? $info['tires2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>REAR<br>BRAKES</td>
						<td>
							<input type="text" name="rear_brakes1" value="<?php echo isset($info['rear_brakes1']) ? $info['rear_brakes1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="rear_brakes2" value="<?php echo isset($info['rear_brakes2']) ? $info['rear_brakes2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>SIGNALS/<br>HEADLIGHTS</td>
						<td>
							<input type="text" name="signals1" value="<?php echo isset($info['signals1']) ? $info['signals1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="signals2" value="<?php echo isset($info['signals2']) ? $info['signals2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>HORN</td>
						<td>
							<input type="text" name="horn1" value="<?php echo isset($info['horn1']) ? $info['horn1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="horn2" value="<?php echo isset($info['horn2']) ? $info['horn2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>SHOCKS</td>
						<td>
							<input type="text" name="shocks1" value="<?php echo isset($info['shocks1']) ? $info['shocks1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="shocks2" value="<?php echo isset($info['shocks2']) ? $info['shocks2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>EXHAUST</td>
						<td>
							<input type="text" name="exhaust1" value="<?php echo isset($info['exhaust1']) ? $info['exhaust1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="exhaust2" value="<?php echo isset($info['exhaust2']) ? $info['exhaust2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>OTHER ACCESSORIES</td>
						<td>
							<input type="text" name="other_accessories1" value="<?php echo isset($info['other_accessories1']) ? $info['other_accessories1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="other_accessories2" value="<?php echo isset($info['other_accessories2']) ? $info['other_accessories2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>ENGINE GUARD</td>
						<td>
							<input type="text" name="engine_guard1" value="<?php echo isset($info['engine_guard1']) ? $info['engine_guard1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="engine_guard2" value="<?php echo isset($info['engine_guard2']) ? $info['engine_guard2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td>GENERAL CONDITION<br>
							<div class="cover" style="float: left; width: 100%; margin: 4px 0 0;">
								<div class="form-field" style="width: 33%; float: left; text-align: left;">
									<label>C</label>
									<input type="text" name="conditions_c" value="<?php echo isset($info['conditions_c']) ? $info['conditions_c'] : ''; ?>" style="width: 78%;">
								</div>
								<div class="form-field" style="width: 33%; float: left; text-align: left;">
									<label>F</label>
									<input type="text" name="conditions_f" value="<?php echo isset($info['conditions_f']) ? $info['conditions_f'] : ''; ?>" style="width: 78%;">
								</div>
								<div class="form-field" style="width: 33%; float: right; text-align: left;">
									<label>R</label>
									<input type="text" name="conditions_r" value="<?php echo isset($info['conditions_r']) ? $info['conditions_r'] : ''; ?>" style="width: 78%;">
								</div>
							</div>
						</td>
						<td>
							<input type="text" name="conditions1" value="<?php echo isset($info['conditions1']) ? $info['conditions1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="conditions2" value="<?php echo isset($info['conditions2']) ? $info['conditions2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>OVERALL SCORE<br> WS<span style="margin: 0 0 0 10px;">RETAIL</span></td>
						<td>
							<input type="text" name="overall_score1" value="<?php echo isset($info['overall_score1']) ? $info['overall_score1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="overall_score2" value="<?php echo isset($info['overall_score2']) ? $info['overall_score2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					
					<tr>
						<td rowspan="2" style="text-align: left;">TOTAL<br>EXPECTED<br>RECOND.<br>EXPENSE</td>
						<td rowspan="2">
							<input type="text" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;">
							<input type="text" name="expected1" value="<?php echo isset($info['expected1']) ? $info['expected1'] : ''; ?>" style="width: 100%;">
							<input type="text" name="recond1" value="<?php echo isset($info['recond1']) ? $info['recond1'] : ''; ?>" style="width: 100%;">
							<input type="text" name="expense1" value="<?php echo isset($info['expense1']) ? $info['expense1'] : ''; ?>" style="width: 100%;">
						</td>
						<td rowspan="2">
							<input type="text" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;">
							<input type="text" name="expected2" value="<?php echo isset($info['expected2']) ? $info['expected2'] : ''; ?>" style="width: 100%;">
							<input type="text" name="recond2" value="<?php echo isset($info['recond2']) ? $info['recond2'] : ''; ?>" style="width: 100%;">
							<input type="text" name="expense2" value="<?php echo isset($info['expense2']) ? $info['expense2'] : ''; ?>" style="width: 100%;">
						</td>
						<td>NPA VALUE</td>
						<td>
							<input type="text" name="npa_value1" value="<?php echo isset($info['npa_value1']) ? $info['npa_value1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="npa_value2" value="<?php echo isset($info['npa_value2']) ? $info['npa_value2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					
					<tr>
						<td>BLACK BOOK</td>
						<td>
							<input type="text" name="black_book1" value="<?php echo isset($info['black_book1']) ? $info['black_book1'] : ''; ?>" style="width: 100%;">
						</td>
						<td>
							<input type="text" name="black_book2" value="<?php echo isset($info['black_book2']) ? $info['black_book2'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					
					<tr>
						<td colspan="3" style="text-align: left; ">
							<strong>APPRAISER:</strong>
							<textarea name="appraiser" style="width: 100%; height: 50px; border: 0px;">
								<?php echo isset($info['appraiser']) ? $info['appraiser'] : ''; ?>
							</textarea>
						</td>
						<td colspan="3" style="text-align: left;">
							<strong style="font-size: 16px; margin-top: 12px; float: left;">ACV:</strong>
							<textarea name="acv" style="width: 80%; height: 50px; border: 0px;">
								<?php echo isset($info['acv']) ? $info['acv'] : ''; ?>
							</textarea>
						</td>
					</tr>
				</table>
			</div>
			<!-- container end -->
		</div>
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