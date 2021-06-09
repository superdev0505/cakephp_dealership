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
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="float: left; width: 100%; margin: 0 0 20px;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mix-logo.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		
		<h2 style="float: left; width: 100%; margin: 3px 0 20px; text-align: center; font-size: 20px;"><b>RECEIVE $100 ON NEW NORTHWOOD MFG PRODUCT</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 48%; margin: 0;">
				<label>Dealership:</label>
				<input type="text" name="company" value="<?php echo $info['company']; ?>" style="width: 75%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 48%; margin: 0;">
				<label>Sales Person:</label>
				<span style="width: 75%; float: right; display: block;">
					<input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width: 100%; float: right; margin-bottom: 5px;">
					<label style="display: block; text-align: center;">(Print Name - Be Legible)</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 48%; margin: 0;">
				<label>Sales Manager:</label>
				<span style="width: 75%; float: right; display: block;">
					<input type="text" name="salesmanager" value="<?php echo isset($info['salesmanager'])?$info['salesmanager']:''; ?>" style="width: 100%; float: right; margin-bottom: 5px;">
					<label style="display: block; text-align: center;">(Print Name)</label>
				</span>
			</div>
			<div class="form-field" style="float: right; width: 48%; margin: 0;">
				<label>Sales Person:</label>
				<span style="width: 75%; float: right; display: block;">
					<input type="text" name="sales_sign" value="<?php echo $info['sales_sign']; ?>" style="width: 100%; float: right; margin-bottom: 5px;">
					<label style="display: block; text-align: center;">(Signature)</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 48%; margin: 0;">
				<label>Sales Manager:</label>
				<span style="width: 75%; float: right; display: block;">
					<input type="text" name="salesmanager_sign" value="<?php echo $info['salesmanager_sign']; ?>" style="width: 100%; float: right; margin-bottom: 5px;">
					<label style="display: block; text-align: center;">(Signature)</label>
				</span>
			</div>
			
			<div class="form-field" style="float: right; width: 48%; margin: 0;">
				<label>Sales Person <br> Social Security #:</label>
				<span style="width: 75%; float: right; display: block;">
					<input type="text" name="social_security" value="<?php echo $info['social_security']; ?>" style="width: 100%; float: right; margin-bottom: 5px;">
					<label style="display: block; text-align: center;">Need One Time Only <br> For W-9 / IRS Reporting <sup>*</sup></label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 48%; box-sizing: border-box; border: 1px solid #000; padding: 20px;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 18px;"><b>How to Redeem This Certificate</b></h2>
				<p style="float: left; width: 100%; margin: 7px 0;"><b> 1) Complete the entire form.</b> <span style="display: block;padding-left: 10%; margin-top: 10px;"> (Incomplete forms will not be processed)</span></p>
				
				<p style="float: left; width: 100%; margin: 7px 0;"><b> 2) Fax completed form and</b></p>
				<p style="float: left; width: 100%; margin: 7px 0;"><b> 3) Northwood Delivery Check-out Sheet</b></p>
				<p style="float: left; width: 100%; margin: 7px 0;"><b> 4) Purchase Agreement/Bill of Sale</b></p>
				<p style="float: left; width: 100%; margin: 7px 0; font-size: 30px; text-align: center;"><b>541 - 963 - 4392</b> </p>
				<p style="float: left; width: 100%; margin: 7px 0; font-size: 16px; text-align: center;"><sup>**</sup>Must be received within 30 days of <br> product delivery or certificate is not valid </p>
			</div>
			
			<div class="right" style="float: right; width: 48%;">
				<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="display: block; width: 30%; text-align: right; float: left;">Brand</label>
					<input type="text" name="brand" value="<?php echo $info['brand']; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="display: block; width: 30%; text-align: right; float: left;">Model</label>
					<input type="text" name="model" value="<?php echo $info['model']; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="display: block; width: 30%; text-align: right; float: left;">Last 5 of Serial #:</label>
					<input type="text" name="vin" value="<?php echo $info['vin']; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="display: block; width: 100%; text-align: center;">Please send check and W-9 form to this address: <br> (Need One Time Only)</label>
					<input type="text" name="address" value="<?php echo $info['address']; ?>" style="width: 100%; float: right; margin: 7px 0;">
					<input type="text" name="address1" value="<?php echo $info['address1']; ?>" style="width: 100%; float: right; margin: 7px 0;">
				</div>
				
				<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="display: block; width: 100%; text-align: center;"> <input type="checkbox" name="important_check" value="no" <?php echo ($info['important_check'] == "important") ? "checked" : ""; ?> style="width:40px; height: 40px;"> <span style="position: relative; bottom: 18px;">Important !</span></label>
					<p style="float: left; width: 100%; text-align: center; font-size: 15px;">Check this box if this is a change of address.</p>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border: 1px solid #000; box-sizing: border-box; padding: 10px;">
			<h2 style="float: left; width: 100%; margin: 7px 0 16px; text-align: center; font-size: 20px;"><b>FOR OFFICE USE ONLY</b></h2>
			<div class="form-field" style="float: left; width: 33%">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 34%">
				<label>Approved:</label>
				<input type="text" name="approved" value="<?php echo $info['approved']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%">
				<label>Verification:</label>
				<input type="text" name="verification" value="<?php echo $info['verification']; ?>" style="width: 70%;">
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
