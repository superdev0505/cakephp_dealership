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
$expectedt = date('Y-m-d H:i:s');
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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>
		
		body {
			margin: 0 7%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
		}
		.credit_app_form {
			width: 95%; height:25px; margin-top:20px; padding-left:5px;
			border: solid 1px #333; background:#ccc; margin-left:5px;
		}

		.credit_app_form02 {
			width: 90%; height:25px; margin-top:20px; padding-left:5px;
			border: solid 1px #333; background:#ccc; margin-left:5px;
		}

		.credit_app_form2 {
			width: 30%;
			border-bottom: solid 1px #333; margin-left:5px;
			border-top:none; border-left:none; border-right:none;
		}

		.credit_app_form05 {
			width: 48%;
			border-bottom: solid 1px #333; margin-left:5px;
			border-top:none; border-left:none; border-right:none;
		}

		.credit_app_form06 {
			width: 100%;
			border-bottom: solid 1px #333; margin-left:0;
			border-top:none; border-left:none; border-right:none;
		}

		.credit_app_form4 {
			width: 32%; height:25px; padding-left:5px;
			border:solid 1px #333; margin-left:5px;
			background:#ccc;
		}

		.credit_app_form3 {
			 border: solid 2px #000 !important;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    -o-appearance: none;
		    appearance: none;
		    width: 18px;
		    height: 18px; vertical-align:middle;
		    margin-right: 10px;
		}
		
		@media print {	
			.dontprint{
				display:none;
			}
			body { margin:10px 10px; }
			#worksheet_container {width:100%;}
			#worksheet_wraper {width:100%;}
			td {font-size:10px !important;}
		}

	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
					
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td>
						    <img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/cradit-img.png'); ?>" alt="">
				
						    </td>
						  </tr>
						</table>
						  
						  
						  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000; padding-bottom:20px;">
						  <tr>
						    <td style="background:#000; font-size:18px; color:#fff; padding:4px 0; text-align:center;"> Dealer Completes This Section </td>
						  </tr>
						  
						  <tr>
						    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:20%; font-size:12px;"> <input name="dealernumberdata"   value="<?php echo isset($info['dealernumberdata']) ? $info['dealernumberdata'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Dealership Number</strong> </td>
						     <td style="width:25%; font-size:12px;"><input name="dealernamedata"   value="<?php echo isset($info['dealernamedata']) ? $info['dealernamedata'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> Dealership Name </strong></td>
						      <td style="width:20%; font-size:12px;"><input name="salespersondata"   value="<?php echo isset($info['salespersondata']) ? $info['salespersondata'] : $info['sperson']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Salesperson </strong></td>
						       <td style="width:10%; font-size:12px;"><input name="yeardata"   value="<?php echo isset($info['yeardata']) ? $info['yeardata'] : $info['year']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Year </strong></td>
							<td style="width:25%; font-size:12px;"><input name="makedata"   value="<?php echo isset($info['makedata']) ? $info['makedata'] : $info['make']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> Make </strong></td>
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:24%; font-size:12px;"> <input name="modeldata"   value="<?php echo isset($info['modeldata']) ? $info['modeldata'] : $info['model']; ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Model</strong> </td>
						    
						     <td style="width:6%; font-size:12px;"> <input name="modeldata_new"   value="New" <?php echo ($info['condition'] == "New") ? "checked" : ""; ?>  type="checkbox" value="" /> <strong style="margin-left:7px;"> New </strong>
											      <input name="modeldata_used"   value="Used" <?php echo ($info['condition'] == "Used") ? "checked" : ""; ?>  type="checkbox" value="" /> <strong style="margin-left:7px;"> Used </strong></td>
											      
						      <td style="width:30%; font-size:12px;"><input name="secondary_asset"   value="<?php echo isset($info['secondary_asset']) ? $info['secondary_asset'] : $addonVehicles[0]['AddonVehicle']['make']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Secondary Asset (e.g., sidecar, engine, trailer) </strong></td>
						      
						       <td style="width:10%; font-size:12px;"><input name="secondary_assetyear"   value="<?php echo isset($info['secondary_assetyear']) ? $info['secondary_assetyear'] : $addonVehicles[0]['AddonVehicle']['year']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Year </strong></td>
						       
							<td style="width:24%; font-size:12px;"><input name="secondary_assetmodel"   value="<?php echo isset($info['secondary_assetmodel']) ? $info['secondary_assetmodel'] : $addonVehicles[0]['AddonVehicle']['model']; ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> Model </strong></td>
							
							<td style="width:6%; font-size:12px;"><input name="secondary_assetnew"   value="New" <?php echo ($addonVehicles[0]['AddonVehicle']['condition'] == "New") ? "checked" : ""; ?>   type="checkbox" value="" /> <strong style="margin-left:7px;"> New </strong>
											      <input name="secondary_assetused"   value="Used" <?php echo ($addonVehicles[0]['AddonVehicle']['condition'] == "Used") ? "checked" : ""; ?>   type="checkbox" value="" /> <strong style="margin-left:7px;"> Used </strong></td>
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:50%; font-size:12px;"> <input name="applicant_resource"   value="<?php echo isset($info['applicant_resource']) ? $info['applicant_resource'] : $info['source']; ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;"> Applicant Source (e.g., Pre-Qualified, Rider-to-Rider)</strong> </td>
											      
						      <td style="width:50%; font-size:12px;"><input name="additional_resource"   value="<?php echo isset($info['additional_resource']) ? $info['additional_resource'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Additional Source Data (e.g. Pre-Qualified ID#, Seller’s Name) </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						</table>

						<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #333; padding-bottom:20px; margin-top:20px;">

						 <tr>
						    <td style="background:#000; font-size:12px; color:#fff; padding:4px 0; text-align:center;">IMPORTANT: APPLICANT(S) MUST READ THESE DIRECTIONS BEFORE COMPLETING THIS APPLICATION</td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="font-size:14px; padding-top:15px; padding-left:10px;"> 
						    <input name="applicant_yes" value="yes"  <?php echo ($info['applicant_yes'] == "yes") ? "checked" : ""; ?>  type="checkbox" value="" class="credit_app_form3" /> If you are applying for INDIVIDUAL credit in your own name, and you are not relying on the creditworthiness of another person as the basis for repayment of the credit requested,
							Complete the Applicant Information section.</td>
						  </tr>
						</table>

						    </td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:14px; padding-top:15px; padding-left:10px;"> 
						    <input name="applicant_no"   value="no"  <?php echo ($info['applicant_no'] == "no") ? "checked" : ""; ?> type="checkbox" value="" class="credit_app_form3" /> If you are applying for JOINT credit with another person, Complete both Applicant Information and Joint Applicant Information sections.</td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:14px; padding-top:15px; padding-left:10px;"> We intend to apply for joint credit: Applicant X
						    <input name="applicant_x"   value="<?php echo isset($info['applicant_x']) ? $info['applicant_x'] : "" ?>"  type="text" class="credit_app_form2" /> 
						    Joint Applicant X 
						    <input name="joint_applicant_x"   value="<?php echo isset($info['joint_applicant_x']) ? $info['joint_applicant_x'] : "" ?>"  type="text" class="credit_app_form2" /></td>
						  </tr>
						</table>

						   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000; padding-bottom:20px; margin-top:20px;">
						  <tr>
						    <td style="background:#000; font-size:18px; color:#fff; padding:4px 0; padding-left:10px;"> <strong style="font-size:12px;">Applicant Information Applicant(s)</strong> must be at least 18 years old.</td>
						  </tr>
						  
						  <tr>
						    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:7px;">
						  <tr>
						    <td style="width:60%; font-size:12px;"> 
						    <input name="applicant_fullname"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Applicant Full Name (First, Middle, Last) <span style="float:right; padding-right:25px;"> Suffix (e.g. Sr., Jr.) </span></strong> </td>
						     <td style="width:22%; font-size:12px;">
						     <input name="applicant_sno"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> Social Security Number (9 digits) </strong></td>
						      <td style="width:18%; font-size:12px;">
						      <input name="applicant_dob"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Date of Birth (MM/DD/YYYY) </strong></td>
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:7px;">
						  <tr>
						    <td style="width:28%; font-size:12px;"> <input name="primary_gross_income"   value="<?php echo isset($info['primary_gross_income']) ? $info['primary_gross_income'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Primary Gross Income: o Annually o Monthly o Weekly</strong> </td>
						    
											      
						      <td style="width:18%; font-size:12px;"><input name="driver_license"   value="<?php echo isset($info['driver_license']) ? $info['driver_license'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Driver’s License Number/State </strong></td>
						      
						       <td style="width:19%; font-size:12px;"><input name="home_phone_no"   value="<?php echo isset($info['home_phone_no']) ? $info['home_phone_no'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Home Phone Number (w/Area Code) </strong></td>
						       
						       <td style="width:18%; font-size:12px;"><input name="cell_phone_no"   value="<?php echo isset($info['cell_phone_no']) ? $info['cell_phone_no'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Cell Phone Number (w/Area Code) </strong></td>
						       
							<td style="width:17%; font-size:12px;"><input name="emailaddress"   value="<?php echo isset($info['emailaddress']) ? $info['emailaddress'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> E-mail Address </strong></td>
							
							
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						    <td style="width:55%; font-size:12px;"> <input name="currentphysicaladdress"   value="<?php echo isset($info['currentphysicaladdress']) ? $info['currentphysicaladdress'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;"> Current Physical Address Street)</strong> </td>
											      
						      <td style="width:15%; font-size:12px;"><input name="currentphysicaladdress_city"   value="<?php echo isset($info['currentphysicaladdress_city']) ? $info['currentphysicaladdress_city'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> City </strong></td>
						      
						       <td style="width:8%; font-size:12px;"><input name="currentphysicaladdress_state"   value="<?php echo isset($info['currentphysicaladdress_state']) ? $info['currentphysicaladdress_state'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> State </strong></td>
						       
							<td style="width:10%; font-size:12px;"><input name="currentphysicaladdress_zip"   value="<?php echo isset($info['currentphysicaladdress_zip']) ? $info['currentphysicaladdress_zip'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Zip </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
						  <tr>
						  
						      <td style="width:60%; font-size:12px;">
						      <input name="how_long"   value="<?php echo isset($info['how_long']) ? $info['how_long'] : "" ?>"  type="text" class="credit_app_form4" />
						      
						      <strong style="margin-left:5px;"> Own </strong>  
						      <input name="owndata"   value="own" <?php echo ($info['owndata'] == "own") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> 
						      
						      <strong style="margin-left:5px;"> Rent </strong> 
						      
						      <input name="rentdata"   value="rent" <?php echo ($info['rentdata'] == "rent") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> 
						      
						      <strong style="margin-
						left:5px;"> Other </strong>  
						<input name="otherdata"  value="other" <?php echo ($info['otherdata'] == "other") ? "checked" : "" ?>    type="checkbox" value="" class="credit_app_form3" /> 

						<input name="monthly_residence_payment"   value="<?php echo isset($info['monthly_residence_payment']) ? $info['monthly_residence_payment'] : "" ?>"  type="text" class="credit_app_form4" /> 
						      
						      <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:65%;"><strong style="margin-left:5px;">How Long Have You Lived There (Years/Months)</strong></td>
						    <td style="width:30%;"> <strong> Monthly Residence Payment </strong></td>
						    <td style="width:15%;">&nbsp;</td>
						  </tr>
						</table>

						      </td>
						      
						       <td style="width:40%; font-size:12px;"> </td>
						      
						  </tr> 
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						    <td style="width:55%; font-size:12px;"> 
						    <input name="mailaddress"   value="<?php echo isset($info['mailaddress']) ? $info['mailaddress'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;"> Mailing Address 
						    <input name="ifphysicaladdress"   value="yes" <?php echo ($info['ifphysicaladdress'] == "yes") ? "checked" : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> Check box if same as Physical Addres)</strong> <br />
						    <strong style="margin-left:5px; font-size:10px;">Employment Status: 
						    <input name="employmentstatus1"   value="Employed" <?php echo ($info['employmentstatus1'] == "Employed") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" /> Employed 
						    <input name="employmentstatus2"   value="Self Employed" <?php echo ($info['employmentstatus2'] == "Self Employed") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" /> Self Employed 
						    <input name="employmentstatus3"   value="Retired" <?php echo ($info['employmentstatus3'] == "Retired") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> Retired 
						    <input name="employmentstatus4"   value="Unemployed" <?php echo ($info['employmentstatus4'] == "Unemployed") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" /> Unemployed 
						    <input name="employmentstatus5"   value="Dealer Employee" <?php echo ($info['employmentstatus5'] == "Dealer Employee") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" /> Dealer Employee
						    <input name="employmentstatus6"   value="Dealer Principal" <?php echo ($info['employmentstatus6'] == "Dealer Principal") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" /> Dealer Principal</strong>
						     </td>
											      
						      <td style="width:15%; font-size:12px; vertical-align:top;"><input name="employmentstatus_city"   value="<?php echo isset($info['employmentstatus_city']) ? $info['employmentstatus_city'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> City </strong></td>
						      
						       <td style="width:8%; font-size:12px; vertical-align:top;"><input name="employmentstatus_state"   value="<?php echo isset($info['employmentstatus_state']) ? $info['employmentstatus_state'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> State </strong></td>
						       
							<td style="width:10%; font-size:12px; vertical-align:top;"><input name="employmentstatus_zip"   value="<?php echo isset($info['employmentstatus_zip']) ? $info['employmentstatus_zip'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Zip </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:65%; font-size:12px; vertical-align:top; margin-left:5px;">
						     <input name="employment_name"   value="<?php echo isset($info['employment_name']) ? $info['employment_name'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Employer Name </strong></td>
						      
							<td style="width:35%; font-size:12px; vertical-align:top;">
							<input name="employment_jobtitle"   value="<?php echo isset($info['employment_jobtitle']) ? $info['employment_jobtitle'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Job Title </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:22%; font-size:12px; vertical-align:top; margin-left:5px;"><input name="employment_city"   value="<?php echo isset($info['employment_city']) ? $info['employment_city'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Employment City </strong></td>
						     
						     <td style="width:10%; font-size:12px; vertical-align:top; margin-left:5px;"><input name="employment_state"   value="<?php echo isset($info['employment_state']) ? $info['employment_state'] : "" ?>"  type="text" class="credit_app_form02" /><strong style="margin-left:5px;"> Employment State </strong></td>
						     
						     <td style="width:20%; font-size:12px; vertical-align:top; margin-left:5px;"><input name="employment_phoneno"   value="<?php echo isset($info['employment_phoneno']) ? $info['employment_phoneno'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Business Phone Number (w/Area Code) Ext. </strong></td>
						     
						     <td style="width:15%; font-size:12px; vertical-align:top; margin-left:5px;"><input name="employment_yearmonth"   value="<?php echo isset($info['employment_yearmonth']) ? $info['employment_yearmonth'] : "" ?>"  type="text" class="credit_app_form02" /><strong style="margin-left:5px;"> Years/Months There </strong></td>
						      
							<td style="width:33%; font-size:12px; vertical-align:top;">
							<input name="testingdata"   value="<?php echo isset($info['testingdata']) ? $info['testingdata'] : "" ?>"  type="text" class="credit_app_form" />
							<strong style="margin-left:5px;">  
							Other Income*:<input name="otherincomedata"   value="" <?php echo ($info['otherincomedata'] == "Other Income") ? "checked" : "" ?>  type="checkbox" value="Other Income" class="credit_app_form3" />
							Annually <input name="annuallydata"   value="" <?php echo ($info['annuallydata'] == "Annually") ? "checked" : "" ?>  type="checkbox" value="Annually" class="credit_app_form3" /> 
							Monthly <input name="monthlydata"   value="" <?php echo ($info['monthlydata'] == "Monthly") ? "checked" : "" ?>  type="checkbox" value="Monthly" class="credit_app_form3" /> 
							Weekly <input name="weeklydata"   value="" <?php echo ($info['weeklydata'] == "Weekly") ? "checked" : "" ?>  type="checkbox" value="Weekly" class="credit_app_form3" />
							
							</strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:100%; font-size:12px; vertical-align:top; margin-left:5px;">* Alimony, Child Support, and/or Separate Maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation. Include all readily accessible income earned by you: salary and hourly wages, overtime,
						bonuses, commissions, self-employment, social security, retirement pay, public assistance, disability, pension, interest, dividends, or rental income.</td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						</table>
						   
						  
						  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000; padding-bottom:20px; margin-top:20px;">
						  <tr>
						    <td style="background:#000; font-size:18px; color:#fff; padding:4px 0; padding-left:10px;"> <strong style="font-size:22px;">Joint Applicant Information</strong> must be at least 18 years old.</td>
						  </tr>
						  
						  <tr>
						    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:7px;">
						  <tr>
						    <td style="width:60%; font-size:12px;">
						    <input name="joint_firstname"   value="<?php echo isset($info['joint_firstname']) ? $info['joint_firstname'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Applicant Full Name (First, Middle, Last) <span style="float:right; padding-right:25px;"> Suffix (e.g. Sr., Jr.) </span></strong> </td>
						     <td style="width:22%; font-size:12px;">
						     <input name="joint_sno"   value="<?php echo isset($info['joint_sno']) ? $info['joint_sno'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> Social Security Number (9 digits) </strong></td>
						      <td style="width:18%; font-size:12px;">
						      <input name="joint_dob"   value="<?php echo isset($info['joint_dob']) ? $info['joint_dob'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Date of Birth (MM/DD/YYYY) </strong></td>
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:7px;">
						  <tr>
						    <td style="width:28%; font-size:12px;"> 
						    <input name="jointprimary_gross_income"   value="<?php echo isset($info['jointprimary_gross_income']) ? $info['jointprimary_gross_income'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;">Primary Gross Income: o Annually o Monthly o Weekly</strong> </td>
						    
											      
						      <td style="width:18%; font-size:12px;">
						      <input name="joint_driverlicense"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Driver’s License Number/State </strong></td>
						      
						       <td style="width:19%; font-size:12px;">
						       <input name="joint_homephone"   value="<?php echo isset($info['joint_homephone']) ? $info['joint_homephone'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Home Phone Number (w/Area Code) </strong></td>
						       
						       <td style="width:18%; font-size:12px;">
						       <input name="joint_cell"   value="<?php echo isset($info['joint_cell']) ? $info['joint_cell'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Cell Phone Number (w/Area Code) </strong></td>
						       
							<td style="width:17%; font-size:12px;">
							<input name="joint_email"   value="<?php echo isset($info['joint_email']) ? $info['joint_email'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:7px;"> E-mail Address </strong></td>
							
							
						  </tr>
						</table>
						</td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						    <td style="width:55%; font-size:12px;">
						    <input name="joint_caddress"   value="<?php echo isset($info['joint_caddress']) ? $info['joint_caddress'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="margin-left:5px;"> Current Physical Address Street)</strong> </td>
											      
						      <td style="width:15%; font-size:12px;">
						      <input name="joint_city"   value="<?php echo isset($info['joint_city']) ? $info['joint_city'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> City </strong></td>
						      
						       <td style="width:8%; font-size:12px;">
						       <input name="joint_state"   value="<?php echo isset($info['joint_state']) ? $info['joint_state'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> State </strong></td>
						       
							<td style="width:10%; font-size:12px;">
							<input name="joint_zip"   value="<?php echo isset($info['joint_zip']) ? $info['joint_zip'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Zip </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
						  <tr>
						  
						      <td style="width:60%; font-size:12px;">
						      <input name="joint_howlong"   value="<?php echo isset($info['joint_howlong']) ? $info['joint_howlong'] : "" ?>"  type="text" class="credit_app_form4" />
						      <strong style="margin-left:5px;"> Own </strong>  
						      <input name="joint_own"   value="own" <?php echo ($info['joint_own'] == "own") ? "checked" : "" ?> type="checkbox" value="" class="credit_app_form3" /> 
						      
						      <strong style="margin-left:5px;"> Rent </strong> 
						      <input name="joint_rent"    value="rent" <?php echo ($info['joint_rent'] == "rent") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> 
						      
						      <strong style="margin-
						left:5px;"> Other </strong>  
						<input name="joint_other"    value="jointother" <?php echo ($info['joint_other'] == "jointother") ? "checked" : "" ?>   type="checkbox" value="" class="credit_app_form3" />  <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form4" /> 
						      
						      <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:65%;"><strong style="margin-left:5px;">How Long Have You Lived There (Years/Months)</strong></td>
						    <td style="width:30%;"> <strong> Monthly Residence Payment </strong></td>
						    <td style="width:15%;">&nbsp;</td>
						  </tr>
						</table>

						      </td>
						      
						       <td style="width:40%; font-size:12px;"> </td>
						      
						  </tr> 
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						    <td style="width:55%; font-size:12px;"> <input name="joint_monthlypayment"   value="<?php echo isset($info['joint_monthlypayment']) ? $info['joint_monthlypayment'] : "" ?>"  type="text" class="credit_app_form" /> 
						    
						    <strong style="margin-left:5px;"> Mailing Address <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> Check box if same as Physical Addres)</strong> <br />
						    <strong style="margin-left:5px; font-size:10px;">Employment Status:

						    <input name="joint_estatus1"   value="Employed" <?php echo ($info['joint_estatus1'] == "Employed") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> Employed 
						    <input name="joint_estatus2"   value="Self Employed" <?php echo ($info['joint_estatus2'] == "Self Employed") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> Self Employed
						    <input name="joint_estatus3"   value="Retired" <?php echo ($info['joint_estatus3'] == "Retired") ? "checked" : "" ?> type="checkbox" value="" class="credit_app_form3" /> Retired 
						    <input name="joint_estatus4"   value="Unemployed" <?php echo ($info['joint_estatus4'] == "Unemployed") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> Unemployed 
						    <input name="joint_estatus5"   value="Dealer Employee" <?php echo ($info['joint_estatus5'] == "Dealer Employee") ? "checked" : "" ?>  type="checkbox" value="" class="credit_app_form3" /> Dealer Employee 
						    <input name="joint_estatus6"   value="Dealer Principal" <?php echo ($info['joint_estatus6'] == "Dealer Principal") ? "checked" : "" ?> type="checkbox" value="" class="credit_app_form3" /> Dealer Principal</strong>
						     </td>
											      
						      <td style="width:15%; font-size:12px; vertical-align:top;"><input name="joint_empcity"   value="<?php echo isset($info['joint_empcity']) ? $info['joint_empcity'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> City </strong></td>
						      
						       <td style="width:8%; font-size:12px; vertical-align:top;"><input name="joint_empstate"   value="<?php echo isset($info['joint_empstate']) ? $info['joint_empstate'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> State </strong></td>
						       
							<td style="width:10%; font-size:12px; vertical-align:top;"><input name="joint_empzip"   value="<?php echo isset($info['joint_empzip']) ? $info['joint_empzip'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Zip </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:65%; font-size:12px; vertical-align:top; margin-left:5px;">
						     
						     <input name="joint_empname"   value="<?php echo isset($info['joint_empname']) ? $info['joint_empname'] : "" ?>"  type="text" class="credit_app_form" />
						     
						     <strong style="margin-left:5px;"> Employer Name </strong></td>
						      
							<td style="width:35%; font-size:12px; vertical-align:top;">
							<input name="joint_jobtitle"   value="<?php echo isset($info['joint_jobtitle']) ? $info['joint_jobtitle'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Job Title </strong></td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:22%; font-size:12px; vertical-align:top; margin-left:5px;">
						     <input name="joint_employmentcity"   value="<?php echo isset($info['joint_employmentcity']) ? $info['joint_employmentcity'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Employment City </strong></td>
						     
						     <td style="width:10%; font-size:12px; vertical-align:top; margin-left:5px;">
						     <input name="joint_employmentstate"   value="<?php echo isset($info['joint_employmentstate']) ? $info['joint_employmentstate'] : "" ?>"  type="text" class="credit_app_form02" /><strong style="margin-left:5px;"> Employment State </strong></td>
						     
						     <td style="width:20%; font-size:12px; vertical-align:top; margin-left:5px;">
						     <input name="joint_employmentphoneno"   value="<?php echo isset($info['joint_employmentphoneno']) ? $info['joint_employmentphoneno'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;"> Business Phone Number (w/Area Code) Ext. </strong></td>
						     
						     <td style="width:15%; font-size:12px; vertical-align:top; margin-left:5px;">
						     <input name="joint_employmentyear"   value="<?php echo isset($info['joint_employmentyear']) ? $info['joint_employmentyear'] : "" ?>"  type="text" class="credit_app_form02" /><strong style="margin-left:5px;"> Years/Months There </strong></td>
						      
							<td style="width:33%; font-size:12px; vertical-align:top;">
							<input name="joint_employmentother"   value="<?php echo isset($info['joint_employmentother']) ? $info['joint_employmentother'] : "" ?>"  type="text" class="credit_app_form" /><strong style="margin-left:5px;">  Other Income*:
							
							<input name="joint_annually"   value="<?php echo isset($info['joint_annually']) ? $info['joint_annually'] : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> Annually 
							<input name="joint_monthly"   value="<?php echo isset($info['joint_monthly']) ? $info['joint_monthly'] : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> Monthly 
							<input name="joint_weekly"   value="<?php echo isset($info['joint_weekly']) ? $info['joint_weekly'] : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> Weekly
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:9px;">
						  <tr>
						     <td style="width:100%; font-size:12px; vertical-align:top; margin-left:5px;">* Alimony, Child Support, and/or Separate Maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation. Include all readily accessible income earned by you: salary and hourly wages, overtime,
						bonuses, commissions, self-employment, social security, retirement pay, public assistance, disability, pension, interest, dividends, or rental income.</td>
						      
						  </tr>
						</table>
						    </td>
						  </tr>
						  
						</table> 
						   
						   
						   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
						  <tr>
						    <td style=" background:#000; font-size:22px; padding:4px 0 4px 10px; color:#fff; font-weight:600;"> References </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:40%;"><input name="refer1_name"   value="<?php echo isset($info['refer1_name']) ? $info['refer1_name'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Name</strong></td>
						    <td style=" width:25%;"> <input name="refer1_phone"   value="<?php echo isset($info['refer1_phone']) ? $info['refer1_phone'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Phone Number (w/Area Code)</strong> </td>
						    <td style=" width:25%;"> <input name="refer1_city"   value="<?php echo isset($info['refer1_city']) ? $info['refer1_city'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">City</strong> </td>
						    <td style=" width:10%;"> <input name="refer1_state"   value="<?php echo isset($info['refer1_state']) ? $info['refer1_state'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">State</strong> </td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:40%;"><input name="refer2_name"   value="<?php echo isset($info['refer2_name']) ? $info['refer2_name'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Name</strong></td>
						    <td style=" width:25%;"> <input name="refer2_phone"   value="<?php echo isset($info['refer2_phone']) ? $info['refer2_phone'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Phone Number (w/Area Code)</strong> </td>
						    <td style=" width:25%;"> <input name="refer2_city"   value="<?php echo isset($info['refer2_city']) ? $info['refer2_city'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">City</strong> </td>
						    <td style=" width:10%;"> <input name="refer2_state"   value="<?php echo isset($info['refer2_state']) ? $info['refer2_state'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">State</strong> </td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <tr>
						    <td style="width:40%;"><input name="refer3_name"   value="<?php echo isset($info['refer3_name']) ? $info['refer3_name'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Name</strong></td>
						    <td style=" width:25%;"> <input name="refer3_phone"   value="<?php echo isset($info['refer3_phone']) ? $info['refer3_phone'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Phone Number (w/Area Code)</strong> </td>
						    <td style=" width:25%;"> <input name="refer3_city"   value="<?php echo isset($info['refer3_city']) ? $info['refer3_city'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">City</strong> </td>
						    <td style=" width:10%;"> <input name="refer3_state"   value="<?php echo isset($info['refer3_state']) ? $info['refer3_state'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">State</strong> </td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <tr>
						    <td style="width:40%;"><input name="refer4_name"   value="<?php echo isset($info['refer4_name']) ? $info['refer4_name'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Name</strong></td>
						    <td style=" width:25%;"> <input name="refer4_phone"   value="<?php echo isset($info['refer4_phone']) ? $info['refer4_phone'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">Phone Number (w/Area Code)</strong> </td>
						    <td style=" width:25%;"> <input name="refer4_city"   value="<?php echo isset($info['refer4_city']) ? $info['refer4_city'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">City</strong> </td>
						    <td style=" width:10%;"> <input name="refer4_state"   value="<?php echo isset($info['refer4_state']) ? $info['refer4_state'] : "" ?>"  type="text" class="credit_app_form" /> <strong style="font-size:12px; margin-left:5px;">State</strong> </td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:100%; text-align:center; padding:10px 0 15px 0;"> <strong style="font-size:12px; margin-left:5px;">NOTICE TO APPLICANT(S)</strong></td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"> This Credit Application–Customer Statement will be submitted to Eaglemark Savings Bank, and its successors and assigns, at P.O. Box 22048, Carson City, Nevada 89721, for consideration of
						whether it meets the credit requirements of Eaglemark Savings Bank, and its successors and assigns.</td>
						  </tr>
						</table>

						    
						    </td>
						  </tr>
						  
						  <tr>
						    <td> 
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"> Applicant will be required to obtain and pay for vehicle insurance covering the collateral for the full term of the loan, for liability and physical damage for both collision and comprehensive
						losses to include such perils as FIRE, THEFT, and VANDALISM. Eaglemark Savings Bank, and its successors and assigns, must be listed as a LOSS PAYEE AND ADDITIONAL INSURED. Applicant
						will provide verification in the form of a certificate of insurance through an acceptable carrier with thirty (30) days notice of any intent to cancel or non-renew to be provided by the issuing
						carrier to the applicant and loss payee. YOU MAY CHOOSE THE PERSON THROUGH WHOM ANY INSURANCE IS OBTAINED..</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"> <strong>NOTICE TO CALIFORNIA RESIDENTS:</strong> Regardless of your marital status, you may apply for credit in your name alone..</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"> <strong>NOTICE TO MAINE RESIDENTS:</strong> Consumer reports (credit reports) may be requested in connection with this application. Upon request, you will be informed whether or not a consumer report
						was requested and, if it was, of the name and address of the consumer reporting agency that furnished the report..</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"><strong> NOTICE TO NEW YORK RESIDENTS:</strong> Consumer reports may be requested in connection with the processing of your application and any resulting account. Upon request, we will inform you of
						the names and addresses of any consumer reporting agencies that have provided us with such reports.</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"><strong>NOTICE TO OHIO RESIDENTS:</strong> Ohio laws against discrimination require that all creditors make credit equally available to all creditworthy customers, and that credit reporting agencies maintain
						separate credit histories on each individual upon request. The Ohio Civil Rights Commission administers compliance with this law.</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"><strong> NOTICE TO RHODE ISLAND RESIDENTS:</strong> Consumer reports may be requested in connection with this application..</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"><strong>NOTICE TO VERMONT RESIDENTS: </strong>The creditor may obtain credit reports about you on an ongoing basis in connection with this extension of credit transaction for any one or more of the
						following reasons: (1) reviewing the account; (2) taking collection action on the account; or (3) any other legitimate purposes associated with the account..</td>
						  </tr>
						  
						   <tr>
						    <td style="width:100%; padding:5px 0 5px 0; font-size:14px;"><strong>NOTICE TO MARRIED WISCONSIN RESIDENTS:</strong> No provision of a marital property agreement, a unilateral statement under Wisconsin Statutes 766.59 or a court decree under Wisconsin
						Statutes 766.70 adversely affects the interest of the creditor unless the creditor, prior to the time the credit is granted, is furnished a copy of the agreement, statement or decree or has actual
						knowledge of the adverse provision when the obligation to the creditor is incurred.
						</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-size:14px; border:solid 1px #333; "><strong>IMPORTANT INFORMATION ABOUT PROCEDURES FOR OPENING A CREDIT ACCOUNT WITH EAGLEMARK SAVINGS BANK –</strong> To help the government fight the funding of terrorism and
						money laundering activities, Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account.
						<strong>What this means for you:</strong> When you open a credit account with Eaglemark Savings Bank, we will ask for your name, address, date of birth, and other information that will allow us to
						identify you. We may also ask to see your driver’s license or other identifying documents.
						</td>
						  </tr>
						  
						 <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-size:14px; border:solid 1px #333;">
						    
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-size:18px;">BY SIGNING BELOW, I ACKNOWLEDGE THAT:</td>
						  </tr>
						  
						   <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I understand that by providing my wireless telephone number(s) and/or email address(es) now or in the future, I consent to the use of recorded/artificial voice messages
						and/or automatic telephone dial devices that may contain my non-public information. My consent covers the use of these contact methods to call or send text to the
						wireless telephone number(s) and to send text or email messages to the email address(es) I provide to you, for which I may incur a charge; and</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I understand that any credit insurance products and GAP (where applicable) are not deposits or other obligations of, or guaranteed or insured by, Eaglemark Savings Bank
						(ESB) or its affiliates. I understand that these products and debt protection are not insured by the Federal Deposit Insurance Corporation (FDIC) or any other agency of the
						United States; and
						</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I understand that I am free to purchase credit insurance products and GAP (where applicable) from another source, and that ESB does not condition credit on whether these
						products are purchased from ESB or its affiliates, and ESB does not require me to agree not to obtain these products from another source; and
						</td>
						  </tr>
						  
						   <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I have read the Notice to Applicant(s) sections, and I agree to the terms and conditions set forth in this Credit Application–Customer Statement, I have received the
						Harley-Davidson Financial Services Privacy Notice; and
						</td>
						  </tr>
						  
						   <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I hereby authorize an investigation of my credit and employment history by ESB, its successors and assigns, and/or certain insurance agents or companies. I understand
						that my credit and employment history obtained in, and in connection with, this Credit Application–Customer Statement will be used in determining my eligibility for
						credit approval by ESB, and its successors and assigns. If approved, ESB, and its successors and assigns, may obtain credit information about me on an ongoing basis in
						connection with this extension of credit transaction for any one or more of the following reasons: (1) reviewing the account; (2) taking collection action on the account; or
						(3) any other legitimate purposes associated with the account; an<br/>
						<input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="checkbox" value="" class="credit_app_form3" /> I have requested a Harley-Davidson Insurance estimate and understand more information may be needed to obtain a quote. I authorize ESB to share my information for these
						purposes. I understand I am under no obligation to purchase insurance from this agency and/or carrier; and
						</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I CONSENT TO THE USE OF MY CREDIT REPORT INFORMATION FOR MARKETING PURPOSES TO OFFER ME OTHER PRODUCTS AND SERVICES INCLUDING H-D™ VISA®; AND
						</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I AUTHORIZE EAGLEMARK SAVINGS BANK TO SHARE MY PERSONAL INFORMATION CONTAINED IN THIS APPLICATION WITH THE DEALER FOR USE BY THE DEALER; AND
						</td>
						  </tr>
						  
						  <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">• I hereby certify that the information I have provided in this Credit Application–Customer Statement is complete and accurate to the best of my knowledge.
						</td>
						  </tr>
						 
						  
						   <tr>
						    <td style="width:100%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;">
						     
						     <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:30%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;"> <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form06" /> Primary Applicant Signature </td>
						     <td style="width:18%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;"> <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form06" /> Date </td>
						       <td style="width:30%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;"> <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form06" /> Joint Applicant Signature </td>
						       <td style="width:18%; padding:5px 10px 5px 10px; font-weight:600; font-size:14px;"> <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form06" /> Date </td>
						  </tr>
						</table>
						 
						</td>
						  </tr>
						 
						</table>

						</td>
						  </tr>  
						  
						</table>


						  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
						  <tr>
						    <td> 
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:50%;">&nbsp;</td>
						    <td style="width:50%;"> 
						      <img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/harle-d.png'); ?>" alt="">
						   </td>
						  </tr>
						</table>

						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <td style="width:15%; background:#000; color:#fff; padding:5px 0; text-align:center; font-size:25px;">FACTS</td>
						    <td style="width:85%; color:#000; padding:5px 10px; font-size:22px; border-bottom:solid 3px #000;">WHAT DOES HARLEY-DAVIDSON FINANCIAL SERVICES, INC.
						DO WITH YOUR PERSONAL INFORMATION?</td>
						  </tr>
						</table>

						    </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; border:solid 1px #000;">
						  <tr>
						    <td style="width:15%; color:#000; padding:5px 0; vertical-align:top; text-align:center; border-right:solid 1px #000; font-size:25px;">Why?</td>
						    <td style="width:85%; color:#000; padding:5px 10px; font-size:16px;">Financial companies choose how they share your personal information. Federal law gives consumers the
						right to limit some but not all sharing. Federal law also requires us to tell you how we collect, share, and
						protect your personal information. Please read this notice carefully to understand what we do.</td>
						  </tr>
						</table>

						    </td>
						    </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; border:solid 1px #000;">
						  <tr>
						    <td style="width:15%; color:#000; padding:5px 0; vertical-align:top; text-align:center; border-right:solid 1px #000; font-size:25px;">What?</td>
						    <td style="width:85%; color:#000; padding:5px 10px; font-size:16px;">The types of personal information we collect and share depend on the product or service you have with us.
						This information can include:
						<br />
						• Social Security number and income<br />
						• Account balances and payment history<br />
						• Credit history and credit scores</td>
						  </tr>
						</table>

						    </td> 
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; border:solid 1px #000;">
						  <tr>
						    <td style="width:15%; color:#000; padding:5px 0; vertical-align:top; text-align:center; border-right:solid 1px #000; font-size:25px;">How?</td>
						    <td style="width:85%; color:#000; padding:5px 10px; font-size:16px;">All financial companies need to share customers’ personal information to run their everyday business.
						In the section below, we list the reason financial companies can share their customers’ personal information;
						the reasons Harley-Davidson Financial Services, Inc. (“HDFS”) chooses to share; and whether you can limit
						this sharing.</td>
						  </tr>
						</table>

						    </td>
						     </tr>
						  
						 </table>

						   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000; margin-top:30px;">
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
						  <tr>
						    <td style="font-size:12px; color:#000; padding:3px 10px; border-bottom:solid 1px #000;"> Mail-in Opt Out Form</td>
						  </tr>
						</table>

						     </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
						  <tr>
						    <td style="font-size:14px; color:#000; padding:10px 10px;"><strong>Mark any/all you want to limit [note:</strong> If you have previously submitted an Opt-Out coupon to HDFS, you do not have to re-submit this Opt-Out coupon again,
						unless you wish to change your existing opt-out preferences.]:</td>
						  </tr>
						</table>

						     </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
						  <tr>
						    <td style="font-size:14px; color:#000; padding:3px 10px;"><input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="radio" value="" />
						     Do not allow your affiliates to use my personal information to market to me.</td>
						  </tr>
						</table>

						     </td>
						  </tr>
						  
						  <tr>
						    <td>
						    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
						  <tr>
						    <td style="font-size:16px; color:#000; padding:3px 10px;"><input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="radio" value="" /> Do not share information about my creditworthiness with your affiliates for their everyday business purposes.</td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:16px; color:#000; padding:3px 10px;">NAME : <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form05" /></td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:16px; color:#000; padding:3px 10px;">Address: <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form05" /></td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:16px; color:#000; padding:3px 10px;">City, State, Zip: <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form05" /></td>
						  </tr>
						  
						  <tr>
						    <td style="font-size:16px; color:#000; padding:3px 10px;">Account # or Policy #: <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="credit_app_form05" /></td>
						  </tr>
						  
						</table>

						     </td>
						  </tr>
						  
						</table>

			</div>
	</div></div>
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
