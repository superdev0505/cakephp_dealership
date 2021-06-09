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
	.border_bottom{border:none;}
	.border_bottom{border-bottom:1px solid #000;}
	table.less-font{font-size:12px;}
}
</style>

		<div class="wraper header"> 
			<h2 style="text-align:center;font-size:19px;padding:20px;">THIS FORM MUST BE 100% COMPLETED BEFORE IT WIIL BE PROCESSED!!</h2>
          
			<table cellpadding="5" width="100%" class="less-font">
            <tr>	
				<td colspan="4" style="border:1px solid #000;">VIN MATCHES TITLE/REGISTRATION?
                <div style="float:right;">			
			    <input type="radio" name="match_registration" value="Yes"  <?php echo (isset($info['match_registration'])&& $info['match_registration']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="match_registration" value="No"  <?php echo (isset($info['match_registration'])&& $info['match_registration']=='No')?'checked="checked"':''; ?>  />&nbsp; No</div></td>             
				<td width="15%" align="right">Date</td>	
                <td width="20%"><input name="filled_data" type="text" style="width:100%" class="six date_input border_bottom" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>"/></td>		
			<tr>
            <tr>
            <td style="width:15%">CUSTOMER NAME</td>
            <td colspan="3"> <input name="name" type="text" style="width:100%" class="three border_bottom" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>"/></td>
            <td align="right">PHONE #</td>
            <td> 
            <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it

				  ?>
             <input name="mobile" style="width:100%" type="text" class="four border_bottom" value="<?php echo isset($info['mobile'])? $cleaned1:''; ?>" />		</td>
            </tr>
            <tr>
            <td>YEAR &nbsp;&nbsp;  <input name="year_trade" style="width:50px; display:inline;" type="text" class="border_bottom" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>"/></td>
            <td width="26%">MAKE &nbsp;&nbsp; <input name="make_trade" style="width:130px; display:inline;" type="text" class="border_bottom" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>"/></td>
            <td colspan="2">
            MODEL &nbsp;&nbsp;<input name="model_trade" style="width:120px; display:inline;" type="text" class="border_bottom"value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>"/>	
            </td>
            <td colspan="2">COLOR &nbsp;&nbsp;
             <input name="usedunit_color" type="text" style="width:200px; display:inline;" class="border_bottom" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" placeholder=""/>		
            </td>            
            </tr>
            <tr>
            <td>VIN #</td><td colspan="5"> <input name="vin_trade" type="text" style="width:70%" class="input71 border_bottom" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" placeholder=""/> <sub>MUST BE 17 DIGITS MC/OHV</sub> </td>
            </tr>
            <tr>
            <td>ENGINE #</td>
            <td colspan="2"> <input name="engine_trade" type="text" style="width:100%" class="border_bottom" value="<?php echo isset($info['engine_trade'])?$info['engine_trade']:''; ?>" placeholder=""/></td>
            </tr>
            <tr>
            <td colspan="2">
            DOES VEHICLE HAVE PLATES ?
            <div style="float:right;"><input type="radio" name="vehicle_have_plates" value="Yes"  <?php echo (isset($info['vehicle_have_plates'])&& $info['vehicle_have_plates']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="vehicle_have_plates" value="No"  <?php echo (isset($info['vehicle_have_plates'])&& $info['vehicle_have_plates']=='No')?'checked="checked"':''; ?>  />&nbsp; No</div>
            </td>
            <td colspan="2">PLATE #&nbsp;&nbsp; <input type="text" style="width:60%;display:inline;" class="border_bottom" name="plate_no" value="<?php echo isset($info['plate_no'])?$info['plate_no']:''; ?>"  /></td>
            <td colspan="2">EXPIRES&nbsp;&nbsp; <input type="text" class="border_bottom" style="width:72%;display:inline;" name="expires" value="<?php echo isset($info['expires'])?$info['expires']:''; ?>"  /></td>
            
            </tr>
            <tr>
            <td>MILES</td>
            <td> <input  type="text" class="border_bottom" style="width:70%" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" /></td>
            </tr>
            <tr>
            <td colspan="5">HAS THE UNIT EVER BEEN DROPPED OR INVOLVED IN AN ACCIDENT?</td>
            <td><input type="radio" name="involved_accident" value="Yes"  <?php echo (isset($info['involved_accident'])&& $info['involved_accident']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="involved_accident" value="No"  <?php echo (isset($info['involved_accident'])&& $info['involved_accident']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
            </tr>
            <tr>
            <td colspan="5">IF YES, WAS IT OVER $500 IN DAMAGE INCLUDING PARTS AND LABOR?</td>
            <td><input type="radio" name="damage_cost" value="Yes"  <?php echo (isset($info['damage_cost'])&& $info['damage_cost']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="damage_cost" value="No"  <?php echo (isset($info['damage_cost'])&& $info['damage_cost']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
            </tr>
            <tr>
            <td>EXPLAIN DETAILS:</td>
            <td colspan="4">
            <textarea style="width:100%" rows="4" name="explain_details"><?php echo isset($info['explain_details'])?$info['explain_details']:''; ?></textarea>
            </td>
            </tr>
     <tr>
     <td>PAYOFF</td>
     <td> <input  type="text" class="border_bottom" style="width:100%;" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" /></td>
     <td colspan="4">ACCOUNT # (SSN)&nbsp;&nbsp;<input name="account_no" type="text" class="border_bottom" style="width:200px;display:inline;" value="<?php echo isset($info['account_no'])?$info['account_no']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="2">PAYOFF DUE DATE&nbsp;&nbsp;
     <input name="payoff_due_date" type="text" style="width:130px;display:inline;;" class="border_bottom date_input" value="<?php echo isset($info['payoff_due_date'])?$info['payoff_due_date']:''; ?>" placeholder=""/></td>
      <td colspan="4">PAYOFF COMPANY &nbsp;&nbsp;<input name="payoff_company" type="text" class="border_bottom" style="width:250px;display:inline;" value="<?php echo isset($info['payoff_company'])?$info['payoff_company']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="6" >MAILING ADDRESS &nbsp;&nbsp;
    <input name="mail_address" type="text" style="width:250px;display:inline;" class="border_bottom" value="<?php echo isset($info['mail_address'])?$info['mail_address']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="2">AMOUNT DUE TO CUSTOMER
     <input name="amount_due" type="text" class="border_bottom" style="width:100px;display:inline;" value="<?php echo isset($info['amount_due'])?$info['amount_due']:''; ?>" placeholder=""/></td>
      <td colspan="2">Cost of Unit&nbsp;<input name="trade_value" type="text" style="width:100px;display:inline;" class="border_bottom" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" placeholder=""/>  </td>
     <td colspan="2">D.S.R.P&nbsp;&nbsp;<input name="d_s_r_p" type="text" style="width:140px;display:inline;" class="border_bottom" value="<?php echo isset($info['d_s_r_p'])?$info['d_s_r_p']:''; ?>" placeholder=""/></td>     
     </tr>
     <tr>
     <td colspan="3">REGISTERED OWNER &nbsp;&nbsp; <input name="reg_owner" type="text" class="border_bottom" style="width:200px;display:inline;" value="<?php echo isset($info['reg_owner'])?$info['reg_owner']:''; ?>" placeholder=""/></td>
     <td colspan="3">DEALER SALES REP &nbsp;&nbsp;<input name="sperson" type="text" style="width:200px;display:inline;" class="border_bottom" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td></td>
     </tr>
     <tr>
     <td colspan="6"><h3 style="text-align:center;font-size:19px;">CHECK OFF LIST</h3></td>
     </tr>
      <tr>
     <td colspan="6" align="center"><strong>**ALL FORMS MUST BE FILLED OUT AND SIGNED COMPLETELY**</strong><br/><br/></td>
     </tr>
     <tr>
     <td>Title</td>
     <td><input type="radio" name="trade_title" value="Yes"  <?php echo (isset($info['trade_title'])&& $info['trade_title']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="trade_title" value="No"  <?php echo (isset($info['trade_title'])&& $info['trade_title']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
     
     <td colspan="3"><strong>COPY OF DRIVER'S LICENSE</strong></td>
     </tr>
     <tr>
     <td><strong>REG 262</strong></td>
     <td colspan="3"><strong>A MUST FOR ALL UNITS!!</strong></td>     
     </tr>
     <tr>
     <td><strong>REG 227</strong></td>
     <td  colspan="5"><strong>IF NO TITLE PRESENT AND IS CLEAR OF LIENS (RUN KSR)</strong></td>
     </tr>
     <tr>
     <td colspan="6"><p>RELEASE OF LIABILITY (TOP PORTION OF TITLE) FILL IN DEALER PORTION/DATE/DOLLAR AMOUNT
AND RETURN TO THE CUSTOMER SO HE CAN SIGN AND SEND TO DMV. THIS IS THE CUSTOMERS
RESPONSIBILTY. IF YOU PROMISE THE CUSTOMER THAT WE WILL DO IT THEN YOU NEED TO
LET ME OR FINANCE KNOW THAT YOU MADE THIS PROMISE. THIS CAN BE DONE ONLINE, VERY SIMPLE.<br/>
http://www.dmv.ca.gov/portal/dmv/detail/online/nrl/welcome</p></td>
     </tr>
     
            
            
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
	
	
	$(".date_input").bdatepicker();
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
