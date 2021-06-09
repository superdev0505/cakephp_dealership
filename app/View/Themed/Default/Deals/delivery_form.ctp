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
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h3 style="float: left; width: 100%; margin: 0 0 10px;"><b>RV Delivery Ticket</b></h3>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Salesperson</label>
				<input type="text" name="sperson" value="<?php echo isset($info["sperson"]) ? $info["sperson"] : '' ?>" style="width: 91%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 89%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Phone #</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 88%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Unit Purchased</label>
				<input type="text" name="unit_purchased" value="<?php echo isset($info['unit_purchased']) ? $info['unit_purchased'] : $info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 89%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Stk #</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 96%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Last 6 of Vin #</label>
				<input type="text" name="last_vin" value="<?php echo isset($info['last_vin'])?$info['last_vin']:''; ?>" style="width: 90%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Compground or Address to deliver	</label>
				<input type="text" name="campground" value="<?php echo isset($info['campground']) ? $info['campground'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 77%; float: right;">
				<input type="text" name="campground1" value="<?php echo isset($info['campground1']) ? $info['campground1'] : ''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="campground2" value="<?php echo isset($info['campground2']) ? $info['campground2'] : ''; ?>" style="width: 100%; margin: 5px 0;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Date and Time of Delivery</label>
				<input type="text" name="delivery_time" value="<?php echo isset($info['delivery_time']) ? $info['delivery_time'] : ''; ?>" style="width: 82%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Haul Only <input type="checkbox" name="haul_check" value="haul" <?php echo ($info['haul_check'] == 'haul') ? "checked" : ""; ?> /></label>
				<label style="margin: 0 3%;">Block Unit <input type="checkbox" name="block_unit" value="block" <?php echo ($info['block_unit'] == 'block') ? "checked" : ""; ?> /></label>
				<label>Level Unit <input type="checkbox" name="level_unit" value="level_unit" <?php echo ($info['level_unit'] == 'level') ? "checked" : ""; ?> /></label>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Blocks Included</label>
				<label style="margin: 0 3%;">Yes <input type="radio" name="block_check" value="yes" <?php echo ($info['block_check'] == 'yes') ? "checked" : ""; ?> /></label>
				<label>No <input type="radio" name="block_check" value="no" <?php echo ($info['block_check'] == 'no') ? "checked" : ""; ?> /></label>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Trade-in pick-up</label>
				<label style="margin: 0 3%;">Yes <input type="radio" name="trade_check" value="yes" <?php echo ($info['trade_check'] == 'yes') ? "checked" : ""; ?> /></label>
				<label>No <input type="radio" name="trade_check" value="no" <?php echo ($info['trade_check'] == 'no') ? "checked" : ""; ?> /></label>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Special Notes</label>
				<input type="text" name="special_note1" value="<?php echo isset($info['special_note1']) ? $info['special_note1'] : ''; ?>" style="width: 90%; float: right;">
				<input type="text" name="special_note2" value="<?php echo isset($info['special_note2']) ? $info['special_note2'] : ''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special_note3" value="<?php echo isset($info['special_note3']) ? $info['special_note3'] : ''; ?>" style="width: 100%; margin: 5px 0;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Price Charged</label>
				<input type="text" name="price_charged" value="<?php echo isset($info['price_charged']) ? $info['price_charged'] : ''; ?>" style="width: 90%; float: right;">
			</div>
			<div class="logo" style="float: right; width: 36%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/hillson-rv.png'); ?>" alt="" style="width: 100%;">
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
