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
	label{font-size: 13px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px;}
	/*td, th{padding: 7px; border-bottom: 1px solid #000;}
	th{padding: 4px; border-right: 1px solid #000;}
	td:first-child, th:first-child{border-left: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{text-align: left; padding: 6px;}*/
	td{padding: 10px;}
	.right td{padding: 25px 10px;}
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
		<div class="row" style="float: left; width: 100%; margin: 7px 0 30px;">
			<div class="form-field" style="float: left; width: 50%; margin-left: 24%; text-align: center;">
				<h2 style="float: left; width: 100%; margin: 0; font-size: 30px; text-align: center;"><b>Youngbloods Capetown RV</b></h2>
				<p style="font-size: 25px;">Trade Evaluation</p>
			</div>
			<div class="form-field" style="float: right; width: 22%; margin-top: 3%;">
				<label>Sales Person</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width: 61%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 45%;">
				<label>NAME:</label>
				<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] : $info['first_name']." ".$info['last_name']; ?>" style="width: 89%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>PH#:</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>YR:</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 82.5%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>LENGTH</label>
				<input type="text" name="length" value="<?php echo isset($info['length'])?$info['length']:''; ?>" style="width: 71.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>PAYOFF:</label>
				<input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 70%;">
				<label>FINANCE COMPANY</label>
				<input type="text" name="finance" value="<?php echo isset($info['finance'])?$info['finance']:''; ?>" style="width: 81.5%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>FITH WHEEL:</label>
				<input type="checkbox" name="fith_check" <?php echo ($info['fith_check'] == "fith") ? "checked" : ""; ?> value="fith"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>TRAVEL TRAILER:</label>
				<input type="checkbox" name="travel_check" <?php echo ($info['travel_check'] == "travel") ? "checked" : ""; ?> value="travel"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>TOY HAULER:</label>
				<input type="checkbox" name="toy_check" <?php echo ($info['toy_check'] == "toy") ? "checked" : ""; ?> value="toy"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>POP UP:</label>
				<input type="checkbox" name="pop_check" <?php echo ($info['pop_check'] == "pop") ? "checked" : ""; ?> value="pop"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>HYBRID:</label>
				<input type="checkbox" name="hybrid_check" <?php echo ($info['hybrid_check'] == "hybrid") ? "checked" : ""; ?> value="hybrid"/>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label># OF SLIDES:</label>
				<input type="text" name="slides" value="<?php echo isset($info['slides'])?$info['slides']:''; ?>" style="width: 55%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label># ROOF A?C:</label>
				<input type="text" name="roof" value="<?php echo isset($info['roof'])?$info['roof']:''; ?>" style="width: 56%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>METAL:</label>
				<input type="checkbox" name="metal_check" <?php echo ($info['metal_check'] == "metal") ? "checked" : ""; ?> value="metal"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>FIBERGLASS:</label>
				<input type="checkbox" name="fiberglass_check" <?php echo ($info['fiberglass_check'] == "fiberglass") ? "checked" : ""; ?> value="fiberglass"/>
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label style="float: left;">DELAM:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="dealm_status" value="Yes" <?php echo ($info['dealm_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="dealm_status" value="No" <?php echo ($info['dealm_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>EXPLAIN DELAM:</label>
				<input type="text" name="delam" value="<?php echo isset($info['delam'])?$info['delam']:''; ?>" style="width: 88.5%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>COLOR:</label>
				<input type="text" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: left; width: 20%;">
				<label>INTERIOR:</label>
				<input type="text" name="interior" value="<?php echo isset($info['interior'])?$info['interior']:''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label style="float: left;">FULL BODY PAINT:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="paint_status" value="Yes" <?php echo ($info['paint_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="paint_status" value="No" <?php echo ($info['paint_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label style="float: left;">STICKER GRAPHICS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="sticker_status" value="Yes" <?php echo ($info['sticker_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="sticker_status" value="No" <?php echo ($info['sticker_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label>AWNING</label>
				<span>POWER/MANUAL</span>
			</div>
			<div class="form-field" style="float: left; width: 25%;">
				<label style="float: left;">SLIDE AWNINGS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="slide_status" value="Yes" <?php echo ($info['slide_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="slide_status" value="No" <?php echo ($info['slide_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>BEDS:</label>
				<span>KING</span><span><input type="checkbox" style="margin: 0 5px;" name="king_check" <?php echo ($info['king_check'] == "king") ? "checked" : ""; ?> value="king"></span><span>QUEEN</span><span><input type="checkbox" name="queen_check" style="margin: 0 5px;" <?php echo ($info['queen_check'] == "queen") ? "checked" : ""; ?> value="queen"/></span><span>FULL</span><span><input type="checkbox" name="full_check" style="margin: 0 5px;" <?php echo ($info['full_check'] == "full") ? "checked" : ""; ?> value="full"/></span><span>TWIN</span><input type="checkbox" name="twin_check" style="margin: 0 5px;" <?php echo ($info['twin_check'] == "twin") ? "checked" : ""; ?> value="twin"/><span></span><span>BUNKS</span><span><input type="checkbox" name="bunks_check" style="margin: 0 5px;" <?php echo ($info['bunks_check'] == "bunks") ? "checked" : ""; ?> value="bunks"/></span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 25%;">
				<label># OF TV'S:</label>
				<input type="text" name="tv" value="<?php echo isset($info['tv'])?$info['tv']:''; ?>" style="width: 63%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label style="float: left;">REFRIGERATOR TYPE:</label>
				<input type="text" name="refriger" value="<?php echo isset($info['refriger'])?$info['refriger']:''; ?>" style="width: 57%;">
			</div>
			<div class="form-field" style="float: left; width: 40%;">
				<label style="float: left;">INVERTER:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="invert_status" value="Yes" <?php echo ($info['invert_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="invert_status" value="No" <?php echo ($info['invert_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">ARE YOU THE ORGINAL OWNER:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="orginal_status" value="Yes" <?php echo ($info['orginal_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="orginal_status" value="No" <?php echo ($info['orginal_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">HAS THE RV BEEN SMOKED IN:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="smoked_status" value="Yes" <?php echo ($info['smoked_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="smoked_status" value="No" <?php echo ($info['smoked_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">HAS RV BEEN LIVED IN:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="lived_status" value="Yes" <?php echo ($info['lived_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="lived_status" value="No" <?php echo ($info['lived_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">HAS RV HAD PETS::</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="pet_status" value="Yes" <?php echo ($info['pet_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="pet_status" value="No" <?php echo ($info['pet_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">BATTERIES GOOD:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="good_status" value="Yes" <?php echo ($info['good_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="good_status" value="No" <?php echo ($info['good_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">ORGINAL BOOKS & MANUALS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="manual_status" value="Yes" <?php echo ($info['manual_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="manual_status" value="No" <?php echo ($info['manual_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">ORGINAL BEDSPREAD:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="bed_status" value="Yes" <?php echo ($info['bed_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="bed_status" value="No" <?php echo ($info['bed_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">ALL REMOTES:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="remote_status" value="Yes" <?php echo ($info['remote_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="remote_status" value="No" <?php echo ($info['remote_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">TIRE ORGINAL:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="tire_status" value="Yes" <?php echo ($info['tire_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="tire_status" value="No" <?php echo ($info['tire_status'] == "No") ? "checked" : ""; ?> /> No</label>
				<input type="text" name="tire" value="<?php echo isset($info['tire'])?$info['tire']:''; ?>" style="width: 30%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">TIRES MATCHING BRANDS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="matching_status" value="Yes" <?php echo ($info['matching_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="matching_status" value="No" <?php echo ($info['matching_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">SIDEWALLS DRY ROTTEN:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="rotten_status" value="Yes" <?php echo ($info['rotten_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="rotten_status" value="No" <?php echo ($info['rotten_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">WEARING EVEN:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="wearing_status" value="Yes" <?php echo ($info['wearing_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="wearing_status" value="No" <?php echo ($info['wearing_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">ALUMINUM WHEELS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="aluminum_status" value="Yes" <?php echo ($info['aluminum_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="aluminum_status" value="No" <?php echo ($info['aluminum_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">POWER LEVELING JACKS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="jack_status" value="Yes" <?php echo ($info['jack_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="jack_status" value="No" <?php echo ($info['jack_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">POWER TONGUE JACK:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="tongue_status" value="Yes" <?php echo ($info['tongue_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="tongue_status" value="No" <?php echo ($info['tongue_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">SURROUND SOUND:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="sound_status" value="Yes" <?php echo ($info['sound_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="sound_status" value="No" <?php echo ($info['sound_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">DVD OR VCR:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="dvd_status" value="Yes" <?php echo ($info['dvd_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="dvd_status" value="No" <?php echo ($info['dvd_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">COMBO WASHER DRYER:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="washer_status" value="Yes" <?php echo ($info['washer_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="washer_status" value="No" <?php echo ($info['washer_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">STACK WASHER DRYER:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="dryer_status" value="Yes" <?php echo ($info['dryer_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="dryer_status" value="No" <?php echo ($info['dryer_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">DAY/NIGHT SHADES:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="night_status" value="Yes" <?php echo ($info['night_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="night_status" value="No" <?php echo ($info['night_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
			<div class="form-field" style="float: left; width: 33.33%;">
				<label style="float: left;">DUAL PANE WINDOWS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="pane_status" value="Yes" <?php echo ($info['pane_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="radio" name="pane_status" value="No" <?php echo ($info['pane_status'] == "No") ? "checked" : ""; ?> /> No</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">CARPET & FlOORING:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="carpet_status" value="1" <?php echo ($info['carpet_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="carpet_status" value="2" <?php echo ($info['carpet_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="carpet_status" value="3" <?php echo ($info['carpet_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="carpet_status" value="4" <?php echo ($info['carpet_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">SOFA & CHAIRS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="sofa_status" value="1" <?php echo ($info['sofa_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="sofa_status" value="2" <?php echo ($info['sofa_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="sofa_status" value="3" <?php echo ($info['sofa_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="sofa_status" value="4" <?php echo ($info['sofa_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">DINETTE:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="dinette_status" value="1" <?php echo ($info['dinette_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="dinette_status" value="2" <?php echo ($info['dinette_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="dinette_status" value="3" <?php echo ($info['dinette_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="dinette_status" value="4" <?php echo ($info['dinette_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">CABINETS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="cabinet_status" value="1" <?php echo ($info['cabinet_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="cabinet_status" value="2" <?php echo ($info['cabinet_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="cabinet_status" value="3" <?php echo ($info['cabinet_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="cabinet_status" value="4" <?php echo ($info['cabinet_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">REFRIGERATOR:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="refre_status" value="1" <?php echo ($info['refre_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="refre_status" value="2" <?php echo ($info['refre_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="refre_status" value="3" <?php echo ($info['refre_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="refre_status" value="4" <?php echo ($info['refre_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">STOVE/OVEN:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="stove_status" value="1" <?php echo ($info['stove_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="stove_status" value="2" <?php echo ($info['stove_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="stove_status" value="3" <?php echo ($info['stove_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="stove_status" value="4" <?php echo ($info['stove_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">BEDSPREAD:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="bed_status" value="1" <?php echo ($info['bed_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="bed_status" value="2" <?php echo ($info['bed_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="bed_status" value="3" <?php echo ($info['bed_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="bed_status" value="4" <?php echo ($info['bed_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">CHAIRS:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="chair_status" value="1" <?php echo ($info['chair_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="chair_status" value="2" <?php echo ($info['chair_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="chair_status" value="3" <?php echo ($info['chair_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="chair_status" value="4" <?php echo ($info['chair_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding: 0 80px;">
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">INTERIOR:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="interior_status" value="1" <?php echo ($info['interior_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="interior_status" value="2" <?php echo ($info['interior_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="interior_status" value="3" <?php echo ($info['interior_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="interior_status" value="4" <?php echo ($info['interior_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label style="float: left;">EXTERIOR:</label>
				<label style="display: block; float: left; margin-left: 6px;"><input type="radio" name="exterior_status" value="1" <?php echo ($info['exterior_status'] == "1") ? "checked" : ""; ?> /> 1 <input type="radio" name="exterior_status" value="2" <?php echo ($info['exterior_status'] == "2") ? "checked" : ""; ?> /> 2 <input type="radio" name="exterior_status" value="3" <?php echo ($info['exterior_status'] == "3") ? "checked" : ""; ?> /> 3 <input type="radio" name="exterior_status" value="4" <?php echo ($info['exterior_status'] == "4") ? "checked" : ""; ?> /> 4</label>
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>ANY ADDITIONAL DAMAGE:</label>
				<input type="text" name="damage" value="<?php echo isset($info['damage'])?$info['damage']:''; ?>" style="width: 81.5%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>Customer affirms that the above information is true and correct X</label>
				<input type="text" name="damage" value="<?php echo isset($info['damage'])?$info['damage']:''; ?>" style="width: 59.5%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label>STOCK #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 66%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>MODEL:</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 88%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MSRP: $</label>
				<input type="text" name="msrp" value="<?php echo isset($info['msrp'])?$info['msrp']:''; ?>" style="width: 53.5%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>ADDS:</label>
				<input type="text" name="adds1" value="<?php echo isset($info['adds1'])?$info['adds1']:''; ?>" style="width: 30%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 42%;">
				<input type="text" name="adds2" value="<?php echo isset($info['adds2'])?$info['adds2']:''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 50%;">
				<label>TRADE DIFFERENCE: $</label>
				<input type="text" name="diff" value="<?php echo isset($info['diff'])?$info['diff']:''; ?>" style="width: 40%;">
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
