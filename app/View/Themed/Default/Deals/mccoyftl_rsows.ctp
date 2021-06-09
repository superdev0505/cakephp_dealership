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
//echo "<pre>";
//print_r($info);
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
	<div id="worksheet_container" style="width: 800px; margin:0 auto;">
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
.two-three,.six,.label20,.label30 {
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
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	table td{
		font-size:10px;
		padding:0px;
	}
	input[type=text] 
	{
		height:15px;	
	}
	input[type=checkbox] 
	{
		height:10px;	
	}
}

</style>

		<div class="wraper header"> 
		
			<table cellpadding="0" style="width:100%; border:2px solid #4c4c4c; margin:0 auto; font-family:arial; font-size:13px;">
				<tbody>
				<tr>
					<td>
						<table style="font-family:arial; font-size:13px;">
							<thead>
								<tr>
									<td><img  src="<?php echo FULL_BASE_URL; ?>/app/webroot/img/logo-1.png" style="width:520px" border="0" alt="logo" style="width:520px"></td>

									<td>
										<p style="text-align:center;"><strong style="font-size:15px;">McCoy Freightliner</strong><br>
										9622 NE Vancouver Way<br>
										Portland, OR 97211<br>
										P.O. Box 17218, Portland, OR 97211<br>
										Tel: (503)283-0345 Fax: (503)283-2011<br>
										1-800-851-2208</p>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<tr>
												<td style="width:25%;">Date:</td>
												<td style="width:70%;"><input name="date_submit" value="<?php echo isset($info['date_submit'])?$info['date_submit']:date('Y-m-d'); ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
									<td></td>
								</tr>
								<tr>
									<td style="width:48%;padding-right:2%">
										<table style="width:100%;">
											<tr>
												<td style="width:25%;">Purchaser’s Name:</td>
												<td style="width:70%;"><input  name="name1" value="<?php echo isset($info['name1'])?$info['name1']:$info['first_name']." ".$info['last_name']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
									<td style="width:50%;">
										<table style="width:100%;">
											<tr>
												<td style="width:20%;">Street Address:</td>
												<td style="width:80%;"><input  name="street_address" value="<?php echo isset($info['street_address'])?$info['street_address']:$info['address']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="width:48%;padding-right:2%">
										<table style="width:100%;">
											<tr>
												<td style="width:25%;">Purchaser’s Name:</td>
												<td style="width:70%;"><input  name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
									<td style="width:50;">
										<table style="width:100%;">
											<tr>
												<td style="width:11%;">City:</td>
												<td style="width:22%;"><input  name="city" value="<?php echo $info['city']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:11%;">State:</td>
												<td style="width:22%;"><input  name="state" value="<?php echo $info['state']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:11%;">Zip:</td>
												<td style="width:22%;"><input  name="zip" value="<?php echo $info['zip']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="width:48%;padding-right:2%">
										<table style="width:100%;">
											<tr>
												<td style="width:10%;">Phone:</td>
												<td style="width:40%;"><input   name="phone" value="<?php echo $info['phone']; ?>"    style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
									<td style="width:50%;">
										<table style="width:100%;">
											<tr>
												<td style="width:10%;">Email:</td>
												<td style="width:90%;"><input  name="email" value="<?php echo $info['email']; ?>"    style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											</tr>
										</table>
									</td>
								</tr>
							</thead>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="font-family:arial; font-size:13px; width:100%; border-top:1px solid #4c4c4c; border-bottom:1px solid #4c4c4c;">
							<tbody>
								<tr>
									<td><h3 style="margin:0; padding:0px 0;">PLEASE ENTER MY ORDER FOR THE FOLLOWING:</h3></td>
								</tr>
								<tr>
									<td style="width:100%;">
										<table style="width:100%;">
											<tr>
												<td style="width:5%;">Year:</td>
												<td style="width:15%;"><input  name="year" value="<?php echo $info['year']; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:5%;">Make:</td>
												<td style="width:15%;"><input   name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:5%;">Model:</td>
												<td style="width:15%;"><input   name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:5%;">Color:</td>
												<td style="width:25%;"><input  name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:10%"></td>
											</tr>
										</table>
										
										<table style="width:100%;">
											<tr>
												<td style="width:10%;">Stock #:</td>
												<td style="width:30%;"><input  name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:10%;">Serial #:</td>
												<td style="width:30%;"><input  name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
												<td style="width:10%"></td>
											</tr>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="width:100%;">
							<tbody><tr><td style="width:50%;">
								<table style="width:100%;">
									<tbody>
									<tr>
										<td style="width:35%;">To be delivered on or about:</td>
										<td style="width:65%;"><input name="to_delivery" value="<?php echo isset($info['to_delivery'])?$info['to_delivery']:''; ?>"   type="text" style="width:100%; border:0; border-bottom:1px solid #ccc;"></td>
									</tr>
								</tbody></table>
							</td>
							<td style="width:50%;">
								<table style="width:100%;">
									<tbody><tr>
										<td style="width:20%;">Salesman::</td>
										<td style="width:80%;"><input  name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>"   type="text" style="width:100%; border:0; border-bottom:1px solid #ccc;"></td>
									</tr>
								</tbody></table>
							</td></tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="width:100%;">
							<tbody>
							<tr>
								<td cellpadding="0" style="width:50%;">
								<table style="width:100%; border-collapse:collapse" border="1" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td style="width:60%; padding:5px;"><strong>Base Price, Per Unit</strong></td>
											<td style="width:40%; padding:10px;"><input  name="base_price_unit" value="<?php echo isset($info['base_price_unit'])?$info['base_price_unit']:''; ?>"  type="text" style="width:100%; border:0; text-align:right;"></td>
										</tr>
										<tr>
											<td style="width:60%; padding:5px;"><strong>Price Includes:</strong></td>
											<td style="width:40%; padding:5px;"><input name="price_includes" value="<?php echo isset($info['price_includes'])?$info['price_includes']:''; ?>"  type="text" style="width:100%; border:0; text-align:right;"></td>
										</tr>
										<tr>
											<td style="width:60%; padding:5px;"><input type="text" name="custom_field1"  value="<?php echo isset($info['custom_field1'])?$info['custom_field1']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
											<td style="width:40%; padding:5px;"><input name="custom_field2" value="<?php echo isset($info['custom_field2'])?$info['custom_field2']:''; ?>" type="text" style="width:100%; border:0; text-align:right;"></td>
										</tr>
										<tr>
											<td style="width:60%; padding:5px;"><input type="text" name="custom_field3" value="<?php echo isset($info['custom_field3'])?$info['custom_field3']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
											<td style="width:40%; padding:5px;"><input type="text" name="custom_field4" value="<?php echo isset($info['custom_field4'])?$info['custom_field4']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										</tr>
										<tr>
											<td style="width:60%; padding:5px;"><input type="text" name="custom_field5" value="<?php echo isset($info['custom_field5'])?$info['custom_field5']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
											<td style="width:40%; padding:5px;"><input type="text" name="custom_field6" value="<?php echo isset($info['custom_field6'])?$info['custom_field6']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										</tr>
										<tr>
											<td style="width:50%; padding:5px;"><input type="text" name="custom_field7" value="<?php echo isset($info['custom_field7'])?$info['custom_field7']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
											<td style="width:50%; padding:5px;"><input type="text" name="custom_field8" value="<?php echo isset($info['custom_field8'])?$info['custom_field8']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										</tr>
									</tbody>
								</table>
								<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
									<tr><td style="width:100%; border:0">
											<table style="width:100%;">
													<tbody>
														<tr>
															<td style="width:100%;">
																<h3 style="margin:0; padding:5px 0;">Additional items not included in above sales price:</h3>
															</td>
														</tr>
												</tbody>
											</table>
									</td>
									</tr>
								</table>
								<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field9" value="<?php echo isset($info['custom_field9'])?$info['custom_field9']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field10" value="<?php echo isset($info['custom_field10'])?$info['custom_field10']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field11" value="<?php echo isset($info['custom_field11'])?$info['custom_field11']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field12" value="<?php echo isset($info['custom_field12'])?$info['custom_field12']:''; ?>" ></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field13" value="<?php echo isset($info['custom_field13'])?$info['custom_field13']:''; ?>" ></td>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field14" value="<?php echo isset($info['custom_field14'])?$info['custom_field14']:''; ?>" ></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field15" value="<?php echo isset($info['custom_field15'])?$info['custom_field15']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field16" value="<?php echo isset($info['custom_field16'])?$info['custom_field16']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field17" value="<?php echo isset($info['custom_field17'])?$info['custom_field17']:''; ?>" ></td>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field18" value="<?php echo isset($info['custom_field18'])?$info['custom_field18']:''; ?>" ></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field19" value="<?php echo isset($info['custom_field19'])?$info['custom_field19']:''; ?>" ></td>
										<td style="width:50%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field20" value="<?php echo isset($info['custom_field20'])?$info['custom_field20']:''; ?>" ></td>
									</tr>
									
									<tr>
										<td style="width:60%; padding:5px;">
											<ol style="margin:0; padding:5px 0 0 20px;">
												<li>Total price per unit</li><br>
												<li>QTY</li><br>
												<li style="height:35px">
													<input type="checkbox"  name="qty" type="radio" value="Cash" <?php echo ($info['qty'] == "Cash")?"checked":""; ?>> Cash
													<input type="checkbox" name="qty" type="radio" value="Check" <?php echo ($info['qty'] == "Check")?"checked":""; ?> > Check
												</li>
											</ol>
										</td>
										<td style="width:40%; padding:0px; border-collapse:collapse; vertical-align:top">
											<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
												<tr>
													<td><input type="text" name="custom_field21" value="<?php echo isset($info['custom_field21'])?$info['custom_field21']:''; ?>" style=" padding:6px; border:0; float:right; text-align:right;"></td>
												</tr>
												<tr>
													<td><input type="text" name="custom_field22" value="<?php echo isset($info['custom_field22'])?$info['custom_field22']:''; ?>" style="padding:6px; border:0; float:right; text-align:right;"></td>
												</tr>
												<tr>
													<td><input type="text" name="custom_field23" value="<?php echo isset($info['custom_field23'])?$info['custom_field23']:''; ?>" style="padding:7px; border:0; float:right; text-align:right;height:35px"></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td style="width:50%; padding:0px;">
											<h3 style="font-size:13px; margin:0; padding:0;">UNPAID BALANCE DUE ON DELIVERY</h3>
										</td>
										<td style="width:50%; padding:5px;"><input type="text" name="custom_field24" value="<?php echo isset($info['custom_field24'])?$info['custom_field24']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
								</table>
							</td>
							<td cellpadding="0" style="width:50%;">
								<table style="width:100%; border-collapse:collapse" border="1" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td style="width:100%; padding:12px;"><strong>TERMS OF AGREEMENT</strong></td>
										</tr>
										<tr>
											<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field25" value="<?php echo isset($info['custom_field25'])?$info['custom_field25']:''; ?>" ></td>
										</tr>
										<tr>
											<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field26" value="<?php echo isset($info['custom_field26'])?$info['custom_field26']:''; ?>" ></td>
										</tr>
										<tr>
											<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field26" value="<?php echo isset($info['custom_field26'])?$info['custom_field26']:''; ?>" ></td>
										</tr>
										<tr>
											<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field27" value="<?php echo isset($info['custom_field27'])?$info['custom_field27']:''; ?>" ></td>
										</tr>
										<tr>
											<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field28" value="<?php echo isset($info['custom_field28'])?$info['custom_field28']:''; ?>" ></td>
										</tr>
									</tbody>
								</table>
								<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
									<tr>
										<td style="width:100%; border:0">
											<!--table style="width:100%;"!-->
											<tbody>
												<tr>
													<td style="width:100%; padding:5px;">
														<input type="text" style="width:100%; border:0; text-align:right;" name="custom_field29" value="<?php echo isset($info['custom_field29'])?$info['custom_field29']:''; ?>" >
													</td>
												</tr>
												<tr>
													<td style="width:100%;padding: 8.8px;"><strong style="margin: 0px;padding: 5px 0;">STANDARD INDUSTRY TRADE TERM</strong></td>
												</tr>
												<tr>
													<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field30" value="<?php echo isset($info['custom_field30'])?$info['custom_field30']:''; ?>" ></td>
												</tr>
												<tr>
													<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field31" value="<?php echo isset($info['custom_field31'])?$info['custom_field31']:''; ?>" ></td>
												</tr>
												<tr>
										 			<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field32" value="<?php echo isset($info['custom_field32'])?$info['custom_field32']:''; ?>" ></td>
												</tr>
												<tr>
													<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; text-align:right;" name="custom_field33" value="<?php echo isset($info['custom_field33'])?$info['custom_field33']:''; ?>" ></td>
												</tr>
												<tr>
													<td style="width:100%; padding:5px;"><h3 style="margin:0; padding:5px 0;">LOCATION:</h3></td>
												</tr>
												<tr>
													<td style="width:100%; padding:5px;"><input type="text" style="width:100%; border:0; height:117px; text-align:right;" name="custom_field34" value="<?php echo isset($info['custom_field34'])?$info['custom_field34']:''; ?>" ></td>
												</tr>
											</tbody>
											<!--/table-->
										</td>
									</tr>
								</table>
							</td>
							</tr>
							</tbody>
						</table>
					</td>
				</tr>	
				<tr>
				 <td>
				  <table style="width:100%; border-collapse:collapse;" border="1" cellpadding="0" cellspacing="0">
				   <tbody>
					<tr>
					 <td style="width:65%;">
					  <table style="width:100%; border:0px solid #000;">
					   <tbody>
						<tr>
						 <td style="width:100%;">
						  <h3 style="margin:0; padding:5px 0px 5px 0px; text-align:center;">DISCLAIMER OF WARRANTIES:</h3>
						  Any warranties on the products sold hereby, are the warranties of the manufacturer of those products. The Seller, McCoy Freightliner, neither assumes nor warranties, either express or implied, including any implied warranty of merchantability or fitness for a particular purpose, and McCoy Freightliner neither assumes nor authorizes any other person to assume for it, any liability in connection with the sale of the vehicle. This disclaimer does not affect manufacturer’s warranty on this unit.
						  
						  <div style="margin-left:5px;margin-bottom:15px;">
							<p style="font-size:11px;font-weight:bolder;margin:10px 0px 0px 0px;padding:0px 0px 0px 5px;border-bottom:1px solid #000;width: 50%;"><b>X</b></p>
						  <p style="font-size:11px; text-align:left; margin:0; padding:0;">Purchaser’s Signature</p>
						  </div>
						 </td>
						</tr>
					   </tbody>
					  </table>
					 </td>
				   <t</tr>
				   </tbody>
				  </table>
				 </td>
				</tr>
				<tr>
				 <td>
				  <table style="width:100%; border-collapse:collapse;" border="0" cellpadding="0" cellspacing="0">
				   <tbody>
					<tr>
					<td><p style="font-size:10px;">Purchaser agrees that this Order includes all of the terms and conditions stated; that this Order cancels and supersedes any prior agreement and as of the date hereof comprises the complete and exclusive statement of the terms of the agreement relating to the subject matter covered hereby, and that THIS ORDER SHALL NOT BECOME BINDING UNTIL ACCEPTED BY DEALER OR ITS AUTHORIZED REPRESENTATIVE. Purchaser by his execution of the Order acknowledges that he has read its terms and conditions and has received a true copy of this Order.<br><br>
					Liquidated Damages: All cash payments and property traded in, may be retained by the seller as liquidated damages for breach of this purchase contract if the Purchaser fails or refuses to take delivery of the truck(s) purchased hereunder. Taxes: The Purchaser assumes responsibility for payment of any Federal Highway use taxes due and unpaid at the time of delivery of trade-in(s).</p></td>
				   </tr>
				   </tbody>
				  </table>
				 </td>
				</tr>
				<tr>
				 <td>
				 <table style="width:100%;">
				 <tbody>
				 <tr><td style="width:48%;padding-right:2%">
				  <table style="width:100%; border-collapse:collapse;" border="0" cellpadding="0" cellspacing="0">
				   <tbody>
					<tr>
					 <td>
					  <p style="font-size:11px;margin:0; padding:0;">&nbsp;</p>
					  <hr style="margin:0; padding:0;">
					  <p style="font-size:11px; margin:0; padding:0;">Purchaser’s Signature</p>
					 </td>
					</tr>
				   </tbody>
				  </table>
				 </td>
				 <td style="width:50%;">
				  <table style="width:100%; border-collapse:collapse;" border="0" cellpadding="0" cellspacing="0">
				   <tbody>
					<tr>
					 <td>
					  <p style="font-size:11px; margin:0; padding:0;">ACCEPTED BY</p>
					  <hr style="margin:0; padding:0;">
					  <p style="font-size:11px; margin:0; padding:0;text-align:center">Purchaser’s Signature</p>
					 </td>
					</tr>
				   </tbody>
				  </table>
				 </td>
				 </tr></tbody>
				 </table>
				 </td>
				</tr>

					
				</tbody>
				</table>

		</div>
		<!---left1-->
		</br>
         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->
	<br/>	
		
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
		
		
		
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	$(".date_input_field").bdatepicker();
	
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
