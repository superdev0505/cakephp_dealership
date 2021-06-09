<div class="modal fade" id="service-job-add-modal">
	
	<div class="modal-dialog" style="width: 600px;">
		<div class="modal-content">
	
			<?php echo $this->Form->create('ServiceEventType', array('url' => array('controller'=>'service_settings','action' => 'add_job_type') ,'id'=>'ServiceEventTypeForm','class' => 'form-inline'));
			echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
			 ?>
			<!-- Modal body -->
            <div class="modal-body">
			<div class="row" style="padding:20px;">
				<legend>Add Service Visit Type</legend>
                <div class="separator"></div>
				
                      <?php if($service_settings['ServiceSetting']['advanced_job']){ ?> 
						 <div class="col-md-12">
							<?php echo $this->Form->label('service_job_category_id','Service Vendor', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('service_job_category_id',array('required'=>true,'class' => 'form-control','label' => false,'div' => false,'type' =>'select','empty' => 'Select Service Category','options' => $service_categories));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
                            
						</div>
                        <div class="separator bottom"></div>
                        <div class="col-md-12">
							<?php echo $this->Form->label('service_category_id','Service Category', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('service_category_id',array('required'=>true,'class' => 'form-control','label' => false,'div' => false,'type' =>'select','empty' => 'Select Service Category','options' => $service_sub_categories));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
                           
						</div>
                         <div class="separator bottom"></div>
                        <?php } ?>
                         <div class="col-md-12">
							<?php echo $this->Form->label('name','Visit Type', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control','id'=>'EventTypeName'));	?>						<?php echo $this->Form->error('name');	?>
							</div>
                           
                             </div>
                          <div class="separator bottom"></div>
						<div class="col-md-12" style="margin-top:10px;">
						<?php echo $this->Form->label('est_time','Est. Time', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
                            	<div class="row">
                                    <div class="col-md-5" >
                                    <div class="input-group">
                                    <?php echo $this->Form->text('est_time',array('required'=>true,'class' => 'form-control','pattern' => '[0-9]{1,2}','id'=>'EventTypeHour'));	?>
                                    <?php echo $this->Form->error('est_time');	?>
                                    <div class="input-group-addon">Hours</div>
                                    </div>
                                    </div>
                                    <div class="col-md-5">
                                    <div class="input-group">
                                    <?php echo $this->Form->text('est_minutes',array('required'=>true,'class' => 'form-control','pattern' => '[0-9]{1,2}','id'=>'EventTypeMinute'));	?>
                                    <?php echo $this->Form->error('est_minutes');	?>
                                    <div class="input-group-addon">minutes</div>
                                    </div>
                                    </div>
                                </div>
                              </div>
                       
                        </div>
                         <div class="separator bottom"></div>
                      <a href="#" class="btn btn-danger pull-left" id="close_service_job_modal" >Cancel</a>
					
					<button id="ServiceEventTypeSubmit" type="button"  class="btn btn-success pull-right">Add</button>  
						
				</div>
              </div> 
			<?php echo $this->Form->end(); ?>	
	</div>
</div>   		
</div>		
<script type="text/javascript">

$("#ServiceEventTypeSubmit").on('click',function(e){
	e.preventDefault();
	$.ajax({
			type :'POST',
			url :$("#ServiceEventTypeForm").attr('action'),
			data:$("#ServiceEventTypeForm").serialize(),
			success: function(data){
					$("#ServiceEventTypeForm")[0].reset();
					data = $.parseJSON(data);
					$("#ServiceJobId").append(data.html);
					currentDataSet=$("#ServiceJobId").val();
					window.$visitTime = data.visitTime;
					window.$visitText = data.visitText;
					$('#ServiceJobId').trigger("chosen:updated");
					$("#service-job-add-modal").modal('hide'); 
					$("#no-visit-type").hide();
					update_chosen_value(currentDataSet);			
			}
		});
	
	});
$("#close_service_job_modal").on('click',function(e){
	e.preventDefault();
	 $("#service-job-add-modal").modal('hide'); 
	});	
</script>    