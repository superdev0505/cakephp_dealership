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
body {
	margin: 0 7%;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.fmrs_inp {
	width: 50%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
}
.fmrs_inp2 {
	width: 70%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
}
.fmrs_inp3 {
	width: 15%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
}
.fmrs_inp4 {
	width: 25%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
}
.fmrs_inp5 {
	width: 90%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="70%" border="0" cellspacing="0" cellpadding="0" style="float:left;">
  <tr>
    <td style="font-size:20px; color:#000; font-weight:600;">TRADE EVALUATION <span style="font-size:14px; font-weight:normal; padding-left:10px;">Salesperson
      <input name="sales_person"  value="<?php echo isset($info['sales_person']) ? $info['sales_person'] : $info['sperson']; ?>"   type="text" class="fmrs_inp" />
      </span></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Customer Name:
      <input name="custom_name"  value="<?php echo isset($info['custom_name']) ? $info['custom_name'] : $info['first_name']."".$info['last_name']; ?>"   type="text" class="fmrs_inp2" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Unit Buying:
      <input name="unit_buying"  value="<?php echo isset($info['unit_buying']) ? $info['unit_buying'] : $info['condition'].",".$info['year'].','.$info['make'].','.$info['model']; ?>"   type="text" class="fmrs_inp2" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Year:
      <input name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] : $info['year_trade']; ?>"   type="text" class="fmrs_inp3" />
      Make:
      <input name="make_data"  value="<?php echo isset($info['make_data']) ? $info['make_data'] : $info['make_trade']; ?>"   type="text" class="fmrs_inp4" />
      Model:
      <input name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] : $info['model_trade']; ?>"   type="text" class="fmrs_inp4" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Hours / Miles:
      <input name="miles_data"  value="<?php echo isset($info['miles_data']) ? $info['miles_data'] : $info['odometer_trade']; ?>"   type="text" class="fmrs_inp3" />
      VIN:
      <input name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] : $info['vin_trade']; ?>"   type="text" class="fmrs_inp" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Color:
      <input name="color_data"  value="<?php echo isset($info['color_data']) ? $info['color_data'] : $info['usedunit_color']; ?>"   type="text" class="fmrs_inp3" />
      Options:
      <input name="option_data"  value="<?php echo isset($info['option_data']) ? $info['option_data'] : "" ?>"   type="text" class="fmrs_inp" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">License Plate:
      <input name="license_plate"  value="<?php echo isset($info['license_plate']) ? $info['license_plate'] : "" ?>"   type="text" class="fmrs_inp3" />
      Expires:
      <input name="expires"  value="<?php echo isset($info['expires']) ? $info['expires'] : "" ?>"   type="text" class="fmrs_inp4" />
      State:
      <input name="state_data"  value="<?php echo isset($info['state_data']) ? $info['state_data'] : "" ?>"   type="text" class="fmrs_inp4" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Engine Serial Number:
      <input name="eng_serial_number"  value="<?php echo isset($info['eng_serial_number']) ? $info['eng_serial_number'] : "" ?>"   type="text" class="fmrs_inp2" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:normal; padding-top:20px;">Misc. Comments:
      <input name="misc_comments"  value="<?php echo isset($info['misc_comments']) ? $info['misc_comments'] : "" ?>"   type="text" class="fmrs_inp2" /></td>
  </tr>
</table>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:14px; color:#000; font-weight:600; padding-top:10px;">PRICING INFORMATION</td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">HIGH RETAIL (BOATS) </td>
      <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">   $
      <input name="high_retail"  value="<?php echo isset($info['high_retail']) ? $info['high_retail'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">AVERAGE RETAIL </td>
      <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;"> $
      <input name="average_retail"  value="<?php echo isset($info['average_retail']) ? $info['average_retail'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">CLEAN TRADE </td>
      <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">  $
      <input name="clean_trade"  value="<?php echo isset($info['clean_trade']) ? $info['clean_trade'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">USED TRADE (BOATS)</td>
      <td style="font-size:14px;  width:50%; width:50%; color:#000; font-weight:600; padding-top:15px;"> $
      <input name="used_trade"  value="<?php echo isset($info['used_trade']) ? $info['used_trade'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">ROUGH TRADE </td>
      <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">  $
      <input name="rough_trade"  value="<?php echo isset($info['rough_trade']) ? $info['rough_trade'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; width:50%; font-weight:600; padding-top:15px;">A.C.V. </td>
       <td style="font-size:14px; color:#000;  width:50%; font-weight:600; padding-top:15px;"> $
      <input name="acv"  value="<?php echo isset($info['acv']) ? $info['acv'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;">LESS RECON.</td>
       <td style="font-size:14px; width:50%; color:#000; font-weight:600; padding-top:15px;"> $
      <input name="less_recon"  value="<?php echo isset($info['less_recon']) ? $info['less_recon'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-weight:600; padding-top:15px;">ADJUSTED A.C.V. </td>
      <td style="font-size:14px; color:#000; font-weight:600; padding-top:15px;"> $
      <input name="adjusted_acv"  value="<?php echo isset($info['adjusted_acv']) ? $info['adjusted_acv'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:20px; color:#000; font-weight:600; padding-top:25px;">SIGHT UNSEEN</td>
    <td style="font-size:20px; color:#000; font-weight:600; text-align:center; padding-top:25px;">PICTURE ENCLOSED?</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:20px; color:#000; font-weight:normal; padding:25px 0;">On a scale of 1 - 5 with one being the worst and 5 being the best, rate the following </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:5%; color:#000; font-weight:600; font-style:italic; padding:5px 0;"> Exterior</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 1 </td>
     <td style="font-size:15px; width:10%; color:#000; font-weight:normal;padding:5px 0 5px 50px;"> 2 </td>
      <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 3 </td>
       <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 4 </td>
        <td style="font-size:15px; width:60%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 5 </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; color:#000; font-weight:normal; padding:5px 0;"> Explain
      <input name="explain_exterior"  value="<?php echo isset($info['explain_exterior']) ? $info['explain_exterior'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:5%; color:#000; font-weight:600; font-style:italic; padding:10px 0 5px 0;"> Interior</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 1 </td>
     <td style="font-size:15px; width:10%; color:#000; font-weight:normal;padding:5px 0 5px 50px;"> 2 </td>
      <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 3 </td>
       <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 4 </td>
        <td style="font-size:15px; width:60%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 5 </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; color:#000; font-weight:normal; padding:5px 0;">Explain
      <input name="explain_interior"  value="<?php echo isset($info['explain_interior']) ? $info['explain_interior'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:5%; color:#000; font-weight:600; font-style:italic ;padding:10px 0 5px 0;"> Mechanical</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 1 </td>
     <td style="font-size:15px; width:10%; color:#000; font-weight:normal;padding:5px 0 5px 50px;"> 2 </td>
      <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 3 </td>
       <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 4 </td>
        <td style="font-size:15px; width:60%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 5 </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; color:#000; font-weight:normal; padding:5px 0;"> Explain
      <input name="explain_mechanical"  value="<?php echo isset($info['explain_mechanical']) ? $info['explain_mechanical'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:5%; color:#000; font-weight:600; font-style:italic; padding:10px 0 5px 0;"> Tires</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 1 </td>
     <td style="font-size:15px; width:10%; color:#000; font-weight:normal;padding:5px 0 5px 50px;"> 2 </td>
      <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 3 </td>
       <td style="font-size:15px; width:10%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 4 </td>
        <td style="font-size:15px; width:60%; color:#000; font-weight:normal; padding:5px 0 5px 50px;"> 5 </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:15px; color:#000; font-weight:normal; padding:5px 0;"> Explain
      <input name="explain_tires"  value="<?php echo isset($info['explain_tires']) ? $info['explain_tires'] : "" ?>"   type="text" class="fmrs_inp5" /></td>
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
