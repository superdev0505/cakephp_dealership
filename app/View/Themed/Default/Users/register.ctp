
<!-- row-app -->
<div class="row row-app">

    <!-- col -->
    <!-- col-separator.box -->
    <div class="col-separator col-unscrollable box">

        <!-- col-table -->
        <div class="col-table">

            <h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-pencil"></i> Create a new Account</h4>

            <!-- col-table-row -->
            <div class="col-table-row">

                <!-- col-app -->
                <div class="col-app col-unscrollable">

                    <!-- col-app -->
                    <div class="col-app">
                        <div class="login"> <br />
                            <div class="panel panel-default col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
<div align="center"></br>
<img src="http://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" title="Dealership Performance CRM" alt="Dealership Performance CRM" />
</div>
<?php echo $this->Session->flash('flash', array('element' => 'alertnew')); ?>
                                <div class="panel-body">
                                    <?php
                                    //$dealer = AuthComponent::user('dealer');
                                    //echo $dealer;
                                    ?>
                                    <?php
                                    //$dealer_id = AuthComponent::user('dealer_id');
                                    // echo $dealer_id;
                                    //echo $dealerid ;
                                    //print_r($this->request->data);

                                    echo $this->Session->flash('flash', array('element' => 'alert'));
                                    if (isset($dealerid)) { $dealer_id = $dealerid ;
                                    ?>
                                            <?php echo $this->Form->create('User', array('id'=>'validateSubmitForm','action' => 'register', 'role'=>"form",'autocomplete'=>"off",'class'=>'apply-nolazy')); ?>
                                                 <div align="center">
                                             <h5>Your Dealer id #<?php echo $dealer_id; ?>&nbsp;has been approved to register!</h5>
                                                    <p><strong>All fields are required to add yourself as a staff person!</strong></p>							</div>

														<!-- Hidden fields start -->
<?php echo $this->Form->input('group_id', array('type' => 'hidden', 'value' => '3')); ?>
<?php echo $this->Form->input('d_address', array('type' => 'hidden', 'value' => $dealer_info['User']['d_address'])); ?>
<?php echo $this->Form->input('d_city', array('type' => 'hidden', 'value' => $dealer_info['User']['d_city'])); ?>
<?php echo $this->Form->input('d_state', array('type' => 'hidden', 'value' => $dealer_info['User']['d_state'])); ?>
<?php echo $this->Form->input('d_zip', array('type' => 'hidden', 'value' => $dealer_info['User']['d_zip'])); ?>
<?php echo $this->Form->input('d_phone', array('type' => 'hidden', 'value' => $dealer_info['User']['d_phone'])); ?>
<?php echo $this->Form->input('d_email', array('type' => 'hidden', 'value' => $dealer_info['User']['d_email'])); ?>
<?php echo $this->Form->input('d_fax', array('type' => 'hidden', 'value' => $dealer_info['User']['d_fax'])); ?>
<?php echo $this->Form->input('d_website', array('type' => 'hidden', 'value' => $dealer_info['User']['d_website'])); ?>
<?php echo $this->Form->input('d_web_provider', array('type' => 'hidden', 'value' => $dealer_info['User']['d_web_provider'])); ?>
<!-- Hidden fields end -->




													  <div class="form-group">
														<?php echo $this->Form->label('dealer', 'Dealer'); ?>
														<?php echo $this->Form->input('dealer',array('type'=>'text','value' => $dealer, 'readonly' => 'true', 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">

														<?php echo $this->Form->input('dealer_id',array('type'=>'hidden','value' => $dealer_id, 'readonly' => 'true', 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">
														<?php echo $this->Form->label('first_name', 'First Name'); ?>
														<?php echo $this->Form->input('first_name',array('type'=>'text', 'placeholder'=>"Enter First Name", 'div'=>false, 'label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">
														<?php echo $this->Form->label('last_name', 'Last Name'); ?>
														<?php echo $this->Form->input('last_name',array('type'=>'text', 'placeholder'=>"Enter Last Name", 'div'=>false, 'label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">
														<?php echo $this->Form->label('username', 'Username'); ?>
														<?php echo $this->Form->input('username',array('type'=>'text', 'placeholder'=>"Enter Username", 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">

														<?php  echo $this->Form->input('zone', array('type' => 'hidden', 'options' => array(
            'America/Los_Angeles' => 'America/Los_Angeles',
            'America/Phoenix' => 'America/Phoenix',
            'America/Denver' => 'America/Denver',
            'America/Chicago' => 'America/Chicago',
            'America/New_York' => 'America/New_York'
        ), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['zone'], 'class'=>'form-control', 'readonly' => 'true','required' => 'required','div'=>false,'label'=>false));
    ?>
													  </div>


													  <div class="form-group">

														<?php echo $this->Form->input('step_procces', array('type' => 'hidden', 'options' => array(
                                                    'lemco_steps' => 'Lemco 1-9',
                                                    'hd_steps' => 'H-D Steps 1-7'
                                                    ), 'empty' => 'Select', 'selected' => '', 'selected' => $this->request->input['Users']['step_procces'], 'readonly' => 'true', 'class' => 'form-control', 'div'=>false,'label'=>false)); ?>
													  </div>



													  <div class="form-group">
														<?php echo $this->Form->label('quick_code', 'Mobile Quick Code'); ?>
														<?php echo $this->Form->input('quick_code',array('type'=>'text', 'placeholder'=>"Enter Mobile Quick Code", 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>





												<!--	  <div class="form-group">
														<?php echo $this->Form->label('group_id', 'Staff Type'); ?>
														<?php echo $this->Form->input('group_id', array('options' => '3', 'class' => 'form-control', 'empty' => 'Select', 'selected' => '3', 'div'=>false,'label'=>false));?>
													  </div> -->


													  <div class="form-group">
														<?php echo $this->Form->label('password', 'Password'); ?>
														<?php echo $this->Form->input('password',array('type'=>'password', 'placeholder'=>"Enter Password", 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">
														<?php echo $this->Form->label('confirm', 'Confirm Password'); ?>
														<?php echo $this->Form->input('confirm',array('type'=>'password', 'div'=>false,'required' => 'required','label'=>false, 'placeholder'=>"Enter Confirm Password",'class'=>'form-control')); ?>
													  </div>



													  <div class="form-group">
														<?php echo $this->Form->label('email', 'Email'); ?>
														<?php echo $this->Form->input('email',array('type'=>'email', 'placeholder'=>"Enter Email", 'div'=>false,'required' => 'required','label'=>false,'class'=>'form-control')); ?>
													  </div>


													  <div class="form-group">

														<?php echo $this->Form->input('dealer_type', array('type' => 'hidden', 'options' => array(
                                                    'HD' => 'H-D Dealer',
                                                    'Metric' => 'Metric Dealer',
                                                    'RV' => 'RV Dealer',
                                                    'Marine' => 'Marine Dealer',
                                                    'Auto' => 'Auto Dealer',
                                                    'AG' => 'Agriculture Dealer',
                                                    'Wheel/Tire' => 'Tire/Wheel Dealer',
                                                    ), 'empty' => 'Select', 'selected' => '',  'required' => 'required','div'=>false,'label'=>false, 'selected' => $this->request->input['Users']['step_procces'], 'class'=>'form-control', 'readonly' => 'true')); ?>
													  </div>

                                                    <?php echo $this->Form->input('active', array('type' => 'hidden','div'=>false, 'label'=>false,'class'=>'form-control', 'value' => 'true')); ?>

                                                    <div class="form-actions">
                                                        									  		<button type="submit" class="btn btn-primary btn-block">Create Account</button> <br />
                                                     <div align="center">   <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" class="btn btn-inverse btn-block no-ajaxify">Cancel</a> </div> </br><p align="center">&#169; Dealership Performance CRM LLC - All Rights Reserved.</p>
                                                    </div>
                                             <?php echo $this->Form->end(); ?>
                                      <?php } else { ?>
                                             <?php echo $this->Form->create('User', array('action' => 'register', 'role'=>"form",'class'=>'apply-nolazy')); ?>
                                                     <p align="center"><strong>Before register please enter your Dealer id #</strong></p>



													  <div class="form-group">
														<?php echo $this->Form->label('dealer_id', 'Dealer ID'); ?>
 														<?php echo $this->Form->input('dealerid', array('type' => 'text', 'class'=>'form-control','div'=>false,'required' => 'required','label'=>false,)); ?>
													  </div>


                                                       <button type="submit" class="btn btn-primary btn-block">Find My ID</button><br />
													   <div align="center">   <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" class="btn btn-inverse btn-block no-ajaxify">Cancel</a> </div></br><p align="center">&#169; Dealership Performance CRM LLC - All Rights Reserved.</p>


                                             <?php echo $this->Form->end(); ?>
                                      <?php } ?>



                                </div>

                            </div>

                            <div class="clearfix"></div>

                        </div>


                    </div>
                    <!-- // END col-app -->

                </div>
                <!-- // END col-app.col-unscrollable -->

            </div>
            <!-- // END col-table-row -->

        </div>
        <!-- // END col-table -->

    </div>
    <!-- // END col-separator.box -->


</div>
<!-- // END row-app -->
<script>
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

        jQuery("#UserAddNewForm").validate({

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
<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
});
<?php  } ?>
});
</script>



</script>
<style>
label.error{
padding-top:0px;
color:#ff0000;

}
input.error{
padding-top:0px;
border:1px solid #ff0000;

}
</style>
