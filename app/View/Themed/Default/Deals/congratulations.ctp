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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal;}
	p{font-size: 14px; margin: 2px 4px;}
	ul{padding: 0 0 0 38px;}
	li{font-size: 14px; list-style: initial;}
	
@media print {
	input[type="text"]{padding: 3px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 600px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/village-ms-logo.png'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<p style="font-size: 14px; margin: 10px 0;">Congratulations on your purchase of a Power Sports vehicle from Village of Holland. We know that you have purchased a quality machine, but even the best equipment can have an occasional problem. If it does, we have got you covered.</p>
			<p style="font-size: 14px; margin: 10px 0;">Whether you plan on owning your vehicle for the short term or long term, we have a coverage plan for you.</p>
			<ul>
				<li>Coverage up to 5 yrs. <sup>*</sup></li>
				<li>Exclusionary Coverage</li>
				<li>Deductible $0.00 - $50.00</li>
				<li>Protection against un-expected expenses</li>
				<li>Unlimited mileage/hours protection</li>
				<li>Fully transferable and cancelable<sup>*</sup></li>
			</ul>
			
			
			<p style="font-size: 14px; margin: 10px 0;">Manufacturer's Coverage Term: <input type="text" name="coverage_term" value="<?php echo isset($info['coverage_term'])?$info['coverage_term']:''; ?>" style="width: 10%;"> Months</p>
			<p style="font-size: 14px; margin: 10px 0;">Coverage Term <sup>*</sup>:</p>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="from-field" style="float: left; width: 48%;">
					<label>12 Months $</label>
					<input type="text" name="12_month" value="<?php echo isset($info['12_month'])?$info['12_month']:''; ?>" style="width: 15%;">/
					<label>Per Month $</label>
					<input type="text" name="per_12month" value="<?php echo isset($info['per_12month'])?$info['per_12month']:''; ?>" style="width: 15%;">
				</div>
				<div class="from-field" style="float: right; width: 48%;">
					<label>24 Months $</label>
					<input type="text" name="24_month" value="<?php echo isset($info['24_month'])?$info['24_month']:''; ?>" style="width: 15%;">/
					<label>Per Month $</label>
					<input type="text" name="per_24month" value="<?php echo isset($info['per_24month'])?$info['per_24month']:''; ?>" style="width: 15%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="from-field" style="float: left; width: 48%;">
					<label>36 Months $</label>
					<input type="text" name="36_month" value="<?php echo isset($info['36_month'])?$info['36_month']:''; ?>" style="width: 15%;">/
					<label>Per Month $</label>
					<input type="text" name="per_36month" value="<?php echo isset($info['per_36month'])?$info['per_36month']:''; ?>" style="width: 15%;">
				</div>
				<div class="from-field" style="float: right; width: 48%;">
					<label>48 Months $</label>
					<input type="text" name="48_month" value="<?php echo isset($info['48_month'])?$info['48_month']:''; ?>" style="width: 15%;">/
					<label>Per Month $</label>
					<input type="text" name="per_48month" value="<?php echo isset($info['per_48month'])?$info['per_48month']:''; ?>" style="width: 15%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="from-field" style="float: left; width: 48%;">
					<label>60 Months $</label>
					<input type="text" name="60_month" value="<?php echo isset($info['60_month'])?$info['60_month']:''; ?>" style="width: 15%;">/
					<label>Per Month $</label>
					<input type="text" name="per_60month" value="<?php echo isset($info['per_60month'])?$info['per_60month']:''; ?>" style="width: 15%;">
				</div>
			</div>
			
			<p style="font-size: 14px; margin: 10px 0;">I have elected to purchase an extended service contract for my vehicle purchased from Village of Holland.</p>
			
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
				<div class="from-field" style="float: left; width: 48%;">
					<label>Signature:</label>
					<input type="text" name="signature1" value="<?php echo isset($info['signature1'])?$info['signature1']:''; ?>" style="width: 70%;">
				</div>
				<div class="from-field" style="float: right; width: 48%;">
					<label>Date:</label>
					<input type="text" name="signature1_date" value="<?php echo isset($info['signature1_date'])?$info['signature1_date']:''; ?>" style="width: 40%;">
				</div>
			</div>
			
			<p style="font-size: 14px; margin: 10px 0;">I have elected NOT to purchase an extended service contract for my vehicle purchased from Village of Holland. I acknowledge that I have been offered an extended service contract for an additional amount over the price of the vehicle; that the benefits have been explained to me and I have decided not to purchase it at this time; and that I understand that I am not entitled to any benefits under this service contract. I also understand that once my vehicle is out of the original manufacturer's warranty that I have no coverage for the repair or replacement of any components on this vehicle.</p>
		
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
				<div class="from-field" style="float: left; width: 48%;">
					<label>Signature:</label>
					<input type="text" name="signature2" value="<?php echo isset($info['signature2'])?$info['signature2']:''; ?>" style="width: 70%;">
				</div>
				<div class="from-field" style="float: right; width: 48%;">
					<label>Date:</label>
					<input type="text" name="signature2_date" value="<?php echo isset($info['signature2_date'])?$info['signature2_date']:''; ?>" style="width: 40%;">
				</div>
			</div>
			
			<p style="font-size: 14px; margin: 10px 0;"><sup>*</sup>Coverage term and eligibility may vary based on type of vehicle being purchased, not all vehicles will be eligible for 5 years of coverage. Deductible will vary depending on coverage selected. Some contracts are not cancelable.</p>
			
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
