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
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;

?>




<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px;">
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
.two-three {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
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
    border: 1px solid #aaa;
    padding: 3px;
    display: inline-table;
	margin:1px 0;
	
}
.right1{
    width: 49%;
    border: 1px solid #aaa;
    padding: 3px;
    display: inline-table;
	margin:1px 0;
	
}
 
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
.span_20{width:18%;}
.input_200
{
	width:200px;
}
.input_300
{
	width:330px;
}
.input_370{
width:370px;
}
.input_400
{
	width:390px;
}
.input_800
{
	width:880px;
}
.input_80
{
	width:100px;
}
.input_120
{
	width:130px;
}
.table_blank{
	padding-bottom:150px;
	padding-top:20px;
}
.print_month
	{
		display:none;
	}
.border_right{ border-right:1px solid #CCC;}
.main_table td{padding-left:5px;}	
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	input[type=text]{
		border:none;
		border-bottom: 1px solid #aaa;	
		}
}
</style>
 <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']); 
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>
<?php 
$mobile = AuthComponent::user('d_phone');
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$fax_no = AuthComponent::user('d_fax');

$fax_no = preg_replace('/[^0-9]+/', '', $fax_no); //Strip all non number characters
$fax_no_cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $fax_no);
$dealer_id = AuthComponent::user('dealer_id');
?>
		<div class="wraper header">
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
        <input type="hidden"  name="first_name" value="<?php echo $info['first_name']; ?>" />	
         <input type="hidden"  name="last_name" value="<?php echo $info['last_name']; ?>" />
         <input type="hidden"  name="city" value="<?php echo $info['city']; ?>" />
         <input type="hidden"  name="country" value="<?php echo $info['country']; ?>" />
          <input type="hidden"  name="email" value="<?php echo $info['email']; ?>" />
          <table style="width:100%" class="main_table" cellpadding="2">
          <tr><td>Name:&nbsp;&nbsp; </td><td><input type="text" class="input_400" name="name" value="<?php echo isset($info['name'])?$info['first_name']:$info['first_name'].' '.$info['last_name']; ?>" /> </td>
          <td>Date: &nbsp;&nbsp;</td><td><input type="text" class="input_400" name="date" value="<?php echo isset($info['date'])?$info['date']:$expectedt; ?>" /></td>
          </tr>
          <tr><td>Email:&nbsp;&nbsp; </td><td><input type="text" class="input_400" name="email" value="<?php echo $info['email']; ?>" /> </td>
            <td> Phone: &nbsp;&nbsp;</td><td><input type="text" class="input_400" name="mobile" value="<?php echo $cleaned1; ?> " /></td>
          </tr>
           <tr><td rowspan="3">Address:&nbsp;&nbsp;</td><td rowspan="3"><textarea rows="4" class="input_400" name="address" ><?php echo $info['address']; ?></textarea> </td>
          <td>Tow Vehicle:&nbsp;&nbsp; </td><td><input type="text" class="input_400" name="tow_vehicle" value="<?php echo $info['tow_vehicle']; ?> " /></td>
          </tr>
          <tr></tr>
          <tr><td>Sales Person:&nbsp;&nbsp;</td><td><input type="text" class="input_400" name="sperson" value="<?php echo $info['sperson']; ?>" /></td></tr>
          <tr><td colspan="4" align="center" style="padding:5px; font-weight:bold;">Source&nbsp;&nbsp;<input type="text" class="input_200" name="source" value="<?php echo $info['source']; ?>" /></td></tr>
          <tr><td colspan="4" style="padding:2px;">&nbsp;</td></tr>
          <tr>
          <td class="border_right" colspan="2" align="center"><h2 style="padding:10px;text-decoration:underline;">Trade In</h2></td>
          <td colspan="2" align="center"><h2 style="padding:10px;text-decoration:underline;">Unit</h2></td>
          </tr>
           <tr><td>Vin #</td>
            <td  class="border_right"><input type="text" class="input_370" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" /></td>
            <td>Vin #</td><td><input type="text" class="input_400" name="vin" value="<?php echo $info['vin']; ?>" /></td>
            
            </tr>
             <tr><td>Stock #</td>
            <td  class="border_right"><input type="text" class="input_370" name="stock_num_trade" value="<?php echo $info['stock_num_trade']; ?>" /></td>
            <td>Condition</td><td><input type="text" class="input_400" name="condition" value="<?php echo $info['condition']; ?>" /></td>
            
            </tr>
          <tr><td>Year</td>
            <td  class="border_right"><input type="text" class="input_370" name="year_trade" value="<?php echo $info['year_trade']; ?>" /></td>
            <td>Stock #</td><td><input type="text" class="input_400" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></td>
            </tr>
         
            <tr>
            <td>Make</td>
            <td  class="border_right"><input type="text" class="input_370" name="make_trade" value="<?php echo $info['make_trade']; ?>" /></td>
             <td>Year</td><td><input type="text" class="input_400" name="year" value="<?php echo $info['year']; ?>" /></td>
            </tr>
            <tr>
             <td>Model</td>
            <td  class="border_right"><input type="text" class="input_370" name="model_trade" value="<?php echo $info['model_trade']; ?>" /></td>
            <td>Make</td><td><input type="text" class="input_400" name="make" value="<?php echo $info['make']; ?>" /></td>
            </tr>

            <tr>
            <td style="width: 12%;">Number of Slides</td>
            <td  class="border_right">
                <select name="Type" id="Type" class="form-control" style="width: auto; display: inline-block; width: 95%;">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                </select>
            </td>
            <td>Model</td><td><input type="text" class="input_400" name="model" value="<?php echo $info['model']; ?>" /></td>            
            </tr>
            
            <tr>
            <td>Type</td>
            <td  class="border_right">
                <select name="Type" id="Type" class="form-control" style="width: auto; display: inline-block; width: 95%;">
                        <option value="T">Travel Trailer</option>
                        <option value="F">Fifth Wheel</option>
                        <option value="M">Motorhome</option>
                        <option value="O">Other</option>
                </select>
            </td>
            <td>Plates</td><td><input type="text" class="input_200" style="width:152px;" name="plates" value="<?php echo $info['plates']; ?>" />&nbsp;&nbsp;Expiration&nbsp;&nbsp;<input type="text" class="input_200" name="expiration" style="width:152px;" value="<?php echo $info['expiration']; ?>" /></td>            
            </tr>
            <tr>
             <td>Mileage</td><td class="border_right"><input type="text" class="input_370" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" class="border_right" style="text-align: center;">
                    <input id="option1" type="radio" style="margin-left: 32.5%" name="abs_checkbox" <?php echo ($info['abs_checkbox'] == "yes") ? "checked" : ""; ?> value="yes"/>
                    <label style="font-weight: inherit;">Aluminum</label>
                    <input id="option2" type="radio" name="abs_checkbox" <?php echo ($info['abs_checkbox'] == "yes") ? "checked" : ""; ?> value="yes"/>
                    <label style="font-weight: inherit;">Fiberglass</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border_right">Engine Type: <input type="radio" name="engine_type" style="margin-left:171px;" value="diesel" <?php echo (isset($info['engine_type']) && $info['engine_type'] == 'diesel')?'checked':''; ?> />&nbsp;&nbsp;Diesel<input type="radio" name="engine_type" style="margin-left:20px;" value="gas" <?php echo (isset($info['engine_type']) && $info['engine_type'] == 'gas')?'checked':''; ?> />&nbsp;&nbsp;Gas
                <input type="radio" name="engine_type" style="margin-left:20px;" value="other" <?php echo (isset($info['engine_type']) && $info['engine_type'] == 'other')?'checked':''; ?> />&nbsp;&nbsp;Other
                </td>
            </tr>
            <tr>
             <td>Engine Size</td><td class="border_right"><input type="text" class="input_370" name="engine_size" value="<?php echo $info['engine_size']; ?>" /></td>
            </tr>
            <tr>
            <td>A/C:</td>
            <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="ac" value="yes"  <?php echo (isset($info['ac']) && $info['ac'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="ac" value="no" <?php echo (isset($info['ac']) && $info['ac'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            <td colspan="2"><div style="width:95%;border-bottom:2px dashed #CCC"></div></td>
            </tr>
            <tr>
            <td>Awning:</td>
            <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="awning" value="yes" <?php echo (isset($info['awning']) && $info['awning'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="awning" value="no" <?php echo (isset($info['awning']) && $info['awning'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            
            <td class="noprint">Fixed Fee</td>
            <td class="noprint"><label style="width:40px;">&nbsp;</label><?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm input_200 fixed_fee_options',
							'label' => false,
							'div' => false,
							'data-id'=>'1',
							'value'=>$info['fixed_fee_options']
						));
						?></td>
            <td>
          
            </tr>
            <tr>
            <td>Microwave:</td>
            <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="microwave" value="yes" <?php echo (isset($info['microwave']) && $info['microwave'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="microwave" value="no" <?php echo (isset($info['microwave']) && $info['microwave'] == 'no')?'checked':''; ?> />&nbsp;No</td>
              <td>Retail Price</td>
            <td><label style="width:40px;"></label>$<input type="text" class="input_200 priceChange" id="unit_value" name="unit_value" value="<?php echo $info['unit_value']; ?>" /></td>
           
            </tr>
            <tr>
            <td>Jacks:</td>
            <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="jacks" value="yes" <?php echo (isset($info['jacks']) && $info['jacks'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="jacks" value="no" <?php echo (isset($info['jacks']) && $info['jacks'] == 'no')?'checked':''; ?> />&nbsp;No</td>
             <td>Accessories
             <br>
             Accessories Description    
             </td>
             <td><label style="width:40px;">+</label>$<input type="text" class="input_200 priceChange" id="parts_fee" name="parts_fee" value="<?php echo $info['parts_fee']; ?>" />
               <br>
            
               <select name="parts_desc" id="parts_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){ 
                     if(empty($value['FieldDescription']))
                        continue;
                    
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                              
             
             
             </td>
             
            
            </tr>
            <tr>
             <td>Stereo:</td>
            <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="stereo" value="yes" <?php echo (isset($info['stereo']) && $info['stereo'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="stereo" value="no" <?php echo (isset($info['stereo']) && $info['stereo'] == 'no')?'checked':''; ?> />&nbsp;No</td>
             <td>Trade</td>
             <td><label style="width:40px;">-</label>$<input type="text" class="input_200 priceChange" id="trade_payoff" name="trade_allowance" value="<?php echo $info['trade_allowance']; ?>" /></td>
           
            
            </tr>
            
              <tr>
             <td style="padding-bottom:10px;">TV Antenna:</td>
            <td align="center" class="border_right" style="padding-bottom:10px;"><input type="radio" name="tv_antenna" value="yes" <?php echo (isset($info['tv_antenna']) && $info['tv_antenna'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="tv_antenna" value="no" <?php echo (isset($info['tv_antenna']) && $info['tv_antenna'] == 'no')?'checked':''; ?> />&nbsp;No</td>
           
            <td>Other Trades</td>
             <td><label style="width:40px;">-</label>$<input type="text" class="input_200 priceChange" id="other_trade_value" name="other_trade_value" value="<?php echo $info['other_trade_value']; ?>" /></td>
            
            
            </tr>
            <tr>
                <td colspan="2" class="border_right">Date purchased: <input type="text" class="input_200 purchased" name="purchased" style="width: 29.5%;" value="<?php echo $info['purchased']; ?>" /> <input type="radio" name="engine_type" value="diesel" <?php echo (isset($info['engine_type']) && $info['engine_type'] == 'diesel')?'checked':''; ?> />&nbsp;&nbsp;New<input type="radio" name="engine_type" style="margin-left:20px;" value="gas" <?php echo (isset($info['engine_type']) && $info['engine_type'] == 'gas')?'checked':''; ?> />&nbsp;&nbsp;Pre-owned
                </td>
            </tr>
            <tr>
             <td>Amount Paid</td><td class="border_right"><input type="text" class="input_370" name="amounted_paid" value="<?php echo $info['amounted_paid']; ?>" /></td>
            </tr>
            <tr>
             <td>Monthly Payment</td><td class="border_right"><input type="text" class="input_370" name="monthly_payment" value="<?php echo $info['monthly_payment']; ?>" /></td>
            </tr>
            
            <tr>
                <td colspan="2" class="border_right">Has the unit been used for full time living:<input type="radio" name="full_time" style="margin-left: 8%;" value="yes" <?php echo (isset($info['full_time']) && $info['full_time'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="full_time" value="no" <?php echo (isset($info['full_time']) && $info['full_time'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr>
                <td colspan="2" class="border_right">Has the unit been modified from the Original: <input type="radio" name="original" style="margin-left:3%;" value="yes" <?php echo (isset($info['original']) && $info['original'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="original" value="no" <?php echo (isset($info['original']) && $info['original'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr><td colspan="2" class="border_right">Overall Condition<small>(Check one)</small></td>
            <td>Cash Down</td>
             <td><label style="width:40px;">-</label>$<input type="text" class="input_200 priceChange" id="down_payment" name="down_payment" value="<?php echo $info['down_payment']; ?>" /></td>
            
            <tr>
            <tr>
                <td>Furnace:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="umace" value="yes"  <?php echo (isset($info['umace']) && $info['umace'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="umace" value="no" <?php echo (isset($info['umace']) && $info['umace'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr>
                <td>Water Heater:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="heater" value="yes"  <?php echo (isset($info['heater']) && $info['heater'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="heater" value="no" <?php echo (isset($info['heater']) && $info['heater'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr>
                <td>Jacks:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="jacks" value="yes" <?php echo (isset($info['jacks']) && $info['jacks'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="jacks" value="no" <?php echo (isset($info['jacks']) && $info['jacks'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr>
                <td>Pumps:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="pumps" value="yes" <?php echo (isset($info['pumps']) && $info['pumps'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="pumps" value="no" <?php echo (isset($info['pumps']) && $info['pumps'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
            <tr>
                <td>Electric:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="electric" value="yes" <?php echo (isset($info['electric']) && $info['electric'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="electric" value="no" <?php echo (isset($info['electric']) && $info['electric'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
             <tr>
                <td style="width: 11%;">Any water leaks:</td>
                <td align="center" class="border_right" style="padding:5px;"><input type="radio" name="leaks" value="yes" <?php echo (isset($info['leaks']) && $info['leaks'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="leaks" value="no" <?php echo (isset($info['leaks']) && $info['leaks'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
             <tr>
                <td colspan="2" class="border_right">Have they been repaired: <input type="radio" name="repaired" style="margin-left:19%;" value="yes" <?php echo (isset($info['repaired']) && $info['repaired'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="repaired" value="no" <?php echo (isset($info['repaired']) && $info['repaired'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
             <tr>
                 <td colspan="2" class="border_right">Water Stains: <input type="radio" name="stains" style="margin-left:16px;" value="yes" <?php echo (isset($info['stains']) && $info['stains'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="stains" value="no" <?php echo (isset($info['stains']) && $info['stains'] == 'no')?'checked':''; ?> />&nbsp;No&nbsp;&nbsp; Explain: <input type="text" class="input_200 priceChange" name="explain" value="<?php echo $info['explain']; ?>" /></td>
            </tr>
             <tr>
                 <td colspan="2" class="border_right">Rips,Tears,Punctures,Burns,Stains:Rate 1 Through 10 Explain: <input type="text" class="input_200 priceChange" style="width: 20%;" name="10_explain1" value="<?php echo $info['10_explain1']; ?>" /></td>
            </tr>
             <tr>
                <td colspan="2" class="border_right">
               <?php for($i=1;$i<=10;$i++) {?>
                <input type="radio" name="overall_condition" value="<?php echo $i; ?>" <?php echo (isset($info['overall_condition']) && $info['overall_condition'] == $i)?'checked':''; ?> />&nbsp;&nbsp;<?php echo $i ?>&nbsp;&nbsp;&nbsp;
               <?php }?> 
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border_right">Has it been in a collision: <input type="radio" name="collision" style="margin-left:19.7%;" value="yes" <?php echo (isset($info['collision']) && $info['collision'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="collision" value="no" <?php echo (isset($info['collision']) && $info['collision'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
             <tr>
                 <td colspan="2" class="border_right">Any dents,Chips,Delam,Scratches,Decals:Rate 1 Through 10 Explain: <input type="text" class="input_200 priceChange" style="width: 11.5%;" name="10_explain2" value="<?php echo $info['10_explain2']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" class="border_right">List Any Repairs Needed: <input type="text" class="input_200 priceChange" style="width: 60%;" name="any_repairs" value="<?php echo $info['any_repairs']; ?>" /></td>
            </tr>
            <tr>
                 <td colspan="2" class="border_right">What do you think your trade is worth? <input type="text" class="input_200 priceChange" style="width: 44.5%;" name="trade_worth" value="<?php echo $info['trade_worth']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" class="border_right">Where Did You Value Your Trade: <input type="text" class="input_200 priceChange" style="width: 50%;" name="trade" value="<?php echo $info['trade']; ?>" /></td>
                <td>Sales Tax
             <br>
             Sales Tax Description: 
             </td>
            <td><label style="width:40px;">+</label>$<input type="text" class="input_200 priceChange" id="tax" name="tax_fee" value="<?php echo $info['tax_fee']; ?>" />
            
            
              <br>
            
               <select name="sales_desc" id="sales_desc" class="form-control" style="width: auto; display: inline-block;">
        <?php foreach($all_fees as $value){ 
                     if(empty($value['FieldDescription']))
                        continue;
                    
                    ?>              
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>             
                        
                    </select>
                              
            
            </td> 

            </tr>
           
            <tr>
             <td colspan="2" class="border_right">Inside Floor <small>(Soft or Damaged?)</small>:  <input type="radio" name="inside_floor" style="margin-left:100px;" value="yes" <?php echo (isset($info['inside_floor']) && $info['inside_floor'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="inside_floor" value="no" <?php echo (isset($info['inside_floor']) && $info['inside_floor'] == 'no')?'checked':''; ?> />&nbsp;No</td>
              <td>Payoff</td>
            <td><label style="width:40px;">+</label>$<input type="text" class="input_200 priceChange" id="est_payoff" name="est_payoff" value="<?php echo $info['est_payoff']; ?>" /></td>   
            
                  
            </tr>
            <tr>
            <td colspan="2" class="border_right">Water Damage <small>(Walls, Ceilings, Corners)</small>: <input type="radio" name="water_damage" style="margin-left:47px;" value="yes" <?php echo (isset($info['water_damage']) && $info['water_damage'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="water_damage" value="no" <?php echo (isset($info['water_damage']) && $info['water_damage'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            
              <td>Unit Prep Fee
              <br>
              Prep Description:</td>
             <td><label style="width:40px;">+</label>$<input type="text" class="input_200 priceChange" id="prep_fee" name="prep_fee" value="<?php echo $info['prep_fee']; ?>" />
             
              <br>

              <select name="prep_desc" id="prep_desc" class="form-control" style="width: auto; display: inline-block;">
                  <?php
                  foreach ($all_fees as $value) {
                      if (empty($value['FieldDescription']))
                          continue;
                      ?>				
                      <option value="<?php echo $value['RecordType'] . '_' . $value['SequenceNumber'] . '_' . $value['FieldDescription']; ?>"><?php echo $value['FieldDescription'] . ' (' . $value['RecordType'] . ',' . $value['SequenceNumber'] . ')' ?></option>
                  <?php } ?>				

              </select>
             
             </td>
          
                                   
            </tr>
            <tr>
            <td colspan="2" class="border_right">Carpet Condition: <input type="radio" name="carpet_condition" style="margin-left:20px;" value="Poor" <?php echo (isset($info['carpet_condition']) && $info['carpet_condition'] == 'Poor')?'checked':''; ?> />&nbsp;&nbsp;Poor<input type="radio" name="carpet_condition" style="margin-left:20px;" value="Fair" <?php echo (isset($info['carpet_condition']) && $info['carpet_condition'] == 'Fair')?'checked':''; ?> />&nbsp;&nbsp;Fair
            <input type="radio" name="carpet_condition" style="margin-left:20px;" value="Good" <?php echo (isset($info['carpet_condition']) && $info['carpet_condition'] == 'Good')?'checked':''; ?> />&nbsp;&nbsp;Good
            <input type="radio" name="carpet_condition" style="margin-left:20px;" value="Excellent" <?php echo (isset($info['carpet_condition']) && $info['carpet_condition'] == 'Excellent')?'checked':''; ?> />&nbsp;&nbsp;Excellent
            </td>
               <td>To Finance</td>
             <td><label style="width:40px;">+</label>$<input type="text" class="input_200 priceChange" id="to_finance" name="to_finance" value="<?php echo $info['to_finance']; ?>" /><small><i> +DMV Fees</i></small></td>    
           
            </tr>
            <tr>
             <td colspan="2" class="border_right">Smoke: <input type="radio" name="smoke" style="margin-left:244px;px;" value="yes" <?php echo (isset($info['smoke']) && $info['smoke'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="smoke" value="no" <?php echo (isset($info['smoke']) && $info['smoke'] == 'no')?'checked':''; ?> />&nbsp;No</td>
             
             <td>Payment</td>
             <td><label style="width:40px;">&nbsp;</label>$<input type="text" class="input_200" id="amount" name="amount" value="<?php echo $info['amount']; ?>" /></td>
            
            
            </tr>
           
            <tr>
            <td colspan="2" class="border_right">Animals: <input type="radio" name="animals" style="margin-left:239px;px;" value="yes" <?php echo (isset($info['animals']) && $info['animals'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="animals" value="no" <?php echo (isset($info['animals']) && $info['animals'] == 'no')?'checked':''; ?> />&nbsp;No</td>
              <td colspan="2"><div style="width:95%;border-bottom:2px dashed #CCC"></div></td>
            
            </tr>
          	<tr>
            <td colspan="2" class="border_right">Appliances <small>(All Standard, Good Working Cond.)</small>: <input type="radio" name="appliances" style="margin-left:22px;px;" value="yes" <?php echo (isset($info['appliances']) && $info['appliances'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="appliances" value="no" <?php echo (isset($info['appliances']) && $info['appliances'] == 'no')?'checked':''; ?> />&nbsp;No</td>
             <td rowspan="6" valign="top">Notes</td>
             <td rowspan="6"><textarea rows="8" class="input_400"></textarea></td>  
            </tr>
          <tr><td colspan="2" class="border_right">Other Condition <small>(Circle One)</small>:</td></tr>
          <tr>  <td colspan="2" class="border_right">
           <?php for($i=1;$i<=10;$i++) {?>
            <input type="radio" name="other_condition" value="<?php echo $i; ?>" <?php echo (isset($info['other_condition']) && $info['other_condition'] == $i)?'checked':''; ?> />&nbsp;&nbsp;<?php echo $i ?>&nbsp;&nbsp;&nbsp;
           <?php }?> </tr>
            <tr><td colspan="2" class="border_right">Damage</td></tr>
            <tr><td colspan="2" class="border_right">Roof Condition: <input type="radio" name="roof_condition" style="margin-left:20px;" value="Poor" <?php echo (isset($info['roof_condition']) && $info['roof_condition'] == 'Poor')?'checked':''; ?> />&nbsp;&nbsp;Poor<input type="radio" name="roof_condition" style="margin-left:20px;" value="Fair" <?php echo (isset($info['roof_condition']) && $info['roof_condition'] == 'Fair')?'checked':''; ?> />&nbsp;&nbsp;Fair
            <input type="radio" name="roof_condition" style="margin-left:20px;" value="Good" <?php echo (isset($info['roof_condition']) && $info['roof_condition'] == 'Good')?'checked':''; ?> />&nbsp;&nbsp;Good
            <input type="radio" name="roof_condition" style="margin-left:20px;" value="Excellent" <?php echo (isset($info['roof_condition']) && $info['roof_condition'] == 'Excellent')?'checked':''; ?> />&nbsp;&nbsp;Excellent
            </td>
            </tr>
            <tr>
            <td colspan="2" class="border_right">Battery:
            <input type="radio" name="battery" style="margin-left:223px;;" value="Bad" <?php echo (isset($info['battery']) && $info['battery'] == 'Bad')?'checked':''; ?> />&nbsp;&nbsp;Bad<input style="margin-left:20px;" type="radio" name="battery" value="Good" <?php echo (isset($info['battery']) && $info['battery'] == 'Good')?'checked':''; ?> />&nbsp;Good
            
            </td>
            </tr>
            <tr>
            <td colspan="2" class="border_right">Jacks:
            <input type="radio" name="d_jacks" style="margin-left:232px;;" value="Bad" <?php echo (isset($info['d_jacks']) && $info['d_jacks'] == 'Bad')?'checked':''; ?> />&nbsp;&nbsp;Bad<input style="margin-left:20px;" type="radio" name="d_jacks" value="Good" <?php echo (isset($info['d_jacks']) && $info['d_jacks'] == 'Good')?'checked':''; ?> />&nbsp;Good
            
            </td>
            <td colspan="2"><div style="width:95%;border-bottom:2px dashed #CCC"></div></td> 
            </tr>
             
            
             <tr>
            <td colspan="2" class="border_right">Tires:
            <input type="radio" name="d_tires" style="margin-left:237px;;" value="Bad" <?php echo (isset($info['d_tires']) && $info['d_tires'] == 'Bad')?'checked':''; ?> />&nbsp;&nbsp;Bad<input style="margin-left:20px;" type="radio" name="d_tires" value="Good" <?php echo (isset($info['d_tires']) && $info['d_tires'] == 'Good')?'checked':''; ?> />&nbsp;Good
            
            </td>
            <td colspan="2" rowspan="5"><p style="padding:10px;text-align:justify;">I am ready to purchase this vehicle. I request that 
this offer be submitted to the dealer for acceptance. 
I understand that all sales are contingent on credit 
approval by a financial institution. I certify that I am at 
least 18 years of age.</p></td>
            </tr>
            
             <tr>
            <td colspan="2" class="border_right">Awning:
            <input type="checkbox" name="d_awning" style="margin-left:20px;" value="manual" <?php echo (isset($info['d_awning']) && $info['d_awning'] == 'manual')?'checked':''; ?> />&nbsp;&nbsp;Manual<input type="checkbox" name="d_awning" style="margin-left:20px;" value="Fair" <?php echo (isset($info['d_awning']) && $info['d_awning'] == 'electric')?'checked':''; ?> />&nbsp;&nbsp;Electric
            <input type="radio" name="d_awning" style="margin-left:45px;;" value="Bad" <?php echo (isset($info['d_awning']) && $info['d_awning'] == 'Bad')?'checked':''; ?> />&nbsp;&nbsp;Bad<input style="margin-left:20px;" type="radio" name="d_awning" value="Good" <?php echo (isset($info['d_awning']) && $info['d_awning'] == 'Good')?'checked':''; ?> />&nbsp;Good
            
            </td>
            </tr>
            <tr>
            <td colspan="2" class="border_right">Propane Tank <small>(New Certified w/OPD Valve)</small>: <input type="radio" name="propane_tank" style="margin-left:16px;" value="yes" <?php echo (isset($info['propane_tank']) && $info['propane_tank'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="propane_tank" value="no" <?php echo (isset($info['propane_tank']) && $info['propane_tank'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
             <tr>
            <td colspan="2" style="border-bottom:2px dashed #CCC;padding-bottom:10px;" class="border_right">Holding Tanks Flushed: <input type="radio" name="flush_tank" style="margin-left:120px;" value="yes" <?php echo (isset($info['flush_tank']) && $info['flush_tank'] == 'yes')?'checked':''; ?> />&nbsp;&nbsp;Yes<input style="margin-left:20px;" type="radio" name="flush_tank" value="no" <?php echo (isset($info['flush_tank']) && $info['flush_tank'] == 'no')?'checked':''; ?> />&nbsp;No</td>
            </tr>
           <tr>
           <td>Estimated Payoff: </td>
           <td class="border_right">$<input type="text" name="payoff" value="<?php echo $info['payoff']; ?>" class="input_300 payoff" id="payoff" /></td>
           </tr>
           
            <tr>
           <td>Lien Holder: </td>
           <td class="border_right"><input type="text" name="lien_holder" value="<?php echo $info['lien_holder']; ?>" class="input_300" /></td>
           
           <td>Signature: </td>
           <td><input type="text" name="signature" class="input_400" value="<?php echo $info['signature']; ?>" /></td>
           </tr>
           
           <tr>
           <td>Book Value</td>
            <td class="border_right"><input type="text" name="book_value" value="<?php echo $info['book_value']; ?>" class="input_300" /></td>
             <td>Date</td>
            <td><input type="text" name="date" class="input_400" value="<?php echo $expectedt; ?>" /></td>
           </tr>
          <tr>
          <td class="border_right" colspan="2">
          <h5 style="text-align:center">***Trade in Subject to Final Appraisal***</h5>
          </td>
          </tr>
          <tr>
          <td class="border_right" colspan="2">
         
                 <label for="option1">Dealer Track API INFO:</label>     
                 <br>
                  <label for="option1">Record Type: </label>       
               <select name="RecordType" id="RecordType" class="form-control" style="width: auto; display: inline-block;">
<!--			<option value="">* Select RecordType</option>-->
						<option value="C">cash deal</option>
						<option value="F">financed</option>
						<option value="L">lease</option>
						<option value="O">outside financed</option>
					</select>
                  <label for="option1">Sale Type: </label>       
        <select name="SaleType" id="SaleType" class="form-control" style="width: auto; display: inline-block;">
<!--			<option value="">* Select SaleType</option>-->
						<option value="R">retail</option>
						<option value="L">lease</option>
						<option value="F">fleet</option>
						<option value="W">wholesale</option>
						<option value="X">dealer transfer</option>
						<option value="1">custom-1</option>
						<option value="2">custom-2</option>
						<option value="3">custom-3</option>
						
					</select>
				
          </td>
          </tr>
          </table>
        
		
          
            
		</div>
		<!---left1-->
		</br>
         <p align="center"><?php echo AuthComponent::user('dealer'); ?>&nbsp;Worksheet&nbsp;-&nbsp;<?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->
	<br/>	
		
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>
		
		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($info['deal_status_id'] == $key)? 'selected="selected"' : "" ; ?>  ><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		<input type="hidden" id="tax_percent" name="tax_percent" value="<?php echo $info['tax_percent']; ?>" />
        <input type="hidden" id="dmv_fee" name="dmv_fee" value="<?php echo $info['dmv_fee']; ?>" />
         <input type="hidden" id="dmv_offroad" name="dmv_offroad" value="<?php echo $info['dmv_offroad']; ?>" />
        
	</div>
	
	<?php echo $this->Form->end(); ?>
	<script type="text/javascript">

function assign_fees(data,v_id)
{
	$("#prep_fee").val(data.prep_fee);
	$("#tax_percent").val(data.tax_fee);
	$("#parts_fee").val(data.parts_fee);
	$dmv_fee= (data.dmv_fee == '' || data.dmv_fee == null)? 0.00 : parseFloat(data.dmv_fee);
	$dmv_offroad= (data.dmv_offroad == '' || data.dmv_offroad == null)? 0.00 : parseFloat(data.dmv_offroad);
	$dmv_fee =isNaN($dmv_fee)?0.00:$dmv_fee;
	$dmv_offroad =isNaN($dmv_offroad)?0.00:$dmv_offroad;
	$("#dmv_fee").val($dmv_fee);
	$("#dmv_offroad").val($dmv_offroad);
}
	
	function calculate_tax(){
		
		var prep = isNaN(parseFloat( $('#prep_fee').val()))?0.00:parseFloat( $('#prep_fee').val());
		var parts_fee = isNaN(parseFloat( $('#parts_fee').val()))?0.00:parseFloat($('#parts_fee').val());
		var sell_price = isNaN(parseFloat($('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var trade_payoff =	isNaN(parseFloat($('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var down_payment =	isNaN(parseFloat($('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
		var other_trade_value = isNaN(parseFloat($('#other_trade_value').val()))?0.00:parseFloat($('#other_trade_value').val());
		var to_finance = isNaN(parseFloat($('#to_finance').val()))?0.00:parseFloat($('#to_finance').val());
		var tax_percent = isNaN(parseFloat($("#tax_percent").val()))?0.00:parseFloat($('#tax_percent').val());
		var amount  = sell_price - (trade_payoff + other_trade_value);
		var amountIncludingTax =  (parseFloat(tax_percent)/100)*amount;
		 
		$('#tax').val( amountIncludingTax.toFixed(2));
		amountIncludingTax = parseFloat(amountIncludingTax);
		total_balance = parseFloat((parts_fee + prep + sell_price+amountIncludingTax) - (trade_payoff + down_payment+other_trade_value));
		var est_payoff =  isNaN(parseFloat($('#est_payoff').val()))?0.00:parseFloat($('#est_payoff').val());
		
		total_balance = total_balance+est_payoff+to_finance;
		$("#amount").val(total_balance.toFixed(2)); 
		}	
		
function calculate_balance(data_id)
{
	price_index=data_id-1;
	actual_value=vehicle_unit_value[price_index];
	allowance=$("#trade_allowance"+data_id).val();
	if(allowance=='')
	{
		allowance=0; 
	}
	est_payoff=$("#less_payoff"+data_id).val();
	if(est_payoff=='')
	{
	  est_payoff=0; 
	}
	est_payoff=parseFloat(est_payoff);
	allowance=parseFloat(allowance);
	//sell_price=parseFloat(actual_value-allowance);
	//$("#msrp"+data_id).val(sell_price.toFixed(2));
	//calculate_tax(data_id);
	total_cash=parseFloat($("#total_cash_price"+data_id).val());
	total_bal=parseFloat((total_cash+est_payoff)-allowance);
	total_bal=isNaN(total_bal)?0.00:total_bal;
	$("#amount"+data_id).val(total_bal.toFixed(2));
	$("#unit_value"+data_id).val(total_bal.toFixed(2));
	}



$(document).ready(function(){
	
	var actual_balance = <?php echo ($deal['Deal']['amount'] + $deal['Deal']['trade_payoff'] ) - $deal['Deal']['down_payment'] ; ?>;
	
	var actual_value = <?php echo ($deal['Deal']['unit_value'] + $deal['Deal']['trade_allowance'] ) ; ?>;
	

	
	$(".priceChange").on('change keyup paste',function(){
								
									 calculate_tax();
									 
									 });
	
	
		
	$("#sell_price").on('change keyup paste',function(){
											   price=$(this).val();
											   allowance=$("#trade_allowance").val();
											   actual_value=price;
											   tax_percent=$("#tax_percent").val();		  
											  if($("#prep_fee").val()!=''&&$("#parts_fee").val()!='')
												calculate_tax(tax_percent);
												//calculateMonthWisePayments();
											   
											   });


$('#fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					assign_fees(data);
					calculate_tax();
					//calculate_balance();
					//assign_payment(data_id);
					
				}
			});
		}
	});

	
	
	

	$("#btn_save_quote").click(function(){
		if($("#deal_status_id").val() == ''){
			alert("Please select status");
			$("#deal_status_id").focus();
			return false;	
		}else{
			return true;
		}
	});
	
		
	
	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);
	

	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis({ pageTitle: "&nbsp;" });
		
	});
	
	$("#btn_back").click(function(){
		
	});

});
	
</script>
</div>
