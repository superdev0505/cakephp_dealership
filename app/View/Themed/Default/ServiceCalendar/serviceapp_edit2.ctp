<?php 
echo $this->Html->script('/app/View/Themed/Default/webroot/js/chosen.jquery.min');
echo $this->Html->css('/app/View/Themed/Default/webroot/css/chosen');
$logged_dealer = AuthComponent::user('dealer_id');
$show_appt_link = array(2501,830);
?>
<style>
.blockUI.blockOverlay{
	z-index:999999!important;
}
.excelWidth {
    margin: 0 auto;
    width: 1000px;
	text-align:center;
}
</style> 
						<div class="wizard">
							<div class="widget widget-tabs widget-tabs-responsive">
								<!-- Widget heading -->
								<?php /*?><div class="widget-head">
									
								</div><?php */?>
								<div class="widget-body"> 
								<?php echo $this->Form->create('ServiceEvent', array('url' =>array('controller' => 'service_calendar','action' => 'update'),'class' => 'form-inline apply-nolazy', 'type' => 'post', 'role'=>"form",'id' => 'ServiceEventServiceappEditForm')); ?>	
							
													
													<?php echo $this->Form->hidden('id'); ?>
                                                    <?php echo $this->Form->hidden('contact_id'); ?>
                                                    <?php echo $this->Form->hidden('ServiceLead.id'); ?>
										
                                                    
											
										<!-- // Step 1 END -->
										                                     
                                        <!-- Step 2 -->
								
											<div class="row">
												<div class="col-12 innerAll"> 
													<?php /*?><font color="red" >*</font>
													<?php  echo $this->Form->input('event_type_id.', array('label'=>'Service Visit Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => $eventTypes));   ?>
													<div class="separator bottom"></div><?php */?>
													
													
													<?php echo $this->Form->input('status', array('label'=>'Service  Appointment - To "close" the Appt. select "Completed" to clear from calendar:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' =>false, 'options' => $event_statuses));	?>
													<div class="separator bottom"></div>
                                                     <?php if($service_settings['ServiceSetting']['advanced_job']){ ?> 
													<font color="red" >*</font>
													<?php echo $this->Form->input('service_job_category_id', array('label'=>'Service Vendor:&nbsp;','div'=>false ,'type' => 'select', 'class' => 'form-control', 'required' => 'required','options' => $service_categories,'empty' => 'Select Vendor','style'=>'width: 100%',)); ?>
													<div class="separator bottom"></div>
                                                     <font color="red" >*</font>
													<?php echo $this->Form->input('service_category_id', array('label'=>'Service Category:&nbsp;','div'=>false ,'type' => 'select', 'class' => 'form-control', 'required' => 'required','options' => $service_sub_categories,'empty' => 'Select Category','style'=>'width: 100%',)); ?>
													<div class="separator bottom"></div>
                                                  <?php } ?>  
													<font color="red" >*</font>
                                                    <label for="ServiceEventEventTypeId">Service Visit Type:&nbsp;</label>
													<?php  echo $this->Form->select('event_type_id', $selectEventTypes,array('div'=>false ,'style'=>'width:100%;','class' => 'chosen-select','required' => 'required', 'multiple' => "multiple",'data-placeholder' => 'Select Service Visit type','id' => 'ServiceJobId','hiddenField' => false));   ?>
													
													<div class="separator bottom"></div>
																								
																		
													<?php echo $this->Form->input('details', array('label'=>'Service Order Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => false)); ?>
													<div class="separator bottom"></div>
                                                    
                                                    <?php echo $this->Form->input('service_status_id', array('type' => 'select', 'label'=>'Service Status:', 'class' => 'form-control','empty'=>'Select Status','options'=>$service_statuses,'style'=>'width: 100%'/*,'readonly' => 'readonly'*/)); ?>
                                                    <div class="separator bottom"></div>
                                                 
													<label>Service Appt. Start Time/Date:&nbsp; 
                                                  <?php if(in_array($logged_dealer,$show_appt_link)){ ?>
                                                    <a href="<?php echo $this->Html->url(array('controller' =>'ServiceCalendar','action'=>'day_view',$this->request->data['ServiceEvent']['start_date'],$this->request->data['ServiceLead']['user_id'])); ?>" class="no-ajaxify" id="checkDayAppoinment">See Appointments</a>
                                                    <?php } ?>
                                                    </label>
													<div class="input-group date" >
                                                  <?php  
											if(isset($this->request->data['ServiceEvent']['start_date']))											
			$this->request->data['ServiceEvent']['start_date']=date('m/d/Y',strtotime($this->request->data['ServiceEvent']['start_date']));		  
												  
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
													<?php echo $this->Form->label('end','Service Appt. End-Date / Time:&nbsp;'); ?>
													<div class="input-group date">
														<?php
			if(isset($this->request->data['ServiceEvent']['end_date']))											
			$this->request->data['ServiceEvent']['end_date']=date('m/d/Y',strtotime($this->request->data['ServiceEvent']['end_date']));											
														 echo $this->Form->input('end_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>
														
														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													<?php echo $this->Form->error('end',null, array('class'=>'has-error help-block')); ?>
													
												<div class="separator bottom"></div>
                                                    <?php /*?><font color="red" >*</font>
                                                    <?php echo $this->Form->input('bay_id', array('type' => 'select', 'label'=>'Service Bays:', 'class' => 'form-control','empty'=>'Select Status','options'=>$service_bays,'style'=>'width: 100%')); ?><?php */?>
												</div>
											</div>
										
										<!-- // Step 2 END -->
										<!-- Step 3 -->
										
										<!-- // Step 3 END -->
										<!-- Step 4 -->
										

									
								
									
									<div class="row">
										
										<div class="col-md-12">
                                        <a class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a>
											<button class="btn btn-success pull-right"   id="SubmitForm" type="submit">Update</button>
										</div>
									</div>
								
								<?php echo $this->Form->end(); ?>
								<?php //echo $this->element('sql_dump'); ?> 								

								</div>
							</div>
						</div>
						
						
						
						
<script>
var $visitTime = <?php echo json_encode($alleventTypeTime); ?>;
var $visitText = <?php echo json_encode($alleventTypes); ?>;

function check_dateTime()
{
	startDate=$('#ServiceEventStartDate').val();
	endDate=$('#ServiceEventEndDate').val();
	$dat_array = startDate.split('/');
	startDate=$dat_array[2]+'-'+$dat_array[0]+'-'+$dat_array[1];
	$dat_array = endDate.split('/');
	endDate=$dat_array[2]+'-'+$dat_array[0]+'-'+$dat_array[1];
	startTime=$('#ServiceEventStartTime').val();
	endTime=$('#ServiceEventEndTime').val();
	if(startTime.match(/pm$/i))
	{
		stparts=startTime.split(':');
		if(stparts[0] != 12)
		stparts[0]=parseInt(stparts[0])+12;
		startTime=stparts[0]+':'+stparts[1];
		
	}
	if(endTime.match(/pm$/i))
	{
		enparts=endTime.split(':');
		if(enparts[0] != 12)
		enparts[0]=parseInt(enparts[0])+12;
		endTime=enparts[0]+':'+enparts[1];
		
	}
	startTime=$.trim(startTime.replace(/[ap]m$/i,''));
	endTime=$.trim(endTime.replace(/[ap]m$/i,''));
	stDateTime=startDate+'T'+startTime+':00';
	endDateTime=endDate+'T'+endTime+':00';
	//console.log(stDateTime);
	//console.log(endDateTime);
	st=new Date(stDateTime);
	end=new Date(endDateTime);
	//console.log(st);
	//console.log(end);
	if(end<=st)
	{
		return false;
	}else{
		return true;
	}
}

function update_chosen_value(currentDataSet)
{
	$minutes = 0;
	$label = '';
	if(currentDataSet){
		for($i=0;$i<currentDataSet.length;$i++)
		{
			if($visitTime[currentDataSet[$i]])
			{
				$minutes += parseInt($visitTime[currentDataSet[$i]]);
				$label += $visitText[currentDataSet[$i]] + ',';
			}
		}
	}
	$("#ServiceEventTitle,#ServiceEventDetails").val( $label);
	add_time($minutes);
}

function update_job_options($options){
$("#ServiceJobId option").each(function(){
	if(!$(this).is(":selected"))
	{
		$(this).remove();
	}
	
	});
	
	$("#ServiceJobId").append($options);
	$('#ServiceJobId').trigger("chosen:updated");
}
function add_time($minutes)
{
	$start_time = $('#ServiceEventStartTime').val();
	//console.log("start time :" + $start_time);
	$time_array = $start_time.split(":");
	hours = parseInt($time_array[0]);
	$time_array = $time_array[1].split(" ");
	minute = parseInt($time_array[0]);
	meridian = $time_array[1];
	e_minute = minute + parseInt($minutes);
	e_hour = parseInt(e_minute/60)+hours;
	e_minute = parseInt(e_minute%60);
	end_time = e_hour + ':' +e_minute;
	if(e_hour >= 12)
	{	
		e_hour = e_hour - 12;
		end_time = e_hour + ':' +e_minute;
		meridian = (meridian == 'PM' && hours != '12')?'AM':'PM';
	}
	end_time += ' '+meridian;
	//console.log("End time :" + end_time);
	$('#ServiceEventEndTime').timepicker('setTime', end_time);
}


if (typeof $.fn.bdatepicker == 'undefined')
	$.fn.bdatepicker = $.fn.datepicker.noConflict();


$(function(){
	
	$(".chosen-select").chosen({no_results_text: "Oops, nothing found!", width : "100%"});
	$("#ServiceEventEventTypeId").change(function(){
		if( $(this).val() != ""){
			$("#ServiceEventTitle").val(  $("#ServiceEventEventTypeId option[value='"+$(this).val()+"']").text()  );
		}
	});


$("#checkDayAppoinment").on('click',function(e){
		e.preventDefault();
		$url = '<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'day_view')); ?>';
		$user_id = '<?php echo $this->request->data['ServiceEvent']['user_id']; ?>';
		$date = $("#ServiceEventStartDate").val();
		if($user_id && $date){
			$dat_array = $date.split('/');
			$date=$dat_array[2]+'-'+$dat_array[0]+'-'+$dat_array[1];
			$url+='/'+$date+"/"+$user_id;
		$.ajax({
			type:'GET',
			url : $url,
			success: function(data){
				
				bootbox.dialog({
							message: data,
							closeButton: true,
							animate:false,
							title: 'Service Appointments',							
						}).find("div.modal-dialog").addClass("excelWidth");
				
				}
			});
		}else{
			alert('Please Select Tech and date.');
		}
		
		
		});


	$(".chosen-select").chosen().change(function(event){
		 var  target = $(event.target),
			 priorDataSet = target.data("chosen-values"),
			 currentDataSet = target.val();
			$minutes = 0;
			$label = '';
			for($i=0;$i<currentDataSet.length;$i++)
			{
				if($visitTime[currentDataSet[$i]])
				{
					$minutes += parseInt($visitTime[currentDataSet[$i]]);
					$label += $visitText[currentDataSet[$i]] + ',';
				}
			}
			$("#ServiceEventTitle,#ServiceEventDetails").val( $label);
			add_time($minutes);
		 });
		 
		 $("#SubmitForm").on('click',function(e){
			 e.preventDefault();
			 $result = check_dateTime();
			 if($result){
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
			 $(this).attr('disabled','disabled');
			 url = $("#ServiceEventServiceappEditForm").attr('action');
			 $.ajax({
				 type : 'POST',
				 url: url,
				 data: $("#ServiceEventServiceappEditForm").serialize(),
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
				}else
				{
					alert('End Date/Time must be greater than Start Date/Time ');
					return false;
				}
			 
			 });
	
		$("#ServiceEventServiceJobCategoryId,#ServiceEventServiceCategoryId").on('change',function(){
		category_id = $("#ServiceEventServiceCategoryId").val();
		vendor_id = $("#ServiceEventServiceJobCategoryId").val();
		if(category_id && vendor_id)
		{
			$.ajax({
				type :'POST',
				url :'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'category_job','serviceapp' => true)); ?>',
				data:{category_id : category_id,vendor_id:vendor_id},
				success: function(data){
						data = $.parseJSON(data);
						//$("#ServiceJobId").html(data.html);
						update_job_options(data.html);
						//window.$visitTime = data.visitTime;
						//window.$visitText = data.visitText;
						//$('#ServiceJobId').trigger("chosen:updated");
					
				}
				});
		}
		});

	
	$("#ServiceEventStartDate").bdatepicker({
		format: 'mm/dd/yyyy',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#ServiceEventEndDate').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});
	
	$("#ServiceEventEndDate").bdatepicker({
		format: 'mm/dd/yyyy',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#ServiceEventStartDate').bdatepicker('setEndDate', FromEndDate);
		 $(this).bdatepicker('hide');
	});
	
	$('#ServiceEventStartTime').timepicker().on('changeTime.timepicker', function(e) {
    console.log('The time is ' + e.time.value);
    console.log('The hour is ' + e.time.hour);
    console.log('The minute is ' + e.time.minute);
    console.log('The meridian is ' + e.time.meridian);
  });
	$('#ServiceEventEndTime').timepicker();
	
	
});


</script>
						
						
						
						
						
						
						
						