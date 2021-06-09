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

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;font-size: 14px;}
	label{font-size: 13px; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
		.left-text{background: #000 !important;}
@media print {
.left-text{background:#000;}
.title{background-color: #ddd;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="left" style="float: left; width: 90%; border-right: 20px solid #000; border-bottom: 10px solid #000;">
				<h2 style="float: left; width: 100%; font-size: 160px; text-align: center; margin: 0; line-height: 160px;">SOLD</h2>
				<h2 style="float: left; line-height: 50px; width: 100%; font-size: 50px; text-align: center; margin: 0;">SORRY</h2>
			
				<div class="form-field" style="margin: 10px 0; float: left; width: 100%; border-bottom: 1px solid #000;">
					<strong style="font-size: 22px;">Sold To</strong>
					<input type="text" name="sold_to" value="<?php echo isset($info['sold_to']) ? $info['sold_to'] : ''; ?>" style="width: 80%; border: 0px; font-size: 18px;">
				</div>
				
				<div class="form-field-outer" style="margin: 10px 0; float: left; width: 100%;">
					<div class="form-field" style="width: 50%; float: left; margin-top: 25px;">
						<strong style="font-size: 22px;">Sold By</strong>
						<input type="text" name="sold_by" value="<?php echo isset($info['sold_by']) ? $info['sold_by'] : ''; ?>" style="width: 70%; border: 0px; font-size: 18px;">
					</div>
					<div class="form-field" style="width: 50%; float: left;">
						<strong style="font-size: 22px; display: inline-block; width: 20%;">Del'y Date</strong>
						<input type="text" name="del_date" value="<?php echo isset($info['del_date']) ? $info['del_date'] : ''; ?>" style="width: 70%; border: 0px; font-size: 18px;">
					</div>
				</div>
			</div>
			
			
			<div class="right" style="float: left; width: 6%; position: relative;">
				<p style="left: -293%; position: absolute; top: 107px; transform: rotate(270deg); width: 400px;">BFA2BIG <span style="font-size: 20px;">.</span> TO REORDER CALL 1-800-231-0329</p>
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
