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
	<div id="worksheet_container" style="width: 1030px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 13px; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
@media print {
.left-text{background:#000 !important;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
.form-field {height: 63px !important;}

	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="float: left; width: 15%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Form_4054.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="text" style="float: right; margin: 50px 16px 0 0; width: 83%;">
				<h2 style="font-size: 18px; margin: 0;">Missouri Department of Revenue</h2>
				<strong style="text-decoration: underline; font-size: 18px; display: block;">Power of Attorney</strong>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 auto;">
			I (we) hereby appoint, 
			<span style=" display: inline-block; position: relative; top: 22px; width: 50%;">
				<input type="text" name="appoint" value="<?php echo isset($info['appoint']) ? $info['appoint'] : ''; ?>" style="width: 100%; border-bottom: 1px solid #000; margin: 0 0 4px 0;">
				(If insurance company involving total loss, complete boxes immediately below.)
				<div class="field-inner" style=" border: 1px solid #000; box-sizing: border-box; float: left; margin: 11px 0 34px; width: 100%;">
					<div class="form-field" style="float: left; width: 60%; border-right: 1px solid #000; height: 40px;">
						<label style="padding: 0 4px;">Insurance Company Name</label>
						<input type="text" name="agent_company" value="<?php echo isset($info['agent_company']) ? $info['agent_company'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 39%;">
						<label style="padding: 0 4px;">Date of Total Loss</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="margin: 0.6% 1% 2px; width: 30%;">
						</div>
					</div>
				</div>
			</span>
			
			as my (our) attorney-in-fact for the <br> purpose of:
			
			<div class="row-inner" style="float: left; width: 100%;">
				<div class="upper" style="float: left; width: 100%; margin: 18px 0;">
					<span style="display: block;"><input type="checkbox" name="described_status" <?php echo ($info['described_status'] == "transfer") ? "checked" : ""; ?> value="transfer"> Transferring ownership for the following described unit:</span>
					<span style="display: block;"><input type="checkbox" name="described_status" <?php echo ($info['described_status'] == "making") ? "checked" : ""; ?> value="making"> Making application for title for the following described unit:</span>
					<span style="display: block;"><input type="checkbox" name="described_status" <?php echo ($info['described_status'] == "regist") ? "checked" : ""; ?> value="regist"> Making application for registration for the following described unit:</span>
				</div>
			</div>
			
			<div class="lower" style="float: left; width: 100%; margin: 7px 0 ; border: 1px solid #000;">
				<div class="form-field" style="float: left; width: 15%; border-right: 1px solid #000;">
					<label style="display: block; padding: 0 4px;">Year (YYYY)</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 30%;padding-left: 5px;">
				</div>
				<div class="form-field line" style="float: left; width: 20%; height: 40px; border-right: 1px solid #000;">
					<label style="padding: 0 4px;">Make</label>
					<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="float: left; width: 100%;    padding-left: 5px;">
				</div>
				<div class="form-field" style="float: left; width: 60%;">
					<label style="padding: 0 4px;">Identification Number</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="float: left; width: 100%;    padding-left: 5px;">
				</div>
			</div>
		</div>
		<span>with the full authority to sign on my (our) behalf all papers and documents and to do all that is necessary to this appointment.</span>
		
		
		<!-- Purchaser start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/sign.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000;">
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px;">
						<label >Owner's Printed Name</label>
						<input type="text" name="owner_name1" value="<?php echo isset($info['owner_name1']) ? $info['owner_name1'] : ''; ?>" style="width: 100%;">
					</div>	
				</div>
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 66%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 40px;">
						<label>Owner's Signature*</label>
						<input type="text" name="sign1" value="<?php echo isset($info['sign1']) ? $info['sign1'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 33%;">
						<label>Date (MM/DD/YYYY)</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 30%; margin: 0.6% 1% 2px; ">
						</div>
					</div>
				</div>
				
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px;">
						<label>Owner's Printed Name</label>
						<input type="text" name="owner_name2" value="<?php echo isset($info['owner_name2']) ? $info['owner_name2'] : ''; ?>" style="width: 100%;">
					</div>	
				</div>
				
					
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 66%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 40px;">
						<label>Owner's Signature*</label>
						<input type="text" name="sign2" value="<?php echo isset($info['sign2']) ? $info['sign2'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 33%;">
						<label>Date (MM/DD/YYYY)</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 30%; margin: 0.6% 1% 2px; ">
						</div>
					</div>
				</div>
				
				
				
				<div class="fields-outer" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 0 3px;">
						<label>Owner's Printed Name</label>
						<input type="text" name="owner_name3" value="<?php echo isset($info['owner_name3']) ? $info['owner_name3'] : ''; ?>" style="width: 100%;">
					</div>	
				</div>
				
					
				
				<div class="fields-outer" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 66%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 40px;">
						<label>Owner's Signature*</label>
						<input type="text" name="sign3" value="<?php echo isset($info['sign3']) ? $info['sign3'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; box-sizing: border-box; padding: 0 3px; width: 33%;">
						<label>Date (MM/DD/YYYY)</label>
						<div class="number-field" style="float: left; width: 100%;">
							<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 30%; margin: 0.6% 1% 2px; ">
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	
		<!-- Purchaser end -->	
			
		<!-- Notary Information Start -->
			<div class="row" style="float: left; width: 100%; margin: 7px 0; position: relative;">
			<div class="left-text">
				<img style="float: left;padding: 5px 0;" src="<?php echo ('/app/webroot/img/notary.png'); ?>">
			</div>
			<div class="right-side" style="float: right; width: 96%; border: 1px solid #000;">
				<div class="fields-outer" style="float: left; width: 100%;">
					<div class="form-field-inner" style="float: left; width: 35%; box-sizing: border-box; padding: 0 3px;">
						<label>Embosser or black ink rubber stamp seal<sup>*</sup></label>
						<textarea class="embosser" value="embosser" style="width: 100%; height: 143px; border: 0px;"><?php echo isset($info['embosser'])?$info['embosser']:'' ?></textarea>
					</div>
					
					
					
					
					<div class="form-field-inner" style="float: left; width: 65%; border-left: 1px solid #000; box-sizing: border-box;  ">
						
						<div class="notary-group" style="width: 100%; float: left; border-bottom: 1px solid #000;">
							<div class="form-field" style="float: left; width: 100%; height: 40px;">
								<label style="display: block; padding: 0 3px;">Subscribed and sworn before me, this</label>
								<div class="days-of" style="float: left; width: 100%;">
									<input type="text" name="sworn" value="<?php echo isset($info['sworn']) ? $info['sworn'] : ''; ?>" style="width: 30%;"> day of <input type="text" name="sworn_day" value="<?php echo isset($info['sworn_day']) ? $info['sworn_day'] : ''; ?>" style="width: 30%;"> year <input type="text" name="sworn_year" value="<?php echo isset($info['sworn_year']) ? $info['sworn_year'] : ''; ?>" style="width: 20%;">
								</div>
							</div>
						</div>
						
						<div class="notary-group" style="width: 100%; float: left; border-bottom: 1px solid #000;">
							<div class="form-field line" style="height: 40px; float: left; width: 19%; border-right: 1px solid #000;">
								<label style="display: block; padding: 0 3px;">State</label>
								<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
							</div>
							
							<div class="form-field line" style="height: 40px; float: left; width: 30%; border-right: 1px solid #000;">
								<label style="display: block; padding: 0 3px;">County (or City of St. Louis)</label>
								<input type="text" name="county" value="<?php echo isset($info['county']) ? $info['county'] : ''; ?>" style="width: 100%;">
							</div>
							
							<div class="form-field" style="float: left; width: 50%; ">
								<label style="display: block; padding: 0 3px;">My Commission Expires (MM/DD/YYYY)</label>
								<input type="text" name="expire_date" value="<?php echo isset($info['expire_date']) ? $info['expire_date'] : ''; ?>" style="width: 100%;">
							</div>
						</div>
						
						<div class="notary-group" style="width: 100%; float: left; border-bottom: 1px solid #000;">
							<div class="form-field" style="float: left; height: 40px; width: 100%;">
								<label style="display: block; padding: 0 3px;">Notary Public Signature</label>
								<input type="text" name="notary_sign" value="<?php echo isset($info['notary_sign']) ? $info['notary_sign'] : ''; ?>" style="width: 100%;">
							</div>
						</div>
						
						<div class="notary-group" style="width: 100%; float: left;">
							<div class="form-field" style="float: left; width: 100%; height: 40px;">
								<label style="display: block; padding: 0 3px;">Notary Public Name (Typed or Printed)</label>
								<input type="text" name="notary_name" value="<?php echo isset($info['notary_name']) ? $info['notary_name'] : ''; ?>" style="width: 100%;">
							</div>
						</div>
					</div>
					
					
					
				</div>
								
			</div>
		</div>
		<!-- Notary Information End -->		
		
		<p style="float: left; width: 100%; font-size: 14px;"> <sup>*</sup> Owner(s) electronic signature is permissible ONLY when assigning power of attorney to an insurance company due to total loss. Notarization is not required if signing electronically.</p>
		
		<!-- footer content start -->
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="width: 83%; float: left; font-size: 14px;">
				<div class="address" style="float: left; width: 37%;">
					<strong style="float: left; width: 22%;">Mail to:</strong>
					<div class="right-text" style="float: right; width: 77%">
						Motor Vehicle Bureau <br> P.O. Box 100 <br> Jefferson City, MO 65105-0100 
					</div>
				</div>

				<div class="phone" style="width: 32%; float: left; padding: 0 3%;">
					<p style="margin: 0;"><strong>Phone:</strong> (573) 526-3669</p>
					<p style="margin: 0;"><strong>E-mail:</strong> <a href="#">mvbmail@dor.mo.gov</a></p>
				</div>
				
				<p style="float: left; width: 30%; margin: 0;">Visit <a href="#">http://dor.mo.gov/motorv/</a><br>for additional information.</p>
			</div>
			<div class="right" style="float: right; width: 16%;">
				<p style="margin: 0; font-size: 12px; text-align: right;">Form 4054 (Revised 08-2015)</p>
				<div class="qr-code" style="float: right; margin: 9px 0 0; width: 100px;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/qr-code.png'); ?>" alt="" style="width: 100%;">
				</div>
			</div>
		</div>
		<!-- footer content end -->
		
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
