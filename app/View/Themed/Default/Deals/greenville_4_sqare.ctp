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
	label{font-size: 13px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000; text-align: left;}
	td:nth-child(4), td:nth-child(7){text-align: left;}
	th:nth-child(4), th:nth-child(7){text-align: left;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: center; padding: 3px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="logo" style="float: left; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/harley-ww.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 26%;">
				<div class="form-field" style="left; width: 100%; margin: 3px 0;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="left; width: 100%; margin: 3px 0;">
					<label>Deal #</label>
					<input type="text" name="deal" value="<?php echo $dealer; ?>" style="width: 83%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="width: 50%; float: left; text-align: center;">
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 25%; font-size: 15px; border-bottom: 0px;">
			</div>
			<div class="left" style="width: 50%; float: left; text-align: center;">
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : 'Salesperson #2'; ?>" style="width: 25%; font-size: 15px; border-bottom: 0px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box;">
			<div class="left" style="width: 50%; float: left; box-sizing: border-box; padding: 10px; border-right: 1px solid #000;">
				<h2 style="float: left; width: 100%; margin: 3px; font-size: 16px; text-align: center;"><b>Customer Information</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Buyer</label>
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Co-Buyer</label>
					<input type="text" name="co_customer_data" value="<?php echo isset($info['co_customer_data']) ? $info['co_customer_data'] : $info['co_buyer_first']." ".$info['co_buyer_last']; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Street</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>City</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>State</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Zip</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Home Ph</label>
					<input type="text" name="phone" value="<?php $phone = $info['phone']; $phone_number = preg_replace('/[^0-9]+/', '', $phone); $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phone_number); echo $cleaned;  ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Work Ph</label>
					<input type="text" name="work_number" value="<?php $work = $info['work_number']; $work_number = preg_replace('/[^0-9]+/', '', $work); $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $work_number); echo $cleaned1;  ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Cell Ph</label>
					<input type="text" name="mobile" value="<?php $mobile = $info['mobile']; $mobile_number = preg_replace('/[^0-9]+/', '', $mobile); $cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $mobile_number); echo $cleaned2;  ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Buyer's DOB</label>
					<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Buyer's SSN</label>
					<input type="text" name="ssn_num" value="<?php echo isset($info['ssn_num'])?$info['ssn_num']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Co-Buyer's DOB</label>
					<input type="text" name="co_dob" value="<?php echo isset($info['co_dob'])?$info['co_dob']:''; ?>" style="width: 78%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Co-Buyer's SSN</label>
					<input type="text" name="co_ssn" value="<?php echo isset($info['co_ssn'])?$info['co_ssn']:''; ?>" style="width: 78%; float: right;">
				</div>
			</div>
			
			<div class="right" style="width: 50%; float: left; box-sizing: border-box; padding: 10px;">
				<h2 style="float: left; width: 100%; margin: 3px; font-size: 16px;     text-align: center;"><b>Trade Information</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Year</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Make</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Model</label>
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>VIN</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Body</label>
					<input type="text" name="body_trade" value="<?php echo isset($info['body_trade'])?$info['body_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Mileage</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Color</label>
					<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Balanced Owned To</label>
					<input type="text" name="balance1" value="<?php echo isset($info['balance1'])?$info['balance1']:''; ?>" style="width: 72%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label></label>
					<input type="text" name="balance2" value="<?php echo isset($info['balance2'])?$info['balance2']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Payment </label>
					<input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Est Payoff</label>
					<input type="text" name="est_payoff" value="<?php echo isset($info['est_payoff'])?$info['est_payoff']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Good Until</label>
					<input type="text" name="good_unit" value="<?php echo isset($info['good_unit'])?$info['good_unit']:''; ?>" style="width: 80%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
					<label>Date</label>
					<input type="text" name="date_trade" value="<?php echo isset($info['date_trade'])?$info['date_trade']:''; ?>" style="width: 80%; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 7px; border: 1px solid #000; border-top: 0">
			<div class="section" style="float: left; width: 100%; margin: 3px 0;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 16px">WHAT BROUGHT CUSTOMER TO HARLEY-DAVIDSON OF GREENVILLE?</h2>
				<input type="text" name="greenville" value="<?php echo isset($info['greenville'])?$info['greenville']:''; ?>" style="width: 100%;">
			</div>
			<div class="section" style="float: left; width: 100%; margin: 3px 0; border-bottom: 1px solid #000;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 16px">Provided all of the terms are agreeable to me, I will purchase vehicle today?</h2>
				X <input type="text" name="agreeable" value="<?php echo isset($info['agreeable'])?$info['agreeable']:''; ?>" style="width: 94%; border-bottom: 0px;">
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="left" style="float: left; width: 49%;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Year</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Make</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Model</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Stock #</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>MSRP</label>
						$<input type="text" class="currency" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 89%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Adds</label>
						<input type="text" name="adds" value="<?php echo isset($info['adds'])?$info['adds']:''; ?>" style="width: 90%; float: right">
					</div>
				</div>
				
				<div class="right" style="float: right; width: 49%;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Trim</label>
						<input type="text" name="trim" value="<?php echo isset($info['trim'])?$info['trim']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Body</label>
						<input type="text" name="body" value="<?php echo isset($info['body'])?$info['body']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Color</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Mileage</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 90%; float: right">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>VIN</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 90%; float: right">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box;  border: 1px solid #000; border-top: 0;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; padding: 7px; ">
					<label>Selling Price:</label>
					<textarea name="selling_price" style="float: left; width: 98%; border: 0px; height: 120px;"><?php echo isset($info['selling_price'])?$info['selling_price']:'' ?></textarea>
				</div>
			</div>
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 7px;">
				<label>Trade:</label>
				<textarea name="trade" style="float: left; width: 98%; border: 0px; height: 120px;"><?php echo isset($info['trade'])?$info['trade']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 7px; border-right: 1px solid #000;">
				<label>Down Payment of 25%:</label>
				<textarea name="down_payment" style="float: left; width: 98%; border: 0px; height: 120px;"><?php echo isset($info['down_payment'])?$info['down_payment']:'' ?></textarea>
			</div>
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; padding: 7px;">
				<label>Payment:</label>
				<textarea name="payment" style="float: left; width: 98%; border: 0px; height: 120px;"><?php echo isset($info['payment'])?$info['payment']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 7px; border: 1px solid #000; border-top: 0px; margin-bottom: 10px;">
			<p style="float: left; width: 100%; margin: 0; font-size: 14px;">I give Harley-Davidson of Greenville permission under the fair credit act to review my credit history</p>
			
			<div class="left" style="float: left; width: 49%;">
				<div class="form-field" style="float: left; width: 70%;">	
					<input type="text" name="buyer" value="<?php echo isset($info['buyer'])?$info['buyer']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Buyer</label>
				</div>
				<div class="form-field" style="float: left; width: 30%;">	
					<input type="text" name="buyer_date" value="<?php echo isset($info['buyer_date'])?$info['buyer_date']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 49%;">
				<div class="form-field" style="float: left; width: 70%;">	
					<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer'])?$info['co_buyer']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Co-Buyer</label>
				</div>
				<div class="form-field" style="float: left; width: 30%;">	
					<input type="text" name="co_buyer_date" value="<?php echo isset($info['co_buyer_date'])?$info['co_buyer_date']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
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

	function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\-]/g,"")
				  .replace(/(\\d)(?=(\\d\\d\\d)+(?!\\d))/g, "$1,") 
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

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
