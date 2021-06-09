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
$expectedt = date('M d, Y h:i A');
//echo $expectedt;

$date = new DateTime();

$datetimefullview = date('M d, Y g:i A');
$dealer_id = AuthComponent::user('dealer_id');
//echo $datetimefullview;

?>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
if(empty($deal['Deal']['payment_option1']))
{
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}
}else
{
	$selected_months=array('1'=>$deal['Deal']['payment_option1'],2=>$deal['Deal']['payment_option2'],3=>$deal['Deal']['payment_option3'],4=>$deal['Deal']['payment_option4']);
}


?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;">
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1000px; margin:0 auto;">
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
    border-color: #aaa;
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
.blank_pad{
	padding:4px;
}
.print_month
	{
		display:none;
	}
.border_class{
	border: 1px solid #aaa;
}

#clientInfo {float: left; margin: 10px 0px;}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	.blank_pad{
	padding:0px;
}
input[type="text"]{

border:none;
border-bottom:1px solid #000;

}


	div.page-break{
	page-break-before:always;
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
		<div class="wraper header">
        <?php //pr($contact); ?>
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
				
				<input name="owner" type="hidden"  value="<?php echo $info['owner']; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
                 <input name="make" type="hidden"  value="<?php echo $info['make']; ?>" />
			
			<table style="width:100%" cellpadding="4">
            <tr>
            <td width="30%" align="left"> 
            	<span class="span15">Date:</span>
                 <input name="submit_date" type="text" class="input20" style="width:75%;" value="<?php echo isset($info['date'])?$info['date']:$expectedt; ?>" placeholder=""/></td>
            <td width="40%">
             <span class="span15" style="width:23%">Salesperson:</span>
             <input name="sperson" type="text" class="input20" style="width:65%;" value="<?php echo $info['sperson']; ?>" placeholder=""/>
            </td>  
                <td width="30%" align="left"> 
            	<span class="span15" style="width:23%">Manager:</span>
                 <input name="manager" type="text" class="input20" style="width:65%;" value="<?php echo isset($info['manager'])?$info['manager']:''; ?>" placeholder=""/></td>
            
            </tr>
            
            </table>					

           <table width="100%" border="1" class="input-text">
           <tr>
           <td colspan="2" width="100%">
           
           <table width="100%" cellpadding="4" border="1">
           <tr>
           	<td style="width:35%">
            <div style="width:30%;float:left;">
            <label>
            <input type="radio" name="condition" value="yes" <?php echo (!empty($info['condition'])&& strtolower($info['condition']) == 'yes')?'checked="checked"':''; ?> /> &nbsp; Yes <br/>
            <input type="radio" name="condition" value="no" <?php echo (!empty($info['condition'])&& strtolower($info['condition']) == 'no')?'checked="checked"':''; ?> /> &nbsp; No
            </label>
            </div>
            <div style="width:70%;float:left;">
            <label>
              <input type="radio" name="payment_type" value="finance" <?php echo (!empty($info['payment_type'])&& strtolower($info['payment_type']) == 'finance')?'checked="checked"':''; ?> /> &nbsp; Finance &nbsp;&nbsp;
              <input type="radio" name="payment_type" value="own" <?php echo (!empty($info['payment_type'])&& strtolower($info['payment_type']) == 'own')?'checked="checked"':''; ?> /> &nbsp; Own &nbsp;&nbsp;
               <br/>
            <input type="radio" name="payment_type" value="cash" <?php echo (!empty($info['payment_type'])&& strtolower($info['payment_type']) == 'cash')?'checked="checked"':''; ?> /> &nbsp; Cash &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Financing
            </label>
            </div>
            </td>
            <td style="width:65%">
            <label class="span15" style="width:28%">
            STK#<br/>
            <input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" style="width:100%" />
            </label>
            <label class="span15" style="width:20%">
           Year<br/>
            <input type="text" name="year" value="<?php echo $info['year']; ?>" style="width:100%" />
            </label>
            <label class="span15" style="width:50%">
            Model<br/>
            <input type="text" name="model" value="<?php echo $info['model']; ?>" style="width:100%" />
            </label>
            </td>
            <td></td>
           </tr>
           
           </table>
           
           </td>
           </tr>
           <tr>
           
               <td width="50%">
					<table width="100%" cellpadding="4">
                    	<tr>
                        	<td colspan="3">
                           <label class="span15" style="width:25%">Selling Price  $</label>
                            <input type="text" name="unit_value" value="<?php echo $info['unit_value']; ?>" style="width:72%" />
                           
                           </td>
                           
                        </tr>
                        <tr>
                       		 <td colspan="3" align="center"><strong>Additional Accessories Needed</strong></td>
                        </tr>
                     <tr>
                    <td width="75%">
                    	<input type="text" name="acc1_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc1_name'])?$info['acc1_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc1_price" class="accs_class amount_input" value="<?php echo isset($info['acc1_price'])?$info['acc1_price']:$info['acc1_price']; ?>" data-id="1" id="acc1_price" style="width:100%;"/>	
                    </td>
                    </tr>
                        </tr>
                     <tr>
                    <td width="75%"><input type="text" name="acc2_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc2_name'])?$info['acc2_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc2_price" class="accs_class amount_input" value="<?php echo isset($info['acc2_price'])?$info['acc2_price']:$info['acc2_price']; ?>" data-id="1" id="acc2_price" style="width:100%;"/>	
                    </td>
                    </tr>
                    
                    <tr>
                    <td width="75%"><input type="text" name="acc3_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc3_name'])?$info['acc3_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc3_price" class="accs_class amount_input" value="<?php echo isset($info['acc3_price'])?$info['acc3_price']:$info['acc3_price']; ?>" data-id="1" id="acc3_price" style="width:100%;"/>	
                    </td>
                    </tr>
                    
                    <tr>
                    <td width="75%"><input type="text" name="acc4_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc4_name'])?$info['acc4_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc4_price" class="accs_class amount_input" value="<?php echo isset($info['acc4_price'])?$info['acc4_price']:$info['acc4_price']; ?>" data-id="1" id="acc4_price" style="width:100%;"/>	
                    </td>
                    </tr>
                    
                    
                    <tr>
                    <td width="75%"><input type="text" name="acc5_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc5_name'])?$info['acc5_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc5_price" class="accs_class amount_input" value="<?php echo isset($info['acc5_price'])?$info['acc5_price']:$info['acc5_price']; ?>" data-id="1" id="acc5_price" style="width:100%;"/>	
                    </td>
                    </tr>
                     <tr>
                    <td width="75%"><input type="text" name="acc6_name" style="display:inline;width:100%;" value="<?php echo isset($info['acc6_name'])?$info['acc6_name']:''; ?>" /></td>
                    <td width="25%">
                    	<input type="text" name="acc6_price" class="accs_class amount_input" value="<?php echo isset($info['acc6_price'])?$info['acc6_price']:$info['acc6_price']; ?>" data-id="1" id="acc6_price" style="width:100%;"/>	
                    </td>
                    </tr>
                    
                    </table>               
               </td>
               <td width="50%">
               	<table width="100%" cellpadding="4">
                	<tr>
                    	<td colspan="2" width="100%" align="center"><strong>Trade Vehicle</strong></td>
                    </tr>
                    <tr>
                    	<td width="20%"><input type="text" name="trade_year1" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year1'])?$info['trade_year1']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make1" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make1'])?$info['trade_make1']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model1" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model1'])?$info['trade_model1']:''; ?>" /></td>	
                    </tr>
                    <tr>
                    	<td width="20%"><input type="text" name="trade_year2" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year2'])?$info['trade_year2']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make2" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make2'])?$info['trade_make2']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model2" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model2'])?$info['trade_model2']:''; ?>" /></td>	
                    </tr>
                    <tr>
                    	<td width="20%"><input type="text" name="trade_year3" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year3'])?$info['trade_year3']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make3" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make3'])?$info['trade_make3']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model3" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model3'])?$info['trade_model3']:''; ?>" /></td>	
                    </tr>
                    <tr>
                    	<td width="20%"><input type="text" name="trade_year4" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year4'])?$info['trade_year4']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make4" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make4'])?$info['trade_make4']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model4" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model4'])?$info['trade_model4']:''; ?>" /></td>	
                    </tr>
                    
                      <tr>
                    	<td width="20%"><input type="text" name="trade_year5" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year5'])?$info['trade_year5']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make5" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make5'])?$info['trade_make5']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model5" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model5'])?$info['trade_model5']:''; ?>" /></td>	
                    </tr>
                    
                      <tr>
                    	<td width="20%"><input type="text" name="trade_year6" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year6'])?$info['trade_year6']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make6" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make6'])?$info['trade_make6']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model6" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model6'])?$info['trade_model6']:''; ?>" /></td>	
                    </tr>
                     <tr>
                    	<td width="20%"><input type="text" name="trade_year7" style="display:inline;width:100%;" value="<?php echo isset($info['trade_year7'])?$info['trade_year7']:''; ?>" /></td>   
                    	<td width="30%"><input type="text" name="trade_make7" style="display:inline;width:100%;" value="<?php echo isset($info['trade_make7'])?$info['trade_make7']:''; ?>" /></td>
                        <td width="50%"><input type="text" name="trade_model7" style="display:inline;width:100%;" value="<?php echo isset($info['trade_model7'])?$info['trade_model7']:''; ?>" /></td>	
                    </tr>
					                    
                    
                </table>
               </td>
               
           </tr>
           
           <tr>
           <td>
           <label class="span15" style="width:20%;">Dealer Prep: </label>
           <label class="span15" style="width:25%;">Safety $150:&nbsp;
           <input type="radio" name="dealer_prep" value="safety" <?php echo (!empty($info['dealer_prep'])&& strtolower($info['dealer_prep']) == 'safety')?'checked="checked"':''; ?> /> 
            </label>
            <label class="span15" style="width:25%;">Basic $495:&nbsp;
           <input type="radio" name="dealer_prep" value="basic" <?php echo (!empty($info['dealer_prep'])&& strtolower($info['dealer_prep']) == 'basic')?'checked="checked"':''; ?> /> 
            </label>
            <label class="span15" style="width:27%;">Deluxe $695:&nbsp;
           <input type="radio" name="dealer_prep" value="deluxe" <?php echo (!empty($info['dealer_prep'])&& strtolower($info['dealer_prep']) == 'deluxe')?'checked="checked"':''; ?> /> 
            </label>
           
           </td>
           
           <td>
           
           <label class="span15" style="width:25%">Current Market Value: $</label>
           <input type="text" name="trade_market_value" style="display:inline;width:70%;" value="<?php echo isset($info['trade_market_value'])?$info['trade_market_value']:''; ?>" />
           </td>
           
           </tr>
           
           <tr>
           <td>
           	<table width="100%" cellpadding="4">
               <tr>
                   <td align="center" valign="middle" colspan="2" width="100%">
                        
                        <h3>Initial Investment</h3>
                        <label>(Bank Requires 20% Down)</label>
                   </td>
               </tr>
               <tr>
               <td style="width:50%;"><input type="text" name="initial_investment" style="display:inline;width:100%;" value="<?php echo isset($info['initial_investment'])?$info['initial_investment']:''; ?>" /></td>
               <td style="width:50%;"><input type="text" name="initial_investment2" style="display:inline;width:100%;" value="<?php echo isset($info['initial_investment2'])?$info['initial_investment2']:''; ?>" /></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                 <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="center"><p>This is offer to Own and Take Delivery Now</p></td>
               </tr>
               
            </table>
			</td>	
                 <td> 	
                    <table width="100%" cellpadding="4">
               <tr>
                   <td align="center" valign="middle" colspan="2" width="100%">
                	
                    <h3>Monthly Investment</h3><br/>
                </td>               
            </tr>
            
              <tr>
               <td style="width:50%;"><input type="text" name="monthly_investment" style="display:inline;width:100%;" value="<?php echo isset($info['monthly_investment'])?$info['monthly_investment']:''; ?>" /></td>
               <td style="width:50%;"><input type="text" name="monthly_investment2" style="display:inline;width:100%;" value="<?php echo isset($info['monthly_investment2'])?$info['monthly_investment2']:''; ?>" /></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr> <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
                 <tr>
               <td width="100%" colspan="2" align="2"><p>&nbsp;</p></td>
               </tr>
               <tr>
               <td width="100%" colspan="2" align="center"><p>Salesperson cannot accept this offer or obligate seller in any manner whatsoever. Offer is not binding until accepted by management of seller.</p></td>
               </tr>
            </table>
			</td>	
           </tr>
           
           </table>
           <table width="100%" cellpadding="4">
           			<tr>
                    	<td width="26%"><strong style="text-decoration:underline;width:39%;" class="span15" >Customer #</strong> 
                        <input name="customer_no" type="text" class="input20" style="width:58%;" value="<?php echo isset($info['customer_no'])?$info['customer_no']:''; ?>" placeholder=""/>
                        </td>
                       <td width="27%"><strong style="text-decoration:underline;width:42%;" class="span15" >Sales Quote #</strong> 
                        <input name="sale_quote_no" type="text" class="input20" style="width:55%;" value="<?php echo isset($info['sale_quote_no'])?$info['sale_quote_no']:''; ?>" placeholder=""/>
                        </td>
                        <td width="27%"><strong style="text-decoration:underline;width:38%;" class="span15" >F&I Quote #</strong> 
                        <input name="fi_quote_no" type="text" class="input20" style="width:60%;" value="<?php echo isset($info['fi_quote_no'])?$info['fi_quote_no']:''; ?>" placeholder=""/>
                        </td>
                      <td width="20%"><strong style="text-decoration:underline;width:34%;" class="span15" >R.O #</strong> 
                        <input name="ro_no" type="text" class="input20" style="width:60%;" value="<?php echo isset($info['ro_no'])?$info['ro_no']:''; ?>" placeholder=""/>
                        </td>
                        
                    </tr>
                    <tr>
                    <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                    <td colspan="4">&nbsp;</td>
                    </tr>
                    
                   <tr>
                   <td colspan="2">
                   <label class="span15">Client</label>
                   <input name="client_name" type="text" class="input20" style="width:75%;" value="<?php echo $info['first_name'].' '.$info['first_name']; ?>" placeholder=""/>
                   </td>
                    <td colspan="2">
                   <label class="span15">E-mail</label>
                   <input name="email" type="text" class="input20" style="width:75%;" value="<?php echo $info['email']; ?>" placeholder=""/>
                   </td>
                   </tr> 
                   
                   <tr>
                   <td colspan="4">
                   <label class="span15">Mailing Address</label>
                   <input name="address" type="text" class="input20" style="width:80%;" value="<?php echo $info['address']; ?>" placeholder=""/>
                   </td>
                   </tr>
                   
                    <tr>
                   <td colspan="2">
                   <label class="span15" style="width:20%;">Home Phone</label>
                   <input name="phone" type="text" class="input20" style="width:75%;" value="<?php echo $info['phone'].' '.$info['phone']; ?>" placeholder=""/>
                   </td>
                    <td colspan="2">
                   <label class="span15">Cell Phone</label>
                   <input name="mobile" type="text" class="input20" style="width:75%;" value="<?php echo $info['mobile']; ?>" placeholder=""/>
                   </td>
                   </tr> 
                  
                    
           </table>
                           
          
		</div>
		<!---left1-->

         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>

		<!-- no print buttons -->
	<br/>

	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
		<button class="btn btn-inverse pull-right"  data-dismiss="modal" type="button" style="margin-left:5px;" >Close</button>

		<select name="deal_status_id" id="deal_status_id" class="form-control pull-right" style="width: auto; display: inline-block;margin-left:5px;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php if(isset($info['deal_status_id'])) echo ($info['deal_status_id'] == $key)? 'selected="selected"' : "" ; ?> ><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right"  style="margin-left:5px;">Save Quote</button>

		<input type="hidden" id="tax_percent1" name="tax_percent" value="<?php echo isset($info['tax_percent'])?$info['tax_percent']:0; ?>" />
		<input type="hidden" id="tax_percent2" name="tax_percent2" value="<?php echo isset($info['tax_percent2'])?$info['tax_percent2']:0; ?>" />
        <input type="hidden" id="tax_percent3" name="tax_percent3" value="<?php echo isset($info['tax_percent3'])?$info['tax_percent3']:0; ?>" />

         <input type="hidden" id="filling_fee1" name="filling_fee" value="<?php echo isset($info['filling_fee'])?$info['filling_fee']:0; ?>" />
		<input type="hidden" id="filling_fee2" name="filling_fee2" value="<?php echo isset($info['filling_fee2'])?$info['filling_fee2']:0; ?>" />
        <input type="hidden" id="filling_fee3" name="filling_fee3" value="<?php echo isset($info['filling_fee3'])?$info['filling_fee3']:0; ?>" />

        <input type="hidden" id="dmv_offroad1" name="dmv_offroad" value="<?php echo isset($info['dmv_offroad'])?$info['dmv_offroad']:0; ?>" />
		<input type="hidden" id="dmv_offroad2" name="dmv_offroad2" value="<?php echo isset($info['dmv_offroad2'])?$info['dmv_offroad2']:0; ?>" />
        <input type="hidden" id="dmv_offroad3" name="dmv_offroad3" value="<?php echo isset($info['dmv_offroad3'])?$info['dmv_offroad3']:0; ?>" />

        <input type="hidden" id="axle_2_count2"  value="<?php echo isset($info['dmv_offroad'])?$info['dmv_offroad']:0; ?>" />
		<input type="hidden" id="axle_4_count"  value="<?php echo isset($info['dmv_offroad2'])?$info['dmv_offroad2']:0; ?>" />
        <input type="hidden" id="dmv_offroad3"  value="<?php echo isset($info['dmv_offroad3'])?$info['dmv_offroad3']:0; ?>" />
	</div>

	<?php echo $this->Form->end(); ?>

<script type="text/javascript">

var vehicle_unit_value=[<?php echo isset($info['combine_price'])?$info['combine_price']:$info['unit_value']; ?>,<?php echo isset($info['msrp2'])?$info['msrp2']:'0.00'; ?>,<?php echo isset($info['msrp3'])?$info['msrp3']:'0.00'; ?>];
var vehice_down_payment=[<?php echo isset($info['down_payment'])?$info['down_payment']:'0'; ?>,<?php echo isset($info['down_payment2'])?$info['down_payment2']:'0'; ?>,<?php echo isset($info['down_payment3'])?$info['down_payment3']:'0'; ?>];
var dmv_fee_on = [0.00,0.00,0.00];
var dmv_fee_off = [0.00,0.00,0.00];
var filling_fee_dmv = [0.00,0.00,0.00];
var axle_fee_2 = [0.00,0.00,0.00];
var axle_fee_4 = [0.00,0.00,0.00];
function assign_fees(data,v_id)
{
	arr_index = v_id -1;
	$("#freight_fee"+v_id).val(data.freight_fee);
	$("#prep_fee"+v_id).val(data.prep_fee);
	$("#doc_fee"+v_id).val(data.doc_fee);
	$("#tax_percent"+v_id).val(data.tax_fee);
	$axle_count = $("#axle_count"+v_id).val();
	$axle_fee='0.00';
	if($axle_count =='2')
	{
		$axle_fee = data.vehicle_axle_fee_2;
	}else if($axle_count =='4')
	{
		$axle_fee = data.vehicle_axle_fee_4;
	}
	$("#tire_wheel_fee"+v_id).val(data.title_fee);
	$("#parts_fee"+v_id).val(data.parts_fee);
	$dmv_fee= (data.dmv_fee == '' || data.dmv_fee == null)? 0.00 : parseFloat(data.dmv_fee);
	$dmv_offroad= (data.dmv_offroad == '' || data.dmv_offroad == null)? 0.00 : parseFloat(data.dmv_offroad);
	$filling_fee= (data.filling_fee == '' || data.filling_fee == null)? 0.00 : parseFloat(data.filling_fee);
	$dmv_fee =isNaN($dmv_fee)?0.00:$dmv_fee;
	$dmv_offroad =isNaN($dmv_offroad)?0.00:$dmv_offroad;
	$filling_fee =isNaN($filling_fee)?0.00:$filling_fee;
	axle_fee_2[arr_index] = data.vehicle_axle_fee_2;
	axle_fee_4[arr_index] = data.vehicle_axle_fee_4;
	$dmv_fee = parseFloat($dmv_fee + $filling_fee).toFixed(2);
	dmv_fee_on[arr_index] = $dmv_fee;
	dmv_fee_off[arr_index] = $dmv_offroad;
	filling_fee_dmv[arr_index] = $filling_fee;
	$("#filling_fee"+v_id).val($filling_fee);
	$("#dmv_offroad"+v_id).val($dmv_offroad);
	$("#dmv_fee"+v_id).val($dmv_fee);
	$("#loan_apr"+v_id).val(data.apr_percentage);
}

function calculate_balance(data_id)
{
	price_index=data_id-1;
	actual_value=vehicle_unit_value[price_index];
	allowance=$("#down_payment"+data_id).val();
	if(allowance=='')
	{
		allowance=0;
	}
	est_payoff=$("#less_payoff"+data_id).val();
	if(est_payoff=='')
	{
	  est_payoff=0;
	}
	est_payoff=parseFloat(est_payoff);
	allowance=parseFloat(allowance);
	//sell_price=parseFloat(actual_value-allowance);
	//$("#msrp"+data_id).val(sell_price.toFixed(2));
	//calculate_tax(data_id);
	total_cash=parseFloat($("#total_cash_price"+data_id).val());
	total_bal=parseFloat((total_cash+est_payoff)-allowance);
	total_bal=isNaN(total_bal)?0.00:total_bal;
	$("#amount"+data_id).val(total_bal.toFixed(2));
	$("#unit_value"+data_id).val(total_bal.toFixed(2));

}

function assign_payment(data_id){
	sell_value=parseFloat($("#amount"+data_id).val());
	sell_value=isNaN(sell_value)?0.00:$.sell_value;

	//down_percentage=vehice_down_payment[data_id-1];
	//down_payment=(parseFloat(down_percentage)/100)*sell_value;
	//down_payment=isNaN(down_payment)?0.00:down_payment;
	//$("#down_payment"+data_id).val(down_payment.toFixed(2));
	down_payment1=parseFloat($("#down_payment1").val());
	down_payment2=parseFloat($("#down_payment2").val());
	down_payment3=parseFloat($("#down_payment3").val());
	if(isNaN(down_payment1)){down_payment1=0;}
	if(isNaN(down_payment2)){down_payment2=0;}
	if(isNaN(down_payment3)){down_payment3=0;}
	total_payment=parseFloat(down_payment1)+parseFloat(down_payment2)+parseFloat(down_payment3);
	$("#total_down_payment").val(total_payment.toFixed(2));
	calculateMonthWisePayments(data_id);

}


$(document).ready(function(){

	$(".axle_count").on('change',function(){

		data_id =$(this).attr('data-id');

		arr_index =data_id -1;
		if($("#fixed_fee_options"+data_id).val()){
		$axle_count = $("#axle_count"+data_id).val();
		$axle_fee='0.00';
		if($axle_count =='2')
		{
			$axle_fee = axle_fee_2[arr_index];
		}else if($axle_count =='4')
		{
			$axle_fee = axle_fee_4[arr_index];
		}
		$("#tire_wheel_fee"+data_id).val($axle_fee);

		calculate_tax(data_id);
		}
		});

	$('.fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					assign_fees(data,data_id);
					vehice_down_payment[data_id-1]=data.down_percentage;
					calculate_tax(data_id);
					calculate_balance(data_id);
					assign_payment(data_id);

				}
			});
		}
	});

	$(".msrp").on('change keyup paste',function(){
							data_id=$(this).attr('data-id');
							price_index=data_id-1;
							price=parseFloat($(this).val());
							if(!isNaN(price)&& price >0)
							{
								vehicle_unit_value[price_index]=price;
							}
							calculate_tax(data_id);
							calculate_balance(data_id);
							assign_payment(data_id);
	});

	$(".trade_allowance").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_balance(data_id);
			assign_payment(data_id);
		});
		$(".less_payoff").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_balance(data_id);
			assign_payment(data_id);
			});

$("#trade_payoff").on('change keyup paste',function(){
			data_id=1;
			$("#less_payoff1").val($(this).val());
			calculate_balance(data_id);
			assign_payment(data_id);
			});
$(".freight_fee,.prep_fee,.parts_fee,.doc_fee,.tire_wheel_fee,.accs,.labor").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			calculate_tax(data_id);
			calculate_balance(data_id);
			assign_payment(data_id);
});

$(".dmv_fee").on('change keyup paste',function(){
			data_id=$(this).attr('data-id');
			price_index = data_id -1;
			dmv_fee_on[price_index]=$(this).val();
			calculate_tax(data_id);
			calculate_balance(data_id);
			assign_payment(data_id);
});

$(".suggest_price,.your_price").on('change keyup paste',function(){
		suggest_price = 0;
		your_price = 0;
		data_id =1;
		$(".suggest_price").each(function(){
			suggest_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		$(".your_price").each(function(){
			your_price += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		savings = suggest_price - your_price;
		$("#combine_unit_value").val(suggest_price.toFixed(2));
		$("#combine_savings").val(savings.toFixed(2));
		$("#msrp1").val(your_price.toFixed(2));
		vehicle_unit_value[0] = your_price;
		calculate_tax(data_id);
		calculate_balance(data_id);
		assign_payment(data_id);

	});
	
$(".trade_value,.trade_payoff").on('change keyup paste',function(){
	$trade_value=0;
	$trade_payoff = 0;
	data_id =1;
	$(".trade_value").each(function(){
			$trade_value += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
	$(".trade_payoff").each(function(){
			$trade_payoff += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});	
	$("#trade_value").val($trade_value.toFixed(2));	
	$("#less_payoff1").val($trade_payoff.toFixed(2));
	calculate_tax(data_id);
	calculate_balance(data_id);
	assign_payment(data_id);
	
	});	


function calculate_tax(data_id){
		//var tax_type = $('input:radio[name=taxopt]:checked').val();
		price_index=data_id-1;

		var tax_value=isNaN(parseFloat( $('#tax_percent'+data_id).val()))?0.00:parseFloat( $('#tax_percent'+data_id).val());
		var freight = isNaN(parseFloat( $('#freight_fee'+data_id).val()))?0.00:parseFloat( $('#freight_fee'+data_id).val());
		var prep = isNaN(parseFloat( $('#prep_fee'+data_id).val()))?0.00:parseFloat( $('#prep_fee'+data_id).val());
		var doc = isNaN(parseFloat( $('#doc_fee'+data_id).val()))?0.00:parseFloat($('#doc_fee'+data_id).val());
		var part_fee = isNaN(parseFloat($('#parts_fee'+data_id).val()))?0.00:parseFloat($('#parts_fee'+data_id).val());
		var tree_fee = isNaN(parseFloat( $('#tire_wheel_fee'+data_id).val()))?0.00:parseFloat( $('#tire_wheel_fee'+data_id).val());
		var sell_price = parseFloat(vehicle_unit_value[price_index]);

		$accs_price =0;
		for(i=1;i<=6;i++)
		{
		$accs_price += isNaN(parseFloat( $('#acc'+data_id+String(i)).val()))?0.00:parseFloat( $('#acc'+data_id+String(i)).val());
		}
		labor =isNaN(parseFloat( $('#labor'+data_id).val()))?0.00:parseFloat( $('#labor'+data_id).val());
		var amount = freight+prep+doc+part_fee+sell_price+$accs_price+labor;
		amount = isNaN(amount)?0.00:amount;

	//	var dmv_fee = parseFloat(dmv_fee_on[price_index]);
		//var dmv_offroad = parseFloat($("#dmv_offroad"+data_id).val());
	//	var dmv_fee_total = dmv_fee + (parseFloat(dmv_offroad)/100)*amount;
		//dmv_fee_total = isNaN(dmv_fee_total)?0.00:parseFloat(dmv_fee_total);
		//$("#dmv_fee"+data_id).val(dmv_fee_total.toFixed(2));
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		$trade_value = isNaN(parseFloat( $('#trade_value').val()))?0.00:parseFloat( $('#trade_value').val());
		
		amount = amount - $trade_value; 
		$("#sub_total"+data_id).val(amount.toFixed(2));
		//console.log('dmv_fee ::'+dmv_fee+'--dmv_offroad=='+dmv_offroad+'--dmv_fee_total='+dmv_fee_total+'--amount='+amount);
		amountIncludingTax = amountIncludingTax.toFixed(2);
		amountIncludingTax = isNaN(amountIncludingTax)?0.00:amountIncludingTax;
		$('#tax_fee'+data_id).val( amountIncludingTax );


		//actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee+dmv_fee_total;


		actual_balance = amount+parseFloat(amountIncludingTax)+tree_fee;
		//alert(actual_balance);
		actual_balance = isNaN(actual_balance)?0.00:actual_balance;
		$('#total_cash_price'+data_id).val( actual_balance.toFixed(2));
		//$('#amount'+data_id).val( actual_balance);
		//calculate_initial_investment();

		// update_10days_payoff();
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
	$(".loan_apr").on('change keyup paste',function(){
		data_id=$(this).attr('data-id');
		calculateMonthWisePayments(data_id);

		});

		$(".price_options").on('change',function(){
		data_id=$(this).attr('data-id');
		calculateMonthWisePayments(data_id);

		});
	$(".down_payment").on('change keyup paste',function(){
		$val = $(this).val();
		data_id =1;
		$("#down_payment").val($val);
		$("#down_payment1").val($val);
		calculate_tax(data_id);
		calculate_balance(data_id);
		assign_payment(data_id);

		});





	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);


	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		if(empty_fields(true)){

		$( "#worksheet_container" ).printThis();

		}
		//setTimeout(empty_fields(false),1500000);
	});

	$("#btn_back").click(function(){

	});


	//calculate();



});


		 function calculateMonthWisePayments(data_id){

		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years,data_id);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
										  payment.value = pay_monthly;

										  });
	 	}


	<?php /*?>function calculateMonthWisePayments(data_id){
			months=$("#option_price"+data_id).val();
			$("#option_month_span"+data_id).text();
			years=months/12;
			pay_monthly=MonthwisePayments(years,data_id);
			$("#payment"+data_id).val(pay_monthly);
		}<?php */?>

	function MonthwisePayments(years,data_id)
	{
		var apr = parseFloat($('#loan_apr'+data_id).val());
		var principal = parseFloat($('#amount'+data_id).val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		var tax = parseFloat($('#tax_percent'+data_id).val());
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

function empty_fields(fill)
{
	$(".amount_input").each(function(index){
		$val=$(this).val();

		if(fill){
		if($val=='0.00')
		{
			$(this).val('');
			$(this).attr('data-flag','1');
		}
		}else
		{
		flag=$(this).attr('data-flag');
		if($val==''&& flag)
		{
			$(this).val('0.00');
		}
		}
	});
	return true;
}


</script>
</div>
