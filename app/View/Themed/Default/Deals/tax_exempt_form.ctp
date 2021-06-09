
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
	<div id="worksheet_container" style="width:96%; margin:0 auto;">
	<style>
		
		body{ margin:0%; padding:0; font-size:13px; }
		.tex_emempt{ width:70%;  color:#333333; font-size:15px; margin:5px 0;  border:none; height:40px; padding:0 10px;}
		.tex_emempt2{ width:100%; border-bottom:solid 4px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt3{ width:70%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt4{ width:46%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt5{ width:24%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt6{ width:95%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt7{ width:10%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
		.tex_emempt8{ width:100%; color:#333; font-size:15px; margin:5px 0;  border:none;  padding:0 10px; border-bottom:solid 3px #000;}
		.tex_emempt9{ width:95%; color:#333; font-size:15px; margin:1px 0;  border:solid 2px #F00; padding:0 10px;}
		input[type="text"]{border-bottom: 1px solid #000;}
		
		@print media{
			input[type="text"]{margin: 1px 0!important;  padding: 0px !important; border-color: #000 !important;}
		}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			    
			    <table width="100%" border="0" style=" margin:0; border-top: 3px solid #000;">
			      <tr>
				<td style=" width:20%;"> 
				 <table width="100%" border="0">
				  <tr>
				    <td style="font-size:25px; line-height: 28px;">Saskatchewan <br> Finance</td>
				  </tr>
				</table>
				  <div class="margin" style="margin-top:20px;"></div>
				 <table width="100%" border="0" style="padding-top:10px;">
				  <tr>
				    <td style="font-size:15px;">Revenue Division </td>
				  </tr>
				</table>
				
				<table width="100%" border="0" style="padding-top:10px;">
				  <tr>
				    <td style="font-size:15px;"> ( 306 ) 787-6650 </td>
				  </tr>
				</table>
				
				 </td>
				 <td style="width:42%; font-size:16px;"></td>
				  <td style="width:100%; font-size:32px; line-height: 35px; font-weight:600; vertical-align:top; line-height:40px;"> Farm Exemption <br> Certificate </td>
			      </tr>
			    </table>

			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center;border-bottom:1px solid #000;"> </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="font-size:14px; line-height:16px; padding:5px 10px;"> This certificate or the contract form issued under The Agricultural Implements Act must be completed at the time of the sale of certain multi-purpose farm production equipment and repairs which are specifically shown as requiring a certificate of contract form in The Education and Health Tax Regulations. </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center;border-bottom:1px solid #000;"> </td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:10%; font-size:14px;">(1)  Sold by </td>
				<td style=" width:90%;"> <input name="Sold_by" value="<?php echo isset($info['Sold_by']) ? $info['Sold_by'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:30%; font-size:14px;">(2)  Description of Goods Purchased </td>
				<td style=" width:70%;"> <input name="Goods_Purchased1" value="<?php echo isset($info['Goods_Purchased1']) ? $info['Goods_Purchased1'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:100%; font-size:14px;"> <input name="Goods_Purchased2" value="<?php echo isset($info['Goods_Purchased2']) ? $info['Goods_Purchased2'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:30%; font-size:14px;">(3)  Serial Number (if applicable) </td>
				<td style=" width:70%;"> <input name="Serial_Number" value="<?php echo isset($info['Serial_Number']) ? $info['Serial_Number'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:20%; font-size:14px;">(4) Date of Purchase </td>
				<td style=" width:80%;"> <input name="DateofPurchase" value="<?php echo isset($info['DateofPurchase']) ? $info['DateofPurchase'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:19%; font-size:14px;">(5) Invoice Number </td>
				<td style=" width:81%;"> <input name="Invoice_Number" value="<?php echo isset($info['Invoice_Number']) ? $info['Invoice_Number'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>

			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:22%; font-size:14px;">(6) Amount of Purchase </td>
				<td style=" width:78%;"> <input name="AmountofPurchase" value="<?php echo isset($info['AmountofPurchase']) ? $info['AmountofPurchase'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:17%; font-size:14px;">(7) Purchased By </td>
				<td style=" width:83%;"> <input name="PurchasedBy" value="<?php echo isset($info['PurchasedBy']) ? $info['PurchasedBy'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:12%; font-size:14px;">(8) Address </td>
				<td style=" width:88%;"> <input name="Address" value="<?php echo isset($info['Address']) ? $info['Address'] : $info['address']; ?>"  type="text" class="tex_emempt8"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:20%; font-size:14px;">(9) Land Description </td>
				<td style=" width:80%;"> 
				 <table width="100%" border="0">
				  <tr>
				    <td style="width:20%;"><input name="LandDescriptionSEC" value="<?php echo isset($info['LandDescriptionSEC']) ? $info['LandDescriptionSEC'] : ''; ?>"  type="text" class="tex_emempt8"></td>
				    <td style="width:20%;"><input name="LandDescriptionTWSP" value="<?php echo isset($info['LandDescriptionTWSP']) ? $info['LandDescriptionTWSP'] : ''; ?>"  type="text" class="tex_emempt8"></td>
				    <td style="width:20%;"><input name="LandDescriptionR" value="<?php echo isset($info['LandDescriptionR']) ? $info['LandDescriptionR'] : ''; ?>"  type="text" class="tex_emempt8"></td>
				    <td style="width:20%;"><input name="LandDescriptionM" value="<?php echo isset($info['LandDescriptionM']) ? $info['LandDescriptionM'] : ''; ?>"  type="text" class="tex_emempt8"></td>
				    <td style="width:20%;"><input name="LandDescriptionO" value="<?php echo isset($info['LandDescriptionO']) ? $info['LandDescriptionO'] : ''; ?>"  type="text" class="tex_emempt8"></td>
				  </tr>
				  
				  <tr>
				    <td style="width:20%; text-align:center; font-size:22px;">SEC</td>
				    <td style="width:20%; text-align:center; font-size:22px;">TWSP</td>
				    <td style="width:20%; text-align:center; font-size:22px;">R</td>
				    <td style="width:20%; text-align:center; font-size:22px;">M</td>
				    <td style="width:20%; text-align:center; font-size:22px;"> </td>
				    <td></td>
				  </tr>
				</table>
				
				 </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center;border-bottom:2px solid #000;"> </td>
			      </tr>
			    </table>

			   <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="font-size:14px; font-weight:600; padding:5px 10px;"> I hearby Certify that the goods listed above are to be used solely in the operation of my farm </td>
			      </tr>
			    </table>


			       <table width="100%" border="0" style=" margin:3px 0 0 0;;">
			      <tr>
				<td style=" width:30%; font-size:14px;">
				 <table width="100%" border="0" style=" margin:3px 0 0 0;;">
				  <tr>
				    <td style=" width:12%; font-size:14px;">Date </td>
				    <td style=" width:88%;"> <input name="DateData" value="<?php echo isset($info['DateData']) ? $info['DateData'] : date('Y-m-d'); ?>"  type="text" class="tex_emempt8"> </td>
				  </tr>
				</table>
				</td>
				<td style=" width:70%;"> 
				<table width="100%" border="0" style=" margin:3px 0 0 0;;">
				  <tr>
				    <td style=" width:30%; font-size:14px;">Signature of Farmer </td>
				    <td style=" width:70%;"> <input name="SignatureofFarmer" value="<?php echo isset($info['SignatureofFarmer']) ? $info['SignatureofFarmer'] : ''; ?>"  type="text" class="tex_emempt8"> </td>
				  </tr>
				</table>
				 </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center;border-bottom:2px solid #000;"> </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="font-size:14px; padding:5px 10px; line-height:16px;"> <strong>Important:</strong> Any false statement made herein or other misuse of this certificate will be deemed to an evasion of tax in contravention of The Education and Health Tax Act. </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="font-size:14px; padding:5px 10px; line-height:16px;"><strong>Note:</strong> The Vendor must retain this certificate for inspection as required by The Education and Health Tax Act. </td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" style=" margin:0;">
			      <tr>
				<td style="text-align:center;border-bottom:2px solid #000;margin-bottom:10px;"> </td>
			      </tr>
			    </table>
			    <br />
			    <table width="100%" border="0" style=" margin:0; padding-bottom:40px;">
			      <tr>
				<td style="text-align:center; width:75%; vertical-align:bottom;"></td>
				 <td style="text-align:center; width:25%; border:double;"> 
				 <table width="100%" border="0" style=" margin:0;">
				  <tr>
				    <td style="text-align:center;"> <input name="unit5" value="<?php echo isset($info['unit5']) ? $info['unit5'] : ''; ?>"  type="text" class="tex_emempt9" style="height:200px;" readonly></td>
				  </tr>
				</table>								
				<table width="100%" border="0" style=" margin:0;">
				  <tr>
				    <td style="text-align:center; font-size:15px; font-weight:600;"> Do not write in this box </td>
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
