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
			<h2 style="float: left; width: 100%; margin: 30px 0 0; font-size: 20px; text-align: center;margin-bottom: 25px;"><b>FUNBIKE CENTER CONSIGNMENT AND SALES AGREEMENT</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 8px 60px;">
			<div class="form-field" style="float: left; width: 22%;">
				<label>Consignor:</label>
				<input type="text" name="customer_data"  value="<?php echo isset($info['customer_data']) ? $info['customer_data'] :  $info['first_name']." ".$info['last_name']; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 23%;">
				<label>Cell Phone:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>Work Phone:</label>
				<input type="text" name="work_number" value="<?php echo isset($info["work_number"]) ? $info['work_number'] : '';?>" style="width: 58%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 90%; margin: 7px 60px;">
			<p style="float: left; width: 100%; margin: 10px 0;">I (We), the undersigned consignor(s), hereby consign and deliver possession of my (our) vehicle, which is a <span><input type="text" style="width: 4%;" name="vehicle_year" value="<?php echo isset($info["vehicle_year"]) ? $info['vehicle_year'] : ''?>"/></span>, <span><input type="text" style="width: 10%;" name="vehicle_make" value="<?php echo isset($info["vehicle_make"]) ? $info['vehicle_make'] : ''?>" /></span>, <span><input type="text" name="vehicle_model" style="width: 20%;" value="<?php echo isset($info["vehicle_model"]) ? $info['vehicle_model'] : ''?>" /></span>, <span><input type="text" name="vehicle_vin" style="width: 20%;" value="<?php echo isset($info["vehicle_vin"]) ? $info['vehicle_vin'] : ''?>" /></span>,<br>to FUN BIKE CENTER for the soles purpose of selling the vehicle and paying, to the consigner or his or her designee from the proceeds of the sale of the vehicle, the amount agreed upon under terms of this agreement. This agreements is effective and valid only for a period of 30 days from this date.</p>

			<p style="float: left; width: 100%; margin: 10px 0;">At the termination of this agreement, the consignee shall return the vehicle to the consignor, or, at the option of both the
			consignor and consignee, enter into a new agreement.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">If the vehicle is sold by the consignee during the term of this agreement, the money due the consignor only after the lien amount is satisfied, shall be disbursed within 20 days after the date of sale in accordance with the terms of this agreement. As used in this agreement, a "sale" occurs when the consignee either (A) receives the purchase price or its equivalent or executes a conditional sales contract for the vehicle, or (B) when the purchaser takes delivery of the vehicle, whichever occurs first.</p>
			<p style="float: left; width: 100%; margin: 10px 0;">The following information shall be completed prior to the signing of this agreement:</p>

			<p style="float: left; width: 100%; margin: 10px 0 2px;">Moneys to the consignor will be a flat fee of $, less
				<span>
					<input type="text" name="money" value="<?php echo isset($info['money']) ? $info['money'] : ''; ?>" style="width: 20%;"> 
				</span>
			</p>
			<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">Outstanding liens and authorization for payoff</p>
			

			<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">Consignors account #:
				<span>
					<input type="text" name="account_num" value="<?php echo isset($info['account_num']) ? $info['account_num'] : ''; ?>" style="width: 20%;"> 
				</span>
			</p>

			<p style="float: left; width: 100%; margin: 2px 278px;">Bank Name:
				<span>
					<input type="text" name="bank_name" value="<?php echo isset($info['bank_name']) ? $info['bank_name'] : ''; ?>" style="width: 28%;"> 
				</span>
			</p>

			<p style="float: left; width: 97.5%; margin: 2px 11px; text-align: center;">Physical mailing address:
				<span>
					<input type="text" name="mail_address" value="<?php echo isset($info['mail_address']) ? $info['mail_address'] : ''; ?>" style="width: 18%;"> 
				</span>
			</p>

			<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">City, State, and Zip:
				<span>
					<input type="text" name="address_data"  value="<?php echo isset($info['address_data']) ? $info['address_data'] :  $info['city'].','.$info['state'].','.$info['zip']; ?>" style="width: 22.4%;"> 
				</span>
			</p>

			<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">Phone:
				<span>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 11%;"> 
				</span>
				Spoke with:
				<span>
					<input type="text" name="spoke" value="<?php echo isset($info['spoke']) ? $info['spoke'] : ''; ?>" style="width: 11%;"> 
				</span>
			</p>

			<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">Pay-off amount:
				<span>
					<input type="text" name="pay_off" value="<?php echo isset($info['pay_off']) ? $info['pay_off'] : ''; ?>" style="width: 8%;"> 
				</span>
				Valid till:
				<span>
					<input type="text" name="valid" value="<?php echo isset($info['valid']) ? $info['valid'] : ''; ?>" style="width: 10%;"> 
				</span>
			</p>



			<p style="float: left; width: 100%; margin: 10px 0;">The consigned vehicle is delivered to the consignee in trust for the exact terms set fourth in this agreement. The consignee agrees to receive this vehicle in trust and not to permit its use for any other purpose other then contained in this agreement with the express written consent of the consignor.</p>

			<p style="float: left; width: 100%; margin: 10px 0;">Upon payment of the moneys due the consignor, the consignor agrees to furnish the consignee those documents necessary to transfer the ownership of the vehicle to the purchaser.</p>

			<p style="float: left; width: 100%; margin: 10px 0;">Signatures:</p>

			<div class="row" style="float: left; width: 100%; margin: 0 0px 16px;">
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="consignor1" value="<?php echo isset($info['consignor1'])?$info['consignor1']:''; ?>" style="width: 98.5%;">
					<label style="text-align: left; display: block; float: left;">Consignor</label>
					
				</div>

				<div class="form-field" style="float: left; width: 43%;">
					<label style="text-align: left; display: block; float: left;">Date:</label>
					<input type="text" name="consignor1_date" value="<?php echo isset($info['consignor1_date'])?$info['consignor1_date']:''; ?>" style="width: 30%;">
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 0 0px 16px;">
				<div class="form-field" style="float: left; width: 50%;">
					<input type="text" name="sign_address" value="<?php echo isset($info['sign_address'])?$info['sign_address']:''; ?>" style="width: 93.5%;">
					<label style="text-align: left; display: block; float: left;">Address City State Zip</label>
					
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 0 0px 5px;">
				<div class="form-field" style="float: left; width: 30%;">
					<input type="text" name="consignor2" value="<?php echo isset($info['consignor2'])?$info['consignor2']:''; ?>" style="width: 98.5%;">
					<label style="text-align: left; display: block; float: left;">Consignor</label>
					
				</div>

				<div class="form-field" style="float: left; width: 43%;">
					<label style="text-align: left; display: block; float: left;">Date:</label>
					<input type="text" name="consignor2_date" value="<?php echo isset($info['consignor2_date'])?$info['consignor2_date']:''; ?>" style="width: 30%;">
				</div>
			</div>

			<p style="float: left; width: 100%; margin: 0px;">5755 Kearny Villa Rd, San Diego CA 92123</p>
			<p style="float: left; width: 100%; margin: 0px;">Address City State Zip</p>
			<p style="float: left; width: 100%; margin: 0px;"><b>NOTICE TO CONSIGNOR:</b>Failure of the consignee to comply with the terms of this agreement may be a violation of statute
			which could result in criminal or administrative sanctions, or both. If you feel the consignee has not complied with the terms of this agreement, please contact the Department of Motor Vehicles, Division of Investigations and Occupational Licensing, Bureau of Investigations, via the local Department of Motor Vehicles office.</p>

			<p style="float: left; width: 100%; margin: 20px 0px 0px;">Due to privacy policy acts, Fun Bike Center can not disclose information to the consignee regarding the sale of the vehicle, for example the buyers information, the amount the consigned vehicle was sold for, and all other details associated with the sale.</p>
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
