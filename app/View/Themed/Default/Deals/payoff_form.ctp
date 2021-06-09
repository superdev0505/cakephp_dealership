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

			.payoff{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

			.payoff2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

			.payoff3{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

			.payoff4{ width:70%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

			@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
				body { margin:0px 0px; }
				#worksheet_container {width:900px !important;margin-left:20px !important;}
				#worksheet_wraper {width:100%;}
			}
	</style>
	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
			     <tr>
			     <td style="width:70%;">
			  
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
			      <tr>
				<td style="font-size:30px; font-weight:600;">Freedom Harley-Davidson, Inc.</td>
			      </tr>
			      
			       <tr>
				<td style="font-size:20px; font-weight:normal;">7233 Sunset Strip Ave NW ● North Canton, OH  44720</td>
			      </tr>
			    </table>

			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="font-size:16px; "> Date: <?php echo date("Y-m-d"); ?></td>
			      </tr>
			    </table>

			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="font-size:16px; line-height:35px;">I <input  name="understand_data"  value="<?php echo isset($info['understand_data']) ? $info['understand_data'] :  ''; ?>" type="text"  class="payoff3" /> do hereby authorize <br/> 
				Freedom Harley-Davidson, Inc. to make payoff on the following vehicle:</td>
			      </tr>
			    </table>
			    
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="font-size:16px; width:50%; padding:8px 0; font-weight:600;"> YEAR: <input  name="year_data"  value="<?php echo isset($info['year_data']) ? $info['year_data'] :  $info['year']; ?>" type="text"  class="payoff4" /></td>
				<td style="font-size:16px; width:50%;">  </td>
			      </tr>
			      
			       <tr>
				<td style="font-size:16px; width:50%; padding:8px 0; font-weight:600;"> MAKE : <input  name="make_data"  value="<?php echo isset($info['make_data']) ? $info['make_data'] :  $info['make']; ?>" type="text"  class="payoff3" /></td>
				<td style="font-size:16px; width:50%; font-weight:600;"> MODEL <input  name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :  $info['model']; ?>" type="text"  class="payoff3" /> </td>
			      </tr>
			      
			       <tr>
				<td style="font-size:16px; width:50%; padding:8px 0; font-weight:600;"> Vin: <input  name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] :  $info['vin']; ?>" type="text"  class="payoff4" /></td>
				<td style="font-size:16px; width:50%;">  </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">Balance due: <input  name="balance_due"  value="<?php echo isset($info['balance_due']) ? $info['balance_due'] :  ''; ?>" type="text"  class="payoff4" /> </td>
				 <td style="width:30%; font-size:16px; text-align:right;"> Payoff good through: </td>
				  <td style="width:37%; font-size:16px;"> <input  name="Payoff_good_through"  value="<?php echo isset($info['Payoff_good_through']) ? $info['Payoff_good_through'] :  ''; ?>" type="text"  class="payoff4" /> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:30%; font-size:17px; text-align:right;"> Per Diem Amount </td>
				  <td style="width:37%; font-size:16px;"> <input  name="Par_Diem_Amount"  value="<?php echo isset($info['Par_Diem_Amount']) ? $info['Par_Diem_Amount'] :  ''; ?>" type="text"  class="payoff4" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:30%; font-size:20px; text-align:right;"> Payoff quoted by </td>
				  <td style="width:37%; font-size:16px;"><input  name="Payoff_quoted_by"  value="<?php echo isset($info['Payoff_quoted_by']) ? $info['Payoff_quoted_by'] :  ''; ?>" type="text"  class="payoff4" />  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:30%; font-size:20px; text-align:right;"> Phone # </td>
				  <td style="width:37%; font-size:16px;">  <input  name="phone_data"  value="<?php echo isset($info['phone_data']) ? $info['phone_data'] :  ''; ?>" type="text"  class="payoff4" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:30%; font-size:20px; text-align:right;"> DATE FAX or EMAIL Received   </td>
				  <td style="width:37%; font-size:16px;"> <input  name="DATE_FAX"  value="<?php echo isset($info['DATE_FAX']) ? $info['DATE_FAX'] :  ''; ?>" type="text"  class="payoff4" /> </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;"> Financial Institution: </td>
				 <td style="width:56%; font-size:18px;"><input  name="Financial_Institution1"  value="<?php echo isset($info['Financial_Institution1']) ? $info['Financial_Institution1'] :  ''; ?>" type="text"  class="payoff" /> </td>
				  <td style="width:10%; font-size:16px;"> </td>
			      </tr>
			    </table>
			    
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:56%; font-size:18px;"><input  name="Financial_Institution2"  value="<?php echo isset($info['Financial_Institution2']) ? $info['Financial_Institution2'] :  ''; ?>" type="text"  class="payoff" /> </td>
				  <td style="width:10%; font-size:16px;"> </td>
			      </tr>
			    </table>
			    
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:56%; font-size:18px;"><input  name="Financial_Institution3"  value="<?php echo isset($info['Financial_Institution3']) ? $info['Financial_Institution3'] :  ''; ?>" type="text"  class="payoff" /> </td>
				  <td style="width:10%; font-size:16px;"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:33%; font-size:16px;">  </td>
				 <td style="width:56%; font-size:18px;">  <input  name="Financial_Institution4"  value="<?php echo isset($info['Financial_Institution4']) ? $info['Financial_Institution4'] :  ''; ?>" type="text"  class="payoff4" /> </td>
				  <td style="width:10%; font-size:16px;"> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:100%; font-size:18px;"> The above-named financial institution is authorized to deliver the free and clear title being held in connection  with above account    </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:50%; font-size:16px; text-align:center; padding:10px 0;"> <input  name="Authorized"  value="<?php echo isset($info['Authorized']) ? $info['Authorized'] :  ''; ?>" type="text"  class="payoff4" /><br/> Authorized </td>
				 <td style="width:50%; font-size:18px; text-align:center; padding:10px 0;">  <input  name="SSN_Account_Number"  value="<?php echo isset($info['SSN_Account_Number']) ? $info['SSN_Account_Number'] :  ''; ?>" type="text"  class="payoff4" /> <br/>SSN or Account Number  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px; border:solid 1px #000;">
			      <tr>
				<td style="width:100%; font-size:28px; text-align:center; line-height:35px;"> ATTENTION FINANCIAL INSTITUTION:<br/>
			PLEASE FORWARD TITLE TO:<br/>

			FREEDOM HARLEY DAVIDSON, INC.<br/>
			ATTN: TITLE DEPARTMENT<br/>
			7233 SUNSET STRIP AVE. NW<br/>
			NORTH CANTON, OH 44720-7038<br/>
			    </td>
			      </tr>
			    </table>
			     </td>
			     
			     <!--
			     <td style="width:80%; float:left; padding-top:90px;">
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> AMOUNT </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="AMOUNT"  value="<?php //echo isset($info['AMOUNT']) ? $info['AMOUNT'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> GOOD THROUGH </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="GOOD_THROUGH"  value="<?php //echo isset($info['GOOD_THROUGH']) ? $info['GOOD_THROUGH'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> PER DIEM </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="PER_DIEM"  value="<?php //echo isset($info['PER_DIEM']) ? $info['PER_DIEM'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> QUOTE BY </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="QUOTE_BY"  value="<?php //echo isset($info['QUOTE_BY']) ? $info['QUOTE_BY'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> STANDARD FROM TABLE BELOW </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="STANDARD_FROM_TABLE_BELOW"  value="<?php //echo isset($info['STANDARD_FROM_TABLE_BELOW']) ? $info['STANDARD_FROM_TABLE_BELOW'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;">. </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;">
				<input  name="customer_input_data"  value="<?php //echo isset($info['customer_input_data']) ? $info['customer_input_data'] :  ''; ?>" type="text"  class="payoff4" />
				</td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;"> Name </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"><input  name="Name_data"  value="<?php //echo isset($info['Name_data']) ? $info['Name_data'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;">ADDRESS </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="ADDRESS_data"  value="<?php //echo isset($info['ADDRESS_data']) ? $info['ADDRESS_data'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;">CITY/Zip </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="CITY_Zip_data"  value="<?php //echo isset($info['CITY_Zip_data']) ? $info['CITY_Zip_data'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:13px; text-align:right; padding:5px 5px;">Phone </td>
				<td style="width:60%; background:#ccc; border:solid 1px #000;"> <input  name="Phone_data"  value="<?php //echo isset($info['Phone_data']) ? $info['Phone_data'] :  ''; ?>" type="text"  class="payoff4" /></td>
			      </tr>
			    </table>
			    
			   
			     
			     </td>-->
			   
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
