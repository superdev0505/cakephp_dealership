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
	label{font-size: 16px; font-weight: normal; margin: 0;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 10px 0; text-align: center; font-size: 17px; text-decoration: underline;"><b>CUSTOMER INFORMATION SHEET</b></h2>
		<p style="float: left; width: 100%; margin: 7px 0;">Thank you for purchasing your Harley-Davidson from Magic City Harley-Davidson! We are pleased to help you with your journey during the purchasing process. As we are almost done, I need you to bring the following information to your closing.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<p style="float: left; width: 100%; margin: 0 3% 20px;">1.	Insurance Binder listing lien holder</p>
			<p style="float: left; width: 100%; margin: 0 3% 20px; font-size: 14px; padding-left: 15px;"><b>EAGLEMARK SAVINGS BANK <br>P.O. BOX 21750<br> CARSON CITY NV 89721</b></p>
			
			
			<p style="float: left; width: 100%; margin: 0 3% 20px;">2.	Check Payable to: Magic City Harley-Davidson <br>
				<span style="padding: 0 0 0 15px;">a. US funds</span> <br>
				<span style="padding: 0 0 0 15px;">b. North Dakota bank account</p>
			
			<p style="float: left; width: 100%; margin: 0 3% 20px;">3.	Title for trade with purchaser’s name listed as Owner</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label>We have your closing scheduled for: </label>
				<input type="text" name="schedule" value="<?php echo isset($info['schedule'])?$info['schedule']:''; ?>" style="width: 73%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label>Year/Model: </label>
				<input type="text" name="year" value="<?php echo isset($info['year_data']) ? $info['year_data'] : $info['year']." ".$info['model']; ?>" style="width: 90%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label>VIN: </label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 10px;">
			<div class="form-field" style="float: left; width: 33%; margin: 0;">
				<label>ABS:<label>
				<input type="checkbox" name="abs_checkbox" <?php echo ($info['abs_checkbox'] == "yes") ? "checked" : ""; ?> value="yes"/> YES / 
				<input type="checkbox" name="abs_checkbox" <?php echo ($info['abs_checkbox'] == "no") ? "checked" : ""; ?> value="no"/> NO
			</div>
			
			<div class="form-field" style="float: left; width: 33%; margin: 0;">
				<label>SECURITY:<label>
				<input type="checkbox" name="security_checkbox" <?php echo ($info['security_checkbox'] == "yes") ? "checked" : ""; ?> value="yes"/> YES / 
				<input type="checkbox" name="security_checkbox" <?php echo ($info['security_checkbox'] == "no") ? "checked" : ""; ?> value="no"/> NO
			</div>
			
			<div class="form-field" style="float: left; width: 34%; margin: 0;">
				<label>CC’s: </label>
				<input type="text" name="cc" value="<?php echo isset($info['cc'])?$info['cc']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0;">**Please have your insurance company fax <a href="#" style="color: #000; font-size: 14px; text-decoration: underline;"><b>INSURANCE BINDER</b></a> to us at <span style="text-decoration: underline;"><b>701-839-1504</b></span>**</p>
		
		
		<div class="logo" style="width: 50%; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-h.jpg'); ?>" alt="" style="width: 100%;">
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
