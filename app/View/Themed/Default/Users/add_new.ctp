</br>

<?php
$dealer = AuthComponent::user('dealer');
//echo $dealer;
$dealer_id = AuthComponent::user('dealer_id');
//echo $dealer_id;
$zone = AuthComponent::user('zone');
//echo $zone;
$dealer_type = AuthComponent::user('dealer_type');
//echo $dealer_type;
$d_type = AuthComponent::user('d_type');
//echo $dealer_type;


$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
$d_address = AuthComponent::user('d_address');
//echo $d_address;
$d_city = AuthComponent::user('d_city');
//echo $d_city;
$d_state = AuthComponent::user('d_state');
//echo $d_state;
$d_zip = AuthComponent::user('d_zip');
//echo $d_zip;
$d_phone = AuthComponent::user('d_phone');
//echo $d_phone;
$d_email = AuthComponent::user('d_email');
//echo $d_email;
$d_fax = AuthComponent::user('d_fax');
//echo $d_fax;
$d_website = AuthComponent::user('d_website');
//echo $d_website;
$d_web_provider = AuthComponent::user('d_web_provider');
$d_locale = AuthComponent::user('locale');
//echo $d_web_provider;

?>

<br />
<br />
<br />
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="wizard">
                   <div class="widget widget-tabs widget-tabs-responsive">
    					<!-- Widget heading -->
    					<div class="widget-head">
    						<ul>
    							<li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>Add New User</a></li>
    						</ul>
    					</div>
                         <div class="widget-body">
                               <?php echo $this->Form->create('User',array('autocomplete'=>"off",'class' => 'form-inline apply-nolazy')); ?>
                                    <div class="tab-content">
<?php echo $this->Form->input('d_address', array('type' => 'hidden', 'value' => $d_address)); ?>
<?php echo $this->Form->input('d_city', array('type' => 'hidden', 'value' => $d_city)); ?>
<?php echo $this->Form->input('d_state', array('type' => 'hidden', 'value' => $d_state)); ?>
<?php echo $this->Form->input('d_zip', array('type' => 'hidden', 'value' => $d_zip)); ?>
<?php echo $this->Form->input('d_phone', array('type' => 'hidden', 'value' => $d_phone)); ?>
<?php echo $this->Form->input('d_email', array('type' => 'hidden', 'value' => $d_email)); ?>
<?php echo $this->Form->input('d_fax', array('type' => 'hidden', 'value' => $d_fax)); ?>
<?php echo $this->Form->input('d_website', array('type' => 'hidden', 'value' => $d_website)); ?>
<?php echo $this->Form->input('d_web_provider', array('type' => 'hidden', 'value' => $d_web_provider)); ?>
<?php echo $this->Form->input('d_type', array('type' => 'hidden', 'value' => $d_type)); ?>
<?php echo $this->Form->input('locale', array('type' => 'hidden', 'value' => $d_locale)); ?>


<!-- Step 1 -->
      							<div class="tab-pane active" id="tab1-1">
      								<div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('dealer','Dealer:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('dealer',array('type'=>'text','required'=>'required','class'=>'form-control','value'=>$dealer,'readonly'=>'true')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('dealer_id','Dealer ID:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('dealer_id',array('type'=>'text','required'=>'required','class'=>'form-control','value'=>$dealer_id,'readonly'=>'true')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('first_name',array('required'=>'required','class'=>'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('last_name','Last Name:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('last_name',array('required'=>'required','class'=>'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('username','Username:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('username',array('required'=>'required','class'=>'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
                                                   <div class="col-md-3">
      									       <?php echo $this->Form->label('zone','Time Zone:', array('class'=>'strong')); ?>
      									       <?php echo $this->Form->input('zone', array('type' => 'text', 'class' => 'form-control','value'=>$zone,'readonly'=>'true')); ?>
                                                         <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('step_procces','Step Procces:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('step_procces', array('type' => 'text', 'class' => 'form-control','value'=>$step_procces,'readonly'=>'true')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      
   <?php echo $this->Form->label('dealer_type','Dealer Type:', array('class'=>'strong')); ?>
      									       <?php echo $this->Form->input('dealer_type',array('type'=>'text','required'=>'required','class' => 'form-control','value'=>$dealer_type,'readonly'=>'true')); ?>


                                                         <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('group_id','Staff Type:', array('class'=>'strong')); ?>
                                                        <?php echo $this->Form->input('group_id',array('options'=>$grouplist,'class' => 'form-control','style'=>'width: 100%', 'empty' => 'Select')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('password','Email:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('email',array('type'=>'email','required'=>'required','autocomplete'=>false,'class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('password','Password:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('password',array('type'=>'password','required'=>'required','class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <?php echo $this->Form->label('confirm','Confirm Password:', array('class'=>'strong')); ?>
      									      <?php echo $this->Form->input('confirm',array('type'=>'password','required'=>'required','class' => 'form-control')); ?>
      									      <div class="separator"></div>
      									</div>
      					               </div>
                      <div class="row">
      									
      									<div class="col-md-3">
                                               <?php echo $this->Form->input('active',array('label'=>'&nbsp; Activate User','div'=>false,'required'=>'required','class' => 'input-mini')); ?>
      									      <div class="separator"></div>
      									</div>

                        <div class="col-md-3">
                              <?php echo $this->Form->label('login_business_hours','Login only Business hours:', array('class'=>'strong')); ?>
                                                        <?php echo $this->Form->input('login_business_hours'); ?>
                              <div class="separator"></div>
                        </div>


      									<div class="col-md-3">
      									      <div class="separator"></div>
      									</div>
      									<div class="col-md-3">
      									      <div class="separator"></div>
      									</div>
      					               </div>
      					               <div class="row">
      					                    <div class="col-md-6">
      									     <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index_new_userlisting/0')); ?>" class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Back to user list</a>
                                                       <div class="separator"></div>       
      									</div>
                                                        <div class="col-md-2" style="float: right;left: -25px;">
<?php echo $this->Form->submit('<i class="icon-save"></i> Add New User',array( 'div'=>false,'class'=>'btn btn-success')); ?>
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
</div>
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