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
		
			body{ margin:0 5%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.appraisal{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.appraisal2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.appraisal_service{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.appraisal_service2{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.appraisal25{ width:40%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.appraisal3{ width:45%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
			body { margin:0px 0px; }
			#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}
		</style>

	<div class="wraper header"> 
			<div class="row">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:30%; font-size:13px;">
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; padding:5px 0; background:#ccc;">DATE</td>
				 <td style="width:60%; padding:5px 0;"><?php echo date("Y-m-d"); ?></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CUSTOMER : <input  name="customer_data"  value="<?php echo isset($info['customer_data']) ? $info['customer_data'] :  $info['first_name']." ".$info['last_name']; ?>" type="text"  class="appraisal2" /></td>
			     </tr>
			     <tr>
			      <td style="width:30%; padding:5px 0;"> MODEL : <input  name="model_data"  value="<?php echo isset($info['model_data']) ? $info['model_data'] :  $info['model']; ?>" type="text"  class="appraisal2" /> </td>
			     </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> #VIN :<input  name="vin_data"  value="<?php echo isset($info['vin_data']) ? $info['vin_data'] :  $info['vin']; ?>" type="text"  class="appraisal2" /></td>
		             </tr>
			     <tr>
			      <td style="width:30%; padding:5px 0;"> COLOR : <input  name="color_data"  value="<?php echo isset($info['color_data']) ? $info['color_data'] :  ''; ?>" type="text"  class="appraisal2" /></td>
			    
			     </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/left.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FUEL TANK </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FUEL_TANK"  value="<?php echo isset($info['FUEL_TANK']) ? $info['FUEL_TANK'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CLUTCH </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CLUTCH"  value="<?php echo isset($info['CLUTCH']) ? $info['CLUTCH'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> ENGINE / DRIVE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="ENGINE_DRIVE"  value="<?php echo isset($info['ENGINE_DRIVE']) ? $info['ENGINE_DRIVE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> HORN </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="HORN"  value="<?php echo isset($info['HORN']) ? $info['HORN'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> KICKSTAND </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="KICKSTAND"  value="<?php echo isset($info['KICKSTAND']) ? $info['KICKSTAND'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FOOTREST </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FOOTREST"  value="<?php echo isset($info['FOOTREST']) ? $info['FOOTREST'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CAM CHAIN TENS</td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CAM_CHAIN_TENS"  value="<?php echo isset($info['CAM_CHAIN_TENS']) ? $info['CAM_CHAIN_TENS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bottom-l.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TAIL LIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TAIL_LIGHTS"  value="<?php echo isset($info['TAIL_LIGHTS']) ? $info['TAIL_LIGHTS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TURN SIGNALS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TURN_SIGNALS"  value="<?php echo isset($info['TURN_SIGNALS']) ? $info['TURN_SIGNALS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> BRAKE LIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKE_LIGHTS"  value="<?php echo isset($info['BRAKE_LIGHTS']) ? $info['BRAKE_LIGHTS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> BRAKES </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKES"  value="<?php echo isset($info['BRAKES']) ? $info['BRAKES'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> MASTER CYLINDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="MASTER_CYLINDER"  value="<?php echo isset($info['MASTER_CYLINDER']) ? $info['MASTER_CYLINDER'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> SHOCKS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="SHOCKS"  value="<?php echo isset($info['SHOCKS']) ? $info['SHOCKS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FENDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FENDER"  value="<?php echo isset($info['FENDER']) ? $info['FENDER'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TIRE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TIRE"  value="<?php echo isset($info['TIRE']) ? $info['TIRE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    

			    </td>
			    
			    
			    <td style="width:30%;">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:100%; font-size:14px; text-align:left; padding:5px 0;">WRITE-UP AND VISUAL INSPECTION FORM</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>				
				 <td style="width:100%; font-size:14px; padding:5px 0;">TRADE-IN EVALUATION</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50; font-size:13px; text-align:left;"> YEAR : <input  name="trade_year"  value="<?php echo isset($info['trade_year']) ? $info['trade_year'] :  $info['trade_year']; ?>" type="text"  class="appraisal25" /> </td>
				 <td style="width:50%; font-size:13px; text-align:left;">MILES: <input  name="trade_miles"  value="<?php echo isset($info['trade_miles']) ? $info['trade_miles'] :  $info['trade_miles']; ?>" type="text"  class="appraisal25" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:60%; font-size:12px;text-align:left;"> VERIFICATION OF MILEAGE>> </td>
				 <td style="width:60%; font-size:12px;">SALE <input  name="SALE"  value="<?php echo isset($info['SALE']) ? $info['SALE'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:12px; padding:2px 0; text-align:left;">  TRADE ONE </td>
				 <td style="width:70%; font-size:12px;">SERV WRITER <input  name="SERV_WRITER"  value="<?php echo isset($info['SERV_WRITER']) ? $info['SERV_WRITER'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:12px; padding:0px 0; text-align:left;">  WORK REQUESTED </td>
				 <td style="width:60%; font-size:12px; padding:5px 0;">SERV TECH <input  name="WORK_REQUESTED"  value="<?php echo isset($info['WORK_REQUESTED']) ? $info['WORK_REQUESTED'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			   
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 5K SERVICE <input  name="service1"  value="<?php echo isset($info['service1']) ? $info['service1'] :  ''; ?>" type="text"  class="appraisal_service currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 10K SERVICE <input  name="service2"  value="<?php echo isset($info['service2']) ? $info['service2'] :  ''; ?>" type="text"  class="appraisal_service currency" /></td>
			      </tr>
			    </table>
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0;border-left:solid 1px #333; ">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 15K SERVICE <input  name="service3"  value="<?php echo isset($info['service3']) ? $info['service3'] :  ''; ?>" type="text"  class="appraisal_service currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 20K SERVICE <input  name="service4"  value="<?php echo isset($info['service4']) ? $info['service4'] :  ''; ?>" type="text"  class="appraisal_service currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> OTHER <input  name="service5"  value="<?php echo isset($info['service5']) ? $info['service5'] :  ''; ?>" type="text"  class="appraisal_service currency" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333; text-align:center;"> TOTAL ALL SERVICE $
				<input  name="total_service"  value="<?php echo isset($info['total_service']) ? $info['total_service'] :  ''; ?>" type="text"  class="total_service_val" />
				</td>
			      </tr>
			    </table>
			    
			    

			    </td>
			    
			    <td style="width:30%;">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">RO#</td>
				<td style="width:70%;"> <input  name="RO_data"  value="<?php echo isset($info['RO_data']) ? $info['RO_data'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">Pref. Tech:</td>
				<td style="width:70%;"> <input  name="Pref_Tech"  value="<?php echo isset($info['Pref_Tech']) ? $info['Pref_Tech'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">License #:</td>
				<td style="width:70%;"> <input  name="License"  value="<?php echo isset($info['License']) ? $info['License'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/right.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">TRANSMISSION </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TRANSMISSION"  value="<?php echo isset($info['TRANSMISSION']) ? $info['TRANSMISSION'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> ENGINE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="ENGINE"  value="<?php echo isset($info['ENGINE']) ? $info['ENGINE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> CARBURETOR / FI </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CARBURETOR"  value="<?php echo isset($info['CARBURETOR']) ? $info['CARBURETOR'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">THROTTLE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="THROTTLE"  value="<?php echo isset($info['THROTTLE']) ? $info['THROTTLE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> EXHAUST SYSTEM </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="EXHAUST"  value="<?php echo isset($info['EXHAUST']) ? $info['EXHAUST'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> BRAKE PEDAL </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKE_PEDAL"  value="<?php echo isset($info['BRAKE_PEDAL']) ? $info['BRAKE_PEDAL'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">FOOTREST </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FOOTREST"  value="<?php echo isset($info['FOOTREST']) ? $info['FOOTREST'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bottom-r.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> LIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="LIGHTS"  value="<?php echo isset($info['LIGHTS']) ? $info['LIGHTS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> FUEL TANK </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FUEL_TANK"  value="<?php echo isset($info['FUEL_TANK']) ? $info['FUEL_TANK'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> HAND BRAKES </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="HAND_BRAKES"  value="<?php echo isset($info['HAND_BRAKES']) ? $info['HAND_BRAKES'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> FENDERS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FENDERS"  value="<?php echo isset($info['FENDERS']) ? $info['FENDERS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> SEAT </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="SEAT"  value="<?php echo isset($info['SEAT']) ? $info['SEAT'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%;padding:5px 30px; font-size:13px;"> TIRE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TIRE"  value="<?php echo isset($info['TIRE']) ? $info['TIRE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			   
			    

			    </td>
			  </tr>
			</table>



			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:30%; font-size:13px;">
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; padding:5px 0; background:#ccc;">DATE</td>
				 <td style="width:60%; padding:5px 0;"><?php echo date("Y-m-d"); ?></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CUSTOMER : <input  name="customer1_data"  value="<?php echo isset($info['customer1_data']) ? $info['customer1_data'] :  $info['first_name']." ".$info['last_name']; ?>" type="text"  class="appraisal2" /></td>
			     </tr>
			     <tr>
			     	 <td style="width:30%; padding:5px 0;"> MODEL : <input  name="model1_data"  value="<?php echo isset($info['model1_data']) ? $info['model1_data'] :  $info['model']; ?>" type="text"  class="appraisal2" /></td>
			    
			     </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> #VIN: <input  name="vin1_data"  value="<?php echo isset($info['vin1_data']) ? $info['vin1_data'] :  $info['vin']; ?>" type="text"  class="appraisal2" /></td>
			      </tr>
			      <tr>
			      	 <td style="width:30%; padding:5px 0;"> COLOR:<input  name="color1_data"  value="<?php echo isset($info['color1_data']) ? $info['color1_data'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			   
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/left22.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FUEL TANK </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FUEL1_TANK"  value="<?php echo isset($info['FUEL1_TANK']) ? $info['FUEL1_TANK'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CLUTCH </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CLUTCH1"  value="<?php echo isset($info['CLUTCH1']) ? $info['CLUTCH1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> ENGINE / DRIVE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="ENGINE1_DRIVE"  value="<?php echo isset($info['ENGINE1_DRIVE']) ? $info['ENGINE1_DRIVE'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> HORN </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="HORN1"  value="<?php echo isset($info['HORN1']) ? $info['HORN1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> KICKSTAND </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="KICKSTAND1"  value="<?php echo isset($info['KICKSTAND1']) ? $info['KICKSTAND1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FOOTREST </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FOOTREST1"  value="<?php echo isset($info['FOOTREST1']) ? $info['FOOTREST1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> CAM CHAIN TENS</td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CAM_CHAIN_TENS1"  value="<?php echo isset($info['CAM_CHAIN_TENS1']) ? $info['CAM_CHAIN_TENS1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bottom22.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TAIL LIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TAIL1_LIGHTS"  value="<?php echo isset($info['TAIL1_LIGHTS']) ? $info['TAIL1_LIGHTS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TURN SIGNALS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TURN1_SIGNALS"  value="<?php echo isset($info['TURN1_SIGNALS']) ? $info['TURN1_SIGNALS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> BRAKE LIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKE1_LIGHTS"  value="<?php echo isset($info['BRAKE1_LIGHTS']) ? $info['BRAKE1_LIGHTS'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> BRAKES </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKES1"  value="<?php echo isset($info['BRAKES1']) ? $info['BRAKES1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> MASTER CYLINDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="MASTER1_CYLINDER"  value="<?php echo isset($info['MASTER1_CYLINDER']) ? $info['MASTER1_CYLINDER'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> SHOCKS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="SHOCKS1"  value="<?php echo isset($info['SHOCKS1']) ? $info['SHOCKS1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> FENDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FENDER1"  value="<?php echo isset($info['FENDER1']) ? $info['FENDER1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 0;"> TIRE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TIRE1"  value="<?php echo isset($info['TIRE1']) ? $info['TIRE1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    

			    </td>
			    
			    
			    <td style="width:30%;">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:100%; font-size:14px; text-align:left; padding:5px 0;">WRITE-UP AND VISUAL INSPECTION FORM</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>				
				 <td style="width:100%; font-size:14px; padding:0px 0;">TRADE-IN EVALUATION</td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:13px; text-align:left; padding:5px 0;"> YEAR:<input  name="trade1_year"  value="<?php echo isset($info['trade1_year']) ? $info['trade_year'] :  $info['trade1_year']; ?>" type="text"  class="appraisal2" /> </td>
				 <td style="width:50%; font-size:13px; text-align:left;">MILES:<input  name="trade1_miles"  value="<?php echo isset($info['trade1_miles']) ? $info['trade1_miles'] :  $info['trade_miles']; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:60%; font-size:12px;text-align:left;">  VERIFICATION OF MILEAGE>> </td>
				 <td style="width:60%; font-size:12px;">SALE <input  name="sales1"  value="<?php echo isset($info['sales1']) ? $info['sales1'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:12px;text-align:left;">  TRADE ONE </td>
				 <td style="width:70%; font-size:12px;">SERV WRITER <input  name="SERV_WRITER"  value="<?php echo isset($info['SERV_WRITER']) ? $info['SERV_WRITER'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:40%; font-size:12px;text-align:left;">  WORK REQUESTED </td>
				 <td style="width:60%; font-size:12px; ">SERV TECH <input  name="SERV_TECH"  value="<?php echo isset($info['SERV_TECH']) ? $info['SERV_TECH'] :  ''; ?>" type="text"  class="appraisal3" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			   
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333;"> . </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 5K SERVICE <input  name="service11"  value="<?php echo isset($info['service11']) ? $info['service11'] :  ''; ?>" type="text"  class="appraisal_service2 currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 10K SERVICE <input  name="service12"  value="<?php echo isset($info['service12']) ? $info['service12'] :  ''; ?>" type="text"  class="appraisal_service2 currency" /></td>
			      </tr>
			    </table>
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0;border-left:solid 1px #333; ">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 15K SERVICE <input  name="service13"  value="<?php echo isset($info['service13']) ? $info['service13'] :  ''; ?>" type="text"  class="appraisal_service2 currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> 20K SERVICE <input  name="service14"  value="<?php echo isset($info['service14']) ? $info['service14'] :  ''; ?>" type="text"  class="appraisal_service2 currency" /></td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:50%; font-size:12px; padding:5px 0; border-left:solid 1px #333;">  </td>
				<td style="width:50%; font-size:12px; padding:5px 0; border:solid 1px #333;"> OTHER <input  name="service15"  value="<?php echo isset($info['service15']) ? $info['service15'] :  ''; ?>" type="text"  class="appraisal_service2 currency" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; font-size:12px; padding:5px 0; border:solid 1px #333; text-align:center;"> TOTAL ALL SERVICE $
				<input  name="total_service2"  value="<?php echo isset($info['total_service2']) ? $info['total_service2'] :  ''; ?>" type="text"  class="total_service_val2" />
				</td>
			      </tr>
			    </table>
			    
			    

			    </td>
			    
			    <td style="width:30%;">
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">RO#</td>
				<td style="width:70%;"> <input  name="RO1"  value="<?php echo isset($info['RO1']) ? $info['RO1'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">Pref. Tech:</td>
				<td style="width:70%;"> <input  name="Pref1_Tech"  value="<?php echo isset($info['Pref1_Tech']) ? $info['Pref1_Tech'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:30%; font-size:13px;">License #:</td>
				<td style="width:70%;"> <input  name="License1"  value="<?php echo isset($info['License1']) ? $info['License1'] :  ''; ?>" type="text"  class="appraisal" /></td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/right22.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">TRANSMISSION </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TRANSMISSION1"  value="<?php echo isset($info['TRANSMISSION1']) ? $info['TRANSMISSION1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> ENGINE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="ENGINE1"  value="<?php echo isset($info['ENGINE1']) ? $info['ENGINE1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> CARBURETOR / FI </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="CARBURETOR1"  value="<?php echo isset($info['CARBURETOR1']) ? $info['CARBURETOR1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">THROTTLE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="THROTTLE1"  value="<?php echo isset($info['THROTTLE1']) ? $info['THROTTLE1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> EXHAUST SYSTEM </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="EXHAUST1"  value="<?php echo isset($info['EXHAUST1']) ? $info['EXHAUST1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;"> BRAKE PEDAL </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKE1"  value="<?php echo isset($info['BRAKE1']) ? $info['BRAKE1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 20px; font-size:13px;">FOOTREST </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FOOTREST1"  value="<?php echo isset($info['FOOTREST1']) ? $info['FOOTREST1'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
			      <tr>
				<td style="width:100%; padding:10px 0; text-align:center;"> <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bottom-r22.png'); ?>"/> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> HEADLIGHTS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="HEADLIGHTS2"  value="<?php echo isset($info['HEADLIGHTS2']) ? $info['HEADLIGHTS2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> TURN SIGNALS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TURN_SIGNALS2"  value="<?php echo isset($info['TURN_SIGNALS2']) ? $info['TURN_SIGNALS2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> BRAKES </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="BRAKES2"  value="<?php echo isset($info['BRAKES2']) ? $info['BRAKES2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> FORK / STEERING </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FORK2_STEERING"  value="<?php echo isset($info['FORK2_STEERING']) ? $info['FORK2_STEERING'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%; padding:5px 30px; font-size:13px;"> MASTER CYLINDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="MASTER2_CYLINDER"  value="<?php echo isset($info['MASTER2_CYLINDER']) ? $info['MASTER2_CYLINDER'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%;padding:5px 30px; font-size:13px;">SHOCKS </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="SHOCKS2"  value="<?php echo isset($info['SHOCKS2']) ? $info['SHOCKS2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			   
			   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%;padding:5px 30px; font-size:13px;"> FENDER </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="FENDER2"  value="<?php echo isset($info['FENDER2']) ? $info['FENDER2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
				<td style="width:70%;padding:5px 30px; font-size:13px;">TIRE </td>
				 <td style="width:30%; padding:5px 0;"> <input  name="TIRE2"  value="<?php echo isset($info['TIRE2']) ? $info['TIRE2'] :  ''; ?>" type="text"  class="appraisal2" /> </td>
			      </tr>
			    </table>
			    

			    </td>
			  </tr>
			</table>


			</div>
	</div></div>
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
	
	function convertFormatedMoney (money){
			return money
				  .replace(/[^\d\-]/g,"")
				  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
				  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
     }
	
	$('input.currency').on('keyup',function(){
		
		if(event.which >= 37 && event.which <= 40){
            event.preventDefault();
        }
		
        $(this).val(function(index, value) {
			value = value.replace(/^0+/, "");
            return convertFormatedMoney(value);
        });
	});
	$(".appraisal_service").on('keyup',function(){
		
		var valdata1 = 0;
		var totalcount = 0;
		$( ".appraisal_service" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			if(totalcount != "")
			{
				valdata1 = valdata1 + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);total_service_val
		
		$(".total_service_val").val(convertFormatedMoney(valdata1.toFixed(2)));
	});
	
	$(".appraisal_service2").on('keyup',function(){
		
		var valdata2 = 0;
		var totalcount = 0;
		$( ".appraisal_service2" ).each(function( index ) 
		{
			totalcount = $(this).val();
			totalcount = totalcount.replace(/,/g, '');
			if(totalcount != "")
			{
				valdata2 = valdata2 + parseFloat(totalcount);
				
			}
		});
		//alert(valdata);
		$(".total_service_val2").val(convertFormatedMoney(valdata2.toFixed(2)));
	});

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
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
