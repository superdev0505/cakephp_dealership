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

<div class="wraper main" id="worksheet_wraper"  style=" overflow: hidden;"> 
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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal !important;}
	.row-table input[type="text"]{border-bottom: 0px; margin: 2px 0;}
	.wraper.main input {padding: 2px; padding-left: 5px;}
@media print {
.row {margin: 0 0 0px !important;}
input[type="text"]{padding-left: 5px !important;}
.dontprint{display: none;}
.bottom-title {margin-top: 30px !important;}
.form-field {height: 50px !important;}

	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 100%; margin: 30px 0 35px; font-size: 20px; text-align: center;"><b>Trade Information Sheet</b></h2>
		</div>
	
		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Sales Person:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 64%;">
			</div>

			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">Date Taken:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">RV Information:</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 45%;">
				<label style="width: 38%; text-align: right; display: block; float: left;">Year</label>
				<input type="text" name="rv_year" value="<?php echo isset($info['rv_year'])?$info['rv_year']:''; ?>" style="width: 61%;">
			</div>

			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">Make</label>
				<input type="text" name="rv_make" value="<?php echo isset($info['rv_make'])?$info['rv_make']:''; ?>" style="width: 78%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Brand</label>
				<input type="text" name="brand" value="<?php echo isset($info['brand'])?$info['brand']:''; ?>" style="width: 64%;">
			</div>

			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;margin-left: 36px;">Model</label>
				<input type="text" name="rv_model" value="<?php echo isset($info['rv_model'])?$info['rv_model']:''; ?>" style="width: 60%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Class</label>
				<input type="text" name="class_info" value="<?php echo isset($info['class_info'])?$info['class_info']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Engine</label>
				<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Transmission</label>
				<input type="text" name="trans" value="<?php echo isset($info['trans'])?$info['trans']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Mileage</label>
				<input type="text" name="mileage" value="<?php echo isset($info['mileage'])?$info['mileage']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Weight</label>
				<input type="text" name="weight" value="<?php echo isset($info['weight'])?$info['weight']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Height</label>
				<input type="text" name="height" value="<?php echo isset($info['height'])?$info['height']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;"># of Slides</label>
				<input type="text" name="slide" value="<?php echo isset($info['slide'])?$info['slide']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Generator Size</label>
				<input type="text" name="generator_size" value="<?php echo isset($info['generator_size'])?$info['generator_size']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Type of Leveling</label>
				<input type="text" name="leveling" value="<?php echo isset($info['leveling'])?$info['leveling']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Awning</label>
				<input type="text" name="awning" value="<?php echo isset($info['awning'])?$info['awning']:''; ?>" style="width: 45%;">
			</div>
		</div>


		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Dinette Configuration</label>
				<input type="text" name="dinette" value="<?php echo isset($info['dinette'])?$info['dinette']:''; ?>" style="width: 45%;">
			</div>
		</div>


		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;">Entertainment</label>
				<input type="text" name="entertainment" value="<?php echo isset($info['entertainment'])?$info['entertainment']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 0 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="width: 35%; text-align: right; display: block; float: left;"># of TV's</label>
				<input type="text" name="tv" value="<?php echo isset($info['tv'])?$info['tv']:''; ?>" style="width: 45%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 28px 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block;">Additional Equipment and Amenities:</label>
				<label style="width: 35%; text-align: right; display: block;">Items it may need:</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 28px 8px;">
			<div class="work" style="float: left; width: 100%;">
				<input type="text" name="item1" value="<?php echo isset($info['item1']) ? $info['item1'] : "" ?>" style="width: 94%; margin-bottom: 7px;">
				<input type="text" name="item2" value="<?php echo isset($info['item2']) ? $info['item2'] : "" ?>" style="width: 94%; margin-bottom: 7px;">
				<input type="text" name="item3" value="<?php echo isset($info['item3']) ? $info['item3'] : "" ?>" style="width: 94%; margin-bottom: 7px;">	
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 28px 8px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="text-align: left; display: block; float: left;">Additional Comments:</label>
				<input type="text" name="comment1" value="<?php echo isset($info['comment1'])?$info['comment1']:''; ?>" style="width: 80.2%;">
				<input type="text" name="comment2" value="<?php echo isset($info['comment2'])?$info['comment2']:''; ?>" style="width: 94%;">
				<input type="text" name="comment3" value="<?php echo isset($info['comment3'])?$info['comment3']:''; ?>" style="width: 94%;">
			</div>
		</div>

		<div class="row bottom-title" style="float: left; width: 100%; margin: 0 28px 8px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="text-align: left; display: block; float: left;">How many owners:</label>
				<input type="text" name="owners" value="<?php echo isset($info['owners'])?$info['owners']:''; ?>" style="width: 40%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 0 28px 8px;">
			<div class="form-field" style="float: right; width: 35%;">
				<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign'])?$info['manager_sign']:''; ?>" style="width: 83%;">
				<label style="margin-left: 80px;display: block;">Manager Signature</label>
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
