


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Ref No.</th>
			<th>Created</th>
			<th>Modified</th>
			<th>Next Activity</th>
			<th>Originator</th>
			<th>Sales Person</th>
			<th>Full Name</th>
			<th>Step</th>
			<th>Lead Status</th>
			<th width='10%'>Comment</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($pending_value as  $contact) { ?>
			<tr class="gradeA">
				<td><?php echo $contact['id'] ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['created'])); ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['modified'])); ?></td>
				<td>
					<?php
						if(isset( $next_acvt[ $contact['id']  ]  )){
							echo date("F j, Y h:i A",  strtotime( $next_acvt[  $contact['id']  ] )  );
						}
					?>
				</td>
				<td><?php echo $contact['owner'] ?></td>
				<td><?php echo ucwords(strtolower($contact['first_name'])); ?> <?php echo ucwords(strtolower($contact['last_name'])) ?></td>
				<td><?php echo $contact['cf'] ?> <?php echo $contact['cl'] ?></td>
				<td><?php echo "Pending"; ?></td>
				<td><?php echo $contact['lead_status']; ?></td>
				<td><?php echo $contact['notes']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>


<?php

	// foreach($pending_value as  $contact) {
	// 	debug($contact);
	// }

//debug($next_acvt);

 ?>


<div class="modal-footer center margin-none">
	<a href="#" class="btn btn-danger pull-right" id="close_modal" data-dismiss="modal">Close</a>


</div>
