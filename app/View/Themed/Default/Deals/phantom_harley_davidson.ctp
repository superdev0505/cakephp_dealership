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
		<h2 style="float: left; width: 100%; margin: 0; font-size: 30px; text-align: center; margin-bottom: 15px;"><b>Trade Appraisal</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 85.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Engine</label>
				<input type="text" name="engine1" value="<?php echo isset($info['engine1'])?$info['engine1']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Mileage</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Color</label>
				<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 88.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Options</label>
				<input type="text" name="option" value="<?php echo isset($info['option'])?$info['option']:''; ?>" style="width: 94.7%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Paint</label>
				<input type="text" name="paint" value="<?php echo isset($info['paint'])?$info['paint']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Chrome</label>
				<input type="text" name="chrome" value="<?php echo isset($info['chrome'])?$info['chrome']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Tires Front</label>
				<input type="text" name="front" value="<?php echo isset($info['front'])?$info['front']:''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Tires Rear</label>
				<input type="text" name="rear" value="<?php echo isset($info['rear'])?$info['rear']:''; ?>" style="width: 73.5%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Engine</label>
				<input type="text" name="engine2" value="<?php echo isset($info['engine2'])?$info['engine2']:''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Trans</label>
				<input type="text" name="trans" value="<?php echo isset($info['trans'])?$info['trans']:''; ?>" style="width: 76%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo1" style="width: 40%; float: left;">
    			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/motor1.jpg'); ?>" alt="" style="width: 100%;">
     		</div>

			<div class="logo2" style="width: 40%; float: right;">
    			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/motor2.jpg'); ?>" alt="" style="width: 100%;">
     		</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 15%;">
				<label>Acv</label>
				<input type="text" name="acv" value="<?php echo isset($info['acv'])?$info['acv']:''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>R</label>
				<input type="text" name="r" value="<?php echo isset($info['r'])?$info['r']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>C</label>
				<input type="text" name="c" value="<?php echo isset($info['c'])?$info['c']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>R</label>
				<input type="text" name="r" value="<?php echo isset($info['r'])?$info['r']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Appraisal Notes</label>
				<input type="text" name="note1" value="<?php echo isset($info['note1'])?$info['note1']:''; ?>" style="width: 87%; float: right;">
				<input type="text" name="note2" value="<?php echo isset($info['note2'])?$info['note2']:''; ?>" style="width: 100%; float: left; margin: 7px 0;">
				<input type="text" name="note3" value="<?php echo isset($info['note3'])?$info['note3']:''; ?>" style="width: 100%; float: left; margin: 7px 0;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Payoff</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 82%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0 font-size: 15px;">Bike will be traded in the condition it was appraised. Nothing will be removed or added and miles are correct.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Signature</label>
				<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:''; ?>" style="width: 87%;">
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
