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

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 3px;}
	
	
	
@media print {
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%;margin: 3px 0; font-size: 20px; text-align: center;"><b>PHARR I RV's, INC.</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 37%; float: left;">
				<label>PURCHASER</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>SPOUSE</label>
				<input type="text" name="spouse" value="<?php echo isset($info['spouse']) ? $info['spouse'] : $info['spouse_first_name']." ".$info['spouse_last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="width: 29%; float: left;">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 70%; float: left;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>HOMEPHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 17%; float: left;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 17%; float: left;">
				<label>CO.</label>
				<input type="text" name="co" value="<?php echo isset($info['co'])?$info['co']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="width: 19%; float: left;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="width: 17%; float: left;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>WORK PHONE</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 62%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="width: 70%; float: left;">
				<label>E-MAIL:</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="width: 30%; float: left;">
				<label>CELL PHONE</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 65%;">
			</div>
		</div>
		
		
		
		<table cellpadding="0" cellspacing="0" width="100%;" style="float: left; width: 100%;">
			<tr>
				<td style="width: 32%;">
					<label>SALESMAN</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 100%;">
				</td>
				<td style="width: 32%;">
					<label>SERIAL NUMBER</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label>STK #</label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label>DEL DATE</label>
					<input type="text" name="del_date" value="<?php echo isset($info['del_date'])?$info['del_date']:''; ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="width: 64%;">
					<label>UNIT DESCRIPITION</label>
					<input type="text" name="unit_descrip" value="<?php echo isset($info['unit_descrip'])?$info['unit_descrip']:$info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label>MILEAGE</label>
					<input type="text" name="milege" value="<?php echo isset($info['milege'])?$info['milege']:''; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label>DEL TIME</label>
					<input type="text" name="del_time" value="<?php echo isset($info['del_time'])?$info['del_time']:''; ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="width: 64%;">
					<label>UNIT Colors</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label><b>SALE PRICE</b></label>
				</td>
				<td style="width: 18%;">
					<input type="text" name="unit_value" class="price" id="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="width: 64%; height: 27px;">
					<label>TRADE DESCRIPITION #1</label>
					<textarea name="trade_descrip1" style="width: 40%; border: 0px; height: 40px;"><?php echo isset($info['trade_descrip1']) ? $info['trade_descrip1'] : $info['year_trade'].' '.$info['make_trade'].' '.$info['model_trade']; ?></textarea>
					<label>Trade Milage</label>
					<input type="text" name="trade_milage1" value="<?php echo isset($info['trade_milage1'])?$info['trade_milage1']:''; ?>" style="width: 16%;">
				</td>
				<td style="width: 18%;">
					<label><b>LESS TRADE-IN</b></label>
				</td>
				<td style="width: 18%;">
					<input type="text" name="less_trade" class="price" id="less_trade" value="<?php echo isset($info['less_trade'])?$info['less_trade']:''; ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="width: 64%; height: 27px;">
					<label>TRADE DESCRIPITION #2</label>
					<textarea name="trade_descrip2" style="width: 40%; border: 0px; height: 40px;"><?php echo isset($info['trade_descrip2']) ? $info['trade_descrip2'] : ''; ?></textarea>
					<label>Trade Milage</label>
					<input type="text" name="trade_milage2" value="<?php echo isset($info['trade_milage2'])?$info['trade_milage2']:''; ?>" style="width: 16%;">
				</td>
				<td style="width: 18%;">
					<label><b>TRADE DIFFERENCE</b></label>
				</td>
				<td style="width: 18%;">
					<input type="text" name="trade_defference" class="price" id="trade_defference" value="<?php echo isset($info['trade_defference'])?$info['trade_defference']:''; ?>" style="width: 100%;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2" style="width: 64%;">
					<label>TOW VEHICLE</label>
					<input type="text" name="tow_vehicle" value="<?php echo isset($info['tow_vehicle'])?$info['tow_vehicle']:''; ?>" style="width: 100%;">
				</td>
				<td style="width: 18%;">
					<label><b>PAYOFF AMOUNT</b></label>
				</td>
				<td style="width: 18%;">
					<input type="text" name="payoff_amount" class="price" id="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width: 100%;">
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%; float: left;">
			<tr>
				<tr>
					<td style="width: 7%;">&nbsp;</td>
					<td style="width: 10%;">
						<label style="display: block; font-size: 11px; text-align: center;"><b>WET/DRY</b></label>
						<input type="text" name="dry" value="<?php echo isset($info['dry'])?$info['dry']:''; ?>" style="width: 100%; text-align: center;">
					</td>
					<td style="width: 10%;">
						<label style="display: block; font-size: 11px; text-align: center;"><b>AS-IS</b></label>
						<input type="text" name="as_is" value="<?php echo isset($info['as_is'])?$info['as_is']:''; ?>" style="width: 100%; text-align: center;">
					</td>
					<td style="width: 10%;">
						<label style="display: block; font-size: 11px; text-align: center;"><b>WEIGHT SLIP</b></label>
						<input type="text" name="weight_slip" value="<?php echo isset($info['weight_slip'])?$info['weight_slip']:''; ?>" style="width: 100%; text-align: center;">
					</td>
					<td style="width: 10%;">
						<label style="display: block; font-size: 11px; text-align: center;"><b>GREEN SHEET</b></label>
						<input type="text" name="green_sheet" value="<?php echo isset($info['green_sheet'])?$info['green_sheet']:''; ?>" style="width: 100%; text-align: center;">
					</td>
					<td style="width: 10%;">
						<label style="display: block; font-size: 11px; text-align: center;"><b>VIN VERIFIED</b></label>
						<input type="text" name="vin_verified" value="<?php echo isset($info['vin_verified'])?$info['vin_verified']:''; ?>" style="width: 100%; text-align: center;">
					</td>
					<td style="width: 6.99%;">&nbsp;</td>
					<td style="width: 18%;">
						<label><b>VEHICLE SALE TOTAL</b></label>
					</td>
					<td style="width: 18%;">
						<input type="text" name="sale_total" class="price" id="sale_total" value="<?php echo isset($info['sale_total'])?$info['sale_total']:''; ?>" style="width: 100%;">
					</td>
				</tr>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%; float: left;">
			<tr>
				<td colspan="3" style="width: 22%; text-align: center; border-right: 0px; font-size: 13px;"><b>PRE-DELIVERY INSPECTION</b></td>
				<td colspan="2" style="width: 20%; text-align: center; border-right: 0px; font-size: 13px;"><b>STATE INSPECTION</b></td>
				<td colspan="2" style="width: 22%; text-align: center; font-size: 13px;"><b>REGISTRATION EXPIRATION</b></td>
				<td rowspan="1" style="width: 36%; border-bottom: 0px;">&nbsp;</td>
			</tr>
			
			<tr>
				<td style="text-align: center;">1</td>
				<td style="text-align: center;">2</td>
				<td style="text-align: center;">3</td>
				<td style="text-align: center;">1 YEAR</td>
				<td style="text-align: center;">2 YEAR</td>
				<td colspan="2">
					<p style="float: left; width: 50%; margin: 0;">
						<label style="font-size: 10px;">MONTH</label>
						<input type="text" name="month" value="<?php echo isset($info['month'])?$info['month']:''; ?>" style="width: 100%;">
					</p>
					<p style="float: left; width: 50%; margin: 0;">
						<label style="font-size: 10px;">YEAR</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
					</p>
				</td>
				<td></td>
			</tr>
		</table>
		
		
		
		<table cellpadding="0" cellspacing="0" width="100%; float: left;">
			<tr>
				<td style="width: 12%;"><b>PART #</b></td>
				<td style="text-align: center;"><b>DESCRIPTION</b></td>
				<td style="text-align: center; width: 9%;"><b>CP/POC</b></td>
				<td style="text-align: center; width: 9%;"></td>
				<td style="text-align: center; width: 18%;"><b>Quoted <br> Price</b></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part1" value="<?php echo isset($info['part1'])?$info['part1']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description1" value="<?php echo isset($info['description1'])?$info['description1']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc1" value="<?php echo isset($info['poc1'])?$info['poc1']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote1" value="<?php echo isset($info['quote1'])?$info['quote1']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price2" class="price" id="price2" value="<?php echo isset($info['price2'])?$info['price2']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part2" value="<?php echo isset($info['part2'])?$info['part2']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description2" value="<?php echo isset($info['description2'])?$info['description2']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc2" value="<?php echo isset($info['poc2'])?$info['poc2']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote2" value="<?php echo isset($info['quote2'])?$info['quote2']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price3" class="price" id="price3" value="<?php echo isset($info['price3'])?$info['price3']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part3" value="<?php echo isset($info['part3'])?$info['part3']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description3" value="<?php echo isset($info['description3'])?$info['description3']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc3" value="<?php echo isset($info['poc3'])?$info['poc3']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote3" value="<?php echo isset($info['quote3'])?$info['quote3']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price4" class="price" id="price4" value="<?php echo isset($info['price4'])?$info['price4']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part4" value="<?php echo isset($info['part4'])?$info['part4']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description4" value="<?php echo isset($info['description4'])?$info['description4']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc4" value="<?php echo isset($info['poc4'])?$info['poc4']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote4" value="<?php echo isset($info['quote4'])?$info['quote4']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price5" class="price" id="price5" value="<?php echo isset($info['price5'])?$info['price5']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part5" value="<?php echo isset($info['part5'])?$info['part5']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description5" value="<?php echo isset($info['descriptiom5'])?$info['descriptiom5']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc5" value="<?php echo isset($info['poc5'])?$info['poc5']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote5" value="<?php echo isset($info['quote5'])?$info['quote5']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price6" class="price" id="price6" value="<?php echo isset($info['price6'])?$info['price6']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			
			<tr>
				<td><input type="text" name="part6" value="<?php echo isset($info['part6'])?$info['part6']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description6" value="<?php echo isset($info['description6'])?$info['description6']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc6" value="<?php echo isset($info['poc6'])?$info['poc6']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote6" value="<?php echo isset($info['quote6'])?$info['quote6']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price7" class="price" id="price7" value="<?php echo isset($info['price7'])?$info['price7']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="part7" value="<?php echo isset($info['part7'])?$info['part7']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="description7" value="<?php echo isset($info['description7'])?$info['description7']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="poc7" value="<?php echo isset($info['poc7'])?$info['poc7']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote7" value="<?php echo isset($info['quote7'])?$info['quote7']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price8" class="price" id="price8" value="<?php echo isset($info['price8'])?$info['price8']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			
			<tr>
				<td colspan="3" style="text-align: center;"><b>COMMENTS</b></td>
				<td style="text-align: center;"><input type="text" name="quote8" value="<?php echo isset($info['quote8'])?$info['quote8']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price9" class="price" id="price9" value="<?php echo isset($info['price9'])?$info['price9']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment1" value="<?php echo isset($info['comment1'])?$info['comment1']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote9" value="<?php echo isset($info['quote9'])?$info['quote9']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price10" class="price" id="price10" value="<?php echo isset($info['price10'])?$info['price10']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment2" value="<?php echo isset($info['comment2'])?$info['comment2']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote10" value="<?php echo isset($info['quote10'])?$info['quote10']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price11" class="price" id="price11" value="<?php echo isset($info['price11'])?$info['price11']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment3" value="<?php echo isset($info['comment3'])?$info['comment3']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote11" value="<?php echo isset($info['quote11'])?$info['quote11']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price12" class="price" id="price12" value="<?php echo isset($info['price12'])?$info['price12']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment4" value="<?php echo isset($info['comment4'])?$info['comment4']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote12" value="<?php echo isset($info['quote12'])?$info['quote12']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price13" class="price" id="price13" value="<?php echo isset($info['price13'])?$info['price13']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment5" value="<?php echo isset($info['comment5'])?$info['comment5']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote13" value="<?php echo isset($info['quote13'])?$info['quote13']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price14" class="price" id="price14" value="<?php echo isset($info['price14'])?$info['price14']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment6" value="<?php echo isset($info['comment6'])?$info['comment6']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote14" value="<?php echo isset($info['quote14'])?$info['quote14']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price15" class="price" id="price15" value="<?php echo isset($info['price15'])?$info['price15']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment7" value="<?php echo isset($info['comment7'])?$info['comment7']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote15" value="<?php echo isset($info['quote15'])?$info['quote15']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price16" class="price" id="price16" value="<?php echo isset($info['price16'])?$info['price16']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment8" value="<?php echo isset($info['comment8'])?$info['comment8']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><label style="font-size: 8px;"><b>DEALER INSTALLED OPTION</b></label></td>
				<td style="text-align: center;"><input type="text" name="price17" class="price" id="price17" value="<?php echo isset($info['price17'])?$info['price17']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment9" value="<?php echo isset($info['comment9'])?$info['comment9']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: left;"><b>TOTAL</b></td>
				<td style="text-align: center;"><input type="text" name="total" class="price" id="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align: center;"><input type="text" name="comment10" value="<?php echo isset($info['comment10'])?$info['comment10']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="quote18" value="<?php echo isset($info['quote18'])?$info['quote18']:''; ?>" style="width: 100%;"></td>
				<td style="text-align: center;"><input type="text" name="price19" class="price" id="price19" value="<?php echo isset($info['price19'])?$info['price19']:''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="width: 100%; float: left; margin: 0;">
			<p style="float: left; width: 50%; margin: 0; font-size: 14px;">I agree to purchase and I (We) certify the above information is correct and authorize seller and any prospective creditor to whom Seller submits this Statement to check my (our) credit and employment history and answer questions about their credit experiences with me (us).</p>
			<div class="form-field" style="width: 16%; float: left; box-sizing: border-box; border: 1px solid #000; border-right: 0px solid #000; border-top: 0px; text-align: center; height: 60px;">
				<label style="text-align: center;">Deposit</label>
				<input type="text" name="deposit" value="<?php echo isset($info['deposit'])?$info['deposit']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="width: 16%; float: left; box-sizing: border-box; border: 1px solid #000; border-right: 0px solid #000; border-top: 0px; text-align: center; height: 60px;">
				<label style="text-align: center;">CASH DOWN</label>
				<input type="text" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="width: 18%; float: left; box-sizing: border-box; border: 1px solid #000; border-top: 0px solid #000; text-align: center; height: 60px;">
				<label style="text-align: center;">DESIRED PAYMENT</label>
				<input type="text" name="desired_payment" value="<?php echo isset($info['desired_payment'])?$info['desired_payment']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>BUYER'S SIGNATURE</b></label>
				<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin: 10px 0 0;">
			</div>
			<div class="form-field" style="float: right; width: 40%; margin-bottom: 10px;">
				<label><b>DEALER</b></label>
				<input type="text" name="dealer" value="<?php echo isset($info['dealer'])?$info['dealer']:''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin: 10px 0 0;">
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


	$(".price").on('change keyup paste', function(){
			calculate_totalaccess();
	});

	function calculate_totalaccess($this) {
		var unit_value = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var less_trade = isNaN(parseFloat( $('#less_trade').val()))?0.00:parseFloat($('#less_trade').val());
		var trade_defference = unit_value - less_trade;
		$("#trade_defference").val(trade_defference.toFixed(2));
		var payoff_amount = isNaN(parseFloat( $('#payoff_amount').val()))?0.00:parseFloat($('#payoff_amount').val());

		var sale_total = trade_defference + payoff_amount;
		$("#sale_total").val(sale_total.toFixed(2));

		var price1 = isNaN(parseFloat( $('#price1').val()))?0.00:parseFloat($('#price1').val());
		var price2 = isNaN(parseFloat( $('#price2').val()))?0.00:parseFloat($('#price2').val());
		var price3 = isNaN(parseFloat( $('#price3').val()))?0.00:parseFloat($('#price3').val());
		var price4 = isNaN(parseFloat( $('#price4').val()))?0.00:parseFloat($('#price4').val());
		var price5 = isNaN(parseFloat( $('#price5').val()))?0.00:parseFloat($('#price5').val());
		var price6 = isNaN(parseFloat( $('#price6').val()))?0.00:parseFloat($('#price6').val());
		var price7 = isNaN(parseFloat( $('#price7').val()))?0.00:parseFloat($('#price7').val());
		var price8 = isNaN(parseFloat( $('#price8').val()))?0.00:parseFloat($('#price8').val());

		var price9 = isNaN(parseFloat( $('#price9').val()))?0.00:parseFloat($('#price9').val());
		var price10 = isNaN(parseFloat( $('#price10').val()))?0.00:parseFloat($('#price10').val());
		var price11 = isNaN(parseFloat( $('#price11').val()))?0.00:parseFloat($('#price11').val());
		var price12 = isNaN(parseFloat( $('#price12').val()))?0.00:parseFloat($('#price12').val());
		var price13 = isNaN(parseFloat( $('#price13').val()))?0.00:parseFloat($('#price13').val());

		var price14 = isNaN(parseFloat( $('#price14').val()))?0.00:parseFloat($('#price14').val());
		var price15 = isNaN(parseFloat( $('#price15').val()))?0.00:parseFloat($('#price15').val());
		var price16 = isNaN(parseFloat( $('#price16').val()))?0.00:parseFloat($('#price16').val());
		var price17 = isNaN(parseFloat( $('#price17').val()))?0.00:parseFloat($('#price17').val());
		var total = sale_total + price1 + price2 + price3 + price4 + price5 + price6 + price7 + price8 + price9 +price10 + price11 + price12 + price13 + price14 + price15 + price16 + price17;
		
		$("#total").val(total.toFixed(2));

	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
