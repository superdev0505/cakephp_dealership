</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	

	<div class="row">
		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Transfer Lead to Sales Person in mass</h4>
				</div>
				<div class="widget-body">
						
						<?php //debug($users);
						echo $this->Form->create('Contact', array( 'class' => 'form-inline no-ajaxify apply-nolazy', 'type'=>'post', 'role'=>"form")); ?>
								
						<div class="row">
							<div class="col-md-12">
									<?php echo $this->Form->label('user_id_from','Transfer mass leads from:', array('class'=>'strong')); ?>
									<?php
									echo $this->Form->select('user_id_from',$users , array(
									'empty' => 'Select',
									'required' => 'required',
									'selected' => '',
									'class' => 'form-control' ,'style'=>'width: 100%'
									));
									?>
									
									<div class="separator"></div>
									<?php echo $this->Form->label('user_id_to','Transfer mass leads to:', array('class'=>'strong')); ?>
									<?php
									echo $this->Form->select('user_id_to',$users , array(
									'empty' => 'Select',
									'required' => 'required',
									'selected' => '',
									'class' => 'form-control' ,'style'=>'width: 100%'
									));
									?>
									<div class="separator"></div>
									<?php echo $this->Form->label('note','Note:'); ?>
									<?php echo $this->Form->textarea('note', array('class'=>'form-control')); ?>
								
							</div>
							
							<div class="col-md-12 text-right">
								<div class="separator"></div>
								<button type="submit" id="btn_move_contact_mass" class="btn btn-success" >Move</button>&nbsp;
							</div>
	
						</div>
						<?php echo $this->Form->end(); ?>
						
						
						
				</div>
			</div>
		</div>
		
	</div>	
	<?php  //echo $this->element("sql_dump"); ?>
</div>
<script>
$script('/app/View/Themed/Default/webroot/js/lead_transfer_mass.js?v=v0.0.1.2.<?php  //echo rand(1, 10000); ?>');
</script>






