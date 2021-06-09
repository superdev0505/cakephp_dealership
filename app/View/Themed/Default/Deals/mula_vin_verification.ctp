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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px; text-align: center;}
	th, td{padding: 2px; text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Customer Name:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 82%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Salesperson:</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 90%;">
			</div>
		</div>
		
		<table cellspacing="0" cellpadding="0" width="100%" style="float: left; border-top: 1px solid #000; margin-top: 20px;">
			<tr>
				<td style="width: 20%;">Year</td>
				<td style="width: 20%;">Make</td>
				<td style="width: 20%;">Model</td>
				<td style="width: 20%;">VIN#</td>
			</tr>
			
			<tr>
				<td><input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_id_addon1']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="vin1" value="<?php echo isset($info['vin1'])?$info['vin1']:$info['vin_addon1']; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$info['year_addon2']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:$info['make_addon2']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$info['model_id_addon2']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:$info['vin_addon2']; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year3" value="<?php echo isset($info['year3'])?$info['year3']:$info['year_addon3']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make3" value="<?php echo isset($info['make3'])?$info['make3']:$info['make_addon3']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:$info['model_id_addon3']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="vin3" value="<?php echo isset($info['vin3'])?$info['vin3']:$info['vin_addon3']; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year4" value="<?php echo isset($info['year4'])?$info['year4']:$info['year_addon4']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="make4" value="<?php echo isset($info['make4'])?$info['make4']:$info['make_addon4']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="model4" value="<?php echo isset($info['model4'])?$info['model4']:$info['model_id_addon4']; ?>" style="width: 100%;"></td>
				<td><input type="text" name="vin4" value="<?php echo isset($info['vin4'])?$info['vin4']:$info['vin_addon4']; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0px;">
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label style="float: left; width: 70%;">&nbsp;</label>
				<label style="width: 16%; float: right; text-align: center;">Initials</label>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label>All Units on this form is correct and taken to service by salesperson.</label>
				<input type="text" name="initial1" value="<?php echo isset($info['initial1'])?$info['initial1']:''; ?>" style="width: 16%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label>All paperwork in finance office matches units on this form.</label>
				<input type="text" name="initial2" value="<?php echo isset($info['initial2'])?$info['initial2']:''; ?>" style="width: 16%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label>Service has set up the correct units.</label>
				<input type="text" name="initial3" value="<?php echo isset($info['initial3'])?$info['initial3']:''; ?>" style="width: 16%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label>Customer was delivered the correct units during walk through.</label>
				<input type="text" name="initial4" value="<?php echo isset($info['initial4'])?$info['initial4']:''; ?>" style="width: 16%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
				<label>Customer has verified all VIN #s are correct.</label>
				<input type="text" name="initial5" value="<?php echo isset($info['initial5'])?$info['initial5']:''; ?>" style="width: 16%; float: right;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 20px 0; font-size: 16px;">This form stays with all paperwork and deal folder. Finance manager agrees that all statements are with an initial.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label style="display: block;">Finance Person</label>
				<input type="text" name="finance_person" value="<?php echo isset($info['finance_person'])?$info['finance_person']:''; ?>" style="width: 94%; margin-top: 16px;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label style="display: block;">Signature</label>
				<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 94%; margin-top: 16px;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label style="display: block;">Date</label>
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="width: 94%; margin-top: 16px;">
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
