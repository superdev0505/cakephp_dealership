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
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	
	
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px; border-top: 1px solid #000;}
	td, th{padding: 4px; text-align: center; padding: 7px; border-bottom: 1px solid #000;}
	td:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	.cover input[type="text"]{border: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 15% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="margin: 0 auto; width: 300px;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/indian-motorcycle.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="address" style="float: left; width: 100%; margin: 7px 0;">
				<p style="float: left; width: 100%; text-align: center; margin: 0; font-size: 15px;">4509 Alameda Bivd NE <br> Albuquerque NM 87113 <br> 505-508-2830</p>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Deal#</label>
				<input type="text" name="deal" value="<?php echo isset($info['deal'])?$info['deal']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 67%;">
				<label>Customer Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Stk#</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 67%;">
				<label>Customer Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>City, State, Zip</label>
				<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row cover" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 14%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>New <input type="radio" name="condition_new" <?php echo (isset($info['condition_new']) && $info['condition_new']=='new')?'checked="checked"':''; ?> value="new"></label> <br>
				<label>Used <input type="radio" name="condition_used" <?php echo (isset($info['condition_used']) && $info['condition_used']=='used')?'checked="checked"':''; ?> value="used"></label> <br>
				<label>Demo <input type="radio" name="condition_used" <?php echo (isset($info['condition_used']) && $info['condition_used']=='demo')?'checked="checked"':''; ?> value="demo"></label>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; height: 76px;">
				<label>Year</label>
				<textarea name="year" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['year'])?$info['year']:''; ?></textarea>
				
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; height: 76px;">
				<label>Make</label>
				<textarea name="make" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['make'])?$info['make']:''; ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; height: 76px;">
				<label>Model Name</label>
				<textarea name="model" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['model'])?$info['model']:''; ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; height: 76px;">
				<label>Model #</label>
				<textarea name="model_num" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['model_num'])?$info['model_num']:''; ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 17%; margin: 0; box-sizing: border-box; padding: 5px;">
				<label>Color</label>
				<textarea name="color" style="width: 100%; border: 0px; height: 45px;"><?php echo isset($info['color'])?$info['color']:''; ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Freight</label>
				<input type="text" name="freight" value="<?php echo isset($info['freight'])?$info['freight']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Setup</label>
				<input type="text" name="setup" value="<?php echo isset($info['setup'])?$info['setup']:''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Doc</label>
				<input type="text" name="doc" value="<?php echo isset($info['doc'])?$info['doc']:''; ?>" style="width: 88%;">
			</div>
		</div>
		
		<div class="row cover" style="float: left; width: 100%; margin: 10px 0 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>Vehicle Price</label>
				<textarea name="vehicle_price" style="width: 98%; height: 120px; border: 0px;"><?php echo isset($info['vehicle_price'])?$info['vehicle_price']:'' ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px;">
				<label>Trade In</label>
				<textarea name="trade_in" style="width: 98%; height: 120px; border: 0px;"><?php echo isset($info['trade_in'])?$info['trade_in']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row cover" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>Initial Investment</label>
				<textarea name="initial_investment" style="width: 98%; height: 120px; border: 0px;"><?php echo isset($info['initial_investment'])?$info['initial_investment']:'' ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 50%; margin: 0; box-sizing: border-box; padding: 5px;">
				<label>Estimated Payment</label>
				<textarea name="estimate_pay" style="width: 98%; height: 120px; border: 0px;"><?php echo isset($info['estimate_pay'])?$info['estimate_pay']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 13px 0 15px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer Signature</label>
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 87%;">
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

	$(document).find("input:checked[type='radio']").addClass('bounce');   
    $("input[type='radio']").click(function() {
        $(this).prop('checked', false);
        $(this).toggleClass('bounce');

        if( $(this).hasClass('bounce') ) {
            $(this).prop('checked', true);
            $(document).find("input:not(:checked)[type='radio']").removeClass('bounce');
        }
    });

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
