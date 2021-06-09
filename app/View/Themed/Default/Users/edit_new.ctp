</br>
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
<br />
<br />
<br />
<div class="innerLR">
    <div class="row">
        <div class="col-md-9">
            <div class="wizard">
                   <div class="widget widget-tabs widget-tabs-responsive">
    					<!-- Widget heading -->
    					<div class="widget-head">
    						<ul>
    							<li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>Edit User</a></li>
    						</ul>
    					</div>
                         <div class="widget-body">
                               <?php echo $this->Form->create('User', array( 'class' => 'form-inline')); ?>
                                    <div class="tab-content">
      							<!-- Step 1 -->
      							<div class="tab-pane active" id="tab1-1">
      								<div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('dealer','Dealer:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('dealer', array('type' => 'text', 'disabled' => 'true', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('dealer_id','Dealer ID:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('dealer_id', array('type' => 'text', 'disabled' => 'true', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('first_name', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('last_name','Last Name:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('last_name', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('username','User Name:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('username', array('disabled' => 'true', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('email','Email:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('email', array('disabled' => 'true', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									       <?php echo $this->Form->label('zone','Time Zone:', array('class'=>'strong')); ?>
      									       <?php echo $this->Form->input('zone', array('type' => 'select', 'options' => $this->App->getTimezoneList(),
                                                                          'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['zone'], 'disabled' => 'true', 'class' => 'form-control','style'=>'width: 100%')); ?>
                                                                    <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									       <?php echo $this->Form->label('dealer_type','Dealership Type:', array('class'=>'strong')); ?>
      									       <?php echo $this->Form->input('dealer_type', array('type' => 'select', 'options' => array(
                                                                      'HD' => 'H-D Dealer',
                                                                      'Metric' => 'Metric Dealer',
                                                                      'RV' => 'RV Dealer',
                                                                      'Marine' => 'Marine Dealer',
                                                                      'Auto' => 'Auto Dealer',
                                                                      'AG' => 'Agriculture Dealer',
                                                                      'Wheel/Tire' => 'Tire/Wheel Dealer',),
                                                                      'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'required' => 'required', 'disabled' => 'true', 'class' => 'form-control','style'=>'width: 100%')); ?>
                                                         <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('step_procces','Step Procces:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('step_procces', array('type' => 'select', 'options' => array(
                                                                                'lemco_steps' => 'Lemco 1-9',
                                                                                'hd_steps' => 'H-D Steps 1-7'
                                                                            ),
                                                                            'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'disabled' => 'true', 'class' => 'form-control','style'=>'width: 100%')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php

                                                                if ((AuthComponent::user('group_id') == 1 || AuthComponent::user('group_id') == 2  || AuthComponent::user('group_id') == 9  || AuthComponent::user('group_id') == 6  || AuthComponent::user('group_id') == 12 ||
                                                                  AuthComponent::user('group_id') == 4 ||
                                                                  AuthComponent::user('group_id') == 7 ||
                                                                  AuthComponent::user('group_id') == 13

                                                                 )){
                                                                    echo $this->Form->label('group_id','Staff Group:', array('class'=>'strong'));
                                                                    echo $this->Form->input('group_id', array('options' => $grouplist, 'class' => 'form-control'));
                                                                } else {
                                                                    echo $this->Form->label('group','Staff Group:', array('class'=>'strong'));
                                                                    echo $this->Form->input('group', array('value' => $grouplist[$this->request->data['User']['group_id']], 'class' => 'form-control'));
                                                                }
                                                        ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									     <?php echo $this->Form->label('new_password','New Password:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('new_password', array('type' => 'password', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									     <?php echo $this->Form->label('confirm','Confirm New Password:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('confirm', array('type' => 'password', 'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">

      									<div class="col-md-3" style="margin-top: 30px;">
      									      <?php echo $this->Form->label('active','Active User:', array('class'=>'strong')); ?>
                                                        <?php echo $this->Form->input('active'); ?>
      									      <div class="separator"></div>
      									</div>
                                        <div class="col-md-3" style="margin-top: 30px;">
      									      <?php echo $this->Form->label('active_report','Group Active - Report:', array('class'=>'strong')); ?>
                                                        <?php echo $this->Form->input('active_report',array('type' => 'checkbox')); ?>
      									      <div class="separator"></div>
      									</div>


                        <div class="col-md-3" style="margin-top: 30px;">
                              <?php echo $this->Form->label('login_business_hours','Login only Business hours:', array('class'=>'strong')); ?>
                                                        <?php echo $this->Form->input('login_business_hours'); ?>
                              <div class="separator"></div>
                        </div>


      									<div class="col-md-3">
      									      <?php
											  if($this->params['prefix'] == 'serviceapp'){

											  echo $this->Form->label('service_order','Calendar Order:', array('class'=>'strong'));
											  echo $this->Form->input('service_order', array('class' => 'form-control'));
											  }
											  ?>

											  <?php

											  echo $this->Form->input('modified', array('type' => 'hidden', 'value' => $datetime)); ?>
                                                        <?php echo $this->Form->input('active_view_helper', array('type' => 'hidden', 'value' => $this->request->data['User']['active'])); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      					                    <div class="col-md-6">

                                                                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index_new_userlisting',0)); ?>" class="btn btn-danger"><i class="icon-reply"></i>&nbsp;Back to user list</a>

                                                       <div class="separator"></div>
      									</div>
      									<div class="col-md-3" style="float: right;">
      									      <?php echo $this->Form->submit('<i class="icon-save"></i> Save', array('div' => false, 'class' => 'btn btn-success','style' => 'float: right;')); ?>
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					          </div>
      					     </div>
                               <?php echo $this->Form->end(); ?>
                         </div>
                    </div>
            </div>
        </div>
    </div>

    <script>
        $script.ready('bundle', function() {
            <?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
            $(window).load(function(){
            <?php  } ?>
            jQuery(document).ready(function () {
                jQuery("#UserEditNewForm").validate({

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
            <?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
        jQuery(function($){
                jQuery('#UserEditNewForm').submit(function(event){
                    if (!confirm('Are you sure?')) { return false; }else{
                        var form = $( this ).serialize();
                        $.ajax({
                            type: "POST",
                            cache: false,
                            data:form,
                            url: "<?php echo $this->Html->url(array('action' => 'edit_new', $this->request->params['pass']['0'])); ?>",
                            success: function(data) {
                             window.location.href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0)); ?>";
                            }
                        });
                    }
                });
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
                jQuery('#UserEditNewForm').submit(function(event){
                    if (!confirm('Are you sure?')) { return false; }
                });
            });
        ",array('inline'=>false));
    ?>
    </div>
</div>
