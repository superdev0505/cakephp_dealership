


						<div class="row">
							
							<div class="col-md-2">
								<?php echo $this->Form->label('search_category','Type:'); ?>
								<?php echo $this->Form->input('search_category', array('type' => 'select', 'options' => $d_type_options, 'value'=>$user_d_type, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
								<div class="separator"></div>
							</div>
							
							<div class="col-md-2">
								<?php echo $this->Form->label('search_type','Category:'); ?>
								<?php echo $this->Form->input('search_type', array('type' => 'select', 'options'=>$type_options,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
							</div>
							
							<div class="col-md-2">
								<?php echo $this->Form->label('search_make','Make:'); ?>
								<?php echo $this->Form->input('search_make', array('type' => 'select',   'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>
								<div class="separator"></div>
							</div>
							
							<div class="col-md-2">
								<font color='red'>*</font> <?php echo $this->Form->label('search_year','Year:'); ?><br />
								<?php echo $this->Form->input('search_year', array('type' => 'select',   'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
								<button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<font color='red'>*</font> 
								<?php echo $this->Form->label('search_model_id','Model:'); ?><br />
								<?php 
								$display_model_id =  "inline-block";
								echo $this->Form->input('search_model_id', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id));  
								?>
								<?php 
								$display_model_txt = 'none';
								echo $this->Form->input('search_model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt));  
								?>
								<button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
								<div class="separator"></div>
							</div>
							
							<div class="col-md-2">
								<?php echo $this->Form->label('search_class','Class:'); ?>
								<?php echo $this->Form->input('search_class', array('type' => 'select',   'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
							</div>
						
						</div>	
						<div class="row">	
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_condition','Unit Condtion:'); 
								echo $this->Form->input('search_condition', array(
									'type' => 'select',
									'options' => array(
										'New' => 'New',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_unit_color','Unit Color:'); 
								echo $this->Form->input('search_unit_color', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control'));
								?>
								<div class="separator"></div>
							</div>
							
							<div class="col-md-2">
								<?php 
								echo $this->Form->label('search_vehicle_trade','Vehicle/Trade:'); 
								echo $this->Form->input('search_vehicle_trade', array('type' => 'select', 'options'=>array('vehicle'=>'Vehicle','trade'=>'Trade'),  'empty' => false, 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
								<div class="separator"></div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="separator"></div>
								<hr />
								<div class="separator"></div>
							</div>
						</div>




<div class="row">
	<div class="col-md-2">
		<?php echo $this->Form->label('search_lead_status','Open/Close:'); ?>
		<?php echo $this->Form->input('search_lead_status', array('type' => 'select', 'options' => array('Open' => 'Open', 'Closed' => 'Closed'),'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'));?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
		<?php echo $this->Form->input('search_contact_status_id', array(
			'type' => 'select',
			'options' => $ContactStatus,
			'empty' => 'Select','selected' => '','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->label('search_sales_step','Step:'); ?>
		<?php
			
		 echo $this->Form->select('search_sales_step', $SalesStep, array(
			'empty' => 'Select',
			'selected' => '','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_status','Status:'); 
		echo $this->Form->select('search_status', $LeadStatus, array(
			'empty' => 'Select',
			'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php 
		echo $this->Form->label('search_gender','Gender:'); 
		echo $this->Form->input('search_gender', array(
			'type' => 'select',
			'options' => array(
				'Male' => 'Male',
				'Female' => 'Female'
			),
			'empty' => 'Select',
			'selected' => '',
			'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_best_time','Best Time:'); 
		echo $this->Form->input('search_best_time', array(
			'type' => 'select',
			'options' => array(
				'Anytime' => 'Anytime',
				'Morning' => 'Morning',
				'Mid Day' => 'Mid Day',
				'Afternoon' => 'Afternoon',
				'Evening' => 'Evening'
			),
			'empty' => 'Select',
			'selected' => '',
			'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_buying_time','Buying Time:'); 
		echo $this->Form->input('search_buying_time', array(
			'type' => 'select',
			'options' => array(
				'now' => 'now',
				'5days' => '5days',
				'10days' => '10days',
				'15days' => '15days',
				'20days' => '20days',
				'30days' => '30days',
				'40days' => '40days',
				'50days' => '50days',
				'60days' => '60days',
				'70days' => '70days',
				'80days' => '80days',
				'90days' => '90days',
				'120days' => '120days',
				'180days' => '180days',
				'6Months' => '6Months',
				'9Months' => '9Months',
				'1year' => '1year',
				'2year' => '2year'
			),
			'empty' => 'Select',
			'selected' => '',
			'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_source','Source:'); 
		echo $this->Form->input('search_source', array(
			'type' => 'select',
			'options' => $LeadSource,
			'empty' => 'Select',
			'selected' => '',
			'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('stock_num','Stock:'); 
		echo $this->Form->input('stock_num', array(
			'type' => 'text',
			'label'=>false,'div'=>false,'class' => 'form-control'
		));
		?>
		<div class="separator"></div>

	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('stock_num_trade','Stock#/T:'); 
		echo $this->Form->input('stock_num_trade', array(
			'type' => 'text',
			'label'=>false,'div'=>false,'class' => 'form-control'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_id','Ref#:'); 
		echo $this->Form->input('search_id', array(
			'type' => 'text',
			'label'=>false,'div'=>false,'class' => 'form-control'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_first_name','First:'); 
		echo $this->Form->input('search_first_name', array(
			'label'=>false,'div'=>false,'class' => 'form-control',
			'placeholder' => 'FName'
		));
		?>
		<div class="separator"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_last_name','Last:'); 
		echo $this->Form->input('search_last_name', array(
			'label'=>false,'div'=>false,'class' => 'form-control',
			'placeholder' => 'LName'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_phone','Phone:'); 
		echo $this->Form->input('search_phone', array(
			'label'=>false,'div'=>false,'class' => 'form-control',
			'placeholder' => 'Phone'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_mobile','Mobile:'); 
		echo $this->Form->input('search_mobile', array(
			'label'=>false,'div'=>false,'class' => 'form-control',
			'placeholder' => 'Mobile'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_email','Email:'); 
		echo $this->Form->input('search_email', array(
			'label'=>false,'div'=>false,'class' => 'form-control',
			'placeholder' => 'Email'
		));
		?>
		<div class="separator"></div>
	</div>
	
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_created','Search Start Date:'); 
		echo $this->Form->input('search_created', array(
			'type' => 'text',
			'label'=>false,'div'=>false,'class' => 'form-control'
		));
		?>
		<div class="separator"></div>
	</div>
	<div class="col-md-2">
		<?php
		echo $this->Form->label('search_modified','Search End Date:'); 
		echo $this->Form->input('search_modified', array(
			'type' => 'text',
			'label'=>false,'div'=>false,'class' => 'form-control'
		));
		?>
		
		
		<div class="separator"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			<?php echo $this->Form->hidden('count_recipient');  ?>
			<span id="recipients_count"> </span> <button type="button" id="filter_recipients" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Filter</button>
		</div>
	</div>
</div>