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

	.delivery_re{ width:97%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.delivery_re2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

	.delivery_re3 {
		 border: solid 2px #000 !important;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    -o-appearance: none;
	    appearance: none;
	    width: 18px;
	    height: 18px; vertical-align:middle;
	    margin-right: 10px;
	}

	.delivery_re4{ width:70%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

	.delivery_re5{ width:20%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

	.delivery_re6{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
	
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
	body { margin:0px 0px; }
	#worksheet_container {width:1000px !important;margin-left:20px !important;}
	#worksheet_wraper {width:100%;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:80%; font-size:40px; font-weight:600; text-align:center;">DELIVERY REPORT </td>
     <td style="width:20%; font-size:13px;"> DATE <input  name="date_data"  value="<?php echo date('Y-m-d'); ?>"  type="text"  class="delivery_re2" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:25px;">
  <tr>
    <td style="width:45%;"> 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:5px 0;">CUSTOMER <input  name="customer_data"  value="<?php echo isset($info['customer_data']) ? $info['customer_data'] :    $info['first_name']." ".$info['last_name']; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;">ADDRESS <input  name="address1_data"  value="<?php echo isset($info['address1_data']) ? $info['address1_data'] :  $info['address']; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;"> <input  name="address2_data"  value="<?php echo isset($info['address2_data']) ? $info['address2_data'] :  ''; ?>"  type="text"  class="delivery_re" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;">PHONE <input  name="phone_data"  value="<?php echo isset($info['phone_data']) ? $info['phone_data'] :  $info['phone']; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
      
       <tr>
        <td style="padding:5px 0;">SALES PERSON <input  name="sperson_data"  value="<?php echo isset($info['sperson_data']) ? $info['sperson_data'] :  $info['sperson']; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
    </table>

    </td>
    
     <td style="width:80%; float:right;"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      
       <tr>
        <td style="padding:5px 0; font-weight:600; padding-left:40px;"> TOW VEHICLE INFO</td>
      </tr>
     
      <tr>
        <td style="padding:5px 0;">YR/MAKE <input  name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] :  ''; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;">MODEL <input  name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :  ''; ?>"  type="text"  class="delivery_re4" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;"> DELIVERY DATE/TIME <input  name="delivery_data"  value="<?php echo isset($info['delivery_data']) ? $info['delivery_data'] :  ''; ?>"  type="text"  class="delivery_re2" /></td>
      </tr>
      
      <tr>
        <td style="padding:5px 0;">HITCH <input  name="hitch_data"  value="<?php echo isset($info['hitch_data']) ? $info['hitch_data'] :  ''; ?>"  type="text"  class="delivery_re5" />  BRAKE CONTROL <input  name="payment_data"  value="<?php echo isset($info['payment_data']) ? $info['payment_data'] :  ''; ?>"  type="text"  class="delivery_re5" /></td>
      </tr>
      
       <tr>
        <td style="padding:5px 0;"> CUSTOMER PAY:HITCH  Y/N	BRAKE CONT	Y/N </td>
      </tr>
    </table>
     
       </td>
  </tr>
</table>


   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:50px;">
  <tr>
    <td style="width:25%; font-size:14px;">STOCK # <input  name="vic_stock_data"  value="<?php echo isset($info['vic_stock_data']) ? $info['vic_stock_data'] :  $info['stock_num']; ?>"  type="text"  class="delivery_re2" /></td>
     <td style="width:25%; font-size:14px;"> MAKE <input  name="vic_make_data"  value="<?php echo isset($info['vic_make_data']) ? $info['vic_make_data'] :  $info['make']; ?>"  type="text"  class="delivery_re2" /></td>
      <td style="width:25%; font-size:14px;"> MODEL <input  name="vic_model_data"  value="<?php echo isset($info['vic_model_data']) ? $info['vic_model_data'] :  $info['model']; ?>"  type="text"  class="delivery_re2" /></td>
       <td style="width:25%; font-size:14px;"> VIN #  <input  name="vic_vin_data"  value="<?php echo isset($info['vic_vin_data']) ? $info['vic_vin_data'] :  $info['vin']; ?>"  type="text"  class="delivery_re2" /></td>
  </tr>
</table>


      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:60px;">
  <tr>
    <td style="font-size:14px; border-top:solid 2px #000; border-bottom:solid 2px #000; padding:5px 0;"> DEALER INSTALLED OPTIONS: </td>
  </tr>
</table>

   
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data1"  value="<?php echo isset($info['options_data1']) ? $info['options_data1'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data2"  value="<?php echo isset($info['options_data2']) ? $info['options_data2'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data3"  value="<?php echo isset($info['options_data3']) ? $info['options_data3'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data4"  value="<?php echo isset($info['options_data4']) ? $info['options_data4'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data5"  value="<?php echo isset($info['options_data5']) ? $info['options_data5'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data6"  value="<?php echo isset($info['options_data6']) ? $info['options_data6'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data7"  value="<?php echo isset($info['options_data7']) ? $info['options_data7'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="options_data8"  value="<?php echo isset($info['options_data8']) ? $info['options_data8'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
  <tr>
    <td style="width:80%; font-size:40px; font-weight:600; text-align:center;">DELIVERY REPORT </td>
     <td style="width:20%; font-size:13px;"> DATE <input  name="delivery_report_date"  value="<?php echo date("Y-m-d"); ?>"  type="text"  class="delivery_re2" /></td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="delivery_report_1"  value="<?php echo isset($info['delivery_report_1']) ? $info['delivery_report_1'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="delivery_report_2"  value="<?php echo isset($info['delivery_report_2']) ? $info['delivery_report_2'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
  </tr>
  
   <tr>
    <td style="width:70%; font-size:14px; padding:8px 0;">  <input  name="delivery_report_3"  value="<?php echo isset($info['delivery_report_3']) ? $info['delivery_report_3'] :  ''; ?>"  type="text"  class="delivery_re" /> </td>
    <td style="width:30%; font-size:14px; padding:8px 0;">  </td>
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
