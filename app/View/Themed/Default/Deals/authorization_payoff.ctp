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
	<div id="worksheet_container" style="width: 925px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;">
		<b>AUTHORIZATION FOR PAY-OFF</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="inner" style="float: left; width: 50%;">
				<div class="from-filed" style="float: left; width: 100%; margin: 7px 0;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 92%">
				</div>
				<div class="from-filed" style="float: left; width: 100%; margin: 7px 0;">
					<label>To</label>
					<input type="text" name="date1" value="<?php echo isset($info['date1'])?$info['date1']:''; ?>" style="width: 95%">
					<input type="text" name="date2" value="<?php echo isset($info['date2'])?$info['date2']:''; ?>" style="width: 100%; margin: 10px 0;">
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0;">The undersigned hereby authorizes and directs you to accept from Commercial Truck Center of Virginia
the pay-off due you on my account in the amount of $ <input type="text" name="pay_amt"
 value="<?php echo isset($info['pay_amt'])?$info['pay_amt']:''; ?>" style="width: 50%">, and to surrender to them the
properly endorsed certificate of ownership with lien satisfaction and Notary Seal affixed.</p>
	
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Description</label>
				<input type="text" name="descript" value="<?php echo isset($info['descript'])?$info['descript']: $info['year']." ".$info['make']." ".$info['serial_number']; ?>" style="width: 91%;">
			</div>
			<p style="text-align: center; margin: 5px 0 10px; float: left; width: 100%;">(Year, Make and Serial Number)</p>
		</div>
		
		<div class="row" style="float: left; width: 100%;">
			<div class="left" style="float: left; width: 40%;">
				<p style="float: left; width: 100%; margin: 0; font-size: 14px;">Note: Have Power of Attorney signed with<br>
all names that are on registration</p>
			</div>
			
			<div class="right" style="float: right; width: 50%;">	
				<div class="form-field" style="float: left; width: 100%;">
					<label style="font-size: 16px;"><b>Signed</b></label>
					<input type="text" name="signed1" value="<?php echo isset($info['signed1'])?$info['signed1']:''; ?>" style="width: 86%;">
					<input type="text" name="signed2" value="<?php echo isset($info['signed2'])?$info['signed2']:''; ?>" style="border-bottom: 1px solid #000; width: 100%; margin: 20px 0 0;">
				</div>
			</div>
		</div>

		<h2 style="float: left; width: 100%; margin: 60px 0; text-align: center;"><b>GUARANTEE OF TITLE</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="from-filed" style="float: left; width: 40%; margin: 7px 0;">
					<label>To</label>
					<input type="text" name="date1" value="<?php echo isset($info['date1'])?$info['date1']:''; ?>" style="width: 91%">
				</div>
				<div class="from-filed" style="float: right; width: 40%; margin: 7px 0;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 89%">
				</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0; line-height: 30px;">This is to certify that the <input type="text" name="certify" value="<?php echo isset($info['certify'])?$info['certify']:''; ?>" style="width: 30%">Serial No. <input type="text" name="serial_num" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>" style="width: 30%">being
traded by me belongs to me and that I have title to said vehicle, free and clear of all liens and
encumbrances,exceptasfollows:</p>
		<p style="float: left; width: 100%; margin: 10px 0; line-height: 30px;">I Warrant title to this vehicle and guarantee to deliver to CTC of VA this title free and clear of all liens
and encumbrances within (10)days, and further agree to pay any additional charges involved inthe event
a quoted payoff noted herewithis changed.</p>
		<p style="float: left; width: 100%; margin: 10px 0; line-height: 30px;">I further agree to reimburse CTC of Virginia for the total allowance of thisvehicleif I cannot fulfill the above
obligations.</p>
	
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0;">
			<div class="right" style="float: right; width: 50%;">	
				<div class="form-field" style="float: left; width: 100%;">
					<label style="font-size: 16px;"><b>Signed</b></label>
					<input type="text" name="signed1" value="<?php echo isset($info['signed1'])?$info['signed1']:''; ?>" style="width: 88%;">
					<input type="text" name="signed2" value="<?php echo isset($info['signed2'])?$info['signed2']:''; ?>" style="border-bottom: 1px solid #000; width: 100%; margin: 20px 0 0;">
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin-top: 30px; line-height: 30px;">Sworn and subscribed to before me this <input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 15%">  day of <input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width: 30%"> , 20 <input type="text" name="title3" value="<?php echo isset($info['title3'])?$info['title3']:''; ?>" style="width: 14%">
Notary Public <input type="text" name="title4" value="<?php echo isset($info['title4'])?$info['title4']:''; ?>" style="width: 40%;"></p>
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
