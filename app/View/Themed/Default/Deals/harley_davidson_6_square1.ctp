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
		#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 14px; margin-bottom: 0px; font-weight: normal !important;}
		.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
		p{line-height: 24px;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>

	<?php $months=array('48'=>'48','60'=>'60','66'=>'66','72'=>'72','84'=>'84');
	$selected_months=array('1'=>'48',2=>60,3=>66,4=>72);

	if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
	{
		$selected_months=array('1'=>'48',2=>60,3=>66,4=>72);
	}
	?>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" align="center" style="width: 100%; padding-bottom: 5px;">
			<?php  if($cid == 4435 || $cid == 4430){ ?>
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a1.jpg'); ?>" alt="gibs-superstore-logo" style="width: 13%;">
			<?php } ?>
			<?php  if($cid == 4440){ ?>
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a3.jpg'); ?>" alt="gibs-superstore-logo" style="width: 20%;">
			<?php } ?>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 30%;">
				<label>Salesman</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
			</div>
			<div class="form-filed" style="float: right; width: 20%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<!-- empty section start -->
		<div class="empthy-section" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 55%; box-sizing: border-box;">
				<!-- Contact information Start -->
			<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Customer Informtion</h2>
			<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Customer Name</label>
						<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 57%;">
					</div>
					<div class="form-filed" style="float: right; width: 50%;">
						<label>Home Phone</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 63%;">
					</div>
				</div>
			
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 100%;">
						<label>Address</label>
						<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 88%;">
					</div>
				</div>	
				
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Address</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Work Phone</label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 67%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-filed" style="float: left; width: 100%;">
						<label>City State Zip</label>
						<input type="text" name="state_city_zip" value="<?php echo isset($info['state_city_zip']) ? $info['state_city_zip'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 81%;">
					</div>
				</div>	
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Email</label>
						<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 82%;">
					</div>
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Cell Phone</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 69%;">
					</div>
				</div>	
			</div>
			
			<!-- contact Information end -->
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 45%; box-sizing: border-box; border-left: 0;">
					<!-- vechile Information end  -->
					
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Vehicle Informtion</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Stock #</label>
								<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 71%;">
							</div>
							<div class="form-filed" style="float: right; width: 50%;">
								<label>New Used</label>
								<input type="text" name="new_used" value="<?php echo isset($info['new_used']) ? $info['new_used'] : ''; ?>" style="width: 64%;">
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Vehicle</label>
								<input type="text" name="vehicle" value="<?php echo isset($info['vehicle']) ? $info['vehicle'] : ''; ?>" style="width: 72%;">
							</div>
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Color</label>
								<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 78%;">
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Type</label>
								<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>" style="width: 78%;">
							</div>
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Mileage</label>
								<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 70%;">
							</div>
						</div>

						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 100%;">
								<label>Vin#</label>
								<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 89%;">
							</div>
						</div>	
					</div>
					<!--  Vehicle information end -->
				</div>
			<!-- rightside end-->
		</div>
		<!-- customer and vehicle section end -->
		
		<!-- trade in and note section start -->
		<div class="empthy-section" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 55%; box-sizing: border-box;">
						
				<!-- trade in start -->
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade In</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Year</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 84%;">
						</div>
						<div class="form-filed" style="float: right; width: 50%;">
							<label>Mileage</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 78%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Make</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 81%;">
						</div>
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Payoff</label>
							<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 81%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Model</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 78%;">
						</div>
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Lien Holder</label>
							<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder']) ? $info['lien_holder'] : ''; ?>" style="width: 67%;">
						</div>
					</div>
				</div>
				<!-- trade in end -->
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 45%; box-sizing: border-box; ">
					<div class="row" style="float: left; width: 100%; margin: 0px 0; border-top: 1px solid #000; box-sizing: border-box; padding: 10px; border-right: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%">
							<label style="vertical-align: top;">Note</label>
							<textarea name="note" style="width: 94%; border: 0px; height: 117px;"><?php echo isset($info['note']) ? $info['note'] : ''; ?></textarea>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- trade in and note section end -->
		
		<div class="selling-trade" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade Info</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<input type="text" name="trade_info" id="sell_price" class="price_cal" value="<?php echo isset($info['trade_info']) ? $info['trade_info'] : ''; ?>" style="font-size: 20px;font-weight: bold; margin: 40px 0; border-bottom: 0px; margin-left: 54px; width: 180px;">
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- center section start -->
			<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Pre-Owned vehicle</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<input type="text" name="pre_vehicle" id="pre_vehicle" class="price_cal" value="<?php echo isset($info['pre_vehicle']) ? $info['pre_vehicle'] : $info['pre_year'].' '.$info['pre_make'].' '.$info['pre_model']; ?>" style="font-size: 20px;font-weight: bold; margin: 40px 0; border-bottom: 0px; width: 180px;">
					</div>
				</div>
			</div>
			<!-- center section end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">New H-D Vehicle</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<input type="text" name="vehicle" id="vehicle" class="price_cal" value="<?php echo isset($info['vehicle']) ? $info['vehicle'] : $info['year'].' '.$info['make'].' '.$info['model']; ?>" style="font-size: 20px;font-weight: bold; margin: 40px 0; border-bottom: 0px; margin-left: 40px; width: 230px;">
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->
		
		
		<div class="selling-trade" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade Appraisal</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<input type="text" name="trade_value" value="<?php echo $info['trade_value']; ?>" style="font-size: 20px; font-weight: bold; text-align: center; margin: 38px 0;border-bottom: 0px;">
						<p style="margin: 28px 0; text-align: center; font-size: 14px;"></p>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- center section start -->
			<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Selling Price</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px 0 0; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<input type="text" name="selling_price1" value="<?php echo isset($info['selling_price1']) ? $info['selling_price1'] : ''; ?>" style="font-size: 20px;font-weight: bold; margin: 33px 0; border-bottom: 0px; width: 180px;">
						<p style="margin: 2px 0; text-align: center; font-size: 14px;">Plus Tax, Title, License, and Fees</p>
					</div>
				</div>
			</div>
			<!-- center section end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Selling Price</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<input type="text" name="selling_price2" value="<?php echo isset($info['selling_price2']) ? $info['selling_price2'] : ''; ?>" style="font-size: 20px;font-weight: bold; margin: 33px 0; border-bottom: 0px; margin-left: 54px;width: 180px;">
							<p style="margin: 2px 0; text-align: center; font-size: 14px;">Plus Tax, Title, License, and Fees</p>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->

		<!-- monthly section start -->
			<div class="selling-trade" style="float: left; width: 100%; border-bottom: 1px solid #000; margin-bottom: 10px;">
				<!-- left side start -->
				<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Intitial Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-left: 1px solid #000; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<input type="text" name="investment" id="investment" value="<?php echo isset($info['investment']) ? $info['investment'] : ''; ?>" style="font-size: 20px;font-weight: bold; margin: 40px 0; border-bottom: 0px; margin-left: 54px; width: 180px;">
						</div>
					</div>
				</div>
				<!-- leftside end -->
			
				<!-- center section start -->
				<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Monthly Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px 0 0; border-right: 1px solid #000;    height: 135px;">
						<div class="row" style="float: left; width: 100%; margin: 10px 0;">
							<table style="width: 80%;margin-left: 37px;">
								<thead>
									<tr>
										<th width="33%" align="center">APR:</th>
										<th width="33%" align="center">Term:</th>
										<th width="33%" align="center">Payment:</th>
									</tr>
								</thead>
			                    
								<tbody>
									<tr>
										<td width="33%" align="center"><input name="loan_apr1" type="text" id="apr1" class="input12" value="<?php echo isset($info['loan_apr1']) ? $info['loan_apr1'] : ''; ?>" placeholder="" style="width: 83px;"/>
											%</td>
										<td width="33%" align="center"><select name="payment_option1" class="form-control price_options" style="width:88%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
						<?php } ?></select><span id="option1_price_span" class="print_month"></span> months</td>
										<td width="33%" align="center">$&nbsp;
											<input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
									</tr>
								</tbody>
			                    
							</table>
						</div>
					</div>
				</div>
				<!-- center section end -->
			
				<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Monthly Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-right: 1px solid #000;    height: 135px;">
						<div class="row" style="float: left; width: 100%; margin: 21px 0;">
							<table style="width: 80%;margin-left: 37px;">
								<thead>
									<tr>
										<th width="33%" align="center">APR:</th>
										<th width="33%" align="center">Term:</th>
										<th width="33%" align="center">Payment:</th>
									</tr>
								</thead>
			                    
								<tbody>
									<tr>
										<td width="33%" align="center"><input name="loan_apr2" type="text" id="apr2" class="input12" value="<?php echo isset($info['loan_apr2']) ? $info['loan_apr2'] : ''; ?>" placeholder="" style="width: 83px;"/>
											%</td>
										<td width="33%" align="center"><select name="payment_option2" class="form-control price_options" style="width:88%;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
						<?php } ?></select><span id="option2_price_span" class="print_month"></span> months</td>
										<td width="33%" align="center">$&nbsp;
											<input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
									</tr>
								</tbody>
			                    
							</table>
						</div>
					</div>
				</div>
				<!-- rightside end-->
		</div>
		<!-- monthly section end -->
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label>Guest Approval</label>
				<input type="text" name="guest_approval" value="<?php echo isset($info['guest_approval']) ? $info['guest_approval'] : ''; ?>" style="width: 68%;">
			</div>
			<div class="form-field" style="float: left; width: 15%">
				<label>Date</label>
				<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 35%">
				<label>Management Approval</label>
				<input type="text" name="mng_approval" value="<?php echo isset($info['mng_approval']) ? $info['mng_approval'] : ''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: left; width: 15%">
				<label>Date</label>
				<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 13px;">I hearby indicate my intent to purchase a motorcycle.  I authorize the dealer representative to investigate my credit and employeement history to evaluate my ability to purchase the above referenced motorcycle.  This is not a contract for sale.</p>	
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
