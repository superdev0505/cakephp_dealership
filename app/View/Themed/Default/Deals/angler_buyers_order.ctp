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
	input[type="text"]{ border-bottom: 0px solid blue; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px; display: block;}
	label{font-size: 11px; margin-bottom: 0px; font-weight: normal; display: block; color: blue;}
	p {color: blue;}
	h2 {color: blue;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 13px;}
	th{padding: 1px; border-right: 1px solid blue;}
	td:first-child, th:first-child{border-left: 1px solid blue; color: blue;}
	td{border-right: 1px solid blue; color: blue;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 1px 3px; border-bottom: 1px solid blue; font-size: 13px;}
	span {font-size: 15px;}
	table input[type="text"]{border: 0px;}
	.form-field {color: blue;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	a.active{color: blue !important;}
	td:last-child{border-right: 0px;}
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	label {color: blue !important;}
	p {color: blue !important;}
	h2 {color: blue !important;}
	td {color: blue !important;}
	.form-field {color: blue !important;}
	b {color: blue !important;}
	.print-color {-webkit-print-color-adjust: exact;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 0; font-size: 17px; text-align: center; margin: 0;"><b>ANGLER'S PORT MARINE</b></h2>
			<p style="font-size: 13px; margin: 0; text-align: center;">13979 HWY 7 <br> WARSAW, MO 65355 <br> (660) 438-4600 <span style="font-size: 20px;">.</span> FAX: (660) 438-1019 <br> www.anglersportmarine.com</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>BUYER(S)</label>
				<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>HOME PHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>BUSINESS PHONE</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px;">
				<label>DATE SOLD</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 19%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 11%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>COUNTRY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>SALESPERSON</label>
				<input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>PROPOSED DELIVERY DATE</label>
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 1px 3px;">
				<label>DELIVERY INSTRUCTIONS</label>
				<input type="text" name="delivery_ins" value="<?php echo isset($info['delivery_ins']) ? $info['delivery_ins'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>HULL MATERIAL(S)</label>
				<input type="text" name="materials" value="<?php echo isset($info['materials']) ? $info['materials'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>COLOR</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>DECK</label>
				<input type="text" name="deck" value="<?php echo isset($info['deck']) ? $info['deck'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>H.I.N</label>
				<input type="text" name="hin" value="<?php echo isset($info['hin']) ? $info['hin'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 1px 3px;">
				<label>STOCK NO.</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 21%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MANUFACTURER OF BOAT</label>
				<input type="text" name="boat" value="<?php echo isset($info['boat']) ? $info['boat'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MODEL & SIZE</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<div class="left" style="float: left; width: 80%;">
					<label>SERIAL NUMBER</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="right" style="float: left; width: 17.5%;">
					<label style="display: block;"><input type="checkbox" name="new_check" value="new" <?php echo ($info['new_check'] == "new") ? "checked" : ""; ?> style="margin: 0;"> NEW</label>
					<label style="display: block;"><input type="checkbox" name="used_check" value="used" <?php echo ($info['used_check'] == "used") ? "checked" : ""; ?> style="margin: 0;"> USED</label>
				</div><span style="float: left; margin-top: 15px;">$</span>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label style="display: block;">&nbsp;</label>
				<input type="text" class="price" id="price1" name="price1" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="width: 80%; display: inline-block;">
			</div>
			<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; padding: 1px 3px;">
				<label>&nbsp;</label>
				<input type="text" name="space1" value="<?php echo isset($info['space1']) ? $info['space1'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 21%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MANUFACTURER OF BOAT</label>
				<input type="text" name="boat1" value="<?php echo isset($info['boat1']) ? $info['boat1'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>YEAR</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1']) ? $info['year1'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MODEL & SIZE</label>
				<input type="text" name="model1" value="<?php echo isset($info['model1']) ? $info['model1'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<div class="left" style="float: left; width: 80%;">
					<label>SERIAL NUMBER</label>
					<input type="text" name="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="right" style="float: left; width: 17.5%;">
					<label style="display: block;"><input type="checkbox" name="new1_check" value="new1" <?php echo ($info['new1_check'] == "new1") ? "checked" : ""; ?> style="margin: 0;"> NEW</label>
					<label style="display: block;"><input type="checkbox" name="used1_check" value="used1" <?php echo ($info['used1_check'] == "used1") ? "checked" : ""; ?> style="margin: 0;"> USED</label>
				</div><span style="float: left; margin-top: 15px;">$</span>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label style="display: block;">&nbsp;</label>
				<input type="text" class="price" id="price2" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 80%; display: inline-block;">
			</div>
			<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; padding: 1px 3px;">
				<label>&nbsp;</label>
				<input type="text" name="space2" value="<?php echo isset($info['space2']) ? $info['space2'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid blue; border-top: 0px;">
			<div class="form-field" style="float: left; width: 21%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MANUFACTURER OF BOAT</label>
				<input type="text" name="boat2" value="<?php echo isset($info['boat2']) ? $info['boat2'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>YEAR</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2']) ? $info['year2'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label>MODEL & SIZE</label>
				<input type="text" name="model2" value="<?php echo isset($info['model2']) ? $info['model2'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<div class="left" style="float: left; width: 80%;">
					<label>V.I.N.</label>
					<input type="text" name="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="right" style="float: left; width: 17.5%;">
					<label style="display: block;"><input type="checkbox" name="new2_check" value="new2" <?php echo ($info['new2_check'] == "new2") ? "checked" : ""; ?> style="margin: 0;"> NEW</label>
					<label style="display: block;"><input type="checkbox" name="used2_check" value="used2" <?php echo ($info['used2_check'] == "used2") ? "checked" : ""; ?> style="margin: 0;"> USED</label>
				</div><span style="float: left; margin-top: 15px;">$</span>
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 1px 3px; border-right: 1px solid blue;">
				<label style="display: block;">&nbsp;</label>
				<input type="text" class="price" id="price3" name="price3" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="width: 80%; display: inline-block;">
			</div>
			<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; padding: 1px 3px;">
				<label>&nbsp;</label>
				<input type="text" name="space3" value="<?php echo isset($info['space3']) ? $info['space3'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 56%; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td colspan="3" style="width: 100%; font-size: 12px; text-align: center;"><b style="height: 19px; display: block;">OPTIONAL EQUIPMENT AND ACCESSORIES</b></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option1" value="<?php echo isset($info['option1']) ? $info['option1'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access1" name="access1" value="<?php echo isset($info['access1']) ? $info['access1'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title1" value="<?php echo isset($info['title1']) ? $info['title1'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option2" value="<?php echo isset($info['option2']) ? $info['option2'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access2" name="access2" value="<?php echo isset($info['access2']) ? $info['access2'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title2" value="<?php echo isset($info['title2']) ? $info['title2'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option3" value="<?php echo isset($info['option3']) ? $info['option3'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access3" name="access3" value="<?php echo isset($info['access3']) ? $info['access3'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title3" value="<?php echo isset($info['title3']) ? $info['title3'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option4" value="<?php echo isset($info['option4']) ? $info['option4'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access4" name="access4" value="<?php echo isset($info['access4']) ? $info['access4'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title4" value="<?php echo isset($info['title4']) ? $info['title4'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option5" value="<?php echo isset($info['option5']) ? $info['option5'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access5" name="access5" value="<?php echo isset($info['access5']) ? $info['access5'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title5" value="<?php echo isset($info['title5']) ? $info['title5'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option6" value="<?php echo isset($info['option6']) ? $info['option6'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access6" name="access6" value="<?php echo isset($info['access6']) ? $info['access6'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title6" value="<?php echo isset($info['title6']) ? $info['title6'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option7" value="<?php echo isset($info['option7']) ? $info['option7'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access7" name="access7" value="<?php echo isset($info['access7']) ? $info['access7'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title7" value="<?php echo isset($info['title7']) ? $info['title7'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option8" value="<?php echo isset($info['option8']) ? $info['option8'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access8" name="access8" value="<?php echo isset($info['access8']) ? $info['access8'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title8" value="<?php echo isset($info['title8']) ? $info['title8'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option9" value="<?php echo isset($info['option9']) ? $info['option9'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access9" name="access9" value="<?php echo isset($info['access9']) ? $info['access9'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title9" value="<?php echo isset($info['title9']) ? $info['title9'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option10" value="<?php echo isset($info['option10']) ? $info['option10'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access10" name="access10" value="<?php echo isset($info['access10']) ? $info['access10'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title10" value="<?php echo isset($info['title10']) ? $info['title10'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option11" value="<?php echo isset($info['option11']) ? $info['option11'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access11" name="access11" value="<?php echo isset($info['access11']) ? $info['access11'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title11" value="<?php echo isset($info['title11']) ? $info['title11'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option12" value="<?php echo isset($info['option12']) ? $info['option12'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access12" name="access12" value="<?php echo isset($info['access12']) ? $info['access12'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title12" value="<?php echo isset($info['title12']) ? $info['title12'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option13" value="<?php echo isset($info['option13']) ? $info['option13'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access13" name="access13" value="<?php echo isset($info['access13']) ? $info['access13'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title13" value="<?php echo isset($info['title13']) ? $info['title13'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option14" value="<?php echo isset($info['option14']) ? $info['option14'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access14" name="access14" value="<?php echo isset($info['access14']) ? $info['access14'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title14" value="<?php echo isset($info['title14']) ? $info['title14'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option15" value="<?php echo isset($info['option15']) ? $info['option15'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access15" name="access15" value="<?php echo isset($info['access15']) ? $info['access15'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title15" value="<?php echo isset($info['title15']) ? $info['title15'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option16" value="<?php echo isset($info['option16']) ? $info['option16'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access16" name="access16" value="<?php echo isset($info['access16']) ? $info['access16'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title16" value="<?php echo isset($info['title16']) ? $info['title16'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option17" value="<?php echo isset($info['option17']) ? $info['option17'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access17" name="access17" value="<?php echo isset($info['access17']) ? $info['access17'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title17" value="<?php echo isset($info['title17']) ? $info['title17'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option18" value="<?php echo isset($info['option18']) ? $info['option18'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access18" name="access18" value="<?php echo isset($info['access18']) ? $info['access18'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title18" value="<?php echo isset($info['title18']) ? $info['title18'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option19" value="<?php echo isset($info['option19']) ? $info['option19'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access19" name="access19" value="<?php echo isset($info['access19']) ? $info['access19'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title19" value="<?php echo isset($info['title19']) ? $info['title19'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option20" value="<?php echo isset($info['option20']) ? $info['option20'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access20" name="access20" value="<?php echo isset($info['access20']) ? $info['access20'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title20" value="<?php echo isset($info['title20']) ? $info['title20'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option21" value="<?php echo isset($info['option21']) ? $info['option21'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access21" name="access21" value="<?php echo isset($info['access21']) ? $info['access21'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title21" value="<?php echo isset($info['title21']) ? $info['title21'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option22" value="<?php echo isset($info['option22']) ? $info['option22'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access22" name="access22" value="<?php echo isset($info['access22']) ? $info['access22'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title22" value="<?php echo isset($info['title22']) ? $info['title22'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option23" value="<?php echo isset($info['option23']) ? $info['option23'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access23" name="access23" value="<?php echo isset($info['access23']) ? $info['access23'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title23" value="<?php echo isset($info['title23']) ? $info['title23'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%;"><input type="text" name="option24" value="<?php echo isset($info['option24']) ? $info['option24'] : ''; ?>" style="width: 100%;"></td>
						<td style="width: 20%;">$<input type="text" class="price" id="access24" name="access24" value="<?php echo isset($info['access24']) ? $info['access24'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title24" value="<?php echo isset($info['title24']) ? $info['title24'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 70%; text-align: center;">OPTIONAL EQUIPMENT CARRIED FORWARD</td>
						<td style="width: 20%;">$ <input type="text" class="price" id="access26" name="access26" value="<?php echo isset($info['access26']) ? $info['access26'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 10%;"><input type="text" name="title26" value="<?php echo isset($info['title26']) ? $info['title26'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: left; width: 44%; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td style="width: 61%;"><input type="text" name="title" value="<?php echo isset($info['title']) ? $info['title'] : ''; ?>" style="width: 96.5%; float: left;"><span>$</span></td>
						<td style="width: 28%;"><input type="text" class="price" id="price4" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 11%;"><input type="text" name="space4" value="<?php echo isset($info['space4']) ? $info['space4'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TOTAL PURCHASE ABOVE<span style="margin-left: 35%;">$</span></td>
						<td><input type="text" class="price" id="purchase" name="purchase" value="<?php echo isset($info['purchase']) ? $info['purchase'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space5" value="<?php echo isset($info['space5']) ? $info['space5'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>OPTIONAL EQUIPMENT (From Below)<span style="margin-left: 11.2%;">$</span></td>
						<td><input type="text" class="price" id="equipment" name="equipment" value="<?php echo isset($info['equipment']) ? $info['equipment'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space6" value="<?php echo isset($info['space6']) ? $info['space6'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 61%;"><input type="text" name="price_title1" value="<?php echo isset($info['price_title1']) ? $info['price_title1'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td style="width: 28%;"><input type="text" class="price" id="price5" name="price5" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 11%;"><input type="text" name="space5" value="<?php echo isset($info['space5']) ? $info['space5'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 61%;"><input type="text" name="price_title2" value="<?php echo isset($info['price_title2']) ? $info['price_title2'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td style="width: 28%;"><input type="text" class="price" id="price6" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 11%;"><input type="text" name="space6" value="<?php echo isset($info['space6']) ? $info['space6'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>(Special Credits)<span style="margin-left: 60.5%;">$</span></td>
						<td><input type="text" class="price" id="special_credit" name="special_credit" value="<?php echo isset($info['special_credit']) ? $info['special_credit'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space7" value="<?php echo isset($info['space7']) ? $info['space7'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="text-align: right;">SUB-TOTAL <span>$</span></td>
						<td><input type="text" class="price" id="sub_total" name="sub_total" value="<?php echo isset($info['sub_total']) ? $info['sub_total'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space8" value="<?php echo isset($info['space8']) ? $info['space8'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 61%;"><input type="text" name="price_title3" value="<?php echo isset($info['price_title3']) ? $info['price_title3'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td style="width: 28%;"><input type="text" class="price" id="price7" name="price7" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 11%;"><input type="text" name="space9" value="<?php echo isset($info['space9']) ? $info['space9'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>RETAILER RIGGING/PREP<span style="margin-left: 36%;">$</span></td>
						<td><input type="text" class="price" id="retailer" name="retailer" value="<?php echo isset($info['retailer']) ? $info['retailer'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space10" value="<?php echo isset($info['space10']) ? $info['space10'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>FREIGHT<span style="margin-left: 75%;">$</span></td>
						<td><input type="text" class="price" id="freight" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space11" value="<?php echo isset($info['space11']) ? $info['space11'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="width: 61%;"><input type="text" name="price_title4" value="<?php echo isset($info['price_title4']) ? $info['price_title4'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td style="width: 28%;"><input type="text" class="price" id="price8" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td style="width: 11%;"><input type="text" name="space12" value="<?php echo isset($info['space12']) ? $info['space12'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="text-align: right;">CASH SALE PRICE<span>$</span></td>
						<td><input type="text" class="price" id="cash_price" name="cash_price" value="<?php echo isset($info['cash_price']) ? $info['cash_price'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space13" value="<?php echo isset($info['space13']) ? $info['space13'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>LESS TRADE-IN ALLOWANCE<span style="margin-left: 28.3%;">$</span></td>
						<td><input type="text" class="price" id="less" name="less" value="<?php echo isset($info['less']) ? $info['less'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space14" value="<?php echo isset($info['space14']) ? $info['space14'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="text-align: right;">SUB-TOTAL<span>$</span></td>
						<td><input type="text" class="price" id="subtotal" name="subtotal" value="<?php echo isset($info['subtotal']) ? $info['subtotal'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space15" value="<?php echo isset($info['space15']) ? $info['space15'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SALES TAX (If Application)<span style="margin-left: 38%;">$</span></td>
						<td><input type="text" class="price" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space16" value="<?php echo isset($info['space16']) ? $info['space16'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>NET SALE</b><span>$</span></td>
						<td><input type="text" class="price" id="net_sale" name="net_sale" value="<?php echo isset($info['net_sale']) ? $info['net_sale'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space17" value="<?php echo isset($info['space17']) ? $info['space17'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TITLE/REGISTRATION/OFFICE FEES<span style="margin-left: 12.7%;">$</span></td>
						<td><input type="text" class="price" id="office_fee" name="office_fee" value="<?php echo isset($info['office_fee']) ? $info['office_fee'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="space18" value="<?php echo isset($info['space18']) ? $info['space18'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="padding: 0px;">
							<table class="inner-table" cellpadding="0" cellspacing="0" width="100%;">
								<tr>
									<td style="text-align: center; width: 40%;"><b>DATES</b></td>
									<td style="text-align: center; width: 60%;" colspan="2"><b>DOWN PAYMENTS</b></td>
								</tr>
								<tr>
									<td><input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 91.5%; float: left;"><span>$</span></td>
									<td><input type="text" class="price" id="down_price1" name="down_price1" value="<?php echo isset($info['down_price1']) ? $info['down_price1'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
									<td style="width: 20%;"><input type="text" name="down_title1" value="<?php echo isset($info['down_title1']) ? $info['down_title1'] : ''; ?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td><input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="width: 91.5%; float: left;"><span>$</span></td>
									<td><input type="text" class="price" id="down_price2" name="down_price2" value="<?php echo isset($info['down_price2']) ? $info['down_price2'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
									<td style="width: 20%;"><input type="text" name="down_title2" value="<?php echo isset($info['down_title2']) ? $info['down_title2'] : ''; ?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td><input type="text" name="date3" value="<?php echo isset($info['date3']) ? $info['date3'] : ''; ?>" style="width: 91.5%; float: left;"><span>$</span></td>
									<td><input type="text" class="price" id="down_price3" name="down_price3" value="<?php echo isset($info['down_price3']) ? $info['down_price3'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
									<td style="width: 20%;"><input type="text" name="down_title3" value="<?php echo isset($info['down_title3']) ? $info['down_title3'] : ''; ?>" style="width: 100%;"></td>
								</tr>
								<tr>
									<td><input type="text" name="date4" value="<?php echo isset($info['date4']) ? $info['date4'] : ''; ?>" style="width: 91.5%; float: left;"><span>$</span></td>
									<td><input type="text" class="price" id="down_price4" name="down_price4" value="<?php echo isset($info['down_price4']) ? $info['down_price4'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
									<td style="width: 20%;"><input type="text" name="down_title4" value="<?php echo isset($info['down_title4']) ? $info['down_title4'] : ''; ?>" style="width: 100%;"></td>
								</tr>
							</table>
						</td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td style="text-align: center;">LESS TOTAL DOWN PAYMENTS<span style="float: right;">$</span></td>
						<td><input type="text" class="price" id="total_down" name="total_down" value="<?php echo isset($info['total_down']) ? $info['total_down'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space19" value="<?php echo isset($info['space19']) ? $info['space19'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="price_title5" value="<?php echo isset($info['price_title5']) ? $info['price_title5'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td><input type="text" class="price" id="price9" name="price9" value="<?php echo isset($info['price9']) ? $info['price9'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space20" value="<?php echo isset($info['space20']) ? $info['space20'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="price_title6" value="<?php echo isset($info['price_title6']) ? $info['price_title6'] : ''; ?>" style="width: 96.6%; float: left;"><span>$</span></td>
						<td><input type="text" class="price" id="price10" name="price10" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space21" value="<?php echo isset($info['space21']) ? $info['space21'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="text-align: right;"><b>UNPAID BALANCE</b><span>$</span></td>
						<td><input type="text" class="price" id="balance" name="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : ''; ?>" style="width: 80%; display: inline-block;"></td>
						<td><input type="text" name="space22" value="<?php echo isset($info['space22']) ? $info['space22'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<p style="margin: 0; box-sizing: border: box; padding: 3px; border-top: 0px; font-size: 11px; border: 1px solid blue; border-top: 0px;"><input type="checkbox" name="name" style="margin: 0;"> WHEN THIS BOX IS CHECKED, BUYER(S) UNDERSTAND THAT THE UNIT BUYER(S) IS/ARE BUYING FROM DEALER DESCRIBED ABOVE IS BEING SOLD TO BUYER(S) "AS IS" AND BUYER(S) ACCEPT THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THIS UNIT AND THAT BUYER(S) DID USE BUYER(S) DID USE BUYER(S) OWN JUDGEMENT AND INSPECTION.</p>

		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
			<div class="left" style="float: left; width: 56%;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td class="print-color" colspan="3" style="background-color: blue !important;"><b style="font-size: 12px; color: white !important;">NOTE: WARRANTY AND EXCLUSIONS AND LIMITATIONS OF DAMAGES ON THE REVERSE SIDE:</b></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: center;"><b>DESCRIPTION OF TRADE-IN</b</td>
					</tr>
					<tr>
						<td style="width: 70%;">
							<div class="form-field" style="float: left; width: 45%;">
								<label>BOAT MANUFACTURER</label>
								<input type="text" name="boat_trade" value="<?php echo isset($info['boat_trade']) ? $info['boat_trade'] : ''; ?>"  style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>YEAR</label>
								<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>SIZE</label>
								<input type="text" name="size_trade" value="<?php echo isset($info['size_trade']) ? $info['size_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 25%;">
								<label>H.I.N</label>
								<input type="text" name="hin_trade" value="<?php echo isset($info['hin_trade']) ? $info['hin_trade'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
						<td style="width: 20%;">
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								$ <input type="text" class="price" id="price_trade1" name="price_trade1" value="<?php echo isset($info['price_trade1']) ? $info['price_trade1'] : ''; ?>" style="width: 80%; display: inline-block;">
							</div>
						</td>
						<td style="width: 10%;">
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								<input type="text" name="title_trade1" value="<?php echo isset($info['title_trade1']) ? $info['title_trade1'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="form-field" style="float: left; width: 45%;">
								<label>MOTOR MANUFACTURER</label>
								<input type="text" name="motor_trade" value="<?php echo isset($info['motor_trade']) ? $info['motor_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>YEAR</label>
								<input type="text" name="year1_trade" value="<?php echo isset($info['year1_trade']) ? $info['year1_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>H.P.</label>
								<input type="text" name="hp_trade" value="<?php echo isset($info['hp_trade']) ? $info['hp_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 25%;">
								<label>SERIAL NO.</label>
								
								<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								$ <input type="text" class="price" id="price1_trade" name="price1_trade" value="<?php echo isset($info['price1_trade']) ? $info['price1_trade'] : ''; ?>" style="width: 80%; display: inline-block;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								<input type="text" name="title1_trade" value="<?php echo isset($info['title1_trade']) ? $info['title1_trade'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="form-field" style="float: left; width: 45%;">
								<label>TRAILER MANUFACTURER</label>
								<input type="text" name="trailer_trade" value="<?php echo isset($info['trailer_trade']) ? $info['trailer_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>YEAR</label>
								<input type="text" name="year2_trade" value="<?php echo isset($info['year2_trade']) ? $info['year2_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 15%;">
								<label>H.P.</label>
								<input type="text" name="hp1_trade" value="<?php echo isset($info['hp1_trade']) ? $info['hp1_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 25%;">
								<label>V.I.N.</label>
								<input type="text" name="vin1_trade" value="<?php echo isset($info['vin1_trade']) ? $info['vin1_trade'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								$ <input type="text" class="price" id="price_trade2" name="price_trade2" value="<?php echo isset($info['price_trade2']) ? $info['price_trade2'] : ''; ?>" style="width: 80%; display: inline-block;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								<input type="text" name="title_trade2" value="<?php echo isset($info['title_trade2']) ? $info['title_trade2'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="form-field" style="float: left; width: 45%;">
								<label>MOTOR MANUFACTURER</label>
								<input type="text" name="motor1_trade" value="<?php echo isset($info['motor1_trade']) ? $info['motor1_trade'] : ''; ?>" style="width: 100%;">
							</div>
							<div class="form-field" style="float: left; width: 55%;">
								<label>TO WHOM</label>
								<input type="text" name="whom" value="<?php echo isset($info['whom']) ? $info['whom'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								<input type="text" name="whom_price" value="<?php echo isset($info['whom_price']) ? $info['whom_price'] : ''; ?>" style="width: 80%;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<label>&nbsp;</label>
								<input type="text" name="whom_title" value="<?php echo isset($info['whom_title']) ? $info['whom_title'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
					</tr>
					
					<tr>
						<td style="text-align: center;">
							<b>TOTAL TRADE-IN ALLOWANCE</b>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								$ <input type="text" class="price" id="total_price" name="total_price" value="<?php echo isset($info['total_price']) ? $info['total_price'] : ''; ?>" style="width: 80%; display: inline-block;">
							</div>
						</td>
						<td>
							<div class="form-field" style="float: left; width: 100%;">
								<input type="text" name="total_title" value="<?php echo isset($info['total_title']) ? $info['total_title'] : ''; ?>" style="width: 100%;">
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="3">ANY DEBT BUYER OWES ON TRADE-IN IS TO BE PAID BY <label style="display: inline-block;"><input type="checkbox" name="dealer_check" value="dealer" <?php echo ($info['dealer_check'] == "dealer") ? "checked" : ""; ?> style="margin: 0; display: inline-block;"> DEALER</label> <label style="display: inline-block;"><input type="checkbox" name="buyer_check" value="buyer" <?php echo ($info['buyer_check'] == "buyer") ? "checked" : ""; ?> style="margin: 0;"> BUYER</label></td>
					</tr>
				</table>
			</div>
			<div class="right" style="float: left; width: 44%; box-sizing: border-box; padding: 3px; border: 1px solid blue; border-top: 0px;">
				<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid blue;">
					<label style="font-size: 17px;"><b>REMARKS</b></label>
					<textarea name="remark" style="width: 98%; height: 68px; border: 0px;"><?php echo isset($info['remark'])?$info['remark']:'' ?></textarea>
				</div>
				<p style="float: left; width: 100%; box-sizing: border-box; padding: 3px; margin: 0; font-size: 12px;">Dealer and Buyer(s) certify that the additional terms and conditions printed on the other side of this agreement are agreed to as a part of this agreement the same as if printed above the signature. Buyer(s) certify that the optional equipment, accessories and insurance, if any, has been voluntarily purchased by Buyer(s). Buyer(s) trade-in is free from all liens and encumbrances whatsoever, except as Buyer(s) have indicated herein (See Par. #3 and #12 on the back of this agreement). Dealer and Buyer(s) agree that if any paragraph or provision should violate the law and/or is unenforceable, the rest of this agreement will remain valid.</p>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid blue; border-top: 0px; box-sizing: border-box; padding: 3px;">
			<h2 style="float: left; width: 100%; text-align: center; margin: 2px 0; font-size: 12px; text-decoration: underline;">THIS AGREEMENT CONTAINS A BINDING ARBITRATION PROVISION WHICH MAY BE ENFORCED BY THE PARTIES.</h2>
			<p style="float: left; width; 100%; font-size: 11px; margin: 0;">THE UNDERSIGNED AGREE THAT ANY CONTROVERSY OR CLAIM BETWEEN DEALER AND BUYER ARISING OUT OF OR RELATING TO THIS AGREEMENT, OR BREACH THEREOF, SHALL BE SETTLED EXCLUSIVELY BY ARBITRATION IN ACCORDANCE WITH THE COMMERCIAL ARBITRATION RULES THEN IN FORCE OF THE AMERICAN ARBITRATION ASSOCIATION. THE DECISION RENDERED BY THE ARBITRATOR(S) SHALL BE A FINAL AND BINDING RESOLUTION OF THE CONTROVERSY OR CLAIM, WHICH MAY BE ENTERED AS A JUDGEMENT IN ANY COURT HAVING JURISDICTION THEREOF NEITHER PARTY SHALL SUE THE OTHER WHERE</p>
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

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});


	function calculate_totalprice() {
		
		var price1 = isNaN(parseFloat( $('#price1').val()))?0.00:parseFloat($('#price1').val());
		var price2 = isNaN(parseFloat( $('#price2').val()))?0.00:parseFloat($('#price2').val());
		var price3 = isNaN(parseFloat( $('#price3').val()))?0.00:parseFloat($('#price3').val());
		var price4 = isNaN(parseFloat( $('#price4').val()))?0.00:parseFloat($('#price4').val());
		var purchase = price1 + price2 + price3 + price4;
		$("#purchase").val(purchase.toFixed(2));
		var res = 0;
		for (var i = 1; i <= 24; i++) {
			res += isNaN(parseFloat( $('#access' + i).val()))?0.00:parseFloat($('#access' + i).val());
		}
		$("#equipment").val(res.toFixed(2));

		var price5 = isNaN(parseFloat( $('#price5').val()))?0.00:parseFloat($('#price5').val());
		var price6 = isNaN(parseFloat( $('#price6').val()))?0.00:parseFloat($('#price6').val());
		var special_credit = isNaN(parseFloat( $('#special_credit').val()))?0.00:parseFloat($('#special_credit').val());
		var sub_total = purchase + res + price5 + price6 + special_credit;
		$("#sub_total").val(sub_total.toFixed(2));	
		var price7 = isNaN(parseFloat( $('#price7').val()))?0.00:parseFloat($('#price7').val());
		var retailer = isNaN(parseFloat( $('#retailer').val()))?0.00:parseFloat($('#retailer').val());
		var freight = isNaN(parseFloat( $('#freight').val()))?0.00:parseFloat($('#freight').val());
		var price8 = isNaN(parseFloat( $('#price8').val()))?0.00:parseFloat($('#price8').val());
		var cash_price = isNaN(parseFloat( $('#cash_price').val()))?0.00:parseFloat($('#cash_price').val());

		var price_trade1 = isNaN(parseFloat( $('#price_trade1').val()))?0.00:parseFloat($('#price_trade1').val());
		var price1_trade = isNaN(parseFloat( $('#price1_trade').val()))?0.00:parseFloat($('#price1_trade').val());
		var price_trade2 = isNaN(parseFloat( $('#price_trade2').val()))?0.00:parseFloat($('#price_trade2').val());
		var total_price = price_trade1 + price1_trade + price_trade2;
		$("#total_price").val(total_price.toFixed(2));	
		$("#less").val(total_price.toFixed(2));	
		
		var subtotal = sub_total + price7 + retailer + freight + price8 - cash_price - total_price;
		$("#subtotal").val(subtotal.toFixed(2));
		var sales_tax = isNaN(parseFloat( $('#sales_tax').val()))?0.00:parseFloat($('#sales_tax').val());
		var net_sale = isNaN(parseFloat( $('#net_sale').val()))?0.00:parseFloat($('#net_sale').val());
		var office_fee = isNaN(parseFloat( $('#office_fee').val()))?0.00:parseFloat($('#office_fee').val());

		var down_price1 = isNaN(parseFloat( $('#down_price1').val()))?0.00:parseFloat($('#down_price1').val());
		var down_price2 = isNaN(parseFloat( $('#down_price2').val()))?0.00:parseFloat($('#down_price2').val());
		var down_price3 = isNaN(parseFloat( $('#down_price3').val()))?0.00:parseFloat($('#down_price3').val());
		var down_price4 = isNaN(parseFloat( $('#down_price4').val()))?0.00:parseFloat($('#down_price4').val());
		var total_down = down_price1 + down_price2 + down_price3 + down_price4;
		$("#total_down").val(total_down.toFixed(2));

		var price9 = isNaN(parseFloat( $('#price9').val()))?0.00:parseFloat($('#price9').val());
		var price10 = isNaN(parseFloat( $('#price10').val()))?0.00:parseFloat($('#price10').val());
 		var balance = subtotal + sales_tax - net_sale + office_fee + total_down + price9 + price10;
		$("#balance").val(balance.toFixed(2)); 		

	}


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
