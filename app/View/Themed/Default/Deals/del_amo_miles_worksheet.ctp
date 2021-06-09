<?php
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
		<style>body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:solid 1px #ccc;}

.workld_fm{ width:25%; border-bottom:solid 1px #ccc; border-top:none; border-left:none; border-right:none; margin:0 10px;}
.workld_fm2{ width:90%; border-bottom:none; border-top:none; border-left:none; border-right:none; margin:0 10px;}
.workld_fm3{ width:70%; border-bottom:none; border-top:none; border-left:none; border-right:none; margin:0 10px;}
.workld_fm4{ width:40%; border-bottom:none; border-top:none; border-left:none; border-right:none; margin:0 10px;}
.workld_fm5{ width:60%; border-bottom:solid 1px #ccc; border-top:none; border-left:none; border-right:none; margin:0 10px;}

</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
      <tr>
        <td style="width:20%; vertical-align:top; font-size:18px; color:#646464;">Ref # <input name="" type="text" class="workld_fm"></td>
        <td style=" width:60%;text-align:center;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/del_amo_miles.png'); ?>"/></td>
        <td style="width:20%;"> 
        
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:35%; font-size:16px; color:#646464; padding:7px 0 7px 5px; border-bottom:solid 1px #646464;  border-left:solid 1px #646464;">Salesman </td>
         <td style="width:65%; font-size:16px; color:#646464; padding:7px 0;border-bottom:solid 1px #646464; "> <input name="sperson_data" type="text" value="<?php echo isset($info["sperson_data"]) ? $info['sperson_data'] : $info['sperson'];?>" class="workld_fm2"> </td>
      </tr>
      
      <tr>
    <td style="width:35%; font-size:16px; color:#646464; padding:7px 0 7px 5px; border-bottom:solid 1px #646464;  border-left:solid 1px #646464;">Source </td>
    <td style="width:65%; font-size:16px; color:#646464; padding:7px 0; border-bottom:solid 1px #646464;"> <input name="source_date" type="text"  value="<?php echo isset($info["source_date"]) ? $info['source_date'] :"";?>"  class="workld_fm2"></td>
      </tr>
      
      <tr style="">
        <td style="width:35%; font-size:16px; color:#646464; padding:7px 0 7px 5px; border-bottom:solid 1px #646464; border-left:solid 1px #646464;">Date  </td>
        <td style="width:65%; font-size:16px; color:#646464; padding:7px 0; border-bottom:solid 1px #646464;"> <input name="date_data" type="text" value="<?php echo isset($info["date"]) ? $info['date'] :"";?>"   class="workld_fm2"> </td>
      </tr>
    </table>
    
        </td>
      </tr>
    </table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:50%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Client Name <input name="client_name" value="<?php echo isset($info["client_name"]) ? $info['client_name'] :$info['first_name']."".$info['first_name'];?>"   type="text" class="workld_fm3"></td>
        <td style="width:25%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Home Phone <input name="home_phone" type="text"  value="<?php echo isset($info["home_phone"]) ? $info['home_phone'] :$info['phone'];?>"  class="workld_fm4"></td>
        <td style="width:25%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Business Phone <input name="b_phone" type="text"  value="<?php echo isset($info["b_phone"]) ? $info['b_phone'] :$info['phone'];?>"  class="workld_fm4"></td>
      </tr>
    </table>
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:50%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Street Address <input name="saddress" type="text"  value="<?php echo isset($info["saddress"]) ? $info['saddress'] :$info['address'];?>"  class="workld_fm3"></td>
        <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">City / zip <input name="city_zip" type="text"  value="<?php echo isset($info["city_zip"]) ? $info['city_zip'] :$info['city'];?>"  class="workld_fm4"></td>
        <td style="width:35%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Email: <input name="email" type="text"  value="<?php echo isset($info["email"]) ? $info['email'] :$info['email'];?>"  class="workld_fm4"></td>
      </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:100%; color:#646464; font-size:16px; text-align:center; padding:10px 5px;">Description Of Purchases</td>
     </tr>
    </table>
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">New <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Year </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Make </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Model </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Vin</td>
	 <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Miles</td>
      </tr>
      
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Used <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['year']; ?></td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['make']; ?></td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"><?php echo $info['model']; ?> </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['vin']; ?></td>
	<td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['miles']; ?></td>
      </tr>
      
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">New <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Year </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Make </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Model </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Vin </td>
	 <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Miles</td>
      </tr>
      
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Used <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
		<td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['miles']; ?></td>
	
      </tr>
      
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">New <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Year </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Make </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Model </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Vin </td>
	 <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Miles</td>
      </tr>
      
      <tr>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;">Used <input name="" type="text" class="workld_fm"></td>
    <td style="width:15%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
    <td style="width:10%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> </td>
		<td style="width:20%; color:#646464; font-size:16px; border:solid 1px #646464; padding:10px 5px;"> <?php echo $info['miles']; ?></td>
      </tr>   
    </table>

     <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td style="width:40%; border:solid 1px #646464;">&nbsp;</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;">Unit 1</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;">Unit 2</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;">Unit 3</td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">MSRP</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="MSRP_unit1" type="text"  value="<?php echo isset($info["MSRP_unit1"]) ? $info['MSRP_unit1'] :$info['MSRP_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="MSRP_unit2" type="text"  value="<?php echo isset($info["MSRP_unit2"]) ? $info['MSRP_unit2'] :$info['MSRP_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="MSRP_unit3" type="text"  value="<?php echo isset($info["MSRP_unit2"]) ? $info['MSRP_unit2'] :$info['MSRP_unit2'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Freight</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Freight_unit1" type="text"  value="<?php echo isset($info["Freight_unit1"]) ? $info['Freight_unit1'] :$info['Freight_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Freight_unit2" type="text"  value="<?php echo isset($info["Freight_unit2"]) ? $info['Freight_unit2'] :$info['Freight_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Freight_unit3" type="text"  value="<?php echo isset($info["Freight_unit3"]) ? $info['Freight_unit3'] :$info['Freight_unit3'];?>"></td>
  </tr>
  
   <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Preparation</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Preparation_unit1" type="text"  value="<?php echo isset($info["Preparation_unit1"]) ? $info['Preparation_unit1'] :$info['Preparation_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Preparation_unit2" type="text"  value="<?php echo isset($info["Preparation_unit2"]) ? $info['Preparation_unit2'] :$info['Preparation_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Preparation_unit3" type="text"  value="<?php echo isset($info["Preparation_unit3"]) ? $info['Preparation_unit3'] :$info['Preparation_unit3'];?>"></td>
  </tr>
  
   <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Installed Equipment</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Installed_unit1" type="text"  value="<?php echo isset($info["Installed_unit1"]) ? $info['Installed_unit1'] :$info['Installed_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Installed_unit2" type="text"  value="<?php echo isset($info["Installed_unit2"]) ? $info['Installed_unit2'] :$info['Installed_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Installed_unit3" type="text"  value="<?php echo isset($info["Installed_unit3"]) ? $info['Installed_unit3'] :$info['Installed_unit3'];?>"></td>
  </tr>
  
   <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">DOC</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Doc_unit1" type="text"  value="<?php echo isset($info["Doc_unit1"]) ? $info['Doc_unit1'] :$info['Doc_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Doc_unit2" type="text"  value="<?php echo isset($info["Doc_unit2"]) ? $info['Doc_unit2'] :$info['Doc_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Doc_unit3" type="text"  value="<?php echo isset($info["Doc_unit3"]) ? $info['Doc_unit3'] :$info['Doc_unit3'];?>"></td>
  </tr>
  
   <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Subtotal</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Subtotal_unit1" type="text"  value="<?php echo isset($info["Subtotal_unit1"]) ? $info['Subtotal_unit1'] :$info['Subtotal_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Subtotal_unit2" type="text"  value="<?php echo isset($info["Subtotal_unit2"]) ? $info['Subtotal_unit2'] :$info['Subtotal_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Subtotal_unit3" type="text"  value="<?php echo isset($info["Subtotal_unit3"]) ? $info['Subtotal_unit3'] :$info['Subtotal_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Sales Tax</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Tax_unit1" type="text"  value="<?php echo isset($info["Tax_unit1"]) ? $info['Tax_unit1'] :$info['Tax_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Tax_unit2" type="text"  value="<?php echo isset($info["Tax_unit2"]) ? $info['Tax_unit2'] :$info['Tax_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Tax_unit3" type="text"  value="<?php echo isset($info["Tax_unit3"]) ? $info['Tax_unit3'] :$info['emailTax_unit3']; ?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Dmv</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Dmv_unit1" type="text"  value="<?php echo isset($info["Dmv_unit1"]) ? $info['Dmv_unit1'] :$info['Dmv_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Dmv_unit2" type="text"  value="<?php echo isset($info["Dmv_unit2"]) ? $info['Dmv_unit2'] :$info['Dmv_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="Dmv_unit3" type="text"  value="<?php echo isset($info["Dmv_unit3"]) ? $info['Dmv_unit3'] :$info['Dmv_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">CA Tire Fee</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="tire_unit1" type="text"  value="<?php echo isset($info["tire_unit1"]) ? $info['tire_unit1'] :$info['tire_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="tire_unit2" type="text"  value="<?php echo isset($info["tire_unit2"]) ? $info['tire_unit2'] :$info['tire_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="tire_unit3" type="text"  value="<?php echo isset($info["tire_unit3"]) ? $info['tire_unit3'] :$info['tire_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Total Cash Price</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="cash_unit1" type="text"  value="<?php echo isset($info["cash_unit1"]) ? $info['cash_unit1'] :$info['cash_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="cash_unit2" type="text"  value="<?php echo isset($info["cash_unit2"]) ? $info['cash_unit2'] :$info['cash_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="cash_unit3" type="text"  value="<?php echo isset($info["cash_unit3"]) ? $info['cash_unit3'] :$info['cash_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Trade-In Allowance</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="allowance_unit1" type="text"  value="<?php echo isset($info["allowance_unit1"]) ? $info['allowance_unit1'] :$info['allowance_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="allowance_unit2" type="text"  value="<?php echo isset($info["allowance_unit2"]) ? $info['allowance_unit2'] :$info['allowance_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="allowance_unit3" type="text"  value="<?php echo isset($info["allowance_unit3"]) ? $info['allowance_unit3'] :$info['allowance_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Less Payoff</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="payoff_unit1" type="text"  value="<?php echo isset($info["payoff_unit1"]) ? $info['payoff_unit1'] :$info['payoff_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="payoff_unit2" type="text"  value="<?php echo isset($info["payoff_unit2"]) ? $info['payoff_unit2'] :$info['payoff_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="payoff_unit3" type="text"  value="<?php echo isset($info["payoff_unit3"]) ? $info['payoff_unit3'] :$info['payoff_unit3'];?>"></td>
  </tr>
  
  <tr>
    <td style="width:40%; border:solid 1px #646464; padding:10px 5px;">Total Balance Due</td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="balance_unit1" type="text"  value="<?php echo isset($info["balance_unit1"]) ? $info['balance_unit1'] :$info['balance_unit1'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="balance_unit2" type="text"  value="<?php echo isset($info["balance_unit2"]) ? $info['balance_unit2'] :$info['balance_unit2'];?>"></td>
    <td style="width:20%; font-size:16px; color:#646464; padding:10px 5px; border:solid 1px #646464;"><input name="balance_unit3" type="text"  value="<?php echo isset($info["balance_unit3"]) ? $info['balance_unit3'] :$info['balance_unit3'];?>"></td>
  </tr>
  
</table>

    
    </td>
    <td style="width:50%;"> 
    
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td style="width:50%;"> 
     
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #646464; border-bottom:solid 1px #646464;">
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:20px 5px 10px 0px;">Trade</td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;  padding:0px 5px;"> Year <input name="year1"  value="<?php echo isset($info["year1"]) ? $info['year1'] :"";?>" type="text" class="workld_fm"> </td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:0px 5px;">Make <input name="make1"  value="<?php echo isset($info["make1"]) ? $info['make1'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Model <input name="model1"  value="<?php echo isset($info["model1"]) ? $info['model1'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:0px 5px;">Mileage <input name="mileage1"  value="<?php echo isset($info["mileage1"]) ? $info['mileage1'] :"";?>"  value="<?php echo isset($info["type1"]) ? $info['type1'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Payoff <input name="payoff1" value="<?php echo isset($info["payoff1"]) ? $info['payoff1'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Year <input name="year2"  value="<?php echo isset($info["year2"]) ? $info['year2'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Make <input name="make2"  value="<?php echo isset($info["make2"]) ? $info['make2'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Model <input name="model2"  value="<?php echo isset($info["model2"]) ? $info['model2'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Mileage <input name="mileage2"  value="<?php echo isset($info["mileage2"]) ? $info['mileage2'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464;padding:0px 5px;">Payoff <input name="payoff2"  value="<?php echo isset($info["payoff2"]) ? $info['payoff2'] :"";?>" type="text" class="workld_fm"></td>
          </tr>
          
        </table>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #646464; border-bottom:solid 1px #646464;">
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:15px 5px;">Down Payment</td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;  padding:10px 5px;"> Unit 1 <input   value="<?php echo isset($info["down_unit1"]) ? $info['down_unit1'] :"";?>" name="down_unit1" type="text" class="workld_fm4"> </td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;  padding:10px 5px;">Unit 2 <input   value="<?php echo isset($info["down_unit2"]) ? $info['down_unit2'] :"";?>" name="down_unit2" type="text" class="workld_fm4"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:10px 5px;">Unit 3 <input   value="<?php echo isset($info["down_unit3"]) ? $info['down_unit3'] :"";?>" name="down_unit3" type="text" class="workld_fm4"></td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:16px 5px;">total <input name="" type="text" class="workld_fm4"></td>
          </tr>
          
        </table>
          
      </td>
     <td style="width:50%;"> 
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #646464; border-bottom:solid 1px #646464;">
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:15px 5px;">Selling Price</td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;  padding:10px 5px;"> Unit 1 <input name="selling_unit1"  value="<?php echo isset($info["selling_unit1"]) ? $info['selling_unit1'] :"";?>"  type="text" class="workld_fm4"> </td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464;  padding:10px 5px;">Unit 2 <input name="selling_unit2"  value="<?php echo isset($info["selling_unit2"]) ? $info['selling_unit2'] :"";?>"  type="text" class="workld_fm4"></td>
          </tr>
          
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:10px 5px;">Unit 3 <input name="selling_unit3"  value="<?php echo isset($info["selling_unit3"]) ? $info['selling_unit3'] :"";?>"  type="text" class="workld_fm4"></td>
          </tr>
          
           <tr>
            <td style="width:100%; font-size:16px; color:#646464; padding:16px 5px 138px 5px;">total <input name="" type="text" class="workld_fm4"></td>
          </tr>
          
        </table>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-right:solid 1px #646464; border-bottom:solid 1px #646464;">
          <tr>
            <td style="width:100%; font-size:16px; color:#646464; height:215px; padding:15px 5px; vertical-align:top;">Payment</td>
          </tr>
         
        </table>
       </td>
     </tr>
   </table>
  </td>
 </tr>
</table>

       <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:100%; font-size:16px; color:#646464; padding:20px 10px; line-height:28px;">This menu is provided to you, our customer, to assist you in better understanding the financial options available. Amounts above are ESTIMATES ONLY and may vary based on approved credit, applicable taxes, vehicle selection, trade value(s), estimated payoff, eligibility for rebates and other factors particular to your transaction. Final payments and terms may vary. Customer agrees to pay the difference, if any, in the amount of the trade lien payoff. This is NOT a contract and it is to be used for illustration purposes only.</td>
      </tr>
    </table>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="width:50%; font-size:16px; color:#646464; padding:20px 10px; line-height:28px;"> Client Approval <input name="" type="text" class="workld_fm5"> </td>
        
         <td style="width:50%; font-size:16px; color:#646464; padding:20px 10px; line-height:28px;"> Dealership Representative <input name="" type="text" class="workld_fm5"> </td>
         
      </tr>
      
    </table>

			
		</div>
		<!---left1-->
		</br>
        <span class="span24" style="width:28%">&nbsp;</span>
         <span class="span24" style="width:40%">&nbsp;</span>
         <span class="span24" style="width:28%">&nbsp;</span>
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->
	<br/>	
		
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
