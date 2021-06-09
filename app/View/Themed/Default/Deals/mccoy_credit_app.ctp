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

<div class="wraper main" id="worksheet_wraper"  style="overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px; height:1056 margin:0 auto;">
		<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}
.text_captialize{
	text-transform:capitalize;
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
.print_month
	{
		display:none;
	}
	
table.main_width td,table.mid_width td
{
	padding:6px;
}
.back-color{background:#ccc!important;padding:8px;border: 1px solid #000;text-align:center;}

body{-webkit-print-color-adjust:exact;}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }

	.print_month
	{
		display:block;
	}


input[type="text"]{
height : 17px!important;
border:0px!important;
}

table.main_width
{
	width:1010px!important;
}
table.mid_width
{
	width:918px!important;
}
table.set_padding td
{
	padding: 1px 2px 0px 7px;!important;
	
}

td
{
	font-size:11px!important;
}
input[type="text"]
{
border-bottom: 1px solid #000!important;

}
span.zero_padding,div.zero_padding
{
	padding:0px!important;
}

 @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 7mm 7mm 1mm 7mm ;  /* this affects the margin in the printer settings */
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
		<div class="wraper header"> 
        
         
          <table class="main_width set_padding" style="width:100%">
          <tr>
          <td width="60%">
          <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/dealer_logo.png'); ?>" style="width:585px;height:133px;" />
          </td>
          <td >
          	<h2 style="font-size:34px;">CREDIT APPLICATION</h2>
             <label style="font-size:17px;">9622 NE Vancouver Way Portland, OR 97211<br/>
          (503) 283-0345 • Fax 503-978-8138
          <br/>
          </label><br/><br/>
        
          &nbsp;
          </td>
          </tr>
         <tr>
         <td colspan="2" align="center">
         <p>Please complete and fax to 503-978-8138 or e-mail to Finance@pdxftl.com</p>
         </td>
         </tr>
         <tr>
         <td colspan="2">
         <label style="float:left;width:40%;display:inline">Interested In &nbsp;<input type="radio" name="condition" value="new" <?php echo (isset($info['condition']) && $info['condition'] == 'new')?$info['condition']:''; ?> />&nbsp; New &nbsp;&nbsp;<input type="radio" name="condition" value="used" <?php echo (isset($info['condition']) && $info['condition'] == 'used')?$info['condition']:''; ?> />&nbsp; Used  </label>
         <label style="float:right;width:40%;display:inline">Salesperson you are working with &nbsp;<input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width:44%" /></label>
         </td>
         </tr>
         
          
          </table> 
<table class="main_width set_padding" width="100%">
<tr><td><h4>Business Information<label style="float:right;">Your Email &nbsp;<input type="text" name="email"  value="<?php echo $info['email']; ?>" style="width:300px;" /></label></h4>

</td></tr>
<tr>
<td><label style="width:44%;float:left;">LLC &nbsp;<input type="radio" name="business_type" value="LLC" <?php echo (isset($info['business_type']) && $info['business_type']=='LLC')?'checked="checked"':''; ?>  />&nbsp;&nbsp;Sole Proprietorship &nbsp;<input type="radio" name="business_type" value="Sole Proprietorship" <?php echo (isset($info['business_type']) && $info['business_type']=='Sole Proprietorship')?'checked="checked"':''; ?>  />
&nbsp;&nbsp;Corporation &nbsp;<input type="radio" name="business_type" value="Corporation" <?php echo (isset($info['business_type']) && $info['business_type']=='Corporation')?'checked="checked"':''; ?>  />
</label>
<label style="width:28%;float:left;">Tax ID &nbsp;<input type="text" name="tax_id"  value="<?php echo isset($info['tax_id'])?$info['tax_id']:''; ?>" style="width:70%;" /></label>
<label style="width:28%;float:left;">USDOT# &nbsp;<input type="text" name="usdot_no"  value="<?php echo isset($info['usdot_no'])?$info['usdot_no']:''; ?>" style="width:75%;" /></label>

</td>
</tr>
<tr>
<td>
<label style="width:60%;float:left">Company Name &nbsp;<input type="text" name="company_work" value="<?php echo isset($info['company_work'])?$info['company_work']:''; ?>" style="width:70%;"  /></label>
<label style="width:40%;float:left;">Date Formed&nbsp;<input type="text" name="date_formed"  value="<?php echo isset($info['date_formed'])?$info['date_formed']:''; ?>" style="width:75%;" /></label>
</td>
</tr>
<tr>
<td>
<label style="width:50%;float:left">Business Address &nbsp;<input type="text" name="business_address" value="<?php echo isset($info['business_address'])?$info['business_address']:''; ?>" style="width:67%;"  /></label>
<label style="width:19%;float:left;">City&nbsp;<input type="text" name="business_city"  value="<?php echo isset($info['business_city'])?$info['business_city']:''; ?>" style="width:80%;" /></label>
<label style="width:12%;float:left;">State&nbsp;<input type="text" name="business_state"  value="<?php echo isset($info['business_state'])?$info['business_state']:''; ?>" style="width:58%;" /></label>
<label style="width:19%;float:left;">Zip&nbsp;<input type="text" name="business_zip"  value="<?php echo isset($info['business_zip'])?$info['business_zip']:''; ?>" style="width:75%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">Business Phone &nbsp;<input type="text" name="business_phone" value="<?php echo isset($info['business_phone'])?$info['business_phone']:''; ?>" style="width:75%;"  /></label>
<label style="width:50%;float:left;">Business Fax&nbsp;<input type="text" name="business_fax"  value="<?php echo isset($info['business_fax'])?$info['business_fax']:''; ?>" style="width:80%;" /></label>
</td>
</tr>
<tr>
<td>
<label style="width:35%;float:left"># of Trucks Owned &nbsp;<input type="text" name="no_of_trucks_owned" value="<?php echo isset($info['no_of_trucks_owned'])?$info['no_of_trucks_owned']:''; ?>" style="width:42%;"  /></label>
<label style="width:35%;float:left;">#  of Trailers Owned&nbsp;<input type="text" name="no_of_trailers_owned"  value="<?php echo isset($info['no_of_trailers_owned'])?$info['no_of_trailers_owned']:''; ?>" style="width:42%;" /></label>
<label style="width:30%;float:left;"># of Vans Owned&nbsp;<input type="text" name="no_of_vans_owned"  value="<?php echo isset($info['no_of_vans_owned'])?$info['no_of_vans_owned']:''; ?>" style="width:42%;" /></label>
</td>
</tr>
<tr><td><h4>Owner Information</h4></td></tr>

<tr>
<td>
<label style="width:50%;float:left">Principal Owner &nbsp;<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width:60%;"  /></label>
<label style="width:30%;float:left;">Title&nbsp;<input type="text" name="title"  value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Percentage Owned&nbsp;<input type="text" name="percentage_owned"  value="<?php echo isset($info['percentage_owned'])?$info['percentage_owned']:''; ?>" style="width:30%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:60%;float:left">Social Security &nbsp;<input type="text" name="social_security" value="<?php echo isset($info['social_security'])?$info['social_security']:''; ?>" style="width:70%;"  /></label>
<label style="width:40%;float:left;">D.O.B&nbsp;<input type="text" name="dob"  value="<?php echo isset($info['dob'])?$info['dob']:''; ?>" style="width:80%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">Drivers Lic. Number &nbsp;<input type="text" name="driving_lic_no" value="<?php echo isset($info['driving_lic_no'])?$info['driving_lic_no']:''; ?>" style="width:60%;"  /></label>
<label style="width:30%;float:left;">State&nbsp;<input type="text" name="lic_state"  value="<?php echo isset($info['lic_state'])?$info['lic_state']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Exp. Date&nbsp;<input type="text" name="lic_expiry_date"  value="<?php echo isset($info['lic_expiry_date'])?$info['lic_expiry_date']:''; ?>" style="width:50%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:100%;float:left">Address&nbsp;<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width:85%;"  /></label>

</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">City&nbsp;<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width:75%;"  /></label>
<label style="width:30%;float:left;">State&nbsp;<input type="text" name="state"  value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Zip&nbsp;<input type="text" name="zip"  value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width:60%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:40%;float:left">At Current Address for&nbsp;<input type="text" name="current_address_yr" value="<?php echo isset($info['current_address_yr'])?$info['current_address_yr']:''; ?>" style="width:60px;"  /> Yrs. &nbsp; &nbsp; <input type="text" name="current_address_months" value="<?php echo isset($info['current_address_months'])?$info['current_address_months']:''; ?>" style="width:60px;"  /> Months  </label>
<label style="width:25%;float:left;"><input type="radio" name="address_type"  value="Rent" <?php echo (isset($info['address_type']) && $info['address_type'] == 'Rent')?'checked="checked"':''; ?> /> &nbsp;Rent &nbsp;&nbsp;
<input type="radio" name="address_type"  value="Own" <?php echo (isset($info['address_type']) && $info['address_type'] == 'Own')?'checked="checked"':''; ?> /> &nbsp;Own
</label>
<label style="width:35%;float:left;">Contact Phone&nbsp;<input type="text" name="phone"  value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" style="width:60%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">Time in Business&nbsp;<input type="text" name="time_in_business" value="<?php echo isset($info['time_in_business'])?$info['time_in_business']:''; ?>" style="width:60%;"  /></label>
<label style="width:50%;float:left;">Time in Industry&nbsp;<input type="text" name="time_in_industry"  value="<?php echo isset($info['time_in_industry'])?$info['time_in_industry']:''; ?>" style="width:65%;" /></label>

</td>
</tr>


<tr>
<td>
<label style="width:50%;float:left">Additional Owner &nbsp;<input type="text" name="additional_owner" value="<?php echo isset($info['additional_owner'])?$info['additional_owner']:''; ?>" style="width:60%;"  /></label>
<label style="width:30%;float:left;">Title&nbsp;<input type="text" name="title2"  value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Percentage Owned&nbsp;<input type="text" name="percentage_owned2"  value="<?php echo isset($info['percentage_owned2'])?$info['percentage_owned2']:''; ?>" style="width:30%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:60%;float:left">Social Security &nbsp;<input type="text" name="social_security2" value="<?php echo isset($info['social_security2'])?$info['social_security2']:''; ?>" style="width:70%;"  /></label>
<label style="width:40%;float:left;">D.O.B&nbsp;<input type="text" name="dob2"  value="<?php echo isset($info['dob2'])?$info['dob2']:''; ?>" style="width:80%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">Drivers Lic. Number &nbsp;<input type="text" name="driving_lic_no2" value="<?php echo isset($info['driving_lic_no2'])?$info['driving_lic_no2']:''; ?>" style="width:60%;"  /></label>
<label style="width:30%;float:left;">State&nbsp;<input type="text" name="lic_state2"  value="<?php echo isset($info['lic_state2'])?$info['lic_state2']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Exp. Date&nbsp;<input type="text" name="lic_expiry_date2"  value="<?php echo isset($info['lic_expiry_date2'])?$info['lic_expiry_date2']:''; ?>" style="width:50%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:100%;float:left">Address&nbsp;<input type="text" name="address_line2" value="<?php echo isset($info['address_line2'])?$info['address_line2']:''; ?>" style="width:85%;"  /></label>

</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">City&nbsp;<input type="text" name="city2" value="<?php echo isset($info['city2'])?$info['city2']:''; ?>" style="width:75%;"  /></label>
<label style="width:30%;float:left;">State&nbsp;<input type="text" name="state2"  value="<?php echo isset($info['state2'])?$info['state2']:''; ?>" style="width:60%;" /></label>
<label style="width:20%;float:left;">Zip&nbsp;<input type="text" name="zip2"  value="<?php echo isset($info['zip2'])?$info['zip2']:''; ?>" style="width:60%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:40%;float:left">At Current Address for&nbsp;<input type="text" name="current_address_yr2" value="<?php echo isset($info['current_address_yr2'])?$info['current_address_yr2']:''; ?>" style="width:60px;"  /> Yrs. &nbsp; &nbsp; <input type="text" name="current_address_months2" value="<?php echo isset($info['current_address_months2'])?$info['current_address_months2']:''; ?>" style="width:60px;"  /> Months  </label>
<label style="width:25%;float:left;"><input type="radio" name="address_type2"  value="Rent" <?php echo (isset($info['address_type2']) && $info['address_type2'] == 'Rent')?'checked="checked"':''; ?> /> &nbsp;Rent &nbsp;&nbsp;
<input type="radio" name="address_type2"  value="Own" <?php echo (isset($info['address_type2']) && $info['address_type2'] == 'Own')?'checked="checked"':''; ?> /> &nbsp;Own
</label>
<label style="width:35%;float:left;">Contact Phone&nbsp;<input type="text" name="phone2"  value="<?php echo isset($info['phone2'])?$info['phone2']:''; ?>" style="width:60%;" /></label>
</td>
</tr>

<tr>
<td>
<label style="width:50%;float:left">Time in Business&nbsp;<input type="text" name="time_in_business2" value="<?php echo isset($info['time_in_business2'])?$info['time_in_business2']:''; ?>" style="width:60%;"  /></label>
<label style="width:50%;float:left;">Time in Industry&nbsp;<input type="text" name="time_in_industry2"  value="<?php echo isset($info['time_in_industry2'])?$info['time_in_industry2']:''; ?>" style="width:65%;" /></label>

</td>
</tr>



<tr><td><h4>Haul References / Employment History (5 Years)</h4></td></tr>


<tr><td>
<label style="width:50%;float:left">Company Name&nbsp;<input type="text" name="company_name" value="<?php echo isset($info['company_name'])?$info['company_name']:''; ?>" style="width:70%;"  /></label>
<label style="width:50%;float:left;">How Long?&nbsp;<input type="text" name="how_long_yrs"  value="<?php echo isset($info['how_long_yrs'])?$info['how_long_yrs']:''; ?>" style="width:70px;" />Yrs &nbsp;&nbsp;
<input type="text" name="how_long_months"  value="<?php echo isset($info['how_long_months'])?$info['how_long_months']:''; ?>" style="width:70px;" />Months
</label>
</td></tr>

<tr>
<td>
<label style="width:50%;float:left">Contact&nbsp;<input type="text" name="employer_contact" value="<?php echo isset($info['employer_contact'])?$info['employer_contact']:''; ?>" style="width:60%;"  /></label>
<label style="width:50%;float:left;">Phone&nbsp;<input type="text" name="employer_phone"  value="<?php echo isset($info['employer_phone'])?$info['employer_phone']:''; ?>" style="width:65%;" /></label>
</td>
</tr>


<tr><td>
<label style="width:50%;float:left">Company Name&nbsp;<input type="text" name="company_name2" value="<?php echo isset($info['company_name2'])?$info['company_name2']:''; ?>" style="width:70%;"  /></label>
<label style="width:50%;float:left;">How Long?&nbsp;<input type="text" name="how_long_yrs2"  value="<?php echo isset($info['how_long_yrs2'])?$info['how_long_yrs2']:''; ?>" style="width:70px;" />Yrs &nbsp;&nbsp;
<input type="text" name="how_long_months2"  value="<?php echo isset($info['how_long_months2'])?$info['how_long_months2']:''; ?>" style="width:70px;" />Months
</label>
</td></tr>

<tr>
<td>
<label style="width:50%;float:left">Contact&nbsp;<input type="text" name="employer_contact2" value="<?php echo isset($info['employer_contact2'])?$info['employer_contact2']:''; ?>" style="width:60%;"  /></label>
<label style="width:50%;float:left;">Phone&nbsp;<input type="text" name="employer_phone2"  value="<?php echo isset($info['employer_phone2'])?$info['employer_phone2']:''; ?>" style="width:65%;" /></label>
</td>
</tr>


<tr><td>
<label style="width:50%;float:left">Company Name&nbsp;<input type="text" name="company_name3" value="<?php echo isset($info['company_name3'])?$info['company_name3']:''; ?>" style="width:70%;"  /></label>
<label style="width:50%;float:left;">How Long?&nbsp;<input type="text" name="how_long_yrs3"  value="<?php echo isset($info['how_long_yrs3'])?$info['how_long_yrs3']:''; ?>" style="width:70px;" />Yrs &nbsp;&nbsp;
<input type="text" name="how_long_months3"  value="<?php echo isset($info['how_long_months3'])?$info['how_long_months3']:''; ?>" style="width:70px;" />Months
</label>
</td></tr>

<tr>
<td>
<label style="width:50%;float:left">Contact&nbsp;<input type="text" name="employer_contact3" value="<?php echo isset($info['employer_contact3'])?$info['employer_contact3']:''; ?>" style="width:60%;"  /></label>
<label style="width:50%;float:left;">Phone&nbsp;<input type="text" name="employer_phone3"  value="<?php echo isset($info['employer_phone3'])?$info['employer_phone3']:''; ?>" style="width:65%;" /></label>
</td>
</tr>


<tr><td><h4>Financial History<br/></h4></td></tr>

<tr>
<td valign="middle">
<label style="width:15%;float:left">Any Repossessions? </label>
<label style="width:12%;float:left;"><input type="radio" name="repossessions"  value="yes" <?php echo (isset($info['repossessions']) && $info['repossessions'] == 'yes')?'checked="checked"':''; ?> /> &nbsp;Yes &nbsp;&nbsp;
<input type="radio" name="repossessions"  value="No" <?php echo (isset($info['repossessions']) && $info['repossessions'] == 'No')?'checked="checked"':''; ?> /> &nbsp;No
</label>
<label style="width:73%;float:left;">If Yes, When&nbsp;<input type="text" name="repossession_yes_when"  value="<?php echo isset($info['repossession_yes_when'])?$info['repossession_yes_when']:''; ?>" style="width:70%;" /></label>
</td>
</tr>

<tr>
<td valign="middle">
<label style="width:15%;float:left">Bankruptcy?</label>
<label style="width:12%;float:left;"><input type="radio" name="bankruptcy"  value="yes" <?php echo (isset($info['bankruptcy']) && $info['bankruptcy'] == 'yes')?'checked="checked"':''; ?> /> &nbsp;Yes &nbsp;&nbsp;
<input type="radio" name="bankruptcy"  value="No" <?php echo (isset($info['bankruptcy']) && $info['bankruptcy'] == 'No')?'checked="checked"':''; ?> /> &nbsp;No
</label>
<label style="width:73%;float:left;">If Yes, When&nbsp;<input type="text" name="bankruptcy_yes_when"  value="<?php echo isset($info['bankruptcy_yes_when'])?$info['bankruptcy_yes_when']:''; ?>" style="width:70%;" /></label>
</td>
</tr>

<tr>
<td valign="middle">
<label style="width:15%;float:left">Tax Liens?</label>
<label style="width:12%;float:left;"><input type="radio" name="tax_liens"  value="yes" <?php echo (isset($info['tax_liens']) && $info['tax_liens'] == 'yes')?'checked="checked"':''; ?> /> &nbsp;Yes &nbsp;&nbsp;
<input type="radio" name="tax_liens"  value="No" <?php echo (isset($info['tax_liens']) && $info['tax_liens'] == 'No')?'checked="checked"':''; ?> /> &nbsp;No
</label>
<label style="width:73%;float:left;">If Yes, When&nbsp;<input type="text" name="tax_liens_yes_when"  value="<?php echo isset($info['tax_liens_yes_when'])?$info['tax_liens_yes_when']:''; ?>" style="width:70%;" /></label>
</td>
</tr>

<tr><td><h4>Credit References<br/></h4></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><label>Equipment Financing & Business Loans (No credit cards). This area must be completed!</label></td></tr>


<tr><td>
<label style="width:60%;float:left">Lender:&nbsp;<input type="text" name="lender" value="<?php echo isset($info['lender'])?$info['lender']:''; ?>" style="width:80%;"  /></label>
<label style="width:20%;float:left;">City:&nbsp;<input type="text" name="lender_city"  value="<?php echo isset($info['lender_city'])?$info['lender_city']:''; ?>" style="width:75%;" /></label>
<label style="width:20%;float:left;">State:&nbsp;<input type="text" name="lender_state"  value="<?php echo isset($info['lender_state'])?$info['lender_state']:''; ?>" style="width:75%;" /></label>

</td></tr>

<tr><td>
<label style="width:50%;float:left">Contact:&nbsp;<input type="text" name="lender_contact" value="<?php echo isset($info['lender_contact'])?$info['lender_contact']:''; ?>" style="width:80%;"  /></label>
<label style="width:25%;float:left;">Phone :&nbsp;<input type="text" name="lender_phone"  value="<?php echo isset($info['lender_phone'])?$info['lender_phone']:''; ?>" style="width:75%;" /></label>
<label style="width:25%;float:left;">Account # :&nbsp;<input type="text" name="lender_account"  value="<?php echo isset($info['lender_account'])?$info['lender_account']:''; ?>" style="width:70%;" /></label>

</td></tr>

<tr><td>
<label style="width:70%;float:left">Equipment:&nbsp;<input type="text" name="lender_equipment" value="<?php echo isset($info['lender_equipment'])?$info['lender_equipment']:''; ?>" style="width:80%;"  /></label>
<label style="width:30%;float:left;">Amount Funded :&nbsp;<input type="text" name="lender_amount"  value="<?php echo isset($info['lender_amount'])?$info['lender_amount']:''; ?>" style="width:62%;" /></label>
</td></tr>


<tr><td>
<label style="width:60%;float:left">Lender:&nbsp;<input type="text" name="lender2" value="<?php echo isset($info['lender2'])?$info['lender2']:''; ?>" style="width:80%;"  /></label>
<label style="width:20%;float:left;">City:&nbsp;<input type="text" name="lender_city2"  value="<?php echo isset($info['lender_city2'])?$info['lender_city2']:''; ?>" style="width:75%;" /></label>
<label style="width:20%;float:left;">State:&nbsp;<input type="text" name="lender_state2"  value="<?php echo isset($info['lender_state2'])?$info['lender_state2']:''; ?>" style="width:75%;" /></label>

</td></tr>

<tr><td>
<label style="width:50%;float:left">Contact:&nbsp;<input type="text" name="lender_contact2" value="<?php echo isset($info['lender_contact2'])?$info['lender_contact2']:''; ?>" style="width:80%;"  /></label>
<label style="width:25%;float:left;">Phone :&nbsp;<input type="text" name="lender_phone2"  value="<?php echo isset($info['lender_phone2'])?$info['lender_phone2']:''; ?>" style="width:75%;" /></label>
<label style="width:25%;float:left;">Account # :&nbsp;<input type="text" name="lender_account2"  value="<?php echo isset($info['lender_account2'])?$info['lender_account2']:''; ?>" style="width:70%;" /></label>

</td></tr>

<tr><td>
<label style="width:70%;float:left">Equipment:&nbsp;<input type="text" name="lender_equipment2" value="<?php echo isset($info['lender_equipment2'])?$info['lender_equipment2']:''; ?>" style="width:80%;"  /></label>
<label style="width:30%;float:left;">Amount Funded :&nbsp;<input type="text" name="lender_amount2"  value="<?php echo isset($info['lender_amount2'])?$info['lender_amount2']:''; ?>" style="width:62%;" /></label>
</td></tr>



<tr><td>
<label style="width:60%;float:left">Lender:&nbsp;<input type="text" name="lender3" value="<?php echo isset($info['lender3'])?$info['lender3']:''; ?>" style="width:80%;"  /></label>
<label style="width:20%;float:left;">City:&nbsp;<input type="text" name="lender_city3"  value="<?php echo isset($info['lender_city3'])?$info['lender_city3']:''; ?>" style="width:75%;" /></label>
<label style="width:20%;float:left;">State:&nbsp;<input type="text" name="lender_state3"  value="<?php echo isset($info['lender_state3'])?$info['lender_state3']:''; ?>" style="width:75%;" /></label>

</td></tr>

<tr><td>
<label style="width:50%;float:left">Contact:&nbsp;<input type="text" name="lender_contact3" value="<?php echo isset($info['lender_contact3'])?$info['lender_contact3']:''; ?>" style="width:80%;"  /></label>
<label style="width:25%;float:left;">Phone :&nbsp;<input type="text" name="lender_phone3"  value="<?php echo isset($info['lender_phone3'])?$info['lender_phone3']:''; ?>" style="width:75%;" /></label>
<label style="width:25%;float:left;">Account # :&nbsp;<input type="text" name="lender_account3"  value="<?php echo isset($info['lender_account3'])?$info['lender_account3']:''; ?>" style="width:70%;" /></label>

</td></tr>

<tr><td>
<label style="width:70%;float:left">Equipment:&nbsp;<input type="text" name="lender_equipment3" value="<?php echo isset($info['lender_equipment3'])?$info['lender_equipment3']:''; ?>" style="width:80%;"  /></label>
<label style="width:30%;float:left;">Amount Funded :&nbsp;<input type="text" name="lender_amount3"  value="<?php echo isset($info['lender_amount3'])?$info['lender_amount3']:''; ?>" style="width:62%;" /></label>
</td></tr>

<tr><td>&nbsp;</td></tr>

<tr><td>
<label style="width:60%;float:left">Insurance Agent Name:&nbsp;<input type="text" name="insurance_agent_name" value="<?php echo isset($info['insurance_agent_name'])?$info['insurance_agent_name']:''; ?>" style="width:65%;"  /></label>
<label style="width:40%;float:left;">Phone :&nbsp;<input type="text" name="agent_phone"  value="<?php echo isset($info['agent_phone'])?$info['agent_phone']:''; ?>" style="width:75%;" /></label>
</td></tr>
<tr><td>
<label style="width:50%;float:left">Term Requested:&nbsp;<input type="text" name="term_requested" value="<?php echo isset($info['term_requested'])?$info['term_requested']:''; ?>" style="width:130px;"  /> / Month</label>
<label style="width:50%;float:left;">Down Payment&nbsp;$<input type="text" name="down_payment"  value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" style="width:70%;" /></label>
</td></tr>
<tr><td>
<p>By Signing below, the undersigned individual, who is either a principal of and/or guarantor of the credit applicant, autho-rizes McCoy Freightliner, it’s assignees and/or designees to review his/her personal credit profile from national credit Bu-reaus. The undersigned individual also authorizes the release of all deposit, borrowing and trade information and certifies that all information provided is true and correct. A copy or fax of this authorization shall be valid as original. Applicant has right to request written reason for denial within 60 days of decline. </p>
</td></tr>
<tr><td><label>Signatures (Required)</label></td></tr>

<tr>
<td>
<label style="width:65%;float:left">   By &nbsp;  <input type="text" class="bottom_border" style="width:88%" /></label>
<label style="width:35%;float:left">DATE &nbsp;<input type="text" class="bottom_border" style="width:65%" />  </label>
</td>
</tr>
<tr>
<td>
<label style="width:65%;float:left">   By &nbsp;  <input type="text" class="bottom_border" style="width:88%" /></label>
<label style="width:35%;float:left">DATE &nbsp;<input type="text" class="bottom_border" style="width:65%" />  </label>
</td>
</tr>

 </table>
 
 
 
  
         
         
          
         
		<!---left1-->
	
        <p align="center" style="padding-top:10px;">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->

		
	<div class="noprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print </button>
		<button class="btn btn-inverse pull-right"  data-dismiss="modal" style="margin-left:5px;" type="button">Close</button>
		
		<?php /*?><select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select><?php */?>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;" >Submit</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	
	
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
