<?php
//This Custom Form Mapped Author: Abha Sood Negi

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

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
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

		.container{width: 960px; margin: 0 auto;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px;}
	textarea{width: 96%; border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 100px;}
	@media print { 
	.dontprint{display: none;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container">
			<div class="row"style="float: left; width: 100%; margin: 7px 0;">
				<div class="logo" style="width: 250px; margin: 0 auto;">
					<img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/gatewayrv-dealer-logo.png'); ?>" alt="">
				</div>
				<h2 style="text-align: center; font-weight: bold; margin-top: 20px;">Trade - in Condition Report & Certification</h2>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 70%;">
					<label>Customer Name</label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>" style="width: 80%;">
				</div>
				
				<div class="form-field" style="float: left; width: 30%;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 60%;">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 86%;">
				</div>
				
				<div class="form-field" style="float: left; width: 40%;">
					<label>City, St. Zip</label>
					<input type="text" name="city_data" value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city'].','.$info['state'].','.$info['zip']; ?>" style="width: 73%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 55%;">
					<label>Phone #</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : $info['mobile']; ?>" style="width: 85%;">
				</div>
				
				<div class="form-field" style="float: left; width: 45%;">
					<label>Salesperson</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 74%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 30%;">
					<label>Year</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%;">
				</div>
				
				<div class="form-field" style="float: left; width: 70%;">
					<label>Make</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 91%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 40%;">
					<label>Model</label>
					<input type="text" name="model_trade"  value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 82%;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%;">
					<label>Size</label>
					<input type="text" name="size" value="<?php echo isset($info['size']) ? $info['size'] : ''; ?>" style="width: 78%;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%;">
					<label># Slides</label>
					<input type="text" name="slides" value="<?php echo isset($info['slides']) ? $info['slides'] : ''; ?>" style="width: 62%;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%;">
					<label># Axles</label>
					<input type="text" name="axles" value="<?php echo isset($info['axles']) ? $info['axles'] : ''; ?>" style="width: 59%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 60%;">
					<label>Vin #</label>
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 91%;">
				</div>
				
				<div class="form-field" style="float: left; width: 22%;">
					<label>Mileage</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 64%;">
				</div>
				
				<div class="form-field" style="float: left; width: 18%;">
					<label>Gen Hrs</label>
					<input type="text" name="gen_hrs" value="<?php echo isset($info['gen_hrs']) ? $info['gen_hrs'] : ''; ?>" style="width: 53%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 70%;">
					<label>Lienholder</label>
					<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 84%;">
				</div>
				
				<div class="form-field" style="float: left; width: 30%;">
					<label>Balance Due</label>
					<input type="text" name="balance_due" value="<?php echo isset($info['balance_due']) ? $info['balance_due'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Is there any Delamination?</label>
					<input type="text" name="delamination" value="<?php echo isset($info['delamination']) ? $info['delamination'] : ''; ?>" style="width: 78%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Any major scratches or dents?</label>
					<input type="text" name="scratches_dents" value="<?php echo isset($info['scratches_dents']) ? $info['scratches_dents'] : ''; ?>" style="width: 75%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 70%;">
					<label>How old are the tires?</label>
					<input type="text" name="old_tires" value="<?php echo isset($info['old_tires']) ? $info['old_tires'] : ''; ?>" style="width: 73%;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>Date</label>
					<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>How old is the battery?</label>
					<input type="text" name="old_battery" value="<?php echo isset($info['old_battery']) ? $info['old_battery'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Do all systems operate?</label>
					<input type="text" name="systems_operate" value="<?php echo isset($info['systems_operate']) ? $info['systems_operate'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Are there any roof  leaks?</label>
					<input type="text" name="roof_leaks" value="<?php echo isset($info['roof_leaks']) ? $info['roof_leaks'] : ''; ?>" style="width: 79%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Was it smoked in?</label>
					<input type="text" name="smoked_in" value="<?php echo isset($info['smoked_in']) ? $info['smoked_in'] : ''; ?>" style="width: 84%;">
				</div>
			</div>
			
			<div class="row" style="margin: 7px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Any repairs needed?</label>
					<input type="text" name="repairs_needed" value="<?php echo isset($info['repairs_needed']) ? $info['repairs_needed'] : ''; ?>" style="width: 82%;">
				</div>
			</div>
			
			<h2 style="float: left; width: 100%; font-size: 36px; margin-top: 20px; line-height: 40px;">**Gateway RV has the right to adjust any trade estimates after final inspection.**</h2>
			
			<div class="row" style="margin: 10px 0; float: left; width: 100%">
				<div class="form-field" style="float: right; width: 40%;">
					<label>Estimated Value: $</label>
					<input type="text" name="estimated_value" value="<?php echo isset($info['estimated_value']) ? $info['estimated_value'] : ''; ?>" style="width: 57%;">
				</div>
			</div>
			
			<div class="row" style="margin: 10px 0; float: left; width: 100%">
				<div class="form-field" style="float: left; width: 40%;">
					<label>Subject to Final Inspection</label>
					<label style="display: block; margin: 20px 0 5px;">X</label>
					<input type="text" name="final_inspection" value="<?php echo isset($info['final_inspection']) ? $info['final_inspection'] : ''; ?>" style="width: 100%;">
					<strong style="text-align: center; display: block; margin: 7px 0;">Gateway RV Management</strong>
				</div>
				<div class="form-field" style="float: right; width: 56%;">
					<label>The above information is true to the best of my knowledge</label>
					<label style="display: block; margin: 20px 0 5px;">X</label>
					<input type="text" name="information_knowledge" value="<?php echo isset($info['information_knowledge']) ? $info['information_knowledge'] : ''; ?>" style="width: 100%;">
					<strong style="text-align: center; display: block; margin: 7px 0;">Customer Signature</strong>
				</div>
			</div>
			
			
		</div>
		<!-- container end -->
		
			
	
	</div>
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
