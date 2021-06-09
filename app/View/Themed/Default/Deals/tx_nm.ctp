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
$email = AuthComponent::user('email');

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
	<div id="worksheet_container" style="width: 1028px; margin:0 auto; font-size: 12px;">
	<style>



	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 3px;}
	
@media print {
	.first_section {margin-top: 5px !important;}
	.dontprint{display: none;}
	.print_color {-webkit-print-color-adjust: exact;}
	}
	</style>

	<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}
      
      $address = array('1'=>'Fulton Bank, N.A.','2'=>'P.O. Box 398050','3'=>'Minneapolis, MN 55439','4'=>'Huntington National Bank','5'=>'2361 Morse Rd','6'=>'Columbus, OH 43229','7'=>'U.S. Bank','8'=>'P.O Box 3427','9'=>'Oshkosh, WI, 54903','10'=>'Medallion Bank','11'=>'1100 East 6600 South Suite 510','12'=>'Salt Lake City, UT, 84121','13'=>'Merrick Bank');
      $selected_address=array('1'=>'Fulton Bank, N.A.',2=>5,3=>6,4=>9);

?>

	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="logo" style="float: left; width: 17%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-pharr.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="center" style="width: 57%; float: left;">
				<div class="row" style="float: left; width: 38%; margin: 3px 180px;">
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">320 N. LOOP 289</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">LUBBOCK, TEXAS 79403</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">806-765-6088</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">1-800-952-2389</p>
					<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0; text-align: center;">FAX 806-765-9541</p>
				</div>
			</div>
			
			<div class="right" style="float: right;  width: 26%;">
				<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 17px;"><b>Ref # </b><input type="text" name="ref" value="<?php echo $info['contact_id']; ?>" style="width: 70%;font-size: 15px; font-weight: 700; border-bottom: 0px;"></h2>
				<h2 style="float: left; width: 100%; margin: 4px 0; font-size: 17px;"><b>Date:</b><input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 70%;font-size: 15px; font-weight: 700; border-bottom: 0px;"></h2>
				<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0;">Salesperson: <input type="text" name="Salesperson" value="<?php echo isset($info['Salesperson']) ? $info['Salesperson'] : $info['sperson']; ?>" style="width: 54%;font-size: 15px; border-bottom: 0px;"></p>
				<p style="float: left; width: 100%; font-size: 15px; margin: 3px 0;">Email: <input type="text" name="sales_person_email" value="<?php echo $sales_person_info['User']['email']; ?>" style="width: 79%;font-size: 14px; border-bottom: 0px;"></p>
			</div>
		</div>
		
		<div class="row first_section" style="float: left; width: 100%; margin: 3px 0; padding-bottom: 7px; border: 1px solid #000; box-sizing: border-box; border: 1px solid #000;margin-top: 20px;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<label style="float: left; width: 8%; margin: 4px 8px; font-size: 16px;"><b>Customer</b></label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 68%;">
			</div>
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 78%;">
					<label style="width: 10%; text-align: right; float: left;">Address</label>
					<input type="text" name="address_data" value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address']." ".$info['city']." ".$info['state']." ".$info['zip']; ?>" style="width: 88%; float: right;">
				</div>
				<div class="form-field" style="float: left; width: 22%;">
					<label style="width: 30%; text-align: right; float: left;">Phone (h)</label>
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
			<h2 class="print_color" style="float: left; width: 100%; margin: 0; color: black; font-size: 16px; padding: 3px; box-sizing: border-box; border-bottom: 1px solid #000;background-color: #7aa2e2 !important;"><b>Description of Purchase</b></h2>
			
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
					<input type="text" name="stock_no" value="<?php echo isset($info['stock_no']) ? $info['stock_no'] : ''; ?>" style="width: 63%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 17%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>Mileage:</label>
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 63%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 18%; border-right: 1px solid #000; padding: 2px; box-sizing: border-box;">
					<label>Color:</label>
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 73%; border-bottom: 0px;">
				</div>
				
				<div class="form-field" style="float: left; width: 18%; padding: 2px; box-sizing: border-box;">
					<label>Weight:</label>
					<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 68%; border-bottom: 0px;">
				</div>
			</div>	
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-left" style="float: left; width: 40%; box-sizing: border-box;">
				<div class="first" style="width: 100%; box-sizing: border-box; border: 1px solid #000; float: left;">
					<h3 class="print_color" class="bg" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Added Equipment</b></h3>
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option1" value="<?php echo isset($info['asses_option1']) ? $info['asses_option1'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<input type="text" id="accessories1" class="price" name="accessories1" value="<?php echo isset($info['accessories1']) ? $info['accessories1'] : ''; ?>" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option2" value="<?php echo isset($info['asses_option2']) ? $info['asses_option2'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<input type="text" id="accessories2" class="price" name="accessories2" value="<?php echo isset($info['accessories2']) ? $info['accessories2'] : ''; ?>" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option3" value="<?php echo isset($info['asses_option3']) ? $info['asses_option3'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<input type="text" id="accessories3" class="price" name="accessories3" value="<?php echo isset($info['accessories3']) ? $info['accessories3'] : ''; ?>" style="width: 40%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 15px;">
						<input type="text" name="asses_option4" value="<?php echo isset($info['asses_option4']) ? $info['asses_option4'] : ''; ?>" style="text-align: center;width: 48%; float: left; margin-right: 15px;">
						<input type="text" id="accessories4" class="price" name="accessories4" value="<?php echo isset($info['accessories4']) ? $info['accessories4'] : ''; ?>" style="width: 40%; float: left;">
					</div>
				</div>
				
				<div class="second" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000; margin: 3px 0;">
					<h3 class="bg print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Trade</b></h3>
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
						<input type="text" id="allowance1" class="price" name="allowance1" value="<?php echo isset($info['allowance1']) ? $info['allowance1'] : ''; ?>" style="width: 70%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Payoff</label>
						<input type="text" id="payoff1" class="price" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : ''; ?>" style="width: 70%; float: left;">
					</div>
				</div>
				
				<div class="third" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000;">
					<h3 class="bg print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Trade</b></h3>
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
						<input type="text" id="allowance2" class="price" name="allowance2" value="<?php echo isset($info['allowance2']) ? $info['allowance2'] : ''; ?>" style="width: 70%; float: left;">
					</div>
					
					<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
						<label style="float: left; width: 25%; text-align: right;">Payoff</label>
						<input type="text" name="payoff2" id="payoff2" class="price" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : ''; ?>" style="width: 70%; float: left;">
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
				</div>
			</div>
			<!-- leftside end -->
			
			
			<!-- right side start -->
			<div class="right-side" style="float: right; width: 56%; margin: 0;">
				<div class="first" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000;">
					<h3 class="print_color" class="bg" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px;"><b>Selling Price Summary</b></h3>
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="font-size: 17px; float: left; padding: 0 3px; margin-right: 51%;"><b>State</b></label>
						<select name="state" id="state" class="form-control" style="width: 30%; float: right;text-align: right;">
			    			<option value="1">TX</option>
			    			<option value="2">NM</option>
				   		</select>
					</div>

					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="font-size: 17px; float: left; padding: 0 3px; margin-right: 51%;"><b>Sales Price</b></label>
						$<input type="text" id="sales_price" class="price" name="sales_price" value="<?php echo isset($info['sales_price']) ? $info['sales_price'] : ''; ?>" style="width: 30%; float: right;text-align: right;">
					</div>

					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Added Equipment</label>
							$<input type="text" id="optional_equipment" class="price" name="optional_equipment" value="<?php echo isset($info['optional_equipment']) ? $info['optional_equipment'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Less Trade In</label>
							$<input type="text" id="trade_in" class="price" name="trade_in" value="<?php echo isset($info['trade_in']) ? $info['trade_in'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Trade Difference</label>
							$<input type="text" id="trade_diff" class="price" name="trade_diff" value="<?php echo isset($info['trade_diff']) ? $info['trade_diff'] : ''; ?>"  style="width: 30%; float: right;">
						</div>
					</div>

					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%; ">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Payoff Amount</label>
							$<input type="text" id="payoff" class="price" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : ''; ?>"  style="width: 30%; float: right;">
						</div>
					</div>
					
					
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="font-size: 17px; float: left; padding: 0 3px; margin-right: 60%;"><b>Total</b></label>
						$<input type="text" id="total" class="price" name="total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 30%; float: right; text-align: right;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Sales Tax</label>
							%<input type="text" name="sales_tax" id="sales_tax" class="price" value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] : '6.25'; ?>" style="width: 13%;" value="">$
							<input type="text" id="sales_amount" name="sales_amount" class="price" value="<?php echo isset($info['sales_amount']) ? $info['sales_amount'] : ''; ?>" style="width: 14%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Inventory Tax</label>
							%<input type="text" name="invent_tax" id="invent_tax" class="price" value="<?php echo isset($info['invent_tax']) ? $info['invent_tax'] : '0.1876'; ?>" style="width: 13%;" value="">$
							<input type="text" id="invent_amount" name="invent_amount" class="price" value="<?php echo isset($info['invent_amount']) ? $info['invent_amount'] : ''; ?>" style="width: 14%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Title & Registration</label>
							$<input type="text" id="title_fee" class="price" name="title_fee" value="<?php echo isset($info['title_fee']) ? $info['title_fee'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">State Inspection</label>
							$<input type="text" id="state_fee" class="price" name="state_fee" value="<?php echo isset($info['state_fee']) ? $info['state_fee'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Doc. Fee</label>
							$<input type="text" id="doc_fee" class="price" name="doc_fee" value="<?php echo isset($info['doc_fee']) ? $info['doc_fee'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<label style="font-size: 17px; float: left; padding: 0 3px; margin-right: 57.3%;"><b>TOTAL</b></label>
						$<input type="text" id="total_amount" class="price" name="total_amount" value="<?php echo isset($info['total_amount']) ? $info['total_amount'] : ''; ?>"  style="width: 30%; float: right; text-align: right;">
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Service Contract</label>
							$<input type="text" id="service_contract" class="price" name="service_contract" value="<?php echo isset($info['service_contract']) ? $info['service_contract'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Cash Down</label>
							$<input type="text" id="cash_down" class="price" name="cash_down" value="<?php echo isset($info['cash_down']) ? $info['cash_down'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>

					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Financed Amount</label>
							$<input type="text" id="finance_amt" class="price" name="finance_amt" value="<?php echo isset($info['finance_amt']) ? $info['finance_amt'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>

					<div class="row" style="float: left; width: 100%; margin: 2px 0;">
						<div class="form-field" style="float: let; width: 100%;">
							<label style="float: left; width: 50%; text-align: right; margin-right: 18%;">Loan Amount</label>
							$<input type="text" id="bal" class="price" name="bal" value="<?php echo isset($info['bal']) ? $info['bal'] : ''; ?>" style="width: 30%; float: right;">
						</div>
					</div>
				</div>

				<div class="second" style="width: 100%; float: left; box-sizing: border-box; border: 1px solid #000; margin-top: 3px;">
					<h3 class="bg print_color" style="border-bottom: 1px solid #000; margin: 0; padding: 3px; font-size: 16px; background-color: #7aa2e2 !important;"><b>Loan Information</b></h3>
					<div class="lower" style="float: left; width: 100%; margin: 0; border-top: 1px solid #000;">
						<div class="left" style="float: left; width: 60%;">
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 25%; text-align: right;">Interest Rate: </label>
								<input type="text" name="apr" id="apr" value="<?php echo isset($info['apr']) ? $info['apr'] : '5.00'; ?>" style="width: 35%; float: left;">%
							</div>
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 28%; text-align: right; margin-top: 5px;">Term (Months):</label>
								<select name="payment_option1" class="form-control price_options" style="width:35%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
								<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
								<?php } ?></select>
							</div>
						</div>
						
						<div class="left" style="float: left; width: 40%;">
							<div class="form-field" style="float: left; width: 100%; margin: 4px 0;">
								<label style="float: left; width: 100%; text-align: center; font-size: 18px;"><b>Approx. Payment, W.A.C</b></label>
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
		calculate_totalinvoice();
	});

	function calculate_totalinvoice() {
		var sales_price = isNaN(parseFloat( $('#sales_price').val()))?0.00:parseFloat($('#sales_price').val());
		var accessories1 = isNaN(parseFloat( $('#accessories1').val()))?0.00:parseFloat($('#accessories1').val());
		var accessories2 = isNaN(parseFloat( $('#accessories2').val()))?0.00:parseFloat($('#accessories2').val());
		var accessories3 = isNaN(parseFloat( $('#accessories3').val()))?0.00:parseFloat($('#accessories3').val());
		var accessories4 = isNaN(parseFloat( $('#accessories4').val()))?0.00:parseFloat($('#accessories4').val());
		var optional_equipment = accessories1 + accessories2 + accessories3 + accessories4;
		$("#optional_equipment").val(optional_equipment.toFixed(2));

		var trade_in = isNaN(parseFloat( $('#trade_in').val()))?0.00:parseFloat($('#trade_in').val());
		var trade_diff = isNaN(parseFloat( $('#trade_diff').val()))?0.00:parseFloat($('#trade_diff').val());
		var payoff = isNaN(parseFloat( $('#payoff').val()))?0.00:parseFloat($('#payoff').val());
		var total = sales_price + optional_equipment + trade_in + trade_diff + payoff;
		$("#total").val(total.toFixed(2));
		var sales_tax = (6.25/100) * total;
		$("#sales_amount").val(sales_tax.toFixed(2));
		var inv_tax = (0.1876/100) * total;
		$("#invent_amount").val(inv_tax.toFixed(2));

		var title = isNaN(parseFloat( $('#title').val()))?0.00:parseFloat($('#title').val());
		var regist = isNaN(parseFloat( $('#regist').val()))?0.00:parseFloat($('#regist').val());
		var license = isNaN(parseFloat( $('#license').val()))?0.00:parseFloat($('#license').val());
		var transfer = isNaN(parseFloat( $('#transfer').val()))?0.00:parseFloat($('#transfer').val());
		var tag = isNaN(parseFloat( $('#tag').val()))?0.00:parseFloat($('#tag').val());
		var lien = isNaN(parseFloat( $('#lien').val()))?0.00:parseFloat($('#lien').val());
		var mail = isNaN(parseFloat( $('#mail').val()))?0.00:parseFloat($('#mail').val());
		var misc = isNaN(parseFloat( $('#misc').val()))?0.00:parseFloat($('#misc').val());

		var title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());
		var state_fee = isNaN(parseFloat( $('#state_fee').val()))?0.00:parseFloat($('#state_fee').val());
		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());

		var total_amount = total + sales_tax + inv_tax + title_fee + state_fee + doc_fee;
		$("#total_amount").val(total_amount.toFixed(2));

		var service_contract = isNaN(parseFloat( $('#service_contract').val()))?0.00:parseFloat($('#service_contract').val());
		var cash_down = isNaN(parseFloat( $('#cash_down').val()))?0.00:parseFloat($('#cash_down').val());
		var finance_amt = isNaN(parseFloat( $('#finance_amt').val()))?0.00:parseFloat($('#finance_amt').val());
		var bal = total_amount + service_contract - cash_down + finance_amt;
		$("#bal").val(bal.toFixed(2));
	}

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
