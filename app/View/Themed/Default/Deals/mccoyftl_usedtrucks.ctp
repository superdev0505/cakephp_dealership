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
								<td><img  src="<?php echo FULL_BASE_URL; ?>/app/webroot/img/logo-retain.jpg" style="width:520px" border="0" alt="logo" style="width:520px"></td>
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
											<td style="width:70%;"><input   name="date_submit" value="<?php echo isset($info['date_submit'])?$info['date_submit']:date('Y-m-d'); ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
								<td></td>
							</tr>
							<tr>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:25%;">Purchaser’s Name:</td>
											<td style="width:70%;"><input  name="name1" value="<?php echo isset($info['name1'])?$info['name1']:$info['first_name']." ".$info['last_name']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:25%;">Street Address:</td>
											<td style="width:70%;"><input   name="street_address" value="<?php echo isset($info['street_address'])?$info['street_address']:$info['address']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:25%;">Purchaser’s Name:</td>
											<td style="width:70%;"><input  name="name2" value="<?php echo isset($info['name2'])?$info['name2']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:11%;">City:</td>
											<td style="width:22%;"><input   name="city" value="<?php echo $info['city']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:11%;">State:</td>
											<td style="width:22%;"><input  name="state" value="<?php echo $info['state']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:11%;">Zip:</td>
											<td style="width:22%;"><input  name="zip" value="<?php echo $info['zip']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:25%;"><b>E-Mail:</b></td>
											<td style="width:70%;"><input  name="email" value="<?php echo $info['email']; ?>" style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
								</td>
								<td style="width:50%;">
									<table style="width:100%;">
										<tr>
											<td style="width:20%;">Res. Phone:</td>
											<td style="width:30%;"><input  name="phone" value="<?php echo $info['phone']; ?>" style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:20%;">Bus. Phone:</td>
											<td style="width:30%;"><input  name="bus_phone" value="<?php echo isset($info['bus_phone'])?$info['bus_phone']:$info['mobile']; ?>" style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
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
											<td><input style="border:1px solid #000;" type="radio" <?php echo ($info['condition'] == "New") ? "checked" : "";?>  name="condition" value="New"></td>
											<td>New:</td>
											<td><input style="border:1px solid #000;" type="radio" <?php echo ($info['condition'] == "Used") ? "checked" : "";?>  name="condition" value="Used"></td>
											<td>Used:</td>
											<td style="width:10%;"></td>
											<td style="width:5%;">Year:</td>
											<td style="width:15%;"><input  name="year" value="<?php echo $info['year']; ?>" style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:5%;">Make:</td>
											<td style="width:15%;"><input  name="make" value="<?php echo $info['make']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:5%;">Model:</td>
											<td style="width:15%;"><input  name="model" value="<?php echo $info['model']; ?>"  style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
											<td style="width:5%;">Color:</td>
											<td style="width:25%;"><input name="unit_color" value="<?php echo $info['unit_color']; ?>" style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td>
										</tr>
									</table>
									
									<table style="width:100%;">
										<tr>
											<td style="width:10%;">Body Type:</td>
											<td style="width:15%;"><input name="category" value="<?php echo isset($info['category'])?$info['category']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											<td style="width:10%;"># of Axles:</td>
											<td style="width:15%;"><input name="axles" value="<?php echo isset($info['axles'])?$info['axles']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											<td style="width:10%;">Stock #:</td>
											<td style="width:15%;"><input name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
											<td style="width:10%;">Serial #:</td>
											<td style="width:15%;"><input name="serial" value="<?php echo isset($info['serial'])?$info['serial']:''; ?>"  style="width:100%; border:0; border-bottom:1px solid #ccc;" type="text"></td>
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
									<td style="width:80%;"><input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>"   style="width:100%; border:0; border-bottom:1px solid #ccc;"></td>
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
										<td style="width:50%; padding:5px;"><strong>Base Price, Per Unit</strong></td>
										<td style="width:50%; padding:5px;"><input type="text" id="base_price_unit" class="total_price currency" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><strong>F.E.T. Per Unit:</strong></td>
										<td style="width:50%; padding:5px;"><input class="total_price currency" type="text" name="fet_cost" value="<?php echo isset($info['fet_cost'])?$info['fet_cost']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><strong>Price Includes:</strong></td>
										<td style="width:50%; padding:5px;"><td style="width:50%; padding:5px;"><input type="text" class="currency" name="price_include" value="<?php echo isset($info['price_include'])?$info['price_include']:''; ?>" style="width:100%; border:0; text-align:right;"></td></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" name="price_include" value="<?php echo isset($info['price_include'])?$info['price_include']:''; ?>"  style="width:100%; border:0; text-align:right;"></td>
										<td style="width:50%; padding:5px;"><input type="text" name="price_include1" value="<?php echo isset($info['price_include1'])?$info['price_include1']:''; ?>"  style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:5px;"><input type="text" name="price_include2" value="<?php echo isset($info['price_include2'])?$info['price_include2']:''; ?>"  style="width:100%; border:0; text-align:right;"></td>
										<td style="width:50%; padding:5px;"><input type="text" name="price_include3" value="<?php echo isset($info['price_include3'])?$info['price_include3']:''; ?>"  style="width:100%; border:0; text-align:right;"></td>
									</tr>
									<tr>
										<td style="width:50%; padding:0px 0px 0px 5px;">
											<table style="width:100%;">
												<tbody>
													<tr>
														<td>#Flooring Days Included</td>
														<td style="border:1px solid #000; float:right;"><input type="text"  name="flooring_days" value="<?php echo isset($info['flooring_days'])?$info['flooring_days']:''; ?>"  style="width:50px; border:0; text-align:right;"></td>
													</tr>
												</tbody>
											</table>
										</td>
										<td style="width:60%; padding:5px;"><input id="flooring_days_cal" name="flooring_days_cal" type="text" value="<?php echo isset($info['flooring_days2'])?$info['flooring_days2']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									</tr>
								</tbody>
							</table>
							<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
								<tr><td style="width:100%; border:0">
										<table style="width:100%;">
												<tbody>
													<tr>
														<td style="width:100%;">
															<h3 style="margin:0; padding:0px 0;">Additional items not included in above sales price</h3>
														</td>
													</tr>
											</tbody>
										</table>
								</td>
								</tr>
							</table>
							<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
								<tr>
									<td style="width:50%; padding:5px; border-top:0;"><strong>Title Fee</strong></td>
									<td style="width:50%; padding:5px; border-top:0;">$<input type="text" class="total_price currency"  name="title_fee" value="<?php echo isset($info['title_fee'])?$info['title_fee']:''; ?>"  type="text" style="width:100%; border:0; text-align:right;"></td>
								</tr>
								<tr>
									<td style="width:50%; padding:5px;"></td>
									<td style="width:50%; padding:5px;"><input type="text" name="custom_field" value="<?php echo isset($info['custom_field'])?$info['custom_field']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
								</tr>
								<tr>
									<td style="width:50%; padding:0px 0px 0px  5px;">
										<table style="width:100%;">
											<tbody>
												<tr>
													<td><strong>Additional Floor/Day</strong></td>
													<td  style="border:1px solid #000; float:right;">$<input  type="text" class="additional_floor_day"  name="additional_floor_day" value="<?php echo isset($info['additional_floor_day'])?$info['additional_floor_day']:''; ?>" type="text" style="width:50px; border:0; text-align:right;"></td>
												</tr>
											</tbody>
										</table>
									</td>
									<td style="width:60%; padding:5px;">$<input type="text"  class="total_price currency" name="additional_floor_day2" id="additional_floor_day2"  value="<?php echo isset($info['additional_floor_day2'])?$info['additional_floor_day2']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
								</tr>
								<tr>
									<td style="width:50%; padding:5px;"><input type="text" name="additional_floor_day3" value="<?php echo isset($info['additional_floor_day3'])?$info['additional_floor_day3']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									<td style="width:50%; padding:5px;align:right;">$<input class="total_price currency" type="text" name="additional_floor_day4" value="<?php echo isset($info['additional_floor_day4'])?$info['additional_floor_day4']:'0.00'; ?>" style="width:90%; border:0; text-align:right;"></td>
								</tr>
								<tr>
									<td style="width:50%; padding:5px;"><input type="text" name="additional_floor_day5" value="<?php echo isset($info['additional_floor_day5'])?$info['additional_floor_day5']:''; ?>" style="width:100%; border:0; text-align:right;"></td>
									<td style="width:50%; padding:5px;">$<input class="total_price currency" type="text" name="additional_floor_day6" value="<?php echo isset($info['additional_floor_day6'])?$info['additional_floor_day6']:'0.00'; ?>" style="width:90%; border:0; text-align:right;"></td>
								</tr>
								<tr>
									<td style="width:50%; padding:5px;"><input type="text" name="additional_floor_day7" value="<?php echo isset($info['additional_floor_day7'])?$info['additional_floor_day7']:''; ?>" style="width:90%; border:0; text-align:right;"></td>
									<td style="width:50%; padding:5px;">$<input class="total_price currency" type="text" style="width:90%; border:0; text-align:right;" name="additional_floor_day8" value="<?php echo isset($info['additional_floor_day8'])?$info['additional_floor_day8']:'0.00'; ?>"></td>
								</tr>
								
								<tr>
									<td style="width:50%; padding:5px;">
										<ol style="margin:0; padding:5px 0 0 20px;">
											<li>Total price per unit</li>
											<li>QTY</li>
											<li>Deposit/Down Payment<br>
												<input name="deposit_down_payment" type="radio" value="Cash" <?php echo ($info['deposit_down_payment'] == "Cash")?"checked":""; ?> > Cash
												<input type="radio"  name="deposit_down_payment" value="Check" <?php echo ($info['deposit_down_payment'] == "Check")?"checked":""; ?>  > Check
										
											</li>
											<li>Net trade-in</li>
										</ol>
									</td>
									<td style="width:50%; padding:0px; border-collapse:collapse; vertical-align:top">
										<table style="width:100%; border-collapse:collapse; border-top:0;" border="1" cellpadding="0" cellspacing="0">
											<tr>
												<td>$<input style="width:90%; border:0; text-align:right;" type="text" id="field2_totalprice" style=" padding:6px; border:0; float:right; text-align:right;" name="field2_totalprice" value="<?php echo isset($info['field2_totalprice'])?$info['field2_totalprice']:''; ?>" ></td>
											</tr>
											<tr>
												<td><input type="text" style="padding:6px; border:0; float:right; text-align:right;" name="field3_qty" id="field3_qty" value="<?php echo isset($info['field3'])?$info['field3']:''; ?>"></td>
											</tr>
											<tr>
												<td><input type="text" name="field4_deposit_downpay" id="field4_deposit_downpay" value="<?php echo isset($info['field4_deposit_downpay'])?$info['field4_deposit_downpay']:''; ?>" style="padding:6px; border:0; float:right; text-align:right;"></td>
											</tr>
											<tr>
												<td><input type="text" style="padding:6px; border:0; float:right; text-align:right;" name="field5_netcal" id="field5_netcal" value="<?php echo isset($info['field5_netcal'])?$info['field5_netcal']:''; ?>" ></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="width:50%; padding:5px;">
										<h3 style="font-size:13px; margin:0; padding:0;">UNPAID BALANCE DUE ON DELIVERY</h3>
										<span style="font-size:11px;">(difference between items 1 and 5)</span>
									</td>
										<td style="width:50%; padding:5px;">$<input type="text" id="unpaid_delivery" name="unpaid_delivery" value="<?php echo isset($info['unpaid_delivery'])?$info['unpaid_delivery']:''; ?>"  style="width:90%; border:0; text-align:right;"></td>
								</tr>
							</table>
						</td>
						
						<td style="width:50%; vertical-align:top;">
							<table style="width:100%; border-collapse:collapse" border="1" cellpadding="0" cellspacing="0">
								<tbody>
								<tr>
									<td style="width:100%; padding:7px 5px 6px;font-size:16px"><strong><center>USED TRADE-IN AND/OR OTHER CREDITS</center></strong></td>
									
								</tr>
								<tr>
									<td>
										<ol style="margin:0; padding:14px 0 0px 30px;">
											<li>NO BROKEN GLASS OR BODY DAMAGE OVER $250.00</li>
											<li>MUST PASS CURRENT DOT INSPECTION</li>
											<li>ALL TIRES TO BE 15/32 OR BETTER & MATCHING TREAD</li>
											<li>ALL BRAKES TO BE 50% OR BETTER</li>
											<li>DRIVE TRAIN TO BE IN GOOD RUNNING ORDER</li>
											<li>SUBJECT TO DYNO PER McCOY FREIGHTLINER’S STANDARDS</li>
										</ol>
										<h3 style="margin:0px 0px 0px 2px; padding:5px 5px 6px 5px;">PURCHASER’S INITIALS:</h3>
									</td>
								</tr>
								<tr>
									<td><table style="width:100%; border-collapse:collapse;" border="1" cellpadding="0" cellspacing="0">
										<tbody>
										<tr style="border-top:0;">
											<td style="padding:5px; border:0;"><strong>Trade-In:</strong> <input  name="trade_in" value="<?php echo isset($info['trade_in'])?$info['trade_in']:''; ?>"  type="text" style=" border:0; text-align:left;"></td>
										</tr>
										<tr>
											<td><table style="width:100%; border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
												<tbody><tr>
												<td style="padding:5px;"><strong>Make of Trade-In:</strong> <input  name="make_trade_in" value="<?php echo isset($info['make_trade_in'])?$info['make_trade_in']:''; ?>" type="text" style=" border:0; text-align:left;"></td>
												<td style="padding:5px;"><strong>QTY:</strong> <input  name="qty" value="<?php echo isset($info['qty'])?$info['qty']:''; ?>"  type="text" style=" border:0; text-align:left;"></td>
											</tr></tbody></table></td>
										</tr>
										<tr><td style="padding:5px;"><strong>VIN:</strong> <input  name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>"  type="text" style=" border:0; text-align:left;"></td></tr>
										<tr><td style="padding:5px;"><strong>Balance Owed To:</strong> <input   name="balance_owed_to" value="<?php echo isset($info['balance_owed_to'])?$info['balance_owed_to']:''; ?>"  type="text" style=" border:0; text-align:left;"></td></tr>
										<tr><td style="padding:5px;"> <input type="text" style=" border:0; text-align:left;" name="custom_field13" value="<?php echo isset($info['custom_field13'])?$info['custom_field13']:''; ?>" ></td></tr>
										<tr><td style="padding:5px;"><input type="text" style=" border:0; text-align:left;" name="custom_field14" value="<?php echo isset($info['custom_field14'])?$info['custom_field14']:''; ?>" ></td></tr>
										<tr><td style="padding:5px;"><input type="text" style=" border:0; text-align:left;" name="custom_field15" value="<?php echo isset($info['custom_field15'])?$info['custom_field15']:''; ?>" ></td></tr>
										<tr>
											<td style="padding:0px;">
												<table style="width:100%; border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
												<tbody>
													<tr><td style="width:60%; padding:8px 5px; border:0;"><strong>Used Trade-In Allowance, Each:</strong></td>
												<td style="padding:5px; border-left:1px solid #4c4c4c"><input  class="price2 currency"  name="used_trade_allowance" value="<?php echo isset($info['used_trade_allowance'])?$info['used_trade_allowance']:$info['used_trade_allowance']; ?>"  type="text" style=" border:0; text-align:left;"></td>
												</tr></tbody></table>
											</td>
										</tr>
										<tr>
											<td style="padding:0px;">
												<table style="width:100%; border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
												<tbody>
													<tr><td style="width:60%; padding:8px 5px; border:0;"><strong>Balance Owed on Trade-in:</strong></td>
												<td style="padding:5px; border-left:1px solid #4c4c4c"><input  name="balance_owed_trade_in" class="price2 currency" value="<?php echo isset($info['balance_owed_trade_in'])?$info['balance_owed_trade_in']:''; ?>"  type="text" style=" border:0; text-align:left;"></td>
												</tr></tbody></table>
											</td>
										</tr>
										<tr>
											<td style="padding:0px;">
												<table style="width:100%; border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
												<tbody>
													<tr><td style="width:60%; padding:8px 5px; border:0;"><strong>Net Allowance on Used Trade-In:</strong></td>
												<td style="padding:5px; border-left:1px solid #4c4c4c"><input  name="net_allowance_trade_in"  id="net_allowance_trade_in"  value="<?php echo isset($info['net_allowance_trade_in'])?$info['net_allowance_trade_in']:''; ?>"  type="text" style=" border:0; text-align:left;"></td>
												</tr></tbody></table>
											</td>
										</tr>
										<tr>
											<td style="padding:0px;">
												<table style="width:100%; border-collapse:collapse" border="0" cellpadding="0" cellspacing="0">
												<tbody>
													<tr><td style="width:60%; padding:8px 5px; border:0;"><strong>Deposit or Credit Balance:</strong></td>
												<td style="padding:5px; border-left:1px solid #4c4c4c"><input id="deposit_balance" class="price1 currency"  name="deposit_balance" value="<?php echo isset($info['deposit_balance'])?$info['deposit_balance']:''; ?>" type="text" style=" border:0; text-align:left;"></td>
												</tr>
												<tr><td style="width:60%; padding:8px 5px; border:0;"><strong>Down Payment (transfer to left column):</strong></td>
												<td style="padding:5px; border-left:1px solid #4c4c4c"><input id="down_payment_transfer" class="price1 currency"  name="down_payment_transfer" value="<?php echo isset($info['down_payment_transfer'])?$info['down_payment_transfer']:''; ?>" type="text" style=" border:0; text-align:left;"></td>
												</tr>
												</tbody></table>
											</td>
										</tr>
										</tbody>
									</table></td>
								</tr>
								</tbody>
							</table>
						</td>
						</tr>
						</tbody>
					</table>
				</td>
			</tr>	
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0" border="1" style="width:100%; border-collapse:collapse;">
						<tbody>
							<tr>
								<td style="width:65%;">
									<table style="width:100%; border:0px solid #000;">
										<tbody>
											<tr>
												<td style="width:100%;">
													<h3 style="margin:0; padding:5px 0px 5px 0px; text-align:center;">DISCLAIMER OF WARRANTIES:</h3>
													Any warranties on the products sold hereby, are the warranties of the manufacturer of those products. The Seller, McCoy Freightliner, neither assumes nor warranties, either express or implied, including any implied warranty of merchantability or fitness for a particular purpose, and McCoy Freightliner neither assumes nor authorizes any other person to assume for it, any liability in connection with the sale of the vehicle. This disclaimer does not affect manufacturer’s warranty on this unit.
													
													
									<p style="font-size:11px; font-weight:bolder; margin:10px 0px 0px 0px; padding:0px 0px 0px 5px;border-bottom:1px solid #000;"><b>X</b></p>
													<p style="font-size:11px; text-align:center; margin:0; padding:0;">Purchaser’s Signature</p>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
						<td style="width:35%; vertical-align:top;">
							<table cellspacing="0" cellpadding="0" border="1" style="width:100%; border-collapse:collapse; ">
								<tbody>
									<tr>
									<td style="width:60%; padding:5px;">I have been made aware of the many extended warranty options that are available to me and have elected to:</td>
									<td style="width:40%; padding:5px;">
										<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse:collapse; ">
											<tbody>
												<tr><td>Accept </td></tr>
												<tr><td>Decline </td></tr>
												<tr><td style="width:30%;">Initial</td><td style="width:70%;"><input style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td></td></tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody></table>
							
							<table cellspacing="0" cellpadding="0" border="1" style="width:100%; border-collapse:collapse; ">
								<tbody>
									<tr>
									<td style="width:60%; padding:5px;">I have been made aware of the many McCoy in house finance and lease options available to me and have elect-ed to:</td>
									<td style="width:40%; padding:5px;">
										<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse:collapse; ">
											<tbody>
												<tr><td>Accept</td></tr>
												<tr><td>Decline </td></tr>
												
												<tr><td style="width:30%;">Initial</td><td style="width:70%;"><input style="width:100%; border:0; border-bottom:1px solid #000;" type="text"></td></td></tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody></table>
						</td></tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse:collapse;">
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
				<td style="width:50%;">
					<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse:collapse;">
						<tbody>
							<tr>
								<td>
									<p style="font-size:11px; margin:0; padding:0;">&nbsp;</p>
									<hr style="margin:0; padding:0;">
									<p style="font-size:11px; margin:0; padding:0;">Purchaser’s Signature</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td style="width:50%;">
					<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse:collapse;">
						<tbody>
							<tr>
								<td>
									<p style="font-size:11px; margin:0; padding:0;">ACCEPTED BY</p>
									<hr style="margin:0; padding:0;">
									<p style="font-size:11px; margin:0; padding:0;text-align:center;"> DEALER OR ITS AUTHORIZED REPRESENTATIVE</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				</tbody>
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
	
	
	$('input.currency').on('keyup',function(){
		
		if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
		
        $(this).val(function(index, value) {
			value = value.replace(/^0+/, "");
            return convertFormatedMoney(value);
        });
	});
	
	function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\-]/g,"")
				  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
				  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
	}
	$(".total_price").on('keyup',function(){
		
		var valdata = 0;
		$( ".total_price" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			//alert(totalcount);
			if(totalcount != "")
			{
				valdata = valdata + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);
		$("#field2_totalprice").val(convertFormatedMoney(valdata.toFixed(2)));
	});
	
	$(".price1").on('keyup',function(){
		
		var valdata = 0;
		$( ".price1" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			//alert(totalcount);
			if(totalcount != "")
			{
				valdata = valdata + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);
		$("#field4_deposit_downpay").val(convertFormatedMoney(valdata.toFixed(2)));
		
		var unpaid = $("#unpaid_delivery").val();
		var valdata1 = valdata.toFixed(2);
		//alert(unpaid);
		//alert(valdata1);
		unpaid = unpaid.replace(/,/g, '');
		valdata1 = valdata1.replace(/,/g, '');
		diff = unpaid - valdata1;
		$("#unpaid_delivery").val(convertFormatedMoney(diff.toFixed(2)));
		
	});
	$(".price2").on('keyup',function(){
		
		var valdata = 0;
		$( ".price2" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			//alert(totalcount);
			if(totalcount != "")
			{
				valdata = valdata + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);field5_netcal
		$("#net_allowance_trade_in").val(convertFormatedMoney(valdata.toFixed(2)));
		$("#field5_netcal").val(convertFormatedMoney(valdata.toFixed(2)));
		
		var unpaid = $("#unpaid_delivery").val();
		var valdata1 = valdata.toFixed(2);
		unpaid = unpaid.replace(/,/g, '');
		valdata1 = valdata1.replace(/,/g, '');
		diff = unpaid - valdata1;
		$("#unpaid_delivery").val(convertFormatedMoney(diff.toFixed(2)));
		
	});
	$('#field3_qty').on('keyup',function(){
		qty = $(this).val();
		totalval = $("#field2_totalprice").val();
		totalval = totalval.replace(/,/g, '');
		qtycal = totalval*qty;
		//alert(qtycal);
		$("#unpaid_delivery").val(convertFormatedMoney(qtycal.toFixed(2)));
	});
	$('.additional_floor_day').on('keyup',function(){
		//alert('test');
		base_unitval = $("#base_price_unit").val();
		floorval = $(this).val();
		additionalval = ((0.065/360)*base_unitval)*floorval;
		
		$("#additional_floor_day2").val(additionalval.toFixed(2));
		$("#additional_floor_day2").trigger("keyup");
	});
	
	
		
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
