	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Day</th>
			<th>Start</th>
			<th>End</th>
			<th width="30"></th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($AutowebleadSchedules as $AutowebleadSchedule) { ?>
			<tr class="gradeA">
				<td><?php echo $AutowebleadSchedule['AutowebleadSchedule']['weekday']; ?></td>
				<td>
					<?php echo $start_time = date("g:i A", strtotime( date("Y-m-d")." ".
						 $AutowebleadSchedule['AutowebleadSchedule']['start_time'] )); ?>
				</td>
				<td>
					<?php echo $start_time = date("g:i A", strtotime( date("Y-m-d")." ".
						 $AutowebleadSchedule['AutowebleadSchedule']['end_time'] )); ?>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-xs remove_auto_weblead_schedule" 
						autoweblead_schedule_id = '<?php echo $AutowebleadSchedule['AutowebleadSchedule']['id']; ?>' 
						autoweblead_autoresponderrule_id = '<?php echo $AutowebleadSchedule['AutowebleadSchedule']['autoresponderrule_id']; ?>'
					>
						<i class="fa fa-times"></i>
					</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>