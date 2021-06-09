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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
	.rect input[type="text"]{border-bottom: 0px !important;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
	<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="float: left; width: 16%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-dmv.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<h2 style="float: left; margin: 12px 0 0 9%"><b>PERMIT TO USE DEALER'S LICENSE PLATES</b></h2>
			<span style="float: right; margin: 15px 0 0 0;">DSD 27 (11/152010)</span>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label><b>Purpose:</b></label>
				<span style="width: 91%; float: right; font-size: 14px;">Motor vehicle dealers issue this permit to a customer or Dealer Authorized Individual as authorization to use dealer's license plates for a specified period of the time and purpose.</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
				<label><b>Instructions:</b></label>
				<span style="width: 91%; float: right; font-size: 14px;">See reverse side for details.</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 3px; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 40%; margin-right: 1%;">
				<label>CUSTOMER/OPERATOR FULL LEGAL NAME (last)</label>
				<input type="text" name="last_name" value="<?php echo isset($info['last_name'])?$info['last_name']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin-right: 1%;">
				<label>(first)</label>
				<input type="text" name="first_name" value="<?php echo isset($info['first_name'])?$info['first_name']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; margin-right: 1%;">
				<label>(middle)</label>
				<input type="text" name="m_name" value="<?php echo isset($info['m_name'])?$info['m_name']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: right; width:10%;">
				<label>(suffix)</label>
				<input type="text" name="suffix" value="<?php echo isset($info['suffix'])?$info['suffix']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 3px; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>STREET ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>"  style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>ZIP CODE</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 17%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
				<label>TELEPHONE NUMBER</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; padding: 0 3px;">
				<label>CELL PHONE NUMBER</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000;">
			<p style="margin: 0; font-size: 14px;">ASSIGNED OPERATOR (Check one - permit is invalid if more than one box is checked)</p>
			<div class="form-field" style="float: left; width: 24%; box-sizing: border-box; padding: 3px;">
				<input type="checkbox" name="assigned_status" value="purchaser" <?php echo ($info['assigned_status'] == "purchaser") ? "checked" : ""; ?> /> Prospective Purchaser
			</div>
			
			<div class="form-field" style="float: left; width: 46%; box-sizing: border-box; padding: 3px;">
				<input type="checkbox" name="assigned_status" value="vehicle" <?php echo ($info['assigned_status'] == "vehicle") ? "checked" : ""; ?> /> Customer whose vehicle is in dealer's shop for repairs
			</div>
			
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px;">
				<input type="checkbox" name="assigned_status" value="authorized" <?php echo ($info['assigned_status'] == "authorized") ? "checked" : ""; ?> /> Dealer Authorized Individual
			</div>
		</div>
		
		
		<h3 style="float: right; width: 100%; text-align: center; padding: 4px 0; background: #777; border: 1px solid #000; border-bottom: 0px; margin: 10px 0 0; box-sizing: border-box;"><b>PERMIT INFORMATION</b></h3>
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>DATE ISSUED (mm/dd/yyyy)</label>
				<input type="text" name="date_issued" value="<?php echo isset($info['date_issued'])?$info['date_issued']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">TIME ISSUED</label>
				<input type="text" name="time_issued" value="<?php echo isset($info['time_issued'])?$info['time_issued']:''; ?>" style="width: 40%;">
				<input type="checkbox" name="time_status" value="am" <?php echo ($info['time_status'] == "am") ? "checked" : ""; ?> /> AM
				<input type="checkbox" name="time_status" value="pm" <?php echo ($info['time_status'] == "pm") ? "checked" : ""; ?> /> PM
			</div>
			
			<div class="form-field" style="float: left; width: 28%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>DATE EXPIRES (mm/dd/yyyy)</label>
				<input type="text" name="date_expire" value="<?php echo isset($info['date_expire'])?$info['date_expire']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 0 3px;">
				<label style="display: block;">TIME EXPIRES</label>
				<input type="text" name="time_expire" value="<?php echo isset($info['time_expire'])?$info['time_expire']:''; ?>" style="width: 40%;">
				<input type="checkbox" name="expire_status" value="am" <?php echo ($info['expire_status'] == "am") ? "checked" : ""; ?> /> AM
				<input type="checkbox" name="expire_status" value="pm" <?php echo ($info['expire_status'] == "pm") ? "checked" : ""; ?> /> PM
			</div>
		</div>
		
		<h3 style="float: right; width: 100%; text-align: center; padding: 4px 0; background: #777; border: 1px solid #000; border-bottom: 0px; margin: 10px 0 0; box-sizing: border-box;"><b>VEHICLE INFORMATION</b></h3>
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>VEHICLE IDENTIFICATION NUMBER</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 3px;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<h3 style="float: right; width: 100%; text-align: center; padding: 4px 0; background: #777; border: 1px solid #000; border-bottom: 0px; margin: 10px 0 0; box-sizing: border-box;"><b>DEALERSHIP CERTIFICATION</b></h3>
		<p style="float: right; width: 100%; text-align: center; padding: 4px 0; border: 1px solid #000; border-bottom: 0px; margin: 0; box-sizing: border-box;">I certify that the following dealer plate is approved to be used for the time period indicated above in accordance with Virginia Law. I further certify and affirm that all information presented in this form is true and correct, that any documents I have presented to DMV are genuine, and that the information included in all supporting documentation is true and accurate. I make ths certification and affirmation under penalty of perjury and I understand that knowingly making a false statement or representation on this form is a criminial violation.</p>
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>DEALER PLATE NUMBER</label>
				<input type="text" name="dealer_num" value="<?php echo isset($info['dealer_num'])?$info['dealer_num']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>DEALERSHIP NAME (print)</label>
				<input type="text" name="company" value="<?php echo isset($info['company'])?$info['company']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
				<label>DEALER CERTIFICATION NUMBER</label>
				<input type="text" name="certify_num" value="<?php echo isset($info['certify_num'])?$info['certify_num']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>CUSTOMER/OPERATOR NAME (print)</label>
				<input type="text" name="operator_name" value="<?php echo isset($info['operator_name'])?$info['operator_name']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>CUSTOMER/OPERATOR SIGNATURE</label>
				<input type="text" name="operator_sign" value="<?php echo isset($info['operator_sign'])?$info['operator_sign']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px;">
				<label>DATE(mm/dd/yyyy)</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;  box-sizing: border-box; padding: 0 3px; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>AUTHORIZED REPRESENTATIVE NAME (print)</label>
				<input type="text" name="auth_name" value="<?php echo isset($info['auth_name'])?$info['auth_name']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>AUTHORIZED REPRESENTATIVE SIGNATURE</label>
				<input type="text" name="auth_sign" value="<?php echo isset($info['auth_sign'])?$info['auth_sign']:''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px;">
				<label>DATE(mm/dd/yyyy)</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
			</div>
		</div>
		
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<span style="float: right; margin: 15px 0 0 0; text-align: right;">DSD 27 (11/152010) <br> <b>Page 2</b></span>	
		</div>
		
		<p style="float: left; width: 100%; margin: 20px 0;">I/we, the person receiving the vehicle, further understand and agree that my/our vehicle insurance <br> carrier (<input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 40%; border-bottom: 1px solid #000;">) is liable for any damages and/or injuries <br> (personal or property) resulting from my/our use of this vehicle. I/we further agree to release <br> Commercial Truck Center of VA from all Liability incurred during my/our use of this vehicle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0; text-align: center;">
			<div class="form-field" style="width: 100%; display: inline-block;">
				<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:''; ?>" style=" width: 70%; margin: 0 auto; border-bottom: 1px solid #000; margin-bottom: 3px; display: block;">
				<label style="display: block; width: 100%;">Signature of Person Receiving Vehicle</label>	
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
