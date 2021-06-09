<?php  ?>

<!-- Table -->
		<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
		<!-- Table heading -->
		<thead>
			<tr>
				<th width="180" class="text-primary"></th>
				<?php foreach ($custom_step_map as $key=>$value){  	?>
					<th  style="white-space: nowrap;" ><?php  echo $value; ?></th>
				<?php  } ?>
			</tr>
		</thead>
		<tbody>
			<tr class="gradeA">
				<td>#Steps</td>
				<?php 
				foreach ($custom_step_map as $key=>$value){ 				
				 ?>
					<td>
					
					<?php echo $deals_total[$key]+$total_sold_count; ?>
                    
				</td>		


				<?php   } ?>
			</tr>
			<tr class="text-primary">
				<td>%Steps</td>
				<?php 
				
				$deal_meet = $deals_total[3]+$total_sold_count;
				
				foreach ($custom_step_map as $key=>$value){  
					?>
                        <td>
                        <?php echo calculate_percent($deal_meet, ($deals_total[$key]+$total_sold_count)); ?>%
                        </td>
					
				<?php } ?>

			</tr>
			
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->