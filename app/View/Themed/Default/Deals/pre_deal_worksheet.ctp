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
	label{font-size: 13px; font-weight: normal;}
	
	.left label, .right label{font-size: 12px;}
	table input[type="text"]{border: 0px;}
	table{border-bottom: 1px solid #000; border-right: 1px solid #000;}
	td, th{border-left: 1px solid #000; border-top: 1px solid #000; padding: 2px; font-size: 12px;}
	th{text-align: center;}
	td input[type="text"]{text-align: center; padding: 1px !important;}
	.wraper.main input {padding: 0px;}
}
	.one-fourth label{font-size: 13px;}
	.one-fourth{font-size: 13px;}
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="logo" style="float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/s-logo.png'); ?>" alt="" style="width: 100%;">
			</div>
			<h2 style="float: left; text-align: center; font-size: 20px; margin: 23px 31% 0;"><b>DEALER WORKSHEET</b></h2>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: right; width: 20%;">
				<label>Date</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="box" style="float: left; width: 100%; margin: 2px 0; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<label style="font-size: 18px;"><b>CUSTOMER INFORMATION</b></label>
					<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%; border: 1px solid #000; height: 41px;">
					<p style="font-size: 13px; margin: 0;">Buyer Name (as appears on Drivers License) (Include full middle name)</p>
				</div>
				<div class="form-field" style="float: right; width: 49%; text-align: center; font-size: 13px; padding: 2px 0;">
					<label style="font-size: 18px;"><b>LEAD SOURCE</b></label>
					<div class="cover" style="float: left; width: 100%; border: 1px solid #000;">
						<span>New Customer <input type="radio" name="customer_status" value="New Customer" <?php echo (isset($info['customer_status'])&&$info['customer_status']=='New Customer')?'checked="checked"':''; ?> /></span>
						<span>Returning Customer <input type="radio" name="customer_status" value="Returning Customer" <?php echo (isset($info['customer_status'])&&$info['customer_status']=='Returning Customer')?'checked="checked"':''; ?> /></span>
						<p style="text-align: center; margin: 0px 0;">Check appropriate customer box (New or Returning)</p>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 49%">
					<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer'])?$info['co_buyer']:''; ?>" style="float: left; width: 100%; border: 1px solid #000; height: 41px;">
					<label style="font-size: 12px;">Co-Buyer Name (as appears on Drivers License) (include full middle name)</label>
				</div>
				<div class="cover" style="float: right; width: 49%; border: 1px solid #000; padding: 2px 0 1px; font-size: 13px; text-align: center;">
					<p style="text-align: center; margin: 0px 0; font-size: 12px;">Best way for us to contact you</p>
					<span>Email <input type="checkbox" name="contact_status" value="Email" <?php echo (isset($info['contact_status'])&&$info['contact_status']=='Email')?'checked="checked"':''; ?> /></span>
					<span>Text<input type="checkbox" name="contact_status" value="Text" <?php echo (isset($info['contact_status'])&&$info['contact_status']=='Text')?'checked="checked"':''; ?> /></span>
					<span>Phone <input type="checkbox" name="contact_status" value="Phone" <?php echo (isset($info['contact_status'])&&$info['contact_status']=='Phone')?'checked="checked"':''; ?> /></span>
					<span>Facebook <input type="checkbox" name="contact_status" value="Facebook" value="Phone" <?php echo (isset($info['contact_status'])&&$info['contact_status']=='Facebook')?'checked="checked"':''; ?> /></span>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 49%">
					<input type="text" name="street_address1" value="<?php echo isset($info["street_address1"]) ? $info['street_address1'] : $info['address'];?>" style="float: left; width: 100%; border: 1px solid #000; height: 41px;">
					<label style="font-size: 12px;">Street Address</label>
				</div>
				
				<div class="form-field-outer" style="float: right; width: 49%;">
					<div class="form-filed" style="float: left; width: 49%; margin: 0;">
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 100%; border: 1px solid #000; height: 41px;">
						<label style="font-size: 12px;">Home Phone</label>
					</div>
					<div class="form-filed" style="float: right; width: 49%; margin: 0;">
						<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width: 100%; border: 1px solid #000; height: 41px;">
						<label style="font-size: 12px;">Cell Phone</label>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 49%;">
					<input type="text" name="street_address2" value="<?php echo isset($info["street_address2"]) ? $info['street_address2'] : $info['city']." ".$info['state']." ".$info['zip'];?>" style="float: left; width: 100%; border: 1px solid #000; height: 41px;">
					<label style="font-size: 12px;">Street Address</label>
				</div>
				<div class="form-filed" style="float: right; width: 49%; margin: 0;">
					<input type="text" name="email_address" value="<?php echo isset($info["email_address"]) ? $info['email_address'] : $info['email']?>" style="width: 100%; border: 1px solid #000; height: 41px;">
					<label style="font-size: 12px;">Email Address</label>
				</div>
				
			</div>		
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 2px 0;">
			<div class="left" style="float: left; width: 49%; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
				<h3 style="float: left; width: 100%; text-align: center; font-size: 16px; "><b>PURCHASE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Year:</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 85%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Make:</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Model:</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 80%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Color:</label>
						<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>VIN #:</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 90%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Vehicle Price: $</label>
						<input type="text" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : "" ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="left" style="float: left; width: 50%; border-right: 1px solid #000; box-sizing: border-box;">
						<strong style="float: left; width: 100%; display: block; font-size: 14px; text-align: center; text-decoration: underline; padding: 4px 0 2px;">NEW</strong>
						<div class="form-field" style="float: left; width: 100%;">
							<input type="text" name="new1" value="<?php echo isset($info['new1']) ? $info['new1'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new2" value="<?php echo isset($info['new2']) ? $info['new2'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new3" value="<?php echo isset($info['new3']) ? $info['new3'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new4" value="<?php echo isset($info['new4']) ? $info['new4'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new5" value="<?php echo isset($info['new5']) ? $info['new5'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new6" value="<?php echo isset($info['new6']) ? $info['new6'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new7" value="<?php echo isset($info['new7']) ? $info['new7'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new8" value="<?php echo isset($info['new8']) ? $info['new8'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new9" value="<?php echo isset($info['new9']) ? $info['new9'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new10" value="<?php echo isset($info['new10']) ? $info['new10'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new11" value="<?php echo isset($info['new11']) ? $info['new11'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new12" value="<?php echo isset($info['new12']) ? $info['new12'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new13" value="<?php echo isset($info['new13']) ? $info['new13'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="new14" value="<?php echo isset($info['new14']) ? $info['new14'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
						</div>
					</div>
					
					
					<div class="right" style="float: left; width: 50%; ">
						<strong style="float: left; width: 100%; display: block; font-size: 14px; text-align: center; text-decoration: underline; padding: 4px 0 2px;">USED</strong>
						<div class="form-field" style="float: left; width: 100%;">
							<input type="text" name="used1" value="<?php echo isset($info['used1']) ? $info['used1'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used2" value="<?php echo isset($info['used2']) ? $info['used2'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used3" value="<?php echo isset($info['used3']) ? $info['used3'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used4"  value="<?php echo isset($info['used4']) ? $info['used4'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used5" value="<?php echo isset($info['used5']) ? $info['used5'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used6" value="<?php echo isset($info['used6']) ? $info['used6'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used7" value="<?php echo isset($info['used7']) ? $info['used7'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used8" value="<?php echo isset($info['used8']) ? $info['used8'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used9" value="<?php echo isset($info['used9']) ? $info['used9'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used10" value="<?php echo isset($info['used10']) ? $info['used10'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used11" value="<?php echo isset($info['used11']) ? $info['used11'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used12" value="<?php echo isset($info['used12']) ? $info['used12'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used13" value="<?php echo isset($info['used13']) ? $info['used13'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
							<input type="text" name="used14" value="<?php echo isset($info['used14']) ? $info['used14'] : "" ?>" style="float: left; width: 100%; border-bottom: 1px solid #000; padding: 3px; text-align: center;">
						</div>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0; font-size: 13px; border-bottom: 1px solid #000;">
					<span><input type="checkbox" name="ESP" value="ESP" <?php echo (isset($info['ESP'])&&$info['ESP']=='ESP')?'checked="checked"':''; ?> / > ESP/T&W <input type="text" name="ESP" value="<?php echo isset($info['ESP']) ? $info['ESP'] : "" ?>" style="width: 14%; margin-bottom: 3px;"></span>
					<span><input type="checkbox" name="appearance" value="appearance" <?php echo (isset($info['appearance'])&&$info['appearance']=='appearance')?'checked="checked"':''; ?> /> APPEARANCE <input type="text" name="appearance" value="<?php echo isset($info['appearance']) ? $info['appearance'] : "" ?>" style="width: 14%; margin-bottom: 3px;"></span>
					<span><input type="checkbox" name="theft" value="theft" <?php echo (isset($info['theft'])&&$info['theft']=='theft')?'checked="checked"':''; ?> /> THEFT <input type="text" name="theft" value="<?php echo isset($info['theft']) ? $info['theft'] : "" ?>" style="width: 14%; margin-bottom: 3px;"></span>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0; font-size: 13px; border-bottom: 1px solid #000; text-align: center;">
					<label>GOOD FAITH DEPOSIT $ </label>
					<input type="text" name="deposit" value="<?php echo isset($info['deposit']) ? $info['deposit'] : "" ?>" style="width: 40%; margin: 0 0 6px 0;">
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0; font-size: 13px; border-bottom: 1px solid #000; text-align: center;">
					<div class="form-field" style="float: left; width: 100%;">
					<label>QUOTE / SERVICE TICKET  </label>
					<input type="text" name="service_ticket" value="<?php echo (isset($info['service_ticket'])&&$info['service_ticket']=='yes')? $info['service_ticket']:''; ?>" style="width: 10%; margin: 0 0 6px 0;">
					<label style="margin: 0 3% 0 0;">Yes</label>
					<input type="text" name="service_ticket" value="<?php echo (isset($info['service_ticket'])&&$info['service_ticket']=='no')? $info['service_ticket']:''; ?>" style="width: 10%; margin: 0 0 6px 0;">
					<label>No</label>
					</div>
				</div>
				
			</div>
			
			<div class="right" style="float: right; width: 49%; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
				<h3 style="float: right; width: 100%; text-align: center; font-size: 16px;"><b>INSURANCE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Company:</label>
						<input type="text" name="company_name" value="<?php echo isset($info['company_name']) ? $info['company_name'] : "" ?>" style="width: 73%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Agent:</label>
						<input type="text" name="agent" value="<?php echo isset($info['agent'])?$info['agent']:''; ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Phone #:</label>
						<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 76%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Policy #:</label>
						<input type="text" name="policy_no" value="<?php echo isset($info['policy_no'])?$info['policy_no']:''; ?>" style="width: 76%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0 20px;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Col Ded $:</label>
						<input type="text" name="col_ded" value="<?php echo isset($info['col_ded'])?$info['col_ded']:''; ?>" style="width: 70%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Comp Ded: $</label>
						<input type="text" name="comp_ded" value="<?php echo isset($info['comp_ded'])?$info['comp_ded']:''; ?>" style="width: 66%; border: 0;">
					</div>
				</div>
				
				
				<h3 style="float: right; width: 100%; text-align: center; font-size: 16px; border-top: 1px solid #000; padding-top: 3px;"><b>TRADE INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 85%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Model:</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 80%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Color:</label>
						<input type="text" name="color_trade" value="<?php echo isset($info['color_trade'])?$info['color_trade']:''; ?>" style="width: 80%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%; border-bottom: 1px solid #000;">
						<label>Mileage:</label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : "" ?>" style="width: 70%; border: 0;">
					</div>
					<div class="form-field" style="float: right; width: 49%; border-bottom: 1px solid #000;">
						<label>Trade Allowance $</label>
						<input type="text" name="trade_value" value="<?php echo isset($info['trade_value']) ? $info['trade_value'] : ''; ?>" style="width: 52%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>VIN #:</label>
						<input type="text" name="tvin" value="<?php echo isset($info["tvin"]) ? $info["tvin"] : $info["vin_trade"] ?>" style="width: 90%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label style="font-size: 16px; margin: 0 10% 0 0 ">Extended Service Plan </label>
						<span><input type="radio" name="service_plan" value="yes" <?php echo (isset($info['service_plan'])&&$info['service_plan']=='yes')?'checked="checked"':''; ?> /> Yes</span>
						<span style="margin: 0 4%"><input type="radio" name="service_plan" value="no" <?php echo (isset($info['service_plan'])&&$info['service_plan']=='no')?'checked="checked"':''; ?> /> No</span>
						<span><input type="radio" name="service_plan" value="expired" <?php echo (isset($info['service_plan'])&&$info['service_plan']=='expired')?'checked="checked"':''; ?> /> Expired</span>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label style="vertical-align: top;">Notes:</label>
						<textarea name="notes" style="width: 89%; height: 120px; border: 0px;"><?php echo isset($info['notes'])?$info['notes']:''; ?></textarea>
					</div>
				</div>
				
				<h3 style="float: right; width: 100%; text-align: center; font-size: 16px; border-top: 1px solid #000; padding-top: 3px; margin: 0;"><b>TRADE PAY-OFF INFORMATION</b></h3>
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Payoff To:</label>
						<input type="text" name="payoff_trade" value="<?php echo isset($info['payoff_trade'])?$info['payoff_trade']:''; ?>" style="width: 85%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
						<label>Estimated Payoff Amount $</label>
						<input type="text" name="payoff_amount" value="<?php echo isset($info['payoff_amount'])?$info['payoff_amount']:''; ?>" style="width: 65%; border: 0;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 49%;">
						<label style="text-decoration: underline; text-align: center; display: block;">DESIRED DOWN PAYMENT <br> RANGE</label>
						<input type="text" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 100%; border: 0; text-align: center;">
					</div>
					
					<div class="form-field" style="float: right; width: 49%;">
						<label style="text-decoration: underline; text-align: center; display: block;">DESIRED MONTHLY PAYMENT RANGE</label>
						<input type="text" name="month_pay" value="<?php echo isset($info['month_pay'])?$info['month_pay']:''; ?>" style="width: 100%; border: 0; text-align: center;">
					</div>
				</div>
				
				
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; width: 100%; margin: 2px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 100%;">
				<label>Salesperson Signature</label>
			</div>
			
			<div class="form-field" style="float: right; width: 49%;">
				<div class="cover" style="float: right; width: 100%; border: 1px solid #000; padding: 2px 0 1px; font-size: 13px; text-align: center;">
					<span>FINANCE @ HDFS  <input type="radio" name="payment_method" value="hdfs" <?php echo (isset($info['payment_method'])&&$info['payment_method']=='hdfs')?'checked="checked"':''; ?> /></span>/
					<span>OTHER FINANCING<input type="radio" name="payment_method" value="financing" <?php echo (isset($info['payment_method'])&&$info['payment_method']=='financing')?'checked="checked"':''; ?> /></span>/
					<span>CASH <input type="radio" name="payment_method" value="cash" <?php echo (isset($info['payment_method'])&&$info['payment_method']=='cash')?'checked="checked"':''; ?> /></span>
					<p style="text-align: center; margin: 0px 0;">Method of Payment (Circle One)</p>
				</div>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 14px;">I hereby indicate my intent to purchase a motorcycle.  I have available, or can obtain, sufficient funds to complete the transaction.  I authorize the <br> dealer representative to investigate my credit and employment history to evaluate my ability to purchase the above referenced motorcycle.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field-outer" style="float: left; width: 33%;">
				<div class="form-field" style="float: left; width: 70%">
					<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign'])?$info['buyer_sign']:''; ?>" style="width: 100%;">
					<label>Buyer Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 30%">
					<input type="text" name="buyer_date" value="<?php echo isset($info['buyer_date'])?$info['buyer_date']:''; ?>" style="width: 100%;">
					<label>Date</label>
				</div>
			</div>
			
			
			<div class="form-field-outer" style="float: left; width: 33%; margin: 0 2%;">
				<div class="form-field" style="float: left; width: 70%">
					<input type="text" name="co_buyer_sign" value="<?php echo isset($info['co_buyer_sign'])?$info['co_buyer_sign']:''; ?>" style="width: 100%;">
					<label>Co-Buyer Signature</label>
				</div>
				<div class="form-field" style="float: left; width: 30%">
					<input type="text" name="co_buyer_date" value="<?php echo isset($info['co_buyer_date'])?$info['co_buyer_date']:''; ?>" style="width: 100%;">
					<label>Date</label>
				</div>
			</div>
			
			<div class="form-field-outer" style="float: right; width: 30%;">
				<div class="form-field" style="float: left; width: 100%">
					<input type="text" name="manager_appr" value="<?php echo isset($info['manager_appr'])?$info['manager_appr']:''; ?>" style="width: 100%;">
					<label>Manager Approval</label>
				</div>
			</div>
		</div>
		
		<p style="text-align: center; font-size: 14px; margin: 16px 0 0; float: left; width: 100%; font-size: 14px;">Form Revised 01/01/2017   -   ALL OTHER VERSIONS ARE OBSOLETE AND WILL NOT BE USED</p>
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
