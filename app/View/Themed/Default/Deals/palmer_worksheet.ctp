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
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
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
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
         <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  />	
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
.red-label{color:#FF0000!important;font-weight:700;font-size:16px;-webkit-print-color-adjust:exact;}
body{
  -webkit-print-color-adjust:exact;
}
.red-color{color:#FF0000!important;}
.fet_tire_credit{height:276px;}
.amount-field{width:94%;}
.small-text{font-size:12px;}
.mtop20{margin: 20px 0px 10px;}
.large-checkbox{height:30px;width:30px;}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	table td{padding:0px;}	
	table.padding-table td,td.padding-cell{padding:2px;}
	input[type=text]{border:none;height:18px;}
	input[type=text]{border-bottom: 1px solid #000;}
	.red-label{font-size:13px;}
	span{font-size:10px;}
	p{font-size:9px;}
	.small-text{font-size:7px;}
	.mtop20{margin: 4px 0px 4px!important;}
	strong{font-size:11px;}
	label{font-size:10px;}
	.fet_tire_credit{height:176px;}
	input[type=checkbox]{height:10px;}
	img.kw-log-img{height:50px!important;}
	input[type=checkbox].large-checkbox{height:24px!important;width:24px!important;}
	table.text-table p,table.text-table strong{font-size:14px!important;}
	table.text-table td{padding:8px!important;}
}
</style>

		<div class="wraper header"> 
			<table width="100%">
            <tr>
            <td width="25%" valign="middle"><strong>NEW AND USED</strong></td>
            <td align="center" width="50%">
            <h2 style="text-align:center;">
            <?php $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealer-logo.png';
			echo $this->Html->image( $dealer_logo);
			 ?>           
           </h2>
           </td>
           <td width="25%" valign="middle" align="right"><strong>BUYERS ORDER</strong></td>
           
           </tr>   
          </table>
       
           <table style="width:100%" class="padding-table" border="1">
          <tr>
           <td width="50%">
           <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose1" value="KENWORTH OF INDIANAPOLIS" <?php if(isset($info['dealer_choose1']) && $info['dealer_choose1'] == 'KENWORTH OF INDIANAPOLIS') echo 'checked="checked"'; ?> />
           </td>
           <td width="75%">
           <div><label class="red-label">KENWORTH OF INDIANAPOLIS</label>
           <p>2929 S. HOLT RD.</p>
           <p>INDIANAPOLIS, IN 46241</p>
           <p>(317) 247-8421</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table>
           </td>
           <td width="50%"> <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose2" value="TERRE HAUTE TRUCK CENTER" <?php if(isset($info['dealer_choose2']) && $info['dealer_choose2'] == 'TERRE HAUTE TRUCK CENTER') echo 'checked="checked"'; ?> />
           </td>
           <td width="75%">
           <div><label class="red-label">TERRE HAUTE TRUCK CENTER</label>
           <p>6425 EAST ST. RD 42</p>
           <p>TERRE HAUTE, IN 47803</p>
           <p>(812) 232-0288</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table></td>
           </tr> 
           
           <tr>
           <td width="50%">
           <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose3" value="EVANSVILLE TRUCK CENTER" <?php if(isset($info['dealer_choose3']) && $info['dealer_choose3'] == 'EVANSVILLE TRUCK CENTER') echo 'checked="checked"'; ?> />
           </td>
           <td width="75%">
           <div><label class="red-label">EVANSVILLE TRUCK CENTER</label>
           <p>8516 BAUMGART RD.</p>
           <p>EVANSVILLE, IN 47725</p>
           <p>(812) 867-7411</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table>
           </td>
           <td width="50%"> <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose4" value="FT. WAYNE TRUCK CENTER" <?php if(isset($info['dealer_choose4']) && $info['dealer_choose4'] == 'FT. WAYNE TRUCK CENTER') echo 'checked="checked"'; ?>  />
           </td>
           <td width="75%">
           <div><label class="red-label">FT. WAYNE TRUCK CENTER</label>
           <p>3535 COLISEUM BLVD W</p>
           <p>FT. WAYNE, IN 46808</p>
           <p>(260) 483-6367</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table></td>
           </tr>
           
           <tr>
           <td width="50%">
           <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose5" value="KENWORTH OF DAYTON" <?php if(isset($info['dealer_choose5']) && $info['dealer_choose5'] == 'KENWORTH OF DAYTON') echo 'checked="checked"'; ?> />
           </td>
           <td width="75%">
           <div><label class="red-label">KENWORTH OF DAYTON</label>
           <p>7740 CENTER POINT 70 BLVD.</p>
           <p>DAYTON, OH 45424 </p>
           <p>(937) 235-2589</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table>
           </td>
           <td width="50%"> <table width="100%">
           <tr>
           <td width="10%" valign="top">
           <input type="checkbox" class="large-checkbox" name="dealer_choose6" value="KENWORTH OF INDIANAPOLIS" <?php if(isset($info['dealer_choose6']) && $info['dealer_choose6'] == 'KENWORTH OF INDIANAPOLIS') echo 'checked="checked"'; ?> />
           </td>
           <td width="75%">
           <div><label class="red-label">KENWORTH OF CINCINNATI</label>
           <p>65 PARTNERSHIP WAY</p>
           <p>CINCINNATI,OH 45241</p>
           <p>(513) 771-5831</p>
           </div>
           </td>
           <td width="10%"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/kenworth_logo.png',array('class'=>'kw-log-img')); ?></td>
           </tr>           
           </table></td>
           </tr>        
           </table>
           
          <table width="100%"  >
          <tr>
          <td width="100%">
          <span>Purchaser&nbsp;</span><input type="text" style="width:60%" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" />
          <span>&nbsp;Date&nbsp;</span>
          <input type="text" name="submit_date" style="width:23%;" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" />          
          </td>
          </tr>
          <tr>
          <td width="100%">
          <span>Address &nbsp;</span>
          <input type="text" name="address" style="width:28%;" value="<?php echo $info['address']; ?>" />
          <span>&nbsp;City &nbsp;</span>
          <input type="text" name="city" style="width:18%;" value="<?php echo $info['city']; ?>" />
           <span>&nbsp;State &nbsp;</span>
          <input type="text" name="state" style="width:11%;" value="<?php echo $info['state']; ?>" />
           <span>&nbsp;Zip &nbsp;</span>
          <input type="text" name="zip" style="width:14%;" value="<?php echo $info['zip']; ?>" />
          </td>          
          </tr>
          
          <tr>
          <td width="100%">
           <span>County &nbsp;</span>
          <input type="text" name="county" style="width:23%;" value="<?php echo $info['county']; ?>" />
           <span>&nbsp;Telephone No &nbsp;</span>
          <input type="text" name="phone" style="width:22%;" value="<?php echo $info['phone']; ?>" />
          <span>&nbsp;Mobile &nbsp;</span>
          <input type="text" name="mobile" style="width:22%;" value="<?php echo $info['mobile']; ?>" />
          
          </td>
          </tr>
          
          <tr>
          <td width="100%">
          <span>ICC Or DOT # &nbsp;</span>
          <input type="text" name="dot_no" style="width:35%;" value="<?php echo isset($info['dot_no'])?$info['dot_no']:''; ?>" />
          <span>&nbsp;Email &nbsp;</span>
           <input type="text" name="email" style="width:42%;" value="<?php echo $info['email']; ?>" />
          </td>
          </tr>
          <tr>
          <td width="100%">
          <span>Stock # &nbsp;</span>
           <input type="text" name="stock_num" style="width:8%;" value="<?php echo $info['stock_num']; ?>" />
          <span>&nbsp;Year &nbsp;</span>
           <input type="text" name="year" style="width:7%;" value="<?php echo $info['year']; ?>" />
           <span>&nbsp;Mkae &nbsp;</span>
           <input type="text" name="make" style="width:17%;" value="<?php echo $info['make']; ?>" />
           <span>&nbsp;Model &nbsp;</span>
           <input type="text" name="model" style="width:18%;" value="<?php echo $info['model']; ?>" />
           <span>&nbsp;Engine &nbsp;</span>
           <input type="text" name="engine" style="width:9%;" value="<?php echo $info['engine']; ?>" />
          </td>
          </tr>
          <tr>
          <td width="100%">
          <span>Serial # &nbsp;</span>
           <input type="text" name="serial_num" style="width:32%;" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>" />
            <span>&nbsp;Description &nbsp;</span>
            <input type="text" name="description" style="width:45%;" value="<?php echo isset($info['description'])?$info['description']:''; ?>" />
           
          </td>
          </tr> 
          
          
          </table> 
          <table width="100%" border="1">
          
          <tr class="noprint">
          <td colspan="3">
          <span style="float:right;">Fixed Fee</span>
           
          </td>
          
          <td width="20%">
         <?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0'
						));
						?>
          </td>
          </tr>
           <tr>
		<td colspan="3">
           <span style="float:right;">Unit Value</span>
         </td> 
           
          <td width="20%">
          $<input type="text" name="unit_value" id="unit_value" class="amount-field" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" />
          </td>
          </tr>
          <tr>
          <td colspan="3">
          <input class="" type="text" style="width:100%"  name="accs_name1" value="<?php echo isset($info['accs_name1'])?$info['accs_name1']:''; ?>" />
         </td>
          <td width="20%">
          $<input class="amount-field accs-price" type="text" id ="amount1" name="amount1" value="<?php echo isset($info['amount1'])?$info['amount1']:''; ?>" />
          </td>
          </tr>
          <tr>
          <td colspan="3">
          <input class="" type="text" style="width:100%"  name="accs_name2" value="<?php echo isset($info['accs_name2'])?$info['accs_name2']:''; ?>" />
         </td>
          <td width="20%">
          $<input type="text" id ="amount2" name="amount2" class="amount-field accs-price" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" />
          </td>
          </tr>
          
          <tr>
          <td colspan="3">
          <input class="" type="text" style="width:100%"  name="accs_name3" value="<?php echo isset($info['accs_name3'])?$info['accs_name3']:''; ?>" />
         </td>
          <td width="20%">
          $<input type="text" name="amount3" id ="amount3" class="amount-field accs-price" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" />
          </td>
          </tr>
          <tr>
          <td colspan="3">
          <input class="" type="text" style="width:100%"  name="accs_name4" value="<?php echo isset($info['accs_name4'])?$info['accs_name4']:''; ?>" />
          </td>
          <td width="20%">
          $<input type="text" id ="amount4" name="amount4" class="amount-field accs-price" value="<?php echo isset($info['amount4'])?$info['amount4']:''; ?>" />
          </td>
          </tr>
           <tr>
          	<td colspan="3">
          <input class="" type="text" style="width:100%"  name="accs_name5" value="<?php echo isset($info['accs_name5'])?$info['accs_name5']:''; ?>" />
         	</td>
          <td width="20%">
          $<input type="text" name="amount5" id ="amount5" class="amount-field accs-price" value="<?php echo isset($info['amount5'])?$info['amount5']:''; ?>" />
          </td>
          </tr>
           <tr>
          	<td colspan="3">
          	<span>FET Tire Credit</span>
         	</td>
          <td width="20%">
          $<input type="text" name="amount6" id ="amount6" class="amount-field accs-price" value="<?php echo isset($info['amount6'])?$info['amount6']:''; ?>" />
          </td>
          </tr>
          <tr>
          
          <td width="30%"><strong>GROSS TRADE ALLOWANCE </strong></td>
          <td width="20%"> $<input type="text" name="trade_value" id="trade_value" class="amount-field" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" /></td>
          <td width="30%"><input class="" type="text" style="width:100%"  name="accs_name7" value="<?php echo isset($info['accs_name7'])?$info['accs_name7']:''; ?>" /></td>
          <td width="20%"> $<input type="text" id ="amount7" name="amount7" class="amount-field accs-price" value="<?php echo isset($info['amount7'])?$info['amount7']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td width="30%"><strong>BALANCE OWED </strong></td>
          <td width="20%"> $<input type="text" name="balance_owed" id="balance_owed" class="amount-field" value="<?php echo isset($info['balance_owed'])?$info['balance_owed']:''; ?>" /></td>
          <td width="30%"><input class="" type="text" style="width:100%"  name="accs_name8" value="<?php echo isset($info['accs_name8'])?$info['accs_name8']:''; ?>" /></td>
          <td width="20%"> $<input type="text" id ="amount8" name="amount8" class="amount-field accs-price" value="<?php echo isset($info['amount8'])?$info['amount8']:''; ?>" /></td>
          </tr>
          <tr>
          <td width="30%"><strong>NET TRADE ALLOWANCE </strong></td>
          <td width="20%"> $<input type="text" name="net_trade_value" id="net_trade_value" class="amount-field" value="<?php echo isset($info['net_trade_value'])?$info['net_trade_value']:''; ?>" /></td>
          <td width="30%" align="right"><span>FET</span></td>
          <td width="20%"> $<input type="text" class="amount-field" name="fet_value" id="fet_value" value="<?php echo isset($info['fet_value'])?$info['fet_value']:''; ?>" /></td>
          </tr>
          <tr>
          <td colspan="2" class="black-row">
          <label>TRADE SUBJECT TO REAPPRAISAL AT DELIVERY.</label>
          </td>
           <td width="29%" align="right"><span>Sales Tax</span></td>
           <td width="19%"> $<input type="text" class="amount-field" id="sales_tax" name="sales_tax" value="<?php echo isset($info['sales_tax'])?$info['sales_tax']:''; ?>" /></td>
          </tr>
          
          <tr>
          <td colspan="2" rowspan="5">
          <table width="100%">
          <tr>
          <td width="100%">
          <strong style="text-decoration:underline">Trade</strong><br />
          <span>Year &nbsp;</span>
          <input type="text" name="trade_year" value="<?php echo $info['trade_year']; ?>" style="width:14%" />
		  <span>&nbsp;Make&nbsp;</span>
          <input type="text" name="trade_make" value="<?php echo $info['trade_make']; ?>" style="width:21%" />
          <span>&nbsp;Model&nbsp;</span>
          <input type="text" name="trade_model" value="<?php echo $info['trade_model']; ?>" style="width:21%" />

         	          
          </td>
          </tr>
          <tr>
          <td>
          <span>Serial No. &nbsp;</span>
          <input type="text" name="trade_serial_no" value="<?php echo isset($info['trade_serial_no'])?$info['trade_serial_no']:''; ?>" style="width:48%" />
          <label class="custom-checkbox"><input type="checkbox" name="tr_option1" value="COE" <?php if(isset($info['tr_option1']) && $info['tr_option1'] == 'COE') echo 'checked="checked"';  ?> />COE&nbsp;&nbsp;
          <input type="checkbox" name="tr_option2" value="CONV" <?php if(isset($info['tr_option2']) && $info['tr_option2'] == 'CONV') echo 'checked="checked"';  ?> />CONV.<br/>
          <input type="checkbox" name="tr_option3" value="NON-SLIP" <?php if(isset($info['tr_option3']) && $info['tr_option3'] == 'NON-SLIP') echo 'checked="checked"';  ?> />NON-SLIP.
          </label>
          </td>
          </tr>
          
          <tr>
          <td>
          <span>Mortgaged by &nbsp;</span>
          <input type="text" name="mortgaged_by" value="<?php echo isset($info['mortgaged_by'])?$info['mortgaged_by']:''; ?>" style="width:27%" />
          <span>&nbsp;Phone &nbsp;</span>
          <input type="text" name="mortgaged_phone" value="<?php echo isset($info['mortgaged_phone'])?$info['mortgaged_phone']:''; ?>" style="width:26%" />
          
          </td>
          </tr>
          <tr>
          <td>
          <span>Address&nbsp;</span>
            <input type="text" name="mortgaged_address" value="<?php echo isset($info['mortgaged_address'])?$info['mortgaged_address']:''; ?>" style="width:81%" />
          </td>
          </tr>	
          
           <tr>
          <td>
          <span>City &nbsp;</span>
          <input type="text" name="mortgaged_city" value="<?php echo isset($info['mortgaged_city'])?$info['mortgaged_city']:''; ?>" style="width:29%" />
          <span>&nbsp;State &nbsp;</span>
          <input type="text" name="mortgaged_state" value="<?php echo isset($info['mortgaged_state'])?$info['mortgaged_state']:''; ?>" style="width:12%" />
          <span>&nbsp;Zip &nbsp;</span>
          <input type="text" name="mortgaged_zip" value="<?php echo isset($info['mortgaged_zip'])?$info['mortgaged_zip']:''; ?>" style="width:20%" />
          
          </td>
          </tr>
          <tr>
          <td align="center"><label>Physical Damage&nbsp; &nbsp;</label> 
          <label><input type="checkbox" name="physical_damage" value="accepted" <?php if(isset($info['physical_damage']) && $info['physical_damage'] == 'accepted') echo 'checked="checked"';  ?> />&nbsp;Accepted&nbsp;
         &nbsp; <input type="checkbox" name="physical_damage1" value="rejected" <?php if(isset($info['physical_damage1']) && $info['physical_damage1'] == 'rejected') echo 'checked="checked"';  ?> />&nbsp;Rejected
          </label><br/>
          <label>Credit Life&nbsp; &nbsp;</label> 
          <label><input type="checkbox" name="credit_life" value="accepted" <?php if(isset($info['credit_life']) && $info['credit_life'] == 'accepted') echo 'checked="checked"';  ?> />&nbsp;Accepted&nbsp;
         &nbsp; <input type="checkbox" name="credit_life1" value="rejected" <?php if(isset($info['credit_life1']) && $info['credit_life1'] == 'rejected') echo 'checked="checked"';  ?> />&nbsp;Rejected
          </label>
           </td>
          </tr>
          
          
          </table>
          
          </td>
          
          
            <td width="30%" align="right"><strong>Total Price</strong></td>
            <td width="20%"> $<input type="text" class="amount-field" name="total_price" id="total_price" value="<?php echo isset($info['total_price'])?$info['total_price']:''; ?>" /></td>
          
          </tr>  
          
          <tr>
          <td width="30%" align="right"><span>Net Trade Allowance</span></td>
            <td width="20%"> $<input type="text" class="amount-field" name="net_trade_allowance" id="net_trade_allowance1" value="<?php echo isset($info['net_trade_allowance'])?$info['net_trade_allowance']:''; ?>" /></td>
          </tr>
          
          <tr>
          <td width="30%"><span>RECEIPT NO</span><span style="float:right">Deposit</span></td>
            <td width="20%"> $<input type="text" name="down_payment" id="down_payment" class="amount-field" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" /></td>
          </tr>
          <tr>
          <td width="30%" align="right"><span>Cash At Closing</span></td>
            <td width="20%"> $<input type="text" name="closing_cash" id="closing_cash" class="amount-field" value="<?php echo isset($info['closing_cash'])?$info['closing_cash']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td width="30%"><span>Liability Insurance<br/>Not Included</span><strong style="float:right">BALANCE DUE</strong></td>
            <td width="20%"> $<input type="text" class="amount-field" id="amount" name="amount" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>" /></td>
          </tr>
          
          <tr>
          <td colspan="2" align="center">
          <label class="red-color">DISCLAIMER OF WARRANTIES</label>
          <p class="red-color">THE SELLER HEREBY EXPRESSLY DISCLAIMS ALL WARRANTIES,  EITHER 
EXPRESSED OR IMPLIED, INCLUDING ANY IMPLIED WARRANTY OF MERCHANT- 
ABILITY OR FITNESS FORA PARTICULAR PURPOSE UNLESS OTHERWISE STATED 
IN THIS DOCUMENT. SELLER NEITHER ASSUMES NOR AUTHORIZES ANY OTHER 
PERSON TO ASSUME FOR IT ANY LIABILITY IN CONNECTION WITH THE SALE OF 
THE ITEM/ITEMS.</p>
          
          </td>
          <td colspan="2" align="center">
          <p class="red-color small-text">
          This contract is not assignable and not cancellable and all terms and conditions of this sale are contained on this and reverse side and the terms on the reverse side of this order are as much a 
part of the agreement as if written on this side and no other verbal understandings or promises 
whatsoever are a part of this agreement.
The customer certified is 18 years of age or over and warrants true and lawful owner of the 
truck traded in and that it is free of all encumbrances whatsoever except as noted above.
The undersigned purchaser acknowledges has read and understands the conditions and 
terms of this contract as it appears on this and the reverse side and has received a copy of 
this order executed herewith.
          </p>
          
          </td>
          </tr>
          
          <tr>
          <td colspan="2" class="padding-cell">
          
          <strong style="text-decoration:underline;">THIS TRUCK SOLD</strong><br/>
          <span><input type="checkbox" name="truck_sold_warranty" value="manufacturers warranty" <?php if(isset($info['truck_sold_warranty']) && $info['truck_sold_warranty'] == 'manufacturers warranty' ) echo 'checked="checked"'; ?> /> &nbsp;WITH  MANUFACTURERS STANDARD  NEW  TRUCK WARRANTY</span><br/>
        <input type="checkbox" name="truck_sold_declaration" value="yes" <?php if(isset($info['truck_sold_declaration']) && $info['truck_sold_declaration'] == 'yes' ) echo 'checked="checked"'; ?> /><strong class="red-color">&nbsp;AS IS.</strong><span class="red-color">&nbsp;WITH ALL FAULTS, I HEREBY MAKE THIS PURCHASE KNOWINGLY 
WITHOUT  ANY GUARANTEE, EXPRESSED OR  IMPLIED, BY THIS 
DEALER OR HIS AGENT</span><br/>
	
    <p class="mtop20">Purchaser hereby acknowledges  the purchase of  this truck as is,  with  all 
faults  knowingly accepted  and  without any  warranties  express or  implied, 
other than as indicated above by purchaser’s initial.</p>

<span>Purchaser's Initials&nbsp;</span>
<input type="text" style="width:60%;margin:0px;" />
 
          </td>
          <td colspan="2">
          <table width ="100%"  class="padding-table">
          <tr><td colspan="2" align="center"><span class="red-color">ADDITIONAL TERMS ON REVERSE SIDE.</span><br/></td></tr>
          <tr>
          <td width="25%"><span>Purchaser</span></td>
          <td width="70%"><input type="text" name="purchaser" value="<?php echo isset($info['purchaser'])?$info['purchaser']:$info['first_name'].' '.$info['last_name']; ?>" style="width:100%" /></td>
          </tr>
          <tr>
          <td width="25%"><span>By</span></td>
          <td width="70%"><input type="text" name="by" value="<?php echo isset($info['by'])?$info['by']:''; ?>" style="width:100%" /></td>
          </tr>
          
           <tr>
          <td width="25%"><span>Salesman</span></td>
          <td width="70%"><input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:100%" /></td>
          </tr>
          <tr>
          <td width="25%"><span>Accepted By</span></td>
          <td width="70%"><input type="text" name="accepted_by" value="<?php echo isset($info['accepted_by'])?$info['accepted_by']:''; ?>" style="width:100%" /></td>
          </tr>
          <tr>
          <td colspan="2" align="center">
          <strong class="red-color">THIS ORDER NOT BINDING UNTIL ACCEPTED BY DEALER</strong>
          </td>
          </tr>
          
          
          </table>
          </td>
          </tr>         
          </table>
           
          <br/><br/><br/><br/>
         <table style="width:100%;" cellpadding="6" style="margin-top:10px;" class="text-table padding-table print_month">
        
         <tr>
         <td width="5%" valign="top">1.</td>
         <td width="95%">
         <p><strong>NO VERBAL PROMISES -</strong> All terms and conditions of this sale are written and appear on this Buyer’s Order and no verbal understanding or promises whatsoever are a part of this agreement.</p>
          
         </td>
         </tr>
         
          <tr>
        <td width="5%" valign="top">2.</td>
         <td width="95%">
         <p><strong>BINDING AGREEMENT - </strong> This Buyer’s Order,  pending approval of  financing constitutes a firm and
binding purchase of the equipment as described on this annexed Buyer’s Order. All expenses incurred by
seller for excise, sales, consumption, and occupational taxes not included in the price on the Buyer’s Order
and at any time determined to be due and payable in respect of said goods will be paid to the seller in
addition to the price on the reverse side.</p>
          
         </td>
         </tr>
         
           <tr>
        <td width="5%" valign="top">3.</td>
         <td width="95%">
         <p><strong>BREACH OF CONTRACT - </strong> Upon the failure of purchaser to complete said purchase for any reason
other than that mutually agreed upon and specified in writing on this Buyer’s Order, the cash deposit
may be retained and liquidated as damages for breach of contract.</p>
          
         </td>
         </tr>
         
         
           <tr>
        <td width="5%" valign="top">4.</td>
         <td width="95%">
         <p><strong>RE-APPRAISAL OF TRADE-IN - </strong> The vehicle traded in is to be delivered by the customer to the dealer in
substantially the same condition as when it was appraised. If any substantial change in condition has
occurred, or more than 30 days has elapsedsince the original appraisal, the truck will be reappraised
and the agreement changed to the extent of the amount of the difference in appraisal. With trade-in, the
purchaser shall deliver to the dealer an assigned certificate of title or other legal and sufficient evidence of
ownership.</p>
          
         </td>
         </tr>
         
           <tr>
         <td width="5%" valign="top">5.</td>
         <td width="95%">
         <p><strong>CHANGES BY MANUFACTURER - </strong> The Manufacturer reserves the right to  make changes in the
model, design or specifications of any ordered truck as may be made necessary for the manufacture
of said truck.</p>
          
         </td>
         </tr>
         
           <tr>
         <td width="5%" valign="top">6.</td>
         <td width="95%">
         <p><strong>DELAYS, ACCIDENTS,  STRIKES -</strong> Dealer shall  not be liable for delays caused by Manufacturer,
accidents, strikes or other cause beyond the control of Dealer.</p>
          
         </td>
         </tr>
         
          
         
          <tr>
        <td width="5%" valign="top">7.</td>
         <td width="95%">
         <p><strong>BINDING ARBITRATION - </strong> Any and all disputes, claims or controversies between the Buyer and Seller
pertaining to the motor vehicle sold by this Buyer’s Order shall be resolved by binding arbitration. The
arbitration shall be conducted bya single arbitrator selected pursuant to the agreement of the Buyer
and Seller. If the Buyer and Seller cannot agree ona single arbitrator, the arbitration shall be conducted
according to the Commercial Arbitration Rules of the American Arbitration Association and the Indiana
Uniform Arbitration Act. THE ARBITRATION SHALL BE CONDUCTED IN MARION COUNTY, INDIANA.</p>
          
         </td>
         </tr>
          <tr>
        <td width="5%"></td>
         <td width="95%">
         <strong>NOTICE: THIS ARBITRATION AGREEMENT REQUIRES THE SELLER AND BUYER(S) TO GIVE UP
ANY RIGHTS THEY MAY OTHERWISE POSSESS BY LAW TO HAVE THE MATTERS DESCRIBED IN
THE ARBITRATION CLAUSE DECIDED IN A LAWSUIT IN A COURT. ANY PARTY TO THIS
CONTRACT WHO REFUSES TO SUBMIT TO ARBITRATION OF THE MATTERS SET OUT IN THE
ARBITRATION CLAUSE MAY BE COMPELLED TO ARBITRATE BY A COURT ORDER OBTAINED BY
ANY OTHER PARTY TO THE CONTRACT.</strong> 
          
         </td>
         </tr>
         
         <tr>
         <td width="5%" valign="top">8.</td>
         <td width="95%">
         <p><strong>INDIANA LAW WILL APPLY -</strong> The buyer(s) and seller expressly agree that the law of the State of Indiana
will  apply to the  Buyer’s Order negotiated  and  concluded in  Indianapolis,  Marion County, Indiana. Any
action involving any dispute between Buyer(s) and Seller arising out of this Buyer’s Order,  and which
may be brought in a  court, shall be brought  only in the  Circuit or Superior Court of Marion County,
Indiana.  Buyer(s)  waive any right  they may have under any state or federal  statute or rule of court
procedure to have the action to which this clause refers transferred, heard or decided in any other
forum.</p>
          
         </td>
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
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>
		
		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($info['deal_status_id'] == $key)? 'selected="selected"' : "" ; ?>  ><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		<input type="hidden" id="tax_percent" name="tax_percent" value="<?php echo $deal['Deal']['tax_percent']; ?>" />
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">


function calculate_tax(){
		
		
		var tax_value=isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat( $('#tax_percent').val());	
		var fet_value=isNaN(parseFloat( $('#fet_value').val()))?0.00:parseFloat( $('#fet_value').val());	
		var sell_price = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat( $('#unit_value').val());

		$accs_price =0;
		for(i=1;i<=6;i++)
		{
		$accs_price += isNaN(parseFloat( $('#amount'+String(i)).val()))?0.00:parseFloat( $('#amount'+String(i)).val());
		}
		
		var amount = sell_price+fet_value;
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		amount = amount + $accs_price;
		amount = isNaN(amount)?0.00:amount;
		
		
		$("#total_price").val(amount.toFixed(2));
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:amountIncludingTax;
		$('#sales_tax').val( amountIncludingTax );
		
		$trade_value = isNaN(parseFloat( $('#net_trade_value').val()))?0.00:parseFloat( $('#net_trade_value').val());
		$down_payment = isNaN(parseFloat( $('#down_payment').val()))?0.00:parseFloat( $('#down_payment').val());
		$closing_cash = isNaN(parseFloat( $('#closing_cash').val()))?0.00:parseFloat( $('#closing_cash').val());
		
		//actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee+dmv_fee_total;


		actual_balance = amount -($trade_value + $down_payment +$closing_cash);
		
		actual_balance = isNaN(actual_balance)?0.00:actual_balance;
		$('#amount').val( actual_balance.toFixed(2));
		
	}

$(document).ready(function(){

	//alert("please select a fee");	
	
	
	$("#appt_date").bdatepicker();
	$("#appt_time").timepicker();
	
	$("#unit_value,#fet_value,.accs-price,#closing_cash,#down_payment,#sales_tax").on('keyup paste change',function(){
			calculate_tax();
		});
		
	
	$("#trade_value").on('keyup change paste',function(){
		$val = isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		$balance_owed = isNaN(parseFloat($("#balance_owed").val()))?0.00:parseFloat($("#balance_owed").val());
		net_trade = $val - $balance_owed;
		$("#net_trade_value").val(net_trade.toFixed(2));
		$("#net_trade_allowance1").val(net_trade.toFixed(2));
		calculate_tax();
		
		});	
		
	$("#balance_owed").on('keyup change paste',function(){
		$balance_owed = isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		$val = isNaN(parseFloat($("#trade_value").val()))?0.00:parseFloat($("#trade_value").val());
		net_trade = $val - $balance_owed;
		$("#net_trade_value").val(net_trade.toFixed(2));
		$("#net_trade_allowance1").val(net_trade.toFixed(2));
		calculate_tax();
		
		});		
	
	$("#net_trade_value").on('change keyup paste',function(){
		$val = isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		$("#net_trade_allowance1").val(val.toFixed(2));
		calculate_tax();
		});
		
		$("#net_trade_allowance1").on('change keyup paste',function(){
		$val = isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		$("#net_trade_value").val(val.toFixed(2));
		calculate_tax();
		});
	
	
	
	$('#fixed_fee_options').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					/*$('#freight').val(data.freight_fee);
					$('#prep').val(data.prep_fee);
					$('#doc').val(data.doc_fee);
					$('#part_serv').val(parseFloat(data.parts_fee) + parseFloat(data.service_fee));
					$('#tag_tit').val(parseFloat(data.title_fee) + parseFloat(data.tag_fee));
					*/
					$('#tax_percent').val(data.tax_fee);
					calculate_tax();
				}
			});
		}
	});
	
	
		
	
	
	
	
	

	
	
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
