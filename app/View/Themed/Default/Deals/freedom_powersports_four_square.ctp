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
    <input type="hidden" id="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" name="vin">
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	.row-table input[type="text"]{border-bottom: 0px; margin: 2px 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
.mr-section .form-field{padding-top: 8px !important;}
.margin-textarea{height: 348px !important;}
.sm-margin{height: 377px !important;}
.left_area {height: 285px !important;}
.center {height: 842px !important;}
}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
			<div class="left" style="width: 70%; float: left;">
				<div class="row" style="float: left; width: 100%; margin: 0 0 7px;">
					<div class="form-field" style="width: 100%;">
						<label><b>Salesperson:</b></label>
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 84%;">
					</div>
					<div class="form-field" style="width: 50%;">
						<label><b>DATE:</b></label>
						<input type="text" name="date" value="<?php echo date("m/d/Y"); ?>" style="width: 70%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>SOURCE:</b></label>
						<label><input type="checkbox" name="ets_check" value="ets" <?php echo ($info['ets_check'] == 'ets') ? "checked" : ""; ?> />ETS</label>
						<label><input type="checkbox" name="cl_check" value="cl" <?php echo ($info['cl_check'] == 'cl') ? "checked" : ""; ?> />CL</label>
						<label><input type="checkbox" name="tm_check" value="tm" <?php echo ($info['tm_check'] == 'tm') ? "checked" : ""; ?> />TM</label>
						<label><input type="checkbox" name="tme_check" value="tme" <?php echo ($info['tme_check'] == 'tme') ? "checked" : ""; ?> />TME</label>
						<label><input type="checkbox" name="ref_check" value="ref" <?php echo ($info['ref_check'] == 'ref') ? "checked" : ""; ?> />REF</label>
						<label><input type="checkbox" name="rpt_check" value="rpt" <?php echo ($info['rpt_check'] == 'rpt') ? "checked" : ""; ?> />RPT</label>
						<label><input type="checkbox" name="w1_check" value="w1" <?php echo ($info['w1_check'] == 'w1') ? "checked" : ""; ?> />W1</label>
						<label><input type="checkbox" name="ws_check" value="ws" <?php echo ($info['ws_check'] == 'ws') ? "checked" : ""; ?> />WS</label>
						<label><input type="checkbox" name="wse_check" value="wse" <?php echo ($info['wse_check'] == 'wse') ? "checked" : ""; ?> />WSE</label>
						<label><input type="checkbox" name="svc_check" value="svc" <?php echo ($info['svc_check'] == 'svc') ? "checked" : ""; ?> />SVC</label>
						<label><input type="checkbox" name="bs_check" value="bs" <?php echo ($info['bs_check'] == 'bs') ? "checked" : ""; ?> />BS</label>
						<label><input type="checkbox" name="dt_check" value="dt" <?php echo ($info['dt_check'] == 'dt') ? "checked" : ""; ?> />DT</label>
						<label><input type="checkbox" name="oem_check" value="oem" <?php echo ($info['oem_check'] == 'oem') ? "checked" : ""; ?> />OEM</label>
					</div>
					<div class="form-field" style="width: 85%; text-align: center; float: left;">
						<label style="font-size: 12px; margin: 0px;"><b>SEO EVENT</b></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>NAME:</b></label>
						<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] :  $info['first_name']." ".$info['last_name']; ?>" style="width: 90%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>ADDRESS:</b></label>
						<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label><b>CITY:</b></label>
						<input type="text" name="city" value="<?php echo isset($info["city"]) ? $info["city"] : $info["city"] ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label><b>STATE:</b></label>
						<input type="text" name="state" value="<?php echo isset($info["state"]) ? $info["state"] : $info["state"] ?>" style="width: 63%;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label><b>ZIP:</b></label>
						<input type="text" name="zip" value="<?php echo isset($info["zip"]) ? $info["zip"] : $info["zip"] ?>" style="width: 73%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label><b>EMAIL:</b></label>
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 90%;">
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 25%; margin: 32px 0 0;">
				<div class="logo" style="float: left; width: 100%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/freedom.jpg'); ?>" alt="" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>CELL # </b></label>
				<input type="text" name="cell" value="<?php echo isset($info['cell']) ? $info['cell'] : $info['mobile'] ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>BUS. # </b></label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>HOME # </b></label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 82%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 80%;">
				<label><b>VIN</b></label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 5%; margin-right: 4px;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 5%; margin-right: 4px;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 5%; margin-right: 4px;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 4%; margin-right: 4px;">
					<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 5%; margin-right: 4px;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 5%; margin-right: 4px;">
				<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="width: 4%; margin-right: 4px;">
				<input type="text" name="vin16" id="vin16" value="<?php echo isset($info['vin16']) ? $info['vin16'] : ''; ?>" style="width: 5%; margin-right: 4px;">
			</div>
			<label style="font-size: 16px;"><b>( extra units on back )</b></label>
		</div>
		
		<div class="row-table" style="float: left; width: 100%; margin: 0; border: 1px solid #000; border-bottom: 0px;">
			<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
				<div class="form-field" style="float: left; width: 13%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>STOCK#</b></label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 11%; box-sizing: border-box; padding: 0 3px; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><input type="checkbox" name="condition_new" value="New" <?php echo ($info['condition'] == 'New') ? "checked" : ""; ?> /><b>NEW</b></label>
					<label style="display: block; width: 100%; text-align: center;"><input type="checkbox" name="condition_used" value="Used" <?php echo ($info['condition'] == "Used") ? "checked" : ""; ?> /><b>USED</b></label>
				</div>
				<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>YEAR</b></label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 11%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>MAKE</b></label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>MODEL</b></label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 11%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>COLOR</b></label>
					<input type="text" name="color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : "" ?>" style="width: 100%; text-align: center;">
				</div>
				<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; padding: 0 3px; height: 54px;">
					<label style="display: block; width: 100%; text-align: center;"><b>MILES/HOURS</b></label>
					<input type="text" name="tmiles" value="<?php echo isset($info["tmiles"]) ? $info["tmiles"] : "" ?>" style="width: 100%; text-align: center;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="left" style="float: left; width: 34%;">
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 37.9%; box-sizing: border-box; padding: 0 3px;">
							<input type="text" name="no" value="<?php echo isset($info["no"]) ? $info["no"] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 32.7%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0;text-align: center;"><b>FREIGHT</b></label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0;text-align: center;"><b>SET - UP</b></label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 37.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">PRE-OWNED</label>
						</div>
						<div class="form-field" style="float: left; width: 32.7%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$0.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$587.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 37.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">0-199cc</label>
						</div>
						<div class="form-field" style="float: left; width: 32.7%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$284.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$324.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 40.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">200-499cc</label>
						</div>
						<div class="form-field" style="float: left; width: 29.8%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$387.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$324.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 40.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">500cc+</label>
						</div>
						<div class="form-field" style="float: left; width: 29.8%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$564.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$378.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 40.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">SxS</label>
						</div>
						<div class="form-field" style="float: left; width: 29.8%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$643.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$432.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 40.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">PWC</label>
						</div>
						<div class="form-field" style="float: left; width: 29.8%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$614.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$432.00</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 40.9%; box-sizing: border-box; padding: 0 3px;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: left;">BOAT</label>
						</div>
						<div class="form-field" style="float: left; width: 29.8%; box-sizing: border-box; padding: 0 3px;  border-left: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$1,886.00</label>
						</div>
						<div class="form-field" style="float: left; width: 29.3%; box-sizing: border-box; padding: 0 3px; border-left: 1px solid #000;  border-right: 1px solid #000;">
							<label style="display: block; width: 100%; margin: 3px 0; text-align: center;">$1,657.00</label>
						</div>
					</div>

					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px; border-right: 1px solid #000;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 20px 3px; border-right: 1px solid #000;">
							<label style="display: block; width: 60%; float: left; margin: 3px 0; font-size: 18px;"><b>Delivery Charge:</b></label>
							<span style="float: right; width: 30%; display: block;">$ <input type="text" name="dcharges" value="<?php echo isset($info["dcharges"]) ? $info["dcharges"] : "" ?>" style="width: 60%; border-bottom: 1px solid #000;"></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 3px 0; border-right: 1px solid #000;">
							<label style="display: block; width: 100%; float: left; margin: 3px 0; font-size: 18px; text-decoration: underline; text-align: center;"><b>Parts / Accessories Amount</b></label>
							<textarea name="accessories" style="float: left; width:60%; height: 60px; border: 0; box-sizing: border-box; margin-left: 18%;font-size: 15px; font-weight: 600;"><?php echo isset($info['accessories']) ? $info['accessories'] : ''; ?></textarea>
						</div>
						
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px 3px 0; border-right: 1px solid #000;">
							<label style="display: block; width: 100%; float: left; margin: 3px 0; font-size: 18px; text-decoration: underline; text-align: center;"><b>Labor / Install Amount</b></label>
							<textarea name="labor" style="float: left; width: 60%; height: 70px; border: 0; box-sizing: border-box; margin-left: 18%;font-size: 15px; font-weight: 600;"><?php echo isset($info['labor']) ? $info['labor'] : ''; ?></textarea>
						</div>
						
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 3px 0; border-right: 1px solid #000;">
							<label style="display: block; width: 100%; float: left; margin: 3px 0; font-size: 18px; text-decoration: underline; text-align: center;"><b>Total Parts/Accessories/Labor</b></label>
							<textarea class="left_area" name="parts" style="float: left; width: 60%; height: 109px; border: 0; box-sizing: border-box; margin-left: 18%;font-size: 15px; font-weight: 600;"><?php echo isset($info['parts']) ? $info['parts'] : ''; ?></textarea>
						</div>
					</div>
				</div>
				<!-- leftside end -->
				
				<!-- center start -->
				<div class="center" style="float: left; width: 33%; margin: 0; border-right: 1px solid #000; box-sizing: border-box; height: 667px;">
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<h2 style="text-align: center; margin: 0; text-decoration: underline; font-size: 17px;"><b>SELL PRICE</b></h2>
							<p style="text-align: center; margin: 0; font-size: 16px">Ag Exempt : Yes / No</p>
							<textarea name="sell_price" style="width: 100%; border: 0px; height: 250px; box-sizing: border-box;"><?php echo isset($info['sell_price']) ? $info['sell_price'] : ''; ?></textarea>
						</div>
						
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px; margin-top: 20px;">
							<div class="divider" style="float: left; width: 100%; border-top: 1px dashed  #000;"></div>
							<h2 style="background: #fff none repeat scroll 0 0; font-size: 17px; margin: 0 auto; position: relative; text-align: center; top: -13px; width: 69px;text-decoration: underline;">F.S.P</h2>
							<div class="cover" style="float: left; width: 100%;">
								<div class="left" style="float: right; width: 49%;">
									<label style="display: block; text-align: center; text-decoration: underline;">VSC</label>
										<textarea name="vsc" style="width: 100%; border: 0px; height: 90px; box-sizing: border-box; font-weight:600; font-size: 15px;"><?php echo isset($info['vsc']) ? $info['vsc'] : ''; ?></textarea>
								</div>
								
								<div class="right" style="float: right; width: 49%;">
									<label style="display: block; text-align: center; text-decoration: underline;">PPM</label>
									<textarea name="prm" style="width: 100%; border: 0px; height: 90px; box-sizing: border-box; font-weight: 600; font-size: 15px;"><?php echo isset($info['prm']) ? $info['prm'] : ''; ?></textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<h2 style="text-align: center; margin: 0; text-decoration: underline; font-size: 17px;"><b>Initial Investment</b></h2>
							<textarea name="investment" class="margin-textarea" style="width: 60%; border: 0px; height: 207px; box-sizing: border-box;padding-top:50px;margin-left:2%;font-size: 15px;font-weight: 600;"><?php echo isset($info['investment']) ? $info['investment'] : ''; ?></textarea>
						</div>
					</div>
				</div>
				
				<!-- center start -->
				
				<!-- rightside start -->
				<div class="right" style="float: left; width: 33%; box-sizing: border-box;">
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<h2 style="text-align: center; margin: 0; text-decoration: underline; font-size: 17px;"><b>TRADE</b></h2>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Year</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] :  $info['year_trade']; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Make</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] :  $info['make_trade']; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Model</label>
							<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] :  $info['model_trade']; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Color</label>
							<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Miles / Hours</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Payoff? Yes / No</label>
							<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade'])?$info['payoff_trade']:''; ?>" style="width: 64%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Payoff Amount:</label>
							<input type="text" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width: 65%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>Lienholer:</label>
							<input type="text" name="lienholer" value="<?php echo isset($info['lienholer'])?$info['lienholer']:''; ?>" style="width: 70%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<label>VIN</label>
							<textarea name="vin_trade" style="float: left; width: 100%; height: 30px; border: 0px; box-sizing: border-box;"><?php echo isset($info['vin_trade'])?$info['vin_trade'] : "" ?></textarea>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<h2 style="text-align: center; margin: 0; text-decoration: underline; font-size: 17px;"><b>VALUE</b></h2>
							<textarea name="value" style="width: 60%; border: 0px; height: 60px; box-sizing: border-box;margin-left: 18%;font-size: 15px;font-weight: 600;"><?php echo isset($info['value']) ? $info['value'] : "" ?></textarea>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; ">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px;">
							<h2 style="text-align: center; margin: 0; text-decoration: underline; font-size: 17px;"><b>Monthly Investment - W.A.C.</b></h2>
							<p style="text-align: center; margin: 0; font-size: 15px">FINANCE / CASH / CHECK </p>
							<p style="text-align: center; margin: 0; font-size: 15px">CREDIT CARD (+3% svc fee)</p>
							<textarea name="mon_investment" class="sm-margin" style="width: 60%; border: 0px; height: 227px; box-sizing: border-box; margin-left: 18%;padding-top: 70px;font-weight: 600;font-size: 15px;"><?php echo isset($info['mon_investment']) ? $info['mon_investment'] : "" ?></textarea>
						</div>
					</div>
					
				</div>
				<!-- rightside end -->
			</div>
		</div>
		<!-- row table end -->
		
		<p style="float: left; width: 100%; font-size: 11px; margin: 5px 0; text-align: center;">This worksheet is provided to better assist you in understanding the pricing, trade-in and financing information. Any payment amounts are ESTIMATES ONLY based on approved credit, applicable taxes, vehicle selection, trade value(s), correct payoff and other factors specific to your transaction. Final payment amount may vary. By signing, I acknowledge and approve the information on this page</p>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 5px 0; text-align: center;"><b>Upon agreeable terms being reached, I am ready to purchase this vehicle today.</b></p>
		
		<div class="row" style="float: left; width: 100%; margin-top: 10px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 0 3px; text-align: center;">
				<label style="margin: 3px 0; font-size: 20px;"><b>CUSTOMER APPROVAL:</b></label>
				<input type="text" name="cus_approval" value="<?php echo isset($info['cus_approval']) ? $info['cus_approval'] : "" ?>" style="width: 22%;">
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


	var vin = $('#vin').val();
	var res = vin.split("");
	for (var i = 0; i <= 16; i++) {
		$("#vin" + i).val(res[i]);
	}
	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
