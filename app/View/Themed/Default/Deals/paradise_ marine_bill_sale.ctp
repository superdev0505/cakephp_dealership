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
    <input type="hidden" id="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" name="email">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px;}
	li{margin-bottom: 7px; font-size: 16px;}
	table{font-size: 14px;}
	td, th{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 1px; text-align: center;}
	.detail-form td:first-child, .detail-form th:first-child{border-bottom: 0px;}
	p{font-size: 14px; margin: 2px 0;}
	table input[type="text"]{border: 0px;}
	.rightside-label label{font-size: 13px; font-weight: inherit;margin: 0px;}
	.rightside-label input {padding: 0px;}
	.wraper.main input {padding: 0px;}
	.detail-form td:first-child, .detail-form th:first-child{border-bottom: 0px;}
	.detail-form{border-top: 0px; border-left: 0px;}
	.no-border td, .no-border th{border: 0px;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.trade-form {margin-top: 18px !important;}
.second-page {margin-top: 10px !important;}
.paradise_form3 {margin-top: 10.1% !important;}
.total {width: 340px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="float: left; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/paradisemarine-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 55%; margin-left: 10%; text-align: center; margin-bottom: 10px;">
				<p style="font-size: 16px;"><b>Paradise Marine Center</b></p>
				<p>6940-A HIGHWAY 59 NORTH</p>
				<p>P.O BOX 2439 <span style="width: auto">•</span> GULF SHORES, AL 36547</p>
				<p>(251) 968-2628 <span style="width: auto">•</span> FAX (251) 968-7905</p>
			</div>
			<div class="logo1" style="float: right; width: 12%; margin-top: 13px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Pontoon-Super-Store-clear.png'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 0;">
			<div class="left-side" style="float: left; width: 48%; margin: 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<label>NAME</label>
					<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 90%; float: right;"> 
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<label>ADDRESS</label>	
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 86%; float: right;"> 
					<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 100%; float: right; margin: 0px 0 3px;"> 
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>CITY</label>
						<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 84%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 28%; margin: 0;">
						<label>STATE</label>
						<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 68%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 22%; margin: 0;">
						<label>ZIP</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 80%; float: right;"> 
					</div>
				</div>
			</div>
			
			<div class="right-side" style="float: right; width: 48%; margin: 0;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Her DOB</label>
						<input type="text" name="her_dob1" value="<?php echo isset($info['her_dob1']) ? $info['her_dob1'] : ''; ?>" style="width: 22%;">/ 
						<input type="text" name="her_dob2" value="<?php echo isset($info['her_dob2']) ? $info['her_dob2'] : ''; ?>" style="width: 22%;">/ 
						<input type="text" name="her_dob3" value="<?php echo isset($info['her_dob3']) ? $info['her_dob3'] : ''; ?>" style="width: 22%;"> 
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>His DOB</label>
						<input type="text" name="his_dob1" value="<?php echo isset($info['his_dob1']) ? $info['his_dob1'] : ''; ?>" style="width: 22%;">/ 
						<input type="text" name="his_dob2" value="<?php echo isset($info['his_dob2']) ? $info['his_dob2'] : ''; ?>" style="width: 22%;">/ 
						<input type="text" name="his_dob3" value="<?php echo isset($info['his_dob3']) ? $info['his_dob3'] : ''; ?>" style="width: 22%;"> 
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 35%; margin: 0;">
						<label>SOLD BY</label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 63%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 26%; margin: 0;">
						<label>DATE</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 66%;"> 
					</div>
					<div class="form-field" style="float: left; width: 39%; margin: 0;">
						<label>DELIVERY DATE</label>
						<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 40%;"> 
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>HOME PH.</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 72%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>WORK PH.</label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 71%; float: right;"> 
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 45%; margin: 0;">
						<label>FAX</label>
						<input type="text" name="fax" value="<?php echo isset($info['fax']) ? $info['fax'] : $d_fax; ?>" style="width: 85%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 55%; margin: 0;">
						<label>CELL PHONE</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 66%; float: right;"> 
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px 0 36px;">
			<label>EMAIL:</label>
			<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="text-align: center;width: 43%; margin-right: 3px;">
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<h2 style="float: left; width: 100%; margin: 3px 0 3px; font-size: 18px; text-align: center;"><b>Unit Information</b></h2>
			<table style="border-top: 1px solid #000; border-left: 1px solid #000;" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<th style="width: 15%;">New/Used</th>
					<th style="width: 7%;">Year</th>
					<th style="width: 15%;">Make</th>
					<th style="width: 15%;">Model</th>
					<th style="width: 26%;">Serial No.</th>
					<th>Stock No.</th>
					<th style="width: 12%;">Price</th>
				</tr>
				
				<tr>
					<td>
					<span>NEW <input type="radio" name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition']=='New')?'checked="checked"':''; ?> /></span>
					<span style="margin: 0 6%;">USED <input type="radio" name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition']=='Used')?'checked="checked"':''; ?> /"></span>
					</td>
					<td><input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;text-align: center;"></td>
					<td><input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;text-align: center;"></td>
					<td><input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;text-align: center;"></td>
					<td><input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;text-align: center;"></td>
					<td><input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 100%;text-align: center;"></td>
					<td><span style="font-size: 16px;">$</span><input type="text" name="selling_price0" class="price_value" id="selling_price0" value="<?php echo isset($info['selling_price0']) ? $info['selling_price0'] : ''; ?>" style="width: 90%;"></td>
				</tr>
				
				<tr>
					<td>
					<span>NEW <input type="radio" name="condition_addon1" value="New" <?php echo (isset($info['condition_addon1']) && $info['condition_addon1']=='New')?'checked="checked"':''; ?> /></span>
					<span style="margin: 0 6%;">USED <input type="radio" name="condition_addon1" value="Used" <?php echo (isset($info['condition_addon1']) && $info['condition_addon1']=='Used')?'checked="checked"':''; ?> /"></span>
					</td>
					<td><input type="text" name="year1" value="<?php echo isset($info['year1']) ? $info['year1'] :$info['year_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make1" value="<?php echo isset($info['make1']) ? $info['make1'] :$info['make_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model1" value="<?php echo isset($info['model1']) ? $info['model1'] :$info['model_id_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] :$info['vin_addon1']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="stock_num1" value="<?php echo isset($info['stock_num1']) ? $info['stock_num1'] :$info['stock_num_addon1']; ?>" style="width: 100%;"></td>
					<td><span style="font-size: 16px;">$</span><input type="text" name="selling_price1" class="price_value" id="selling_price1" value="<?php echo isset($info['selling_price1']) ? $info['selling_price1'] : ''; ?>" style="width: 90%;"></td>
				</tr>
				<tr>
					<td><span>NEW <input type="radio" name="condition_addon2" value="New" <?php echo (isset($info['condition_addon2']) && $info['condition_addon2']=='New')?'checked="checked"':''; ?> /></span>
					<span style="margin: 0 6%;">USED <input type="radio" name="condition_addon2" value="Used" <?php echo (isset($info['condition_addon2']) && $info['condition_addon1']=='Used')?'checked="checked"':''; ?> /"></span></td>
					<td><input type="text" name="year2" value="<?php echo isset($info['year2']) ? $info['year2'] :$info['year_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make2" value="<?php echo isset($info['make2']) ? $info['make2'] :$info['make_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model2" value="<?php echo isset($info['model2']) ? $info['model2'] :$info['model_id_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] :$info['vin_addon2']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="stock_num2" value="<?php echo isset($info['stock_num2']) ? $info['stock_num2'] :$info['stock_num_addon2']; ?>" style="width: 100%;"></td>
					<td><span style="font-size: 16px;">$</span><input type="text" name="selling_price2" class="price_value" id="selling_price2" value="<?php echo isset($info['selling_price2']) ? $info['selling_price2'] : ''; ?>" style="width: 90%;"></td>
				</tr>
				<tr>
					<td><span>NEW <input type="radio" name="condition_addon3" value="New" <?php echo (isset($info['condition_addon3']) && $info['condition_addon3']=='New')?'checked="checked"':''; ?> /></span>
					<span style="margin: 0 6%;">USED <input type="radio" name="condition_addon3" value="Used" <?php echo (isset($info['condition_addon3']) && $info['condition_addon3']=='Used')?'checked="checked"':''; ?> /"></span></td>
					<td><input type="text" name="year3" value="<?php echo isset($info['year3']) ? $info['year3'] :$info['year_addon3']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make3" value="<?php echo isset($info['make3']) ? $info['make3'] :$info['make_addon3']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model3" value="<?php echo isset($info['model3']) ? $info['model3'] :$info['model_id_addon3']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] :$info['vin_addon3']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="stock_num3" value="<?php echo isset($info['stock_num3']) ? $info['stock_num3'] :$info['stock_num_addon3']; ?>" style="width: 100%;"></td>
					<td><span style="font-size: 16px;">$</span><input type="text" name="selling_price3" class="price_value" id="selling_price3" value="<?php echo isset($info['selling_price3']) ? $info['selling_price3'] : ''; ?>" style="width: 90%;"></td>
				</tr>
				<tr>
					<td>
					<span>NEW <input type="radio" name="condition_addon4" value="New" <?php echo (isset($info['condition_addon4']) && $info['condition_addon4']=='New')?'checked="checked"':''; ?> /></span>
					<span style="margin: 0 6%;">USED <input type="radio" name="condition_addon4" value="Used" <?php echo (isset($info['condition_addon4']) && $info['condition_addon4']=='Used')?'checked="checked"':''; ?> /"></span>
					</td>
					<td><input type="text" name="year4" value="<?php echo isset($info['year4']) ? $info['year4'] :$info['year_addon4']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="make4" value="<?php echo isset($info['make4']) ? $info['make4'] :$info['make_addon4']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="model4" value="<?php echo isset($info['model4']) ? $info['model4'] :$info['model_id_addon4']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] :$info['vin_addon4']; ?>" style="width: 100%;"></td>
					<td><input type="text" name="stock_num4" value="<?php echo isset($info['stock_num4']) ? $info['stock_num4'] :$info['stock_num_addon4']; ?>" style="width: 100%;"></td>
					<td><span style="font-size: 16px;">$</span><input type="text" name="selling_price4" class="price_value" id="selling_price4" value="<?php echo isset($info['selling_price4']) ? $info['selling_price4'] : ''; ?>" style="width: 90%;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">	
			<div class="left" style="float: left; width: 48%;">
				<table style="border-top: 1px solid #000; border-left: 1px solid #000;" cellpadding="0" cellspacing="0" width="100%;" style="margin: 4px 0 7px; float: left;">
					<tr style="height: 29px;">
						<th class="total">Added Options</th>
						<th style="width: 120px;">Total</th>
					</tr>
					<tr>
						<td><input type="text" name="dealer_add1" value="<?php echo isset($info['dealer_add1']) ? $info['dealer_add1'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add2" id="dealer_add2" class="dealer" value="<?php echo isset($info['dealer_add2']) ? $info['dealer_add2'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="dealer_add3" value="<?php echo isset($info['dealer_add3']) ? $info['dealer_add3'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add4" id="dealer_add4" class="dealer" value="<?php echo isset($info['dealer_add4']) ? $info['dealer_add4'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="dealer_add5" value="<?php echo isset($info['dealer_add5']) ? $info['dealer_add5'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add6" id="dealer_add6" class="dealer" value="<?php echo isset($info['dealer_add6']) ? $info['dealer_add6'] : ''; ?>" style="width: 80%;"></td>
					</tr>

					<tr>
						<td><input type="text" name="dealer_add7" value="<?php echo isset($info['dealer_add7']) ? $info['dealer_add7'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add8" id="dealer_add8" class="dealer" value="<?php echo isset($info['dealer_add8']) ? $info['dealer_add8'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="dealer_add9" value="<?php echo isset($info['dealer_add9']) ? $info['dealer_add9'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add10" id="dealer_add10" class="dealer" value="<?php echo isset($info['dealer_add10']) ? $info['dealer_add10'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td><input type="text" name="dealer_add11" value="<?php echo isset($info['dealer_add11']) ? $info['dealer_add11'] : ''; ?>" style="width: 100%;"></td>
						<td style="text-align: inherit;">$<input type="text" name="dealer_add12" id="dealer_add12" class="dealer" value="<?php echo isset($info['dealer_add12']) ? $info['dealer_add12'] : ''; ?>" style="width: 80%;"></td>
					</tr>
				</table>
			
				<div class="row" style="float: left; width: 100%; margin: 0; margin-top: 18px;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label style="float: left;">Factory Options:</label>
						<textarea name="name" style="height: 90px; float: right; width: 76%; border: 0px;"></textarea>
					</div>
				</div>				
				<div class="row" style="float: left; width: 100%; margin: 18px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Notes:</label>
						<textarea name="name" style="height: 90px; float: right; width: 91%; border: 0px;"></textarea>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			
			
			<!-- rightside start -->
			<div class="rightside-label" style="float: right; width: 48%;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label><b>SELLING PRICE</b></label>
						<span style="float: right; text-align: right; width: 25%;">$<input style="float: right; width:90%;" type="text" name="selling_price" class="price_value" id="selling_price" value="<?php echo isset($info['selling_price']) ? $info['selling_price'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Freight</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right;width: 90%;" type="text" name="freight" class="price_value" id="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<label>Dealer Prep/Rigging</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="dealer_prep" class="price_value" id="dealer_prep" value="<?php echo isset($info['dealer_prep']) ? $info['dealer_prep'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<label>Trade Allowance</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%; margin-bottom: 2px;" type="text" name="trade_allowance" class="price_value" id="trade_allowance" value="<?php echo isset($info['trade_allowance']) ? $info['trade_allowance'] : ''; ?>" /></span>
					</div>

					<div class="form-field" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<label><b>Major Unit Price</b></label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="unit_price" class="price_value" id="unit_price" value="<?php echo isset($info['unit_price']) ? $info['unit_price'] : ''; ?>" /></span>
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Document/Admin Fee</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="admin_fee" class="price_value" id="admin_fee" value="<?php echo isset($info['admin_fee']) ? $info['admin_fee'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Title/Registration Fee</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%; margin-bottom: 2px;" type="text" name="regist_fee" class="price_value" id="regist_fee" value="<?php echo isset($info['regist_fee']) ? $info['regist_fee'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000;">
						<label><b>Total Major Unit Price</b></label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="total_price" class="price_value" id="total_price" value="<?php echo isset($info['total_price']) ? $info['total_price'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Added Options</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="added_option" id="added_option" class="price_value" value="<?php echo isset($info['added_option']) ? $info['added_option'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<label><b>Total Package Price w/Options</b></label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%; margin-bottom: 2px;" type="text" name="total_package" class="price_value" id="total_package" value="<?php echo isset($info['total_package']) ? $info['total_package'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Sales Tax (Major Unit)</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="sales_tax1" class="price_value" id="sales_tax1" value="<?php echo isset($info['sales_tax1']) ? $info['sales_tax1'] : ''; ?>"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Sales Tax (Options)</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="sales_tax2" class="price_value" id="sales_tax2" value="<?php echo isset($info['sales_tax2']) ? $info['sales_tax2'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Payoff</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="payment" class="price_value" id="payment" value="<?php echo isset($info['payment']) ? $info['payment'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;
					border-bottom: 1px solid #000;">
						<label style="float: left; width: 40%;">Extended Warranty</label>
						<span><input style="float: left; margin-bottom: 2px;" type="text" name="warranty_type" class="warranty_type" value="<?php echo isset($info['warranty_type']) ? $info['warranty_type'] : ''; ?>" /></span>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%; margin-bottom: 2px;" type="text" name="extended_warranty" class="price_value" id="extended_warranty" value="<?php echo isset($info['extended_warranty']) ? $info['extended_warranty'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label><b>Cash Sale Price</b></label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="cash_price" class="price_value" id="cash_price" value="<?php echo isset($info['cash_price']) ? $info['cash_price'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Down Payment</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="down_pay1" class="price_value" id="down_pay1" value="<?php echo isset($info['down_pay1']) ? $info['down_pay1'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Down Payment</label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="down_pay2" class="price_value" id="down_pay2" value="<?php echo isset($info['down_pay2']) ? $info['down_pay2'] : ''; ?>" /></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label><b>Amount to Pay/Finance</b></label>
						<span style="float: right; width: 25%; text-align: right;">$<input style="float: right; width: 90%;" type="text" name="amount_pay" class="price_value" id="amount" value="<?php echo isset($info['amount_pay']) ? $info['amount_pay'] : ''; ?>" /></span>
					</div>
				</div>
			</div>
			<!-- rightside end -->
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 48%; margin-top: -10px;">
				<table class="detail-form trade-form" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<th style="width: 10%;">Trade:</th>
						<th style="width: 15%; border-top: 1px solid #000;">Yr. + Make</th>
						<th style="width: 15%; border-top: 1px solid #000;">Model</th>
						<th style="width: 30%; border-top: 1px solid #000;">Serial No.</th>
					</tr>
					<tr>
						<td>B</td>
						<td><input type="text" name="b_yr" value="<?php echo isset($info['b_yr']) ? $info['b_yr'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="b_model" value="<?php echo isset($info['b_model']) ? $info['b_model'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="b_serial" value="<?php echo isset($info['b_serial']) ? $info['b_serial'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>M</td>
						<td><input type="text" name="m_yr1" value="<?php echo isset($info['m_yr1']) ? $info['m_yr1'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_model1" value="<?php echo isset($info['m_model1']) ? $info['m_model1'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_serial1" value="<?php echo isset($info['m_serial1']) ? $info['m_serial1'] : ''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>M</td>
						<td><input type="text" name="m_yr2" value="<?php echo isset($info['m_yr2']) ? $info['m_yr2'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_model2" value="<?php echo isset($info['m_model2']) ? $info['m_model2'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_serial2" value="<?php echo isset($info['m_serial2']) ? $info['m_serial2'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>M</td>
						<td><input type="text" name="m_yr3" value="<?php echo isset($info['m_yr3']) ? $info['m_yr3'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_model3" value="<?php echo isset($info['m_model3']) ? $info['m_model3'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="m_serial3" value="<?php echo isset($info['m_serial3']) ? $info['m_serial3'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>T</td>
						<td><input type="text" name="t_yr" value="<?php echo isset($info['t_yr']) ? $info['t_yr'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="t_model" value="<?php echo isset($info['t_model']) ? $info['t_model'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="t_serial" value="<?php echo isset($info['t_serial']) ? $info['t_serial'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				<div class="row" style="float: left; width: 135%; margin: 25px 0px -2px;">
					<div class="form-field" style="float: left; width: 61%;">
						<label><b>Total Allowance</b></label>
						<span style="border: 1px solid #000; display: inline-block; width: 18%;"> $ <input type="text" id="total_allowance" name="total_allowance" value="<?php echo isset($info['total_allowance']) ? $info['total_allowance'] : ''; ?>" style="width: 75%; border-bottom: 0px;"></span>

						<label>TRADE IN DEBT TO BE PAID BY</label>
					</div>

					<div class="form-field" style="float: left; width: 28%;">
						<span style="font-size: 14px;"><input type="checkbox" name="dealer_checkbox" <?php echo ($info['dealer_checkbox'] == "dealer") ? "checked" : ""; ?> value="dealer"> DEALER</span>
						<span style="font-size: 14px;"><input type="checkbox" name="customer_checkbox" <?php echo ($info['customer_checkbox'] == "customer") ? "checked" : ""; ?> value="customer"> CUSTOMER</span>
					</div>
				</div>

			</div>
			
			<div class="right" style="float: right; width: 48%; box-sizing: border-box;    margin-top: 18px;">
				<table class="no-border" cellpadding="0" cellspacing="0" style="border: 1px solid #000;">
					<tr>
						<td colspan="3"><h3 style="float: left; width: 100%; margin: 0; font-size: 15px; margin: 3px 0 3px 0; text-align: center;">Major Unit Sales Tax Breakdown</h3></td>
						<td colspan="2"><span style="margin: 0 10px; font-size: 14px;"><input type="checkbox" id="out_check" class="price_value" name="state_checkbox" <?php echo ($info['state_checkbox'] == "out") ? "checked" : ""; ?> value="dealer">Out of State</span></td>
					</tr>
					<tr>
						<td style="width: 25%; text-align: right;">Sales of Alabama</td>
						<td style="width: 10%;">@</td>
						<td style="width: 20%;"><input type="text" id="sales_alabama" class="price_value" name="sales_alabama" value="<?php echo isset($info['sales_alabama']) ? $info['sales_alabama'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">%</td>
						<td style="width: 16%;">=</td>
						<td style="width: 25%;">$<input type="text" name="sales_price" class="price_value" id="sales_price" value="<?php echo isset($info['sales_price']) ? $info['sales_price'] : ''; ?>" style="width: 90%; border-bottom: 1px solid #000;"></td>
					</tr>
					<tr>
						<td style="width: 25%; text-align: right;">Baldwin Country</td>
						<td style="width: 10%;">@</td>
						<td style="width: 20%;"><input type="text" id="baidwin_pro" class="price_value" name="baidwin_pro" value="<?php echo isset($info['baidwin_pro']) ? $info['baidwin_pro'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">%</td>
						<td style="width: 16%;">=</td>
						<td style="width: 25%;">$<input type="text" name="baidwin_country" id="baidwin_country" class="price_value" value="<?php echo isset($info['baidwin_price']) ? $info['baidwin_price'] : ''; ?>" style="width: 90%; border-bottom: 1px solid #000;"></td>
					</tr>
					<tr>
						<td style="width: 29%; text-align: right;">City of Gulf Shores</td>
						<td style="width: 10%;">@</td>
						<td style="width: 20%;"><input type="text" name="city_gulf" id="city_gulf" class="price_value" value="<?php echo isset($info['city_gulf']) ? $info['city_gulf'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">%</td>
						<td style="width: 16%;">=</td>
						<td style="width: 25%;">$<input type="text" name="city_price" id="city_price" class="price_value" value="<?php echo isset($info['city_price']) ? $info['city_price'] : ''; ?>" style="width: 90%; border-bottom: 1px solid #000;"></td>
					</tr>
				</table>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<p>Purchasers certify that the matter printed on the back hereof has been read and agreed to as part of this agreement the same as though it were printed above the signatures; that buyers are of statutory age or older; or have been legally emancipated; that the within described merchandise, the optional equipment, and accessories thereon and insurance if include, has been voluntarily purchased. The property being traded in is free from all encumbrances whatsoever, except as noted herein. Purchaser agrees each paragraph and provision of this contract, on both front and back. Is severable; If one portion thereof is invalid, the remaining portion shall, nevertheless, continue in full force and effect.</p>
			</div>
		</div>
		<div class="row" style="width: 100%; margin: 3px 0 30px; float: left; border: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="form-field" style="width: 100%; border-bottom: 1px solid #000; box-sizing: border-box; padding: 5px; background-color: lightgrey;">
					<span style="font-size: 14px;"><input type="checkbox" name="box_checkbox" <?php echo ($info['box_checkbox'] == "check") ? "checked" : ""; ?> value="check"> When this box is checked, I understand that the unit I am buying from you described above is being sold to me "As Is" and I accept the entire risk as to the quality and performance of this unit and that I did use my own judgement and inspection</span>
					<span style="margin-left: 3%;">
						<label>X</label>
						<input type="text" name="box_x" value="<?php echo isset($info['box_x']) ? $info['box_x'] : ''; ?>" style="width: 48%; background-color: lightgrey;">
					</span>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 0; box-sizing: border-box; padding: 3px 5px;">
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0 2px; font-size: 13px;">
						X<input type="text" name="dealer_x" value="<?php echo isset($info['dealer_x']) ? $info['dealer_x'] : ''; ?>" style="width: 88%;">Dealer
					</div>
					<p style="font-size: 8px; text-align: center; margin; 0;">Not Valid Unless Signed and Accepted by an Office of the Company <br> or Designated Representative.</p>
				</div>
			</div>
			<div class="right" style="float: right; width: 48%; box-sizing: border-box; padding: 5px 0px;">
				<p style="font-size: 12px;">I, OR WE, HEREBY ACKNOWLEDGE RECEIPT OF A COPY OF THIS ORDER THAT <br> I, OR WE, HAVE READ THE BACK OF THIS AGREEMENT. 1, OR WE, ALSO AGREE THAT THE BALANCE WILL BE PAID BY CASH, BANK DRAFT, CERTIFIED CHECK, OR BY THE EXECUTION OF A RETAIL INSTALLMENT CONTRACT, OR A SECURITY AGREEMENT AND ITS ACCEPTANCE BY A REFINANCING AGENCY</p>
				
				<div class="form-field" style="float: left; width: 100%; margin: 8px 0 4px; font-size: 13px;">
					SIGNED X <input type="text" name="signed1_x" value="<?php echo isset($info['signed1_x']) ? $info['signed1_x'] : ''; ?>" style="width: 66%;"> PURCHASER
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0 0px; font-size: 13px;">
					SIGNED X <input type="text" name="signed2_x" value="<?php echo isset($info['signed2_x']) ? $info['signed2_x'] : ''; ?>" style="width: 66%;"> PURCHASER
				</div>
			</div>
		</div>

		<div class="row second-page" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; font-size: 18px;">ADDITIONAL TERMS AND CONDITIONS</h2>
			<p style="margin: 0px 0px 15px;">It is further understood and agreed:</p>
			<p style="margin: 0px 0px 5px;">The order on the reverse side hereof is subject to the following terms and conditions, all of which have been mutually agreed upon:</p>
			<P style="margin: 0px 0px 5px;">It is mutually understood that this agreement is subject to necessary corrections, and adjustments concerning changes in net payoff on trade into be made at time of settlement.</P>
			<p style="margin: 0px 0px 15px;">Title to said equipment shall remain in the Seller until the agreed purchase price therefore is paid in full thereupon title to the within described unit passes to the buyer as of the date of payment even though the actual physical delivery may not be made until a later date.</p>
			<p style="font-weight: 600; margin: 0px 0px 15px;">1 . In the event the transaction referred to in this order is not a cash transaction, the purchase herein before, or at the time of delivery of the boat or vessel ordered, and in accordance with the terms and conditions of payment indicated on the face of this order, will either execute a retail installment contract, security agreement, or such other form of agreement as may be required by law. Title to said equipment shall remain in the Seller, until the agreed purchase price therefor is paid in full in cash, or a time payment contract has been executed and accepted by a bank or finance company; thereupon title passes to purchaser even though actual delivery may be made at a LATER date.</p>
			<p style="margin: 0px 0px 15px;">2. The purchaser agrees to deliver the title to the used boat traded in as partial payment along with the delivery of the said property to the dealer’s premises, and does warrant that such vessel to be in his property, free and clear of all liens and encumbrances except as otherwise noted on the face of this instrument. Purchaser warrants that all taxes of every kind levied against the used vessel traded in have been fully paid. Should any government agency levy or claim a tax lien or demand on or against such used property, Seller may, at his option pay the same and Purchaser agrees to reimburse the amount thereof immediately upon demand, or Seller may, at his option, add such amount to the sales contract covering the boat ordered herein with the same effect as though originally included therein.</p>
			<p style="margin: 0px 0px 15px;">3. If the used property traded in is registered or licensed in any place other than the state in which this order is written, Purchaser agrees to immediately secure registration for such vessel and to pay any and all expenses and registration fees incidental there to. Should Seller assume, or be put to, any expense connection with such registration, Purchaser will pay Seller the amount thereof on demand or Seller may add, at this option the same to the time payment contract covering the purchase ordered herein with the same effect as though originally included therein.</p>
			<p style="margin: 0px 0px 15px;">4. If the used boat is not delivered to the dealer at the time of original appraisal, and if later, on its delivery, it appears to the dealer there have been material changes made in the furnishing or accessories thereof, or in its general physical condition, the dealer should then have the right to make a reappraisal. This later appraisal value will then determine the allowance to be made for such used vehicle.</p>
			<p style="margin: 0px 0px 15px;">5. Upon failure or the refusal of purchaser to complete said purchase within 30 days of contract date, or an agreed extension thereof for any reason (other than cancellation on account of increase in price) the cash deposit may have such portion of it retained as will reimburse the dealer for expenses and other losses including attorney fees occasioned by purchaser’s failure to complete said purchase. In the event a used vessel has been taken in trade, the purchaser hereby authorizes the dealer to sell said property, at public or private sale, and to deduct from the proceeds thereof a sum equal to the expenses and losses incurred, or suffered, by the dealer by reason of purchaser’s failure to complete the transaction. Dealer shall have all the rights of a seller, upon breach of contract, under the Uniform Commercial Code 2-708, 2-710, 2-718, of the Uniform Sales Act (as applicable)</p>
			<p style="margin: 0px 0px 15px;">6. The manufacturer has the right to make any changes in the model, or the designs or any accessories and parts of any subsequent new vessel, at any time, without creating an obligation on the part of either the dealer or the manufacturer, to make corresponding changes in the boat described and covered by this order either before, or subsequent to, delivery of such equipment to the purchaser.</p>
			<p style="margin: 0px 0px 15px;">7. Dealer shall be not liable for delays caused by the manufacturer, accidents, strikes, fires or any other cause beyond his control.</p>
			<p style="font-weight: 600; margin: 0px 0px 15px;">8. WARRANTIES: THE DEALER SHALL GIVE OVER THE BUYER COPIES OF ANY AND ALL WRITTEN WARRANTIES COVERING THE WITHIN DESCRIBED UNIT, OR ANY APPLIANCE OR COMPONENT THERIN, WHICH HAVE BEEN PROVIDED BY THE MANUFACTURER OF THE UNIT OR APPLIANCE OR COMPONENT, RESPECTIVELY. IT IS UNDERSTOOD AND AGREED THAT EXCEPT AS MAY BE REQUIRED UNDER APPLICABLE STATE LAW THE DEALER MAKES NO WARRANTIES WHATSOEVER REGARDING THE UNIT OR ANY APPLIANCE OR COMPONENT CONTAINED THEREIN.</p>
			<p style="font-weight: 600; margin: 0px 0px 15px;">The purchaser further represents he has examined the product and found it is suitable for his particular needs, that it is acceptable quality, and that he did rely on his own judgement and inspection.</p>
			<p style="margin: 0px 0px 15px;">9. If a used vessel (herein called the “trade-in”) is to be taken by Dealer and a trade allowance giving therefor, the following provisions are made a part of his contract: On the date of this contract, the trade-in shall become the property of the dealer. Owner on the date of thereof, shall deliver to Dealer certificate of title or registry or award of number of the trade-in showing name on the sole owner, together with the proper bill of sale or other instrument of transfer sufficient to transfer title to dealer. Owner warrants that the trade-in is in his property, that he has the right to transfer the same to Dealer and that there are no liens or encumbrances against the same except as noted on the face thereof. Owner warrants that the trade-in is seaworthy, that it and its appurtenances are in good sound running condition and that the engine block, manifold and cylinder head are each free of cracks or defects. If Dealer finds within 60 days after delivery of the trade-in to it that the trade-in or its appurtenances are not in acceptable condition, then Dealer may, as its option, cancel this contract or make such repairs or replacements as are necessary to place it in a saleable condition and deduct the cost of thereof from the trade-in allowance.</p>
			<p style="margin: 0px 0px 5px;">10. All brokered and used boats are sold “as is” and purchaser acknowledges that he has examined the used boat and it is satisfied with its condition and that the optional equipment purchased with it is on the boat and in good working order.</p>
			<p style="margin: 0px 0px 15px;">Document Fee: This fee includes complete cosmetic detailing materials, administrative services, notary services, courier services, and fuel. This charge represents costs and profit to the seller/dealer for item such as inspecting, cleaning, and adjusting new and used units related to the sale.</p>
			<p style="font-weight: 600; margin: 0px 0px 15px;">THIS AGREEMENT CONTAINS THE ENTIRE UNDERSTANDING BETWEEN US AND NO OTHER PEPRESENTATION OR INDUCEMENT, VERBAL OR WRITTEN, HAS BEEN MADE WHICH IS NOT SET FORTH HERE IN.</p>
				
		</div>
		<div class="row paradise_form3" style="float: left; width: 97%; margin: 0;margin-top: 50px;">
			<div class="left" style="float: left; width: 55%; margin: 0;">
				<table class="detail-form" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="width: 15%;">&nbsp;</td>
						<td style="width: 45%; border-top: 1px solid #000;text-align: center;">UNIT RETAIL</td>
						<td style="width: 10%; border-top: 1px solid #000;text-align: center;">%</td>
						<td style="width: 30%; border-top: 1px solid #000;text-align: center;">UNIT COST</td>
					</tr>
					<tr>
						<td>BOAT</td>
						<td><input type="text" name="boat_retail" value="<?php echo isset($info['boat_retail']) ? $info['boat_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="boat_pro" value="<?php echo isset($info['boat_pro']) ? $info['boat_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="boat_cost" value="<?php echo isset($info['boat_cost']) ? $info['boat_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Motor 1</td>
						<td><input type="text" name="motor1_retail" value="<?php echo isset($info['motor1_retail']) ? $info['motor1_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor1_pro" value="<?php echo isset($info['motor1_pro']) ? $info['motor1_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor1_cost" value="<?php echo isset($info['motor1_cost']) ? $info['motor1_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>
						
					<tr>
						<td>Motor 2</td>
						<td><input type="text" name="motor2_retail" value="<?php echo isset($info['motor2_retail']) ? $info['motor2_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor2_pro" value="<?php echo isset($info['motor2_pro']) ? $info['motor2_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor2_cost" value="<?php echo isset($info['motor2_cost']) ? $info['motor2_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td>Motor 3</td>
						<td><input type="text" name="motor3_retail" value="<?php echo isset($info['motor3_retail']) ? $info['motor3_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor3_pro" value="<?php echo isset($info['motor3_pro']) ? $info['motor3_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="motor3_cost" value="<?php echo isset($info['motor3_cost']) ? $info['motor3_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Trailer</td>
						<td><input type="text" name="trailer_retail" value="<?php echo isset($info['trailer_retail']) ? $info['trailer_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trailer_pro" value="<?php echo isset($info['trailer_pro']) ? $info['trailer_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trailer_cost" value="<?php echo isset($info['trailer_cost']) ? $info['trailer_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>TOTAL</td>
						<td><input type="text" name="total_retail" value="<?php echo isset($info['total_retail']) ? $info['total_retail'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="total_pro" value="<?php echo isset($info['total_pro']) ? $info['total_pro'] : ''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="total_cost" value="<?php echo isset($info['total_cost']) ? $info['total_cost'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="margin: 20px 0; float: right;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">FORMS CHECKLIST</td>
						<td style="width: 25%; border-top: 1px solid #000;">DATE</td>
					</tr>
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="pmc" value="<?php echo isset($info['pmc']) ? $info['pmc'] : ''; ?>" style="width: 100%;"></td>
						<td>PMC PDI</td>
						<td><input type="text" name="pmc_date" value="<?php echo isset($info['pmc_date']) ? $info['pmc_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="motor" value="<?php echo isset($info['motor']) ? $info['motor'] : ''; ?>" style="width: 100%;"></td>
						<td>MOTOR PDI</td>
						<td><input type="text" name="motor_date" value="<?php echo isset($info['motor_date']) ? $info['motor_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="boat" value="<?php echo isset($info['boat']) ? $info['boat'] : ''; ?>" style="width: 100%;"></td>
						<td>BOAT PDI</td>
						<td><input type="text" name="boat_date" value="<?php echo isset($info['boat_date']) ? $info['boat_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>" style="width: 100%;"></td>
						<td>SALES TAX DELIVERY FORM</td>
						<td><input type="text" name="sales_date" value="<?php echo isset($info['sales_date']) ? $info['sales_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="green" value="<?php echo isset($info['green']) ? $info['green'] : ''; ?>" style="width: 100%;"></td>
						<td>GREEN SHEET</td>
						<td><input type="text" name="green_date" value="<?php echo isset($info['green_date']) ? $info['green_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="sales_recap" value="<?php echo isset($info['sales_recap']) ? $info['sales_recap'] : ''; ?>" style="width: 100%;"></td>
						<td>SALES RECAP</td>
						<td><input type="text" name="recap_date" value="<?php echo isset($info['recap_date']) ? $info['recap_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td colspan="2" style="width: 75%; border-left: 1px solid #000;">
							<label style="font-weight: normal;">NOTES:</label>
							<input type="text" name="forms_note" value="<?php echo isset($info['forms_note']) ? $info['forms_note'] : ''; ?>" style="width: 70%;">
						</td>
						<td style="width: 25%;"><input type="text" name="forms_date" value="<?php echo isset($info['forms_date']) ? $info['forms_date'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
				</table>
				
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="margin: 20px 0; float: right;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">MSO TO CUSTOMER</td>
						<td style="width: 25%; border-top: 1px solid #000;"><input type="text" name="mso_customer" value="<?php echo isset($info['mso_customer']) ? $info['mso_customer'] : ''; ?>" style="width: 100%;"></td>
					</tr>

					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mso_boat" value="<?php echo isset($info['mso_boat']) ? $info['mso_boat'] : ''; ?>" style="width: 100%;"></td>
						<td>BOAT</td>
						<td><input type="text" name="boat_dep" value="<?php echo isset($info['boat_dep']) ? $info['boat_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mso_motor" value="<?php echo isset($info['mso_motor']) ? $info['mso_motor'] : ''; ?>" style="width: 100%;"></td>
						<td>MOTOR(S)</td>
						<td><input type="text" name="motor_dep" value="<?php echo isset($info['motor_dep']) ? $info['motor_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mso_trailer" value="<?php echo isset($info['mso_trailer']) ? $info['mso_trailer'] : ''; ?>" style="width: 100%;"></td>
						<td>TRAILER</td>
						<td><input type="text" name="trailer_dep" value="<?php echo isset($info['trailer_dep']) ? $info['trailer_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td colspan="2" style="width: 75%; border-left: 1px solid #000;">
							<label style="font-weight: normal;">NOTES:</label>
							<input type="text" name="mso_note" value="<?php echo isset($info['mso_note']) ? $info['mso_note'] : ''; ?>" style="width: 70%;">
						</td>
						<td style="width: 25%;"><input type="text" name="note_dep" value="<?php echo isset($info['note_dep']) ? $info['note_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="margin: 20px 0; float: right;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">WARRANTY REGISTRATION</td>
						<td style="width: 25%; border-top: 1px solid #000;"><input type="text" name="warranty_regist" value="<?php echo isset($info['warranty_regist']) ? $info['warranty_regist'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="warranty_boat" value="<?php echo isset($info['warranty_boat']) ? $info['warranty_boat'] : ''; ?>" style="width: 100%;"></td>
						<td>BOAT</td>
						<td><input type="text" name="warranty_boat_dep" value="<?php echo isset($info['warranty_boat_dep']) ? $info['warranty_boat_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="warranty_motor" value="<?php echo isset($info['warranty_motor']) ? $info['warranty_motor'] : ''; ?>" style="width: 100%;"></td>
						<td>MOTOR(S)</td>
						<td><input type="text" name="warranty_motor_dep" value="<?php echo isset($info['warranty_motor_dep']) ? $info['warranty_motor_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="warranty_trailer" value="<?php echo isset($info['warranty_trailer']) ? $info['warranty_trailer'] : ''; ?>" style="width: 100%;"></td>
						<td>TRAILER</td>
						<td><input type="text" name="warranty_trailer_dep" value="<?php echo isset($info['warranty_trailer_dep']) ? $info['warranty_trailer_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td colspan="2" style="width: 75%; border-left: 1px solid #000;">
							<label style="font-weight: normal;">NOTES:</label>
							<input type="text" name="warranty_note" value="<?php echo isset($info['warranty_note']) ? $info['warranty_note'] : ''; ?>" style="width: 70%;">
						</td>
						<td style="width: 25%;"><input type="text" name="warranty_note_dep" value="<?php echo isset($info['warranty_note_dep']) ? $info['warranty_note_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right-side" style="width: 45%; float: right;">
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="float: right;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">MISCELLANEOUS</td>
						<td style="width: 25%; border-right: 0px;"><input type="text" name="miscellaneous" value="<?php echo isset($info['miscellaneous']) ? $info['miscellaneous'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_ext" value="<?php echo isset($info['mis_ext']) ? $info['mis_ext'] : ''; ?>" style="width: 100%;"></td>
						<td>EXT WARRANTY</td>
						<td><input type="text" name="mis_ext_dep" value="<?php echo isset($info['mis_ext_dep']) ? $info['mis_ext_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_plan" value="<?php echo isset($info['mis_plan']) ? $info['mis_plan'] : ''; ?>" style="width: 100%;"></td>
						<td>PLATINUM</td>
						<td><input type="text" name="mis_plan_dep" value="<?php echo isset($info['mis_plan_dep']) ? $info['mis_plan_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_register" value="<?php echo isset($info['mis_register']) ? $info['mis_register'] : ''; ?>" style="width: 100%;"></td>
						<td>REGISTERED</td> 
						<td><input type="text" name="mis_register_dep" value="<?php echo isset($info['mis_register_dep']) ? $info['mis_register_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_regist" value="<?php echo isset($info['mis_regist']) ? $info['mis_regist'] : ''; ?>" style="width: 100%;"></td>
						<td>REGISTRATION #'S</td>
						<td><input type="text" name="mis_regist_dep" value="<?php echo isset($info['mis_register_dep']) ? $info['mis_register_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_finance" value="<?php echo isset($info['mis_finance']) ? $info['mis_finance'] : ''; ?>" style="width: 100%;"></td>
						<td>PMC FINANCE</td>
						<td><input type="text" name="mis_finance_dep" value="<?php echo isset($info['mis_finance_dep']) ? $info['mis_finance_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_source" value="<?php echo isset($info['mis_source']) ? $info['mis_source'] : ''; ?>" style="width: 100%;"></td>
						<td>PMC FINANCE SOURCE</td>
						<td><input type="text" name="mis_source_dep" value="<?php echo isset($info['mis_source_dep']) ? $info['mis_source_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="mis_mfg" value="<?php echo isset($info['mis_mfg']) ? $info['mis_mfg'] : ''; ?>" style="width: 100%;"></td>
						<td>MFG REB</td>
						<td><input type="text" name="mis_mfg_dep" value="<?php echo isset($info['mis_mfg_dep']) ? $info['mis_mfg_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="float: right; margin: 40px 0;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">BROKERAGE INFO</td>
						<td style="width: 25%;border-right: 0px;"><input type="text" name="broker_info" value="<?php echo isset($info['broker_info']) ? $info['broker_info'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_seller" value="<?php echo isset($info['broker_seller']) ? $info['broker_seller'] : ''; ?>" style="width: 100%;"></td>
						<td>SELLER NAME</td>
						<td><input type="text" name="broker_seller_dep" value="<?php echo isset($info['broker_seller_dep']) ? $info['broker_seller_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_sold" value="<?php echo isset($info['broker_sold']) ? $info['broker_sold'] : ''; ?>" style="width: 100%;"></td>
						<td>SOLD AMOUNT</td>
						<td>$ <input type="text" name="broker_sold_dep" value="<?php echo isset($info['broker_sold_dep']) ? $info['broker_sold_dep'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_less" value="<?php echo isset($info['broker_less']) ? $info['broker_less'] : ''; ?>" style="width: 100%;"></td>
						<td>LESS COMM AMOUNT</td>
						<td>$ <input type="text" name="broker_less_amt" value="<?php echo isset($info['broker_less_amt']) ? $info['broker_less_amt'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_charge" value="<?php echo isset($info['broker_charge']) ? $info['broker_charge'] : ''; ?>" style="width: 100%;"></td>
						<td>LESS RO CHARGES</td>
						<td>$ <input type="text" name="broker_charge_dep" value="<?php echo isset($info['broker_charge_dep']) ? $info['broker_charge_dep'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_seller" value="<?php echo isset($info['broker_seller']) ? $info['broker_seller'] : ''; ?>" style="width: 100%;"></td>
						<td>NET TO SELLER</td>
						<td>$ <input type="text" name="broker_seller_dep" value="<?php echo isset($info['broker_seller_dep']) ? $info['broker_seller_dep'] : ''; ?>" style="width: 80%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_check" value="<?php echo isset($info['broker_check']) ? $info['broker_check'] : ''; ?>" style="width: 100%;"></td>
						<td>CHECK #</td>
						<td><input type="text" name="broker_check_dep" value="<?php echo isset($info['broker_check_dep']) ? $info['broker_check_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_sent" value="<?php echo isset($info['broker_sent']) ? $info['broker_sent'] : ''; ?>" style="width: 100%;"></td>
						<td>DATE SENT</td>
						<td><input type="text" name="broker_sent_dep" value="<?php echo isset($info['broker_sent_dep']) ? $info['broker_sent_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="broker_method" value="<?php echo isset($info['broker_method']) ? $info['broker_method'] : ''; ?>" style="width: 100%;"></td>
						<td>METHOD SENT</td>
						<td><input type="text" name="broker_method_dep" value="<?php echo isset($info['broker_method_dep']) ? $info['broker_method_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td colspan="2" style="width: 75%; border-left: 1px solid #000;">
							<label style="font-weight: normal;">NOTES:</label>
							<input type="text" name="broker_note" value="<?php echo isset($info['broker_note']) ? $info['broker_note'] : ''; ?>" style="width: 70%;">
						</td>
						<td style="width: 25%;"><input type="text" name="broker_note_dep" value="<?php echo isset($info['broker_note_dep']) ? $info['broker_note_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
				
				<table class="detail-form1" cellpadding="0" cellspacing="0" width="85%" style="float: right; margin: 26px 0;">
					<tr>
						<td style="width: 10%; border-bottom: 1px solid #000;">&nbsp;</td>
						<td style="width: 65%; border-top: 1px solid #000;">TRADE PAYOFF INFO</td>
						<td style="width: 25%;border-right: 0px;"><input type="text" name="payoff_info" value="<?php echo isset($info['payoff_info']) ? $info['payoff_info'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount']) ? $info['payoff_amount'] : ''; ?>" style="width: 100%;"></td>
						<td>AMOUNT</td>
						<td><input type="text" name="payoff_amount_dep" value="<?php echo isset($info['payoff_amount_dep']) ? $info['payoff_amount_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="payoff_bank" value="<?php echo isset($info['payoff_bank']) ? $info['payoff_bank'] : ''; ?>" style="width: 100%;"></td>
						<td>BANK</td>
						<td><input type="text" name="payoff_bank_dep" value="<?php echo isset($info['payoff_bank_dep']) ? $info['payoff_bank_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="payoff_check" value="<?php echo isset($info['payoff_check']) ? $info['payoff_check'] : ''; ?>" style="width: 100%;"></td>
						<td>CHECK #</td>
						<td><input type="text" name="payoff_check_dep" value="<?php echo isset($info['payoff_check_dep']) ? $info['payoff_check_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="payoff_sent" value="<?php echo isset($info['payoff_sent']) ? $info['payoff_sent'] : ''; ?>" style="width: 100%;"></td>
						<td>DATE SENT</td>
						<td><input type="text" name="payoff_sent_dep" value="<?php echo isset($info['payoff_sent_dep']) ? $info['payoff_sent_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-left: 1px solid #000;"><input type="text" name="payoff_method" value="<?php echo isset($info['payoff_method']) ? $info['payoff_method'] : ''; ?>" style="width: 100%;"></td>
						<td>METHOD SENT</td>
						<td><input type="text" name="payoff_method_dep" value="<?php echo isset($info['payoff_method_dep']) ? $info['payoff_method_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
		
					<tr>
						<td colspan="2" style="width: 75%; border-left: 1px solid #000;">
							<label style="font-weight: normal;">NOTES:</label>
							<input type="text" name="payoff_note" value="<?php echo isset($info['payoff_note']) ? $info['payoff_note'] : ''; ?>" style="width: 70%;">
						</td>
						<td style="width: 25%;"><input type="text" name="payoff_note_dep" value="<?php echo isset($info['payoff_note_dep']) ? $info['payoff_note_dep'] : ''; ?>" style="width: 100%;"></td>
					</tr>
				</table>	
			</div>
			<!-- rightside end -->
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
	




	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis();
	});
	
	$("#btn_back").click(function(){
		
	});

	var email = $('#email').val();
	var res = email.split("");
	for (var i = 0; i <= 26; i++) {
		$("#email" + i).val(res[i]);
	}

	$(".price_value").on('change keyup paste',function(){
		calculatePrice();
	});

	function calculatePrice(){
		var selling_price0 = isNaN(parseFloat( $("#selling_price0").val()))?0.00:parseFloat( $("#selling_price0").val());
		var selling_price1 = isNaN(parseFloat( $("#selling_price1").val()))?0.00:parseFloat( $("#selling_price1").val());
		var selling_price2 = isNaN(parseFloat( $("#selling_price2").val()))?0.00:parseFloat( $("#selling_price2").val());
		var selling_price3 = isNaN(parseFloat( $("#selling_price3").val()))?0.00:parseFloat( $("#selling_price3").val());
		var selling_price4 = isNaN(parseFloat( $("#selling_price4").val()))?0.00:parseFloat( $("#selling_price4").val());
		var total_selling_price = selling_price0 + selling_price1 + selling_price2 + selling_price3 + selling_price4;
		$("#selling_price").val(total_selling_price.toFixed(2));

		var freight = isNaN(parseFloat( $("#freight").val()))?0.00:parseFloat( $("#freight").val());
		var dealer_prep = isNaN(parseFloat( $("#dealer_prep").val()))?0.00:parseFloat( $("#dealer_prep").val());
		var trade_allowance = isNaN(parseFloat( $("#trade_allowance").val()))?0.00:parseFloat( $("#trade_allowance").val());
		$("#total_allowance").val(trade_allowance.toFixed(2));
		var unit_price = total_selling_price + freight + dealer_prep - trade_allowance;
		$("#unit_price").val(unit_price.toFixed(2));

		var regist_fee = isNaN(parseFloat( $("#regist_fee").val()))?0.00:parseFloat( $("#regist_fee").val());
		var admin_fee = isNaN(parseFloat( $("#admin_fee").val()))?0.00:parseFloat( $("#admin_fee").val());
		var total_price = unit_price + regist_fee + admin_fee;
		$("#total_price").val(total_price.toFixed(2));

		var sales_alabama = isNaN(parseFloat( $("#sales_alabama").val()))?0.00:parseFloat( $("#sales_alabama").val());
		var sales_price = (sales_alabama * total_price)/100;
		$("#sales_price").val(sales_price.toFixed(2));

		var baidwin_pro = isNaN(parseFloat( $("#baidwin_pro").val()))?0.00:parseFloat( $("#baidwin_pro").val());
		var baidwin_country = (baidwin_pro * total_price)/100;
		$("#baidwin_country").val(baidwin_country.toFixed(2));

		var city_gulf = isNaN(parseFloat( $("#city_gulf").val()))?0.00:parseFloat( $("#city_gulf").val());
		var city_price = (city_gulf * total_price)/100;
		$("#city_price").val(city_price.toFixed(2));

		var sales_tax1 = sales_price + baidwin_country + city_price;
		$("#sales_tax1").val(sales_tax1.toFixed(2));

		var total_pro = isNaN(parseFloat( $("#total_pro").val()))?0.00:parseFloat( $("#total_pro").val());
		var total_value = (total_pro * total_price)/100;
		$("#total_value").val(total_value.toFixed(2));

		var added_option = isNaN(parseFloat( $("#added_option").val()))?0.00:parseFloat( $("#added_option").val());
		var total_package = total_price + added_option;
		$("#total_package").val(total_package.toFixed(2));

		var sales_tax2 = added_option*10/100;
		$("#sales_tax2").val(sales_tax2.toFixed(2));

		if ($('#out_check').is(':checked')) {
			var sales_tax1 = 0;
			$("#sales_tax1").val(sales_tax1.toFixed(2));
			var sales_tax2 = 0;
			$("#sales_tax2").val(sales_tax2.toFixed(2));
		}

		var extended_warranty = isNaN(parseFloat( $("#extended_warranty").val()))?0.00:parseFloat( $("#extended_warranty").val());
		var payment = isNaN(parseFloat( $("#payment").val()))?0.00:parseFloat( $("#payment").val());
		var cash_price = total_package + sales_tax1 + sales_tax2 + extended_warranty + payment;
		$("#cash_price").val(cash_price.toFixed(2));

		var down_pay1 = isNaN(parseFloat( $("#down_pay1").val()))?0.00:parseFloat( $("#down_pay1").val());
		var down_pay2 = isNaN(parseFloat( $("#down_pay2").val()))?0.00:parseFloat( $("#down_pay2").val());
		var amount = cash_price - down_pay1 - down_pay2;
		$("#amount").val(amount.toFixed(2));
		
	}



	function dealer_total() {
        
          var dealer_add2 = isNaN(parseFloat( $("#dealer_add2").val()))?0.00:parseFloat( $("#dealer_add2").val());
          var dealer_add4 = isNaN(parseFloat( $("#dealer_add4").val()))?0.00:parseFloat( $("#dealer_add4").val());
          var dealer_add6 = isNaN(parseFloat( $("#dealer_add6").val()))?0.00:parseFloat( $("#dealer_add6").val());
          var dealer_add8 = isNaN(parseFloat( $("#dealer_add8").val()))?0.00:parseFloat( $("#dealer_add8").val());
          var dealer_add10 = isNaN(parseFloat( $("#dealer_add10").val()))?0.00:parseFloat( $("#dealer_add10").val());
          var dealer_add12 = isNaN(parseFloat( $("#dealer_add12").val()))?0.00:parseFloat( $("#dealer_add12").val());
          var dealer = dealer_add2 + dealer_add4 + dealer_add6 + dealer_add8 + dealer_add10 + dealer_add12;
        $("#added_option").val(dealer.toFixed(2));
        $(".price_value").trigger('change');
     }

	 $(".dealer").on('change keyup paste',function(){
        dealer_total();
     });

     function factory_total() {
        
          var factory_add2 = isNaN(parseFloat( $("#factory_add2").val()))?0.00:parseFloat( $("#factory_add2").val());
          var factory_add4 = isNaN(parseFloat( $("#factory_add4").val()))?0.00:parseFloat( $("#factory_add4").val());
          var factory_add6 = isNaN(parseFloat( $("#factory_add6").val()))?0.00:parseFloat( $("#factory_add6").val());
          var factory_add8 = isNaN(parseFloat( $("#factory_add8").val()))?0.00:parseFloat( $("#factory_add8").val());
          var factory = factory_add2 + factory_add4 + factory_add6 + factory_add8;
        $("#factory_option").val(factory.toFixed(2));
     }

	 $(".factory").on('change keyup paste',function(){
        factory_total();
     });

     function customer_total() {
        
          var customer_add1 = isNaN(parseFloat( $("#customer_add1").val()))?0.00:parseFloat( $("#customer_add1").val());
          var customer_add2 = isNaN(parseFloat( $("#customer_add2").val()))?0.00:parseFloat( $("#customer_add2").val());
          var customer_add3 = isNaN(parseFloat( $("#customer_add3").val()))?0.00:parseFloat( $("#customer_add3").val());
          var customer_add4 = isNaN(parseFloat( $("#customer_add4").val()))?0.00:parseFloat( $("#customer_add4").val());
          var customer = customer_add1 + customer_add2 + customer_add3 + customer_add4;
        $("#customer_option").val(customer.toFixed(2));
     }

	 $(".customer").on('change keyup paste',function(){
        customer_total();
     });
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
