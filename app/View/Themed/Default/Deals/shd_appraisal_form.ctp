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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0; padding: 0 4px;}
	label{font-size: 14px;}
	

.left li {display: inline-block; font-size: 12px; list-style: outside none none; padding: 0 6px;}
td{border-bottom: 1px solid #000; padding: 2px 8px;  border-left: 1px solid #000;}
th{border-top: 2px solid #000;  border-bottom: 2px solid #000;  border-left: 1px solid #000; text-align: center; font-style: italic; padding: 2px 8px;}
td:first-child, th:first-child{border-left: 0px;}
table input[type="text"]{border: 0px; text-align: center;}
.wraper.main input {padding: 0px;}
input[type="radio"] {position: relative; top: 4px;}
	table td:last-child input[type="text"]{text-align: left;}
	@media print { 
	.dontprint{display: none;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
			<div class="row" style="float: left; width: 100%; margin: 0; position: relative">
			<div class="left"  style="float: left; width: 30%; margin: 0 0 88px;">
				<strong>HARLEY-DAVIDSON OF SCOTTSDALE</strong>
				<ul style="margin: 0; padding: 0;">
					<li style="border-right: 1px solid #000;">15656 N Hayden Rd. </li>
					<li>Scottsdale, AZ 85260</li>
				</ul>
			</div>
		
			<div class="logo" style="margin: 2px auto 0; width: 150px; position: absolute; left: 0; right: 0;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right;">
				<strong>www.HDofScottsdale.com</strong>
				<p style="margin: 2px 0; text-align: center;">(888) 370-1285</p>
			</div>
		</div>
		<h2 style="width: 100%; text-align: center; text-decoration: uppercase; font-size: 18px; font-weight: bold;">PRE-OWNED MOTORCYCLE APPRAISAL FORM</h2>
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 25%">
				<label>Date</label>
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:''; ?>" style="width: 80%;" />
			</div>
			<div class="form-field" style="float: left; width: 30%">
				<label>Initial</label>
				<input type="text" name="initial" value="<?php echo isset($info['initial'])?$info['initial']:''; ?>" style="width: 78%;" />
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 45%">
				<label>Name</label>
				<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 87%;" />
			</div>
			<div class="form-field" style="float: left; width: 19%">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 77%;" />
			</div>
			<div class="form-field" style="float: left; width: 18%">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 71%;" />
			</div>
			<div class="form-field" style="float: right; width: 17%">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 66%;" />
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 45%">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 81%;" />
			</div>
			<div class="form-field" style="float: left; width: 30%">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 80%;" />
			</div>
			<div class="form-field" style="float: left; width: 13%">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 58%;" />
			</div>
			<div class="form-field" style="float: right; width: 12%">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 64%;" />
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 33%">
				<label>County</label>
				<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width: 78%;" />
			</div>
			<div class="form-field" style="float: left; width: 33%">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 68%;" />
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>Color</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 25%">
				<label>Mileage</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 68%;">
			</div>
			<div class="form-field" style="float: left; width: 25%">
				<label>Actual </label>
				<span><input type="radio" name="actual_val" value="yes" <?php echo (isset($info['actual_val']) && $info['actual_val'] == 'yes') ?> />&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="actual_val" value="yes" <?php echo (isset($info['actual_val']) && $info['actual_val'] == 'no') ?> />&nbsp;No</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 33%">
				<label>Factory Warr. Expires</label>
				<input type="text" name="warranty_expires" value="<?php echo isset($info['warranty_expires'])?$info['warranty_expires']:''; ?>" style="width: 42%;">
			</div>
			<div class="form-field" style="float: left; width: 33%">
				<label>Ext. Warr Expires</label>
				<input type="text" name="ext_warranty_exp" value="<?php echo isset($info['ext_warranty_exp'])?$info['ext_warranty_exp']:''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: left; width: 19%">
				<label>Vin</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 80%;" />
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="form-field" style="float: left; width: 70%">
				<label>Title Type:</label>
					<span style="margin-left: 6%">Original MFG ( <input type="radio" name="title_type" value="original_mfg" <?php echo (isset($info['title_type']) && $info['title_type'] == 'original_mfg')?'checked':''; ?> /> )</span>
					<span style="margin-left: 6%">Recon. ( <input type="radio" name="title_type" value="recon" <?php echo (isset($info['title_type']) && $info['title_type'] == 'recon')?'checked':''; ?> /> )</span>
					<span style="margin-left: 6%">Spec.Const. ( <input type="radio" name="title_type" value="spec_const" <?php echo (isset($info['title_type']) && $info['title_type'] == 'spec_const')?'checked':''; ?> /> )</span> 
			</div>
			<div class="form-field" style="float: left; width: 29%">
				<label>Codes</label>
				<input type="text" name="codes" value="<?php echo isset($info['codes'])?$info['codes']:''; ?>" style="width: 80%;">
			</div>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 0px 0 0;">
			<table style="width: 100%;" cellspacing="0" cellpadding="0";>
				<tr>
					<th style="text-align: left; padding-left: 5px;">Item</th>
					<th style="width: 9%;">OK<sup>*</sup></th>
					<th style="width: 15%;">Orig.Equip Y/N</th>
					<th style="width: 15%;">Repair/Replace</th>
					<th style="width: 12%;">Amount</th>
					<th style="width: 30%;text-align: left;">Brief Description</th>
				</tr>
				
				<tr>
					<td>Physical Damage</td>
					<td><input type="text" name="item_status_1" value="<?php echo isset($info['item_status_1'])?$info['item_status_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_1" value="<?php echo isset($info['item_equip_1'])?$info['item_equip_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_1" value="<?php echo isset($info['item_repair_1'])?$info['item_repair_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_1" value="<?php echo isset($info['item_amount_1'])?$info['item_amount_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_1" value="<?php echo isset($info['item_desc_1'])?$info['item_desc_1']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Windshield/Fairings</td>
					<td><input type="text" name="item_status_2" value="<?php echo isset($info['item_status_2'])?$info['item_status_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_2" value="<?php echo isset($info['item_equip_2'])?$info['item_equip_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_2" value="<?php echo isset($info['item_repair_2'])?$info['item_repair_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_2" value="<?php echo isset($info['item_amount_2'])?$info['item_amount_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_2" value="<?php echo isset($info['item_desc_2'])?$info['item_desc_2']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Fenders</td>
					<td><input type="text" name="item_status_3" value="<?php echo isset($info['item_status_3'])?$info['item_status_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_3" value="<?php echo isset($info['item_equip_3'])?$info['item_equip_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_3" value="<?php echo isset($info['item_repair_3'])?$info['item_repair_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_3" value="<?php echo isset($info['item_amount_3'])?$info['item_amount_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_3" value="<?php echo isset($info['item_desc_3'])?$info['item_desc_3']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Tanks Gas/Oil</td>
					<td><input type="text" name="item_status_4" value="<?php echo isset($info['item_status_4'])?$info['item_status_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_4" value="<?php echo isset($info['item_equip_4'])?$info['item_equip_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_4" value="<?php echo isset($info['item_repair_4'])?$info['item_repair_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_4" value="<?php echo isset($info['item_amount_4'])?$info['item_amount_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_4" value="<?php echo isset($info['item_desc_4'])?$info['item_desc_4']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Saddlebags</td>
					<td><input type="text" name="item_status_5" value="<?php echo isset($info['item_status_5'])?$info['item_status_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_5" value="<?php echo isset($info['item_equip_5'])?$info['item_equip_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_5" value="<?php echo isset($info['item_repair_5'])?$info['item_repair_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_5" value="<?php echo isset($info['item_amount_5'])?$info['item_amount_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_5" value="<?php echo isset($info['item_desc_5'])?$info['item_desc_5']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Tour Pak</td>
					<td><input type="text" name="item_status_6" value="<?php echo isset($info['item_status_6'])?$info['item_status_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_6" value="<?php echo isset($info['item_equip_6'])?$info['item_equip_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_6" value="<?php echo isset($info['item_repair_6'])?$info['item_repair_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_6" value="<?php echo isset($info['item_amount_6'])?$info['item_amount_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_6" value="<?php echo isset($info['item_desc_6'])?$info['item_desc_6']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Frame</td>
					<td><input type="text" name="item_status_7" value="<?php echo isset($info['item_status_7'])?$info['item_status_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_7" value="<?php echo isset($info['item_equip_7'])?$info['item_equip_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_7" value="<?php echo isset($info['item_repair_7'])?$info['item_repair_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_7" value="<?php echo isset($info['item_amount_7'])?$info['item_amount_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_8" value="<?php echo isset($info['item_desc_8'])?$info['item_desc_8']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Forks/Shocks</td>
					<td><input type="text" name="item_status_8" value="<?php echo isset($info['item_status_8'])?$info['item_status_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_8" value="<?php echo isset($info['item_equip_8'])?$info['item_equip_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_8" value="<?php echo isset($info['item_repair_8'])?$info['item_repair_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_8" value="<?php echo isset($info['item_amount_8'])?$info['item_amount_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_8" value="<?php echo isset($info['item_desc_8'])?$info['item_desc_8']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Footpegs/Floorboards</td>
					<td><input type="text" name="item_status_9" value="<?php echo isset($info['item_status_9'])?$info['item_status_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_9" value="<?php echo isset($info['item_equip_9'])?$info['item_equip_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_9" value="<?php echo isset($info['item_repair_9'])?$info['item_repair_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_9" value="<?php echo isset($info['item_amount_9'])?$info['item_amount_2']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_desc_9" value="<?php echo isset($info['item_desc_9'])?$info['item_desc_9']:''; ?>" style="width: 100%;" /></td>
				</tr>
				
				<tr>
					<td>Wheels/Tires</td>
					<td><input type="text" name="item_status_10" value="<?php echo isset($info['item_status_10'])?$info['item_status_10']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_equip_10" value="<?php echo isset($info['item_equip_10'])?$info['item_equip_10']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_repair_10" value="<?php echo isset($info['item_repair_10'])?$info['item_repair_10']:''; ?>" style="width: 100%;"/></td>
					<td><input type="text" name="item_amount_10" value="<?php echo isset($info['item_amount_10'])?$info['item_amount_10']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_desc_10" value="<?php echo isset($info['item_desc_10'])?$info['item_desc_10']:''; ?>" style="width: 100%;" /></td>
				</tr>
				
				<tr>
					<td>Lights/Turn Signals</td>
					<td><input type="text" name="item_status_11" value="<?php echo isset($info['item_status_11'])?$info['item_status_11']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_equip_11" value="<?php echo isset($info['item_equip_11'])?$info['item_equip_11']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_repair_11" value="<?php echo isset($info['item_repair_11'])?$info['item_repair_11']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_amount_11" value="<?php echo isset($info['item_amount_11'])?$info['item_amount_11']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_desc_11" value="<?php echo isset($info['item_desc_11'])?$info['item_desc_11']:''; ?>" style="width: 100%;" /></td>
				</tr>
				
				<tr>
					<td>Speedo/Tach/Gauges</td>
					<td><input type="text" name="item_status_12" value="<?php echo isset($info['item_status_12'])?$info['item_status_12']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_equip_12" value="<?php echo isset($info['item_equip_12'])?$info['item_equip_12']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_repair_12" value="<?php echo isset($info['item_repair_12'])?$info['item_repair_12']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_amount_12" value="<?php echo isset($info['item_amount_12'])?$info['item_amount_12']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_desc_12" value="<?php echo isset($info['item_desc_12'])?$info['item_desc_12']:''; ?>" style="width: 100%;" /></td>
				</tr>
				
				<tr>
					<td>Battery</td>
					<td><input type="text" name="item_status_13" value="<?php echo isset($info['item_status_13'])?$info['item_status_13']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_13" value="<?php echo isset($info['item_equip_13'])?$info['item_equip_13']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_13" value="<?php echo isset($info['item_repair_13'])?$info['item_repair_13']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_13" value="<?php echo isset($info['item_amount_13'])?$info['item_amount_13']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_13" value="<?php echo isset($info['item_desc_13'])?$info['item_desc_13']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Controls/Switches</td>
					<td><input type="text" name="item_status_14" value="<?php echo isset($info['item_status_14'])?$info['item_status_14']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_14" value="<?php echo isset($info['item_equip_14'])?$info['item_equip_14']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_14" value="<?php echo isset($info['item_repair_14'])?$info['item_repair_14']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_14" value="<?php echo isset($info['item_amount_14'])?$info['item_amount_14']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_14" value="<?php echo isset($info['item_desc_14'])?$info['item_desc_14']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Mirrors/Horn</td>
					<td><input type="text" name="item_status_15" value="<?php echo isset($info['item_status_15'])?$info['item_status_15']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_equip_15" value="<?php echo isset($info['item_equip_15'])?$info['item_equip_15']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_repair_15" value="<?php echo isset($info['item_repair_15'])?$info['item_repair_15']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_amount_15" value="<?php echo isset($info['item_amount_15'])?$info['item_amount_15']:''; ?>" style="width: 100%;" /></td>
					<td><input type="text" name="item_desc_15" value="<?php echo isset($info['item_desc_15'])?$info['item_desc_15']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Chrome</td>
					<td><input type="text" name="item_status_16" value="<?php echo isset($info['item_status_16'])?$info['item_status_16']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_16" value="<?php echo isset($info['item_equip_16'])?$info['item_equip_16']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_16" value="<?php echo isset($info['item_repair_16'])?$info['item_repair_16']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_16" value="<?php echo isset($info['item_amount_16'])?$info['item_amount_16']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_16" value="<?php echo isset($info['item_desc_16'])?$info['item_desc_16']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Seats/Sissy Bars</td>
					<td><input type="text" name="item_status_17" value="<?php echo isset($info['item_status_17'])?$info['item_status_17']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_17" value="<?php echo isset($info['item_equip_17'])?$info['item_equip_17']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_17" value="<?php echo isset($info['item_repair_17'])?$info['item_repair_17']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_17" value="<?php echo isset($info['item_amount_17'])?$info['item_amount_17']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_17" value="<?php echo isset($info['item_desc_17'])?$info['item_desc_17']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Cables Throttle/Clutch</td>
					<td><input type="text" name="item_status_18" value="<?php echo isset($info['item_status_18'])?$info['item_status_18']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_18" value="<?php echo isset($info['item_equip_18'])?$info['item_equip_18']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_18" value="<?php echo isset($info['item_repair_18'])?$info['item_repair_18']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_18" value="<?php echo isset($info['item_amount_18'])?$info['item_amount_18']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_18" value="<?php echo isset($info['item_desc_18'])?$info['item_desc_18']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Carb/Fuel Inj/Filter</td>
					<td><input type="text" name="item_status_19" value="<?php echo isset($info['item_status_19'])?$info['item_status_19']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_19" value="<?php echo isset($info['item_equip_19'])?$info['item_equip_19']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_19" value="<?php echo isset($info['item_repair_19'])?$info['item_repair_19']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_19" value="<?php echo isset($info['item_amount_19'])?$info['item_amount_19']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_19" value="<?php echo isset($info['item_desc_19'])?$info['item_desc_19']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Electrical System</td>
					<td><input type="text" name="item_status_20" value="<?php echo isset($info['item_status_20'])?$info['item_status_20']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_20" value="<?php echo isset($info['item_equip_20'])?$info['item_equip_20']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_20" value="<?php echo isset($info['item_repair_20'])?$info['item_repair_20']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_20" value="<?php echo isset($info['item_amount_20'])?$info['item_amount_20']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_20" value="<?php echo isset($info['item_desc_20'])?$info['item_desc_20']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Engine</td>
					<td><input type="text" name="item_status_21" value="<?php echo isset($info['item_status_21'])?$info['item_status_21']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_21" value="<?php echo isset($info['item_equip_21'])?$info['item_equip_21']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_21" value="<?php echo isset($info['item_repair_21'])?$info['item_repair_21']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_21" value="<?php echo isset($info['item_amount_21'])?$info['item_amount_21']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_21" value="<?php echo isset($info['item_desc_21'])?$info['item_desc_21']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Clutch</td>
					<td><input type="text" name="item_status_22" value="<?php echo isset($info['item_status_22'])?$info['item_status_22']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_22" value="<?php echo isset($info['item_equip_22'])?$info['item_equip_22']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_22" value="<?php echo isset($info['item_repair_22'])?$info['item_repair_22']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_22" value="<?php echo isset($info['item_amount_22'])?$info['item_amount_22']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_22" value="<?php echo isset($info['item_desc_22'])?$info['item_desc_22']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Transmission</td>
					<td><input type="text" name="item_status_23" value="<?php echo isset($info['item_status_23'])?$info['item_status_23']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_23" value="<?php echo isset($info['item_equip_23'])?$info['item_equip_23']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_23" value="<?php echo isset($info['item_repair_23'])?$info['item_repair_23']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_23" value="<?php echo isset($info['item_amount_23'])?$info['item_amount_23']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_23" value="<?php echo isset($info['item_desc_23'])?$info['item_desc_23']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Rear Belt/Chain</td>
					<td><input type="text" name="item_status_24" value="<?php echo isset($info['item_status_24'])?$info['item_status_24']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_24" value="<?php echo isset($info['item_equip_24'])?$info['item_equip_24']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_24" value="<?php echo isset($info['item_repair_24'])?$info['item_repair_24']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_24" value="<?php echo isset($info['item_amount_24'])?$info['item_amount_24']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_24" value="<?php echo isset($info['item_desc_24'])?$info['item_desc_24']:''; ?>" style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Brake Pads/Discs/Hoses</td>
					<td><input type="text" name="item_status_25" value="<?php echo isset($info['item_status_25'])?$info['item_status_25']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_25" value="<?php echo isset($info['item_equip_25'])?$info['item_equip_25']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_25" value="<?php echo isset($info['item_repair_25'])?$info['item_repair_25']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_25" value="<?php echo isset($info['item_amount_25'])?$info['item_amount_25']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_25" value="<?php echo isset($info['item_desc_25'])?$info['item_desc_25']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Exhaust System</td>
					<td><input type="text" name="item_status_26" value="<?php echo isset($info['item_status_26'])?$info['item_status_26']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_26" value="<?php echo isset($info['item_equip_26'])?$info['item_equip_26']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_26" value="<?php echo isset($info['item_repair_26'])?$info['item_repair_26']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_26" value="<?php echo isset($info['item_amount_26'])?$info['item_amount_26']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_26" value="<?php echo isset($info['item_desc_26'])?$info['item_desc_26']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Oil Leaks</td>
					<td><input type="text" name="item_status_27" value="<?php echo isset($info['item_status_27'])?$info['item_status_27']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_27" value="<?php echo isset($info['item_equip_27'])?$info['item_equip_27']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_27" value="<?php echo isset($info['item_repair_27'])?$info['item_repair_27']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_27" value="<?php echo isset($info['item_amount_27'])?$info['item_amount_27']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_27" value="<?php echo isset($info['item_desc_27'])?$info['item_desc_27']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Repainting</td>
					<td><input type="text" name="item_status_28" value="<?php echo isset($info['item_status_28'])?$info['item_status_28']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_28" value="<?php echo isset($info['item_equip_28'])?$info['item_equip_28']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_28" value="<?php echo isset($info['item_repair_28'])?$info['item_repair_28']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_28" value="<?php echo isset($info['item_amount_28'])?$info['item_amount_28']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_28" value="<?php echo isset($info['item_desc_28'])?$info['item_desc_28']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Road Tested By</td>
					<td><input type="text" name="item_status_29" value="<?php echo isset($info['item_status_29'])?$info['item_status_29']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_29" value="<?php echo isset($info['item_equip_29'])?$info['item_equip_29']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_29" value="<?php echo isset($info['item_repair_29'])?$info['item_repair_29']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_29" value="<?php echo isset($info['item_amount_29'])?$info['item_amount_29']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_29" value="<?php echo isset($info['item_desc_29'])?$info['item_desc_29']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Appraised By</td>
					<td><input type="text" name="item_status_30" value="<?php echo isset($info['item_status_30'])?$info['item_status_30']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_equip_30" value="<?php echo isset($info['item_equip_30'])?$info['item_equip_30']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_repair_30" value="<?php echo isset($info['item_repair_30'])?$info['item_repair_30']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_amount_30" value="<?php echo isset($info['item_amount_30'])?$info['item_amount_30']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="item_desc_30" value="<?php echo isset($info['item_desc_30'])?$info['item_desc_30']:''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<table cellspacing="0" cellpadding="0" style="width: 100%; border-top: 1px solid #000; border-bottom: 2px solid #000;">
				<tr>
					<td style="width: 28.1%;"><strong>Reconditioning Expense</strong></td>
					<td style="width: 15%;"><input type="text" name="recondition_expense" value="<?php echo isset($info['recondition_expense'])?$info['recondition_expense']:''; ?>" class="amount-field" style="width: 100%;"></td>
					<td style="width: 27%;"><strong>Current Trade in Value</strong></td>
					<td style="width: 31%;"><strong>$</strong><input type="text" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width: 90%;"></td>
				</tr>
				
				<tr>
					<td><strong>Our Shop Repair Charges</strong></td>
					<td><input type="text" name="repair_charges" value="<?php echo isset($info['repair_charges'])?$info['repair_charges']:''; ?>" class="amount-field" style="width: 100%;" /></td>
					<td><i style="margin-left: 23%;">“Show Room Condition”</i></td>
					<td><input type="text" name="show_room_condition" value="<?php echo isset($info['show_room_condition'])?$info['show_room_condition']:''; ?>" style="width: 100%;" /></td>
				</tr>
				
				<tr>
					<td><strong>Sublet Repair Charges</strong></td>
					<td><input type="text" name="sublet_repair" value="<?php echo isset($info['sublet_repair'])?$info['sublet_repair']:''; ?>" class="amount-field" style="width: 100%;" /></td>
					<td><strong>Total Repair Costs</strong></td>
					<td><strong>$</strong><input type="text" name="total_repair_cost" value="<?php echo isset($info['total_repair_cost'])?$info['total_repair_cost']:''; ?>" id="total_repair_cost" style="width: 90%;"></td>
				</tr>
				
				<tr>
					<td><strong>Shop Supplies</strong></td>
					<td><strong>$30</strong><input type="text" name="shop_supplies" value="<?php echo isset($info['shop_supplies'])?$info['shop_supplies']:''; ?>" style="width: 76%;"></td>
					<td><i style="margin-left: 36%;">"From Left Colum"</i></td>
					<td><input type="text" name="shop_supply2" value="<?php echo isset($info['shop_supply2'])?$info['shop_supply2']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><strong>Total Repair Costs</strong></td>
					<td><input type="text" name="total_cost" id="total_cost" value="<?php echo isset($info['total_cost'])?$info['total_cost']:''; ?>" style="width: 100%;"></td>
					<td><strong>Your Trade-In Allowance</strong></td>
					<td><strong>$</strong><input type="text" name="trade_allowance" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" style="width: 90%;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%">
				<label>Offer Expires</label>
				<input type="text" name="offer_expires" value="<?php echo isset($info['offer_expires'])?$info['offer_expires']:''; ?>" style="width: 20%;">
				<span><strong><i>Offer Void If Motorcycle Condition Changes</i></strong></span>
			</div>
		</div>
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

	//alert("please select a fee");	
	
	$(".date_input_field").bdatepicker();
	
	$(".amount-field").on('change keyup paste',function(){
		total_cost = 0.00
		$('.amount-field').each(function(index, element) {
            val = isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
			total_cost += val;
        });
		total_cost += 30.00;
		$("#total_cost").val(total_cost.toFixed(2));
		$("#total_repair_cost").val(total_cost.toFixed(2));
		
		});

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
