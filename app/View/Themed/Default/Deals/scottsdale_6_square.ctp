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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 90%; margin-right: 1%;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	/*td:first-child, th:first-child{border-left: 1px solid #000;}*/
	td:last-child, th:last-child{border-right: 0px;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}
	.right table{border: 0px;}
	.right table td{border: 0px; padding: 2px;}
	.right input[type="text"]{border-bottom: 1px solid #000;}
	.no-border input[type="text"]{border: 0px;}	
	.bg{background-color: #000; color: #fff; text-align: left; padding: 12px 16px; font-size: 18px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0 7px;">
			<div class="logo" style="float: left; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/goaz_images/logo2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="right" style="float: right; width: 78%;">
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Salesperson:</label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 84%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Deal #:</label>
						<input type="text" name="deal" value="<?php echo $dealer; ?>" style="width: 78%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Customer Name:</label>
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Date:</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 82%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Address:</label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 88.5%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Source:</label>
						<input type="text" name="source" value="<?php echo isset($info['source'])?$info['source']:''; ?>" style="width: 76%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%;">
						<label>City:</label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 87%;">
					</div>
					<div class="form-field" style="float: left; width: 15%;">
						<label>State:</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 60%;">
					</div>
					<div class="form-field" style="float: left; width: 15%;">
						<label>Zip:</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 73%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>FORM:</label>
						<label><input type="radio" name="form_check" value="yes" <?php echo (isset($info['form_check']) && $info['form_check']=='yes')?'checked="checked"':''; ?> /> Y </label>
						<label><input type="radio" name="form_check" value="no" <?php echo (isset($info['form_check']) && $info['form_check']=='no')?'checked="checked"':''; ?> /> N </label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 25%;">
						<label>Home:</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label>Cell:</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 20%;">
						<label>Work:</label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 72%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label>Turn Over:</label>
						<label><input type="radio" name="turn_check" value="yes" <?php echo (isset($info['turn_check']) && $info['turn_check']=='yes')?'checked="checked"':''; ?> /> Y </label>
						<label><input type="radio" name="turn_check" value="no" <?php echo (isset($info['turn_check']) && $info['turn_check']=='no')?'checked="checked"':''; ?> /> N </label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Email:</label>
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 64.2%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;">Trade Information</h2>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo ($info['year_trade'] != '0')? $info['year_trade'] : "Any Year" ; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 71%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Model:</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 63%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage:</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 61%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Color:</label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 66%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Payoff:</label>
						<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 66%;">
					</div>
				</div>
			</div>
			
			<div class="on-third" style="float: left; width: 32%; box-sizing: border-box; border: 1px solid #000; padding: 10px; margin: 0 1%;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;">&nbsp;</h2>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Year:</label>
						<input type="text" name="year" value="<?php echo ($info['year'] != '0')? $info['year'] : "Any Year" ; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Stock #:</label>
						<input type="text" name="stock_no" value="<?php echo isset($info['stock_no']) ? $info['stock_no'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make:</label>
						<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 67%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Model:</label>
						<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 66%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage:</label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 57%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Color:</label>
						<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 68.5%;">
					</div>
				</div>
			</div>
			
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 16px;">&nbsp;</h2>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Year:</label>
						<input type="text" name="year1" value="<?php echo isset($info['year1']) ? $info['year1'] : $info['year_addon1']; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Stock #:</label>
						<input type="text" name="stock_num1" value="<?php echo isset($info['stock_num1']) ? $info['stock_num1'] : $info['stock_num_addon1']; ?>"  style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Make:</label>
						<input type="text" name="make1" value="<?php echo isset($info['make1']) ? $info['make1'] : $info['make_addon2_trade']; ?>" style="width: 66%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Model:</label>
						<input type="text" name="model1" value="<?php echo isset($info['model1']) ? $info['model1'] : $info['model_id_addon1']; ?>" style="width: 65%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label>Mileage:</label>
						<input type="text" name="odometer1" value="<?php echo isset($info['odometer1']) ? $info['odometer1'] : $info['odometer_addon1']; ?>" style="width: 57%;">
					</div>
					<div class="form-field" style="float: left; width: 50%;">
						<label>Color:</label>
						<input type="text" name="color1" value="<?php echo isset($info['color1']) ? $info['color1'] : $info['unit_color_addon1']; ?>" style="width: 67%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: -1px 0px 8px 0px;">
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 45%; border-bottom: 1px solid #000;">
						<label>Tires</label>
						<input type="text" name="tires" value="<?php echo isset($info['tires'])?$info['tires']:''; ?>" style="width: 54%; border-bottom: 0px;"> /10
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 45%; border-bottom: 1px solid #000;">
						<label>Paint</label>
						<input type="text" name="paint" value="<?php echo isset($info['paint'])?$info['paint']:''; ?>" style="width: 53%; border-bottom: 0px;"> /10
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 45%; border-bottom: 1px solid #000;">
						<label>Engine</label>
						<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 45%; border-bottom: 0px;"> /10
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 45%; border-bottom: 1px solid #000;">
						<label>Lights</label>
						<input type="text" name="lights" value="<?php echo isset($info['lights'])?$info['lights']:''; ?>" style="width: 47%; border-bottom: 0px;"> /10
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 41%; border-bottom: 1px solid #000;">
						<label>Last Svc.</label>
						<input type="text" name="last_svc" value="<?php echo isset($info['last_svc'])?$info['last_svc']:''; ?>" style="width: 50%; border-bottom: 0px;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 41%; border-bottom: 1px solid #000;">
						<label>Acc?</label>
						<input type="text" name="acc" value="<?php echo isset($info['acc'])?$info['acc']:''; ?>" style="width: 50%; border-bottom: 0px;">
					</div>
					<div class="form-field" style="float: right; width: 50%;">
						<label>W/S Natl. Avg.</label>
						<input type="text" name="ws" value="<?php echo isset($info['ws'])?$info['ws']:''; ?>" style="width: 40%;">
					</div>
				</div>
			</div>
			
			<div class="on-third" style="float: left; width: 32%; box-sizing: border-box; border: 1px solid #000; padding: 10px; margin: 0 1%;">
				<textarea name="admin1" style="width: 96%; height: 166px; border: 0px;"><?php echo isset($info['admin1'])?$info['admin1']:'' ?></textarea>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<label>+ F/S, ADMIN, TAXES</label>
					</div>
				</div>
			</div>
			
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
				<textarea name="admin2" style="width: 96%; height: 166px; border: 0px;"><?php echo isset($info['admin2'])?$info['admin2']:'' ?></textarea>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: right; width: 100%;">
						<label>+ F/S, ADMIN, TAXES</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px;">
				<textarea name="admin3" style="width: 96%; height: 270px; border: 0px;"><?php echo isset($info['admin3'])?$info['admin3']:'' ?></textarea>
			</div>
			
			<div class="on-third" style="float: left; width: 32%; box-sizing: border-box; border: 1px solid #000; padding: 10px; margin: 0 1%;">
				<textarea name="admin4" style="width: 96%; height: 270px; border: 0px;"><?php echo isset($info['admin4'])?$info['admin4']:'' ?></textarea>
			</div>
			
			<div class="on-third" style="float: left; width: 33%; box-sizing: border-box; border: 1px solid #000; padding: 10px; margin-bottom: 10px;">
				<textarea name="admin5" style="width: 96%; height: 270px; border: 0px;"><?php echo isset($info['admin5'])?$info['admin5']:'' ?></textarea>
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
