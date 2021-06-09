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
	
@media print {
	.wraper.main input {padding: 3px !important;}
	.dontprint{display: none;}
	.bg1{background-color: #818181!important;}
	.bg2{background-color: #dadada!important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 48%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<h3 style="float: left; width: 100%; text-align: center; margin: 3px 0; font-size: 17px;"><b>PURCHASE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Make:</label>
						<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Selling Price:</label>
						<input type="text" name="sell_price" value="<?php echo isset($info['sell_price']) ? $info['sell_price'] : $info['unit_value'] ?>" style="width: 58%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Model:</label>
						<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>P&A: </label>
						<input type="text" name="pa" value="<?php echo isset($info['pa']) ? $info['pa'] : ''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Year:</label>
						<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Gen. Merch: </label>
						<input type="text" name="merch" value="<?php echo isset($info['merch'])?$info['merch']:''; ?>" style="width: 61%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Color:</label>
						<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 77%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Tax, Title & Lic: </label>
						<input type="text" name="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 52%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>VIN:</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Doc Fee: </label>
						<input type="text" name="doc_fee" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Stock No:</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 65%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Total: </label>
						<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 81%;">
					</div>
				</div>
			</div>
			
			
			<div class="right" style="float: right; width: 48%; margin: 0; border: 1px solid #000; box-sizing: border-box; padding: 10px;">
				<h3 style="float: left; width: 100%; text-align: center; margin: 3px 0; font-size: 17px;"><b>TRADE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Mileage: </label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 71%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Model:</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>ESP: </label>
						<label><input type="radio" name="esp_status" value="yes" <?php echo (isset($info['esp_status']) && $info['esp_status']=='yes')?'checked="checked"':''; ?> /> Yes </label>
						<label><input type="radio" name="esp_status" value="no" <?php echo (isset($info['esp_status']) && $info['esp_status']=='no')?'checked="checked"':''; ?> /> No </label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Condition: </label>
						<input type="text" name="condition_trade" value="<?php echo isset($info['condition_trade']) ? $info['condition_trade'] : ''; ?>" style="width: 66%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Color:</label>
						<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 88%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>VIN:</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 91%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Stock No:</label>
						<input type="text" name="stock_trade" value="<?php echo isset($info['stock_trade']) ? $info['stock_trade'] : ''; ?>" style="width: 69%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Allowance: </label>
						<input type="text" name="allowance_trade" value="<?php echo isset($info['allowance_trade']) ? $info['allowance_trade'] : ''; ?>" style="width: 65%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="left" style="float: left; width: 48%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
				<h3 style="float: left; width: 100%; text-align: center; margin: 3px 0; font-size: 17px;"><b>INSURANCE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Company:</label>
						<input type="text" name="ins_company" value="<?php echo isset($info['ins_company']) ? $info['ins_company'] : ''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Agent:</label>
						<input type="text" name="agent" value="<?php echo isset($info['agent']) ? $info['agent'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Phone: </label>
						<input type="text" name="ins_phone" value="<?php echo isset($info['ins_phone']) ? $info['ins_phone'] : ''; ?>" style="width: 73%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Address:</label>
						<input type="text" name="ins_address" value="<?php echo isset($info['ins_address']) ? $info['ins_address'] : ''; ?>" style="width: 85%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>City:</label>
						<input type="text" name="ins_city" value="<?php echo isset($info['ins_city']) ? $info['ins_city'] : ''; ?>" style="width: 81%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin: 0;">
						<label>State: </label>
						<input type="text" name="ins_state" value="<?php echo isset($info['ins_state']) ? $info['ins_state'] : ''; ?>" style="width: 69%;">
					</div>
					
					<div class="form-field" style="float: left; width: 20%; margin: 0;">
						<label>Zip: </label>
						<input type="text" name="ins_zip" value="<?php echo isset($info['ins_zip']) ? $info['ins_zip'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Policy No:</label>
						<input type="text" name="policy_no" value="<?php echo isset($info['policy_no']) ? $info['policy_no'] : ''; ?>" style="width: 83%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Col. Ded:</label>
						<input type="text" name="col_ded" value="<?php echo isset($info['col_ded']) ? $info['col_ded'] : ''; ?>" style="width: 70%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Comp. Ded: </label>
						<input type="text" name="comp_ded" value="<?php echo isset($info['comp_ded']) ? $info['comp_ded'] : ''; ?>" style="width: 63%;">
					</div>
				</div>
			</div>
			
			
			<div class="right" style="float: right; width: 48%; margin: 0; border: 1px solid #000; box-sizing: border-box; padding: 10px;">
				<h3 style="float: left; width: 100%; text-align: center; margin: 3px 0; font-size: 17px;"><b>PAY-OFF INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Balance:</label>
						<input type="text" name="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : ''; ?>" style="width: 84%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Owed To:</label>
						<input type="text" name="owed_to" value="<?php echo isset($info['owed_to']) ? $info['owed_to'] : ''; ?>" style="width: 69%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Phone: </label>
						<input type="text" name="pay_phone" value="<?php echo isset($info['pay_phone']) ? $info['pay_phone'] : ''; ?>" style="width: 73%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Address:</label>
						<input type="text" name="pay_address" value="<?php echo isset($info['pay_address']) ? $info['pay_address'] : ''; ?>" style="width: 83%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>City:</label>
						<input type="text" name="pay_city" value="<?php echo isset($info['pay_city']) ? $info['pay_city'] : ''; ?>" style="width: 81%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin: 0;">
						<label>State: </label>
						<input type="text" name="pay_state" value="<?php echo isset($info['pay_state']) ? $info['pay_state'] : ''; ?>" style="width: 69%;">
					</div>
					
					<div class="form-field" style="float: left; width: 20%; margin: 0;">
						<label>Zip: </label>
						<input type="text" name="pay_zip" value="<?php echo isset($info['pay_zip']) ? $info['pay_zip'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Account No:</label>
						<input type="text" name="account_no" value="<?php echo isset($info['account_no']) ? $info['account_no'] : ''; ?>" style="width: 81%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Spoke To:</label>
						<input type="text" name="spoke_to" value="<?php echo isset($info['spoke_to']) ? $info['spoke_to'] : ''; ?>" style="width: 66%;">
					</div>
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Good Until: </label>
						<input type="text" name="good_until" value="<?php echo isset($info['good_until']) ? $info['good_until'] : ''; ?>" style="width: 64%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="width: 24%; float: left;">
				<input type="text" name="method_pay" value="<?php echo isset($info['method_pay']) ? $info['method_pay'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label><b>Method of Payment</b></label>
			</div>
			<div class="form-field" style="width: 24%; float: left; margin: 0 1%;">
				<input type="text" name="down_pay" value="<?php echo isset($info['down_pay']) ? $info['down_pay'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label><b>Down Payment</b></label>
			</div>
			<div class="form-field" style="width: 24%; float: left;">
				<input type="text" name="monthly_pay" value="<?php echo isset($info['monthly_pay']) ? $info['monthly_pay'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label><b>Monthly Payment Range</b></label>
			</div>
			<div class="form-field" style="width: 24%; float: right;">
				<input type="text" name="good_faith" value="<?php echo isset($info['good_faith']) ? $info['good_faith'] : ''; ?>" style="float: left; width: 100%; border: 1px solid #000;">
				<label><b>Good Faith Depsoit</b></label>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 7px 0; font-size: 18px;"><b>CUSTOMER PATH</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px; margin: 5px 0;">
				<label><b>PARTS & ACCESSORIES</b></label>
				<textarea class="part_access" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['part_access'])?$info['part_access']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px; margin: 5px 0;">
				<label><b>SERVICE</b></label>
				<textarea class="service" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['service'])?$info['service']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px; margin: 5px 0;">
				<label><b>GENERAL MERCHANDISE</b></label>
				<textarea class="general_merch" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['general_merch'])?$info['general_merch']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px; margin: 5px 0;">
				<label><b>SALES</b></label>
				<textarea class="sales" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['sales'])?$info['sales']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px; margin: 5px 0;">
				<label><b>FINANCE & INSURANCE</b></label>
				<textarea class="finance" style="width: 98%; height: 80px; border: 0px;"><?php echo isset($info['finance'])?$info['finance']:'' ?></textarea>
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
