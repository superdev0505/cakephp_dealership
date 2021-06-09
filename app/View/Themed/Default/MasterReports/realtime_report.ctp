
<div class=''>

<br>

<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
	<!-- Table heading -->
	<thead>
		<tr  class='bg-inverse'>
			<th width="200">Staff</th>
			<?php
			$total = array(); 
			foreach ($custom_step_map as $key=>$value){ 
				$total[ $key ] = 0;
			?>
				<th><?php  echo $value; ?></th>
			<?php  } ?>
		</tr>
	</thead>
	<tbody>
		<?php 
		$all_users = array();
		foreach ($results as $result){ ?>		
		<tr>
			<td><?php  echo $result['sperson']; ?></td>
			
				<?php foreach ($custom_step_map as $k=>$v){ ?>
					<td>
						<?php  
						$all_users[$k][] =  $result['user_id'];
						echo ($result[ 's_'.$k ] != 0)?$this->Html->link( $result[ 's_'.$k ] ,
								array('controller'=>'realtime_reports','action'=>'highest_step_details','?'=>array(
									'user_id' => $result['user_id'],
									'step_id'  => $k,
									's_date' => $s_date,
									'e_date' => $e_date,
								)), array('class'=>'realtime_stat_details no-ajaxify')
							) :$result[ 's_'.$k ];
						$total[$k] +=  $result[ 's_'.$k ];
						?>
					</td>
				<?php  } ?>

		</tr>
		<?php } ?>
		
		<tr>
			<td>Total</td>
			<?php foreach ($custom_step_map as $k=>$v){ ?>
				<td><?php 	echo ( $total[$k] != '0' )?  $this->Html->link( $total[$k], 
									array('controller'=>'realtime_reports','action'=>'highest_step_details','?'=>array(
									'user_id' => implode(",", $all_users[$k])  ,
									'step_id'  => $k,
									's_date' => $s_date,
									'e_date' => $e_date,
								)), array('class'=>'realtime_stat_details no-ajaxify')
							)   : $total[$k]; ?></td>
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
			<th>Existing In</th>
			<th>Existing Out</th>
		</tr>
		<?php 
		$t1 = 0; $t2 = 0; $t3 = 0; $t4 = 0;	
		foreach ($usernames as $key => $value){
			$t1 += (isset($new_in_ar[$key]))?  $new_in_ar[$key] : 0;
			$t2 += (isset($new_out_ar[$key]))?  $new_out_ar[$key] : 0;
			$t3 += (isset($existing_in_ar[$key]))?  $existing_in_ar[$key] : 0;
			$t4 += (isset($existing_out_ar[$key]))?  $existing_out_ar[$key] : 0;
		
		?>
		<tr>
			<td><?php echo $value; ?></td>	
			<td><?php echo  (isset($new_in_ar[$key]))?  $new_in_ar[$key] : '0'; ?></td>
			<td><?php echo (isset($new_out_ar[$key]))?  $new_out_ar[$key] : '0'; ?></td>
			<td><?php echo (isset($existing_in_ar[$key]))?  $existing_in_ar[$key] : '0'; ?></td>
			<td><?php echo (isset($existing_out_ar[$key]))?  $existing_out_ar[$key] : '0'; ?></td>
		</tr>
		<?php  } ?>
		<tr class="text-primary">
			<td><strong>Total</strong></td>	
			<td><strong><?php echo $t1; ?></strong></td>
			<td><strong><?php echo $t2; ?></strong></td>
			<td><strong><?php echo $t3; ?></strong></td>
			<td><strong><?php echo $t4; ?></strong></td>
		</tr>
	</table>	





	<div><strong>Emails</strong></div>
	<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
		<tr class='bg-inverse'>
			<th width="200" >Staff</th>
			<th>Web</th>
			<th>Phone</th>
			<th>Showroom</th>
			<th>Mobile</th>
		</tr>
		<?php 
		$t1 = 0; $t2 = 0; $t3 = 0; $t4 = 0;	
		foreach ($e_usernames  as $key => $value){ 
			$t1 += (isset($type_count[$key]['5']))?  $type_count[$key]['5'] : 0;
			$t2 += (isset($type_count[$key]['6']))?  $type_count[$key]['6'] : 0;
			$t3 += (isset($type_count[$key]['7']))?  $type_count[$key]['7'] : 0;
			$t4 += (isset($type_count[$key]['12']))?  $type_count[$key]['12'] : 0;
		?>

		<tr>
			<td><?php echo $value; ?></td>	
			<th><?php echo  (isset($type_count[$key]['5']))?  $type_count[$key]['5'] : '0'; ?></th>
			<th><?php echo  (isset($type_count[$key]['6']))?  $type_count[$key]['6'] : '0'; ?></th>
			<th><?php echo  (isset($type_count[$key]['7']))?  $type_count[$key]['7'] : '0'; ?></th>
			<th><?php echo  (isset($type_count[$key]['12']))?  $type_count[$key]['12'] : '0'; ?></th>
		</tr>

		<?php } ?>	

		<tr class="text-primary">
			<td><strong>Total</strong></td>	
			<td><strong><?php echo $t1; ?></strong></td>
			<td><strong><?php echo $t2; ?></strong></td>
			<td><strong><?php echo $t3; ?></strong></td>
			<td><strong><?php echo $t4; ?></strong></td>
		</tr>	



	</table>	







</div>



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


