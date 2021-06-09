<?php echo $this->element('table_header_recap_report',array('export'=>$export)); ?>
	<?php
if($export){
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
}else{
	$style = '';
	}
?>
		<?php
		if(is_array($note_update_results)){
			foreach($note_update_results as $details){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo $details['ref_num'];?></td>
				<td <?php echo $style;?> ><?php echo date("F j, Y",strtotime($details['created']));?></td>
				<td <?php echo $style;?> ><?php echo date("F j, Y h:i A",strtotime($details['modified']));?></td>
				<td <?php echo $style;?> ><?php if($details['next_activity']!=''){echo date("F j, Y",strtotime($details['next_activity']));}?></td>
				<td <?php echo $style;?> ><?php echo $details['salesperson'];?></td>
				<td <?php echo $style;?> ><?php echo $details['fullname'];?></td>
				<td <?php echo $style;?> ><?php echo $details['phone'];?></td>
				<td <?php echo $style;?> ><?php echo $details['vehicle'];?></td>
				<td <?php echo $style;?> ><?php echo $details['logtype'];?></td>
				<td <?php echo $style;?> ><?php echo $details['salestep'];?></td>
				<td <?php echo $style;?> ><?php echo $details['lead_status'];?></td>
				<td <?php echo $style;?> ><?php echo $details['status'];?></td>
				<td <?php echo $style;?> ><notes><p><?php echo $details['comment'];?><notes></p></td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->
			