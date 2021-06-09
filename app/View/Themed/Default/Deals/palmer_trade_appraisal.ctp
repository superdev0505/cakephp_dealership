<?php

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');
$dealer_id = AuthComponent::user('dealer_id');

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
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
    <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width: 800px; margin:0 auto;">
		<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}

body {
	font-family:"Arial";
}

a {
	text-decoration:none;
	color:inherit;
}
hr {
display: block;
margin-top:0.1em;
margin-bottom:0.1em;

border-style: inset;
border-width: 1px;
}
input{
    border: 1px solid #aaa;
    padding: 5px 0;
	
	
	
}
input, textarea, keygen, select, button, isindex {
margin-top: 0em;
}


.clear:after {
    content: '';
    display: table;
    clear: both;
}

.full,
.half,
.three,
.four,
.two-three,.six,.label20,.label30,.eight {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
}

.label20{
	width:19%;
}
.label30{
	width:28%;
}
.six {
	width :15%
}
.eight {
	width :12%
}
.full {
	width: 99%;
}

.half {
	width: 49%;
}

.three {
	width: 32.33%;
}

.four {
	width: 24%;
}

.two-three {
	width: 65.66%;
}

.wraper.main,
.wraper.main *{
	box-sizing: border-box;
}

.wraper.main{
	width:1048px;
	background:#fff;
	padding: 0;
	margin:0px auto;
	border-radius: 7px;
}

.wraper.main input {
	padding: 5px;
	margin:2px 0px 2px 0px;
}
.wraper.main input::-moz-placeholder {
     padding: 1px 1px 1px 1px;
}
.wraper.main input:-moz-placeholder {
    text-indent: 3.8%;     
}
.have-border {
    border: 1px solid #aaa;
}

button, select, option{
	cursor:pointer;
	padding:4px 0;
}
.top-three {
    display: inline-block;
    width: 33%;
    padding:0 3px;
}

.date{
	text-align:center;
	padding: 18px 0;
}
.red{
color:red;
}
.sub-title {
	font-weight:bold;
	text-align:center;
	padding:4px 0;
}

.condition-text {
    width: 32%;
    display: inline-block;
}

.select-person select {
    width: 100%;
}

.condition-input {
    width: 32.33%;
}

.salesection input {
    width: 30%;
}
.salesection span {
    width: 65%;
    display: inline-block;
}

.wraper-section {
	margin-bottom: 15px;
}

.content-left {
    width: 63.76%;
    border: 1px solid #aaa;
    padding: 10px 3px;
    display: inline-block;
    float: left;
    margin: 0 0 0 12px;
}
.content-left .col1 {
    width: 10%;
}
.content-left .col2 {
    width: 20%;
}
.content-left .col3 {
    width: 25%;
}
.content-left .col4 {
    width: 41%;
}

.content-right {
    width: 31.4%;
    display: inline-block;
    height: 119px;
    padding: 5px;
    border: 1px solid #aaa;
    margin: 0 7px 0 7px;
}

.wraper.content.middle:after {
    content: "";
    clear: both;
    display: table;
}

.detail-left p {
    font-weight: bold;
}

.detail-left hr {
    border-color: #000;
    margin: 0 0 29px 0;
}

.detail-right .col1 {
    width: 99%;
}
.detail-right .col2 {
    width: 48%;
}
.detail-right .col3 {
    width: 32.4%;
}

.footer button {
    padding: 10px 0;
    width: 33%;
}
.wraper.footer {
    padding: 10px 10px 30px 10px;
}

/*2nd Form*/

.left1{
    width: 50%;
   
    padding: 3px;
    display: inline-table;
	margin:1px 0;
	
}
.right1{
    width: 49%;
   
    padding: 3px;
    display: inline-table;
	margin:1px 0;
	
}
textarea{width:100%;}
 
.input3 {
    width: 3%;
}
.input5 {
    width: 5%;
}
.input12 {
    width: 12%;
}
.input15 {
    width: 15%;
}
.input17 {
    width: 17%;
}
.input20 {
    width: 20%;
}
.input35 {
    width: 33%;
}
.input37 {
    width: 35%;
}
.input60 {
    width: 55%;
}
.span24 {
    width: 24%;
    display: inline-block;
}
.span15 {
    width: 15%;
    display: inline-block;
}
.span60 {
    width: 62%;
    display: inline-block;
}

.input70 {
    width: 68%;
}
.input71 {
    width: 69%;
}

.input33 {
    width: 30.4%;
}

.separator1 {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}
.separatorFoot {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}
.width100{
width:100%;
}

.center {
    height: 64px;
}
.center span {
    width: 40%;
    display: inline-block;
}
.center input {
    width: 55%;
}

.blank {
    visibility: hidden;
    padding: 190px 0 0px 0;
}
.blank2 {
    visibility: hidden;
    padding: 172px 0 0px 0;
}
.blank3 {
    visibility: hidden;
    padding: 86px 0 0px 0;
}

.left-margin {
    text-align: left;
}

.select.condition {
    width: 32.43%;
}

.lookup {
    width: 32.33%;
}

.have-border.two-three {
    padding: 10px;
}

.wraper-section.clear.foot {
    padding: 0 0 20px 0;
}
.wraper-section.clear.foot button {
    width: 33%;
    padding: 7px 0;
}

.separator1-half {
    display: inline-block;
    width: 49.66%;
    text-align: center;
    background: #000;
    color: #fff;
    padding: 7px 0;
}
.print_month
	{
		display:none;
	}
table td{padding:5px;}	

.bold-border{width:45%;float:left;height:25px!important;}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	input[type=text]{height:13px;border:none;}
	input[type=text]{border-bottom: 1px solid #000;}
	table td{padding:2px!important;}
	
	label.inline-input{font-size:12px!important;margin:0px!important; vertical-align:top;}
	.bold-border{border:2px solid #000!important;}
	.wraper.main input{margin:0px!important;}
}
</style>

		<div class="wraper header"> 
			
            <h2 style="text-align:center;">
            <?php $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealer-logo.png';
			echo $this->Html->image( $dealer_logo);
			 ?>           
           </h2>   
            <h4 style="text-align:center;padding-botttom:15px;">
           USED TRUCK APPRAISAL &nbsp;
             Appraisal Good for 30 days
             </h4>   
       
           <table style="width:100%">
           <tr>
           <td width="50%"><label class="inline-input">Completed By &nbsp;</label><input type="text" name="completed_by" value="<?php echo isset($info['completed_by'])?$info['completed_by']:$info['sperson']; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Date &nbsp;</label><input type="text" name="completed_date" value="<?php echo isset($info['completed_date'])?$info['completed_date']:$expectedt; ?>" />
           </td>
           </tr>
                   
           <tr>
           <td width="50%"><label class="inline-input">Name: &nbsp;</label><input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Ordered Truck: &nbsp;<input type="radio" name="ordered_truck" value="yes" <?php echo (isset($info['ordered_truck']) && $info['ordered_truck']=='yes')?'checked="checked"':'';  ?> />
Yes &nbsp;&nbsp;&nbsp;           <input type="radio" name="ordered_truck" value="no" <?php echo (isset($info['ordered_truck']) && $info['ordered_truck']=='no')?'checked="checked"':'';  ?> /> No
           </label>
           </td>
           </tr>
           
            <tr>
           <td width="50%"><label class="inline-input">Address: &nbsp;</label><input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:$info['address']; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Expected Delivery Date: &nbsp;</label><input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" />
           </td>
           </tr>
           
            <tr>
           <td width="50%"><label class="inline-input">City, State, Zip: &nbsp;</label><input type="text" name="city_state_zip" value="<?php echo isset($info['city_state_zip'])?$info['city_state_zip']:$info['city'].", {$info['state']}, {$info['zip']}"; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Estimated Miles/Month: &nbsp;</label><input type="text" name="estimated_miles" value="<?php echo isset($info['estimated_miles'])?$info['estimated_miles']:''; ?>" />
           </td>
           </tr>
            
                   
          	<tr>
           <td width="50%"><label class="inline-input">Stock # &nbsp;</label><input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:$info['stock_num']; ?>" /></label></td>
           <td width="50%">
           <label class="inline-input">Description: &nbsp;<input type="text" name="description" value="<?php echo isset($info['description'])?$info['description']:''; ?>" />
           </td>
           </tr>
           
           <tr>
           <td width="50%"><label class="inline-input">Make: &nbsp;</label><input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:$info['make']; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Year: &nbsp;</label><input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" />
           </td>
           </tr>
           
           <tr>
           <td width="50%"><label class="inline-input">Model:  &nbsp;</label><input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Mileage: &nbsp;</label><input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" />
           </td>
           </tr>
           
           <tr>
           <td width="50%"><label class="inline-input">VIN:  &nbsp;</label><input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" /></td>
           <td width="50%">
           <label class="inline-input">ECM Mileage: &nbsp;</label><input type="text" name="ecm_odometer" value="<?php echo isset($info['ecm_odometer'])?$info['ecm_odometer']:''; ?>" />
           </td>
           </tr>
           
            <tr>
           <td width="50%"><label class="inline-input">Equip type:  &nbsp;</label><input type="text" name="equip_type" value="<?php echo isset($info['equip_type'])?$info['equip_type']:''; ?>" /></label></td>
           <td width="50%">
           <label class="inline-input">Application: &nbsp;<input type="text" name="application" value="<?php echo isset($info['application'])?$info['application']:''; ?>" />
           </td>
           </tr>
           
                     
            <tr>
           <td width="50%"><label class="inline-input">Engine Make:  &nbsp;</label><input type="text" name="engine_make" value="<?php echo isset($info['engine_make'])?$info['engine_make']:''; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Sleeper Type: &nbsp;</label><input type="text" name="sleeper_type" value="<?php echo isset($info['sleeper_type'])?$info['sleeper_type']:''; ?>" />
           </td>
           </tr>
           
             <tr>
           <td width="50%"><label class="inline-input">Engine Type & HP:  &nbsp;</label><input type="text" name="engine_type_hp" value="<?php echo isset($info['engine_type_hp'])?$info['engine_type_hp']:''; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Sleeper Size: &nbsp;</label><input type="text" name="sleeper_size" value="<?php echo isset($info['sleeper_size'])?$info['sleeper_size']:''; ?>" />
           </td>
           </tr>
           
              <tr>
           <td width="50%"><label class="inline-input">Engine Serial:  &nbsp;</label><input type="text" name="engine_type_hp" value="<?php echo isset($info['engine_type_hp'])?$info['engine_type_hp']:''; ?>" /></td>
           <td width="50%">
           <label class="inline-input">Interior: &nbsp;</label><input type="text" name="sleeper_size" value="<?php echo isset($info['sleeper_size'])?$info['sleeper_size']:''; ?>" />
           </td>
           </tr>
           
            <tr>
          <td width="50%">
           <label class="inline-input">Engine Brake: &nbsp;<input type="radio" name="engine_brake" value="yes" <?php echo (isset($info['engine_brake']) && $info['engine_brake']=='yes')?'checked="checked"':'';  ?> />
Yes &nbsp;&nbsp;&nbsp;           <input type="radio" name="engine_brake" value="no" <?php echo (isset($info['engine_brake']) && $info['engine_brake']=='no')?'checked="checked"':'';  ?> /> No
           </label>
           </td>
           <td width="50%">
           <label class="inline-input">Wheelbase: &nbsp;</label><input type="text" name="wheelbase" value="<?php echo isset($info['wheelbase'])?$info['wheelbase']:''; ?>" />
           </td>
           </tr>
           
             <tr>
          <td width="50%">
           <label class="inline-input">Transmission Make & Model: &nbsp;</label><input type="text" name="transmission_make_model" value="<?php echo isset($info['transmission_make_model'])?$info['transmission_make_model']:''; ?>" />
          
           </td>
           <td width="50%">
           <label class="inline-input">Color: &nbsp;</label><input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" />
           </td>
           </tr>
           
            <tr>
          <td width="50%">
           <label class="inline-input">Transmission Speeds: &nbsp;</label><input type="text" name="transmission_speed" value="<?php echo isset($info['transmission_speed'])?$info['transmission_speed']:''; ?>" />
          
           </td>
           <td width="50%">
           <label class="inline-input">Front Axle Weight: &nbsp;</label><input type="text" name="front_axle_weight" value="<?php echo isset($info['front_axle_weight'])?$info['front_axle_weight']:''; ?>" />
           </td>
           </tr>
           
            <tr>
          <td width="50%">
           <label class="inline-input">Ratio: &nbsp;</label><input type="text" name="ratio" value="<?php echo isset($info['ratio'])?$info['ratio']:''; ?>" />
           </td>
           <td width="50%">
           <label class="inline-input">Rear Axle Weight: &nbsp;</label><input type="text" name="rear_axle_weight" value="<?php echo isset($info['rear_axle_weight'])?$info['rear_axle_weight']:''; ?>" />
           </td>
           </tr>
           
            <tr>
          <td width="50%">
           <label class="inline-input">Axle Quantity: &nbsp;</label><input type="text" name="axle_quantity" value="<?php echo isset($info['axle_quantity'])?$info['axle_quantity']:''; ?>" />
           
           </td>
           <td width="50%">
           <label class="inline-input">Front Tire Size: &nbsp;</label><input type="text" name="front_tire_size" value="<?php echo isset($info['front_tire_size'])?$info['front_tire_size']:''; ?>" />
           </td>
           </tr>
           
             <tr>
          <td width="50%">
           <label class="inline-input">Differential Lock: &nbsp;</label><input type="text" name="differential_lock" value="<?php echo isset($info['differential_lock'])?$info['differential_lock']:''; ?>" />
           
           </td>
           <td width="50%">
           <label class="inline-input">Front Wheels: &nbsp;</label><input type="text" name="front_wheels" value="<?php echo isset($info['front_wheels'])?$info['front_wheels']:''; ?>" />
           </td>
           </tr>
           
            <tr>
          <td width="50%">
           <label class="inline-input">Fifth Wheel: &nbsp;</label><input type="text" name="fifth_wheel" value="<?php echo isset($info['fifth_wheel'])?$info['fifth_wheel']:''; ?>" />
           
           </td>
           <td width="50%">
           <label class="inline-input">Rear Tire Size: &nbsp;</label><input type="text" name="rear_tire_size" value="<?php echo isset($info['rear_tire_size'])?$info['rear_tire_size']:''; ?>" />
           </td>
           </tr>
           
             <tr>
          <td width="50%">
           <label class="inline-input">Fuel Tanks: &nbsp;</label><input type="text" name="fuel_tanks" value="<?php echo isset($info['fuel_tanks'])?$info['fuel_tanks']:''; ?>" />
           
           </td>
           <td width="50%">
           <label class="inline-input">Rear Wheels: &nbsp;</label><input type="text" name="rear_wheels" value="<?php echo isset($info['rear_wheels'])?$info['rear_wheels']:''; ?>" />
           </td>
           </tr>
           <tr><td colspan="2">&nbsp;</td></tr>
           <tr>
           <td>
           <table width="100%">
           <tr><td colspan="2" align="center">
           <strong style="text-decoration:underline;">OPTIONS</strong>
           </td></tr>
           <tr>
           <td width="50%"><label class="inline-input">Dual Breathers:&nbsp;</label><input type="text" name="dual_breathers" style="width:40%;" value="<?php echo isset($info['dual_breathers'])?$info['dual_breathers']:''; ?>" /> </td>
            <td width="50%"><label class="inline-input">APU:&nbsp;</label><input type="text" name="apu" value="<?php echo isset($info['apu'])?$info['apu']:''; ?>" style="width:55%;" /> </td>           
           </tr>
           
             <tr>
           <td width="50%"><label class="inline-input">Dual Exhaust:&nbsp;</label><input type="text" name="dual_exhaust" style="width:40%;" value="<?php echo isset($info['dual_exhaust'])?$info['dual_exhaust']:''; ?>" />  </td>
            <td width="50%"><label class="inline-input">GPS:&nbsp;</label><input type="text" name="gps" value="<?php echo isset($info['gps'])?$info['gps']:''; ?>" style="width:55%;" />  </td>           
           </tr>  
           
            <tr>
           <td width="50%"><label class="inline-input">Power Windows:&nbsp;</label><input type="text" name="power_windows" value="<?php echo isset($info['power_windows'])?$info['power_windows']:''; ?>" style="width:35%;" />  </td>
            <td width="50%"><label class="inline-input">Dual Bunks:&nbsp;</label><input type="text" name="dual_bunks" value="<?php echo isset($info['dual_bunks'])?$info['dual_bunks']:''; ?>" style="width:40%;" /> </td>           
           </tr>
           
            <tr>
           <td width="50%"><label class="inline-input">Power Doors:&nbsp;</label><input type="text" name="power_doors" value="<?php echo isset($info['power_doors'])?$info['power_doors']:''; ?>" style="width:40%;" /> </td>
            <td width="50%"><label class="inline-input">Power Mirros:&nbsp;</label><input type="text" name="power_mirrors" value="<?php echo isset($info['power_mirrors'])?$info['power_mirrors']:''; ?>" style="width:40%;" /></td>           
           </tr>
           
            <tr>
           <td width="50%"><label class="inline-input">Keyless Entry:&nbsp;</label><input type="text" name="keyless_entry" value="<?php echo isset($info['keyless_entry'])?$info['keyless_entry']:''; ?>" style="width:36%;" /> </td>
            <td width="50%"><label class="inline-input">Heated Mirros:&nbsp;</label><input type="text" name="heated_mirrors" value="<?php echo isset($info['heated_mirrors'])?$info['heated_mirrors']:''; ?>" style="width:36%;" />  </td>           
           </tr>   
           
           </table>
           </td>
           <td>
           
          <table width="100%">
          <tr><td colspan="2" align="center" valign="top">
           <strong style="text-decoration:underline;">Tire Measurements</strong><br/><br/>
          </td></tr>
          
          <tr>
          <td align="right" width="50%" style="padding-right:10px;">
          <input type="text" class="bold-border" name="m1" value="<?php echo isset($info['m1'])?$info['m1']:''; ?>" />
          </td>
          <td width="50%" style="padding-left:10px;">
          <input type="text" class="bold-border" name="m2" value="<?php echo isset($info['m2'])?$info['m2']:''; ?>" />       </td>                 
          </tr>
          <tr>
          <td style="padding-right:10px;">
          <input type="text" class="bold-border" name="m3" value="<?php echo isset($info['m3'])?$info['m3']:''; ?>" />  <input type="text" class="bold-border" name="m4" value="<?php echo isset($info['m4'])?$info['m4']:''; ?>" />
          <input type="text" class="bold-border" name="m5" value="<?php echo isset($info['m5'])?$info['m5']:''; ?>" />  
          <input type="text" class="bold-border" name="m6" value="<?php echo isset($info['m6'])?$info['m6']:''; ?>" />    
          </td>
          
          <td style="padding-left:10px;">
          <input type="text" class="bold-border" name="m7" value="<?php echo isset($info['m7'])?$info['m7']:''; ?>" />  <input type="text" class="bold-border" name="m8" value="<?php echo isset($info['m8'])?$info['m8']:''; ?>" />
          <input type="text" class="bold-border" name="m9" value="<?php echo isset($info['m9'])?$info['m9']:''; ?>" />  
          <input type="text" class="bold-border" name="m10" value="<?php echo isset($info['m10'])?$info['m10']:''; ?>" />    
          </td>
          </tr>
          
          
          </table> 
           </td>           
           </tr>
            
             <tr>
             <td colspan="2">
             <label class="inline-input">
             Additional Features / Options: &nbsp;</label> <textarea name="additional_feature" rows="3"><?php echo isset($info['additional_feature'])?$info['additional_feature']:''; ?></textarea>
          
             </td>
             </tr>
             
              <tr><td colspan="2" align="center">
           <strong style="text-decoration:underline;">Condition</strong>
          </td></tr>
             
             <tr>
             <td colspan="2">
             <label class="inline-input">
            Does the Equipment have any physical damage? </label><br/> <textarea name="physical_damage" rows="2"><?php echo isset($info['physical_damage'])?$info['physical_damage']:''; ?></textarea>
            
             </td>
             </tr>
             
             <tr>
             <td colspan="2">
             <label class="inline-input">
            Does the engine have any major issues that customer is aware of?</label> <br/>     <textarea name="major_issues" rows="1"><?php echo isset($info['major_issues'])?$info['major_issues']:''; ?></textarea>
           
             </td>
             </tr>
             
             <td colspan="2">
             <label class="inline-input">
            Does the transmission or clutch have any major issues that customer is aware of?</label> <br/>     <textarea name="transmission_issues" rows="1"><?php echo isset($info['transmission_issues'])?$info['transmission_issues']:''; ?></textarea>
            
             </td>
             </tr>
             
                <tr>
                <td colspan="2">
             <label class="inline-input">
            Does the equipment have any other  major mechanical issues that customer is aware of?</label> <br/>     <textarea name="mechanical_issues" rows="1"><?php echo isset($info['mechanical_issues'])?$info['mechanical_issues']:''; ?></textarea>
             
             </td>
             </tr>
             
             <tr>
                <td colspan="2">
             <label class="inline-input">
           Has the engine aftertreatment modified in any way? </label><br/>     <textarea name="engine_modified" rows="1"><?php echo isset($info['engine_modified'])?$info['engine_modified']:''; ?></textarea>
            
             </td>
             </tr>
             
             <tr>
             <td colspan="2">
             <label><i>I hereby certify that all above information is truthful and accurate to the best of my knowledge. I understand that with holding information  or misrepresnting the condition of the equipment voids any prior trade agreement.</i></label>
             </td>
             </tr>
               <tr>
           <td width="50%"><label class="inline-input">Customer  Signature:&nbsp;</label><input type="text" name="customer_signature" value="<?php echo isset($info['customer_signature'])?$info['customer_signature']:''; ?>" />  </td>
            <td width="50%"><label class="inline-input">Date:&nbsp;</label><input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" /> </td>           
           </tr>
           
             
           
          
           </table>
           
           
           
          
                       
            
      
        
			
		</div>
		<!---left1-->
		</br>
        
		<!-- no print buttons end -->
	</div>
	
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
	
	
	$("#appt_date").bdatepicker();
	$("#appt_time").timepicker();
	
	
	
		
	
	
	
	
	

	
	
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
