<?php
    $this->Html->scriptBlock("
        jQuery(function($){
            $('#EventAddForm').submit(function(event){
                if (!confirm('Are you sure?')) { return false; }
            });
        });
    ",array('inline'=>false));
?>

<?php
$cid = $_GET["id"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$mobile = $_GET["mobile"];
date_default_timezone_set($zone);
?>
<div class="row">
    <div class="span8 offset2">


        <h5>Add Event

        </h5>
        <?php echo $this->Form->create('Event', array('class' => 'form-inline')); ?>
        <fieldset>
            <div align="center">
                <?php echo $this->Form->input('zone', array('type' => 'hidden', 'readonly' => 'true', 'value' => "$zone")); ?>
                <?php echo $this->Form->input('contact_id', array('type' => 'hidden', 'class' => 'input-small', 'required' => 'required', 'id' => 'contact_id', 'value' => $cid)); ?>

                First Name:&nbsp;  <?php echo $this->Form->input('first_name', array('type' => 'text', 'class' => 'input-medium', 'required' => 'required', 'id' => 'first_name', 'readonly' => 'readonly', 'value' => $fname)); ?>&nbsp;

                Last Name:&nbsp;  <?php echo $this->Form->input('last_name', array('type' => 'text', 'class' => 'input-medium', 'id' => 'last_name', 'readonly' => 'readonly', 'value' => $lname)); ?>

                <?php $x = AuthComponent::user('full_name'); //echo $x;    ?>

                &nbsp;Sales Person:&nbsp;  <?php echo $this->Form->input('User', array('type' => 'text', 'empty' => 'Please Select', 'class' => 'input-medium', 'readonly' => 'readonly', 'value' => $x)); ?>
<?php echo $this->Form->input('sperson', array('type' => 'hidden', 'empty' => 'Please Select', 'class' => 'input-medium','value' => $x)); ?>
                </br></br>
                 Email:&nbsp;  <?php echo $this->Form->input('email', array('type' => 'text', 'class' => 'input-large', 'required' => 'required','readonly' => 'readonly', 'value' => $email)); ?>

&nbsp;Home#&nbsp;  <?php echo $this->Form->input('phone', array('type' => 'text', 'class' => 'input-medium', 'required' => 'required', 'readonly' => 'readonly', 'value' =>$phone)); ?>&nbsp;
&nbsp;Mobile#&nbsp;  <?php echo $this->Form->input('mobile', array('type' => 'text', 'class' => 'input-medium', 'required' => 'required', 'readonly' => 'readonly', 'value' => $mobile)); ?>&nbsp;
                </br></br>
                &nbsp;<font color="red" >*</font>&nbsp;Event Type:&nbsp;  <?php
                echo $this->Form->input('event_type_id', array('type' => 'select', 'multiple' => false, 'empty' => 'Please Select', 'class' => 'input-medium', 'required' => 'required', 'options' => array(
                        '4' => 'Demo Product', '5' => 'Delivery', '13' => 'Phone Call Out', '14' => 'Phone Call In', '15' => 'Send Email', '16' => 'Customer Meeting', '17' => 'Sign Papers', '18' => 'F/I Prodcuts')));
                ?>

                &nbsp;&nbsp;<font color="red" >*</font>&nbsp;Event Status:&nbsp;  <?php
                echo $this->Form->input('status', array('type' => 'select', 'multiple' => false, 'empty' => 'Please Select', 'class' => 'input-medium', 'required' => 'required', 'options' => array(
                        'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
                        'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed')));
                ?>

                &nbsp;<font color="red" >*</font>&nbsp;Event Title:&nbsp;  <?php echo $this->Form->input('title', array('type' => 'text', 'class' => 'input-medium', 'required' => 'required')); ?>&nbsp; </br></br>

                <font color="red" >*</font>&nbsp;Event Details:&nbsp;  <?php echo $this->Form->input('details', array('type' => 'textarea', 'class' => 'span6', 'required' => 'required')); ?>
                </br></br>
                <!-- Start time fills -->
                <font color="red" >*</font>&nbsp;Event Start-Date:&nbsp;  <?php
                echo $this->Form->input('start', array(
                    'type' => 'datetime',
                    'setTimezone' => ($zone),
                    'timeFormat' => '12',
                    'class' => 'input-small',
                    'empty' => FALSE
                ));
                ?>&nbsp; 
                </br></br><font color="red" >*</font>&nbsp;Event End-Date:&nbsp;  <?php
                echo $this->Form->input('end', array(
                   'type' => 'datetime',
                    'setTimezone' => ($zone),
                    'timeFormat' => '12',
                    'class' => 'input-small',
                    'empty' => FALSE
                ));
                ?>

                <!-- end time fills -->

                <div class="form-actions">
                    <div align="center">
                        &nbsp;<a href="/contacts/" class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <?php echo $this->Form->submit('<i class="icon-save"></i> Add', array('div' => false, 'class' => 'btn btn-info')); ?>

                    </div></div>
        </fieldset>
<?php echo $this->Form->end(); ?>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#contact_id').live('change', function() {
            $(this).attr('disabled', 'disabled');
            $('#first_name').val('');
            $('#last_name').val('');
            $.ajax({
                url: '<?php echo $this->webroot; ?>users/getUser/' + $(this).val() + '',
                dataType: 'json',
                success: function(json) {
                    $('#contact_id').removeAttr('disabled');
                    $('#first_name').val(json.User.first_name);
                    $('#last_name').val(json.User.last_name);
                },
                error: function() {
                    $('#contact_id').removeAttr('disabled');
                }
            });
        });
    });
</script>