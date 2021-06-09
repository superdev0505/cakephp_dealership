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
}
h2 {
    font-size: 24px;
}
h3 {
    font-size: 20px;
}
h4 {
    font-size: 18px;
}
h5 {
    font-size: 16px;
    font-weight: normal;
    margin: 0 0 10px;
}
h6 {
    font-size: 14px;
}
.row {
    float: left;
    margin: 10px 0 0;
    width: 100%;
}
.logo {
    margin: 20px 0 0;
}
input {
    border: 1px solid #ccc;
    padding: 5px;
}
.container {
   
    width: 100%;
}
.col-lg-6 {
    width: 50%;
    float: left;
}
.table-condensed {
    width: 98%;
}
table {
    border-collapse: collapse;
    padding: 0 10px;
    margin: 0px 0 10px;
}
table tr td {
    border: 1px solid #ccc;
    padding: 5px 10px;
}
table tr:nth-child(2n) {
    background: #f8f8f8;
}
table thead {
    background: #444444;
    color: #f1f1f1;
}
.customer {
    margin: 0;
}
.salesperson {
    margin: 50px 0 0;
}
.align-right {
    float: right;
}
.align-center {
    text-align: center;
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
		padding:4px;
	}
	input[type=text] 
	{
		height:18px;
		border:none;
		
	}
	input[type=checkbox], input[type=radio]
	{
		height:12px;	
	}
	table tr td {
   
    padding:0 0 0 0;
}

h5 {
    font-size: 18px;
    font-weight: normal;
    margin: 0 0 3px;
}
table {
    border-collapse: collapse;
    padding: 0 8px;
    margin: 0px 0 6px;
}
}

</style>

		<div class="wraper header">

	<div class="row">
		<div class="col-lg-6">
			<div class="logo">
				<h2>McCoy Costing</h2>
				<span>USED TRUCK</span>
			</div>
		</div>
		<div class="col-lg-6">
			<table class="table-condensed">
				<thead>
					<tr>
						<td>DATE</td>
						<td>SALESPERSON</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:date('Y-m-d'); ?>" ></td>
						<td><input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" ></td>
					</tr>
				</tbody>
			</table>
		<div class="customer">
			Customer: <input type="text" name="customer_name" value="<?php echo isset($info['customer_name'])?$info['customer_name']:$info['first_name'].' '.$info['last_name']; ?>"><br/><br/>
			Quantity: <input type="text" name="quantity" value="<?php echo isset($info['quantity'])?$info['quantity']:''; ?>" >
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<table class="table-condensed">
				<tbody>
					<tr>
						<td>MAKE:</td>
						<td><input type="text" name="make" style="width:140px;" value="<?php echo isset($info['make']) ? $info['make'] : '' ?>" ></td>
                        <td>YEAR:</td>
						<td ><input type="text" name="year" style="width:65px;" value="<?php echo isset($info['year']) ? $info['year'] : '' ?>"></td>
						
					</tr>
					<tr>
						
						<td>MODEL:</td>
						<td colspan="3"><input type="text" name="model"  value="<?php echo isset($info['model']) ? $info['model'] : '' ?>"></td>
					</tr>
					<tr>
                   		 <td>VIN</td>
						<td><input type="text" name="vin" style="width:140px;" value="<?php echo isset($info['vin']) ? $info['vin'] : '' ?>" ></td>
						<td>STOCK NUMBER</td>
						<td><input type="text" name="stock_num" style="width:65px;" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : '' ?>" ></td>
						
					</tr>
				</tbody>
			</table>
			<table class="table-condensed">
				<tbody>
					<tr><td>INITIAL PURCHASE PRICE</td><td><input type="text" name="purchase_price" value="<?php echo isset($info['purchase_price']) ? $info['purchase_price'] : $info['unit_value'] ?>" ></td></tr>
					<tr><td>Other charges / credits</td><td><input type="text" name="other_charges" value="<?php echo isset($info['other_charges']) ? $info['other_charges'] : '' ?>" ></td></tr>
					<tr><td>FREIGHT</td><td><input type="text" name="freight" value="<?php echo isset($info['freight']) ? $info['freight'] : '' ?>" ></td></td></tr>
					<tr><td>FACTORY INVOICE</td><td><input type="text" name="factory_invoice" value="<?php echo isset($info['factory_invoice']) ? $info['factory_invoice'] : '' ?>" ></td></tr>
					<tr><td>ADD BALANCE FORWARD attach</td><td><input type="text" name="balance_forward" value="<?php echo isset($info['balance_forward']) ? $info['balance_forward'] : '' ?>" ></td></tr>
					<tr><td>PACK</td><td><input type="text" name="pack" value="<?php echo isset($info['pack']) ? $info['pack'] : '' ?>" ></td></tr>
					<tr><td>DETAIL</td><td><input type="text" name="details" value="<?php echo isset($info['details']) ? $info['details'] : '' ?>" ></td></tr>
					<tr><td>Titling</td><td><input type="text" name="titling" value="<?php echo isset($info['titling']) ? $info['titling'] : '' ?>" ></td></tr>
					<tr><td>Service Misc Warranty prep</td><td><input type="text" name="misc_services" value="<?php echo isset($info['misc_services']) ? $info['misc_services'] : '' ?>" ></td></tr>
					<tr><td>Commission to Vlad</td><td><input type="text" name="commission" value="<?php echo isset($info['commission']) ? $info['commission'] : '' ?>" ></td></tr>
					<tr><td>doc fee</td><td><input type="text" name="doc_fee" value="<?php echo isset($info['doc_fee']) ? $info['doc_fee'] : '' ?>" ></td></tr>
					<tr><td>2YR ENG trans diff & Turbo</td><td><input type="text" name="eng_trans" value="<?php echo isset($info['eng_trans']) ? $info['eng_trans'] : '' ?>" ></td></tr>
					<tr><td>WARRANTY</td><td><input type="text" name="warranty" value="<?php echo isset($info['warranty']) ? $info['warranty'] : '' ?>" ></td></tr>
					<tr><td>RECEIVABLE 1 (-)</td><td><input type="text" name="receivable_1" value="<?php echo isset($info['receivable_1']) ? $info['receivable_1'] : '' ?>" ></td></tr>
					<tr><td>RECEIVABLE 2 (-)</td><td><input type="text" name="receivable_2" value="<?php echo isset($info['receivable_2']) ? $info['receivable_2'] : '' ?>" ></td></tr>
					<tr><td>OVER ALLOWANCE</td><td><input type="text" name="over_allowance" value="<?php echo isset($info['over_allowance']) ? $info['over_allowance'] : '' ?>" ></td></tr>
					<tr><td>TOTAL UNIT COST</td><td><input type="text" name="total_unit_cost" value="<?php echo isset($info['total_unit_cost']) ? $info['total_unit_cost'] : '' ?>" ></td></tr>
					<tr><td><input type="text"></td><td>&nbsp;</td></tr>
					<tr><td>GROSS PROFIT $</td><td><input type="text" name="gross_profit_dollar" value="<?php echo isset($info['gross_profit_dollar']) ? $info['gross_profit_dollar'] : '' ?>" ></td></tr>
					<tr><td>GROSS PROFIT %</td><td><input type="text" name="gross_profit_percentage" value="<?php echo isset($info['gross_profit_percentage']) ? $info['gross_profit_percentage'] : '' ?>" ></td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>SELLING PRICE (Without FET)</td><td><input type="text" name="selling_price" value="<?php echo isset($info['selling_price']) ? $info['selling_price'] : '' ?>" ></td></tr>
				</tbody>
			</table>
			<table class="table-condensed">
				<tbody>
					<tr>
						<td>ANTICIPATED COMMISSION AT 25%</td>
						<td><input type="text" name="anticipated_commission" value="<?php echo isset($info['anticipated_commission']) ? $info['anticipated_commission'] : '' ?>" ></td>
					</tr>
					<tr>
						<td>FLAT COMMISSION APPROVED BY MGR</td>
						<td><input type="text" name="flat_commission_mgr" value="<?php echo isset($info['flat_commission_mgr']) ? $info['flat_commission_mgr'] : '' ?>" ></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-6">
			<table class="table-condensed">
				<tbody>
					<tbody>
					<tr><td>CAP COST</td><td><input type="text" name="cap_cost" value="<?php echo isset($info['cap_cost']) ? $info['cap_cost'] : '' ?>" ></td></tr>
					<tr><td>DOWN PMT</td><td><input type="text" name="down_pmt" value="<?php echo isset($info['down_pmt']) ? $info['down_pmt'] : '' ?>" ></td></tr>
					<tr><td>TRADE ALLOWANCE</td><td><input type="text" name="trade_allowance" value="<?php echo isset($info['trade_allowance']) ? $info['trade_allowance'] : '' ?>" ></td></tr>
					<tr><td>TRADE ACV</td><td><input type="text" name="trade_acv" value="<?php echo isset($info['trade_acv']) ? $info['trade_acv'] : '' ?>" ></td></tr>
					<tr><td>OVER ALLOWANCE</td><td><input type="text" name="over_allowance_sales" value="<?php echo isset($info['over_allowance_sales']) ? $info['over_allowance_sales'] : '' ?>" ></td></tr>
					<tr><td>PAYOFF</td><td><input type="text" name="payoff" value="<?php echo isset($info['payoff']) ? $info['payoff'] : '' ?>" ></td></tr>
					<tr><td>TRADE VIN</td><td><input type="text" name="trade_vin" value="<?php echo isset($info['trade_vin']) ? $info['trade_vin'] : '' ?>" ></td></tr>
					<tr><td>ADMIN FEES</td><td><input type="text" name="admin_fees" value="<?php echo isset($info['admin_fees']) ? $info['admin_fees'] : '' ?>" ></td></tr>
					<tr><td>REG FEES</td><td><input type="text" name="reg_fees" value="<?php echo isset($info['reg_fees']) ? $info['reg_fees'] : '' ?>" ></td></tr>
					<tr><td>TRADE EQUITY</td><td><input type="text" name="trade_equity" value="<?php echo isset($info['trade_equity']) ? $info['trade_equity'] : '' ?>" ></td></tr>
					<tr><td>NET CAP COST RED</td><td><input type="text" name="net_cap_cost" value="<?php echo isset($info['net_cap_cost']) ? $info['net_cap_cost'] : '' ?>" ></td></tr>
					<tr><td>AMOUNT TO FINANCE</td><td><input type="text" name="amount_finance" value="<?php echo isset($info['amount_finance']) ? $info['amount_finance'] : '' ?>" ></td></tr>
					<tr><td></td><td>&nbsp;</td></tr>
				</tbody>
				</tbody>
			</table>
			<table class="table-condensed">
				<tbody>
						<tr><td>RSO</td><td><input type="text" name="RSO" value="<?php echo isset($info['RSO']) ? $info['RSO'] : '' ?>" ></td></tr>
					<tr><td>CREDIT APP</td><td><input type="text" name="credit_app" value="<?php echo isset($info['credit_app']) ? $info['credit_app'] : '' ?>" ></td></tr>
					<tr><td>AVO'S</td><td><input type="text" name="AVOs" value="<?php echo isset($info['AVOs']) ? $info['AVOs'] : '' ?>" ></td></tr>
					<tr><td>QUOTES</td><td><input type="text" name="quotes" value="<?php echo isset($info['quotes']) ? $info['quotes'] : '' ?>" ></td></tr>
					<tr><td>MILEAGE</td><td><input type="text" name="mileage" value="<?php echo isset($info['mileage']) ? $info['mileage'] : '' ?>" ></td></tr>
					<tr><td>DELIVERY DATE</td><td><input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : '' ?>" ></td></tr>
		
				</tbody>
			</table>
			<div class="salesperson">
				<p>SALESPERSON APPROVAL
					<span class="align-right">DATE</span>
				</p>
			</div>
			<div class="salesperson">
				<p>SALES MANAGER APPROVAL
					<span class="align-right">DATE</span>
				</p>
			</div>
		</div>
	</div>
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
