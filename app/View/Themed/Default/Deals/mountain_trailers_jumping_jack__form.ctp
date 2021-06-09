<?php
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
	<div id="worksheet_container" style="width: 980px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto;}
input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	table input[type="text"]{border: 0px;}
	td, th{border-bottom: 1px solid #000; border-left: 1px solid #000; padding: 3px; text-align: center;}
	td{font-size: 13px;}
	th{font-size: 14px;}
	table{border-top: 1px solid #000; border-right: 1px solid #000;}
	td:nth-child(2), th:nth-child(2){text-align: left;}
	td:nth-child(3), th:nth-child(3){text-align: right;}
	td:nth-child(4) input[type="text"]{text-align: center;}
	
@media print { 
.dontprint{display: none;}
	}
	</style>
	<div class="wraper header"> 
		<div class="logo" style="width: 300px; margin: 0 auto;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/home-logo.png'); ?>" alt="" style="width: 100%;">
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<!-- leftside start -->
			<div class="left" style="float: left; width: 40%; margin: 7px 0;">
				<table style="width: 100%;" cellpadding="0"; cellspacing="0">
					<tr>
						<th style="width: 16%;">QTY</th>
						<th style="width: 54%;">DESCRIPITION</th>
						<th style="width: 30%;">PRICE</th>
					</tr>
					<tr>
						<td><input type="text" name="qty" value="<?php echo isset($info['qty']) ? $info['qty'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>4x6</strong> Tent Pod/<strong>6'</strong> Tent</td>
						<td>$4,495.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>4x6</strong> Trailer/<strong>6'</strong> Tent</td>
						<td>$5,995.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>4x6</strong> Trailer/<strong>6'</strong> Tent <strong>BLACKOUT</strong></td>
						<td>$7,390.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x8</strong> Trailer/<strong>8'</strong> Tent</td>
						<td>$6,995.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x8</strong> Trailer/<strong>8'</strong> Tent <strong>BLACKOUT</strong></td>
						<td>$8,390.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x12</strong> Trailer/<strong>8'</strong> Tent</td>
						<td>$7,995.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty6" value="<?php echo isset($info['qty6']) ? $info['qty6'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x8</strong> Trailer/<strong>8'</strong> Tent <strong>BLACKOUT</strong></td>
						<td>$9,990.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty7" value="<?php echo isset($info['qty7']) ? $info['qty7'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x12</strong> Trailer/<strong>12'</strong> Tent</td>
						<td>$8,495.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty8" value="<?php echo isset($info['qty8']) ? $info['qty8'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x8</strong> Trailer/<strong>12'</strong> Tent <strong>BLACKOUT</strong></td>
						<td>$10,490.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty9" value="<?php echo isset($info['qty9']) ? $info['qty9'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x17</strong> Trailer/<strong>12'</strong> Tent</td>
						<td>$9,895.00</td>
					</tr>
					<tr>
						<td><input type="text" name="qty10" value="<?php echo isset($info['qty10']) ? $info['qty10'] : ''; ?>" style="width: 100%;  "></td>
						<td><strong>6x17</strong> Trailer/<strong>12'</strong> Tent <strong>BLACKOUT</strong></td>
						<td>$11,890.00</td>
					</tr>
					<tr>
						<td style="border: 0px;">&nbsp;</td>
						<td style="border: 0px;">&nbsp;</td>
						<td style="border-left: 1px solid #000;"><input type="text" id="tatal_access" name="price" value="<?php echo isset($info['qty10']) ? $info['qty10'] : ''; ?>" style="width: 66%;"></td>
					</tr>
				</table>
				
				<div class="row" style="float: left; width: 100%; margin: 7px;">
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>SALESMAN:</label>
						<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 80%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>PHONE:</label>
						<input type="text" name="phone" value="435-709-8862" style="width: 80%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>STORE:</label>
						<input type="text" name="store" value="Mountain West Trailer" style="width: 80%; float: right;">
						<input type="text" name="store" value="1470 South Hwy 40" style="width: 80%; float: right; margin: 10px 0;">
						<input type="text" name="store" value="Heber City, UT 84032" style="width: 80%; float: right;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 336px 0 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>PURCHASER:</label>
						<input type="text" name="PURCHASER" value="<?php echo isset($info['PURCHASER']) ? $info['PURCHASER'] :  $info['first_name'].' '.$info['last_name']; ?>" style="width: 76%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>ADDRESS:</label>
						<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : ''; ?>" style="width: 80%; float: right;">
						<input type="text" name="address2" value="<?php echo isset($info['address2']) ? $info['address2'] : ''; ?>" style="width: 80%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>PHONE:</label>
						<input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>" style="width: 80%; float: right;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 5px 0;">
						<label>EMAIL:</label>
						<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:'';  ?>" style="width: 80%; float: right;">
					</div>
				</div>
			</div>
			<!-- leftside end -->
			
			<!-- right side start -->
			<div class="right" style="float: right; width: 57%; margin: 7px 0;">
				<table style="width: 100%;" cellpadding="0"; cellspacing="0">
					<tr>
						<th style="width: 10%;">QTY</th>
						<th style="width: 40%;">DESCRIPITION</th>
						<th style="width: 25%;">PRICE</th>
						<th style="width: 25%;">Total</th>
					</tr>
					<tr>
						<td><input type="text" name="qty11" value="<?php echo isset($info['qty11']) ? $info['qty11'] : ''; ?>" style="width: 100%;"></td>
						<td>Carpet</td>
						<td>$50.00</td>
						<td><input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty12" value="<?php echo isset($info['qty12']) ? $info['qty12'] : ''; ?>" style="width: 100%;"></td>
						<td>Safety Bars</td>
						<td>$50.00</td>
						<td><input type="text" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty13" value="<?php echo isset($info['qty13']) ? $info['qty13'] : ''; ?>" style="width: 100%;"></td>
						<td>Table Legs</td>
						<td>$50.00</td>
						<td><input type="text" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty14" value="<?php echo isset($info['qty14']) ? $info['qty14'] : ''; ?>" style="width: 100%;"></td>
						<td>Accessory Adapter</td>
						<td>$50.00</td>
						<td><input type="text" name="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty15" value="<?php echo isset($info['qty15']) ? $info['qty15'] : ''; ?>" style="width: 100%;"></td>
						<td>Propane Rack</td>
						<td>$175.00</td>
						<td><input type="text" name="total4" value="<?php echo isset($info['total4']) ? $info['total4'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty16" value="<?php echo isset($info['qty16']) ? $info['qty16'] : ''; ?>" style="width: 100%;"></td>
						<td>Water Rack</td>
						<td>$175.00</td>
						<td><input type="text" name="total5" value="<?php echo isset($info['total5']) ? $info['total5'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty17" value="<?php echo isset($info['qty17']) ? $info['qty17'] : ''; ?>" style="width: 100%;"></td>
						<td>Cooler Rack</td>
						<td>$145.00</td>
						<td><input type="text" name="total6" value="<?php echo isset($info['total6']) ? $info['total6'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty18" value="<?php echo isset($info['qty18']) ? $info['qty18'] : ''; ?>" style="width: 100%;"></td>
						<td>Boat Bar</td>
						<td>$95.00</td>
						<td><input type="text" name="total7" value="<?php echo isset($info['total7']) ? $info['total7'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty19" value="<?php echo isset($info['qty19']) ? $info['qty19'] : ''; ?>" style="width: 100%;"></td>
						<td>Large Awning 6'</td>
						<td>$295.00</td>
						<td><input type="text" name="total8" value="<?php echo isset($info['total8']) ? $info['total8'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty20" value="<?php echo isset($info['qty20']) ? $info['qty20'] : ''; ?>" style="width: 100%;"></td>
						<td>Awning 3'</td>
						<td>$145.00</td>
						<td><input type="text" name="total9" value="<?php echo isset($info['total9']) ? $info['total9'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty21" value="<?php echo isset($info['qty21']) ? $info['qty21'] : ''; ?>" style="width: 100%;"></td>
						<td>Spare Tire w/ Mount</td>
						<td>$145.00</td>
						<td><input type="text" name="total10" value="<?php echo isset($info['total10']) ? $info['total10'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty22" value="<?php echo isset($info['qty22']) ? $info['qty22'] : ''; ?>" style="width: 100%;"></td>
						<td>Kitchenette Top</td>
						<td>$145.00</td>
						<td><input type="text" name="total11" value="<?php echo isset($info['total11']) ? $info['total11'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty23" value="<?php echo isset($info['qty23']) ? $info['qty23'] : ''; ?>" style="width: 100%;"></td>
						<td>8' Standard Ramps (Set)</td>
						<td>$345.00</td>
						<td><input type="text" name="total12" value="<?php echo isset($info['total12']) ? $info['total12'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty24" value="<?php echo isset($info['qty24']) ? $info['qty24'] : ''; ?>" style="width: 100%;"></td>
						<td>11' Telescoping Ramp (Set)</td>
						<td>$595.00</td>
						<td><input type="text" name="total13" value="<?php echo isset($info['total13']) ? $info['total13'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty25" value="<?php echo isset($info['qty25']) ? $info['qty25'] : ''; ?>" style="width: 100%;"></td>
						<td>Lantern Post</td>
						<td>$145.00</td>
						<td><input type="text" name="total14" value="<?php echo isset($info['total14']) ? $info['total14'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty26" value="<?php echo isset($info['qty26']) ? $info['qty26'] : ''; ?>" style="width: 100%;"></td>
						<td>Half Bed Extension</td>
						<td>$195.00</td>
						<td><input type="text" name="total15" value="<?php echo isset($info['total15']) ? $info['total15'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty27" value="<?php echo isset($info['qty27']) ? $info['qty27'] : ''; ?>" style="width: 100%;"></td>
						<td>4x6 Storage Cover</td>
						<td>$295.00</td>
						<td><input type="text" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty28" value="<?php echo isset($info['qty28']) ? $info['qty28'] : ''; ?>" style="width: 100%;"></td>
						<td>6x8 Storage Cover</td>
						<td>$295.00</td>
						<td><input type="text" name="total17" value="<?php echo isset($info['total17']) ? $info['total17'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty29" value="<?php echo isset($info['qty29']) ? $info['qty29'] : ''; ?>" style="width: 100%;"></td>
						<td>6x12 Storage Cover</td>
						<td>$395.00</td>
						<td><input type="text" name="total18" value="<?php echo isset($info['total18']) ? $info['total18'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty30" value="<?php echo isset($info['qty30']) ? $info['qty30'] : ''; ?>" style="width: 100%;"></td>
						<td>6x17 Storage Cover</td>
						<td>$495.00</td>
						<td><input type="text" name="total19" value="<?php echo isset($info['total19']) ? $info['total19'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty31" value="<?php echo isset($info['qty31']) ? $info['qty31'] : ''; ?>" style="width: 100%;"></td>
						<td>Electric Trailer Brakes (4x6 & 6x8)</td>
						<td>$395.00</td>
						<td><input type="text" name="total20" value="<?php echo isset($info['total20']) ? $info['total20'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty32" value="<?php echo isset($info['qty32']) ? $info['qty32'] : ''; ?>" style="width: 100%;"></td>
						<td>Storage Hutch</td>
						<td>$295.00</td>
						<td><input type="text" name="total21" value="<?php echo isset($info['total21']) ? $info['total21'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty33" value="<?php echo isset($info['qty33']) ? $info['qty33'] : ''; ?>" style="width: 100%;"></td>
						<td>Vinyl Window Insert</td>
						<td>$65.00</td>
						<td><input type="text" name="total22" value="<?php echo isset($info['total22']) ? $info['total22'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty34" value="<?php echo isset($info['qty34']) ? $info['qty34'] : ''; ?>" style="width: 100%;"></td>
						<td>4x6 Boat Bar</td>
						<td>$95.00</td>
						<td><input type="text" name="total23" value="<?php echo isset($info['total23']) ? $info['total23'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty35" value="<?php echo isset($info['qty35']) ? $info['qty35'] : ''; ?>" style="width: 100%;"></td>
						<td>4x6 Small Awning</td>
						<td>$145.00</td>
						<td><input type="text" name="total24" value="<?php echo isset($info['total24']) ? $info['total24'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty36" value="<?php echo isset($info['qty36']) ? $info['qty36'] : ''; ?>" style="width: 100%;"></td>
						<td>Motorcycle Chock</td>
						<td>$145.00</td>
						<td><input type="text" name="total25" value="<?php echo isset($info['total25']) ? $info['total25'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty37" value="<?php echo isset($info['qty37']) ? $info['qty37'] : ''; ?>" style="width: 100%;"></td>
						<td>2" Lift Kit</td>
						<td>$195.00</td>
						<td><input type="text" name="total26" value="<?php echo isset($info['total26']) ? $info['total26'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty38" value="<?php echo isset($info['qty38']) ? $info['qty38'] : ''; ?>" style="width: 100%;"></td>
						<td>Energy Vault Venture Pro</td>
						<td>$299.00</td>
						<td><input type="text" name="total27" value="<?php echo isset($info['total27']) ? $info['total27'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty39" value="<?php echo isset($info['qty39']) ? $info['qty39'] : ''; ?>" style="width: 100%;"></td>
						<td>Zamp LED Light Kit</td>
						<td>$199.00</td>
						<td><input type="text" name="total28" value="<?php echo isset($info['total28']) ? $info['total28'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td><input type="text" name="qty40" value="<?php echo isset($info['qty40']) ? $info['qty40'] : ''; ?>" style="width: 100%;"></td>
						<td>ReadyLight Solar Kit</td>
						<td>$299.00</td>
						<td><input type="text" name="total29" value="<?php echo isset($info['total29']) ? $info['total29'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Dealer Documentation Fees<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id ="dealer_documentation" name="dealer_documentation" value="$62.00"  style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Net Taxable Amount</td>
						<td style="border-left: 1px solid #000;"><input type="text" id = "taxable_amount" name="taxable_amount" value="<?php echo isset($info['taxable_amount']) ? $info['taxable_amount'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Sales Tax<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : ''; ?>"  style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">License, Temporary Permit & Registration Fees<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id="ltpr_fees" name="ltpr_fees" value="<?php echo isset($info['ltpr_fees']) ? $info['ltpr_fees'] : ''; ?>"style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Discount<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id ="discount" name="discount" value="<?php echo isset($info['discount']) ? $info['discount'] : ''; ?>"  style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Total<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id="total_amount" name="total_amount" value="<?php echo isset($info['total_amount']) ? $info['total_amount'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Down Payment</td>
						<td style="border-left: 1px solid #000;"><input type="text" id="down_payment" name="down_payment" value="<?php echo isset($info['down_payment']) ? $info['down_payment'] : ''; ?>" style="width: 100%;"></td>
					</tr>
					<tr>
						<td colspan="3" style="border: 0px; text-align: right;">Balance<sup>*</sup></td>
						<td style="border-left: 1px solid #000;"><input type="text" id="balance" name="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : ''; ?>"style="width: 100%;"></td>
					</tr>
				</table>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 10px 0 5px;">
				<div class="form-field" style="float: left; width: 41%;">
					<label>X</label>
					<input type="text" name="x" value="<?php echo isset($info['x']) ? $info['x'] : ''; ?>" style="width: 96%;">
				</div>
				<div class="form-field" style="float: right; width: 32%;">
					<label>Requested Delivery Date:</label>
					<input type="text" name="date_delivered" value="<?php echo isset($info['date_delivered']) ? $info['date_delivered'] : ''; ?>" style="width: 43%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 17px 0 0; text-align: center; font-size: 15px;">
				<p style="margin: 0 5px;">Estimates may not include Sales Tax, Registration Fees, or Dealer Doc. Fees</p>
				<p style="margin: 0 5px;">Manufatured by jumping jack Tralier<span>.</span> 1065 West North temple, Salt Lake City, UT <span>.</span> 801-531-5420</p>
				<p style="margin: 0 5px;">www.jumpingjacktrailers.com</p>
			</div>
			
			<!-- right side end -->
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
	
	$("#btn_back").click(function(){
		
	});
	var table = $(".left table");
	var sum = 0.00;

	table.find('tr').each(function () {
		var $this = this; 
		calculate_left_total($this);
		var qty = $(this).find('td:eq(0) input').val();
		qty = qty ? parseFloat(qty) : 0.00;
        var price = $(this).find("td").eq(2).text();
        price = price.replace('$', '').replace(',', '');
        price = price == "" ? 0.00 : parseFloat(price);
        var price_amount = qty*price;
        sum += price_amount;
        $("#tatal_access").val('$'+sum.toFixed(2));
     });
	function calculate_totalaccess($this) {
		total_access=0.00;
		$('.right table tr').each(function() {
			var total = $(this).find('td:eq(3) input').val();
			var left_total =  $("#tatal_access").val();
			var dealer_fee = $("#dealer_documentation").val();
			left_total = left_total.replace('$', '');
		    left_total = left_total == "" ? 0.00 : parseFloat(left_total);
		    dealer_fee = dealer_fee.replace('$', '');
		    dealer_fee = dealer_fee == "" ? 0.00 : parseFloat(dealer_fee);
			if (total) {
				total = total.replace('$', '');
		        total = total == "" ? 0.00 : parseFloat(total);
		        total_access += total;
			}
			var taxable_amount = dealer_fee + left_total + total_access;
			$("#taxable_amount").val('$'+ taxable_amount.toFixed(2));
			var tax_fee = isNaN(parseFloat( $('#sales_tax').val()))?0.00:parseFloat($('#sales_tax').val());
			var ltpr_fees =isNaN(parseFloat( $('#ltpr_fees').val()))?0.00:parseFloat($('#ltpr_fees').val());
			var discount =isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
			var down_payment =isNaN(parseFloat( $('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
			var sales_tax = (parseFloat(tax_fee)/100)*taxable_amount;

			var totals = sales_tax + taxable_amount + ltpr_fees - discount;
			if(tax_fee || ltpr_fees || discount) {
				$("#total_amount").val('$'+ totals.toFixed(2));
			}
			else if(!tax_fee && !ltpr_fees && !discount) {
				$("#total_amount").val('');
			}
			var balance = totals - down_payment;
			if(down_payment) {
				$("#balance").val('$'+ balance.toFixed(2));
			}
			else if(!down_payment) {
				$("#balance").val('');
			}
		});
	}
	function calculate_left_total($this) {
		sum = 0.00;
		$(".left table").find('tr').each(function () {
		var qty = $(this).find('td:eq(0) input').val();
		qty = qty ? parseFloat(qty) : 0.00;
        var price = $(this).find("td").eq(2).text();
        price = price.replace('$', '').replace(',', '');
        price = price == "" ? 0.00 : parseFloat(price);
        var price_amount = qty*price;
        sum += price_amount;
        $("#tatal_access").val('$'+sum.toFixed(2));
        calculate_totalaccess($this);
     });
	}
	$(".left table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_left_total($this);
	});

	$('.right table tr').each(function() {
		var $this = this; 
		calculate_row_total($this);
		var qt = $(this).find('td:eq(0) input').val();
		console.log("right: " +qt);
		var pri = $(this).find("td").eq(2).text();
		pri = pri.replace('$', '').replace(',', '');
        pri = pri == "" ? 0.00 : parseFloat(pri);
		$(this).find('td:eq(3) input').val('$'+(qt * pri).toFixed(2));
	})

	function calculate_row_total($this){
		var qt = $($this).find('td:eq(0) input').val();
		var pri = $($this).find("td").eq(2).text();
		pri = pri.replace('$', '').replace(',', '');
        pri = pri == "" ? 0.00 : parseFloat(pri);
		$($this).find('td:eq(3) input').val('$'+(qt * pri).toFixed(2));
	}

	$(".right table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_row_total($this);
	});

	var total_access = 0.00;
	$('.right table tr').each(function() {
		var $this = this; 
		calculate_totalaccess($this);
		var total = $(this).find('td:eq(3) input').val();
		var left_total =  $("#tatal_access").val();
		var dealer_fee = $("#dealer_documentation").val();
		left_total = left_total.replace('$', '');
	    left_total = left_total == "" ? 0.00 : parseFloat(left_total);
	    dealer_fee = dealer_fee.replace('$', '');
	    dealer_fee = dealer_fee == "" ? 0.00 : parseFloat(dealer_fee);
		if (total) {
			total = total.replace('$', '');
	        total = total == "" ? 0.00 : parseFloat(total);
	        total_access += total;
		}
		var taxable_amount = dealer_fee + left_total + total_access;
		$("#taxable_amount").val('$'+ taxable_amount.toFixed(2));
	});
	


	$(".right table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_totalaccess($this);
	});

	$("#tatal_access").on('change keyup paste',function(){
		var $this = this; 
		calculate_totalaccess($this);
	});


	// calculate();
});
</script>
</div>
