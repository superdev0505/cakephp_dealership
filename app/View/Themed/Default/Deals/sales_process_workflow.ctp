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
		body {
			margin: 0 7%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
		}
		.sales_form {
			border: solid 2px #000 !important;
			-webkit-appearance: none;
			-moz-appearance: none;
			-o-appearance: none;
			appearance: none;
			width: 25px;
			height: 25px; vertical-align:middle;
			margin-right: 10px;
		}

		.sales_form2{ border:none; border-bottom:solid 1px #333; width:40%; margin:0 8px;}

		.sales_form3{ border:none; border-bottom:solid 1px #333; width:30%; margin:0 8px;}
		@media print
		{
			#worksheet_container{
			
				height:100% !important;
				width:900px !important;
			}
		
		}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:26px; text-align:center; padding-top:30px; padding-bottom:20px;">Sales Process Workflow</td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
			<input  name="connect"  value="connect" <?php echo ($info['connect'] == "connect") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
			Connect</td>        
        <td style="width:70%; line-height:25px;">Get Name and phone number, find a common connection.</br>
        Name:<input name="namedata"  value="<?php echo isset($info['namedata']) ? $info['namedata'] :  ''; ?>"  type="text" class="sales_form2 " /> Number: <input name="numberdata"  value="<?php echo isset($info['numberdata']) ? $info['numberdata'] :  ''; ?>" type="text" class="sales_form3 " /></br>
       Common interest:<input name="interestdata"  value="<?php echo isset($info['interestdata']) ? $info['interestdata'] :  ''; ?>" type="text" class="sales_form2 " /> </br>  Email:<input name="emaildata"  value="<?php echo isset($info['emaildata']) ? $info['emaildata'] :  ''; ?>" type="text" class="sales_form2 " /></td>
        <td style="width:10%; vertical-align:bottom;"> CONNECT </td>
      </tr>
    </table>
    
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
			<input  name="Understand"  value="Understand" <?php echo ($info['Understand'] == "Understand") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
		Understand </td>
        
        <td style="width:70%; line-height:25px;">Type of Riding: <input  name="ridingdata"  value="<?php echo isset($info['ridingdata']) ? $info['ridingdata'] :  ''; ?>"   type="text" class="sales_form2 " /> </br>
       Trade:<input  name="tradedata"  value="<?php echo isset($info['tradedata']) ? $info['tradedata'] :  ''; ?>"   type="text" class="sales_form2 " /> </br>
       What do they want the same:<input  name="samedata"  value="<?php echo isset($info['samedata']) ? $info['samedata'] :  ''; ?>"   type="text" class="sales_form2 " /> </br>
        What do they want different:<input  name="differentdata"  value="<?php echo isset($info['differentdata']) ? $info['differentdata'] :  ''; ?>"   type="text" class="sales_form2 " /></td>
        <td style="width:10%; vertical-align:bottom;"> CONNECT </td>
      </tr>
    </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
			<input  name="Satisfy"  value="Satisfy" <?php echo ($info['Satisfy'] == "Satisfy") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
		
		Satisfy </td>
        
        <td style="width:70%; line-height:25px;">
		Test Ride: Check Gas&nbsp;&nbsp;<input  name="Satisfy1"  <?php echo ($info['Satisfy1'] == "Check Gas") ? 'checked' :  ''; ?>   type="checkbox" value="Check Gas" class="" /> 
        Check Air in Tires&nbsp;&nbsp; <input  name="Satisfy2"  <?php echo ($info['Satisfy2'] == "Check Air in Tires") ? 'checked' :  ''; ?>  type="checkbox" value="Check Air in Tires" class="" /> 
        Waiver signed &nbsp;&nbsp;	<input  name="Satisfy3"  <?php echo ($info['Satisfy3']== "Waiver signed") ? 'checked' :  ''; ?>   type="checkbox" value="Waiver signed" class="" /> </br>
       Start Worksheet while out on test ride </br>Do Trade Evaluation</td>
       
        <td style="width:10%; vertical-align:bottom;"> CONNECT </td>
      </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
			<input  name="TrialClose"  value="TrialClose" <?php echo ($info['TrialClose'] == "TrialClose") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
	Trial Close </td>
        
        <td style="width:70%; line-height:28px;"> Present the bike and explain how it meets their needs based on what they </br> 
       told you they wanted.  Offer suggestions on Accessories that might make </br>  
       the bike more theirs.   (Custom Coverage Program) </br>
       Service <input  name="Trial1"   <?php echo ($info['Trial1']== "Service") ? 'checked' :  ''; ?>  type="checkbox" value="Service" class="" />
          Parts <input  name="Trial2"    <?php echo  ($info['Trial2']== "Parts") ? 'checked' :  ''; ?>   type="checkbox" value="Parts" class="" />
          Motorclothes <input  name="Trial3"    <?php echo ($info['Trial3']== "Motorclothes") ? 'checked' :  ''; ?>   type="checkbox" value="Motorclothes" class="" /> </br> 
          Complete worksheet and pull bike folder </td>
       
        <td style="width:10%; vertical-align:bottom;"> CONNECT </td>
      </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
		<input  name="Obtain"  value="Obtain" <?php echo ($info['Obtain'] == "Obtain") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
		Obtain Commitment </td>
        
        <td style="width:70%; line-height:28px;"> Present the bike and explain how it meets their needs based on what they </br> 
       Shake on it </br>  
       Turnover to F&I (at sales desk if possible) </br>
       F&I will bring down approval and go over with customer </br>
       Poker Run </br>
       Bring customer up when F&I is ready </br> 
       While customers are in F&I,  <span style="padding-left:25px;"> Fill Gas <input  name="obtained1"  <?php echo ($info['obtained1']== "Fill Gas") ? 'checked' :  ''; ?>    type="checkbox" value="Fill Gas" class="" /> 
       Check Air in tires <input  name="obtained2"  <?php echo ($info['obtained2']== "Check Air in tires") ? 'checked' :  ''; ?>    type="checkbox" value="Check Air in tires" class="" /></span> </td>
       
        <td style="width:10%; vertical-align:bottom;"> CONNECT </td>
      </tr>
    </table>
    
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
      <tr>
        <td style="width:20%; font-weight:600; vertical-align:top;"> 
		<input  name="Maintain"  value="Maintain" <?php echo ($info['Maintain'] == "Maintain") ? "checked" :  ''; ?>  type="checkbox" class="trade_in_from3" />
		Maintain Relationship</td>
        
        <td style="width:70%; line-height:28px;"> Ensure that deal and automated follow up activities are in CONNECT </br> 
       Add any extra activities you think are important besides the standard </br>  
       Reminder for Custom Coverage accessories? </br>
        <span style="padding-left:45px;"> If they didn't get all or some of the accessories they wanted.</span> </br>
       Reminder for Upcoming Event? </br>
       </td>
       
        <td style="width:10%; vertical-align:bottom;">  </td>
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
