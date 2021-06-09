
<?php if(!empty($webleads)) : ?>

    <?php foreach($webleads as $webleadKey => $wbData) : ?>

        <div class="row">
            <div class="col-md-6">
                <div class="widget widget-heading-simple widget-body-white">
                    <!-- Widget heading -->

                    <div class="widget-head">
                        <h4 class="heading"><?php echo $wbData['dealer_name']; ?> Email</h4>
                    </div>

                    <div class="widget-body">
                        <div class="row" style="max-height:250px;overflow-y:scroll;">
                            <div class="col-md-12">
                                <div style=" max-height: 430px; overflow: auto;">

                                    <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>

                                    <?php foreach($wbData['email_list'] as $k => $email) : ?>

                                    <tr class="text-primary">
                                        <td><?php echo $email[$wbData['model_name']]['email']; ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php
                                            echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),
                                                array(
                                                    'controller' => 'dealer_settings',
                                                    'action' => 'edit_web_alert_dealer',
                                                    $webleadKey,
                                                    $email[$wbData['model_name']]['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class'  => 'btn btn-sm btn-success dealer_edit_email',
                                                    'data-placement' => 'top',
                                                    'data-original-title' => "Edit Email",
                                                    'data-toggle' => "tooltip",
                                                )
                                            );
                                            ?>

                                            <?php
                                            echo $this->Form->postLink(__('<i class="fa fa-times"></i>'),
                                                array(
                                                    'controller' => 'dealer_settings',
                                                    'action' => 'delete_web_alert_dealer',
                                                    $webleadKey,
                                                    $email[$wbData['model_name']]['id']
                                                ),
                                                array(
                                                    'escape' => false,
                                                    'class' => 'btn btn-sm btn-danger',
                                                    'data-placement' => 'top',
                                                    'data-original-title' => "Delete Email",
                                                    'data-toggle' => "tooltip"
                                                ),
                                                __('Are you sure you want to delete Email?')
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <!-- // Table row END -->
                                    <?php endforeach; ?>

                                    </tbody>
                                    <!-- // Table body END -->
                                    </table>
                                    <!-- // Table END -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Widget -->
                <div class="widget widget-heading-simple widget-body-white">

                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading">Add New <?php echo $wbData['dealer_name']; ?> Email</h4>
                    </div>
                    <!-- // Widget heading END -->

                    <div class="widget-body">
                        <div class="innerLR">

                            <div class="separator"></div>

                            <?php
                            echo $this->Form->create('WebLead', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post','url' => array('controller' => 'dealer_settings', 'action' => 'add_web_alert_dealer')));
                            echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                            echo $this->Form->hidden('dealer_key', array('value' => $webleadKey));
                            ?>

                                <div class="form-group">
                                    <?php echo $this->Form->label('email','Email', array('class'=>'col-sm-3 control-label')); ?>
                                    <div class="col-sm-9">
                                    <?php echo $this->Form->text('email',array('required'=>true,'class' => 'form-control','type'=>'email')); ?>
                                    <?php echo $this->Form->error('email'); ?>
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

    <?php endforeach; ?>
<?php endif; ?>

<script type="text/javascript">
    $(function(){

        $(".dealer_edit_email").click(function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                cache: false,
                url: $(this).attr('href'),
                success: function(data){
                    if(data!='Not Found')
                    {
                    bootbox.dialog({
                        message: data,
                        backdrop: true,
                        title: "Edit Web Alert Email",
                    }).find("div.modal-dialog").addClass("midWidth");
                    }
                }
            });

        });

    });

</script>
