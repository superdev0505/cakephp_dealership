


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th title="<?php echo count($contacts); ?>" >Ref No.</th>
			<th>Created</th>
			<th>Modified</th>
			<th>Originator</th>
			<th>Sales Person</th>
			<th>Full Name</th>
			<th>Step</th>
			<th width='10%'>Comment</th>
			<th>MGR</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $contact) { ?>
			<tr class="gradeA">
				<td><?php echo $contact['0']['lead_id']; ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['0']['created'])); ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['0']['modified'])); ?></td>
				<td><?php echo $contact['0']['owner'] ?></td>
				<td><?php echo $contact['0']['sperson'] ?></td>
				<td><?php echo ucwords(strtolower($contact['0']['cf'])); ?> <?php echo ucwords(strtolower($contact['0']['cl'])); ?></td>
				<td><?php echo $custom_step_map[ $contact['0']['sales_step'] ]; ?></td>
				<td><?php 

				//echo $contact['0']['notes'];

				echo $this->Text->truncate( strip_tags($contact['0']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
						$contact['0']['id'].'" >Read more</a>'));	
					


				 ?></td>
				<td>
					<?php if($contact['0']['mgr_signoff'] != ''){ ?>
						<span class="fa fa-check text-success"><i></i></span>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>


<?php

	//debug( $contacts );

 ?>



<script>
$(function(){

$(".read_more_contact_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});



});
</script>
















