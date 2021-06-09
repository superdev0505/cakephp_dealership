<?php
$dealer_not_tax_payoff = array(2501,576);

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
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	
	input[type="text"]{
		height :20px!important;
		border :none;
		border-bottom : 1px solid #000;
	}
}
body {
    margin: 0;
    padding: 0;
    font-family: arial;
    font-size: 13px;
}
* {
    margin: 0;
    padding: 0;
}
img {
    border: none;
}
h1 {
    font-size: 28px;
    margin: 0 0 10px;
}
h2 {
    font-size: 24px;
    margin: 0 0 10px;
}
h3 {
    font-size: 20px;
    margin: 0 0 10px;
}
h4 {
    font-size: 18px;
    margin: 0 0 10px;
}
h5 {
    font-size: 16px;
    font-weight: normal;
    margin: 0 0 10px;
}
h6 {
    font-size: 5px;
}
p {
    margin: 0 0 5px;
}
.row {
    float: left;
    width: 100%;
    margin: 0;
}
.container {
    margin: 0 auto;
    width: 1170px;
}
hr {
    margin: 5px 0;
    color: #bcbcbc;
}
.top-head{
	margin:25px 0 0;
}
.col-lg-5 {
    float: left;
    width: 40%;
    padding: 0 1%;
    box-sizing: border-box;
}
.col-lg-6 {
    float: left;
    width: 50%;
    padding: 0 1%;
    box-sizing: border-box;
}
.col-lg-7 {
    float: left;
    width: 60%;
    padding: 0 1%;
    box-sizing: border-box;
}
table {
    border-collapse: collapse;
    width: 100%;
    border-spacing: 0px;
}
table tr {
}
table tr td {
    border: 1px solid #ccc;
    padding: 3px 2px;
	font-size:15px;
    vertical-align: top;
}
table.noborder tr {
	border-top:1px solid #9c9c9c;
	margin:0 0 20px;
}
table.noborder tr td {
    border: 0px solid #ccc;
	padding-bottom:5px;
}
.rotate{
	transform:rotate(-90deg);
	-moz-transform:rotate(-90deg);
	-o-transform:rotate(-90deg);
	text-align:center;
	vertical-align:middle;
	-webkit-transform:rotate(-90deg);
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
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
         <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  />	
        
        
        
			<div class="row top-head">
		<div class="col-lg-5">
			<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo_new.png'); ?>" alt="">
			<br><br>
			<table class="noborder">
				<tbody>
					<tr>
						<td>SALESPERSON&nbsp;&nbsp;<input  style="width:250px;"   type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : $info['sperson'] ?>" /></td>
					</tr>
					<tr>
						<td>SALESPERSON&nbsp;&nbsp;<input  style="width:250px;"   type="text" name="sales_pname2" value="<?php echo isset($info['sales_pname2']) ? $info['sales_pname2'] : $info['sperson'] ?>" /></td>
					</tr>
					<tr>
						<td>STOCK # <input  style="width:100px;"   type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : "" ?>" /></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-7">
			<table class="noborder">
				<tbody>
					<tr>
						<td colspan="2">CUSTOMER #<input  style="width:100px;"   type="text" name="cust" value="<?php echo isset($info['cust']) ? $info['cust'] : $info['contact_id']; ?>" /></td>
						<td>DEAL # <input  style="width:100px;"   type="text" name="deal" value="<?php echo isset($info['deal']) ? $info['deal'] : "" ?>" /></td>
						<td>DATE # <input  style="width:100px;"   type="text" name="submit_dt" value="<?php echo isset($info['submit_dt']) ? $info['submit_dt'] : "" ?>" /></td>
					</tr>
					<tr>
						<td colspan="3">PURCHASER'S NAME AS IT WILL APPEAR ON TITLE
                        <input  style="width:100%;"   type="text" name="customer_name" value="<?php echo isset($info['customer_name']) ? $info['customer_name'] :$info['first_name'].' '.$info['last_name']; ?>" />
                        </td>
						<td >DL #<input  style="width:100%;"   type="text" name="dl1" value="<?php echo isset($info['dl1']) ? $info['dl1'] : "" ?>" /></td>
					</tr>
					<tr>
						<td colspan="3">CO-PURCHASER'S NAME AS IT WILL APPEAR ON TITLE
                        <input  style="width:100%;"   type="text" name="customer_name2" value="<?php echo isset($info['customer_name2']) ? $info['customer_name2'] :$info['spouse_first_name'].' '.$info['spouse_last_name']; ?>" />
                        </td>
						<td >DL #<input  style="width:100%;"   type="text" name="dl2" value="<?php echo isset($info['dl2']) ? $info['dl2'] : "" ?>" /></td>
					</tr>
					<tr>
						<td colspan="4">STREET ADDRESS&nbsp;&nbsp;<input  style="width:430px;"   type="text" name="street_address" value="<?php echo isset($info['street_address']) ? $info['street_address'] : "" ?>" /></td>
					</tr>
					<tr>
						<td>CITY <input  style="width:100%;"   type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : "" ?>" /></td>
						<td>COUNTY<input  style="width:100%;"   type="text" name="country" value="<?php echo isset($info['country']) ? $info['country'] : "" ?>" /></td>
						<td>STATE<input  style="width:90%;"   type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : "" ?>" /></td>
						<td>ZIP CODE<input  style="width:100%;"   type="text" name="zip_code" value="<?php echo isset($info['zip_code']) ? $info['zip_code'] : "" ?>" /></td>
					</tr>
					<tr>
						<td colspan="2">HOME PHONE/CELL PHONE <input  style="width:100px;"   type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>" /></td>
						<td colspan="2">E-MAIL ADDRESS<br><input  style="width:100%;"   type="text" name="email" value="<?php echo isset($info['email']) ? $info['email'] : "" ?>" /></td> 
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<table style="margin-bottom:10px;margin-left:20px;">
			<tbody>
				<tr>
					<td colspan="2">MAKE <input  style="width:100%;"   type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : "" ?>" /></td>
					<td colspan="2">MODEL <input  style="width:100%;"   type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : "" ?>" /></td>
					<td>
						<input type="radio"  name="condition" value="New" <?php echo ($info['condition'] == "New")?"checked":""; ?>> New
						<input type="radio"  name="condition" value="Used" <?php echo ($info['condition'] == "Used")?"checked":""; ?>> Used
						<input type="radio"  name="condition" value="Demo" <?php echo ($info['condition'] == "Demo")?"checked":""; ?>> Demo
					
					</td>
					<td>COLOR <input  style="width:100%;"   type="text" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : "" ?>" /></td>
					<td>MILEAGE<input  style="width:100%;"   type="text" name="odometer" value="<?php echo isset($info['odometer']) ? $info['odometer'] : "" ?>" /></td>
					<td>YEAR<input  style="width:100%;"   type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">VIN # &nbsp;<input  style="width:80%;"   type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : "" ?>" /></td>
					<td colspan="2">TO BE DELIVERED<br>ON OR ABOUT:</td>
				</tr>
				<tr>
					<td align="right" colspan="6">Vehicle Price</td>
					<td colspan="2"><input class="price_val" style="width:95%;"   type="text" name="unit_value" value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : "" ?>" /></td>
				</tr>
				<tr>
					<td  colspan="6">
					<input  style="width:95%;"   type="text" name="custom_label" value="<?php echo isset($info['custom_label']) ? $info['custom_label'] : "" ?>" />
					</td>
					<td colspan="2"><input class="price_val"   style="width:95%;"   type="text" name="custom_1" value="<?php echo isset($info['custom_1']) ? $info['custom_1'] : "" ?>" /></td>
				</tr>
				<tr>
					<td  colspan="6">
					<input  style="width:95%;"   type="text" name="custom_label1" value="<?php echo isset($info['custom_label1']) ? $info['custom_label1'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;"  type="text" name="custom_2" value="<?php echo isset($info['custom_2']) ? $info['custom_2'] : "" ?>" /></td>
				</tr>
				<tr>
					<td  colspan="6">
					<input  style="width:95%;"   type="text" name="custom_label2" value="<?php echo isset($info['custom_label2']) ? $info['custom_label2'] : "" ?>" />
					
					</td>
					<td colspan="2"><input  class="price_val"  style="width:95%;"   type="text" name="custom_3" value="<?php echo isset($info['custom_3']) ? $info['custom_3'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input  style="width:95%;"   type="text" name="custom_label3" value="<?php echo isset($info['custom_label3']) ? $info['custom_label3'] : "" ?>" />
					
					</td>
					<td colspan="2"><input  class="price_val"  style="width:95%;" type="text" name="custom_4" value="<?php echo isset($info['custom_4']) ? $info['custom_4'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input  style="width:95%;" type="text" name="custom_label4" value="<?php echo isset($info['custom_label4']) ? $info['custom_label4'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_5" value="<?php echo isset($info['custom_5']) ? $info['custom_5'] : "" ?>" /></td>
				</tr>
				<tr>
					<td  colspan="6">
					<input  style="width:95%;"  type="text" name="custom_label5" value="<?php echo isset($info['custom_label5']) ? $info['custom_label5'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_6" value="<?php echo isset($info['custom_6']) ? $info['custom_6'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input  style="width:95%;"  type="text" name="custom_label6" value="<?php echo isset($info['custom_label6']) ? $info['custom_label6'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"   style="width:95%;" type="text" name="custom_7" value="<?php echo isset($info['custom_7']) ? $info['custom_7'] : "" ?>" /></td>
				</tr>
				<tr>
					<td  colspan="6">
					<input  style="width:95%;" type="text" name="custom_label7" value="<?php echo isset($info['custom_label7']) ? $info['custom_label7'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"   style="width:95%;" type="text" name="custom_8" value="<?php echo isset($info['custom_8']) ? $info['custom_8'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input  style="width:95%;"  type="text" name="custom_label8" value="<?php echo isset($info['custom_label8']) ? $info['custom_label8'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_9" value="<?php echo isset($info['custom_9']) ? $info['custom_9'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input style="width:95%;" type="text" name="custom_label9" value="<?php echo isset($info['custom_label9']) ? $info['custom_label9'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_10" value="<?php echo isset($info['custom_10']) ? $info['custom_10'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6">
					<input  style="width:95%;" type="text" name="custom_label10" value="<?php echo isset($info['custom_label10']) ? $info['custom_label10'] : "" ?>" />
					
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;"  type="text" name="custom_11" value="<?php echo isset($info['custom_11']) ? $info['custom_11'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6"><input  style="width:95%;"   type="text" name="custom_label11" value="<?php echo isset($info['custom_label11']) ? $info['custom_label11'] : "" ?>" />
					</td>
					<td colspan="2"><input  class="price_val"  style="width:95%;" type="text" name="custom_12" value="<?php echo isset($info['custom_12']) ? $info['custom_12']: "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="6"><input style="width:95%;" type="text" name="custom_label12" value="<?php echo isset($info['custom_label12']) ? $info['custom_label12'] : "" ?>" />
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_13" value="<?php echo isset($info['custom_13']) ? $info['custom_13'] : "" ?>" /></td>
				</tr>
				<tr>
					<td align="right" colspan="6"><input style="width:95%;"  type="text" name="custom_label13" value="<?php echo isset($info['custom_label']) ? $info['custom_label'] : "" ?>" />
					</td>
					<td colspan="2"><input class="price_val"  style="width:95%;" type="text" name="custom_14" value="<?php echo isset($info['custom_14']) ? $info['custom_14'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="5"></td>
					<td align="right" style="width:150px;">TOTAL</td>
					<td colspan="2"><input class="total_val" style="width:95%;"  type="text" name="total" value="<?php echo isset($info['total']) ? $info['total'] : $info['unit_value']?>" /></td>
				</tr>
				<tr>
					<td class="rotate" rowspan="4">STOCK#</td>
					<td colspan="4">MRA ? Y/N 
						<input type="radio"  name="mra1" value="Yes" <?php echo ($info['mra1'] == "Yes")?"checked":""; ?>> Yes
						<input type="radio"  name="mra1" value="No" <?php echo ($info['mra1'] == "No")?"checked":""; ?>> No
				
					</td>
					<td>TAX</td>
					<td colspan="2"><input style="width:95%;"  type="text" name="tax" value="<?php echo isset($info['tax']) ? $info['tax'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="1">MAKE<input  style="width:100%;"   type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : "" ?>" /></td>
					<td>MODEL<input  style="width:100%;" type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ""; ?>" /></td>
					<td>COLOR<input  style="width:100%;" type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : "" ?>" /></td>
					<td>YEAR<input  style="width:100%;" type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : "" ?>" /></td>
					<td>DEALER'S BUSINESS<br>LICENSE TAX</td>
					<td colspan="2"><input style="width:100%;" type="text" name="license_tax" value="<?php echo isset($info['license_tax']) ? $info['license_tax'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">VIN #<input  style="width:100%;" type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : "" ?>" /></td>
					<td>MILEAGE<input style="width:100%;" type="text" name="odometer_trade" value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] : "" ?>" /></td>
					<td>TAG# / EXP<input  style="width:100%;" type="text" name="tag2" value="<?php echo isset($info['tag2']) ? $info['tag2'] : "" ?>" /></td>
					<td>TITLE</td>
					<td colspan="2"><input style="width:100%;" type="text" name="title" value="<?php echo isset($info['title']) ? $info['title'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">PAYOFF DUE TO:<input  style="width:100%;"  type="text" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff'] : "" ?>" /></td>
					<td>PHONE#<input style="width:100%;"    type="text" name="contact" value="<?php echo isset($info['contact']) ? $info['contact'] : "" ?>" /></td>
					<td>AMOUNT<input  style="width:100%;" type="text" name="amount" value="<?php echo isset($info['amount']) ? $info['amount'] : "" ?>" /></td>
					<td>NEW/TRANSFER<br>TAGS</td>
					<td colspan="2"><input  style="width:100%;" type="text" name="transfer" value="<?php echo isset($info['transfer']) ? $info['transfer'] : "" ?>" /></td>
				</tr>
				<tr>
					<td class="rotate" rowspan="4">STOCK#</td>
					<td colspan="4">MRA ? Y/N
					<input type="radio"  name="mra2" value="Yes" <?php echo ($info['mra2'] == "Yes")?"checked":""; ?>> Yes
						<input type="radio"  name="mra2" value="No" <?php echo ($info['mra2'] == "No")?"checked":""; ?>> No
				
					</td>
					<td>PROCESSING FEE</td>
					<td colspan="2"><input  style="width:100%;" type="text" name="process_fee" value="<?php echo isset($info['process_fee']) ? $info['process_fee'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="1">MAKE<input  style="width:100%;" type="text" name="make2" value="<?php echo isset($info['make2']) ? $info['make2'] : "" ?>" /></td>
					<td>MODEL<input  style="width:100%;" type="text" name="model2" value="<?php echo isset($info['model2']) ? $info['model2'] : "" ?>" /></td>
					<td>COLOR<input  style="width:100%;" type="text" name="color2" value="<?php echo isset($info['color2']) ? $info['color2'] : "" ?>" /></td>
					<td>YEAR<input  style="width:100%;" type="text" name="year2" value="<?php echo isset($info['year2']) ? $info['year2'] : "" ?>" /></td>
					<td>TOTAL DELIVERED<br>PRICE</td>
					<td colspan="2"><input  style="width:100%;"  type="text" name="price" value="<?php echo isset($info['price']) ? $info['price'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">VIN #<input  style="width:100%;" type="text" name="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : "" ?>" /></td>
					<td>MILEAGE<input  style="width:100%;" type="text" name="mileage3" value="<?php echo isset($info['mileage3']) ? $info['mileage3'] : "" ?>" /></td>
					<td>TAG# / EXP<input style="width:100%;" type="text" name="tag3" value="<?php echo isset($info['tag3']) ? $info['tag3'] : "" ?>" /></td>
					<td>ALLOWANCE</td>
					<td colspan="2"><input style="width:100%;" type="text" name="allowance" value="<?php echo isset($info['allowance']) ? $info['allowance'] : "" ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">PAYOFF DUE TO:<input  style="width:100%;"    type="text" name="payoff2" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : "" ?>" /></td>
					<td>PHONE#<input  style="width:100%;"   type="text" name="contact_num" value="<?php echo isset($info['contact_num']) ? $info['contact_num'] : "" ?>" /></td>
					<td>AMOUNT<input style="width:100%;"   type="text" name="amt" value="<?php echo isset($info['amt']) ? $info['amt'] : "" ?>" /></td>
					<td>PAYOFF</td>
					<td colspan="2"><input  style="width:100%;"  type="text" name="poff" value="<?php echo isset($info['poff']) ? $info['poff'] : "" ?>" /></td>
				</tr>
				<tr>
					<td rowspan="6" colspan="5">
						*Purchaser certifies that he or she is 18 years of age or older.<br>
						*This is not valid unless signed and accepted by the Dealer or his authorized representative.<br>
						*All payments are subject to credit approval.<br><br>
						<table class="noborder">
							<tbody>
								<tr><td colspan="3">APPROVED<input  style="width:60%;"    type="text" name="approved" value="<?php echo isset($info['approved']) ? $info['approved'] : "" ?>" /></td></tr>
								<tr><td></td><td>DEALER OR AUTHORIZED REPRESENTATIVE<input  style="width:120px;"   type="text" name="dealer_date" value="<?php echo isset($info['dealer_date']) ? $info['dealer_date'] : "" ?>" />	</td><td>DATE<input  style="width:100px;"   type="text" name="dealer_authority" value="<?php echo isset($info['dealer_authority']) ? $info['dealer_authority'] : "" ?>" /></td></tr>
								<tr><td colspan="2">SIGNATURE OF PURCHASER<input  style="width:160px;"   type="text" name="purchaser_sign1" value="<?php echo isset($info['purchaser_sign1']) ? $info['purchaser_sign1'] : "" ?>" /></td><td>DATE OF BIRTH<input  style="width:100px;"   type="text" name="purchaser_dob" value="<?php echo isset($info['purchaser_dob']) ? $info['purchaser_dob'] : "" ?>" /></td></tr>
								<tr><td colspan="2">SIGNATURE OF CO-PURCHASER<input  style="width:150px;"   type="text" name="purchaser_sign2" value="<?php echo isset($info['purchaser_sign2']) ? $info['purchaser_sign2'] : "" ?>" /></td><td>DATE OF BIRTH<input  style="width:100px;"   type="text" name="dob_purchaser" value="<?php echo isset($info['dob_purchaser']) ? $info['dob_purchaser'] : "" ?>" /></td></tr>
							</tbody>
						</table>
					</td>
					<td>NET TRADE</td>
					<td colspan="2"><input  style="width:95%;"    type="text" name="net_trade" value="<?php echo isset($info['net_trade']) ? $info['net_trade'] : "" ?>" /></td>
				</tr>
				<tr>
					<td>REBATES</td>
					<td colspan="2"><input  style="width:95%;"    type="text" name="rebate" value="<?php echo isset($info['rebate']) ? $info['rebate'] : "" ?>" /></td>
				</tr>
				<tr>
					<td>CASH DOWN</td>
					<td colspan="2"><input style="width:95%;" type="text" name="cashdown" value="<?php echo isset($info['cashdown']) ? $info['cashdown'] : "" ?>" /></td>
				</tr>
				<tr>
					<td>TOTAL CREDITS</td>
					<td colspan="2"><input style="width:95%;"  type="text" name="total_credit" value="<?php echo isset($info['total_credit']) ? $info['total_credit'] : "" ?>" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>BALANCE DUE</td>
					<td colspan="2"><input  style="width:95%;"   type="text" name="balance_due" value="<?php echo isset($info['balance_due']) ? $info['balance_due'] : "" ?>" /></td>
				</tr>
			</tbody>
		</table>
	</div>
		</div>
		<!---left1-->
		</br>
        <span class="span24" style="width:28%">Sales Person &nbsp;<input type="text" name="sperson" value="<?php echo $contact['Contact']['sperson']; ?>" style="display:inline;" /></span>
         <span class="span24" style="width:40%"><p align="center">@<?php echo AuthComponent::user('dealer'); ?>&nbsp;Worksheet&nbsp;<br /><?php echo date('M d, Y h:i A'); ?></p></span>
         <span class="span24" style="width:28%">Signature &nbsp;<input type="text"  value="" style="display:inline;width:200px;" /></span>
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
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	var actual_balance = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	
	function calculateProfit()
	{
		profitOption=$("#profitOption").val();
		if(profitOption=='cost_sell')
		{
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
		}
		else
		{
			freight=($("#freight").val()=='')?0:parseFloat($("#freight").val());
			prep=($("#prep").val()=='')?0:parseFloat($("#prep").val());
			doc=($("#doc").val()=='')?0:parseFloat($("#doc").val());
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
			profit=parseFloat(profit+parseFloat(freight)+parseFloat(prep)+doc);
		}
		$("#profit").val(profit.toFixed(2));
		
	}
	$("#profitOption").on('change',function(){
											calculateProfit();
											
											});
	$("#calculateDown").on('click',function(){
											calculate_initial_investment();
											//alert(actual_balance);
											
											});
	$(".priceChange").on('change keyup paste',function(){
									 
									 tax_percent=$("#tax_percent").val();
									 if($("#est_payoff").val()!='');
									 update_10days_payoff();
									 if($("#doc").val()!=''&&$("freight").val()!='')
									 calculate_tax(tax_percent);
									 
									 });
									 
	$(".payment_print_option").on('change',function(){
		$val = $(this).val();
		if($(this).is(':checked'))
		{
			$("#"+$val).removeClass('noprint');	
		}else{
			$("#"+$val).addClass('noprint');
		}
	});
											 
	
	$("#cost").on('change keyup paste',function(){
									calculateProfit();
									});
	
	$(".tradeDiff").on('change keyup paste',function(){
											   allowance=parseFloat($("#trade_allowance").val());
											   if(isNaN(allowance))
											   {
												  allowance=0; 
											   }
											   est_payoff=parseFloat($("#est_payoff").val());
											   if(isNaN(est_payoff))
											   {
												  est_payoff=0; 
											   }
											   sell_price=parseFloat(actual_value-allowance);	
									
										
										 $("#sub_total").val(sell_price.toFixed(2));	   
											  /* if(allowance!='')
											   {*/
												  /* if(allowance.match(/^[0-9]+(\.[0-9]*)?$/))
												   {*/
													  
													   calculateProfit();
													   tax_percent=$("#tax_percent").val();
													   if($("#est_payoff").val()!='');
													   update_10days_payoff();
													 if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
													/*}else
												   {
													   alert("Please enter the correct amount in trade allowance");
													   $(this).focus();
												   }*/
											 /*  }
											   else
											   {
												    $("#sell_price").val(parseFloat(actual_value).toFixed(2));
													profit=parseFloat(actual_value-$("#cost").val());
												    $("#profit").val(profit.toFixed(2));
													tax_percent=$("#tax_percent").val();
													if($("#est_payoff").val()!='');
													if($("#doc").val()!=''&&$("freight").val()!='')
													calculate_tax(tax_percent);
													update_10days_payoff();
													
											   }*/
											   
											   });
		
	$("#sell_price").on('change keyup paste',function(){
											   price=parseFloat($(this).val());
											   if(isNaN(price))
											   price =0.00;
											   actual_value=price;
											   //allowance=$("#trade_allowance").val();
											   /*if(allowance.match(/^[0-9]+(\.[0-9]+)?$/))
											   {*/
												  // new_bal=parseFloat(price-parseFloat(allowance));
												  // new_bal=new_bal.toFixed(2);
												   //$("#sell_price").val(new_bal);
												 //  profit=parseFloat(new_bal-$("#cost").val());
												  // $("#profit").val(profit.toFixed(2));
											  /* }*/
											  actual_value=price;
											  calculateProfit();
											   tax_percent=$("#tax_percent").val();
											  if($("#est_payoff").val()!='');
												if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
											   			// update_10days_payoff();
											   });

	function calculate_tax(tax_value){
		var tax_type = $('input:radio[name=taxopt]:checked').val();
		
		/*var freight = parseFloat( $('#freight').val() );
		var prep = parseFloat( $('#prep').val() );
		var doc = parseFloat( $('#doc').val() );
		var part_serv = parseFloat( $('#part_serv').val() );
		var tag_tit = parseFloat( $('#tag_tit').val() );*/
		var sell_price = isNaN(parseFloat( $("#sell_price").val()))?0.00:parseFloat( $("#sell_price").val());
		var trade_allowance = isNaN(parseFloat( $("#trade_allowance").val()))?0.00:parseFloat( $("#trade_allowance").val());
		amount = sell_price- trade_allowance;
		if(tax_type == 'tax_vehicle_only'){
			var amount = amount;
		}else{
			//var amount = freight+prep+part_serv+sell_price; 
			amount = amount ;
		}
		$("#sub_total").val(amount.toFixed(2));
		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		$('#tax').val( amountIncludingTax );
		
		//actual_balance = freight+prep+doc+part_serv+tag_tit+sell_price+parseFloat(amountIncludingTax); 
		actual_balance = amount + parseFloat(amountIncludingTax);
		//alert(actual_balance);
		est_payoff=parseFloat($("#est_payoff").val());
		   if(isNaN(est_payoff))
		   {
			  est_payoff=0; 
		   }
		   actual_balance = actual_balance +est_payoff;
		   $('#bal').val( actual_balance   );
		
		//calculate_initial_investment();
		
		 update_10days_payoff(); 
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
	function get_10day_estimated(){
		est_payoff = $('#est_payoff').val();
		if(est_payoff == ''){
			return 0;
		}
		if(isNaN(est_payoff)){
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
			return 0;
		}else{
			$('#errorForPayoff').text("");
			return parseFloat(est_payoff);
		}
		
	}
	
	function update_10days_payoff(){/*
		initialinv = get_initial_inv();
		est = get_10day_estimated();
		selling_price=actual_balance;
		trade_allowance=$("#trade_allowance").val();
		if(trade_allowance.match(/^[0-9]+(\.[0-9]+)?$/)&&!($("#doc").val()!=''&&$("freight").val()!=''))
		{
			selling_price=selling_price-parseFloat(trade_allowance);
		}
		newbalance = (selling_price - initialinv ) + est;
		
		
		$('#bal').val( newbalance.toFixed(2)   );
	*/}
		
	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	$("input:radio[name=taxopt]").click(function() {
		tax_value = $('#tax_percent').val();
		if(tax_value == 0){
			alert('Please select a fee');
		}else{
			calculate_tax(tax_value);
		}
		
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
					$('#freight').val(data.freight_fee);
					$('#prep').val(data.prep_fee);
					$('#doc').val(data.doc_fee);
					$('#part_serv').val(parseFloat(data.parts_fee) + parseFloat(data.service_fee));
					$('#tag_tit').val(parseFloat(data.title_fee) + parseFloat(data.tag_fee));
					
					$('#tax_percent').val(data.tax_fee);
					calculate_tax(data.tax_fee);
				}
			});
		}
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
	
	$( ".price_val" ).keyup(function() {
		
		values= 0;
		$( ".price_val" ).each(function() {
			
			if($(this).val() == "") return;
			values = values + parseFloat($(this).val(),2);
		});
		
		$(".total_val").val(values);
	});
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
