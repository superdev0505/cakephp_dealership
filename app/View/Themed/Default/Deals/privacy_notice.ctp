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

		.privacy_notic{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.privacy_notic2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.privacy_notic3 {
			 border: solid 2px #000 !important;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    -o-appearance: none;
		    appearance: none;
		    width: 18px;
		    height: 18px; vertical-align:middle;
		    margin-right: 10px;
		}

		.privacy_notic4{ width:70%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.privacy_notic5{ width:20%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.privacy_notic6{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
		
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

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:50%; text-align:center; font-weight:normal; font-size:18px;"> 913 SOUTH 18TH ST </td>
			  </tr>
			  
			  <tr>
			    <td style="width:50%; text-align:center; font-weight:normal; font-size:18px;"> YAKIMA, WA 98901 </td>
			  </tr>
			</table>


			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:100%; text-align:center; font-weight:600; font-size:18px;"> PRIVACY NOTICE  </td>
			  </tr>
			</table>
			  
			  
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:100%; font-size:16px; line-height:25px;">In connection within this transaction with: <input  name="trasaction_data"  value="<?php echo isset($info['trasaction_data']) ? $info['trasaction_data'] :  $info['first_name']." ".$info['last_name'] ; ?>"  type="text"  class="privacy_notic6" /> 
			    <br/> we may acquire information about you as described in this notice, which we handle as stated in this notice.</td>
			  </tr>
			</table>
			   
			   
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:40px; padding-bottom:10px;">1.	We collect nonpublic personal information about you from the following sources: </td>
			    
			     <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:80px;">•	Information we receive from you on applications and other forms </td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:80px;">	•	Information about your transactions with us; and, </td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:80px;">•	Information we receive from a consumer reporting agency </td>
			  </tr>
			</table>


			   
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			  <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:40px; padding-bottom:10px;">2.	We do not disclose, nor do we reserve the right to disclose, any nonpublic personal information about our consumers, customers or former customers to anyone except as permitted by law.  We may disclose nonpublic, personal information about you, as a consumer, customer or former customer, to nonaffiliated third parties as permitted by law. </td>
			   
			</table>

			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-left:40px; padding-bottom:10px;">3.	We restrict access to your nonpublic personal information to employees who need to provide products or services to you.  We maintain electronic, physical and procedural safeguards that comply with federal regulations to guard your nonpublic personal information </td>
			   
			</table>


			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:100%; font-size:16px; line-height:25px; padding-bottom:10px;">CUSTOMER ACKNOWLEDGEMENT: I (we) acknowledge that I (we) received a copy of this notice <br /> on the date indicated below. </td>
			   
			</table>

			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="buyer_signature"  value=""  type="text"  class="privacy_notic" /> Buyer’s Signature </td>
			    
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="date_data2"  value="<?php echo date("Y-m-d h:i:s"); ?>"  type="text"  class="privacy_notic" /> Today’s Date </td>
			   
			</table>

			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="buyer_name"  value="<?php echo isset($info['buyer_name']) ? $info['buyer_name'] :  $info['first_name']." ".$info['last_name']; ?>"  type="text"  class="privacy_notic" />  Buyer’s Name (printed) </td>
			    
			    <td style="width:50%; font-size:16px; line-height:25px;">  </td>
			   
			</table>


			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="cobuyer_sig"  value="<?php echo isset($info['cobuyer_sig']) ? $info['cobuyer_sig'] :  $info['spouse_first_name']." ".$info['spouse_last_name']; ?>"  type="text"  class="privacy_notic" />  Co-buyer’s signature </td>
			    
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="date_data1"  value="<?php echo date("Y-m-d h:i:s"); ?>"  type="text"  class="privacy_notic" />  Today’s Date </td>
			   
			</table>

			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			  <tr>
			    <td style="width:50%; font-size:16px; line-height:25px;"> X <input  name="cobuyer_name"  value="<?php echo isset($info['cobuyer_name']) ? $info['cobuyer_name'] :  $info['spouse_first_name']." ".$info['spouse_last_name']; ?>"  type="text"  class="privacy_notic" />  Co-buyer’s Name (printed) </td>
			    
			    <td style="width:50%; font-size:16px; line-height:25px;">  </td>
			   
			</table>

			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; margin-bottom:20px;">
			  <tr>
			    <td style="width:100%; text-align:center;">
			    				<img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/head-img.png'); ?>" alt="">

			    </td>
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
