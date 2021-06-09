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

.middle1{
    width: 33%;
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
    .price_options,.noprint {
        display: none;
    }
    .market {
   	height: 340px !important;

    }
    .monthly{
    	top: -24px !important;
    }
    .tradein {
    	color: white !important;
    }
    .options {
    	color: white !important;
    }
	.print_month
	{
		display:block;
	}
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

		
			<img class="border-none"  src="https://dpcrm.s3.amazonaws.com/assets/images/buyer_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Name</span>:
				<input name="contact_id" type="hidden"  value="<?php echo $contact['Contact']['id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $contact['Contact']['id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $contact['Contact']['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $contact['Contact']['source']; ?>" />
				<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
				<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="first_name" id="first_name" type="text" class="input35" value="<?php echo $contact['Contact']['first_name']; ?>" placeholder=""/>
				<input name="last_name" id="last_name" type="text" class="input35" value="<?php echo $contact['Contact']['last_name']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="address" type="text" id="address" class="input71" value="<?php echo $contact['Contact']['address']; ?>" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="city" type="text" id="city" class="input25" value="<?php echo $contact['Contact']['city']; ?>" placeholder=""/>
				State:&nbsp;
				<input name="state" type="text" id="state" class="input20" value="<?php echo $contact['Contact']['state']; ?>" placeholder=""/>
				Zip:&nbsp;
				<input name="zip" type="text" id="zip" class="input12" value="<?php echo $contact['Contact']['zip']; ?>" placeholder=""/>
				</span>
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="ss_num" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="phone" type="text" id="phone" class="input71" value="<?php echo $contact['Contact']['phone']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="mobile" type="text" id="mobile" class="input71" value="<?php echo $contact['Contact']['mobile']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="email" type="text" id="email" class="input71" value="<?php echo $contact['Contact']['email']; ?>" placeholder=""/>
				<?php /*?><hr/>
				<span class="span24">Date of Birth</span>:
				<input name="dob" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/co_buyer_black_image.JPG" width="99.5%">
			<a href="#" id="copy" class="pull-left noprint" style="color: white;margin: -25px 10px;position: relative;">Copy</a>
			<div class="left1"> <span class="span24">Name</span>:
				<input name="cobuyer_fname" type="text" id="cobuyer_fname" class="input35" value="" placeholder=""/>
				<input name="cobuyer_lname" type="text" id="cobuyer_lname" class="input35" value="" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="co_address" type="text" id="co_address" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="co_city" type="text" id="co_city" class="input24" value="" placeholder=""/>
				State:&nbsp;
				<input name="co_state" type="text" id="co_state" class="input20" value="" placeholder=""/>
				Zip:&nbsp;
				<input name="co_zip" type="text" id="co_zip" class="input12" value="<?php echo $contact['Contact']['co_zip']; ?>" placeholder=""/>
				</span>
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="cobuyer_ssn" type="text" class="input71" value="" placeholder=""/><?php */?>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="cobuyer_phone" type="text" id="cobuyer_phone" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="cobuyer_mobile" type="text" id="cobuyer_mobile" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="cobuyer_email" type="text" id="cobuyer_email" class="input71" value="<?php echo $contact['Contact']['cobuyer_email']; ?>" placeholder=""/>
				<?php /*?><hr/>
				<span class="span24">Date of Birth</span>:
				<input name="cobuyer_dob" type="text" class="input71" value="<?php echo $contact['Contact']['cobuyer_dob']; ?>" placeholder=""/><?php */?>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/vehicle_select_black_image.JPG" width="99.5%">
			<div class="left1">Condition:&nbsp;
				<input name="condition" type="text" class="input35" value="<?php echo $contact['Contact']['condition']; ?>" placeholder=""/>
				</span> &nbsp;Year:&nbsp;
				<input name="year" type="text" class="input35" value="<?php echo $contact['Contact']['year']; ?>" placeholder=""/>
				</span>
				<hr/>
				<span class="span24">Make</span>:
				<input name="make" type="text" class="input71" value="<?php echo $contact['Contact']['make']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input name="model" type="text" class="input71" value="<?php echo $contact['Contact']['model']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Category</span>:
				<input name="type" type="text" class="input71" value="<?php echo $contact['Contact']['type']; ?>" placeholder=""/>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Mileage</span>:
				<input name="odometer" type="text" class="input71" value="<?php echo $contact['Contact']['odometer']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Color</span>:
				<input name="unit_color" type="text" class="input71" value="<?php echo $contact['Contact']['unit_color']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Vin#</span>:
				<input name="vin" type="text" class="input71" value="<?php echo $contact['Contact']['vin']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Stock #</span>:
				<input name="stock_num" type="text" class="input71" value="<?php echo $contact['Contact']['stock_num']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<div style="border-top: solid 30px black;width: 99.3%;">
				<label class="tradein" style="color: #bfbaba; position: absolute; margin: -23px 6px;">TRADE IN</label>
			</div>
			<div class="left1 trade_in" style="width: 33%;"> <span class="span24">Year (Trade)</span>:
				<input name="year_trade" type="text" class="input71" value="<?php echo $contact['Contact']['year_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Year (Trade)</span>:
				<input type="text" class="input71" name="year1_trade" value="<?php echo isset($info['year1_trade'])?$info['year1_trade']:$info['year_addon1_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Year (Trade)</span>:
				<input type="text" class="input71" name="year2_trade" value="<?php echo isset($info['year2_trade'])?$info['year2_trade']:$info['year_addon2_trade']; ?>" placeholder=""/>
				<hr/>
			</div>

			<div class="middle1 trade_in" style="width: 32.5%;"> <span class="span24">Make</span>:
				<input name="make_trade" type="text" class="input71" value="<?php echo $contact['Contact']['make_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Make</span>:
				<input type="text" class="input71" name="make1_trade" value="<?php echo isset($info['make1_trade'])?$info['make1_trade']:$info['make_addon1_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Make</span>:
				<input type="text" class="input71" name="make2_trade" value="<?php echo isset($info['make2_trade'])?$info['make2_trade']:$info['make_addon2_trade']; ?>" placeholder=""/>
				<hr/>
			</div>

			<div class="right1 trade_in" style="width: 33%;"> <span class="span24">Model</span>:
				<input name="model_id_trade" type="text" class="input71" value="<?php echo $contact['Contact']['model_id_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input type="text" class="input71" name="model1_trade" value="<?php echo isset($info['model1_trade'])?$info['model1_trade']:$info['model_id_addon1_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input type="text" class="input71" name="model2_trade" value="<?php echo isset($info['model2_trade'])?$info['model2_trade']:$info['model_id_addon2_trade']; ?>" placeholder=""/>
				<hr/>
			</div>
			<!---right1-->
		
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/selling_price_black_image.JPG" width="50%"> <img class="border-none"  src="https://dpcrm.s3.amazonaws.com/assets/images/current_market_value_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 310px; "> 
            	<span class="span24">MSRP</span>$
				<input name="msrp"  id="msrp" type="text" class="input71 tradeDiff" value="<?php echo (!empty($contact['Contact']['msrp']))? $contact['Contact']['msrp']  : $contact['Contact']['unit_value']; ?>" placeholder=""/>
				<span class="span24">RVGS SAVINGS</span>$
				<input name="rvgs"  id="rvgs" type="text" class="input71 tradeDiff" value="<?php echo (!empty($contact['Contact']['rvgs']))? $contact['Contact']['rvgs']  : $contact['Contact']['rvgs']; ?>" placeholder=""/>
            	<span class="span24">Selling Price</span>$
				<input name="sell_price_value"  id="sell_price_value" type="text" class="input71 tradeDiff" value="<?php echo (!empty($contact['Contact']['sell_price_value']))? $contact['Contact']['sell_price_value']  : "0.00" ;   ?>" placeholder=""/>
				<span class="span24">Finance Discount</span>$
				<input name="discount"  id="discount" type="text" class="input71 tradeDiff" value="<?php echo $contact['Contact']['discount']; ?>" placeholder=""/>
				<span class="span24">Subtotal</span>$
				<input name="subtotal" id="sell_price" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['subtotal']; ?>" placeholder=""/>
				<span class="span24">Trade Allowance</span>$
				<input name="trade_allowance" id="trade_allowance" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['trade_allowance']; ?>" placeholder=""/>
				<span class="span24">Trade Payoff</span>$
				<input name="trade_payoff" id="trade_payoff" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['trade_payoff']; ?>" placeholder=""/>
				<span class="span24">Doc</span>$
				<input name="doc_fee" id="doc" type="text" class="input71 priceChange" value="199.00" placeholder=""/>
				<span class="span24" title="Certification Fee">Parts / Service</span>$
				<input name="parts_fee" id="part_serv" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['parts_fee']; ?>" placeholder=""/>
				<span class="span24">Tag / Title Fee</span>$
				<input name="tag_fee" id="tag_tit"type="text" class="input71 priceChange" value="10.00" placeholder=""/>
				<span class="span24">Balance / - Down</span>$
				<input name="amount" id="bal" type="text" class="input71 price" value="<?php echo $contact['Contact']['amount']; ?>" placeholder=""/>
			</div>
			<!---left1-->
			<div class="right1 market" style="position: relative; top: -7px; padding: 0px;">
				<div> 
					<br /><br />
					<div align="center" style="margin-bottom: 35px;">
						$<input name="allowance" id="allowance" style="width: 40%; margin-left: 3px;" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['allowance']; ?>" placeholder=""/>
					</div>
				</div>

				<div style="border-top: solid 30px black;width: 100%;">
					<label class="tradein" style="color: #bfbaba; position: absolute; margin: -23px 19%;">OPTIONS</label>
					<label class="options" style="color: #bfbaba; position: absolute; margin: -23px 71%;">PRICE</label>
				</div>

				<div class="right1" style="width: 100%; margin-top: 6px;">
					<input name="price1" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price1']; ?>" placeholder=""/>
					$<input name="option1" id="option1" type="text" style="width: 48%; float: right;" class="option" value="<?php echo $contact['Contact']['option1']; ?>" placeholder=""/>
					<hr/>
					<input name="price2" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price2']; ?>" placeholder=""/>
					$<input name="option2" id="option2" type="text" class="option" style="width: 48%; float: right;" value="<?php echo $contact['Contact']['option2']; ?>" placeholder=""/>
					<hr/>
					<input name="price3" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price3']; ?>" placeholder=""/>
					$<input name="option3" id="option3" type="text" style="width: 48%; float: right;" class="option" value="<?php echo $contact['Contact']['option3']; ?>" placeholder=""/>
					<input name="price4" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price4']; ?>" placeholder=""/>
					$<input name="option4" id="option4" type="text" style="width: 48%; float: right;" class="option" value="<?php echo $contact['Contact']['option4']; ?>" placeholder=""/>
					<hr/>
					<input name="price5" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price5']; ?>" placeholder=""/>
					$<input name="option5" id="option5" type="text" class="option" style="width: 48%; float: right;" value="<?php echo $contact['Contact']['option5']; ?>" placeholder=""/>
					<hr/>
					<input name="price6" type="text" style="width: 48%;" class="input71" value="<?php echo $contact['Contact']['price6']; ?>" placeholder=""/>
					$<input name="option6" id="option6" type="text" style="width: 48%; float: right;" class="option" value="<?php echo $contact['Contact']['option6']; ?>" placeholder=""/>
				</div>
			</div>
			<!---left1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/intial_investment_black_image.JPG" width="50%"> <img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/monthly_option_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 157px;">
				<div align="center" style="margin-top: 20px;">
					%<input name="inves_pro" type="text" class="input71 priceChange" id="inves_pro" style="width: 40%; font-size: 18px;" value="<?php echo $contact['Contact']['inves_pro']; ?>" placeholder=""/>$
					<input name="inves_value" type="text" class="input71 priceChange" id="inves_value" style="width: 40%; font-size: 18px;" value="<?php echo $contact['Contact']['inves_value']; ?>" placeholder=""/>
				</div>
			</div>
			<!---left1-->
			<div class="right1 monthly" style=" top: -26px; position: relative;height: 155px;">
				<table style="width: 100%;">
					<thead>
						<tr>
							<th width="33%" align="center">APR:</th>
							<th width="33%" align="center">Term:</th>
							<th width="33%" align="center">Payment:</th>
						</tr>
					</thead>
                    
					<tbody>
						<tr>
							<td width="33%" align="center"><input name="loan_apr" type="text" id="apr" class="input12" value="5.00" placeholder="" style="width: 100px;height: 35px;"/>
								%</td>
							<td width="33%" align="center"><select name="payment_option1" class="form-control price_options" style="width:65%; margin-top: 15px;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option1_price_span" class="print_month"><?php echo $selected_months[1]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width: 100px; height: 35px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option2" class="form-control price_options" style="width:65%;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option2_price_span" class="print_month"><?php echo $selected_months[2]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 100px; height: 35px;"/></td>
						</tr>
					</tbody>
                    
				</table>
			</div>
		</div>
		<!---left1-->

		<p align="center" style="width: 69%; margin: auto;">All payments quoted by the sales department are estimates subject to financial institution approval. exact payments may change based on finance institution guidelines and customer credit rating and other factors.</p>
		</br>
        <p align="center">@<?php echo AuthComponent::user('dealer'); ?>&nbsp;Worksheet&nbsp;-&nbsp;<?php echo date('M d, Y h:i A'); ?></p>
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
	var actual_value = <?php  echo (!empty($contact['Contact']['sell_price_value']))? $contact['Contact']['sell_price_value']  : "0.00" ;   ?>;

	$(".option").on('change keyup paste',function(){
		var option1 = isNaN(parseFloat( $('#option1').val()))?0.00:parseFloat($('#option1').val());
		var option2 = isNaN(parseFloat( $('#option2').val()))?0.00:parseFloat($('#option2').val());
		var option3 = isNaN(parseFloat( $('#option3').val()))?0.00:parseFloat($('#option3').val());
		var option4 = isNaN(parseFloat( $('#option4').val()))?0.00:parseFloat($('#option4').val());
		var option5 = isNaN(parseFloat( $('#option5').val()))?0.00:parseFloat($('#option5').val());
		var option6 = isNaN(parseFloat( $('#option6').val()))?0.00:parseFloat($('#option6').val());
		var parts_service = option1 + option2 + option3 + option4 + option5 + option6;
		$("#part_serv").val(parts_service.toFixed(2));
		$(".priceChange").trigger('change');
	});

	
	$("#calculateDown").on('click',function(){
		calculate_initial_investment();
		//alert(actual_balance);
			
		});
	$(".priceChange").on('change keyup paste',function(){
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat($('#allowance').val());
		$('#trade_allowance').val(allowance);
		var sell_price = isNaN(parseFloat( $('#sell_price').val()))?0.00:parseFloat($('#sell_price').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var doc = isNaN(parseFloat( $('#doc').val()))?0.00:parseFloat($('#doc').val());
		var part_serv = isNaN(parseFloat( $('#part_serv').val()))?0.00:parseFloat($('#part_serv').val());
		var tag_tit = isNaN(parseFloat( $('#tag_tit').val()))?0.00:parseFloat($('#tag_tit').val());
		var inves_pro = isNaN(parseFloat( $('#inves_pro').val()))?0.00:parseFloat($('#inves_pro').val());
		var inves_value = isNaN(parseFloat( $('#inves_value').val()))?0.00:parseFloat($('#inves_value').val());
		var bal = sell_price - trade_allowance + trade_payoff + doc + part_serv + tag_tit;
			$("#bal").val(bal.toFixed(2));

	});

	$("#inves_value").on('change keyup paste',function(){
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat($('#allowance').val());
		$('#trade_allowance').val(allowance);
		var sell_price = isNaN(parseFloat( $('#sell_price').val()))?0.00:parseFloat($('#sell_price').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var doc = isNaN(parseFloat( $('#doc').val()))?0.00:parseFloat($('#doc').val());
		var part_serv = isNaN(parseFloat( $('#part_serv').val()))?0.00:parseFloat($('#part_serv').val());
		var tag_tit = isNaN(parseFloat( $('#tag_tit').val()))?0.00:parseFloat($('#tag_tit').val());
		var inves_pro = isNaN(parseFloat( $('#inves_pro').val()))?0.00:parseFloat($('#inves_pro').val());
		var inves_value = isNaN(parseFloat( $('#inves_value').val()))?0.00:parseFloat($('#inves_value').val());
		var bal = sell_price - trade_allowance + trade_payoff + doc + part_serv + tag_tit;
			$("#bal").val(bal.toFixed(2));

		if (inves_value > 0) {

			var inves_pro = (inves_value * 100)/bal;
			$("#inves_pro").val(inves_pro.toFixed(2));
			var bal = sell_price - trade_allowance + trade_payoff + doc + part_serv + tag_tit - inves_value;
			$("#bal").val(bal.toFixed(2));
		} else {
			$("#inves_pro").val('');
		}
	});

	$('#inves_pro').on('change keyup paste', function() {
		var allowance = isNaN(parseFloat( $('#allowance').val()))?0.00:parseFloat($('#allowance').val());
		$('#trade_allowance').val(allowance);
		var sell_price = isNaN(parseFloat( $('#sell_price').val()))?0.00:parseFloat($('#sell_price').val());
		var trade_allowance = isNaN(parseFloat( $('#trade_allowance').val()))?0.00:parseFloat($('#trade_allowance').val());
		var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var doc = isNaN(parseFloat( $('#doc').val()))?0.00:parseFloat($('#doc').val());
		var part_serv = isNaN(parseFloat( $('#part_serv').val()))?0.00:parseFloat($('#part_serv').val());
		var tag_tit = isNaN(parseFloat( $('#tag_tit').val()))?0.00:parseFloat($('#tag_tit').val());
		var inves_pro = isNaN(parseFloat( $('#inves_pro').val()))?0.00:parseFloat($('#inves_pro').val());
		var inves_value = isNaN(parseFloat( $('#inves_value').val()))?0.00:parseFloat($('#inves_value').val());
		var bal = sell_price - trade_allowance + trade_payoff + doc + part_serv + tag_tit;
			$("#bal").val(bal.toFixed(2));

		if (inves_pro > 0) {
			var inves_value = (inves_pro * bal)/100;
			$("#inves_value").val(inves_value.toFixed(2));
			var bal = sell_price - trade_allowance + trade_payoff + doc + part_serv + tag_tit - inves_value;
			$("#bal").val(bal.toFixed(2));
		} else {
			$("#inves_value").val('');
		}

	});
	
	$(".tradeDiff").on('change keyup paste',function(){
		var msrp = isNaN(parseFloat( $('#msrp').val()))?0.00:parseFloat($('#msrp').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		var actual_value = isNaN(parseFloat( $('#sell_price_value').val()))?0.00:parseFloat($('#sell_price_value').val());
		var rvgs = msrp - actual_value;
		$("#rvgs").val(rvgs.toFixed(2));
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat($('#discount').val());
		
	   	var trade_payoff = isNaN(parseFloat( $('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
	   	if(isNaN(allowance))
	  	{
		  allowance=0; 
	    }
	   	est_payoff=parseFloat($("#est_payoff").val());
	   	if(isNaN(est_payoff))
	   	{
		  est_payoff=0; 
	   	}
			sell_price=actual_value-discount;	
		 $("#sell_price").val(sell_price.toFixed(2));	   
			  /* if(allowance!='')
			   {*/
				  /* if(allowance.match(/^[0-9]+(\.[0-9]*)?$/))
				   {*/
					  
					   tax_percent=$("#tax_percent").val();
					   if($("#est_payoff").val()!='');
					  
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
			   $(".priceChange").trigger('change');
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
	$('#apr, .priceChange').on('change keyup paste',function(){
		
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

	//var prep = $('#prep').val();
	var doc = $('#doc').val();
	var parts_fee = "0";
	var service_fee = "0";
	var parts_service = parseFloat(parts_fee)+parseFloat(service_fee);
	var tag_fee = "0";
	var title_fee = "0";
	var tag_title = parseFloat(tag_fee)+parseFloat(title_fee);
	$('#part_serv').val(parts_service);
	$('#tag_tit').val(tag_title);
	var amount = parseFloat(selling_price) + parseFloat(doc) + parseFloat(parts_service) + parseFloat(tag_title);
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
	var balance = parseFloat(amount) + parseFloat(estimated_payoff) - parseFloat(downpayment);
		balance_value = balance.toFixed(2);
		if(!isNaN(balance_value)){
			$('#bal').val(balance_value);
		}
		
	}
	
	//console.log( $('#bal').val() );
	
}
	
	
	 function calculateMonthWisePayments(){
		$(".price_options").each(function(){
			years=$(this).val()/12;
			pay_monthly=MonthwisePayments(years);
			price_field=$(this).attr('price-id');										 
			var payment = document.getElementById(price_field);
			payment.value = pay_monthly;
			});
	 	}
	
	function MonthwisePayments(years)
	{
		var apr = parseFloat($('#apr').val());
		var principal = parseFloat($('#bal').val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		
		//var payment = document.getElementById(("paymentFor"+i).toString());
		var x = Math.pow(1 + interest, payments);   // Math.pow() computes powers
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

	$("#copy").on('click',function(){
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var address = $('#address').val();
		var city = $('#city').val();
		var state = $('#state').val();
		var zip = $('#zip').val();
		var phone = $('#phone').val();
		var mobile = $('#mobile').val();
		var email = $('#email').val();

		$("#cobuyer_fname").val(first_name);
		$("#cobuyer_lname").val(last_name);
		$("#co_address").val(address);
		$("#co_city").val(city);
		$("#co_state").val(state);
		$("#co_zip").val(zip);
		$("#cobuyer_phone").val(phone);
		$("#cobuyer_mobile").val(mobile);
		$("#cobuyer_email").val(email);
	});
</script>
</div>