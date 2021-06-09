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
	<div id="worksheet_container"  style="width: 1000px; margin: 0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			
			label{font-size: 14px; font-weight: normal; color: #000; margin: 0px;}
	 input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 30px;}
	 td{border-top: 1px solid #000; border-left: 1px solid #000; padding: 4px;}
	 td:last-child{border-right: 1px solid #000;}
	 .wraper.main input{padding: 0; margin: 0;}
			
	@media print { 
		.noprint{display:none;}
		input[type="text"]{height:26px;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div >
		<div class="content" style="float: left;width: 100%; margin: 10px 0 0;">
			<h2 style="float: left; width: 100%; text-align: center; font-size: 20px; font-weight: 700; margin: 0 0 9px 0;">Motorcycle Appraisal & Inspection Form</h2>
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>Owner Name:</label>
					<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>Co-owner Name:</label>
					<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name'])?$info['co_buyer_name']:''; ?>" style="width: 72%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Address:</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 92%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 34%;">
					<label>City:</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: left; width: 15%;">
					<label>State:</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 62%;">
				</div>
				<div class="form-field" style="float: left; width: 18%;">
					<label>Zip:</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 76%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>County:</label>
					<input type="text" name="county" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 77%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 34%;">
					<label>Cell Phone:</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Home Phone:</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 64%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Work Phone:</label>
					<input type="text" name="work_phone" value="<?php echo isset($info['work_phone'])?$info['work_phone']:''; ?>" style="width: 67%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 34%;">
					<label>Year:</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>"  style="width: 84%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Make:</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Model:</label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 81%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0;">
				<div class="form-field" style="float: left; width: 34%;">
					<label>VIN#:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 82%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Color:</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Sales Person:</label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 67%;">
				</div>
			</div>
			
			
			<h2 style="float: left; width: 100%; font-size: 18px; color: #000; margin: 11px 0 2px 0; font-weight: 700;">Customer Questions</h2>
			<div class="row" style="float: left; width: 100%;">
				<div class="one-half" style="float: left; width: 48%;">
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">1</span> When did you  purchase this bike?</label>
						<input type="text" name="ques_1" value="<?php echo isset($info['ques_1'])?$info['ques_1']:''; ?>" style="float: right; width: 36%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">2</span> Are you the original owner of the bike?</label>
						<input type="text" name="ques_2" value="<?php echo isset($info['ques_2'])?$info['ques_2']:''; ?>" style="float: right; width: 30%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">3</span>Where did you purchase this bike?</label>
						<input type="text" name="ques_3" value="<?php echo isset($info['ques_3'])?$info['ques_3']:''; ?>" style=" float: right; width: 38%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">4</span>In what state is the bike titled</label>
						<input type="text" name="ques_4" value="<?php echo isset($info['ques_4'])?$info['ques_4']:''; ?>" style="float: right; width: 45%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">5</span>What name(s) are listed on the title?</label>
						<input type="text" name="ques_5" value="<?php echo isset($info['ques_5'])?$info['ques_5']:''; ?>" style="float: right; width: 34%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						
						<input type="text" name="ques_6" value="<?php echo isset($info['ques_6'])?$info['ques_6']:''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="one-half" style="float: right; width: 48%;">
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">6</span> Does this bike have a transferable service contract?</label>
						<span style="float: right"><input type="radio" name="ques_7" value="yes" <?php echo (isset($info['ques_7']) && $info['ques_7'] == 'yes')?'checked':''; ?>  />Yes <input type="radio" name="ques_7" value="no" <?php echo (isset($info['ques_7']) && $info['ques_7'] == 'no')?'checked':''; ?>  /> NO</span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">7</span> Do you have a second set of keys/fobs and owners manual?</label>
						<span style="float: right"><input type="radio" name="ques_8" value="yes" <?php echo (isset($info['ques_8']) && $info['ques_8'] == 'yes')?'checked':''; ?>  />Yes <input type="radio" name="ques_8" value="no" <?php echo (isset($info['ques_8']) && $info['ques_8'] == 'no')?'checked':''; ?>  /> NO</span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">8</span>Has this bike ever been in an accident?</label>
						<span style="float: right"><input type="radio" name="ques_9" value="yes" <?php echo (isset($info['ques_9']) && $info['ques_9'] == 'yes')?'checked':''; ?>  />Yes <input type="radio" name="ques_9" value="no" <?php echo (isset($info['ques_9']) && $info['ques_9'] == 'no')?'checked':''; ?>  /> NO</span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">9</span>Has this bike ever been titled as a salvage, junk, or rebuilt?</label>
						<span style="float: right"><input type="radio" name="ques_10" value="yes" <?php echo (isset($info['ques_10']) && $info['ques_10'] == 'yes')?'checked':''; ?>  />Yes <input type="radio" name="ques_10" value="no" <?php echo (isset($info['ques_10']) && $info['ques_10'] == 'no')?'checked':''; ?>  /> NO</span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">10</span>Has the odometer ever  been repired or replaced?</label>
						<span style="float: right"><input type="radio" name="ques_11" value="yes" <?php echo (isset($info['ques_11']) && $info['ques_11'] == 'yes')?'checked':''; ?>  />Yes <input type="radio" name="ques_11" value="no" <?php echo (isset($info['ques_11']) && $info['ques_11'] == 'no')?'checked':''; ?>  /> NO</span>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px;"><span style="font-size: 19px; margin: 0 2px 0 0;">11</span>Odometer reading:</label>
						<input type="text" name="sale-person" style=" width: 36%;">
						<span style="float: right"><input type="radio" name="ques_12" value="yes" <?php echo (isset($info['ques_12']) && $info['ques_12'] == 'yes')?'checked':''; ?>  />Actual <input type="radio" name="ques_12" value="no" <?php echo (isset($info['ques_12']) && $info['ques_12'] == 'no')?'checked':''; ?>  /> Not Actual</span>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label style="font-weight: bold; font-size: 16px;">Signature:</label>
					<input type="text" name="sale-person" style="width: 83%;">
				</div>
				<div class="form-field" style="float: right; width: 29%;">
					<label style="font-weight: bold; font-size: 16px;">Date:</label>
					<input type="text" name="sale-person" style="width: 78%;">
				</div>
			</div>
			
			<h2 style="text-align: center; font-weight: normal; font-size: 16px; margin: 10px 0 3px; float: left; width: 100%;"><input type="text" style="width: 6%;"> I agree to allow Timms Harley-Davidson to evalute my trade-in including a test ride if needed</h2>
			
			<table style="float: left; width: 100%; border-bottom: 1px solid #000; margin-bottom: 14px;">
				<tr>	
					<td colspan="2" style="text-align: center;">Item</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;">Amount</td>
					<td colspan="2" style="text-align: center;">Item</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;">Amount</td>
					<td colspan="2" style="text-align: center;">Item</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;">Amount</td>
				</tr>
				
				<tr>
					<td>1</td>
					<td>Bars / Bushing</td>
					<td><input type="text" name="item_qty_1" value="<?php echo isset($info['item_qty_1'])?$info['item_qty_1']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_1" value="<?php echo isset($info['item_amount_1'])?$info['item_amount_1']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>12</td>
                    <td>Windshield</td>
					<td><input type="text" name="item_qty_12" value="<?php echo isset($info['item_qty_12'])?$info['item_qty_12']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_12" value="<?php echo isset($info['item_amount_12'])?$info['item_amount_12']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>23</td>
					<td>Engine Noise</td>
					<td><input type="text" name="item_qty_23" value="<?php echo isset($info['item_qty_23'])?$info['item_qty_23']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_23" value="<?php echo isset($info['item_amount_23'])?$info['item_amount_23']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Grips</td>
					<td><input type="text" name="item_qty_2" value="<?php echo isset($info['item_qty_2'])?$info['item_qty_2']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_2" value="<?php echo isset($info['item_amount_2'])?$info['item_amount_2']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>13</td>
					<td>Painted Parts</td>
					<td><input type="text" name="item_qty_13" value="<?php echo isset($info['item_qty_13'])?$info['item_qty_13']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_13" value="<?php echo isset($info['item_amount_13'])?$info['item_amount_13']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>24</td>
					<td>Oil Leaks</td>
					<td><input type="text" name="item_qty_24" value="<?php echo isset($info['item_qty_24'])?$info['item_qty_24']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_24" value="<?php echo isset($info['item_amount_24'])?$info['item_amount_24']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Forks</td>
					<td><input type="text" name="item_qty_3" value="<?php echo isset($info['item_qty_3'])?$info['item_qty_3']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_3" value="<?php echo isset($info['item_amount_3'])?$info['item_amount_3']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>14</td>
					<td>Physical Damage</td>
					<td><input type="text" name="item_qty_14" value="<?php echo isset($info['item_qty_14'])?$info['item_qty_14']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_14" value="<?php echo isset($info['item_amount_14'])?$info['item_amount_14']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>25</td>
					<td>Clutch</td>
					<td><input type="text" name="item_qty_25" value="<?php echo isset($info['item_qty_25'])?$info['item_qty_25']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_25" value="<?php echo isset($info['item_amount_25'])?$info['item_amount_25']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Lights</td>
					<td><input type="text" name="item_qty_4" value="<?php echo isset($info['item_qty_4'])?$info['item_qty_4']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_4" value="<?php echo isset($info['item_amount_4'])?$info['item_amount_4']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>15</td>
					<td>Mirrors</td>
					<td><input type="text" name="item_qty_15" value="<?php echo isset($info['item_qty_15'])?$info['item_qty_15']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_15" value="<?php echo isset($info['item_amount_15'])?$info['item_amount_15']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>26</td>
					<td>Levers</td>
					<td><input type="text" name="item_qty_26" value="<?php echo isset($info['item_qty_26'])?$info['item_qty_26']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_26" value="<?php echo isset($info['item_amount_26'])?$info['item_amount_26']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Horn</td>
					<td><input type="text" name="item_qty_5" value="<?php echo isset($info['item_qty_5'])?$info['item_qty_5']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_5" value="<?php echo isset($info['item_amount_5'])?$info['item_amount_5']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>16</td>
					<td>Turn SIgnal Lens</td>
					<td><input type="text" name="item_qty_16" value="<?php echo isset($info['item_qty_16'])?$info['item_qty_16']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_16" value="<?php echo isset($info['item_amount_16'])?$info['item_amount_16']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>27</td>
					<td>Cables</td>
					<td><input type="text" name="item_qty_27" value="<?php echo isset($info['item_qty_27'])?$info['item_qty_27']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_27" value="<?php echo isset($info['item_amount_27'])?$info['item_amount_27']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>6</td>
					<td>Cruise</td>
					<td><input type="text" name="item_qty_6" value="<?php echo isset($info['item_qty_6'])?$info['item_qty_6']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_6" value="<?php echo isset($info['item_amount_6'])?$info['item_amount_6']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>17</td>
					<td>Engine Guards</td>
					<td><input type="text" name="item_qty_17" value="<?php echo isset($info['item_qty_17'])?$info['item_qty_17']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_17" value="<?php echo isset($info['item_amount_17'])?$info['item_amount_17']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>28</td>
					<td>Air Filter</td>
					<td><input type="text" name="item_qty_28" value="<?php echo isset($info['item_qty_28'])?$info['item_qty_28']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_28" value="<?php echo isset($info['item_amount_28'])?$info['item_amount_28']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>7</td>
					<td>Switch Housings</td>
					<td><input type="text" name="item_qty_7" value="<?php echo isset($info['item_qty_7'])?$info['item_qty_7']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_7" value="<?php echo isset($info['item_amount_7'])?$info['item_amount_7']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>18</td>
					<td>Seat</td>
					<td><input type="text" name="item_qty_18" value="<?php echo isset($info['item_qty_18'])?$info['item_qty_18']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_18" value="<?php echo isset($info['item_amount_18'])?$info['item_amount_18']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>29</td>
					<td>Pipes</td>
					<td><input type="text" name="item_qty_29" value="<?php echo isset($info['item_qty_29'])?$info['item_qty_29']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_29" value="<?php echo isset($info['item_amount_29'])?$info['item_amount_29']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>8</td>
					<td>Gauges</td>
					<td><input type="text" name="item_qty_1" value="<?php echo isset($info['item_qty_8'])?$info['item_qty_8']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_8" value="<?php echo isset($info['item_amount_8'])?$info['item_amount_8']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>19</td>
					<td>Saddle Bags</td>
					<td><input type="text" name="item_qty_19" value="<?php echo isset($info['item_qty_19'])?$info['item_qty_1']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_19" value="<?php echo isset($info['item_amount_19'])?$info['item_amount_19']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>30</td>
					<td>Fuel Management</td>
					<td><input type="text" name="item_qty_30" value="<?php echo isset($info['item_qty_30'])?$info['item_qty_30']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_30" value="<?php echo isset($info['item_amount_30'])?$info['item_amount_30']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>9</td>
					<td>Buttons</td>
					<td><input type="text" name="item_qty_9" value="<?php echo isset($info['item_qty_9'])?$info['item_qty_9']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_9" value="<?php echo isset($info['item_amount_9'])?$info['item_amount_9']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>20</td>
					<td>Sissy Bar</td>
					<td><input type="text" name="item_qty_20" value="<?php echo isset($info['item_qty_20'])?$info['item_qty_20']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_20" value="<?php echo isset($info['item_amount_20'])?$info['item_amount_20']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>31</td>
					<td>Heel/Toe Shifter</td>
					<td><input type="text" name="item_qty_31" value="<?php echo isset($info['item_qty_31'])?$info['item_qty_31']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_31" value="<?php echo isset($info['item_amount_31'])?$info['item_amount_31']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>10</td>
					<td>Sound System</td>
					<td><input type="text" name="item_qty_10" value="<?php echo isset($info['item_qty_10'])?$info['item_qty_10']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_10" value="<?php echo isset($info['item_amount_10'])?$info['item_amount_10']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>21</td>
					<td>Lowers</td>
					<td><input type="text" name="item_qty_1" value="<?php echo isset($info['item_qty_21'])?$info['item_qty_21']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_21" value="<?php echo isset($info['item_amount_21'])?$info['item_amount_21']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>32</td>
					<td>Master Cyl. Cover</td>
					<td><input type="text" name="item_qty_32" value="<?php echo isset($info['item_qty_32'])?$info['item_qty_32']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_32" value="<?php echo isset($info['item_amount_32'])?$info['item_amount_32']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
				<tr>
					<td>11</td>
					<td>Motor Mounts</td>
					<td><input type="text" name="item_qty_11" value="<?php echo isset($info['item_qty_11'])?$info['item_qty_11']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_11" value="<?php echo isset($info['item_amount_11'])?$info['item_amount_11']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>22</td>
					<td>Floor Boards/Pegs</td>
					<td><input type="text" name="item_qty_22" value="<?php echo isset($info['item_qty_22'])?$info['item_qty_22']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_22" value="<?php echo isset($info['item_amount_22'])?$info['item_amount_22']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
					<td>33</td>
					<td>Breaks</td>
					<td><input type="text" name="item_qty_33" value="<?php echo isset($info['item_qty_33'])?$info['item_qty_33']:''; ?>" style="width: 25px; border: 0px; text-align: center;"></td>
					<td><input type="text" name="item_amount_33" value="<?php echo isset($info['item_amount_33'])?$info['item_amount_33']:''; ?>" style="width: 110px; border: 0px; text-align: center;"></td>
				</tr>
			</table>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="one-fourth" style="width: 24%; float: left;">
					<div class="form-field" style="float: left; width: 100%;">
						<span>34</span>
						<strong style="display: inline-block; font-size: 16px; text-align: center; width: 90%;">Battey</strong>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Replacement Date:</label>
						<input type="text" name="replacement_date" value="<?php echo isset($info['replacement_date'])?$info['replacement_date']:''; ?>" style="width: 43%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Harley Brand:</label>
						<input type="text" name="harley_brand" value="<?php echo isset($info['harley_brand'])?$info['harley_brand']:''; ?>" placeholder="Yes or No" style="text-align: center; width: 56%; float: right; color: #000;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Load Test:</label>
						<input type="text" name="load_test" value="<?php echo isset($info['load_test'])?$info['load_test']:''; ?>" style="width: 66%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Replacement Amount:</label>
						<input type="text" name="replacement_amount" value="<?php echo isset($info['replacement_amount'])?$info['replacement_amount']:''; ?>" style="width: 32%; float: right;">
					</div>
				</div>
				
				<div class="one-fourth" style="width: 24%; float: left; margin: 0 1.5%;">
					<div class="form-field" style="float: left; width: 100%;">
						<span>35</span>
						<strong style="display: inline-block; font-size: 16px; text-align: center; width: 90%;">Front Tire</strong>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Brand:</label>
						<input type="text" name="brand" value="<?php echo isset($info['brand'])?$info['brand']:''; ?>" style="width: 78%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Tread Depth:</label>
						<input type="text" name="tread_depth" value="<?php echo isset($info['tread_depth'])?$info['tread_depth']:''; ?>" style="width: 63%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Damage:</label>
						<input type="text" name="damage" value="<?php echo isset($info['damage'])?$info['damage']:''; ?>" placeholder="Yes or No" style="text-align: center; width: 71%; float: right; color: #000;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Replacement Amount:</label>
						<input type="text" name="replacement_amount2" value="<?php echo isset($info['replacement_amount2'])?$info['replacement_amount2']:''; ?>" style="width: 32%; float: right;">
					</div>
				</div>
				
				
				<div class="one-fourth" style="width: 24%; float: left;">
					<div class="form-field" style="float: left; width: 100%;">
						<span>36</span>
						<strong style="display: inline-block; font-size: 16px; text-align: center; width: 90%;">Rear Tire</strong>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Brand:</label>
						<input type="text" name="brand_2" value="<?php echo isset($info['brand_2'])?$info['brand_2']:''; ?>" style="width: 78%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Tread Depth:</label>
						<input type="text" name="tread_depth2" value="<?php echo isset($info['tread_depth2'])?$info['tread_depth2']:''; ?>" style="width: 63%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0; ">
						<label style="font-size: 13px">Damage:</label>
						<input type="text" name="damage_3" value="<?php echo isset($info['damage_3'])?$info['damage_3']:''; ?>" placeholder="Yes or No" style="text-align: center; width: 71%; float: right; color: #000;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Replacement Amount:</label>
						<input type="text" name="replacement_amount_3" value="<?php echo isset($info['replacement_amount_3'])?$info['replacement_amount_3']:''; ?>" style="width: 32%; float: right;">
					</div>
				</div>
				
				<div class="one-fourth" style="width: 24%; float: right;">
					<div class="form-field" style="float: left; width: 100%;">
						<span>37</span>
						<strong style="display: inline-block; font-size: 16px; text-align: center; width: 90%;">Scheduled Services</strong>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Last Service Date:</label>
						<input type="text" name="last_service_date" value="<?php echo isset($info['last_service_date'])?$info['last_service_date']:''; ?>" style="width: 48%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">By Whom:</label>
						<input type="text" name="by_whom" value="<?php echo isset($info['by_whom'])?$info['by_whom']:''; ?>"  style="text-align: center; width: 67%; float: right; color: #000;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Receipt:</label>
						<input type="text" name="receipt_name" value="<?php echo isset($info['receipt_name'])?$info['receipt_name']:''; ?>"  placeholder="Yes or No" style="width: 76%; float: right; text-align: center;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 0px 0;">
						<label style="font-size: 13px">Service Amount:</label>
						<input type="text" name="service_amount" value="<?php echo isset($info['service_amount'])?$info['service_amount']:''; ?>" style="width: 52%; float: right;">
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 4px 0;">
				<div class="one-half" style="width: 35%; float: left; border: 2px solid #000; border-right: 1px solid #000;">
					<h2 style="font-size: 16px; font-weight: normal; text-align: center;">Remarks: <span style=" font-size: 16px; font-weight: normal;">(reference number above)</span></h2>
					<input type="text" name="remarks1" value="<?php echo isset($info['remarks1'])?$info['remarks1']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks2" value="<?php echo isset($info['remarks2'])?$info['remarks2']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks3" value="<?php echo isset($info['remarks3'])?$info['remarks3']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks4" value="<?php echo isset($info['remarks4'])?$info['remarks4']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks5" value="<?php echo isset($info['remarks5'])?$info['remarks5']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks6" value="<?php echo isset($info['remarks6'])?$info['remarks6']:''; ?>" style="margin: 2px 0; width: 100%;">
					<input type="text" name="remarks7" value="<?php echo isset($info['remarks7'])?$info['remarks7']:''; ?>" style="margin: 2px 0; width: 100%;">
				</div>
				<div class="one-half" style="width: 64.3%; float: right;  border: 2px solid #000; border-left: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Average Motorcycle Value:</label>
						<input type="text" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Reconditioning Amount</label>
						<input type="text" name="reconditioning_amount" value="<?php echo isset($info['reconditioning_amount'])?$info['reconditioning_amount']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Adjusted Value:</label>
						<input type="text" name="adjuted_value" value="<?php echo isset($info['adjuted_value'])?$info['adjuted_value']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Clean-up / Detail:</label>
						<input type="text" name="clean_up" value="<?php echo isset($info['clean_up'])?$info['clean_up']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Appriasal Value:</label>
						<input type="text" name="appraisal_value" value="<?php echo isset($info['appraisal_value'])?$info['appraisal_value']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Appraisal By:</label>
						<input type="text" name="appraisal_by" value="<?php echo isset($info['appraisal_by'])?$info['appraisal_by']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="display: inline-block; font-size: 16px; text-align: right; width: 41%;">Service Associate:</label>
						<input type="text" name="service_associate" value="<?php echo isset($info['service_associate'])?$info['service_associate']:''; ?>" style="width: 57%; float: right;">
					</div>
					<div class="row" style="float: left; width: 100%; margin:0; text-align: right; margin-bottom: 6px;">
						<label style="font-size: 13px; padding-right: 6px;"><sup>*</sup>Value good until <input type="text" name="exp_month" value="<?php echo isset($info['exp_month'])?$info['exp_month']:''; ?>" style="width: 10%;">/ <input type="text" name="exp_day" value="<?php echo isset($info['exp_day'])?$info['exp_day']:''; ?>" style="width: 10%;">/<?php echo date('Y'); ?> assuming motorcycle remains in same condition</label>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
		
		
		
	</div>
		<!-- container end -->
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
