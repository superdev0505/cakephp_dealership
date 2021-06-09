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
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 15px;}
	ul{padding: 0px; text-align: center; width: 70%; margin: 0 auto;}
	li{list-style: none; padding: 0 2%; margin-bottom: 7px; border-right: 1px solid #000; display: inline-block; font-size: 12px;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="logo" style="width: 250px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo11.jpg'); ?>" alt="" style="width: 100%;">
		</div>
		<div class="row" style="float: left; width: 100%; margin: 16px 0 0;">
			<ul>
				<li>1025 Harcourt Road Suite 400</li>
				<li>Mount Vernon, OH 43050</li>
				<li>(740) 392-3633</li>
				<li style="border: 0px;">Fax (740) 393-2539</li>
				<li>200 West Monroe Street</li>
				<li>Zanesville, OH 43701</li>
				<li>(740) 454-1289</li>
				<li style="border: 0px;">Fax (740) 454-6498</li> <br>
				<li>39737 Marietta Road</li>
				<li>Caldwell, OH 43724</li>
				<li>(740) 783-2450</li>
				<li style="border: 0px;">Fax (740) 783-4059</li>
			</ul>
		</div>
		
		<h2 style="float: left; width: 100%; font-size: 16px; margin: 10px 0 0; text-decoration: underline; text-align: center;"><b>BALERS</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 0					;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Category:</b></label>
				<input type="text" name="category" value="<?php echo isset($info['category']) ? $info['category'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Year:</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Manufacturer:</b></label>
				<input type="text" name="manufacturer" value="<?php echo isset($info['manufacturer']) ? $info['manufacturer'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Serial #:</b></label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Model:</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Stock #:</b></label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 50px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Hours:</b></label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Surface Wrap:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="surface_status" value="Yes" <?php echo ($info['surface_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="surface_status" value="No" <?php echo ($info['surface_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Number of Bales:</b></label>
				<input type="text" name="bales_num" value="<?php echo isset($info['bales_num']) ? $info['bales_num'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Monitor:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="monitor_status" value="Yes" <?php echo ($info['monitor_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="monitor_status" value="No" <?php echo ($info['monitor_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Bale Size (pounds):</b></label>
				<input type="text" name="bale_size" value="<?php echo isset($info['bale_size']) ? $info['bale_size'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>PTO:</b></label>
				<input type="text" name="pto" value="<?php echo isset($info['pto']) ? $info['pto'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Auto Tie:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="auto_status" value="Yes" <?php echo ($info['auto_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="auto_status" value="No" <?php echo ($info['auto_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Length (inches only):</b></label>
				<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Auto Wrap:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="wrap_status" value="Yes" <?php echo ($info['wrap_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="wrap_status" value="No" <?php echo ($info['wrap_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Width (inches only):</b></label>
				<input type="text" name="width" value="<?php echo isset($info['width']) ? $info['width'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Bale Kicker:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="bale_status" value="Yes" <?php echo ($info['bale_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="bale_status" value="No" <?php echo ($info['bale_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Height (inches only):</b></label>
				<input type="text" name="height" value="<?php echo isset($info['height']) ? $info['height'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Twine:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="twine_status" value="Yes" <?php echo ($info['twine_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="twine_status" value="No" <?php echo ($info['twine_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Weight (pounds only):</b></label>
				<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Retail Price:</b></label>
				<input type="text" name="retail_price" value="<?php echo isset($info['retail_price']) ? $info['retail_price'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Equipment Status:</b></label>
				<input type="text" name="equip_status" value="<?php echo isset($info['equip_status']) ? $info['equip_status'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Pictures Taken:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="picture_status" value="Yes" <?php echo ($info['picture_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="picture_status" value="No" <?php echo ($info['picture_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 16px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Description:</b></label>
				<textarea id="description" name="description" style="width: 80%; height: 100px; border: 0;"><?php echo isset($info['description'])?$info['description']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Notes:</b></label>
				<textarea id="note" name="note" style="width: 80%; height: 100px; border: 0;"><?php echo isset($info['note'])?$info['note']:'' ?></textarea>
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
