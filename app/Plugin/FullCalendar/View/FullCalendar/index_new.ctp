<br />
<br />
<br />
<br />
<h3>Calendar</h3>
<div class="innerLR">
	<div class="row">
		<div class="col-md-8">
			<!-- Widget -->
			<div class="widget">
				<div class="widget-body innerAll inner-2x">
					<div data-component>
						<div id="calendar"></div>
					</div>
				</div>
			</div>
			<!-- // Widget END -->
		</div>
		<div class="col-md-4">
			<!-- External Events -->
			<div id="external-events">
				<!-- Widget -->
				<div class="widget">
					<!-- Widget heading -->
					<div class="widget-head">
						<h3 class="heading">New Events</h3>
					</div>
					<!-- // Widget heading END -->
					<div class="widget-body padding-none">
						<div class="innerAll inner-2x border-bottom">
							 <?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
							 <div class="row">
							 	<div class="col-12"> 
									<?php echo $this->Form->label('first_name', 'First Name:'); ?>
									<?php echo $this->Form->text('first_name', array('class' => 'form-control', 'readonly' => 'readonly', 'value' => $fname)); ?>
									<div class="separator bottom"></div>
									
									<?php echo $this->Form->label('last_name', 'Last Name:'); ?>
									<?php echo $this->Form->text('last_name', array('class' => 'form-control', 'readonly' => 'readonly', 'value' => $lname)); ?>
									<div class="separator bottom"></div>
									<?php $x = AuthComponent::user('full_name'); //echo $x;    ?>
									<?php echo $this->Form->input('User', array('type' => 'text','label'=>'Sales Person:', 'div'=>false, 'class' => 'form-control', 'readonly' => 'readonly', 'value' => $x)); ?>
									<?php echo $this->Form->input('sperson', array('type' => 'hidden','value' => $x)); ?>
									<div class="separator bottom"></div>
									<?php echo $this->Form->input('email', array('type' => 'text', 'label'=>'Email:', 'class' => 'form-control', 'required' => 'required','readonly' => 'readonly', 'value' => $email)); ?>
									<div class="separator bottom"></div>
									<?php echo $this->Form->input('phone', array('type' => 'text', 'label'=>'Phone#', 'class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly', 'value' =>$phone)); ?>
									<div class="separator bottom"></div>
									<?php echo $this->Form->input('mobile', array('type' => 'text','label'=>'Mobile#', 'class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly', 'value' => $mobile)); ?>
									<div class="separator bottom"></div>
									<font color="red" >*</font>
									<?php  echo $this->Form->input('event_type_id', array('label'=>'Event Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => array(
                       				'4' => 'Demo Product', '5' => 'Delivery', '13' => 'Phone Call Out', '14' => 'Phone Call In', '15' => 'Send Email', '16' => 'Customer Meeting', '17' => 'Sign Papers', '18' => 'F/I Prodcuts')));   ?>
									<div class="separator bottom"></div>
									
									<font color="red" >*</font>
									<?php echo $this->Form->input('status', array('label'=>'Event Status:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' => 'required', 'options' => array(
									'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
									'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed')));	?>
									<div class="separator bottom"></div>
									
									<font color="red" >*</font>
									<?php echo $this->Form->input('title', array('label'=>'Event Title:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
									<div class="separator bottom"></div>
									
									<font color="red" >*</font>
									<?php echo $this->Form->input('details', array('label'=>'Event Details:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => 'required')); ?>
									<div class="separator bottom"></div>
									
									<font color="red" >*</font>
									<?php echo $this->Form->input('start', array('label'=>'Event Start-Date:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
									<div class="separator bottom"></div>
									
									<font color="red" >*</font>
									<?php echo $this->Form->input('end', array('label'=>'Event End-Date:&nbsp;','div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => 'required')); ?>
									<div class="separator bottom"></div>
									
									
							 	</div>
							 </div>
							 <?php echo $this->Form->end(); ?> 
						</div>
					</div>
				</div>
				<!-- // Widget END -->
			</div>
			<!-- // External Events END -->
		</div>
	</div>
</div>
