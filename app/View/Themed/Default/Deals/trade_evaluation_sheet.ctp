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
    <input type="hidden" id="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" name="vin_trade">
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.row-table input[type="text"]{border-bottom: 0px; margin: 2px 0;}
	.second-text input[type="text"]{text-align: center; height: 40px;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;}
	th{background-color: #ccc; text-align: left;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
.mr-section .form-field{padding-top: 8px !important;}
.margin-textarea{height: 170px !important;}
.sm-margin{height: 198px !important;}
.table-section{margin-top: 22% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="wrap" style="border: 1px solid #000; float: left; width: 100%;">
			<div class="row" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 16px 0; margin: 0;">
				<div class="logo" style="float: left; width: 25%; padding-left: 2%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/freedom.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<h2 style="border: 1px solid #000; float: right; font-size: 20px; line-height: 40px; margin: 27px 12px 0 0; text-align: center; width: 65%;"><b>Pre-Owned Buy Bid / Trade Evaluation</b></h2>
			</div>
			
			<h2 style="float: left; width: 100%; text-align: center; border-bottom: 1px solid #000; margin: 0; padding: 7px 0; font-size: 17px; line-height: 30px;">CUSTOMER INFORMATION</h2>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 25%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Name:</label>
					<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 70%;">
				</div>
				
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="width: 40%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">SS:(lien payoff only)</label>
					<input type="text" name="lien_payoff" value="<?php echo isset($info['lien_payoff']) ? $info['lien_payoff'] : ''; ?>" style="width: 50%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 33.3%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Address:</label>
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 64%;">
				</div>
				
				<div class="form-field" style="float: left; width: 55%; box-sizing: border-box;">
					<label style="width: 19%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;    text-align: right;">City:</label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 80%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 43%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Cell:</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 50%;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 25%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Home:</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 70%">
				</div>
				
				<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 33.3%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">State:</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 60%;">
				</div>
				
				<div class="form-field" style="float: left; width: 23%; box-sizing: border-box;">
					<label style="width: 28%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;text-align: right;">Zip:</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 70%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 25%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Email:</label>
					<input type="text" name="email" value="<?php echo $info['email']; ?>" style="width: 70%;">
				</div>
				
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="width: 40%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">Country:</label>
					<input type="text" name="country_data" value="<?php echo isset($info['country_data']) ? $info['country_data'] :  ''; ?>" style="width: 50%">
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; text-align: center; border-bottom: 1px solid #000; margin: 0; padding: 7px 0; font-size: 17px; line-height: 30px;">PRE-OWNED/TRADE INFORMATION</h2>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 75%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">VIN:</label>
					<input type="text" name="vin_trade0" id="vin_trade0" value="<?php echo isset($info['vin_trade0']) ? $info['vin_trade0'] :''; ?>" style="width: 20%;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade1" id="vin_trade1" value="<?php echo isset($info['vin_trade1']) ? $info['vin_trade1'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade2" id="vin_trade2" value="<?php echo isset($info['vin_trade2']) ? $info['vin_trade2'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade3" id="vin_trade3" value="<?php echo isset($info['vin_trade3']) ? $info['vin_trade3'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade4" id="vin_trade4" value="<?php echo isset($info['vin_trade4']) ? $info['vin_trade4'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade5" id="vin_trade5" value="<?php echo isset($info['vin_trade5']) ? $info['vin_trade5'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade6" id="vin_trade6" value="<?php echo isset($info['vin_trade6']) ? $info['vin_trade6'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade7" id="vin_trade7" value="<?php echo isset($info['vin_trade7']) ? $info['vin_trade7'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade8" id="vin_trade8" value="<?php echo isset($info['vin_trade8']) ? $info['vin_trade8'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade9" id="vin_trade9" value="<?php echo isset($info['vin_trade9']) ? $info['vin_trade9'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade10" id="vin_trade10" value="<?php echo isset($info['vin_trade10']) ? $info['vin_trade10'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade11" id="vin_trade11" value="<?php echo isset($info['vin_trade11']) ? $info['vin_trade11'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade12" id="vin_trade12" value="<?php echo isset($info['vin_trade12']) ? $info['vin_trade12'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade13" id="vin_trade13" value="<?php echo isset($info['vin_trade13']) ? $info['vin_trade13'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade14" id="vin_trade14" value="<?php echo isset($info['vin_trade14']) ? $info['vin_trade14'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade15" id="vin_trade15" value="<?php echo isset($info['vin_trade15']) ? $info['vin_trade15'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 5%; box-sizing: border-box; border-right: 1px solid #000;">
					<input type="text" name="vin_trade16" id="vin_trade16" value="<?php echo isset($info['vin_trade16']) ? $info['vin_trade16'] :''; ?>" style="width: 100%; margin: 9px 0 10px;text-align: center;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 22%; border-right: 1px solid #000;">
					<label style="width: 100%; display: inline-block; padding: 10px 2%; box-sizing: border-box; text-align: center;">YEAR</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] :''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 18%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box;">CLASS</label>
					<input type="text" name="class_trade" value="<?php echo isset($info['class_trade']) ? $info['class_trade'] :''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 23%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box;">MAKE</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] :''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box;">MODEL</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] :''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 16%;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box;">COLOR</label>
					<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] :''; ?>" style="width: 100%; text-align: center;">
				</div>
			</div>
			
			
			<div class="row second-text" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 22%; border-right: 1px solid #000;">
					<label style="width: 100%; display: inline-block; padding: 10px 2%; box-sizing: border-box; text-align: center; border-bottom: 1px solid #000;">MILEAGE</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 22%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box; border-bottom: 1px solid #000;">ACV</label>
					<input type="text" name="acv" value="<?php echo isset($info['acv']) ? $info['acv'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 19%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box; border-bottom: 1px solid #000;">DSRP</label>
					<input type="text" name="dsrp" value="<?php echo isset($info['dsrp']) ? $info['dsrp'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 20%; border-right: 1px solid #000;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box; border-bottom: 1px solid #000;">NADA CLEAN</label>
					<input type="text" name="nada_clean" value="<?php echo isset($info['nada_clean']) ? $info['nada_clean'] : ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 16.4%;">
					<label style="width: 100%; text-align: center; display: inline-block; padding: 10px 2%; box-sizing: border-box; border-bottom: 1px solid #000;">NADA ROUGH</label>
					<input type="text" name="nada_rough" value="<?php echo isset($info['nada_rough']) ? $info['nada_rough'] : ''; ?>" style="width: 100%;">
				</div>
			</div> 
			
			<h2 style="float: left; width: 100%; text-align: center; border-bottom: 1px solid #000; margin: 0; padding: 7px 0; font-size: 17px; line-height: 30px;">PAY OFF INFORMATION</h2>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 25%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">LIENHOLDER:</label>
					<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 70%;">
				</div>
				
				<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
					<label style="width: 40%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">PHONE:</label>
					<input type="text" name="pay_phone" value="<?php echo isset($info['pay_phone']) ? $info['pay_phone'] : ''; ?>" style="width: 50%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 43%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">PAYOFF ADDRESS:</label>
					<input type="text" name="pay_address" value="<?php echo isset($info['pay_address']) ? $info['pay_address'] : ''; ?>" style="width: 50%;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 25%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">CITY:</label>
					<input type="text" name="pay_city" value="<?php echo isset($info['pay_city']) ? $info['pay_city'] : ''; ?>" style="width: 70%">
				</div>
				
				<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 33.3%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">ST:</label>
					<input type="text" name="pay_st" value="<?php echo isset($info['pay_st']) ? $info['pay_st'] : ''; ?>" style="width: 60%;">
				</div>
				
				<div class="form-field" style="float: left; width: 23%; box-sizing: border-box;">
					<label style="width: 28%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">ZIP:</label>
					<input type="text" name="pay_zip" value="<?php echo isset($info['pay_zip']) ? $info['pay_zip'] : ''; ?>" style="width: 70%">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 43%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">PAYOFF AMOUNT:</label>
					<input type="text" name="pay_amount" value="<?php echo isset($info['pay_amount']) ? $info['pay_amount'] : ''; ?>" style="width: 50%;">
				</div>
				
				<div class="form-field" style="float: left; width: 30.3%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="width: 43%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">GOOD THRU:</label>
					<input type="text" name="good_thru" value="<?php echo isset($info['good_thru']) ? $info['good_thru'] : ''; ?>" style="width: 55%">
				</div>
				
				<div class="form-field" style="float: left; width: 32.1%; box-sizing: border-box;">
					<label style="width: 33.4%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">PER DIEM</label>
					<input type="text" name="per_diem" value="<?php echo isset($info['per_diem']) ? $info['per_diem'] : ''; ?>" style="width: 64%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; border-right: 1px solid #000;">
						<label style="width: 27%; border-right: 1px solid #000; display: inline-block; padding: 10px 2%; box-sizing: border-box;">CUSTOMER ACCT#</label>
						<input type="text" name="customer_acct1" value="<?php echo isset($info['customer_acct1']) ? $info['customer_acct1'] : ''; ?>" style="width: 70%;">
					</div>
					
					<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
						<input type="text" name="customer_acct2" value="<?php echo isset($info['customer_acct2']) ? $info['customer_acct2'] : ''; ?>" style="width: 50%">
					</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0; border-bottom: 1px solid #000; padding-bottom: 16px;">
			<p><input type="checkbox" name="title_status" value="title1" <?php echo ($info['title_status'] == "title1") ? "checked" : ""; ?> /> Two Forms of ID for each person listed on title <input type="checkbox" name="title_status" value="title2" <?php echo ($info['title_status'] == "title2") ? "checked" : ""; ?> />POA Attached/completed</p>
			<p><input type="checkbox" name="title_status" value="title3" <?php echo ($info['title_status'] == "title3") ? "checked" : ""; ?> /> Twix <input type="checkbox" name="title_status" value="title4" <?php echo ($info['title_status'] == "title4") ? "checked" : ""; ?> /> Odometer Statement <input type="checkbox" name="title_status" value="title5" <?php echo ($info['title_status'] == "title5") ? "checked" : ""; ?> /> Title or Lost Title App</p>
		</div>
		
		<p style="float: left; width: 100%; margin: 20px 0;"><strong>Odometer Statement</strong>
I understand that I am entering into an agreement with Freedom Powersports for the payoff of the vehicle to the lienholder. Freedom Powersports agrees to pay the amount
stated above on the condition when Freedom Powersports receives the title from the lienholder and/or myself. Should it be discovered that I owe additional monies,
including but not limited to late fees, past due payments, security deposits, penalties, etc, beyond the payoff agree to pay the difference to Freedom Powersports. Should
the payoff be less than stated, I understand that I will receive a refund of the difference directly from the Lienholder. I am selling my vehicle to Freedom Powersports,
therefore the title should be signed and released to Freedom Powersports. I hereby authorize the lienholder to release any and all information to Freedom Powersports as 
this is necessary to process the payoff of the vehicle described above.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>CUSTOMER SIGNATURE:</label>
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>DATE:</label>
				<input type="text" name="customer_date" value="<?php echo isset($info['customer_date']) ? $info['customer_date'] : ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>MANAGER SIGNATURE:</label>
				<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign']) ? $info['manager_sign'] : ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>DATE:</label>
				<input type="text" name="manager_date" value="<?php echo isset($info['manager_date']) ? $info['manager_date'] : ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
			</div>	
		</div>
		
		<div class="row table-section" style="float: left; width: 100%; margin: 0;">
			<table cellpadding="0" cellspacing="0" style="float: left; width: 100%;">
				<tr>
					<th style="width: 40%;">BRAKE SYSTEM INSPECTION</th>
					<th style="width: 10%;">OK / Needs ATTN.</th>
					<th style="width: 26%;">NOTES</th>
					<th style="width: 12%;">PARTS</th>
					<th style="width: 12%;">LABOR</th>
				</tr>
				
				<tr>
					<td>Front Brake Operation / Brake Pad Thickness</td>
					<td><input type="text" name="attn1" value="<?php echo isset($info['attn1']) ? $info['attn1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note1" value="<?php echo isset($info['note1']) ? $info['note1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part1" value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor1" value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Front Master Cylinder - Brake fluid level & appearance</td>
					<td><input type="text" name="attn2" value="<?php echo isset($info['attn2']) ? $info['attn2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note2" value="<?php echo isset($info['note2']) ? $info['note2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor2" value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Rear Brake Operation /Brake Pad Thickness</td>
					<td><input type="text" name="attn3" value="<?php echo isset($info['attn3']) ? $info['attn3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note3" value="<?php echo isset($info['note3']) ? $info['note3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part3" value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor3" value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Rear Master Cylinder - Brake fluid level & appearance</td>
					<td><input type="text" name="attn4" value="<?php echo isset($info['attn4']) ? $info['attn4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note4" value="<?php echo isset($info['note4']) ? $info['note4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part4" value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor4" value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th>ELECTRICAL INSPECTION</th>
					<th>OK / Needs ATTN.</th>
					<th>NOTES</th>
					<th>PARTS</th>
					<th>LABOR</th>
				</tr>
				
				<tr>
					<td>Rear Master Cylinder - Brake fluid level & appearance</td>
					<td><input type="text" name="attn5" value="<?php echo isset($info['attn5']) ? $info['attn5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note5" value="<?php echo isset($info['note5']) ? $info['note5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part5" value="<?php echo isset($info['part5']) ? $info['part5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor5" value="<?php echo isset($info['labor5']) ? $info['labor5'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>All Lights & Horn Function</td>
					<td><input type="text" name="attn6" value="<?php echo isset($info['attn6']) ? $info['attn6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note6" value="<?php echo isset($info['note6']) ? $info['note6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part6" value="<?php echo isset($info['part6']) ? $info['part6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor6" value="<?php echo isset($info['labor6']) ? $info['labor6'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th>ENGINE/CHASSIS INSPECTION</th>
					<th>OK / Needs ATTN</th>
					<th>NOTES</th>
					<th>PARTS</th>
					<th>LABOR</th>
				</tr>
				
				<tr>
					<td>Chassis - Check for Squeeks/Noises</td>
					<td><input type="text" name="attn7" value="<?php echo isset($info['attn7']) ? $info['attn7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note7" value="<?php echo isset($info['note7']) ? $info['note7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part7" value="<?php echo isset($info['part7']) ? $info['part7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor7" value="<?php echo isset($info['labor7']) ? $info['labor7'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Clutch Operation & Grip Condition</td>
					<td><input type="text" name="attn8" value="<?php echo isset($info['attn8']) ? $info['attn8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note8" value="<?php echo isset($info['note8']) ? $info['note8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part8" value="<?php echo isset($info['part8']) ? $info['part8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor8" value="<?php echo isset($info['labor8']) ? $info['labor8'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Cooling System Function</td>
					<td><input type="text" name="attn9" value="<?php echo isset($info['attn9']) ? $info['attn9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note9" value="<?php echo isset($info['note9']) ? $info['note9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part9" value="<?php echo isset($info['part9']) ? $info['part9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor9" value="<?php echo isset($info['labor9']) ? $info['labor9'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Drive System</td>
					<td><input type="text" name="attn10" value="<?php echo isset($info['attn10']) ? $info['attn10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note10" value="<?php echo isset($info['note10']) ? $info['note10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part10" value="<?php echo isset($info['part10']) ? $info['part10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor10" value="<?php echo isset($info['labor10']) ? $info['labor10'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Engine Running - Sound/Noise/Leak Observation</td>
					<td><input type="text" name="attn11" value="<?php echo isset($info['attn11']) ? $info['attn11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note11" value="<?php echo isset($info['note11']) ? $info['note11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part11" value="<?php echo isset($info['part11']) ? $info['part11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor11" value="<?php echo isset($info['labor11']) ? $info['labor11'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Exhaust System Condition</td>
					<td><input type="text" name="attn12" value="<?php echo isset($info['attn12']) ? $info['attn12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note12" value="<?php echo isset($info['note12']) ? $info['note12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part12" value="<?php echo isset($info['part12']) ? $info['part12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor12" value="<?php echo isset($info['labor12']) ? $info['labor12'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Front Forks/Steering/ Suspension - leaks, damage</td>
					<td><input type="text" name="attn13" value="<?php echo isset($info['attn13']) ? $info['attn13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note13" value="<?php echo isset($info['note13']) ? $info['note13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part13" value="<?php echo isset($info['part13']) ? $info['part13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor13" value="<?php echo isset($info['labor13']) ? $info['labor13'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Rear Suspension - Leaks, Damage</td>
					<td><input type="text" name="attn14" value="<?php echo isset($info['attn14']) ? $info['attn14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note14" value="<?php echo isset($info['note14']) ? $info['note14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part14" value="<?php echo isset($info['part14']) ? $info['part14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor14" value="<?php echo isset($info['labor14']) ? $info['labor14'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Throttle Operation & Grip Condition</td>
					<td><input type="text" name="attn15" value="<?php echo isset($info['attn15']) ? $info['attn15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note15" value="<?php echo isset($info['note15']) ? $info['note15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part15" value="<?php echo isset($info['part15']) ? $info['part15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor15" value="<?php echo isset($info['labor15']) ? $info['labor15'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th>FLUID / FILTER INSPECTION</th>
					<th>OK / Needs ATTN</th>
					<th>NOTES</th>
					<th>PARTS</th>
					<th>LABOR</th>
				</tr>
				
				<tr>
					<td>Air Filter Condition</td>
					<td><input type="text" name="attn16" value="<?php echo isset($info['attn16']) ? $info['attn16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note16" value="<?php echo isset($info['note16']) ? $info['note16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part16" value="<?php echo isset($info['part16']) ? $info['part16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor16" value="<?php echo isset($info['labor16']) ? $info['labor16'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Drive Fluid Condition</td>
					<td><input type="text" name="attn17" value="<?php echo isset($info['attn17']) ? $info['attn17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note17" value="<?php echo isset($info['note16']) ? $info['note16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part17" value="<?php echo isset($info['part17']) ? $info['part17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor17" value="<?php echo isset($info['note17']) ? $info['note17'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Engine Coolant (Level & Appearance)</td>
					<td><input type="text" name="attn18" value="<?php echo isset($info['attn18']) ? $info['attn18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note18" value="<?php echo isset($info['note18']) ? $info['note18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part18" value="<?php echo isset($info['part18']) ? $info['part18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="labor18" value="<?php echo isset($info['labor18']) ? $info['labor18'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Engine Oil (Level & Appearance)</td>
					<td><input type="text" name="attn19" value="<?php echo isset($info['attn19']) ? $info['attn19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note19" value="<?php echo isset($info['note19']) ? $info['note19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part19" value="<?php echo isset($info['part19']) ? $info['part19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor19" value="<?php echo isset($info['labor19']) ? $info['labor19'] : ''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<th>VISUAL / BODYWORK INSPECTION</th>
					<th>OK / Needs ATTN</th>
					<th>NOTES</th>
					<th>PARTS</th>
					<th>LABOR</th>
				</tr>
				
				<tr>
					<td>Additional Bodywork / Bumpers</td>
					<td><input type="text" name="attn20" value="<?php echo isset($info['attn20']) ? $info['attn20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note20" value="<?php echo isset($info['note20']) ? $info['note20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part20" value="<?php echo isset($info['part20']) ? $info['part20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor20" value="<?php echo isset($info['labor20']) ? $info['labor20'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Footpegs / Floorboards - Rider & Passenger</td>
					<td><input type="text" name="attn21" value="<?php echo isset($info['attn21']) ? $info['attn21'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note21" value="<?php echo isset($info['note21']) ? $info['note21'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part21" value="<?php echo isset($info['part21']) ? $info['part21'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor21" value="<?php echo isset($info['labor21']) ? $info['labor21'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Left Side of Unit</td>
					<td><input type="text" name="attn22" value="<?php echo isset($info['attn22']) ? $info['attn22'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note22" value="<?php echo isset($info['note22']) ? $info['note22'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part22" value="<?php echo isset($info['part22']) ? $info['part22'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor22" value="<?php echo isset($info['labor22']) ? $info['labor22'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Right Side of Unit</td>
					<td><input type="text" name="attn23" value="<?php echo isset($info['attn23']) ? $info['attn23'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note23" value="<?php echo isset($info['note23']) ? $info['note23'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part23" value="<?php echo isset($info['part23']) ? $info['part23'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor23" value="<?php echo isset($info['labor23']) ? $info['labor23'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Tire(s) & Wheel(s)</td>
					<td><input type="text" name="attn24" value="<?php echo isset($info['attn24']) ? $info['attn24'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note24" value="<?php echo isset($info['note24']) ? $info['note24'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part24" value="<?php echo isset($info['part24']) ? $info['part24'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor24" value="<?php echo isset($info['labor24']) ? $info['labor24'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<th>ACCESSORY INSPECTION</th>
					<th>OK / Needs ATTN</th>
					<th>NOTES</th>
					<th>PARTS</th>
					<th>LABOR</th>
				</tr>
				
				<tr>
					<td>Winch, Aditional lights, ETC.</td>
					<td><input type="text" name="attn25" value="<?php echo isset($info['attn25']) ? $info['attn25'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="note25" value="<?php echo isset($info['note25']) ? $info['note25'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part25" value="<?php echo isset($info['part25']) ? $info['part25'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="labor25" value="<?php echo isset($info['labor25']) ? $info['labor25'] : ''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 6px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label style="font-size: 20px;">Trade Value</label>
				<input type="text" name="trade_value" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label style="font-size: 20px;">Total</label>
				<input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
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
	var vin = $('#vin_trade').val();
	var res = vin.split("");
	for (var i = 0; i <= 16; i++) {
		$("#vin_trade" + i).val(res[i]);
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
