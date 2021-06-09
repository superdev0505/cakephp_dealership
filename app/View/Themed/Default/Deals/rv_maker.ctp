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
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	
@media print {
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>GUIDE</label>
				<input type="text" name="guide" value="<?php echo isset($info['guide']) ? $info['guide'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<h3 style="float: left; text-align: center; width: 100%; margin: 0;"><b>RV MATCHMAKER</b></h3>
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 82.4%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>First Name:</label>
				<input type="text" name="fname" value="<?php echo isset($info['fname']) ? $info['fname'] : $info['first_name']; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Last Name:</label>
				<input type="text" name="lname" value="<?php echo isset($info['lname']) ? $info['lname'] : $info['last_name']; ?>" style="width: 84.2%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; text-align: center;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><input type="radio" name="class_status" value="class_c" <?php echo (isset($info['class_status']) && $info['class_status']=='class_c')?'checked="checked"':''; ?> /> Class C</label>
				<label><input type="radio" name="class_status" value="class_b" <?php echo (isset($info['class_status']) && $info['class_status']=='class_b')?'checked="checked"':''; ?> /> Class B</label>
				<label><input type="radio" name="class_status" value="class_a" <?php echo (isset($info['class_status']) && $info['class_status']=='class_a')?'checked="checked"':''; ?> /> Class A</label>
				<label><input type="radio" name="class_status" value="class_ad" <?php echo (isset($info['class_status']) && $info['class_status']=='class_ad')?'checked="checked"':''; ?> /> Class AD</label>
				<label><input type="radio" name="class_status" value="tt" <?php echo (isset($info['class_status']) && $info['class_status']=='tt')?'checked="checked"':''; ?> /> TT</label>
				<label><input type="radio" name="class_status" value="5w" <?php echo (isset($info['class_status']) && $info['class_status']=='5w')?'checked="checked"':''; ?> /> 5W</label>
				<label><input type="radio" value="toy" <?php echo (isset($info['class_status']) && $info['class_status']=='toy')?'checked="checked"':''; ?> /> Toy</label>
				<label><input type="radio" value="new" <?php echo (isset($info['class_status']) && $info['class_status']=='new')?'checked="checked"':''; ?> /> New</label>
				<label><input type="radio" value="used" <?php echo (isset($info['class_status']) && $info['class_status']=='used')?'checked="checked"':''; ?> /> Used</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 27%;">
				<label>Do you currently have an RV?:</label>
				<label><input type="radio" name="rv_status" value="yes" <?php echo (isset($info['rv_status']) && $info['rv_status']=='yes')?'checked="checked"':''; ?> /> Yes</label>
				<label><input type="radio" name="rv_status" value="no" <?php echo (isset($info['rv_status']) && $info['rv_status']=='no')?'checked="checked"':''; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>How many do you need to sleep?</label>
				<input type="text" name="sleep" value="<?php echo isset($info['sleep']) ? $info['sleep'] :  ''; ?>" style="width: 61.3%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 6%; margin-left: 12%;">
				<label style="font-size: 15px;"><input type="checkbox" name="c_status" value="c" <?php echo (isset($info['c_status']) && $info['c_status']=='c')?'checked="checked"':''; ?> /><b> C</b></label>
				<label style="font-size: 15px;"><input type="checkbox" name="f_status" value="f" <?php echo (isset($info['f_status']) && $info['f_status']=='f')?'checked="checked"':''; ?> /> <b>F</b></label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin-left: 2%;">
				<label>Budget:</label>
				<input type="text" name="budget" value="<?php echo isset($info['budget']) ? $info['budget'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Paymment:</label>
				<input type="text" name="payment" value="<?php echo isset($info['payment']) ? $info['payment'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Down:</label>
				<input type="text" name="down" value="<?php echo isset($info['down']) ? $info['down'] :  ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<span style="float: left;"><b>TOWING VEHICLE:</b></span>
			<div class="form-field" style="float: left; width: 20%; margin-left: 2%;">
				<label>Year:</label>
				<input type="text" name="towing_year" value="<?php echo isset($info['towing_year']) ? $info['towing_year'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Make:</label>
				<input type="text" name="towing_make" value="<?php echo isset($info['towing_make']) ? $info['towing_make'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Model:</label>
				<input type="text" name="towing_model" value="<?php echo isset($info['towing_model']) ? $info['towing_model'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 24%;">
				<label>Towing cap:</label>
				<input type="text" name="towing_cap" value="<?php echo isset($info['towing_cap']) ? $info['towing_cap'] :  ''; ?>" style="width: 68.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Engine Size</label>
				<input type="text" name="engine_size" value="<?php echo isset($info['engine_size']) ? $info['engine_size'] :  ''; ?>" style="width: 20%; margin-right: 15px;">
				<label><input type="radio" name="engine_status" value="2x2" <?php echo (isset($info['engine_status']) && $info['engine_status']=='2x2')?'checked="checked"':''; ?> /> 2X2</label>
				<label><input type="radio" name="engine_status" value="4x4" <?php echo (isset($info['engine_status']) && $info['engine_status']=='4x4')?'checked="checked"':''; ?> /> 4X4</label>
				<label><input type="radio" name="engine_status" value="long" <?php echo (isset($info['engine_status']) && $info['engine_status']=='long')?'checked="checked"':''; ?> /> LONG</label>
				<label><input type="radio" name="engine_status" value="short" <?php echo (isset($info['engine_status']) && $info['engine_status']=='short')?'checked="checked"':''; ?> /> SHORT</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<span style="float: left;"><b>TRADE:</b></span>
			<div class="form-field" style="float: left; width: 15%; margin-left: 2%;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Miles:</label>
				<input type="text" name="miles_trade" value="<?php echo isset($info['miles_trade']) ? $info['miles_trade'] :  ''; ?>" style="width: 71%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Balance Owned:</label>
				<input type="text" name="balance_owned" value="<?php echo isset($info['balance_owned']) ? $info['balance_owned'] :  ''; ?>" style="width: 54%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h3 style="float: left; width: 100%; font-size: 15px"><b>SHOW:</b></h3>
			<div class="form-field" style="float: left; width: 11%;">
				<label>YR:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>MFG:</label>
				<input type="text" name="mfg" value="<?php echo isset($info['mfg']) ? $info['mfg'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>MAKE:</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] :  ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MOD:</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] :  ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>FAV:</label>
				<input type="text" name="fav" value="<?php echo isset($info['fav']) ? $info['fav'] :  ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NOTE:</label>
				<input type="text" name="note1" value="<?php echo isset($info['note1']) ? $info['note1'] :  ''; ?>" style="width: 94.4%; margin-bottom: 10px;">
				<input type="text" name="note2" value="<?php echo isset($info['note2']) ? $info['note2'] :  ''; ?>" style="width: 98.4%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 11%;">
				<label>YR:</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1']) ? $info['year1'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>MFG:</label>
				<input type="text" name="mfg1" value="<?php echo isset($info['mfg1']) ? $info['mfg1'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>MAKE:</label>
				<input type="text" name="make1" value="<?php echo isset($info['make1']) ? $info['make1'] :  ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MOD:</label>
				<input type="text" name="model1" value="<?php echo isset($info['model1']) ? $info['model1'] :  ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>FAV:</label>
				<input type="text" name="fav1" value="<?php echo isset($info['fav1']) ? $info['fav1'] :  ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NOTE:</label>
				<input type="text" name="note3" value="<?php echo isset($info['note3']) ? $info['note3'] :  ''; ?>" style="width: 94.4%; margin-bottom: 10px;">
				<input type="text" name="note4" value="<?php echo isset($info['note4']) ? $info['note4'] :  ''; ?>" style="width: 98.4%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 11%;">
				<label>YR:</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2']) ? $info['year2'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>MFG:</label>
				<input type="text" name="mfg2" value="<?php echo isset($info['mfg2']) ? $info['mfg2'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>MAKE:</label>
				<input type="text" name="make2" value="<?php echo isset($info['make2']) ? $info['make2'] :  ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MOD:</label>
				<input type="text" name="model2" value="<?php echo isset($info['model2']) ? $info['model2'] :  ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>FAV:</label>
				<input type="text" name="fav2" value="<?php echo isset($info['fav2']) ? $info['fav2'] :  ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NOTE:</label>
				<input type="text" name="note5" value="<?php echo isset($info['note5']) ? $info['note5'] :  ''; ?>" style="width: 94.4%; margin-bottom: 10px;">
				<input type="text" name="note6" value="<?php echo isset($info['note6']) ? $info['note6'] :  ''; ?>" style="width: 98.4%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 11%;">
				<label>YR:</label>
				<input type="text" name="year3" value="<?php echo isset($info['year3']) ? $info['year3'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>MFG:</label>
				<input type="text" name="mfg3" value="<?php echo isset($info['mfg3']) ? $info['mfg3'] :  ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 27%;">
				<label>MAKE:</label>
				<input type="text" name="make3" value="<?php echo isset($info['make3']) ? $info['make3'] :  ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MOD:</label>
				<input type="text" name="model3" value="<?php echo isset($info['model3']) ? $info['model3'] :  ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>FAV:</label>
				<input type="text" name="fav3" value="<?php echo isset($info['fav3']) ? $info['fav3'] :  ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NOTE:</label>
				<input type="text" name="note7" value="<?php echo isset($info['note7']) ? $info['note7'] :  ''; ?>" style="width: 94.4%; margin-bottom: 10px;">
				<input type="text" name="note8" value="<?php echo isset($info['note8']) ? $info['note8'] :  ''; ?>" style="width: 98.4%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NOTE:</label>
				<input type="text" name="note9" value="<?php echo isset($info['note9']) ? $info['note9'] :  ''; ?>" style="width: 94.4%; margin-bottom: 7px;">
				<input type="text" name="note10" value="<?php echo isset($info['note10']) ? $info['note10'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note11" value="<?php echo isset($info['note11']) ? $info['note11'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note12" value="<?php echo isset($info['note12']) ? $info['note12'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note13" value="<?php echo isset($info['note13']) ? $info['note13'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note14" value="<?php echo isset($info['note14']) ? $info['note14'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note15" value="<?php echo isset($info['note15']) ? $info['note15'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
				<input type="text" name="note16" value="<?php echo isset($info['note16']) ? $info['note16'] :  ''; ?>" style="width: 98.4%; margin-bottom: 7px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>ADDRESS:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] :  ''; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>City,State and Zip:</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 88.4%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Best Phone:</label>
				<input type="text" name="phone" value="<?php $phone = $info['phone']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $best = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $best;  ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Cell Phone:</label>
				<input type="text" name="mobile" value="<?php $phone = $info['mobile']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $cell = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $cell;  ?>" style="width: 84%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] :  ''; ?>" style="width: 94.8%;">
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

	$(document).find("input:checked[type='radio']").addClass('bounce');   
    $("input[type='radio']").click(function() {
        $(this).prop('checked', false);
        $(this).toggleClass('bounce');

        if( $(this).hasClass('bounce') ) {
            $(this).prop('checked', true);
            $(document).find("input:not(:checked)[type='radio']").removeClass('bounce');
        }
    });

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
