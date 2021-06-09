<?php echo $this->element('table_header_recap_report',array('export'=>$export)); ?>
	<?php
if($export){
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
}else{
	$style = '';
	}
?>
	<?php
		if(is_array($step_log_results)){
			foreach($step_log_results as $details){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo $details['Contact']['id'];?></td>
				<td <?php echo $style;?> ><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
				<td <?php echo $style;?> ><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
				<td <?php echo $style;?> ><?php if($details['Contact']['next_activity']!=''){echo date("F j, Y h:i A",strtotime($details['Contact']['next_activity']));}?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sperson'];?></td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['first_name'];?>
					<?php echo $details['Contact']['m_name'];?>
					<?php echo $details['Contact']['last_name'];?>
				 </td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['phone'];?></td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
				</td>
				<td <?php echo $style;?> ><?php echo $details['ContactStatus']['name'];?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sales_step'];?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['lead_status'];?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['status'];?></td>
				<td <?php echo $style;?> ><notes><p><?php echo $details['Contact']['notes'];?><notes></p></td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->
			