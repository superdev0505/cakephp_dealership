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
margin-bottom:10px;
}
input[type=text],textarea{font-size:16px;font-weight:bold;}
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	
	input[type=text]{
		border:none;
		border-bottom: 1px solid #aaa;	
		}
}
</style>

		<div class="wraper header"> 
			 <table width="100%" >
          <tr>
          <td width="50%" valign="top">
          
          <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>"  style="width:270px;height:190px;" />
          </td>
          <td width="50%" align="right" >
          	<h1>SERVICE INVOICE</h1><br/><br/>
            <label style="width:100%;">Due Date:&nbsp; <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width:80%;" /> </label>
            <label style="width:100%;">Sales Notes &nbsp; <input type="text" name="notes" value="<?php echo isset($info['notes'])?$info['notes']:''; ?>" style="width:75%;" /></label>
          </td>
        
          </tr>
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td colspan="3" align="center"><strong>Customer</strong></td>
          </tr>
          
          <tr>
          <td colspan="2">
          <label style="width:100%;">Name &nbsp; <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" /></label>
           <label style="width:100%;">Address &nbsp; <input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" /></label>
            <label style="width:100%;">Phone &nbsp; <input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" /></label>
            
           <label style="width:100%;">Email &nbsp; <input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" /></label>
            
          </td>
          
          <td align="center">
          	
            <label style="width:100%;">X <input type="text" name="customer_signature" style="width:95%;" /></label>
          <small style="text-align:center;">Customer Signature</small>
          	
          </td>         
          </tr>
          
          <tr>
          <td width="20%"><label style="width:100%;">Year &nbsp;<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:75%;" /></label></td>
          <td width="35%"><label style="width:100%;">Make &nbsp;<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:85%;" /></label></td>
          <td width="45%">
          <label style="width:100%;">Model &nbsp;<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:85%;" /></label>
          </td>
          </tr>
          
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td width="40%"><label style="width:100%;">Salesperson &nbsp;<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:72%;" /></label></td>
          <td width="60%">
          <label style="width:100%;">VIN &nbsp;<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width:85%;" /></label>
          
          </td>          
          </tr>
          
              <tr>
          <td width="40%"><label style="width:100%;">Job &nbsp;<input type="text" name="job_title" value="<?php echo isset($info['job_title'])?$info['job_title']:''; ?>" style="width:85%;" /></label></td>
          <td width="60%">
          <label style="width:100%;">Mile In/Out: &nbsp;<input type="text" name="miles_in_out" value="<?php echo isset($info['miles_in_out'])?$info['miles_in_out']:''; ?>" style="width:78%;" /></label>
          </td>          
          </tr>
          
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td width="20%" align="center"><label>PART #</label> </td>
          <td width="60%" align="center"><label> DESCRIPTION</label></td>
          <td width="20%" align="center"><label>QUANTITY</strong> </td>
         
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_1" value="<?php echo isset($info['part_number_1'])?$info['part_number_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_1" value="<?php echo isset($info['part_desc_1'])?$info['part_desc_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_1" value="<?php echo isset($info['quantity_1'])?$info['quantity_1']:''; ?>" /></td>
         
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_2" value="<?php echo isset($info['part_number_2'])?$info['part_number_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_2" value="<?php echo isset($info['part_desc_2'])?$info['part_desc_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_2" value="<?php echo isset($info['quantity_2'])?$info['quantity_2']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_3" value="<?php echo isset($info['part_number_3'])?$info['part_number_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_3" value="<?php echo isset($info['part_desc_3'])?$info['part_desc_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_3" value="<?php echo isset($info['quantity_3'])?$info['quantity_3']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_4" value="<?php echo isset($info['part_number_4'])?$info['part_number_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_4" value="<?php echo isset($info['part_desc_4'])?$info['part_desc_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_4" value="<?php echo isset($info['quantity_4'])?$info['quantity_4']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_5" value="<?php echo isset($info['part_number_5'])?$info['part_number_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_5" value="<?php echo isset($info['part_desc_5'])?$info['part_desc_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_5" value="<?php echo isset($info['quantity_5'])?$info['quantity_5']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_6" value="<?php echo isset($info['part_number_6'])?$info['part_number_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_6" value="<?php echo isset($info['part_desc_6'])?$info['part_desc_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_6" value="<?php echo isset($info['quantity_6'])?$info['quantity_6']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_7" value="<?php echo isset($info['part_number_7'])?$info['part_number_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_7" value="<?php echo isset($info['part_desc_7'])?$info['part_desc_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_7" value="<?php echo isset($info['quantity_7'])?$info['quantity_7']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_8" value="<?php echo isset($info['part_number_8'])?$info['part_number_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_8" value="<?php echo isset($info['part_desc_8'])?$info['part_desc_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_8" value="<?php echo isset($info['quantity_8'])?$info['quantity_8']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_9" value="<?php echo isset($info['part_number_9'])?$info['part_number_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_9" value="<?php echo isset($info['part_desc_9'])?$info['part_desc_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_9" value="<?php echo isset($info['quantity_9'])?$info['quantity_9']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_10" value="<?php echo isset($info['part_number_10'])?$info['part_number_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_10" value="<?php echo isset($info['part_desc_10'])?$info['part_desc_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_10" value="<?php echo isset($info['quantity_10'])?$info['quantity_10']:''; ?>" /></td>
          
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_11" value="<?php echo isset($info['part_number_11'])?$info['part_number_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_11" value="<?php echo isset($info['part_desc_1!'])?$info['part_desc_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_11" value="<?php echo isset($info['quantity_11'])?$info['quantity_11']:''; ?>" /></td>
         
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_12" value="<?php echo isset($info['part_number_12'])?$info['part_number_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_12" value="<?php echo isset($info['part_desc_12'])?$info['part_desc_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_12" value="<?php echo isset($info['quantity_12'])?$info['quantity_12']:''; ?>" /></td>
         
          </tr>
          
         
          
          
          <tr>
          <td colspan="3">
           <label style="width:100%;">Tech: &nbsp;<input type="text" name="service_tech" value="<?php echo isset($info['service_tech'])?$info['service_tech']:''; ?>" style="width:85%;" /></label>
          </td>
          </tr>
          
           <tr>
          <td colspan="3">
           <label style="width:100%;">Comments: &nbsp;<textarea style="width:85%;" name="comments"><?php echo isset($info['comments'])?$info['comments']:''; ?></textarea>
          </td>
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
