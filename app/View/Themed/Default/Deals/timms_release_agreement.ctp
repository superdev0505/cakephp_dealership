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
	<div id="worksheet_container" style="width: 1000px; margin: 0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {} 		
			
			input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	label{font-size: 14px; margin-bottom: 1ps !important}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: 30px;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000; text-align: center;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 2px 2px; }
	td input[type="text"]{text-align: center;}
		input[type="text"]{margin: 0px!important; padding: 0px !important;}	
	@media print { 
	.dontprint{display: none;}
		/*body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
		label{font-size: 12px}
		
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; margin: 0; padding: 0;}
	label{font-size: 13px;}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}*/
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div style="">
		
		<!-- upper part start  -->
			<!-- second page start -->
				<div class="row" style="margin-top: 7px; float: left; width: 100%;">
					<div class="logo" style="width: 100px; margin: 0 auto;">
						<img  src="<?php echo ('/app/webroot/files/logo/harley_logo.png'); ?>" alt="" style="width: 100%;">
					</div>
					<h2 style="margin: 20px 0 0; text-align: center;">WAIVER & RELEASE OF LIABILITY AGREEMENT</h2>
					<P style="margin: 0; text-align: center; margin-bottom: 7px;">FOR PERSONS DESIRING TO TEST RIDE</P>
					<div class="row" style="float: left; width: 100%; text-align: justify;">
						<div class="one-half" style="float: left; width: 48%;">
							<p style="margin: 0 0 10px 0;">I, the understanding, have been given the opportunity by <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name'] ?>" style="width: 70%;"> "Dealer" to operate, ride upon or otherwise  use one or more motorcycles or other vehicles owned by the Dealer.</p>
							<p style="margin: 0 0 10px 0;">I fully understand and acknowledge that operating or riding on a motorcycle, three-wheeled vehicle, or motorcycle with a sidecar (collectively referred to as a "motorcycle") is an activity  that has its own unique risks, and that serious injury or even death could result from  operating or riding on such a vehicle through no fault on my own.</p>
							<p style="margin: 0 0 10px 0;">I am voluntarily choosing to operate and/or ride upon a Motocycle. By signing below, and in consideration of the  opportunity granted to me to operate, ride upon or otherwise use one or motorcycles, and for other valuable consideration, the recepit and adequacy of which are hereby acknowledged, I hereby on behalf of myself and on behalf of my heirs, personal representatives, administrators, executors, successors and assigns (collectively, "Heirs and assigns"), act and expressly agree as follows:</p>
							<p style="margin: 0 0 10px 0;"><strong>I HEREBY ASSUME THE ENTIRE RISK OF ANY ACCIDENTS OR PERSONAL INJURY. INCLUDING PERMANENT DISABILITY. PARALYSIS AND DEATH, THAT I MIGHT SUFFER AS A RESULT OF MY OPERATING O RIDING ON A MOTORCYCLE.</strong> Without limilting the foregoing, <strong>I ASSUME ALL RISKS ARISING FROM THE FOLLOWING:</strong> (i) the condition or safety of the Motorcycle, any other vehicles or equipment, or any roadways, premiss or property; (ii) the repair or maintenance, or lack thereof, of the Motorcycle or any other vehicles or equipment; (iii) the use of, or failure to use, any safety devices or safeguards; (iv) the conditiond, qualifications, instructions, rules or procedures under which any Motorcycle is used; (v) the weather conditions during operation of any Motorcycle; and (vii) single and/or multi-vehicle accidents.</p>
							<p style="margin: 0 0 10px 0;">Additionaly, I hereby RELEASE, WAIVE AND FOREVER DISCHARGE the Dealership as well as Harley-Davidson Motor Company's officers, directors, employees, and agents (collectively, the "Released Parties"), from <strong>ANY AND ALL NEGLIGENCE AND BREACH OF WARRANTY CLAIMS, DEMANDS, RIGHTS AND BREACH OF WARRANTY CLAIMS, DEMANDS, RIGHTS AND CAUSES OF ACTION</strong> (collectively, "Claims") <strong>OF ANY KIND WHATSOEVER</strong> that I or any of my Heirs and Assigns now have or later may have against any Released Party resulting from, connected with or arising out of my operation of or riding on any Motorcycle, regardless of whether such Claims relate to the repair, operation or maintenance of any Motorcycle, or the conditions, rules, qualifications,</p>
						</div>
						<div class="one-half" style="float: right; width: 48%;">
							<p style="margin: 0 0 10px 0;">instructions or procedures under which any Motocycle is used, or any other cause or matter</p>
							<p style="margin: 0 0 10px 0;">I acknowledge and understand that as to the Claims released above, this <strong>Agreement EXTENDS TO, AND RELEASES, DISCHARGES AND WAIVES LIABILITY FOR, ANY AND ALL SUCH CLAIMS</strong> that I or any of my Heirs and Assigns have or later may have against the released Parties resulting from or arising out of my operation of or riding on Motorcycles, including without limitation all succh claims resulting from the <strong>NEGLIGENCE</strong> of any Released Party, or resulting from any <strong>BREACH OF ANY EXPRESS OR IMPLIED WARRANTY</strong> by any released Party, and regardless of whether such Claims now exit or hereafter arise, or are known or unknown, contingent or absolute, liquidated or unliquidated or foreseen or unforeseen, or arise by operation of law or otherwise. I acknowledge and undertand that by my signing this  Agreement I ( on my own behalf and on behalf of my Heirs and Assigns) <stron>COVENANT AND AGREE NOT TO SUE</strong> any or all of the Released Parties for any cause of action released or waived hereby for any injury, death or damage to myself, resulting from or arising out of my operation of or riding on any Motorcycle.</p>
							<p style="margin: 0 0 10px 0;">Thiis Agreement does not, release: (i) nay claims form harm caused by a Released Party intentionally or recklessly; (ii) claims for worker's compensation benefits (if any) that I or my Heirs and Assigns may have; or (iii) claims that I or my Heirs and Assigns may have (if any) under or against any benefit plans sponsored by my employer, including claims under disability or life insurance plans, resulting from my operation of or riding on any Motorcycles. I acknowledge that worker's compensation laws may or may not apply to my use of the Motorcycles, depending upon the circumstances.</p>
							<p style="margin: 0 0 10px 0;">I confirm that this Agreement is intended to be as broad and inclusive as is permitted by law. To the extent that the scope of this Agreement is unenforceable in any jurosdiction, said scope will, as to make this Agreement enforceable in such jurisdiction, without invalidating any other position of this Agreement. I acknowedge I have the right and opportunty to negitiate the ters of this Agreement, and I hereby waive such right. I understand that by choosing voluntarily to sign below I am giving up important legal rights. By signing this Agreement I certify that I have read this Agreement and fully understand it, that I am not relying on any statements or representations of any of the Released Parties, and that I have been given the  opportunity and sufficient time to read and ask questions regarding this Agreement. This Agreement sets forth the entire agreement between me and the Dealership regarding the topics addredded herein, and may only be modified or terminated with the writen concent of me and the Dealership. </p>
						</div>
					</div>
					<h2 style="float: left; font-size: 17px; text-align: center; width: 100%;">THIS IS A WAIVER & RELEASE OF LIABILITY AGREEMENT - PLEASE READ CAREFULLY BEFORE SIGNING</h2>
					<div class="row bottom-part" style="float: left; width: 100%; margin: 0;">
						<div class="one-half" style="float: left; width: 48%;">
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label>Date:</label>
								<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 90%;">
								<p style="margin: 0; text-align: center;">(mm/dd/yyyy)</p>
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<strong>Circle One:</strong>
								<strong style="margin: 0 0 0 6%;">Operator <span style="margin: 0 4%;">-</span></strong>
								<strong style="margin: 0;">Passenger <span style="margin: 0 4%;">-</span></strong>
								<strong style="margin: 0;">Both</strong>
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label>First Name:</label>
								<input type="text" name="first_name" value="<?php echo isset($info['first_name'])?$info['first_name']:''; ?>" style="width: 79%;">
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label>Address:</label>
								<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 82.4%;">
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label><sup>*</sup>Email:</label>
								<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 87%;">
								<p style="margin: 0; font-size: 11px;">By providing my email address, I agree that I want recive promotional emails from <br> Harley-Davidson, Harley-Davidson's Privacy Policy can be found at www.h-d.com/privacy</p>
							</div>
							
						</div>
						<div class="one-half" style="float: right; width: 48%;">
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;" >
								<label>Signed:</label>
								<input type="text" name="name" style="width: 87%;">
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label style="font-family:italicize;">Please print clearly. All fields required except denoted by<sup>*</sup></label>
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label>Last Name:</label>
								<input type="text" name="last_name" value="<?php echo isset($info['last_name'])?$info['last_name']:''; ?>" style="width: 80%;">
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<div class="field" style="width: 50%; float: left;">
									<label>Address:</label>
									<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 66%;">
								</div>
								<div class="field" style="width: 20%; float: left;">
									<label>State:</label>
									<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 44%;">
								</div>
								<div class="field" style="width: 30%; float: left;">
									<label>Zip:</label>
									<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 69%;">
								</div>
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
								<label>Phone:</label>
								<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 87%;">
							</div>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-field" style="float: left; width: 22%;">
							<label>Dealership number:</label>
							<input type="text" name="dealer_number" value="<?php echo isset($info['dealer_number'])?$info['dealer_number']:''; ?>" style="width: 28%;">
						</div>
						<div class="form-field" style="float: left; width: 38%;">
							<label>Salesperson First Name:</label>
							<?php 
							$sperson_name_arr = explode(' ',$sperson);
							
							?>
                            
                            <input type="text" name="sperson_first" value="<?php echo isset($info['sperson_first'])?$info['sperson_first']:$sperson_name_arr[0]; ?>" style="width: 44%;">
						</div>
						<div class="form-field" style="float: left; width: 38%;">
							<label>Salesperson Last Name:</label>
							<input type="text" name="sperson_last" value="<?php echo isset($info['sperson_last'])?$info['sperson_last']:$sperson_name_arr[1]; ?>" style="width: 46%;">
						</div>
					</div>
				</div>
			<!-- second page end -->
			
			
		
		
		
	</div>
		<!-- container end -->
		
			
	
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
