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
	<div id="worksheet_container" style="width: 1000px; margin: 0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
	@media print { 
	.dontprint{display: none;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div  style="">
		
		<!-- upper part start  -->
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="logo" style="float: left; width: 30%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/timmsharley-logo.png'); ?>" alt="" style="width: 100%;">
				</div>
				<h2 style="float: right; font-size: 36px; margin: 15px 0;">WE OWE</h2>
			</div>
			
			<div class="top" style="float: left; width: 100%;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Name</label>
					<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['first_name']; ?>" style="width: 100%; width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">STK. NO.</label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">NEW/USED</label>
					<input type="text" name="condition" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;  border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Address</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>"  style="width: 83%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Year</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">Make</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;  border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 42%;">
					<label style="text-transform: uppercase;">City</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 13%;">
					<label style="text-transform: uppercase;">State</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Zip</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">Model</label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Phone</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%; width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Vin No.</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 66%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 70%;">
					<label style="text-transform: uppercase; padding-left: 20%;">SalesPerson</label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 100%; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label style="text-transform: uppercase;">Del. Date</label>
					<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" style="width: 50%;">
				</div>
			</div>
			</div>
			
			
			<table cellspacing="0" cellpadding="0" style=" float: left; margin-top: 30px; width; 100%; border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;">
				<tr>
					<th style="width: 10%;">QTY</th>
					<th style="width: 50%;">NAME OF ITEM</th>
					<th style="width: 20%;">PART</th>
					<th style="width: 20%;">LABOUR</th>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_1" value="<?php echo isset($info['item_qty_1'])?$info['item_qty_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_1" value="<?php echo isset($info['item_name_1'])?$info['item_name_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_1" value="<?php echo isset($info['item_part_1'])?$info['item_part_1']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_1" value="<?php echo isset($info['item_labour_1'])?$info['item_labour_1']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_2" value="<?php echo isset($info['item_qty_2'])?$info['item_qty_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_2" value="<?php echo isset($info['item_name_2'])?$info['item_name_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_2" value="<?php echo isset($info['item_part_2'])?$info['item_part_2']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_2" value="<?php echo isset($info['item_labour_2'])?$info['item_labour_2']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_3" value="<?php echo isset($info['item_qty_3'])?$info['item_qty_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_3" value="<?php echo isset($info['item_name_3'])?$info['item_name_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_3" value="<?php echo isset($info['item_part_3'])?$info['item_part_3']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_3" value="<?php echo isset($info['item_labour_3'])?$info['item_labour_3']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_4" value="<?php echo isset($info['item_qty_4'])?$info['item_qty_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_4" value="<?php echo isset($info['item_name_4'])?$info['item_name_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_4" value="<?php echo isset($info['item_part_4'])?$info['item_part_4']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_4" value="<?php echo isset($info['item_labour_4'])?$info['item_labour_4']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_5" value="<?php echo isset($info['item_qty_5'])?$info['item_qty_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_5" value="<?php echo isset($info['item_name_5'])?$info['item_name_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_5" value="<?php echo isset($info['item_part_5'])?$info['item_part_5']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_5" value="<?php echo isset($info['item_labour_5'])?$info['item_labour_5']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_6" value="<?php echo isset($info['item_qty_6'])?$info['item_qty_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_6" value="<?php echo isset($info['item_name_6'])?$info['item_name_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_6" value="<?php echo isset($info['item_part_6'])?$info['item_part_6']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_6" value="<?php echo isset($info['item_labour_6'])?$info['item_labour_6']:''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
			
			<div class="row" style="float; left; width; 100%;margin: 0 0px;">
				<p style="margin: 0; font-size; 13px;">I hereby accept this WE-OWE with the understanding that is valid for only (30) THIRTY DAYS</p>
				<p style="margin: 0;  font-size; 13px;">FROM THE DATE OF ISSUANCE, and that I must make an ADVANCE APPOINTMENT WITH THE</p>
				<p style="margin: 0;  font-size; 13px;">SERVICE DEPARTMENT before the above work can be performed.</p>
				<h2 style="margin: 0; ">(FOR APPOINTMENT CALL SERVICE DEPT.)</h2>
			</div>
			
			<div class="top" style="float: left; width: 100%;">
				<div class="form-field title" style="float: left; width: 48%; border-bottom: 1px solid #000; margin: 9px 0 0;">
					<label style="text-transform: uppercase; font-size; 14px;">Customer</label>
					<input type="text" name="customer" value="<?php echo isset($info['customer'])?$info['customer']:''; ?>" style="width: 70%;">
				</div>
				
				<div class="right-side" style="float: right; width: 48%;">
					<div class="forn-field" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 9px 0 0;">
						<label style="text-transform: uppercase; font-size; 14px;">Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%; text-align: center;">
					</div>
					<div class="forn-field"  style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 9px 0 0;">
						<label style="text-transform: uppercase; font-size; 14px;">Approved</label>
						<input type="text" name="approved1" value="<?php echo isset($info['approved1'])?$info['approved1']:''; ?>" style="width: 76%; text-align: center;">
					</div>
					<span style="padding-left: 30%; font-size: 14px;">MGR.</span>
				</div>
			</div>
			<!-- upper part end -->
			
			
			<!-- lower part start -->
				<div class="row" style="float: left; width: 100%; margin: 20px 0 0 0;">
				<div class="logo" style="float: left; width: 30%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/timmsharley-logo.png'); ?>" alt="" style="width: 100%;" />
				</div>
				<h2 style="float: right; font-size: 36px; margin: 15px 0;">WE OWE</h2>
			</div>
			
			<div class="top" style="float: left; width: 100%;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Name</label>
					<input type="text" name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>"  style="width: 100%; width: 87%;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">STK. NO.</label>
					<input type="text" name="stock_num2" value="<?php echo isset($info['stock_num2'])?$info['stock_num2']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">NEW/USED</label>
					<input type="text" name="condition2" value="<?php echo isset($info['condition2'])?$info['condition2']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;  border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Address</label>
					<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Year</label>
					<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">Make</label>
					<input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;  border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 42%;">
					<label style="text-transform: uppercase;">City</label>
					<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 13%;">
					<label style="text-transform: uppercase;">State</label>
					<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Zip</label>
					<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 66%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label style="text-transform: uppercase;">Model</label>
					<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 55%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 55%;">
					<label style="text-transform: uppercase;">Phone</label>
					<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 100%; width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label style="text-transform: uppercase;">Vin No.</label>
					<input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:''; ?>" style="width: 66%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 70%;">
					<label style="text-transform: uppercase; padding-left: 20%;">SalesPerson</label>
					<input type="text" name="sperson2" value="<?php echo isset($info['sperson2'])?$info['sperson2']:''; ?>" style="width: 100%; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label style="text-transform: uppercase;">Del. Date</label>
					<input type="text"  name="delivery_date2" value="<?php echo isset($info['delivery_date2'])?$info['delivery_date2']:''; ?>" style="width: 50%;">
				</div>
			</div>
			</div>
			
			
			<table cellspacing="0" cellpadding="0" style=" float: left; margin-top: 30px; width; 100%; border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;">
				<tr>
					<th style="width: 10%;">QTY</th>
					<th style="width: 50%;">NAME OF ITEM</th>
					<th style="width: 20%;">PART</th>
					<th style="width: 20%;">LABOUR</th>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_7" value="<?php echo isset($info['item_qty_7'])?$info['item_qty_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_7" value="<?php echo isset($info['item_name_7'])?$info['item_name_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_7" value="<?php echo isset($info['item_part_7'])?$info['item_part_7']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_7" value="<?php echo isset($info['item_labour_7'])?$info['item_labour_7']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_8" value="<?php echo isset($info['item_qty_8'])?$info['item_qty_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_8" value="<?php echo isset($info['item_name_8'])?$info['item_name_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_8" value="<?php echo isset($info['item_part_8'])?$info['item_part_8']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_8" value="<?php echo isset($info['item_labour_8'])?$info['item_labour_8']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_9" value="<?php echo isset($info['item_qty_9'])?$info['item_qty_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_9" value="<?php echo isset($info['item_name_9'])?$info['item_name_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_9" value="<?php echo isset($info['item_part_9'])?$info['item_part_9']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_9" value="<?php echo isset($info['item_labour_9'])?$info['item_labour_9']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_10" value="<?php echo isset($info['item_qty_10'])?$info['item_qty_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_10" value="<?php echo isset($info['item_name_10'])?$info['item_name_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_10" value="<?php echo isset($info['item_part_10'])?$info['item_part_10']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_10" value="<?php echo isset($info['item_labour_10'])?$info['item_labour_10']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="item_qty_11" value="<?php echo isset($info['item_qty_11'])?$info['item_qty_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_11" value="<?php echo isset($info['item_name_11'])?$info['item_name_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_11" value="<?php echo isset($info['item_part_11'])?$info['item_part_11']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_11" value="<?php echo isset($info['item_labour_11'])?$info['item_labour_11']:''; ?>" style="width: 100%;"></td>
				</tr>
			
				<tr>
					<td><input type="text" name="item_qty_12" value="<?php echo isset($info['item_qty_12'])?$info['item_qty_12']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_name_12" value="<?php echo isset($info['item_name_12'])?$info['item_name_12']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_part_12" value="<?php echo isset($info['item_part_12'])?$info['item_part_12']:''; ?>" style="width: 100%;"></td>
					<td><input type="text"  name="item_labour_12" value="<?php echo isset($info['item_labour_12'])?$info['item_labour_12']:''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
			
			<div style="float; left; width; 100%;">
				<p style="margin: 0; font-size; 13px;">I hereby accept this WE-OWE with the understanding that is valid for only (30) THIRTY DAYS</p>
				<p style="margin: 0;  font-size; 13px;">FROM THE DATE OF ISSUANCE, and that I must make an ADVANCE APPOINTMENT WITH THE</p>
				<p style="margin: 0;  font-size; 13px;">SERVICE DEPARTMENT before the above work can be performed.</p>
				<h2 style="margin: 0; ">(FOR APPOINTMENT CALL SERVICE DEPT.)</h2>
			</div>
			
			<div class="top" style="float: left; width: 100%;">
				<div class="form-field title" style="float: left; width: 48%; border-bottom: 1px solid #000; margin: 9px 0 0;">
					<label style="text-transform: uppercase; font-size; 14px;">Customer</label>
					<input type="text" name="field" style="width: 70%;">
				</div>
				
				<div class="right-side" style="float: right; width: 48%;">
					<div class="forn-field" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 9px 0 0;">
						<label style="text-transform: uppercase; font-size; 14px;">Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%; text-align: center;">
					</div>
					<div class="forn-field"  style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 9px 0 0;">
						<label style="text-transform: uppercase; font-size; 14px;">Approved</label>
						<input type="text" name="approved2" value="<?php echo isset($info['approved2'])?$info['approved2']:''; ?>" style="width: 76%; text-align: center;">
					</div>
					<span style="padding-left: 30%; font-size: 14px;">MGR.</span>
				</div>
			</div>
			<!-- lower part end -->
			
			
		
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
