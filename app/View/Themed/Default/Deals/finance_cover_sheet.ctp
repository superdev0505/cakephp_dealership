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
	padding: 4px 10px;
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
    width: 25%;
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
.fborder_bottom {
border-bottom:#000 1px solid;
margin-bottom:7px;
}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	body { font-family: Georgia, ‘Times New Roman’, serif; }
	/*
	div.wraper.header {
		font-family:"Arial";
	}*/
}
</style>

		<div class="wraper header">



				<div class="fborder_bottom">
				<span class="span24">Salesman :</span>
				<span class="span24"><?php echo isset($info['sperson'])?$info['sperson']:''; ?></span>
			    <span class="span24" style="width:20%;">Customer Name :</span>
				<span class="span24"><?php echo isset($info['name'])?ucfirst($info['name']):$info['first_name'].' '.$info['last_name']; ?></span>
                </div>


                <div class="fborder_bottom">
                <span class="span24 " style="width:17%">Make & Model</span>
                <span class="span24 " style="width:30%"><?php echo isset($info['make_model'])?$info['make_model']:$info['make'].' '.$info['model']; ?></span>
                <span class="span24" style="width:14%">Down Payment</span>
                <span class="span24" style="width:13%"></span>
                <span class="span24" style="width:24%">Trade</span>
                </div>

               <span class="span24" style="width:72%"> <h2 style="text-align:center; text-decoration:underline;padding:10px;">FINANCE STATUS SHEET</h2></span><span class="span24 fborder_bottom" style="width:28%">Date &nbsp;&nbsp;<?php echo isset($info['sheet_date'])?$info['sheet_date']:date('m/d/Y'); ?> </span><br />
            	<div class="fborder_bottom">
               	 	<span class="span24">SYNCHRONY YAMAHA</span>
             	 	<span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">YAMAHA REVOLVING</span>
                    <span class="input71">&nbsp;</span>
                </div>
                 <div class="fborder_bottom">
                    <span class="span24">YAMAHA SUB PRIME</span>
                    <span class="input71">&nbsp;</span>
                </div>
			
                <div class="fborder_bottom">
                    <span class="span24">SYNCHRONY KAWASAKI</span>
                    <span class="input71">&nbsp;</span>
                </div>
                
                <div class="fborder_bottom">
                    <span class="span24">SHEFFIELD KAWASAKI</span>
                    <span class="input71">&nbsp;</span>
                </div>
             
                <div class="fborder_bottom">
                    <span class="span24">CITI BANK KAWASAKI</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">WESTLAKE</span>
                    <span class="input71" >&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">SYNCHRONY SUZUKI</span>
                   <span class="input71">&nbsp;</span>
               </div>
                <div class="fborder_bottom">
                    <span class="span24">SHEFFIELD SUZUKI</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">ROADRUNNER – SUZUKI/BRP</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">SHEFFIELD BRP</span>
                   <span class="input71" >&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">CITI BANK BRP</span>
                   <span class="input71" >&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">SYNCHRONY KTM</span>
                  <span class="input71" >&nbsp;</span>
                </div>
                  <div class="fborder_bottom">
                    <span class="span24">FREEDOM ROAD KTM</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">MB FINANCIAL</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">LBS FINANCIAL</span>
                   <span class="input71">&nbsp;</span>
                </div>
                
                <div class="fborder_bottom">
                    <span class="span24">THUNDERROAD</span>
                   <span class="input71">&nbsp;</span>
                </div>

                 <div class="fborder_bottom">
                     <span class="span24">MODEL</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">DWIGHT</span>
                   <span class="input71" >&nbsp;</span>
                 </div>
                 
                 <div class="fborder_bottom">
                     <span class="span24">LENDMARK</span>
                    <span class="input71">&nbsp;</span>
                 </div>
                 <div class="fborder_bottom">
                    <span class="span24">MARINE ONE</span>
                     <span class="input71">&nbsp;</span>
                </div>
				<div class="fborder_bottom">
                    <span class="span24">TECHNICOLOR</span>
                     <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">POLARIS VISA</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">OTHER</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">
				 <h4 style="text-align:center;padding:10px">Stipulation Required for Loan Approval</h4>
             </div>
            <div class="full">
            <label class="label30"> <input type="checkbox" name="stipulation_1" value="Full coverage Insurance"  <?php echo (isset($info['stipulation_1'])&& $info['stipulation_1']=='Full coverage Insurance')?'checked="checked"':''; ?> />&nbsp; Full coverage Insurance</label>
            <label class="label20"> <input type="checkbox" name="stipulation_2" value="6 References"  <?php echo (isset($info['stipulation_2'])&& $info['stipulation_2']=='6 References')?'checked="checked"':''; ?> />&nbsp; 6 References</label>
            <label class="label20"> <input type="checkbox" name="stipulation_3" value="Proof of Income"  <?php echo (isset($info['stipulation_3'])&& $info['stipulation_3']=='Proof of Income')?'checked="checked"':''; ?>   />&nbsp; Proof of Income</label>
            <label class="label30"> <input type="checkbox" name="stipulation_4" value="Address Verification"  <?php echo (isset($info['stipulation_4'])&& $info['stipulation_4']=='Address Verification')?'checked="checked"':''; ?>  />&nbsp; Address Verification</label>
            <label class="label30"> <input type="checkbox" name="stipulation_5" value="Insurance Card"  <?php echo (isset($info['stipulation_5'])&& $info['stipulation_5']=='Insurance Card')?'checked="checked"':''; ?>  />&nbsp; Insurance Card</label>
            <label class="label20"> <input type="checkbox" name="stipulation_6" value="Driver License"  <?php echo (isset($info['stipulation_6'])&& $info['stipulation_6']=='Driver License')?'checked="checked"':''; ?>    />&nbsp; Driver’s License</label>
           	<label class="label20"> <input type="checkbox" name="stipulation_7" value="Voided Check"  <?php echo (isset($info['stipulation_7'])&& $info['stipulation_7']=='Voided Check')?'checked="checked"':''; ?>  />&nbsp; Voided Check </label>
            <label class="label30"> <input type="checkbox" name="stipulation_8" value="Bank Statements"  <?php echo (isset($info['stipulation_8'])&& $info['stipulation_8']=='Bank Statements')?'checked="checked"':''; ?>  />&nbsp; Bank Statements</label>
            <label class="label30"> <input type="checkbox" name="stipulation_9" value="Tax Returns"  <?php echo (isset($info['stipulation_9'])&& $info['stipulation_9']=='Tax Returns')?'checked="checked"':''; ?>   />&nbsp; Tax Returns</label>
            <label class="label20"> <input type="checkbox" name="stipulation_10" value="Sign Credit App"  <?php echo (isset($info['stipulation_10'])&& $info['stipulation_10']=='Sign Credit App')?'checked="checked"':''; ?>   />&nbsp; Sign Credit App</label>
            <label class="label20">&nbsp;</label>
            <label class="label30 fborder_bottom">Other</label>
            </div>
            
            
            </div>
             <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
		<textarea name="coments" rows="5" cols="100"><?php echo isset($info['coments'])?$info['coments']:''; ?></textarea>

		<!---left1-->
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
