<?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#UserAddForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>

<div class="row">
<div class="span9 offset2">
<h5>Add New User</h5>
<?php echo $this->Form->create('User',array('action'=>'add', 'class'=>'form-inline')); ?>
<fieldset>
<div align="center">
<p><font color="red"><strong>**&nbsp;</font>All fields are required to add a new staff person!</strong></p>
&nbsp;<font color="red" >*</font>&nbsp;Dealer:&nbsp;<?php echo $this->Form->input('dealer',array('type'=>'text','required'=>'required','class'=>'input-medium')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Dealer ID:&nbsp;<?php echo $this->Form->input('dealer_id',array('type'=>'text','required'=>'required','class'=>'input-small')); ?>


&nbsp;<font color="red" >*</font>&nbsp;First:&nbsp; <?php echo $this->Form->input('first_name',array('required'=>'required','class'=>'input-medium')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Last:&nbsp; <?php echo $this->Form->input('last_name',array('required'=>'required','class'=>'input-medium')); ?>


</br></br>
&nbsp;<font color="red" >*</font>&nbsp;Username:&nbsp; <?php echo $this->Form->input('username',array('required'=>'required','class'=>'input-small')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Time Zone:&nbsp; <?php echo $this->Form->input('zone', array('type' => 'select', 'options' => array(
'America/Los_Angeles' => 'America/Los_Angeles',
'America/Phoenix' => 'America/Phoenix',
'America/Denver' => 'America/Denver',
'America/Chicago' => 'America/Chicago',
'America/New_York' => 'America/New_York'

), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['zone'], 'required'=>'required','class'=>'input-medium'));
?>&nbsp;

&nbsp;<font color="red" >*</font>&nbsp;Step Process:&nbsp; <?php echo $this->Form->input('step_procces', array('type' => 'select', 'options' => array(
'lemco_steps' => 'Lemco 1-9',
'hd_steps' => 'H-D Steps 1-7'
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'required'=>'required','class' => 'input-medium')); ?>


</br></br>
&nbsp;<font color="red" >*</font>&nbsp;Mobile Quick Code:&nbsp; <?php echo $this->Form->input('quick_code',array('type'=>'text','required'=>'required','class' => 'input-small')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Staff Type:&nbsp; <?php echo $this->Form->input('group_id',array('options'=>$grouplist,'class' => 'input-medium', 'empty' => 'Select', 'selected' => '',)); ?>
</br></br>
&nbsp;<font color="red" >*</font>&nbsp;Password:&nbsp; <?php echo $this->Form->input('password',array('type'=>'password','required'=>'required','class' => 'input-medium')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Confirm Password:&nbsp; <?php echo $this->Form->input('confirm',array('type'=>'password','required'=>'required','class' => 'input-medium')); ?>
</br></br>
&nbsp;<font color="red" >*</font>&nbsp;Email:&nbsp; <?php echo $this->Form->input('email',array('type'=>'email','required'=>'required','class' => 'input-medium')); ?>
&nbsp;<font color="red" >*</font>&nbsp;Dealership Type:&nbsp; <?php echo $this->Form->input('dealer_type', array('type' => 'select', 'options' => array(
'HD' => 'H-D Dealer',
'Metric' => 'Mettric Dealer',
'RV' => 'Mettric Dealer',
'Marine' => 'Mettric Dealer',
'Auto' => 'Mettric Dealer',
'AG' => 'Agriculture Dealer',
'Wheel/Tire' => 'Tire/Wheel Dealer',
), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'required'=>'required','class' => 'input-medium')); ?>
</br></br> <!--
&nbsp;&nbsp;<font color="red" >*</font>&nbsp;Events Reminder:&nbsp;&nbsp;<?php echo $this->Form->input('Model.field', array(
    'type' => 'select',
    'multiple' => 'checkbox',
    'options' => array(
            'Yes' => 'Yes',
            'No' => 'No'
    )
)); ?>&nbsp;&nbsp; - After customer new log entry it will set a (2) two day reminder to call back.
</br></br> -->
&nbsp;<font color="red" >*</font>&nbsp;Activate User:&nbsp; <?php echo $this->Form->input('active',array('required'=>'required','class' => 'input-mini')); ?>

<div class="form-actions">
<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>" class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Back to user list</a>
                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;
<?php echo $this->Form->submit('<i class="icon-save"></i> Add',array( 'div'=>false,'class'=>'btn btn-success')); ?>
</div>
</fieldset>
<?php echo $this->Form->end(); ?>
</div>
</div>
<script>
$(document).ready(function(){
$("#UserAddForm").validate({

rules: {
"data[User][password]":{
required: true,
minlength:5,

},
"data[User][confirm]":{
required: true,
minlength:5,
equalTo: "#UserPassword"

}
},
messages: {
"data[User][password]":"",
"data[User][confirm]":{equalTo:"make sure both match"}
},
errorElement:"span"

});
});
</script>
