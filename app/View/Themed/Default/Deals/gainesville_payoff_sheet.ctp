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
<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width: 100%; margin: 0 auto;">
	
    <style>
/* css code should be here you can use CSS Class and id as well */
@media print { 
		/* All CSS that we need to modify for print view should be here */
	}
	
input{border-bottom: 2px solid #000; border-top: 0; border-left:0; border-right: 0;}
p{font-size: 16px;line-height: 20px;}
.caps-text p{ font-size: 16px; margin: 11px 0; }
span {text-transform: uppercase;}
.lower-text p {
	font-size: 14px;
	line-height: 20px;
	margin: 40px 0 12px;
}
</style>	


	
		<h2 style="border: 4px solid #000; font-size: 25px; line-height: 36px; text-align: center; letter-spacing: 6px;">PAYOFF FORM</h2>
		<div class="logo" style="width: 148px; margin: 0 auto 11px; ">
			<img src="<?php echo ('/app/webroot/files/logo/gainesville.png'); ?>" alt="">
		</div>
		<div class="address" style="text-align: center; font-size: 20px; font-weight: bold;">
			DEALER #0675 <br> 4125 NW 97th BLVD <br> GAINESVILLE, FL 32606 <br> (352) 331-6363
		</div>
		
		<div class="long-text" style="width: 840px; margin: 0 auto;">
			<p>I, <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 270px;">, the undersigned authorize Gainesville Harley-Davidson, Inc. to pay off the balance due on my [trade-in] vehicle, and the title is to be sent to Gainesville Harley-Davidson, Inc. at the above address.  </p>
			<p>I agree to pay the amount due over $ <input type="text" name="dolor" value="<?php echo isset($info['dolor'])?$info['dolor']:''; ?>" style="width: 272px;"> to Gainesville Harley-Davidson, Inc.</p>
			<p>I understand that Gainesville Harley-Davidson must have the title on file before any refund is processed. </p>
			
			<div class="caps-text">
				<p>GAINESVILLE HARLEY-DAVIDSON, INC. WILL PAY OFF A:</p>
				<p><span>YEAR: </span> <input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:136px"> <span style="margin-left: 3px;">MAKE : </span> <input type="text" name="make" style="width:136px" value="<?php echo isset($info['make'])?$info['make']:''; ?>" > <span style="margin-left: 3px;">MODEL :</span> <input type="text" name="model" style="width: 335px" value="<?php echo isset($info['model'])?$info['model']:''; ?>" ></p>
				<p><span>Vin :</span> <input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 789px"></p>
				<p><span>FINANCIAL INSTITUTION:</span> <input type="text" name="fi" value="<?php echo isset($info['fi'])?$info['fi']:''; ?>" style="width: 603px"></p>
				<p><span>Address:</span> <input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 742px"></p>
				<p><span>Telephone:</span> <input type="text" name="telephone" value="<?php echo isset($info['telephone'])?$info['telephone']:''; ?>" style="width:720px"></p>
				<p><span>FAX/Email:</span> <input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 725px"></p>
				<p><span>Customer Name:</span> <input type="text" name="cust_name"  value="<?php echo isset($info['cust_name'])?$info['cust_name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 666px"> </p>
				<p><span>Account #:</span> <input type="text" name="account" value="<?php echo isset($info['account'])?$info['account']:''; ?>" style="width:720px"></p>
				<p><span>PAYOFF IN THE AMOUNT OF:</span> <input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width:180px">  <span style="margin-left: 3px;">Good Until:</span> <input type="text" name="good_until" value="<?php echo isset($info['good_until'])?$info['good_until']:''; ?>" style="width:259px"></p>
				<p><span>Customer Signature:</span> <input type="text" name="cust-sig" style="width:616px"></p>
				<p><span>DATE:</span> <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width: 779px"></p>
				
				<div class="lower-text">
					<p>DUE TO THE DIFFERENCE IN THE TAG & TITLE COSTS, CUSTOMERS WILL EITHER RECEIVE A REFUND OR WILL BE REQUIRED TO PAY THE AMOUNT OF THE DIFFERENCE THAT WAS ESTIMATED FOR THE TAG & TITLE FEES.  PLEASE CONFIRM THAT GAINESVILLE HARLEY-DAVIDSON HAS THE CORRECT INFORMATION FOR THE TAG & TITLE TRANSACTION.  THE STATE OF FLORIDA WILL CHARGE ADDITIONAL FEES AFTER 30 DAYS, WHICH THE CUSTOMER WILL BE RESPONSIBLE FOR.  </p>
				</div>
				
				
			</div>
			
		</div>
	
	
	
	
    
			
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
