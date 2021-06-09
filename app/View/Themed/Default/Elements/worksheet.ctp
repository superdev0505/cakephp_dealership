
<div class="page-break"></div>		
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 

		
			<img class="border-none"  src="https://dpcrm.s3.amazonaws.com/assets/images/buyer_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Name</span>:
				<input name="contact_id" type="hidden"  value="<?php echo $info['id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="first_name" type="text" class="input35" value="<?php echo $info['first_name']; ?>" placeholder=""/>
				<input name="last_name" type="text" class="input35" value="<?php echo $info['last_name']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="address" type="text" class="input71" value="<?php echo $info['address']; ?>" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="city" type="text" class="input25" value="<?php echo $info['city']; ?>" placeholder=""/>
				State:&nbsp;
				<input name="state" type="text" class="input20" value="<?php echo $info['state']; ?>" placeholder=""/>
				Zip:&nbsp;
				<input name="zip" type="text" class="input12" value="<?php echo $info['zip']; ?>" placeholder=""/>
				</span>
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="ss_num" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="phone" type="text" class="input71" value="<?php echo $info['phone']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="mobile" type="text" class="input71" value="<?php echo $info['mobile']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="email" type="text" class="input71" value="<?php echo $info['email']; ?>" placeholder=""/>
				<?php /*?><hr/>
				<span class="span24">Date of Birth</span>:
				<input name="dob" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/co_buyer_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Name</span>:
				<input name="cobuyer_fname" type="text" class="input35" value="" placeholder=""/>
				<input name="cobuyer_lname" type="text" class="input35" value="" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="co_address" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="co_city" type="text" class="input24" value="" placeholder=""/>
				State:&nbsp;
				<input name="co_state" type="text" class="input20" value="" placeholder=""/>
				Zip:&nbsp;
				<input name="co_zip" type="text" class="input12" value="<?php echo $info['co_zip']; ?>" placeholder=""/>
				</span>
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="cobuyer_ssn" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="cobuyer_phone" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="cobuyer_mobile" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="cobuyer_email" type="text" class="input71" value="<?php echo $info['cobuyer_email']; ?>" placeholder=""/>
				<?php /*?><hr/>
				<span class="span24">Date of Birth</span>:
				<input name="cobuyer_dob" type="text" class="input71" value="<?php echo $info['cobuyer_dob']; ?>" placeholder=""/><?php */?>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/vehicle_select_black_image.JPG" width="99.5%">
			<div class="left1">Condition:&nbsp;
				<input name="condition" type="text" class="input35" value="<?php echo $info['condition']; ?>" placeholder=""/>
				</span> &nbsp;Year:&nbsp;
				<input name="year" type="text" class="input35" value="<?php echo $info['year']; ?>" placeholder=""/>
				</span>
				<hr/>
				<span class="span24">Make</span>:
				<input name="make" type="text" class="input71" value="<?php echo $info['make']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input name="model" type="text" class="input71" value="<?php echo $info['model']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Category</span>:
				<input name="type" type="text" class="input71" value="<?php echo $info['type']; ?>" placeholder=""/>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Mileage</span>:
				<input name="odometer" type="text" class="input71" value="<?php echo $info['odometer']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Color</span>:
				<input name="unit_color" type="text" class="input71" value="<?php echo $info['unit_color']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Vin#</span>:
				<input name="vin" type="text" class="input71" value="<?php echo $info['vin']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Stock #</span>:
				<input name="stock_num" type="text" class="input71" value="<?php echo $info['stock_num']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/trade_in_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Year (Trade)</span>:
				<input name="year_trade" type="text" class="input71" value="<?php echo $info['year_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Make</span>:
				<input name="make_trade" type="text" class="input71" value="<?php echo $info['make_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input name="model_trade" type="text" class="input71" value="<?php echo $info['model_trade']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<div class="right1"> <span class="span24">Mileage</span>:
				<input name="odometer_trade" type="text" class="input71" value="<?php echo $info['odometer_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Color</span>:
				<input name="" type="text" class="input71" value="<?php echo $info['usedunit_color']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Vin#</span>:
				<input name="vin_trade" type="text" class="input71" value="<?php echo $info['vin_trade']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/selling_price_black_image.JPG" width="50%"> <img class="border-none"  src="https://dpcrm.s3.amazonaws.com/assets/images/current_market_value_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 310px; "> 
            <span class="span24">Trade Allowance</span>$
				<input name="trade_allowance" id="trade_allowance" type="text" class="input71 tradeDiff" value="<?php //echo $info['freight_fee']; ?>" placeholder=""/>
            <span class="span24">Selling Price</span>$
				<input name="unit_value"  id="sell_price" type="text" class="input71" value=" <?php echo (!empty($info['unit_value']))? $info['unit_value']  : "0.00" ;   ?>" placeholder=""/>
				
                <span class="span24">Freight</span>$
				<input name="freight_fee" id="freight" type="text" class="input71 priceChange" value="<?php echo $info['freight_fee']; ?>" placeholder=""/>
				<span class="span24">Prep/Recond</span>$
				<input name="prep_fee"  id="prep" type="text" class="input71 priceChange" value="<?php echo $info['prep_fee']; ?>" placeholder=""/>
				<span class="span24">Doc</span>$
				<input name="doc_fee" id="doc" type="text" class="input71 priceChange" value="<?php echo $info['doc_fee']; ?>" placeholder=""/>
				<span class="span24" title="Certification Fee">Parts / Service</span>$
				<input name="parts_fee" id="part_serv"type="text" class="input71 priceChange" value="" placeholder=""/>
				<span class="span24">Tag / Title Fee</span>$
				<input name="tag_fee" id="tag_tit"type="text" class="input71 priceChange" value="" placeholder=""/>
				<span class="span24">Sales Tax</span>%
				<input name="tax_fee" id="tax"type="text" class="input70 priceChange" value="<?php echo $info['tax_fee']; ?>" placeholder=""/>
				<span class="span24">Balance</span>$
				<input name="amount" id="bal" type="text" class="input71" placeholder=""/>
			</div>
			<!---left1-->
			<div class="right1" style="height:310px; ">
				<div> 10 Day Estimated Payoff&nbsp;
					$&nbsp;
					<input name="trade_payoff" id="est_payoff" type="text" class="input17 tradeDiff" value="" placeholder=""/>
					</span> <span id='errorForPayoff'></span> 
					
					<br />
					<br /><br />

					<div align="center" id="fixedfee_selection">
					
						Fixed Fee:&nbsp; <br />
						<?php
						echo $this->Form->input('condition', array(
							'id' => "fixed_fee_options",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0'
						));
						?>
						<br />
						<br />
						<br />
						
						<div class="form-group">
						  <label for="option1">Tax balance</label>
						  <input id="option1" type="radio" name="taxopt" checked="checked" value="tax_balance">
						  <label for="option2">Tax Vehicle Only</label>
						  <input id="option2" type="radio" name="taxopt" value="tax_vehicle_only">
						</div>
						<table style="width:80%">
                        <tr>
                         <td width="30%"></td><td width="20%" align="center"><span >Cost</span></td><td width="60%">$
					<input name="actual_cost" id="cost" style="width:80%" type="text"  value="" placeholder=""/>
                    <td></tr>
                   <tr><td width="30%">
                    <select class="form-control" id="profitOption"><option value="cost_sell">No Fee's</option><option value="cost_fees">With Fee's</option></select>
                     </td><td width="20%" align="center">
                     <span>Profit</span>
                   </td><td width="60%">
                   
                  $
					<input name="actual_profit" id="profit" type="text" style="width:80%"  value="" placeholder=""/></td>
                    </table>
                  
					</div>
                    
					
					
				</div>
			</div>
			<!---left1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/intial_investment_black_image.JPG" width="50%"> <img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/monthly_option_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 283px;">
				<div align="center" style="margin-top: 20px;">
               
					<h3>
                    
                     <a href="#" id="calculateDown" class="btn btn-info pull-left noprint" style="margin-left:10px;">Calulate Down</a>
						<input name="down_payment" id="down_pay" type="text" class="input15"   placeholder=""/>
					</h3>
					<span id='errorForDownPay'></span> </div>
			</div>
			<!---left1-->
			<div class="right1" style=" top: -25px; position: relative;height: 284px;">
				<table style="width: 80%;">
					<thead>
						<tr>
							<th width="33%" align="center">APR:</th>
							<th width="33%" align="center">Term:</th>
							<th width="33%" align="center">Payment:</th>
						</tr>
					</thead>
                    
					<tbody>
						<tr>
							<td width="33%" align="center"><input name="loan_apr" type="text" id="apr" class="input12" value="" placeholder="" style="width: 83px;"/>
								%</td>
							<td width="33%" align="center"><select name="payment_option1" class="form-control price_options" style="width:65%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option1_price_span" class="print_month"><?php echo $selected_months[1]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option2" class="form-control price_options" style="width:65%;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option2_price_span" class="print_month"><?php echo $selected_months[2]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option3" class="form-control price_options" style="width:65%;" price-id="option3_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option3_price_span" class="print_month"><?php echo $selected_months[3]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option3_price" id="option3_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option4" class="form-control price_options" style="width:65%;" price-id="option4_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option4_price_span" class="print_month"><?php echo $selected_months[4]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option4_price" id="option4_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
					</tbody>
                    
				</table>
			</div>
		</div>
		<!---left1-->
		</br>
        <p align="center">@<?php echo AuthComponent::user('dealer'); ?>&nbsp;Worksheet&nbsp;-&nbsp;<?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	