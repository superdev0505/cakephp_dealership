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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;"><b>MOTO UNITED ORANGE COUNTY</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="from-filed" style="float: left; width: 70%; margin: 0;">
				<label>SALES PERSON</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 80%">
			</div>
			<div class="from-filed" style="float: left; width: 30%; margin: 0;">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date("m/d/Y"); ?>" style="width: 80%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label>CUSTOMER</label> 
				<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="from-filed" style="float: left; width: 25%; margin: 0;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 80%">
			</div>
			<div class="from-filed" style="float: left; width: 30%; margin: 0;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 80%">
			</div>
			<div class="from-filed" style="float: left; width: 45%; margin: 0;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 80%">
			</div>
		</div>
		
		<h3 style="float: left; width: 100%; margin: 10px 0; font-size: 14px;"><b>BANK:</b></h3>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">YA CARD</label>
				<input type="text" name="card1" value="<?php echo isset($info['card1'])?$info['card1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="card2" value="<?php echo isset($info['card2'])?$info['card2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">CITI</label>
				<input type="text" name="citi1" value="<?php echo isset($info['citi1'])?$info['citi1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="citi2" value="<?php echo isset($info['citi2'])?$info['citi2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">SHEFFIELD</label>
				<input type="text" name="sheff1" value="<?php echo isset($info['sheff1'])?$info['sheff1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="sheff2" value="<?php echo isset($info['sheff2'])?$info['sheff2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">MODEL</label>
				<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">AFHS</label>
				<input type="text" name="afhs1" value="<?php echo isset($info['afhs1'])?$info['afhs1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="afhs2" value="<?php echo isset($info['afhs2'])?$info['afhs2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">MODEL</label>
				<input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="model4" value="<?php echo isset($info['model4'])?$info['model4']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">THUNDER</label>
				<input type="text" name="thunder1" value="<?php echo isset($info['thunder1'])?$info['thunder1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="thunder2" value="<?php echo isset($info['thunder2'])?$info['thunder2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0px;">
			<div class="from-filed" style="float: left; width: 100%; margin: 0;">
				<label style="float: left; width: 12%; border-bottom: 1px solid #000; height: 23px; line-height: 23px;">OTHER</label>
				<input type="text" name="other1" value="<?php echo isset($info['other1'])?$info['other1']:''; ?>" style="width: 88%; border-bottom: 1px solid #000;">
				<input type="text" name="other2" value="<?php echo isset($info['other2'])?$info['other2']:''; ?>" style="width: 100%; border-bottom: 1px solid #000;">
			</div>
		</div>                        
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="from-filed" style="float: left; width: 70%; margin: 0;">
				<label style="float: left; width: 12%;">NOTES</label>
				<textarea class="note" name="term_notes" style="width: 100%; height: 200px; border: 0px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
			</div>
			<div class="from-filed" style="float: left; width: 30%; margin: 0; border-left: 1px solid #000; box-sizing: border-box;">
				<label style="float: left; width: 12%; padding-left: 2%;">STIPS</label>
				<textarea class="stips" name="stips" style="width: 100%; height: 200px; border: 0px;"><?php echo isset($info['stips'])?$info['stips']:'' ?></textarea>
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
