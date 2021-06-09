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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	/*td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}*/
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
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label>Harley Expert:</label>
				<input type="text" name="harley_expert" value="<?php echo isset($info['harley_expert']) ? $info['harley_expert'] : ''; ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label><input type="checkbox" name="tour_check" <?php echo ($info['tour_check'] == "tour") ? "checked" : ""; ?> value="tour"/> Tour</label>
				<label><input type="checkbox" name="testride_check" <?php echo ($info['testride_check'] == "testride") ? "checked" : ""; ?> value="testride"/> TestRide</label>
				<label><input type="checkbox" name="form_check" <?php echo ($info['form_check'] == "form") ? "checked" : ""; ?> value="form"/> Form</label>
				<label><input type="checkbox" name="bike_check" <?php echo ($info['bike_check'] == "bike") ? "checked" : ""; ?> value="bike"/> Bike</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="logo" style="width: 300px; margin: 0 auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/the-dream-maker.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Name:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px;">
				<label>Phone #:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px;">
				<label>Birthday:</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 4px;">
				<label>How’d You Hear About Us?:</label>
				<input type="text" name="hear" value="<?php echo isset($info['hear']) ? $info['hear'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Preferred Method of Contact:</label>
				<label style="margin-left: 5%;">Phone <input type="checkbox" name="preferred_phone" <?php echo ($info['preferred_phone'] == "phone") ? "checked" : ""; ?> value="phone"/></label>
				<label style="margin: 0 5%;">Email <input type="checkbox" name="preferred_email" <?php echo ($info['preferred_email'] == "email") ? "checked" : ""; ?> value="email"/></label>
				<label>Text <input type="checkbox" name="preferred_text" <?php echo ($info['preferred_text'] == "text") ? "checked" : ""; ?> value="text"/></label>
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 4px;">
				<label>Best Time:</label>
				<input type="text" name="best_time" value="<?php echo isset($info['best_time']) ? $info['best_time'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 12px 0; text-align: center; font-size: 20px;"><b>YOUR MOTORCYCLE</b></h2>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>N/U:</label>
				<input type="text" name="condition" value="<?php echo isset($info['condition']) ? $info['condition'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Stock #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Mileage:</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px;">
				<label>Color:</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 4px;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 12px 0; text-align: center; font-size: 20px;"><b>TRADE-IN</b></h2>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px;">
				<label>Color:</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Miles:</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Lender:</label>
				<input type="text" name="lender" value="<?php echo isset($info['lender']) ? $info['lender'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Amount Owed:</label>
				<input type="text" name="amount" value="<?php echo isset($info['amount']) ? $info['amount'] : ''; ?>" style="width: 50%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px;">
				<label>Payment:</label>
				<input type="text" name="payment" value="<?php echo isset($info['payment']) ? $info['payment'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Last Service:</label>
				<input type="text" name="last_service" value="<?php echo isset($info['last_service']) ? $info['last_service'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>ESP:</label>
				<input type="text" name="esp" value="<?php echo isset($info['esp']) ? $info['esp'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px;">
				<label>V.I.P:</label>
				<input type="text" name="vip" value="<?php echo isset($info['vip']) ? $info['vip'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px;">
				<label>Vin # (Registration or Insurance):</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 12px 0; text-align: center; font-size: 20px;"><b>PERFECT OWNERSHIP</b></h2>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 4px;">
				<label>Method of Payment:</label>
				<label style="margin-left: 5%;">Finance <input type="checkbox" name="finance_check" <?php echo ($info['finance_check'] == "finance") ? "checked" : ""; ?> value="finance"/></label>
				<label style="margin: 0 5%;">Cash <input type="checkbox" name="cash_check" <?php echo ($info['cash_check'] == "cash") ? "checked" : ""; ?> value="cash"/></label>
				<label>Check <input type="checkbox" name="check_box" <?php echo ($info['check_box'] == "check") ? "checked" : ""; ?> value="check"/></label>
			</div>
		</div>
		
		<div class="row" style="float: left; margin: 0; width: 100%; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Desired Down:</label>
				<label style="margin-left: 5%;">2500  <input type="radio" name="desired_check" <?php echo ($info['desired_check'] == "2500") ? "checked" : ""; ?> value="2500"/></label>
				<label style="margin: 0 5%;">3000  <input type="radio" name="desired_check" <?php echo ($info['desired_check'] == "3000") ? "checked" : ""; ?> value="3000"/></label>
				<label>4000  </label>
				<label>5000 </label>
				<label>+ Trade <input type="radio" name="desired_check" <?php echo ($info['desired_check'] == "5000") ? "checked" : ""; ?> value="5000"/></label>
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Monthly:</label>
				<label style="margin-left: 5%;">300-399 <input type="radio" name="monthly_check" <?php echo ($info['monthly_check'] == "300-399") ? "checked" : ""; ?> value="300-399"/></label>
				<label style="margin: 0 5%;">400-499 <input type="radio" name="monthly_check" <?php echo ($info['monthly_check'] == "400-499") ? "checked" : ""; ?> value="400-499"/></label>
				<label style="margin: 0 5% 0;">500-599 <input type="radio" name="desired_check" <?php echo ($info['desired_check'] == "2500") ? "checked" : ""; ?> value="2500"/></label>
				<label>600-699 <input type="radio" name="desired_check" <?php echo ($info['desired_check'] == "2500") ? "checked" : ""; ?> value="2500"/></label>
			</div>
		</div>
		
		<p style="margin: 30px 0 0px; font-size: 14px; float: left; width: 100%; text-align: center;">Give Yourself Permission To <br>  Live Life to the Fullest <br> Thank You for choosing Phantom Harley- Davidson <br>  We earn your trust mile by mile.</p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label style="font-size: 30px;">&#9786;</label>	
				<input type="text" name="delivery" value="<?php echo isset($info['delivery']) ? $info['delivery'] : ''; ?>" style="width: 90%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 50%; margin-top: 15px;">
				<label>Delivery Date</label>	
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
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
