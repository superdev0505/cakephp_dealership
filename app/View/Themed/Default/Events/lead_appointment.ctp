<?php echo $this->Form->create('Event', array('class' => 'form-inline apply-nolazy','id' =>'EventLeadAppointmentForm', 'type' => 'post', 'role'=>"form")); ?>
<div class="row">
												<div class="col-12 innerAll"> 
												
													<font color="red" >*</font>
													<?php echo $this->Form->label('start_date','  Event Start-Date / Time:&nbsp;'); ?>
													<div class="input-group date" >
														<?php echo $this->Form->input('start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>
														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													<?php echo $this->Form->error('start'); ?>
													
												<?php /*?>	<div class="separator bottom"></div>
													
													<font color="red" >*</font>
													<?php echo $this->Form->label('start','Event End-Date / Time:&nbsp;'); ?>
													<div class="input-group date">
														<?php echo $this->Form->input('end_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>
														
														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','value' =>date('h:i A',strtotime('+1 hour')))); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													<?php echo $this->Form->error('end',null, array('class'=>'has-error help-block')); ?>
                                                    											
													
													<div class="separator bottom"></div><?php */?>
                                                    <div class="separator bottom"></div>
													
													<font color="red" >*</font>
													<?php echo $this->Form->input('title', array('label'=>'Event Title:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>
													
													<font color="red" >*</font>
													<?php echo $this->Form->input('details', array('label'=>'Event Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>
													<input type="submit" id="submitForm" value="Save" class="btn btn-primary pull-right"  />
												</div>
											</div>
<script type="text/javascript">
function validate_form()
{
	$start_date = $("#EventStartDate").val();
	$end_date 	= $("#EventEndDate").val();
	$start_time = $("#EventStartTime").val();
	$end_time 	= $("#EventEndTime").val();	
	$event_title = $.trim($("#EventTitle").val());
	$event_details = $.trim($("#EventDetails").val());
	if($start_date  == '')
	{
		alert('Please Select start date of event');
		$("#EventStartDate").focus();
		return false;
	}else if($end_date  == ''){
		alert('Please Select end date of event');
		$("#EventEndDate").focus();
		return false;
	}
	
}

$(document).ready(function(){
						   
		$("#EventStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#EventEndDate').bdatepicker('setStartDate', startDate);
			
		});
		
		$("#EventEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#EventStartDate').bdatepicker('setEndDate', FromEndDate);
		});
		$('#EventStartTime').timepicker();
		$('#EventEndTime').timepicker();
						   
		$("#EventLeadAppointmentForm").on('submit',function(e){
				e.preventDefault();
				$("#submitForm").attr('disabled','disabled');
				window.parent.appoinment_set = true;
				$.ajax({
							type: "POST",
							
							url:  $("#EventLeadAppointmentForm").attr('action'),
							data: $("#EventLeadAppointmentForm").serialize(),
							success: function(data){
								//bootbox.hideAll();
								$("div.midWidth").parent().modal('hide');
								if(data != 'failure')
								{
									$("#BdcSurveyEventId").val(data);
									$("#BdcMainDiv").prepend('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Appointment Created Successfully</div>');
						removeAlert();
								}else
								{
									$("#BdcMainDiv").prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Appointment could not be created Please try again!!</div>');
						removeAlert();
								}
								
								}
					   });
				
				 });				   
	 });

</script>