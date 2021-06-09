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
	label{font-size: 13px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{border-left: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 3px 4px;}
	table input[type="text"]{border: 0px;}
	th{background-color: #ccc;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class=="logo" style="width: 25%; float: left;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/piqua-harley.jpg'); ?>" alt="" style="width: 75%;">
		</div>
		<h2 style="float: left; width: 75%; margin: 25px 0;font-size: 55px;    font-weight: 800;font-family: fantasy;font-weight: 800;"><i>Victory Lap Winner Info</i></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Owner Name</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<input type="text" name="passenger_name"  value="<?php echo isset($info['passenger_name']) ? $info['passenger_name'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000;text-align: center;">
				<label>Passenger / Riding Name</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 25%; margin: 3px 0; text-align: center;">
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-right: 0px solid #000;text-align: center;">
				<label>Year</label>
			</div>
			<div class="form-field" style="float: left; width: 45%; margin: 3px 0; text-align: center;">
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px solid #000; border-right: 0px solid #000;text-align: center;">
				<label>Model</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 3px 0; text-align: center;">
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] :  ''; ?>" style="float: left; width: 100%; border: 1px solid #000; border-left: 0px solid #000;text-align: center;">
				<label>Color</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label><i>Accessories:</i></label>
				<input type="text" name="access1" value="<?php echo isset($info['access1']) ? $info['access1'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
				<input type="text" name="access2" value="<?php echo isset($info['access2']) ? $info['access2'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
				<input type="text" name="access3" value="<?php echo isset($info['access3']) ? $info['access3'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
				<input type="text" name="access4" value="<?php echo isset($info['access4']) ? $info['access4'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
			</div>
		</div>
		
		<i style="display: block; width: 100%; float: left; margin: 5px 0 2px; font-size: 14px;">Check One</i>
		<div class="row" style="float: left; width: 100%; margin: 0 0 5px; box-sizing: border-box; padding: 5px; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 34%; margin: 3px 0;">
				<label><input type="radio" name="check1_status" value="comfort" <?php echo (isset($info['check1_status'])&&$info['check1_status']=='comfort')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Comfort</b></label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0;">
				<label><input type="radio" name="check1_status" value="performance" <?php echo (isset($info['check1_status'])&&$info['check1_status']=='performance')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Performance</b></label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0;">
				<label><input type="radio" name="check1_status" value="appearance" <?php echo (isset($info['check1_status'])&&$info['check1_status']=='appearance')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Appearance</b></label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
				<label>Previous Dealership Customer?</label>
				<span><input type="radio" name="dealer_status" value="yes" <?php echo (isset($info['dealer_status'])&&$info['dealer_status']=='yes')?'checked="checked"':''; ?> /> Yes </span>
				<span><input type="radio" name="dealer_status" value="no" <?php echo (isset($info['dealer_status'])&&$info['dealer_status']=='no')?'checked="checked"':''; ?> /> No </span>
			</div>
		</div>
		
		<i style="display: block; width: 100%; float: left; margin: 5px 0 2px; font-size: 14px;">Check One</i>
		<div class="row" style="float: left; width: 100%; margin: 0 0 5px; box-sizing: border-box; padding: 5px; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 34%; margin: 3px 0;">
				<label><input type="radio" name="check2_status" value="rider" <?php echo (isset($info['check2_status'])&&$info['check2_status']=='rider')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">First Time Rider</b></label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0;">
				<label><input type="radio" name="check2_status" value="harley" <?php echo (isset($info['check2_status'])&&$info['check2_status']=='harley')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">First Time Harley Davidson</b></label>
			</div>
			<div class="form-field" style="float: left; width: 33%; margin: 3px 0;">
				<label><input type="radio" name="check2_status" value="buyer" <?php echo (isset($info['check2_status'])&&$info['check2_status']=='buyer')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Experienced Harley-Davidson Buyer</b></label>
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="float: left; margin: 10px 0; border-top: 1px solid #000; border-left: 1px solid #000;">
			<tr>
				<td style="width: 50%;">
					<i>Family:</i>
					<input type="text" name="family" value="<?php echo isset($info['family']) ? $info['family'] :  ''; ?>" style="width: 70%;">
				</td>
				<td style="width: 50%;">
					<i>Occupation:</i>
					<input type="text" name="occupation" value="<?php echo isset($info['occupation']) ? $info['occupation'] :  ''; ?>" style="width: 70%;">
				</td>
			</tr>
			
			<tr>
				<td>
					<i>Recreation:</i>	
					<input type="text" name="recreation" value="<?php echo isset($info['recreation']) ? $info['recreation'] :  ''; ?>" style="width: 70%;">
				</td>
				<td>
					<i>Motivation:</i>
					<input type="text" name="motivation" value="<?php echo isset($info['motivation']) ? $info['motivation'] :  ''; ?>" style="width: 70%;">
				</td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 0; text-align: center; box-sizing: border-box; border: 1px solid #000; padding: 5px;">
			<div class="inner-side" style="float: left; width: 100%; text-align: center;">
				<label style="argin: 0 24px 0 0;"><i>Circle One</i></label>			
				<span class="form-field" style="margin: 3px 0;">
					<label><input type="radio" name="check3_status" value="storage" <?php echo (isset($info['check3_status'])&&$info['check3_status']=='storage')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Storage</b></label>
				</span>
				<span class="form-field" style="margin: 3px 22px;">
					<label><input type="radio" name="check3_status" value="delivery" <?php echo (isset($info['check3_status'])&&$info['check3_status']=='delivery')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Delivery</b></label>
				</span>
				<span class="form-field" style="margin: 3px 0;">
					<label><input type="radio" name="check3_status" value="customer" <?php echo (isset($info['check3_status'])&&$info['check3_status']=='customer')?'checked="checked"':''; ?> /> <b style="font-size: 15px;">Customer Pick-Up</b></label>
				</span>
			</div>
			<input type="text" name="dep1" value="<?php echo isset($info['dep1']) ? $info['dep1'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
			<input type="text" name="dep2" value="<?php echo isset($info['dep2']) ? $info['dep2'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
			<input type="text" name="dep3" value="<?php echo isset($info['dep3']) ? $info['dep3'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
			<input type="text" name="dep4" value="<?php echo isset($info['dep4']) ? $info['dep4'] :  ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 4px 0;">
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="float: left; margin: 10px 0; border-top: 1px solid #000; border-left: 1px solid #000;">
			<tr>
				<td style="width: 50%;">
					<i>Sales Person:</i>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] :  ''; ?>" style="width: 70%;">
				</td>
				<td style="width: 50%;">
					<i>Business Manager:</i>
					<input type="text" name="manager" value="<?php echo isset($info['manager']) ? $info['manager'] : ''; ?>" style="width: 65%;">
				</td>
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
