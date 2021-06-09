<div class="page-break"></div>
<style>
@media print {
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	.print_month
	{
		display:block;
	}
	.blank_pad{
	padding:0px;
}
input[type="text"]{
height : 24px!important;
border:none;
border-bottom:1px solid #000;

}
}
</style>
<?php 
$dealer_id = AuthComponent::user('dealer_id');
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
				
				<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />

								<div id="clientInfo">
									<h3><?php echo $dealer_address_info['User']['dealer']; ?></h3>
									<p><?php echo $dealer_address_info['User']['d_address']; ?><br>
										<?php echo $dealer_address_info['User']['d_city']; ?>, <?php echo $dealer_address_info['User']['d_state']; ?> <?php echo $dealer_address_info['User']['d_zip']; ?><br>
										<strong>Phone:</strong> <?php echo $dealer_address_info['User']['d_phone']; ?><br>
										<strong>Fax:</strong> <?php echo $dealer_address_info['User']['d_fax']; ?><br>
										<strong>Web:</strong> <?php echo $dealer_address_info['User']['d_website']; ?><br>
										<strong>Email:<strong> <?php echo $dealer_address_info['User']['d_email'] ?>
								</div>

            <h2 style="text-align:center;padding:20px;">
            <?php $dealer_logo=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_id.'/dealer-logo.png';
			echo $this->Html->image( $dealer_logo,array('style'=>'width:125px;height:80px;'));
			 ?>
           </h2>


            <table style="width:100%">
            <tr>
            <td width="50%" style="padding:5px;">
            <h2 style="padding:10px;text-align:center"><i>PREFERRED CUSTOMER PLAN</i></h2><br/>
             <span class="span15">Date</span>
                 <input name="date" type="text" class="input20" style="width:84%;" value="<?php echo isset($info['date'])?$info['date']:$expectedt; ?>" placeholder=""/><br /><br/>
                <span class="span15">Salesman</span>
             <input name="sperson" type="text" class="input20" style="width:84%;" value="<?php echo $info['sperson']; ?>" placeholder=""/> <br /><br/>
             <h4 style="padding:10px;">CUSTOMER INFORMATION</h4>
              <span class="span15">Name</span>
               <input type="text" class="input20" style="width:84%;" name="name" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>" /><br/>
               <br/><span class="span15">Address</span>
                <input type="text" class="input71" style="width:84%" name="address" value="<?php echo $info['address']; ?>" /><br/><br/>

                <span class="span15" >City</span>
                <input type="text" class="input35" style="width:30%" name="city" value="<?php echo $info['city']; ?>"   />
                <span class="span15" style="width:7%" >State</span>
                 <input type="text" class="input35" style="width:20%" name="state" value="<?php echo $info['state']; ?>"   />
                <span class="span24" style="width:5%" >Zip</span>
                <input type="text" class="input35" style="width:18%" name="zip" value="<?php echo $info['zip']; ?>"  /> <br /><br/>
                <span class="span15" style="width:21%">Home Phone</span>
                <input type="text" class="input20" style="width:27%" name="phone" value="<?php echo $cleaned2; ?>" />
                <span class="span15" style="width:19%">Work Phone</span>
                <input type="text" class="input20" style="width:29%" name="work_number" value="<?php echo $cleaned3;  ?>" /><br /><br />

                 <span class="span15" style="width:10%">Mobile</span>
                <input type="text" class="input20" style="width:24%" name="mobile" value="<?php echo $cleaned1; ?>" />
                <span class="span15" style="width:10%">Email</span>
                    <input type="text" class="input35" style="width:52%" name="email" value="<?php echo $info['email']; ?>"   />




            </td>
            <td width="50%">
            <div style="width:100%;border:2px solid #000;padding:3px;">
            <h3 style="text-align:center">TRADE INFORMATION</h3><br/>
             <span class="span15" style="width:7%">Year</span>
                <input type="text" class="input35" style="width:20%" name="year_trade" value="<?php echo $info['year_trade']; ?>"   />
                <span class="span15" style="width:7%" >Make</span>
                 <input type="text" class="input35" style="width:20%" name="make_trade" value="<?php echo $info['make_trade']; ?>"   />
                <span class="span24" style="width:8%" >Model</span>
                <input type="text" class="input35" style="width:33%" name="model_trade" value="<?php echo $info['model_trade']; ?>"  /> <br />
                 <span class="span15" style="width:5%">Vin</span>
                <input type="text" class="input20" style="width:47%" name="vin_trade" value="<?php echo $info['vin_trade']; ?>" />
                <span class="span15">Mileage/hr</span>
                <input type="text" class="input20" style="width:30%" name="trade_odometer" value="<?php echo $info['trade_odometer'];  ?>" /><br />
                 <span class="span15">Leinholder</span>
               <input type="text" class="input20" style="width:80%" name="leinholder" value="<?php echo $info['leinholder'];  ?>" /><br />
                <span class="span15" style="width:20%">Trade Value</span>
                <input type="text" class="input20 trade_value" style="width:27%" name="trade_value" value="<?php echo $info['trade_value']; ?>" />
                <span class="span15" style="width:20%">Trade Payoff</span>
                <input type="text" class="input20 trade_payoff" style="width:28%" name="trade_payoff" value="<?php echo $info['trade_payoff'];  ?>" /><br /><br/><br/>

                <?php // Second trade unit ?>
                <span class="span15" style="width:7%">Year</span>
                <input type="text" class="input35" style="width:20%" name="trade_year2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['year']))?$addonTradeVehicles[0]['AddonTradeVehicle']['year']:''; ?>"   />
                <span class="span15" style="width:7%" >Make</span>
                 <input type="text" class="input35" style="width:20%" name="trade_make2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['make']))?$addonTradeVehicles[0]['AddonTradeVehicle']['make']:''; ?>"   />
                <span class="span24" style="width:8%" >Model</span>
                <input type="text" class="input35" style="width:33%" name="trade_model2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['model']))?$addonTradeVehicles[0]['AddonTradeVehicle']['model']:''; ?>"  /> <br />
                 <span class="span15" style="width:5%">Vin</span>
                <input type="text" class="input20" style="width:47%" name="trade_vin2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['vin']))?$addonTradeVehicles[0]['AddonTradeVehicle']['vin']:''; ?>" />
                <span class="span15">Mileage/hr</span>
                <input type="text" class="input20" style="width:30%" name="trade_odometer2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['odometer']))?$addonTradeVehicles[0]['AddonTradeVehicle']['odometer']:''; ?>" /><br />
                 <span class="span15">Leinholder</span>
               <input type="text" class="input20" style="width:80%" name="leinholder2" value="<?php echo $info['leinholder2'];  ?>" /><br />
              <span class="span15" style="width:20%">Trade Value</span>
                <input type="text" class="input20 trade_value" style="width:27%" name="trade_value2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['unit_value']))?$addonTradeVehicles[0]['AddonTradeVehicle']['unit_value']:''; ?>" />
                <span class="span15" style="width:20%">Trade Payoff</span>
                <input type="text" class="input20 trade_payoff" style="width:28%" name="trade_payoff2" value="<?php echo $info['trade_payoff2'];  ?>" /><br /><br/><br/>

                <?php // Third Trade Unit ?>
                <span class="span15" style="width:7%">Year</span>
                <input type="text" class="input35" style="width:20%" name="trade_year3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['year']))?$addonTradeVehicles[1]['AddonTradeVehicle']['year']:''; ?>"   />
                <span class="span15" style="width:7%" >Make</span>
                 <input type="text" class="input35" style="width:20%" name="trade_make3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['make']))?$addonTradeVehicles[1]['AddonTradeVehicle']['make']:''; ?>"   />
                <span class="span24" style="width:8%" >Model</span>
                <input type="text" class="input35" style="width:33%" name="trade_model3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['model']))?$addonTradeVehicles[1]['AddonTradeVehicle']['model']:''; ?>"  /> <br />
                 <span class="span15" style="width:5%">Vin</span>
                <input type="text" class="input20" style="width:47%" name="trade_vin3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['vin']))?$addonTradeVehicles[1]['AddonTradeVehicle']['vin']:''; ?>" />
                <span class="span15">Mileage/hr</span>
                <input type="text" class="input20" style="width:30%" name="trade_odometer3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['odometer']))?$addonTradeVehicles[1]['AddonTradeVehicle']['odometer']:''; ?>" /><br />
                 <span class="span15">Leinholder</span>
               <input type="text" class="input20" style="width:80%" name="leinholder3" value="<?php echo $info['leinholder3'];  ?>" /><br />
                <span class="span15" style="width:20%">Trade Value</span>
                <input type="text" class="input20 trade_value" style="width:27%" name="trade_value3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['unit_value']))?$addonTradeVehicles[1]['AddonTradeVehicle']['unit_value']:''; ?>" />
                <span class="span15" style="width:20%">Trade Payoff</span>
                <input type="text" class="input20 trade_payoff" style="width:28%" name="trade_payoff3" value="<?php echo $info['trade_payoff3'];  ?>" />
            </div>

            </td>
            </tr>
            </table>


            <table cellpadding="4" style="width:100%" border="2" bordercolor="#000">
            <tr>
            <td width="100%">
            <input type="hidden" name="condition" value="<?php echo $info['condition']; ?>" />
            <span class="span15" style="width:8%">Sug. Retail</span>
            <input type="text" class="input20 suggest_price" style="width:10%" name="unit_value" value="<?php echo $info['unit_value']; ?>" />
             <span class="span15" style="width:7%">Stock#</span>
             <input type="text" class="input20" style="width:10%" name="stock_num" value="<?php echo $info['stock_num']; ?>" />
              <span class="span15" style="width:4%">Year</span>
             <input type="text" class="input20" style="width:7%" name="year" value="<?php echo $info['year']; ?>" />
             <span class="span15" style="width:5%">Make</span>
             <input type="text" class="input20" style="width:15%" name="make" value="<?php echo $info['make']; ?>" />
              <span class="span15" style="width:5%">Model</span>
             <input type="text" class="input20" style="width:24%" name="model" value="<?php echo $info['model']; ?>" /><br/>
             <span class="span15" style="width:8%">Your Price</span>
            <input type="text" class="input20 your_price" style="width:10%" name="your_price" value="<?php echo $info['your_price']; ?>" />
            <span class="span15" style="width:7%">Vin#</span>
            <input type="text" class="input20" style="width:22%" name="vin" value="<?php echo $info['vin']; ?>" />
            <span class="span15" style="width:10%">Mileage/hr</span>
            <input type="text" class="input20" style="width:10%" name="odometer" value="<?php echo $info['odometer']; ?>" />
            <span class="span15" style="width:4%">HP</span>
            <input type="text" class="input20" style="width:10%" name="hp" value="<?php echo $info['hp']; ?>" />
             <span class="span15" style="width:5%">Length</span>
            <input type="text" class="input20" style="width:6%" name="length" value="<?php echo $info['length']; ?>" /> <span class="span15" style="width:2%">FT.</span>

            </td>
            </tr>

            <tr>
            <td width="100%">
            <input type="hidden" name="condition" value="<?php echo $veh_checked2; ?>" />
            <span class="span15" style="width:8%">Sug. Retail</span>
            <input type="text" class="input20 suggest_price" style="width:10%" name="unit_value2" value="<?php echo $addonVehicles[0]['AddonVehicle']['unit_value']; ?>" />
             <span class="span15" style="width:7%">Stock#</span>
             <input type="text" class="input20" style="width:10%" name="stock_num2" value="<?php echo $addonVehicles[0]['AddonVehicle']['stock_num']; ?>" />
              <span class="span15" style="width:4%">Year</span>
             <input type="text" class="input20" style="width:7%" name="year2" value="<?php echo (isset($addonVehicles[0]['AddonVehicle']['year']))?$addonVehicles[0]['AddonVehicle']['year']:''; ?>" />
             <span class="span15" style="width:5%">Make</span>
             <input type="text" class="input20" style="width:15%" name="make2" value="<?php echo $addonVehicles[0]['AddonVehicle']['make']; ?>" />
              <span class="span15" style="width:5%">Model</span>
             <input type="text" class="input20" style="width:24%" name="model2" value="<?php echo $addonVehicles[0]['AddonVehicle']['model']; ?>" /><br/>
             <span class="span15" style="width:8%">Your Price</span>
            <input type="text" class="input20 your_price" style="width:10%" name="your_price2" value="<?php echo $info['your_price2']; ?>" />
            <span class="span15" style="width:7%">Vin#</span>
            <input type="text" class="input20" style="width:22%" name="vin2" value="<?php echo $addonVehicles[0]['AddonVehicle']['vin']; ?>" />
            <span class="span15" style="width:10%">Mileage/hr</span>
            <input type="text" class="input20" style="width:10%" name="odometer2" value="<?php echo $addonVehicles[0]['AddonVehicle']['odometer']; ?>" />
            <span class="span15" style="width:4%">HP</span>
            <input type="text" class="input20" style="width:10%" name="hp2" value="<?php echo $addonVehicles[0]['AddonVehicle']['hp']; ?>" />
             <span class="span15" style="width:5%">Length</span>
            <input type="text" class="input20" style="width:6%" name="length2" value="<?php echo $addonVehicles[0]['AddonVehicle']['length']; ?>" /> <span class="span15" style="width:2%">FT.</span>

            </td>
            </tr>

            <tr>
            <td width="100%">
            <input type="hidden" name="condition" value="<?php echo $veh_checked2; ?>" />
            <span class="span15" style="width:8%">Sug. Retail</span>
            <input type="text" class="input20 suggest_price" style="width:10%" name="unit_value3" value="<?php echo $addonVehicles[1]['AddonVehicle']['unit_value']; ?>" />
             <span class="span15" style="width:7%">Stock#</span>
             <input type="text" class="input20" style="width:10%" name="stock_num3" value="<?php echo $addonVehicles[1]['AddonVehicle']['stock_num']; ?>" />
              <span class="span15" style="width:4%">Year</span>
             <input type="text" class="input20" style="width:7%" name="year3" value="<?php echo (isset($addonVehicles[1]['AddonVehicle']['year']))?$addonVehicles[1]['AddonVehicle']['year']:''; ?>" />
             <span class="span15" style="width:5%">Make</span>
             <input type="text" class="input20" style="width:15%" name="make3" value="<?php echo $addonVehicles[1]['AddonVehicle']['make']; ?>" />
              <span class="span15" style="width:5%">Model</span>
             <input type="text" class="input20" style="width:24%" name="model3" value="<?php echo $addonVehicles[1]['AddonVehicle']['model']; ?>" /><br/>
             <span class="span15" style="width:8%">Your Price</span>
            <input type="text" class="input20 your_price" style="width:10%" name="your_price3" value="<?php echo $info['your_price3']; ?>" />
            <span class="span15" style="width:7%">Vin#</span>
            <input type="text" class="input20" style="width:22%" name="vin3" value="<?php echo $addonVehicles[1]['AddonVehicle']['vin']; ?>" />
            <span class="span15" style="width:10%">Mileage/hr</span>
            <input type="text" class="input20" style="width:10%" name="odometer3" value="<?php echo $addonVehicles[1]['AddonVehicle']['odometer']; ?>" />
            <span class="span15" style="width:4%">HP</span>
            <input type="text" class="input20" style="width:10%" name="hp3" value="<?php echo $addonVehicles[1]['AddonVehicle']['hp']; ?>" />
             <span class="span15" style="width:5%">Length</span>
            <input type="text" class="input20" style="width:6%" name="length3" value="<?php echo $addonVehicles[1]['AddonVehicle']['length']; ?>" /> <span class="span15" style="width:2%">FT.</span>

            </td>
            </tr>


            </table>
            <br/>
			<table style="width:100%" cellpadding="4" border="2" bordercolor="#000;">
            <tr>
            <td width="50%">
            <table width="100%">
             <?php
			if(!empty($addonVehicles[1]['AddonVehicle']['unit_value']))
			$info['unit_value'] += $addonVehicles[1]['AddonVehicle']['unit_value'] ;
			if(!empty($addonVehicles[0]['AddonVehicle']['unit_value']))
			$info['unit_value'] += $addonVehicles[0]['AddonVehicle']['unit_value'] ;

			$your_price = $info['unit_value'];
			if(!empty($info['savings']))
			$your_price = $your_price - $info['savings'];
			?>
            <tr>
            <td width="70%">Suggested Retail</td>
            <td width="30%" align="right">$<input type="text" name="combine_unit_value" id="combine_unit_value"  value="<?php echo isset($info['combine_unit_value'])?$info['combine_unit_value']:$info['unit_value']; ?>" data-id="1" style="width:90px;"/></td>
          <?php /*?>  <td>$<input type="text" name="unit_value2"   data-id="2" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="unit_value3" data-id="3"  value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:'0.00'; ?>"  style="width:90px;"/></td>  <?php */?>
            </tr>
             <tr>
            <td>Savings</td>
            <td align="right">$<input type="text" name="savings" id="combine_savings"  value="<?php echo isset($info['savings'])?$info['savings']:$info['savings']; ?>" data-id="1" style="width:90px;"/></td>
          <?php /*?>  <td>$<input type="text" name="savings2"   data-id="2" value="<?php echo isset($info['savings2'])?$info['savings2']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="savings2" data-id="3"  value="<?php echo isset($info['savings3'])?$info['savings3']:'0.00'; ?>"  style="width:90px;"/></td>    <?php */?>
            </tr>


            <?php /*?> <tr class="noprint">
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
							'style' =>'margin-bottom: 0;width:100px;',
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
							'style' =>'margin-bottom: 0;width:100px;',
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
							'style' =>'margin-bottom: 0;width:100px;',
							'data-id'=>'3',
							'value'=>$info['axle_count3']
						));
						?></td>
             </tr>
            <?php */?>
            <tr class="noprint"><td>Fixed Fee</td>
            <td align="right"><?php
						echo $this->Form->input('fixed_fee_options', array(
							'id' => "fixed_fee_options1",
							'name' => "fixed_fee_options",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:90px;',
							'data-id'=>'1',
							'value'=>$info['fixed_fee_options']
						));
						?></td>
           <?php /*?> <td><?php
						echo $this->Form->input('fixed_fee_options2', array(
							'id' => "fixed_fee_options2",
							'name' => "fixed_fee_options2",
							'type' => 'select',
							'options' => $selected_type_condition,
							'empty' => "Select",
							'class' => 'input-sm fixed_fee_options',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0;width:100px;',
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
							'style' =>'margin-bottom: 0;width:100px;',
							'data-id'=>'3',
							'value'=>$info['fixed_fee_options3']
						));
						?></td><?php */?>

                        </tr>
            <tr><td>Your Price</td>
            <td align="right">$<input type="text" name="combine_price" class="msrp amount_input" value="<?php echo isset($info['combine_price'])?$info['combine_price']:$info['unit_value']; ?>" data-id="1" id="msrp1" style="width:90px;"/></td>
           <?php /*?> <td>$<input type="text" name="msrp2"  class="msrp amount_input" data-id="2"  id="msrp2" value="<?php echo isset($info['msrp2'])?$info['msrp2']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="msrp3" class="msrp amount_input" data-id="3"   id="msrp3" value="<?php echo isset($info['msrp3'])?$info['msrp3']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>
             <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc1_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc1_name'])?$info['acc1_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc11" class="acc1 accs amount_input" value="<?php echo isset($info['acc1'])?$info['acc11']:$info['acc11']; ?>" data-id="1" id="acc11" style="width:90px;"/></td>

           <?php /*?> <td>$<input type="text" name="acc21"  class="acc1 accs amount_input" data-id="2"  id="acc21" value="<?php echo isset($info['acc21'])?$info['acc21']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc31" class="acc1 accs amount_input" data-id="3"   id="acc31" value="<?php echo isset($info['acc31'])?$info['acc31']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>

            </tr>

             <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc2_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc2_name'])?$info['acc2_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc12" class="acc2 accs amount_input" value="<?php echo isset($info['acc12'])?$info['acc12']:$info['acc12']; ?>" data-id="1" id="acc12" style="width:90px;"/></td>
           <?php /*?> <td>$<input type="text" name="acc22"  class="acc2 accs amount_input" data-id="2"  id="acc22" value="<?php echo isset($info['acc22'])?$info['acc22']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc32" class="acc2 accs amount_input" data-id="3"   id="acc32" value="<?php echo isset($info['acc32'])?$info['acc32']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>
             <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc3_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc3_name'])?$info['acc3_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc13" class="acc3 accs amount_input" value="<?php echo isset($info['acc13'])?$info['acc13']:$info['acc13']; ?>" data-id="1" id="acc13" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="acc23"  class="acc3 accs amount_input" data-id="2"  id="acc23" value="<?php echo isset($info['acc23'])?$info['acc23']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc33" class="acc3 accs amount_input" data-id="3"   id="acc33" value="<?php echo isset($info['acc33'])?$info['acc33']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>
            <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc4_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc4_name'])?$info['acc4_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc14" class="acc4 accs amount_input" value="<?php echo isset($info['acc14'])?$info['acc14']:$info['acc14']; ?>" data-id="1" id="acc14" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="acc24"  class="acc4 accs amount_input" data-id="2"  id="acc24" value="<?php echo isset($info['acc24'])?$info['acc24']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc34" class="acc4 accs amount_input" data-id="3"   id="acc34" value="<?php echo isset($info['acc34'])?$info['acc34']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>
             <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc5_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc5_name'])?$info['acc5_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc15" class="acc5 accs amount_input" value="<?php echo isset($info['acc15'])?$info['acc15']:$info['acc15']; ?>" data-id="1" id="acc15" style="width:90px;"/></td>
           <?php /*?> <td>$<input type="text" name="acc25"  class="acc5 accs amount_input" data-id="2"  id="acc25" value="<?php echo isset($info['acc25'])?$info['acc25']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc35" class="acc5 accs amount_input" data-id="3"   id="acc35" value="<?php echo isset($info['acc35'])?$info['acc35']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>
            <tr><td>ACCS&nbsp;&nbsp;<input type="text" name="acc6_name" style="display:inline;width:80%;" value="<?php echo isset($info['acc6_name'])?$info['acc6_name']:''; ?>" /></td>
            <td align="right">$<input type="text" name="acc16" class="acc6 accs amount_input" value="<?php echo isset($info['acc16'])?$info['acc16']:$info['acc16']; ?>" data-id="1" id="acc16" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="acc26"  class="acc6 accs amount_input" data-id="2"  id="acc26" value="<?php echo isset($info['acc26'])?$info['acc26']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="acc36" class="acc6 accs amount_input" data-id="3"   id="acc36" value="<?php echo isset($info['acc36'])?$info['acc36']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>

             <tr><td>Labor</td>
            <td align="right">$<input type="text" name="labor1" class="labor  amount_input" value="<?php echo isset($info['labor1'])?$info['labor1']:$info['labor1']; ?>" data-id="1" id="labor1" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="labor2"  class="labor amount_input" data-id="2"  id="labor2" value="<?php echo isset($info['labor2'])?$info['labor2']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="labor3" class="labor amount_input" data-id="3"   id="labor3" value="<?php echo isset($info['labor3'])?$info['labor3']:'0.00'; ?>"  style="width:90px;"/></td><?php */?>
            </tr>

            <tr><td>Trade Value</td>
            <td align="right">$<input type="text" name="trade_value" class="amount_input" value="<?php echo isset($info['trade_value'])?$info['trade_value']:$info['trade_value']; ?>" data-id="1" id="trade_value" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="trade_value2"  class="trade_value amount_input" data-id="2"  id="trade_value2" value="<?php echo (isset($addonTradeVehicles[0]['AddonTradeVehicle']['unit_value']))?$addonTradeVehicles[0]['AddonTradeVehicle']['unit_value']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="trade_value3" class="trade_value3 amount_input" data-id="3"   id="trade_value3" value="<?php echo (isset($addonTradeVehicles[1]['AddonTradeVehicle']['unit_value']))?$addonTradeVehicles[1]['AddonTradeVehicle']['unit_value']:''; ?>"  style="width:90px;"/></td><?php */?>
            </tr>


    <?php /*?>        <tr><td>Freight</td>
            <td>$<input type="text" name="freight_fee" class="freight_fee amount_input" data-id="1"   id="freight_fee1" style="width:90px;" value="<?php echo isset($info['freight_fee'])?$info['freight_fee']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee2" class="freight_fee amount_input" data-id="2" id="freight_fee2" style="width:90px;" value="<?php echo isset($info['freight_fee2'])?$info['freight_fee2']:''; ?>" /></td>
            <td>$<input type="text" name="freight_fee3" class="freight_fee amount_input" data-id="3" value="<?php echo isset($info['freight_fee3'])?$info['freight_fee3']:'0.00'; ?>" id="freight_fee3" style="width:90px;"/></td></tr>
            <tr><td>Preparation</td>
            <td>$<input type="text" name="prep_fee" class="prep_fee amount_input" data-id="1" id="prep_fee1" value="<?php echo isset($info['prep_fee'])?$info['prep_fee']:'0.00'; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="prep_fee2" class="prep_fee amount_input" data-id="2"  id="prep_fee2" value="<?php echo isset($info['prep_fee2'])?$info['prep_fee2']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="prep_fee3" class="prep_fee amount_input" data-id="3"  id="prep_fee3" value="<?php echo isset($info['prep_fee3'])?$info['prep_fee3']:''; ?>" style="width:90px;"/></td></tr>
            <tr><td>Installed Equipment</td>
            <td>$<input type="text" name="parts_fee" class="parts_fee  amount_input" data-id="1" id="parts_fee1" value="<?php echo isset($info['parts_fee'])?$info['parts_fee']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="parts_fee2" class="parts_fee amount_input" data-id="2" id="parts_fee2" value="<?php echo isset($info['parts_fee2'])?$info['parts_fee2']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="parts_fee3" class="parts_fee amount_input" data-id="3" id="parts_fee3" value="<?php echo isset($info['parts_fee3'])?$info['parts_fee3']:''; ?>" style="width:90px;"/></td></tr>
            <tr><td>DOC</td>
            <td>$<input type="text" name="doc_fee" class="doc_fee amount_input" data-id="1"  id="doc_fee1" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="doc_fee2" class="doc_fee amount_input" data-id="2"  id="doc_fee2" value="<?php echo isset($info['doc_fee2'])?$info['doc_fee2']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="doc_fee3" class="doc_fee amount_input" data-id="3"  id="doc_fee3" value="<?php echo isset($info['doc_fee3'])?$info['doc_fee3']:''; ?>" style="width:90px;"/></td></tr><?php */?>
            <tr><td>Subtotal</td>
            <td align="right">$<input type="text" name="sub_total" class="sub_total amount_input" data-id="1"  id="sub_total1"  style="width:90px;" value="<?php echo isset($info['sub_total'])?$info['sub_total']:''; ?>" /></td>
           <?php /*?> <td>$<input type="text" name="sub_total2" class="sub_total amount_input" data-id="2" id="sub_total2" value="<?php echo isset($info['sub_total2'])?$info['sub_total2']:''; ?>"  style="width:90px;"/></td>
            <td>$<input type="text" name="sub_total3" class="sub_total amount_input" data-id="3" id="sub_total3" value="<?php echo isset($info['sub_total3'])?$info['sub_total3']:''; ?>"   style="width:90px;"/></td><?php */?>

            </tr>
            <tr><td>Sales Tax</td>
            <td align="right">%<input type="text" name="tax_fee"  class="tax_fee amount_input" data-id="1" id="tax_fee1" value="<?php echo isset($info['tax_fee'])?$info['tax_fee']:''; ?>" style="width:90px;"/></td>
           <?php /*?> <td>%<input type="text" name="tax_fee2"  class="tax_fee amount_input" data-id="2" id="tax_fee2" value="<?php echo isset($info['tax_fee2'])?$info['tax_fee2']:''; ?>" style="width:90px;"/></td>
            <td>%<input type="text" name="tax_fee3"  class="tax_fee amount_input" data-id="3" id="tax_fee3" value="<?php echo isset($info['tax_fee3'])?$info['tax_fee3']:''; ?>" style="width:90px;"/></td><?php */?>
            </tr>
           <?php /*?> <tr><td>DMV</td>
            <td>$<input type="text" name="dmv_fee"  class="dmv_fee amount_input" data-id="1" id="dmv_fee1" value="<?php echo isset($info['dmv_fee'])?$info['dmv_fee']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="dmv_fee2" class="dmv_fee amount_input" data-id="2" id="dmv_fee2" value="<?php echo isset($info['dmv_fee2'])?$info['dmv_fee2']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="dmv_fee3" class="dmv_fee amount_input" data-id="3" id="dmv_fee3" value="<?php echo isset($info['dmv_fee3'])?$info['dmv_fee3']:''; ?>" style="width:90px;"/></td></tr><?php */?>
            <tr><td>Title/UCC fee</td>
            <td align="right">$<input type="text" name="tire_wheel_fee" class="tire_wheel_fee amount_input" data-id="1" value="<?php echo isset($info['tire_wheel_fee'])?$info['tire_wheel_fee']:''; ?>"  id="tire_wheel_fee1" style="width:90px;"/></td>
            <?php /*?><td>$<input type="text" name="tire_wheel_fee2" class="tire_wheel_fee amount_input" data-id="2" value="<?php echo isset($info['tire_wheel_fee2'])?$info['tire_wheel_fee2']:''; ?>"  id="tire_wheel_fee2" style="width:90px;"/></td>
            <td>$<input type="text" name="tire_wheel_fee3" class="tire_wheel_fee amount_input" data-id="3" value="<?php echo isset($info['tire_wheel_fee3'])?$info['tire_wheel_fee3']:''; ?>"  id="tire_wheel_fee3" style="width:90px;"/></td><?php */?>

            </tr>
            <tr><td>Total Cash Price</td>
            <td align="right">$<input type="text" name="total_cash_price" class="total_cash_price amount_input" data-id="1"  id="total_cash_price1" style="width:90px;" value="<?php echo isset($info['total_cash_price'])?$info['total_cash_price']:''; ?>" /></td>
            <?php /*?><td>$<input type="text" name="total_cash_price2" class="total_cash_price amount_input" data-id="2" id="total_cash_price2" style="width:90px;" value="<?php echo isset($info['total_cash_price2'])?$info['total_cash_price2']:''; ?>" /></td>
            <td>$<input type="text" name="total_cash_price3" class="total_cash_price amount_input" data-id="3"  id="total_cash_price3" style="width:90px;" value="<?php echo isset($info['total_cash_price3'])?$info['total_cash_price3']:''; ?>" /></td><?php */?>

            </tr>
            <tr><td>Down Payment</td>
            <td align="right">$<input type="text" name="down_payment" class="down_payment amount_input" data-id="1" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" id="down_payment1" style="width:90px;"/></td>
           <?php /*?> <td>$<input type="text" name="trade_allowance2" class="trade_allowance amount_input" data-id="2" value="<?php echo isset($info['trade_allowance2'])?$info['trade_allowance2']:''; ?>" id="trade_allowance2" style="width:90px;"/></td>
            <td>$<input type="text" name="trade_allowance3" class="trade_allowance amount_input" data-id="3" value="<?php echo isset($info['trade_allowance3'])?$info['trade_allowance3']:''; ?>" id="trade_allowance3" style="width:90px;"/></td><?php */?>

            </tr>
            <tr><td>Plus Payoff</td>
            <td align="right">$<input type="text" name="less_payoff" class="less_payoff amount_input" data-id="1" id="less_payoff1" value="<?php echo isset($info['trade_payoff'])?$info['trade_payoff']:$info['trade_value']; ?>" style="width:90px;"/></td>
           <?php /*?> <td>$<input type="text" name="less_payoff2" class="less_payoff amount_input" data-id="2" id="less_payoff2" value="<?php echo isset($info['less_payoff2'])?$info['less_payoff2']:''; ?>" style="width:90px;"/></td>
            <td>$<input type="text" name="less_payoff3" class="less_payoff amount_input" data-id="3" id="less_payoff3" value="<?php echo isset($info['less_payoff3'])?$info['less_payoff3']:''; ?>" style="width:90px;"/></td><?php */?>

            </tr>
            <tr><td>Total Balance Due</td>
            <td align="right">$<input type="text" name="amount" class="amount amount_input" data-id="1" id="amount1" value="<?php echo isset($info['amount'])?$info['amount']:''; ?>"  style="width:90px;"/></td>
          <?php /*?>  <td>$<input type="text" name="amount2" class="amount amount_input" value="<?php echo isset($info['amount2'])?$info['amount2']:''; ?>" data-id="2" id="amount2" style="width:90px;"/></td>
            <td>$<input type="text" name="amount3" class="amount amount_input" data-id="3" value="<?php echo isset($info['amount3'])?$info['amount3']:''; ?>" id="amount3" style="width:90px;"/></td><?php */?>

            </tr>
            </table>
          </td>

            <td width="50%">
            <table style="width: 100%;">
					<thead>
						<tr>
                        	<th width="25%" align="center">Down Payment</th>
							<th width="20%" align="center">APR %</th>
							<th width="25%" align="center">Term(months)</th>
							<th width="25%" align="center">Payment</th>
						</tr>
					</thead>

					<tbody>
						<tr>
                        	<td>$<input type="text" name="down_payment" class="down_payment amount_input" value="<?php echo isset($info['down_payment'])?$info['down_payment']:''; ?>" id="down_payment" style="width:110px;"/></td>
							<td><input type="text" name="loan_apr" class="loan_apr amount_input" value="<?php echo isset($info['loan_apr'])?$info['loan_apr']:''; ?>" data-id="1" id="loan_apr1" style="width:50px;" />
								%</td>
							<td align="center"><select name="payment_option1" class="form-control price_options" style="width:65%;" price-id="option1_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option1_price_span" class="print_month"><?php echo $selected_months[1]; ?></span> months</td>
							<td >$&nbsp;
								<input name="option1_price" id="option1_price" type="text" class="input20 options_price" value="" style="width:90px;"/></td>
						</tr>
						<tr>
							<td  align="center">&nbsp;</td>
                            <td  align="center">&nbsp;</td>
							<td  align="center"><select name="payment_option2" class="form-control price_options" style="width:65%;" price-id="option2_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option2_price_span" class="print_month"><?php echo $selected_months[2]; ?></span> months</td>
							<td  align="left">$&nbsp;
								<input name="option2_price" id="option2_price" type="text" class="input20 options_price" value="" style="width: 90px;"/></td>
						</tr>
						<tr>
							<td  align="center">&nbsp;</td>
                            <td  align="center">&nbsp;</td>
							<td  align="center"><select name="payment_option3" class="form-control price_options" style="width:65%;" price-id="option3_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option3_price_span" class="print_month"><?php echo $selected_months[3]; ?></span> months</td>
							<td >$&nbsp;
								<input name="option3_price" id="option3_price" type="text" class="input20 options_price" value="" style="width: 90px;"/></td>
						</tr>
						<tr>
                        	<td  align="center">&nbsp;</td>
							<td  align="center">&nbsp;</td>
							<td  align="center"><select name="payment_option4" class="form-control price_options" style="width:65%;" price-id="option4_price"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select><span id="option4_price_span" class="print_month"><?php echo $selected_months[4]; ?></span> months</td>
							<td >$&nbsp;
								<input name="option4_price" id="option4_price" type="text" class="input20 options_price" value="" style="width: 90px;"/></td>
						</tr>
					</tbody>

				</table>

           
            </td>
            </tr>


            </table>
            <br />
            <p style="text-align:center;">THIS  IS AN  OFFER TO  BUY TODAY.  NOT  A FINANCE  CONTRACT</p>
            <br/>

		</div>
		<!---left1-->
	
		<!-- no print buttons end -->
