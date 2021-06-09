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
.motor_1{height:150px;}
.motor_2{height:185px;}
			
			
			
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
                <td align="left"><img style="height:90px;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/goaz_logo.png'); ?>" alt=""></td>
                <td colspan="2" align="center" valign="middle">
                <h2><b>GOAZ MOTORCYCLES</b></h2>
                <h4><i>DEMO CONDITION REPORT</i></h4>
                </td>
                <td align="right"><img style="height:90px;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/goaz_logo.png'); ?>" alt=""></td></td>
                
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                   
                    <td><label style="width:100%; display:inline;">Date: <input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width:60%;" /></label></td>
               	</tr>
                <tr>
                <td colspan="2" ><label style="width:100%; display:inline;">Customer: <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width:75%;" /></label></td>
                <td colspan="2">
                	<label style="width:100%; display:inline;">Salesperson:  <input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:70%;" /></label>
                </td>
                </tr>
                
                <tr>
                <td colspan="2" ><label style="width:100%; display:inline;">VIN: <input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width:75%;" /></label></td>
                <td colspan="2">
                	<label style="width:100%; display:inline;">License Plate:  <input type="text" name="licence_plate" value="<?php echo isset($info['licence_plate'])?$info['licence_plate']:''; ?>" style="width:70%;" /></label>
                </td>
                </tr>
                
                <tr>
                	<td width="23%"><label style="width:100%; display:inline;">Year:  <input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:65%;" /></label></td>
                    <td width="27%"><label style="width:100%; display:inline;">Make:  <input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:75%;" /></label></td>
 					<td width="27%"><label style="width:100%; display:inline;">Model:  <input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:65%;" /></label></td>			              		<td width="23%"><label style="width:100%; display:inline;">Color:  <input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width:65%;" /></label></td>
               
                </tr>
                
                <tr>
                <td colspan="2" ><label style="width:100%; display:inline;">Mileage Out:  <input type="text" name="mileage_out" value="<?php echo isset($info['mileage_out'])?$info['mileage_out']:''; ?>" style="width:70%;" /></label></td>
                <td colspan="2">
                	<label style="width:100%; display:inline;">Mileage In:  <input type="text" name="mileage_in" value="<?php echo isset($info['mileage_in'])?$info['mileage_in']:''; ?>" style="width:75%;" /></label>
                </td>
                </tr>
                <tr>
                <td colspan="4" align="center">
                <p>*Indicate any existing damage below*</p>
                </td></tr>
                
                <tr>
                    <td colspan="2" align="right">
                        <img class="motor_1" src="<?php echo ('/app/webroot/files/goaz_images/motor_1.png'); ?>" alt="">
                    </td>
                    <td colspan="2" align="left">
                	<img class="motor_1" src="<?php echo ('/app/webroot/files/goaz_images/motor_2.png'); ?>" alt="">
                </td>
                    
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <img class="motor_2" src="<?php echo ('/app/webroot/files/goaz_images/motor_3.png'); ?>" alt="">
                    </td>
                    <td colspan="2" align="left">
                	<img class="motor_2" src="<?php echo ('/app/webroot/files/goaz_images/motor_4.png'); ?>" alt="">
                </td>
                    
                </tr>
                
                <tr>
                    <td colspan="2" align="right">
                        <img class="motor_2" src="<?php echo ('/app/webroot/files/goaz_images/motor_5.png'); ?>" alt="">
                    </td>
                    <td colspan="2" align="left">
                	<img class="motor_2" src="<?php echo ('/app/webroot/files/goaz_images/motor_6.png'); ?>" alt="">
                </td>
                    
                </tr>
                <tr>
                	<td colspan="4" ><label style="width:100%; display:inline;">Explain:   <input type="text" style="width:80%;" name="explain" value="<?php echo isset($info['explain'])?$info['explain']:''; ?>" /></label></td>
                </tr>
                <tr>
                	<td colspan="4" ><strong>Demo Out:</strong></td>
                </tr>
                <tr>
                <td colspan="2" ><label style="width:100%; display:inline;">Rider Signature:   <input type="text" style="width:60%;" /></label></td>
                <td colspan="2">
                	<label style="width:100%; display:inline;">Salesperson Signature:   <input type="text" style="width:50%;" /></label>
                </td>
                </tr>
                 <tr>
                	<td colspan="4" ><strong>Demo In:</strong></td>
                </tr>
                <tr>
                <td colspan="2" ><label style="width:100%; display:inline;">Rider Signature:   <input type="text" style="width:60%;" /></label></td>
                <td colspan="2">
                	<label style="width:100%; display:inline;">Salesperson Signature:   <input type="text" style="width:50%;" /></label>
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
