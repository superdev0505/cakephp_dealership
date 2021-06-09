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
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal;}
	p{line-height: 21px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" style="width: 17%;">
			<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<p style="font-size: 16px; margin: 10px 0;"><?php echo $info['address']; ?><br><?php echo $info["city"]." ".$info['state']." ".$info['zip']; ?></p>
			<p style="font-size: 16px; margin: 10px 0;"> DEAR <?php echo $info['first_name']." ".$info['last_name']; ?></p>
			<p style="font-size: 16px; margin: 10px 0;"> I hope this letter finds you well and enjoying your new Harley-Davidson! I wanted to drop you a note and make sure your motorcycle is exceeding your expectations. its is important that everything is as you expected. I would also like to say thank you for trusting me with your motorcycle purchase. i have some of the best customers around and it was such a pleasure to work with you. If you need anything, please let me know. Whether it's to schedule a service, see if we have a particular item in stock, whatever you may need... feel free to call me! I'm always here, even after the sale. Owning a Harley-Davidson is an experience, not just a purchase, and everyone at Harley-Davidson of Tlanta is committed to providing the very best ownership experience possible.</p>
			<p style="font-size: 16px; margin: 10px 0;">Keep in mind, a lot of my sales are referral-based. It's a compliment to the level of service I provided to you and a vote of confidence that I will provide the same to your family and friends, so send them n! If someone you send in buys a bike from me, I'll send provide the same to your family and friends, so send them in! If someone you send in buys a bike from me, I'll send you a $50 GIFt CARD! Just remember to have them tell me who sent them in. If for some reason you don't feel you can recommend me or the dealership, let me or my manager know. Your complete satisfaction is our only goal!</p>
			<p style="font-size: 16px; margin: 10px 0;">Thank you for your business in the past and I look forward to seeing you again in the future!</p>
			

			<p style="font-size: 16px; margin: 10px 0;">Sincerely, <?php echo $info['sperson']; ?><br>
			Harley-Davidson of Atlanta <br>
			770-944-1340</p>
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
