						<div class="wizard">
							<div class="widget widget-tabs widget-tabs-responsive">
								<!-- Widget heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a href="#tab1-1"  data-toggle="tab"><i></i>Lead</a></li>
										<li><a href="#tab2-1"  data-toggle="tab"><i></i>Event</a></li>
										<li><a href="#tab3-1" data-toggle="tab"><i></i>Date/Time</a></li>
										<li><a href="#tab4-1" class="" data-toggle="tab"><i></i>History</a></li>
									</ul>
								</div>
								<div class="widget-body">
								<?php echo $this->Form->create('Event', array('class' => 'form-inline apply-nolazy', 'type' => 'post', 'role'=>"form")); ?>
									<div class="tab-content">

										<!-- Step 1 -->
										<div class="tab-pane active" id="tab1-1">
											 <div class="row">
												<div class="col-12 innerAll">
													<input type="hidden"  id="inputTitle" class="col-md-6 form-control" value="123" />

													<?php echo $this->Form->hidden('id'); ?>


													<?php echo $this->Form->label('first_name', 'First Name:'); ?>
													<?php echo $this->Form->text('first_name', array('class' => 'form-control', 'readonly' => 'readonly', 'value' => $fname)); ?>
													<div class="separator bottom"></div>

													<?php echo $this->Form->label('last_name', 'Last Name:'); ?>
													<?php echo $this->Form->text('last_name', array('class' => 'form-control', 'readonly' => 'readonly', 'value' => $lname)); ?>
													<div class="separator bottom"></div>
													<?php $x = AuthComponent::user('full_name'); //echo $x;    ?>
													<?php echo $this->Form->input('user', array('type' => 'text','label'=>'Sales Person:', 'div'=>false, 'class' => 'form-control', 'readonly' => 'readonly', 'value' => $x)); ?>
													<?php echo $this->Form->input('sperson', array('type' => 'hidden','value' => $x)); ?>


													<div class="separator bottom"></div>
													<?php echo $this->Form->input('mobile', array('type' => 'text','label'=>'Mobile#', 'class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly')); ?>

													<div class="separator bottom"></div>
													<?php echo $this->Form->input('phone', array('type' => 'text', 'label'=>'Phone#', 'class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly')); ?>



													<div class="separator bottom"></div>


													<?php echo $this->Form->input('email', array('type' => 'text', 'label'=>'Email:', 'class' => 'form-control', 'required' => 'required','readonly' => 'readonly')); ?>

													<div class="separator bottom"></div>
												</div>
											</div>
										</div>
										<!-- // Step 1 END -->
										<!-- Step 2 -->
										<div class="tab-pane" id="tab2-1">
											<div class="row">
												<div class="col-12 innerAll">
													<font color="red" >*</font>
													<?php  echo $this->Form->input('event_type_id', array('label'=>'Event Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => $eventTypes));   ?>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->input('status', array('label'=>'Event Status - To "close" the Event select "Completed" to clear from calendar:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' => 'required', 'options' => array(
													'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
													'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed','Canceled'=>'Canceled')));	?>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->input('title', array('label'=>'Event Title:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->input('details', array('label'=>'Event Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>
												</div>
											</div>
										</div>
										<!-- // Step 2 END -->
										<!-- Step 3 -->
										<div class="tab-pane" id="tab3-1">
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

													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->label('start','Event End-Date / Time:&nbsp;'); ?>
													<div class="input-group date">
														<?php echo $this->Form->input('end_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
														<span class="input-group-addon"><i class="fa fa-th"></i></span>

														<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
															<?php echo $this->Form->input('end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>
													</div>
													<?php echo $this->Form->error('end',null, array('class'=>'has-error help-block')); ?>

													<br />
													<br />
													<br />
													<br /><br /><br /><br />
													<div class="separator bottom"></div>

												</div>
											</div>
										</div>
										<!-- // Step 3 END -->
										<!-- Step 4 -->
										<div class="tab-pane" id="tab4-1">
											<div class="row">
												<div style="max-height: 280px; overflow: auto;">
													<table class="table table-striped table-responsive swipe-horizontal ">
														<!-- Table heading -->
														<thead>
															<tr>
																<th>Event Type</th>
																<th>Event Status</th>
																<th>Event Title</th>
																<th>Schedule</th>
																<th>Date</th>
															</tr>
														</thead>
														<!-- // Table heading END -->
														<!-- Table body -->
														<tbody>
															<!-- Table row -->
															<?php foreach ($histories as $entry) { ?>
															<tr class="gradeA">
																<td><?php echo $entry['History']['make']; ?>&nbsp;</td>
																<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
																<td><?php echo $entry['History']['notes']; ?>&nbsp;</td>
																<td>
																	<?php echo date("m/d/Y g:i A",strtotime($entry['History']['start_date'])); ?> -
																	<?php echo date("m/d/Y g:i A",strtotime($entry['History']['end_date'])); ?>
																</td>
																<td><?php echo ($entry['History']['created']!='')?  $this->Time->format('n/j/Y g:i A', $entry['History']['created'])   : "" ?>&nbsp;</td>
															</tr>
															<?php } ?>
															<!-- // Table row END -->
														</tbody>
														<!-- // Table body END -->
													</table>
												</div>
												<div class="separator bottom"></div>
											</div>
										</div>


									</div>

									<div class="row">

										<div class="col-md-12">
											<div class="pagination pull-right margin-none" >

												<!-- Wizard pagination controls -->
												<ul class="pagination margin-bottom-none">
													<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
													<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
                                                    <li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
													<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>

													<li class="next finish primary" style="display:none;">
														<button class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
													</li>
												</ul>
												<!-- // Wizard pagination controls END -->

											</div>
										</div>
									</div>

								<?php echo $this->Form->end(); ?>
								</div>
							</div>
						</div>




<script>


if (typeof $.fn.bdatepicker == 'undefined')
	$.fn.bdatepicker = $.fn.datepicker.noConflict();


$(function(){


	$("#EventEventTypeId").change(function(){
		if( $(this).val() != ""){
			$("#EventTitle").val(  $("#EventEventTypeId option[value='"+$(this).val()+"']").text()  );
		}
	});




	$("#EventStartDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#EventEndDate').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});

	$("#EventEndDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#EventStartDate').bdatepicker('setEndDate', FromEndDate);
		 $(this).bdatepicker('hide');
	});

	$('#EventStartTime').timepicker();
	$('#EventEndTime').timepicker();


	var bWizardTabClass = '';
	$('.wizard').each(function()
	{
		if ($(this).is('#rootwizard'))
			bWizardTabClass = 'bwizard-steps';
		else
			bWizardTabClass = '';

		var wiz = $(this);

		$(this).bootstrapWizard(
		{
			onNext: function(tab, navigation, index)
			{
				if(index==2){
					if(!wiz.find('#EventEventTypeId').val()) {
						alert('You must select  Event Type');
						wiz.find('#EventEventTypeId').focus();
						return false;
					}
					if(!wiz.find('#EventStatus').val()) {
						alert('You must select Event Status');
						wiz.find('#EventStatus').focus();
						return false;
					}
					if(!$.trim(wiz.find('#EventTitle').val())) {
						alert('You must enter Event Title');
						wiz.find('#EventTitle').focus();
						return false;
					}
					if(!$.trim(wiz.find('#EventDetails').val())) {
						alert('You must enter Event Details');
						wiz.find('#EventDetails').focus();
						return false;
					}

				}

			},
			onLast: function(tab, navigation, index)
			{

			},
			onTabClick: function(tab, navigation, index)
			{


			},
			onTabShow: function(tab, navigation, index)
			{
				var $total = navigation.find('li:not(.status)').length;

				var $current = index+1;
				var $percent = ($current/$total) * 100;

				if (wiz.find('.progress-bar').length)
				{
					wiz.find('.progress-bar').css({width:$percent+'%'});
					wiz.find('.progress-bar')
						.find('.step-current').html($current)
						.parent().find('.steps-total').html($total)
						.parent().find('.steps-percent').html(Math.round($percent) + "%");
				}

				// update status
				if (wiz.find('.step-current').length) wiz.find('.step-current').html($current);
				if (wiz.find('.steps-total').length) wiz.find('.steps-total').html($total);
				if (wiz.find('.steps-complete').length) wiz.find('.steps-complete').html(($current-1));

				// mark all previous tabs as complete
				navigation.find('li:not(.status)').removeClass('primary');
				navigation.find('li:not(.status):lt('+($current-1)+')').addClass('primary');

				// If it's the last tab then hide the last button and show the finish instead
				if($current >= $total) {
					wiz.find('.pagination .next').hide();
					wiz.find('.pagination .finish').show();
					wiz.find('.pagination .finish').removeClass('disabled');
				} else {
					wiz.find('.pagination .next').show();
					wiz.find('.pagination .finish').hide();
				}
			},
			tabClass: bWizardTabClass,
			nextSelector: '.next',
			previousSelector: '.previous',
			firstSelector: '.first',
			lastSelector: '.last'
		});

		wiz.find('.finish').click(function()
		{

			//tab two start
			if(!wiz.find('#EventEventTypeId').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select  Event Type');
				wiz.find('#EventEventTypeId').focus();
				return false;
			}
			if(!wiz.find('#EventStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must select Event Status');
				wiz.find('#EventStatus').focus();
				return false;
			}
			if(!$.trim(wiz.find('#EventTitle').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Title');
				wiz.find('#EventTitle').focus();
				return false;
			}
			if(!$.trim(wiz.find('#EventDetails').val())) {
				wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
				alert('You must enter Event Details');
				wiz.find('#EventDetails').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(1).css('color','black');
			//tab two end
			//tab three start
			if(!wiz.find('#EventStartDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Start Date');
				wiz.find('#EventStartDate').focus();
				return false;
			}
			if(!wiz.find('#EventEndDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter End Date');
				wiz.find('#EventEndDate').focus();
				return false;
			}
			startDate=wiz.find('#EventStartDate').val();
					endDate=wiz.find('#EventEndDate').val();
					startTime=wiz.find('#EventStartTime').val();
					endTime=wiz.find('#EventEndTime').val();
					if(startTime.match(/pm$/i))
					{
						stparts=startTime.split(':');
						stparts[0]=parseInt(stparts[0])+12;
						startTime=stparts[0]+':'+stparts[1];

					}
					if(endTime.match(/pm$/i))
					{
						enparts=endTime.split(':');
						enparts[0]=parseInt(enparts[0])+12;
						endTime=enparts[0]+':'+enparts[1];

					}
					startTime=$.trim(startTime.replace(/[ap]m$/i,''));
					endTime=$.trim(endTime.replace(/[ap]m$/i,''));
					stDateTime=startDate+'T'+startTime+':00';
					endDateTime=endDate+'T'+endTime+':00';
					st=new Date(stDateTime);
					end=new Date(endDateTime);
					if(end<st)
					{
						wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
						alert('End Date/Time must be greater than Start Date/Time ');
						wiz.find('#EventEndDate').focus();
						return false;
					}

			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			//tab three end




			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});
});


</script>
