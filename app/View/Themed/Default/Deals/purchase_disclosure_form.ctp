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
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	td, th{padding: 7px; border-bottom: 0px solid #000;}
	th{padding: 4px; border-right: 0px solid #000;}
	td:first-child{text-align: left;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	td{padding: 3px;}
	.second-table td{text-align: center;}
	.second-table td:first-child{text-align: left;}
	.no-border input[type="text"]{border: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h3 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 18px;"><b>RV Sales</b></h3>
		<h3 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 16px;"><b>TRADE/PURCHASE DISCLOSURE FORM</b></h3>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 70%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Name(s):</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 4px;">
				<label style="display: block;">Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 7px; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Make:</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 4px; border-right: 1px solid #000;">
				<label>Model:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 4px;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<table>
				<tr>
					<td style="width: 10%;">Yes</td>
					<td style="width: 10%;">No</td>
					<td style="width: 80%;">&nbsp;</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title1_check" value="yes" <?php echo (isset($info['title1_check']) && $info['title1_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title1_check" value="no" <?php echo (isset($info['title1_check']) && $info['title1_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the described vehicle ("vehicle") been in an accident that caused FRAME DAMAGE, DAMAGE TO THE DRIVE TRAIN OR DAMAGE TO THE SUSPENSION or caused the vehicle to be classified as "SALVAGE"? </td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title2_check" value="yes" <?php echo (isset($info['title2_check']) && $info['title2_check']=='yes')?'checked="checked"':''; ?> /> </td>
					<td><input type="radio" name="title2_check" value="no" <?php echo (isset($info['title2_check']) && $info['title2_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle been classified as a "Lemon-Law Buyback or "warranty return" by its manufacturer or any prior selling dealer?"</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title3_check" value="yes" <?php echo (isset($info['title3_check']) && $info['title3_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title3_check" value="no" <?php echo (isset($info['title3_check']) && $info['title3_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Is this vehicle's registration not current or in your name? Are there official or other fees or taxes that are unpaid?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title4_check" value="yes" <?php echo (isset($info['title4_check']) && $info['title4_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio"  name="title4_check" value="no" <?php echo (isset($info['title4_check']) && $info['title4_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle been previously stolen or vandalized?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title5_check" value="yes" <?php echo (isset($info['title5_check']) && $info['title5_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title5_check" value="no" <?php echo (isset($info['title5_check']) && $info['title5_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle been previously used for hire or classified as a taxi or used as a rental?</td>
				</tr>
				<tr>
					<td><input type="radio" name="title6_check" value="yes" <?php echo (isset($info['title6_check']) && $info['title6_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title6_check" value="no" <?php echo (isset($info['title6_check']) && $info['title6_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has this vehicle been to the factory for repairs: been the subject of a factory recall or otherwise required by the factory to undergo factory repairs?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title7_check" value="yes" <?php echo (isset($info['title7_check']) && $info['title7_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title7_check" value="no" <?php echo (isset($info['title7_check']) && $info['title7_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the odometer been tampered with, repaired, or replaced?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title8_check" value="yes" <?php echo (isset($info['title8_check']) && $info['title8_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title8_check" value="no" <?php echo (isset($info['title8_check']) && $info['title8_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle sustained water damage?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title9_check" value="yes" <?php echo (isset($info['title9_check']) && $info['title9_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title9_check" value="no" <?php echo (isset($info['title9_check']) && $info['title9_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle been MODIFIED or REPAIRED in such a way as to cause the manufacturer's warranty (in part or in its entirety) to be voided?</td>
				</tr>
				<tr>
					<td><input type="radio" name="title10_check" value="yes" <?php echo (isset($info['title10_check']) && $info['title10_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title10_check" value="no" <?php echo (isset($info['title10_check']) && $info['title10_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has the vehicle been subject to repairs, modifications or upgrades collectively costing (costs to include parts and labor) in excess of either $500 or 3% of the MSRP?</td>
				</tr>
				
				<tr>
					<td><input type="radio" name="title11_check" value="yes" <?php echo (isset($info['title11_check']) && $info['title11_check']=='yes')?'checked="checked"':''; ?> /></td>
					<td><input type="radio" name="title11_check" value="no" <?php echo (isset($info['title11_check']) && $info['title11_check']=='no')?'checked="checked"':''; ?> /></td>
					<td>Has factory furniture, TV's or appliances been removed or modified?</td>
				</tr>
			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>If yes, explain answer here:</label>
				<input type="text" name="expalin1" value="<?php echo isset($info['expalin1'])?$info['expalin1']:''; ?>" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
				<input type="text" name="expalin2" value="<?php echo isset($info['expalin2'])?$info['expalin2']:''; ?>" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
				<input type="text" name="expalin3" value="<?php echo isset($info['expalin3'])?$info['expalin3']:''; ?>" style="float: left; width: 100%; margin: 4px 0; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row second-table" style="float: left; width: 100%; margin: 5px 0;">
			<div class="left" style="float: left; width: 60%;">
				<table style="width: 100%;">
					<tr>
						<td style="width: 40%;"><b>Overall Condition:</b></td>
						<td style="width: 15%;"><b>Great</b></td>
						<td style="width: 15%;"><b>Good</b></td>
						<td style="width: 15%;"><b>Fair</b></td>
						<td style="width: 15%;"><b>Poor</b></td>
					</tr>
					
					<tr>
						<td>Upholstery</td>
						<td><input type="checkbox" name="uphol_great" value="great" <?php echo (isset($info['uphol_great'])&&$info['uphol_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="uphol_good" value="good" <?php echo (isset($info['uphol_good'])&&$info['uphol_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="house_fair" value="fair" <?php echo (isset($info['house_fair'])&&$info['house_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="house_poor" value="poor" <?php echo (isset($info['house_poor'])&&$info['house_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Carpet / flooring</td>
						<td><input type="checkbox" name="carpet_great" value="great" <?php echo (isset($info['carpet_great'])&&$info['carpet_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="carpet_good" value="good" <?php echo (isset($info['carpet_good'])&&$info['carpet_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="carpet_fair" value="fair" <?php echo (isset($info['carpet_fair'])&&$info['carpet_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="carpet_poor" value="poor" <?php echo (isset($info['carpet_poor'])&&$info['carpet_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Roof</td>
						<td><input type="checkbox" name="roof_great" value="great" <?php echo (isset($info['roof_great'])&&$info['roof_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="roof_good" value="good" <?php echo (isset($info['roof_good'])&&$info['roof_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="roof_fair" value="fair" <?php echo (isset($info['roof_fair'])&&$info['roof_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="roof_poor" value="poor" <?php echo (isset($info['roof_poor'])&&$info['roof_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Exterior / decals</td>
						<td><input type="checkbox" name="decals_great" value="great" <?php echo (isset($info['decals_great'])&&$info['decals_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="decals_good" value="good" <?php echo (isset($info['decals_good'])&&$info['decals_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="decals_fair" value="fair" <?php echo (isset($info['decals_fair'])&&$info['decals_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="decals_poor" value="poor" <?php echo (isset($info['decals_poor'])&&$info['decals_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Tires (list age)</td>
						<td><input type="checkbox" name="tires_great" value="great" <?php echo (isset($info['tires_great'])&&$info['tires_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="tires_good" value="good" <?php echo (isset($info['tires_good'])&&$info['tires_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="tires_fair" value="fair" <?php echo (isset($info['tires_fair'])&&$info['tires_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="tires_poor" value="poor" <?php echo (isset($info['tires_poor'])&&$info['tires_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Appliances</td>
						<td><input type="checkbox" name="app_great" value="great" <?php echo (isset($info['app_great'])&&$info['app_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="app_good" value="good" <?php echo (isset($info['app_good'])&&$info['app_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="app_fair" value="fair" <?php echo (isset($info['app_fair'])&&$info['app_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="app_poor" value="poor" <?php echo (isset($info['app_poor'])&&$info['app_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Water pump / lines</td>
						<td><input type="checkbox" name="water_great" value="great" <?php echo (isset($info['water_great'])&&$info['water_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="water_good" value="good" <?php echo (isset($info['water_good'])&&$info['water_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="water_fair" value="fair" <?php echo (isset($info['water_fair'])&&$info['water_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="water_poor" value="poor" <?php echo (isset($info['water_poor'])&&$info['water_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
					
					<tr>
						<td>Antenna / Satellite dish</td>
						<td><input type="checkbox" name="antenna_great" value="great" <?php echo (isset($info['antenna_great'])&&$info['antenna_great']=='great')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="antenna_good" value="good" <?php echo (isset($info['antenna_good'])&&$info['antenna_good']=='good')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="antenna_fair" value="fair" <?php echo (isset($info['antenna_fair'])&&$info['antenna_fair']=='fair')?'checked':''; ?> /></td>
						<td><input type="checkbox" name="antenna_poor" value="poor" <?php echo (isset($info['antenna_poor'])&&$info['antenna_poor']=='poor')?'checked':''; ?> /></td>
					</tr>
				</table>
			</div>
			
			<div class="right" style="float: right; width: 35%;">
				<textarea name="term_notes" style="float: left; width: 98%; border: 1px solid #000; height: 220px; padding: 4px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
			</div>
		</div>
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 15px;">I understand that RV Sales is relying on these representations in agreeing to acquire the vehicle and in establishing an agreed value for its acquisition. This value is an "agreed value" established through mutual negotiation between myself and the dealer.</p>
		
		<p style="float: left; width: 100%; margin: 7px 0; font-size: 15px;">In the event that these representations are untruthful or knowingly false, I understand that I shall be liable to the Dealer and or the next purchaser for any damage, including punitive damages for any intentional misrepresentations. I agree to indemnify Dealer for any and all expenses including reasonable attorney's fees, incurred by Dealer in defending any claims relating to or arising form the representations I have made on this form.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; box-sizing: border-box;">
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 4px;">
				<input type="text" name="sign_date" value="<?php echo isset($info['sign_date'])?$info['sign_date']:''; ?>" style="width: 80%; border-bottom: 1px solid #000;"> 
				<label style="display: block;">Date:</label>
			</div>
			<div class="form-field" style="float: right; width: 60%; box-sizing: border-box; padding: 4px;">
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 100%;  border-bottom: 1px solid #000; margin-bottom: 3px;">
				<label>Customer's signature(s):</label>
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
