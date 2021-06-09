<?php 
$input_id =  CakeText::uuid();
//debug($dealer_spike_round_loc_cond_rules);
?>
<div>
	<strong>Location break down for Used Inventory:</strong>
	<div style="text-align: right;">
		
		Location: <?php echo $this->Form->select('roundrobin_loc_cond_location',$dealer_spike_round_location_list, 
		array("id"=>"roundrobin_loc_cond_location".$input_id, 'class' => 'input-small roundrobin_loc_cond_location','empty'=>"Select")); ?>	

		Sales Person: <?php echo $this->Form->select('roundrobin_loc_cond_add_user',$round_robin_active_users, 
		array("id"=>"roundrobin_loc_cond_add_user".$input_id, 'class' => 'input-small roundrobin_loc_cond_add_user','empty'=>"Select")); ?>

		<button type="button" input_id = '<?php echo $input_id; ?>' class="btn btn-success btn-xs btn-roundrobin-add-loc-cond">
			<i class="fa fa-plus"></i>
		</button>
	</div>
</div>


<table class="table table-striped table-responsive swipe-horizontal ">
	<!-- Table heading -->
	<thead>
		<tr>
			<th>Location</th>
			<th>Employee</th>
			<th></th>
		</tr>
	</thead>
	<!-- // Table heading END -->
	<!-- Table body -->
	<?php foreach($dealer_spike_round_loc_cond_rules as $loc_cond_rules){ ?>
		<tr>
			<td><?php echo $loc_cond_rules['RoundrobinNewusedRule']['round_robin_location']; ?></td>
			<td>
				<?php echo $loc_cond_rules['User']['full_name']; ?>
			</td>
			<td> <a href="/rules/roundrobin_loc_cond_delete/<?php echo $loc_cond_rules['RoundrobinNewusedRule']['id'] ?>" class="btn btn-danger btn-xs no-ajaxify" onclick="return confirm('Do you want to remove user?')" ><i class="fa fa-times"></i></a> </td>
		</tr>	

	<?php } ?>	
</table>	



<br><br>

<?php 

//debug($round_table_data);
//debug($all_active_users);

foreach($round_table_data as $r_data){ 

	//debug($r_data['next_receive']);

	?>	

	Round Robin Category: <strong><?php echo $r_data['RoundrobinCategory']['category_name']; ?></strong>
	<?php echo ($r_data['RoundrobinCategory']['body_types'] != '')? "( ".implode(", ",  explode(",", $r_data['RoundrobinCategory']['body_types']) )." )" : "" ; ?>
	<div style="text-align: right;">
		Add User: <?php 
		$current_users = Set::extract("/RoundrobinCategoryUser/User/id",$r_data);
		$new_user_list = $round_robin_active_users;
		// foreach($current_users as $cu){
		// 	unset($new_user_list[$cu]);
		// }

		if($r_data['RoundrobinCategory']['category_name'] == 'Default'){
			echo $this->Form->select('roundrobin_cat_add_user',$all_active_users, array('id'=>"roundrobin_cat_add_user_".$r_data['RoundrobinCategory']['id'] , 'class' => 'input-small','empty'=>"Select")); 
		}else{
			echo $this->Form->select('roundrobin_cat_add_user',$new_user_list, array('id'=>"roundrobin_cat_add_user_".$r_data['RoundrobinCategory']['id'] , 'class' => 'input-small','empty'=>"Select")); 
		}

		?> 
		<button type="button" roundrobin_cat_id = "<?php echo $r_data['RoundrobinCategory']['id']; ?>" id="<?php echo "roundrobin_cat_add_user_".$r_data['RoundrobinCategory']['id']; ?>"  class="btn btn-success btn-xs btn-roundrobin-adduser"><i class="fa fa-plus"></i></button>
	</div>
	
	<table class="table table-striped table-responsive swipe-horizontal ">
		<!-- Table heading -->
		<thead>
			<tr>
				<th>Employee</th>
				<th>Last Receive</th>
				<th>Last Login</th>
				<th></th>
			</tr>
		</thead>
		<!-- // Table heading END -->
		<!-- Table body -->
		<?php foreach($r_data['RoundrobinCategoryUser'] as $r_user){ ?>
			<tr>
				<td><?php echo $r_user['User']['first_name'] ?> <?php echo $r_user['User']['last_name'] ?>

					 
				</td>
				<td>
					<?php echo ($r_user['last_receive'])? date("m/d/Y g:i A",strtotime($r_user['last_receive'])) : "" ; ?>
				</td>
				<td><?php echo ($r_user['User']['last_login'])? date("m/d/Y g:i A",strtotime($r_user['User']['last_login'])) : "" ; ?></td>
				<td> <a href="/rules/roundrobin_user_delete/<?php echo $r_user['id'] ?>" class="btn btn-danger btn-xs no-ajaxify" onclick="return confirm('Do you want to remove user?')" ><i class="fa fa-times"></i></a> </td>
			</tr>	

		<?php } ?>	
	</table>	
	<?php //debug($r_data); ?>
	Next Receive: 

	<?php 
		if(!empty($r_data['next_receive'])){
			echo $r_data['next_receive']['User']['first_name']." ".$r_data['next_receive']['User']['last_name']." #".$r_data['next_receive']['User']['id'];
		}

	 ?>

	 <div class="separator"></div>
	<hr>
	<div class="separator"></div>

<?php } ?>	