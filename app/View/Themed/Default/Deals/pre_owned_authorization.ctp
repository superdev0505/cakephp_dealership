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
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="container" style="width: 960px; margin: 0 auto;">
			<div class="row" style="float: left; width: 100%;float: left;border-bottom: solid 2px #f19393;">
				<div class="logo" style="width: 300px; float: left;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/watercraft.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<div style="float: right; margin-top: 12px;">
					<p style="width: 100%; margin: 0; text-align: right; font-size: 16px;">7453 Highway X P.O. Box 880</p>
					<p style="width: 100%; margin: 0; text-align: right; font-size: 16px;">Three Lakes, WI 54562</p>
					<p style="width: 100%; margin: 0; text-align: right; font-size: 16px;">715-546-3351</p>
					<p style="width: 100%; margin: 0; text-align: right; font-size: 16px;">Fax: 715-546-8101</p>
					<p style="width: 100%; margin: 0; text-align: right; font-size: 16px;">Watercraftsales.com</p>
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 0;">
				<h2 style="font-family: -webkit-body; text-decoration: underline; width: 100%; margin: 30px 0 0; font-size: 20px; text-align: center;margin-bottom: 15px;"><b>PRE-OWNED TRADE IN AUTHORIZATION FORM</b></h2>
				<h2 style="font-family: -webkit-body; width: 100%; font-size: 20px; text-align: center;margin-bottom: 30px;">FOR CUSTOMER WHO'S TRADE IN BOAT HAS NOT BEEN<br>CHECKED OUT PRIOR TO THEIR NEW SALE DELIVERY</h2>
			</div>
			
			<div class="row" style="float: left; width: 90%; margin: 7px 0px;">
				<p style="float: left; width: 100%; margin: 10px 0;">The boat you have traded has been given a value by our salesman without being checked over by our service department. While we trust your judgment on the Pre-Owned Appraisal form you filled out, we still can not offer you a true trade in value without our service department completely checking over your boat, motor and trailer.</p>

				<p style="float: left; width: 100%; margin: 10px 0;">The value you were given for your trade in was done in good faith according to the Pre-Owned Appraisal form you filled out. Since you could not get your boat to us prior to the pick up of your new boat, you will be responsible for any repairs needed to get the boat in the condition you stated on the Pre-Owned Appraisal form.</p>
				
				<p style="float: left; width: 100%; margin: 10px 0 35px;">Your signature authorizes us to bill you for repairs and signifies you understand your responsibility</p>
				
			<div class="row" style="float: left; width: 100%; padding-bottom: 55px; margin: 0px;">
				<div class="form-field" style="float: left; width: 65%; margin: 3px 0;">
					<input type="text" name="printed_name" value="<?php echo isset($info['printed_name']) ? $info['printed_name'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label>Please print your name</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 45%; margin: 3px 0;">
					<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label style="margin-left: 30px;">Customer Signature</label>
				</div>
					
				<div class="form-field" style="float: right; width: 26%; margin: 3px 0;">
					<input type="text" name="customer_date" value="<?php echo isset($info['customer_date']) ? $info['customer_date'] : ''; ?>" style="float: right; width: 86%; margin: 7px 0;">
					<label style="margin-left: 40px;">Date</label>
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
					<input type="text" name="salesman_sign" value="<?php echo isset($info['salesman_sign']) ? $info['salesman_sign'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label style="margin-left: 30px;">Salesman Signature</label>
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
