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
		<h3 style=" margin: 21px 0 0; text-align: center; font-weight: normal; font-size: 19px;">Sales Units Pick Up / Delivery Check List</h3>
	
		<div class="content" style="float: left;width: 100%; margin: 30px 0 0;">
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>VIN NUMBER:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>MAKE / MODEL:</label>
					<input type="text" name="make_model" value="<?php echo isset($info['make_model'])?$info['make_model']:$info['make'].' '.$info['model']; ?>" style="width: 75%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>CONTACT:</label>
					<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
				</div>
					
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>ADDRESS:</label>
                	<textarea name="address" style="width:80%;" rows="2"><?php echo isset($info['address'])?$info['address']:''; ?></textarea>    
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>VISUAL INSPECTION:</label>
					<input type="text" name="visual_inspection" value="<?php echo isset($info['visual_inspection'])?$info['visual_inspection']:''; ?>" style="width: 75%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>CHECK:</label>
					<input type="text" name="check" value="<?php echo isset($info['check'])?$info['check']:''; ?>"  style="width: 80%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>MSO:</label>
					<input type="text" name="mso" value="<?php echo isset($info['mso'])?$info['mso']:''; ?>" style="width: 82%;">
				</div>
				
				<div class="form-field" style="float: left; width:100%; margin: 7px 0;">
					<label>KEY’s:</label>
					<input type="text" name="keys" value="<?php echo isset($info['keys'])?$info['keys']:''; ?>" style="width: 82%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>BATTERY:</label>
					<input type="text" name="battery" value="<?php echo isset($info['battery'])?$info['battery']:''; ?>" style="width: 80%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>ACID PACK:</label>
					<input type="text" name="acid_pack" value="<?php echo isset($info['acid_pack'])?$info['acid_pack']:''; ?>" style="width: 80%;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
					<label>OTHER PARTS:</label>
					<input type="text" name="other_parts" value="<?php echo isset($info['other_parts'])?$info['other_parts']:''; ?>" style="width: 80%;">
				</div>
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
