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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; font-size: 20px; margin: 0 0 7px"><b>R.V. SALES, INC</b></h2>
		<p style="float: left; width: 100%; text-align: center; line-height: 30px;">P.O Box 2098 <br> 2109 U.S Route 66 West <br> Moriarty, N.M. 87035-</p>
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<h2 style="float: left; width: 50%; font-size: 16px; margin: 0;"><b>Consignment Agreement</b></h2>
			<div class="form-field" style="float: right; width: 25%; margin: 0;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 15px;">This Agreement between R.V.SALES, INC (Consignee) and Consignor sgned below, is as follows:</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item1" value="<?php echo isset($info['item1']) ? $info['item1'] : ''; ?>" style="width: 5%;">1) Consignor agrees to consign said item for a period of 30 days minimum, for purchase of sale by Consignee for a total price of $<input type="text" name="price1" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="width: 8%;"> "Clear to Consignor", and further areees R.V.Sales, Inc will retain all proceeds exceeding $<input type="text" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 25%;"> for sales services. ("Clear to Consignee") price does <input name="price" <?php echo ($info['price_check'] == "price1") ? "selected" : ''; ?> type="radio" value="price1"  class="entry_one" /> does not <input name="price" <?php echo ($info['price_check'] == "price2") ? "selected" : ''; ?> type="radio" value="price2"  class="entry_one" /> include  customer's hitch; <br> other <input type="text" name="title3" value="<?php echo isset($info['title3']) ? $info['title3'] : ''; ?>" style="width: 90%;"></p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item2" value="<?php echo isset($info['item2']) ? $info['item2'] : ''; ?>" style="width: 5%;">2) Consignor is the registered and actual owner of the following item being placed on consignment: <br>
Descripition: Year <input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 7%;"> Make <input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 13%;"> Size <input type="text" name="size" value="<?php echo isset($info['size']) ? $info['size'] : ''; ?>" style="width: 7%;"> Serial <input type="text" name="name" style="width: 30%;"> Weight <input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 10%;"> <br>
subject to a lien or encumbrance due to: <input type="text" name="title4" value="<?php echo isset($info['title4']) ? $info['title4'] : ''; ?>" style="width: 40%;"> for approximately <br> 
$ <input type="text" name="title5" value="<?php echo isset($info['title5']) ? $info['title5'] : ''; ?>" style="width: 10%;"> If lien or encumbrance is more than agreed amount "Clear to Consignor," customer will pay said balance to lien holder within three (3) days of notification of unit being sold so title will be released to R.V.Sales, Inc.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item3" value="<?php echo isset($info['item3']) ? $info['item3'] : ''; ?>" style="width: 5%;">3) Consignnor certifies that has insurance on the consigned item to cover any damages including theft, vandalism, etc, while in Consignee's possession and that he agrees to hold harmless Consignee of any damages that might be incurred.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item4" value="<?php echo isset($info['item4']) ? $info['item4'] : ''; ?>" style="width: 5%;">4) Fees must be paid on the first day of the Consignment Agreement. These fees include: 30  day cleaning and dusting fee of $25.00; other recommended cleaning fees of $ <input type="text" name="price3" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="width: 32%;"> for <input type="text" name="title6" value="<?php echo isset($info['title6']) ? $info['title6'] : ''; ?>" style="width: 40%;">; <br>
other fees <input type="text" name="name" style="width: 50%;"> (Fees paid by check # <input type="text" name="title7" value="<?php echo isset($info['title7']) ? $info['title7'] : ''; ?>" style="width: 18%;">) </p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item5" value="<?php echo isset($info['item5']) ? $info['item5'] : ''; ?>" style="width: 5%;">5) If for any reason Consignor terminates this Agreement prior to the terms set forth above, they agree to pay $50.00 for display, storage, etc. for the period that item was in Consignee's possession.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item6" value="<?php echo isset($info['item6']) ? $info['item6'] : ''; ?>" style="width: 5%;">6) In order to sell your R V more quickly, we checkout and guarabtee to the buyer (at time of purchase) that all appliances, LP and water lines, etc are in working order. If your RV does not meet the checkout reuirements, Consignor will be given a quote for repaires and this amount will be deducted from the $ <input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 17%;"> "Clear to Consignor" for repairs done.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item7" value="<?php echo isset($info['item7']) ? $info['item7'] : ''; ?>" style="width: 5%;">7) If the unit is taken out of consignment before it is sold, Consignor agrees to pay for all advertising costs. This amount is due at the time unit is picked up fom R.V. Sales, Inc. <b>OR</b> <input type="text" name="title8" value="<?php echo isset($info['title8']) ? $info['title8'] : ''; ?>" style="width: 25%;"> please do not advertise.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item8" value="<?php echo isset($info['item8']) ? $info['item8'] : ''; ?>" style="width: 5%;">8) Consignor must give Consignee written notice twenty (20) days prior to above unit being withdrawn from consignement. (This will allow for any pending deals to be finalized.)</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%; line-height: 25px;"><input type="text" name="item9" value="<?php echo isset($info['item9']) ? $info['item9'] : ''; ?>" style="width: 5%;">9) Consignor has taken the license plate and registration from the RV and will keep it for futur use in the event unit is not sold</p>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 15px; padding-left: 3%;"><input type="text" name="item10" value="<?php echo isset($info['item10']) ? $info['item10'] : ''; ?>" style="width: 5%;">10) if Consignor is gong out of town, they will notify Consignee of a phone number where thay can be reached.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="form-field" style="float: left; width: 70%;">
				<label><b>Consignor's Name</b></label>
				<input type="text" name="consignor_name" value="<?php echo isset($info['consignor_name']) ? $info['consignor_name'] : ''; ?>" style="width: 79%;"> 
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>Home Phone</b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 70%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label><b>Address</b></label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 88%;"> 
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>Cell Phone</b></label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 74%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>City</b></label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 80%;"> 
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>State</b></label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 80%;"> 
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label><b>Zip</b></label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 72%;"> 
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>Work Phone</b></label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 71%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>Consignor's signature</b></label>
				<input type="text" name="consignor_sign1" value="<?php echo isset($info['consignor_sign1']) ? $info['consignor_sign1'] : ''; ?>" style="width: 84.5%;"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>Consignor's signature</b></label>
				<input type="text" name="consignor_sign2" value="<?php echo isset($info['consignor_sign2']) ? $info['consignor_sign2'] : ''; ?>" style="width: 84.5%;"> 
			</div>
		</div>
	</div>
	<!-- worksheet end -->
		
		
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
	
	$(document).on("click", "input[name='price']", function(){
	    thisRadio = $(this);
	    if (thisRadio.hasClass("imChecked")) {
	        thisRadio.removeClass("imChecked");
	        thisRadio.prop('checked', false);
	    } else { 
	        thisRadio.prop('checked', true);
	        thisRadio.addClass("imChecked");
	    };
	})
	
     
});

	
	
	
	
	
</script>
</div>
