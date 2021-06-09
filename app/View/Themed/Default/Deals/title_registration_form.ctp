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

<div class="wraper main" id="worksheet_wraper"  style=" overflow: hidden;"> 
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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
	.rect input[type="text"]{border-bottom: 0px !important;}
@media print {
	.dontprint{display: none;}
	label{height: 21px !important; line-height: 21px !important;}
	p {margin: 10px 0 !important; font-size: 20px !important;}
	input {padding: 7px !important;}
	.customer4 {background-color: red !important;}
	.input-color {
		-webkit-print-color-adjust: exact;
		}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		
		<div class="row" style="float: left; width: 100%; margin: 0px 60px;">
			<div class="logo" style="width: 200px;">
				<h1 style="font-size: 26px;font-weight: 700;font-family: fantasy;">RVs NORTHWEST</h1>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 15px 0 12px; font-size: 20px; text-align: center;">TITLING AND REGISTRATION INFORMATION</h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 22%;">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 28%;">
				<label>DELIVERY DATE</label>
				<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 58%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>SALESPERSON</label>
				<input type="text" name="sperson" value="<?php echo isset($info["sperson"]) ? $info['sperson'] : '';?>" style="width: 58%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>STOCK #</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 69%;">
			</div>
			<div class="form-field" style="float: left; width: 29%;">
				<label>SALESPERSON</label>
				<input type="text" name="sperson1" value="<?php echo isset($info["sperson1"]) ? $info['sperson1'] : '';?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 92%;">
				<label>CUSTOMER(S)</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 74%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 36%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info["vin"]) ? $info['vin'] : '';?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 47%;">
				<label>CHASSIS#</label>
				<input type="text" name="chassis" value="<?php echo isset($info["chassis"]) ? $info['chassis'] : '';?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>ACTUAL MILES</label>
				<input type="text" name="actual_miles" value="<?php echo isset($info["actual_miles"]) ? $info['actual_miles'] : '';?>" style="width: 56%;">
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<label>PLATE</label>
				<input type="text" name="plate" value="<?php echo isset($info["plate"]) ? $info['plate'] : '';?>"  style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 19%;">
				<label>PLATE #</label>
				<input type="text" name="plate_num" value="<?php echo isset($info["plate_num"]) ? $info['plate_num'] : '';?>" style="width: 67%;">
			</div>
			<div class="form-field" style="float: left; width: 14%;">
				<label>EXP</label>
				<input type="text" name="exp" value="<?php echo isset($info["exp"]) ? $info['exp'] : '';?>" style="width: 72%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>DRY WEIGHT</label>
				<input type="text" name="dry_weight" value="<?php echo isset($info["dry_weight"]) ? $info['dry_weight'] : '';?>" style="width: 52%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>LENGTH</label>
				<input type="text" name="length" value="<?php echo isset($info["length"]) ? $info['length'] : '';?>" style="width: 57%;">
			</div>
			<div class="form-field" style="float: left; width: 59%;">
				<label>LIENHOLDER</label>
				<input type="text" name="lien_holder" value="<?php echo isset($info["lien_holder"]) ? $info['lien_holder'] : '';?>" style="width: 57.3%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 84%;">
				<label>LIENHOLDER ADDRESS</label>
				<input type="text" name="lienholder_address" value="<?php echo isset($info["lienholder_address"]) ? $info['lienholder_address'] : '';?>" style="width: 73.5%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 20%;">
				<input type="checkbox" name="soft_status" value="soft" <?php echo (isset($info['soft_status'])&&$info['soft_status']=='soft')?'checked="checked"':''; ?> />
				<label>SOFT APPLICATION</label>
			</div>
			<div class="form-field" style="float: left; width: 28%;">
				<input type="checkbox" name="purchase_status" value="purchase" <?php echo (isset($info['purchase_status'])&&$info['purchase_status']=='purchase')?'checked="checked"':''; ?> />
				<label>COPY OF PURCHASE ORDER</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<input type="checkbox" name="visible_status" value="visible" <?php echo (isset($info['visible_status'])&&$info['visible_status']=='visible')?'checked="checked"':''; ?> />
				<label>COPY OF D.L.(EXP.VISIBLE)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 15px 0 12px; font-size: 20px; text-align: center;font-family: fantasy;"><b>Liability Waiver</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;"><b>RVs Northwest policy is to provide our customers with the most accurate, updated information for traveling in and/or towing RV products. Our desire is for the safety of our customers.</b></p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My truck bed length is
					<span>
						<input class="input-color" type="text" name="waiver1" value="<?php echo isset($info['waiver1']) ? $info['waiver1'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span>
					ft  *My truck and camper are compatible                    
					<span>
						<input class="input-color" type="text" name="waiver2" value="<?php echo isset($info['waiver2']) ? $info['waiver2'] : ''; ?>" style="width: 10%; background-color: yellow !important;">
					</span>
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My Payload capacity
					<span>
						<input class="input-color" type="text" name="waiver3" value="<?php echo isset($info['waiver3']) ? $info['waiver3'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span>
					lbs  My Towing capacity is                    
					<span>
						<input class="input-color" type="text" name="waiver4" value="<?php echo isset($info['waiver4']) ? $info['waiver4'] : ''; ?>" style="width: 10%; background-color: yellow !important;">
					</span>
					lbs
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My Gross Vehicle Weight Rating is
					<span>
						<input class="input-color" type="text" name="waiver5" value="<?php echo isset($info['waiver5']) ? $info['waiver5'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span>
					lbs
				</p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;">My new Camper, trailer, 5th wheel, or similar weights
					<span>
						<input class="input-color" type="text" name="waiver6" value="<?php echo isset($info['waiver6']) ? $info['waiver6'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span>
					lbs
				</p>
			</div>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 89%;">
				<p style="float: left; width: 100%;margin: 7px 0;"><b>I completely understand that it is my responsibility to comply with recommendations and/or the factory guidelines. I acknowledge that my current tow vehicle does <span>
						<input class="input-color" type="text" name="vehilce" value="<?php echo isset($info['vehilce']) ? $info['vehilce'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span> or does<span>
						<input class="input-color" type="text" name="vehilce_not" value="<?php echo isset($info['vehilce_not']) ? $info['vehilce_not'] : ''; ?>" style="width: 10%; background-color: yellow !important;"> 
					</span> not comply. I agree that I have been recommended to upgrade my tow vehicle before driving if it does not meet guidelines or recommendations. I accept responsibility for any damages, legal liability, consequence and/or repercussion once possession is taken from RVs Northwest if I choose <span class="input-color" style="background-color: red !important;">not</span> to follow these terms and conditions. Possession is defined as my vehicle being attached to an RV aka truck camper, 5 th wheel, toy hauler, or travel trailer.</b></p>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 36%;">
				<label><b>My tow vehicle <span class="input-color" style="background-color: lightseagreen !important;">does</span> comply:</b></label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>CUSTOMER</label>
				<input class="input-color" type="text" name="customer1" value="<?php echo isset($info['customer1']) ? $info['customer1'] : ''; ?>" style="width: 81%; background-color: lightseagreen !important;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>DATE</label>
				<input class="input-color" type="text" name="customer1_date" value="<?php echo isset($info['customer1_date']) ? $info['customer1_date'] : ''; ?>" style="width: 70%; background-color: lightseagreen !important;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>CUSTOMER</label>
				<input class="input-color" type="text" name="customer2" value="<?php echo isset($info['customer2']) ? $info['customer2'] : ''; ?>" style="width: 81%; background-color: lightseagreen !important;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>DATE</label>
				<input class="input-color" type="text" name="customer2_date" value="<?php echo isset($info['customer2_date']) ? $info['customer2_date'] : ''; ?>" style="width: 70%; background-color: lightseagreen !important;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 36%;">
				<label>My tow vehicle does <span class="input-color" style="background-color: red !important;">not</span> comply:</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>CUSTOMER</label>
				<input class="input-color" type="text" name="customer3" value="<?php echo isset($info['customer3']) ? $info['customer3'] : ''; ?>" style="width: 81%; background-color: red !important;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>DATE</label>
				<input class="input-color" type="text" name="customer3_date" value="<?php echo isset($info['customer3_date']) ? $info['customer3_date'] : ''; ?>" style="width: 70%; background-color: red !important;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>CUSTOMER</label>
				<input class="input-color" type="text" class="customer4" name="customer4" value="<?php echo isset($info['customer4']) ? $info['customer4'] : ''; ?>" style="width: 81%; background-color: red !important;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label>DATE</label>
				<input class="input-color" type="text" name="customer4_date" value="<?php echo isset($info['customer4_date']) ? $info['customer4_date'] : ''; ?>" style="width: 70%; background-color: red !important;">
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

$(document).on("click", "input[type='radio']", function(){
    thisRadio = $(this);
    if (thisRadio.hasClass("imChecked")) {
        thisRadio.removeClass("imChecked");
        thisRadio.prop('checked', false);
    } else { 
        thisRadio.prop('checked', true);
        thisRadio.addClass("imChecked");
    };
})


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
