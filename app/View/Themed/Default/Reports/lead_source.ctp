
			<!-- Table -->
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Lead Source:</th>
						<?php echo $this->element('report_table_header'); ?>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php 
					/* foreach($lead_sources as $lead_source){ 
					if(isset( $result_ar[$lead_source])){
					$row_data = $result_ar[$lead_source]; */
					foreach($result_ar as $lead_source=>$row_data){
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php echo $lead_source; ?></td>
						<td><?php echo $row_data['total']; ?></td>
						<td><?php echo $row_data['open_lead']; ?></td>
						<td><?php echo $row_data['closed_lead']; ?></td>
						<td><?php echo $row_data['invalid_lead']; ?></td>
						<td><?php echo $row_data['bcde_percent']; ?></td>
						<td><?php echo $row_data['sold_vehicle']; ?></td>
						<td><?php echo $row_data['sold_percent']; ?></td>
					</tr>
					<!-- // Table row END -->

					
					<?php } ?>
					
					<tr class="text-primary">
						<td><strong>Total:</strong></td>
						<td><?php echo $total_count['total_lead']; ?>&nbsp;</td>
						<td><?php echo $total_count['open_lead']; ?>&nbsp;</td>
						<td><?php echo $total_count['closed_lead']; ?>&nbsp;</td>
						<td><?php echo $total_count['invalid_lead']; ?>&nbsp;</td>
						<td><?php echo $total_count['bcde_percent']; ?>%&nbsp;</td>
						<td><?php echo $total_count['sold_vehicle']; ?>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
		
	
	<?php 
	//debug($total_count);
	//echo $this->element('sql_dump'); 
	?>
