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
	label{font-size: 11px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 30.7% !important;}
	.third-page {margin-top: 10.5% !important;}
	.four-page {margin-top: 12% !important;}
	.fifth-page {margin-top: 6% !important;}
	.six-page {margin-top: 6% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h3 style="float: left; width: 100%; margin: 3px 0; font-size: 18px; text-align: right;"><b>AZ-103-ARB 10/10/2015</b></h3>
		<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 22px; text-align: center;"><b>Retail Installment Contract and Security Agreement</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="one-third" style="float: left; width: 33%; box-sizing: border-box;">
				<p style="float: left; width: 100%; margin: 2px 0; font-size; 12px;"><b>Seller Name and Address</b></p>
				<p style="float: left; width; 100%; margin: 4px 0;">RV Sales of New Mexico <br> 2109 US RT 66 <br> Moriarty NM 87035 <br> 505-832-2400</p>
			</div>
			<div class="one-third" style="float: left; width: 33%; box-sizing: border-box;">
				<p style="float: left; width: 100%; margin: 2px 0; font-size; 12px;"><b>Buyer(s) Name(s) and Address(es)</b></p>
				<textarea name="buyer_note" style="width: 99%;; border: 0px; height: 60px;"><?php echo isset($info['buyer_note'])?$info['buyer_note']:'' ?></textarea>
			</div>
			<div class="one-third" style="float: left; width: 33%; box-sizing: border-box;">
				<p style="float: left; width: 100%; margin: 2px 0; font-size; 12px;"><b>Summary</b></p>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label><b>No.</b></label>
					<input type="text" name="no"   value="<?php echo isset($info["no"]) ? $info['no'] : ''?>" style="width: 90%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label><b>Date.</b></label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 90%; float: right;">
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 13px;"><label><b><input type="checkbox" name="business" <?php echo (isset($info['business_check']) && $info['business_check']=='business')?'checked="checked"':''; ?> value="business"> Business, commercial or agricultural purpose Contract.</b></label></p>
		
		<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 17px;"><i>Truth-In-Lending Disclosure</i></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 20%; border: 3px solid #000; box-sizing: border-box; padding: 3px;">
				<h3 style="float: left; width: 100%; margin: 0 0 3px; font-size: 15px; text-align: center;"><b>Annual Percentage Rate</b></h3>
				<p style="float: left; width: 100%; margin: 2px 0 56px; font-size: 13px; text-align: center;">The cost of your credit as yearly rate.</p>
				<input type="text" name="annual" value="<?php echo isset($info["annual"]) ? $info['annual'] : ''?>" style="width: 90%; %">
			</div>
			<div class="form-field" style="float: left; width: 20%; border: 3px solid #000; box-sizing: border-box; padding: 3px;">
				<h3 style="float: left; width: 100%; margin: 0 0 3px; font-size: 15px; text-align: center;"><b>Finance Charge</b></h3>
				<p style="float: left; width: 100%; margin: 2px 0 55px; text-align: center; font-size: 13px;">The dollor amount the credit will cost you.</p>
				$ <input type="text" name="finance" value="<?php echo isset($info["finance"]) ? $info['finance'] : ''?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; border: 3px solid #000; box-sizing: border-box; padding: 3px;">
				<h3 style="float: left; width: 100%; margin: 0 0 3px; font-size: 15px; text-align: center;"><b>Amount Financed</b></h3>
				<p style="float: left; width: 100%; text-align: center; margin: 2px 0 55px; font-size: 13px;">The amount of credit provided to you or on your behalf.</p>
				$ <input type="text" name="amount" value="<?php echo isset($info["amount"]) ? $info['amount'] : ''?>" style="width: 90%; %">
			</div>
			<div class="form-field" style="float: left; width: 20%; border: 3px solid #000; box-sizing: border-box; padding: 3px;">
				<h3 style="float: left; width: 100%; margin: 0 0 3px; font-size: 15px; text-align: center;"><b>Total of Payments</b></h3>
				<p style="float: left; text-align: center; width: 100%; margin: 2px 0 39px; font-size: 13px;">The amount you will have paid when you have made all scheduled payments.</p>
				$ <input type="text" name="payments" value="<?php echo isset($info["payments"]) ? $info['payments'] : ''?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; border: 3px solid #000; box-sizing: border-box; padding: 3px;">
				<h3 style="float: left; width: 100%; margin: 0 0 3px; font-size: 15px; text-align: center;"><b>Total Sale Price</b></h3>
				<p style="float: left; text-align: center; width: 100%; margin: 2px 0 20px; font-size: 13px;">The cost of your purchase on credit, including your down Payment of</p>
				$ <input type="text" name="sale_price1" value="<?php echo isset($info["sale_price1"]) ? $info['sale_price1'] : ''?>" style="width: 60%;"> <b>0.00</b> <br>
				$ <input type="text" name="sale_price2" value="<?php echo isset($info["sale_price2"]) ? $info['sale_price2'] : ''?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style="box-sizing: border-box; float: left; padding: 5px; width: 1005; margin: 0; border: 3px solid #000; border-top: 0px;">
			<p style="float: left; width: 100%; margin; 0; font-size: 13px;"><b>Payment Schedule.</b> Your payment schedule is: <input type="text" name="payment_schedule" value="<?php echo isset($info["payment_schedule"]) ? $info['payment_schedule'] : ''?>" style="width: 60%; border: 0px;"></p>
			<div class="cover" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 18%; margin-right: 5%;">
					<label>No. of payments</label>
				</div>
				<div class="form-field" style="float: left; width: 28%;">
					<label>Amount of Payments</label>
				</div>
				<div class="form-field" style="float: right; width: 48%;">
					<label>When Payments</label>
				</div>
			</div>
			<div class="cover" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 18%; margin-right: 5%;">
					<input type="text" name="payment_no1" value="<?php echo isset($info["payment_no1"]) ? $info['payment_no1'] : ''?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 28%;">
					$ <input type="text" name="payment_no2" value="<?php echo isset($info["payment_no2"]) ? $info['payment_no2'] : ''?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 48%;">
					<input type="text" name="payment_no3" value="<?php echo isset($info["payment_no3"]) ? $info['payment_no3'] : ''?>" style="width: 100%;">
				</div>
			</div>
			<div class="cover" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 18%; margin-right: 5%;">
					<input type="text" name="payment_amt1" value="<?php echo isset($info["payment_amt1"]) ? $info['payment_amt1'] : ''?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 28%;">
					$ <input type="text" name="payment_amt2" value="<?php echo isset($info["payment_amt2"]) ? $info['payment_amt2'] : ''?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 48%;">
					<input type="text" name="payment_amt3" value="<?php echo isset($info["payment_amt3"]) ? $info['payment_amt3'] : ''?>" style="width: 100%;">
				</div>
			</div>
			<div class="cover" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 18%; margin-right: 5%;">
					<input type="text" name="payment_when1" value="<?php echo isset($info["payment_when1"]) ? $info['payment_when1'] : ''?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 28%;">
					$ <input type="text" name="payment_when2" value="<?php echo isset($info["payment_when2"]) ? $info['payment_when2'] : ''?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 48%;">
					<input type="text" name="payment_when3" value="<?php echo isset($info["payment_when3"]) ? $info['payment_when3'] : ''?>" style="width: 100%;">
				</div>
			</div>
			
			<p style="float: left; width: 100%; margin; 5px 0; font-size: 13px;"><b>Security:</b> You are giving us a security interest  in the Property Purchased.</p>
			<p style="float: left; width: 100%; margin; 5px 0; font-size: 13px;"><b>Late Charge. </b> If all or any portion of a payment is not paid within 10 days of its due date, you will be charged a late change of 5% of the unpaid amount of the payment due.</p>
			<p style="float: left; width: 100%; margin; 5px 0; font-size: 13px;"><b>Prepayment</b> If you pay off this Contract early, you will not have to pay a penalty.</p>
			<p style="float: left; width: 100%; margin; 5px 0; font-size: 13px;"><b>Contract Provisions.</b> You can see the terms of this Contract for any additional information about nonpayment, default, any required repayment before the scheduled date, and prepayment refunds and penalties.</p>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 5px 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 17px;"><i>Arizona Used Motor Vehicle Warranty</i></h2>
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 13px;">This section applies to used vehicle only. <b>The Seller hereby warrants that this Vehicle will be fit for the ordinary purpose for which the Vehicle is used for 15 days or 500 miles after delivery, whichever is earlier, except with regards to particular defects disclosed on the first page of this agreement. You (the purchaser) will have to pay $25.00 for each of the first two repairs if the warranty is violated.</b></p>
			
			<p style="float: left; width: 100%; margin: 5px 0; font-size: 13px;"><b>Attention Purchaser. SIgn here only if the dealer told you that this Vehicle has the following problem(s) and that you agree to buy the Vehicle on those terms:</b></p>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 30%;">
					<span style="display: block;"> 1. <input type="text" name="attention1" value="<?php echo isset($info["attention1"]) ? $info['attention1'] : ''?>" style="width: 90%"></span>
					<span style="display: block; margin: 10px 0;"> 2. <input type="text" name="attention2" value="<?php echo isset($info["attention2"]) ? $info['attention2'] : ''?>" style="width: 90%"></span>
					<span style="display: block;"> 3. <input type="text" name="attention3" value="<?php echo isset($info["attention3"]) ? $info['attention3'] : ''?>" style="width: 90%"></span>
				</div>
				
				<div class="right" style="float: right; width: 60%;">
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by1" value="<?php echo isset($info["by1"]) ? $info['by1'] : ''?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
						
						<input type="text" name="by1_date" value="<?php echo isset($info["by1_date"]) ? $info['by1_date'] : ''?>" style="width: 70%; margin-bottom: 4px;">
							<label style="display: block;">Date</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by2" value="<?php echo isset($info["by2"]) ? $info['by2'] : ''?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
						
						<input type="text" name="by2_date" value="<?php echo isset($info["by2_date"]) ? $info['by2_date'] : ''?>" style="width: 70%; margin-bottom: 4px;">
							<label style="display: block;">Date</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by3" value="<?php echo isset($info["by3"]) ? $info['by3'] : ''?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
						
						<input type="text" name="by3_date" value="<?php echo isset($info["by3_date"]) ? $info['by3_date'] : ''?>" style="width: 70%; margin-bottom: 4px;">
							<label style="display: block;">Date</label>
						</div>
					</div>
				</div>
			</div>

			<h2 class="second-page" style="float: left; width: 100%; margin: 35px 0 3px; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px; font-size: 18px;"><i>Warranties</i></h2>
		
		<p style="float: left; width: 100%; margin; 5px 0; font-size: 13px;">Unless the Seller makes a written warranty or enters into a service contract within 90 days from the date of this contract, the Seller makes no warranties on the Vehicle, except as described above for used vehicles. Making no warranties means that the Seller is selling the Vehicle as is not expressly warranted or guaranteed and without implied warranties of merchantability (except as described above) or fitness for a particular purpose. This provision does not affect any warranties cowing the Vehicle that the Vehicle manufacturer may provide.</p>
		
		<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Descripition of Property</i></h2>
		
		<div class="row no-border" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; padding: 3px; text-align: center; border-right: 1px solid #000;">
				<label>Year</label>
				<input type="text" name="year"  value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; text-align: center; border-right: 1px solid #000;">
				<label>Make</label>
				<input type="text" name="make"  value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; text-align: center; border-right: 1px solid #000;">
				<label>Model</label>
				<input type="text" name="model"  value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 16%; box-sizing: border-box; padding: 3px; text-align: center; border-right: 1px solid #000;">
				<label>Style</label>
				<input type="text" name="style"  value="<?php echo isset($info['style']) ? $info['style'] : ''; ?>" style="width: 100%; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; text-align: center; border-right: 1px solid #000;">
				<label>Vehicle Identification Number</label>
				<input type="text" name="vin"  value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%; text-align: center;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 3px; text-align: center;">
				<label>Odometer Mileage</label>
				<input type="text" name="odometer"  value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; margin: 0; border-top: 0px;">
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 3px; text-align: left;">
				<label style="display: block;"><input type="radio" name="condition_check" value="new" <?php echo (isset($info['condition_check']) && $info['condition_check']=='new')?'checked="checked"':''; ?> /> New</label>
				<label style="display: block;"><input type="radio" name="condition_check" value="used" <?php echo (isset($info['condition_check']) && $info['condition_check']=='used')?'checked="checked"':''; ?> /> Used</label>
				<label style="display: block;"><input type="radio" name="condition_check" value="demo" <?php echo (isset($info['condition_check']) && $info['condition_check']=='demo')?'checked="checked"':''; ?> /> Demo</label>
			</div>
			<div class="form-field" style="float: left; width: 82%; box-sizing: border-box; padding: 3px; text-align: center; border-left: 1px solid #000;">
				<label>Other</label>
				<textarea name="term_note" style="width: 99%; border: 0px;; height: 50px;"><?php echo isset($info['term_note']) ? $info['term_note'] : ''; ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Descripition of Trade-In</i></h2>
				<textarea name="description" style="width: 100%; float: left; height: 70px; border: 0px;"><?php echo isset($info['description']) ? $info['description'] : ''; ?></textarea>
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Conditional Delivery</i></h2>
				<p style="float: left; width: 100%; margin: 0; font-size: 12px;"> <input type="checkbox" name="name"> <b>Conditional Delivery. If checked you agree that the following agreement regarding securing financing ("Agreement") applies: <input type="text" name="title1"  value="<?php echo isset($info['title1']) ? $info['title1'] : ''; ?>" style="width: 33%"> <br> <input type="text" name="title2"  value="<?php echo isset($info['title2']) ? $info['title2'] : ''; ?>" style="width: 50%">. The agreement is part of this contract. The agreement will no longer control after the assignment is accepted. If there are any conflicts between the terms of the Agreement and the Contract, the terms of this Contract will apply. </b></p>
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Sales Agreement</i></h2>
				<p style="float: left; width: 100%; margin: 0 0 25px; font-size: 12px;"><b>Payment.</b> You promise to pay us the principal amount of  <br> $ <input type="text" name="title3"  value="<?php echo isset($info['title3']) ? $info['title3'] : ''; ?>" style="width: 30%;"> plus finance changes accruing on the unpaid balance at the rate of <input type="text" name="title4"  value="<?php echo isset($info['title4']) ? $info['title4'] : ''; ?>" style="width: 20%;"> % per year from the date of this Contract until maturity. After maturity, or after you defaut and we demand payment, we will charge finance charges on the unpaid balance at <input type="text" name="title5"  value="<?php echo isset($info['title5']) ? $info['title5'] : ''; ?>" style="width: 30%;"> % per year. You agree to pay this Contract according to the payment schedule and late charge provisions shown in the Truth-in-Lending Disclosure. You also agree to pay any additional amounts according to the terms and conditions of this Contract. </p>
				<p style="float: left; width: 100%; margin: 5px 0 10px; font-size: 12px;"><b>Down Payment.</b> You also agree to pay or apply to the Cash Price, on or before the date of this Contract, any cash, rebate and net trade in value described in the Itemization of Amount Financed.</i></p>
				<p style="float: left; width: 100%; margin: 5px 0 10px; font-size: 12px;"><input type="checkbox" name="payment_check" <?php echo ($info['payment_check'] == "payment") ? "checked" : ""; ?> value="payment"> You agree to make deferred down payments as forth in your Payments Schedule.</p>
			</div>
			
			<div class="right" style="float: left; width: 50%; border-left: 1px solid #000; box-sizing: border-box; padding: 15px;">
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Itemization of Amount Financed</i></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 65%;">a. <b>Cash Price</b> of Vehicle etc, incl sales tax of</label> <br>
					<span style="float: left;">$</span><input type="text" name="item1"  value="<?php echo isset($info['item1']) ? $info['item1'] : ''; ?>" style="width: 60%; float: left; margin-right: 14px;"> 	
					<input type="text" name="cash_price" id="cash_price" class="price" value="<?php echo isset($info['cash_price']) ? $info['cash_price'] : ''; ?>" style="width: 31%; float: right; text-align: right;">$
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; width: 60%;">b. Trade in allowance</label>  	
					<span style="width: 35%; float: right;">$ <input type="text" name="trade_allowance" id="trade_allowance" class="price" value="<?php echo isset($info['trade_allowance']) ? $info['trade_allowance'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">c. Less Amount owing paid to include k):</label> <br>
					<input type="text" name="item2" value="<?php echo isset($info['item2']) ? $info['item2'] : ''; ?>" style="width: 60%; float: left;"> 	
					<input type="text" name="amount" id="amount" class="price" value="<?php echo isset($info['amount']) ? $info['amount'] : ''; ?>" style="width: 35%; float: right; text-align: right;"> 	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">d. Net trade in (b c; if negative, enter $0 here and enter the amount on line k)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="negative" id="negative" class="price" value="<?php echo isset($info['negative']) ? $info['negative'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">e. Cash payment</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="cash_payment" id="cash_payment" class="price" value="<?php echo isset($info['cash_payment']) ? $info['cash_payment'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">f. Manufacturer's rebate</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="manufacture" id="manufacture" class="price" value="<?php echo isset($info['manufacture']) ? $info['manufacture'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">g. Deferred down payment </label>
					<span style="width: 35%; float: right;">$ <input type="text" name="deferred" id="deferred" class="price" value="<?php echo isset($info['deferred']) ? $info['deferred'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">h. Other down payment (describe)</label> <br>
					<input type="text" name="item3" value="<?php echo isset($info['item3']) ? $info['item3'] : ''; ?>" style="width: 60%; float: left;"> 	
					<input type="text" name="describe" id="describe" class="price" value="<?php echo isset($info['describe']) ? $info['describe'] : ''; ?>" style="width: 35%; float: right; text-align: right;"> 	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">i. <b>Down payment</b> (d + e + f + g + h)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="down_pay" id="down_pay" class="price" value="<?php echo isset($info['down_pay']) ? $info['down_pay'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">j. <b>Unpaid balance of Cash Price</b> (a - i)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="unpaid" id="unpaid" class="price" value="<?php echo isset($info['unpaid']) ? $info['unpaid'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">k. Financed tarde-in balance (see line d)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="financed" id="financed" class="price" value="<?php echo isset($info['financed']) ? $info['financed'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">l. Paid tarde-in officials, including filing fees</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="paid" id="paid" class="price" value="<?php echo isset($info['paid']) ? $info['paid'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">m. Insurance  premiums paid to insurance comapany(ies)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="insurance" id="insurance" class="price" value="<?php echo isset($info['insurance']) ? $info['insurance'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">n. Service Contarct paid to:</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="service" id="service" class="price" value="<?php echo isset($info['service']) ? $info['service'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">o. To <input type="text" name="item4" value="<?php echo isset($info['item4']) ? $info['item4'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price1" id="price1" class="price" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">p. To <input type="text" name="item5" value="<?php echo isset($info['item5']) ? $info['item5'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price2" id="price2" class="price" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">q. To <input type="text" name="item6" value="<?php echo isset($info['item6']) ? $info['item6'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price3" id="price3" class="price" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">r. To <input type="text" name="item7" value="<?php echo isset($info['item7']) ? $info['item7'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price4" id="price4" class="price" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">s. To <input type="text" name="item8" value="<?php echo isset($info['item8']) ? $info['item8'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price5" id="price5" class="price" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">t. To <input type="text" name="item9" value="<?php echo isset($info['item9']) ? $info['item9'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price6" id="price6" class="price" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">u. To <input type="text" name="item10" value="<?php echo isset($info['item10']) ? $info['item10'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price7" id="price7" class="price" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">v. To <input type="text" name="item11" value="<?php echo isset($info['item11']) ? $info['item11'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price8" id="price8" class="price" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">w. To <input type="text" name="item12" value="<?php echo isset($info['item12']) ? $info['item12'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price9" id="price9" class="price" value="<?php echo isset($info['price9']) ? $info['price9'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">x. To <input type="text" name="item13" value="<?php echo isset($info['item13']) ? $info['item13'] : ''; ?>" style="width: 60%; float: right;"></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="price10" id="price10" class="price" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 65%;">y. <b>Total Other Charges/Amts Paid</b> (k thru x)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="amt" id="amt" class="price" value="<?php echo isset($info['amt']) ? $info['amt'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">z. <b>Prepaid Finance Charge</b></label>
					<span style="width: 35%; float: right;">$ <input type="text" name="charge" id="charge" class="price" value="<?php echo isset($info['charge']) ? $info['charge'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 60%;">aa. <b>Amount Financed</b> (j + y + z)</label>
					<span style="width: 35%; float: right;">$ <input type="text" name="amt_financed" id="amt_financed" class="price" value="<?php echo isset($info['amt_financed']) ? $info['amt_financed'] : ''; ?>" style="width: 90%; float: right; text-align: right;"> </span>	
				</div>
				
				<p style="float: left; width: 100%; margin: 4px 0; font-size: 12px;">We may retain or receive a portion of any amounts paid to others.</p>
				
				<div class="row" style="row" style="box-sizing: border-box; padding: 6px; border: 1px solid #000; padding: 8px;">
					<label style="float: left; width: 95%; display: block; border: 1px solid #000; margin-left: 10px; padding: 10px;"><b>Broker Fee <input type="checkbox" name="broker_check" <?php echo ($info['broker_check'] == "broker") ? "checked" : ""; ?> value="broker"/> If this box is checked, this Contract is subject to a broker fee paid by the Seller to </b> <input type="text" name="broker" value="<?php echo isset($info['broker']) ? $info['broker'] : ''; ?>" style="width: 50%;"></label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%;">
				<p style="font-size: 11px;">Retail Installment Contract. AZ Not for use in transactions socured by a dwalling <br> bankers Systems TM VMP <br> Wolters Kluwer Finacial Services @ 2015</p>
			</div>
			<div class="right" style="float: left; width: 48%; text-align: right;">
				<p style="font-size: 11px; margin: 0;">RSSIMVLFAZAZ 10/10/2015 <br> <input type="text" name="initial" value="<?php echo isset($info['initial']) ? $info['initial'] : ''; ?>" style="width: 16%;"> <br> <b style="font-size: 16px;">Customers Initial Here</b></p>
			</div>
			
		</div>

		<div class="row third-page" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000; margin-top: 25px;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Insurance Disclosures</i></h2>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Credit Insurance.</b> Credit life and credit disablity (accident and health) are not required to obtain credit and are not a factor in the credit decision. We will not provide them unless you sign and agree to pay the additional premium. if you want such insurance, we will obtain it for you (if quality for coverage). We are quoting below only the coverages you have chosen to purchase. </p>
				
				<h5 style="width: 100%; float: left; margin: 5px 0; font-size: 15px;"><b>Credit Life</b></h5>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">
					<label><input type="checkbox" name="single_status" value="single" <?php echo ($info['single_status'] == "single") ? "checked" : ""; ?> /> Single</label>
					<label style="margin: 0 4%;"><input type="checkbox" name="joint_status" value="joint" <?php echo ($info['joint_status'] == "joint") ? "checked" : ""; ?> /> Joint</label>
					<label><input type="checkbox" name="none_status" value="none" <?php echo ($info['none_status'] == "none") ? "checked" : ""; ?> /> None</label>
				</p>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 60%; float: left;">
						<label>Premium $</label>
						<input type="text" name="premiun_life"  value="<?php echo isset($info['premiun_life']) ? $info['premiun_life'] :  ''; ?>" style="width: 73%;">
					</div>
					<div class="form-field" style="width: 40%; float: left;">
						<label>Term</label>
						<input type="text" name="term_life"  value="<?php echo isset($info['term_life']) ? $info['term_life'] :  ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label>Insured</label>
						<input type="text" name="insured"  value="<?php echo isset($info['insured']) ? $info['insured'] :  ''; ?>" style="width: 85%;">
					</div>
				</div>
				
				<h5 style="width: 100%; float: left; margin: 5px 0; font-size: 15px;"><b>Credit Disability</b></h5>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">
					<label><input type="checkbox" name="single_disability" value="single" <?php echo ($info['single_disability'] == "single") ? "checked" : ""; ?> /> Single</label>
					<label style="margin: 0 4%;"><input type="checkbox" name="joint_disability" value="joint" <?php echo ($info['joint_disability'] == "joint") ? "checked" : ""; ?> /> Joint</label>
					<label><input type="checkbox" name="none_disability" value="none" <?php echo ($info['none_disability'] == "none") ? "checked" : ""; ?> /> None</label>
				</p>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 60%; float: left;">
						<label>Premium $</label>
						<input type="text" name="premium_disablility"  value="<?php echo isset($info['premium_disablility']) ? $info['premium_disablility'] :  ''; ?>" style="width: 73%;">
					</div>
					<div class="form-field" style="width: 40%; float: left;">
						<label>Term</label>
						<input type="text" name="term_disablility"  value="<?php echo isset($info['term_disablility']) ? $info['term_disablility'] :  ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left;">
						<label>Insured</label>
						<input type="text" name="insured_disability"  value="<?php echo isset($info['insured_disability']) ? $info['insured_disability'] :  ''; ?>" style="width: 85%;">
					</div>
				</div>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">Your signature below means you want (only) the insurance coverage (s) quoted above. If "None" is checked, you have declined the coverage we offered.</p>
				
				
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by1"  value="<?php echo isset($info['by1']) ? $info['by1'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by1_dob"  value="<?php echo isset($info['by1_dob']) ? $info['by1_dob'] :  ''; ?>" style="width: 80%; margin-bottom: 4px;">
							<label style="display: block;">DOB</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by2"  value="<?php echo isset($info['by2']) ? $info['by2'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by2_dob"  value="<?php echo isset($info['by2_dob']) ? $info['by2_dob'] :  ''; ?>" style="width: 80%; margin-bottom: 4px;">
							<label style="display: block;">DOB</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by3"  value="<?php echo isset($info['by3']) ? $info['by3'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by3_dob"  value="<?php echo isset($info['by3_dob']) ? $info['by3_dob'] :  ''; ?>" style="width: 80%; margin-bottom: 4px;">
							<label style="display: block;">DOB</label>
						</div>
					</div>
					
					<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Property Insurance.</b> You must insure the Property. You may purchase or provide the insurance through any insurance company reasonably acceptable to us. The collision coverage deductible may not exceed $ <input type="text" name="title1"  value="<?php echo isset($info['title1']) ? $info['title1'] :  ''; ?>" style="width: 25%;"> . If you get insurance from or through us you will pay $ <input type="text" name="title2"  value="<?php echo isset($info['title2']) ? $info['title2'] :  ''; ?>" style="width: 38%;"> for <input type="text" name="title3"  value="<?php echo isset($info['title3']) ? $info['title3'] :  ''; ?>" style="width: 38%;"> of coverage</p>
				
					<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">This premium is calculated as follows:</p>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="display: inline-block; width: 60%;"> <input type="checkbox" name="price1_check" value="price1" <?php echo ($info['price1_check'] == "price1") ? "checked" : ""; ?> /> $<input type="text" name="price1"  value="<?php echo isset($info['price1']) ? $info['price1'] :  ''; ?>" style="width: 30%;"> Deductible, Collision Cov.</label>
						<span style="width: 35%; float: right;">$ <input type="text" name="price2"  value="<?php echo isset($info['price2']) ? $info['price2'] :  ''; ?>" style="width: 90%; float: right; text-align: center;"> </span>	
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="display: inline-block; width: 62%;"> <input type="checkbox" name="price3_check" value="price3" <?php echo ($info['price3_check'] == "price3") ? "checked" : ""; ?> /> $<input type="text" name="price3"  value="<?php echo isset($info['price3']) ? $info['price3'] :  ''; ?>" style="width: 30%;"> Deductible, Comprehensive</label>
						<span style="width: 35%; float: right;">$ <input type="text" name="price4"  value="<?php echo isset($info['price4']) ? $info['price4'] :  ''; ?>" style="width: 90%; float: right; text-align: center;"> </span>	
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="display: inline-block; width: 60%;"><input type="checkbox" name="price5_check" value="price5" <?php echo ($info['price5_check'] == "price5") ? "checked" : ""; ?> /> Fire Theft and Combined Additional Cov.</label>
						<span style="width: 35%; float: right;">$ <input type="text" name="price6"  value="<?php echo isset($info['price6']) ? $info['price6'] :  ''; ?>" style="width: 90%; float: right; text-align: center;"> </span>	
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="display: inline-block; width: 60%;"> <input type="checkbox" name="price7_check" value="price7" <?php echo ($info['price7_check'] == "price7") ? "checked" : ""; ?> /> <input type="text" name="name" style="width: 80%;"> </label>
						<span style="width: 35%; float: right;">$  <input type="text" name="price8"  value="<?php echo isset($info['price8']) ? $info['price8'] :  ''; ?>" style="width: 90%; float: right; text-align: center;"> </span>	
					</div>
					
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;"><input type="checkbox" name="price9_check" value="price9" <?php echo ($info['price9_check'] == "price9") ? "checked" : ""; ?> /> <b> Single interest Insurance</b> You must purchase single interest insurance  as part of this sale transaction. You may purchase the coverage from a comppany of your choice, reasonably acceptable to us. If you buy the coverage from or through us, you will pay <br> $ <input type="text" name="price10"  value="<?php echo isset($info['price10']) ? $info['price10'] :  ''; ?>" style="width: 40%"> for <input type="text" name="price11"  value="<?php echo isset($info['price11']) ? $info['price11'] :  ''; ?>" style="width: 40%"> <br> of coverage</p>
			</div>

			<div class="right" style="float: left; width: 50%; border-left: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Additional Protections</i></h2>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">You may buy of the following voluntary protection plans. They are not required to obtain credit, are not a factor in the credit decision, and are not a factor in the terms of the credit or the related sale of the Vehicle. The voluntary protections will not be provided unless you sign and agree to pay the additional cost.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">Your signature below means that you want the described item and that you have received and reviewed a copy of the contract(s) for the products(s). If no coverage or charge is given for an item, you have declined any such coverage we offered.</p>
				
				<h5 style="width: 100%; float: left; margin: 2px 0; font-size: 15px;"><input type="checkbox" name="service_check" value="service" <?php echo ($info['service_check'] == "service") ? "checked" : ""; ?> /> <b>Service Contract</b></h5>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Term</label>
					<input type="text" name="term_service"  value="<?php echo isset($info['term_service']) ? $info['term_service'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Price</label>
					$<input type="text" name="price_service"  value="<?php echo isset($info['price_service']) ? $info['price_service'] :  ''; ?>" style="width: 63%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Coverage</label>
					<input type="text" name="coverage_service"  value="<?php echo isset($info['coverage_service']) ? $info['coverage_service'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<h5 style="width: 100%; float: left; margin: 2px 0; font-size: 15px;"><input type="checkbox" name="gap_check" value="gap" <?php echo ($info['gap_check'] == "gap") ? "checked" : ""; ?> /> <b>Gap Waiver or Gap Coverage</b></h5>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Term</label>
					<input type="text" name="gap_term"  value="<?php echo isset($info['gap_term']) ? $info['gap_term'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Price</label>
					$<input type="text" name="gap_price"  value="<?php echo isset($info['gap_price']) ? $info['gap_price'] :  ''; ?>" style=" width: 63%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Coverage</label>
					<input type="text" name="gap_coverage"  value="<?php echo isset($info['gap_coverage']) ? $info['gap_coverage'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<h5 style="width: 100%; float: left; margin: 5px 0; font-size: 15px;"><input type="checkbox" name="title_check" value="title" <?php echo ($info['title_check'] == "title") ? "checked" : ""; ?> /> <b><input type="text" name="check_title"  value="<?php echo isset($info['check_title']) ? $info['check_title'] :  ''; ?>" style="width: 50%;"></b></h5>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Term</label>
					<input type="text" name="title_term"  value="<?php echo isset($info['title_term']) ? $info['title_term'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Price</label>
					$<input type="text" name="title_price"  value="<?php echo isset($info['title_price']) ? $info['title_price'] :  ''; ?>" style="width: 63%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<label style="display: inline-block; width: 30%; float: left;">Coverage</label>
					<input type="text" name="title_coverage"  value="<?php echo isset($info['title_coverage']) ? $info['title_coverage'] :  ''; ?>" style="float: left; width: 65%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by4"  value="<?php echo isset($info['by4']) ? $info['by4'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by4_date"  value="<?php echo isset($info['by4_date']) ? $info['by4_date'] :  ''; ?>" style="width: 20%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by5"  value="<?php echo isset($info['by5']) ? $info['by5'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by5_date"  value="<?php echo isset($info['by5_date']) ? $info['by5_date'] :  ''; ?>" style="width: 20%; margin-bottom: 4px;">/
							<label style="display: block;">Date</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by6"  value="<?php echo isset($info['by6']) ? $info['by6'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by6_date"  value="<?php echo isset($info['by6_date']) ? $info['by6_date'] :  ''; ?>" style="width: 20%; margin-bottom: 4px;">
							<label style="display: block;">Date</label>
						</div>
					</div>
				
				<h2 style="float: left; width: 100%; margin: 3px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Additional Terms of the Sales Agreement</i></h2>
				
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Definitions.</b> "<i>Contract</i>" refers to this Retail Installment Contract and Security Agreement. The Pronouns "<i>you</i>" and <i>"yours"</i> refer to each Buyer signing this Contract, and any guarantors, jointly and individually. The pronouns <i>"we"</i> , <i>"us"</i> and <i>"our"</i> refer to the Seller and any entity to which it may transfer this Contract. <i>"Vehicle"</i> means each motor vehicle described in the <i>Descripition of Property</i> section. "<i>Property</i>" means the Vehicle and all other property described in the <i>Descripition of Property</i> and <i>Additional Protections</i> sections.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Purchase of Property.</b> You agree to purchase the Property from Seller, subject to the terms and conditions of this Contract. Seller will not make any repairs or additional to the Vehicle except as noted in the <i>Descripition of Property</i> Section.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">You have been given the opportunity to purchase the Property and Described services for th Cash Price or the Total Sale Price. The <i>"Total Sale Price"</i> is the total price of the Property if you buy it over time.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>General Terms.</b> The Total Sale Price shown in the <i>Truth-In Lending Disclosure</i> Assumes that all payments will be made as scheduled. The actual amount you will pay will be more if you pay late and less if you pay early.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">We do not intend to charge or collect, and you do not agree to pay, any finance charge or fee that is more than the maximum amount permitted for this sale by state or federal law. If you pay a finance charge or fee that exceeds that maximum amount, we will first apply the excess amount to reduce the principal balance and, when the principal has been paid in full, refund any remaining amount to you.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">You understand and agree that some payments to third parties as a part of this Contract may involve money retained by us or paid back to us as commissions or other remuneration.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">You agree that the Property will not be used as a dwelling.</p>
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Prepayment.</b>You may prepay this Contract in full or in part at any time without penalty. Any partial prepayment will not excuse any later scheduled payments. If we get a refund of any unearned insurance premiums that you paid. You agree that we may subtract the refund form the amount you owe, unless otherwise provided by law.</p>
				
			</div>	
		</div>			
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%;">
				<p style="font-size: 11px;">Retail Installment Contract. AZ Not for use in transactions socured by a dwalling <br> bankers Systems TM VMP <br> Wolters Kluwer Finacial Services @ 2015</p>
			</div>
			<div class="right" style="float: left; width: 48%; text-align: right;">
				<p style="font-size: 11px; margin: 0;">RSSIMVLFAZAZ 10/10/2015 <br> <input type="text" name="customer_initial"  value="<?php echo isset($info['customer_initial']) ? $info['customer_initial'] :  ''; ?>" style="width: 30%;"> <br> <b style="font-size: 16px;">Customers Initial Here</b></p>
			</div>
			
		</div>

		<div class="row four-page" style="float: left; width: 100%; margin-top: 25px; box-sizing: border-box; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Returned Payment Change.</b> If you make any payment required by this Contract that is returned or dishonored you agree to pay a fee of not more than $25.00 plus any actual charges assessed by the financial institution of the holder, payee or assignee of the holder or payee as a result of the dishonored instrument.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Governing Law and Interpretation.</b> This Contract is governed by the law of Arizona and applicable federal law and regulations.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">If any section or provision of this Contract is not enforceable, the other terms will remain part of this Contract. you authorize us to correct any clerical error or a missions in this Contract or in any related document.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Name and Location. Your name and address set forth in this Contract are your exact legal name and your principal residence. You will provide us with at least 30 days notice before you change your name or principal residence.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Telephone Monitoring and Calling.</b> You agree that we may from time to time monitor and record telephone calls made or received by us or our agents regarding your account to assure the quality of our services. In order for us to service the account or to collect any amounts you may owe, and subject to applicable law, you agree that we may from time to time make calls and saved text messages to you using pre recorded artificial voice messages or through the use of an automatic dialing device at any telephone number you provide to us in connection with your account, including a mobile telephone number that could result in charge to you.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Default.</b> You will be in default on this Contract if any one of the following occurs (except as prohibited by law)"</p>
				
				<ul>
					<li>You fail to perform any obligation that you have undertaken in this Contract.</li>
					<li>We, in good faith, believe that you have cannot, or will not, pay or perform the obligations you have agreed to in this Contract.</li>
				</ul>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">Unless prohibited by law, if you default, you agree to pay a reasonable amount for our cost of collection, our legal express and reasonable attorney's fees if we refer this Contract to an attorney not a salaried employee of ours, and court costs.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">If an event of default occurs as to any of you, we may exercise our remedies against any or all of you.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Remedies.</b> If you are in default on this Contract, we have all of the remedies provide by law and this Contract. Those remedies include.</p>
				
				<ul>
					<li>WE may require you to immediately pay us, subject to any refund required by law, the remaining unpaid balance of the amount financed, finance changes and all other agreed charges.</li>

					<li>We may pay taxes, assessments, or other liens or make repairs to the Property if you have not done so. We are not required to do so. We are not required to do so. You will repay us that amount immediatly. That amount will eran finance charges from the date we pay it at the post-maturity rates described in the <i>Paymments</i> section until paid in full.</li>

					<li>We may require you to make the Property available to us at a place we designate that is reasonably convenient to you and us.</li>

					<li>We may immediately take possession of the Property by legal process or self-help, but in doing so we may not breach the peace or unlawfully enter onto your premises.</li>

					<li>We may then sell the Property and apply what we receive as provided by law to our reasonable expenses of repossessing, storing, preparing for sale and selling the Property and then toward what you owe us.</li>

					<li>Except when prohibited by law, we may see you for additional amounts if the proceeds of a side do not pay all of the amounts you owe us.</li>
				</ul>
				
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">By choosing any one or more of these remedies, we do not give up our right to later use another remedy. By deciding not to use any remedy, we do not give up our right to consider the event a default if it happens again.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">You agree that if any notice is required to be given to you of an intended sale or transfer of the Property, notice is reasonable if mailed to your last known address, as reflected in our records, at least 10 days before the date of the intended sale or transfer for such other period of the as is required by law).</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">You agree that we may take possession of personal property securing this Contract and taken into possession as provided above. You may have a right to recover that property.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">If the Property has an electronic tracking, you agree that we may use the device to find the vehicle.</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>NOTICE</b> The following information applies if this Contract is secured by a motor vehicle, as that term may be defined by applicable Arizona law:</p>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">It is unlawful to fail to return a motor vehicle subject to a security interest within tricity days after receiving notice of default. Any notice of default we send you will be mailed to your address on this Contract. It is your responsibility to tell us your new address if it changes. unlawful failure to return a motor vehicle subject to a security interest is a class 6 felony which for a first offense carries a maximum jail sentence of 1.5 years. The maximum jail sentences may be greater if there are aggravating circumstances or you have a prior criminal record. The court may also impose a find of no more than $150,000.</p>
			</div>
			
			<div class="right" style="float: left; width: 50%; border-left: 1px solid #000; box-sizing: border-box; padding: 5px;">
				
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Obligations Independent. Each person who signs this Contract agrees to pay this Contract according to its terms. This means the following.</p>
				
				<ul>
					<li>you must pay this Contract even if someone else has also signed it.</li>
					<li>We may release any co-buyer or guarantor and you will still be obligated to pay this Contract.</li>
					<li>We my release any security and you will still be obligated to pay this Contract.</li>
					<li>If we give up any of our rights, it will not affect your duty to pay this Contract.</li>
					<li>If we extend new credit or renew this Contract, it will not affect your duty to pay this Contract.</li>
				</ul>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Warrenty.</b> In addition to the information provided in the Arizona Used Motor Vehicle Warranty Section and the Warranties section of this Contract, warranty information may be provided to you separately.</p>
				
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Security Agreement</i></h2>
				
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Security.</b> To secure your payment and performance under the terms of this Contract, you give us a security interest in the Vehicle, all accessions, attachments, accessories, and equipment placed in or on the Vehicle and in all other Property. You also assign to us and give us a security interest in proceeds and premium refunds of any insurance and service contracts purchased with this Contract</p>

				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Duties Toward Property.</b> By giving us a security interest in the Property, you represent and agree to the following:</p>

				<ul>
					<li>You will defend our interests in the Property against claims made by anyone else. You will keep our claim to the Property ahead of the claim of anyone else. You will not do anything to change our interest in the Property.</li>
					<li>YOu will keep the Property in your possession and in good condition and repair. You will use the Property for its intended and lawful purposes.</li>
					<li>You agree not to remove the Property form the U.S without our prior written consent.</li>
					<li>You will not attempt to sell the Property, transfer any rights in the Property, or grant another lien on the Property without our prior written consent.</li>
					<li>You will pay all taxes and assessments on the Property as they become due.</li>
					<li>You will pay all taxes and assessments on the Property as they become due.</li>
					<li>You will notify us with reasonable promptness of any loss or damage to the Property.</li>
					<li>You will provide us reasonale access to the Property for the purpose of inspection. Our entry and inspection must be accomplised lawfully, and without breaching the peace.</li>
					<li></li>
					<li></li>
				</ul>

				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Agreement to Provide Insurance.</b> You agree to provide property insurance on the Property protecting against loss and physical damage and subject to a maximum deductible amount indicated in the <i>Insurance Disclosure</i> section, or as we will otherwise require. You will name us as loss payee on any such policy. Generally, the loss payee is the one to be paid the policy benefits in case of loss or damage to the Property. In the event of loss or damage to the Property, we may require additional security or assurances of payment before we allow insurance proceeds to be used to repair or replace the Property. You agree that if the insurance proceeds do not cover the amounts you still owe us, you will pay the difference. You will keep the insurance in full force and effect until this Contract is paid in full.</p>	

				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">If you fail to obtain or maintain this insurance, or name us as loss payee, we may obtain insurance to protect our interest in the Property. This insurance may be written by a company other than one you would choose. It may be written at a rate higher than a rate you could obtain if you purchased the property insurance required by this Contract. We will add the premium for this insurance to the amount you owe us. Any amount we pay will be due immediately. This amount will earn finance changes from the date paid at least post maturity rate described in the Payment section until paid in full.</p>

				<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;"><b>Gap Waiver or Gap Coverage.</b> In the event of theft or damage to the Vehicle that results in a total loss, there may be a gap between the amount due under the terms of the Contract and the proceeds of your insurance settlement and deductibles. You are liable for this difference. You have the option of purchasing Gap Waiver of Gap Coverage to cover the gap liability, subject to any conditions and exclusions in the Gap Waiver or Gap Coverage agreements.</p>
				
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Arbitration Provision</i></h2>
				
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 16px;"><b>PLEASE READ CAREFULLY! By agreeing to this Arbitration Provision you are giving up your right to go to court for claims and disputes arising from this Contract:</b></p>
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 16px; padding-left: 7%; box-sizing: border-box;"><b>EITHER YOU OR WE MAY CHOOSE TO HAVE ANY DISPUTE BETWEEN YO AND US DECIDED BY ARBITRATION, AND NOT BY A COURT OR BY JURY TRAIL</b></p>
			</div>	
		</div>			
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%;">
				<p style="font-size: 11px;">Retail Installment Contract. AZ Not for use in transactions socured by a dwalling <br> bankers Systems TM VMP <br> Wolters Kluwer Finacial Services @ 2015</p>
			</div>
			<div class="right" style="float: left; width: 48%; text-align: right;">
				<p style="font-size: 11px; margin: 0;">RSSIMVLFAZAZ 10/10/2015 <br> <input type="text" name="name" style="width: 16%;"> <br> <b style="font-size: 16px;">Customers Initial Here</b></p>
			</div>
			
		</div>

		<div class="row fifth-page" style="float: left; width: 100%; margin-top: 25px; box-sizing: border-box; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				
				<ul>
					<li><h5><b>You GIVE UP ANY RIGHT THAT YOU MAY HAVE TO PARTICIPATE AS A CLASS REPRESENTATIVE OR CLASS MEMBER IN ANY CLASS ACTION OR CLASS ARBITRATION AGAINST US IF A DISPUTE IS ARBITRATED.</b></h5></li>
					<li><h5><b>IN ARBITRATION, DISCOVERY AND RIGHTS TO APPEAL ARE GENERALLY, AND OTHER LIMITED THAN IN A JUDICIAL PROCEEDING, AND OTHER RIGHTS THAT YOU WOULD HAVE IN COURT MAY NOT BE AVAILABLE.</b></h5></li>
				</ul>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">
				You or we (including any assignee may elect to resolve any Claim by neutral, binding arbitration and not by a court action.<i>"Claim"</i> means any claim, dispute or controversy between you and us or our employees, agents, successors, assigns or affiliates arising from or relating to: 1. the credit application, 2. the purchase of the Property: 3. the condition of the Property: 4. this Contract; 5. any insurance, maintenance, service or other contracts you purchased in connection with this Contract; or 6. any related transaction, occurrence or relationship. This includes any Claim based on common or constitutional law, contract, tort, statute, regulation or other ground. To the extent allowed by law, the validity, scope and interpretation of this Arbitration Provision are to be decided by neutral, binding arbitration.</b>

				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">If either party elects to resolve a Claim through arbitration, you and we agree that no trial by jury or other judicial proceeding will take place. Instead, the Claim will be arbitrated on an individual basis and not on a class or representative basis.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">The party electing arbitration may choose either of the following arbitration organizations and its applicable rules, provided it is willing and able to handle the arbitration: American Arbitration Association, 1633 Broadway. Floor 10, New York, NY 10019 (www.adr.org) or JAMS, 1920 Main Street, Suite 300 irvine, CA 92614 (www.jamsadr.com), or it may choose any other reputable arbitration organization and its rules to conduct the arbitration, subject to the other party's approval. The parties can get a copy of the organization's rules by Contacting it or visiting its website. If the chosen arbitration organization's rules conflict with this Arbitration Provision, the terms of this Arbitration Provision will govern the Claim. However, to address a conflict with the selected arbitration organization's rules, the parties may agree to change the terms of this Arbitration Provision by written amendment signed by the parties. If the parties are not able to find or agree upon an arbitration organization that is willing and able to handle the arbitration, then the arbitrator will be selected pursuant to U.S Code sections 5 and 6.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">The arbitration hearing will be conducted in the federal district where you reside unless you and we otherwise agree. Or, if you and we agree, the arbitration hearing can be by telephone or other electronic communication. The arbitration filing fee, arbitrator's compensation and other arbitration costs will be paid in the amounts and by the parties according to the rules of the chosen arbitration organization. Some arbitration organizations' rules require us to pay most or all of these amounts. If the rules of the arbitration organization do not specify how fees must be allocated, we will pay the filing fee, arbitrator's compensation, and other arbitration costs up to $5,000, unless the law requires us to pay more. Each party is responsible for the fees of its own attorneys, witnesses, and any related costs, if any, that it incurs to prepare and present its Claim or response. In limited circumstances, the arbitrator amy have the authority to award payment of certain arbitration costs or fees to a party, but only if the law and arbitration organization rules allow it.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">An arbitrator must be a lawyer with at least with at least ten (10) years of experience and familiar with consumer credit law or a retired state or federal judge. The arbitration will be by a single arbitrator. In making an award, an arbitrator shall follow governing substantive law and any applicable statute of limitations. The abe by a single arbitrator. In making an award, an arbitrator shall follow tor will decide any dispute regarding the arbitrability of a Claim. An arbitrator has the authority to order specific performance, compensatory damages, punitive damage, and any other relief allowed by applicable law. An arbitrator's authority to make awards is limited to awards to you or us alone. Claims brought by you against us, or by us against you, may not be joined or consolidated in a writing by all parties. No arbitration award or decision will have any preclusive effect as to issues or claims in any dispute with anyone who is not a named party to the arbitration.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">Any arbitration award shall be in writing, shall include a written reasoned opinion, and will be final and binding subject only to any right to appeal under the Federal Arbitration Act {"FAA"}, 9 U.S. Code Sections 1, et seg. Any court having jurisdicition can enforce a final arbitration awards. You and we agree that this Arbitration Provision is governed by the FAA to the exclusion of any different or inconsistent state or local law.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">You or we can do the following without giving up the right to require arbitration seek remedies in small claims court for Claims within the small claims court's jurisdiction, or seek judicial provisional remedies. If a party does not exercise the right to elect arbitration in connection with any particular Claim, that party still can arbitration in connection with any other Claim.</p>

				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">The Arbitration Provision survives any (i) termination, payoff, assignment or transfer of this Contract, (ii) any legal proceeding by you or us to collect a debt owned by the other, and (iii) any bankruptcy proceeding in which you or we are the debtor. With but one exception, if any part of this Arbitration Provision is Deemed or found to be unenforceable for any reason</p>
					
				
			</div>
			
			<div class="right" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">the reminder of this Arbitration Provision will remain in full force and effect. The one exception is that if a finding of partial unenforceability would allow arbitration to proceed on a class-wide basis, then this Arbitration Provision will be unenforceable in its entirety.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>PROCESS TO REJECT THIS ARBITRATION PROVISION.</b> You may reconsider and reject your approval of this Arbitration Provision by sending a written notice to the Assignee (identified in the Assignment section) or if there is no Assignee, then to Seller. The notice must be postmarked within 30 days of the date you signed this Contract. It simply needs to state your decision to reject the Arbitration Provision in this Contract and include your signature. It must also provide your name. Seller's name and the date of this Contract. Rejecting this Arbitration Provision will NOT affect the terms under which we will finance and sell the Property to you or any other terms of this Contract, except that the Arbitration Provision will not apply</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>CAUTION:It is important that you read this Arbitration Provision thoroughly before you sign this Contract. By signing this Contract, you acknowledge that you read, understand and agree to this Arbitration Provision. If you do not understand this Arbitration Provision, do not sign this Contract; instead ask your lawyer. If you approve  this Arbitration Provision, you have an additional 30 days after signing to reconsider and reject your approval, as described above. If you use that process to reject, this Arbitration Provision will not be a part of this Contract, but the rest of this Contract will still be binding and effective.</b></p>
				
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Notice</i> </h2>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Note.</b> If the primary use of the Vehicle is non-consumer, this not a consumer contract, and the following notice does not apply. <p style="font-size: 16px;"> <b>Notice. ANY HOLDER OF THIS CONSUMER CREDIT CONTRACT IS SUBJECT TO ALL CLAIMS AND DEFENSES WHICH THE DEBTOR COULD ASSERT AGAINST THE SELLER OF GOODS OR SERVICES OBTAINED PURSUANT HERETO OR WITH THE PROCEEDS HEREOF.<br> RECOVERY HEREUNDER BY THE DEBTOR SHALL NOT EXCEED AMOUNTS PAID BY THE DEBTOR HERE UNDER.</b></p></P>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">If you are buying a used vehicle: The information you see on the window form for this vehicle is part of this contract. Information on the window form overrides any contract provisions in the contract of sale.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">Si compra un vehicuio usado: La information que ve adherida en la ventanilla forma pate de este contraro. La information contenida en el formulario de la ventanilla prevalece por sobre toda otra disposicion en contraio include en el contrato de compravents.</p>
				
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Third Party Agreement</i> </h2>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">(This section applies ONLY to a person who will have an ownership interest n the Property but is NOT a Buyer obligated to pay this Contract ("Third Party Owner"))</p>

				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">In this section only. "you" means only the person signing this section.</p>

				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;">By signing below you agree to give us a security interest in the Property described in the Description of Property</i> section. You also agree to the terms of this Contract except that you will not be liable for the payments it requires. Your interest in the Property may be used to satisfy the Buyer's obligation. You agree that we may renew, extend or change this Contract or release any party or Property without releasing you from this Contract . We may take these steps without notice or demand upon you.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 18px;"><b>You acknowledge receipt of a completed copy of this Contract.</b></p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 22px;">NOT APPLICABLE<p>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<input type="text" name="by"  value="<?php echo isset($info['by']) ? $info['by'] :  ''; ?>" style="width: 100%;">
						<label><b>By: </b> <p style="font-size: 16px; display: inline-block;">NOT APPLICABLE</p></label>
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<input type="text" name="by_date"  value="<?php echo isset($info['by_date']) ? $info['by_date'] :  ''; ?>" style="width: 100%;">
						<label><b>Date</b></label>
					</div>
				</div>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 14px;">Signature of Third Party Owner (NOT the Buyer)</p>
			</div>	
		</div>			
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%;">
				<p style="font-size: 11px;">Retail Installment Contract. AZ Not for use in transactions socured by a dwalling <br> bankers Systems TM VMP <br> Wolters Kluwer Finacial Services @ 2015</p>
			</div>
			<div class="right" style="float: left; width: 48%; text-align: right;">
				<p style="font-size: 11px; margin: 0;">RSSIMVLFAZAZ 10/10/2015 <br> <input type="text" name="name" style="width: 16%;"> <br> <b style="font-size: 16px;">Customers Initial Here</b></p>
			</div>
		</div>


		<div class="row six-page" style="float: left; width: 100%; margin-top: 25px; box-sizing: border-box; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 5px;">
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Arbitration Provision and Process to Remove</i> </h2>
			
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>This Contract contains an Arbitration provision that affects your rights.</b> By signing this Contract, you agree that either of us may request and require the other to resolve disputes or claims through arbitration instead of a lawsuit. The Arbitration Provision include a process you can follow in the next 30 days if you reconsider and want to reject the Arbitration Provision. <br> <b>By initialing this section, you confirm that you read, understand and agree to the Arbitration Provision in this Contract, including the process to reject it.</b></b>

				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width; 100%;">
						<label>Buyer initials</label>
						<input type="text" name="buyer_initials1"  value="<?php echo isset($info['buyer_initials1']) ? $info['buyer_initials1'] :  ''; ?>" style="width: 23%;">
						<input type="text" name="buyer_initials2"  value="<?php echo isset($info['buyer_initials2']) ? $info['buyer_initials2'] :  ''; ?>" style="width: 23%;" style="width: margin: 0 2%;">
						<input type="text" name="buyer_initials3"  value="<?php echo isset($info['buyer_initials3']) ? $info['buyer_initials3'] :  ''; ?>" style="width: 23%;">
					</div>
				</div>
			
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Acknowledgement for Electronic Signatures</i></h2>
			
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><input type="checkbox" name="electronic_check" value="electronic" <?php echo ($info['electronic_check'] == "electronic") ? "checked" : ""; ?> /> <b>Electronic Signature Acknowledgment.</b> You agree that (i) you viewed and read this entire Contract before signing it, (ii) you signed this Contract with one or more electronic signatures, (iii) you intend to enter into Contract and your electronic signature has the same effect as your written ink signature, (iv) you received a paper copy of this Contract after it was signed it was signed, and (v) the authoritative copy of this Contract shall reside in a document management system held by Seller in the ordinary course of business. You understand that Seller may transfer this Contract to another company in the electronic form or as a paper version of that electronic form which would then become the authoritative copy. Seller or that other company may enforce this Contract in the electronic form or as a paper version of that electronic form. You may enforce the paper version of the Contract copy that you received.</p>
			
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Signature Notice</i></h2>
			
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><i>The Annual Percentage Rate may be negotiable with the Seller. The Seller may assign this Contract and retain its night to receive a part of the Finance Change.</i></p>	
			
				<h2 style="float: left; width: 100%; margin: 5px 0 0; box-sizing: border-box; padding: 5px; background-color: #000; color: #fff; font-size: 18px;"><i>Signatures</i></h2>
			
				<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 5px; border: 1px solid #000; margin: 5px 0;">
					<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Entire Agreement.</b> Your and our entire agreement is contained in this Contract. There are no unwritten agreements regarding this Contract. Any change to this Contract must be in writing and signed by you and us. </p>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by1"  value="<?php echo isset($info['by1']) ? $info['by1'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by1_date"  value="<?php echo isset($info['by1_date']) ? $info['by1_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by2"  value="<?php echo isset($info['by2']) ? $info['by2'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by2_date"  value="<?php echo isset($info['by2_date']) ? $info['by2_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by3"  value="<?php echo isset($info['by3']) ? $info['by3'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by3_date"  value="<?php echo isset($info['by3_date']) ? $info['by3_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; border-left: 1px solid #000; box-sizing: border-box; padding: 5px;">
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>Notice to the Buyer. 1. Do not sign this Contract before you read it or if it contains any blank spaces. 2. You are entitled to an exact copy of the Contract you Sign</b></p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>By signing below, you agree to the terms of this Contract. You Received a copy of this Contract and had a chance to read and review it before you signed it</b></p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 16px;">THE INSURANCE SHOWN IN THE INSURANCE DISCLOSURES SECTION OF THE CONTRACT DOES NOT INCLUDE LIABILITY INSURANCE COVERAGE FOR BODILY INJURY AND PROPERTY DAMAGE CAUSED TO OTHERS UNLESS SUCH INSURANCE IS SPECIFICALLY PROVIDED FOR IN THAT SECTION.</p>
				
				<p style="float: left; width: 100%; margin: 5px 0; font-size: 13px;"><b>Buyer</b></p>
				
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by4"  value="<?php echo isset($info['by4']) ? $info['by4'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by4_date"  value="<?php echo isset($info['by4_date']) ? $info['by4_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by5"  value="<?php echo isset($info['by5']) ? $info['by5'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by5_date"  value="<?php echo isset($info['by5_date']) ? $info['by5_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by6"  value="<?php echo isset($info['by6']) ? $info['by6'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by6_date"  value="<?php echo isset($info['by6_date']) ? $info['by6_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
					
					<p style="float: left; width: 100%; margin: 5px 0; font-size: 13px;"><b>Seller</b></p>
				
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="from-field" style="float: left; width: 70%;">
							<input type="text" name="by7"  value="<?php echo isset($info['by7']) ? $info['by7'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
							<label style="display: block;">By:</label>
						</div>
						<div class="from-field" style="float: left; width: 30%;">
							<input type="text" name="by7_date"  value="<?php echo isset($info['by7_date']) ? $info['by7_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
							<label style="display: block;">Date:</label>
						</div>
					</div>
				
					<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>We are regulated by the Arizon Department of Financial Institutions. Any complaints you have concering this Contract may be addressed to the Arizona Department of Financial Institutes, 2910 North 44th Street, Suite 310, Phoenix, Arizona 85018; telephone (602) 255-4421.</b></p>
				
					<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 6px; border: 1px solid #000; margin: 0;">
						<p style="float: left; width: 100%; margin: 5px 0; font-size: 12px;"><b>Assignment.</b> This Contract and Security Agreement is assigned to
							<input type="text" name="assignment1"  value="<?php echo isset($info['assignment1']) ? $info['assignment1'] :  ''; ?>" style="width: 100%; margin: 4px 0;">
							<input type="text" name="assignment2"  value="<?php echo isset($info['assignment2']) ? $info['assignment2'] :  ''; ?>" style="width: 100%;">
							the Assignee, phone <input type="text" name="assignment3"  value="<?php echo isset($info['assignment3']) ? $info['assignment3'] :  ''; ?>" style="width: 40%;"> . This assignement is made under the terms  of a separate agreement made between  the Seller and Assignee. <br>
							<label style="display: block; margin-bottom: 10px;"><input type="checkbox" name="assignment_check" value="assignment" <?php echo ($info['assignment_check'] == "assignment") ? "checked" : ""; ?> /> This Assignment is made with recourse.</label>
						</p>
						
						<p style="float: left; width: 100%; margin: 5px 0; font-size: 13px;"><b>Seller</b></p>
				
						<div class="row" style="float: left; width: 100%; margin: 10px 0;">
							<div class="from-field" style="float: left; width: 70%;">
								<input type="text" name="by8"  value="<?php echo isset($info['by8']) ? $info['by8'] :  ''; ?>" style="width: 100%; margin-bottom: 4px;">
								<label style="display: block;">By:</label>
							</div>
							<div class="from-field" style="float: left; width: 30%;">
								<input type="text" name="by8_date"  value="<?php echo isset($info['by8_date']) ? $info['by8_date'] :  ''; ?>" style="width: 95%; margin-bottom: 4px;">
								<label style="display: block;">Date:</label>
							</div>
						</div>						
					</div>
			</div>	
		</div>			
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%;">
				<p style="font-size: 11px;">Retail Installment Contract. AZ Not for use in transactions socured by a dwalling <br> bankers Systems TM VMP <br> Wolters Kluwer Finacial Services @ 2015</p>
			</div>
			<div class="right" style="float: left; width: 48%; text-align: right;">
				<p style="font-size: 11px; margin: 0;">RSSIMVLFAZAZ 10/10/2015 <br> <input type="text" name="customer_initial"  value="<?php echo isset($info['customer_initial']) ? $info['customer_initial'] :  ''; ?>" style="width: 16%;"> <br> <b style="font-size: 16px;">Customers Initial Here</b></p>
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
