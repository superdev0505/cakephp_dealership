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
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 20%; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/wind-river-logo.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 95%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>MOTORCYCLE</label>
				<input type="text" name="motor" value="<?php echo isset($info['motor']) ? $info['motor'] : $info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 89%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>BUSINESS OFFICE</label>
				<input type="text" name="business_office" value="<?php echo isset($info['business_office']) ? $info['business_office'] : ''; ?>" style="width: 87%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 46%; margin-left: 3%;">
				<input type="text" name="customer_info" value="<?php echo isset($info['customer_info']) ? $info['customer_info'] : ''; ?>" style="width: 30%;">
				<label>APPLICATION/CUSTOMER INFORMATION</label>
			</div>
			<div class="form-field" style="float: left; width: 22%; margin: 0 3%;">
				<input type="text" name="hog" value="<?php echo isset($info['hog']) ? $info['hog'] : ''; ?>" style="width: 85%;">
				<label style="float: right;">HOG</label>
			</div>
			<div class="form-field" style="float: left; width: 22%;">
				<input type="text" name="csi" value="<?php echo isset($info['csi']) ? $info['csi'] : ''; ?>" style="width: 88%;">
				<label style="float: right;">CSI</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 21%; margin-left: 3%;">
				<input type="text" name="esp" value="<?php echo isset($info['esp']) ? $info['esp'] : ''; ?>" style="width: 60%;">
				<label>ESP</label>
			</div>
			<div class="form-field" style="float: left; width: 21%; margin: 0 3%;">
				<input type="text" name="gap" value="<?php echo isset($info['gap']) ? $info['gap'] : ''; ?>" style="width: 60%;">
				<label>GAP</label>
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<input type="text" name="ppm" value="<?php echo isset($info['ppm']) ? $info['ppm'] : ''; ?>" style="width: 76%;">
				<label>PPM</label>
			</div>
			<div class="form-field" style="float: left; width: 21%; float: right;">
				<input type="text" name="tw" value="<?php echo isset($info['tw']) ? $info['tw'] : ''; ?>" style="width: 80%;">
				<label>TW</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 21%; margin-left: 3%;">
				<input type="text" name="appearance" value="<?php echo isset($info['appearance']) ? $info['appearance'] : ''; ?>" style="width: 40%;">
				<label>APPEARANCE</label>
			</div>
			<div class="form-field" style="float: left; width: 21%; margin: 0 3%;">
				<input type="text" name="theft" value="<?php echo isset($info['theft']) ? $info['theft'] : ''; ?>" style="width: 40%;">
				<label>THEFT</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>SALES FLOOR</label>
				<input type="text" name="sales_floor" value="<?php echo isset($info['sales_floor']) ? $info['sales_floor'] : ''; ?>" style="width: 89%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 21%; margin-left: 3%;">
				<input type="text" name="demo" value="<?php echo isset($info['demo']) ? $info['demo'] : ''; ?>" style="width: 60%;">
				<label>DEMO</label>
			</div>
			<div class="form-field" style="float: left; width: 21%; margin: 0 3%;">
				<input type="text" name="keys" value="<?php echo isset($info['keys']) ? $info['keys'] : ''; ?>" style="width: 60%;">
				<label>KEYS</label>
			</div>
			<div class="form-field" style="float: left; width: 21%;">
				<input type="text" name="manual" value="<?php echo isset($info['manual']) ? $info['manual'] : ''; ?>" style="width: 64%;">
				<label>MANUAL</label>
			</div>
			<div class="form-field" style="width: 26%; float: right;">
				<input type="text" name="inspect" value="<?php echo isset($info['inspect']) ? $info['inspect'] : ''; ?>" style="width: 38%;">
				<label>VEHICLE INSPECTION</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>MOTORCLOTHES</label>
				<input type="text" name="motor" value="<?php echo isset($info['motor']) ? $info['motor'] : ''; ?>" style="width: 87%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 36%; margin-left: 3%;">
				<input type="text" name="gear" value="<?php echo isset($info['gear']) ? $info['gear'] : ''; ?>" style="width: 40%;">
				<label>RIDING/SAFETY GEAR</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="loyalty" value="<?php echo isset($info['loyalty']) ? $info['loyalty'] : ''; ?>" style="width: 40%;">
				<label>LOYALTY CARD</label>
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<input type="text" name="discount" value="<?php echo isset($info['discount']) ? $info['discount'] : ''; ?>" style="width: 40%;">
				<label>DISCOUNT</label> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>PARTS</label>
				<input type="text" name="parts" value="<?php echo isset($info['parts']) ? $info['parts'] : ''; ?>" style="width: 95%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 43%; margin-left: 3%;">
				<input type="text" name="book" value="<?php echo isset($info['book']) ? $info['book'] : ''; ?>" style="width: 60%;">
				<label>PARTS BOOK</label>
			</div>
			<div class="form-field" style="float: left; width: 43%;">
				<input type="text" name="chrome" value="<?php echo isset($info['chrome']) ? $info['chrome'] : ''; ?>" style="width: 60%;">
				<label>CHROME CONSULTANT</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>SERVICE</label>
				<input type="text" name="service" value="<?php echo isset($info['service']) ? $info['service'] : ''; ?>" style="width: 93%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 43%; margin-left: 3%">
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 50%;">
				<label>HOURS/CONTACT INFO</label>
			</div>
			<div class="form-field" style="float: left; width: 43%;">
				<input type="text" name="appointment" value="<?php echo isset($info['appointment']) ? $info['appointment'] : ''; ?>" style="width: 50%;">
				<label>APPOINTMENT PROCEDURE</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 43%; margin-left: 3%">
				<input type="text" name="walk" value="<?php echo isset($info['walk']) ? $info['walk'] : ''; ?>" style="width: 50%;">
				<label>SERVICE WALK</label>
			</div>
			<div class="form-field" style="float: left; width: 43%;">
				<input type="text" name="around" value="<?php echo isset($info['around']) ? $info['around'] : ''; ?>" style="width: 40%;">
				<label>MOTORCYCLE WALK AROUND</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;margin: 10px 0;">
			<div class="form-field" style="float: left; width: 43%; margin: 0 2%">
				<label>CUSTOMER SIGNATURE</label>
				<input type="text" name="custom_sign" value="<?php echo isset($info['custom_sign']) ? $info['custom_sign'] : ''; ?>" style="width: 60%;">
				
			</div>
			<div class="form-field" style="float: left; width: 43%; margin: 0 4%;">
				<label>DATE</label>
				<input type="text" name="custom_date" value="<?php echo isset($info['custom_date']) ? $info['custom_date'] : ''; ?>" style="width: 90%;">
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
