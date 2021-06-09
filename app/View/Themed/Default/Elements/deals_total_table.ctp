<?php  
$new_step_map = array();
$new_step_map[0] = 'Pending<br>(Closed)';
$new_step_map[1] = 'Pending<br>(Open)';
$custom_step_map = Set::merge($new_step_map, $custom_step_map);

//debug($custom_step_map);
//debug($deals_total);

//debug($s_date);
//debug($e_date);



?>

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
			<?php if(isset($weblead)){ ?>
			<tr class="gradeA text-small" >
				<td>Average time</td>
				<td></td>

				<?php foreach ($custom_step_map as $key=>$value){  if($key == '1') continue ;	?>
				<td>
					<?php 
					//echo $deals_total['avg_'.$key]."<br>";
					echo ( $deals_total['avg_'.$key ] != null && $deals_total['avg_'.$key ] != 0)? secondsToTime($deals_total['avg_'.$key]) : "" ; ?>
				</td>
				<?php  } ?>
			</tr>
			<?php } ?>
			<tr class="gradeA">
				<td>#Steps</td>
				<?php $cnt = 1; 
					
					foreach ($custom_step_map as $key=>$value){ 
					if($cnt == 3){
						$deal_meet = $deals_total[$key];
					} 
				 ?>
					<td>


						<?php if( ($key == '0') && $deals_total[$key] != '0'){ ?> 
							<?php echo $this->Html->link($deals_total[$key], array('controller'=>'master_reports','action'=>'master_report_pending','Closed',$stat_type, '?'=>array('s_date'=>$s_date, 'e_date'=>$e_date) ),array('class'=>array('popup_details no-ajaxify'))); ?> 
						<?php }else if( ($key == '1') && $deals_total[$key] != '0'){ ?> 
							<?php echo $this->Html->link($deals_total[$key], array('controller'=>'master_reports','action'=>'master_report_pending','Open', $stat_type, '?'=>array('s_date'=>$s_date, 'e_date'=>$e_date) ),array('class'=>array('popup_details no-ajaxify'))); ?> 	
						<?php }else if( ($key == '2') ){ ?> 
							<?php echo $deals_total[0] + $deals_total[1] + $deals_total[2]; ?>
						<?php }else{ ?> 
							<?php echo $deals_total[$key]; ?>
						<?php } ?> 

				</td>		


				<?php $cnt++;  } ?>
			</tr>
			<tr class="text-primary">
				<td>%Steps</td>
				<td>&nbsp;</td>
				<td></td>
				<?php 
				$cnt = 1;
				if($contact_status == 7){
					$deal_meet = $deals_total[3];	
				}else{
					$deal_meet = $deals_total[0] + $deals_total[1] + $deals_total[2];
				}
				
				foreach ($custom_step_map as $key=>$value){  
					if($cnt > 2){ 	?>

					<td>
						<?php if($contact_status == 7){ 	?>	

							<?php if($cnt == 4){ 	?>	
								<?php echo calculate_percent($deal_meet, $deal_meet); ?>%
							<?php }else if( $cnt > 4 ){ ?>	
								<?php echo calculate_percent($deal_meet, $deals_total[$key]); ?>%
							<?php } ?>

						<?php }else { ?>

							<?php if($cnt == 3){ 	?>	
								<?php echo calculate_percent($deal_meet, $deal_meet); ?>%
							<?php }else{ ?>	
								<?php echo calculate_percent($deal_meet, $deals_total[$key]); ?>%
							<?php } ?>

						<?php } ?>



					</td>
					
				<?php } $cnt++; } ?>

			</tr>
			
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->