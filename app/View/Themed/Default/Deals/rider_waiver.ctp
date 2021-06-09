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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 15px;}
	label{font-size: 16px; margin-bottom: 0px; font-weight: normal !important;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
		p{line-height: 24px;}
@media print {
.left-text{background:#000;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="width: 20%; float: left; margin: 0 30px 0 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/762/bluff-powersports-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<h2 style="float: left; width: 100%; font-weight: bold; border-bottom: 1px double #000; font-size: 20px; margin-top: 10px;">RIDER WAIVER, RELEASE OF LIABILITY AND INDEMNITY AGREEMENT</h2>
			
			<p style="float: left; width: 100%; margin: 10px 0;">In consideration for being allowed to participate in this Demo Ride Program and to use or operate a Bluff Powersports vehicle, I agree on behalf of myself and my heirs, executors, administrators, assigns and legal representatives, to waive, release, promise not to sue, and forever discharge Bluff Powersports and their respective directors, officers, agents, employees, representatives, distributors and dealers (hereinafter called "releasees") from and against any and all claims, causes of action, demands or changes of whatsoever nature for property damage or personal injuries, including death, which I may sustain or incur by reason of my use or operation of a Bluff Powersports vehicle while participating in this Demo Ride Program, even if caused in whole or in part by the negligence of the Releasees.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">I further agree to indemnify, defend and hold each and all of said Releasees harmless from and against any and all claims, causes of action, demands or charges of whatsoever nature which any third party may claim to have or hold for property damage or personal injuries, including death, arising out of my use or operation of a Bluff Powersports vehicle or watercraft while participating in this Demo Ride Program even if caused in whole or part by the negligence of the Releasees.</p>
			
			<h2 style="float: left; width: 100%; margin: 10px 0; font-size: 20px; font-weight: bold;">I HAVE CAREFULLY READ THE WAIVER, RELEASE OF LIABILITY <br>AND INDEMNITY AGREEMENT AND FULLY UNDERSTAND THE CONTENTS.</h2>
		</div>
	
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 100%;">
				<label>Date</label>
			</div>
			
			<div class="from-filed" style="float: left; width: 60%;">
				<input type="text" name="rider1" value="<?php echo isset($info['rider1']) ? $info['rider1'] : ''; ?>" style="width: 100%;">
				<label>Print Name of Rider<span>*</span></label>
			</div>
			
			<div class="from-filed" style="float: right; width: 24%;">
				<input type="text" name="sign1" value="<?php echo isset($info['sign1']) ? $info['sign1'] : ''; ?>" style="width: 100%;">
				<label>Signature (in pen.)</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="width: 100%;">
				<label>Date</label>
			</div>
			<div class="from-filed" style="float: left; width: 60%;">
				<input type="text" name="author1" value="<?php echo isset($info['author1']) ? $info['author1'] : ''; ?>" style="width: 100%;">
				<label>Print Name of Authorized Dealership Representative</label>
			</div>
			
			<div class="from-filed" style="float: right; width: 24%;">
				<input type="text" name="sign2" value="<?php echo isset($info['sign2']) ? $info['sign2'] : ''; ?>" style="width: 100%;">
				<label>Signature (in pen.)</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="dealer_num1" value="<?php echo isset($info['dealer_num1']) ? $info['dealer_num1'] : ''; ?>" style="width: 100%;">
				<label>Dealer #</label>
			</div>
			<div class="from-filed" style="float: right; width: 85%;">
				<input type="text" name="dealer_name1" value="<?php echo isset($info['dealer_name1']) ? $info['dealer_name1'] : ''; ?>" style="width: 100%;">
				<label>Dealership Name<span>*</span></label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0;"><strong><span>*</span> If the rider is under 18 years  of age or considered to be  a minor in your state, the "Demo' Rider Waiver, Release of Liability and Indemnity Agreement" must also be signed (see Parent or Guardian Permission section) prior to the Child's use or operation of the demonstration product.</strong></p>
		
		<h2 style="float: left; width: 100%; margin: 15px 0; font-size: 20px; font-weight: bold;">PARENT OR GUARDIAN PERMISSION </h2>
		
		<p style="float: left; width: 100%; margin: 10px 0;">In Consideration for my child or ward being allowed  to participate in this Demo Ride Program and to use or operate the Bluff Powersports product, I agree and represent that  am the parent or legal guardian of the above rider and give permission for the minor child or ward to operate, use and ride the Bluff Powersports product, and agree on behalf of the minor, myself and my spouse, heirs, and legal representatives, to the terms of the above Waiver, release of Liability and Indemnity Agreement.</p>
		
		<h2 style="float: left; width: 100%; font-size: 20px; font-weight: bold; margin: 20px 0 15px;">I HAVE CAREFULLY READ THE FOREGOING PARENT OR GUARDIAN PERMISSION, THE WAIVER, RELEASE OF LIABILITY AND INDEMNITY AGREEMENT AND UNDERSTAND THE CONTENTS</h2>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="date3" value="<?php echo isset($info['date3']) ? $info['date3'] : ''; ?>"  style="width: 100%;">
				<label>Date</label>
			</div>
			
			<div class="from-filed" style="float: left; width: 60%;">
				<input type="text" name="rider2" value="<?php echo isset($info['rider2']) ? $info['rider2'] : ''; ?>" style="width: 100%;">
				<label>Print Name of Parent/Guardian of Rider<span>*</span></label>
			</div>
			
			<div class="from-filed" style="float: right; width: 24%;">
				<input type="text" name="sign3" value="<?php echo isset($info['sign3']) ? $info['sign3'] : ''; ?>" style="width: 100%;">
				<label>Signature (in pen.)</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="date4" value="<?php echo isset($info['date4']) ? $info['date4'] : ''; ?>"  style="width: 100%;">
				<label>Date</label>
			</div>
			<div class="from-filed" style="float: left; width: 60%;">
				<input type="text" name="author2" value="<?php echo isset($info['author2']) ? $info['author2'] : ''; ?>" style="width: 100%;">
				<label>Print Name of Authorized Dealership Representative</label>
			</div>
			
			<div class="from-filed" style="float: right; width: 24%;">
				<input type="text" name="sign4" value="<?php echo isset($info['sign4']) ? $info['sign4'] : ''; ?>" style="width: 100%;">
				<label>Signature (in pen.)</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-filed" style="float: left; width: 14%; margin-right: 1%;">
				<input type="text" name="dealer_num2" value="<?php echo isset($info['dealer_num2']) ? $info['dealer_num2'] : ''; ?>" style="width: 100%;">
				<label>Dealer #</label>
			</div>
			<div class="from-filed" style="float: right; width: 85%;">
				<input type="text" name="dealer_name2" value="<?php echo isset($info['dealer_name2']) ? $info['dealer_name2'] : ''; ?>" style="width: 100%;">
				<label>Dealership Name<span>*</span></label>
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
