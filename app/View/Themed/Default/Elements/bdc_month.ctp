<?php $style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
$style1 = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
 ?>
<table width="100%"><tr><td align="center" colspan="8" style="font-size:24px;background-color:#3695d5;color:white;align:center;">Dealership Performance 360 CRM BDC Survey - <?php echo date('l, F j, Y');?> </td></tr>
<tr><td colspan="8"></td></tr>
<tr><td colspan="8"></td></tr>
</table>
<table>
<thead><tr>
<td <?php echo $style1;?>>Date</td>
<td <?php echo $style1;?>>Store</td>
<td <?php echo $style1;?>>Survey Type</td>
<td <?php echo $style1;?>>Customer Name</td>
<td <?php echo $style1;?>>Customer Phone</td>
<?php /*?><td <?php echo $style1;?>>BDC Status</td>
<td <?php echo $style1;?>>Status</td>
<td <?php echo $style1;?>>Comment</td><?php */?>

</tr></thead>
<tbody>
		<?php
		foreach($contacts['new'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase - Month (New)"; 
				}else{
					echo "Sold  (New)";
				}
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last Month New?>
         <?php
		foreach($last_contacts['new'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase - Last Month (New)"; 
				}else{
					echo "Sold - Last Month (New)";
				}
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        
        <?php //last month end new ?>
        
        <?php
		foreach($contacts['call_back'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase - Month (Call Back)"; 
				}else{
					echo "Sold  (Call Back)";
				}
				
				?></td>
               <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
			<?php /*?>	<td <?php echo $style;?>>Call Back</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last month Call Back ?>
         <?php
		foreach($last_contacts['call_back'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase - Last Month (Call Back)"; 
				}else{
					echo "Sold - Last Month (Call Back)";
				}
				
				?></td>
               <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
				<?php /*?><td <?php echo $style;?>>Call Back</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        
        <?php // End Last month Callback ?>
         <?php
		foreach($contacts['voicemail'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase - Month (Voicemail)"; 
				}else{
					echo "Sold (Voicemail)";
				}
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
				<?php /*?><td <?php echo $style;?>>Voicemail</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
       <?php // Last month voicemail?> 
      
       
         <?php
		foreach($last_contacts['voicemail'] as $lead){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				if($lead_type=='contact')
				{
					echo "Pre-Purchase -Last Month (Voicemail)"; 
				}else{
					echo "Sold - Last Month (Voicemail)";
				}
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['BdcLead']['first_name'].' '.$lead['BdcLead']['last_name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['BdcLead']['mobile'];?></td>
				<?php /*?><td <?php echo $style;?>>Voicemail</td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['status'];?></td>
				<td <?php echo $style;?>><?php echo $lead['BdcLead']['notes'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->