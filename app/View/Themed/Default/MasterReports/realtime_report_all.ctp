<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}

</style>

<?php 

	function print_percentage($key, $k, $step_percentage){
		//debug($k);
		if($k != '1'){
			return " (". $step_percentage[$key][$k] . "%) ";
		}else{
			return "";
		}
	}

	function calculate_percentage($p_total, $p_value){
    	if($p_total == 0){
    		return 0;
    	}
    	return round( ($p_value / $p_total) * 100 );
    }

	function total_percentage($total, $first_step){
		$totalpercentage = array();
		foreach($total as $k=>$v){
			if($k != 1){
				$per = calculate_percentage($total[ $first_step ], $v);
				$totalpercentage[ $k ] = $per;
			}	
		}
		//debug($totalpercentage);
		return $totalpercentage;
	}

	function print_total($k, $total_percentage){
		//debug($k);
		if($k != '1'){
			return " (". $total_percentage . "%) ";
		}else{
			return "";
		}
	}

?>
			
		


					
		<div><strong>Step Leads</strong></div>

		<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
			<!-- Table heading -->
			<thead>
				<tr  class='bg-inverse'>
					<th width="200" class="">Staff</th>
					<?php

					$t1 = array();
					foreach ($custom_step_map as $key=>$value){ 
						$t1[ $key ] = 0;
					}
					if(!empty($results)){
						foreach ($results as $key => $result){
							foreach ($custom_step_map as $k=>$v){
								$t1[$k] +=  $allcnt[$key][$k];
							}	
						}
					}
					

					//debug( $t1 );
					$total_percentage = total_percentage($t1, $first_step);

					$total = array(); 
					foreach ($custom_step_map as $key=>$value){ 
						$total[ $key ] = 0;
					?>
						<th><?php  echo $value. "<br>" . print_total($key, $total_percentage[$key]); ?> </th>
					<?php  } ?>
				</tr>
			</thead>
			<tbody>
				<?php 
				//debug($results);
				$all_users = array();
				if(!empty($results)){
				foreach ($results as $key => $result){ ?>		
				<tr>
					<td><?php  echo $result['sperson']; ?></td>

						<?php foreach ($custom_step_map as $k=>$v){ ?>
						<td>
							<?php 
							$all_users[$k][] =  $result['user_id'];
							echo  ($allcnt[$key][$k]  != '0' )?       
								$this->Html->link( $allcnt[$key][$k].  print_percentage($key, $k, $step_percentage)  ,
								array('controller'=>'realtime_reports','action'=>'all_step_details','?'=>array(
									'user_id' => $result['user_id'],
									'step_id'  => $k,
									's_date' => $s_date,
									'e_date' => $e_date,
								)), array('class'=>'realtime_stat_details no-ajaxify')
							) : $allcnt[$key][$k] ;

							$total[$k] +=  $allcnt[$key][$k];
							?>
						</td>
						<?php  } ?>
				</tr>
				<?php } 
				} 
			?>
				
				<tr class="text-primary">
					<td><strong>Total</strong></td>

					<?php 
					//$total_percentage = total_percentage($total, $first_step);
					
					foreach ($custom_step_map as $k=>$v){ ?>
						<td>
							<?php  
								echo ( $total[$k] != '0' )?  $this->Html->link( $total[$k] . print_total($k, $total_percentage[$k]) , 
									array('controller'=>'realtime_reports','action'=>'all_step_details','?'=>array(
									'user_id' => implode(",", $all_users[$k])  ,
									'step_id'  => $k,
									's_date' => $s_date,
									'e_date' => $e_date,
								)), array('class'=>'realtime_stat_details no-ajaxify')
							)   : $total[$k]   ;
						     	
						     ?>
						</td>
					<?php  } ?>
					
				</tr>
				
			
			</tbody>
		</table>






		<div><strong>Calls</strong></div>


		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th width="200" >Staff</th>
				<th>New Inbound</th>
				<th>New Outbound</th>
				<th>MGR Message</th>
				<th>Existing In</th>
				<th>Existing Out</th>
				<th>Closed Call Out</th>
				<th>Mgr 24hr calls</th>
			</tr>
			<?php 
			$t1 = 0; $t2 = 0; $t3 = 0; $t4 = 0;	$t5 = 0; $t6 = 0; $t7 = 0;  
			$all_users = array();
			foreach ($usernames as $key => $value){
				$t1 += (isset($new_in_ar[$key]))?  $new_in_ar[$key] : 0;
				$t2 += (isset($new_out_ar[$key]))?  $new_out_ar[$key] : 0;
				$t3 += (isset($existing_in_ar[$key]))?  $existing_in_ar[$key] : 0;
				$t4 += (isset($existing_out_ar[$key]))?  $existing_out_ar[$key] : 0;
				$t5 += (isset($mgr_calls_ar[$key]))?  $mgr_calls_ar[$key] : 0;
				$t6 += (isset($closed_call_out[$key]))?  $closed_call_out[$key] : 0;
				$t7 += (isset($mgr_24hr_calls[$key]))?  $mgr_24hr_calls[$key] : 0;

				$all_users[] = 	$key;
			
			?>
			<tr>
				<td><?php echo $value; ?></td>	
				<td><?php echo  (isset($new_in_ar[$key]))? 
		 			$this->Html->link( $new_in_ar[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'new_in',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				 ?></td>
				<td><?php echo (isset($new_out_ar[$key]))?  
					$this->Html->link( $new_out_ar[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'new_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0'; 
				?></td>

				<td><?php echo (isset($mgr_calls_ar[$key]))?  
					$this->Html->link( $mgr_calls_ar[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'mgr',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></td>

				<td><?php echo (isset($existing_in_ar[$key]))?  
					$this->Html->link( $existing_in_ar[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'existing_in',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></td>
				<td><?php echo (isset($existing_out_ar[$key]))?  
					$this->Html->link( $existing_out_ar[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'existing_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></td>
				<td><?php echo (isset($closed_call_out[$key]))?  
					$this->Html->link( $closed_call_out[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'closed_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></td>
				<td><?php echo (isset($mgr_24hr_calls[$key]))?  
					$this->Html->link( $mgr_24hr_calls[$key],
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => $key,
							'type'  => 'mgr24hrcall',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></td>
			</tr>
			<?php  } ?>
			<tr class="text-primary">
				<td><strong>Total</strong></td>	
				<td><strong><?php
				 echo ($t1 != 0)?
				 	$this->Html->link( $t1,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'new_in',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t1 ; 
				?></strong></td>
				<td><strong><?php 
					echo ($t2 != 0)?
					$this->Html->link( $t2,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'new_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t2 ;
				?></strong></td>

				<td><strong><?php 
				echo ($t5 != 0)?
					$this->Html->link( $t5,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'mgr',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t5 ;
				?></strong></td>


				<td><strong><?php 
				echo ($t3 != 0)?
					$this->Html->link( $t3,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'existing_in',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t3 ;
				?></strong></td>
				<td><strong><?php 
				echo ($t4 != 0)?
					$this->Html->link( $t4,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'existing_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t4 ;
				?></strong></td>
				<td><strong><?php 
				echo ($t6 != 0)?
					$this->Html->link( $t6,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'closed_out',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t6 ;
				?></strong></td>
				<td><strong><?php 
				echo ($t7 != 0)?
					$this->Html->link( $t7,
						array('controller'=>'realtime_reports','action'=>'all_call_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'type'  => 'mgr24hrcall',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					) :  $t7 ;
				?></strong></td>
			</tr>
		</table>	

		<div><strong>Text</strong></div>
		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th width="200" >Staff</th>
				<th>SMS Text- Out</th>
				<th>SMS Text-In</th>
			</tr>
			<?php 
			$t1 = 0; $t2 = 0;	
			$all_users = array();
			foreach ($text_user_names  as $key => $value){ 
				$all_users[] = 	$key;
				$t1 += (isset($sms_text_out[$key]))?  $sms_text_out[$key] : 0;
				$t2 += (isset($sms_text_in[$key]))?  $sms_text_in[$key] : 0;
			?>

			<tr>
				<td><?php echo $value; ?></td>	
				<th><?php echo  (isset($sms_text_out[$key]))? 
				 	$this->Html->link( $sms_text_out[$key],
						array('controller'=>'realtime_reports','action'=>'text_status_details','?'=>array(
							'user_id' => $key,
							'type' => "out",
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>
				<th><?php echo  (isset($sms_text_in[$key]))?  
					$this->Html->link( $sms_text_in[$key],
						array('controller'=>'realtime_reports','action'=>'text_status_details','?'=>array(
							'user_id' => $key,
							'type' => "in",
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>
			</tr>

			<?php } ?>	

			<tr class="text-primary">
				<td><strong>Total</strong></td>	
				<td><strong><?php 
					echo ($t1 != 0)?
					$this->Html->link( $t1,
						array('controller'=>'realtime_reports','action'=>'text_status_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'dealer_id' => $dealer_id,
							'type' => "out",
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0'; 
				?></strong></td>
				<td><strong><?php 
					echo ($t2 != 0)?
					$this->Html->link( $t2,
						array('controller'=>'realtime_reports','action'=>'text_status_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'dealer_id' => $dealer_id,
							'type' => "in",
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0'; 
				?></strong></td>
				
			</tr>	



		</table>	


















		<div><strong>Emails</strong></div>
		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th width="200" >Staff</th>
				<th>Web</th>
				<th>Phone</th>
				<th>Showroom</th>
				<th>MGR Message</th>
				<th>Mobile</th>
			</tr>
			<?php 
			$t1 = 0; $t2 = 0; $t3 = 0; $t4 = 0; $t5 = 0;	
			$all_users = array();
			foreach ($e_usernames  as $key => $value){ 
				$all_users[] = 	$key;
				$t1 += (isset($type_count[$key]['5']))?  $type_count[$key]['5'] : 0;
				$t2 += (isset($type_count[$key]['6']))?  $type_count[$key]['6'] : 0;
				$t3 += (isset($type_count[$key]['7']))?  $type_count[$key]['7'] : 0;
				$t4 += (isset($type_count[$key]['12']))?  $type_count[$key]['12'] : 0;
				$t5 += (isset($type_count[$key]['mgr']))?  $type_count[$key]['mgr'] : 0;
			?>

			<tr>
				<td><?php echo $value; ?></td>	
				<th><?php echo  (isset($type_count[$key]['5']))? 
				 	$this->Html->link( $type_count[$key]['5'],
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => $key,
							'dealer_id' => $dealer_id,
							'contact_status_id'  => '5',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>
				<th><?php echo  (isset($type_count[$key]['6']))?  
					$this->Html->link( $type_count[$key]['6'],
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => $key,
							'dealer_id' => $dealer_id,
							'contact_status_id'  => '6',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>
				<th><?php echo  (isset($type_count[$key]['7']))?  
					$this->Html->link( $type_count[$key]['7'],
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => $key,
							'dealer_id' => $dealer_id,
							'contact_status_id'  => '7',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>

				<th><?php echo  (isset($type_count[$key]['mgr']))?  
					$this->Html->link( $type_count[$key]['mgr'],
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => $key,
							'dealer_id' => $dealer_id,
							'contact_status_id'  => 'mgr',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0'; 
				?></th>


				<th><?php echo  (isset($type_count[$key]['12']))?  
					$this->Html->link( $type_count[$key]['12'],
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => $key,
							'dealer_id' => $dealer_id,
							'contact_status_id'  => '12',
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  : '0';
				?></th>
			</tr>

			<?php } ?>	

			<tr class="text-primary">
				<td><strong>Total</strong></td>	
				<td><strong><?php 
					echo ($t1 != 0)?
					$this->Html->link( $t1,
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'contact_status_id'  => '5',
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0'; 
				?></strong></td>
				<td><strong><?php 
					echo ($t2 != 0)?
					$this->Html->link( $t2,
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'contact_status_id'  => '6',
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0'; 
				?></strong></td>
				<td><strong><?php 
					echo ($t3 != 0)?
					$this->Html->link( $t3,
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'contact_status_id'  => '7',
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				 ?></strong></td>

					<td><strong><?php 
					echo ($t5 != 0)?
					$this->Html->link( $t5,
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'contact_status_id'  => 'mgr',
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				 ?></strong></td>

				<td><strong><?php 
					echo ($t4 != 0)?
					$this->Html->link( $t4,
						array('controller'=>'realtime_reports','action'=>'all_emails_details','?'=>array(
							'user_id' => implode(",",$all_users),
							'contact_status_id'  => '12',
							'dealer_id' => $dealer_id,
							's_date' => $s_date,
							'e_date' => $e_date,
						)), array('class'=>'realtime_stat_details no-ajaxify')
					)
				  	: '0';
				?></strong></td>
			</tr>	



		</table>	



		<div><strong>Events (Showroom Sales Team)</strong></div>
		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th>Sales Person</th>
				<th>Todays Events</th>
				<th>Past Due Events</th>
			</tr>
			<?php 

			$total_today = 0;
			$total_overdue = 0;

			foreach ($today_user_id_user_name as $key => $value) { ?>

			<tr>
				<td>
					<?php  echo $value; ?>
				</td>
				<td><?php  
				if(isset($today_events_by_user[$key])){
					echo ( $today_events_by_user[$key] != 0)?
						$this->Html->link( $today_events_by_user[$key],
							array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', $key, $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';
					  	$total_today = $total_today + $today_events_by_user[$key];
				}else{
					echo "0";
				}	  	


				?></td>
				<td><?php 
				if(isset($overdue_events_by_user[$key])){
					echo ($overdue_events_by_user[$key] != 0)?
						$this->Html->link( $overdue_events_by_user[$key],
							array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', $key, $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';
					  	$total_overdue = $total_overdue + $overdue_events_by_user[$key];
				}else{
					echo "0";
				}	  	

				?></td>
			</tr>	

			<?php } ?>


			<tr class="text-primary">
				<td>
					<strong>Total</strong>
				</td>
				<td><strong><?php  
				echo ( $total_today != 0)?
						$this->Html->link( $total_today,
							array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', 'all', $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';

				?></strong></td>	
				<td><strong><?php  
				echo ($total_overdue != 0)?
						$this->Html->link( $total_overdue,
							array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', 'all' , $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';



				?></strong></td>	
			</tr>	
		</table>



		<div><strong>Events (Internet Sales Team)</strong></div>
		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th>Sales Person</th>
				<th>Todays Events</th>
				<th>Past Due Events</th>
			</tr>
			<?php 

			$total_today = 0;
			$total_overdue = 0;

			foreach ($today_user_id_user_name_internet_sales as $key => $value) { ?>

			<tr>
				<td>
					<?php  echo $value; ?>
				</td>
				<td><?php  
				if(isset($today_events_by_user[$key])){
					echo ( $today_events_by_user[$key] != 0)?
						$this->Html->link( $today_events_by_user[$key],
							array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', $key, $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';
					  	$total_today = $total_today + $today_events_by_user[$key];
				}else{
					echo "0";
				}	  	


				?></td>
				<td><?php 
				if(isset($overdue_events_by_user[$key])){
					echo ($overdue_events_by_user[$key] != 0)?
						$this->Html->link( $overdue_events_by_user[$key],
							array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', $key, $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';
					  	$total_overdue = $total_overdue + $overdue_events_by_user[$key];
				}else{
					echo "0";
				}	  	

				?></td>
			</tr>	

			<?php } ?>


			<tr class="text-primary">
				<td>
					<strong>Total</strong>
				</td>
				<td><strong><?php  
				echo ( $total_today != 0)?
						$this->Html->link( $total_today,
							array('controller'=>'realtime_reports','action'=>'all_event_details','todays_event', 'all', $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';

				?></strong></td>	
				<td><strong><?php  
				echo ($total_overdue != 0)?
						$this->Html->link( $total_overdue,
							array('controller'=>'realtime_reports','action'=>'all_event_details','overdue', 'all', $dealer_id), array('class'=>'realtime_stat_details no-ajaxify')
						)
					  	: '0';



				?></strong></td>	
			</tr>	
		</table>	
	
    
    
<div><strong>Total Appointments(All Appointments Scheduled)</strong></div>
		<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
			<tr class='bg-inverse'>
				<th>Sales Person</th>
				<th>Scheduled Appointments</th>
				<th>Customer Showed Appointments</th>
               	<th>Not Showed Appointments</th>
                <th>Canceled Appointments</th>
			</tr>
			<?php 

			$total_noshow = $total_showed = $total_canceled = $total_scheduled = 0;

			foreach ($user_all_events as $value) { ?>

			<tr>
				<td>
					<?php  echo $value['User']['first_name'].' '.$value['User']['last_name']; ?>
				</td>
				<td><?php  echo $value[0]['scheduled_count'];
					$total_scheduled += $value[0]['scheduled_count']; 
					?></td>
                    <td><?php  echo $value[0]['showed_completed_count'];
					$total_showed += $value[0]['showed_completed_count']; 
					?></td>
                     <td><?php  echo $value[0]['noshow_completed_count'];
					$total_noshow += $value[0]['noshow_completed_count']; 
					?></td>
                    <td><?php  echo $value[0]['canceled_count'];
					$total_canceled += $value[0]['canceled_count']; 
					?></td>
				
			</tr>	

			<?php } ?>


			<tr class="text-primary">
				<td>
					<strong>Total</strong>
				</td>
				<td><strong><?php  
				echo $total_scheduled;
				?></strong></td>	
				<td><strong><?php  
				echo $total_showed;
				?></strong></td>
                <td><strong><?php  
				echo $total_noshow;
				?></strong></td>
                <td><strong><?php  
				echo $total_canceled;
				?></strong></td>	
			</tr>	
		</table>	

	











<?php echo $this->element("sql_dump"); ?>

















<script>

$(function() {


	$(".realtime_stat_details").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Real Time Details",
				}).find("div.modal-dialog").addClass("largeWidth3");
				}
			}
		});
		
	});


	 

});



	

</script>


