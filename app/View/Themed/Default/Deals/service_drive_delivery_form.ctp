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
$expectedt = date('Y-m-d H:i:s');
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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>
		
		body{ margin:0 5%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.service_nn{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
			
		.service_nn2{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.service_nn3{ width:80%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.service_nn4{border: solid 2px #000 !important;
			  -webkit-appearance: none;
			  -moz-appearance: none;
			  -o-appearance: none;
			  appearance: none;
			  width: 25px;
			  height: 25px; vertical-align:middle;
			  margin-right: 10px;}
		
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" margin-top:10px;">
			  <tr>
			    <td style="font-size:20px; color:#333; font-weight:600; padding:9px 0; text-align:center;"> Service Drive Delivery Form </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Customer Name <input name="customer_name"  value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Vehicle make/model <input name="vehicle_make_model"  value="<?php echo isset($info['vehicle_make_model']) ? $info['vehicle_make_model'] : $info['make'].",".$info['model']; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> VIN <input name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] : $info['vin']; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Stock <input name="stock_data"  value="<?php echo isset($info['stock_data']) ? $info['stock_data'] : $info['stock_num']; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Date of Delivery <input name="Date_of_Delivery"  value="<?php echo isset($info['Date_of_Delivery']) ? $info['Date_of_Delivery'] : ''; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Service Advisor <input name="Service_Advisor"  value="<?php echo isset($info['Service_Advisor']) ? $info['Service_Advisor'] : ''; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Date of Courtesy inspection: (3 month form delivery from date) <input name="Courtesy_inspection"  value="<?php echo isset($info['Courtesy_inspection']) ? $info['Courtesy_inspection'] : ''; ?>" type="text" class="service_nn2" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;">Salesperson <input name="Salesparson"  value="<?php echo isset($info['Salesparson']) ? $info['Salesparson'] : $info['sperson']; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style=" width:60%; font-size:18px; color:#333; font-weight:600; padding:9px 0;">Signature <input name="Signature"  value="<?php echo isset($info['Signature']) ? $info['Signature'] : ''; ?>" type="text" class="service_nn3" /> </td>
			     <td style=" width:40%; font-size:18px; color:#333; font-weight:600; padding:9px 0;"> Date  <input name="Date_data"  value="<?php echo isset($info['Date_data']) ? $info['Date_data'] : ''; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;">Date called <input name="Date_called"  value="<?php echo isset($info['Date_called']) ? $info['Date_called'] : ''; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; font-weight:600; padding:9px 0;">Appointment Date <input name="Appointment_Date"  value="<?php echo isset($info['Appointment_Date']) ? $info['Appointment_Date'] : ''; ?>" type="text" class="service_nn3" /> </td>
			  </tr>
			</table>

			</div>
	</div></div>
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
