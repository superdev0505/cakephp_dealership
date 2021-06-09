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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 90%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	/*td:first-child, th:first-child{border-left: 1px solid #000;}*/
	td:last-child, th:last-child{border-right: 0px;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	.right table{border: 0px;}
	.right table td{border: 0px; padding: 2px;}
	.right input[type="text"]{border-bottom: 1px solid #000;}
	.no-border input[type="text"]{border: 0px;}	
	.bg{background-color: #000; color: #fff; text-align: left; padding: 12px 16px; font-size: 18px;}
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
		<div class="row" style="float: left; width: 100%; margin: 60px 0 7px;">
			<div class="logo" style="margin: auto; width: 20%; margin-bottom: 20px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>" alt="" style="width: 100%;">
			</div>

			<div class="form-field" style="text-align: center; width: 100%; margin-bottom: 15px;">
				<h4><b>Trade In Appraisal</b></h4>
			</div>

			<div class="form-field" style="text-align: center; width: 100%;">
				<label><b>Customer Info:</b></label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0 7px;">
			<div class="first-section" style="float: left; width: 100%;">
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Name:</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 91%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Phone:</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 84%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%; margin-bottom: 13px;">
						<label>Address:</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 94%;">
					</div>
					<div class="form-field" style="float: left; width: 100%;">
						<input type="text" name="address2" value="<?php echo isset($info['address2']) ? $info['address2'] : ''; ?>" style="width: 94%; float: right;">
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="second-section" style="float: left; width: 100%;">
				<div class="row" style="float: left; width: 100%; margin: 10px 0; text-align: center;">
					<label><b>Trade-In Info:</b></label>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 25%;">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 83%;">
					</div>
					<div class="form-field" style="float: left; width: 35%;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 84%;">
					</div>
					<div class="form-field" style="float: left; width: 40%;">
						<label>Model:</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 88%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Color/s:</label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 88%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage:</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 88.5%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Vin:</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 97%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Lienholder:</label>
						<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 85%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Payoff:</label>
						<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 90%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Address:</label>
						<input type="text" name="address_trade1" value="<?php echo isset($info['address_trade1']) ? $info['address_trade1'] : ''; ?>" style="width: 88%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Tire Tread:</label>
						<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 86%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="address_trade2" value="<?php echo isset($info['address_trade2']) ? $info['address_trade2'] : ''; ?>" style="width: 88%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Damage:</label>
						<input type="text" name="damage" value="<?php echo isset($info['damage']) ? $info['damage'] : ''; ?>" style="width: 88.3%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Extras:</label>
						<input type="text" name="extras" value="<?php echo isset($info['extras']) ? $info['extras'] : ''; ?>" style="width: 88%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="damage1" value="<?php echo isset($info['damage1']) ? $info['damage1'] : ''; ?>" style="width: 88.3%; float: right;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="extras1" value="<?php echo isset($info['extras1']) ? $info['extras1'] : ''; ?>" style="width: 88%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="damage2" value="<?php echo isset($info['damage2']) ? $info['damage2'] : ''; ?>" style="width: 88.3%; float: right;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label style="width: 8%;">Trade Value:</label>
						<input type="text" name="trade_value" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="width: 88%; float: right; margin-top: 13px;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label style="width: 18%;">NADA Value:</label>
						<input type="text" name="nada" value="<?php echo isset($info['nada']) ? $info['nada'] : ''; ?>" style="width: 77%; float: right; margin-top: 13px;">
					</div>
					<div class="form-field" style="float: left; width: 25%; margin-top: 13px;">
						<label>ACV:</label>
						<input type="text" name="acv" value="<?php echo isset($info['acv']) ? $info['acv'] : ''; ?>" style="width: 86.3%; float: right;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 5px 0 50px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Comments:</label>
						<input type="text" name="comment" value="<?php echo isset($info['comment']) ? $info['comment'] : ''; ?>" style="width: 92%; float: right;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Signature:</label>
						<input type="text" name="sign" value="<?php echo isset($info['sign']) ? $info['sign'] : ''; ?>" style="width: 89%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Date:</label>
						<input type="text" name="sign_date" value="<?php echo isset($info['sign_date']) ? $info['sign_date'] : ''; ?>" style="width: 88%; float: right;">
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


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
