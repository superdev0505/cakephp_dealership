<?php //debug($daily_door_counts); ?>



<!-- Table -->
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
	<!-- Table heading -->
	<thead>
		<tr>
			<th>Daily Door Count</th>
			<th>Date</th>
		</tr>
	</thead>
	<!-- // Table heading END -->
	<!-- Table body -->
	<tbody>
		<!-- Table row -->
		<?php foreach ($daily_door_counts as $daily_door_count) { ?>
		<tr class="text-primary">
			<td><?php echo $daily_door_count['DealerDoorcount']['daily_door_counts']; ?>&nbsp;</td>
			<td><?php echo date('m/d/Y', strtotime($daily_door_count['DealerDoorcount']['log_date'])); ?>&nbsp;</td>
		</tr>
		<?php } ?>
		<!-- // Table row END -->
	</tbody>
	<!-- // Table body END -->
</table>
<!-- // Table END -->