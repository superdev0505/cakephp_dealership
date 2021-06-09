<style>
.excelWidth {
    margin: 0 auto;
    width: 1000px;
	text-align:center;
}
</style>
<?php
$logged_dealer = AuthComponent::user('dealer_id');
$show_appt_link = array(2501,830);
$us_states=array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'GU' => 'GU',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'
);

 ?>
<style>
.blockUI.blockOverlay{
	z-index:999999!important;
}
</style>
						<div class="wizard">
							<div class="widget widget-tabs widget-tabs-responsive">
								<!-- Widget heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a href="#tab1-1"  data-toggle="tab"><i></i>Lead</a></li>
										<li><a href="#tab4-1"  data-toggle="tab"><i></i>Vehicle Info</a></li>
                                        <li><a href="#tab2-1"  data-toggle="tab"><i></i>Service Info</a></li>
										<li><a href="#tab3-1" data-toggle="tab"><i></i>Date/Time</a></li>

									</ul>
								</div>
								<div class="widget-body">
								<?php echo $this->Form->create('ServiceEvent', array('class' => 'form-inline apply-nolazy', 'type' => 'post', 'role'=>"form",'id' => 'ServiceEventServiceappAddForm')); ?>
									<div class="tab-content">

										<!-- Step 1 -->
										<div class="tab-pane active" id="tab1-1">
											 <div class="row">
												<div class="col-12 innerAll">
													<input type="hidden"   id="inputTitle" class="col-md-6 form-control" value="123" />

													<?php //echo $this->Form->hidden('id'); ?>
                                                    <?php echo $this->Form->hidden('ServiceLead.contact_id');
													echo $this->Form->hidden('contact_id');
													 ?>
                                                    <?php //echo $this->Form->hidden('ServiceLead.id'); ?>
										<div class="col-md-6">
													<font color="red" >*</font>
													<?php
			if(!isset($this->request->data['ServiceLead']['first_name']) && isset($this->request->query['nsearch_first_name'])){
			$this->request->data['ServiceLead']['first_name'] = $this->request->query['nsearch_first_name'];
			}
													 echo $this->Form->label('ServiceLead.first_name', 'First Name:'); ?>
													<?php echo $this->Form->text('ServiceLead.first_name', array('class' => 'form-control','tabindex'=>'1')); ?>
													<div class="separator bottom"></div>

													<?php echo $this->Form->label('ServiceLead.address', 'Address:'); ?>
													<?php echo $this->Form->text('ServiceLead.address', array('class' => 'form-control', 'tabindex'=>'3')); ?>
													<div class="separator bottom"></div>

                                                     <?php echo $this->Form->input('ServiceLead.state', array('type' => 'select', 'label'=>'State:', 'class' => 'form-control','tabindex'=>'5'/*,'readonly' => 'readonly'*/,'options' =>$us_states,'style' =>'width:100%','empty' => 'Select')); ?>



													<div class="separator bottom"></div>
                                                    <font color="red" >*</font>
													<?php
			if(!isset($this->request->data['ServiceLead']['mobile']) && isset($this->request->query['nsearch_phone'])){
			$this->request->data['ServiceLead']['mobile'] = $this->request->query['nsearch_phone'];
			}

													echo $this->Form->input('ServiceLead.mobile', array('type' => 'text','label'=>'Mobile#', 'class' => 'form-control', 'required' => 'required','tabindex'=>'7' /*'readonly' => 'readonly'*/)); ?>

													<div class="separator bottom"></div>
													<?php echo $this->Form->input('ServiceLead.phone', array('type' => 'text', 'label'=>'Phone#', 'class' => 'form-control','tabindex'=>'9' /*'readonly' => 'readonly'*/)); ?>
													<div class="separator bottom"></div>
													<?php $x = AuthComponent::user('full_name'); //echo $x;    ?>
													<?php echo $this->Form->input('ServiceLead.sperson', array('type' => 'text','label'=>'Service Writer:', 'div'=>false, 'class' => 'form-control', 'readonly' => 'readonly','tabindex'=>'11','value' =>AuthComponent::user('first_name').' '.AuthComponent::user('last_name'))); ?>
													<?php echo $this->Form->input('ServiceLead.writer_id', array('type' => 'hidden','value'=>AuthComponent::user('id'))); ?>
													</div>
                                                    <div class="col-md-6">
                                                    <font color="red" >*</font>
                                                     <?php

													 if(!isset($this->request->data['ServiceLead']['last_name']) && isset($this->request->query['nsearch_last_name'])){
			$this->request->data['ServiceLead']['last_name'] = $this->request->query['nsearch_last_name'];
			}
													 echo $this->Form->label('ServiceLead.last_name', 'Last Name:'); ?>
													<?php echo $this->Form->text('ServiceLead.last_name', array('class' => 'form-control','tabindex'=>'2' /*'readonly' => 'readonly', 'value' => $lname*/)); ?>


												<div class="separator bottom"></div>
                                                <?php echo $this->Form->input('ServiceLead.city', array('type' => 'text', 'label'=>'City:', 'class' => 'form-control','tabindex'=>'4')); ?>




													<div class="separator bottom"></div>
                                                     <?php echo $this->Form->input('ServiceLead.zip', array('type' => 'text', 'label'=>'Zip:', 'class' => 'form-control','tabindex'=>'6')); ?>

													<div class="separator bottom"></div>
                                                   <?php echo $this->Form->input('ServiceLead.work_number', array('type' => 'text','label'=>'Work Number#', 'class' => 'form-control','tabindex'=>'8')); ?>

													<div class="separator bottom"></div>

													<?php
				if(!isset($this->request->data['ServiceLead']['email']) && isset($this->request->query['nsearch_email'])){
			$this->request->data['ServiceLead']['email'] = $this->request->query['nsearch_email'];
			}
													echo $this->Form->input('ServiceLead.email', array('type' => 'text', 'label'=>'Email:', 'class' => 'form-control','tabindex'=>'10')); ?>
													<div class="separator bottom"></div>
                                                    <font color="red" >*</font>
                                                     <?php echo $this->Form->input('ServiceLead.user_id', array('type' => 'select', 'label'=>'Tech:', 'class' => 'form-control','empty'=>'Select Tech','style'=>'width: 100%'/*,'readonly' => 'readonly'*/,'options'=>$users,'tabindex'=>'12')); ?>
                                                    </div>
												</div>
											</div>
										</div>
										<!-- // Step 1 END -->
										<!-- Step 2 -->
                                        <div class="tab-pane" id="tab4-1">
											<div class="row">
												<div class="col-12 innerAll">
                                                <div class="col-md-6">

                                                	<div id="vehicle_selection_type_container" >
														<?php
														//debug($this->request->data['ServiceLead']);
														echo $this->Form->input('ServiceLead.vehicle_selection_type',
															array('options' => $vehicle_selection_type_options,
															'type' => 'radio', 'class' => ''));
														?>
													</div>
													<div class="separator bottom"></div>



													<?php //edited by Richestsoft ?>

													<font color="red" ></font>
													<?php
													$dealer_id = AuthComponent::user('dealer_id');
													$category_val = '';
													if($dealer_id == 20040 && !isset($this->request->data['ServiceLead']['category']))
													{
													$this->request->data['ServiceLead']['category']	= 'Powersports';
													}

													echo $this->Form->input('ServiceLead.category', array( 'label'=>'Type:', 'class' => 'form-control','options'=>$d_type_options,'div'=>false ,'type' => 'select','style'=>'width: 100%','multiple' => false,'empty' => 'Select','tabindex'=>'13')); ?>
													<div class="separator bottom"></div>
													<?php //finished editing by Richestsoft ?>

													<!--font color="red" >*</font-->
													<?php /*
													$dealer_id = AuthComponent::user('dealer_id');
													$category_val = '';
													if($dealer_id == 20040 && !isset($this->request->data['ServiceLead']['category']))
													{
													$this->request->data['ServiceLead']['category']	= 'Powersports';
													}

													echo $this->Form->input('ServiceLead.category', array( 'label'=>'Type:', 'class' => 'form-control', 'required' => 'required','options'=>$d_type_options,'div'=>false ,'type' => 'select','style'=>'width: 100%','multiple' => false, 'empty' => 'Please Select','tabindex'=>'13')); */?>
													<!--div class="separator bottom"></div-->



													<?php echo $this->Form->input('ServiceLead.year', array('label'=>'Year:', 'class' => 'form-control','name' => 'data[ServiceLead][year]','div'=>false ,'type' => 'select','style'=>'width: 84%', 'multiple' => false, 'empty' => 'Select','options'=>$year_opt,'id'=>'ServiceLeadYear','year'=>false,'tabindex'=>'16','value'=>$this->request->data['ServiceLead']['year'])); ?>
                                                    <button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
													<div class="separator bottom"></div>

											<?php //edited by Richestsoft ?>

													<font color="red" ></font>
													<?php echo $this->Form->input('ServiceLead.type', array( 'label'=>'Category:', 'class' => 'form-control','div'=>false ,'type' => 'select','style'=>'width: 100%', 'multiple' => false, 'empty' => 'Select','options'=>$body_type,'tabindex'=>'14')); ?>
													<div class="separator bottom"></div>
													<?php //finished editing by Richestsoft ?>



													<!--font color="red" >*</font-->
													<?php //echo $this->Form->input('ServiceLead.type', array( 'label'=>'Category:', 'class' => 'form-control', 'required' => 'required'/*,'readonly' => 'readonly'*/,'div'=>false ,'type' => 'select','style'=>'width: 100%', 'multiple' => false, 'empty' => 'Please Select','options'=>$body_type,'tabindex'=>'14')); ?>
													<!--div class="separator bottom"></div-->



													<?php echo $this->Form->input('ServiceLead.unit_value', array('type' => 'text', 'label'=>'Unit/Value:', 'class' => 'form-control','tabindex'=>'21'/*,'readonly' => 'readonly'*/)); ?>
													<div class="separator bottom"></div>
                                                  <!-- <font color='red'>*</font>--> <?php echo $this->Form->label('ServiceLead.condition','Condition:'); ?>
										<?php
echo $this->Form->input('ServiceLead.condition', array('type' => 'select','tabindex'=>'23', 'required' => false, 'options' => array(
'Any' => 'Any',
'New' => 'New',
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
													<div class="separator bottom"></div>
                                                     <?php
							if(!isset($this->request->data['ServiceLead']['vin']) && isset($this->request->query['nsearch_vin'])){
			$this->request->data['ServiceLead']['vin'] = $this->request->query['nsearch_vin'];
			}

													  echo $this->Form->input('ServiceLead.vin', array('type' => 'text', 'label'=>'Vin Number #:', 'class' => 'form-control','tabindex'=>'25')); ?>
													<div class="separator bottom"></div>
                                                     <?php


													  echo $this->Form->input('ServiceLead.unit_color', array('type' => 'text', 'label'=>'Color:', 'class' => 'form-control','tabindex'=>'27')); ?>

                                                    </div>
                                                 <div class="col-md-6">

                                                 	<div class="separator bottom"></div>
                                                 	<div class="separator bottom" style="margin-bottom: 7px;" ></div>


													<?php echo $this->Form->input('ServiceLead.make', array('type' => 'text', 'label'=>'Make:', 'class' => 'form-control','div'=>false ,'type' => 'select','style'=>'width: 100%', 'multiple' => false, 'empty' => 'Select','tabindex'=>'15','options'=>$mk_options)); ?>
													<div class="separator bottom"></div>




													<?php

										$display_model_id = ( $this->request->data['ServiceLead']['model_id'] != '')? "inline-block" : 'none';
										echo $this->Form->input('ServiceLead.model_id', array('type' => 'text', 'label'=>'Model:', 'class' => 'form-control','div'=>false ,'type' => 'select','style'=>'width: 84%; display:'.$display_model_id, 'multiple' => false, 'empty' => 'Select','tabindex'=>'17','options'=>$model_opt));
										$display_model_txt = ( $this->request->data['ServiceLead']['model_id'] == '')? "inline-block" : 'none';
										echo $this->Form->input('ServiceLead.model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','tabindex'=>'19','style'=>'width: 84%; display: '.$display_model_txt));

													 ?>
                                                    <button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
													<div class="separator bottom"></div>





                                                   <!-- <font color="red" >*</font>-->
													<?php echo $this->Form->input('ServiceLead.class', array('type' => 'text', 'label'=>'Class:', 'class' => 'form-control', 'required' => false,'div'=>false ,'type' => 'select','style'=>'width: 100%', 'multiple' => false, 'empty' => 'Select','options'=>$body_sub_type_options,'tabindex'=>'18')); ?>
													<div class="separator bottom"></div>
                                                    <?php
								if(!isset($this->request->data['ServiceLead']['stock_num']) && isset($this->request->query['nsearch_stock_num'])){
			$this->request->data['ServiceLead']['stock_num'] = $this->request->query['nsearch_stock_num'];
			}


													 echo $this->Form->input('ServiceLead.stock_num', array('type' => 'text', 'label'=>'Stock#:', 'class' => 'form-control','tabindex'=>'20')); ?>
													<div class="separator bottom"></div>
                                                    <?php echo $this->Form->input('ServiceLead.engine', array('type' => 'text', 'label'=>'Engine:', 'class' => 'form-control','tabindex'=>'22')); ?>
													<div class="separator bottom"></div>
                                                     <?php echo $this->Form->input('ServiceLead.odometer', array('type' => 'text', 'label'=>'Miles:', 'class' => 'form-control','tabindex'=>'24')); ?>
													<div class="separator bottom"></div>
                                                     <?php echo $this->Form->input('ServiceLead.etc', array('type' => 'text', 'label'=>'Etc:', 'class' => 'form-control','tabindex'=>'26')); ?>
                                                    </div>
												</div>
											</div>
										</div>


                                        <!-- Step 3 -->
										<div class="tab-pane" id="tab2-1">
											<div class="row">
												<div class="col-12 innerAll">
                                               <?php
											   $service_jobs = $eventTypes;
											   if($service_settings['ServiceSetting']['advanced_job']){
												    $service_jobs = array();
												    ?>
                                                <font color="red" >*</font>
													<?php echo $this->Form->input('service_job_category_id', array('label'=>'Service Vendor:&nbsp;','div'=>false ,'type' => 'select', 'class' => 'form-control', 'required' => 'required','options' => $service_categories,'empty' => 'Select Vendor','style'=>'width: 100%',)); ?>
													<div class="separator bottom"></div>
                                                     <font color="red" >*</font>
													<?php echo $this->Form->input('service_category_id', array('label'=>'Service Category:&nbsp;','div'=>false ,'type' => 'select', 'class' => 'form-control', 'required' => 'required','options' => $service_sub_categories,'empty' => 'Select Category','style'=>'width: 100%',)); ?>
													<div class="separator bottom"></div>
                                                    <?php } ?>
													<font color="red" >*</font>
                                                    <label for="ServiceEventEventTypeId">Service Job Type:&nbsp;</label>
													<?php  echo $this->Form->select('event_type_id',$service_jobs,array('div'=>false ,'style'=>'width:84%;','class' => 'chosen-select','required' => 'required', 'multiple' => "multiple",'data-placeholder' => 'Select Service Visit type','id' => 'ServiceJobId','hiddenField' => false));   ?>
                                             <a href="#" id="btn_add_job" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></a>
                                             <div class="alert alert-warning" style="display:none;" id="no-visit-type"><i class="fa fa-exclamation-triangle"></i>&nbsp;There is no Job type for above Vendor - Category Combo.Please use the <i class="fa fa-pencil"></i>&nbsp; icon to add new visit type for above combo.</div>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php
													if(!isset($this->request->data['ServiceEvent']['status']))
													{
														$this->request->data['ServiceEvent']['status']=1;
													}
													if(!isset($this->request->data['ServiceEvent']['warrant_id']))
													{
														$this->request->data['ServiceEvent']['warrant_id']=4;
													}
													echo $this->Form->input('status', array('label'=>'Service  Appointment - To "close" the Appt. select "Completed" to clear from calendar:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Select', 'class' => 'form-control', 'required' => 'required', 'options' => $event_statuses));	?>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->input('title', array('label'=>'Service Visit Type:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>

													<font color="red" >*</font>
													<?php echo $this->Form->input('details', array('label'=>'Service Order Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => 'required')); ?>
													<div class="separator bottom"></div>
                                                    <?php  echo $this->Form->input('warrant_id', array('label'=>'Warranty:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Select', 'options' => $service_warrant_types));   ?>
												</div>
											</div>
										</div>
										<!-- // Step 2 END -->
										<!-- Step 3 -->
										<div class="tab-pane" id="tab3-1">
											<div class="row">
												<div class="col-12 innerAll">

													<font color="red" >*</font>
													<label>Service Appt. Start Time/Date:&nbsp;
                                                  <?php if(in_array($logged_dealer,$show_appt_link)){ ?>
                                                    <a href="<?php echo $this->Html->url(array('controller' =>'ServiceCalendar','action'=>'day_view',$this->request->data['ServiceEvent']['start_date'],$this->request->data['ServiceLead']['user_id'])); ?>" class="no-ajaxify" id="checkDayAppoinment">See Appointments</a>
                                                    <?php } ?>
                                                    </label><?php //echo $this->Form->label('start_date','  '); ?>
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
													<?php echo $this->Form->label('start','Service Appt. End-Date / Time:&nbsp;'); ?>
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
                                                    <font color="red" >*</font>
                                                    <?php
													if(!isset($this->request->data['ServiceLead']['service_status_id']))
													{
														$this->request->data['ServiceLead']['service_status_id']= 16;
													}


													echo $this->Form->input('ServiceLead.service_status_id', array('type' => 'select', 'label'=>'Service Status:', 'class' => 'form-control','empty'=>'Select Status','options'=>$service_statuses,'style'=>'width: 100%'/*,'readonly' => 'readonly'*/)); ?>
                                                    <div class="separator bottom"></div>
                                                    <font color="red" >*</font>
                                                    <?php
													if(!isset($this->request->data['ServiceEvent']['bay_id']))
													{
														$this->request->data['ServiceEvent']['bay_id']=5;
													}
													echo $this->Form->input('bay_id', array('type' => 'select', 'label'=>'Service Bays:', 'class' => 'form-control','empty'=>'Select Bay','options'=>$service_bays,'style'=>'width: 100%'/*,'readonly' => 'readonly'*/)); ?>
									<div class="separator bottom"></div>
                                                    <?php echo $this->Form->input('ServiceLead.tech2_id', array('type' => 'select', 'label'=>'Tech 2:', 'class' => 'form-control','empty'=>'Select Tech','options'=>$users,'style'=>'width: 100%'/*,'readonly' => 'readonly'*/)); ?>
									<div class="separator bottom"></div>
												</div>
											</div>
										</div>
										<!-- // Step 3 END -->
										<!-- Step 4 -->



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
														<button class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;" id="SubmitForm"  type="submit">Complete</button>
													</li>
												</ul>
												<!-- // Wizard pagination controls END -->

											</div>
										</div>
									</div>

								<?php echo $this->Form->end(); ?>
								<?php //echo $this->element('sql_dump'); ?>

								</div>
							</div>
						</div>




<script>
var $visitTime = <?php echo json_encode($eventTypeTime); ?>;
var $visitText = <?php echo json_encode($eventTypes); ?>;

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
	$url=$("#ServiceEventServiceappAddForm").attr('action');
	$.ajax({
		type: 'POST',
		data: $("#ServiceEventServiceappAddForm").serialize(),
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

	// Code for See Appoinment for the day

	$("#checkDayAppoinment").on('click',function(e){
		e.preventDefault();
		$url = '<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'day_view')); ?>';
		$user_id = $("#ServiceLeadUserId").val();
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

	 $(".chosen-select").chosen({no_results_text: "Oops, nothing found!", width : "93%"});
	$("#ServiceEventEventTypeId").change(function(){

		if( $(this).val() != ""){
			$("#no-visit-type").hide();
			$("#ServiceEventTitle").val(  $("#ServiceEventEventTypeId option[value='"+$(this).val()+"']").text()  );
		}
	});

	$("#btn_add_job").on('click',function(e){
		e.preventDefault();
		$("#service-job-add-modal").modal('show');
		});
	 $(".chosen-select").chosen().change(function(event){
		 var  target = $(event.target),
			priorDataSet = target.data("chosen-values"),
			currentDataSet = target.val();
			$minutes = 0;
			$label = '';
			if(currentDataSet ){
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
		 });

	 <?php if($service_settings['ServiceSetting']['advanced_job']){ ?>
	$("#ServiceEventServiceJobCategoryId,#ServiceEventServiceCategoryId").on('change',function(){
		category_id = $("#ServiceEventServiceCategoryId").val();
		vendor_id = $("#ServiceEventServiceJobCategoryId").val();
		$("#no-visit-type").hide();
		if(category_id && vendor_id)
		{
			$.ajax({
				type :'POST',
				url :'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'category_job','serviceapp' => true)); ?>',
				data:{category_id : category_id,vendor_id:vendor_id},
				success: function(data){

						data = $.parseJSON(data);
						if(data.html){
						update_job_options(data.html);
						}else{
								$("#no-visit-type").show();
						}
						//$("#ServiceJobId").append(data.html);
						//window.$visitTime = data.visitTime;
						//window.$visitText = data.visitText;


				}
				});
		}
		});
	<?php } ?>

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

	$('#ServiceEventStartTime').timepicker({
		// timeFormat: 'HH:mm:ss',
		minTime:'<?php echo $service_timings['ServiceSetting']['start']; ?>',
		maxTime:'<?php echo $service_timings['ServiceSetting']['end']; ?>'
		});
	$('#ServiceEventEndTime').timepicker({
		minTime:'<?php echo $service_timings['ServiceSetting']['start']; ?>',
		maxTime:'<?php echo $service_timings['ServiceSetting']['end']; ?>'
		});


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
				if(index==1){
					if(!wiz.find('#ServiceLeadFirstName').val()) {
						alert('You must enter first name');
						wiz.find('#ServiceLeadFirstName').focus();
						return false;
					}
					if(!wiz.find('#ServiceLeadLastName').val()) {
						alert('You must enter last name');
						wiz.find('#ServiceLeadLastName').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadMobile').val())) {
						alert('You must enter mobile #');
						wiz.find('#ServiceLeadMobile').focus();
						return false;
					}
					/*if(!$.trim(wiz.find('#ServiceLeadEmail').val())) {
						alert('You must enter Email');
						wiz.find('#ServiceLeadEmail').focus();
						return false;
					}*/
					if(!$.trim(wiz.find('#ServiceLeadUserId').val())) {
						alert('You must select tech');
						wiz.find('#ServiceLeadUserId').focus();
						return false;
					}

				}
				else if(index==2){
					/*if(!wiz.find('#ServiceLeadCategory').val()) {
						alert('You must select Type');
						wiz.find('#ServiceLeadCategory').focus();
						return false;
					}
					if(!wiz.find('#ServiceLeadType').val()) {
						alert('You must select Category');
						wiz.find('#ServiceLeadType').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadMake').val())) {
						alert('You must select make');
						wiz.find('#ServiceLeadMake').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadYear').val())) {
						alert('You must select year');
						wiz.find('#ServiceLeadYear').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadModelId').val()) && !$.trim(wiz.find('#ServiceLeadModel').val())) {
						alert('You must select model');
						wiz.find('#ServiceLeadModelId').focus();
						return false;
					}
          */
					/*if(!$.trim(wiz.find('#ServiceLeadClass').val())) {
						alert('You must select class');
						wiz.find('#ServiceLeadClass').focus();
						return false;
					}*/
				/*	if(!$.trim(wiz.find('#ServiceLeadCondition').val())) {
						alert('You must select condition');
						wiz.find('#ServiceLeadCondition').focus();
						return false;
					}*/


				}
				else if(index==3){
					if(!wiz.find('#ServiceJobId').val()) {
						alert('You must select  Service Job Type');
						wiz.find('#ServiceJobId').focus();
						return false;
					}
					if(!wiz.find('#ServiceEventStatus').val()) {
						alert('You must select Event Status');
						wiz.find('#ServiceEventStatus').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventTitle').val())) {
						alert('You must enter Event Title');
						wiz.find('#ServiceEventTitle').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventDetails').val())) {
						alert('You must enter Event Details');
						wiz.find('#ServiceEventDetails').focus();
						return false;
					}

				}
				else if(index==4){
					if(!wiz.find('#ServiceLeadServiceStatusId').val()) {
						alert('You must select service status');
						wiz.find('#ServiceEventEventTypeId').focus();
						return false;
					}
					if(!wiz.find('#ServiceEventBayId').val()) {
						alert('You must select service bay');
						wiz.find('#ServiceEventStatus').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventStartDate').val()) && !$.trim(wiz.find('#ServiceEventStartTime').val())) {
						alert('You must Please Appointment start and end time');
						wiz.find('#ServiceEventStartDate').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceEventEndDate').val()) && !$.trim(wiz.find('#ServiceEventEndTime').val())) {
						alert('You must Please Appointment start and end time');
						wiz.find('#ServiceEventEndDate').focus();
						return false;
					}

				/*	if($.trim(wiz.find('#ServiceEventEndDate').val()) && $.trim(wiz.find('#ServiceEventStartDate').val())) {
						$start_date = $('#ServiceEventStartDate').val().'T'.$('#ServiceEventStartTime').val();
						$end_date = $('#ServiceEventEndDate').val().'T'.$('#ServiceEventEndTime').val();
						$start_date = new Date($start_date);
						$end_date = new Date($end_date);
						console.log($start_date );
						console.log($end_date );
						alert('You must Please Appointment start and end time');
						wiz.find('#ServiceEventEndDate').focus();
						return false;
					}*/
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

		wiz.find('.finish').click(function(e)
		{

			//tab 1 start

					if(!wiz.find('#ServiceLeadFirstName').val()) {
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('You must enter first name');
						wiz.find('#ServiceLeadFirstName').focus();
						return false;
					}
					if(!wiz.find('#ServiceLeadLastName').val()) {
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('You must enter last name');
						wiz.find('#ServiceLeadLastName').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadMobile').val())) {
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('You must enter mobile #');
						wiz.find('#ServiceLeadMobile').focus();
						return false;
					}
					/*if(!$.trim(wiz.find('#ServiceLeadEmail').val())) {
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('You must enter Email');
						wiz.find('#ServiceLeadEmail').focus();
						return false;
					}*/
					if(!$.trim(wiz.find('#ServiceLeadUserId').val())) {
						wiz.find("a[data-toggle*='tab']").eq(0).css('color','red').trigger('click');
						alert('You must select tech');
						wiz.find('#ServiceLeadUserId').focus();
						return false;
					}
				//tab 2

/*
					if(!wiz.find('#ServiceLeadCategory').val()) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select Type');
						wiz.find('#ServiceLeadCategory').focus();
						return false;
					}
					if(!wiz.find('#ServiceLeadType').val()) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select Category');
						wiz.find('#ServiceLeadType').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadMake').val())) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select make');
						wiz.find('#ServiceLeadMake').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadYear').val())) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select year');
						wiz.find('#ServiceLeadYear').focus();
						return false;
					}
					if(!$.trim(wiz.find('#ServiceLeadModelId').val()) && !$.trim(wiz.find('#ServiceLeadModel').val())) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select model');
						wiz.find('#ServiceLeadModelId').focus();
						return false;
					}
*/
					/*if(!$.trim(wiz.find('#ServiceLeadClass').val())) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select class');
						wiz.find('#ServiceLeadClass').focus();
						return false;
					}*/

					/*if(!$.trim(wiz.find('#ServiceLeadCondition').val())) {
						wiz.find("a[data-toggle*='tab']").eq(1).css('color','red').trigger('click');
						alert('You must select condition');
						wiz.find('#ServiceLeadCondition').focus();
						return false;
					}*/





			if(!wiz.find('#ServiceJobId').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must select Service Job Type');
				wiz.find('#ServiceJobId').focus();
				return false;
			}
			if(!wiz.find('#ServiceEventStatus').val()) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must select Event Status');
				wiz.find('#ServiceEventStatus').focus();
				return false;
			}
			if(!$.trim(wiz.find('#ServiceEventTitle').val())) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Event Title');
				wiz.find('#ServiceEventTitle').focus();
				return false;
			}
			if(!$.trim(wiz.find('#ServiceEventDetails').val())) {
				wiz.find("a[data-toggle*='tab']").eq(2).css('color','red').trigger('click');
				alert('You must enter Event Details');
				wiz.find('#ServiceEventDetails').focus();
				return false;
			}
			wiz.find("a[data-toggle*='tab']").eq(2).css('color','black');
			//tab two end
			//tab three start
			if(!wiz.find('#ServiceEventStartDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter Start Date');
				wiz.find('#ServiceEventStartDate').focus();
				return false;
			}
			if(!wiz.find('#ServiceEventEndDate').val()) {
				wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
				alert('You must enter End Date');
				wiz.find('#ServiceEventEndDate').focus();
				return false;
			}
					startDate=wiz.find('#ServiceEventStartDate').val();
					endDate=wiz.find('#ServiceEventEndDate').val();
					$dat_array = startDate.split('/');
					startDate=$dat_array[2]+'-'+$dat_array[0]+'-'+$dat_array[1];
					$dat_array = endDate.split('/');
					endDate=$dat_array[2]+'-'+$dat_array[0]+'-'+$dat_array[1];
					startTime=wiz.find('#ServiceEventStartTime').val();
					endTime=wiz.find('#ServiceEventEndTime').val();
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

					st=new Date(stDateTime);
					end=new Date(endDateTime);
					if(end<=st)
					{
						wiz.find("a[data-toggle*='tab']").eq(3).css('color','red').trigger('click');
						alert('End Date/Time must be greater than Start Date/Time ');
						wiz.find('#ServiceEventEndDate').focus();
						return false;
					}

			wiz.find("a[data-toggle*='tab']").eq(3).css('color','black');
			//tab three end
			$("#SubmitForm").attr('disabled','disabled');
			<?php if(!empty($this->request->data['ServiceEvent']['start_date'])){ ?>
					e.preventDefault();
					submit_appointment();
			<?php } ?>



			//alert('Finished!, Starting over!');
			//wiz.find("button[type='submit']").removeClass('hide');
			//wiz.find("a[data-toggle*='tab']:first").trigger('click');
		});
	});

	$.inventory({
		no_sold: "yes",
		edit_mode: "yes",
		input_type: "#ServiceLeadCategory",
		input_category:"#ServiceLeadType",
		input_make:"#ServiceLeadMake",

		input_year:"#ServiceLeadYear",
		input_yearedit:"#btn_year_edit",

	 	input_model_id:"#ServiceLeadModelId",
		input_model:"#ServiceLeadModel",
		input_class:"#ServiceLeadClass",
		btn_edit_model:"#btn_models_edit",

		/*input_unitColor_id:"#ContactUnitColor",
		input_unitColor_fieldname:"data[Contact][unit_color]",*/

		input_condition:"#ServiceLeadCondition",
		input_stock:"#ServiceLeadStockNum",
		input_miles:"#ServiceLeadOdometer",
		input_vin:"#ServiceLeadVin",
		input_color:"#ServiceLeadColor",

		//input_UnitValue:"#ContactUnitValue",
		input_Engine:"#ServiceLeadEngine",
		vehicle_selection_type_container: "#vehicle_selection_type_container"

		//input_contactId:"#ContactId",
		//spec_container:"#spec_container",

	});

});


</script>
<?php
echo $this->element('serviceapp/add_job_type');

 ?>
