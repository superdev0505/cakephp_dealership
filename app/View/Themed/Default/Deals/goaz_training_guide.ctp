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
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
	input[type=text]{border:none;border-bottom:1px solid #000;}	
	ul li{list-style-type:disc!important;}	
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
	}
	</style>

	<div class="wraper header"> 
		
		
			
           <div class="row">
		<div class="top-header" style="float: left; width: 100%;">
			<div class="logo" style="width: 20%; float: left; margin-left: 28%;">
				<img src="<?php echo ('/app/webroot/files/goaz_images/logo1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo2" style="width: 25%; float: left;">
				<img src="<?php echo ('/app/webroot/files/goaz_images/logo2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="content" style="float: left;width: 100%;">
			<h1 style="text-decoration: underline; text-align: center; margin-top: 70px;">GOAZ Demo Track</h1>
			
				<h3 style="font-size: 23px; margin-bottom: 30px;">Training Facility Guidelines:</h3>
				<div class="content-inner" style="width: 90%; margin: 0 auto;">
				<ul style="font-size: 17px;">
					<li style="margin-bottom: 7px">Always Ride safely and respect others on the training facility.  Speeds in excess of 30MPH will not be tolerated.</li>
					<li style="margin-bottom: 7px">Racing WILL NOT be tolerated on the training pad.</li>
					<li style="margin-bottom: 7px">Stay off the training pad when wet.</li>
					<li style="margin-bottom: 7px">The training pad is for motorcycles ONLY.  KEEP OFF THE PAD WITH ANY OTHER VEHICLES.</li>
					<li style="margin-bottom: 7px">Must wear helmet, long pants, enclosed shoes/boots, gloves, and a jacket at all times when riding on the training pad.</li>
					<li style="margin-bottom: 7px">GOAZ employee must be present at all times during demo.</li>
					<li style="margin-bottom: 7px">GOAZ demo waiver must be completed.</li>
				</ul>
				
				<div class="energency" style="font-size: 17px; margin: 46px 23px 70px;">
					<p>Emergency contact:</p>
					<div class="from-field">
						<label>Name :</label>
						<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" /> 
					</div>
					<div class="from-field">
						<label>Phone :</label>
						<input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>" /> 
					</div>
				</div>
			</div>
			
			<div class="from-field" style="margin: 0 0 40px;">
				<label>Signature :</label>
				<input type="text"  style="width: 50%;" /> 
			</div>
			<div class="from-field">
				<label>Date :</label>
				<input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" /> 
			</div>
		</div>
	</div>
            
            
	</div></div>
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
