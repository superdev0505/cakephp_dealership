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
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 20px 20px 10px; border: 1px solid #000; border-bottom: 0px;">
			<div class="inner" style="float: left; width: 100%; box-sizing: border-box; padding: 3px 7px 16px 7px; border: 1px solid #000;">
				<div class="upper" style="float: left; width: 100%;">
					<div class="left" style="float: left; width: 10%; font-size: 10px">
						MVD - 10009 <br> REV. 05/13
					</div>
					<div class="right" style="float: left; width: 90%; text-align: center; box-sizing: border-box; padding-right: 8%;">
						<p style="float: left; width: 100%; margin: 0 0 5px; font-size: 17px;">STATE OF NEW MEXICO - TAXATION & REVENUE DEPARTMENT <br> MOTOR VEHICLE DIVISION</p>
					</div>
				</div>
				
				<div class="lower" style="float: left; width: 100%; height: 60px;">
					<div class="left" style="float: left; width: 23%;">
						<i>ANY ALTERATIONS OR <br> ERASURES WILL VOID <br> THIS DOCUMENT!</i>
					</div>
					<div class="center" style="float: left;  width: 60%; box-sizing: border-box; padding: 0 90px;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bill-of-sale.jpg'); ?>" alt="" style="width: 100%;">
					</div>
					<div class="right" style="float: right; width: 13%; position: relative; bottom: 34px; box-sizing: border-box; padding: 14px;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bill-of-sale-round.jpg'); ?>" alt="" style="width: 100%;">
					</div>
				</div>
			</div>
			<p style="float: left; width: 100%; margin: 4px 0; text-align: center; font-size: 15px; text-decoration: underline;"><b>BEFORE FILLING OUT FORM CAREFULLY READ INSTRUCTIONS ON REVERSE SIDE</b></p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 75%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<h2 style="float: left; width: 100%; text-align: center; font-size: 18px; margin: 12px 0;"><b>VEHICLE OR VESSEL INFORMATION</b></h2>
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
				<label>Exact Sale Amount:</label>
				$ <input type="text" name="exact_sale"  value="<?php echo isset($info['exact_sale']) ? $info['exact_sale'] :  ''; ?>" style="width: 90%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 15%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Year:</label>
				<input type="text" name="year"  value="<?php echo isset($info['year']) ? $info['year'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Make:</label>
				<input type="text" name="make"  value="<?php echo isset($info['make']) ? $info['make'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Model:</label>
				<input type="text" name="model"  value="<?php echo isset($info['model']) ? $info['model'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
				<label>Body Type (series):</label>
				<input type="text" name="body"  value="<?php echo isset($info['body']) ? $info['body'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
					
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Engine Number (if Applicable)</label>
				<input type="text" name="engine"  value="<?php echo isset($info['engine']) ? $info['engine'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Vehicle or Hull Identifiation (Serial) Number</label>
				<input type="text" name="vehicle_in"  value="<?php echo isset($info['vehicle_in']) ? $info['vehicle_in'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; box-sizing: border-box; padding: 3px;">
				<label>License Plate or Vessel Registration Number:</label>
				<input type="text" name="license"  value="<?php echo isset($info['license']) ? $info['license'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000;">
			<div class="form-field" style="float: left; width: 20%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>State:</label>
				<input type="text" name="state"  value="<?php echo isset($info['state']) ? $info['state'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Overall Vessel Length:</label>
				<input type="text" name="overall1"  value="<?php echo isset($info['overall1']) ? $info['overall1'] :  ''; ?>" style="width: 38%;"> FT.
				<input type="text" name="overall2"  value="<?php echo isset($info['overall2']) ? $info['overall2'] :  ''; ?>" style="width: 38%;"> IN.
			</div>
			<div class="form-field" style="float: left; width: 30%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label style="display: block;">Vessel Beam Width:</label>
				<input type="text" name="vessel_beam1"  value="<?php echo isset($info['vessel_beam1']) ? $info['vessel_beam1'] :  ''; ?>" style="width: 40%;"> FT.
				<input type="text" name="vessel_beam2"  value="<?php echo isset($info['vessel_beam2']) ? $info['vessel_beam2'] :  ''; ?>" style="width: 40%;"> IN.
			</div>
			<div class="form-field" style="float: left; width: 25%; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Vessel Transom Depth:</label>
				<input type="text" name="vessel_transom1"  value="<?php echo isset($info['vessel_transom1']) ? $info['vessel_transom1'] :  ''; ?>" style="width: 38%;"> FT.
				<input type="text" name="vessel_transom2"  value="<?php echo isset($info['vessel_transom2']) ? $info['vessel_transom2'] :  ''; ?>" style="width: 38%;"> IN.
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 10px;">
			<h2 style="float: left; width: 100%; margin: 0 0 7px; text-align: center; font-size: 16px;">VEHICLE ODOMETER DISCLOSURE STATEMENT</h2>
			<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">Federal and State Law Requires the Transferor (Seller) of a Vehicle to State the Odometer Mileage Upon Transfer of Ownership. Anyone Convicted of a Fraudulent Odometer Statement Will be Subject to Fines and/or imprisonment.</p>
			
			<div class="inner" style="width: 90%; margin: 7px auto;">
				<p style="float: left; width: 100%; margin: 3px 0; font-size: 14px;">I (we) hereby certify that the ODOmeter Reading of the vehicle described above is: <input type="text" name="title1"  value="<?php echo isset($info['title1']) ? $info['title1'] :  ''; ?>" style="width: 30%; border-bottom: 1px solid #000;"> (no tenths) miles and that to the best of my knowledge stated mileage is (check one of the following):</p>
				
				<div class="row" style="float: left; width: 100%; margin: 12px 0 0;">
					<div class="form-field" style="float: left; width: 33%;">
						<label><input type="checkbox" name="mileage1_check" <?php echo ($info['mileage1_check'] == "mileage1") ? "checked" : ""; ?> value="mileage1" style="width: 40px; height: 40px;"> <b style="position: relative; bottom: 14px; display: inline-block;">THE ACTUAL <br> MILEAGE (AM)<sup></sup>*</b></label>
						<label style="display: block;"><sup>*</sup> = Mileage Codes</label>
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label><input type="checkbox" name="mileage2_check" <?php echo ($info['mileage2_check'] == "mileage2") ? "checked" : ""; ?> value="mileage2" style="width: 40px; height: 40px;"> <b style="position: relative; bottom: 14px; display: inline-block;">MILEAGE IN EXCESS OF  <br> MECHANICAL LIMITS (EL)<sup></sup>*</b></label>
					</div>
					<div class="form-field" style="float: left; width: 33%;">
						<label><input type="checkbox" name="mileage3_check" <?php echo ($info['mileage3_check'] == "mileage3") ? "checked" : ""; ?> value="mileage3" style="width: 40px; height: 40px;"> <b style="position: relative; bottom: 0px; display: inline-block;">WARNING<br> NOT THE ACTUAL MILEAGE <br> ODOMETER DISCREPANCY (NM)<sup></sup>*</b></label>
					</div>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 5px 0;">
				<div class="left" style="float: left; width: 49%; margin: 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Seller(s) Printed Name</label>
						<input type="text" name="seller1"  value="<?php echo isset($info['seller1']) ? $info['seller1'] :  ''; ?>" style="width: 53%; border-bottom: 1px solid #000;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%;">
						<label>Date</label>
						<input type="text" name="seller1_date"  value="<?php echo isset($info['seller1_date']) ? $info['seller1_date'] :  ''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
					</div>
				</div>
				
				<div class="left" style="float: left; width: 49%; margin: 0;">
					<div class="form-field" style="float: left; width: 70%;">
						<label>Seller(s) Signature</label>
						<input type="text" name="seller2"  value="<?php echo isset($info['seller2']) ? $info['seller2'] :  ''; ?>" style="width: 60%; border-bottom: 1px solid #000;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%;">
						<label>Date</label>
						<input type="text" name="seller2_date"  value="<?php echo isset($info['seller2_date']) ? $info['seller2_date'] :  ''; ?>" style="width: 70%; border-bottom: 1px solid #000;">
					</div>
				</div>
			</div>
			
			<p style="float: left; width: 100%; margin: 7px 0 0; text-align: center; font-size: 15px;">SELLER MUST REMOVE PLATE BEFORE TRANSFERRING OWNERSHIP OF THIS VEHICLE</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; padding: 6px 10px; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<b>NOTE: THE Division Is Not Responsible For False Or Fraudulent Statements Made In Connection With This ransfer Of Ownership Or Held Liable For Recording Errors.</b>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 75%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>DEALERSHIP NAME type or print</label>
				<input type="text" name="dealership"  value="<?php echo isset($info['dealership']) ? $info['dealership'] :  'RV Sales of New Mexico'; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Dealer License Number</label>
				<input type="text" name="dealer_num"  value="<?php echo isset($info['dealer_num']) ? $info['dealer_num'] :  '036'; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 75%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>LIENHOLDER NUMBER(S) type or print</label>
				<input type="text" name="lienholder"  value="<?php echo isset($info['lienholder']) ? $info['lienholder'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Lienholder Number</label>
				<input type="text" name="lienholder_num"  value="<?php echo isset($info['lienholder_num']) ? $info['lienholder_num'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 75%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Address</label>
				<input type="text" name="address"  value="<?php echo isset($info['address']) ? $info['address'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">File Date</label>
				<input type="text" name="file_date"  value="<?php echo isset($info['file_date']) ? $info['file_date'] :  ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="city"  value="<?php echo isset($info['city']) ? $info['city'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>State</label>
				<input type="text" name="state"  value="<?php echo isset($info['state']) ? $info['state'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Zip Code</label>
				<input type="text" name="zip"  value="<?php echo isset($info['zip']) ? $info['zip'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 25%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label style="display: block;">Maturity Date:</label>
				<input type="text" name="maturity"  value="<?php echo isset($info['maturity']) ? $info['maturity'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 75%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>SELLER'S NAME(S) IF PRIVATE SALE</label>
				<input type="text" name="private_sale"  value="<?php echo isset($info['private_sale']) ? $info['private_sale'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 75%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Address</label>
				<input type="text" name="address1"  value="<?php echo isset($info['address1']) ? $info['address1'] :  '2109 RT 66'; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 33%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>City</label>
				<input type="text" name="city1"  value="<?php echo isset($info['city1']) ? $info['city1'] :  'Moriarty'; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>State</label>
				<input type="text" name="state1"  value="<?php echo isset($info['state1']) ? $info['state1'] :  'NM'; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Zip Code</label>
				<input type="text" name="zip1"  value="<?php echo isset($info['zip1']) ? $info['zip1'] :  '87035'; ?>" style="width: 100%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; padding: 6px;">
			<p style="padding: 4px 12px; margin: 0; font-size: 14px;">For the Exact Amount Indicated, I (We) Hereby Sell, Transfer and Convey the Vehicle or Vessel Described Above, Warrant It to be Free of Anny Liens or Encumbrances and Certify that All Information Given is True and Correct to the Best of My (Our) Knowledge.</p>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px;">
			<div class="form-field" style="float: left; width: 38%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>First Seller's Signature</label>
				<input type="text" name="firstseller_sign"  value="<?php echo isset($info['seller_sign']) ? $info['seller_sign'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Date</label>
				<input type="text" name="firstseller_date"  value="<?php echo isset($info['firstseller_date']) ? $info['firstseller_date'] :  ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Second Seller's Signature (if Joint Ownership)</label>
				<input type="text" name="secondseller_sign"  value="<?php echo isset($info['secondseller_sign']) ? $info['secondseller_sign'] :  ''; ?>" style="width: 100%;">
			</div>
			
			<div class="form-field" style="float: left; width: 12%; padding: 3px; box-sizing: border-box; padding: 3px;">
				<label>Date</label>
				<input type="text" name="secondseller_date"  value="<?php echo isset($info['secondseller_date']) ? $info['secondseller_date'] :  ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-top: 0px; margin-bottom: 10px;">
			<div class="left" style="float: left; width: 78%; box-sizing: border-box; border-right: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; padding: 3px; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;">
					<label>BUYER'S NAME(S)</label>
					<input type="text" name="buyer_name"  value="<?php echo isset($info['buyer_name']) ? $info['buyer_name'] :  ''; ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; padding: 3px; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;">
					<label>Address</label>
					<input type="text" name="buyer_address"  value="<?php echo isset($info['buyer_address']) ? $info['buyer_address'] :  ''; ?>" style="width: 100%;">
				</div>
				<div class="row" style="float: left; width: 100%; box-sizing: border-box; margin: 0;">
					<div class="form-field" style="float: left; width: 33%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>City</label>
						<input type="text" name="buyer_city"  value="<?php echo isset($info['buyer_city']) ? $info['buyer_city'] :  ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 34%; padding: 3px; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
						<label>State</label>
						<input type="text" name="buyer_state"  value="<?php echo isset($info['buyer_state']) ? $info['buyer_state'] :  ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: left; width: 33%; padding: 3px; box-sizing: border-box; padding: 3px;">
						<label>Zip Code</label>
						<input type="text" name="buyer_zip"  value="<?php echo isset($info['buyer_zip']) ? $info['buyer_zip'] :  ''; ?>" style="width: 100%;">
					</div>
				</div>
			</div>
			<div class="right" style="float: left; width: 22%; box-sizing: border-box; padding: 3px 9px;">
				<h4 style="float: left; width: 100%; margin: 0; text-align: center; font-size: 16px;"><b>IMPORTANT</b></h4>
				<p style="float: left; width: 100%; margin: 3px 0; text-align: justify;">There is an Additional Statutory Fee for Failure by Purchaser to Apply for Transfer Within 30 Days form Date of Sale.</p>
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
