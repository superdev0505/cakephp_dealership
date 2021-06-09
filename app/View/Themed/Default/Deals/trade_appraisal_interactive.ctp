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
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px;}
	td, th{padding: 0px; border-bottom: 0px solid #000;}
	td:first-child{border-left: 0px solid #000;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px; font-size: 14px;}
	.cover input[type="text"]{border: 0px;}
	.no-border input[type="text"]{border: 0px;}
	
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 50% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="logo" style="width: 60px; float: left; margin-left: 24%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-gold-store.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 36%; text-align: center; margin: 20px 0 0 0px;">
				RV General Store TRADE APPRAISAL SHEET
			</div>
			<div class="logo" style="width: 60px; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-gold-store.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="upper" style="width: 100%; float: left; margin: 4px 0; box-sizing: border-box;">
			<div class="left" style="width: 60%; float: left; box-sizing: border-box; border: 1px solid #000; padding: 7px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 65%;">
						<label>Sales Person:</label>
						<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 35%;">
						<label>Date:</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
					<div class="form-field" style="float: left; width: 65%;">
						<label>Customer Name:</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 35%;">
						<label>Phone #</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 72%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label>MAKE:</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 34%;">
						<label>MODEL:</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label>YEAR:</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>M/H <input type="checkbox" name="mh_check" <?php echo ($info['mh_check'] == "mh") ? "checked" : ""; ?> value="mh"/></label>
						<label>TRAVEL TRAILER <input type="checkbox" name="travel_check" <?php echo ($info['travel_check'] == "travel") ? "checked" : ""; ?> value="travel"/></label>
						<label>5<sup>TH</sup> WHEEL <input type="checkbox" name="wheel_check" <?php echo ($info['wheel_check'] == "wheel") ? "checked" : ""; ?> value="wheel"/></label>
						<label>POP UP <input type="checkbox" name="pop_check" <?php echo ($info['pop_check'] == "pop") ? "checked" : ""; ?> value="pop"/></label>
						<label>OTHER <input type="checkbox" name="other_check" <?php echo ($info['other_check'] == "other") ? "checked" : ""; ?> value="other"/></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label># of Slides:</label>
						<input type="text" name="slides" value="<?php echo isset($info['slides'])?$info['slides']:''; ?>" style="width: 60%;">
					</div>
					<div class="form-field" style="float: left; width: 34%;">
						<label>Chassis:</label>
						<input type="text" name="chassis" value="<?php echo isset($info['chassis'])?$info['chassis']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label>Miles:</label>
						<input type="text" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" style="width: 70%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="width: 39%; float: right; box-sizing: border-box; border: 1px solid #000; padding: 5px;">
				<p style="float: left; width: 100%; margin: 2px 0 10px;"><label style="text-decoration: underline;">For Office Use Only</label></p>
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Bidding Manager</label>
						<input type="text" name="bidding" value="<?php echo isset($info['bidding'])?$info['bidding']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>NADA WS/Trade</label>
						<input type="text" name="nada" value="<?php echo isset($info['nada'])?$info['nada']:''; ?>" style="width: 40%;">
						<label>NADA</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Retail</label>
						<input type="text" name="retail" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" style="width: 40%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>VIN on Unit</label>
						<input type="text" name="vin_unit" value="<?php echo isset($info['vin_unit'])?$info['vin_unit']:''; ?>" style="width: 76%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 30%;">
						<label>Tag State</label>
						<input type="text" name="tag_state" value="<?php echo isset($info['tag_state'])?$info['tag_state']:''; ?>" style="width: 38%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Tag #</label>
						<input type="text" name="tag" value="<?php echo isset($info['tag'])?$info['tag']:''; ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="float: left; width: 40%;">
						<label>Expiration Date</label>
						<input type="text" name="exp_date" value="<?php echo isset($info['exp_date'])?$info['exp_date']:''; ?>" style="width: 30%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Inspection Manager</label>
						<input type="text" name="name" style="width: 40%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>ACV</label>
						<input type="text" name="name" style="width: 40%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
			<label style="font-size: 16px; margin-left: 30px;"><b>RATE YOUR TRADE IN:</b></label>
			<label style="margin: 0 2%;">1 <input type="checkbox" name="rate1_check" <?php echo ($info['rate1_check'] == "1") ? "checked" : ""; ?> value="1"/></label>
			<label style="margin: 0 2%;">2 <input type="checkbox" name="rate2_check" <?php echo ($info['rate2_check'] == "2") ? "checked" : ""; ?> value="2"/></label>
			<label style="margin: 0 2%;">3 <input type="checkbox" name="rate3_check" <?php echo ($info['rate3_check'] == "3") ? "checked" : ""; ?> value="3"/></label>
			<label style="margin: 0 2%;">4 <input type="checkbox" name="rate4_check" <?php echo ($info['rate4_check'] == "4") ? "checked" : ""; ?> value="4"/></label>
			<label style="margin: 0 2%;">5 <input type="checkbox" name="rate5_check" <?php echo ($info['rate5_check'] == "5") ? "checked" : ""; ?> value="5"/></label>
			<label style="margin: 0 2%;">6 <input type="checkbox" name="rate6_check" <?php echo ($info['rate6_check'] == "6") ? "checked" : ""; ?> value="6"/></label>
			<label style="margin: 0 2%;">7 <input type="checkbox" name="rate7_check" <?php echo ($info['rate7_check'] == "7") ? "checked" : ""; ?> value="7"/></label>
			<label style="margin: 0 2%;">8 <input type="checkbox" name="rate8_check" <?php echo ($info['rate8_check'] == "8") ? "checked" : ""; ?> value="8"/></label>
			<label style="margin: 0 2%;">9 <input type="checkbox" name="rate9_check" <?php echo ($info['rate9_check'] == "9") ? "checked" : ""; ?> value="9"/></label>
			<label style="margin: 0 2%;">10 <input type="checkbox" name="rate10_check" <?php echo ($info['rate10_check'] == "10") ? "checked" : ""; ?> value="10"/></label>
		</div>
		
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 15px;">AT TIME OF DELIVERY THE FOLLOWING ITEMS WILL BE CHECKED AND TESTED TO CONFIRM PROPER WORKING ORDER AND OR CONDITION AS TO THE FOLLOWING TRADE APPRAISAL HAS BEEN FILLED OUT AND SIGNED BY CONTRACTED CUSTOMER. UPON INSPECTON ANY MISREPRESENTATION OR MALFUNCTION OF ANY OF THE FOLLOWING ITEMS WILL BE EVALUATED AND PROPER ADJUSTMENTS MADE TO THE VALUE OF TRADE AND CONTRACTED DOLLAR AMOUNT. THIS FORM IS A SIGNED AND LEGALLY BINDING CONTRACT AND SERVES A TRUE REPRESENTATION OF THE ABOVE STATED UNIT BEING TRADED TO RV GENERAL STORE. THE FOLLOWING DOLLAR AMOUNTS WILL BE USED FOR ANY MISREPRESENTATION AND OR REPLARS NEEDED TO ABOVE STATED UNIT.</p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 65%;">
				<div class="form-field" style="float: left; width: 33%;">
					<label>SMOKED IN</label>
					<label>Y <input type="radio" name="smoked_check" value="yes" <?php echo (isset($info['smoked_check'])&&$info['smoked_check']=='yes')?'checked="checked"':''; ?>  /></label>
					<label>N <input type="radio" name="smoked_check" value="no" <?php echo (isset($info['smoked_check'])&&$info['smoked_check']=='no')?'checked="checked"':''; ?>  /></label>
				</div>
				<div class="form-field" style="float: left; width: 34%;">
					<label>PETS</label>
					<label>Y <input type="radio" name="pet_check" value="yes" <?php echo (isset($info['pet_check'])&&$info['pet_check']=='yes')?'checked="checked"':''; ?>  /></label>
					<label>N <input type="radio" name="pet_check" value="no" <?php echo (isset($info['pet_check'])&&$info['pet_check']=='no')?'checked="checked"':''; ?>  /></label>
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>FULL TIME</label>
					<label>Y <input type="radio" name="time_check" value="yes" <?php echo (isset($info['time_check'])&&$info['time_check']=='yes')?'checked="checked"':''; ?>  /></label>
					<label>N <input type="radio" name="time_check" value="no" <?php echo (isset($info['time_check'])&&$info['time_check']=='no')?'checked="checked"':''; ?>  /></label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
					<label>CARPET CONDITION</label>
					<input type="text" name="carpet" value="<?php echo isset($info['carpet'])?$info['carpet']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 33%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/rv-wf-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 10px 0 0;">
			<tr>
				<td><b>EQUIPMENT</b></td>
				<td style="text-align: center;"><b>YES</b></td>
				<td style="text-align: center;"><b>NO</b></td>
				<td style="text-align: center;"><b>WORKING</b></td>
				<td style="text-align: center;"><b>NOT WORKING</b></td>
				<td><b>ASSESSES VALUE</b></td>
			</tr>
			
			<tr>
				<td>A/C</td>
				<td style="text-align: center;"><input type="checkbox" name="ac_y" value="yes" <?php echo (isset($info['ac_y'])&&$info['ac_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="ac_n" value="no" <?php echo (isset($info['ac_n'])&&$info['ac_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="ac_work" value="working" <?php echo (isset($info['ac_work'])&&$info['ac_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="ac_no_work" value="no_working" <?php echo (isset($info['ac_no_work'])&&$info['ac_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess1" value="<?php echo isset($info['assess1'])?$info['assess1']:'$995.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>REFRIGERATOR</td>
				<td style="text-align: center;"><input type="checkbox" name="refrig_y" value="yes" <?php echo (isset($info['refrig_y'])&&$info['refrig_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="refrig_n" value="no" <?php echo (isset($info['refrig_n'])&&$info['refrig_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="refrig_work" value="working" <?php echo (isset($info['refrig_work'])&&$info['refrig_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="refrig_no_work" value="no_working" <?php echo (isset($info['refrig_no_work'])&&$info['refrig_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess2" value="<?php echo isset($info['assess2'])?$info['assess2']:'$2,500.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>MICROWAVE</td>
				<td style="text-align: center;"><input type="checkbox" name="microwave_y" value="yes" <?php echo (isset($info['microwave_y'])&&$info['microwave_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="microwave_n" value="no" <?php echo (isset($info['microwave_n'])&&$info['microwave_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="microwave_work" value="working" <?php echo (isset($info['microwave_work'])&&$info['microwave_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="microwave_no_work" value="no_working" <?php echo (isset($info['microwave_no_work'])&&$info['microwave_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess3" value="<?php echo isset($info['assess3'])?$info['assess3']:'$325.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>TV ANTENNA</td>
				<td style="text-align: center;"><input type="checkbox" name="antenna_y" value="yes" <?php echo (isset($info['antenna_y'])&&$info['antenna_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="antenna_n" value="no" <?php echo (isset($info['antenna_n'])&&$info['antenna_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="antenna_work" value="working" <?php echo (isset($info['antenna_work'])&&$info['antenna_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="antenna_no_work" value="no_working" <?php echo (isset($info['antenna_no_work'])&&$info['antenna_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess4" value="<?php echo isset($info['assess4'])?$info['assess4']:'$250.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>TV</td>
				<td style="text-align: center;"><input type="checkbox" name="tv_y" value="yes" <?php echo (isset($info['tv_y'])&&$info['tv_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tv_n" value="no" <?php echo (isset($info['tv_n'])&&$info['tv_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tv_work" value="working" <?php echo (isset($info['tv_work'])&&$info['tv_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tv_no_work" value="no_working" <?php echo (isset($info['tv_no_work'])&&$info['tv_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess5" value="<?php echo isset($info['assess5'])?$info['assess5']:'$595.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>WATER PUMP</td>
				<td style="text-align: center;"><input type="checkbox" name="water_y" value="yes" <?php echo (isset($info['water_y'])&&$info['water_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="water_n" value="no" <?php echo (isset($info['water_n'])&&$info['water_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="water_work" value="working" <?php echo (isset($info['water_work'])&&$info['water_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="water_no_work" value="no_working" <?php echo (isset($info['water_no_work'])&&$info['water_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess6" value="<?php echo isset($info['assess6'])?$info['assess6']:'$325.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>H/W HEATER</td>
				<td style="text-align: center;"><input type="checkbox" name="heater_y" value="yes" <?php echo (isset($info['heater_y'])&&$info['heater_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="heater_n" value="no" <?php echo (isset($info['heater_n'])&&$info['heater_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="heater_work" value="working" <?php echo (isset($info['heater_work'])&&$info['heater_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="heater_no_work" value="no_working" <?php echo (isset($info['heater_no_work'])&&$info['heater_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess7" value="<?php echo isset($info['assess7'])?$info['assess7']:'$895.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>ENTRY STEP</td>
				<td style="text-align: center;"><input type="checkbox" name="entry_y" value="yes" <?php echo (isset($info['entry_y'])&&$info['entry_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="entry_n" value="no" <?php echo (isset($info['entry_n'])&&$info['entry_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="entry_work" value="working" <?php echo (isset($info['entry_work'])&&$info['entry_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="entry_no_work" value="no_working" <?php echo (isset($info['entry_no_work'])&&$info['entry_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess8" value="<?php echo isset($info['assess8'])?$info['assess8']:'$595.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>TONGUE JACK</td>
				<td style="text-align: center;"><input type="checkbox" name="tongue_y" value="yes" <?php echo (isset($info['tongue_y'])&&$info['tongue_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tongue_n" value="no" <?php echo (isset($info['tongue_n'])&&$info['tongue_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tongue_work" value="working" <?php echo (isset($info['tongue_work'])&&$info['tongue_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tongue_no_work" value="no_working" <?php echo (isset($info['tongue_no_work'])&&$info['tongue_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess9" value="<?php echo isset($info['assess9'])?$info['assess9']:'MANUAL-$250 ELECTRIC-$595'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>AWNING FABRIC</td>
				<td style="text-align: center;"><input type="checkbox" name="awning_y" value="yes" <?php echo (isset($info['awning_y'])&&$info['awning_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="awning_n" value="no" <?php echo (isset($info['awning_n'])&&$info['awning_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="awning_work" value="working" <?php echo (isset($info['awning_work'])&&$info['awning_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="awning_no_work" value="no_working" <?php echo (isset($info['awning_no_work'])&&$info['awning_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess10" value="<?php echo isset($info['assess10'])?$info['assess10']:'$45.00 PER FT.'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>AWNING HARDWARE</td>
				<td style="text-align: center;"><input type="checkbox" name="hardware_y" value="yes" <?php echo (isset($info['hardware_y'])&&$info['hardware_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hardware_n" value="no" <?php echo (isset($info['hardware_n'])&&$info['hardware_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hardware_work" value="working" <?php echo (isset($info['hardware_work'])&&$info['hardware_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hardware_no_work" value="no_working" <?php echo (isset($info['hardware_no_work'])&&$info['hardware_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess11" value="<?php echo isset($info['assess11'])?$info['assess11']:'MANUAL-$425 ELECTRIC-$795'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>SLIDE OPERATION</td>
				<td style="text-align: center;"><input type="checkbox" name="operation_y" value="yes" <?php echo (isset($info['operation_y'])&&$info['operation_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="operation_n" value="no" <?php echo (isset($info['operation_n'])&&$info['operation_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="operation_work" value="working" <?php echo (isset($info['operation_work'])&&$info['operation_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="operation_no_work" value="no_working" <?php echo (isset($info['operation_no_work'])&&$info['operation_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess12" value="<?php echo isset($info['assess12'])?$info['assess12']:'$1,500.00 PER SLIDE'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>COOK TOP/OVEN</td>
				<td style="text-align: center;"><input type="checkbox" name="cook_y" value="yes" <?php echo (isset($info['cook_y'])&&$info['cook_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cook_n" value="no" <?php echo (isset($info['cook_n'])&&$info['cook_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cook_work" value="working" <?php echo (isset($info['cook_work'])&&$info['cook_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cook_no_work" value="no_working" <?php echo (isset($info['cook_no_work'])&&$info['cook_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess13" value="<?php echo isset($info['assess13'])?$info['assess13']:'$895.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td><b>MOTORHOME EQUIPMENT</b></td>
				<td style="text-align: center;"><input type="checkbox" name="motor_y" value="yes" <?php echo (isset($info['motor_y'])&&$info['motor_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="motor_n" value="no" <?php echo (isset($info['motor_n'])&&$info['motor_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="motor_work" value="working" <?php echo (isset($info['motor_work'])&&$info['motor_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="motor_no_work" value="no_working" <?php echo (isset($info['motor_no_work'])&&$info['motor_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess14" value="<?php echo isset($info['assess14'])?$info['assess14']:''; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>GENERATOR</td>
				<td style="text-align: center;"><input type="checkbox" name="generator_y" value="yes" <?php echo (isset($info['generator_y'])&&$info['generator_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="generator_n" value="no" <?php echo (isset($info['generator_n'])&&$info['generator_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="generator_work" value="working" <?php echo (isset($info['generator_work'])&&$info['generator_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="generator_no_work" value="no_working" <?php echo (isset($info['generator_no_work'])&&$info['generator_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess15" value="<?php echo isset($info['assess15'])?$info['assess15']:'$3,000.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>DASH A/C</td>
				<td style="text-align: center;"><input type="checkbox" name="dash_y" value="yes" <?php echo (isset($info['dash_y'])&&$info['dash_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="dash_n" value="no" <?php echo (isset($info['dash_n'])&&$info['dash_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="dash_work" value="working" <?php echo (isset($info['dash_work'])&&$info['dash_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="dash_no_work" value="no_working" <?php echo (isset($info['dash_no_work'])&&$info['dash_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess16" value="<?php echo isset($info['assess16'])?$info['assess16']:'$3,000.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>CRUISE CONTROL</td>
				<td style="text-align: center;"><input type="checkbox" name="cruise_y" value="yes" <?php echo (isset($info['cruise_y'])&&$info['cruise_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cruise_n" value="no" <?php echo (isset($info['cruise_n'])&&$info['cruise_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cruise_work" value="working" <?php echo (isset($info['cruise_work'])&&$info['cruise_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="cruise_no_work" value="no_working" <?php echo (isset($info['cruise_no_work'])&&$info['cruise_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess17" value="<?php echo isset($info['assess17'])?$info['assess17']:'$500.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>HYDRAULIC JACKS</td>
				<td style="text-align: center;"><input type="checkbox" name="hydraulic_y" value="yes" <?php echo (isset($info['hydraulic_y'])&&$info['hydraulic_y']=='yes')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hydraulic_n" value="no" <?php echo (isset($info['hydraulic_n'])&&$info['hydraulic_n']=='no')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hydraulic_work" value="working" <?php echo (isset($info['hydraulic_work'])&&$info['hydraulic_work']=='working')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="hydraulic_no_work" value="no_working" <?php echo (isset($info['hydraulic_no_work'])&&$info['hydraulic_no_work']=='no_working')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess18" value="<?php echo isset($info['assess18'])?$info['assess18']:'$1500.00 PER JACK'; ?>" style="width: 80%;"></td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="width: 40%;"><b>EQUIPMENT CONDITIONS</b></td>
				<td style="width: 10%; text-align: center;"><b>GOOD</b></td>
				<td style="width: 18%; text-align: center;"><b>BAD</b></td>
				<td style="width: 40%;"><b>ASSENT VALUE</b></td>
			</tr>
			
			<tr>
				<td>TIRES (INCLUDING SPARE)</td>
				<td style="text-align: center;"><input type="checkbox" name="tires_good" value="good" <?php echo (isset($info['tires_good'])&&$info['tires_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="tires_bad" value="bad" <?php echo (isset($info['tires_bad'])&&$info['tires_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess19" value="<?php echo isset($info['assess19'])?$info['assess19']:'$300.00 EACH'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>WINDSHIELD</td>
				<td style="text-align: center;"><input type="checkbox" name="wind_good" value="good" <?php echo (isset($info['wind_good'])&&$info['wind_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="wind_bad" value="bad" <?php echo (isset($info['wind_bad'])&&$info['wind_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess20" value="<?php echo isset($info['assess20'])?$info['assess20']:'$2,500.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>ROOF INNER AND OUTER STRUCTURE</td>
				<td style="text-align: center;"><input type="checkbox" name="roof_good" value="good" <?php echo (isset($info['roof_good'])&&$info['roof_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="roof_bad" value="bad" <?php echo (isset($info['roof_bad'])&&$info['roof_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess21" value="<?php echo isset($info['assess21'])?$info['assess21']:'$2,500.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>INTERNAL BODY WALLS</td>
				<td style="text-align: center;"><input type="checkbox" name="walls_good" value="good" <?php echo (isset($info['walls_good'])&&$info['walls_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="walls_bad" value="bad" <?php echo (isset($info['walls_bad'])&&$info['walls_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess22" value="<?php echo isset($info['assess22'])?$info['assess22']:'$1,000.00 PER DAMAGED WALL'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>FLOOR/SOFT SPOTS</td>
				<td style="text-align: center;"><input type="checkbox" name="spots_good" value="good" <?php echo (isset($info['spots_good'])&&$info['spots_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="spots_bad" value="bad" <?php echo (isset($info['spots_bad'])&&$info['spots_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess23" value="<?php echo isset($info['assess23'])?$info['assess23']:'$5,000.00'; ?>" style="width: 80%;"></td>
			</tr>
			
			<tr>
				<td>OUTER CONSTRUCTION/BODY DAMAGE</td>
				<td style="text-align: center;"><input type="checkbox" name="outer_good" value="good" <?php echo (isset($info['outer_good'])&&$info['outer_good']=='good')?'checked="checked"':''; ?> /></td>
				<td style="text-align: center;"><input type="checkbox" name="outer_bad" value="bad" <?php echo (isset($info['outer_bad'])&&$info['outer_bad']=='bad')?'checked="checked"':''; ?> /></td>
				<td><input type="text" name="assess24" value="<?php echo isset($info['assess24'])?$info['assess24']:'ON SITE APPRASIAL'; ?>" style="width: 80%;"></td>
			</tr>
		</table>
		<p style="float: left; width: 100%; font-size: 15px; margin: 0;"><sup>*</sup>ALL TANKS MUST BE CLEAN AND DUMPED AT TRADE DELIVERY <b><i>$125.00 IF NOT</i><sup>**</sup></b> ALL REFRIGERATORS ARE TO BE ON AND COLD USING LP SYSTEM OR CHARGED WITH 12V BATTERY OR WILL BE ASSESSED VALUE OF INOPERABLE CHARGE.</p>
		<p style="font-size: 15px;">I <input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 20%;"> AGREE TO THE CONDITIONS OF THIS TRADE APPRASIAL AND THE INFORMATION TO BE CORRECT OR ACCEPT THE GIVEN ASSESSED VALUE AT DELIVERY.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer Signature</label>
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 40%;">
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
