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
.td-main-border{border:2px solid #000;}
.border_top{border-top:1px solid #000;}
.border_bottom{border-bottom:1px solid #000;}
.border_right{border-right:1px solid #000;}
.border_left{border-left:1px solid #000;}

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

}
input.border_bottom{border-bottom:1px solid #000!important;}
span.small-text{font-size:11px;}
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




            <table style="width:100%" border="2">
            <tr>
               <td width="50%">
                <table width="100%">
                <tr>
                <td width="30%" valign="top" rowspan="3"><?php $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealer-logo.png';
                echo $this->Html->image( $dealer_logo);
                 ?></td>
                <td width="70%"><label style="width:39%">Test Run Date:</label><input type="text" name="test_run_date" style="display:inline;width:60%" class="border_bottom" value="<?php echo isset($info['test_run_date'])?$info['test_run_date']:''; ?>" /></td>
                </tr>
                <tr>
                 <td width="70%"><label style="width:39%">Delivery Date Requested:</label><input type="text" name="delivery_date" style="display:inline;width:60%;" class="border_bottom" value="<?php echo isset($info['delivery_date'])?$info['delivery_date']:''; ?>" /></td>
                </tr>
                <tr>
                <td style="padding:20px;">
                <span style="width:50%;float:left;" class="small-text">Washington Store<br />
                   1589 W. 5<sup>th</sup> Street<br/>
                   Washington, NC 27889<br/>
                   Phone (252) 946-3248<br/>
                   Fax (252) 946-2597<br/>
                   www.parkboat.com
                   </span>
                   <span style="width:50%;float:left;" class="small-text">
                   Manteo Marine<br/>
                   411 US Hwy 64<br/>
                   Manteo, NC 27954<br />
                   Phone (252) 473-2197<br/>
                   Fax (252) 473-1161<br/>
                   info@parkboat.com
                 </span>

                </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <table width="100%" border="1">
                    <tr>
                    <td width="4%"></td>
                    <td colspan="2"><label>PLEASE ENTER MY ORDER FOR THE FOLLOWING</label></td>
                    <td colspan="2"><label>Color</label><br/>
                    <input type="text" name="unit_color" style="display:inline;width:100%;" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" />
                    </td>
                    </tr>
                    <tr><td width="4%" rowspan="2"><span style="width:100%;float:left;text-align:center;">U</span><span style="width:100%;float:left;text-align:center;">N</span><span style="width:100%;float:left;text-align:center;">I</span><span style="width:100%;float:left;text-align:center;">T</span></td>
                    <td width="24%"><label>Year</label><br/>
                     <input type="text" name="year" style="display:inline;width:100%;" value="<?php echo isset($info['year'])?$info['year']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Make</label><br/>
                     <input type="text" name="make" style="display:inline;width:100%;" value="<?php echo isset($info['make'])?$info['make']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Model</label><br/>
                     <input type="text" name="model" style="display:inline;width:100%;" value="<?php echo isset($info['model'])?$info['model']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Stock No.</label><br/>
                     <input type="text" name="stock_num" style="display:inline;width:100%;" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" />
                    </td>
                    </tr>
                    <tr>
                    <td colspan="3"><label>ID #</label><br/>
                     <input type="text" name="id_num" style="display:inline;width:100%;" value="<?php echo isset($info['id_num'])?$info['id_num']:''; ?>" /></td>
                      <td><label>Length</label><br/>
                     <input type="text" name="length" style="display:inline;width:100%;" value="<?php echo isset($info['length'])?$info['length']:''; ?>" /></td>
                    </tr>

                       <tr><td width="4%" rowspan="2"><span style="width:100%;float:left;text-align:center;">M</span><span style="width:100%;float:left;text-align:center;">O</span><span style="width:100%;float:left;text-align:center;">T</span><span style="width:100%;float:left;text-align:center;">O</span><span style="width:100%;float:left;text-align:center;">R</span></td>
                    <td width="24%"><label>Year</label><br/>
                     <input type="text" name="year2" style="display:inline;width:100%;" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Make</label><br/>
                     <input type="text" name="make2" style="display:inline;width:100%;" value="<?php echo isset($info['make2'])?$info['make2']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Model</label><br/>
                     <input type="text" name="model2" style="display:inline;width:100%;" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Stock No.</label><br/>
                     <input type="text" name="stock_num2" style="display:inline;width:100%;" value="<?php echo isset($info['stock_num2'])?$info['stock_num2']:''; ?>" />
                    </td>
                    </tr>
                    <tr>
                    <td colspan="3"><label>ID #</label><br/>
                     <input type="text" name="id_num2" style="display:inline;width:100%;" value="<?php echo isset($info['id_num2'])?$info['id_num2']:''; ?>" /></td>
                      <td><label>H.P</label><br/>
                     <input type="text" name="length2" style="display:inline;width:100%;" value="<?php echo isset($info['length2'])?$info['length2']:''; ?>" /></td>
                    </tr>

                     <tr><td width="4%" rowspan="2"><span style="width:100%;float:left;text-align:center;">M</span><span style="width:100%;float:left;text-align:center;">O</span><span style="width:100%;float:left;text-align:center;">T</span><span style="width:100%;float:left;text-align:center;">O</span><span style="width:100%;float:left;text-align:center;">R</span></td>
                    <td width="24%"><label>Year</label><br/>
                     <input type="text" name="year3" style="display:inline;width:100%;" value="<?php echo isset($info['year3'])?$info['year3']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Make</label><br/>
                     <input type="text" name="make3" style="display:inline;width:100%;" value="<?php echo isset($info['make3'])?$info['make3']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Model</label><br/>
                     <input type="text" name="model3" style="display:inline;width:100%;" value="<?php echo isset($info['model3'])?$info['model3']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Stock No.</label><br/>
                     <input type="text" name="stock_num3" style="display:inline;width:100%;" value="<?php echo isset($info['stock_num3'])?$info['stock_num3']:''; ?>" />
                    </td>
                    </tr>
                    <tr>
                    <td colspan="3"><label>ID #</label><br/>
                     <input type="text" name="id_num3" style="display:inline;width:100%;" value="<?php echo isset($info['id_num3'])?$info['id_num3']:''; ?>" /></td>
                      <td><label>H.P</label><br/>
                     <input type="text" name="length3" style="display:inline;width:100%;" value="<?php echo isset($info['length3'])?$info['length3']:''; ?>" /></td>
                    </tr>

                    <tr><td width="4%" rowspan="2"><span style="width:100%;float:left;text-align:center;">T</span><span style="width:100%;float:left;text-align:center;">R</span><span style="width:100%;float:left;text-align:center;">L</span></td>
                    <td width="24%"><label>Year</label><br/>
                     <input type="text" name="year4" style="display:inline;width:100%;" value="<?php echo isset($info['year4'])?$info['year4']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Make</label><br/>
                     <input type="text" name="make4" style="display:inline;width:100%;" value="<?php echo isset($info['make4'])?$info['make4']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Model</label><br/>
                     <input type="text" name="model4" style="display:inline;width:100%;" value="<?php echo isset($info['model4'])?$info['model4']:''; ?>" />
                    </td>
                    <td width="24%">
                    <label>Stock No.</label><br/>
                     <input type="text" name="stock_num4" style="display:inline;width:100%;" value="<?php echo isset($info['stock_num4'])?$info['stock_num4']:''; ?>" />
                    </td>
                    </tr>
                    <tr>
                    <td colspan="3"><label>ID #</label><br/>
                     <input type="text" name="id_num4" style="display:inline;width:100%;" value="<?php echo isset($info['id_num4'])?$info['id_num4']:''; ?>" /></td>
                      <td><label>Complete</label><br/>
                     <input type="text" name="length4" style="display:inline;width:100%;" value="<?php echo isset($info['length4'])?$info['length4']:''; ?>" /></td>
                    </tr>


                    </table>
                    </td>
                </tr>

                </table>
                </td>

                <td width="50%"><br/>
                  <h4 style="text-align:center;"><strong>OFFER TO PURCHASE</strong></h4>
                  <table width="100%">
                  <tr>
                  <td width="100%">
                  	 <div class="border_right border_bottom border_top" style="width:50%;float:left;"><label>Date</label><br/>
             <input type="text" name="submit_date" style="display:inline;width:100%;" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" />
               </div>
               <div class="border_bottom border_top" style="width:50%;float:left;">
               <label>Salesman</label><br/>
             <input type="text" name="submit_date" style="display:inline;width:100%;" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" />
               </div>

                <div class="border_right border_bottom" style="width:65%;float:left;"><label>Purchaser</label><br/>
             <input type="text" name="purchaser" style="display:inline;width:100%;" value="<?php echo isset($info['purchaser'])?$info['purchaser']:$info['first_name'].' '.$info['last_name']; ?>" />
               </div>
               <div class="border_bottom" style="width:35%;float:left;">
               <label>DL #</label><br/>
             <input type="text" name="purchaser_dl_no" style="display:inline;width:100%;" value="<?php echo isset($info['purchaser_dl_no'])?$info['purchaser_dl_no']:''; ?>" />
               </div>

               <div class="border_right border_bottom" style="width:65%;float:left;"><label>Co-Purchaser</label><br/>
             <input type="text" name="co_purchaser" style="display:inline;width:100%;" value="<?php echo isset($info['co_purchaser'])?$info['co_purchaser']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:35%;float:left;">
               <label>DL #</label><br/>
             <input type="text" name="co_purchaser_dl_no" style="display:inline;width:100%;" value="<?php echo isset($info['co_purchaser_dl_no'])?$info['co_purchaser_dl_no']:''; ?>" />
               </div>

               <div class="border_right border_bottom" style="width:65%;float:left;"><label>Address</label><br/>
             <input type="text" name="address" style="display:inline;width:100%;" value="<?php echo isset($info['address'])?$info['address']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:35%;float:left;">
               <label>County</label><br/>
             <input type="text" name="county" style="display:inline;width:100%;" value="<?php echo isset($info['county'])?$info['county']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:44%;float:left;">
               <label>City</label><br/>
             <input type="text" name="city" style="display:inline;width:100%;" value="<?php echo isset($info['city'])?$info['city']:''; ?>" />
               </div>
                <div class="border_bottom" style="width:28%;float:left;">
               <label>State</label><br/>
             <input type="text" name="state" style="display:inline;width:100%;" value="<?php echo isset($info['state'])?$info['state']:''; ?>" />
               </div>
                 <div class="border_bottom" style="width:28%;float:left;">
               <label>Zip</label><br/>
             <input type="text" name="zip" style="display:inline;width:100%;" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" />
               </div>
               <div class="border_right border_bottom" style="width:33%;float:left;"><label>Residence #</label><br/>
             <input type="text" name="phone" style="display:inline;width:100%;" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" />
               </div>
                <div class="border_right border_bottom" style="width:33%;float:left;"><label>Business #</label><br/>
             <input type="text" name="work_number" style="display:inline;width:100%;" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:34%;float:left;"><label>Fax #</label><br/>
             <input type="text" name="fax_number" style="display:inline;width:100%;" value="<?php echo isset($info['fax_number'])?$info['fax_number']:''; ?>" />
               </div>

               <div class="border_right border_bottom" style="width:40%;float:left;"><label>Cell #</label><br/>
             <input type="text" name="mobile" style="display:inline;width:100%;" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:60%;float:left;"><label>Email</label><br/>
             <input type="text" name="email" style="display:inline;width:100%;" value="<?php echo isset($info['email'])?$info['email']:''; ?>" />
               </div>

                <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"><label>Boat/PKG.</label>
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="unit_value" class="amount_field" id="unit_value" style="display:inline;width:100%;" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" />
               </div>

               <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"><label>Motor(s)</label>
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="motors" style="display:inline;width:100%;" class="amount_field" id="motor_price" value="<?php echo isset($info['motors'])?$info['motors']:''; ?>" />
               </div>
               <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"><label>Trailer</label>
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="trailer" class="amount_field" id="trailer_price" style="display:inline;width:100%;" value="<?php echo isset($info['trailer'])?$info['trailer']:''; ?>" />
               </div>
               <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"> <input type="text" name="label_type_1" style="display:inline;width:100%;" value="<?php echo isset($info['label_type_1'])?$info['label_type_1']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="label_value_1" style="display:inline;width:100%;" value="<?php echo isset($info['label_value_1'])?$info['label_value_1']:''; ?>" />
               </div>
                 <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"> <input type="text" name="label_type_2" style="display:inline;width:100%;" value="<?php echo isset($info['label_type_2'])?$info['label_type_2']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="label_value_2" style="display:inline;width:100%;" value="<?php echo isset($info['label_value_2'])?$info['label_value_2']:''; ?>" />
               </div>
                 <div class="border_right border_bottom" style="width:70%;float:left;height:35px;"> <input type="text" name="label_type_3" style="display:inline;width:100%;" value="<?php echo isset($info['label_type_3'])?$info['label_type_3']:''; ?>" />
               </div>
               <div class="border_bottom" style="width:30%;float:left;height:35px;">
             <input type="text" name="label_value_3" style="display:inline;width:100%;" value="<?php echo isset($info['label_value_3'])?$info['label_value_3']:''; ?>" />
               </div>

                <div class="border_right border_bottom noprint" style="width:70%;float:left;height:35px;"><label>Fixed Fee</label>
               </div>
               <div class="border_bottom noprint" style="width:30%;float:left;height:35px;">
         		 <?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:90px;',
							'data-id'=>'1',
							'value'=>$info['fixed_fee_options']
						));
						?>
               </div>

                  </td>
                  </tr>
                  </table>

                </td>
            </tr>
            <tr>
            <td>
            <table width="100%" border="1" >
            <tr>
            <td width="4%" align="center" rowspan="8"><span style="width:100%;float:left;text-align:center;">A</span><span style="width:100%;float:left;text-align:center;">C</span><span style="width:100%;float:left;text-align:center;">C</span>
            <span style="width:100%;float:left;text-align:center;">E</span>
            <span style="width:100%;float:left;text-align:center;">S</span>
            <span style="width:100%;float:left;text-align:center;">S</span>
            <span style="width:100%;float:left;text-align:center;">O</span>
            <span style="width:100%;float:left;text-align:center;">R</span>
            <span style="width:100%;float:left;text-align:center;">I</span>
            <span style="width:100%;float:left;text-align:center;">E</span>
            <span style="width:100%;float:left;text-align:center;">S</span>
            </td>
            <td width="22%" align="center"><label>Item #</label></td>
            <td width="9%" align="center"><label>VEN</label></td>
            <td width="41%" align="center"><label>Description</label></td>
            <td width="24%"></td>
            </tr>
            <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_1"  style="display:inline;width:100%;" value="<?php echo isset($info['item_no_1'])?$info['item_no_1']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_1" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_1'])?$info['item_ven_1']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_1" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_1'])?$info['item_desc_1']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_1" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_1'])?$info['item_value_1']:''; ?>" /></td>
            </tr>
            <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_2" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_2'])?$info['item_no_2']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_2" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_2'])?$info['item_ven_2']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_2" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_2'])?$info['item_desc_2']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_2" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_2'])?$info['item_value_2']:''; ?>" /></td>
            </tr>
           <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_3" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_3'])?$info['item_no_3']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_3" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_3'])?$info['item_ven_3']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_3" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_3'])?$info['item_desc_3']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_3" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_3'])?$info['item_value_3']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_4" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_4'])?$info['item_no_4']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_4" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_4'])?$info['item_ven_4']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_4" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_4'])?$info['item_desc_4']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_4" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_4'])?$info['item_value_4']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_5" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_5'])?$info['item_no_5']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_5" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_5'])?$info['item_ven_5']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_5" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_5'])?$info['item_desc_5']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_5" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_5'])?$info['item_value_5']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_6" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_6'])?$info['item_no_6']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_6" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_6'])?$info['item_ven_6']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_6" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_6'])?$info['item_desc_6']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_6" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_6'])?$info['item_value_6']:'';?>" /></td>
            </tr>
              <tr>
            <td width="22%" align="center"> <input type="text" name="item_no_7" style="display:inline;width:100%;" value="<?php echo isset($info['item_no_7'])?$info['item_no_7']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="item_ven_7" style="display:inline;width:100%;" value="<?php echo isset($info['item_ven_7'])?$info['item_ven_7']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="item_desc_7" style="display:inline;width:100%;" value="<?php echo isset($info['item_desc_7'])?$info['item_desc_7']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="item_value_7" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['item_value_7'])?$info['item_value_7']:'';?>" /></td>
            </tr>
            </table>
            <table width="100%" border="2">
            <tr>
            <td width="4%" rowspan="7" align="center">
             <span style="width:100%;float:left;text-align:center;">F</span>
            <span style="width:100%;float:left;text-align:center;">I</span>
            <span style="width:100%;float:left;text-align:center;">N</span>
            <span style="width:100%;float:left;text-align:center;">A</span>
            <span style="width:100%;float:left;text-align:center;">N</span>
            <span style="width:100%;float:left;text-align:center;">C</span>
            <span style="width:100%;float:left;text-align:center;">E</span>

            </td>
            <td width="96%" colspan="3"><strong>FINANCING INFORMATION</strong></td>
            </tr>
            <tr>
            <td colspan="2" width="60%"><label>Amount To Finance</label></td>
            <td  width="36%"><input type="text" name="finance_amount" style="display:inline;width:100%;" value="<?php echo isset($info['finance_amount'])?$info['finance_amount']:'';?>" /></td>
            </tr>
            <tr>
            <td colspan="2" width="60%"><label>&nbsp;&nbsp;-&nbsp;From Offer To Purchase</label></td>
            <td  width="36%"><input type="text" name="from_purchase" style="display:inline;width:100%;" value="<?php echo isset($info['from_purchase'])?$info['from_purchase']:'';?>" /></td>
            </tr>

             <tr>
            <td colspan="2" width="60%"><label>&nbsp;&nbsp;-&nbsp;From Trade In Payoff</label></td>
            <td  width="36%"><input type="text" name="from_trade_payoff" style="display:inline;width:100%;" value="<?php echo isset($info['from_trade_payoff'])?$info['from_trade_payoff']:'';?>" /></td>
            </tr>
            <tr>
            <td colspan="2" width="60%"><label>Total Amount To Finance</label></td>
            <td  width="36%"><input type="text" name="total_finance_amount" style="display:inline;width:100%;" value="<?php echo isset($info['total_finance_amount'])?$info['total_finance_amount']:'';?>" /></td>
            </tr>

             <tr>
            <td  width="48%"><label>Est. Rate&nbsp; <input type="text" name="est_rate" style="display:inline;width:71%;" value="<?php echo isset($info['est_rate'])?$info['est_rate']:'';?>" /></label></td>
            <td  colspan="2" width="48%"><label>Est. Term&nbsp; <input type="text" name="est_term" style="display:inline;width:69%;" value="<?php echo isset($info['est_term'])?$info['est_term']:'';?>" /></label></td>
            </tr>
             <tr>
            <td  width="48%"><label>Est. Payment&nbsp; <input type="text" name="est_payment" style="display:inline;width:58%;" value="<?php echo isset($info['est_payment'])?$info['est_payment']:'';?>" /></label></td>
            <td  colspan="2" width="48%"><label>Source &nbsp;<input type="text" name="source" style="display:inline;width:72%;" value="<?php echo isset($info['source'])?$info['source']:'';?>" /></label></td>
            </tr>
            <tr>
            <td rowspan="2">
             <span style="width:100%;float:left;text-align:center;">I</span>
            <span style="width:100%;float:left;text-align:center;">N</span>
            <span style="width:100%;float:left;text-align:center;">S</span>
            </td>
            <td colspan="3"><label style="width:35%;float:left">Company &nbsp;<input type="text" name="finance_company" style="display:inline;width:57%;" value="<?php echo isset($info['finance_company'])?$info['finance_company']:'';?>" /></label>
            <label style="width:32%;float:left">Agent &nbsp;<input type="text" name="finance_agent" style="display:inline;width:68%;" value="<?php echo isset($info['finance_agent'])?$info['finance_agent']:'';?>" /></label>
             <label style="width:33%;float:left">Phone &nbsp;<input type="text" name="finance_phone" style="display:inline;width:68%;" value="<?php echo isset($info['finance_phone'])?$info['finance_phone']:'';?>" /></label>
            </td>

            </tr>

            <tr>
           <td colspan="3"><label style="width:100%;">Policy # &nbsp;<input type="text" name="policy_no" style="display:inline;width:83%;" value="<?php echo isset($info['policy_no'])?$info['policy_no']:'';?>" /></label>

            </td>

            </tr>

            </table>
            <table width="100%" border="2">
            <tr>
            <td width="4%" rowspan="5">
             <span style="width:100%;float:left;text-align:center;">T</span>
            <span style="width:100%;float:left;text-align:center;">R</span>
            <span style="width:100%;float:left;text-align:center;">A</span>
             <span style="width:100%;float:left;text-align:center;">D</span>
            <span style="width:100%;float:left;text-align:center;">E</span>
            <span style="width:100%;float:left;text-align:center;">&nbsp;</span>
             <span style="width:100%;float:left;text-align:center;">I</span>
            <span style="width:100%;float:left;text-align:center;">N</span>

            </td>
            <td colspan="3" width="50%"><label style="width:100%;">Lien Holder &nbsp;<input type="text" name="lein_holder" style="display:inline;width:64%;" value="<?php echo isset($info['lein_holder'])?$info['lein_holder']:'';?>" /></label></td>
             <td colspan="3" width="50%"><label style="width:100%;">ACCT. # &nbsp;<input type="text" name="acct_no" style="display:inline;width:71%;" value="<?php echo isset($info['acct_no'])?$info['acct_no']:'';?>" /></label></td>
            </tr>
            <tr>
            <td colspan="2" width="32%"><label style="width:100%;">Allowance &nbsp;<input type="text" name="total_allowance" id="total_allowance" style="display:inline;width:50%;" value="<?php echo isset($info['total_allowance'])?$info['total_allowance']:'';?>" /></label></td>
             <td colspan="2" width="32%"><label style="width:100%;">Payoff &nbsp;<input type="text" name="total_payoff" id="total_payoff" style="display:inline;width:65%;" value="<?php echo isset($info['total_payoff'])?$info['total_payoff']:'';?>" /></label></td>
              <td colspan="2" width="32%"><label style="width:100%;">ACV &nbsp;<input type="text" name="total_acv" id="total_acv" style="display:inline;width:70%;" value="<?php echo isset($info['total_acv'])?$info['total_acv']:'';?>" /></label></td>
            </tr>
            <tr>
            <td width="20%"><label>Year</label>
            <input type="text" name="year_trade" style="display:inline;width:100%;" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" />
            </td>
            <td width="28%" colspan="2"><label>Make Boat</label>
            <input type="text" name="make_trade" style="display:inline;width:100%;" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" /></td>
            <td width="28%" colspan="2"><label>Model</label>
            <input type="text" name="model_trade" style="display:inline;width:100%;" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" /></td>
            <td width="20%"><label>ID #</label>
            <input type="text" name="trade_id_no" style="display:inline;width:100%;" value="<?php echo isset($info['trade_id_no'])?$info['trade_id_no']:''; ?>" /></td>
            </tr>

            <tr>
            <td width="20%"><label>Year</label>
            <input type="text" name="year_trade2" style="display:inline;width:100%;" value="<?php echo isset($info['year_trade2'])?$info['year_trade2']:''; ?>" />
            </td>
            <td width="28%" colspan="2"><label>Make Boat</label>
            <input type="text" name="make_trade2" style="display:inline;width:100%;" value="<?php echo isset($info['make_trade2'])?$info['make_trade2']:''; ?>" /></td>
            <td width="28%" colspan="2"><label>Model</label>
            <input type="text" name="model_trade2" style="display:inline;width:100%;" value="<?php echo isset($info['model_trade2'])?$info['model_trade2']:''; ?>" /></td>
            <td width="20%"><label>ID #</label>
            <input type="text" name="trade_id_no2" style="display:inline;width:100%;" value="<?php echo isset($info['trade_id_no2'])?$info['trade_id_no2']:''; ?>" /></td>
            </tr>

            </table>


            </td>
            <td> <table width="100%" border="1" cellpadding="2">
            <tr>
            <td width="20%" align="center"><label>Item #</label></td>
            <td width="8%" align="center"><label>VEN</label></td>
            <td width="42%" align="center"><label>Description</label></td>
            <td width="30%"></td>
            </tr>
             <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_1" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_1'])?$info['sitem_no_1']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_1" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_1'])?$info['sitem_ven_1']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_1" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_1'])?$info['sitem_desc_1']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_1" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_1'])?$info['sitem_value_1']:''; ?>" /></td>
            </tr>
            <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_2" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_2'])?$info['sitem_no_2']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_2" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_2'])?$info['sitem_ven_2']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_2" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_2'])?$info['sitem_desc_2']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_2" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_2'])?$info['sitem_value_2']:''; ?>" /></td>
            </tr>
           <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_3" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_3'])?$info['sitem_no_3']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_3" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_3'])?$info['sitem_ven_3']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_3" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_3'])?$info['sitem_desc_3']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_3" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_3'])?$info['item_value_3']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_4" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_4'])?$info['sitem_no_4']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_4" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_4'])?$info['sitem_ven_4']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_4" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_4'])?$info['sitem_desc_4']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_4" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_4'])?$info['sitem_value_4']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_5" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_5'])?$info['sitem_no_5']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_5" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_5'])?$info['sitem_ven_5']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_5" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_5'])?$info['sitem_desc_5']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_5" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_5'])?$info['sitem_value_5']:''; ?>" /></td>
            </tr>

               <tr>
            <td width="22%" align="center"> <input type="text" name="sitem_no_6" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_no_6'])?$info['sitem_no_6']:''; ?>" /></td>
            <td width="9%" align="center"> <input type="text" name="sitem_ven_6" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_ven_6'])?$info['sitem_ven_6']:''; ?>" /></td>
            <td width="41%" align="center"> <input type="text" name="sitem_desc_6" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_desc_6'])?$info['sitem_desc_6']:''; ?>" /></td>
            <td width="24%"> <input type="text" name="sitem_value_6" class="accs_amount amount_field" style="display:inline;width:100%;" value="<?php echo isset($info['sitem_value_6'])?$info['sitem_value_6']:'';?>" /></td>
            </tr>
            <tr>
            <td colspan="3"><label>(OTP) Installation Labor</label></td>
             <td width="24%"> <input type="text" name="installation_labor" class="amount_field"  id="installation_labor" style="display:inline;width:100%;" value="<?php echo isset($info['installation_labor'])?$info['installation_labor']:'';?>" /></td>        </tr>
           	 <tr>
             <td colspan="3"><label>Other Accessories W.O #</label></td>
             <td width="24%"> <input type="text" name="other_accs" class="amount_field"  id="other_accs" style="display:inline;width:100%;" value="<?php echo isset($info['other_accs'])?$info['other_accs']:'';?>" /></td>
             </tr>

             <tr>
             <td colspan="3"><label>Delivery</label></td>
             <td width="24%"> <input type="text" name="delivery" class="amount_field"  id="delivery" style="display:inline;width:100%;" value="<?php echo isset($info['delivery'])?$info['delivery']:'';?>" /></td>
             </tr>

              <tr>
             <td colspan="3"><label>Cash Price</label></td>
             <td width="24%"> <input type="text" name="cash_price" class="amount_field"  id="cash_price" style="display:inline;width:100%;" value="<?php echo isset($info['cash_price'])?$info['cash_price']:'';?>" /></td>
             </tr>
              <tr>
             <td colspan="3"><label>NC Sales Tax</label></td>
             <td width="24%"> <input type="text" name="sales_tax" class="amount_field"  id="sales_tax" style="display:inline;width:100%;" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:'';?>" /></td>
             </tr>

              <tr>
             <td colspan="3"><label>HWY Tax</label></td>
             <td width="24%"> <input type="text" name="hwy_tax" class="amount_field"  id="hwy_tax" style="display:inline;width:100%;" value="<?php echo isset($info['hwy_tax'])?$info['hwy_tax']:'';?>" /></td>
             </tr>

              <tr>
             <td colspan="3"><label>Tags/Title/Registration</label></td>
             <td width="24%"> <input type="text" name="doc_fee"  class="amount_field" id="doc_fee" style="display:inline;width:100%;" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:'';?>" /></td>
             </tr>


              <tr>
             <td colspan="3"><label>1. Total Cash Price Delivered</label></td>
             <td width="24%"> <input type="text" name="delivered_cash_price" class="amount_field"  id="delivered_cash_price" style="display:inline;width:100%;" value="<?php echo isset($info['delivered_cash_price'])?$info['delivered_cash_price']:'';?>" /></td>
             </tr>

             <tr>
             <td colspan="3"><label>2. Trade In Payoff</label></td>
             <td width="24%"> <input type="text" name="trade_payoff" class="amount_field"  id="trade_payoff" style="display:inline;width:100%;" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:'';?>" /></td>
             </tr>
              <tr>
             <td colspan="3"><label>3. Total Due</label></td>
             <td width="24%"> <input type="text" name="total_due" class="amount_field"  id="total_due" style="display:inline;width:100%;" value="<?php echo isset($info['total_due'])?$info['total_due']:'';?>" /></td>
             </tr>

             <tr>
             <td colspan="3"><label>4. Trade In Allowance</label></td>
             <td width="24%"> <input type="text" name="trade_allowance" class="amount_field"  id="trade_allowance" style="display:inline;width:100%;" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:'';?>" /></td>
             </tr>

             <tr>
             <td colspan="3"><label>5. Amount Due From Buyer</label></td>
             <td width="24%"> <input type="text" name="buyer_due" class="amount_field"  id="buyer_due" style="display:inline;width:100%;" value="<?php echo isset($info['buyer_due'])?$info['buyer_due']:'';?>" /></td>
             </tr>
              <tr>
             <td colspan="3"><label>6. Paid By Deposit</label></td>
             <td width="24%"> <input type="text" name="paid_deposit" class="amount_field"  id="paid_deposit" style="display:inline;width:100%;" value="<?php echo isset($info['paid_deposit'])?$info['paid_deposit']:'';?>" /></td>
             </tr>
              <tr>
             <td colspan="3"><label>7. Paid By Deposit</label></td>
             <td width="24%"> <input type="text" name="paid_deposit2" class="amount_field"  id="paid_deposit2" style="display:inline;width:100%;" value="<?php echo isset($info['paid_deposit2'])?$info['paid_deposit2']:'';?>" /></td>
             </tr>
              <tr>
             <td colspan="3"><label>8. Balance Due</label></td>
             <td width="24%"> <input type="text" name="amount"   id="amount" style="display:inline;width:100%;" value="<?php echo isset($info['amount'])?$info['amount']:'';?>" /></td>
             </tr>


            </table></td>
            </tr>

           <tr>
           <td valign="middle">
           <label style="width:25%;float:left">&nbsp;&nbsp;Accepted By</label>
           <label  style="width:75%;float:left"><input type="text" class="border_bottom" name="signature"  style="display:inline;width:100%;" value="<?php echo isset($info['signature'])?$info['signature']:'';?>" /><small>Dealer Or Authorized Representative</small></label>
           </td>
           <td>
            <label style="width:75%;float:left"><input type="text" class="border_bottom" name="cust_signature"  style="display:inline;width:100%;" value="<?php echo isset($info['cust_signature'])?$info['cust_signature']:'';?>" /><small>Purchaser's Signature</small></label>
              <label style="width:25%;float:left"><input type="text" name="submit_date" class="border_bottom"  style="display:inline;width:100%;" value="<?php echo isset($info['submit_date'])?$info['submit_date']:'';?>" /><small>Date</small></label>

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

		<input type="hidden" id="tax_percent" name="tax_percent" value="<?php echo isset($info['tax_percent'])?$info['tax_percent']:0; ?>" />






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
function assign_fees(data)
{

	$("#delivery").val(data.freight_fee);
	$("#installation_labor").val(data.prep_fee);
	$("#doc_fee").val(data.doc_fee);
	$("#tax_percent").val(data.tax_fee);
	$("#other_accs").val(data.parts_fee);
	$("#loan_apr").val(data.apr_percentage);
}


function calculate_tax(){
		var highway_tax = 3;
		var tax_value=isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat( $('#tax_percent').val());
		var freight = isNaN(parseFloat( $('#delivery').val()))?0.00:parseFloat( $('#delivery').val());
		var prep = isNaN(parseFloat( $('#installation_labor').val()))?0.00:parseFloat( $('#installation_labor').val());
		var doc = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		var part_fee = isNaN(parseFloat($('#other_accs').val()))?0.00:parseFloat($('#other_accs').val());

		var sell_price = isNaN(parseFloat($('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var sell_price2 = isNaN(parseFloat($('#motor_price').val()))?0.00:parseFloat($('#motor_price').val());
		var sell_price3= isNaN(parseFloat($('#trailer_price').val()))?0.00:parseFloat($('#trailer_price').val());
		sell_price = parseFloat(sell_price+sell_price2+sell_price3);
		$accs_price =0;
		$(".accs_amount").each(function(){
			$accs_price += isNaN(parseFloat( $(this).val()))?0.00:parseFloat($(this).val());
		})
		var amount = freight+prep+part_fee+sell_price+$accs_price;
		amount = isNaN(amount)?0.00:amount;
		$("#cash_price").val(amount.toFixed(2));

		 var sales_tax =  (parseFloat(tax_value)/100)*amount;
		 var hwy_tax =  (parseFloat(highway_tax)/100)*amount;

		 if(sales_tax > 1500)
		 {
			 sales_tax = 1500.00;
		 }
		 $("#sales_tax").val(sales_tax.toFixed(2));
		 $("#hwy_tax").val(hwy_tax.toFixed(2));
		 delivered_cash_price = amount+sales_tax+hwy_tax+doc;
		 $("#delivered_cash_price").val(delivered_cash_price.toFixed(2));

		trade_payoff = 	isNaN(parseFloat($('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		total_due = delivered_cash_price + trade_payoff;

		$("#total_due").val(total_due.toFixed(2));

		$trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat( $('#trade_allowance').val());
		amount_due = total_due - $trade_allowance;
		$("#buyer_due").val(amount_due.toFixed(2));
		$paid_deposit = isNaN(parseFloat( $('#paid_deposit').val()))?0.00:parseFloat( $('#paid_deposit').val());
		$paid_deposit2 = isNaN(parseFloat( $('#paid_deposit2').val()))?0.00:parseFloat( $('#paid_deposit2').val());
		balance_due = amount_due - ($paid_deposit + $paid_deposit2);
		$("#amount").val(balance_due.toFixed(2));


	}


function assign_payment(data_id){
	sell_value=parseFloat($("#amount"+data_id).val());
	sell_value=isNaN(sell_value)?0.00:$.sell_value;


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
					assign_fees(data);
					calculate_tax();

				}
			});
		}
	});

	$(".amount_field").on('change keyup paste',function(){

							calculate_tax();

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

/*
$("#trade_payoff").on('change keyup paste',function(){
			data_id=1;
			$("#less_payoff1").val($(this).val());
			calculate_balance(data_id);
			assign_payment(data_id);
			});
	*/

	$(".loan_apr").on('change keyup paste',function(){
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
