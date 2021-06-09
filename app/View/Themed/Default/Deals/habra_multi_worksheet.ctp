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
$expectedt = date('M d, Y h:i A');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;

?>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
if(empty($deal['Deal']['payment_option1']))
{
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}
}else
{
	$selected_months=array('1'=>$deal['Deal']['payment_option1'],2=>$deal['Deal']['payment_option2'],3=>$deal['Deal']['payment_option3'],4=>$deal['Deal']['payment_option4']);
}


?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;">
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
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
.two-three,
.six,
.label20,
.label30,
.eight {
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
    border-color: #aaa;
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
.blank_pad{
	padding:4px;
}
.print_month
	{
		display:none;
	}
.border_class{
	border: 1px solid #aaa;
}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;font-size:10px;} h2 {font-size:10px!important;fontweight:bolder;} h4,h3 {font-size:8px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	.blank_pad{
	padding:0px;
}
input[type="text"]{
height : 24px!important;

}
}
</style>

		<div class="wraper header">
        <?php //pr($contact); ?>
        <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
             <table cellpadding="4">
             <tr>
             <td>CRM REF #<br/>
             	<input name="ref_num" type="text" style="width:150px" value="<?php echo $info['contact_id']; ?>" placeholder=""/><br /><br />
                 Bank # <br />
                <input name="bank" type="text" style="width:150px;" value="7465883585" placeholder=""/>
             </td>
             <td style="width:50%">
             <?php
			$custom_form_dealer_ids=array(1224, 829, 830,5000,3682);
			$dealer_id = AuthComponent::user('dealer_id');
			
			$logo = "del_amo_miles.png";
			
			if($dealer_id == 830){
			   $logo = "delamo-logo-830.png";
			}
			if($dealer_id == 1224){
			   $logo = "delamo-logo-v2-white-1224.png";
			}
            if($dealer_id == 3682){
              $logo = "logo.png";
            }
			if (in_array($dealer_id , $custom_form_dealer_ids))
			{
				//$dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/del-amo-ms-logo.png';
				$dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/'.$logo;

				echo $this->Html->image( $dealer_logo,array('style'=>'width:350px;height:150px;'));
			}
			 ?>
             </td>

             <td>Salesman <br/>
             <input name="sperson" type="text" style="width:250px;" value="<?php echo $info['sperson']; ?>" placeholder=""/><br /><br />
             Source <br />
              	<input name="source" type="text" style="width:250px;" style="width:46%" value="<?php echo $info['source']; ?>" placeholder=""/>	<br /><br />
                Date
                <br />
                 <input name="date" type="text" style="width:250px;" value="<?php echo $expectedt; ?>" placeholder=""/>

              </td>
             </tr>
             </table>


            <br />
            <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']);
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>
             <span class="span15">Client name</span>
                <input type="text" class="input20" name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>" />

                <span class="span15">Home Phone</span>
                <input type="text" class="input20" style="width:16%" name="phone" value="<?php echo $cleaned2; ?>" />
                <span class="span15" >Business Phone</span>
                <input type="text" class="input20" style="width:16%" name="work_number" value="<?php echo $cleaned3;  ?>" />
                <br />
                 <span class="span24">Street Address</span>
                <input type="text" class="input71" name="address" value="<?php echo $info['address']; ?>" /><br />
                <span class="span24">Email</span>
                <input type="text" class="input35" name="email" value="<?php echo $info['email']; ?>"   />
                 <span class="span24" style="width:12%">Cell</span>
                <input type="text" class="input35" style="width:25%" name="mobile" value="<?php echo $cleaned1; ?>"   />
                <br />
                 <span class="span24"  >City</span>
                <input type="text" class="input35" style="width:22%" name="city" value="<?php echo $info['city']; ?>"   />
                <span class="span24" style="width:5%" >Zip</span>
                <input type="text" class="input35" style="width:22%" name="zip" value="<?php echo $info['zip']; ?>"  /> <span class="span24" style="width:15%" >&nbsp;</span>
                <br />

			<table  cellpadding="3" bordercolor="#CCCCCC" border="1" >
			<tr><td colspan="12" align="center">Description Of Purchases</td></tr>
            <tr><td>
            <input type="radio" name="condition" value="New" <?php echo (isset($info['condition'])&& $info['condition']=='New')?'checked="checked"':''; ?> />&nbsp;New
            <input type="radio" name="condition" value="Used" <?php echo (isset($info['condition'])&& $info['condition']=='Used')?'checked="checked"':''; ?>  />&nbsp;Used
            </td><td>Year</td>
            <td><input type="text" style="width:50px;" name="year" value="<?php echo $info['year']; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:80px;" name="make" value="<?php echo $info['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:100px;" name="model" value="<?php echo $info['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin" value="<?php echo $info['vin']; ?>" /></td>
			<td>Mileage</td>
            <td><input type="text"  style="width:60px;" name="Milage1" value="<?php echo isset($info['Milage1'])?$info['Milage1']:$info['odometer']; ?>" /></td>
			</tr>
            <?php
			$veh_checked2=(!empty($addonVehicles[0]['AddonVehicle']['condition']))?$addonVehicles[0]['AddonVehicle']['condition']:'';
			$veh_checked3=(!empty($addonVehicles[1]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition']:'';
				//$veh_checked2=(isset($info['condition2'])&&!empty($info['condition2']))?$info['condition2']:$addonVehicles[0]['AddonVehicle']['condition'];
			//$veh_checked3=(isset($info['condition3'])&& !empty($info['condition3']))?$info['condition3']:$addonVehicles[1]['AddonVehicle']['condition'];

			 ?>
             <tr><td><input type="radio" name="condition2" value="New" <?php echo ($veh_checked2=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition2" value="Used" <?php echo ($veh_checked2=='Used')?'checked="checked"':''; ?> />&nbsp;Used</td>
            </td><td>Year</td>
            <td><input type="text" style="width:50px;" name="year2" value="<?php echo (isset($addonVehicles[0]['AddonVehicle']['year']))?$addonVehicles[0]['AddonVehicle']['year']:''; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:80px;" name="make2" value="<?php echo $addonVehicles[0]['AddonVehicle']['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:100px;" name="model2" value="<?php echo $addonVehicles[0]['AddonVehicle']['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin2" value="<?php echo $addonVehicles[0]['AddonVehicle']['vin']; ?>" /></td>
				<td>Mileage</td>
            <td><input type="text"  style="width:60px;" name="Milage2" value="<?php echo isset($info['Milage2'])?$info['Milage2']:$addonVehicles[0]['AddonVehicle']['odometer']; ?>" /></td>

			</tr>
               <tr><td><input type="radio" name="condition3" value="New" <?php echo ($veh_checked3=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition3" value="Used" <?php echo ($veh_checked3=='Used')?'checked="checked"':''; ?> />&nbsp;Used</td>
            </td><td>Year</td>
            <td><input type="text" style="width:50px;" name="year3" value="<?php echo $addonVehicles[1]['AddonVehicle']['year']; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:80px;" name="make3" value="<?php echo$addonVehicles[1]['AddonVehicle']['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:100px;" name="model3" value="<?php echo $addonVehicles[1]['AddonVehicle']['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin3" value="<?php echo $addonVehicles[1]['AddonVehicle']['vin']; ?>" /></td>
			<td>Mileage</td>
            <td><input type="text"  style="width:60px;" name="Milage3" value="<?php echo isset($info['Milage3'])?$info['Milage3']:$addonVehicles[1]['AddonVehicle']['odometer']; ?>" /></td>

			</tr></table>


            <table class="left1" style="border-color:#CCC" >
            <tr><td></td><td>Unit 1</td><td>Unit 2</td><td>Unit 3</td></tr>

             <tr class="noprint">
             <td>DMV Fee type</td>
              <td><?php
			  $dmv_fee_option = array('on' => 'On Road','off' => 'Off Road');

						echo $this->Form->input('dmv_fee_type1', array(
							'id' => "dmv_fee_type1",
							'name' => "dmv_fee_type1",
							'type' => 'select',
							'options' => $dmv_fee_option,
							'empty' => "Fee Type",
							'class' => 'input-sm dmv_fee_type',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>isset($info['dmv_fee_type1'])?$info['dmv_fee_type1']:''
						));
						?></td>
                         <td><?php
						echo $this->Form->input('dmv_fee_type2', array(
							'id' => "dmv_fee_type2",
							'name' => "dmv_fee_type2",
							'type' => 'select',
							'options' => $dmv_fee_option,
							'empty' => "Fee Type",
							'class' => 'input-sm dmv_fee_type',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>isset($info['dmv_fee_type2'])?$info['dmv_fee_type2']:''
						));
						?></td> <td><?php
							echo $this->Form->input('dmv_fee_type3', array(
							'id' => "dmv_fee_type3",
							'name' => "dmv_fee_type3",
							'type' => 'select',
							'options' => $dmv_fee_option,
							'empty' => "Fee Type",
							'class' => 'input-sm dmv_fee_type',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>isset($info['dmv_fee_type3'])?$info['dmv_fee_type3']:''
						));
						?></td>
             </tr>

             <tr class="noprint">
             <td>No. of Axle</td>
              <td><?php
						echo $this->Form->input('axle_count1', array(
							'id' => "axle_count1",
							'name' => "axle_count1",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>$info['axle_count1']
						));
						?></td>
                         <td><?php
						echo $this->Form->input('axle_count2', array(
							'id' => "axle_count2",
							'name' => "axle_count2",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>$info['axle_count2']
						));
						?></td> <td><?php
						echo $this->Form->input('axle_count3', array(
							'id' => "axle_count3",
							'name' => "axle_count3",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>$info['axle_count3']
						));
						?></td>
             </tr>

            <tr class="noprint"><td>Fixed Fee</td>
            <td><?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>$info['fixed_fee_options']
						));
						?></td>
            <td><?php
						echo $this->Form->input('fixed_fee_options2', array(
							'id' => "fixed_fee_options2",
							'name' => "fixed_fee_options2",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>$info['fixed_fee_options2']
						));
						?></td>
            <td><?php
						echo $this->Form->input('fixed_fee_options3', array(
							'id' => "fixed_fee_options3",
							'name' => "fixed_fee_options3",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>$info['fixed_fee_options3']
						));
						?></td></tr>
            <tr><td>MSRP</td>
            <td>$<input type="text" name="msrp" class="msrp amount_input" value="<?php echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>" data-id="1" id="msrp1" style="width:68px;"/></td>
            <td>$<input type="text" name="msrp2"  class="msrp amount_input" data-id="2"  id="msrp2" value="<?php echo isset($info['msrp2'])?$info['msrp2']:$info['unit_value_addon1']; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="msrp3" class="msrp amount_input" data-id="3"   id="msrp3" value="<?php echo isset($info['msrp3'])?$info['msrp3']:$info['unit_value_addon2']; ?>"  style="width:68px;"/></td></tr>
            <tr><td>Destination</td>
            <td>$<input type="text" name="destination_fee" class="destination_fee amount_input" value="<?php echo isset($info['destination_fee'])?$info['destination_fee']:''; ?>" data-id="1" id="destination_fee1" style="width:68px;"/></td>
            <td>$<input type="text" name="destination_fee2"  class="destination_fee amount_input" data-id="2"  id="destination_fee2" value="<?php echo isset($info['destination_fee2'])?$info['destination_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="destination_fee3" class="destination_fee amount_input" data-id="3"   id="destination_fee3" value="<?php echo isset($info['destination_fee3'])?$info['destination_fee3']:''; ?>"  style="width:68px;"/></td></tr>
            <tr><td>Set up/ADM</td>
            <td>$<input type="text" name="freight_fee" class="freight_fee amount_input" data-id="1"   id="freight_fee1" style="width:68px;" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee2" class="freight_fee amount_input" data-id="2" id="freight_fee2" style="width:68px;" value="<?php echo isset($info['freight_fee2'])?$info['freight_fee2']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee3" class="freight_fee amount_input" data-id="3" value="<?php echo isset($info['freight_fee3'])?$info['freight_fee3']:'0.00'; ?>" id="freight_fee3" style="width:68px;"/></td></tr>
           <?php /* ?> <tr><td>Preparation</td>
            <td>$<input type="text" name="prep_fee" class="prep_fee amount_input" data-id="1" id="prep_fee1" value="<?php echo isset($info['prep_fee'])?$info['prep_fee']:'0.00'; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="prep_fee2" class="prep_fee amount_input" data-id="2"  id="prep_fee2" value="<?php echo isset($info['prep_fee2'])?$info['prep_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="prep_fee3" class="prep_fee amount_input" data-id="3"  id="prep_fee3" value="<?php echo isset($info['prep_fee3'])?$info['prep_fee3']:''; ?>" style="width:68px;"/></td></tr>
			<?php */ ?>
            <tr><td>Installed Equipment</td>
            <td>$<input type="text" name="parts_fee" class="parts_fee  amount_input" data-id="1" id="parts_fee1" value="<?php echo isset($info['parts_fee'])?$info['parts_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="parts_fee2" class="parts_fee amount_input" data-id="2" id="parts_fee2" value="<?php echo isset($info['parts_fee2'])?$info['parts_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="parts_fee3" class="parts_fee amount_input" data-id="3" id="parts_fee3" value="<?php echo isset($info['parts_fee3'])?$info['parts_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>DOC</td>
            <td>$<input type="text" name="doc_fee" class="doc_fee amount_input" data-id="1"  id="doc_fee1" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="doc_fee2" class="doc_fee amount_input" data-id="2"  id="doc_fee2" value="<?php echo isset($info['doc_fee2'])?$info['doc_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="doc_fee3" class="doc_fee amount_input" data-id="3"  id="doc_fee3" value="<?php echo isset($info['doc_fee3'])?$info['doc_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Subtotal</td>
            <td>$<input type="text" name="sub_total" class="sub_total amount_input" data-id="1"  id="sub_total1"  style="width:68px;" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
            <td>$<input type="text" name="sub_total2" class="sub_total amount_input" data-id="2" id="sub_total2" value="<?php echo isset($info['sub_total2'])?$info['sub_total2']:''; ?>"  style="width:68px;"/></td>
            <td>$<input type="text" name="sub_total3" class="sub_total amount_input" data-id="3" id="sub_total3" value="<?php echo isset($info['sub_total3'])?$info['sub_total3']:''; ?>"   style="width:68px;"/></td></tr>
            <tr><td>Sales Tax</td>
            <td>$<input type="text" name="tax_fee"  class="tax_fee amount_input" data-id="1" id="tax_fee1" value="<?php echo isset($info['tax_fee'])?$info['tax_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="tax_fee2"  class="tax_fee amount_input" data-id="2" id="tax_fee2" value="<?php echo isset($info['tax_fee2'])?$info['tax_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="tax_fee3"  class="tax_fee amount_input" data-id="3" id="tax_fee3" value="<?php echo isset($info['tax_fee3'])?$info['tax_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>DMV</td>
            <td>$<input type="text" name="dmv_fee"  class="dmv_fee amount_input" data-id="1" id="dmv_fee1" value="<?php echo isset($info['dmv_fee'])?$info['dmv_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="dmv_fee2" class="dmv_fee amount_input" data-id="2" id="dmv_fee2" value="<?php echo isset($info['dmv_fee2'])?$info['dmv_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="dmv_fee3" class="dmv_fee amount_input" data-id="3" id="dmv_fee3" value="<?php echo isset($info['dmv_fee3'])?$info['dmv_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>CA Tire Fee</td>
            <td>$<input type="text" name="tire_wheel_fee" class="tire_wheel_fee amount_input" data-id="1" value="<?php echo isset($info['tire_wheel_fee'])?$info['tire_wheel_fee']:''; ?>"  id="tire_wheel_fee1" style="width:68px;"/></td>
            <td>$<input type="text" name="tire_wheel_fee2" class="tire_wheel_fee amount_input" data-id="2" value="<?php echo isset($info['tire_wheel_fee2'])?$info['tire_wheel_fee2']:''; ?>"  id="tire_wheel_fee2" style="width:68px;"/></td>
            <td>$<input type="text" name="tire_wheel_fee3" class="tire_wheel_fee amount_input" data-id="3" value="<?php echo isset($info['tire_wheel_fee3'])?$info['tire_wheel_fee3']:''; ?>"  id="tire_wheel_fee3" style="width:68px;"/></td></tr>
            <tr><td>Total Cash Price</td>
            <td>$<input type="text" name="total_cash_price" class="total_cash_price amount_input" data-id="1"  id="total_cash_price1" style="width:68px;" value="<?php echo isset($info['total_cash_price'])?$info['total_cash_price']:''; ?>" /></td>
            <td>$<input type="text" name="total_cash_price2" class="total_cash_price amount_input" data-id="2" id="total_cash_price2" style="width:68px;" value="<?php echo isset($info['total_cash_price2'])?$info['total_cash_price2']:''; ?>" /></td>
            <td>$<input type="text" name="total_cash_price3" class="total_cash_price amount_input" data-id="3"  id="total_cash_price3" style="width:68px;" value="<?php echo isset($info['total_cash_price3'])?$info['total_cash_price3']:''; ?>" /></td></tr>
            <tr><td>Trade-In Allowance</td>
            <td>$<input type="text" name="trade_allowance" class="trade_allowance amount_input" data-id="1" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" id="trade_allowance1" style="width:68px;"/></td>
            <td>$<input type="text" name="trade_allowance2" class="trade_allowance amount_input" data-id="2" value="<?php echo isset($info['trade_allowance2'])?$info['trade_allowance2']:''; ?>" id="trade_allowance2" style="width:68px;"/></td>
            <td>$<input type="text" name="trade_allowance3" class="trade_allowance amount_input" data-id="3" value="<?php echo isset($info['trade_allowance3'])?$info['trade_allowance3']:''; ?>" id="trade_allowance3" style="width:68px;"/></td></tr>
            <tr><td>Less Payoff</td>
            <td>$<input type="text" name="less_payoff" class="less_payoff amount_input" data-id="1" id="less_payoff1" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="less_payoff2" class="less_payoff amount_input" data-id="2" id="less_payoff2" value="<?php echo isset($info['less_payoff2'])?$info['less_payoff2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="less_payoff3" class="less_payoff amount_input" data-id="3" id="less_payoff3" value="<?php echo isset($info['less_payoff3'])?$info['less_payoff3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Total Balance Due</td>
            <td>$<input type="text" name="amount" class="amount amount_input" data-id="1" id="amount1" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>"  style="width:68px;"/></td>
            <td>$<input type="text" name="amount2" class="amount amount_input" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" data-id="2" id="amount2" style="width:68px;"/></td>
            <td>$<input type="text" name="amount3" class="amount amount_input" data-id="3" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" id="amount3" style="width:68px;"/></td></tr>
            </table>

            <table class="right1" style="border-color:#CCC" cellpadding="1"><tr><td>Trade</td><td>Selling Price</td></tr>
            <tr>
            <td><table>
            <tr><td>Year</td><td>&nbsp;&nbsp;<input type="text" name="year_trade" value="<?php echo $info['year_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Make</td><td>&nbsp;&nbsp;<input type="text" name="make_trade" value="<?php echo $info['make_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Model</td><td>&nbsp;&nbsp;<input type="text" name="model_trade" value="<?php echo $info['model_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Mileage</td><td>&nbsp;&nbsp;<input type="text" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>"  style="width:68px;"/></td></tr>
            <tr><td>Payoff</td><td>$<input type="text" id="trade_payoff" name="trade_payoff" style="width:68px;" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" /></td></tr>
            </table></td>
            <td><table>
             <tr><td>Unit 1</td><td>$<input type="text" name="unit_value" class="amount_input" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" id="unit_value1" style="width:68px;"/></td></tr>
             <tr><td>Unit 2</td><td>$<input type="text" name="unit_value2" class="amount_input" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:''; ?>" id="unit_value2" style="width:68px;"/></td></tr>
              <tr><td>Unit 3</td><td>$<input type="text" name="unit_value3" class="amount_input" value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:''; ?>" id="unit_value3" style="width:68px;"/></td></tr>
            </table></td>
            </tr>
             <tr><td class="blank_pad">&nbsp;</td><td>&nbsp;</td></tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td colspan="2"><table cellpadding="2"><tr><td colspan="2">Down Payment</td><td>APR %</td><td>Term(months)</td><td>Payment</td></tr>
             <tr><td>Unit 1</td><td>$<input type="text" name="down_payment" class="down_payment amount_input" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" id="down_payment1" style="width:80px;"/></td>
             <td><input type="text" name="loan_apr" class="loan_apr amount_input" value="<?php echo isset($info['loan_apr'])?$info['loan_apr']:''; ?>" data-id="1" id="loan_apr1" style="width:50px;" /></td>
             <td><span id="option_month_span1" class="print_month"><?php echo $selected_months[1]; ?></span><select name="payment_option1" class="form-control price_options" data-id="1" style="width:85px;;" id="option_price1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select></td>
            <td>$<input type="text" name="payment" class="amount_input" id="payment1" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width:68px;"/></td>

             </tr>
            <tr><td>Unit 2</td><td>$<input type="text" name="down_payment2" class="down_payment amount_input" value="<?php echo isset($info['down_payment2'])?$info['down_payment2']:''; ?>" id="down_payment2" style="width:80px;"/></td>
            <td><input type="text" name="loan_apr2" value="<?php echo isset($info['loan_apr2'])?$info['loan_apr2']:''; ?>" class="loan_apr amount_input" id="loan_apr2" data-id="2" style="width:50px;" /></td>
             <td><span id="option_month_span2" class="print_month"><?php echo $selected_months[2]; ?></span><select name="payment_option2" class="form-control price_options" data-id="2" style="width:85px;;" id="option_price2"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select></td>
            <td>$<input type="text" name="payment2" class="amount_input" id="payment2" value="<?php echo isset($info['payment2'])?$info['payment2']:''; ?>" style="width:68px;"/></td>

            </tr>
            <tr><td>Unit 3</td><td>$<input type="text" name="down_payment3" class="down_payment amount_input" value="<?php echo isset($info['down_payment3'])?$info['down_payment3']:''; ?>" id="down_payment3" style="width:80px;"/></td>
            <td><input type="text" name="loan_apr3" value="<?php echo isset($info['loan_apr3'])?$info['loan_apr3']:''; ?>" class="loan_apr amount_input" id="loan_apr3" data-id="3" style="width:50px;" /></td>
              <td><span id="option_month_span3" class="print_month"><?php echo $selected_months[3]; ?></span><select name="payment_option3" class="form-control price_options" data-id="3" style="width:85px;;" id="option_price3"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select></td>
            <td>$<input type="text" name="payment3" id="payment3" value="<?php echo isset($info['payment3'])?$info['payment3']:''; ?>" style="width:68px;" class="amount_input" /></td>

            </tr>
            <tr><td>Total</td><td>$<input type="text" name="total_down_payment" value="<?php echo isset($info['total_down_payment'])?$info['total_down_payment']:''; ?>" id="total_down_payment" class="amount_input" style="width:80px;"/></td></tr>
         <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>

            </tr>
            </table></td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

            </table>
            <br />
            <span class="full">This menu is provided to you, our customer, to assist you in better understanding the financial options available. Amounts above are ESTIMATES ONLY and may vary based on approved credit, applicable taxes, vehicle selection, trade value(s), estimated payoff, eligibility for rebates and other factors particular to your transaction. Final payments and terms may vary. Customer agrees to pay the difference, if any, in the amount of the trade lien payoff. This is NOT a contract and it is to be used for illustration purposes only.</span>
            <br/>
            <span class="span24">Client Approval</span>
                <input type="text" class="input20" name="name" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" />
                <span class="span24">Dealership Representative</span>
                <input type="text" class="input20" name="sperson" value="<?php echo $info['sperson']; ?>" /> <br/>
            Signature X<input type="text" class="input35" name="" value="" />

		</div>
		<!---left1-->

         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>

		<!-- no print buttons -->
	<br/>

	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
		<button class="btn btn-inverse pull-right"  data-dismiss="modal" type="button" style="margin-left:5px;" >Close</button>

		<select name="deal_status_id" id="deal_status_id" class="form-control pull-right" style="width: auto; display: inline-block;margin-left:5px;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php if(isset($info['deal_status_id'])) echo ($info['deal_status_id'] == $key)? 'selected="selected"' : "" ; ?> ><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right"  style="margin-left:5px;">Save Quote</button>

		<input type="hidden" id="tax_percent1" name="tax_percent" value="<?php echo isset($info['tax_percent'])?$info['tax_percent']:0; ?>" />
		<input type="hidden" id="tax_percent2" name="tax_percent2" value="<?php echo isset($info['tax_percent2'])?$info['tax_percent2']:0; ?>" />
        <input type="hidden" id="tax_percent3" name="tax_percent3" value="<?php echo isset($info['tax_percent3'])?$info['tax_percent3']:0; ?>" />

         <input type="hidden" id="filling_fee1" name="filling_fee" value="<?php echo isset($info['filling_fee'])?$info['filling_fee']:0; ?>" />
		<input type="hidden" id="filling_fee2" name="filling_fee2" value="<?php echo isset($info['filling_fee2'])?$info['filling_fee2']:0; ?>" />
        <input type="hidden" id="filling_fee3" name="filling_fee3" value="<?php echo isset($info['filling_fee3'])?$info['filling_fee3']:0; ?>" />

        <input type="hidden" id="dmv_offroad1" name="dmv_offroad" value="<?php echo isset($info['dmv_offroad'])?$info['dmv_offroad']:0; ?>" />
		<input type="hidden" id="dmv_offroad2" name="dmv_offroad2" value="<?php echo isset($info['dmv_offroad2'])?$info['dmv_offroad2']:0; ?>" />
        <input type="hidden" id="dmv_offroad3" name="dmv_offroad3" value="<?php echo isset($info['dmv_offroad3'])?$info['dmv_offroad3']:0; ?>" />

        <input type="hidden" id="axle_2_count2"  value="<?php echo isset($info['dmv_offroad'])?$info['dmv_offroad']:0; ?>" />
		<input type="hidden" id="axle_4_count"  value="<?php echo isset($info['dmv_offroad2'])?$info['dmv_offroad2']:0; ?>" />
        <input type="hidden" id="dmv_offroad3"  value="<?php echo isset($info['dmv_offroad3'])?$info['dmv_offroad3']:0; ?>" />
	</div>

	<?php echo $this->Form->end(); ?>

<script type="text/javascript">

var vehicle_unit_value=[<?php echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>,<?php echo isset($info['msrp2'])?$info['msrp2']:'0.00'; ?>,<?php echo isset($info['msrp3'])?$info['msrp3']:'0.00'; ?>];
var vehice_down_payment=[<?php echo isset($info['down_payment'])?$info['down_payment']:'0'; ?>,<?php echo isset($info['down_payment2'])?$info['down_payment2']:'0'; ?>,<?php echo isset($info['down_payment3'])?$info['down_payment3']:'0'; ?>];
var dmv_fee_on = [0.00,0.00,0.00];
var dmv_fee_off = [0.00,0.00,0.00];
var filling_fee_dmv = [0.00,0.00,0.00];
var axle_fee_2 = [0.00,0.00,0.00];
var axle_fee_4 = [0.00,0.00,0.00];
function assign_fees(data,v_id)
{
	arr_index = v_id -1;
    $destination_fee = parseFloat(data.freight_fee);
    $("#destination_fee"+v_id).val($destination_fee.toFixed(2));
	$freight_fee = parseFloat(data.prep_fee);
	$("#freight_fee"+v_id).val($freight_fee.toFixed(2));
	//$("#prep_fee"+v_id).val(data.prep_fee);
	$("#doc_fee"+v_id).val(data.doc_fee);
	$("#tax_percent"+v_id).val(data.tax_fee);
	$axle_count = $("#axle_count"+v_id).val();
	$axle_fee='0.00';
	if($axle_count =='2')
	{
		$axle_fee = data.vehicle_axle_fee_2;
	}else if($axle_count =='4')
	{
		$axle_fee = data.vehicle_axle_fee_4;
	}
	$("#tire_wheel_fee"+v_id).val($axle_fee);
	$("#parts_fee"+v_id).val(data.parts_fee);
	$dmv_fee= (data.dmv_fee == '' || data.dmv_fee == null)? 0.00 : parseFloat(data.dmv_fee);
	$dmv_offroad= (data.dmv_offroad == '' || data.dmv_offroad == null)? 0.00 : parseFloat(data.dmv_offroad);
	$filling_fee= (data.filling_fee == '' || data.filling_fee == null)? 0.00 : parseFloat(data.filling_fee);
	$dmv_fee =isNaN($dmv_fee)?0.00:$dmv_fee;
	$dmv_offroad =isNaN($dmv_offroad)?0.00:$dmv_offroad;
	$filling_fee =isNaN($filling_fee)?0.00:$filling_fee;
	axle_fee_2[arr_index] = data.vehicle_axle_fee_2;
	axle_fee_4[arr_index] = data.vehicle_axle_fee_4;
	// DMV Off Road fee
	$dmv_fee = parseFloat($dmv_fee).toFixed(2);
	dmv_fee_on[arr_index] = $dmv_fee;
	// DMV On Road fee
	dmv_fee_off[arr_index] = $dmv_offroad;
	filling_fee_dmv[arr_index] = $filling_fee;
	$("#filling_fee"+v_id).val($filling_fee);
	// DMV On Road fee
	$("#dmv_offroad"+v_id).val($dmv_offroad);
	$("#dmv_fee"+v_id).val($dmv_fee);
	$("#loan_apr"+v_id).val(data.apr_percentage);
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

function assign_payment(data_id){
	sell_value=$("#amount"+data_id).val();
	sell_value=isNaN(sell_value)?0.00:sell_value;

	down_percentage=vehice_down_payment[data_id-1];
	down_payment=(parseFloat(down_percentage)/100)*sell_value;
	down_payment=isNaN(down_payment)?0.00:down_payment;
	$("#down_payment"+data_id).val(down_payment.toFixed(2));
	down_payment1=parseFloat($("#down_payment1").val());
	down_payment2=parseFloat($("#down_payment2").val());
	down_payment3=parseFloat($("#down_payment3").val());
	if(isNaN(down_payment1)){down_payment1=0;}
	if(isNaN(down_payment2)){down_payment2=0;}
	if(isNaN(down_payment3)){down_payment3=0;}
	total_payment=parseFloat(down_payment1)+parseFloat(down_payment2)+parseFloat(down_payment3);
	$("#total_down_payment").val(total_payment.toFixed(2));
	calculateMonthWisePayments(data_id);

}


$(document).ready(function(){

	$(".axle_count").on('change',function(){

		data_id =$(this).attr('data-id');

		arr_index =data_id -1;
		if($("#fixed_fee_options"+data_id).val()){
		$axle_count = $("#axle_count"+data_id).val();
		$axle_fee='0.00';
		if($axle_count =='2')
		{
			$axle_fee = axle_fee_2[arr_index];
		}else if($axle_count =='4')
		{
			$axle_fee = axle_fee_4[arr_index];
		}
		$("#tire_wheel_fee"+data_id).val($axle_fee);

		calculate_tax(data_id);
		}
		});

	$('.fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					assign_fees(data,data_id);
					vehice_down_payment[data_id-1]=data.down_percentage;
					calculate_tax(data_id);
					calculate_balance(data_id);
					assign_payment(data_id);

				}
			});
		}
	});

	$(".msrp").on('change keyup paste',function(){
							data_id=$(this).attr('data-id');
							price_index=data_id-1;
							price=parseFloat($(this).val());
							if(!isNaN(price)&& price >0)
							{
								vehicle_unit_value[price_index]=price;
							}
							calculate_tax(data_id);
							calculate_balance(data_id);
							assign_payment(data_id);
	});

	$(".trade_allowance").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_balance(data_id);
			assign_payment(data_id);
		});
		$(".less_payoff").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_balance(data_id);
			assign_payment(data_id);
			});

$("#trade_payoff").on('change keyup paste',function(){
			data_id=1;
			$("#less_payoff1").val($(this).val());
			calculate_balance(data_id);
			assign_payment(data_id);
			});
$(".freight_fee,.prep_fee,.parts_fee,.doc_fee,.tire_wheel_fee,.destination_fee").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_tax(data_id);
			calculate_balance(data_id);
			assign_payment(data_id);
});
$(".dmv_fee").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			price_index = data_id -1;
			dmv_fee_on[price_index]=$(this).val();
			calculate_tax(data_id);
			calculate_balance(data_id);
			assign_payment(data_id);
});
$(".dmv_fee_type").on('change',function(e){
	data_id = $(this).attr('data-id');
	if($("#fixed_fee_options"+data_id).val()){
		calculate_tax(data_id);
		calculate_balance(data_id);
		assign_payment(data_id);

	}


	});

function calculate_tax(data_id){
		//var tax_type = $('input:radio[name=taxopt]:checked').val();
		price_index=data_id-1;
		var tax_value=isNaN(parseFloat( $('#tax_percent'+data_id).val()))?0.00:parseFloat( $('#tax_percent'+data_id).val());
		var freight = isNaN(parseFloat( $('#freight_fee'+data_id).val()))?0.00:parseFloat( $('#freight_fee'+data_id).val());
        var destination_fee = isNaN(parseFloat( $('#destination_fee'+data_id).val()))?0.00:parseFloat( $('#destination_fee'+data_id).val());
		//var prep = isNaN(parseFloat( $('#prep_fee'+data_id).val()))?0.00:parseFloat( $('#prep_fee'+data_id).val());
		var doc = isNaN(parseFloat( $('#doc_fee'+data_id).val()))?0.00:parseFloat($('#doc_fee'+data_id).val());
		var part_fee = isNaN(parseFloat($('#parts_fee'+data_id).val()))?0.00:parseFloat($('#parts_fee'+data_id).val());
		var tree_fee = isNaN(parseFloat( $('#tire_wheel_fee'+data_id).val()))?0.00:parseFloat( $('#tire_wheel_fee'+data_id).val());
		var sell_price = parseFloat(vehicle_unit_value[price_index]);

		//var amount = freight+prep+doc+part_fee+sell_price;
		var amount = freight+doc+part_fee+sell_price+destination_fee;
		amount = isNaN(amount)?0.00:amount;
		$("#sub_total"+data_id).val(amount.toFixed(2));
		var dmv_fee = parseFloat(dmv_fee_on[price_index]);
		var dmv_offroad = parseFloat($("#dmv_offroad"+data_id).val());
	    filling_fee  =	isNaN(parseFloat( $('#filling_fee'+data_id).val()))?0.00:parseFloat( $('#filling_fee'+data_id).val());
		//var dmv_fee_total = dmv_fee + (parseFloat(dmv_offroad)/100)*amount;
		//dmv_fee_total = isNaN(dmv_fee_total)?0.00:parseFloat(dmv_fee_total);
		dmv_fee_total = 0;
		dmv_fee_type = $("#dmv_fee_type"+data_id).val();
		if(dmv_fee_type == 'on'){
			dmv_fee_total = (parseFloat(dmv_offroad)/100)*amount;
			dmv_fee_total = parseFloat(dmv_fee_total + filling_fee);
		}
		else if(dmv_fee_type == 'off'){
			dmv_fee_total = dmv_fee;
		}
		<?php if($cid == 1224){ ?>
		dmv_fee_total = Math.ceil(dmv_fee_total);
		<?php } ?>
		$("#dmv_fee"+data_id).val(dmv_fee_total.toFixed(2));
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		//console.log('dmv_fee ::'+dmv_fee+'--dmv_offroad=='+dmv_offroad+'--dmv_fee_total='+dmv_fee_total+'--amount='+amount);
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:amountIncludingTax;
		$('#tax_fee'+data_id).val( amountIncludingTax );

		actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee+dmv_fee_total;
		//alert(actual_balance);
		actual_balance = isNaN(actual_balance)?0.00:actual_balance;
		$('#total_cash_price'+data_id).val( actual_balance.toFixed(2));
		//$('#amount'+data_id).val( actual_balance);
		//calculate_initial_investment();

		// update_10days_payoff();
	}

	function calculate_initial_investment(){
		//$('#bal').val();
		investment = ($('#bal').val() * 25 ) / 100;
		$('#down_pay').val( investment.toFixed(2)    );
		newbal = actual_balance -  investment ;
		$('#bal').val( newbal.toFixed(2) );
	}
	function update_initial_investment(){
		var initialinv = $('#down_pay').val();
		var inv = 0;
		if(initialinv == '' || isNaN(initialinv)){
			inv = 0;
			$('#down_pay').val("");
		}else{
			inv = parseFloat(initialinv);
		}
		newbal = actual_balance - inv;
		$('#bal').val( newbal.toFixed(2) );
	}

	$('#down_pay').on('change keyup paste',function(){
		update_initial_investment();
		update_10days_payoff();
	});


	function get_initial_inv(){
		var initialinv = $('#down_pay').val();
		if(initialinv == '' || isNaN(initialinv)){
			return 0;
		}else{
			return parseFloat(initialinv);
		}
	}

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
	$(".loan_apr").on('change keyup paste',function(){
		data_id=$(this).attr('data-id');
		calculateMonthWisePayments(data_id);

		});

		$(".price_options").on('change',function(){
		data_id=$(this).attr('data-id');
		calculateMonthWisePayments(data_id);

		});
	$(".down_payment").on('change keyup paste',function(){
		$total=0;
		$(".down_payment").each(function(){
		$pay=parseFloat($(this).val());
		if(!isNaN($pay))
		{
			$total+=$pay;
		}
		});

		$("#total_down_payment").val($total.toFixed(2));

		});





	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);


	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		if(empty_fields(true)){

		$( "#worksheet_container" ).printThis();

		}
		//setTimeout(empty_fields(false),1500000);
	});

	$("#btn_back").click(function(){

	});


	//calculate();



});




	function calculateMonthWisePayments(data_id){
			months=$("#option_price"+data_id).val();
			$("#option_month_span"+data_id).text();
			years=months/12;
			pay_monthly=MonthwisePayments(years,data_id);
			$("#payment"+data_id).val(pay_monthly);
		}

	function MonthwisePayments(years,data_id)
	{
		var apr = parseFloat($('#loan_apr'+data_id).val());
		var principal = parseFloat($('#amount'+data_id).val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		var tax = parseFloat($('#tax_percent'+data_id).val());
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

function empty_fields(fill)
{
	$(".amount_input").each(function(index){
		$val=$(this).val();

		if(fill){
		if($val=='0.00')
		{
			$(this).val('');
			$(this).attr('data-flag','1');
		}
		}else
		{
		flag=$(this).attr('data-flag');
		if($val==''&& flag)
		{
			$(this).val('0.00');
		}
		}
	});
	return true;
}


</script>
</div>
