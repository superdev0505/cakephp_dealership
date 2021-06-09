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
		<style>body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}


.cradit_app{ width:20%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

.cradit_app2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

.cradit_app3 {
	 border: solid 2px #000 !important;
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px; vertical-align:middle;
    margin-right: 10px;
}

.cradit_app4{ width:70%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

.cradit_app5{ width:39%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

.cradit_app6{ width:85%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
@media print {
table.table_width
{
	width:997px!important;
}
input[type=text]{height:18px;}
table td{font-size:10px!important;padding:2px!important}

 @page
        {
            size: auto;   /* auto is the current printer page size */
            margin: 7mm 7mm 1mm 7mm ;  /* this affects the margin in the printer settings */
        }


}



</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>

<?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
		<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
		<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />                                                   
		<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
		<input name="sperson" type="hidden"  value="<?php echo $info['sperson']; ?>" />
		<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
		<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
		<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
    <input type="hidden"  name="first_name" value="<?php echo $info['first_name']; ?>" />	
    <input type="hidden"  name="last_name" value="<?php echo $info['last_name']; ?>" />
    <input type="hidden"  name="city" value="<?php echo $info['city']; ?>" />
    <input type="hidden"  name="country" value="<?php echo $info['country']; ?>" />
    <input type="hidden"  name="email" value="<?php echo $info['email']; ?>" />
        
		<div class="wraper header"> 
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_width">
  <tr>
    <td style="width:60%;">
<img style="height:90px;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/dealer_logo.png'); ?>" alt="">
<br/>
<p>891 East Chicago St. &middot; Coldwater, Michigan 49036<br/>
Phone (800) 256-5196
</p>
<br/>
</td>
     <td style="width:40%;">  
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:40px; font-weight:600; padding:10px 0;"> WORK SHEET </td>
      </tr>
      <tr>
        <td> TEMP tag. 
	Y&nbsp;&nbsp;<input name="temp_tag1" type="checkbox" value="Y" <?php echo ($info['temp_tag1'] == "Y") ? "checked" : ""; ?>/>
	N&nbsp;&nbsp;<input name="temp_tag2" type="checkbox" value="N" <?php echo ($info['temp_tag2'] == "N") ? "checked" : ""; ?>/>
	</td>
      </tr>
    </table>

     </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_width">
  <tr>
    <td style="width:50%; font-size:17px; font-weight:600; ">DELIVERY DATE  <input  name="DELIVERY_DATE"  value="<?php echo isset($info['DELIVERY_DATE']) ? $info['DELIVERY_DATE'] :  ''; ?>"  type="text" class="cradit_app" /></td>
    <td style="width:50%; font-size:17px; font-weight:600;" align="right"> DELIVERY TIME <input  name="DELIVERY_TIME"  value="<?php echo isset($info['DELIVERY_TIME']) ? $info['DELIVERY_TIME'] :  ''; ?>"  type="text" class="cradit_app" /></td>
  </tr>
</table>


  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="" class="table_width">
  <tr>
    <td style="width:25%; font-size:17px; font-weight:600; ">  STOCK#  <input  name="stock_num"  value="<?php echo isset($info['customer_name']) ? $info['customer_name'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    <td style="width:50%; font-size:17px; font-weight:600;"> SOLD TO : <input  name="sold_to1"  value="<?php echo isset($info['sold_to1']) ? $info['sold_to1'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    <td style="width:25%; font-size:17px; font-weight:600;"> DATE: <input  name="sold_date1"  value="<?php echo isset($info['sold_date1']) ? $info['sold_date1'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    <tr>
    <td style="width:25%; font-size:17px; font-weight:600; ">   <input  name="vehicle_license_plate"  value="<?php echo isset($info['vehicle_license_plate']) ? $info['vehicle_license_plate'] :  ''; ?>"  type="text" class="cradit_app6" /> </td>
    <td style="width:50%; font-size:17px; font-weight:600;"> SOLD TO : <input  name="SOLD_TO2"  value="<?php echo isset($info['SOLD_TO2']) ? $info['SOLD_TO2'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    <td style="width:25%; font-size:17px; font-weight:600;"> PHONE# <input  name="phone"  value="<?php echo isset($info['phone']) ? $info['phone'] :  ''; ?>"  type="text" class="cradit_app4" style="width:60%"/></td>
  </tr>
  </tr>
</table>

         
     

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px;" class="table_width">
  <tr>
    <td style="width:25%; font-size:17px; font-weight:600; vertical-align:top;"> VEHICLE LICENSE PLATE</td>
    <td style="width:75%; font-size:17px; font-weight:600;"> ADDRESS <input  name="address"  value="<?php echo isset($info['address']) ? $info['address'] :  $info['address']; ?>"  type="text" class="cradit_app6" /></td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:4px;" class="table_width">
  <tr>
    <td style="width:25%; font-size:17px; font-weight:600;">
    <input  name="email"  value="<?php echo isset($info['email']) ? $info['email'] :  $info['email']; ?>"  type="text" class="cradit_app4" />
    <strong style="padding:0 60px;">EMAIL</strong>
    </td>
    <td style="width:15%; font-size:17px; font-weight:600;"> 
	<input  name="city"  value="<?php echo isset($info['city']) ? $info['city'] :  $info['city']; ?>"  type="text" class="cradit_app6" />
	<strong style="padding:0 60px;"> CITY</strong>
    </td> 	
    
    <td style="width:20%; font-size:17px; font-weight:600;"> 
	<input  name="country"  value="<?php echo isset($info['country']) ? $info['country'] :  $info['country']; ?>"  type="text" class="cradit_app6" />	
	<strong style="padding:0 60px;"> COUNTRY</strong> 
    </td>

	<td style="width:20%; font-size:17px; font-weight:600;"> 
	<input  name="state"  value="<?php echo isset($info['state']) ? $info['state'] :  $info['state']; ?>"  type="text" class="cradit_app6" />	    
	<strong style="padding:0 80px;"> STATE </strong> 
     </td>
     
     <td style="width:40%; font-size:17px; font-weight:600;"> 
	<input  name="zip"  value="<?php echo isset($info['zip']) ? $info['zip'] :  $info['zip']; ?>"  type="text" class="cradit_app6" />	
	<strong style="padding:0 60px;"> ZIP </strong>
      </td>
  </tr>
</table>
     
     
       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:8px; border-top:solid 8px #000; border-left:solid 1px #000; border-right:solid 1px #000; border-bottom:solid 1px #000; border-bottom:solid 8px #000;" class="table_width">
  <tr>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> YEAR </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> MAKE </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> B STYLE </td>
    <td style="width:20%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> MODEL OR SERIES </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> MILEAGE </td>
    <td style="width:30%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> SERIAL NUMBER </td>
  </tr>
  
   <tr>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;"> UNIT </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="year"  value="<?php echo isset($info['year']) ? $info['year'] :  $info['year']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="make"  value="<?php echo isset($info['make']) ? $info['make'] :  $info['make']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="category"  value="<?php echo isset($info['category']) ? $info['category'] : ''; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:20%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="model"  value="<?php echo isset($info['model']) ? $info['model'] :  $info['model']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="odometer"  value="<?php echo isset($info['odometer']) ? $info['odometer'] :  $info['odometer']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:30%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="vin"  value="<?php echo isset($info['vin']) ? $info['vin'] :  ''; ?>"  type="text" class="cradit_app6" /></td>
  </tr>
  
   <tr>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-bottom:solid 1px #000;"> TRADE </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="year_trade"  value="<?php echo isset($info['year_trade']) ? $info['year_trade'] :  $info['year_trade']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="make_trade"  value="<?php echo isset($info['make_trade']) ? $info['make_trade'] :  $info['make_trade']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="category_trade"  value="<?php echo isset($info['category_trade']) ? $info['category_trade'] :  ''; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:20%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="model_trade"  value="<?php echo isset($info['model_trade']) ? $info['model_trade'] :  $info['model_trade']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="odometer_trade"  value="<?php echo isset($info['odometer_trade']) ? $info['odometer_trade'] :  $info['odometer_trade']; ?>"  type="text" class="cradit_app6" /></td>
    <td style="width:30%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  <input  name="vin_trade"  value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] :  ''; ?>"  type="text" class="cradit_app6" /></td>
  </tr>
  
  <tr>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-bottom:solid 1px #000;"> TRADE </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
    <td style="width:20%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
    <td style="width:10%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
    <td style="width:30%; font-size:17px; font-weight:600; padding:4px 0; text-align:center; border-right:solid 1px #000; border-bottom:solid 1px #000;">  </td>
  </tr>
</table>
          
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;" class="table_width">
  <tr>
    <td style="width:49%; margin-right:10px; border:solid 1px #000;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; padding:4px 5px; border-right:solid 1px #000;"> FACTORY INSTALLED ACCESSORIES </td>
    <td style="width:25%; font-size:16px; text-align:center; font-weight:600; padding:4px 0;"> AMOUNT </td>
  </tr>
</table>
     
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
    <input  name="FACTORY_INSTALLED_ACCESSORIES1"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES1']) ? $info['FACTORY_INSTALLED_ACCESSORIES1'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
    <input  name="AMOUNT1"  value="<?php echo isset($info['AMOUNT1']) ? $info['AMOUNT1'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">     
    </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> 
    <input  name="FACTORY_INSTALLED_ACCESSORIES2"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES2']) ? $info['FACTORY_INSTALLED_ACCESSORIES2'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
    <input  name="AMOUNT2"  value="<?php echo isset($info['AMOUNT2']) ? $info['AMOUNT2'] :  ''; ?>"  type="text" class="cradit_app4" />	
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">  
	<input  name="FACTORY_INSTALLED_ACCESSORIES3"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES3']) ? $info['FACTORY_INSTALLED_ACCESSORIES3'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT3"  value="<?php echo isset($info['AMOUNT3']) ? $info['AMOUNT3'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="FACTORY_INSTALLED_ACCESSORIES4"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES4']) ? $info['FACTORY_INSTALLED_ACCESSORIES4'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT4"  value="<?php echo isset($info['AMOUNT4']) ? $info['AMOUNT4'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="FACTORY_INSTALLED_ACCESSORIES5"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES5']) ? $info['FACTORY_INSTALLED_ACCESSORIES5'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT5"  value="<?php echo isset($info['AMOUNT5']) ? $info['AMOUNT5'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="FACTORY_INSTALLED_ACCESSORIES6"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES6']) ? $info['FACTORY_INSTALLED_ACCESSORIES6'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT6"  value="<?php echo isset($info['AMOUNT6']) ? $info['AMOUNT6'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="FACTORY_INSTALLED_ACCESSORIES7"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES7']) ? $info['FACTORY_INSTALLED_ACCESSORIES7'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT7"  value="<?php echo isset($info['AMOUNT7']) ? $info['AMOUNT7'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="FACTORY_INSTALLED_ACCESSORIES8"  value="<?php echo isset($info['FACTORY_INSTALLED_ACCESSORIES8']) ? $info['FACTORY_INSTALLED_ACCESSORIES8'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT9"  value="<?php echo isset($info['AMOUNT9']) ? $info['AMOUNT9'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> DEALER INSTALLED ACCESSORIES</td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="DEALER_INSTALLED_ACCESSORIES1"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES1']) ? $info['DEALER_INSTALLED_ACCESSORIES1'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT10"  value="<?php echo isset($info['AMOUNT10']) ? $info['AMOUNT10'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="DEALER_INSTALLED_ACCESSORIES2"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES2']) ? $info['DEALER_INSTALLED_ACCESSORIES2'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT11"  value="<?php echo isset($info['AMOUNT11']) ? $info['AMOUNT11'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="DEALER_INSTALLED_ACCESSORIES3"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES3']) ? $info['DEALER_INSTALLED_ACCESSORIES3'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT12"  value="<?php echo isset($info['AMOUNT12']) ? $info['AMOUNT12'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="DEALER_INSTALLED_ACCESSORIES4"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES4']) ? $info['DEALER_INSTALLED_ACCESSORIES4'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT13"  value="<?php echo isset($info['AMOUNT13']) ? $info['AMOUNT13'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="DEALER_INSTALLED_ACCESSORIES5"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES5']) ? $info['DEALER_INSTALLED_ACCESSORIES5'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT14"  value="<?php echo isset($info['AMOUNT14']) ? $info['AMOUNT14'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="DEALER_INSTALLED_ACCESSORIES6"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES6']) ? $info['DEALER_INSTALLED_ACCESSORIES6'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT15"  value="<?php echo isset($info['AMOUNT15']) ? $info['AMOUNT15'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="DEALER_INSTALLED_ACCESSORIES7"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES7']) ? $info['DEALER_INSTALLED_ACCESSORIES7'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT16"  value="<?php echo isset($info['AMOUNT16']) ? $info['AMOUNT16'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:75%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="DEALER_INSTALLED_ACCESSORIES8"  value="<?php echo isset($info['DEALER_INSTALLED_ACCESSORIES8']) ? $info['DEALER_INSTALLED_ACCESSORIES8'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:17%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="AMOUNT17"  value="<?php echo isset($info['AMOUNT17']) ? $info['AMOUNT17'] :  ''; ?>"  type="text" class="cradit_app4" />
    </td>
    <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> BANK LIEN : <input  name="BANK_LIEN"  value="<?php echo isset($info['BANK_LIEN']) ? $info['BANK_LIEN'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    </tr>
    
    <tr>
    <td style="width:100%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> ADDRESS : <input  name="ADDRESS1"  value="<?php echo isset($info['ADDRESS1']) ? $info['ADDRESS1'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
    </tr>
    
    <tr>
    <td style="width:100%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    </tr>
    
    <tr>
    <td style="width:100%; font-size:16px; height:20px; padding:4px 5px; border-top:solid 1px #000;"> OWNER'S DRIVER LICENSE  </td>
    </tr>
</table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE1"  value="<?php echo isset($info['DRIVER_LICENSE1']) ? $info['DRIVER_LICENSE1'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE2"  value="<?php echo isset($info['DRIVER_LICENSE2']) ? $info['DRIVER_LICENSE2'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE3"  value="<?php echo isset($info['DRIVER_LICENSE3']) ? $info['DRIVER_LICENSE3'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE4"  value="<?php echo isset($info['DRIVER_LICENSE4']) ? $info['DRIVER_LICENSE4'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE5"  value="<?php echo isset($info['DRIVER_LICENSE5']) ? $info['DRIVER_LICENSE5'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE6"  value="<?php echo isset($info['DRIVER_LICENSE6']) ? $info['DRIVER_LICENSE6'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE7"  value="<?php echo isset($info['DRIVER_LICENSE7']) ? $info['DRIVER_LICENSE7'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE8"  value="<?php echo isset($info['DRIVER_LICENSE8']) ? $info['DRIVER_LICENSE8'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE9"  value="<?php echo isset($info['DRIVER_LICENSE9']) ? $info['DRIVER_LICENSE9'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE10"  value="<?php echo isset($info['DRIVER_LICENSE10']) ? $info['DRIVER_LICENSE10'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE11"  value="<?php echo isset($info['DRIVER_LICENSE11']) ? $info['DRIVER_LICENSE11'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE12"  value="<?php echo isset($info['DRIVER_LICENSE12']) ? $info['DRIVER_LICENSE12'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE13"  value="<?php echo isset($info['DRIVER_LICENSE13']) ? $info['DRIVER_LICENSE13'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
  </tr>
</table>


      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600; padding:4px 5px;">DATE OF BIRTH <input  name="year_dob"  value="<?php echo isset($info['year_dob']) ? $info['year_dob'] :  ''; ?>"  type="text" class="cradit_app" />/<input  name="month_dob"  value="<?php echo isset($info['month_dob']) ? $info['month_dob'] :  ''; ?>"  type="text" class="cradit_app" />/<input  name="date_dob"  value="<?php echo isset($info['date_dob']) ? $info['year_data'] :  ''; ?>"  type="text" class="cradit_app" /> </td>
  </tr>
  
  <tr>
    <td style="width:100%; font-size:16px;  padding:4px 5px;">OWNER'S DRIVER LICENSE  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE11"  value="<?php echo isset($info['DRIVER_LICENSE11']) ? $info['DRIVER_LICENSE11'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE12"  value="<?php echo isset($info['DRIVER_LICENSE12']) ? $info['DRIVER_LICENSE12'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE13"  value="<?php echo isset($info['DRIVER_LICENSE13']) ? $info['DRIVER_LICENSE13'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE14"  value="<?php echo isset($info['DRIVER_LICENSE14']) ? $info['DRIVER_LICENSE14'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE15"  value="<?php echo isset($info['DRIVER_LICENSE15']) ? $info['DRIVER_LICENSE15'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE16"  value="<?php echo isset($info['DRIVER_LICENSE16']) ? $info['DRIVER_LICENSE16'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE17"  value="<?php echo isset($info['DRIVER_LICENSE17']) ? $info['DRIVER_LICENSE17'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE18"  value="<?php echo isset($info['DRIVER_LICENSE18']) ? $info['DRIVER_LICENSE18'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE19"  value="<?php echo isset($info['DRIVER_LICENSE19']) ? $info['DRIVER_LICENSE19'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE20"  value="<?php echo isset($info['DRIVER_LICENSE20']) ? $info['DRIVER_LICENSE20'] : ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE21"  value="<?php echo isset($info['DRIVER_LICENSE21']) ? $info['DRIVER_LICENSE21'] : ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE22"  value="<?php echo isset($info['DRIVER_LICENSE22']) ? $info['DRIVER_LICENSE22'] :  ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
    <td style="width:9%;"> <input  name="DRIVER_LICENSE23"  value="<?php echo isset($info['DRIVER_LICENSE23']) ? $info['DRIVER_LICENSE23'] : ''; ?>"  type="text" value="" class="cradit_app3" /> </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600; padding:4px 5px;">DATE OF BIRTH <input  name="year_dob1"  value="<?php echo isset($info['year_dob1']) ? $info['year_dob1'] :  ''; ?>"  type="text" class="cradit_app" />/<input  name="month_dob1"  value="<?php echo isset($info['month_dob1']) ? $info['month_dob1'] :  ''; ?>"  type="text" class="cradit_app" />/<input  name="date_dob1"  value="<?php echo isset($info['date_dob1']) ? $info['date_dob1'] :  ''; ?>"  type="text" class="cradit_app" /> </td>
  </tr>
  
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600;  padding:4px 5px;">SALESPERSON  <input  name="sperson"  value="<?php echo isset($info['sperson']) ? $info['sperson'] :  ''; ?>"  type="text" class="cradit_app4" /></td>
  </tr>
  
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600;  padding:4px 5px;">CUSTOMER VEHICLE INSURANCE COMPANY </td>
  </tr>
  
  <tr>
    <td style="width:100%; font-size:16px; font-weight:600;  padding:4px 5px;">    
    <input  name="CUSTOMER_VEHICLE_INSURANCE_COMPANY"  value="<?php echo isset($info['CUSTOMER_VEHICLE_INSURANCE_COMPANY']) ? $info['CUSTOMER_VEHICLE_INSURANCE_COMPANY'] :  ''; ?>"  type="text" class="cradit_app6" />
    </td>
  </tr>
</table>

    </td>
    
    
    <td style="width:96%; float:right; border:solid 1px #000;">
    
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
     
     <tr class="noprint">
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> Fixed Fee </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
    			<?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:90px;',
							'data-id'=>'1',
							'value'=>isset($info['fixed_fee_options'])?$info['fixed_fee_options']:''
						));
						?>
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
     
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> MARKET VALUE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
    <input  name="unit_value" id="unit_value"  value="<?php echo isset($info['unit_value']) ? $info['unit_value'] : $info['unit_value']; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> DISCOUNT </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
    <input  name="discount" id="discount"  value="<?php echo isset($info['discount']) ? $info['discount'] :  '0.00'; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> SALE PRICE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="sale_price" id="sale_price"  value="<?php echo isset($info['sale_price']) ? $info['sale_price'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> ACCESSORIES INSTALLED </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="accessories_installed" id="accessories_installed"  value="<?php echo isset($info['accessories_installed']) ? $info['accessories_installed'] :  '0.00'; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;"> SUB TOTAL </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="sub_total" id="sub_total"  value="<?php echo isset($info['sub_total']) ? $info['sub_total'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">1.  DOCUMENT FEE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="document_fee" id="document_fee"  value="138.00"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">1a. OPTIONAL $24 ELECTRONIC FILING FEE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="electronic_filing_fee" id="electronic_filing_fee"  value="<?php echo isset($info['electronic_filing_fee']) ? $info['electronic_filing_fee'] :  '0.00'; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">2. TOTAL TAXABLE PRICE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="total_taxable_price" id="total_taxable_price"  value="<?php echo isset($info['total_taxable_price']) ? $info['total_taxable_price'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">3. SALES TAX ( 6% OF LINE 2) </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="sales_tax" id="sales_tax"  value="<?php echo isset($info['sales_tax']) ? $info['sales_tax'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">4. LICENSE FEE CAT.<input  name="lic_fee_cat" id="lic_fee_cat"  value="<?php echo isset($info['lic_fee_cat']) ? $info['lic_fee_cat'] :  ''; ?>"  type="text" class="cradit_app" /> MOS <input  name="lic_fee_cat2"  value="<?php echo isset($info['lic_fee_cat2']) ? $info['lic_fee_cat2'] :''; ?>"  type="text" class="cradit_app" />  </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="lic_fee_cat3" id="lic_fee_cat3"  value="<?php echo isset($info['lic_fee_cat3']) ? $info['lic_fee_cat3'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;"> </td>
  </tr>
</table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">5. TITLE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="title_fee" id="title_fee"  value="<?php echo isset($info['title_fee']) ? $info['title_fee'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">6. GAP INSURANCE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="gap_insurance" id="gap_insurance"  value="<?php echo isset($info['gap_insurance']) ? $info['gap_insurance'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">7. EXTENDED SERVICE CONTRACT </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="extended_service_contract" id="extended_service_contract"  value="<?php echo isset($info['extended_service_contract']) ? $info['extended_service_contract'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">8. TOTAL CASH DELIVERED </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="total_cash_delivered" id="total_cash_delivered"  value="<?php echo isset($info['total_cash_delivered']) ? $info['total_cash_delivered'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:66%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">9. CASH ON DEPOSIT </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="cash_on_deposit" id="cash_on_deposit"  value="<?php echo isset($info['cash_on_deposit']) ? $info['cash_on_deposit'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
     <td style="width:4%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:66%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">10. CASH ON DELIVERY </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="cash_on_delivery" id ="cash_on_delivery"  value="<?php echo isset($info['cash_on_delivery']) ? $info['cash_on_delivery'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
     <td style="width:4%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">11. TRADE IN 1 </td>
     <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
      <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
	<td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; background:#ccc; border-top:solid 1px #000;">
		<input  name="trade_in1" id="trade_in1"  value="<?php echo isset($info['trade_in1']) ? $info['trade_in1'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; background:#ccc;">  </td>
     <td style="width:3.5%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">12. LESS LIEN ON 1 </td>
     <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
      <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000;  border-top:solid 1px #000;"> 
		<input  name="less_line_on" id="less_line_on"  value="<?php echo isset($info['less_line_on']) ? $info['less_line_on'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
	</td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; ">  </td>
     <td style="width:3.5%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">13. TRADE IN 2 </td>
     <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
      <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; background:#ccc; border-top:solid 1px #000;"> 
	<input  name="trade_value" id="trade_value"  value="<?php echo isset($info['trade_value']) ? $info['trade_value'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; background:#ccc;">  </td>
     <td style="width:3.5%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:18px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">14. LESS LIEN ON 2 </td>
     <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
      <td style="width:8%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000;  border-top:solid 1px #000;"> 
	<input  name="less_line_on_2" id="less_line_on_2"  value="<?php echo isset($info['less_line_on_2']) ? $info['less_line_on_2'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; ">  </td>
     <td style="width:3.5%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000; border-left:solid 1px #000; background:#ccc;">  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">15. TOTAL DOWN PAYMENT </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;"> 
	<input  name="total_down_payment" id="total_down_payment"  value="<?php echo isset($info['total_down_payment']) ? $info['total_down_payment'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">16. AMOUNT TO BE FINANCED </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input name="amount_to_be_financed"  id="amount_to_be_financed"  value="<?php echo isset($info['amount_to_be_financed']) ? $info['amount_to_be_financed'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">17. FINANCE CHARGE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="finance_charge" id="finance_charge"  value="<?php echo isset($info['finance_charge']) ? $info['finance_charge'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
	</td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">18. INSURANCE CHARGE </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="insurance_charge" id="insurance_charge"  value="<?php echo isset($info['insurance_charge']) ? $info['insurance_charge'] :  ''; ?>"  type="text" class="cradit_app6 amount_field" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:70%; font-size:16px; font-weight:600; height:20px; padding:4px 5px; border-right:solid 1px #000; border-top:solid 1px #000;">19. TOTAL AMT OF FINANCE CONTRACT </td>
    <td style="width:20%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">
	<input  name="total_amt_finance_contract" id="total_amt_finance_contract"  value="<?php echo isset($info['total_amt_finance_contract']) ? $info['total_amt_finance_contract'] :  ''; ?>"  type="text" class="cradit_app6" />
    </td>
    <td style="width:10%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>
    
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:60%; font-size:16px; height:80px; text-align:center; font-weight:600; padding:4px 0; border-right:solid 1px #000; border-top:solid 1px #000;">  </td>
    <td style="width:40%; font-size:16px; text-align:center; font-weight:600; padding:4px 0; border-top:solid 1px #000;">  </td>
  </tr>
</table>
    
    </td>
  </tr>
</table>
 
 
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:solid 8px #000;" class="table_width">
  <tr>
    <td style="font-size:16px; padding:25px 0 0 0;"> PURCHASER'S SIGNATURE:X <input  name=""  value=""  type="text" class="cradit_app5" /> X <input  name=""  value=""  type="text" class="cradit_app5" style="width:32%;" /></td>
  </tr>
  
   <tr>
    <td style="font-size:16px; padding:25px 0 0 0;"> DEALERSHIP SIGNATURE:X <input  name=""  value=""  type="text" class="cradit_app5" style="width:76%;" /> </td>
  </tr>
</table>
	</div></div>
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

function assign_fees(data,v_id)
{
	$("#lic_fee_cat3").val(data.licreg_fee);
	$("#tax_percent").val(data.tax_fee);
	$("#gap_insurance").val(data.gap_fee);
	$("#document_fee").val(data.doc_fee);
	$("#title_fee").val(data.title_fee);
}
	
	function calculate_tax(){
		
		var market_value = isNaN(parseFloat( $('#unit_value').val()))?0.00:parseFloat( $('#unit_value').val());
		var discount = isNaN(parseFloat( $('#discount').val()))?0.00:parseFloat( $('#discount').val());
		var sale_price = market_value - discount;
		$('#sale_price').val(sale_price.toFixed(2));
		
		var accs_fee = isNaN(parseFloat( $('#accessories_installed').val()))?0.00:parseFloat($('#accessories_installed').val());
		var sub_total = sale_price + accs_fee;
		$('#sub_total').val(sub_total.toFixed(2));
		
		var doc_fee = isNaN(parseFloat( $('#document_fee').val()))?0.00:parseFloat($('#document_fee').val());
		var electronic_fee = isNaN(parseFloat( $('#electronic_filing_fee').val()))?0.00:parseFloat($('#electronic_filing_fee').val());
		var taxable_price = sub_total + doc_fee + electronic_fee;
    $('#total_taxable_price').val(taxable_price.toFixed(2));
    var taxable_price =isNaN(parseFloat( $('#total_taxable_price').val()))?0.00:parseFloat($('#total_taxable_price').val());
		var tax_fee = isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat($('#tax_percent').val());
		var tax_percent = isNaN(parseFloat( $('#tax_percent').val()))?0.00:parseFloat($('#tax_percent').val());
		var tax_amount = (parseFloat(tax_percent)/100)*taxable_price;
    $('#sales_tax').val(tax_amount.toFixed(2));
    var tax_amount = isNaN(parseFloat( $('#sales_tax').val()))?0.00:parseFloat($('#sales_tax').val());
		var license_fee = isNaN(parseFloat( $('#lic_fee_cat3').val()))?0.00:parseFloat($('#lic_fee_cat3').val());
		var title_fee = isNaN(parseFloat( $('#title_fee').val()))?0.00:parseFloat($('#title_fee').val());
		
		var gap_insurance = isNaN(parseFloat( $('#gap_insurance').val()))?0.00:parseFloat($('#gap_insurance').val());
		var service_fee = isNaN(parseFloat( $('#extended_service_contract').val()))?0.00:parseFloat($('#extended_service_contract').val());
		var total_cash_delivered =taxable_price+tax_amount+license_fee+title_fee+gap_insurance+service_fee;
    $('#total_cash_delivered').val(total_cash_delivered.toFixed(2));
		var cash_delivered = isNaN(parseFloat( $('#total_cash_delivered').val()))?0.00:parseFloat($('#total_cash_delivered').val());
		var cash_on_deposit = isNaN(parseFloat( $('#cash_on_deposit').val()))?0.00:parseFloat($('#cash_on_deposit').val());		
		var cash_on_delivery = isNaN(parseFloat( $('#cash_on_delivery').val()))?0.00:parseFloat($('#cash_on_delivery').val());
		
		var trade_in1 = isNaN(parseFloat($('#trade_in1').val()))?0.00:parseFloat($('#trade_in1').val());
		
	 var less_line_on = isNaN(parseFloat($('#less_line_on').val()))?0.00:parseFloat($('#less_line_on').val()); 
		var trade_value =	isNaN(parseFloat($('#trade_value').val()))?0.00:parseFloat($('#trade_value').val());
		var less_line_on_2 =isNaN(parseFloat($('#less_line_on_2').val()))?0.00:parseFloat($('#less_line_on_2').val()); 
    var total_payment = (cash_on_deposit+cash_on_delivery+trade_in1+trade_value)-(less_line_on+less_line_on_2);
    $('#total_down_payment').val(total_payment.toFixed(2));
    var total_down_payment =  isNaN(parseFloat($('#total_down_payment').val()))?0.00:parseFloat($('#total_down_payment').val());
    var amount_financed = cash_delivered-total_down_payment;
    $('#amount_to_be_financed').val(amount_financed.toFixed(2));
    var amount_to_be_financed = isNaN(parseFloat($('#amount_to_be_financed').val()))?0.00:parseFloat($('#amount_to_be_financed').val());
		var finance_charge =	isNaN(parseFloat($('#finance_charge').val()))?0.00:parseFloat($('#finance_charge').val());
		var insurance_charge =	isNaN(parseFloat($('#insurance_charge').val()))?0.00:parseFloat($('#insurance_charge').val());
		var total_amt_finace = amount_to_be_financed+insurance_charge+finance_charge;
		$('#total_amt_finance_contract').val(total_amt_finace.toFixed(2));
		}	
$(document).ready(function(){
	var actual_balance = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	$(".amount_field").on('change keyup paste',function(){
					calculate_tax();
		
					});
$('#fixed_fee_options').change(function(){
		var data_id=$(this).attr('data-id');
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					assign_fees(data);
					calculate_tax();
					//calculate_balance();
					//assign_payment(data_id);
					
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
</script>
</div>
