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
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
		label{font-size: 15px; font-weight: normal;}
		ul{text-align: center; padding: 0; margin: 36px 0 0;}
		li {display: inline; list-style: outside none none; margin: 0 3%; font-weight: bold; font-size: 14px;}
		.wraper.main input {padding: 5px;}
		@media print {.dontprint{display: none;}}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<div class="logo" style="width: 30%; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-diamondRV_1.png'); ?>" alt="">
		</div>
		<h2 style="float: left; width: 100%; text-decoration: underline; margin: 50px 0 30px;">INSURANCE VERIFICATION</h2>
		<div class="row" style="float: left; width: 100%; margin:  7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer Name</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="float: right; width: 80%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Insurance Company Name</label>
				<input type="text" name="agent_company" value="<?php echo isset($info['agent_company']) ? $info['agent_company'] : ''; ?>" style="float: right; width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Insurance Agents Name</label>
				<input type="text" name="agent_name" value="<?php echo isset($info['agent_name']) ? $info['agent_name'] : ''; ?>" style="float: right; width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Insurance Agents Phone#</label>
				<input type="text" name="agent_phone" value="<?php echo isset($info['agent_phone']) ? $info['agent_phone'] : ''; ?>" style="float: right; width: 80%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Insurance Agents Address</label>
				<input type="text" name="agent_address" value="<?php echo isset($info['agent_address']) ? $info['agent_address'] : ''; ?>" style="float: right; width: 80%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 30px 0 5px;">
				<label style="width: 13%; display: inline-block;">Policy#</label>
				<input type="text" name="policy" value="<?php echo isset($info['policy']) ? $info['policy'] : ''; ?>" style="width: 40%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="width: 13%; display: inline-block;">Effective Date</label>
				<input type="text" name="effective_date" value="<?php echo isset($info['effective_date']) ? $info['effective_date'] : ''; ?>" style="width: 40%">
			</div>
			<div class="form-field" style="width: 100%;">
				<label style="width: 13%; display: inline-block;">Deductible</label>
				<input type="text" name="deductible" value="<?php echo isset($info['deductible']) ? $info['deductible'] : ''; ?>" style="width: 40%">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin:  90px	0 0;">
			<div class="form-field" style="float: left; width: 48%;">
				<label>Verified By</label>
				<input type="text" name="verified_by" value="<?php echo isset($info['verified_by']) ? $info['verified_by'] : ''; ?>" style="float: right; width: 80%;">
			</div>
			<div class="form-field" style="float: right; width: 46%;  margin: 5px 0;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="float: right; width: 87%;">
			</div>
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
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>