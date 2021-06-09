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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px; border-top: 1px solid #000;}
	td, th{padding: 7px; border-bottom: 1px solid #000; border-right: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 2px;}
	
@media print {
	.wraper.main input {padding: 0px !important;}
	table input[type="text"]{padding: 2px 2px 1px !important;}
	.arrow {height: 517px !important;}
	.purchaser {margin: 32% 0 0 !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 30%;">
				<div class="logo" style="width: 100%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Bannerlogo.png'); ?>" alt="" style="width: 100%;">
				</div>
				<p><b>1701 Sparrow Drive <br> Nisku Alberta T9E 8A7 <br> 780 955-2570 <span>coachworksrv.com</span></b></p>
			</div>
			
			<div class="right" style="width: 50%; float: right;">
				<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 20px;">RV PURCHASE AGREEMENT</h2>
				<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px;">
					<div class="form-field" style="width: 100%; float: left; margin: 5px 0;">
						<label>Today's date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="width: 100%; float: left; margin: 5px 0;">
						<label>Requested pickup date</label>
						<input type="text" name="pickup_date" value="<?php echo isset($info['pickup_date'])?$info['pickup_date']:''; ?>" style="width: 64%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px; margin: 7px 0;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>NAME</label>
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 94%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 65%;">
					<label>ADDRESS</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 35%;">
					<label>CITY</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 85%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>POSTAL CODE</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 71%;">
				</div>
				<div class="form-field" style="float: left; width: 60%;">
					<label>EMAIL</label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>HOME PHONE</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 50%;">
					<label>CELL</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 88%;">
				</div>
			</div>	
		</div>
		
		<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px; margin: 7px 0;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				
				<div class="form-field" style="float: left; width: 15%;">
					<label style="margin: 0 1%;"><input type="radio" name="condition_used" value="Used" <?php echo ($info['condition'] == "Used") ? "checked" : ""; ?> /> USED</label>
					<label><input type="radio" name="condition_new" value="New" <?php echo ($info['condition'] == 'New') ? "checked" : ""; ?> /> NEW</label>
				</div>
				<div class="form-field" style="float: left; width: 27%;">
					<label>YEAR</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 79%;">
				</div>
				<div class="form-field" style="float: left; width: 58%;">
					<label>STOCK#</label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 87%;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>MAKE</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 60%;">
					<label>MODEL</label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>VIN#</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 95%;">
				</div>
			</div>	
		</div>
		
		<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px; margin: 7px 0;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 30%;">
					<label>TRADE TYPE</label>
					<input type="text" name="trade_type" value="<?php echo isset($info['trade_type'])?$info['trade_type']:''; ?>" style="width: 63%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>YEAR</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label>APPROXIMATE LIEN AMOUNT</label>
					<input type="text" name="lien_amount" value="<?php echo isset($info['lien_amount'])?$info['lien_amount']:''; ?>" style="width: 43%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>MAKE</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 60%;">
					<label>MODEL</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>VIN#</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 95%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px;">
			<div class="left" style="float: left; width: 48%;">
				<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px; margin: 7px 0;">
					<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td style="width: 80%;"><b style="width: 16px;">RV ON THE ROAD PACKAGE</b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="rv_package" name="rv_package" value="<?php echo isset($info['rv_package'])?$info['rv_package']: '499.00'; ?>" style="width: 100%; font-size: 15px; font-weight: 700;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><p style="margin: 0; font-size: 12px;">Includes: gas, water, electrical test, propane tanks filled power adaptor, sewer hose, interior & exterior detail, full orientation and show through on delivery.</p></td>
							<td style="width: 20%; text-align: right;">&nbsp;</td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;">RV BATTERY INSTALLED</b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="battery_install" name="battery_install" value="<?php echo isset($info['battery_install'])?$info['battery_install']: '199.00'; ?>" style="width: 100%; font-size: 15px; font-weight: 700;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;">SPARE TIRE KIT INSTALLED</b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="spare_tire" name="spare_tire" value="<?php echo isset($info['spare_tire'])?$info['spare_tire']: '299.00'; ?>" style="width: 100%; font-size: 15px; font-weight: 700;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price1" name="price1" value="<?php echo isset($info['price1'])?$info['price1']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price2" name="price2" value="<?php echo isset($info['price2'])?$info['price2']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title3" value="<?php echo isset($info['title3'])?$info['title3']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price3" name="price3" value="<?php echo isset($info['price3'])?$info['price3']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title4" value="<?php echo isset($info['title4'])?$info['title4']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price4" name="price4" value="<?php echo isset($info['price4'])?$info['price4']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title5" value="<?php echo isset($info['title5'])?$info['title5']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price5" name="price5" value="<?php echo isset($info['price5'])?$info['price5']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title6" value="<?php echo isset($info['title6'])?$info['title6']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price6" name="price6" value="<?php echo isset($info['price6'])?$info['price6']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title7" value="<?php echo isset($info['title7'])?$info['title7']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price7" name="price7" value="<?php echo isset($info['price7'])?$info['price7']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title8" value="<?php echo isset($info['title8'])?$info['title8']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price8" name="price8" value="<?php echo isset($info['price8'])?$info['price8']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title9" value="<?php echo isset($info['title9'])?$info['title9']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price9" name="price9" value="<?php echo isset($info['price9'])?$info['price9']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title10" value="<?php echo isset($info['title10'])?$info['title10']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price10" name="price10" value="<?php echo isset($info['price10'])?$info['price10']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title11" value="<?php echo isset($info['title11'])?$info['title11']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price11" name="price11" value="<?php echo isset($info['price11'])?$info['price11']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title12" value="<?php echo isset($info['title12'])?$info['title12']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price12" name="price12" value="<?php echo isset($info['price12'])?$info['price12']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title13" value="<?php echo isset($info['title13'])?$info['title13']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price13" name="price13" value="<?php echo isset($info['price13'])?$info['price13']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title14" value="<?php echo isset($info['title14'])?$info['title14']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price14" name="price14" value="<?php echo isset($info['price14'])?$info['price14']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%;"><b style="width: 16px;"><input type="text" name="title15" value="<?php echo isset($info['title15'])?$info['title15']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"><b style="width: 16px;"><input type="text" class="price" id="price15" name="price15" value="<?php echo isset($info['price15'])?$info['price15']: ''; ?>" style="width: 100%;"></b></td>
						</tr>
						
						<tr>
							<td style="width: 80%; border-right: 0px;"><b style="width: 16px;"><input type="text" name="title16" value="<?php echo isset($info['title16'])?$info['title16']:''; ?>" style="width: 100%;"></b></td>
							<td style="width: 20%; text-align: right;"></td>
						</tr>
						
						<tr>
							<td style="width: 80%; font-size: 16px;">HITCH/WIRE/BRAKE CONTROL</td>
							<td style="width: 20%; text-align: right; font-size: 16px;"><input type="text" class="price" id="wire" name="wire" value="<?php echo isset($info['wire'])?$info['wire']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: 80%; font-size: 16px;">TOTAL OPTION</td>
							<td style="width: 20%; text-align: right; font-size: 16px;"><input type="text" class="price" id="total_option" name="total_option" value="<?php echo isset($info['total_option'])?$info['total_option']: ''; ?>" style="width: 100%;"></td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="center" style="width: 4%; float: left; margin: 94px 0 0 0;">
				<img class="arrow" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/arrow.png'); ?>" alt="" style="width: 100%; height: 500px;">
			</div>
			
			<div class="right" style="float: right; width: 48%; box-sizing: border-box;">
				<div class="cover" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 10px; border-radius: 7px; margin: 2% 0 0;">
					<table cellpadding="0" cellspacing="0" width="100%;">
						<tr>
							<td style="width: width: 80%; font-size: 16px;">M.S.R.P</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="msrp" name="msrp" value="<?php echo isset($info['msrp'])?$info['msrp']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">ADJUSTMENTS</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="adjustment" name="adjustment" value="<?php echo isset($info['adjustment'])?$info['adjustment']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">SELLING PRICE</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="selling_price" name="selling_price" value="<?php echo isset($info['selling_price'])?$info['selling_price']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">OPTIONS</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="options" name="options" value="<?php echo isset($info['options'])?$info['options']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">SUB TOTAL</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="sub_total" name="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">TRADE VALUE</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="trade_value" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">DIFFERENCE</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" name="difference" value="<?php echo isset($info['difference'])?$info['difference']: ''; ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td style="width: width: 80%; font-size: 16px;">DEPOSIT</td>
							<td style="width: width: 20%; font-size: 16px;"><input type="text" class="price" id="deposit" name="deposit" value="<?php echo isset($info['deposit'])?$info['deposit']: ''; ?>" style="width: 100%;"></td>
						</tr>
					</table>
				</div>
				
				
				<div class="cover purchaser" style="width: 100%; float: left; border: 1px solid #000; box-sizing: border-box; padding: 4% 10px 10px; border-radius: 7px; margin: 25.5% 0 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label style="font-size: 18px;">Purchaser</label>
						<input type="text" name="purchaser" value="<?php echo isset($info['purchaser'])?$info['purchaser']: ''; ?>" style="width: 70%;">
					</div>
					<p style="float: left; width: 100%; font-size: 13px; margin: 12px 0 7px;">I hereby offer to purchase the above described vehicle and certify that I am the legal owner of described trade and that it is free of all liens other than what has been disclosed.</p>

					<p style="font-size: 13px; margin: 7px 0 10px;">I further understand that all deposits, partial payments and down payments are non-refundable once offer is accepted by dealer and purchaser.</p>
				
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label style="font-size: 18px;">Sales Rep</label>
						<input type="text" name="sales_rep" value="<?php echo isset($info['sales_rep'])?$info['sales_rep']: ''; ?>" style="width: 80%;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label style="font-size: 18px;">Manager</label>
						<input type="text" name="manager" value="<?php echo isset($info['manager'])?$info['manager']: ''; ?>" style="width: 81%;">
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


	$(".price").on('change keyup paste', function(){
		calculate_totalinvoice();
	});

		var rv_package = isNaN(parseFloat( $('#rv_package').val()))?0.00:parseFloat($('#rv_package').val());
		var battery_install = isNaN(parseFloat( $('#battery_install').val()))?0.00:parseFloat($('#battery_install').val());
		var spare_tire = isNaN(parseFloat( $('#spare_tire').val()))?0.00:parseFloat($('#spare_tire').val());
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
		var wire = isNaN(parseFloat( $('#wire').val()))?0.00:parseFloat($('#wire').val());
		var total_option = rv_package + battery_install + spare_tire + price1 + price2 +price3 + price4 + price5 + price6 + price7 + price8 + price9 + price10 + price11 + price12 + price13 + price14 + price15 + price16 + wire;
		$("#total_option").val(total_option.toFixed(2));
		$("#options").val(total_option.toFixed(2));

		var msrp = isNaN(parseFloat( $('#msrp').val()))?0.00:parseFloat($('#msrp').val());
		var adjustment = isNaN(parseFloat( $('#adjustment').val()))?0.00:parseFloat($('#adjustment').val());
		var selling_price = msrp - adjustment;
		$("#selling_price").val(selling_price.toFixed(2));
		var sub_total = total_option + selling_price;
		$("#sub_total").val(sub_total.toFixed(2));
		var trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat($('#trade_value').val());
		
	function calculate_totalinvoice() {
		var rv_package = isNaN(parseFloat( $('#rv_package').val()))?0.00:parseFloat($('#rv_package').val());
		var battery_install = isNaN(parseFloat( $('#battery_install').val()))?0.00:parseFloat($('#battery_install').val());
		var spare_tire = isNaN(parseFloat( $('#spare_tire').val()))?0.00:parseFloat($('#spare_tire').val());
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
		var wire = isNaN(parseFloat( $('#wire').val()))?0.00:parseFloat($('#wire').val());
		var total_option = rv_package + battery_install + spare_tire + price1 + price2 +price3 + price4 + price5 + price6 + price7 + price8 + price9 + price10 + price11 + price12 + price13 + price14 + price15 + price16 + wire;
		$("#total_option").val(total_option.toFixed(2));
		$("#options").val(total_option.toFixed(2));

		var msrp = isNaN(parseFloat( $('#msrp').val()))?0.00:parseFloat($('#msrp').val());
		var adjustment = isNaN(parseFloat( $('#adjustment').val()))?0.00:parseFloat($('#adjustment').val());
		var selling_price = msrp - adjustment;
		$("#selling_price").val(selling_price.toFixed(2));
		var sub_total = total_option + selling_price;
		$("#sub_total").val(sub_total.toFixed(2));
		var trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat($('#trade_value').val());
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
