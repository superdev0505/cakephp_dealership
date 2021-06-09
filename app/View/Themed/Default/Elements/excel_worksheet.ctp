<div class="page-break"></div>
		<div class="wraper header"> 
        <?php //pr($contact); ?>
        <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		
             <table cellpadding="6" style="width:997px;">
             <tr>
             <td>CRM REF #<br/>
             	<input name="ref_num" type="text" style="width:150px" value="<?php echo $info['contact_id']; ?>" placeholder=""/>	
             </td>
             <td style="width:50%">
             <?php 
			 $custom_form_dealer_ids=array(1224, 829, 830,5000);
			 $dealer_id = AuthComponent::user('dealer_id');
			 if (in_array($dealer_id , $custom_form_dealer_ids))
			 {
				 $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/del-amo-ms-logo.png';

			 	echo $this->Html->image( $dealer_logo,array('style'=>'width:350px;height:110px;')); 
             }
			 ?>
             </td>
             <td>Salesman <br/>
             <input name="sperson" type="text" style="width:250px;" value="<?php echo $info['sperson']; ?>" placeholder=""/><br /><br />
             Source <br />
              	<input name="source" type="text" style="width:250px;" style="width:46%" value="<?php echo $info['source']; ?>" placeholder=""/>	<br /><br />
                Date
                <br />
                 <input name="date" type="text" style="width:250px;" value="<?php echo $expectedt; ?>" placeholder=""/>
                
              </td>
             </tr>
             </table>   
            
                 
            <br />
             <?php $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
$phone = preg_replace('/[^0-9]+/', '', $info['work_number']); 
$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
 ?>
  <span class="span15">Client name</span>
                <input type="text" class="input20" name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>" />
                  
                <span class="span15">Home Phone</span>
                <input type="text" class="input20" style="width:16%" name="phone" value="<?php echo $cleaned2; ?>" />
                <span class="span15" >Business Phone</span>
                <input type="text" class="input20" style="width:16%" name="work_number" value="<?php echo $cleaned3;  ?>" />
                <br />
                 <span class="span24">Street Address</span>
                <input type="text" class="input71" name="address" value="<?php echo $info['address']; ?>" /><br />
                <span class="span24">Email</span>
                <input type="text" class="input35" name="email" value="<?php echo $info['email']; ?>"   />
                <span class="span24" style="width:12%">Cell</span>
                <input type="text" class="input35" style="width:25%" name="mobile" value="<?php echo $cleaned1; ?>"   />
                <br />
                 <span class="span24"  >City</span>
                <input type="text" class="input35" style="width:22%" name="city" value="<?php echo $info['city']; ?>"   />
                <span class="span24" style="width:5%" >Zip</span>
                <input type="text" class="input35" style="width:22%" name="zip" value="<?php echo $info['zip']; ?>"  /> <span class="span24" style="width:15%" >&nbsp;</span>
                <br /> 
          <br /><br />
			<table style="width:997px;" cellpadding="5" bordercolor="#CCCCCC" border="1" ><tr><td colspan="9" align="center">Description Of Purchases</td></tr>
            <tr><td>
            <input type="radio" name="condition" value="New" <?php echo (isset($info['condition'])&& $info['condition']=='New')?'checked="checked"':''; ?> />&nbsp;New 
            <input type="radio"name="condition" value="Used" <?php echo (isset($info['condition'])&& $info['condition']=='Used')?'checked="checked"':''; ?>  />&nbsp;Used
            </td><td>Year</td>
            <td><input type="text" style="width:54px;" name="year" value="<?php echo $info['year']; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:140px;" name="make" value="<?php echo $info['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:152px;" name="model" value="<?php echo $info['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin" value="<?php echo $info['vin']; ?>" /></td></tr><?php
			$veh_checked2=(isset($info['condition2'])&&!empty($info['condition2']))?$info['condition2']:$addonVehicles[0]['AddonVehicle']['condition'];
			$veh_checked3=(isset($info['condition3'])&& !empty($info['condition3']))?$info['condition3']:$addonVehicles[1]['AddonVehicle']['condition'];
			
			 ?>
             <tr><td><input type="radio" name="condition2" value="New" <?php echo ($veh_checked2=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition2" value="Used" <?php echo ($veh_checked2=='Used')?'checked="checked"':''; ?> />&nbsp;Used</td>
            </td><td>Year</td>
            <td><input type="text" style="width:54px;" name="year2" value="<?php echo (isset($info['year2'])&& !empty($info['year2']))?$info['year2']:$addonVehicles[0]['AddonVehicle']['year']; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:140px;" name="make2" value="<?php echo (isset($info['make2'])&& !empty($info['make2']))?$info['make2']:$addonVehicles[0]['AddonVehicle']['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:152px;" name="model2" value="<?php echo (isset($info['model2'])&& !empty($info['model2']))?$info['model2']:$addonVehicles[0]['AddonVehicle']['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin2" value="<?php echo (isset($info['vin2'])&&!empty($info['vin2']))?$info['vin2']:$addonVehicles[0]['AddonVehicle']['vin']; ?>" /></td>
             </tr>
               <tr><td><input type="radio" name="condition3" value="New" <?php echo ($veh_checked3=='New')?'checked="checked"':''; ?> />&nbsp;New <input type="radio" name="condition3" value="Used" <?php echo ($veh_checked3=='Used')?'checked="checked"':''; ?> />&nbsp;Used</td>
            </td><td>Year</td>
            <td><input type="text" style="width:54px;" name="year3" value="<?php echo (isset($info['year3'])&& !empty($info['year3']))?$info['year3']:$addonVehicles[1]['AddonVehicle']['year']; ?>" />
            </td><td>Make</td>
            <td><input type="text" style="width:140px;" name="make3" value="<?php echo (isset($info['make3'])&&!empty($info['make3']))?$info['make3']:$addonVehicles[1]['AddonVehicle']['make']; ?>" /></td>
            <td>Model</td>
            <td><input type="text" style="width:152px;" name="model3" value="<?php echo (isset($info['model3'])&& !empty($info['model3']))?$info['model3']:$addonVehicles[1]['AddonVehicle']['model']; ?>" /></td>
            <td>VIN</td>
            <td><input type="text"  style="width:160px;" name="vin3" value="<?php echo (isset($info['vin3'])&& !empty($info['vin3']))?$info['vin3']:$addonVehicles[1]['AddonVehicle']['vin']; ?>" /></td>
             </tr></table>         						    
			
            <table class="left1" style="border-color:#CCC" cellpadding="6" >
            <tr><td></td><td>Unit 1</td><td>Unit 2</td><td>Unit 3</td></tr>
             <tr class="noprint">
             <td>No. of Axle</td>
              <td><?php
						echo $this->Form->input('axle_count1', array(
							'id' => "axle_count1",
							'name' => "axle_count1",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>$info['axle_count1']
						));
						?></td>
                         <td><?php
						echo $this->Form->input('axle_count2', array(
							'id' => "axle_count2",
							'name' => "axle_count2",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>$info['axle_count2']
						));
						?></td> <td><?php
						echo $this->Form->input('axle_count3', array(
							'id' => "axle_count3",
							'name' => "axle_count3",
							'type' => 'select',
							'options' => array('2' =>'2 Axle','4' => '2+ Axle'),
							'empty' => "No Axle",
							'class' => 'input-sm axle_count',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>$info['axle_count3']
						));
						?></td>
             </tr>
            
            <tr class="noprint"><td>Fixed Fee</td>
            <td><?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'1',
							'value'=>$info['fixed_fee_options']
						));
						?></td>
            <td><?php
						echo $this->Form->input('fixed_fee_options2', array(
							'id' => "fixed_fee_options2",
							'name' => "fixed_fee_options2",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'2',
							'value'=>$info['fixed_fee_options2']
						));
						?></td>
            <td><?php
						echo $this->Form->input('fixed_fee_options3', array(
							'id' => "fixed_fee_options3",
							'name' => "fixed_fee_options3",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:80px;',
							'data-id'=>'3',
							'value'=>$info['fixed_fee_options3']
						));
						?></td></tr>
            <tr><td>MSRP</td>
            <td>$<input type="text" name="msrp" class="msrp amount_input" value="<?php echo isset($info['msrp'])?$info['msrp']:$info['unit_value']; ?>" data-id="1" id="msrp1" style="width:68px;"/></td>
            <td>$<input type="text" name="msrp2"  class="msrp amount_input" data-id="2"  id="msrp2" value="<?php echo isset($info['msrp2'])?$info['msrp2']:'0.00'; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="msrp3" class="msrp amount_input" data-id="3"   id="msrp3" value="<?php echo isset($info['msrp3'])?$info['msrp3']:'0.00'; ?>"  style="width:68px;"/></td></tr>
            <tr><td>Freight</td>
            <td>$<input type="text" name="freight_fee" class="freight_fee amount_input" data-id="1"   id="freight_fee1" style="width:68px;" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee2" class="freight_fee amount_input" data-id="2" id="freight_fee2" style="width:68px;" value="<?php echo isset($info['freight_fee2'])?$info['freight_fee2']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee3" class="freight_fee amount_input" data-id="3" value="<?php echo isset($info['freight_fee3'])?$info['freight_fee3']:'0.00'; ?>" id="freight_fee3" style="width:68px;"/></td></tr>
            <tr><td>Preparation</td>
            <td>$<input type="text" name="prep_fee" class="prep_fee amount_input" data-id="1" id="prep_fee1" value="<?php echo isset($info['prep_fee'])?$info['prep_fee']:'0.00'; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="prep_fee2" class="prep_fee amount_input" data-id="2"  id="prep_fee2" value="<?php echo isset($info['prep_fee2'])?$info['prep_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="prep_fee3" class="prep_fee amount_input" data-id="3"  id="prep_fee3" value="<?php echo isset($info['prep_fee3'])?$info['prep_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Installed Equipment</td>
            <td>$<input type="text" name="parts_fee" class="parts_fee  amount_input" data-id="1" id="parts_fee1" value="<?php echo isset($info['parts_fee'])?$info['parts_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="parts_fee2" class="parts_fee amount_input" data-id="2" id="parts_fee2" value="<?php echo isset($info['parts_fee2'])?$info['parts_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="parts_fee3" class="parts_fee amount_input" data-id="3" id="parts_fee3" value="<?php echo isset($info['parts_fee3'])?$info['parts_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>DOC</td>
            <td>$<input type="text" name="doc_fee" class="doc_fee amount_input" data-id="1"  id="doc_fee1" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="doc_fee2" class="doc_fee amount_input" data-id="2"  id="doc_fee2" value="<?php echo isset($info['doc_fee2'])?$info['doc_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="doc_fee3" class="doc_fee amount_input" data-id="3"  id="doc_fee3" value="<?php echo isset($info['doc_fee3'])?$info['doc_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Subtotal</td>
            <td>$<input type="text" name="sub_total" class="sub_total amount_input" data-id="1"  id="sub_total1"  style="width:68px;" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
            <td>$<input type="text" name="sub_total2" class="sub_total amount_input" data-id="2" id="sub_total2" value="<?php echo isset($info['sub_total2'])?$info['sub_total2']:''; ?>"  style="width:68px;"/></td>
            <td>$<input type="text" name="sub_total3" class="sub_total amount_input" data-id="3" id="sub_total3" value="<?php echo isset($info['sub_total3'])?$info['sub_total3']:''; ?>"   style="width:68px;"/></td></tr>
            <tr><td>Sales Tax</td>
            <td>%<input type="text" name="tax_fee"  class="tax_fee amount_input" data-id="1" id="tax_fee1" value="<?php echo isset($info['tax_fee'])?$info['tax_fee']:''; ?>" style="width:68px;"/></td>
            <td>%<input type="text" name="tax_fee2"  class="tax_fee amount_input" data-id="2" id="tax_fee2" value="<?php echo isset($info['tax_fee2'])?$info['tax_fee2']:''; ?>" style="width:68px;"/></td>
            <td>%<input type="text" name="tax_fee3"  class="tax_fee amount_input" data-id="3" id="tax_fee3" value="<?php echo isset($info['tax_fee3'])?$info['tax_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>DMV</td>
            <td>$<input type="text" name="dmv_fee"  class="dmv_fee amount_input" data-id="1" id="dmv_fee1" value="<?php echo isset($info['dmv_fee'])?$info['dmv_fee']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="dmv_fee2" class="dmv_fee amount_input" data-id="2" id="dmv_fee2" value="<?php echo isset($info['dmv_fee2'])?$info['dmv_fee2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="dmv_fee3" class="dmv_fee amount_input" data-id="3" id="dmv_fee3" value="<?php echo isset($info['dmv_fee3'])?$info['dmv_fee3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>CA Tire Fee</td>
            <td>$<input type="text" name="tire_wheel_fee" class="tire_wheel_fee amount_input" data-id="1" value="<?php echo isset($info['tire_wheel_fee'])?$info['tire_wheel_fee']:''; ?>"  id="tire_wheel_fee1" style="width:68px;"/></td>
            <td>$<input type="text" name="tire_wheel_fee2" class="tire_wheel_fee amount_input" data-id="2" value="<?php echo isset($info['tire_wheel_fee2'])?$info['tire_wheel_fee2']:''; ?>"  id="tire_wheel_fee2" style="width:68px;"/></td>
            <td>$<input type="text" name="tire_wheel_fee3" class="tire_wheel_fee amount_input" data-id="3" value="<?php echo isset($info['tire_wheel_fee3'])?$info['tire_wheel_fee3']:''; ?>"  id="tire_wheel_fee3" style="width:68px;"/></td></tr>
            <tr><td>Total Cash Price</td>
            <td>$<input type="text" name="total_cash_price" class="total_cash_price amount_input" data-id="1"  id="total_cash_price1" style="width:68px;" value="<?php echo isset($info['total_cash_price'])?$info['total_cash_price']:''; ?>" /></td>
            <td>$<input type="text" name="total_cash_price2" class="total_cash_price amount_input" data-id="2" id="total_cash_price2" style="width:68px;" value="<?php echo isset($info['total_cash_price2'])?$info['total_cash_price2']:''; ?>" /></td>
            <td>$<input type="text" name="total_cash_price3" class="total_cash_price amount_input" data-id="3"  id="total_cash_price3" style="width:68px;" value="<?php echo isset($info['total_cash_price3'])?$info['total_cash_price3']:''; ?>" /></td></tr>
            <tr><td>Trade-In Allowance</td>
            <td>$<input type="text" name="trade_allowance" class="trade_allowance amount_input" data-id="1" value="<?php echo isset($info['trade_allowance'])?$info['trade_allowance']:''; ?>" id="trade_allowance1" style="width:68px;"/></td>
            <td>$<input type="text" name="trade_allowance2" class="trade_allowance amount_input" data-id="2" value="<?php echo isset($info['trade_allowance2'])?$info['trade_allowance2']:''; ?>" id="trade_allowance2" style="width:68px;"/></td>
            <td>$<input type="text" name="trade_allowance3" class="trade_allowance amount_input" data-id="3" value="<?php echo isset($info['trade_allowance3'])?$info['trade_allowance3']:''; ?>" id="trade_allowance3" style="width:68px;"/></td></tr>
            <tr><td>Less Payoff</td>
            <td>$<input type="text" name="less_payoff" class="less_payoff amount_input" data-id="1" id="less_payoff1" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="less_payoff2" class="less_payoff amount_input" data-id="2" id="less_payoff2" value="<?php echo isset($info['less_payoff2'])?$info['less_payoff2']:''; ?>" style="width:68px;"/></td>
            <td>$<input type="text" name="less_payoff3" class="less_payoff amount_input" data-id="3" id="less_payoff3" value="<?php echo isset($info['less_payoff3'])?$info['less_payoff3']:''; ?>" style="width:68px;"/></td></tr>
            <tr><td>Total Balance Due</td>
            <td>$<input type="text" name="amount" class="amount amount_input" data-id="1" id="amount1" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>"  style="width:68px;"/></td>
            <td>$<input type="text" name="amount2" class="amount amount_input" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" data-id="2" id="amount2" style="width:68px;"/></td>
            <td>$<input type="text" name="amount3" class="amount amount_input" data-id="3" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" id="amount3" style="width:68px;"/></td></tr>
            </table>
            
            <table class="right1" style="border-color:#CCC" cellpadding="6"><tr><td>Trade</td><td>Selling Price</td></tr>
            <tr>
            <td><table>
            <tr><td>Year</td><td>&nbsp;&nbsp;<input type="text" name="year_trade" value="<?php echo $info['year_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Make</td><td>&nbsp;&nbsp;<input type="text" name="make_trade" value="<?php echo $info['make_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Model</td><td>&nbsp;&nbsp;<input type="text" name="model_trade" value="<?php echo $info['model_trade']; ?>" style="width:68px;"/></td></tr>
            <tr><td>Mileage</td><td>&nbsp;&nbsp;<input type="text" name="odometer_trade" value="<?php echo $info['odometer_trade']; ?>"  style="width:68px;"/></td></tr>
            <tr><td>Payoff</td><td>$<input type="text" id="trade_payoff" name="trade_payoff" style="width:68px;" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" /></td></tr>
            </table></td>
            <td><table>
             <tr><td>Unit 1</td><td>$<input type="text" name="unit_value" class="amount_input" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" id="unit_value1" style="width:68px;"/></td></tr>
             <tr><td>Unit 2</td><td>$<input type="text" name="unit_value2" class="amount_input" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:''; ?>" id="unit_value2" style="width:68px;"/></td></tr>
              <tr><td>Unit 3</td><td>$<input type="text" name="unit_value3" class="amount_input" value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:''; ?>" id="unit_value3" style="width:68px;"/></td></tr>
            </table></td>            
            </tr>
             <tr><td class="blank_pad">&nbsp;</td><td>&nbsp;</td></tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr><td colspan="2"><table cellpadding="2"><tr><td colspan="2">Down Payment</td><td>APR %</td><td>Term(months)</td><td>Payment</td></tr>
             <tr><td>Unit 1</td><td>$<input type="text" name="down_payment" class="down_payment amount_input" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" id="down_payment1" style="width:80px;"/></td>
             <td><input type="text" name="loan_apr" class="loan_apr amount_input" value="<?php echo isset($info['loan_apr'])?$info['loan_apr']:''; ?>" data-id="1" id="loan_apr1" style="width:50px;" /></td>
             <td><span id="option_month_span1" class="print_month"><?php echo $selected_months[1]; ?></span><select name="payment_option1" class="form-control price_options" data-id="1" style="width:85px;;" id="option_price1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select></td>
            <td>$<input type="text" name="payment" class="amount_input" id="payment1" value="<?php echo isset($info['payment'])?$info['payment']:''; ?>" style="width:68px;"/></td>
             
             </tr>
            <tr><td>Unit 2</td><td>$<input type="text" name="down_payment2" class="down_payment amount_input" value="<?php echo isset($info['down_payment2'])?$info['down_payment2']:''; ?>" id="down_payment2" style="width:80px;"/></td>
            <td><input type="text" name="loan_apr2" value="<?php echo isset($info['loan_apr2'])?$info['loan_apr2']:''; ?>" class="loan_apr amount_input" id="loan_apr2" data-id="2" style="width:50px;" /></td>
             <td><span id="option_month_span2" class="print_month"><?php echo $selected_months[2]; ?></span><select name="payment_option2" class="form-control price_options" data-id="2" style="width:85px;;" id="option_price2"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select></td>
            <td>$<input type="text" name="payment2" class="amount_input" id="payment2" value="<?php echo isset($info['payment2'])?$info['payment2']:''; ?>" style="width:68px;"/></td>
            
            </tr>
            <tr><td>Unit 3</td><td>$<input type="text" name="down_payment3" class="down_payment amount_input" value="<?php echo isset($info['down_payment3'])?$info['down_payment3']:''; ?>" id="down_payment3" style="width:80px;"/></td>
            <td><input type="text" name="loan_apr3" value="<?php echo isset($info['loan_apr3'])?$info['loan_apr3']:''; ?>" class="loan_apr amount_input" id="loan_apr3" data-id="3" style="width:50px;" /></td>

              <td><span id="option_month_span3" class="print_month"><?php echo $selected_months[3]; ?></span><select name="payment_option3" class="form-control price_options" data-id="3" style="width:85px;;" id="option_price3"></select></td>
            <td>$<input type="text" name="payment3" id="payment3" value="<?php echo isset($info['payment3'])?$info['payment3']:''; ?>" style="width:68px;" class="amount_input" /></td>
            
            </tr>
            <tr><td>Total</td><td>$<input type="text" name="total_down_payment" value="<?php echo isset($info['total_down_payment'])?$info['total_down_payment']:''; ?>" id="total_down_payment" class="amount_input" style="width:80px;"/></td></tr>
         <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                   
            </tr>
            </table></td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
           
            </table>
            <br /><br />
            <span class="full">This menu is provided to you, our customer, to assist you in better understanding the financial options available. Amounts above are ESTIMATES ONLY and may vary based on approved credit, applicable taxes, vehicle selection, trade value(s), estimated payoff, eligibility for rebates and other factors particular to your transaction. Final payments and terms may vary. Customer agrees to pay the difference, if any, in the amount of the trade lien payoff. This is NOT a contract and it is to be used for illustration purposes only.</span>
            <br/><br />
            <span class="span24">Client Approval</span>
                <input type="text" class="input20" name="first_name" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" />
                <span class="span24">Dealership Representative</span>
                <input type="text" class="input20" name="sperson" value="<?php echo $info['sperson']; ?>" /> <br/>
           <br /> Signature X<input type="text" class="input35" name="" value="" />     

		</div>
		<!---left1-->
	
		<!-- no print buttons end -->
