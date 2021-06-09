<?php
// updated
$dealer_not_tax_payoff = array(2501,576);

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');
$dealer_id =$cid;
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
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px;">
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
.two-three {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
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
    border: 1px solid #aaa;
    padding: 3px;
    display: inline-table;
	margin:1px 0;
	
}
.right1{
    width: 49%;
    border: 1px solid #aaa;
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
@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
}
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

    font-size: 16px;
    margin: 0 0 0px;
}
h5 {
    font-size: 14px;
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
    width: 1170px;
}
hr {
    margin: 5px 0;
    color: #bcbcbc;
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
}
table tr {
}
table tr td {
    border: 1px solid #ccc;
    padding: 3px 7px;
    vertical-align: top;
}
table.noborder tr {
	border-top:1px solid #9c9c9c;
	margin:0 0 10px;
}
table.noborder tr td {
    border: 0px solid #ccc;
	padding-bottom:5px;
}
table.no-border tr {
	border-top:0px solid #9c9c9c;
	margin:0;
}
table.no-border tr td {
    border: 0px solid #ccc;
	padding-bottom:0px;
}
.rotate{
	transform:rotate(-90deg);
	-moz-transform:rotate(-90deg);
	-o-transform:rotate(-90deg);
	text-align:center;
	vertical-align:middle;
	-webkit-transform:rotate(-90deg);
}

/*General Start*/
body {
    margin: 0;
    padding: 0;
    font-family: arial;
    font-size: 13px;
}
.container {
    margin: 0 auto;
    width: 980px;
}
.row {
    float: left;
    width: 100%;
    margin: 0 -27px !important;
}
.border{
	border-top: 1px solid #000;
	border-right: 1px solid #000;
	border: 1px solid #000;
}
tr > td
{
	padding:0 10px;
}
tr{
margin-bottom:100px !important;
}

</style>

<style>
body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:solid 6px #32543C;}


.top_sty{ width:60%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.top_sty2{ width:100%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms{ width:70%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms2{ width:46%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms3{ width:24%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms4{ width:76%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms5{ width:86%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms6{ width:20%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}

</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
		<?php //pr($contact); ?>
        <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				
				<input name="owner" type="hidden"  value="<?php echo $info['owner']; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
                 <input name="make" type="hidden"  value="<?php echo $info['make']; ?>" />
		
			<div class="container">
			 
				
				
  <table width="100%">
  <tr style="text-align:center;">
  <td><h1 style="font-size:35px; color:#000; font-weight:bold; padding:25px 0 0 0; border-bottom:solid 2px #000; margin:0; display:inline-block;">Customer Delivery Checklist</h1></td>
  </tr>
  </table>
 
  <table width="100%">
  <tr style="padding-top:20px;">
  <td style="width:80%;"><label style="font-size:22px; font-weight:bold;  float:left;">Customer Name: </label><input name="name" value="<?php echo isset($info["name"]) ? $info['name'] : $info['first_name'].' '.$info['last_name'];?>" type="text" class="cutmar_nms"></td>
  <td style="width:80%;"><label style="font-size:22px; font-weight:bold; float:left;">Date </label><input name="date" value="<?php echo isset($info["date"]) ? $info['date'] : '';?>" type="text" class="cutmar_nms"></td>
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:4%; background:#000;"></td>
  <td style="width:16%; font-size:18px; color:#000; text-align:center;"> DESCRIPTION </td>
   <td style="width:80%; background:#000;"></td>
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:15%; font-size:18px; color:#000; text-align:center;"> Unit Purchased:  </td>
   <td style="width:10%; font-size:18px; color:#000; text-align:center;"> <input type="radio" name="purchased_status" value="New" <?php echo (isset($info['purchased_status'])&&$info['purchased_status']=='New')?'checked="checked"':''; ?> />New </td>
   <td style="width:10%; font-size:18px; color:#000; text-align:center;"> <input type="radio" name="purchased_status" value="Used" <?php echo (isset($info['purchased_status'])&&$info['purchased_status']=='Used')?'checked="checked"':''; ?> />Used  </td>
   <td style="width:10%; font-size:18px; color:#000; text-align:center;"> <b>Type</b> </td>
   <td style="width:10%; font-size:18px; color:#000; text-align:center;"> <input type="radio" name="purchased_type_status" value="Used" <?php echo (isset($info['purchased_type_status'])&&$info['purchased_status']=='5W')?'checked="checked"':''; ?> />5W </td>
   <td style="width:5%; font-size:18px; color:#000; text-align:center;"> <input type="radio" name="purchased_type_status" value="Used" <?php echo (isset($info['purchased_type_status'])&&$info['purchased_status']=='TT')?'checked="checked"':''; ?> />TT </td>
   <td style="width:10%; font-size:18px; color:#000; text-align:center;"> <input type="radio" name="purchased_type_status" value="Used" <?php echo (isset($info['purchased_type_status'])&&$info['purchased_status']=='MH')?'checked="checked"':''; ?> />MH </td>
   <td style="width:30%; font-size:18px; color:#000;"> <label>Other</label><input name="other_status" value="<?php echo isset($info["other_status"]) ? $info['other_status'] : '';?>" type="text" class="cutmar_nms"> </td>  
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:25%; font-size:18px; color:#000;"> <label>Stock #:</label><input name="" type="text" class="cutmar_nms"> </td> 
  <td style="width:50%; font-size:18px; color:#000;"> <label> Manufacturer:</label><input name="" type="text" class="cutmar_nms"> </td> 
   <td style="width:25%; font-size:18px; color:#000;"> <label>Model:</label><input name="" type="text" class="cutmar_nms"> </td>  
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:4%; background:#000;"></td>
  <td style="width:16%; font-size:18px; color:#000; text-align:center;"> EQUIPMENT </td>
   <td style="width:80%; background:#000;"></td>
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:40%; font-size:18px;"><p><input name="" type="text" class="cutmar_nms6"> U/C Receiver <input name="" type="text" class="cutmar_nms6"></p>
  <p><input name="" type="text" class="cutmar_nms6"> Ball Mount/Ball <input name="" type="text" class="cutmar_nms6"></p>
  <p><input name="" type="text" class="cutmar_nms6"> Brake Contorl <input name="" type="text" class="cutmar_nms6"></p>
  <p><input name="" type="text" class="cutmar_nms6"> Wire plug <input name="" type="text" class="cutmar_nms6"></p>
  <p><input name="" type="text" class="cutmar_nms6"> W/D Hitch <input name="" type="text" class="cutmar_nms6"></p>
 <p><input name="" type="text" class="cutmar_nms6"> 5W Hitch <input name="" type="text" class="cutmar_nms6"></p>
  <p><input name="" type="text" class="cutmar_nms6"> 5W slider Hitch <input name="" type="text" class="cutmar_nms6"></p>
 <p><input name="" type="text" class="cutmar_nms6"> Sway Contorl <input name="" type="text" class="cutmar_nms6"></p>
 <p><input name="" type="text" class="cutmar_nms6"> Other <input name="" type="text" class="cutmar_nms6"></p>
 <p style="font-size:22px;"> Plug Location: <input name="" type="text" class="cutmar_nms2"></p>
  <p style="font-size:22px;"> Towing Vehicle Description:<span style="font-size:18px;">( circle one ): </br>Year Make & Model</span> </p>
 </td>
  <td style="width:60%;"><p style="float:left;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img1.png'); ?>"/></br>U/C Receiver</p>
  <p style="float:left;" ><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img2.png'); ?>"/></br>Ball Mount & Ball</p>
  <p style="float:left;"><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img3.png'); ?>"/></br>Brake Control</p>
  <p style="float:left;"><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img4.png'); ?>"/></br>Wire Plug</p>
  <p style="float:left;"><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img5.png'); ?>"/></br>W/D Hitch</p>
  <p style="float:left;"><img style="width:120px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img6.png'); ?>"/></br>5W Hitch</p>
  <p style="float:left;"><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img.png'); ?>"/></br>5W slider Hitch</p>
  <p style="float:left;"><img style="width:140px;height:100px;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/last-img7.png'); ?>"/></br>Sway Control</p>
   </td>
  </tr>
  </table>
  
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:4%; background:#000;"></td>
  <td style="width:16%; font-size:18px; color:#000; text-align:center;"> TWOING </td>
   <td style="width:80%; background:#000;"></td>
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%;"><p style="line-height:45px;">Folsom Lake RV has infermed me that the towing capacity required to puil V.I.N. <input name="" type="text" class="cutmar_nms2">
  which ‘I am purchasing is <input name="" type="text" class="cutmar_nms3">I acknowledge that l have been informed of these weight restrictions
and</br> thatl<input name="" type="text" class="cutmar_nms4">am responsible for acquiringihaving an adequate tow vehicle.-

</p></td>
  </tr>
  </table>
 
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%; background:#000; padding:6px 0;"></td>
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%;"><h1 style="font-size:18px; font-weight:600; margin:0;">The following is agreed upon:</h1></td>
  </tr>
  </table>
   
   <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:50%;"><p style="font-size:18px; font-weight:600; margin:0;">The following is agreed upon:</p>
     <input name="" type="text" class="cutmar_nms5">
     <input name="" type="text" class="cutmar_nms5">
     <input name="" type="text" class="cutmar_nms5"></td>
   <td style="width:50%;"><p style="font-size:18px; font-weight:600; margin:0;">The following is agreed upon:</p>
   <input name="" type="text" class="cutmar_nms5">
   <input name="" type="text" class="cutmar_nms5">
   <input name="" type="text" class="cutmar_nms5"></td>
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%;"><h1 style="font-size:19px; font-weight:600; margin:0;">By Singing Below Customer's agrees to the need/terms of equipment necesasry for purchase of the RV</h1>
  <h2 style="margin:0; font-size:19px;">Customer(s) Signature <input name="" type="text" class="cutmar_nms"></h2>
  </td>
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%; background:#000; padding:6px 0;"></td>
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%; padding:6px 0; text-align:center;"><p style="font-size:18px; margin:0; padding-bottom:10px">Parts of Monday-saturday 9:00am to 6:00pm sunday 10:00am & 5:00pm</p>
  <p style="font-size:18px; margin:0;">Parts of Monday-saturday 9:00am to 6:00pm sunday 10:00am & 5:00pm</p></td>
  </tr>
  </table>
  
  <table width="100%" style="margin-top:20px;">
  <tr>
  <td style="width:100%; padding:6px 0; text-align:center;"><p style="font-size:14px; margin:0; padding-bottom:10px"> <strong>White-Deal jackpot yellow-Customer pink-customer</strong></p>
 
  </tr>
  </table>
 
			</div>
			
		</div></div>
		<br />
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>
		
		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	var actual_balance = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	
	function calculateProfit()
	{
		profitOption=$("#profitOption").val();
		if(profitOption=='cost_sell')
		{
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
		}
		else
		{
			freight=($("#freight").val()=='')?0:parseFloat($("#freight").val());
			prep=($("#prep").val()=='')?0:parseFloat($("#prep").val());
			doc=($("#doc").val()=='')?0:parseFloat($("#doc").val());
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
			profit=parseFloat(profit+parseFloat(freight)+parseFloat(prep)+doc);
		}
		$("#profit").val(profit.toFixed(2));
		
	}
	$("#profitOption").on('change',function(){
											calculateProfit();
											
											});
	$("#calculateDown").on('click',function(){
											calculate_initial_investment();
											//alert(actual_balance);
											
											});
	$(".priceChange").on('change keyup paste',function(){
									 
									 tax_percent=$("#tax_percent").val();
									 if($("#est_payoff").val()!='');
									 update_10days_payoff();
									 if($("#doc").val()!=''&&$("freight").val()!='')
									 calculate_tax(tax_percent);
									 
									 });
									 
	$(".payment_print_option").on('change',function(){
		$val = $(this).val();
		if($(this).is(':checked'))
		{
			$("#"+$val).removeClass('noprint');	
		}else{
			$("#"+$val).addClass('noprint');
		}
	});
											 
	
	$("#cost").on('change keyup paste',function(){
									calculateProfit();
									});
	
	$(".tradeDiff").on('change keyup paste',function(){
											   allowance=parseFloat($("#trade_allowance").val());
											   if(isNaN(allowance))
											   {
												  allowance=0; 
											   }
											   est_payoff=parseFloat($("#est_payoff").val());
											   if(isNaN(est_payoff))
											   {
												  est_payoff=0; 
											   }
											   sell_price=parseFloat(actual_value-allowance);	
									
										
										 $("#sub_total").val(sell_price.toFixed(2));	   
											  /* if(allowance!='')
											   {*/
												  /* if(allowance.match(/^[0-9]+(\.[0-9]*)?$/))
												   {*/
													  
													   calculateProfit();
													   tax_percent=$("#tax_percent").val();
													   if($("#est_payoff").val()!='');
													   update_10days_payoff();
													 if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
													/*}else
												   {
													   alert("Please enter the correct amount in trade allowance");
													   $(this).focus();
												   }*/
											 /*  }
											   else
											   {
												    $("#sell_price").val(parseFloat(actual_value).toFixed(2));
													profit=parseFloat(actual_value-$("#cost").val());
												    $("#profit").val(profit.toFixed(2));
													tax_percent=$("#tax_percent").val();
													if($("#est_payoff").val()!='');
													if($("#doc").val()!=''&&$("freight").val()!='')
													calculate_tax(tax_percent);
													update_10days_payoff();
													
											   }*/
											   
											   });
		
	$("#sell_price").on('change keyup paste',function(){
											   price=parseFloat($(this).val());
											   if(isNaN(price))
											   price =0.00;
											   actual_value=price;
											   //allowance=$("#trade_allowance").val();
											   /*if(allowance.match(/^[0-9]+(\.[0-9]+)?$/))
											   {*/
												  // new_bal=parseFloat(price-parseFloat(allowance));
												  // new_bal=new_bal.toFixed(2);
												   //$("#sell_price").val(new_bal);
												 //  profit=parseFloat(new_bal-$("#cost").val());
												  // $("#profit").val(profit.toFixed(2));
											  /* }*/
											  actual_value=price;
											  calculateProfit();
											   tax_percent=$("#tax_percent").val();
											  if($("#est_payoff").val()!='');
												if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
											   			// update_10days_payoff();
											   });

	function calculate_tax(tax_value){
		var tax_type = $('input:radio[name=taxopt]:checked').val();
		
		/*var freight = parseFloat( $('#freight').val() );
		var prep = parseFloat( $('#prep').val() );
		var doc = parseFloat( $('#doc').val() );
		var part_serv = parseFloat( $('#part_serv').val() );
		var tag_tit = parseFloat( $('#tag_tit').val() );*/
		var sell_price = isNaN(parseFloat( $("#sell_price").val()))?0.00:parseFloat( $("#sell_price").val());
		var trade_allowance = isNaN(parseFloat( $("#trade_allowance").val()))?0.00:parseFloat( $("#trade_allowance").val());
		amount = sell_price- trade_allowance;
		if(tax_type == 'tax_vehicle_only'){
			var amount = amount;
		}else{
			//var amount = freight+prep+part_serv+sell_price; 
			amount = amount ;
		}
		$("#sub_total").val(amount.toFixed(2));
		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		$('#tax').val( amountIncludingTax );
		
		//actual_balance = freight+prep+doc+part_serv+tag_tit+sell_price+parseFloat(amountIncludingTax); 
		actual_balance = amount + parseFloat(amountIncludingTax);
		//alert(actual_balance);
		est_payoff=parseFloat($("#est_payoff").val());
		   if(isNaN(est_payoff))
		   {
			  est_payoff=0; 
		   }
		   actual_balance = actual_balance +est_payoff;
		   $('#bal').val( actual_balance   );
		
		//calculate_initial_investment();
		
		 update_10days_payoff(); 
	}
	
	function calculate_initial_investment(){
		//$('#bal').val();
		investment = ($('#bal').val() * 25 ) / 100;
		$('#down_pay').val( investment.toFixed(2)    );
		newbal = actual_balance -  investment ;
		$('#bal').val( newbal.toFixed(2) );
	}
	
	function update_initial_investment(){
		var initialinv = $('#down_pay').val();
		var inv = 0;
		if(initialinv == '' || isNaN(initialinv)){
			inv = 0;
			$('#down_pay').val("");
		}else{
			inv = parseFloat(initialinv);
		}
		newbal = actual_balance - inv;
		$('#bal').val( newbal.toFixed(2) ); 
	}
	
	$('#down_pay').on('change keyup paste',function(){
		update_initial_investment();
		update_10days_payoff();
	});
	
	
	function get_initial_inv(){
		var initialinv = $('#down_pay').val();
		if(initialinv == '' || isNaN(initialinv)){
			return 0;
		}else{
			return parseFloat(initialinv);
		}
	}
	function get_10day_estimated(){
		est_payoff = $('#est_payoff').val();
		if(est_payoff == ''){
			return 0;
		}
		if(isNaN(est_payoff)){
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
			return 0;
		}else{
			$('#errorForPayoff').text("");
			return parseFloat(est_payoff);
		}
		
	}
	
	function update_10days_payoff(){/*
		initialinv = get_initial_inv();
		est = get_10day_estimated();
		selling_price=actual_balance;
		trade_allowance=$("#trade_allowance").val();
		if(trade_allowance.match(/^[0-9]+(\.[0-9]+)?$/)&&!($("#doc").val()!=''&&$("freight").val()!=''))
		{
			selling_price=selling_price-parseFloat(trade_allowance);
		}
		newbalance = (selling_price - initialinv ) + est;
		
		
		$('#bal').val( newbalance.toFixed(2)   );
	*/}
		
	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	$("input:radio[name=taxopt]").click(function() {
		tax_value = $('#tax_percent').val();
		if(tax_value == 0){
			alert('Please select a fee');
		}else{
			calculate_tax(tax_value);
		}
		
	});
	
	$('#fixed_fee_options').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					$('#freight').val(data.freight_fee);
					$('#prep').val(data.prep_fee);
					$('#doc').val(data.doc_fee);
					$('#part_serv').val(parseFloat(data.parts_fee) + parseFloat(data.service_fee));
					$('#tag_tit').val(parseFloat(data.title_fee) + parseFloat(data.tag_fee));
					
					$('#tax_percent').val(data.tax_fee);
					calculate_tax(data.tax_fee);
				}
			});
		}
	});
	

	$("#btn_save_quote").click(function(){
		if($("#deal_status_id").val() == ''){
			alert("Please select status");
			$("#deal_status_id").focus();
			return false;	
		}else{
			return true;
		}
	});
	
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
	if($('#apr').val() != "" && $('#apr').val() != null){
	calculateMonthWisePayments();
	}else {
		$('input[id^="paymentFor"]').val("");
	}
	var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
	$('#apr').on('change keyup paste',function(){
		
		if(rx.test($('#apr').val())){
			calculateMonthWisePayments();
			}else{
					$('.options_price').val("");
			}
	 });
	
	$(".price_options").on('change',function(){
										span_id=$(this).attr('price-id')+'_span';
										$("#"+span_id).text($(this).val());	 
										calculateMonthWisePayments();	 
											 });
     
});
function calculate() 
{
	var selling_price = $('#sell_price').val();
	var freight = $('#freight').val();
	var prep = $('#prep').val();
	var doc = $('#doc').val();
	var parts_fee = "0";
	var service_fee = "0";
	var parts_service = parseFloat(parts_fee)+parseFloat(service_fee);
	var tag_fee = "0";
	var title_fee = "0";
	var tag_title = parseFloat(tag_fee)+parseFloat(title_fee);
	$('#part_serv').val(parts_service);
	$('#tag_tit').val(tag_title);
	var amount = parseFloat(selling_price) + parseFloat(freight) + parseFloat(prep) + parseFloat(doc) + parseFloat(parts_service) + parseFloat(tag_title);
	var tax = $('#tax').val();
	var amountIncludingTax = amount + (amount*parseFloat(tax))/100;
	var estimated_payoff = $('#est_payoff').val();
	if(estimated_payoff.trim() === "") {
		estimated_payoff = 0;
	} 
	
	var downpayment = $('#down_pay').val();
	if(downpayment.trim() === "") {
		downpayment = 0;
	} 
	if(isNaN(downpayment) || isNaN(estimated_payoff))
	{
		//alert("Please enter valid amount");
		if(isNaN(downpayment)){
			$('#errorForDownPay').text("Please enter valid  Down Payment.");
			$('#down_pay').val("");
		}else{
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
		}
		$('#bal').val("");
		$('.options_price').val("");
		
	}else{
		$('#errorForDownPay').text("");
		$('#errorForPayoff').text("");
	var balance = parseFloat(amountIncludingTax) + parseFloat(estimated_payoff) - parseFloat(downpayment);
		balance_value = balance.toFixed(2);
		if(!isNaN(balance_value)){
			$('#bal').val(balance_value);
		}
		
	}
	
	//console.log( $('#bal').val() );
	
}
	
	
	 function calculateMonthWisePayments(){
		 
		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
										  payment.value = pay_monthly;
										  
										  });
	 	}
	
	function MonthwisePayments(years)
	{
		var apr = parseFloat($('#apr').val());
		var principal = parseFloat($('#bal').val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		var tax = parseFloat($('#tax').val());
		//var payment = document.getElementById(("paymentFor"+i).toString());
		var x = Math.pow(1 + interest, payments, tax);   // Math.pow() computes powers
			var monthly = (principal * x * interest) / (x - 1);
			// If the result is a finite number, the user's input was good and
			// we have meaningful results to display
			if (isFinite(monthly)) {
			// Fill in the output fields, rounding to 2 decimal places
			//payment.value = monthly.toFixed(2);
			return monthly.toFixed(2);
		}else{
			//payment.value = "";
			return "";
		}
	}
</script>
</div>
