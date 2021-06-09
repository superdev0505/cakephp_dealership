<?php
//This Custom worksheet Mapped Author: Abha Sood Negi

	$zone = AuthComponent::user('zone');
	$dealer = AuthComponent::user('dealer');
	$cid = AuthComponent::user('dealer_id');
	$d_address = AuthComponent::user('d_address');
	$sperson = AuthComponent::user('full_name');
	$d_city = AuthComponent::user('d_city');
	$d_state = AuthComponent::user('d_state');
	$d_zip = AuthComponent::user('d_zip');
	$d_phone = AuthComponent::user('d_phone');
	$d_fax = AuthComponent::user('d_fax');
	$d_email = AuthComponent::user('d_email');
	$d_website = AuthComponent::user('d_website');

	$date = new DateTime();
	date_default_timezone_set($zone);
	$expectedt = date('m/d/Y');

	$date = new DateTime();
	date_default_timezone_set($zone);
	$datetimefullview = date('M d, Y g:i A');
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

	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; font-weight: normal; color: #000;}
	ul{text-align: center; padding: 0; margin: 36px 0 0;}
	li {display: inline; list-style: outside none none; margin: 0 3%; font-weight: bold; font-size: 14px;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	p{font-size: 14px;}
	td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px;}
	table input[type="text"]{border: 0px;}
	.wraper.main input {padding: 2px;}
	@media print { 
	.dontprint{display: none;}
	
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="float: left; width: 15%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php if(AuthComponent::user('dealer_id')==2600) { ?>
				<div class="text" style=" float: left; margin: 12px 0 0 10%; text-align: center; width: 50%;">
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">Cole Harley-Davidson</h2>
					<p style="margin: 0;">1804 Bland, Street</p>
					<p style="margin: 0;">Bluefield, WV 24701</p>
					<p style="margin: 0;">Tel: (304) 324-8116 Fax: (304) 327-6512</p>
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">AGREEMENT TO PURCHASE</h2>
				</div>
			<?php } else if(AuthComponent::user('dealer_id')==2601) { ?>
				<div class="text" style=" float: left; margin: 12px 0 0 10%; text-align: center; width: 50%;">
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">Black Jack Harley-Davidson</h2>
					<p style="margin: 0;">Florence, SC 29501</p>
					<p style="margin: 0;">Phone: 843-669-9961 Fax: 843-66-1040</p>
					<p style="margin: 0;">www.blackjackharley.com</p>
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">AGREEMENT TO PURCHASE</h2>
				</div>
			<?php } else { ?>
				<div class="text" style=" float: left; margin: 12px 0 0 10%; text-align: center; width: 50%;">
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">Black Bear Harley-Davidson</h2>
					<p style="margin: 0;">Wytheville, VA 24382</p>
					<p style="margin: 0;">Phone: 276-228-9000 Fax: 276-228-6601</p>
					<p style="margin: 0;">www.blackbearhd.com</p>
					<h2 style="font-weight: bold; margin: 0; font-size: 18px;">AGREEMENT TO PURCHASE</h2>
				</div>
			<?php } ?>
			<div class="logo" style="float: right; width: 15%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 25%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%">
			</div>
			<div class="form-filed" style="float: left; width: 50%;">
				<label>Source:</label>
				<input type="text" name="source" value="<?php echo isset($info['source'])?$info['source']:''; ?>" style="width: 87%">
			</div>
			<div class="form-filed" style="float: right; width: 25%;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 80%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 40%;">
				<strong style="font-size: 15px;">Purchaser</strong>
				<label>First:</label>
				<input type="text" name="first_name" value="<?php echo isset($info['first_name'])?$info['first_name']:''; ?>" style="width: 71%">
			</div>
			<div class="form-filed" style="float: left; width: 30%;">
				<label>Middle:</label>
				<input type="text" name="m_name" value="<?php echo isset($info['m_name'])?$info['m_name']:''; ?>" style="width: 80%">
			</div>
			<div class="form-filed" style="float: right; width: 30%;">
				<label>Last:</label>
				<input type="text" name="last_name" value="<?php echo isset($info['last_name'])?$info['last_name']:''; ?>" style="width: 86%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 33%;">
				<label>D.O.B.:</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>"  style="width: 80%">
			</div>
			<div class="form-filed" style="float: left; width: 33%;">
				<label>SS#:</label>
				<input type="text" name="ss" value="<?php echo isset($info['ss'])?$info['ss']:''; ?>"  style="width: 83%">
			</div>
			<div class="form-filed" style="float: left; width: 34%;">
				<label>D.L.#:</label>
				<input type="text" name="dl" value="<?php echo isset($info['dl'])?$info['dl']:''; ?>"  style="width: 85%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 40%;">
				<strong style="font-size: 15px;">Co-Buyer</strong>
				<label>First:</label>
				<input type="text" name="co_buyer_first" value="<?php echo isset($info['co_buyer_first'])?$info['co_buyer_first']:''; ?>"  style="width: 71%">
			</div>
			<div class="form-filed" style="float: left; width: 30%;">
				<label>Middle:</label>
				<input type="text" name="co_buyer_middle" value="<?php echo isset($info['co_buyer_middle'])?$info['co_buyer_middle']:''; ?>"  style="width: 80%">
			</div>
			<div class="form-filed" style="float: right; width: 30%;">
				<label>Last:</label>
				<input type="text" name="co_buyer_last" value="<?php echo isset($info['co_buyer_last'])?$info['co_buyer_last']:''; ?>"  style="width: 86%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 33%;">
				<label>D.O.B.:</label>
				<input type="text" name="co_buyer_dob" value="<?php echo isset($info['co_buyer_dob'])?$info['co_buyer_dob']:''; ?>"  style="width: 80%">
			</div>
			<div class="form-filed" style="float: left; width: 33%;">
				<label>SS#:</label>
				<input type="text" name="co_buyer_ss" value="<?php echo isset($info['co_buyer_ss'])?$info['co_buyer_ss']:''; ?>"  style="width: 83%">
			</div>
			<div class="form-filed" style="float: left; width: 34%;">
				<label>D.L.#:</label>
				<input type="text" name="co_buyer_dl" value="<?php echo isset($info['co_buyer_d;'])?$info['co_buyer_dl']:''; ?>"  style="width: 85%">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 50%;">
				<label>Home Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>"  style="width: 80%">
			</div>
			<div class="form-filed" style="float: right; width: 50%;">
				<label>Office / Cell Phone:</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>"  style="width: 73%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-filed" style="float: left; width: 60%;">
				<label><strong>Address</strong></label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['address'].' '.$info['address_line2'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>"  style="width: 88%">
			</div>
			<div class="form-filed" style="float: left; width: 40%;">
				<label><strong>FORMAT</strong></label>
				<input type="checkbox" name="format_checkbox" <?php echo ($info['format_checkbox'] == "format_checkbox") ? "checked" : ""; ?> value="format_checkbox"/> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<table width="50%" cellpadding="0" cellspacing="0" style="float: left; border-top: 1px solid #000; border-left: 1px solid #000;">
				<tr>
					<td><strong style="text-align: center; display: block; font-size: 15px;">TRADE IN</strong></td>
				</tr>
				<tr>
					<td>
						<label>Make:</label> 
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>"  style="80%;">
					</td>
				</tr>
				<tr>
					<td><label>Model:</label> <input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>"  style="80%;"></td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 33%;">
							<label>Year:</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>"  style="width: 71%">
						</div>
						<div class="form-filed" style="float: left; width: 33%;">
							<label>Color:</label>
							<input type="text" name="color_trade" value="<?php echo isset($info['color_trade'])?$info['color_trade']:''; ?>"  style="width: 71%">
						</div>
						<div class="form-filed" style="float: left; width: 34%;">
							<label>Miles:</label>
							<input type="text" name="miles_trade" value="<?php echo isset($info['miles_trade'])?$info['miles_trade']:''; ?>"  style="width: 71%">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Serial No:</label>
							<input type="text" name="serial_no_trade" value="<?php echo isset($info['serial_no_trade'])?$info['serial_no_trade']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Mileage of Last Service:</label>
							<input type="text" name="mileage_last_service_trade" value="<?php echo isset($info['mileage_last_service_trade'])?$info['mileage_last_service_trade']:''; ?>"  style="width: 66%">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 100%;">
							<label>A / U | Tag Transfer Y / N</label>
							<input type="text" name="tag_transfer_trade" value="<?php echo isset($info['tag_transfer_trade'])?$info['tag_transfer_trade']:''; ?>"  style="width: 60%">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Payoff:</label>
							<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade'])?$info['payoff_trade']:''; ?>"  style="width: 78%">
						</div>
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Until:</label>
							<input type="text" name="until_trade" value="<?php echo isset($info['until_trade'])?$info['until_trade']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-filed" style="float: left; width: 100%;">
							<label>To:</label>
							<input type="text" name="to_trade" value="<?php echo isset($info['to_trade'])?$info['to_trade']:''; ?>"  style="width: 66%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Address</label>
							<input type="text" name="address_line2" value="<?php echo isset($info['address_line2'])?$info['address_line2']:''; ?>"  style="width: 66%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Phone:</label>
							<input type="text" name="phone_trade" value="<?php echo isset($info['phone_trade'])?$info['phone_trade']:''; ?>"  style="width: 75%">
						</div>
						<div class="form-filed" style="float: right; width: 48%;">
							<label>Acct No:</label>
							<input type="text" name="contact_account_id" value="<?php echo isset($info['contact_account_id'])?$info['contact_account_id']:''; ?>"  style="width: 70%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 40%;">
							<label>Second Lien Y N</label>
							<input type="text" name="second_lien" value="<?php echo isset($info['second_lien'])?$info['second_lien']:''; ?>"  style="width: 30%">
						</div>
						<div class="form-filed" style="float: left; width: 30%;">
							<label>ESP Y N:</label>
							<input type="text" name="esp_trade" value="<?php echo isset($info['esp_trade'])?$info['esp_trade']:''; ?>"  style="width: 40%">
						</div>
						<div class="form-filed" style="float: left; width: 30%;">
							<label>PCMP Y N:</label>
							<input type="text" name="pcmp_trade" value="<?php echo isset($info['pcmp_trade'])?$info['pcmp_trade']:''; ?>"  style="width: 40%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Current Payment:</label>
							<input type="text" name="current_payment" value="<?php echo isset($info['current_payment'])?$info['current_payment']:''; ?>"  style="width: 46%">
						</div>
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Term:</label>
							<input type="text" name="term_trade" value="<?php echo isset($info['term_trade'])?$info['term_trade']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;"><strong style="text-align: center; display: block; font-size: 15px; padding: 2px 0 3px;">INSURANCE INFO:</strong></td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>INS. CO:</label>
							<input type="text" name="ins_info" value="<?php echo isset($info['ins_info'])?$info['ins_info']:''; ?>"  style="width: 70%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Agent:</label>
							<input type="text" name="agent" value="<?php echo isset($info['agent'])?$info['agent']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Address:</label>
							<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Policy NO:</label>
							<input type="text" name="policy_no" value="<?php echo isset($info['policy_no'])?$info['policy_no']:''; ?>"  style="width: 80%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Effective Date:</label>
							<input type="text" name="effective_date" value="<?php echo isset($info['effective_date'])?$info['effective_date']:''; ?>"  style="width: 78%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Deductible:</label>
							<input type="text" name="deductible" value="<?php echo isset($info['deductible'])?$info['deductible']:''; ?>"  style="width: 66%">
						</div>
						<div class="form-filed" style="float: right; width: 48%;">
							<label>Quoted By:</label>
							<input type="text" name="quoted_by" value="<?php echo isset($info['quoted_by'])?$info['quoted_by']:''; ?>"  style="width: 66%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="height: 33px;">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Partial Payment:</label>
							<input type="text" name="partial_payment" value="<?php echo isset($info['partial_payment'])?$info['partial_payment']:''; ?>"  style="width: 52%">
						</div>
						<div class="form-filed" style="float: right; width: 48%;">
							<label>Taxes & Fees:</label>
							<input type="text" name="taxes_fees" value="<?php echo isset($info['taxes_fees'])?$info['taxes_fees']:''; ?>"  style="width: 52%">
						</div>
					</td>
				</tr>
				
			</table>
		
		
			<table cellpadding="0" cellspacing="0" style="float: right; width: 50%; border-top: 1px solid #000;">
				<tr>
					<td colspan="2"><strong style="text-align: center; display: block; font-size: 15px;">I DESIRE TO PURCHASE THE FOLLOWING VEHICLE:</strong></td>
				</tr>
				<tr>
					<td colspan="2"><label>Make:</label> <strong style="font-size: 15px; font-weight: normal;">HARLEY-DAVIDSON</strong></td>
				</tr>
				<tr>
					<td colspan="2"><label>Model:</label> <input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>"  style="width: 80%" ></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="form-filed" style="float: left; width: 40%;">
							<label>Year:</label>
							<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>"  style="width: 80%">
						</div>
						<div class="form-filed" style="float: left; width: 60%;">
							<label>Color:</label>
							<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>"  style="width: 83%">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Condition:</label>
							<input type="text" name="condition" value="<?php echo isset($info['condition'])?$info['condition']:''; ?>"  style="width: 60%">
						</div>
						<div class="form-filed" style="float: right; width: 50%;">
							<label>Miles:</label>
							<input type="text" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>"  style="width: 83%">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="form-filed" style="float: left; width: 48%;">
							<label>Stock No:</label>
							<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>"  style="width: 60%">
						</div>
						<div class="form-filed" style="float: right; width: 50%;">
							<label>Model No:</label>
							<input type="text" name="model_no" value="<?php echo isset($info['model_no'])?$info['model_no']:''; ?>"  style="width: 60%">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>Serial No:</label>
							<input type="text" name="serial_no" value="<?php echo isset($info['serial_no'])?$info['serial_no']:''; ?>"  style="width: 78%">
						</div>
					</td>
				</tr>
				<tr>
					<td style="width: 60%; padding: 4px 2px 3px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label><strong>SELLING PRICE:</strong></label>
						</div>
					</td>
					<td style="width: 40%;">$<input type="text" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>"  style="width: 78%"></td>
				</tr>
				<tr>
					<td style="width: 60%; padding: 3px 3px 4px;">
						<div class="form-filed" style="float: left; width: 100%;">
							<label>OPTIONAL EQUIPMENT</label>
						</div>
					</td>
					<td style="width: 40%;"><input type="text" name="optional_equipment" value="<?php echo isset($info['optional_equipment'])?$info['optional_equipment']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td style="height: 33px;"><input type="text" name="optional_equipment1" value="<?php echo isset($info['optional_equipment1'])?$info['optional_equipment1']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment2" value="<?php echo isset($info['optional_equipment2'])?$info['optional_equipment2']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td style="height: 33px;"><input type="text" name="optional_equipment3" value="<?php echo isset($info['optional_equipment3'])?$info['optional_equipment3']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment4" value="<?php echo isset($info['optional_equipment4'])?$info['optional_equipment4']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td style="height: 33px;"><input type="text" name="optional_equipment5" value="<?php echo isset($info['optional_equipment5'])?$info['optional_equipment5']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment6" value="<?php echo isset($info['optional_equipment6'])?$info['optional_equipment6']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment7" value="<?php echo isset($info['optional_equipment7'])?$info['optional_equipment7']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment8" value="<?php echo isset($info['optional_equipment8'])?$info['optional_equipment8']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment9" value="<?php echo isset($info['optional_equipment9'])?$info['optional_equipment9']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment10" value="<?php echo isset($info['optional_equipment10'])?$info['optional_equipment10']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment11" value="<?php echo isset($info['optional_equipment11'])?$info['optional_equipment11']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment12" value="<?php echo isset($info['optional_equipment12'])?$info['optional_equipment12']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment13" value="<?php echo isset($info['optional_equipment13'])?$info['optional_equipment13']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment14" value="<?php echo isset($info['optional_equipment14'])?$info['optional_equipment14']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment15" value="<?php echo isset($info['optional_equipment15'])?$info['optional_equipment15']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment16" value="<?php echo isset($info['optional_equipment16'])?$info['optional_equipment16']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="optional_equipment17" value="<?php echo isset($info['optional_equipment17'])?$info['optional_equipment17']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="optional_equipment18" value="<?php echo isset($info['optional_equipment18'])?$info['optional_equipment18']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><strong>CASH DOWN</strong></td>
					<td><input type="text" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="cash_down1" value="<?php echo isset($info['cash_down1'])?$info['cash_down1']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="cash_down2" value="<?php echo isset($info['cash_down2'])?$info['cash_down2']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
				<tr>
					<td><input type="text" name="cash_down3" value="<?php echo isset($info['cash_down3'])?$info['cash_down3']:''; ?>"  style="width: 78%; padding: 4px 0 4px 7px;"></td>
					<td><input type="text" name="cash_down4" value="<?php echo isset($info['cash_down4'])?$info['cash_down4']:''; ?>"  style="width: 78%; padding: 3px 0 0 7px;"></td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<p style="text-align: center; margin: 0;">I AUTHORIZE AN INVESTIGATION OF MY CREDIT HISTORY, EMPLOYMENT HISTORY, AND THE RELEASE OD THAT <br> INFORMATION. ALL SALES FIGURES SUBJECT TO APPLICABLE TAXES, STATE AND LOCAL.</p>
			<h2 style="text-align: center; margin: 0; font-size: 17px; font-weight: bold;">CUSTOMER WILL TAKE DELIVERY IF TERMS AND FIGURES ARE AGREEABLE</h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>CUSTOMER OK BUYER</label>
				<input type="text" name="customer_ok" value="<?php echo isset($info['customer_ok'])?$info['customer_ok']:''; ?>"  style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>CO-BUYER</label>
				<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer'])?$info['co_buyer']:''; ?>"  style="width: 91%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>DEALERSHIP APPROVAL</label>
				<input type="text" name="dealership_approval" value="<?php echo isset($info['dealership_approval'])?$info['dealership_approval']:''; ?>"  style="width: 72%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>SALESMAN</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 68%;">
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
			$(".date_input_field").bdatepicker();

			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });    
		});	
	</script>
</div>
