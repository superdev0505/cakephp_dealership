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
	label{font-size: 13px; font-weight: normal;}
	
	.left label, .right label{font-size: 12px;}
	table input[type="text"]{border: 0px;}
	table{border-bottom: 1px solid #000; border-right: 1px solid #000;}
	td, th{border-left: 1px solid #000; border-top: 1px solid #000; padding: 2px; font-size: 12px;}
	th{text-align: center;}
	td input[type="text"]{padding: 2px !important;}
	.wraper.main input {padding: 0px;}
}
	.one-fourth label{font-size: 13px;}
	.one-fourth{font-size: 13px;}
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<h2 style="float: left; width: 100%; text-align: center; font-size: 20px; margin: 10px 0;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/lmgcreditapplication.jpg'); ?>" alt="" style="width: 21px;"> <b>LMG Credit Application</b></h2>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%; border: 1px solid #000; padding: 10px 11px;">
				<p style="color: red;"><span>Fax: 1.877.806.6249</span>  <span>Tel: 1.877.806.6247</span></p>
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<table cellpadding="0" cellspacing="0" width="100%;" style="color:red;">
					<tr>
						<td>Dealership:</td>
						<td><input type="text" name="company" value="<?php echo $info['company']; ?>" style="width: 100%; color:red;"></td>
					</tr>
					
					<tr>
						<td>Salesperson:</td>
						<td><input type="text" name="sperson" value="<?php echo $sperson; ?>" style="width: 100%; color:red;"></td>
					</tr>
				</table>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; font-size: 20px; margin: 10px 0;"><b>Borrower's Information</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<table cellpadding="0" cellspacing="0" width="100%;">
					<tr>
						<td>Driver's License #:</td>
						<td><input type="text" name="driver_license" value="<?php echo isset($info['driver_license'])?$info['driver_license']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Expiry Date:</td>
						<td><input type="text" name="expiry_date" value="<?php echo isset($info['expiry_date'])?$info['expiry_date']:''; ?>" style="width: 30%;">
					</tr>
					<tr>
						<td>First Name:</td>
						<td><input type="text" name="first_name" value="<?php echo $info['first_name']; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Middle Name:</td>
						<td><input type="text" name="m_name" value="<?php echo $info['m_name']; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td><input type="text" name="last_name" value="<?php echo $info['last_name']; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>SIN:</td>
						<td><input type="text" name="sin_number" value="<?php echo isset($info['sin_number'])?$info['sin_number']:''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Date of Birth:</td>
						<td><input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 30%;">
						</td>
					</tr>
					<tr>
						<td>Marital Status</td>
						<td><span style="margin: 0 32px 0 0;"><input type="checkbox" name="marital_status" value="Married" <?php echo ($info['marital_status'] == "Married") ? "checked" : ""; ?> /> Married</span>
						<span><input type="checkbox" name="marital_status" value="Common Law" <?php echo ($info['marital_status'] == "Common Law") ? "checked" : ""; ?> /> Common Law</span>
						<span style="margin: 0 32px;"><input type="checkbox" name="marital_status" value="Single" <?php echo ($info['marital_status'] == "Single") ? "checked" : ""; ?> /> Single</span>
						<span><input type="checkbox" name="marital_status" value="Divorced" <?php echo ($info['marital_status'] == "Divorced") ? "checked" : ""; ?> /> Divorced</span>
						</td>
					</tr>
					<tr>
						<td>Physical Address</td>
						<td><input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td style="border-top: 0px;">City:</td>
						<td><input type="text" name="city" value="<?php echo isset($info["city"]) ? $info["city"] : $info["city"] ?>" style="width: 60%;">
							<label>Province</label>
							<input type="text" name="state" value="<?php echo $info['state']; ?>" style="width: 30%;">
						</td>
					</tr>
					
					<tr>
						<td style="border-top: 0px;">Postal Code:</td>
						<td><input type="text" name="zip" value="<?php echo $info['zip']; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Time at Residence</td>
						<td><input type="text" name="residence" value="<?php echo isset($info['residence'])?$info['residence']:''; ?>" style="width: 20%;">/
						<label>Years</label>
						<input type="text" name="years" value="<?php echo isset($info['years'])?$info['years']:''; ?>" style="width: 70%;">
					</td>
					</tr>
					<tr>
						<td>Home Telephone #:</td>
						<td>(<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 20%;">) <input type="text" name="phone1"  value="<?php echo isset($info['phone1'])?$info['phone1']:''; ?>" style="width: 70%;"></td>
					</tr>
					<tr>
						<td>Cell Phone #:</td>
						<td>(<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 20%;">) <input type="text" name="mobile1" value="<?php echo isset($info['mobile1'])?$info['mobile1']:''; ?>" style="width: 70%;"></td>
					</tr>
					<tr>
						<td>Email Address:</td>
						<td><input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : $info['email']?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Employer's Name:</td>
						<td><input type="text" name="employment_name" value="<?php echo isset($info['employment_name']) ? $info['employment_name'] : "" ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Length of Employment:</td>
						<td><input type="text" name="employment_yrs" value="<?php echo isset($info['employment_yrs']) ? $info['employment_yrs'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td>Work Office Telephone #:</td>
						<td>(<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : "" ?>" style="width: 20%;">) <input type="text" name="work_number1" value="<?php echo isset($info['work_number1']) ? $info['work_number1'] : "" ?>" style="width: 70%;"></td>
					</tr>
					<tr>
						<td>Work Address:</td>
						<td><input type="text" name="previous_address" value="<?php echo isset($info['previous_address']) ? $info['previous_address'] : "" ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Occupation:</td>
						<td><input type="text" name="occupation" value="<?php echo isset($info['occupation']) ? $info['occupation'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					
					<tr>
						<td>Gross Monthly Income:</td>
						<td>$<input type="text" name="monthly_income" value="<?php echo isset($info['monthly_income'])?$info['monthly_income']:''; ?>" style="width: 96%;"></td>
					</tr>
					
					
					<tr>
						<td>Residential Status:</td>
						<td><span><input type="checkbox" name="residen_status" value="Owner" <?php echo ($info['residen_status'] == "Owner") ? "checked" : ""; ?> /> Owner</span>
						<span style="margin: 0 32px;"><input type="checkbox" name="residen_status" value="Rental" <?php echo ($info['residen_status'] == "Rental") ? "checked" : ""; ?> /> Rental</span>
						<span><input type="checkbox" name="residen_status" value="Other" <?php echo ($info['residen_status'] == "Other") ? "checked" : ""; ?> /> Other</span>
						</td>
					</tr>
						
					<tr>
						<td>Mortgage/RentPayment:</td>
						<td>$<input type="text" name="rent_payment" value="<?php echo isset($info['rent_payment'])?$info['rent_payment']:''; ?>" style="width: 25%;">/
							<label> Month </label>
							<input type="text" name="mort_month" value="<?php echo isset($info['mort_month'])?$info['mort_month']:''; ?>" style="width: 40%;">
						</td>
					</tr>
					
					<tr>
						<td>Property value:</td>
						<td>$<input type="text" name="property" value="<?php echo isset($info['property'])?$info['property']:''; ?>" style="width: 96%;"></td>
					</tr>
					
					<tr>
						<td>Mortgage Balance:</td>
						<td>$<input type="text" name="mortage_balance" value="<?php echo isset($info['mortage_balance'])?$info['mortage_balance']:''; ?>" style="width: 96%;"></td>
					</tr>
					
					<tr>
						<td>Mortgage Holder (Bank):</td>
						<td>$<input type="text" name="mortage_holder" value="<?php echo isset($info['mortage_holder'])?$info['mortage_holder']:''; ?>" style="width: 96%;"></td>
					</tr>
					
				</table>
		</div>
		<h2 style="float: left; width: 100%; font-size: 20px; margin: 10px 0;"><b>Applicant Agreement and Signature</b></h2>
		
		<div class="text" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
			<p style="font-size: 13px; margin: 0 0 9px 0;">I certify that the information I have given on this form i correct. I am applying for a loan from the Seller to purchase a chattel as described in the Seller's Bill of sale. The Seller will be referring this application to a Financial Institution because the Seller intends to assign this loan to the FinancialInstitution, if my loan is approved. This loan is a seprate transaction from the purchase; my obligation to make loan payments will not be affected by any dispute that may arise between me and the Seller.</p>
			<p style="font-size: 13px;">THE SELLER AND THE FINANCIAL INSTITUTION MAY FROM TIME TO TIME GIVE ANY CREDIT AND OTHER INFORMATION ABOUT ME, INCLUDING ANY INFORMATION ON THIS FORM, TO, OR RECEIVED SUCH INFORMATION FROM: (A) ANY CREDIT BUREAU OR REPORTING AGENCY: (B) ANY PERSON WITH WHOM I HAVE OR PURPOSE TO HAVE FINANCIAL DEALINGS; AND (C) ANY PERSON IN CONNECTION WITH ANY DEALINGS I HAVE OR PROPOSE TO HAVE WITH THE DEALER OR FINACIAL INSTITUTION.</p>
			<p style="font-size: 13px;">I agree that the Financial Institution amy use that information to establish and maintain my relationshio with it and to offer me any services as permitted by law.</p>
			<p style="font-size: 13px;">If there is a "Buyer" and "CO-Buyer", all references on this document to "I", "me" and "my" apply to both.</p>
		</div>
		
		<div class="text" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
			<p style="font-size: 13px;">The last thing we need to process you application is your signature. Each applicant must personally sign the application.</p>
			
			<div class="frm-field-outer" style="float: left; width: 100%;">
				<div class="form-field" style="float: left; width: 40%">
					<label><b>Borrower</b></label>
					<input type="text" name="borrower" value="<?php echo isset($info['borrower'])?$info['borrower']:''; ?>" style="width: 76%; border-bottom: 0px;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label><b>Co-Borrower</b></label>
					<input type="text" name="co_borrower" value="<?php echo isset($info['co_borrower'])?$info['co_borrower']:''; ?>" style="width: 76%; border-bottom: 0px;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label><b>Date</b></label>
					<input type="text" name="date" value="<?php echo isset($info['date'])?$info['date']:''; ?>" style="width: 76%; border-bottom: 0px;">
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
