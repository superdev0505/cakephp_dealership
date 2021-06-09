<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-group " style="font-size:20px;"></i>&nbsp;Update Developer</span> </div>
				<div class="pull-right"> <span class="strong innerLR"> <?php //echo $datetime; ?>&nbsp;
                                        
<!--                                        - <i><span class="label label-white label">No Outages Reported</span></i>-->
                                        
                                    </span> </div>
				<div class="clearfix"></div>
			</div>
			
			<div class="widget-body">
				<div style="width: 100%;">
				
					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('Developer',array('class'=>'form-horizontal apply-nolazy','role'=>"form" )); ?>
					<div class="form-group"> <?php echo $this->Form->label('name', 'Name:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('name',array('type'=>'text','required'=>'required', 'div'=>false,'label'=>false,'placeholder'=>"Enter name",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('email', 'Email:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('email',array('type'=>'text','required'=>'required', 'div'=>false,'label'=>false,'placeholder'=>"Enter email",'class'=>'form-control')); ?> </div>
					</div>
					<div class="pull-right">
						<button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Update</button>
					</div>
					<div class="clearfix"></div>
					
					<?php echo $this->Form->end(); ?> 
					
				</div>
			</div>
			
			
		</div>
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");


	$("#DeveloperEditForm").submit(function(){

		//console.log('dd');
		$("#submit_support").attr('disabled',true);

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 
