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

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box;}
	
@media print {
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 18px;"><b>CUSTOMER INFORMATION</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 80%;">
				<input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 100%;">
				<label><b>Salesperson</b></label>
			</div>
			<div class="form-field" style="float: right; width: 19%;">
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				<label><b>Date</b></label>
			</div>
		</div>
		
		<div class="cover" style="float: left; width: 100%;box-sizing: border-box; padding: 5px 10px; border: 1px solid #000;">
			<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 18px;"><b>CUSTOMER INFORMATION</b></h2>
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
					<label><b>Name</b></label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
					<label><b>Address</b></label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 33%;">
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%;">
					<label><b>City</b></label>
				</div>
				<div class="form-field" style="float: left; width: 18%; margin: 0 2%;">
					<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
					<label><b>State</b></label>
				</div>
				<div class="form-field" style="float: left; width: 18%; margin-right: 2%;">
					<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
					<label><b>Zip</b></label>
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<input type="text" name="birthday" value="<?php echo isset($info['birthday']) ? $info['birthday'] : $info['dob']; ?>" style="width: 100%;">
					<label><b>Birthday</b></label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 32%;">
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 100%;">
					<label><b>Home Phone</b></label>
				</div>
				<div class="form-field" style="float: left; width: 32%; margin: 0 2%;">
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 100%;">
					<label><b>Work</b></label>
				</div>
				<div class="form-field" style="float: left; width: 32%;">
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 100%;">
					<label><b>Cell Phone</b></label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 66%;">
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%;">
					<label style=" display: block;"><b>E-mail</b></label> <br>
					<label><b>Motorcyle Endorsement</b></label>
					<label><input type="radio" name="motorcycle_status" <?php echo (isset($info['motorcycle_status']) && $info['motorcycle_status']=='yes')?'checked="checked"':''; ?> value="yes"> Yes</label>
					<label><input type="radio" name="motorcycle_status" <?php echo (isset($info['motorcycle_status']) && $info['motorcycle_status']=='no')?'checked="checked"':''; ?> value="no"> No</label>
				</div>
				<div class="form-field" style="float: right; width: 32%;">
					<label style="display: block; margin-bottom: 7px;"><b>Best way to contact</b></label>
					<label><input type="radio" name="contact_status" <?php echo (isset($info['contact_status']) && $info['contact_status']=='mail')?'checked="checked"':''; ?> value="mail"> E-mail</label>
					<label><input type="radio" name="contact_status" <?php echo (isset($info['contact_status']) && $info['contact_status']=='text')?'checked="checked"':''; ?> value="text"> Text</label><br>
					<label><input type="radio" name="contact_status" <?php echo (isset($info['contact_status']) && $info['contact_status']=='phone')?'checked="checked"':''; ?> value="phone"> Phone</label>
					<label><input type="radio" name="contact_status" <?php echo (isset($info['contact_status']) && $info['contact_status']=='facebook')?'checked="checked"':''; ?> value="facebook"> Facebook</label>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 49%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 18px;"><b>CUSTOMER PREFERENCES</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>COMFORT</b></label>
					<textarea name="comfort" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['comfort'])?$info['comfort']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>FUNCTION</b></label>
					<textarea name="function" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['function'])?$info['function']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>STYLE</b></label>
					<textarea name="style" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['style'])?$info['style']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>PERFORMANCE</b></label>
					<textarea name="performance" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['performance'])?$info['performance']:'' ?></textarea>
				</div>
			</div>
			
			<div class="left" style="float: right; width: 49%;">
				<h2 style="float: left; width: 100%; margin: 3px 0; font-size: 18px;"><b>FORM</b></h2>
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>FAMILY</b></label>
					<textarea name="family" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['family'])?$info['family']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>OCCUPATION</b></label>
					<textarea name="occupation" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['occupation'])?$info['occupation']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>RECREATION</b></label>
					<textarea name="recreation" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['recreation'])?$info['recreation']:'' ?></textarea>
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label><b>MOTIVATION</b></label>
					<textarea name="motivation" style="float: left; width: 98%; height: 80px; border: 0px;"><?php echo isset($info['motivation'])?$info['motivation']:'' ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="font-size: 17px;"><b>PRODUCT IDEAS</b></label>
				<textarea name="product" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; height: 80px; padding: 3px;"><?php echo isset($info['product'])?$info['product']:'' ?></textarea>
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
