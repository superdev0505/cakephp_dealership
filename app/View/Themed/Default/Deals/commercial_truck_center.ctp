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
	label{font-size: 14px; margin-bottom: 0;}
	.wraper.main input {padding: 0px;}
	li{list-style: none; display: inline-block; margin: 0 7%;}
	.rect input[type="text"]{border-bottom: 0px !important;}
@media print {
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="logo" style="width: 200px; margin: 20px auto;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-ctc.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 40%;">
				<label><b>BUYER</b></label>
				<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>DELIVERY DATE</b></label>
				<input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt']) ? $info['submit_dt'] : $expectedt; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label><b>STOCK #</b></label>
				<input type="text" name="stock" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label><b>CO-BUYER</b></label>
				<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer']) ? $info['co_buyer'] : ''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label><b>SALESMAN</b></label>
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 76%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="left rect" style="width: 40%; float: left;">	
				<div class="form-field" style="width: 100%;">
					<input type="text" name="signed" value="<?php echo isset($info['signed']) ? $info['signed'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>SIGNED CREDIT APPLICATION</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="privacy" value="<?php echo isset($info['privacy']) ? $info['privacy'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>PRIVACY NOTICE</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="license" value="<?php echo isset($info['license']) ? $info['license'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>DRIVERS LICENSE (ALL)</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="signed_owe" value="<?php echo isset($info['signed_owe']) ? $info['signed_owe'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>SIGNED WE OWE</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="appraisal" value="<?php echo isset($info['appraisal']) ? $info['appraisal'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>APPRAISAL</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="form_regist" value="<?php echo isset($info['form_regist']) ? $info['form_regist'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>FORM/REGISTRATION</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="pay_form" value="<?php echo isset($info['pay_form']) ? $info['pay_form'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>PAY-OFF FORM</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="guarantee" value="<?php echo isset($info['guarantee']) ? $info['guarantee'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>TITLE GUARANTEE/PAYOFF</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout1" value="<?php echo isset($info['bookout1']) ? $info['bookout1'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>USED CAR BOOKOUT(NADA)</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout2" value="<?php echo isset($info['bookout2']) ? $info['bookout2'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout3" value="<?php echo isset($info['bookout3']) ? $info['bookout3'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout4" value="<?php echo isset($info['bookout4']) ? $info['bookout4'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout5" value="<?php echo isset($info['bookout5']) ? $info['bookout5'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout6" value="<?php echo isset($info['bookout6']) ? $info['bookout6'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout7" value="<?php echo isset($info['bookout7']) ? $info['bookout7'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="bookout8" value="<?php echo isset($info['bookout8']) ? $info['bookout8'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="reg_day" value="<?php echo isset($info['reg_day']) ? $info['reg_day'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>30 DAY REGISTRATION</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="transfer" value="<?php echo isset($info['transfer']) ? $info['transfer'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>TRANSFER TAGS</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>ODOMETER</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>TRADE ODOMETER</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="form17" value="<?php echo isset($info['form17']) ? $info['form17'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>FORM17</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="power_attor" value="<?php echo isset($info['power_attor']) ? $info['power_attor'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>POWER ATTORNEY FTC</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="sticker" value="<?php echo isset($info['sticker']) ? $info['sticker'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>STICKER</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="insurance" value="<?php echo isset($info['insurance']) ? $info['insurance'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>INSURANCE FORM</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="reassignment" value="<?php echo isset($info['reassignment']) ? $info['reassignment'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>REASSIGNMENT FORM</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="title_folder" value="<?php echo isset($info['title_folder']) ? $info['title_folder'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>TITLE FOLDER</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="menu" value="<?php echo isset($info['menu']) ? $info['menu'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>MENU</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="ofac1" value="<?php echo isset($info['ofac1']) ? $info['ofac1'] : ''; ?>" style="border: 1px solid #000; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>OFAC</b></label>
				</div>
				<div class="form-field" style="width: 100%;">
					<input type="text" name="ofac2" value="<?php echo isset($info['ofac2']) ? $info['ofac2'] : ''; ?>" style="border: 1px solid #000 !important; width: 20%; margin-right: 5%; height: 25px;">
					<label><b>&nbsp;</b></label>
				</div>
			</div>
			
			<div class="right" style="float: right; width: 50%; margin: 0;">
				<div class="row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label><b>BASE COST</b></label>
						<input type="text" name="cost1" value="<?php echo isset($info['cost1']) ? $info['cost1'] : ''; ?>" style="width: 64%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="cost2" value="<?php echo isset($info['cost2']) ? $info['cost2'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 10px 0 3px;">
					<div class="form-field" style="float: left; width: 50%;">
						<label><b>MAX</b></label>
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<label style="display: block; text-align: center;"><b>100</b></label>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label><b>WE OWE</b></label>
						<input type="text" name="we_owe1" value="<?php echo isset($info['we_owe1']) ? $info['we_owe1'] : ''; ?>" style="width: 72%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe2" value="<?php echo isset($info['we_owe2']) ? $info['we_owe2'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="we_owe3" value="<?php echo isset($info['we_owe3']) ? $info['we_owe3'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe4" value="<?php echo isset($info['we_owe4']) ? $info['we_owe4'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="we_owe5" value="<?php echo isset($info['we_owe5']) ? $info['we_owe5'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe6" value="<?php echo isset($info['we_owe6']) ? $info['we_owe6'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="we_owe7" value="<?php echo isset($info['we_owe7']) ? $info['we_owe7'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe8" value="<?php echo isset($info['we_owe8']) ? $info['we_owe8'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="we_owe9" value="<?php echo isset($info['we_owe9']) ? $info['we_owe9'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe10" value="<?php echo isset($info['we_owe10']) ? $info['we_owe10'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<input type="text" name="we_owe11" value="<?php echo isset($info['we_owe11']) ? $info['we_owe11'] : ''; ?>" style="width: 100%;">
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						<input type="text" name="we_owe12" value="<?php echo isset($info['we_owe12']) ? $info['we_owe12'] : ''; ?>" style="width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 3px 0;">
					<div class="form-field" style="float: left; width: 50%;">
						<label><b>TOTAL</b></label>
					</div>
					<div class="form-field" style="float: right; width: 25%;">
						$ <input type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 30px 0 7px;">
					<div class="form-field" style="float: left; width: 45%;">
						<label><b>TRADE ACV</b></label>
						<input type="text" name="trade_acv1" value="<?php echo isset($info['trade_acv1']) ? $info['trade_acv1'] : '' ?>" style="width: 55%;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label><b>BY</b></label>
						<input type="text" name="by1" value="<?php echo isset($info['by1']) ? $info['by1'] : '' ?>" style="width: 67%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label><b>TITLE</b></label>
						<input type="text" name="title1" value="<?php echo isset($info['title1']) ? $info['title1'] : '' ?>" style="width: 67%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 7px 0 13px;">
					<div class="form-field" style="float: left; width: 45%;">
						<label><b>TRADE 2 ACV</b></label>
						<input type="text" name="trade_acv2" value="<?php echo isset($info['trade_acv2']) ? $info['trade_acv2'] : '' ?>" style="width: 50%;">
					</div>
					<div class="form-field" style="float: left; width: 25%;">
						<label><b>BY</b></label>
						<input type="text" name="by2" value="<?php echo isset($info['by2']) ? $info['by2'] : '' ?>" style="width: 67%;">
					</div>
					<div class="form-field" style="float: left; width: 30%;">
						<label><b>TITLE</b></label>
						<input type="text" name="title2" value="<?php echo isset($info['title2']) ? $info['title2'] : '' ?>" style="width: 67%;">
					</div>
				</div>
				
				<div class="box" style="float: left; width: 100%; box-sizing: border-box; padding: 5px; border: 1px solid #000; margin: 20px 0;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<h3 style="float: left; width: 100%; margin: 3px 0; font-size">FINANCING</h3>
						<div class="form-field" style="float: left; width: 45%;">
							<label><b>CAPTIVE</b></label>
							<input type="text" name="captive" value="<?php echo isset($info['captive']) ? $info['captive'] : '' ?>" style="width: 61%;">
						</div>
						<div class="form-field" style="float: left; width: 30%;">
							<label><b>OUTSIDE</b></label>
							<input type="text" name="outside" value="<?php echo isset($info['outside']) ? $info['outside'] : '' ?>" style="width: 46%;">
						</div>
						<div class="form-field" style="float: left; width: 25%;">
							<label><b>CASH</b></label>
							<input type="text" name="cash" value="<?php echo isset($info['cash']) ? $info['cash'] : '' ?>" style="width: 57%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label style="margin-left: 215px;"><b>FINANCE MGR INITIALS</b></label>
							<input type="text" name="initials" value="<?php echo isset($info['initials']) ? $info['initials'] : '' ?>" style="width: 20%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>LIEN HOLDER</b></label>
							<input type="text" name="lien_holder1" value="<?php echo isset($info['lien_holder1']) ? $info['lien_holder1'] : '' ?>" style="width: 78%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>ADDRESS</b></label>
							<input type="text" name="address1" value="<?php echo isset($info['address1']) ? $info['address1'] : '' ?>" style="width: 83%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>CITY, STATE, ZIP</b></label>
							<input type="text" name="address_data1" value="<?php echo isset($info['address_data1']) ? $info['address_data1'] : '' ?>" style="width: 74%;">
						</div>
					</div>
				</div>
				
				<div class="box" style="float: left; width: 100%; box-sizing: border-box; padding: 5px; border: 1px solid #000;">
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<h3 style="float: left; width: 100%; margin: 3px 0; font-size">PAY-OFF</h3>
						<div class="form-field" style="float: left; width: 55%;">
							<label><b>DATE CALLED</b></label>
							<input type="text" name="date_call" value="<?php echo isset($info['date_call']) ? $info['date_call'] : '' ?>" style="width: 55%;">
						</div>
						<div class="form-field" style="float: left; width: 45%;">
							<label><b>PHONE #</b></label>
							<input type="text" name="phone_num" value="<?php echo isset($info['phone_num']) ? $info['phone_num'] : '' ?>" style="width: 65%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 55%;">
							<label><b>NET PAY-OFF</b></label>
							<input type="text" name="pay_off" value="<?php echo isset($info['pay_off']) ? $info['pay_off'] : '' ?>" style="width: 58%;">
						</div>
						<div class="form-field" style="float: left; width: 45%;">
							<label><b>GOOD TIL</b></label>
							<input type="text" name="til" value="<?php echo isset($info['til']) ? $info['til'] : '' ?>" style="width: 60%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 55%;">
							<label><b>LAST PAID</b></label>
							<input type="text" name="paid" value="<?php echo isset($info['paid']) ? $info['paid'] : '' ?>" style="width: 64%;">
						</div>
						<div class="form-field" style="float: left; width: 45%;">
							<label><b>TALKED TO </b></label>
							<input type="text" name="talked" value="<?php echo isset($info['talked']) ? $info['talked'] : '' ?>" style="width: 54%;">
						</div>
					</div> 
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 55%;">
							<label><b>HOLDING TITLE</b></label>
							<input type="text" name="holding" value="<?php echo isset($info['holding']) ? $info['holding'] : '' ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="float: left; width: 45%;">
							<label><b>2ND LIEN</b></label>
							<input type="text" name="2nd_lein" value="<?php echo isset($info['2nd_lein']) ? $info['2nd_lein'] : '' ?>" style="width: 61%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>ACCOUNT # </b></label>
							<input type="text" name="account" value="<?php echo isset($info['account']) ? $info['account'] : '' ?>" style="width: 79%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>LIEN HOLDER</b></label>
							<input type="text" name="lien_holder2" value="<?php echo isset($info['lien_holder2']) ? $info['lien_holder2'] : '' ?>" style="width: 75%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>ADDRESS</b></label>
							<input type="text" name="address2" value="<?php echo isset($info['address2']) ? $info['address2'] : '' ?>" style="width: 82%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 3px 0;">
						<div class="form-field" style="float: left; width: 100%;">
							<label><b>CITY, STATE, ZIP</b></label>
							<input type="text" name="address_data2" value="<?php echo isset($info['address_data2']) ? $info['address_data2'] : '' ?>" style="width: 71%;">
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 20px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label><b>COMMENTS</b></label>
				<input type="text" name="comment1" value="<?php echo isset($info['comment1']) ? $info['comment1'] : '' ?>" style="float: right; width: 90%;">
				<input type="text" name="comment2" value="<?php echo isset($info['comment2']) ? $info['comment2'] : '' ?>" style="float: right; width: 100%; margin: 10px 0;">
				<input type="text" name="comment3" value="<?php echo isset($info['comment3']) ? $info['comment3'] : '' ?>" style="float: right; width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<h3 style="float: left; width: 100%; margin: 0; font-size: 14px;"><b>SPECIAL COMMISION NOTES</b><h3>
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>COMMISION</b></label>
				<input type="text" name="commision" value="<?php echo isset($info['commision']) ? $info['commision'] : '' ?>" style="width: 64%;">%
			</div>
			<div class="form-field" style="float: left; width: 35%; margin-left: 5%;">
				<label><b>OR MINIMUM $</b></label>
				<input type="text" name="minimun" value="<?php echo isset($info['minimun']) ? $info['minimun'] : '' ?>" style="width: 64%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label><b>MGR</b></label>
				<input type="text" name="mgr" value="<?php echo isset($info['mgr']) ? $info['mgr'] : '' ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 35%;">
				<label><b>APPROVAL#</b></label>
				<input type="text" name="approval" value="<?php echo isset($info['approval']) ? $info['approval'] : '' ?>" style="width: 64%;">
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
