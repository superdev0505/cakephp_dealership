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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
			
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellpadding="4">
                <tr>
                
                
                <td colspan="4" align="center" valign="middle">
                <h4 style="text-decoration:underline; line-height:30px;"><b>LZ Delta, LLC/ dba GO AZ Motorcycles<br/>
                DEMONSTRATION RIDER ASSUMPTION OF THE RISK, <br/>
                WAIVER AND RELEASE OF LIABILITY AGREEMENT
                </b></h4>
                
                </td>
                </tr>
                </table>
                <br/>
                <p>I desire to participate in a demonstration ride of a motorcycle or other vehicle (“vehicle”) held for sale by LZ Delta, LLC (“LZ Delta”).  </p>
                <br/>
                <div>
                <p>1.	<span class="headline_span">Assumption of Risk.</span>  I, on my own behalf and on my behalf of my heirs, personal representatives, assigns and other successors in interest, agree as follows:</p>
              
                <p class="sub_point">a. I acknowledge and understand the riding a vehicle is a potentially hazardous activity, including, but not limited to, the potential for death, serious personal injury and property loss, and voluntarily chooses to ride the vehicle out of his or her free will.  In choosing to ride on LZ Delta’s vehicle, <b>I fully accept and assume all risks, arising under or relating to omissions and/or acts of negligence, including reckless or gross negligence, and/or willful and wanton misconduct by LZ Delta, their employees, agents, members, and/or other representatives, associated with the demonstration ride(s) of the vehicle, including not limited to, physical injury, mental injury, emotional distress, trauma, illness, death, contact with other drivers, vehicle failure, equipment failure, the effects of weather including extreme temperature or conditions, traffic, contact with motor vehicles of all types and descriptions, collisions with other riders or fixed objects, and road conditions.  I waive any and all specific notice of the existence of the risks.</b>  I shall assume and pay my own medical and emergency expenses in the event of injury, illness, or other incapacity regardless of whether I authorize such expenses.</p>
                
                <p class="sub_point">b. <b>Damages to the Vehicle.</b>  I further acknowledge and agree that I accept <b>full and immediate financial responsibility for any and all damages to the vehicle</b> as a result of my choosing to participate in a demonstration ride of the vehicle, including but not limited to collisions involving the vehicle and any other moving and/or stationery objects, and collisions with the ground either while moving or at a standstill or both.  LZ Delta agrees to do a preliminary damage assessment upon return of the vehicle and further agrees to provide a detailed estimate of the parts and labor required to repair the vehicle within a reasonable time frame.  I understand and acknowledge that LZ Delta reserves the right to contact my insurance company for any reason concerning any damages or injuries that may occur as a result of the demonstration ride of the vehicle.</p>
                
                <p>2.	<span class="headline_span">Waiver and Release of Liability.</span>  Knowing these risks, and in consideration of LZ Delta providing a vehicle to enable me to participate in a demonstration ride(s), I, on my own behalf and on my behalf of my heirs, personal representatives, assigns and other successors in interest, agree as follows:</p>
                
                <p class="sub_point">a. I release, waive, remise, discharge, covenant not to sue and agree to hold LZ Delta, its members, affiliates, employees, agents, directors, officers, or assigns harmless from any and all claims, demands, and actions of any and every kind I have, may have, or hereafter accrue against the released parties directly or indirectly arising out of or relating in any respect to my participation in a demonstration ride(s).  My assumption of the risk, waiver and release of all claims, demands, actions, and liability shall include, without limitation, any injury, including death, damage or loss to my person or property which may be sustained by me before, during, or after the demonstration ride (s).  I further agree to indemnify and hold the parties released above harmless from any and all losses, damages, claims, and expenses, including attorneys fees, arising from or relating in any respect to my participation in a demonstration ride(s). </p>
                
                 <p class="sub_point">b. I represent that I do not have any physical, mental or other impairments, conditions, or disabilities that may affect my safety or ability to participate in a demonstration ride.    I further agree that I alone am responsible for my safety which participating in the demonstration ride(s).</p>
                
                <p class="sub_point">c. I represent that I hold a valid motorcycle driver’s license, possess applicable insurance, will wear an authorized helmet during the demonstration ride(s), and have experience in riding vehicles similar to the vehicle provided for the demonstration ride(s).</p>
                
                <p class="sub_point">d. I further agree that this waiver, assumption of risk and release of liability agreement is intended to be as broad and inclusive as is permitted by the laws of the State of Arizona, and if any word, term, clause, or part of any provision of this agreement shall be invalid, illegal, or unenforceable for any reason, the same shall be ineffective, but the remainder of this agreement shall not be affected and shall remain in full force and effect.</p>
                
                
                </div>
                <br/>
                <label>BY SIGNING THIS AGREEMENT, I CERTIFY THAT I HAVE READ THIS ASSUMPTION OF THE RISK, WAIVER AND RELEASE OF LIABILITY AGREEMENT AND FULLY UNDERSTAND IT AND INTEND IT TO EXEMPT AND RELEASE LZ DELTA, LLC FROM ANY AND ALL LIABILITY FOR PERSONAL INJURY, DEATH, OR PROPERTY DAMAGE RESULTING FROM ANY CAUSE.  IN ADDITION, I CERTIFY THAT I AM FULLY FINANCIALLY RESPONSIBLE FOR ANY AND ALL DAMAGES TO THE VEHICLE WHILE IN POSSESSION OF THE VEHICLE.  FURTHERMORE, I AM NOT RELYING ON ANY OTHER STATEMENTS OR REPRESENTATIONS NOT INCLUDED IN THIS AGREEMENT.</label>
                <br/>
                <table width="100%" cellpadding="4">
                	<tr>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text"  style="width:95%;" />SIGNATURE</label>
                    </td>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width:95%;" />DATE</label>
                    </td>
                    
                    </tr>
                    
                    <tr>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"  style="width:95%;" />PRINT NAME</label>
                    </td>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width:95%;" />LICENSE NUMBER AND STATE</label>
                    </td>
                    
                    </tr>
                    
                    <tr>
                    <td colspan="2">
                    <label style="width:100%; display:inline;">  <input type="text" name="policy_number" value="<?php echo isset($info['policy_number'])?$info['policy_number']:''; ?>"  style="width:95%;" />INSURANCE COMPANY AND POLICY NUMBER</label>
                    </td>
                    
                    </tr>
                    
                     <tr>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>"  style="width:95%;" />PHONE NUMBER</label>
                    </td>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width:95%;" />EMAIL ADDRESS</label>
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
