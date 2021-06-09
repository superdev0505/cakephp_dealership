<br><br><br>
<div class="innerAll">


	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<div class="row">
				<div class="col-md-3">	
					<a id="btn_new_list" href="/lists/add" class="btn btn-success no-ajaxify"><i class="fa fa-plus"></i> Create New List</a>
				</div>
			</div>
		</div>
	</div>




	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">

			<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
				<thead class="success">
					<?php echo $this->Html->tableHeaders(array('#','List Name','Number Recipient', 'Created', 'Action')); ?>
				</thead>
				<tbody>
					<?php if(empty($lists)): ?>
					<tr>
						<td colspan="6" class="striped-info">No Recipient List Found</td>
					</tr>
					<?php endif; ?>
					<?php foreach($lists as $list): ?>
					<tr>
						<td><?php echo $list['List']['id']; ?></td>
						<td><?php echo $list['List']['list_name']; ?></td>
						<td><?php echo $list['List']['total_recipient']; ?></td>
						<td><?php echo  date('m/d/Y g:i A', strtotime($list['List']['created'])); ?></td>
						<td width='200'>
							<a class="lnk_edit_user no-ajaxify"
							 href="<?php echo $this->Html->url(array('controller' => 'recipients', 'action' => 'add', '?' => array('key' => base64_encode($list['List']['id']) ) )); ?>"> 
								Manage Recipient
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>	
	</div>	

	<a class="btn btn-primary" href="/marketing">Back</a>	

<?php echo $this->element("sql_dump"); ?>

</div>	




<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	$("#btn_new_list" ).click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/lists/add",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Create New List",
				});
			}
		});

	});
	

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

