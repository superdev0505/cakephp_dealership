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
input[type="text"]{margin-bottom: 40px !important;}
.center-sec {margin-top: 70px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
	
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;text-decoration: underline;">PAYOFF AUTHORIZATION</h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="float: left; width: 25%; text-align: center; margin-bottom: 30px;">
					Lienholder Physical Address:<br>
					<strong>(Do not use PO Box)</strong>
				</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>To:</b></label>
				<input type="text" name="to1" value="<?php echo isset($info['to1'])?$info['to1']:'';  ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: right; width: 48%;">
				<label><b>For:</b></label>
				<input type="text" name="for1" value="<?php echo isset($info['for1'])?$info['for1']:'';  ?>" style="width: 91%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<input type="text" name="to2" value="<?php echo isset($info['to2'])?$info['to2']:'';  ?>" style="width: 94%;">
			</div>
			<div class="form-field" style="float: right; width: 50%;">
				<input type="text" name="for2" value="<?php echo isset($info['for2'])?$info['for2']:'';  ?>" style="width: 94%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; ">
			<div class="form-field" style="float: left; width: 50%;">
				<input type="text" name="to3" value="<?php echo isset($info['to3'])?$info['to3']:'';  ?>" style="width: 94%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<input type="text" name="for3" value="<?php echo isset($info['for3'])?$info['for3']:'';  ?>" style="width: 94%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Phone:</label>
				<input type="text" name="phone_num" value="<?php echo isset($info['phone_num'])?$info['phone_num']:'';  ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: right; width: 48%;">
				<label>Acct #</label>
				<input type="text" name="acct" value="<?php echo isset($info['acct'])?$info['acct']:'';  ?>" style="width: 88%; float: right;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 30px 0 20px;"><b>I authorize Commercial Truck Center of VA to act as my agent and to pay the lien on my:</b></p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:'';  ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:'';  ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:'';  ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Vin#</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:'';  ?>" style="width: 90%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>In the amount of $</label>
				<input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:'';  ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>Good until</label>
				<input type="text" name="good_until" value="<?php echo isset($info['good_until'])?$info['good_until']:'';  ?>" style="width: 74%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>Quoted by:</label>
				<input type="text" name="quoted_by" value="<?php echo isset($info['quoted_by'])?$info['quoted_by']:'';  ?>" style="width: 87%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>Per diem $</label>
				<input type="text" name="per_di" value="<?php echo isset($info['per_di'])?$info['per_di']:'';  ?>" style="width: 74%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; text-align: center;">
			<div class="center-sec" style="margin: 0 auto; border: 1px solid #000; width: 60%; padding: 10px; height: 150px;">
				<p style="float: left; width: 100%;"><b>Please deliver the title, with the lien released and assigned to:</b></p>
				<h2 style="float: left; width: 100%; margin: 20px 0 0; font-size: 16px;"><b>Commercial Truck Center of Virginia<br>
740 S. Military Hwy<br>
Virginia Beach, VA 23464</b></h2>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>Thank you, in advance, for your cooperation</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; text-align: center;">
				<input type="text" name="cus_sign" value="<?php echo isset($info['cus_sign'])?$info['cus_sign']:'';  ?>" style="width: 87%; border-bottom: 1px solid #000;">
				<label style="font-size: 16px;"><b>Customer Signature</b></label>
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; text-align: center; margin: 30px 0 0;text-decoration: underline;"><b>Attention Lienholder</b></h3>
		
		<p style="float: left; width: 100%; margin: 20px 0 0;">In the event the title is not available at the time of the payoff, this letter will serve as a
guarantee that the title <b>will be forwarded to Commercial Truck Center of Virginia</b> at the
above address immediately upon receipt</p>
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
