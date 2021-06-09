<?php
//This Custom worksheet Mapped Author: Abha Sood Negi

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
		label{font-size: 14px; margin-bottom: 0px; font-weight: normal !important;}
		.wraper.main input {padding: 1px;}
			.left-text{background: #000 !important;}
			p{line-height: 24px;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-filed" style="float: left; width: 30%;">
				<label>Salesman</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
			</div>
			<div class="form-filed" style="float: right; width: 20%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<!-- Contact information Start -->
		<h2 style="float: left; font-weight: bold; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Customer Information</h2>
		<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Customer Name</label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 74%;">
				</div>
				<div class="form-filed" style="float: right; width: 50%;">
					<label>Home Phone</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 100%;">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 93%;">
				</div>
			</div>	
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Address</label>
					<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 86%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Work Phone</label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 80%;">
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 100%;">
					<label>City State Zip</label>
					<input type="text" name="state_city_zip" value="<?php echo isset($info['state_city_zip']) ? $info['state_city_zip'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 89%;">
				</div>
			</div>	
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 89%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Cell Phone</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 82%;">
				</div>
			</div>	
		</div>
		
		<!-- contact Information end -->
		
		<!-- vechile Information end  -->
		
		<h2 style="float: left; font-weight: bold; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Vehicle Information</h2>
		<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Stock #</label>
					<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 86%;">
				</div>
				<div class="form-filed" style="float: right; width: 50%;">
					<label>New Used</label>
					<input type="text" name="new_used" value="<?php echo isset($info['new_used']) ? $info['new_used'] : ''; ?>" style="width: 82%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Vehicle</label>
					<input type="text" name="vehicle" value="<?php echo isset($info['vehicle']) ? $info['vehicle'] : ''; ?>" style="width: 87%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Color</label>
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Type</label>
					<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>" style="width: 89%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Mileage</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 85%;">
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 100%;">
					<label>Vin#</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 94.5%;">
				</div>
			</div>	
		</div>
		<!--  Vehicle information end -->
		
		<!-- trade in start -->
		<h2 style="float: left; border: 1px solid #000; font-weight: bold; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade In</h2>
		<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Year</label>
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 89%;">
				</div>
				<div class="form-filed" style="float: right; width: 50%;">
					<label>Mileage</label>
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 85%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Make</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 87%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Payoff</label>
					<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 87%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Model</label>
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 86%;">
				</div>
				<div class="form-filed" style="float: left; width: 50%;">
					<label>Lien Holder</label>
					<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder']) ? $info['lien_holder'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
		</div>
		<!-- trade in end -->
		
		<!-- selling trade in start -->
		<div class="selling-trade" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 50%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; font-weight: bold; box-sizing: border-box;">Selling Price</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<h3 style="font-size: 25px; font-weight: bold; text-align: center; margin: 36px 0;">$24,995</h3>
						<p style="margin: 0; text-align: center;">Plus Tax, Title, License, and Fees</p>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 50%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; font-weight: bold; box-sizing: border-box; border-left: 0px;">Trade-In</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 2px 0;">
							<h3 style="font-size: 25px; font-weight: bold; text-align: center; margin: 36px 0 60px;">$12,000</h3>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->
		
		<!-- Initial monthly investment start -->
		<div class="initial-monthly" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 50%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; font-weight: bold;">Initial Investment</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<h3 style="font-size: 25px; font-weight: bold; text-align: center; margin: 29px 0;">$2,958</h3>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 50%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; font-weight: bold; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Monthly Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 2px 0;">
							<h4 style="font-size: 16px; font-weight: bold; text-align: center; margin: 10px 0 3px;">$305.20 x 60 Months 10.9%</h4>
							<h4 style="font-size: 16px; font-weight: bold; text-align: center; margin: 7px 0 7px;">$262.58 x 66 Months 11.9%</h4>
							<h4 style="font-size: 16px; font-weight: bold; text-align: center; margin: 3px 0 10px;">$262.58 x 72 Months 11.9%</h4>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->
		
		<!-- empty section start -->
		<div class="empthy-section" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 50%; box-sizing: border-box; border: 1px solid #000;">
				<input type="text" name="empty_section" value="<?php echo isset($info['empty_section']) ? $info['empty_section'] : ''; ?>" style="width: 100%; text-align: center; font-size: 16px; padding: 10px 4px;">
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 50%; box-sizing: border-box; border: 1px solid #000; border-left: 0;">
					<input type="text" name="empty_section1" value="<?php echo isset($info['empty_section1']) ? $info['empty_section1'] : ''; ?>" style="width: 100%; text-align: center; font-size: 16px; padding: 10px 4px;">
				</div>
			<!-- rightside end-->
		</div>
		<!-- empty section end -->
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 35%">
				<label>Guest Approval</label>
				<input type="text" name="guest_approval" value="<?php echo isset($info['guest_approval']) ? $info['guest_approval'] : ''; ?>" style="width: 68%;">
			</div>
			<div class="form-field" style="float: left; width: 15%">
				<label>Date</label>
				<input type="text" name="date1" value="<?php echo isset($info['date1']) ? $info['date1'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 35%">
				<label>Management Approval</label>
				<input type="text" name="mng_approval" value="<?php echo isset($info['mng_approval']) ? $info['mng_approval'] : ''; ?>" style="width: 53%;">
			</div>
			<div class="form-field" style="float: left; width: 15%">
				<label>Date</label>
				<input type="text" name="date2" value="<?php echo isset($info['date2']) ? $info['date2'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 14px; margin: 12px 0; line-height: 18px;">I hearby indicate my intent to purchase a motorcycle.  I authorize the dealer representative to investigate my credit and employement history to evaluate my ability to purchase the above referenced motorcycle.  This is not a contract for sale.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0; border: 1px solid #000; box-sizing: border-box; padding: 5px;">
			<div class="form-field" style="float: left; width: 100%">
				<label style="vertical-align: top;">Note</label>
				<textarea name="note" style="width: 94%; border: 0px; height: 80px;"><?php echo isset($info['note']) ? $info['note'] : ''; ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<h3 style="float: left; width: 100%; font-weight: bold; margin: 10px 0;">Notes from client</h3>
			<p style="margin: 2px 0; font-size: 14px; line-height: 16px;"><strong>Selling Price</strong> field will pull just the Unit of interest </p>
			<p style="margin: 2px 0; font-size: 14px; line-height: 16px;"><strong>Trade-In</strong> field will pull the Trade-In Unit value</p>
			<p style="margin: 2px 0; font-size: 14px; line-height: 16px;"><strong>Initial Investment</strong> will be manually entered by client</p>
			<p style="margin: 2px 0; font-size: 14px; line-height: 16px;"><strong>Monthly Investment</strong> Section will have a Drop-down field of (48,60,66,72,84) months to choose from, a field for client to enter in the API Percentage and a field for the total</p>
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