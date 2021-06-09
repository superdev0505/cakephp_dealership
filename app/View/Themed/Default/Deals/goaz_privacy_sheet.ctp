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
	.sub_point{margin-left:30px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
	ul.point_list{list-style-type:square!important;}		
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
                 <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/goaz_logo.png'); ?>" alt=""><br/>
                <h4 style="text-decoration:underline; line-height:30px;margin-bottom:15px;"><b>Privacy Notice</b></h4>
                
                </td>
                </tr>
                </table>
                <br/>
                <p>In connection with your transaction, GOAZ MOTORCYCLES may obtain information about you as described in this notice, which we handle as stated in this notice.</p>
                <br/>
                <div>
                <p>1. We collect nonpublic information about you from the following sources:</p>
              <div class="sub_point">
                <ul class="point_list">
                    <li>Information we receive from you on applications or other forms;</li>
                    <li>Information about your transactions with us, our affiliates of others; and,</li>
                    <li>Information we receive from a consumer-reporting agency.</li>
                </ul>
              </div>
                
                <p>2. We may disclose all of the information we collect, as described above, to companies 
     that perform marketing services on our behalf or to other financial institutions with whom we have joint marketing agreements.  We may make such disclosures about you as a consumer, customer, or former customer.</p>
                
                <p>3. We may also disclose nonpublic personal information as a consumer, customer, or 
     former customer, to non-affiliated third parties as permitted by law.</p>
                
                <p>4.  We restrict access to nonpublic information about you to employees who need to know that information to provide products or services to you.  We maintain physical,electronic, and procedural safeguards that comply with federal regulations to guard your nonpublic personal information. </p>
                <br/><br/>
                <p><b>CUSTOMER ACKNOWLEDGEMENT:  I (we) acknowledge that I (we) received a copy of this notice on the date indicated below. </b></p>	
                 
                
                </div>
                <br/>
               
                <br/>
                <table width="100%" cellpadding="4">
                	<tr>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text"  style="width:95%;" />Customer Signature</label>
                    </td>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" style="width:95%;" />Customer Signature  </label>
                    </td>
                    
                    </tr>
                    
                    <tr>
                    <td width="50%">
                    <label style="width:100%; display:inline;">  <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"  style="width:95%;" />Customer Name (printed)</label>
                    </td>
                    <td width="50%">
                     <label style="width:100%; display:inline;">  <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"  style="width:95%;" />Customer Name (printed)</label>
                    </td>
                    
                    </tr>
                    
                              
                     <tr>
                    <td width="50%">
                    <label style="width:100%;display:inline;">  <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>"  style="width:95%;" />Date</label>
                    </td>
                    <td width="50%">
                    <label style="width:100%;display:inline;">  <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width:95%;" />Date</label>
                    </td>
                    
                    </tr>
                
                </table>
                
                
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
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
