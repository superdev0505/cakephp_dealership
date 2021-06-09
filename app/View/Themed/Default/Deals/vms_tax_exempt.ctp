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
    <input type="hidden" id="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" name="vin">
    <input type="hidden" name="vin_addon1" id="vin_addon1" value="<?php echo isset($info['vin_addon1'])?$info['vin_addon1']:$info['vin_addon1']; ?>">
    <input type="hidden" name="vin_addon2" id="vin_addon2" value="<?php echo isset($info['vin_addon2'])?$info['vin_addon2']:$info['vin_addon2']; ?>">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 13px; font-weight: normal; margin-bottom: 0px;}
	p{font-size: 14px; margin: 2px 4px;}
	table{font-size: 14px;}
	td, th{border-right: 1px solid #000; border-bottom: 1px solid #000; padding: 4px;}
	.detail-form td:first-child, .detail-form th:first-child{border-bottom: 0px;}
	table input[type="text"]{border-bottom: 0px solid #000;}
	.wraper.main input {padding: 0px;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 75%; margin: 0; border-right: 1px solid #000; box-sizing: border-box; padding: 14px;">			
				<div class="logo" style="width: 54%; float: left;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/village-ms-logo.png'); ?>" alt="" style="width: 100%;">
				</div>
				<div class="address1" style="float: left; width: 22%; margin: 0;">
					<p style="font-size: 14px; margin: 0;">
						<strong style="font-size: 15px;">GRAND RAPIDS</strong> <br>
						3700 Plainfield Ave NE <br> Grand Rapids, MI 49525 <br> P: 616.432.6262 <br> F: 616.364.4745
					</p>
				</div>
				<div class="address1" style="float: left; width: 22%; margin: 0 0 0 2%;">
					<p style="font-size: 14px; margin: 0;">
						<strong style="font-size: 15px;">HOLLAND</strong> <br>
						13035 New Holland St. <br> Holland, MI 49424 <br> P: 616.399.5000 <br> F: 616.399.6994
					</p>
				</div>
				
				<div class="logos" style="float: left; width: 100%; margin: 3px 0;">
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/combo-logo1.jpg'); ?>" alt="" style="width: 100%;">
				</div>
			</div>
			
			<div class="right" style="float: right; width: 25%; box-sizing: border-box; padding-top: 46px; border-top: 1px solid #000;">
				<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; box-sizing: border-box; padding: 5px 5px 0 5px;">
					<label>DEAL#</label>
					<input type="text" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; box-sizing: border-box; padding: 5px 5px 0 5px;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				</div>
				<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 5px 5px 0 5px;">
					<label>SALESMAN</label>
					<input type="text" value="<?php echo isset($info['salesman']) ? $info['salesman'] : $info['sperson']; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 50%; padding: 60px 0 3px; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 3px 0; box-sizing: border-box; padding: 5px;">
				<label>CO-BUYER</label>
				<input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer']) ? $info['co_buyer'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 38%; padding: 3px 0; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>STREET ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 18%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 15%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 17%; padding: 3px 0; box-sizing: border-box; padding: 5px;">
				<label>COUNTRY</label>
				<input type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 63%; padding: 60px 0 3px; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>EMAIL ADDRESS</label>
				<input type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 37%; padding: 3px 0; box-sizing: border-box; padding: 5px;">
				<label style="display: block;">PHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 32%; padding: 60px 0 3px; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>DRIVER LICENSE #</label>
				<input type="text" name="driver_lic" value="<?php echo isset($info['driver_lic']) ? $info['driver_lic'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 31%; padding: 60px 0 3px; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>CO-BUYER DRIVERS LICENSE #</label>
				<input type="text" name="cobuyer_licence" value="<?php echo isset($info['cobuyer_licence']) ? $info['cobuyer_licence'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 37%; padding: 3px 0; box-sizing: border-box; padding: 5px;">
				<label style="display: block;">CELL</label>
				<input type="text" name="mobile" value="<?php echo isset($info['mobile']) ? $info['mobile'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0 0; border-right: 1px solid #000; box-sizing: border-box;">
				<label style="font-size: 13px;"> <input type="radio" name="condition" value="New" <?php echo ($info['condition'] == 'New')?'checked="checked"':''; ?> /> NEW</label> <br>
				<label style="font-size: 13px;"> <input type="radio" name="condition" value="Used" <?php echo ($info['condition'] == 'Used')?'checked="checked"':''; ?> /> USED</label>
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 11%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>COLOR</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MILEAGE</label>
				<input type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : ''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 5px 5px 0 5px;">
				<label style="display: block; padding-bottom: 5px;">SER #</label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0 0; border-right: 1px solid #000; box-sizing: border-box;">
				<label style="font-size: 13px;"> <input type="radio" name="condition_addon1" value="New" <?php echo ($info['condition_addon1'] == 'New')?'checked="checked"':''; ?> /> NEW</label> <br>
				<label style="font-size: 13px;"> <input type="radio" name="condition_addon1" value="Used" <?php echo ($info['condition_addon1'] == 'Used')?'checked="checked"':''; ?> /> USED</label>
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>YEAR</label>
				<input type="text" name="year1" value="<?php echo isset($info['year1'])?$info['year1']:$info['year_addon1']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MAKE</label>
				<input type="text" name="make1" value="<?php echo isset($info['make1'])?$info['make1']:$info['make_addon1']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MODEL</label>
				<input type="text" name="model1" value="<?php echo isset($info['model1'])?$info['model1']:$info['model_id_addon1']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 11%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>COLOR</label>
				<input type="text" name="color1" value="<?php echo isset($info['color1'])?$info['color1']:$info['unit_color_addon1']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MILEAGE</label>
				<input type="text" name="odometer1" value="<?php echo isset($info['odometer1'])?$info['odometer1']:$info['odometer_addon1']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 5px 5px 0 5px;">
				<label style="display: block; padding-bottom: 5px;">SER #</label>
				<input type="text" name="addon1_vin0" id="addon1_vin0" value="<?php echo isset($info['addon1_vin0']) ? $info['addon1_vin0'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin1" id="addon1_vin1" value="<?php echo isset($info['addon1_vin1']) ? $info['addon1_vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin2" id="addon1_vin2" value="<?php echo isset($info['addon1_vin2']) ? $info['addon1_vin2'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin3" id="addon1_vin3" value="<?php echo isset($info['addon1_vin3']) ? $info['addon1_vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin4" id="addon1_vin4" value="<?php echo isset($info['addon1_vin4']) ? $info['addon1_vin4'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin5" id="addon1_vin5" value="<?php echo isset($info['addon1_vin5']) ? $info['addon1_vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin6" id="addon1_vin6" value="<?php echo isset($info['addon1_vin6']) ? $info['addon1_vin6'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin7" id="addon1_vin7" value="<?php echo isset($info['addon1_vin7']) ? $info['addon1_vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin8" id="addon1_vin8" value="<?php echo isset($info['addon1_vin8']) ? $info['addon1_vin8'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin9" id="addon1_vin9" value="<?php echo isset($info['addon1_vin9']) ? $info['addon1_vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin10" id="addon1_vin10" value="<?php echo isset($info['addon1_vin10']) ? $info['addon1_vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin11" id="addon1_vin11" value="<?php echo isset($info['addon1_vin11']) ? $info['addon1_vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin12" id="addon1_vin12" value="<?php echo isset($info['addon1_vin12']) ? $info['addon1_vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin13" id="addon1_vin13" value="<?php echo isset($info['addon1_vin13']) ? $info['addon1_vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin14" id="addon1_vin14" value="<?php echo isset($info['addon1_vin14']) ? $info['addon1_vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon1_vin15" id="addon1_vin15" value="<?php echo isset($info['addon1_vin15']) ? $info['addon1_vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0 0; border-right: 1px solid #000; box-sizing: border-box;">
				<label style="font-size: 13px;"> <input type="radio" name="name" value="name1"> NEW</label> <br>
				<label style="font-size: 13px;"> <input type="radio" name="name" value="name1"> USED</label>
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>YEAR</label>
				<input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:$info['year_addon2']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 9%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MAKE</label>
				<input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:$info['make_addon2']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MODEL</label>
				<input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:$info['model_addon2']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 11%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>COLOR</label>
				<input type="text" name="color2" value="<?php echo isset($info['color2'])?$info['color2']:$info['unit_color_addon2']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000;">
				<label>MILEAGE</label>
				<input type="text" name="odometer2" value="<?php echo isset($info['odometer2'])?$info['odometer2']:$info['odometer_addon2']; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 38%; box-sizing: border-box; padding: 5px 5px 0 5px;">
				<label style="display: block; padding-bottom: 5px;">SER #</label>
				<input type="text" name="addon2_vin0" id="addon2_vin0" value="<?php echo isset($info['addon2_vin0']) ? $info['addon2_vin0'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin1" id="addon2_vin1" value="<?php echo isset($info['addon2_vin1']) ? $info['addon2_vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin2" id="addon2_vin2" value="<?php echo isset($info['addon2_vin2']) ? $info['addon2_vin2'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin3" id="addon2_vin3" value="<?php echo isset($info['addon2_vin3']) ? $info['addon2_vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin4" id="addon2_vin4" value="<?php echo isset($info['addon2_vin4']) ? $info['addon2_vin4'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin5" id="addon2_vin5" value="<?php echo isset($info['addon2_vin5']) ? $info['addon2_vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin6" id="addon2_vin6" value="<?php echo isset($info['addon2_vin6']) ? $info['addon2_vin6'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin7" id="addon2_vin7" value="<?php echo isset($info['addon2_vin7']) ? $info['addon2_vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin8" id="addon2_vin8" value="<?php echo isset($info['addon2_vin8']) ? $info['addon2_vin8'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin9" id="addon2_vin9" value="<?php echo isset($info['addon2_vin9']) ? $info['addon2_vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin10" id="addon2_vin10" value="<?php echo isset($info['addon2_vin10']) ? $info['addon2_vin10'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin11" id="addon2_vin11" value="<?php echo isset($info['addon2_vin11']) ? $info['addon2_vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin12" id="addon2_vin12" value="<?php echo isset($info['addon2_vin12']) ? $info['addon2_vin12'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin13" id="addon2_vin13" value="<?php echo isset($info['addon2_vin13']) ? $info['addon2_vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin14" id="addon2_vin14" value="<?php echo isset($info['addon2_vin14']) ? $info['addon2_vin14'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
				<input type="text" name="addon2_vin15" id="addon2_vin15" value="<?php echo isset($info['addon2_vin15']) ? $info['addon2_vin15'] : ''; ?>" style="width: 5%; border-right: 1px solid #000;">
			</div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" style="margin: 0; float: left; margin: 0;">
			<tr>
				<td style="width: 70%; text-align: right;">Cash Price</td>
				<td><input type="text" id="cash_price" class="price_value" name="cash_price" value="<?php echo isset($info['cash_price'])?$info['cash_price']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Freight</td>
				<td><input type="text" id="freight" class="price_value" name="freight" value="<?php echo isset($info['freight'])?$info['freight']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Assembly & Prep</td>
				<td><input type="text" id="assembly" class="price_value" name="assembly" value="<?php echo isset($info['assembly'])?$info['assembly']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Accessories</td>
				<td><input type="text" id="access" class="price_value" name="access" value="<?php echo isset($info['access'])?$info['access']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Filing Fee</td>
				<td><input type="text" id="tax" class="price_value" name="tax" value="<?php echo isset($info['tax'])?$info['tax']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Warranty</td>
				<td><input type="text" id="warrenty" class="price_value" name="warrenty" value="<?php echo isset($info['warrenty'])?$info['warrenty']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">License & Title</td>
				<td><input type="text" id="license" class="price_value" name="license" value="<?php echo isset($info['license'])?$info['license']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Labor</td>
				<td><input type="text" id="labor" class="price_value" name="labor" value="<?php echo isset($info['labor'])?$info['labor']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Total Price</td>
				<td><input type="text" id="total_price" class="price_value" name="total_price" value="<?php echo isset($info['total_price'])?$info['total_price']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Trade In</td>
				<td><input type="text" id="trade_in" class="price_value" name="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Trade Pay-Off</td>
				<td><input type="text" id="pay_off" class="price_value" name="pay_off" value="<?php echo isset($info['pay_off'])?$info['pay_off']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Down Payment</td>
				<td><input type="text" id="down_pay" class="price_value" name="down_pay" value="<?php echo isset($info['down_pay'])?$info['down_pay']:''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="width: 70%; text-align: right;">Balance Due</td>
				<td><input type="text" id="balance_due" class="price_value" name="balance_due" value="<?php echo isset($info['balance_due'])?$info['balance_due']:''; ?>" style="width: 100%;"></td>
			</tr>
		</table>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; padding: 10px 40px; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label style="font-size: 16px;"><b>Used units are sold AS-IS, with No Warranty</b></label>
				<input type="text" name="warrenty" value="<?php echo isset($info['warrenty'])?$info['warrenty']:''; ?>" style="width: 36%; border-bottom: 1px solid #000;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; padding: 10px 40px; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label style="font-size: 16px;"><b>Deposit  hold units for a maximum of ONE WEEK only.</b></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; padding: 10px 40px; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 0;">
				<label style="font-size: 16px;"><b>All Deposits are NON-REFUNDABLE.</b></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 13%; padding: 3px 0 0; box-sizing: border-box;">
				<label style="font-size: 16px;"><b style="padding: 9px 0 0 38px; display: inline-block;">TRADE IN:</b></label>
			</div>
			<div class="form-field" style="border-left: 1px solid #000; float: left; width: 5%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>YEAR</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MAKE</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MODEL</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>COLOR</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 12%; padding: 3px 0; box-sizing: border-box; padding: 5px; border-right: 1px solid #000; text-align: center;">
				<label>MILEAGE</label>
				<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 34%; box-sizing: border-box; padding: 5px 5px 0 5px;">
				<label>TITLE #</label>
				<input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 50%; padding: 60px 0 3px; border-right: 1px solid #000; box-sizing: border-box; padding: 5px;">
				<label>SERIAL #</label>
				<input type="text" name="serial" value="<?php echo isset($info['serial'])?$info['serial']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 50%; padding: 3px 0; box-sizing: border-box; padding: 5px;">
				<label>ENGINE #</label>
				<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; border-bottom: 1px solid #000; margin: 0;">
			<div class="form-field" style="float: left; width: 100%; padding: 60px 0 3px; box-sizing: border-box; padding: 5px;">
				<label style="font-size: 16px;"><b>Remarks</b></label>
				<input type="text" name="remark" value="<?php echo isset($info['remark'])?$info['remark']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; box-sizing: border-box; text-align: center; margin: 16px 0 0; margin: 0;">
			<div class="form-field" style="float: left; width: 30%; padding: 60px 0 3px; box-sizing: border-box; padding: 5px;">
				X<input type="text" name="manage_appro" value="<?php echo isset($info['manage_appro'])?$info['manage_appro']:''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
				<label>MANAGER APPROVAL</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 60px 0 3px; box-sizing: border-box; padding: 5px; margin: 0 4%;">
				X<input type="text" name="salesman_sign" value="<?php echo isset($info['salesman_sign'])?$info['salesman_sign']:''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
				<label>SALESMAN SIGNATURE</label>
			</div>
			<div class="form-field" style="float: left; width: 30%; padding: 60px 0 3px; padding: 5px;">
				X<input type="text" name="purchase_sign" value="<?php echo isset($info['purchase_sign'])?$info['purchase_sign']:''; ?>" style="width: 94%; border-bottom: 1px solid #000;">
				<label>PURCHASER SIGNATURE</label>
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


	function calculate_total() {
       cash_price = isNaN(parseFloat($("#cash_price").val()))?0.00:parseFloat($("#cash_price").val());
       freight = isNaN(parseFloat($("#freight").val()))?0.00:parseFloat($("#freight").val());	
       assembly = isNaN(parseFloat($("#assembly").val()))?0.00:parseFloat($("#assembly").val());	
       access = isNaN(parseFloat($("#access").val()))?0.00:parseFloat($("#access").val());	
       tax = isNaN(parseFloat($("#tax").val()))?0.00:parseFloat($("#tax").val());
       warrenty = isNaN(parseFloat($("#warrenty").val()))?0.00:parseFloat($("#warrenty").val());	
       
       license = isNaN(parseFloat($("#license").val()))?0.00:parseFloat($("#license").val());	
       labor = isNaN(parseFloat($("#labor").val()))?0.00:parseFloat($("#labor").val());
       total_price = cash_price + freight +	assembly + access + tax + warrenty + license + labor;
       $("#total_price").val(total_price.toFixed(2));
       trade_in = isNaN(parseFloat($("#trade_in").val()))?0.00:parseFloat($("#trade_in").val());	
       pay_off = isNaN(parseFloat($("#pay_off").val()))?0.00:parseFloat($("#pay_off").val());
       down_pay = isNaN(parseFloat($("#down_pay").val()))?0.00:parseFloat($("#down_pay").val());
       balance_due = total_price + pay_off - trade_in - down_pay;	
       $("#balance_due").val(balance_due.toFixed(2));
    }

	$(".price_value").on('change keyup paste',function(){
        calculate_total();
    });

	//calculate();
	
	var vin = $('#vin').val();
	var vin1 = $('#vin_addon1').val();
	var vin2 = $('#vin_addon2').val();
	var res = vin.split("");
	var res1 = vin1.split("");
	var res2 = vin2.split("");
	for (var i = 0; i <= 14; i++) {
		$("#vin" + i).val(res[i]);
	}
	for (var i = 0; i <= 14; i++) {
		$("#addon1_vin" + i).val(res1[i]);
	}
	for (var i = 0; i <= 14; i++) {
		$("#addon2_vin" + i).val(res2[i]);
	}
});

	
	
	
	
	
</script>
</div>
