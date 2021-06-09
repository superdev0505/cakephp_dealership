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
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 0px solid #000;}
	th{padding: 4px; border-right: 0px solid #000;}
	td:first-child{text-align: left;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	td{padding: 3px;}
	.second-table td{text-align: center;}
	.second-table td:first-child{text-align: left;}
	.no-border input[type="text"]{border: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="logo" style="float: left; width: 12%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mvd-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 75%; text-align: center;">
				<p style="float: left; width: 100%; margin: 20px 0 30px; font-size: 16px;"><b>New Maxico Taxtation & Revenue Department, Motor Vehicle Division</b></p>
				<h2 style="float: let; width: 100%; margin-top: 20px;"><b>NOTICE OF VEHICLE SOLD</b></h2>
			</div>
			
			<div class="logo" style="float: right; width: 12%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mvd-round-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0;">This is to serve as notification, as required by Section 66-3-101(A) NMSA 1978, that the following vehicle has been sold, or otherwise transferred or assigned, and is no longer in my possession.</p>
		
		<p style="float: left; width: 100%; margin: 10px 0;">Please update your records to indicate the status of this vehicle as sold.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Model Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 71%;">
			</div>
			<div class="form-field" style="float: left; width: 70%;">
				<label>Licese Plate #</label>
				<input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : ''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Date vehicle sold</label>
				<input type="text" name="vehicle_sold" value="<?php echo isset($info['vehicle_sold']) ? $info['vehicle_sold'] : ''; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Vehicle's odometer mileage at time of the transfer</label>
				<input type="text" name="vehicle_odometer" value="<?php echo isset($info['vehicle_odometer']) ? $info['vehicle_odometer'] : ''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Was license plate removed  from vehicle</label>
				<label style="margin: 0 4%;"><input type="radio" name="vehicle_status" value="yes" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='yes')?'checked="checked"':''; ?> /> YES</label>
				<label><input type="radio" name="vehicle_status" value="no" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='no')?'checked="checked"':''; ?> /> NO</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<input type="text" name="buyer_vehicle" value="<?php echo isset($info['buyer_vehicle']) ? $info['buyer_vehicle'] : ''; ?>" style="width: 98%; margin-bottom: 5px;">
				<label>Buyer/transferee of vehicle (print name)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<input type="text" name="buyer_address" value="<?php echo isset($info['buyer_address']) ? $info['buyer_address'] : ''; ?>" style="width: 98%; margin-bottom: 5px;">
				<label>Buyer/transferee's address</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<input type="text" name="seller" value="<?php echo isset($info['seller']) ? $info['seller'] : ''; ?>" style="width: 98%; margin-bottom: 5px;">
				<label>Seller/transferor (print name)</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<input type="text" name="transter" value="<?php echo isset($info['transter']) ? $info['transter'] : ''; ?>" style="width: 98%; margin-bottom: 5px;">
				<label>Seller/transferor's address</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Signature of seller/transferor</label>
				<input type="text" name="sign_seller" value="<?php echo isset($info['sign_seller']) ? $info['sign_seller'] : ''; ?>" style="width: 65%;">
			</div>
			<div class="form-field" style="float: right; width: 36%;">
				<label>Date signed</label>
				<input type="text" name="date_signed" value="<?php echo isset($info['date_signed']) ? $info['date_signed'] : ''; ?>" style="width: 71%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 15px;"><b>Warning :</b><i> Any person who makes any false affidavit, or knowingly swears or affirms falsely to any matter required by the Motor Vehicle Code is guilty of perjury, which is a fourth degree felony (Sections 66-5-38 and 30-25-1 NMSA 1978).</i></p>
		
		<p style="float: left; width: 100%; margin: 30px 0 0; text-align: center;"> <label style="display: block; margin-bottom: 10px;">Please mail this completed form to:</label> <br>Motor Vehicle Division<br> Attn : Vehicle Services<br> P.O. Box 1028<br> Santa Fe, NM 87504-1028</p>
		
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
