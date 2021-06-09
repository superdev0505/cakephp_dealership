<style type="text/css">
	.cke_button__superbutton_icon, .cke_button__emailpreview_icon{ display: none;}
	.cke_button__superbutton_label, .cke_button__emailpreview_label{display:  block;}
	.cke_button__superbutton, .cke_button__emailpreview{border: 1px solid #E1E1E1 !important;}
</style>
</br></br>
<style>
.center_footerbutotn .modal-footer {
  text-align: center;
}

.pagination>li, .pagination>li>a, .pagination>li>span {
	font-size: 12px;
}

<?php
$focus_input = "";
if($start_search == 'Phone'){
	$focus_input = "#ContactNsearchPhone";
}else if($start_search == 'Name'){
	$focus_input = "#ContactNsearchFirstName";
}else if($start_search == 'Email'){
	$focus_input = "#ContactNsearchEmail";
}
?>

<?php echo $focus_input; ?>{
    -webkit-transition: text-shadow 1s linear;
    -moz-transition: text-shadow 1s linear;
    -ms-transition: text-shadow 1s linear;
    -o-transition: text-shadow 1s linear;
    transition: text-shadow 1s linear;
	border-color: #6EA2DE;
    box-shadow: 0px 0px 10px #6EA2DE !important;
	width: 95%;
	/* margin-left: 10px; */
}
.glow_button{
	-webkit-transition: text-shadow 1s linear;
    -moz-transition: text-shadow 1s linear;
    -ms-transition: text-shadow 1s linear;
    -o-transition: text-shadow 1s linear;
    transition: text-shadow 1s linear;
	border-color: #6EA2DE;
    box-shadow: 0px 0px 10px #6EA2DE !important;
}

.bg-danger{
	background: #CC3A3A;
}

textarea
{
	 resize: vertical;
}
#list_lead_search_result ul li{
	display: block !important;
}

.history-icon.glyphicons i:before {
	font-size: 14px;
}

.history-icon {
	margin-top: -18px;
	padding-left: 22px;
}
#ContactNsearchUnitColor{
	width: 80% !important;
}

 .required_input{
 -webkit-transition: text-shadow 1s linear !important;
    -moz-transition: text-shadow 1s linear !important;
    -ms-transition: text-shadow 1s linear !important;
    -o-transition: text-shadow 1s linear !important;
    transition: text-shadow 1s linear  !important;
	border-color: #FF9D81 !important;
    box-shadow: 0px 0px 10px #FFB4B4 !important;
}


</style>
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-1 month', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<?php
$selected_lead_type = (isset($this->request->params['pass'][0]))? $this->request->params['pass'][0] : "" ;
?>
<div class="innerLR">

			<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>

			<div class="widget widget-body-white">
				<div class="widget-body">

					<div class="row">

						<?php echo $this->Form->create('Contact', array('url' => array('action' => 'search_result','load_first') ,'autocomplete'=>"off", 'class' => 'form-inline no-ajaxify', 'id'=>'ContactLeadsMainForm')); ?>
						<div class="col-md-6 col-xs-5">

							<a id="lnk_add_new_lead" lead-id=''  href="#modal-2" data-toggle="modal" class="btn btn-success" ><i class="fa fa-plus"></i> New Lead <span id='new_lead_selected'></span></a>

							<button type="button" id="btn-other_lead-search" class="btn btn-warning no-ajaxify" style='display: none;'>
								<i class="fa fa-search"></i> New Search
							</button>

							<div class="overflow-hidden">
						<?php
								echo $this->Form->input('search_all2', array(
								'div' => false,
								'class' => 'form-control hidden',
								'label' => false,
								'placeholder' => 'Other Lead Search'), array('div' => false, 'id' => 'ContactSearchAll2'));
								?>
							</div>
						</div>
						<div class="col-md-3 col-xs-7">
							<button type="submit" id="btn-submit-search" class="btn btn-success pull-right no-ajaxify"><i class="fa fa-search"></i></button>
							<div class="overflow-hidden">

							<?php
							echo $this->Form->select('search_all', array(
								'Open' => 'Open',
								'open_this_month' => 'Open Month ('.$stats_month_name.')',
								'Closed' => 'Closed',
								'closed_this_month' => 'Closed Month ('.$stats_month_name.')',
								"Today" => 'Today',
								"yesterday" => 'Yesterday',
								"this_month" => 'This Month',
								'last_month' => 'Last Month',
								'contactstatus_search_5' => 'Web Lead',
								'Dormant' => 'Dormant',
								'contactstatus_search_6' => 'Phone Lead',
								'contactstatus_search_12' => 'Mobile Lead',
								'contactstatus_search_7' => 'Showroom',
								$sales_step_options,
								'sold_this_month' => 'Sold Month ('.$stats_month_name.')',
							), array('div' => false, 'selected'=>$selected_type, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>

							</div>
						</div>
						<div class="col-md-3 col-xs-12">

							<button id='main_adv_src_big' type="button" class="btn btn-warning starts-btn" data-toggle="collapse" data-target="#advance-search">
								<i class="fa fa-search"></i> Advanced Search
							</button>
							<button class="btn btn-warning starts-btn"  type="button" id='main_adv_src_phone' data-toggle="collapse" data-target="#advance-search">
								Adv Search
							</button>
							<button class="btn btn-inverse starts-btn" id="form_reset_button" type="button">Reset</button>
							&nbsp; &nbsp;
							<a id="toggle_search_view"  href="javascript:"  class="starts-btn btn glyphicons display" data-placement="bottom" data-original-title="Detail View" data-toggle="tooltip" style='padding: 0' ><i class="fa fa-table "></i></a>

						</div>
						<?php echo $this->Form->end(); ?>

						

					</div>

					<div id="advance-search" class="collapse">
					<div class="innerAll">
						<!-- Advance search -->
						<?php
						echo $this->Form->create('Contact', array('type'=>'GET','url' => array('action' => 'search_result', 'load_first', 'selected_lead_type'=> $selected_lead_type   ) ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>

						<div class="row">


							<div class="col-md-1">
								<?php echo $this->Form->label('search_category','Type:'); ?>
								<?php echo $this->Form->input('search_category', array('type' => 'select', 'options' => $d_type_options, 'value'=>$user_d_type, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php echo $this->Form->label('search_make','Make:'); ?> <br>
								<?php echo $this->Form->input('search_make', array('type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>

								<button id="btn_make_edit_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>

								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<font color='red'>*</font> <?php
								$year_all_options['0'] = 'Any Year';
								for($i = date('Y') + 1; $i >= 1980; $i--){
									$year_all_options[ $i ] = $i;
								}
								echo $this->Form->label('search_year','Year:'); ?><br />
								<?php echo $this->Form->input('search_year', array('options'=>$year_all_options, 'type' => 'select', 'required' => 'required',  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
								<button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<font color='red'>*</font>
								<?php echo $this->Form->label('search_model_id','Model:'); ?><br />
								<?php
								//$display_model_id =  "inline-block";
								echo $this->Form->input('search_model_id', array('type' => 'select', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id));
								?>
								<?php
								$display_model_txt = 'none';
								echo $this->Form->input('search_model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt));
								?>
								<button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_type','Category:'); ?>
								<?php echo $this->Form->input('search_type', array('type' => 'select', 'options'=>$type_options, 'required' => 'required', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_class','Class:'); ?>
								<?php echo $this->Form->input('search_class', array('type' => 'select',  'required' => 'required', 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
							</div>

						</div>
						<div class="row">

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_condition','Unit Condtion:');
								echo $this->Form->input('search_condition', array(
									'type' => 'select',
									'options' => array(
										'New' => 'New',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
									),
									'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_unit_color','Unit Color:');
								echo $this->Form->input('search_unit_color', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control'));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_vehicle_trade','Vehicle/Trade:');
								echo $this->Form->input('search_vehicle_trade', array('type' => 'select', 'options'=>array('vehicle'=>'Vehicle','trade'=>'Trade'), 'required' => 'required', 'empty' => false, 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('stock_num','Stock:');
								echo $this->Form->input('stock_num', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('stock_num_trade','Stock#/T:');
								echo $this->Form->input('stock_num_trade', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-2">
								<?php echo $this->Form->label('search_price_range','Price Range:'); ?>
								<?php echo $this->Form->input('search_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_floor_plans','All Floor Plans:'); ?>
								<?php echo $this->Form->input('search_floor_plans', array('type' => 'select', 'options'=>$FloorPlansOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_length','Select Length:'); ?>
								<?php echo $this->Form->input('search_length', array('type' => 'select', 'options'=>$LengthOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_weight','Select Weight:'); ?>
								<?php echo $this->Form->input('search_weight', array('type' => 'select', 'options'=>$WeightOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_sleeps','Sleeps:'); ?>
								<?php echo $this->Form->input('search_sleeps', array('type' => 'select', 'options'=>$SleepsOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_fuel_type','All Fuel Types:'); ?>
								<?php echo $this->Form->input('search_fuel_type', array('type' => 'select', 'options'=>$FuelTypeOptions, 'empty'=>'Select','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="separator"></div>
								<hr />
								<div class="separator"></div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-2">
								<?php echo $this->Form->label('search_lead_status','Open/Close:'); ?>
								<?php echo $this->Form->input('search_lead_status', array('type' => 'select', 'options' => array('Open' => 'Open', 'Closed' => 'Closed'),'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->label('search_contact_status_id','Lead Type:'); ?>
								<?php echo $this->Form->input('search_contact_status_id', array(
									'type' => 'select',
									'options' => array(
										'5' => 'Web Lead',
										'6' => 'Phone Lead',
										'7' => 'Showroom',
										'8' => 'Parts',
										'9' => 'Service',
										'10' => 'Call Center',
										'11' => 'Rental'
									),
									'empty' => 'Select','selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_sales_step','Step:'); ?>
								<?php echo $this->Form->select('search_sales_step', $sales_step_options_original, array(
									'empty' => 'Select',
									'selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2" style="2px solid red;">
								<?php

								echo $this->Form->label('search_status','Status:');
								echo $this->Form->select('search_status', $lead_status_options, array(
									'empty' => 'Select',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_gender','Gender:');
								echo $this->Form->input('search_gender', array(
									'type' => 'select',
									'options' => array(
										'Male' => 'Male',
										'Female' => 'Female'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_best_time','Best Time:');
								echo $this->Form->input('search_best_time', array(
									'type' => 'select',
									'options' => array(
										'Anytime' => 'Anytime',
										'Morning' => 'Morning',
										'Mid Day' => 'Mid Day',
										'Afternoon' => 'Afternoon',
										'Evening' => 'Evening'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_buying_time','Buying Time:');
								echo $this->Form->input('search_buying_time', array(
									'type' => 'select',
									'options' => array(
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
										'2year' => '2year'
									),
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_source','Source:');
								echo $this->Form->input('search_source', array(
									'type' => 'select',
									'options' => $lead_sources_options,
									'empty' => 'Select',
									'selected' => '',
									'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
							<!--
							<div class="col-md-2">
								<?php
								echo $this->Form->label('location','Location:');
								echo $this->Form->input('location',array(
									'type' => 'select',
									'options' => $lead_locations_options,
									'empty' => 'Select',
									'selected' => '',
									'lable'=>false,
									'div' => false,
									'class' => 'form-control',
									'style' => 'width: 100%'
								));
								?>
								<div class="separator"></div>
							</div>
						-->

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_id','Ref#:');
								echo $this->Form->input('search_id', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_first_name','First:');
								echo $this->Form->input('search_first_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'FName'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_last_name','Last:');
								echo $this->Form->input('search_last_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'LName'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_phone','Phone:');
								echo $this->Form->input('search_phone', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Phone'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">


							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_mobile','Mobile:');
								echo $this->Form->input('search_mobile', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Mobile'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_email','Email:');
								echo $this->Form->input('search_email', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Email'
								));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_created','Search Start Date:');
								echo $this->Form->input('search_created', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_modified','Search End Date:');
								echo $this->Form->input('search_modified', array(
									'type' => 'text',
									'label'=>false,'div'=>false,'class' => 'form-control'
								));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_range_adv','Search Range:');
								echo $this->Form->input('search_range_adv', array('type' => 'select', 'required' => 'required', 'options' => array(
								'two_years' => 'Two Years',
								'all' => 'All',
								), 'label'=>false,'div'=>false,'class'=>'form-control','style'=>'width: 100%'));
								?>
								<div class="separator"></div>
							</div>


							<div class="col-md-2">
									<?php
									echo $this->Form->label('search_user_id','Sales Person: &nbsp; &nbsp;');
									echo $this->Form->input('search_user_id', array(
										'type' => 'select',
										'options' => $sperson_list,
										'empty' => 'Select',
										'selected' => '',
										'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'
									));
									?>
									<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_spouse_first_name','Spouse First:');
								echo $this->Form->input('search_spouse_first_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'FName'
								));
								?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_spouse_last_name','Spouse Last:');
								echo $this->Form->input('search_spouse_last_name', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'LName'
								));
								?>
								<div class="separator"></div>
							</div>


							<div class="col-md-2">
								<?php
								echo $this->Form->label('search_company_work','Company:');
								echo $this->Form->input('search_company_work', array(
									'label'=>false,'div'=>false,'class' => 'form-control',
									'placeholder' => 'Company'
								));
								?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-10 text-right">
								<div id="advanced_search_count" style="margin-top: 7px;"></div>
							</div>
							<div class="col-md-2">
								<div class="pull-right">
									<button type="button" data-toggle="collapse" data-target="#advance-search" class="btn btn-danger no-ajaxify"><i class="fa fa-times"></i> Close</button> &nbsp;
									<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Filter</button>
								</div>
							</div>

						</div>

						<?php echo $this->Form->end(); ?>
						<!-- // Advance search end -->
					</div>
				</div>
				</div>
			</div>

	<!-- Widget -->
	<div class="wizard">

		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">

				<div class="row">
					<div class="col-md-12">
						<div id='display_table_view'></div>
					</div>

				</div>

				<div class="row row-merge" id='display_default_view'>
					<div class="col-md-3 listWrapper">
						<div id="search-result-content" style="max-height: 500px; overflow: auto;"></div>
					</div>
					<div class="col-md-9 detailsWrapper">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div id="lead_details_content"></div>
					</div>
				</div>

			</div>
		</div>

	</div>
<!-- // Widget END -->

</div>

<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array('action' => 'search_result', 'selected_lead_type'=> ""   ) ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>
			<!-- Modal body -->
			<div class="modal-body">

				<div>



					 <center>


						<div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" checked="checked" id="ContactSearchBroad"   class="chk_lead_src_type" name="checkbox_status_broad" value="broad" >
								<i class="fa fa-fw fa-square-o"></i> Contains Word Search
							</label>
						</div>
						&nbsp; &nbsp; &nbsp;
						 <div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" id="ContactSearchExact"   class="chk_lead_src_type" name="checkbox_status_exact" value="exact" >
								<i class="fa fa-fw fa-square-o"></i> Starts With Word Search
							</label>
						</div>


					</center>
					 <div class="separator"></div>
				</div>

				<!--<div class="row">

					<div class="col-md-12 text-center">
						Quick Search (All): <?php
						echo $this->Form->input('nsearch_quick', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: auto',
						'placeholder' => 'Quick Search'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>

				</div>
				-->
				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						Search Lead Range of :
						<?php
						$range_val = "two_years";
						if($default_search_lead_range == 'Off'){
							$range_val = "all";
						}
						echo $this->Form->input('search_range', array('type' => 'select', 'required' => 'required', 'options' => array(
						'two_years' => 'Two Years',
						'all' => 'All',
						), 'label'=>false, 'value'=>$range_val, 'div'=>false,'class'=>'form-control','style'=>'width: auto'));
						?>
						<div class="separator"></div>
					</div>

					<div class="col-md-4">
						<?php echo $this->Form->input('nsearch_quick_lead', array('type' => 'select', 'options'=>array(
			            'Open' => 'Open',
			            'Closed' => 'Closed',
			            'Today' => 'Today',
			            "yesterday" => 'Yesterday',
			            "this_month" => 'This Month',
			            'last_month' => 'Last Month',
			            'web_lead' => 'Web',
			            'showroom_lead' => 'Showroom',
			            'phone_lead' => 'Phone',
			            'mobile_lead' => 'Mobile',
						), 'empty'=>'Quick Lead Search','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
						<div class="separator"></div>
					</div>

				</div>
				<div class="row">



					<!-- <div class="col-md-4 col-md-offset-2">
						<?php
						echo $this->Form->input('nsearch_mobile', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Mobile Phone'), array('div' => false));
						?>
						<div class="separator"></div>
					</div> -->

					<div class="col-md-5 col-md-offset-1">

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<?php
							echo $this->Form->input('nsearch_phone', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => '(ALL) Phone - Mobile, Home, Work'), array('div' => false));
							?>
						</div>
						<div class="separator"></div>

					</div>

					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<?php
							echo $this->Form->input('nsearch_email', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Email'), array('div' => false));
							?>
						</div>
						<div class="separator"></div>
					</div>


				</div>
				<div class="row">
					<div class="col-md-6">
						<?php
						echo $this->Form->input('nsearch_first_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'First Name - Company, Spouse, Contact Account'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-6">
						<?php
						echo $this->Form->input('nsearch_last_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Last Name'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>

				</div>

				<div align="center">
					<strong>Click to view</strong> <button data-toggle="collapse" data-target="#collapse_bottom_search" aria-expanded="false" aria-controls="collapse_bottom_search" type = 'button' class="btn btn-warning btn-xs">Detail Search</button>
				</div>


				<div class="separator"></div>

				<div class="collapse" id="collapse_bottom_search">

						<?php if($d_type != 'RV'){ ?>
						<div class="row" >

							<div class="col-md-2">
								<?php
								$est_payment_options = array();
								for($i=0; $i<=19; $i++){
									$st = $i*100;
									$lt = $st+100;
									$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
								}
								echo $this->Form->input('nsearch_est_payment_search',array('options'=>$est_payment_options,
									'class'=>'form-control',
									'style'=>'width: 100%',
									'empty'=>'Payment'
									));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2" >
								<?php echo $this->Form->input('nsearch_price_range', array('type' => 'select', 'options'=>$PriceRangeNonRvOptions, 'empty'=>'Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('nsearch_trade_price_range', array('type' => 'select', 'options'=>$PriceRangeNonRvOptions, 'empty'=>'(Trade) Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>


							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_sales_step', array('type' => 'select', 'options'=>$sales_step_options_popup, 'empty'=>'Sales Step','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->input('nsearch_status', array('type' => 'select', 'options'=>$lead_status_options_popup, 'empty'=>'Sales Status','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>




						</div>
						<?php } ?>

						<?php if($d_type == 'RV'){ ?>
						<div class="row">
							<div class="col-md-2">
								<?php
								$est_payment_options = array();
								for($i=0; $i<=19; $i++){
									$st = $i*100;
									$lt = $st+100;
									$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
								}
								echo $this->Form->input('nsearch_est_payment_search',array('options'=>$est_payment_options,
									'class'=>'form-control',
									'style'=>'width: 100%',
									'empty'=>'Payment'
									));
								?>
								<div class="separator"></div>
							</div>

							<div class="col-md-2" >
								<?php echo $this->Form->input('nsearch_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-3" >
								<?php echo $this->Form->input('nsearch_trade_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'(Trade) Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>

							<div class="col-md-3">
								<?php echo $this->Form->input('nsearch_floor_plans', array('type' => 'select', 'options'=>$FloorPlansOptions, 'empty'=>'All Floor Plans','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_length', array('type' => 'select', 'options'=>$LengthOptions, 'empty'=>'Select Length','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_weight', array('type' => 'select', 'options'=>$WeightOptions, 'empty'=>'Weight','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_sleeps', array('type' => 'select', 'options'=>$SleepsOptions, 'empty'=>'Sleeps','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_fuel_type', array('type' => 'select', 'options'=>$FuelTypeOptions, 'empty'=>'Fuel Type','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-2">
								<?php echo $this->Form->input('nsearch_sales_step', array('type' => 'select', 'options'=>$sales_step_options_popup, 'empty'=>'Sales Step','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
							<div class="col-md-4">
								<?php echo $this->Form->input('nsearch_status', array('type' => 'select',  'options'=>$lead_status_options_popup, 'empty'=>'Sales Status','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
								<div class="separator"></div>
							</div>
						</div>
						<?php } ?>


					<div class="row">
						<div class="col-md-7 col-md-offset-2 text-center">
							Vehicle Search Start Here:
							<?php
							echo $this->Form->input('search_vehicle_type', array('type' => 'select',  'options' => array(
							'new_vehicle' => 'New Vehicle',
							'trade_vehicle' => 'Trade Vehicle',
							), 'label'=>false,'div'=>false,'class'=>'form-control','style'=>'width: auto'));
							?>
							<div class="separator"></div>
						</div>
					</div>


					<div class="row">

						<div class="col-md-3">
							<?php echo $this->Form->input('nsearch_category', array('type' => 'select', 'options' => $d_type_options, 'empty' => 'Type', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
							<div class="separator"></div>
						</div>

						<div class="col-md-3">
							<?php echo $this->Form->input('nsearch_make', array('type' => 'select', 'options' => $mk_optionsn,  'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control pull-left','style'=>'width: 80%'));  ?>&nbsp;

							<button id="btn_make_edit_trade_nsearch" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>

							<div class="separator"></div>
						</div>

						<div class="col-md-3">
							<?php
							$year_all_options['0'] = 'Any Year';
							for($i = date('Y') + 1; $i >= 1980; $i--){
								$year_all_options[ $i ] = $i;
							}
							echo $this->Form->input('nsearch_year', array('type' => 'select','options' => $year_all_options,   'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%'));  ?>
							<button id="btn_year_editnn" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
					</div>

					<div class="row"> 
						<div class="col-md-5">
							<?php
							//$display_model_id =  "inline-block";
							echo $this->Form->input('nsearch_model_id', array('type' => 'select','options' => $model_optn, 'empty' => 'Model', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_idn));
							?>

							<?php
							//$display_model_txt = 'none';
							echo $this->Form->input('nsearch_model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txtn));
							?>
							<button id="btn_models_edit_nn" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('nsearch_type', array('type' => 'select','options' => $body_typen,   'empty' => 'Category', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
						</div>
						<div class="col-md-2">
							<?php
							echo $this->Form->input('nsearch_condition', array('type' => 'select',  'options' => array(
							'Any' => 'Any',
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Condition', 'selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>

						<div class="col-md-4">
							<?php
							echo $this->Form->input('nsearch_vin', array('type' => 'text','placeholder'=>'VIN','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>


					</div>

					<div class="row">
						<div class="col-md-6 col-md-offset-1">
							<?php echo $this->Form->input('nsearch_unit_color', array('type' => 'text', 'placeholder'=>'Color','label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control')); ?>
							<button id="btn_color_edit_nn" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('nsearch_stock_num', array(
							'type' => 'text',
							'placeholder' =>'Stock#',
							'label'=>false,'div'=>false,
							'class' => 'form-control'
							));
							?>
							<div class="separator"></div>
						</div>






					</div>

					<div class="row">
						<div class="col-md-12">
							<div align="center" class="text-center">
								<i>Search Previous ID from a Worksheet (input ID) </i>
							<?php
								echo $this->Form->input('nsearch_id', array(
								'div' => false,
								'type' => 'text',
								'class' => 'form-control',
								'style' =>'width: 120px',
								'label' => false,
								'placeholder' => 'ID'), array('div' => false));
								?>
								<i>or Cant find your lead? Use the (<a href="/contacts/leads_main/?do=advsrc" class="no-ajaxify" ><u>Advanced Search</u></a>)</i>
							</div>
						</div>
					</div>



				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="separator bottom"></div>
						<a href="javaScript:" <?php /*?>style="display: none;"<?php */?> id="start_new_lead" lead-id="">Start New</a>
					</div>
				</div>

			</div>
			<div class="modal-footer center margin-none">


				<div class="row">
					<div class="col-md-2 text-left">
						<a href="#" class="btn btn-danger" id="close_modal" data-dismiss="modal">Cancel</a>
					</div>
					<div class="col-md-8">
						<div id='new_search_cnt_alert'  style='display: none; margin-top: 9px; font-size: 13px; color: #fff;padding: 3px; margin-bottom: 10px;'></div>
						<span class='label label-info label-inverse' id='new_search_cnt' style='display: none; margin-top: 9px; font-size: 13px;'></span>
					</div>
					<div class="col-md-2">
						<button type="submit" id="submit_new_lead_search" class="btn btn-success no-ajaxify ">Search / Start</button>
					</div>
				</div>

				<!-- shoppers start	  -->
				<div class='row' id='result_shoppers' style='display: none'>
				</div>
				<!-- shoppers ends  -->


			</div>
			<?php echo $this->Form->end(); ?>

		</div>
	</div>

</div>
<!-- // Modal END -->

<?php
	$grp_ids = "";
	if(isset($this->request->query['grp_ids']) && $this->request->query['grp_ids'] != ''){
		$grp_ids = $this->request->query['grp_ids'];
	}
	//debug($grp_ids);
 ?>

<script>




	function read_more_history_note_details(history_id){

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/history_comment",
			data: {'history_id':history_id},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "History Notes",
				});
			}
		});

	};





function ajax_fails_alert(){

	bootbox.dialog({
		message: "<div  style='text-align: center'>Request is taking a bit longer. Please refresh and try again.<div>",
		title: "",
		buttons: {
			success: {
				label: "Cancel",
				className: "btn-danger",
				callback: function() {

				}
			},
			refresh: {
				label: "Refresh",
				className: "btn-success",
				callback: function() {
					location.reload();
				}
			},
		}
	});

}






<?php if($traditional_log_view == 'On'){ ?>
var table_view_on = true;
<?php }else{ ?>
var table_view_on = false;
<?php } ?>
function search_all_view(search_url, additional_data, only_count){

		//console.log("Fails");
		//console.log(search_url);
		//console.log(only_count, additional_data);

		if(table_view_on == true){

			var view_type_obj = {'view_type':'table_view'};
			var tmpobj = {};
			$.extend(tmpobj, additional_data, view_type_obj);
			//console.log(additional_data);
			return $.ajax({
				type: "GET",
				cache: false,
				url: search_url,
				data: tmpobj,
				success: function(data){
					if(only_count == 'yes'){
						$("#advanced_search_count").html(data);
					}else{


						$('.ajax-loading').addClass('hide');
						$("#display_table_view").show();

						$("#display_default_view").hide();
						$("#search-result-content").empty();
						$("#lead_details_content").empty();
						$("#display_table_view").html(data);
					}

				},
		     	error: function (xhr, ajaxOptions, thrownError) {
		        	ajax_fails_alert();
		      	}
			});

		}else{

			$.extend(additional_data, {'grp_ids':'<?php echo $grp_ids; ?>'});

			$("#display_table_view").hide();
			$("#display_table_view").empty();

			return $.ajax({
				type: "GET",
				cache: false,
				data: additional_data,
				url: search_url,
				success: function(data){
					if(only_count == 'yes'){
						$("#advanced_search_count").html(data);
					}else{

						$('.ajax-loading').addClass('hide');
						$("#display_default_view").show();
						$("#search-result-content").html(data);

					}

				},
				error: function (xhr, ajaxOptions, thrownError) {
		        	ajax_fails_alert();
		      	}
			});
		}

		//console.log(additional_data);

	}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	function count_new_lead(){
			$("#new_search_cnt").show();
			$("#new_search_cnt").html("Loading...");

			var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';

			var search_url = "/contacts/search_result_new_lead/allow_shopper:<?php echo $allow_shopper; ?>/";

			if(

				$("#ContactNsearchEmail").val().trim() != '' ||
				$("#ContactNsearchPhone").val().trim() != '' ||
				$("#ContactNsearchFirstName").val().trim() != '' ||
				$("#ContactNsearchLastName").val().trim() != '' ||

				$("#ContactNsearchId").val().trim() != '' ||

				$("#ContactNsearchSalesStep").val().trim() != '' ||
				$("#ContactNsearchStatus").val().trim() != '' ||
				$("#ContactNsearchQuickLead").val().trim() != '' ||
				$("#ContactNsearchCategory").val().trim() != '' ||
				$("#ContactNsearchType").val().trim() != '' ||
				$("#ContactNsearchMake").val().trim() != '' ||
				$("#ContactNsearchYear").val().trim() != '' ||
				$("#ContactNsearchModel").val().trim() != '' ||
				$("#ContactNsearchModelId").val().trim() != '' ||
				$("#ContactNsearchCondition").val().trim() != '' ||

				$("#ContactNsearchVin").val().trim() != ''  ||
				$("#ContactNsearchStockNum").val().trim() != ''  ||
				$("#ContactNsearchUnitColor").val().trim() != ''  ||

				 $("#ContactNsearchEstPaymentSearch").val().trim() != ''  ||

				<?php if($d_type != 'RV'){ ?>
				$("#ContactNsearchPriceRange").val().trim() != '' ||
				$("#ContactNsearchTradePriceRange").val().trim() != ''
				<?php } ?>

				<?php if($d_type == 'RV'){ ?>
				$("#ContactNsearchPriceRange").val().trim() != '' ||
				$("#ContactNsearchTradePriceRange").val().trim() != '' ||
				$("#ContactNsearchFloorPlans").val().trim() != '' ||
				$("#ContactNsearchLength").val().trim() != '' ||
				$("#ContactNsearchWeight").val().trim() != '' ||
				$("#ContactNsearchSleeps").val().trim() != '' ||
				$("#ContactNsearchFuelType").val().trim() != ''
				<?php } ?>


			){



				$.ajax({
					type: "GET",
					cache: false,
					data: {'search_type': search_type,
					email: $("#ContactNsearchEmail").val().trim(),
					phone: $("#ContactNsearchPhone").val().trim(), first_name:$("#ContactNsearchFirstName").val().trim(), last_name : $("#ContactNsearchLastName").val().trim(),

					sales_step: $("#ContactNsearchSalesStep").val().trim(),
					status: $("#ContactNsearchStatus").val().trim(),
					search_quick_lead: $("#ContactNsearchQuickLead").val().trim(),

					category: $("#ContactNsearchCategory").val().trim(),
					type: $("#ContactNsearchType").val().trim(),
					make: $("#ContactNsearchMake").val().trim(),
					year: $("#ContactNsearchYear").val().trim(),
					model: $("#ContactNsearchModel").val().trim(),
					condition: $("#ContactNsearchCondition").val().trim(),
					searchrange: $("#ContactSearchRange").val(),

					est_payment_search: $("#ContactNsearchEstPaymentSearch").val(),




					vehicle_type: $("#ContactSearchVehicleType").val(),
					vin: $("#ContactNsearchVin").val().trim(),
					stock_num: $("#ContactNsearchStockNum").val().trim(),
					unit_color: $("#ContactNsearchUnitColor").val().trim(),


					id: $("#ContactNsearchId").val().trim(),

					<?php if($d_type != 'RV'){ ?>
					price_range: $("#ContactNsearchPriceRange").val().trim(),
					trade_price_range: $("#ContactNsearchTradePriceRange").val().trim()
					<?php } ?>

					<?php if($d_type == 'RV'){ ?>
					price_range: $("#ContactNsearchPriceRange").val().trim(),
					trade_price_range: $("#ContactNsearchTradePriceRange").val().trim(),
					floor_plans: $("#ContactNsearchFloorPlans").val().trim(),
					length: $("#ContactNsearchLength").val().trim(),
					weight: $("#ContactNsearchWeight").val().trim(),
					sleeps: $("#ContactNsearchSleeps").val().trim(),
					fuel_type: $("#ContactNsearchFuelType").val().trim()
					<?php } ?>

					},
					url:  search_url,
					dataType: "json",
					success: function(data){
						$("#result_shoppers").html("");
						$("#result_shoppers").hide();
						if(data.result == '0'){
							$("#new_search_cnt").html("0 - Lead found, Submit will start a new lead");
						}else{
							$("#new_search_cnt").html(data.result+" - Lead Found");


							//console.log(data.display_alert);
							if( data.display_alert == true ){
								$("#new_search_cnt_alert").show();
								console.log(data.show_alert);
								var alert_str = '<div class="bg-danger"> <i class="fa fa-exclamation-triangle"></i> Your search matches a current Open Lead.  Please review here </div> <div class="bg-inverse">';
									alert_str += data.show_alert.Contact.first_name+" "+data.show_alert.Contact.last_name+", ";
									alert_str += ' Mobile: '+data.show_alert.Contact.mobile+', Phone: '+data.show_alert.Contact.phone+', Work:'+data.show_alert.Contact.phone+', Email: '+data.show_alert.Contact.email;

									alert_str += '<br>'+data.show_alert.Contact.year+' '+data.show_alert.Contact.make+' '+data.show_alert.Contact.model+' '+data.show_alert.Contact.stock_num;


									alert_str += '<br> Sales Person: '+data.show_alert.Contact.sperson;
	  								alert_str += ', Status: '+data.show_alert.Contact.status;
	  								alert_str += ', Modified: '+data.show_alert.Contact.modified + "</div>";



								$("#new_search_cnt_alert").html( alert_str );

							}else{
								$("#new_search_cnt_alert").html("");
								$("#new_search_cnt_alert").hide();
							}



						}

						if(data.shoppers &&  data.shoppers.length > 0){
							$("#result_shoppers").show();
							$("#result_shoppers").html("");
							$switch_btn = '';

							if(data.service_search.length > 0)
							{
								$switch_btn = '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="other-location-result" data-id="result_service_search" data-hide="other-location-result" data-text="'+data.shoppers.length+' Other Location Leads">'+data.service_search.length+' Service Leads Found</a>';
							}

							if(data.lightspeed_search.length > 0)
							{
								$switch_btn += '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="other-location-result" data-id="result_lightspeed_search" data-hide="other-location-result" data-text="'+data.shoppers.length+' Other Location Leads">'+data.lightspeed_search.length+' Lightspeed Contacts Found</a>';
							}

							var result_shoppers = $switch_btn +
							'<div class="col-md-12 text-left" id="other-location-result">  <br> <h4>Leads Found In Other Locations ('+data.shoppers.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Location</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Vehicle</th> \
								<th>Sperson</th> \
								<th>Lead Status</th> \
								<th>Modified</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.shoppers, function( key, value ) {
  								//alert( value.Contact.id );
  								result_shoppers +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.Contact.id+'<a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?ref_other='+value.Contact.id+'">Create New</a>'+
				'<br><button type="button"    class="btn  btn-inverse btn-xs btn_show_hide_history_otherlocation" style="margin-top: 10px"   data-contact-id="'+value.Contact.id+'" > History</button>'+
	  								'</td>'+
	  								'<td>'+value.Contact.company+'</td>'+
	  								'<td>'+value.Contact.first_name+' '+value.Contact.last_name+'</td>'+
	  								'<td>Mobile: '+value.Contact.mobile+'<br>Phone: '+value.Contact.phone+'<br>Work:'+value.Contact.phone+'<br>Email: '+value.Contact.email+'</td>'+
	  								'<td>'+value.Contact.year+' '+value.Contact.make+' '+value.Contact.model+' '+value.Contact.stock_num+'</td>'+
	  								'<td>'+value.Contact.sperson+'</td>'+
	  								'<td>'+value.Contact.status+'</td>'+
	  								'<td>'+value.Contact.modified+'</td>'+
  								'</tr>'+

  								'<tr id="history_otherloc_'+value.Contact.id+'" class="gradeA" style="display: none;" >'+
									'<td colspan="8">'+
										'<div class="row">'+
											'<div class="col-md-12" id = "history_otherloc_container_'+value.Contact.id+'">&nbsp;</div>'+
										'</div>'+
									'</td>'+
								'</tr>'


  								;
							});
							result_shoppers +=  '</tbody></table> </div>';
							$("#result_shoppers").html(result_shoppers);

						}
						if(data.service_search && data.service_search.length > 0)
						{
							$("#result_shoppers").show();
							if($("#result_shoppers").html() == '')
							{
								$("#result_shoppers").html('');
								if(data.lightspeed_search.length > 0)
								{
									$switch_btn = '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="result_service_search" data-id="result_lightspeed_search" data-hide="result_service_search" data-text="'+data.service_search.length+' Service Leads Found">'+data.lightspeed_search.length+' Lightspeed Contacts Found</a>';
								$("#result_shoppers").html($switch_btn);
								}

							}
							var result_service =
							'<div class="col-md-12 text-left" id="result_service_search">  <br> <h4>Leads Found In Service App('+data.service_search.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Vehicle</th> \
								<th>Modified</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.service_search, function( key, value ) {
  								//alert( value.Contact.id );
  								result_service +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.ServiceLead.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?service_ref='+value.ServiceLead.id+'">Create New</a>'+

	  								'</td>'+


	  								'<td>'+value.ServiceLead.first_name+' '+value.ServiceLead.last_name+'</td>'+
	  								'<td>Mobile: '+value.ServiceLead.mobile+'<br>Phone: '+value.ServiceLead.phone+'<br>Work:'+value.ServiceLead.phone+'<br>Email: '+value.ServiceLead.email+'</td>'+
	  								'<td>'+value.ServiceLead.year+' '+value.ServiceLead.make+' '+value.ServiceLead.model+' '+value.ServiceLead.stock_num+'</td>'+


	  								'<td>'+value.ServiceLead.modified+'</td>'+
  								'</tr>';
							});
							result_service +=  '</tbody></table> </div>';
							$("#result_shoppers").append(result_service);

						}

			// Light Speed search

			if(data.lightspeed_search && data.lightspeed_search.length > 0)
						{
							$("#result_shoppers").show();
							if($("#result_shoppers").html()=='')
							{
								$("#result_shoppers").html('');
							}
						var result_lightspeed =
							'<div class="col-md-12 text-left" id="result_lightspeed_search">  <br> <h4>Contacts Found In Lightspeed('+data.lightspeed_search.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Modified</th> \
								<th>Source</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.lightspeed_search, function( key, value ) {
  								//alert( value.Contact.id );
  								result_lightspeed +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.AdpCustomer.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?lightspeed_ref='+value.AdpCustomer.id+'">Create New</a>'+

	  								'</td>'+
	  								'<td>'+value.AdpCustomer.first_name+' '+value.AdpCustomer.last_name+'</td>'+
	  								'<td>Mobile: '+value.AdpCustomer.mobile+'<br>Phone: '+value.AdpCustomer.phone+'<br>Work:'+value.AdpCustomer.phone+'<br>Email: '+value.AdpCustomer.email+'</td>'+
	  								'<td>'+value.AdpCustomer.modified+'</td>'+
									'<td>'+value.AdpCustomer.lead_source+'</td>'+
  								'</tr>';
							});
							result_lightspeed +=  '</tbody></table> </div>';
							$("#result_shoppers").append(result_lightspeed);

						}


					}
				});

			}else{

				$("#new_search_cnt").hide();
			}

	}


	// $("#lnk_add_new_lead").on("click", function() {
	// 	$('#ContactNsearchPhone, #ContactNsearchEmail, #ContactNsearchFirstName, #ContactNsearchLastName,#ContactNsearchVin,#ContactNsearchUnitColor,#ContactNsearchModel,#ContactNsearchStockNum,#ContactNsearchId').val("");
	// 	$('#ContactNsearchEstPaymentSearch,#ContactNsearchPriceRange, #ContactNsearchTradePriceRange, #ContactNsearchFloorPlans,#ContactNsearchLength,#ContactNsearchWeight,#ContactNsearchSleeps,#ContactNsearchFuelType,#ContactNsearchSalesStep,#ContactNsearchStatus,#ContactNsearchCategory,#ContactNsearchType,#ContactNsearchMake,#ContactNsearchYear,#ContactNsearchModelId,#ContactNsearchCondition,#ContactNsearchQuickLead').val("");

	// 	$("#result_shoppers").html("");
	// 	$("#result_shoppers").hide();
	// 	$("#new_search_cnt").html("");
	// 	$("#new_search_cnt").hide();

	// 	$("#new_search_cnt_alert").html("");
	// 	$("#new_search_cnt_alert").hide();

	// });

	$("body").on('click','.print-lead-table',function(e){
		e.preventDefault();
		$("#display_table_view").printThis();

		});


	$('#ContactNsearchPhone, #ContactNsearchEmail, #ContactNsearchFirstName, #ContactNsearchLastName,#ContactNsearchVin,#ContactNsearchUnitColor,#ContactNsearchModel,#ContactNsearchStockNum,#ContactNsearchId').bind('input keyup', function(){
	    var $this = $(this);
	    var delay = 1500; // 2 seconds delay after last input


	    var elementid = $(this).attr('id');
	    //console.log(elementid);
	    if( elementid == 'ContactNsearchPhone' &&  $("#ContactNsearchPhone").val().trim().length < 3 && $("#ContactNsearchPhone").val().trim().length > 0    ){
	    	return true;
	    }
	    if( elementid == 'ContactNsearchFirstName' &&  $("#ContactNsearchFirstName").val().trim().length == 1   ){
	    	return true;
	    }
	    if( elementid == 'ContactNsearchLastName' &&  $("#ContactNsearchLastName").val().trim().length == 1 ){
	    	return true;
	    }
	    if( elementid == 'ContactNsearchEmail' &&  $("#ContactNsearchEmail").val().search('@') < 1 ){
	    	return true;
	    }


	    clearTimeout($this.data('timer'));
	    $this.data('timer', setTimeout(function(){
	        count_new_lead();
	    }, delay));
	});

	$('body').on('click','a.main-search-switch-btn',function(e){
			e.preventDefault();
			div_show= $(this).attr('data-id');
			div_hide= $(this).attr('data-hide');
			show_text= $(this).attr('data-text');
			hide_text = $(this).text();
			$('#'+div_show).detach().insertBefore('#'+$(this).attr('data-first'));
			 $(this).text(show_text);
			$(this).attr('data-id',div_hide);
			$(this).attr('data-hide',div_show);
			$(this).attr('data-text',hide_text);
			$(".main-search-switch-btn").attr('data-first',div_show)

		});



	$(document).on("change",'#ContactNsearchEstPaymentSearch,  #ContactSearchVehicleType,#ContactNsearchPriceRange, #ContactNsearchTradePriceRange, #ContactNsearchFloorPlans,#ContactNsearchLength,#ContactNsearchWeight,#ContactNsearchSleeps,#ContactNsearchFuelType,#ContactNsearchSalesStep,#ContactNsearchStatus,#ContactNsearchCategory,#ContactNsearchType,#ContactNsearchMake,#ContactNsearchYear,#ContactNsearchModelId,#ContactNsearchCondition,#ContactNsearchQuickLead,#ContactSearchRange', function(){
		setTimeout(function(){count_new_lead()},500);
	});

$('#ContactNsearchUnitColor').live('change' ,function()
{
	setTimeout(function(){count_new_lead()},500);
});

	$("#btn_color_edit_nn").click(function(){
		$("#ContactNsearchUnitColor").replaceWith('<input name="nsearch_unit_color" class="form-control" type="text" value="" id="ContactNsearchUnitColor">');
	});


	$("#ContactNsearchPhone").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



		$('#modal-2').on('shown.bs.modal', function () {
		    <?php if($start_search == 'Phone'){ ?>
	    	$('#ContactNsearchPhone').focus();
	    	<?php }else{ ?>
	    		$('#ContactNsearchFirstName').focus();
	    	<?php } ?>
		})

		$("#ContactSearchBroad").checkbox('check');

		$(".chk_lead_src_type").click(function(event){
			$(".chk_lead_src_type").checkbox('uncheck');
			$(this).checkbox('check');
			count_new_lead();
		});



	function validatePhone(txtPhone) {
		var a = document.getElementById(txtPhone).value;
		var filter = /^(\d+-?)+\d+$/;
		if (filter.test(a)) {
			return true;
		}
		else {
			return false;
		}
	}

	var search_url_search_result = "";
	var search_url_search_data = {};

	function display_pending_notpending(query_type){
		$("#search-result-content").html("");
		$('.ajax-loading').removeClass('hide');
		search_url_search_result = "/contacts/search_result/load_first/search_all2:"+query_type+"/search_all:"+query_type+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
		search_url_search_data = {};
		search_all_view(search_url_search_result, search_url_search_data);
		/*
		$.ajax({
			type: "GET",
			cache: false,
			url:  search_url_search_result,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		*/
	}

	<?php if(isset($this->params->query['do']) && $this->params->query['do'] == 'advsrc'  ){ ?>
		$("#advance-search").collapse('show');
	<?php } ?>


	search_current_month = true;

	$("#form_reset_button").click(function() {
        $('#ContactLeadsForm2').find('input, select').each(function() {
            $(this).val('');
        });
		$('#ContactLeadsMainForm').find('input, select').each(function() {
            $(this).val('');
        });

    });


		$(".alert").delay(3000).fadeOut("slow");


		<?php if( isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'view'){ ?>

		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');

		search_url_search_result = "/contacts/search_result/load_first/contact_id:<?php echo $this->request->params['pass']['1']; ?>/";
		search_url_search_data = {};
		search_all_view(search_url_search_result, search_url_search_data);
		/*
		$.ajax({
			type: "GET",
			cache: false,
			url: search_url_search_result ,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		*/

		<?php }else if( isset($this->request->params['pass']['0'])){ ?>

		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		search_url_search_result = "/contacts/search_result/load_first/selected_lead_type:<?php echo $selected_lead_type; ?>/?search_contact_status_id=<?php echo $this->request->params['pass']['0']; ?>";
		search_url_search_data = {};
		search_all_view(search_url_search_result, search_url_search_data);
		/*
		$.ajax({
			type: "GET",
			cache: false,
			url:  search_url_search_result,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		*/
		<?php } ?>


		<?php
		//load newly added/edited leads
		if( isset($load_lead)){ ?>
		$("#lead_details_content").html("&nbsp;");
		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'lead_details', 'selected_lead_type'=>$selected_lead_type, $load_lead )); ?>",
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		<?php
		} ?>


		$("#ContactSearchCreated").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchModified').bdatepicker('setStartDate', startDate);
			$('#ContactSearchCreated').bdatepicker('hide');

		});

		$("#ContactSearchModified").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchCreated').bdatepicker('setEndDate', FromEndDate);
			$('#ContactSearchModified').bdatepicker('hide');
		});

		$("#ContactSearchClass, #ContactSearchType, #ContactSearchMake, #ContactSearchYear, #ContactSearchModelId, #ContactSearchCondition, #ContactSearchVehicleTrade, #ContactSearchPriceRange, #ContactSearchFloorPlans, #ContactSearchLength, #ContactSearchWeight, #ContactSearchSleeps, #ContactSearchFuelType, #ContactSearchLeadStatus, #ContactSearchContactStatusId, #ContactSearchSalesStep, #ContactSearchStatus, #ContactSearchGender, #ContactSearchBestTime, #ContactSearchBuyingTime, #ContactSearchSource, #ContactSearchUserId").change(function(){
			search_url_search_data = $(this).closest('form').serialize();
			var new_search_url_search_data = search_url_search_data + "&onlycount=yes";
			search_all_view(search_url_search_result, new_search_url_search_data, "yes" ).done(function(data) {
				//$('.ajax-loading').addClass('hide');
				//$("#advance-search").collapse('hide');
			});

		});


		$('#ContactSearchFirstName, #ContactSearchLastName, #ContactSearchId, #ContactStockNum, #ContactStockNumTrade, #ContactSearchPhone, #ContactSearchMobile, #ContactSearchEmail, #ContactSearchSpouseFirstName, #ContactSearchSpouseLastName, #ContactSearchCompanyWork').bind('input keyup', function(){
		    var $this = $(this);
		    var delay = 1500; // 2 seconds delay after last input

		    clearTimeout($this.data('timer'));
		    $this.data('timer', setTimeout(function(){


			    search_url_search_data = $("#ContactLeadsForm2").serialize();
				var new_search_url_search_data = search_url_search_data + "&onlycount=yes";
				search_all_view(search_url_search_result, new_search_url_search_data, "yes" ).done(function(data) {
					//$('.ajax-loading').addClass('hide');
					//$("#advance-search").collapse('hide');
				});

		    }, delay));
		});












		//advance search
		$("#submit_advance_search_filter").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');

			search_url_search_result = $(this).closest('form').attr('action');
			search_url_search_data = $(this).closest('form').serialize();
			//console.log(  search_url_search_data );
			//search_url_search_data = search_url_search_data + "&onlycount=yes";

			search_all_view(search_url_search_result, search_url_search_data ).done(function(data) {
				$('.ajax-loading').addClass('hide');
				$("#advance-search").collapse('hide');
			});
			/*
			$.ajax({
				type: "GET",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
					$("#advance-search").collapse('hide');
				}
			});
			*/
			return false;
		});
/*
		$("#ContactSearchAll2").keypress(function(event){
			$("#start_new_lead, #lnk_add_new_lead").attr('lead-id',"");
			$("#new_lead_selected").html("");
		});
	*/
		$("#ContactSearchAll2").keyup(function(event){
			$("#start_new_lead, #lnk_add_new_lead").attr('lead-id',"");
			$("#new_lead_selected").html("");
		});

		$("#btn-other_lead-search").click(function(event){
			$('#modal-2').modal('show')
		});





		$("#lnk_add_new_lead").click(function(event){
			//console.log( $(this).attr('lead-id')+"dfdf"  );

			//$(this).attr('alert_new_lead') = 1;

			if(  $(this).attr('alert_new_lead') == '1'  ){
				bootbox.dialog({
					message: "<div  style='text-align: center'><strong>PLEASE NOTE:</strong> We found an exact OPEN lead match from your search results. <br>Please edit the lead or leads found.<div>",
					title: "Start New Lead",
					buttons: {
						closebutton: {
							label: "Close",
							className: "btn-danger",
							callback: function() {

							}
						},
						success: {
							label: "Multi-Vehicle - Start New",
							className: "btn-success",
							callback: function() {
								location.href = "/contacts/leads_input?new_lead_contact="+$("#lnk_add_new_lead").attr('lead-id');
							}
						},
						danger: {
							label: "Not found - Start new",
							className: "btn-warning",
							callback: function() {
								location.href = "/contacts/leads_input?alert_new_lead=yes&new_lead_contact="+$("#lnk_add_new_lead").attr('lead-id');
							}
						}
					}
				});

				return false;

			}else if( $(this).attr('lead-id') != '')  {
				location.href = "/contacts/leads_input?new_lead_contact="+$(this).attr('lead-id');
			}


			if( $('#new_lead_selected').html() != '' && $(this).attr('lead-id') == ''  ){
				var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';
				location.href = "/contacts/leads_input/<?php echo (!empty($selected_lead_type))? "selected_lead_type:".$selected_lead_type."/" : "" ?>?search_phone="+escape($("#ContactNsearchPhone").val())+"&search_first_name="+escape($("#ContactNsearchFirstName").val())+"&search_last_name="+escape($("#ContactNsearchLastName").val())+"&search_email="+escape($("#ContactNsearchEmail").val())+"&mainsearch=0";
				return false;
			}else{



				$('#ContactNsearchPhone, #ContactNsearchEmail, #ContactNsearchFirstName, #ContactNsearchLastName,#ContactNsearchVin,#ContactNsearchUnitColor,#ContactNsearchModel,#ContactNsearchStockNum,#ContactNsearchId').val("");
				$('#ContactNsearchEstPaymentSearch,#ContactNsearchPriceRange, #ContactNsearchTradePriceRange, #ContactNsearchFloorPlans,#ContactNsearchLength,#ContactNsearchWeight,#ContactNsearchSleeps,#ContactNsearchFuelType,#ContactNsearchSalesStep,#ContactNsearchStatus,#ContactNsearchCategory,#ContactNsearchType,#ContactNsearchMake,#ContactNsearchYear,#ContactNsearchModelId,#ContactNsearchCondition,#ContactNsearchQuickLead').val("");

				$("#result_shoppers").html("");
				$("#result_shoppers").hide();
				$("#new_search_cnt").html("");
				$("#new_search_cnt").hide();

				$("#new_search_cnt_alert").html("");
				$("#new_search_cnt_alert").hide();



			}




			//return false;



		});

		//new lead
		function refresh_new_lead(){

			if( $("#ContactSearchAll2").val().trim() != ''){

				var n = $("#ContactSearchAll2").val().indexOf(":");
				if( n == -1){
					//var search_url = $(this).closest('form').attr('action') + "/search_all:other_lead_search"+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
					search_url_search_result = $("#ContactLeadsMainForm").attr('action') + "/search_all:other_lead_search"+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
					search_url_search_data = {search_str:$("#ContactSearchAll2").val()};
					$("#display_table_view").hide();
					$("#display_default_view").show();

					search_all_view(search_url_search_result, search_url_search_data);

					/*
					$.ajax({
						type: "GET",
						data: {search_str:$("#ContactSearchAll2").val()},
						cache: false,
						url:  search_url_search_result,
						success: function(data){
							$("#search-result-content").html(data);
							$('.ajax-loading').addClass('hide');
						}
					});
					*/

				}else{

					$("#search-result-content").html("");
					$('.ajax-loading').removeClass('hide');
					//event.preventDefault();

					var search_url = $("#ContactLeadsMainForm").attr('action') + "/search_all2:other_lead_search"+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
					var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';



					vars = $("#ContactSearchAll2").val().split(",");
					btn_new_lead_text = "";
					$.each(vars, function(index,value) {
						single_var = value.trim().split(":");
						fieldname = single_var[0].trim();
						field_value = single_var[1].trim();
						if(fieldname == 'first_name'){
							btn_new_lead_text += field_value+" ";
							$("#ContactNsearchFirstName").val(field_value);
						}
						if(fieldname == 'last_name'){
							btn_new_lead_text += field_value+" ";
							$("#ContactNsearchLastName").val(field_value);
						}
						/*
						if(fieldname == 'mobile'){
							btn_new_lead_text += field_value+" ";
							$("#ContactNsearchMobile").val(field_value);
						}
						*/
						if(fieldname == 'phone'){
							btn_new_lead_text += field_value+" ";
							$("#ContactNsearchPhone").val(field_value);
						}
						if(fieldname == 'id'){
							$("#ContactNsearchId").val(field_value);
						}
						if(fieldname == 'email'){
							btn_new_lead_text += field_value+" ";
							$("#ContactNsearchEmail").val(field_value);
						}



					});
					$("#new_lead_selected").html( " For " + btn_new_lead_text );
					$("#lnk_add_new_lead").attr("lead-id","");

					search_url_search_result = search_url;
					search_url_search_data = {search_str:$("#ContactSearchAll2").val()+",search_type: "+search_type};
					search_all_view(search_url_search_result, search_url_search_data);
					/*
					$.ajax({
						type: "GET",
						data: search_url_search_data ,
						cache: false,
						url:  search_url_search_result,
						success: function(data){
							$("#search-result-content").html(data);
							$('.ajax-loading').addClass('hide');
						}
					});
					*/

				}

			}


			return false;
		};

		//quick search
		$("#btn-submit-search").click(function(event){

			$("#search-result-content").empty();
			$("#display_table_view").hide();
			$("#display_table_view").empty();
			$("#display_default_view").show();



			$('.ajax-loading').removeClass('hide');
			//event.preventDefault();

			//var search_url = $(this).closest('form').attr('action') + "/search_all:"+escape($("#ContactSearchAll").val())+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";

			var search_source = "";
			//console.log(search_source);
			<?php if( isset($this->request->query['search_source'])){  ?>
				var search_source = "<?php echo $this->request->query['search_source'];  ?>";
			<?php }  ?>

			search_url_search_result = $(this).closest('form').attr('action') + "/search_all:"+escape($("#ContactSearchAll").val())+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/search_source:"+search_source+"/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
			search_url_search_result = search_url_search_result + "&search=" + search_url_search_result;
			search_all_view(search_url_search_result, {});
			/*
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url_search_result,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			*/



			return false;
		});


		<?php if(  isset( $this->params->query['newleadsearch']) ){ ?>
		search_current_month = false;

		original_text = <?php echo json_encode($this->params->query['newleadsearch']); ?>;

		//console.log(original_text);

		vars = original_text.split(",");
		btn_new_lead_text = "";
		$.each(vars, function(index,value) {
			single_var = value.trim().split(":");
			fieldname = single_var[0].trim();
			field_value = single_var[1].trim();
			if(fieldname == 'search_type'){
				if(field_value == 'broad'){
					$("#ContactSearchBroad").checkbox('check');
					$("#ContactSearchExact").checkbox('uncheck');
				}else if(field_value == 'exact'){
					$("#ContactSearchExact").checkbox('check');
					$("#ContactSearchBroad").checkbox('uncheck');
				}
			}

			if(fieldname == 'first_name'){
				$("#ContactNsearchFirstName").val(field_value);
				btn_new_lead_text += field_value+" ";
			}
			if(fieldname == 'last_name'){
				$("#ContactNsearchLastName").val(field_value);
				btn_new_lead_text += field_value+" ";
			}
			/*
			if(fieldname == 'mobile'){
				$("#ContactNsearchMobile").val(field_value);
				btn_new_lead_text += field_value+" ";
			}
			*/
			if(fieldname == 'phone'){
				$("#ContactNsearchPhone").val(field_value);
				btn_new_lead_text += field_value+" ";
			}
			if(fieldname == 'id'){
				$("#ContactNsearchId").val(field_value);
			}
			if(fieldname == 'email'){
				$("#ContactNsearchEmail").val(field_value);
			}
			if(fieldname == 'sales_step'){
				$("#ContactNsearchSalesStep").val(field_value);
			}
			if(fieldname == 'status'){
				$("#ContactNsearchStatus").val(field_value);
			}
			if(fieldname == 'search_quick_lead'){
				$("#ContactNsearchQuickLead").val(field_value);
			}
			/*
			if(fieldname == 'search_vehicle'){
				$("#ContactNsearchVehicle").val(field_value);
			}
			*/
			if(fieldname == 'category'){
				$("#ContactNsearchCategory").val(field_value);
			}
			if(fieldname == 'type'){
				$("#ContactNsearchType").val(field_value);
			}
			if(fieldname == 'make'){
				$("#ContactNsearchMake").val(field_value);
			}
			if(fieldname == 'year'){
				$("#ContactNsearchYear").val(field_value);
			}
			if(fieldname == 'model'){
				$("#ContactNsearchModel").val(field_value);
			}
			if(fieldname == 'model_id'){
				$("#ContactNsearchModelId").val(field_value);
			}
			if(fieldname == 'condition'){
				$("#ContactNsearchCondition").val(field_value);
			}
			if(fieldname == 'searchrange'){
				$("#ContactSearchRange").val(field_value);
			}
			if(fieldname == 'vehicle_type'){
				$("#ContactSearchVehicleType").val(field_value);
			}
			if(fieldname == 'vin'){
				$("#ContactNsearchVin").val(field_value);
			}
			if(fieldname == 'stock_num'){
				$("#ContactNsearchStockNum").val(field_value);
			}
			if(fieldname == 'unit_color'){
				$("#ContactNsearchUnitColor").val(field_value);
			}

			if(fieldname == 'est_payment_search'){
				$("#ContactNsearchEstPaymentSearch").val(field_value);
			}

			//if(fieldname == 'vehicle_selection_type'){
			//	$('#vehicle_selection_type_container_nsearch input:radio[value="'+field_value+'"]').attr('checked', 'checked');
			//}

		});


		$("#new_lead_selected").html( " For " + btn_new_lead_text );
		$("#ContactSearchAll2").val(  original_text.substring(0,original_text.length - 20)   );

		if(btn_new_lead_text != ''){
			$("#btn-other_lead-search").show();
		}

		//$("#btn-other_lead-search").trigger("click");
		refresh_new_lead();

		<?php } ?>



		<?php if(isset($this->params->query['search_status'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchStatus").val("<?php echo $this->params->query['search_status']; ?>");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>

		<?php if(isset($this->params->query['search_type'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchType").val("<?php echo $this->params->query['search_type']; ?>");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>

		<?php  if(isset($this->params->query['quick_lead_search']) && ( $this->params->query['quick_lead_search'] == 'overdue_events' || $this->params->query['quick_lead_search'] == 'events') ){ ?>
			search_current_month = false;

			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');

			//var search_url = $(this).closest('form').attr('action') + "/search_all:"+escape($("#ContactSearchAll").val())+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/?stat_type=<?php echo $this->params->query['stat_type']; ?>";
			//var search_url = "/contacts/search_result/load_first/search_all2:<?php echo $this->params->query['quick_lead_search']; ?>/search_all:<?php echo $this->params->query['quick_lead_search']; ?>/search_all_value:/selected_lead_type:/?stat_type=Dealer&start=<?php echo $this->params->query['start']; ?>";
			search_url_search_result = "/contacts/search_result/load_first/search_all2:<?php echo $this->params->query['quick_lead_search']; ?>/search_all:<?php echo $this->params->query['quick_lead_search']; ?>/search_all_value:/selected_lead_type:/?stat_type=Dealer&start=<?php echo $this->params->query['start']; ?>&users=<?php echo $this->params->query['users']; ?>";
			search_url_search_data = {};

			search_all_view(search_url_search_result, search_url_search_data);
			/*
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url_search_result,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			*/
			return false;

		<?php  }else if( isset($this->params->query['quick_lead_search']) &&  $this->params->query['quick_lead_search'] == 'popup_stat' ){ ?>
			search_current_month = false;
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');

			search_url_search_result = "/contacts/search_result/load_first/search_all2:<?php echo $this->params->query['quick_lead_search']; ?>/search_all:<?php echo $this->params->query['quick_lead_search']; ?>/report_type:<?php echo $this->params->query['report_type']; ?>/selected_lead_type:/?stat_type=<?php echo $this->params->query['stat_type']; ?>&range=<?php echo $this->params->query['range']; ?>";
			search_url_search_data = {};

			search_all_view(search_url_search_result, search_url_search_data);




		<?php  }else if(isset($this->params->query['quick_lead_search'])){ ?>
		search_current_month = false;
		found_in_quicksearch = $('#ContactSearchAll option[value="<?php echo str_replace("'","\'", $this->params->query['quick_lead_search']); ?>"]');
		if(found_in_quicksearch.length != 0){
			$("#lead_details_content").html("&nbsp;")
			$("#ContactSearchAll").val("<?php echo $this->params->query['quick_lead_search']; ?>");
			$("#btn-submit-search").trigger('click');
		}else{
			display_pending_notpending("<?php echo $this->params->query['quick_lead_search']; ?>");
		}
		<?php } ?>


		<?php if(isset($this->params->query['mainsearch'])){ ?>
		search_current_month = false;
		$("#ContactSearchPhone").val("<?php echo $this->params->query['search_phone']; ?>");
		$("#ContactSearchMobile").val("<?php echo $this->params->query['search_mobile']; ?>");
		$("#ContactSearchFirstName").val("<?php echo $this->params->query['search_first_name']; ?>");
		$("#ContactSearchLastName").val("<?php echo $this->params->query['search_last_name']; ?>");



		$("#ContactNsearchPhone").val("<?php echo $this->params->query['search_phone']; ?>");
	//	$("#ContactNsearchMobile").val("<?php echo $this->params->query['search_mobile']; ?>");
		$("#ContactNsearchFirstName").val("<?php echo $this->params->query['search_first_name']; ?>");
		$("#ContactNsearchLastName").val("<?php echo $this->params->query['search_last_name']; ?>");
		$("#ContactNsearchId").val("<?php echo $this->params->query['search_id']; ?>");

		$("#ContactNsearchPriceRange").val("<?php echo $this->params->query['price_range']; ?>");
		$("#ContactNsearchTradePriceRange").val("<?php echo $this->params->query['trade_price_range']; ?>");


		$("#ContactNsearchFloorPlans").val("<?php echo $this->params->query['floor_plans']; ?>");
		$("#ContactNsearchLength").val("<?php echo $this->params->query['length']; ?>");
		$("#ContactNsearchWeight").val("<?php echo $this->params->query['weight']; ?>");
		$("#ContactNsearchSleeps").val("<?php echo $this->params->query['sleeps']; ?>");
		$("#ContactNsearchFuelType").val("<?php echo $this->params->query['fuel_type']; ?>");





		//var search_url = "/contacts/search_result/load_first/search_type:<?php echo $this->params->named['search_type']; ?>/search_all2:new_lead_search/search_all:new_lead_search/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
		search_url_search_result = "/contacts/search_result/load_first/search_type:<?php echo $this->params->named['search_type']; ?>/search_all2:new_lead_search/search_all:new_lead_search/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
		search_url_search_data = {};
		$.ajax({
			type: "GET",
			cache: false,
			data:{phone: $("#ContactNsearchPhone").val(), first_name:$("#ContactNsearchFirstName").val(), last_name : $("#ContactNsearchLastName").val(), id : $("#ContactNsearchId").val(),      },
			url:  search_url_search_result,
			success: function(data){
				$("#search-result-content").html(data);
				$("#start_new_lead").show();
			}
		});

		<?php } ?>



		//load todays leads if search and viwe area is empty
		if( $("#lead_details_content").html() == "" && $("#search-result-content").html() == "" && search_current_month == true){


			var search_source = "";
			//console.log(search_source);
			<?php if( isset($this->request->query['search_source'])){  ?>
				var search_source = "<?php echo $this->request->query['search_source'];  ?>";
			<?php }  ?>

			$('.ajax-loading').removeClass('hide');
			search_url_search_result = "/contacts/search_result/load_first/selected_lead_type:<?php echo $selected_lead_type; ?>/search_source:"+search_source+"/?search_current_month=123";

			search_url_search_data = {};

			setTimeout(function(){

				search_all_view(search_url_search_result, search_url_search_data);

			}, 1000);




			/*
			$.ajax({
				type: "GET",
				cache: false,
				url: search_url_search_result ,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			*/
		}

	$("#start_new_lead").click(function(e){

		e.preventDefault();
		lead_id=$.trim($(this).attr('lead-id'));
		if(lead_id!='')
		{
			location.href = "/contacts/leads_input?new_lead_contact="+lead_id;
		}else
		{
		location.href = "/contacts/leads_input/<?php echo (!empty($selected_lead_type))? "selected_lead_type:".$selected_lead_type."/" : "" ?>?search_phone="+escape($("#ContactNsearchPhone").val())+"&search_first_name="+escape($("#ContactNsearchFirstName").val())+"&search_last_name="+escape($("#ContactNsearchLastName").val())+"&mainsearch=0";
	}
	});




	$("#submit_new_lead_search").click(function(){
		/*
		if( $("#ContactNsearchMobile").val().trim() != '' && !validatePhone('ContactNsearchMobile') ){
			alert('Please enter a valid cell number');
			return false;
		}
		if( $("#ContactNsearchPhone").val().trim() != '' && !validatePhone('ContactNsearchPhone') ){
			alert('Please enter a valid phone number');
			return false;
		}
		if( $("#ContactNsearchFirstName").val().trim() != '' && validatePhone('ContactNsearchFirstName') ){
			alert('Please enter phone number in cell/mobile field');
			return false;
		}
		if( $("#ContactNsearchLastName").val().trim() != '' && validatePhone('ContactNsearchLastName') ){
			alert('Please enter phone number in cell/mobile field');
			return false;
		}
		*/

		var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';

		if(

				$("#ContactNsearchEmail").val().trim().search('@') >= 0  ||
			/*	$("#ContactNsearchQuick").val().trim() != '' || */
			//	$("#ContactNsearchMobile").val().trim() != '' ||

				$("#ContactNsearchPhone").val().trim().length >= 3 ||
				$("#ContactNsearchFirstName").val().trim().length > 1  ||
				$("#ContactNsearchLastName").val().trim().length > 1   ||


				$("#ContactNsearchId").val().trim() != ''  ||


				$("#ContactNsearchSalesStep").val().trim() != '' ||
				$("#ContactNsearchStatus").val().trim() != '' ||
				$("#ContactNsearchQuickLead").val().trim() != ''   ||

				//$("#ContactNsearchVehicle").val().trim() != ''  ||

				$("#ContactNsearchCategory").val().trim() != ''  ||
				$("#ContactNsearchType").val().trim() != ''  ||
				$("#ContactNsearchMake").val().trim() != ''  ||
				$("#ContactNsearchYear").val().trim() != ''  ||
				$("#ContactNsearchModelId").val().trim() != ''  ||
				$("#ContactNsearchModel").val().trim() != ''  ||
				$("#ContactNsearchCondition").val().trim() != ''  ||

				$("#ContactNsearchEstPaymentSearch").val().trim() != ''  ||

				$("#ContactNsearchVin").val().trim() != ''  ||
				$("#ContactNsearchStockNum").val().trim() != ''  ||
				$("#ContactNsearchUnitColor").val().trim() != ''  ||

				<?php if($d_type != 'RV'){ ?>
				 $("#ContactNsearchPriceRange").val().trim() != '' ||
				 $("#ContactNsearchTradePriceRange").val().trim() != ''
				<?php } ?>

				<?php if($d_type == 'RV'){ ?>
				 $("#ContactNsearchPriceRange").val().trim() != '' ||
				 $("#ContactNsearchTradePriceRange").val().trim() != '' ||
				 $("#ContactNsearchFloorPlans").val().trim() != '' ||
				 $("#ContactNsearchLength").val().trim() != '' ||
				 $("#ContactNsearchWeight").val().trim() != '' ||
				 $("#ContactNsearchSleeps").val().trim() != '' ||
				 $("#ContactNsearchFuelType").val().trim() != ''
				<?php } ?>


					){

			/*set new lead button text*/
			btn_new_lead_text = "";
			if( $("#ContactNsearchFirstName").val().trim() != ''){
				btn_new_lead_text += $("#ContactNsearchFirstName").val()+" ";
			}
			if( $("#ContactNsearchLastName").val().trim() != ''){
				btn_new_lead_text += $("#ContactNsearchLastName").val()+" ";
			}
			/*
			if( $("#ContactNsearchMobile").val().trim() != ''){
				btn_new_lead_text += $("#ContactNsearchMobile").val()+" ";
			}
			*/
			if( $("#ContactNsearchPhone").val().trim() != ''){
				btn_new_lead_text += $("#ContactNsearchPhone").val()+" ";
			}
			$("#new_lead_selected").html( " For " + btn_new_lead_text );


			$("#search-result-content").html("");
			//$('.ajax-loading').removeClass('hide');
			var search_url = "/contacts/search_result_new_lead/allow_shopper:<?php echo $allow_shopper; ?>/";
			$.ajax({
				type: "GET",
				cache: false,
				data:{'search_type': search_type,
				/* quick: $("#ContactNsearchQuick").val().trim(), */
				email: $("#ContactNsearchEmail").val().trim(),      phone: $("#ContactNsearchPhone").val().trim(), first_name:$("#ContactNsearchFirstName").val().trim(), last_name : $("#ContactNsearchLastName").val().trim(), id : $("#ContactNsearchId").val().trim(),


				sales_step: $("#ContactNsearchSalesStep").val().trim(),
				status: $("#ContactNsearchStatus").val().trim(),
				search_quick_lead: $("#ContactNsearchQuickLead").val().trim(),
				//search_vehicle: $("#ContactNsearchVehicle").val().trim(),

				category: $("#ContactNsearchCategory").val().trim(),
				type: $("#ContactNsearchType").val().trim(),
				make: $("#ContactNsearchMake").val().trim(),
				year: $("#ContactNsearchYear").val().trim(),
				model: $("#ContactNsearchModel").val().trim(),
				condition: $("#ContactNsearchCondition").val().trim(),
				searchrange: $("#ContactSearchRange").val().trim(),

				vehicle_type: $("#ContactSearchVehicleType").val(),
				vin: $("#ContactNsearchVin").val().trim(),
				stock_num: $("#ContactNsearchStockNum").val().trim(),
				unit_color: $("#ContactNsearchUnitColor").val().trim(),

				est_payment_search: $("#ContactNsearchEstPaymentSearch").val(),


				<?php if($d_type != 'RV'){ ?>
					price_range: $("#ContactNsearchPriceRange").val().trim(),
					trade_price_range: $("#ContactNsearchTradePriceRange").val().trim()
				<?php } ?>

				<?php if($d_type == 'RV'){ ?>
					price_range: $("#ContactNsearchPriceRange").val().trim(),
					trade_price_range: $("#ContactNsearchTradePriceRange").val().trim(),
					floor_plans: $("#ContactNsearchFloorPlans").val().trim(),
					length: $("#ContactNsearchLength").val().trim(),
					weight: $("#ContactNsearchWeight").val().trim(),
					sleeps: $("#ContactNsearchSleeps").val().trim(),
					fuel_type: $("#ContactNsearchFuelType").val().trim()
				<?php } ?>


				  },
				url:  search_url,
				dataType: "json",
				success: function(data){

					if( data.result == '0'){


						if(
							$("#ContactNsearchEmail").val().trim() == '' &&
							$("#ContactNsearchPhone").val().trim() == '' &&
							$("#ContactNsearchFirstName").val().trim() == '' &&
							$("#ContactNsearchLastName").val().trim() == ''
						){
							$("#ContactNsearchPhone").focus();
							alert('NO LEAD FOUND - \nPlease fill in at least one item below! \nAll Phone, Email, First Name or Last Name.');

						}else{


							location.href = "/contacts/leads_input/<?php echo (!empty($selected_lead_type))? "selected_lead_type:".$selected_lead_type."/" : "" ?>?search_phone="+escape($("#ContactNsearchPhone").val())+"&search_first_name="+escape($("#ContactNsearchFirstName").val())+"&search_last_name="+escape($("#ContactNsearchLastName").val())+"&search_email="+escape($("#ContactNsearchEmail").val()) +"&mainsearch=0";

						}



					}else{

						$("#close_modal").trigger('click');

						//console.log('sdfdf');
						src_str = "";
						/*
						if( $("#ContactNsearchQuick").val().trim() != ''){
							src_str += "quick: "+$("#ContactNsearchQuick").val()+", ";
						}

						if( $("#ContactNsearchMobile").val().trim() != ''){
							src_str += "mobile: "+$("#ContactNsearchMobile").val()+", ";
						}
						*/

						/*
						sales_step: $("#ContactNsearchSalesStep").val().trim(),
						status: $("#ContactNsearchStatus").val().trim(),
						search_quick_lead: $("#ContactNsearchQuickLead").val().trim(),
						search_vehicle: $("#ContactNsearchVehicle").val().trim(),
						*/

						if( $("#ContactNsearchSalesStep").val().trim() != ''){
							src_str += "sales_step: "+$("#ContactNsearchSalesStep").val()+", ";
						}
						if( $("#ContactNsearchStatus").val().trim() != ''){
							src_str += "status: "+$("#ContactNsearchStatus").val()+", ";
						}
						if( $("#ContactNsearchQuickLead").val().trim() != ''){
							src_str += "search_quick_lead: "+$("#ContactNsearchQuickLead").val()+", ";
						}
						/*
						if( $("#ContactNsearchVehicle").val().trim() != ''){
							src_str += "search_vehicle: "+$("#ContactNsearchVehicle").val()+", ";
						}
						*/

						if( $("#ContactNsearchPhone").val().trim() != ''){
							src_str += "phone: "+$("#ContactNsearchPhone").val()+", ";
						}
						if( $("#ContactNsearchFirstName").val().trim() != ''){
							src_str += "first_name: "+$("#ContactNsearchFirstName").val()+", ";
						}
						if( $("#ContactNsearchLastName").val().trim() != ''){
							src_str += "last_name: "+$("#ContactNsearchLastName").val()+", ";
						}


						if( $("#ContactNsearchEmail").val().trim() != ''){
							src_str += "email: "+$("#ContactNsearchEmail").val()+", ";
						}
						if( $("#ContactNsearchId").val().trim() != ''){
							src_str += "id: "+$("#ContactNsearchId").val()+", ";
						}


						if( $("#ContactNsearchEstPaymentSearch").val().trim() != ''){
							src_str += "est_payment_search: "+$("#ContactNsearchEstPaymentSearch").val()+", ";
						}

						if( $("#ContactNsearchPriceRange").val().trim() != ''){
							src_str += "price_range: "+$("#ContactNsearchPriceRange").val()+", ";
						}
						if( $("#ContactNsearchTradePriceRange").val().trim() != ''){
							src_str += "trade_price_range: "+$("#ContactNsearchTradePriceRange").val()+", ";
						}

						<?php if($d_type == 'RV'){ ?>

						if( $("#ContactNsearchFloorPlans").val().trim() != ''){
							src_str += "floor_plans: "+$("#ContactNsearchFloorPlans").val()+", ";
						}
						if( $("#ContactNsearchLength").val().trim() != ''){
							src_str += "length: "+$("#ContactNsearchLength").val()+", ";
						}
						if( $("#ContactNsearchWeight").val().trim() != ''){
							src_str += "weight: "+$("#ContactNsearchWeight").val()+", ";
						}
						if( $("#ContactNsearchSleeps").val().trim() != ''){
							src_str += "sleeps: "+$("#ContactNsearchSleeps").val()+", ";
						}
						if( $("#ContactNsearchFuelType").val().trim() != ''){
							src_str += "fuel_type: "+$("#ContactNsearchFuelType").val()+", ";
						}
						<?php } ?>







						if( $("#ContactNsearchCategory").val().trim() != ''){
							src_str += "category: "+$("#ContactNsearchCategory").val()+", ";
						}
						if( $("#ContactNsearchType").val().trim() != ''){
							src_str += "type: "+$("#ContactNsearchType").val()+", ";
						}
						if( $("#ContactNsearchMake").val().trim() != ''){
							src_str += "make: "+$("#ContactNsearchMake").val()+", ";
						}
						if( $("#ContactNsearchYear").val().trim() != ''){
							src_str += "year: "+$("#ContactNsearchYear").val()+", ";
						}
						if( $("#ContactNsearchModel").val().trim() != ''){
							src_str += "model: "+$("#ContactNsearchModel").val()+", ";
						}
						if( $("#ContactNsearchCondition").val().trim() != ''){
							src_str += "condition: "+$("#ContactNsearchCondition").val()+", ";
						}

						src_str += "searchrange: "+$("#ContactSearchRange").val()+", ";
						src_str += "vehicle_type: "+$("#ContactSearchVehicleType").val()+", ";

						if( $("#ContactNsearchVin").val().trim() != ''){
							src_str += "vin: "+$("#ContactNsearchVin").val()+", ";
						}
						if( $("#ContactNsearchStockNum").val().trim() != ''){
							src_str += "stock_num: "+$("#ContactNsearchStockNum").val()+", ";
						}
						if( $("#ContactNsearchUnitColor").val().trim() != ''){
							src_str += "unit_color: "+$("#ContactNsearchUnitColor").val()+", ";
						}


						//console.log(src_str);
						src_str = src_str.substring(0,src_str.length - 2);


						//src_str += "search_type: "+search_type;
						$("#ContactSearchAll2").val(src_str);
						//$("#btn-other_lead-search").trigger("click");
						refresh_new_lead();
						//location.href = "/contacts/leads_main/search_all:new_lead_search/search_type:"+search_type+"/?search_mobile="+escape($("#ContactNsearchMobile").val())+"&search_phone="+escape($("#ContactNsearchPhone").val())+"&search_first_name="+escape($("#ContactNsearchFirstName").val())+"&search_last_name="+escape($("#ContactNsearchLastName").val())  +"&search_id="+escape($("#ContactNsearchId").val())             +"&mainsearch=found";
					}
				}
			});

		}else{
			alert("Narrow your search");
		}


		return false;
	});

	//inventory search tool
	$.inventory({
		input_type: "#ContactSearchCategory",
		input_category:"#ContactSearchType",
		input_make:"#ContactSearchMake",
		btn_edit_make:'#btn_make_edit_trade',
		input_year:"#ContactSearchYear",
		input_yearedit:"#btn_year_edit",

	 	input_model_id:"#ContactSearchModelId",
		input_model:"#ContactSearchModel",
		input_class:"#ContactSearchClass",
		btn_edit_model:"#btn_models_edit",

		input_unitColor_id:"#ContactSearchUnitColor",
		input_unitColor_fieldname:"search_unit_color",
		input_edit_make_id : 'ContactSearchMake',
		input_edit_make_fieldname : 'search_make',
		//vehicle_selection_type_container: "#vehicle_selection_type_container_search"
	});



	$.inventory({
		edit_mode: "yes",
		input_type: "#ContactNsearchCategory",
		input_category:"#ContactNsearchType",
		input_make:"#ContactNsearchMake",
		btn_edit_make:'#btn_make_edit_trade_nsearch',

		input_year:"#ContactNsearchYear",
		input_yearedit:"#btn_year_editnn",

	 	input_model_id:"#ContactNsearchModelId",
		input_model:"#ContactNsearchModel",
		btn_edit_model:"#btn_models_edit_nn",
		input_unitColor_id:"#ContactNsearchUnitColor",
		input_unitColor_fieldname:"nsearch_unit_color",
		input_edit_make_id : 'ContactNsearchMake',
		input_edit_make_fieldname : 'nsearch_make',
		//vehicle_selection_type_container: "#vehicle_selection_type_container_nsearch"
	});







	if(window.table_view_on == true){
		$("#toggle_search_view").attr('data-original-title','Detail View');
		$("#toggle_search_view").attr('class','btn glyphicons more_windows');

	}else{
		$("#toggle_search_view").attr('data-original-title','Table View');
		$("#toggle_search_view").attr('class','btn glyphicons starts-btn display');
	}



	$("#toggle_search_view").click(function(){
		//console.log(search_url_search_result);
		//display_table_view

		if(window.table_view_on == false){

			$("#toggle_search_view").attr('data-original-title','Detail View');
			$("#toggle_search_view").attr('class','btn glyphicons more_windows');


			var view_type_obj = {'view_type':'table_view'};
			var tmpobj = {};
			var search_url_obj = {"search":search_url_search_result};
			$.extend(tmpobj, search_url_search_data, view_type_obj, search_url_obj);

			$.ajax({
				type: "GET",
				cache: false,
				url: search_url_search_result,
				data: tmpobj,
				success: function(data){
					$("#display_table_view").show();

					$("#display_default_view").hide();
					$("#search-result-content").empty();
					$("#lead_details_content").empty();


					$("#display_table_view").html(data);
					window.table_view_on = true;
				}
			});

		}else{
			$("#toggle_search_view").attr('data-original-title','Table View');
			$("#toggle_search_view").attr('class','btn glyphicons display');

			$("#display_table_view").hide();
			$("#display_table_view").empty();

			$.ajax({
				type: "GET",
				cache: false,
				data: search_url_search_data,
				url: search_url_search_result,
				success: function(data){
					$("#display_default_view").show();
					$("#search-result-content").html(data);
					window.table_view_on = false;
				}
			});
		}


	});





	$(document).on("click",".btn_show_hide_history_otherlocation",function() {
        contact_id = $(this).attr('data-contact-id');
		//console.log(contact_id);
		if($("#history_otherloc_container_"+contact_id).html() == '&nbsp;'){
			$("#history_otherloc_"+contact_id).show();
			$.ajax({
				url: "/contacts_manage/load_history_other/"+contact_id,
				type: "get",
				cache: false,
				success: function(results){
					$("#history_otherloc_container_"+contact_id).html(results);
				}
			});
		}else{
			$("#history_otherloc_"+contact_id).show();
		}
    });




		$.fn.modal.Constructor.prototype.enforceFocus = function() {
			modal_this = this
			$(document).on('focusin.modal', function (e) {
				if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
				&& !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
					modal_this.$element.focus()
				}
			})
		};


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
