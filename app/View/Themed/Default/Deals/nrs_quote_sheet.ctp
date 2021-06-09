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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-left: 1px solid #000; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px; text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	td:nth-child(2){text-align: left;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0px;">
			<div class="left" style="float: left; width: 25%;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 20px;"><b>NRS Trailers</b></h2>
				<h2 style="float: left; width: 100%; margin: 0; font-size: 20px;"><b>NRS RV World</b></h2>
				<p style="float: left; width: 100%; margin: 2px 0; font-size: 13px;">155 CR 4228 <br> Decatur, TX 76234 <br> Phone : 940-393-7070 <br> Fax: 940-343-7080</p>
			</div>
			<div class="right" style="float: right; width: 30%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="display: block; font-size: 20px;"><b>Quote Sheet</b></label>
					<textarea name="quote" style="width: 98%; height: 80px; border: 1px solid #000;"><?php echo isset($info['quote'])?$info['quote']:'' ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; display: block; padding: 3px; border-bottom: 1px solid #000;">Customer Information</label>
				<input type="text" name="name" value="<?php echo isset($info["name"]) ? $info['name'] : $info['first_name'].' '.$info['last_name'];?>" style="width: 100%; padding: 3px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Contact</label>
				<input type="text" name="contact" value="<?php echo isset($info['contact']) ? $info['contact'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Primary Phone</label>
				<input type="text" name="primary_phone" value="<?php echo isset($info['primary_phone']) ? $info['primary_phone'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Alt Phone</label>
				<input type="text" name="alt_phone" value="<?php echo isset($info['alt_phone']) ? $info['alt_phone'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">PO Number</label>
				<input type="text" name="po_phone" value="<?php echo isset($info['po_phone']) ? $info['po_phone'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Transaction</label>
				<input type="text" name="transaction" value="<?php echo isset($info['transaction']) ? $info['transaction'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Counter Person</label>
				<input type="text" name="counter_person" value="<?php echo isset($info['counter_person']) ? $info['counter_person'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Sales Person</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; border-right: 1px solid #000; padding: 0;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%; padding: 5px;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box;">
				<label style="display; block; background: #ccc; display: block; padding: 3px; border-bottom: 1px solid #000;">Department</label>
				<input type="text" name="department" value="<?php echo isset($info['department']) ? $info['department'] : ''; ?>" style="width: 100%; padding: 5px;">
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 20%; background-color: #ccc;">Model</td>
				<td style="width: 60%; text-align: center; background-color: #ccc;">Description</td>
				<td style="width: 20%; background-color: #ccc;">Amount</td>
			</tr>
			<tr>
				<td><input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip" value="<?php echo isset($info['descrip']) ? $info['descrip'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt" value="<?php echo isset($info['amt']) ? $info['amt'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td><input type="text" name="model1" value="<?php echo isset($info['model1']) ? $info['model1'] : ''; ?>" style="width: 100%;"></td>
				<td>VIN#</td>
				<td><input type="text" name="amt1" value="<?php echo isset($info['amt1']) ? $info['amt1'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td><input type="text" name="model2" value="<?php echo isset($info['model2']) ? $info['model2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="descrip2" value="<?php echo isset($info['descrip2']) ? $info['descrip2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amt2" value="<?php echo isset($info['amt2']) ? $info['amt2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2">Free Description for Unit</td>
			</tr>
			<tr>
				<td><input type="text" name="model3" value="<?php echo isset($info['model3']) ? $info['model3'] : ''; ?>" style="width: 100%;"></td>
				<td>Temp Tag</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" class="price" id="amt3" name="amt3" value="<?php echo isset($info['amt3']) ? $info['amt3'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model4" value="<?php echo isset($info['model4']) ? $info['model4'] : ''; ?>" style="width: 100%;"></td>
				<td>Inventory Tax 001479</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt4" class="price" id="amt4" value="<?php echo isset($info['amt4']) ? $info['amt4'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model5"  value="<?php echo isset($info['model5']) ? $info['model5'] : ''; ?>" style="width: 100%;"></td>
				<td>Doc Fee</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt5" class="price" id="amt5" value="<?php echo isset($info['amt5']) ? $info['amt5'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model6" value="<?php echo isset($info['model6']) ? $info['model6'] : ''; ?>" style="width: 100%;"></td>
				<td>TX Mobility Fund Fee</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt6" class="price" id="amt6" value="<?php echo isset($info['amt6']) ? $info['amt6'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model7" value="<?php echo isset($info['model7']) ? $info['model7'] : ''; ?>" style="width: 100%;"></td>
				<td>Title Fee</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt7" class="price" id="amt7" value="<?php echo isset($info['amt7']) ? $info['amt7'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model8" value="<?php echo isset($info['model8']) ? $info['model8'] : ''; ?>" style="width: 100%;"></td>
				<td>GVWR (Plate Sticker)</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt8" class="price" id="amt8" value="<?php echo isset($info['amt8']) ? $info['amt8'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model9" value="<?php echo isset($info['model9']) ? $info['model9'] : ''; ?>" style="width: 100%;"></td>
				<td>Cnty Road & Bridge</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt9" class="price" id="amt9" value="<?php echo isset($info['amt9']) ? $info['amt9'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model10" value="<?php echo isset($info['model10']) ? $info['model10'] : ''; ?>" style="width: 100%;"></td>
				<td>Process & Handling Fee</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt10" class="price" id="amt10" value="<?php echo isset($info['amt10']) ? $info['amt10'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
			<tr>
				<td><input type="text" name="model11" value="<?php echo isset($info['model11']) ? $info['model11'] : ''; ?>" style="width: 100%;"></td>
				<td>Inspection Fee</td>
				<td>
					<label style="width: 10%;">$</label>
					<label><input type="text" name="amt11" class="price" id="amt11" value="<?php echo isset($info['amt11']) ? $info['amt11'] : ''; ?>" style="text-align: right; width: 89%;"></label>
				</td>
			</tr>
		</table>
		
		<h3 style="float: left; width: 100%; margin: 10px 0; font-size: 14px; background-color: #ccc; padding: 5px; box-sizing: border-box;">Trade In</h3>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; ">
			<table cellpadding="0" cellspacing="0" style="float: right; width: 40%; border-top: 1px solid #000;">
				<tr>
					<td style="width: 50%;">Sales Tax</td>
					<td>
						<label style="width: 10%;">$</label>
						<label><input type="text" class="price" name="sales_tax1" id="sales_tax1" value="<?php echo isset($info['sales_tax1']) ? $info['sales_tax1'] : ''; ?>" style="text-align: right; width: 100%;"></label>
					</td>
				</tr>

				<tr>
					<td>Balance</td>
					<td>
						<label>$<input type="text" class="price" name="balance" id="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : ''; ?>" style="text-align: right; width: 95%;"></label>
					</td>
				</tr>
			</table>
		</div>
		
		<h3 style="float: left; width: 100%; margin: 10px 0; font-size: 14px; background-color: #ccc; padding: 5px; box-sizing: border-box;">Notes</h3>
		<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px; border: 1px solid #000; box-sizing: border-box; padding: 3px;"><sup>**</sup>Please Note: values for Trade In's are continqent upon a visual inpection of the trailer</p>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Customer Signature</label>
				<input type="text" name="customer1_sign" value="<?php echo isset($info['customer1_sign']) ? $info['customer1_sign'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="customer1_date" value="<?php echo isset($info['customer1_date']) ? $info['customer1_date'] : ''; ?>" style="width: 85%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer Signature</label>
				<input type="text" name="customer2_sign" value="<?php echo isset($info['customer2_sign']) ? $info['customer2_sign'] : ''; ?>" style="width: 85%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NRS Trailers Representative :</label>
				<input type="text" name="trailer" value="<?php echo isset($info['trailer']) ? $info['trailer'] : ''; ?>" style="width: 78%; border-bottom: 1px solid #000;">
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

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});

	function calculate_totalprice() {
		
		var amt3 = isNaN(parseFloat( $('#amt3').val()))?0.00:parseFloat($('#amt3').val());
		var amt4 = isNaN(parseFloat( $('#amt4').val()))?0.00:parseFloat($('#amt4').val());
		var amt5 = isNaN(parseFloat( $('#amt5').val()))?0.00:parseFloat($('#amt5').val());
		var amt6 = isNaN(parseFloat( $('#amt6').val()))?0.00:parseFloat($('#amt6').val());
		var amt7 = isNaN(parseFloat( $('#amt7').val()))?0.00:parseFloat($('#amt7').val());
		var amt8 = isNaN(parseFloat( $('#amt8').val()))?0.00:parseFloat($('#amt8').val());
		var amt9 = isNaN(parseFloat( $('#amt9').val()))?0.00:parseFloat($('#amt9').val());
		var amt10 = isNaN(parseFloat( $('#amt10').val()))?0.00:parseFloat($('#amt10').val());
		var amt11 = isNaN(parseFloat( $('#amt11').val()))?0.00:parseFloat($('#amt11').val());
		var sales_tax1 = isNaN(parseFloat( $('#sales_tax1').val()))?0.00:parseFloat($('#sales_tax1').val());
		
		var balance = amt3 + amt4 + amt5 + amt6 + amt7 + amt8 + amt9 + amt10 + amt11 + sales_tax1;
		$("#balance").val(balance.toFixed(2));

	}


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
