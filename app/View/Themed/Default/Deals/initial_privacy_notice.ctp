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
			<div class="logo" style="width: 200px; margin: 20px auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<p style="float: left; width: 100%; margin: 10px 0;">Initial Privacy Notice</p>
			<p style="float: left; width: 100%; margin: 10px 0;">The following discloses the information gathering practices for our company. In connection with your transaction, we may obtain nonpublic personal information about you and that information will be stated in this notice.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0;">Nonpublic personal information includes, but is not limited to, name, address, zip code, e-mail address, phone number,
social security number, birth date, credit card information, account numbers and balances, payment history, names of
parties to transactions and any other information that itself identifies or, when tied to the above information, may identify
you as a specific individual.</p>

			<p style="float: left; width: 100%; margin: 10px 0;">We collect personal nonpublic information about you from the following sources:</p>
			<p style="float: left; width: 100%; margin: 10px 0 0 5%;">1. Information we receive from you on the application for credit and other similar forms,</p>
			<p style="float: left; width: 100%; margin: 10px 0 0 5%;">2. Information about your transactions with us and other external businesses, including financial institutions and
their affiliates, and</p>
			<p style="float: left; width: 100%; margin: 10px 0 0 5%;">3. Information we receive form the consumer credit reporting agency</p>
			<p style="float: left; width: 100%; margin: 10px 0 0;">With your prior authorization,CTC of VA will submit your nonpublic personal information to selected financial
institutions to perform services related to the funding of your loan. In some cases the financial institutions may contact
you directly in order to perform services relating to the funding of your loan.</p>
			<p style="float: left; width: 100%; margin: 10px 0 0;">It is the policy of CTC of VA NOT to disclose personal nonpublic information to non-financial companies, such as
magazine publishers, retailers, direct marketers or nonprofit organizations.</p>
			<p style="float: left; width: 100%; margin: 10px 0 0;">We do not disclose any nonpublic personal information about you except as permitted by law.</p>
			<p style="float: left; width: 100%; margin: 10px 0 0;">Access to your nonpublic personal information is restricted to selected CTC of VA employees and other authorized
third parties such as state and federal regulatory authorities that perform periodic quality control reviews for the protection
of consumers. Employees of CTC of VA are not permitted to use your information for any other purpose. For your
safety we maintain physical, electronic and procedural safeguards that comply with federal regulations to further guard
your nonpublic personal information from unauthorized access.</p>
			<p style="float: left; width: 100%; margin: 10px 0 0;">Please be aware that it is our policy to disclose the above nonpublic personal information to only those companies that
perform marketing services on behalf or to financial institutions with which we have joint marketing agreements.
Information provided to companies that provide marketing services may include your name, address, zip code, e-mail
address and phone number.</p>

		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="right-side" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label>Customer Name</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label>Address</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<input type="text" name="city_state_zip" value="<?php echo isset($info['city_state_zip']) ? $info['city_state_zip'] : $info['city'].', '.$info['state'].', '.$info['zip']; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label>City, State, Zip</label>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0;">
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
					<label>Telephone</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
				<input type="text" name="cus_name1" value="<?php echo isset($info['cus_name1']) ? $info['cus_name1'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Name (Please Print)</label>
			</div>
				
			<div class="form-field" style="float: left; width: 35%; margin: 3px 2%;">
				<input type="text" name="cus_sign1" value="<?php echo isset($info['cus_sign1']) ? $info['cus_sign1'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Signature</label>
			</div>
				
			<div class="form-field" style="float: left; width: 26%; margin: 3px 0;">
				<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Date</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
				<input type="text" name="cus_name2" value="<?php echo isset($info['cus_name2']) ? $info['cus_name2'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Name (Please Print)</label>
			</div>
				
			<div class="form-field" style="float: left; width: 35%; margin: 3px 2%;">
				<input type="text" name="cus_sign2" value="<?php echo isset($info['cus_sign2']) ? $info['cus_sign2'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Customer Signature</label>
			</div>
				
			<div class="form-field" style="float: right; width: 26%; margin: 3px 0;">
				<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Date</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 35%; margin: 3px 0;">
				<input type="text" name="commercial_truck" value="<?php echo isset($info['commercial_truck']) ? $info['commercial_truck'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Commercial Truck Center of VA Representative</label>
			</div>
				
			<div class="form-field" style="float: left; width: 35%; margin: 3px 2%;">
				<input type="text" name="commercial_sign" value="<?php echo isset($info['commercial_sign']) ? $info['commercial_sign'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Commercial Truck Center of VA Representitive Signature</label>
			</div>
				
			<div class="form-field" style="float: right; width: 26%; margin: 3px 0;">
				<input type="text" name="date3" value="<?php echo isset($info['date3']) ? $info['date3'] : ''; ?>" style="float: left; width: 100%; margin: 7px 0;">
				<label>Date</label>
			</div>
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
