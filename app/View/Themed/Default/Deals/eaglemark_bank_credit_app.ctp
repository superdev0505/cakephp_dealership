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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{
	border: 1px solid #000;
    height: 30px; box-sizing: border-box;
	}	
	span{font-size:12px;}
	label{font-size: 11px;}
	li{margin-bottom: 2px;}
	ul {margin-left:25px;}
	ul li{list-style-type:disc!important;}
	input[type="radio"] {margin: 0;}
	body {
  -webkit-print-color-adjust: exact!important;
}
@media print { 
.bg-color-text{background-color: #EBECEC;}
.bg-black{background-color: #000 !important; color: #fff !important;}
.dontprint{display: none;}
.sign {
	margin-top: 15px !important;
}
label{font-size: 12px !important;}
body {
  -webkit-print-color-adjust: exact!important;
}
.wraper.main input {
    padding: 0px !important;
}
#worksheet_container{width:1100px!important;; margin:0 auto;}
	input[type="text"]{
		height:20px!important;
	}
	span,label,p,table td{font-size:14px;}
		/* All CSS that we need to modify for print view should be here */
	}
	}
	</style>

	<div class="wraper header"> 
		
		<div class="top-tittle" style="border: 1px solid #000; padding: 2px; float: left; width: 100%;">
			<div class="top-tittle-inner" style="border: 2px solid #000; float: left; width: 100%;box-sizing: border-box;padding: 6px 4px;">
				<div class="left-tittle" style="font-size:39px; float:left;">Eaglemark Savings Bank</div>
				<div class="right-tittle" style="font-size: 30px; float: right; padding: 4px 0; ">Credit Application-Customer Statement </div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="left-data" style="float: left; width: 66%; font-size: 18px; margin: 10px 0 0 0;">
				<strong style="border-right: 1px solid #000; display: inline-block; margin: 0 20px 0 0; padding: 0 27px 0 0;">FAX: (800) 544-1138</strong>
				<strong>Phone: (866) 499-4337</strong>
			</div>
			<div class="date" style="float: right; width: 30%; text-align: right; margin: 6px 0; padding: 0px;">
				<span style="font-size: 22px; margin: 0 6px 0 0px; font-weight: bold;">Date:</span> <input type="text" name="date" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 70%; border:1px solid #000; height: 30px;">
			</div>
		</div>
	
		<!-- dealer section start -->
		<div class="dealer-section" style="float: left; width: 100%;">
			<h2 bgcolor="#000" style="margin: 0px; text-align: center; color: #fff!important; background-color: #000!important; padding: 6px 0 12px; font-size: 20px;border-radius: 7px;">Dealer Completes This Section</h2>
			<div class="dealer-inner" style=" background-color: #fff!important; border: 1px solid #000; float: left; width: 100%; margin: -8px 0 0;border-radius: 7px;">
				<!-- dealer left Start  -->
				<div class="dealer-left" style="float: left; width: 69%; border-right: 1px solid #000; padding: 0 0 8px;">
					<div class="row" style="margin: 3px 5px; float: left; width: 100%;">
						<div class="one-third" style="float: left; width: 30%"> 
							<input type="text" name="dealer_id" value="<?php echo $info['dealer_id']; ?>" style="width: 100%">
							<span style="display: block;">Dealership Number</span>
						</div>
						
						<div class="one-third" style="float: left; width: 38%; margin: 0 4px;">
							<input type="text" name="company" value="<?php echo isset($info['company'])?$info['company']:''; ?>" style="width: 100%;">
							<span style="display: block;">Dealership Name</span>
						</div>
						
						<div class="one-third" Style="float: left; width: 29%	">
							<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 100%">
							<span style="display: block;">Salesperson</span>
						</div>
					</div>
					
					<div class="row" style="margin: 3px 5px; float: left; width: 100%;">
						<div class="one-third" style="float: left; width: 42%">
							<input type="text" name="make" value="<?php echo $info['make']; ?>" style="width: 100%">
							<span style="display: block;">Make</span>
						</div>
						
						<div class="one-third" style="float: left; width: 25%; margin: 0 4px;">
							<input type="text" name="model" value="<?php echo $info['model']; ?>" style="width: 100%">
							<span style="display: block;">Model</span>
						</div>
						
						<div class="one-third" style="float: left; width: 31%">
							<div class="sm-left" style="width: 72%; float: left;">
								<input type="text" name="year" value="<?php echo $info['year']; ?>" style="width: 100%">
								<span style="display: block;">Year</span>
							</div>
							<div class="sm-right" style="float: right; font-size: 12px; width: 50px; position: relative; bottom: 4px;">
								<input type="checkbox" value="New" name="N_condition" <?php echo (isset($info['N_condition'])&& $info['N_condition']== 'New')?'checked':''; ?> > New <br>
								<input type="checkbox" value="Used" name="U_condition" <?php echo (isset($info['U_condition'])&& $info['U_condition']== 'Used')?'checked':''; ?>> Used
							</div>
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 5px;">
						<div class="one-third" style="float: left; width: 42%">
							<input type="text" name="secondary" value="<?php echo isset($info['secondary'])?$info['secondary']:''; ?>" style="width:100%;">
							<span style="display: block;">Secondary Asset (e.g., sidecar, engine, trailer)</span>
						</div>
						
						<div class="one-third" style="float: left; margin: 0 4px;width: 25%;">
								<input type="text" name="s_model" value="<?php echo isset($info['s_model'])?$info['s_model']:''; ?>" style="width: 100%">
							<span style="display: block;">Model</span>
						</div>
						
						<div class="one-third" style="float: left; width: 31%">
							<div class="sm-left" style="width: 72%; float: left;">
								<input type="text" name="s_year" value="<?php echo isset($info['s_year'])?$info['s_year']:''; ?>" style="width:100%">
								<span style="display: block;">Year</span>
							</div>
							<div class="sm-right" style="float: right; font-size: 12px; width: 50px; position: relative; bottom: 4px;">
								<input type="checkbox" name="n_condition" value="New" <?php echo (isset($info['n_condition'])&& $info['n_condition']== 'New')?'checked':''; ?> > New <br>
								<input type="checkbox" name="u_condition" value="Used" <?php echo (isset($info['u_condition'])&& $info['u_condition']== 'Used')?'checked':''; ?> > Used
							</div>
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 5px;">
						<div class="one-third" style="float: left; width: 42%">
							<input type="text" name="applicant_source" value="<?php echo isset($info['applicant_source'])?$info['applicant_source']:''; ?>"  style="width:100%;">
							<span style="display: block;">Applicant Source (e.g. Pre-Qualified, Rider-to-Rider)</span>
						</div>
						
						<div class="one-third" style="float: left; width: 48%; margin: 0 5px;">
							<input type="text" name="additional_source" value="<?php echo isset($info['additional_source'])?$info['additional_source']:''; ?>" style="width:100%;">
							<span style="display: block;">Additional Source Data (e.g. Pre-Qualified ID #, Seller’s Name)</span>
						</div>
					</div>
					
					
				</div>
				<!-- dealer left end -->
				
				<!-- dealer right start -->
				<div class="dealer-right" style="float: right; width: 30%; padding: 0 6px;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<label style="float: left; font-size: 13px; padding: 2px 0;">Cash Price</label>
						<input type="text" name="cash_price" value="<?php echo isset($info['cash_price'])?$info['cash_price']:''; ?>" style="float: right; width: 52%;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; font-size: 13px; padding: 5px 0;">F&I Add-ons</label>
						<input type="text" name="fi_addon" value="<?php echo isset($info['fi_addon'])?$info['fi_addon']:''; ?>" style="float: right; width: 52%;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; font-size: 13px; padding: 5px 0;">Less Down Payment</label>
						<input type="text" name="less_payment" value="<?php echo isset($info['less_payment'])?$info['less_payment']:''; ?>" style="float: right; width: 52%;">  
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; font-size: 13px; padding: 5px 0;">Less Net Trade-In</label>
						<input type="text" name="less_trade"  value="<?php echo isset($info['less_trade'])?$info['less_trade']:''; ?>" style="float: right; width: 52%;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; font-size: 13px; padding: 5px 0;">Requested Amount</label>
						<input type="text" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" style="float: right; width: 52%;">
					</div>
				</div>
				<!-- dealer right end -->
			</div>
		</div>
		<!-- dealer section end -->
		
		
		<!-- dealer section start -->
		<div class="dealer-section" style="float: left; width: 100%; margin-top: 10px;">
			<h2 style="margin: 0px; font-size: 20px; text-align: center; color: #fff!important; background-color: #000!important; padding: 7px 0 14px; font-size: 16px;border-radius: 7px;">IMPORTANT: APPLICANT(S) MUST READ THESE DIRECTIONS BEFORE COMPLETING THIS APPLICATION</h2>
			<div class="dealer-inner" style=" background-color: #fff!important; border: 1px solid #000; float: left; width: 100%;  margin: -8px 0 0;border-radius: 7px;">
				<div class="applicant" style="padding: 10px; box-sizing: border-box; ">
				<p style="margin:5px 0;"><strong>Notice to Applicant(s) – Print clearly. Use dark ink. Provide all information requested.</strong>  Failure to provide legible and complete information as requested in this credit application may delay 
review of your credit application.</p>
				
				<div class="rotate-with-checkbox" style="float: left; width: 100%;">
					<div class="rotate" style="margin: 37px 0 0 -37px; float: left; -moz-transform: rotate(270deg) ; -webkit-transform: rotate(270deg) ; -o-transform: rotate(270deg) ; -ms-transform: rotate(270deg) ; transform: rotate(270deg) ;">
						<strong style="text-align: center; display: block;">CHECK <br>APPROPRIATE BOX</strong>
					</div>
					<div class="checkbox-text" style="float: left; width: 86%;">
						<p><input type="radio" name="credi_app_type" value="individual" <?php echo (isset($info['credit_app_type']) && $info['credit_app_type']=='individual')?'checked':''; ?> > If you are applying for <strong>INDIVIDUAL</strong> credit in your own name, and you are not relying on the creditworthiness of another person as the basis for repayment of the credit requested, Complete the <i><a href="#" style="color: #000; text-decoration: underline;">Applicant Information</a></i> section</p>
						
						<p> <input type="radio" name="credi_app_type" value="joint" <?php echo (isset($info['credit_app_type']) && $info['credit_app_type']=='joint')?'checked':''; ?> /> If you are applying for JOINT credit with another person, Complete both <i><a href="#" style="color: #000; text-decoration: underline;">Applicant Information</a> </i> and <i><a href="#" style="color: #000; text-decoration: underline;">Joint Applicant Information</a></i> sections.We intend to apply for joint credit:   </p>

						<p style="margin-top:10px;margin-bottom: 25px;"><span>Applicant X</span> <input type="text" name="applicant_x" value="<?php echo isset($info['applicant_x'])?$info['applicant_x']:''; ?>" style="border-left: 0 none; border-right: 0 none; border-top: 0 none; bottom: 7px; position: relative; width: 34%;">  <span>Joint Applicant X</span> <input type="text" name="applicant_y" value="<?php echo isset($info['applicant_y'])?$info['applicant_y']:''; ?>" style="border-left: 0 none; border-right: 0 none; border-top: 0 none; bottom: 7px; position: relative; width: 34%;"></p>
					</div>
				</div>
				
				
				</div>
			</div>
		</div>
		<!-- dealer section end -->
		
		<!-- Inner Section Start -->
		<div class="inner" style="float: left; width: 100%;">
			<div class="sm-inner" style="width: 98%; margin: 0 auto;">
		<!-- Application form start -->
		<div class="application-from" style="float: left; margin: 7px 0 7px; width: 100%;">
			<div class="tittle" style="background-color: #000!important; color: #fff!important; font-size: 16px; padding: 6px 0 6px 9px;">
				Applicant Information <i style="font-size: 14px; margin-left: 10px;">Applicant(s) must be at least 18 years old.</i>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 39%">
					<input type="text" name="full_name" value="<?php echo isset($info['full_name'])?$info['full_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width:100%">
					<span>
						<label>Applicant Full Name</label>
						<!-- <label style="float: right;">Suffix (e.g. Sr., Jr.) </label> -->
					</span>
				</div>
				<div class="form-field" style="float: left; width:21%; margin: 0 0 0 1%;">
					<input type="text" name="applicant" value="<?php echo isset($info['applicant'])?$info['applicant']:''; ?>" style="width:100%; ">
					<label>Social Security Number (9 digits) </label>
				</div>
				<div class="form-field" style="float: left; width:19%; margin: 0 0 0 1%;">
					<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width:100%;">
					<label>Date of Birth (MM/DD/YYYY) </label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width:100%">
					<label>Driver's License Number</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 39%">
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width:100%">
						<label>Current Physical Address </label>
				</div>
				<div class="form-field" style="float: left; width: 21%; margin: 0 0 0 1%;">
					<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width:100%">
					<label>City </label>
				</div>
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 1%;">
					<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
				<div class="form-field" style="float: left; width: 18%; margin: 0 0 0 1%;">
					<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width:100%">
					<label>Zip </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 0;">
					<input type="text" name="how_long" value="<?php echo isset($info['how_long'])?$info['how_long']:''; ?>" style="width:100%">
					<label>How Long Have You Lived There</label>
				</div>
				<div class="form-field" style="float: left; width:16%; margin: 0 3px 0 0.6%;">
					<input type="text" name="monthly_payment" value="<?php echo isset($info['monthly_payment'])?$info['monthly_payment']:''; ?>" style="width:100%">
					<label>Monthly Residence Payment</label>
				</div>
				<div class="form-field" style="float: left; width: 5%; font-size: 13px; position: relative; bottom: 6px;">
					<input type="radio" name="house_type" value="own" <?php echo (isset($info['house_type'])&&$info['house_type']=='own')?'checked':''; ?> > Own <br style=" display: block; margin: 0 0 -4px;"> <input type="radio" name="house_type" value="rent" <?php echo (isset($info['house_type'])&&$info['house_type']=='rent')?'checked':''; ?>> Rent <br style=" display: block; margin: 0 0 -4px;"> <input type="radio" name="house_type" value="other" <?php echo (isset($info['house_type'])&&$info['house_type']=='other')?'checked':''; ?>> Other
				</div>
				<div class="form-field" style="float: left; width:20%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_phone" value="<?php echo isset($info['cobuyer_phone'])?$info['cobuyer_phone']:''; ?>"  style="width:c100%">
					<label>Home Phone Number(w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_mobile" value="<?php echo isset($info['cobuyer_mobile'])?$info['cobuyer_mobile']:''; ?>" style="width:100%">
					<label>Cell Phone Number(w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_email" value="<?php echo isset($info['cobuyer_email'])?$info['cobuyer_email']:''; ?>" style="width:100%">
					<label>E-mail Address</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 42%">
					<input type="text" name="mail_address" value="<?php echo isset($info['mail_address'])?$info['mail_address']:''; ?>" style="width:100%">
						<label><input type="checkbox" name="mailing" value="mailing" <?php echo (isset($info['mailing'])&&$info['mailing']=='physical')?'checked':''; ?>> Mailing Address (check box if same as  physical address)</label>
				</div>
				<div class="form-field" style="float: left; width:20%; margin: 0 0 0 1%;">
					<input type="text" name="m_city" value="<?php echo isset($info['m_city'])?$info['m_city']:''; ?>" style="width:100%">
					<label>City </label>
				</div>
				<div class="form-field" style="float: left; width:16%; margin: 0 0 0 1%;">
					<input type="text" name="m_state" value="<?php echo isset($info['m_state'])?$info['m_state']:''; ?>" style="width:100%">
					<label>State </label>
				</div>
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 1%;">
					<input type="text" name="m_zip" value="<?php echo isset($info['m_zip'])?$info['m_zip']:''; ?>" style="width:100%">
					<label>Zip </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<span>Employment Status:</span>
				<span> <input type="radio"name="employment_status" value="employed" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'employed')?'checked':''; ?> /> Employed </span>
				<span> <input type="radio"name="employment_status" value="self_employed" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'self_employed')?'checked':''; ?> /> Self Employed </span>
				<span> <input type="radio"name="employment_status" value="retired" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'retired')?'checked':''; ?>> Retired  </span>
				<span> <input type="radio"name="employment_status" value="unemployed" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'unemployed')?'checked':''; ?>> Unemployed   </span>
                <span> <input type="radio"name="employment_status" value="dealer_employee" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'dealer_employee')?'checked':''; ?>> Dealer Employee   </span>  
                <span> <input type="radio"name="employment_status" value="dealer_principal" <?php echo (isset($info['employment_status']) && $info['employment_status'] == 'dealer_principal')?'checked':''; ?>> Dealer Principal   </span>
				
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; margin: 0 1% 0 0; width: 42%;">
					<input type="text" name="employer_name" value="<?php echo isset($info['employer_name'])?$info['employer_name']:''; ?>" style="width:100%">
						<label> Employer Name </label>
				</div>
				<div class="form-field" style="float: left; width: 20%">
					<input type="text" name="emp_city" value="<?php echo isset($info['emp_city'])?$info['emp_city']:''; ?>" style="width:100%">
						<label> Employment City </label>
				</div>
				<div class="form-field" style="float: left; width:13%; margin: 0 0 0 1%;">
					<input type="text" name="emp_state" value="<?php echo isset($info['emp_state'])?$info['emp_state']:''; ?>" style="width:100%">
					<label>Employment State</label>
				</div>
				<div class="form-field" style="float: left; width: 22%; margin: 0 0 0 1%;">
					<input type="text" name="business_phone" value="<?php echo isset($info['business_phone'])?$info['business_phone']:''; ?>" style="width:100%">
					<label>Business Phone Number (w/Area Code)</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 18%">
					<input type="text" name="cobuyer_job_title" value="<?php echo isset($info['cobuyer_job_title'])?$info['cobuyer_job_title']:''; ?>" style="width:100%">
						<label> Job Title</label>
				</div>
				<div class="form-field" style="float: left; width:15%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_emp_duration" value="<?php echo isset($info['cobuyer_emp_duration'])?$info['cobuyer_emp_duration']:''; ?>" style="width:100%">
					<label>Years/Months There</label>
				</div>
				<div class="form-field" style="float: left; width:12%; margin: 0 0 0 1%;">
					<input type="text" name="gross_income" value="<?php echo isset($info['gross_income'])?$info['gross_income']:''; ?>" style="width:100%">
					<label>Gross Income</label>
				</div>
				<div class="form-field" style="float: left; width: 15%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_income_frequency" value="<?php echo isset($info['cobuyer_income_frequency'])?$info['cobuyer_income_frequency']:''; ?>" style="width:100%">
					<label>Income Frequency </label>
				</div>
				<div class="form-field" style="float: left; width:13%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_other_income" value="<?php echo isset($info['cobuyer_other_income'])?$info['cobuyer_other_income']:''; ?>" style="width:100%">
					<label>Other Income*</label>
				</div>
				<div class="form-field" style="float: left; width: 22%; margin: 0 0 0 1%;">
					<input type="text" name="other_income" value="<?php echo isset($info['other_income'])?$info['other_income']:''; ?>" style="width:100%">
					<label>Other Income Frequency </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 100%">
					<p style="font-size: 13px; margin: 0px;">* Alimony, Child Support, and/or Separate Maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation. Include all readlly accessible income earned by you: salary and hourly wages, overtime, bonuces. commissions, self-employment, social security, retirement pay, public assistance, disability, pensions, interest, dividends or rental income</p>
				</div>
		   </div>			
			
		</div>
		<!-- Application form end -->
		
		
		
		<!-- joint application form -->
		
		
		<div class="application-from" style="float: left; margin: 7px 0 7px; width: 100%;">
			<div class="tittle" style="background-color: #000!important; color: #fff!important; font-size: 16px; padding: 6px 0 6px 9px;">
				Joint Applicant Information <i style="font-size: 14px; margin-left: 10px;">Applicant(s) must be at least 18 years old.</i>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 39%">
					<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name'])?$info['co_buyer_name']:''; ?>" style="width:100%">
					<span>
						<label>Joint Applicant Full Name</label>
						<!-- <label style="float: right;">Suffix (e.g. Sr., Jr.) </label> -->
					</span>
				</div>
				<div class="form-field" style="float: left; width:21%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_ssn" value="<?php echo isset($info['co_buyer_ssn'])?$info['co_buyer_ssn']:''; ?>" style="width:100%; ">
					<label>Social Security Number (9 digits) </label>
				</div>
				<div class="form-field" style="float: left; width:19%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_dob" value="<?php echo isset($info['co_buyer_dob'])?$info['co_buyer_dob']:''; ?>" style="width:100%;">
					<label>Date of Birth (MM/DD/YYYY) </label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_license" value="<?php echo isset($info['co_buyer_license'])?$info['co_buyer_license']:''; ?>" style="width:100%">
					<label>Driver's License Number</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 39%">
					<input type="text" name="co_buyer_address" value="<?php echo isset($info['co_buyer_address'])?$info['co_buyer_address']:''; ?>" style="width:100%">
						<label>Current Physical Address </label>
				</div>
				<div class="form-field" style="float: left; width: 21%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_city" value="<?php echo isset($info['co_buyer_city'])?$info['co_buyer_city']:''; ?>" style="width:100%">
					<label>City </label>
				</div>
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_state" value="<?php echo isset($info['co_buyer_state'])?$info['co_buyer_state']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
				<div class="form-field" style="float: left; width: 18%; margin: 0 0 0 1%;">
					<input type="text" name="co_buyer_zip" value="<?php echo isset($info['co_buyer_zip'])?$info['co_buyer_zip']:''; ?>" style="width:100%">
					<label>Zip </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 0;">
					<input type="text" name="how_long2" value="<?php echo isset($info['how_long2'])?$info['how_long2']:''; ?>" style="width:100%">
					<label>How Long Have You Lived There</label>
				</div>
				<div class="form-field" style="float: left; width:16%; margin: 0 3px 0 0.6%;">
					<input type="text" name="monthly_payment2" value="<?php echo isset($info['monthly_payment2'])?$info['monthly_payment2']:''; ?>" style="width:100%">
					<label>Monthly Residence Payment</label>
				</div>
				<div class="form-field" style="float: left; width: 5%; font-size: 13px; position: relative; bottom: 6px;">
					<input type="radio" name="house_type2" value="own" <?php echo (isset($info['house_type2'])&&$info['house_type2']=='own')?'checked':''; ?> > Own <br style=" display: block; margin: 0 0 -4px;"> <input type="radio" name="house_type2" value="rent" <?php echo (isset($info['house_type2'])&&$info['house_type2']=='rent')?'checked':''; ?>> Rent <br style=" display: block; margin: 0 0 -4px;"> <input type="radio" name="house_type2" value="other" <?php echo (isset($info['house_type2'])&&$info['house_type2']=='other')?'checked':''; ?>> Other
				</div>
				<div class="form-field" style="float: left; width:20%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_phone" value="<?php echo isset($info['cobuyer_phone'])?$info['cobuyer_phone']:''; ?>"  style="width:c100%">
					<label>Home Phone Number(w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_mobile" value="<?php echo isset($info['cobuyer_mobile'])?$info['cobuyer_mobile']:''; ?>" style="width:100%">
					<label>Cell Phone Number(w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width:18%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_email" value="<?php echo isset($info['cobuyer_email'])?$info['cobuyer_email']:''; ?>" style="width:100%">
					<label>E-mail Address</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 42%">
					<input type="text" name="applicant" style="width:100%">
						<label><input type="checkbox" name="house_type" value="rent" <?php echo (isset($info['house_type'])&&$info['house_type']=='rent')?'checked':''; ?> /> Mailing Address (check box if same as  physical address)</label>
				</div>
				<div class="form-field" style="float: left; width:20%; margin: 0 0 0 1%;">
					<input type="text" name="j_city" value="<?php echo isset($info['j_city'])?$info['j_city']:''; ?>" style="width:100%">
					<label>City </label>
				</div>
				<div class="form-field" style="float: left; width:16%; margin: 0 0 0 1%;">
					<input type="text" name="j_state" value="<?php echo isset($info['j_state'])?$info['j_state']:''; ?>" style="width:100%">
					<label>State </label>
				</div>
				<div class="form-field" style="float: left; width: 19%; margin: 0 0 0 1%;">
					<input type="text" name="j_zip" value="<?php echo isset($info['j_zip'])?$info['j_zip']:''; ?>" style="width:100%">
					<label>Zip </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<span>Employment Status:</span>
				<span> <input type="radio"name="employment_status2" value="employed" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'employed')?'checked':''; ?> /> Employed </span>
				<span> <input type="radio"name="employment_status2" value="self_employed" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'self_employed')?'checked':''; ?> /> Self Employed </span>
				<span> <input type="radio"name="employment_status2" value="retired" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'retired')?'checked':''; ?>> Retired  </span>
				<span> <input type="radio"name="employment_status2" value="unemployed" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'unemployed')?'checked':''; ?>> Unemployed   </span>
                <span> <input type="radio"name="employment_status2" value="dealer_employee" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'dealer_employee')?'checked':''; ?>> Dealer Employee   </span>  
                <span> <input type="radio"name="employment_status2" value="dealer_principal" <?php echo (isset($info['employment_status2']) && $info['employment_status2'] == 'dealer_principal')?'checked':''; ?>> Dealer Principal   </span>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; margin: 0 1% 0 0; width: 42%;">
					<input type="text" name="employer_name2" value="<?php echo isset($info['employer_name2'])?$info['employer_name2']:''; ?>" style="width:100%">
						<label> Employer Name </label>
				</div>
				<div class="form-field" style="float: left; width: 20%">
					<input type="text" name="emp_city2" value="<?php echo isset($info['emp_city2'])?$info['emp_city2']:''; ?>" style="width:100%">
						<label> Employment City </label>
				</div>
				<div class="form-field" style="float: left; width:13%; margin: 0 0 0 1%;">
					<input type="text" name="emp_state2" value="<?php echo isset($info['emp_state2'])?$info['emp_state2']:''; ?>" style="width:100%">
					<label>Employment State</label>
				</div>
				<div class="form-field" style="float: left; width: 22%; margin: 0 0 0 1%;">
					<input type="text" name="business_phone2" value="<?php echo isset($info['business_phone2'])?$info['business_phone2']:''; ?>" style="width:100%">
					<label>Business Phone Number (w/Area Code)</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 18%">
					<input type="text" name="cobuyer_job_title" value="<?php echo isset($info['cobuyer_job_title'])?$info['cobuyer_job_title']:''; ?>" style="width:100%">
						<label> Job Title</label>
				</div>
				<div class="form-field" style="float: left; width:15%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_emp_duration" value="<?php echo isset($info['cobuyer_emp_duration'])?$info['cobuyer_emp_duration']:''; ?>" style="width:100%">
					<label>Years/Months There</label>
				</div>
				<div class="form-field" style="float: left; width:12%; margin: 0 0 0 1%;">
					<input type="text" name="gross_income2" value="<?php echo isset($info['gross_income2'])?$info['gross_income2']:''; ?>" style="width:100%">
					<label>Gross Income</label>
				</div>
				<div class="form-field" style="float: left; width: 15%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_income_frequency" value="<?php echo isset($info['cobuyer_income_frequency'])?$info['cobuyer_income_frequency']:''; ?>" style="width:100%">
					<label>Income Frequency </label>
				</div>
				<div class="form-field" style="float: left; width:13%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_other_income" value="<?php echo isset($info['cobuyer_other_income'])?$info['cobuyer_other_income']:''; ?>" style="width:100%">
					<label>Other Income*</label>
				</div>
				<div class="form-field" style="float: left; width: 22%; margin: 0 0 0 1%;">
					<input type="text" name="cobuyer_other_frequency" value="<?php echo isset($info['cobuyer_other_frequency'])?$info['cobuyer_other_frequency']:''; ?>" style="width:100%">
					<label>Other Income Frequency </label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0px;">
				<div class="form-field" style="float: left; width: 100%">
					<p style="font-size: 13px; margin: 0px;">* Alimony, Child Support, and/or Separate Maintenance income need not be revealed if you do not wish to have it considered as a basis for repaying this obligation. Include all readlly accessible income earned by you: salary and hourly wages, overtime, bonuces. commissions, self-employment, social security, retirement pay, public assistance, disability, pensions, interest, dividends or rental income</p>
				</div>
		   </div>			
			
		</div>
		<div class="row" style="margin: 0; float: left; width: 100%;">
			<div class="logo" style="float: left; width: 70px;">
				<img  src="<?php echo ('/app/webroot/files/logo/harley_logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<p style="font-size: 14px; margin: 23px 0 0 11px; float: left;">A Subsidiary of Harley-Davidson Credit Corp.</p>
		</div>
		<!-- joint application form -->

		<!-- Referance form start -->
		
		<div class="application-from" style="float: left; margin: 10px 0 7px; width: 100%;">
			<div class="tittle" style="background-color: #000!important; color: #fff!important;     font-size: 16px;
    padding: 5px 0 6px 12px; margin-bottom: 10px; margin-bottom: 7px;">
				<strong style="color: #fff!important; ">References</strong>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 0px 0px;">
				<div class="form-field" style="float: left; width: 38%">
					<input type="text" name="ref_name_1" value="<?php echo isset($info['ref_name_1'])?$info['ref_name_1']:''; ?>" style="width:100%">
						<label> Name </label>
				</div>
				<div class="form-field" style="float: left; width:22%; margin: 0 0 0 1%;">
					<input type="text" name="ref_phone_1" value="<?php echo isset($info['ref_phone_1'])?$info['ref_phone_1']:''; ?>" style="width:100%">
					<label>Phone Number (w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width: 23%; margin: 0 0 0 1%;">
					<input type="text" name="ref_city_1" value="<?php echo isset($info['ref_city_1'])?$info['ref_city_1']:''; ?>" style="width:100%">
					<label>City</label>
				</div>
				<div class="form-field" style="float: left; width:14%; margin: 0 0 0 1%;">
					<input type="text" name="ref_state_1" value="<?php echo isset($info['ref_state_1'])?$info['ref_state_1']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0px;">
				<div class="form-field" style="float: left; width: 38%">
					<input type="text" name="ref_name_2" value="<?php echo isset($info['ref_name_2'])?$info['ref_name_2']:''; ?>" style="width:100%">
						<label> Name </label>
				</div>
				<div class="form-field" style="float: left; width:22%; margin: 0 0 0 1%;">
					<input type="text" name="ref_phone_2" value="<?php echo isset($info['ref_phone_2'])?$info['ref_phone_2']:''; ?>" style="width:100%">
					<label>Phone Number (w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width: 23%; margin: 0 0 0 1%;">
					<input type="text" name="ref_city_2" value="<?php echo isset($info['ref_city_2'])?$info['ref_city_2']:''; ?>" style="width:100%">
					<label>City</label>
				</div>
				<div class="form-field" style="float: left; width:14%; margin: 0 0 0 1%;">
					<input type="text" name="ref_state_2" value="<?php echo isset($info['ref_state_2'])?$info['ref_state_2']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0px;">
				<div class="form-field" style="float: left; width: 38%">
					<input type="text"  name="ref_name_3" value="<?php echo isset($info['ref_name_3'])?$info['ref_name_3']:''; ?>" style="width:100%">
						<label> Name </label>
				</div>
				<div class="form-field" style="float: left; width:22%; margin: 0 0 0 1%;">
					<input type="text" name="ref_phone_3" value="<?php echo isset($info['ref_phone_3'])?$info['ref_phone_3']:''; ?>" style="width:100%">
					<label>Phone Number (w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width: 23%; margin: 0 0 0 1%;">
					<input type="text" name="ref_city_3" value="<?php echo isset($info['ref_city_3'])?$info['ref_phone_3']:''; ?>" style="width:100%">
					<label>City</label>
				</div>
				<div class="form-field" style="float: left; width:14%; margin: 0 0 0 1%;">
					<input type="text" name="ref_state_3" value="<?php echo isset($info['ref_state_3'])?$info['ref_state_3']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0px 0px;">
				<div class="form-field" style="float: left; width: 38%">
					<input type="text" name="ref_name_4" value="<?php echo isset($info['ref_name_4'])?$info['ref_name_4']:''; ?>" style="width:100%">
						<label> Name </label>
				</div>
				<div class="form-field" style="float: left; width:22%; margin: 0 0 0 1%;">
					<input type="text" name="ref_phone_4" value="<?php echo isset($info['ref_phone_4'])?$info['ref_phone_4']:''; ?>" style="width:100%">
					<label>Phone Number (w/Area Code)</label>
				</div>
				<div class="form-field" style="float: left; width: 23%; margin: 0 0 0 1%;">
					<input type="text" name="ref_city_4" value="<?php echo isset($info['ref_city_4'])?$info['ref_city_4']:''; ?>" style="width:100%">
					<label>City</label>
				</div>
				<div class="form-field" style="float: left; width:14%; margin: 0 0 0 1%;">
					<input type="text" name="ref_state_4" value="<?php echo isset($info['ref_state_4'])?$info['ref_state_4']:''; ?>" style="width:100%">
					<label>State</label>
				</div>
			</div>
		</div>
		<!-- referance form end -->
		
		
		<!-- text section start -->
		<div class="text-section"  style="font-size: 13px; float: left; width: 100%;">
			<h2 style="text-align: center; text-transform: uppercase; font-size: 17px;">NOTICE TO APPLICANT(S)</h2>
			<p style="margin: 4px 0;">This Credit Application–Customer Statement will be submitted to Eaglemark Savings Bank, and its successors and assigns, at P.O. Box 22048, Carson City, Nevada 89721, for consideration of whether it meets the credit requirements of Eaglemark Savings Bank, and its successors and assigns.</p>
			
			<p style="margin: 4px 0;">Applicant will be required to obtain and pay for vehicle insurance covering the collateral for the full term of the loan, for liability and physical damage for both collision and comprehensive losses to include such perils as FIRE, THEFT, and VANDALISM. Eaglemark Savings Bank, and its successors and assigns, must be listed as a LOSS PAYEE AND ADDITIONAL INSURED. Applicant will provide verification in the form of a certificate of insurance through an acceptable carrier with thirty (30) days notice of any intent to cancel or non-renew to be provided by the issuing carrier to the applicant and loss payee. YOU MAY CHOOSE THE PERSON THROUGH WHOM ANY INSURANCE IS OBTAINED</p>
			
			<p style="margin: 4px 0;"><strong>NOTICE TO CALIFORNIA RESIDENTS:</strong> Regardless of your marital status, you may apply for credit in your name alone.</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO MAINE RESIDENTS:</strong> Consumer reports (credit reports) may be requested in connection with this application. Upon request, you will be informed whether or not a consumer report was requested and, if it was, of the name and address of the consumer reporting agency that furnished the report.</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO NEW YORK RESIDENTS:</strong> Consumer reports may be requested in connection with the processing of your application and any resulting account. Upon request, we will inform you of the names and addresses of any consumer reporting agencies that have provided us with such reports</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO OHIO RESIDENTS:</strong> Ohio laws against discrimination require that all creditors make credit equally available to all creditworthy customers, and that credit reporting agencies maintain separate credit histories on each individual upon request. The Ohio Civil Rights Commission administers compliance with this law</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO RHODE ISLAND RESIDENTS:</strong> Consumer reports may be requested in connection with this application.</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO VERMONT RESIDENTS:</strong> The creditor may obtain credit reports about you on an ongoing basis in connection with this extension of credit transaction for any one or more of the following reasons: (1) reviewing the account; (2) taking collection action on the account; or (3) any other legitimate purposes associated with the account</p>
			<p style="margin: 4px 0;"><strong>NOTICE TO MARRIED WISCONSIN RESIDENTS:</strong> No provision of a marital property agreement, a unilateral statement under Wisconsin Statutes 766.59 or a court decree under Wisconsin Statutes 766.70 adversely affects the interest of the creditor unless the creditor, prior to the time the credit is granted, is furnished a copy of the agreement, statement or decree or has actual knowledge of the adverse provision when the obligation to the creditor is incurred.</p>
			
			
			<div class="outline" style="border: 1px solid #000; padding: 11px;">
				<p style="margin-top: 0px"><strong>IMPORTANT INFORMATION ABOUT PROCEDURES FOR OPENING A CREDIT ACCOUNT WITH EAGLEMARK SAVINGS BANK –</strong> To help the government fight the funding of terrorism and money laundering activities, Federal law requires all financial institutions to obtain, verify, and record information that identifies each person who opens an account.</p>
				<p style="margin: 0px"><strong>What this means for you:</strong> When you open a credit account with Eaglemark Savings Bank, we will ask for your name, address, date of birth, and other information that will allow us to identify you. We may also ask to see your driver’s license or other identifying documents.</p>
			</div>
			
			
		</div>
		<!-- text section end -->
			</div>
		</div>
		<!-- inner section end -->
		
		
		<!-- bg color text section start -->
			<div class="bg-color-text" style="float: left; box-sizing: border-box; width: 100%; border: 2px solid #000; border-radius: 10px; background-color: #EBECEC!important; margin: 10px 0; padding: 16px;">
				<h2 style="font-size: 16px;"><strong>BY SIGNING BELOW, I ACKNOWLEDGE THAT:</strong></h2>
				<ul style="margin: 0; padding: 0 17px; font-size: 13px;">
					<li>  I understand that  by providing my wireless telephone number(s) and/or email address(es) now or in the   future, I  consent to the use of recorded/artificial voice messages and/or automatic telephone dial devices that may contain mynon-public information. My consent covers the use of these contact methods to call or send text to the wireless telephonenumber(s) and to send text or email messages to the email address(es) I provide to you, for which I may incur a charge; and</li>
					<li>I  understand that    any    credit insurance products and    GAP (where applicable) are   not   deposits or   other obligations of,   or   guaranteed or   insured by,   Eaglemark Savings Bank (ESB) or its affiliates. I understand that these products and debt protection are not insured by the Federal Deposit Insurance Corporation (FDIC) or any other agency of the United States; and</li>
					<li> I  understand that    I  am   free    to  purchase credit insurance products and    GAP (where applicable) from     another source, and    that    ESB    does not   condition credit on   whether theseproducts are purchased from ESB or its affiliates, and ESB does not require me to agree not to obtain these products from another source; and</li>
					<li>I  have read    the   Notice to   Applicant(s) sections, and    I  agree to   the   terms and    conditions set   forth in this    Credit Application–Customer Statement, I  have received the Harley-Davidson Financial Services Privacy Notice; and</li>
					<li>I  hereby authorize an   investigation of   my   credit and    employment history by   ESB,    its   successors and    assigns, and/or certain insurance agents or   companies. I  understand that my credit and employment history obtained in, and in connection with, this Credit Application–Customer Statement will be used in determining my eligibility for credit approval by ESB, and itssuccessors and assigns. If approved, ESB, and its successors and assigns, may obtain credit information about me on an ongoing basis in connection with this extension of credit transaction for any one or more of the following reasons: (1) reviewing the account; (2) taking collection action on the account; or (3) any other legitimate purposes associated with the account; and</li>
					<li><input type="checkbox" name="harley_insurance" value="yes" <?php echo (isset($info['harley_insurance']) && $info['harley_insurance']== 'yes')?'checked':''; ?> >    I  have    requested a  Harley-Davidson Insurance estimate and    understand more information may   be   needed to  obtain a  quote. I  authorize ESB    to  share my   information for   these purposes. I understand I am under no obligation to purchase insurance from this agency and/or carrier; and</li>
					<li>I  AUTHORIZE EAGLEMARK SAVINGS BANK TO   SHARE MY   PERSONAL INFORMATION CONTAINED IN   THIS     APPLICATION WITH THE    DEALER FOR    USE    BY   THE    DEALER; AND</li>
					<li>I  hereby certify that    the   information I  have provided in  this    Credit Application–Customer Statement is  complete and    accurate to   the   best    of   my   knowledge</li>				
					</ul>
					
					<div class="row" style="float: left; width: 50%; margin: 5px 0 0 0;">
						<div class="form-field" style="float: left; width: 75%; position: relative;">
							<span style="font-size: 20px; left: 8px; position: absolute; top: 5px;">X</span>
							<input type="text" class="sign" name="application_sign" value="<?php echo isset($info['application_sign'])?$info['application_sign']:''; ?>" style="background-color: transparent; height: 50px; border-bottom: 2px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; width:100%; box-sizing: border-box; padding: 0 0 0 36px;">
							<label>Primary Application Signature</label>
						</div>
						
						<div class="form-field" style="float: left; width: 25%">
							<input type="text" class="sign" name="primary_date" value="<?php echo isset($info['primary_date'])?$info['primary_date']:''; ?>" style="background-color: transparent; height: 50px; border-bottom: 2px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; width:100%; box-sizing: border-box;">
							<label>Date</label>
						</div>
					</div>
					
					<div class="row" style="float: right; width: 48%; margin: 6px 0 5px;">
						<div class="form-field" style="float: left; width: 75%; position: relative;">
							<span style="font-size: 20px; left: 8px; position: absolute; top: 4px;">X</span>
							<input type="text" class="sign" name="joint_sign" value="<?php echo isset($info['joint_sign'])?$info['joint_sign']:''; ?>" style="background-color: transparent; height: 50px; border-bottom: 2px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; width:100%; box-sizing: border-box; padding: 0 0 0 36px;">
							<label>Joint Applicant Signature </label>
						</div>
						
						<div class="row" style="float: left; width: 25%">
							<input type="text" class="sign" name="joint_date" value="<?php echo isset($info['joint_date'])?$info['joint_date']:''; ?>" style="background-color: transparent; height: 50px; border-bottom: 2px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; width:100%; box-sizing: border-box;">
							<label>Date</label>
						</div>
					</div>
				</div>
		<!-- bg color text section end -->
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
