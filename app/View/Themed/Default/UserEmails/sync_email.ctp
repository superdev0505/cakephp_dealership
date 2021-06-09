<br>
<br>
<br>
<br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->
				
		    	<!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">
						<div>
							
							<?php if(!empty($smtp_settings)){ ?>

							<a href="<?php echo $this->Html->url(array('action'=>'start_sync')); ?>" id='btn-email-sync' class="btn btn label-success no-ajaxify"><font color="white">
								<i class="fa fa-refresh"></i> Start Email Synchronization</font> 
							</a>
							Last Sync:  <?php echo ($last_run != null)? date('D - M d, Y g:i A',strtotime($last_run)) : "Never" ?>

							<?php }else{ ?>

								<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>	
								Email feature is off

							<?php } ?>
							
						</div>
						<div class="clearfix"></div>
						<div class="clearfix"></div>
					</div>
					<!-- // Filters END -->
					<div id='sync_result'>
						List of Emails

					</div>	


				</div>
			</div>
		</div>
			<!-- // Widget END -->
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	$('#btn-email-sync').click(function(event){
		event.preventDefault();
		$("#sync_result").html('Sync in progress...');
		$(this).attr('disabled', true);
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				$("#sync_result").html(data);
				$('#btn-email-sync').attr('disabled', false);
			}
		});

	})



	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>