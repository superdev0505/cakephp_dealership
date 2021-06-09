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
/*height : 24px!important;*/
border:none;
border-bottom:1px solid #000;

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
                
                
                <table width="100%" cellpadding="5">
                <tr>
                <td width="30%"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/faribault-hd-logo.png'); ?>" /></td>
                <td width="20%"><img src="<?php echo ('/app/webroot/img/hd_logo.png'); ?>" /></td>
              <td width="50%">
              <h1>Faribault Harley-Davidson</h1>
              <h4>2704 W. Airport Drive, Faribault, MN 55021</h4>
              <h4>507-334-5130  Faribaulthd.com</h4>             
              </td>
              </tr>
              <tr>
              
              <td colspan="3">
              	<label style="width:60%;float:left;">Salesperson &nbsp;<input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width:80%;" /></label>
                <label style="width:40%;float:left;">Date &nbsp;<input type="text" name="submi_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width:80%;" /></label>
              </td>
              
              </tr>
              
               <tr>              
              <td colspan="3">
              	<label style="width:50%;float:left;">Buyer &nbsp;<input type="text" name="name" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" style="width:86%;" /></label>
                <label style="width:50%;float:left;">Co-Buyer &nbsp;<input type="text" name="co_buyer_name" value="<?php echo isset($info['co_buyer_name'])?$info['co_buyer_name']:$info['spouse_first_name'].' '.$info['last_first_name']; ?>" style="width:80%;" /></label>
              </td>              
              </tr>
              
                <tr>              
              <td colspan="3">
              	<label style="width:65%;float:left;">Address &nbsp;<input type="text" name="address" value="<?php echo $info['address']; ?>" style="width:80%;" /></label>
                <label style="width:35%;float:left;padding-top:8px;">Co-Buyer same  address?&nbsp;&nbsp;&nbsp;<input type="radio" name="same_cobuyer_address" value="yes" <?php echo (isset($info['same_cobuyer_address']) && $info['same_cobuyer_address'] == 'yes')?'checked="checked"':''; ?> />&nbsp; Yes &nbsp;&nbsp;<input type="radio" name="same_cobuyer_address" value="no" <?php echo (isset($info['same_cobuyer_address']) && $info['same_cobuyer_address'] == 'no')?'checked="checked"':''; ?> />&nbsp; No</label>
              </td>              
              </tr>
              
                <tr>              
              <td colspan="3">
              	<label style="width:28%;float:left;">City &nbsp;<input type="text" name="city" value="<?php echo $info['city']; ?>" style="width:86%;" /></label>
                <label style="width:22%;float:left;">County &nbsp;<input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width:72%;" /></label>
                
                <label style="width:10%;float:left;">State &nbsp;<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width:41%;" /></label>
                <label style="width:20%;float:left;">Zip &nbsp;<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width:75%;" /></label>
                <label style="width:20%;float:left;">DOB &nbsp;<input type="text" name="dob" value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width:75%;" /></label>
                
              </td>              
              </tr>
              
               <tr>              
              <td colspan="3">
              	<label style="width:33%;float:left;">DL# &nbsp;<input type="text" name="dl_no" value="<?php echo isset($info['dl_no'])?$info['dl_no']:''; ?>" style="width:86%;" /></label>
                <label style="width:33%;float:left;">Home# &nbsp;<input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width:74%;" /></label>
                <label style="width:33%;float:left;">Other# &nbsp;<input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width:74%;" /></label>
              </td>              
              </tr>
              
              <tr>
              <td colspan="3" align="center" valign="middle">
              <label>MSRP &nbsp;<input type="text" name="unit_value" id="unit_value" value="<?php echo $info['unit_value']; ?>" /></label>
              <label style="width:30%;float:right;" class="noprint">Fixed Fee &nbsp;&nbsp;<?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options",
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
						?></label>
              </td>
              </tr>
              <tr>
              <td colspan="3">
              <table width="100%;">
             	 <tr>
                 <td width="60%">
                 	<h4>Purchase Information</h4>	
                 </td>
                 <td width="22%">
                 	<label>Selling Price</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="selling_price" class="amount_field" id="selling_price" value="<?php echo isset($info['selling_price'])?$info['selling_price']:$info['unit_value']; ?>" />
                 </td>
                 </tr>
                 
                 <tr>
                 <td width="60%">
                 <label style="width:35%;float:left;">Stock# &nbsp;<input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" style="width:70%;" /></label>
                 <label style="width:65%;float:left;">VIN &nbsp;<input type="text" name="vin" value="<?php echo $info['vin']; ?>" style="width:86%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>Total Allowance</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="total_allowance" class="amount_field" id="total_allowance" value="<?php echo isset($info['total_allowance'])?$info['total_allowance']:''; ?>" />
                 </td>
                 </tr>
                 
                 <tr>
                 <td width="60%">
                 <label style="width:20%;float:left;">Year &nbsp;<input type="text" name="year" value="<?php echo $info['year']; ?>" style="width:55%;" /></label>
                 <label style="width:35%;float:left;">Make &nbsp;<input type="text" name="make" value="<?php echo $info['make']; ?>" style="width:78%;" /></label>
                  <label style="width:45%;float:left;">Model &nbsp;<input type="text" name="model" value="<?php echo $info['model']; ?>" style="width:80%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>Total</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="total_price" class="amount_field" id="total_price" value="<?php echo isset($info['total_price'])?$info['total_price']:' '; ?>" />
                 </td>
                 </tr>
                 
				 <tr>
                 <td width="60%">
                 <label style="width:50%;float:left;">Color &nbsp;<input type="text" name="color" value="<?php echo $info['color']; ?>" style="width:75%;" /></label>
                 <label style="width:50%;float:left;">Mileage &nbsp;<input type="text" name="odometer" value="<?php echo $info['odometer']; ?>" style="width:78%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>Tax</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="sales_tax" id="sales_tax" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" />
                 </td>
                 </tr>
                 
                  <tr>
                 <td width="60%">
                 	<h4>Trade Information</h4>	
                 </td>
                 <td width="22%">
                 	<label>Doc & Licence </label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="doc_fee" class="amount_field" id="doc_fee" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" />
                 </td>
                 </tr>
                 
                  <tr>
                 <td width="60%">
                 <label style="width:35%;float:left;">Stock# &nbsp;<input type="text" name="trade_stock_num" value="<?php echo isset($info['trade_stock_num'])?$info['trade_stock_num']:''; ?>" style="width:70%;" /></label>
                 <label style="width:65%;float:left;">VIN &nbsp;<input type="text" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" style="width:86%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>Sub Total</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="subtotal" class="amount_field" id="subtotal" value="<?php echo isset($info['subtotal'])?$info['subtotal']:''; ?>" />
                 </td>
                 </tr> 
                 
                   <tr>
                 <td width="60%">
                 <label style="width:20%;float:left;">Year &nbsp;<input type="text" name="year_trade" value="<?php echo $info['year_trade']; ?>" style="width:55%;" /></label>
                 <label style="width:35%;float:left;">Make &nbsp;<input type="text" name="make_trade" value="<?php echo $info['make_trade']; ?>" style="width:78%;" /></label>
                  <label style="width:45%;float:left;">Model &nbsp;<input type="text" name="model_trade" value="<?php echo $info['model_trade']; ?>" style="width:80%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>Pay Off</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="est_payoff" class="amount_field" id="est_payoff" value="<?php echo isset($info['est_payoff'])?$info['est_payoff']:' '; ?>" />
                 </td>
                 </tr>
                 
                  <tr>
                 <td width="60%">
                 <label style="width:50%;float:left;">Color &nbsp;<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" style="width:75%;" /></label>
                 <label style="width:50%;float:left;">Mileage &nbsp;<input type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>" style="width:78%;" /></label>
                 
                 </td>
                 <td width="22%">
                 	<label>After Sale</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="after_sale" class="amount_field" id="after_sale" value="<?php echo isset($info['after_sale'])?$info['after_sale']:''; ?>" />
                 </td>
                 </tr>
                 
                 <tr>
                 <td>&nbsp;</td>
                  <td width="22%">
                 	<label>ESP</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="esp_value" class="amount_field" id="esp_value" value="<?php echo isset($info['esp_value'])?$info['esp_value']:''; ?>" />
                 </td>
                 
                 </tr>
                 
                  <tr>
                 <td><label>Payoff on trade? &nbsp;&nbsp;<input type="radio" name="payoff_on_trade" value="yes" <?php echo (isset($info['payoff_on_trade']) && $info['payoff_on_trade'] =='yes')?'checked="checked"':''; ?>  /> &nbsp; Yes&nbsp;&nbsp;<input type="radio" name="payoff_on_trade" value="no" <?php echo (isset($info['payoff_on_trade']) && $info['payoff_on_trade'] =='no')?'checked="checked"':''; ?>  /> &nbsp; No</label></td>
                  <td width="22%">
                 	<label>Down Payment</label>
                 </td>
                 <td width="28%">
                 $<input type="text" name="down_payment" class="amount_field" id="down_payment" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" />
                 </td>
                 
                 </tr>
                 
                 <tr>
                 <td>
                 <label style="width:100%;">Lender &nbsp;&nbsp;<input type="text" name="lender" value="<?php echo isset($info['lender'])?$info['lender']:''; ?>" style="width:80%;" /></label>
                 </td>
                 
                 <td><strong>Balance Due</strong></td>
                 <td>$<input type="text" name="amount" id="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" /></td>
                 </tr>             
                 
              </table>
              </td>
              </tr>
              <tr>
              <td colspan="3">&nbsp;</td>
              </tr>
               <tr>
              <td colspan="3">&nbsp;</td>
              </tr>
               <tr>
              <td colspan="3"><label>Notes</label>
              	<textarea name="notes" style="width:100%" rows="6"><?php echo isset($info['notes'])?$info['notes']:''; ?></textarea>
              </td>
              </tr>
                  <tr>
                  <td colspan="3">
                  &nbsp;
                  </td>
                  </tr>
              <tr>
              <td colspan="3">
              <p>
              I hereby indicate my intent to purchase a motorcycle. I have available, or can obtain sufficent fubds to complete the transaction.<br/>
              I authorize the dealer representative to investigate my credit and employment history to evaluate my ability to purchase the above referred motorcycles. I am also aware that the motorcycle deposits are non-refundable.
              </p>
              
              </td>
              </tr>
              <tr>
              <td colspan="3">
              <label style="width:65%;float:left;">Dealer Signature &nbsp;<input type="text" name="dealer_signature" style="width:70%;" /> </label>
              
              <label style="width:35%;float:left;">Date &nbsp;<input type="text" name="sig_date" style="width:70%;" /> </label>
              
              </td>
              </tr>
              <tr>
              <td colspan="3">
              <label style="width:65%;float:left;">Customer Signature &nbsp;<input type="text" name="customer_signature" style="width:69%;" /> </label>
              
              <label style="width:35%;float:left;">Date &nbsp;<input type="text" name="cust_date" style="width:70%;" /> </label>
              
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

function assign_fees(data)
{
	
	$("#freight_fee").val(data.freight_fee);
	$("#prep_fee").val(data.prep_fee);
	$("#doc_fee").val(data.doc_fee);
	$("#tax_percent").val(data.tax_fee);
	
}


$(document).ready(function(){

	
	$('#fixed_fee_options').change(function(){
		
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




function calculate_tax(){
		

		var tax_value=isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat( $('#tax_percent').val());
		var doc = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());		
		var sell_price = isNaN(parseFloat( $('#selling_price').val()))?0.00:parseFloat($('#selling_price').val());
		var total_allowance = isNaN(parseFloat( $('#total_allowance').val()))?0.00:parseFloat($('#total_allowance').val());
		var est_payoff =  isNaN(parseFloat( $('#est_payoff').val()))?0.00:parseFloat($('#est_payoff').val());
		
		var after_sale =  isNaN(parseFloat( $('#after_sale').val()))?0.00:parseFloat($('#after_sale').val());
		
		var esp_value = isNaN(parseFloat( $('#esp_value').val()))?0.00:parseFloat($('#esp_value').val());
		
		var down_payment = isNaN(parseFloat( $('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
		
		
		$total_price = sell_price- total_allowance;
		$('#total_price').val($total_price.toFixed());		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*$total_price;		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:parseFloat(amountIncludingTax);
		$('#sales_tax').val( amountIncludingTax );
		actual_balance =$total_price + doc + amountIncludingTax;
		actual_balance = isNaN(actual_balance)?0.00:parseFloat(actual_balance);
		$('#subtotal').val( actual_balance);
		amount = actual_balance + esp_value + after_sale + est_payoff;
		amount  = amount  - down_payment;		
		$("#amount").val(amount);	
		
	}

	
	
	


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
