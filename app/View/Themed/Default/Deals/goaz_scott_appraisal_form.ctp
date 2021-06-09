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
$expectedt = date('m/d/Y');
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

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:15px!important;margin-top:5px;margin-bottom:10px;}
	body {font-family: Georgia, ‘Times New Roman’, serif;} 		
			
	@media print { 
		body {font-family: Georgia, ‘Times New Roman’, serif; font-size:14px;} 
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;height:14px;}
		table td{font-size:14px;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellpadding="4">
                <tr>
                
                
                <td colspan="4" align="center" valign="middle">
                <img style="height:120px;" src="<?php echo ('/app/webroot/files/goaz_images/goaz_combine.png'); ?>" alt=""><br/>
                <br/>
                
                <h4 style="text-decoration:underline; line-height:30px;"><b>Pre-Owned Motorcycle Appraisal
                </b></h4>
                
                </td>
                </tr>
                </table>
                <table width="100%">
                    <tr>
                    	<td>
                        <label style="width:70%;float:left;display:inline;" >Customer Name <input type="text" name="name" style="width:60%;" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"  /></label>
                        <label style="width:30%;float:left;display:inline;" >Date <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:''; ?>"  /></label>
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td>
                        <label style="width:70%;float:left;display:inline;" >Address <input type="text" name="address" style="width:70%;" value="<?php echo isset($info['address'])?$info['address']:''; ?>"  /></label>
                        <label style="width:30%;float:left;display:inline;" >Phone <input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>"  /></label>
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td>
                        <label style="width:65%;float:left;display:inline;" >Interested In <input type="text" name="interested_in" style="width:70%;" value="<?php echo isset($info['interested_in'])?$info['interested_in']:''; ?>"  /></label>
                        <label style="width:35%;float:left;display:inline;" >Stock No <input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>"  /></label>
                        
                        </td>
                    </tr>
                    
                    
                    <tr>
                    	<td>
                        <label style="width:20%;float:left;display:inline;" >Year <input type="text" name="year_trade" style="width:50%;" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>"  /></label>
                        <label style="width:55%;float:left;display:inline;" >Make & Model <input type="text" name="make_model_trade" style="width:65%;"  value="<?php echo isset($info['make_model_trade'])?$info['make_model_trade']:$info['make_trade'].' '.$info['make_trade']; ?>"  /></label>
                         <label style="width:25%;float:left;display:inline;" >Mileage <input type="text" name="odometer_trade" style="width:50%;" value="<?php echo isset($info['odometer_trade'])?$info['odometer_trade']:''; ?>"  /></label>
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td>
                        <label style="width:50%;float:left;display:inline;" >Vin # <input type="text" name="vin_trade" style="width:70%;" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>"  /></label>
                        <label style="width:50%;float:left;display:inline;" >Engine No. <input style="width:50%;" type="text" name="engine_trade" value="<?php echo isset($info['engine_trade'])?$info['engine_trade']:''; ?>"  /></label>
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td>
                        <label style="width:50%;float:left;display:inline;" >Title No. <input type="text" name="title_num" style="width:70%;" value="<?php echo isset($info['title_num'])?$info['title_num']:''; ?>"  /></label>
                        <label style="width:50%;float:left;display:inline;" >Salesperson <input style="width:50%;" type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>"  /></label>
                        
                        </td>
                    </tr>
                
                </table>
                
                        
                         
               <table width="100%" border="1" >
               <tr class="bg_color">
                   <td width="21%;">Item</td>
                   <td width="7%" align="center">&radic;</td>
                   <td width="20%" colspan="2">Reconditioning Amount</td>
                   <td width="21%;">Item</td>
                   <td width="7%" align="center">&radic;</td>
                   <td width="20%" colspan="2">Reconditioning Amount</td>
               </tr>
				<tr>
                	<td width="21%">Frame</td>
                    <td width="7%" align="center"><input type="checkbox" name="item1_check" value="yes" <?php echo (isset($info['item1_check'])&&$info['item1_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item1_amount" value="<?php echo isset($info['item1_amount'])?$info['item1_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Transmission</td>
                    <td width="7%" align="center"><input type="checkbox" name="item2_check" value="yes" <?php echo (isset($info['item2_check'])&&$info['item2_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item2_amount" value="<?php echo isset($info['item2_amount'])?$info['item2_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Fenders</td>
                    <td width="7%" align="center"><input type="checkbox" name="item3_check" value="yes" <?php echo (isset($info['item3_check'])&&$info['item3_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item3_amount" value="<?php echo isset($info['item3_amount'])?$info['item3_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Clutch</td>
                    <td width="7%" align="center"><input type="checkbox" name="item4_check" value="yes" <?php echo (isset($info['item4_check'])&&$info['item4_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item4_amount" value="<?php echo isset($info['item4_amount'])?$info['item4_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Forks</td>
                    <td width="7%" align="center"><input type="checkbox" name="item5_check" value="yes" <?php echo (isset($info['item5_check'])&&$info['item5_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item5_amount" value="<?php echo isset($info['item5_amount'])?$info['item5_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Cables</td>
                    <td width="7%" align="center"><input type="checkbox" name="item6_check" value="yes" <?php echo (isset($info['item6_check'])&&$info['item6_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item6_amount" value="<?php echo isset($info['item6_amount'])?$info['item6_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Chrome</td>
                    <td width="7%" align="center"><input type="checkbox" name="item7_check" value="yes" <?php echo (isset($info['item7_check'])&&$info['item7_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item7_amount" value="<?php echo isset($info['item7_amount'])?$info['item7_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Fuel Tank</td>
                    <td width="7%" align="center"><input type="checkbox" name="item8_check" value="yes" <?php echo (isset($info['item8_check'])&&$info['item8_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item8_amount" value="<?php echo isset($info['item8_amount'])?$info['item8_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Seat</td>
                    <td width="7%" align="center"><input type="checkbox" name="item9_check" value="yes" <?php echo (isset($info['item9_check'])&&$info['item9_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item9_amount" value="<?php echo isset($info['item9_amount'])?$info['item9_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Final Drive System</td>
                    <td width="7%" align="center"><input type="checkbox" name="item10_check" value="yes" <?php echo (isset($info['item10_check'])&&$info['item10_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item10_amount" value="<?php echo isset($info['item10_amount'])?$info['item10_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr class="bg_color"><td colspan="8">&nbsp;</td></tr>
                 <tr>
                	<td width="21%">Tachometer</td>
                    <td width="7%" align="center"><input type="checkbox" name="item11_check" value="yes" <?php echo (isset($info['item11_check'])&&$info['item11_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item11_amount" value="<?php echo isset($info['item11_amount'])?$info['item11_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Windshield</td>
                    <td width="7%" align="center"><input type="checkbox" name="item12_check" value="yes" <?php echo (isset($info['item12_check'])&&$info['item12_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item12_amount" value="<?php echo isset($info['item12_amount'])?$info['item12_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Speedometer</td>
                    <td width="7%" align="center"><input type="checkbox" name="item13_check" value="yes" <?php echo (isset($info['item13_check'])&&$info['item13_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item13_amount" value="<?php echo isset($info['item13_amount'])?$info['item13_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Fairing</td>
                    <td width="7%" align="center"><input type="checkbox" name="item14_check" value="yes" <?php echo (isset($info['item14_check'])&&$info['item14_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item14_amount" value="<?php echo isset($info['item14_amount'])?$info['item14_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Mirrors</td>
                    <td width="7%" align="center"><input type="checkbox" name="item15_check" value="yes" <?php echo (isset($info['item15_check'])&&$info['item15_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item15_amount" value="<?php echo isset($info['item15_amount'])?$info['item15_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Radio</td>
                    <td width="7%" align="center"><input type="checkbox" name="item16_check" value="yes" <?php echo (isset($info['item16_check'])&&$info['item16_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item16_amount" value="<?php echo isset($info['item16_amount'])?$info['item16_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                 <tr>
                	<td width="21%">Horn</td>
                    <td width="7%" align="center"><input type="checkbox" name="item17_check" value="yes" <?php echo (isset($info['item17_check'])&&$info['item17_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item17_amount" value="<?php echo isset($info['item17_amount'])?$info['item17_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td colspan="4" class="bg_color">&nbsp;</td>
                   
                </tr>
                <tr>
                <td rowspan="2" valign="middle">Wheels<br/> Spoke__Mag__</td>
                <td rowspan="2" valign="middle" align="center"><input type="checkbox" name="item18_check" value="yes" <?php echo (isset($info['item18_check'])&&$info['item18_check']=='yes')?'checked':''; ?> /></td>
                <td rowspan="2" valign="middle">$<input type="text" name="item18_amount" value="<?php echo isset($info['item18_amount'])?$info['item18_amount']:''; ?>" style="width:80%;" /></td>
                <td rowspan="2">&nbsp;</td>
                <td width="21%">Saddle Bags</td>
                    <td width="7%" align="center"><input type="checkbox" name="item19_check" value="yes" <?php echo (isset($info['item19_check'])&&$info['item19_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item19_amount" value="<?php echo isset($info['item19_amount'])?$info['item19_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td width="21%">Trunk</td>
                    <td width="7%" align="center"><input type="checkbox" name="item20_check" value="yes" <?php echo (isset($info['item20_check'])&&$info['item20_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item20_amount" value="<?php echo isset($info['item20_amount'])?$info['item20_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                 <tr>
                	<td width="21%">Tires</td>
                    <td width="7%" align="center"><input type="checkbox" name="item21_check" value="yes" <?php echo (isset($info['item21_check'])&&$info['item21_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item21_amount" value="<?php echo isset($info['item21_amount'])?$info['item21_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">Luggage Rack</td>
                    <td width="7%" align="center"><input type="checkbox" name="item22_check" value="yes" <?php echo (isset($info['item22_check'])&&$info['item22_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item22_amount" value="<?php echo isset($info['item22_amount'])?$info['item22_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td rowspan="3" valign="middle">Shocks<br/>RF__ LF__<br/>RR__ LR__</td>
                <td rowspan="3" valign="middle" align="center"><input type="checkbox" name="item23_check" value="yes" <?php echo (isset($info['item23_check'])&&$info['item23_check']=='yes')?'checked':''; ?> /></td>
                <td rowspan="3" valign="middle">$<input type="text" name="item23_amount" value="<?php echo isset($info['item23_amount'])?$info['item23_amount']:''; ?>" style="width:80%;" /></td>
                <td rowspan="3">&nbsp;</td>
                <td width="21%">Sissy Bar</td>
                    <td width="7%" align="center"><input type="checkbox" name="item24_check" value="yes" <?php echo (isset($info['item24_check'])&&$info['item24_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item24_amount" value="<?php echo isset($info['item24_amount'])?$info['item24_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td width="21%">Frame/Engine Guards</td>
                    <td width="7%" align="center"><input type="checkbox" name="item25_check" value="yes" <?php echo (isset($info['item25_check'])&&$info['item25_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item25_amount" value="<?php echo isset($info['item25_amount'])?$info['item25_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                <td width="21%">Handle Bar</td>
                    <td width="7%" align="center"><input type="checkbox" name="item26_check" value="yes" <?php echo (isset($info['item26_check'])&&$info['item26_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item26_amount" value="<?php echo isset($info['item26_amount'])?$info['item26_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Steering Head</td>
                    <td width="7%" align="center"><input type="checkbox" name="item27_check" value="yes" <?php echo (isset($info['item27_check'])&&$info['item17_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item27_amount" value="<?php echo isset($info['item27_amount'])?$info['item27_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td colspan="4" class="bg_color">&nbsp;</td>
                   
                </tr>
                
                
                 <tr>
                	<td width="21%">Brakes</td>
                    <td width="7%" align="center"><input type="checkbox" name="item28_check" value="yes" <?php echo (isset($info['item28_check'])&&$info['item28_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item28_amount" value="<?php echo isset($info['item28_amount'])?$info['item28_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">General Condition</td>
                    <td width="7%" align="center"><input type="checkbox" name="item29_check" value="yes" <?php echo (isset($info['item29_check'])&&$info['item29_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item29_amount" value="<?php echo isset($info['item29_amount'])?$info['item29_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                	<td width="21%">Exhaust</td>
                    <td width="7%" align="center"><input type="checkbox" name="item30_check" value="yes" <?php echo (isset($info['item30_check'])&&$info['item30_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item30_amount" value="<?php echo isset($info['item30_amount'])?$info['item30_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td width="21%">General Condition</td>
                    <td width="7%" align="center"><input type="checkbox" name="item31_check" value="yes" <?php echo (isset($info['item31_check'])&&$info['item31_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item31_amount" value="<?php echo isset($info['item31_amount'])?$info['item31_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                 <tr>
                	<td width="21%">Charging System</td>
                    <td width="7%" align="center"><input type="checkbox" name="item32_check" value="yes" <?php echo (isset($info['item32_check'])&&$info['item32_check']=='yes')?'checked':''; ?> /></td>
                    <td width="14%;" align="center">$<input type="text" name="item32_amount" value="<?php echo isset($info['item32_amount'])?$info['item32_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                    <td colspan="2"><b>Reconditioning Total</b></td>
                    
                    <td width="14%;" align="center">$<input type="text" name="item33_amount" value="<?php echo isset($info['item33_amount'])?$info['item33_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td rowspan="2" valign="middle">Engine<br/>5__4__3__2__1__</td>
                <td rowspan="2" valign="middle" align="center"><input type="checkbox" name="item34_check" value="yes" <?php echo (isset($info['item34_check'])&&$info['item34_check']=='yes')?'checked':''; ?> /></td>
                <td rowspan="2" valign="middle">$<input type="text" name="item34_amount" value="<?php echo isset($info['item34_amount'])?$info['item34_amount']:''; ?>" style="width:80%;" /></td>
                <td rowspan="2">&nbsp;</td>
                <td colspan="2">Motorcycle Average Value</td>
                    
                    <td width="14%;" align="center">$<input type="text" name="item35_amount" value="<?php echo isset($info['item35_amount'])?$info['item35_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                 <td colspan="2">Reconditioning</td>
                    <td width="14%;" align="center">$<input type="text" name="item36_amount" value="<?php echo isset($info['item36_amount'])?$info['item36_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                <td colspan="4" class="bg_color">&nbsp;</td>
                 <td colspan="2">Handling</td>
                    
                    <td width="14%;" align="center">$<input type="text" name="item37_amount" value="<?php echo isset($info['item37_amount'])?$info['item37_amount']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="4" rowspan="3">
                <label style="width:100%;text-align:center;text-decoration:underline;">Disposition</label><br/><br/>
                <span style="width:100%;display:inline;">
                Retail “As Is”  <input type="text" name="retail" value="<?php echo isset($info['retail'])?$info['retail']:''; ?>" style="width:60%;" />
                </span><br/>
                <span style="width:100%;display:inline;">
               Recondition  <input type="text" name="recondition" value="<?php echo isset($info['recondition'])?$info['recondition']:''; ?>" style="width:60%;" />
                </span><br/>
                <span style="width:100%;display:inline;">
               Wholesale  <input type="text" name="wholesale" value="<?php echo isset($info['wholesale'])?$info['wholesale']:''; ?>" style="width:60%;" />
                </span>
                
                </td>
                
                 <td colspan="2">Appraisal Value</td>
                   
                    <td  align="center">$<input type="text" name="appraisal_value" value="<?php echo isset($info['appraisal_value'])?$info['appraisal_value']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                
                <tr>
                <td colspan="2">Allowance</td>
                   
                    <td  align="center">$<input type="text" name="allowance" value="<?php echo isset($info['allowance'])?$info['allowance']:''; ?>" style="width:80%;" /></td>
                    <td width="6%">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="4" class="bg_color">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="4">Dealer <input type="text"  /></td>
                <td colspan="4">Appraiser <input type="text"  /></td>
                </tr>          
               </table> 
               <br/>
               <p style="text-align:center;"><strong>THIS TRADE-IN OFFER EXPIRES <input type="text" name="expiry_date" value="<?php echo isset($info['expiry_date'])?$info['expiry_date']:''; ?>"  /> AND IS EFFECTIVE ONLY IF THE MOTORCYCLE IS IN THE SAME CONDITION AS WHEN IT WAS INSPECTED.</strong></p> 
                 
                                              
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
