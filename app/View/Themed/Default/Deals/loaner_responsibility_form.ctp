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
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; float: left; margin: 40px 0 0 0;"><b>LOANER RESPONSIBILITY FORM</b></h2>
			<div class="logo" style="width: 200px; margin: 20px auto; float: right">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>NAME:</label>
				<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 90%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:'';  ?>" style="width: 89%; float: right;">
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:'';  ?>" style="width: 100%; float: right; margin: 9px 0 0;">
			</div>
			
			<div class="form-field" style="float: right; width: 30%; margin-top: 27px;">
				<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:'';  ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>TELEPHONE#:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:'';  ?>" style="width: 83%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:'';  ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>INSURANCE CO:</label>
				<input type="text" name="insu_co" value="<?php echo isset($info['insu_co'])?$info['insu_co']:'';  ?>" style="width: 80%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>INSURANCE AGENT:</label>
				<input type="text" name="insu_agent" value="<?php echo isset($info['insu_agent'])?$info['insu_agent']:'';  ?>" style="width: 75%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>INSURANCE AGENCY PERSONNEL SPOKEN WITH:</label>
				<input type="text" name="insu_agency" value="<?php echo isset($info['insu_agency'])?$info['insu_agency']:'';  ?>" style="width: 42%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 60%;">
				<label>INSURANCE POLICY:</label>
				<input type="text" name="insu_policy" value="<?php echo isset($info['insu_policy'])?$info['insu_policy']:'';  ?>" style="width: 74%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: left; width: 50%;">
				<label>VEHICLE LOANED:</label>
				<label style="margin: 0 0 0 1%;">Year:</label>
				<input type="text" name="loan_year" value="<?php echo isset($info['loan_year'])?$info['loan_year']:'';  ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make:</label>
				<input type="text" name="loan_make" value="<?php echo isset($info['loan_make'])?$info['loan_make']:'';  ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model:</label>
				<input type="text" name="loan_model" value="<?php echo isset($info['loan_model'])?$info['loan_model']:'';  ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px auto;">	
			<div class="form-field" style="float: right; width: 87%;">
				<label>VIN#:</label>
				<input type="text" name="loan_vin" value="<?php echo isset($info['loan_vin'])?$info['loan_vin']:'';  ?>" style="width: 94%; float: right;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 7px 0;">I hereby acknowledge that the vehicle listed above has been provided to me as a loaner vehicle while my personal vehicle is being serviced or for evaluation in regards to possible purchase. I accept full responsibility for the vehicle while it is on loan to me and I agree to return the vehicle in the same condition and with the same fuel level as when it was provided to me.</p>
		
		<p style="float: left; width: 100%; margin: 7px 0;">I Understand that my signature on this form reflects my agreement to have my own insurance cover the vehicle on loan to me and in the event the vehicle is damaged, including as a result of an accident, vandalism or act of God, I agree to either pay for the damage directly or submit a claim to my insurance company, in which case I will pay any applicable deductible. If the vehicle is damaged as a result of some other party's actions and that party does not pay for the damage, I agree to reimburse CTC for any cost incurred in pursuing payment from the responsible party and repairing the damage.</p>
		
		<p style="float: left; width: 100%; margin: 7px 0;">I Understand that I am the only authorized driver while the vehicle is on loan to me and agree to say within a 50-mile radius of the dealership unless given written consent by CTC to exceed that distance. I agree to strictly follow all motor vehicle laws and will pay any tickets received while using the vehicle, I SPECIFICALLY AGREE THAT I WILL NOT OPERATE THE VEHICLE WHILE UNDER THE INFLUENCE OF ALCOHOL OR DRUGS, OR IN THE COMMISSION OF A CRIME, In the event the vehicle is involved in an accident, I will promptly notify the authorities and then CTC <input type="text" name="ctc1" value="<?php echo isset($info['ctc1'])?$info['ctc1']:'';  ?>" style="width: 7%;">. In consideration for CTC <input type="text" name="ctc2" value="<?php echo isset($info['ctc2'])?$info['ctc2']:'';  ?>" style="width: 7%;"> loaning the vehicle to me. I agree to indemnify CTC <input type="text" name="ctc3" value="<?php echo isset($info['ctc3'])?$info['ctc3']:'';  ?>" style="width: 7%;"> arising directly or indirectly from my possession of the vehicle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Signature:</label>
				<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:'';  ?>" style="width: 87%; float: right;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; float: right;">
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
