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
	label{font-size: 15px; font-weight: normal;}
	li{margin-bottom: 7px; font-size: 15px;}
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="width: 400px; margin: 0 auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-n.png'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 34px; margin: 11px 0;"><b>The Harley Shop at the Beach</b></h2>
		<p style="float: left; width: 100%; text-align: center; margin: 7px 0 10px; ">4002 Highway 17 South, North Myrtle Beach, SC 29582</p>
		
		<strong style="float: left; width: 100%; font-size: 17px; text-align: center; margin: 5px 0 4px; display: block;">(843) 663-5555</strong>
		
		<strong style="float: left; width: 100%; font-size: 17px; text-align: center; margin: 7px 0 10px; display: block;"><i>Chris Long - Business Manager</i></strong>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 13px 0;">
				<label>Your Motorcycle is:</label>
				<input type="text" name="motorcycle" value="<?php echo isset($info['motorcycle']) ? $info['motorcycle'] : "" ?>" style="width: 85%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 13px 0;">
				<label>Your VIN # is:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin1']) ? $info['vin1'] : $info['vin'] ?>" style="width: 88.6%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 13px 0;">
				<label>Base Price is:</label>
				<input type="text" name="unit_price" unit_price" value="<?php echo isset($info['unit_price']) ? $info['unit_price'] : '' ?>" style="width: 88.3%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 13px 0;">
				<label>Engine Size is:</label>
				<input type="text" name="unit_size" value="<?php echo isset($info['unit_size']) ? $info['unit_size'] : '' ?>" style="width: 87.4%">
			</div>
			
			
			<div class="form-field" style="float: left; width: 100%; margin: 22px 0;">
				<label style="float: left; margin-top: 20px;">Your Lienholder is:</label>
				<div class="info" style="width: 50%; float: left; margin-left: 12%; border: 1px solid #000;">
					<b style="float: left; width: 100%; text-align: center; margin: 7px 0;">Eaglemark Savings Bank</b>
					<b style="float: left; width: 100%; text-align: center; margin: 7px 0;">It's Successors and/or Its Assigns</b>
					<b style="float: left; width: 100%; text-align: center; margin: 7px 0;">PO Box 21650</b>
					<b style="float: left; width: 100%; text-align: center; margin: 7px 0;">Carson City, Nevada 89721</b>
				</div>
			</div>
			
			<strong style="float: left; width: 100%; margin: 20px 0 10px; font-size: 19px; text-align: center; text-decoration: underline;">PLEASE HAVE YOUR BINDER/PROOF OF INSURANCE FAXED TO:</strong>
			<strong style="float: left; width: 100%; margin: 10px 0 10px; font-size: 22px; text-align: center; text-decoration: underline;">843-663-0150</strong>
			<strong style="float: left; width: 100%; font-size: 19px; margin: 10px 0 10px; text-align: center;"><span style="text-decoration: underline;">AND/OR EMAILED TO:</span> Chris@myrtlebeachharley.com</strong>
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
