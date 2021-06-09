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

		 
			 
				<div class="full">
                <table width="100%">
                <tr>
                <td width="25%">Customer Name :</td>
                <td width="25%"><input  type="text"  style="width:100%;" name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>" placeholder="" />	</td>
                 <td width="25%">Date :</td>
                <td width="25%"><input name="filled_date" type="text" style="width:100%;" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m-d-Y'); ?>" /></td>
                </tr>
                <tr>
                <td width="25%">Email :</td>
                <td width="25%"><input  type="text"  style="width:100%;" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" /></td>
                <td width="25%">DL #:</td>
                <td width="25%"><input  type="text" style="width:100%;" name="dl_no" value="<?php echo isset($info['dl_no'])?$info['dl_no']:''; ?>" /></td>
                </tr>
                <tr>
                <td width="25%">Address :</td>
                <td colspan="3" ><input name="address" type="text" style="width:100%;"  value="<?php echo isset($info['address'])?$info['address']:''; ?>" /></td>
                </tr>
                </table>
				
				                
                
				
               
				
                </div>
                <div class="full">
                 <span class="four">Cell Phone # :</span>
                 <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
				  ?>
				<input type="text" class="four"  name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />			
			    <span class="four">Home Phone #:</span>
				<input type="text" class="four" name="phone" value="<?php echo isset($info['phone'])?$cleaned2:''; ?>" />
				</div>
                 <h2 style="text-align:center;padding:20px;">PRE TEST RIDE SURVEY QUESTIONS</h2>
                <br />
               <div class="full">
				<span class="two-three">How did you hear about us? </span>
				<input type="text" class="four" name="how_hear_us" value="<?php echo isset($info['how_hear_us'])?$info['how_hear_us']:''; ?>" />			
			    <span class="two-three">What have you ridden in the past?  </span>
				<input type="text" class="four" name="have_you_ridden" value="<?php echo isset($info['have_you_ridden'])?$info['have_you_ridden']:''; ?>" />
                <span class="two-three">What do you currently own?  </span>
				<input type="text" class="four" name="what_currently_own" value="<?php echo isset($info['what_currently_own'])?$info['what_currently_own']:''; ?>"/>
                 <span class="two-three">What have you owned in the past?    </span>
				<input type="text" class="four" name="what_past_own" value="<?php echo isset($info['what_past_own'])?$info['what_past_own']:''; ?>" />
                <span class="full">What do you like best about your current motorcycle?  </span>
				<input type="text" class="full" name="what_current_vehicle" value="<?php echo isset($info['what_current_vehicle'])?$info['what_current_vehicle']:''; ?>" />
                <span class="full">What would be the "1" thing you would change about your current bike?  </span>
				<input type="text" class="full" name="one_thing_change" value="<?php echo isset($info['one_thing_change'])?$info['one_thing_change']:''; ?>" />
                <span class="two-three">If you like the vehicle would you consider a purchase today?   </span>
				<span class="six"><input type="radio" name="consider_purchase" value="Yes" <?php echo (isset($info['consider_purchase'])&& $info['consider_purchase']=='Yes')?'checked="checked"':''; ?> />&nbsp; Yes <input type="radio" name="consider_purchase" value="No" <?php echo (isset($info['consider_purchase'])&& $info['consider_purchase']=='No')?'checked="checked"':''; ?> />&nbsp; No</span>
                <span class="full">If not, what time frame before you will be ready to buy?</span>
                <span class="six"><input type="radio" name="what_time_frame" value="Tomorrow" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='Tomorrow')?'checked="checked"':''; ?> />&nbsp;Tomorrow</span>
                <span class="six"><input type="radio" name="what_time_frame" value="1_week" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='1week')?'checked="checked"':''; ?> />&nbsp;1 week</span>
                <span class="six"><input type="radio" name="what_time_frame" value="1_month" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='1month')?'checked="checked"':''; ?> />&nbsp;1 month</span>
                <span class="four"><input type="radio" name="what_time_frame" value="3_or_moremonths" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='3ormoremonths')?'checked="checked"':''; ?> />&nbsp;3 or more months</span>
				</div>
              <h2 style="text-align:center;padding:20px;">POST TEST RIDE SURVEY QUESTIONS</h2>
              <h4 style="text-align:center;padding:20px;">Please rate your overall reaction to the test ride</h4>
              <div class="full">
              <span class="six"><input type="radio"  name="rate_overall" value="Loved" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Loved')?'checked="checked"':''; ?> />&nbsp;Loved It</span>
                <span class="six"><input type="radio" name="rate_overall" value="Liked" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Liked')?'checked="checked"':''; ?> />&nbsp;Liked It</span>
                <span class="six"><input type="radio" name="rate_overall" value="It_was_OK" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='It_was_OK')?'checked="checked"':''; ?> />&nbsp;It was OK </span>
                <span class="six"><input type="radio" name="rate_overall" value="Disliked_It" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Disliked_It')?'checked="checked"':''; ?> />&nbsp;Disliked It</span>
                <span class="six"><input type="radio" name="rate_overall" value="Hated_It" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Hated_It')?'checked="checked"':''; ?> />&nbsp;Hated It</span>
                <span class="full">What one thing did you like best about the motorcycle you just rode? </span>
                <input type="text" class="full" name="best_thing_like" value="<?php echo isset($info['best_thing_like'])?$info['best_thing_like']:''; ?>" />
                 <span class="full">How do you plan on purchasing the vehicle? </span>
                 <span class="six"><input type="radio" name="plan_purchasing" value="Cash" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Cash')?'checked="checked"':''; ?> />&nbsp;Cash</span>
                <span class="six"><input type="radio" name="plan_purchasing" value="Check" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Check')?'checked="checked"':''; ?> />&nbsp;Check</span>
                <span class="six"><input type="radio" name="plan_purchasing" value="Credit_Card" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Credit_Card')?'checked="checked"':''; ?> />&nbsp;Credit Card </span>
                <span class="four"><input type="radio" name="plan_purchasing" value="Financing" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Financing')?'checked="checked"':''; ?> />&nbsp;Financing</span>
                <span class="two-three">Overall how would you rate your experience? 1 thru 10  </span>
                <input type="text" class="four" name="overall_experience" value="<?php echo isset($info['overall_experience'])?$info['overall_experience']:''; ?>" />
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
