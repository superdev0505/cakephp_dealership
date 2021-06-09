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
		.scan_demo1 {
			width: 90%;
			border-bottom: solid 1px #000;
			border-top: none;
			border-left: none;
			border-right: none;
		}
		
		@media print
		{
			#worksheet_container{
			
				height:100% !important;
				width:1000px !important;
			}
		
		}

	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="text-align:center;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/scan-one.png'); ?>" /></td>
      </tr>
      <tr>
        <td style="text-align:center; line-height:25px;"><strong style="font-size:20px;">St. Croix Harley-Davidson</strong> <br />
          <strong>2060 Highway 65, New Richmond, WI 54017</strong><br />
          715-246-2959 FAX: 715-246-5129<br />
          www.stcroixhd.com</td>
      </tr>
      <tr>
        <td style="text-align:center; font-size:25px; font-style:italic; font-weight:600; padding:10px 0;"> DEMONSTRATION RIDE RELEASE OF LIABILITY </td>
      </tr>
      <tr>
        <td style=" font-size:16px; padding:10px 0;">The undersigned releases St Croix Harley-Davidson, it’s employees, officers, directors and agents from any claims that
          may arise in connection with my demonstration ride of a motorcycle. </td>
      </tr>
      <tr>
        <td style=" font-size:16px; padding:10px 0;">I am an experienced operator of a motorcycle and release St Croix Harley-Davidson from any and all claims that may
          arise, including accidents, personal injury, death, property damage or any other incidents that may be a result of this
          voluntary demonstration ride. </td>
      </tr>
      <tr>
        <td style=" font-size:16px; padding:10px 0;">By signing this release I agree to wear a helmet, protective eyewear, long pants and shoes suitable for riding a
          motorcycle. If I do not have a helmet or eyewear with me, St Croix Harley-Davidson will provide it for me. I also certify that
          I have read this release and understand it in full. </td>
      </tr>
      <tr>
        <td style=" font-size:16px; padding:10px 0 50px 0;;">With this signature I release St Croix Harley-Davidson of all liability. I am aware that I am riding a heavy-weight
          motorcycle with a high performance engine. </td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="rider_printed_name"  value="<?php echo isset($info['rider_printed_name']) ? $info['rider_printed_name'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          Rider Printed Name </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="driver_license_no"  value="<?php echo isset($info['driver_license_no']) ? $info['driver_license_no'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Drivers License Number</td>
      </tr>
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="saddress"  value="<?php echo isset($info['saddress']) ? $info['saddress'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          Street Address </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="homephone"  value="<?php echo isset($info['homephone']) ? $info['homephone'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Home Phone </td>
      </tr>
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="citystatezip"  value="<?php echo isset($info['citystatezip']) ? $info['citystatezip'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          City, State, ZIP </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="cellphone"  value="<?php echo isset($info['cellphone']) ? $info['cellphone'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Cell Phone </td>
      </tr>
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="ridersig"  value="<?php echo isset($info['ridersig']) ? $info['ridersig'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          Rider Signature </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="datedata"  value="<?php echo isset($info['datedata']) ? $info['datedata'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Date </td>
      </tr>
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="passenger_name"  value="<?php echo isset($info['passenger_name']) ? $info['passenger_name'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          Passenger Printed Name </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="parent_printname"  value="<?php echo isset($info['parent_printname']) ? $info['parent_printname'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Parent/Guardian Printed Name if Passenger is under 18 </td>
      </tr>
      <tr>
        <td style="width:60%; font-size:14px; padding-bottom:30px;"><input name="passenger_sig"  value="<?php echo isset($info['passenger_sig']) ? $info['passenger_sig'] :  ''; ?>" type="text" class="scan_demo1" />
          <br>
          Passenger Signature (or Parent/Guardian Signature if Passenger is under 18) </td>
        <td style="width:40%; font-size:14px; padding-bottom:30px;"><input name="passenger_date"  value="<?php echo isset($info['passenger_date']) ? $info['passenger_date'] :  ''; ?>" type="text" class="scan_demo1" />
          <br />
          Date</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Model #1:</td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="model1"  value="<?php echo isset($info['model1']) ? $info['model1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileageout1"  value="<?php echo isset($info['mileageout1']) ? $info['mileageout1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timeout1"  value="<?php echo isset($info['timeout1']) ? $info['timeout1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileagein1"  value="<?php echo isset($info['mileagein1']) ? $info['mileagein1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timein1"  value="<?php echo isset($info['timein1']) ? $info['timein1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Employee: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="employees1"  value="<?php echo isset($info['employees1']) ? $info['employees1'] :  ''; ?>" type="text" class="scan_demo1" /></td>
      </tr>
      <tr>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Model #2:</td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="model2"  value="<?php echo isset($info['model2']) ? $info['model2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileageout2"  value="<?php echo isset($info['mileageout2']) ? $info['mileageout2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timeout2"  value="<?php echo isset($info['timeout2']) ? $info['timeout2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileagein2"  value="<?php echo isset($info['mileagein2']) ? $info['mileagein2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timein2"  value="<?php echo isset($info['timein2']) ? $info['timein2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Employee: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="employees2"  value="<?php echo isset($info['employees2']) ? $info['employees2'] :  ''; ?>" type="text" class="scan_demo1" /></td>
      </tr>
      <tr>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Model #3:</td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="model3"  value="<?php echo isset($info['model3']) ? $info['model3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileageout3"  value="<?php echo isset($info['mileageout3']) ? $info['mileageout3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timeout3"  value="<?php echo isset($info['timeout3']) ? $info['timeout3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileagein3"  value="<?php echo isset($info['mileagein3']) ? $info['mileagein3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timein3"  value="<?php echo isset($info['timein3']) ? $info['timein3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Employee: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="employees3"  value="<?php echo isset($info['employees3']) ? $info['employees3'] :  ''; ?>" type="text" class="scan_demo1" /></td>
      </tr>
      <tr>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Model #4:</td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="model4"  value="<?php echo isset($info['model4']) ? $info['model4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileageout4"  value="<?php echo isset($info['mileageout4']) ? $info['mileageout4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timeout4"  value="<?php echo isset($info['timeout4']) ? $info['timeout4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileagein4"  value="<?php echo isset($info['mileagein4']) ? $info['mileagein4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timein4"  value="<?php echo isset($info['timein4']) ? $info['timein4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Employee: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="employee4"  value="<?php echo isset($info['employee4']) ? $info['employee4'] :  ''; ?>" type="text" class="scan_demo1" /></td>
      </tr>
      <tr>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Model #5:</td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="model5"  value="<?php echo isset($info['model5']) ? $info['model5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileageout5"  value="<?php echo isset($info['mileageout5']) ? $info['mileageout5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time Out: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timout5"  value="<?php echo isset($info['timout5']) ? $info['timout5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Mileage In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="mileagein5"  value="<?php echo isset($info['mileagein5']) ? $info['mileagein5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Time In: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="timein5"  value="<?php echo isset($info['timein5']) ? $info['timein5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"> Employee: </td>
        <td style="font-size:14px; width:8%; padding-bottom:30px;"><input name="employee5"  value="<?php echo isset($info['employee5']) ? $info['employee5'] :  ''; ?>" type="text" class="scan_demo1" /></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <tr>
        <td style="text-align:center; font-size:25px; font-style:italic; font-weight:600; padding:10px 0 30px 0;"> 20 MINUTE TIME LIMIT ON ALL DEMONSTRATION RIDES </td>
      </tr>
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
