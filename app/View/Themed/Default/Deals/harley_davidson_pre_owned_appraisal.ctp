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
	label{font-size: 13px;}
	.list li {display: inline-block; font-size: 13px; list-style: outside none none; width: 24%; margin-bottom: 7px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: left; padding: 1px 10px; font-size: 15px;}
	 table input[type="text"]{ border-bottom: 0px solid #000;}
	 table{border-top: 1px solid #000; border-left: 1px solid #000;}
	
	body{font-size: 12px;}
	.wraper.main input {padding: 5px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h1 style="text-align: center; font-size: 25px; margin: 20px 0 7px;"><b>Riders Harley-Davidson<br>Pre-Owned Motorcycle Appraisal</b></h1>
			<div class="form-field" style="float: left; width: 80%;">
				<label>Customer Name:</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date("m/d/Y") ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 81%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 62%;">
				<label>Interested In:</label>
				<input type="text" name="intrested_in" value="<?php echo isset($info['intrested_in']) ? $info['intrested_in'] : ''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left; width: 38%;">
				<label>Stock No.</label>
				<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Make & Model</label>
				<input type="text" name="make_model" value="<?php echo isset($info['make_model']) ? $info['make_model'] : $info['make']." ".$info['model']; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Mileage</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>VIN#:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Crankcase No.</label>
				<input type="text" name="crankcase" value="<?php echo isset($info['crankcase']) ? $info['crankcase'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 25px;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Frame No.</label>
				<input type="text" name="frame_no" value="<?php echo isset($info['frame_no']) ? $info['frame_no'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label> Title No.</label>
				<input type="text" name="title_no" value="<?php echo isset($info['title_no']) ? $info['title_no'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 71%;">
			</div>
		</div>
		
		
		<table cellpadding="0" cellspacing="0" style="width: 91%; margin:auto;">
			<tr style="background-color:#ccc;">
				<th style="width: 22%;">Item</th>
				<th style="width: 6%;">OK</th>
				<th colspan="2" style="width: 22%;">Reconditioning <br> Amount</th>
				<th style="width: 22%;">Item</th>
				<th style="width: 6%;">OK</th>
				<th colspan="2" style="width: 22%;">Reconditioning <br> Amount</th>
			</tr>
			
			<tr>
				<td>Frame</td>
				<td><input type="text" name="ok1_1" value="<?php echo isset($info['ok1_1']) ? $info['ok1_1'] : ''; ?>" style="width: 100%;"></td>
				<td style="width: 16%;">$ <input type="text" name="amout1_1" value="<?php echo isset($info['amout1_1']) ? $info['amout1_1'] : ''; ?>" style="width: 90%;"></td>
				<td style="width: 6%;"><input type="text" name="recond1_1" value="<?php echo isset($info['recond1_1']) ? $info['recond1_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Transmission</td>
				<td><input type="text" name="ok1_2" value="<?php echo isset($info['ok1_2']) ? $info['ok1_2'] : ''; ?>" style="width: 100%;"></td>
				<td style="width: 16%;">$ <input type="text" name="amout1_2" value="<?php echo isset($info['amout1_2']) ? $info['amout1_2'] : ''; ?>" style="width: 89%;"></td>
				<td style="width: 6%;"><input type="text" name="recond1_2" value="<?php echo isset($info['recond1_2']) ? $info['recond1_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Fenders</td>
				<td><input type="text" name="ok2_1" value="<?php echo isset($info['ok2_1']) ? $info['ok2_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout2_1" value="<?php echo isset($info['amout2_1']) ? $info['amout2_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond2_1" value="<?php echo isset($info['recond2_1']) ? $info['recond2_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Clutch</td>
				<td><input type="text" name="ok2_2" value="<?php echo isset($info['ok2_2']) ? $info['ok2_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout2_2" value="<?php echo isset($info['amout2_2']) ? $info['amout2_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond2_2" value="<?php echo isset($info['recond2_2']) ? $info['recond2_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Forks</td>
				<td><input type="text" name="ok3_1" value="<?php echo isset($info['ok3_1']) ? $info['ok3_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout3_1" value="<?php echo isset($info['amout3_1']) ? $info['amout3_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond3_1" value="<?php echo isset($info['recond3_1']) ? $info['recond3_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Cables</td>
				<td><input type="text" name="ok3_2" value="<?php echo isset($info['ok3_2']) ? $info['ok3_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout3_2" value="<?php echo isset($info['amout3_2']) ? $info['amout3_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond3_2" value="<?php echo isset($info['recond3_2']) ? $info['recond3_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Chrome</td>
				<td><input type="text" name="ok4_1" value="<?php echo isset($info['ok4_1']) ? $info['ok4_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout4_1" value="<?php echo isset($info['amout4_1']) ? $info['amout4_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond4_1" value="<?php echo isset($info['recond4_1']) ? $info['recond4_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Fuel Tank</td>
				<td><input type="text" name="ok4_2" value="<?php echo isset($info['ok4_2']) ? $info['ok4_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout4_2" value="<?php echo isset($info['amout4_2']) ? $info['amout4_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond4_2" value="<?php echo isset($info['recond4_2']) ? $info['recond4_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Seat</td>
				<td><input type="text" name="ok5_1" value="<?php echo isset($info['ok5_1']) ? $info['ok5_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout5_1" value="<?php echo isset($info['amout5_1']) ? $info['amout5_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond5_1" value="<?php echo isset($info['recond5_1']) ? $info['recond5_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Drive</td>
				<td><input type="text" name="ok5_2" value="<?php echo isset($info['ok5_2']) ? $info['ok5_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout5_2" value="<?php echo isset($info['amout5_2']) ? $info['amout5_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond5_2" value="<?php echo isset($info['recond5_2']) ? $info['recond5_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
			</tr>
			
			<tr>
				<td>Tachometer</td>
				<td><input type="text" name="ok6_1" value="<?php echo isset($info['ok6_1']) ? $info['ok6_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout6_1" value="<?php echo isset($info['amout6_1']) ? $info['amout6_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond6_1" value="<?php echo isset($info['recond6_1']) ? $info['recond6_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Windshield</td>
				<td><input type="text" name="ok6_2" value="<?php echo isset($info['ok6_2']) ? $info['ok6_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout6_2" value="<?php echo isset($info['amout6_2']) ? $info['amout6_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond6_2" value="<?php echo isset($info['recond6_2']) ? $info['recond6_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Speedometer</td>
				<td><input type="text" name="ok7_1" value="<?php echo isset($info['ok7_1']) ? $info['ok7_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout7_1" value="<?php echo isset($info['amout7_1']) ? $info['amout7_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond7_1" value="<?php echo isset($info['recond7_1']) ? $info['recond7_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Fairing</td>
				<td><input type="text" name="ok7_2" value="<?php echo isset($info['ok7_2']) ? $info['ok7_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout7_2" value="<?php echo isset($info['amout7_2']) ? $info['amout7_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond7_2" value="<?php echo isset($info['recond7_2']) ? $info['recond7_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Mirrors</td> 
				<td><input type="text" name="ok8_1" value="<?php echo isset($info['ok8_1']) ? $info['ok8_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout8_1" value="<?php echo isset($info['amout8_1']) ? $info['amout8_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond8_1" value="<?php echo isset($info['recond8_1']) ? $info['recond8_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Radio</td>
				<td><input type="text" name="ok8_2" value="<?php echo isset($info['ok8_2']) ? $info['ok8_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout8_2" value="<?php echo isset($info['amout8_2']) ? $info['amout8_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond8_2" value="<?php echo isset($info['recond8_2']) ? $info['recond8_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Horn</td>
				<td><input type="text" name="ok9_1" value="<?php echo isset($info['ok9_1']) ? $info['ok9_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout9_1" value="<?php echo isset($info['amout9_1']) ? $info['amout9_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond9_1" value="<?php echo isset($info['recond9_1']) ? $info['recond9_1'] : ''; ?>" style="width: 100%;"></td>
				<td colspan="4">&nbsp;</td>
			</tr>
			
			<tr>
				<td rowspan="2">Wheels<br> Spoke <input type="text" name="spoke"  value="<?php echo isset($info['spoke']) ? $info['spoke'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Mag <input type="text" name="mag" value="<?php echo isset($info['mag']) ? $info['mag'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></td>
				<td rowspan="2"><input type="text" name="ok10_1" value="<?php echo isset($info['ok10_1']) ? $info['ok10_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="2"><input type="text" name="amout10_1" value="<?php echo isset($info['amout10_1']) ? $info['amout10_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="2"><input type="text" name="recond10_1" value="<?php echo isset($info['recond10_1']) ? $info['recond10_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Saddle Bags</td>
				<td><input type="text" name="ok10_2" value="<?php echo isset($info['ok10_2']) ? $info['ok10_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout10_2" value="<?php echo isset($info['amout10_2']) ? $info['amout10_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond10_2" value="<?php echo isset($info['recond10_2']) ? $info['recond10_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Truck</td>
				<td><input type="text" name="ok11_2" value="<?php echo isset($info['ok11_2']) ? $info['ok11_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout11_2" value="<?php echo isset($info['amout11_2']) ? $info['amout11_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond11_2" value="<?php echo isset($info['recond11_2']) ? $info['recond11_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Tires</td>
				<td><input type="text" name="ok12_1" value="<?php echo isset($info['ok12_1']) ? $info['ok12_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout12_1" value="<?php echo isset($info['amout12_1']) ? $info['amout12_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond12_1" value="<?php echo isset($info['recond12_1']) ? $info['recond12_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Luggage Rank</td>
				<td><input type="text" name="ok12_2" value="<?php echo isset($info['ok12_2']) ? $info['ok12_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout12_2" value="<?php echo isset($info['amout12_2']) ? $info['amout12_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond12_2" value="<?php echo isset($info['recond12_2']) ? $info['recond12_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td rowspan="3">Shocks<br> RF <input type="text" name="shock_rf" value="<?php echo isset($info['shock_rf']) ? $info['shock_rf'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LF <input type="text" name="shock_lf" value="<?php echo isset($info['shock_lf']) ? $info['shock_lf'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> <br> RR <input type="text" name="shock_rr" value="<?php echo isset($info['shock_rr']) ? $info['shock_rr'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LR <input type="text" name="shock_lr" value="<?php echo isset($info['shock_lr']) ? $info['shock_lr'] : ''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> </td>
				<td rowspan="3"><input type="text" name="ok13_1" value="<?php echo isset($info['ok13_1']) ? $info['ok13_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="3"><input type="text" name="amout13_1" value="<?php echo isset($info['amout13_1']) ? $info['amout13_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="3"><input type="text" name="recond13_1" value="<?php echo isset($info['recond13_1']) ? $info['recond13_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Sissy Bar</td>
				<td><input type="text" name="ok13_2" value="<?php echo isset($info['ok13_2']) ? $info['ok13_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout13_2" value="<?php echo isset($info['amout13_2']) ? $info['amout13_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond13_2" value="<?php echo isset($info['recond13_2']) ? $info['recond13_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Safty Bar</td>
				<td><input type="text" name="ok14_2" value="<?php echo isset($info['ok14_2']) ? $info['ok14_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout14_2" value="<?php echo isset($info['amout14_2']) ? $info['amout14_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond14_2" value="<?php echo isset($info['recond14_2']) ? $info['recond14_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Handle Bar</td>
				<td><input type="text" name="ok15_2" value="<?php echo isset($info['ok15_2']) ? $info['ok15_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout15_2" value="<?php echo isset($info['amout15_2']) ? $info['amout15_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond15_2" value="<?php echo isset($info['recond15_2']) ? $info['recond15_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
			</tr>
			
			<tr>
				<td>Steering Head</td>
				<td><input type="text" name="ok16_1" value="<?php echo isset($info['ok16_1']) ? $info['ok16_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout16_1" value="<?php echo isset($info['amout16_1']) ? $info['amout16_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond16_1" value="<?php echo isset($info['recond16_1']) ? $info['recond16_1'] : ''; ?>" style="width: 100%;"></td>
				<td>General Condition</td>
				<td><input type="text" name="ok16_2" value="<?php echo isset($info['ok16_2']) ? $info['ok16_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout16_2" value="<?php echo isset($info['amout16_2']) ? $info['amout16_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond16_2" value="<?php echo isset($info['recond16_2']) ? $info['recond16_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			
			<tr>
				<td>Brakes</td>
				<td><input type="text" name="ok17_1" value="<?php echo isset($info['ok17_1']) ? $info['ok17_1'] : ''; ?>"  style="width: 100%;"></td>
				<td><input type="text" name="amout17_1" value="<?php echo isset($info['amout17_1']) ? $info['amout17_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond17_1" value="<?php echo isset($info['recond17_1']) ? $info['recond17_1'] : ''; ?>" style="width: 100%;"></td>
				<td>Clean-Up</td>
				<td><input type="text" name="ok17_2" value="<?php echo isset($info['ok17_2']) ? $info['ok17_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout17_2" value="<?php echo isset($info['amout17_2']) ? $info['amout17_2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="recond17_2" value="<?php echo isset($info['recond17_2']) ? $info['recond17_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Exhaust</td>
				<td><input type="text" name="ok18_1" value="<?php echo isset($info['ok18_1']) ? $info['ok18_1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amout18_1" value="<?php echo isset($info['amout18_1']) ? $info['amout18_1'] : ''; ?>"  style="width: 100%;"></td>
				<td><input type="text" name="recond18_1" value="<?php echo isset($info['recond18_1']) ? $info['recond18_1'] : ''; ?>" style="width: 100%;"></td>
				<td colspan="2">Reconditioning Total</td>
				<td>$<input type="text" name="amout18_2" value="<?php echo isset($info['amout18_2']) ? $info['amout18_2'] : ''; ?>"  style="width: 90%;"></td>
				<td><input type="text" name="recond18_2" value="<?php echo isset($info['recond18_2']) ? $info['recond18_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td rowspan="2">Engine<br> 5 <input type="text" name="engine_5" value="<?php echo isset($info['engine_5']) ? $info['engine_5'] : ''; ?>" style="width: 10%; border-bottom: 1px solid #000;"> 4 <input type="text" name="engine_4" value="<?php echo isset($info['engine_4']) ? $info['engine_4'] : ''; ?>" style="width: 10%; border-bottom: 1px solid #000;"> 3 <input type="text" name="engine_3" value="<?php echo isset($info['engine_3']) ? $info['engine_3'] : ''; ?>" style="width: 10%; border-bottom: 1px solid #000;"> 2 <input type="text" name="engine_2" value="<?php echo isset($info['engine_2']) ? $info['engine_2'] : ''; ?>" style="width: 10%; border-bottom: 1px solid #000;"> 1 <input type="text" name="engine_1" value="<?php echo isset($info['engine_1']) ? $info['engine_1'] : ''; ?>" style="width: 10%; border-bottom: 1px solid #000;"></td>
				<td rowspan="2"><input type="text" name="ok19_1" value="<?php echo isset($info['ok19_1']) ? $info['ok19_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="2"><input type="text" name="amout19_1" value="<?php echo isset($info['amout19_1']) ? $info['amout19_1'] : ''; ?>" style="width: 100%;"></td>
				<td rowspan="2"><input type="text" name="recond19_1" value="<?php echo isset($info['recond19_1']) ? $info['recond19_1'] : ''; ?>" style="width: 100%;"></td>
				<td colspan="2">Motorcycle Average Value</td>
				<td>$ <input type="text" name="amout19_2" value="<?php echo isset($info['amout19_2']) ? $info['amout19_2'] : ''; ?>" style="width: 88%;"></td>
				<td><input type="text" name="recond19_2" value="<?php echo isset($info['recond19_2']) ? $info['recond19_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="2">Reconditioning</td>
				<td>$<input type="text" name="amout20_2" value="<?php echo isset($info['amout20_2']) ? $info['amout20_2'] : ''; ?>" style="width: 90%;"></td>
				<td><input type="text" name="recond20_2" value="<?php echo isset($info['recond20_2']) ? $info['recond20_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
				<td colspan="2">Handling</td>
				<td>$<input type="text" name="amout21_2" value="<?php echo isset($info['amout21_2']) ? $info['amout21_2'] : ''; ?>" style="width: 90%;"></td>
				<td><input type="text" name="recond21_2" value="<?php echo isset($info['recond21_2']) ? $info['recond21_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td rowspan="3" colspan="4">
					<b style="text-align: center; display: block; text-decoration: underline; font-size: 15px;">Disposition</b>
					<span style="display: block;">Retail "As Is" <input type="text" name="retail" value="<?php echo isset($info['retail']) ? $info['retail'] : ''; ?>" style="width: 79%; border-bottom: 1px solid #000;"></span>
					<span style="display: block;">Recondition <input type="text" name="recondition" value="<?php echo isset($info['recondition']) ? $info['recondition'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;"></span>
					<span style="display: block;">Wholesale <input type="text" name="wholesale" value="<?php echo isset($info['wholesale']) ? $info['wholesale'] : ''; ?>" style="width: 82%; border-bottom: 1px solid #000; margin-bottom: 10px;"></span>
				</td>
				<td colspan="2">Appraisal Value</td>
				<td>$<input type="text" name="amout22_2" value="<?php echo isset($info['amout22_2']) ? $info['amout22_2'] : ''; ?>" style="width: 90%;"></td>
				<td><input type="text" name="recond22_2" value="<?php echo isset($info['recond22_2']) ? $info['recond22_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="2">Allowance</td>
				<td>$<input type="text" name="amout23_2" value="<?php echo isset($info['amout23_2']) ? $info['amout23_2'] : ''; ?>" style="width: 90%;"></td>
				<td><input type="text" name="recond23_2" value="<?php echo isset($info['recond23_2']) ? $info['recond23_2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="4" bgcolor="#ccc">&nbsp;</td>
			</tr>
			
			
			<tr>
				<td colspan="4">Dealer <input type="text" name="dealer" value="<?php echo isset($info['dealer']) ? $info['dealer'] : ''; ?>" style="width: 80%;"></td>
				<td colspan="4">Appraiser <input type="text" name="appraiser" value="<?php echo isset($info['appraiser']) ? $info['appraiser'] : ''; ?>" style="width: 80%;"></td>
			</tr>
		</table>
		
		<p style="width: 100%; float: left; font-size: 16px; margin-top: 20px; padding-left: 47px;"> <b>THIS TRADE-IN OFFER EXPIRES</b> <input type="text" name="expires_1" value="<?php echo isset($info['expires_1']) ? $info['expires_1'] : ''; ?>" style="width: 5%;">/<input type="text" name="expires_2" value="<?php echo isset($info['expires_2']) ? $info['expires_2'] : ''; ?>" style="width: 5%;">/<input type="text" name="expires_3" value="<?php echo isset($info['expires_3']) ? $info['expires_3'] : ''; ?>" style="width: 5%;"> <b>AND IS EFFECTIVE ONLY IF THE<br> MOTORCYCLE IS IN THE SAME CONDITION AS WHEN INSPECTED.</b></p>
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
