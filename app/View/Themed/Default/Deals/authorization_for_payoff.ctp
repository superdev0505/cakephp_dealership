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

		.Authorization{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.Authorization2{ width:20%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.Authorization3 {
			 border: solid 2px #000 !important;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    -o-appearance: none;
		    appearance: none;
		    width: 18px;
		    height: 18px; vertical-align:middle;
		    margin-right: 10px;
		}

		.Authorization4{ width:65%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.Authorization5{ width:80%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.Authorization6{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
		
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}

		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; text-align:center;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/head-img.png'); ?>" alt="">
				</td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
			  <tr>
			    <td style="width:50%; text-align:center; font-weight:600; font-style:italic; font-size:18px;"> MAKING MEMORIES THAT LAST A LIFETIME </td>
			  </tr>
			  </table>


			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:50%; text-align:center; font-weight:normal; font-size:16px;"> AUTHORIZATION FOR PAYOFF</td>
			  </tr>
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:30%; font-weight:normal; font-size:16px;"> Date <input name="date_data"  value="<?php echo date("Y-m-d h:i:s"); ?>"  type="text"   class="Authorization5" /> </td>
			    <td style="width:70%; font-weight:normal; font-size:16px;"> Lien Holder:  <input name="lien_holder"  value="<?php echo isset($info['lien_holder']) ? $info['lien_holder'] :  $info['first_name']." ".$info['last_name']; ?>"  type="text"   class="Authorization5" /></td>
			  </tr>
			  </table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px;"> Address: <input name="address_data"  value="<?php echo isset($info['address_data']) ? $info['address_data'] :  $info['city'].','.$info['state'].','.$info['zip']; ?>"  type="text"   class="Authorization6" /> </td>
			  </tr>
			  
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px; padding-top:20px;"> I <input name="i_data"  value="<?php echo isset($info['i_data']) ? $info['i_data'] :  $info['first_name']." ".$info['last_name']; ?>"  type="text"   class="Authorization4" /> herby authorize you to accept the enclosed </td>
			  </tr>
			  
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px; padding-top:20px;"> Payment from Central Washington RV, INC </td>
			  </tr>
			  
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px; line-height:30px; padding-top:20px;">$ <input name="payment_data"  value="<?php echo isset($info['payment_data']) ? $info['payment_data'] :  ''; ?>"  type="text"   class="Authorization2" /> being the balance due on my account and you are instructed, upon receipt of this payment, to surrender the documents of title, properly endorsed & released. You are further instructed to cancel my insurance policy and to pay the unearned insurance premium, interest and brokerage to the company named above.</td>
			  </tr>
			  
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:100%; font-weight:600; font-size:16px;"> VEHICLE FOR PAYOFF:  </td>
			  </tr>
			  </table>
			  
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:20%; font-weight:normal; font-size:16px;"> Year:   <input name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] :  $info['year']; ?>"  type="text"   class="Authorization4" /> </td>
			     <td style="width:30%; font-weight:normal; font-size:16px;"> Make:  <input name="make_data"  value="<?php echo isset($info['make_data']) ? $info['make_data'] :   $info['make']; ?>"  type="text"   class="Authorization5" /> </td>
			      <td style="width:50%; font-weight:normal; font-size:16px;"> Model:  <input name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :   $info['model']; ?>"  type="text"   class="Authorization5" /> </td>
			  </tr>
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px;"> Vin:   <input name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] :   $info['vin']; ?>"  type="text"   class="Authorization" /> </td>
			  </tr>
			  </table>
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px; line-height:30px;"> Customer acknowledges and understands that the above payoff is an estimate only until Central Washington RV obtains a 10 day payoff from the lender.  Customer also understands that any amount more than estimate will be paid by customer to Central Washington RV, when requested. Any amount less will be paid back to customer </td>
			  </tr>
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:50%; font-weight:normal; font-size:16px; line-height:30px;"> Name: <input name="name1_data"  value="<?php echo isset($info['name1_data']) ? $info['name1_data'] :  ''; ?>"  type="text"   class="Authorization5" /> </td>
			     <td style="width:50%; font-weight:normal; font-size:16px; line-height:30px;"> Signature: <input name="sig1_data"  value="<?php echo isset($info['sig1_data']) ? $info['sig1_data'] :  ''; ?>"  type="text"   class="Authorization5" /> </td>
			  </tr>
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:50%; font-weight:normal; font-size:16px; line-height:30px;"> Name: <input name="name2_data"  value="<?php echo isset($info['name2_data']) ? $info['name2_data'] :  ''; ?>"  type="text"   class="Authorization5" /> </td>
			     <td style="width:50%; font-weight:normal; font-size:16px; line-height:30px;"> Signature: <input name="sig2_data"  value="<?php echo isset($info['sig2_data']) ? $info['sig2_data'] :  ''; ?>"  type="text"   class="Authorization5" /> </td>
			  </tr>
			  </table>
			  
			    
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:100%; font-weight:600; font-size:16px;"> VERIFIED PAYOFF: </td>
			  </tr>
			  </table>
			  
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:40%; font-weight:normal; font-size:16px;"> Lender:    <input name="lender_data"  value="<?php echo isset($info['lender_data']) ? $info['lender_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			     <td style="width:60%; font-weight:normal; font-size:16px;"> Physical Address:   <input name="p_address"  value="<?php echo isset($info['p_address']) ? $info['p_address'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			  </tr>
			  </table>
			  
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:30%; font-weight:normal; font-size:16px;"> Country:    <input name="country_data"  value="<?php echo isset($info['country_data']) ? $info['country_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			     <td style="width:25%; font-weight:normal; font-size:16px;"> State:   <input name="state_data"  value="<?php echo isset($info['state_data']) ? $info['state_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			      <td style="width:20%; font-weight:normal; font-size:16px;"> Zip:   <input name="zip_data"  value="<?php echo isset($info['zip_data']) ? $info['zip_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			       <td style="width:25%; font-weight:normal; font-size:16px;"> Phone:   <input name="phone_data"  value="<?php echo isset($info['phone_data']) ? $info['phone_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			  </tr>
			  </table>
			  
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:40%; font-weight:normal; font-size:16px;"> Account#   <input name="account_data"  value="<?php echo isset($info['account_data']) ? $info['account_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			     <td style="width:35%; font-weight:normal; font-size:16px;"> Payoff $    <input name="payoff_data"  value="<?php echo isset($info['payoff_data']) ? $info['payoff_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			      <td style="width:25%; font-weight:normal; font-size:16px;"> Per Diem:    <input name="perdiem_data"  value="<?php echo isset($info['perdiem_data']) ? $info['perdiem_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			  </tr>
			  </table>
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
			  <tr>
			    <td style="width:35%; font-weight:normal; font-size:16px;"> Good Until:   <input name="gooduntil_data"  value="<?php echo isset($info['gooduntil_data']) ? $info['gooduntil_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			     <td style="width:35%; font-weight:normal; font-size:16px;"> Spoke To:  <input name="spoke_data"  value="<?php echo isset($info['spoke_data']) ? $info['spoke_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			      <td style="width:30%; font-weight:normal; font-size:16px;"> Verified By:   <input name="verified_data"  value="<?php echo isset($info['verified_data']) ? $info['verified_data'] :  ''; ?>"  type="text"   class="Authorization4" /> </td>
			  </tr>
			  </table>
			  
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px; margin-bottom:30px;">
			  <tr>
			    <td style="width:100%; font-weight:normal; font-size:16px;"> Verified Signature:  <input name="v_signature"  value="<?php echo isset($info['v_signature']) ? $info['v_signature'] :  ''; ?>"  type="text"   class="Authorization5" /> </td>
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
