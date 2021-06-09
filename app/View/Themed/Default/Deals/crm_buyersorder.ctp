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
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	span{font-size: 12px; padding: 2px 0;}
	input[type="text"]{padding: 1px !important; }
@media print {
	input[type="text"]{padding: 1px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.dealer_buyer {margin: 0px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0 0 3px;">
			<div class="logo" style="float: left; width: 26%; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/terry.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			
			<div class="center" style="text-align: center; float: left; width: 53%; margin: 0;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 17px;"><b>SPRING LOCATION</b></h2>
				<p style="font-size: 15px; margin: 0;"><b>22930 I-45 North<br> 
					Spring, Texas 77373 <br>
					Phone: (281) 350-2267 - Fax: (281) 350-2223</b></p>
			</div>
			
			<div class="right-side" style="float: right; width: 20%; text-align: right;">
				<h3 style="float: left; width: 100%; margin: 0; font-size: 15px;"><b>Visit us on the Web</b></h3>
				<p style="float: left; width: 100%; text-align: right; margin: 0; font-size: 13px;">22930 I-45 North <br>http://www.tvrvs.comM </p>
				<div class="social-icon">
					<a href="#" style="width: 30px; display: inline-block;"><img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/fb.jpg'); ?>" alt="" style="width: 100%;"></a>
					<a href="#" style="width: 30px; display: inline-block;"><img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/twitter.jpg'); ?>" alt="" style="width: 100%;"></a>
				</div>
			</div>
		</div>
		
		<div class="upper" style="float: left; width: 100%;">
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 100%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;">BUYER(s)</label>
					<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 90%; padding: 5px 0;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;">ADDRESS</label>
					<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 90%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;;">COUNTRY</label>
					<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : "" ?>" style="width: 70%; padding: 5px 0;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">SALESPERSON</label>
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 15%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">LIC. NO.</label>
					<input type="text" name="lic" value="<?php echo isset($info['lic']) ? $info['lic'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">RES. PHONE</label>
					<input type="text" name="res_phone" value="<?php echo isset($info['res_phone']) ? $info['res_phone'] : "" ?>" style="width: 57%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">BUS. PHONE</label>
					<input type="text" name="bus_phone" value="<?php echo isset($info['bus_phone']) ? $info['bus_phone'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 15%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;;">DATE</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 60%; padding: 5px 0;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 15%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">YEAR</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">MAKE</label>
					<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">MODEL</label>
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 15%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;;">LENGTH</label>
					<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;;">STOCK</label>
					<input type="text" name="stock" value="<?php echo isset($info['stock']) ? $info['stock'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 15%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">&nbsp;</label>
					<input type="text" name="name" value="NEW UNIT" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 20%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">COLOR</label>
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 30%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">SERIAL NUMBER</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : "" ?>" style="width: 60%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 22%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top;">DELIVERY DATE</label>
					<input type="text" name="del_date" value="<?php echo isset($info['del_date']) ? $info['del_date'] : "" ?>" style="width: 50%; padding: 5px 0;">
				</div>
				
				<div class="form-field" style="float: left; width: 13%; padding: 0 5px; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top;">WEIGHT</label>
					<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : "" ?>" style="width: 50%; padding: 5px 0;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-bottom: 0px;">
				<div class="left" style="float: left; width: 60%;">
					<h4 style="margin: 0;float: left; width: 100%; border-right: 1px solid #000; text-align: center; font-size: 13px; border-bottom: 1px solid #000; padding: 3px 0; box-sizing: border-box;"><b> INSURANCE AGAINST LIABILITY FOR BODILY INJURY OR PROPERTY DAMAGE TO OTHERS IS NOT INCLUDED IN THIS TRANSACTION. </b></h4>
					<h4 style="margin: 0;float: left; width: 100%; border-right: 1px solid #000; text-align: center; font-size: 13px; border-bottom: 1px solid #000; padding: 7px 0; box-sizing: border-box;"><b> OPTIONAL EQUIPMENT, LABOR AND ACCESSORIES</b></h4>
					<h4 style="margin: 0;float: left; width: 100%; border-right: 1px solid #000; text-align: left; font-size: 13px; border-bottom: 1px solid #000; padding: 2px 5px; box-sizing: border-box;"><b> FACTORY INSTALLED OPTIONS INCLUDED IN BASE PRICE:</b></h4>
					
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">FRONTIER PACKAGE</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="package" value="<?php echo isset($info['package']) ? $info['package'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">ALUMINUM WHEELS</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="aluminum" value="<?php echo isset($info['aluminum']) ? $info['aluminum'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">SPARE TIRE/ CARRIER/ COVER</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="spare" value="<?php echo isset($info['spare']) ? $info['spare'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">39" TV</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="tv" value="<?php echo isset($info['tv']) ? $info['tv'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">COTTON CLOUD MATTRESS</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="cotton" value="<?php echo isset($info['cotton']) ? $info['cotton'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">MULTI DIRECTIONAL LTD PWR AWN W/SPEAKER</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="spealer" value="<?php echo isset($info['spealer']) ? $info['spealer'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">POWER TONGUE JACK</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="tongue" value="<?php echo isset($info['tongue']) ? $info['tongue'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">WIRE FOR 2ND AC W/50 AMP</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="wire" value="<?php echo isset($info['wire']) ? $info['wire'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">OUTSIDE KITCHEN</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="kitchen" value="<?php echo isset($info['kitchen']) ? $info['kitchen'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">ADD 2ND AC</label>
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="add_ac" value="<?php echo isset($info['add_ac']) ? $info['add_ac'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title1" value="<?php echo isset($info['factory_title1']) ? $info['factory_title1'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title2" value="<?php echo isset($info['factory_title2']) ? $info['factory_title2'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title3" value="<?php echo isset($info['factory_title3']) ? $info['factory_title3'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title4" value="<?php echo isset($info['factory_title4']) ? $info['factory_title4'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title5" value="<?php echo isset($info['factory_title5']) ? $info['factory_title5'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title6" value="<?php echo isset($info['factory_title6']) ? $info['factory_title6'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title7" value="<?php echo isset($info['factory_title7']) ? $info['factory_title7'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title8" value="<?php echo isset($info['factory_title8']) ? $info['factory_title8'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 55%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title9" value="<?php echo isset($info['factory_title9']) ? $info['factory_title9'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 45%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="factory_title10" value="<?php echo isset($info['factory_title10']) ? $info['factory_title10'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;"><b>DEALER PROVIDED OPTIONS & ACCESSORIES:</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer" value="<?php echo isset($info['dealer']) ? $info['dealer'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">PRE-DELIVERY INSPECTION</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="pre_delivery" value="<?php echo isset($info['pre_delivery']) ? $info['pre_delivery'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">WALK-THROUGH</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="walk" value="<?php echo isset($info['walk']) ? $info['walk'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">BATTERY</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="battery" value="<?php echo isset($info['battery']) ? $info['battery'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">FILL PROPANE</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="propane" value="<?php echo isset($info['propane']) ? $info['propane'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block;">INSTALL WD HITCH W/SWAY CONTROL</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="wd_hitch" value="<?php echo isset($info['wd_hitch']) ? $info['wd_hitch'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title1" value="<?php echo isset($info['dealer_title1']) ? $info['dealer_title1'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title2" value="<?php echo isset($info['dealer_title2']) ? $info['dealer_title2'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title3" value="<?php echo isset($info['dealer_title3']) ? $info['dealer_title3'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title4" value="<?php echo isset($info['dealer_title4']) ? $info['dealer_title4'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title5" value="<?php echo isset($info['dealer_title5']) ? $info['dealer_title5'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title6" value="<?php echo isset($info['dealer_title6']) ? $info['dealer_title6'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title7" value="<?php echo isset($info['dealer_title7']) ? $info['dealer_title7'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title8" value="<?php echo isset($info['dealer_title8']) ? $info['dealer_title8'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title9" value="<?php echo isset($info['dealer_title9']) ? $info['dealer_title9'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title10" value="<?php echo isset($info['dealer_title10']) ? $info['dealer_title10'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title11" value="<?php echo isset($info['dealer_title11']) ? $info['dealer_title11'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title12" value="<?php echo isset($info['dealer_title12']) ? $info['dealer_title12'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title13" value="<?php echo isset($info['dealer_title13']) ? $info['dealer_title13'] : "" ?>" style="width: 100%;">
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<input type="text" name="dealer_title14" value="<?php echo isset($info['dealer_title14']) ? $info['dealer_title14'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 2px 0; display: block; text-align: right;"><b>TOTAL FOR DEALER PROVIDED OPTIONAL EQUIPMENT</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; text-align: right;">
							<b>$ 400.00</b>
						</div>
					</div>
					
					<p style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000; padding: 0 5px; box-sizing: border-box; height: 78px; font-size: 12px; border-right: 1px solid #000;"><b>A DOCUMENTARY FEE IS NOT AN OFFICIAL FEE. A DOCUMENTARY FEE IS NOT REQUIRED BY LAW, BUT MAY BE
CHARGED TO BUYERS FOR HANDLING DOCUMENTS AND PERFORMING SERVICES RELATING TO THE CLOSING
OF A SALE. A DOCUMENTARY FEE MAY NOT EXCEED $50.00. THIS NOTICE IS REQUIRED BY LAW.</b></p>
					
					<p style="float: left; width: 100%; padding: 3px 0; border-bottom: 1px solid #000; border-right: 1px solid #000; margin: 0; font-size: 11px; padding: 3px 5px; box-sizing: border-box;">NOTE: WARRANTY AND EXCLUSIONS AND LIMITATIONS OF DAMAGES ON THE REVERSE SIDE.</p>
					
				</div>
				<!-- left side end -->
				
				<!-- right side start -->
				<div class="right" style="float: right; width: 40%; margin: 0; box-sizing: border-box;">
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 6px 0; display: block; text-align: right;"><b>BASE PRICE OF UNIT</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 2px 5px; box-sizing: border-box; text-align: right;">
							<input type="text" class="amount_field" id="price_unit" name="price_unit" value="<?php echo isset($info['price_unit']) ? $info['price_unit'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">OPTIONAL EQUIPMENT</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" class="amount_field" name="opt_equip" id="opt_equip" value="<?php echo isset($info['opt_equip']) ? $info['opt_equip'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							&nbsp;
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; text-align: right; padding: 2px 0;"><b>SUB-TOTAL</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; text-align: right;">
							<input type="text" name="sub_total" class="amount_field" id="sub_total" value="<?php echo isset($info['sub_total']) ? $info['sub_total'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>DOCUMENTARY FEE</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box; text-align: right;">
							<input type="text" name="doc_fee" class="amount_field" id="doc_fee" value="<?php echo isset($info['doc_fee']) ? $info['doc_fee'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>VEHICLE INVENTORY TAX</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="vehicle_tax" class="amount_field" id="vehicle_tax" value="<?php echo isset($info['vehicle_tax']) ? $info['vehicle_tax'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>TAX</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="tax" class="amount_field" id="tax" value="<?php echo isset($info['tax']) ? $info['tax'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>LICENSE FEE</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="license_fee" class="amount_field" id="license_fee" value="<?php echo isset($info['license_fee']) ? $info['license_fee'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>INSPECTION/TITLE FEE</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="inspection" class="amount_field" id="inspection" value="<?php echo isset($info['inspection']) ? $info['inspection'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 12px; padding: 1px 0; display: block; padding: 2px 0;"><b>CASH PURCHASE PRICE</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="purchase" class="amount_field" id="purchase" value="<?php echo isset($info['purchase']) ? $info['purchase'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; height: 22px;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; height: 22px;">
							<label style="font-size: 13px; padding: 2px 0 3px; vertical-align: top; display: inline-block; width: 65%; font-size: 12px; border-right: 1px solid #000;">TRADE-IN ALLOWANCE</label>
							<span style="display: inline-block; text-align: right; width: 30%; vertical-align: top; font-size: 12px; padding: 1px 0;;">
								<label style="float: left;">$</label><input type="text" name="trade_in" value="<?php echo isset($info['trade_in']) ? $info['trade_in'] : "" ?>" style="width: 90%;">
							</span>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; height: 22px;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; height: 22px;">
							<label style="font-size: 13px; padding: 2px 0 3px; vertical-align: top; display: inline-block; width: 65%; font-size: 12px; border-right: 1px solid #000;">LESS BAL. DUE ON ABOVE</label>
							<span style="display: inline-block; text-align: right; width: 30%; vertical-align: top; font-size: 12px; padding: 1px 0;;">
								<label style="float: left;">$</label><input type="text" name="less_bal" value="<?php echo isset($info['less_bal']) ? $info['less_bal'] : "" ?>" style="width: 90%;">
							</span>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; height: 22px;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; height: 24px;">
							<label style="font-size: 13px; padding: 2px 0 3px; vertical-align: top; display: inline-block; width: 65%; font-size: 12px; border-right: 1px solid #000;">NET ALLOWANCE</label>
							<span style="display: inline-block; text-align: right; width: 30%; vertical-align: top; font-size: 12px; padding: 3px 0;">
								<label style="float: left;">$</label><input type="text" name="allowance" value="<?php echo isset($info['allowance']) ? $info['allowance'] : "" ?>" style="width: 90%;">
							</span>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; height: 22px;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; height: 25px;">
							<label style="font-size: 13px; padding: 4px 0 3px; vertical-align: top; display: inline-block; width: 65%; font-size: 12px; border-right: 1px solid #000;">CASH DEPOSIT TODAY</label>
							<span style="display: inline-block; text-align: right; width: 30%; vertical-align: top; font-size: 12px; padding: 4px 0;">
								<label style="float: left;">$</label><input type="text" name="deposit" value="<?php echo isset($info['deposit']) ? $info['deposit'] : "" ?>" style="width: 90%;">
							</span>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; height: 22px;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; border-bottom: 1px solid #000; height: 26px;">
							<label style="font-size: 13px; padding: 5px 0 3px; vertical-align: top; display: inline-block; width: 65%; font-size: 12px; border-right: 1px solid #000;">REMAINING CASH DOWN</label>
							<span style="display: inline-block; text-align: right; width: 30%; vertical-align: top; font-size: 12px; padding: 5px 0 0;">
								<label style="float: left;">$</label><input type="text" name="remain_cash" value="<?php echo isset($info['remain_cash']) ? $info['remain_cash'] : "" ?>" style="width: 90%;">
							</span>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 29px; line-height: 24px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">LESS TOTAL CREDITS</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<input type="text" name="total_credit" class="amount_field" id="total_credit" value="<?php echo isset($info['total_credit']) ? $info['total_credit'] : "" ?>" style="width: 100%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 23px; line-height: 27px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000; height: 23px;">
							<label style="font-size: 13px; padding: 0px 0; display: block; text-align: right;"><b>SUB-TOTAL</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;padding: 0px;"><b><label style="float: left;">$</label><input type="text" name="sub-total" class="amount_field" id="sub-total" value="<?php echo isset($info['sub-total']) ? $info['sub-total'] : "" ?>" style="width: 90%;height: 18px;"></b></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 19px; line-height: 19px; margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">&nbsp;</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;">&nbsp;</span>
						</div>
					</div>
					
					
					<div class="row" style="float: left; width: 100%; height: 24px; line-height: 24px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">NON-TAXABLE ITEMS</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;"><input type="text" name="taxable" class="amount_field" id="taxable" value="<?php echo isset($info['taxable']) ? $info['taxable'] : "" ?>" style="width: 100%; height: 19px;"></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 24px; line-height: 19px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">GAP</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;">$<input type="text" name="gap" class="amount_field" id="gap" value="<?php echo isset($info['gap']) ? $info['gap'] : "" ?>" style="width: 90%;"></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 24px; line-height: 19px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">EXTENDED SERVICE CONTRACT</label>
						</div>	
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;">$<input type="text" name="ext_service" class="amount_field" id="ext_service" value="<?php echo isset($info['ext_service']) ? $info['ext_service'] : "" ?>" style="width: 90%;"></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 19px; line-height: 19px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 2px 0; display: block;">&nbsp;</label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							&nbsp;
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 24px; line-height: 19px;	 margin: 0; border-bottom: 1px solid #000;">
						<div class="form-field" style="float: left; width: 75%; padding: 0 5px; box-sizing: border-box; border-right: 1px solid #000;">
							<label style="font-size: 13px; padding: 0px 0; display: block; text-align: right;"><b>UNPAID BALANCE OF CASH SALE PRICE</b></label>
						</div>
						<div class="form-field" style="float: left; width: 25%; padding: 0 5px; box-sizing: border-box;">
							<span style="display: block; text-align: right;"><b><label style="float: left;">$</label><input type="text" name="balance" class="amount_field" id="balance" value="<?php echo isset($info['balance']) ? $info['balance'] : "" ?>" style="width: 90%;"></b></span>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; height: 39px; margin: 0; border-bottom: 1px solid #000;">
						&nbsp;
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<p style="float: left; width: 100%; font-size: 11px; margin: 7px 0 14px ; padding: 0 9px; box-sizing: border-box;"><b>IT IS MUTUALLY UNDERSTOOD THAT THIS AGREEMENT IS SUBJECT TO
NECESSARY CORRECTIONS AND ADJUSTMENTS CONCERNING CHANGES IN NET
PAYOFF ON TRADE-IN TO BE MADE AT TIME OF SETTLEMENT.</b></p>

						<h2 style="font-size: 13px; margin: 0; box-sizing: border-box; padding: 0 12px 10px;"><b>ANY PAYMENTS PAID AT CLOSING MUST BE IN THE FORM OF <span style="text-decoration: underline;">CASH OR CASHIER'S CHECK</span></b></h2>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
						<p class="dealer_buyer" style="float: left; width: 100%; font-size: 11px; margin: 7px 0 36px ; padding: 0 9px; box-sizing: border-box;">Dealer	and	Buyer	certify	that	additional	terms	and	conditions	printed	on	the	back	of	this	
contract	are	agreed	to	as	part	of	this	agreement,	the	same	as		if	printed	above	the	signature.	
Buyer	is	purchasing	the	above	described		Unit;	the	optional	equipment	and	accessories;	that	
Buyer's	trade-in	is	free	from	all	claims	whatsoever,	except	as	noted.</p>
						<div class="form-field" style="width: 80%; margin: 0 auto 26px;">
							X <input type="text" name="buyer_received" value="<?php echo isset($info['buyer_received'])?$info['buyer_received']:''; ?>" style="width: 90%;">
							<label style="font-size: 12px; float: left; width: 100%; border-top: 1px solid #000; padding: 3px 0;">Buyer has received a copy of front and back of this agreement.</label>
						</div>
					</div>
				</div>			
				
				
				<!-- right side end -->
				
			</div>
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-top: 0px; border-bottom: 0px;">
				<h3 style="float: left; width: 100%; margin: 0; font-size: 11px; padding: 1px 5px;"><b>DESCRIPTION OF TRADE:</b></h3>
				<div class="form-field" style="float: left; width: 20%; padding: 0px; box-sizing: border-box;">
					<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">YEAR</label>
				</div>
				
				<div class="form-field" style="float: left; width: 20%; padding: 0; box-sizing: border-box;">
					<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">MAKE</label>
				</div>
				
				<div class="form-field" style="float: left; width: 30%; padding: 0; box-sizing: border-box;">
					<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">MODEL</label>
				</div>
				
				<div class="form-field" style="float: left; width: 18%; padding: 0; box-sizing: border-box;">
					<input type="text" name="type_trade" value="<?php echo isset($info['type_trade'])?$info['type_trade']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">TYPE</label>
				</div>
				
				<div class="form-field" style="float: left; width: 12%; padding: 0; box-sizing: border-box;">
					<input type="text" name="length" value="<?php echo isset($info['length'])?$info['length']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">LENGTH</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-top: 0px; border-bottom: 0px;">
				<div class="form-field" style="float: left; width: 100%; padding: 0; box-sizing: border-box;">
					<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">SERIAL</label>
				</div>
			</div>

			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-top: 0px; border-bottom: 0px; padding: 0">
				<div class="form-field" style="float: left; width: 35%; padding: 0; box-sizing: border-box;">
					<input type="text" name="amount_owed" value="<?php echo isset($info['amount_owed'])?$info['amount_owed']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">AMOUNT OWED (PAYOFF)</label>
				</div>
				
				<div class="form-field" style="float: left; width: 25%; padding: 0; box-sizing: border-box;">
					<input type="text" name="pay_whom" value="<?php echo isset($info['pay_whom'])?$info['pay_whom']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">PAY TO WHOM</label>
				</div>
				
				<div class="form-field" style="float: left; width: 40%; padding: 0; box-sizing: border-box; border: 1px solid #000; padding: 7px 0; border-right: 0px;">
					<label style="font-size: 12px; padding: 0 5px;"><b>TRADE-IN DEBT TO BE PAID BY:</b></label>
					<input type="text" name="paid_by" value="<?php echo isset($info['paid_by'])?$info['paid_by']:''; ?>" style="width: 40%; padding: 1px 0;">
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; padding: 2px 5px; box-sizing: border-box;">
				<h4 style="margin: 0; font-size: 11px; font-weight: normal;">THIS AGREEMENT CONTAINS THE ENTIRE UNDERSTANDING BETWEEN DEALER AND BUYER AND NO OTHER REPRESENTATION OR INDUCEMENT VERBAL OR WRITTEN HAS BEEN MADE WHICH IS NOT CONTAINED IN THIS CONTRACT. BUYER(S) ACKNOWLEDGE
RECEIPT OF A COPY OF THIS ORDER AND THAT BUYER(S) HAVE READ AND UNDERSTAND THE BACK OF THIS AGREEMENT.</h4>
			</div>
			
			
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-top: 0px; border-bottom: 0px; padding: 9px 0 0;">
				<div class="form-field" style="float: left; width: 45%; padding: 0; box-sizing: border-box; margin: 0 5%">
					<div class="cover" style="float: left; width: 80%">
						<input type="text" name="valid_unless1" value="<?php echo isset($info['valid_unless1'])?$info['valid_unless1']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
						<label style="font-size: 11px; vertical-align: top; padding: 0 5px; text-align: center;"><i>Not Valid Unless Signed and Accepted by an Officer of the Company</i></label>
					</div>
					<b style="font-size: 12px; margin: 0 2px;">DEALER</b>
				</div>
				
				<div class="form-field" style="float: left; width: 45%; padding: 0; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">SIGNED X</label>
					<input type="text" name="sign_x1" value="<?php echo isset($info['sign_x1'])?$info['sign_x1']:''; ?>"  style="width: 70%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">BUYER</label>
				</div>
			</div>
			
			
			<div class="row" style="float: left; width: 100%;  margin: 0; border: 1px solid #000; border-top: 0px; padding: 9px 0 0px;">
				<div class="form-field" style="float: left; width: 45%; padding: 0; box-sizing: border-box; margin: 0 5%">
					<label style="font-size: 12px; margin: 0 2px; float: left; width: 10%;">BY</label>
					<div class="cover" style="width: 80%; float: left;">
						<input type="text" name="valid_unless2" value="<?php echo isset($info['valid_unless2'])?$info['valid_unless2']:''; ?>" style="width: 100%; padding: 1px 0; border-bottom: 1px solid #000;">
						<label style="font-size: 11px; vertical-align: top; padding: 0 5px; text-align: center;"><i>Not Valid Unless Signed and Accepted by an Officer of the Company</i></label>
					</div>
					
				</div>
				
				<div class="form-field" style="float: left; width: 45%; padding: 0; box-sizing: border-box;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">SIGNED X</label>
					<input type="text" name="sign_x2" value="<?php echo isset($info['sign_x2'])?$info['sign_x2']:''; ?>" style="width: 70%; padding: 1px 0; border-bottom: 1px solid #000;">
					<label style="font-size: 12px; vertical-align: top; padding: 0 5px;">BUYER</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;  margin: 0;">
				<label style="display: inline-block; margin: 0; width: 30%; text-align: center; font-size: 10px;"><b>FORM 1077TX</b></label>
				
				<p style="width: 40%; float: right; text-align: center; margin: 0; font-size: 10px;">A PLAIN LANGUAGE PURCHASE AGREEMENT Rev 05/02 <br>
Copyright 1983 JENKINS BUSINESS FORMS, IL 62258</p>
		</div>
		
		
		<div class="lower" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 10px; border: 1px dotted #000;">
			<h4 style="float: left; width: 100%; text-align: center; font-size: 16px; margin: 0 0 7px 0;"><b>ADDITIONAL TERMS AND CONDITIONS</b></h4>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;">In this contract the words I, me, and my refer to the Purchaser and Co-Purchaser signing this contract. The words you and your refer to the Retailer.<br>
I understand that the term "unit" used in this agreement describes the Recreational Vehicle or any item or combination of items as described on the front of this agreement.<br>
I, further agree (continued from other side of Contract):</p>

			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">1. IF NOT A CASH TRANSACTION.</b> If I do not complete this purchase as a cash transaction, I know before or at the time of delivery of the unit purchased, I will enter into a
retail installment contract and sign a security agreement or another agreement as may be required to finance my purchase.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">2. TITLE.</b> Title to the unit purchased will remain in you until the agreed upon purchase price is paid in full in cash, or I have signed a retail installment contract and it has been
accepted by a bank or finance company, at which time title passes to me even though the actual delivery of the unit may be made at a later date.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">3. TRADE-IN.</b> If I am trading in a used car, manufactured home, trailer, or other vehicle, I will give you the original bill of sale or the title to the trade-in. I promise that any trade-in which I give is owned by me and is free of any lien or other claim except as noted on the other side of this contract. I promise that all taxes of every kind levied against the trade-in
have been fully paid. If any government agency makes a levy or claims a tax lien or demand against the trade-in, you may, at your option, either pay it and I will reimburse you on
demand, or you may add that amount to this contract as if it had been originally included</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">4. REGISTRATION OR LICENSE OF TRADE-IN.</b> If I have a trade-in and it is registered or licensed in a state outside of the one where this order is written, I will immediately have
the trade-in registered or licensed in the state you indicate and I will pay any and all expenses and registration or licensing fees required. If you handle the registration or licensing
of the trade-in, I will reinburse you for the expense on demand or you may add that amount to this contract as if it had been originally included.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">5. REAPPRAISAL OF TRADE-IN.</b> If I am making a trade-in and it is not delivered to you at the original time of the apparisal or if later, on delivery, it appears to you that there have
been material changes made in the furnishings or accessories, or in its general physical condition, you may make a reappraisal. This later appraisal value will then determine the
allowance to be made for the trade-in.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">6. FAILURE TO COMPLETE PURCHASE.</b> If I fail or refuse to complete this purchase within the time frame specified in this contract or as specified in the Uniform Commercial Code
of the state in which I sign this contract, or within an agreed upon extension of time, for any reason (other than cancellation because of any increase in price), you may keep that
portion of my cash deposit which will adequately compensate you for your actual, consequential and incidental damages, and all other damages, expenses, or losses which you incur because I failed to complete my purchase. If I have not given you a cash deposit or it is inadequate and I have given you a trade-in, you may sell the trade-in at public or
private sale, and deducted from the money received an amount that will adequately compensate you for any all of the above mentioned damages, expenses, and losses incurred
because I failed to complete this purchase. Retention of any portion of the cash deposit or the application of sale proceeds shall be in addition to, and not to the exclusion of,
any other remedies you may have at law, and this contract shall not be interpreted as containing a liquidated damages provision. I understand that you shall have all the rights of
a seller upon breach of contract under the Uniform Commercial Code, except the right to seek and collect "liquidated damages" under Section 2-718. If you prevail in any legal
action against me, or which I bring against you, concerning this contract, I agree to reimburse you for your reasonable attorneys' fees, court costs and expenses which you incur in prosecuting or defending against that legal action.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">7. CHANGES BY MANUFACTURER.</b> I understand that the manufacturer may make any changes in the model, or designs, or any accessories and parts from time to time, if the
manufacturer does make changes, neither you nor the manufacturer are obligated to make the same changes in the unit I am purchasing and covered by this order, either before or
after it is delivered to me.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">8. DELAYS.</b> I will not hold you liable for delays caused by the manufacturer, accidents, strikes, fires, or any other cause beyond your control.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">9. INSPECTION.</b> I have examined the product and find it suitable for my particular needs. I have relied upon my own judgment and inspection in determining that it is of acceptable quality. On the special unit ordered I have relied on my inspection of the display model(s), the brochures and bulletins and/or the floor plan provided to you by the manufacturer,
in making my decision to purchase the unit described on the reverse side of this agreement.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">10. WARRANTIES AND EXCLUSIONS.</b> I UNDERSTAND THAT THERE MAY BE WRITTEN WARRANTIES COVERING THE UNIT PURCHASED, OR ANY COMPONENT(S), OR ANY
APPLIANCE(S) WHICH HAVE BEEN PROVIDED BY THE MANUFACTURERS. YOU HAVE GIVEN ME AND I HAVE READ AND UNDERSTOOD A STATEMENT OF THE TYPE OF
WARRANTY COVERING THE UNIT PURCHASED AND/OR COMPONENT(S) AND/OR APPLIANCE(S) BEFORE I SIGNED THIS SALES CONTRACT. THERE IS NO EXPRESS
WARRANTY ON USED UNITS. EXCEPT WHERE PROHIBITED BY LAW: (i) DELIVERY BY YOU TO ME OF THE WARRANTY BY THE MANUFACTURER OF THE UNIT PURCHASED OR ANY COMPONENT(S), OR ANY APPLIANCE(S) DOES NOT MEAN YOU ADOPT THE WARRANTY(S) OF SUCH MANUFACTURER(S), (ii) I ACKNOWLEDGE THAT THESE
EXPRESS WARRANTIES MADE BY THE MANUFACTURER(S) HAVE NOT BEEN MADE BY YOU EVEN IF THEY SAY YOU MADE THEM OR SAY YOU MADE SOME OTHER
EXPRESS WARRANTY, AND (iii) YOU ARE NOT AN AGENT OF THE MANUFACTURER(S) FOR WARRANTY PURPOSES EVEN IF YOU COMPLETE, OR ATTEMPT TO COMPLETE
REPAIRS FOR THE MANUFACTURER(S). EXCEPT IN WV, MS, WI OR WHERE OTHERWISE PROHIBITED BY LAW; (i) I UNDERSTAND THAT THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE AND ALL OTHER WARRANTIES EXPRESSED OR IMPLIED ARE EXCLUDED BY YOU FROM THIS TRANSACTION
AND SHALL NOT APPLY TO THE UNIT OR ANY COMPONENT OR ANY APPLIANCE CONTAINED THEREIN, (ii) I UNDERSTAND THAT YOU MAKE NO WARRANTIES WHATSOEVER REGARDING THIS UNIT OR ANY COMPONENT OR ANY APPLIANCE CONTAINED THEREIN, AND (iii) I UNDERSTAND THAT YOU DISCLAIM AND EXCLUDE FROM THIS
TRANSACTION ALL WARRANTY.</p>
			
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">11. LIMITATION OF DAMAGES.</b> EXCEPT IN WV AND ANY OTHER STATE WHICH DOES NOT ALLOW THE LIMITATION OF INCIDENTAL AND/OR CONSEQUENTIAL DAMAGES,
THE FOLLOWING LIMITATIONS OF DAMAGES SHALL APPLY. IF ANY WARRANTY FAILS BECAUSE OF ATTEMPTS AT REPAIR ARE NOT COMPLETED WITHIN A REASONABLE TIME,
OR ANY REASON ATTRIBUTED TO THE MANUFACTURER, INCLUDING MANUFACTURERS WHO HAVE GONE OUT OF BUSINESS, I AGREE THAT IF I AM ENTITLED TO ANY DAMAGES
AGAINST YOU, MY DAMAGES ARE LIMITED TO THE LESSER OF EITHER THE COST OF NEEDED REPAIRS OR REDUCTION IN THE MARKET VALUE OF THE UNIT CAUSED BY THE LACK OF REPAIRS. I ALSO AGREE THAT ONCE I HAVE ACCEPTED THE UNIT, EVEN THOUGH THE MANUFACTURER(S)' WARRANTY DOES NOT ACCOMPLISH ITS PURPOSE, THAT I
CANNOT RETURN THE UNIT TO YOU AND SEEK A REFUND FOR ANY REASON.</p>
			
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">12. INSURANCE.</b> I understand that I am not covered by insurance on the unit purchased until accepted by an insurance company, and I agree to hold you harmless from any and
all claims due to loss or damage prior to acceptance of insurance coverage by an insurance company.</p>
			
			
			<p style="float: left; width: 100%; margin: 10px 0; font-size: 12px;"><b style="text-decoration: underline;">13. CONTOLLING LAW AND PLACE OF SUIT.</b> The law of the State, in which I sign this contract, is the law which is to be used in interpreting the terms of the contract. You and I
agree that if any dispute between us is submitted to a court for resolution, such legal proceeding shall take place in the county in which your principle offices are located. If under state law a special dispute resolution procedure or complaint process is available, I agree to the extent permitted by law that procedure shall be the only method of resolution and
source of remedies available to me.</p>
			
			<p style="float: left; width: 100%; margin: 10px 0 0; font-size: 12px;"><b style="text-decoration: underline;">14. IF PART INVALID REST OF CONTRACT SAVED.</b> You and I agree that each portion of this contract is independent and if any paragraph or provision violates the law and is
unenforceable, the rest of the contract will be valid.</p>
			

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


	$(".amount_field").on('change keyup paste',function(){
		calculate_tax();
	});
	

	function calculate_tax(){
		var price_unit = isNaN(parseFloat( $('#price_unit').val()))?0.00:parseFloat( $('#price_unit').val());
		var opt_equip = isNaN(parseFloat( $('#opt_equip').val()))?0.00:parseFloat( $('#opt_equip').val());
		var sub_total1 = price_unit + opt_equip;
		$('#sub_total').val(sub_total1.toFixed(2));
		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat( $('#doc_fee').val());
		var vehicle_tax = isNaN(parseFloat( $('#vehicle_tax').val()))?0.00:parseFloat( $('#vehicle_tax').val());
		var tax = isNaN(parseFloat( $('#tax').val()))?0.00:parseFloat( $('#tax').val());
		var license_fee = isNaN(parseFloat( $('#license_fee').val()))?0.00:parseFloat( $('#license_fee').val());
		var inspection = isNaN(parseFloat( $('#inspection').val()))?0.00:parseFloat( $('#inspection').val());
		var purchase_price = sub_total1 + doc_fee + vehicle_tax + tax + license_fee + inspection;
 		$('#purchase').val(purchase_price.toFixed(2));
 		var total_credit = isNaN(parseFloat( $('#total_credit').val()))?0.00:parseFloat( $('#total_credit').val());
 		var sub_total2 = purchase_price - total_credit;
 		$('#sub-total').val(sub_total2.toFixed(2));
 		var taxable = isNaN(parseFloat( $('#taxable').val()))?0.00:parseFloat( $('#taxable').val());
		var gap = isNaN(parseFloat( $('#gap').val()))?0.00:parseFloat( $('#gap').val());
		var ext_service = isNaN(parseFloat( $('#ext_service').val()))?0.00:parseFloat( $('#ext_service').val());

		var balance_cash = sub_total2 + taxable + gap + ext_service;
		$('#balance').val(balance_cash.toFixed(2));
	}
});

	
	
	
	
	
</script>
</div>
