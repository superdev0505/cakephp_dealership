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
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	
@media print {
	.top-margin{margin-top: 70% !important;}
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
.left-bottom {margin: 30px 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; font-size: 20px; margin: 0;">DRP - Delivery Ready Prep Order</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 50%; margin: 0; border: 1px solid #000; box-sizing: border-box; padding: 6px;">
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 50%; float: left; margin: 0;">
						<label>Stock</label>
						<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 81%;">
					</div>
					<div class="form-field" style="width: 25%; margin: 0; float: left;">
						<label><input type="checkbox" name="condition_new" value="New" <?php echo ($info['condition'] == 'New') ? "checked" : ""; ?> /> New</label>/ 
						<label><input type="checkbox" name="condition_used" value="Used" <?php echo ($info['condition'] == "Used") ? "checked" : ""; ?> /> Used</label>
					</div>
					<div class="form-field" style="width: 25%; margin: 0; float: right;">
						<label>Year</label>
						<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 50%; float: left; margin: 0;">
						<label>Make</label>
						<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="width: 50%; margin: 0; float: right;">
						<label>Model</label>
						<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 80%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 40%; float: left; margin: 0;">
						<label>Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="width: 60%; margin: 0; float: right;">
						<label>VIN</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 0;">
						<label>Delivery Date & Time:</label>
						<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 60%;">/
						<label>AM/PM</label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; margin: 0; float: right;">
						<label>Unit Location:</label>
						<input type="text" name="unit_location" value="<?php echo isset($info['unit_location']) ? $info['unit_location'] : ''; ?>" style="width: 80%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 40%; margin: 0; float: left;">
						<label>Tow Vehicle YR:</label>
						<input type="text" name="vehicle_year" value="<?php echo isset($info['vehicle_year']) ? $info['vehicle_year'] : ''; ?>" style="width: 40%;">
					</div>
					<div class="form-field" style="width: 30%; margin: 0; float: left;">
						<label>Make:</label>
						<input type="text" name="vehicle_make" value="<?php echo isset($info['vehicle_make']) ? $info['vehicle_make'] : ''; ?>" style="width: 60%;">
					</div>
					<div class="form-field" style="width: 30%; margin: 0; float: right;">
						<label>Model:</label>
						<input type="text" name="vehicle_model" value="<?php echo isset($info['vehicle_model']) ? $info['vehicle_model'] : ''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; margin: 0; float: right;">
						<label>Special Instructions:</label>
						<input type="text" name="instruction" value="<?php echo isset($info['instruction']) ? $info['instruction'] : ''; ?>" style="width: 73%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 40%; margin: 0; float: left;">
						<label>Gift Certificate:</label>
						<input type="text" name="certificate" value="<?php echo isset($info['certificate']) ? $info['certificate'] : ''; ?>" style="width: 50%;">
					</div>
				
					<div class="form-field" style="width: 11%; float: left; margin: 3px 5px;">
						<label>None</label>
						<span style="float: right;"><input type="checkbox" name="value_none" <?php echo ($info['value_none'] == "none") ? "checked" : ""; ?> value="none"/></span>
					</div>
					<div class="form-field" style="width: 9%; float: left; margin: 3px 0;">
						<label>$50</label>
						<span style="float: right;"><input type="checkbox" name="value_1" <?php echo ($info['value_1'] == "$50") ? "checked" : ""; ?> value="$50"/></span>
					</div>
					<div class="form-field" style="width: 9%; float: left; margin: 3px 5px;">
						<label>$75</label>
						<span style="float: right;"><input type="checkbox" name="value_2" <?php echo ($info['value_2'] == "$75") ? "checked" : ""; ?> value="$75"/></span>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; margin: 0; float: right;">
						<label>Items Paid on Contract:</label>
						<input type="text" name="contract1" value="<?php echo isset($info['contract1']) ? $info['contract1'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="contract2" value="<?php echo isset($info['contract2']) ? $info['contract2'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="contract3" value="<?php echo isset($info['contract3']) ? $info['contract3'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="contract4" value="<?php echo isset($info['contract4']) ? $info['contract4'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; margin: 0; float: right;">
						<label>Items Charged to Customer:</label>
						<input type="text" name="customer1" value="<?php echo isset($info['customer1']) ? $info['customer1'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="customer2" value="<?php echo isset($info['customer2']) ? $info['customer2'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="customer3" value="<?php echo isset($info['customer3']) ? $info['customer3'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="customer4" value="<?php echo isset($info['customer4']) ? $info['customer4'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
					</div>
				</div>
				
				<div class="row left-bottom" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; margin: 0; float: right;">
						<label>Warrenty Items:</label>
						<input type="text" name="warrenty1" value="<?php echo isset($info['warrenty1']) ? $info['warrenty1'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="warrenty2" value="<?php echo isset($info['warrenty2']) ? $info['warrenty2'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="warrenty3" value="<?php echo isset($info['warrenty3']) ? $info['warrenty3'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0;">
						<input type="text" name="warrenty4" value="<?php echo isset($info['warrenty4']) ? $info['warrenty4'] : ''; ?>" style="float: left; width: 100%; margin: 1px 0 0;">
					</div>
				</div>
			</div>
			<!-- Left Side End -->
			
			<!-- Right Side Start -->
			<div class="right" style="float: right; width: 50%; border: 1px solid #000; box-sizing: border-box; padding: 6px; border-left: 0px;">
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 50%; float: left; margin: 0;">
						<label>First Name:</label>
						<input type="text" name="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" style="width: 60%;">

					</div>
					<div class="form-field" style="width: 50%; margin: 0; float: right;">
						<label>Last Name:</label>
						<input type="text" name="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" style="width: 67%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 0;">
						<label>Address: </label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 50%; float: left; margin: 0;">
						<label>City:</label>
						<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="width: 25%; margin: 0; float: right;">
						<label>State:</label>
						<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 60%;">
					</div>
					<div class="form-field" style="width: 25%; margin: 0; float: right;">
						<label>Zip:</label>
						<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 0;">
						<label>Home Phone: </label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 100%; float: left; margin: 0;">
						<label>Work Phone: </label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 83%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0;">
					<div class="form-field" style="width: 70%; float: left; margin: 0;">
						<label>Salesperson: </label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 75%;">
					</div>
					<div class="form-field" style="width: 30%; float: left; margin: 0;">
						<label>RO#: </label>
						<input type="text" name="ro_num" value="<?php echo isset($info['ro_num'])?$info['ro_num']:''; ?>" style="width: 70%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%;margin: 3px 0; border: 1px solid #000;">
					<div class="form-field" style="width: 100%; float: left; margin: 0; padding: 10px;">
						<label><i>DRP AUTHORIZATION: X</i></label>
						<input type="text" name="authorization" value="<?php echo isset($info['authorization'])?$info['authorization']:''; ?>" style="width: 63%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 6.5px 0;">
					<div class="left" style="float: left; width: 100%;">
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>MH A</label>
								<span style="float: right;"><input type="checkbox" name="mh_a" <?php echo ($info['mh_a'] == "mh_a") ? "checked" : ""; ?> value="mh_a"/></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>5th Wheel:</label>
								<span style="float: right;"><input type="checkbox" name="wheel" <?php echo ($info['wheel'] == "wheel") ? "checked" : ""; ?> value="wheel"/></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>MH B</label>
								<span style="float: right;"><input type="checkbox" name="mh_b" <?php echo ($info['mh_b'] == "mh_b") ? "checked" : ""; ?> value="mh_b"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Travel Trailer:</label>
								<span style="float: right;"><input type="checkbox" name="travel" <?php echo ($info['travel'] == "travel") ? "checked" : ""; ?> value="travel"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>MH C</label>
								<span style="float: right;"><input type="checkbox" name="mh_c" <?php echo ($info['mh_c'] == "mh_c") ? "checked" : ""; ?> value="mh_c"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Truck Camper:</label>
								<span style="float: right;"><input type="checkbox" name="camper" <?php echo ($info['camper'] == "camper") ? "checked" : ""; ?> value="camper"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0 10px; border-bottom: 1px solid #000; padding: 0 0 10px;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Tent:</label>
								<span style="float: right;"><input type="checkbox" name="tent" <?php echo ($info['tent'] == "tent") ? "checked" : ""; ?> value="tent"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Ice House:</label>
								<span style="float: right;"><input type="checkbox" name="house" <?php echo ($info['house'] == "house") ? "checked" : ""; ?> value="house"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Complete Prep:</label>
								<span style="float: right;"><input type="checkbox" name="prep" <?php echo ($info['prep'] == "prep") ? "checked" : ""; ?> value="prep"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Perma Plate:</label>
								<span style="float: right;"><input type="checkbox" name="plate" <?php echo ($info['plate'] == "plate") ? "checked" : ""; ?> value="plate"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Appliance Check:</label>
								<span style="float: right;"><input type="checkbox" name="appliance" <?php echo ($info['appliance'] == "appliance") ? "checked" : ""; ?> value="appliance"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Eco Pro:</label>
								<span style="float: right;"><input type="checkbox" name="eco" <?php echo ($info['eco'] == "eco") ? "checked" : ""; ?> value="eco"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Wholesale:</label>
								<span style="float: right;"><input type="checkbox" name="wholesale" <?php echo ($info['wholesale'] == "wholesale") ? "checked" : ""; ?> value="wholesale"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Winterize:</label>
								<span style="float: right;"><input type="checkbox" name="winterize" <?php echo ($info['winterize'] == "winterize") ? "checked" : ""; ?> value="winterize"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>K-Bid Auction:</label>
								<span style="float: right;"><input type="checkbox" name="auction" <?php echo ($info['auction'] == "auction") ? "checked" : ""; ?> value="auction"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Fill LP Tanks:</label>
								<span style="float: right;"><input type="checkbox" name="fill" <?php echo ($info['fill'] == "fill") ? "checked" : ""; ?> value="fill"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Wash Only:</label>
								<span style="float: right;"><input type="checkbox" name="wash" <?php echo ($info['wash'] == "wash") ? "checked" : ""; ?> value="wash"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Battery:</label>
								<span style="float: right;"><input type="checkbox" name="battery" <?php echo ($info['battery'] == "battery") ? "checked" : ""; ?> value="battery"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 3px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Gen Service:</label>
								<span style="float: right;"><input type="checkbox" name="service" <?php echo ($info['service'] == "service") ? "checked" : ""; ?> value="service"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Outdoor Storage:</label>
								<span style="float: right;"><input type="checkbox" name="storage" <?php echo ($info['storage'] == "storage") ? "checked" : ""; ?> value="storage"></span>
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 5px 0;">
							<div class="form-field" style="float: left; width: 50%; margin: 3px 0;">
								<label>Oil Change:</label>
								<span style="float: right;"><input type="checkbox" name="oil" <?php echo ($info['oil'] == "oil") ? "checked" : ""; ?> value="oil"></span>
							</div>
							<div class="form-field" style="float: right; width: 47%; margin: 3px 0;">
								<label>Indoor Storage:</label>
								<span style="float: right;"><input type="checkbox" name="indoor" <?php echo ($info['indoor'] == "indoor") ? "checked" : ""; ?> value="indoor"></span>
							</div>
						</div>
						
						
						
					</div>
				</div>
				
				
				
				
			</div>
			<!-- Right Side End -->
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
