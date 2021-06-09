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
			<div class="form-filed" style="float: left; width: 100%;">
				<label style="font-size: 18px;">CUSTOMER NAME</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 50%; font-size: 18px;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 7px 0 2px; font-size: 16px;">SALES & FINANCE</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="deal_worksheet" value="<?php echo isset($info['deal_worksheet']) ? $info['deal_worksheet'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Completed Deal Worksheet (provided by the salesman)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="credit_app" value="<?php echo isset($info['credit_app']) ? $info['credit_app'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Signed Credit Application (include any related approval notices)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="promissory" value="<?php echo isset($info['promissory']) ? $info['promissory'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Promissory Note/Contract</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder']) ? $info['lien_holder'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Guarantee to Lien Holder</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="consumer_id" value="<?php echo isset($info['consumer_id']) ? $info['consumer_id'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of Driver's License/Military ID or Completed Affidavit of Consumer ID</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="ins_verification" value="<?php echo isset($info['ins_verification']) ? $info['ins_verification'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Insurance Verification and Agreement</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="pay_letter" value="<?php echo isset($info['pay_letter']) ? $info['pay_letter'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Pay-Off Letter</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="payoff_state" value="<?php echo isset($info['payoff_state']) ? $info['payoff_state'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Authorization of Proceeds or Trade-In Payoff Statement (signed & notarized)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="signed_title" value="<?php echo isset($info['signed_title']) ? $info['signed_title'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Signed Title for Trade-In</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lien_release" value="<?php echo isset($info['lien_release']) ? $info['lien_release'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Lien Release for Trade-In</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="temp_tag" value="<?php echo isset($info['temp_tag']) ? $info['temp_tag'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of Temporary Tag</span>
			</div><div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="we_owe" value="<?php echo isset($info['we_owe']) ? $info['we_owe'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">We Owe Form</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="deposit" value="<?php echo isset($info['deposit']) ? $info['deposit'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of any deposit or Funding Checks (checks, cc, cash receipts; drafting instructions, etc)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="bill_sale" value="<?php echo isset($info['bill_sale']) ? $info['bill_sale'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Completed and Signed Bill of Sale</span>
			</div>
			
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="customer_path" value="<?php echo isset($info['customer_path']) ? $info['customer_path'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Customer Path Worksheet</span>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 7px 0 2px; font-size: 16px;">SALES MANAGER</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="fun_note" value="<?php echo isset($info['fun_note']) ? $info['fun_note'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Funding Notification</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="part_amount" value="<?php echo isset($info['part_amount']) ? $info['part_amount'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Participation Amount</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="inventory" value="<?php echo isset($info['inventory']) ? $info['inventory'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Verify Trade Information and Add to Inventory</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="product" value="<?php echo isset($info['product']) ? $info['product'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Cost Entered for Back-End Products</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="print_recap" value="<?php echo isset($info['print_recap']) ? $info['print_recap'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Print Recap</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="swr_unit" value="<?php echo isset($info['swr_unit']) ? $info['swr_unit'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">SWR Unit</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="verify_date" value="<?php echo isset($info['verify_date']) ? $info['verify_date'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Verify Date and Close Deal</span>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 7px 0 2px; font-size: 16px;">TITLE PAPERWORK</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="title_mso" value="<?php echo isset($info['title_mso']) ? $info['title_mso'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Title or MSO and any Lien Releases</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="lien_entry" value="<?php echo isset($info['lien_entry']) ? $info['lien_entry'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Lien Entry Form (4 copies)</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="odom_state" value="<?php echo isset($info['odom_state']) ? $info['odom_state'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Odometer Statement</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="tax_stamp" value="<?php echo isset($info['tax_stamp']) ? $info['tax_stamp'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">OK Title Application with Tax Stamp</span>
			</div>
			<div class="form-filed" style="float: left; width: 100%; margin: 2px 0;">
				<input type="text" name="bill_sale" value="<?php echo isset($info['bill_sale']) ? $info['bill_sale'] : ''; ?>" style="width: 8%; border: 1px solid #000;">
				<span style="font-size: 14px;">Copy of Bill of Sale</span>
			</div>
		</div>
		
		
		<h2 style="float: left; width: 100%; margin: 7px 0 2px; font-size: 16px;">ACCOUNTING</h2>
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 0;">
				<input type="text" name="floorplan" value="<?php echo isset($info['floorplan']) ? $info['floorplan'] : ''; ?>" style="width: 25%; border: 1px solid #000;">
				<span style="font-size: 14px;">Pay-Off Floorplan</span>
			</div>
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 4%;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Check #:</label>
				<input type="text" name="check1_num" value="<?php echo isset($info['check1_num']) ? $info['check1_num'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
			<div class="form-filed" style="float: right; width: 30%; margin: 2px 0;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Amount:</label>
				<input type="text" name="amount" value="<?php echo isset($info['amount']) ? $info['amount'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 0;">
				<input type="text" name="pay_off" value="<?php echo isset($info['pay_off']) ? $info['pay_off'] : ''; ?>" style="width: 25%; border: 1px solid #000;">
				<span style="font-size: 14px;">Pay-Off Trade-In</span>
			</div>
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 4%;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Check #:</label>
				<input type="text" name="check2_num" value="<?php echo isset($info['check2_num']) ? $info['check2_num'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
			<div class="form-filed" style="float: right; width: 30%; margin: 2px 0;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Date:</label>
				<input type="text" name="check_date" value="<?php echo isset($info['check_date']) ? $info['check_date'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 0;">
				<input type="text" name="check_ttl" value="<?php echo isset($info['check_ttl']) ? $info['check_ttl'] : ''; ?>" style="width: 25%; border: 1px solid #000;">
				<span style="font-size: 14px;">TT&L Check</span>
			</div>
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 4%;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Check #:</label>
				<input type="text" name="check3_num" value="<?php echo isset($info['check3_num']) ? $info['check3_num'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
			<div class="form-filed" style="float: right; width: 30%; margin: 2px 0;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Amount:</label>
				<input type="text" name="amount1" value="<?php echo isset($info['amount1']) ? $info['amount1'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 0;">
				<input type="text" name="floor" value="<?php echo isset($info['floor']) ? $info['floor'] : ''; ?>" style="width: 25%; border: 1px solid #000;">
				<span style="font-size: 14px;">Floor Trade-In</span>
			</div>
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 4%;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Amount:</label>
				<input type="text" name="amount2" value="<?php echo isset($info['amount2']) ? $info['amount2'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 0;">
				<input type="text" name="paperwork" value="<?php echo isset($info['paperwork']) ? $info['paperwork'] : ''; ?>" style="width: 25%; border: 1px solid #000;">
				<span style="font-size: 14px;">Mail Title Paperwork</span>
			</div>
			<div class="form-filed" style="float: left; width: 30%; margin: 2px 4%;">
				<label style="font-size: 14px; width: 22%; display: inline-block; text-align: right;">Date:</label>
				<input type="text" name="amount_date" value="<?php echo isset($info['amount_date']) ? $info['amount_date'] : ''; ?>" style="width: 52%; border: 1px solid #000;">
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
