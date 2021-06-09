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
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
			
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		  #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: 30px; box-sizing: border-box;}
	label{font-size: 16px;}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
		<div class="header" style="float: left; width: 100%; text-align: center; font-size: 17px;">
			<p style="margin: 2px 0;"><?php echo AuthComponent::user('dealer').' '.AuthComponent::user('d_address') ; ?> </p>
			<p style="margin: 2px 0;"><?php echo AuthComponent::user('d_city').' '.AuthComponent::user('d_state').', '.AuthComponent::user('d_zip') ; ?></p>
			<p style="margin: 2px 0;"><?php echo AuthComponent::user('d_phone') ?></p>
			<h3 style=" margin: 10px 0 0; font-weight: bold; font-size: 22px;">Dealer Worksheet</h3>
		</div>
		
		<div class="content" style="float: left;width: 100%; margin: 2px 0 0;">
			<div class="row" style="float: left; width: 100%;">
				<div class="form-field" style="float: left; width: 70%;">
					<input type="text" name="sperson" value="<?php echo isset($info["sperson_name"]) ? $info['sperson_name'] : $info['sperson'];?>" style="width: 100%;">
					<label style="display: block; text-align: center;">Sales Person</label>
				</div>
				<div class="form-field" style="float: right; width: 25%;">
					<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 100%; text-align: center;">
					<label style="display: block; text-align: center;">Date</label>
				</div>
			</div>
			
			<!-- box content start -->
			<div class="box" style="border: 1px solid #000; box-sizing: border-box; padding: 5px 15px 15px; float: left; width: 100%; margin: 2px 0;">
				<label style=" margin: 5px 0 0; text-align: center; display: block;">Customer Information</label>
				<div class="row" style="float: left; width: 100%; ">
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<input type="text" name="cust_name" value="<?php echo isset($info['first_name'])?$info['first_name'].' '.$info['last_name']:''; ?>" style="width: 100%; text-align: center;">
						<label style="display: block; text-align: center;">Name</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;text-align: center;">
						<label style="display: block; text-align: center;">Address</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 28%;">
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">City</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; margin: 0 13px;">
						<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">County</label>
					</div>
					<div class="form-field" style="float: left; width: 18%;">
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">State</label>
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">Zip</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 28%;">
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">Home Phone</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; margin: 0 13px;">
						<input type="text" name="work_phone" value="<?php echo isset($info['work_phone'])?$info['work_phone']:''; ?>"  style="width: 100%;">
						<label style="display: block; text-align: center;">Work Phone</label>
					</div>
					<div class="form-field" style="float: right; width: 44%;">
						<input type="text" name="best_time" value="<?php echo isset($info['best_time'])?$info['best_time']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">Best Time to Call</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 28%;">
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>"  style="width: 100%;">
						<label style="display: block; text-align: center;">Email</label>
					</div>
					<div class="form-field" style="float: left; width: 25%; margin: 0 13px;">
						<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
						<label style="display: block; text-align: center;">Cell Number</label>
					</div>
					<div class="form-field" style="float: right; width: 44%;">
						<input type="text" name="dob" placeholder="" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%; text-align: center;">
						<label style="display: block; text-align: center;">Date of Birth</label>
					</div>
				</div>	
			</div>
			<!-- box content end -->
			
			
			<!-- two column start -->
			<div class="two-column" style="float: left; width: 100%; margin: 2px 0;">
				<div class="one-half" style="width: 49%; float: left; border: 1px solid #000;">
					<label style="text-align: center; display: block; padding-top: 5px;">PURCHASE INFORMATION</label>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 2px 0 2px 7px;">
							<label>Make</label>
							<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 75%;">
						</div>
						<div class="form-field" style="float: right; width: 50%; margin: 2px 0;">
							<label>Selling Price</label>
							<input type="text" name="unit_value" id="unit_value" class="amount-value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 45%;">
						</div>
						<div class="form-field" style="float: left; width: 50%; margin: 2px 0 2px 7px;">
							<label>Model</label>
							<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 72%;">
						</div>
					</div>	
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Year</label>
							<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 75%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Options</label>
							<input type="text" name="options" id="options" class="amount-value" value="<?php echo isset($info['options'])?$info['options']:''; ?>" style="width: 65%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Stock#</label>
							<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 67%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Tax</label>
							<input type="text" id="sales_tax" class="amount-value" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>"  name="sales_tax" style="width: 82%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Color</label>
							<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 74%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Docs Fees</label>
							<input type="text" name="doc_fee" id="doc_fee" class="amount-value" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width: 55%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Miles</label>
							<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 74%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Back End</label>
							<input type="text" name="back_end" id="back_end" class="amount-value" value="<?php echo isset($info['back_end'])?$info['back_end']:''; ?>" style="width: 60%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>VIN</label>
							<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 79%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Total</label>
							<input type="text" name="amount" id="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="width: 75%;">
						</div>
					</div>
				</div>
				
				<div class="one-half" style="width: 49%; float: right; border: 1px solid #000;">
					<label style="text-align: center; display: block; padding-top: 5px;">INSURANCE INFORMATION</label>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 7px 0 7px 7px;">
							<label>Company</label>
							<input type="text" name="insurance_company" style="width: 78%;" value="<?php echo isset($info['insurance_company'])?$info['insurance_company']:''; ?>" />
						</div>
						<div class="form-field" style="float: left; width: 100%; margin: 2px 0 2px 7px;">
							<label>Agent</label>
							<input type="text" name="insurance_agent" value="<?php echo isset($info['insurance_agent'])?$info['insurance_agent']:''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="float: left; width: 100%; margin: 2px 0 2px 7px;">
							<label>Phone</label>
							<input type="text" name="insurance_phone" value="<?php echo isset($info['insurance_phone'])?$info['insurance_phone']:''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="float: left; width: 100%; margin: 2px 0 2px 7px;">
							<label style="vertical-align: top; ">Notes:</label>
							<textarea style="border: 0px; height: 87px; width: 88%;" name="ins_notes"><?php echo isset($info['ins_notes'])?$info['ins_notes']:''; ?></textarea>
						</div>
					</div>	
				</div>
				
				
			</div>
			<!-- two column end -->
			
			
			<!-- No space box start -->
			<div class="row" style="float: left; width: 100%;">
				<div class="one-half" style="width: 50%; box-sizing: border-box; float: left;">
					<div class="one-half-inner" style="float: left; width: 100%; border: 1px solid #000;">
					<label style="text-align: center; display: block; padding-top: 5px;">TRADE INFORMATION</label>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 2px 0 2px 7px;">
							<label>Make</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>"  style="width: 74%;">
						</div>
						<div class="form-field" style="float: right; width: 50%; margin: 2px 0;">
							<label>Allowance</label>
							<input type="text" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width: 56%;">
						</div>
						<div class="form-field" style="float: left; width: 98%; margin: 2px 0 2px 7px;">
							<label>Model</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 85%;" style="float: right;">
						</div>
					</div>	
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Year</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 78%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Notes</label>
							<input type="text" name="comments" value="<?php echo isset($info['comments'])?$info['comments']:''; ?>" style="width: 74%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>Color</label>
							<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>Miles</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0 55px;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>VIN</label>
							<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 89%;">
						</div>
					</div>
				</div>
				</div>	
				
				<div class="one-half" style="width: 50%; box-sizing: border-box; float: left;">
					<div class="one-half-inner" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px;">
					<label style="text-align: center; display: block; padding-top: 5px;">PAY-OFF INFORMATION OR OUTSIDE LIEN</label>
					<span style="display: block;font-size: 13px; text-align: center;">(circle one)</span>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 2px 0 2px 7px;">
							<label>Balance</label>
							<input type="text" name="balance_amount" value="<?php echo isset($info['balance_amount'])?$info['balance_amount']:''; ?>" style="width: 60%;">
						</div>
						<div class="form-field" style="float: right; width: 50%; margin: 2px 0;">
							<label>Phone</label>
							<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 73%;">
						</div>
					</div>	
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 0 0 0 7px;">
							<label>Owed to</label>
							<input type="text" name="owed_to" value="<?php echo isset($info['owed_to'])?$info['owed_to']:''; ?>" style="width: 62%;">
						</div>
						<div class="form-field" style="float: right; width: 50%;">
							<label>Account No</label>
							<input type="text" name="account_no" value="<?php echo isset($info['account_no'])?$info['account_no']:''; ?>" style="width: 48%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>Address</label>
							<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 78%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>Good Until</label>
							<input type="text" name="good_until" value="<?php echo isset($info['good_until'])?$info['good_until']:''; ?>" style="width: 74%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>Spoke to</label>
							<input type="text" name="spoke_to" value="<?php echo isset($info['spoke_to'])?$info['spoke_to']:''; ?>" style="width: 79%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 0 0 0 7px;">
							<label>City</label>
							<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 87%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 48%; margin: 2px 0 2px 7px;">
							<label>State</label>
							<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 75%;">
						</div>
						<div class="form-field" style="float: right; width: 50%; margin: 2px 0;">
							<label>Zip</label>
							<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 83%;">
						</div>
					</div> 	
				</div>
				</div>	
			</div>
			<!-- No space box end -->
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 49%; margin: 2px 0 2px;">
							
							<input type="text" name="retainer_amount" value="<?php echo isset($info['retainer_amount'])?$info['retainer_amount']:''; ?>" style="width: 100%;">
							<label style="display: block; text-align: center;">Retainer Amount:</label>
						</div>
						<div class="form-field" style="float: right; width: 49%; margin: 2px 0;">
							<input type="text" name="deliver_date" value="<?php echo isset($info['deliver_date'])?$info['deliver_date']:''; ?>" style="width: 100%;">
							<label style="display: block; text-align: center;">Delivery Date:</label>
						</div>
			</div> 
					
			<p style="float: left; width: 100%; text-align: center; font-size: 18px;">I AM AWARE THAT ALL RETAINERS ARE NON-REFUNDABLE AND INSURANCE IS REQUIRED ON ALL BIKES BEFORE DELIVERY</p>
			
			<div class="row one-half" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 40%; margin: 2px 0 2px;">
							<label>Customer:</label>
							<input type="text" name="cust_sign" style="width: 70%;">
						</div>
						<div class="form-field" style="float: left; width: 39%; margin: 2px 0;">
							<label>Dealer:</label>
							<input type="text" name="dealer_sign" style="width: 78%;">
						</div>
						<div class="form-field" style="float: right; width: 20%; margin: 2px 0;">
							<label>Date:</label>
							<input type="text" name="ss_date" value="<?php echo isset($info['ss_date'])?$info['ss_date']:''; ?>" style="width: 68%; text-align: center; font-weight: bold;">
						</div>
			</div>
			
			<div class="row one-half" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: left; width: 40%; margin: 2px 0 2px;">
							<label>Customer:</label>
							<input type="text"  style="width: 72%;">
						</div>
						<div class="form-field" style="float: left; width: 44%; margin: 2px 0;">
							<label>Date:</label>
							<input type="text" name="cus_date" value="<?php echo isset($info['cus_date'])?$info['cus_date']:''; ?>" style="width: 77%; text-align: center; font-weight: bold;">
						</div>
			</div>
			
		</div>
		
		
		
		
	</div>
		<!-- container end -->
		
			
	
	</div>
		<!-- no print buttons -->
	<br/>
	<div class="noprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	$(".amount-value").on('keyup paste change',function(){
				var unit_value = isNaN(parseFloat($("#unit_value").val()))?0.00:parseFloat($("#unit_value").val());
				var u_options = isNaN(parseFloat($("#options").val()))?0.00:parseFloat($("#options").val());
				var sales_tax = isNaN(parseFloat($("#sales_tax").val()))?0.00:parseFloat($("#sales_tax").val());
				var doc_fee = isNaN(parseFloat($("#doc_fee").val()))?0.00:parseFloat($("#doc_fee").val());
				var back_end = isNaN(parseFloat($("#back_end").val()))?0.00:parseFloat($("#back_end").val());
				var total_amount = unit_value + u_options + sales_tax + doc_fee + back_end;
				$("#amount").val(total_amount.toFixed(2));
			});	
	
	$(".date_input_field").bdatepicker();

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
