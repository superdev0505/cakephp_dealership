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
    <input type="hidden" id="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" name="vin_trade">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
	
@media print {
	input[type="text"]{padding: 3px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="left-side" style="float: left; width: 37%; text-align: center; margin: 30px 0 0;">
				<b>1501 E, Ash St <br> Piqua, Ohio 45356</b>
			</div>
			<div class=="logo" style="width: 25%; float: left; text-align: center;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/piqua-harley.jpg'); ?>" alt="" style="width: 100%;">
				<b style="font-size: 16px; display: block; text-align: center; width: 100%;">TRADE PAYOFF FORM</b>
			</div>
			<div class="left-side" style="float: left; width: 37%; text-align: center; margin: 30px 0 0;">
				<b>937-773-8733 <br> Fax: 937-773-8855</b>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Name(s)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Address</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data']:$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>City, State, Zip, Code</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="account_num" value="<?php echo isset($info['account_num']) ? $info['account_num'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Account Number/SSN</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0; text-align: center;">
			<div class="form-field" style="float: left; width: 52%; margin: 3px 0;">
				<div class="outer-filed" style="float: left; width: 100%;">
					<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="float: left; width: 5%; border: 1px solid #000;">
					<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
					<input type="text" name="vin16" id="vin16" value="<?php echo isset($info['vin16']) ? $info['vin16'] : ''; ?>" style="float: left; width: 6%; border: 1px solid #000;">
				</div>
				<label>VIN #</label>
			</div>
			<div class="form-field" style="float: right; width: 47%; margin: 3px 0; text-align: center;">
				<input type="text" name="year_make_model" value="<?php echo isset($info['year_make_model'])?$info['year_make_model']:$info['year_trade'].' '.$info['make_trade'].' '.$info['model_trade']; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Year/Make/Model</label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 15px;">I/We <input type="text" name="name" style="width: 40%; border-bottom: 1px solid #000;"> Authorize Plqua Harley-Davidson to obtain all information regarding the account referenced above, and authorize you to release any and all information regarding my/our account. I/we furher authorize you to accept Payment from Piqua Harley-Davidson for the balance due on my/our account and you are instructed upon receipt to send the documents of title, properly endorsed and released, to Piqua Harle-Davidson, 1501 E. Ash Street, Piqua, Ohio 45356</p>
		
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 49%; margin: 3px 0; text-align: center;">
				<span style="font-size:14px;">X <input type="text" name="sign1" value="<?php echo isset($info['sign1']) ? $info['sign1'] :  ''; ?>" style="width: 94%; border-bottom: 1px solid #000;text-align: center;"></span>
				<label>Signature</label>
			</div>
			<div class="form-field" style="float: right; width: 48%; margin: 3px 0; text-align: center;">
				<input type="text" name="sign1_date" value="<?php echo isset($info['sign1_date']) ? $info['sign1_date'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;text-align: center;">
				<label>Date</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 49%; margin: 3px 0; text-align: center;">
				<span style="font-size:14px;">X <input type="text" name="sign2" value="<?php echo isset($info['sign2']) ? $info['sign2'] :  ''; ?>" style="width: 94%; border-bottom: 1px solid #000;text-align: center;"></span>
				<label>Signature</label>
			</div>
			<div class="form-field" style="float: right; width: 48%; margin: 3px 0; text-align: center;">
				<input type="text" name="sign2_date" value="<?php echo isset($info['sign2_date']) ? $info['sign2_date'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;text-align: center;">
				<label>Date</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="lender" value="<?php echo isset($info['lender']) ? $info['lender'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Lender</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Address to Send Payoff To</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0; text-align: center;">
				<input type="text" name="telephone" value="<?php echo isset($info['telephone']) ? $info['telephone'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Telephone</label>
			</div>
			<div class="form-field" style="float: left; width: 34%; margin: 3px 0; text-align: center;">
				<input type="text" name="fax" value="<?php echo isset($info['fax']) ? $info['fax'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px; border-right: 0px;text-align: center;">
				<label>Fax Telephone</label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0; text-align: center;">
				<input type="text" name="person_spoken" value="<?php echo isset($info['person_spoken']) ? $info['person_spoken'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Person Spoken TO</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0; text-align: center;">
				<input type="text" name="payoff_amt" value="<?php echo isset($info['payoff_amt']) ? $info['payoff_amt'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Payoff Amount</label>
			</div>
			<div class="form-field" style="float: left; width: 34%; margin: 3px 0; text-align: center;">
				<input type="text" name="payoff_good" value="<?php echo isset($info['payoff_good']) ? $info['payoff_good'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px; border-right: 0px;text-align: center;">
				<label>Payoff Good Through</label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0; text-align: center;">
				<input type="text" name="per_diem" value="<?php echo isset($info['per_diem']) ? $info['per_diem'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Per Diem</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; padding: 10px; text-align: center; border: 1px solid #000; box-sizing: border-box;">
			<h2 style="float: left; width: 100%; margin: 2px 0; font-size: 15px;"><b>Please Fax Payoff Information to: 937-773-8733</b></h2>
			<i style="display: block; font-size: 15px;">Please Remit All Documents of Title, Properly Endorsed and Released to:</i>
			<h2 style="float: left; width: 100%; margin: 2px 0; font-size: 15px;"><b>PIQUA Harley-Davidson, 1501 E. Ash Street, Piqua, Ohio 45356</b></h2>
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

	var vin = $('#vin_trade').val();
	var res = vin.split("");
	for (var i = 0; i <= 16; i++) {
		$("#vin" + i).val(res[i]);
	}

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
