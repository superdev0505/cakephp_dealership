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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto;">
		<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}

body {
	font-family:"Arial";
	margin: 0mm 10mm 0mm 5mm;
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
.no_show{display:none;}

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
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:inline;
	}
	.blank_pad{
	padding:0px;
}
input[type="text"]{
border:none!important;
font-size:16px;


}
}
</style>

<?php
	$veh_checked2=(isset($addonVehicles[0]['AddonVehicle']['condition']))?$addonVehicles[0]['AddonVehicle']['condition']:'';
	$veh_checked3=(isset($addonVehicles[1]['AddonVehicle']['condition']))?$addonVehicles[1]['AddonVehicle']['condition']:'';
	$road_options = array('1'=>'On Road 0.0168% + $14.75','2' => 'Off Road $37.75','3' => 'Trailer $129.00');		
	$tax_percent_option = array('0.00' =>'0.00%','7.80' => '7.80%');
			 ?>
		<div class="wraper header"> 
        <?php //pr($contact); ?>
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
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
                <input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" placeholder=""/>	
              <h1 style="text-align:center;margin-left:50px;"> <?php 
			 $custom_form_dealer_ids=array(263,5000);
			 $dealer_id = AuthComponent::user('dealer_id');
			 if (in_array($dealer_id , $custom_form_dealer_ids))
			 {
				 $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/ride-now-logo.jpg';

			 	echo $this->Html->image( $dealer_logo,array('style'=>'width:900px;height:200px;','class' =>'print_month')); 
             }
			 ?></h1>  
             <table style="width:100%">
             <tr>
             <td style="width:40%">
             <strong> Date&nbsp;             
                 <input name="date" type="text" style="width:250px;" value="<?php echo $expectedt; ?>" placeholder=""/></strong><br />
             <strong>  Sales Person  <input id="sperson" name="sperson" type="text" style="width:250px;" value="<?php echo $info['sperson']; ?>" placeholder=""/></strong> </td>
             <td  style="border:none;width:35%" valign="bottom" >
            	<strong>Worksheet</strong>
             </td>
             <td  style="border:none;width:35%" valign="bottom" >
            	<strong>Floor Manager </strong> 
             </td>
            
             </tr>
             </table>          
                 
            
            <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']); 
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>
            
                 
               
          
			
          						    
			
            <table border="1"  style="border-color:#CCC;width:100%" cellpadding="3" >
           	<tr>
            <td colspan="2">
            <?php // Unit 1 Info ?>
            <table >
            <tr>
            <td>
            Condition</td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;<input type="radio" name="condition" value="New" <?php echo (isset($info['condition'])&& $info['condition']=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition" value="Used" <?php echo (isset($info['condition'])&& $info['condition']=='Used')?'checked="checked"':''; ?> />&nbsp;Used
            
                </td></tr>
            <tr>
            <td><input type="text" style="width:60px;" name="year" value="<?php echo $info['year']; ?>" /></td>
            <td><input type="text" style="width:100px;" name="make" value="<?php echo $info['make']; ?>" /></td>
            <td><input type="text" style="width:140px;" name="model" value="<?php echo $info['model']; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Year</td>
            <td align="center">Make</td>
            <td align="center">Model</td>
            </tr>
            
            <tr>
            <td><input type="text" style="width:60px;" name="unit_color" value="<?php echo $info['unit_color']; ?>" /></td>
            <td><input type="text" style="width:100px;" name="odometer" value="<?php echo $info['odometer']; ?>" /></td>
            <td><input type="text" style="width:140px;" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Color</td>
            <td align="center">Mileage</td>
            <td align="center">Stock #</td>
            </tr>       
            </table>
            <?php // end info ?>
            
            </td>
            <td colspan="2">
              <?php // Unit 2 Info ?>
            <table >
            <tr>
            <td>
            Condition</td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;<input type="radio" name="condition2" value="New" <?php echo ($veh_checked2=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition2" value="Used" <?php echo ($veh_checked2=='Used')?'checked="checked"':''; ?> />&nbsp;Used
            </td></tr>
            <tr>
            <td><input type="text" style="width:60px;" name="year2" value="<?php echo (isset($addonVehicles[0]['AddonVehicle']['year']))?$addonVehicles[0]['AddonVehicle']['year']:''; ?>" /></td>
            <td><input type="text" style="width:100px;" name="make2" value="<?php echo (isset($addonVehicles[0]['AddonVehicle']['make']))?$addonVehicles[0]['AddonVehicle']['make']:''; ?>" /></td>
            <td><input type="text" style="width:140px;" name="model2" value="<?php echo (isset($addonVehicles[0]['AddonVehicle']['model']))?$addonVehicles[0]['AddonVehicle']['model']:''; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Year</td>
            <td align="center">Make</td>
            <td align="center">Model</td>
            </tr>
            
            <tr>
            <td><input type="text" style="width:60px;" name="unit_color2" value="<?php echo (isset($info['unit_color2'])&& !empty($info['unit_color2']))?$info['unit_color2']:''; ?>" /></td>
            <td><input type="text" style="width:100px;" name="odometer2"  value="<?php echo (isset($info['odometer2'])&& !empty($info['odometer2']))?$info['odometer2']:''; ?>" /></td>
            <td><input type="text" style="width:140px;" name="stock_num2" value="<?php echo (isset($info['stock_num2'])&& !empty($info['stock_num2']))?$info['stock_num2']:''; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Color</td>
            <td align="center">Mileage</td>
            <td align="center">Stock #</td>
            </tr>       
            </table>
            <?php // end info ?>

            </td>
            <td colspan="2">
            
               <?php // Unit 3 Info ?>
            <table>
            <tr>
            <td>
            Condition</td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;<input type="radio" name="condition3" value="New" <?php echo ($veh_checked3=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition3" value="Used" <?php echo ($veh_checked3=='Used')?'checked="checked"':''; ?> />&nbsp;Used           
            </td></tr>
            <tr>
            <td><input type="text" style="width:54px;" name="year3" value="<?php echo (isset($addonVehicles[1]['AddonVehicle']['year']))?$addonVehicles[1]['AddonVehicle']['year']:''; ?>" /></td>
            <td><input type="text" style="width:140px;" name="make3" value="<?php echo (isset($addonVehicles[1]['AddonVehicle']['make']))?$addonVehicles[1]['AddonVehicle']['make']:''; ?>" /></td>
            <td><input type="text" style="width:152px;" name="model3" value="<?php echo (isset($addonVehicles[1]['AddonVehicle']['model']))?$addonVehicles[1]['AddonVehicle']['model']:''; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Year</td>
            <td align="center">Make</td>
            <td align="center">Model</td>
            </tr>
            
            <tr>
            <td><input type="text" style="width:54px;" name="unit_color3" value="<?php echo (isset($info['unit_color3'])&& !empty($info['unit_color3']))?$info['unit_color3']:''; ?>" /></td>
            <td><input type="text" style="width:140px;" name="odometer3"  value="<?php echo (isset($info['odometer3'])&& !empty($info['odometer3']))?$info['odometer3']:''; ?>" /></td>
            <td><input type="text" style="width:152px;" name="stock_num3" value="<?php echo (isset($info['stock_num3'])&& !empty($info['stock_num3']))?$info['stock_num3']:''; ?>" /></td>
            </tr>
            <tr>
            <td align="center">Color</td>
            <td align="center">Mileage</td>
            <td align="center">Stock #</td>
            </tr>       
            </table>
            <?php // end info ?>
            
            
            </td>
            </tr>
             
            
            <tr class="noprint"><td>Fixed Fee</td>
            <td><?php
					if(empty($info['fixed_fee_options']))
					{
						$info['fixed_fee_options'] = 88;
					}

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
                        <td>Fixed Fee</td>
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
                        <td>Fixed Fee</td>
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
            
            <tr><td><strong>Sale Price $</strong></td>
            <td>$<input type="text" name="unit_value" class="msrp amount_input" value="<?php echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>" data-id="1" id="msrp1" style="width:68px;"/></td>
            <td><strong>Sale Price $</strong></td>
            <td>$<input type="text" name="unit_value2"  class="msrp amount_input" data-id="2"  id="msrp2" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:$addonVehicles[0]['AddonVehicle']['unit_value']; ?>" style="width:68px;"/></td>
            <td><strong>Sale Price $</strong></td>
            <td>$<input type="text" name="unit_value3" class="msrp amount_input" data-id="3"   id="msrp3" value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:$addonVehicles[1]['AddonVehicle']['unit_value']; ?>"  style="width:68px;"/></td></tr>
              
            <tr><td>Destination</td>
            <td>$<input type="text" name="freight_fee" class="freight_fee amount_input" data-id="1"   id="freight_fee1" style="width:68px;" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
            <td>Destination</td>
            <td>$<input type="text" name="freight_fee2" class="freight_fee amount_input" data-id="2" id="freight_fee2" style="width:68px;" value="<?php echo isset($info['freight_fee2'])?$info['freight_fee2']:''; ?>" /></td>
            <td>Destination</td>
            <td>$<input type="text" name="freight_fee3" class="freight_fee amount_input" data-id="3" value="<?php echo isset($info['freight_fee3'])?$info['freight_fee3']:'0.00'; ?>" id="freight_fee3" style="width:68px;"/></td></tr>
            <tr><td>Assembly/PDI</td>
            <td>$<input type="text" name="prep_fee" class="prep_fee amount_input" data-id="1" id="prep_fee1" value="<?php echo isset($info['prep_fee'])?$info['prep_fee']:'0.00'; ?>" style="width:68px;"/></td>
            <td>Assembly/PDI</td>
            <td>$<input type="text" name="prep_fee2" class="prep_fee amount_input" data-id="2"  id="prep_fee2" value="<?php echo isset($info['prep_fee2'])?$info['prep_fee2']:''; ?>" style="width:68px;"/></td>
            <td>Assembly/PDI</td>
            <td>$<input type="text" name="prep_fee3" class="prep_fee amount_input" data-id="3"  id="prep_fee3" value="<?php echo isset($info['prep_fee3'])?$info['prep_fee3']:''; ?>" style="width:68px;"/></td></tr>
          
            <tr><td align="right">Doc/Lic/Reg&nbsp;</td>
            <td>$<input type="text" name="doc_fee" class="doc_fee amount_input" data-id="1"  id="doc_fee1" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width:68px;"/></td>
            <td align="right">Doc/Lic/Reg&nbsp;</td>
            <td>$<input type="text" name="doc_fee2" class="doc_fee amount_input" data-id="2"  id="doc_fee2" value="<?php echo isset($info['doc_fee2'])?$info['doc_fee2']:''; ?>" style="width:68px;"/></td>
            <td align="right">Doc/Lic/Reg&nbsp;</td>
            <td>$<input type="text" name="doc_fee3" class="doc_fee amount_input" data-id="3"  id="doc_fee3" value="<?php echo isset($info['doc_fee3'])?$info['doc_fee3']:''; ?>" style="width:68px;"/></td></tr>
            
            <tr class="noprint">
             <td>Road Fee Formula</td>
             <td>
			 <?php /*?><span id="label_road_registration1" class="print_month"><?php echo $info['road_registration1']; ?></span><?php */?>
			 <?php
			 
			echo $this->Form->input('road_registration1', array(
							'id' => "road_registration1",
							'name' => "road_registration1",
							'type' => 'select',
							'options' =>  $road_options,
							'empty' => "Select",
							'class' => 'input-sm road_registration',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>$info['road_registration1']
						));
			  ?></td>
			<td>Road Fee Formula</td>
             <td>
			 <?php /*?><span id="label_road_registration2" class="print_month"><?php echo $info['road_registration2']; ?></span><?php */?>
			 <?php
			 
			echo $this->Form->input('road_registration2', array(
							'id' => "road_registration2",
							'name' => "road_registration2",
							'type' => 'select',
							'options' =>  $road_options,
							'empty' => "Select",
							'class' => 'input-sm road_registration',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>$info['road_registration2']
						));
			  ?></td>
			<td>Road Fee Formula</td>
             <td>
			 <?php /*?><span id="label_road_registration3" class="print_month"><?php echo $info['road_registration3']; ?></span><?php */?>
			 <?php			 
			echo $this->Form->input('road_registration3', array(
							'id' => "road_registration3",
							'name' => "road_registration3",
							'type' => 'select',
							'options' =>  $road_options,
							'empty' => "Select",
							'class' => 'input-sm road_registration',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>$info['road_registration3']
						));
			  ?></td>

                
             </tr>           
            
            <tr><td>Road registration Fee</td>
            <td>$<input type="text" name="road_fee" class="road_fee amount_input" data-id="1" id="road_fee1" value="<?php echo isset($info['road_fee'])?$info['road_fee']:'0.00'; ?>" style="width:68px;"/></td>
           <td>Road registration Fee</td>
            <td>$<input type="text" name="road_fee2" class="road_fee amount_input" data-id="2"  id="road_fee2" value="<?php echo isset($info['road_fee2'])?$info['road_fee2']:''; ?>" style="width:68px;"/></td>
            <td>Road registration Fee</td>
            <td>$<input type="text" name="road_fee3" class="road_fee amount_input" data-id="3"  id="road_fee3" value="<?php echo isset($info['road_fee3'])?$info['road_fee3']:''; ?>" style="width:68px;"/></td></tr>
            
            
            <tr><td>Tax @<span data-id="1" id="s_tax_per1" class="print_month">0.00</span>
             <?php			 
			echo $this->Form->input('tax_percent', array(
							'id' => "tax_percent1",
							'name' => "tax_percent",
							'type' => 'text',
							//'options' =>  $tax_percent_option,
							//'empty' => "Select",
							'class' => 'input-sm tax_percent noprint',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:50px;',
							'data-id'=>'1',
							'value'=>$info['tax_percent']
						));
			  ?>%
            </td>
            <td>$<input type="text" name="tax_fee"  class="tax_fee amount_input" data-id="1" id="tax_fee1" value="<?php echo isset($info['tax_fee'])?$info['tax_fee']:''; ?>" style="width:68px;"/></td>
            <td>Tax @<span data-id="2" id="s_tax_per2" class="print_month">0.00</span>
             <?php			 
			echo $this->Form->input('tax_percent2', array(
							'id' => "tax_percent2",
							'name' => "tax_percent2",
							'type' => 'text',
							//'options' =>  $tax_percent_option,
							//'empty' => "Select",
							'class' => 'input-sm tax_percent noprint',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:50px;',
							'data-id'=>'2',
							'value'=>$info['tax_percent2']
						));
			  ?>%
            
            </td>
            <td>$<input type="text" name="tax_fee2"  class="tax_fee amount_input" data-id="2" id="tax_fee2" value="<?php echo isset($info['tax_fee2'])?$info['tax_fee2']:''; ?>" style="width:68px;"/></td>
            <td>Tax @<span data-id="3" id="s_tax_per3" class="print_month">0.00</span>
            <?php			 
			echo $this->Form->input('tax_percent3', array(
							'id' => "tax_percent3",
							'name' => "tax_percent3",
							'type' => 'text',
							//'options' =>  $tax_percent_option,
							//'empty' => "Select",
							'class' => 'input-sm tax_percent noprint',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:50px;',
							'data-id'=>'3',
							'value'=>$info['tax_percent3']
						));
			  ?>%
            </td>
            <td>$<input type="text" name="tax_fee3"  class="tax_fee amount_input" data-id="3" id="tax_fee3" value="<?php echo isset($info['tax_fee3'])?$info['tax_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Accy's and Install</td>
            <td>$<input type="text" name="parts_fee" class="parts_fee  amount_input" data-id="1" id="parts_fee1" value="<?php echo isset($info['parts_fee'])?$info['parts_fee']:''; ?>" style="width:68px;"/></td>
            <td>Accy's and Install</td>
            <td>$<input type="text" name="parts_fee2" class="parts_fee amount_input" data-id="2" id="parts_fee2" value="<?php echo isset($info['parts_fee2'])?$info['parts_fee2']:''; ?>" style="width:68px;"/></td>
            <td>Accy's and Install</td>
            <td>$<input type="text" name="parts_fee3" class="parts_fee amount_input" data-id="3" id="parts_fee3" value="<?php echo isset($info['parts_fee3'])?$info['parts_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Subtotal</td>
            <td>$<input type="text" name="sub_total" class="sub_total amount_input" data-id="1"  id="sub_total1"  style="width:68px;" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
            <td>Subtotal</td>
            <td>$<input type="text" name="sub_total2" class="sub_total amount_input" data-id="2" id="sub_total2" value="<?php echo isset($info['sub_total2'])?$info['sub_total2']:''; ?>"  style="width:68px;"/></td>
            <td>Subtotal</td>
            <td>$<input type="text" name="sub_total3" class="sub_total amount_input" data-id="3" id="sub_total3" value="<?php echo isset($info['sub_total3'])?$info['sub_total3']:''; ?>"   style="width:68px;"/></td></tr>
            
            <tr><td>Trade</td>
            <td>$<input type="text" name="trade_allowance" class="trade_allowance amount_input" data-id="1" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" id="trade_allowance1" style="width:68px;"/></td>
            <td>Trade</td>
            <td>$<input type="text" name="trade_allowance2" class="trade_allowance amount_input" data-id="2" value="<?php echo isset($info['trade_allowance2'])?$info['trade_allowance2']:''; ?>" id="trade_allowance2" style="width:68px;"/></td>
            <td>Trade</td>
            <td>$<input type="text" name="trade_allowance3" class="trade_allowance amount_input" data-id="3" value="<?php echo isset($info['trade_allowance3'])?$info['trade_allowance3']:''; ?>" id="trade_allowance3" style="width:68px;"/></td></tr>
            
            <tr><td>Tax Credit</td>
            <td>$<input type="text" name="tax_credit" class="tax_credit amount_input" data-id="1" value="<?php echo isset($info['tax_credit'])?$info['tax_credit']:''; ?>" id="tax_credit1" style="width:68px;"/></td>
            <td>Tax Credit</td>
            <td>$<input type="text" name="tax_credit2" class="tax_credit amount_input" data-id="2" value="<?php echo isset($info['tax_credit2'])?$info['tax_credit2']:''; ?>" id="tax_credit2" style="width:68px;"/></td>
            <td>Tax Credit</td>
            <td>$<input type="text" name="tax_credit3" class="tax_credit amount_input" data-id="3" value="<?php echo isset($info['tax_credit3'])?$info['tax_credit3']:''; ?>" id="trade_credit3" style="width:68px;"/></td></tr>
            
            <tr><td>Difference</td>
            <td>$<input type="text" name="total_cash_price" class="total_cash_price amount_input" data-id="1"  id="total_cash_price1" style="width:68px;" value="<?php echo isset($info['total_cash_price'])?$info['total_cash_price']:''; ?>" /></td>
            <td>Difference</td>
            <td>$<input type="text" name="total_cash_price2" class="total_cash_price amount_input" data-id="2" id="total_cash_price2" style="width:68px;" value="<?php echo isset($info['total_cash_price2'])?$info['total_cash_price2']:''; ?>" /></td>
            <td>Difference</td>
            <td>$<input type="text" name="total_cash_price3" class="total_cash_price amount_input" data-id="3"  id="total_cash_price3" style="width:68px;" value="<?php echo isset($info['total_cash_price3'])?$info['total_cash_price3']:''; ?>" /></td></tr>
            
            <tr><td>+ Payoff</td>
            <td>$<input type="text" name="less_payoff" class="less_payoff amount_input" data-id="1" id="less_payoff1" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" style="width:68px;"/></td>
            <td>+ Payoff</td>
            <td>$<input type="text" name="less_payoff2" class="less_payoff amount_input" data-id="2" id="less_payoff2" value="<?php echo isset($info['less_payoff2'])?$info['less_payoff2']:''; ?>" style="width:68px;"/></td>
            <td>+ Payoff</td>
            <td>$<input type="text" name="less_payoff3" class="less_payoff amount_input" data-id="3" id="less_payoff3" value="<?php echo isset($info['less_payoff3'])?$info['less_payoff3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td><strong>Final Total</strong></td>
            <td>$<input type="text" name="amount" class="amount amount_input" data-id="1" id="amount1" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>"  style="width:68px;"/></td>
            <td><strong>Final Total</strong></td>
            <td>$<input type="text" name="amount2" class="amount amount_input" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" data-id="2" id="amount2" style="width:68px;"/></td>
            <td style="border:none"><strong>Final Total</strong></td>
            <td>$<input type="text" name="amount3" class="amount amount_input" data-id="3" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" id="amount3" style="width:68px;"/></td></tr>
            </table>
            
            <br />
            <h3>Trade Information</h3>
            <div style="width:100%;float:left;" class="clearfix">
            <div style="width:75%;float:left;">
            <table style="width:100%" border="1">
            <tr>
            <td align="center"><input type="text" name="year_trade" value="<?php echo $info['year_trade']; ?>" style="width:100px;"/><br />Year</td>
            <td align="center">
            <input type="text" name="make_trade" value="<?php echo $info['make_trade']; ?>" style="width:150px;"/><br /> Make
            </td>
             <td align="center">
             <input type="text" name="model_trade" value="<?php echo $info['model_trade']; ?>" style="width:200px;"/><br /> Model
             </td>
             <td align="center">
               <input type="text" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" style="width:280px;"/><br /> Vin #(Must be 17 digits)
             </td> 
            </tr>
            <tr>
            <td align="center"><input type="text" name="usedunit_color" value="<?php echo $info['usedunit_color']; ?>" style="width:100px;"/><br />Color</td>
             <td align="center"><input type="text" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>" style="width:100px;"/><br />Mileage</td>
              <td align="center">$<input type="text" id="trade_payoff" name="trade_payoff" style="width:100px;" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" /><br />Payoff Amount</td>
             <td align="center">
               <input type="text" name="bank_name" value="<?php echo $info['bank_name']; ?>" style="width:280px;"/><br /> Bank Name
             </td> 
            
            </tr>
            </table>
            </div>
            <div style="width:25%;float:left;">
            <table style="width:100%;" cellpadding="15"><tr><td align="center">Method of Payment<br /><br />
           	<span id="label_method_of_payment" class="print_month" style="text-transform:uppercase"><?php echo $info['method_of_payment']; ?></span>
            <?php 					$method_of_payment_options = array(
											'Cash' => 'Cash', 
											'Credit' => 'Credit', 
											'Credit Union' => 'Credit Union', 
											'Other' => 'Other'
										);
							echo $this->Form->input('method_of_payment',array('type' => 'select','label' => false,'div' => false,'name' => 'method_of_payment','value' => $info['method_of_payment'],'options'=>$method_of_payment_options,
											'class' => 'noprint',
											'empty'=>'Select',
											));			
										
										?>
            </td></tr></table>
            </div>
             <br />   
            </div>
             <br />
            
           <div class="clearfix">
           <div style="width:36%;float:left;margin-top:10px;" >
           <table style="width:100%" cellpadding="2">
           <tr>
           <td><strong>IF FINANCING, PURCHASER AUTHORIZES DEALER TO VERIFY THIS DATA WITH CREDIT BUREAU & ACKNOWLEDGES VIEWING THIS WORKSHEET. ALL PRICING ASSUMES DEALER RETAINS ALL INCENTIVES AND/OR REBATES
          </strong> <br />
           </td>
           </tr>
           <tr>           
           <td style="border-bottom:#000 1px solid;width:100%"> X </td>
           </tr>
             <tr>
           <td>
           <br />
          <strong> SALE PRICES REPRESENT "CASH" OR "FINANCE" NO CREDIT CARDS ACCEPTED!  </strong> 
           <br />
           </td>
           </tr>
            <tr>           
           <td style="border-bottom:#000 1px solid;width:100%"> X </td>
           </tr>
           <tr><td><br /> <strong> THIS WORKSHEET IS PROPERTY OF RIDENOW POWERSPORTS </strong></td></tr>
                
           </table> 
           
            </div>
            <div style="width:64%;float:left;margin-top:10px;">
            <table style="width:100%" border="1" cellpadding="3" >
            <tr>
            <td colspan="3"><strong>Name</strong> &nbsp; <input type="text" style="width:500px;"  name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>" /></td></tr>
            <tr>
            <td colspan="3"><strong>Address</strong> &nbsp; <input type="text" style="width:500px;float:right;"  name="address" value="<?php echo $info['address']; ?>" /></td></tr>
           
           <tr>            
            <td><strong>City</strong>&nbsp;&nbsp; <input type="text" style="width:160px;float:right;"  name="city" value="<?php echo $info['city']; ?>" /></td>
            <td><strong>State</strong> &nbsp;&nbsp; <input type="text" style="width:130px;float:right;"  name="state" value="<?php echo $info['state']; ?>" /></td>
            <td><strong>Zip</strong> &nbsp;&nbsp; <input type="text" style="width:100px;float:right;"  name="zip" value="<?php echo $info['zip']; ?>" /></td>
            </tr>
           <tr>
            <td><strong>Cell</strong> &nbsp;<input type="text" style="width:130px;" name="mobile" value="<?php echo $cleaned1; ?>"   /></td>
           <td><strong>Phone</strong> &nbsp;&nbsp;<input type="text" style="width:110px;float:right;" name="phone" value="<?php echo $cleaned2; ?>" /></td>
           <td><strong>Business Phone</strong> &nbsp;&nbsp;<input type="text" style="width:110px;float:right;" name="work_number" value="<?php echo $cleaned3;  ?>" /></td>           
           </tr> 
           <tr>
           <td colspan="2">
          <strong> Social Security</strong>&nbsp;&nbsp;<input type="text" style="width:200px;float:right;"  name="social_security" value="<?php echo $info['social_security']; ?>" />
           </td>
           <td><strong>Date of birth</strong> &nbsp;&nbsp;<input type="text" style="width:100px;float:right;"  name="dob" value="<?php echo $info['dob']; ?>" /></td>      
           </tr>
            <td colspan="3"><strong>Email</strong> &nbsp;&nbsp; <input type="text" style="width:500px;float:right;"  name="email" value="<?php echo $info['email']; ?>" /></td></tr>
            
            </table>
            </div>
            </div>
            
   

		</div>
		<!---left1-->
		
        
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
		
		<?php /*?><input type="hidden" id="tax_percent1" name="tax_percent" value="<?php echo isset($info['tax_percent'])?$info['tax_percent']:0; ?>" />
		<input type="hidden" id="tax_percent2" name="tax_percent2" value="<?php echo isset($info['tax_percent2'])?$info['tax_percent2']:0; ?>" />
        <input type="hidden" id="tax_percent3" name="tax_percent3" value="<?php echo isset($info['tax_percent3'])?$info['tax_percent3']:0; ?>" /><?php */?>
        
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

var vehicle_unit_value=[<?php echo isset($info['unit_value'])?$info['unit_value']:$info['unit_value']; ?>,<?php echo isset($info['unit_value2'])?$info['unit_value2']:'0.00'; ?>,<?php echo isset($info['unit_value3'])?$info['unit_value3']:'0.00'; ?>];
var vehice_down_payment=[<?php echo isset($info['down_payment'])?$info['down_payment']:'0'; ?>,<?php echo isset($info['down_payment2'])?$info['down_payment2']:'0'; ?>,<?php echo isset($info['down_payment3'])?$info['down_payment3']:'0'; ?>];
var dmv_fee_on = [0.00,0.00,0.00];
var dmv_fee_off = [0.00,0.00,0.00];
var filling_fee_dmv = [0.00,0.00,0.00];
var axle_fee_2 = [0.00,0.00,0.00];
var axle_fee_4 = [0.00,0.00,0.00];
function assign_fees(data,v_id)
{
	arr_index = v_id -1;
	$("#doc_fee"+v_id).val(data.doc_fee);
	$("#tax_percent"+v_id).val(data.tax_fee);
	$("#s_tax_per"+v_id).text(data.tax_fee);
	
}

function road_registration_fee($option,$sell_price)
{
	tax_value = 0.0168;
	$tax =  (parseFloat(tax_value)/100) * $sell_price;
	$tax = isNaN($tax)?0.00:$tax;
	$fee = 0.00;	
	if($option == 1){
		$fee = $tax + 14.75;	 
	}else if($option == 2){
		$fee =  37.75;
	}else if($option == 3){
		$fee = 129.00;
	}
	return $fee;
}

function calculate_balance(data_id)
{
	price_index=data_id-1;
	
	allowance=$("#trade_allowance"+data_id).val();
	tax_credit=$("#tax_credit"+data_id).val();
	if(allowance=='')
	{
		allowance=0; 
	}
	if(tax_credit=='')
	{
		tax_credit=0; 
	}
	est_payoff=$("#less_payoff"+data_id).val();
	if(est_payoff=='')
	{
	  est_payoff=0; 
	}
	est_payoff=parseFloat(est_payoff);
	allowance=parseFloat(allowance);
	tax_credit=parseFloat(tax_credit);
	subtotal=parseFloat($("#sub_total"+data_id).val());
	difference=parseFloat((subtotal)-(allowance+tax_credit));
	difference=isNaN(difference)?0.00:difference;
	$("#total_cash_price"+data_id).val(difference.toFixed(2));
	total_bal=difference+est_payoff;
	$("#amount"+data_id).val(total_bal.toFixed(2));
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

function calculate_tax(data_id){
		//var tax_type = $('input:radio[name=taxopt]:checked').val();
		price_index=data_id-1;
		var tax_value=isNaN(parseFloat( $('#tax_percent'+data_id).val()))?0.00:parseFloat( $('#tax_percent'+data_id).val());
		var freight = isNaN(parseFloat( $('#freight_fee'+data_id).val()))?0.00:parseFloat( $('#freight_fee'+data_id).val());
		var prep = isNaN(parseFloat( $('#prep_fee'+data_id).val()))?0.00:parseFloat( $('#prep_fee'+data_id).val());
		var doc = isNaN(parseFloat( $('#doc_fee'+data_id).val()))?0.00:parseFloat($('#doc_fee'+data_id).val());
		var part_fee = isNaN(parseFloat($('#parts_fee'+data_id).val()))?0.00:parseFloat($('#parts_fee'+data_id).val());
		var sell_price = isNaN(parseFloat( $("#msrp"+data_id).val()))?0.00:parseFloat($("#msrp"+data_id).val());		
		var fee_option = $("#road_registration"+data_id).val();
		var amount = freight+prep+doc+sell_price; 
		amount = isNaN(amount)?0.00:amount;
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:amountIncludingTax;
		$('#tax_fee'+data_id).val( amountIncludingTax );
		road_fee = road_registration_fee(fee_option,sell_price)
		$('#road_fee'+data_id).val( road_fee.toFixed(2) );
		actual_balance = amount+parseFloat(amountIncludingTax)+part_fee + road_fee; 
		$("#sub_total"+data_id).val(actual_balance.toFixed(2));	
		//actual_balance = isNaN(actual_balance)?0.00:actual_balance;
		//$('#total_cash_price'+data_id).val( actual_balance.toFixed(2));
		
		
	}

function get_fixed_fee(fee_id,data_id)
{
	
	$.ajax({
			type: "get",
			cache: false,
			dataType: 'json',
			url:  "/deal_fixedfees/get_fees/"+fee_id,
			success: function(data){
				assign_fees(data,data_id);
				vehice_down_payment[data_id-1]=data.down_percentage;
				calculate_tax(data_id);
				calculate_balance(data_id);				
			}
		});
}

$(document).ready(function(){
	
	setTimeout(function(){$("#sperson").focus();},200);
	get_fixed_fee($("#fixed_fee_options1").val(),1);
	$('.fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			get_fixed_fee($(this).val(),data_id);
		}
	});
	
	$('.road_registration').change(function(){
		var data_id=$(this).attr('data-id');
		$val = $(this).val();
		/*if($val){
		label_text = $("#road_registration"+data_id+" option:selected").text();
		}else{
		label_text ='';
		}
		$("span#label_road_registration"+data_id).text(label_text);*/
		calculate_tax(data_id);
		calculate_balance(data_id);	
		
	});
	$('.tax_percent').on('change keyup paste', function(){
		var data_id=$(this).attr('data-id');
		$val = $(this).val();
		/*if($val){
		label_text = $("#road_registration"+data_id+" option:selected").text();
		}else{
		label_text ='';
		}
		$("span#label_road_registration"+data_id).text(label_text);*/
		calculate_tax(data_id);
		calculate_balance(data_id);	
		$("#s_tax_per"+data_id).text($val);	
	});
	$("#DealMethodOfPayment").on('change',function(){
		$("#label_method_of_payment").text($(this).val());
		})
	
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
	$(".tax_credit").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_balance(data_id);
			assign_payment(data_id);
		});	
		$(".less_payoff").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			if(data_id == 1){
			$("#trade_payoff").val($(this).val());
			}
			calculate_balance(data_id);
			//assign_payment(data_id);
			});
	
$("#trade_payoff").on('change keyup paste',function(){
			data_id=1;
			$("#less_payoff1").val($(this).val());
			calculate_balance(data_id);
			//assign_payment(data_id);
			});
$(".freight_fee,.prep_fee,.parts_fee,.doc_fee").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_tax(data_id);
			calculate_balance(data_id);
			//assign_payment(data_id);
});
$(".dmv_fee").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			price_index = data_id -1;
			dmv_fee_on[price_index]=$(this).val();
			calculate_tax(data_id);
			calculate_balance(data_id);
			assign_payment(data_id);
});
	

	
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
		
		$( "#worksheet_container" ).printThis({pageTitle:'&nbsp;'});
		
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
