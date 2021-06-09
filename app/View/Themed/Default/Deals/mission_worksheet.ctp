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
input[type=text]{font-weight:700;font-size:14px;}
hr{color:#000;}	
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
          
          <table width="100%" >
          <tr>
          <td width="30%" valign="top">
          
          <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>"  style="width:270px;height:190px;" />
          </td>
          <td width="40%" valign="bottom"><h3>28611 IH – 10 W.<br/>
          BOERNE, TX 78006  <br/>
          P. (830)981-2453
          </h3></td>
          <td width="30%" valign="bottom">
          <div style="width:100%;">Date: <input type="text" style="width:75%;" name="submit_date" value="<?php echo $expectedt; ?>" /></div>
          <div style="width:100%;">Salesperson: <input type="text" style="width:60%;" name="sperson" value="<?php echo $info['sperson']; ?>" /></div>
          <div style="width:100%;">Stock #: <input type="text" style="width:70%;" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></div>
          </td>
          </tr>
          
          </table>
          
          <table width="100%">
          <tr>
          <td colspan="4" width="100%"><br/><hr/><br/>
          <h3>CUSTOMER</h3>
          </td>
          </tr>
          <tr>
          <td width="15%"><label>Name</label></td>
          <td width="35%"><input type="text" name="name" style="width:90%" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" /></td>
          <td width="15%"><label>Phone</label></td>
          <td width="35%"><input type="text" name="phone" style="width:90%" value="<?php echo $info['phone']; ?>" /></td>
          </tr>
          
           <tr>
          <td width="15%"><label>Address</label></td>
          <td width="35%"><input type="text" name="address" style="width:90%" value="<?php echo $info['address']; ?>" /></td>
          <td width="15%"><label>Email</label></td>
          <td width="35%"><input type="text" name="email" style="width:90%" value="<?php echo $info['email']; ?>" /></td>
          </tr>
           <tr>
          <td width="15%"><label>City</label></td>
          <td width="35%"><input type="text" name="city" style="width:90%" value="<?php echo $info['city']; ?>" /></td>
          <td width="15%"><label>Zip code</label></td>
          <td width="35%"><input type="text" name="zip" style="width:90%" value="<?php echo $info['zip']; ?>" /></td>
          </tr>
          
           <tr>
          <td width="15%"><label>State</label></td>
          <td width="35%"><input type="text" name="state" style="width:90%" value="<?php echo $info['state']; ?>" /></td>
        
          </tr>
           <tr>
          <td colspan="4" width="100%"><br /><hr/><br/>
          <h3>PURCHASING UNIT</h3>
          </td>
          </tr>
           <tr>
          <td width="15%"><label>Year</label></td>
          <td width="35%"><input type="text" name="year" style="width:90%" value="<?php echo $info['year']; ?>" /></td>
          <td width="15%"><label>VIN</label></td>
          <td width="35%"><input type="text" name="vin" style="width:90%" value="<?php echo $info['vin']; ?>" /></td>
          </tr>
            <tr>
          <td width="15%"><label>Make</label></td>
          <td width="35%"><input type="text" name="make" style="width:90%" value="<?php echo $info['make']; ?>" /></td>
          <td width="15%"><label>Color</label></td>
          <td width="35%"><input type="text" name="unit_color" style="width:90%" value="<?php echo $info['unit_color']; ?>" /></td>
          </tr>
          
            <tr>
          <td width="15%"><label>Model</label></td>
          <td width="35%"><input type="text" name="model" style="width:90%" value="<?php echo $info['model']; ?>" /></td>
          <td width="15%"><label>Miles</label></td>
          <td width="35%"><input type="text" name="odometer" style="width:90%" value="<?php echo $info['odometer']; ?>" /></td>
          </tr>
          
          </table>
          <br />
          <table width="100%" border="1" cellpadding="2">
          <tr>
          <td width="50%" rowspan="6"><h3> Trade In</h3><br/>
          <div style="width:100%;float:left;">VIN &nbsp;<input type="text" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" style="width:88%;" /></div><br/>
          <div style="width:35%;float:left;">Year <input type="text" name="year_trade" value="<?php echo $info['year_trade']; ?>" style="width:60%;" /></div>
          <div style="width:65%;float:left;">Make &nbsp;<input type="text" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" style="width:78%;" /></div><br/>
            <div style="width:61%;float:left;">Model <input type="text" name="model_trade" value="<?php echo $info['model_trade']; ?>" style="width:80%;" /></div>
          <div style="width:38%;float:left;">Miles &nbsp;<input type="text" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>" style="width:75%;" /></div><br />
           <div style="width:40%;float:left;">Pay Off <input type="text" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" style="width:50%;" /></div>
          <div style="width:60%;float:left;">Good Through &nbsp;<input type="text" name="good_through" value="<?php echo $info['good_through']; ?>" style="width:60%;" /></div><br />
          <div style="width:100%;float:left;">Lien Holder <input type="text" name="lien_holder" value="<?php echo $info['lien_holder']; ?>" style="width:70%;" /></div>
        
          
          </td>
          <td width="35%">
          <label class="noprint" style="width:100%;height:40px;border-bottom:1px solid #000;">Fixed Fee
       
          </label>
          
          <label>Sale Price</label></td>
          <td width="15%">
          <div class="noprint" style="height:40px;border-bottom:1px solid #000;">
           <?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:90px;',
							'data-id'=>'1',
							'value'=>isset($info['fixed_fee_options'])?$info['fixed_fee_options']:''
						));
						?>
          <hr/>
          </div>
          <input type="text" name="unit_value" id="unit_value" class="amount_field" style="width:100%" value="<?php echo $info['unit_value']; ?>" /></td>
          </tr>
          <tr>
              <td width="35%"><label>Military/Police/Fire Discount</label></td>
              <td width="15%"><input type="text" name="fire_discount" id="fire_discount" class="amount_field" style="width:100%" value="<?php echo isset($info['fire_discount'])?$info['fire_discount']:''; ?>" /></td>
          </tr>
           <tr>
              <td width="35%"><label>Freight</label></td>
              <td width="15%"><input type="text" name="freight_fee" id="freight_fee" class="amount_field" style="width:100%" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
          </tr>
          <tr>
              <td width="35%"><label>Setup</label></td>
              <td width="15%"><input type="text" name="setup_fee" id="setup_fee" style="width:100%" class="amount_field" value="<?php echo isset($info['setup_fee'])?$info['setup_fee']:''; ?>" /></td>
          </tr>
           <tr>
              <td width="35%"><label>Accessories</label></td>
              <td width="15%"><input type="text" name="accs_fee" id="accs_fee" style="width:100%" class="amount_field" value="<?php echo isset($info['accs_fee'])?$info['accs_fee']:''; ?>" /></td>
          </tr>
          <tr>
              <td width="35%"><label>Trade Allowance</label></td>
              <td width="15%"><input type="text" name="trade_allowance" id="trade_allowance" style="width:100%" class="amount_field" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" /></td>
         </tr>
          
         <tr>
         	<td width="50%" rowspan="8"  valign="middle" ><div style="width:100%;float:left;"><strong>DOWN PAYMENT&nbsp;</strong><input type="text" name="down_payment" style="width:60%" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" /></div><br/>
            <div style="width:100%;float:left;"><strong>PAYMENT &nbsp;</strong><input type="text" name="payment" style="width:70%" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" /></div><br/>
              <div style="width:100%;float:left;"><strong>TERM &nbsp;</strong><input type="text" name="term" style="width:70%" value="<?php echo isset($info['term'])?$info['term']:''; ?>" /></div><br/><br/>
               <div style="width:100%;float:left;"><br/><br/>
               <strong>STIPULATIONS</strong><br/><br/>
               <label style="width:100%">
               <input type="checkbox" name="poi" value="poi" />&nbsp;POI&nbsp;<input type="checkbox" name="por" value="por" />&nbsp;POR&nbsp;<input type="checkbox" name="ins" value="ins" />INS&nbsp;<input type="checkbox" name="rfes" value="rfes" />6 REFS&nbsp;<input type="checkbox" name="dl" value="dl" /> &nbsp;DL
               </label>
               </div>
            </td>
         	<td width="35%"><label>Trade Difference</label></td>
              <td width="15%"><input type="text" name="trade_diff" id="trade_diff" class="amount_field" style="width:100%" value="<?php echo isset($info['trade_diff'])?$info['trade_diff']:''; ?>" /></td>
       		</tr>
            <tr>
            	<td width="35%"><label>State & Local Tax</label></td>
              <td width="15%"><input type="text" name="state_local_tax" id="state_local_tax" class="amount_field2" style="width:100%" value="<?php echo isset($info['state_local_tax'])?$info['state_local_tax']:''; ?>" /></td>
            </tr> 
             <tr>
            	<td width="35%"><label>Title & Registration </label></td>
              <td width="15%"><input type="text" name="registration_fee" id="registration_fee" class="amount_field2" style="width:100%" value="<?php echo isset($info['registration_fee'])?$info['registration_fee']:''; ?>" /></td>
            </tr> 
              <tr>
            	<td width="35%"><label>Labor  </label></td>
              <td width="15%"><input type="text" name="labor" class="amount_field2" id="labor" style="width:100%" value="<?php echo isset($info['labor'])?$info['labor']:''; ?>" /></td>
            </tr> 
              <tr>
            	<td width="35%"><label>State Inspection  </label></td>
              <td width="15%"><input type="text" name="inspection_fee" id="inspection_fee" class="amount_field2" style="width:100%" value="<?php echo isset($info['inspection_fee'])?$info['inspection_fee']:''; ?>" /></td>
            </tr> 
             <tr>
            	<td width="35%"><label>Vehicle Inventory Tax  </label></td>
              <td width="15%"><input type="text" name="inventory_tax" id="inventory_tax" class="amount_field2" style="width:100%" value="<?php echo isset($info['inventory_tax'])?$info['inventory_tax']:''; ?>" /></td>
            </tr>
             <tr>
            	<td width="35%"><label>Documentation Fee </label></td>
              <td width="15%"><input type="text" name="doc_fee" id="doc_fee" class="amount_field2" style="width:100%" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:125.00; ?>" /></td>
            </tr> 
                <tr>
            	<td width="35%"><label>Shipping</label></td>
              <td width="15%"><input type="text" name="shipping_fee" class="amount_field2" id="shipping_fee" style="width:100%" value="<?php echo isset($info['shipping_fee'])?$info['shipping_fee']:''; ?>" /></td>
            </tr> 
          <tr>
          <td rowspan="8">
          <h3>Notes</h3><br/><br/>
          
          <textarea name="notes" style="width:95%;" rows="7"><?php echo $info['notes']; ?></textarea>
          </td>
          <td><label>Sub Total</label></td>
          <td><input type="text" name="sub_total" class="amount_field2" id="sub_total" style="width:100%" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
          
          </tr>
           <tr>
            	<td width="35%"><label>Trade Payoff</label></td>
              <td width="15%"><input type="text" name="trade_payoff" class="amount_field2" id="trade_payoff" style="width:100%" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:''; ?>" /></td>
            </tr> 
            
              <tr>
            	<td width="35%"><label>Sub Total</label></td>
              <td width="15%"><input type="text" name="subtotal2" id="subtotal2" class="amount_field2" style="width:100%" value="<?php echo isset($info['subtotal2'])?$info['subtotal2']:''; ?>" /></td>
            </tr> 
            
              <tr>
            	<td width="35%"><label>Less Down Payment</label></td>
              <td width="15%"><input type="text" name="less_down_payment" id="less_down_payment" class="amount_field2" style="width:100%" value="<?php echo isset($info['less_down_payment'])?$info['less_down_payment']:''; ?>" /></td>
            </tr> 
          <tr>
            	<td width="35%"><label>Balance Owed</label></td>
              <td width="15%"><input type="text" name="amount" class="amount_field2" id="amount" style="width:100%" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" /></td>
            </tr> 
         
          <tr>
          <td colspan="2" rowspan="3" valign="middle">
         
         <label>Customer</label>
       
         <input type="text" style="width:95%" name="customer" /><br/><br/>
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
		<input type="hidden" id="tax_percent" name="tax_percent" value="<?php echo isset($info['tax_percent'])?$info['tax_percent']:''; ?>" />
        <input type="hidden" id="dmv_fee" name="dmv_fee" value="<?php echo isset($info['dmv_fee'])?$info['dmv_fee']:''; ?>" />
         <input type="hidden" id="dmv_offroad" name="dmv_offroad" value="<?php echo isset($info['dmv_offroad'])?$info['dmv_offroad']:''; ?>" />
        
	</div>
	
	<?php echo $this->Form->end(); ?>
	<script type="text/javascript">

function assign_fees(data,v_id)
{
	$("#setup_fee").val(data.prep_fee);
	$("#frieght_fee").val(data.frieght_fee);
	$("#tax_percent").val(data.tax_fee);
	$("#accs_fee").val(data.parts_fee);
	$("#doc_fee").val(data.doc_fee);
	$("#registration_fee").val(data.title_fee);
	
	
	$dmv_fee= (data.dmv_fee == '' || data.dmv_fee == null)? 0.00 : parseFloat(data.dmv_fee);
	$dmv_offroad= (data.dmv_offroad == '' || data.dmv_offroad == null)? 0.00 : parseFloat(data.dmv_offroad);
	$dmv_fee =isNaN($dmv_fee)?0.00:$dmv_fee;
	$dmv_offroad =isNaN($dmv_offroad)?0.00:$dmv_offroad;
	$("#dmv_fee").val($dmv_fee);
	$("#dmv_offroad").val($dmv_offroad);
}
	
	function calculate_tax(){
		
		var fire_discount = isNaN(parseFloat( $('#fire_discount').val()))?0.00:parseFloat( $('#fire_discount').val());
		var setup_fee = isNaN(parseFloat( $('#setup_fee').val()))?0.00:parseFloat($('#setup_fee').val());
		var accs_fee = isNaN(parseFloat( $('#accs_fee').val()))?0.00:parseFloat($('#accs_fee').val());
		var freight_fee = isNaN(parseFloat( $('#freight_fee').val()))?0.00:parseFloat($('#freight_fee').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		
		var state_local_tax = isNaN(parseFloat( $('#state_local_tax').val()))?0.00:parseFloat($('#state_local_tax').val());
		var registration_fee = isNaN(parseFloat( $('#registration_fee').val()))?0.00:parseFloat($('#registration_fee').val());
		
		var labor = isNaN(parseFloat( $('#labor').val()))?0.00:parseFloat($('#labor').val());
		
		var inspection_fee = isNaN(parseFloat( $('#inspection_fee').val()))?0.00:parseFloat($('#inspection_fee').val());
		var inventory_tax = isNaN(parseFloat( $('#inventory_tax').val()))?0.00:parseFloat($('#inventory_tax').val());
		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		
		var shipping_fee = isNaN(parseFloat( $('#shipping_fee').val()))?0.00:parseFloat($('#shipping_fee').val());
		
		var sell_price = isNaN(parseFloat($('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		
		var trade_payoff =	isNaN(parseFloat($('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		
		var down_payment =	isNaN(parseFloat($('#less_down_payment').val()))?0.00:parseFloat($('#less_down_payment').val());
		
		trade_diff = (sell_price+freight_fee+setup_fee+accs_fee) - (fire_discount+trade_allowance);
		
		$("#trade_diff").val(trade_diff.toFixed(2));
		
		var tax_percent = isNaN(parseFloat($("#tax_percent").val()))?0.00:parseFloat($('#tax_percent').val());
		var state_local_tax =  (parseFloat(tax_percent)/100)*trade_diff;
		$('#state_local_tax').val( state_local_tax.toFixed(2));
		state_local_tax = parseFloat(state_local_tax);
		
		sub_total = (trade_diff+state_local_tax+registration_fee+labor+doc_fee+shipping_fee+inspection_fee+inventory_tax);
		
		$("#sub_total").val(sub_total.toFixed(2));		
		sub_total2 = sub_total + trade_payoff;
		$("#subtotal2").val(sub_total2.toFixed(2));
		
		balance_owed = sub_total2 - down_payment;
		
		$("#amount").val(balance_owed.toFixed(2));
	
		}	
		
function calculate_balance()
{
	var fire_discount = isNaN(parseFloat( $('#fire_discount').val()))?0.00:parseFloat( $('#fire_discount').val());
		var setup_fee = isNaN(parseFloat( $('#setup_fee').val()))?0.00:parseFloat($('#setup_fee').val());
		var accs_fee = isNaN(parseFloat( $('#accs_fee').val()))?0.00:parseFloat($('#accs_fee').val());
		var freight_fee = isNaN(parseFloat( $('#freight_fee').val()))?0.00:parseFloat($('#freight_fee').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		
		var state_local_tax = isNaN(parseFloat( $('#state_local_tax').val()))?0.00:parseFloat($('#state_local_tax').val());
		var registration_fee = isNaN(parseFloat( $('#registration_fee').val()))?0.00:parseFloat($('#registration_fee').val());
		
		var labor = isNaN(parseFloat( $('#labor').val()))?0.00:parseFloat($('#labor').val());
		
		var inspection_fee = isNaN(parseFloat( $('#inspection_fee').val()))?0.00:parseFloat($('#inspection_fee').val());
		var inventory_tax = isNaN(parseFloat( $('#inventory_tax').val()))?0.00:parseFloat($('#inventory_tax').val());
		var doc_fee = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		
		var shipping_fee = isNaN(parseFloat( $('#shipping_fee').val()))?0.00:parseFloat($('#shipping_fee').val());
		
		var sell_price = isNaN(parseFloat($('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		
		var trade_payoff =	isNaN(parseFloat($('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		
		var down_payment =	isNaN(parseFloat($('#less_down_payment').val()))?0.00:parseFloat($('#less_down_payment').val());
		
		trade_diff = (sell_price+freight_fee+setup_fee+accs_fee) - (fire_discount+trade_allowance);
		
		$("#trade_diff").val(trade_diff.toFixed(2));
		
		state_local_tax =  isNaN(parseFloat($("#state_local_tax").val()))?0.00:parseFloat($('#state_local_tax').val());
		
		sub_total = (trade_diff+state_local_tax+registration_fee+labor+doc_fee+shipping_fee+inspection_fee+inventory_tax);
		
		$("#sub_total").val(sub_total.toFixed(2));		
		sub_total2 = sub_total + trade_payoff;
		$("#subtotal2").val(sub_total2.toFixed(2));
		
		balance_owed = sub_total2 - down_payment;
		
		$("#amount").val(balance_owed.toFixed(2));
	
}



$(document).ready(function(){
	
	var actual_balance = <?php echo ($deal['Deal']['amount'] + $deal['Deal']['trade_payoff'] ) - $deal['Deal']['down_payment'] ; ?>;
	
	var actual_value = <?php echo ($deal['Deal']['unit_value'] + $deal['Deal']['trade_allowance'] ) ; ?>;
	

	
	$(".priceChange").on('change keyup paste',function(){
								
									 calculate_tax();
									 
									 });
	
	
	$(".amount_field").on('change keyup paste',function(){
					calculate_tax();
		
					});
					
	$(".amount_field2").on('change keyup paste',function(){
					calculate_balance();
		
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
