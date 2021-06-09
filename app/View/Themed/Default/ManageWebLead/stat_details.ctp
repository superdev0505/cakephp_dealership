












	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Ref No.</th>
			<th>Created</th>
			<th>Modified</th>
			<th>Owner</th>
			<th>Sales Person</th>
			<th>Full Name</th>
			<th>Step</th>
			<th width='10%'>Comment</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $contact) { ?>
			<tr class="gradeA">
				<td><?php echo $contact['Contact']['id'] ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['created'])); ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['modified'])); ?></td>
				<td><?php echo $contact['Contact']['owner'] ?></td>
				<td><?php echo $contact['Contact']['sperson'] ?></td>
				<td><?php echo $contact['Contact']['first_name'] ?> <?php echo $contact['Contact']['last_name'] ?></td>
				<td><?php echo $custom_step_map[ $contact['Contact']['sales_step'] ]; ?></td>
				<td><?php echo $contact['Contact']['notes']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>









































