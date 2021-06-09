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
	input[type="text"]{border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px solid #000;}
	.check-label{width:35%;}		
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
	}
	</style>

	<div class="wraper header" style="float:left;"> 
           
		<h3 style="margin: 21px; text-align: center; font-weight: normal; font-size: 19px;">Service PDI Checklist</h3>
	
		<div class="content">
		
			<div>
				<div class="form-field" style="float: left; width: 22%;">
					<label>Date: </label>
					<input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width: 77%;">
				</div>
				<div class="form-field" style="float: right; width: 22%;">
					<label>RO #</label>
					<input type="text" name="ro_num" value="<?php echo isset($info['ro_num'])?$info['ro_num']:''; ?>" style="width: 77%;">
				</div>
			</div>
			<div>
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label>Vin Number:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label>Make:</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 85%;">
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label>Model:</label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 80%;">
				</div>
					
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label>Technician:</label>
					<input type="text" name="technician" value="<?php echo isset($info['technician'])?$info['technician']:''; ?>" style="width: 80%; margin: 0px 0 14px;">
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label>Recall / open RO #</label>
					<input type="text" name="recall_num" value="<?php echo isset($info['recall_num'])?$info['recall_num']:''; ?>" style="width: 75%; margin: 0px 0 14px;">
				</div>
			</div>
			
			
			<p style="float: left; width: 90%; font-size: 18px;">Check off and deliver all items below (with checklist) to the sales manager </p>
			
			<div>
				<div class="form-field" style="float: left; width:90%; margin: 7px 0;">
					<label class="check-label">Battery tender lead:</label>
					<input type="checkbox" name="battery_tender" value="yes" <?php echo (isset($info['battery_tender']) && $info['battery_tender'] == 'yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label">Owner’s manual:</label>
					<input type="checkbox" name="owner_manual" value="yes" <?php echo (isset($info['owner_manual']) && $info['owner_manual'] == 'yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label">Spare key/s:</label>
					<input type="checkbox" name="spare_keys" value="yes" <?php echo (isset($info['spare_keys']) && $info['spare_keys'] == 'yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width:90%; margin: 7px 0;">
					<label class="check-label">Tool kit:</label>
					<input type="checkbox" name="tool_kit" value="yes" <?php echo (isset($info['tool_kit']) && $info['tool_kit'] == 'yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label">PDI sheet completed:</label>
					<input type="checkbox" name="sheet" value="yes" <?php echo (isset($info['sheet']) && $info['sheet'] =='yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0 25px;">
					<label class="check-label">Additional parts:</label>
					<input type="checkbox" name="add_parts" value="yes" <?php echo (isset($info['add_parts']) && $info['add_parts'] =='yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label">Drill plate holes (Triumph):</label>
					<input type="checkbox" name="plate_hole" value="yes" <?php echo (isset($info['plate_hole']) && $info['plate_hole'] == 'yes')?'checked':''; ?> />
				</div>
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label" >GoAz plate frame:</label>
					<input type="checkbox" name="plate_frame" value="yes" <?php echo (isset($info['plate_frame']) && $info['plate_frame'] == 'yes')?'checked':''; ?> />
				</div>
				
				
				<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
					<label class="check-label" >GoAz key chain:</label>
					<input type="checkbox" name="key_chain" value="yes" <?php echo (isset($info['key_chain']) && $info['key_chain'] == 'yes')?'checked':''; ?> />
				</div>
			</div>
			
			<p style="float: left; width: 100%; font-size: 18px; margin: 46px 0 83px;">Keys, manual, PDI sheet, and tool kit in one bag / zip lock with stock number.</p>
			
			<div class="form-field" style="float: left; width: 90%; margin: 7px 0;">
				<label style="margin-bottom:10px;">Comments / notes:</label>
				<textarea name="comments" style="width:100%" rows="7" ><?php echo isset($info['comments'])?$info['comments']:''; ?></textarea>
			</div>
			
		
	</div>
            
            
	</div>
    
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
