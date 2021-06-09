<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-tasks "  style="font-size:20px;"></i>&nbsp;Add Note</span> </div>
				<div class="clearfix"></div>
			</div>
			
			<div class="widget-body">
				<div class="innerLR">
				
					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('Note',array('url' => array('controller' => 'projects','action' => 'addnote',$pinfo['Project']['id']),'class'=>'form-horizontal apply-nolazy','role'=>"form",'type'=>'file')); ?>
					
					
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="DevteamDailySevarity">Project Name:</label>				  <div class="col-sm-10" style="padding-top: 10px;"> 
                            <?php
                            echo $pinfo['Project']['name'];
                            ?>
                        </div>
                    </div>
                                    
                <div class="form-group"> <?php echo $this->Form->label('to_others', 'Send To:',array('class'=>"col-sm-2 control-label")); ?>
                    <div class="col-sm-10"> 
                        <div style="display: inline-block; margin-top: 0;" class=""> 
                                                    <label class="status-done1"> 
                                                        <input id="selecctall" type="checkbox" value="sa" name="sa" > Select All
                    <!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                                        
                                                    </label> 
                                                </div>
                                         
                                            <br/>
                                            <div style="display: inline-block; margin-top: 0;" class=""> 
                            <label class="status-done1"> 
                                <input  disabled="true" checked="true" type="checkbox" value="andrew@dp360crm.com" name="to_others[]" >
    <!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                Tod Kilgore
                            </label> 
                        </div>
                        <?php
                        foreach ($emails as $evalue) {
                            ?> 
                            <div style="display: inline-block; margin-top: 0;" class=""> 
                                <label class="status-done1"> 
                                    <input  class="checkbox1" type="checkbox" value="<?php echo $evalue['Emailnote']['email']?>" name="to_others[]" >
<!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                        <?php echo $evalue['Emailnote']['name']?>
                                </label> 
                            </div>
                        &nbsp;&nbsp;
                            <?php
                        }
                        ?> 


                            </div>
                    </div>
					<div class="form-group"> <?php echo $this->Form->label('note', 'Note:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('note',array('type'=>'textarea','required'=>'required', 'rows'=>5, 'div'=>false,'label'=>false,'placeholder'=>"Enter Note",'class'=>'form-control')); ?> </div>
					</div>
					
					<?php echo $this->Form->input('project_id', array('type' => 'hidden', 'value' =>$pinfo['Project']['id'])); ?>
					<?php //echo $this->Form->input('created', array('type' => 'hidden', 'value' => "$datetime2")); ?>
					<?php //echo $this->Form->input('modified', array('type' => 'hidden', 'value' => "$datetime2")); ?> 
					
                                    
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

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");


	$("#NoteAddnoteForm").submit(function(){

		//console.log('dd');
		$("#submit_support").attr('disabled',true);

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 
