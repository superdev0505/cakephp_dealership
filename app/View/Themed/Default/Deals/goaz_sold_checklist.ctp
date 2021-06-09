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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:30px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
	ul.point_list{list-style-type:square!important;}		
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellpadding="4">
                <tr>
                
                
                <td colspan="4" align="center" valign="middle">
                <h4 style="text-decoration:underline; line-height:30px;margin-bottom:15px;"><b>Sales Unit Just-Sold Checklist</b></h4>
                
                </td>
                </tr>
                </table>
                <br/><br/>
                
                <table width="100%">
                <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Date: <input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width:20%;" /></label>
                     <br/><br/>
                     
                </td>
                                
                </tr>
                
                <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Salesperson requesting just-sold: <input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Time when checked in: <input type="text" name="time_checked_in" value="<?php echo isset($info['time_checked_in'])?$info['time_checked_in']:''; ?>" style="width:50%;" />AM/PM</label>
                </td>                
                </tr>
                <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Estimated time of completeion: <input type="text" name="time_of_completion" value="<?php echo isset($info['time_of_completion'])?$info['time_of_completion']:''; ?>" style="width:50%;" />AM/PM</label>
                </td>                
                </tr>
                
                <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Service writer: <input type="text" name="service_writer" value="<?php echo isset($info['service_writer'])?$info['service_writer']:''; ?>" style="width:50%;" /></label><br/><br/>
                </td>                
                </tr>
                
                <tr>
                <td>
                	 <label style="width:100%; display:inline;"> Stock #: <input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Vin Number: <input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Year: <input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Make: <input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Model: <input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Mileage: <input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width:50%;" /></label><br/><br/>
                </td>                
                </tr>
                <tr>
                <td><label>Check mark or notes below</label><br/><br/></td>
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Recalls / Open RO #	: <input type="text" name="open_ro" value="<?php echo isset($info['open_ro'])?$info['open_ro']:''; ?>" style="width:50%;" /></label>
                </td>                
                </tr>
                <tr>
                <td>
                	 <label style="width:100%; display:inline;">Gas / tire pressure check	: <input type="text" name="tire_pressure" value="<?php echo isset($info['tire_pressure'])?$info['tire_pressure']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                
                <tr>
                <td>
                	 <label style="width:100%; display:inline;">Wash & clean	: <input type="text" name="wash_clean" value="<?php echo isset($info['wash_clean'])?$info['wash_clean']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Battery leads	: <input type="text" name="battery_leads" value="<?php echo isset($info['battery_leads'])?$info['battery_leads']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Emissions	: <input type="text" name="emissions" value="<?php echo isset($info['emissions'])?$info['emissions']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">UVC (used units): <input type="text" name="uvc" value="<?php echo isset($info['uvc'])?$info['uvc']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Appraisal completed: <input type="text" name="appraisal" value="<?php echo isset($info['appraisal'])?$info['appraisal']:''; ?>" style="width:10%;" /></label>
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Signal safety check: <input type="text" name="signal_safety" value="<?php echo isset($info['signal_safety'])?$info['signal_safety']:''; ?>" style="width:10%;" /></label><br/><br/>
                     
                     
                </td>                
                </tr>
                
                 <tr>
                <td>
                	 <label style="width:100%; display:inline;">Recommended service needed: <textarea name="recommend_service" rows="5" style="width:60%;"><?php echo isset($info['recommend_service'])?$info['recommend_service']:''; ?></textarea></label>
                     
                     
                </td>                
                </tr>
                
                
                
                </table>
              
                
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
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
