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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 0px solid #000;}
	th{padding: 4px; border-right: 0px solid #000;}
	td:first-child{text-align: left;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	td{padding: 3px;}
	.second-table td{text-align: center;}
	.second-table td:first-child{text-align: left;}
	.no-border input[type="text"]{border: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<p style="float: left; width: 100%; text-align: center;">
			<b>RV SALES</b><br>
			PO BOX 2098 <br>
			2109 W US RT 66 <br>
			Moriarty, NM 87035 <br>
			505.832.2400 <br>
			505.832.0013 (fax)</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Name(s):</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 4px;">
				<label style="display: block;">Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 4px;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0 10px;">
			<p style="float: left; width: 100%;">Congratulations on the purchase of your RV. We hope enjoy it to the fullest. In an effort to expedite delivery of your unit, we need to have the following information to complete the transaction</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table style="margin: auto 50px;">
				<tr>
					<td><input type="checkbox" name="sign_check" value="sign" <?php echo (isset($info['sign_check']) && $info['sign_check']=='sign')?'checked="checked"':''; ?> /></td>
					<td>Sign Purchase Agreement</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="address_check" value="address" <?php echo (isset($info['address_check']) && $info['address_check']=='address')?'checked="checked"':''; ?> /></td>
					<td>Physical Address</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="mailing_check" value="mailing" <?php echo (isset($info['mailing_check']) && $info['mailing_check']=='mailing')?'checked="checked"':''; ?> /></td>
					<td>Mailing Address</td>
				</tr>
				
				<tr>
					<td><input type="checkbox"  name="signed_check" value="signed" <?php echo (isset($info['signed_check']) && $info['signed_check']=='signed')?'checked="checked"':''; ?> /></td>
					<td>Signed Title Application</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="power_check" value="power" <?php echo (isset($info['power_check']) && $info['power_check']=='power')?'checked="checked"':''; ?> /></td>
					<td>Power of Attorney for new unit</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="license_check" value="license" <?php echo (isset($info['license_check']) && $info['license_check']=='license')?'checked="checked"':''; ?> /></td>
					<td>Copy of Driver's License(s) with date of birth</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="social_check" value="social" <?php echo (isset($info['social_check']) && $info['social_check']=='social')?'checked="checked"':''; ?> /></td>
					<td>Social Security Numbers</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="drive_check" value="drive" <?php echo (isset($info['drive_check']) && $info['drive_check']=='drive')?'checked="checked"':''; ?> /></td>
					<td>Copy of Auto Insurance for Temporary Drive Out Sticker</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="balance_check" value="balance" <?php echo (isset($info['balance_check']) && $info['balance_check']=='balanceno')?'checked="checked"':''; ?> /></td>
					<td>
						Balance of Money due from customer
						$<input type="text" name="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;">
					</td>
				</tr>

				<tr>
					<td><input type="checkbox" name="payoff_check" value="payoff" <?php echo (isset($info['payoff_check']) && $info['payoff_check']=='payoff')?'checked="checked"':''; ?> /></td>
					<td>Payoff adjustment authorization form</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="insurance_check" value="insurance" <?php echo (isset($info['insurance_check']) && $info['insurance_check']=='insurance')?'checked="checked"':''; ?> /></td>
					<td>Would you like us to provide a free insurance quote on this RV? <span><input type="text" name="rv_yes" value="<?php echo isset($info['rv_yes'])?$info['rv_yes']:''; ?>" style="width: 9%; margin-bottom: 3px; border-bottom: 1px solid;"></span><span>Yes</span><span><input type="text" name="rv_yes" value="<?php echo isset($info['rv_yes'])?$info['rv_yes']:''; ?>" style="width: 9%; margin-bottom: 3px; border-bottom: 1px solid;"><span>No</span></span></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="warranty_check" value="warranty" <?php echo (isset($info['warranty_check']) && $info['warranty_check']=='warranty')?'checked="checked"':''; ?> /></td>
					<td>Are you interest in an extended warranty? Cost ~ $2007 (7 years / $50 deductible).</td>
				</tr>

				<tr>
					<td><input type="checkbox" name="purchasing_check" value="purchasing" <?php echo (isset($info['purchasing_check']) && $info['purchasing_check']=='purchasing')?'checked="checked"':''; ?> /></td>
					<td>If you are purchasing an Excel, which Excel Club would you like to belong to?</td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>TRADE IN: <input type="text" name="trade_yes" value="<?php echo isset($info['trade_yes']) ? $info['trade_yes'] : ''; ?>" style="width: 11%; border-bottom: 1px solid;"> YES <input type="text" name="trade_no" value="<?php echo isset($info['trade_no']) ? $info['trade_no'] : ''; ?>" style="width: 11%; border-bottom: 1px solid;"> NO
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table style="margin: auto 50px;">
				<tr>
					<td><input type="checkbox" name="trade_check" value="trade" <?php echo (isset($info['trade_check']) && $info['trade_check']=='trade')?'checked="checked"':''; ?> /></td>
					<td>Trade/Purchase Disclosure Form</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="title_check" value="title" <?php echo (isset($info['title_check']) && $info['title_check']=='title')?'checked="checked"':''; ?> /></td>
					<td>Title</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="registration_check" value="registration" <?php echo (isset($info['registration_check']) && $info['registration_check']=='registration')?'checked="checked"':''; ?> /></td>
					<td>Registration</td>
				</tr>
				
				<tr>
					<td><input type="checkbox"  name="key_check" value="key" <?php echo (isset($info['key_check']) && $info['key_check']=='key')?'checked="checked"':''; ?> /></td>
					<td>Keys</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="power_check" value="power" <?php echo (isset($info['power_check']) && $info['power_check']=='power')?'checked="checked"':''; ?> /></td>
					<td>Power of Attorney</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="form_check" value="form" <?php echo (isset($info['form_check']) && $info['form_check']=='form')?'checked="checked"':''; ?> /></td>
					<td>Payoff Form(s)</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="lien_check" value="lien" <?php echo (isset($info['lien_check']) && $info['lien_check']=='lien')?'checked="checked"':''; ?> /></td>
					<td>Lienholder <span><input type="text" name="lienholder" value="<?php echo isset($info['lienholder'])?$info['lienholder']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span><span>Payoff Amount</span><span><input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span><span>Account #</span><span><input type="text" name="account" value="<?php echo isset($info['account'])?$info['account']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span></td>
				</tr>
			</table>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0 10px;">
			<p style="float: left; width: 100%;"><i>Note: if your trade has a pay-off continue to make the payments until the new purchase is finalized. If your payment is direct pay through your bank, you will need to cancel it.</i></p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>FINANCING: <input type="text" name="finance_yes" value="<?php echo isset($info['finance_yes']) ? $info['finance_yes'] : ''; ?>" style="width: 11%; border-bottom: 1px solid;"> YES <input type="text" name="finance_no" value="<?php echo isset($info['finance_no']) ? $info['finance_no'] : ''; ?>" style="width: 11%; border-bottom: 1px solid;"> NO
				</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table style="margin: auto 50px;">
				<tr>
					<td><input type="checkbox" name="bank_check" value="bank" <?php echo (isset($info['bank_check']) && $info['bank_check']=='bank')?'checked="checked"':''; ?> /></td>
					<td><span style="margin-right: 45px;">US Bank</span><span style="margin-right: 45px;">Mountain America</span><span>Other: <input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="width: 20%; margin-bottom: 3px; border-bottom: 1px solid;"></span></td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="loan_check" value="loan" <?php echo (isset($info['loan_check']) && $info['loan_check']=='loan')?'checked="checked"':''; ?> /></td>
					<td>Term of Loan <span><input type="text" name="term" value="<?php echo isset($info['term'])?$info['term']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span><span>Interest Rate</span><span><input type="text" name="interest" value="<?php echo isset($info['interest'])?$info['interest']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span><span>Loan Amount</span><span><input type="text" name="loan_amt" value="<?php echo isset($info['loan_amt'])?$info['loan_amt']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></span></td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="sign_check" value="sign" <?php echo (isset($info['sign_check']) && $info['sign_check']=='sign')?'checked="checked"':''; ?> /></td>
					<td>Signed Credit Applcation</td>
				</tr>
				
				<tr>
					<td><input type="checkbox"  name="finance_check" value="finance" <?php echo (isset($info['finance_check']) && $info['finance_check']=='finance')?'checked="checked"':''; ?> /></td>
					<td>Signed Finance Contract</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="list_check" value="list" <?php echo (isset($info['list_check']) && $info['list_check']=='list')?'checked="checked"':''; ?> /></td>
					<td>Proof of Insurance coverage listing Lienholder</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="po_check" value="po" <?php echo (isset($info['po_check']) && $info['po_check']=='po')?'checked="checked"':''; ?> /></td>
					<td>PO Box Authorization</td>
				</tr>
				
				<tr>
					<td><input type="checkbox" name="auth_check" value="auth" <?php echo (isset($info['auth_check']) && $info['auth_check']=='auth')?'checked="checked"':''; ?> /></td>
					<td>Charge Checking / Savings Authorization if interested</td>
				</tr>

				<tr>
					<td><input type="checkbox" name="company_check" value="company" <?php echo (isset($info['company_check']) && $info['company_check']=='company')?'checked="checked"':''; ?> /></td>
					<td>Balance of Money due from finance company $ <input type="text" name="money" value="<?php echo isset($info['money'])?$info['money']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"></td>
				</tr>
			</table>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0 10px;">
			<p style="float: left; width: 100%;">Thank you. Please keep in touch on a regular basis until all paperwork is complete.</p>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 10px 0 10px;">
			<p style="float: left; width: 100%;">Your delivery and walkthrough is scheduled for <input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;"> at <input type="text" name="title2" value="<?php echo isset($info['money'])?$info['title2']:''; ?>" style="width: 15%; margin-bottom: 3px; border-bottom: 1px solid;">. Please let us know if you need to make any changes to this appointment.</p>
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
