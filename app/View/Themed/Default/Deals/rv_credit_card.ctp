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
	.row {margin-bottom: 100px !important;}
	p {font-size: 30px !important;}
	h2 {font-size: 33px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 15px 0 45px; font-size: 20px; text-align: center;"><b>RVs Northwest Credit Card Authorization</b></h2>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 0px 60px 70px">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My name as it appears on my card is                  
					<span>
						<input type="text" name="waiver2" value="<?php echo isset($info['waiver2']) ? $info['waiver2'] : ''; ?>" style="width: 30%;">
					</span>
					.
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px 30px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;">I give RVs Northwest permission to run my-</p>
				<p style="float: left; width: 100%;margin: 7px 0;">VISA MASTERCARD -in the amount of $
					<span>
						<input type="text" name="waiver5" value="<?php echo isset($info['waiver5']) ? $info['waiver5'] : ''; ?>" style="width: 20%;"> 
					</span>
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px 30px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">Date
					<span>
						<input type="text" name="waiver5" value="<?php echo isset($info['waiver5']) ? $info['waiver5'] : ''; ?>" style="width: 20%;"> 
					</span>
					My credit card number
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px 30px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">is
					<span>
						<input type="text" name="waiver6" value="<?php echo isset($info['waiver6']) ? $info['waiver6'] : ''; ?>" style="width: 34%;"> 
					</span>
					Expiration
					<span>
						<input type="text" name="waiver6" value="<?php echo isset($info['waiver6']) ? $info['waiver6'] : ''; ?>" style="width: 15%;"> 
					</span>
				</p>
			</div>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 8px 60px 30px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My 3 digit code<span>
						<input type="text" name="vehilce" value="<?php echo isset($info['vehilce']) ? $info['vehilce'] : ''; ?>" style="width: 10%;"> 
					</span>. Only authorized personnel will have access to my information. This information is for the sole purpose of transacting business and will be treated with
the respect delicate information deserves. This includes, but not limited to, customary practices of safeguarding credit card information.</b></p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>X</label>
				<input type="text" name="customer1" value="<?php echo isset($info['customer1']) ? $info['customer1'] : ''; ?>" style="width: 55%;">
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
