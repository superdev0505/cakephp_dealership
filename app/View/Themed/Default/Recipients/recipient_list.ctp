

<div class="paging">
	<ul class="pagination margin-none">
		<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
	</ul>
</div>
<br />
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
	<thead class="success">
		<?php echo $this->Html->tableHeaders(array('#','Name','Email', 'Action')); ?>
	</thead>
	<tbody>
		<?php if(empty($recipients)): ?>
		<tr>
			<td colspan="4" class="striped-info">No recipient found.</td>
		</tr>
		<?php endif; ?>
		<?php foreach($recipients as $recipient){ ?>
		<tr>
			<td><?php echo $recipient['Recipient']['id']; ?></td>
			<td><?php echo $recipient['Recipient']['name']; ?>&nbsp;</td>
			<td><?php echo $recipient['Recipient']['email_address']; ?></td>
			<td>
				<a data-list-id = '<?php echo $recipient['Recipient']['list_id']; ?>' class="lnk_delete_rec_list no-ajaxify" href="<?php echo $this->Html->url(array('controller' => 'recipients', 'action' => 'delete_recipient', $recipient['Recipient']['id'], $recipient['Recipient']['list_id']  )); ?>"> <i class="icon-trash-can"></i> Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php //echo $this->element("sql_dump"); 
	
	//debug($this->params);

?>

<script>
$(function(){ 
	

	$(".lnk_delete_rec_list" ).click(function(event){
		event.preventDefault();
		if(confirm("Do you want to delete the recipient?")){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				context:this,
				cache: false,
				success: function(results){ 
					
					$.ajax({
						url: '/recipients/recipient_list?list_id='+$(this).attr('data-list-id'),
						type: "get",
						cache: false,
						success: function(results){ 
							$('#recipient_container').html(results);
						}
					});



				}
			});
		}

	});
	

	$(".paging a" ).click(function(event){
		event.preventDefault();
		$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#recipient_container').html(results);
			}
		});
	});
	
	
	
});

</script>
