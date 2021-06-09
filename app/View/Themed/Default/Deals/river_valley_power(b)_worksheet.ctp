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
		<style>body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}

.wrk_frm{ width:70%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
.wrk_frm2{ width:80%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}
.wrk_frm3{ width:90%; background:none; border-bottom:solid 1px #646464; border-top:none; border-right:none; border-left:none;}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
        
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
		<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
         <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  />     
        
        
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background:#2E3069;">
    <td style=" width:30%; text-align:center;font-size:24px; font-weight:bold;color:#fff;">RIVER VALLEY</td>
    <td style="width:70%; font-size:12px; color:#fff; padding:12px 0; font-weight:600; text-align:center; letter-spacing:1px;">YAMAHA ! BENNINGTON ! SOUTHBAY ! MONTEREY ! CeNTURION ! SUPERME ! SEA-DOO <br />YAMAHA ! BENNINGTON ! SOUTHBAY ! MONTEREY ! CeNTURION ! SUPERME ! SEA-DOO  </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" margin-top:20px;">
  <tr style="">
    <td style=" width:10%; background:#2E3069; height:30px; margin-top:20px;"></td>
    <td style=" width:30%; text-align:center;font-size:20px; font-weight:bold;color:#2E3069;">revervalleypowersport.com</td>
    <td style="width:60%; font-size:12px; color:#2E3069; padding:12px 0; text-align:center; letter-spacing:1px;"> <strong>RED WING</strong> Hwy 61 West Red Wing, MN ! <strong>651-388-7000</strong> <br /> <strong>RED WING</strong> Hwy 61 West Red Wing, MN !<strong> 651-388-7000 </strong>  <br /> <strong>RED WING</strong> Hwy 61 West Red Wing, MN ! <strong>651-388-7000</strong>  </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%; background:#2E3069; height:25px;"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:30%;"></td>
    <td style=" width:45%; font-size:14px; font-weight:600;">SALESPERSON <input name="salesperson"   value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : "" ?>"   type="text" class="wrk_frm" /></td>
    <td style=" width:25%; font-size:14px; font-weight:600;">DATE <input name="date"   value="<?php echo isset($info['date']) ? $info['date'] : "" ?>"  type="text" class="wrk_frm2" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%; background:#2E3069; color:#fff; font-size:14px; font-weight:600; padding:5px 5px;">BUYER,S</td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">NAME <input name="name"   value="<?php echo isset($info['name']) ? $info['name'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">ADDRESS <input name="address"   value="<?php echo isset($info['address']) ? $info['address'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">CITY, ST, ZIP <input name="city"   value="<?php echo isset($info['city']) ? $info['city'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">PHONE # <input name="phone"   value="<?php echo isset($info['phone']) ? $info['phone'] : "" ?>"   type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">DL # <input name="dl"   value="<?php echo isset($info['dl']) ? $info['dl'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">DOB <input name="dob"   value="<?php echo isset($info['dob']) ? $info['dob'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
  <tr>
    <td style=" width:100%;color:#000; font-size:14px; font-weight:600;">E-MAIL <input name="email"   value="<?php echo isset($info['email']) ? $info['email'] : "" ?>"  type="text" class="wrk_frm3" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style=" width:100%; background:#2F5497; color:#fff; font-size:14px; font-weight:600; padding:5px 5px;"></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
  <tr>
    <td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">NEW/USED</td>
   <td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">YEAR</td>
    <td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MAKE</td>
    <td style="background:#2E3069; width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">MODEL ! DESC</td>
    <td style="background:#2E3069; width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">VIN ! PID</td>
    <td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">MSRP</td>
    <td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">SALE PRICE</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:14%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:85%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">RIVER VALLEY DISCOUNT</td>
  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
  
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:85%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">FRIGHT & SET UP</td>
  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
  
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
  <tr>
    <td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">NEW/USED</td>
   <td style="background:#2E3069; width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">QTY</td>
    <td style="background:#2E3069; width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">PART NUMBER</td>
    <td style="background:#2E3069; width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">DESCRIPTION</td>
    <td style="background:#2E3069; width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;">PRICE</td>
    <td style="background:#2E3069; width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#fff;">DISCOUNT</td>
    <td style=" width:10%; border-right:solid 1px #000; padding-left:5px;font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>

    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:8%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:12%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:30%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
   <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:10%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #000;">
  <tr>
    <td style="background:#2E3069; width:70%; border-right:solid 1px #000; text-align:center; padding:3px 0; padding-left:5px; font-size:14px; color:#fff;">DEPOSIT INFORMATION</td>
   <td style="background:#2E3069; width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#fff;"></td>
    <td style=" width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td
    ></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;">PARTS</td>
    <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000;">
  <tr>
    <td style="width:70%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;"></td>
  <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;">LEBAR TO INSTALL</td>
    <td style="width:15%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>


<table width="60%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
  <tr>
    <td style="width:45%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">TRADE INFO:</td>
  <td style="width:27%; border-right:solid 1px #000; padding-left:5px; font-size:14px; text-align:right; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:45%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">YEAR-----/------- </td>
  <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">VIN</td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:45%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">MAKE </td>
  <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">MODEL</td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; color:#000;">NADA AVERAGE TRADE VALUE</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">LESS REPAIRS RECONDITIONING NEEDED: LABOR</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; border-right:solid 1px #000; font-size:14px; height:20px; color:#000;">MILES/HOURS</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;">PARTS</td>
    <td style="width:27%; border-left:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">TOTAL TRADE VALUE LESS RECONDITIONING</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; background:#FF0; font-size:13px; height:20px; color:#000;">CUSTOMER</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; padding-left:5px; font-size:13px; background:#FF0; height:20px; color:#000;">SIGNATURE</td>
  <td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; font-size:13px; height:20px; color:#000;">REFERRED BY</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:45%; border-top:solid 1px #000; padding-left:5px; background:#F00; font-size:13px; height:20px; color:#000;">CUSTOMER</td>
  <td style="width:27%; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000; border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:45%; padding-left:5px; font-size:13px; background:#F00; height:20px; color:#000;">SIGNATURE</td>
  <td style="width:27%;  padding-left:5px; font-size:14px; color:#000;"></td>
    <td style="width:27%; border-right:solid 1px #000;  padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
</table>


<table width="40%" border="0" cellspacing="0" cellpadding="0" style="border-top:none; border-bottom:solid 1px #000; border-right:solid 1px #000; border-left:solid 1px #000; float:left;">
  <tr>
    <td style="width:60%; border-right:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">SUBTOTAL</td>
  <td style="width:40%; border-right:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">TRADE IN VALUE</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">DEALER SERVICES FEE</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">TAXABLE TOTAL</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">MN/WI SALES TAX</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">WARRANTY/EXT SERVICE</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LICENSE FEE</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
      <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">CREDIT PROGRAM PARTICIPATION</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
      <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LOAN ORIGINATION FEE</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;"></td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
     <tr>
    <td style="width:60%; border-right:solid 1px #000;   padding-left:5px; font-size:20px; height:20px; text-align:right; color:#000;">Total</td>
  <td style="width:40%; border-right:solid 1px #000;  border-top:solid 1px #000;background:#ccc; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
    
    
      <tr>
    <td style="width:60%; border-right:solid 1px #000;  border-top:solid 1px #000; padding-left:5px; font-size:14px; height:20px; text-align:right; color:#000;">LOAN ORIGINATION FEE</td>
  <td style="width:40%; border-right:solid 1px #000; background:#ccc;  border-top:solid 1px #000; padding-left:5px; font-size:14px; color:#000;"></td>
    </tr>
</table>
		
		
		</div>
		<!---left1-->
		</br>
        <span class="span24" style="width:28%"></span>
         <span class="span24" style="width:40%"></span>
         <span class="span24" style="width:28%"></span>
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
	
	$( ".price_val" ).keyup(function() {
		
		values= 0;
		$( ".price_val" ).each(function() {
			
			if($(this).val() == "") return;
			values = values + parseFloat($(this).val(),2);
		});
		
		$(".total_val").val(values);
	});
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
