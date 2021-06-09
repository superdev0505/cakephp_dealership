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
			<div class="left" style="float: left; width: 68%;">
				<div class="row" style="float: left; width: 27%; margin: 3px 8px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">LITITZ LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">647 East 28th Div Hyw</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">Lititz, Pennsylvania 17543</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">(717)283-4522</p>
				</div>

				<div class="row" style="float: left; width: 24%; margin: 3px 8px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">MANHELM LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">3152 Lebanon Rd.</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">Manheim, PA 17545</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">(717)283-4522</p>
				</div>
				
				<div class="row" style="float: left; width: 32%; margin: 3px 8px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">WILLOW STREET LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">2718 Willow Street Pike</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">Willow Street, PA 17584</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">(717)283-4522</p>
				</div>
			</div>
			
			<div class="form-field" style="float: left; width: 32%; text-align: center;">
				<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 20px;"><b>RV Value Mart Inc.</b></h2>
				<h3 style="float: left; width: 100%; margin: 10px 0; font-size: 17px;"><b>RV Pickup Work Order/Parts Request/</b></h3>
				<h3 style="float: left; width: 100%; margin: 7px 0; font-size: 17px;"><b>Hitch Sheet</b></h3>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0 0; background-color: #ededed; border: 2px solid #ccc; padding: 10px 5px; box-sizing: border-box;">
			<div class="inner" style="float: left; width: 100%; margin-bottom: 10px;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>SALESPERSON #1</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 65%; background-color: #ededed;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>Date of Sale</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%; background-color: #ededed;">
				</div>
				<div class="form-field" style="float: left; width: 30%;">
					<label>Required Ready Date</label>
					<input type="text" name="required_date" value="<?php echo isset($info['required_date']) ? $info['required_date'] : ''; ?>" style="width: 47%; background-color: #ededed;">
				</div>
			</div>
			
			<div class="inner" style="float: left; width: 100%;">
				<div class="form-field" style="float: left; width: 40%;">
					<label>SALESPERSON #2</label>
					<input type="text" name="sperson2" value="<?php echo isset($info['sperson2']) ? $info['sperson2'] : ''; ?>" style="width: 65%; background-color: #ededed;">
				</div>
				<div class="form-field" style="float: left; width: 18%;">
					<label>Quote #</label>
					<input type="text" name="quote" value="<?php echo isset($info['quote']) ? $info['quote'] : ''; ?>" style="width: 65%; background-color: #ededed;">
				</div>
				<div class="form-field" style="float: left; width: 42%;">
					<label>Delivery/Pickup Date and Time</label>
					<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 47%; background-color: #ededed;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 60%; box-sizing: border-box; margin: 0;">
				<div class="upper" style="width: 100%; float: left; margin: 0; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Purchaser</label>
							<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 86%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Co-Purchaser</label>
							<input type="text" name="co_purchaser" value="<?php echo isset($info['co_purchaser']) ? $info['co_purchaser'] : ''; ?>" style="width: 82%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 30%;">
							<label>Zip Code</label>
							<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 61%;">
						</div>
						<div class="form-field" style="float: left; width: 45%;">
							<label>City</label>
							<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 83%;">
						</div>
						<div class="form-field" style="float: left; width: 25%;">
							<label>State</label>
							<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 66%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 50%;">
							<label>Home Phone #</label>
							<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 65%;">
						</div>
						<div class="form-field" style="float: left; width: 50%;">
							<label>Cell</label>
							<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0 7px;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Email Address</label>
							<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 81%;">
						</div>
					</div>
				</div>
				
				<div class="lower" style="float: left; width: 100%; box-sizing: border-box; padding: 5px; border: 1px solid #000; border-top: 0px;">
					<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>Required Work</b></h2>
					<label style="display: block; margin: 7px 0;">Full Pdi <input type="checkbox" name="full_paid" <?php echo ($info['full_paid'] == "full") ? "checked" : ""; ?> value="full"/></label>
					<label style="display: block; margin: 7px 0;">As/Is W/ Systems Check <input type="checkbox" name="system_check" <?php echo ($info['system_check'] == "system") ? "checked" : ""; ?> value="system"/></label>
					<label style="display: block; margin: 7px 0;">As/ IS <input type="checkbox" name="as_check" <?php echo ($info['as_check'] == "as") ? "checked" : ""; ?> value="as"/></label>
					<label style="display: block; margin: 7px 0;">As/Is W/ Wash and Clean only <input type="checkbox" name="wash_check" <?php echo ($info['wash_check'] == "wash") ? "checked" : ""; ?> value="wash"/></label>
					<label style="display: block; margin: 7px 0;">State inspecton <input type="checkbox" name="state_yes" <?php echo ($info['state_yes'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes / <input type="checkbox" name="state_no" <?php echo ($info['state_no'] == "no") ? "checked" : ""; ?> value="no"/> No
				</div>
				
				<div class="lower" style="float: left; width: 100%; box-sizing: border-box; padding: 5px;     border-right: solid 1px; height: 248px;">
					<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 16px;">Unit required repairs:</h2>
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label><b>Concern:</b></label>
							<input type="text" name="concern1" value="<?php echo isset($info['concern1']) ? $info['concern1'] : ''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: right; width: 80%; margin: 5px 0;">
							<label>Correction</label>
							<input type="text" name="correction1" value="<?php echo isset($info['correction1']) ? $info['correction1'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label><b>Concern:</b></label>
							<input type="text" name="concern2" value="<?php echo isset($info['concern2']) ? $info['concern2'] : ''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: right; width: 80%; margin: 5px 0;">
							<label>Correction</label>
							<input type="text" name="correction2" value="<?php echo isset($info['correction2']) ? $info['correction2'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label><b>Concern:</b></label>
							<input type="text" name="concern3" value="<?php echo isset($info['concern3']) ? $info['concern3'] : ''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: right; width: 80%; margin: 5px 0;">
							<label>Correction</label>
							<input type="text" name="correction3" value="<?php echo isset($info['correction3']) ? $info['correction3'] : ''; ?>" style="width: 83%;">
						</div>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- rightside start -->
			<div class="right" style="float: right; width: 40%; box-sizing: border-box; padding: 10px 5px; border: 1px solid #000; border-left: 0;">
				<div class="upper" style="float: left; width: 100%;">
					<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>Unit Purchased</b></h2>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label>Stock #</label>
							<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 35%; margin: 5px 0;">
							<label>Year</label>
							<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 69%;">
						</div>
						<div class="form-field" style="float: left; width: 65%; margin: 5px 0;">
							<label>Make</label>
							<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 81%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 65%; margin: 5px 0;">
							<label>Model</label>
							<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 79%;">
						</div>
						<div class="form-field" style="float: left; width: 35%; margin: 5px 0;">
							<label>MDL #</label>
							<input type="text" name="mdl" value="<?php echo isset($info['mdl'])?$info['mdl']:''; ?>" style="width: 56%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label>VIN #</label>
							<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label>Location</label>
							<input type="text" name="location" value="<?php echo isset($info['location'])?$info['location']:''; ?>" style="width: 81%;">
						</div>
					</div>
				</div>
				
				<div class="upper" style="float: left; width: 100%; border-top: 1px solid #000;">
					<h2 style="float: left; width: 100%; margin: 5px 0; font-size: 16px;"><b>Hitch and Tow Vehicle Info</b></h2>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Tow Vehicle</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 35%;">
							<label>Year</label>
							<input type="text" name="hitch_year" value="<?php echo isset($info['hitch_year'])?$info['hitch_year']:''; ?>" style="width: 69%;">
						</div>
						<div class="form-field" style="float: left; width: 65%;">
							<label>Make</label>
							<input type="text" name="hitch_make" value="<?php echo isset($info['hitch_make'])?$info['hitch_make']:''; ?>" style="width: 81%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label>Model</label>
							<input type="text" name="hitch_model" value="<?php echo isset($info['hitch_model'])?$info['hitch_model']:''; ?>" style="width: 85%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
							<label>Brake Controller Install?</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Yes <label style="margin: 0 0 0 7px;">Model:</label></label>
							<input type="text" name="brake_model" value="<?php echo isset($info['brake_model'])?$info['brake_model']:''; ?>" style="width: 76%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label style="margin: 0 7px 0 0;">No</label>
							<input type="checkbox" name="cust_check" <?php echo ($info['cust_check'] == "cust") ? "checked" : ""; ?> value="cust"/> Cust Has / 
							<input type="checkbox" name="use_check" <?php echo ($info['use_check'] == "use") ? "checked" : ""; ?> value="use"/> Will Not Use
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 5px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label style="margin: 0 7px 0 0;">Hitch</label>
							<input type="checkbox" name="hitch_yes" <?php echo ($info['hitch_yes'] == "yes") ? "checked" : ""; ?> value="yes"/> Yes /
							<input type="checkbox" name="hitch_no" <?php echo ($info['hitch_no'] == "no") ? "checked" : ""; ?> value="no"/> No /
							<input type="checkbox" name="hitch_swap" <?php echo ($info['hitch_swap'] == "swap") ? "checked" : ""; ?> value="swap"/> Swap /
							<input type="checkbox" name="hitch_cust" <?php echo ($info['hitch_cust'] == "cust") ? "checked" : ""; ?> value="cust"/> Install Cust.
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<input type="checkbox" name="hitch_ez" <?php echo ($info['hitch_ez'] == "ez") ? "checked" : ""; ?> value="ez"/> EZ Lift /
							<input type="checkbox" name="hitch_e2" <?php echo ($info['hitch_e2'] == "e2") ? "checked" : ""; ?> value="e2"/> E2 Hitch /
							<input type="checkbox" name="hitch_equalizer" <?php echo ($info['hitch_equalizer'] == "equalizer") ? "checked" : ""; ?> value="equalizer"/> Equalizer
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label>Notes:</label>
							<input type="text" name="note1" value="<?php echo isset($info['note1'])?$info['note1']:''; ?>" style="width: 85%;">
							<input type="text" name="note2" value="<?php echo isset($info['note2'])?$info['note2']:''; ?>" style="width: 95%; margin: 10px 0 0;";
						</div>
					</div>
				</div>
			</div>
			<!-- rightside end -->
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: -1px -1px; box-sizing: border-box; border: 1px solid #000; margin-bottom: 10px;">
			<div class="form-field" style="float: left; width: 45%; margin: 0;">
				<label>Part Descriptions</label>
				<input type="text" name="descrip1" value="<?php echo isset($info['descrip1'])?$info['descrip1']:''; ?>" style="width: 100%;">
				<input type="text" name="descrip2" value="<?php echo isset($info['descrip2'])?$info['descrip2']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip3" value="<?php echo isset($info['descrip3'])?$info['descrip3']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip4" value="<?php echo isset($info['descrip4'])?$info['descrip4']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip5" value="<?php echo isset($info['descrip5'])?$info['descrip5']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip6" value="<?php echo isset($info['descrip6'])?$info['descrip6']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip7" value="<?php echo isset($info['descrip7'])?$info['descrip7']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip8" value="<?php echo isset($info['descrip8'])?$info['descrip8']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="descrip9" value="<?php echo isset($info['descrip9'])?$info['descrip9']:''; ?>" style="width: 100%; margin-top: 5px; border: 0px;">
			</div>
			
			<div class="form-field" style="float: left; width: 14%; margin-left: 1%;">
				<label>Part Number</label>
				<input type="text" name="part_number1" value="<?php echo isset($info['part_number1'])?$info['part_number1']:''; ?>" style="width: 100%;">
				<input type="text" name="part_number2" value="<?php echo isset($info['part_number2'])?$info['part_number2']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number3" value="<?php echo isset($info['part_number3'])?$info['part_number3']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number4" value="<?php echo isset($info['part_number4'])?$info['part_number4']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number5" value="<?php echo isset($info['part_number5'])?$info['part_number5']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number6" value="<?php echo isset($info['part_number6'])?$info['part_number6']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number7" value="<?php echo isset($info['part_number7'])?$info['part_number7']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number8" value="<?php echo isset($info['part_number8'])?$info['part_number8']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="part_number9" value="<?php echo isset($info['part_number9'])?$info['part_number9']:''; ?>" style="width: 100%; margin-top: 5px; border: 0px;">
			</div>
			
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; border-left: 1px solid #000;">
				<label>Special Notes</label>
				<input type="text" name="special_note1" value="<?php echo isset($info['special_note1'])?$info['special_note1']:''; ?>" style="width: 100%;">
				<input type="text" name="special_note2" value="<?php echo isset($info['special_note2'])?$info['special_note2']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note3" value="<?php echo isset($info['special_note3'])?$info['special_note3']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note4" value="<?php echo isset($info['special_note4'])?$info['special_note4']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note5" value="<?php echo isset($info['special_note5'])?$info['special_note5']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note6" value="<?php echo isset($info['special_note6'])?$info['special_note6']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note7" value="<?php echo isset($info['special_note7'])?$info['special_note7']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note8" value="<?php echo isset($info['special_note8'])?$info['special_note8']:''; ?>" style="width: 100%; margin-top: 5px;">
				<input type="text" name="special_note9" value="<?php echo isset($info['special_note9'])?$info['special_note9']:''; ?>" style="width: 100%; margin-top: 5px; border: 0px;">
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
