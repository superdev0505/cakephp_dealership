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
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 30%;">
				<label>Salesman</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
			</div>
			<div class="form-filed" style="float: right; width: 20%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<!-- empty section start -->
		<div class="empthy-section" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 55%; box-sizing: border-box;">
				<!-- Contact information Start -->
			<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Customer Informtion</h2>
			<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Customer Name</label>
						<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 57%;">
					</div>
					<div class="form-filed" style="float: right; width: 50%;">
						<label>Home Phone</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 63%;">
					</div>
				</div>
			
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 100%;">
						<label>Address</label>
						<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 88%;">
					</div>
				</div>	
				
				<div class="row" style="float: left; width: 100%; margin: 4px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Address</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Work Phone</label>
						<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 67%;">
					</div>
				</div>

				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-filed" style="float: left; width: 100%;">
						<label>City State Zip</label>
						<input type="text" name="state_city_zip" value="<?php echo isset($info['state_city_zip']) ? $info['state_city_zip'] : $info['city'].' '.$info['state'].' '.$info['zip']; ?>" style="width: 81%;">
					</div>
				</div>	
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Email</label>
						<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 82%;">
					</div>
					<div class="form-filed" style="float: left; width: 50%;">
						<label>Cell Phone</label>
						<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 69%;">
					</div>
				</div>	
			</div>
			
			<!-- contact Information end -->
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 45%; box-sizing: border-box; border-left: 0;">
					<!-- vechile Information end  -->
					
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Vehicle Informtion</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Stock #</label>
								<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : ''; ?>" style="width: 71%;">
							</div>
							<div class="form-filed" style="float: right; width: 50%;">
								<label>New Used</label>
								<input type="text" name="new_used" value="<?php echo isset($info['new_used']) ? $info['new_used'] : ''; ?>" style="width: 64%;">
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Vehicle</label>
								<input type="text" name="vehicle" value="<?php echo isset($info['vehicle']) ? $info['vehicle'] : ''; ?>" style="width: 72%;">
							</div>
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Color</label>
								<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 78%;">
							</div>
						</div>
						
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Type</label>
								<input type="text" name="type" value="<?php echo isset($info['type']) ? $info['type'] : ''; ?>" style="width: 78%;">
							</div>
							<div class="form-filed" style="float: left; width: 50%;">
								<label>Mileage</label>
								<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 70%;">
							</div>
						</div>

						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<div class="form-filed" style="float: left; width: 100%;">
								<label>Vin#</label>
								<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 89%;">
							</div>
						</div>	
					</div>
					<!--  Vehicle information end -->
				</div>
			<!-- rightside end-->
		</div>
		<!-- customer and vehicle section end -->
		
		<!-- trade in and note section start -->
		<div class="empthy-section" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 55%; box-sizing: border-box;">
						
				<!-- trade in start -->
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade In</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Year</label>
							<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 84%;">
						</div>
						<div class="form-filed" style="float: right; width: 50%;">
							<label>Mileage</label>
							<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 78%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Make</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 81%;">
						</div>
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Payoff</label>
							<input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>" style="width: 81%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Model</label>
							<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 78%;">
						</div>
						<div class="form-filed" style="float: left; width: 50%;">
							<label>Lien Holder</label>
							<input type="text" name="lien_holder" value="<?php echo isset($info['lien_holder']) ? $info['lien_holder'] : ''; ?>" style="width: 67%;">
						</div>
					</div>
				</div>
				<!-- trade in end -->
			</div>
			<!-- leftside end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 45%; box-sizing: border-box; ">
					<div class="row" style="float: left; width: 100%; margin: 0px 0; border-top: 1px solid #000; box-sizing: border-box; padding: 10px; border-right: 1px solid #000;">
						<div class="form-field" style="float: left; width: 100%">
							<label style="vertical-align: top;">Note</label>
							<textarea name="note" style="width: 94%; border: 0px; height: 117px;"><?php echo isset($info['note']) ? $info['note'] : ''; ?></textarea>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- trade in and note section end -->
		
		<div class="selling-trade" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Selling Price</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 20px 0;">&nbsp;</h3>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- center section start -->
			<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Pre-Owned vehicle</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<h3 style="font-size: 18px; font-weight: bold; text-align: center; margin: 20px 0;">2012 H-D</h3>
					</div>
				</div>
			</div>
			<!-- center section end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">New H-D Vehicle</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 20px 0;">2015 H-D</h3>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->
		
		
		<div class="selling-trade" style="float: left; width: 100%;">
			<!-- left side start -->
			<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Trade Appraisal</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-left: 1px solid #000; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 33px 0;">&nbsp;</h3>
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- center section start -->
			<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
				<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Selling Price</h2>
				<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px 0 0; border-right: 1px solid #000; ">
					<div class="row" style="float: left; width: 100%; margin: 7px 0;">
						<h3 style="font-size: 18px; font-weight: bold; text-align: center; margin: 20px 0;">$16,449</h3>
						<p style="margin: 2px 0; text-align: center; font-size: 14px;">Plus Tax, Title, License, and Fees</p>
					</div>
				</div>
			</div>
			<!-- center section end -->
			
			<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Selling Price</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 20px 0;">$20,749</h3>
							<p style="margin: 2px 0; text-align: center; font-size: 14px;">Plus Tax, Title, License, and Fees</p>
						</div>
					</div>
				</div>
			<!-- rightside end-->
		</div>
		<!-- selling trade in end -->

		<!-- monthly section start -->
			<div class="selling-trade" style="float: left; width: 100%; border-bottom: 1px solid #000; margin-bottom: 10px;">
				<!-- left side start -->
				<div class="left" style="float: left; width: 33%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box;">Intitial Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-left: 1px solid #000; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 33px 0;">$4,680</h3>
						</div>
					</div>
				</div>
				<!-- leftside end -->
			
				<!-- center section start -->
				<div class="center" style="float: left; width: 33%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Monthly Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 11px 0 0; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<h3 style="font-size: 18px; font-weight: bold; text-align: center; margin: 34px 0;">$375 x 48 Months   12.9%</h3>
						</div>
					</div>
				</div>
				<!-- center section end -->
			
				<!-- rightside strat-->
				<div class="right" style="float: left; width: 34%; box-sizing: border-box;">
					<h2 style="float: left; border: 1px solid #000; padding: 5px 0; font-size: 18px; width: 100%; text-align: center; background-color: #ccc; margin: 0; box-sizing: border-box; border-left: 0px;">Monthly Investment</h2>
					<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 10px 0 0; border-right: 1px solid #000; ">
						<div class="row" style="float: left; width: 100%; margin: 7px 0;">
							<h3 style="font-size: 20px; font-weight: bold; text-align: center; margin: 34px 0;">$400  x  60 Months  11.9%</h3>
						</div>
					</div>
				</div>
				<!-- rightside end-->
		</div>
		<!-- monthly section end -->
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 35%;">
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
		
		<p style="float: left; width: 100%; margin: 10px 0; font-size: 13px;">I hearby indicate my intent to purchase a motorcycle.  I authorize the dealer representative to investigate my credit and employeement history to evaluate my ability to purchase the above referenced motorcycle.  This is not a contract for sale.</p>	
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
