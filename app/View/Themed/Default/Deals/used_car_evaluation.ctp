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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
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
			<div class="logo" style="width: 200px; margin: 20px auto; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<h3 style="float: right; margin: 20px 0;">Used Car Evaluation</h3>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="right" style="float: right; width: 35%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label style="float: left; width: 30%; text-align: right;">Date</label>
					<input type="text" name="date_data" value="<?php echo date("m/d/Y"); ?>" style="width: 67%; margin-left: 7px;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label style="float: left; width: 30%; text-align: right;">Salesperson</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 67%; margin-left: 7px;">
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 17px;"><b>Owner Information</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Owner</label>
				<input type="text" name="owner_name" value="<?php echo isset($info['owner_name'])?$info['owner_name']:$info['first_name']." ".$info['last_name']; ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>Co-Owner</label>
				<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name']) ? $info['co_buyer_name'] : $info['spouse_first_name'].' '.$info['spouse_last_name']; ?>" style="width: 85%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 93%; ">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Work Phone</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Home Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 73%;">
			</div>
			<div class="form-field" style="float: right; width: 33%;">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
			
		<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 17px;"><b>Vehicle Information</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Trade</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Model Type</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 71%;">
			</div>
			<div class="form-field" style="float: right; width: 10%;">
				<label>Cyl</label>
				<input type="text" name="cyl" value="<?php echo isset($info['cyl']) ? $info['cyl'] : ''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Body Style</label>
				<input type="text" name="body_style" value="<?php echo isset($info['body_style']) ? $info['body_style'] : ''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>Trans</label>
				<input type="text" name="trans" value="<?php echo isset($info['trans']) ? $info['trans'] : ''; ?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Trim</label>
				<input type="text" name="trim" value="<?php echo isset($info['trim']) ? $info['trim'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: right; width: 40%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 88%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>How many miles are on the odometer?</label>
				<input type="text" name="odometer_status" value="<?php echo isset($info['odometer_status']) ? $info['odometer_status'] : ''; ?>" style="width: 40%;">
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>Does the odometer reflect the true mileage?</label>
				<input type="checkbox" name="mileage_status" <?php echo ($info['mileage_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="mileage_status" <?php echo ($info['mileage_status'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>When was your last service performed?</label>
				<input type="text" name="service_status" value="<?php echo isset($info['service_status']) ? $info['service_status'] : ''; ?>" style="width: 38%;">
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>Can you provide records for servicing?</label>
				<input type="checkbox" name="record_status" <?php echo ($info['record_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="record_status" <?php echo ($info['record_status'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Has your vehicle been damaged?</label>
				<input type="checkbox" name="vehicle" <?php echo ($info['vehicle'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="vehicle" <?php echo ($info['vehicle'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>If Yes, approximate dollar amount $</label>
				<input type="text" name="dollar_status" value="<?php echo isset($info['dollar_status']) ? $info['dollar_status'] : ''; ?>" style="width: 48%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Will any equipment be removed?</label>
				<input type="checkbox" name="equip_status" <?php echo ($info['equip_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="equip_status" <?php echo ($info['equip_status'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>If Yes, What?</label>
				<input type="text" name="equipment" value="<?php echo isset($info['equipment']) ? $info['equipment'] : ''; ?>" style="width: 79%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Are any mechanical repairs necessary?</label>
				<input type="checkbox" name="mechanical_status" <?php echo ($info['mechanical_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="mechnical_status" <?php echo ($info['mechnical_status'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>If Yes, What?</label>
				<input type="text" name="mechanical" value="<?php echo isset($info['mechanical']) ? $info['mechanical'] : ''; ?>" style="width: 79%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Was your vehicle purchased new?</label>
				<input type="checkbox" name="purchase_status" <?php echo ($info['purchase_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
				<input type="checkbox" name="purchase_status" <?php echo ($info['mechnical_status'] == "N") ? "checked" : ""; ?> value="N"> N  
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>Who holds title? </label>
				<input type="text" name="purchased" value="<?php echo isset($info['purchased']) ? $info['purchased'] : ''; ?>" style="width: 73%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px;">
			<div class="left" style="float: left; width: 66%;">
				<div class="form-field" style="float: right; width: 100%;">
					<label>Have you maintained your vehicle according to factory requirements?</label>
					<input type="checkbox" name="factory_status" <?php echo ($info['factory_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
					<input type="checkbox" name="factory_status" <?php echo ($info['factory_status'] == "N") ? "checked" : ""; ?> value="N"> N  
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 10px 0;">
					<label>Would you be willing to recommend your vehicle to a friend or neighbor?</label>
					<input type="checkbox" name="friend_status" <?php echo ($info['friend_status'] == "Y") ? "checked" : ""; ?> value="Y"> Y  
					<input type="checkbox" name="friend_status" <?php echo ($info['friend_status'] == "N") ? "checked" : ""; ?> value="N"> N
				</div>
				<div class="graph">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/graph.jpg'); ?>" alt="" style="width: 100%;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 30%; border: 1px solid #000; padding: 7px 7px 20px;">
				<b style="text-align: center; display: block; margin: 7px 0 45px;">IS YOUR TRADE TITLE<br> BRANDED BY ANY OF THE<br> FOLLOWING?</b>
				<b style="text-align: center; display: block; margin: 7px 0 45px;">IF YES, CIRCLE THOSE THAT<br> APPLY SCRATCH THROUGH<br> THOSE THAT DO NOT.</b>
				<b style="display: block; margin: 7px 0 10px;">FRAME DAMAGE</b>
				<b style="display: block; margin: 7px 0 10px;">TRUE MILEAGE UNKNOWN</b>
				<b style="display: block; margin: 7px 0 10px;">SALVAGE</b>
				<b style="display: block; margin: 7px 0 10px;">FLOOD VEHICLE</b>
				<b style="display: block; margin: 7px 0 45px;">FACTORY BUY BACK</b>
				<div class="form-field" style="float: left; width: 100%;">
					<label>INITIALS</label>
					<input type="text" name="initials" value="<?php echo isset($info['initials']) ? $info['initials'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 16px;">BY MY SEAL BELOW: I DO HEREBY STATE THAT ALL CONDITIONS REPRESENTED ABOVE<br>
ARE A TRUE AND ACCURATE REPRESENTATION TO THE BEST OF MY KNOWLEDGE.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Owner's Signature</label>
				<input type="text" name="owner_sign" value="<?php echo isset($info['owner_sign']) ? $info['owner_sign'] : ''; ?>" style="width: 69%;">
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>Co-Owner's Signature</label>
				<input type="text" name="co_owner_sign" value="<?php echo isset($info['co_owner_sign']) ? $info['co_owner_sign'] : ''; ?>" style="width: 69%;">
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
