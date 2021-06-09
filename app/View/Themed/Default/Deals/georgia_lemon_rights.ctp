
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
		
		body{ margin:0 10%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.law_state{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.law_state2{ width:80%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.law_state3{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.law_state4{border: solid 2px #000 !important;
		
		  -webkit-appearance: none;
		  -moz-appearance: none;
		  -o-appearance: none;
		  appearance: none;
		  width: 25px;
		  height: 25px; vertical-align:middle;
		  margin-right: 10px;}
		  
		  .fact_com{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.fact_com2{ width:80%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.fact_com2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.fact_com2{border: solid 2px #000 !important;
		  -webkit-appearance: none;
		  -moz-appearance: none;
		  -o-appearance: none;
		  appearance: none;
		  width: 25px;
		  height: 25px; vertical-align:middle;
		  margin-right: 10px;}
				
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:20px 20px; }
		#worksheet_container {width:900px !important;}
		#worksheet_wraper {width:100%;}
		}
		
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:28px; color:#333; font-weight:600; padding:9px 0; text-align:center;"> The Georgia Lemon Law <br /> Statement of Consumer Rights  </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="font-size:18px; color:#333; padding:9px 0; text-align:center; line-height:25px;"> Governor's Office of consumer Affaris <br /> 2 M.L. King Jr. Drive, Suite 356 <br />Atlanta, GA 30334 <br /> (404) 656-3790 </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
			  <tr>
			    <td style="font-size:18px; color:#333; padding:9px 0; line-height:25px;"> The information presented on this rights statement is a general summary of the law. To obtain  materials which explain the Georgia Lemon Law in much greater detail and include simple  notification forms,  you can visit our website at www.consumer.ga.gov </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="font-size:18px; color:#333; padding:9px 0; font-style:italic;"> The Georgia Lemon Law :   </td>
			  </tr>
			</table>
			       
			
			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">			
				The Vehicle must be Purchased, leased, or registered in Georgia   </li>
			</ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">  Covers new motor  vehicles or demonstration vehicles, if titled as new.  </td>
			  </li>
			  </ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">  Covers new trucks up to 12000 pounds gross vehicle weight rating and self-propelled and chassis portion of new motors homes.  </td>
			  </li></ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;"> Covers nonconformites first reported within the lemon law rights period, which is the first two year or 24,000 miles of operation of the vehicle, whichever occurs first. </li>
			</ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;"> A vehicle may qualify under the lemon law after the manufacturer or its authorized dealer has been given a reasonable number of attempts to repair the same nonconformity within the lemon law rights period but has not been able to repair the nonconformity. </li>
			</ul>
			       
			       
			 <ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">  Under the lemon law, a reasonable numbers of attempts is deemed to be: (a) <b>One Attempts,</b> if the nonconformity is a serious safety defect; (b) <b>three attempts,</b> if the nonconformity, although not a serious safety defect, substantially impairs the user,value or safety of the vehicle; or ( c )
			    a <b>cumulative total of 30 day</b> during which the vehicle is out of service for repair of one or more nonconformities. </li>
			    </ul>


			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">After a reasonable number of attempts to repair a serious safety defect or any other nonconformity <b>(either a. or .b ),</b> the consumer must notify the manufacturer and provide the manufacturer with a final opportunity to repair the nonconformity</li>
			</ul>


			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;"> If the manufacturer fails to correct the nonconformity after the final repair attempt or if the vehicle is out of service by reason of repair  of one or more nonconformity for a total of 30 days, the consumer may be eligible for a refund for the purchase price of the vehicle or a replacement vehicle. </li>
			</ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">  it is very important to keep copies of all work orders, reports ( such as vehicle inspection diagnosis, or test drive reports ) and written correspondence with the  manufacturer <br />
			    Remember, you are entitled to receive a fully itemized  and legible statement or repair order each time to take your vehicle in for diagnosis or repair . </li></ul>

			<ul>	
			<li style="list-style-type: circle;font-size:18px; color:#333; font-style:italic;  margin-left: 35px;">  To  assert your rights, under the law, other requirements may apply. For Further information, contact Governor's office of Consumer Affairs.</li>
			</ul>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:30%; font-size:15px; color:#333; padding:2px 0;"> <input name="Consumer_Signature"  value="<?php echo isset($info['Consumer_Signature']) ? $info['Consumer_Signature'] : ''; ?>"type="text" class="law_state" /> <br /> Consumer Signature  </td>
			    <td style="width:40%; font-size:15px; color:#333; padding:2px 0;"> <input name="Date_called"  value="<?php echo isset($info['Date_called']) ? $info['Date_called'] : ''; ?>"type="text" class="law_state" /> <br /> Date </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:60%; font-size:15px; color:#333; padding:2px 0;"> <input name="Printed_Name"  value="<?php echo isset($info['Printed_Name']) ? $info['Printed_Name'] : $info['first_name']." ".$info['last_name']; ?>"type="text" class="law_state" /> <br /> Printed Name  </td>
			    <td style="width:40%; font-size:15px; color:#333; padding:2px 0;"> </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:50%; font-size:16px; color:#333; padding:2px 0; font-style:italic;"> This Statement of C	onsumer Rights Delivered by   </td>
			    <td style="width:50%; font-size:15px; color:#333; padding:2px 0;"> <input name="Consumer_Printed_Name"  value="<?php echo isset($info['Consumer_Printed_Name']) ? $info['Consumer_Printed_Name'] : ''; ?>"type="text" class="law_state" /> <br /> (Printed Name of Dealer Representative) </td>
			  </tr>
			</table>
			 
			 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; margin-bottom:20px;">
			  <tr>
			    <td style="width:50%; font-size:16px; color:#333; padding:2px 0; font-style:italic;"> as required by law on <input name="required_by_law"  value="<?php echo isset($info['required_by_law']) ? $info['required_by_law'] : ''; ?>"type="text" class="law_state3" />   </td>
			    <td style="width:50%; font-size:15px; color:#333; padding:2px 0;">  </td>
			  </tr>
			</table>
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:40px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:20%; font-size:24px; color:#fff; background:#333; padding:45px 0; text-align:center;"> FACTS  </td>
			     <td style=" width:80%; font-size:24px; color:#333; font-weight:600; padding:9px 9px;"> WHAT DOES OPEN ROADS COMPLETE RV DO WITH  <br />
			     YOUR PERSONAL INFORMATION ?</td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:20%; font-size:24px; color:#000; background:#ccc; padding:10px 10px; vertical-align:top;"> Why ?  </td>
			     <td style=" width:80%; font-size:16px; color:#333; padding:13px 9px; line-height:25px;"> Financial companies choose how they share your personal information . Federal law gives consumers the right to limit some but not all sharing . Federal law also requires us to tell you how we collect, share and protect your personal information. Please this notice carefully to understand what we do.     </td>
			  </tr>
			</table>


			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:20%; font-size:24px; color:#000; background:#ccc; padding:10px 10px; vertical-align:top;"> What ?  </td>
			     <td style=" width:80%; font-size:16px; color:#333; padding:13px 9px; line-height:25px;"> The types of personal information we collect and share depend on the product or Service you have with us. This information can 
			     <br >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;include : Social Security number and<br />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;income account balances and payment <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;history Credit history and employment <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;information <br />When you are no loger our customer, we continue to share your information as   </td>
			  </tr>
			</table>


			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:20%; font-size:24px; color:#000; background:#ccc; padding:10px 10px; vertical-align:top;"> How ?  </td>
			     <td style=" width:80%; font-size:16px; color:#333; padding:13px 9px; line-height:25px;"> All financial companies need to share customer's personal information to run their everyday business. In the section below, we list the reasons financial companies can share their customer's personal information; the reasons Open Road Complete RV chooses to share ; and whether you can limit this sharing .    </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; background:#ccc; font-weight:600; padding:13px 10px; text-align:center; border-right:solid 1px #333;"> Reasons we can share your personal information  </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; background:#ccc; font-weight:600; line-height:25px; text-align:center;  border-right:solid 1px #333;"> Does Open Roads <br /> Compete RV share   </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; background:#ccc; font-weight:600; line-height:25px; text-align:center;">  Can you limit this sharing ? </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For our everyday business purposes </b>- such as to <br /> process your transaction, maintain your account(s), <br /> respond to court orders and legal investigation, or report to credit bureaus    </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> Yes    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;"> No  </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For our Market purposes to- </b><br /> offer our product and services to you  </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> Yes    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;"> No</td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For joint marketing with other financial companies-<b/>  </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> Yes    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;"> No  </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For our affiliates everyday business purposes</b> <br />
			    information about your transactions and experiences .  </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> Yes    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;">No  </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For our affiliates everyday business purposes </b><br />
			    information about your creditworthiness </td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;">  No    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;">We don't share  </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For our affiliates to market you</b></td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> No    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;">We don't share  </td>
			  </tr>
			</table>


			<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:solid 1px #333;">
			  <tr>
			    <td style=" width:50%; font-size:16px; color:#000; padding:13px 10px; border-right:solid 1px #333;"> <b>For nonaffiliates to market you </b></td>
			     <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;  border-right:solid 1px #333;"> No    </td>
			      <td style=" width:25%; font-size:16px; color:#333; padding:13px 9px; line-height:25px; text-align:center;">We don't share  </td>
			  </tr>
			</table>


			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px; border:solid 1px #333;">
			  <tr>
			    <td style=" width:20%; font-size:20px; font-weight:600; color:#000; background:#ccc; padding:15px 10px;"> Questions ?  </td>
			     <td style=" width:80%; font-size:16px; color:#333; padding:13px 9px; line-height:25px;"> Call ( 770 ) 234-7800 </td>
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
