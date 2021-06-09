
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
		
		body{ margin:0; padding:0;  font-size:12px; }
		.tex_or_out{ width:70%;  color:#333333; font-size:13px; margin:5px 0; background:#ccc; border:none; height:40px; padding:0 10px;}
		.tex_or_out2{ width:100%; border-bottom:solid 3px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out3{ width:70%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out4{ width:46%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out5{ width:24%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out6{ width:95%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out7{ width:10%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.tex_or_out8{ width:100%; color:#333; font-size:13px; margin:5px 0; background:#ccc; border:none; height:40px; padding:0 10px; border-bottom:solid 3px #000;}

		.tex_or_out9{ width:60%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:12px; margin:5px 0;}
		.wraper.main input{padding: 0px; margin: 0;}
		input[type="text"]{border-bottom: 1px solid #000;}
		
		@media print {
			.wraper.main input{padding: 0px!important; margin: 0px!important;}
			input[type="text"]{margin: 2px 0!important; padding: 0px 0!important;}
			}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			
			<table width="100%" border="0" style=" margin:0px 0 0px 0;">
			      <tr>
				<td style="width:70%;"> </td>
				 <td style="width:30%; font-size:25px; font-weight:600; vertical-align: bottom; text-align: right; line-height: 25px;"> Saskatchewan </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center; border-bottom:solid 2px #000;"></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:10px 0 0px 0;">
			      <tr>
				<td style="width:30%;">
				 <table width="100%" border="0" style=" margin:0;">
				  <tr>
				    <td style="width:25%;"> <img  src="<?php echo ('/app/webroot/files/goaz_images/schwen_logo.png'); ?>" alt="" style="width: 100px;     margin: 0 6px 0 0;"></td>
				    <td style="width:75%; font-size:12px; font-weight:600; vertical-align:top;"> Ministry of <br> Finance</td>
				  </tr>
				</table>
				 </td>
				 <td style="width:30%;">  </td>
				 <td style="width: 25%;"> 
				  <table width="100%" border="0" style=" margin:0;">
				  <tr>
				    <td style="font-size:12px; font-weight:600;"> 2350 Albert Street </td>
				   </tr>
				   
				   <tr>
				    <td style="font-size:12px; font-weight:600;">Regina, Saskatchewan</td>
				   </tr>
				   
				   <tr>
				    <td style="font-size:12px; font-weight:600;">S4P 4A6</td>
				   </tr> 
				    
				   <tr> 
				    <td style="font-size:12px; font-weight:600;">1-800-667-6102 or (306) 787-6645</td>
				   </tr>     
			       </table>
				  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:7px 0 0 0;">
			      <tr>
				<td style="text-align:center; font-weight:600; font-size:14px; text-decoration: underline;"> EXEMPT MOTOR VEHICLE SALES CERTIFICATE FOR NON-RESIDENTS, <br> STATUS INDIANS OR INDIAN BANDS</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:7px 0 0 0;">
			      <tr>
				<td style=" font-weight:600; font-size: 14px; text-decoration: underline;"> 1. TO BE COMPLETED BY DEALER</td>
			      </tr>
			    </table>
			    
			    
			     <table width="94%" border="0" style=" margin:7px auto 0;">
			      <tr>
				<td style="font-size:13px; line-height: 17px;"> I certify that on the <input name="certify" value="<?php echo isset($info['certify']) ? $info['certify'] : ''; ?>"  type="text" class="tex_or_out7"> day of <input name="dayof" value="<?php echo isset($info['dayof']) ? $info['dayof'] : ''; ?>"  type="text" class="tex_or_out7"> 20 <input name="purchased" value="<?php echo isset($info['purchased']) ? $info['purchased'] : ''; ?>"  type="text" class="tex_or_out7"> the following described vehicle was purchased by  <input name="firstname" value="<?php echo isset($info['firstname']) ? $info['firstname'] : $info['first_name']; ?>"  type="text" class="tex_or_out5" style="width: 46%;"> of  <input name="lastname" value="<?php echo isset($info['lastname']) ? $info['lastname'] : $info['last_name']; ?>"  type="text" class="tex_or_out5" style="width: 46%;"> </td>
			      </tr>
			    </table>
			    
			    <table width="94%" border="0" style=" margin:1px auto 0;">
			      <tr>
				<td style="width:50%; font-size:12px; text-align:center;"> (Full Name of Purchaser) </td>
				 <td style="width:50%; font-size:12px; text-align:center;">(Full Address of Purchaser) </td>
			      </tr>
			    </table>
			    
			     <table width="94%" border="0" style=" margin:1px auto 0;">
			      <tr>
				<td style="font-size:13px; line-height: 15px;"> who holds plate or permit # <input name="permit" value="<?php echo isset($info['permit']) ? $info['permit'] : ''; ?>"  type="text" class="tex_or_out5"> and driver’s licence # <input name="driverlicence" value="<?php echo isset($info['driverlicence']) ? $info['driverlicence'] : ''; ?>"  type="text" class="tex_or_out5"> issued by the Province of <input name="Province" value="<?php echo isset($info['Province']) ? $info['Province'] : ''; ?>"  type="text" class="tex_or_out4">  </td>
			      </tr>
			    </table>
			    
			    <table width="92%" border="0" style=" margin:1px 0 0 5%;">
			      <tr>
				<td style="font-size:13px; line-height: 15px;"> Make and Model of Vehicle <input name="MakeandModel" value="<?php echo isset($info['MakeandModel']) ? $info['MakeandModel'] : $info['make'].",".$info['model']; ?>"  type="text" class="tex_or_out3" style="width: 75%;">   </td>
			      </tr>
			    </table>
			    
			     <table width="92%" border="0" style=" margin:1px 0 0 5%;">
			      <tr>
				<td style="font-size:13px; line-height: 15px;"> Year of Manufacture <input name="Manufacture" value="<?php echo isset($info['Manufacture']) ? $info['Manufacture'] : $info['year']; ?>"  type="text" class="tex_or_out3" style="width: 81%;">   </td>
			      </tr>
			    </table>
			    
			    <table width="92%" border="0" style=" margin:1px 0 0 5%;">
			      <tr>
				<td style="font-size:13px; line-height: 15px;"> Serial Number of Vehicle <input name="SerialNumber" value="<?php echo isset($info['SerialNumber']) ? $info['SerialNumber'] : ''; ?>"  type="text" class="tex_or_out3" style="width: 77%;">   </td>
			      </tr>
			    </table>
			    
			    
			     <table width="94%" border="0" style=" margin:1px auto 0;">
			      <tr>
				<td style="width:20%; font-size:12px;"> <input name="datedealer" value="<?php echo isset($info['datedealer']) ? $info['datedealer'] : date("Y-m-d"); ?>"  type="text" class="tex_or_out9"> <br> Date </td>
				 <td style="width:80%; font-size:12px;"> <input name="NameofDealer" value="<?php echo isset($info['NameofDealer']) ? $info['NameofDealer'] : ''; ?>"  type="text" class="tex_or_out6" style="width: 99%;"> <br> Name of Dealer </td>
			      </tr>
			    </table>
			    
			    <table width="94%" border="0" style=" margin:1px auto 0;">
			      <tr>
				<td style="width:20%; font-size:12px;"> <input name="DealerLicenceData" value="<?php echo isset($info['DealerLicenceData']) ? $info['DealerLicenceData'] : ''; ?>"  type="text" class="tex_or_out9"> <br> Dealer Licence # </td>
				 <td style="width:80%; font-size:12px; "> <input name="Address" value="<?php echo isset($info['Address']) ? $info['Address'] :$info['address']; ?>"  type="text" class="tex_or_out6" style="width: 99%;"> <br> Address </td>
			      </tr>
			    </table>
			    
			     <table width="94%" border="0" style=" margin:1px auto 0;">
			      <tr>
				<td style="width:20%; font-size:12px;"> </td>
				 <td style="width:80%; font-size:12px;"> <input name="AuthorizedDealer" value="<?php echo isset($info['AuthorizedDealer']) ? $info['AuthorizedDealer'] : ''; ?>"  type="text" class="tex_or_out6" style="width: 99%;"> <br> Signature of Authorized Dealer Representative </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:6px 0 0 0;">
			      <tr>
				<td style=" font-weight:600; font-size:14px;"> 2.  TO BE COMPLETED BY NON-RESIDENT </td>
			      </tr>
			    </table>
			    
			    <table width="94%" border="0" style=" margin:3px auto 0;">
			      <tr>
				<td style="font-size:13px; line-height: 17px;"> I acknowledge that the above described vehicle was purchased by me on the <input name="customername_data" value="<?php echo isset($info['customername_data']) ? $info['customername_data'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="tex_or_out5" style="width: 10%"> day of <input name="dayof1" value="<?php echo isset($info['dayof1']) ? $info['dayof1'] : ''; ?>"  type="text" class="tex_or_out5" style="20%"> 20 <input name="yeardata" value="<?php echo isset($info['yeardata']) ? $info['yeardata'] : ''; ?>"  type="text" class="tex_or_out4" style="width: 15%"> This vehicle will be removed from Saskatchewan within 30 days and will be licenced for use outside Saskatchewan. I have provided copies of my out-of-province vehicle registration or permit, and driver’s licence to the dealer. </td>
			      </tr>
			    </table>
			    
			     <table width="94%" border="0" style=" margin:3px auto 0;">
			      <tr>
				<td style="width:20%; font-size:12px;"> <input name="datedata2" value="<?php echo isset($info['datedata2']) ? $info['datedata2'] : date("Y-m-d"); ?>"  type="text" class="tex_or_out9"> <br> Date </td>
				 <td style="width:80%; font-size:12px; "> <input name="PurchaserSignature" value="<?php echo isset($info['PurchaserSignature']) ? $info['PurchaserSignature'] : ''; ?>"  type="text" class="tex_or_out6"> <br> Purchaser’s Signature </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" style=" margin:7px 0 0 0;">
			      <tr>
				<td style=" font-weight:600; font-size:13px;"> 3.  TO BE COMPLETED BY STATUS INDIAN OR INDIAN BAND </td>
			      </tr>
			    </table>
			    
			    
			    <table width="94%" border="0" style=" margin:3px auto 0;">
			      <tr>
				<td style="font-size:13px; line-height: 17px;"> I acknowledge that the above described vehicle was purchased by <input name="customername2" value="<?php echo isset($info['customername2']) ? $info['customername2'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="tex_or_out5"> on the <input name="onthe" value="<?php echo isset($info['onthe']) ? $info['onthe'] : ''; ?>"  type="text" class="tex_or_out5" style="width: 15%;"> day of <input name="dayof3" value="<?php echo isset($info['dayof3']) ? $info['dayof3'] : ''; ?>"  type="text" class="tex_or_out4" style="width: 25%;"> 20 <input name="yeardata3" value="<?php echo isset($info['yeardata3']) ? $info['yeardata3'] : ''; ?>"  type="text" class="tex_or_out4" style="width: 10%;"> The transaction was finalized and delivery was taken on reserve number <input name="reservenumber" value="<?php echo isset($info['reservenumber']) ? $info['reservenumber'] : ''; ?>"  type="text" class="tex_or_out4" style="width: 30%"> location  <input name="location" value="<?php echo isset($info['location']) ? $info['location'] : ''; ?>"  type="text" class="tex_or_out4" style="width: 27%;"> and is for my own use or for approved band management activities. I have provided a copy of my Certificate of Indian Status card or band name and number to the dealer.</td>
			      </tr>
			    </table>
			    
			    
			    <table width="94%" border="0" style=" margin:3px auto 0;">
			      <tr>
				<td style="width:20%; font-size:12px;"> <input name="DateData3" value="<?php echo isset($info['DateData3']) ? $info['DateData3'] : ''; ?>"  type="text" class="tex_or_out9"> <br> Date </td>
				 <td style="width:80%; font-size:12px; "> <input name="AuthorizedRepresentative" value="<?php echo isset($info['AuthorizedRepresentative']) ? $info['AuthorizedRepresentative'] : ''; ?>"  type="text" class="tex_or_out6"> <br> Signature of Purchaser or Authorized Representative </td>
			      </tr>
			    </table>
			    
			    
			    <table width="94%" border="0" style=" margin:5px auto 0;">
			      <tr>
				<td style="font-size:12px; line-height: 15px;"><strong> Note:</strong> The dealer (vendor) must retain this certificate for inspection as required by The Provincial Sales Tax Act.</td>
			      </tr>
			    </table>
			    
			    <table width="92%" border="0" style=" margin:5px 0 5px 5%;">
			      <tr>
				<td style="font-size:12px; line-height: 15px; padding-left:30px;"> Tax must be collected if the purchaser displays Saskatchewan plates or if copies of the vehicle registration or permit, driver’s licence or applicable Certificate of Indian Status card are not attached to this certificate.</td>
			      </tr>
			    </table>
			    
			     <table width="92%" border="0" style=" margin:3px 0 7px 5%;">
			      <tr>
				<td style="font-size:12px; line-height: 15px; padding-left:30px;"> If the vehicle is purchased by a status Indian or Indian band for approved band management activities, a copy of this certificate should be provided to the purchaser for presentation when the vehicle is registered.</td>
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
