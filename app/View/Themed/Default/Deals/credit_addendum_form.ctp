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
	<div id="worksheet_container" style="width:94%; margin:0 auto;">
	<style>
		body {
		margin: 0 10%;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 16px;
	}
	.cradit_fm {
		width: 60%;
		border-bottom: solid 1px #000;
		border-top: none;
		border-right: none;
		border-left: none;
		margin: 0 10px;
	}
	.cradit_fm2 {
		width: 92%;
		border-bottom: solid 1px #000;
		border-top: none;
		border-right: none;
		border-left: none;
		margin: 0 10px;
	}
	.cradit_fm3 {
		width: 10%;
		border-bottom: solid 1px #000;
		border-top: none;
		border-right: none;
		border-left: none;
		margin: 0 10px;
	}
	.cradit_fm4 {
		width: 48%;
		border-bottom: solid 1px #000;
		border-top: none;
		border-right: none;
		border-left: none;
		margin: 0 10px;
	}
	.cradit_fm5 {
		width: 6%;
		border-bottom: solid 1px #000;
		border-top: none;
		border-right: none;
		border-left: none;
		margin: 0 10px;
	}
	
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:94%!important;}
		#worksheet_wraper {width:94% !important;}
		table{padding-bottom:2px !important;margin-bottom:2px !important;}
		td{margin:0 5p !important;padding-bottom:2px !important;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:50%; padding:10px 0;">
							<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/finance_rebate.png'); ?>" alt="">
						</td>
						<td style="width:50%; padding:20px 0; text-align:center;"><strong style="font-size:24px;">CREDIT APPLICATION</strong></br>
						<b>Boat Show Addendum </b></td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:30%; padding:2px 0;"><input name="date_data"  value="<?php echo date('Y-m-d h:i:s');?>" type="text" class="cradit_fm" /></td>
						<td style="width:40%; padding:2px 0;"><input name="customer_name"  value="<?php echo isset($info["customer_name"]) ? $info['customer_name'] : $info['first_name']." ".$info['last_name'];?>" type="text" class="cradit_fm2" /></td>
						<td style="width:30%; padding:2px 0; text-align:center;"><input name="boat_show"  value="<?php echo isset($info["boat_show"]) ? $info['boat_show'] : ''?>" type="text" class="cradit_fm2" /></td>
					  </tr>
					  <tr>
						<td style="width:30%; padding:10px 0 10px 15px; font-size:15px;">DATE </td>
						<td style="width:40%; padding:10px 0 10px 45px; font-size:15px;">CUSTOMER NAME</td>
						<td style="width:30%; padding:20px 0; text-align:center;font-size:15px;">BOAT SHOW</td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px;">•	VERIFY THAT ALL INFORMATION IS FULLY COMPLETED ON BUYERS ORDER (double check for specific boat show incentives)</td>
					  </tr>
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; ">•	VERIFY DUE BILL INCLUDES ALL SECTIONS FILLED OUT ESPECIALLY DELIVERY DATE AND WHAT CUSTOMER OWES RVPS. </td>
					  </tr>
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; ">•	VERIFY COPY OF INSURANCE CARD (if they have it with them)</td>
					  </tr>
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; ">•	VERIFY COPY OF DRIVERS LICENSE</td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:10px 0; font-size:20px;">IF THERE IS A TRADE</td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; line-height:35px;">Is there a balance?    $
						  <input name="is_there_balance"   value="<?php echo isset($info["is_there_balance"]) ? $info['is_there_balance'] : ''?>"  type="text" class="cradit_fm3" />
						  How was that calculated?
						  <input name="calculated"   value="<?php echo isset($info["calculated"]) ? $info['calculated'] : ''?>"  type="text" class="cradit_fm4" />
						  Lienholder </td>
					  </tr>
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; line-height:35px;">Title to trade?  Yes
						  <input name="if_yes"   value="<?php echo isset($info["if_yes"]) ? $info['if_yes'] : ''?>"  type="text" class="cradit_fm5" />
						  No
						  <input name="if_no"   value="<?php echo isset($info["if_no"]) ? $info['if_no'] : ''?>"  type="text" class="cradit_fm5" />
						  Title to Trailer? (If applies)   Yes
						  <input name="trailer_if_yes"   value="<?php echo isset($info["trailer_if_yes"]) ? $info['trailer_if_yes'] : ''?>"  type="text" class="cradit_fm5" />
						  No
						  <input name="trailer_if_no"   value="<?php echo isset($info["trailer_if_no"]) ? $info['trailer_if_no'] : ''?>"  type="text" class="cradit_fm5" />
						  Do you have a warranty on your trade? Yes
						  <input name="warranty_if_yes"   value="<?php echo isset($info["warranty_if_yes"]) ? $info['warranty_if_yes'] : ''?>"  type="text" class="cradit_fm5" />
						  No
						  <input name="warranty_if_no"   value="<?php echo isset($info["warranty_if_no"]) ? $info['warranty_if_no'] : ''?>"  type="text" class="cradit_fm5" /></td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:10px 0; font-size:20px;">PAYMENTS</td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; line-height:35px;">Current payment; $
						  <input name="current_payment"   value="<?php echo isset($info["current_payment"]) ? $info['current_payment'] : ''?>"  type="text" class="cradit_fm3" /></td>
					  </tr>
					  <tr>
						<td style="width:100%; padding:20px 0 20px 40px; font-size:18px; line-height:35px;">Target payment;   $
						  <input name="target_payment"   value="<?php echo isset($info["target_payment"]) ? $info['target_payment'] : ''?>"  type="text" class="cradit_fm3" />
						  Up To?  $
						  <input name="up_payment"   value="<?php echo isset($info["up_payment"]) ? $info['up_payment'] : ''?>"  type="text" class="cradit_fm3" /></td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:10px 0; font-size:20px;">ADDITIONAL MONEY DOWN? $
						  <input name="additional_money_down"   value="<?php echo isset($info["additional_money_down"]) ? $info['additional_money_down'] : ''?>"  type="text" class="cradit_fm3" /></td>
					  </tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td style="width:100%; padding:10px 0; font-size:20px;">Any additional information to note?</td>
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
