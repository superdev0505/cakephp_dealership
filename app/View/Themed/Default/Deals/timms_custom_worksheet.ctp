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

if($cid == 980)
{
	$apr_arr = array('good' => 9.99,'poor' => 23.9, 'in_between' => 14.9);
}else
{
	$apr_arr = array('good' => 8.99,'poor' => 23.99, 'in_between' => 15.99);
}
$month_array = array('54'=>'54','60'=>'60','72'=>'72');
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
        <input name="ref_num" type="hidden"  value="<?php echo $info['ref_num']; ?>" />
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
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
        <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
	
	
	
	<div id="worksheet_container" style="width:1000px; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
			
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		.noprint{display:none;}
	}
	</style>

	<div class="wraper header"> 
		
		
		<div class="">
		<div class="row" style="float: left; width: 99%;margin-left:0px;">
			<h2 style="font-size:18px; width: 20%; float: left; margin: 0; text-decoration: underline;">Intent Of Purchase</h2>
			<div class="right" style="float: right; width: 65%;">
				<div class="form-field" style="float: left; width: 22%; margin: 0 0 10px 0;">
					<label>Date</label>
					<input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width: 70%; ">
				</div>
				<div class="form-field" style="float: left; width: 36%; margin: 0 0 10px 0; ">
					<label>Floor Manager</label>
					<input type="text" name="floor_mgr" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" style="width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 42%; margin: 0 0 10px 0; ">
					<label>Salesperson</label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 64%;">
				</div>
			</div>
			<div class="form-field" style="float: left;  width: 66%; margin: 0 0 10px 0; ">
				<label>Full Name</label>
				<input type="text" name="first_name" value="<?php echo isset($info['first_name'])?$info['first_name']:''; ?>" style="width: 47%;"> / <input type="text" name="last_name" value="<?php echo isset($info['last_name'])?$info['last_name']:''; ?>" style="width: 39%;">
			</div>
			<div class="form-field" style="float: left;  width: 34%; margin: 0 0 10px 0;">
				<label>Source</label>
				<input type="text" name="source" value="<?php echo isset($info['source'])?$info['source']:''; ?>" style="width: 82%; ">
			</div>
			<div class="form-field" style="float: left; width: 43%; margin: 0 0 10px 0;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left; width: 27%; margin: 0 0 10px 0;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0 0 10px 0;">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: left;  width: 15%; margin: 0 0 10px 0;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left;  width: 33%; margin: 0 0 10px 0;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left;  width: 33%; margin: 0 0 10px 0;">
				<label>Email</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left;  width: 15%; margin: 0 0 10px 0;">
				<label>Store Tour</label>
				<input type="text" name="store_tour" value="<?php echo isset($info['store_tour'])?$info['store_tour']:''; ?>" style="width: 44%;">
			</div>
			<div class="form-field" style="float: left;  width: 15%; margin: 0 0 10px 0;">
				<label>F.O.R.M</label>
				<input type="text" name="s_form" value="<?php echo isset($info['s_form'])?$info['s_form']:''; ?>" style="width: 57%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 50%; margin: 7px 0;">
			<div class="form-filed" style="float: left;  width: 48%; margin: 0 0 10px 0;">
				<label>Preferred Method: Phone</label>
				<input type="checkbox" name="perferred_method1" value="yes" <?php echo (isset($info['perferred_method1']) && $info['perferred_method1'] == 'yes')?'checked':''; ?> />
			</div>
			<div class="form-field" style="float: left;  width: 25%; margin: 0 0 10px 0;">
				<label>Text</label>
				<input type="checkbox" name="perferred_method2" value="yes" <?php echo (isset($info['perferred_method2']) && $info['perferred_method2'] == 'yes')?'checked':''; ?>>
			</div>
			<div class="form-field" style="float: left;  width: 25%; margin: 0 0 10px 0;">
				<label>Email</label>
				<input type="checkbox" name="perferred_method3" value="yes" <?php echo (isset($info['perferred_method3']) && $info['perferred_method3'] == 'yes')?'checked':''; ?> />
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><strong>Taxes:</strong> State</label>
				<input type="text" name="state_tax" id="state_tax" class="tax-total" value="<?php echo isset($info['state_tax'])?$info['state_tax']:''; ?>" style="width: 95%;">
			</div>
			<div class="form-field sty" style="float: left; width: 22%;">
				<label>County</label>
				<input type="text" name="county_tax" id="county_tax" class="tax-total" value="<?php echo isset($info['county_tax'])?$info['county_tax']:''; ?>" style="width: 95%;" />
			</div>
			<div class="form-field" style="float: left; width: 14%;">
				<label>City</label>
				<input type="text" name="city_tax" id="city_tax" class="tax-total" value="<?php echo isset($info['city_tax'])?$info['city_tax']:''; ?>"  style="width: 95%;">
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<label>Other</label>
				<input type="text" name="other_tax" id="other_tax" class="tax-total" value="<?php echo isset($info['other_tax'])?$info['other_tax']:''; ?>" style="width: 95%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>Total</label>
				<input type="text" name="total_tax" id="total_tax" value="<?php echo isset($info['total_tax'])?$info['total_tax']:''; ?>" style="width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: right; width: 46%; text-align: center; box-sizing: border-box; border: 3px solid #000; padding: 10px; margin: 9px 0 0;">
			<p style="margin: 0;">Bank’s Desired Initial Investment is 20%-30%</p>
			<p style="margin: 0;">
				<label>Available Customer Funds $</label>
				<input type="text" name="cust_fund" value="<?php echo isset($info['cust_fund'])?$info['cust_fund']:''; ?>" style="width: 19%;">
				<label>Up to $</label>
				<input type="text" name="upto_amount" value="<?php echo isset($info['upto_amount'])?$info['upto_amount']:''; ?>" style="width: 19%;">
			</p>
			<p style="margin: 0;"><label>My Credit is:</label>  <strong><input type="radio" data-apr="<?php echo $apr_arr['good']; ?>" name="credit_score" value="good" <?php echo (isset($info['credit_score']) && $info['credit_score'] == 'good')?'checked':''; ?> />&nbsp;Good&nbsp;&nbsp;<input type="radio" name="credit_score" data-apr="<?php echo $apr_arr['poor']; ?>" value="poor" <?php echo (isset($info['credit_score']) && $info['credit_score'] == 'poor')?'checked':''; ?> />&nbsp;Poor&nbsp;&nbsp;<input type="radio" name="credit_score" data-apr="<?php echo $apr_arr['in_between']; ?>" value="in_between" <?php echo (isset($info['credit_score']) && $info['credit_score'] == 'in_between')?'checked':''; ?> />&nbsp; Somewhere In Between</strong></p>
		</div>
		
		<div style="clear: both;"></div>
        <div style="width:100%;float:left;padding:7px 0px 3px 3px;;">
		<h2 style="float: left; width: 30%;text-transform: uppercase; font-size: 20px;">Trade Info</h2>
        <div style="width:50%;float:left;" ><label style="display:inline;">(ACV &nbsp;<input type="text" name="acv_val" style="width:20%" value="<?php echo isset($info['acv_val'])?$info['acv_val']:''; ?>" />)&nbsp;&nbsp;&nbsp;(BIDDER&nbsp;<input type="text" name="bidder_val" style="width:20%" value="<?php echo isset($info['bidder_val'])?$info['bidder_val']:''; ?>" /> )</label></div>
        </div>
		<div class="row" style="border: 1px solid #000; box-sizing: border-box; float: left; margin: 7px 0; padding: 1px 0 0 10px; width: 32%;">	
		
		<div class="form-fiield" style="float: left; width: 36%; margin: 5px 0;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 64%; ">
			</div>
			<div class="form-field" style="float: left; width: 64%; margin: 5px 0;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Mileage</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 48%; margin: 5px 0;">
				<label>Color</label>
				<input type="text" name="used_unit_color" value="<?php echo isset($info['used_unit_color'])?$info['used_unit_color']:''; ?>" style="width: 69%;">
			</div>
			<div class="form-field" style="float: left; width: 49%; margin: 5px 0;">
				<label>TIPO$</label>
				<input type="text" name="tipo_amount" id="tipo_amount" value="<?php echo isset($info['tipo_amount'])?$info['tipo_amount']:''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Bank</label>
				<input type="text" name="bank_trade" value="<?php echo isset($info['bank_trade'])?$info['bank_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>Vin</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 87.6%;">
			</div>
           
		</div>
		
		
		<div class="row" style="float: left; width: 32%; margin: 7px 21px; border: 1px solid #000; box-sizing: border-box; padding: 0px 10px 0px;">
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;padding:5px;">
				<h3 style="text-decoration:underline;text-align:center">Bike # 1</h3>
			</div>
            <div class="form-field sty" style="float: left; width: 60%; margin:5px 0;">
				<label>Stock #</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 63%;">
			</div>
            
			<div class="form-field sty" style="float: left; width: 40%; margin: 5px 0;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Col/Opt</label>
				<input type="text" name="col_opt" value="<?php echo isset($info['col_opt'])?$info['col_opt']:''; ?>" style="width: 59%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Mileage</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>VIN</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 85.5%;">
			</div>
		</div>
		
		
		<div class="row" style="border: 1px solid #000;    box-sizing: border-box;    float: right;    margin: 7px 0;    padding: 0 10px;    width: 31%;">
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;padding:5px;">
				<h3 style="text-decoration:underline;text-align:center">Bike # 2</h3>
			</div>
            <div class="form-field sty" style="float: left; width: 60%; margin:5px 0;">
				<label>Stock #</label>
				<input type="text" name="stock_num2" value="<?php echo isset($info['stock_num2'])?$info['stock_num2']:$addonVehicles[0]['AddonVehicle']['stock_num']; ?>" style="width: 63%;">
			</div>
			<div class="form-field sty" style="float: left; width: 40%; margin: 5px 0;">
				<label>Year</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$addonVehicles[0]['AddonVehicle']['year']; ?>" style="width: 68%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>Model</label>
				<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$addonVehicles[0]['AddonVehicle']['model']; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Col/Opt</label>
				<input type="text" name="col_opt2" value="<?php echo isset($info['col_opt2'])?$info['col_opt2']:''; ?>" style="width: 56%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 5px 0;">
				<label>Mileage</label>
				<input type="text" name="odometer2" value="<?php echo isset($info['odometer2'])?$info['odometer2']:$addonVehicles[0]['AddonVehicle']['odometer']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label>VIN</label>
				<input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:$addonVehicles[0]['AddonVehicle']['vin']; ?>" style="width: 85.5%;">
			</div>
		</div>
		
		<div style="float: left; width: 100%;"></div>
		<div class="row" style="float: left; width: 32%;  margin: 21px 0;  box-sizing: border-box;">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 2px 10px 10px;height:140px;">
					<h3 style="text-align: center; text-decoration: underline; margin: 0 0 4px; font-size: 16px;">Trade Appraisal</h3>
					
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label>Appraisal Value $</label>
						<input type="text" name="appraisal_value" class="trade-val-change" value="<?php echo isset($info['appraisal_value'])?$info['appraisal_value']:$info['trade_value']; ?>" id="appraisal_value" style=" width: 40%; float: right;" />
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label>(-) Trade Recon  $</label>
						<input type="text" name="trade_recon" id="trade_recon" class="trade-val-change" value="<?php echo isset($info['trade_recon'])?$info['trade_recon']:''; ?>" style=" width: 40%; float: right; " />
					</div>
					
					
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label>Total Trade Value $</label>
						<input type="text" name="total_trade_value" class="trade-val-change" id="total_trade_value" value="<?php echo isset($info['total_trade_value'])?$info['total_trade_value']:''; ?>" style=" width: 40%; float: right; ">
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 32%;  margin: 21px 0 26px 24px;">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 10px;  box-sizing: border-box;height:140px;">
					<div class="form-field" style="float: right; width: 100%;">
						<label>Total $</label>
						<input type="text" name="veh_total1" id="veh_total1" data-id="1" value="<?php echo isset($info['veh_total1'])?$info['veh_total1']:''; ?>" style=" width: 32%; ">
						<label>+ Tax /Title/Reg.</label>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: right; width: 31%;  margin: 21px 0px 25px;">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 10px;  box-sizing: border-box;height:140px;">
					
					<div class="form-field" style="float: right;width: 100%;">
						<label>Total $</label>
						<input type="text" name="veh_total2" value="<?php echo isset($info['veh_total2'])?$info['veh_total2']:''; ?>" id="veh_total2" data-id="2" style=" width: 32%; ">
						<label>+ Tax /Title/Reg.</label>
					</div>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
		
		<div class="row" style=" float: left; margin: 18px 0 22px; width: 32%;">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
					<h3 style="text-align: center; text-decoration: underline; margin: 0 0 4px; font-size: 17px;">Initial Investment</h3>
					<div class="form-field" style="float: left; width: 100%; margin: 25px 0 0;">
						<label>Bike #1 =$ </label>
						<input type="text" name="unit_invest1" id="unit_invest1" data-id="1" value="<?php echo isset($info['unit_invest1'])?$info['unit_invest1']:''; ?>" style=" width: 74%; ">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 22px 0 0;">
						<label>Bike #2 =$ </label>
						<input type="text" name="unit_invest2" id="unit_invest2" data-id="2" value="<?php echo isset($info['unit_invest2'])?$info['unit_invest2']:''; ?>" style=" width: 73%; ">
					</div>
				</div>
			</div>
		</div>
		

		<div class="row" style="float: left; width: 32%;  margin: 18px 0 0 21px; ">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 10px; height: 150px; box-sizing: border-box;">
					<h3 style="text-align: center; text-decoration: underline; margin: 0; font-size: 17px;">Monthly Investment</h3>
                    <div style="width:100%;margin-top:20px;text-align:center">
                    	<input type="text" name="monthly_invest_min1" id="monthly_invest_min1" value="<?php echo isset($info['monthly_invest_min1'])?$info['monthly_invest_min1']:''; ?>" style="width:30%"  />&nbsp;-&nbsp;
                        <input type="text" name="monthly_invest_max1" id="monthly_invest_max1" value="<?php echo isset($info['monthly_invest_max1'])?$info['monthly_invest_max1']:''; ?>" style="width:30%"/>
                    </div>
					<div style="width:100%;margin-top:10px;text-align:center">
                    	<?php echo $this->Form->input('monthly_option1',array('type' => 'select','options' => $month_array, 'label' =>false,'div' =>false,'style' => 'width:65%;','class' => 'monthly_option','name' => 'monthly_option1','value' => isset($info['monthly_option'])?$info['monthly_option']:'','id' => 'monthly_option1','data-id' => '1')); ?>
                    </div>
                    
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: right; width: 31%;  margin: 18px 0 21px;">
			<div class="ssss" style="margin: 0 auto; width: 100%;">
				<div class="line-box" style="float: left; width: 100%; border: 1px solid #000; padding: 10px; height: 150px; box-sizing: border-box;">
					<h3 style="text-align: center; text-decoration: underline; margin: 0; font-size: 17px;">Monthly Investment</h3>
                    <div style="width:100%;margin-top:20px;text-align:center">
                    	<input type="text" name="monthly_invest_min2" id="monthly_invest_min2" value="<?php echo isset($info['monthly_invest_min2'])?$info['monthly_invest_min2']:''; ?>" style="width:30%"  />&nbsp;-&nbsp;
                        <input type="text" name="monthly_invest_max2" value="<?php echo isset($info['monthly_invest_max2'])?$info['monthly_invest_max2']:''; ?>" id="monthly_invest_max2" style="width:30%"/>
                    </div>
                    <div style="width:100%;margin-top:10px;text-align:center">
                    	<?php echo $this->Form->input('monthly_option2',array('type' => 'select','options' => $month_array, 'label' =>false,'div' =>false,'style' => 'width:65%;','class' => 'monthly_option','name' => 'monthly_option2','value' => isset($info['monthly_option'])?$info['monthly_option']:'','id' => 'monthly_option2','data-id' => '2')); ?>
                    </div>
					
				</div>
			</div>
		</div>
		<div class="row noprint" style="float: left; width: 100%; margin: 7px 0;">
            <div class="form-field" style="float: left; width: 40%;">
            <label>Fixed Fee&nbsp;&nbsp;</label>
            	<?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select Fee",
							'class' => 'form-control fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80%;display:inline;',
							'data-id'=>'1',
							'value'=>isset($info['fixed_fee_options'])?$info['fixed_fee_options']:''
						));
						?>
            </div>
            <div class="form-field" style="float: left; width: 25%;">
            <label>Sales Tax&nbsp;&nbsp;</label>
            	<?php
				$sales_tax_options = array('percentage' => 'Total Percentage','fixed_amount' => 'Fixed $ Amount');
						echo $this->Form->input('sales_tax_type1', array(
							'id' => "sales_tax_type1",
							'name' => "sales_tax_type1",
							'type' => 'select',
							'options' => $sales_tax_options,
							'class' => 'form-control sales_tax_type',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:70%;display:inline;',
							'data-id'=>'1',
							'value'=>isset($info['sales_tax_type1'])?$info['sales_tax_type1']:'pecentage'
						));
						?>
            </div>
            <div class="form-field" style="float: left; width: 25%;display:none;" id="fixed_tax_div1">
            	<label>Tax Amount&nbsp;&nbsp;</label>
            	<input type="text" name="tax_fixed_amount1" id="tax_fixed_amount1" class="amount-change" value="<?php echo 
				isset($info['tax_fixed_amount1'])?$info['tax_fixed_amount1']:'300'; ?>" style="width:50%;" data-id="1" />
            </div>
        </div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%; margin: 7px 0;">
				<label><strong>Bike #1</strong> Price of</label>
				<input type="text" name="unit_value1" id="unit_value1" data-id="1" class="amount-change" value="<?php echo isset($info['unit_value1'])?$info['unit_value1']:$info['unit_value']; ?>" style="width: 41%;">
			</div>
			<div class="form-field sty" style="float: left; width: 22%; margin: 7px 0;">
				<label>(+) Prep/Freight </label>
				<input type="text" name="prep_fee1" id="prep_fee1" data-id="1" class="amount-change" value="<?php echo isset($info['prep_fee1'])?$info['prep_fee1']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 7px 0;">
				<label>(+)Doc</label>
				<input type="text" name="doc_fee1" id="doc_fee1" data-id="1" class="amount-change" value="<?php echo isset($info['doc_fee1'])?$info['doc_fee1']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 14%; margin: 7px 0;">
				<label>= Total </label>
				<input type="text" name="unit_total1" id="unit_total1" data-id="1" class="amount-change" value="<?php echo isset($info['unit_total1'])?$info['unit_total1']:''; ?>"  style="width: 61%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 14%; margin: 7px 0;">
				<label>(-) Trade of</label>
				<input type="text" name="trade_value1" id="trade_value1" data-id="1" class="amount-change" value="<?php echo isset($info['trade_value1'])?$info['trade_value1']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 18%; margin: 7px 0;">
				<label>= Tax Amount</label>
				<input type="text" name="tax_amount1" id="tax_amount1" data-id="1" class="amount-change" value="<?php echo isset($info['tax_amount1'])?$info['tax_amount1']:''; ?>" style="width: 45%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 19%; margin: 7px 0;">
				<label>(+) Sales Tax of</label>
				<input type="text" name="sales_tax1" id="sales_tax1" data-id="1" class="amount-change" value="<?php echo isset($info['sales_tax1'])?$info['sales_tax1']:''; ?>" style="width: 37%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>= Subtotal</label>
				<input type="text" name="unit_subtotal1" id="unit_subtotal1" data-id="1" class="amount-change" value="<?php echo isset($info['unit_subtotal1'])?$info['unit_subtotal1']:''; ?>" style="width: 48%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>+ Title</label>
				<input type="text" name="title_fee1" id="title_fee1" data-id="1" class="amount-change" value="<?php echo isset($info['title_fee1'])?$info['title_fee1']:''; ?>" style="width: 51%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>+ Payoff </label>
				<input type="text" name="trade_payoff1" id="trade_payoff1" data-id="1" class="amount-change" value="<?php echo isset($info['trade_payoff1'])?$info['trade_payoff1']:''; ?>" style="width: 60%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>(-) Down $</label>
				<input type="text" name="down_payment1" id="down_payment1" data-id="1" class="amount-change" value="<?php echo isset($info['down_payment1'])?$info['down_payment1']:''; ?>" style="width: 41%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label> = Total </label>
				<input type="text" name="total_amount1" id="total_amount1" data-id="1" class="amount-change" value="<?php echo isset($info['total_amount1'])?$info['total_amount1']:''; ?>" style="width: 64%; margin: 7px 0;">
			</div>
		</div>
		
        	<div class="row noprint" style="float: left; width: 100%; margin: 7px 0;">
            <div class="form-field" style="float: left; width: 40%;">
            <label>Fixed Fee&nbsp;&nbsp;</label>
            	<?php
						echo $this->Form->input('fixed_fee_options2', array(
							'id' => "fixed_fee_options2",
							'name' => "fixed_fee_options2",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select Fee",
							'class' => 'form-control fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:70%;display:inline;',
							'data-id'=>'2',
							'value'=>isset($info['fixed_fee_options2'])?$info['fixed_fee_options2']:''
						));
						?>
            </div>
            <div class="form-field" style="float: left; width: 25%;">
            <label>Sales Tax&nbsp;&nbsp;</label>
            	<?php
				
						echo $this->Form->input('sales_tax_type2', array(
							'id' => "sales_tax_type2",
							'name' => "sales_tax_type2",
							'type' => 'select',
							'options' => $sales_tax_options,
							'class' => 'form-control sales_tax_type',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:70%;display:inline;',
							'data-id'=>'2',
							'value'=>isset($info['sales_tax_type2'])?$info['sales_tax_type2']:'pecentage'
						));
						?>
            </div>
            <div class="form-field" style="float: left; width: 25%;display:none;" id="fixed_tax_div2">
            	<label>Tax Amount&nbsp;&nbsp;</label>
            	<input type="text" name="tax_fixed_amount2" id="tax_fixed_amount2" class="amount-change" value="<?php echo 
				isset($info['tax_fixed_amount2'])?$info['tax_fixed_amount2']:'300'; ?>" style="width:50%;" data-id="2" />
            </div>
        </div>
        
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%; margin: 7px 0;">
				<label><strong>Bike #2</strong> Price of</label>
				<input type="text" name="unit_value2" id="unit_value2" data-id="2" class="amount-change"  value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:isset($addonVehicles[0])?$addonVehicles[0]['AddonVehicle']['unit_value']:''; ?>" style="width: 41%;">
			</div>
			<div class="form-field sty" style="float: left; width: 22%; margin: 7px 0;">
				<label>(+) Prep/Freight </label>
				<input type="text" name="prep_fee2" id="prep_fee2" data-id="2" class="amount-change" value="<?php echo isset($info['prep_fee2'])?$info['prep_fee2']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 12%; margin: 7px 0;">
				<label>(+)Doc</label>
				<input type="text" name="doc_fee2" id="doc_fee2" data-id="2" class="amount-change" value="<?php echo isset($info['doc_fee2'])?$info['doc_fee2']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 14%; margin: 7px 0;">
				<label>= Total </label>
				<input type="text" name="unit_total2" id="unit_total2" data-id="2" class="amount-change" value="<?php echo isset($info['unit_total2'])?$info['unit_total2']:''; ?>" style="width: 61%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 14%; margin: 7px 0;">
				<label>(-) Trade of</label>
				<input type="text" name="trade_value2" id="trade_value2" data-id="2" class="amount-change" value="<?php echo isset($info['trade_value2'])?$info['trade_value2']:''; ?>" style="width: 40%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 18%; margin: 7px 0;">
				<label>= Tax Amount</label>
				<input type="text" name="tax_amount2" id="tax_amount2" data-id="2" class="amount-change" value="<?php echo isset($info['tax_amount2'])?$info['tax_amount2']:''; ?>" style="width: 45%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 19%; margin: 7px 0;">
				<label>(+) Sales Tax of</label>
				<input type="text" name="sales_tax2" id="sales_tax2" data-id="2" class="amount-change" value="<?php echo isset($info['sales_tax2'])?$info['sales_tax2']:''; ?>" style="width: 37%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>= Subtotal</label>
				<input type="text" name="unit_subtotal2" id="unit_subtotal2" data-id="2" class="amount-change" value="<?php echo isset($info['unit_subtotal2'])?$info['unit_subtotal2']:''; ?>" style="width: 48%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 14%; margin: 7px 0;">
				<label>+ Title</label>
				<input type="text" name="title_fee2" id="title_fee2" data-id="2" class="amount-change" value="<?php echo isset($info['title_fee2'])?$info['title_fee2']:''; ?>" style="width: 51%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>+ Payoff </label>
				<input type="text" name="trade_payoff2" id="trade_payoff2" data-id="2" class="amount-change" value="<?php echo isset($info['trade_payoff2'])?$info['trade_payoff2']:''; ?>" style="width: 60%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>(-) Down $</label>
				<input type="text" name="down_payment2" id="down_payment2" data-id="2" class="amount-change" value="<?php echo isset($info['down_payment2'])?$info['down_payment2']:''; ?>" style="width: 41%; margin: 7px 0;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>= Total </label>
				<input type="text" name="total_amount2" id="total_amount2" data-id="2" class="amount-change" value="<?php echo isset($info['total_amount2'])?$info['total_amount2']:''; ?>" style="width: 64%; margin: 7px 0;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width : 100%; margin: 7px 0;">
			<p>I hereby indicate my intent to purchase a motorcycle. I understand that the payments shown to me above are based on estimates only; pending credit, payments may increase or decrease.</p>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Customer Signature:</label>
				<input type="text" name="cust_sign" style="width: 67%;">
			</div>
			<div class="form-field sty" style="float: left; width: 50%; margin: 7px 0;">
				<label>Manager Signature: </label>
				<input type="text" name="mgr_sign" style="width: 70%; margin: 7px 0;">
			</div>
		</div>
		
	
	</div>
    </div>
		
			
	
	</div>
		<!-- no print buttons -->
	<br/>
	<div class="noprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
    
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
            <select name="deal_status_id" id="deal_status_id" class="form-control pull-right" style="width: auto; display: inline-block;margin-left:5px;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php if(isset($info['deal_status_id'])) echo ($info['deal_status_id'] == $key)? 'selected="selected"' : "" ; ?> ><?php echo $value; ?></option>
			<?php } ?>
		</select>
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">
function assign_fees(data,v_id)
{
	$freight_fee = parseFloat(data.freight_fee) + parseFloat(data.prep_fee);
	$("#title_fee"+v_id).val(data.title_fee);
	$("#prep_fee"+v_id).val($freight_fee.toFixed(2));
	$("#doc_fee"+v_id).val(data.doc_fee);	
}

function calculate_monthly_amount(data_id)
{
	no_of_month = $("#monthly_option"+data_id).val();
	apr_percent = $("input[name=credit_score]:checked").attr('data-apr');
	total_amount = parseFloat($("#total_amount"+data_id).val());
	if(apr_percent)
	{
		no_of_month = parseInt(no_of_month);
		apr_percent = parseFloat(apr_percent);
		//apr_percent = parseFloat(apr_percent)/ 100 / 12;
		//rate = Math.pow(1 + apr_percent, no_of_month);
		//monthly_amount = (total_amount * rate * apr_percent) / (rate - 1);
		monthly_amount = (((apr_percent / 100) * total_amount) + total_amount)/no_of_month;
		monthly_amount = parseInt(monthly_amount);
		max_monthly_amount = monthly_amount + 10;
		
		$("#monthly_invest_min"+data_id).val(parseFloat(monthly_amount).toFixed(2));
		$("#monthly_invest_max"+data_id).val(parseFloat(max_monthly_amount).toFixed(2));
	}
}

$(document).ready(function(){

	function calculate_amount(data_id)
	{
		var unit_value = isNaN(parseFloat($("#unit_value"+data_id).val()))?0.00:parseFloat($("#unit_value"+data_id).val());
		var prep_fee = isNaN(parseFloat($("#prep_fee"+data_id).val()))?0.00:parseFloat($("#prep_fee"+data_id).val());
		var doc_fee = isNaN(parseFloat($("#doc_fee"+data_id).val()))?0.00:parseFloat($("#doc_fee"+data_id).val());
		
		var tax_percent = isNaN(parseFloat($("#total_tax").val()))?0.00:parseFloat($("#total_tax").val());
		var sales_tax_type = $("#sales_tax_type"+data_id).val();
		var sales_fixed_amt = isNaN(parseFloat($("#tax_fixed_amount"+data_id).val()))?0.00:parseFloat($("#tax_fixed_amount"+data_id).val());
		// Calculate unit total
		var unit_total = unit_value + prep_fee + doc_fee;
		$("#unit_total"+data_id).val(unit_total.toFixed(2));
		<?php  if($cid == 980) {?>
			$("#veh_total"+data_id).val(unit_value.toFixed(2));
		<?php }else{ ?>
			$("#veh_total"+data_id).val(unit_total.toFixed(2));
		<?php } ?>
			
		var trade_value = isNaN(parseFloat($("#trade_value"+data_id).val()))?0.00:parseFloat($("#trade_value"+data_id).val());
		
		//Tax Amount
		var tax_amount = unit_total - trade_value;
		$("#tax_amount"+data_id).val(tax_amount.toFixed(2));
		if(sales_tax_type == 'percentage'){
			sales_tax = (parseFloat(tax_percent)/100)*tax_amount;
		}else
		{
			sales_tax = sales_fixed_amt;
		}
		
		$("#sales_tax"+data_id).val(sales_tax.toFixed(2));
		var unit_subtotal = tax_amount + sales_tax;
		$("#unit_subtotal"+data_id).val(unit_subtotal.toFixed(2));
		
		var title_fee = isNaN(parseFloat($("#title_fee"+data_id).val()))?0.00:parseFloat($("#title_fee"+data_id).val());
		var trade_payoff = isNaN(parseFloat($("#trade_payoff"+data_id).val()))?0.00:parseFloat($("#trade_payoff"+data_id).val());
		var down_payment = isNaN(parseFloat($("#down_payment"+data_id).val()))?0.00:parseFloat($("#down_payment"+data_id).val());		
		
		var total_amount = (unit_subtotal+title_fee+trade_payoff) - down_payment;
		$("#total_amount"+data_id).val(total_amount.toFixed(2));
		calculate_monthly_amount(data_id);	
	}
	
	$('.fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					assign_fees(data,data_id);					
					calculate_amount(data_id);
					

				}
			});
		}
	});
	
	$(".sales_tax_type").on('change',function(){
		data_id = $(this).attr('data-id');
		if($(this).val() == 'percentage')
		{
			$("#fixed_tax_div"+data_id).hide();
		}else
		{
			$("#fixed_tax_div"+data_id).show();
		}
		calculate_amount(data_id);
		});
	
	$(".monthly_option").on('change',function(){
		
		data_id = $(this).attr('data-id');
		calculate_monthly_amount(data_id);
		});
		
	
	$("#tipo_amount").on('change keyup paste',function(){
			var val = $(this).val();
			$("#trade_payoff1").val(val);
			$("#trade_payoff2").val(val);
			calculate_amount(1);
			calculate_amount(2);			
		
		});
	
	$(".trade-val-change").on('change keyup paster',function(){
			var appraisal_value = isNaN(parseFloat($("#appraisal_value").val()))?0.00:parseFloat($("#appraisal_value").val());
			var trade_recon = isNaN(parseFloat($("#trade_recon").val()))?0.00:parseFloat($("#trade_recon").val());
			var total_trade_value = appraisal_value - trade_recon;
			if ($("#unit_value1").val()>0) {
			$("#total_trade_value").val(total_trade_value.toFixed(2));
			$("#trade_value1").val(total_trade_value.toFixed(2));
			calculate_amount(1);
			calculate_amount(2);
			}
			if ($("#unit_value2").val()>0) {
			$("#total_trade_value").val(total_trade_value.toFixed(2));
			$("#trade_value2").val(total_trade_value.toFixed(2));
			calculate_amount(1);
			calculate_amount(2);
			}
		});
		
		$("#unit_invest1,#unit_invest2").on('change keyup paste',function(){
				var data_id = $(this).attr('data-id');
				var val = $(this).val();
				$("#down_payment"+data_id).val(val);
				calculate_amount(data_id);
			
		});
		
		$(".amount-change").on('keyup paste change',function(){
				var data_id = $(this).attr('data-id');
				calculate_amount(data_id);			
			});
			
		$(".tax-total").on('keyup paste change',function(){
				var state_tax = isNaN(parseFloat($("#state_tax").val()))?0.00:parseFloat($("#state_tax").val());
				var county_tax = isNaN(parseFloat($("#county_tax").val()))?0.00:parseFloat($("#county_tax").val());
				var city_tax = isNaN(parseFloat($("#city_tax").val()))?0.00:parseFloat($("#city_tax").val());
				var other_tax = isNaN(parseFloat($("#other_tax").val()))?0.00:parseFloat($("#other_tax").val());
				var total_tax = state_tax + county_tax + city_tax + other_tax;
				$("#total_tax").val(total_tax.toFixed(2));
				calculate_amount(1);
				calculate_amount(2);
			});	
		
		
	$(".date_input_field").bdatepicker();

	
		
	
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
