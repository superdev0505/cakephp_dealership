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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 1px;}
@media print {
	.second-page{margin-top: 7% !important;}
	.wraper.main input {padding: 0px !important;}
	input[type="text"]{padding: 0px !important;}
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0; text-align: center;">
			<h2 style="float: left; width: 100%; font-size: 16px; margin: 3px 0 0;"><b>Holiday Hour RV, INC.</b></h2>
			<p style="float: left; width: 100%; font-size: 14px; margin: 3px 0 2px;">350 W. Lincoln Highway <br>
				Cortland, IL 60112 <br>
				Phone: (815) 756-9438     Fax: (815) 756-5450
			</p>
		</div>
		
		<div class="content" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box;">
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 80%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Buyers</label>
					<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 20%; padding: 2px; box-sizing: border-box;">
					<label>Date</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Street</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 30%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Country</label>
					<input type="text" name="country" value="<?php echo isset($info['country'])?$info['country']:''; ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box;">
					<label>Proposed Delivery Date</label>
					<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" style="width: 55%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>City</label>
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 13%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>State</label>
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 17%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Zip</label>
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 60%; font-weight: bold;">
				</div>
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box;">
					<label>Home</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Cell</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 30%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Work</label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box;">
					<label>Other</label>
					<input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 52%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Make/Model</label>
					<input type="text" name="make_model" value="<?php echo isset($info['make_model']) ? $info['make_model'] : $info['make']." ".$info['model'] ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 13%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Year</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box;">
					<label>Serial #</label>
					<input type="text" name="serial_num" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 52%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Chasis Make/Model</label>
					<input type="text" name="chasis_make_model" value="<?php echo isset($info['chasis_make_model'])?$info['chasis_make_model']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 13%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Year</label>
					<input type="text" name="chasis_year" value="<?php echo isset($info['chasis_year'])?$info['chasis_year']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 35%; padding: 2px; box-sizing: border-box;">
					<label>Serial #</label>
					<input type="text" name="chasis_serial" value="<?php echo isset($info['chasis_serial'])?$info['chasis_serial']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 52%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Salesperson</label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Gross Weight</label>
					<input type="text" name="gross" value="<?php echo isset($info['gross'])?$info['gross']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 23%; padding: 2px; box-sizing: border-box;">
					<label>Odometer</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border-bottom: 1px solid #000;">
				<div class="form-field" style="float: left; width: 52%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>License #</label>
					<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 25%; padding: 2px; box-sizing: border-box; border-right: 1px solid #000;">
					<label>Color</label>
					<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 60%;">
				</div>
				<div class="form-field" style="float: left; width: 23%; padding: 2px; box-sizing: border-box;">
					<label style="margin: 0 13% 0 7%;"><input type="checkbox" name="condition" <?php echo ($info['condition'] == "NEW") ? "checked" : ""; ?> value="NEW"/> New</label>
					<label><input type="checkbox" name="condition" <?php echo ($info['condition'] == "USED") ? "checked" : ""; ?> value="USED"/> Used</label>
				</div>
			</div>
			
			
			
			
			<div class="one-half-cover" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
				<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
					<h2 style="float: left; width: 100%; margin: 0; padding: 3px 0; text-align: center; font-size: 15px; border-bottom: 1px solid #000;"><b>Optional Equipment, Labor & Accessories</b></h2>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment1" value="<?php echo isset($info['equipment1'])?$info['equipment1']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor1" value="<?php echo isset($info['labor1'])?$info['labor1']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment2" value="<?php echo isset($info['equipment2'])?$info['equipment2']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor2" value="<?php echo isset($info['labor2'])?$info['labor2']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment3" value="<?php echo isset($info['equipment3'])?$info['equipment3']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor3" value="<?php echo isset($info['labor3'])?$info['labor3']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment4" value="<?php echo isset($info['equipment4'])?$info['equipment4']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor4" value="<?php echo isset($info['labor4'])?$info['labor4']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment5" value="<?php echo isset($info['equipment5'])?$info['equipment5']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor5" value="<?php echo isset($info['labor5'])?$info['labor5']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment6" value="<?php echo isset($info['equipment6'])?$info['equipment6']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor6" value="<?php echo isset($info['labor6'])?$info['labor6']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment7" value="<?php echo isset($info['equipment7'])?$info['equipment7']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor7" value="<?php echo isset($info['labor7'])?$info['labor7']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment8" value="<?php echo isset($info['equipment8'])?$info['equipment8']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor8" value="<?php echo isset($info['labor8'])?$info['labor8']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment9" value="<?php echo isset($info['equipment9'])?$info['equipment9']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor9" value="<?php echo isset($info['labor9'])?$info['labor9']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment10" value="<?php echo isset($info['equipment10'])?$info['equipment10']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor10" value="<?php echo isset($info['labor10'])?$info['labor10']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment11" value="<?php echo isset($info['equipment11'])?$info['equipment11']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor11" value="<?php echo isset($info['labor11'])?$info['labor11']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment12" value="<?php echo isset($info['equipment12'])?$info['equipment12']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor12" value="<?php echo isset($info['labor12'])?$info['labor12']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment13" value="<?php echo isset($info['equipment13'])?$info['equipment13']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor13" value="<?php echo isset($info['labor13'])?$info['labor13']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment14" value="<?php echo isset($info['equipment14'])?$info['equipment14']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor14" value="<?php echo isset($info['labor14'])?$info['labor14']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment15" value="<?php echo isset($info['equipment15'])?$info['equipment15']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor15" value="<?php echo isset($info['labor15'])?$info['labor15']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment16" value="<?php echo isset($info['equipment16'])?$info['equipment16']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor16" value="<?php echo isset($info['labor16'])?$info['labor16']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment17" value="<?php echo isset($info['equipment17'])?$info['equipment17']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor17" value="<?php echo isset($info['labor17'])?$info['labor17']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment18" value="<?php echo isset($info['equipment18'])?$info['equipment18']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor18" value="<?php echo isset($info['labor18'])?$info['labor18']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment19" value="<?php echo isset($info['equipment19'])?$info['equipment19']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor19" value="<?php echo isset($info['labor19'])?$info['labor19']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment20" value="<?php echo isset($info['equipment20'])?$info['equipment20']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor20" value="<?php echo isset($info['labor20'])?$info['labor20']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 70%; margin: 0; box-sizing: border-box; border-right: 1px solid #000; padding: 3px; height: 24px;">
							<input type="text" name="equipment21" value="<?php echo isset($info['equipment21'])?$info['equipment21']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; height: 24px; width: 30%; margin: 0; box-sizing: border-box; padding: 3px;">
							<input type="text" name="labor21" value="<?php echo isset($info['labor21'])?$info['labor21']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<label>Financed By</label>
							<input type="text" name="financed" value="<?php echo isset($info['financed'])?$info['financed']:''; ?>" style="width: 60%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<label>Street</label>
							<input type="text" name="street1" value="<?php echo isset($info['street1'])?$info['street1']:''; ?>" style="width: 60%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<label>Street</label>
							<input type="text" name="street2" value="<?php echo isset($info['street2'])?$info['street2']:''; ?>" style="width: 60%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<label>State</label>
							<input type="text" name="state1" value="<?php echo isset($info['state1'])?$info['state1']:''; ?>" style="width: 60%;">
						</div>
						<div class="form-field" style="float: left; width: 35%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<label>Zip</label>
							<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 60%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 55%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<label>Phone</label>
							<input type="text" name="phone1" value="<?php echo isset($info['phone1'])?$info['phone1']:''; ?>" style="width: 60%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<label>Fax</label>
							<input type="text" name="fax1" value="<?php echo isset($info['fax1'])?$info['fax1']:''; ?>" style="width: 60%;">
						</div>
					</div>
						
				</div>
				<!-- left side end -->
				
				<!-- rightside start -->
				
				<div class="left" style="float: left; width: 50%; margin: 0; box-sizing: border-box;">
					<h2 style="float: left; width: 100%; margin: 0; padding: 3px 0; text-align: center; font-size: 15px; border-bottom: 1px solid #000;"><b>Title Application Information</b></h2>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 33%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							&nbsp;
						</div>
						<div class="form-field" style="float: left; width: 34%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<label style="text-align: center; display: block;">Buyer</label>
						</div>
						<div class="form-field" style="float: left; width: 33%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<label style="text-align: center; display: block;">Co-Buyer</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: center;">Buyer</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<input type="text" name="buyer" value="<?php echo isset($info['buyer'])?$info['buyer']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" name="co-buyer" value="<?php echo isset($info['co-buyer'])?$info['co-buyer']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: center;"> Driver's Lic. #</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<input type="text" name="driver" value="<?php echo isset($info['driver'])?$info['driver']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" name="co-driver" value="<?php echo isset($info['co-driver'])?$info['co-driver']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: center;"> Social Sec. #</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
							<input type="text" name="social" value="<?php echo isset($info['social'])?$info['social']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" name="co-social" value="<?php echo isset($info['co-social'])?$info['co-social']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Base Price of Unit</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="base_price" name="base_price" value="<?php echo isset($info['base_price'])?$info['base_price']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Optional Equipment</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="equipment" name="equipment" value="<?php echo isset($info['equipment'])?$info['equipment']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Sub-total</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="subtotal" name="subtotal" value="<?php echo isset($info['subtotal'])?$info['subtotal']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Labor</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="labor" name="labor" value="<?php echo isset($info['labor'])?$info['labor']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Sales Tax (if required)</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Cash Purchase Price</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="purchase" name="purchase" value="<?php echo isset($info['purchase'])?$info['purchase']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><i>Trade-in Allowance</i></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="allowance" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><i>Less Balance Due on Above</i></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="balance" name="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><i>Net Allowance</i></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="net" name="net" value="<?php echo isset($info['net'])?$info['net']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><i>Cash Down Payment</i></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="cash_down" name="cash_down" value="<?php echo isset($info['cash_down'])?$info['cash_down']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><i>Cash As Agreed</i></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="cash_agreed" name="cash_agreed" value="<?php echo isset($info['cash_agreed'])?$info['cash_agreed']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Less Total Credit</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="total_credit" name="total_credit" value="<?php echo isset($info['total_credit'])?$info['total_credit']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Sub-total</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="sub_total" name="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Extended Warranty</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="warranty" name="warranty" value="<?php echo isset($info['warranty'])?$info['warranty']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Non-taxable Items</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="taxable" name="taxable" value="<?php echo isset($info['taxable'])?$info['taxable']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Various Fees & Insurance</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="insurance" name="insurance" value="<?php echo isset($info['insurance'])?$info['insurance']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<input type="text" name="title3" value="<?php echo isset($info['title3'])?$info['title3']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" name="value3" value="<?php echo isset($info['value3'])?$info['value3']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;">Sales Tax (if not included above)</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="sales" name="sales" value="<?php echo isset($info['sales'])?$info['sales']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 60%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
							<label style="text-align: right; display: block;"><b>Balance of Cash Sale Price</b></label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
							<input type="text" class="price" id="cash_sale" name="cash_sale" value="<?php echo isset($info['cash_sale'])?$info['cash_sale']:''; ?>" style="width: 100%;">
						</div>
					</div>
					
					
					
				</div>
				
				<!-- rightside end -->
				
			</div>
		</div>
		<!-- content area end -->
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px solid #000; box-sizing: border-box; border-top: 0px;">
			<div class="form-field" style="float: left; width: 100%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
				<label>Trade-in Description</label>
				<input type="text" name="name" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Make</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Model</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Year</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin: 0; height: 24px; box-sizing: border-box;  padding: 3px;">
				<label>Serial #</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
				<label> Chasis Make</label>
				<input type="text" name="cash_make_trade" value="<?php echo isset($info['cash_make_trade'])?$info['cash_make_trade']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Model</label>
				<input type="text" name="cash_model_trade" value="<?php echo isset($info['cash_model_trade'])?$info['cash_model_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Year</label>
				<input type="text" name="cash_year_trade" value="<?php echo isset($info['cash_year_trade'])?$info['cash_year_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; margin: 0; height: 24px; box-sizing: border-box; padding: 3px;">
				<label>Serial #</label>
				<input type="text" name="cash_vin_trade" value="<?php echo isset($info['cash_vin_trade'])?$info['cash_vin_trade']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Title #</label>
				<input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Odometer</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label>Approx. Size</label>
				<input type="text" name="approx" value="<?php echo isset($info['approx'])?$info['approx']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0; height: 24px; box-sizing: border-box;  padding: 3px;">
				<label>Color</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 70%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 35%; margin: 0; height: 24px; box-sizing: border-box; border-right: 1px solid #000; padding: 3px;">
				<label> Amount Owing To</label>
				<input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 65%; margin: 0; height: 24px; box-sizing: border-box;  padding: 3px;">
				<label>Any debt buyer owes on trade-in is to be paid by </label>
				<label style="margin: 0 13% 0 7%;"><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "dealer") ? "checked" : ""; ?> value="dealer"/> Dealer</label>
				<label><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "buyer") ? "checked" : ""; ?> value="buyer"/> Buyer</label>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 0; font-size: 12px; padding: 3px; box-sizing: border-box; border: 1px solid #000; border-bottom: 1px solid #000;">It is mutally understood that this agreement is subject to necessary corrections and adjustments concerning changes in net payoff on trade-in to be made at the time of settlement.</p>
		
		<p style="float: left; width: 100%; margin: 0; font-size: 12px; padding: 3px; box-sizing: border-box; border: 1px solid #000; border-bottom: 1px solid #000; border-top: 0px;">Buyer is purchasing the above described unit, the optional equipment and accessories, the insurance has been voluntary; the Buyer's trade-in is free from all claims whatsoever, except as noted.  <br>
<b>The following page</b> of this agreement contains <b>additional terms & conditions,</b> including, but not limited to, provisions regarding <b>warranty, exclusions and limitations of damages.</b> </br>  
Dealer and Buyer acknowledge and certify that such additional terms and conditions printed on the following page of this agreement are agreed to as part of this agreement. </br> 
The agreement contains the entire agreement between the Dealer and Buyer and no other representations or inducement, verbal or written, has been made which is not contained in this agreement.  Buyer(s) acknowledge receipt of a copy of this agreement and that Buyer(s) have read and understand the entire agreement.</p>
		
		<div class="second-page" style="float: left; width: 100%; margin: 4px 0 0; box-sizing: border-box; border: 1px solid #000; margin-bottom: 10px;">
			<h2 style="float: left; width: 100%; margin: 0; text-align: center; border-bottom: 1px solid #000; font-size: 17px;"><b>Additional Terms & Conditions</b></h2>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;">Buyer understands that the term "unit" used in the agreement describes the Recreational Vehicle or any item or combination of items as described on the first page
 of this agreement.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;">Buyer further agrees (continued from first page of Agreement):</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>1.  If not a cash transaction:</b> If Buyer does not complete this purchase as a cash transaction, Buyer knows before or at the time of delivery of the unit purchased, Buyer will enter into a retail installment contract and sign a security agreement of another agreement as may be required to finance Buyer's purchase.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>2.  Title:</b> Title to the unit purchased will remain in Dealer until the agreed upon purchase price is paid in full in cash, or Buyer has signed a retail installment contract and it has been accepted by a bank or finance company, at which time the title passes to Buyer even through the actual delivery of the unit purchased may be made at a later date.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>3. Trade-in:</b> If Buyer is trading in a used car, trailer, or other vehicle, Buyer will give Dealer the original bill of sale or title to the trade-in.  Buyer promises that any trade-in which Buyer gives is owned by Buyer and is free of any lien or other claim except as noted on the first page of this agreement. Buyer promises that all taxes of every kind levied against the trade-in have been fully paid.  If any government agency makes a levy or claims a tax lien or demand against the trade-in, Dealer may, at Dealer's option, either pay it and Buyer will reimburse Dealer on demand, or Dealer may add that amount to the agreement a if it had been originally included.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>5.  Reappraisal of Trade-in:</b> If Buyer is making a trade-in and it is not delivered to Dealer at the time of the original appraisal and it later, on delivery, it appears to Dealer that there have been material changes made in the furnishings or accessories, or in its general physical condition, you make a reappraisal.  The later appraisal will then determine the allowance to be made for the trade-in.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>6.  Failure To Complete Purchase:</b> If Buyer fails or refuses to complete this purchae within the time from specified on this agreement or as specified in the Uniform Commercial Code of the state in which Buyer signs this agreement, or wirhin an agreed upon extension of time, for any reason (other than cancellation because of any increase in price), Dealer may keep that portion of my cash deposit which will adequately compensate Dealer for Dealer's actual, consequential and incidental damages, and all other damages, expenses, or losses which Dealer incurs because Buyer failed to complete the purchase.  If Buyer has not given Dealer a cash deposit or it is inadequate and Buyer has given Dealer a trade-in, Dealer may sell the trade-in at public or private sale, and deducted from the money received an amount that will adequately compensate Dealer for any and all of the above mentioned damages, expenses, and losses incurred because Buyer failed to complete the purchase.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;">Retention of any portion of the cash deposit or the application of sale proceeds shall be in addition to, and not to the exclusion of, any other remedies Dealer may have at law, and this agreement shall not be intrepreted as containing a liquidated damages provision.  Buyer understands that Buyer shall have all the rights of a seller upon breach of contract under the Uniform Commercial Code, except the right to seek and collect "liquidated damages" under Section 2-718.  If Dealer prevails in any legan action against the Buyer, or which the Buyer brings against the Dealer, concerning this agreement, Buyer agrees to reimburse Dealer for the Dealer's reasonable attorneys' fees, court costs and expenses which the Dealer incurs in prosecuting or defending against that legal action.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>7.  Changes by Manufacturer:</b>  Buyer understands that the manufacturer may make any changes in the model, or designs, or any accessories and parts from time to time, and at any time, if the manufacturer does make changes, neither Dealer nor the manufacturer are obligated to make the same changes in the unit Buyer is purchasing and covered by this agreement, either before or after it is delivered to Buyer.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>8.  Delays:</b>  Buyer will not hold Dealer liable for delays caused by the manufacturer, accidents, strikes, fires, or any other cause beyond Dealers control.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>9.  Inspection:</b>  Buyer has examined the product and finds it suitable for Buyer's particular needs.  Buyer has relied upon Buyer's own judgement and inspection in determining that it is of acceptable quality.  On the special unit ordered, Buyer has relied on Buyer's inspection of display model(s), the brochures and bulletins and/or the floor plan provided to Dealer by the manufacturer, in making Buyer's decision to purchase the unit described on the first page of this agreement.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>10.  Warranties and Exclusions:</b>  Buyer understands that there may be written warranties covering the unit purchase, or any component(s), or any appliance(s) which have been provided by the manufacturer.  Dealer has given Buyer and Buyer has read and understood a statement of the type of warranty covering the unit purchased and/or component(s) and/or appliance(s) before Buyer signed this sales agreement.  There is no express warranty on used units.  Except where prohibited by Law: (i) Delivery by Dealer to Buyer of the warranty by the manufacturer of the unit purchased, or any component(s), or any appliance(s) does not mean Dealer adopt the warranty(s) of such manufacturer(s).  (ii)  Buer acknowledges that these expresswarranties made by the manufacturer(s) have not been made by Dealer even if they say Dealer made them or say Dealer made some other express warranty, and (iii)  Dealer is not an agent of the manufacturer(s) for warranty purposes even if Dealer completes, or attempts to complete repairs for the manufacturer(s).  Except in WV, MS, WI or where otherwise prohibited by Law:</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;">(i) Buyer understands that the implied warranties of the merchantability and fitness for a particular purpose and all other warranties expressed or implied are excluded by Dealer from this transaction and shall not apply to the unit or any component or any appliance contained therein, (ii) Buyer understands that Dealer makes no warranties whatsoever regarding this unit or any component or any appliance contained therein, and (iii) Buyer understands that Dealer disclaims and excludes from this transaction all warranty obligations which exceed or exist over and above the legal warranties required by applicable state law.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>11.  Limitation of Damages:</b>   Except in WV and any other state which does not allow the limitation of incidental, and/or consquential damages, the following limitation of damages shall apply.  If any warranty fails because of attempts at repair are no completed within a reasonable time, or any reason attributed to the manufacturer, including manufacturers who have gone out of business, Buyer agrees that if Buyer is entitled to any damages against Dealer, Buyer damages are limited to the lesser of either the cost of needed repairs or reduction in the market value of the unit caused by the lack of repairs.  Buyer also agrees that once Buyer has accepted the unit, even though the manufacturer(s)' warranty does not accomplish its purpose., that Buyer cannot return the unit to the Dealer and seek a refund for any reason.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>12.  Insurance:</b>  Buyer understands that the Buyer is NOT covered by insurance on the unit purchased until accepted by an insurance compnay, and Buyer agrees to hold Dealer harmless for any and all claims due to loss or damage prior to acceptance or insurance coverage by an insurance company.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>13.  Controlling Law and Place of Suit:</b>  The law of the state, in which Buyer signs this agreement, is the law which is to be used in interpreting the terms of this agreement.  Dealer and Buyer agree that if any dispute between them is submitted to a court for resolution, such legal proceeding shall take place in the county in which Dealer's principle offices are located.  If under state law a special dispute resolution procedure or complaint process is available, Buyer agrees to the extent permitted by law that procedure shall be the only method of resolution and source of remedies available to Buyer.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"><b>14.  If Part Invalid Rest of Agreement Saved:</b>  Dealer and Buyer agrees that each portion of this agreement is independent and if any paragraph or provision violates the law and is unenforceable, the rest of the agreement will be valid.</p>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px; box-sizing: border-box; padding: 0 7px;"></p>
		</div>
		
		<div class="row" style="width: 100%; margin: 3px 0; float: left;">
			<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
				<input type="text" name="dealer_sign" value="<?php echo isset($info['dealer_sign'])?$info['dealer_sign']:''; ?>" style="float: left; width: 80%;">
				<label style="font-size: 12px; display: block; width: 20%; float: right; text-align: right;">Dealer</label><br>
			</div>
			<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
				<label style="font-size: 12px; display: block; float: left; width: 20%;">Signed <span style="margin: 0 4%;">X</span></label>
				<input type="text" name="buyer_x" value="<?php echo isset($info['buyer_x'])?$info['buyer_x']:''; ?>" style="float: left; width: 60%;">
				<label style="font-size: 12px; display: block; float: right; width: 20%; text-align: right;">Buyer</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 3px 0; float: left;">
			<p style="float: left; width: 49%; margin: 0; font-size: 11px; text-align: center;">Not valid unless signed and accepted by an Office or Authorized Agent</p>
		</div>
		
		
		<div class="row" style="width: 100%; margin: 3px 0; float: left;">
			<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
				<input type="text" name="approved" value="<?php echo isset($info['approved'])?$info['approved']:''; ?>" style="float: right; width: 80%;">
				<label style="font-size: 12px; display: block; width: 20%; float: right; text-align: left;">By</label><br>
			</div>
			<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
				<label style="font-size: 12px; display: block; float: left; width: 20%;">Signed <span style="margin: 0 4%;">X</span></label>
				<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="float: left; width: 60%;">
				<label style="font-size: 12px; display: block; float: right; width: 20%; text-align: right;">Buyer</label>
			</div>
		</div>
		
		<div class="row" style="width: 100%; margin: 3px 0; float: left;">
			<p style="float: left; width: 49%; margin: 0; font-size: 11px; text-align: center;">Approved</p>
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
	
	function calculate_total() {
       base_price = isNaN(parseFloat($("#base_price").val()))?0.00:parseFloat($("#base_price").val());
       equipment = isNaN(parseFloat($("#equipment").val()))?0.00:parseFloat($("#equipment").val());	
       var subtotal = base_price + equipment;
       $("#subtotal").val(subtotal.toFixed(2));
       sales_tax = isNaN(parseFloat($("#sales_tax").val()))?0.00:parseFloat($("#sales_tax").val());	
       labor = isNaN(parseFloat($("#labor").val()))?0.00:parseFloat($("#labor").val());	
       var purchase = subtotal + sales_tax + labor;
		$("#purchase").val(purchase.toFixed(2));

		allowance = isNaN(parseFloat($("#allowance").val()))?0.00:parseFloat($("#allowance").val());
		balance = isNaN(parseFloat($("#balance").val()))?0.00:parseFloat($("#balance").val());
		net = isNaN(parseFloat($("#net").val()))?0.00:parseFloat($("#net").val());
		cash_down = isNaN(parseFloat($("#cash_down").val()))?0.00:parseFloat($("#cash_down").val());
		cash_agreed = isNaN(parseFloat($("#cash_agreed").val()))?0.00:parseFloat($("#cash_agreed").val());
		total_credit = isNaN(parseFloat($("#total_credit").val()))?0.00:parseFloat($("#total_credit").val());

		var sub_total = purchase - allowance + balance + net - cash_down + cash_agreed - total_credit;
		$("#sub_total").val(sub_total.toFixed(2));

		warranty = isNaN(parseFloat($("#warranty").val()))?0.00:parseFloat($("#warranty").val()); 
		taxable = isNaN(parseFloat($("#taxable").val()))?0.00:parseFloat($("#taxable").val());
		insurance = isNaN(parseFloat($("#insurance").val()))?0.00:parseFloat($("#insurance").val());

		sales = isNaN(parseFloat($("#sales").val()))?0.00:parseFloat($("#sales").val());

		var cash_sale = sub_total + taxable + insurance + sales + warranty;
       $("#cash_sale").val(cash_sale.toFixed(2));
    }

	$(".price").on('change keyup paste',function(){
        calculate_total();
    });
     
});

	
	
	
	
	
</script>
</div>
