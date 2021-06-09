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
}
</style>

		<div class="wraper header"> 

		  <h2 style="text-align:center; text-decoration:underline;padding:20px;">Vehicle Release For Customer Purchase</h2>
           <h4 style="text-align:center;padding:20px;">This Form Must be Started by the Salesperson for Step1</h4>
           <h4 style="text-align:center;padding:20px;">Step 1</h4>
			 <span class="span24">Customer Name :</span>
                <input type="text" class="input71" name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>"/>
                <br/>
				<div class="full">
				<span class="four">Date :</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>"/>			
			    <span class="four" style="width:20%;">Stock Number :</span>
				<input name="stock_num" type="text" class="four" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" placeholder=""/>
				</div>
                <br />
               <div class="full">
				<span class="six" style="width:8%;">VIN # :</span>
				<input name="vin" type="text" class="six" style="width:22%;" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" placeholder=""/>			
			    <span class="six" style="width:9%">Model:</span>
				<input type="text" class="six" style="width:28%" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" />
                <span class="six" style="width:9%">Color:</span>
				<input  type="text" class="six" style="width:16%" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" />
				</div>
              
            	<span class="span60">Salesman has verified above VIN matches G/R & unit rolled to PDI</span>
                <input name="vin_initial" type="text" class="input12" value="<?php echo isset($info['vin_initial'])?$info['vin_initial']:''; ?>" placeholder="Intials"/>
                <input name="vin_prints" type="text" class="input20" value="<?php echo isset($info['vin_prints'])?$info['vin_prints']:''; ?>"  placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 2 Finance</h4>
                <span class="span60">F & I verified above listed unit matches docs printed for customer</span>
                <input name="fi_intials" type="text" class="input12" value="<?php echo isset($info['fi_intials'])?$info['fi_intials']:''; ?>"  placeholder="Intials"/>
                <input name="fi_prints" type="text" class="input20" value="<?php echo isset($info['fi_prints'])?$info['fi_prints']:''; ?>" placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 3 Pre Delivery</h4>
                <span class="span60">PDI has verified above listed unit is being released to customer and matches DMV temporary registration</span>
                <input name="dmv_initials" type="text" class="input12" value="<?php echo isset($info['dmv_initials'])?$info['dmv_initials']:''; ?>"  placeholder="Intials"/>
                <input name="dmv_prints" type="text" class="input20" value="<?php echo isset($info['dmv_prints'])?$info['dmv_prints']:''; ?>" placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 4 Customer</h4>
                <span class="span60">Customer have verified the unit being received</span>
                <input name="unit_initials" type="text" class="input12" value="<?php echo isset($info['unit_initials'])?$info['unit_initials']:''; ?>" placeholder="Intials"/>
                <input name="unit_prints" type="text" class="input20" value="<?php echo isset($info['unit_prints'])?$info['unit_prints']:''; ?>" placeholder="Prints"/>
                <br />
               
                
			 <h4 style="text-align:center;padding:20px;">Instructions</h4>
            <span class="full">1. &nbsp;Form is filled out and VIN is verified off unit being sold to cutomer ,then form is turned into finance with customer. </span>
            <span class="full">2. &nbsp;Finance verifies unit on form is correct with Docs being signed by customer. </span>
            <span class="full">3. &nbsp;Form is then paper clipped to temporary registration and inserted upright in customer doc's folder then walked back too PDI by Salesman for PDI verification . </span>
            <span class="full">4. &nbsp;Cutomer is then assisted by PDI during walk thru and shown location of VIN and customer signoff that correct unit is being received. </span>
            <span class="full">5. &nbsp;Form is attached to get ready for filling. </span>
			
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
