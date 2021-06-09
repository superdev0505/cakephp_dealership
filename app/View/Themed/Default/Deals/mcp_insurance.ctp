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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px; text-align: center;}
	label{font-size: 13px;}
	p{font-size: 14px; margin: 2px 4px;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class=="logo" style="width: 250px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/762/piqua-harley.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<p style="text-align: center; font-size: 14px;">1501 E, Ash Street <br> Piqua, Ohio 45356 <br> (937) 773-8733 Fax: (937) 773-8855</p>
			<h2 Style="float: left; width: 100%; font-size: 16px; margin: 4px 0; text-align: center;"><b>Motorcycle Purchase Insurance Information Form</b></h2>
			<h2 Style="float: left; width: 100%; font-size: 16px; margin: 4px 0; text-align: center;"><b>Vehicle Information:</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 25%; margin: 3px 0; text-align: center;">
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-right: 0px solid #000;">
				<label>Year</label>
			</div>
			<div class="form-field" style="float: left; width: 45%; margin: 3px 0; text-align: center;">
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px solid #000; border-right: 0px solid #000;">
				<label>Make</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 3px 0; text-align: center;">
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px solid #000;">
				<label>Model</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label>VIN # (Vehicle Identification Number)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : "" ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label>Purchase Price</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label>Engine C.I.D/CC's</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 Style="float: left; width: 100%; font-size: 16px; margin: 10px 0;"><b><i>Lienholder Information:</i></b></h2>
			<div class="outer" style="float: left; width: 100%;margin: 10px 0;">
				<div class="box" style="width: 400px; margin: 0 auto; text-align: center; border: 1px solid #000; height: 80px; padding: 10px;">
					<p style="float: left; width: 100%; margin: 0;"><b>Eaglemark Saving Bank <br> Its Successors and/or its Assigns <br> Po box 21750 <br> Carson City, Nevada 89721</b></p>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; text-align: center;">
			<p style="font-size: 14px;"><b>Please Have your Insurance Company Fax the Insurance Card and Binder to: (937) 773-8855 <br> Or Emailvit to </b> <a href="#">chris.long@pigurahd.com</a> <b>or</b> <a href="#">todd.galloway@piquahd.com</a></p>
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
