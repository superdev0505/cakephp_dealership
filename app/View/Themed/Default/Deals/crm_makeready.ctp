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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal;}
	table input[type="text"]{border: 0px;} 
	td{ padding: 1px 4px; border-top: 1px solid #000;}
	td:first-child{border: 1px solid #000; border-bottom: 0px; text-align: center;}
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: let; width: 100%; margin: 3px 0;">
			<div class="customer-number" style="float: left; width: 17%;">
				<b style="display: block; text-align: center; border-bottom: 2px solid #000; font-size: 14px;">2342678</b>
				<span style="display: block; width: 100%; text-align: center; font-size: 14px;">CUSTOMER NUMBER</span>
			</div>
			<h2 style="float: left; margin: 0 0 0 25%;  font-size: 17px;"><b>MAKE READY</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0 10px;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%;">
			</div>
			
			<div class="form-field" style="float: right; width: 30%;">
				<label>SALESMAN:</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>CUSTOMER:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] :  $info['first_name']." ".$info['last_name']; ?>" style="width: 91%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>ADDRESS:</label>
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 82%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%;">
				<label>PH#:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 80%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%;">
				<label>WK#:</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 89%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 94%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 77%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 75%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 73%;">
			</div>
			
			<div class="form-field" style="float: left; width: 25%;">
				<label>STOCK</label>
				<input type="text" name="stock" value="<?php echo isset($info['stock'])?$info['stock']:''; ?>" style="width: 77%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>VIN#:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 95%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>DELIVERY DATE:</label>
				<input type="text" name="del_date" value="<?php echo isset($info['del_date'])?$info['del_date']:''; ?>" style="width: 70%;">
			</div>
			

			<div class="form-field" style="float: left; width: 20%;">
				<label>TIME:</label>
				<input type="text" name="time" value="<?php echo isset($info['time'])?$info['time']:''; ?>" style="width: 73%;">
			</div>
			
			<div class="form-field" style="float: left; width: 35%;">
				<label>HITCH DATE/TIME:</label>
				<input type="text" name="hitch_date" value="<?php echo isset($info['hitch_date'])?$info['hitch_date']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px  0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>TOW VEHICLE:</label>
				<input type="text" name="tow_vehicle" value="<?php echo isset($info['tow_vehicle'])?$info['tow_vehicle']:''; ?>" style="width: 76%;">
			</div>
			
			<div class="form-field" style="float: left; width: 50%;">
				<label>TRADE-IN:</label>
				<input type="text" name="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="pull-right" style="float: right; width: 90%; margin: 20px 0 0;">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="width: 7%;"><b>X</b></td>
					<td colspan="3" style="border: 0;">
						<label style="margin-left: 5%;">MAKE READY NEW</label>  
						<input type="text" name="make_new" value="<?php echo isset($info['make_new'])?$info['make_new']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="used_x" value="<?php echo isset($info['used_x'])?$info['used_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">MAKE READY USED</label>  
						<input type="text" name="make_used" value="<?php echo isset($info['make_used'])?$info['make_used']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="delivery_x" value="<?php echo isset($info['delivery_x'])?$info['delivery_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">SATURDAY DELIVERY</label>  
						<input type="text" name="name" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="bed_x" value="<?php echo isset($info['bed_x'])?$info['bed_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">$38 PLUG IN BED</label>  
						<input type="text" name="bed_plug" value="<?php echo isset($info['bed_plug'])?$info['bed_plug']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other1_x" value="<?php echo isset($info['other1_x'])?$info['other1_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">OTHER:</label>  
						<input type="text" name="other1" value="<?php echo isset($info['other1'])?$info['other1']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other2_x" value="<?php echo isset($info['other2_x'])?$info['other2_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">OTHER:</label>  
						<input type="text" name="other2" value="<?php echo isset($info['other2'])?$info['other2']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other3_x" value="<?php echo isset($info['other3_x'])?$info['other3_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">OTHER:</label>  
						<input type="text" name="other3" value="<?php echo isset($info['other3'])?$info['other3']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				
				<tr>
					<td style="border-bottom: 1px solid #000;"><b><input type="text" name="name" style="width: 100%;"></b></td>
					<td> 
						<label style="margin-left: 17%;">$30… LP FILL</label>  
						<input type="text" name="fill1" value="<?php echo isset($info['fill1'])?$info['fill1']:''; ?>" style="width: 30%;">
					</td>
					
					<td> 
						<label>$30… STARTER KIT</label>  
						<input type="text" name="kit1" value="<?php echo isset($info['kit1'])?$info['kit1']:''; ?>" style="width: 40%;">
					</td>
					
					<td> 
						<label>$50… NEW BATTERY</label>  
						<input type="text" name="battery1" value="<?php echo isset($info['battery1'])?$info['battery1']:''; ?>" style="width: 40%;">
					</td>
				</tr>
			</table>
			
			<div class="row" style="float: left; width: 100%; margin: 20px 0;">
				<p style="margin: 3px 3%; font-size: 12px;">$ <input type="text" name="replac_part" value="<?php echo isset($info['replac_part'])?$info['replac_part']:''; ?>" style="width: 10%;"> REPLACEMENT PARTS, COST PLUS 20%, PLUS LABOR</p>
				<p style="margin: 3px 3%; font-size: 12px;">$ <input type="text" name="tool_labor" value="<?php echo isset($info['tool_labor'])?$info['tool_labor']:''; ?>" style="width: 10%;"> TOOL LABOR = $55/HOUR, WELD LABOR = $60/HR</p>
			</div>
			
			
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td style="width: 7%;"><b>X</b></td>
					<td colspan="3" style="border: 0;">
						<label style="margin-left: 5%;">PRE-DELIVERY INSPECTION</label>  
						<input type="text" name="pre_delivery" value="<?php echo isset($info['pre_delivery'])?$info['pre_delivery']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b>X</b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">WALK-THROUGH</label>  
						<input type="text" name="walk_through" value="<?php echo isset($info['walk_through'])?$info['walk_through']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b>X</b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">BATTERY</label>  
						<input type="text" name="battery" value="<?php echo isset($info['battery'])?$info['battery']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b>X</b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">FILL PROPANE</label>  
						<input type="text" name="fill_propane" value="<?php echo isset($info['fill_propane'])?$info['fill_propane']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b>X</b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">INSTALL WD HITCH W/SWAY CONTROL</label>  
						<input type="text" name="sway_control" value="<?php echo isset($info['sway_control'])?$info['sway_control']:''; ?>" style="width: 50%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other4_x" value="<?php echo isset($info['other4_x'])?$info['other4_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other4" value="<?php echo isset($info['other4'])?$info['other4']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other5_x" value="<?php echo isset($info['other5_x'])?$info['other5_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other5" value="<?php echo isset($info['other5'])?$info['other5']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other6_x" value="<?php echo isset($info['other6_x'])?$info['other6_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other6" value="<?php echo isset($info['other6'])?$info['other6']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other7_x" value="<?php echo isset($info['other7_x'])?$info['other7_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other7" value="<?php echo isset($info['other7'])?$info['other7']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other8_x" value="<?php echo isset($info['other8_x'])?$info['other8_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other8" value="<?php echo isset($info['other8'])?$info['other8']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other9_x" value="<?php echo isset($info['other9_x'])?$info['other9_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other9" value="<?php echo isset($info['other9'])?$info['other9']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other10_x" value="<?php echo isset($info['other10_x'])?$info['other10_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other10" value="<?php echo isset($info['other10'])?$info['other10']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other11_x" value="<?php echo isset($info['other11_x'])?$info['other11_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other11" value="<?php echo isset($info['other11'])?$info['other11']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				<tr>
					<td><b><input type="text" name="other12_x" value="<?php echo isset($info['other12_x'])?$info['other12_x']:''; ?>" style="width: 100%;"></b></td>
					<td colspan="3"> 
						<label style="margin-left: 5%;">---</label>  
						<input type="text" name="other12" value="<?php echo isset($info['other12'])?$info['other12']:''; ?>" style="width: 70%;">
					</td>
				</tr>
				
				
				<tr>
					<td style="border-bottom: 1px solid #000;"><b><input type="text" name="price_x" value="<?php echo isset($info['price_x'])?$info['price_x']:''; ?>" style="width: 100%;"></b></td>
					<td> 
						<label style="margin-left: 17%;">$30… LP FILL</label>  
						<input type="text" name="fill2" value="<?php echo isset($info['fill2'])?$info['fill2']:''; ?>" style="width: 30%;">
					</td>
					
					<td> 
						<label>$30… STARTER KIT</label>  
						<input type="text" name="kit2" value="<?php echo isset($info['kit2'])?$info['kit2']:''; ?>" style="width: 40%;">
					</td>
					
					<td> 
						<label>$50… NEW BATTERY</label>  
						<input type="text" name="battery2" value="<?php echo isset($info['battery2'])?$info['battery2']:''; ?>" style="width: 40%;">
					</td>
				</tr>
			</table>
			
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<p style="margin: 5px 0; font-size: 12px;">$ <input type="text" name="customer_delivery" value="<?php echo isset($info['customer_delivery'])?$info['customer_delivery']:''; ?>" style="width: 10%;"> DELIVERY TO CUSTOMER = $75 LOCAL (LESS THAN 30 MILES) <br> <span style="margin-left: 11%; margin-top: 3px; display: inline-block;">$100 (30-50 MILES), $2.10/MILE (OVER 50 MILES)</span></p>
				<p style="margin: 5px 0; font-size: 12px;">$ <input type="text" name="lot_swap" value="<?php echo isset($info['lot_swap'])?$info['lot_swap']:''; ?>" style="width: 10%;"> LOT SWAP ($75)</p>
				<p style="margin: 5px 0; font-size: 12px;">$ <input type="text" name="total_internal" value="<?php echo isset($info['total_internal'])?$info['total_internal']:''; ?>" style="width: 20%;"> <b>TOTAL INTERNAL</b></p>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 14px;">=============================================</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 ;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>MADE READY BY:</label>
				<input type="text" name="made_by" value="<?php echo isset($info['made_by'])?$info['made_by']:''; ?>" style="width: 55%; float: right">
			</div>
			
			<div class="form-field" style="float: right; width: 30%;">
				<label>DATE FINISHED:</label>
				<input type="text" name="date_finish" value="<?php echo isset($info['date_finish'])?$info['date_finish']:''; ?>" style="width: 60%; float: right">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 ;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>VERIFIED BY:</label>
				<input type="text" name="verified_by" value="<?php echo isset($info['verified_by'])?$info['verified_by']:''; ?>" style="width: 66%; float: right">
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
