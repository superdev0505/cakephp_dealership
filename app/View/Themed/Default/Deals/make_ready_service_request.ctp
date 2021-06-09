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
.row .form-field {
	height: 55px !important; 
}
.work_need {margin-bottom: 30px !important;}
.work {height: 250px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">CUSTOMER NAME</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">SALES PERSON</label>
				<input type="text" name="sperson" value="<?php echo $contact['Contact']['sperson']; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">PARTS PERSON</label>
				<input type="text" name="parts_person" value="<?php echo $contact['Contact']['parts_person']; ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">COLOR</label>
				<input type="text" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 30%; text-align: right; display: block; float: left;">SOLD UNIT <span style="margin: 0 20px;">/</span></label> 
				<label style="width: 15%; text-align: left; display: block; float: left;">STOCK UNIT <span style="margin: 0 20px;">/</span></label> 
				<label style="width: 25%; text-align: left; display: block; float: left;">TRADED UNIT</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">DROP OFF TIME:</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 4%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">DATE:</label>
				<input type="text" name="drop_date" value="<?php echo isset($info['drop_date']) ? $info['drop_date'] : "" ?>" style="width: 20%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin-left: 1%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Time:</label>
				<input type="text" name="drop_time" value="<?php echo isset($info['drop_time']) ? $info['drop_time'] : "" ?>" style="width: 20%;">
				AM/PM
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">NEEDED BY:</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 4%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">DATE:</label>
				<input type="text" name="needed_date" value="<?php echo isset($info['needed_date']) ? $info['needed_date'] : "" ?>" style="width: 20%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin-left: 1%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Time:</label>
				<input type="text" name="needed_time" value="<?php echo isset($info['needed_time']) ? $info['needed_time'] : "" ?>" style="width: 20%;">
				AM/PM
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="work" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">WORK NEEDED:</label>
				<input type="text" name="work_need1" class="work_need" value="<?php echo isset($info['work_need1']) ? $info['work_need1'] : "" ?>" style="width: 73%; float: right; margin-bottom: 7px;">
				<input type="text" name="work_need2" class="work_need" value="<?php echo isset($info['work_need2']) ? $info['work_need2'] : "" ?>" style="width: 73%; float: right; margin-bottom: 7px;">
				<input type="text" name="work_need3" class="work_need" value="<?php echo isset($info['work_need3']) ? $info['work_need3'] : "" ?>" style="width: 73%; float: right; margin-bottom: 7px;">	
				<input type="text" name="work_need4" class="work_need" value="<?php echo isset($info['work_need4']) ? $info['work_need4'] : "" ?>" style="width: 73%; float: right; margin-bottom: 7px;">	
				<input type="text" name="work_need5" class="work_need" value="<?php echo isset($info['work_need5']) ? $info['work_need5'] : "" ?>" style="width: 73%; float: right; margin-bottom: 7px;">	
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;"><b>VIN # VERIFIED</b></label>	
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">SALES PERSON Signature:</label>
				<input type="text" name="sal_signature" value="<?php echo isset($info['sal_signature']) ? $info['sal_signature'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">SALES MANAGER Signature:</label>
				<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign']) ? $info['manager_sign'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">SERVICE ADVISOR Signature:</label>
				<input type="text" name="service_sign" value="<?php echo isset($info['service_sign']) ? $info['service_sign'] : "" ?>" style="width: 73%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">Outstanding Recalls?</label>
				<span style="margin-left: 2%;"><input type="checkbox" name="outstand_status" value="yes" <?php echo ($info['outstand_status'] == "yes") ? "checked" : ""; ?> /> Yes</span> /
				<span><input type="checkbox" name="outstand_status" value="no" <?php echo ($info['outstand_status'] == "no") ? "checked" : ""; ?> /> No</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">STARTED BY</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 4%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">NAME:</label>
				<input type="text" name="started_name" value="<?php echo isset($info['started_name']) ? $info['started_name'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin-left: 1%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">TIME:</label>
				<input type="text" name="started_time" value="<?php echo isset($info['started_time']) ? $info['started_time'] : "" ?>" style="width: 20%;">
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label style="width: 100%; text-align: right; display: block; float: left;">INSPECTED BY</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin-left: 4%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">NAME:</label>
				<input type="text" name="inspected_name" value="<?php echo isset($info['inspected_name']) ? $info['inspected_name'] : "" ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin-left: 1%;">
				<label style="width: 25%; text-align: right; display: block; float: left;">TIME:</label>
				<input type="text" name="inspected_time" value="<?php echo isset($info['inspected_time']) ? $info['inspected_time'] : "" ?>" style="width: 20%;">
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
