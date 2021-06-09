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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
input[type="text"]{margin-bottom: 45px !important;}
.center-sec {margin-top: 50px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;text-decoration: underline;">15 DAY PAYOFF REQUEST</h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="float: left; width: 25%; text-align: center; margin-bottom: 30px;">
					Lienholder Physical Address:<br>
					<strong>(Do not use PO Box)</strong>
				</label>
				<input type="text" name="p_address1" value="<?php echo isset($info['p_address1']) ? $info['p_address1'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 5px;">
				<input type="text" name="p_address2" value="<?php echo isset($info['p_address2']) ? $info['p_address2'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin-bottom: 5px;">
				<input type="text" name="p_address3" value="<?php echo isset($info['p_address3']) ? $info['p_address3'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000;">
				<label>Phone:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; border-bottom: 1px solid #000;">
				<label>Acct #</label>
				<input type="text" name="acct_num" value="<?php echo isset($info['acct_num'])?$info['acct_num']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 30px 0 20px;"><b>I authorize Commercial Truck Center of VA to act as my agent and to pay the lien on my:</b></p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 76%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Vin#</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 90%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>In the amount of $</label>
				<input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>Good until</label>
				<input type="text" name="good_until" value="<?php echo isset($info['good_until'])?$info['good_until']:''; ?>" style="width: 75%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>Quoted by:</label>
				<input type="text" name="quoted_by" value="<?php echo isset($info['quoted_by'])?$info['quoted_by']:''; ?>" style="width: 87%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>Per diem $</label>
				<input type="text" name="diem" value="<?php echo isset($info['diem'])?$info['diem']:''; ?>" style="width: 73%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; text-align: center;">
			<div class="center-sec" style="margin: 0 auto; border: 1px solid #000; width: 60%; padding: 10px; height: 150px;">
				<p style="float: left; width: 100%;"><b>Please deliver the title, with the lien released and assigned to:</b></p>
				<h2 style="float: left; width: 100%; margin: 20px 0 0; font-size: 19px;"><b>Commercial Truck Center of Virginia<br>
740 S. Military Hwy<br>
Virginia Beach, VA 23464</b></h2>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>Thank you, in advance, for your cooperation</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; text-align: center;">
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 87%; border-bottom: 1px solid #000;">
				<label style="font-size: 16px;"><b>Customer Signature</b></label>
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; text-align: center; margin: 30px 0 0; text-decoration: underline;"><b>Attention Lienholder</b></h3>
		
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
