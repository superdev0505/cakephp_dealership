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

?>

<div class="wraper main" id="worksheet_wraper"  style="overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px; height:1056 margin:0 auto;">
		<style>

/*General Start*/
input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 12px; margin-bottom: 0; font-weight: normal;}
	.wraper.main input {padding: 0px;}
	table{border-right: 1px solid #000; border-top: 1px solid #000;}
	th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 4px; font-size: 13px;}

body{-webkit-print-color-adjust:exact;}
@media print {
	input[type="text"]{padding: 0px;}
	.dontprint{display: none;}
	label{height: 21px !important; line-height: 21px !important;}
	.noprint {
        display: none;
    }
}
</style>
	<?php  if($edit){?>
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
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
				<input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: let; width: 100%; margin: 3px 0;">
			<table cellpadding="0" cellspacing="0" style="float: left; width: 100%;">
				<tr>
					<td align="center" bgcolor="#000;" colspan="3" style="color: #fff;">First Contact Questions</td>
				</tr>
				<tr>
					<td style="text-align: right; width: 34%;">Lead Received</td>
					<td style="width: 33%;"><input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;"></td>
					<td style="width: 33%;"><input type="text" name="date1" value="<?php echo isset($info["date1"]) ? $info['date1'] : ''?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td style="text-align: right;">Appoinment Date & Time</td>
					<td><input type="text" name="app_date1" value="<?php echo isset($info["app_date1"]) ? $info['app_date1'] : ''?>" style="width: 100%;"></td>
					<td><input type="text" name="app_date2" value="<?php echo isset($info["app_date2"]) ? $info['app_date2'] : ''?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
				<tr>
					<td>Name:</td>
					<td colspan="2"><input type="text" name="name" value="<?php echo isset($info["name"]) ? $info['name'] : $info['first_name']." ".$info['last_name'];?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Home Phone:</td>
					<td colspan="2"><input type="text" name="phone" value="<?php echo isset($info["phone"]) ? $info['phone'] : ''?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Cell Phone:</td>
					<td colspan="2"><input type="text" name="mobile" value="<?php echo isset($info["mobile"]) ? $info['mobile'] : ''?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Work Phone:</td>
					<td colspan="2"><input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Email:</td>
					<td colspan="2"><input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>DOB:</td>
					<td colspan="2"><input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Address:</td>
					<td colspan="2"><input type="text" name="address_data" value="<?php echo isset($info['address_data'])?$info['address_data'] : $info['address'].' '.$info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Time at Address:</td>
					<td colspan="2"><input type="text" name="time_address" value="<?php echo isset($info['time_address'])?$info['time_address']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Monthly Payment:</td>
					<td colspan="2"><input type="text" name="mon_pay" value="<?php echo isset($info['mon_pay'])?$info['mon_pay']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Rent or Own:</td>
					<td colspan="2"><input type="text" name="own" value="<?php echo isset($info['own'])?$info['own']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Marital Status:</td>
					<td colspan="2"><input type="text" name="marital" value="<?php echo isset($info['marital'])?$info['marital']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr style="background-color: #777; color: #fff; text-align: center">
					<td>Mortgage company</td>
					<td>Market Value</td>
					<td>Mortgage Balance</td>
				</tr>
				
				<tr>
					<td><input type="text" name="mort_company" value="<?php echo isset($info['mort_company'])?$info['mort_company']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="market_value" value="<?php echo isset($info['market_value'])?$info['market_value']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="mort_balance" value="<?php echo isset($info['mort_balance'])?$info['mort_balance']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
				
				<tr>
					<td>Bankruptcy?</td>
					<td colspan="2"><input type="text" name="bankru" value="<?php echo isset($info['bankru'])?$info['bankru']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Consumer Proposal?</td>
					<td colspan="2"><input type="text" name="cus_prosal" value="<?php echo isset($info['cus_prosal'])?$info['cus_prosal']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr style="background-color: #777; color: #fff; text-align: center">
					<td>Who is your trustee?</td>
					<td>What are you payments?</td>
					<td>How many payments left?</td>
				</tr>
				
				<tr>
					<td><input type="text" name="trustee" value="<?php echo isset($info['trustee'])?$info['trustee']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="payment" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="pay_left" value="<?php echo isset($info['pay_left'])?$info['pay_left']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>SIN#</td>
					<td colspan="2"><input type="text" name="sin_number" value="<?php echo isset($info['sin_number'])?$info['sin_number']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
				<tr>
					<td>Occupation:</td>
					<td colspan="2"><input type="text" name="occup" value="<?php echo isset($info['occup'])?$info['occup']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Employer:</td>
					<td colspan="2"><input type="text" name="employer" value="<?php echo isset($info['employer'])?$info['employer']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Time with Employer:</td>
					<td colspan="2"><input type="text" name="time_employee" value="<?php echo isset($info['time_employee'])?$info['time_employee']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Work Phone:</td>
					<td colspan="2"><input type="text" name="work_phone" value="<?php echo isset($info['work_phone'])?$info['work_phone']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Monthly Income:</td>
					<td colspan="2"><input type="text" name="mon_incom" value="<?php echo isset($info['mon_incom'])?$info['mon_incom']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Work Address:</td>
					<td colspan="2"><input type="text" name="work_address" value="<?php echo isset($info['work_address'])?$info['work_address']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Hourly wage x hours/week:</td>
					<td colspan="2"><input type="text" name="houly_wage" value="<?php echo isset($info['houly_wage'])?$info['houly_wage']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
				
				<tr>
					<td>Who do you bank with?</td>
					<td colspan="2"><input type="text" name="bank" value="<?php echo isset($info['bank'])?$info['bank']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Have you applied for a car loan in the past 12 months?</td>
					<td colspan="2"><input type="text" name="car_loan" value="<?php echo isset($info['car_loan'])?$info['car_loan']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>What are you driving now? (year make model mileage)</td>
					<td colspan="2"><input type="text" name="driving" value="<?php echo isset($info['driving'])?$info['driving']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>(Do you owe any money on it?)(if yes, what bank?)</td>
					<td colspan="2"><input type="text" name="money" value="<?php echo isset($info['money'])?$info['money']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Are you interested in trading it in?</td>
					<td colspan="2"><input type="text" name="trading" value="<?php echo isset($info['trading'])?$info['trading']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Are you looking for basic transportation... or something more?</td>
					<td colspan="2"><input type="text" name="transport" value="<?php echo isset($info['transport'])?$info['transport']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>(Cheap payments, cheap on gas, cheap on insurance?)</td>
					<td colspan="2"><input type="text" name="cheap" value="<?php echo isset($info['cheap'])?$info['cheap']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>What sort of monthly payments are you looking for?</td>
					<td colspan="2"><input type="text" name="month_pay" value="<?php echo isset($info['month_pay'])?$info['month_pay']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>How much can you put down?</td>
					<td colspan="2"><input type="text" name="put_down" value="<?php echo isset($info['put_down'])?$info['put_down']:''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td> 	
				</tr>
				
				<tr>
					<td>
						<label>1)PHONE, TEXT & EMAIL</label>
						<input type="text" name="tran_info1" value="<?php echo isset($info['tran_info1'])?$info['tran_info1']:''; ?>">
					</td>
					<td>
						<label>6) EMAIL</label>
						<input type="text" name="email1" value="<?php echo isset($info['email1'])?$info['email1']:''; ?>" >
					</td>
					<td>
						<label>11) TEXT</label>
						<input type="text" name="text1" value="<?php echo isset($info['text1'])?$info['text1']:''; ?>">
					</td>	
				</tr>
				
				<tr>
					<td>
						<label>2)EMAIL</label>
						<input type="text" name="email2" value="<?php echo isset($info['email2'])?$info['email2']:''; ?>">
					</td>
					<td>
						<label>7)PHONE & TEXT</label>
						<input type="text" name="tran_info2" value="<?php echo isset($info['tran_info2'])?$info['tran_info2']:''; ?>">
					</td>
					<td>
						<label>12) NO CONTACT</label>
						<input type="text" name="contact1" value="<?php echo isset($info['contact1'])?$info['contact1']:''; ?>">
					</td>	
				</tr>
				
				<tr>
					<td>
						<label>3)PHONE & TEXT</label>
						<input type="text" name="tran_info3" value="<?php echo isset($info['tran_info3'])?$info['tran_info3']:''; ?>">
					</td>
					<td>
						<label>8)NO CONTACT</label>
						<input type="text" name="contact2" value="<?php echo isset($info['contact2'])?$info['contact2']:''; ?>">
					</td>
					<td>
						<label>13) EMAIL CUSTOMER</label>
						<input type="text" name="e_customer1" value="<?php echo isset($info['e_customer1'])?$info['e_customer1']:''; ?>">
					</td>	
				</tr>
				
				<tr>
					<td>
						<label>4)NO CONTACT</label>
						<input type="text" name="contact3" value="<?php echo isset($info['contact3'])?$info['contact3']:''; ?>">
					</td>
					<td>
						<label>9)NO CONTACT</label>
						<input type="text" name="contact4" value="<?php echo isset($info['contact4'])?$info['contact4']:''; ?>">
					</td>
					<td>
						<label>14) PHONE, TEXT & EMAIL</label>
						<input type="text" name="tran_info4" value="<?php echo isset($info['tran_info4'])?$info['tran_info4']:''; ?>" style="width: 40%;">
					</td>	
				</tr>
				
				<tr>
					<td>
						<label>5) PHONE, TEXT & EMAIL</label>
						<input type="text" name="tran_info5" value="<?php echo isset($info['tran_info5'])?$info['tran_info5']:''; ?>">
					</td>
					<td>
						<label>10)PHONE, TEXT & EMAIL</label>
						<input type="text" name="tran_info6" value="<?php echo isset($info['tran_info6'])?$info['tran_info6']:''; ?>" style="width: 40%;">
					</td>
					<td>
						<label>15) DORMANT</label>
						<input type="text" name="dormant" value="<?php echo isset($info['dormant'])?$info['dormant']:''; ?>">
					</td>	
				</tr>
				
			</table>
		</div>
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
<div class="noprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print </button>
		<button class="btn btn-inverse pull-right"  data-dismiss="modal" style="margin-left:5px;" type="button">Close</button>
		
		<?php /*?><select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select><?php */?>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;" >Submit</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	
	
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
