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

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	table th, table td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 5px;}
	table input[type="text"]{border-bottom: 0px;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="deal_check" value="<?php echo isset($info['deal_check']) ? $info['deal_check'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Deal Checklist</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="fun_note" value="<?php echo isset($info['fun_note']) ? $info['fun_note'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Funding Notification</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="fun_check" value="<?php echo isset($info['fun_check']) ? $info['fun_check'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of any deposit or Funding Checks</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="proceed_auth" value="<?php echo isset($info['proceed_auth']) ? $info['proceed_auth'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Authorization of Proceeds/Pay-Off Letter/Trade-In Payoff Statement</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lien_entry" value="<?php echo isset($info['lien_entry']) ? $info['lien_entry'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Lien Entry Packet from Tag Office</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="accep" value="<?php echo isset($info['accep']) ? $info['accep'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Promissary Note/ESP, GAP, PPM Contracts & Acceptance</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lein_holder" value="<?php echo isset($info['lein_holder']) ? $info['lein_holder'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Guarantee to Lein Holder</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lien_release" value="<?php echo isset($info['lien_release']) ? $info['lien_release'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Title/Lien Release</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="approval" value="<?php echo isset($info['approval']) ? $info['approval'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">HDFS Approval/Call Sheet</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="credit_app" value="<?php echo isset($info['credit_app']) ? $info['credit_app'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Credit Application</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="dl_id" value="<?php echo isset($info['dl_id']) ? $info['dl_id'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">DL/ID</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="veri_ins" value="<?php echo isset($info['veri_ins']) ? $info['veri_ins'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Insurance Verification</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="we_owe" value="<?php echo isset($info['we_owe']) ? $info['we_owe'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">We Owe Form</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="credit_score" value="<?php echo isset($info['credit_score']) ? $info['credit_score'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Credit Score</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="temp_tag" value="<?php echo isset($info['temp_tag']) ? $info['temp_tag'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of Temp Tag</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="recap" value="<?php echo isset($info['recap']) ? $info['recap'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Recap</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="deal_outs" value="<?php echo isset($info['deal_outs']) ? $info['deal_outs'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Close Deal Print Outs</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="deal_worksheet" value="<?php echo isset($info['deal_worksheet']) ? $info['deal_worksheet'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Deal Worksheet</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="custom_path" value="<?php echo isset($info['custom_path']) ? $info['custom_path'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Customer Path</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="misc" value="<?php echo isset($info['misc']) ? $info['misc'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Misc (Test Ride, etc.)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="bill_sale" value="<?php echo isset($info['bill_sale']) ? $info['bill_sale'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Bill of Sale</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 30px 0 0;">
				<label style="float: left; width: 8%;">&nbsp;</label>
				<span style="font-size: 14px;">Change Lien Holder to HDC0</span>
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
