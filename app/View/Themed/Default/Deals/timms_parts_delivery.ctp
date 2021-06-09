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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
	@media print { 
	.dontprint{display: none;}
		/*body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; margin: 0; padding: 0;}
	label{font-size: 13px;}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}*/
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="container" style="width: 960px; margin: 0 auto;">
		
			<div class="row" style="float: left; width: 100%;">
			<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0 26px 0px;">Customer Delivery Path: PARTS AND ACCESSORIES</h2>
			<div class="logo" style="width: 200px; margin: 0 auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/timmsharley-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Date:</label>
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:''; ?>" style="text-align: center">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Salesperson:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="float: right; width: 89%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Customer Name:</label>
				<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="float: right; width: 87%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Phone Number:</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="float: right; width: 88%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Bike Year, Make, Model:</label>
				<input type="text" name="make_model" value="<?php echo isset($info['make_model'])?$info['make_model']:$info['year'].' '.$info['make'].' '.$info['model']; ?>"  style="float: right; width: 82%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>ABS Breaks:</label>
				 <span><input type="radio" name="abs_breaking" value="yes" <?php echo (isset($info['abs_breaking']) && $info['abs_breaking'] =='yes')?'checked':''; ?> />&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="abs_breaking" value="no" <?php echo (isset($info['abs_breaking']) && $info['abs_breaking'] =='no')?'checked':''; ?> />&nbsp; No</span>
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Color:</label>
				<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="float: right; width: 94%;">
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Financing:</label>
				<span><input type="radio" name="financing" value="yes" <?php echo (isset($info['financing']) && $info['financing'] =='yes')?'checked':''; ?> />&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="financing" value="no" <?php echo (isset($info['financing']) && $info['financing'] =='no')?'checked':''; ?> />&nbsp; No</span>
			</div>
			<div class="row" style="width: 100%; margin: 10px 0; float: left; ">
				<label>Parts Associate:</label>
				<input type="text" name="parts_associate" value="<?php echo isset($info['parts_associate'])?$info['parts_associate']:''; ?>" style="float: right; width: 87%;">
			</div>
			<div class="row" style="width: 100%; float: left;  margin: 10px 0;">
				<label>Parts Ordered/Pulled:</label>
				<span><input type="radio" name="parts_ordered" value="yes" <?php echo (isset($info['parts_ordered']) && $info['parts_ordered'] =='yes')?'checked':''; ?> />&nbsp;Yes &nbsp;&nbsp;<input type="radio" name="parts_ordered" value="no" <?php echo (isset($info['parts_ordered']) && $info['parts_ordered'] =='no')?'checked':''; ?> />&nbsp; No</span>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
				<label>Notes:</label>
				<textarea name="comments" style="height: 120px;  float: right; width: 94%;"><?php echo isset($info['comments'])?$info['comments']:''; ?></textarea>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 10px 0;">
				<label>Wish List:</label>
				<textarea name="wishlist" style="height: 120px;  float: right; width: 91%;"><?php echo isset($info['wishlist'])?$info['wishlist']:''; ?></textarea>
			</div>
			
		</div>
			
		
		
		
		</div>
		<!-- container end -->
		
			
	
	</div>
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
