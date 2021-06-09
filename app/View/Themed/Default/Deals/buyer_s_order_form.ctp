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
	<div id="worksheet_container" style="width: 1030px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 16px; margin-bottom: 1px;}
	table input[type="text"]{border: 0px;}
	td, th{border-bottom: 1px solid #000; border-left: 1px solid #000; padding: 3px; text-align: center;}
	td{font-size: 13px; padding: 3px;}
	th{font-size: 14px; padding: 3px;}
	table{border-top: 1px solid #000; border-right: 1px solid #000;}
	td:nth-child(2), th:nth-child(2){text-align: left;}
	td:nth-child(3), th:nth-child(3){text-align: right;}
	.title h3{font-size: 14px; font-weight: bold; color: #000; line-height: 18px;}
	.wraper.main input {padding: 1px;}
@media print {
.title{background-color: #ddd;}	
.dontprint{display: none;}
label{font-size: 16px;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="float: left; width: 30%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bluff-powersports-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 62%;">
				<div class="top-logos" style="float: left; width: 100%;">
					<div class="r-logo" style="float: left; width: 20%;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/polaris-logo.jpg'); ?>" alt="" style="width: 100%;">
					</div>
					<div class="r-logo" style="float: left; margin: 3% 8%; width: 14%;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/kawasaki-logo.png'); ?>" alt="" style="width: 100%;">
					</div>
					<div class="r-logo" style="float: left; margin: 0 4%; width: 14%;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/honda-motocycle-logo.jpg'); ?>" alt="" style="width: 100%;">
					</div>
					<div class="r-logo" style="float: right; margin-top: 16px; width: 20%;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/spartan-mower-logo.png'); ?>" alt="" style="width: 100%;">
					</div>
				</div>
				<h2 style="float: left; font-weight: bold; font-size: 18px;">4250 Highway 67 North<span style="font-size: 20px;">,</span> Poplar Bluff, MO 63901</h2>
				<h3 style="float: right; font-weight: bold; font-size: 18px;">573-785-0146</h3>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>DATE</label>
				<input type="text" name="date_data" value="<?php echo date("Y-m-d"); ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>HOME	PHONE</label>
				<input type="text" name="phone" id="phone" value="<?php $phone = $info['phone'];
				$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
				$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); 
				echo $this->Dncprocess->show_phone($dnc_manual_uplaod_process,$contact['Contact']['dnc_status'], $cleaned, 	$contact['Contact']['modified'],$contact['Contact']['sales_step']); ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>BUSINESS PHONE</label>
				<input type="text" name="work_number" value="<?php $phone1 = $info['work_number'];
				$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
				$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); 
				echo $this->Dncprocess->show_phone($dnc_manual_uplaod_process,$contact['Contact']['dnc_status'], $cleaned1, 	$contact['Contact']['modified'],$contact['Contact']['sales_step']); ?>" style="width: 56%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>BUYER</label>
				<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>EMAIL</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 55%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info["city"]) ? $info["city"] : $info["city"] ?>" style="width: 92%;">
			</div>
			<div class="form-field" style="float: left; width: 12%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>ZIP CODE</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 57%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>COUNTY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : "" ?>" style="width: 54%;">
			</div>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 10px;">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<span>NEW <input type="checkbox" name="condition_new" value="New" <?php echo ($info['condition_new'] == 'New') ? "checked" : ""; ?> /></span>
				<span style="margin: 0 6%;">USED <input type="checkbox" name="condition_used" value="Used" <?php echo ($info['condition_used'] == 'Used') ? "checked" : ""; ?> /></span>
				<span>PROGRAM <input type="checkbox" name="condition_program" value="Program" <?php echo ($info['condition_program'] == 'Program') ? "checked" : ""; ?> /></span>
			</div>

			<div class="form-field" style="float: left; width: 50%;">
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;text-align: center;">
				<label style="display: block; text-align: center; font-size:11px;">Serial Number</label>
			</div>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 16%;">
				<input type="text" name="year" value="<?php echo $info['year']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">YEAR</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; padding: 0 1.6%;">
				<input type="text" name="make" value="<?php echo $info['make']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">MAKE</label>
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<input type="text" name="color" value="<?php echo $info['color']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">COLOR</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; padding: 0 1.6%;">
				<input type="text" name="model" value="<?php echo $info['model']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">MODEL</label>
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">STOCK NO.</label>
			</div>
			<div class="form-field" style="float: left; width: 17%; padding: 0 1.6%;">
				<input type="text" name="odometer" value="<?php echo $info['odometer']; ?>" style="width: 100%; text-align: center;">
				<label style="display: block; text-align: center;">MILEAGE</label>
			</div>
		</div>
		
		</div>
	
		
		<div class="trade-in" style="float: left; width: 100%; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 10px; box-sizing: border-box;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 25%;">
					<label>YEAR</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 55%;">
					<label>MAKE</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>MILEAGE</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 62%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 25%;">
					<label>MODEL</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 74%;">
				</div>
				<div class="form-field" style="float: left; width: 50%;">
					<label>ENGINE</label>
					<input type="text" name="engine_trade" value="<?php echo isset($info['engine_trade'])?$info['engine_trade']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>COLOR</label>
					<input type="text" name="color_trade" value="<?php echo isset($info['color_trade'])?$info['color_trade']:''; ?>" style="width: 75%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>VIN#</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" style="width: 96%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>LIENHOLDER</label>
					<input type="text" name="leinholder" value="<?php echo isset($info['leinholder']) ? $info['leinholder'] : "" ?>" style="width: 89%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>ADDRESS</label>
					<input type="text" name="address_trade" value="<?php echo isset($info['address_trade']) ? $info['address_trade'] : "" ?>" style="width: 91%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>CITY</label>
					<input type="text" name="city_trade" value="<?php echo isset($info['city_trade']) ? $info['city_trade'] : "" ?>" style="width: 91%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>STATE</label>
					<input type="text" name="state_trade" value="<?php echo isset($info['state_trade']) ? $info['state_trade'] : "" ?>" style="width: 73%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>ZIP CODE</label>
					<input type="text" name="zip_trade" value="<?php echo isset($info['zip_trade']) ? $info['zip_trade'] : "" ?>" style="width: 73%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>PHONE#</label>
					<input type="text" name="phone_trade" value="<?php echo isset($info['phone_trade']) ? $info['phone_trade'] : "" ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 50%;">
					<label>VERIFIED WITH</label>
					<input type="text" name="verified_with" value="<?php echo isset($info['verified_with'])?$info['verified_with']:''; ?>" style="width: 75%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>ACCT#</label>
					<input type="text" name="acct_num" value="<?php echo isset($info['acct_num'])?$info['acct_num']:''; ?>" style="width: 94%;">
				</div>
			</div>
		</div>
		
		
		<div class="bottom" style="float: left; width: 100%; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; border-left: 1px solid #000; border-right: 1px solid #000; border-right: 1px solid #000; box-sizing: border-box; padding: 10px;">
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>SELLING PRICE</label>
						<div class="price_line" style="width: 61%;border-bottom: dotted 1px;margin-left: 123px; ">
						</div>
					</div>
					
					
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input name="unit_value"  id="sell_price" class="pricechange" type="text" class="input71" value=" <?php echo (!empty($info['unit_value']))? $info['unit_value']  : "0.00" ;   ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>REBATES</label>
						<div class="price_line" style="width: 75%;border-bottom: dotted 1px;margin-left: 76px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="rebates" id="rebates" class="pricechange" value="<?php echo $info['rebates']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TRADE-IN</label>
						<div class="price_line" style="width: 75%;border-bottom: dotted 1px;margin-left: 77px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="trade_value" id="trade_value" class="pricechange" value="<?php echo $info['trade_value']; ?>" style="width: 90%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TRADE DIFFERENCE</label>
						<div class="price_line" style="width: 50%;border-bottom: dotted 1px;margin-left: 163px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="trade_difference" id="trade_difference" class="pricechange" value="<?php echo $info['trade_difference']; ?>"  style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TOTAL</label>
						<div class="price_line" style="width: 85%;border-bottom: dotted 1px;margin-left: 40px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="total_1" id="total_1" class="pricechange" value="<?php echo $info['total_1']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<input type="text" name="name" style="width:15%;">
						<label>YR PROTECTION PLAN</label>
						<div class="price_line" style="width:29%;border-bottom: dotted 1px;margin-left: 235px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="yr_protection" id="yr_protection" class="pricechange" value="<?php echo $info['yr_protection']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>FREIGHT</label>
						<div class="price_line" style="width: 79%;border-bottom: dotted 1px;margin-left: 63px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="fright" id="fright" class="pricechange" value="142.50" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>DOC FEE</label>
						<div class="price_line" id="price_line" style="width: 77%;border-bottom: dotted 1px;margin-left: 70px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="doc_fee" id="doc" class="pricechange" value="<?php echo $info['doc_fee']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>P & A</label>
						<div class="price_line" style="width: 86%;border-bottom: dotted 1px;margin-left: 36px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="p_a" id="p_a" class="pricechange" value="<?php echo $info['p_a']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>LABOR</label>
						<div class="price_line" style="width: 83%;border-bottom: dotted 1px;margin-left: 46px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="labor" id="labor" class="pricechange" value="<?php echo $info['labor']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TAX</label>
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
							'style' =>'width: 50%'
						));
						?>
						<label>or</label>
						<input type="text" name="rate_value" id="rate_value" class="pricechange" value="<?php echo $info['rate_value']; ?>" style="width:31%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="tax" id="tax" class="pricechange" value="<?php echo $info['tax']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TOTAL</label>
						<div class="price_line" style="width: 84%;border-bottom: dotted 1px;margin-left: 42px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="total_2" id="total_2" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>PAYOFF</label>
						<div class="price_line" style="width: 78%;border-bottom: dotted 1px;margin-left: 64px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="pay_off" id="pay_off" class="pricechange" value="<?php echo $info['pay_off']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>CASH DOWN</label>
						<div class="price_line" style="width: 68%;border-bottom: dotted 1px;margin-left: 100px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="cash_down" id="cash_down" class="pricechange" value="<?php echo $info['cash_down']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>TOTAL</label>
						<div class="price_line" style="width: 85%;border-bottom: dotted 1px;margin-left: 40px; ">
						</div>
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="act_total" id="act_total" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 117%; float: left;">
						<label>SALES PERSON</label>
						<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 63%; ">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="width: 119%; float: left;">
						<label>APPROVED BY</label>
						<input type="text" name="approved_by" value="<?php echo isset($info['approved_by'])?$info['approved_by']:''; ?>" style="width: 64%;">
					</div>
				</div>
			</div>
			<!-- LEFT SIDE END -->
			
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 50%; border-right: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<h2 style="margin: 0 0 7px;float: left; width: 100%; font-size: 16px;"><strong>DEALER INSTALLED OPTIONS</strong>	</h2>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>1.</label>
						<input type="text" name="dealer1" value="<?php echo isset($info['dealer1'])?$info['dealer1']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer1_value" id="dealer1_value" class="priceadd" value="<?php echo isset($info['dealer1_value'])?$info['dealer1_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>2.</label>
						<input type="text" name="dealer2" value="<?php echo isset($info['dealer2'])?$info['dealer2']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer2_value" id="dealer2_value" class="priceadd" value="<?php echo isset($info['dealer2_value'])?$info['dealer2_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>3.</label>
						<input type="text" name="dealer3" value="<?php echo isset($info['dealer3'])?$info['dealer3']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer3_value" id="dealer3_value" class="priceadd" value="<?php echo isset($info['dealer3_value'])?$info['dealer3_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>4.</label>
						<input type="text" name="dealer4" value="<?php echo isset($info['dealer4'])?$info['dealer4']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer4_value" id="dealer4_value" class="priceadd" value="<?php echo isset($info['dealer4_value'])?$info['dealer4_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>5.</label>
						<input type="text" name="dealer5" value="<?php echo isset($info['dealer5'])?$info['dealer5']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer5_value" id="dealer5_value" class="priceadd" value="<?php echo isset($info['dealer5_value'])?$info['dealer5_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>6.</label>
						<input type="text" name="dealer6" value="<?php echo isset($info['dealer6'])?$info['dealer6']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer6_value" id="dealer6_value" class="priceadd" value="<?php echo isset($info['dealer6_value'])?$info['dealer6_value']:''; ?>"  style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>7.</label>
						<input type="text" name="dealer7" value="<?php echo isset($info['dealer7'])?$info['dealer7']:''; ?>" style="width: 92%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer7_value" id="dealer7_value" class="priceadd" value="<?php echo isset($info['dealer7_value'])?$info['dealer7_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 70%; float: left;">
						<label>Total.</label>
						<input type="text" name="dealer_total" value="<?php echo isset($info['dealer_total'])?$info['dealer_total']:''; ?>" style="width: 83%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>$</label>
						<input type="text" name="dealer_total_value" id="dealer_total_value" class="priceadd" value="<?php echo isset($info['dealer_total_value'])?$info['dealer_total_value']:''; ?>" style="width: 90%;">
					</div>
				</div>
				
				
				<div class="right-bottom" style="width: 100%; float: left;">
					<h2 style="float: left; width: 100%; font-size: 16px; margin: 14px 0 3px;">INSURANCE INFORMATION</h2>
					<div class="row" style="float: right; width: 60%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>EFFECTIVE DATES</label>
							<input type="text" name="effective_date" value="<?php echo isset($info['effective_date'])?$info['effective_date']:''; ?>" style="width: 49%;">
						</div>
						<div class="form-field" style="width: 100%; float: left;">
							<label>EXPIRATION DATE</label>
							<input type="text" name="expiration_date" value="<?php echo isset($info['expiration_date'])?$info['expiration_date']:''; ?>" style="width: 50%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>CO. NAME</label>
							<input type="text" name="dealer_name" value="<?php echo isset($info['dealer_name'])?$info['dealer_name']:''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>ADDRESS</label>
							<input type="text" name="dealer_address" value="<?php echo isset($info['dealer_address'])?$info['dealer_address']:''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>CITY</label>
							<input type="text" name="dealer_city" value="<?php echo isset($info['dealer_city'])?$info['dealer_city']:''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="width: 22%; float: left;">
							<label>STATE</label>
							<input type="text" name="dealer_state" value="<?php echo isset($info['dealer_state'])?$info['dealer_state']:''; ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="width: 28%; float: left;">
							<label>ZIP</label>
							<input type="text" name="dealer_zip" value="<?php echo isset($info['dealer_zip'])?$info['dealer_zip']:''; ?>" style="width: 78%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>POLICY #</label>
							<input type="text" name="dealer_policy" value="<?php echo isset($info['dealer_policy'])?$info['dealer_policy']:''; ?>" style="width: 84%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>PHONE(<input type="text" name="dealer_phone" value="<?php echo isset($info['dealer_phone'])?$info['dealer_phone']:''; ?>" style="width: 53%; border: 0px;">)</label>
							<input type="text" name="name" style="width: 56%;">
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>TEMP. TAG $11.00</label>
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<div class="form-field-inner" style="width: 50%; float: left;">
								<label>YES</label>
								<input type="text" name="temp_on" value="<?php echo isset($info['temp_on'])?$info['temp_on']:''; ?>" style="width: 70%;">
							</div>
							<div class="form-field-inner" style="width: 50%; float: left;">
								<label>NO</label>
								<input type="text" name="temp_off" value="<?php echo isset($info['temp_off'])?$info['temp_off']:''; ?>" style="width: 76%;">
							</div>
						</div>
					</div>
					
					<div class="row" style="float: right; width: 100%; margin: 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>CUSTOMER SIGNATURE</label>
							<input type="text" name="customer_signature" value="<?php echo isset($info['customer_signature'])?$info['customer_signature']:''; ?>" style="width: 100%; margin-bottom: 6px;">
						</div>
					</div>
					
					<div class="row" style="width: 100%; float: left; margin: ">
						<p style="float: left; margin: 0; font-size: 10px; padding-left: 2%;">WHITE COPY - OFFICE</p>
						<p style="float: left; margin: 0; font-size: 10px; margin: 0 0 0 10%;">YELLOW COPY - CUSTOMER</p>
						<p style="float: right; margin: 0; font-size: 10px;">PINK COPY - SALES PERSON</p>
					</div>
		
				</div>
				
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
	

	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis();
	});
	
	$("#btn_back").click(function(){
		
	});

	$(".pricechange").on('change keyup paste',function(){
		// if($("#doc").val()!=''&&$("rate_value").val()!='')
	 	calculate_tax();
	});

	function calculate_tax(){
		var sell_price = isNaN(parseFloat( $("#sell_price").val()))?0.00:parseFloat( $("#sell_price").val());
		var rebates = isNaN(parseFloat( $("#rebates").val()))?0.00:parseFloat( $("#rebates").val());
	    var trade_value = isNaN(parseFloat( $("#trade_value").val()))?0.00:parseFloat( $("#trade_value").val());
	    var trade_difference = isNaN(parseFloat( $("#trade_difference").val()))?0.00:parseFloat( $("#trade_difference").val());
	    var yr_protection = isNaN(parseFloat( $("#yr_protection").val()))?0.00:parseFloat( $("#yr_protection").val());
	    var fright = isNaN(parseFloat( $("#fright").val()))?0.00:parseFloat( $("#fright").val());
	    var doc = isNaN(parseFloat( $("#doc").val()))?0.00:parseFloat( $("#doc").val());
	    var p_a = isNaN(parseFloat( $("#p_a").val()))?0.00:parseFloat( $("#p_a").val());
	    var labor = isNaN(parseFloat( $("#labor").val()))?0.00:parseFloat( $("#labor").val());
	    var tax = isNaN(parseFloat( $("#tax").val()))?0.00:parseFloat( $("#tax").val());
	    var total_1 = isNaN(parseFloat( $("#total_1").val()))?0.00:parseFloat( $("#total_1").val());
	    var total_2 = isNaN(parseFloat( $("#total_2").val()))?0.00:parseFloat( $("#total_2").val());
	    var pay_off = isNaN(parseFloat( $("#pay_off").val()))?0.00:parseFloat( $("#pay_off").val());
	    var rate_value = isNaN(parseFloat( $("#rate_value").val()))?0.00:parseFloat( $("#rate_value").val());
	    var cash_down = isNaN(parseFloat( $("#cash_down").val()))?0.00:parseFloat( $("#cash_down").val());
	    var total1_amount = sell_price+trade_difference-rebates-trade_value;
	    $("#total_1").val(total1_amount.toFixed(2));
	    var total2_amount = (total1_amount+fright+p_a)*(1+parseFloat(rate_value)/100)+doc+labor+yr_protection;
	    $("#total_2").val(total2_amount.toFixed(2));
	    var total3_amount = total2_amount+pay_off-cash_down;
	    $("#act_total").val(total3_amount.toFixed(2));
	}
	$(".priceadd").on('change keyup paste',function(){
	 	calculate_dealer();
	});

	function calculate_dealer(){
		var dealer1_value = isNaN(parseFloat( $("#dealer1_value").val()))?0.00:parseFloat( $("#dealer1_value").val());
		var dealer2_value = isNaN(parseFloat( $("#dealer2_value").val()))?0.00:parseFloat( $("#dealer2_value").val());
		var dealer3_value = isNaN(parseFloat( $("#dealer3_value").val()))?0.00:parseFloat( $("#dealer3_value").val());
		var dealer4_value = isNaN(parseFloat( $("#dealer4_value").val()))?0.00:parseFloat( $("#dealer4_value").val());
		var dealer5_value = isNaN(parseFloat( $("#dealer5_value").val()))?0.00:parseFloat( $("#dealer5_value").val());
		var dealer6_value = isNaN(parseFloat( $("#dealer6_value").val()))?0.00:parseFloat( $("#dealer6_value").val());
		var dealer7_value = isNaN(parseFloat( $("#dealer7_value").val()))?0.00:parseFloat( $("#dealer7_value").val());
		var dealer_total = dealer1_value+dealer2_value+dealer3_value+dealer4_value+dealer5_value+dealer6_value+dealer7_value;
		 // dealer_total = (Math.round(dealer_total * 100))/100.0;
		 $("#dealer_total_value").val(dealer_total.toFixed(2));
	}

	$('#fixed_fee_options').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					$('#doc').val(data.doc_fee);
					$('#rate_value').val(data.tax_fee);
					calculate_tax();
				}
			});
		}
	});	
});
</script>
</div>
