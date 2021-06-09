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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 2px;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center;"><b>Client Assessment Review Evaluation</b></h2>
		<div class="row" style="float: left; width: 100%; margin-left: 41%;">
			<div class="logo" style="width: 200px; margin: 20px auto;float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 28%;margin: 15px 182px;">
				<label>Salesperson:</label>
				<input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 40%"> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 3px;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">General<br>
				Information</p>
			</div>
			
			<div class="form-field" style="float: left; box-sizing: border-box; width: 30%; border: 1px solid #000; padding: 7px; margin: 0 5%; line-height: 20px;">
				<p style="margin: 0; font-size: 14px;">Have you ever visited <br> Commercial Truck <br> Center of VA before? <br> <input type="radio" name="va_status" <?php echo (isset($info['va_status']) && $info['va_status']=='yes')?'checked="checked"':''; ?> value="yes"> Yes <input type="radio" name="va_status" <?php echo (isset($info['va_status']) && $info['va_status']=='no')?'checked="checked"':''; ?> value="no"> No</p>
			</div>
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 40%; border: 1px solid #000; padding: 7px; line-height: 26px;">
				<p style="margin: 0; font-size: 14px;">Reason for looking? <br> <input type="radio" name="reason_status" <?php echo (isset($info['reason_status']) && $info['reason_status']=='lease-end')?'checked="checked"':''; ?> value="lease-end"> Lease End <input type="radio" name="reason_status" <?php echo (isset($info['reason_status']) && $info['reason_status']=='larger')?'checked="checked"':''; ?> value="larger"> Larger <input type="radio" name="reason_status" <?php echo (isset($info['reason_status']) && $info['reason_status']=='smaller')?'checked="checked"':''; ?> value="smaller"> Smaller <br> <input type="radio" name="reason_status" <?php echo (isset($info['reason_status']) && $info['reason_status']=='other')?'checked="checked"':''; ?> value="other"> Other <input type="text" name="name"  style="width: 20%;"></p>
			</div>
			
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 75%; margin-top: 6px; border: 1px solid #000; padding: 7px; line-height: 26px;">
				<p style="margin: 0; font-size: 14px;">What encouraged you to visit us today? <br> <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='np')?'checked="checked"':''; ?> value="np"> Newspaper <input type="text" name="newspaper" value="<?php echo isset($info['newspaper'])?$info['newspaper']:''; ?>" style="width: 20%;">  <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='webs')?'checked="checked"':''; ?> value="webs"> Website <input type="text" name="web" value="<?php echo isset($info['web'])?$info['web']:''; ?>" style="width: 20%;"> <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='rdo')?'checked="checked"':''; ?> value="rdo"> Radio <input type="text" name="radio" value="<?php echo isset($info['radio'])?$info['radio']:''; ?>" style="width: 20%;"> <br> <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='ct')?'checked="checked"':''; ?> value="ct"> Cable TV <input type="text" name="cable" value="<?php echo isset($info['cable'])?$info['cable']:''; ?>" style="width: 20%;">   <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='dm')?'checked="checked"':''; ?> value="dm"> Direct Mail <input type="text" name="direct" value="<?php echo isset($info['direct'])?$info['direct']:''; ?>" style="width: 20%;"> <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='rf')?'checked="checked"':''; ?> value="rf"> Referral <input type="text" name="referral" value="<?php echo isset($info['referral'])?$info['referral']:''; ?>" style="width: 20%;">  
 <br> <input type="radio" name="encour_status" <?php echo (isset($info['encour_status']) && $info['encour_status']=='other')?'checked="checked"':''; ?> value="other"> Other <input type="text" name="other" value="<?php echo isset($info['other'])?$info['other']:''; ?>"  style="width: 20%;"></p>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Type</p>
			</div>
			
			<div class="form-field" style="float: left; box-sizing: border-box; width: 40%; border: 1px solid #000; padding: 7px; margin: 0 5%; line-height: 20px;">
				<p style="margin: 0; font-size: 14px;"> <input type="radio" name="vehicle_status" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='cr')?'checked="checked"':''; ?> value="cr"> Car <input type="radio" name="vehicle_status" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='trk')?'checked="checked"':''; ?> value="trk"> Truck <input type="radio" name="vehicle_status" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='suv')?'checked="checked"':''; ?> value="suv"> SUV  <input type="radio" name="vehicle_status" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='van')?'checked="checked"':''; ?> value="van"> Van <input type="radio" name="vehicle_status" <?php echo (isset($info['vehicle_status']) && $info['vehicle_status']=='otr')?'checked="checked"':''; ?> value="otr"> Other </p>
			</div>
			
			<div style="clear: both; margin-bottom: 7px;"></div>
			
			
			<div class="form-field" style="float: left;; box-sizing: border-box; width: 40%; margin: 0 0 0 25%;; border: 1px solid #000; padding: 7px; line-height: 26px;">
				<p style="margin: 0; font-size: 14px;"> <input type="radio" name="dev_status" <?php echo (isset($info['dev_status']) && $info['dev_status']=='buns')?'checked="checked"':''; ?> value="buns"> Business <input type="radio" name="dev_status" <?php echo (isset($info['dev_status']) && $info['dev_status']=='psnl')?'checked="checked"':''; ?> value="psnl"> Personal <input type="radio" name="dev_status" <?php echo (isset($info['dev_status']) && $info['dev_status']=='rconl')?'checked="checked"':''; ?> value="rconl"> Recreational <br> <input type="radio" name="dev_status" <?php echo (isset($info['dev_status']) && $info['dev_status']=='oter')?'checked="checked"':''; ?> value="oter"> other <input type="text" name="dev_other" value="<?php echo isset($info['dev_other'])?$info['dev_other']:''; ?>"  style="width: 20%;"></p>
			</div>
			
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 30%; border: 1px solid #000; padding: 7px; line-height: 26px;">
				<p style="margin: 0; font-size: 14px;"> # Driver: <input type="text" name="driver" value="<?php echo isset($info['driver'])?$info['driver']:''; ?>" style="width: 50%; float: right;"></p>
				<p style="margin: 0; font-size: 14px;"> # Passengers: <input type="text" name="passenger" value="<?php echo isset($info['passenger'])?$info['passenger']:''; ?>"  style="width: 50%; float: right;"></p>
				<p style="margin: 0; font-size: 14px;"> # Miles/year: <input type="text" name="miles_year" value="<?php echo isset($info['miles_year'])?$info['miles_year']:''; ?>" style="width: 50%; float: right;"></p>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Options</p>
			</div>
			
			<div class="form-field" style="float: left; box-sizing: border-box; width: 35%; border: 1px solid #000; padding: 7px; margin: 0 5%; line-height: 20px;">
				<label>MUST have:</label>
				<input type="text" name="must1" value="<?php echo isset($info['must1'])?$info['must1']:''; ?>" style="width: 70%; float: right;">
				<input type="text" name="must2" value="<?php echo isset($info['must2'])?$info['must2']:''; ?>" style="width: 100%; float: right; margin: 10px 0;">
				<input type="text" name="must3" value="<?php echo isset($info['must3'])?$info['must3']:''; ?>" style="width: 100%; float: right;">
			</div>
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 35%; border: 1px solid #000; padding: 7px; line-height: 20px;">
				<label>LIKE to have:</label>
				<input type="text" name="like1" value="<?php echo isset($info['like1'])?$info['like1']:''; ?>" style="width: 65%; float: right;">
				<input type="text" name="like2" value="<?php echo isset($info['like2'])?$info['like2']:''; ?>" style="width: 100%; float: right; margin: 10px 0;">
				<input type="text" name="like3" value="<?php echo isset($info['like3'])?$info['like3']:''; ?>" style="width: 100%; float: right;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Current <br>Vehicle</p>
			</div>
			
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px; margin: 0 5%; line-height: 20px;">
				<p style="margin: 0; font-size: 14px;"> <input type="radio" name="current_vehi" <?php echo (isset($info['current_vehi']) && $info['current_vehi']=='add')?'checked="checked"':''; ?> value="add"> Adding <input type="radio" name="current_vehi" <?php echo (isset($info['current_vehi']) && $info['current_vehi']=='repl')?'checked="checked"':''; ?> value="repl"> Replacing <input type="radio" name="current_vehi" <?php echo (isset($info['current_vehi']) && $info['current_vehi']=='est')?'checked="checked"':''; ?> value="est"> Estimate? </p>
			</div>
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 50%; border: 1px solid #000; padding: 7px; line-height: 20px;">
				<div class="form-field" style="float: left; width: 33%;">
					<label>Year:</label>
					<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 65%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 34%;">
					<label>Make:</label>
					<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 65%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 33%;">
					<label>Model:</label>
					<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 65%; float: right;">
				</div>
				
				
				<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
					<label>Miles:</label>
					<input type="text" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" style="width: 65%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 50%; margin: 7px 0;">
					<label>Equipment:</label>
					<input type="text" name="equipment" value="<?php echo isset($info['equipment'])?$info['equipment']:''; ?>" style="width: 65%; float: right;">
				</div>
				
				
				<p style="margin: 0; font-size: 14px;"> <input type="radio" name="equipment_status" <?php echo (isset($info['equipment_status']) && $info['equipment_status']=='add')?'checked="checked"':''; ?> value="add"> Warranty <input type="radio" name="equipment_status" <?php echo (isset($info['equipment_status']) && $info['equipment_status']=='repl')?'checked="checked"':''; ?> value="repl"> Security System <input type="radio" name="equipment_status" <?php echo (isset($info['equipment_status']) && $info['equipment_status']=='est')?'checked="checked"':''; ?> value="est"> Certified </p>
			</div>
		</div>
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Love/Improve <br> Current <br> Vehicle</p>
			</div>
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 75%; border: 1px solid #000; padding: 7px; line-height: 20px;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Love</label>
					<input type="text" name="love_vehicle1" value="<?php echo isset($info['love_vehicle1'])?$info['love_vehicle1']:''; ?>" style="width: 94%; float: right;">
					<input type="text" name="love_vehicle2" value="<?php echo isset($info['love_vehicle2'])?$info['love_vehicle2']:''; ?>" style="width: 100%; float: right; margin: 10px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%;">
					<label>Improve</label>
					<input type="text" name="improve_vehicle" value="<?php echo isset($info['improve_vehicle'])?$info['improve_vehicle']:''; ?>" style="width: 92%; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Previous <br> Purchase</p>
			</div>
			
			<div class="form-field" style="float: left; box-sizing: border-box; width: 35%; border: 1px solid #000; padding: 7px; line-height: 24px; margin: 0 5%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Date Purchased: </label>
					<input type="text" name="purchased_date" value="<?php echo isset($info['purchased_date'])?$info['purchased_date']:''; ?>" style="width: 68%; float: right;">
				</div>
				
				<div class="form-field" style="float: left; width: 100%;">
					<p style="margin: 0; font-size: 14px;"> <input type="radio" name="condition_status" <?php echo (isset($info['condition_status']) && $info['condition_status']=='new')?'checked="checked"':''; ?> value="new"> New <input type="radio" name="condition_status" <?php echo (isset($info['condition_status']) && $info['condition_status']=='ud')?'checked="checked"':''; ?> value="ud"> Used <input type="radio" name="condition_status" <?php echo (isset($info['condition_status']) && $info['condition_status']=='ctfd')?'checked="checked"':''; ?> value="ctfd"> Certified <br> <input type="radio" name="finance_status" <?php echo (isset($info['finance_status']) && $info['finance_status']=='fin')?'checked="checked"':''; ?> value="fin"> Finance <input type="radio" name="finance_status" <?php echo (isset($info['finance_status']) && $info['finance_status']=='cash')?'checked="checked"':''; ?> value="cash"> Cash <input type="radio" name="finance_status" <?php echo (isset($info['finance_status']) && $info['finance_status']=='lse')?'checked="checked"':''; ?> value="lse"> Lease</p>
				</div>
			</div>
			
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 35%; border: 1px solid #000; padding: 7px; line-height: 24px;">
				<div class="form-field" style="float: left; width: 100%;">
					<p style="margin: 0; font-size: 14px;"> Terms <input type="radio" name="term_status" <?php echo (isset($info['term_status']) && $info['term_status']=='24')?'checked="checked"':''; ?> value="24"> 24 <input type="radio" name="term_status" <?php echo (isset($info['term_status']) && $info['term_status']=='36')?'checked="checked"':''; ?> value="36"> 36 <input type="radio" name="term_status" <?php echo (isset($info['term_status']) && $info['term_status']=='48')?'checked="checked"':''; ?> value="48"> 48 <input type="radio" name="term_status" <?php echo (isset($info['term_status']) && $info['term_status']=='60')?'checked="checked"':''; ?> value="60"> 60 <input type="radio" name="term_status" <?php echo (isset($info['term_status']) && $info['term_status']=='72')?'checked="checked"':''; ?> value="72"> 72 </p>
				</div>
				
				<div class="form-field" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 60%;">
						<label>Next Payment Due:</label>
						<input type="text" name="pay_due" value="<?php echo isset($info['pay_due'])?$info['pay_due']:''; ?>" style="width: 33%"> 
					</div>
					<div class="form-field" style="float: left; width: 40%;">
						<label>Amt $</label>
						<input type="text" name="amt" value="<?php echo isset($info['amt'])?$info['amt']:''; ?>" style="width: 65%"> 
					</div>
				</div>
				
				<div class="form-field" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 30%;">
						<label>Balance: $</label>
						<input type="text" name="balance" value="<?php echo isset($info['balance'])?$info['balance']:''; ?>" style="width: 25%"> 
					</div>
					<div class="form-field" style="float: left; width: 70%;">
						<label>Lender:</label>
						<input type="text" name="lender" value="<?php echo isset($info['lender'])?$info['lender']:''; ?>" style="width: 75%"> 
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; box-sizing: border-box; width: 20%; border: 1px solid #000; padding: 7px;">
				<p style="margin: 0; font-size: 14px;">Goals</p>
			</div>
			
			<div class="form-field" style="float: right; box-sizing: border-box; width: 75%; border: 1px solid #000; padding: 7px; line-height: 20px;">
				<label>Of all the things that are important to you, what is the ONE thing that you hope to accomplish with your
visit today?</label>
				<input type="text" name="anser1" value="<?php echo isset($info['anser1'])?$info['anser1']:''; ?>" style="width: 100%; float: right; margin-top: 10px;">
				<input type="text" name="anser2" value="<?php echo isset($info['anser2'])?$info['anser2']:''; ?>" style="width: 100%; float: right; margin: 10px 0;">
				<label>If there was a similar vehicle with similar equipment that was less expensive, would you consider it or
would you rule it out? </label>
				<input type="text" name="anser3" value="<?php echo isset($info['anser3'])?$info['anser3']:''; ?>" style="width: 100%; float: right; margin-top: 10px;">
			</div>
		</div>
	</div>
	<!-- worksheet end -->
		
		
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
