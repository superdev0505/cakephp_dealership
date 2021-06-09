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
	.wraper.main input {padding: 2px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.motor{margin-top:-35px !important;}

	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="float: left; width: 25%; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/piqus.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right-side" style="float: right; width: 72%; margin: 0;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 40%;">
						<label>Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%;">
					</div>
					
					<div class="form-field" style="float: right; width: 40%; margin: 0 0 10px;">
						<label>Sales Associate</label>
						<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 61%;">
					</div>
					<div style="clear: both;"></div>
					<div class="form-field" style="float: right; width: 40%;">
						<label>Sales Manager</label>
						<input type="text" name="salesmanager" value="<?php echo isset($info['salesmanager'])?$info['salesmanager']:''; ?>" style="width: 62%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 65%;">
						<label>Guest</label>
						<input type="text" name="guest" value="<?php echo isset($info['guest'])?$info['guest']: $info['first_name']." ".$info['last_name']; ?>" style="width: 89%;">
					</div>
					
					<div class="form-field" style="float: right; width: 35%;">
						<label>Country</label>
						<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : "" ?>" style="width: 75%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 35%;">
						<label>Address</label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 76%;">
					</div>
					
					<div class="form-field" style="float: left; width: 25%;">
						<label>City</label>
						<input type="text" name="city" value="<?php echo isset($info["city"]) ? $info["city"] : $info["city"] ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 20%;">
						<label>State</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 68%;">
					</div>
					<div class="form-field" style="float: right; width: 20%;">
						<label>Zip</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 77%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Contact Phone</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 84%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 40%;">
						<label>E-Mail</label>
						<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : "" ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>D.O.B.</label>
						<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: right; width: 30%;">
						<label>DL</label>
						<input type="text" name="dl" value="<?php echo isset($info['dl'])?$info['dl']:''; ?>" style="width: 86%;">
					</div>
				</div>
				
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<h2 style="width: 25%; font-size: 18px;margin-left: 115px;font-weight: bold;">TRADE-IN</h2>
			<div class="left" style="float: left; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>VIN# </label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 85%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label>Year </label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 34%;">
						<label>Make </label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 57%;">
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label>Model </label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 52%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage </label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Color </label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Payoff Amount $</label>
						<input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width: 59%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Name of Lienholder</label>
						<input type="text" name="lienholder" value="<?php echo isset($info['lienholder']) ? $info['lienholder'] : ''; ?>" style="width: 53%;">
					</div>
				</div>
			</div>

			<h2 class="motor" style="float: left; width: 32%;margin-left: 60px;margin-top:-20px; font-size: 18px; font-weight: bold;">PRE-OWNED MOTORCYCLE</h2>
			<div class="center" style="float: left; width: 32%; margin: 0 2%; height: 200px; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>VIN# </label>
						<input type="text" name="addon_vin" value="<?php echo isset($info['addon_vin'])?$info['addon_vin']:$addonVehicles[0]['AddonVehicle']['vin']; ?>" style="width: 85%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Year </label>
						<input type="text" name="addon_year" value="<?php echo (isset($info['addon_year']) && !empty($info['addon_year']))?$info['addon_year']:$addonVehicles[0]['AddonVehicle']['year']; ?>" style="width: 87%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Stock # </label>
						<input type="text" name="addon_stock" value="<?php echo (isset($info['addon_stock']) && !empty($info['addon_stock']))?$info['addon_stock']:$addonVehicles[0]['AddonVehicle']['stock_num']; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make </label>
						<input type="text" name="addon_make" value="<?php echo isset($info['addon_make'])?$info['addon_make']:$addonVehicles[0]['AddonVehicle']['make']; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Model </label>
						<input type="text" name="addon_model" value="<?php echo isset($info['addon_model'])?$info['addon_model']:$addonVehicles[0]['AddonVehicle']['model']; ?>" style="width: 68%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage </label>
						<input type="text" name="addon_mileage" value="<?php echo isset($info['addon_mileage'])?$info['addon_mileage']:$addonVehicles[0]['AddonVehicle']['odometer']; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Color</label>
						<input type="text" name="addon_color" value="<?php echo isset($info['addon_color'])?$info['addon_color']:$addonVehicles[0]['AddonVehicle']['unit_color']; ?>" style="width: 85%;">
					</div>
				</div>
			</div>	
			
			<h2 class="motor" style="float: left; width: 25%; margin-top: -20px;margin-left: 70px; font-size: 18px; font-weight: bold;">NEW MOTORCYCLE</h2>
			<div class="right" style="float: right; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>VIN# </label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 85%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Year </label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 87%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Stock # </label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make </label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Model </label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 68%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage </label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Color</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 85%;">
					</div>
				</div>
			</div>	
		</div>
		
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left" style="float: left; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 30px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>N.A.D.A BOOK VALUE</label>
						$ <input type="text" name="book_value" value="<?php echo isset($info['book_value'])?$info['book_value']:''; ?>" style="width: 45%; float: right;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0 0 30px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>PHD APPRAISED VALUE</label>
						$ <input type="text" name="appraised_value" value="<?php echo isset($info['appraised_value'])?$info['appraised_value']:''; ?>" style="width: 40%; float: right;">
					</div>
				</div>
			</div>
			
			<div class="center" style="float: left; width: 32%; margin: 0 2%; height: 145px; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<textarea class="plus_cost1" name="plus_cost1" style="width: 50%; height: 35px; border: 0; margin-top: 40px;font-size: 20px;font-weight: bold;text-align: center;"><?php echo isset($info['plus_cost1'])?$info['plus_cost1']:'' ?></textarea>
						<label style="display: block; width: 100%; text-align: center; padding: 5px 0; border-top: 1px solid #000;margin-top: 25px;">Plus Cost</label>
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<textarea class="plus_cost2" name="plus_cost2" style="width: 50%; height: 35px; border: 0; margin-left: 25%; margin-top: 40px;font-size: 20px;font-weight: bold;text-align: center;"><?php echo isset($info['plus_cost2'])?$info['plus_cost2']:'' ?></textarea>
						<label style="display: block; width: 100%; text-align: center; padding: 5px 0; border-top: 1px solid #000;margin-top: 24px;">Plus Cost</label>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left" style="float: left; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block; text-align: center;">INITIAL INVESTMENT (20% DOWN)</label>
						<textarea class="investment" name="investment" style="width: 50%; height: 35px; border: 0; margin-left: 25%; margin-top: 20px;font-size: 20px;font-weight: bold;text-align: center;"><?php echo isset($info['investment'])?$info['investment']:'' ?></textarea>
						<label style="display: block; margin-top: 25px;"></label>
					</div>
				</div>
			</div>
			
			<div class="center" style="float: left; width: 32%; margin: 0 2%; height: 125px; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block; text-align: center;">Terms</label>
						<input type="checkbox" style="width: 15%; margin-top: 30px;margin-left: -13px;" name="terms_status" value="48" <?php echo (isset($info['terms_status'])&& $info['terms_status']== '48')?'checked':''; ?> />48
						
						<input type="checkbox" style="width: 15%; margin-top: 30px;" name="terms_status" value="60" <?php echo (isset($info['terms_status'])&& $info['terms_status']== '60')?'checked':''; ?> />60
						
						<input type="checkbox" style="width: 15%; margin-top: 30px;" name="terms_status" value="72" <?php echo (isset($info['terms_status'])&& $info['terms_status']== '72')?'checked':''; ?> >72
						
						<input type="checkbox" style="width: 15%; margin-top: 30px;" name="terms_status" value="84" <?php echo (isset($info['terms_status'])&& $info['terms_status']== '84')?'checked':''; ?> >84
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 32%; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="display: block; text-align: center;">Payment Range</label>
						<textarea class="payment_range" name="investment" style="width: 50%; height: 35px; border: 0; margin-left: 25%;margin-top: 20px;font-size: 20px;font-weight: bold;text-align: center;"><?php echo isset($info['payment_range'])?$info['payment_range']:'' ?></textarea>
						<label style="display: block; margin-top: 24px;"></label>
					</div>
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 0 0 20px; font-size: 14px; text-align: center;">I hereby indicate my intent to purchase a motorcycle. I have the ability, or can obtain suffcient funds, to complete the transaction. I authorize <br> the dealer to investigate my credit and employment history to evaluate my ability to purchase the above referenced motorcycle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 46%;">
				<label>Customer Signature</label>
				<input type="text" name="customer_signature" value="<?php echo isset($info['customer_signature'])?$info['customer_signature']:''; ?>" style="width: 62%;">
			</div>
			<div class="form-field" style="float: right; width: 46%;">
				<label>Manager Signature</label>
				<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign'])?$info['manager_sign']:''; ?>" style="width: 57%;">
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
