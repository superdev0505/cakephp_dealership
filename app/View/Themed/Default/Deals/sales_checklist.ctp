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
.input90 {
    width: 96%;
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
				
				<span class="half"></span>	
                 <span class="four" style="width:10%"></span>		
			    <span class="four" style="width:12%">Date :</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('Y-m-d'); ?>"/>
               
				
			</div>
             
            
            
		  <h2 style="text-align:center; text-decoration:underline;padding:20px;">Salesperson Successful Day checklist</h2>
         
			 
				<div class="full">
                <span class="four">1. </span>
				<span class="four">Month Units Goals :</span>
				<input name="month_goals" type="text" class="four" value="<?php echo isset($info['month_goals'])?$info['month_goals']:''; ?>" />
                <span class="four">&nbsp;</span>			
			    <span class="four"></span>
				<span class="four">Current MTD Rolled :</span>
				<input type="text" class="four" name="mtd_rolled"  value="<?php echo isset($info['mtd_rolled'])?$info['mtd_rolled']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Short form month Goals :</span>
				<input type="text" class="four"  name="short_month_goals"  value="<?php echo isset($info['short_month_goals'])?$info['short_month_goals']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Working Days left :</span>
				<input type="text" class="four" name="working_days_left"  value="<?php echo isset($info['working_days_left'])?$info['working_days_left']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Today Goal :</span>
				<input type="text" class="four" name="today_goals"  value="<?php echo isset($info['today_goals'])?$info['today_goals']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">End of Day actual Rolled :</span>
				<input type="text" class="four" name="actual_rolled"  value="<?php echo isset($info['actual_rolled'])?$info['actual_rolled']:''; ?>" />
                <span class="four">&nbsp;</span>
				</div>
                <br />
                <div class="full">
				<span class="half" style="width:52%">2. &nbsp;Complete all CRM follow up's</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="complete_follow_ups" value="Yes"  <?php echo (isset($info['complete_follow_ups'])&& $info['complete_follow_ups']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio" name="complete_follow_ups" value="No"  <?php echo (isset($info['complete_follow_ups'])&& $info['complete_follow_ups']=='No')?'checked="checked"':''; ?>  />&nbsp; No</span>
                <span class="half" style="width:52%">3. &nbsp;Confirm and Update Appointments with Sales Manager</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="confirm_update" value="Yes"  <?php echo (isset($info['confirm_update'])&& $info['confirm_update']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio" name="confirm_update" value="No"  <?php echo (isset($info['confirm_update'])&& $info['confirm_update']=='No')?'checked="checked"':''; ?>    />&nbsp; No</span>
               <span class="half" style="width:52%">4. &nbsp;Organize section and ensure 100% of the vehicle are tagged,cleaned & organized</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="organize_section" value="Yes"  <?php echo (isset($info['organize_section'])&& $info['organize_section']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="organize_section" value="No"  <?php echo (isset($info['organize_section'])&& $info['organize_section']=='No')?'checked="checked"':''; ?>   />&nbsp; No</span>
                <span class="half" style="width:52%">5. &nbsp;Complete Inventory walk (Know what we have both New & Used)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="complete_inventory" value="Yes"  <?php echo (isset($info['complete_inventory'])&& $info['complete_inventory']=='Yes')?'checked="checked"':''; ?>    />&nbsp; Yes <input type="radio" name="complete_inventory" value="No"  <?php echo (isset($info['complete_inventory'])&& $info['complete_inventory']=='No')?'checked="checked"':''; ?>  />&nbsp; No</span>
                <span class="half" style="width:52%">6. &nbsp;Are all units sold actuall off property(Did they roll?) If not what is outstanding?</span>
				 <span class="four" style="width:30%"><input type="text" class="input90" name="did_they_rolled"  value="<?php echo isset($info['did_they_rolled'])?$info['did_they_rolled']:''; ?>"   /></span>			
			    <span class="four" style="width:15%"><input type="radio" name="all_unit_sold" value="Yes"  <?php echo (isset($info['all_unit_sold'])&& $info['all_unit_sold']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio"  name="all_unit_sold" value="No"  <?php echo (isset($info['all_unit_sold'])&& $info['all_unit_sold']=='No')?'checked="checked"':''; ?>    />&nbsp; No</span>
                 <span class="half" style="width:52%">A. &nbsp;How many logged "Contacts" for the day(Min Goal 5)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="text" class="input90"  name="home_many_logged"  value="<?php echo isset($info['home_many_logged'])?$info['home_many_logged']:''; ?>"   /></span>
                 <span class="half" style="width:52%">B. &nbsp;How many  "Write-Ups" for the day(Min Goal 3)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="text" class="input90" name="home_many_writeups"  value="<?php echo isset($info['home_many_writeups'])?$info['home_many_writeups']:''; ?>"     /></span>
                <span class="four" style="width:28%">C. &nbsp;Notes</span>			
			   <textarea class="four" style="width:68%" rows="4" name="notes"><?php echo isset($info['notes'])?$info['notes']:''; ?></textarea>
              </div>
              <div class="full">
               <span class="four" style="width:28%">D. &nbsp;What can I have done to Hit required goal (If Applicable)</span>			
			   <textarea class="four" style="width:68%" rows="4" name="what_can_done"><?php echo isset($info['what_can_done'])?$info['what_can_done']:''; ?></textarea>
                
                </div>
               
                
               
                
			
            
            <div class="full">
				<span class="four">Print Name :</span>
				<input name="name" type="text" class="four" value="<?php echo isset($info['name'])?$info['name']:''; ?>" placeholder=""/>			
			    <span class="four" style="width:20%;">Date:</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('Y-m-d'); ?>" placeholder=""/>
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
