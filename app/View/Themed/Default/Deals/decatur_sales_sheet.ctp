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
	label{font-size: 13px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 13px; border-top: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 1px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 7px; border-bottom: 1px solid #000; font-size: 13px;}
	table input[type="text"]{border: 7px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 1px;}
	a.active{color: #000 !important;}
	/*td:last-child{border-right: 0px;}*/
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 2px 0; font-size: 18px; text-align: center; text-decoration: underline;"><b>NRS Trailers Sales Sheet - DECATUR, TX</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 25%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 84%;">
			</div>
			<div class="from-field" style="float: left; width: 25%;">
				<label>Sales Person:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 63%;">
			</div>
			<div class="from-field" style="float: left; width: 25%;">
				<label>Pick Up Date:</label>
				<input type="text" name="pick_up" value="<?php echo isset($info['pick_up'])?$info['pick_up']:''; ?>" style="width: 60%;">
			</div>
			<div class="from-field" style="float: left; width: 25%;">
				<label>Pickup Time</label>
				<select style="width: 65%;">
					<option value="1">Select Time</option>
				</select>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 100%;">
				<label><sup>***</sup>DL # & Copy</label>
				<input type="text" name="dl_copy" value="<?php echo isset($info['dl_copy'])?$info['dl_copy']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 70%;">
				<label><sup>Make/Model:</sup></label>
				<input type="text" name="make_model" value="<?php echo isset($info['make_model']) ? $info['make_model'] : $info['make']." ".$info['model']; ?>" style="width: 88%;">
			</div>
			<div class="from-field" style="float: left; width: 30%;">
				<label>Major Color:</label>
				<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="from-field" style="float: left; width: 100%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 54%; box-sizing: border-box;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Name:</label>
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 91%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Address:</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 89%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>(mailing & physical):</label>
					<input type="text" name="mailing_phy" value="<?php echo isset($info['mailing_phy'])?$info['mailing_phy']:''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Country:</label>
					<input type="text" name="country" value="<?php echo isset($info['country'])?$info['country']:''; ?>" style="width: 88%;">
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Phone</label>
						<span style="display: inline-block; width: 91%;">
							<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000;">
								<label style="font-size: 11px;">(cell)</label>
								<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="border: 0px; width: 80%;">
							</div>
							<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000;">
								<label style="font-size: 11px;">(others)</label>
								<input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="border: 0px;  width: 80%;">
							</div>
						</span>
					</div>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Email:</label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 91%;">
				</div>	
			</div>
			<!-- left Section end -->
			
			<div class="right" style="float: left; width: 46%; box-sizing: border-box;">
				<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
					<h3 Style="float: left; width: 100%; text-align: center; font-size: 14px;"><b>New</b></h3>
					<p style="text-align: center; font-size: 13px; margin: 2px 0;">No LQ / No Trade (1h-MR)<br> No LQ / Trade (1h-MR + TE) <br> LQ / No Trade (2 days) <br> LQ / Trade (2 days)</p>
				</div>
				<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
					<h3 Style="float: left; width: 100%; text-align: center; font-size: 14px;"><b>Used</b></h3>
					<p style="text-align: center; font-size: 13px; margin: 2px 0;">No LQ / No Trade (1h-MR)<br> No LQ / Trade (1h-MR + TE) <br> LQ / No Trade (2 days) <br> LQ / Trade (2 days)</p>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 50%;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0 0;">
					<label>NRS Financing <input type="checkbox" name="nrs_check" <?php echo ($info['nrs_check'] == "nrs") ? "checked" : ""; ?> value="nrs"/></label>
					<label style="margin: 0 4%;">Wire <input type="checkbox" name="wire_check" <?php echo ($info['wire_check'] == "wire") ? "checked" : ""; ?> value="wire"/></label>
					<label>Cashiers Ck(loan) <input type="checkbox" name="loan_check" <?php echo ($info['loan_check'] == "loan") ? "checked" : ""; ?> value="loan"/></label>
					<label style="margin: 0 4%;">Cashiers Ck <input type="checkbox" name="cashiers_check" <?php echo ($info['cashiers_check'] == "cashiers") ? "checked" : ""; ?> value="cashiers"/></label>
				</div>
				<p style="text-align: center; width: 100%; margin: 7px 0 0; font-size: 11px; float: left;">**If Financing, Customer Needs Insurance**</p>
				
				<table cellpadding="0" cellspacing="0" width="100%;" style="float: left; margin: 20px 0;">
					<tr>
						<td><b>Options Being Added:</b></td>
						<td>Customer Amt.</td>
						<td>Quoted Amt.</td>
					</tr>
					<tr>
						<td><input type="text" name="option1" value="<?php echo isset($info['option1'])?$info['option1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="customer1" value="<?php echo isset($info['customer1'])?$info['customer1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="quoted1" value="<?php echo isset($info['quoted1'])?$info['quoted1']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="option2" value="<?php echo isset($info['option2'])?$info['option2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="customer2" value="<?php echo isset($info['customer2'])?$info['customer2']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="quoted2" value="<?php echo isset($info['quoted2'])?$info['quoted2']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="option3" value="<?php echo isset($info['option3'])?$info['option3']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="customer3" value="<?php echo isset($info['customer3'])?$info['customer3']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="quoted3" value="<?php echo isset($info['quoted3'])?$info['quoted3']:''; ?>" style="width: 100%;"></td>
					</tr>	
				</table>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Generator (New units Only)</label>
						<input type="text" name="generator" value="<?php echo isset($info['generator'])?$info['generator']:''; ?>" style="width: 50%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block;"><b>Living Quarters Units -- Must Circle One</b></label>
						<label style="margin: 0 10% 0 0"><input type="checkbox" name="quarters_check" <?php echo ($info['quarters_check'] == "quarters") ? "checked" : ""; ?> value="quarters"/> Winterize </label>
						<label><input type="checkbox" name="winterize_check" <?php echo ($info['winterize_check'] == "winterize") ? "checked" : ""; ?> value="winterize"/> De-Winterize </label>
					</div>
				</div>
				
				<h4 style="float: left; width: 100%; font-size: 14px; margin: 3px 0;">***ATTN SALES: INPUT IN BLUE AND ENTER ALL NUMBERS AS POSITIVES</h4>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Trailer Sale Price With Trade:</label>
						<span style="width: 39%; float: right;">$<input type="text" name="trailer_sale" class="fee" id="trailer_sale" value="<?php echo isset($info['trailer_sale'])?$info['trailer_sale']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Trailer Sale Price w/o Trade:</label>
						<span style="width: 39%; float: right;">$<input type="text" name="trailer_wo" class="fee" id="trailer_wo" value="<?php echo isset($info['trailer_wo'])?$info['trailer_wo']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Sales Tax w/ trade:</label>
						<span style="width: 39%; float: right;">$ <input type="text" name="sales_tax" class="fee" id="sales_tax" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Sales Tax w/o trade:</label>
						<span style="width: 39%; float: right;">$ <input type="text" name="sales_tax_wo" class="fee" id="sales_tax_wo" value="<?php echo isset($info['sales_tax_wo'])?$info['sales_tax_wo']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Inv. Tax:</label>
						<span style="width: 39%; float: right;">$ <input type="text" name="inv_tax" class="fee" id="inv_tax" value="<?php echo isset($info['inv_tax'])?$info['inv_tax']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;">Total Fees:</label>
						<span style="width: 39%; float: right;">$ <input type="text" name="total_fees" class="fee" id="total_fees" value="<?php echo isset($info['total_fees'])?$info['total_fees']:''; ?>" style="width: width: 90%;"></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;"><b>Trade In Allowance:</b></label>
						<span style="width: 39%; float: right;">$<input type="text" name="trade_allowance" class="fee" id="trade_allowance" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" style="width: width: 100%;"></span>
					</div>
					
					<h4 style="float: left; width: 100%; font-size: 12px; margin: 3px 0;">***Trade Amount Contingent Upon Inspection***</h4>
					
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;"><b>Trade In Payoff:</b></label>
						<span style="width: 39%; float: right;">$<input type="text" name="trade_payoff" class="fee" id="trade_payoff" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" style="width: width: 100%;"></span>
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;"><b>Down Payment:</b></label>
						<span style="width: 39%; float: right;">$<input type="text" name="down_payment" class="fee" id="down_payment" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" style="width: width: 100%;"></span>
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 60%; display: inline-block; text-align: right;"><b>Amount Due:</b></label>
						<span style="width: 39%; float: right;">$ <input type="text" name="amount_due" class="fee" id="amount_due" value="<?php echo isset($info['amount_due'])?$info['amount_due']:''; ?>" style="width: width: 90%;"></span>
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label><b>Source of Sale:</b></label>
						<input type="text" name="source_sale" value="<?php echo isset($info['source_sale'])?$info['source_sale']:''; ?>" style="width: 75%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 48%;">
				<h3 style="float: left; width: 100%; margin: 2px 0; text-align: center;">Trade Information</h3>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Year:</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Make:</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Model:</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Vin:</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Payoff Bank:</label>
					<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade'])?$info['payoff_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Bank #:</label>
					<input type="text" name="bank_trade" value="<?php echo isset($info['bank_trade'])?$info['bank_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 20%; text-align: right;">Account #:</label>
					<input type="text" name="account_trade" value="<?php echo isset($info['account_trade'])?$info['account_trade']:''; ?>" style="width: 79%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label>***Rcv'd Trade Title:</label>
					<label style="margin: 0 3%;"><input type="checkbox" name="rcv1_check" <?php echo ($info['rcv1_check'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label> or 
					<label style="margin: 0 3%;"><input type="checkbox"  name="rcv2_check" <?php echo ($info['rcv2_check'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
				</div>
				<p style="float: left; width: 100%; font-size: 12px; margin: 2px 0;">Copy Front & Back of Title & VIN Plate Pic</p>
				<p style="float: left; width: 100%; font-size: 12px; margin: 2px 0; text-align: center;"><b>***All Trades Will Be Inspected In Shop***</b></p>
				<p style="float: left; width: 100%; font-size: 12px; margin: 2px 0; text-align: center;"><b>Final Numbers Are Contingent Upon Inspection</b></p>
				<p style="float: left; width: 100%; font-size: 12px; margin: 2px 0; text-align: center;">Please Allow: 1/2 hour for non-living quarters <br>   1 hour for living quarters <br> (fridge needs to be on / holding tanks dumped)</p>
				
				<div class="form-field" style="float; left; width: 100%; margin: 3px 0;">
					<label>Tax Exempt (circle one):</label>
					<label style="margin: 0 3%;"><input type="checkbox" name="tax1_check" <?php echo ($info['tax1_check'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes</label>
					<label><input type="checkbox" name="tax2_check" <?php echo ($info['tax2_check'] == "no") ? "checked" : ""; ?> value="no"/> No</label>
				</div>
				
				<div class="form-field" style="float; left; width: 100%; margin: 3px 0;">
					<label>Tax ID #</label>
					<input type="text" name="tax_id" value="<?php echo isset($info['tax_id'])?$info['tax_id']:''; ?>" style="width: 80%;">
				</div>
				
				<div class="form-field" style="float; left; width: 100%; margin: 3px 0;">
					<label style="display: block; text-align: center;"><b>Fees: (circle/mark thru)</b></label>
					<label>GVWR</label>
					<span style="float: right; width: 87%;">
					<label><input type="checkbox" name="gvwr1_checkbox" value="0_6k" <?php echo ($info['gvwr1_checkbox'] == "0_6k") ? "checked" : ""; ?> /> 0-6K</label>
					<label style="margin: 0 0 0 5%;"><input type="checkbox" name="gvwr2_checkbox" value="6_10k" <?php echo ($info['gvwr2_checkbox'] == "6_10k") ? "checked" : ""; ?> /> 6-10K</label>
					<label><input type="checkbox" name="gvwr3_checkbox" value="6_10k" <?php echo ($info['gvwr3_checkbox'] == "6_10k") ? "checked" : ""; ?> />  10-18K </label>
					<label style="margin: 0 0 0 5%;"><input type="checkbox" name="gvwr4_checkbox" value="18_26k" <?php echo ($info['gvwr4_checkbox'] == "18_26k") ? "checked" : ""; ?> /> 18-26K</label> <br>
					<label><input type="checkbox" name="gvwr5_checkbox" value="45k" <?php echo ($info['gvwr5_checkbox'] == "45k") ? "checked" : ""; ?> /> $45.00</label>
					<label style="margin: 0 0 0 5%;"><input type="checkbox" name="name"> $54.00</label>
					<label><input type="checkbox" name="gvwr6_checkbox" value="110k" <?php echo ($info['gvwr6_checkbox'] == "110k") ? "checked" : ""; ?> />   $110.00 </label>
					<label style="margin: 0 0 0 5%;"><input type="checkbox" name="gvwr7_checkbox" value="205k" <?php echo ($info['gvwr7_checkbox'] == "205k") ? "checked" : ""; ?> />  $205.00</label>
					</span>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Doc Fee:</label>
					<input type="text" name="doc_fee" class="fee" id="doc_fee" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Temp Tag:</label>
					<input type="text" name="temp_tag" class="fee" id="temp_tag" value="<?php echo isset($info['temp_tag'])?$info['temp_tag']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Road/Bridge:</label>
					<input type="text" name="road_bridge" class="fee" id="road_bridge" value="<?php echo isset($info['road_bridge'])?$info['road_bridge']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">TX MOB Fee:</label>
					<input type="text" name="tx_mob" class="fee" id="tx_mob" value="<?php echo isset($info['tx_mob'])?$info['tx_mob']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Title:</label>
					<input type="text" name="title" class="fee" id="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Inspection:</label>
					<input type="text" name="inspection" class="fee" id="inspection" value="<?php echo isset($info['inspection'])?$info['inspection']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Farm Tag:</label>
					<input type="text" name="farm_tag" class="fee" id="farm_tag" value="<?php echo isset($info['farm_tag'])?$info['farm_tag']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Processing:</label>
					<input type="text" name="processing" class="fee" id="processing" value="<?php echo isset($info['processing'])?$info['processing']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">*USED ** Plate Fee:</label>
					<input type="text" name="plate_fee" class="fee" id="plate_fee" value="<?php echo isset($info['plate_fee'])?$info['plate_fee']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="float: left; width: 48%; text-align: right;">Fees Total:</label>
					<input type="text" class="fee" id="fee_total" name="fee_total" value="<?php echo isset($info['fee_total'])?$info['fee_total']:''; ?>" style="width: 50%; float: right; text-align: right;">
				</div>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="float: left; width: 40%; text-align: right;">Est ACV on Trade:</label>
						<input type="text" name="est_acv" value="<?php echo isset($info['est_acv'])?$info['est_acv']:''; ?>" style="width: 59%; float: right;"> 
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="float: left; width: 40%; text-align: right;">Est Retail on Trade:</label>
						<input type="text" name="est_retail" value="<?php echo isset($info['est_retail'])?$info['est_retail']:''; ?>" style="width: 59%; float: right;"> 
						<p style="float: left; width: 100%; text-align: center; font-size: 11px; padding-left: 60%;">Initials</p>
					</div>
				</div>
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

	$(".fee").on('change keyup paste', function(){
		calculate_totalprice();
	});

	function calculate_totalprice() {
		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		var temp_tag = isNaN(parseFloat( $('#temp_tag').val()))?0.00:parseFloat($('#temp_tag').val());
		var road_bridge = isNaN(parseFloat( $('#road_bridge').val()))?0.00:parseFloat($('#road_bridge').val());
		var tx_mob = isNaN(parseFloat( $('#tx_mob').val()))?0.00:parseFloat($('#tx_mob').val());
		var title = isNaN(parseFloat( $('#title').val()))?0.00:parseFloat($('#title').val());
		var inspection = isNaN(parseFloat( $('#inspection').val()))?0.00:parseFloat($('#inspection').val());
		var farm_tag = isNaN(parseFloat( $('#farm_tag').val()))?0.00:parseFloat($('#farm_tag').val());
		var processing = isNaN(parseFloat( $('#processing').val()))?0.00:parseFloat($('#processing').val());
		var plate_fee = isNaN(parseFloat( $('#plate_fee').val()))?0.00:parseFloat($('#plate_fee').val());
		var fee_total = doc_fee + temp_tag + road_bridge + tx_mob + title + inspection + farm_tag + processing + plate_fee;
		$("#fee_total").val(fee_total.toFixed(2));

		var trailer_sale = isNaN(parseFloat( $('#trailer_sale').val()))?0.00:parseFloat($('#trailer_sale').val());
		var trailer_wo = isNaN(parseFloat( $('#trailer_wo').val()))?0.00:parseFloat($('#trailer_wo').val());
		var sales_tax = (trailer_sale * 6.25)/100;
		$("#sales_tax").val(sales_tax.toFixed(2));
		var sales_tax_wo = (trailer_wo * 6.25)/100;
		$("#sales_tax_wo").val(sales_tax_wo.toFixed(2));
		var inv_tax = (trailer_sale * 0.001479)/100;
		$("#inv_tax").val(inv_tax.toFixed(2));
		
		$("#total_fees").val(fee_total.toFixed(2));
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var down_payment = isNaN(parseFloat( $('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
		var amount_due = trailer_sale + trailer_wo + sales_tax + sales_tax_wo + inv_tax + fee_total - trade_allowance + trade_payoff - down_payment;
		$("#amount_due").val(amount_due.toFixed(2));
	}
	//calculate();
});
	
</script>
</div>
