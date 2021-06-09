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
body {
    margin: 0;
    padding: 0;
    font-family: arial;
    font-size: 13px;
}
* {
    margin: 0;
    padding: 0;
}
img {
    border: none;
}
h1 {
    font-size: 28px;
    margin: 0 0 10px;
}
h2 {
    font-size: 24px;
    margin: 0 0 10px;
}
h3 {
    font-size: 20px;
    margin: 0 0 10px;
}
h4 {
    font-size: 18px;
    margin: 0 0 10px;
}
h5 {
    font-size: 16px;
    font-weight: normal;
    margin: 0 0 10px;
}
h6 {
    font-size: 14px;
}
p {
    margin: 0 0 5px;
}
.row {
    float: left;
    width: 100%;
    margin: 0;
}
.container {
    margin: 0 auto;
    width: 980px;
}
hr {
    /*margin: 5px 0;
    color: #bcbcbc;*/
	margin: 15px 0;
    color: #bcbcbc;
    width: 85%;
    float: right;
}
.top-head{
	margin:25px 0 0;
}
.col-lg-5 {
    float: left;
    width: 40%;
    padding: 0 1%;
    box-sizing: border-box;
}
.col-lg-6 {
    float: left;
    width: 50%;
    padding: 0 1%;
    box-sizing: border-box;
}
.col-lg-7 {
    float: left;
    width: 60%;
    padding: 0 1%;
    box-sizing: border-box;
}
table {
    border-collapse: collapse;
    width: 100%;
    border-spacing: 0px;
	border:1px solid #ccc;
}

table tr {
	border:1px solid #ccc;
}

table tr td {
    /*border: 1px solid #ccc;*/
    padding: 3px 7px;
    vertical-align: top;
	width:33%;
}
.rotate{
	transform:rotate(-90deg);
	-moz-transform:rotate(-90deg);
	-o-transform:rotate(-90deg);
	text-align:center;
	vertical-align:middle;
	-webkit-transform:rotate(-90deg);
}
span.info{
	font-size: 15px;
}

.title{
	margin-top: 10px;
    text-align: center;
    text-decoration: underline;
    font-size: 18px;
    font-weight: 700;
}
.custom-tr td{
	width: 20px;
}
.empty-td{
	height: 18px;
}
.center-text{
	text-align:center;
	margin-top:10px;
}
.margin-top{
	margin-top:10px;
}

</style>

	<div class="wraper header"> 
		<div class="container">
			<center>
				<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo_crform.jpg'); ?>" alt="">
				<h1>
					<u>Customer Quote Request Form</u>
				</h1>
			</center>
			<div class="row">
				<div class="col-lg-6">
					Salesperson: <hr>
				</div>
				<div class="col-lg-6">
					DATE: <hr>
				</div>
			</div>
			<div class="row">
				<center>
					<span class="info">
						Source: ETS CL TM TME REF WI WS WSE SVC BS DT OEM SEO EVENT
					</span>
				</center>
			</div>
			<div class="row">
				<div class="title">
					UNIT INFORMATION
				</div>
				<table>
					<tr>
						<td>
							Stock#: <input type="text" name="stock" value="<?php echo isset($info["stock"]) ? $info["stock"] : $info["stock_num"] ?>" /> N/U
						</td>
						<td>
							Year: <input type="text" name="year" id="year" value="<?php echo isset($info["year"]) ? $info["year"] : $info["year"] ?>" />
						</td>
						<td>
							Make: <input type="text" name="make" id="make" value="<?php echo isset($info["make"]) ? $info["make"] : $info["make"] ?>" />
						</td>
					</tr>
				</table>
				<table>
					<tr class="custom-tr">
						<td>
							Model: <input type="text" name="model" id="model" value="<?php echo isset($info["model"]) ? $info["model"] : $info["model"] ?>" >
						</td>
						<td>
							Color: <input type="text" name="color" id="color" value="<?php echo isset($info["color"]) ? $info["color"] : $info["unit_color"] ?>" >
						</td>
						<td>
							Miles: <input type="text" name="miles" id="miles" value="<?php echo isset($info["miles"]) ? $info["miles"] : "" ?>" >
						</td>
						<td>
							$Price: <input type="text" name="price" id="price" value="<?php echo isset($info["price"]) ? $info["price"] : $info["price_range"] ?>" /> N/U
						</td>
						<td>
							$Down: <input type="text" name="down" id="down" value="<?php echo isset($info["down"]) ? $info["down"] : "" ?>" />
						</td>
					</tr>
				</table>
				<div class="title">
					CUSTOMER INFORMATION
				</div>
				<table>
					<tr>
						<td>
							First Name: <input type="text" name="fname" id="fname" value="<?php echo isset($info["fname"]) ? $info["fname"] : $info["first_name"] ?>" />
						</td>
						<td></td>
						<td>
							Last Name: <input type="text" name="lname" id="lname" value="<?php echo isset($info["lname"]) ? $info["lname"] : $info["last_name"] ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="3">
							Address: <input type="text" name="address" id="address" value="<?php echo isset($info["address"]) ? $info["address"] : $info["address"] ?>" />
						</td>
					</tr>
					<tr>
						<td>
							City: <input type="text" name="city" id="city" value="<?php echo isset($info["city"]) ? $info["city"] : $info["city"] ?>" />
						</td>
						<td>
							State: <input type="text" name="state" id="state" value="<?php echo isset($info["state"]) ? $info["state"] : $info["state"] ?>" />
						</td>
						<td>
							Zip: <input type="text" name="zip" id="zip" value="<?php echo isset($info["zip"]) ? $info["zip"] : $info["zip"] ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="3">
							Email: <input type="text" name="email" id="email" value="<?php echo isset($info["email"]) ? $info["email"] : $info["email"] ?>" />
						</td>
					</tr>
					<tr>
						<td>
							Primary Phone#: <input type="text" name="pcontact" id="pcontact" value="<?php echo isset($info["pcontact"]) ? $info["pcontact"] : $info["phone"] ?>" />
						</td>
						<td></td>
						<td>
							Secondary Phone#: <input type="text" name="scontact" id="scontact" value="<?php echo isset($info["scontact"]) ? $info["scontact"] : $info["contact"] ?>" />
						</td>
					</tr>
				</table>
				<div class="title">
					TRADE INFORMATION
				</div>
				<table>
					<tr>
						<td>
							Year: <input type="text" name="tyear" value="<?php echo isset($info["tyear"]) ? $info["tyear"] : $info["year_trade"] ?>">
						</td>
						<td>
							Make: <input type="text" name="tmake" value="<?php echo isset($info["tmake"]) ? $info["tmake"] : $info["make_trade"] ?>">
						</td>
						<td>
							Model: <input type="text" name="tmodel" value="<?php echo isset($info["tmodel"]) ? $info["tmodel"] : $info["model_trade"] ?>">
						</td>
					</tr>
					<tr>
						<td>
							Color: <input type="text" name="tcolor" id="tcolor" value="<?php echo isset($info["tcolor"]) ? $info["tcolor"] : $info["unit_color"] ?>" />
						</td>
						<td></td>
						<td>
							Miles/Hours: <input type="text" name="tmiles" id="tmiles" value="<?php echo isset($info["tmiles"]) ? $info["tmiles"] : "" ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="3">
							VIN: <input type="text" name="tvin" id="tvin" value="<?php echo isset($info["tvin"]) ? $info["tvin"] : $info["vin_trade"] ?>">
						</td>
					</tr>
					<tr>
						<td colspan="3">
							Trade Note: <input type="text" name="tnote" id="tnote" value="<?php echo isset($info["tnote"]) ? $info["tnote"] : $info["note"] ?>">
						</td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
				</table>
				<div class="title">
					DEAL NOTES
				</div>
				<table>
					<tr>
						<td>
							AG Exempt: Yes/No <input style="border:1px solid #ccc;" <?php echo ($info['condition'] == "yes") ? "checked" : "";?>  name="condition" value="yes" type="radio">Yes
							<input style="border:1px solid #ccc;" <?php echo ($info['condition'] == "no") ? "checked" : "";?>  name="condition" value="no" type="radio">No
						</td>
						<td></td>
						<td>
							Delivery Charge: $ <input type="text" name="dcharges" id="dcharges" value="<?php echo isset($info["dcharges"]) ? $info["dcharges"] : "" ?>" />
						</td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
					<tr>
						<td colspan="3" class="empty-td"></td>
					</tr>
				</table>
			</div>
			<div class="row center-text">
					CREDIT APP		TRADEEVAL FORM		TWO FROMS OFLD		WEOWE		VEHICLEID SHEET		ASDOCS 
					<div class="row margin-top">
						P.O.I
					</div>
			</div>
		</div>
			
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
