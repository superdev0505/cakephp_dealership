
							<div class="widget">
								<!-- Widget heading -->
								<div class="widget-head">
									&nbsp;&nbsp;<strong>Add Time</strong>
								</div>
								<div class="widget-body"> 
								<?php echo $this->Form->create('TechEvent', array('class' => 'form-inline apply-nolazy', 'type' => 'post', 'role'=>"form"));
								if($edit_mode)
								{
									echo $this->Form->hidden('id');
								}
								
								 ?>	
																
											<div class="row">
												<div class="col-12 innerAll"> 
                                                <font color="red" >*</font>
												<?php 
												echo $this->Form->input('break_type',array('type' => 'text', 'class' => 'form-control', 'required' => 'required','label'=>'Break Type:',));												
												?>
                                                <div class="separator bottom"></div>
													<font color="red" >*</font>
													<?php echo $this->Form->label('start_date','Start Time/Date:&nbsp;'); ?>
													<div class="input-group date" >
														<?php 
				if(isset($this->request->data['TechEvent']['start_date']))											
				$this->request->data['TechEvent']['start_date']=date('m/d/Y',strtotime($this->request->data['TechEvent']['start_date']));
														
														echo $this->Form->input('start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>
														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													
													<?php echo $this->Form->error('start'); ?>
													
													<div class="separator bottom"></div>
													
													<font color="red" >*</font>
													<?php echo $this->Form->label('end','End-Date / Time:&nbsp;'); ?>
													<div class="input-group date">
														<?php 
			if(isset($this->request->data['TechEvent']['end_date']))											
			$this->request->data['TechEvent']['end_date']=date('m/d/Y',strtotime($this->request->data['TechEvent']['end_date']));
														echo $this->Form->input('end_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>
														
														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													<?php echo $this->Form->error('end',null, array('class'=>'has-error help-block')); ?>
                                                    <div class="separator bottom"></div>
                                                  <?php /*?>  <?php
													if(!isset($this->request->data['TechEvent']['bay_id']))
													{
														$this->request->data['TechEvent']['bay_id']=5;
													}
													
													 echo $this->Form->input('bay_id', array('type' => 'select', 'label'=>'Service Bays:', 'class' => 'form-control','empty'=>'Select Bay','options'=>$service_bays,'style'=>'width: 100%')); ?>
													
													<div class="separator bottom"></div><?php */?>
                                                    
                                                    <?php
													$readOnly = false;
													if(isset($this->request->data['TechEvent']['id']))
													{
														$readOnly = true;
													}
													 echo $this->Form->input('user_id', array('type' => 'select', 'label'=>'Tech:', 'class' => 'form-control','empty'=>'Select Tech','options'=>$users,'style'=>'width: 100%','disabled' => $readOnly)); ?>
                                                    <div class="separator bottom"></div>
                                                    <?php echo $this->Form->input('detail', array('label'=>'Details:', 'class' => 'form-control')); ?>
                                                    <div class="separator bottom"></div>
                                                      <div class="separator bottom"></div>
                              				<div class="align-center"><button type="submit" class="btn btn-info">Submit</button></div>
												</div>
											</div>
									
										<!-- // Step 3 END -->
										<!-- Step 4 -->
										

								
									
									
								
								<?php echo $this->Form->end(); ?>
								<?php //echo $this->element('sql_dump'); ?> 								

								</div>
							</div>
					
						
						
						
						
<script>
function submit_appointment()
{
	$.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
			'z-index':'9999991',
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
	$url=$("#TechEventServiceappAddBreakForm").attr('action');
	$.ajax({
		type: 'POST',
		data: $("#TechEventServiceappAddBreakForm").serialize(),
		url:$url,
		success: function(data){
			$('#calendar').fullCalendar('render');
			$.unblockUI();
			bootbox.hideAll();
			
		},
		error:function ( jqXHR,status,errorThrown){
				$.unblockUI();
				alert("Error Occured while saving appoinment "+ status);
		}
		
		});
		
}

if (typeof $.fn.bdatepicker == 'undefined')
	$.fn.bdatepicker = $.fn.datepicker.noConflict();


$(function(){
	$("#TechEventStartDate").bdatepicker({
		format: 'mm-dd-yyyy',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#TechEventEndDate').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});
	
	$("#TechEventEndDate").bdatepicker({
		format: 'mm-dd-yyyy',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#TechEventStartDate').bdatepicker('setEndDate', FromEndDate);
		 $(this).bdatepicker('hide');
	});
	
	$('#TechEventStartTime').timepicker({
		minTime:'<?php echo $service_timings['ServiceSetting']['start']; ?>',
		maxTime:'<?php echo $service_timings['ServiceSetting']['end']; ?>',
		});
	$('#TechEventEndTime').timepicker({
		minTime:'<?php echo $service_timings['ServiceSetting']['start']; ?>',
		maxTime:'<?php echo $service_timings['ServiceSetting']['end']; ?>',
		});
	$("#TechEventTechId").on('change',function(){
		view_text = $("#TechEventTechId option:selected").text();
		event_type =$("#TechEventBreakType").val();
		$("#TechEventDetail").val(event_type+' - '+view_text);
		});	
		
$("#TechEventServiceappAddBreakForm").on('submit',function(e){
	e.preventDefault();
	/*if($.trim($("#TechEventBayId").val())=='')
	{
		alert('Please select service bay');
		$("#TechEventBayId").focus();
		return false;
	}*/
	 if($.trim($("#TechEventUserId").val())=='')
	{
		alert('Please select tech');
		$("#TechEventUserId").focus();
		return false;
	}
	else if($.trim($("#TechEventDetail").val())=='')
	{
		alert('Please enter Details');
		$("#TechEventDetail").focus();
		return false;
	}
	submit_appointment();
	});

	
	
});


</script>
						
						
						
						
						
						
						
						