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
		.title_off{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.title_off2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.title_off3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.title_off4{ width:70%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:20%;">
					<img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/motor-har.png'); ?>" alt="">
				    </td>
				    

				    <td style="width:80%;">  
				    <img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/hra_dev.png'); ?>" alt="">
				    </td>
				  </tr>
				</table>
				 
				 
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:100%; padding-left:80px; padding-top:30px;"> DATE: <?php echo date('Y-m-d'); ?></td>
				  </tr>
				</table>


				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:45%; padding-left:80px; padding-top:30px; ">  <input name="buyer_name" value="<?php echo isset($info['buyer_name']) ? $info['buyer_name'] : $info['first_name'].' '.$info['last_name']; ?>" type="text" class="title_off" /> <br/> Buyer </td>
				     <td style="width:10%; text-align:center; font-size:13px;  vertical-align:middle;"> And </td>
				      <td style="width:45%; padding-top:30px; ">  <input name="co_buyer_name" value="<?php echo isset($info['co_buyer_name']) ? $info['co_buyer_name'] : $info['spouse_first_name'].' '.$info['spouse_last_name']; ?>" type="text" class="title_off" /> <br/> Co-Buyer</td>
				  </tr>
				</table>


				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:100%; padding-left:80px; font-size:20px; padding-top:40px;"> HAVE SIGNED A PROMISSORY NOTE FOR A PURCHASE OF A </td>
				  </tr>
				  
				   <tr>
				    <td style="width:100%; padding-left:120px; font-size:20px; padding-top:40px;"> VIN# <input name="vin_data" value="<?php echo isset($info['vin_data']) ? $info['vin_data'] : $info['vin']; ?>" type="text" class="title_off" /></td>
				  </tr>
				  
				   <tr>
				    <td style="width:100%; padding-left:80px; font-size:20px; padding-top:40px;">THE FOLLOWING PARTIES ARE AWARE THAT THIS MOTORCYCLE</td>
				  </tr>
				  
				   <tr>
				    <td style="width:100%; padding-left:80px; font-size:20px; padding-top:40px;">IS BEING TITLED INTO THE FOLLOWING NAME:</td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0"  style=" padding-top:60px; ">
				  <tr>
				    <td style="width:45%; padding-left:80px; padding-top:30px; ">  <input name="buyer_name1" value="<?php echo isset($info['buyer_name1']) ? $info['buyer_name1'] : $info['first_name'].' '.$info['last_name']; ?>" type="text" class="title_off" /> <br/> Buyer </td>
				     <td style="width:10%; text-align:center; font-size:13px;  vertical-align:middle;"> And </td>
				      <td style="width:45%; padding-top:30px; ">  <input name="spouse_buyer_name1" value="<?php echo isset($info['spouse_buyer_name1']) ? $info['spouse_buyer_name1'] : $info['spouse_first_name'].' '.$info['spouse_last_name']; ?>" type="text" class="title_off" /> <br/> Co-Buyer</td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:100%;padding-left:80px;line-height:40px; padding-top:40px;"> Audrey Yoho <br/> F&I Manager <br/> Freedom Harley-Davidson <br/> audrey.yoho@freedomharley.com <br/> Phone 330-494-2453 <br/>  Fax 330-305-6578 </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:100%; padding-left:80px;line-height:25px; font-weight:600; font-size:13px; padding-top:30px;"> 7233 Sunset Strip Ave NW, North Canton, OH  44720 · (330)494-BIKE · www.freedomharley.com </td>
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
