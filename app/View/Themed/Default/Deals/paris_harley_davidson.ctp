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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td{padding: 10px;}
	.right td{padding: 25px 10px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box;">
				<div class="logo1" style="width: 40%; float: left; margin: 8% 0% 0px 15%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/parisharley-logo.png'); ?>" alt="" style="width: 70%;">
				</div>
				<div class="logo2" style="width: 40%; float: left; margin-top: 17%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/parishondayamaha-logo.png'); ?>" alt="" style="width: 100%;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; box-sizing: border-box; border-left: 1px solid #000; padding: 10px;">
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>DATE:</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>SALESMAN:</label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 66%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: right; width: 61.5%;">
						<label>FINANCE MANAGER:</label>
						<input type="text" name="finance" value="<?php echo isset($info['finance']) ? $info['finance'] : ''; ?>" style="width: 54%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>CUSTOMER:</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 82.5%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>EMAIL:</label>
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 89.5%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>ADDRESS:</label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 84.5%;">
						<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 99%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>PO BOX:</label>
						<input type="text" name="po_box" value="<?php echo isset($info['po_box'])?$info['po_box']:''; ?>" style="width: 87%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label>CITY:</label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 75%;">
					</div>
					<div class="form-field" style="float: left; width: 34%;">
						<label>STATE:</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 68%;">
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label>ZIP:</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>CUSTOMER PHONE#:</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 70.7%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 6px;">
				<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 16px; text-decoration: underline;">MODEL INTERESTED IN</h2>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 14%;">
						<label>YR:</label>
						<input type="text" name="year" value="<?php echo ($info['year'] != '0')? $info['year'] : "Any Year" ; ?>" style="width: 59%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>MAKE:</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 68%;">
					</div>
					<div class="form-field" style="float: left; width: 56%;">
						<label>MODEL:</label>
						<input type="text" name="model" value="<?php echo ($info['model'] != '0')? $info['model'] : '' ; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 14px 0;">
					<div class="form-field" style="float: left; width: 25%;">
						<label><input type="radio" name="condition" value="NEW" <?php echo ($info['condition'] == "NEW")?"checked":""; ?> />NEW</label>/
						<label><input type="radio" name="condition" value="USED" <?php echo ($info['condition'] == "USED")?"checked":""; ?> />USED</label>
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label>MILES:</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 34%;">
						<label>COLOR:</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 61%;">
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label>REF#:</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 72%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>NOTES:</label>
						<input type="text" name="notes1" value="<?php echo ($info['notes1'] != '0')? $info['notes1'] : '' ; ?>" style="width: 87%; float: right;">
						<input type="text" name="notes2" value="<?php echo ($info['notes2'] != '0')? $info['notes2'] : '' ; ?>" style="width: 100%; margin: 5px 0;">
						<input type="text" name="notes3" value="<?php echo ($info['notes3'] != '0')? $info['notes3'] : '' ; ?>" style="width: 100%; margin: 5px 0;">
						<input type="text" name="notes4" value="<?php echo ($info['notes4'] != '0')? $info['notes4'] : '' ; ?>" style="width: 100%; margin: 5px 0;">
						<input type="text" name="notes5" value="<?php echo ($info['notes5'] != '0')? $info['notes5'] : '' ; ?>" style="width: 100%; margin: 5px 0;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
			<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 16px; text-decoration: underline;"><b>TRADE 1</b></h2>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 12%;">
					<label>YR:</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MAKE:</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 69%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MODEL:</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MILES:</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 72%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>COLOR:</label>
					<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 72%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 33%;">
					<label>VIN</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>LIENHOLDER</label>
					<input type="text" name="leinholder1_trade" value="<?php echo isset($info['leinholder1_trade'])?$info['leinholder1_trade']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 34%;">
					<label>10 DAY PAYOFF</label>
					<input type="text" name="payoff1_trade" value="<?php echo isset($info['payoff1_trade'])?$info['payoff1_trade']:''; ?>" style="width: 68%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>AMOUNT WANTED ON TRADE</label>
					<input type="text" name="amount1_trade" value="<?php echo isset($info['amount1_trade'])?$info['amount1_trade']:''; ?>" style="width: 57%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>ACV</label>
					<input type="text" name="acv1_trade" value="<?php echo isset($info['acv1_trade'])?$info['acv1_trade']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>DSRP</label>
					<input type="text" name="dsrp1_trade" value="<?php echo isset($info['dsrp1_trade'])?$info['dsrp1_trade']:''; ?>" style="width: 82%;">
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; margin: 15px 0 10px; text-align: center; font-size: 16px; text-decoration: underline;"><b>TRADE 2</b></h2>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 12%;">
					<label>YR:</label>
					<input type="text" name="year_trade1" value="<?php echo isset($info['year_trade1'])?$info['year_trade1']: $info['year_addon1_trade']; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MAKE:</label>
					<input type="text" name="make_trade1" value="<?php echo isset($info['make_trade1'])?$info['make_trade1']: $info['make_addon1_trade']; ?>" style="width: 69%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MODEL:</label>
					<input type="text" name="model_trade1" value="<?php echo isset($info['model_trade1'])?$info['model_trade1']: $info['model_addon1_trade']; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>MILES:</label>
					<input type="text" name="model_trade1" value="<?php echo isset($info['model_trade1'])?$info['model_trade1']: $info['odometer_addon1_trade']; ?>" style="width: 72%;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>COLOR:</label>
					<input type="text" name="color_trade1" value="<?php echo isset($info['color_trade1'])?$info['color_trade1']: $info['unit_color_addon1_trade']; ?>" style="width: 72%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 33%;">
					<label>VIN</label>
					<input type="text" name="vin_trade1" value="<?php echo isset($info['vin_trade1'])?$info['vin_trade1']: $info['vin_addon1_trade']; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>LIENHOLDER</label>
					<input type="text" name="leinholder2_trade" value="<?php echo isset($info['leinholder2_trade'])?$info['leinholder2_trade']:''; ?>" style="width: 65%;">
				</div>
				<div class="form-field" style="float: left; width: 34%;">
					<label>10 DAY PAYOFF</label>
					<input type="text" name="payoff2_trade" value="<?php echo isset($info['payoff2_trade'])?$info['payoff2_trade']:''; ?>" style="width: 68%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>AMOUNT WANTED ON TRADE</label>
					<input type="text" name="amount2_trade" value="<?php echo isset($info['amount2_trade'])?$info['amount2_trade']:''; ?>" style="width: 57%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>ACV</label>
					<input type="text" name="acv2_trade" value="<?php echo isset($info['acv2_trade'])?$info['acv2_trade']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>DSRP</label>
					<input type="text" name="dsrp2_trade" value="<?php echo isset($info['dsrp2_trade'])?$info['dsrp2_trade']:''; ?>" style="width: 82%;">
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0; box-sizing: border-box; border: 1px solid #000;">
			<h2 style="float: left; width: 100%; margin: 16px 0 10px; text-align: center; font-size: 22px; text-decoration: underline;"><b>METHOD OF PAYMENT</b></h2>
			<ul style="text-align: center; padding: 5px 0 20px; float: left; width: 100%;">
				<li><input type="checkbox" name="cash_status" <?php echo ($info['cash_status'] == "cash") ? "checked" : ""; ?> value="cash" style="margin-right: 10px;"/>CASH</li>
				<li><input type="checkbox" name="check_status" <?php echo ($info['check_status'] == "check") ? "checked" : ""; ?> value="check" style="margin-right: 10px;"/>CHECK</li>
				<li><input type="checkbox" name="credit_status" <?php echo ($info['credit_status'] == "credit") ? "checked" : ""; ?> value="credit" style="margin-right: 10px;"/>CREDIT-CARD</li>
				<li><input type="checkbox" name="finance_status" <?php echo ($info['finance_status'] == "finance") ? "checked" : ""; ?> value="finance" style="margin-right: 10px;"/>FINANCE</li>
				<li><input type="checkbox" name="bank_status" <?php echo ($info['bank_status'] == "bank") ? "checked" : ""; ?> value="bank" style="margin-right: 10px;"/>OUTSIDE BANK</li>
			</ul>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0 0 10px; box-sizing: border-box; border: 1px solid #000; padding: 30px  20px; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="font-size: 17px;"><b>CASH DOWN</b></label>
				<input type="text" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="font-size: 17px;"><b>PAYMENT RANGE</b></label>
				<input type="text" name="payment_range1" value="<?php echo isset($info['payment_range1'])?$info['payment_range1']:''; ?>" style="width: 30%;"> - 
				<input type="text" name="payment_range2" value="<?php echo isset($info['payment_range2'])?$info['payment_range2']:''; ?>" style="width: 30%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 10px;">
			<h2 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 14px; text-decoration: underline;">LENDERS SUBMITTED</h2>
			<div class="table-outer" style="width: 80%; margin: 0 auto;">
				<table cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="width: 40%;"><input type="checkbox" name="eaglemark_status" <?php echo ($info['eaglemark_status'] == "eaglemark") ? "checked" : ""; ?> value="eaglemark" style="margin-right: 10px;"/>EAGLEMARK SAVINGS BANK</td>
						<td style="width: 30%;"><input type="checkbox" name="aca_status" <?php echo ($info['aca_status'] == "aca") ? "checked" : ""; ?> value="aca" style="margin-right: 10px;"/>ACA</td>
						<td style="width: 30%;"><input type="checkbox" name="liberty_status" <?php echo ($info['liberty_status'] == "liberty") ? "checked" : ""; ?> value="liberty" style="margin-right: 10px;"/>LIBERTY</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="ahfc_status" <?php echo ($info['ahfc_status'] == "ahfc") ? "checked" : ""; ?> value="ahfc" style="margin-right: 10px;"/>AHFC</td>
						<td><input type="checkbox" name="marine_status" <?php echo ($info['marine_status'] == "marine") ? "checked" : ""; ?> value="marine" style="margin-right: 10px;"/>MARINE ONE</td>
						<td><input type="checkbox" name="mb_status" <?php echo ($info['mb_status'] == "mb") ? "checked" : ""; ?> value="mb" style="margin-right: 10px;"/>MB FINANCIAL</td>
					</tr>
					<tr>
						<td><input type="checkbox" name="yamaha_status" <?php echo ($info['yamaha_status'] == "yamaha") ? "checked" : ""; ?> value="yamaha" style="margin-right: 10px;"/>YAMAHA</td>
						<td><input type="checkbox" name="main_status" <?php echo ($info['main_status'] == "main") ? "checked" : ""; ?> value="main" style="margin-right: 10px;"/>ONE MAIN</td>
						<td><input type="checkbox" name="other_status" <?php echo ($info['other_status'] == "other") ? "checked" : ""; ?> value="other" style="margin-right: 10px;"/>OTHER: <input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="width: 60%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="row" style="flaot: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>MANAGER SIGNATURE</b></label>
				<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign'])?$info['manager_sign']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>CUSTOMER SIGNATURE</b></label>
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 65%;">
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
