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
	label{font-size: 13px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left-side" style="float: left; width: 25%; text-align: center;">
				<div class="logo" style="width: 150px; margin: 0 auto">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/762/logo.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<p>PERFORMANCE CONSULTING</p>
			</div>
			<h2 style="float: left; width: 75%; text-align: center; margin: 45px 0;"><b>Pre Owned Motorcycle Appraisal</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 76%; margin: 0;">
				<label>Customer Name</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 85%">
			</div>
			<div class="from-field" style="float: left; width: 24%; margin: 0;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="float: right; width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 70%; margin: 0;">
				<label>Address</label>
				<input type="text" name="address_data"  value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 90%">
			</div>
			<div class="from-field" style="float: left; width: 30%; margin: 0;">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] :  ''; ?>" style="width: 84%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 60%; margin: 0;">
				<label>Interested In</label>
				<input type="text" name="intrested_in" value="<?php echo isset($info['intrested_in']) ? $info['intrested_in'] : ''; ?>" style="width: 85%">
			</div>
			<div class="from-field" style="float: left; width: 40%; margin: 0;">
				<label>Stock No.</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 83%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 20%; margin: 0;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 82%">
			</div>
			<div class="from-field" style="float: left; width: 50%; margin: 0;">
				<label>Make & Model</label>
				<input type="text" name="year" value="<?php echo isset($info['make_model']) ? $info['make_model'] : $info['make'].' '.$info['model']; ?>" style="width: 79%">
			</div>
			<div class="from-field" style="float: left; width: 30%; margin: 0;">
				<label>Mileage</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 81%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 50%; margin: 0;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 90%">
			</div>
			<div class="from-field" style="float: left; width: 50%; margin: 0;">
				<label>Crankcase No.</label>
				<input type="text" name="crankcase" value="<?php echo isset($info['crankcase']) ? $info['crankcase'] : ''; ?>" style="width: 80%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 33%; margin: 0;">
				<label>Frame No.</label>
				<input type="text" name="frame_no" value="<?php echo isset($info['frame_no']) ? $info['frame_no'] : ''; ?>" style="width: 77%">
			</div>
			<div class="from-field" style="float: left; width: 34%; margin: 0;">
				<label>Title No.</label>
				<input type="text" name="title_no" value="<?php echo isset($info['title_no']) ? $info['title_no'] : ''; ?>" style="width: 80%">
			</div>
			<div class="from-field" style="float: left; width: 33%; margin: 0;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 73%">	
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" style="float: left; width: 100%; margin: 7px 0 0;">
				<tr>
					<th style="width: 22%;"><b>Item</b></th>
					<th style="width: 6%;">/</th>
					<th colspan="2" style="width: 22%;">Reconditioning Amount</th>
					<th style="width: 22%;"><b>Item</b></th>
					<th style="width: 6%;">/</th>
					<th colspan="2" style="width: 22%;">Reconditioning Amount</th>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Frame</b></td>
					<td style="width: 6%;"><input type="text" name="frame" value="<?php echo isset($info['frame']) ? $info['frame'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="frame_price" value="<?php echo isset($info['frame_price']) ? $info['frame_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="frame_amt" value="<?php echo isset($info['frame_amt']) ? $info['frame_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Transmission</b></td>
					<td style="width: 6%;"><input type="text" name="trans" value="<?php echo isset($info['trans']) ? $info['trans'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="trans_price" value="<?php echo isset($info['trans_price']) ? $info['trans_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 9%;"><input type="text" name="trans_amt" value="<?php echo isset($info['trans_amt']) ? $info['trans_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Fenders</b></td>
					<td style="width: 6%;"><input type="text" name="fender" value="<?php echo isset($info['fender']) ? $info['fender'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="fender_price" value="<?php echo isset($info['fender_price']) ? $info['fender_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="fender_amt" value="<?php echo isset($info['fender_amt']) ? $info['fender_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Clutch</b></td>
					<td style="width: 6%;"><input type="text" name="clutch" value="<?php echo isset($info['clutch']) ? $info['clutch'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="clutch_price" value="<?php echo isset($info['clutch_price']) ? $info['clutch_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="clutch_amt" value="<?php echo isset($info['clutch_amt']) ? $info['clutch_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Forks</b></td>
					<td style="width: 6%;"><input type="text" name="fork" value="<?php echo isset($info['fork']) ? $info['fork'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="fork_price" value="<?php echo isset($info['fork_price']) ? $info['fork_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="fork_amt" value="<?php echo isset($info['fork_amt']) ? $info['fork_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Cables</b></td>
					<td style="width: 6%;"><input type="text" name="cables" value="<?php echo isset($info['cables']) ? $info['cables'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="cables_price" value="<?php echo isset($info['cables_price']) ? $info['cables_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="cables_amt" value="<?php echo isset($info['cables_amt']) ? $info['cables_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Chrome</b></td>
					<td style="width: 6%;"><input type="text" name="chrome" value="<?php echo isset($info['chrome']) ? $info['chrome'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="chrome_price" value="<?php echo isset($info['chrome_price']) ? $info['chrome_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="chrome_amt" value="<?php echo isset($info['chrome_amt']) ? $info['chrome_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Fuel Tank</b></td>
					<td style="width: 6%;"><input type="text" name="fuel" value="<?php echo isset($info['fuel']) ? $info['fuel'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="fuel_price" value="<?php echo isset($info['fuel_price']) ? $info['fuel_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="fuel_amt" value="<?php echo isset($info['fuel_amt']) ? $info['fuel_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Seat</b></td>
					<td style="width: 6%;"><input type="text" name="seat" value="<?php echo isset($info['seat']) ? $info['seat'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="seat_price" value="<?php echo isset($info['seat_price']) ? $info['seat_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="seat_amt" value="<?php echo isset($info['seat_amt']) ? $info['seat_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Final Drive System</b></td>
					<td style="width: 6%;"><input type="text" name="final" value="<?php echo isset($info['final']) ? $info['final'] : ''; ?>"  style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="final_price" value="<?php echo isset($info['final_price']) ? $info['final_price'] : ''; ?>"  style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="final_amt" value="<?php echo isset($info['final_amt']) ? $info['final_amt'] : ''; ?>"  style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th colspan="4">&nbsp;</th>
					<th colspan="4">&nbsp;</th>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Tachometer</b></td>
					<td style="width: 6%;"><input type="text" name="tacho" value="<?php echo isset($info['tacho']) ? $info['tacho'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="tacho_price" value="<?php echo isset($info['tacho_price']) ? $info['tacho_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="tacho_amt" value="<?php echo isset($info['tacho_amt']) ? $info['tacho_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Windshield</b></td>
					<td style="width: 6%;"><input type="text" name="wind" value="<?php echo isset($info['wind']) ? $info['wind'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="wind_price" value="<?php echo isset($info['wind_price']) ? $info['wind_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="wind_amt" value="<?php echo isset($info['wind_amt']) ? $info['wind_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Speedometer</b></td>
					<td style="width: 6%;"><input type="text" name="speed" value="<?php echo isset($info['speed']) ? $info['speed'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="speed_price" value="<?php echo isset($info['speed_price']) ? $info['speed_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="speed_amt" value="<?php echo isset($info['speed_amt']) ? $info['speed_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Fairing</b></td>
					<td style="width: 6%;"><input type="text" name="fairing" value="<?php echo isset($info['fairing']) ? $info['fairing'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="fairing_price" value="<?php echo isset($info['fairing_price']) ? $info['fairing_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="fairing_amt" value="<?php echo isset($info['fairing_amt']) ? $info['fairing_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Mirrors</b></td>
					<td style="width: 6%;"><input type="text" name="mirror" value="<?php echo isset($info['mirror']) ? $info['mirror'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="mirror_price" value="<?php echo isset($info['mirror_price']) ? $info['mirror_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="mirror_amt" value="<?php echo isset($info['mirror_amt']) ? $info['mirror_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Radio</b></td>
					<td style="width: 6%;"><input type="text" name="radio" value="<?php echo isset($info['radio']) ? $info['radio'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="radio_price" value="<?php echo isset($info['radio_price']) ? $info['radio_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="radio_amt" value="<?php echo isset($info['radio_amt']) ? $info['radio_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Horn</b></td>
					<td style="width: 6%;"><input type="text" name="horn" value="<?php echo isset($info['horn']) ? $info['horn'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="horn_price" value="<?php echo isset($info['horn_price']) ? $info['horn_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="horn_amt" value="<?php echo isset($info['horn_amt']) ? $info['horn_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 50%; background-color: #ccc;" colspan="4">&nbsp;</td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="2"><b>Wheels <br> Spoke <input type="text" name="spoke" value="<?php echo isset($info['spoke']) ? $info['spoke'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Mag <input type="text" name="mag" value="<?php echo isset($info['mag']) ? $info['mag'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></b></td>
					<td style="width: 6%;" rowspan="2"><input type="text" name="wheel" value="<?php echo isset($info['wheel']) ? $info['wheel'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="2"><input type="text" name="wheel_price" value="<?php echo isset($info['wheel_price']) ? $info['wheel_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="2"><input type="text" name="wheel_amt" value="<?php echo isset($info['wheel_amt']) ? $info['wheel_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Saddle Bags</b></td>
					<td style="width: 6%;"><input type="text" name="saddle" value="<?php echo isset($info['saddle']) ? $info['saddle'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="saddle_price" value="<?php echo isset($info['saddle_price']) ? $info['saddle_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="saddle_amt" value="<?php echo isset($info['saddle_amt']) ? $info['saddle_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Trunk</b></td>
					<td style="width: 6%;"><input type="text" name="trunk" value="<?php echo isset($info['trunk']) ? $info['trunk'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="trunk_price" value="<?php echo isset($info['trunk_price']) ? $info['trunk_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="trunk_amt" value="<?php echo isset($info['trunk_amt']) ? $info['trunk_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Tires</b></td>
					<td style="width: 6%;"><input type="text" name="tire" value="<?php echo isset($info['tire']) ? $info['tire'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="tire_price" value="<?php echo isset($info['tire_price']) ? $info['tire_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="tire_amt" value="<?php echo isset($info['tire_amt']) ? $info['tire_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Luggage Rack</b></td>
					<td style="width: 6%;"><input type="text" name="rack" value="<?php echo isset($info['rack']) ? $info['rack'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="rack_price" value="<?php echo isset($info['rack_price']) ? $info['rack_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="rack_amt" value="<?php echo isset($info['rack_amt']) ? $info['rack_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="3"><b>Shocks <br> RF <input type="text" name="shock_rf" value="<?php echo isset($info['shock_rf']) ? $info['shock_rf'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LF <input type="text" name="shock_lf" value="<?php echo isset($info['shock_lf']) ? $info['shock_lf'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> <br>  RR <input type="text" name="shock_rr" value="<?php echo isset($info['shock_rr']) ? $info['shock_rr'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LR <input type="text" name="shock_lr" value="<?php echo isset($info['shock_lr']) ? $info['shock_lr'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></b></td>
					<td style="width: 6%;" rowspan="3"><input type="text" name="shock" value="<?php echo isset($info['shock']) ? $info['shock'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="3"><input type="text" name="shock_price" value="<?php echo isset($info['shock_price']) ? $info['shock_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="3"><input type="text" name="shock_amt" value="<?php echo isset($info['shock_amt']) ? $info['shock_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Sissy Bar</b></td>
					<td style="width: 6%;"><input type="text" name="sissy" value="<?php echo isset($info['sissy']) ? $info['sissy'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="sissy_price" value="<?php echo isset($info['sissy_price']) ? $info['sissy_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="sissy_amt" value="<?php echo isset($info['sissy_amt']) ? $info['sissy_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td style="width: 22%;" ><b>Frame/Engine <br> Guards</b></td>
					<td style="width: 6%;" ><input type="text" name="guard" value="<?php echo isset($info['guard']) ? $info['guard'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" ><input type="text" name="guard_price" value="<?php echo isset($info['guard_price']) ? $info['guard_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" ><input type="text" name="guard_amt" value="<?php echo isset($info['guard_amt']) ? $info['guard_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" ><b>Handle</b></td>
					<td style="width: 6%;" ><input type="text" name="handle" value="<?php echo isset($info['handle']) ? $info['handle'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="handle_price" value="<?php echo isset($info['handle_price']) ? $info['handle_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" ><input type="text" name="handle_amt" value="<?php echo isset($info['handle_amt']) ? $info['handle_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<th colspan="4">&nbsp;</th>
					<th colspan="4">&nbsp;</th>
				</tr>
				
				
				<tr>
					<td style="width: 22%;"><b>Steering Head</b></td>
					<td style="width: 6%;"><input type="text" name="steering" value="<?php echo isset($info['steering']) ? $info['steering'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="steering_price" value="<?php echo isset($info['steering_price']) ? $info['steering_price'] : ''; ?>"  style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="steering_amt" value="<?php echo isset($info['steering_amt']) ? $info['steering_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>General Condition</b></td>
					<td style="width: 6%;"><input type="text" name="general" value="<?php echo isset($info['general']) ? $info['general'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="general_price" value="<?php echo isset($info['general_price']) ? $info['general_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="steering_amt" value="<?php echo isset($info['steering_amt']) ? $info['steering_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Brakes</b></td>
					<td style="width: 6%;"><input type="text" name="branck" value="<?php echo isset($info['general']) ? $info['general'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="brake_price" value="<?php echo isset($info['brake_price']) ? $info['brake_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="brake_amt" value="<?php echo isset($info['brake_amt']) ? $info['brake_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Clean-Up</b></td>
					<td style="width: 6%;"><input type="text" name="clean" value="<?php echo isset($info['clean']) ? $info['clean'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="clean_price" value="<?php echo isset($info['clean_price']) ? $info['clean_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="clean_amt" value="<?php echo isset($info['clean_amt']) ? $info['clean_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<td style="width: 22%;"><b>Exhaust</b></td>
					<td style="width: 6%;"><input type="text" name="exhaust" value="<?php echo isset($info['exhaust']) ? $info['exhaust'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="exhaust_price" value="<?php echo isset($info['exhaust_price']) ? $info['exhaust_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="exhaust_amt" value="<?php echo isset($info['exhaust_amt']) ? $info['exhaust_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;" colspan="2"><b>Reconditioning Total</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="recond_price" value="<?php echo isset($info['recond_price']) ? $info['recond_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="recond_amt" value="<?php echo isset($info['recond_amt']) ? $info['recond_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="2"><b>Engine</b> <br>5 <input type="text" name="engine_5" value="<?php echo isset($info['engine_5']) ? $info['engine_5'] : ''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 4 <input type="text" name="engine_4" value="<?php echo isset($info['engine_4']) ? $info['engine_4'] : ''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 3 <input type="text" name="engine_3" value="<?php echo isset($info['engine_3']) ? $info['engine_3'] : ''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 2 <input type="text" name="engine_2" value="<?php echo isset($info['engine_2']) ? $info['engine_2'] : ''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 1 <input type="text" name="engine_1" value="<?php echo isset($info['engine_1']) ? $info['engine_1'] : ''; ?>" style="width: 7%; border-bottom: 1px solid #000;"></td>
					<td style="width: 6%;" rowspan="2"><input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="2"><input type="text" name="engine_price" value="<?php echo isset($info['engine_price']) ? $info['engine_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="2"><input type="text" name="recond_amt" value="<?php echo isset($info['recond_amt']) ? $info['recond_amt'] : ''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;" colspan="2"><b>Motorcycle Average Value</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="motor_price" value="<?php echo isset($info['motor_price']) ? $info['motor_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="motor_amt" value="<?php echo isset($info['motor_amt']) ? $info['motor_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" colspan="2"><b>Reconditioning Total</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="recond_price" value="<?php echo isset($info['recond_price']) ? $info['recond_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="recond_amt" value="<?php echo isset($info['recond_amt']) ? $info['recond_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%; background-color: #ccc;" colspan="4">&nbsp;</td>
					<td style="width: 22%;" colspan="2"><b>Handling</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="hand_price" value="<?php echo isset($info['hand_price']) ? $info['hand_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="hand_amt" value="<?php echo isset($info['hand_amt']) ? $info['hand_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 50%;" colspan="4" rowspan="4">
						<b style="margin-bottom: 4px; float: left; width: 100%; display: block; text-decoration: underline;">Disposition</b>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Retail "As Is":</b></label>
							<input type="text" name="retail" value="<?php echo isset($info['retail']) ? $info['retail'] : ''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Recondition:</b></label>
							<input type="text" name="recondition" value="<?php echo isset($info['recondition']) ? $info['recondition'] : ''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Wholesale:</b></label>
							<input type="text" name="wholesale" value="<?php echo isset($info['wholesale']) ? $info['wholesale'] : ''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
					</td>
					<td style="width: 22%;" colspan="2"><b>Appraisal Value</b></td>
					<td style="width: 23%;"><b>$</b><input type="text" name="appraisal_price" value="<?php echo isset($info['appraisal_price']) ? $info['appraisal_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="appraisal_amt" value="<?php echo isset($info['appraisal_amt']) ? $info['appraisal_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" colspan="2"><b>Allowance</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="allowance_price" value="<?php echo isset($info['allowance_price']) ? $info['allowance_price'] : ''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="allowance_amt" value="<?php echo isset($info['allowance_amt']) ? $info['allowance_amt'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 50%;" colspan="4" rowspan="2"><textarea style="width: 98%; border: 0; height: 50px;"></textarea></td>
				</tr>
			</table>
			
			<table cellpadding="0" cellspacing="0" style="width: 100%; border-top: 0px;">				
				<tr>
					<td style="width: 48.1%;" colspan="5">
						<label><b>Dealer</b></label>
						<input type="text" name="dealer" value="<?php echo isset($info['dealer']) ? $info['dealer'] : ''; ?>" style="width: 70%;">
					</td>
					<td style="width: 53%;" colspan="5">
						<label><b>Appraiser</b></label>
						<input type="text" name="appraiser" value="<?php echo isset($info['appraiser']) ? $info['appraiser'] : ''; ?>" style="width: 70%;">
					</td>
				</tr>
			</table>
			
			
			<h3 style="float: left; width: 100%; font-size: 15px; margin: 10px 0;"><b>THIS TRADE-IN OFFER EXPIRES <input type="text" name="expire-1" value="<?php echo isset($info['expire-1']) ? $info['expire-1'] : ''; ?>" style="width: 7%;">/<input type="text" name="expire-2" value="<?php echo isset($info['expire-2']) ? $info['expire-2'] : ''; ?>" style="width: 7%;"> / <input type="text" name="expire-3" value="<?php echo isset($info['expire-3']) ? $info['expire-3'] : ''; ?>" style="width: 7%;"> AND IS EFFECTIVE ONLY IF THE MOTORCYCLE IS IN THE SAME CONDITION AS WHEN IT
WAS INSPECTED.</b></h3>
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
