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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	table{border-right: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 4px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.grey tr th { background-color: red !important; }
input[type="text"]{margin-bottom: 10px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 30%;">
				<p style="margin: 40px 0 14px 0; font-size: 15px; line-height: 22px;"><b>CTC of Virginia <br> 740 S Military Hwy <br> Virginia Beach, VA 23464 <br> 757) 961-8364</b></p>
			</div>
			<div class="right" style="float: right; width: 50%;  margin: 14px 0 0;">
				<b style="float: right; font-size: 99px; text-align: right; display: block;">WE OWE</b>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 23%;">
				<label>STK. NO.</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 17%;">
				<label style="margin-right: 20px; display: inline: block;"> NEW <input type="checkbox" name="condition" <?php echo (isset($info['condition']) && $info['condition']=='new')?'checked="checked"':''; ?> value="new"></label>
				<label> USED <input type="checkbox" name="condition" <?php echo (isset($info['condition']) && $info['condition']=='used')?'checked="checked"':''; ?> value="used"> </label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 70%;">
				<label>PHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 76%;"> 
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>VIN #</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 81%; margin: 7px 190px; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>SALESMAN</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>DEL. DATE</label>
				<input type="text" name="del_date" value="<?php echo isset($info['del_date']) ? $info['del_date'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<table style="float: left; width: 100%; margin: 7px 0; text-align: center;" cellpadding="0" cellspacing="0">
			<tr>
				<th style="text-align: center;width: 6%;">QTY</th>
				<th style="text-align: center;width: 70%;">NAME OF ITEM</th>
				<th style="text-align: center;">PART</th>
				<th style="text-align: center;">LABOR</th>
			</tr>
			
			<tr>
				<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item1" value="<?php echo isset($info['item1']) ? $info['item1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part1" value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor1" value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item2" value="<?php echo isset($info['item2']) ? $info['item2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor2" value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			<tr>
				<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item3" value="<?php echo isset($info['item3']) ? $info['item3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part3" value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor3" value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			<tr>
				<td><input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item4" value="<?php echo isset($info['item4']) ? $info['item4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part4" value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor4" value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item5" value="<?php echo isset($info['item5']) ? $info['item5'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part5" value="<?php echo isset($info['part5']) ? $info['part5'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor5" value="<?php echo isset($info['labor5']) ? $info['labor5'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty6" value="<?php echo isset($info['qty6']) ? $info['qty6'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="item6" value="<?php echo isset($info['item6']) ? $info['item6'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="part6" value="<?php echo isset($info['part6']) ? $info['part6'] : ''; ?>" style="width: 100%; text-align: center;"></td>
				<td><input type="text" name="labor6" value="<?php echo isset($info['labor6']) ? $info['labor6'] : ''; ?>" style="width: 100%; text-align: center;"></td>
			</tr>
		</table>
		
		<p style="float: left; width: 100%; margin: 7px 0;">I hereby accept this WE-OWE with the understanding that it is valid for only (30) THIRTY DAYS FROM
DATE OF ISSUANCE, and that I must make an ADVANCE APPOINTMENT WITH THE SERVICE
DEPARTMENT before the above work can be performed.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 65%;">
				<b style="float: left; width: 100%;font-size: 20px; display: block;">(FOR APPOINTMENT CALL SERVICE DEPT.)</b>
				<div class="form-field" style="float: left; width: 100%;">
					<label>CUSTOMER</label>
					<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 33%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%; border-bottom: 1px solid #000; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin-top: 10px">
					<label>APROVED</label>
					<input type="text" name="aproved" value="<?php echo isset($info['aproved']) ? $info['aproved'] : ''; ?>" style="width: 76%; border-bottom: 1px solid #000; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="right" style="float: right; width: 50%;  margin: 14px 0 0;">
				<b style="float: right; font-size: 99px; text-align: right; display: block;">YOU OWE</b>
			</div>
		</div>
		
		<table class="grey" style="float: left; width: 100%; margin: 10px 0;" cellpadding="0" cellspacing="0">
				<tr>
					<th bgcolor="#999" style="width: 30%;">&nbsp;</th>
					<th style="width: 20%; text-align: center;">TO BE RECEIVED <br> BY DATE</th>
					<th bgcolor="#999" style="width: 30%;">&nbsp;</th>
					<th style="width: 20%; text-align: center;">TO BE RECEIVED <br> BY DATE</th>
				</tr>
				
				<tr>
					<td>1) Title to Trade In Vehicle</td>
					<td><input type="text" name="trade_vehicle" value="<?php echo isset($info['trade_vehicle']) ? $info['trade_vehicle'] : ''; ?>" style="width: 100%;"></td>
					<td>5) Other</td>
					<td><input type="text" name="other1" value="<?php echo isset($info['other1']) ? $info['other1'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>2) All Monies</td>
					<td><input type="text" name="monies" value="<?php echo isset($info['monies']) ? $info['monies'] : ''; ?>" style="width: 100%;"></td>
					<td>6) Other</td>
					<td><input type="text" name="other2" value="<?php echo isset($info['other2']) ? $info['other2'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>3) Valid Insurance Card</td>
					<td><input type="text" name="insu_card" value="<?php echo isset($info['insu_card']) ? $info['insu_card'] : ''; ?>" style="width: 100%;"></td>
					<td>7) Other</td>
					<td><input type="text" name="other3" value="<?php echo isset($info['other3']) ? $info['other3'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4) Other</td>
					<td><input type="text" name="other4" value="<?php echo isset($info['other4']) ? $info['other4'] : ''; ?>" style="width: 100%;"></td>
					<td>8) Other</td>
					<td><input type="text" name="other5" value="<?php echo isset($info['other5']) ? $info['other5'] : ''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
		
		
		<p style="float: left; width: 100%; margin: 7px 0;">I here by agree to provide the above listed item(s) to the dealer. I understand that the sales transaction is not
complete until I provide such items.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>X:</label>
				<input type="text" name="x" value="<?php echo isset($info['x']) ? $info['x'] : ''; ?>" style="width: 91%; border-bottom: 1px solid #000;">
			</div>
			
			<div class="form-field" style="float: left; width: 49%;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 87%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px  0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>APROVED BY:</label>
				<input type="text" name="approved_by" value="<?php echo isset($info['approved_by']) ? $info['approved_by'] : ''; ?>" style="width: 75%; border-bottom: 1px solid #000;">
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
