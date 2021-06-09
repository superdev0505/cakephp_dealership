
<?php $dealer_id = AuthComponent::user('dealer_id'); ?>
<br />
<br />
<br />
<br />

<div class="innerLR">
<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
<div class="row">
<div class="widget widget-heading-simple widget-body-white">
<div class="widget-head">
					<h4 class="heading">Service Timings</h4>
				</div>
                <div class="widget-body">
                <div class="row">
                <?php echo $this->Form->create('ServiceSetting', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'timings'))); 
				echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
				if($timing_exist)
				{
					echo $this->Form->hidden('id');
				}
				?>
                <div class="col-md-2" style="width:11%!important"><label>Start Timings :</label></div><div class="col-md-2" style="width:13%!important"><div class="input-group bootstrap-timepicker" >
						<?php echo $this->Form->input('start', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div>
														</div>  <div class="col-md-2"  style="width:11%!important"><label>End Timings :</label></div><div class="col-md-2" style="width:13%!important"><div class="input-group bootstrap-timepicker" >
						<?php echo $this->Form->input('end', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div>
														</div>
                                                        <div class="col-md-2" style="width:12%!important"><label>Time Slot Duration</label></div><div class="col-md-2" style="width:13%!important"><?php echo $this->Form->input('time_slots',array('div'=>false,'label'=>false,'type'=>'select','class'=>'form-control','empty'=>'Select slot duration','options'=>array('15'=>'15 minutes','30'=>'30 minutes','60'=>'1 hour'))); ?></div>
                                                        
                                                  <div class="col-md-1">
                                                  <button type="submit" class="btn btn-primary">Save</button>
                                                  </div>      
                                         <?php echo $this->Form->end(); ?>   
                                         <div class="col-md-2" style="width:18%">
                                          Multi-Sub Category Jobs: 
                                        <div class="make-switch" data-on="success" data-off="default">
                                            <input name="advanced_jobs" id="advanced_jobs" type="checkbox" <?php 
											echo (isset($service_timings['ServiceSetting'])&&$service_timings['ServiceSetting']['advanced_job'])?'checked="checked"':'';
											 ?>  />
                                        </div>
                                         </div>             
                                         </div>
                                                
                      </div>
                </div>
                
</div>
</div>
 <?php if($service_timings['ServiceSetting']['advanced_job']){ ?> 
<div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Service Vendor</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div>
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											
                                            <th>Service Vendor</th>
                                            <th>Action/Hide</th>
                                           
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($all_service_categories as $category){ ?>
										<tr class="text-primary">
											<td><?php echo $category['ServiceJobCategory']['name'];?>&nbsp;</td>
                                            			
                                            <td class="actions">	
			 <?php
			if($category['ServiceJobCategory']['dealer_id']){
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_option','data-placement'=>'top','data-original-title'=>"Edit Service Vendor",'data-toggle'=>"tooltip",'data-id'=>$category['ServiceJobCategory']['id'],'data-name' => $category['ServiceJobCategory']['name'],'data-model'=>'ServiceJobCategory','label-index'=>'6'));
			}else{
			 $hide_dealer_ids = explode(',',$category['ServiceJobCategory']['hide_list']);
			 $hide_dealer_ids = array_combine($hide_dealer_ids,$hide_dealer_ids);
			 $job_checked ='';
			 if(in_array($dealer_id,$hide_dealer_ids))
			 {
				$job_checked = 'checked="checked"';
				unset($hide_dealer_ids[$dealer_id]); 
			 }else{
				$hide_dealer_ids[$dealer_id] = $dealer_id; 
			 }
		 ?>						
                <div class="make-switch " data-on="success" data-off="default">
                    <input class="service_hide_list" data-id="<?php echo $category['ServiceJobCategory']['id']; ?>" data-dealer="<?php echo implode(',',$hide_dealer_ids); ?>" type="checkbox" value="<?php echo $category['ServiceJobCategory']['id']; ?>" <?php echo $job_checked; ?> data-table="ServiceJobCategory" />
                </div>
				
				<?php } ?>                                     
		</td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Service Vendor</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceJobCategory', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceJobCategory'));
						?>
						 
                        <div class="form-group">
							<?php echo $this->Form->label('name','Service Vendor', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>

<?php } ?>

<?php // Service Job Category ?>
   <div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Service Visit Type LIST</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div>
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Visit Type</th>
                                            <th>Service Category</th>
                                            <th>EST. Time</th>
										    <th>Action</th>
                                            <th>Hide</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($service_events as $type){ ?>
										<tr class="text-primary">
											<td><?php echo $type['ServiceEventType']['name'];?>&nbsp;</td>
                                            <td><?php echo isset($type['ServiceJobCategory']['name'])?$type['ServiceJobCategory']['name']:'--';?>&nbsp;</td>
                                            <td><?php $est_time = round($type['ServiceEventType']['est_time']/60,2). ' hrs ';
											
											echo $est_time;
											?>&nbsp;</td>					
                                            <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_visit_type','data-placement'=>'top','data-original-title'=>"Edit Visit Type",'data-toggle'=>"tooltip",'data-id'=>$type['ServiceEventType']['id'],'data-name'=>$type['ServiceEventType']['name'],'data-model'=>'ServiceEventType','label-index'=>'0','data-time' => $type['ServiceEventType']['est_time']));
			 ?>                                     
		</td>
         <td>
         <?php
		 $hide_dealer_ids = explode(',',$type['ServiceEventType']['hide_list']);
		 $hide_dealer_ids = array_combine($hide_dealer_ids,$hide_dealer_ids);
		 $job_checked ='';
		 if(in_array($dealer_id,$hide_dealer_ids))
		 {
			$job_checked = 'checked="checked"';
			unset($hide_dealer_ids[$dealer_id]); 
		 }else{
			$hide_dealer_ids[$dealer_id] = $dealer_id; 
		 }
		 ?>						
                <div class="make-switch " data-on="success" data-off="default">
                    <input class="service_hide_list" data-id="<?php echo $type['ServiceEventType']['id']; ?>" data-dealer="<?php echo implode(',',$hide_dealer_ids); ?>" type="checkbox" value="<?php echo $type['ServiceEventType']['id']; ?>" <?php echo $job_checked; ?> data-table="ServiceEventType" />
                </div>
          </td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Service Visit Type</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceEventType', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceEventType'));
						?>
                         <?php if($service_timings['ServiceSetting']['advanced_job']){ ?> 
						 <div class="form-group">
                         
							<?php echo $this->Form->label('service_job_category_id','Service Vendor', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('service_job_category_id',array('required'=>true,'class' => 'form-control','label' => false,'div' => false,'type' =>'select','empty' => 'Select Service Vendor','options' => $service_categories));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        <div class="form-group">
							<?php echo $this->Form->label('service_category_id','Service Category', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('service_category_id',array('required'=>true,'class' => 'form-control','label' => false,'div' => false,'type' =>'select','empty' => 'Select Service Category','options' => $service_sub_categories));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        <?php } ?>
                        <div class="form-group">
							<?php echo $this->Form->label('name','Visit Type', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        <div class="form-group">
							<?php echo $this->Form->label('est_time','Est. Time', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
                            	<div class="row">
                                    <div class="col-md-5" >
                                    <div class="input-group">
                                    <?php echo $this->Form->text('est_time',array('required'=>true,'class' => 'form-control','pattern' => '[0-9]{1,2}','value' => 0));	?>
                                    <?php echo $this->Form->error('est_time');	?>
                                    <div class="input-group-addon">Hours</div>
                                    </div>
                                    </div>
                                    <div class="col-md-5">
                                    <div class="input-group">
                                    <?php echo $this->Form->text('est_minutes',array('required'=>true,'class' => 'form-control','pattern' => '[0-9]{1,2}','value' => 0));	?>
                                    <?php echo $this->Form->error('est_minutes');	?>
                                    <div class="input-group-addon">minutes</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>
   
    
<?php // Service Status?>
<div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Appointment Status LIST</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div>
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th width="55">Appointment Status</th>
                                            <th width="5">Color</th>
										    <th width="15">Action</th>
                                            <th width="25">Hide</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($service_event_status as $type){ ?>
										<tr class="text-primary">
											<td><?php echo $type['ServiceEventStatus']['name'];?>&nbsp;</td>					
                                            <td><span style="padding:5px;display:block;background:<?php echo $type['ServiceEventStatus']['color_code']; ?>">&nbsp;</span></td>
                                            <td class="actions">
        
			
			 <?php
			if($dealer_id == $type['ServiceEventStatus']['dealer_id']){
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_service_status','data-placement'=>'top','data-original-title'=>"Edit Appointment Status",'data-toggle'=>"tooltip",'data-id'=>$type['ServiceEventStatus']['id'],'data-name'=>$type['ServiceEventStatus']['name'],'data-model'=>'ServiceEventStatus','data-color' => $type['ServiceEventStatus']['color_code'],'label-index'=>'1'));
			}
			 ?>                                     
		</td>
         <td>
         <?php
		 $hide_dealer_ids = explode(',',$type['ServiceEventStatus']['hide_list']);
		 $hide_dealer_ids = array_combine($hide_dealer_ids,$hide_dealer_ids);
		 $job_checked ='';
		 if(in_array($dealer_id,$hide_dealer_ids))
		 {
			$job_checked = 'checked="checked"';
			unset($hide_dealer_ids[$dealer_id]); 
		 }else{
			$hide_dealer_ids[$dealer_id] = $dealer_id; 
		 }
		 ?>						
                <div class="make-switch " data-on="success" data-off="default">
                    <input class="service_hide_list" data-id="<?php echo $type['ServiceEventStatus']['id']; ?>" data-dealer="<?php echo implode(',',$hide_dealer_ids); ?>" type="checkbox" value="<?php echo $type['ServiceEventStatus']['id']; ?>" <?php echo $job_checked; ?> data-table="ServiceEventStatus" />
                </div>
          </td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Appointment Status</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceEventStatus', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceEventStatus'));
						?>
						
                        <div class="form-group">
							<?php echo $this->Form->label('name','Appointment Status', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        <div class="form-group">
							<?php echo $this->Form->label('color_code','Status Color', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('color_code',array('required'=>true,'id' =>'ServiceStatusColor' ));	?>
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>
 <?php // Service Bay  ?>
 <div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Service Status LIST</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div>
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Service Status</th>
										    <th>Action</th>
                                            <th>Hide</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($service_statuses as $type){ ?>
										<tr class="text-primary">
											<td><?php echo $type['ServiceStatus']['name'];?>&nbsp;</td>					
                                            <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_option','data-placement'=>'top','data-original-title'=>"Edit Service Status",'data-toggle'=>"tooltip",'data-id'=>$type['ServiceStatus']['id'],'data-name'=>$type['ServiceStatus']['name'],'data-model'=>'ServiceStatus','label-index'=>'2'));
			 ?>                                     
		</td>
        <td>
         <?php
		 $hide_dealer_ids = explode(',',$type['ServiceStatus']['hide_list']);
		 $hide_dealer_ids = array_combine($hide_dealer_ids,$hide_dealer_ids);
		 $job_checked ='';
		 if(in_array($dealer_id,$hide_dealer_ids))
		 {
			$job_checked = 'checked="checked"';
			unset($hide_dealer_ids[$dealer_id]); 
		 }else{
			$hide_dealer_ids[$dealer_id] = $dealer_id; 
		 }
		 ?>						
                <div class="make-switch " data-on="success" data-off="default">
                    <input class="service_hide_list" data-id="<?php echo $type['ServiceStatus']['id']; ?>" data-dealer="<?php echo implode(',',$hide_dealer_ids); ?>" type="checkbox" value="<?php echo $type['ServiceStatus']['id']; ?>" <?php echo $job_checked; ?> data-table="ServiceStatus" />
                </div>
          </td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Service Status</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceStatus', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceStatus'));
						?>
						
                        <div class="form-group">
							<?php echo $this->Form->label('name','Service Status', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                         <div class="form-group">
							<?php echo $this->Form->label('short_code','Service Code', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('short_code',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('short_code');	?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>
    
    <?php // Service Warranty ?>
    <div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Service Warranty Type LIST</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div>
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Warranty Type</th>
										    <th>Action</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($service_warranty_types as $type){ ?>
										<tr class="text-primary">
											<td><?php echo $type['ServiceWarrantyType']['name'];?>&nbsp;</td>					
                                            <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_option','data-placement'=>'top','data-original-title'=>"Edit Warranty Type",'data-toggle'=>"tooltip",'data-id'=>$type['ServiceWarrantyType']['id'],'data-name'=>$type['ServiceWarrantyType']['name'],'data-model'=>'ServiceWarrantyType','label-index'=>'3'));
			 ?>                                     
		</td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Service Warranty Type</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceWarrantyType', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceWarrantyType'));
						?>
						
                        <div class="form-group">
							<?php echo $this->Form->label('name','Warranty Type', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>
    
    <?php // service appoint type?> 
    
    <div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Service Bays LIST</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div style=" max-height: 430px; overflow: auto;">
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Service Bay</th>
										    <th>Action</th>
                                            <th>Hide</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($service_bays as $type){ ?>
										<tr class="text-primary">
											<td><?php echo $type['ServiceBay']['name'];?>&nbsp;</td>					
                                            <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_option','data-placement'=>'top','data-original-title'=>"Edit Service bay",'data-toggle'=>"tooltip",'data-id'=>$type['ServiceBay']['id'],'data-name'=>$type['ServiceBay']['name'],'data-model'=>'ServiceBay','label-index'=>'4'));
			 ?>                                     
		</td>
        <td>
        <?php 
		$is_checked = '';
		if($type['ServiceBay']['is_active'])
		{
			$is_checked = 'checked="checked"';
		}
		?>
        		<div class="make-switch " data-on="success" data-off="default">
                    <input class="service_active_option" data-id="<?php echo $type['ServiceBay']['id']; ?>" type="checkbox" value="1" <?php echo $is_checked; ?> data-table="ServiceBay" />
                </div>
        </td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add New Service Bay</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ServiceBay', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'add_option'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'ServiceBay'));
						?>
						
                        <div class="form-group">
							<?php echo $this->Form->label('name','Service Bay', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>  	
	
    
    
    <?php // Add Dealership breaks time ?>
    <div class="row">

		<div class="col-md-7">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Dealership Break Time</h4>
				</div>
				<div class="widget-body">
						<div class="row" style="max-height:250px;overflow-y:scroll;">
							<div class="col-md-12">
								<div style=" max-height: 430px; overflow: auto;">
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Break Type</th>
                                            <th>Start</th>
                                            <th>End</th>
										    <th>Action</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($dealer_breaks as $break){ ?>
                                    <tr>
                                    <td><?php echo $break['DealerBreak']['break_type']; ?></td>
                                    <td><?php echo date('h:i A',strtotime($break['DealerBreak']['start'])); ?></td>
                                    <td><?php echo date('h:i A',strtotime($break['DealerBreak']['end'])); ?></td>
                                    <td><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'service_settings', 'action' => 'delete_break',
                                                $break['DealerBreak']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger',
                                                'data-placement' => 'top', 'data-original-title' => "Delete Break", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Break?')); ?></td>
                                    </tr>
									
									
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_sources); ?>
								<?php //echo $this->element('sql_dump'); ?>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Add Dealership Break</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('DealerBreak', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post','url'=>array('controller'=>'service_settings','action'=>'dealer_break'))); 
						echo $this->Form->hidden('dealer_id',array('value'=>AuthComponent::user('dealer_id')));
						echo $this->Form->hidden('Model.name',array('value'=>'DealerBreak'));
						?>
						
                        <div class="form-group">
							<?php echo $this->Form->label('break_type','Break Type', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('break_type',array('required'=>true,'class' => 'form-control' ));	?>
								<?php echo $this->Form->error('break_type');	?>
							</div>
						</div>
                        <div class="form-group">
							<?php echo $this->Form->label('start','Start Time', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
							<div class="input-group bootstrap-timepicker" >
								<?php echo $this->Form->input('start', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div>
                                <?php echo $this->Form->error('start');	?>
							</div>
						</div>
                        
                         <div class="form-group">
							<?php echo $this->Form->label('end','End Time', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
							<div class="input-group bootstrap-timepicker" >
								<?php echo $this->Form->input('end', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div>
                                <?php echo $this->Form->error('end');	?>
							</div>
						</div>
                        
                        
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>
    
	
   
   
   
   	
	
	
   
   
   
   
   
   
   
   
   
    
	
	
	
</div>	






    
    <?php // Edit BDC Survey status modal ?>
    
    
	
<div class="modal fade" id="modal-1">
	
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">

			<?php echo $this->Form->create('Option', array('url' => array('controller'=>'service_settings','action' => 'edit_option') ,'id'=>'EditOptionForm','class' => 'form-inline')); ?>
			<!-- Modal body -->
			<div class="modal-body">
				<legend id="FormHeader">Edit Option</legend>
                <div class="separator"></div>
				<div class="row">
               
							<?php 
							
							echo $this->Form->hidden('id');
							echo $this->Form->hidden('Model.name',array('id'=>'EditModel'));
							?>
						</div>
                         <div class="separator"></div>
                         <div class="row">
							<?php echo $this->Form->label('name','Option Name', array('class'=>'col-sm-3 control-label','id'=>'OptionLabel')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
						
				</div>
				
			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
				<button type="submit" class="btn btn-primary pull-right no-ajaxify" id="EditFormSubmit">Save</button>
			</div>
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>
    
<div class="modal fade" id="modal-2">
	
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">

			<?php echo $this->Form->create('Option', array('url' => array('controller'=>'service_settings','action' => 'edit_option') ,'id'=>'EditOptionForm2','class' => 'form-inline')); ?>
			<!-- Modal body -->
			<div class="modal-body">
				<legend>Edit Service Visit Type</legend>
                <div class="separator"></div>
				<div class="row">
               
							<?php 
							
							echo $this->Form->hidden('id',array('id' => 'EventTypeID'));
							echo $this->Form->hidden('Model.name',array('value' => 'ServiceEventType'));
							?>
						</div>
                         <div class="separator"></div>
                         <div class="row">
							<?php echo $this->Form->label('name','Visit Type', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control','id'=>'EventTypeName'));	?>						<?php echo $this->Form->error('name');	?>
							</div>
                             </div>
						<div class="row" style="margin-top:10px;">
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
                        
						
				</div>
				
			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
				<button type="submit" class="btn btn-primary pull-right no-ajaxify" id="EditFormSubmit">Save</button>
			</div>
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>    



<div class="modal fade" id="modal-3">
	
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">

			<?php echo $this->Form->create('Option', array('url' => array('controller'=>'service_settings','action' => 'edit_option') ,'id'=>'EditOptionForm2','class' => 'form-inline')); ?>
			<!-- Modal body -->
			<div class="modal-body">
				<legend id="FormHeader">Edit Service Status</legend>
                <div class="separator"></div>
				<div class="row">
               
							<?php 
							
							echo $this->Form->hidden('id',array('id' => 'ServiceStatusId2'));
							echo $this->Form->hidden('Model.name',array('value'=>'ServiceEventStatus'));
							?>
						</div>
                         <div class="separator"></div>
                         <div class="row">
							<?php echo $this->Form->label('name','Service Status', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('name',array('required'=>true,'class' => 'form-control','id'=>'ServiceStatusName2'));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>
                        <div class="separator"></div>
                        <div class="row">
							<?php echo $this->Form->label('color_code','Status Color', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('color_code',array('required'=>true,'id' =>'ServiceStatusColor2' ));	?>
								
							</div>
						</div>
                        
						
				</div>
				
			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
				<button type="submit" class="btn btn-primary pull-right no-ajaxify" id="EditFormSubmit3">Save</button>
			</div>
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>













<?php $model_array=array('Visit Type','Appointment Status','Service Status','Warrant Type','Service Bay','Service Category'); ?>	
	

	

<script>

$(document).on('ready',function(){

	
	});

$script.ready('bundle', function() {


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	


	

	
	
	$(".alert").delay(3000).fadeOut("slow");
	$('#ServiceSettingStart').timepicker();
	$('#ServiceSettingEnd').timepicker();	
	$('#DealerBreakStart').timepicker();
	$('#DealerBreakEnd').timepicker();
	
		$("#ServiceStatusColor").spectrum({
    						color: "#ECC",
							showInput: true,
							className: "full-spectrum",
    						showInitial: true,
							preferredFormat: "hex",
    						localStorageKey: "spectrum.status_color"
						});
		
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
	$(".edit_option").on('click',function(e){
		 e.preventDefault();
		 $model_array=['Visit Type','Appointment Status','Service Status','Warrant Type','Service Bay'];
		 id=$(this).attr('data-id');
		 name=$(this).attr('data-name');
		 $model = $(this).attr('data-model');
		 index = $(this).attr('label-index');
		 nameLabel= $model_array[index];
		$("#FormHeader").text('Edit '+nameLabel);
		$("#OptionLabel").text(nameLabel);
		 $("#OptionId").val(id);
		 $("#EditModel").val($model);
		  $("#OptionName").val(name);
		 $("#modal-1").modal('show');
		 
		 });
		 
		
		$(".edit_service_status").on('click',function(e){
			 e.preventDefault();
			 $model_array=['Visit Type','Appointment Status','Service Status','Warrant Type','Service Bay'];
			 id=$(this).attr('data-id');
			 name=$(this).attr('data-name');
			 $color = $(this).attr('data-color');
			 $("#ServiceStatusId2").val(id);
			 $("#ServiceStatusName2").val(name);
			 $("#ServiceStatusColor2").val($color);
			 $("#ServiceStatusColor2").spectrum({
    						color: $color,
							showInput: true,
							className: "full-spectrum",
    						showInitial: true,
							preferredFormat: "hex",
    						localStorageKey: "spectrum.status_color2"
						});
								 
			 $("#modal-3").modal('show');
		 
		 }); 
		 
	$(".edit_visit_type").on('click',function(e){
		 e.preventDefault();
		 id=$(this).attr('data-id');
		 name=$(this).attr('data-name');
		 time=parseInt($(this).attr('data-time'));
		 hour  = parseInt(time/60);
		 minute=parseInt(time%60);
		 hour = isNaN(hour)?0:hour;
		 minute = isNaN(minute)?0:minute;
		 $("#EventTypeID").val(id);
		 $("#EventTypeName").val(name);
		 $("#EventTypeHour").val(hour);
		 $("#EventTypeMinute").val(minute);
		 $("#modal-2").modal('show');
		 
		 });
		 
		 $("#EditOptionForm,#EditOptionForm2,#EditOptionForm3").on('submit',function(e){
											   $("#modal-1").modal('hide');
											   $("#modal-2").modal('hide');
											   e.preventDefault();
											  $.ajax({
													type: "POST",
													cache: false,
													
													data:$(this).serialize(),
													url:  $(this).attr('action'),
													success: function(data){
														location.reload();
													}
												});
											   });
											   
											   
		       $('#advanced_jobs').change(function(){
                    val='0';
                    if($(this).is(":checked"))
                    {
                        val='1';
                    }
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url:  "<?php echo $this->Html->url(array('controller' =>'service_settings','action' => 'advanced_job')); ?>/"+val,
                        success: function(data){
					
                        }
                    });
			
                });
				
	$(".service_hide_list").on('change',function(){
		model = $(this).attr('data-table');
		id = $(this).attr('data-id');
		dealers = $(this).attr('data-dealer');
		if($(this).is(":checked"))
		{
			dealers +=",<?php echo $dealer_id; ?>";
		}else{
			dealers = dealers.replace(/,<?php echo $dealer_id; ?>/g,'');
		}
		$.ajax({
			type:"POST",
			url:"<?php echo $this->Html->url(array('controller' => 'service_settings','action' => 'service_hide_list')); ?>",
			data:{id:id,hide_list:dealers,model:model},
			success: function(data){}
			});
		
		});		
		
	$(".service_active_option").on('change',function(){
			model = $(this).attr('data-table');
			id = $(this).attr('data-id');
			val = "0";
			if($(this).is(":checked"))
			{
				val ="1";
			}
			$.ajax({
				type:"POST",
				url:"<?php echo $this->Html->url(array('controller' => 'service_settings','action' => 'service_hide_list')); ?>",
				data:{id:id,is_active:val,model:model},
				success: function(data){}
				});		
			});		
			
		
 });		 
		
		
		

</script>
