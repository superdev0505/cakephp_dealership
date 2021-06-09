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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 11px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	table th, table td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 7px;}
	ul {margin: 0 0 0 26px;}
	li{list-style: square;}
@media print {
	.left{background: #000 !important;}
	.second-page{margin-top: 76% !important; display: block;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 5px; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 20%; background-color: #000; color: #fff; font-size: 18px; height: 46px; line-height: 46px; text-align: center; border: 1px solid #000; border-bottom: 0px;">
				FACTS
			</div>
			<div class="right" style="float: left; width: 70%; font-size: 16px; padding-left: 7px;">
				WHAT DOES The Brothers Powersports <br>
				DO WITH YOUR PERSONAL INFORMATION?
			</div>
		</div>
		
		
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="width: 20%; background-color: #999; vertical-align: top;">Why?</td>
				<td>Financial companies choose how they share your personal information. Federal law gives consumers the right to limit some but not all sharing. Federal law also requires us to tell you how we collect, share, and protect your personal information. Please read this notice carefully to understand what we do.</td>
			</tr>
			
			<tr>
				<td style="width: 20%; background-color: #999; vertical-align: top;">What?</td>
				<td>The types of personal information we collect and share depend on the product or service you have with us. This information can include:
				<ul>
					<li>Social Security number and income</li>
					<li>account balances and payment history</li>
					<li>credit history and credit scores</li>
				</ul>
				</td>
			</tr>
			
			<tr>
				<td style="width: 20%; background-color: #999; vertical-align: top;">How?</td>
				<td>All financial companies need to share customers' personal information to run their everyday business. In the section below, we list the reasons financial companies can share their customers' personal information; the reasons <br>
					The Brothers Powersports choose to share; and whether you can limit this sharing.</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
			<tr>
				<th style="width: 50%; background-color: #999;">Reasons we can share your personal information</th>
				<th style="width: 30%; background-color: #999; text-align: center;">Does  <br> The Brothers Powersports <br> Share?</th>
				<th style="width: 20%; background-color: #999; text-align: center;">Can you limit this sharing?</th>
			</tr>
			
			<tr>
				<td><b>For our everyday business purposes -</b> <br>
Such as to process your transactions, maintain your account(s), respond to court orders and legal investigations, or report to credit bureaus</td>
				<td align="center">Yes</td>
				<td align="center">No</td>
			</tr>
			
			<tr>
				<td><b>For our marketing purposes</b> <br>
to offer our products and services to you</td>
				<td align="center">Yes</td>
				<td align="center">No</td>
			</tr>
			
			<tr>
				<td><b>For joint marketing with other financial companies </b></td>
				<td align="center">No</td>
				<td align="center">No</td>
			</tr>
			
			<tr>
				<td><b>For our affiliates' everyday business purposes---</b> <br>
information about your transactions and experiences</td>
				<td align="center">No</td>
				<td align="center">No</td>
			</tr>
			
			<tr>
				<td><b>For our affiliates' everyday business purposes---</b> <br>
information about your creditworthiness</td>
				<td align="center">No</td>
				<td align="center">No</td>
			</tr>
			
			
			<tr>
				<td><b>For our affiliates to market to you</b></td>
				<td align="center">No</td>
				<td align="center">No</td>
			</tr>
			
			<tr>
				<td><b>For our affiliates to market to you</b></td>
				<td align="center">No</td>
				<td align="center">No</td>
			</tr>
			
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Questions?</b></td>
				<td>Call <span style="margin: 0 10%;">360.479.6943</span> <span>and ask for Jessica Rude</span></td>
			</tr>	
		</table>
		
		<table class="second-page" cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
			<tr>
				<td colspan="2" style="width: 20%; vertical-align: top; background-color: #999;"><b>Who we are</b></td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>The Brothers</b></td>
				<td>A full service powersports dealership</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
			<tr>
				<td colspan="2" style="width: 20%; vertical-align: top; background-color: #999;"><b>What we do</b></td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Hoe does <br> The Brothers powersports protect my personal information ?</b></td>
				<td>To protect your personal information from unauthorized access and use, we use security measures that comply with federal law. These measures include protecting all confidentail information in the secured finance offices.</td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Hoe does <br> The Brothers powersports collect my personal information ?</b></td>
				<td>We collect your personal information, for example, when you
					<ul>
					<li>open an account or deposit money</li>
					<li>pay your bills or apply for a loan</li>
					<li>use your credit or debit card</li>
					</ul>
					We also collect your personal information from others, such as credit bureaus, affiliates, or other companies.
				</td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Why cant I limi all sharing?</b></td>
				<td>Federal law gives you the right to limit only
					<ul>
						<li>Sharing for affiliates' everyday buisness purposes --- information about your creditworthiness</li>
						<li>affiliates from using your information to market to you</li>
						<li>sharing for nonaffiliates to market to you</li>
					</ul>
					State laws and individual companies may give you additional rights to limit sharing.
				</td>
			</tr>
		</table>
		
		
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td colspan="2" style="width: 100%; vertical-align: top; background-color: #999;"><b>Definations</b></td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Affilites</b></td>
				<td>Companies related by common ownership or control. They can be financial and nonfinancial companies.
				<span style="display: block; padding: 0 4%;">o NA</span></td>
				</td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Nonaffiliates</b></td>
				<td>Companies not related by common ownership or control. They can be financial and nonfinancial companies.
				<span style="display: block; padding: 0 4%;">o NA</span></td>
				</td>
			</tr>
			
			<tr>
				<td style="width: 20%; vertical-align: top; background-color: #999;"><b>Joint marketing</b></td>
				<td>A formal agreement between nonaffiliated financial companies that together market financial products or services to you.
				<span style="display: block; padding: 0 4%;">o NA</span></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0; border: 1px solid #000;">
			<h3 style="float: left; width: 100%; background-color: #999; border-bottom: 1px solid #000; margin: 0; padding: 6px 5px; box-sizing: border-box; font-size: 18px; ">Other important information</h3>
			
			<div class="inner" style="float: left; width: 100%; margin: 0; padding: 20px; box-sizing: border-box;">
				<h4>By signing below you acknowledge receipt of a copy of this notice.</h3>
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 39%; ">
						<input type="text" name="pur_name" value="<?php echo isset($info['purchaser_name']) ? $info['purchaser_name'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Purchaser's Printed Name</label>
					</div>
					<div class="form-field" style="float: left; width: 39%; margin: 0 1%;">
						<input type="text" name="pur_sign" value="<?php echo isset($info['pur_sign']) ? $info['pur_sign'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Purchaser's Signature</label>
					</div>
					<div class="form-field" style="float: left; width: 20%; ">
						<input type="text" name="date_sign1" value="<?php echo isset($info['date_sign1']) ? $info['date_sign1'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Date Signed</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 30px 0 0;">
					<div class="form-field" style="float: left; width: 39%; ">
						<input type="text" name="co_pur_name" value="<?php echo isset($info['co_pur_name']) ? $info['co_pur_name'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Co-Purchaser's Printed Name</label>
					</div>
					<div class="form-field" style="float: left; width: 39%; margin: 0 1%;">
						<input type="text" name="co_pur_sign" value="<?php echo isset($info['co_pur_sign']) ? $info['co_pur_sign'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Co-Purchaser's Signature</label>
					</div>
					<div class="form-field" style="float: left; width: 20%; ">
						<input type="text" name="date_sign2" value="<?php echo isset($info['date_sign2']) ? $info['date_sign2'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Date Signed</label>
					</div>
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
