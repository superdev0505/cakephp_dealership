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
.print_month
	{
		display:none;
	}
body{
  -webkit-print-color-adjust:exact;
}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	input[type=text]{height:25px;}
	input.border_bottom{border:none;}
	input.border_bottom{border-bottom:1px solid #000;}
}
</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


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

               <table width="100%">
               <tr>
               <td><strong id="location_phone">PHONE : (780) 923-3796</strong></td>
               <td rowspan="3"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/gibbons_logo.png'); ?>"  style="width:256px;height:90px;" /></td>
               <td><strong id="location_address">5009 50 Ave.; Box 669</strong> </td>
               </tr>
               <tr>
               <td><strong id="location_fax">FAX : (780) 923-2808</strong></td>
               <td><strong id="location_address2">Gibbons, AB   T0A 1N0</strong></td>
               </tr>

               <tr>
               <td><strong>www.gibbonsmotortoys.com</strong></td>
               <td><strong id="location_tax_no">GST# 138394176</strong></td>
               </tr>
               <tr><td colspan="3" align="center"><h2>
                  <label class="noprint" style="float:left;">Location: &nbsp;
               <?php echo $this->Form->select('location_change_select',array('gibbon_ab' => 'Gibbons AB','gibbon_bc' => 'Gibbon BC'),array('id' =>'location_change_select','name' => 'location_change','value' => isset($info['location_change'])?$info['location_change']:'')); ?>
               </label>
               Bill of Sale

               </h2></td></tr>
               </table>

               <table width="100%" border="1" cellpadding="2">
               <tr>
               <td colspan="3">Contact # <input type="text" name="conatct_number" value="<?php echo $info['contact_id']; ?>" /></td></td>

                <td>Date <input type="text" name="submit_date" value="<?php echo $expectedt; ?>" /></td></td>

               </tr>

               <tr>
               <td colspan="2">Sold To : &nbsp; <input type="text" name="name" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" style="width:80%" /> </td>
               <td colspan="2">Address : &nbsp; <input type="text" name="address" value="<?php echo $info['address'].' '.$info['address']; ?>" style="width:80%" /> </td>
               </tr>

                <tr>
               <td colspan="2">City : &nbsp; <input type="text" name="city" value="<?php echo $info['city']; ?>" style="width:80%" /> </td>
               <td>Province : &nbsp; <input type="text" name="state" value="<?php echo $info['state']; ?>" style="width:65%" /> </td>
               <td>Postal Code  : &nbsp; <input type="text" name="zip" value="<?php echo $info['zip']; ?>" style="width:60%" /> </td>
               </tr>

                <tr>
               <td>Res Ph. <input type="text" name="phone" value="<?php echo $info['phone']; ?>" /></td></td>
               <td>Buss Ph. <input type="text" name="work_number" value="<?php echo $info['work_number']; ?>" /></td></td>
               <td>Cell Ph. <input type="text" name="mobile" value="<?php echo $info['mobile']; ?>" /></td></td>
               <td>Fax # <input type="text" name="fax_num" value="<?php echo isset($info['fax_num'])?$info['fax_num']:''; ?>" /></td></td>
               </tr>
               <tr>
               <td colspan="2">Email : &nbsp; <input type="text" name="email" value="<?php echo $info['email']; ?>" style="width:80%" /> </td>
               <td align="center">
               <label style="width:32%;float:left;">Cash<br/>
               <input type="checkbox" name="is_cash" value="cash" <?php echo (isset($info['is_cash']) && $info['is_cash'] == 'cash')?'checked="checked"':''; ?> />
                </label>
               <label style="width:32%;float:left;">Contract<br/>
               <input type="checkbox" name="is_contract" value="contract" <?php echo (isset($info['is_contract']) && $info['is_contract'] == 'contract')?'checked="checked"':''; ?> /></label>
               <label style="width:32%;float:left;">Approved<br/>
               <input type="checkbox" name="is_approved" value="approved" <?php echo (isset($info['is_approved']) && $info['is_approved'] == 'approved')?'checked="checked"':''; ?> /></label>
               </td>
               <td>Salesman  : &nbsp; <input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width:60%" /> </td>
               </tr>

               </table>

               <table width="100%" cellpadding="2" border="1">
               <tr style="background-color:#ccc">
               <td width="8%" align="center"><label>Stock #</label></td>
               <td width="13%" align="center"><label>Make</label></td>
               <td width="13%" align="center"><label>Category</label></td>
               <td width="40%" align="center"><label>Description</label></td>
               <td width="12%" align="center" ><label>MSRP</label></td>
               <td width="12%" align="center"><label>SALE</label></td>
               </tr>
               <tr>
               <td align="center">
               <input type="text" name="stock_num" style ="width:90%" value="<?php  echo $info['stock_num']; ?>" />
               </td>
                 <td align="center">
               <input type="text" name="make" style ="width:90%" value="<?php  echo $info['make']; ?>" />
               </td>

               <td align="center">
               <input type="text" name="type" style ="width:90%" value="<?php  echo $info['type']; ?>" />
               </td>
               <td>
               <input type="text" name="unit_description" style ="width:95%" value="<?php  echo $info['condition'].' '.$info['model'].' '.$info['year']; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp" id="msrp"  style ="width:90%" value="<?php  echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price" id="sale_price" class="sale_price"style ="width:90%" value="<?php  echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>" />
               </td>

               </tr>

               <?php
			   $veh_checked2=(!empty($addonVehicles[0]['AddonVehicle']['condition']))?$addonVehicles[0]['AddonVehicle']['condition']:'';
			$veh_checked3=(!empty($addonVehicles[1]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition']:'';
			    ?>
               <tr>
               <td align="center">
               <input type="text" name="stock_num2" style ="width:90%" value="<?php  echo (!empty($addonVehicles[0]['AddonVehicle']['stock_num']))?$addonVehicles[0]['AddonVehicle']['stock_num']:''; ?>" />
               </td>

                <td align="center">
               <input type="text" name="make2" style ="width:95%" value="<?php  echo (!empty($addonVehicles[0]['AddonVehicle']['make']))?$addonVehicles[0]['AddonVehicle']['make']:''; ?>" />
               </td>

               <td align="center">

               <input type="text" name="type2" style ="width:95%" value="<?php  echo (!empty($addonVehicles[0]['AddonVehicle']['type']))?$addonVehicles[0]['AddonVehicle']['type']:''; ?>" />
               </td>
               <td>
                 <?php
			   $unit_description2 ='';
			   $unit_description2 .= (!empty($addonVehicles[0]['AddonVehicle']['condition']))?$addonVehicles[0]['AddonVehicle']['condition'].' ':'' ;
			  // $unit_description2 .= (!empty($addonVehicles[0]['AddonVehicle']['make']))?$addonVehicles[0]['AddonVehicle']['make'].' ':'';
			   $unit_description2 .= (!empty($addonVehicles[0]['AddonVehicle']['model']))?$addonVehicles[0]['AddonVehicle']['model'].' ':'';
			   $unit_description2 .= (!empty($addonVehicles[0]['AddonVehicle']['year']))?$addonVehicles[0]['AddonVehicle']['year']:'';
			    ?>
               <input type="text" name="unit_description2" style ="width:95%" value="<?php  echo  $unit_description2; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp2" id="msrp2"  style ="width:90%" value="<?php  echo (!empty($addonVehicles[0]['AddonVehicle']['unit_value']))?$addonVehicles[0]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price2" id="sale_price2" class="sale_price" style ="width:90%" value="<?php  echo (!empty($addonVehicles[0]['AddonVehicle']['unit_value']))?$addonVehicles[0]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               </tr>

                   <?php

			$veh_checked3=(!empty($addonVehicles[1]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition']:'';
			    ?>
               <tr>
               <td align="center">
               <input type="text" name="stock_num3" style ="width:90%" value="<?php  echo (!empty($addonVehicles[1]['AddonVehicle']['stock_num']))?$addonVehicles[1]['AddonVehicle']['stock_num']:''; ?>" />
               </td>
                <td align="center">
               <input type="text" name="make3" style ="width:90%" value="<?php  echo (!empty($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make']:''; ?>" />
               </td>


               <td align="center">

               <input type="text" name="type3" style ="width:90%" value="<?php  echo (!empty($addonVehicles[1]['AddonVehicle']['type']))?$addonVehicles[1]['AddonVehicle']['type']:''; ?>" />
               </td>
               <td>
                 <?php
			   $unit_description3 ='';
			   $unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition'].' ':'' ;
			  // $unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['model']))?$addonVehicles[1]['AddonVehicle']['model'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['year']))?$addonVehicles[1]['AddonVehicle']['year']:'';
			    ?>
               <input type="text" name="unit_description3" style ="width:95%" value="<?php  echo  $unit_description3; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp3" id="msrp3" style ="width:90%" value="<?php  echo (!empty($addonVehicles[1]['AddonVehicle']['unit_value']))?$addonVehicles[1]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price3" id="sale_price3"  class="sale_price" style ="width:90%" value="<?php  echo (!empty($addonVehicles[1]['AddonVehicle']['unit_value']))?$addonVehicles[1]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               </tr>

               <tr>
               <td align="center">
               <input type="text" name="stock_num4" style ="width:90%" value="<?php  echo (!empty($addonVehicles[2]['AddonVehicle']['stock_num']))?$addonVehicles[2]['AddonVehicle']['stock_num']:''; ?>" />
               </td>
                <td align="center">
               <input type="text" name="make4" style ="width:90%" value="<?php  echo (!empty($addonVehicles[2]['AddonVehicle']['make']))?$addonVehicles[2]['AddonVehicle']['make']:''; ?>" />
               </td>


               <td align="center">

               <input type="text" name="type4" style ="width:90%" value="<?php  echo (!empty($addonVehicles[2]['AddonVehicle']['type']))?$addonVehicles[2]['AddonVehicle']['type']:''; ?>" />
               </td>
               <td>
                 <?php
			   $unit_description3 ='';
			   $unit_description3 .= (!empty($addonVehicles[2]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition'].' ':'' ;
			   //$unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[2]['AddonVehicle']['model']))?$addonVehicles[2]['AddonVehicle']['model'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[2]['AddonVehicle']['year']))?$addonVehicles[2]['AddonVehicle']['year']:'';
			    ?>
               <input type="text" name="unit_description4" style ="width:95%" value="<?php  echo  $unit_description3; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp4" id="msrp4" style ="width:90%" value="<?php  echo (!empty($addonVehicles[2]['AddonVehicle']['unit_value']))?$addonVehicles[2]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price4" id="sale_price4"  class="sale_price" style ="width:90%" value="<?php  echo (!empty($addonVehicles[2]['AddonVehicle']['unit_value']))?$addonVehicles[2]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               </tr>

                    <tr>
               <td align="center">
               <input type="text" name="stock_num5" style ="width:90%" value="<?php  echo (!empty($addonVehicles[3]['AddonVehicle']['stock_num']))?$addonVehicles[3]['AddonVehicle']['stock_num']:''; ?>" />
               </td>
                <td align="center">
               <input type="text" name="make5" style ="width:90%" value="<?php  echo (!empty($addonVehicles[3]['AddonVehicle']['make']))?$addonVehicles[3]['AddonVehicle']['make']:''; ?>" />
               </td>


               <td align="center">

               <input type="text" name="type5" style ="width:90%" value="<?php  echo (!empty($addonVehicles[3]['AddonVehicle']['type']))?$addonVehicles[3]['AddonVehicle']['type']:''; ?>" />
               </td>
               <td>
                 <?php
			   $unit_description3 ='';
			   $unit_description3 .= (!empty($addonVehicles[3]['AddonVehicle']['condition']))?$addonVehicles[3]['AddonVehicle']['condition'].' ':'' ;
			   //$unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[3]['AddonVehicle']['model']))?$addonVehicles[3]['AddonVehicle']['model'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[3]['AddonVehicle']['year']))?$addonVehicles[3]['AddonVehicle']['year']:'';
			    ?>
               <input type="text" name="unit_description5" style ="width:95%" value="<?php  echo  $unit_description3; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp5" id="msrp5" style ="width:90%" value="<?php  echo (!empty($addonVehicles[3]['AddonVehicle']['unit_value']))?$addonVehicles[3]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price5" id="sale_price5"  class="sale_price" style ="width:90%" value="<?php  echo (!empty($addonVehicles[3]['AddonVehicle']['unit_value']))?$addonVehicles[3]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               </tr>

               <tr>
               <td align="center">
               <input type="text" name="stock_num6" style ="width:90%" value="<?php  echo (!empty($addonVehicles[4]['AddonVehicle']['stock_num']))?$addonVehicles[4]['AddonVehicle']['stock_num']:''; ?>" />
               </td>
                <td align="center">
               <input type="text" name="make6" style ="width:90%" value="<?php  echo (!empty($addonVehicles[4]['AddonVehicle']['make']))?$addonVehicles[4]['AddonVehicle']['make']:''; ?>" />
               </td>


               <td align="center">

               <input type="text" name="type6" style ="width:90%" value="<?php  echo (!empty($addonVehicles[4]['AddonVehicle']['type']))?$addonVehicles[4]['AddonVehicle']['type']:''; ?>" />
               </td>
               <td>
                 <?php
			   $unit_description3 ='';
			   $unit_description3 .= (!empty($addonVehicles[4]['AddonVehicle']['condition']))?$addonVehicles[4]['AddonVehicle']['condition'].' ':'' ;
			   //$unit_description3 .= (!empty($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[4]['AddonVehicle']['model']))?$addonVehicles[4]['AddonVehicle']['model'].' ':'';
			   $unit_description3 .= (!empty($addonVehicles[4]['AddonVehicle']['year']))?$addonVehicles[4]['AddonVehicle']['year']:'';
			    ?>
               <input type="text" name="unit_description6" style ="width:95%" value="<?php  echo  $unit_description3; ?>" />
               </td>
               <td align="center">
               <input type="text" name="msrp6" id="msrp6" style ="width:90%" value="<?php  echo (!empty($addonVehicles[4]['AddonVehicle']['unit_value']))?$addonVehicles[4]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               <td align="center">
               <input type="text" name="sale_price6" id="sale_price6"  class="sale_price" style ="width:90%" value="<?php  echo (!empty($addonVehicles[4]['AddonVehicle']['unit_value']))?$addonVehicles[4]['AddonVehicle']['unit_value']:''; ?>" />
               </td>
               </tr>

               <tr>
               <td colspan="4"><label>Dealer Installed Accessories :</label></td>
               <td> &nbsp;</td>
               <td> &nbsp;</td>
               </tr>

               <tr>
               <td colspan="4"> <input type="text" name="accs_desc1"  style ="width:90%" value="<?php  echo isset($info['accs_desc1'])?$info['accs_desc1']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp1" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp1'])?$info['accs_msrp1']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale1" class="accs_price"  style ="width:90%" value="<?php  echo isset($info['accs_sale1'])?$info['accs_sale1']:''; ?>" /></td>
               </tr>
                <tr>
               <td colspan="4"> <input type="text" name="accs_desc2"  style ="width:90%" value="<?php  echo isset($info['accs_desc2'])?$info['accs_desc2']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp2" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp2'])?$info['accs_msrp2']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale2" class="accs_price" style ="width:90%" value="<?php  echo isset($info['accs_sale1'])?$info['accs_sale2']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc3"  style ="width:90%" value="<?php  echo isset($info['accs_desc3'])?$info['accs_desc3']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp3" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp3'])?$info['accs_msrp3']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale3" class="accs_price"  style ="width:90%" value="<?php  echo isset($info['accs_sale3'])?$info['accs_sale3']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc4"  style ="width:90%" value="<?php  echo isset($info['accs_desc4'])?$info['accs_desc4']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp4" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp4'])?$info['accs_msrp4']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale4" class="accs_price"  style ="width:90%" value="<?php  echo isset($info['accs_sale4'])?$info['accs_sale4']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc5"  style ="width:90%" value="<?php  echo isset($info['accs_desc5'])?$info['accs_desc5']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp5" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp5'])?$info['accs_msrp5']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale5" class="accs_price" style ="width:90%" value="<?php  echo isset($info['accs_sale5'])?$info['accs_sale5']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc6"  style ="width:90%" value="<?php  echo isset($info['accs_desc6'])?$info['accs_desc6']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp6" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp6'])?$info['accs_msrp6']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale6" class="accs_price" style ="width:90%" value="<?php  echo isset($info['accs_sale6'])?$info['accs_sale6']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc7"  style ="width:90%" value="<?php  echo isset($info['accs_desc7'])?$info['accs_desc7']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp7" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp7'])?$info['accs_msrp7']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale7" class="accs_price"  style ="width:90%" value="<?php  echo isset($info['accs_sale7'])?$info['accs_sale7']:''; ?>" /></td>
               </tr>

                <tr>
               <td colspan="4"> <input type="text" name="accs_desc8"  style ="width:90%" value="<?php  echo isset($info['accs_desc8'])?$info['accs_desc8']:''; ?>" /></td>
               <td>  <input type="text" name="accs_msrp8" class="accs_field"  style ="width:90%" value="<?php  echo isset($info['accs_msrp8'])?$info['accs_msrp8']:''; ?>" /></td>
              <td>  <input type="text" name="accs_sale9" class="accs_price"  style ="width:90%" value="<?php  echo isset($info['accs_sale9'])?$info['accs_sale9']:''; ?>" /></td>
               </tr>

               <tr style="background-color:#ccc">
               <td colspan="4" align="center"><strong><i>All credit card payments over $1000 are subject to a 2% surcharge</i></strong></td>
               <td><label class="noprint">Fixed Fee</label>&nbsp;</td>
               <td><?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options noprint',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:90px;',
							'data-id'=>'1',
							'value'=>isset($info['fixed_fee_options'])?$info['fixed_fee_options']:''
						));
						?></td>
               </tr>
               </table>
               <table width="100%" cellpadding="2" border="1">
				<tr>
               <td colspan="2" align="center"><h2>REQUESTED DELIVERY:</h2></td>
                <td width="30%"><label>UNIT TOTAL:</label></td>
               <td width="20%"><input type="text" name="unit_total"  class="amount_field" id="unit_total" value="<?php echo isset($info['unit_total'])?$info['unit_total']:''; ?>" /></td>
                </tr>
                <tr>
                  <td width="30%">Date: &nbsp;<input type="text" name="delivery_date" style="width:72%;" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" /></td>
                  <td width="30%">Time: &nbsp;<input type="text" name="delivery_time" style="width:72%;" value="<?php echo isset($info['delivery_time'])?$info['delivery_time']:''; ?>" /></td>
                <td><label>ACCESSORY TOTAL:</label></td>
                 <td width="20%"><input type="text" name="accs_total"  class="amount_field" id="accs_total" value="<?php echo isset($info['accs_total'])?$info['accs_total']:''; ?>" /></td>
                </tr>
                <tr>

                 <td style="background:#ccc" colspan="2" align="center"><h2>TRADE INFORMATION</h2></td>
                  <td><label>COMBINED PACKAGE:</label></td>
                  <td><input type="text" name="combine_total"  class="amount_field" id="combine_total" value="<?php echo isset($info['combine_total'])?$info['combine_total']:''; ?>" /></td>
                </tr>
                <tr>
              <td colspan="2" rowspan="4"><p>I herewith transfer to dealer all my rights, title and ownership in the below equipment, and I declare I am the sole owner and possessor of same and that there is no mortgage, lien, note or claim of any kind or nature adverse to my rights of, upon or against said vehicle other that as stated.</p></td>
                <td><label>DELIVERY & REGISTRATION FEES:</label></td>
                <td><input type="text" name="regs_fee"  class="amount_field" id="regs_fee" value="<?php echo isset($info['regs_fee'])?$info['regs_fee']:''; ?>" /></td>
                </tr>
                <tr>
                <td><small>Tire Recycling Fee:</small> <?php
						echo $this->Form->input('axle_count', array(
							'id' => "axle_count",
							'name' => "axle_count",
							'type' => 'select',
							'options' => array('2' =>'2 Tire','4' => '2+ Tire'),
							'empty' => "No Fee",
							'class' => 'input-sm axle_count noprint',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:100px;',
							'data-id'=>'1',
							'value'=>isset($info['axle_count'])?$info['axle_count']:''
						));
						?></td>
                <td><input type="text" name="recycle_fee"  class="amount_field" id="recycle_fee" value="<?php echo isset($info['recycle_fee'])?$info['recycle_fee']:''; ?>" /></td>

                </tr>
                <tr>
                <td><label>Freight & PDI</label></td>
                <td><input type="text" name="freight_fee"  class="amount_field" id="freight_fee" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
                </tr>
                <tr>
                <td><label>SUB  TOTAL</label></td>
                <td><input type="text" name="sub_total"  class="amount_field" id="sub_total" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
                </tr>

                <tr>
                <td colspan="2">Desc : &nbsp;<input type="text" name="trade_desc" style="width:85%;" value="<?php echo isset($info['trade_desc'])?$info['trade_desc']:''; ?>" /></td>
                <td>
                <label>NET TRADE - IN ALLOWANCE</label>
                </td>
                 <td><input type="text" name="net_allowance"  class="amount_field" id="net_allowance" value="<?php echo isset($info['net_allowance'])?$info['net_allowance']:''; ?>" /></td>
                </tr>

                <tr>
                <td colspan="2">Desc : &nbsp;<input type="text" name="trade_desc2" style="width:85%;" value="<?php echo isset($info['trade_desc2'])?$info['trade_desc2']:''; ?>" /></td>
                <td>
                <label>GST 1 = Taxable &nbsp;&nbsp; 0 = Exempt</label>
                </td>
                 <td><input type="text" name="gst"  class="amount_field" id="gst" value="<?php echo isset($info['gst'])?$info['gst']:''; ?>" /></td>
                </tr>

                 <tr>
                <td colspan="2">Desc : &nbsp;<input type="text" name="trade_desc3" style="width:85%;" value="<?php echo isset($info['trade_desc3'])?$info['trade_desc3']:''; ?>" /></td>
                <td>
                <label>TOTAL PURCHASE PRICE</label>
                </td>
                 <td><input type="text" name="total_purchase"  class="amount_field" id="total_purchase" value="<?php echo isset($info['total_purchase'])?$info['total_purchase']:''; ?>" /></td>
                </tr>

                <tr>
                <td colspan="2">Desc : &nbsp;<input type="text" name="trade_desc4" style="width:85%;" value="<?php echo isset($info['trade_desc4'])?$info['trade_desc4']:''; ?>" /></td>
                <td>
                <label>CASH DEPOSIT WITH THIS ORDER</label>
                </td>
                 <td><input type="text" name="cash_deposit"  class="amount_field" id="cash_deposit" value="<?php echo isset($info['cash_deposit'])?$info['cash_deposit']:''; ?>" /></td>
                </tr>
                <tr>
                <td colspan="2">Desc : &nbsp;<input type="text" name="trade_desc5" style="width:85%;" value="<?php echo isset($info['trade_desc5'])?$info['trade_desc5']:''; ?>" /></td>
                <td>
                <label>CASH DUE UPON DELIVERY:</label>
                </td>
                 <td><input type="text" name="amount"   id="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" /></td>
                </tr>

               </table>
               <br/>
               <table cellpadding="2" width="100%">
               <tr>
               <td colspan="4" align="center" ><h3><i>FINAL SALE SUBJECT TO APPROVED CREDIT &  ACCEPTABLE TRADE - IN VALUE.</i></h3><br/>
             <label><i>In the event that the Customer fails to perform this contract, all Deposits shall be subsequently forfeited  on account of liquidated damages, and not as a penalty. The Dealer may also take such other remedies against the Customer that the Dealer has at law.</i></label>
               </td>
               </tr>
               <tr>
               <td width="20%"><label>Customer Signature:</label></td>
               <td width="40%"><input type="text" name="customer_sig" style="width:80%;" class="border_bottom" /></td>
               <td width="15%"><label>Date:</label></td>
               <td width="25%"><input type="text" name="customer_date" style="width:80%;" class="border_bottom" /></td>
               </tr>

               <tr>
               <td width="20%"><label>Dealer Signature:</label></td>
               <td width="40%"><input type="text" name="dealer_sig" style="width:80%;" class="border_bottom" /></td>
               <td width="15%"><label>Date:</label></td>
               <td width="25%"><input type="text" name="dealer_date" style="width:80%;" class="border_bottom" /></td>
               </tr>
               </table>



		<!-- no print buttons end -->
	</div>

		<!-- no print buttons -->
	<br/>
	</div>

	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>

		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>

		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
        <input type="hidden" id="vehicle_axle_fee_4" name="vehicle_axle_fee_4" value="0" />
        <input type="hidden" id="vehicle_axle_fee_2" name="vehicle_axle_fee_2" value="0" />

	</div>

	<?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">

function assign_fees(data)
{
	$("#regs_fee").val(data.title_fee);
	$("#freight_fee").val(data.freight_fee);
	$("#prep_fee").val(data.prep_fee);
	$("#doc_fee").val(data.doc_fee);
	$("#tax_percent").val(data.tax_fee);
	$("#vehicle_axle_fee_4").val(data.vehicle_axle_fee_4);
	$("#vehicle_axle_fee_2").val(data.vehicle_axle_fee_2);
	$("#recycle_fee").val($axle_fee);
	$("#parts_fee").val(data.parts_fee);
	$("#loan_apr").val(data.apr_percentage);
}

function location_address_change()
{
	$val = $("#location_change_select").val();
	if($val =='gibbon_ab')
	{
		$("#location_phone").text('PHONE : (780) 923-3796');
		$("#location_address").text('5009 50 Ave. Box 669');
		$("#location_fax").text('FAX : (780) 923-2808');
		$("#location_address2").text('Gibbons, AB   T0A 1N0');
		$("#location_tax_no").text('GST# 138394176');

	}else
	{
		$("#location_phone").text('PHONE : (250) 833-0058');
		$("#location_address").text('630 Ross Street');
		$("#location_fax").text('FAX : (888) 684-8466');
		$("#location_address2").text('Salmon Arm, BC   V1E 2T3');
		$("#location_tax_no").html('GST# 138394176 <br/> PST# 1014-8694');
	}
}


function calculate_tax(){
		var tax_value=isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat( $('#tax_percent').val());
		var freight_fee=isNaN(parseFloat( $('#freight_fee').val()))?0.00:parseFloat( $('#freight_fee').val());

		var regs_fee=isNaN(parseFloat( $('#regs_fee').val()))?0.00:parseFloat( $('#regs_fee').val());
		var trade_allowance=isNaN(parseFloat( $('#net_allowance').val()))?0.00:parseFloat( $('#net_allowance').val());
		var cash_deposit=isNaN(parseFloat( $('#cash_deposit').val()))?0.00:parseFloat( $('#cash_deposit').val());


		$axle_count = $("#axle_count").val();
		recycle_fee=0.00;
		if($axle_count =='2')
		{
			recycle_fee =isNaN(parseFloat( $('#vehicle_axle_fee_2').val()))?0.00:parseFloat( $('#vehicle_axle_fee_2').val());
		}else if($axle_count =='4')
		{
			recycle_fee = isNaN(parseFloat( $('#vehicle_axle_fee_4').val()))?0.00:parseFloat( $('#vehicle_axle_fee_4').val());
		}
		$("#recycle_fee").val(recycle_fee.toFixed(2));

		var sell_price = 0.00;

		$(".sale_price").each(function(){
			sell_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		var accs_price = 0.00;

		$(".accs_price").each(function(){
			accs_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});

		$("#unit_total").val(sell_price.toFixed(2));
		$("#accs_total").val(accs_price.toFixed(2));
		combine_total = sell_price + accs_price;
		$("#combine_total").val(combine_total.toFixed(2));
		sub_total = combine_total+freight_fee+regs_fee+recycle_fee;
		$("#sub_total").val(sub_total.toFixed(2));
		sub_amount = sub_total - trade_allowance;

		//calculate GST tax
		var amountIncludingTax =  (parseFloat(tax_value)/100)*sub_amount;

		$("#gst").val(amountIncludingTax.toFixed(2));

		total_purchase = sub_amount + amountIncludingTax;

		$("#total_purchase").val(total_purchase.toFixed(2));

		balance_due = total_purchase - cash_deposit;

		$("#amount").val(balance_due.toFixed(2));

	}



$(document).ready(function(){

	//alert("please select a fee");

	var actual_balance = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;


	$("#location_change_select").on('change',function(){
		location_address_change();

		});
	<?php if(!empty($info['location_change_select'])){ ?>
			location_address_change();
	<?php } ?>

	$('#fixed_fee_options1').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					assign_fees(data);
					calculate_tax();
				}
			});
		}
	});


	$(".amount_field,.accs_price,.sale_price").on('change keyup paste',function(){
				calculate_tax();

	});

	$("#axle_count").on('change',function(){
			calculate_tax();
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
	if($('#apr').val() != "" && $('#apr').val() != null){
	calculateMonthWisePayments();
	}else {
		$('input[id^="paymentFor"]').val("");
	}
	var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
	$('#apr').on('change keyup paste',function(){

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

});
function calculate()
{
	var selling_price = $('#sell_price').val();
	var freight = $('#freight').val();
	var prep = $('#prep').val();
	var doc = $('#doc').val();
	var parts_fee = "0";
	var service_fee = "0";
	var parts_service = parseFloat(parts_fee)+parseFloat(service_fee);
	var tag_fee = "0";
	var title_fee = "0";
	var tag_title = parseFloat(tag_fee)+parseFloat(title_fee);
	$('#part_serv').val(parts_service);
	$('#tag_tit').val(tag_title);
	var amount = parseFloat(selling_price) + parseFloat(freight) + parseFloat(prep) + parseFloat(doc) + parseFloat(parts_service) + parseFloat(tag_title);
	var tax = $('#tax').val();
	var amountIncludingTax = amount + (amount*parseFloat(tax))/100;
	var estimated_payoff = $('#est_payoff').val();
	if(estimated_payoff.trim() === "") {
		estimated_payoff = 0;
	}

	var downpayment = $('#down_pay').val();
	if(downpayment.trim() === "") {
		downpayment = 0;
	}
	if(isNaN(downpayment) || isNaN(estimated_payoff))
	{
		//alert("Please enter valid amount");
		if(isNaN(downpayment)){
			$('#errorForDownPay').text("Please enter valid  Down Payment.");
			$('#down_pay').val("");
		}else{
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
		}
		$('#bal').val("");
		$('.options_price').val("");

	}else{
		$('#errorForDownPay').text("");
		$('#errorForPayoff').text("");
	var balance = parseFloat(amountIncludingTax) + parseFloat(estimated_payoff) - parseFloat(downpayment);
		balance_value = balance.toFixed(2);
		if(!isNaN(balance_value)){
			$('#bal').val(balance_value);
		}

	}

	//console.log( $('#bal').val() );

}


	 function calculateMonthWisePayments(){

		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
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
</script>
</div>
