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
	label{font-size: 12px; margin-bottom: 0px;}
	p{font-size: 16px; text-align: center;}
	.col input[type="text"]{border-bottom: 0px;}
	
	.list li {display: inline-block; font-size: 13px; list-style: outside none none; width: 24%; margin-bottom: 7px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: center;}
	.left table input[type="text"]{ border-bottom: 0px solid #000;}
	
	body{font-size: 12px;}
	.wraper.main input {padding: 1px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="main-wrap" style="float: left; width: 100%; border: 1px solid #000;">
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box; padding: 10px; height: 116px;">
			<div class="logo" style="float: left; width: 10%; margin:  0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/1logo.jpg'); ?>" alt="">
			</div>
			<div class="logo" style="float: left; width: 10%; margin: 22px 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/1l.jpg'); ?>" alt="">
			</div>
			
			<div class="middle" style="float: left; width: 100%; text-align: center; position: absolute; left: 0; right: 0; margin: 0 auto;">
				<h2 style="margin: 0; font-size: 17px;"><b>NORSASK FARM EQUIPMENT LTD.</b></h2>
				<p style="margin: 0; font-size: 14px;">East Hill Rd & Hwy 16, P.O. Box 49</p>
				<p style="margin: 0; font-size: 14px;">North Battleford, SK S9A 2X6</p>
				<p style="margin: 0; font-size: 14px;">Ph: (306) 445-8128 ● Fax (306) 445-2722</p>
				<h3 style="margin: 0; font-size: 17px;"><b>SALES AGREEMENT</b></h3>
			</div>
			
			<div class="logo" style="float: right; width: 8%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/3logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="logo" style="float: right; width: 10%; margin: 22px 10px;; text-align: right;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-11.jpg'); ?>" alt="">
			</div>	
		</div>
				
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000; margin: 0;">
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label><b>Name:</b></label>
					<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 90%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>SOLD DATE:</b></label>
					<input type="text" name="sold_date" value="<?php echo isset($info['sold_date']) ? $info['sold_date'] : ''; ?>" style="width: 70%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>PICK UP DATE:</b></label>
					<input type="text" name="pick_date" value="<?php echo isset($info['pick_date']) ? $info['pick_date'] : ''; ?>" style="width: 63%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label><b>ADDRESS:</b></label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:'';  ?>" style="width: 87%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>PHONE (H):</b></label>
					<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 71%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>(c):</b></label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 88%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 70%;">
					<label><b>CITY:</b></label>
					<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 91.5%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>(W):</b></label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 86%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 2px 0;">
				<div class="form-field" style="float: left; width: 30%;">
					<label><b>PROV:</b></label>
					<input type="text" name="state_data" value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>" style="width: 81%;">
				</div>
				<div class="form-field" style="float: left; width: 40%;">
					<label><b>POSTAL CODE:</b></label>
					<input type="text" name="zip" value="<?php echo $info['zip']; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label><b>EMAIL:</b></label>
					<input type="text" name="email" value="<?php echo $info['email']; ?>" style="width: 78%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<!-- left start -->
			<div class="left" style="float: left; width: 70%; margin: 0">
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Part Number</th>
					<th>Total</th>
					<th>Disc</th>
				</tr>
				
				<tr>
					<td><input type="text" name="des1" value="<?php echo isset($info['des1']) ? $info['des1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price1" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num1" value="<?php echo isset($info['part_num1']) ? $info['part_num1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc1" value="<?php echo isset($info['disc1']) ? $info['disc1'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des2" value="<?php echo isset($info['des2']) ? $info['des2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num2" value="<?php echo isset($info['part_num2']) ? $info['part_num2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc2" value="<?php echo isset($info['disc2']) ? $info['disc2'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des3" value="<?php echo isset($info['des3']) ? $info['des3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price3" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num3" value="<?php echo isset($info['part_num3']) ? $info['part_num3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc3" value="<?php echo isset($info['disc3']) ? $info['disc3'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des4" value="<?php echo isset($info['des4']) ? $info['des4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num4" value="<?php echo isset($info['part_num4']) ? $info['part_num4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total4" value="<?php echo isset($info['total4']) ? $info['total4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc4" value="<?php echo isset($info['disc4']) ? $info['disc4'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des5" value="<?php echo isset($info['des5']) ? $info['des5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price5" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num5" value="<?php echo isset($info['part_num5']) ? $info['part_num5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total5" value="<?php echo isset($info['total5']) ? $info['total5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc5" value="<?php echo isset($info['disc5']) ? $info['disc5'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td><input type="text" name="des6" value="<?php echo isset($info['des6']) ? $info['des6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty6" value="<?php echo isset($info['qty6']) ? $info['qty6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num6" value="<?php echo isset($info['part_num6']) ? $info['part_num6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total6" value="<?php echo isset($info['total6']) ? $info['total6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc6" value="<?php echo isset($info['disc6']) ? $info['disc6'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des7" value="<?php echo isset($info['des7']) ? $info['des7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price7" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty7" value="<?php echo isset($info['qty7']) ? $info['qty7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num7" value="<?php echo isset($info['part_num7']) ? $info['part_num7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total7" value="<?php echo isset($info['total7']) ? $info['total7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc7" value="<?php echo isset($info['disc7']) ? $info['disc7'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des8" value="<?php echo isset($info['des8']) ? $info['des8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty8" value="<?php echo isset($info['qty8']) ? $info['qty8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num8" value="<?php echo isset($info['part_num8']) ? $info['part_num8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total8" value="<?php echo isset($info['total8']) ? $info['total8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc8" value="<?php echo isset($info['disc8']) ? $info['disc8'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des9" value="<?php echo isset($info['des9']) ? $info['des9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price9" value="<?php echo isset($info['price9']) ? $info['price9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty9" value="<?php echo isset($info['qty9']) ? $info['qty9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num9" value="<?php echo isset($info['part_num9']) ? $info['part_num9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total9" value="<?php echo isset($info['total9']) ? $info['total9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc9" value="<?php echo isset($info['disc9']) ? $info['disc9'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des10" value="<?php echo isset($info['des10']) ? $info['des10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price10" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty10" value="<?php echo isset($info['qty10']) ? $info['qty10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num10" value="<?php echo isset($info['part_num10']) ? $info['part_num10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total10" value="<?php echo isset($info['total10']) ? $info['total10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc10" value="<?php echo isset($info['disc10']) ? $info['disc10'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des11" value="<?php echo isset($info['des11']) ? $info['des11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price11" value="<?php echo isset($info['price11']) ? $info['price11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty11" value="<?php echo isset($info['qty11']) ? $info['qty11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num11" value="<?php echo isset($info['part_num11']) ? $info['part_num11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total11" value="<?php echo isset($info['total11']) ? $info['total11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc11" value="<?php echo isset($info['disc11']) ? $info['disc11'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				<tr>
					<td><input type="text" name="des12" value="<?php echo isset($info['des12']) ? $info['des12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price12" value="<?php echo isset($info['price12']) ? $info['price12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty12" value="<?php echo isset($info['qty12']) ? $info['qty12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num12" value="<?php echo isset($info['part_num12']) ? $info['part_num12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total12" value="<?php echo isset($info['total12']) ? $info['total12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc12" value="<?php echo isset($info['disc12']) ? $info['disc12'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des13" value="<?php echo isset($info['des13']) ? $info['des13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price13" value="<?php echo isset($info['price13']) ? $info['price13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty13" value="<?php echo isset($info['qty13']) ? $info['qty13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num13" value="<?php echo isset($info['part_num13']) ? $info['part_num13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total13" value="<?php echo isset($info['total13']) ? $info['total13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc13" value="<?php echo isset($info['disc13']) ? $info['disc13'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des14" value="<?php echo isset($info['des14']) ? $info['des14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price14" value="<?php echo isset($info['price14']) ? $info['price14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty14" value="<?php echo isset($info['qty14']) ? $info['qty14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num14" value="<?php echo isset($info['part_num14']) ? $info['part_num14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total14" value="<?php echo isset($info['total14']) ? $info['total14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc14" value="<?php echo isset($info['disc14']) ? $info['disc14'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des15" value="<?php echo isset($info['des15']) ? $info['des15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price15" value="<?php echo isset($info['price15']) ? $info['price15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty15" value="<?php echo isset($info['qty15']) ? $info['qty15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num15" value="<?php echo isset($info['part_num15']) ? $info['part_num15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total15" value="<?php echo isset($info['total15']) ? $info['total15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc15" value="<?php echo isset($info['disc15']) ? $info['disc15'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des16" value="<?php echo isset($info['des16']) ? $info['des16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price16" value="<?php echo isset($info['price16']) ? $info['price16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty16" value="<?php echo isset($info['qty16']) ? $info['qty16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num16" value="<?php echo isset($info['part_num16']) ? $info['part_num16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc16" value="<?php echo isset($info['disc16']) ? $info['disc16'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des17" value="<?php echo isset($info['des17']) ? $info['des17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price17" value="<?php echo isset($info['price17']) ? $info['price17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty17" value="<?php echo isset($info['qty17']) ? $info['qty17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num17" value="<?php echo isset($info['part_num17']) ? $info['part_num17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total17" value="<?php echo isset($info['total17']) ? $info['total17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc17" value="<?php echo isset($info['disc17']) ? $info['disc17'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des18" value="<?php echo isset($info['des18']) ? $info['des18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price18" value="<?php echo isset($info['price18']) ? $info['price18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty18" value="<?php echo isset($info['qty18']) ? $info['qty18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num18" value="<?php echo isset($info['part_num18']) ? $info['part_num18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total18" value="<?php echo isset($info['total18']) ? $info['total18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc18" value="<?php echo isset($info['disc18']) ? $info['disc18'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des19" value="<?php echo isset($info['des19']) ? $info['des19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price19" value="<?php echo isset($info['price19']) ? $info['price19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty19" value="<?php echo isset($info['qty19']) ? $info['qty19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num19" value="<?php echo isset($info['part_num19']) ? $info['part_num19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total19" value="<?php echo isset($info['total19']) ? $info['total19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc19" value="<?php echo isset($info['disc19']) ? $info['disc19'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><input type="text" name="des20" value="<?php echo isset($info['des20']) ? $info['des20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="price20" value="<?php echo isset($info['price20']) ? $info['price20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="qty20" value="<?php echo isset($info['qty20']) ? $info['qty20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="part_num20" value="<?php echo isset($info['part_num20']) ? $info['part_num20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="total20" value="<?php echo isset($info['total20']) ? $info['total20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" name="disc20" value="<?php echo isset($info['disc20']) ? $info['disc20'] : ''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
			</div>
			
			<!-- left end -->
			
			<div class="right" style="width: 30%; float: right; box-sizing: border-box; padding: 10px; border-bottom: 1px solid #000;">
				<div class="form-field m-t" style="float: left; width: 100%; margin: 206px 0 0;">
					<label><b>NOTES</b></label>
					<textarea id="term_notes" name="term_notes" style="width: 100%; height: 80px; border: 0;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>
				</div>
				<p style="float: left; width: 100%; margin: 2px 0; text-align: center;">Discounts offered at time of purchase exclude exhaust performance parts and oil</p>
				<div class="form-field" style="float: left; width: 100%;">
					
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 5px 0;">
					<label style="width: 65%; text-align: right; display: inline-block;"><b>TOTAL ACCESSORIES:</b></label>
					$<input type="text" name="total_access" class="total" id="total_access" value="<?php echo isset($info['total_access']) ? $info['total_access'] : ''; ?>" style="width: 30%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 5px 0;">
					<label style="width: 65%; text-align: right; display: inline-block;">TOTAL DISCOUNT:</label>
					<input type="text" name="total_count" class="total" id="total_count" value="<?php echo isset($info['total_count']) ? $info['total_count'] : ''; ?>" style="width: 33%;">
				</div>
				<div class="form-field" style="float: right; width: 100%; margin: 5px 0;">
					<label style="width: 65%; text-align: right; display: inline-block;">SUB TOTAL DUE:</label>
					<input type="text" name="sub_cal" id="sub_cal" value="<?php echo isset($info['sub_cal']) ? $info['sub_cal'] : ''; ?>" style="width: 33%;">
				</div>
			</div>	
		</div>
		
		
		<p style="float: left; width: 100%; padding: 10px; box-sizing: border-box; margin: 0; border-bottom: 1px solid #000;">At Norsask, we are dedicated to do our best. We strive to continually improve, and we are committed to customer service excellence! Please take a moment to respond to your sales survey, as this is how we evaluate our efforts to provide you with the top level customer service experience you expect from Norsask. We look forward to hearing your feedback by BRP's mailout survey; or feel free to go to our website at   www.norsaskfarmequipmentltd.com</p>
		
		<p style="float: left; width: 100%; padding: 3px; box-sizing: border-box; text-align: center; color: red; margin: 0; border-bottom: 1px solid #000;">WAIVER OF COVERAGE</p>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0 10px;">
			<div class="left" style="width: 60%; float: left; margin: 0; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="float: left;">&nbsp;</label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<ul style="margin: 0; padding: 0px;">
							<li> ACCEPT</li>
							<li>DECLINE</li>
							<li>N/A</li>
							<li>INITIAL</li>
						</ul>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="float: left;"><b>PAYMENT PROTECTION</b></label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<input type="text" name="payment" value="<?php echo isset($info['payment']) ? $info['payment'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="float: left;">FINANCING/LEASING</label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<ul style="margin: 0; padding: 0px;">
							<li><input type="checkbox" name="final_statu" value="accept" <?php echo ($info['final_statu'] == "accept") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="final_statu" value="decline" <?php echo ($info['final_statu'] == "decline") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="final_statu" value="na" <?php echo ($info['final_statu'] == "na") ? "checked" : ""; ?> /></li>
							<li>&nbsp;</li>
						</ul>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 30px 0 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="width: 35%; float: left;"><b>MECHANICAL/SAFETY</b></label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<input type="text" name="mechanical" value="<?php echo isset($info['mechanical']) ? $info['mechanical'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="float: left;">EXTENDED SERVICE</label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<ul style="margin: 0; padding: 0px;">
							<li><input type="checkbox" name="extend_status" value="accept" <?php echo ($info['extend_status'] == "accept") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="extend_status" value="decline" <?php echo ($info['extend_status'] == "decline") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="extend_status" value="na" <?php echo ($info['extend_status'] == "na") ? "checked" : ""; ?> /></li>
							<li>&nbsp;</li>
						</ul>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 40%">
						<label style="float: left;">PLATINUM TIRE & RIM:</label>
					</div>
					<div class="form-field list" style="float: left; width: 60%">
						<ul style="margin: 0; padding: 0px;">
							<li><input type="checkbox" name="platinum" value="accept" <?php echo ($info['platinum'] == "accept") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="platinum" value="decline" <?php echo ($info['platinum'] == "decline") ? "checked" : ""; ?> /></li>
							<li><input type="checkbox" name="platinum" value="na" <?php echo ($info['platinum'] == "na") ? "checked" : ""; ?> /></li>
							<li>&nbsp;</li>
						</ul>
					</div>
				</div> 
				
			</div>
			<!-- second-left-end -->
			
			
			<!-- second-right-start -->
			<div class="right" style="float: left; width: 40%; padding: 10px; box-sizing: border-box; padding: 10px;">
				In order to comply with Federal disclosure laws, we ask that you read and sign the waiver form to the left. Doing this will ensure you are aware of the various services and/or protection packages available to you and your new purchase.        
			</div>
			<!-- second-right-end -->
		</div>
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
	function calculate_row_total($this){
		var pri = isNaN(parseFloat( $($this).find('td:eq(1) input').val()))?0.00:parseFloat($($this).find('td:eq(1) input').val());
		var qt =isNaN(parseFloat($($this).find('td:eq(2) input').val()))?0.00:parseFloat($($this).find('td:eq(2) input').val());
		$($this).find('td:eq(4) input').val(qt * pri.toFixed(2));
		var disc = isNaN(parseFloat($($this).find('td:eq(5) input').val()))?0.00:parseFloat($($this).find('td:eq(5) input').val());
		var total = isNaN(parseFloat($($this).find('td:eq(4) input').val()))?0.00:parseFloat($($this).find('td:eq(4) input').val()); 
		if (disc) {
			if (disc == 1) {
				var total_dis = total/10;
				$("#total_count").val(total_dis.toFixed(2));
			}
			else {
				var total_dis = total*2/10
				$("#total_count").val(total_dis.toFixed(2));
			}
		}
 	}

	$(".left table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_row_total($this);
		calculate_totalaccess($this);
	});
	function calculate_totalaccess($this) {
		var hey = 0.00;
		var count = 0;
		$('.left table tr').each(function() {
			var total = $(this).find('td:eq(4) input').val();
			if (total) {
		        total = total == "" ? 0.00 : parseFloat(total);
		        hey += total;
		        console.log("total_access: " + hey);
				$("#total_access").val(hey.toFixed(2));
			}
			var total_access =isNaN(parseFloat( $('#total_access').val()))?0.00:parseFloat($('#total_access').val());
			var total_count =isNaN(parseFloat( $('#total_count').val()))?0.00:parseFloat($('#total_count').val());	
			var sub_total = total_access - total_count;
			$("#sub_cal").val(sub_total.toFixed(2));
		
		})
	}
	//calculate();
});
</script>
</div>
