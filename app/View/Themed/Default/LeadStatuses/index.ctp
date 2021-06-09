</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	
	
	
	<div class="row">

		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Lead Status</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">
								<div style=" max-height: 430px; overflow: auto;">
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Dealer</th>
											<th>Header</th>
											<th>Name</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($lead_statuses as $lead_status){ ?>
										<tr class="text-primary">
											<td><?php echo ($lead_status['LeadStatus']['dealer_id'] == '0')? "Default" : "" ?>&nbsp;</td>
											<td><?php echo $lead_status['LeadStatus']['header']; ?>&nbsp;</td>
											<td><?php echo $lead_status['LeadStatus']['name']; ?>&nbsp;</td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->
								</div>
								<?php //debug($lead_statuses); ?>
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
					<h4 class="heading">Add New Status</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('LeadStatus', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post')); ?>
						<div class="form-group">
							<?php echo $this->Form->label('name','Status:', array('class'=>'col-sm-2 control-label')); ?>
							<div class="col-sm-10">
								<?php echo $this->Form->select('header',$lead_headers,array('empty'=>'Select','required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('header');	?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('name','Status:', array('class'=>'col-sm-2 control-label')); ?>
							<div class="col-sm-10">
								<?php echo $this->Form->text('name',array('required'=>false,'class' => 'form-control'));	?>
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
	
</div>




