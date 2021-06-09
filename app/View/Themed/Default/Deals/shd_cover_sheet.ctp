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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			p{margin: 11px 0; line-height: 20px;}
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
		.text ul li{margin: 0 0 0 17px; list-style: none;}
	@media print { 
	.dontprint{display: none;}
		/*body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; margin: 0; padding: 0;}
	label{font-size: 13px;}*/
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
			<h2 style="text-align: center; font-weight: bold; margin: 16px 0; font-size: 24px;">HARLEY-DAVIDSON OF SCOTTSDALE</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Date:</label>
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt;  ?>" style="width:70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Fit Specialist:</label>
				<input type="text" name="fit_specialist" value="<?php echo isset($info['fit_specialist'])?$info['fit_specialist']:$info['sperson'];  ?>" style="width:70%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Fit Specialist:</label>
				<input type="text" name="fit_specialist2" value="<?php echo isset($info['fit_specialist2'])?$info['fit_specialist2']:'';  ?>" style="width:73%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer Name:</label>
				<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name'];  ?>" style="width:87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Joint Application:</label>
				<input type="text" name="joint_application" value="<?php echo isset($info['joint_application'])?$info['joint_application']:'';  ?>"  style="width:86%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:'';  ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:'';  ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:'';  ?>" style="width:78%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:'';  ?>" style="width:83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>County:</label>
				<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:'';  ?>" style="width: 86%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:'';  ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:'';  ?>" style="width:94%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-decoration: underline; font-size: 20px; font-weight: bold; margin: 20px 0 18px 0;">Bike Purchasing</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Stock#:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:'';  ?>" style="width:74%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:'';  ?>" style="width:78%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:'';  ?>" style="width:77%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:'';  ?>" style="width:74%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>VIN#:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:'';  ?>" style="width:89%;">
			</div>
			<div class="form-field" style="float: left; width: 39%;">
				<label>(Compare Bike) Stock#:</label>
				<input type="text" name="stock_num2" value="<?php echo isset($info['stock_num2'])?$info['stock_num2']:'';  ?>" style="width: 54%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-decoration: underline; font-size: 20px; font-weight: bold; margin: 20px 0 18px 0;">Trade in Vehicle</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:'';  ?>" style="width:86%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:'';  ?>" style="width:82%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:'';  ?>" style="width:80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-weight: bold;">2 Copies of DL:</label>
				<input type="text" name="dl_copy" value="<?php echo isset($info['dl_copy'])?$info['dl_copy']:'';  ?>" style="width:61%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-weight: bold;">Signed App w/References:</label>
				<input type="text" name="signed_app" value="<?php echo isset($info['signed_copy'])?$info['signed_copy']:'';  ?>" style="width:38%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label style="font-weight: bold;">Trade Appraisal:</label>
				<input type="text" name="trade_appraisal" value="<?php echo isset($info['trade_appraisal'])?$info['trade_appraisal']:'';  ?>" style="width:57%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-weight: bold;">Signed Payoff:</label>
				<input type="text" name="signed_payoff" value="<?php echo isset($info['signed_payoff'])?$info['signed_payoff']:'';  ?>" style="width:63%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-weight: bold;">Buyers Agreement Signed:</label>
				<input type="text" name="buyers_agrrement" value="<?php echo isset($info['buyers_agrrement'])?$info['buyers_agrrement']:'';  ?>" style="width:36%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label style="font-weight: bold;">Proof of Ins:</label>
				<input type="text" name="proof_ins" value="<?php echo isset($info['proof_ins'])?$info['proof_ins']:'';  ?>" style="width:66%;">
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; text-decoration: underline; font-size: 20px; font-weight: bold; margin: 20px 0 18px 0;">Buisness Office</h3>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Bill of Sale:</label>
				<input type="text" name="bill_of_sale" value="<?php echo isset($info['bill_of_sale'])?$info['bill_of_sale']:'';  ?>" style="width:10%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Title App:</label>
				<input type="text" name="title_app" value="<?php echo isset($info['title_app'])?$info['title_app']:'';  ?>" style="width:10%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="width: 20%; float: left;">
					<label>Odometer S:</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:'';  ?>" style="width:52%;">
				</div>
				<div class="form-field" style="width: 15%; float: left;">
					<label>T:</label>
					<input type="text" name="odo_s" value="<?php echo isset($info['odo_s'])?$info['odo_s']:'';  ?>" style="width:70%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="width: 20%; float: left;">
					<label>P.O.A S:</label>
					<input type="text" name="poas" value="<?php echo isset($info['poas'])?$info['poas']:'';  ?>"  style="width:63%;">
				</div>
				<div class="form-field" style="width: 15%; float: left;">
					<label>T:</label>
					<input type="text" name="poat" value="<?php echo isset($info['poat'])?$info['poat']:'';  ?>" style="width:70%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>As Is Used:</label>
					<input type="text" name="asused" value="<?php echo isset($info['asused'])?$info['asused']:'';  ?>" style="width:52%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;"> 
					<label>PNSA Contract:</label>
					<input type="text" name="pnsa_contract" value="<?php echo isset($info['pnsa_contract'])?$info['pnsa_contract']:'';  ?>" style="width:40%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 20%;">
					<label>We Owe:</label>
					<input type="text" name="we_owe" value="<?php echo isset($info['we_owe'])?$info['we_owe']:'';  ?>" style="width:40%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 25%;">
					<label>Collect Down Payment:</label>
					<input type="text" name="collect_down" value="<?php echo isset($info['collect_down'])?$info['collect_down']:'';  ?>" style="width:28%;">
				</div>
				<div class="form-field" style="float: right; width:25%">
					<label>Lien Holder:</label>
					<input type="text" name="lien_holder2" value="<?php echo isset($info['lien_holder2'])?$info['lien_holder2']:'';  ?>" style="width:60%;">
				</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>Everything is signed and numbers match:</label>
					<input type="text" name="sign_match" value="<?php echo isset($info['sign_match'])?$info['sign_match']:'';  ?>" style="width:20%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<div class="form-fied-inner" style="width: 25%; float: left;">
						<label>ESP:</label>
						<input type="text" name="esp" value="<?php echo isset($info['esp'])?$info['esp']:'';  ?>"  style="width:66%;">
					</div>
					<div class="form-fied-inner" style="width: 25%; float: left;">
						<label>T/W:</label>
						<input type="text" name="t_w" value="<?php echo isset($info['t_w'])?$info['t_w']:'';  ?>" style="width:67%;">
					</div>
					<div class="form-fied-inner" style="width: 25%; float: left;">
						<label>Gap:</label>
						<input type="text" name="gap" value="<?php echo isset($info['gap'])?$info['gap']:'';  ?>" style="width:66%;">
					</div>
					<div class="form-fied-inner" style="width: 25%; float: left;">
						<label>PPM:</label>
						<input type="text" name="ppm" value="<?php echo isset($info['ppm'])?$info['ppm']:'';  ?>" style="width:60%;">
					</div>
				</div>
		</div>
		</div>
		<!-- container end -->
		
			
	
	</div>
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
