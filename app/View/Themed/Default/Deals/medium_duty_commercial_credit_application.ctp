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
	label{font-size: 14px; margin-bottom: 0; font-weight: normal;}
	.wraper.main input {padding: 0px;}
	table{border-right: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 4px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.banner {color: #fff !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="width: 200px; margin: 20px auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; margin: 10px 0; font-size: 18px; text-align: center;"><b>Medium Duty Commercial Credit Application</b></h2>
		
		<div class="section" style="float: left; width: 100%; margin: 7px 0; border-top: 2px solid #000;position: relative;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<img style="margin: -4px 0px 0px;" src="<?php echo ('/app/webroot/img/black.png'); ?>"><h3 class="banner" style="color: #fff; float: left; margin: -95px 0 0; padding: 7px 0; text-align: center; transform: rotate(270deg); width: 149px; position: absolute; left: -58px; font-size: 16px;">Customer</h3>
				<div class="right" style="float: right; width: 94%;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 60%; float: left;">
							<label>Company/Owner Name</label>
							<input type="text" name="cust_name" value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 70%">
						</div>
						<div class="form-field" style="width: 40%; float: left;">
							<label>Tradestyle/DBA</label>
							<input type="text" name="tradestyle" value="<?php echo isset($info['tradestyle'])?$info['tradestyle']:''; ?>" style="width: 70%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Business Address</label>
							<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 75%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>City</label>
							<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 83%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>State</label>
							<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 83%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Garage Address</label>
							<input type="text" name="garage_address" value="<?php echo isset($info['garage_address'])?$info['garage_address']:''; ?>" style="width: 75%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>City</label>
							<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 83%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>State</label>
							<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 83%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Phone Number</label>
							<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 78%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label>Federal Tax ID/ Social Security #</label>
							<input type="text" name="security" value="<?php echo isset($info['security'])?$info['security']:''; ?>" style="width: 55%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Phone Number</label>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="corporation" <?php echo ($info['phone_status'] == "corporation") ? "checked" : ""; ?> /> Corporation</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="partner" <?php echo ($info['phone_status'] == "partner") ? "checked" : ""; ?> /> Partnership</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="sole" <?php echo ($info['phone_status'] == "sole") ? "checked" : ""; ?> /> Sole Proprietor</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="corp" <?php echo ($info['phone_status'] == "corp") ? "checked" : ""; ?> /> S-Corp</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="llc" <?php echo ($info['phone_status'] == "llc") ? "checked" : ""; ?> /> LLC</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="profit" <?php echo ($info['phone_status'] == "profit") ? "checked" : ""; ?> /> Non-Profit</span>
							<span style="margin: 1%;"> <input type="checkbox" name="phone_status" value="govern" <?php echo ($info['phone_status'] == "govern") ? "checked" : ""; ?> /> Government</span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 25%; float: left;">
							<label>State of Formation</label>
							<input type="text" name="formation" value="<?php echo isset($info['formation'])?$info['formation']:''; ?>" style="width: 48%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>Date Established</label>
							<input type="text" name="establish" value="<?php echo isset($info['establish'])?$info['establish']:''; ?>" style="width: 51%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>Date of Birth</label>
							<input type="text" name="birth_date" value="<?php echo isset($info['birth_date'])?$info['birth_date']:''; ?>" style="width: 61%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>Titling State</label>
							<input type="text" name="title_state" value="<?php echo isset($info['title_state'])?$info['title_state']:''; ?>" style="width: 65%">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 43%; float: left;">
							<label>Primary Business Vocation</label>
							<input type="text" name="primary" value="<?php echo isset($info['primary'])?$info['primary']:''; ?>" style="width: 57%">
						</div>
						<div class="form-field" style="width: 23%; float: left;">
							<label># of Medium Duty Trucks</label>
							<input type="text" name="truck" value="<?php echo isset($info['truck'])?$info['truck']:''; ?>" style="width: 24%">
						</div>
						<div class="form-field" style="width: 20%; float: left;">
							<label># of Heavy Duty Trucks</label>
							<input type="text" name="heavy" value="<?php echo isset($info['heavy'])?$info['heavy']:''; ?>" style="width: 19%">
						</div>
						<div class="form-field" style="width: 14%; float: left;">
							<label># of Trailers</label>
							<input type="text" name="trailer" value="<?php echo isset($info['trailer'])?$info['trailer']:''; ?>" style="width: 36%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 50%; float: left;">
							<label>Number of Years as owner operator/ownership</label>
							<input type="text" name="ownership" value="<?php echo isset($info['ownership'])?$info['ownership']:''; ?>" style="width: 36%">
						</div>
						<div class="form-field" style="width: 50%; float: left;">
							<label>Number of years driving experience</label>
							<input type="text" name="driving" value="<?php echo isset($info['driving'])?$info['driving']:''; ?>" style="width: 52%">
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		
		<div class="section" style="float: left; width: 100%; margin: 7px 0; border-top: 2px solid #000;position: relative;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<img style="margin: -4px 0px 0px;" src="<?php echo ('/app/webroot/img/black.png'); ?>"><h3 class="banner" style="color: #fff; float: left; margin: -93px 0 0; padding: 7px 0; text-align: center; transform: rotate(270deg); width: 149px; position: absolute; left: -58px; font-size: 16px;">Guarantor</h3>
				<div class="right" style="float: right; width: 94%;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 40%; float: left;">
							<label>Name</label>
							<input type="text" name="name1" value="<?php echo isset($info['name1'])?$info['name1']:''; ?>" style="width: 87%">
						</div>
						<div class="form-field" style="width: 40%; float: left;">
							<label>Title</label>
							<input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 88%">
						</div>
						<div class="form-field" style="width: 20%; float: left;">
							<label><input type="checkbox" name="per_status1" value="personal" <?php echo ($info['per_status1'] == "personal") ? "checked" : ""; ?> /> Personal</label>
							<label><input type="checkbox" name="per_status1" value="corporate" <?php echo ($info['per_status1'] == "corporate") ? "checked" : ""; ?> /> Corporate</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 45%; float: left;">
							<label>Home Address</label>
							<input type="text" name="address1" value="<?php echo isset($info['address1'])?$info['address1']:''; ?>" style="width: 75%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>City</label>
							<input type="text" name="city1" value="<?php echo isset($info['city1'])?$info['city1']:''; ?>" style="width: 83%">
						</div>
						<div class="form-field" style="width: 15%; float: left;">
							<label>State</label>
							<input type="text" name="state1" value="<?php echo isset($info['state1'])?$info['state1']:''; ?>" style="width: 70%">
						</div>
						<div class="form-field" style="width: 15%; float: left;">
							<label>Zip</label>
							<input type="text" name="zip1" value="<?php echo isset($info['zip1'])?$info['zip1']:''; ?>" style="width: 80%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 25%; float: left;">
							<label>Date of Birth</label>
							<input type="text" name="birth1" value="<?php echo isset($info['birth1'])?$info['birth1']:''; ?>" style="width: 62%">
						</div>
						<div class="form-field" style="width: 45%; float: left;">
							<label>Federal Tax ID/Social Security #</label>
							<input type="text" name="security1" value="<?php echo isset($info['security1'])?$info['security1']:''; ?>" style="width: 51%">
						</div>
						<div class="form-field" style="width: 30%; float: left;">
							<label>Phone</label>
							<input type="text" name="phone1" value="<?php echo isset($info['phone1'])?$info['phone1']:''; ?>" style="width: 83%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Email</label>
							<input type="text" name="email1" value="<?php echo isset($info['email1'])?$info['email1']:''; ?>" style="width: 95%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 40%; float: left;">
							<label>Name</label>
							<input type="text" name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>" style="width: 87%">
						</div>
						<div class="form-field" style="width: 40%; float: left;">
							<label>Title</label>
							<input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width: 88%">
						</div>
						<div class="form-field" style="width: 20%; float: left;">
							<label><input type="checkbox" name="per_status2" value="personal" <?php echo ($info['per_status2'] == "personal") ? "checked" : ""; ?> /> Personal</label>
							<label><input type="checkbox" name="per_status2" value="corporate" <?php echo ($info['per_status2'] == "corporate") ? "checked" : ""; ?> /> Corporate</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 45%; float: left;">
							<label>Home Address</label>
							<input type="text" name="address2" value="<?php echo isset($info['address2'])?$info['address2']:''; ?>" style="width: 75%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>City</label>
							<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width: 83%">
						</div>
						<div class="form-field" style="width: 15%; float: left;">
							<label>State</label>
							<input type="text" name="state2" value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width: 70%">
						</div>
						<div class="form-field" style="width: 15%; float: left;">
							<label>Zip</label>
							<input type="text" name="zip2" value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width: 80%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 25%; float: left;">
							<label>Date of Birth</label>
							<input type="text" name="birth2" value="<?php echo isset($info['birth2'])?$info['birth2']:''; ?>" style="width: 62%">
						</div>
						<div class="form-field" style="width: 45%; float: left;">
							<label>Federal Tax ID/Social Security #</label>
							<input type="text" name="security2" value="<?php echo isset($info['security2'])?$info['security2']:''; ?>" style="width: 51%">
						</div>
						<div class="form-field" style="width: 30%; float: left;">
							<label>Phone</label>
							<input type="text" name="phone2" value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width: 83%">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 100%; float: left;">
							<label>Email</label>
							<input type="text" name="email2" value="<?php echo isset($info['email2'])?$info['email2']:''; ?>" style="width: 95%">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="section" style="float: left; width: 100%; margin: 7px 0; border-top: 2px solid #000;position: relative;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<img style="margin: -4px 0px 0px;" src="<?php echo ('/app/webroot/img/black1.png'); ?>"><h3 class="banner" style="color: #fff; float: left; left: -43px; margin: -76px 0 0; padding: 7px 0; position: absolute; text-align: center; transform: rotate(270deg); width: 118px; font-size: 16px;"> Haul Source </h3>
				<div class="right" style="float: right; width: 94%;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 21%; float: left; margin-right: 1%;">
							<label>Business</label>
							<input type="text" name="business1" value="<?php echo isset($info['business1'])?$info['business1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<label>Material Hauled</label>
							<input type="text" name="material1" value="<?php echo isset($info['material1'])?$info['material1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<label>Start Date</label>
							<input type="text" name="start_date1" value="<?php echo isset($info['start_date1'])?$info['start_date1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<label>Contact Name</label>
							<input type="text" name="contact_name1" value="<?php echo isset($info['contact_name1'])?$info['contact_name1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 12%; float: left; margin-right: 1%;">
							<label>Phone</label>
							<input type="text" name="phone3" value="<?php echo isset($info['phone3'])?$info['phone3']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 11%; float: left; margin-right: 1%;">
							<label>Income (Mo)</label>
							<input type="text" name="income1" value="<?php echo isset($info['income1'])?$info['income1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
						<div class="form-field" style="width: 11%; float: left;">
							<label>Miles/Yr</label>
							<input type="text" name="miles1" value="<?php echo isset($info['miles1'])?$info['miles1']:''; ?>" style="width: 100%; margin: 20px 0;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 21%; float: left; margin-right: 1%;">
							<input type="text" name="business2" value="<?php echo isset($info['business2'])?$info['business2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<input type="text" name="material2" value="<?php echo isset($info['material2'])?$info['material2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<input type="text" name="start_date2" value="<?php echo isset($info['start_date2'])?$info['start_date2']:''; ?>" style="width: 100%; margin-right: 1%; ">
						</div>
						<div class="form-field" style="width: 13%; float: left; margin-right: 1%;">
							<input type="text" name="contact_name2" value="<?php echo isset($info['contact_name2'])?$info['contact_name2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 12%; float: left; margin-right: 1%;">
							<input type="text" name="phone4" value="<?php echo isset($info['phone4'])?$info['phone4']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 11%; float: left; margin-right: 1%;">
							<input type="text" name="income2" value="<?php echo isset($info['income2'])?$info['income2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 11%; float: left;">
							<input type="text" name="miles2" value="<?php echo isset($info['miles2'])?$info['miles2']:''; ?>" style="width: 100%">
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
		<div class="section" style="float: left; width: 100%; margin: 7px 0; border-top: 2px solid #000;position: relative;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<img style="margin: -4px 0px 0px;" src="<?php echo ('/app/webroot/img/black1.png'); ?>"><h3 class="banner" style="color: #fff; float: left; left: -43px; margin: -76px 0 0; padding: 7px 0; position: absolute; text-align: center; transform: rotate(270deg); width: 118px; font-size: 16px;">Financing </h3>
				<div class="right" style="float: right; width: 94%;">
					<p style="float: left; width: 100%; display: block; margin: 3px 0;"><i>Previous financing of trucks, tractors, and trailers only</i></p>
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 21%; float: left; margin-right: 1%;">
							<label>Previous Lender</label>
							<input type="text" name="lender1" value="<?php echo isset($info['lender1'])?$info['lender1']:''; ?>" style="width: 100%; margin: 20px 0 10px;">
						</div>
						<div class="form-field" style="width: 14%; float: left; margin-right: 1%;">
							<label>Acct#</label>
							<input type="text" name="acc1" value="<?php echo isset($info['acc1'])?$info['acc1']:''; ?>" style="width: 100%; margin: 20px 0 10px;">
						</div>
						<div class="form-field" style="width: 19%; float: left; margin-right: 1%;">
							<label>Contact Name</label>
							<input type="text" name="contact_name3" value="<?php echo isset($info['contact_name3'])?$info['contact_name3']:''; ?>" style="width: 100%; margin: 20px 0 10px;">
						</div>
						<div class="form-field" style="width: 17%; float: left; margin-right: 1%;">
							<label>Phone</label>
							<input type="text" name="phone5" value="<?php echo isset($info['phone5'])?$info['phone5']:''; ?>" style="width: 100%; margin: 20px 0 10px;">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<label>City/State/Zip</label>
							<input type="text" name="adress_data1" value="<?php echo isset($info['adress_data1'])?$info['adress_data1']:''; ?>" style="width: 100%; margin: 20px 0 10px;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="width: 21%; float: left; margin-right: 1%;">
							<input type="text" name="lender2" value="<?php echo isset($info['lender2'])?$info['lender2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 14%; float: left; margin-right: 1%;">
							<input type="text" name="acc2" value="<?php echo isset($info['acc2'])?$info['acc2']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 19%; float: left; margin-right: 1%;">
							<input type="text" name="contact_name4" value="<?php echo isset($info['contact_name4'])?$info['contact_name4']:''; ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="width: 17%; float: left; margin-right: 1%;">
							<input type="text" name="phone6" value="<?php echo isset($info['phone6'])?$info['phone6']:''; ?>" style="width: 100%">
						</div>
						<div class="form-field" style="width: 25%; float: left;">
							<input type="text" name="adress_data2" value="<?php echo isset($info['adress_data2'])?$info['adress_data2']:''; ?>" style="width: 100%">
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
		<p style="float: left; width: 100%; border-top: 2px solid #000; padding: 10px 0; margin: 7px 0;">The following authorization(s) shall apply to this application and subsequently for the purposes of update reviews or extension of such credit and for reviewing or collecting
the resulting account. A photo static or facsimile copy of this authorization shall be void as the original.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 49%;">
				<h3 style="margin: 3px 0; font-size: 17px;"><b><i>BUSINESS Credit Information: Authorization for Disclosure</i></b></h3>
				<p style="font-size: 14px; margin: 0;">Applicant hereby authorizes the release of credit information to CTC of VA
from any source including credit bureau reporting agencies and applicant’s
bank. I hereby represent that all of the information contained in this credit
application is true, correct, and complete. Applicant hereby authorizes CTC of
VA to execute and file any UCC financing statements in its name upon approval
of the application.</p>

				<div class="row" style="float: left; width: 100%; margin: 10px 0 3px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>By (Signature) <span style="font-size: 20px;"><b>×</b></span></label>
						<input type="text" name="sign1" value="<?php echo isset($info['sign1'])?$info['sign1']:''; ?>" style="width: 76%; float: right;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>Title</label>
						<input type="text" name="bci_title1" value="<?php echo isset($info['bci_title1'])?$info['bci_title1']:''; ?>" style="width: 92%; float: right;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label>Name</label>
						<input type="text" name="bci_name1" value="<?php echo isset($info['bci_name1'])?$info['bci_name1']:''; ?>" style="width: 80%; float: right;">
					</div>
					
					<div class="form-field" style="float: right; width: 49%;">
						<label>Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; float: right;">
					</div>
				</div>


			</div>
			
			<div class="left" style="float: right; width: 49%;">
				<h3 style="margin: 3px 0; font-size: 17px;"><b><i>Personal Credit Information:Authorization for Disclosure</i></b></h3>
				<p style="font-size: 14px; margin: 0;">By signing below,the undersigned individual("Applicant") who is either a principal of the credit applicant or a personal guarantor of its obligations,provides written instruction to CTC of VA authorization review of his/her personal credit profile from a national credit bureau.A consumer report may be requested in connection with this application and upon request.Applicant will be informed whether or not a consumer report was request,and if such report was requested,provided with the name and address of the consumer reporting agency that furnished the report.</p>

				<div class="row" style="float: left; width: 100%; margin: 10px 0 3px;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>By (Signature) <span style="font-size: 20px;"><b>×</b></span></label>
						<input type="text" name="sign2" value="<?php echo isset($info['sign2'])?$info['sign2']:''; ?>" style="width: 76%; float: right;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label>Name</label>
						<input type="text" name="bci_name2" value="<?php echo isset($info['bci_name2'])?$info['bci_name2']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 80%; float: right;">
					</div>
					
					<div class="form-field" style="float: right; width: 49%;">
						<label>Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; float: right;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 100%;">
						<label>By (Signature) <span style="font-size: 20px;"><b>×</b></span></label>
						<input type="text" name="sign3" value="<?php echo isset($info['sign3'])?$info['sign3']:''; ?>" style="width: 76%; float: right;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label>Name</label>
						<input type="text" name="bci_name3" value="<?php echo isset($info['bci_name3'])?$info['bci_name3']:''; ?>" style="width: 80%; float: right;">
					</div>
					
					<div class="form-field" style="float: right; width: 49%;">
						<label>Date</label>
						<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%; float: right;">
					</div>
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
