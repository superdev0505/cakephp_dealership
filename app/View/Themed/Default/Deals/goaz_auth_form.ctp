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
	<div id="worksheet_container" style="width:960px; margin:0 auto;">
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
		
		<div class="content" style="float: left;width: 100%;">
			<h1 style="font-size: 20px; margin-top: 10px; text-align: center; width: 520px;">Parts To Major Unit Authorization</h1>
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0 ;">
				<label>STOCK NUMBER:</label>
				<input type="text" name="stock_number" value="<?php echo isset($info['stock_number'])?$info['stock_number']:'';  ?>" style="width: 22%;">
			</div>
			
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0 ;">
				<label style="margin: 0 25px 0 0;">LABOR: </label>
				<input type="radio" name="labour" value="yes" <?php echo (isset($info['labour']) && $info['labour']== 'yes')?'checked':''; ?> style="margin: 0 0 0 25px;"> Y <input type="radio" name="labour" value="yes" <?php echo (isset($info['labour']) && $info['labour']== 'yes')?'checked':''; ?> style="margin: 0 0 0 25px;"> N
			</div>
			
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0 ;">
				<label>RO NUMBER: </label>
				<input type="text" name="ro_number" value="<?php echo isset($info['ro_number'])?$info['ro_number']:''; ?>" style="margin: 0 0 0 30px; width: 22%;">
			</div>
			
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0 ;">
				<label>CHARGE TO: </label>
				<span style="display: inline-block;margin: 0 0 30px; position: relative; top: 32px; width: 60%;"><input type="checkbox" name="cust_addition" value="yes" <?php echo (isset($info['cust_addition']) && $info['cust_addition']=='yes')?'checked':''; ?> /> CUSTOMER ADDITION <label style="margin: 0 0 0 7%;">(PARTS AND LABOUR)</label></span>
			</div>
			
			<div class="form-field" style=" float: left; margin: 17px 0; text-align: center; width: 48%">
				<p style="margin: 0;">Charge out all parts and labor under customer addition. </p>
				<p style="margin: 0;">Service -Create a new RO for added parts that need labor.  </p>
				<p style="margin: 0;">(Do not attach to build or PDI RO.)</p>
			</div>
			<div style="clear: both;"></div>
			
			<div class="form-field" style="width: 50%; float: left; width: 100%; margin: 10px 0 ;">
				<label>Notes : </label>
				<textarea name="comments" style="width:100%;" rows="5" ><?php echo isset($info['comments'])?$info['comments']:''; ?></textarea>
			</div>
			
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0 ;">
				<label>Sale Person: </label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 20%;">
			</div>
			
			<div class="form-field" style="width: 100%; float: left; width: 100%; margin: 10px 0; p">
				<label>Manager: </label>
				<input type="text" name="manager"  value="<?php echo isset($info['manager'])?$info['manager']:''; ?>" style="width: 20%; margin: 0 0 0 2%;">
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
