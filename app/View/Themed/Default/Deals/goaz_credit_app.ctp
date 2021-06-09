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
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
     <?php
 if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:30px!important;margin-top:5px;margin-bottom:10px;}
	 table td {padding:5px;}		
	ul.point_list{list-style-type:square!important;}
	.black_row{background-color:#000 !important;color:#fff !important;}		
	body {
  		-webkit-print-color-adjust: exact;
	}
	@media print { 
		table td ,label{font-size:8px;}
		p.terms{font-size:7px;}
		table td {padding:1px;}		
		input.border_input{border:none;border-bottom:1px solid #000;}
		input[type=text]{height:13px;font-size:8px;}
		.black_row{background-color:#ccc !important;color:#fff !important;}		
		body {
 			 -webkit-print-color-adjust: exact;
		}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0">
          		<tr class="black_row">
                <td align="center" valign="middle">
               <?php echo ($cid == '111235')?'GOAZ MOTORCYCLES':'WWW.GOAZWEST.COM'; ?>
                </td>
                <td align="center" valign="middle" colspan="2">
                	PHONE&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($cid == '111235')?'480-609-1800':'623-322-6700'; ?>
                </td>
                
                <td align="center" valign="middle" colspan="2">
                	FAX&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($cid == '111235')?'480-750-4987':'623-322-6701'; ?>
                </td>
                
                </tr>
          
                <tr>
                <td width="30%" valign="middle" rowspan="6">
                 <img style="width:285px;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/goaz_logo.png'); ?>" alt=""><br/>
                </td>
                <td class="border_td" width="15%">
                <label style="width:100%;display:inline;">Year&nbsp;<input type="text" class="border_input" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:60%;" /></label>
                </td>
                <td class="border_td" width="18%">
                <label style="width:100%;display:inline;">Make&nbsp;<input type="text" class="border_input" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:65%;" /></label>
                </td>
                <td class="border_td" width="22%">
                <label style="width:100%;display:inline;">Model&nbsp;<input type="text" class="border_input" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:75%;" /></label>
                </td>
                <td class="border_td" width="15%">
                <label style="width:100%;display:inline;">Class&nbsp;<input type="text" class="border_input" name="class" value="<?php echo isset($info['class'])?$info['class']:''; ?>" style="width:50%;" /></label>
                </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <input type="radio" name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition'] == 'New')?'checked':''; ?> />&nbsp; New
                    </td>
                    <td colspan="2" align="center">
                    <input type="radio" name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition'] == 'Used')?'checked':''; ?> />&nbsp; Used
                    </td>
                </tr>
                <tr>
                	<td align="right">
                    	<label>Selling Price</label>
                    </td>
                    <td><input type="text" name="unit_value" class="border_input" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width:60%;" /></td>
					<td align="right">
                    	<label>Trade Value</label>
                    </td>
                    <td><input type="text" name="trade_value" class="border_input" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width:60%;" /></td>
                    
                </tr>
                
                <tr>
                	<td align="right">
                    	<label>Sales Tax</label>
                    </td>
                    <td><input type="text" name="sale_tax" class="border_input" value="<?php echo isset($info['sale_tax'])?$info['sale_tax']:''; ?>" style="width:60%;" /></td>
					<td align="right">
                    	<label>Trade Pay Off</label>
                    </td>
                    <td><input type="text" name="trade_payoff" class="border_input" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" style="width:60%;" /></td>
                    
                </tr>
                
                <tr>
                	<td align="right">
                    	<label>License</label>
                    </td>
                    <td><input type="text" name="license" class="border_input" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width:60%;" /></td>
					<td align="right">
                    	<label>Down Payment</label>
                    </td>
                    <td><input type="text" name="down_payment" class="border_input" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" style="width:60%;" /></td>
                    
                </tr>

				<tr>
                	<td align="right">
                    	<label>Warranty</label>
                    </td>
                    <td><input type="text" name="warranty" class="border_input" value="<?php echo isset($info['warranty'])?$info['warranty']:''; ?>" style="width:60%;" /></td>
					<td align="right">
                    	<label>Amount Financed</label>
                    </td>
                    <td><input type="text" name="amount_finance" class="border_input" value="<?php echo isset($info['amount_finance'])?$info['amount_finance']:''; ?>" style="width:60%;" /></td>
                    
                </tr>
                <tr class="black_row">
                <td colspan="5" valign="middle">
                <label>Applicant Information</label>
                </td>
                </tr>
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width:100%;" />Applicant Full Name
                    </label>
                    <label style="width:33%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ssn" value="<?php echo isset($info['ssn'])?$info['ssn']:''; ?>" style="width:100%;" />Social Security Number
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width:100%;" />Date Of Birth
                    </label>
                </td>
                
                </tr>
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width:100%;" />Mailing Address
                    </label>
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:11%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width:100%;" />Zip
                    </label>
                </td>
                
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>" style="width:100%;" />Home Phone Number
                    </label>
                    <label style="width:33%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="how_long" value="<?php echo isset($info['how_long'])?$info['how_long']:''; ?>" style="width:100%;" />How long have you lived there?
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="monthly_pymt" value="<?php echo isset($info['monthly_pymt'])?$info['monthly_pymt']:''; ?>" style="width:100%;" />Monthly Payment
                    </label>
                </td>
                
                </tr>
				
                
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width:100%;" />Mobile Phone Number
                    </label>
                    <label style="width:60%;float:left;display:inline;">
                    	<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width:100%;" />Email address?
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:12%;float:left;display:inline;vertical-align:middle;">
                    	<input type="radio" name="home_status" value="buy" <?php echo (isset($info['home_status']) && $info['home_status']=='buy')?'checked':''; ?> />&nbsp;Buy
                    </label>
                    <label style="width:12%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="home_status" value="rent" <?php echo (isset($info['home_status']) && $info['home_status']=='rent')?'checked':''; ?> />&nbsp;Rent
                    </label>
                    <label style="width:16%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="home_status" value="other" <?php echo (isset($info['home_status']) && $info['home_status']=='other')?'checked':''; ?> />&nbsp;Other
                    </label>
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="prev_address" value="<?php echo isset($info['prev_address'])?$info['prev_address']:''; ?>" style="width:100%;" />Previous Address (If Less than 2 years at current)
                    </label>
                    <label style="width:20%;float:left;display:inline;">
                    	<input type="text" name="prev_how_long" value="<?php echo isset($info['prev_how_long'])?$info['prev_how_long']:''; ?>" style="width:100%;" />How Long?
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:12%;float:left;display:inline;vertical-align:middle;">
                    	<input type="radio" name="fin_status" value="checking" <?php echo (isset($info['fin_status']) && $info['fin_status']=='checking')?'checked':''; ?> />&nbsp;Checking
                    </label>
                    <label style="width:12%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="fin_status" value="saving" <?php echo (isset($info['fin_status']) && $info['fin_status']=='saving')?'checked':''; ?> />&nbsp;Saving
                    </label>
                    <label style="width:16%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="fin_status" value="bankruptcy" <?php echo (isset($info['fin_status']) && $info['fin_status']=='bankruptcy')?'checked':''; ?> />&nbsp;Filed for Bankruptcy
                    </label>
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="prev_city" value="<?php echo isset($info['prev_city'])?$info['prev_city']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:11%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="prev_state" value="<?php echo isset($info['prev_state'])?$info['prev_state']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="prev_zip" value="<?php echo isset($info['prev_zip'])?$info['prev_zip']:''; ?>" style="width:100%;" />Zip
                    </label>                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:70%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="current_employer" value="<?php echo isset($info['current_employer'])?$info['current_employer']:''; ?>" style="width:100%;" />Current Employer
                    </label>
                    <label style="width:28%;float:left;display:inline;">
                    	<input type="text" name="work_phone" value="<?php echo isset($info['work_phone'])?$info['work_phone']:''; ?>" style="width:100%;" />Work Phone
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="monthly_income" value="<?php echo isset($info['monthly_income'])?$info['monthly_income']:''; ?>" style="width:100%;" />Gross Monthly Income
                    </label>
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="position" value="<?php echo isset($info['position'])?$info['position']:''; ?>" style="width:100%;" />Position
                    </label>
                    <label style="width:38%;float:left;display:inline;">
                    	<input type="text" name="how_long_work" value="<?php echo isset($info['how_long_work'])?$info['how_long_work']:''; ?>" style="width:100%;" />How long there?
                    </label>
                    
                </td>
                </tr>

              <tr>
                 <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="employer_address" value="<?php echo isset($info['employer_address'])?$info['employer_address']:''; ?>" style="width:100%;" />Employer Address
                    </label>
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="employer_city" value="<?php echo isset($info['employer_city'])?$info['employer_city']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:11%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="employer_state" value="<?php echo isset($info['employer_state'])?$info['employer_state']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="employer_zip" value="<?php echo isset($info['employer_zip'])?$info['employer_zip']:''; ?>" style="width:100%;" />Zip
                    </label>
                </td>
                
               </tr>
               
               <tr>
                <td colspan="5">
                    <label style="width:70%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="other_income_source" value="<?php echo isset($info['other_income_source'])?$info['other_income_source']:''; ?>" style="width:100%;" />Other Income Source
                    </label>
                    <label style="width:28%;float:left;display:inline;">
                    	<input type="text" name="work_phone" value="<?php echo isset($info['work_phone'])?$info['work_phone']:''; ?>" style="width:100%;" />Other income amount
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                    <td colspan="5">
                        <label style="width:48%;float:left;margin-right:2%;display:inline;">
                            <input type="text" name="prev_employer" value="<?php echo isset($info['prev_employer'])?$info['prev_employer']:''; ?>" style="width:100%;" />Previous Employer (if less than 2 years at current) 
                        </label>
                        <label style="width:18%;float:left;margin-right:2%;display:inline;">
                            <input type="text" name="prev_emp_how_long" value="<?php echo isset($info['prev_emp_how_long'])?$info['prev_emp_how_long']:''; ?>" style="width:100%;" />How Long?
                        </label>
                        <label style="width:30%;float:left;display:inline;">
                            <input type="text" name="prev_emp_phone" value="<?php echo isset($info['prev_emp_phone'])?$info['prev_emp_phone']:''; ?>" style="width:100%;" />Phone
                        </label>
                        
                    </td>
                </tr>
                
                <tr class="black_row">
                	<td colspan="5" valign="middle"><label>Joint/Co-Signer Applicant Information</label>
                    </td>
                </tr>
               <!-- Co-applicant start -->
               
               <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name'])?$info['co_buyer_name']:''; ?>" style="width:100%;" />Applicant Full Name
                    </label>
                    <label style="width:33%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_ssn" value="<?php echo isset($info['co_buyer_ssn'])?$info['co_buyer_ssn']:''; ?>" style="width:100%;" />Social Security Number
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_dob" value="<?php echo isset($info['co_buyer_dob'])?$info['co_buyer_dob']:''; ?>" style="width:100%;" />Date Of Birth
                    </label>
                </td>
                
                </tr>
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_address" value="<?php echo isset($info['co_buyer_address'])?$info['co_buyer_address']:''; ?>" style="width:100%;" />Mailing Address
                    </label>
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_city" value="<?php echo isset($info['co_buyer_city'])?$info['co_buyer_city']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:11%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_state" value="<?php echo isset($info['co_buyer_state'])?$info['co_buyer_state']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_zip" value="<?php echo isset($info['co_buyer_zip'])?$info['co_buyer_zip']:''; ?>" style="width:100%;" />Zip
                    </label>
                </td>
                
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_phone" value="<?php echo isset($info['co_buyer_phone'])?$info['co_buyer_phone']:''; ?>" style="width:100%;" />Home Phone Number
                    </label>
                    <label style="width:33%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_how_long" value="<?php echo isset($info['co_buyer_how_long'])?$info['co_buyer_how_long']:''; ?>" style="width:100%;" />How long have you lived there?
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_monthly_pymt" value="<?php echo isset($info['co_buyer_monthly_pymt'])?$info['co_buyer_monthly_pymt']:''; ?>" style="width:100%;" />Monthly Payment
                    </label>
                </td>
                
                </tr>
				
                
                <tr>
                <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_mobile" value="<?php echo isset($info['co_buyer_mobile'])?$info['co_buyer_mobile']:''; ?>" style="width:100%;" />Mobile Phone Number
                    </label>
                    <label style="width:60%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_email" value="<?php echo isset($info['co_buyer_email'])?$info['co_buyer_email']:''; ?>" style="width:100%;" />Email address?
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:15%;float:left;display:inline;vertical-align:middle;">
                    	<input type="radio" name="co_buyer_home_status" value="buy" <?php echo (isset($info['co_buyer_home_status']) && $info['co_buyer_home_status']=='buy')?'checked':''; ?> />&nbsp;Buy
                    </label>
                    <label style="width:15%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="home_status" value="rent" <?php echo (isset($info['co_buyer_home_status']) && $info['co_buyer_home_status']=='rent')?'checked':''; ?> />&nbsp;Rent
                    </label>
                    <label style="width:20%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="co_buyer_home_status" value="other" <?php echo (isset($info['co_buyer_home_status']) && $info['co_buyer_home_status']=='other')?'checked':''; ?> />&nbsp;Other
                    </label>
                    
                    <label style="width:15%;float:left;display:inline;vertical-align:middle;">
                    	<input type="radio" name="co_buyer_fin_status" value="checking" <?php echo (isset($info['co_buyer_fin_status']) && $info['co_buyer_fin_status']=='checking')?'checked':''; ?> />&nbsp;Checking
                    </label>
                    <label style="width:15%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="co_buyer_fin_status" value="saving" <?php echo (isset($info['co_buyer_fin_status']) && $info['co_buyer_fin_status']=='saving')?'checked':''; ?> />&nbsp;Saving
                    </label>
                    <label style="width:20%;float:left;display:inline; vertical-align:middle;">
                    	<input type="radio" name="co_buyer_fin_status" value="bankruptcy" <?php echo (isset($info['co_buyer_fin_status']) && $info['co_buyer_fin_status']=='bankruptcy')?'checked':''; ?> />&nbsp;Filed for Bankruptcy
                    
                </td>
                </tr>
                
                
                <tr>
                <td colspan="5">
                    <label style="width:70%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_current_employer" value="<?php echo isset($info['co_buyer_current_employer'])?$info['co_buyer_current_employer']:''; ?>" style="width:100%;" />Current Employer
                    </label>
                    <label style="width:28%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_work_phone" value="<?php echo isset($info['co_buyer_work_phone'])?$info['co_buyer_work_phone']:''; ?>" style="width:100%;" />Work Phone
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                <td colspan="5">
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_monthly_income" value="<?php echo isset($info['co_buyer_monthly_income'])?$info['co_buyer_monthly_income']:''; ?>" style="width:100%;" />Gross Monthly Income
                    </label>
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_position" value="<?php echo isset($info['co_buyer_position'])?$info['co_buyer_position']:''; ?>" style="width:100%;" />Position
                    </label>
                    <label style="width:38%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_how_long_work" value="<?php echo isset($info['co_buyer_how_long_work'])?$info['co_buyer_how_long_work']:''; ?>" style="width:100%;" />How long there?
                    </label>
                    
                </td>
                </tr>

              <tr>
                 <td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_employer_address" value="<?php echo isset($info['co_buyer_employer_address'])?$info['co_buyer_employer_address']:''; ?>" style="width:100%;" />Employer Address
                    </label>
                    <label style="width:20%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_employer_city" value="<?php echo isset($info['co_buyer_employer_city'])?$info['co_buyer_employer_city']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:11%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_employer_state" value="<?php echo isset($info['co_buyer_employer_state'])?$info['co_buyer_employer_state']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:25%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_employer_zip" value="<?php echo isset($info['co_buyer_employer_zip'])?$info['co_buyer_employer_zip']:''; ?>" style="width:100%;" />Zip
                    </label>
                </td>
                
               </tr>
               
               <tr>
                <td colspan="5">
                    <label style="width:70%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="co_buyer_other_income_source" value="<?php echo isset($info['co_buyer_other_income_source'])?$info['co_buyer_other_income_source']:''; ?>" style="width:100%;" />Other Income Source
                    </label>
                    <label style="width:28%;float:left;display:inline;">
                    	<input type="text" name="co_buyer_work_phone" value="<?php echo isset($info['co_buyer_work_phone'])?$info['co_buyer_work_phone']:''; ?>" style="width:100%;" />Other income amount
                    </label>
                    
                </td>
                </tr>
                <tr class="black_row">
                	<td colspan="5" valign="middle"><label>References</label></td>
                </tr>
 				<tr>
                	<td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_name1" value="<?php echo isset($info['ref_name1'])?$info['ref_name1']:''; ?>" style="width:100%;" />Name
                    </label>
                    <label style="width:28%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_relationship1" value="<?php echo isset($info['ref_relationship1'])?$info['ref_relationship1']:''; ?>" style="width:100%;" />Relationship
                    </label>
                    <label style="width:30%;float:left;display:inline;">
                    	<input type="text" name="ref_phone1" value="<?php echo isset($info['ref_phone1'])?$info['ref_phone1']:''; ?>" style="width:100%;" />Home Phone Number
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                	<td colspan="5">
                    <label style="width:25%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_city1" value="<?php echo isset($info['ref_city1'])?$info['ref_city1']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:10%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_state1" value="<?php echo isset($info['ref_state1'])?$info['ref_state1']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:10%;float:left;display:inline;">
                    	<input type="text" name="ref_zip1" value="<?php echo isset($info['ref_zip1'])?$info['ref_zip1']:''; ?>" style="width:100%;" />Zip
                    </label>
                    
                </td>
                </tr>  
                
                <tr>
                	<td colspan="5">
                    <label style="width:38%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_name2" value="<?php echo isset($info['ref_name2'])?$info['ref_name2']:''; ?>" style="width:100%;" />Name
                    </label>
                    <label style="width:28%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_relationship2" value="<?php echo isset($info['ref_relationship2'])?$info['ref_relationship2']:''; ?>" style="width:100%;" />Relationship
                    </label>
                    <label style="width:30%;float:left;display:inline;">
                    	<input type="text" name="ref_phone2" value="<?php echo isset($info['ref_phone2'])?$info['ref_phone2']:''; ?>" style="width:100%;" />Home Phone Number
                    </label>
                    
                </td>
                </tr>
                
                <tr>
                	<td colspan="5">
                    <label style="width:25%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_city2" value="<?php echo isset($info['ref_city2'])?$info['ref_city2']:''; ?>" style="width:100%;" />City
                    </label>
                    <label style="width:10%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" name="ref_state2" value="<?php echo isset($info['ref_state2'])?$info['ref_state2']:''; ?>" style="width:100%;" />State
                    </label>
                    <label style="width:10%;float:left;display:inline;">
                    	<input type="text" name="ref_zip2" value="<?php echo isset($info['ref_zip2'])?$info['ref_zip2']:''; ?>" style="width:100%;" />Zip
                    </label>
                    
                </td>
                </tr>           
                <tr>
                <td colspan="5">
                <p class="terms">Applicant(s) hereby authorizes an investigation of his/her/their credit and employment history. Applicant(s) understand(s) that his/ her/ their credit and employment history obtained in and in connection with this credit application will be used in determining his/her/their eligibility for credit approval by the banks receiving this application. This application will be kept and used by us and/or other agencies for the use of obtaining financing through the investigation of credit and/or employment history.</p>
                </td>
                </tr>    
               
                <tr>
                	<td colspan="5">
                    <label style="width:44%;float:left;margin-right:2%;display:inline;">
                    	X<input type="text" class="border_input"  style="width:97%;" />Applicant
                    </label>
                    <label style="width:10%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" class="border_input"  style="width:100%;" />Date
                    </label>              
                    
                </td>
                </tr>  
                
                 <tr>
                	<td colspan="5">
                    <label style="width:44%;float:left;margin-right:2%;display:inline;">
                    	X<input type="text" class="border_input"  style="width:97%;" />Applicant
                    </label>
                    <label style="width:10%;float:left;margin-right:2%;display:inline;">
                    	<input type="text" class="border_input"  style="width:100%;" />Date
                    </label>              
                    
                </td>
                </tr>
                </table>
                          
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
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
