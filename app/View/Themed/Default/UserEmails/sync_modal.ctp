
<div class="innerLR">
	
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			<div class="">
				<!-- Widget heading -->
				
		    	<!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">
						<div>
							<a href="<?php echo $this->Html->url(array('action'=>'start_sync')); ?>" id='btn-email-sync1' class="btn btn label-success no-ajaxify"><font color="white">
								<i class="fa fa-refresh"></i> Start Email Synchronization</font> 
							</a>
							Last Sync:  <?php echo ($last_run != null)? date('D - M d, Y g:i A',strtotime($last_run)) : "Never" ?>
							
						</div>
						<div class="clearfix"></div>
						<div class="clearfix"></div>
					</div>
					<!-- // Filters END -->
					<div id='sync_result1'>
						

					</div>	


				</div>
			</div>
		</div>
			<!-- // Widget END -->
	</div>
</div>


<script>
	
$(function(){ 
	
	
	$('#btn-email-sync1').click(function(event){
		event.preventDefault();
		$("#sync_result1").html('Sync in progress...');
		$("#btn-email-sync-modal").html('Sync in progress...');


		$(this).attr('disabled', true);
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				$("#sync_result1").html(data);
				 //alert(data);
				 $("#btn-email-sync-modal").html('Email Sync');

				bootbox.dialog({
					message: data,
					title: "Email Sync",
				});

				$('#btn-email-sync1').attr('disabled', false);
			}
		});

		bootbox.hideAll();



	});



	
});

</script>