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
}
</style>

		<div class="wraper header"> 
			<h2 style="text-align:center;padding:20px;">Probe Sheet</h2>
            <div class="full">
				<span class="six">CRM REF #</span>			
			   	<input name="contact_id" type="text" class="six" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" placeholder=""/>		
			</div>
            
             <div class="full">
				
				<span class="six">Date</span>			
			     <input name="filled_date" type="text" class="six" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m-d-Y'); ?>" placeholder=""/>
                 <span class="six">&nbsp;</span>	             
				<span class="six">Time</span>	
                <input name="filled_time" type="text" class="four" value="<?php echo isset($info['filled_time'])?$info['filled_data']:date('h:i A'); ?>" placeholder=""/>			    
			</div>
            <span class="span24">Sales Rep</span>
            <input type="text" class="input71" name="sperson" value="<?php echo isset($info['sperson'])?$sales_person_name:''; ?>" />
             <br />
             <span class="span24">Guest Name</span>
            <input type="text" class="input71"  name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):''; ?>" />
             <br />
             <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
				  ?>
             <span class="span24">Cell #</span>
             <input type="text" class="input20" name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />
             <span class="span15">Home #</span>
            <input type="text" class="input35" name="phone" value="<?php echo isset($info['phone'])?$cleaned2:''; ?>" />
            <br />
            <span class="span24">Email Address</span>
            <input type="text" class="input71" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" />
            <br />
            <div class="full">
            
            <span class="six" style="width:5%">Unit</span>
            <span class="six" style="width:17%"><input type="radio" name="condition" value="New" <?php echo (isset($info['condition'])&& $info['condition']=='New')?'checked="checked"':''; ?>  /> &nbsp;New <br/><input type="radio" name="condition" value="Used"  <?php echo (isset($info['condition'])&& $info['condition']=='Used')?'checked="checked"':''; ?> /> &nbsp;Used</span><span class="six" style="width:7%">Year</span>
            <input type="text" class="six" style="width:9%" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>"  />
            <span class="six" style="width:6%">Make</span>
            <input type="text" class="four" name="make"  style="width:50%" value="<?php echo isset($info['make'])?$info['make']:''; ?>" />
           
            </div>
            <div class="full">
             
            <span class="six" style="width:7%">Model</span>
            <input type="text" class="four" style="width:52%"  name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" />
             <span class="six" style="width:7%">Color</span>
            <input type="text" class="four" style="width:30%" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" />
            
            </div>
            <br  />
            <span class="span15">City</span>
            <input type="text" class="input17" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" />
            <span class="span15">County</span>
            <input type="text" class="input17" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" />
              <span class="span15">Zip</span>
            <input type="text" class="input17" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" />
            <br />
            <div class="full">
            <span class="four">Method of payment? </span>
            <span class="two-three"><input type="radio" name="payment_method" value="Cash"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Cash')?'checked="checked"':''; ?> /> &nbsp;Cash <input type="radio" name="payment_method" value="Check"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Check')?'checked="checked"':''; ?> /> &nbsp;Check <input type="radio" name="payment_method" value="Credit_Card"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Credit_Card')?'checked="checked"':''; ?> /> &nbsp;Credit Card <input type="radio" name="payment_method" value="Finance"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Finance')?'checked="checked"':''; ?> /> &nbsp;Finance</span>
            </div>
            <div class="full">
            <span class="six">Source</span>
            <span class="two-three" style="width:81%"><input type="radio" name="source" value="FREE_WY"  <?php echo (isset($info['source'])&& $info['source']=='FREE_WY')?'checked="checked"':''; ?> />&nbsp;FREE WY &nbsp;<input type="radio" name="source" value="OUR_WEB"  <?php echo (isset($info['source'])&& $info['source']=='OUR_WEB')?'checked="checked"':''; ?> />&nbsp;OUR WEB &nbsp;<input type="radio" name="source" value="CT_ONLINE"  <?php echo (isset($info['source'])&& $info['source']=='CT_ONLINE')?'checked="checked"':''; ?> />&nbsp;CT ONLINE &nbsp;<input type="radio" name="source" value="CRAIGS"  <?php echo (isset($info['source'])&& $info['source']=='CRAIGS')?'checked="checked"':''; ?> /> &nbsp; CRAIGS &nbsp;<input type="radio" name="source" value="REFERAL"  <?php echo (isset($info['source'])&& $info['source']=='REFERAL')?'checked="checked"':''; ?> /> &nbsp; REFERAL &nbsp;<input type="radio" name="source" value="PREV_PURCHASE"  <?php echo (isset($info['source'])&& $info['source']=='PREV_PURCHASE')?'checked="checked"':''; ?>  />&nbsp;PREV PURCHASE &nbsp;<input type="radio" name="source" value="SEARCH_ENGINE"  <?php echo (isset($info['source'])&& $info['source']=='SEARCH_ENGINE')?'checked="checked"':''; ?> /> &nbsp; SEARCH ENGINE &nbsp;<input type="radio" name="source" value="NO_SOURCE"  <?php echo (isset($info['source'])&& $info['source']=='NO_SOURCE')?'checked="checked"':''; ?> />&nbsp; NO SOURCE &nbsp;<input type="radio" name="source" value="PERSONAL"  <?php echo (isset($info['source'])&& $info['source']=='PERSONAL')?'checked="checked"':''; ?> />&nbsp; PERSONAL &nbsp;<input type="radio" name="source" value="OTHER"  <?php echo (isset($info['source'])&& $info['source']=='OTHER')?'checked="checked"':''; ?> />&nbsp;OTHER&nbsp;</span>
            </div>
            <br />
            <span class="span24">Appointment Date</span>
            <input type="text" class="input20" id="appt_date" name="appt_date" value="<?php echo isset($info['appt_date'])?$info['appt_date']:''; ?>" />
            <span class="span15">Time</span>
            <span class="span24">
             <div class="bootstrap-timepicker">
  <input type="text" id="appt_time" name="appt_time" class="input-small" value="<?php echo isset($info['appt_time'])?$info['appt_time']:''; ?>" />
			 <i class="icon-time"></i>
			</div>
          </span>
            <br />
            <span class="span24" style="width:36%;text-decoration:underline">Have You Visited our 30,000sq ft showroom?</span>
            <input class="input71" type="text" style="width:59%;" name="have_you_visted" value="<?php echo isset($info['have_you_visted'])?$info['have_you_visted']:''; ?>" /> 
            <br/>
            <span class="span15">Trade</span>
            <input type="text" class="inpu20" style="width:30%" name="trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" />
            <span class="span15">Accessories</span>
            <input type="text" class="inpu20" style="width:34%" name="accessories" value="<?php echo isset($info['accessories'])?$info['accessories']:''; ?>" /> 
            <br /><br/>
            <span class="span24"  style="text-decoration:underline">Rapport building notes</span>
            <textarea class="input71" rows="2" name="rapport_notes"><?php echo isset($info['accessories'])?$info['rapport_notes']:''; ?></textarea>
            <br/><br/>
            <span class="span24">Objections</span>
            <textarea class="input71" rows="1" name="objections"><?php echo isset($info['objections'])?$info['objections']:''; ?></textarea>
            <br/>
            
       
           
            
           
			
                
               <br /> 
	         
              
              
                <br />
                
          
              
           
          
                 
             
     
    
          
			
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
	
	
	$("#appt_date").bdatepicker();
	$("#appt_time").timepicker();
	
	
	
		
	
	
	
	
	

	
	
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
