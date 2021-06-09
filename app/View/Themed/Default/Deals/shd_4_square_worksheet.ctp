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
			<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="margin: 17px 0 0; width: 162px; float: left;">
				<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right-field" style="float: right; width: 40%;  margin: 68px 0 0;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="font-weight: bold;">Deal#</label>
						<input type="text" name="deal_number" value="<?php echo isset($info['deal_number'])?$info['deal_number']:''; ?>" style="width: 75%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label style="font-weight: bold;">Source</label>
						<input type="text" name="source" value="<?php echo isset($info['source'])?$info['source']:''; ?>" style="width: 72%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 40%">
				<label>H-D Fit Specialist </label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>Assistant  Manager</label>
				<input type="text" name="assit_mgr1" value="<?php echo isset($info['assit_mgr1'])?$info['assit_mgr1']:''; ?>" style="width: 30%;">/<input type="text" name="assit_mgr2" value="<?php echo isset($info['assit_mgr2'])?$info['assit_mgr2']:''; ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: right; width: 20%">
				<label>Date</label>
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 74%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 68%">
				<label>Client</label>
				<input type="text" name="client_name" value="<?php echo isset($info['client_name'])?$info['client_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 26%">
				<label>Are you a VIP Member</label>
				<input type="radio" name="vip_member" value="yes" <?php echo (isset($info['vip_member']) && $info['vip_member'] =='yes')?'checked':'' ?> />Yes  <input type="radio" name="vip_member" value="no" <?php echo (isset($info['vip_member']) && $info['vip_member'] =='no')?'checked':'' ?> /> NO
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 93%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%">
				<label>City</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 33%">
				<label>State</label>
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: right; width: 34%">
				<label>Zip</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>Home Phone</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: right; width: 50%">
				<label>Email</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>Work Phone</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: right; width: 50%">
				<label>Best #/Time to Call <span style="margin: 0 7px;">C</span> <span style="margin: 0 7px;">H</span> <span style=" margin: 0 7px;">W</span></label>
				<input type="text" name="best_time" value="<?php echo isset($info['best_time'])?$info['best_time']:''; ?>" style="width: 40%;">
				<span>AM PM</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%">
				<label>Cell Phone</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: right; width: 50%">
				<div class="form-field" style="float: left; width: 25%">
					<label>Tour</label>
					<input type="text" name="tour" value="<?php echo isset($info['tour'])?$info['tour']:''; ?>" style="width: 45%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label>FORM</label>
					<input type="text" name="frm_name" value="<?php echo isset($info['frm_name'])?$info['frm_name']:''; ?>" style="width: 30%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label> T/O</label>
					<input type="text" name="t_o" value="<?php echo isset($info['t_o'])?$info['t_o']:''; ?>" style="width: 35%;">
				</div>
				<div class="form-field" style="float: left; width: 25%">
					<label>  TEXT</label>
					<input type="text" name="text_n" value="<?php echo isset($info['text_n'])?$info['text_n']:''; ?>" style="width: 48%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="margin: 7px 0; float: left; width: 100%;">
			<div class="one-third" style="float: left; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Trade in (Condition 1-10)</label>
						<input type="text" name="trade_condition" value="<?php echo isset($info['trade_condition'])?$info['trade_condition']:''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%">
						<label>Year</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 55%;">
					</div>
					<div class="form-field" style="float: left; width: 34%">
						<label>Make</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 55%;">
					</div>
					<div class="form-field" style="float: right; width: 36%">
						<label>Model</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 62%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%">
						<label>Mileage</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 62%;">
					</div>
					<div class="form-field" style="float: left; width: 50%">
						<label>Color</label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 75%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Pay-off Amount $</label>
						<input type="text" name="trade_payoff" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Name of Bank</label>
						<input type="text" name="bank_name" value="<?php echo isset($info['bank_name'])?$info['bank_name']:''; ?>" style="width: 75%;">
					</div>
				</div>
			</div>
			
			<div class="one-third" style="float: right; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box; margin: 0 1% 0 0;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 25%">
						<label>New</label>
						<input type="radio" name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition'] == 'New')?'checked':''; ?> />
					</div>
					<div class="form-field" style="float: left; width: 25%">
						<label>Used</label>
						<input type="radio" name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition'] == 'Used')?'checked':''; ?> />
					</div>
					<div class="form-field" style="float: right; width: 50%">
						<label>Stock #</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 72%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%">
						<label>Year</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 64%;">
					</div>
					<div class="form-field" style="float: left; width: 70%">
						<label>Make</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 82%;">
					</div>
					
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 50%">
						<label>Model</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 74%;" />
					</div>
					<div class="form-field" style="float: right; width: 50%">
						<label>Mileage</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 70%;" />
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 100%">
						<label>Color</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0; text-align: center;">
					<span style="disply: inline-block; margin: 0 30px;">ABS</span>
					<span style="disply: inline-block; margin: 0 30px;">Security</span>
					<span style="disply: inline-block; margin: 0 30px;">Wheels</span>
					<span style="disply: inline-block; margin: 0 30px;">Cruise</span>
				</div>
			</div>
		</div>
		
		
		<div class="row" style="margin: 7px 0; float: left; width: 100%;">
			<div class="one-third" style="float: left; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box;">
				<h2 style="text-align: center; text-decoration: underline; font-size: 16px; margin: 0; font-weight: normal;">Trade</h2>
				<div class="row" style="float: left; width: 100%; margin: 7px 0; ">
					<div class="form-field" style="float: left; width: 100%; margin: 40px 0;">
						<label>Appraised Value $</label>
						<input type="text" name="appraisal_value" value="<?php echo isset($info['appraisal_value'])?$info['appraisal_value']:''; ?>" style="width: 60%;" />
					</div>
				</div>
			</div>
			
			
			
			<div class="one-third" style="float: right; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box; margin: 0 1% 0 0;">
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<span style="float: left; width: 100%; margin: 99px 0 0 10%;">+ Fixed Costs</span>
				</div>
			</div>
		</div>
		
		<div class="row" style="margin: 7px 0; float: left; width: 100%;">
			<div class="one-third" style="float: left; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box; height: 150px;">
				<h2 style="text-align: center; text-decoration: underline; font-size: 16px; margin: 0; font-weight: normal;">Initial Investment</h2>
			</div>
			
			<div class="one-third" style="float: right; width: 49%; border: 1px solid #000; padding: 7px; box-sizing: border-box; margin: 0 1% 0 0; height: 150px;">
				<h2 style="text-align: center; text-decoration: underline; font-size: 16px; margin: 0; font-weight: normal;">Monthly Investment</h2>
			</div>
		</div>
		
		<p style="float: left; width: 100%;">I hereby indicate my intent to purchase a motorcycle. I have available, or can obtain, sufficient funds to complete the transaction. I authorize the dealer representative to investigate my credit and employment history to evaluate my ability to purchase the above referenced motorcycle</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%">
				<label>Customer Signature</label>
				<input type="text"  style="width: 58%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 70%">
				<label>Manager Signature</label>
				<input type="text"  style="width: 58%;">
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
