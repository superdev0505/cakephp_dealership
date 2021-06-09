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
*{
				margin: 0;
				padding: 0;
				outline: none;
				
				-webkit-box-sizing: border-box;
				   -moz-box-sizing: border-box;
					-ms-box-sizing: border-box;
					 -o-box-sizing: border-box;
						box-sizing: border-box;
			}
		
			body {
				margin: 0;
				padding: 0;
				font-family: arial;
				font-size: 13px;
			}
			
			table {
				width: 100%;
				margin: 0 auto;
				padding-bottom: 45px;
			}
			
			
			
			input {
				border: none;
				border-bottom: solid 1px #000;
				padding: 0 5px;
			}
			
			tfoot input {
				border: solid 1px #000;
				padding: 7px;
				width: 100%;
			}
			
			input.small {
				width: 75px;
			}
			
			
			
			p {
				font-size: 14px;
				line-height: 36px;
			}
			
			p.line-small input,
			p.line-small span,
			p.line-small b {
				display: inline-block;
				vertical-align: top;
			}
			
			p.line-small span,
			p.line-small b {
				width: 85%;
			}
			
			p.line-small {
				line-height: 18px;
				margin-bottom: 14px;
				margin-top: 10px;
			}
			
			
			
			table {
    border-collapse: collapse;
    width: 100%;
    border-spacing: 0px;
}
table tr {
}
table tr td {
    border: 1px solid #ccc;
    padding: 3px 7px;
    vertical-align: top;
}
table.noborder tr {
	border-top:1px solid #9c9c9c;
	margin:0 0 10px;
}
table.noborder tr td {
    border: 0px solid #ccc;
	padding-bottom:5px;
}
table.no-border tr {
	border-top:0px solid #9c9c9c;
	margin:0;
}
table.no-border tr td {
    border: 0px solid #ccc;
	padding-bottom:0px;
}
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;} 
		.container{
			
		}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table style="width:100%;">	
						<tr class="border">
							<td class="title-bar" colspan="2" style="text-align:center;">
								<h2><em>DEAL CHECK LIST</em></h2>
							</td>
						</tr>
						<tr>
							<td><span>Customer:&nbsp;&nbsp;&nbsp;<input type="text" name="customer" value="<?php echo isset($info["customer"]) ? $info['customer'] : $info['first_name'].' '.$info['last_name'];?>" /> </span></td>
							<td><span>Date:&nbsp;&nbsp;&nbsp;<input type="text" name="date" value="<?php echo isset($info["date"]) ? $info['date'] : ''?>" /></span></td>
							
						</tr>
						<tr>
							<td><span>Salesperson:&nbsp;&nbsp;&nbsp;<input type="text" name="salesperson" value="<?php echo isset($info["salesperson"]) ? $info['salesperson'] : $info['sperson']?>" /></span></td>
							<td><span>F&I mgr:&nbsp;&nbsp;&nbsp;<input type="text" name="fimgr" value="<?php echo isset($info["fimgr"]) ? $info['fimgr'] : ''?>" /></span></td>
						</tr>
						<tr class="sub-heading">
							<td class="sub-title-bar" colspan="2">
								<h3>(SALESPEOPLE  WILL INITIAL COMPLETED ITEMS PRIOR TO TURNING IN TO FINANCE)</h3>
							</td>
						</tr>					
						<tr>
							<td colspan="2">
								<ol>
								  <li>PRIVACY NOTICE&nbsp;&nbsp;&nbsp;<input type="text" name="privacy_notice" value="<?php echo isset($info["privacy_notice"]) ? $info['privacy_notice'] : ''?>" />&nbsp;&nbsp;SIGNED BY BUYER AND/OR CO-BUYER </li>
								  <li>CREDIT APPLICATION &nbsp;&nbsp;&nbsp;<input type="text" name="privacy_notice" value="<?php echo isset($info["privacy_notice"]) ? $info['privacy_notice'] : ''?>" />&nbsp;&nbsp;SIGNED BY BUYER AND/OR CO-BUYER</li>
								  <li>WORKSHEET – WITH EMAIL ADDRESS&nbsp;&nbsp;&nbsp;<input type="text" name="w_emailaddresss" value="<?php echo isset($info["w_emailaddresss"]) ? $info['w_emailaddresss'] : ''?>" />&nbsp;&nbsp; </li>
								  <li>PAYOFF SLIP&nbsp;&nbsp;&nbsp;<input type="text" name="payoff_slip" value="<?php echo isset($info["payoff_slip"]) ? $info['payoff_slip'] : ''?>" />&nbsp;&nbsp;COMPLETED WITH 20 DAY PAYOFF</li>
								  <li>PROOF OF INSURANACE &nbsp;&nbsp;&nbsp;<input type="text" name="proof_insurance" value="<?php echo isset($info["proof_insurance"]) ? $info['proof_insurance'] : ''?>" />&nbsp;&nbsp; IF THE MOTORCYCLE IS FINANCED</li>
								  <li>2 COPIES OF VALID DRIVERS LICENSE &nbsp;&nbsp;&nbsp;<input type="text" name="drive_license" value="<?php echo isset($info["drive_license"]) ? $info['drive_license'] : ''?>" />&nbsp;&nbsp; ENLARGED TO 200% </li>
								  <li>WE OWE/YOU OWE &nbsp;&nbsp;&nbsp;<input type="text" name="you_owe" value="<?php echo isset($info["you_owe"]) ? $info['you_owe'] : ''?>" />&nbsp;&nbsp;  SIGNED BY CUSTOMER & FINANCE MGR/COPY FOR ALL DEPARTMENTS</li>
								  <li>TRADE TITLE&nbsp;&nbsp;&nbsp;<input type="text" name="trade_title" value="<?php echo isset($info["trade_title"]) ? $info['trade_title'] : ''?>" />&nbsp;&nbsp;IF THERE IS NO PAYOFF</li>
								  <li>COPY OF REGISTRATION FOR  TRADE &nbsp;&nbsp;&nbsp;<input type="text" name="registration_for_trade" value="<?php echo isset($info["registration_for_trade"]) ? $info['registration_for_trade'] : ''?>" />&nbsp;&nbsp; </li>
								  <li>CUSTOMER ASSESED THIS YEAR?&nbsp;&nbsp;&nbsp;<input type="text" name="customer_year" value="<?php echo isset($info["customer_year"]) ? $info['customer_year'] : ''?>" />&nbsp;&nbsp; COPY OF ASSESMENT OR PPAN #&nbsp;&nbsp;&nbsp;<input type="text" name="copy_assesment" value="<?php echo isset($info["copy_assesment"]) ? $info['copy_assesment'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>THANK YOU CARD &nbsp;&nbsp;&nbsp;<input type="text" name="thank_you_card" value="<?php echo isset($info["thank_you_card"]) ? $info['thank_you_card'] : ''?>" />&nbsp;&nbsp;  FILLED OUT AND READY TO BE MAILED </li>
								  <li>BOOK OUT ON USED BIKES&nbsp;&nbsp;&nbsp;<input type="text" name="book_bikes" value="<?php echo isset($info["book_bikes"]) ? $info['book_bikes'] : ''?>" />&nbsp;&nbsp; KELLY BLUE BOOK ATTACHED TO WORKSHEET</li>
								  <li>EXPLANATION OF HOG BENEFITS&nbsp;&nbsp;&nbsp;<input type="text" name="explanation_hog" value="<?php echo isset($info["explanation_hog"]) ? $info['explanation_hog'] : ''?>" />&nbsp;&nbsp;  CUSTOMER SIGNATURE:&nbsp;&nbsp;&nbsp;<input type="text" name="customer_signature1" value="<?php echo isset($info["customer_signature1"]) ? $info['customer_signature1'] : ''?>" />&nbsp;&nbsp; </li>
								  <li>EXPLANATION OF CSI SCORES&nbsp;&nbsp;&nbsp;<input type="text" name="csi_scores" value="<?php echo isset($info["csi_scores"]) ? $info['csi_scores'] : ''?>" />&nbsp;&nbsp; CUSTOMER SIGNATURE:&nbsp;&nbsp;&nbsp;<input type="text" name="customer_signature1" value="<?php echo isset($info["customer_signature1"]) ? $info['customer_signature1'] : ''?>" />&nbsp;&nbsp; </li>
								  <li>PICTURES&nbsp;&nbsp;&nbsp;<input type="text" name="pictures" value="<?php echo isset($info["pictures"]) ? $info['pictures'] : ''?>" />&nbsp;&nbsp; CUSTOMER SIGNATURE:&nbsp;&nbsp;&nbsp;<input type="text" name="customer_signature3" value="<?php echo isset($info["customer_signature3"]) ? $info['customer_signature3'] : ''?>" />&nbsp;&nbsp; </li>
								  <li>INCOMING UNIT WORKSHEET TURNED INTO SERVICE&nbsp;&nbsp;&nbsp;<input type="text" name="turned_service" value="<?php echo isset($info["turned_service"]) ? $info['turned_service'] : ''?>" />&nbsp;&nbsp; SERVICE WRITERS INITIALS&nbsp;&nbsp;&nbsp;<input type="text" name="service_initial" value="<?php echo isset($info["service_initial"]) ? $info['service_initial'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>PDI PREDELIVERY (New) INSPECTION FORM&nbsp;&nbsp;&nbsp;<input type="text" name="inspection_form" value="<?php echo isset($info["inspection_form"]) ? $info['inspection_form'] : ''?>" />&nbsp;&nbsp; USED PURCHASE  ACKNOWLEDGEMENT&nbsp;&nbsp;&nbsp;<input type="text" name="purchase_acknow" value="<?php echo isset($info["purchase_acknow"]) ? $info['purchase_acknow'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>SALES PERSON VERIFICATION SALES PATH WAS FOLLOWED&nbsp;&nbsp;&nbsp;<input type="text" name="verifiction_sales" value="<?php echo isset($info["verifiction_sales"]) ? $info['verifiction_sales'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>CHECKLIST FOR MOTORCYCLE REGISTRATION&nbsp;&nbsp;&nbsp;<input type="text" name="motorcycle_reg" value="<?php echo isset($info["motorcycle_reg"]) ? $info['motorcycle_reg'] : ''?>" />&nbsp;&nbsp; </li>
								  <div class="block">
									<p>EXPLANATIONS/NOTES:<input type="text" name="exp_notes" value="<?php echo isset($info["exp_notes"]) ? $info['exp_notes'] : ''?>" /></p>
									<h3 colspan="1" style="margin-top:10px;"><span style="font-size:14px; font-weight:normal;">FINANCE</span> (WILL NOT ACCEPT UNCOMPLETED CHECKLISTS)</h3>
								</div>
								  <li>BUYERS ORDER &nbsp;&nbsp;&nbsp;<input type="text" name="buyer_order" value="<?php echo isset($info["buyer_order"]) ? $info['buyer_order'] : ''?>" />&nbsp;&nbsp; </li>
								  <li> RECIEPT FOR DOWN PAYMENT&nbsp;&nbsp;&nbsp;<input type="text" name="recipt_payment" value="<?php echo isset($info["recipt_payment"]) ? $info['recipt_payment'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>BILL OF SALE &nbsp;&nbsp;&nbsp;<input type="text" name="bill_sale" value="<?php echo isset($info["bill_sale"]) ? $info['bill_sale'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>CONTRACT &nbsp;&nbsp;&nbsp;<input type="text" name="contract" value="<?php echo isset($info["contract"]) ? $info['contract'] : ''?>" />&nbsp;&nbsp;   IF FINANCED</li>
								  <li>NOTICE TO COSIGNER&nbsp;&nbsp;&nbsp;<input type="text" name="notice_cosigner" value="<?php echo isset($info["notice_cosigner"]) ? $info['notice_cosigner'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>APPROVAL &nbsp;&nbsp;&nbsp;<input type="text" name="approval" value="<?php echo isset($info["approval"]) ? $info['approval'] : ''?>" />&nbsp;&nbsp;IF FINANCED</li>
								  <li>POWER OF ATTORNEYS &nbsp;&nbsp;&nbsp;<input type="text" name="power_attorneys" value="<?php echo isset($info["power_attorneys"]) ? $info['power_attorneys'] : ''?>" />&nbsp;&nbsp;   FOR TRADE AND ONE FOR PURCHASE SIGNED BY CUSTOMER</li>
								  <li>GAP CONTRACT &nbsp;&nbsp;&nbsp;<input type="text" name="gap_contract" value="<?php echo isset($info["gap_contract"]) ? $info['gap_contract'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>WARRANTY CONTRACT &nbsp;&nbsp;&nbsp;<input type="text" name="warrantry" value="<?php echo isset($info["warrantry"]) ? $info['warrantry'] : ''?>" />&nbsp;&nbsp;
								  <li>ODOMETER STATEMENTS &nbsp;&nbsp;&nbsp;<input type="text" name="opometer" value="<?php echo isset($info["opometer"]) ? $info['opometer'] : ''?>" />&nbsp;&nbsp; ONE FOR PURCHASE AND ONE FOR TRADE</li>
								  <li>ARBITRATION AGREEMENT&nbsp;&nbsp;&nbsp;<input type="text" name="arbitration" value="<?php echo isset($info["arbitration"]) ? $info['arbitration'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>GUARANTEE TO LIEN HOLDER&nbsp;&nbsp;&nbsp;<input type="text" name="lien_holder" value="<?php echo isset($info["lien_holder"]) ? $info['lien_holder'] : ''?>" />&nbsp;&nbsp; IF FINANCED</li>
								  <li>OFAC/REDFLAG&nbsp;&nbsp;&nbsp;<input type="text" name="ofac" value="<?php echo isset($info["ofac"]) ? $info['ofac'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>SPOT DELIVERY AGREEMENT&nbsp;&nbsp;&nbsp;<input type="text" name="delivery_ag" value="<?php echo isset($info["delivery_ag"]) ? $info['delivery_ag'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>FINANCE MENU&nbsp;&nbsp;&nbsp;<input type="text" name="menu" value="<?php echo isset($info["menu"]) ? $info['menu'] : ''?>" />&nbsp;&nbsp;</li>
								  <li>RBPN(risk base pricing notice)&nbsp;&nbsp;&nbsp;<input type="text" name="rbpn" value="<?php echo isset($info["rbpn"]) ? $info['rbpn'] : ''?>" />&nbsp;&nbsp; Signed and dated by customer</li>
								</ol>
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
