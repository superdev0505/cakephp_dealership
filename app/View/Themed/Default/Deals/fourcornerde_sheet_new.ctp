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
	label{font-size: 13px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
	
@media print {
	input[type="text"]{padding: 3px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}

.pick {margin: 11px 0 !important;}
.vehicle {padding: 12px 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; font-size: 24px; margin: 5px 0; text-align: center;"><b>SUPER DEALS RV INC</b></h2>
		<p style="font-size: 14px; text-align: center; margin: 0; text-align: center;">931 Carrollton Hwy, Temple, GA 30179</p>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<p style="float: left; width: 40%; margin: 0; font-size: 14px;">TEL: 770-942-1700</p>
			<p style="float: right; width: 40%; margin: 0; font-size: 14px; text-align: right;">FAX: 678-607-8985</p>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: right; width: 30%; margin: 4px 0;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>CUSTOMER NAME:</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 100%; ">
				<label>ADDRESS:</label>
				<input type="text" name="address_data"  value="<?php echo isset($info['address_data']) ? $info['address_data'] :  $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 30%; margin: 4px 0;">
				<label>DL#</label>
				<input type="text" name="dl_num" value="<?php echo isset($info['dl_num'])?$info['dl_num']:''; ?>" style="width: 89%;">
			</div>
			
			<div class="form-field" style="float: right; width: 30%; margin: 4px 0;">
				<label>TEL#:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 84%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000;">
				<h2 style="float: left; width: 100%; font-size: 18px; margin: 0;"><b>UNIT DETAILS</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>MAKE :</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 88%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>MODEL/YEAR:</label>
					<input type="text" name="model_year" value="<?php echo isset($info['model_year'])?$info['model_year']: $info['model'].' '.$info['year']; ?>" style="width: 78%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>VIN#:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 90%;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-left: 0px solid #000;">
				<h2 style="float: left; width: 100%; font-size: 18px; margin: 0;"><b>TRADE</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>MAKE :</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 88%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>MODEL/YEAR:</label>
					<input type="text" name="model_year_trade" value="<?php echo isset($info['model_year_trade'])?$info['model_year_trade']: $info['model_trade'].' '.$info['year_trade']; ?>" style="width: 78%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>VIN#:</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 90%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>PRICE</label>
					<input type="text" name="price" class="price_value" id="price" value="<?php echo isset($info['price'])?$info['price']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>ADD ONS:</label>
					<input type="text" name="add_ons" class="price_value" id="add_ons" value="<?php echo isset($info['add_ons'])?$info['add_ons']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TRADE</label>
					<input type="text" name="trade" class="price_value" id="trade" value="<?php echo isset($info['trade'])?$info['trade']:''; ?>" style="width: 88%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>PREP FEE</label>
					<input type="text" name="prep_fee" class="price_value" id="prep_fee" value="<?php echo isset($info['prep_fee'])?$info['prep_fee']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TAX</label>
					<input type="text" name="tax" class="price_value" id="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 92%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TAGS</label>
					<input type="text" name="tag" class="price_value" id="tags" value="<?php echo isset($info['tag'])?$info['tag']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TOTAL</label>
					<input type="text" name="total" class="price_value" id="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>DEPOSIT</label>
					<input type="text" name="deposit" class="price_value" id="deposit" value="<?php echo isset($info['deposit'])?$info['deposit']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>BALANCE</label>
					<input type="text" name="balance" class="price_value" id="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 83%;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-left: 0px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TRADE VALUE</label>
					<input type="text" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width: 78%;">
				</div>
				<h2 style="float: left; width: 100%; font-size: 16px; margin: 16px 15px;"><b>ADD ONS:</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>Slide-out toper</label>
					<input type="text" name="slide_out" value="<?php echo isset($info['slide_out'])?$info['slide_out']:''; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>break control</label>
					<input type="text" name="break_control" value="<?php echo isset($info['break_control'])?$info['break_control']:''; ?>" style="width: 79%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>Tong jack:</label>
					<input type="text" name="tong_jack" value="<?php echo isset($info['tong_jack'])?$info['tong_jack']:''; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>weight dist:</label>
					<input type="text" name="weight_dist" value="<?php echo isset($info['weight_dist'])?$info['weight_dist']:''; ?>" style="width: 83%;">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 22px 0 0;">
					<div class="form-field vehicle" style="float: left; width: 100%; margin: 4px 0; border-top: 1px solid #000; padding: 20px 0;">
						<label><b>VEHICLE DETAILS:</b></label>
						<input type="text" name="vehicle_details" value="<?php echo isset($info['vehicle_details'])?$info['vehicle_details']:''; ?>" style="width: 72%;">
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left offer" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label style="font-size: 17px;"><b>OFFER:</b></label>
					<textarea style="width: 98%; border: 0px; height: 70px;"></textarea>
				</div>
				<label style="display: block; width: 100%;"><b><i>CUSTOMER DECLINED AS FOLLOWS :</i></b></label>
				<label style="margin-left: 30%; margin-top: 10px; display: inline-block;">INITIAL</label>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>BREAK CONTROL </label>
					<input type="text" name="breack_control" value="<?php echo isset($info['breack_control'])?$info['breack_control']:''; ?>" style="width: 73%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>TONG JACK</label>
					<input type="text" name="tong_jack" value="<?php echo isset($info['tong_jack'])?$info['tong_jack']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>WEIGHT DIST</label>
					<input type="text" name="weight_dist" value="<?php echo isset($info['weight_dist'])?$info['weight_dist']:''; ?>" style="width: 78%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>SLIDE-OUT TOPER</label>
					<input type="text" name="slide_toper" value="<?php echo isset($info['slide_toper'])?$info['slide_toper']:''; ?>" style="width: 72%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>Non-Refunable Deposit</label>
					<input type="text" name="non_deposit" value="<?php echo isset($info['non_deposit'])?$info['non_deposit']:''; ?>" style="width: 66%;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-left: 0px solid #000; border-top: 0px;">
				<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
					<label>LIST OF REPAIRS:</label>
					<input type="text" name="repairs1" value="<?php echo isset($info['repairs1'])?$info['repairs1']:''; ?>" style="width: 73%;">
					<input type="text" name="repairs2" value="<?php echo isset($info['repairs2'])?$info['repairs2']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs3" value="<?php echo isset($info['repairs3'])?$info['repairs3']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs4" value="<?php echo isset($info['repairs4'])?$info['repairs4']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs5" value="<?php echo isset($info['repairs5'])?$info['repairs5']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs6" value="<?php echo isset($info['repairs6'])?$info['repairs6']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs7" value="<?php echo isset($info['repairs7'])?$info['repairs7']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs8" value="<?php echo isset($info['repairs8'])?$info['repairs8']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs9" value="<?php echo isset($info['repairs9'])?$info['repairs9']:''; ?>" style="width: 100%; margin: 0;">
					<input type="text" name="repairs10" value="<?php echo isset($info['repairs10'])?$info['repairs10']:''; ?>" style="width: 100%; margin: 0">
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 5px 0;">
					<div class="form-field pick" style="float: left; width: 100%; margin: 6px 0;">
						<label><b>PICK UP DATE</b></label>
						<input type="text" name="pick_up" value="<?php echo isset($info['pick_up'])?$info['pick_up']:''; ?>" style="width: 78%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 12px 0; text-align: center;">
			<div class="from-filed" style="width: 48%; float: left;">
				<input type="text" name="buyer" value="<?php echo isset($info['buyer'])?$info['buyer']:''; ?>" style="width: 100%;text-align: center;">
				<label>BUYER</label>
			</div>
			<div class="from-filed" style="width: 48%; float: right;">
				<input type="text" name="seller" value="<?php echo isset($info['seller'])?$info['seller']:''; ?>" style="width: 100%;text-align: center;">
				<label>SELLER</label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 3px; font-size: 15px;"><i><strong>Deposit :</strong> its only refunable if financing for rv is declined by finance company/banks.</i></p>
		<p style="float: left; width: 100%; margin: 3px; font-size: 15px;"><i><strong>Hitches & break control :</strong> We do not install or help on customer provide hitches or break controls.</i></p>
		<p style="float: left; width: 100%; margin: 3px; font-size: 15px;"><strong>$125 PREP</strong> Customers must bring own battery day of pick up . *intail <input type="text" name="content1" value="<?php echo isset($info['content1'])?$info['content1']:''; ?>"></p>
		<p style="float: left; width: 100%; margin: 3px; font-size: 15px;"><strong>USED Camper -</strong> customers is agreeeing to repairs discussed on <input type="text" name="content2" value="<?php echo isset($info['content2'])?$info['content2']:''; ?>"></p>
		<p style="float: left; width: 100%; margin: 3px; font-size: 15px;">No other repairs will added after signing this agreement. Intail <input type="text" name="content3" value="<?php echo isset($info['content3'])?$info['content3']:''; ?>"> </p>
		
		
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
		
	function calculate_total() {
       price = isNaN(parseFloat($("#price").val()))?0.00:parseFloat($("#price").val());
       add_ons = isNaN(parseFloat($("#add_ons").val()))?0.00:parseFloat($("#add_ons").val());	
       trade = isNaN(parseFloat($("#trade").val()))?0.00:parseFloat($("#trade").val());	
       prep_fee = isNaN(parseFloat($("#prep_fee").val()))?0.00:parseFloat($("#prep_fee").val());	
       tax = isNaN(parseFloat($("#tax").val()))?0.00:parseFloat($("#tax").val());	
       tags = isNaN(parseFloat($("#tags").val()))?0.00:parseFloat($("#tags").val());	
       var total = price + add_ons - trade + prep_fee + tax + tags;
       $("#total").val(total.toFixed(2));
       deposit = isNaN(parseFloat($("#deposit").val()))?0.00:parseFloat($("#deposit").val());	
       var balance = total - deposit;
       $("#balance").val(balance.toFixed(2));
    }

	$(".price_value").on('change keyup paste',function(){
        calculate_total();
    });
});

	
	
	
	
	
</script>
</div>
