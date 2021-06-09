<?php $user_names=array();
date_default_timezone_set('America/Los_Angeles');
$unix_time = strtotime("-9 hour");
 ?>
<h2 align="center"><?php echo $dealer_names[$user_id].' -'.$user_id; ?></h2>
	<h4 align="left">Survey Report Detail (<?php echo date('m/d/Y', $unix_time); ?>)</h4>
	     <!-- Table -->
			<table border="1" cellpadding="5" align="center">
			
				
				
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>Next Day Follow-up</th>
						<th>Bad Number</th>
                        <?php /*?><th><font size="-6">No Number</font></th><?php */?>
                        <th>Bad # %</th>
                       <?php /*?> <th><font size="-6">No # %</font></th><?php */?>
                        <th>Minus Bad & No #</th>
                        <th>Contacts</th>
                        <th>Call vs Contacts %</th>
                        <th>In</th>
                        <th>In / Contacts %</th>
                        <th>Sold</th>
                        <th>Sold%</th>	
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					$in_ids=implode(',',$today_total_count['in_ids']);
					$bad_ids=implode(',',$today_total_count['bad_ids']);
					$no_ids=implode(',',$today_total_count['no_ids']);
					$sold_ids=implode(',',$today_total_count['sold_ids']);
					$contact_ids=implode(',',$today_total_count['contact_ids']);
					$all_ids=implode(',',$today_leads);
					$no_bad_ids=implode(',',array_diff($today_leads,$today_total_count['bad_ids'],$today_total_count['no_ids']));
					?>
				<tr class="text-primary">
						<td><?php echo $today_total_count['total_ndf']; ?>&nbsp;</td>
                        <td><?php echo $today_total_count['bad_number']; ?>&nbsp;</td>
                       <?php /*?> <td><?php echo $total_count['no_number']; ?>&nbsp;</td><?php */?>
                        <td><?php echo $today_total_count['bad_per']; ?>%&nbsp;</td>
                    <?php /*?>    <td><?php echo $total_count['no_number_per']; ?>%&nbsp;</td><?php */?>
                        <td><?php echo $today_total_count['contact_bad'];?>&nbsp;</td>
						<td><?php echo $today_total_count['contacts']; ?>&nbsp;</td>
						<td><?php echo $today_total_count['contact_per']; ?>%&nbsp;</td>
						<td><?php echo $today_total_count['in']; ?>&nbsp;</td>
						<td><?php echo $today_total_count['contact_in']; ?>%&nbsp;</td>
						<td><?php echo count($bdc_sold_leads); ?>&nbsp;</td>
                        <td><?php echo round((count($today_sold_leads)/$today_total_count['contacts'])*100); ?>%&nbsp;</td>					</tr>
				</tbody>
			</table>
<br />

	<h4 align="left">Survey Report Detail (<?php echo date('F Y', $unix_time); ?>)</h4>
	     <!-- Table -->
			<table border="1" cellpadding="5" align="center">
			
				
				
					<tr bgcolor="#424242" style="color:#fff;font-weight:bold">
						<th>Next Day Follow-up</th>
						<th>Bad Number</th>
                        <?php /*?><th><font size="-6">No Number</font></th><?php */?>
                        <th>Bad # %</th>
                       <?php /*?> <th><font size="-6">No # %</font></th><?php */?>
                        <th>Minus Bad & No #</th>
                        <th>Contacts</th>
                        <th>Call vs Contacts %</th>
                        <th>In</th>
                        <th>In / Contacts %</th>
                        <th>Sold</th>
                        <th>Sold%</th>	
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					$in_ids=implode(',',$total_count['in_ids']);
					$bad_ids=implode(',',$total_count['bad_ids']);
					$no_ids=implode(',',$total_count['no_ids']);
					$sold_ids=implode(',',$total_count['sold_ids']);
					$contact_ids=implode(',',$total_count['contact_ids']);
					$all_ids=implode(',',$all_leads);
					$no_bad_ids=implode(',',array_diff($all_leads,$total_count['bad_ids'],$total_count['no_ids']));
					?>
				<tr class="text-primary">
						<td><?php echo $total_count['total_ndf']; ?>&nbsp;</td>
                        <td><?php echo $total_count['bad_number']; ?>&nbsp;</td>
                       <?php /*?> <td><?php echo $total_count['no_number']; ?>&nbsp;</td><?php */?>
                        <td><?php echo $total_count['bad_per']; ?>%&nbsp;</td>
                    <?php /*?>    <td><?php echo $total_count['no_number_per']; ?>%&nbsp;</td><?php */?>
                        <td><?php echo $total_count['contact_bad'];?>&nbsp;</td>
						<td><?php echo $total_count['contacts']; ?>&nbsp;</td>
						<td><?php echo $total_count['contact_per']; ?>%&nbsp;</td>
						<td><?php echo $total_count['in']; ?>&nbsp;</td>
						<td><?php echo $total_count['contact_in']; ?>%&nbsp;</td>
						<td><?php echo count($bdc_sold_leads); ?>&nbsp;</td>
                        <td><?php echo round((count($bdc_sold_leads)/$total_count['contacts'])*100); ?>%&nbsp;</td>					</tr>
				</tbody>
			</table>