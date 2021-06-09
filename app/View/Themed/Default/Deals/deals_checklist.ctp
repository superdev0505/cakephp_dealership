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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	
@media print {
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	.bg{background-color: blue !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="font-size: 16px;"><b><i>RVs NORTHWEST<sup>*</sup> DEAL #</i></b></label>
				<input type="text" name="deal" value="<?php echo isset($info['deal'])?$info['deal']:''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: right; width: 50%;">
				<label style="font-size: 16px;"><b>Salesperson</b></label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 77%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 80%;">
				<label><b>CUSTOMER</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: right; width: 20%;">
				<label><b>DATE</b></label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
				
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 43%;">
				<label><b>PHONE</b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 43%;">
				<label><b>EMAIL</b> </label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: right; width: 14%;">
				<label>Yes <input type="radio" name="email_check" <?php echo ($info['email_check'] == "yes") ? "checked" : ""; ?> value="yes"/></label>
				<label>No <input type="radio" name="email_check" <?php echo ($info['email_check'] == "no") ? "checked" : ""; ?> value="no"/></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>STOCK</b></label>
				<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>YEAR</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>MAKE</b></label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label><b>BRAND</b></label>
				<input type="text" name="brand" value="<?php echo isset($info['brand']) ? $info['brand'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label><b>MODEL</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label><b>VIN #</b></label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: right; width: 33%;">
				<label><b>ODO</b></label>
				<input type="text" name="odo" value="<?php echo isset($info['odo']) ? $info['odo'] : ''; ?>" style="width: 86%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<h3 style="float: left; width: 100%; margin: 5px 0; font-size: 15px;"><b>SALES CHECK LIST</b></h3>
				<label><input type="checkbox" name="worksheet_check" <?php echo (isset($info['worksheet_check']) && $info['worksheet_check']=='worksheet')?'checked="checked"':''; ?> value="worksheet"> WORKSHEET</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<h3 style="float: left; width: 100%; margin: 5px 0; font-size: 15px;">TRADE INFORMATION</h3>
				<div class="form-field" style="float: left; width: 50%;">
					<label>YEAR</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>MAKE</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="credit_check" <?php echo (isset($info['credit_check']) && $info['credit_check']=='credit')?'checked="checked"':''; ?> value="credit"> CREDIT APPLICATION</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>BRAND</label>
					<input type="text" name="brand_trade" value="<?php echo isset($info['brand_trade']) ? $info['brand_trade'] : ''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>MODEL</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 77%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="privacy_check" <?php echo (isset($info['privacy_check']) && $info['privacy_check']=='privacy')?'checked="checked"':''; ?> value="privacy"> PRIVACY NOTICE</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 33%;">
					<label>ODO</label>
					<input type="text" name="odo_trade" value="<?php echo isset($info['odo_trade']) ? $info['odo_trade'] : ''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 34%;">
					<label>LENGTH</label>
					<input type="text" name="length_trade" value="<?php echo isset($info['length_trade']) ? $info['length_trade'] : ''; ?>" style="width: 65%;">
				</div>
				<div class="form-field" style="float: right; width: 33%;">
					<label>MILES</label>
					<input type="text" name="miles_trade" value="<?php echo isset($info['miles_trade']) ? $info['miles_trade'] : ''; ?>" style="width: 70%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="driver_check" <?php echo (isset($info['driver_check']) && $info['driver_check']=='driver')?'checked="checked"':''; ?> value="driver">  DRIVER LICENSE</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>VIN#</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>INSURANCE CARD</label>
					<input type="text" name="insurance_trade" value="<?php echo isset($info['insurance_trade']) ? $info['insurance_trade'] : ''; ?>" style="width: 52%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="insurance_check" <?php echo (isset($info['insurance_check']) && $info['insurance_check']=='insurance')?'checked="checked"':''; ?> value="insurance"> <b>INSURANCE CARD</b></label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label><input type="checkbox" name="trade_check" <?php echo (isset($info['trade_check']) && $info['trade_check']=='appraisal')?'checked="checked"':''; ?> value="appraisal"> TRADE APPRAISAL</label>
					<label style="margin: 0 5%;"><input type="checkbox" name="register_check" <?php echo (isset($info['register_check']) && $info['register_check']=='registration')?'checked="checked"':''; ?> value="registration"> REGISTRATION</label>
					<label><input type="checkbox" name="title_check" <?php echo (isset($info['title_check']) && $info['title_check']=='title')?'checked="checked"':''; ?> value="title"> TITLE</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="appar_check" <?php echo (isset($info['appar_check']) && $info['appar_check']=='appraisal')?'checked="checked"':''; ?> value="appraisal"> TRADE APPARSIAL</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: right; width: 100%;">
					<label style="font-size: 20px;"><b>Lienholder</b></label>
					<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="sheet_check" <?php echo (isset($info['sheet_check']) && $info['sheet_check']=='sheet')?'checked="checked"':''; ?> value="sheet">VALUE SHEET (<b>NADA/MSRP</b>)</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: right; width: 100%;">
					<label><b>Address</b></label>
					<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 88%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="get_check" <?php echo (isset($info['get_check']) && $info['get_check']=='get_ready')?'checked="checked"':''; ?> value="get_ready"> GET READY/WE OWE</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: right; width: 100%;">
					<input type="text" name="address2" value="<?php echo isset($info['address2']) ? $info['address2'] : ''; ?>" style="width: 98.5%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="mailing_check" <?php echo (isset($info['mailing_check']) && $info['mailing_check']=='mailing')?'checked="checked"':''; ?> value="mailing"> MAILING ADDRESS (IF DIFFERENT)</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 50%;">
					<label><b>Loan Acct#</b></label>
					<input type="text" name="loan_acct" value="<?php echo isset($info['loan_acct']) ? $info['loan_acct'] : ''; ?>" style="width: 67%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label><b>Phone</b></label>	
					<input type="text" name="phone1" value="<?php echo isset($info['phone1']) ? $info['phone1'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="pricing_check" <?php echo (isset($info['pricing_check']) && $info['pricing_check']=='risk')?'checked="checked"':''; ?> value="risk"> RISK BASED PRICING NOTICE</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 34%;">
					<label><b>10 Day Payoff</b></label>
					<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 43%;">
				</div>
				<div class="form-field" style="float: right; width: 33%;">
					<label"><b>Per Diem</b></label>
					<input type="text" name="diem" value="<?php echo isset($info['diem']) ? $info['diem'] : ''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: right; width: 33%;">
					<label><b>Good Thru</b></label>
					<input type="text" name="thru" value="<?php echo isset($info['thru']) ? $info['thru'] : ''; ?>" style="width: 52%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="reference_check" <?php echo (isset($info['reference_check']) && $info['reference_check']=='reference')?'checked="checked"':''; ?> value="reference">REFERENCE SHEET (<b><i>2 MIN</i></b>)</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label><b>Name of Contact</b></label>
					<input type="text" name="contact" value="<?php echo isset($info['contact']) ? $info['contact'] : ''; ?>" style="width: 79%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="waiver_check" <?php echo (isset($info['waiver_check']) && $info['waiver_check']=='waiver')?'checked="checked"':''; ?> value="waiver"> LIABILITY WAIVER</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label><b><i>Additional File Comment</i></b></label>
					<input type="text" name="comment" value="<?php echo isset($info['comment']) ? $info['comment'] : ''; ?>" style="width: 69.5%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 40%;">
				<label><input type="checkbox" name="verification_check" <?php echo (isset($info['verification_check']) && $info['verification_check']=='verification')?'checked="checked"':''; ?> value="verification"><b>VIN #</b> Verification</label>
			</div>
			<div class="right" style="float: right; width: 60%;">
				<div class="form-field" style="float: left; width: 100%;">
					<input type="text" name="comment1" value="<?php echo isset($info['comment1']) ? $info['comment1'] : ''; ?>" style="width: 99%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 100%;">
				<label><b>FINANCE MANAGER</b></label>
				<input type="text" name="finance" value="<?php echo isset($info['finance']) ? $info['finance'] : ''; ?>" style="width: 84.5%;">
			</div>
		</div>
		
		
		<ul>
			<li><label><input type="checkbox" name="purchase_check" <?php echo (isset($info['purchase_check']) && $info['purchase_check']=='purchase')?'checked="checked"':''; ?> value="purchase"> PURCHASE ORDER</label></li>
			<li><label><input type="checkbox" name="release_check" <?php echo (isset($info['release_check']) && $info['release_check']=='release')?'checked="checked"':''; ?> value="release">  RELEASE OF INTEREST</label></li>
			<li><label><input type="checkbox" name="paint_check" <?php echo (isset($info['paint_check']) && $info['paint_check']=='paint')?'checked="checked"':''; ?> value="paint"> PAINT SEALANT</label></li>
			<li><label><input type="checkbox" name="bank_check" <?php echo (isset($info['bank_check']) && $info['bank_check']=='bank')?'checked="checked"':''; ?> value="bank"> BANK CONTRACT</label></li>
			<li><label><input type="checkbox" name="odometer_check" <?php echo (isset($info['odometer_check']) && $info['odometer_check']=='odometer')?'checked="checked"':''; ?> value="odometer"> ODOMETER STATEMENT</label></li>
			<li><label><input type="checkbox" name="tire_check" <?php echo (isset($info['tire_check']) && $info['tire_check']=='tire')?'checked="checked"':''; ?> value="tire"> TIRE GUARD</label></li>
			<li><label><input type="checkbox" name="proof_check" <?php echo (isset($info['proof_check']) && $info['proof_check']=='proof')?'checked="checked"':''; ?> value="proof">  PROOF OF INSURANCE</label></li>
			<li><label><input type="checkbox" name="service_check" <?php echo (isset($info['service_check']) && $info['service_check']=='service')?'checked="checked"':''; ?> value="service"> SERVICE CONTRACT</label></li>
			<li><label><input type="checkbox" name="affidavit_check" <?php echo (isset($info['affidavit_check']) && $info['affidavit_check']=='affidavit')?'checked="checked"':''; ?> value="affidavit"> OUT OF STATE AFFIDAVIT</label></li>
			<li><label><input type="checkbox" name="credit_check" <?php echo (isset($info['credit_check']) && $info['credit_check']=='credit')?'checked="checked"':''; ?> value="credit"> CREDIT APPLICATION</label></li>
			<li><label><input type="checkbox" name="gap_check" <?php echo (isset($info['gap_check']) && $info['gap_check']=='gap')?'checked="checked"':''; ?> value="gap"> GAP AGGREMENT</label></li>
			<li><label><input type="checkbox" name="waiver_check" <?php echo (isset($info['waiver_check']) && $info['waiver_check']=='waiver')?'checked="checked"':''; ?> value="waiver"> WAIVER OF WARRENTY</label></li>
			<li><label><input type="checkbox" name="membership_check" <?php echo (isset($info['membership_check']) && $info['membership_check']=='membership')?'checked="checked"':''; ?> value="membership"> MEMBERSHIP APPLICATION</label></li>
			<li><label><input type="checkbox" name="odom_check" <?php echo (isset($info['odom_check']) && $info['odom_check']=='odom')?'checked="checked"':''; ?> value="odom">  TRADE ODOMETER</label></li>
			<li><label><input type="checkbox" name="down_check" <?php echo (isset($info['down_check']) && $info['down_check']=='down')?'checked="checked"':''; ?> value="down"> DOWN PAYEMNT</label></li>
			<li><label><input type="checkbox" name="title_app_check" <?php echo (isset($info['title_app_check']) && $info['title_app_check']=='title_app')?'checked="checked"':''; ?> value="title_app"> TITLE APPLICATION</label></li>
			<li><label><input type="checkbox" name="buyer_check" <?php echo (isset($info['buyer_check']) && $info['buyer_check']=='buyers')?'checked="checked"':''; ?> value="buyers"> BUYERS GUIDE/AS IS</label></li>
			<li><label><input type="checkbox" name="card_check" <?php echo (isset($info['card_check']) && $info['card_check']=='card')?'checked="checked"':''; ?> value="card"> CARD <input type="checkbox" name="cash_check" <?php echo (isset($info['cash_check']) && $info['cash_check']=='cash')?'checked="checked"':''; ?> value="cash"> CASH <input type="checkbox" name="check_status" <?php echo (isset($info['check_status']) && $info['check_status']=='check')?'checked="checked"':''; ?> value="check"> CHECK</label></li>
			<li><label><input type="checkbox" name="power_check" <?php echo (isset($info['power_check']) && $info['power_check']=='attorney')?'checked="checked"':''; ?> value="attorney"> Power of Attorney</label></li>
			<li><label><input type="checkbox" name="authorization_check" <?php echo (isset($info['authorization_check']) && $info['authorization_check']=='authorization')?'checked="checked"':''; ?> value="authorization"> Authorization</label></li>
		</ul>
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
