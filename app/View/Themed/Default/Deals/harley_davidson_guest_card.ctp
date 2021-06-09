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
		input[type="text"]{border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 15px; font-weight: normal;}
		li{margin-bottom: 7px; font-size: 15px;}
		.left label{font-size: 16px;}
		.bullet-section > ul > li{
			list-style: disc outside none;
			display: list-item;
			margin-left: 5%;
			width: 90%;
			float: left;
		}
		@media print{
			h2{background-color: #ccc;}
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" style="float: left; width: 100%; text-align: center;">
			<?php  if($cid == 4435 || $cid == 4430){ ?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php  if($cid == 4440){?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a3.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0; margin: 19px 0; font-size: 22px;">Guest 
		Information</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>BUYER</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name'];; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label>CO-BUYER</label>
				<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer']) ? $info['co_buyer'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>DATE OF BIRTH</label>
				<input type="text" name="dob" value="<?php echo isset($info['dob']) ? $info['dob'] : ''; ?>" style="width: 58%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>MAILING ADDRESS</label>
				<input type="text" name="email1" value="<?php echo isset($info['email1']) ? $info['email1'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: right; width: 35%;">
				<label>HOME ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 62%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 65%;">
				<label>PHYSICAL ADDRESS</label>
				<input type="text" name="address_line2" value="<?php echo isset($info['address_line2']) ? $info['address_line2'] : ''; ?>" style="width: 74%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>WORK PHONE</label>
				<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 67%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 86%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>COUNTRY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 15%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 40px;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Email</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<p>How did you hear about us?  
		<span>
			<input type="checkbox" name="walk_in" <?php echo ($info['walk_in'] == "walk_in") ? "checked" : ""; ?> value="walk_in"/>  Walk In 
		</span>                    
		<span>
			<input type="checkbox" name="referral" <?php echo ($info['referral'] == "referral") ? "checked" : ""; ?> value="referral">  Referral 
		</span>
		<span>
			<input type="checkbox" name="radio" <?php echo ($info['radio'] == "radio") ? "checked" : ""; ?> value="radio">  Radio 
		</span>
		<span>
			<input type="checkbox" name="email_check" <?php echo ($info['email_check'] == "email_check") ? "checked" : ""; ?> value="email_check">  Email 
		</span>
		<span>
			<input type="checkbox" name="phone_check" <?php echo ($info['phone_check'] == "phone_check") ? "checked" : ""; ?> value="phone_check">  Phone 
		</span>
		<span>
			<input type="checkbox" name="website" <?php echo ($info['website'] == "website") ? "checked" : ""; ?> value="website">  Website 
		</span>
		<span>
			<input type="checkbox" name="event" <?php echo ($info['event'] == "event") ? "checked" : ""; ?> value="event">  Event 
		</span>
		</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Other</label>
				<input type="text" name="other" value="<?php echo isset($info['other']) ? $info['other'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
	
		<p style="float: left; width: 100%;margin: 7px 0;">Are you taking your new Harley Davidson home today
			<span>
				<input type="radio" name="new_harley" value="Y" <?php echo (isset($info['new_harley']) && $info['new_harley']=='Y')?'checked="checked"':''; ?> />  Y 
			</span>                    
			<span>
				<input type="radio" name="new_harley" value="N" <?php echo (isset($info['new_harley']) && $info['new_harley']=='N')?'checked="checked"':''; ?> />  N 
			</span>
		</p>
		
		<p style="float: left; width: 100%;margin: 7px 0;">Do you have the Harley Davidson Extended Service Plan on your current trade-in?   
		<span>
			<input type="radio" name="harley_service_plan" value="Y" <?php echo (isset($info['harley_service_plan']) && $info['harley_service_plan']=='Y')?'checked="checked"':''; ?> />  Y 
		</span>                    
		<span>
			<input type="radio" name="harley_service_plan" value="N" <?php echo (isset($info['harley_service_plan']) && $info['harley_service_plan']=='N')?'checked="checked"':''; ?> />  N 
		</span>
		</p>
			
		<p style="float: left; width: 90%;margin: 7px 0; margin-left: 10%;">Great, we'll help you get it on your New Harley-Davidson!</p>
		<p style="float: left; width: 100%;margin: 7px 0;">No Trade In:  Make sure (business Manager) tells you about some great services that you are entitled to.</p>
		<p style="float: left; width: 100%;margin: 7px 0;">Riding Preference</p>

		<div class="bullet-section">
			<ul>
				<li> Is this your first Harley-Davidson?
					<span>
						<input type="radio" name="riding_preference" value="Y" <?php echo (isset($info['riding_preference']) && $info['riding_preference']=='Y')?'checked="checked"':''; ?> />  Y 
					</span>                    
					<span>
						<input type="radio" name="riding_preference" value="N" <?php echo (isset($info['riding_preference']) && $info['riding_preference']=='N')?'checked="checked"':''; ?> />  N 
					</span>
				</li>
				
				<li> Is this your first motorcycle? 	
					<span>
						<input type="radio" name="first_motorcycle" value="Y" <?php echo (isset($info['first_motorcycle']) && $info['first_motorcycle']=='Y')?'checked="checked"':''; ?> />  Y 
					</span>                    
					<span>
						<input type="radio" name="first_motorcycle" value="N" <?php echo (isset($info['first_motorcycle']) && $info['first_motorcycle']=='N')?'checked="checked"':''; ?> />  N 
					</span>
				</li>
				
				<li> How long do you plan on keeping your new Harley-Davidson?  	
					<input type="text" name="keep_harley" value="<?php echo isset($info['keep_harley']) ? $info['keep_harley'] : ''; ?>" style="width: 16%;">
				</li>
				
				<li> Our customers typically ride their bikes about 5,000 miles a year. How many miles per year do you plan to ride your new Harley-Davidson?  	
					<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 50%;">
				</li>
					
				<li> Will you be servicing your Harley-Davidson motorcycle with us here at J&L Harley Davidson?  
					<span>
						<input type="radio" name="service_motorcycle" value="Y" <?php echo (isset($info['service_motorcycle']) && $info['service_motorcycle']=='Y')?'checked="checked"':''; ?> />  Y 
					</span>                    
					<span>
						<input type="radio" name="service_motorcycle" value="N" <?php echo (isset($info['service_motorcycle']) && $info['service_motorcycle']=='N')?'checked="checked"':''; ?> />  N 
					</span>
				</li>
				
				<li> Do you currently have a Planned Maintenance Program?  
					<span>
						<input type="radio" name="planned_maintenance" value="Y" <?php echo (isset($info['planned_maintenance']) && $info['planned_maintenance']=='Y')?'checked="checked"':''; ?> />  Y 
					</span>                    
					<span>
						<input type="radio" name="planned_maintenance" value="N" <?php echo (isset($info['planned_maintenance']) && $info['planned_maintenance']=='N')?'checked="checked"':''; ?> />  N 
					</span>
				</l i>
			</ul>
		<div>

		<div class="bullet-section">
			<p style="float: left; width: 100%; margin:">Budget Information</p>
			<ul>
				<li>	Current payment 	
					<input type="text" name="current_payment" value="<?php echo isset($info['current_payment']) ? $info['current_payment'] : ''; ?>" style="width: 10%;">
				</li>
				
				<li> Down Payment	
					<input type="text" name="down_payment1" value="<?php echo isset($info['down_payment1']) ? $info['down_payment1'] : ''; ?>" style="width: 6%;"> to
					<input type="text" name="down_payment2" value="<?php echo isset($info['down_payment2']) ? $info['down_payment2'] : ''; ?>" style="width: 6%;"> 
					
					<span>
						<input type="checkbox" name="check" <?php echo ($info['check'] == "check") ? "checked" : ""; ?> value="check">  Check 
					</span>                    
					<span>
						<input type="checkbox" name="cash" <?php echo ($info['cash'] == "cash") ? "checked" : ""; ?> value="cash">  Cash 
					</span>
					<span>
						<input type="checkbox" name="card" <?php echo ($info['card'] == "card") ? "checked" : ""; ?> value="card">  Card 
					</span>
				</li>
				
				<li> Monthly payment 	
					<input type="text" name="payment_from" value="<?php echo isset($info['payment_from']) ? $info['payment_from'] : ''; ?>" style="width: 10%;"> to
					<input type="text" name="payment_to" value="<?php echo isset($info['payment_to']) ? $info['payment_to'] : ''; ?>" style="width: 10%;">
				</li>
				<li> In the event that bank asks, if your bike was stolen or a total loss and your insurance settlement didn’t pay off your loan, how would you handle the remaining balance due? <input type="text" name="handle_due" value="<?php echo isset($info['handle_due']) ? $info['handle_due'] : ''; ?>" style="width: 25%;"></li>
			</ul>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; font-size: 16px;">
			<div class="left" style="float: left; width: 50%;">		
				<div class="form-field" style="float: left; width: 100%;">
					<label>Family</label>
					<input type="text" name="family" value="<?php echo isset($info['family']) ? $info['family'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Occupation</label>
					<input type="text" name="occupation" value="<?php echo isset($info['occupation']) ? $info['occupation'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Recreation</label>
					<input type="text" name="recreation" value="<?php echo isset($info['recreation']) ? $info['recreation'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Motivation</label>
					<input type="text" name="motivation" value="<?php echo isset($info['motivation']) ? $info['motivation'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Animals</label>
					<input type="text" name="animals" value="<?php echo isset($info['animals']) ? $info['animals'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Teams</label>
					<input type="text" name="teams" value="<?php echo isset($info['teams']) ? $info['teams'] : ''; ?>" style="float: right; width: 70%;">
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Sports</label>
					<input type="text" name="sports" value="<?php echo isset($info['sports']) ? $info['sports'] : ''; ?>" style="float: right; width: 70%;">
				</div>
			</div>
			
			<div class="right" style="float: left; width: 40%; margin: 6% 4% 0;">
				<strong>Need At Least 3 FORMATS</strong>
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
			$(".date_input_field").bdatepicker();
			
			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>