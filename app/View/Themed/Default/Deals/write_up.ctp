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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 5px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 3px; border-bottom: 1px solid #000;}
	th{padding: 4px;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 3px;}
	span{font-size: 14px;}
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 5px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="logo" style="width: 47%; margin: 0 auto; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/cover-sheet-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 30%; margin-top: 10px;">
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>Today's Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 68%">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>Salesperson</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%">
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 16px;"><b style="width: 50%; display: block; background-color: blue !important; color: #fff; padding: 10px;    border-top-left-radius: 8px; border-bottom-right-radius: 8px; border: 1px solid black;">Customer Information</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Name (s)</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>and/or</label>
				<input type="text" name="other" value="<?php echo isset($info['other']) ? $info['other'] : ''; ?>" style="width: 87%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 86%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 7px 0;">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 83%">
			</div>
			<div class="form-field" style="float: left; width: 10%; margin: 7px 0;">
				<label>ST</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 70%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Phone #1</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 85%">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>#2</label>
				<input type="text" name="mobile1" value="<?php echo isset($info['mobile1']) ? $info['mobile1'] : ''; ?>" style="width: 91%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Email #1</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 85%">
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>#2</label>
				<input type="text" name="email1" value="<?php echo isset($info['email1']) ? $info['email1'] : ''; ?>" style="width: 91%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label><b>Source</b></label>
				<span style="margin: 0 1%;"><input type="radio" name="website_check" <?php echo ($info['website_check'] == "website") ? "checked" : ""; ?> value="website"/> Our Website</span>
				<span style="margin: 0 1%;"><input type="radio" name="internet_check" <?php echo ($info['internet_check'] == "internet") ? "checked" : ""; ?> value="internet"/> Internet</span>
				<span style="margin: 0 1%;"><input type="radio" name="email_check" <?php echo ($info['email_check'] == "email") ? "checked" : ""; ?> value="email"/> Email</span>
				<span style="margin: 0 1%;"><input type="radio" name="tv_check" <?php echo ($info['tv_check'] == "tv") ? "checked" : ""; ?> value="tv"/> TV</span>
				<span style="margin: 0 1%;"><input type="radio" name="radio_check" <?php echo ($info['radio_check'] == "radio") ? "checked" : ""; ?> value="radio"/> Radio</span>
				<span style="margin: 0 1%;"><input type="radio" name="newspaper_check" <?php echo ($info['newspaper_check'] == "newspaper") ? "checked" : ""; ?> value="newspaper"/> Newspaper</span>
				<span style="margin: 0 1%;"><input type="radio" name="referral_check" <?php echo ($info['referral_check'] == "referral") ? "checked" : ""; ?> value="referral"/> Referral</span>
				<span style="margin: 0 1%;"><input type="radio" name="customer_check" <?php echo ($info['customer_check'] == "customer") ? "checked" : ""; ?> value="customer"/> Repeat Customer</span>
				<span style="margin: 0 1%;"><input type="radio" name="name" value="9"> Location</span>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 16px;"><b style="width: 50%; display: block; background-color: blue; color: #fff; padding: 10px;     border-top-left-radius: 8px; border-bottom-right-radius: 8px; border: 1px solid black;">Purchase Information</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<span><input type="radio" name="condition" <?php echo ($info['condition'] == "NEW") ? "checked" : ""; ?> value="NEW"/> NEW</span>
				<span><input type="radio" name="condition" <?php echo ($info['condition'] == "USED") ? "checked" : ""; ?> value="USED"/> USED</span>
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 7px 0;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 7px 0;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 7px 0;">
				<label>Color</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>Miles</label>
				<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 65%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Vin#/Stock#</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 7px 0;">
				<label>Price</label>
				<span><input type="text" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 80%"></span>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 7px 0;">
				<label>+Fees(Taxes,title,doc,etc)</label>
			</div>
		</div>




		<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 16px;"><b style="width: 50%; display: block; background-color: blue; color: #fff; padding: 10px;     border-top-left-radius: 8px; border-bottom-right-radius: 8px; border: 1px solid black;">Trade Information</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 6%; margin: 11px 0; margin-left: 55px;">
				<label>USED</label>
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 7px 0;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 7px 0;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 7px 0;">
				<label>Color</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 70%">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 7px 0;">
				<label>Miles</label>
				<input type="text" name="miles_trade" value="<?php echo isset($info['miles_trade']) ? $info['miles_trade'] : ''; ?>" style="width: 65%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
				<label>Vin#/Stock#</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 7px 0;">
				<label>Title in Hand?Yes/No</label>
				<span><input type="text" name="hand" value="<?php echo isset($info['hand']) ? $info['hand'] : ''; ?>" style="width: 40%;"></span>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 7px 0;">
				<label>Payoff?(Yes/No)</label>
				<span><input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 40%;"></span>
			</div>
		</div>




		
		<h2 style="float: left; width: 100%; margin: 10px 0 0; font-size: 16px;"><b style="width: 50%; display: block; background-color: blue; color: #fff; padding: 10px;     border-top-left-radius: 8px; border-bottom-right-radius: 8px; border: 1px solid black;">Additional Accessories</b></h2>
		
		<table cellpadding="0" cellspacing="0" width="100%;" style="margin-top: 20px; float: left; width: 100%;">
			<tr>
				<th style="width: 30%;">Accessories</th>
				<th style="width: 45%;">Part #</th>
				<th style="width: 15%;">Price</th>
				<th style="width: 10%;">Labor</th>
			</tr>
			
			<tr>
				<td><input type="text" name="access1" value="<?php echo isset($info['access1']) ? $info['access1'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part1" value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price1" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor1" value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access2" value="<?php echo isset($info['access2']) ? $info['access2'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor2" value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access3" value="<?php echo isset($info['access3']) ? $info['access3'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part3" value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price3" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor3" value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access4" value="<?php echo isset($info['access4']) ? $info['access4'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part4" value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor4" value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access5" value="<?php echo isset($info['access5']) ? $info['access5'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part5" value="<?php echo isset($info['part5']) ? $info['part5'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price5" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor5" value="<?php echo isset($info['labor5']) ? $info['labor5'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access6" value="<?php echo isset($info['access6']) ? $info['access6'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part6" value="<?php echo isset($info['part6']) ? $info['part6'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor6" value="<?php echo isset($info['labor6']) ? $info['labor6'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access7" value="<?php echo isset($info['access7']) ? $info['access7'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part7" value="<?php echo isset($info['part7']) ? $info['part7'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price7" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor7" value="<?php echo isset($info['labor7']) ? $info['labor7'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="access8" value="<?php echo isset($info['access8']) ? $info['access8'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="part8" value="<?php echo isset($info['part8']) ? $info['part8'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="float: left; width: 100%;"></td>
				<td><input type="text" name="labor8" value="<?php echo isset($info['labor8']) ? $info['labor8'] : ''; ?>" style="float: left; width: 100%;"></td>
			</tr>
		</table>
		
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 3px;">
			<div class="form-field" style="float: left; width: 30%; margin: 7px 0;">
				<label>Delivery Date</label>
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 67%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 40%; margin: 7px 0;">
				<label>Dealer Representative X</label>
				<input type="text" name="dealer_represent" value="<?php echo isset($info['dealer_represent']) ? $info['dealer_represent'] : ''; ?>" style="width: 56%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 7px 0;">
				<label>Purchaser X </label>
				<input type="text" name="purchaser_x" value="<?php echo isset($info['purchaser_x']) ? $info['purchaser_x'] : ''; ?>" style="width: 67%">
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 7px 0;">
				<label>Co-Purchaser X</label>
				<input type="text" name="co_purchaser" value="<?php echo isset($info['co_purchaser']) ? $info['co_purchaser'] : ''; ?>" style="width: 62%">
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
	
	
     
});

	
	
	
	
	
</script>
</div>
