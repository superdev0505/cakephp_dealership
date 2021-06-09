<?php $style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
$style1 = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
date_default_timezone_set(AuthComponent::user('zone'));
 ?>
<table width="100%"><tr><td align="center" colspan="8" style="font-size:24px;background-color:#3695d5;color:white;align:center;">Dealership Performance 360 CRM BDC Survey(Service Leads) - <?php echo date('l, F j, Y');?> </td></tr>
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
<td <?php echo $style1;?>>Job</td>
<td <?php echo $style1;?>>Job Description</td><?php */?>

</tr></thead>
<tbody>
		<?php
		foreach($contacts['new'] as $lead){
			$month=date('m',strtotime($lead['ServiceLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				echo "Service - $month_text (New)";
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['ServiceLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['ServiceLeadsDms']['home_phone'];?></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last Month New?>
        
        
        <?php //last month end new ?>
        
        <?php
		foreach($contacts['call_back'] as $lead){
			$month=date('m',strtotime($lead['ServiceLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
				
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
					echo "Service - $month_text (Call Back)";
				?></td>
                <td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['ServiceLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['ServiceLeadsDms']['home_phone'];?></td>
				<?php /*?><td <?php echo $style;?>>Call back</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last month Call Back ?>
       
        
        <?php // End Last month Callback ?>
         <?php
		foreach($contacts['voicemail'] as $lead){
			$month=date('m',strtotime($lead['ServiceLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				echo "Service - $month_text (Voicemail) ";
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['ServiceLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['ServiceLeadsDms']['home_phone'];?></td>
				<?php /*?><td <?php echo $style;?>>Voicemail</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
       <?php // Last month voicemail?> 
      
       
        
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->