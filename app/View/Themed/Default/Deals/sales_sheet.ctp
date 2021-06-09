<?php
$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');
$dealer_id =$cid;
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
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;

?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container">
    
	<style>



	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	.bg{background-color: #7aa2e2; color: black;}
	
@media print {
	.first_section {margin-top: 5px !important;}
	.dontprint{display: none;}
	.bg{background-color: blue !important;}
	p {font-size: 10px !important;}
	h2 {font-size: 13px !important;}
	.center {width: 55% !important;}
	.header_section1 {width: 30% !important;}
	.header_section2 {width: 26% !important;}
	.header_section3 {width: 38% !important;}
	.header_section4 {width: 26% !important;}

	.right-side input {width: 29% !important;}
	
	.des2 {margin-right: 11.5% !important;}
	
	
	.right-side .row {margin: 0px !important;}
	 label {font-size: 12px !important;}
	.phone_label {width: 33% !important;}
	.first_section .row {margin: 0px !important;}
	.print_color {padding: 0px !important; -webkit-print-color-adjust: exact; height: 25px !important;}
	.first_section {margin: 0px !important;}
	.form-left .first .form-field {margin: 0px 15px !important;}
	.form-left .middle .form-field {margin: 0px 15px !important;}
	.form-left .second .form-field {margin: 0px 15px !important;}
	.form-left .third .form-field {margin: 0px 15px !important;}
	}
	</style>

	<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
	$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

	$apr = array('6'=>'6','7'=>'7','8.87'=>'8.875','8.75'=>'8.750','6.62'=>'6.625','8'=>'8','3.75'=>'3.75','4.25'=>'4.25');
	$selected_apr=array('1'=>'6',2=>7,3=>8.875,4=>8.750);

	if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
	{
		$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
	}
      
    $company = array('Cash'=>'','Other Lien Holder'=>'','Not Applicable'=>'','Fulton Bank, N.A.'=>'P.O. Box 398050 Minneapolis, MN 55439','Huntington National Bank'=>'2361 Morse Rd Columbus, OH 43229','U.S. Bank'=>'P.O Box 3427 Oshkosh, WI, 54903','Medallion Bank'=>'1100 East 6600 South Suite 510 Salt Lake City, UT, 84121','Merrick Bank'=>'10705 South Jordan Gateway, Suite 200 South Jordan, UT 84095','Members 1 st Federal Credit Union'=>'P.O Box 24046 Ft. Worth, TX 76124','American Heritage Federal Credit Union'=>'2060 Red Lion Rd. Philadelphia, PA 19115','Bank of America'=>'P.O. Box 2759 Jacksonville, FL 32203-2759','First Commonwealth FCU'=>'PO Box 20450 Lehigh Valley, PA 18002-0450','Ally Financial'=>'PO BOX 8143 Cockeysville, MD 21030','Bank of the West'=>'P.O Box 2497 Omaha, NE 68103');
?>
	
	<!-- worksheet start -->
	<div class="wraper header">
		 	<input name="contact_id" type="hidden"  value="<?php echo $contact['Contact']['id']; ?>" />
				 <?php  if($edit){?>
					<input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
					<?php } ?>
					<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
					<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
					<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
					<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
					<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
					<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
					<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
					<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
					<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
					<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
					<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
					<input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
					 <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  /> 
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="logo" style="float: left; width: 14%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-rv.png'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="center" style="width: 60%; float: left;">
				<h2 style="float: left; width: 100%; margin: 0px; font-size: 20px; text-align: center;">
					<input type="text" name="buyer" id="buyer" list="title" value="Buyers Order" style="width: 40%; font-weight: 700; font-size: 14px; border-bottom: 0px; text-align: center;">
						<datalist id="title">
							<option value="Buyers Order">
							<option value="Quote Only">
						</datalist>
				</h2>

				<div class="row header_section1" style="float: left; width: 30%; margin: 0px 3px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">LITITZ LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">647 East 28th Div Hyw</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">Lititz, Pennsylvania 17543</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">(717)283-4522</p>
				</div>

				<div class="row header_section2" style="float: left; width: 28%; margin: 0px 3px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">MANHELM LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">3152 Lebanon Rd.</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">Manheim, PA 17545</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">(717)283-4522</p>
				</div>
				
				<div class="row header_section3" style="float: left; width: 38%; margin: 0px 3px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">WILLOW STREET LOCATION</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">2718 Willow Street Pike</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">Willow Street, PA 17584</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 0px; text-align: center;">(717)283-4522</p>
				</div>
			</div>
			
			<div class="right header_section4" style="float: right;  width: 26%;">
				<p style="float: left; width: 100%; font-size: 15px; margin: 0px;">Ref #: <input type="text" name="ref" value="<?php echo $info['contact_id']; ?>" style="width: 70%; border-bottom: 0px;"></p>
				<p style="float: left; width: 100%; font-size: 15px; margin: 0px;">Date:<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%; border-bottom: 0px;"></p>
				<p style="float: left; width: 100%; font-size: 15px; margin: 0px;">Salesperson: <input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 54%; border-bottom: 0px;"></p>
				<p style="float: left; width: 100%; font-size: 15px; margin: 0px;">Email: <input type="text" name="sales_person_email" value="<?php echo $sales_person_info['User']['email']; ?>" style="width: 79%; border-bottom: 0px;"></p>
			</div>
		</div>
		
		<div class="row first_section" style="float: left; width: 100%; margin: 3px 0; padding-bottom: 7px; border: 1px solid #000; box-sizing: border-box; border: 1px solid #000;margin-top: 7px;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<label style="float: left; width: 8%; margin: 4px 8px; font-size: 16px;"><b>Customer</b></label>
				<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 68%;">
			</div>
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 78%;">
					<label style="width: 10%; text-align: right; float: left;">Address</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 88%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label class="phone_label" style="width: 30% !important; text-align: right; float: left;">Phone</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 70%; float: right;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 78%;">
					<input type="text" name="address_data1" value="<?php echo isset($info['address_data1']) ? $info['address_data1'] : ''; ?>" style="width: 88%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label style="width: 15%; text-align: right; display: inline-block; float: left;">(c)</label>
					<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 70%; float: right;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 78%;">
					<label style="width: 10%; text-align: right; float: left;">E-Mail:</label>
					<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 88%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label style="width: 15%; text-align: right; float: left;">(w)</label>
					<input type="text" name="work_number" value="<?php echo isset($info['work_number']) ? $info['work_number'] : ''; ?>" style="width: 70%; float: right;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 78%;">
					<label style="width: 10%; text-align: right; float: left;">Country:</label>
					<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 88%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label style="width: 15%; text-align: right; float: left;">(f)</label>
					<input type="text" name="f_number" value="<?php echo isset($info['f_number']) ? $info['f_number'] : ''; ?>" style="width: 70%; float: right;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
			<h2 class="print_color" style="float: left; width: 100%; margin: 0; color: black; font-size: 16px; box-sizing: border-box; padding: 3px; border-bottom: 1px solid #000;background-color: #7aa2e2 !important;"><b>Description of Purchase</b></h2>
			
			<div class="form=field" style="float: left; width: 100%; margin: 0;">
				<input type="text" name="vehicle_info" value="<?php echo isset($info['vehicle_info'])?$info['vehicle_info']:$info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 100%; margin: 3px 0 0;">
			</div>
			<div class="row" style="float: left; width: 100%; margin: 0;">
				<div class="form-field" style="float: left; width: 30%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>VIN:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 80%; border-bottom: 0px;">
				</div>
				<div class="form-field" style="float: left; width: 17%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>Stock #:</label>
					<input type="text" name="stock_no" value="<?php echo isset($info['stock_no']) ? $info['stock_no'] : ''; ?>" style="width: 45%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 17%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>Mileage:</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 45%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 18%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>Color:</label>
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 60%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 18%; padding: 2px; box-sizing: border-box;">
					<label>Weight:</label>
					<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 58%; border-bottom: 0px;">
				</div>
			</div>	
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-left" style="float: left; width: 43%; box-sizing: border-box;">
				<div class="first" style="width: 100%; box-sizing: border-box; border: 1px solid #000; float: left;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Optional Equipment & Accessories</b></h3>
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option1" value="<?php echo isset($info['asses_option1']) ? $info['asses_option1'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="accessories1" class="price" name="accessories1" value="0.00" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option2" value="<?php echo isset($info['asses_option2']) ? $info['asses_option2'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="accessories2" class="price" name="accessories2" value="0.00" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option3" value="<?php echo isset($info['asses_option3']) ? $info['asses_option3'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="accessories3" class="price" name="accessories3" value="0.00" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option4" value="<?php echo isset($info['asses_option4']) ? $info['asses_option4'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="accessories4" class="price" name="accessories4" value="0.00" style="width: 40%; float: left;">
					</div>
				</div>

				<div class="middle" style="width: 100%; box-sizing: border-box; border: 1px solid #000; float: left; margin-top: 3px;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>After Market</b></h3>
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="market_option1" value="<?php echo isset($info['market_option1']) ? $info['market_option1'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="market1" class="price" name="market1" value="0.00"style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="market_option2" value="<?php echo isset($info['market_option2']) ? $info['market_option2'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="market2" class="price" name="market2" value="0.00"style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="market_option3" value="<?php echo isset($info['market_option3']) ? $info['market_option3'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="market3" class="price" name="market3" value="0.00"style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="market_option4" value="<?php echo isset($info['market_option4']) ? $info['market_option4'] : ''; ?>" style="text-align: center; width: 48%; float: left; margin-right: 15px;">
						<label style="float: left;">$</label><input type="text" id="market4" class="price" name="market4" value="0.00"style="width: 40%; float: left;">
					</div>
				</div>
				
				<div class="second" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000; margin: 3px 0;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Trade</b></h3>
					<div class="form=field" style="float: left; width: 100%; margin: 0; padding: 3px 0">
						<input type="text" name="trade_info" value="<?php echo isset($info['trade_info'])?$info['trade_info']:$info['year_trade']." ".$info['make_trade']." ".$info['model_trade']; ?>" style="width: 100%; margin: 3px 0 0;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">VIN #</label>
						<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 70%; float: left;;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Odometer </label>
						<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="width: 70%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Allowance</label>
						<input type="text" id="allowance1" class="price" name="trade_value" value="0.00" style="width: 70%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Payoff</label>
						<input type="text" id="payoff1" class="price" name="payoff1" value="0.00" style="width: 70%; float: left;">
					</div>
				</div>
				
				<div class="third" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Trade</b></h3>
					<div class="form=field" style="float: left; width: 100%; margin: 0; padding: 3px 0">
						<input type="text" name="trade_info_addon" value="<?php echo isset($info['trade_info_addon'])?$info['trade_info_addon']:$info['year_addon1_trade']." ".$info['make_addon1_trade']." ".$info['model_id_addon1_trade']; ?>" style="width: 100%; margin: 3px 0 0;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">VIN #</label>
						<input type="text" name="vin_addon1_trade" value="<?php echo isset($info['vin_addon1_trade']) ? $info['vin_addon1_trade'] : ''; ?>" style="width: 70%; float: left;;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Odometer </label>
						<input type="text" name="odometer_addon1_trade" value="<?php echo isset($info['odometer_addon1_trade']) ? $info['odometer_addon1_trade'] : ''; ?>" style="width: 70%; float: left;;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Allowance</label>
						<input type="text" id="allowance2" class="price" name="allowance2" value="0.00" style="width: 70%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Payoff</label>
						<input type="text" name="payoff2" id="payoff2" class="price" value="0.00" style="width: 70%; float: left;">
					</div>
				</div>
				
				
				
				<div class="last" style="width: 100%; float: left; box-sizing: border-box;">
					<div class="row" style="float: left; width: 100%; margin: 8px 0 4px;">
						<div class="form-field" style="float: left; width: 75%; margin: 4px 0;">
							<input type="text" name="manager_sign" value="<?php echo isset($info['manager_sign']) ? $info['manager_sign'] : ''; ?>" style="width: 100%;">
							<label>Manager Signature</label>
						</div>
						
						<div class="form-field" style="float: left; width: 25%; margin: 4px 0;">
							<input type="text" name="manager_date" value="<?php echo isset($info['manager_date']) ? $info['manager_date'] : ''; ?>" style="width: 100%; float: left;">
							<label>Date</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 75%; margin: 4px 0;">
							<input type="text" name="buyer_sign" value="<?php echo isset($info['buyer_sign']) ? $info['buyer_sign'] : ''; ?>" style="width: 100%;">
							<label>Buyer Signature</label>
						</div>
						
						<div class="form-field" style="float: left; width: 25%; margin: 4px 0;">
							<input type="text" name="buyer_date" value="<?php echo isset($info['buyer_date']) ? $info['buyer_date'] : ''; ?>" style="width: 100%; float: left;">
							<label>Date</label>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 75%; margin: 4px 0;">
							<input type="text" name="buyer_sign1" value="<?php echo isset($info['buyer_sign1']) ? $info['buyer_sign1'] : ''; ?>" style="width: 100%;">
							<label>Buyer Signature</label>
						</div>
						
						<div class="form-field" style="float: left; width: 25%; margin: 4px 0;">
							<input type="text" name="buyer_date1" value="<?php echo isset($info['buyer_date1']) ? $info['buyer_date1'] : ''; ?>" style="width: 100%; float: left;">
							<label>Date</label>
						</div>
					</div>	
				</div>
			</div>
			<!-- leftside end -->
			
			
			<!-- right side start -->
			<div class="right-side" style="float: right; width: 56%; margin: 0;">
				<div class="first" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Selling Price Summary</b></h3>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label class="selling_price" style="font-size: 17px; float: left; padding: 0 3px; margin-right: 51%;"><b>Sales Price</b></label>
						$<input type="text" id="unit_value" class="price" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : '0.00'; ?>" style="width: 30%; float: right;text-align: right;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Discount</label>
							$<input type="text" id="discount" class="price" name="discount" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<input type="text" class="des2" name="des2" value="<?php echo isset($info['des2']) ? $info['des2'] : ''; ?>" style="width: 31.3%;margin-left: 110px;text-align: right;font-size: 14px; margin-right: 16.7%;">
							$<input type="text" id="na2" class="price" name="na2" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Trade Allowance(s)</label>
							$<input type="text" id="allowance_value" class="price" name="allowance_value" value="0.00"  style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Optional Equipment & Accessories</label>
							$<input type="text" id="optional_equipment" class="price" name="optional_equipment" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label class="net_selling" style="font-size: 17px; float: left; padding: 0 3px; margin-right: 43.5%;"><b>Net Selling Price</b></label>
						$<input type="text" id="net_selling" class="price" name="net_selling" value="0.00" style="width: 30%; float: right; text-align: right;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Pre-Delivery PKG</label>
							$<input type="text" id="pre_delivery" class="price" name="pre_delivery" value="399.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Registration</label>
							$<input type="text" id="registration" class="price" name="registration" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Title Fee</label>
							$<input type="text" id="title" class="price" name="title" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Plate Fee</label>
							$<input type="text" id="plate_fee" class="price" name="plate_fee" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Lien Fee</label>
							$<input type="text" id="lien_fee" class="price" name="lien_fee" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Transfer Fee</label>
							$<input type="text" id="transfer_fee" class="price" name="transfer_fee" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; margin: 0;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Increase Fee</label>
							$<input type="text" id="increase_fee" class="price" name="increase_fee" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Replacement Fee</label>
							$<input type="text" id="replacement_fee" class="price" name="replacement_fee" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Handling Fee/Plate Fee</label>
							$<input type="text" id="handling_fee" class="price" name="handling_fee" value="286.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">After Market</label>
							$<input type="text" id="after_market" class="price" name="after_market" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Local Use Fee</label>
							$<input type="text" id="local_fee" class="price" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Sales Tax</label>
							%<input type="text" name="default" id="default" value="<?php echo isset($info['default']) ? $info['default'] : ''; ?>" list="languages" style="width: 13% !important;" value="">
								<datalist id="languages">
									<option value="6">
									<option value="7">
									<option value="8.875">
									<option value="8.750">
									<option value="6.625">
									<option value="8">
									<option value="3.75">
									<option value="4.25">
								</datalist>$
							<input type="text" id="sales_amt" class="price" name="sales_amt" value="0.00" style="width: 11% !important; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Trade Payoff(s)</label>
							$<input type="text" id="trade_payoff" class="price" name="trade_payoff" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label class="total_amt" style="font-size: 17px; float: left; padding: 0 3px; margin-right: 41.6%;"><b>Total Amount Due</b></label>
						$<input type="text" id="total_amount" class="price" name="total_amount" value="0.00"  style="width: 30%; float: right; text-align: right;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Less Down Payment</label>
							$<input type="text" id="less_down" class="price" name="less_down" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Less Deposit</label>
							$<input type="text" id="less_deposi" class="price" name="less_deposi" value="0.00" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label class="balance_amt" style="font-size: 17px; float: left; padding: 0 3px; margin-right: 33.5%;"><b>Balance of Amount Due</b></label>
						$<input type="text" id="bal" class="price" name="balance" value="0.00" style="width: 30%; float: right; text-align: right;">
					</div>
				</div>
				
				<div class="second" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000; margin-top: 3px;">
					<h3 class="print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Loan Information</b></h3>
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 25%; text-align: right; margin-top: 5px;">Finance Company:</label>
						<select name="company" id="company" class="form-control" style="width:60%;"><?php foreach($company as $key=>$value){ ?>
								<option value="<?php echo $value; ?>"><?php echo $key; ?></option>
								<?php } ?></select>
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 2px 0;">
						<label style="float: left; width: 25%; text-align: right;">Address: </label>
						<input type="text" name="finance_address" id="finance_address" class="input20" value="<?php echo isset($info['finance_address']) ? $info['finance_address'] : ''; ?>" style="width: 70%;">
					</div>
					
					<div class="lower" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000;">
						<div class="left" style="float: left; width: 60%;">
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 25%; text-align: right; margin-top: 5px;">APR: </label>
								<input name="loan_apr" type="text" id="apr" class="input12" value="5.00" placeholder="" style="width: 83px;"/>
								%
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 25%; text-align: right; margin-top: 5px;">Term:</label>
								<select name="payment_option1" class="form-control price_options" style="width:35%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
								<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
								<?php } ?></select>
							</div>
						</div>
						
						<div class="left" style="float: left; width: 40%;">
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 100%; text-align: center; font-size: 18px;"><b>Monthy Payment</b></label>
								<input type="text" name="payment" id="option1_price" class="input20 options_price" value="<?php echo isset($info['payment']) ? $info['payment'] : ''; ?>" style="width: 50%;margin-left: 55px;">
							</div>
						</div>
					</div>
				</div>
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
		<select name="deal_status_id" id="deal_status_id" class="form-control pull-right" style="width: auto; display: inline-block; margin-left:5px;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
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

	$("#company").on('change keyup paste', function(){
		var finance_address = $(this).val();
		$("#finance_address").val(finance_address);
	});

	$(".price").on('change keyup paste', function(){
		calculate_totalprice();
	});

	$("#default").on('input', function () {
	   	$(".price").trigger('change');
	});

	var sales_price = <?php  echo (!empty($info['unit_value']))? $info['unit_value']  : "0.00" ;   ?>;

	var sales_price = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		var na2 = isNaN(parseFloat( $('#na2').val()))?0.00:parseFloat($('#na2').val());
		var allowance1 = isNaN(parseFloat( $('#allowance1').val()))?0.00:parseFloat($('#allowance1').val());
		var allowance2 = isNaN(parseFloat( $('#allowance2').val()))?0.00:parseFloat($('#allowance2').val());
		var allowance = allowance1 + allowance2;
		if (allowance > 0) {
			$("#allowance_value").val(allowance.toFixed(2));
		}
		var allowance_value = isNaN(parseFloat( $('#allowance_value').val()))?0.00:parseFloat($('#allowance_value').val());
		var optional_equipment = isNaN(parseFloat( $('#optional_equipment').val()))?0.00:parseFloat($('#optional_equipment').val());
		var accessories1 = isNaN(parseFloat( $('#accessories1').val()))?0.00:parseFloat($('#accessories1').val());
		var accessories2 = isNaN(parseFloat( $('#accessories2').val()))?0.00:parseFloat($('#accessories2').val());
		var accessories3 = isNaN(parseFloat( $('#accessories3').val()))?0.00:parseFloat($('#accessories3').val());
		var accessories4 = isNaN(parseFloat( $('#accessories4').val()))?0.00:parseFloat($('#accessories4').val());
		var optional_equipment = accessories1 + accessories2 + accessories3 + accessories4;
		if (optional_equipment > 0) {
			$("#optional_equipment").val(optional_equipment.toFixed(2));
		}
		var market1 = isNaN(parseFloat( $('#market1').val()))?0.00:parseFloat($('#market1').val());
		var market2 = isNaN(parseFloat( $('#market2').val()))?0.00:parseFloat($('#market2').val());
		var market3 = isNaN(parseFloat( $('#market3').val()))?0.00:parseFloat($('#market3').val());
		var market4 = isNaN(parseFloat( $('#market4').val()))?0.00:parseFloat($('#market4').val());
		var after_market = market1 + market2 + market3 + market4;
		if (after_market > 0) {
			$("#after_market").val(after_market.toFixed(2));	
		}
		var net_selling = sales_price - allowance_value + optional_equipment - discount + na2;
		$("#net_selling").val(net_selling.toFixed(2));
		
		var pre_delivery = isNaN(parseFloat( $('#pre_delivery').val()))?0.00:parseFloat($('#pre_delivery').val());
		var registration = isNaN(parseFloat( $('#registration').val()))?0.00:parseFloat($('#registration').val());
		var title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());

		var plate_fee = isNaN(parseFloat( $('#plate_fee').val()))?0.00:parseFloat($('#plate_fee').val());
		var lien_fee = isNaN(parseFloat( $('#lien_fee').val()))?0.00:parseFloat($('#lien_fee').val());
		var transfer_fee = isNaN(parseFloat( $('#transfer_fee').val()))?0.00:parseFloat($('#transfer_fee').val());

		var increase_fee = isNaN(parseFloat( $('#increase_fee').val()))?0.00:parseFloat($('#increase_fee').val());
		var replacement_fee = isNaN(parseFloat( $('#replacement_fee').val()))?0.00:parseFloat($('#replacement_fee').val());
		var handling_fee = isNaN(parseFloat( $('#handling_fee').val()))?0.00:parseFloat($('#handling_fee').val());

		var local_fee = isNaN(parseFloat( $('#local_fee').val()))?0.00:parseFloat($('#local_fee').val());
		var sales_amt = isNaN(parseFloat( $('#sales_amt').val()))?0.00:parseFloat($('#sales_amt').val());


		var sales_amount = net_selling + pre_delivery + after_market;
		var sales_pro = parseFloat($('#default').val());

		var payoff1 = isNaN(parseFloat( $('#payoff1').val()))?0.00:parseFloat($('#payoff1').val());
		var payoff2 = isNaN(parseFloat( $('#payoff2').val()))?0.00:parseFloat($('#payoff2').val());
		var trade_payoff = payoff1 + payoff2;
		if (trade_payoff > 0) {
			$("#trade_payoff").val(trade_payoff.toFixed(2));	
		}
		var sales_tax = sales_amount/100*sales_pro;
		if (sales_pro > 0) {
			$("#sales_amt").val(sales_tax.toFixed(2));
		}
	
		if (sales_pro > 0) {
			var total_amount = net_selling + pre_delivery + registration + title_fee + plate_fee + lien_fee + transfer_fee + increase_fee + replacement_fee + handling_fee + after_market + local_fee + sales_tax + trade_payoff;
		}
		else {
			
			var total_amount = net_selling + pre_delivery + registration + title_fee + plate_fee + lien_fee + transfer_fee + increase_fee + replacement_fee + handling_fee + after_market + local_fee + trade_payoff + sales_amt;
		}

		$("#total_amount").val(total_amount.toFixed(2));

		var less_down = isNaN(parseFloat( $('#less_down').val()))?0.00:parseFloat($('#less_down').val());
		var less_deposi = isNaN(parseFloat( $('#less_deposi').val()))?0.00:parseFloat($('#less_deposi').val());
		var balance = total_amount - less_down - less_deposi;
		$("#bal").val(balance.toFixed(2));

	function calculate_totalprice() {
		
		var sales_price = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		var na2 = isNaN(parseFloat( $('#na2').val()))?0.00:parseFloat($('#na2').val());
		var allowance1 = isNaN(parseFloat( $('#allowance1').val()))?0.00:parseFloat($('#allowance1').val());
		var allowance2 = isNaN(parseFloat( $('#allowance2').val()))?0.00:parseFloat($('#allowance2').val());
		var allowance = allowance1 + allowance2;
		if (allowance > 0) {
			$("#allowance_value").val(allowance.toFixed(2));
		}
		var allowance_value = isNaN(parseFloat( $('#allowance_value').val()))?0.00:parseFloat($('#allowance_value').val());
		var optional_equipment = isNaN(parseFloat( $('#optional_equipment').val()))?0.00:parseFloat($('#optional_equipment').val());
		var accessories1 = isNaN(parseFloat( $('#accessories1').val()))?0.00:parseFloat($('#accessories1').val());
		var accessories2 = isNaN(parseFloat( $('#accessories2').val()))?0.00:parseFloat($('#accessories2').val());
		var accessories3 = isNaN(parseFloat( $('#accessories3').val()))?0.00:parseFloat($('#accessories3').val());
		var accessories4 = isNaN(parseFloat( $('#accessories4').val()))?0.00:parseFloat($('#accessories4').val());
		var optional_equipment = accessories1 + accessories2 + accessories3 + accessories4;
		if (optional_equipment > 0) {
			$("#optional_equipment").val(optional_equipment.toFixed(2));
		}
		var market1 = isNaN(parseFloat( $('#market1').val()))?0.00:parseFloat($('#market1').val());
		var market2 = isNaN(parseFloat( $('#market2').val()))?0.00:parseFloat($('#market2').val());
		var market3 = isNaN(parseFloat( $('#market3').val()))?0.00:parseFloat($('#market3').val());
		var market4 = isNaN(parseFloat( $('#market4').val()))?0.00:parseFloat($('#market4').val());
		var after_market = market1 + market2 + market3 + market4;
		if (after_market > 0) {
			$("#after_market").val(after_market.toFixed(2));	
		}
		var net_selling = sales_price - allowance_value + optional_equipment - discount + na2;
		$("#net_selling").val(net_selling.toFixed(2));
		
		var pre_delivery = isNaN(parseFloat( $('#pre_delivery').val()))?0.00:parseFloat($('#pre_delivery').val());
		var registration = isNaN(parseFloat( $('#registration').val()))?0.00:parseFloat($('#registration').val());
		var title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());

		var plate_fee = isNaN(parseFloat( $('#plate_fee').val()))?0.00:parseFloat($('#plate_fee').val());
		var lien_fee = isNaN(parseFloat( $('#lien_fee').val()))?0.00:parseFloat($('#lien_fee').val());
		var transfer_fee = isNaN(parseFloat( $('#transfer_fee').val()))?0.00:parseFloat($('#transfer_fee').val());

		var increase_fee = isNaN(parseFloat( $('#increase_fee').val()))?0.00:parseFloat($('#increase_fee').val());
		var replacement_fee = isNaN(parseFloat( $('#replacement_fee').val()))?0.00:parseFloat($('#replacement_fee').val());
		var handling_fee = isNaN(parseFloat( $('#handling_fee').val()))?0.00:parseFloat($('#handling_fee').val());

		var local_fee = isNaN(parseFloat( $('#local_fee').val()))?0.00:parseFloat($('#local_fee').val());
		var sales_amt = isNaN(parseFloat( $('#sales_amt').val()))?0.00:parseFloat($('#sales_amt').val());


		var sales_amount = net_selling + pre_delivery + after_market;
		var sales_pro = parseFloat($('#default').val());

		var payoff1 = isNaN(parseFloat( $('#payoff1').val()))?0.00:parseFloat($('#payoff1').val());
		var payoff2 = isNaN(parseFloat( $('#payoff2').val()))?0.00:parseFloat($('#payoff2').val());
		var trade_payoff = payoff1 + payoff2;
		if (trade_payoff > 0) {
			$("#trade_payoff").val(trade_payoff.toFixed(2));	
		}
		var sales_tax = sales_amount/100*sales_pro;
		if (sales_pro > 0) {
			$("#sales_amt").val(sales_tax.toFixed(2));
		}
	
		if (sales_pro > 0) {
			var total_amount = net_selling + pre_delivery + registration + title_fee + plate_fee + lien_fee + transfer_fee + increase_fee + replacement_fee + handling_fee + after_market + local_fee + sales_tax + trade_payoff;
		}
		else {
			
			var total_amount = net_selling + pre_delivery + registration + title_fee + plate_fee + lien_fee + transfer_fee + increase_fee + replacement_fee + handling_fee + after_market + local_fee + trade_payoff + sales_amt;
		}

		$("#total_amount").val(total_amount.toFixed(2));

		var less_down = isNaN(parseFloat( $('#less_down').val()))?0.00:parseFloat($('#less_down').val());
		var less_deposi = isNaN(parseFloat( $('#less_deposi').val()))?0.00:parseFloat($('#less_deposi').val());
		var balance = total_amount - less_down - less_deposi;
		$("#bal").val(balance.toFixed(2));
	}
	//calculate();
		if($('#apr').val() != "" && $('#apr').val() != null){
		calculateMonthWisePayments();
		}else {
			$('input[id^="paymentFor"]').val("");
		}
		var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
		$('#apr, .price').on('change keyup paste',function(){
			
			if(rx.test($('#apr').val())){
				calculateMonthWisePayments();
				}else{
						$('.options_price').val("");
				}
		 });

		$(".price_options").on('change',function(){
			span_id=$(this).attr('price-id')+'_span';
			$("#"+span_id).text($(this).val());	 
			calculateMonthWisePayments();	 
		});

		function calculateMonthWisePayments(){
			$(".price_options").each(function(){
				years=$(this).val()/12;
				pay_monthly=MonthwisePayments(years);
				price_field=$(this).attr('price-id');										  
				var payment = document.getElementById(price_field);
				payment.value = pay_monthly;
				  
			});
	 	}
	
		function MonthwisePayments(years)
		{
			var apr = parseFloat($('#apr').val());
			var principal = parseFloat($('#bal').val());
			var interest = parseFloat(apr) / 100 / 12;
			var payments = years * 12;
			var tax = parseFloat($('#tax').val());
			//var payment = document.getElementById(("paymentFor"+i).toString());
			var x = Math.pow(1 + interest, payments, tax);   // Math.pow() computes powers
				var monthly = (principal * x * interest) / (x - 1);
				// If the result is a finite number, the user's input was good and
				// we have meaningful results to display
				if (isFinite(monthly)) {
				// Fill in the output fields, rounding to 2 decimal places
				//payment.value = monthly.toFixed(2);
				return monthly.toFixed(2);
			}else{
				//payment.value = "";
				return "";
			}
		}
});

</script>
</div>
