<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-upload " style="font-size:20px;"></i>&nbsp;<b>File Upload</b></span> </div>
				<div class="pull-right"> <span class="strong innerLR"> <?php //echo $datetime; ?>&nbsp;
                                        
<!--                                        - <i><span class="label label-white label">No Outages Reported</span></i>-->
                                        
                                    </span> </div>
				<div class="clearfix"></div>
			</div>
			
			<div class="widget-body">
				<div style="width: 100%;">
				
					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('ProjectFile',array('class'=>'form-horizontal apply-nolazy','role'=>"form",'type'=>'file' )); ?>
					
                                     <div class="form-group"> <?php echo $this->Form->label('file1', 'Attachment-1:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('file1',array('type'=>'file', 'div'=>false,'label'=>false,'class'=>'form-control')); ?> </div>
					</div>
                                    
                                     <div class="form-group"> <?php echo $this->Form->label('file2', 'Attachment-2:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('file2',array('type'=>'file', 'div'=>false,'label'=>false,'class'=>'form-control')); ?> </div>
					</div>
                                    
                                     <div class="form-group"> <?php echo $this->Form->label('file3', 'Attachment-3:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('file3',array('type'=>'file', 'div'=>false,'label'=>false,'class'=>'form-control')); ?> </div>
					</div>
                                    
                                    
					<div class="pull-right">
						<button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Submit</button>
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
    
    /*
    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
*/
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");


	$("#ProjectFileFileUploadForm").submit(function(){

		//console.log('dd');
		$("#submit_support").attr('disabled',true);

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 
