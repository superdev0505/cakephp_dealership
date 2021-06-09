<?php //debug($daily_door_counts); ?>



<!-- Table -->
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
	<!-- Table heading -->
	<thead>
		<tr>
			<th>Daily POS Count</th>
			<th>Date</th>
		</tr>
	</thead>
	<!-- // Table heading END -->
	<!-- Table body -->
	<tbody>
		<!-- Table row -->
		<?php foreach ($dealer_registers as $dealer_register) { ?>
		<tr class="text-primary">
			<td><?php echo $dealer_register['DealerRegister']['daily_register_amount']; ?>&nbsp;</td>
			<td><?php echo date('m/d/Y', strtotime($dealer_register['DealerRegister']['log_date'])); ?>&nbsp;</td>
		</tr>
		<?php } ?>
		<!-- // Table row END -->
	</tbody>
	<!-- // Table body END -->
</table>
<!-- // Table END -->