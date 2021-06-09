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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
		<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
	
}

.text_captialize{
	text-transform:capitalize;
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
	table td{
		font-size:10px;
		padding:0px;
	}
	input[type=text] 
	{
		height:15px;	
	}
	input[type=checkbox] 
	{
		height:10px;	
	}
}

</style>

		<div class="wraper header"> 
		<table style="width:100%; border:0px solid #4c4c4c; margin:0 auto; font-family:arial; font-size:14px;padding:20px">
			<tbody>
				<tr>
					<td colspan="5" style="text-align:center"><h2>LOANER BIKE ACKNOWLEGEMENT,RELEASE,WAIVER,ASSUMPTION OF RISK,<br>INDEMNITY,AND ARBITRATION AGREEMENT</h2></td>
				</tr>
				<tr>
					<td>
						<p style="text-align:left;"><strong style="font-size:16px;"><b>Dealership Name & Address</b></strong><br>
						Long Beach BMW Motorcycles <br>
						2125 E. String Street<br>
						Long Beach, CA 90806 <br>
					
					</td>
					<td>&nbsp;</td>
					<td >
						<strong><b>Loaner Number</b></strong>
					
					</td>
					<td><input style=" border:0; border-bottom:1px solid #000;" type="text" name="loaner-number" value="<?php echo isset($info['loaner-number']) ? $info['loaner-number'] : '' ?>" ></td>
				</tr>
				<tr>
					<td ><strong><b>Demo Rider Name</b></strong>:</td>
					<td ><input style=" border:0; border-bottom:1px solid #000;" type="text"name="rider-name" value="<?php echo isset($info['rider-name']) ? $info['rider-name'] : $info['first_name']." ".$info['last_name']; ?>" ></td>
					<td colspan=3></td>
				</tr>
				<tr>
							
					<td><strong><b>Address:</b></strong></td>
					<td><input style="border:0; border-bottom:1px solid #000;" type="text"name="address-line1" value="<?php echo isset($info['address-line1']) ? $info['address-line1'] : $info['address'] ?>" ></td>
					<td><input style="border:0; border-bottom:1px solid #000;" type="text" name="address-line2" value="<?php echo isset($info['address-line2']) ? $info['address-line2'] : $info['city'] ?>" ></td>
					<td><input style="border:0; border-bottom:1px solid #000;" type="text" name="address-line3" value="<?php echo isset($info['address-line3']) ? $info['address-line3'] : $info['state'] ?>" ></td>
					<td><input style="border:0; border-bottom:1px solid #000;" type="text"name="address-line4" value="<?php echo isset($info['address-line4']) ? $info['address-line4'] :$info['zip']?>" ></td>
				</tr>
				<tr>
					<td><strong><b>Phone Number:</b></strong></td>
					<td>
					<?php
					if(isset($info['phone-number'])){
							$phoneval = $info['phone-number'];
						}
						elseif(isset($info['phone'])){
							$phoneval = $info['phone'];
						}
						elseif(isset($info['mobile'])){
							$phoneval = $info['mobile'];
						}
						else{
							$phoneval = "000-000-0000"; 
						}
					?>
					
					<input style=" border:0; border-bottom:1px solid #000;" type="text" name="phone-number" value="<?php echo $phoneval; ?>" ></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><strong><b>CA Driver License No.</b></strong></td>
					<td><input style=" border:0; border-bottom:1px solid #000;" type="text"name="driver-license-no" value="<?php echo isset($info['driver-license-no']) ? $info['driver-license-no'] : '' ?>" ></td>
					<td><strong><b>Class</b></strong></td>
					<td><input style=" border:0; border-bottom:1px solid #000;" type="text" name="class-type" value="<?php echo isset($info['class-type']) ? $info['class-type'] : '' ?>" ></td>
				</tr>
			
<tr>
<td colspan="5">
<br>
<br>
<p style="text-align:justify;">"I", "me" and similar terms refer to the above prospective customers/Riders 1, and each of them, jointly and severally. Being familiar with the operating and riding characteristics of motorcycles and related motor vehicles (“Units”) and (if driving) being fully licensed and qualified to operate them, I voluntarily and of my own initiative seek to participate in demonstration ride of one or more units furnished by or through the dealership. I acknowledge this activity <strong>can involve numerous risk of serious injury or death</strong> to a rider of others. <strong>I freely assume all of those risks</strong> and voluntarily the full risk and consequences for any inquiry to myself regardless of who is driving or who is the passenger of the unit, while reserving all my rights under my own insurance policies, accept the full responsibility for any injury or damage sustained by any person or property if I am driving the Unit.
<br>
<br>
<br>
In consideration of the Dealership’s consent to the demonstration ride ( which would not otherwise be given),<strong> I realise the dealership from any and all legal liability and agree not to sue the dealership  for any claim for personal injury, property damage or otherwise, arising out of, related to, or taking  place during the demonstration  ride, regardless of whether the claim arises out of theories of tort, strict liability, contract, non disclosure, statutory violation, or otherwise, whether or not the dealership was negligent.</strong> This release extend to the dealership and all its employees, officers, directors, agents, affiliate entities, and assigns, and the manufacturer or distributor, all of these parties being hereby forever released and discharged from any and all actions, causes of action, claims, demands, damages, fees, costs and expenses, known or unknown, arising out of or in any way related to the demonstration ride. <strong>This release also extends to claims based on the dealership’s failure to instruct me in the proper use of the unit, or to warn me of risks associated with the unit or the road or other course, whether known or unknown.</strong> This release also extends to claims in any way related to the demonstration ride or operation of the unit that I do not know or suspect I have;   therefore, I waive in my rights under California Civil Code Section 1542 which reads “ A general release does not extend to claims which the creditor does not know or suspect to exist in his favour at the time of executing the release, which, if known by him, must have materially affected his settlement with the debtor.”
<br>
<br>
<br>
I will also indemnify, defend and hold harmless all persons and entities released herein from and against any and all claims of any nature, including consequential damages, attorney fees, costs or other liabilities resulting from my operation of the unit. If driving, I will be solely responsible for and warrant and represent that I currently maintain and have the minimum liability insurance coverages required by law. If I breach this agreement, or bring any suit or claim barred by its term , I will pay all attorney’s fees, costs, and expenses incurred by anyone released herein. Any suit or proceeding to assert claims related to the demonstration ride or operation of the unit or to interpret or to construe this release shall be brought before and finally determined by an arbitrator based solely upon applicable law nut held procedurally pursuant to the arbitrator than I would have occurred  in the generally  available court or governmental forum. I recognize that this agreement binds me and my heirs, successors, assigns, agents, and personal representatives.
<br>
<br>
<br>
I also agree that I will pay the Dealership its retail repair or replacement rates for damage, destruction, or loss of the unit while I am driving or in possession of the Unit, including but not limited to charges  not immediately paid by my insurance due to deductibles or otherwise.
<br>
<br>
<br>
<strong>
I certify that, before signing this document, I read and understood its terms.I have relied exclusively on information from sources other than the dealership in deciding to participate in the demonstration ride and sign this release. Statements by Dealership personnel, if any, are not being relied on me, and are superseded by the terms of this agreement, whether they relate to the demonstration ride, the Unit, the road or course to be followed, the meaning of intent of this agreement , or otherwise. Only a written document signed by an authorize Dealership officer will be effective to modify or supplement this agreement.
</strong>
<br>
<br>
<br>
</p>
</td>
</tr>
<tr>
<td colspan="2">This agreement is dated on and as of</td>
<td colspan="3"><hr style="border:0; border-bottom:1px solid #000;" /></td>
</tr>
<tr>
<td colspan="2"><strong><b>You are responsible for all toll violations! </b></strong>Rider</td>
<td colspan="3"><hr style="border:0; border-bottom:1px solid #000;" /></td>

</tr>
<tr>
<td colspan="2">Signature of witness to signing by Owner(s)/Lessee(s)</td>
<td colspan="3"><hr style="border:0; border-bottom:1px solid #000;" /></td>

</tr>

</tbody>
		</table>
			
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
