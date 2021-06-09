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
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 2px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 0px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px; text-align: center;}
	th, td{text-align: center; padding: 6px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 28% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; margin: 0;">

		<div class="row" style="float: left; width: 100%; margin: 0; padding-bottom: 10px; border-bottom: 2px solid #000;">
			<div class="logo" style="float: left; width: 100%; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/jeery-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 70%;">
				<label><b>NAME</b></label>
				<input type="text" name="customer_name" value="<?php echo isset($contact['Contact']['customer_name']) ? $contact['Contact']['customer_name'] : $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>DATE</b></label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 86%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>ADDRESS</b></label>
				<input type="text" name="address" value="<?php echo $contact['Contact']['address']; ?>" style="width: 84%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>EMAIL</b></label>
				<input type="text" name="email" value="<?php echo $contact['Contact']['email']; ?>" style="width: 89%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>CITY</b></label>
				<input type="text" name="city" value="<?php echo $contact['Contact']['city']; ?>" style="width: 90%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>STATE</b></label>
				<input type="text" name="state" value="<?php echo $contact['Contact']['state']; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>ZIP</b></label>
				<input type="text" name="zip" value="<?php echo $contact['Contact']['zip']; ?>" style="width: 87%;">
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>PHONE</b></label>
				<input type="text" name="phone" value="<?php echo $contact['Contact']['phone']; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label><b>CELL PHONE</b></label>
				<input type="text" name="mobile" value="<?php echo $contact['Contact']['mobile']; ?>" style="width: 80%;">
			</div>
		</div>
		
		<table cellspacing="0" cellpadding="0" width="100%;">
			<tr>
				<th style="width: 10%;"><b>YEAR</b></th>
				<th style="width: 50%;">
					<label style="display: inline-block; width: 25%;"><b>NEW</b></label>
					<label style="display: inline-block; width: 48%;"><b>DESCRIPITION</b></label>
					<label style="display: inline-block; width: 25%;"><b>USED</b></label>
				</th>
				<th style="width: 17%;"><b>VIN</b></th>
				<th style="width: 23%;"><b>MISCELLANEOUS</b></th>
			</tr>
			
			<tr>
				<td><input type="text" name="year" value="<?php echo $contact['Contact']['year']; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new1" value="<?php echo isset($info['new1'])?$info['new1']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip1" value="<?php echo isset($info['descrip1'])?$info['descrip1']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used1" value="<?php echo isset($info['used1'])?$info['used1']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin" value="<?php echo $contact['Contact']['vin']; ?>" style="width: 100%;"></td>
				<td><b>ACCESSORIES / ADD ONS:</b></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new2" value="<?php echo isset($info['new2'])?$info['new2']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip2" value="<?php echo isset($info['descrip2'])?$info['descrip2']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used2" value="<?php echo isset($info['used2'])?$info['used2']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin2" value="<?php echo isset($info['vin2'])?$info['vin2']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell2" value="<?php echo isset($info['miscell2'])?$info['miscell2']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year3" value="<?php echo isset($info['year3'])?$info['year3']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new3" value="<?php echo isset($info['new3'])?$info['new3']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip3" value="<?php echo isset($info['descrip3'])?$info['descrip3']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used3" value="<?php echo isset($info['used3'])?$info['used3']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin3" value="<?php echo isset($info['vin3'])?$info['vin3']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell3" value="<?php echo isset($info['miscell3'])?$info['miscell3']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year4" value="<?php echo isset($info['year4'])?$info['year4']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new4" value="<?php echo isset($info['new4'])?$info['new4']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip4" value="<?php echo isset($info['descrip4'])?$info['descrip4']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used4" value="<?php echo isset($info['used4'])?$info['used4']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin4" value="<?php echo isset($info['vin4'])?$info['vin4']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell4" value="<?php echo isset($info['miscell4'])?$info['miscell4']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year5" value="<?php echo isset($info['year5'])?$info['year5']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new5" value="<?php echo isset($info['new5'])?$info['new5']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip5" value="<?php echo isset($info['descrip5'])?$info['descrip5']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used5" value="<?php echo isset($info['used5'])?$info['used5']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin5" value="<?php echo isset($info['vin5'])?$info['vin5']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell5" value="<?php echo isset($info['miscell5'])?$info['miscell5']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year6" value="<?php echo isset($info['year6'])?$info['year6']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new6" value="<?php echo isset($info['new6'])?$info['new6']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip6" value="<?php echo isset($info['descrip6'])?$info['descrip6']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used6" value="<?php echo isset($info['used6'])?$info['used6']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin6" value="<?php echo isset($info['vin6'])?$info['vin6']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell6" value="<?php echo isset($info['miscell6'])?$info['miscell6']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year7" value="<?php echo isset($info['year7'])?$info['year7']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new7" value="<?php echo isset($info['new7'])?$info['new7']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip7" value="<?php echo isset($info['descrip7'])?$info['descrip7']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used7" value="<?php echo isset($info['used7'])?$info['used7']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin7" value="<?php echo isset($info['vin7'])?$info['vin7']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell7" value="<?php echo isset($info['miscell7'])?$info['miscell7']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year8" value="<?php echo isset($info['year8'])?$info['year8']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new8" value="<?php echo isset($info['new8'])?$info['new8']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip8" value="<?php echo isset($info['descrip8'])?$info['descrip8']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used8" value="<?php echo isset($info['used8'])?$info['used8']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin8" value="<?php echo isset($info['vin8'])?$info['vin8']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell8" value="<?php echo isset($info['miscell8'])?$info['miscell8']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year9" value="<?php echo isset($info['year9'])?$info['year9']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new9" value="<?php echo isset($info['new9'])?$info['new9']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip9" value="<?php echo isset($info['descrip9'])?$info['descrip9']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used9" value="<?php echo isset($info['used9'])?$info['used9']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin9" value="<?php echo isset($info['vin9'])?$info['vin9']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell9" value="<?php echo isset($info['miscell9'])?$info['miscell9']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year10" value="<?php echo isset($info['year10'])?$info['year10']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new10" value="<?php echo isset($info['new10'])?$info['new10']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip10" value="<?php echo isset($info['descrip10'])?$info['descrip10']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="used10" value="<?php echo isset($info['used10'])?$info['used10']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin10" value="<?php echo isset($info['vin10'])?$info['vin10']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell10" value="<?php echo isset($info['miscell10'])?$info['miscell10']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year11" value="<?php echo isset($info['year11'])?$info['year11']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new11" value="<?php echo isset($info['new11'])?$info['new11']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip11" value="<?php echo isset($info['descrip11'])?$info['descrip11']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="descrip12" value="<?php echo isset($info['descrip12'])?$info['descrip12']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin11" value="<?php echo isset($info['vin11'])?$info['vin11']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell11" value="<?php echo isset($info['miscell11'])?$info['miscell11']:''; ?>" style="width: 100%;"></td>
			</tr>
			
			<tr>
				<td><input type="text" name="year12" value="<?php echo isset($info['year12'])?$info['year12']:''; ?>" style="width: 100%;"></td>
				<td>
					<label style="display: inline-block; width: 25%;"><input type="text" name="new12" value="<?php echo isset($info['new12'])?$info['new12']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 48%;"><input type="text" name="descrip12" value="<?php echo isset($info['descrip12'])?$info['descrip12']:''; ?>" style="width: 100%;"></label>
					<label style="display: inline-block; width: 25%;"><input type="text" name="descrip13" value="<?php echo isset($info['descrip13'])?$info['descrip13']:''; ?>" style="width: 100%;"></label>
				</td>
				<td><input type="text" name="vin112" value="<?php echo isset($info['vin112'])?$info['vin112']:''; ?>" style="width: 100%;"></td>
				<td><input type="text" name="miscell12" value="<?php echo isset($info['miscell12'])?$info['miscell12']:''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="left" style="width: 70%; float: left; border-right: 1px solid #000; box-sizing: border-box;">
				<div class="upper" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 5px;">
							<label>SIGNATURE</label>
							<span style="display: inline-block; border-bottom: 1px solid #000; width: 40%; margin-left: 10px;">X <input type="text" name="sign_x1" value="<?php echo isset($info['sign_x1'])?$info['sign_x1']:''; ?>" style="width: 90%; border: 0px;"></span>
							<span style="display: inline-block; border-bottom: 1px solid #000; margin-left: 10px; width: 40%;">X <input type="text" name="sign_x2" value="<?php echo isset($info['sign_x2'])?$info['sign_x2']:''; ?>" style="width: 90%; border: 0px;"></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0 0 20px;">
						<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 5px;">
							<label>INS. INFO</label>
							<input type="text" name="ins_info" value="<?php echo isset($info['ins_info'])?$info['ins_info']:''; ?>" style="width: 85%;"> 
						</div>
					</div>
				</div>
				
				<div class="lower" style="float: left; width: 100%; border-bottom: 1px solid #000;">
					<h2 style="float: left; width: 98%; margin: 3px 0; text-align: center; padding: 10px 0; font-size: 16px; border-bottom: 1px solid #000;"><b>TRADE IN</b></h2>
					
					<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
						<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 5px;">
							<label>YEAR</label>
							<input type="text" name="year_trade" value="<?php echo $contact['Contact']['year_trade']; ?>" style="width: 78%;"> 
						</div>
						<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 5px;">
							<label>MAKE</label>
							<input type="text" name="make_trade" value="<?php echo $contact['Contact']['make_trade']; ?>" style="width: 78%;"> 
						</div>
						<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 5px;">
							<label>MODEL</label>
							<input type="text" name="model_trade" value="<?php echo $contact['Contact']['model_trade']; ?>" style="width: 72%;"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 10px 0;">
						<div class="form-field" style="float: left; width: 60%; box-sizing: border-box; padding: 5px;">
							<label>ALLOWANCE</label>
							<input type="text" name="allowance_trade" value="<?php echo $contact['Contact']['allowance_trade']; ?>" style="width: 76%;"> 
						</div>
						<div class="form-field" style="float: left; width: 40%; box-sizing: border-box; padding: 5px;">
							<label>PAYOFF</label>
							<input type="text" name="payoff_trade" value="<?php echo $contact['Contact']['payoff_trade']; ?>" style="width: 75%;"> 
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 15px 0;">
						<div class="form-field" style="float: left; width: 98%; box-sizing: border-box; padding: 5px;">
							<label>LIEN HOLDER</label>
							<input type="text" name="lien_trade" value="<?php echo $contact['Contact']['lien_trade']; ?>" style="width: 85%;"> 
						</div>
					</div>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 30%; border-bottom: 1px solid;">
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">DEAL PRICE</label>
					$<input type="text" name="deal_price" id="deal_price" class="price" value="<?php echo $contact['Contact']['deal_price']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
			
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">TRADE ALLOW</label>
					$<input type="text" name="trade_allow" id="trade_allow" class="price" value="<?php echo $contact['Contact']['trade_allow']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">DIFFERENCE</label>
					$<input type="text" name="differ" id="differ" class="price" value="<?php echo $contact['Contact']['differ']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">ACCESSORIES</label>
					$<input type="text" name="access" id="access" class="price" value="<?php echo $contact['Contact']['access']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">CASH DOWN</label>
					$<input type="text" name="cash_down" id="cash_down" class="price" value="<?php echo $contact['Contact']['cash_down']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">PAY OFF</label>
					$<input type="text" name="payoff" id="payoff" class="price" value="<?php echo $contact['Contact']['payoff']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">TAX/LICENSE</label>
					$<input type="text" name="license" id="license" class="price" value="<?php echo $contact['Contact']['license']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding: 5px;">
					<label style="width: 40%; display: inline-block;">AMOUNT TO FINANCE</label>
					$<input type="text" name="amount" id="amount" class="price" value="<?php echo $contact['Contact']['amount']; ?>" style="border-bottom: 1px solid #000; width: 55%;"> 
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0; border-bottom: 2px solid #000; padding-bottom: 10px;">
			<div class="form-field" style="width: 33%; float: left;">
				<label>DELIVERY DATE</label>
				<input type="text" name="delivery_date" value="<?php echo $contact['Contact']['delivery_date']; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 34%; float: left;">
				<label>PREP DATE</label>
				<input type="text" name="prep_date" value="<?php echo $contact['Contact']['prep_date']; ?>" style="width: 73%;">
			</div>
			<div class="form-field" style="width: 33%; float: left;">
				<label>BY</label>
				<input type="text" name="by" value="<?php echo $contact['Contact']['by']; ?>" style="width: 92%;">
			</div>
		</div>
		
		<h1 style="float: left; width: 100%; margin: 3px 0; text-align: center; font-size: 60px; color: black; font-family: sans-serif; word-spacing: 5px;"><b>www.jerrystrailers.com</b></h1>
		
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

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});

	function calculate_totalprice() {
		
		var deal_price = isNaN(parseFloat( $('#deal_price').val()))?0.00:parseFloat($('#deal_price').val());
		var trade_allow = isNaN(parseFloat( $('#trade_allow').val()))?0.00:parseFloat($('#trade_allow').val());
		var differ = deal_price - trade_allow;
		$("#differ").val(differ.toFixed(2));
		var differ = isNaN(parseFloat( $('#differ').val()))?0.00:parseFloat($('#differ').val());
		var access = isNaN(parseFloat( $('#access').val()))?0.00:parseFloat($('#access').val());
		var cash_down = isNaN(parseFloat( $('#cash_down').val()))?0.00:parseFloat($('#cash_down').val());
		var payoff = isNaN(parseFloat( $('#payoff').val()))?0.00:parseFloat($('#payoff').val());
		var license = isNaN(parseFloat( $('#license').val()))?0.00:parseFloat($('#license').val());
		var amount = differ + access - cash_down - payoff + license;
		$("#amount").val(amount.toFixed(2));
	}


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
