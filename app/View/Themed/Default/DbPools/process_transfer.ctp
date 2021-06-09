
<button type="button" id="btn_start_transfer_process" class="btn btn-success no-ajaxify">
	<i class="fa fa-gear"></i> Start Data Transfer
</button>

<button type="button" id="btn_stop_transfer_process" class="btn btn-danger no-ajaxify">
	<i class="fa fa-gear"></i> Stop
</button>

<br><br>
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
    <thead class="success paging">
       <tr>
       		<th>Table</th>
       		<th>Transfer Type</th>
       		<th>Start From</th>
       		<th width="200px">Status</th>
       </tr>
    </thead>
    <tbody>

    	<?php $t_index = 0; foreach($parent_table_map as $key => $value){  ?>
    	<tr>
	    	<td>
	    		<div class="text-primary"><?php echo $key; ?></div>
	    		<div><strong>Associate Tables</strong></div>
	    		<?php echo implode(", ",$value);  ?>
	    	</td>
	    	<td>Dealer</td>
	    	<td><button type="button" class="btn btn-success no-ajaxify btn_start_from"  table_index="<?php echo $t_index; ?>">Start</button></td>
	    	<td>
	    		<div class="lst_table" table_name="<?php echo $key; ?>" ></div>
	    		<div class="progress">
					<div id="progress_<?php echo $key; ?>" class="progress-bar progress-bar-primary" style="width: 0%;"></div>
				</div>
	    	</td>
    	</tr>
    	<?php $t_index++; }  ?>

    	<?php foreach($all_table_map as $PoolTransferMap){  ?>
    	<tr>
	    	<td><?php echo $PoolTransferMap['PoolTransferMap']['tablename']; ?></td>
	    	<td><?php echo $PoolTransferMap['PoolTransferMap']['transfer_type']; ?></td>
	    	<td>
	    		<div><button type="button" class="btn btn-success no-ajaxify btn_start_from"  table_index="<?php echo $t_index; ?>" >Start</button></div>
	    		<?php echo $PoolTransferMap['PoolTransferMap']['key_field']; ?>
	    		<?php if(!empty($PoolTransferMap['PoolTransferMap']['table_values'])){ ?>
	    			(<?php echo $PoolTransferMap['PoolTransferMap']['table_values']; ?>)
	    		<?php } ?>
	    	</td>
	    	<td>
				<div class="progress">
					<div <div id="progress_<?php echo $PoolTransferMap['PoolTransferMap']['tablename']; ?>" class="progress-bar progress-bar-primary" style="width: 0%;"></div>
				</div>
	    	</td>
    	</tr>
    	<?php  $t_index++; }  ?>
	</tbody>
</table>

<script>

$script.ready('bundle', function() {

	var transfer_in_progress = 0;
	var transfer_percentage = 0;
	var running_table_index = 1;


	var list_tables = [];
	<?php foreach($parent_table_map as $key => $value){  ?>
		list_tables.push('<?php echo $key; ?>');
	<?php }  ?>
	<?php foreach($all_table_map as $PoolTransferMap){  ?>
		list_tables.push('<?php echo $PoolTransferMap['PoolTransferMap']['tablename']; ?>');
	<?php }  ?>

	// console.log( list_tables[8] );

	$("button.btn_start_from").click(function(startindex){
		start_process('<?php echo $dealer_id; ?>',  parseInt($(this).attr("table_index")) );
	});


	var start_process = function(dealerid, table_index){

		var table_name = list_tables[ table_index ];
		if(table_name == undefined){
			console.log( 'finished' );
			return;
		}

		$.ajax({
			type: "GET",
			cache: false,
			url: "/db_pools/transfer_table_data",
			data: {'dealer_id': '<?php echo $dealer_id; ?>', 'tablename' : table_name},
			success: function(data){
				var st_data = $.parseJSON(data);

				if(st_data.is_last == 'no'){
					$("#progress_"+table_name).css('width', st_data.percentage + '%');
					start_process('<?php echo $dealer_id; ?>', table_index);
				}

				if(st_data.is_last == 'yes'){
					console.log( table_name + " - Completed ");
					$("#progress_"+table_name).removeClass('progress-bar-primary').addClass('progress-bar-success').css('width', '100%');

					start_process('<?php echo $dealer_id; ?>', table_index + 1);
				}

			}
		});
	}


	$("#btn_stop_transfer_process" ).click(function(event){
		transfer_in_progress = 0;
	});

	$("#btn_start_transfer_process" ).click(function(event){
		event.preventDefault();
		// transfer_in_progress = 1;
		start_process('<?php echo $dealer_id; ?>', 0);
	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
