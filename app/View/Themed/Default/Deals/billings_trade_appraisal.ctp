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
	label{font-size: 12px; font-weight: normal; margin-bottom: 0px;}
	.wraper.main input {padding: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 99%; padding-left: 1%;}
	table{font-size: 14px;}
	td, th{padding: 0px; border-bottom: 0px solid #000;}
	td:first-child{border-left: 0px solid #000;}
	td{border-right: 0px solid #000;}
	table input[type="text"]{border: 0px;}
	.cover input[type="text"]{border: 0px;}
	.no-border input[type="text"]{border: 0px;}
	
	
	
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 50% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<h2 style="float: left; width: 70%; text-align: center; font-size: 16px; margin-top: 18px;"><b>RV Trade Appraisal</b></h2>
			<div class="logo" style="float: left; width: 100px; margin: 0;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/pierce.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 60%;">
				<label>Class:</label>
				<label style="margin: 0 2%;"><input type="radio" name="class_a" value="a" <?php echo (isset($info['class_a']) && $info['class_a']=='a')?'checked="checked"':''; ?> /> A</label>
				<label style="margin: 0 1%;"><input type="radio" name="class_b" value="b" <?php echo (isset($info['class_b']) && $info['class_b']=='b')?'checked="checked"':''; ?> /> B</label>
				<label style="margin: 0 2%;"><input type="radio" name="class_c" value="yes" <?php echo (isset($info['class_c']) && $info['class_c']=='c')?'checked="checked"':''; ?> /> C</label>
				<label style="margin: 0 1%;"><input type="radio" name="class_tt" value="tt" <?php echo (isset($info['class_tt']) && $info['class_tt']=='tt')?'checked="checked"':''; ?> /> TT</label>
				<label style="margin: 0 1%;"><input type="radio" name="class_fw" value="fw" <?php echo (isset($info['class_fw']) && $info['class_fw']=='fw')?'checked="checked"':''; ?> /> FW</label>
				<label style="margin: 0 1%;"><input type="radio" name="class_tent" value="tent" <?php echo (isset($info['class_tent']) && $info['class_tent']=='tent')?'checked="checked"':''; ?> /> TENT</label>
				<label style="margin: 0 1%;"><input type="radio" name="class_slide" value="slide" <?php echo (isset($info['class_slide']) && $info['class_slide']=='slide')?'checked="checked"':''; ?> /> SLIDE-IN</label>
				<label style="margin: 0 1%;">(Circle One)</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Toy Hauler </label>
				<label style="margin: 0 2%;"><input type="radio" name="toy_check" value="yes" <?php echo (isset($info['toy_check']) && $info['toy_check']=='yes')?'checked="checked"':''; ?> /> Y</label>/
				<label style="margin: 0 2%;"><input type="radio" name="toy_check" value="no" <?php echo (isset($info['toy_check']) && $info['toy_check']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 74%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>Cust#: </label>
				<input type="text" name="cust" value="<?php echo isset($info['cust'])?$info['cust']:''; ?>" style="width: 85%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>New Stock # </label>
				<input type="text" name="new_stock" value="<?php echo isset($info['new_stock'])?$info['new_stock']:''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 33%;">
				<label>Assigned Stock #:  </label>
				<input type="text" name="assigned_stock" value="<?php echo isset($info['assigned_stock'])?$info['assigned_stock']:''; ?>" style="width: 64%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Customer Name</label>
				<input type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Sales Rep:</label>
				<input type="text" name="sales_rep" value="<?php echo isset($info['sales_rep'])?$info['sales_rep']:''; ?>" style="width: 83.6%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 83%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Model</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Floorplan  </label>
				<input type="text" name="floorplan" value="<?php echo isset($info['floorplan']) ? $info['floorplan'] : ''; ?>" style="width: 71%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Length</label>
				<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" style="width: 77%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Miles</label>
				<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Miles Actual? </label>
				<label style="margin: 0 2%;"><input type="radio" name="miles_act" value="yes" <?php echo (isset($info['miles_act']) && $info['miles_act']=='yes')?'checked="checked"':''; ?> /> Y</label>/
				<label style="margin: 0 2%;"><input type="radio" name="miles_act" value="no" <?php echo (isset($info['miles_act']) && $info['miles_act']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Odometer replaced?    </label>
				<label style="margin: 0 2%;"><input type="radio" name="odometer_replaced" value="yes" <?php echo (isset($info['odometer_replaced']) && $info['odometer_replaced']=='yes')?'checked="checked"':''; ?> /> Y</label>/
				<label style="margin: 0 2%;"><input type="radio" name="odometer_replaced" value="no" <?php echo (isset($info['odometer_replaced']) && $info['odometer_replaced']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>Chassis</label>
				<input type="text" name="chassis" value="<?php echo isset($info['chassis']) ? $info['chassis'] : ''; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Engine / HP</label>
				<input type="text" name="engine" value="<?php echo isset($info['engine']) ? $info['engine'] : ''; ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 15%;">
				<label>Gen</label>
				<label style="margin: 0 2%;"><input type="radio" name="gen_status" value="yes" <?php echo (isset($info['gen_status']) && $info['gen_status']=='yes')?'checked="checked"':''; ?> /> Y</label>/
				<label style="margin: 0 2%;"><input type="radio" name="gen_status" value="no" <?php echo (isset($info['gen_status']) && $info['gen_status']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Gen Make</label>
				<input type="text" name="gen_make" value="<?php echo isset($info['gen_make']) ? $info['gen_make'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 16%;">
				<label>Size </label>
				<input type="text" name="size" value="<?php echo isset($info['size']) ? $info['size'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 24%;">
				<label>Fuel?</label>
				<label style="margin: 0 2%;"><input type="radio" name="fuel_dsl" value="dsl" <?php echo (isset($info['fuel_dsl']) && $info['fuel_dsl']=='dsl')?'checked="checked"':''; ?> /> Dsl</label>/
				<label style="margin: 0 2%;"><input type="radio" name="fuel_gas" value="gas" <?php echo (isset($info['fuel_gas']) && $info['fuel_gas']=='gas')?'checked="checked"':''; ?> /> Gas</label>/
				<label style="margin: 0 2%;"><input type="radio" name="fuel_pro" value="pro" <?php echo (isset($info['fuel_pro']) && $info['fuel_pro']=='pro')?'checked="checked"':''; ?> /> Pro</label>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>Hours</label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 73%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; padding-bottom: 20px; border-bottom: 4px solid #000;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>Tire Year</label>
				<input type="text" name="tire_year" value="<?php echo isset($info['tire_year']) ? $info['tire_year'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>Tire Size</label>
				<input type="text" name="tire_size" value="<?php echo isset($info['tire_size']) ? $info['tire_size'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>Tires have sidewall cracks?</label>
				<label style="margin: 0 2%;"><input type="radio" name="tire_crack" value="yes" <?php echo (isset($info['tire_crack']) && $info['tire_crack']=='yes')?'checked="checked"':''; ?> /> Y</label>/
				<label style="margin: 0 2%;"><input type="radio" name="tire_crack" value="no" <?php echo (isset($info['tire_crack']) && $info['tire_crack']=='no')?'checked="checked"':''; ?> /> N</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Overall Condition on a scale from 1 to 10 (10=excellent, 5=fair, 1=rough):</label>
				<label>Int</label>
				<input type="text" name="int" value="<?php echo isset($info['int']) ? $info['int'] : ''; ?>" style="width: 20%;">
				<label>Ext</label>
				<input type="text" name="ext" value="<?php echo isset($info['ext']) ? $info['ext'] : ''; ?>" style="width: 20%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="left" style="float: left; width: 40%; margin: 0;">
				<div class="row" style="float: left; width: 100%;">
					<p style="float: left; width: 100%; font-size: 14px; margin: 3px 12px;">Does unit have:</p>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;">Fogged windows</label>
						#<input type="text" name="fogged" value="<?php echo isset($info['fogged']) ? $info['fogged'] : ''; ?>" style="width: 20%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;">Windshield cracks</label>
						<label style="margin: 0 2%;"><input type="radio" name="windshield_crack" value="yes" <?php echo (isset($info['windshield_crack']) && $info['windshield_crack']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="windshield_crack" value="no" <?php echo (isset($info['windshield_crack']) && $info['windshield_crack']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Body Damage </label>
						<label style="margin: 0 2%;"><input type="radio" name="body_damage" value="yes" <?php echo (isset($info['body_damage']) && $info['body_damage']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="body_damage" value="no" <?php echo (isset($info['body_damage']) && $info['body_damage']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;">  Weak Flooring  </label>
						<label style="margin: 0 2%;"><input type="radio" name="weak_flooring" value="yes" <?php echo (isset($info['weak_flooring']) && $info['weak_flooring']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="weak_flooring" value="no" <?php echo (isset($info['weak_flooring']) && $info['weak_flooring']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Rust </label>
						<label style="margin: 0 2%;"><input type="radio" name="rust" value="yes" <?php echo (isset($info['rust']) && $info['rust']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="rust" value="no" <?php echo (isset($info['rust']) && $info['rust']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Water Damage </label>
						<label style="margin: 0 2%;"><input type="radio" name="water_damage" value="yes" <?php echo (isset($info['water_damage']) && $info['water_damage']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="water_damage" value="no" <?php echo (isset($info['water_damage']) && $info['water_damage']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Rotten Panels  </label>
						<label style="margin: 0 2%;"><input type="radio" name="rotten_panel" value="yes" <?php echo (isset($info['rotten_panel']) && $info['rotten_panel']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="rotten_panel" value="no" <?php echo (isset($info['rotten_panel']) && $info['rotten_panel']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Pets </label>
						<label style="margin: 0 2%;"><input type="radio" name="pets" value="yes" <?php echo (isset($info['pets']) && $info['pets']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="pets" value="no" <?php echo (isset($info['pets']) && $info['pets']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Smoking </label>
						<label style="margin: 0 2%;"><input type="radio" name="smoking" value="yes" <?php echo (isset($info['smoking']) && $info['smoking']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="smoking" value="no" <?php echo (isset($info['smoking']) && $info['smoking']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;"> Sidewall Cracking </label>
						<label style="margin: 0 2%;"><input type="radio" name="slide_cracking" value="yes" <?php echo (isset($info['slide_cracking']) && $info['slide_cracking']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="slide_cracking" value="no" <?php echo (isset($info['slide_cracking']) && $info['slide_cracking']=='no')?'checked="checked"':''; ?> /> N</label>
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0; box-sizing: border-box; padding-left: 10%;">
						<label style="display: inline-block; width: 40%;">  Delamination*  </label>
						<label style="margin: 0 2%;"><input type="radio" name="delamination" value="yes" <?php echo (isset($info['delamination']) && $info['delamination']=='yes')?'checked="checked"':''; ?> /> Y</label>/
						<label style="margin: 0 2%;"><input type="radio" name="delamination" value="no" <?php echo (isset($info['delamination']) && $info['delamination']=='no')?'checked="checked"':''; ?> /> N</label>
						<p style="float: left; width: 100%; margin: 0; font-size: 12px;">(<sup>*</sup> separation, bulges or soft spots in the walls, floors or ceiling)</p>
					</div>
				</div>
			</div>	
			<div class="right" style="float: right; width: 50%; margin: 0;">
				<div class="row" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 100%; margin: 0 0 40px;">
						<label><i>Drawing of Floorplan:</i></label>
						<textarea name="drawing" style="width: 98%; float: left; height: 120px; border: 1px solid #000;"><?php echo isset($info['drawing'])?$info['drawing']:'' ?></textarea>
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #000;">
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Number of Slides</label>
						<input type="text" name="num_slides" value="<?php echo isset($info['num_slides']) ? $info['num_slides'] : ''; ?>" style="width: 76%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Exterior Color</label>
						<input type="text" name="exterior" value="<?php echo isset($info['exterior']) ? $info['exterior'] : ''; ?>" style="width: 80%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Interior Color</label>
						<input type="text" name="interior" value="<?php echo isset($info['interior']) ? $info['interior'] : ''; ?>" style="width: 81%;">
					</div>
					<div class="form-field" style="float: left; width: 100%; margin: 3px 0;">
						<label>Cabinet Color</label>
						<input type="text" name="cabinet" value="<?php echo isset($info['cabinet']) ? $info['cabinet'] : ''; ?>" style="width: 80.2%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>If you answered YES to any of the above questions, please explain below:</label>
				<input type="text" name="answer1" value="<?php echo isset($info['answer1']) ? $info['answer1'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="answer2" value="<?php echo isset($info['answer2']) ? $info['answer2'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="answer3" value="<?php echo isset($info['answer3']) ? $info['answer3'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				<input type="text" name="answer4" value="<?php echo isset($info['answer4']) ? $info['answer4'] : ''; ?>" style="width: 100%; margin: 3px 0;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0; border-bottom: 6px solid black;">
			<div class="left" style="float: left; width: 40%;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>Do all appliances work?</label>
					<label style="margin: 0 2%;"><input type="radio" name="appliance_work" value="yes" <?php echo (isset($info['appliance_work']) && $info['appliance_work']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="appliance_work" value="no" <?php echo (isset($info['appliance_work']) && $info['appliance_work']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Do all house and chassis components work?</label>
					<label style="margin: 0 2%;"><input type="radio" name="component_work" value="yes" <?php echo (isset($info['component_work']) && $info['component_work']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="component_work" value="no" <?php echo (isset($info['component_work']) && $info['component_work']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Batteries age</label>
					<input type="text" name="batteries" value="<?php echo isset($info['batteries']) ? $info['batteries'] : ''; ?>" style="width: 10%;">
					<label>Hold Chagre?</label>
					<label style="margin: 0 2%;"><input type="radio" name="hold_chagre" value="yes" <?php echo (isset($info['hold_chagre']) && $info['hold_chagre']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="hold_chagre" value="no" <?php echo (isset($info['hold_chagre']) && $info['hold_chagre']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Glassmat?</label>
					<label style="margin: 0 2%;"><input type="radio" name="glassmat" value="yes" <?php echo (isset($info['glassmat']) && $info['glassmat']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label style="margin: 0 2%;"><input type="radio" name="glassmat" value="no" <?php echo (isset($info['glassmat']) && $info['glassmat']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Existing INS or EXT Warr Claims?</label>
					<label style="margin: 0 2%;"><input type="radio" name="claims" value="yes" <?php echo (isset($info['claims']) && $info['claims']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="claims" value="no" <?php echo (isset($info['claims']) && $info['claims']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>Mattress Cover in unit?</label>
					<label style="margin: 0 2%;"><input type="radio" name="mattress" value="yes" <?php echo (isset($info['mattress']) && $info['mattress']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="mattress" value="no" <?php echo (isset($info['mattress']) && $info['mattress']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
				<div class="form-field" style="float: left; width: 100%;">
					<label>All Furniture Original, nothing missing?</label>
					<label style="margin: 0 2%;"><input type="radio" name="furniture" value="yes" <?php echo (isset($info['furniture']) && $info['furniture']=='yes')?'checked="checked"':''; ?> />Y</label>/
					<label><input type="radio" name="furniture" value="no" <?php echo (isset($info['furniture']) && $info['furniture']=='no')?'checked="checked"':''; ?> />N</label>
				</div>
			</div>
			
			<div class="center" style="width: 4%; float: left;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/center-bracket.jpg'); ?>" alt="" style="width: 100%; height: 165px;">
			</div>
			
			<div class="right" style="float: right; width: 55%; margin-bottom: 7px;">
				<div class="form-field" style="float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 6px;">
					<label>If NO, please explain</label>
					<input type="text" name="explain1" value="<?php echo isset($info['explain1']) ? $info['explain1'] : ''; ?>" style="width: 76%; float: right; margin: 5px 0;">
					<input type="text" name="explain2" value="<?php echo isset($info['explain2']) ? $info['explain2'] : ''; ?>" style="width: 100%; margin: 3px 0;">
					<input type="text" name="explain3" value="<?php echo isset($info['explain3']) ? $info['explain3'] : ''; ?>" style="width: 100%; margin: 3px 0;">
					<input type="text" name="explain4" value="<?php echo isset($info['explain4']) ? $info['explain4'] : ''; ?>" style="width: 100%; margin: 3px 0;">
					<input type="text" name="explain5" value="<?php echo isset($info['explain5']) ? $info['explain5'] : ''; ?>" style="width: 100%; margin: 3px 0;">
					<input type="text" name="explain6" value="<?php echo isset($info['explain6']) ? $info['explain6'] : ''; ?>" style="width: 100%; margin: 3px 0;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 10px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>List any options in addition to the standard features that add value to the unit:</label>
				<input type="text" name="option1" value="<?php echo isset($info['option1']) ? $info['option1'] : ''; ?>" style="float: left; width: 100%; margin: 3px 0;">
				<input type="text" name="option2" value="<?php echo isset($info['option2']) ? $info['option2'] : ''; ?>" style="float: left; width: 100%; margin: 3px 0;">
				<input type="text" name="option3" value="<?php echo isset($info['option3']) ? $info['option3'] : ''; ?>" style="float: left; width: 100%; margin: 3px 0;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 5px 0; padding-top: 14px;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>CUSTOMER SIGNATURE:</label>
				<input type="text" name="custom_sign" value="<?php echo isset($info['custom_sign']) ? $info['custom_sign'] : ''; ?>" style="width: 50%; margin: 3px 0;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="float: left; width: 33%;">
				<label>NADA</label>
				<input type="text" name="nada" value="<?php echo isset($info['nada']) ? $info['nada'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 34%;">
				<label>Suggested List</label>
				<input type="text" name="suggested" value="<?php echo isset($info['suggested']) ? $info['suggested'] : ''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 33%; margin-bottom: 10px;">
				<label>ACV</label>
				<input type="text" name="acv" value="<?php echo isset($info['acv']) ? $info['acv'] : ''; ?>" style="width: 90%;">
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
