</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	
	
	
	<div class="row">

		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Teams</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">
								<div style=" ">
								<table class="table table-striped table-responsive  table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Team Name</th>
											<th>Team Owner</th>
											<th>Team Members</th>
											<th>Action</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($ManageTeams as $manageTeam){ ?>
										<tr class="text-primary">
											<td><?php echo $manageTeam['ManageTeam']['team_name']; ?>&nbsp;</td>
											<td><?php echo $manageTeam['User']['first_name']; ?> <?php echo $manageTeam['User']['last_name']; ?>&nbsp;</td>
											<td>
												<?php if($manageTeam['ManageTeam']['team_members'] != ''){ ?>

													<?php foreach( explode(",", $manageTeam['ManageTeam']['team_members'])  as  $user_id){ ?>

														<div class="bg-gray border-all clearfix" style="margin-bottom: 3px;padding: 2px">	
															<?php echo $user_list[$user_id]. " - {$user_id}"; ?>
														</div>

													<?php } ?>

												<?php } ?>
												&nbsp;
											</td>
											<td>
												<a class="btn btn-primary btn-xs no-ajaxify" 
												  href="/manage_teams/index/?team_id=<?php echo $manageTeam['ManageTeam']['id']; ?>"><i class="fa fa-pencil"></i></a>

												<a class="btn btn-danger btn-xs no-ajaxify" onclick="return confirm('Do you want to delete the team?')" href="/manage_teams/delete_team/<?php echo $manageTeam['ManageTeam']['id']; ?>"><i class="fa fa-times"></i></a>
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

								<a class="no-ajaxify btn btn-danger" href="/"><i class="fa fa-chevron-left"></i> Back</a>
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
					<?php if(isset(  $this->request->query['team_id'])){ ?>
						<h4 class="heading">Edit New Team</h4>
					<?php }else{ ?>
						<h4 class="heading">Add New Team</h4>
					<?php } ?>


				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('ManageTeam', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post')); ?>
						<div class="form-group">
							<?php echo $this->Form->label('team_name','Team Name:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								
								<?php echo $this->Form->hidden('id');	?>

								<?php echo $this->Form->text('team_name',array('required'=>true,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('team_name');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('floor_manager_id','Team Owner:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('floor_manager_id',array('label'=>false, 'div' => false, 'empty'=>"Select Team Owner", 'required'=>true,'options' => $user_list_floor,  'class' => 'form-control'));	?>
								<?php echo $this->Form->error('floor_manager_id');	?>
							</div>
						</div>


						<div class="form-group">
							<?php echo $this->Form->label('team_member','Team Members:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('team_member',array( 'label'=>false, 'div' => false, 'multiple'=>true, 'empty'=>"Select", 'options' => $user_list_employee, 'type'=>'select', 'hiddenField' => false, 'style' => 'width: 100%'));	?>
								<?php echo $this->Form->error('team_member');	?>
							</div>
						</div>



						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>

								<?php if(isset(  $this->request->query['team_id'])){ ?>
									<a class="btn btn-danger no-ajaxify" href="/manage_teams/">Cancel</a>
								<?php } ?>

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

<?php

echo $this->element("sql_dump");



 ?>
<script type="text/javascript">














</script>




