<style type="text/css">
	.cke_button__superbutton_icon, .cke_button__emailpreview_icon{ display: none;}
	.cke_button__superbutton_label, .cke_button__emailpreview_label{display:  block;}
	.cke_button__superbutton, .cke_button__emailpreview{border: 1px solid #E1E1E1 !important;}
</style>
<style>

input:required, select:required, #ContactModelId, <?php echo ($required_year_make_model == 'On')?  "#ContactCondition,#ContactType,#ContactClass,#ContactMake,#ContactYear,#ContactModelId," : "" ?> <?php echo ($unit_value_price == 'On')?  "#ContactUnitValue," : "" ?>  #ContactNotes, #btn_status_modal, .required_input, #ContactCategory {
 -webkit-transition: text-shadow 1s linear !important;
    -moz-transition: text-shadow 1s linear !important;
    -ms-transition: text-shadow 1s linear !important;
    -o-transition: text-shadow 1s linear !important;
    transition: text-shadow 1s linear  !important;
	border-color: #FF9D81 !important;
    box-shadow: 0px 0px 10px #FFB4B4 !important;
}


@media (min-width: 750px) {
	.largeWidth-min {  width: 750px; }
}

</style>
</br>
<?php
$timezone = AuthComponent::user('zone');
//echo $timezone;
?>
<?php

$country_list = $this->App->getCountryList();
$state_list = $this->App->getStateList();
$state_label = $this->App->getStateLabels();
$dealer_settings = $this->App->getDealerSettings(array('dealer_country','dealer_locale'),AuthComponent::user('dealer_id'));

$dealer_country = $dealer_settings['dealer_country'] ;
$dealer_locale = $dealer_settings['dealer_locale'] ;

if(empty($dealer_country))
$dealer_country ='United States';

if(empty($dealer_locale))
$dealer_locale ='en-us';

if(!empty($this->request->data['Contact']['country']))
$dealer_country =$this->request->data['Contact']['country'];



if( isset($this->request->query['edit_type']) && $this->request->query['edit_type'] == 'gsm'   ){
 	$sperson = $this->request->data['Contact']['sperson'];
}else if( AuthComponent::user('group_id') == '8' || AuthComponent::user('group_id') == '13' ){
	$sperson = $this->request->data['Contact']['sperson'];
}else{
	$sperson = AuthComponent::user('first_name')." ".AuthComponent::user('last_name');
}




//echo $sperson;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeshort = date('mdY');
//echo $datetimeshort;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeslash = date('m/d/Y');
//echo $datetimeslash;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimetext = date('Y-m-d H:i:s');
//echo $datetimetext;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;
?>
<?php
$company = AuthComponent::user('dealer');
// echo $x;
$companyid = AuthComponent::user('dealer_id');
// echo $x;
?>
<!-- get salesperson (user ful name) -->
<?php
//$x = AuthComponent::user('full_name');
// echo $x;
?>


<br />
<br />
<br />
<?php //debug( $this->request->data ); ?>
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head">
						<ul style="width: 98%">
							<li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>Lead Contact Info</a></li>
							<li><a href="#tab2-1" class="glyphicons road" data-toggle="tab"><i></i>Vehicle</a></li>
							<li><a href="#tab3-1" class="glyphicons tag" data-toggle="tab"><i></i>Trade-In</a></li>
							<li><a href="#tab4-1" class="glyphicons notes" data-toggle="tab"><i></i>Notes</a></li>
							<li><a href="#tab5-1" class="glyphicons alarm" data-toggle="tab"><i></i>Appointment</a></li>

							<li><a href="#email-1" class="glyphicons envelope" data-toggle="tab"><i></i>Email</a></li>

							<li class="status"  style="float: right"><a href="#tab6-1" class="glyphicons list" data-toggle="tab"><i></i>History</a></li>

							<?php if(AuthComponent::user('group_id') != '3'){ ?>
							<li class="status" style="float: right"><a href="#tab7-1" class="glyphicons alarm" data-toggle="tab"><i></i>Back-Date</a></li>
							<?php } ?>

						</ul>
					</div>
					<!-- // Widget heading END -->
					<div class="widget-body">
						<?php echo $this->Form->create('Contact', array( 'type' => 'post', 'class' => 'form-inline apply-nolazy', 'role'=>"form")); ?>

						<?php echo $this->Form->input('follow_up_24', array('id'=>'follow_up_24','type' => 'hidden','value' => $follow_up_24)); ?>
						<?php echo $this->Form->input('email_required', array('id'=>'email_required','type' => 'hidden','value' => $email_required)); ?>

						<?php echo $this->Form->input('stock_num_required_sold', array('id'=>'stock_num_required_sold','type' => 'hidden','value' => $stock_num_required_sold)); ?>



						<?php
						if( isset($this->request->query['edit_type']) && $this->request->query['edit_type'] == 'gsm'   ){
						 	echo $this->Form->input('gsm_edit', array('type' => 'hidden','value' => "yes"));
						}else{
							echo $this->Form->input('gsm_edit', array('type' => 'hidden','value' => "no"));
						}
						?>
						<?php echo $this->Form->input('activate_lite_version', array('type' => 'hidden','value' => $activate_lite_version)); ?>



						<?php
							if(isset($this->request->query['ref']) == 'events' ){
								echo $this->Form->input('page_ref', array('type' => 'hidden','value' => 'events'));
							}else{
								echo $this->Form->input('page_ref', array('type' => 'hidden','value' => 'other'));
							}
						?>


						<?php echo $this->Form->input('id'); ?>
						<?php //echo $this->Form->input('sperson', array('type' => 'hidden', 'value' => "$x", 'class' => 'input-small', 'readonly' => 'true')); ?>

						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane active" id="tab1-1">

								<?php if($activate_lite_version == 'Off'){  ?>

								<div class="row">
									<div class="col-md-2 ">
										<input type="hidden"  id="inputTitle" class="col-md-6 form-control" value="123" />
										<font color="red">*</font> <?php echo $this->Form->label('contact_status_id','Lead Type:', array('class'=>'strong')); ?>
										<?php
										echo $this->Form->input('contact_status_id', array('type' => 'select', 'options' => array(
										'12' => 'Mobile Lead',
										'5' => 'Web Lead',
										'6' => 'Phone Lead',
										'7' => 'Showroom',
										), 'empty' => 'Select',  'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<font color="red">*</font> <?php echo $this->Form->label('sales_step','Step:', array('class'=>'strong')); ?>
										<?php
										echo $this->Form->select('sales_step',$sales_step_options , array(
										'empty' => 'Select',
										'required' => 'required',
										'class' => 'form-control' ,'style'=>'width: 100%'
										));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">

										<?php echo $this->Form->hidden('status'); ?>
										<?php echo $this->Form->label('status','<font color="red">*</font>Status:', array('class'=>'strong')); ?></br>

										<a  href="#modal-2" id="btn_status_modal" data-toggle="modal" class="btn btn-default btn-stroke"><i class="fa fa-edit"></i></a>



										<div class="separator"></div>
										<?php echo $this->Form->hidden('multi_vehicle'); ?>
									</div>
									<div class="col-md-2"> <font color="red">*</font> <?php echo $this->Form->label('lead_status','Open/Close:', array('class'=>'strong')); ?>
										<?php
										echo $this->Form->input('lead_status', array(
										'options'=>array('Open' => 'Open','Closed' => 'Closed'),
										'empty' => '',
										'label'=>false,
										'div'=>false,
										'required' => 'required',
										'class' => 'form-control','style'=>'width: 100%'
										));
										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<font color='red'>*</font>
										<?php
										if($source_editable == true){
											echo $this->Form->label('source','Source:', array('class'=>'strong'));
											echo $this->Form->input('source', array('type' => 'select', 'options' => $lead_sources_options, 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['source'], 'class' => 'form-control','style'=>'width: 100%'));
										}else{
											echo $this->Form->label('source','Source:', array('class'=>'strong'));
											echo  "&nbsp;&nbsp;&nbsp;".$this->request->data['Contact']['source'];

											echo $this->Form->hidden('source');
										}

										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-1">
										<?php if($gender_required == 'On'){ ?>
										<font color="red">*</font>
											<?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
											<?php echo $this->Form->input('gender', array( 'options' => array(
											'Male' => 'Male',
											'Female' => 'Female',
											'Not Known' => 'Not Known',
											), 'empty' => 'Select', 'required' => 'required', 'label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%','value'=>'Male'));
											?>

										<?php }else{ ?>
											<?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
											<?php echo $this->Form->input('gender', array( 'options' => array(
											'Male' => 'Male',
											'Female' => 'Female',
											'Not Known' => 'Not Known',
											), 'empty' => 'Select','label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%','value'=>'Male'));
											?>

										<?php } ?>


										<div class="separator"></div>
									</div>
								</div>

								<?php } ?>

								<div class="row">
									<div class="col-md-2"> <font color="red">*</font> <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('first_name', array('type' => 'text','label'=>false,'div'=>false,'required' => 'required', 'class' => 'form-control','maxLength'=>'50')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">

										<?php
	                                  	$required_last_name = false;
	                                  	if($validation_palmer == 1){
	                                  		$required_last_name = 'required';
	                                  	?>
											<font color="red">*</font>
										<?php } ?>


										<?php echo $this->Form->label('last_name','Last Name:'); ?>
										<?php echo $this->Form->input('last_name', array( 'required' => $required_last_name, 'type' => 'text', 'class' => 'form-control','maxLength'=>'50')); ?>
										<div class="separator"></div>
									</div>

                                    <div class="col-md-3">
											<?php echo $this->Form->label('email','Email:', array('class'=>'strong')); ?>
											<?php
											$email_class_name = ($email_required == 'Off')? "form-control" : "form-control required_input";
											echo $this->Form->input('email', array('type' => 'text','label'=>false,'div'=>false,'class' => $email_class_name)); ?>
											<div class="separator"></div>
										</div>

									<div class="col-md-2">

	                                 	<?php
	                                  	$required_mobile = false;
	                                  	if($validation_palmer == 0){
	                                  		$required_mobile = 'required';
	                                  	?>
											<font color="red">*</font>
										<?php } ?>

										<?php echo $this->Form->label('mobile','Cell:'); ?> No Phone? <a id="no_cell_phone" href="javascript:">Click to Auto-fill</a>
										<?php echo $this->Form->input('mobile', array('type' => 'text','required' => $required_mobile ,'class' => 'form-control')); ?>
										<div class="separator bottom"></div>
									</div>




								</div>
                                <div class="row">

                                </div>

                                <?php if($activate_lite_version == 'On'){  ?>
								<div class="row" >
									<div class="col-md-12" align="center">
										<button data-toggle="collapse" data-target="#collapse_additional_inputes" aria-expanded="false"
										 aria-controls="collapse_additional_inputes" type = 'button' class="btn btn-warning btn-xs">Detail Input</button>
										 <div class="separator bottom"></div>
									</div>
								</div>
								<?php } ?>

								<?php if($activate_lite_version == 'On'){  ?>
								<div class="collapse" id="collapse_additional_inputes">
								<?php } ?>


									<?php if($activate_lite_version == 'On'){  ?>

									<div class="row">
										<div class="col-md-2 ">
											<input type="hidden"  id="inputTitle" class="col-md-6 form-control" value="123" />
											<font color="red">*</font> <?php echo $this->Form->label('contact_status_id','Lead Type:', array('class'=>'strong')); ?>
											<?php
											echo $this->Form->input('contact_status_id', array('type' => 'select', 'options' => array(
											'12' => 'Mobile Lead',
											'5' => 'Web Lead',
											'6' => 'Phone Lead',
											'7' => 'Showroom',
											), 'empty' => 'Select',  'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));
											?>
											<div class="separator"></div>
										</div>
										<div class="col-md-2">
											<font color="red">*</font> <?php echo $this->Form->label('sales_step','Step:', array('class'=>'strong')); ?>
											<?php
											echo $this->Form->select('sales_step',$sales_step_options , array(
											'empty' => 'Select',
											'required' => 'required',
											'class' => 'form-control' ,'style'=>'width: 100%'
											));
											?>
											<div class="separator"></div>
										</div>
										<div class="col-md-2">

											<?php echo $this->Form->hidden('status'); ?>
											<?php echo $this->Form->label('status','<font color="red">*</font>Status:', array('class'=>'strong')); ?></br>

											<a  href="#modal-2" id="btn_status_modal" data-toggle="modal" class="btn btn-default btn-stroke"><i class="fa fa-edit"></i></a>



											<div class="separator"></div>
											<?php echo $this->Form->hidden('multi_vehicle'); ?>
										</div>
										<div class="col-md-2"> <font color="red">*</font> <?php echo $this->Form->label('lead_status','Open/Close:', array('class'=>'strong')); ?>
											<?php
											echo $this->Form->input('lead_status', array(
											'options'=>array('Open' => 'Open','Closed' => 'Closed'),
											'empty' => '',
											'label'=>false,
											'div'=>false,
											'required' => 'required',
											'class' => 'form-control','style'=>'width: 100%'
											));
											?>
											<div class="separator"></div>
										</div>

										<div class="col-md-2">
											<font color='red'>*</font>
											<?php
											if($source_editable == true){
												echo $this->Form->label('source','Source:', array('class'=>'strong'));
												echo $this->Form->input('source', array('type' => 'select', 'options' => $lead_sources_options, 'empty' => 'Select', 'selected' => '', 'required' => 'required','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['source'], 'class' => 'form-control','style'=>'width: 100%'));
											}else{
												echo $this->Form->label('source','Source:', array('class'=>'strong'));
												echo  "&nbsp;&nbsp;&nbsp;".$this->request->data['Contact']['source'];

												echo $this->Form->hidden('source');
											}

											?>
											<div class="separator"></div>
										</div>

										<div class="col-md-1">
											<?php if($gender_required == 'On'){ ?>
											<font color="red">*</font>
												<?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
												<?php echo $this->Form->input('gender', array( 'options' => array(
												'Male' => 'Male',
												'Female' => 'Female',
												'Not Known' => 'Not Known',
												), 'empty' => 'Select', 'required' => 'required', 'label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%','value'=>'Male'));
												?>

											<?php }else{ ?>
												<?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
												<?php echo $this->Form->input('gender', array( 'options' => array(
												'Male' => 'Male',
												'Female' => 'Female',
												'Not Known' => 'Not Known',
												), 'empty' => 'Select','label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%','value'=>'Male'));
												?>

											<?php } ?>


											<div class="separator"></div>
										</div>
									</div>

									<?php } ?>

									<div class="row">

										<div class="col-md-2"> <?php echo $this->Form->label('address','Address:', array('class'=>'strong')); ?> <?php echo $this->Form->input('address', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
											<div class="separator"></div>
										</div>
										<div class="col-md-2"> <?php echo $this->Form->label('country','Country:'); ?> <?php echo $this->Form->input('country', array('type' => 'select', 'class' => 'col-md-1 form-control','options' => $country_list,'style' =>'width:100%')); ?>
											<div class="separator"></div>
										</div>

	                                	<div class="col-md-2"> <?php echo $this->Form->label('city','City:'); ?> <?php echo $this->Form->input('city', array('type' => 'text',  'class' => 'col-md-1 form-control')); ?>
											<div class="separator"></div>
										</div>
	                                	<div class="col-md-2 country_change"> <?php echo $this->Form->label('county','County:'); ?> <?php echo $this->Form->input('county', array('type' => 'text', 'class' => 'col-md-1 form-control')); ?>
											<div class="separator"></div>
										</div>
										<div class="col-md-2">

											<?php echo $this->Form->input('us_ca', array('type' => 'hidden','value' => AuthComponent::user('locale'))); ?>

											<?php echo $this->Form->label('state',$state_label[$dealer_country], array('class'=>'strong','id' =>'state_label')); ?>
											<?php /*?><?php if($state_provinces == 'On'){ ?>
											<?php echo $this->Form->label('state','State:', array('class'=>'strong')); ?>
											<?php }else{ ?>
											<a id="opt_us" href="javascript:">US</a> / <a id="opt_ca" href="javascript:">CA</a>
											<?php } ?><?php */?>


											<?php



											echo $this->Form->input('state', array(
											'options' => $state_list, 'empty' => 'Select', 'label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%'));
											?>
											<div class="separator"></div>
										</div>
										<div class="col-md-2"> <?php echo $this->Form->label('zip','Zip:'); ?> <?php echo $this->Form->input('zip', array('type' => 'text', 'class' => 'col-md-1 form-control','pattern'=>'^[0-9]+$')); ?>
											<div class="separator"></div>
										</div>



									</div>
									<div class="row">


										<div class="col-md-2"> <?php echo $this->Form->label('phone','Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
											<div class="separator"></div>
										</div>

										<div class="col-md-2">
											<?php
		                                  	$required_work_number = false;
		                                  	if($validation_palmer == 1){
		                                  		$required_work_number = 'required';
		                                  	?>
												<font color="red">*</font>
											<?php } ?>
											<?php echo $this->Form->label('work_number','Work Number:'); ?>
											<?php echo $this->Form->input('work_number', array( 'required' => $required_work_number, 'type' => 'text','class' => 'form-control')); ?>
											<div class="separator bottom"></div>
										</div>


										<div class="col-md-2"> <!--<font color="red">*</font>--> <?php echo $this->Form->label('best_time','Best Time:', array('class'=>'strong')); ?> <?php echo $this->Form->input('best_time', array('type' => 'select', 'options' => array(
											'Anytime' => 'Anytime',
											'Morning' => 'Morning',
											'Mid Day' => 'Mid Day',
											'Afternoon' => 'Afternoon',
											'Evening' => 'Evening',
											'Not Known' => 'Not Known',
											), 'empty' => 'Select', 'selected' => '', 'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['best_time'], 'class' => 'form-control','style'=>'width: 100%'));
											?>
											<div class="separator"></div>
										</div>
										<div class="col-md-3"> <!--<font color='red'>*</font>--> <?php echo $this->Form->label('buying_time','Buying Time:', array('class'=>'strong')); ?> <?php echo $this->Form->input('buying_time', array('type' => 'select', 'options' => array(
											'now' => 'now',
											'5days' => '5days',
											'10days' => '10days',
											'15days' => '15days',
											'20days' => '20days',
											'30days' => '30days',
											'40days' => '40days',
											'50days' => '50days',
											'60days' => '60days',
											'70days' => '70days',
											'80days' => '80days',
											'90days' => '90days',
											'120days' => '120days',
											'180days' => '180days',
											'6Months' => '6Months',
											'9Months' => '9Months',
											'1year' => '1year',
											'2year' => '2year',
											'Not Known' => 'Not Known',
											), 'empty' => 'Select', 'selected' => '', 'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['buying_time'], 'class' => 'form-control','style'=>'width: 100%'));
											?>
											<div class="separator"></div>
										</div>



										<?php  if($show_second_face == 'On'){ ?>
										<div class="col-md-3">

												<?php  if($required_second_face == 'On'){ ?>
													<?php echo $this->Form->hidden('required_second_face', array('value'=>'On')); ?>
													<font color='red'>*</font>
												<?php }else{ ?>
													<?php echo $this->Form->hidden('required_second_face', array('value'=>'Off')); ?>
												<?php } ?>

												<?php echo $this->Form->label('second_face','Second Face:'); ?>
												<?php	echo $this->Form->input('second_face', array('type' => 'select', 'options' => $emps, 'empty' => 'Select', 'label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%')); ?>

											<div class="separator"></div>

										</div>

											<?php }else{ ?>
												<?php echo $this->Form->hidden('required_second_face', array('value'=>'Off')); ?>
											<?php } ?>

											<?php echo $this->Form->hidden('address_validation', array('value'=>$address_validation)); ?>
											<?php echo $this->Form->hidden('gender_required', array('value'=>$gender_required)); ?>
											<?php echo $this->Form->hidden('validation_palmer', array('value'=>$validation_palmer)); ?>
											<?php echo $this->Form->hidden('required_year_make_model', array('value'=>$required_year_make_model)); ?>
											<?php echo $this->Form->hidden('unit_value_price', array('value'=>$unit_value_price)); ?>


										<div class="col-md-3"> <font color='red'>*</font>
											<?php echo $this->Form->label('sperson','Sales Person:'); ?>
											<?php echo $this->Form->input('sperson',
											 array('type' => 'text','label'=>false,'div'=>false, 'disabled' => 'true',
											 'class' => 'form-control','value'=>$sperson)); ?>


											<div class="separator"></div>
										</div>
									</div>

									<div class='row'>
										<div class="col-md-2">
											<?php echo $this->Form->label('spouse_first_name','Spouse First Name:'); ?>
											<?php echo $this->Form->input('spouse_first_name', array('type' => 'text','class' => 'form-control')); ?>
											<div class="separator bottom"></div>
										</div>

										<div class="col-md-2">
											<?php echo $this->Form->label('spouse_last_name','Spouse Last Name:'); ?>
											<?php echo $this->Form->input('spouse_last_name', array('type' => 'text','class' => 'form-control')); ?>
											<div class="separator bottom"></div>
										</div>

										<div class="col-md-2">
											<?php echo $this->Form->label('dob','Date Of Birth:'); ?>
											<div class="input-group date" >
												<?php echo $this->Form->input('dob', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
												<span class="input-group-addon"><i class="fa fa-th"></i></span>
											</div>
											<div class="separator bottom"></div>
										</div>


										<div class="col-md-3">
											<?php
		                                  	$required_company_work = false;
		                                  	if($validation_palmer == 1){
		                                  		$required_company_work = 'required';
		                                  	?>
												<font color="red">*</font>
											<?php } ?>

											<?php echo $this->Form->label('company_work','Company:'); ?>
											<?php echo $this->Form->input('company_work', array( 'required' => $required_company_work, 'type' => 'text','class' => 'form-control')); ?>
											<div class="separator bottom"></div>
										</div>



										<div class="col-md-3">
											<?php echo $this->Form->label('preferred_language','Preferred Language:'); ?>
											<?php echo $this->Form->input('preferred_language', array('empty'=>'Select', 'type' => 'select', 'options'=>array(
												'English'=>'English','Spanish'=>'Spanish'
											),'class' => 'form-control')); ?>
											<div class="separator bottom"></div>
										</div>

									</div>

								<?php if($activate_lite_version == 'On'){  ?>
								</div>
								<?php } ?>
								<!-- Collapse end -->


								<?php
								$cntadd = 1;
								if($additional_contact == 'On'){ ?>
								<div class='row'>
									<div class="col-md-12">
										<button class="btn btn-success" type="button" id="btn_add_additional_contacts">+ Additional Contact</button>
										<div class="separator bottom"></div>
									</div>
								</div>

								<div id="container_add_contacts">
									<?php
									foreach($additionalContacts as $addCon){ ?>


									<div id="add_cnt_block_<?php echo $cntadd; ?>" class="widget widget-body-white">
										<div class="widget-body">
											<div class="row">
												<div class="col-md-offset-9 col-md-3 text-right">
													<button onclick="remove_additional_contact(<?php echo $addCon['AdditionalContact']['id']; ?>, <?php echo $cntadd; ?>, <?php echo $addCon['AdditionalContact']['contact_id']; ?>)" type="button" class="btn btn-danger btn-xs remove_add_contact_block">
														<i class="fa fa-times"></i>
													</button>
												</div>
											</div>
											<div class="row">
												<div class="col-md-2">
													<?php echo $this->Form->hidden("AdditionalContact.$cntadd.id",  array('value'=> $addCon['AdditionalContact']['id'] )); ?>
													<?php echo $this->Form->label("AdditionalContact.$cntadd.first_name",'First Name:', array('class'=>'strong')); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.first_name", array( 'value'=> $addCon['AdditionalContact']['first_name'], 'type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.last_name",'Last Name:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.last_name", array('value'=> $addCon['AdditionalContact']['last_name'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>

												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.address",'Address:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.address", array('value'=> $addCon['AdditionalContact']['address'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.city",'City:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.city", array('value'=> $addCon['AdditionalContact']['city'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-1">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.state",'State:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.state", array('value'=> $addCon['AdditionalContact']['state'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-1">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.zip",'Zip:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.zip", array('value'=> $addCon['AdditionalContact']['zip'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.mobile",'Mobile:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.mobile", array('value'=> $addCon['AdditionalContact']['mobile'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.phone",'Phone:', array('class'=>'strong')); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.phone", array( 'value'=> $addCon['AdditionalContact']['phone'], 'type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.work_number",'Work Number:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.work_number", array('value'=> $addCon['AdditionalContact']['work_number'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>

												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.email",'Email:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.email", array('value'=> $addCon['AdditionalContact']['email'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.role",'Role:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.role", array('value'=> $addCon['AdditionalContact']['role'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.vehicle",'Vehicle:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.vehicle", array('value'=> $addCon['AdditionalContact']['vehicle'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
												<div class="col-md-2">
													<?php echo $this->Form->label("AdditionalContact.$cntadd.dob",'DOB:'); ?>
													<?php echo $this->Form->input("AdditionalContact.$cntadd.dob", array('value'=> $addCon['AdditionalContact']['dob'], 'type' => 'text', 'class' => 'form-control')); ?>
													<div class="separator"></div>
												</div>
											</div>

										</div>
									</div>


									<?php $cntadd++; } ?>

								</div>


								<?php } ?>











							</div>
							<!-- // Step 1 END -->
							<!-- Step 2 -->
							<div class="tab-pane" id="tab2-1">

								<div class="row">
									<div class="col-md-6">
										<input type="checkbox" id="vehicle_unknown" > <label for="vehicle_unknown" class="text-danger">Vehicle Not known</label>
										<?php

										$inventory_type = '';
										if( isset($vehicle_selection_type_options['In Stock'] ) ){
											$inventory_type = 'In Stock';
										}else if( isset($vehicle_selection_type_options['Branch Inventory'] ) ){
											$inventory_type = 'Branch Inventory';
										}

										if($inventory_type != ''){ ?>
										<button id="btn_search_stock_vin" v_type='main' type="button" class="btn btn-primary btn-sm ">
											<i class="fa fa-search"></i> Instock Search
										</button>
										<?php } ?>
									</div>
									<div class="col-md-6 text-right">

									</div>
								</div>

								<div class="row">
									<div class="col-md-1">
										<div class="separator"></div>
										<div id="vehicle_selection_type_container" >
											<?php
											echo $this->Form->input('vehicle_selection_type',
												array('options' => $vehicle_selection_type_options,
												'type' => 'radio', 'class' => ''));
											?>
										</div>
									</div>
									<div class="col-md-2">
										<font color='red'>*</font>
										<?php

										//debug( $this->request->data['Contact']['type'] );

										echo $this->Form->label('category','Type:'); ?>
										<?php echo $this->Form->input('category', array('type' => 'select', 'options' => $d_type_options, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<div>
											<?php
											if($required_year_make_model == 'On'){ ?>
												<font color='red'>*</font>
											<?php } ?>
											<?php echo $this->Form->label('make','Make:'); ?>
										</div>
										<?php echo $this->Form->input('make', array('type' => 'select', 'required' => false, 'options' => $mk_options, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
										<!-- <button id="btn_make_edit_main" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button> -->
										<div style="text-align: center">
											<a id="addmake_support" class='no-ajaxify' href="/supports/add_make">If you can't find the Make in this list, send request to Support to add Make here.</a>
										</div>

										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php if($required_year_make_model == 'On'){ ?>
											<font color='red'>*</font>
										<?php } ?>

										<?php echo $this->Form->label('year','Year:'); ?><br />
										<?php
										echo $this->Form->input('year', array('type' => 'select', 'required' => false, 'options'=>$year_opt, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
										<button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm btn_year_edit_class"><i class="fa fa-pencil"></i></button>
										<div>Cant find the year? <a href="javascript:" class="btn_year_edit_class">Show all years.</a></div>
										<div class="separator"></div>
									</div>

									<div class="col-md-4">
										<?php if($required_year_make_model == 'On'){ ?>
											<font color='red'>*</font>
										<?php } ?>

										<?php echo $this->Form->label('model_id','Model:'); ?><br />
										<?php
										$display_model_id = ( $this->request->data['Contact']['model_id'] != '')? "inline-block" : 'none';
										echo $this->Form->input('model_id', array('type' => 'select', 'options'=>$model_opt, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id));
										?>

										<?php
										$display_model_txt = ( $this->request->data['Contact']['model_id'] == '')? "inline-block" : 'none';
										echo $this->Form->input('model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt));
										?>

										<button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>

										<div class="separator"></div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-3">
										<?php if($required_year_make_model == 'On'){ ?>
											<font color='red'>*</font>
										<?php } ?>

										<?php echo $this->Form->label('type','Category:');
										//echo $this->request->data['Contact']['type'];
										?>
										<?php echo $this->Form->input('type', array('type' => 'select', 'options'=>$body_type,'required' => false, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
									</div>




									<div class="col-md-3">

										<?php if($required_year_make_model == 'On'){ ?>
											<font color='red'>*</font>
										<?php } ?>

										<?php echo $this->Form->label('class','Class:');

										?>
										<?php echo $this->Form->input('class', array('type' => 'select', 'options'=>$body_sub_type_options, 'required' => false, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
									</div>

									<div class="col-md-2">

										<?php
											if($unit_value_price == 'On'){ ?>
												<font color='red'>*</font>
											<?php } ?>

										<?php echo $this->Form->label('unit_value','Value/Unit:'); ?>
										<?php echo $this->Form->input('unit_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue', 'required' =>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">

										<?php echo $this->Form->label('stock_num','Stock#',array('v_type'=>'main','id'=>'label_stock')); ?> <?php echo $this->Form->input('stock_num', array(
										'type' => 'text',
										'label'=>false,'div'=>false,
										'class' => 'form-control'
										));
										?>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-2">

										<?php if($required_year_make_model == 'On'){ ?>
											<font color='red'>*</font>
										<?php } ?>

										<?php echo $this->Form->label('condition','Condition:'); ?>
										<?php
										echo $this->Form->input('condition', array('type' => 'select', 'required' => false, 'options' => array(
										'Any' => 'Any',
										'New' => 'New',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
										), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2"> <?php echo $this->Form->label('engine','Engine:'); ?> <?php echo $this->Form->input('engine', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2"> <?php echo $this->Form->label('vin','Vin Number #:',array('v_type'=>'main','id'=>'label_vin') ); ?> <?php echo $this->Form->input('vin', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2"> <?php echo $this->Form->label('odometer','Miles:'); ?> <?php echo $this->Form->input('odometer', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2"> <?php echo $this->Form->label('unit_color','Color:'); ?> <?php echo $this->Form->input('unit_color', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

										<div class="col-md-2">
										<?php echo $this->Form->label('branch_location','Branch Location:'); ?>
										<?php echo $this->Form->input('branch_location', array('type' => 'text','class' => 'form-control')); ?>
										<div class="separator bottom"></div>
									</div>






									<div class="col-md-12">

										<button type="button" class='btn btn-primary btn-sm' id="add_new_vehicle">Add</button>
										<br><br>
										<div id="addon_vehicle">




											<!-- Add-on vehicle one start -->
											<div id="addon_one"  style="<?php echo count($addonVehicles) == 0 ? "display: none" : "display: block" ; ?>"   class="widget widget-body-white">
												<div class="widget-head">

													<div class="row">
														<div class="col-md-6">
															&nbsp; &nbsp; Add-On Vehicle 1
														</div>
														<div class="col-md-6 text-right">
															<button id="btn_close_addon1" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
														</div>
													</div>


												</div>
												<div class="widget-body">


													<div class="row">
														<div class="col-md-6">
															&nbsp;
														</div>
														<div class="col-md-6 text-right">
															<?php if($inventory_type != ''){ ?>
															<button id="btn_search_stock_vin_addon1" v_type="addon1" type="button" class="btn btn-primary btn-sm ">
																<i class="fa fa-search"></i> Instock Search
															</button>
															<?php } ?>
														</div>
													</div>


													<div class="row">

														<div class="col-md-1">
															<div class="separator"></div>
															<div id="vehicle_selection_type_container_addon1" >
																<?php
																echo $this->Form->input('vehicle_selection_type_addon1',
																	array('options' => $vehicle_selection_type_options,
																	'type' => 'radio', 'class' => ''));
																?>
															</div>
														</div>

														<div class="col-md-2">
															<font color='red'>*</font>
															<?php echo $this->Form->label('category_addon1','Type:'); ?>
															<?php
															echo $this->Form->input('id_addon1', array('type' => 'hidden'));
															echo $this->Form->input('category_addon1', array('type' => 'select', 'options' => $d_type_options_addon1, 'empty' => 'Select', 'label'=>false,'div'=>false, 'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('make_addon1','Make:'); ?>
															<?php echo $this->Form->input('make_addon1', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options'=>$mk_options_addon1, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>

															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font>
															<?php echo $this->Form->label('year_addon1','Year:'); ?><br />
															<?php echo $this->Form->input('year_addon1', array('options' => $year_addon1_opt, 'type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false,  'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
															<button id="btn_year_edit_addon1" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>

														<div class="col-md-4">
															<font color='red'>*</font>
															<?php echo $this->Form->label('model_id_addon1','Model:'); ?><br />
															<?php
															$display_model_id =  ( $this->request->data['Contact']['model_id_addon1'] != '')? "inline-block" : 'none';
															echo $this->Form->input('model_id_addon1', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'options'=>$model_opt_addon1, 'class' => 'form-control required_input','style'=>'width: 80%; display:'.$display_model_id));
															?>

															<?php
															$display_model_txt = ( $this->request->data['Contact']['model_id_addon1'] == '')? "inline-block" : 'none';
															echo $this->Form->input('model_addon1', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control required_input','style'=>'width: 80%; display: '.$display_model_txt));
															?>
															<button id="btn_models_edit_addon1" type="button" class="btn btn-inverse btn-sm">
																<i class="fa fa-pencil"></i>
															</button>
															<div class="separator"></div>
														</div>

													</div>



													<div class="row">

														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('type_addon1','Category:'); ?>
															<?php echo $this->Form->input('type_addon1', array('type' => 'select', 'required' => 'required',
															'options'=>$body_type_addon1, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>



														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('class_addon1','Class:'); ?>
															<?php echo $this->Form->input('class_addon1', array('type' => 'select',  'required' => 'required', 'empty' => 'Select', 'label' => false, 'options'=>$body_sub_type_options_addon1, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>

														<div class="col-md-2">
															<font color="red">*</font>
															<?php echo $this->Form->label('unit_value_addon1','Value/Unit:'); ?>
															<?php echo $this->Form->input('unit_value_addon1', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue_addon1',  'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('stock_num_addon1','Stock#:', array('v_type'=>'addon1','id'=>'label_stock_addon1')); ?>
															<?php echo $this->Form->input('stock_num_addon1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font>
															<?php echo $this->Form->label('condition_addon1','Condition:'); ?>
															<?php
															echo $this->Form->input('condition_addon1', array('type' => 'select', 'required' => 'required', 'options' => array(
															'Any' => 'Any',
															'New' => 'New',
															'Used' => 'Used',
															'Rental' => 'Rental',
															'Demo' => 'Demo'
															), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
															?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('engine_addon1','Engine:'); ?>
															<?php echo $this->Form->input('engine_addon1', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('vin_addon1','Vin Number #:', array('v_type'=>'addon1', 'id'=>'label_vin_addon1')); ?>
															<?php echo $this->Form->input('vin_addon1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('odometer_addon1','Miles:'); ?>
															<?php echo $this->Form->input('odometer_addon1', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('unit_color_addon1','Color:'); ?>
															<?php echo $this->Form->input('unit_color_addon1', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

															<div class="col-md-2">
															<?php echo $this->Form->label('branch_location_addon1','Branch Location:'); ?>
															<?php echo $this->Form->input('branch_location_addon1', array('type' => 'text','class' => 'form-control')); ?>
															<div class="separator bottom"></div>
														</div>

													</div>

												</div>
											</div>
											<!-- Add-on vehicle one end -->



											<!-- Add-on vehicle two start -->
											<div id="addon_two" style="<?php echo count($addonVehicles) > 1 ? "display: block" : "display: none" ; ?>"  class="widget widget-body-white">
												<div class="widget-head">
													<div class="row">
														<div class="col-md-6">
															&nbsp; &nbsp; Add-On Vehicle 2
														</div>
														<div class="col-md-6 text-right">
															<button id="btn_close_addon2" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
														</div>
													</div>
												</div>
												<div class="widget-body">

													<div class="row">
														<div class="col-md-6">
															&nbsp;
														</div>
														<div class="col-md-6 text-right">
															<?php if($inventory_type != ''){ ?>
															<button id="btn_search_stock_vin_addon2" v_type="addon2" type="button" class="btn btn-primary btn-sm ">
																<i class="fa fa-search"></i> Instock Search
															</button>
															<?php } ?>
														</div>
													</div>

													<div class="row">
														<div class="col-md-1">
															<div class="separator"></div>
															<div id="vehicle_selection_type_container_addon2" >
																<?php
																echo $this->Form->input('vehicle_selection_type_addon2',
																	array('options' => $vehicle_selection_type_options,
																	'type' => 'radio', 'class' => ''));
																?>
															</div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('category_addon2','Type:'); ?>
															<?php
															echo $this->Form->input('id_addon2', array('type' => 'hidden'));
															echo $this->Form->input('category_addon2', array('type' => 'select', 'options' => $d_type_options_addon2, 'empty' => 'Select', 'label'=>false,'div'=>false,  'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));?>
															<div class="separator"></div>
														</div>
														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('make_addon2','Make:'); ?>
															<?php echo $this->Form->input('make_addon2', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options'=>$mk_options_addon2, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>

															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('year_addon2','Year:'); ?><br />
															<?php echo $this->Form->input('year_addon2', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options' => $year_addon2_opt, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
															<button id="btn_year_edit_addon2" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>

														<div class="col-md-4">
															<font color='red'>*</font>
															<?php echo $this->Form->label('model_id_addon2','Model:'); ?><br />
															<?php
															$display_model_id =  ( $this->request->data['Contact']['model_id_addon2'] != '')? "inline-block" : 'none';
															echo $this->Form->input('model_id_addon2', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'options'=>$model_opt_addon2, 'class' => 'form-control required_input','style'=>'width: 80%; display:'.$display_model_id));
															?>

															<?php
															$display_model_txt = ( $this->request->data['Contact']['model_id_addon2'] == '')? "inline-block" : 'none';
															echo $this->Form->input('model_addon2', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control required_input','style'=>'width: 80%; display: '.$display_model_txt));
															?>
															<button id="btn_models_edit_addon2" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>
													</div>



													<div class="row">

														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('type_addon2','Category:'); ?>
															<?php echo $this->Form->input('type_addon2', array('type' => 'select', 'required' => 'required',
															'options'=>$body_type_addon2, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>
														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('class_addon2','Class:'); ?>
															<?php echo $this->Form->input('class_addon2', array('type' => 'select',  'required' => 'required', 'empty' => 'Select', 'label' => false, 'options'=>$body_sub_type_options_addon2, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>
														<div class="col-md-2">
															<font color="red">*</font>
															<?php echo $this->Form->label('unit_value_addon2','Value/Unit:'); ?>
															<?php echo $this->Form->input('unit_value_addon2', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue_addon2',  'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('stock_num_addon2','Stock#:', array('v_type'=>'addon2','id'=>'label_stock_addon2')); ?>
															<?php echo $this->Form->input('stock_num_addon2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('condition_addon2','Condition:'); ?>
															<?php
															echo $this->Form->input('condition_addon2', array('type' => 'select', 'required' => 'required', 'options' => array(
															'Any' => 'Any',
															'New' => 'New',
															'Used' => 'Used',
															'Rental' => 'Rental',
															'Demo' => 'Demo'
															), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
															?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('engine_addon2','Engine:'); ?>
															<?php echo $this->Form->input('engine_addon2', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('vin_addon2','Vin Number #:', array('v_type'=>'addon2','id'=>'label_vin_addon2')); ?>
															<?php echo $this->Form->input('vin_addon2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('odometer_addon2','Miles:'); ?>
															<?php echo $this->Form->input('odometer_addon2', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('unit_color_addon2','Color:'); ?>
															<?php echo $this->Form->input('unit_color_addon2', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

															<div class="col-md-2">
															<?php echo $this->Form->label('branch_location_addon2','Branch Location:'); ?>
															<?php echo $this->Form->input('branch_location_addon2', array('type' => 'text','class' => 'form-control')); ?>
															<div class="separator bottom"></div>
														</div>

													</div>


												</div>
											</div>
											<!-- Add-on vehicle two end -->





										</div>

										<br><br>
									</div>





















								</div>

								<div class="row" id='optional_vehicle_inputs' style='display: none'>
									<div class="col-md-2">
										<?php echo $this->Form->label('price_range','Price Range:'); ?>
										<?php echo $this->Form->input('price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('floor_plans','All Floor Plans:'); ?>
										<?php echo $this->Form->input('floor_plans', array('type' => 'select', 'options'=>$FloorPlansOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('length','Select Length:'); ?>
										<?php echo $this->Form->input('length', array('type' => 'select', 'options'=>$LengthOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('weight','Select Weight:'); ?>
										<?php echo $this->Form->input('weight', array('type' => 'select', 'options'=>$WeightOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('sleeps','Sleeps:'); ?>
										<?php echo $this->Form->input('sleeps', array('type' => 'select', 'options'=>$SleepsOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('fuel_type','All Fuel Types:'); ?>
										<?php echo $this->Form->input('fuel_type', array('type' => 'select', 'options'=>$FuelTypeOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">

									<style>
									.text-green > i:before{
										color: #8BBF61 !important;
									}
									.text-red > i:before{
										color: #CC3A3A !important;
									}
									</style>


										<div id="spec_container">


										<div class="widget widget-tabs widget-tabs-responsive">
											<!-- Tabs Heading -->
											<div class="widget-head">
												<ul>
													<li class="active" ><a class="glyphicons coffe_cup" href="#tab-log" data-toggle="tab"><i></i>Log Mode</a></li>
													<?php if(!empty($specification)){ ?>
													<li><a class="glyphicons check text-green" href="#tab-1" data-toggle="tab"><i></i>Specification</a></li>
													<?php } ?>

													<?php if(!empty($description)){ ?>
													<li><a class="glyphicons check text-green" href="#tab-2" data-toggle="tab"><i></i>Description</a></li>
													<?php } ?>

													<?php  if($this->request->data['Contact']['contact_status_id'] == 5){ ?>
														<li><a class="glyphicons share_alt text-red" href="#tab-weblead" data-toggle="tab"><i></i>Web Selection: <?php  echo $this->request->data['Contact']['web_selection']; ?></a></li>
													<?php  } ?>

													<?php  if($this->request->data['Contact']['import'] == "Y"){ ?>
														<li><a class="glyphicons share_alt text-red" href="#tab-initial" data-toggle="tab"><i></i>Vehicle Initial Section:
																<?php  echo $this->request->data['Contact']['type']; ?> ,
																<?php  echo $this->request->data['Contact']['class']; ?> ,

																<?php  echo $this->request->data['Contact']['condition']; ?> ,

																<?php  echo $this->request->data['Contact']['year']; ?>,
																<?php  echo $this->request->data['Contact']['make']; ?>,
																<?php  echo $this->request->data['Contact']['model']; ?>,

																<?php  echo $this->request->data['Contact']['web_selection']; ?>
															</a>
														</li>
													<?php  } ?>

												</ul>
											</div>
											<!-- // Tabs Heading END -->
											<div class="widget-body">
												<div class="tab-content">

													<!-- Tab content -->
													<div class="tab-pane active animated fadeInUp" id="tab-log">
														<p>
														</p>
													</div>
													<!-- // Tab content END -->
													<?php if(!empty($specification)){ ?>
													<!-- Tab content -->
													<div class="tab-pane  animated fadeInUp" id="tab-1">

														<table class="table table-striped table-responsive swipe-horizontal ">
															<tbody>
															<?php
																foreach($specification as $specs){
															?>
															<tr class="gradeA">
																<td><?php echo $specs->Name; ?></td>
																<td><?php echo $specs->Value ; ?></td>
															</tr>

															<?php
															} ?>
															</tbody>
														</table>
													</div>
													<?php } ?>
													<!-- // Tab content END -->
													<!-- Tab content -->
													<?php if(!empty($description)){ ?>
													<div class="tab-pane animated fadeInUp" id="tab-2">
														<p>
															<?php
																echo $description;
															?>

														</p>
													</div>
													<?php } ?>


													<!-- // Tab content END -->
												</div>
											</div>
										</div>

										</div>


									</div>
								</div>




							</div>
							<!-- // Step 2 END -->
							<!-- Step 3 -->
							<div class="tab-pane" id="tab3-1">
								<div class="row">
									<div class="col-md-1">
										<div class="separator"></div>
										<div id="vehicle_selection_type_container_trade" >
											<?php
											//$vehicle_selection_type = 'In Stock';
											echo $this->Form->input('vehicle_selection_type_trade',
												array('options' => $vehicle_selection_type_options,
												'type' => 'radio', 'class' => ''));
											?>
										</div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('category_trade','(Trade) Type:'); ?>
										<?php echo $this->Form->input('category_trade', array('type' => 'select',
										'options' => $d_type_options_trade, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
										<div class="separator"></div>
									</div>


									<div class="col-md-3">
										<?php echo $this->Form->label('make_trade','(Trade) Make:'); ?><br>
										<?php
										if(empty($mk_options_trade) || ($this->request->data['Contact']['make_trade'] != '' && !in_array( $this->request->data['Contact']['make_trade'] , $mk_options_trade)) ) {
											echo $this->Form->input('make_trade', array('type' => 'text','label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control'));
										}else{
											echo $this->Form->input('make_trade', array('type' => 'select', 'options' => $mk_options_trade, 'empty' => 'Select','label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control'));
										}
										?>
										<button id="btn_make_edit_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<br>
										<a id="addmake_support_trade" class='no-ajaxify' href="/supports/add_make_trade">If you can't find the Make in this list, send request to Support to add Make here.</a>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('year_trade','(Trade) Year:'); ?> <br />
										<?php echo $this->Form->input('year_trade', array('type' => 'select', 'options' => $year_opt_trade, 'empty' => 'Select','label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control')); ?>
										<button id="btn_year_trade_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>



									<div class="col-md-4">
										<?php echo $this->Form->label('model_id_trade','(Trade) Model:'); ?><br />
										<?php
										$display_model_id_trade = ( $this->request->data['Contact']['model_id_trade'] != '' || $this->request->data['Contact']['model_trade'] == '' )? "inline-block" : 'none';
										echo $this->Form->input('model_id_trade', array('type' => 'select', 'options'=>$model_opt_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id_trade));
										?>

										<?php
										$display_model_txt_trade = ( $this->request->data['Contact']['model_id_trade'] == '' && $this->request->data['Contact']['model_trade'] != '')? "inline-block" : 'none';
										echo $this->Form->input('model_trade', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt_trade));
										?>
										<button id="btn_models_edit_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<?php echo $this->Form->label('type_trade','(Trade) Category:'); ?>
										<?php echo $this->Form->input('type_trade', array('type' => 'select', 'options'=>$body_type_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('class_trade','Class:'); ?>
										<?php echo $this->Form->input('class_trade', array('type' => 'select', 'options'=>$body_sub_type_options_trade,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('trade_value','(Trade) Value:'); ?>
										<?php echo $this->Form->input('trade_value', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactTradeValue', 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-2">
										<?php echo $this->Form->label('stock_num_trade','(Trade) Stock#'); ?>
										<?php echo $this->Form->input('stock_num_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-2">
										<?php echo $this->Form->label('condition_trade','(Trade) Condition:'); ?> <?php echo $this->Form->input('condition_trade', array('type' => 'select', 'options' => array(
										'Any' => 'Any',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
										), 'empty' => 'Select', 'label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition_trade'],'style'=>'width: 100%','class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('engine_trade','(Trade)Engine:'); ?>
										<?php echo $this->Form->input('engine_trade', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('vin_trade','(Trade) Vin Number:'); ?>
               &nbsp;&nbsp;
<!--                    <a  onclick="NPAGuideURL();" class="col-md-3 glyphicons circle_ok">NPA Look up</a>-->

<?php
if($this->request->data['Contact']['vin_trade']!=''){
    $dis='inline';

}else{
    $dis='none';
}
?>
										<?php


                                                                                echo $this->Form->input('vin_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>


<?php
if(!empty($npa_settings) && $npa_settings['NpaapiSetting']['active']==1){
?>
<br/>
<span style="display:<?=$dis;?>;color:green;font-weight: bold;cursor:pointer;border-bottom: 1px solid;"  id="npalook" onclick="NPAGuideURL();" > NPA Look-Up <i class="fa fa-search"></i></span>
<?php
}
?>

										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('odometer_trade','(Trade) Miles:', array('id'=>'label_odometer_trade')); ?>
										<?php echo $this->Form->input('odometer_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('usedunit_color','(Trade) Color:'); ?>
										<?php echo $this->Form->input('usedunit_color', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row" id='optional_vehicle_inputs_trade' style='display: none'>
									<div class="col-md-2">
										<?php echo $this->Form->label('trade_price_range','(Trade) Price Range:'); ?>
										<?php echo $this->Form->input('trade_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>


								<?php  if( ($this->request->data['Contact']['import'] == 'Y' OR  $this->request->data['Contact']['contact_status_id'] == 5) && $this->request->data['Contact']['trade_selection'] != '' ){ ?>
								<div class="row">
									<div class="col-md-12">
										<a class="glyphicons share_alt text-red" href="javascript:" ><i></i>Trade Selection: <?php  echo $this->request->data['Contact']['trade_selection']; ?></a>
										<div class="separator"></div>
									</div>
								</div>
								<?php  } ?>







								<div class="col-md-12">

										<button type="button" class='btn btn-primary btn-sm' id="add_new_vehicle_trade">Add</button>
										<br><br>
										<div id="addon_vehicle">




											<!-- Add-on vehicle Trade one start -->
											<div id="addon_one_trade"  style="<?php echo count($addonTradeVehicles) == 0 ? "display: none" : "display: block" ; ?>"   class="widget widget-body-white">
												<div class="widget-head">

													<div class="row">
														<div class="col-md-6">
															&nbsp; &nbsp; Add-On Vehicle 1 Trade
														</div>
														<div class="col-md-6 text-right">
															<button id="btn_close_addon1_trade" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
														</div>
													</div>


												</div>
												<div class="widget-body">
													<div class="row">
														<div class="col-md-1">
															<div class="separator"></div>
															<div id="vehicle_selection_type_container_addon1_trade" >
																<?php
																echo $this->Form->input('vehicle_selection_type_addon1_trade',
																	array('options' => $vehicle_selection_type_options,
																	'type' => 'radio', 'class' => ''));
																?>
															</div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('category_addon1','Type:'); ?>
															<?php
															echo $this->Form->input('id_addon1_trade', array('type' => 'hidden'));
															echo $this->Form->input('category_addon1_trade', array('type' => 'select', 'options' => $d_type_options_addon1_trade, 'empty' => 'Select', 'label'=>false,'div'=>false, 'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));?>
															<div class="separator"></div>
														</div>
														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('make_addon1_trade','Make:'); ?>
															<?php echo $this->Form->input('make_addon1_trade', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options'=>$mk_options_addon1_trade, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>

															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('year_addon1_trade','Year:'); ?><br />
															<?php echo $this->Form->input('year_addon1_trade', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options' => $year_addon1_trade_opt, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
															<button id="btn_year_edit_addon1_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>
														<div class="col-md-4">
															<font color='red'>*</font>
															<?php echo $this->Form->label('model_id_addon1_trade','Model:'); ?><br />
															<?php
															$display_model_id =  ( $this->request->data['Contact']['model_id_addon1_trade'] != '')? "inline-block" : 'none';
															echo $this->Form->input('model_id_addon1_trade', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'options'=>$model_opt_addon1_trade, 'class' => 'form-control required_input','style'=>'width: 80%; display:'.$display_model_id));
															?>

															<?php
															$display_model_txt = ( $this->request->data['Contact']['model_id_addon1_trade'] == '')? "inline-block" : 'none';
															echo $this->Form->input('model_addon1_trade', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control required_input','style'=>'width: 80%; display: '.$display_model_txt));
															?>
															<button id="btn_models_edit_addon1_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>
													</div>



													<div class="row">

														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('type_addon1_trade','Category:'); ?>
															<?php echo $this->Form->input('type_addon1_trade', array('type' => 'select', 'required' => 'required',
															'options'=>$body_type_addon1_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>
														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('class_addon1_trade','Class:'); ?>
															<?php echo $this->Form->input('class_addon1_trade', array('type' => 'select',  'required' => 'required', 'empty' => 'Select', 'label' => false, 'options'=>$body_sub_type_options_addon1_trade, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>

														<div class="col-md-2">
															<font color="red">*</font>
															<?php echo $this->Form->label('unit_value_addon1_trade','Value/Unit:'); ?>
															<?php echo $this->Form->input('unit_value_addon1_trade', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue_addon1_trade',  'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('stock_num_addon1_trade','Stock#:', array('v_type'=>'addon1','id'=>'label_stock_addon1_trade')); ?>
															<?php echo $this->Form->input('stock_num_addon1_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font>
															<?php echo $this->Form->label('condition_addon1_trade','Condition:'); ?>
															<?php
															echo $this->Form->input('condition_addon1_trade', array('type' => 'select', 'required' => 'required', 'options' => array(
															'Any' => 'Any',
															'New' => 'New',
															'Used' => 'Used',
															'Rental' => 'Rental',
															'Demo' => 'Demo'
															), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
															?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('engine_addon1_trade','Engine:'); ?>
															<?php echo $this->Form->input('engine_addon1_trade', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('vin_addon1_trade','Vin Number #:', array('v_type'=>'addon1', 'id'=>'label_vin_addon1_trade')); ?>
															<?php echo $this->Form->input('vin_addon1_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('odometer_addon1_trade','Miles:'); ?>
															<?php echo $this->Form->input('odometer_addon1_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('unit_color_addon1_trade','Color:'); ?>
															<?php echo $this->Form->input('unit_color_addon1_trade', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

															<div class="col-md-2">
															<?php echo $this->Form->label('branch_location_addon1_trade','Branch Location:'); ?>
															<?php echo $this->Form->input('branch_location_addon1_trade', array('type' => 'text','class' => 'form-control')); ?>
															<div class="separator bottom"></div>
														</div>

													</div>

												</div>
											</div>
											<!-- Add-on vehicle Trade one end -->



											<!-- Add-on vehicle Trade two start -->
											<div id="addon_two_trade" style="<?php echo count($addonTradeVehicles) > 1 ? "display: block" : "display: none" ; ?>"  class="widget widget-body-white">
												<div class="widget-head">
													<div class="row">
														<div class="col-md-6">
															&nbsp; &nbsp; Add-On Vehicle 2 Trade
														</div>
														<div class="col-md-6 text-right">
															<button id="btn_close_addon2_trade" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
														</div>
													</div>
												</div>
												<div class="widget-body">

													<div class="row">
														<div class="col-md-1">
															<div class="separator"></div>
															<div id="vehicle_selection_type_container_addon2_trade" >
																<?php
																echo $this->Form->input('vehicle_selection_type_addon2_trade',
																	array('options' => $vehicle_selection_type_options,
																	'type' => 'radio', 'class' => ''));
																?>
															</div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('category_addon2_trade','Type:'); ?>
															<?php
															echo $this->Form->input('id_addon2_trade', array('type' => 'hidden'));
															echo $this->Form->input('category_addon2_trade', array('type' => 'select', 'options' => $d_type_options_addon2_trade, 'empty' => 'Select', 'label'=>false,'div'=>false,  'required' => 'required', 'class' => 'form-control','style'=>'width: 100%'));?>
															<div class="separator"></div>
														</div>
														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('make_addon2_trade','Make:'); ?>
															<?php echo $this->Form->input('make_addon2_trade', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options'=>$mk_options_addon2_trade, 'div' => false, 'class' => 'form-control','style'=>'width: 100%'));  ?>

															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('year_addon2_trade','Year:'); ?><br />
															<?php echo $this->Form->input('year_addon2_trade', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'options' => $year_addon2_trade_opt, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
															<button id="btn_year_edit_addon2_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>

														<div class="col-md-4">
															<font color='red'>*</font>
															<?php echo $this->Form->label('model_id_addon2_trade','Model:'); ?><br />
															<?php
															$display_model_id =  ( $this->request->data['Contact']['model_id_addon2_trade'] != '')? "inline-block" : 'none';
															echo $this->Form->input('model_id_addon2_trade', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'options'=>$model_opt_addon2_trade, 'class' => 'form-control required_input','style'=>'width: 80%; display:'.$display_model_id));
															?>

															<?php
															$display_model_txt = ( $this->request->data['Contact']['model_id_addon2_trade'] == '')? "inline-block" : 'none';
															echo $this->Form->input('model_addon2_trade', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control required_input','style'=>'width: 80%; display: '.$display_model_txt));
															?>
															<button id="btn_models_edit_addon2_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
															<div class="separator"></div>
														</div>
													</div>



													<div class="row">

														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('type_addon2_trade','Category:'); ?>
															<?php echo $this->Form->input('type_addon2_trade', array('type' => 'select', 'required' => 'required',
															'options'=>$body_type_addon2_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>


														<div class="col-md-3">
															<font color='red'>*</font> <?php echo $this->Form->label('class_addon2_trade','Class:'); ?>
															<?php echo $this->Form->input('class_addon2_trade', array('type' => 'select',  'required' => 'required', 'empty' => 'Select', 'label' => false, 'options'=>$body_sub_type_options_addon2_trade, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
														</div>
														<div class="col-md-2">
															<font color="red">*</font>
															<?php echo $this->Form->label('unit_value_addon2_trade','Value/Unit:'); ?>
															<?php echo $this->Form->input('unit_value_addon2_trade', array('type' => 'text','label'=>false,'div'=>false,'id' => 'ContactUnitValue_addon2_trade',  'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('stock_num_addon2_trade','Stock#:', array('v_type'=>'addon2','id'=>'label_stock_addon2_trade')); ?>
															<?php echo $this->Form->input('stock_num_addon2_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<font color='red'>*</font> <?php echo $this->Form->label('condition_addon2_trade','Condition:'); ?>
															<?php
															echo $this->Form->input('condition_addon2_trade', array('type' => 'select', 'required' => 'required', 'options' => array(
															'Any' => 'Any',
															'New' => 'New',
															'Used' => 'Used',
															'Rental' => 'Rental',
															'Demo' => 'Demo'
															), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false,'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control','style'=>'width: 100%'));
															?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('engine_addon2_trade','Engine:'); ?>
															<?php echo $this->Form->input('engine_addon2_trade', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>
														<div class="col-md-2">
															<?php echo $this->Form->label('vin_addon2_trade','Vin Number #:', array('v_type'=>'addon2','id'=>'label_vin_addon2_trade')); ?>
															<?php echo $this->Form->input('vin_addon2_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('odometer_addon2_trade','Miles:'); ?>
															<?php echo $this->Form->input('odometer_addon2_trade', array('type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

														<div class="col-md-2">
															<?php echo $this->Form->label('unit_color_addon2_trade','Color:'); ?>
															<?php echo $this->Form->input('unit_color_addon2_trade', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
															<div class="separator"></div>
														</div>

															<div class="col-md-2">
															<?php echo $this->Form->label('branch_location_addon2_trade','Branch Location:'); ?>
															<?php echo $this->Form->input('branch_location_addon2_trade', array('type' => 'text','class' => 'form-control')); ?>
															<div class="separator bottom"></div>
														</div>

													</div>


												</div>
											</div>
											<!-- Add-on vehicle Trade two end -->





										</div>

										<br><br>
									</div>






							</div>
							<!-- // Step 3 END -->
							<!-- Step 4 -->
							<div class="tab-pane" id="tab4-1">

								<div class="row">
									<div class="col-md-12"> <font color="red">*</font> <?php echo $this->Form->label('notes','Notes:'); ?> <?php echo $this->Form->input('notes', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
								</div>


								<div class="row" id="price_range_non_rv" >
									<div class="col-md-3">
										<?php
										echo $this->Form->label('price_range_non_rv','Price Range:');
										echo $this->Form->input('price_range_non_rv',array('options'=>$PriceRangeNonRvOptions,
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php
										echo $this->Form->label('trade_price_range_non_rv','Trade Price Range:');
										echo $this->Form->input('trade_price_range_non_rv',array('options'=>$PriceRangeNonRvOptions,
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>

								</div>


								<div class="row">
									<?php if($casl_feature == 'On'){  ?>

										<div class="col-md-3">
											<?php
												echo $this->Form->label('contact_casl_status_id','CASL Status:');
												echo $this->Form->input('contact_casl_status_id',array('options'=>$contactCaslStatuse_list,
													'class'=>'form-control',
													'style'=>'width: 100%'
													));
											?>
											<div class="separator"></div>
										</div>

									<?php }else if($dnc_bdc_only == 'Off'){  ?>

									<div class="col-md-3">
										<?php
										echo $this->Form->label('dnc_status','DNC Status:');
										echo $this->Form->input('dnc_status',array('options'=>$DncStatusOptions,
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>
									<?php }  ?>

									<div class="col-md-3">
										<?php
										$est_payment_options = array();
										for($i=0; $i<=19; $i++){
											$st = $i*100;
											$lt = $st+100;
											$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
										}

										echo $this->Form->label('est_payment_search','Payment:');
										echo $this->Form->input('est_payment_search',array('options'=>$est_payment_options,
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php
										echo $this->Form->input('validate_method_of_payment', array('id'=>'validate_method_of_payment','type' => 'hidden','value' => $validate_method_of_payment));
										$method_of_payment_options = array(
											'Cash' => 'Cash',
											'Cheque' => 'Cheque',
											'Credit' => 'Credit',
											'Credit Union' => 'Credit Union',
											'Debit' => 'Debit',
                      'Credit App Received' => 'Credit App Received',
											'Financing' => 'Financing',
											'Other' => 'Other'
										);
										echo $this->Form->label('method_of_payment','Method Of Payment:');
										echo $this->Form->input('method_of_payment',array('options'=>$method_of_payment_options,
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>


								</div>

								<div class="row">
									<div class="col-md-3">
										<?php
										echo $this->Form->label('customer_type','Customer Type:');
										echo $this->Form->input('customer_type',array('options'=>array('Individual'=>'Individual','Business'=>'Business'),
											'class'=>'form-control',
											'style'=>'width: 100%',
											'empty'=>'Select',
											));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<?php
										echo $this->Form->input('location_names', array('id'=>'location_names','type' => 'hidden','value' => $location_names));
										if($location_names == 'On'){
											echo $this->Form->label('your_location','Your Location:');
											echo $this->Form->input('your_location',array('options'=>$your_locations,
												'class'=>'form-control',
												'style'=>'width: 100%',
												'required'=>'required',
												'empty'=>'Select',
											));
										}

										?>
										<div class="separator"></div>
									</div>
								</div>


							</div>
							<!-- Step End 4 -->
							<div class="tab-pane" id="tab5-1">
								<div class="row">
									<div class="col-md-12">
										<!-- Widget -->
										<div class="widget widget-body-gray">
											<!-- Widget Heading -->
											<div class="widget-head">
												<h4 class="heading glyphicons calendar"><i></i>
												 <?php
													if(isset($this->request->data['Event']['id'])){
														echo "Edit";
													}else{
														echo "Set";
													}
												?>
												 Appointment
												 </h4>
												 <div <?php if(isset($this->request->data['Event']['id'])){ echo "style='display: none'" ; }   ?> >
												 &nbsp; <?php  echo $this->Form->input('create_new_event', array('type'=>'checkbox'));   ?>
												 </div>

											</div>
											<!-- // Widget Heading END -->
											<div class="widget-body innerAll inner-2x">

												<div class="row" id='appointment_form_container' <?php if(!isset($this->request->data['Event']['id'])){ echo "style='display: none'" ; }   ?>  >
													<div class="col-md-6">
														<?php
														if(isset($this->request->data['Event']['id'])){
															echo $this->Form->input('Event.id');
														?>
														<input type="hidden" value="<?php echo date("m/d/Y g:i A",strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time'])); ?>"  id="event_starttime_display" />
														<input type="hidden" value="<?php echo date("m/d/Y g:i A",strtotime($this->request->data['Event']['end_date']." ".$this->request->data['Event']['end_time'])); ?>"  id="event_endtime_display" />

														<?php
														}
														?>

														<font color="red" >*</font>
														<?php  echo $this->Form->input('Event.event_type_id', array('label'=>'Event Type:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 100%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => false, 'options' => $eventTypes));   ?>
														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->input('Event.status', array('label'=>'Event Status - To "close" the Event select "Completed" to clear from calendar:&nbsp;','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 100%','empty' => 'Please Select', 'class' => 'form-control', 'required' => false, 'options' => array(
														'Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
														'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed' , 'Canceled'=>'Canceled')));	?>
														<div class="separator bottom"></div>

														<?php echo $this->Form->hidden('Event.title'); ?>
														<div class="separator bottom"></div>
													</div>
													<div class="col-md-6">


														<font color="red" >*</font>
														<?php echo $this->Form->label('Event.start_date','Day of Appointment:&nbsp;'); ?>
														<div class="input-group date" >
															<?php echo $this->Form->input('Event.start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
															<span class="input-group-addon"><i class="fa fa-th"></i></span>
															<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
																<?php echo $this->Form->input('Event.start_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
																<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
															</div>
														</div>
														<?php echo $this->Form->error('Event.start'); ?>

														<div class="separator bottom"></div>

														<div style='display: none'>
															<font color="red" >*</font>
															<?php echo $this->Form->label('Event.start','Event End-Date / Time:&nbsp;'); ?>
															<div class="input-group date">
																<?php echo $this->Form->input('Event.end_date', array('value'=>'2014-08-15','style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
																<span class="input-group-addon"><i class="fa fa-th"></i></span>

																<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
																	<?php echo $this->Form->input('Event.end_time', array('value'=>'10:15 AM','label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control','required' => false)); ?>
																	<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
																</div>
															</div>
															<?php echo $this->Form->error('Event.end',null, array('class'=>'has-error help-block')); ?>
														</div>


														<div class="separator bottom"></div>

														<font color="red" >*</font>
														<?php echo $this->Form->input('Event.details', array('label'=>'Events Notes:&nbsp;','div'=>false ,'type' => 'textarea', 'class' => 'form-control', 'required' => false)); ?>



													</div>
												</div>

											</div>
										</div>
										<!-- // Widget END -->
									</div>
								</div>
							</div>




							<div class="tab-pane" id="email-1">
								<div class='row'>
									<div class="col-md-2">
										<?php  echo $this->Form->input('UserEmail.send_email', array('type'=>'checkbox'));   ?>
										<?php  echo $this->Form->label('UserEmail.send_email', 'Send Email');   ?> <br>
										<?php  echo $this->Form->input('UserEmail.send_calendar_invite', array('type'=>'checkbox'));   ?>
										<?php  echo $this->Form->label('UserEmail.send_calendar_invite', 'Send Calendar Invite');   ?>
										<div class="separator bottom"></div>
									</div>


									<?php if(empty($smtp_settings) ||  $email_settings == 'Off'   ){	 ?>
									<div class="col-md-12" >
										<i style="color: #8bbf61;" class="fa fa-fw fa-check "></i>
												 <strong>OK TO SUBMIT LEAD - PLEASE NOTE  - NO EMAIL WILL BE SENT.</strong>  <br><br>
									</div>
									<?php } ?>

									<?php if(empty($smtp_settings) ){	 ?>
											<div class="col-md-12" >
												<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
												Please configure your SMTP from email settings page.
												<div class="separator bottom"></div>
											</div>

									<?php } ?>

									<?php
									if($email_settings == 'Off'){	 ?>
											<div class="col-md-12" >
												<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
												Email feature is off
												<div class="separator bottom"></div>
											</div>

									<?php } ?>


									<div class="col-md-5 email_container" style='display: none'>
										<?php echo $this->Form->text('UserEmail.subject', array('placeholder'=>'Subject', 'class'=>"form-control")); ?>
										<div class="separator bottom"></div>
									</div>

									<div class="col-md-4 email_container" style='display: none'>
										<?php echo $this->Form->select('UserEmail.template_id', $userTemplates ,array('empty'=>'Template','class'=>"form-control",'style'=>"width: 100%"));	?>
										<?php echo $this->Form->hidden('UserEmail.template_id');	?>
									</div>


								</div>

								<div  class='email_container' style='display: none'>

									<div class='row'>
										<div class="col-md-9">
											<?php
											echo $this->Form->textarea('UserEmail.message', array('id'=>'TemplateTemplateHtml','class'=>"notebook border-none form-control padding-none", 'rows'=>"10", 'placeholder'=>"Write your content here...")); ?>
											<div class="clearfix"></div>
											<div class="separator bottom"></div>
										</div>

										<div class="col-md-3">
											<div class="panel-heading bg-primary"><h4>User Inputs</h4></div>






						<div class="relativeWrap">
							<div class="widget widget-tabs widget-tabs-responsive">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons group" href="#tab-1-userinput" data-toggle="tab"><i></i>Lead</a></li>
										<li class=""><a class="glyphicons group" href="#tab-2-userinput" data-toggle="tab"><i></i>Dealer</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->

								<div class="widget-body">
									<div class="tab-content">

										<!-- Tab content -->
										<div class="tab-pane animated fadeInUp active" id="tab-1-userinput">


	<div class="" style="font-size: 12px; line-height: 23px;" >
	Sales Person: <a href="javascript:" field-name="{sperson}" class="template-field"><span class="label label-success label-stroke">{sperson}</span></a><br />
	First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
		Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
		Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />
		Type: <a href="javascript:" field-name="{type}" class="template-field"><span class="label label-success label-stroke">{type}</span></a><br />
		Condition: <a href="javascript:" field-name="{condition}" class="template-field"><span class="label label-success label-stroke">{condition}</span></a><br />
		Year: <a href="javascript:" field-name="{year}" class="template-field"><span class="label label-success label-stroke">{year}</span></a><br />
		Make: <a href="javascript:" field-name="{make}" class="template-field"><span class="label label-success label-stroke">{make}</span></a><br />
		Model: <a href="javascript:" field-name="{model}" class="template-field"><span class="label label-success label-stroke">{model}</span></a><br />
        Stock #: <a href="javascript:" field-name="{stock_num}" class="template-field"><span class="label label-success label-stroke">{stock_num}</span></a><br />

	<!--	Modified Full Date: <a href="javascript:" field-name="{modified_full_date}" class="template-field"><span class="label label-success label-stroke">{modified_full_date}</span></a><br />
		Modified: <a href="javascript:" field-name="{modified}" class="template-field"><span class="label label-success label-stroke">{modified}</span></a><br /> -->

		Mobile: <a href="javascript:" field-name="{mobile}" class="template-field"><span class="label label-success label-stroke">{mobile}</span></a><br />
		Address: <a href="javascript:" field-name="{address}" class="template-field"><span class="label label-success label-stroke">{address}</span></a><br />
		City: <a href="javascript:" field-name="{city}" class="template-field"><span class="label label-success label-stroke">{city}</span></a><br />
		State: <a href="javascript:" field-name="{state}" class="template-field"><span class="label label-success label-stroke">{state}</span></a><br />

		Today: <a href="javascript:" field-name="{today}" class="template-field"><span class="label label-success label-stroke">{today}</span></a><br />
		Zip: <a href="javascript:" field-name="{zip}" class="template-field"><span class="label label-success label-stroke">{zip}</span></a><br />


	</div>



										</div>
										<!-- // Tab content END -->

										<!-- Tab content -->
										<div class="tab-pane animated fadeInUp" id="tab-2-userinput">

					<div class="" style="font-size: 12px; line-height: 23px;" >
						First Name: <a href="javascript:" field-name="{dealer_name}" class="template-field"><span class="label label-success label-stroke">{dealer_name}</span></a><br />
						Email: <a href="javascript:" field-name="{dealer_email}" class="template-field"><span class="label label-success label-stroke">{dealer_email}</span></a><br />
						Phone: <a href="javascript:" field-name="{dealer_phone}" class="template-field"><span class="label label-success label-stroke">{dealer_phone}</span></a><br />
						Fax: <a href="javascript:" field-name="{dealer_fax}" class="template-field"><span class="label label-success label-stroke">{dealer_fax}</span></a><br />
						Address: <a href="javascript:" field-name="{dealer_address}" class="template-field"><span class="label label-success label-stroke">{dealer_address}</span></a><br />
						City: <a href="javascript:" field-name="{dealer_city}" class="template-field"><span class="label label-success label-stroke">{dealer_city}</span></a><br />
						State: <a href="javascript:" field-name="{dealer_state}" class="template-field"><span class="label label-success label-stroke">{dealer_state}</span></a><br />
						Zip: <a href="javascript:" field-name="{dealer_zip}" class="template-field"><span class="label label-success label-stroke">{dealer_zip}</span></a><br />
						Website: <a href="javascript:" field-name="{dealer_website}" class="template-field"><span class="label label-success label-stroke">{dealer_website}</span></a><br />
					</div>

										</div>
										<!-- // Tab content END -->

									</div>
								</div>
							</div>
						</div>























										</div>
									</div>

								</div>

							</div>











							<?php if(AuthComponent::user('group_id') != '3'){ ?>

							<div class="tab-pane" id="tab7-1">
								<div class="row">
									<div class="col-md-6">
										<font color="red" >*</font>
										<?php echo $this->Form->label('created_date','Created:&nbsp;'); ?>
										<div class="input-group date" >
											<?php echo $this->Form->input('created_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
											<span class="input-group-addon"><i class="fa fa-th"></i></span>
											<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
												<?php echo $this->Form->input('created_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
												<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
											</div>
										</div>
										<?php echo $this->Form->error('Event.start'); ?>
										<div class="separator bottom"></div>
									</div>
								</div>
							</div>
							<?php } ?>


							<div class="tab-pane" id="tab6-1">
								<div class="row">
									<div class="col-md-12">
										<div style="max-height: 280px; overflow: auto;">
											<!-- Table -->
											<table class="table table-striped table-responsive swipe-horizontal ">
												<!-- Table heading -->
												<thead>
													<tr>
														<th>History Type</th>
														<th>Sperson</th>
														<th>Step</th>
														<th>Status</th>
														<th>Vechicle</th>
														<th>Notes</th>
														<th>Date</th>
													</tr>
												</thead>
												<!-- // Table heading END -->
												<!-- Table body -->
												<tbody>
													<!-- Table row -->
													<?php if(!empty($history)){  foreach ($history as $entry) { ?>
													<tr class="gradeA">
														<td><?php echo $entry['History']['h_type']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['sperson']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['sales_step']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
														<td><?php echo $entry['History']['year']; ?>, <?php echo $entry['History']['make']; ?>, <?php echo $entry['History']['model']; ?>, <?php echo $entry['History']['type']; ?></td>
														<td><?php
															//echo $entry['History']['comment'];
															echo $this->Text->truncate( strip_tags($entry['History']['comment']),200,array('html'=>true,
																'ellipsis'=>'<br><a href="javascript:" class="read_more_history_note_details" history_id = "'.$entry['History']['id'].'" >Read more</a>'));
														?>&nbsp;</td>
														<td><?php echo ($entry['History']['created']!='')?  $this->Time->format('n/j/Y g:i A', $entry['History']['created'])   : "" ?>&nbsp;</td>
													</tr>
													<?php }}else{	?>
													<tr class="gradeA">
														<td><b>Initial Comment</b></td>
														<td> <?php echo $this->Form->data['Contact']['sperson']; ?> </td>
														<td> <?php echo $this->Form->data['Contact']['sales_step']; ?> </td>
														<td> <?php echo $this->Form->data['Contact']['status']; ?>; </td>
														<td>
															<?php echo $this->Form->data['Contact']['year']; ?>,
															<?php echo $this->Form->data['Contact']['make']; ?>,
															<?php echo $this->Form->data['Contact']['model']; ?>

														 </td>
														<td> <?php
														//echo $this->Form->data['Contact']['notes'];
														echo $this->Text->truncate( strip_tags($this->Form->data['Contact']['notes']),200, array('html'=>true,
															'ellipsis'=>'<br><a href="javascript:" class="read_more_history_note_details" history_id = "'.$entry['History']['id'].'" >Read more</a>'));
														?> </td>
														<td> <?php echo ($this->Form->data['Contact']['modified']!='')?  $this->Time->format('n/j/Y g:i A', $this->Form->data['Contact']['modified'])   : "" ?> </td>
													</tr>

													<?php }	?>
													<!-- // Table row END -->
												</tbody>
												<!-- // Table body END -->
											</table>
											<!-- // Table END -->
										</div>
										<div class="separator bottom"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<?php
		$selected_lead_type = "";
		if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
			$selected_lead_type = $this->request->params['named']['selected_lead_type'];
		}
		?>
								<?php
								/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
								if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
								?>
								<button type="button" id="close_child_modal_dialog" class="close btn-imp" data-dismiss="modal" style="float:left;">Cancel</button>

								<?php
								}else{
								?>

									<a href="<?php echo $this->Html->url(array('action'=>'leads_main', $selected_lead_type )); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
								<?php
								}
								?>
								<button type="submit" class="btn btn-success no-ajaxify hide" id="btn-submit-lead"><i class="fa fa-save"></i> Save Log</button>
							</div>
							<div class=" col-md-6">
								<div class="pagination pull-right margin-none" >
									<!-- Time Date modified -->
									<?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => $datetimetext)); ?>
									<?php echo $this->Form->input('modified_full_date', array('type' => 'hidden', 'value' => "$datetimefullview")); ?>
									<?php echo $this->Form->input('modified_date_short', array('type' => 'hidden', 'value' => "$datetimeshort")); ?>
									<?php echo $this->Form->input('modified_date_short_slash', array('type' => 'hidden', 'value' => "$datetimeslash")); ?>
									<?php
									echo $this->Form->input('created_full_date', array(
									'type' => 'hidden',
									'value' => "$datetimefullview",
									'label'=>false,'div'=>false,
									'class' => 'form-control','style'=>'width: 100%'
									));
									?>

									<!-- Time Date modified End -->
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
										<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
                                        <li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>

										<li class="next finish primary" style="display:none;">
											<button id="btn_finish" class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
										</li>
									</ul>
									<!-- // Wizard pagination controls END -->
								</div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?> </div>
				</div>
			</div>
		</div>

	</div>
	<!-- // row END -->
</div>


<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog" style="width: 850px;">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">


					<?php
					$cnt = 1;
					foreach($lead_status_options as $key=>$value){ ?>

				 	<?php if($cnt == 1 ||  $cnt > 7){  ?>
				 	<div class="row">
					<?php }  ?>

						<div style="" class="col-md-<?php if($cnt == 1 || $cnt == 2) echo "12"; else if($cnt <= 3) echo "4"; else if($cnt == 6 || $cnt == 7) echo "6"; else echo  "12"; ?>" id="<?php echo str_replace(array(" ", "(",")","'"),"-",$key); ?>" >

							<strong><u> <?php echo $key; ?></u></strong>
							<div style="margin-top: 4px;"></div>
							<?php foreach($value as $v){

								if($v == 'Duplicate-Closed'){
									continue;
								}

								?>
								<div class="checkbox" style="display: inline-block; margin-top: 0;">
									<label class="checkbox-custom status-done" <?php echo (isset($history_status[$v]))? 'style="color: #CCCCCC;" ' : '' ?> >
										<input type="checkbox" <?php echo (isset($history_status[$v]))? 'disabled="disabled"' : '' ?>   class="chk_lead_status <?php echo (isset($history_status[$v]))? 'status_done' : '' ?>" name="checkbox_status" value="<?php echo $v; ?>" >
										<i class="fa fa-fw fa-square-o"></i> <?php echo $v; ?> <?php echo (isset($history_status[$v]))? $history_status[$v] : "" ?>
									</label>
								</div>
							<?php } ?>
							<div style="margin: 5px 0"><hr /></div>
						</div>


					<?php if($cnt >= 7){  ?>
					</div>
					<?php }  ?>

					<?php if($cnt == 1){  ?>
					<div class="separator bottom clearfix"></div>
					<?php }  ?>


					<?php
					$cnt++;  } ?>




			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-primary" data-dismiss="modal">Ok</a>
			</div>
		</div>
	</div>

</div>
<!-- // Modal END -->

<?php echo $this->element( 's3_files_button' ); ?>


<script>


function remove_block(block_id){
	$("#add_cnt_block_"+block_id).remove();
};

function remove_additional_contact(addid, blockid, contactid){

	if(confirm("Do you want to remove this additional contact?")){

		$.ajax({
			type: "POST",
			url: "/contacts_manage/remove_additional_contact",
			data: {'addid': addid, 'contactid' : contactid},
			success: function(data){

			}
		});
		$("#add_cnt_block_"+blockid).remove();

	}



}

function ShowEmailPreview(){

	$.ajax({
		type: "POST",
		url: "/user_emails/email_preview_contact",
		data: {'contact_data': $("#ContactLeadsInputEditForm").serialize(),'message':CKEDITOR.instances["TemplateTemplateHtml"].getData()},
		success: function(data){

			bootbox.dialog({
				message: data,
				backdrop: true,
				title: "Email Preview",
			}).find("div.modal-dialog").addClass("largeWidth");
		}
	});

}

function set_stat_opt(type){

	var provinces = ["Ontario", "Quebec", "Nova Scotia","New Brunswick","Manitoba","British Columbia","Prince Edward Island",
	"Saskatchewan","Alberta","Newfoundland and Labrador"];

	var states = ["AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","GU","HI","ID","IL","IN","IA","KS","KY","LA","ME",
	"MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT",
	"VA","WA","WV","WI","WY","AS","DC","PR","VI"];

	if(type == 'US'){
		$("#ContactUsCa").val('US');
		$("#ContactState").html('<option value="">Select State</option>');
		$.each(states, function(i, item) {
			$("#ContactState").append('<option value="'+item+'">'+item+'</option>');
		});
	} else if(type == 'CA'){
		$("#ContactUsCa").val('CA');
		$("#ContactState").html('<option value="">Select Province</option>');
		$.each(provinces, function(i, item) {
			$("#ContactState").append('<option value="'+item+'">'+item+'</option>');
		});

	}



}



<!--
var currentStatus="<?php echo $this->data['Contact']['status']; ?>";
$script.ready('bundle', function() {

	function set_options_step(opt_ar, element){
		$(element).html('<option value="">Select</option>');
		$.each(opt_ar, function(i, item) {
			$(element).append('<option value="'+item.stepid+'">'+item.stepname+'</option>');
		});
	}

	$state_label = <?php echo json_encode($state_label); ?>;
	$('#ContactState optgroup').hide();
	$('#ContactState optgroup[label="<?php echo $dealer_country; ?>"]').show();
	<?php if($dealer_country != 'United States'){?>
		$(".country_change").hide();
	<?php } ?>

	$("#ContactCountry").on('change',function(){
			$country_val = $(this).val();
			if($country_val == 'United States')
			$(".country_change").show();
			else
			$(".country_change").hide();

			$('#ContactState').val('');
			$('#ContactState optgroup').hide();
			$('#ContactState optgroup[label="'+$country_val+'"]').show();
			$("#state_label").text($state_label[$country_val]);

		});



	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

		$(".read_more_history_note_details").click(function(event){
			event.preventDefault();

			$.ajax({
				type: "GET",
				cache: false,
				url: "/contacts_manage/history_comment",
				data: {'history_id':$(this).attr('history_id')},
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "History Notes",
					});
				}
			});

		});

		var activeTab = $('[href=' + location.hash + ']');
		activeTab && activeTab.tab('show');

		$("#ContactDob").bdatepicker({
			format: 'yyyy-mm-dd',
		//	startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			 $(this).bdatepicker('hide');
		});

		$("#opt_us").click(function(){
			set_stat_opt("US");
		});

		$("#opt_ca").click(function(){
			set_stat_opt("CA");
		});

		<?php if($state_provinces == 'Off'){ ?>
		var us_ca = $("#ContactUsCa").val();
		if(us_ca == 'CA'){
			set_stat_opt("CA");
			$("#ContactState").val("<?php echo $this->request->data['Contact']['state']; ?>");
		}

		<?php } ?>


		var iCnt = <?php echo $cntadd; ?>;

		// additional vehicle start
		$("#btn_add_additional_contacts").click(function(){
			iCnt++;
			var addon_block_text = "";
			addon_block_text += '<div id="add_cnt_block_'+iCnt+'" class="widget widget-body-white"> ';
				addon_block_text += '<div class="widget-body">' ;

					addon_block_text += '<div class="row">' ;
						addon_block_text += '<div class="col-md-offset-9 col-md-3 text-right">' ;
							addon_block_text += '<button onclick = remove_block('+iCnt+') style="" type="button" class="btn btn-danger btn-xs">' ;
								addon_block_text += '<i class="fa fa-times"></i>' ;
							addon_block_text += '</button>' ;
						addon_block_text += '</div>	' ;
					addon_block_text += '</div>' ;

					addon_block_text += '<div class="row">' ;

						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">First Name:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][first_name]"  class="form-control" type="text" id="">';
						addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;

						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Last Name:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][last_name]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Address:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][address]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;

						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">City:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][city]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-1">' ;
							addon_block_text += '<label for="">State:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][state]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-1">' ;
							addon_block_text += '<label for="">Zip:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][zip]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Mobile:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][mobile]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;

					addon_block_text += '</div>' ;



					addon_block_text += '<div class="row">' ;

						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Phone:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][phone]"  class="form-control" type="text" id="">';
						addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;

						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Work Number:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][work_number]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Email:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][email]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Role:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][role]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">Vehicle:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][vehicle]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;


						addon_block_text += '<div class="col-md-2">' ;
							addon_block_text += '<label for="">DOB:</label> ' ;
							addon_block_text += '<input name="data[AdditionalContact]['+iCnt+'][dob]" class="form-control" type="text" id="">' ;
								addon_block_text += '<div class="separator"></div>' ;
						addon_block_text += '</div>' ;

					addon_block_text += '</div>' ;







				addon_block_text += '</div>' ;
			addon_block_text += '</div>';

			$("#container_add_contacts").append(addon_block_text);
		});

		//additional vehicle ends



		//addon vehicle start
		$("#add_new_vehicle").click(function(){
			//console.log(  $('#btn_close_addon1').is(':visible')  );
			if( $('#addon_one').is(':visible') == false && $('#addon_two').is(':visible') == false ){
				$('#addon_one').show();
			}else if( $('#addon_one').is(':visible') == true && $('#addon_two').is(':visible') == false ){
				$('#addon_two').show();
			}else if( $('#addon_one').is(':visible') == false && $('#addon_two').is(':visible') == true ){
				$('#addon_one').show();
			}
		});

		$('#btn_close_addon1').click(function(){
			$("#addon_one").hide();
			$("#ContactIdAddon1, #ContactCategoryAddon1, #ContactTypeAddon1, #ContactYearAddon1, #ContactMakeAddon1, #ContactModelIdAddon1, #ContactModelAddon1, #ContactConditionAddon1, #ContactClassAddon1, #ContactVinAddon1, #ContactStockNumAddon1").val("");

			$("#label_vin_addon1, #label_stock_addon1").css('color',"#525252");
			$("#label_vin_addon1, #label_stock_addon1").css('cursor',"default");
			$("#label_vin_addon1, #label_stock_addon1").css('text-decoration',"none");

		});

		$('#btn_close_addon2').click(function(){
			$("#addon_two").hide();
			$("#ContactIdAddon2, #ContactCategoryAddon2, #ContactTypeAddon2, #ContactYearAddon2, #ContactMakeAddon2, #ContactModelIdAddon2, #ContactModelAddon2, #ContactConditionAddon2, #ContactClassAddon2, #ContactVinAddon2, #ContactStockNumAddon2").val("");

			$("#label_vin_addon2, #label_stock_addon2").css('color',"#525252");
			$("#label_vin_addon2, #label_stock_addon2").css('cursor',"default");
			$("#label_vin_addon2, #label_stock_addon2").css('text-decoration',"none");
		});
		//addon vehicle ends


		//Addon vehicle trade start
		$("#add_new_vehicle_trade").click(function(){

			if( $('#addon_one_trade').is(':visible') == false && $('#addon_two_trade').is(':visible') == false ){
				$('#addon_one_trade').show();
			}else if( $('#addon_one_trade').is(':visible') == true && $('#addon_two_trade').is(':visible') == false ){
				$('#addon_two_trade').show();
			}else if( $('#addon_one_trade').is(':visible') == false && $('#addon_two_trade').is(':visible') == true ){
				$('#addon_one_trade').show();
			}
		});

		$('#btn_close_addon1_trade').click(function(){
			$("#addon_one_trade").hide();
			$("#ContactIdAddon1Trade,#ContactCategoryAddon1Trade, #ContactTypeAddon1Trade, #ContactYearAddon1Trade, #ContactMakeAddon1Trade, #ContactModelIdAddon1Trade, #ContactModelAddon1Trade, #ContactConditionAddon1Trade, #ContactClassAddon1Trade, #ContactVinAddon1Trade, #ContactStockNumAddon1Trade").val("");

			$("#label_vin_addon1_trade, #label_stock_addon1_trade").css('color',"#525252");
			$("#label_vin_addon1_trade, #label_stock_addon1_trade").css('cursor',"default");
			$("#label_vin_addon1_trade, #label_stock_addon1_trade").css('text-decoration',"none");

		});

		$('#btn_close_addon2_trade').click(function(){
			$("#addon_two_trade").hide();
			$("#ContactIdAddon2Trade,#ContactCategoryAddon2Trade, #ContactTypeAddon2Trade, #ContactYearAddon2Trade, #ContactMakeAddon2Trade, #ContactModelIdAddon2Trade, #ContactModelAddon2Trade, #ContactConditionAddon2Trade, #ContactClassAddon2Trade, #ContactVinAddon2Trade, #ContactStockNumAddon2Trade").val("");

			$("#label_vin_addon2_trade, #label_stock_addon2_trade").css('color',"#525252");
			$("#label_vin_addon2_trade, #label_stock_addon2_trade").css('cursor',"default");
			$("#label_vin_addon2_trade, #label_stock_addon2_trade").css('text-decoration',"none");
		});

		//Addon vehicle trade ends






		// //label stock add_on1




		//Instock Popup
		$("#btn_search_stock_vin").click(function(){
			<?php if( $inventory_type == 'In Stock' ){ ?>

				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "In Stock Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});

			<?php } else if( $inventory_type == 'Branch Inventory' ){ ?>

				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search_branch/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "Branch Inventory Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});

			<?php } ?>

		});

		// in-stock vin search ends



		//<Instock Popup addon1 start>

		$("#btn_search_stock_vin_addon1").click(function(){
			<?php if( $inventory_type == 'In Stock' ){ ?>

				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "In Stock Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});

			<?php } else if( $inventory_type == 'Branch Inventory' ){ ?>
				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search_branch/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "Branch Inventory Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});
			<?php } ?>

		});


		//</Instock Popup addon1 end>


		//<Instock Popup addon2 start>


		$("#btn_search_stock_vin_addon2").click(function(){

			<?php if( $inventory_type == 'In Stock' ){ ?>

				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "In Stock Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});

			<?php } else if( $inventory_type == 'Branch Inventory' ){ ?>

				$.ajax({
					type: "GET",
					cache: false,
					data: {v_type: $(this).attr("v_type") },
					url: "/contact_instock/instock_search_branch/?search_type=vin",
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "Branch Inventory Search",
						}).find("div.modal-dialog").addClass("largeWidth");
					}
				});

			<?php } ?>

		});


		//</Instock Popup addon2 end>




		<?php if(!empty($smtp_settings) &&   $email_settings == 'On'){	 ?>
		$("#UserEmailSendEmail").click(function(){
			if( $(this).is(":checked") ){
				$(".email_container").show();
			}else{
				$(".email_container").hide();
			}
		});
		<?php }	 ?>



		$("#UserEmailTemplateId").change(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url:  "/user_templates/get_template/",
				data: {'id':$(this).val()},
				success: function(data){
					//console.log(data);
					data = $.parseJSON(data);
					$("#UserEmailSubject").val(data.template_subject);
					CKEDITOR.instances['TemplateTemplateHtml'].setData(data.template_body);

				}
			});
		});





		$("#no_cell_phone").click(function(){
			$("#ContactMobile").val('000-000-0000');
		});


		$("#ContactCreateNewEvent").click(function(){
			if( $(this).is(":checked") ){
				$("#appointment_form_container").show();
			}else{
				$("#appointment_form_container").hide();
			}
		});



		$("#CRM-Import--Open-, #Mobile-Lead--Open-, #Web-Lead--Open-").hide();

		$("#Email--Open-").prepend('<i class="fa fa-envelope"></i>');
		$("#Appointment--Open-").prepend('<i class="fa fa-calendar"></i>');
		$("#Outbound-Call--Open-").prepend('<i class="fa fa-phone"></i>');
		$("#Inbound-Call--Open-").prepend('<i class="fa fa-phone"></i>');
		$("#Showroom--Open-").prepend('<i class="fa fa-user"></i>');
		$("#Sold-Deal--Closed-").prepend('<i class="fa fa-dollar"></i>');
		$("#Dead-Lead--Closed-").prepend('<i class="fa fa-thumbs-down"></i>');

		$("#Sold-FollowUp-In--Closed-").prepend('<i class="fa fa-thumbs-o-up"></i> <i class="fa fa-phone"></i>');
		$("#Sold-FollowUp-Out--Closed-").prepend('<i class="fa fa-thumbs-o-up"></i> <i class="fa fa-phone"></i> <i class="fa fa-envelope"></i>');

		$("#Sold-Pick-Up--Closed-").prepend('<i class="fa fa-thumbs-o-up"></i> <i class="fa fa-user"></i>');



		$('#ContactContactStatusId').attr("disabled", "disabled");

		var step_showroom = [];
		<?php foreach($sales_step_options as $key => $sales_step_option){ if($key == '1') continue; ?>
			step_showroom.push( { 'stepid' : '<?php echo $key; ?>', 'stepname' : <?php echo json_encode($sales_step_option); ?> }  );
		<?php } ?>


		var all_steps = [];
		<?php foreach($sales_step_options as $key => $sales_step_option){  ?>
			all_steps.push( { 'stepid' : '<?php echo $key; ?>', 'stepname' : <?php echo json_encode($sales_step_option); ?> }  );
		<?php } ?>

		if( $("#ContactSalesStep").val() == '1' ){
			if( $("#ContactContactStatusId").val() == '6' || $("#ContactContactStatusId").val() == '5'  ){
				hide_showroom_sold('hide');
				//console.log('hide');
			}
		}else{
			hide_showroom_sold('show');
			//console.log('show');
		}


		$("#ContactContactStatusId").change(function(){
			//$("#ContactSalesStep").val("");
			if($(this).val() == '7'){
				set_options_step(step_showroom, "#ContactSalesStep");
			}else{
				set_options_step(all_steps, "#ContactSalesStep");
			}
		});
		$("#ContactContactStatusId").trigger('change');
		$("#ContactSalesStep").val('<?php echo $this->request->data['Contact']['sales_step']; ?>');



		$("#EventEventTypeId").change(function(){
			if( $(this).val() != ""){
				$("#EventTitle").val(  $("#EventEventTypeId option[value='"+$(this).val()+"']").text()  );
			}
		});

		var showroom_values  = [];
        $('#Showroom--Open- input').each(function () {
            input = $(this).val();
			showroom_values.push( input );
        });

		var sold_values = [];
		$('#Sold-Deal--Closed- input').each(function () {
            input = $(this).val();
			sold_values.push( input );
        });

		var Dead_Lead_Closed_values = [];
		$('#Dead-Lead--Closed- input').each(function () {
            input = $(this).val();
			Dead_Lead_Closed_values.push( input );
        });
		//console.log(Dead_Lead_Closed_values);

		var Sold_Deal_Closed_values = [];
		$('#Sold-Deal--Closed- input, #Sold-FollowUp-In--Closed- input, #Sold-FollowUp-Out--Closed- input, #Sold-Pick-Up--Closed- input').each(function () {
            input = $(this).val();
            Sold_Deal_Closed_values.push( input );
        });
        //console.log( Sold_Deal_Closed_values );

		//Set Sales Step
		if(jQuery.inArray( <?php echo json_encode($this->data['Contact']['status']); ?> ,  Sold_Deal_Closed_values) != -1 ){
			/*
			$('#Email--Open- input, #Appointment--Open- input, #Outbound-Call--Open- input, #Inbound-Call--Open- input, #Showroom--Open- input, #Dead-Lead--Closed- input').each(function () {
				$(this).prop('disabled', true);
				$(this).parent('label').css('color','#CCC');
	        });
	        */
	        //console.log('sold');
			$('#SMS-Text-In, #SMS-Text--Out, #Email--Open-, #Appointment--Open-, #Outbound-Call--Open-, #Inbound-Call--Open-, #Showroom--Open-, #Dead-Lead--Closed-').hide();

		}else{
			$('#Sold-FollowUp-In--Closed-, #Sold-FollowUp-Out--Closed-, #Sold-Pick-Up--Closed-').hide();
		}




		//console.log(" <?php echo $this->data['Contact']['status']; ?> ");
		$('.chk_lead_status[value=<?php echo str_replace("'","\'",json_encode($this->data['Contact']['status'])); ?>], .chk_lead_status.status_done').prop('checked',true);



		$("#btn_status_modal").html( "<i class='fa fa-edit'></i> <?php echo $this->data['Contact']['status']; ?>"  );

		$(".chk_lead_status").click(function(event){

			//console.log("dsfdf");

			//pending and showrrom validation
			if($("#ContactSalesStep").val() == '1' &&  jQuery.inArray($(this).prop('value'),  showroom_values) != -1  ){
				alert('Sales Step is pending');
				$(this).checkbox('uncheck');
				event.preventDefault();
			}else{
				$(".chk_lead_status:not(.status_done)").checkbox('uncheck');
				$(this).checkbox('check');
				$("#ContactStatus").val(  $(this).prop('value')  );
				$("#btn_status_modal").html(  "<i class='fa fa-edit'></i> "+$(this).prop('value')  );

				//Set Sales Step
				if(jQuery.inArray( $(this).prop('value') ,  sold_values) != -1 ){
					if(confirm('Do you want to change Step?')){
						$("#ContactSalesStep").val('<?php echo $sold_step; ?>');
						$("#ContactLeadStatus").val('Closed');

						// if( $(this).prop('value') ==  'Sold/Rolled-Multi Vehicle' ){
						// 	$("#ContactMultiVehicle").val('1');
						// }else{
						// 	$("#ContactMultiVehicle").val('0');
						// }


						// if( $(this).prop('value') ==  'Sold/Rolled' ){

						// 	bootbox.dialog({
						// 		message: "<div  style='text-align: center'><strong>Sold Type?</strong><div>",
						// 		buttons: {

						// 			internet_phone_deal: {
						// 				label: "Single Vehicle",
						// 				className: "btn-success",
						// 				callback: function() {
						// 					$("#ContactMultiVehicle").val('0');
						// 				}
						// 			},

						// 			success: {
						// 				label: "Multi-Vehicle",
						// 				className: "btn-warning",
						// 				callback: function() {
						// 					$("#ContactMultiVehicle").val('1');
						// 				}
						// 			},
						// 			alert: {
						// 				label: "Cancel",
						// 				className: "btn-danger",
						// 				callback: function() {
						// 					$("#ContactMultiVehicle").val('0');
						// 				}
						// 			},

						// 		}
						// 	});

						// }else{
						// 	$("#ContactMultiVehicle").val('0');
						// }















					}
				}

				//Set open/closed to Closed for Dead_Lead_Closed_values
				if(jQuery.inArray( $(this).prop('value') ,  Dead_Lead_Closed_values) != -1 ){
					if(confirm('Do you want to Open/Close Closed?')){
						$("#ContactLeadStatus").val('Closed');
					}
				}



			}

			$("#modal-2").modal('hide');

		});

		<?php  if( isset($this->request->query['do']) && $this->request->query['do'] == 'edit_lead' && $this->data['Contact']['sales_step'] != 'Sold'  ){  ?>
			$(".chk_lead_status:not(.status_done)").checkbox('uncheck');
			$('.chk_lead_status[value="Customer Update Edit ONLY"]').prop('checked',true).checkbox('check');
			$("#ContactStatus").val(  "Customer Update Edit ONLY"  );
			$("#btn_status_modal").html(  "<i class='fa fa-edit'></i> Customer Update Edit ONLY"  );

		<?php } ?>

		<?php if( isset($this->request->query['do']) && $this->request->query['do'] == 'sold_update'  ){  ?>
			$(".chk_lead_status:not(.status_done)").checkbox('uncheck');
			$('.chk_lead_status[value="Sold/Rolled"]').prop('checked',true).checkbox('check');
			$("#ContactStatus").val(  "Sold/Rolled"  );
			$("#btn_status_modal").html(  "<i class='fa fa-edit'></i> Sold/Rolled"  );
			$("#ContactSalesStep").val('<?php echo $sold_step; ?>');
			$("#ContactLeadStatus").val('Closed');


			bootbox.dialog({
				message: "<div  style='text-align: center'><strong>Sold Type? </strong><div>",
				buttons: {
					internet_phone_deal: {
						label: "Single Vehicle",
						className: "btn-success",
						callback: function() {
							//$("#ContactMultiVehicle").val('0');
							$(".chk_lead_status").checkbox('uncheck');
							$("#ContactStatus").val('Sold/Rolled');
							$("#ContactLeadStatus").val('Closed');
							$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled"  );
							$(".chk_lead_status[value='Sold/Rolled']").prop('checked',true).checkbox('check');
						}
					},
					success: {
						label: "Multi-Vehicle",
						className: "btn-warning",
						callback: function() {
							$(".chk_lead_status").checkbox('uncheck');
							$("#ContactStatus").val('Sold/Rolled-Multi Vehicle');
							$("#ContactLeadStatus").val('Closed');
							$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled-Multi Vehicle"  );
							$(".chk_lead_status[value='Sold/Rolled-Multi Vehicle']").prop('checked',true).checkbox('check');
						}
					},
					alert: {
						label: "Cancel",
						className: "btn-danger",
						callback: function() {
							//$("#ContactMultiVehicle").val('0');
						}
					},

				}
			});



		<?php } ?>


		function hide_showroom_sold(show_hide){
			if(show_hide == 'hide'){
				$("#Showroom--Open-").hide();
				$("#Sold-Deal--Closed-").hide();
			}else{
				$("#Showroom--Open-").show();
				$("#Sold-Deal--Closed-").show();
			}
		}

		// Set Sold status
		$("#ContactSalesStep").change(function(event){

			if( $("#ContactSalesStep").val() == '1' ){
				if( $("#ContactContactStatusId").val() == '6' || $("#ContactContactStatusId").val() == '5'  ){
					hide_showroom_sold('hide');
					//console.log('hide');
				}
			}else{
				hide_showroom_sold('show');
				//console.log('show');
			}

			var activate_lite_version = <?php echo json_encode($activate_lite_version); ?>;
			if( $(this).val() == '<?php echo $sold_step; ?>' && activate_lite_version == 'On'  ){
				$(".chk_lead_status").checkbox('uncheck');
				$("#ContactMultiVehicle").val('0');
				$("#ContactStatus").val('Sold/Rolled');
				$("#ContactLeadStatus").val('Closed');
				$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled"  );
				$(".chk_lead_status[value='Sold/Rolled']").prop('checked',true).checkbox('check');
			}
			if( $(this).val() != '<?php echo $sold_step; ?>' && activate_lite_version == 'On'  ){
				$(".chk_lead_status").checkbox('uncheck');
				$("#ContactMultiVehicle").val('0');
				$("#ContactStatus").val(currentStatus);
				$("#ContactLeadStatus").val('Closed');
				$("#btn_status_modal").html( "<i class='fa fa-edit'></i> " + currentStatus  );
				$(".chk_lead_status[value='"+currentStatus+"']").prop('checked',true).checkbox('check');
			}

			if( $(this).val() == '<?php echo $sold_step; ?>' && activate_lite_version == 'Off'  ){

				bootbox.dialog({
					message: "<div  style='text-align: center'><strong>Sold Type? </strong><div>",
					buttons: {

						internet_phone_deal: {
							label: "Single Vehicle",
							className: "btn-success",
							callback: function() {
								$(".chk_lead_status").checkbox('uncheck');
								$("#ContactMultiVehicle").val('0');
								$("#ContactStatus").val('Sold/Rolled');
								$("#ContactLeadStatus").val('Closed');
								$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled"  );
								$(".chk_lead_status[value='Sold/Rolled']").prop('checked',true).checkbox('check');
							}
						},

						success: {
							label: "Multi-Vehicle",
							className: "btn-warning",
							callback: function() {
								$(".chk_lead_status").checkbox('uncheck');
								$("#ContactStatus").val('Sold/Rolled-Multi Vehicle');
								$("#ContactLeadStatus").val('Closed');
								$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled-Multi Vehicle"  );
								$(".chk_lead_status[value='Sold/Rolled-Multi Vehicle']").prop('checked',true).checkbox('check');
							}
						},
						alert: {
							label: "Cancel",
							className: "btn-danger",
							callback: function() {
								$("#ContactMultiVehicle").val('0');
							}
						},

					}
				});


				// if(confirm('Do you want to change status?')){
				// 	$("#ContactStatus").val('Sold/Rolled');
				// 	$("#ContactLeadStatus").val('Closed');
				// 	$("#btn_status_modal").html( "<i class='fa fa-edit'></i> Sold/Rolled"  );
				// 	$(".chk_lead_status[value='Sold/Rolled']").prop('checked',true).checkbox('check');
				// }
			}

			if( $(this).val() == '1' &&   jQuery.inArray( $("#ContactStatus").val() ,  showroom_values) != -1  )  {
				alert('Status is showroom ');
				$(this).val("<?php echo $this->request->data['Contact']['sales_step']; ?>");
			}

		});

		//optional vehicle inputs show/hide
		$("#ContactCategory").change(function(event){
			if( $(this).val() == 'RV' || $(this).val() == 'Trailer'){
				$("#optional_vehicle_inputs, #optional_vehicle_inputs_trade").show();
				$("#price_range_non_rv").hide();
			}else{
				$("#optional_vehicle_inputs, #optional_vehicle_inputs_trade").hide();
				$("#price_range_non_rv").show();
			}
		});
		$("#ContactCategory").trigger('change');


		//Trade (Hours) for D Type Marine
		$("#ContactCategoryTrade").change(function(event){
			if( $(this).val() == 'Marine'){
				$("#label_odometer_trade").html("(Trade) Hours:");
			}else{
				$("#label_odometer_trade").html("(Trade) Miles:");
			}
		});
		$("#ContactCategoryTrade").trigger('change');



		function isNumber(n) {
			 return !isNaN(parseFloat(n)) && isFinite(n);
		}


		//Auto select price range NON RV

		function set_price_range_rv(unitvalue, input_id){
			var options_range = [];
			$(input_id+" option").each(function(){
				var optval = $(this).val();
				var opthtml = $(this).html();
				if(optval != ''){
					var plus_index = optval.indexOf("+");
					if(plus_index == -1){
						options_range.push( [optval, optval.split("-")[0],  optval.split("-")[1] ] );
					}else{
						options_range.push( [optval, optval.split("+")[0], '99999999'] );
					}
				}
			});

			if(isNumber(unitvalue)){
				uv = parseFloat(unitvalue);
				if(uv > 0){

					$.each(options_range, function( index, value ) {

  						var start = parseFloat(value[1]) * 1000;
  						var end = parseFloat(value[2]) * 1000;
  						if(uv > start && uv <= end){
  							$(input_id).val( value[0] );
  						}

					});
				}
			}else{
				$(input_id).val('');
			}
		}

		$("#ContactUnitValue").keyup(function(){
			if( $("#ContactCategory").val() != 'RV' ){
				set_price_range_rv($(this).val(), '#ContactPriceRangeNonRv');
			}else if( $("#ContactCategory").val() == 'RV' ){
				set_price_range_rv($(this).val(), '#ContactPriceRange');
			}
		});
		if( $("#ContactCategory").val() != 'RV' ){
			set_price_range_rv($("#ContactUnitValue").val(), '#ContactPriceRangeNonRv');
		}else if( $("#ContactCategory").val() == 'RV' ){
			set_price_range_rv($("#ContactUnitValue").val(), '#ContactPriceRange');
		}

		$("#ContactTradeValue").keyup(function(){
			if( $("#ContactCategory").val() != 'RV' ){
				set_price_range_rv($(this).val(), '#ContactTradePriceRangeNonRv');
			}else if( $("#ContactCategory").val() == 'RV' ){
				set_price_range_rv($(this).val(), '#ContactTradePriceRange');
			}
		});
		if( $("#ContactCategory").val() != 'RV' ){
			set_price_range_rv($("#ContactTradeValue").val(), '#ContactTradePriceRangeNonRv');
		}else if( $("#ContactCategory").val() == 'RV' ){
			set_price_range_rv($("#ContactTradeValue").val(), '#ContactTradePriceRange');
		}






		//inventory add-On one
		$.inventory({
			edit_mode: "yes",
			no_sold: "yes",
			input_type: "#ContactCategoryAddon1",
			input_category:"#ContactTypeAddon1",
			input_make:"#ContactMakeAddon1",
			input_year:"#ContactYearAddon1",
			input_yearedit:"#btn_year_edit_addon1",

		 	input_model_id:"#ContactModelIdAddon1",
			input_model:"#ContactModelAddon1",
			input_class:"#ContactClassAddon1",
			btn_edit_model:"#btn_models_edit_addon1",
			input_condition:"#ContactConditionAddon1",
			input_vin:"#ContactVinAddon1",
			input_stock:"#ContactStockNumAddon1",

			input_unitColor_id:"#ContactUnitColorAddon1",
			input_unitColor_fieldname:"data[Contact][unit_color_addon1]",
			input_UnitValue:"#ContactUnitValue_addon1",
			input_Engine:"#ContactEngineAddon1",
			input_odometer:"#ContactOdometerAddon1",
			input_branch_location:"#ContactBranchLocationAddon1",
			vehicle_selection_type_container: "#vehicle_selection_type_container_addon1"

		});

		//inventory add-On Two
		$.inventory({
			edit_mode: "yes",
			no_sold: "yes",
			input_type: "#ContactCategoryAddon2",
			input_category:"#ContactTypeAddon2",
			input_make:"#ContactMakeAddon2",
			input_year:"#ContactYearAddon2",
			input_yearedit:"#btn_year_edit_addon2",

		 	input_model_id:"#ContactModelIdAddon2",
			input_model:"#ContactModelAddon2",
			input_class:"#ContactClassAddon2",
			btn_edit_model:"#btn_models_edit_addon2",
			input_condition:"#ContactConditionAddon2",
			input_vin:"#ContactVinAddon2",
			input_stock:"#ContactStockNumAddon2",

			input_unitColor_id:"#ContactUnitColorAddon2",
			input_unitColor_fieldname:"data[Contact][unit_color_addon2]",
			input_UnitValue:"#ContactUnitValue_addon2",
			input_Engine:"#ContactEngineAddon2",
			input_odometer:"#ContactOdometerAddon2",
			input_branch_location:"#ContactBranchLocationAddon2",
			vehicle_selection_type_container: "#vehicle_selection_type_container_addon2"

		});



		//inventory add-On one trade
		$.inventory({
			edit_mode: "yes",
			no_sold: "yes",
			input_type: "#ContactCategoryAddon1Trade",
			input_category:"#ContactTypeAddon1Trade",
			input_make:"#ContactMakeAddon1Trade",
			input_year:"#ContactYearAddon1Trade",
			input_yearedit:"#btn_year_edit_addon1_trade",

		 	input_model_id:"#ContactModelIdAddon1Trade",
			input_model:"#ContactModelAddon1Trade",
			input_class:"#ContactClassAddon1Trade",
			btn_edit_model:"#btn_models_edit_addon1_trade",
			input_condition:"#ContactConditionAddon1Trade",
			input_vin:"#ContactVinAddon1Trade",
			input_stock:"#ContactStockNumAddon1Trade",

			input_unitColor_id:"#ContactUnitColorAddon1Trade",
			input_unitColor_fieldname:"data[Contact][unit_color_addon1_trade]",
			input_UnitValue:"#ContactUnitValue_addon1_trade",
			input_Engine:"#ContactEngineAddon1Trade",
			input_odometer:"#ContactOdometerAddon1Trade",
			input_branch_location:"#ContactBranchLocationAddon1Trade",
			vehicle_selection_type_container: "#vehicle_selection_type_container_addon1_trade"

		});

		//inventory add-On Two trade
		$.inventory({
			edit_mode: "yes",
			no_sold: "yes",
			input_type: "#ContactCategoryAddon2Trade",
			input_category:"#ContactTypeAddon2Trade",
			input_make:"#ContactMakeAddon2Trade",
			input_year:"#ContactYearAddon2Trade",
			input_yearedit:"#btn_year_edit_addon2_trade",

		 	input_model_id:"#ContactModelIdAddon2Trade",
			input_model:"#ContactModelAddon2Trade",
			input_class:"#ContactClassAddon2Trade",
			btn_edit_model:"#btn_models_edit_addon2_trade",
			input_condition:"#ContactConditionAddon2Trade",
			input_vin:"#ContactVinAddon2Trade",
			input_stock:"#ContactStockNumAddon2Trade",

			input_unitColor_id:"#ContactUnitColorAddon2Trade",
			input_unitColor_fieldname:"data[Contact][unit_color_addon2_trade]",
			input_UnitValue:"#ContactUnitValue_addon2_trade",
			input_Engine:"#ContactEngineAddon2Trade",
			input_odometer:"#ContactOdometerAddon2Trade",
			input_branch_location:"#ContactBranchLocationAddon2Trade",
			vehicle_selection_type_container: "#vehicle_selection_type_container_addon2_trade"
		});






	//inventory model
	$.inventory({
		no_sold: "yes",
		edit_mode: "yes",
		inventory_mode: "yes",
		input_type: "#ContactCategory",
		input_category:"#ContactType",
		input_make:"#ContactMake",

		input_year:"#ContactYear",
		input_yearedit:".btn_year_edit_class",

	 	input_model_id:"#ContactModelId",
		input_model:"#ContactModel",
		input_class:"#ContactClass",
		btn_edit_model:"#btn_models_edit",

		input_unitColor_id:"#ContactUnitColor",
		input_unitColor_fieldname:"data[Contact][unit_color]",

		input_condition:"#ContactCondition",
		input_stock:"#ContactStockNum",
		input_miles:"#ContactOdometer",
		input_vin:"#ContactVin",
		input_color:"#ContactUnitColor",

		input_floor_plans:"#ContactFloorPlans",
		input_sleeps:"#ContactSleeps",
		input_fuel_type:"#ContactFuelType",

		input_UnitValue:"#ContactUnitValue",
		input_Engine:"#ContactEngine",

		input_contactId:"#ContactId",
		spec_container:"#spec_container",
		input_odometer:"#ContactOdometer",
		input_branch_location:"#ContactBranchLocation",
		vehicle_selection_type_container: "#vehicle_selection_type_container",
		vehicle_unknown:"#vehicle_unknown"

	});





	//inventory trade
	$.inventory({
		no_sold: "yes",
		edit_mode: "yes",
		input_type: "#ContactCategoryTrade",
		input_category:"#ContactTypeTrade",
		input_make:"#ContactMakeTrade",
		btn_edit_make:'#btn_make_edit_trade',

		input_year:"#ContactYearTrade",
		input_yearedit:"#btn_year_trade_edit",

	 	input_model_id:"#ContactModelIdTrade",
		input_model:"#ContactModelTrade",
		input_class:"#ContactClassTrade",
		btn_edit_model:"#btn_models_edit_trade",

		input_unitColor_id:"#ContactUsedunitColor",
		input_unitColor_fieldname:"data[Contact][usedunit_color]",

		input_condition:"#ContactConditionTrade",
		input_UnitValue:"#ContactTradeValue",

		input_edit_make_id : 'ContactMakeTrade',
		input_edit_make_fieldname : 'data[Contact][make_trade]',
		vehicle_selection_type_container: "#vehicle_selection_type_container_trade"
	});




	$("#addmake_support_trade").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			data:{'type': $("#ContactCategoryTrade").val()  },
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Add make request",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});


	$("#addmake_support").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Add make request",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});





	//NPA link hide/show
        $("#ContactVinTrade").keypress(function() {
            var vinT=$("#ContactVinTrade").val();
            if(vinT!=''){
            $("#npalook").css("display","inline");
            //$("p").css("color","red");
            //NPAGuideURL();
        }else{
            $("#npalook").css("display","none");
        }
        });
	//NPA link hide/show end
	//NPA link hide/show
        $("#ContactVinTrade").keyup(function() {
            var vinT=$("#ContactVinTrade").val();
            if(vinT!=''){
            $("#npalook").css("display","inline");
            //$("p").css("color","red");
            //NPAGuideURL();
        }else{
            $("#npalook").css("display","none");
        }
        });
	//NPA link hide/show end


	$('#ContactModelIdTrade').on('change', function(){
		if( $("#ContactModelIdTrade").val() != '' ){
			$("#ContactConditionTrade").val("Used");
		}
	});

	$('#ContactModelTrade').on('input propertychange', function(){
		if( $("#ContactModelTrade").val() != '' ){
			$("#ContactConditionTrade").val("Used");
		}
	});




		function get_city_state(){
			var zipcode = $("#ContactZip").val();
			if(zipcode != ''){
				$.ajax({
					type: "GET",
					cache: false,
					dataType: 'json',
					url:  "https://maps.googleapis.com/maps/api/geocode/json",
					data: {'address':zipcode, 'key' : 'AIzaSyBE_5f7KpMKwjVRqUtUx9PwxGbqjI_NP-M' },
					success: function(data){
						if(data.status == 'OK'){

							var result_found = false;
							if(data.results['0']){
								$.each(data.results['0'].address_components, function(i, item) {
									//console.log( item.types.indexOf("locality") );
									if(item.types.indexOf("locality") != -1 && item.types.indexOf("political") != -1 ){
										$('#ContactCity').val(item.long_name );
										result_found = true;
									}

									if(item.types.indexOf("administrative_area_level_1") != -1 && item.types.indexOf("political") != -1 ){
										$('#ContactState').val(item.short_name );
										result_found = true;
									}
								});
							}

						}
					}
				});

			}
		}

		var delay = (function(){
		  var timer = 0;
		  return function(callback, ms){
		    clearTimeout (timer);
		    timer = setTimeout(callback, ms);
		  };
		})();

		$(document).on("input", '#ContactZip', function(){
			delay(function(){
		    	get_city_state();
		    }, 1000 );
		});




	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

--></script>

<?php
/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */
if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
?>
	<script src="/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/custom/js/form-wizards-edit-lead.init.js?v=v1.0.3-rc2&sv=v0.0.1.11.99" > </script>

	<script>
	$("#btn_finish").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "POST",
			data: $("#ContactLeadsInputEditForm").serialize(),
			url: $("#ContactLeadsInputEditForm").attr('action'),
			success: function(data){
				$("#close_child_modal_dialog").click();
			}
		});

	});
	</script>

<?php
}
?>

<script>

function NPAGuideURL(){
	var VIN = $("#ContactVinTrade").val();
	//var VIN ='a23098472398';
	if(VIN==''){
		alert("First Enter (Trade) Vin Number");
		$("#ContactVinTrade").focus();
		return false;
	}else{
		$.ajax({
				type: "POST",
				//dataType:"JSON",
				data: {'VIN':VIN},
				url: '/contacts/npaGuideUrl',
				async:false,
				success: function(data){
                                    //alert('test');

                                    //$("#dialog").load(data.url).dialog({});
                                    bootbox.dialog({
						message: data,
						title: "<b>NPA Value GuideTM</b>",
					}).find("div.modal-dialog").addClass("largeWidth");

				/*	if(data.success==true){
						window.open(data.url);
					}else{
						alert(data.message);
					}
                                        */
				}
			});
	}
}

</script>
