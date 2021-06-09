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
.input_200
{
	width:200px;
}
.input_300
{
	width:330px;
}
.input_800
{
	width:880px;
}
.input_80
{
	width:100px;
}
.input_120
{
	width:130px;
}
.table_blank{
	padding-bottom:150px;
	padding-top:20px;
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
}
</style>
 <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']); 
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>
<?php 
$mobile = AuthComponent::user('d_phone');
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$fax_no = AuthComponent::user('d_fax');
$fax_no = preg_replace('/[^0-9]+/', '', $fax_no); //Strip all non number characters
$fax_no_cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $fax_no);
$dealer_id = AuthComponent::user('dealer_id');
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
        
			<table  style="width:100%">
            <tr>
            <td style="width:25%" align="center">
            <?php 
			$dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealership_logo.png';
			echo  $this->Html->image($dealer_logo);
			
			
			?>
            </td>
            <td align="center" valign="middle" style="width:50%">
           
            <h2><?php /*?>Copper Canyon Harley-Davidson<?php */?><?php echo AuthComponent::user('dealer'); ?></h2>
            <p><?php /*?>34 Olympic Way Butte, MT 59701<?php */?><?php echo AuthComponent::user('d_address') ?></p>
            <p><strong>Phone :</strong><?php echo $cleaned; ?> &nbsp;&nbsp;&nbsp;<strong>Fax :</strong> <?php echo $fax_no_cleaned; ?> </p>
             </td>
             <td style="width:25%" align="center">
            <?php 
			$dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealership_logo.png';
			echo  $this->Html->image($dealer_logo); ?>
            </td>
            </tr>
            </table>
            <br/><br/>
            <table border="2" style="width:100%">
            <tr><td width="100%" colspan="2">
            <table style="width:100%" cellpadding="8">
            <tr><td><strong>Sales Person</strong></td><td><input type="text" class="input_200" name="sperson" value="<?php echo $info['sperson']; ?>" /></td>
            <td>Date</td><td><input type="text" class="input_200" name="date" value="<?php echo isset($info['date'])?$info['date']:$expectedt; ?>" /></td>
            <td>Ref #</td><td><input type="text" class="input_200" name="contact_id" value="<?php echo $info['contact_id']; ?>" /></td></tr>
           	 
            <tr><td>First Name</td><td><input type="text" class="input_200" name="first_name" value="<?php echo $info['first_name']; ?>" /></td>
            <td>Last Name</td><td><input type="text" class="input_200" name="last_name" value="<?php echo $info['last_name']; ?>" /></td>
            <td>Middle Name</td><td><input type="text" class="input_200" name="middle_name" value="<?php echo $info['middle_name']; ?>" /></td></tr>
            <tr>
            <td>Address</td>
            <td colspan="5"><input type="text" name="address" class="input_800" value="<?php echo $info['address']; ?>" /></td>
            </tr>
            <tr><td>City</td><td><input type="text" class="input_200" name="city" value="<?php echo $info['city']; ?>" /></td>
            <td>Country</td><td><input type="text" class="input_200" name="country" value="<?php echo $info['country']; ?>" /></td>
            <td colspan="2">State &nbsp;&nbsp;<input type="text" class="input_80" name="state" value="<?php echo $info['state']; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;Zip <input type="text" class="input_80" name="zip" value="<?php echo $info['zip']; ?>" /></td></tr>
            
          
           	 
            <tr><td colspan="4">Home Phone&nbsp;&nbsp;<input type="text" class="input_120" name="phone" value="<?php echo $cleaned2; ?>" />&nbsp;&nbsp;&nbsp;&nbsp; Cell Phone&nbsp;&nbsp;<input type="text" class="input_120" name="mobile" value="<?php echo $cleaned1; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;
            Work Phone&nbsp;&nbsp;<input type="text" class="input_120" name="work_number" value="<?php echo $cleaned3; ?>" /></td>
            <td>Email</td><td><input type="text" class="input_200" name="email" value="<?php echo $info['email']; ?>" /></td></tr>
            
           
            </table>
            </td</tr>
            <tr>
            <td style="width:100%" colspan="2">
            <table style="width:100%" cellpadding="8">
            <tr><td>Condition</td><td><input type="text" class="input_200" name="condition" value="<?php echo $info['condition']; ?>" /></td></td>
            <td>Year</td><td><input type="text" class="input_200" name="year" value="<?php echo $info['year']; ?>" /></td>
            </tr>
            
             <tr><td>Make</td><td><input type="text" class="input_200" name="make" value="<?php echo $info['make']; ?>" /></td>
            <td>Model</td><td><input type="text" class="input_200" name="model" value="<?php echo $info['model']; ?>" /></td>
            <td>Vin #</td><td><input type="text" class="input_200" name="vin" value="<?php echo $info['vin']; ?>" /></td></tr>
              <tr><td>Color </td><td><input type="text" class="input_200" name="color" value="<?php echo $info['unit_color']; ?>" /></td>
            <td>Mileage</td><td><input type="text" class="input_200" name="odometer" value="<?php echo $info['odometer']; ?>" /></td>
            <td>Stock #</td><td><input type="text" class="input_200" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></td></tr>
            </table>
            </td>
            </tr>
           <tr>
           <td style="width:50%">
           <table cellpadding="8">
          	<tr>
            <td colspan="2"><strong>Trade</strong></td>  
            </tr>
            <tr>
            <td>Year</td>
            <td><input type="text" class="input_300" name="year_trade" value="<?php echo $info['year_trade']; ?>" /></td>
            </tr>
            <tr>
            <td>Make</td>
            <td><input type="text" class="input_300" name="make_trade" value="<?php echo $info['make_trade']; ?>" /></td>
            </tr>
          	<tr>
            <td>Model</td>
            <td><input type="text" class="input_300" name="model_trade" value="<?php echo $info['model_trade']; ?>" /></td>
            </tr>
            <tr>
            <td>Payoff</td>
            <td><input type="text" class="input_300 priceChange" id="trade_payoff" name="trade_payoff" value="<?php echo $info['trade_payoff']; ?>" /></td>
            </tr>
          	<tr>
            <td>Lender</td>
            <td><input type="text" class="input_300" name="lender" value="<?php echo $info['lender']; ?>" /></td>
            </tr>
          	<tr>
            <td>Vin No</td>
            <td><input type="text" class="input_300" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" /></td>
            </tr>
          	<tr>
            <td>Trade Color</td>
            <td><input type="text" class="input_300" name="usedunit_color" value="<?php echo $info['usedunit_color']; ?>" /></td>
            </tr>
          	<tr>
            <td>Mileage</td>
            <td><input type="text" class="input_300" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>" /></td>
            </tr>
          	
           </table>
           </td>
           <td style="width:50%">
           <table cellpadding="8">
                   
             <tr><td><strong>Selling Price</strong></td>
             <td>$<input type="text" class="input_300 priceChange" id="unit_value" name="unit_value" value="<?php echo $info['unit_value']; ?>" /></td></tr>
             <tr><td><strong>Frieght</strong></td>
             <td>$<input type="text" class="input_300 priceChange" id="freight_fee" name="frieght_fee" value="<?php echo $info['frieght_fee']; ?>" /></td></tr>
             <tr><td><strong>Setup</strong></td>
             <td>$<input type="text" class="input_300 priceChange" id="prep_fee" name="prep_fee" value="<?php echo $info['prep_fee']; ?>" /></td></tr>
             <tr><td><strong>Doc Fee</strong></td>
             <td>$<input type="text" class="input_300 priceChange" id="doc_fee" name="doc_fee" value="<?php echo $info['doc_fee']; ?>" /></td></tr>
             <tr><td><strong>Total</strong></td>
             <td>$<input type="text" class="input_300" id="amount" name="amount" value="<?php echo $info['amount']; ?>" /></td></tr>
           </table>
           
           </td>
           </tr> 
           <tr >
           <td class="table_blank">
           <strong style="margin-left:20px;margin-right:20px;">Down Payment</strong>
           $<input type="text" class="input_300 priceChange" id="down_payment" name="down_payment" value="<?php echo $info['down_payment']; ?>" />
           </td>
            <td class="table_blank">
           <strong style="margin-left:20px;margin-right:20px;">Payment</strong>
           $<input type="text" class="input_300" name="payment" id="payment" value="<?php echo $info['payment']; ?>" />
           </td>
           </tr> 
           </table>
           <br/>
           <p style="text-transform:uppercase; text-align:center">
           I Authorize an investigation of my credit history ,employment history ,and  the release of that information.All sales figures subject to applicable taxes state and local.Customer will take delivery If terms and Figures are agreeable.           
           </p>
         <br />
         <table style="width:100%" cellpadding="8">
		<tr>
        <td>Buyer</td>
        <td><input type="text" class="input_300" name="buyer" value="<?php echo $info['buyer']; ?>" /></td>
        <td>Co-Buyer</td>
        <td><input type="text" class="input_300" name="co_buyer" value="<?php echo $info['co_buyer']; ?>" /></td>
        </tr>
        <tr>
        <td>Dealership Approval</td>
        <td><input type="text" class="input_300" name="dealership_approval" value="<?php echo $info['dealership_approval']; ?>" /></td>
        <td>Salesman</td>
        <td><input type="text" class="input_300" name="salesman" value="<?php echo $info['salesman']; ?>" /></td>
        </tr>	         
         </table>  
            
		</div>
		<!---left1-->
		</br>
         <p align="center">@Copper Canyon Harley-Davidson<?php //echo AuthComponent::user('dealer'); ?>&nbsp;Worksheet&nbsp;-&nbsp;<?php echo date('M d, Y h:i A'); ?></p>
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
		<input type="hidden" id="tax_percent" name="tax_percent" value="<?php echo $info['tax_percent']; ?>" />
	</div>
	
	<?php echo $this->Form->end(); ?>
	<script type="text/javascript">



$(document).ready(function(){
	
	var actual_balance = <?php echo ($deal['Deal']['amount'] + $deal['Deal']['trade_payoff'] ) - $deal['Deal']['down_payment'] ; ?>;
	
	var actual_value = <?php echo ($deal['Deal']['unit_value'] + $deal['Deal']['trade_allowance'] ) ; ?>;
	
	
	
	$(".priceChange").on('change keyup paste',function(){
								
									 calculate_tax();
									 
									 });
	
	
		
	$("#sell_price").on('change keyup paste',function(){
											   price=$(this).val();
											   allowance=$("#trade_allowance").val();
											   actual_value=price;
											   calculateProfit();
											   tax_percent=$("#tax_percent").val();
											   tax_percent=$("#tax_percent").val();
											  if($("#est_payoff").val()!='');
												 update_10days_payoff();
											  if($("#doc").val()!=''&&$("freight").val()!='')
												calculate_tax(tax_percent);
												calculateMonthWisePayments();
											   
											   });


	function calculate_tax(){
		var tax_type = $('input:radio[name=taxopt]:checked').val();
		
		var freight = isNaN(parseFloat( $('#freight_fee').val()))?0.00:parseFloat( $('#freight_fee').val());
		var prep = isNaN(parseFloat( $('#prep_fee').val()))?0.00:parseFloat( $('#prep_fee').val());
		var doc = isNaN(parseFloat( $('#doc_fee').val()))?0.00:parseFloat($('#doc_fee').val());
		var sell_price = isNaN(parseFloat($('#unit_value').val()))?0.00:parseFloat($('#unit_value').val());
		var trade_payoff =	isNaN(parseFloat($('#trade_payoff').val()))?0.00:parseFloat($('#trade_payoff').val());
		var down_payment =	isNaN(parseFloat($('#down_payment').val()))?0.00:parseFloat($('#down_payment').val());
		total_balance = (freight + prep + doc + sell_price) - (trade_payoff + down_payment);
		$("#amount").val(total_balance.toFixed(2)); 
		}
	
	

	$("#btn_save_quote").click(function(){
		if($("#deal_status_id").val() == ''){
			alert("Please select status");
			$("#deal_status_id").focus();
			return false;	
		}else{
			return true;
		}
	});
	
		
	
	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);
	

	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis({ pageTitle: "&nbsp;" });
		
	});
	
	$("#btn_back").click(function(){
		
	});

});
	
</script>
</div>
