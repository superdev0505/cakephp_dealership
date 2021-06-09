</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>


	<div class="row">

		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Lead Sources</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">
								<div style="">
								<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Dealer</th>
											<th>Name</th>
											<th>Visible</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($lead_sources as $lead_source){ ?>
										<tr class="text-primary">
											<td><?php echo ($lead_source['LeadSource']['dealer_id'] == '0')? "Default" : "" ?>&nbsp;</td>
											<td><?php echo $lead_source['LeadSource']['name']; ?>&nbsp;</td>
											<td>

												<div class="make-switch" data-on-label="Yes" data-off-label="No" data-on="success" data-off="danger">
																					<input class="chk_lead_source" name="leadsource_<?php echo $lead_source['LeadSource']['id']; ?>" type="checkbox" source_id = "<?php echo $lead_source['LeadSource']['id']; ?>"  <?php if (isset($hidden_sources[ $lead_source['LeadSource']['name'] ])) echo ""; else echo 'checked="checked"'; ?>   />
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
					<h4 class="heading">Add New Source</h4>
				</div>
				<!-- // Widget heading END -->

				<div class="widget-body">
					<div class="innerLR">
						<div class="separator"></div>
						<?php echo $this->Form->create('LeadSource', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post')); ?>
						<div class="form-group">
							<?php echo $this->Form->label('name','Source:', array('class'=>'col-sm-2 control-label')); ?>
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

<script>

    $script.ready('bundle', function() {


	<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
	$(window).load(function(){
	<?php } ?>

		$(".chk_lead_source").change(function(){
			$.ajax({
			    type: "POST",
			    cache: false,
			    dataType: 'json',
			    data: {'source_id' : $(this).attr("source_id"), 'value': $(this).is(":checked")},
			    url:  "/lead_sources/save_settings/",
			    success: function(data){
			        console.log(data);
			    }
			});
		});


	<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
	});
	<?php } ?>

 });


</script>
