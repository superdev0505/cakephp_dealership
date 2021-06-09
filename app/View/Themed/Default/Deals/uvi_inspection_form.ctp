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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal;}
	p{font-size: 14px; margin: 2px 4px;}
	table{font-size: 14px;}
	td, th{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 4px;}
	.detail-form td:first-child, .detail-form th:first-child{border-bottom: 0px;}
	table input[type="text"]{border-bottom: 0px solid #000;}
	
@media print {
	input[type="text"]{padding: 3px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 600px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/village-ms-logo.png'); ?>" alt="" style="width: 100%;">
		</div>
		<h2 style="float: left; width: 100%; margin: 0; font-size: 22px; text-align: center; margin: 10px 0;"><b>UVI INSPECTION FORM</b></h2>
		<div class="row" style="width: 100%; margin: 10px 0; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 25%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; margin: 0; width: 35%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; margin: 0; width: 40%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 10px 0; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 40%;">
				<label>Miles</label>
				<input type="text" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; margin: 0; width: 60%;">
				<label>VIN#</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 10px 0; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 49%;">
				<label>Date Received</label>
				<input type="text" name="date_receive" value="<?php echo isset($info['date_receive'])?$info['date_receive']:''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: right; margin: 0; width: 50%;">
				<label>Time Received</label>
				<input type="text" name="time_receive" value="<?php echo isset($info['time_receive'])?$info['time_receive']:''; ?>" style="width: 77%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 10px 0; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 49%;">
				<label>Recalls</label>
				<label><input type="checkbox" name="recall_check" value="yes" <?php echo (isset($info['recall_check'])&&$info['recall_check']=='yes')?'checked="checked"':''; ?> /> Y</label>
				<label><input type="checkbox" name="recall_check" value="no" <?php echo (isset($info['recall_check'])&&$info['recall_check']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		
		<table class="detail-form" width="100%" cellpadding="0" cellspacing="0" style="margin: 30px 0 0; float: left;">
			<tr>
				<th>&nbsp;</th>
				<th style="border-top: 1px solid #000;">GOOD</th>
				<th style="border-top: 1px solid #000;">FAIR</th>
				<th style="border-top: 1px solid #000;">POOR</th>
				<th style="border-top: 1px solid #000;">LEVEL</th>
			</tr>
			
			<tr>
				<td>Engine Oil</td>
				<td><input type="text" name="good_oil" value="<?php echo isset($info['good_oil'])?$info['good_oil']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_oil" value="<?php echo isset($info['fair_oil'])?$info['fair_oil']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_oil" value="<?php echo isset($info['poor_oil'])?$info['poor_oil']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_oil" value="<?php echo isset($info['level_oil'])?$info['level_oil']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Air Filter</td>
				<td><input type="text" name="good_filter" value="<?php echo isset($info['good_filter'])?$info['good_filter']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_filter" value="<?php echo isset($info['fair_filter'])?$info['fair_filter']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_filter" value="<?php echo isset($info['poor_filter'])?$info['poor_filter']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_filter" value="<?php echo isset($info['level_filter'])?$info['level_filter']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Front Diff Fluid</td>
				<td><input type="text" name="good_diff" value="<?php echo isset($info['good_diff'])?$info['good_diff']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_diff" value="<?php echo isset($info['fair_diff'])?$info['fair_diff']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_diff" value="<?php echo isset($info['poor_diff'])?$info['poor_diff']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_diff" value="<?php echo isset($info['level_diff'])?$info['level_diff']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Rear Diff Fluid</td>
				<td><input type="text" name="good_rear" value="<?php echo isset($info['good_rear'])?$info['good_rear']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_rear" value="<?php echo isset($info['fair_rear'])?$info['fair_rear']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_rear" value="<?php echo isset($info['poor_rear'])?$info['poor_rear']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_rear" value="<?php echo isset($info['level_rear'])?$info['level_rear']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Transmission Fluid</td>
				<td><input type="text" name="good_fluid" value="<?php echo isset($info['good_fluid'])?$info['good_fluid']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_fluid" value="<?php echo isset($info['fair_fluid'])?$info['fair_fluid']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_fluid" value="<?php echo isset($info['poor_fluid'])?$info['poor_fluid']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_fluid" value="<?php echo isset($info['level_fluid'])?$info['level_fluid']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Chain and Sprockets</td>
				<td><input type="text" name="good_chain" value="<?php echo isset($info['good_chain'])?$info['good_chain']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_chain" value="<?php echo isset($info['fair_chain'])?$info['fair_chain']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_chain" value="<?php echo isset($info['poor_chain'])?$info['poor_chain']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_chain" value="<?php echo isset($info['level_chain'])?$info['level_chain']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Drive Belt</td>
				<td><input type="text" name="good_drive" value="<?php echo isset($info['good_drive'])?$info['good_drive']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_drive" value="<?php echo isset($info['fair_drive'])?$info['fair_drive']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_drive" value="<?php echo isset($info['poor_drive'])?$info['poor_drive']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_drive" value="<?php echo isset($info['level_drive'])?$info['level_drive']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Brakes</td>
				<td><input type="text" name="good_brake" value="<?php echo isset($info['good_brake'])?$info['good_brake']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_brake" value="<?php echo isset($info['fair_brake'])?$info['fair_brake']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_brake" value="<?php echo isset($info['poor_brake'])?$info['poor_brake']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_brake" value="<?php echo isset($info['level_brake'])?$info['level_brake']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Fork Seals</td>
				<td><input type="text" name="good_seals" value="<?php echo isset($info['good_seals'])?$info['good_seals']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_seals" value="<?php echo isset($info['fair_seals'])?$info['fair_seals']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_seals" value="<?php echo isset($info['poor_seals'])?$info['poor_seals']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_seals" value="<?php echo isset($info['level_seals'])?$info['level_seals']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Tires</td>
				<td><input type="text" name="good_tire" value="<?php echo isset($info['good_tire'])?$info['good_tire']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_tire" value="<?php echo isset($info['fair_tire'])?$info['fair_tire']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_tire" value="<?php echo isset($info['poor_tire'])?$info['poor_tire']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_tire" value="<?php echo isset($info['level_tire'])?$info['level_tire']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Cosmetic Damage</td>
				<td><input type="text" name="good_damage" value="<?php echo isset($info['good_damage'])?$info['good_damage']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_damage" value="<?php echo isset($info['fair_damage'])?$info['fair_damage']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_damage" value="<?php echo isset($info['poor_damage'])?$info['poor_damage']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_damage" value="<?php echo isset($info['level_damage'])?$info['level_damage']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Engine Noise</td>
				<td><input type="text" name="good_noise" value="<?php echo isset($info['good_noise'])?$info['good_noise']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_noise" value="<?php echo isset($info['fair_noise'])?$info['fair_noise']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_noise" value="<?php echo isset($info['poor_noise'])?$info['poor_noise']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_noise" value="<?php echo isset($info['level_noise'])?$info['level_noise']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td>Shifting</td>
				<td><input type="text" name="good_shift" value="<?php echo isset($info['good_shift'])?$info['good_shift']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="fair_shift" value="<?php echo isset($info['fair_shift'])?$info['fair_shift']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="poor_shift" value="<?php echo isset($info['poor_shift'])?$info['poor_shift']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="level_shift" value="<?php echo isset($info['level_shift'])?$info['level_shift']:''; ?>" style="width: 100%;"></td>
			</tr>
			
		</table>
		
		<div class="row" style="width: 100%; margin: 40px 0 0; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 100%;">
				<label>Comments: </label>
				<input type="text" name="comment1" value="<?php echo isset($info['comment1'])?$info['comment1']:''; ?>" style="width: 90%; float: right;">
				<input type="text" name="comment2" value="<?php echo isset($info['comment2'])?$info['comment2']:''; ?>" style="width: 100%; float: right; margin: 5px 0;">
				<input type="text" name="comment3" value="<?php echo isset($info['comment3'])?$info['comment3']:''; ?>" style="width: 100%; float: right; margin: 5px 0;">
				<input type="text" name="comment4" value="<?php echo isset($info['comment4'])?$info['comment4']:''; ?>" style="width: 100%; float: right; margin: 5px 0;">
				<input type="text" name="comment5" value="<?php echo isset($info['comment5'])?$info['comment5']:''; ?>" style="width: 100%; float: right; margin: 5px 0;">
				<input type="text" name="comment6" value="<?php echo isset($info['comment6'])?$info['comment6']:''; ?>" style="width: 100%; float: right; margin: 5px 0;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 10px 0 10px; float: left;">
			<div class="form-field" style="float: left; margin: 0; width: 100%;">
				<label>Technician Signature</label>
				<input type="text" name="tech_sign" value="<?php echo isset($info['tech_sign'])?$info['tech_sign']:''; ?>" style="width: 85%; float: right;">
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
