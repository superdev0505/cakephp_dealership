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

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	input[type="text"]{padding: 0px !important;}
	table{border-top: 1px solid #000; border-left: 1px solid #000;}
	table th, table td{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 4px;}
	table input[type="text"]{text-align: center;}
	table th{text-align: center;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
#worksheet_container {margin-top: 50px !important;}
.content {margin-top: 50px !important;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h1 class="head-title" style="float: left; margin-left:530px;font-weight: 600;
 width: 100%; font-size: 90px;">WE OWE</h1>
		<div class="row content" style="float: left; width: 100%;margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>CUSTOMER NAME</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>STK NO.</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>NEW</label>
				<input type="text" name="new" value="<?php echo isset($info['new']) ? $info['new'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>USED</label>
				<input type="text" name="used" value="<?php echo isset($info['used']) ? $info['used'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%;margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 60%;">
			</div>
			
			
			
			
			
			<div class="form-field" style="float: left; width: 20%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>PHONE</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>SERIAL NO.</label>
				<input type="text" name="serial_number" value="<?php echo isset($info['serial_number']) ? $info['serial_number'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>SALESMAN</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>DEL. DATE</label>
				<input type="text" name="del_date" value="<?php echo isset($info['del_date']) ? $info['del_date'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		
		<table style="float: left; width: 100%; margin: 10px 0 0;" cellpadding="0" cellspacing="0">
			<tr>
				<th style="width: 8%;">QTY</th>
				<th style="width: 56%;">NAME OF ITEM</th>
				<th style="width: 18%;">PART</th>
				<th style="width: 18%;">LABOR</th>
			</tr>
			
			<tr>
				<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="item1" value="<?php echo isset($info['item1']) ? $info['item1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="part1" value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="labor1" value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="item2" value="<?php echo isset($info['item2']) ? $info['item2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="labor2" value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="item3" value="<?php echo isset($info['item3']) ? $info['item3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="part3" value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="labor3" value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="item4" value="<?php echo isset($info['item4']) ? $info['item4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="part4" value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="labor4" value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 10px 0 0 5px; margin: 0;">
			<div class="left" style="float: left; width: 68%;">
				<b style="display: block; font-size: 16px; margin: 0;">(FOR APPOINTMENT CALL SERVICE DEPT.)</b>
				<p style="margin: 0;">I hereby accept this WE OWE with the understanding that it is valid for only (30) THIRTY DAYS FROM DATE OF ISSUANCE, and that if any service is listed above, I must make an ADVANCE APPOINTMENT WITH THE SERVICE DEPARTMENT before the above work can be performed.</p>
			</div>
			<div class="right" style="float: right; width: 30%; margin: 10px 0; border: 1px solid #000; border-right: 0px;">
				<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; margin: 10px 0; padding: 0 4px; box-sizing: border-box;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 0 4px; box-sizing: border-box;">
					<label>APPROVED</label>
					<input type="text" name="approved" value="<?php echo isset($info['approved']) ? $info['approved'] : ''; ?>" style="width: 70%;">
				</div>
				<span style="float: left; width: 100%; font-size: 10px; text-align: center;">MGR.</span>
			</div>
			
			<div class="full-width" style="float: left; width: 100%;">
				<b style="display: block; font-size: 16px;">THE ABOVE LISTED ITEMS CONSTITUTE ALL THAT HAS BEEN PROMISED OR IMPLIED BY THE DEALER.</b>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box;">
					<label>CUSTOMER SIGNATURE(S):</label>
					<input type="text" name="custom1_sign" value="<?php echo isset($info['custom1_sign']) ? $info['custom1_sign'] : ''; ?>" style="width: 60%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; padding: 10px 0 0 5px; margin: 10px 0  0;">
			<div class="full-width" style="float: left; width: 100%;">
				<b style="display: block; font-size: 16px;">NOTHING IS OWNED, NOTHING IS PROMISED AND NOTHING IS IMPLIED BY THE DEALER.</b>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box;">
					<label>CUSTOMER SIGNATURE(S):</label>
					<input type="text" name="custom2_sign" value="<?php echo isset($info['custom2_sign']) ? $info['custom2_sign'] : ''; ?>" style="width: 60%;">
				</div>
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
