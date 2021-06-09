</br></br></br></br>



<div class="innerLR">

	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	

	<div class="widget widget-body-white">
		<div class="widget-body">
				<?php	echo $this->Form->create('ImapServer', array('class' => 'form-inline apply-nolazy','type' => 'post')); ?>
				<div><strong>Edit IMAP Server</strong></div>
				
				<br><br>						
				<div class="row">
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Name:&nbsp; <?php
						echo $this->Form->input('id');

						echo $this->Form->input('name', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Server:&nbsp; <?php
						echo $this->Form->input('url', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					
				</div>
				
				
				
				
				
				<div class="row">
					<div class="col-md-3">
						<a href="<?php echo $this->Html->url(array('action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
					</div>
					
					<div class="col-md-3">
						<button type="submit" class="btn btn-success" id="btn-submit-lead"><i class="fa fa-fw icon-save"></i>Save</button>
					</div>
					
				</div>
					

				<?php echo $this->Form->end(); ?>
		
		</div>
	</div>
</div>



<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	

		$(".alert").delay(3000).fadeOut("slow");
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>




