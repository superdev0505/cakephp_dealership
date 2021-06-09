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
			font-size: 13px;
		}
		.scan_inp {
			width: 50%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-right: none;
			border-left: none;
		}
		.scan_inp2 {
			width: 70%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-right: none;
			border-left: none;
		}
		.scan_inp3 {
			width: 15%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-right: none;
			border-left: none;
		}
		.scan_inp4 {
			width: 25%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-right: none;
			border-left: none;
		}
		.scan_inp5 {
			width: 90%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-right: none;
			border-left: none;
		}
		@media print
		{
			#worksheet_container{
			
				width:100% !important;
				height:50% !important;
			}
			td { font-size:10px !important;}
			
		}
		.wraper.main input{padding: 2px !important;}
		</style>

		<div class="wraper header"> 
				<div class="row">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="width:50%;">
						<img width="100%" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/fm-images.png'); ?>" alt="">
					</td>
					<td style="width:30%;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="font-family:16px; font-weight:600;">Motorsports Motorcycles, Inc.</td>
					</tr>
					<tr>
					<td style="font-family:16px; font-weight:600;">809 NE 28th Avenue</td>
					</tr>
					<tr>
					<td style="font-family:16px; font-weight:600;">HILLSBORO, OR 97124</td>
					</tr>
					<tr>
					<td style="font-family:16px; font-weight:600;">503-648-4555 / 503-640-6878 FAX</td>
					</tr>
					<tr>
					<td style="font-family:16px; font-weight:600;"><a href="www.motosporthillsboro.com/">www.motosporthillsboro.com</a></td>
					</tr>
					<tr>
					<td style="font-family:16px; font-weight:600; padding-top:10px;">Sales Person <input name="sperson_name" value="<?php echo isset($info["sperson_name"]) ? $info['sperson_name'] : $info['sperson'];?>" type="text" class="scan_inp2" /></td>
					</tr>
					</table>

					</td>
					</tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="width:60%;padding-bottom:20px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="line-height:20px;"> CUSTOMER NAME <input name="customer_name"  value="<?php echo isset($info["customer_name"]) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> ADDRESS <input  name="address_data" value="<?php echo isset($info["address_data"]) ? $info['address_data'] : $info['address'];?>" type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> CITY/STATE/ZIP <input  name="zip_data" value="<?php echo isset($info["zip_data"]) ? $info['zip_data'] : $info['city'].','.$info['state'].','.$info['zip'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr style="line-height:20px;">
					<td> EMAIL <input  name="email_data" value="<?php echo isset($info["email_data"]) ? $info['email_data'] : $info['email'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					</table>
					<td style="width:40%;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="line-height:20px;"> PHONE <input name="phone_data" value="<?php echo isset($info["phone_data"]) ? $info['phone_data'] : $info['phone'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> DRIVER'S LICENSE <input name="driver_data" value="<?php echo isset($info["driver_data"]) ? $info['driver_data'] : $info['driver_data'];?>"   type="text" class="scan_inp" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> COUNTY <input  name="county_data" value="<?php echo isset($info["county_data"]) ? $info['county_data'] : $info['county'];?>"   type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> SOURCE <input  name="source_data" value="<?php echo isset($info["source_data"]) ? $info['source_data'] : $info['source'];?>"   type="text" class="scan_inp2" /> </td>
					</tr>
					
					<tr>
						<td style="padding-top:20px; font-size:14px; font-weight:600;">
							<input  name="inside_data"  <?php echo ($info["inside_data"] == "CITY LIMIT INSIDE") ? "checked" : "";?>  type="checkbox" value="CITY LIMIT INSIDE" /> CITY LIMIT INSIDE
						
							<input  name="outside_data"  <?php echo ($info["outside_data"] == "CITY LIMIT OUTSIDE") ? "checked" : "";?>  type="checkbox" value="CITY LIMIT OUTSIDE" /> CITY LIMIT OUTSIDE
						</td>
					</tr>
					</table>

					</tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="width:50%;border:1px solid black;padding-top:20px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="text-align:center; font-size:22px; font-weight:600; padding-top:20px;"> UNIT INFORMATION</td>
					</tr>
					<tr>
					<td> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="text-align:center; padding-top:20px; font-size:14px; font-weight:600;"> 
					<input  name="new_unitdata"  <?php echo ($info["new_unitdata"] == "NEW UNIT") ? "checked" : "";?>  type="checkbox" value="NEW UNIT" /> NEW UNIT
					<input  name="owned_data"  <?php echo ($info["owned_data"] == "PRE-OWNED") ? "checked" : "";?>  type="checkbox" value="PRE-OWNED" /> PRE-OWNED</td>
					</tr>
					</table>

					</td>
					</tr>
					<tr>
					<td style="line-height:20px;"> STOCK# <input  name="stoke_data"  value="<?php echo isset($info["stoke_data"]) ? $info['stoke_data'] : $info['stock_num'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> YEAR  <input  name="year_data"  value="<?php echo isset($info["year_data"]) ? $info['year_data'] : $info['year'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MAKE  <input  name="make_data"  value="<?php echo isset($info["make_data"]) ? $info['make_data'] : $info['make'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MODEL  <input  name="model_data"  value="<?php echo isset($info["model_data"]) ? $info['model_data'] : $info['model'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> COLOR  <input  name="color_data"  value="<?php echo isset($info["color_data"]) ? $info['color_data'] : $info['color_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MILES  <input  name="miles_data"  value="<?php echo isset($info["miles_data"]) ? $info['miles_data'] : $info['miles_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> PLATES/TAGS <input  name="tages_data"  value="<?php echo isset($info["tages_data"]) ? $info['tages_data'] : $info['tages_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					</table>

					</td>
					<td style="width:50%; vertical-align:top; padding-top:30px;"> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="width:50%; vertical-align:to; border:solid 1px #ccc; height:280px;"></td>
					<td style="width:50%; vertical-align:top; font-size:20px; font-weight:600; border:solid 1px #ccc; text-align:center; height:280px;">MSRP</td>
					</tr>
					</table>

					</td>
					</tr>
					</table>


					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="width:50%;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="text-align:center; font-size:20px; font-weight:600; padding-top:20px;"> TRADE-IN</td>
					</tr>
					<tr>
					<td style="line-height:20px;"> YEAR  <input  name="year_trade_data"  value="<?php echo isset($info["year_trade_data"]) ? $info['year_trade_data'] : $info['year_trade'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MAKE  <input  name="make_trade_data"  value="<?php echo isset($info["make_trade_data"]) ? $info['make_trade_data'] : $info['make_trade'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MODEL  <input  name="model_trade_data"  value="<?php echo isset($info["model_trade_data"]) ? $info['model_trade_data'] : $info['model_trade'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> COLOR  <input  name="color_trade_data"  value="<?php echo isset($info["color_trade_data"]) ? $info['color_trade_data'] : $info['color_trade_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> MILES  <input  name="miles_trade_data"  value="<?php echo isset($info["miles_trade_data"]) ? $info['miles_trade_data'] : $info['miles_trade_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style=""> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td> </td>
					<td style="padding-top:20px; padding-bottom:20px;"> LEIN 
					<input   name="lein_data"  <?php echo ($info["lein_data"] == "LEIN") ? "checked" : "";?> value="LEIN" type="checkbox" /></td>
					<td style="padding-top:20px; padding-bottom:20px;">TITEL-IN-HAND
					<input   name="titel_hand"  <?php echo ($info["titel_hand"] == "TITEL-IN-HAND") ? "checked" : "";?>  value="TITEL-IN-HAND"  type="checkbox"/></td>
					<td style="padding-top:20px; padding-bottom:20px;">TITEL-LOSS 
					<input    name="title_loss" <?php echo ($info["title_loss"] == "TITEL-LOSS") ? "checked" : "";?>  value="TITEL-LOSS"  type="checkbox" /></td>
					</tr>
					</table>

					</td>

					<tr>
					<td style="line-height:20px;"> LEIN HOLDER  <input  name="lein_holder_data"  value="<?php echo isset($info["lein_holder_data"]) ? $info['lein_holder_data'] : $info['lein_holder_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>

					<tr>
					<td style="line-height:20px;"> AMOUNT OWED  <input  name="amount_owed"  value="<?php echo isset($info["amount_owed"]) ? $info['amount_owed'] : $info['amount_owed'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>

					<tr>
					<td style="line-height:20px;"> TRADE ALLOWANCE  <input  name="trade_allowance"  value="<?php echo isset($info["trade_allowance"]) ? $info['trade_allowance'] : $info['trade_allowance'];?>"  type="text" class="scan_inp2" style="width:200px !important;" /> </td>
					</tr>
					<tr>
					<td style="line-height:20px;"> DSRP <input  name="dsrp_data"  value="<?php echo isset($info["dsrp_data"]) ? $info['dsrp_data'] : $info['dsrp_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					</tr>
					</table>

					</td>
					<td style="width:50%;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="text-align:center; font-size:20px; font-weight:600; padding-top:20px;"> METHOD OF PAYMENT</td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> FINANCE <input value="FINANCE" name="finance_data"  <?php echo ($info["finance_data"] == "FINANCE") ? "checked" :"";?>  type="checkbox"  /></td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> CASH <input value="CASH" name="cash_data"  <?php echo ($info["cash_data"] == "CASH") ? "checked" : "";?>  type="checkbox"  /></td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> CHECK <input value="CHECK"  name="check_data"  <?php echo ($info["check_data"] == "CHECK") ? "checked": "";?>  type="checkbox"  /></td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> VISA/MASTER CARD/AMEX <input value="VISA/MASTER CARD/AMEX" name="card_data"  <?php echo ($info["card_data"] == "VISA/MASTER CARD/AMEX") ? "checked" : "" ;?>  type="checkbox"  /></td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> 2% CREDIT CARD FEES <input value="2cc" name="card_fees_data"  <?php echo ($info["card_fees_data"] == "2cc") ? "checked" : "" ;?>  type="checkbox"  /></td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> ACCESSORIES <input  name="accessories_data"  value="<?php echo isset($info["accessories_data"]) ? $info['accessories_data'] : $info['accessories_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> DOWN PAYMENT <input  name="downpayment_data"  value="<?php echo isset($info["downpayment_data"]) ? $info['downpayment_data'] : $info['downpayment_data'];?>"  type="text" class="scan_inp2" /> </td>
					</tr>
					<tr>
					<td style="padding-top:10px; padding-bottom:10px;"> DESIRED PAYMENT <input  name="desired_data"  value="<?php echo isset($info["desired_data"]) ? $info['desired_data'] : $info['desired_data'];?>"  type="text" class="scan_inp2"  style="width:200px !important;" /> </td>
					</tr>
					</table>

					</td>
					</tr>
					</table>

					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td style="line-height:20px; font-weight:600; padding-top:20px;"> CUSTOMER SIGNATURE<input  name="county_data"  value="<?php echo isset($info["county_data"]) ? $info['county_data'] : $info['county_data'];?>"  type="text" class="scan_inp" /> </td>
					<td style="line-height:20px; font-weight:600; padding-top:20px;"> DATE <input  name="county_data"  value="<?php echo isset($info["county_data"]) ? $info['county_data'] : $info['county_data'];?>"  type="text" class="scan_inp" /> </td>
					</tr>
					</table>
				</div>
		</div>
	</div>
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
