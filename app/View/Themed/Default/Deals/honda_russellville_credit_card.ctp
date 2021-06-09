<?php
//This Custom Form Mapped Author: Abha Sood Negi

$zone = AuthComponent::user('zone');
$dealer = AuthComponent::user('dealer');
$cid = AuthComponent::user('dealer_id');
$d_address = AuthComponent::user('d_address');
$sperson = AuthComponent::user('full_name');
$d_city = AuthComponent::user('d_city');
$d_state = AuthComponent::user('d_state');
$d_zip = AuthComponent::user('d_zip');
$d_phone = AuthComponent::user('d_phone');
$d_fax = AuthComponent::user('d_fax');
$d_email = AuthComponent::user('d_email');
$d_website = AuthComponent::user('d_website');

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box;}
	label{font-size: 14px; font-weight: normal;}
	
	.wraper.main input {padding: 5px;}
	@media print { 
	.dontprint{display: none;}
	
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<h2 style="float: left; width: 100%; text-align: center; font-size: 18px; color: #000;">CREDIT CARD OVER THE PHONE <br> Guidelines to PROTECT THE CUSTOMER...</h2>
		<h3 style="float: left; margin: 0; width: 100%; font-weight: normal; font-size: 15px;">Must get the following information:</h3>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Deposit Amount</label>
				<input type="text" name="deposit_amt" value="<?php echo isset($info['deposit_amt']) ? $info['deposit_amt'] : ''; ?>" style="width: 62%; border-top: 0px; border-right: 0; border-left: 0px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Home#:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: right; width: 33%;">
				<label>Work#:</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 81%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width:100%;">
				<label>Name as it appears on card:</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80.3%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-size: 16px;"><strong>Visa</strong></label>
				<input type="text" name="visa" value="<?php echo isset($info['visa']) ? $info['visa'] : ''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label style="font-size: 16px;"><strong>M/C</strong></label>
				<input type="text" name="mc" value="<?php echo isset($info['mc']) ? $info['mc'] : ''; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: right; width: 33%;">
				<label><strong>Discover</strong></label>
				<input type="text" name="discover" value="<?php echo isset($info['discover']) ? $info['discover'] : ''; ?>" style="width: 78%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width:100%;">
				<label>Credit Card #:</label>
				<input type="text" name="credit_card" value="<?php echo isset($info['credit_card']) ? $info['credit_card'] : ''; ?>" style="width: 89.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<label>Expiration Date:</label>
				<input type="text" name="expiration_date" value="<?php echo isset($info['expiration_date']) ? $info['expiration_date'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<label>3 Digit Security Code:</label>
				<input type="text" name="security_code" value="<?php echo isset($info['security_code']) ? $info['security_code'] : ''; ?>" style="width: 68.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width:100%;">
				<label>Address:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 93%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>City:</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>State:</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: right; width: 33.5%;">
				<label>Zip:</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 88%;">
			</div>
		</div>
		<h3 style="float: left; width: 100%; text-align: center; margin: 17px 0; font-weight: normal; font-size: 15px;">Credit Card Billing Address (if different)</h3>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width:100%;">
				<label>Address:</label>
				<input type="text" name="address_line2" value="<?php echo isset($info['address_line2']) ? $info['address_line2'] : ''; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>City:</label>
				<input type="text" name="city2" value="<?php echo isset($info['city2']) ? $info['city2'] : ''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>State:</label>
				<input type="text" name="state2" value="<?php echo isset($info['state2']) ? $info['state2'] : ''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 33.5%;">
				<label>Zip:</label>
				<input type="text" name="zip2" value="<?php echo isset($info['zip2']) ? $info['zip2'] : ''; ?>" style="width: 88%;">
			</div>
		</div>
		<p style="float: left; width: 100%; text-align: center; margin: 26px 0 60px; font-size: 15px;"><strong style="display: block;">Make sure customer does online deposit form!</strong> Keep the original with the deal jacket for customer signature.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%">
				<input type="text" name="employee_sign" value="<?php echo isset($info['employee_sign']) ? $info['employee_sign'] : ''; ?>" style="width: 100%; border-top: 0px; border-left: 0px; border-right: 0px;">
				<label>Employee Signature</label>
			</div>
			<div class="form-field" style="float: right; width: 30%">
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date']) ? $info['sign_date'] : ''; ?>" style="width: 100%; border-top: 0px; border-left: 0px; border-right: 0px;">
				<label>Date</label>
			</div>
		</div>
		<!-- container end -->
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
			$(".date_input_field").bdatepicker();
			
			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);
			
			$("#worksheet_container").scrollTop(0);


			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){
				
			});    
		});
	</script>
</div>