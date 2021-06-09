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
input[type="text"]{margin-bottom: 18px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Buyer Name</label>
				<input type="text" name="buyer_name" value="<?php echo isset($info['buyer_name']) ? $info['buyer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 68%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Co-Buyer Name</label>
				<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name'])?$info['co_buyer_name']:$info['spouse_first_name'].' '.$info['last_first_name']; ?>" style="width: 68%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Address</label>
				<input type="text" name="buyer_address1" value="<?php echo isset($info['buyer_address1'])?$info['buyer_address1']:$info['address']; ?>" style="width: 68%; float: right;">
				<input type="text" name="buyer_address2" value="<?php echo isset($info['buyer_address2'])?$info['buyer_address2']:$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Address</label>
				<input type="text" name="co_address1" value="<?php echo isset($info['co_address1'])?$info['co_address1']:''; ?>" style="width: 68%; float: right;">
				<input type="text" name="co_address2" value="<?php echo isset($info['co_address2'])?$info['co_address2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Home Phone #:</label>
				<input type="text" name="buyer_phone" value="<?php echo isset($info['buyer_phone'])?$info['buyer_phone']:$info['phone']; ?>" style="width: 68%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Home Phone #:</label>
				<input type="text" name="co_phone" value="<?php echo isset($info['co_phone'])?$info['co_phone']:''; ?>" style="width: 68%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Work Phone #:</label>
				<input type="text" name="buyer_work" value="<?php echo isset($info['buyer_work'])?$info['buyer_work']:$info['work_number']; ?>" style="width: 68%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Work Phone #:</label>
				<input type="text" name="co_work" value="<?php echo isset($info['co_work'])?$info['co_work']:''; ?>" style="width: 68%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Cell Phone #:</label>
				<input type="text" name="buyer_mobile" value="<?php echo isset($info['buyer_mobile'])?$info['buyer_mobile']:$info['mobile']; ?>" style="width: 68%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">Cell Phone #:</label>
				<input type="text" name="co_mobile" value="<?php echo isset($info['co_mobile'])?$info['co_mobile']:''; ?>" style="width: 68%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">E-mail Address:</label>
				<input type="text" name="buyer_email" value="<?php echo isset($info['buyer_email'])?$info['buyer_email']:$info['email']; ?>" style="width: 68%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; width: 40%; text-align: right;">
				<label style="width: 30%; float: left;">E-mail Address:</label>
				<input type="text" name="co_email" value="<?php echo isset($info['co_email'])?$info['co_email']:''; ?>" style="width: 68%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 20px;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">1.</span>Name:</label>
					<input type="text" name="name1" value="<?php echo isset($info['name1'])?$info['name1']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address1_1" value="<?php echo isset($info['address1_1'])?$info['address1_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address1_2" value="<?php echo isset($info['address1_2'])?$info['address1_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone1" value="<?php echo isset($info['phone1'])?$info['phone1']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation1" value="<?php echo isset($info['relation1'])?$info['relation1']:''; ?>" style="width: 68%; float: right;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">2.</span>Name:</label>
					<input type="text" name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address2_1" value="<?php echo isset($info['address2_1'])?$info['address2_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address2_2" value="<?php echo isset($info['address2_2'])?$info['address2_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation2" value="<?php echo isset($info['relation2'])?$info['relation2']:''; ?>" style="width: 68%; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 20px;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">3.</span>Name:</label>
					<input type="text" name="name3" value="<?php echo isset($info['name3'])?$info['name3']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address3_1" value="<?php echo isset($info['address3_1'])?$info['address3_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address3_2" value="<?php echo isset($info['address3_2'])?$info['address3_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone3" value="<?php echo isset($info['phone3'])?$info['phone3']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation3" value="<?php echo isset($info['relation3'])?$info['relation3']:''; ?>" style="width: 68%; float: right;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">4.</span>Name:</label>
					<input type="text" name="name4" value="<?php echo isset($info['name4'])?$info['name4']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address4_1" value="<?php echo isset($info['address4_1'])?$info['address4_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address4_2" value="<?php echo isset($info['address4_2'])?$info['address4_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone4" value="<?php echo isset($info['phone4'])?$info['phone4']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation4" value="<?php echo isset($info['relation4'])?$info['relation4']:''; ?>" style="width: 68%; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 20px;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">5.</span>Name:</label>
					<input type="text" name="name5" value="<?php echo isset($info['name5'])?$info['name5']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address5_1" value="<?php echo isset($info['address5_1'])?$info['address5_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address5_2" value="<?php echo isset($info['address5_2'])?$info['address5_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone5" value="<?php echo isset($info['phone5'])?$info['phone5']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation5" value="<?php echo isset($info['relation5'])?$info['relation5']:''; ?>" style="width: 68%; float: right;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;"><span style="float: left;">6.</span>Name:</label>
					<input type="text" name="name6" value="<?php echo isset($info['name6'])?$info['name6']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: right; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Address:</label>
					<input type="text" name="address6_1" value="<?php echo isset($info['address6_1'])?$info['address6_1']:''; ?>" style="width: 68%; float: right;">
					<input type="text" name="address6_2" value="<?php echo isset($info['address6_2'])?$info['address6_2']:''; ?>" style="width: 68%; float: right; margin: 7px 0 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Phone #:</label>
					<input type="text" name="phone6" value="<?php echo isset($info['phone6'])?$info['phone6']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; text-align: right; margin: 7px 0;">
					<label style="width: 30%; float: left;">Relationship:</label>
					<input type="text" name="relation6" value="<?php echo isset($info['relation6'])?$info['relation6']:''; ?>" style="width: 68%; float: right;">
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
