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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;border-bottom: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	li{margin-bottom: 7px; font-size: 16px;}
	table{font-size: 14px;}
	td, th{padding: 7px;}
	table{border: 1px solid #000;}
	th{border-right: 1px solid #000; padding: 4px; border-bottom: 1px solid #000; background-color: #dce9f1; color: #52b7f5;}
	th:last-child, td:last-child{border-right: 0;}
	td{border-right: 1px solid #000;}
	.activity_check {margin-left: 5px;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
.title {
	color:#52b7f5 !important;
	background-color: #dce9f1 !important;
}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 40%;">
				<h2 style="float: left; width: 100%; font-size: 18px;"><b>MOUNTAIN WEST TRAILERS, INC</b></h2>
				<p style="float: left; width: 100%; margin: 0; ">1470 South US Highway 40 <br>
					UT US <br>
					(435) 709-8862 <br>
					chadashby@gmail.com <br>
					mountainwesttrailer.com</p>
			</div>
			
			<div class="center" style="float: left; width: 30%;">
				<b style="float: left; width: 100%; margin: 0; display: block; text-align: center; font-size: 30px;">Estimate</b>
			</div>
			
			<div class="logo" style="float: right; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/moutain-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="one-half" style="float: left; width: 35%; margin-left: 7%;">
				<h2 style="width: 100%; margin: 0; padding: 10px; box-sizing: border-box; border: 1px solid #000; background-color: #dce9f1; color: #52b7f5; border-bottom: 0; font-size: 14px;"><b class="title">ADDRESS</b></h2>
					<div class="address" style="padding: 10px; border: 1px solid; height: 100px;">
						<label>Name:</label>
						<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']: $info['first_name']." ".$info['last_name']; ?>" style="width: 75%;"> 
						<label>Address:</label>
						<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data']: $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 82%;">
					</div>
			</div>
			<div class="one-half" style="float: right; width: 35%; margin-right: 7%;">
				<h2 style="float: left; width: 100%; margin: 0; padding: 10px; box-sizing: border-box; border: 1px solid #000; background-color: #dce9f1; color: #52b7f5; border-bottom: 0; font-size: 14px;"><b class="title">SHIP TO</b></h2>
				<textarea id="ship_to" name="ship_to" style="width: 100%; height: 100px; box-sizing: border-box; border: 1px solid #000;"><?php echo isset($info['ship_to'])?$info['ship_to']:'' ?></textarea>
			</div>
		</div>
		
		<table style="float: left; width: 50%; margin: 10px 0; text-align: left;" cellpadding="0" cellspacing="0">
			<tr>
				<th class="title" style="width: 33.33%;">ESTIMATE#</th>
				<th class="title" style="width: 33.33%;">DATE</th>
				<th style="width: 33.33%;">&nbsp;</th>
			</tr>
			<tr>
				<td><input type="text" name="estimate" value="<?php echo isset($info['estimate'])?$info['estimate']:''; ?>" /></td>
				<td><input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>
		
		<table class="activity" style="float: left; width: 100%; margin: 10px 0; text-align: right;" cellpadding="0" cellspacing="0">
			<tr>
				<th class="title" style="text-align: left; width: 60%;">ACTIVITY</th>
				<th class="title">QTY</th>
				<th class="title">RATE</th>
				<th class="title">AMOUNT</th>
			</tr>
			<tr>
				<td style="text-align: left;"><b>HAS85X14WT2 JU344858</b><input type="checkbox" name="vehicle_status" style="margin-left: 5px;" <?php echo ($info['vehicle_status'] == "vehicle_status") ? "checked" : ""; ?> value="vehicle_status"/> <br>
					MAKE:<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 23%;"> MODEL:<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 23%;"> YEAR:<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 23%;"> VIN:<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 23%;"></td>
				<td><input type="text" name="qty1" value="<?php echo isset($info['qty1'])?$info['qty1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="rate1" value="<?php echo isset($info['rate1'])?$info['rate1']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amont1" value="<?php echo isset($info['amont1'])?$info['amont1']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="text-align: left;"><b>Document Fee</b><input type="checkbox" name="document_status" style="margin-left: 5px;" <?php echo ($info['document_status'] == "document_status") ? "checked" : ""; ?> value="document_status"/> <br>
				<input type="text" name="document_fee" value="<?php echo isset($info['document_fee'])?$info['document_fee']:''; ?>" style="width: 50%;"></td>
				<td><input type="text" name="qty2" value="<?php echo isset($info['qty2'])?$info['qty2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="rate2" value="<?php echo isset($info['rate2'])?$info['rate2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amont2" value="<?php echo isset($info['amont2'])?$info['amont2']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="text-align: left;"><b>TRF</b><input type="checkbox" name="trf_status" style="margin-left: 5px;" <?php echo ($info['trf_status'] == "trf_status") ? "checked" : ""; ?> value="trf_status"/> <br>
				<input type="text" name="trf" value="<?php echo isset($info['trf'])?$info['trf']:''; ?>" style="width: 50%;"></td>
				<td><input type="text" name="qty3" value="<?php echo isset($info['qty3'])?$info['qty3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="rate3" value="<?php echo isset($info['rate3'])?$info['rate3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amont3" value="<?php echo isset($info['amont3'])?$info['amont3']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="text-align: left;"><b>RV</b><input type="checkbox" name="rv_status" style="margin-left: 5px;" <?php echo ($info['rv_status'] == "rv_status") ? "checked" : ""; ?> value="rv_status"/> <br>
				<input type="text" name="rv" value="<?php echo isset($info['rv'])?$info['rv']:''; ?>" style="width: 50%;"></td>
				<td><input type="text" name="qty4" value="<?php echo isset($info['qty4'])?$info['qty4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="rate4" value="<?php echo isset($info['rate4'])?$info['rate4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="amont4" value="<?php echo isset($info['amont4'])?$info['amont4']:''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="text" style="float: right; width: 40%;">
				<div class="cover" style="float: left; width: 100%;">
					<span style="float: left"><b>SUBTOTAL</b></span>
					<span><input type="text" class="total_val" id="subtotal" name="subtotal" value="<?php echo isset($info['subtotal'])?$info['subtotal']:''; ?>" style="width: 33%; float: right;font-weight: 700; font-size:18px;"></span>
				</div>
				
				<div class="cover" style="float: left; width: 100%; margin: 10px 0;">
					<span style="float: left"><b>TAX (6.25%) </b></span>
					<span style="float: right"><input type="text" class="total_val" id="tax" name="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 53%; float: right;font-weight: 700; font-size:18px;"></span>
				</div>
				
				<div class="cover" style="float: left; width: 100%;">
					<span style="float: left"><b>TOTAL  </b></span>
					<span style="float: right; font-size: 20px"><input type="text" class="total_val" id="total" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 53%; float: right;font-weight: 700; font-size:18px;"></span>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="width: 40%; float: left;">
				<label style="font-size: 15px;">Accepted By</label>
				<input type="text" name="accepted_by" value="<?php echo isset($info['accepted_by'])?$info['accepted_by']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="width: 40%; float: right;">
				<label style="font-size: 15px;">Accepted Date</label>
				<input type="text" name="accepted_date" value="<?php echo isset($info['accepted_date'])?$info['accepted_date']:''; ?>" style="width: 70%;">
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

	$(".activity tr").on('change keyup paste', function(){
		var $this = this; 
			calculate_row_total($this);
			calculate_totalaccess($this);
		});

	function calculate_row_total($this){
		var qt = $($this).find('td:eq(1) input').val();
		var rate = $($this).find('td:eq(2) input').val();
		$($this).find('td:eq(3) input').val((qt * rate).toFixed(2));
	}

	function calculate_totalaccess($this) {
		total_access = 0.00;
		$('.activity tr').each(function() {
			var total = $(this).find('td:eq(3) input').val();
			if (total) {
		        total = total == "" ? 0.00 : parseFloat(total);
		        total_access += total;
			}
			$("#subtotal").val(total_access.toFixed(2));
		})
		var subtotal = isNaN(parseFloat( $('#subtotal').val()))?0.00:parseFloat($('#subtotal').val());
		var selectedTrs = $('.activity input[type="checkbox"]:checked').closest('tr');
		var taxTotal = 0.00;
		for ( var i  = 0;i < selectedTrs.length;i ++) {
			console.log(selectedTrs.eq(i).find('td:eq(3) input').val());
			taxTotal += parseFloat(selectedTrs.eq(i).find('td:eq(3) input').val());
		}
		var tax = (6.25/100) * taxTotal;
		$("#tax").val(tax.toFixed(2));
		var total = subtotal + tax;
		$("#total").val(total.toFixed(2));

	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
