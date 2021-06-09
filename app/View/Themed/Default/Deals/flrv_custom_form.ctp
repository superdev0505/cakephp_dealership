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
	<div id="worksheet_container">
	<style>
	body{ font-family:Georgia, "Times New Roman", Times, serif; font-size:13px;}
	
	.folsom{}
	.folsom h1{ font-size:22px; color:000; margin:0; font-weight:normal;}
	.folsom p{ font-size:16px; color:000; margin:0;}
	.inp_frm{ width:30%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.inp_frm2{ width:60%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.inp_frm3{ width:20%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.inp_frm4{ width:65%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#000; margin:5px 0; font-size:17px; } 
	.inp_frm5{ width:10%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.inp_frm6{ width:15%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.inp_frm7{ width:22.7%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
	.top_sty{ width:60%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.top_sty2{ width:100%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms{ width:70%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms2{ width:46%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms3{ width:24%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms4{ width:76%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms5{ width:86%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	.cutmar_nms6{ width:80%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
	#worksheet_container {
		width:90%; 
		margin:0 auto;
	}
	.bottom_table {
			height: 220px;
		}
	.market1_table {
		height: 215px;
	}
	.market2_table {
		height: 221px;
	}
	.market3_table {
		height: 232px;
	}
	.market3_title {
		float:right;
		margin-top:174px;
	}

	@media print { 
		.bottom_table {
			height: 120px;
		}
		.market1_table {
			height: 200px;
		}
		.market2_table {
			height: 200px;
		}
		#worksheet_container {
			width: 1031px; 
			margin:0 auto;
		}
		.market3_title {
			float:right;
			margin-top:78px;
		}
	}
	</style>
	<div class="wraper header"> 
		<div class="row">
			<table width="100%" cellpadding="0" border="1">
				<tr>
					<td width="30%" style="padding:6px 8px;">Quote :
					 <input name="Quote"  value="<?php echo isset($info['Quote']) ? $info['Quote'] : ''; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="20%" style="padding:6px 8px;">Customer :
					  <input name="Customer"  value="<?php echo isset($info['Customer']) ? $info['Customer'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="10%" style="padding:6px 8px;">Tires :
					  <input name="Tires"  value="<?php echo isset($info['Tires']) ? $info['Tires'] : ''; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="10%" style="padding:6px 8px;">TVs :
					  <input name="TVs"  value="<?php echo isset($info['TVs']) ? $info['TVs'] : ''; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="30%" style="padding:6px 8px; text-align:center;">
					 <img style="width:100%;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/img-fm.png'); ?>" alt="">
					</td>
				</tr>
			</table>
			<table width="100%" cellpadding="0" border="1"> 
				<tr>
					<td width="40%" style="padding:4px 8px;">Buyer's Name
					 <input name="Buyer_Name"  value="<?php echo isset($info['Buyer_Name']) ? $info['Buyer_Name'] : $info['first_name']." ".$info['last_name']; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="22%" style="padding:4px 8px; text-align:center;">Registration Choice<br/> 
					   AND / OR
					   <input name="Registration_Choice"  value="<?php echo isset($info['Registration_Choice']) ? $info['Registration_Choice'] : ''; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="38%" style="padding:4px 8px; text-align:center;"></td>
				</tr>
			</table>
			 
			 <table width="100%" cellpadding="0" border="1">
				 <tr>
					<td width="33%"  style="padding:8px 8px;">Co-Buyer's Name :
					 
					 <input name="CoBuyer_Name"  value="<?php echo isset($info['CoBuyer_Name']) ? $info['CoBuyer_Name'] : $info['spouse_first_name']." ".$info['spouse_last_name']; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="33%"  style="padding:8px 8px;">Date :
					 <input name="Buyer_Date"  value="<?php echo isset($info['Buyer_Date']) ? $info['Buyer_Date'] : date("Y-m-d"); ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="33%"  style="padding:8px 8px;">Salesperson :
					 <input name="Salesperson"  value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson'] ?>"  type="text" class="cutmar_nms6">
					</td>
				 </tr>
			 </table>

			  <table width="100%" cellpadding="0" border="1">
				<tr>
					<td width="33%"  style="padding:8px 8px;">Address :
					 <input name="Address"  value="<?php echo isset($info['Address']) ? $info['Address'] : $info['address']; ?>"  type="text" class="cutmar_nms6">
					</td>
					<td width="33%"  style="padding:8px 8px;">Cell :
					  <input name="Cell"  value="<?php echo isset($info['Cell']) ? $info['Cell'] : $info['mobile']; ?>"  type="text" class="cutmar_nms6">	
					</td>
					<td width="33%"  style="padding:8px 8px;">HM :
					 <input name="HM"  value="<?php echo isset($info['HM']) ? $info['HM'] : $info['phone']; ?>"  type="text" class="cutmar_nms6">
					</td>
				</tr>
			 </table>
			 
			 <table width="100%" cellpadding="0" border="1">
				 <tr>
					 <td width="33%"  style="padding:8px 8px;">City :
					 <input name="City"  value="<?php echo isset($info['City']) ? $info['City'] : $info['city']; ?>"  type="text" class="cutmar_nms6">
					 </td>
					 <td width="33%"  style="padding:8px 8px;">State :
					 <input name="State"  value="<?php echo isset($info['State']) ? $info['State'] : $info['state']; ?>"  type="text" class="cutmar_nms6">
					 </td>
					 <td width="33%"  style="padding:8px 8px;">Zip :
					 <input name="Zip"  value="<?php echo isset($info['Zip']) ? $info['Zip'] : $info['zip']; ?>"  type="text" class="cutmar_nms6">
					 </td>
				 </tr>
			 </table>
			 
			 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:50%; vertical-align:top;"> 
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      <tr>
						<td style="background:#000; color:#fff; font-size:30px; text-align:center; padding:5px 0;"> RV </td>
				      </tr>
				    </table>

				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:33%; text-align:center; padding:12px 0;"> Circle One </td>
							<td style="width:33%; text-align:center; padding:12px 0;"> NEW 
							<input name="Circle_One" <?php echo  ($info['Circle_One'] == "New") ? "checked" : ''; ?>  value="New"  class="" type="radio" />
							</td>
							<td style="width:33%; text-align:center; padding:12px 0;"> USED
							<input name="Circle_One" <?php echo  ($info['Circle_One'] == "Used") ? "checked" : ''; ?>  value="Used"  class="" type="radio" />	
							</td>
				     	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:20%; text-align:center; padding:12px 0;"> Year 
							 <input name="year"  value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
							<td style="width:30%; text-align:center; padding:12px 0;"> Make 
							 <input name="make"  value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
							<td style="width:25%; text-align:center; padding:12px 0;"> Type 
							 <input name="type"  value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
							<td style="width:25%; text-align:center; padding:12px 0;"> Stock 
							 <input name="stock"  value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:33%; text-align:center; padding:12px 0;"> Model 
							<input name="model"  value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
							<td style="width:33%; text-align:center; padding:12px 0;"> Miles
							<input name="miles"  value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
							<td style="width:33%; text-align:center; padding:12px 0;"> Other 
							<input name="other"  value="<?php echo isset($info['other']) ? $info['other'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="background:#000; color:#fff; font-size:30px; text-align:center; padding:5px 0;"> Trade </td>
				      	</tr>
				    </table>

			    
				     <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:20%; text-align:center; padding:12px 0;"> Year <input name="yeartrade"  value="<?php echo isset($info['yeartrade']) ? $info['yeartrade'] : $info['year_trade']; ?>"  type="text" class="cutmar_nms6"></td>
							<td style="width:30%; text-align:center; padding:12px 0;"> Make  <input name="maketrade"  value="<?php echo isset($info['maketrade']) ? $info['maketrade'] : $info['make_trade']; ?>"  type="text" class="cutmar_nms6"></td>
							<td style="width:25%; text-align:center; padding:12px 0;"> Type 
							<input name="typetrade"  value="<?php echo isset($info['typetrade']) ? $info['typetrade'] : $info['type_trade']; ?>"  type="text" class="cutmar_nms6"> 
							</td>
							<td style="width:25%; text-align:center; padding:12px 0;"> Stock <input name="stocktrade"  value="<?php echo isset($info['stocktrade']) ? $info['stocktrade'] : ''; ?>"  type="text" class="cutmar_nms6"></td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:33%; text-align:center; padding:12px 0;"> Model <input name="modeltrade"  value="<?php echo isset($info['modeltrade']) ? $info['modeltrade'] : $info['model_trade']; ?>"  type="text" class="cutmar_nms6"></td>
							<td style="width:33%; text-align:center; padding:12px 0;"> Miles <input name="odometertrade"  value="<?php echo isset($info['odometertrade']) ? $info['odometertrade'] : $info['odometer_trade']; ?>"  type="text" class="cutmar_nms6"></td>
							<td style="width:33%; text-align:center; padding:12px 0;"> Other <input name="othertrade"  value="<?php echo isset($info['othertrade']) ? $info['othertrade'] : ''; ?>"  type="text" class="cutmar_nms6"></td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:100%;  padding:12px 0;"> Lienholder 
							<input name="Lienholder"  value="<?php echo isset($info['Lienholder']) ? $info['Lienholder'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:100%; padding:12px 0;"> Amount Owed 
							<input name="AmountOwed"  value="<?php echo isset($info['AmountOwed']) ? $info['AmountOwed'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:100%; vertical-align:bottom; padding:12px 0; height:100px;"> Current monthly payment
							<input name="Currentmonthlypayment"  value="<?php echo isset($info['Currentmonthlypayment']) ? $info['Currentmonthlypayment'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>				    
			    </td>
			    <td style="width:50%; vertical-align: top;"> 
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td style="width:100%;  padding:6px 10px;"> Email 
							<input name="Email"  value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td class="market1_table" style="width:100%; padding:12px 10px;vertical-align:top;"> Retail Market Value 
							<input name="RetailMarketValue"  value="<?php echo isset($info['RetailMarketValue']) ? $info['RetailMarketValue'] : ''; ?>"  type="text" class="cutmar_nms6">
							</td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td class="market2_table" style="width:100%; vertical-align:top; padding:12px 10px; line-height:22px;"> Camp Assist Package Req. (90 points) </br> Inspecttion One-On-One Ownership Instruction, Test two and Hitch Instruction, coachNET <br> Roadside Assistance, Techical, Support 24/7 <br> (365)<br>
							  Full Interior and Exterior Details <strong style="text-align:right;">$595.00</strong> </td>
				      	</tr>
				    </table>
			    
				    <table width="100%" border="1" cellspacing="0" cellpadding="0">
				      	<tr>
							<td class="market3_table" style="width:100%; padding:12px 10px; vertical-align:top;">
								Total 
								<br>
									<p class="market3_title">+Fees, Lic, Tax, Tire & E-waste Fees</p>
								</br>
							</td>
				      	</tr>
				    </table>
			     </td>
			  </tr>
			</table>
		     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			    <tr>
					<td style=" width:33%; background:#000; color:#fff; font-size:24px; text-align:center; padding:9px 0;"> Trade Market Value </td>
					<td style=" width:33%; background:#000; color:#fff; font-size:24px; text-align:center; padding:9px 0;"> Down Payment </td>
					<td style=" width:33%; background:#000; color:#fff; font-size:24px;text-align:center; padding:9px 0;"> Est. Monthly Payment </td>
			    </tr>
		    </table>
		     <table class="bottom_table" width="100%" border="1" cellspacing="0" cellpadding="0">
			    <tr>
					<td style=" width:33%; font-size:14px;  padding:9px 0; vertical-align:top;"> Trade Subject to final on-site inspection </td>
					<td style=" width:33%; font-size:14px; padding:9px 0; vertical-align:top;"> 30% Lender Recommendation </td>
					<td style=" width:33%; font-size:14px; padding:9px 0; vertical-align:top;">  </td>
			    </tr>
		    </table>
			<table width="100%">
			 	<tr>
			 		<td width="35%" style="text-align:left; font-size:20px; color:#000; padding:5px 10px;">Customers purchase offer</td>
			 	</tr>
			</table>
			<table width="100%">
				<tr>
					 <td width="70%"><input name="" class="top_sty" value="X" type="text"></td>
					 <td width="30%"><input name="" class="top_sty2" value="X" type="text"></td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td width="70%"><input name="" class="top_sty" value="X" type="text"></td>
					<td width="30%"><label style="font-size:14px;">Sales Manager Approval</label></td>
				</tr>
			</table>
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
