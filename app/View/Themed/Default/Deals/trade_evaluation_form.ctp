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
	<div id="worksheet_container" style="width: 855px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 16px; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
@media print {
.left-text{background:#000;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
input[type="text"]{margin-bottom: 35px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;">BLUFF POWERSPORTS <br> TRADE-IN EVALUATION FORM</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>DATE & TIME</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 39%;">
				<input type="text" name="time" value="<?php echo date('H:i:s'); ?>" style="width: 39%;">
				<label>AM/PM</label>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>SALESPERSON</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 85%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>CUSTOMER</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 88%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>YEAR</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 93%;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>MAKE</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 93%;">
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>MODEL</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>COLOR</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>MILEAGE</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>VIN</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 93%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>HOURS</label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>WARRANTY</label>
				<span><input type="checkbox" name="warranty_status" <?php echo ($info['warranty_status'] == "yes") ? "checked" : ""; ?> value="yes"> YES</span>
				<span><input type="checkbox" name="warranty_status" <?php echo ($info['warranty_status'] == "no") ? "checked" : ""; ?> value="no"> NO</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>ISSUES/CONCERNS</label>
				<input type="text" name="issue1" value="<?php echo isset($info['issue1']) ? $info['issue1'] : ''; ?>" style="width: 79%; margin: 10px 0;">
				<input type="text" name="issue2" value="<?php echo isset($info['issue2']) ? $info['issue2'] : ''; ?>" style="width: 98%; margin: 10px 0;">
				<input type="text" name="issue3" value="<?php echo isset($info['issue3']) ? $info['issue3'] : ''; ?>" style="width: 98%; margin: 10px 0;">
				<input type="text" name="issue4" value="<?php echo isset($info['issue4']) ? $info['issue4'] : ''; ?>" style="width: 98%; margin: 10px 0;">
				<input type="text" name="issue5" value="<?php echo isset($info['issue5']) ? $info['issue5'] : ''; ?>" style="width: 98%; margin: 10px 0;">
				<input type="text" name="issue6" value="<?php echo isset($info['issue6']) ? $info['issue6'] : ''; ?>" style="width: 98%; margin: 10px 0;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>ESTIMATE FOR REPAIRS $</label>
				<input type="text" name="estimate" value="<?php echo isset($info['estimate']) ? $info['estimate'] : ''; ?>" style="width: 58%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>TECH/DATE</label>
				<input type="text" name="tech_date" value="<?php echo isset($info['tech_date']) ? $info['tech_date'] : ''; ?>" style="width: 67%;">
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
