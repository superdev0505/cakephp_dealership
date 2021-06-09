

<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$date = new DateTime();
date_default_timezone_set($zone);
$datetime = date('Y-m-d G:i:s');
//echo $datetime;
?>
<div class="row">
    <div class="span9 offset2">
        <h5>Edit User
            <?php if (AuthComponent::user('group_id') == 1): ?>
                <!-- <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add')); ?>" class="btn btn-success btn-mini"><i class="icon-plus"></i></a> -->

            <?php endif; ?>
        </h5>
        <?php echo $this->Form->create('User', array('action' => 'edit', 'class' => 'form-inline')); ?>
        <fieldset>
            <div align="center">
                &nbsp;Dealer:&nbsp;<?php echo $this->Form->input('dealer', array('type' => 'text', 'disabled' => 'true', 'class' => 'input-medium')); ?>
                &nbsp;Dealer
                ID:&nbsp;<?php echo $this->Form->input('dealer_id', array('type' => 'text', 'disabled' => 'true', 'class' => 'input-mini')); ?>
                &nbsp;&nbsp;First:&nbsp;<?php echo $this->Form->input('first_name', array('readonly' => 'readonly', 'class' => 'input-small')); ?>
                &nbsp;Last:&nbsp;<?php echo $this->Form->input('last_name', array('readonly' => 'readonly', 'class' => 'input-medium')); ?>
                </br/></br/>
                &nbsp;Username:&nbsp;<?php echo $this->Form->input('username', array('disabled' => 'true', 'class' => 'input-medium')); ?>
                &nbsp;&nbsp;Email:&nbsp;<?php echo $this->Form->input('email', array('disabled' => 'true', 'class' => 'span2')); ?>

                &nbsp;Time
                Zone:&nbsp;<?php echo $this->Form->input('zone', array('type' => 'select', 'options' => array(
                    'America/Los_Angeles' => 'America/Los_Angeles',
                    'America/Phoenix' => 'America/Phoenix',
                    'America/Denver' => 'America/Denver',
                    'America/Chicago' => 'America/Chicago',
                    'America/New_York' => 'America/New_York'

                ), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['zone'], 'disabled' => 'true', 'class' => 'input-large')); ?>

                </br></br>
                &nbsp;Dealership
                Type:&nbsp; <?php echo $this->Form->input('dealer_type', array('type' => 'select', 'options' => array(
                    'HD' => 'H-D Dealer',
                    'Metric' => 'Metric Dealer',
                    'RV' => 'RV Dealer',
                    'Marine' => 'Marine Dealer',
                    'Auto' => 'Auto Dealer',
                    'AG' => 'Agriculture Dealer',
                    'Wheel/Tire' => 'Tire/Wheel Dealer',
                ), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'required' => 'required', 'disabled' => 'true', 'class' => 'input-medium')); ?>

                &nbsp;Step
                Procces:&nbsp;<?php echo $this->Form->input('step_procces', array('type' => 'select', 'options' => array(
                    'lemco_steps' => 'Lemco 1-9',
                    'hd_steps' => 'H-D Steps 1-7'
                ), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'disabled' => 'true', 'class' => 'input-medium')); ?>



                &nbsp;Staff
                Group:&nbsp;<?php   if ((AuthComponent::user('group_id') == 1) and (AuthComponent::user('id') != $this->request->data['User']['id']))
                    echo $this->Form->input('group_id', array('options' => $grouplist));
                else
                    echo $this->Form->input('group', array('value' => $grouplist[$this->request->data['User']['group_id']], 'class' => 'uneditable-input')); ?>
                </br></br>
                &nbsp; Quick
                Code:&nbsp;<?php echo $this->Form->input('quick_code', array('type' => 'text', 'class' => 'input-small')); ?>
                &nbsp;&nbsp;New
                Password:&nbsp;<?php echo $this->Form->input('new_password', array('type' => 'password', 'class' => 'input-medium')); ?>
                &nbsp;&nbsp;Confirm New
                Password:&nbsp;<?php echo $this->Form->input('confirm', array('type' => 'password', 'class' => 'input-medium')); ?>
                </br></br> <!--
&nbsp;&nbsp;Events Reminder:&nbsp;&nbsp;<?php echo $this->Form->input('Model.field', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => array(
            'Yes' => 'Yes',
            'No' => 'No'
    )
)); ?>&nbsp;&nbsp; - After customer new log entry it will set a (2) two day reminder to call back.
</br></br> -->
                &nbsp;&nbsp;Active User:&nbsp;&nbsp;<?php echo $this->Form->input('active'); ?>
                <!-- Hidden times -->
                <?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => $datetime)); ?>
                <?php echo $this->Form->input('active_view_helper', array('type' => 'hidden', 'value' => $this->request->data['User']['active'])); ?>
                <div class="form-actions">
                    <?php if (AuthComponent::user('group_id') < 3) { ?>
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"
                           class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Back to user list</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php } ?>
                    &nbsp; &nbsp; &nbsp;
                    &nbsp;<?php echo $this->Form->submit('<i class="icon-save"></i> Save', array('div' => false, 'class' => 'btn btn-success')); ?>
                    <!--
<?php if (($this->request->data['User']['id'] != AuthComponent::user('id')) and (AuthComponent::user('group_id') == 1 )) : ?>
<a href="#" class="btn btn-danger cdelete" ><i class="icon-trash"></i>&nbsp;Delete</a>

<?php endif; ?>-->
                </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#UserEditForm").validate({

            rules: {
                "data[User][new_password]": {
//required: false,
                    minlength: 5,

                },
                "data[User][confirm]": {
//required: false,
                    minlength: 5,
                    equalTo: "#UserNewPassword"

                }
            },
            messages: {
                "data[User][new_password]": "Please check this field",
                "data[User][confirm]": {equalTo: "make sure both match"}
            },
            errorElement: "span"

        });
    });
</script>
<?php if (($this->request->data['User']['id'] != AuthComponent::user('id')) and (AuthComponent::user('group_id') == 1)) : ?>
    <form name="del" id="del"
          action="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete', $this->request->data['User']['id'])); ?>"
          method="post">
        <input type="hidden" name="id" id="delid" value="<?php echo $this->request->data['User']['id']; ?>">
    </form>
<?php endif; ?><?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#UserEditForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>
</div>
