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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			p{margin: 11px 0; line-height: 20px;}
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
		.text ul li{margin: 0 0 0 17px; list-style: none;}
	@media print { 
	.dontprint{display: none;}
		/*body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; margin: 0; padding: 0;}
	label{font-size: 13px;}*/
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
			<div class="row" style="float: left; width: 100%;height: 274px;">
				<div class="logo" style="width: 300px; margin: 0 auto;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/timmsharley-logo.png'); ?>" alt="" style="width: 100%;">
				</div>
				<h2 style="text-align: center; font-size: 30px;  margin: 10px 0 6px  0; float: left; width: 100%; text-decoration: underline; font-weight: bold;">Privacy Notice</h2>
				<p style="float: left; width: 100%; margin: 0; text-align: center; font-weight: bold; font-size: 20px;"><?php echo AuthComponent::user('dealer'); ?></p>
				<p style="float: left; width: 100%; margin: 0; text-align: center; font-weight: bold; font-size: 20px;"><?php echo AuthComponent::user('d_address'); ?></p>
				<p style="float: left; width: 100%; margin: 0; text-align: center; font-weight: bold; font-size: 20px;"><?php echo AuthComponent::user('d_city').', '.AuthComponent::user('d_state').' '.AuthComponent::user('d_zip'); ?></p>
				<p style="float: left; width: 100%; margin: 0; text-align: center; font-weight: bold; font-size: 20px;"><?php echo AuthComponent::user('d_phone'); ?></p>
			</div>
			<div class="row" style="float: left; width: 100%;margin-left: 0px;">
			<label>Customer Name:</label>
			<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<label>Address:</label>
			<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 85%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<label>Phone:</label>
			<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 86%;">
		</div>
		<div class="text" style="float: left; width: 100%;">
			<p>In connection with your transaction, we may obtain personal information about you that is handled as stated in this notice.</p>
			<p>1. We collect nonpublic information about you from the following sources:</p>
			<ul>
				<li>a. Information we receive from you on applications or other forms</li>
				<li>b. Information about your transactions with us, our affiliates or others.</li>
				<li>c. Information we receive from consumer reporting agency.</li>
			</ul>
			<p>2. Our policy to disclose your personal nonpublic information to only those companies that perform marketing services on our behalf or to other financial institutions with which we have joint marketing agreements.</p>
			<p>3. We do not disclose any nonpublic personal information about you to anyone, except as permitted by law.</p>
			<p>4. Further, we restrict your nonpublic personal information to only those employees who need to know that information to provide products or services to you. Employees cannot use your information for any other purpose. We mantain physical, electronic, and procedural safeguards that comply with federal regulations to guard your nonpublic information.</p>
			<p>CUSTOMER ACKNOWLEDGEMENT: The undersigned customer(s) acknowlege thay they received a copy this privacy notice on the indicated lines below.</p>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 20px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text"  value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 100%;">
				<label style="display: block; text-align: center;">Customer's Name (printed)</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0 4%;">
				<input type="text"  style="width: 100%;">
				<label style="display: block; text-align: center;">Customer's Signature</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 100%;">
				<label style="display: block; text-align: center;">Date</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 20px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="co_cust_name" value="<?php echo isset($info['co_cust_name'])?$info['co_cust_name']:''; ?>" style="width: 100%;">
				<label style="display: block; text-align: center;">Co-Customer's Name (printed)</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0 4%;">
				<input type="text" style="width: 100%;">
				<label style="display: block; text-align: center;">Co-Customer's Signature</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text"  name="submit_dt2" value="<?php echo isset($info['submit_dt2'])?$info['submit_dt2']:$expectedt; ?>" style="width: 100%;">
				<label style="display: block; text-align: center;">Date</label>
			</div>
		</div>
			
		
		
		
		</div>
		<!-- container end -->
		
			
	
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
