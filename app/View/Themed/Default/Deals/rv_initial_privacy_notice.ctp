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

<div class="wraper main" id="worksheet_wraper"  style=" overflow: hidden;"> 
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
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
	.rect input[type="text"]{border-bottom: 0px !important;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
p {margin: 21px 0 !important; font-size: 25px !important;}
input {padding: 9px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		
		<div class="row" style="float: left; width: 100%; margin: 0px 60px;">
			<div class="logo" style="width: 200px;">
				<h1 style="font-size: 26px;font-weight: 700;font-family: fantasy;">RVs NORTHWEST</h1>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 30px 0 0; font-size: 20px; text-align: center;margin-bottom: 40px;">INITIAL PRIVACY NOTICE</h2>
		</div>
		
		<div class="row" style="float: left; width: 90%; margin: 7px 60px;">
			<p style="float: left; width: 100%; margin: 10px 0;">RVs Northwest may obtain nonpublic information about you in connection with your request to obtain financing, transacting normal business, and/or complying with Federal 	Privacy Laws.</p>

			<p style="float: left; width: 100%; margin: 10px 0;">We collect personal nonpublic information about you from the following sources:</p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">-Information provided to us by you that may be shared include, but not necessarily limited to: sales proposals, credit applications, consumer credit reports, online electronic applications, copies of driver&#39;s licenses, registration, insurance, service records, manufacturer warranty registration, aftermarket warranty, guaranteed auto protection insurance, and/or any mechanical breakdown coverage, or similar, etc.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">-Information gathered specific to your transaction from past transactions with us or other entities.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">It is our chosen policy to disclose information collected by you ONLY for the sole purpose of completing the transaction requested by you.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">We do not disclose information about you, except as permitted by law.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">Further, we restrict access to your nonpublic personal information ONLY to those employees who require the information to complete the services requested via the purchasing transaction. Employees cannot use your information for any other purpose. For your safety, we limit access to your private information with physical, electronic, and procedural safeguards that comply with federal regulations.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">CUSTOMER ACKNOWLEDGEMENT: The undersigned customer(s) acknowledge that they have received notice of our policies and intent to safeguard information except as outlined above.</p>

		<div class="row" style="float: left; width: 100%; margin: 0 0 45px;">
			<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
				<input type="text" name="printed_name1" value="<?php echo isset($info['printed_name1']) ? $info['printed_name1'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Printed Name</label>
			</div>
				
			<div class="form-field" style="float: left; width: 35%; margin: 3px 2%;">
				<input type="text" name="printed_sign1" value="<?php echo isset($info['printed_sign1']) ? $info['printed_sign1'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Signature</label>
			</div>
				
			<div class="form-field" style="float: left; width: 26%; margin: 3px 0;">
				<input type="text" name="printed_date1" value="<?php echo isset($info['printed_date1']) ? $info['printed_date1'] : ''; ?>" style="float: right; width: 86%; margin: 7px 0;">
				<label style="margin: 10px 0;">Date</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
				<input type="text" name="printed_name2" value="<?php echo isset($info['printed_name2']) ? $info['printed_name2'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Printed Name</label>
			</div>
				
			<div class="form-field" style="float: left; width: 35%; margin: 3px 2%;">
				<input type="text" name="printed_sign2" value="<?php echo isset($info['printed_sign2']) ? $info['printed_sign2'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Signature</label>
			</div>
				
			<div class="form-field" style="float: left; width: 26%; margin: 3px 0;">
				<input type="text" name="printed_date2" value="<?php echo isset($info['printed_date2']) ? $info['printed_date2'] : ''; ?>" style="float: right; width: 86%; margin: 7px 0;">
				<label style="margin: 10px 0;">Date</label>
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
