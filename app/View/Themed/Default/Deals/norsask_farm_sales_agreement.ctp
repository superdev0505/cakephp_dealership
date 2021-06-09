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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; margin-bottom: 0px;}
	p{font-size: 16px; text-align: center;}
	.col input[type="text"]{border-bottom: 0px;}
	body{font-size: 12px;}
	.wraper.main input {padding: 1px;}
@media print {
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="main-wrap" style="float: left; width: 100%; border: 1px solid #000;">
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box; padding: 10px; height: 116px;">
			<div class="logo" style="float: left; width: 10%; margin:  0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/1logo.jpg'); ?>" alt="">
			</div>
			<div class="logo" style="float: left; width: 10%; margin: 22px 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/1l.jpg'); ?>" alt="">
			</div>
			
			<div class="middle" style="float: left; width: 100%; text-align: center; position: absolute; left: 0; right: 0; margin: 0 auto;">
				<h2 style="margin: 0; font-size: 17px;"><b>NORSASK FARM EQUIPMENT LTD.</b></h2>
				<p style="margin: 0; font-size: 14px;">East Hill Rd & Hwy 16, P.O. Box 49</p>
				<p style="margin: 0; font-size: 14px;">North Battleford, SK S9A 2X6</p>
				<p style="margin: 0; font-size: 14px;">Ph: (306) 445-8128 ● Fax (306) 445-2722</p>
				<h3 style="margin: 0; font-size: 17px;"><b>SALES AGREEMENT</b></h3>
			</div>
			
			<div class="logo" style="float: right; width: 8%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/3logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo" style="float: right; width: 10%; margin: 22px 10px;; text-align: right;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-11.jpg'); ?>" alt="">
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000; margin: 0;">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label><b>Name:</b></label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label><b>ACCT #:</b></label>
					<input type="text" name="acct_num" value="<?php echo isset($info['acct_num'])?$info['acct_num']:''; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>SALE DATE:</b></label>
					<input type="text" name="sale_date" value="<?php echo isset($info['sale_date'])?$info['sale_date']:''; ?>" style="width: 70%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>PICK UP DATE:</b></label>
					<input type="text" name="pick_date" value="<?php echo isset($info['pick_date'])?$info['pick_date']:''; ?>" style="width: 63%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label><b>ADDRESS:</b></label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>PHONE (H):</b></label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 71%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>(c):</b></label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label><b>CITY:</b></label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 91.5%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>(W):</b></label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 86%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 30%;">
					<label><b>PROV:</b></label>
					<input type="text" name="state_data" value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label><b>POSTAL CODE:</b></label>
					<input type="text" name="zip" value="<?php echo $info['zip']; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>EMAIL:</b></label>
					<input type="text" name="email" value="<?php echo $info['email']; ?>" style="width: 78%;">
				</div>
			</div>
			
		</div>
		
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0; border-top: 1px solid #000; border-bottom: 1px solid #000; box-sizing: border-box;">
			<div class="left" style="float: left; width: 70%;box-sizing: border-box; border-right: 1px solid #000; box-sizing: border-box;">
				<h3 style="margin: 0; padding: 3px 4px; background-color: #ddd; font-size: 16px;"><b>DESCRIPTION OF MERCHANDISE</b></h3>
				
				<div class="row" style="float: left; width: 100%; margin: 25px 0 5px; padding: 0 10px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%;">
						<label><b>MAKE:</b></label>
						<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 87%;">
					</div>
					<div class="form-field" style="float: right; width: 30%;">
						<label><b>YEAR:</b></label>
						<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 72%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%;">
						<label><b>MODEL:</b></label>
						<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 84%;">
					</div>
					<div class="form-field" style="float: right; width: 30%;">
						<label><b>COLOR:</b></label>
						<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 70%;">
						<label><b>SERIAL #:</b></label>
						<input type="text" name="serial_num" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>" style="width: 82%;">
					</div>
					<div class="form-field" style="float: right; width: 30%;">
						<label><b>SKU:</b></label>
						<input type="text" name="sku" value="<?php echo isset($info['sku'])?$info['sku']:''; ?>" style="width: 76%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 25%;">
						<label><b>STOCK #:</b></label>
						<input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="float: left; width: 45%;">
						<label><b>BASE WARR TERM:</b></label>
						<input type="text" name="warr" value="<?php echo isset($info['warr'])?$info['warr']:''; ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="float: right; width: 30%;">
						<label><b>CURR KM:</b></label>
						<input type="text" name="curr" value="<?php echo isset($info['curr'])?$info['curr']:''; ?>" style="width: 59%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 20px 0 0; padding: 0 10px 4px; box-sizing: border-box; border-bottom: 1px solid #000;">
					<h3 style="margin: 0; padding: 3px 4px; font-size: 16px;"><b>EXTENDED SERVICE POLICY:</b></h3>
					<div class="row" style="float: left; width: 100%; margin: 5px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label>MANUFACTURER EXTENDED SERVICE TERM:</label>
							<input type="text" name="manufacturer" value="<?php echo isset($info['manufacturer'])?$info['manufacturer']:''; ?>" style="width: 33%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>DEDUCT:</label>
							<input type="text" name="manu_deduct" value="<?php echo isset($info['manu_deduct'])?$info['manu_deduct']:''; ?>" style="width: 66%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label>CORCARE EXTENDED SERVICE TERM:</label>
							<input type="text" name="corcare" value="<?php echo isset($info['corcare'])?$info['corcare']:''; ?>" style="width: 43%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>DEDUCT:</label>
							<input type="text" name="cor_deduct" value="<?php echo isset($info['cor_deduct'])?$info['cor_deduct']:''; ?>" style="width: 66%;">
						</div>
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 4px 0 0; padding: 0 10px 5px; box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 15px 0 5px; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>TRAILER/UNIT# 2:</b></label>
							<input type="text" name="trailer_unit" value="<?php echo isset($info['trailer_unit'])?$info['trailer_unit']:''; ?>" style="width: 33%;">
						</div>
						<div class="form-field" style="float: right; width: 70%;">
							<label>UNIT #:</label>
							<input type="text" name="unit_num1" value="<?php echo isset($info['unit_num1'])?$info['unit_num1']:''; ?>" style="width: 88%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>MAKE:</b></label>
							<input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:''; ?>" style="width: 70%;">
						</div>
						<div class="form-field" style="float: right; width: 70%;">
							<label>MODEL:</label>
							<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" style="width: 87%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label>SERIAL #:</label>
							<input type="text" name="serial_num1" value="<?php echo isset($info['serial_num1'])?$info['serial_num1']:''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>Year:</label>
							<input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:''; ?>" style="width: 80%;">
						</div>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 21px 0 ; padding: 0 10px 3px; box-sizing: border-box; border-bottom: 1px solid #000; border-top: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>OUTBOARD:</b></label>
							<input type="text" name="outboard" value="<?php echo isset($info['outboard'])?$info['outboard']:''; ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="float: right; width: 70%;">
							<label>UNIT #:</label>
							<input type="text" name="unit_num2" value="<?php echo isset($info['unit_num2'])?$info['unit_num2']:''; ?>" style="width: 88%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>MAKE:</b></label>
							<input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:''; ?>" style="width: 69%;">
						</div>
						<div class="form-field" style="float: left; width: 40%;">
							<label>MODEL:</label>
							<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 74%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>YEAR:</label>
							<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width: 76%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label>SERIAL #:</label>
							<input type="text" name="serial_num2" value="<?php echo isset($info['serial_num2'])?$info['serial_num2']:''; ?>" style="width: 43%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>HOURS:</label>
							<input type="text" name="hours2" value="<?php echo isset($info['hours2'])?$info['hours2']:''; ?>" style="width: 71%;">
						</div>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; padding: 0 10px 0; box-sizing: border-box; border-top: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>TRADE:</b></label>
							<input type="text" name="trade" value="<?php echo isset($info['trade'])?$info['trade']:''; ?>" style="width: 66%;">
						</div>
						
						<div class="form-field" style="float: right; width: 70%;">
							<label><b>UNIT #:</b></label>
							<input type="text" name="trade_unit" value="<?php echo isset($info['trade_unit'])?$info['trade_unit']:''; ?>" style="width: 88%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label><b>MAKE:</b></label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 86%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>YEAR:</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 76%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>MODEL:</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 90.4%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 70%;">
							<label>SERIAL #:</label>
							<input type="text" name="serial_no_trade" value="<?php echo isset($info['serial_no_trade'])?$info['serial_no_trade']:''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="float: right; width: 30%;">
							<label>HOURS:</label>
							<input type="text" name="hour_trade" value="<?php echo isset($info['hour_trade'])?$info['hour_trade']:''; ?>" style="width: 69%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0; padding: 0 10px; box-sizing: border-box;">
						<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
							<label>LIEN AMOUNT OWED TO:</label>
							<input type="text" name="lien_amount" value="<?php echo isset($info['lien_amount'])?$info['lien_amount']:''; ?>" style="width: 73%;">
						</div>
						<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
							<label>FIRST LOSS PAYABLE:</label>
							<input type="text" name="loss_payable" value="<?php echo isset($info['loss_payable'])?$info['loss_payable']:''; ?>" style="width: 77%;">
						</div>
					</div>
				</div>
			</div>
			<!-- left end -->
			<!-- rightside start -->
			<div class="right" style="float: right; width: 30%; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 5px 0; padding: 0 10px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">&nbsp;</label>
						<span style="text-align: center; display: inline-block; width: 33%;"><b>PRICE</b></span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>RETAIL:</b></label>
						<input type="text" name="retail" class="total_cal" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>TRAILER TOTAL:</b></label>
						<input type="text" name="trailer_total" class="total_cal" value="<?php echo isset($info['trailer_total'])?$info['trailer_total']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">OUTBOARD:</label>
						<input type="text" name="outboard_price" class="total_cal" value="<?php echo isset($info['outboard_price'])?$info['outboard_price']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">EXTENDED WARR:</label>
						<input type="text" name="extended" class="total_cal" value="<?php echo isset($info['extended'])?$info['extended']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">ACCESSORIES:</label>
						<input type="text" name="accessories" class="total_cal" value="<?php echo isset($info['accessories'])?$info['accessories']:'0.00'; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">SHRMSTR ACCESSORIES:</label>
						<input type="text" name="shrmstr" class="total_cal" value="<?php echo isset($info['shrmstr'])?$info['shrmstr']:'0.00'; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">MISC:</label>
						<input type="text" name="misc" class="total_cal" value="<?php echo isset($info['misc'])?$info['misc']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					
					
					<div class="form-field" style="float: right; width: 100%; margin: 25px 0 3px;">
						<label style="width: 65%; text-align: right; display: inline-block;">ADMIN FEE:</label>
						<input type="text" name="admin_fee" class="total_cal" value="195.00" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>TOTAL RETAIL:</b></label>
						<input type="text" name="total_retail" id="total" value="<?php echo isset($info['total_retail'])?$info['total_retail']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">LESS TRADE IN:</label>
						<input type="text" name="trade_in" id="trade_in" class="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">DIFFERENCE:</label>
						<input type="text" name="difference" id="difference" class="subtotal_cal" value="<?php echo isset($info['difference'])?$info['difference']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>PST:</b></label>
						<input type="text" name="pst" value="11.94" class="subtotal_cal" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>GST:</b></label>
						<input type="text" name="gst" class="subtotal_cal" value="9.95" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">SCRAP TIRE FEE:</label>
						<input type="text" name="tire_fee" class="subtotal_cal" value="<?php echo isset($info['tire_fee'])?$info['tire_fee']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><span style="margin: 0 10px;">0</span> TIRES x $4.00 ea</label>
						<input type="text" name="tires" class="subtotal_cal" value="<?php echo isset($info['tires'])?$info['tires']:'0.00'; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">&nbsp;</label>
						<input type="text" name="tires_price" class="subtotal_cal" value="<?php echo isset($info['tires_price'])?$info['tires_price']:'0.00'; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>SUBTOTAL:</b></label>
						<input type="text" name="subtotal" id="subtotal" value="<?php echo isset($info['subtotal'])?$info['subtotal']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;">LIEN AMOUNT:</label>
						<input type="text" name="lien_amt" id="lien_amt" class="lien_amt" value="<?php echo isset($info['lien_amt'])?$info['lien_amt']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>SUBTOTAL:</b></label>
						<input type="text" name="subtotal_cal" id="act_subtotal" value="<?php echo isset($info['subtotal_cal'])?$info['subtotal_cal']:''; ?>" style="width: 33%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 22%; text-align: right; display: inline-block;"><b>DEP</b></label>
						<input type="text" name="dep1" id="dep1" class="dep" value="<?php echo isset($info['dep1'])?$info['dep1']:''; ?>" style="width: 75%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 3px 0;">
						<label style="width: 22%; text-align: right; display: inline-block;"><b>DEP</b></label>
						<input type="text" name="dep2" id="dep2" class="dep" value="<?php echo isset($info['dep2'])?$info['dep2']:''; ?>" style="width: 75%; text-align: center;">
					</div>
					<div class="form-field" style="float: right; width: 100%; margin: 22px 0 0;">
						<label style="width: 65%; text-align: right; display: inline-block;"><b>AMOUNT DUE:</b></label>
						<input type="text" name="amount_due" id="amount_due" value="<?php echo isset($info['amount_due'])?$info['amount_due']:''; ?>" style="width: 33%; text-align: center; font-weight: bold;">
					</div>
					
					
				</div>
			</div>
			<!-- rightside end -->
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box; padding: 7px; background-color: #ededed;">
			<p style="font-size: 12px; margin: 0;">"THE PURCHASER AGREES THAT THE OWNERSHIP AND RIGHT OF PROPERTY OF THE GOODS PURCHASED SHALL NOT PASS TO THE PURCHASER UNTIL ALL MONIES PAYABLE HEREUNDER ARE FULLY PAID AND SATISFIED AND FURTHER THAT IF THE GOODS PURCHASED ARE DISPOSED OF OR DAMAGED WHILE IN THE PURCHASER'S POSSESSION, THE SELLER SHALL HAVE THE RIGHT TO DAMAGES IN ADDITION TO ANY RIGHT OF REPOSSESSION, IN ADDITION TO THE SELLER'S OTHER LEGAL RIGHTS UNDER THE CONTRACT, THE PURCHASER HEREBY GRANTS, ASSIGNS AND CONVEYS TO THE SELLER AND ACKNOWLEDGES THAT THE SELLER SHALL HAVE AND RETAIN A SECURITY INTEREST IN THE VEHICLE AND THE PROCEEDS THEREOF IN ACCORDANCE WITH THE APPLICABLE PERSONAL PROPERTY SECURITY LAWS SHOULD THE PURCHASER FAIL TO MAKE ANY PAYMENT UNDER THIS CONTRACT WHEN DUE, HAVE HIS CHEQUE DISHONOURED BY A FINANCIAL INSTITUTION, OR BREACH ANY OTHER PROVSISION OF THIS CONTRACT, THE SELLER MAY TAKE POSSESSION OF THE GOODS WHEREVER THEY MAY BE FOUND SO LONG AS REPOSSESSION IS DONE PEACEFULLY, ANY PERSONAL GOODS ATTACHED TO OR FOUND IN THE SAID GOODS MAY BE TAKEN AND HELD FOR THE PURCHASER" SIGNING BELOW INDICATES THE PURCHASER HAS READ THE SELLER'S AGREEMENT AND HAS SELECTED THE APPROPRIATE OPTION FROM THE WAIVER ON THE FOLLOWING PAGE. THE PURCHASER UNDERSTANDS THAT ANY PRODUCTS OR SERVICES OFFERED MAY NOT BE AVAIALBLE AFTER THE PURCHASED DATE.</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px;">
			<div class="form-field" style="float: left; width: 100%; margin: 1px 0;">
				<label style="width: 5%; display: inline-block;"><b>PER:</b></label>
				<label>CHRIS INKSTER</label>
				<input type="text" name="chris_ink" value="<?php echo isset($info['chris_ink'])?$info['chris_inks']:''; ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 1px 0;">
				<label style="width: 5%; display: inline-block;">&nbsp;</label>
				<label>DUSTIN DMYTRYSHYM</label>
				<input type="text" name="dustin" value="<?php echo isset($info['dustin'])?$info['dustin']:''; ?>" style="width: 25%;">
				x<input type="text" name="dustin_x" value="<?php echo isset($info['dustin_x'])?$info['dustin_x']:''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 1px 0;">
				<label style="width: 5%; display: inline-block;">&nbsp;</label>
				<label>OTHER</label>
				<input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="width: 36%;">
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


	//calculate();

	 function total_price() {
        var total = 0.00;
        $( ".total_cal" ).each(function( index ) {
            total += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
        });
        var trade_in = isNaN(parseFloat($("#trade_in").val()))?0.00:parseFloat($("#trade_in").val());
        var difference = total - trade_in;
        $("#total").val(total.toFixed(2));
        $("#difference").val(difference.toFixed(2));
        subtotal_price();
    }
	
	$(".total_cal, .trade_in").on('change keyup paste',function(){
        total_price();
    });
     
	function subtotal_price() {
	    var subtotal = 0.00;
	    $( ".subtotal_cal" ).each(function( index ) {
	        subtotal += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
	    });
	    var lien_amt = isNaN(parseFloat($("#lien_amt").val()))?0.00:parseFloat($("#lien_amt").val());
	    var act_subtotal = subtotal + lien_amt;
	    $("#subtotal").val(subtotal.toFixed(2));
	    $("#act_subtotal").val(act_subtotal.toFixed(2));
	    var dep1 = isNaN(parseFloat($("#dep1").val()))?0.00:parseFloat($("#dep1").val());
	    var dep2 = isNaN(parseFloat($("#dep2").val()))?0.00:parseFloat($("#dep2").val());
	    var amount = act_subtotal - dep1 - dep2;
	    $("#amount_due").val(amount.toFixed(2));
	}

	$(".subtotal_cal, .lien_amt, .dep").on('change keyup paste',function(){
        subtotal_price();
    });

});

	
	
	
	
	
</script>
</div>
