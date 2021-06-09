
</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	


<div class="row">

	<div class="col-md-9">
		<div class="widget widget-heading-simple widget-body-white">
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading">Step Definition</h4>
			</div>

			<?php echo $this->Form->create('StepDefinition',array('action'=>'index','autocomplete'=>"off",'class' => 'form-inline apply-nolazy')); ?>

			<div class="widget-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
								<!-- Table heading -->
								<thead>
									<tr>
										<th>Step ID</th>
										<th>Default Name</th>
										<th>Custom Name</th>
										<th>Visible</th>
										<th>Call Center</th>
									
									</tr>
								</thead
								><!-- // Table heading END -->
								<!-- Table body -->

								<tbody>
								<?php foreach ($step_definitions as $step_definition) { 
									$is_visible = ($step_definition['StepDefinition']['visible'] == 1)? "color: #3695d5" : "color: #cacaca;";

								?>
									<tr >
										<td style='<?php echo $is_visible; ?>' ><?php echo $step_definition['StepDefinition']['step_id']; ?>&nbsp;</td>
										<td style='<?php echo $is_visible; ?>' ><?php echo $step_definition['StepDefinition']['step_name']; ?>&nbsp;</td>
										<td style='<?php echo $is_visible; ?>' >
											<?php echo $this->Form->text('StepDefinition.' .$step_definition['StepDefinition']['id']. '.custom_name', 
											 array('value' => $step_definition['StepDefinition']['custom_name'],  
											 'class'=>'form-control', 'style'=>'width: auto; '.$is_visible)); ?></td>
										<td style='<?php echo $is_visible; ?>' >
											<?php echo $this->Form->hidden('StepDefinition.' .$step_definition['StepDefinition']['id']. '.step_id', 
											array('value'=>$step_definition['StepDefinition']['step_id'] )); ?>
											<?php echo $this->Form->hidden('StepDefinition.' .$step_definition['StepDefinition']['id']. '.dealer_id', 
											array('value'=>$step_definition['StepDefinition']['dealer_id'] )); ?> 

											<?php 
											$is_disabled = (
												$step_definition['StepDefinition']['step_id'] == 1 ||
												$step_definition['StepDefinition']['step_id'] == 7 ||
												$step_definition['StepDefinition']['step_id'] == 8 ||
												$step_definition['StepDefinition']['step_id'] == 10
											)? true : false;

											echo $this->Form->input('StepDefinition.' .$step_definition['StepDefinition']['id']. '.visible', 
											array('checked'=>  ($step_definition['StepDefinition']['visible'] == 1)? true : false    
											,'type'=>'checkbox', 'disabled'=>$is_disabled, 'label'=>false, 'div'=>false, 'style'=>'width: auto')); ?>
										</td>
										<td style='<?php echo $is_visible; ?>' >
											<?php echo $this->Form->input('StepDefinition.' .$step_definition['StepDefinition']['id']. '.call_center', 
											array('checked'=>  ($step_definition['StepDefinition']['call_center'] == 1)? true : false    
											,'type'=>'checkbox', 'class'=>'chk_call_center', 'label'=>false, 'div'=>false, 'style'=>'width: auto'));  ?>
										</td>
										

									</tr>
								<?php } ?>
								<!-- // Table row END -->
								</tbody>
								<!-- // Table body END -->
							</table>
							<!-- // Table END -->
							<?php //debug($lead_sources); ?>
							<?php //echo $this->element('sql_dump'); ?>

						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-right">
							<br>
							<button class='btn btn-success' type='submit' >Save</button>
						</div>
					</div>
			</div>
		</div>
		 <?php echo $this->Form->end(); ?>
	</div>
</div>


</div>

<script>
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>

       


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	

});



</script>
