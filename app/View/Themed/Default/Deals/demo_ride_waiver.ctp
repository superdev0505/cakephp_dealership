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
@media print {	/*body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}*/
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	/* Below CSS causing print issue for Del Amo ~ASR */
	.full,
	.half,
	.three,
	.four,
	.two-three,.six,.label20,.label30 {
		padding: 0px 0px
	}
}
</style>

		<div class="wraper header">

		 <h2 style="text-align:center; text-decoration:underline;padding:20px;">AGREEMENT AND RELEASE OF LIABILITY</h2>

				<div class="full">
				<span class="full">I(X) <input type="text" style="width:25%" class="text_captialize" name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> date <input type="text" class="date_input_field" style="width:14%" name="filled_date" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>" /> (the undersigned), wish to participate in the Ducati Hypermotard/Vectrix Scooter/Zap Scooter/Lance Scooter/Can Am Spyder Demo Rides organized by Del Amo Motorsports on <input type="text" style="width:14%" class="date_input_field" name="ride_date" value="<?php echo isset($info['ride_date'])?$info['ride_date']:''; ?>" /> - In return for my being permitted to do so, I voluntarily give this Release of Liability. I also agree to comply with the Del Amo Motorsports Motorcycle Ride Rules and Regulations and abide by all rules verbally set forth by the Del Amo representative.</span>
                </div>
                <div class="full">
				<span class="full">I(x) <input type="text" style="width:25%"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> am aware that motorcycling can be dangerous. I could be injured, killed, have property damaged or be held responsible for harm to others. I am voluntarily participating in the Ducati Motorcycle Ride with knowledge of the dangers, and I accept all of the risks.  I am about to engage in motorcycling, an activity that is dangerous and could pose risks to my person and property. I acknowledge that I do so freely and voluntarily, on a personal basis, and that you have made no promises to me regarding my safety or the extent of the risk involved. I have given proof of a valid drivers license with motorcycle endorsement.</span>
                </div>
                <div class="full">
				<span class="full">I(x) <input type="text" style="width:25%"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> also hereby RELEASE, WAIVE, DISCHARGE AND PROMISE NOT TO SUE the entities and persons listed below from any and all liability to me - in damages or otherwise - in connection with my participation in the Ride. This includes for any injury, death or property loss to me, and for any injury, death or property loss to others claimed to be my responsibility. This also includes for any indemnification, contribution, subrogation or exoneration that may be sought by me or through me. To the fullest extent permitted by law, this also includes if any such injury, death, loss of responsibility is cause or contributed to by the negligence or other wrongful conduct of any of the below- listed persons or entities. </span>
                </div>
                <div class="full">
                <span class="full">I(X) <input type="text" style="width:25%"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> date <input type="text" style="width:14%" class="date_input_field" name="filled_date1" value="<?php echo isset($info['filled_data1'])?$info['filled_data1']:date('m/d/Y'); ?>" /> further agree to DEFEND, INDEMNIFY AND HOLD the below listed persons and entities HARMLESS from and against all claims, demands, loses and expenses, included attorney fees, asserted or incurred by reason of such injury, death, loss or responsibility. This again includes if caused or contributed to by the negligence or other wrongful conduct of any such persons or entities. </span>
                </div>
                <div class="full">
                <span class="full">These persons and entities include: Del Amo Motorsports, Too Fast Inc., Ducati Motor Holding SpA, Ducati North America Inc.,Vectrix, Can Am BRP,Lance Powersports, ZAP INC, local dealer organizing the Ride, all organizations affiliated with them, all sponsors or contributors to the Ride, all governmental agencies involved or assisting with the Ride, all employees, officers, agents or volunteers of all the forgoing, and all other persons and entities otherwise involved in organizing, operating or assisting with the Ride. </span>
                </div>
                <div class="full">
                <span class="full">I(X) <input type="text" style="width:25%" name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> AM RESPONSIBLE FOR ANY DAMAGE TO THE MOTORCYCLE DUE TO RIDER NEGLIGENCE. DEL AMO MOTORSPORTS AND DUCATI WILL SEEK FULL PAYMENT FOR ANY AND ALL DAMAGE TO THE UNIT.</span>
                </div>

                <div class="full">
                <span class="full">I HAVE CAREFULLY READ THE ABOVE. I FULLY UNDERSTAND IT, AND I AM SIGNING OF MY OWN FREE WILL.</span>
                </div>
                <div class="full">
                <span class="six">Date</span>
                <input type="text" class="four date_input_field" name="filled_date2" value="<?php echo isset($info['filled_data2'])?$info['filled_data2']:date('m/d/Y'); ?>" />
                <span class="four">Signature</span>
                <input type="text" class="four" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" />
                </div>

                <span class="span24">Full name</span>
                <input class="input71" type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:''; ?>" />
                <span class="span24">Email</span>
                <input class="input71" type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" />
                <span class="span24">Street Address</span>
                <input class="input71" type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" />
                <span class="span24">Phone </span>
                <?php
				$phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1);
				 ?>
                <input class="input71" type="text" name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />
                <span class="span24">City, State, and Zip </span>
                <input class="input71" type="text" name="city_state"  value="<?php echo isset($info['city_state'])?$info['city_state']:''; ?>"  />
                <span class="span24">Drivers License and State </span>
                <input class="input71" type="text" name="dl_state"  value="<?php echo isset($info['dl_state'])?$info['dl_state']:''; ?>" />
               <br/>
               <h1 style="text-decoration:underline;text-align:center;padding-top:15px;">Del Amo Demo Ride Checklist </h1>
               <br /><br />

               <h4><strong>IS THIS A BUYING DECISION? IF SO, TWO FORMS OF ID AND TAKE COPY’S</strong></h4>
               <div class="full">
               <label><input type="checkbox" name ="california_licence" value="california_licence" <?php echo (isset($info['california_licence']) && $info['california_licence']=='california_licence')?'checked="checked"':'';  ?> />&nbsp;CALIFORNIA ISSUED DRIVERS LICENSE WITH MOTORCYCLE ENDORSEMENT</label><br />
                <label><input type="checkbox" name ="major_card" value="major_card" <?php echo (isset($info['major_card']) && $info['major_card']=='major_card')?'checked="checked"':'';  ?> />&nbsp;MAJOR CREDIT OR DEBIT CARD</label><br />

                 <label><input type="checkbox" name ="waiver_form_signed" value="waiver_form_signed" <?php echo (isset($info['waiver_form_signed']) && $info['waiver_form_signed']=='waiver_form_signed')?'checked="checked"':'';  ?> />&nbsp;DEMO WAIVER FORM INITIALED AND SIGNED AND FULLY COMPLETED</label><br />
                  <label><input type="checkbox" name ="explain_demo_route" value="explain_demo_route" <?php echo (isset($info['explain_demo_route']) && $info['explain_demo_route']=='explain_demo_route')?'checked="checked"':'';  ?> />&nbsp;FULLY EXPLAIN DEMO RIDE ROUTE</label><br />
                   <label><input type="checkbox" name ="pdi_walk_thorugh" value="pdi_walk_thorugh" <?php echo (isset($info['pdi_walk_thorugh']) && $info['pdi_walk_thorugh']=='pdi_walk_thorugh')?'checked="checked"':'';  ?> />&nbsp;COMPLETE PDI WALK THROUGH FOR CUSTOMER TO UNDERSTAND VEHICLE OPERATION </label><br />
                    <label><input type="checkbox" name ="manager_approval" value="manager_approval" <?php echo (isset($info['manager_approval']) && $info['manager_approval']=='manager_approval')?'checked="checked"':'';  ?> />&nbsp;MANAGERS APPROVAL</label>
               </div>
                 <br/>
              <h4><strong>1) Test Ride Route</strong></h4>
              <div class="full">
              <?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/route_map.png'); ?>
              </div> <br />
              <span class="span24">Customer Initials </span>
                <input class="input71" type="text" name="customer_initials"  value="<?php //echo isset($info['dl_state'])?$info['dl_state']:''; ?>" />





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
