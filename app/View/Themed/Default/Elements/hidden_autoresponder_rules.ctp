										<?php echo $this->Form->hidden('id[]', array('value' =>0));  ?>
										<?php //echo $this->Form->hidden('rule_type[]', array('name'=>'rule_type[]', 'value' =>"auto_renponder", 'id'=>false) ); ?>
													
												<hr>		
												<div class="row">
													<div class="col-md-2"  >
														<?php echo $this->Form->label('duration','Email Mode:'); ?>
														<?php 
														$email_mode = array('SendgridAPI'=>'Sendgrid API','Email'=>'Email');
														echo $this->Form->input('email_mode', array('name'=>'email_mode[]','type' => 'select', 'options' => $email_mode,'label'=>false,'div'=>false, 'id'=>false,'class' => 'form-control selectpicker','value'=>''));?>
														<div class="separator"></div>
													</div>

													<div class="col-md-2" >
														<?php echo $this->Form->label('duration33','After (Days):'); ?>
														<?php 
														$Days = range(1,730);
														$Days = array_combine($Days,$Days);
														echo $this->Form->input('top_duration[]', array('name'=>'top_duration[]','type' => 'select', 'options' => $Days,'label'=>false,'div'=>false,  'id'=>false, 'empty' => 'Days', 'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>
													</div>
                                                    
                                                    <div class="col-md-5" >
														<?php echo $this->Form->label('duration33','Dormant (Days):'); ?>
														<?php
														//$Days = range(1,730);
                           								 $Days = range(1,1460);
														$Days = array_combine($Days,$Days);
														echo $this->Form->input('dormant_days[]', array('name'=>'dormant_days[]','type' => 'select', 'options' => $Days,'label'=>false,'div'=>false, 'id'=>false, 'empty' => 'Days', 'class' => 'form-control selectpicker'));?>
														<div class="separator"></div>
													</div>

													<div class="col-md-2 closebutton"  >
														
													</div>
												</div>	


													<div class="row">

													
													<div class="col-md-2" >
														<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
														<?php echo $this->Form->input('search_contact_status_id[]', array(
															'type' => 'select',
															'options' => $ContactStatus,
															'name'=>'search_contact_status_id[]',
															'id'=>'AutoresponderSearchContactStatusId[]',
															'empty' => 'Select','selected' => '','id'=>false,'label'=>false,'div'=>false,'class' => 'form-control selectpicker search_contact_status_id','style'=>'width: 100%','onchange'=>'GetStepNStatus(this)'));
														?>
														<div class="separator"></div>
													</div>
													
													<div class="col-md-1"  >
														<?php echo $this->Form->label('search_lead_status','Open/Close:'); ?>
														<?php echo $this->Form->input('search_lead_status[]', array('name'=>'search_lead_status[]','type' => 'select', 'options' => array('Open' => 'Open', 'Closed' => 'Closed'),'id'=>false,'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','onchange'=>'GetStepNStatus(this)'));?>
														<div class="separator"></div>
													</div>
													
													<div class="col-md-1">
														<?php echo $this->Form->label('search_sales_step','Step:'); ?>
														<?php
															echo $this->Form->select('search_sales_step[]', $SalesStep, array(
															'name'=>'search_sales_step[]',
															'empty' => 'Select',
															'selected' => '','label'=>false,'id'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
														));
														?>
														<div class="separator"></div>
													</div>
													<div class="col-md-2">
														<?php
														echo $this->Form->label('search_status_header','Status Header:'); 
														echo $this->Form->select('search_status_header[]', $lead_status_headers, array(
															'name'=>'search_status_header[]',
															'empty' => 'Select',
															'label'=>false,'div'=>false,'id'=>false, 'onchange'=>'set_statuses(this)', 'class' => 'form-control selectpicker','style'=>'width: 100%'));
														?>
														<div class="separator"></div>
													</div>

													<div class="col-md-2">
														<?php
														echo $this->Form->label('search_status','Status:'); 
														echo $this->Form->select('search_status[]', array(), array(
															'name'=>'search_status[]',
															'empty' => 'Select',
															'label'=>false,'div'=>false, 'id'=>false, 'class' => 'form-control selectpicker','style'=>'width: 100%'
														));
														?>
														<div class="separator"></div>
													</div>
													
													
													<div class="col-md-2">
														<?php
														echo $this->Form->label('search_source','Source:'); 
														echo $this->Form->input('search_source[]', array(
															'type' => 'select',
															'options' => $LeadSource,
															'name'=>'search_source[]',
															'empty' => 'Select',
															'selected' => '',
															'label'=>false, 'id'=>false, 'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
														));
														?>
														<div class="separator"></div>
													</div>
													
													<div class="col-md-2">
														<?php
														echo $this->Form->label('search_source','Template:'); 
														echo $this->Form->input('template[]', array(
															'name'=>'template[]',
															'type' => 'select',
															'options' => $templates,
															'empty' => 'Select',
															'label'=>false, 'id'=>false, 'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%',
															'selected'=>$sel_template_id
														));
														?>
														<span style="float:right;"><a href="javascript:void(0)" onclick="ShowTemplate(this,'first');">Click to View Template</a></span>
														<div class="separator"></div>
														<div class="separator"></div>
													</div>
													
													
													
												</div>