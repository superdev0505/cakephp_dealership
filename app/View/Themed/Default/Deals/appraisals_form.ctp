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
	label{font-size: 14px; font-weight: normal; margin: 0;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="cover" style="float: left; width: 100%; padding: 5px 10px 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000;">
				<div class="logo" style="float: left; width: 15%; margin: 0; border-right: 1px solid #000;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<div class="right" style="float: left; width: 83%">
					<h2 style="text-align: center; margin: 36px 0;"> <b>Pre-Owned Motorcycle Appraisal Form</b></h2>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 69%;">
					<label><b>Sales Person:</b></label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="float: right; width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 29%;">
					<label><b>Date:</b></label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="float: right; width: 80%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Last Name:</b></label>
					<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="float: right; width: 83%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Product of Interest:</b></label>
					<input type="text" name="product" value="<?php echo isset($info['product'])?$info['product']:''; ?>" style="float: right; width: 72%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>First Name:</b></label>
					<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="float: right; width: 83%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Product of Interest Stock No:</b></label>
					<input type="text" name="stock_no" value="<?php echo isset($info['stock_no'])?$info['stock_no']:''; ?>" style="float: right; width: 57%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Address1:</b></label>
					<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="float: right; width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Trade-In Vehicle:</b></label>
					<input type="text" name="trade_vehicle" value="<?php echo isset($info['trade_vehicle']) ? $info['trade_vehicle'] : ''; ?>" style="float: right; width: 75%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Address2:</b></label>
					<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="float: right; width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Trade-In Mileage:</b></label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="float: right; width: 74%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>City:</b></label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="float: right; width: 91%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Trade-In VIN #:</b></label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="float: right; width: 76%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>State:</b></label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="float: right; width: 91%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Crankcase No #:</b></label>
					<input type="text" name="crank_no" value="<?php echo isset($info['crank_no'])?$info['crank_no']:''; ?>" style="float: right; width: 76%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Zip:</b></label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="float: right; width: 93%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Frame No:</b></label>
					
					<input type="text" name="frame_no" value="<?php echo isset($info['frame_no'])?$info['frame_no']:''; ?>" style="float: right; width: 84%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label><b>Daytime Phone:</b></label>
					<input type="text" name="daytime" value="<?php echo isset($info['daytime'])?$info['daytime']:''; ?>" style="float: right; width: 76%;">
				</div>
				<div class="form-field" style="float: right; width: 49%;">
					<label><b>Title No:</b></label>
					<input type="text" name="title_no" value="<?php echo isset($info['title_no'])?$info['title_no']:''; ?>" style="float: right; width: 86%;">
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
					<td style="width: 6%;"><input type="text" name="frame" value="<?php echo isset($info['frame'])?$info['frame']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="amt1" value="<?php echo isset($info['amt1'])?$info['amt1']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt1_x" value="<?php echo isset($info['amt1_x'])?$info['amt1_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Transmission</b></td>
					<td style="width: 6%;"><input type="text" name="trans" value="<?php echo isset($info['trans'])?$info['trans']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="amt2" value="<?php echo isset($info['amt2'])?$info['amt2']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt2_x" value="<?php echo isset($info['amt2_x'])?$info['amt2_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Fenders</b></td>
					<td style="width: 6%;"><input type="text" name="fender" value="<?php echo isset($info['fender'])?$info['fender']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt3" value="<?php echo isset($info['amt3'])?$info['amt3']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt3_x" value="<?php echo isset($info['amt3_x'])?$info['amt3_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Clutch</b></td>
					<td style="width: 6%;"><input type="text" name="clutch" value="<?php echo isset($info['clutch'])?$info['clutch']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt4" value="<?php echo isset($info['amt4'])?$info['amt4']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt4_x" value="<?php echo isset($info['amt4_x'])?$info['amt4_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Forks</b></td>
					<td style="width: 6%;"><input type="text" name="fork" value="<?php echo isset($info['fork'])?$info['fork']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt5" value="<?php echo isset($info['amt5'])?$info['amt5']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt5_x" value="<?php echo isset($info['amt5_x'])?$info['amt5_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Cables</b></td>
					<td style="width: 6%;"><input type="text" name="cable" value="<?php echo isset($info['cable'])?$info['cable']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt6" value="<?php echo isset($info['amt6'])?$info['amt6']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt6_x" value="<?php echo isset($info['amt6_x'])?$info['amt6_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Chrome</b></td>
					<td style="width: 6%;"><input type="text" name="chrome" value="<?php echo isset($info['chrome'])?$info['chrome']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt7" value="<?php echo isset($info['amt7'])?$info['amt7']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt7_x" value="<?php echo isset($info['amt7_x'])?$info['amt7_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Fuel Tank</b></td>
					<td style="width: 6%;"><input type="text" name="fuel" value="<?php echo isset($info['fuel'])?$info['fuel']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt8" value="<?php echo isset($info['amt8'])?$info['amt8']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt8_x" value="<?php echo isset($info['amt8_x'])?$info['amt8_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Seat</b></td>
					<td style="width: 6%;"><input type="text" name="seat" value="<?php echo isset($info['seat'])?$info['seat']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt9" value="<?php echo isset($info['amt9'])?$info['amt9']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt9_x" value="<?php echo isset($info['amt9_x'])?$info['amt9_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Final Drive System</b></td>
					<td style="width: 6%;"><input type="text" name="final" value="<?php echo isset($info['final'])?$info['final']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt10" value="<?php echo isset($info['amt10'])?$info['amt10']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt10_x" value="<?php echo isset($info['amt10_x'])?$info['amt10_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th colspan="4">&nbsp;</th>
					<th colspan="4">&nbsp;</th>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Tachometer</b></td>
					<td style="width: 6%;"><input type="text" name="tacho" value="<?php echo isset($info['tacho'])?$info['tacho']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt11" value="<?php echo isset($info['amt11'])?$info['amt11']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt11_x" value="<?php echo isset($info['amt11_x'])?$info['amt11_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Windshield</b></td>
					<td style="width: 6%;"><input type="text" name="wind" value="<?php echo isset($info['wind'])?$info['wind']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt12" value="<?php echo isset($info['amt12'])?$info['amt12']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt12_x" value="<?php echo isset($info['amt12_x'])?$info['amt12_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Speedometer</b></td>
					<td style="width: 6%;"><input type="text" name="speed" value="<?php echo isset($info['speed'])?$info['speed']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt13" value="<?php echo isset($info['amt13'])?$info['amt13']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt13_x" value="<?php echo isset($info['amt13_x'])?$info['amt13_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Fairing</b></td>
					<td style="width: 6%;"><input type="text" name="fair" value="<?php echo isset($info['fair'])?$info['fair']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt14" value="<?php echo isset($info['amt14'])?$info['amt14']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt14_x" value="<?php echo isset($info['amt14_x'])?$info['amt14_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Mirrors</b></td>
					<td style="width: 6%;"><input type="text" name="mirror" value="<?php echo isset($info['mirror'])?$info['mirror']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt15" value="<?php echo isset($info['amt15'])?$info['amt15']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt15_x" value="<?php echo isset($info['amt15_x'])?$info['amt15_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Radio</b></td>
					<td style="width: 6%;"><input type="text" name="radio" value="<?php echo isset($info['radio'])?$info['radio']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt16" value="<?php echo isset($info['amt16'])?$info['amt16']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt16_x" value="<?php echo isset($info['amt16_x'])?$info['amt16_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Horn</b></td>
					<td style="width: 6%;"><input type="text" name="horn1" value="<?php echo isset($info['horn1'])?$info['horn1']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="horn2" value="<?php echo isset($info['horn2'])?$info['horn2']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="horn3" value="<?php echo isset($info['horn3'])?$info['horn3']:''; ?>" style="width: 100%;"></td>
					<td style="width: 50%; background-color: #ccc;" colspan="4">&nbsp;</td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="2"><b>Wheels <br> Spoke <input type="text" name="spoke" value="<?php echo isset($info['spoke'])?$info['spoke']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> Mag <input type="text" name="mag" value="<?php echo isset($info['mag'])?$info['mag']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></b></td>
					<td style="width: 6%;" rowspan="2"><input type="text" name="wheel" value="<?php echo isset($info['wheel'])?$info['wheel']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="2"><input type="text" name="amt17" value="<?php echo isset($info['amt17'])?$info['amt17']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="2"><input type="text" name="amt17_x" value="<?php echo isset($info['amt17_x'])?$info['amt17_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Saddle Bags</b></td>
					<td style="width: 6%;"><input type="text" name="saddle" value="<?php echo isset($info['saddle'])?$info['saddle']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt18" value="<?php echo isset($info['amt18'])?$info['amt18']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt18_x" value="<?php echo isset($info['amt18_x'])?$info['amt18_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Trunk</b></td>
					<td style="width: 6%;"><input type="text" name="trunk" value="<?php echo isset($info['trunk'])?$info['trunk']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt19" value="<?php echo isset($info['amt19'])?$info['amt19']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt19_x" value="<?php echo isset($info['amt19_x'])?$info['amt19_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Tires</b></td>
					<td style="width: 6%;"><input type="text" name="tire" value="<?php echo isset($info['tire'])?$info['tire']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt20" value="<?php echo isset($info['amt20'])?$info['amt20']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt20_x" value="<?php echo isset($info['amt20_x'])?$info['amt20_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Luggage Rack</b></td>
					<td style="width: 6%;"><input type="text" name="luggage" value="<?php echo isset($info['luggage'])?$info['luggage']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt21" value="<?php echo isset($info['amt21'])?$info['amt21']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt21_x" value="<?php echo isset($info['amt21_x'])?$info['amt21_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="3"><b>Shocks <br> RF <input type="text" name="rf" value="<?php echo isset($info['rf'])?$info['rf']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LF <input type="text" name="lf" value="<?php echo isset($info['lf'])?$info['lf']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> <br>  RR <input type="text" name="rr" value="<?php echo isset($info['rr'])?$info['rr']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"> LR <input type="text" name="lr" value="<?php echo isset($info['lr'])?$info['lr']:''; ?>" style="width: 20%; border-bottom: 1px solid #000;"></b></td>
					<td style="width: 6%;" rowspan="3"><input type="text" name="shock" value="<?php echo isset($info['shock'])?$info['shock']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="3"><input type="text" name="amt22" value="<?php echo isset($info['amt22'])?$info['amt22']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="3"><input type="text" name="amt22_x" value="<?php echo isset($info['amt22_x'])?$info['amt22_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Sissy Bar</b></td>
					<td style="width: 6%;"><input type="text" name="sissy" value="<?php echo isset($info['sissy'])?$info['sissy']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt23" value="<?php echo isset($info['amt23'])?$info['amt23']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt23_x" value="<?php echo isset($info['amt23_x'])?$info['amt23_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td style="width: 22%;" ><b>Frame/Engine <br> Guards</b></td>
					<td style="width: 6%;" ><input type="text" name="frame" value="<?php echo isset($info['frame'])?$info['frame']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" ><input type="text" name="amt24" value="<?php echo isset($info['amt24'])?$info['amt24']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" ><input type="text" name="amt24_x" value="<?php echo isset($info['amt24_x'])?$info['amt24_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" ><b>Handle</b></td>
					<td style="width: 6%;" ><input type="text" name="handle" value="<?php echo isset($info['handle'])?$info['handle']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt25" value="<?php echo isset($info['amt25'])?$info['amt25']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" ><input type="text" name="amt25_x" value="<?php echo isset($info['amt25_x'])?$info['amt25_x']:''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<th colspan="4">&nbsp;</th>
					<th colspan="4">&nbsp;</th>
				</tr>
				
				
				<tr>
					<td style="width: 22%;"><b>Steering Head</b></td>
					<td style="width: 6%;"><input type="text" name="steer" value="<?php echo isset($info['steer'])?$info['steer']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt26" value="<?php echo isset($info['amt26'])?$info['amt26']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt26_x" value="<?php echo isset($info['amt26_x'])?$info['amt26_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>General Condition</b></td>
					<td style="width: 6%;"><input type="text" name="condition" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt27" value="<?php echo isset($info['amt27'])?$info['amt27']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt27_x" value="<?php echo isset($info['amt27_x'])?$info['amt27_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;"><b>Brakes</b></td>
					<td style="width: 6%;"><input type="text" name="brake" value="<?php echo isset($info['brake'])?$info['brake']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt28" value="<?php echo isset($info['amt28'])?$info['amt28']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt28_x" value="<?php echo isset($info['amt28_x'])?$info['amt28_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;"><b>Clean-Up</b></td>
					<td style="width: 6%;"><input type="text" name="clean_up" value="<?php echo isset($info['clean_up'])?$info['clean_up']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt29" value="<?php echo isset($info['amt29'])?$info['amt29']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt29_x" value="<?php echo isset($info['amt29_x'])?$info['amt29_x']:''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<td style="width: 22%;"><b>Exhaust</b></td>
					<td style="width: 6%;"><input type="text" name="exhaust" value="<?php echo isset($info['exhaust'])?$info['exhaust']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;"><input type="text" name="amt30" value="<?php echo isset($info['amt30'])?$info['amt30']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt30_x" value="<?php echo isset($info['amt30_x'])?$info['amt30_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;" colspan="2"><b>Reconditioning Total</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="amt31" value="<?php echo isset($info['amt31'])?$info['amt31']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt31_x" value="<?php echo isset($info['amt31_x'])?$info['amt31_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" rowspan="2"><b>Engine</b> <br>5 <input type="text" name="engine_5" value="<?php echo isset($info['engine_5'])?$info['engine_5']:''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 4 <input type="text" name="engine_4" value="<?php echo isset($info['engine_4'])?$info['engine_4']:''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 3 <input type="text" name="engine_3" value="<?php echo isset($info['engine_3'])?$info['engine_3']:''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 2 <input type="text" name="engine_2" value="<?php echo isset($info['engine_2'])?$info['engine_2']:''; ?>" style="width: 7%; border-bottom: 1px solid #000;"> 1 <input type="text" name="engine_1" value="<?php echo isset($info['engine_1'])?$info['engine_1']:''; ?>" style="width: 7%; border-bottom: 1px solid #000;"></td>
					<td style="width: 6%;" rowspan="2"><input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 100%;"></td>
					<td style="width: 17%;" rowspan="2"><input type="text" name="amt32" value="<?php echo isset($info['amt32'])?$info['amt32']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;" rowspan="2"><input type="text" name="amt32_x" value="<?php echo isset($info['amt32_x'])?$info['amt32_x']:''; ?>" style="width: 100%;"></td>
					<td style="width: 22%;" colspan="2"><b>Motorcycle Average Value</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="motorcycle" value="<?php echo isset($info['motorcycle'])?$info['motorcycle']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="motor_x" value="<?php echo isset($info['motor_x'])?$info['motor_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" colspan="2"><b>Reconditioning Total</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="recondi" value="<?php echo isset($info['recondi'])?$info['recondi']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt33_x" value="<?php echo isset($info['amt33_x'])?$info['amt33_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%; background-color: #ccc;" colspan="4">&nbsp;</td>
					<td style="width: 22%;" colspan="2"><b>Handling</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="handle" value="<?php echo isset($info['handle'])?$info['handle']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt34_x" value="<?php echo isset($info['amt34_x'])?$info['amt34_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 50%;" colspan="4" rowspan="4">
						<b style="margin-bottom: 4px; float: left; width: 100%; display: block; text-decoration: underline;">Disposition</b>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Retail "As Is":</b></label>
							<input type="text" name="retail" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Recondition:</b></label>
							<input type="text" name="recondition" value="<?php echo isset($info['recondition'])?$info['recondition']:''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
						<p style="float: left; width: 100%; margin: 2px 0;">
							<label><b>Wholesale:</b></label>
							<input type="text" name="wholesale" value="<?php echo isset($info['wholesale'])?$info['wholesale']:''; ?>" style="float: right; border-bottom: 1px solid #000; width: 77%;">
						</p>
					</td>
					<td style="width: 22%;" colspan="2"><b>Appraisal Value</b></td>
					<td style="width: 23%;"><b>$</b><input type="text" name="appraisal" value="<?php echo isset($info['appraisal'])?$info['appraisal']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt35_x" value="<?php echo isset($info['amt35_x'])?$info['amt35_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 22%;" colspan="2"><b>Allowance</b></td>
					<td style="width: 17%;"><b>$</b><input type="text" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 90%;"></td>
					<td style="width: 5%;"><input type="text" name="amt36_x" value="<?php echo isset($info['amt36_x'])?$info['amt36_x']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="width: 50%;" colspan="4" rowspan="2"><textarea style="width: 98%; border: 0; height: 50px;"></textarea></td>
				</tr>
			</table>
			
			<table cellpadding="0" cellspacing="0" style="width: 100%; border-top: 0px;">				
				<tr>
					<td style="width: 49%;" colspan="5">
						<label><b>Dealer</b></label>
						<input type="text" name="dealer" value="<?php echo isset($info['dealer'])?$info['dealer']:''; ?>" style="width: 70%;">
					</td>
					<td style="width: 53%;" colspan="5">
						<label><b>Appraiser</b></label>
						<input type="text" name="appraiser" value="<?php echo isset($info['appraiser'])?$info['appraiser']:''; ?>" style="width: 70%;">
					</td>
				</tr>
			</table>
			
			
			<h3 style="float: left; width: 100%; font-size: 15px; margin: 10px 0;"><b>THIS TRADE-IN OFFER EXPIRES <input type="text" name="expire1" value="<?php echo isset($info['expire1'])?$info['expire1']:''; ?>" style="width: 7%;">/<input type="text" name="expire2" value="<?php echo isset($info['expire2'])?$info['expire2']:''; ?>" style="width: 7%;"> / <input type="text" name="expire3" value="<?php echo isset($info['expire3'])?$info['expire3']:''; ?>" style="width: 7%;"> AND IS EFFECTIVE ONLY IF THE MOTORCYCLE IS IN THE SAME CONDITION AS WHEN IT
WAS INSPECTED.</b></h3>


			<div class="row" style="float: left; width: 100%; margin: 10px 0 2px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="vertical-align: top;">NOTES:</label>
					<textarea  id="term_notes" name="term_notes" style="width: 80%; border: 0px; height: 60px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
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
