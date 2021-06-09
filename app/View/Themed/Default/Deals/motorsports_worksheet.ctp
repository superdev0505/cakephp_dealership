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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; margin: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	td{padding: 10px;}
	.right td{padding: 25px 10px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
	$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

	if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
	{
		$selected_months=array('1'=>'36',2=>48,3=>60,4=>72);
	}
	?>
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 3px; border: 1px solid #000; border-bottom: 0; margin: 0;">
			<div class="logo" style="float: left; width: 25%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-mosites.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="rightside" style="float: left; width: 40%; margin-left: 20%;">
				<h2 style="float: left; width: 100%; font-size: 25px; margin: 4px 0 9px;"><b>DEAL WORKSHEET</b></h2>
				<div class="form-field" style="width: 100%; float: left; margin: 5px 0;">
					<label style="font-size: 16px;"><b>DATE:</b></label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; border-bottom: 1px solid #000;">
				</div>
				<div class="form-field" style="width: 100%; margin: 0;">
					<label style="font-size: 16px;"><b>SALES REP:</b></label>
					<input type="text" name="sales_rep" value="<?php echo isset($info['sales_rep'])?$info['sales_rep']: ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
				</div>
			</div>
		</div>
		
		<h2 Style="float: left; width: 100%; background-color: #000; color: #fff; box-sizing: border-box; padding: 3px; font-size: 16px; margin: 0; text-align: center; border: 1px solid #000;"><b>BUYER INFORMATION</b></h2>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 33%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>First Name:</label>
				<input type="text" name="fname" value="<?php echo $contact['Contact']['first_name']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Middle:</label>
				<input type="text" name="mname" value="<?php echo $contact['Contact']['m_name']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
				<label>Last Name:</label>
				<input type="text" name="lname" value="<?php echo $contact['Contact']['last_name']; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Current Address:</label>
				<input type="text" name="address" value="<?php echo $contact['Contact']['address']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo $contact['Contact']['city']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo $contact['Contact']['state']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 2px;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo $contact['Contact']['zip']; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 33%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>County:</label>
				<input type="text" name="country" value="<?php echo $contact['Contact']['country']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>H Phone:</label>
				<input type="text" name="phone" value="<?php echo $contact['Contact']['phone']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 2px;">
				<label>W Phone:</label>
				<input type="text" name="mobile" value="<?php echo $contact['Contact']['mobile']; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0 0 10px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 2px;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo $contact['Contact']['email']; ?>" style="width: 60%;">
			</div>
		</div>
		
		<h2 Style="float: left; width: 100%; background-color: #000; color: #fff; box-sizing: border-box; padding: 3px; font-size: 16px; margin: 0; text-align: center; border: 1px solid #000;"><b>UNIT INFORMATION</b></h2>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Color:</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0 0 10px;">
			<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Vin:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Stock #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Miles:</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<h2 Style="float: left; width: 100%; background-color: #000; color: #fff; box-sizing: border-box; padding: 3px; font-size: 16px; margin: 0; text-align: center; border: 1px solid #000;"><b>TRADE INFORMATION</b></h2>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Color:</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0; margin: 0;">
			<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Vin:</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
				<label>Miles:</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : "" ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 2px;">
				<label>Payoff:</label>
				<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade']) ? $info['payoff_trade'] : "" ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; margin: 10px 0 0; border: 2px solid #000;">
			<div class="left" style="float: left; width: 70%; margin: 0;  box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-right: 0px; border-bottom: 0px;">
					<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
						<label><b>MSRP:</b></label>
						<input type="text" name="msrp" value="<?php echo isset($info['msrp']) ? $info['msrp'] : "" ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px;">
						<label><b>Cash Down:</b></label>
						<input type="text" name="cash_down" value="<?php echo isset($info['cash_down']) ? $info['cash_down'] : "" ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-right: 0px;">
					<div class="form-field" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box; padding: 2px;">
						<label><b>Freight:</b></label>
						<input type="text" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : "" ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 2px;">
						<label><b>Payment:</b></label>
						<input type="text" name="payment" value="<?php echo isset($info['payment']) ? $info['payment'] : "" ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 0px;">
					<div class="form-field" style="float: left; width: 50%; border: 1px solid #000; border-top: 0px; box-sizing: border-box; padding: 2px;">
						<label><b>Setup:</b></label>
						<input type="text" name="setup" value="<?php echo isset($info['setup']) ? $info['setup'] : "" ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; ">
					<div class="form-field" style="float: left; width: 50%; border: 1px solid #000; border-top: 0px; box-sizing: border-box; padding: 2px;">
						<label><b>Total:</b></label>
						<input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : "" ?>" style="width: 70%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 30%; margin: 0; box-sizing: border-box; border-top: 1px solid #000; border-left: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-top: 0px;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Price</b></label>
					$ <input type="text" name="price" class="price" id="price" value="<?php echo isset($info['price']) ? $info['price'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-left: 0px; border-top: 0px;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Freight</b></label>
					$ <input type="text" name="freight" class="price" id="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Setup</b></label>
					$ <input type="text" name="setup" class="price" id="setup" value="<?php echo isset($info['setup']) ? $info['setup'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Parts</b></label>
					$ <input type="text" name="parts" class="price" id="parts" value="<?php echo isset($info['parts']) ? $info['parts'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Labor</b></label>
					$ <input type="text" name="labor" class="price" id="labor" value="<?php echo isset($info['labor']) ? $info['labor'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Trade</b></label>
					$ <input type="text" name="trade" class="price" id="trade" value="<?php echo isset($info['trade']) ? $info['trade'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Sales Tax</b></label>
					$ <input type="text" name="sales_tax" class="price" id="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Payoff</b></label>
					$ <input type="text" name="payoff_value" class="price" id="payoff_value" value="<?php echo isset($info['payoff_value']) ? $info['payoff_value'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Title Fees</b></label>
					$ <input type="text" name="title_fee" class="price" id="title_fee" value="<?php echo isset($info['title_fee']) ? $info['title_fee'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Total</b></label>
					$ <input type="text" name="total" class="price" id="total" value="<?php echo isset($info['total']) ? $info['total'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Cash Down</b></label>
					$ <input type="text" name="cash_down" class="price" id="cash_down" value="<?php echo isset($info['cash_down']) ? $info['cash_down'] : "" ?>" style="float: right; width: 50%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid; border-bottom: 1px solid #000;">
					<label style="display: inline-block; width: 36%; border-right: 1px solid #000; padding: 3.5px 5px; box-sizing: border-box;"><b>Amt. Due</b></label>
					$ <input type="text" name="bal" class="price" id="bal" value="<?php echo isset($info['bal']) ? $info['bal'] : "" ?>" style="float: right; width: 50%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; margin-bottom: 10px;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box;">
				<h2 Style="float: left; width: 100%; background-color: #000; color: #fff; box-sizing: border-box; padding: 3px; font-size: 16px; margin: 0; text-align: center; border: 1px solid #000; border-right: 0px;"><b>FINANCING OPTIONS</b></h2>
				
				<table cellpadding="0" cellspacing="0" style="float: right; width: 80%;">
					<tr>
						<th style="width: 25%; text-align: center;"><b>APR</b></th>
						<th style="width: 25%; text-align: center;"><b>Term</b></th>
						<th style="width: 50%; text-align: center;"><b>Payment</b></th>
					</tr>
					
					<tr>
						<td><input type="text" name="apr" class="price" id="apr" value="5.00" style="width: 80%; text-align: center;">%</td>
						<td style="width: 40%;"><select name="payment_option1" class="form-control price_options" style="width:60%; float: left;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
						<?php } ?></select><label style="margin-top: 8px;margin-left: 5px;">months</label></td>
						<td>$ <input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width: 90%;"></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td style="width: 40%;"><select name="payment_option2" class="form-control price_options" style="width:60%; float: left;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
						<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
						<?php } ?></select><label style="margin-top: 8px;margin-left: 5px;">months</label></td>
						<td>$ <input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 90%;"></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td style="width: 40%;"><select name="payment_option3" class="form-control price_options" style="width:60%; float: left;" price-id="option3_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><label style="margin-top: 8px;margin-left: 5px;">months</label></td>
						<td>$ <input name="option3_price" id="option3_price" type="text" class="input20 options_price" value="" style="width: 90%;"></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td style="width: 40%;"><select name="payment_option4" class="form-control price_options" style="width:60%; float: left;" price-id="option4_price"><?php foreach($months as $key=>$value){ ?>

			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><label style="margin-top: 8px;margin-left: 5px;">months</label></td>
						<td>$ <input name="option4_price" id="option4_price" type="text" class="input20 options_price" value="" style="width: 90%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="left" style="float: left; width: 50%; box-sizing: border-box;">
				<h2 Style="float: left; width: 100%; background-color: #000; color: #fff; box-sizing: border-box; padding: 3px; font-size: 16px; margin: 0; text-align: center; border: 1px solid #000;"><b>DEPOSIT INFORMATION</b></h2>
				
				<table cellpadding="0" cellspacing="0" style="float: right; width: 100%;">
					<tr>
						<td colspan="2">
							<label><b>CC#:</b></label>
							<input type="text" name="cc" value="<?php echo isset($info['cc']) ? $info['cc'] : "" ?>" style="width: 80%;">
						</td>
					</tr>
					
					<tr>
						<td>
							<label><b>Exp Date:</b></label>
							<input type="text" name="exp_date" value="<?php echo isset($info['exp_date']) ? $info['exp_date'] : "" ?>" style="width: 65%;">
						</td>
						<td>
							<label><b>Sec Code</b></label>
							<input type="text" name="sec_code" value="<?php echo isset($info['sec_code']) ? $info['sec_code'] : "" ?>" style="width: 65%;">
						</td>
					</tr>
					
					<tr>
						<td>
							<label><b>Chip Card:</b></label>
							<input type="text" name="chip_card" value="<?php echo isset($info['chip_card']) ? $info['chip_card'] : "" ?>" style="width: 65%;">
						</td>
						<td>
							<label><b>Amount:</b></label>
							<input type="text" name="amount" value="<?php echo isset($info['amount']) ? $info['amount'] : "" ?>" style="width: 65%;">
						</td>
					</tr>
					
					
					<tr>
						<td colspan="2" style="text-align: center; height: 130px;">
							<label>X</label>
							<input type="text" name="amount_x" value="<?php echo isset($info['amount_x']) ? $info['amount_x'] : "" ?>" style="width: 80%; border-bottom: 1px solid #000;">
						</td>
					</tr>
				</table>
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
		calculate_totalprice();
	});

	function calculate_totalprice() {
		
		var price = isNaN(parseFloat( $('#price').val()))?0.00:parseFloat($('#price').val());
		var freight = isNaN(parseFloat( $('#freight').val()))?0.00:parseFloat($('#freight').val());
		var setup = isNaN(parseFloat( $('#setup').val()))?0.00:parseFloat($('#setup').val());
		var parts = isNaN(parseFloat( $('#parts').val()))?0.00:parseFloat($('#parts').val());
		var trade = isNaN(parseFloat( $('#trade').val()))?0.00:parseFloat($('#trade').val());
		var sales_tax = isNaN(parseFloat( $('#sales_tax').val()))?0.00:parseFloat($('#sales_tax').val());
		var payoff_value = isNaN(parseFloat( $('#payoff_value').val()))?0.00:parseFloat($('#payoff_value').val());
		var title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());

		var total = price + freight + setup + parts + trade + sales_tax + payoff_value + title_fee;
		$("#total").val(total.toFixed(2));

		var cash_down = isNaN(parseFloat( $('#cash_down').val()))?0.00:parseFloat($('#cash_down').val());
		var bal = total - cash_down;
		$("#bal").val(bal.toFixed(2));		
		
	}

	if($('#apr').val() != "" && $('#apr').val() != null){
		calculateMonthWisePayments();
		}else {
			$('input[id^="paymentFor"]').val("");
		}
		var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
		$('#apr, .price').on('change keyup paste',function(){
			
			if(rx.test($('#apr').val())){
				calculateMonthWisePayments();
				}else{
						$('.options_price').val("");
				}
		 });

		$(".price_options").on('change',function(){
			span_id=$(this).attr('price-id')+'_span';
			$("#"+span_id).text($(this).val());	 
			calculateMonthWisePayments();	 
		});

		function calculateMonthWisePayments(){
			$(".price_options").each(function(){
				years=$(this).val()/12;
				pay_monthly=MonthwisePayments(years);
				price_field=$(this).attr('price-id');										  
				var payment = document.getElementById(price_field);
				payment.value = pay_monthly;
				  
			});
	 	}
	
		function MonthwisePayments(years)
		{
			var apr = parseFloat($('#apr').val());
			var principal = parseFloat($('#bal').val());
			var interest = parseFloat(apr) / 100 / 12;
			var payments = years * 12;
			var tax = parseFloat($('#tax').val());
			//var payment = document.getElementById(("paymentFor"+i).toString());
			var x = Math.pow(1 + interest, payments, tax);   // Math.pow() computes powers
				var monthly = (principal * x * interest) / (x - 1);
				// If the result is a finite number, the user's input was good and
				// we have meaningful results to display
				if (isFinite(monthly)) {
				// Fill in the output fields, rounding to 2 decimal places
				//payment.value = monthly.toFixed(2);
				return monthly.toFixed(2);
			}else{
				//payment.value = "";
				return "";
			}
		}


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
