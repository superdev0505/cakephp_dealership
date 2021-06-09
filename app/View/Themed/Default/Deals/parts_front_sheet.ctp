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
	label{font-size: 14px;}
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
			<h2 style="float: left; width: 100%; margin: 30px 0 0; font-size: 20px; text-align: center; text-decoration: underline;"><b>PARTS FRONT SHEET</b></h2>
			<p style="float: left; width: 100%; margin: 40px 0 43px; text-align: center;"><b>This customer has <span style="margin: 0 3%;">ACCEPTED / DECLINED</span> Freedom's Standard Protection Plan</b></p>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Vehicle Stock # :</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Vehicle Year/Make/Model :</label>
				<input type="text" name="vehicle_date" value="<?php echo isset($info['vehicle_date'])?$info['vehicle_date']: $info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Customer Name :</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Credit Available: (If financing)</label>
				<input type="text" name="credit" value="<?php echo isset($info['credit'])?$info['credit']:''; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">Purchasing Parts:</label>
			</div>
			<div class="form-field" style="float: left; width: 12%; margin-left: 4%;">
				<label style="display: block; float: left;"> <input type="checkbox" name="purchase_status" value="yes" <?php echo ($info['purchase_status'] == "yes") ? "checked" : ""; ?> /> Yes</label>
			</div>
			<div class="form-field" style="float: left; width: 12%; margin-left: 4%;">
				<label style="display: block; float: left;"><input type="checkbox" name="purchase_status" value="no" <?php echo ($info['purchase_status'] == "no") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: right; width: 40%;">
				<label>Price</label>
				<input type="text" name="purchase_price" value="<?php echo isset($info['purchase_price'])?$info['purchase_price']:''; ?>" style="float: right; width: 86%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">Labor::</label>
			</div>
			<div class="form-field" style="float: left; width: 12%; margin-left: 4%;">
				<label style="display: block; float: left;"> <input type="checkbox" name="labor" value="yes" <?php echo ($info['labor'] == "yes") ? "checked" : ""; ?> /> Yes</label>
			</div>
			<div class="form-field" style="float: left; width: 12%; margin-left: 4%;">
				<label style="display: block; float: left;"><input type="checkbox" name="labor" value="no" <?php echo ($info['labor'] == "no") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: right; width: 40%;">
				<label>Price</label>
				<input type="text" name="labor_price" value="<?php echo isset($info['labor_price'])?$info['labor_price']:''; ?>" style="float: right; width: 86%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 16px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 100%; text-align: center; display: block; float: left; margin: 20px 0 0;">How are the parts being handled: (Circle One)</label>
				<div class="circle-one" style="float: left; width: 100%; margin: 7px; text-align: center;">
					<label style="margin: 0 5%"> <input type="radio" name="part_handler"  value="invoice" <?php echo ($info['part_handler'] == "invoice") ? "checked" : ""; ?> /> Invoice (Sold to Unit)</label>
					<label style="margin: 0 5%"> <input type="radio" name="part_handler" value="repair" <?php echo ($info['part_handler'] == "repair") ? "checked" : ""; ?> /> Repair Order </label>
					<label style="margin: 0 5%"> <input type="radio" name="part_handler" value="counter" <?php echo ($info['part_handler'] == "counter") ? "checked" : ""; ?> /> Paid Over Counter</label>
				</div>
			</div>
		</div>
		
		<p class="bottom_title" style="float: left; width: 100%; text-align: center; font-size: 14px; margin: 30px 0; height: 60px;"><b>*** If parts were purchased, a copy of the invoice or R.O. MUST accomany this sheet ***</b></p>

		<div class="bottom_input" style="float: left; width: 100%; margin: 10px 0;height: 105px;">
			<div class="form-field" style="float: left; width: 30%;margin-left: 56px;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson'])?$info['salesperson']:''; ?>" style="width: 68%;">
			</div>

			<div class="form-field" style="float: left; width: 30%;">
				<label>Part Employee</label>
				<input type="text" name="part_employee" value="<?php echo isset($info['part_employee'])?$info['part_employee']:''; ?>" style="width: 55%;margin-left: 28px;">
			</div>

			<div class="form-field" style="float: left; width: 30%;">
				<label>Service Employee</label>
				<input type="text" name="service_employee" value="<?php echo isset($info['service_employee'])?$info['service_employee']:''; ?>" style="width: 48%; margin-left: 28px;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 38%;float: right;">
				<label>PCA</label>
				<input type="text" name="pca" value="<?php echo isset($info['pca'])?$info['pca']:''; ?>" style="width: 79%;">
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
