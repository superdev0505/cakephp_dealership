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
	.checks span{display: block;}
	label{font-size: 12px; margin: 0px;}
	li{margin-bottom: 7px; font-size: 16px;}
	td{border-bottom: 1px solid #000; border-right: 1px solid #000; padding: 5px;}
	.middle input[type="text"]{border-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	body{line-height: auto;}
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 0px 0;">
			<div class="logo" style="width: 200px; margin: 0 auto;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/one-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<h2 style="text-align: center; font-size: 14px; font-weight: normal; line-height: 14px;">418 Interstate Drive <span style="font-size: 10px; margin: 0  10px;">.</span> Mocksville, NC 27028 <br> toll free: 800.284.2377 <span style="font-size: 10px; margin: 0  10px;">.</span> phone: 336.751.2377 <span style="font-size: 10px; margin: 0  10px;">.</span> fax: 336.751.4464</h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: -41px 0 0;">
			<div class="form-field" style="border: 1px solid #000; width: 24%; float: right; padding: 7px; border-bottom: 0px;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : date("m/d/Y"); ?>" style="width: 70%; border: 0px;">
			</div>
		</div>
		
		<div class="upper" style="float: left; width: 100%; border: 1px solid #000;">
			<div class="row" style="float: left; width: 100%; margin: 2px 7px;">
				<div class="form-field" style="float: left; width: 60%;">
					<label>PURCHASER'S NAME</label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 73%;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label>BY:</label>
					<input type="text" name="by" value="<?php echo isset($info['by']) ? $info['by'] : ''; ?>" style="width: 87%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 7px;">
				<div class="form-field" style="float: left; width: 65%;">
					<label>PURCHASER'S NAME</label>
					<input type="text" name="purchaser" value="<?php echo isset($info['purchaser']) ? $info['purchaser'] : ''; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: left; width: 35%;">
					<label>RESIDENCE PHONE</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 53%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 7px;">
				<div class="form-field" style="float: left; width: 65%;">
					<label>CITY, STATE & ZIP</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 35%;">
					<label>BUSINESS PHONE</label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 57%;">
				</div>
			</div>
		</div>
		
		<div class="middle" style="float: left; width: 100%; margin: 7px 0;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 49.9%; border: 1px solid #000;">
				<h2 style="float: left; width: 100%; font-size: 15px; line-height: 15px; text-align: center; line-height: 30px; margin: 0; border-bottom: 1px solid #000; background-color: #ddd;"><b>VEHICLE BEING PURCHASED</b></h2>
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 0 0 0 3px; box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 78%;">
						<label style="float: left; font-size: 12px; margin: 15px 0 6px 2px; width: 45%;"><b>PLEASE ENTER MY ORDER FOR THE FOLOWING:</b></label>
						<div class="checks" style="float: left; width: 17%; font-size: 12px;">
							<span><input type="checkbox" name="new" value="new" <?php echo (isset($info['new'])&&$info['new']=='new')?'checked="checked"':''; ?> /> <b>NEW</b></span>
							<span><input type="checkbox" name="used" value="used" <?php echo (isset($info['used'])&&$info['used']=='used')?'checked="checked"':''; ?> /> <b>USED</b></span>
							<span><input type="checkbox" name="demo" value="demo" <?php echo (isset($info['demo'])&&$info['demo']=='demo')?'checked="checked"':''; ?> /> <b>DEMO</b></span>
						</div>
						<div class="checks" style="float: left; width: 30%; font-size: 12px;">
							<span><input type="checkbox" name="motor" value="motor" <?php echo (isset($info['motor'])&&$info['motor']=='motor')?'checked="checked"':''; ?> /> <b>MOTOR HOME</b></span>
							<span><input type="checkbox" name="truck" value="truck" <?php echo (isset($info['truck'])&&$info['truck']=='truck')?'checked="checked"':''; ?> /> <b>TRUCK</b></span>
							<span><input type="checkbox" name="trailer" value="trailer" <?php echo (isset($info['trailer'])&&$info['trailer']=='trailer')?'checked="checked"':''; ?> /> <b>TRAILER</b></span>
						</div>
					</div>
					<div class="form-field" style="float: right; width: 21%; text-align: center; border: 1px solid #000; height: 58px;">
						<label><b>STOCK NO.</b></label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 100%; border: 0px;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 1px 3px; box-sizing: border-box;">
					<div class="form-field" style="width: 30%; float: left;">
						<label>YEAR</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>MAKE</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="width: 40%; float: left;">
						<label>MILEAGE</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 64%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000; padding: 1px 3px;">
					<div class="form-field" style="width: 52%; float: left;">
						<label>MODEL OR SERIES</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="width: 48%; float: left;">
						<label>BODY TYPE</label>
						<input type="text" name="category" value="<?php echo isset($info['category']) ? $info['category'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 3px;">
					<div class="form-field" style="width: 50%; float: left;">
						<label>COLOR</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : ''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 50%; float: left;">
						<label>SUB-MODEL</label>
						<input type="text" name="sub_model" value="<?php echo isset($info['sub_model']) ? $info['sub_model'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 3px;">
					<div class="form-field" style="width: 100%; float: left;">
						<label>V.I.N. OR SER. NO.</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 3px;">
					<div class="form-field" style="width: 60%; float: left;">
						<label>TO BE DELIVERED <br>ON OR ABOUT</label>
						<input type="text" name="delivered" value="<?php echo isset($info['delivered']) ? $info['delivered'] : ''; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="width: 40%; float: left;">
						<label style="padding: 9px 0; display: inline-block;">SALESMAN</label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; box-sizing: border-box; padding: 1px 3px; border-bottom: 1px solid #000;">
					<h4 style="font-size: 14px; margin: 2px 0;"><b>IF A NEW VEHICLE SALE...</b></h4>
					<p style="font-size: 13px; margin: 2px 0;">The only warranties applying to this vehicle are those offered by the manufacturer.</p>
				</div>
				
				<div class="row" style="float: left; width: 100%; border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px 3px; margin: 0;">
					<h4 style="font-size: 14px; margin: 2px 0;"><b>IF USED  VEHICLE SALE - CHECK APPROPRITE BOX</b></h4>
					<p style="font-size: 13px; margin: 2px 0;"> <input type="checkbox" name="used_vehicle" value="yes" <?php echo (isset($info['used_vehicle'])&&$info['used_vehicle']=='yes')?'checked="checked"':''; ?> / > <b>AS IS:</b> This Vehicle is sold "as is" by us. This motor vehicle is sold as is without any warranty. This purchaser will bear the entire expense of repairing or correcting any defects that presently exist or that may occur in the Vehicle.</p>
					<b style="float: left; width: 100%; text-align: center; font-size: center; font-size: 15px; margin: 4px 0;">OR</b>
					<p style="font-size: 13px; margin: 2px 0;"> <input type="checkbox" name="new_vehicle" value="no" <?php echo (isset($info['used_vehicle'])&&$info['used_vehicle']=='no')?'checked="checked"':''; ?> / > The only Dealer Warrenty on this vehicle is the Limited Warranty which is issued with and made a part of this order form.</p>
				</div>
				
				<h2 style="background-color: #ddd; border-bottom: 1px solid #000; box-sizing: border-box; float: left; font-size: 12px; line-height: 12px; padding: 3px; text-align: center; width: 100%;">CONTRACTUAL DISCLOSURE STATEMENT FOR USED VEHICLE ONLY</h2>
				
				<h2 style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 0; font-size: 14px; line-height: 14px; box-sizing: border-box; padding: 1px;">"The information you see on the window from for this vehicle is part of this contract. Information on the window from overrides any contrary provisions in the contract of sale."</h2>
				
				<h2 style="box-sizing: border-box; padding: 1px; margin: 0; float: left; width: 100%; border-bottom: 1px solid #000; font-size: 13px; line-height: 13px; text-align: center;background-color: #ddd;">USED VEHICLE TRADED IN AND/OR OTHER CREDIT</h2>
				
				<div class="row" style="box-sizing: border-box; padding: 1px  3px; float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 30%; float: left;">
						<label>YEAR</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 40%; float: left;">
						<label>MAKE OF TRADE-IN</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>"  style="width: 36%;">
					</div>
					<div class="form-field" style="width: 30%; float: left;">
						<label>MILEAGE</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 55%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; box-sizing: border-box; padding: 1px  3px; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 50%; float: left;">
						<label>MODEL OR SERIES</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="width: 50%; float: left;">
						<label>BODY TYPE</label>
						<input type="text" name="category_trade" value="<?php echo isset($info['category_trade'])?$info['category_trade']:''; ?>" style="width: 69%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; box-sizing: border-box; padding: 1px  3px; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 50%; float: left;">
						<label>COLOR</label>
						<input type="text" name="color1" value="<?php echo isset($info['color1']) ? $info['color1'] : $info['usedunit_color']; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 50%; float: left;">
						<label>SUB-MODEL</label>
						<input type="text" name="sub_model_trade" value="<?php echo isset($info['sub_model_trade'])?$info['sub_model_trade']:''; ?>" style="width: 65%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000; box-sizing: border-box; padding: 1px  3px;">
					<div class="form-field" style="width: 100%; float: left;">
						<label>V.I.N. OR SER. NO.</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; box-sizing: border-box; padding: 1px  3px; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 100%; float: left;">
						<label><b>Balance Owed To:</b></label>
						<input type="text" name="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : "" ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; box-sizing: border-box; padding: 1px  3px; border-bottom: 1px solid #000;">
					<div class="form-field" style="width: 100%; float: left;">
						<label><b>Address:</b></label>
						<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 85%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 1px 1%; width: 60%;">
						<label><b>Used Trade-In Allowance:</b></label>
						<input type="text" name="used_trade_allowance" value="<?php echo isset($info['used_trade_allowance'])?$info['used_trade_allowance']:$info['used_trade_allowance']; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1%;">
						<label>$</label>
						<input type="text" name="used_price" value="<?php echo isset($info['used_price']) ? $info['used_price'] : "" ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="used_value" value="<?php echo isset($info['used_value']) ? $info['used_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 1px 1%; width: 60%;">
						<label><b>Balance Owned on Trade-In</b></label>
						<input type="text" name="balance_owed_trade" value="<?php echo isset($info['balance_owed_trade']) ? $info['balance_owed_trade'] : "" ?>" style="width: 30%;">
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="balance_price" value="<?php echo isset($info['balance_price']) ? $info['balance_price'] : "" ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="balace_value" value="<?php echo isset($info['balace_value']) ? $info['balace_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 3px 1%; width: 60%;">
						<label><b>Net Allowance on Used Trade-In</b></label>
						<input type="text" name="net_used_allowance" value="<?php echo isset($info['net_used_allowance']) ? $info['net_used_allowance'] : "" ?>" style="width: 25%;">
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1% 1px;">
						<label>$</label>
						<input type="text" name="net_price" value="<?php echo isset($info['net_price']) ? $info['net_price'] : "" ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="net_value" value="<?php echo isset($info['net_value']) ? $info['net_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 1px 1% ; width: 60%;">
						<label><b>Deposit</b></label>
						<input type="text" name="deposit1" value="<?php echo isset($info['deposit1']) ? $info['deposit1'] : "" ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1% 1px;">
						<input type="text" name="deposit1_price" value="<?php echo isset($info['deposit1_price']) ? $info['deposit1_price'] : "" ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="deposit1_value" value="<?php echo isset($info['deposit1_value']) ? $info['deposit1_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 1px 1%; width: 60%;">
						<label><b>Deposit</b></label>
						<input type="text" name="deposit2" value="<?php echo isset($info['deposit2']) ? $info['deposit2'] : "" ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="deposit2_price" value="<?php echo isset($info['deposit2_price']) ? $info['deposit2_price'] : "" ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="deposit2_value" value="<?php echo isset($info['deposit2_value']) ? $info['deposit2_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 1px 1%; width: 60%;">
						<label><b>TOTAL CREDIT (Transfer to Right Column)</b></label>
					</div>
					<div class="form-field" style="width: 25%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 1px 1%;">
						<label>$</label>
						<input type="text" name="total_price" value="<?php echo isset($info['total_price']) ? $info['total_price'] : "" ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="width: 14%; float: right; box-sizing: border-box; padding: 1px 1%;">
						<input type="text" name="total_value" value="<?php echo isset($info['total_value']) ? $info['total_value'] : "" ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
					<div class="form-field" style="box-sizing: border-box; float: left; padding: 3px 1%; width: 100%;">
						<label style="vertical-align: top;">MEMO:</label>
						<textarea id="memo" name="memo" style="border: 0px; width: 86%; height: 43px;"><?php echo isset($info['memo'])?$info['memo']:'' ?></textarea>
					</div>
				</div>
				
			</div>
			<!-- leftside end -->
			
			
			<!-- rightside start -->
				<div class="right-side" style="float: right; width: 49%; border: 1px solid #000;">
					<table cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td style="width: 72%;"><b style="font-size: 13px;">CASH DELIVERED PRICE OF VEHICLE</b></td>
							<td style="width: 18%;">$<input type="text" name="cash_price1" value="<?php echo isset($info['cash_price1']) ? $info['cash_price1'] : "" ?>" style="width: 80%;"></td>
							<td style="width: 10%;"><input type="text" name="cash_value1" value="<?php echo isset($info['cash_value1']) ? $info['cash_value1'] : "" ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="cash_deliverd2" value="<?php echo isset($info['cash_deliverd2']) ? $info['cash_deliverd2'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="cash_price2" value="<?php echo isset($info['cash_price2']) ? $info['cash_price2'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="cash_value2" value="<?php echo isset($info['cash_value2']) ? $info['cash_value2'] : "" ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="cash_deliverd3" value="<?php echo isset($info['cash_deliverd3']) ? $info['cash_deliverd3'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="cash_price3" value="<?php echo isset($info['cash_price3']) ? $info['cash_price3'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="cash_value3" value="<?php echo isset($info['cash_value3']) ? $info['cash_value3'] : "" ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><b style="font-size: 13px;">ADDITIONAL EQUIPMENT (Options)</b></td>
							<td>$ <input type="text" name="equip_price1" value="<?php echo isset($info['equip_price1']) ? $info['equip_price1'] : "" ?>" style="width: 80%;"></td>
							<td><input type="text" name="equip_value1" value="<?php echo isset($info['equip_value1']) ? $info['equip_value1'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip2" value="<?php echo isset($info['addition_equip2']) ? $info['addition_equip2'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price2" value="<?php echo isset($info['equip_price2']) ? $info['equip_price2'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value2" value="<?php echo isset($info['equip_value2']) ? $info['equip_value2'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip3" value="<?php echo isset($info['addition_equip3']) ? $info['addition_equip3'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price3" value="<?php echo isset($info['equip_price3']) ? $info['equip_price3'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value3" value="<?php echo isset($info['equip_value3']) ? $info['equip_value3'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip4" value="<?php echo isset($info['addition_equip4']) ? $info['addition_equip4'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price4" value="<?php echo isset($info['equip_price4']) ? $info['equip_price4'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value4" value="<?php echo isset($info['equip_value4']) ? $info['equip_value4'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip5" value="<?php echo isset($info['addition_equip5']) ? $info['addition_equip5'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price5" value="<?php echo isset($info['equip_price5']) ? $info['equip_price5'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value5" value="<?php echo isset($info['equip_value5']) ? $info['equip_value5'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip6" value="<?php echo isset($info['addition_equip6']) ? $info['addition_equip6'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price6" value="<?php echo isset($info['equip_price6']) ? $info['equip_price6'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value6" value="<?php echo isset($info['equip_value6']) ? $info['equip_value6'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip7" value="<?php echo isset($info['addition_equip7']) ? $info['addition_equip7'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price7" value="<?php echo isset($info['equip_price7']) ? $info['equip_price7'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value7" value="<?php echo isset($info['equip_value7']) ? $info['equip_value7'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip8" value="<?php echo isset($info['addition_equip8']) ? $info['addition_equip8'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price8" value="<?php echo isset($info['equip_price8']) ? $info['equip_price8'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value8" value="<?php echo isset($info['equip_value8']) ? $info['equip_value8'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip9" value="<?php echo isset($info['addition_equip9']) ? $info['addition_equip9'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price9" value="<?php echo isset($info['equip_price9']) ? $info['equip_price9'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value9" value="<?php echo isset($info['equip_value9']) ? $info['equip_value9'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip10" value="<?php echo isset($info['addition_equip10']) ? $info['addition_equip10'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price10" value="<?php echo isset($info['equip_price10']) ? $info['equip_price10'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value10" value="<?php echo isset($info['equip_value10']) ? $info['equip_value10'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip11" value="<?php echo isset($info['addition_equip11']) ? $info['addition_equip11'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price11" value="<?php echo isset($info['equip_price11']) ? $info['equip_price11'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value11" value="<?php echo isset($info['equip_value11']) ? $info['equip_value11'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip12" value="<?php echo isset($info['addition_equip12']) ? $info['addition_equip12'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price12" value="<?php echo isset($info['equip_price12']) ? $info['equip_price12'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value12" value="<?php echo isset($info['equip_value12']) ? $info['equip_value12'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip13" value="<?php echo isset($info['addition_equip13']) ? $info['addition_equip13'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price13" value="<?php echo isset($info['equip_price13']) ? $info['equip_price13'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value13" value="<?php echo isset($info['equip_value13']) ? $info['equip_value13'] : "" ?>" style="width: 100%;"></td>
						</tr>
						
						<tr>
							<td><input type="text" name="addition_equip14" value="<?php echo isset($info['addition_equip14']) ? $info['addition_equip14'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price14" value="<?php echo isset($info['equip_price14']) ? $info['equip_price14'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value14" value="<?php echo isset($info['equip_value14']) ? $info['equip_value14'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip15" value="<?php echo isset($info['addition_equip15']) ? $info['addition_equip15'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price15" value="<?php echo isset($info['equip_price15']) ? $info['equip_price15'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value15" value="<?php echo isset($info['equip_value15']) ? $info['equip_value15'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip16" value="<?php echo isset($info['addition_equip16']) ? $info['addition_equip16'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price16" value="<?php echo isset($info['equip_price16']) ? $info['equip_price16'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value16" value="<?php echo isset($info['equip_value16']) ? $info['equip_value16'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip17" value="<?php echo isset($info['addition_equip17']) ? $info['addition_equip17'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price17" value="<?php echo isset($info['equip_price17']) ? $info['equip_price17'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value17" value="<?php echo isset($info['equip_value17']) ? $info['equip_value17'] : "" ?>" style="width: 100%;"></td>
						</tr>
						<tr>
							<td><input type="text" name="addition_equip18" value="<?php echo isset($info['addition_equip18']) ? $info['addition_equip18'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_price18"  value="<?php echo isset($info['equip_price18']) ? $info['equip_price18'] : "" ?>" style="width: 100%;"></td>
							<td><input type="text" name="equip_value18" value="<?php echo isset($info['equip_value18']) ? $info['equip_value18'] : "" ?>" style="width: 100%;"></td>
						</tr>
					</table>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>Cash Price of Vehicle & Accessories:</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<label>$</label>
							<input type="text" name="vehicle_price" value="<?php echo isset($info['vehicle_price']) ? $info['vehicle_price'] : "" ?>" style="width: 70%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="vehicle_value" value="<?php echo isset($info['vehicle_value']) ? $info['vehicle_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>STATE AND LOCAL TAXES (if any)</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="state_price" value="<?php echo isset($info['state_price']) ? $info['state_price'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="state_value" value="<?php echo isset($info['state_value']) ? $info['state_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>Documentary Fee</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="document_price" value="<?php echo isset($info['document_price']) ? $info['document_price'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="document_value" value="<?php echo isset($info['document_value']) ? $info['document_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>License, License Transfer, Title, Registration Fee</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="license_price" value="<?php echo isset($info['license_price']) ? $info['license_price'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="license_value" value="<?php echo isset($info['license_value']) ? $info['license_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>TOTAL PRICE OF UNIT</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<label>$</label>
							<input type="text" name="total_price" value="<?php echo isset($info['total_price']) ? $info['total_price'] : "" ?>" style="width: 80%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="total_value" value="<?php echo isset($info['total_value']) ? $info['total_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%; background-color: #ddd;">
							<label><b>TOTAL CREDIT (TRANSFERRED FROM LEFT COLUMN)</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<label>$</label>
							<input type="text" name="credit_price" value="<?php echo isset($info['credit_price']) ? $info['credit_price'] : "" ?>" style="width: 80%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="credit_value" value="<?php echo isset($info['credit_value']) ? $info['credit_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0px; border-bottom: 1px solid #000;">
						<div class="form-field" style="border-right: 1px solid #000; box-sizing: border-box; float: left; padding: 6px 1% 5px; width: 72%;">
							<label><b>UNPAID CASH BALANCE DUE ON DELIVERY</b></label>
						</div>
						<div class="form-field" style="width: 18%; float: left; border-right: 1px solid #000; box-sizing: border-box; padding: 3px 1%;">
							<label>$</label>
							<input type="text" name="unpaid_price" value="<?php echo isset($info['unpaid_price']) ? $info['unpaid_price'] : "" ?>" style="width: 80%;">
						</div>
						<div class="form-field" style="width: 10%; float: right; box-sizing: border-box; padding: 3px 1%;">
							<input type="text" name="unpaid_value" value="<?php echo isset($info['unpaid_value']) ? $info['unpaid_value'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
				</div>
			<!-- rightside end -->
		</div>
		<!-- middle section end -->
		
		<div class="row" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px;">
			<p style="font-size: 13px;">Purchaser agrees that his Order on the face and reverse side hereof and any attachments here to includes all the terms and conditions, that this Order cancels and supersedes any prior agreements and as of the date hereof comprises the complete and exclusive statement of the terms of the agreeement relating to the subject matters covered hereby, and that THIS ORDER SHALL NOT BECOME BINDING UNTIL ACCEPTED BY DEALER OR HIS AUTHORIZED REPRESENTATIVE. Purchaser by his execution of this Order acknowledges that he has read its terms and conditions and has received a true copy of the Order. IF A DOCUMENTARY FEE OR PREPARATION CHARGE IS MADE, YOU HAVE A RIGHT TO A WRITTEN ITEMIZED PRICE FOR EACH SPECIFIC SERVICE PERFORMED. Dealers may not charge customers for services which are paid for by the manufacturer.</p>
			
			<div class="inner-content" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: auto; font-size: 16px; margin: 0 2% 0 0;"><b>Accepted By:</b></label>
				<div class="form-field" style="float: left; width: 46%;">
					<div class="form-field-inner" style="width: 25%; float: left;">
						<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : "" ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>Date</label>
					</div>
					<div class="form-field-inner" style="width: 75%; float: left;">
						<input type="text" name="authorized" value="<?php echo isset($info['authorized']) ? $info['authorized'] : "" ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>Dealer of His Authorized Pepresentative</label>
					</div>
				</div>
				
				<div class="form-field" style="float: right; width: 40%; margin: 0;">
					<div class="form-field-inner" style="width: 25%; float: left;">
						<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : "" ?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>Date</label>
					</div>
					<div class="form-field-inner" style="width: 75%; float: left;">
						<input type="text" name="cust_signature" value="<?php echo isset($info['cust_signature'])?$info['cust_signature']:'';?>" style="width: 100%; border-bottom: 1px solid #000;">
						<label>Purchaser's Signature</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px;">
			<strong style="float: left; width: 100%; text-align: center; display: block; font-size: 14px;">"THANK YOU - WE APPRECIATE YOUR BUSINESS"</strong>
			<strong style="float: left; width: 100%; text-align: center; display: block; font-size: 14px;">"RETAIL ORDER FOR A MOTOR VEHICLE"</strong>
			<strong style="float: left; width: 100%; text-align: center; display: block; font-size: 14px;">"IF A CREDIT SALE, REQUIRED INFORMATION CONTAINED ON A SEPARATE DISCLOSURE STATEMENT OF THIS FORM"</strong>
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
