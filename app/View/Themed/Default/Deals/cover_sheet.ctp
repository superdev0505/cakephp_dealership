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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 5px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 4px; font-size: 14px; display: inline-block; width: 32%; margin-right: 1%;
	font-size: 13px;}
	table{font-size: 14px;}
	td, th{padding: 4px; border-bottom: 1px solid #000;}
	table{border: 1px solid #000;}
	th{border-right: 1px solid #000; padding: 4px; border-bottom: 1px solid #000;}
	th:last-child, td:last-child{border-right: 0;}
	td{border-right: 1px solid #000;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 5px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 350px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/cover-sheet-logo.png'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table style="float: left; width: 100%; border-bottom: 0; margin-bottom: 10px;" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<label>Customer:</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 60%;">
					</td>
					<td>
						<label>Today's Date:</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
					</td>
				</tr>
				<tr>
					<td>
						<label>Stock #:</label>
						<input type="text" name="stock_num" value="<?php echo isset($info["stock_num"]) ? $info['stock_num'] : '';?>" style="width: 60%;">
					</td>
					<td>
						<label>Delivery Date:</label>
						<input type="text" name="date_delivered" value="<?php echo isset($info["date_delivered"]) ? $info['date_delivered'] : '';?>" style="width: 60%;">
					</td>
				</tr>
				<tr>
					<td>
						<label>Salesperson #1:</label>
						<input type="text" name="sperson" value="<?php echo isset($info["sperson"]) ? $info['sperson'] : '';?>" style="width: 60%;">
					</td>
					<td>
						<label>Salesperson #2:</label>
						<input type="text" name="second_face" value="<?php echo isset($info["second_face"]) ? $info['second_face'] : '';?>" style="width: 60%;">
					</td>
				</tr>
			</table>
		</div>
		
		<h2 style="float: left; width: 100%; margin; margin: 10px 0 20px; font-size: 16px; text-align: center;"><b>CHECKLIST FROM SALESPERSON</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<ul>
				<li><input type="checkbox" name="write_check" <?php echo ($info['write_check'] == "write") ? "checked" : ""; ?> value="write" style="margin-right: 10px;"/>WRITE-UP</li>
				<li><input type="checkbox" name="trade_check" <?php echo ($info['trade_check'] == "matche") ? "checked" : ""; ?> value="matche" style="margin-right: 10px;"/>TRADE VIN MATCHES TITLE</li>
				<li><input type="checkbox" name="second_check" <?php echo ($info['second_check'] == "second_form") ? "checked" : ""; ?> value="second_form" style="margin-right: 10px;"/>SECOND FORM OF ID</li>
				<li><input type="checkbox" name="writeback_check" <?php echo ($info['writeback_check'] == "writeback") ? "checked" : ""; ?> value="writeback" style="margin-right: 10px;"/>WRITEBACK</li>
				<li><input type="checkbox" name="sold_check" <?php echo ($info['sold_check'] == "sold") ? "checked" : ""; ?> value="sold" style="margin-right: 10px;"/>SOLD UNIT VIN IS VERIFIED</li>
				<li><input type="checkbox" name="delivery_check" <?php echo ($info['delivery_check'] == "delivery") ? "checked" : ""; ?> value="delivery" style="margin-right: 10px;"/>UNIT DELIVERY CHECKLIST COM</li>
				<li><input type="checkbox" name="signed_check" <?php echo ($info['signed_check'] == "signed") ? "checked" : ""; ?> value="signed" style="margin-right: 10px;"/>SIGNED CREDIT APP</li>
				<li><input type="checkbox" name="payoff_check" <?php echo ($info['payoff_check'] == "trade") ? "checked" : ""; ?> value="trade" style="margin-right: 10px;"/>PAYOFF FROM FOR TRADE</li>
				<li><input type="checkbox" name="apparel_check" <?php echo ($info['apparel_check'] == "apparel") ? "checked" : ""; ?> value="apparel" style="margin-right: 10px;"/>PARTS/APPAREL WALK</li>
				<li><input type="checkbox" name="privacy_check" <?php echo ($info['privacy_check'] == "privacy") ? "checked" : ""; ?> value="privacy" style="margin-right: 10px;"/>PRIVACY NOTICE</li>
				<li><input type="checkbox" name="circle_check" <?php echo ($info['circle_check'] == "circle") ? "checked" : ""; ?> value="circle" style="margin-right: 10px;"/>CIRCLE ONE: TITLE / MSO / PAYOFF</li>
				<li><input type="checkbox" name="service_check" <?php echo ($info['service_check'] == "service") ? "checked" : ""; ?> value="service" style="margin-right: 10px;"/>SERVICE DEPT WALK</li>
				<li><input type="checkbox" name="appraisal_check" <?php echo ($info['apprasal_check'] == "appraisal") ? "checked" : ""; ?> value="appraisal" style="margin-right: 10px;"/>APPRAISAL FORM</li>
				<li><input type="checkbox" name="license_check" <?php echo ($info['license_check'] == "driver") ? "checked" : ""; ?> value="driver" style="margin-right: 10px;"/>COPY OF DRIVER'S LICENSE FOR BUYER(S)</li>
				<li><input type="checkbox" name="statement_check" <?php echo ($info['statement_check'] == "statement") ? "checked" : ""; ?> value="statement" style="margin-right: 10px;"/>NEW UNIT ODO STATEMENT</li>
				<li><input type="checkbox" name="completed_check" <?php echo ($info['completed_check'] == "completed") ? "checked" : ""; ?> value="completed" style="margin-right: 10px;"/>WE OWE COMPLETED</li>
				<li>&nbsp;</li>
				<li><input type="checkbox" name="make_check" <?php echo ($info['make_check'] == "make") ? "checked" : ""; ?> value="make" style="margin-right: 10px;"/>MAKE READY</li>
			</ul>
		</div>
		<p style="float: left; width: 100%; margin: 10px 0 20px; font-size: 14px;"><b>SALESPERSON ​ ​INITIALS ​:</b> ​ <input type="text" name="name" style="width: 20%; border-bottom: 1px solid #000;">​​ ​​<i>I​ ​understand​ ​that ​ ​failure ​ ​to​ ​complete ​ ​the ​ ​above ​ ​steps ​ ​may ​ ​delay ​ ​my ​ ​commission</i></p>
		
		<h2 style="float: left; width: 100%; margin; margin: 3px 0 16px; font-size: 16px; text-align: center;"><b>CHECKLIST ​ ​FROM​ ​DESK​ ​MANAGER</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<ul>
				<li><input type="checkbox" name="buyer_check" <?php echo ($info['buyer_check'] == "buyer") ? "checked" : ""; ?> value="buyer" style="margin-right: 10px;"/>BUYER NAMES SPELLED CORRECTLY</li>
				<li><input type="checkbox" name="update_check" <?php echo ($info['update_check'] == "update") ? "checked" : ""; ?> value="update" style="margin-right: 10px;"/>TWB IS UPDATED AS SOLD</li>
				<li><input type="checkbox" name="book_check" <?php echo ($info['book_check'] == "book") ? "checked" : ""; ?> value="book" style="margin-right: 10px;"/>BOOK SHEET FOR USED SOLD UNIT</li>
				<li><input type="checkbox" name="imput_check" <?php echo ($info['imput_check'] == "imput") ? "checked" : ""; ?> value="imput" style="margin-right: 10px;"/>CO-BUYER IMPUT CORRECTLY</li>
				<li><input type="checkbox" name="sales_check" <?php echo ($info['sales_check'] == "salesperson") ? "checked" : ""; ?> value="salesperson" style="margin-right: 10px;"/>SALESPERSON IS CORRECT IN TWB</li>
				<li><input type="checkbox" name="information_check" <?php echo ($info['information_check'] == "information") ? "checked" : ""; ?> value="information" style="margin-right: 10px;"/>TRADE INFORMATION ENTERED IN </li>
				<li><input type="checkbox" name="address_check" <?php echo ($info['address_check'] == "address") ? "checked" : ""; ?> value="address" style="margin-right: 10px;"/>ADDRESS ENTERED CORRECTLY</li>
				<li><input type="checkbox" name="owe_check" <?php echo ($info['owe_check'] == "owe") ? "checked" : ""; ?> value="owe" style="margin-right: 10px;"/>WE OWE IS COMPLETED</li>
				<li><input type="checkbox" name="voucher_check" <?php echo ($info['voucher_check'] == "voucher") ? "checked" : ""; ?> value="voucher" style="margin-right: 10px;"/>PARTS VOUCHER ENTERED IN DMV</li>
				<li><input type="checkbox" name="name_check" <?php echo ($info['name_check'] == "driver") ? "checked" : ""; ?> value="driver" style="margin-right: 10px;"/>NAMES MATCH DRIVERS LICENSES</li>
				<li><input type="checkbox" name="signed_check" <?php echo ($info['signed_check'] == "credit") ? "checked" : ""; ?> value="credit" style="margin-right: 10px;"/>SIGNED CREDIT APP</li>
				<li><input type="checkbox" name="appraisal_check" <?php echo ($info['appraisal_check'] == "appraisal") ? "checked" : ""; ?> value="appraisal" style="margin-right: 10px;"/>APPRAISAL FORM</li>
				<li><input type="checkbox" name="date_check" <?php echo ($info['date_check'] == "date") ? "checked" : ""; ?> value="date" style="margin-right: 10px;"/>DELIVERY DATE IS CORRECT</li>
				<li><input type="checkbox" name="mso_check" <?php echo ($info['mso_check'] == "mso") ? "checked" : ""; ?> value="mso" style="margin-right: 10px;"/>TRADE TITLE OR MSO IS IN HAND (EXPLAIN)</li>
				<li><input type="checkbox" name="hand_check" <?php echo ($info['hand_check'] == "hand") ? "checked" : ""; ?> value="hand" style="margin-right: 10px;"/>ALL COPIES OF THE WRITEBACK</li>
				<li><input type="checkbox" name="vin_check" <?php echo ($info['vin_check'] == "vin") ? "checked" : ""; ?> value="vin" style="margin-right: 10px;"/>VIN WAS VERIFIED BY SALESPERSON</li>
				<li><input type="checkbox" name="payoff_check" <?php echo ($info['payoff_check'] == "payoff") ? "checked" : ""; ?> value="payoff" style="margin-right: 10px;"/>TRADE PAYOFF VERIFICATION FORM</li>
				<li><input type="checkbox" name="risk_check" <?php echo ($info['risk_check'] == "risk") ? "checked" : ""; ?> value="risk" style="margin-right: 10px;"/>RISK BASED PRICING NOTICE</li>
			</ul>
		</div>
		
		<h2 style="float: left; width: 100%; margin; margin: 10px 0 20px; font-size: 16px; text-align: center;"><b>CHECKLIST ​FORM F&I MANAGER</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<ul>
				<li><input type="checkbox" name="spell_check" <?php echo ($info['spell_check'] == "spell") ? "checked" : ""; ?> value="spell" style="margin-right: 10px;"/>BUYER NAMES SPELLED CORRECTLY</li>
				<li><input type="checkbox" name="listed_check" <?php echo ($info['listed_check'] == "listed") ? "checked" : ""; ?> value="listed" style="margin-right: 10px;"/>CO-BUYER IS LISTED</li>
				<li><input type="checkbox" name="holder_check" <?php echo ($info['holder_check'] == "holderd") ? "checked" : ""; ?> value="holderd" style="margin-right: 10px;"/>LIEN HOLDER ADDED ON CONTRACT</li>
				<li><input type="checkbox" name="lien_check" <?php echo ($info['lien_check'] == "lien") ? "checked" : ""; ?> value="lien" style="margin-right: 10px;"/>ADDRESS ENTERED CORRECTLY</li>
				<li><input type="checkbox" name="entered_check" <?php echo ($info['entered_check'] == "entered") ? "checked" : ""; ?> value="entered" style="margin-right: 10px;"/>LIEN HOLDER DOUBLE CLICKED</li>
				<li><input type="checkbox" name="insur_check" <?php echo ($info['insur_check'] == "insur") ? "checked" : ""; ?> value="insur" style="margin-right: 10px;"/>INSUR CO. PLUS FORMULES CLICKED</li>
				<li><input type="checkbox" name="correct_check" <?php echo ($info['correct_check'] == "correct") ? "checked" : ""; ?> value="correct" style="margin-right: 10px;"/>VIN IS CORRECT</li>
				<li><input type="checkbox" name="signed_check" <?php echo ($info['signed_check'] == "ttl") ? "checked" : ""; ?> value="ttl" style="margin-right: 10px;"/>SIGNED TT&L FORM</li>
				<li><input type="checkbox" name="you_check" <?php echo ($info['you_check'] == "you") ? "checked" : ""; ?> value="you" style="margin-right: 10px;"/><i>YOU OWE (SIGNED) *</i></li>
				<li><input type="checkbox" name="finance_check" <?php echo ($info['finance_check'] == "finance") ? "checked" : ""; ?> value="finance" style="margin-right: 10px;"/>SIGNED AGREEMENT TO PROVIDE <span style="margin-left: 22px;">INSURANCE ON EVERY FINANCE DEAL</span></li>
				<li><input type="checkbox" name="verify_check" <?php echo ($info['verify_check'] == "verify") ? "checked" : ""; ?> value="verify" style="margin-right: 10px;"/>VERIFY TOTALS MATCH ON BILL OF SALE <span style="margin-left: 22px;">AND FINANCE CONTRACT</span></li>
				<li><input type="checkbox" name="taken_check" <?php echo ($info['taken_check'] == "taken") ? "checked" : ""; ?> value="taken" style="margin-right: 10px;"/>DOWN PAYMENT IS TAKEN AND METHOD <span style="margin-left: 22px;">TAKEN IN LIGHTSPEED AT TIME OF DEPOSIT</span></li>
				<li><input type="checkbox" name="dactu_check" <?php echo ($info['dactu_check'] == "dactu") ? "checked" : ""; ?> value="dactu" style="margin-right: 10px;"/>IF USING DACTU - CUSTOMER TRADE-IN <span style="margin-left: 22px;">TITLE FORM DACTCU FEE $35</span></li>
				<li><input type="checkbox" name="attorney_check" <?php echo ($info['attorney_check'] == "attorney") ? "checked" : ""; ?> value="attorney" style="margin-right: 10px;"/>POWER OF ATTORNEY FOR TRADE TITLE</li>
			</ul>
		</div>
		
		
		<table cellpadding="0" cellspacing="0" width="100%" style="float: left; width: 100%;margin: 3px 0 0; border-bottom: 0px;">
			<tr>
				<th style="text-align: center;">LENDER</th>
				<th style="text-align: center;">DATE/TIME <br> SUBMITTED:</th>
				<th style="text-align: center;">APPROVED/DECLINED</th>
				<th style="text-align: center;">BUY RATE</th>
				<th style="text-align: center;">CONDITIONS/STIPS</th>
			</tr>
			
			<tr>
				<td style="text-align: center;">SYNCHRONY</td>
				<td><input type="text" name="synch_date" value="<?php echo isset($info["synch_date"]) ? $info['synch_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="synch_aproved" value="<?php echo isset($info["synch_aproved"]) ? $info['synch_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="synch_buy" value="<?php echo isset($info["synch_buy"]) ? $info['synch_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="synch_stip" value="<?php echo isset($info["synch_stip"]) ? $info['synch_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: center;">DATCU</td>
				<td><input type="text" name="datch_date" value="<?php echo isset($info["datch_date"]) ? $info['datch_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="datch_aproved" value="<?php echo isset($info["datch_aproved"]) ? $info['datch_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="datch_buy" value="<?php echo isset($info["datch_buy"]) ? $info['datch_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="datch_stip" value="<?php echo isset($info["datch_stip"]) ? $info['datch_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: center;">SHEFFIELD</td>
				<td><input type="text" name="shef_date" value="<?php echo isset($info["shef_date"]) ? $info['shef_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="shef_aproved" value="<?php echo isset($info["shef_aproved"]) ? $info['shef_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="shef_buy" value="<?php echo isset($info["shef_buy"]) ? $info['shef_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="shef_stip" value="<?php echo isset($info["shef_stip"]) ? $info['shef_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: center;">YAMAHA</td>
				<td><input type="text" name="yamaha_date" value="<?php echo isset($info["yamaha_date"]) ? $info['yamaha_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="yamaha_aproved" value="<?php echo isset($info["yamaha_aproved"]) ? $info['yamaha_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="yamaha_buy" value="<?php echo isset($info["yamaha_buy"]) ? $info['yamaha_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="yamaha_stip" value="<?php echo isset($info["yamaha_stip"]) ? $info['yamaha_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: center;">WESTLAKE</td>
				<td><input type="text" name="west_date" value="<?php echo isset($info["west_date"]) ? $info['west_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="west_aproved" value="<?php echo isset($info["west_aproved"]) ? $info['west_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="west_buy" value="<?php echo isset($info["west_buy"]) ? $info['west_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="west_stip" value="<?php echo isset($info["west_stip"]) ? $info['west_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td style="text-align: center;"><input type="text" name="space_lender" value="<?php echo isset($info["space_lender"]) ? $info['space_lender'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="space_date" value="<?php echo isset($info["space_date"]) ? $info['space_date'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="space_aproved" value="<?php echo isset($info["space_aproved"]) ? $info['space_aproved'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="space_buy" value="<?php echo isset($info["space_buy"]) ? $info['space_buy'] : '';?>" style="width: 100%;"></td>
				<td><input type="text" name="space_stip" value="<?php echo isset($info["space_stip"]) ? $info['space_stip'] : '';?>" style="width: 100%;"></td>
			</tr>
		</table>
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
