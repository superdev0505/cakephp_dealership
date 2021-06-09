<?php echo $this->Form->create('Deal', array('action' => 'add', 'class' => 'form-inline')); ?>
		
<div class="separator"></div>
<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
					
		<div class="row row-merge">
			<div class="col-md-4">
				<div class="innerAll">
					<h3>SALE PERSON</h3>
					<div class="separator"></div>
					<?php
					echo $this->Form->input('sperson', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control input-sm'));
					?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="innerAll text-center">
					<h3>WORK SHEET</h3>
				</div>
			</div>
			<div class="col-md-4">
				<div class="innerAll">
					<h3>FLOOR MANAGER</h3>
					<div class="separator"></div>
					<?php
					echo $this->Form->input('condition', array('type' => 'select', 'options' => array(), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control input-sm'));
					?>
				</div>
			</div>
		</div>
	
		<div class="row row-merge">
			
			
			<div class="col-md-4">
				<div class="innerAll">
					<div class="row">	
						<div class="col-md-4">
							<?php echo $this->Form->label('condition','Condition:'); ?>
						</div>
						<div class="col-md-4"> 
							<?php
							echo $this->Form->input('condition1', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control input-sm'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-4">
							<button type="button" class="btn btn-primary btn-sm no-ajaxify" id="btn-look-up-1">Look up</button>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('year1', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('year1','Year'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('make1', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('make1','Make'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('model1', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('model1','Model'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('unit_color1', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('unit_color1','Color'); ?> 
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('odometer1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('odometer1','Milage'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('stock_num1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('stock_num1','Stock'); ?> 
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount1',"Sales Price$"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<?php echo $this->Form->input('amount1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php
							echo $this->Form->input('condition', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => "Accy's And Install",'value'=>$condition,'label'=>false,'div'=>false,'class' => 'form-control input-sm', 'style'=>'width: 100%'));
							?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('Assembly',"Assembly/PDI"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('Assembly', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('condition', array('type' => 'select', 'options' => array(), 'empty' => "",'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
						</div>
						<div class="col-md-4">
							Doc/Lic/Reg
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Tax @ 7.8%"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Subtotal"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount5',"Trade"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount5', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount6',"Tax Credit"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount6', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount7',"Difference"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount7', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount8',"+Payoff Of"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount8', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount9',"Final Total",array('class'=>'text-primary')); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount9', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
				</div>
			</div>			
			
			
			<div class="col-md-4">
				<div class="innerAll">
					<div class="row">	
						<div class="col-md-4">
							<?php echo $this->Form->label('condition2','Condition:'); ?>
						</div>
						<div class="col-md-4"> 
							<?php
							echo $this->Form->input('condition2', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control input-sm'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-4">
							<button type="button" id="btn-look-up-2" class="btn btn-primary btn-sm">Look up</button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('year2', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('year2','Year'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('make2', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('make2','Make'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('model2', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('model2','Model'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('unit_color2', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('unit_color2','Color'); ?> 
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('odometer2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('odometer2','Milage'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('stock_num2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('stock_num2','Stock'); ?> 
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount2',"Sales Price$"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<?php echo $this->Form->input('amount2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php
							echo $this->Form->input('condition', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => "Accy's And Install",'value'=>$condition,'label'=>false,'div'=>false,'class' => 'form-control input-sm', 'style'=>'width: 100%'));
							?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Assembly/PDI"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('condition', array('type' => 'select', 'options' => array(), 'empty' => "",'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
						</div>
						<div class="col-md-4">
							Doc/Lic/Reg
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Tax @ 7.8%"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Subtotal"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Trade"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Tax Credit"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount7',"Difference"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount7', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount8',"+Payoff Of"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount8', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount9',"Final Total",array('class'=>'text-primary')); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount9', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
				</div>
			</div>			
			
			
			<div class="col-md-4">
				<div class="innerAll">
					<div class="row">	
						<div class="col-md-4">
							<?php echo $this->Form->label('condition3','Condition:'); ?>
						</div>
						<div class="col-md-4"> 
							<?php
							echo $this->Form->input('condition3', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control input-sm'));
							?>
							<div class="separator"></div>
						</div>
						<div class="col-md-4">
							<button type="button" id="btn-look-up-3" class="btn btn-primary btn-sm">Look up</button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('year3', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('year3','Year'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('make3', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('make3','Make'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('model3', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('model3','Model'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('unit_color3', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('unit_color3','Color'); ?> 
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('odometer3', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('odometer3','Milage'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('stock_num3', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('stock_num3','Stock'); ?> 
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount3',"Sales Price$"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<?php echo $this->Form->input('amount3', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php
							echo $this->Form->input('condition', array('type' => 'select', 'options' => array(
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => "Accy's And Install",'value'=>$condition,'label'=>false,'div'=>false,'class' => 'form-control input-sm', 'style'=>'width: 100%'));
							?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Assembly/PDI"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('condition', array('type' => 'select', 'options' => array(), 'empty' => "",'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
						</div>
						<div class="col-md-4">
							Doc/Lic/Reg
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Tax @ 7.8%"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount',"Subtotal"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount5',"Trade"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount5', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount6',"Tax Credit"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount6', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount7',"Difference"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount7', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount8',"+Payoff Of"); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount8', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
					
					<hr />
					<div class="row">
						<div class="col-md-7">
							<?php echo $this->Form->label('amount9',"Final Total",array('class'=>'text-primary')); ?>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon input-sm">$</span>
								<?php echo $this->Form->input('amount9', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							</div>
						</div>
					</div>
				</div>
			</div>			
			
			
			
		</div>	
		<hr />
		
		<div class="row">
			<div class="col-md-8">
				<div class="innerAll">
					TRADE INFORMATION
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('year', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('year','Year'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('make', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('make','Make'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('model', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('model','Model'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('vin', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('vin','vin'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<?php echo $this->Form->input('color', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('color','Color'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('milage', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('milage','Milage'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('payoff_amount', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('payoff_amount','Payoff Amount'); ?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('bank_name', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('bank_name','Bank Name'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="innerAll">
					METHOD PAYMENT<br />
					<?php
					echo $this->Form->input('method_payment', array('type' => 'select', 'options' => array(), 'empty' => 'Select','value'=>$condition,'label'=>false,'div'=>false,'class' => 'form-control input-sm'));
					?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="innerAll">
					IF FINANCING, PURCHASER AUTHORIZES DEALER TO VERIFY THIS DATA WITH CREDIT BUREAU & ACKNOWLEDGES VIEWING THIS WORKSHEET. 
					<div class="separator"></div>
					<div class="separator"></div>
					X <hr />
					<div class="separator"></div>
					<div class="separator"></div>
					IF PAYING BY ANOTHER MEANS, I HEREBY ACKNOWLEDGES VIEWING THIS WORKSHEET. 
					<div class="separator"></div>
					<div class="separator"></div>
					X <hr />
				</div>
			</div>
			<div class="col-md-8">
				<div class="innerAll">
					<div class="row">
						
						<div class="col-md-12">
							<strong>Name</strong>
						</div>
						<div class="col-md-6">
							<?php echo $this->Form->input('first', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('first','First'); ?>
						</div>
						<div class="col-md-6">
							<?php echo $this->Form->input('last', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('last','Last'); ?>
						</div>
					</div>
			
					<div class="row">
						<div class="col-md-10">
							<?php echo $this->Form->input('address', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('address','Address'); ?>
						</div>
					</div>
	
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('city', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('city','CITY'); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('state', array('type' => 'select', 'options' => array(), 'empty' => "",'label'=>false,'div'=>false,'class' => 'form-control input-sm')); ?>
							<?php echo $this->Form->label('state','STATE'); ?>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('zip', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('zip','ZIP'); ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('day_time_contact', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('day_time_contact','DAY TIME CONTACT # '); ?>
						</div>
						<div class="col-md-2">
							&nbsp;
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('social_security', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('social_security','SOCIAL SECURITY'); ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4">
							<?php echo $this->Form->input('cell_pager_home', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('cell_pager_home','CELL/PAGER/HOME #'); ?>
						</div>
						<div class="col-md-2">
							&nbsp;
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('dob', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control input-sm'));?>
							<?php echo $this->Form->label('dob','DATE OF BIRTH'); ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10">
							<?php echo $this->Form->input('email_address', array('type' => 'text', 'empty' => 'Year','label'=>false,'div'=>false,  'class' => 'form-control input-sm','style'=>''));	?>
							<?php echo $this->Form->label('email_address','EMAIL ADDRESS'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="innerAll">	
		<div class="row">
			<div class="col-md-4">
				<button id="load_worksheet" class="btn btn-primary">Submit</button>
			</div>
			<div class="col-md-4">
				<button id="load_worksheet" class="btn btn-primary">Back</button>
			</div>
			<div class="col-md-4">
				<button id="load_worksheet" class="btn btn-primary">Clear Screen</button>
			</div>
		</div>
		</div>
		
	</div>
</div>		

<?php echo $this->Form->end(); ?>


<script>
function load_lookup_vehicle(input_num){
	$.ajax({
		type: "GET",
		cache: false,
		url:  "/deals/work_sheet_lookup/",
		success: function(data){
			
			bootbox.dialog({
				message: data,
				title: "Select OEM Vehicle",
				buttons: {
					success: {
						label: "Ok",
						className: "btn-success",
						callback: function() {
							if($("#select_oem_vehicle").val() != ''){
								//console.log( $("#select_oem_vehicle").val() );
								//Load OEM vehicle
								$.ajax({
									type: "GET",
									cache: false,
									 dataType: "json",
									url:  "/contacts/get_oem_vehicle/"+$("#select_oem_vehicle").val(),
									success: function(data2){
										$("#DealCondition"+input_num).val(data2.InventoryOem.Condition);
										$("#DealYear"+input_num).val(data2.InventoryOem.Year);
										$("#DealMake"+input_num).val(data2.InventoryOem.Make);
										$("#DealModel"+input_num).val(data2.InventoryOem.Model);
										$("#DealUnitColor"+input_num).val(data2.InventoryOem.Color);
										$("#DealOdometer"+input_num).val(data2.InventoryOem.odometer);
										$("#DealStockNum"+input_num).val(data2.InventoryOem.StockNum);
										$("#DealAmount"+input_num).val(data2.InventoryOem.unit_value);
									}
								});
								
							}
						}
					},
				}
			});			
		}
	});
}

$(function(){

	$("#btn-look-up-1").click(function(){
		load_lookup_vehicle(1);
	});
	$("#btn-look-up-2").click(function(){
		load_lookup_vehicle(2);
	});
	$("#btn-look-up-3").click(function(){
		load_lookup_vehicle(3);
	});


});
	
</script>












