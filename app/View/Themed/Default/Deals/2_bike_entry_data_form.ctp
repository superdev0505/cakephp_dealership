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

		.2_bike_entry{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.2_bike_entry2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.2_bike_entry3{ width:30%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.title_off{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.2_bike_entry4{border: solid 2px #000 !important;
		  -webkit-appearance: none;
		  -moz-appearance: none;
		  -o-appearance: none;
		  appearance: none;
		  width: 25px;
		  height: 25px; vertical-align:middle;
		  margin-right: 10px;}

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
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> N/U </td>
				    <td style="width:10%; font-size:13px; border:solid 1px #000; text-align:center; padding:3px 0;"> N </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				    <td style="width:60%; font-size:13px; background:#FF9; border:solid 1px #000; text-align:center; padding:3px 0;"> ENTER DATA IN YELLOW CALLS ALL OTHERS AUTOMATIC </td>
				  </tr>
				</table>

				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> REF# </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0;"> 0 </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; color:#F00; font-weight:600;"> PRICE ON SHEET </td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> UNIT PRICE </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="unit_price_data1" value="<?php echo isset($info['unit_price_data1']) ? $info['unit_price_data1'] : $info['unit_price']; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000; color:#F00; font-weight:600;"> <input name="unit_price_data2" value="<?php echo isset($info['unit_price_data2']) ? $info['unit_price_data2'] : $info['unit_price']; ?>" type="text" class="title_off" /></td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;"> BRING TO SALESMGR </td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;"> WARRANTY INFORMATION (USED)</td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> ACCESSORIES </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="ACCESSORIES1" value="<?php echo isset($info['ACCESSORIES1']) ? $info['ACCESSORIES1'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000; color:#F00; font-weight:600;"> <input name="ACCESSORIES2" value="<?php echo isset($info['ACCESSORIES2']) ? $info['ACCESSORIES2'] : ''; ?>" type="text" class="title_off" /></td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">1  WORKSHEET </td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">A  SOLD AS IS</td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> LABOR </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; background:#FF9; border:solid 1px #000;"> <input name="LABOR1" value="<?php echo isset($info['LABOR1']) ? $info['LABOR1'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0;background:#FF9; border:solid 1px #000; color:#F00; font-weight:600;"> <input name="LABOR2" value="<?php echo isset($info['LABOR2']) ? $info['LABOR2'] : ''; ?>" type="text" class="title_off" /> </td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">2   #REF </td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">G  SOLD WITH GUARANTEE</td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; color:#F00; font-weight:600;"> </td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">3  LICENSE</td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">W  MFG. WARR. STILL APPLIES</td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;">  </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0;"> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; color:#F00; font-weight:600;"> NADA </td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">4  NADA</td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> TRADE ALLOWANCE </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"><input name="TRADE_ALLOWANCE1" value="<?php echo isset($info['TRADE_ALLOWANCE1']) ? $info['TRADE_ALLOWANCE1'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0; background:#FF9; border:solid 1px #000; color:#F00; font-weight:600;"><input name="TRADE_ALLOWANCE2" value="<?php echo isset($info['TRADE_ALLOWANCE2']) ? $info['TRADE_ALLOWANCE2'] : ''; ?>" type="text" class="title_off" /></td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;"></td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> PAYOFF </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"><input name="PAYOFF" value="<?php echo isset($info['PAYOFF']) ? $info['PAYOFF'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:20%; font-size:13px; text-align:center; padding:3px 0;  color:#F00; font-weight:600;"> </td>
				    <td style="width:60%; font-size:13px; text-align:center; padding:3px 0;"> 
				    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				      <tr>
					<td style="width:50%; font-size:13px; text-align:center; padding:3px 0;"></td>
					 <td style="width:50%; font-size:13px; text-align:center; padding:3px 0;">  </td>
				      </tr>
				    </table>

				     </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> TAX RATE </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="TAX_RATE" value="<?php echo isset($info['TAX_RATE']) ? $info['TAX_RATE'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;">AUTOMATICALLY ENTERED AFTER THIS SHEET COMPLETED </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> DOWN PAYMENT </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="DOWN_PAYMENT" value="<?php echo isset($info['DOWN_PAYMENT']) ? $info['DOWN_PAYMENT'] : ''; ?>" type="text" class="title_off currency pricetotal" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> TOTAL </td>
				    <td style="width:10%; font-size:13px; text-align:center; font-weight:600; padding:3px 0;"> <input id="total_data" name="TOTAL_DATA" value="<?php echo isset($info['TOTAL_DATA']) ? $info['TOTAL_DATA'] : ''; ?>" type="text" class="title_off" /> </td>
				    <td style="width:30%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;">PLUS TAX EQUALS OUT-THE-DOOR>>> </td>
				     <td style="width:20%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal; font-weight:600;"> <input name="OUT_THE_DOOR" value="<?php echo isset($info['OUT_THE_DOOR']) ? $info['OUT_THE_DOOR'] : ''; ?>" type="text" class="title_off" /> </td>
				      <td style="width:30%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> FIRST </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="first_data" value="<?php echo isset($info['first_data']) ? $info['first_data'] : $info['first_name']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> LAST </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="last_data" value="<?php echo isset($info['last_data']) ? $info['last_data'] : $info['last_name']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> ADDRESS </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="addressdata1" value="<?php echo isset($info['addressdata1']) ? $info['addressdata1'] : $info['address']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> ADDRESS </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"><input name="addressdata2" value="<?php echo isset($info['addressdata2']) ? $info['addressdata2'] : $info['address']; ?>" type="text" class="title_off" /></td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> CITY </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"> <input name="city_data" value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> STATE </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"><input name="state_data" value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> ZIP </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; border:solid 1px #000;"><input name="zip_data" value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : $info['zip']; ?>" type="text" class="title_off" /></td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>


				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> SSN>> </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0;  background:#FF9; border:solid 1px #000;"> <input name="ssn_data" value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : ''; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td style="width:10%; font-size:13px; color:#F00; font-weight:600;"> COUNTY (OH)>> </td>
				    <td style="width:10%; font-size:13px; text-align:center; padding:3px 0; background:#FF9; border:solid 1px #000;"> <input name="county_data" value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : $info['county']; ?>" type="text" class="title_off" /> </td>
				    <td style="width:80%; font-size:13px; text-align:center; padding:3px 0;  color:#000; font-weight:normal;"> </td>
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
	
	
	
	function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\-]/g,"")
				  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
				  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
     }
	
	$('input.currency').on('keyup',function(){
		
		if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
		
        $(this).val(function(index, value) {
			value = value.replace(/^0+/, "");
            return convertFormatedMoney(value);
        });
	});
	$(".pricetotal").on('keyup',function(){
		
		var valdata1 = 0;
		var totalcount = 0;
		$( ".pricetotal" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			if(totalcount != "")
			{
				valdata1 = valdata1 + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);total_service_val
		
		$("#total_data").val(convertFormatedMoney(valdata1.toFixed(2)));
	});
	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
