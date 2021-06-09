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
	label{font-size: 14px; font-weight: normal !important;}
	.row-table input[type="text"]{border-bottom: 0px; margin: 2px 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
.mr-section .form-field{padding-top: 8px !important;}
.margin-textarea{height: 170px !important;}
.sm-margin{height: 198px !important;}
.form-field {height: 65px !important;}
.bottom_title {height: 150px !important;}
.bottom_input {height: 220px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 30px 0 0; font-size: 20px; text-align: center;"><b>Parts Add-on Sheet</b></h2>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block; float: left;">Date -</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 40%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block; float: left;">Customer Name -</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 74.6%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block; float: left;">Unit Stock Number -</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 73%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="work" style="float: left; width: 100%;">
				<label style="text-align: left; display: block; float: left;">Item added on to purchase:</label>
				<input type="text" name="purchase1" value="<?php echo isset($info['purchase1']) ? $info['purchase1'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">
				<input type="text" name="purchase2" value="<?php echo isset($info['purchase2']) ? $info['purchase2'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">
				<input type="text" name="purchase3" value="<?php echo isset($info['purchase3']) ? $info['purchase3'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">	
				<input type="text" name="purchase4" value="<?php echo isset($info['purchase4']) ? $info['purchase4'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">	
				<input type="text" name="purchase5" value="<?php echo isset($info['purchase5']) ? $info['purchase5'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">
				<input type="text" name="purchase6" value="<?php echo isset($info['purchase6']) ? $info['purchase6'] : "" ?>" style="width: 85.5%; margin-bottom: 7px;">	
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 120px 65px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block;"><i>(items not included in parts bonus: hitches, brake control, air bags,and tie downs)</i></label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">Service Counter Sign off</label>
				<input type="text" name="service_sign" value="<?php echo isset($info['service_sign'])?$info['service_sign']:''; ?>" style="width: 74.6%;">
			</div>

			<div class="form-field" style="float: left; width: 43%; margin-top: 21px;">
				<label style="text-align: left; display: block; float: left;">Date:</label>
				<input type="text" name="service_date" value="<?php echo isset($info['service_date'])?$info['service_date']:''; ?>" style="width: 74.6%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">Parts Counter Sign off</label>
				<input type="text" name="parts_sign" value="<?php echo isset($info['parts_sign'])?$info['parts_sign']:''; ?>" style="width: 74.6%;">
			</div>

			<div class="form-field" style="float: left; width: 43%; margin-top: 21px;">
				<label style="text-align: left; display: block; float: left;">Date:</label>
				<input type="text" name="parts_date" value="<?php echo isset($info['parts_date'])?$info['parts_date']:''; ?>" style="width: 74.6%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 120px 60px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">Sales Person Signature</label>
				<input type="text" name="sales_sign" value="<?php echo isset($info['sales_sign'])?$info['sales_sign']:''; ?>" style="width: 74.6%;">
			</div>

			<div class="form-field" style="float: left; width: 43%; margin-top: 21px;">
				<label style="text-align: left; display: block; float: left;">Date:</label>
				<input type="text" name="sales_date" value="<?php echo isset($info['sales_date'])?$info['sales_date']:''; ?>" style="width: 74.6%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 120px 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block;">In order to get paid on the parts you added you must have this signed, a copy of the get ready attached, and turned in by<br> the 25th of each month.</label>
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
