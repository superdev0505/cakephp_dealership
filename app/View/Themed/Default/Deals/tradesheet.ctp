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
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000;}
	th{text-align: center;}
    table input[type="text"]{border-bottom: 0px;}
    
    td input[type="text"]{text-align: center;}
    table{border-top: 1px solid #000; border-left: 1px solid #000;}
	label{font-size: 15px; font-weight: normal;}
	li{margin-bottom: 7px; font-size: 15px;}
@media print {
	h2{background-color: #ccc;}	

.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h2 style="float: left; width: 100%; text-align: center;"><b><i>AMERICAN MARINE TRADE APPRAISAL</i></b></h2>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : date("m/d/Y"); ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 10%;">
				<label>MANAGER</label>
				<input type="text" name="manager" value="<?php echo isset($info['manager'])?$info['manager']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>SALESPERSON</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 59%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label>CUSTOMER</label>
				<input type="text" name="customer" value="<?php echo isset($info["customer"]) ? $info['customer'] : $info['first_name'].' '.$info['last_name'];?>" style="width: 71%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>DEAL#</label>
				<input type="text" name="deal_number" value="<?php echo isset($info['deal_number'])?$info['deal_number']:''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 22%;">
				<label>STOCK#</label>
				<input type="text" name="stock_num" value="<?php echo isset($info["stock_num"]) ? $info['stock_num'] : ''?>" style="width: 66%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label>ACV</label>
				<input type="text" name="acv" value="<?php echo isset($info['acv']) ? $info['acv'] : "" ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; border-sizing: border-box; padding: 10px; border: 1px solid #000;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>UNIT YEAR</label>
					<input type="text" name="unit_year" value="<?php echo isset($info['unit_year']) ? $info['unit_year'] :""; ?>" style="width: 50%">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MAKE</label>
					<input type="text" name="unit_make" value="<?php echo isset($info['unit_make']) ? $info['unit_make'] :""; ?>" style="width: 80%">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MODEL</label>
					<input type="text" name="unit_model" value="<?php echo isset($info['unit_model']) ? $info['unit_model'] :""; ?>" style="width: 76%	;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>COLOR</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] :""; ?>" style="width: 67%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>SERIAL#</label>
					<input type="text" name="unit_serial" value="<?php echo isset($info['unit_serial']) ? $info['unit_serial'] :""; ?>" style="width: 83%">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>LENGTH</label>
					<input type="text" name="unit_length" value="<?php echo isset($info['unit_length']) ? $info['unit_length'] :""; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>WS</label>
					<input type="text" name="unit_ws" value="<?php echo isset($info['unit_ws']) ? $info['unit_ws'] :""; ?>" style="width: 87%;">
				</div>
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-sizing: border-box; padding: 10px; border: 1px solid #000; border-top: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>MOTOR YEAR</label>
					<input type="text" name="motor1_year" value="<?php echo isset($info['motor1_year']) ? $info['motor1_year'] :""; ?>" style="width: 40%">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MAKE</label>
					<input type="text" name="motor1_make" value="<?php echo isset($info['motor1_make']) ? $info['motor1_make'] :""; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MODEL</label>
					<input type="text" name="motor1_model" value="<?php echo isset($info['motor1_model']) ? $info['motor1_model'] :""; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>I/O-OB H.P.</label>
					<input type="text" name="motor1_hp" value="<?php echo isset($info['motor1_hp']) ? $info['motor1_hp'] :""; ?>" style="width: 56%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>SERIAL#</label>
					<input type="text" name="motor1_serial" value="<?php echo isset($info['motor1_serial']) ? $info['motor1_serial'] :""; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>HOURS</label>
					<input type="text" name="motor1_hours" value="<?php echo isset($info['motor1_hours']) ? $info['motor1_hours'] :""; ?>" style="width: 68%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>WAS MOTOR RUN?</label>
					<span><input type="radio" name="motor1_run" value="Y" <?php echo (isset($info['motor1_run']) && $info['motor1_run']=='Y')?'checked="checked"':''; ?> /> Y</span>/
					<span><input type="radio" name="motor1_run" value="N" <?php echo (isset($info['motor1_run']) && $info['motor1_run']=='N')?'checked="checked"':''; ?> /> N</span>
				</div>
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-sizing: border-box; padding: 10px; border: 1px solid #000; border-top: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>MOTOR YEAR</label>
					<input type="text" name="motor2_year" value="<?php echo isset($info['motor2_year']) ? $info['motor2_year'] :""; ?>" style="width: 40%">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MAKE</label>
					<input type="text" name="motor2_make" value="<?php echo isset($info['motor2_make']) ? $info['motor2_make'] :""; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MODEL</label>
					<input type="text" name="motor2_model" value="<?php echo isset($info['motor2_model']) ? $info['motor2_model'] :""; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>I/O-OB H.P.</label>
					<input type="text" name="motor2_hp" value="<?php echo isset($info['motor2_hp']) ? $info['motor2_hp'] :""; ?>" style="width: 56%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 55%;">
					<label>SERIAL #</label>
					<input type="text" name="motor2_serial" value="<?php echo isset($info['motor2_serial']) ? $info['motor2_serial'] :""; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>HOURS</label>
					<input type="text" name="motor2_hours" value="<?php echo isset($info['motor2_hours']) ? $info['motor2_hours'] :""; ?>" style="width: 68%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>WAS MOTOR RUN?</label>
					<span><input type="radio" name="motor2_run" value="Y" <?php echo (isset($info['motor2_run']) && $info['motor2_run']=='Y')?'checked="checked"':''; ?> /> Y</span>/
					<span><input type="radio" name="motor2_run" value="N" <?php echo (isset($info['motor2_run']) && $info['motor2_run']=='N')?'checked="checked"':''; ?>> N</span>
				</div>
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-sizing: border-box; padding: 10px; border: 1px solid #000; border-top: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>TRAILER YEAR</label>
					<input type="text" name="trailer_year" value="<?php echo isset($info['trailer_year']) ? $info['trailer_year'] :""; ?>" style="width: 40%">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>MAKE</label>
					<input type="text" name="trailer_make" value="<?php echo isset($info['trailer_make']) ? $info['trailer_make'] :""; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 49%;">
					<label>ROLLER/ BUNK/ UTILITY/ FLAT # OF AXLES</label>
					<input type="text" name="trailer_roller" value="<?php echo isset($info['trailer_roller']) ? $info['trailer_roller'] :""; ?>" style="width: 32%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 60%;">
					<label>SERIAL #</label>
					<input type="text" name="trailer_serial" value="<?php echo isset($info['trailer_serial']) ? $info['trailer_serial'] :""; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 15%;">
					<label>SIZE</label>
					<input type="text" name="trailer_size" value="<?php echo isset($info['trailer_size']) ? $info['trailer_size'] :""; ?>" style="width: 68%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>FT BRAKES</label>
					<span><input type="radio" name="ft" value="Yes" <?php echo (isset($info['ft']) && $info['ft']=='Yes')?'checked="checked"':''; ?> /> YES </span>/
					<span><input type="radio" name="ft" value="No" <?php echo (isset($info['ft']) && $info['ft']=='No')?'checked="checked"':''; ?>> NO</span>
				</div>
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-sizing: border-box; padding: 10px; border: 1px solid #000; border-top: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="width: 40%; float: left;">
					<label>CONDITION OF YOYR MOTOR :</label>
					<input type="text" name="motor_condi" value="<?php echo isset($info['motor_condi']) ? $info['motor_condi'] :""; ?>"  style=" width: 32%">
				</div>
				
				<div class="form-field" style="float: left; width: 22%;">
					<label>RUNNING :</label>
					<span><input type="radio" name="running" value="Y" <?php echo (isset($info['running']) && $info['running']=='Y')?'checked="checked"':''; ?> /> Y</span>/
					<span><input type="radio" name="running" value="N" <?php echo (isset($info['running']) && $info['running']=='N')?'checked="checked"':''; ?>> N</span>
				</div>
				
				<div class="form-field" style="float: right; width: 38%;">
					<label>CONDITION SCALE ( 1 2 3 4 5 6 7 8 9 10 )</label>
					<input type="text" name="motor_scale" value="<?php echo isset($info['motor_scale']) ? $info['motor_scale'] :""; ?>"  style="width: 17%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="width: 40%; float: left;">
					<label>CONDITION OF THE BODY :</label>
					<input type="text" name="body_condi" value="<?php echo isset($info['body_condi']) ? $info['body_condi'] :""; ?>" style=" width: 39%">
				</div>
				
				<div class="form-field" style="float: left; width: 22%;">
					<label>SCRATCHED :</label>
					<span><input type="radio" name="scratch" value="Y" <?php echo (isset($info['scratch']) && $info['scratch']=='Y')?'checked="checked"':''; ?> /> Y</span>/
					<span><input type="radio" name="scratch" value="N" <?php echo (isset($info['scratch']) && $info['scratch']=='N')?'checked="checked"':''; ?> /> N</span>
				</div>
				
				<div class="form-field" style="float: right; width: 38%;">
					<label>CONDITION SCALE ( 1 2 3 4 5 6 7 8 9 10 )</label>
					<input type="text" name="body_scale" value="<?php echo isset($info['body_scale']) ? $info['body_scale'] :""; ?>" style="width: 17%">
				</div>
			</div>
		</div>
		

		<div class="box" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; border-sizing: border-box; padding: 2px 10px; border: 1px solid #000; border-top: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0; font-size: 16px; font-weight: bold;">
				<div class="form-field" style="width: 80%; float: left;">
					<label>IS EVERYTHING ON YOUR TRADE IN WORKING CONDITION?</label>
				</div>
				<div class="form-field" style="width: 20%; float: right;">
					<label>YES</label>
					<input type="text" name="trade_check" value="<?php echo (isset($info['trade_check']) && $info['trade_check']=='Yes')? $info['trade_check'] :""; ?>"  style="width: 32%;">
					<label>NO</label>
					<input type="text" name="trade_check" value="<?php echo (isset($info['trade_check']) && $info['trade_check']=='No')? $info['trade_check'] :""; ?>" style="width: 32%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0; font-size: 16px; font-weight: bold;">
				<div class="form-field" style="width: 80%; float: left;">
					<label>IS YOUR NAME THE ONLY NAME THE TITLE?</label>
				</div>
				<div class="form-field" style="width: 20%; float: right;">
					<label>YES</label>
					<input type="text" name="name_check" value="<?php echo (isset($info['name_check']) && $info['name_check']=='Yes')? $info['name_check'] :""; ?>" style="width: 32%;">
					<label>NO</label>
					<input type="text" name="name_check" value="<?php echo (isset($info['name_check']) && $info['name_check']=='No')? $info['name_check'] :""; ?>" style="width: 32%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0; font-size: 16px; font-weight: bold;">
				<div class="form-field" style="width: 80%; float: left;">
					<label>IS THEIR A LIEN ON YOUR TITLE OR ANY MONEY OWED ?</label>
				</div>
				<div class="form-field" style="width: 20%; float: right;">
					<label>YES</label>
					<input type="text" name="money_check" value="<?php echo (isset($info['money_check']) && $info['money_check']=='Yes')? $info['money_check'] :""; ?>" style="width: 32%;">
					<label>NO</label>
					<input type="text" name="money_check" value="<?php echo (isset($info['money_check']) && $info['money_check']=='No')? $info['money_check'] :""; ?>" style="width: 32%;">
				</div>
			</div>
			
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="width: 40%; float: left;">
				<label>TROLLING	MOTOR MAKE</label>
				<input type="text" name="moter_make" value="<?php echo isset($info['moter_make']) ? $info['moter_make'] :""; ?>" style="width: 48%;">
			</div>
			<div class="form-field" style="width: 20%; float: left;">
				<label>THRUST</label>
				<input type="text" name="thrust" value="<?php echo isset($info['thrust']) ? $info['thrust'] :""; ?>" style="width: 46%;">LBS. 
			</div>
			<div class="form-field" style="width: 40%; float: left;">
				<label>LOCATOR MAKE</label>
				<input type="text" name="locator_make" value="<?php echo isset($info['locator_make']) ? $info['locator_make'] :""; ?>" style="width: 68%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 40%;">
				<table width="100%;" cellpadding="0" cellspacing="0">
					<tr>
						<td style="width: 45%; border-top: 0px; border-left: 0px; visibility: hidden;">&nbsp;</td>
						<td>ON UNIT</td>
						<td>WORK Y/N</td>
					</tr>
					<tr>
						<td>FUEL GUAGE</td>
						<td><input type="text" name="unit_fuel" value="<?php echo isset($info['unit_fuel']) ? $info['unit_fuel'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_fule" value="<?php echo isset($info['work_fule']) ? $info['work_fule'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SPEEDOMETER</td>
						<td><input type="text" name="unit_speedo" value="<?php echo isset($info['unit_speedo']) ? $info['unit_speedo'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_speedo" value="<?php echo isset($info['work_speedo']) ? $info['work_speedo'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TACHOMETER</td>
						<td><input type="text" name="unit_tacho" value="<?php echo isset($info['unit_tacho']) ? $info['unit_tacho'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_tacho" value="<?php echo isset($info['work_tacho']) ? $info['work_tacho'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TRIM GUAGE</td>
						<td><input type="text" name="unit_trim" value="<?php echo isset($info['unit_trim']) ? $info['unit_trim'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_trim" value="<?php echo isset($info['work_trim']) ? $info['work_trim'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>VOLT METER</td>
						<td><input type="text" name="unit_volt" value="<?php echo isset($info['unit_volt']) ? $info['unit_volt'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_volt" value="<?php echo isset($info['work_volt']) ? $info['work_volt'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>DEPTH SOUNDER</td>
						<td><input type="text" name="unit_depth" value="<?php echo isset($info['unit_depth']) ? $info['unit_depth'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_depth" value="<?php echo isset($info['work_depth']) ? $info['work_depth'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TILT WHEEL</td>
						<td><input type="text" name="unit_tilt" value="<?php echo isset($info['unit_tilt']) ? $info['unit_tilt'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_tilt" value="<?php echo isset($info['work_tilt']) ? $info['work_tilt'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SEAT SLIDER</td>
						<td><input type="text" name="unit_seat" value="<?php echo isset($info['unit_seat']) ? $info['unit_seat'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_seat" value="<?php echo isset($info['work_seat']) ? $info['work_seat'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>BILGE PUMP</td>
						<td><input type="text" name="unit_bilge" value="<?php echo isset($info['unit_bilge']) ? $info['unit_bilge'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_bilge" value="<?php echo isset($info['work_bilge']) ? $info['work_bilge'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>NAV LIGHTS</td>
						<td><input type="text" name="unit_nav" value="<?php echo isset($info['unit_nav']) ? $info['unit_nav'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_nav" value="<?php echo isset($info['work_nav']) ? $info['work_nav'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>TRAILER LIGHTS</td>
						<td><input type="text" name="unit_trailer" value="<?php echo isset($info['unit_trailer']) ? $info['unit_trailer'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_trailer" value="<?php echo isset($info['work_trailer']) ? $info['work_trailer'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>LIVE WELL</td>
						<td><input type="text" name="unit_live" value="<?php echo isset($info['unit_live']) ? $info['unit_live'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_live" value="<?php echo isset($info['work_live']) ? $info['work_live'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>ANCHOR MATE</td>
						<td><input type="text" name="unit_anchor" value="<?php echo isset($info['unit_anchor']) ? $info['unit_anchor'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_anchor" value="<?php echo isset($info['work_anchor']) ? $info['work_anchor'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>BUNK GUIDES</td>
						<td><input type="text" name="unit_bunk" value="<?php echo isset($info['unit_bunk']) ? $info['unit_bunk'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_bunk" value="<?php echo isset($info['work_bunk']) ? $info['work_bunk'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
				</table>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<table width="100%;" cellpadding="0" cellspacing="0">
					<tr>
						<td style="border-left: 0px; border-top: 0px; visibility: hidden;">&nbsp;</td>
						<td>ON UNIT</td>
						<td>WORK Y/N</td>
					</tr>
					<tr>
						<td><input type="text" name="gal" value="<?php echo isset($info['gal']) ? $info['gal'] :""; ?>" style="width: 20%; border-bottom: 1px solid #000;">GAL FUEL GUAGE</td>
						<td><input type="text" name="unit_gal" value="<?php echo isset($info['unit_gal']) ? $info['unit_gal'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_gal" value="<?php echo isset($info['work_gal']) ? $info['work_gal'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SPARE TIME</td>
						<td><input type="text" name="unit_spare" value="<?php echo isset($info['unit_spare']) ? $info['unit_spare'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_spare" value="<?php echo isset($info['work_spare']) ? $info['work_spare'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>BIMINI</td>
						<td><input type="text" name="unit_bimini" value="<?php echo isset($info['unit_bimini']) ? $info['unit_bimini'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_bimini" value="<?php echo isset($info['work_bimini']) ? $info['work_bimini'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>JACKSTAND</td>
						<td><input type="text" name="unit_jack" value="<?php echo isset($info['unit_jack']) ? $info['unit_jack'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_jack" value="<?php echo isset($info['work_jack']) ? $info['work_jack'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SKI TOW BAR</td>
						<td><input type="text" name="unit_ski" value="<?php echo isset($info['unit_ski']) ? $info['unit_ski'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_ski" value="<?php echo isset($info['work_ski']) ? $info['work_ski'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>ROD HOLDERS</td>
						<td><input type="text" name="unit_rod" value="<?php echo isset($info['unit_rod']) ? $info['unit_rod'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_rod" value="<?php echo isset($info['work_rod']) ? $info['work_rod'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>STEREO</td>
						<td><input type="text" name="unit_stereo" value="<?php echo isset($info['unit_stereo']) ? $info['unit_stereo'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_stereo" value="<?php echo isset($info['work_stereo']) ? $info['work_stereo'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td># OF SEATS<input type="text" name="seats" value="<?php echo isset($info['seats']) ? $info['seats'] :""; ?>" style="width: 40%; border-bottom: 1px solid #000;"></td>
						<td><input type="text" name="unit_seats" value="<?php echo isset($info['unit_seats']) ? $info['unit_seats'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_seats" value="<?php echo isset($info['work_seats']) ? $info['work_seats'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>COVER</td>
						<td><input type="text" name="unit_cover" value="<?php echo isset($info['unit_cover']) ? $info['unit_cover'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_cover" value="<?php echo isset($info['work_cover']) ? $info['work_cover'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>CARPETING</td>
						<td><input type="text" name="unit_carpeting" value="<?php echo isset($info['unit_carpeting']) ? $info['unit_carpeting'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_carpeting" value="<?php echo isset($info['work_carpeting']) ? $info['work_carpeting'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SCRATCHES ON UNIT</td>
						<td><input type="text" name="unit_scratches" value="<?php echo isset($info['unit_scratches']) ? $info['unit_scratches'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_scratches" value="<?php echo isset($info['work_scratches']) ? $info['work_scratches'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>CRACKS ON BOTTOM</td>
						<td><input type="text" name="unit_crack" value="<?php echo isset($info['unit_crack']) ? $info['unit_crack'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_crack" value="<?php echo isset($info['work_crack']) ? $info['work_crack'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>FLOOR SOFT?</td>
						<td><input type="text" name="unit_floor" value="<?php echo isset($info['unit_floor']) ? $info['unit_floor'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_floor" value="<?php echo isset($info['work_floor']) ? $info['work_floor'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>CONDITION OF SEATS</td>
						<td><input type="text" name="unit_condition" value="<?php echo isset($info['unit_condition']) ? $info['unit_condition'] :""; ?>" style="width: 100%;"></td>
						<td><input type="text" name="work_condition" value="<?php echo isset($info['work_condition']) ? $info['work_condition'] :""; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
				</table>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<strong>MY BOAT WAS RUN 7 DAYS BEFORE EVALUATION ? YES</strong> <input type="text" name="boat_check" value="<?php echo (isset($info['boat_check']) && $info['boat_check']=='Yes')? $info['boat_check'] :""; ?>" style="width: 10%;"> <strong>NO</strong> <input type="text" name="boat_check" value="<?php echo (isset($info['boat_check']) && $info['boat_check']=='No')? $info['boat_check'] :""; ?>" style="width: 10%;"> <strong>X</strong> <input type="text" name="boat_check" value="<?php echo (isset($info['boat_check']) && $info['boat_check']=='X')? $info['boat_check'] :""; ?>" style="width: 28%;"> <strong>I REPRESENT ALL THE ABOVE TO BE TRUE TO THE BEST OF MY KNOWLEDGE. IF THERE IS ANY DISCREPENCY IN <br> HOW MY TRADE WAS REPRESENTED IS DIRECTLY RELATED TO THE AMOUNT GIVEN FOR YOUR TRADE IN</strong>
		</div>
		
		<div class="row" style="float: left; width: 100%;">
			<label style="float: left; width: 20%; text-align: center;">13-Apr</label>
			<div class="form-field" style="float: left; width: 40%">
				<label>X</label>
				<input type="text" name="x" value="<?php echo isset($info['x']) ? $info['x'] : ''; ?>" style="width: 94%;">
			</div>
			<div class="form-field" style="float: left; width: 25%">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="width: 75%;">
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
