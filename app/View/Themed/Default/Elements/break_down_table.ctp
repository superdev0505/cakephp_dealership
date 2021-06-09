<?php  
$new_step_map = array();
$new_step_map[0] = 'Pending<br>(Closed)';
$new_step_map[1] = 'Pending<br>(Open)';
$custom_step_map = Set::merge($new_step_map, $custom_step_map);
//debug($custom_step_map);
 ?>
<!-- Table -->
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
	<!-- Table heading -->
	<thead>
		<tr>
			<th width="200" class="text-primary"></th>
			<?php foreach ($custom_step_map as $key=>$value){  	?>
				<th style="white-space: nowrap;" ><?php  echo $value; ?></th>
			<?php  } ?>
		</tr>
	</thead>
	<tbody>
	<?php if(!empty($bk)){ ?>
		<?php foreach($bk as $s_b ){ ?>
		
		<?php if(isset($weblead)){ ?>
		<tr class="gradeA text-small">
			<td>Avg (<?php echo ($s_b['sperson'] != '')? $s_b['sperson']  : "Unassigned Lead" ; ?>)</td>
			<td></td>
			
			<?php foreach ($custom_step_map as $key=>$value){  if($key == '1') continue ;	?>
			<td>
				<?php echo ( $s_b['avg_'.$key ] != null && $s_b['avg_'.$key ] != 0)? secondsToTime($s_b['avg_'.$key]) : "" ; ?>
			</td>
			<?php  } ?>

		</tr>
		<?php } ?>
		
		
		<tr class="gradeA">
			<td class="text-primary">
			<i class="fa fa-user"></i> 
			<?php echo ($s_b['sperson'] != '')? $s_b['sperson']  : "Unassigned Lead" ; ?></td>

		  	<?php $cnt = 1; 

		  	foreach ($custom_step_map as $key=>$value){ 
					// if($cnt == 3){
					// 	$deal_meet = $s_b[$key];
					// } 
					//debug($deal_meet);
			 ?>
				<td>
					<?php 
					
					if($key == '0' && $s_b[$key] != '0'){ 
						echo $this->Html->link($s_b[$key], array('controller'=>'master_reports','action'=>'master_report_pending','Closed', $stat_type,$s_b['user_id'], '?'=>array('s_date'=>$s_date, 'e_date'=>$e_date) ),
							array('class'=>array('popup_details no-ajaxify')) ); 
					}elseif($key == '1' && $s_b[$key] != '0'){ 
						echo $this->Html->link($s_b[$key], array('controller'=>'master_reports','action'=>'master_report_pending','Open', $stat_type,$s_b['user_id'], '?'=>array('s_date'=>$s_date, 'e_date'=>$e_date)),
							array('class'=>array('popup_details no-ajaxify')) ); 
					}else if($key == 2){
						echo $s_b[0] + $s_b[1] + $s_b[2];
					}
					else{
						echo $s_b[$key]; 
					}

					 if ($cnt > 2){

					 	if( $contact_status == 7 ){

						 	$deal_meet = $s_b[3];
						 	if($cnt == 4){
								echo "  (".calculate_percent($deal_meet, $deal_meet)."%)";
						 	}else if($cnt > 4){
								echo "  (".calculate_percent($deal_meet, $s_b[$key])."%)";	
						 	}

						 }else{

						 	$deal_meet = $s_b[0] + $s_b[1] + $s_b[2];
						 	if($cnt == 3){
								echo "  (".calculate_percent($deal_meet, $deal_meet)."%)";
						 	}else{
								echo "  (".calculate_percent($deal_meet, $s_b[$key])."%)";	
						 	}
						 
						 }
					}

					?>
				</td>
			<?php $cnt++;  } ?>



		</tr>
		<?php } ?>
		<?php } ?>
		
	</tbody>
	<!-- // Table body END -->
</table>
<!-- // Table END -->
