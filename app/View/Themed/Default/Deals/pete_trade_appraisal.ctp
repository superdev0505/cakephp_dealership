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

$datetimefullview = date('M d, Y g:i A');
$dealer_id = AuthComponent::user('dealer_id');
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
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
  <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
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

#clientInfo {float: left; margin: 10px 0px;}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
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
border:none;
border-bottom:1px solid #000;

}
table.input-text input[type="text"]{height:30px;}

	div.page-break{
	page-break-before:always;
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
		<div class="wraper header">
        
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />         
           
          
           <h2 style="text-align:center;margin-bottom:10px;" >RV Appraisal Sheet</h2>
           
           <table width="100%" cellpadding="">
           		 <tr>
                   <td width="100%">
                   <label class="span15" style="width:6%"> Make</label>
                   <input name="make" type="text" class="input20" style="width:15%;" value="<?php echo $info['make']; ?>" placeholder=""/>
                   <label class="span15" style="width:7%"> Model</label>
                   <input name="model" type="text" class="input20" style="width:21%;" value="<?php echo $info['model']; ?>" placeholder=""/>
                   <label class="span15" style="width:6%">Year</label>
                   <input name="make" type="text" class="input20" style="width:10%;" value="<?php echo $info['year']; ?>" placeholder=""/>
                   
                   <label class="span15" style="width:12%"> Lien Holder</label>
                   <input name="lein_holder" type="text" class="input20" style="width:15%;" value="<?php echo isset($info['lein_holder'])?$info['lein_holder']:''; ?>" placeholder=""/>
                   </td>
                   
                   </tr>
                   
                   <tr>
                   <td width="100%">
                   
                   <label class="span15" style="width:12%"> Mileage</label>
                   <input name="lein_holder" type="text" class="input20" style="width:22%;" value="<?php echo isset($info['lein_holder'])?$info['lein_holder']:''; ?>" placeholder=""/>
                   <label class="span15" style="width:5%"> Vin #</label>
                   <input name="lein_holder" type="text" class="input20" style="width:54%;" value="<?php echo isset($info['lein_holder'])?$info['lein_holder']:''; ?>" placeholder=""/>
                   
                   </td>
                   
                   
                   </tr>
                   <tr>
                  	 <td width="100%">
                   		<label class="span15" style="width:10%;">Payoff Amount</label>
                           <input name="lein_holder" type="text" class="input20" style="width:15%;" value="<?php echo isset($info['lein_holder'])?$info['lein_holder']:''; ?>" placeholder=""/>
                           <label class="span15"></label>
                        <label class="span15" style="width:40%;">Do you currently have service protection plan?</label>  
                        <label class="span15">
                        <input type="radio" name="service_protextion_plan" value="yes" <?php echo (!empty($info['service_protextion_plan'])&& strtolower($info['service_protextion_plan']) == 'yes')?'checked="checked"':''; ?>  /> &nbsp; Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="service_protextion_plan" value="no" <?php echo (!empty($info['service_protextion_plan'])&& strtolower($info['service_protextion_plan']) == 'no')?'checked="checked"':''; ?>  /> &nbsp; No</label>
                           
                     </td>
                   </tr>	
            
            
           </table>
           
           
           
           <table width="100%" border="1" align="center">
           		<tr>
                	<td width="15%" rowspan="2" align="center">
                    <strong>AVG Cost of Repair</strong>
                    </td>
                    <td width="22%" rowspan="2" align="center"><strong>Equipment</strong></td>
                    <td width="5%" rowspan="37" bgcolor="#ccc">&nbsp;</td>
                    <td width="15%" align="center" colspan="3"><label>Works</label></td>
                    <td width="30%" rowspan="2" align="center"><label>Notes</label> </td>               
                </tr>
                <tr>
                	<td width="5%" align="center"><strong>Yes</strong></td>
                    <td width="5%" align="center"><strong>No</strong></td>
                     <td width="5%" align="center"><strong>N/A</strong></td>
                </tr>
                <tr>
                <td align="center">$3500-6000</td>
                <td>Engine G D &nbsp;&nbsp;4 &nbsp;6&nbsp;8&nbsp;10</td>
                <td align="center"><input type="radio" name="equip_works_1" value="yes" <?php echo (!empty($info['equip_works_1'])&& strtolower($info['equip_works_1']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_1" value="no" <?php echo (!empty($info['equip_works_1'])&& strtolower($info['equip_works_1']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_1" value="na" <?php echo (!empty($info['equip_works_1'])&& strtolower($info['equip_works_1']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_1" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_1'])?$info['equip_notes_1']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$1000-4000</td>
                <td>Transmission</td>
                <td align="center"><input type="radio" name="equip_works_2" value="yes" <?php echo (!empty($info['equip_works_2'])&& strtolower($info['equip_works_2']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_2" value="no" <?php echo (!empty($info['equip_works_2'])&& strtolower($info['equip_works_2']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_2" value="na" <?php echo (!empty($info['equip_works_2'])&& strtolower($info['equip_works_2']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_2" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_2'])?$info['equip_notes_2']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                <tr>
                <td align="center">$300-600</td>
                <td>Manifolds/Exhaust</td>
                <td align="center"><input type="radio" name="equip_works_3" value="yes" <?php echo (!empty($info['equip_works_3'])&& strtolower($info['equip_works_3']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_3" value="no" <?php echo (!empty($info['equip_works_3'])&& strtolower($info['equip_works_3']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_3" value="na" <?php echo (!empty($info['equip_works_3'])&& strtolower($info['equip_works_3']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_3" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_3'])?$info['equip_notes_3']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$400-600</td>
                <td>Brakes</td>
                <td align="center"><input type="radio" name="equip_works_4" value="yes" <?php echo (!empty($info['equip_works_4'])&& strtolower($info['equip_works_4']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_4" value="no" <?php echo (!empty($info['equip_works_4'])&& strtolower($info['equip_works_4']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_4" value="na" <?php echo (!empty($info['equip_works_4'])&& strtolower($info['equip_works_4']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_4" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_4'])?$info['equip_notes_4']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$300</td>
                <td>Cruise Control</td>
                <td align="center"><input type="radio" name="equip_works_5" value="yes" <?php echo (!empty($info['equip_works_5'])&& strtolower($info['equip_works_5']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_5" value="no" <?php echo (!empty($info['equip_works_5'])&& strtolower($info['equip_works_5']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_5" value="na" <?php echo (!empty($info['equip_works_5'])&& strtolower($info['equip_works_5']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_5" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_5'])?$info['equip_notes_5']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$150-750</td>
                <td>Auto A/C</td>
                <td align="center"><input type="radio" name="equip_works_6" value="yes" <?php echo (!empty($info['equip_works_6'])&& strtolower($info['equip_works_6']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_6" value="no" <?php echo (!empty($info['equip_works_6'])&& strtolower($info['equip_works_6']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_6" value="na" <?php echo (!empty($info['equip_works_6'])&& strtolower($info['equip_works_6']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_6" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_6'])?$info['equip_notes_6']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$300-500</td>
                <td>Windshield</td>
                <td align="center"><input type="radio" name="equip_works_7" value="yes" <?php echo (!empty($info['equip_works_7'])&& strtolower($info['equip_works_7']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_7" value="no" <?php echo (!empty($info['equip_works_7'])&& strtolower($info['equip_works_7']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_7" value="na" <?php echo (!empty($info['equip_works_7'])&& strtolower($info['equip_works_7']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_7" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_7'])?$info['equip_notes_7']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$100 HR + Parts</td>
                <td>Generator HRS.</td>
                <td align="center"><input type="radio" name="equip_works_8" value="yes" <?php echo (!empty($info['equip_works_8'])&& strtolower($info['equip_works_8']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_8" value="no" <?php echo (!empty($info['equip_works_8'])&& strtolower($info['equip_works_8']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_8" value="na" <?php echo (!empty($info['equip_works_8'])&& strtolower($info['equip_works_8']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_8" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_8'])?$info['equip_notes_8']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$100 HR + Parts</td>
                <td>Water System</td>
                <td align="center"><input type="radio" name="equip_works_9" value="yes" <?php echo (!empty($info['equip_works_9'])&& strtolower($info['equip_works_9']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_9" value="no" <?php echo (!empty($info['equip_works_9'])&& strtolower($info['equip_works_9']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_9" value="na" <?php echo (!empty($info['equip_works_9'])&& strtolower($info['equip_works_9']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_9" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_9'])?$info['equip_notes_9']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$100 HR + Parts</td>
                <td>110V Electrical</td>
                <td align="center"><input type="radio" name="equip_works_10" value="yes" <?php echo (!empty($info['equip_works_10'])&& strtolower($info['equip_works_10']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_10" value="no" <?php echo (!empty($info['equip_works_10'])&& strtolower($info['equip_works_10']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_10" value="na" <?php echo (!empty($info['equip_works_10'])&& strtolower($info['equip_works_10']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_10" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_10'])?$info['equip_notes_10']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$100 HR + Parts</td>
                <td>12V Electrical</td>
                <td align="center"><input type="radio" name="equip_works_11" value="yes" <?php echo (!empty($info['equip_works_11'])&& strtolower($info['equip_works_11']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_11" value="no" <?php echo (!empty($info['equip_works_11'])&& strtolower($info['equip_works_11']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_11" value="na" <?php echo (!empty($info['equip_works_11'])&& strtolower($info['equip_works_11']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_11" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_11'])?$info['equip_notes_11']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$1100 - 2500</td>
                <td>REFER - Gas 12V Electrical</td>
                <td align="center"><input type="radio" name="equip_works_12" value="yes" <?php echo (!empty($info['equip_works_12'])&& strtolower($info['equip_works_12']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_12" value="no" <?php echo (!empty($info['equip_works_12'])&& strtolower($info['equip_works_12']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_12" value="na" <?php echo (!empty($info['equip_works_12'])&& strtolower($info['equip_works_12']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_12" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_12'])?$info['equip_notes_12']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$450 - 550</td>
                <td>Hot Water Heater</td>
                <td align="center"><input type="radio" name="equip_works_13" value="yes" <?php echo (!empty($info['equip_works_13'])&& strtolower($info['equip_works_13']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_13" value="no" <?php echo (!empty($info['equip_works_13'])&& strtolower($info['equip_works_13']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_13" value="na" <?php echo (!empty($info['equip_works_13'])&& strtolower($info['equip_works_13']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_13" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_13'])?$info['equip_notes_13']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                 <tr>
                <td align="center">$65 - 400</td>
                <td>Furnace</td>
                <td align="center"><input type="radio" name="equip_works_14" value="yes" <?php echo (!empty($info['equip_works_14'])&& strtolower($info['equip_works_14']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_14" value="no" <?php echo (!empty($info['equip_works_14'])&& strtolower($info['equip_works_14']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_14" value="na" <?php echo (!empty($info['equip_works_14'])&& strtolower($info['equip_works_14']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_14" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_14'])?$info['equip_notes_14']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                <td align="center">$100 HR + Parts</td>
                <td>Cook Stove</td>
                <td align="center"><input type="radio" name="equip_works_15" value="yes" <?php echo (!empty($info['equip_works_15'])&& strtolower($info['equip_works_15']) == 'yes')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_15" value="no" <?php echo (!empty($info['equip_works_15'])&& strtolower($info['equip_works_15']) == 'no')?'checked="checked"':''; ?>  /></td>
                <td align="center"><input type="radio" name="equip_works_15" value="na" <?php echo (!empty($info['equip_works_15'])&& strtolower($info['equip_works_15']) == 'na')?'checked="checked"':''; ?>  /></td>
                <td align="center">
                <input name="equip_notes_15" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_15'])?$info['equip_notes_15']:''; ?>" placeholder=""/>
                </td>                
                </tr>
                
                <tr>
                    <td align="center">$250</td>
                    <td>Microwave</td>
                    <td align="center"><input type="radio" name="equip_works_16" value="yes" <?php echo (!empty($info['equip_works_16'])&& strtolower($info['equip_works_16']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_16" value="no" <?php echo (!empty($info['equip_works_16'])&& strtolower($info['equip_works_16']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_16" value="na" <?php echo (!empty($info['equip_works_16'])&& strtolower($info['equip_works_16']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_16" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_16'])?$info['equip_notes_16']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$110-800</td>
                    <td>Roof A/C</td>
                    <td align="center"><input type="radio" name="equip_works_17" value="yes" <?php echo (!empty($info['equip_works_17'])&& strtolower($info['equip_works_17']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_17" value="no" <?php echo (!empty($info['equip_works_17'])&& strtolower($info['equip_works_17']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_17" value="na" <?php echo (!empty($info['equip_works_17'])&& strtolower($info['equip_works_17']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_17" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_17'])?$info['equip_notes_17']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$80-140 EA</td>
                    <td>Tires G &nbsp;F&nbsp;P</td>
                    <td align="center"><input type="radio" name="equip_works_18" value="yes" <?php echo (!empty($info['equip_works_18'])&& strtolower($info['equip_works_18']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_18" value="no" <?php echo (!empty($info['equip_works_18'])&& strtolower($info['equip_works_18']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_18" value="na" <?php echo (!empty($info['equip_works_18'])&& strtolower($info['equip_works_18']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_18" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_18'])?$info['equip_notes_18']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$350</td>
                    <td>Electric Step</td>
                    <td align="center"><input type="radio" name="equip_works_19" value="yes" <?php echo (!empty($info['equip_works_19'])&& strtolower($info['equip_works_19']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_19" value="no" <?php echo (!empty($info['equip_works_19'])&& strtolower($info['equip_works_19']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_19" value="na" <?php echo (!empty($info['equip_works_19'])&& strtolower($info['equip_works_19']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_19" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_19'])?$info['equip_notes_19']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Tent Fabric</td>
                    <td align="center"><input type="radio" name="equip_works_20" value="yes" <?php echo (!empty($info['equip_works_20'])&& strtolower($info['equip_works_20']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_20" value="no" <?php echo (!empty($info['equip_works_20'])&& strtolower($info['equip_works_20']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_20" value="na" <?php echo (!empty($info['equip_works_20'])&& strtolower($info['equip_works_20']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_20" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_20'])?$info['equip_notes_20']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Screens</td>
                    <td align="center"><input type="radio" name="equip_works_21" value="yes" <?php echo (!empty($info['equip_works_21'])&& strtolower($info['equip_works_21']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_21" value="no" <?php echo (!empty($info['equip_works_21'])&& strtolower($info['equip_works_21']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_21" value="na" <?php echo (!empty($info['equip_works_21'])&& strtolower($info['equip_works_21']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_21" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_21'])?$info['equip_notes_21']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Life System</td>
                    <td align="center"><input type="radio" name="equip_works_22" value="yes" <?php echo (!empty($info['equip_works_22'])&& strtolower($info['equip_works_22']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_22" value="no" <?php echo (!empty($info['equip_works_22'])&& strtolower($info['equip_works_22']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_22" value="na" <?php echo (!empty($info['equip_works_22'])&& strtolower($info['equip_works_22']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_22" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_22'])?$info['equip_notes_22']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Carpet G&nbsp; F &nbsp;P</td>
                    <td align="center"><input type="radio" name="equip_works_23" value="yes" <?php echo (!empty($info['equip_works_23'])&& strtolower($info['equip_works_23']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_23" value="no" <?php echo (!empty($info['equip_works_23'])&& strtolower($info['equip_works_23']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_23" value="na" <?php echo (!empty($info['equip_works_23'])&& strtolower($info['equip_works_23']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_23" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_23'])?$info['equip_notes_23']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Furniture G&nbsp; F &nbsp;P</td>
                    <td align="center"><input type="radio" name="equip_works_24" value="yes" <?php echo (!empty($info['equip_works_24'])&& strtolower($info['equip_works_24']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_24" value="no" <?php echo (!empty($info['equip_works_24'])&& strtolower($info['equip_works_24']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_24" value="na" <?php echo (!empty($info['equip_works_24'])&& strtolower($info['equip_works_24']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_24" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_24'])?$info['equip_notes_24']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>LP System</td>
                    <td align="center"><input type="radio" name="equip_works_25" value="yes" <?php echo (!empty($info['equip_works_25'])&& strtolower($info['equip_works_25']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_25" value="no" <?php echo (!empty($info['equip_works_25'])&& strtolower($info['equip_works_25']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_25" value="na" <?php echo (!empty($info['equip_works_25'])&& strtolower($info['equip_works_25']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_25" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_25'])?$info['equip_notes_25']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Slide Out &nbsp;# of</td>
                    <td align="center"><input type="radio" name="equip_works_26" value="yes" <?php echo (!empty($info['equip_works_26'])&& strtolower($info['equip_works_26']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_26" value="no" <?php echo (!empty($info['equip_works_26'])&& strtolower($info['equip_works_26']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_26" value="na" <?php echo (!empty($info['equip_works_26'])&& strtolower($info['equip_works_26']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_26" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_26'])?$info['equip_notes_26']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
           		
                <tr>
                    <td align="center">$500 - 1000</td>
                    <td>Awning</td>
                    <td align="center"><input type="radio" name="equip_works_27" value="yes" <?php echo (!empty($info['equip_works_27'])&& strtolower($info['equip_works_27']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_27" value="no" <?php echo (!empty($info['equip_works_27'])&& strtolower($info['equip_works_27']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_27" value="na" <?php echo (!empty($info['equip_works_27'])&& strtolower($info['equip_works_27']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_27" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_27'])?$info['equip_notes_27']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Holding Tanks</td>
                    <td align="center"><input type="radio" name="equip_works_28" value="yes" <?php echo (!empty($info['equip_works_28'])&& strtolower($info['equip_works_28']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_28" value="no" <?php echo (!empty($info['equip_works_28'])&& strtolower($info['equip_works_28']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_28" value="na" <?php echo (!empty($info['equip_works_28'])&& strtolower($info['equip_works_28']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_28" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_28'])?$info['equip_notes_28']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$5000 - 10000</td>
                    <td>Sidewall Delam</td>
                    <td align="center"><input type="radio" name="equip_works_29" value="yes" <?php echo (!empty($info['equip_works_29'])&& strtolower($info['equip_works_29']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_29" value="no" <?php echo (!empty($info['equip_works_29'])&& strtolower($info['equip_works_29']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_29" value="na" <?php echo (!empty($info['equip_works_29'])&& strtolower($info['equip_works_29']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_29" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_29'])?$info['equip_notes_29']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Hail Damage</td>
                    <td align="center"><input type="radio" name="equip_works_30" value="yes" <?php echo (!empty($info['equip_works_30'])&& strtolower($info['equip_works_30']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_30" value="no" <?php echo (!empty($info['equip_works_30'])&& strtolower($info['equip_works_30']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_30" value="na" <?php echo (!empty($info['equip_works_30'])&& strtolower($info['equip_works_30']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_30" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_30'])?$info['equip_notes_30']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$100 HR + Parts</td>
                    <td>Water Damage</td>
                    <td align="center"><input type="radio" name="equip_works_31" value="yes" <?php echo (!empty($info['equip_works_31'])&& strtolower($info['equip_works_31']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_31" value="no" <?php echo (!empty($info['equip_works_31'])&& strtolower($info['equip_works_31']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_31" value="na" <?php echo (!empty($info['equip_works_31'])&& strtolower($info['equip_works_31']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_31" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_31'])?$info['equip_notes_31']:''; ?>" placeholder=""/>
                    </td>                
                </tr>	
                
                <tr>
                    <td align="center">$500 - 5000</td>
                    <td>Do Pets Camp With you?</td>
                    <td align="center"><input type="radio" name="equip_works_32" value="yes" <?php echo (!empty($info['equip_works_32'])&& strtolower($info['equip_works_32']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_32" value="no" <?php echo (!empty($info['equip_works_32'])&& strtolower($info['equip_works_32']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_32" value="na" <?php echo (!empty($info['equip_works_32'])&& strtolower($info['equip_works_32']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_32" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_32'])?$info['equip_notes_32']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$500 - 5000</td>
                    <td>Has Unit Been Smoked In ?</td>
                    <td align="center"><input type="radio" name="equip_works_33" value="yes" <?php echo (!empty($info['equip_works_33'])&& strtolower($info['equip_works_33']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_33" value="no" <?php echo (!empty($info['equip_works_33'])&& strtolower($info['equip_works_33']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_33" value="na" <?php echo (!empty($info['equip_works_33'])&& strtolower($info['equip_works_33']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_33" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_33'])?$info['equip_notes_33']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$1000 - 2000</td>
                    <td>Original Flooring</td>
                    <td align="center"><input type="radio" name="equip_works_34" value="yes" <?php echo (!empty($info['equip_works_34'])&& strtolower($info['equip_works_34']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_34" value="no" <?php echo (!empty($info['equip_works_34'])&& strtolower($info['equip_works_34']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_34" value="na" <?php echo (!empty($info['equip_works_34'])&& strtolower($info['equip_works_34']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_34" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_34'])?$info['equip_notes_34']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
                
                <tr>
                    <td align="center">$1000 - 2000</td>
                    <td>Original Furniture</td>
                    <td align="center"><input type="radio" name="equip_works_35" value="yes" <?php echo (!empty($info['equip_works_35'])&& strtolower($info['equip_works_35']) == 'yes')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_35" value="no" <?php echo (!empty($info['equip_works_35'])&& strtolower($info['equip_works_35']) == 'no')?'checked="checked"':''; ?>  /></td>
                    <td align="center"><input type="radio" name="equip_works_35" value="na" <?php echo (!empty($info['equip_works_35'])&& strtolower($info['equip_works_35']) == 'na')?'checked="checked"':''; ?>  /></td>
                    <td align="center">
                    <input name="equip_notes_35" type="text" class="input20" style="width:90%;" value="<?php echo isset($info['equip_notes_35'])?$info['equip_notes_35']:''; ?>" placeholder=""/>
                    </td>                
                </tr>
               
                
           
           
           </table>
           
           <table width="100%" cellpadding="6">
            <tr>
                <td width="100%;">
                <label class="span15" style="width:10%">Miscellaneous</label>
                <input name="miscellaneous" type="text" class="input20" style="width:88%;" value="<?php echo isset($info['miscellaneous'])?$info['miscellaneous']:''; ?>" placeholder=""/>
                </td>
                </tr>
                <tr>
                <td width="100%;">
                <label class="span15" style="width:18%">Owner Signature</label>
                <input name="owner_signature" type="text" class="input20" style="width:70%;" value="<?php echo isset($info['owner_signature'])?$info['owner_signature']:''; ?>" placeholder=""/>
                </td>
                </tr>
                <tr>
                	<td width="100%;">
                <p>Your signature on this document verifies that the information is correct to the best of your knowledge and you will be responsible foll repair/replacement needed to acheive the allowed value. This trade shall be subject to an inspection by Pete's Rv Center. This trade shall checked for condition and verification of the manufacturers model,year,length,options and marketable title (i.e not rebuilt or salvaged, Duplicate, Non-Discharged liens, etc.) Pete's RV reserves the right to declare this sale null and void or adjust the Trade-In value if for any of the above reasons this trade is unacceptable or not as represented by your above signature. </p>
                	</td>
                </tr>
           
           </table>            
          
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

var vehicle_unit_value=[<?php echo isset($info['combine_price'])?$info['combine_price']:$info['unit_value']; ?>,<?php echo isset($info['msrp2'])?$info['msrp2']:'0.00'; ?>,<?php echo isset($info['msrp3'])?$info['msrp3']:'0.00'; ?>];
var vehice_down_payment=[<?php echo isset($info['down_payment'])?$info['down_payment']:'0'; ?>,<?php echo isset($info['down_payment2'])?$info['down_payment2']:'0'; ?>,<?php echo isset($info['down_payment3'])?$info['down_payment3']:'0'; ?>];
var dmv_fee_on = [0.00,0.00,0.00];
var dmv_fee_off = [0.00,0.00,0.00];
var filling_fee_dmv = [0.00,0.00,0.00];
var axle_fee_2 = [0.00,0.00,0.00];
var axle_fee_4 = [0.00,0.00,0.00];
function assign_fees(data,v_id)
{
	arr_index = v_id -1;
	$("#freight_fee"+v_id).val(data.freight_fee);
	$("#prep_fee"+v_id).val(data.prep_fee);
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
	$("#tire_wheel_fee"+v_id).val(data.title_fee);
	$("#parts_fee"+v_id).val(data.parts_fee);
	$dmv_fee= (data.dmv_fee == '' || data.dmv_fee == null)? 0.00 : parseFloat(data.dmv_fee);
	$dmv_offroad= (data.dmv_offroad == '' || data.dmv_offroad == null)? 0.00 : parseFloat(data.dmv_offroad);
	$filling_fee= (data.filling_fee == '' || data.filling_fee == null)? 0.00 : parseFloat(data.filling_fee);
	$dmv_fee =isNaN($dmv_fee)?0.00:$dmv_fee;
	$dmv_offroad =isNaN($dmv_offroad)?0.00:$dmv_offroad;
	$filling_fee =isNaN($filling_fee)?0.00:$filling_fee;
	axle_fee_2[arr_index] = data.vehicle_axle_fee_2;
	axle_fee_4[arr_index] = data.vehicle_axle_fee_4;
	$dmv_fee = parseFloat($dmv_fee + $filling_fee).toFixed(2);
	dmv_fee_on[arr_index] = $dmv_fee;
	dmv_fee_off[arr_index] = $dmv_offroad;
	filling_fee_dmv[arr_index] = $filling_fee;
	$("#filling_fee"+v_id).val($filling_fee);
	$("#dmv_offroad"+v_id).val($dmv_offroad);
	$("#dmv_fee"+v_id).val($dmv_fee);
	$("#loan_apr"+v_id).val(data.apr_percentage);
}

function calculate_balance(data_id)
{
	price_index=data_id-1;
	actual_value=vehicle_unit_value[price_index];
	allowance=$("#down_payment"+data_id).val();
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
	sell_value=parseFloat($("#amount"+data_id).val());
	sell_value=isNaN(sell_value)?0.00:$.sell_value;

	//down_percentage=vehice_down_payment[data_id-1];
	//down_payment=(parseFloat(down_percentage)/100)*sell_value;
	//down_payment=isNaN(down_payment)?0.00:down_payment;
	//$("#down_payment"+data_id).val(down_payment.toFixed(2));
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
$(".freight_fee,.prep_fee,.parts_fee,.doc_fee,.tire_wheel_fee,.accs,.labor").on('change keyup paste',function(){
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

$(".suggest_price,.your_price").on('change keyup paste',function(){
		suggest_price = 0;
		your_price = 0;
		data_id =1;
		$(".suggest_price").each(function(){
			suggest_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		$(".your_price").each(function(){
			your_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		savings = suggest_price - your_price;
		$("#combine_unit_value").val(suggest_price.toFixed(2));
		$("#combine_savings").val(savings.toFixed(2));
		$("#msrp1").val(your_price.toFixed(2));
		vehicle_unit_value[0] = your_price;
		calculate_tax(data_id);
		calculate_balance(data_id);
		assign_payment(data_id);

	});
	
$(".trade_value,.trade_payoff").on('change keyup paste',function(){
	$trade_value=0;
	$trade_payoff = 0;
	data_id =1;
	$(".trade_value").each(function(){
			$trade_value += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
	$(".trade_payoff").each(function(){
			$trade_payoff += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});	
	$("#trade_value").val($trade_value.toFixed(2));	
	$("#less_payoff1").val($trade_payoff.toFixed(2));
	calculate_tax(data_id);
	calculate_balance(data_id);
	assign_payment(data_id);
	
	});	


function calculate_tax(data_id){
		//var tax_type = $('input:radio[name=taxopt]:checked').val();
		price_index=data_id-1;

		var tax_value=isNaN(parseFloat( $('#tax_percent'+data_id).val()))?0.00:parseFloat( $('#tax_percent'+data_id).val());
		var freight = isNaN(parseFloat( $('#freight_fee'+data_id).val()))?0.00:parseFloat( $('#freight_fee'+data_id).val());
		var prep = isNaN(parseFloat( $('#prep_fee'+data_id).val()))?0.00:parseFloat( $('#prep_fee'+data_id).val());
		var doc = isNaN(parseFloat( $('#doc_fee'+data_id).val()))?0.00:parseFloat($('#doc_fee'+data_id).val());
		var part_fee = isNaN(parseFloat($('#parts_fee'+data_id).val()))?0.00:parseFloat($('#parts_fee'+data_id).val());
		var tree_fee = isNaN(parseFloat( $('#tire_wheel_fee'+data_id).val()))?0.00:parseFloat( $('#tire_wheel_fee'+data_id).val());
		var sell_price = parseFloat(vehicle_unit_value[price_index]);

		$accs_price =0;
		for(i=1;i<=6;i++)
		{
		$accs_price += isNaN(parseFloat( $('#acc'+data_id+String(i)).val()))?0.00:parseFloat( $('#acc'+data_id+String(i)).val());
		}
		labor =isNaN(parseFloat( $('#labor'+data_id).val()))?0.00:parseFloat( $('#labor'+data_id).val());
		var amount = freight+prep+doc+part_fee+sell_price+$accs_price+labor;
		amount = isNaN(amount)?0.00:amount;

	//	var dmv_fee = parseFloat(dmv_fee_on[price_index]);
		//var dmv_offroad = parseFloat($("#dmv_offroad"+data_id).val());
	//	var dmv_fee_total = dmv_fee + (parseFloat(dmv_offroad)/100)*amount;
		//dmv_fee_total = isNaN(dmv_fee_total)?0.00:parseFloat(dmv_fee_total);
		//$("#dmv_fee"+data_id).val(dmv_fee_total.toFixed(2));
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		$trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat( $('#trade_value').val());
		
		amount = amount - $trade_value; 
		$("#sub_total"+data_id).val(amount.toFixed(2));
		//console.log('dmv_fee ::'+dmv_fee+'--dmv_offroad=='+dmv_offroad+'--dmv_fee_total='+dmv_fee_total+'--amount='+amount);
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:amountIncludingTax;
		$('#tax_fee'+data_id).val( amountIncludingTax );


		//actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee+dmv_fee_total;


		actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee;
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
		$val = $(this).val();
		data_id =1;
		$("#down_payment").val($val);
		$("#down_payment1").val($val);
		calculate_tax(data_id);
		calculate_balance(data_id);
		assign_payment(data_id);

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

		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years,data_id);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
										  payment.value = pay_monthly;

										  });
	 	}


	<?php /*?>function calculateMonthWisePayments(data_id){
			months=$("#option_price"+data_id).val();
			$("#option_month_span"+data_id).text();
			years=months/12;
			pay_monthly=MonthwisePayments(years,data_id);
			$("#payment"+data_id).val(pay_monthly);
		}<?php */?>

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
