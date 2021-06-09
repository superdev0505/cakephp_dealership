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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; margin-bottom: 0px; font-weight: normal;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-left: 1px solid #000; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px; text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}
	a.active{color: #000 !important;}
	td:last-child{border-right: 0px; text-align: left;}
	td:last-child input[type="text"]{text-align: right;}
	.cal_section label {float: left;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	.total_section {height: 130px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 40%;">
				<div class="logo" style="float: left; width: 22%;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-circle.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<div class="right" style="float: left; width: 70%; text-align: center;">
					<p style="float: left; width: 100%; font-size: 12px; margin: 2px 0;"><b>STATE OF NEW MEXICO <br> TAXATION & REVENUE DEPARTMENT <br> MOTOR VEHICLE DIVISION</b></p>
					<h3 style="float: left; width: 100%; font-size: 14px; margin: 0; line-height: 14px;">ALLPLICATION FOR VEHICLE <br> TITLE AND REGISTRATION</h3>
					<p style="float: left; width: 100%; margin: 2px 0; font-size: 10px;">MVD-10002 REV. 09/09</p>
				</div>
			</div>
			<div class="center" style="float: left; width: 20%; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px; margin-top: 27px;">
				<div class="form-field" style="float: left; width: 100%; text-align: center;">
					<label>Title Number</label>
					<textarea name="title_num" style="float: left; width: 94%; height: 40px; border: 0px;"><?php echo isset($info['title_num'])?$info['title_num']:'' ?></textarea>
				</div>
			</div>
			<div class="right" style="float: right; width: 30%;">
				<div class="logo" style="float: left; width: 30%; margin-top: 20px;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/division-logo.jpg'); ?>" alt="" style="width: 100%;">
				</div>
				<div class="right" style="float: right; width: 60%;">
					<b style="display: block; text-align: center; font-size: 14px;"><i>* PLEASE READ <br> IMPORTANT <br> INFORMATION <br> ON REVERSE SIDE *</i></b>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Vehicle Identification Number</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 6%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Model / Series</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 22%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Number of Liens</label>
				<input type="text" name="liens" value="<?php echo isset($info['liens']) ? $info['liens'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label style="display: block;">Color(s) <label style="margin: 0 5%;">Major</label> <label>Minor</label></label>
				<input type="text" name="minor" value="<?php echo isset($info['minor']) ? $info['minor'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; height: 60px; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 34%; height: 60px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Secondary ID Number</label>
				<input type="text" name="second_number" value="<?php echo isset($info['second_number']) ? $info['second_number'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 8%; height: 60px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Wt./Wheels</label>
				<input type="text" name="wheels" value="<?php echo isset($info['wheels']) ? $info['wheels'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; height: 60px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">First Year Reg.</label>
				<input type="text" name="first_year" value="<?php echo isset($info['first_year']) ? $info['first_year'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; height: 60px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Date of Issue</label>
				<input type="text" name="issue" value="<?php echo isset($info['issue']) ? $info['issue'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px;">
				<label style="width: 25%">Type of Title</label>
				<div class="right" style="float: right; width: 75%; height: 54%; margin-top: -6px;">
					<div class="left" style="float: left; width: 50%;">
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="first_time" <?php echo (isset($info['type_check']) && $info['type_check']=='first_time')?'checked="checked"':''; ?> /> 01 - First Time</label>
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="title_transfer" <?php echo (isset($info['type_check']) && $info['type_check']=='title_transfer')?'checked="checked"':''; ?> /> 02 - Title Transfer</label>
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="lien" <?php echo (isset($info['type_check']) && $info['type_check']=='lien')?'checked="checked"':''; ?> /> 03 - Lien Release</label>
					</div>
					<div class="right" style="float: left; width: 50%;">
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="duplicate" <?php echo (isset($info['type_check']) && $info['type_check']=='duplicate')?'checked="checked"':''; ?> /> 04 - Duplicate</label>
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="fee" <?php echo (isset($info['type_check']) && $info['type_check']=='fee')?'checked="checked"':''; ?> />  05 - No Fee Corr.</label>
						<label style="display: block; font-size: 10px;"><input type="radio" name="type_check" value="negotiable" <?php echo (isset($info['type_check']) && $info['type_check']=='negotiable')?'checked="checked"':''; ?> /> 11 - Non-Negotiable</label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="left" style="float: left; width: 38%; box-sizing: border-box;">
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="display: block; text-align: center;">Name and Mailing Address of Registered Owner(s)</label>
					<textarea name="mailing" style="width: 94%; height: 117px; border: 0;"><?php echo isset($info['mailing'])?$info['mailing']:'' ?></textarea>
				</div>
			</div>
			<div class="right" style="width: 62%; float: right; box-sizing: border-box;">
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 12%;  box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">DGVW</label>
						<input type="text" name="dgvm" value="<?php echo isset($info['dgvm']) ? $info['dgvm'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 10%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">Cyls.</label>
						<input type="text" name="cyls" value="<?php echo isset($info['cyls']) ? $info['cyls'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 12%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">Body Type</label>
						<input type="text" name="body_type" value="<?php echo isset($info['body_type']) ? $info['body_type'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 45%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label style="width: 25%">Type of Title</label>
						<div class="right" style="float: right; width: 71%; margin-top: -4px;">
							<div class="left" style="float: left; width: 50%;">
								<label style="display: block; font-size: 10px;"><input type="radio" name="type2_check" value="gas" <?php echo (isset($info['type2_check']) && $info['type2_check']=='gas')?'checked="checked"':''; ?> /> (G) - Gasollne</label>
								<label style="display: block; font-size: 10px;"><input type="radio" value="liquified" <?php echo (isset($info['type2_check']) && $info['type2_check']=='liquified')?'checked="checked"':''; ?> /> (L) - Liquified</label>
							</div>
							<div class="right" style="float: left; width: 50%;">
								<label style="display: block; font-size: 10px;"><input type="radio" value="diesel" <?php echo (isset($info['type2_check']) && $info['type2_check']=='diesel')?'checked="checked"':''; ?> /> (D) - Diesel</label>
								<label style="display: block; font-size: 10px;"><input type="radio" value="other" <?php echo (isset($info['type2_check']) && $info['type2_check']=='other')?'checked="checked"':''; ?> /> (O) - Other</label>
							</div>
						</div>
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px;">
						<label style="display: block;">Odometer <sup>*</sup></label>
						<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border-bottom: 1px solid #000;">
					<div class="form-field" style="float: left; width: 40%;  box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">License Plate Number(s)</label>
						<input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">Vehicle Brand</label>
						<input type="text" name="vehicle_brand" value="<?php echo isset($info['vehicle_brand']) ? $info['vehicle_brand'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; text-align: center; padding: 3px;">
						<label style="display: block;">Vehicle Class</label>
						<input type="text" name="vehicle_class" value="<?php echo isset($info['vehicle_class']) ? $info['vehicle_class'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box;">
					<div class="form-field" style="float: left; width: 20%;  box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">Title Use</label>
						<input type="text" name="title_use" value="<?php echo isset($info['title_use']) ? $info['title_use'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
						<label style="display: block;">Previous Title No. and State</label>
						<input type="text" name="previous_title" value="<?php echo isset($info['previous_title']) ? $info['previous_title'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px;">
						<label style="display: block;">Date Purchased</label>
						<input type="text" name="purchased" value="<?php echo isset($info['purchased']) ? $info['purchased'] : ''; ?>" style="width: 75%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Fleet Number</label>
				<input type="text" name="fleet_num" value="<?php echo isset($info['fleet_num']) ? $info['fleet_num'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Commercial Vehicle</label>
				<input type="text" name="commercial" value="<?php echo isset($info['commercial']) ? $info['commercial'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; height: 39px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;"><sup>*</sup>2290<sup>*</sup></label>
				<input type="text" name="value_option" value="<?php echo isset($info['value_option']) ? $info['value_option'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">2-year Registration</label>
				<input type="text" name="registration" value="<?php echo isset($info['registration']) ? $info['registration'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;"># of Passengers</label>
				<input type="text" name="passengers" value="<?php echo isset($info['passengers']) ? $info['passengers'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;"># of Doors</label>
				<input type="text" name="doors" value="<?php echo isset($info['doors']) ? $info['doors'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label style="display: block;"># of Seats</label>
				<input type="text" name="seats" value="<?php echo isset($info['seats']) ? $info['seats'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">1st Reg. Owner's Social Security / Employer Identification / CRS No.</label>
				<input type="text" name="social_security" value="<?php echo isset($info['social_security']) ? $info['social_security'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">1st Reg. Owner D.O.B</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; height: 39px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">N.M. Driver License No.</label>
				<input type="text" name="driver_license" value="<?php echo isset($info['driver_license']) ? $info['driver_license'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label style="display: block;">N.M. Veteran Cert. No.</label>
				<input type="text" name="veteran" value="<?php echo isset($info['veteran']) ? $info['veteran'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px; height: 45px;">
			<div class="form-field" style="float: left; width: 10%; background-color: #000; color: #fff; text-align: center; padding: 1px 0;">
				<i style="font-size: 12px; ">FIRST LIEN <br> HOLDER</i>
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">File Date</label>
				<input type="text" name="file1_date" value="<?php echo isset($info['file1_date']) ? $info['file1_date'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Maturity Date</label>
				<input type="text" name="maturity1_date" value="<?php echo isset($info['maturity1_date']) ? $info['maturity1_date'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 10%; background-color: #000; color: #fff; text-align: center; padding: 1px 0;">
				<i style="font-size: 12px; ">SECOND LIEN <br> HOLDER</i>
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">File Date</label>
				<input type="text" name="file2_date" value="<?php echo isset($info['file2_date']) ? $info['file2_date'] : ''; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label style="display: block;">Maturity Date</label>
				<input type="text" name="maturity2_date" value="<?php echo isset($info['maturity2_date']) ? $info['maturity2_date'] : ''; ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label>Name and Address</label>
				<textarea name="name_address1" style="width: 98%; height: 40px; border: 0px;"><?php echo isset($info['name_address1'])?$info['name_address1']:'' ?></textarea>
			</div>
			<div class="form-field" style="float: left; width: 50%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label>Name and Address</label>
				<textarea name="name_address2" style="width: 98%; height: 40px; border: 0px;"><?php echo isset($info['name_address2'])?$info['name_address2']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Canceled Plt. No.</label>
				<input type="text" name="plt" value="<?php echo isset($info['plt']) ? $info['plt'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Dealer Lic. No.</label>
				<input type="text" name="dealer_lic" value="<?php echo isset($info['dealer_lic']) ? $info['dealer_lic'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; height: 39px; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Mobile Home Size</label>
				<input type="text" name="mobile_size" value="<?php echo isset($info['mobile_size']) ? $info['mobile_size'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 7%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Cnty.</label>
				<input type="text" name="cnty" value="<?php echo isset($info['cnty']) ? $info['cnty'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; text-align: center; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Approximate Location (Mobile Home)</label>
				<input type="text" name="approximate" value="<?php echo isset($info['approximate']) ? $info['approximate'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 14%; box-sizing: border-box; text-align: center; padding: 3px;">
				<label style="display: block;">Suspended By:</label>
				<input type="text" name="suspended" value="<?php echo isset($info['suspended']) ? $info['suspended'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: box-sizing: border-box; border: 1px solid #000; border-top: 0px;     margin-bottom: 10px;">
			<!-- left section start -->
			<div class="left" style="float: left; width: 80%;">
				<div class="upper" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 50%; box-sizing: border-box; border-right: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; box-sizing: border-box; padding: 3px;">
							<label>Trade-In VIN (If Applicable)</label>
							<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
							<label>Residence Address If Different Than Mailing Address</label>
							<textarea name="residence" style="width: 96%; height: 40px; border: 0px;"><?php echo isset($info['residence'])?$info['residence']:'' ?></textarea>
						</div>
					</div>
					
					<div class="right" style="float: left; width: 50%; box-sizing: border-box; padding: 3px;">
						<p style="float: left; width: 100%; margin: 0;">
							<label style="margin-left: 50%;">Month</label>
							<label style="padding: 0 8%;">Day</label>
							<label>YEAR</label>
						</p>
						<div class="form-field" style="float: left; width: 100%;">
							<label style="font-size: 18px;"><b>REG. EXPIRATION:</b></label>
							<input type="text" name="exp_month" value="<?php echo isset($info['exp_month']) ? $info['exp_month'] : ''; ?>" style="width: 17%;">
							<input type="text" name="exp_day" value="<?php echo isset($info['exp_day']) ? $info['exp_day'] : ''; ?>" style="width: 17%;">
							<input type="text" name="exp_year" value="<?php echo isset($info['exp_year']) ? $info['exp_year'] : ''; ?>" style="width: 17%;">
						</div>
						<div class="form-field" style="float: left; width: 100%; margin: 5px 0 10px;">
							<label style="font-size: 18px;"><b>Reg. Sticker Number:</b></label>
							<input type="text" name="stick_month" value="<?php echo isset($info['stick_month']) ? $info['stick_month'] : ''; ?>" style="width: 15%;">
							<input type="text" name="stick_day" value="<?php echo isset($info['stick_day']) ? $info['stick_day'] : ''; ?>" style="width: 15%;">
							<input type="text" name="stick_year" value="<?php echo isset($info['stick_year']) ? $info['stick_year'] : ''; ?>" style="width: 15%;">
						</div>
						
						<p style="font-size: 14px; text-align: center; margin: 0;"><b>IMPORTANT:</b> THERE IS A PENALTY CHARGE<br> FOR FAILING TO RENEW BY THIS DEADLINE.</p>
					</div>
				</div>
				
				<div class="second" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000; box-sizing: border-box; padding: 0 4px; border-bottom: 1px solid #000;">
					<h2 style="float: left; width: 100%; margin: 0; font-size: 15px; text-align: center;"><sup>*</sup><b>ODOMETER DISCLOSURE STATEMENT</b></h2>
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;">FEDERAL AND STATE LAW REQUIRES THE TRANSFEROR (SELLER) OF A VEHICLE TO STATE THE ODOMETER MILEAGE UPON TRANSFER OF OWNERSHIP, ANYONE CONVICTED OF A FRAUDULENT ODOMETER STATEMENT WILL BE SUBJECT TO FINES AND / OR IMPRISONMENT.</p>
					<p style="float: left; width: 100%; margin: 3px 0; font-size: 12px;">I hereby certify that the ODOmeter READING of the vehicle described above is: <input type="text" name="title" value="<?php echo isset($info['title']) ? $info['title'] : ''; ?>" style="width: 25%; border-bottom: 1px solid #000;"> (no tenths) miles and that to the beat of my knowledge stated mileage is (check one of the following):</p>
					
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label style="vertical-align: top;"><b>Mileage Codes</b></label>
						<label style="display: inline-block; width: 20%; vertical-align: top;"><input type="checkbox" name="mileage_check1" <?php echo ($info['mileage_check1'] == "mileage") ? "checked" : ""; ?> value="mileage"/> THE ACTUAL <br> MILEAGE (AM)<sup>*</sup></label>
						<label style="display: inline-block; width: 25%; vertical-align: top;"><input type="checkbox" name="mileage_check2" <?php echo ($info['mileage_check2'] == "mechanical") ? "checked" : ""; ?> value="mechanical"/> MILEAGE IN EXCESS OF <br> MECHANICAL LIMITS (EL)<sup>*</sup></label>
						<label style="display: inline-block; width: 36%; vertical-align: top;"><input type="checkbox" name="mileage_check3" <?php echo ($info['mileage_check3'] == "odometer") ? "checked" : ""; ?> value="odometer"/> <b>WARNING:</b> NOT THE ACTUAL MILEAGE <i>-ODOMETER DISCREPANCY</i> (NM)<sup>*</sup></label>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 33%;">
							<input type="text" name="print_seller" value="<?php echo isset($info['print_seller']) ? $info['print_seller'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Printed Name of seller</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin-left: 4%;">
							X <input type="text" name="sign_seller" value="<?php echo isset($info['sign_seller']) ? $info['sign_seller'] : ''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Signature of Seller</label>
						</div>
						<div class="form-field" style="float: right; width: 20%;">
							<input type="text" name="date_state1" value="<?php echo isset($info['date_state1']) ? $info['date_state1'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Date of Statement</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 33%;">
							<input type="text" name="print_purchaser" value="<?php echo isset($info['print_purchaser']) ? $info['print_purchaser'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Printed Name of Purchaser</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin-left: 4%;">
							X <input type="text" name="sign_purchaser" value="<?php echo isset($info['sign_purchaser']) ? $info['sign_purchaser'] : ''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Signature of Purchaser</label>
						</div>
						<div class="form-field" style="float: right; width: 20%;">
							<input type="text" name="date_state2" value="<?php echo isset($info['date_state2']) ? $info['date_state2'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Date of Statement</label>
						</div>
					</div>
				</div>
				
				
				<div class="third" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;">
					<p style="float: left; width: 100%; margin: 0; font-size: 12px;"><b>NOTICE : Payment of the registration fee and acceptance of the application by the Motor Vehicle Division constitutes an affirmation that the applicant for title and registration has complied with the requirements of the Mandatory Financial Responsibility Act, NMSA 1978 $66-5-201 through 66-5-239.</p>
					<p style="float: left; width: 100%; margin: 2px 0; font-size: 12px;">APPLICANT CERTIFICATION: I (We) hereby certify that the information given herein is true and correct to the best of my /(our) knowledge and affirm that I (we) have complied with the requirements of the Mandatory Financial Responsibility Act with respect to this vehicle. See reverse side.</b></p>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 33%;">
							<input type="text" name="printed_name" value="<?php echo isset($info['printed_name']) ? $info['printed_name'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Printed Name of 1st Registered Owner</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin-left: 4%;">
							X <input type="text" name="sign_1st" value="<?php echo isset($info['sign_1st']) ? $info['sign_1st'] : ''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Signature of 1st Registered Owner</label>
						</div>
						<div class="form-field" style="float: right; width: 20%;">
							<input type="text" name="date_state3" value="<?php echo isset($info['date_state3']) ? $info['date_state3'] : ''; ?>" style="width: 90%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Date of Statement</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 33%;">
							<input type="text" name="printed_2nd" value="<?php echo isset($info['printed_2nd']) ? $info['printed_2nd'] : ''; ?>" style="float: left; width: 100%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Printed Name of 2nd Registered Owner</label>
						</div>
						<div class="form-field" style="float: left; width: 40%; margin-left: 4%;">
							X <input type="text" name="sign_2nd" value="<?php echo isset($info['sign_2nd']) ? $info['sign_2nd'] : ''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Signature of 2nd Registered Owner</label>
						</div>
						<div class="form-field" style="float: right; width: 20%;">
							<input type="text" name="date_state4" value="<?php echo isset($info['date_state4']) ? $info['date_state4'] : ''; ?>" style="width: 80%; border-bottom: 1px solid #000;">
							<label style="font-size: 12px;">Date of Statement</label>
						</div>
					</div>
				</div>
				
				<p style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; font-size: 11px; padding: 3px; box-sizing: border-box;"><i>The Division is not responsible for false or fraudulent statements the applicant/registered owner makes in connection with this application, nor is the Division liable for lien recording errors. The registered owner must notify the Division of any errors contained in the title and registration issued pursuant to this application.</i></p>
				
				<div class="last" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 3px;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>NCIC Check by</label>
						<input type="text" name="ncic_check" value="<?php echo isset($info['ncic_check']) ? $info['ncic_check'] : ''; ?>" style="width: 87%; border-bottom: 1px solid #000;">
					</div>
					<div class="row" style="float: left; width: 100%; margin: 0;">
						<div class="form-field" style="float: left; width: 70%;">
							<label><i>ACCEPTED BY:</i> Signature of M.V.D Employer</label>
							<input type="text" name="accepted_by" value="<?php echo isset($info['accepted_by']) ? $info['accepted_by'] : ''; ?>" style="width: 50%; border-bottom: 1px solid #000;">
						</div>
						<div class="form-field" style="float: left; width: 30%;">
							<label>Date:</label>
							<input type="text" name="accepted_date" value="<?php echo isset($info['accepted_date']) ? $info['accepted_date'] : ''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
						</div>
					</div>
				</div>
			</div>
			
			<div class="right cal_section" style="float: left; width: 20%; box-sizing: border-box;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td style="width: 5%; background-color: #000;">&nbsp;</td>
						<td style="width: 15%;">
							<label>Cleared By:</label>
							<input type="text" name="cleared_by" value="<?php echo isset($info['cleared_by']) ? $info['cleared_by'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="sale_id" value="<?php echo isset($info['sale_id']) ? $info['sale_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Sale Price:</label>
							<input type="text" class="price" id="sale_price" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="trade_id" value="<?php echo isset($info['trade_id']) ? $info['trade_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Less Trade-In:</label>
							<input type="text" class="price" id="trade_value" name="trade_value" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="net_id" value="<?php echo isset($info['net_id']) ? $info['net_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Net Difference:</label>
							<input type="text" class="price" id="net_diff" name="net_diff" value="<?php echo isset($info['net_diff']) ? $info['net_diff'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="excise_id" value="<?php echo isset($info['excise_id']) ? $info['excise_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Net Excise Tax:</label>
							<input type="text" class="price" id="excise_tax" name="excise_tax" value="<?php echo isset($info['excise_tax']) ? $info['excise_tax'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="regist_id" value="<?php echo isset($info['regist_id']) ? $info['regist_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Registration:</label>
							<input type="text" class="price" id="regist" name="regist" value="<?php echo isset($info['regist']) ? $info['regist'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="late_id" value="<?php echo isset($info['late_id']) ? $info['late_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Late Reg. Penalty:</label>
							<input type="text" class="price" id="penalty" name="penalty" value="<?php echo isset($info['penalty']) ? $info['penalty'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="vets_id" value="<?php echo isset($info['vets_id']) ? $info['vets_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Vets. Allowance:</label>
							<input type="text" class="price" id="allowance" name="allowance" value="<?php echo isset($info['allowance']) ? $info['allowance'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="regis_id" value="<?php echo isset($info['regis_id']) ? $info['regis_id'] : ''; ?>"  style="width: 100%;"></td>
						<td>
							<label>Net Registration:</label>
							<input type="text" class="price" id="regis" name="regis" value="<?php echo isset($info['regis']) ? $info['regis'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="spec_id" value="<?php echo isset($info['spec_id']) ? $info['spec_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Spec. Plate Fee:</label>
							<input type="text" class="price" id="plate_fee" name="plate_fee" value="<?php echo isset($info['plate_fee']) ? $info['plate_fee'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="admin_id" value="<?php echo isset($info['admin_id']) ? $info['admin_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Admin. Fee:</label>
							<input type="text" class="price" id="admin_fee" name="admin_fee" value="<?php echo isset($info['admin_fee']) ? $info['admin_fee'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="transaction_id" value="<?php echo isset($info['transaction_id']) ? $info['transaction_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Transaction Fee:</label>
							<input type="text" class="price" id="trans_fee" name="trans_fee" value="<?php echo isset($info['trans_fee']) ? $info['trans_fee'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="transfer_id" value="<?php echo isset($info['transfer_id']) ? $info['transfer_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Late Transfer Fee:</label>
							<input type="text" class="price" id="transfer_fee" name="transfer_fee" value="<?php echo isset($info['transfer_fee']) ? $info['transfer_fee'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr>
						<td><input type="text" name="duplicate_id" value="<?php echo isset($info['duplicate_id']) ? $info['duplicate_id'] : ''; ?>" style="width: 100%;"></td>
						<td>
							<label>Duplicate Title Fee:</label>
							<input type="text" class="price" id="duplicate_fee" name="duplicate_fee" value="<?php echo isset($info['duplicate_fee']) ? $info['duplicate_fee'] : ''; ?>" style="width: 100%;">
						</td>
					</tr>
					<tr class="total_section" style="height: 70px;">
						<td colspan="2" style="border-bottom: 0px;">
							<label style="font-size: 18px; display: block; text-align: left;"><b>TOTAL FEES:</b></label>
							$<input type="text" class="price" id="total_fee" name="total_fee" value="<?php echo isset($info['total_fee']) ? $info['total_fee'] : ''; ?>" style="width: 90%;"></td>
					</tr>
				</table>
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

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});

		var sale_price = isNaN(parseFloat( $('#sale_price').val()))?0.00:parseFloat($('#sale_price').val());
		var trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat($('#trade_value').val());
		var net_diff = sale_price - trade_value;
		$("#net_diff").val(net_diff.toFixed(2));
		var excise_tax = isNaN(parseFloat( $('#excise_tax').val()))?0.00:parseFloat($('#excise_tax').val());
		var regist = isNaN(parseFloat( $('#regist').val()))?0.00:parseFloat($('#regist').val());
		var penalty = isNaN(parseFloat( $('#penalty').val()))?0.00:parseFloat($('#penalty').val());
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat($('#allowance').val());
		var regis = isNaN(parseFloat( $('#regis').val()))?0.00:parseFloat($('#regis').val());
		var plate_fee = isNaN(parseFloat( $('#plate_fee').val()))?0.00:parseFloat($('#plate_fee').val());
		var admin_fee = isNaN(parseFloat( $('#admin_fee').val()))?0.00:parseFloat($('#admin_fee').val());
		var trans_fee = isNaN(parseFloat( $('#trans_fee').val()))?0.00:parseFloat($('#trans_fee').val());
		var transfer_fee = isNaN(parseFloat( $('#transfer_fee').val()))?0.00:parseFloat($('#transfer_fee').val());
		var duplicate_fee = isNaN(parseFloat( $('#duplicate_fee').val()))?0.00:parseFloat($('#duplicate_fee').val());
		var total_fee = net_diff + excise_tax + regist + penalty + allowance + regis + plate_fee + admin_fee + trans_fee + transfer_fee + duplicate_fee;
		$("#total_fee").val(total_fee.toFixed(2));

	function calculate_totalprice() {
		
		var sale_price = isNaN(parseFloat( $('#sale_price').val()))?0.00:parseFloat($('#sale_price').val());
		var trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat($('#trade_value').val());
		var net_diff = sale_price - trade_value;
		$("#net_diff").val(net_diff.toFixed(2));
		var excise_tax = isNaN(parseFloat( $('#excise_tax').val()))?0.00:parseFloat($('#excise_tax').val());
		var regist = isNaN(parseFloat( $('#regist').val()))?0.00:parseFloat($('#regist').val());
		var penalty = isNaN(parseFloat( $('#penalty').val()))?0.00:parseFloat($('#penalty').val());
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat($('#allowance').val());
		var regis = isNaN(parseFloat( $('#regis').val()))?0.00:parseFloat($('#regis').val());
		var plate_fee = isNaN(parseFloat( $('#plate_fee').val()))?0.00:parseFloat($('#plate_fee').val());
		var admin_fee = isNaN(parseFloat( $('#admin_fee').val()))?0.00:parseFloat($('#admin_fee').val());
		var trans_fee = isNaN(parseFloat( $('#trans_fee').val()))?0.00:parseFloat($('#trans_fee').val());
		var transfer_fee = isNaN(parseFloat( $('#transfer_fee').val()))?0.00:parseFloat($('#transfer_fee').val());
		var duplicate_fee = isNaN(parseFloat( $('#duplicate_fee').val()))?0.00:parseFloat($('#duplicate_fee').val());
		var total_fee = net_diff + excise_tax + regist + penalty + allowance + regis + plate_fee + admin_fee + trans_fee + transfer_fee + duplicate_fee;
		$("#total_fee").val(total_fee.toFixed(2));
	}
	//calculate();
});
	
</script>
</div>
