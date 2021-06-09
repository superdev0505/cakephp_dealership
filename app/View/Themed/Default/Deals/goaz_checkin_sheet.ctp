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
	<div id="worksheet_container" style="width:960px; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
	input[type="text"]{border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid #000;}		
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
	}
	</style>

	<div class="wraper header" style="float:left;"> 
		
		
			
           <div>
		<div class="top-header" style="float: left; width: 90%;">
			<div class="logo2" style="width: 25%; margin: 0 auto;">
				<img src="<?php echo ('/app/webroot/files/goaz_images/logo2.jpg'); ?>" alt="" style="width: 100%">
			</div>
		</div>
		
		<div class="content" style="float: left;width: 90%; margin: 30px 0 0;">
			<div style="float: left; width: 90%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%">
					<label>VIN:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 88%;">
				</div>
				<div class="form-field" style="float: left; width: 50%">
					<label>Mileage</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 85%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 25%">
					<label>Plate #</label>
					<input type="text" name="plate_num" value="<?php echo isset($info['plate_num'])?$info['plate_num']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label>Year:</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 74%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label>Model:</label>
					<input type="text" name="modal" value="<?php echo isset($info['modal'])?$info['modal']:''; ?>" style="width: 69%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label>Color:</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 75%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%">
					<label>Customer Name:</label>
					<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 68%;">
				</div>
				<div class="form-field" style="float: left; width: 50%">
					<label>Phone:</label>
					<input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>" style="width: 87%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%">
					<label>Address:</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 50%">
					<label>E-mail:</label>
					<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 85%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 35%">
					<label>City:</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 83%;">
				</div>
				<div class="form-field" style="float: left; width: 32%">
					<label>State:</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 33%">
					<label>Zip:</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 86%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
				<div class="form-field" style="float: left; width: 100%">
					<label style="display: block;">CUSTOMER STATES:</label>
					<textarea name="customer_states" style="width:100%" rows="5"><?php echo isset($info['customer_states'])?$info['customer_states']:''; ?></textarea>
				</div>
			</div>
			
			<div class="row" style="float: left;">
				<div class="form-field" style="">
					<div class="" style="">
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
				<div class="form-field" style="float: left; width: 100%">
					<label style="display: block;">Visual Inspection:</label>
                    <textarea name="visual_inspection" style="width:100%;margin-top:14px;" rows="4"><?php echo isset($info['visual_inspection'])?$info['visual_inspection']:''; ?></textarea>
                </div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
				<p>I hereby authorize the above repair work to be done along with necessary materials, and hereby grant you /or your employees permission to operate the motorcycle herein described on the streets, highways or elsewhere for the purpose of testing and / or inspection. An express mechanic’s lien is hereby acknowledged on above motorcycle to secure the amount of repairs thereto. If it becomes necessary for you to employ a collection agency and/or an attorney to collect this amount, I the undersigned agree to pay all court cost plus a reasonable attorney’s fee and/or collection agency fee. Notice- A storage fee will be charged if motorcycle is in shop (10) days after completion. Any installed aftermarket part or accessory may void factory warranty</p>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 20px 0 10px; ">
				<div class="form-field" style="float: left; width: 100%">
					<label>Customer Signature:</label>
					<input type="text" style="width: 40%; margin-top: 14px;">
				</div>
			</div>
			
		</div>
	</div>
            
            
	</div></div>
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
