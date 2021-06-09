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
body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:solid 1px #ccc;}

.delivary_inp{ width:70%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.delivary_inp2{ width:60%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.delivary_inp3{ width:55%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.delivary_inp4{ width:30%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
		#worksheet_container{
						width:1200px; !important;
				}
		table{
			margin-bottom:2px !important;
		}
		table td{
			font-size:10px !important;
		}
		}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td style="width:100%; padding:5px 0;">
				<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logoimage.png'); ?>" alt="">
				</td>
			  </tr>
			</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:25%; color:#000; font-size:18px;"><strong style="font-style:italic;">Corporate Office</strong>
					<p style="margin:0; padding:5px 0;">3399 S Service Dr</p>
					<p style="margin:0; padding:5px 0;">Red Wing, MN 55066</p>
					<p style="margin:0; padding:5px 0;">651.388.7000</p>
					</td>
					
					 <td style="width:25%; color:#000; font-size:18px;"><strong style="font-style:italic;">Red Wing Store</strong>
					<p style="margin:0; padding:5px 0;">3859 Hwy 61 W</p>
					<p style="margin:0; padding:5px 0;">Red Wing, MN 55066	</p>
					<p style="margin:0; padding:5px 0;">651.388.7000</p>
					</td>
					
					<td style="width:25%; color:#000; font-size:18px;"><strong style="font-style:italic;">Lake Minnetonka Store</strong>
					<p style="margin:0; padding:5px 0;">1444 Shoreline Dr</p>
					<p style="margin:0; padding:5px 0;">Wayzata, MN 55391	</p>
					<p style="margin:0; padding:5px 0;">952.745.9999</p>
					</td>
					
					<td style="width:25%; color:#000; font-size:18px;"><strong style="font-style:italic;">Rochester Store	</strong>
					<p style="margin:0; padding:5px 0;">5327 E Frontage Rd</p>
					<p style="margin:0; padding:5px 0;">Rochester, MN 55901	</p>
					<p style="margin:0; padding:5px 0;">507.287.3333</p>
					</td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:20%; color:#000; font-size:18px;">Date <input  value="<?php echo isset($info['date']) ? $info['date'] : $info['date']; ?>"  style="width:20px;" name="date" type="text" class="delivary_inp">/
					<input name="month"  value="<?php echo isset($info['month']) ? $info['month'] : $info['month']; ?>"  style="width:20px;"  type="text" class="delivary_inp">
					/<input name="year"  value="<?php echo isset($info['year']) ? $info['year'] : $info['year']; ?>"  style="width:20px;"  type="text" class="delivary_inp"></td>
					 <td style="width:40%; color:#000; font-size:18px;">Customer
					 <input name="customer_name"   value="<?php echo isset($info['customer_name1']) ? $info['customer_name1'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="delivary_inp"></td>
					  <td style="width:40%; color:#000; font-size:18px;">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">Boat <input name="boat"  value="<?php echo isset($info['boat']) ? $info['boat'] : $info['boat']; ?>"  type="text" class="delivary_inp"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">Vin # <input name="vin"  value="<?php echo isset($info['vin']) ? $info['vin'] : $info['vin']; ?>"  type="text" class="delivary_inp"></td>
				  </tr>
				</table>
				</td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">Thank you for your marine purchase, welcome to the River Valley Family!  </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:40%; color:#000; font-size:18px; padding:5px 0;">Date Delivered  <input name="delivery_date"   value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : $info['delivery_date']; ?>"   type="text" class="delivary_inp2"> </td>
					 <td style="width:60%; color:#000; font-size:18px; padding:5px 0;">RVPS Employee signature  <input name=""  type="text" class="delivary_inp2"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:40%; color:#000; font-size:18px; padding:5px 0;"><strong>METHOD OF DELIVERY FORM</strong> </td>
					 <td style="width:60%; color:#000; font-size:18px; padding:5px 0;"><strong>Customer acceptance signature</strong><input name="" type="text" class="delivary_inp2"> </td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:100%; color:#000; font-size:17px; padding:5px 0;"><strong>Products Purchased Summary:</strong></td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">Delivery Method:</td>
				  </tr>
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">____Free Pickup on location    Tonka on trailer____Tonka in BB marina___  Red Wing____  Rochester____	</td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">____Free Use of River Valley Trailer (returned within 48hrs)</td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">____Delivery to location of customers choice: <input name="" type="text" class="delivary_inp2"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">Fee Charged for delivery $1.00 per mile       $ <input name="" type="text" class="delivary_inp2"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">____Purchase of VIP Hassle Free Package	Purchase price <input name="" type="text" class="delivary_inp2"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">         Spring/Summer Initial VIP	 <input name="" type="text" class="delivary_inp4"> 2nd Season VIP <input name="" type="text" class="delivary_inp4"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">  ______Other:  explain <input name="" type="text" class="delivary_inp2"></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">  <strong>VIP Hassle Free Package _______Purchased		_____Declined</strong></td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">  Our premier package:   For those customers who demand no hassles, no pressures, and no inconveniences.
				“Let us take your boating pleasure to a new level”.  Included in this package:
				-Initial spring/summer delivery of your boat to our marina,  your driveway, your cabin or your slip.
				-Full tank of Fuel
				-Customer DNR lettering(applied professionally by RVPS employee)
				-Pickup of boat at end of season, to our secure maintenance & storage facility
				-Complete end of season maintenance &winterization(RVPS picks up unit in fall)
				-Winter storage at our secure facility
				-Zero Deductible coverage
				*Spring (following re-delivery is NOT included in VIP)we ask for a renewal of VIP package or return delivery fee
				*Renewal rates are discounted (RVPS service team to provide pricing)
				*Delivery fees are based on 100 miles from the location of purchase.  .50 per mile each way over 100 miles.
				*Detail & acid wash extra:  Not included in VIP (pricing avail by service per footage basis)
				*Re-Fuel to full fueling not included:   Charged at pump price on return in spring
				</td>
				  </tr>
				  
				  <tr>
					<td style="width:100%; color:#000; font-size:18px; padding:5px 0;">  INITIAL SPRING/SUMMER Delivery:    To your driveway, cabin, dock or marina.   </td>
				  </tr>
				  
				</table>

				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Miles est___________x $1.00per mile</td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">=$____________Delivery Total</td>
				  </tr>
				  
				  <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Fueling _____________gallons</td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">=$____________Fuel Total</td>
				  </tr>
				  
				  <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">License application applied w/customer letters</td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">=$____________License letter applied</td>
				  </tr>
				  
				  <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Price collected from customer: </td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">=$____________Total collected </td>
				  </tr>
				  
				   <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Visa/Master  card #_____________________________  </td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Date/Exp__________	Code_______ </td>
				  </tr>
				  
				   <tr>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">________________________________________Customer Signature  </td>
					<td style="width:50%; color:#000; font-size:18px; padding:5px 0;">Date Accepted________ </td>
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
