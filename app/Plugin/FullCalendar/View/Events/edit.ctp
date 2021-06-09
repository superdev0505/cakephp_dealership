<?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#EventEditForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>

<?php
//$x = AuthComponent::user('full_name');
//echo $x;
?>
<div class="row">
    <div class="span8 offset2">
        <div>
            <h5>Edit Event</h5>
        </div>
        <?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
        <fieldset>
            <div align="center">	


                <?php echo $this->Form->input('event_type_id', array('type' => 'hidden')); ?>	
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                <?php echo $this->Form->input('zone', array('type' => 'hidden', 'readonly' => 'true', 'value' => "$zone")); ?>
		First Name:&nbsp;<?php echo $this->Form->input('first_name', array('class' => 'input-medium', 'readonly' => 'readonly')); ?>
                &nbsp;Last Name:&nbsp; <?php echo $this->Form->input('last_name', array('class' => 'input-medium', 'readonly' => 'readonly')); ?>
                &nbsp;Sales Person:&nbsp; <?php echo $this->Form->input('sperson', array('class' => 'input-medium', 'readonly' => 'readonly')); ?></br></br>

                &nbsp;Email:&nbsp; <?php echo $this->Form->input('email', array('class' => 'input-large', 'readonly' => 'readonly')); ?>

   &nbsp;&nbsp;Home#&nbsp; <?php echo $this->Form->input('phone', array('class' => 'input-medium', 'readonly' => 'readonly')); ?>             
&nbsp;&nbsp;&nbsp;Mobile#&nbsp; <?php echo $this->Form->input('mobile', array('class' => 'input-medium', 'readonly' => 'readonly')); ?></br></br>


                
                &nbsp;<font color="red" >*</font>&nbsp;Event Type:&nbsp;&nbsp; 
                <?php
                echo $this->Form->input('event_type_id', array('type' => 'select', 'class' => 'span2', 'options' => array(
                        '1' => "Meet and Greet",
                        '4' => "Demo Product",
                        '5' => "PDI / Delivery",
                        '18' => "F / I Products",
                        '17' => "Sign Papers",
                        '16' => "Customer Meeting",
                        '15' => "Send Email",
                        '14' => "Phone Call In",
                        '13' => "Phone Call Out",
                    ), 'empty' => 'Select','class'=>'input-medium', 'selected' => $this->data['Event']['event_type_id'], 'id' => 'event_type_id'));
                ?>
                
                &nbsp;<font color="red" >*</font>&nbsp;Event Status:&nbsp;&nbsp; <?php
                echo $this->Form->input('status', array('class'=>'input-medium','options' => array(
                        'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
                        'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed'))); ?>&nbsp;<font color="red" >*</font>&nbsp;Event Title:&nbsp; <?php echo $this->Form->input('title', array('class' => 'input-medium')); ?>
</br></br>&nbsp;<font color="red" >*</font>&nbsp;Event Details:&nbsp; <?php echo $this->Form->input('details', array('type' => 'textarea', 'class' => 'span6')); ?>

</br></br>
                &nbsp;<font color="red" >*</font>&nbsp;Event Start-Date:&nbsp;<?php echo $this->Form->input('start', array('class' => 'input-small')); ?></br></br>
                &nbsp;<font color="red" >*</font>&nbsp;Event End-Date:&nbsp; <?php echo $this->Form->input('end', array('class' => 'input-small')); ?>
         
                <div class="form-actions">
                    <a class="btn btn-info" href="/dashboards/">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'full_calendar')); ?>">Calendar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index')); ?>">Events</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <a class="btn btn-info" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'action' => 'view', $this->Form->value('Event.id'))); ?>"><i class="icon"></i>View Event</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <?php echo $this->Form->submit('<i class="icon-save"></i> Save', array('div' => false, 'class' => 'btn btn-success')); ?>

                                 </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<form name="del" id="del" action="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'delete', $this->request->data['Event']['id'])); ?>" method="post">
    <input type="hidden" name="id" id="delid" value="<?php echo $this->request->data['Event']['id']; ?>">
</form>
</div>