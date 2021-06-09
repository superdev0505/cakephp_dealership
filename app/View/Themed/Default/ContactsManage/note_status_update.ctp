<?php echo $this->Form->create('Contact', array('type'=>'file','class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>

	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

	<?php

	 if(isset($this->request->query['spit_deal_update']) && $this->request->query['spit_deal_update'] == 'yes' ){
	 	echo $this->Form->input('spit_deal_update', array('type' => 'hidden', 'value' => 'yes'));
	 }else{
	 	echo $this->Form->input('spit_deal_update', array('type' => 'hidden', 'value' => 'no'));
	 }

	?>




		<?php echo $this->Form->input('current_status', array('type' => 'hidden','value'=>$contact_info['Contact']['status'])); ?>

	<div style="">


		<div class="row">

			<?php if($update_type == 'Showroom Visit Update'  && $contact_info['Contact']['sales_step']  != 'Sold'){ ?>
			<div class="col-md-6">
				<font color="red">*</font>
				<?php echo $this->Form->label('sales_step','Step:', array('class'=>'strong')); ?>
				<?php
				echo $this->Form->select('sales_step',$sales_step_options , array(
				'empty' => 'Select',
				'required' => 'required',
				'class' => 'form-control required_input' ,'style'=>'width: 100%'
				));
				?>
				<div class="separator"></div>
			</div>
			<?php } ?>

			<div class="col-md-3">

				<?php if($activate_lite_version == 'Off'){  ?>
					<?php
					$status_input_class = 'required_input';
					if($update_type == 'Set Appointment' && $status_update_optional_event == 'On'){
						$status_input_class = '';
					}
					?>
	<!--Andi-->
					<?php  echo $this->Form->hidden('customer_showed', array('id'=> 'customer_showed'));   ?>
					<?php if($update_type == 'Dealer Visit'){ ?>
						<?php  echo $this->Form->hidden('status', array('value'=> $contact_info['Contact']['status'] ));   ?>
                        <?php echo $this->Form->select('status', $dvopt, array('empty' => 'Select', 'required' => 'required', 'class' => 'form-control '.$status_input_class,'label'=>'false' ,'style'=>'width: 100%')); ?>

					<?php } else { ?>
						<font color="red">*</font>
						<?php echo $this->Form->label('Status','Status:'); ?>
						<?php echo $this->Form->select('status', $sopt, array('empty' => 'Select', 'required' => 'required', 'class' => 'form-control '.$status_input_class,'label'=>'false' ,'style'=>'width: 100%')); ?>
					<?php } ?>
					<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){	 ?>

					<?php }else{ ?>
						<div class="separator"></div>
					<?php } ?>

				<?php }else{ ?>

					<?php echo $this->Form->hidden('status'); ?>

				<?php } ?>


			</div>



		<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){	 ?>

			<?php  echo $this->Form->hidden('UserEmail.send_email', array('value'=> 1 ));   ?>


					<div class="col-md-6">
						<?php echo $this->Form->label('UserEmail.subject', 'Subject:'); ?>
						<?php echo $this->Form->text('UserEmail.subject', array('class'=>"form-control")); ?>
					</div>
					<div class="col-md-3">
						<?php echo $this->Form->label('UserEmail.template_id', 'Template:'); ?>
						<?php echo $this->Form->select('UserEmail.template_id', $userTemplates ,array('empty'=>'Select','class'=>"form-control",'style'=>"width: 100%"));	?>
						<?php echo $this->Form->hidden('UserEmail.template_id');	?>
					</div>

					<div class="col-md-6">
						<?php echo $this->Form->label('UserEmail.subject', 'CC:'); ?>
						<?php echo $this->Form->text('UserEmail.cc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['cc'],'class'=>"form-control")); ?>
					</div>

					<div class="col-md-6">
						<?php echo $this->Form->label('UserEmail.bcc', 'BCC:'); ?>
						<?php echo $this->Form->text('UserEmail.bcc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['bcc'],'class'=>"form-control")); ?>
					</div>


			<div class="col-md-12" id='email_container'>





				<div class="separator bottom"></div>


				<div class="row">
					<div class="col-md-9">
						<?php echo $this->Form->textarea('UserEmail.message', array('id'=>'TemplateTemplateHtml','class'=>"notebook  form-control padding-none",
						'rows'=>"10", 'placeholder'=>"Write your content here...")); ?>

						<?php echo $this->Form->hidden('UserEmail.message_key', array('value'=>$message_key)); ?>



						<div class="row" >
							<div class="col-md-7"  >
								<br>
								File Attachment

								<div id="file_attachment_list"></div>

							</div>
							<div class="col-md-5">
								<br>

								<input type="hidden" id="key_s3" name="key" value="<?php echo $filename; ?>${filename}">
								<input type="hidden" id="AWSAccessKeyId_s3" name="AWSAccessKeyId" value="AKIAJCHHC37LYOABAIIQ">
								<input type="hidden" id="acl_s3" name="acl" value="private">
								<input type="hidden" id="success_action_redirect_s3" name="success_action_redirect" value="https://app.dealershipperformancecrm.com/contact_s3/test/">
								<input type="hidden" id="policy_s3" name="policy" value="<?php echo $policy; ?>">

								<input type="hidden" id="signature_s3"  name="signature" value="<?php echo $signature; ?>">
								<input type="hidden" id="content_type_s3" name="Content-Type" value="">



								<div class="row" id="input_attachment">
									<div class="col-sm-12 text-right">

										<label class="btn btn-primary" for="settingImage_s3" title="Upload Attachment" id="attachment_label">
											<input name="file" id="settingImage_s3" type="file" class="form-control hide" 'style'='height:auto;' >
											<i class="fa icon-paperclip"></i> Attachment
										</label>

										<div type="button"  id="upload3"></div>
									</div>
								</div>

								<br>
							</div>



						</div>

						<hr>

					</div>
					<div class="col-md-3">


						<div class="panel-heading bg-primary"><h4>User Inputs</h4></div>










						<div class="relativeWrap">
							<div class="widget widget-tabs widget-tabs-responsive">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons group" href="#tab-1-userinput" data-toggle="tab"><i></i>Lead</a></li>
										<li class=""><a class="glyphicons group" href="#tab-2-userinput" data-toggle="tab"><i></i>Dealer</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->

								<div class="widget-body">
									<div class="tab-content">

										<!-- Tab content -->
										<div class="tab-pane animated fadeInUp active" id="tab-1-userinput">


	<div class="" style="font-size: 12px; line-height: 23px;" >
		Sales Person: <a href="javascript:" field-name="{sperson}" class="template-field"><span class="label label-success label-stroke">{sperson}</span></a><br />
		SPerson(First): <a href="javascript:" field-name="{sperson_first}" class="template-field"><span class="label label-success label-stroke">{sperson_first}</span></a><br />
		First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
		Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
		Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />
		Type: <a href="javascript:" field-name="{type}" class="template-field"><span class="label label-success label-stroke">{type}</span></a><br />
		Condition: <a href="javascript:" field-name="{condition}" class="template-field"><span class="label label-success label-stroke">{condition}</span></a><br />
		Year: <a href="javascript:" field-name="{year}" class="template-field"><span class="label label-success label-stroke">{year}</span></a><br />
		Make: <a href="javascript:" field-name="{make}" class="template-field"><span class="label label-success label-stroke">{make}</span></a><br />
		Model: <a href="javascript:" field-name="{model}" class="template-field"><span class="label label-success label-stroke">{model}</span></a><br />
		Stock #: <a href="javascript:" field-name="{stock_num}" class="template-field"><span class="label label-success label-stroke">{stock_num}</span></a><br />
	<!--	Modified Full Date: <a href="javascript:" field-name="{modified_full_date}" class="template-field"><span class="label label-success label-stroke">{modified_full_date}</span></a><br />
		Modified: <a href="javascript:" field-name="{modified}" class="template-field"><span class="label label-success label-stroke">{modified}</span></a><br /> -->

		Mobile: <a href="javascript:" field-name="{mobile}" class="template-field"><span class="label label-success label-stroke">{mobile}</span></a><br />
		Address: <a href="javascript:" field-name="{address}" class="template-field"><span class="label label-success label-stroke">{address}</span></a><br />
		City: <a href="javascript:" field-name="{city}" class="template-field"><span class="label label-success label-stroke">{city}</span></a><br />
		State: <a href="javascript:" field-name="{state}" class="template-field"><span class="label label-success label-stroke">{state}</span></a><br />

		Today: <a href="javascript:" field-name="{today}" class="template-field"><span class="label label-success label-stroke">{today}</span></a><br />
		Zip: <a href="javascript:" field-name="{zip}" class="template-field"><span class="label label-success label-stroke">{zip}</span></a>
		<br />

		<?php if($contact_info['Contact']['xml_inv_url'] != ''){ ?>
		Vehicle URL: <a href="javascript:" field-name="{xml_inv_url}" class="template-field"><span class="label label-success label-stroke">{xml_inv_url}</span></a><br />
		<?php } ?>

	</div>



										</div>
										<!-- // Tab content END -->

										<!-- Tab content -->
										<div class="tab-pane animated fadeInUp" id="tab-2-userinput">

					<div class="" style="font-size: 12px; line-height: 23px;" >
						First Name: <a href="javascript:" field-name="{dealer_name}" class="template-field"><span class="label label-success label-stroke">{dealer_name}</span></a><br />
						Email: <a href="javascript:" field-name="{dealer_email}" class="template-field"><span class="label label-success label-stroke">{dealer_email}</span></a><br />
						Phone: <a href="javascript:" field-name="{dealer_phone}" class="template-field"><span class="label label-success label-stroke">{dealer_phone}</span></a><br />
						Fax: <a href="javascript:" field-name="{dealer_fax}" class="template-field"><span class="label label-success label-stroke">{dealer_fax}</span></a><br />
						Address: <a href="javascript:" field-name="{dealer_address}" class="template-field"><span class="label label-success label-stroke">{dealer_address}</span></a><br />
						City: <a href="javascript:" field-name="{dealer_city}" class="template-field"><span class="label label-success label-stroke">{dealer_city}</span></a><br />
						State: <a href="javascript:" field-name="{dealer_state}" class="template-field"><span class="label label-success label-stroke">{dealer_state}</span></a><br />
						Zip: <a href="javascript:" field-name="{dealer_zip}" class="template-field"><span class="label label-success label-stroke">{dealer_zip}</span></a><br />
						Website: <a href="javascript:" field-name="{dealer_website}" class="template-field"><span class="label label-success label-stroke">{dealer_website}</span></a><br />
					</div>

										</div>
										<!-- // Tab content END -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="separator bottom"></div>
			</div>

			<?php }else{ ?>
				<?php  echo $this->Form->hidden('UserEmail.send_email', array('value'=> 0 ));   ?>
			<?php } ?>


			<div class="col-md-12" id='notes_container'>
				<font color="red">*</font>
				<?php echo $this->Form->label('notes','Notes:'); ?>
				<?php echo $this->Form->input('notes', array('type' => 'textarea','class' => 'form-control required_input','value'=>'')); ?>
				<div class="separator"></div>
			</div>


			<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){	 ?>
			<div class="col-md-12">
				<?php  echo $this->Form->input('note_update', array('type'=>'checkbox'));   ?>
				<?php  echo $this->Form->label('note_update', 'Note update');   ?>
				<?php echo $this->Form->input('note_update_details', array('type' => 'textarea','class' => 'form-control required_input','value'=>'')); ?>
				<div class="separator"></div>
			</div>
			<?php } ?>

			<?php if($casl_feature == 'On'){ ?>

				<div class="col-md-3">
					<?php
						echo $this->Form->label('contact_casl_status_id','CASL Status:');
						echo $this->Form->input('contact_casl_status_id',array('options'=>$contactCaslStatuse_list,
							'class'=>'form-control'
							));
					?>
					<div class="separator"></div>
				</div>

			<?php }else if($dnc_bdc_only == 'Off'){  ?>
			<div class="col-md-6">
				<?php
				echo $this->Form->label('dnc_status','DNC Status: &nbsp;');
				echo $this->Form->input('dnc_status',array('options'=>$DncStatusOptions,
					'class'=>'form-control',
					'empty'=>'Select','required'=>'required'
					));
				?>
				<div class="separator"></div>
			</div>
			<?php }else{  ?>
			<?php echo $this->Form->hidden('dnc_status'); ?>
			<?php } ?>


		</div>
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
								<?php echo $this->Form->input('Event.end_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','required' => false)); ?>
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
					<div class="col-md-3">
						<?php  echo $this->Form->input('Newevent.send_calendar_invite', array('type'=>'checkbox'));   ?>
						<?php  echo $this->Form->label('Newevent.send_calendar_invite', 'Send Calendar Invite');   ?>
					</div>
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
								<?php echo $this->Form->input('Newevent.end_time', array('value'=>'10:15 AM', 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','required' => false)); ?>
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




		<div class='row'>
			<div class="col-md-2">
				<br>
				<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){	 ?>
					 <button type="button" id="btn_save_email_druft" class="btn btn-warning" >Save Draft</button>
				<?php } ?>
			</div>
			<div class="col-md-10 text-right">
				<div class="separator"></div>
				<button type="button" id="btn_submit_update" class="btn btn-success" >Submit</button>




				<?php
				/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
				if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
				?>
				<button type="button" id="close_child_modal_dialog" class="close btn-imp" data-dismiss="modal">Cancel</button>

				<?php
				}else if(isset($this->request->params['named']['mgr_24hr_calls']) && $this->request->params['named']['mgr_24hr_calls']=='mgr_24hr_calls'){
				?>
				<button type="button" id="close_child_modal_dialog" class="close btn-imp" data-dismiss="modal">Cancel</button>

				<?php
				}else if(isset($this->request->params['named']['equity']) && $this->request->params['named']['equity']=='equity'){
				?>
				<button type="button" id="close_child_modal_dialog" class="close btn-imp" data-dismiss="modal">Cancel</button>

				<?php
				}else{
				?>
				<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
				<?php
				}
				?>
			</div>
		</div>

	</div>

	<?php echo $this->element( 's3_files_button' ); ?>

<?php echo $this->Form->end(); ?>

<form class="apply-nolazy form-horizontal" id="mail_attachment"  action="https://<?php echo $bucket; ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">

</form>


<?php
//debug( $this->request->data );
//echo $this->element('sql_dump');
?>

<script>


function ShowEmailPreview(){

	$.ajax({
		type: "POST",
		url: "/user_emails/email_preview_contact",
		data: {'contact_id':"<?php echo $this->request->params['pass'][0];  ?>",'message':CKEDITOR.instances["TemplateTemplateHtml"].getData()},
		success: function(data){

			bootbox.dialog({
				message: data,
				backdrop: true,
				title: "Email Preview",
			}).find("div.modal-dialog").addClass("largeWidth");
		}
	});

}


function submit_note_status_update($obj)
{

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

		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}

		$obj.attr('disabled', true);
		$obj.html('Updating...');

		$.ajax({
			type: "POST",
			data: $("#ContactNoteStatusUpdateForm").serialize(),
			url: $("#ContactNoteStatusUpdateForm").attr('action'),
			success: function(data){

				<?php
				// Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required
				if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
				?>
					alert("Updated successfully...");
					//load section data
					SelRecordsLimit('<?php echo $this->request->params['named']['section_id']; ?>');

					$("#close_child_modal_dialog").click();

				<?php }else if(isset($this->request->params['named']['mgr_24hr_calls']) && $this->request->params['named']['mgr_24hr_calls']=='mgr_24hr_calls'){	?>

					$("#close_child_modal_dialog").click();
					refresh_mgr_call_list();


				<?php }else if(isset($this->request->params['named']['equity']) && $this->request->params['named']['equity']=='equity'){	?>

					$("#close_child_modal_dialog").click();

				<?php }else if($this->request->params['named']['dormant']=='dormant'){	?>

					$(".bootbox-close-button").click();

					var user_id = "<?php echo ($this->request->query('user_id') != '') ? $this->request->query('user_id') : ''; ?>";
					var start_date = "<?php echo ($this->request->query('start_date') != '') ? $this->request->query('start_date') : ''; ?>";
					var end_date = "<?php echo ($this->request->query('end_date') != '') ? $this->request->query('end_date') : ''; ?>";

					if(user_id == '') {
						user_id = $("#user_id").val();
					}

					LoadDormant(user_id, start_date, end_date);

				<?php
				}else if(isset($this->request->params['named']['equity']) && $this->request->params['named']['equity']=='equity'){ ?>
				
					$("#btn_do_equity_search").trigger("click");
				
				<?php }else {
				?>
					location.href = "/contacts/leads_main/view/<?php echo $this->request->params['pass'][0];?>";
					//$(".bootbox-body").html(data);
					//bootbox.hideAll();
				<?php
				}
				?>

				//alert('test');

				
			}
		});

	//Adding in a call to a functino for refreshing the page only on the equity lead search in workload.  Added by ASR Nov13,2015
	if(typeof(equity_lead_search_refresh_list) !== "undefined" ) {
		// updated
		//if(equity_lead_search_refresh_list !== "") equity_lead_search_refresh_list();
	}
}


$(function(){
		$("#ContactNoteUpdateDetails").hide();
		$("#ContactNoteUpdate").click(function(){
			if( $(this).is(":checked") ){
				$("#ContactNoteUpdateDetails").show();
			}else{
				$("#ContactNoteUpdateDetails").hide();
			}
		});

	$("#btn_save_email_druft").click(function(){

		var contact_id = "<?php echo $this->request->params['pass'][0];  ?>";
		var message_body = CKEDITOR.instances["TemplateTemplateHtml"].getData();
		var subject = $("#UserEmailSubject").val();
		console.log(contact_id,message_body, subject);

		$.ajax({
			type: "POST",
			url: "/drafts/druft_email",
			data: {'contact_id': contact_id ,'message_body':message_body, 'subject' : subject },
			success: function(data){
				alert("Draft saved successfully");
			}
		});



	});




	<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){ ?>

	$("#email_container").show();
	$("#notes_container").hide();





	var editor = CKEDITOR.instances['TemplateTemplateHtml'];
    if (editor) {
    	try {
    		editor.destroy(true);
    	} catch (e) { }
    }
    CKEDITOR.replace( 'TemplateTemplateHtml' );
    CKEDITOR.instances['TemplateTemplateHtml'].config.scayt_autoStartup = true;

	$("a.template-field").click(function(){
		CKEDITOR.instances['TemplateTemplateHtml'].insertText($(this).attr('field-name'));
	});

	<?php
		$signature_image = "";
		if($setting['Setting']['image'] != '' ){
			$imgpath=WWW_ROOT.'files'.DS.'setting'.DS.'image'.DS.$setting['Setting']['id'].DS.''.$setting['Setting']['image'];
			if(file_exists($imgpath)){
				$src = FULL_BASE_URL.'/app/webroot/files/'.'setting'.'/image/'.$setting['Setting']['id'].'/'.$setting['Setting']['image'];
				$signature_image = '<br/><img src="'.$src.'" style="width:100px;height:120px;" />';
			}
		}

	 ?>

	<?php if(isset($draft_exists) && !empty($draft_exists) ){ ?>
		CKEDITOR.instances['TemplateTemplateHtml'].setData(  <?php echo json_encode( $draft_exists['Draft']['message_body'] ); ?>  );
		$("#UserEmailSubject").val( <?php echo json_encode( $draft_exists['Draft']['subject'] ); ?> );
	<?php }else{ ?>
		CKEDITOR.instances['TemplateTemplateHtml'].setData(  <?php echo json_encode( "<br><br>".$setting['Setting']['signature'].$signature_image ); ?>  );
	<?php } ?>






	editor1 = CKEDITOR.instances['TemplateTemplateHtml'];
	editor1.addCommand("mySimpleCommand", {
	    exec: function(edt) {
	        ShowManageS3Files('show');
	    }
	});
	editor1.ui.addButton('SuperButton', {
	    label: "Image Upload",
	    command: 'mySimpleCommand',
	});

	//email preview
	editor1.addCommand("mailPreviewCommand", {
	    exec: function(edt) {
	        ShowEmailPreview();
	    }
	});
	editor1.ui.addButton('EmailPreview', {
	    label: "Preview",
	    command: 'mailPreviewCommand',
	});




	$("#UserEmailTemplateId").change(function(){
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/user_templates/get_template/",
			data: {'id':$(this).val()},
			success: function(data){
				data = $.parseJSON(data);
				$("#UserEmailSubject").val(data.template_subject);
				CKEDITOR.instances['TemplateTemplateHtml'].setData(data.template_body +  <?php echo json_encode( "<br><br>".$setting['Setting']['signature'].$signature_image ); ?>);
			}
		});
	});

	CKEDITOR.on( 'instanceReady', function( ev ){
		ev.editor.dataProcessor.writer.setRules( 'br',{
            indent : false,
            breakBeforeOpen : false,
            breakAfterOpen : false,
            breakBeforeClose : false,
            breakAfterClose : false
         });
   });



	/*
	$("#UserEmailSendEmail").click(function(){
		if( $(this).is(":checked") ){
			$("#email_container").show();
			$("#notes_container").hide();
		}else{
			$("#email_container").hide();
			$("#notes_container").show();
		}
	});

	$('#TemplateTemplateHtml').wysihtml5();

	$("#UserEmailTemplateId").change(function(){
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/user_templates/get_template/",
			data: {'id':$(this).val()},
			success: function(data){
				editor.composer.setValue(data);
			}
		});
	});

	$("#notes_container").hide();
	*/

	<?php }else{ ?>
		$("#email_container").hide();
		$("#notes_container").show();
	<?php } ?>



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

	/*
	$("#EventStatus").change(function(event){
		if($(this).val() == 'Completed' || $(this).val() == 'Canceled'){
			$("#popup_new_event").show();
			$("#NeweventCreate").val('yes');
		}else{
			$("#popup_new_event").hide();
			$("#NeweventCreate").val('no');
		}
	});
	*/

	$("#close_modal_dialog").click(function(event){
		event.preventDefault();

		<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){	 ?>

			var contact_id = "<?php echo $this->request->params['pass'][0];  ?>";
			var message_body = CKEDITOR.instances["TemplateTemplateHtml"].getData();
			var subject = $("#UserEmailSubject").val();
			//console.log(contact_id,message_body, subject);
			if(message_body != ''){
				if(confirm("Do you want to save draft?")){
					$.ajax({
						type: "POST",
						url: "/drafts/druft_email",
						data: {'contact_id': contact_id ,'message_body':message_body, 'subject' : subject },
						success: function(data){
							//alert("Draft saved successfully");
							bootbox.hideAll();
						}
					});

				}else{
					bootbox.hideAll();
				}

			}else{
				bootbox.hideAll();
			}

		<?php }else{ ?>

			bootbox.hideAll();

		<?php } ?>
	});


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

//Andi
	function create_dealer_visit(){
		//$('#customer_showed').val('true');

		$.ajax({
			type: "POST",
			data: $("#ContactNoteStatusUpdateForm").serialize(),
			url: $("#ContactNoteStatusUpdateForm").attr('action')+'&customer_showed=true',
			success: function(data){}
		})
	}

	$("#btn_submit_update").click(function(event){
		event.preventDefault();

		$obj = $(this);

		<?php if($activate_lite_version == 'On'){  ?>
			submit_note_status_update($obj);
			return true;
		<?php }  ?>

		if( $("#ContactStatus").val() == ''){
			$("#ContactStatus").focus();
			alert('Please select status');
			return true;
		}else if($("#ContactStatus").val() == $("#ContactCurrentStatus").val() && <?php echo ($update_type=='Dealer Visit')?'"True"':'"False"' ?> == "False"){
			<?php if($update_type == 'Set Appointment'){ ?>

				<?php if($status_update_optional_event != 'On'){ ?>
						$("#ContactStatus").focus();
						alert('Please change Status on edit of lead');
						return true;
				<?php }?>

			<?php }else{ ?>

				$("#ContactStatus").focus();
				alert('Please change Status on edit of lead');
				return true;
			<?php } ?>
		}


		<?php if($update_type == 'Showroom Visit Update'){ ?>
		if( $("#ContactSalesStep").val() == ''){
			$("#ContactSalesStep").focus();
			alert('You must select step');
			return true;
		}

		<?php } ?>


		<?php if($update_type == 'Email Update (All)' && !empty($smtp_settings) && $email_settings == 'On' && $crmUnsubscribe_cnt == 0 ){ ?>

			if($("#UserEmailSubject").val() == ''  ){
				alert('Please enter subject');
				$('#UserEmailSubject').focus();
				return true;
			}

		<?php }else{ ?>

			if(  $("#ContactNotes").val() == ''){

				$("#ContactNotes").focus();
				alert('You must enter Notes');
				return true;
			}

		<?php } ?>

				//Event validation
		<?php if(!empty($appointment)){ ?>

		var event_radio = $("input[name='event_confirm']:checked").val();
		//console.log('radio', event_radio );
		if(!event_radio){
			alert('Please update your event.');
			return true;
		}
		<?php if(in_array($appointment['Event']['event_type_id'],array(20,21))){ ?>

			bootbox.confirm({
				message:'Did customer show for the appointment?',
				buttons:{
					confirm:{label:'Yes',className:'btn-success'},
				  	cancel:{label:'No',className:'btn-danger'}

					},
//Andi
					callback: function(result) {
					if(result){
						$("#EventCustomerShowed").val('1');
						create_dealer_visit();
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
					submit_note_status_update($obj);

				  },
				});
			/*if(confirm('Did Customer showed for the appointment?'))
			{
				$("#EventCustomerShowed").val('1');
			}*/

		<?php }else{ ?>

			submit_note_status_update($obj);
		<?php }
		}else{ ?>

		submit_note_status_update($obj);

		<?php } ?>
		
		//window.location = "/daily_recaps/workload";

	});

	if($(window).width()<=1024)
	{
		$("#EventStartDate").attr('readOnly','readOnly');
		$("#EventEndDate").attr('readOnly','readOnly');
		$("#NeweventStartDate").attr('readOnly','readOnly');
		$("#NeweventEndDate").attr('readOnly','readOnly');
	}


	/*Events*/
	$('#EventStartTime, #NeweventStartTime').timepicker();
	$('#EventEndTime, #NeweventEndTime').timepicker();

	$("#EventStartDate").bdatepicker({
		format: 'yyyy-mm-dd',
		ignoreReadonly :true,
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
		ignoreReadonly :true,
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
		ignoreReadonly :true,
		//focusOnShow:false,
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
		ignoreReadonly : true,
		//focusOnShow:false,
	//	startDate: "2013-02-14"
	}).on('changeDate', function(selected){
		/*
		FromEndDate = new Date(selected.date.valueOf());
		FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
		$('#NeweventStartDate').bdatepicker('setEndDate', FromEndDate);
		*/
		 $(this).bdatepicker('hide');
	});

	//File Attachments
	$('#settingImage_s3').on('change', function() {

	    if($("#settingImage_s3").val() != ''){

	    	if($( '#settingImage_s3' )[0].files[0].size > 25000000){
	    		alert("Maximum upload size exceeded, File size limit is 25MB");
	    		return false;
	    	}

			if($("#uploaded_total").val()){
				var current_total = parseInt( $("#uploaded_total").val());
				var new_total = $( '#settingImage_s3' )[0].files[0].size + current_total;
				if(new_total > 25000000){
					alert("Maximum upload size exceeded, File size limit is 25MB");
					return false;
				}
			}

			var form_data = new FormData( $("#mail_attachment")[0]);

	        form_data.append( 'key', $("#key_s3").val() );
	        form_data.append( 'AWSAccessKeyId', $("#AWSAccessKeyId_s3").val() );
	        form_data.append( 'acl', $("#acl_s3").val() );
	        form_data.append( 'success_action_redirect', $("#success_action_redirect_s3").val() );
	        form_data.append( 'policy', $("#policy_s3").val() );
	        form_data.append( 'signature', $("#signature_s3").val() );
	        form_data.append( 'Content-Type', $("#content_type_s3").val() );

	        form_data.append( 'file', $( '#settingImage_s3' )[0].files[0] );

			$("#upload3").html("Uploading attachment, Please wait...");
			$("#attachment_label").hide();

			$.ajax({
	            url: 'https://<?php echo $bucket; ?>.s3.amazonaws.com/',
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: form_data,
	            type: 'post',
		        success: function(data){

					$("#upload3").html("");
					$("#settingImage_s3").val("");
					$("#attachment_label").show();


					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list_attachment/',
						data: {'message_key': "<?php echo $message_key ?>" },
						success: function(data){
							$("#file_attachment_list").html(data);
						}
					});
	      			// console.log(data);


		        },
				error: function (xhr, ajaxOptions, thrownError) {

					$("#upload3").html("");
					$("#settingImage_s3").val("");
					$("#attachment_label").show();

					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list_attachment/',
						data: {'message_key': "<?php echo $message_key ?>"},
						success: function(data){
							$("#file_attachment_list").html(data);
						}
					});

				}
	      	});

	    }else{
			alert("Please select a file");
	    }
	    return false;
	});

});
</script>
