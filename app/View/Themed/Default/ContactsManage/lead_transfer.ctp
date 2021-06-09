<?php $movelead_allowed_group = $this->App->getDealerSettings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));
							
	$movelead_group = $this->App->default_settings('move_lead_allowed_group');
	if(!empty($movelead_allowed_group['move_lead_allowed_group']))
	{								
		$movelead_group = explode(',',$movelead_allowed_group['move_lead_allowed_group']);
	}
							
 if(in_array($group,$movelead_group)){   ?>

<?php echo $this->Form->create('Contact', array( 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->hidden('contact_id', array('value'=>$contact_id)); ?>
		<font color="red">*</font> <?php echo $this->Form->label('user_id','Select sales person:', array('class'=>'strong')); ?>
		<?php
		echo $this->Form->select('user_id',$users , array(
		'empty' => 'Select',
		'required' => 'required',
		'selected' => '',
		'class' => 'form-control required_input' ,'style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
		<font color="red">*</font> <?php echo $this->Form->label('note','Note:'); ?>
		<?php echo $this->Form->textarea('note', array('class'=>'form-control required_input')); ?>
	</div>
	



	<div class="col-md-12">


		<div class="separator"></div>


		<div class='row'>
			<?php if(!empty($appointment)){
			$is_overdue = ( strtotime('now') > strtotime($appointment['Event']['start']) )? true : false;
			?>
			<div class="col-md-12">

				<strong>Event Set:</strong>
				 <i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
				<span <?php if ($is_overdue == true) { ?> style="color: #CC3A3A;" <?php } ?> >
				<?php echo $appointment['Event']['title']; ?> -
				<?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?>
				<?php echo $appointment['Event']['status']; ?>
				</span>

				<div>
					<input type='radio' name='event_confirm' id='event_confirm_2' value='Leave'> <label for="event_confirm_2">Leave it</label>
					&nbsp;&nbsp;&nbsp;<input type='radio' name='event_confirm' id='event_confirm_1' value='complete'> <label for="event_confirm_1">Complete it</label>
					&nbsp;&nbsp;&nbsp;<input type='radio' name='event_confirm' id='event_confirm_4' value='close_reschedule'> <label for="event_confirm_4">Completed and Reschedule a new one</label>
					<!-- &nbsp;&nbsp;&nbsp;<input type='radio' name='event_confirm' id='event_confirm_3' value='cancel'> <label for="event_confirm_3">Cancel</label> -->
				</div>


				<div class="separator bottom"></div>
				<div class='row' id='new_event_form' style='display: none'>

					<?php echo $this->Form->hidden('Event.editevent', array('value'=>'no')); ?>
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-6">
						<font color="red" >*</font>
						<?php echo $this->Form->label('Event.start_date','  Day of Appointment:&nbsp;'); ?>
						<div class="input-group date" >
							<?php echo $this->Form->input('Event.start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
								<?php echo $this->Form->input('Event.start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							</div>
						</div>
						<?php echo $this->Form->error('Event.start'); ?>
						<div class="separator bottom"></div>
					</div>
					<div class="col-md-6" style='display: none'  >

						<font color="red" >*</font>
						<?php echo $this->Form->label('Event.end_date','Event End-Date / Time:&nbsp;'); ?>
						<div class="input-group date">
							<?php echo $this->Form->input('Event.end_date', array('value'=>'2014-08-15','style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
							<span class="input-group-addon"><i class="fa fa-th"></i></span>

							<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
								<?php echo $this->Form->input('Event.end_time', array('value'=>'10:15 AM', 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','required' => false)); ?>
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							</div>
						</div>
						<?php echo $this->Form->error('Event.end',null, array('class'=>'has-error help-block')); ?>
						<div class="separator bottom"></div>

					</div>

					<div class="col-md-12">
						<?php echo $this->Form->hidden('Event.id'); ?>
						<?php echo $this->Form->input('Event.status', array('label'=>'Status:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'', 'class' => 'form-control', 'required' => false, 'options' => array(
						'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
						'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed' , 'Canceled'=>'Canceled')));
						?> COMPLETE will clear this event
						<div class="separator bottom"></div>
					</div>

				</div>
			</div>
			<?php } ?>

			<div class="col-md-12" type='button'><a id='btn-set-newevent' href='javascript:' class='btn btn-primary'>Set New Event</a> </div>

			<div class="col-md-12" id='popup_new_event' style='display: none'>
				<div class="separator bottom"></div>
				<div class='row'>
					<div class="col-md-6">
						<?php echo $this->Form->hidden('Newevent.create', array('value'=>'no')); ?>
						<?php  echo $this->Form->input('Newevent.event_type_id', array('label'=>'New Event Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => false, 'options' => $eventTypes));   ?>
						<div class="separator bottom"></div>
						<?php echo $this->Form->hidden('Newevent.title'); ?>
					</div>
					<div class="col-md-6">
						<?php echo $this->Form->input('Newevent.status', array('label'=>'New Status:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' => false, 'options' => array(
						'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
						'Rescheduled' => 'Rescheduled')));
						?>
						<div class="separator bottom"></div>
					</div>
				</div>
				<div class='row'>
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-6">
						<font color="red" >*</font>
						<?php echo $this->Form->label('Newevent.start_date','New Day of Appointment:&nbsp;'); ?>
						<div class="input-group date" >
							<?php echo $this->Form->input('Newevent.start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
							<span class="input-group-addon"><i class="fa fa-th"></i></span>
							<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
								<?php echo $this->Form->input('Newevent.start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							</div>
						</div>
						<?php echo $this->Form->error('Newevent.start'); ?>
						<div class="separator bottom"></div>
					</div>

					<div class="col-md-6" style='display: none' >

						<font color="red" >*</font>
						<?php echo $this->Form->label('Newevent.start','New Event End-Date / Time:&nbsp;'); ?>
						<div class="input-group date">
							<?php echo $this->Form->input('Newevent.end_date', array('value'=>'2014-08-15', 'style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
							<span class="input-group-addon"><i class="fa fa-th"></i></span>

							<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
								<?php echo $this->Form->input('Newevent.end_time', array( 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','required' => false)); ?>
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
							</div>
						</div>
						<?php echo $this->Form->error('Newevent.end',null, array('class'=>'has-error help-block')); ?>
						<div class="separator bottom"></div>

					</div>

				</div>
				<div class='row' style='display: none'>
					<div class="col-md-12">
						<?php echo $this->Form->input('Newevent.details', array('label'=>'New Events Notes:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => false)); ?>
					</div>
				</div>


			</div>



		</div>





	</div>







	<div class="col-md-12 text-right">
		<div class="separator"></div>
		<button type="button" id="btn_move_contact" class="btn btn-success" >Move</button>&nbsp;
		<?php
		/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
		if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
		?>
		<button type="button" id="close_child_modal_dialog" class="btn btn-danger close" data-dismiss="modal">Cancel</button>

		<?php
		}else{
		?>
			<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
		<?php
		}
		?>



		<?php // debug($appointment);  ?>




	</div>
</div>
<?php echo $this->Form->end(); ?>

<script>
$(function(){



	//Event Start
	$("#NeweventEventTypeId").change(function(){
		if( $(this).val() != ""){
			$("#NeweventTitle").val(  $("#NeweventEventTypeId option[value='"+$(this).val()+"']").text()  );
		}
	});
	<?php if(empty($appointment)){ ?>
		$("#popup_new_event").hide();
		$("#NeweventCreate").val('no');

		$("#btn-set-newevent").click(function(){
			$("#popup_new_event").toggle();

			if(  $('#popup_new_event').is(':hidden') == false ){
				$("#NeweventCreate").val('yes');
				$(this).html('Hide New Event');
			}else{
				$("#NeweventCreate").val('no');
				$(this).html('Cancel New Event');
			}
		});

	<?php }else{ ?>

	$("#btn-set-newevent").hide();

	<?php } ?>


	$("input[name='event_confirm']").change(function () {

		$("#EventEditevent").val('yes');

	    if($(this).val() == 'complete'  ){

	    	$("#new_event_form").hide();
	    	$("#EventStatus").val('Completed');

	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');

	    }else if($(this).val() == 'Leave'  ){

	    	$("#new_event_form").show();

	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');

	    }else if($(this).val() == 'cancel'  ){

	    	$("#new_event_form").show();
	    	$("#EventStatus").val('Canceled');

	    	$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');

	    }else if($(this).val() == 'close_reschedule'  ){

	    	$("#new_event_form").hide();
	    	$("#EventStatus").val('Completed');

	    	$("#popup_new_event").show();
			$("#NeweventCreate").val('yes');
	    }
	});






	/*Events*/
	$('#EventStartTime, #NeweventStartTime').timepicker();
	$('#EventEndTime, #NeweventEndTime').timepicker();

	$("#EventStartDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		/*
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#EventEndDate').bdatepicker('setStartDate', startDate);
		*/
		 $(this).bdatepicker('hide');
	});

	$("#EventEndDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		/*
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#EventStartDate').bdatepicker('setEndDate', FromEndDate);
		*/
		 $(this).bdatepicker('hide');
	});

	//New Event
	$("#NeweventStartDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		/*
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#NeweventEndDate').bdatepicker('setStartDate', startDate);
		*/
		 $(this).bdatepicker('hide');
	});

	$("#NeweventEndDate").bdatepicker({
		format: 'yyyy-mm-dd',
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		/*
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#NeweventStartDate').bdatepicker('setEndDate', FromEndDate);
		*/
		 $(this).bdatepicker('hide');
	});



	//Event End












	$("#close_modal_dialog").click(function(event)
	{
		event.preventDefault();
		bootbox.hideAll();
	});

	$("#btn_move_contact").click(function(event){
		event.preventDefault();
		if( $("#ContactUserId").val() == ''){
			alert('Please select sales person');
			return true;
		}

		if( $("#ContactNote").val() == ''){
			alert('Please enter note');
			return true;
		}


		//Event Validation Start
		<?php if(!empty($appointment)){ ?>

		var event_radio = $("input[name='event_confirm']:checked").val();
		//console.log('radio', event_radio );
		if(!event_radio){
			alert('Please update your event.');
			return true;
		}


		if($('#EventStartDate').val()== '') {
			$("#EventStartDate").focus();
			alert('You must enter Start Date');
			return true;
		}
		if($('#EventEndDate').val() == '') {
			alert('You must enter End Date');
			return true;
		}
		<?php } ?>

		//Validation for new event
		if($('#NeweventCreate').val() == 'yes') {

			if($('#NeweventEventTypeId').val() == '') {
				alert('You must select  Event Type');
				$('#NeweventEventTypeId').focus();
				return true;
			}
			if($('#NeweventTitle').val() == '') {
				alert('You must enter Event Title');
				$('#NeweventTitle').focus();
				return true;
			}
			if($('#NeweventStatus').val() == '') {
				alert('You must select Event Status');
				$('#NeweventStatus').focus();
				return true;
			}
			if($('#NeweventDetails').val() == '') {
				alert('You must enter Event Details');
				$('#NeweventDetails').focus();
				return true;
			}
			if($('#NeweventStartDate').val()  == '') {
				alert('You must enter Start Date');
				$('#NeweventStartDate').focus();
				return true;
			}
			if($('#NeweventEndDate').val() == '') {
				alert('You must enter End Date');
				$('#NeweventEndDate').focus();
				return true;
			}

		}
		//Event Validation ends


		// alert('valid');
		// return true;
		$("#btn_move_contact").attr('disabled', true);
		$("#btn_move_contact").html('Loading...');

		$.ajax({
			type: "POST",
			cache: false,
			url:  "/contacts_manage/move_contact/",
			data: $("#ContactLeadTransferForm").serialize(),
			success: function(data){
				<?php
				/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
				if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
				?>
					$("#close_child_modal_dialog").click();
				<?php
				}else{
				?>
					location.href = "/contacts/leads_main/view/<?php echo $contact_id; ?>";
				<?php
				}
				?>
			}
		});






	});

});

</script>



<?php }else{  ?>
You are not authorized to make this change
<?php }  ?>
