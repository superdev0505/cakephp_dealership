<?php
//This Custom form Mapped Author: Abha Sood Negi

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
		#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 15px; margin-bottom: 0px; font-weight: normal !important;}
		.wraper.main input {padding: 1px;}
		th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 7px; font-size: 14px;}
		table{border-top: 1px solid #000; border-right: 1px solid #000; margin: 15px 0; float: left; width: 100%;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" style="float: left; width: 100%; text-align: center;">
			<?php  if($cid == 4435 || $cid == 4430){ ?>
			<div class="logo" style="display: inline-block; width: 13%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
			<div class="logo" style="display: inline-block; width: 14%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo" style="display: inline-block; width: 20%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php  if($cid == 4440){?>
			<div class="logo" style="display: inline-block; width: 26%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a3.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0; margin: 19px 0; font-size: 20px;">Title Card</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>BUYER</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>AND/OR</label>
				<input type="text" name="and_or" value="<?php echo isset($info['and_or']) ? $info['and_or'] : ''; ?>" style="width: 81%;">
			</div>
			<div class="form-field" style="float: right; width: 30%;">
				<label>DATE OF BIRTH</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : ''; ?>" style="width: 59%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>MAILING ADDRESS</label>
				<input type="text" name="mail_address" value="<?php echo isset($info['mail_address']) ? $info['mail_address'] : ''; ?>" style="width: 74%;">
			</div>
			<div class="form-field" style="float: right; width: 35%;">
				<label>HOMEPHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 69%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>PHYSICAL ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 73%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>WORK PHONE</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 67%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 91%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>TRADE-IN-PAYOFF</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 57%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 27%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 23%;">
				<label>COUNTRY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 61%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 72%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>FINANCED BY</label>
				<input type="text" name="financed" value="<?php echo isset($info['financed']) ? $info['financed'] : ''; ?>" style="width: 66%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>EMAIL</label>
				<input type="text" name="mail" value="<?php echo isset($info['mail']) ? $info['mail'] : ''; ?>" style="width: 50%;">
				<label>@</label>
				<input type="text" name="com" value="<?php echo isset($info['com']) ? $info['com'] : ''; ?>" style="width: 30%;">
				<label>.com</label>
			</div>
			
			<div class="form-field" style="float: left; width: 35%;">
				<label>ADDRESS</label>
				<input type="text" name="address_line2" value="<?php echo isset($info['address_line2']) ? $info['address_line2'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>INSURANCE COMPANY</label>
				<input type="text" name="insurance_company" value="<?php echo isset($info['insurance_company']) ? $info['insurance_company'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>PHONE #</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 78%;">
			</div>
		</div>
		<p style="float: left; width: 100%; text-align: center; margin: 0; font-size: 12px;">(We can provide you an insurance quote right from Harley-Davidson)</p>
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