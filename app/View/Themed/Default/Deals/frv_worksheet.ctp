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
	<div id="worksheet_container" style="width: 1048px;">
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
.box-title {
	color: #cac7c7;
    position: absolute;
    font-weight: inherit;
}
label {
	font-size: 14px;
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
	.box-title {
		color: white !important;
		font-size: 15px !important;
	}
}
</style>

		<div class="wraper header"> 
			<div class="logo" style="width: 250px; margin: 0 auto; margin-bottom: 10px;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Floyd_logo.gif'); ?>" alt="" style="width: 100%;">
			</div>
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
				<input name="first_name" type="text" class="input35" value="<?php echo $contact['Contact']['first_name']; ?>" placeholder=""/>
				<input name="last_name" type="text" class="input35" value="<?php echo $contact['Contact']['last_name']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="address" type="text" class="input71" value="<?php echo $contact['Contact']['address']; ?>" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="city" type="text" class="input25" value="<?php echo $contact['Contact']['city']; ?>" placeholder=""/>
				State:&nbsp;
				<input name="state" type="text" class="input20" value="<?php echo $contact['Contact']['state']; ?>" placeholder=""/>
				Zip:&nbsp;
				<input name="zip" type="text" class="input12" value="<?php echo $contact['Contact']['zip']; ?>" placeholder=""/>
				</span>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="phone" type="text" class="input71" value="<?php echo $contact['Contact']['phone']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="mobile" type="text" class="input71" value="<?php echo $contact['Contact']['mobile']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="email" type="text" class="input71" value="<?php echo $contact['Contact']['email']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/co_buyer_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Name</span>:
				<input name="cobuyer_fname" type="text" class="input35" value="" placeholder=""/>
				<input name="cobuyer_lname" type="text" class="input35" value="" placeholder=""/>
				<hr/>
				<span class="span24">Address</span>:
				<input name="co_address" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span71">City:&nbsp;
				<input name="co_city" type="text" class="input24" value="" placeholder=""/>
				State:&nbsp;
				<input name="co_state" type="text" class="input20" value="" placeholder=""/>
				Zip:&nbsp;
				<input name="co_zip" type="text" class="input12" value="<?php echo $contact['Contact']['co_zip']; ?>" placeholder=""/>
				</span>
			</div>
			<!---left1-->
			<div class="right1"> <span class="span24">Home Phone</span>:
				<input name="cobuyer_phone" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Cell Phone</span>:
				<input name="cobuyer_mobile" type="text" class="input71" value="" placeholder=""/>
				<hr/>
				<span class="span24">Email Address</span>:
				<input name="cobuyer_email" type="text" class="input71" value="<?php echo $contact['Contact']['cobuyer_email']; ?>" placeholder=""/>
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
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/trade_in_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Year (Trade)</span>:
				<input name="year_trade" type="text" class="input71" value="<?php echo $contact['Contact']['year_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Make</span>:
				<input name="make_trade" type="text" class="input71" value="<?php echo $contact['Contact']['make_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input name="model_trade" type="text" class="input71" value="<?php echo $contact['Contact']['model_trade']; ?>" placeholder=""/>
				<hr/>
			</div>
			<!---right1-->
			<div class="right1"> <span class="span24">Mileage</span>:
				<input name="odometer_trade" type="text" class="input71" value="<?php echo $contact['Contact']['odometer_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Color</span>:
				<input name="" type="text" class="input71" value="<?php echo $contact['Contact']['usedunit_color']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Vin#</span>:
				<input name="vin_trade" type="text" class="input71" value="<?php echo $contact['Contact']['vin_trade']; ?>" placeholder=""/>
			</div>
			<!---right1-->

			<div style="border-top: solid 30px black; width: 49%; float: left; margin-left: 50.3%;">
				<label class="box-title" style="margin: -25px 11%;">SALES PRICES / TRADE DIFFERENCE</label>
			</div>

			<div style="border-top: solid 30px black; width: 50%;">
				<label class="box-title" style="margin: -25px 22.2%;">MSRP</label>
			</div>
			
			<div class="left1"> 
            	<textarea name="msrp" style="width: 96%; height: 280px; border: 0px;"><?php echo isset($info['msrp'])?$info['msrp']:'' ?></textarea>
			</div>
			<!---left1-->
			<div class="right1">
				<textarea name="sales_price" style="width: 96%; height: 280px; border: 0px;"><?php echo isset($info['sales_price'])?$info['sales_price']:'' ?></textarea>
			</div>
			<!---left1-->
			<div style="border-top: solid 30px black; width: 49%; float: left; margin-left: 50.3%;">
				<label class="box-title" style="margin: -25px 17.5%;">PAYMENT RANGE</label>
			</div>

			<div style="border-top: solid 30px black; width: 50%;">
				<label class="box-title" style="margin: -25px 18.3%;">DOWN PAYMENT</label>
			</div>
			
			<div class="left1">
				<textarea name="down_pay" style="width: 96%; height: 280px; border: 0px;"><?php echo isset($info['down_pay'])?$info['down_pay']:'' ?></textarea>
			</div>
			<!---left1-->
			<div class="right1">
				<textarea name="payment_range" style="width: 96%; height: 280px; border: 0px;"><?php echo isset($info['payment_range'])?$info['payment_range']:'' ?></textarea>
			</div>
		</div>
		<!---left1-->
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
	$(".date_input_field").bdatepicker();
	
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
})
</script>
</div>