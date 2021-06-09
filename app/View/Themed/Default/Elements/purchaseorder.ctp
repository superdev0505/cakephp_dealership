<div class="page-break"></div>
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="width: 15%; float: left; margin-top: 30px;">
				<label>DEALER<label>
			</div>
			<div class="center" style="float: left; width: 70%; margin: 0; text-align: center;">
				<h2 style="font-size: 17px; margin: 0;"><b>GENERAL RETAIL PURCHASE ORDER AND SECURITY AGREEMENT</b></h2>
				<h1 style="font-size: 20px; margin: 0;"><b>ADVANTAGE AG & EQUIPMENT</b></h1>
				<p style="font-size: 15px; margin: 0;">1025 Harcourt Rd., Ste 400 <span style="margin-left: 4%;">Mt. Vernon, OH 43050</span></p>
				<p style="font-size: 15px; margin: 0;">Phone: 740-392-3633 <span style="margin-left: 4%;">Fax: 740-393-2539</span></p>
			</div>
			<div class="right" style="float: right; width: 15%;">
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<input type="text" name="number" value="<?php echo isset($info['number'])?$info['number']:''; ?>"  style="width: 80%; float: right;">
					<label style="display: block; text-align: center; font-size: 11px; float: right; width: 80%;">NUMBER</label>
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 76%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="from-field" style="float: left; width: 75%;">
				<label>BUYER</label>
				<input type="text" name="buyer" value="<?php echo $info['first_name'].' '.$info['last_name'] ?>" style="width: 91%;"> 
			</div>
			<div class="from-field" style="float: left; width: 25%;">
				<label>PHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 77%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="from-field" style="float: left; width: 60%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;"> 
			</div>
			<div class="from-field" style="float: left; width: 40%;">
				<label>CITY & STATE</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data']:$info['city']." ".$info['state']; ?>" style="width: 76%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="from-field" style="float: left; width: 35%;">
				<label>Sales Ticket No.</label>
				<input type="text" name="sales_num" value="<?php echo isset($info['sales_num'])?$info['sales_num']:''; ?>" style="width: 68%;"> 
			</div>
			<div class="from-field" style="float: left; width: 15%;">
				<label>Date</label>
				<input type="text" name="sales_date" value="<?php echo isset($info['sales_date'])?$info['sales_date']:''; ?>" style="width: 76%;"> 
			</div>
			<div class="from-field" style="float: left; width: 35%;">
				<label>Delivered by</label>
				<input type="text" name="delivery_by" value="<?php echo isset($info['delivery_by'])?$info['delivery_by']:''; ?>" style="width: 77%;"> 
			</div>
			<div class="from-field" style="float: left; width: 15%;">
				<label>Date</label>
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" style="width: 77%;"> 	
			</div>
		</div>
		<p style="width: 100%; float: left; font-size: 15px; margin: 0;">Please enter my order for the following merchandise to be delivered</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="from-field" style="float: left; width: 30%;">
				<label>on or about</label>
				<input type="text" name="del_on" value="<?php echo isset($info['del_on'])?$info['del_on']:''; ?>" style="width: 60%;"> 
			</div>
			<div class="from-field" style="float: left; width: 70%;">
				<input type="text" name="del_about" value="<?php echo isset($info['del_about'])?$info['del_about']:''; ?>" style="width: 10%;">
				<label>to</label>
				<input type="text" name="del_to" value="<?php echo isset($info['del_to'])?$info['del_to']:''; ?>" style="width: 86%;"> 
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 0;">
			<tr>
				<th style="width: 5%;">QTY.</th>
				<th style="width: 5%;">NEW	<br>OR<br>USED</th>
				<th style="width: 10%;">STOCK NO.</th>
				<th style="width: 7%;">MODEL</th>
				<th style="width: 7%;">MAKE</th>
				<th style="width: 15%;">SERIAL NO.</th>
				<th style="width: 30%;">DESCRIPITION</th>
				<th style="width: 7%;">&nbsp;</th>
				<th colspan="2" style="width: 15%;">AMOUNT</th>
			</tr>
			
			<tr>
				<td><input type="text" name="qty1" value="<?php echo isset($info['qty1'])?$info['qty1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="condition1" value="<?php echo isset($info['condition1'])?$info['condition1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="stock_no1" value="<?php echo isset($info['stock_no1'])?$info['stock_no1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="serial_no1" value="<?php echo isset($info['serial_no1'])?$info['serial_no1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip1" value="<?php echo isset($info['descrip1'])?$info['descrip1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amount1" value="<?php echo isset($info['amount1'])?$info['amount1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="total1" value="<?php echo isset($info['total1'])?$info['total1']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty2" value="<?php echo isset($info['qty2'])?$info['qty2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="condition2" value="<?php echo isset($info['condition2'])?$info['condition2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="stock_no2" value="<?php echo isset($info['stock_no2'])?$info['stock_no2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="serial_no2" value="<?php echo isset($info['serial_no2'])?$info['serial_no2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip2" value="<?php echo isset($info['descrip2'])?$info['descrip2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amount2" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="total2" value="<?php echo isset($info['total2'])?$info['total2']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty3" value="<?php echo isset($info['qty3'])?$info['qty3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="condition3" value="<?php echo isset($info['condition3'])?$info['condition3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="stock_no3" value="<?php echo isset($info['stock_no3'])?$info['stock_no3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make3" value="<?php echo isset($info['make3'])?$info['make3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="serial_no3" value="<?php echo isset($info['serial_no3'])?$info['serial_no3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip3" value="<?php echo isset($info['descrip3'])?$info['descrip3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="title3" value="<?php echo isset($info['title3'])?$info['title3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amount3" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="total3" value="<?php echo isset($info['total3'])?$info['total3']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty4" value="<?php echo isset($info['qty4'])?$info['qty4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="condition4" value="<?php echo isset($info['condition4'])?$info['condition4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="stock_no4" value="<?php echo isset($info['stock_no4'])?$info['stock_no4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model4" value="<?php echo isset($info['model4'])?$info['model4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make4" value="<?php echo isset($info['make4'])?$info['make4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="serial_no4" value="<?php echo isset($info['serial_no4'])?$info['serial_no4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip4" value="<?php echo isset($info['descrip4'])?$info['descrip4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="title4" value="<?php echo isset($info['title4'])?$info['title4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amount4" value="<?php echo isset($info['amount4'])?$info['amount4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="total4" value="<?php echo isset($info['total4'])?$info['total4']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty5" value="<?php echo isset($info['qty5'])?$info['qty5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="condition5" value="<?php echo isset($info['condition5'])?$info['condition5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="stock_no5" value="<?php echo isset($info['stock_no5'])?$info['stock_no5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model5" value="<?php echo isset($info['model5'])?$info['model5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make5" value="<?php echo isset($info['make5'])?$info['make5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="serial_no5" value="<?php echo isset($info['serial_no5'])?$info['serial_no5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip5" value="<?php echo isset($info['descrip5'])?$info['descrip5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="title5" value="<?php echo isset($info['title5'])?$info['title5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amount5" value="<?php echo isset($info['amount5'])?$info['amount5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="total5" value="<?php echo isset($info['total5'])?$info['total5']:''; ?>" style="width: 100%;"></td>
			</tr>
			
		</table>
		
		<div class="row" style="float: left; width: 100%;margin: 0px 0;">
			<div class="left" style="width: 65%; float: left;">
				<table cellpadding="0" cellspacing="0" width="100%" style="border-top: 0px;">
					<tr>
						<td colspan="5"><b>TRADE-INS Buyer certifies below Trade-ins to be free of encumbrances</b></td>
						<td colspan="2" rowspan="2" align="center">TRADE-IN<br>ALLOWANCE</td>
					</tr>
					<tr>
						<td align="center" width="20%; padding: 10px 0;">MODEL</td>
						<td align="center" width="12%">MAKE</td>
						<td align="center" width="15%">SERIAL NO.</td>
						<td align="center" width="30%">DESCRIPTION</td>
						<td align="center" width="12%">&nbsp;</td>
					</tr>
					<tr>
						<td style="padding: 15px 0;"><input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="searial_trade" value="<?php echo isset($info['searial_trade'])?$info['searial_trade']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="descrip_trade" value="<?php echo isset($info['descrip_trade'])?$info['descrip_trade']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trade" value="<?php echo isset($info['trade'])?$info['trade']:''; ?>" style="width: 100%;"></td>
						<td width="70%"><input type="text" name="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td style="padding: 15px 0 14px;"><input type="text" name="model_trade1" value="<?php echo isset($info['model_trade1'])?$info['model_trade1']:$info['model_addon1_trade']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="make_trade1" value="<?php echo isset($info['make_trade1'])?$info['make_trade1']:$info['make_addon1_trade']; ?>" style="width: 100%;"></td>
						<td><input type="text" name="searial_trade1" value="<?php echo isset($info['searial_trade1'])?$info['searial_trade1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="descrip_trade1" value="<?php echo isset($info['descrip_trade1'])?$info['descrip_trade1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="trade1" value="<?php echo isset($info['trade1'])?$info['trade1']:''; ?>" style="width: 100%;"></td>
						<td width="70%"><input type="text" name="trade_in1" value="<?php echo isset($info['trade_in1'])?$info['trade_in1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="allowance1" value="<?php echo isset($info['allowance1'])?$info['allowance1']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="right-side" style="float: right; width: 35%">
				<table cellpadding="0" cellspacing="0" width="100%" style="width: 100%; border-top: 0px; border-left: 0px;">
					<tr>
						<td style="width: 60%;">FREIGHT & HDLG.</td>
						<td style="width: 22%;">$ <input type="text" name="hdlg_amt" value="<?php echo isset($info['hdlg_amt'])?$info['hdlg_amt']:''; ?>" style="width: 70%;"></td>
						<td><input type="text" name="hdlg_total" value="<?php echo isset($info['hdlg_total'])?$info['hdlg_total']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>
							<span style="display: block; padding-left: 20px;">TOTAL CASH</span>
							<label>1.DEL'D. PRICE</label>
						</td>
						<td>$ <input type="text" name="cash_amt" value="<?php echo isset($info['cash_amt'])?$info['cash_amt']:''; ?>" style="width: 70%;"></td>
						<td><input type="text" name="cash_total" value="<?php echo isset($info['cash_total'])?$info['cash_total']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="price" value="<?php echo isset($info['price'])?$info['price']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price_amt" value="<?php echo isset($info['price_amt'])?$info['price_amt']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price_total" value="<?php echo isset($info['price_total'])?$info['price_total']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="price1" value="<?php echo isset($info['price1'])?$info['price1']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price1_amt" value="<?php echo isset($info['price1_amt'])?$info['price1_amt']:''; ?>" style="width: 100%;"></td>
						<td><input type="text" name="price1_total" value="<?php echo isset($info['price1_total'])?$info['price1_total']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>2. TRADE-IN ALLOWNACE</td>
						<td>$ <input type="text" name="trade_amt" value="<?php echo isset($info['trade_amt'])?$info['trade_amt']:''; ?>" style="width: 70%;"></td>
						<td><input type="text" name="trade_total" value="<?php echo isset($info['trade_total'])?$info['trade_total']:''; ?>" style="width: 100%;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 0; float: left; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 45%; padding: 0 5px; box-sizing: borde-box;">
				<h2 style="float: left; width: 100%; text-align: center; margin: 5px 0; font-size: 16px;">INSURANCE AGREEMENT</h2>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: right; width: 30%;margin-right: 5%;">
						<label style="font-size: 10px;">REQUIRED</label>
						<input type="text" name="required" value="<?php echo isset($info['required'])?$info['required']:''; ?>" style="width: 37%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 61%;">
						<p style="font-size: 12px;"><b>THE PURCHASE OF INSURANCE COVERAGE IS</b></p>
					</div>
					<div class="form-field" style="float: left; width: 27%;margin-left: 11px;">
						<label style="font-size: 10px;">VOLUNTARY</label>
						<input type="text" name="voluntary" value="<?php echo isset($info['voluntary'])?$info['voluntary']:''; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="float: right; width: 9%;">
						<label style="font-size: 10px;">(CHECK ONE)</label>
					</div>
				</div>
				<p style="margin: 3px 0; font-size: 12px;"><b>LIST BELOW THE INSURANCE COVERAGE AVAILABLE FOR THE TERM OF CREDIT.</b></p>
				<p style="margin: 3px 0; font-size: 12px;"><b>BUYER MAY FURNISH HIS OWN INSURANCE AS MAY BE REQUIRED TO COVER ANY BALANCE DUE UNDER THIS PURCHASE AGREEMENT.</b></p>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<table cellpadding="0" cellspacing="0" width="100%" class="no-border">
						<tr>
							<td style="width: 17%; font-size: 13px;">TYPE</td>
							<td style="width: 66%; font-size: 13px;">TYPES OF INSURANCE & COST OF EACH</td>
							<td style="width: 17%; font-size: 13px;">COST</td>
						</tr>
						<tr>
							<td><input type="text" name="type1" value="<?php echo isset($info['type1'])?$info['type1']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="insu1" value="<?php echo isset($info['insu1'])?$info['insu1']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="cost1" value="<?php echo isset($info['cost1'])?$info['cost1']:''; ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="type2" value="<?php echo isset($info['type2'])?$info['type2']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="insu2" value="<?php echo isset($info['insu2'])?$info['insu2']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="cost2" value="<?php echo isset($info['cost2'])?$info['cost2']:''; ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="type3" value="<?php echo isset($info['type3'])?$info['type3']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="insu3" value="<?php echo isset($info['insu3'])?$info['insu3']:''; ?>" style="width: 100%;"></td>
							<td><input type="text" name="cost3" value="<?php echo isset($info['cost3'])?$info['cost3']:''; ?>" style="width: 100%;"></td>
						</tr>
					</table>
				</div>
				
				<h2 style="float: left; width: 100%; font-size: 14px; text-decoration: underline; text-align: center">TIME BALANCE</h2>
				<p style="float: left; width: 100%; margin: 0; font-size: 14px;"><b>I hereby agree to settle the deferred balance, if any, as shown hereon on the basis of retail time payment contract in a form that is mutually satisfactory which I will sign prior to the delivery of the goods ordered and having a total face value equal to the time balance amount and including the credit terms disclosed herein.</b></p>
			</div>
			
			<div class="right" style="float: left; width: 53%; margin: 0; padding: 0 10px; box-sizing: border-box; border-left: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">3. BALANCE</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">4. SALES TAX</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="sales_tax" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">5. SUB TOTAL</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">6. CASH WITH ORDER</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="cash_order" value="<?php echo isset($info['cash_order'])?$info['cash_order']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">7. BALANCE DUE</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="balance_due" value="<?php echo isset($info['balance_due'])?$info['balance_due']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">8. AMOUNT FINANCED</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="amt_finance" value="<?php echo isset($info['amt_finance'])?$info['amt_finance']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">9. <b>FINANCE CHARGE</b></label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="finance_charge" value="<?php echo isset($info['finance_charge'])?$info['finance_charge']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">10. TOTAL OF PAYMENTS</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="total_pay" value="<?php echo isset($info['total_pay'])?$info['total_pay']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">11. DEFERRED PAYMENT PRICE (1+9)</label>
						<span style="float: left; width: width: 3%;">$</span>
						<input type="text" name="defer_pay" value="<?php echo isset($info['defer_pay'])?$info['defer_pay']:''; ?>" style="float: right; width: 37%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 60%; padding-left: 10%; box-sizing: border-box;">12. <b>ANNUAL PERCENTAGE RATE</b></label>
						<input type="text" name="annual_rate" value="<?php echo isset($info['annual_rate'])?$info['annual_rate']:''; ?>" style="float: left; width: 37%;">
						<span style="float: right; width: width: 3%;">%</span>
					</div>
					
					<p style="float: left; width: 100%; margin: 7px 0; font-size: 13px;">Purchaser hereby agrees to pay to <input type="text" name="name" style="width: 58%;"> <input type="text" name="purchaser" value="<?php echo isset($info['purchaser'])?$info['purchaser']:''; ?>" style="width: 50%;"> at their offices shown above the "TOTAL OF PAYMENTS" shown above in <input type="text" name="office" value="<?php echo isset($info['office'])?$info['office']:''; ?>" style="width: 18%;"> installments of $ <input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 18%;"> (final payment to be $ <input type="text" name="installment" value="<?php echo isset($info['installment'])?$info['installment']:''; ?>" style="width: 18%;">) the first installment being payable <input type="text" name="final_pay" value="<?php echo isset($info['final_pay'])?$info['final_pay']:''; ?>" style="width: 18%;"> <input type="text" name="payable" value="<?php echo isset($info['payable'])?$info['payable']:''; ?>" style="width: 10%;"> and all subsequent installments on the same day of each consecutive month unit paid in full. The FINANCE CHARGE applies from <input type="text" name="finance_charge" value="<?php echo isset($info['finance_charge'])?$info['finance_charge']:''; ?>" style="width: 25%;"> (date).</p>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 10%;">
				<span style="width: 51%; display: block; margin-top: 30%; text-align: center; float: left;">CHECK ONE</span> <span style="font-size: 103px; line-height: 82px;">{</span>
			</div>
			<div class="right" style="float: left; width: 85%;  float: left; margin: 0;">
				<p style="float: left; width: 100%; font-size: 14px; margin: 2px 0;"><input type="checkbox" name="sold_checkbox" <?php echo ($info['sold_checkbox'] == "AS-IS") ? "checked" : ""; ?> value="AS-IS"/> SOLD USED AS-IS. No warrenty of any kind has been given by the dealer or his agent.</p>
				<p style="float: left; width: 100%; font-size: 14px; margin: 2px 0;"><input type="checkbox" name="sold_checkbox" <?php echo ($info['sold_checkbox'] == "50-50") ? "checked" : ""; ?> value="50-50"/> SOLD USED WITH 50-50 WARRANTY. The dealer hereby warrents this (these) machine(s) for <input type="text" name="machine" value="<?php echo isset($info['machine'])?$info['machine']:''; ?>" style="width: 20%;"> days after <input type="text" name="day" value="<?php echo isset($info['day'])?$info['day']:''; ?>" style="width: 20%; margin-right: 2%;"> <input type="text" name="day_after" value="<?php echo isset($info['day_after'])?$info['day_after']:''; ?>" style="width: 10%;"> with the understanding that necessary repairs made within this period of time will be charged half to the buyer and half to the dealer, of total retail cost of parts and labor used.</p>
				<p style="float: left; width: 100%; font-size: 14px; margin: 2px 0;"><input type="checkbox" name="sold_checkbox" <?php echo ($info['sold_checkbox'] == "new") ? "checked" : ""; ?> value="new"/> SOLD NEW WITH <input type="text" name="sold_new" value="<?php echo isset($info['sold_new'])?$info['sold_new']:''; ?>" style="width: 60%;"> (specify warrenty used)</p>
			</div>
			<p style="float: left; width: 100%;font-size: 14px;">SPECIAL AGREEMENT <input type="text" name="special_agree" value="<?php echo isset($info['special_agree'])?$info['special_agree']:''; ?>" style="width: 82%;"></p>
		</div>
		
		<p style="float: left; width: 100%; margin: 2px 0; font-size: 10px;">ALL WARRANTY REPAIRS MADE UNDER THIS AGREEMENT must be made in dealer's shop and buyer is responsible for handling equipment for repair. No warrenty is given by the dealer for tires, batteries or accessories, and the buyer is fully responsible for repairs necessltated by accident, misuse or negligence. This warrenty is not transferable. I hereby agree to the conditions of this order, expressed in the foregoing, consitituting a purchase order contract. I hereby certify that I am 21 years of age or older and acknowledge receipt of a copy of this order. In order to secure buyer's obligations under this Agreement and any extension, renewal or modification tereof, buyer hereby grants to Dealer a securiity interest in all of the goods described herein, and all accessions and additions thereto and all proceeeds thereof.</p>
		
		<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; fontt-size: 14px;"> <b style="text-decoration: underline;">Notice to the buyer:</b> Do not sign this contract before you read it or if it contains blank spaces. You are entitled  to a copy of the contract you sign. You have the right to pay in advance the unpaid balance of this contrat <br> and obtain a partial refund of the finance charge based on <span style="float: right;"><input type="text" name="digit" value="<?php echo isset($info['digit'])?$info['digit']:''; ?>" style="width: 100%;"> <label style="float: left; width: 100%; display: block; text-align: center; font-size: 11px;">ACTUARIAL METHOD, RULE OF 78's. SUM OF THE DIGITS, OTHER</label></span></p>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 75%; float: left;">
				<label>Buyer's Signature</label>
				<input type="text" name="buy_sign" value="<?php echo isset($info['buy_sign'])?$info['buy_sign']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="width: 25%; float: right;">
				<label>Date</label>
				<input type="text" name="buy_date" value="<?php echo isset($info['buy_date'])?$info['buy_date']:''; ?>" style="width: 85%;">
			</div>
		</div>
		<h2 style="float: left; width: 100%; margin: 0; font-size: 17px; text-align: center;">THIS ORDER IS VALID ONLY WHEN SIGNED AND ACCEPTED BY THE DEALER.</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 60%; float: left; margin: 16px 0 0;">
				<label>Salesman</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="width: 40%; float: right;">
				<label>Accepted by: <span style="font-size: 11px;"><br>(Dealer's signature)</span></label>
				<input type="text" name="accept_by" value="<?php echo isset($info['accept_by'])?$info['accept_by']:''; ?>" style="width: 73%;">
			</div>
		</div>
	</div>
		
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
	