<div class='row'>
	<div class="col-md-10 contact_account_pagination">
		<div class="paging">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>
	</div>
	<div class="col-md-2 text-right strong ">
		<?php echo $this->Paginator->counter('{:start} - {:end} of {:count}'); ?>
	</div>	
</div>
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<tr class='bg-inverse' >
		<th title="<?php echo count($contacts); ?>">Ref No.</th>
		<th>Name</th>
		<th>Sales Person</th>
		<th>Status</th>
		<th>Step</th>
		<th>Created</th>
		<th>Modified</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($contacts as $contact) { ?>
		<tr class="gradeA">
			<td><?php echo $contact['Contact']['id'] ?></td>
			<td><?php echo ucwords(strtolower($contact['Contact']['first_name'])); ?> <?php echo ucwords(strtolower($contact['Contact']['m_name'])) ?> <?php echo ucwords(strtolower($contact['Contact']['last_name'])) ?></td>
			<td><?php echo $contact['Contact']['sperson'] ?></td>
			<td><?php echo $contact['Contact']['status'] ?></td>
			<td><?php echo $custom_step_map[ $contact['Contact']['sales_step'] ]; ?></td>
			<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['created'])); ?></td>
			<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['modified'])); ?></td>
			<td>
				<a class="btn btn-xs btn-primary" href="/contacts/leads_main/view/<?php echo $contact['Contact']['id'] ?>" target="_blank" >Details</a>
				<a class="btn btn-xs btn-primary" href="/contacts/leads_input_edit/<?php echo $contact['Contact']['id'] ?>/selected_lead_type:?do=edit_lead&edit_type=gsm" target="_blank" ><i class="fa fa-pencil"></i> Edit</a>
				<a class="btn btn-xs btn-primary remove_contact_record no-ajaxify" href="/contact_accounts/remove_contact/<?php echo $contact['Contact']['id']; ?>"><i class="fa fa-times"></i> Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	<!-- // Table body END -->
</table>


<script>
$(function(){

	//Pagination Starts
	$(".contact_account_pagination .paging a,a.sortLeads" ).addClass("no-ajaxify");
	$(".contact_account_pagination .paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){ 
					$('.bootbox-body').html(results);
				}
			});
		}
	});
	//Pagination Ends
	// Remove contact
	$(".remove_contact_record").click(function(event){
		event.preventDefault();
		var cur_row = $(this);
		$.ajax({
			type: "POST",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Remove contact",
				}).find("div.modal-dialog").addClass("largeWidth3");
				cur_row.closest('tr').hide('slow');
			}
		});
	});

});
</script>