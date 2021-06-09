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

		.warranty{ width:50%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.warranty2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
			body { margin:0px 0px; }
			#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
			  <tr>
			    <td style="width:100%; text-align:center;"> 
			    <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/hade.png'); ?>" alt="">
			    </td>
			  </tr>
			  </table>
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:100%; text-align:center; font-size:20px; font-weight:600;">PLEASE DO NOT SIT UPON AS THIS UNIT HAS BEEN SOLD </td>
			  </tr>
			  </table>
			  
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:60%; font-size:16px; font-weight:600; padding:5px 0;"> </td>
			    <td style="width:40%; font-size:16px; font-weight:normal; padding:5px 0;">YEAR : <input name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] :  $info['year']; ?>" type="text" class="warranty" /> </td>
			  </tr>
			  
			  <tr>
			    <td style="width:60%; font-size:16px; font-weight:600; padding:5px 0;"> </td>
			    <td style="width:40%; font-size:16px; font-weight:normal; padding:5px 0;">MODEL : <input name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :   $info['model']; ?>" type="text" class="warranty" />  </td>
			  </tr>
			  
			  <tr>
			    <td style="width:60%; font-size:16px; font-weight:600; padding:5px 0;"> </td>
			    <td style="width:40%; font-size:16px; font-weight:normal; padding:5px 0;"> VIN : <input name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] :   $info['vin']; ?>" type="text" class="warranty" />  </td>
			  </tr>
			  
			  <tr>
			    <td style="width:60%; font-size:16px; font-weight:600; padding:5px 0;"> </td>
			    <td style="width:40%; font-size:16px; font-weight:normal; padding:5px 0;"> COLOR : <input name="color_data"  value="<?php echo isset($info['color_data']) ? $info['color_data'] :  ''; ?>" type="text" class="warranty" />  </td>
			  </tr>
			  </table>

			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:100%; font-size:30px; font-weight:600;"> To : <?php echo $info['first_name'].' '.$info['last_name']; ?></td>
			  </tr>
			  </table>
			  
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:50%; font-size:16px; font-weight:normal;"> SALES PROFESSIONAL : <input name="sperson_data"  value="<?php echo isset($info['sperson_data']) ? $info['sperson_data'] :  $info['sperson']; ?>" type="text" class="warranty" /></td>
			    <td style="width:50%; font-size:16px; font-weight:normal; line-height:30px;"> Date: <br/> <?php echo date('Y-m-d'); ?>  <br/> Date Bike is Leaving <br/> <input name="leaving_data" value="<?php echo isset($info['leaving_data']) ? $info['leaving_data'] :  ''; ?>" type="text" class="warranty2" /></td>
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
