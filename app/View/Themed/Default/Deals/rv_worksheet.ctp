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
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="ss_num" type="text" class="input71" value="" placeholder=""/><?php */?>
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
				<?php /*?><hr/>
				<span class="span24">Date of Birth</span>:
				<input name="dob" type="text" class="input71" value="" placeholder=""/><?php */?>
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
				<?php /*?><hr/>
				<span class="span24">SSN</span>:
				<input name="cobuyer_ssn" type="text" class="input71" value="" placeholder=""/><?php */?>
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
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/trade_in_black_image.JPG" width="99.5%">
			<div class="left1"> <span class="span24">Year (Trade)</span>:
				<input name="year_trade" type="text" class="input71" value="<?php echo $contact['Contact']['year_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Make</span>:
				<input name="make_trade" type="text" class="input71" value="<?php echo $contact['Contact']['make_trade']; ?>" placeholder=""/>
				<hr/>
				<span class="span24">Model</span>:
				<input name="model_trade" type="text" class="input71" value="<?php echo $contact['Contact']['model_trade']; ?>" placeholder=""/>
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
				<hr/>
				<span class="span24">Stock#</span>:
				<input name="stock_num_trade" type="text" class="input71" value="<?php echo $contact['Contact']['stock_num_trade']; ?>" placeholder=""/>
			</div>
			<!---right1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/selling_price_black_image.JPG" width="50%"> <img class="border-none"  src="https://dpcrm.s3.amazonaws.com/assets/images/current_market_value_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 310px; "> 
            
            <span class="span24">Selling Price</span>$
				<input name="unit_value"  id="sell_price" type="text" class="input71" value=" <?php echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>" placeholder=""/>
				<span class="span24">Trade Allowance</span>$
				<input name="trade_allowance" id="trade_allowance" type="text" class="input71 tradeDiff" value="<?php //echo $contact['Contact']['freight_fee']; ?>" placeholder=""/>
<!--                                   <label for="option1">Fee's Record Type: </label>       
               <select name="fee_recordtype" id="fee_recordtype" class="form-control" style="width: auto; display: inline-block;">
						<option value="F">Retail fee</option>
						<option value="A">Aftermarket option</option>
						<option value="C">Add to cost</option>
						<option value="L">Lease fee</option>
						<option value="S">Accessory</option>
					</select>
                                   <br>-->
                <span class="span24">Freight</span>$
				<input name="freight_fee" id="freight" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['freight_fee']; ?>" placeholder=""/>
                                <span class="span24">Freight Description: </span>       
               <select name="freight_desc" id="freight_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){
                    if(empty($value['FieldDescription']))
                        continue;
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24">Prep/Recond</span>$
				<input name="prep_fee"  id="prep" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['prep_fee']; ?>" placeholder=""/>
                                <span class="span24">Prep/Recond Description: </span>       
               <select name="prep_desc" id="prep_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){
                    if(empty($value['FieldDescription']))
                        continue;
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24">Doc</span>$
				<input name="doc_fee" id="doc" type="text" class="input71 priceChange" value="<?php echo $contact['Contact']['doc_fee']; ?>" placeholder=""/>
                                <span class="span24">Doc Description: </span>       
               <select name="doc_desc" id="doc_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){
                    if(empty($value['FieldDescription']))
                        continue;
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24" title="Certification Fee">Parts / Service</span>$
				<input name="parts_fee" id="part_serv"type="text" class="input71 priceChange" value="" placeholder=""/>
                                 <span class="span24">Parts / Service Description: </span>       
               <select name="parts_desc" id="parts_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){ 
                     if(empty($value['FieldDescription']))
                        continue;
                    
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24">Tag / Title Fee</span>$
				<input name="tag_fee" id="tag_tit"type="text" class="input71 priceChange" value="" placeholder=""/>
                                <span class="span24">Tag / Title Description: </span>       
               <select name="tag_desc" id="tag_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){  
                    if(empty($value['FieldDescription']))
                        continue;
                    
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24">Sales Tax</span>%
				<input name="tax_fee" id="tax"type="text" class="input70 priceChange" value="<?php echo $contact['Contact']['tax_fee']; ?>" placeholder=""/>
                                     <span class="span24">Sales Tax Description: </span>       
               <select name="sales_desc" id="sales_desc" class="form-control" style="width: auto; display: inline-block;">
		<?php foreach($all_fees as $value){  
                    if(empty($value['FieldDescription']))
                        continue;
                    
                    ?>				
                   <option value="<?php echo $value['RecordType'].'_'.$value['SequenceNumber'].'_'.$value['FieldDescription'];?>"><?php echo $value['FieldDescription'].' ('.$value['RecordType'].','.$value['SequenceNumber'].')'?></option>
                <?php }  ?>				
						
					</select>
                                <br>
				<span class="span24">Balance / - Down</span>$
				<input name="amount" id="bal" type="text" class="input71" placeholder=""/>
			</div>
			<!---left1-->
			<div class="right1" style="height:310px; ">
				<div> 10 Day Estimated Payoff&nbsp;
					$&nbsp;
					<input name="trade_payoff" id="est_payoff" type="text" class="input17 tradeDiff" value="" placeholder=""/>
					</span> <span id='errorForPayoff'></span> 
					
					<br />
					<br /><br />

					<div align="center" id="fixedfee_selection">
					
						Fixed Fee:&nbsp; <br />
						<?php
						echo $this->Form->input('condition', array(
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
						<br />
						<br />
						<br />
						
						<div class="form-group">
						  <label for="option1">Tax balance</label>
						  <input id="option1" type="radio" name="taxopt" checked="checked" value="tax_balance">
						  <label for="option2">Tax Vehicle Only</label>
						  <input id="option2" type="radio" name="taxopt" value="tax_vehicle_only">
						</div>
						<table style="width:80%">
                        <tr>
                         <td width="30%"></td><td width="20%" align="center"><span >Cost</span></td><td width="60%">$
					<input name="actual_cost" id="cost" style="width:80%" type="text"  value="" placeholder=""/>
                    <td></tr>
                   <tr><td width="30%">
                    <select class="form-control" id="profitOption"><option value="cost_sell">No Fee's</option><option value="cost_fees">With Fee's</option></select>
                     </td><td width="20%" align="center">
                     <span>Profit</span>
                   </td><td width="60%">
                   
                  $
					<input name="actual_profit" id="profit" type="text" style="width:80%"  value="" placeholder=""/></td>
                    </table>
                  
					</div>
                    
					
					
				</div>
			</div>
			<!---left1-->
			<img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/intial_investment_black_image.JPG" width="50%"> <img class="border-none" src="https://dpcrm.s3.amazonaws.com/assets/images/monthly_option_black_image.JPG" width="49.1%">
			<div class="left1" style="height: 283px;">
				<div align="center" style="margin-top: 20px;">
               
					<h3>
                    
                     <a href="#" id="calculateDown" class="btn btn-info pull-left noprint" style="margin-left:10px;">Calulate Down</a>
						<input name="down_payment" id="down_pay" type="text" class="input15"   placeholder=""/>
					</h3>
					<span id='errorForDownPay'></span> </div>
			</div>
			<!---left1-->
			<div class="right1" style=" top: -25px; position: relative;height: 284px;">
				<table style="width: 80%;">
					<thead>
						<tr>
							<th width="33%" align="center">APR:</th>
							<th width="33%" align="center">Term:</th>
							<th width="33%" align="center">Payment:</th>
						</tr>
					</thead>
                    
					<tbody>
						<tr>
							<td width="33%" align="center"><input name="loan_apr" type="text" id="apr" class="input12" value="" placeholder="" style="width: 83px;"/>
								%</td>
							<td width="33%" align="center"><select name="payment_option1" class="form-control price_options" style="width:65%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option1_price_span" class="print_month"><?php echo $selected_months[1]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option2" class="form-control price_options" style="width:65%;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option2_price_span" class="print_month"><?php echo $selected_months[2]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option3" class="form-control price_options" style="width:65%;" price-id="option3_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option3_price_span" class="print_month"><?php echo $selected_months[3]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option3_price" id="option3_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
						<tr>
							<td width="33%" align="center">&nbsp;</td>
							<td width="33%" align="center"><select name="payment_option4" class="form-control price_options" style="width:65%;" price-id="option4_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option4_price_span" class="print_month"><?php echo $selected_months[4]; ?></span> months</td>
							<td width="33%" align="center">$&nbsp;
								<input name="option4_price" id="option4_price" type="text" class="input20 options_price" value="" style="width: 50px;"/></td>
						</tr>
					</tbody>
                    
				</table>
			</div>
                        <div class="left1" style="height: 100px;">
				<div align="center" style="margin-top: 20px;">
                 <label for="option1">Dealer Track API INFO:</label>     
                 <br>
                  <label for="option1">Record Type: </label>       
               <select name="RecordType" id="RecordType" class="form-control" style="width: auto; display: inline-block;">
<!--			<option value="">* Select RecordType</option>-->
						<option value="C">cash deal</option>
						<option value="F">financed</option>
						<option value="L">lease</option>
						<option value="O">outside financed</option>
					</select>
                  <label for="option1">Sale Type: </label>       
        <select name="SaleType" id="SaleType" class="form-control" style="width: auto; display: inline-block;">
<!--			<option value="">* Select SaleType</option>-->
						<option value="R">retail</option>
						<option value="L">lease</option>
						<option value="F">fleet</option>
						<option value="W">wholesale</option>
						<option value="X">dealer transfer</option>
						<option value="1">custom-1</option>
						<option value="2">custom-2</option>
						<option value="3">custom-3</option>
						
					</select>
				 </div>
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
										
										
										 $("#sell_price").val(sell_price.toFixed(2));	   
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
		
		var freight = parseFloat( $('#freight').val() );
		var prep = parseFloat( $('#prep').val() );
		var doc = parseFloat( $('#doc').val() );
		var part_serv = parseFloat( $('#part_serv').val() );
		var tag_tit = parseFloat( $('#tag_tit').val() );
		var sell_price = parseFloat( $("#sell_price").val() );
		
		if(tax_type == 'tax_vehicle_only'){
			var amount = parseFloat( $("#sell_price").val() );
		}else{
			var amount = freight+prep+part_serv+sell_price; 
		}
		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		$('#tax').val( amountIncludingTax );
		
		actual_balance = freight+prep+doc+part_serv+tag_tit+sell_price+parseFloat(amountIncludingTax); 
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