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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000; text-align: left;}
	td:nth-child(4), td:nth-child(7){text-align: left;}
	th:nth-child(4), th:nth-child(7){text-align: left;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: center; padding: 3px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.combo-btns{text-align: center;}
	.combo-btns .down-btn{display: inline-block; padding: 5px 18px; margin: 0 1%; border: 1px solid #000; text-decoration: none; color: #000; font-size: 13px;}
	.detail-btn{font-size: 12px; border: 1px solid #000; padding: 3px 6px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<p style="float: left; width: 100%; text-align: center;"><b>RV Sales</b> <br> PO Box 2098 <br> 2109 W US RT 66 <br> Moriarty, NM 87035 <br> 505.832.2400</p>
			<h2 style="float: left; width: 100%; margin: 7px 0 16px; text-align: center; font-size: 16px;"><b>PAYOFF ADJUSTMENT FORM</b></h2>
			
			<p style="float: left; width: 100%; margin: 5px 0;"> I estimate my payoff to be $<input type="text" name="price_value" value="<?php echo isset($info['price_value'])?$info['price_value']:''; ?>" style="width: 30%;">. I understand if it is higher than this amount, I must pay the difference on demand.</p>
			
			<p style="float: left; width: 100%; margin: 5px 0;">If it is less than this amount, I will then receive the difference back in cash  or credit upon  completion of my transaction.</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 60%;">
					<input type="text" name="sign1" value="<?php echo isset($info['sign1'])?$info['sign1']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<input type="text" name="sign1_date" value="<?php echo isset($info['sign1_date'])?$info['sign1_date']:''; ?>" style="width: 90%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 60%;">
					<input type="text" name="sign2" value="<?php echo isset($info['sign2'])?$info['sign2']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<input type="text" name="sign2_date" value="<?php echo isset($info['sign2_date'])?$info['sign2_date']:''; ?>" style="width: 50%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; text-align: center; margin: 10px 0;"><b>RV Sales</b> <br> PO Box 2098 <br> 2109 W US RT 66 <br> Moriarty, NM 87035 <br> 505.832.2400</p>
		
		<h2 style="float: left; width: 100%; margin: 7px 0 16px; text-align: center; font-size: 16px;"><b>AUTHORIZATION FOR PAYOFF</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>To:</label>
				<input type="text" name="to" value="<?php echo isset($info['to'])?$info['to']:''; ?>" style="width: 40%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>Address:</label>
				<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 36%;"> <br>
				<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 43%; margin: 5px 0;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0;">I hereby authorize you to accept from RV Sales, INC, 2109 US RT 66 W., Moriarty, NM 87035 $ <input type="text" name="num" value="<?php echo isset($info['num'])?$info['num']:''; ?>" style="width: 20%"> , being the balance due on my account #<input type="text" name="account" value="<?php echo isset($info['account'])?$info['account']:''; ?>" style="width: 25%"> and you are instructed upon receipt of the above amount, to surrender to them the documents of title, properly endorsed and released. You are further instructed to cancel my insurance policy and pay any unearned insurance premium, also all unearned interest and brokerage, to the company above named and authoized to make this payoff</p>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 60%;">
					<input type="text" name="sign3" value="<?php echo isset($info['sign3'])?$info['sign3']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<input type="text" name="sign3_date" value="<?php echo isset($info['sign3_date'])?$info['sign3_date']:''; ?>" style="width: 50%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 60%;">
					<input type="text" name="sign4" value="<?php echo isset($info['sign4'])?$info['sign4']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<input type="text" name="sign4_date" value="<?php echo isset($info['sign4_date'])?$info['sign4_date']:''; ?>" style="width: 50%; margin-bottom: 3px;">
					<label>Date</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 100%;">
					<input type="text" name="social_security1" value="<?php echo isset($info['social_security1'])?$info['social_security1']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Social Security #</label>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 40%;">
				<div class="form-field" style="float: left; width: 100%;">
					<input type="text" name="social_security2" value="<?php echo isset($info['social_security2'])?$info['social_security2']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Social Security #</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<input type="text" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']: $info['make']." ".$info['model']." ".$info['vin']; ?>" style="width: 100%; margin-bottom: 3px; text-align: center;">
				<label style="display: inline-block; text-align: center; width: 100%;">Year / Make / Model / VIN# of Unit being paid off</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<p style="float: left; width: 100%;">PLEASE SEND TITLE/LEIN RELEASE TO: <br>
			<b>RV SALES</b> <br>
			PO BOX 2098 <br>
			2109 W US RT 66 <br>
			Moriarty, NM 87035</p>

			<p style="float: left; width: 100%; margin: 6px 0;">Any question regarding this payoff, please call: <input type="text" name="name" style="width: 30%; border: 0px;"></p>
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
