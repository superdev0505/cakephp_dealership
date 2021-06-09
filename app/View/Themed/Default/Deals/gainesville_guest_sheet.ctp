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
<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="">
	
    <style>
	
#worksheet_container{width: 100%; margin: 0 auto;}	
/* css code should be here you can use CSS Class and id as well */
@media print { 


		/* All CSS that we need to modify for print view should be here */
#worksheet_container{width: 1050px;}
	}
	
input[type="text"]{border-bottom: 1px solid #000; border-left: 0px; border-right: 0px; border-top: 0px;
    height: 22px; box-sizing: border-box;}	
	span{font-size:16px;}
	label{font-size: 16px; text-transform: uppercase;}
	li{margin-bottom: 7px;}

</style>	

<div class="header" style="float: left; width: 100%; margin: 10px 0;">
			<div class="logo" style="float: left; width: 14%;">
				<img src="<?php echo ('/app/webroot/files/logo/gainesville.png'); ?>" alt="">
			</div>
			<div class="tittle" style=" float: left; font-size: 28px; font-weight: bold; margin: 48px 0; text-align: center;  width: 80%;">			   GUEST SHEET
			</div>
		</div>
		
		<!-- field section start -->
			<div class="all-fields" style="float: left; width: 100%; border: 1px solid #000; ">
				<!-- fields left section Start -->
				<div class="all-field-left" style="float: left; width: 74.5%; margin: 1% 0 1% 1%;">
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="width:100%;">
							<label style="margin-right: 1px;">Customer:</label>
							<input type="text" name="customer" value="<?php echo isset($info['customer'])?$info['customer']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 87%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 35%;">
							<label style="float: left; margin-right: 2px;">SSN:</label>
							<input type="text" name="ssn" value="<?php echo isset($info['ssn'])?$info['ssn']:''; ?>" style="width: 85%;">
						</div>
						
						<div class="form-field" style="float: left; width: 26%">
							<label style="float: left; margin-right: 2px;">DOB:</label>
							<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="float: left; width: 79%">
						</div>
						
						<div class="form-field" style="width: 39%; float: left;">
							<label style="margin-right: 2px;">DRIVER'S LIC:</label>
							<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 62%"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="width:100%;">
							<label style="margin-right: 2px;">Customer:</label>
							<input type="text" name="customer2"  value="<?php echo isset($info['customer2'])?$info['customer2']:''; ?>" style="width: 87%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 35%;">
							<label style="float: left; margin-right: 2px;">SSN:</label>
							<input type="text" name="ssn2" value="<?php echo isset($info['ssn2'])?$info['ssn2']:''; ?>" style="width: 85%;">
						</div>
						
						<div class="form-field" style="float: left; width: 26%">
							<label style="float: left; margin-right: 2px;">DOB:</label>
							<input type="text" name="dob2" value="<?php echo isset($info['dob2'])?$info['dob2']:''; ?>" style="float: left; width: 79%">
						</div>
						
						<div class="form-field" style="width: 39%; float: left;">
							<label style="margin-right: 2px;">DRIVER'S LIC:</label>
							<input type="text" name="license2" value="<?php echo isset($info['license2'])?$info['license2']:''; ?>" style="width: 62%"> 
						</div>
					</div>
					
				</div>
				<!-- fields left section end -->
				
				<!-- fields right section start -->
				<div class="field-right-section" style="float: right; width: 24%; border-left: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 22px 0 10px;">
						<label style="display: block; text-align: center; border-left: 0px;">Date:</label>
						<input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" style="height: 38px; margin: 13px 0 0; width: 100%; text-align: center;">		
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 14px 0 0; ">
						<label style="text-align: center; display: block;">SALES ASSOCIATE:</label>
						<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="border-bottom: 0 none; height: 36px; margin-top: 20px; width: 100%; text-align: center;">		
					</div>
				</div>
				<!-- fields right section end -->
			</div>
		<!-- fileds section end -->
		
		
		<!-- physical section filed start -->
		<div class="physical-fields" style="float: left; width: 100.2%; box-sizing: border-box; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 12px 12px;">
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 43%;">
							<label style="float: left; margin-right: 2px;">PHYSICAL:</label>
							<input type="text" name="physical" value="<?php echo isset($info['physical'])?$info['physical']:''; ?>" style="width: 79%;">
						</div>
						
						<div class="form-field" style="float: left; width: 33%">
							<label style="float: left; margin-right: 2px;">CITY:</label>
							<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="float: left; width: 85%">
						</div>
						
						<div class="form-field" style="width: 8%; float: left;">
							<label style="margin-right: 2px;">ST:</label>
							<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 61%"> 
						</div>
						
						<div class="form-field" style="width: 16%; float: left;">
							<label style="margin-right: 2px;">ZIP:</label>
							<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 77%"> 
						</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 43%;">
							<label style="float: left; margin-right: 2px;">MAILING:</label>
							<input type="text" name="mailing_address" value="<?php echo isset($info['mailing_address'])?$info['mailing_address']:''; ?>" style="width: 81%;">
						</div>
						
						<div class="form-field" style="float: left; width: 33%">
							<label style="float: left; margin-right: 2px;">CITY:</label>
							<input type="text" name="m_city" value="<?php echo isset($info['m_city'])?$info['m_city']:''; ?>" style="float: left; width: 85%">
						</div>
						
						<div class="form-field" style="width: 8%; float: left;">
							<label style="margin-right: 2px;">ST:</label>
							<input type="text" name="m_state" value="<?php echo isset($info['m_state'])?$info['m_state']:''; ?>" style="width: 61%"> 
						</div>
						
						<div class="form-field" style="width: 16%; float: left;">
							<label style="margin-right: 2px;">ZIP:</label>
							<input type="text" name="m_zip" value="<?php echo isset($info['m_zip'])?$info['m_zip']:''; ?>" style="width: 76%"> 
						</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 35%;">
							<label style="float: left; margin-right: 2px;">PHONE:</label>
							<input type="text" name="m_phone" value="<?php echo isset($info['m_phone'])?$info['m_phone']:''; ?>" style="width: 83%;">
						</div>
						
						<div class="form-field" style="float: left; width: 30%">
							<label style="float: left; margin-right: 2px;">CELL:</label>
							<input type="text" name="m_mobile" value="<?php echo isset($info['m_mobile'])?$info['m_mobile']:''; ?>" style="float: left; width: 82%">
						</div>
						
						<div class="form-field" style="width: 35%; float: left;">
							<label style="margin-right: 2px;">COUNTY:</label>
							<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width: 77%"> 
						</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 32%;">
							<label style="float: left; margin-right: 2px;">CO-PHONE:</label>
							<input type="text" name="co_phone"  value="<?php echo isset($info['co_phone'])?$info['co_phone']:''; ?>" style="width: 72%;">
						</div>
						
						<div class="form-field" style="float: left; width: 35%">
							<label style="float: left; margin-right: 2px;">CO-CELL:</label>
							<input type="text" name="co_mobile" value="<?php echo isset($info['co_mobile'])?$info['co_mobile']:''; ?>" style="float: left; width: 79%">
						</div>
						
						<div class="form-field" style="width: 33%; float: left;">
							<label style="margin-right: 2px;">EMAIL:</label>
							<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 79%"> 
						</div>
			</div>
			
			
			
			
		</div>
		<!-- physical section field section end -->
		
		
		<!-- years section start -->
			<div class="yesrs-section" style="float: left; width: 100.2%; box-sizing: border-box; border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 12px 12px;">
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 25%;">
							<label style="float: left; margin-right: 2px;">YEAR:</label>
							<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 79%;">
						</div>
						
						<div class="form-field" style="float: left; width: 25%">
							<label style="float: left; margin-right: 2px;">MODEL:</label>
							<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="float: left; width: 75%">
						</div>
						
						<div class="form-field" style="width: 25%; float: left;">
							<label style="margin-right: 2px;">COLOR:</label>
							<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 74%"> 
						</div>
						
						<div class="form-field" style="width: 25%; float: left;">
							<label style="margin-right: 2px;">MILES:</label>
							<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 76%"> 
						</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 43%;">
							<label style="float: left; margin-right: 2px;">VIN:</label>
							<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 92%;">
						</div>
						
						<div class="form-field" style="float: left; width: 32%">
							<label style="float: left; margin-right: 2px;">STOCK:</label>
							<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="float: left; width: 80%">
						</div>
						
						<div class="form-field" style="width: 12%; float: left;">
							<input type="radio" name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition'] == 'New')?'checked':''; ?> /> 
                            <label style="margin-left: 2px;">NEW:</label>
							
						</div>
						
						<div class="form-field" style="width: 13%; float: left;">
							<input type="radio" name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition'] == 'Used')?'checked':''; ?> />
                            <label style="margin-right: 2px;">USED:</label>
							 
						</div>
			</div>
				
				
			</div>
		<!-- years section end -->
		
		<!-- right content section start -->
			<div class="right-content" style="float: left; width: 100%;">
				<div class="right-content-inner" style="float: right; width: 50%">
					<h3 style="text-align: center; text-transform: uppercase; font-size: 14px;padding-top:10px;font-weight:bold;">TRADE</h3>
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="width: 90%; margin: 0 auto;">
							<label style="float: left; margin-right: 2px; font-size: 14px;">VIN:</label>
							<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 92%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%">
							<label style="float: left; margin-right: 2px; font-size: 14px;">Year</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="float: left; width: 78%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
                        
							<label style="margin-right: 2px; font-size: 14px;">Model</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>"  style="width: 75%"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%">
							<label style="float: left; margin-right: 2px; font-size: 14px;">MILES:</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="float: left; width: 79%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label style="margin-right: 2px; font-size: 14px;">COLOR:</label>
							<input type="text" name="color_trade" value="<?php echo isset($info['color_trade'])?$info['color_trade']:''; ?>" style="width: 70%"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%; position: relative;">
							<label style="float: left; margin-right: 2px; font-size: 14px;">LEIN:</label>
							<span style="font-size: 26px; left: 38px; position: absolute; top: -9px;">$</span>
							<input type="text" name="lien" value="<?php echo isset($info['lien'])?$info['lien']:''; ?>" style="float: left; width: 84%; padding: 0 0 0 20px;">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label style="margin-right: 2px; font-size: 14px;">PAYOFF:</label>
							<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 68%"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%">
							<label style="float: left; margin-right: 2px; font-size: 14px; position: relative; bottom: 11px;">GOOD <br> UNTIL:</label>
							<input type="text" name="good_until" value="<?php echo isset($info['good_until'])?$info['good_until']:''; ?>" style="float: left; width: 80%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label style="margin-right: 2px; font-size: 14px;">TAG:</label>
							<input type="text" name="tag" value="<?php echo isset($info['tag'])?$info['tag']:''; ?>" style="width: 75%"> 
						</div>
					</div>
				
					
					
				</div>
			</div>
		<!-- right content section end -->
		
		
		<!-- bottom section start -->
			<div class="bottom-section" style="float: left; width: 100%; margin: 40px 0;">
				<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 50%; margin-top: 10px;">
							<label style="float: left; margin-right: 2px; font-size: 14px; position: relative; bottom: 11px; font-size:30px;">X</label>
							<input type="text" name="name" style="float: left; width: 80%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label style="margin-right: 2px; font-size: 14px; display: block; text-align: center;">*  No Dealer Fees  *  Free 1 Year HOG Membership  *</label>
							<label style="margin-right: 2px; font-size: 14px; display: block; text-align: center;">*  2 Free T-Shirts  *  Free Battery Tender Harness  *</label>
						</div>
				</div>
			</div>
		


	
			
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
