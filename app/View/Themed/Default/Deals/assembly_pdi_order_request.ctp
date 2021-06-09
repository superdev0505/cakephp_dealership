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
	label{font-size: 16px;}
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
		<div class="logo" style="width: 400px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/village-ms-logo.png'); ?>" alt="" style="width: 100%;">
		</div>
		<h2 style="float: left; width: 100%; text-align: center; text-decoration: underline; font-size: 20px; margin: 10px 0;"><b>Assembly and PDI <br> Order Request</b></h2>
		<div class="row" style="width: 100%; float: left; margin: 7px 0;">
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Person Placing The Request</label>
				<input type="text" name="person_request" value="<?php echo isset($info['person_request'])?$info['person_request']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Date Order Placed</label>
				<input type="text" name="date_placed" value="<?php echo isset($info['date_placed'])?$info['date_placed']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Date Required</label>
				<input type="text" name="date_required" value="<?php echo isset($info['date_required'])?$info['date_required']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Assembly Only</label>
				<input type="text" name="assembly_only" value="<?php echo isset($info['assembly_only'])?$info['assembly_only']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Vehicle Being Traded In</label>
				<input type="text" name="vehicle_in" value="<?php echo isset($info['vehicle_in'])?$info['vehicle_in']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Unit Sold</label>
				<input type="text" name="unit_sold" value="<?php echo isset($info['unit_sold'])?$info['unit_sold']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0 20px;">
				<label style="float: left; width: 30%;">PDI</label>
				<input type="text" name="pdi" value="<?php echo isset($info['pdi'])?$info['pdi']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Color</label>
				<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">VIN Number</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Customer Name</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 50%; margin-left: 7%;">
			</div>
			<div class="from-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="float: left; width: 30%;">Special Details:</label>
				<input type="text" name="special1" value="<?php echo isset($info['special1'])?$info['special1']:''; ?>" style="width: 50%; margin: 5px 0 10px 7%;">
				<input type="text" name="special2" value="<?php echo isset($info['special2'])?$info['special2']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special3" value="<?php echo isset($info['special3'])?$info['special3']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special4" value="<?php echo isset($info['special4'])?$info['special4']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special5" value="<?php echo isset($info['special5'])?$info['special5']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special6" value="<?php echo isset($info['special6'])?$info['special6']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special7" value="<?php echo isset($info['special7'])?$info['special7']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special8" value="<?php echo isset($info['special8'])?$info['special8']:''; ?>" style="width: 100%; margin: 5px 0;">
				<input type="text" name="special9" value="<?php echo isset($info['special9'])?$info['special9']:''; ?>" style="width: 100%; margin: 5px 0;">
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
