<?php echo $this->Form->create($modelName, array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_web_alert_dealer', $dealerKey, $id), 'id' => 'EditWebLead')); ?>

<?php echo $this->Form->hidden('id', array('value' => $id)); ?>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>

        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email'));   ?>
        <?php echo $this->Form->error('web_alert_id');  ?>
    </div>

    <div class="col-md-12 text-right">
        <div class="separator"></div>
        <button type="submit" id="btn_edit_lead" class="btn btn-success" >Edit</button>&nbsp;
        <button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
    </div>
</div>

<?php echo $this->Form->end(); ?>

<script type="text/javascript">
    $(function() {
        $("#close_modal_dialog").click(function(event) {
            event.preventDefault();
            bootbox.hideAll();
        });

        $("#btn_edit_lead").click(function(event) {

            $(this).attr('disabled', true);
            $(this).html('Loading...');

            $.ajax({
                type: "POST",
                cache: false,
                url:  $("#EditWebLead").attr('action'),
                data: $("#EditWebLead").serialize(),
                success: function(data) {
                    $("#close_child_modal_dialog").click();
                    location.href = "/dealer_settings";
                }
            });
        });
    });
</script>
