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
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
		label{font-size: 14px; font-weight: normal;}
		ul{text-align: center; padding: 0; margin: 36px 0 0;}
		li {display: inline; list-style: outside none none; margin: 0 3%; font-weight: bold; font-size: 14px;}
		.wraper.main input {padding: 5px;}
		@media print {.dontprint{display: none;}}
	</style>

	<div class="wraper header"> 
		<!-- container start -->
		<h2 style="float: left; width: 100%; text-align: center; font-size: 18px; color: #000; font-weight: bold;">OUT OF STATE TAX AND REGISTRATION FORM</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">CUSTOMER NAME:</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">STREET ADDRESS:</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">CITY, STATE, ZIP:</label>
				<input type="text" name="city_state_zip" value="<?php echo isset($info['city_state_zip']) ? $info['city_state_zip'] : $info['city'].', '.$info['state'].', '.$info['zip']; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">IN/OUT, COUNTY:</label>
				<input type="text" name="in_out_county" value="<?php echo isset($info['in_out_county']) ? $info['in_out_county'] : ''; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">DMV PHONE#</label>
				<input type="text" name="dmv_phone" value="<?php echo isset($info['dmv_phone']) ? $info['dmv_phone'] : ''; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">CONTACT PERSON:</label>
				<input type="text" name="contact_person" value="<?php echo isset($info['contact_person']) ? $info['contact_person'] : ''; ?>" style="width: 80%; float: right;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">NOTARY STATE:</label>
				<input type="radio" name="notary_state" value="yes" <?php echo ($info['notary_state']=='yes') ? 'checked' : ''; ?>>YES
				<input type="radio" name="notary_state" value="no" <?php echo ($info['notary_state']=='no') ? 'checked' : ''; ?>>NO
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">TAX RATE 1:</label>
				<input type="text" name="tax_rate1" value="<?php echo isset($info['tax_rate1']) ? $info['tax_rate1'] : ''; ?>" style="width: 20%;"><span>%</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">TAX RATE 2:</label>
				<input type="text" name="tax_rate2" value="<?php echo isset($info['tax_rate2']) ? $info['tax_rate2'] : ''; ?>" style="width: 20%;"><span>%</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">Trade reduce tax?:</label>
				<input type="radio" name="trade_reduce_tax" value="yes" <?php echo ($info['trade_reduce_tax']=='yes') ? 'checked' : ''; ?> > YES
				<input type="radio" name="trade_reduce_tax" value="no" <?php echo ($info['trade_reduce_tax']=='no') ? 'checked' : ''; ?> > NO
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">What is taxable?</label>
				<input type="text" name="what_taxable" value="<?php echo isset($info['what_taxable']) ? $info['what_taxable'] : ''; ?>" style="width: 20%;"><span>Unit</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="accessories" value="<?php echo isset($info['accessories']) ? $info['accessories'] : ''; ?>" style="width: 20%;"><span>Accessories</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="dealer_service_fee" value="<?php echo isset($info['dealer_service_fee']) ? $info['dealer_service_fee'] : ''; ?>" style="width: 20%;"><span>Dealer service fee</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : ''; ?>" style="width: 20%;"><span>Freight</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="hpp_service_contract" value="<?php echo isset($info['hpp_service_contract']) ? $info['hpp_service_contract'] : ''; ?>" style="width: 20%;"><span>HPP/ Service Contract</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="theft" value="<?php echo isset($info['theft']) ? $info['theft'] : ''; ?>" style="width: 20%;"><span>Theft</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<input type="text" name="rebates" value="<?php echo isset($info['rebates']) ? $info['rebates'] : ''; ?>" style="width: 20%;"><span>Rebates</span>
			</div>
			<h4 style="float: left; width: 100%; font-size: 15px; margin: 10px 0 0">Fee's (show in the title field)</h4>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<span>$</span><input type="text" name="fee_title" value="<?php echo isset($info['fee_title']) ? $info['fee_title'] : ''; ?>" style="width: 20%;"><span>Title</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<span>$</span><input type="text" name="registration" value="<?php echo isset($info['registration']) ? $info['registration'] : ''; ?>" style="width: 20%;"><span>Registration</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<span>$</span><input type="text" name="fee_email" value="<?php echo isset($info['fee_email']) ? $info['fee_email'] : ''; ?>" style="width: 20%;"><span>Mail in</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<span>$</span><input type="text" name="decal" value="<?php echo isset($info['decal']) ? $info['decal'] : ''; ?>" style="width: 20%;"><span>Decal</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">&nbsp;</label>
				<span>$</span><input type="text" name="other" value="<?php echo isset($info['other']) ? $info['other'] : ''; ?>" style="width: 20%;"><span>Other</span>
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">Make check payable to:</label>
				<input type="text" name="check_payable" value="<?php echo isset($info['check_payable']) ? $info['check_payable'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">Check Amount $</label>
				<input type="text" name="check_amt" value="<?php echo isset($info['check_amt']) ? $info['check_amt'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
				<label style="float: left; width: 20%; text-align: right;">Mail check and paperwork to:</label>
				<input type="text" name="mail_paperwork" value="<?php echo isset($info['mail_paperwork']) ? $info['mail_paperwork'] : ''; ?>" style="width: 80%; margin-bottom: 5px;">
				<input type="text" name="mail_paperwork1" value="<?php echo isset($info['mail_paperwork1']) ? $info['mail_paperwork1'] : ''; ?>" style="width: 80%; margin-left: 20%;">
				<input type="text" name="mail_paperwork2" value="<?php echo isset($info['mail_paperwork2']) ? $info['mail_paperwork2'] : ''; ?>" style="width: 80%; margin: 5px 0 5px 20%;">
				<input type="text" name="mail_paperwork3" value="<?php echo isset($info['mail_paperwork3']) ? $info['mail_paperwork3'] : ''; ?>" style="width: 80%; margin-left: 20%;">
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0 0;">
				<div class="form-field" style="float: left; width: 50%; margin: 5px 0 0 9%;">
					<label>F&I Rep.</label>
					<input type="text" name="fi_rep" value="<?php echo isset($info['fi_rep']) ? $info['fi_rep'] : ''; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 40%; margin: 5px 0;">
					<label>Date:</label>
					<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="width: 90%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 0 0;">
				<ul>
					<li><strong>ATV</strong></li>
					<li><strong>M/C</strong></li>
					<li><strong>MUV</strong></li>
					<li><strong>DIRTBIKE</strong></li>
					<li><strong>SCOOTER</strong></li>
				</ul>
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