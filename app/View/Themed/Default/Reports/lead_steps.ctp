<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Lead Steps:</th>
						<th>Pending</th>
						<th>Meet</th>
						<th>Greet</th>
						<th>Probe</th>
						<th>Sit-On</th>
						<th>Sit-Down</th>
						<th>Write Up</th>
						<th>Close</th>
						<th>F/I</th>
						<th>Sold</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php foreach($result_ar as $key=>$value){ 
					$row_data = $value;
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php echo $key; ?></td>
						<td><?php echo $row_data['pending']; ?></td>
						<td><?php echo $row_data['meet']; ?></td>
						<td><?php echo $row_data['greet']; ?></td>
						<td><?php echo $row_data['probe']; ?></td>
						<td><?php echo $row_data['sit_on']; ?></td>
						<td><?php echo $row_data['sit_down']; ?></td>
						<td><?php echo $row_data['write_up']; ?></td>
						<td><?php echo $row_data['close_c']; ?></td>
						<td><?php echo $row_data['f_i']; ?></td>
						<td><?php echo $row_data['sold']; ?></td>
						
					</tr>
					<?php } ?>
					
					<tr class="text-primary">
						<td><strong>Total:</strong></td>
						<td><?php echo $total_count['pending']; ?>&nbsp;</td>
						<td><?php echo $total_count['meet']; ?>&nbsp;</td>
						<td><?php echo $total_count['greet']; ?>&nbsp;</td>
						<td><?php echo $total_count['probe']; ?>&nbsp;</td>
						<td><?php echo $total_count['sit_on']; ?>&nbsp;</td>
						<td><?php echo $total_count['sit_down']; ?>&nbsp;</td>
						<td><?php echo $total_count['write_up']; ?>&nbsp;</td>
						<td><?php echo $total_count['close_c']; ?>&nbsp;</td>
						<td><?php echo $total_count['f_i']; ?>&nbsp;</td>
						<td><?php echo $total_count['sold']; ?>&nbsp;</td>
						
					</tr>
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
			