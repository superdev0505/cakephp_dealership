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
			<div class="row" style="float: left; width: 100%;float: left; margin-bottom: 100px;">
				<div class="logo" style="width: 300px; float: left; margin-right: 40px;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/watercraft-sales-logo.png'); ?>" alt="" style="width: 100%;">
				</div>
				<div style="margin-top: 22px; float: left; width: 63%; border-bottom: solid 2px #e32527;">
					<p style="width: 100%; margin: 0; font-size: 16px; color: #e32527;"><b>7453 Hwy. X P.O. Box 880 Three Lakes, WI 54562</b></p>
					<p style="width: 100%; margin: 0; color: #e32527; font-size: 16px;"><b>(715) 546-3351 Fax: (715) 546-8101</b></p>
					<p style="width: 100%; margin: 0; font-size: 16px; color: #e32527;"><b>www.watercraftsales.com</b></p>
				</div>
			</div>
			<div class="content" style="padding: 50px;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<h2 style="font-family: -webkit-body; text-decoration: underline; width: 100%; margin: 30px 0 0; font-size: 20px; margin-bottom: 15px;"><b>CONSIGNMENT POLICY</b></h2>
				</div>
				
				<div class="row" style="float: left; width: 90%; margin: 0px;">
					<p style="float: left; width: 100%; margin: 10px 0;">1. We will makeevery effort to give you a fair price for the merchandise you wish for us to sell.</p>
				</div>

				<div class="row" style="float: left; width: 90%; margin: 0px;">
					<p style="float: left; width: 100%; margin: 10px 0;">2. In order to give you a ture value, our service department needs to check it out mechanically</p>
				</div>

				<div class="row" style="float: left; width: 90%; margin: 0px;">
					<p style="float: left; width: 100%; margin: 10px 0;">3. The amount your salesman has given you, is the value based on your description, and or the appearance. Once it is checked out mechanically, the value may change.</p>
				</div>

				<div class="row" style="float: left; width: 90%; margin: 0px;">
					<p style="float: left; width: 100%; margin: 10px 0 35px;">4. If our service department finds that it needs repair, we will either reduce the value, or bill you for the repairs.</p>
				</div>
					
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 40%; margin: 3px 0; text-align: center;">
						<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign']) ? $info['customer_sign'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
						<label>Customer Signature</label>
					</div>
						
					<div class="form-field" style="float: right; width: 26%; margin: 3px 0; text-align: center;">
						<input type="text" name="customer_date" value="<?php echo isset($info['customer_date']) ? $info['customer_date'] : ''; ?>" style="float: right; width: 86%; margin: 7px 0;">
						<label>Date</label>
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
