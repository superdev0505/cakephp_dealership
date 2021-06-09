</br>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
if(empty($this->request->data['Deal']['payment_option1']))
{
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}
}else
{
	$selected_months=array('1'=>$this->request->data['Deal']['payment_option1'],2=>$this->request->data['Deal']['payment_option2'],3=>$this->request->data['Deal']['payment_option3'],4=>$this->request->data['Deal']['payment_option4']);
}


?>
<?php //pr($this->data); die;
$dealer = AuthComponent::user('dealer');
// echo $dealer;
$cid = AuthComponent::user('dealer_id');
// echo $cid;
$sperson = AuthComponent::user('full_name');
// echo $sperson;
$zone = AuthComponent::user('zone');
//echo $zone;

$id = $contact_info['Contact']['id'];
//$cid = $contact_info['Contact']['company_id'];
//$dealer = $contact_info['Contact']['company'];
$fname = $contact_info['Contact']['first_name'];
$lname = $contact_info['Contact']['last_name'];
$address = $contact_info['Contact']['address'];
$city = $contact_info['Contact']['city'];
$state = $contact_info['Contact']['state'];
$zip = $contact_info['Contact']['zip'];
$phone = $contact_info['Contact']['phone'];
$mobile = $contact_info['Contact']['mobile'];
$email = $contact_info['Contact']['email'];
$gender = $contact_info['Contact']['gender'];

$category = $contact_info['Contact']['category'];
$unitvalue = $contact_info['Contact']['unit_value'];
$condition = $contact_info['Contact']['condition'];
$year = $contact_info['Contact']['year'];
$class = $contact_info['Contact']['class'];

$make = $contact_info['Contact']['make'];

$model_id = $contact_info['Contact']['model_id'];
$model = $contact_info['Contact']['model'];
$type = $contact_info['Contact']['type'];
$vin = $contact_info['Contact']['vin'];
$miles = $contact_info['Contact']['odometer'];
$color = $contact_info['Contact']['unit_color'];
$stocknum = $contact_info['Contact']['stock_num'];

$tradevalue = $contact_info['Contact']['trade_value'];
$conditiont = $contact_info['Contact']['condition_trade'];
$yeart = $contact_info['Contact']['year_trade'];
$maket = $contact_info['Contact']['make_trade'];
$modelt = $contact_info['Contact']['model_trade'];
$model_id_trade = $contact_info['Contact']['model_id_trade'];

$category_trade  = $contact_info['Contact']['category_trade'];
$class_trade  = $contact_info['Contact']['class_trade'];

$typet = $contact_info['Contact']['type_trade'];
$vint = $contact_info['Contact']['vin_trade'];
$milest = $contact_info['Contact']['odometer_trade'];
$colort = $contact_info['Contact']['usedunit_color'];
$stocknumt = $contact_info['Contact']['stock_num_trade'];
$status = $contact_info['Contact']['status'];
$source = $contact_info['Contact']['source'];

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;

$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeshort = date('mdY');
//echo $datetimeshort;

$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeslash = date('m/d/Y');
//echo $datetimeslash;

$date = new DateTime();
date_default_timezone_set($timezone);
$datetimetext = date('Y-m-d H:i:s');
//echo $datetimetext;

$date = new DateTime();
date_default_timezone_set($timezone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;
$years=array('1'=>'1',
			 '2'=>'2',
			 '3'=>'3',
			 '4'=>'4',
			 '5'=>'5',
			 '6'=>'6',
			 '7'=>'7',
			 '8'=>'8',
			 '9'=>'9',
			 '10'=>'10',
			 '11'=>'11',
			 '12'=>'12',
			 '13'=>'13',
			 '14'=>'14',
			 '15'=>'15',
			 '16'=>'16',
			 '17'=>'17',
			 '18'=>'18',
			 '19'=>'19',
			 '20'=>'20',
			 );

?>
<br />
<br />
<br />
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head">
						<ul>
							<li class="active"><a href="#tab1-1" class="glyphicons user" data-toggle="tab"><i></i>Buyer</a></li>
							<li><a href="#tab2-1" class="glyphicons user" data-toggle="tab"><i></i>Buyer Pg2</a></li>
							<li><a href="#tab3-1" class="glyphicons user" data-toggle="tab"><i></i>Co-buyer</a></li>
							<li><a href="#tab4-1" class="glyphicons user" data-toggle="tab"><i></i>Co-buyer Pg2</a></li>
							<li><a href="#tab5-1" class="glyphicons group" data-toggle="tab"><i></i>(3) Ref</a></li>
							<li><a href="#tab6-1" class="glyphicons notes" data-toggle="tab"><i></i>Vechicle Info</a></li>
							<li><a href="#tab7-1" class="glyphicons notes" data-toggle="tab"><i></i>Fees</a></li>
							<li><a href="#tab9-1" class="glyphicons notes" data-toggle="tab"><i></i>Fees Pg2</a></li>
							<li><a href="#tab8-1" class="glyphicons calendar" data-toggle="tab"><i></i>History</a></li>
							<li><a href="#tab10-1" class="glyphicons notes" data-toggle="tab"><i></i>Notes</a></li>
						</ul>
					</div>
					<div class="widget-body">
						<?php echo $this->Form->create('Deal', array('class' => 'form-inline apply-nolazy')); ?>
						<input type="hidden"  id="inputTitle" class="col-md-6 form-control" value="123" />

						<div class="tab-content">
							<!-- // Buyer Pg1 START -->
							<div class="tab-pane active" id="tab1-1">
								<div class="row">
									<div class="col-md-3">

										<?php echo $this->Form->label('suffix','Suffix:', array('class'=>'strong')); ?> <?php echo $this->Form->input('suffix', array('type' => 'select', 'options' => array(
										'Jr' => 'Jr',
										'Sr' => 'Sr',
										'II' => 'II',
										'III' => 'III',
										'IV' => 'IV'
										), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										 <?php echo $this->Form->label('first_name','First Name:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('first_name', array('type' => 'text', 'value'=>$fname, 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<?php echo $this->Form->input('middle_name', array('type' => 'text','label'=>'Middle Name:','div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('last_name','Last Name:'); ?>
										<?php echo $this->Form->input('last_name', array('type' => 'text','value'=>$lname, 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('address','Address:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('address', array('type' => 'text','value'=>$address,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('city','City:'); ?>
										<?php echo $this->Form->input('city', array('type' => 'text', 'value'=>$city, 'label'=>false,'div'=>false,  'class' => 'col-md-1 form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<?php echo $this->Form->label('state','State:', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('state', array('type' => 'select',  'value'=>$state,
										'options' => array(
										'AL' => 'AL',
										'AK' => 'AK',
										'AZ' => 'AZ',
										'AR' => 'AR',
										'CA' => 'CA',
										'CO' => 'CO',
										'CT' => 'CT',
										'DE' => 'DE',
										'FL' => 'FL',
										'GA' => 'GA',
										'HI' => 'HI',
										'ID' => 'ID',
										'IL' => 'IL',
										'IN' => 'IN',
										'IA' => 'IA',
										'KS' => 'KS',
										'KY' => 'KY',
										'LA' => 'LA',
										'ME' => 'ME',
										'MD' => 'MD',
										'MA' => 'MA',
										'MI' => 'MI',
										'MN' => 'MN',
										'MS' => 'MS',
										'MO' => 'MO',
										'MT' => 'MT',
										'NE' => 'NE',
										'NV' => 'NV',
										'NH' => 'NH',
										'NJ' => 'NJ',
										'NM' => 'NM',
										'NY' => 'NY',
										'NC' => 'NC',
										'ND' => 'ND',
										'OH' => 'OH',
										'OK' => 'OK',
										'OR' => 'OR',
										'PA' => 'PA',
										'RI' => 'RI',
										'SC' => 'SC',
										'SD' => 'SD',
										'TN' => 'TN',
										'TX' => 'TX',
										'UT' => 'UT',
										'VT' => 'VT',
										'VA' => 'VA',
										'WA' => 'WA',
										'WV' => 'WV',
										'WI' => 'WI',
										'WY' => 'WY',
										'AS' => 'AS',
										'DC' => 'DC',
										'PR' => 'PR',
										'VI' => 'VI'
										), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<?php echo $this->Form->label('zip','Zip:'); ?>
										<?php echo $this->Form->input('zip', array('type' => 'text', 'value'=>$zip, 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<?php echo $this->Form->label('gender','Gender:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('gender', array('type' => 'select', 'options' => array(
										'Male' => 'Male',
										'Female' => 'Female'
										), 'empty' => 'Select', 'value'=>$gender, 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('phone','Phone:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('phone', array('type' => 'text','value'=>$phone,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('mobile','Cell:'); ?>
											<?php echo $this->Form->input('mobile', array('type' => 'text','value'=>$mobile,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator bottom"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('email','Email:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('email', array('type' => 'text','value'=>$email,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('driver_lic','Driver Lic:', array('class'=>'strong')); ?> <?php echo $this->Form->input('driver_lic', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('driver_lic_exp','Driver Lic Exp:', array('class'=>'strong')); ?> <?php echo $this->Form->input('driver_lic_exp', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'mm/dd/yyyy')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('ss_num','Social Secuirty#', array('class'=>'strong')); ?> <?php echo $this->Form->input('ss_num', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'_ _ _ -_ _ -_ _ _ _')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('dob','DOB:'); ?> <?php echo $this->Form->input('dob', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'mm/dd/yyyy')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('address2','Address (2)'); ?> <?php echo $this->Form->input('address2', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('city2','City (2)'); ?> <?php echo $this->Form->input('city2', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('state2','State (2)', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('state2', array('type' => 'select',
'options' => array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'
), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('zip2','Zip (2)'); ?> <?php echo $this->Form->input('zip2', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Buyer Pg1 END -->

							<!-- // Buyer Pg2 START -->
							<div class="tab-pane" id="tab2-1">
								<div class="row">
									<div class="col-md-3">  <?php echo $this->Form->label('residence_status','Residence Status:', array('class'=>'strong')); ?> <?php echo $this->Form->input('residence_status', array('type' => 'select', 'options' => array(
'Own' => 'Own',
'Rent' => 'Rent',
'Lease' => 'Lease',
'Parents' => 'Parents',
'Relatives' => 'Relatives',
'Other' => 'Other'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('mortgage_month_amount','Mortgage Month Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('mortgage_month_amount', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('apt_num','Apt Num#'); ?> <?php echo $this->Form->input('apt_num', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('residence_length','Residence Length:', array('class'=>'strong')); ?> <?php echo $this->Form->input('residence_length', array('type' => 'select', 'options' => $options_1_20, 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('retired_status','Are you retired?'); ?> <?php echo $this->Form->input('retired_status', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('income_yearly','Income Yearly:', array('class'=>'strong')); ?> <?php echo $this->Form->input('income_yearly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('income_monthly','Income Monthly:'); ?> <?php echo $this->Form->input('income_monthly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('main_job','Main Occupation:', array('class'=>'strong')); ?> <?php echo $this->Form->input('main_job', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('employer','Main Employer:', array('class'=>'strong')); ?> <?php echo $this->Form->input('employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('job_length','Job Length:'); ?> <?php echo $this->Form->input('job_length', array('type' => 'select', 'options' => $years, 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator bottom"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('work_phone','Work Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('work_phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('previous_employer','Previous Employer:', array('class'=>'strong')); ?> <?php echo $this->Form->input('previous_employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('previous_employer_length','Previous Job Length', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('previous_employer_length', array('type' => 'select', 'options' => $years, 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('previous_employer_number','Previous Work#', array('class'=>'strong')); ?> <?php echo $this->Form->input('previous_employer_number', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('other_income','Other Income:'); ?> <?php echo $this->Form->input('other_income', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('other_employer','Other Employer:'); ?> <?php echo $this->Form->input('other_employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('other_yearly','Other Yearly:'); ?> <?php echo $this->Form->input('other_yearly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('other_monthly','Other Monthly:', array('class'=>'strong')); ?> <?php echo $this->Form->input('other_monthly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('sperson','Sales Person'); ?> <?php echo $this->Form->input('sperson', array('type' => 'text','label'=>false,'div'=>false,'disabled' => 'true','class' => 'form-control','value'=>$sperson)); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Buyer Pg2 END -->

							<!-- // Buyer Pg3 START -->
							<div class="tab-pane" id="tab3-1">
								<div class="row">
									<div class="col-md-3">  <?php echo $this->Form->label('co_suffix','Co-Suffix:', array('class'=>'strong')); ?> <?php echo $this->Form->input('co_suffix', array('type' => 'select', 'options' => array(
'Jr' => 'Jr',
'Sr' => 'Sr',
'II' => 'II',
'III' => 'III',
'IV' => 'IV'
), 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_fname','Co-First Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_fname', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_mname','Co-Middle Name:'); ?> <?php echo $this->Form->input('cobuyer_mname', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_lname','Co-Last Name:'); ?> <?php echo $this->Form->input('cobuyer_lname', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_address','Co-Address:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_address', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_city','Co-City:'); ?> <?php echo $this->Form->input('cobuyer_city', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'col-md-1 form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_state','Co-State:', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('cobuyer_state', array('type' => 'select',
'options' => array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'
), 'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_zip','Co-Zip:'); ?> <?php echo $this->Form->input('cobuyer_zip', array('type' => 'text', 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_gender','Co-Gender:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_gender', array('type' => 'select', 'options' => array(
'Male' => 'Male',
'Female' => 'Female'
), 'empty' => 'Select','label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_phone','Co-Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_mobile','Co-Cell:'); ?> <?php echo $this->Form->input('cobuyer_mobile', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator bottom"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_email','Co-Email:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_email', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_licence','Co-Driver Lic:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_licence', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_licence_exp','Co-Driver Lic Exp:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_licence_exp', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'mm/dd/yyyy')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_ssn','Co-Social Secuirty#', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_ssn', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'_ _ _ -_ _ -_ _ _ _')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_dob','Co-DOB:'); ?> <?php echo $this->Form->input('cobuyer_dob', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','placeholder'=>'mm/dd/yyyy')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('co_address','Co-Address (2)'); ?> <?php echo $this->Form->input('co_address', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('co_city','Co-City (2)'); ?> <?php echo $this->Form->input('co_city', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('co_state','Co-State (2)', array('class'=>'strong')); ?>
										<?php	echo $this->Form->input('co_state', array('type' => 'select',
										'options' => array(
										'AL' => 'AL',
										'AK' => 'AK',
										'AZ' => 'AZ',
										'AR' => 'AR',
										'CA' => 'CA',
										'CO' => 'CO',
										'CT' => 'CT',
										'DE' => 'DE',
										'FL' => 'FL',
										'GA' => 'GA',
										'HI' => 'HI',
										'ID' => 'ID',
										'IL' => 'IL',
										'IN' => 'IN',
										'IA' => 'IA',
										'KS' => 'KS',
										'KY' => 'KY',
										'LA' => 'LA',
										'ME' => 'ME',
										'MD' => 'MD',
										'MA' => 'MA',
										'MI' => 'MI',
										'MN' => 'MN',
										'MS' => 'MS',
										'MO' => 'MO',
										'MT' => 'MT',
										'NE' => 'NE',
										'NV' => 'NV',
										'NH' => 'NH',
										'NJ' => 'NJ',
										'NM' => 'NM',
										'NY' => 'NY',
										'NC' => 'NC',
										'ND' => 'ND',
										'OH' => 'OH',
										'OK' => 'OK',
										'OR' => 'OR',
										'PA' => 'PA',
										'RI' => 'RI',
										'SC' => 'SC',
										'SD' => 'SD',
										'TN' => 'TN',
										'TX' => 'TX',
										'UT' => 'UT',
										'VT' => 'VT',
										'VA' => 'VA',
										'WA' => 'WA',
										'WV' => 'WV',
										'WI' => 'WI',
										'WY' => 'WY',
										'AS' => 'AS',
										'DC' => 'DC',
										'PR' => 'PR',
										'VI' => 'VI'
										), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('co_zip','Co-Zip (2)'); ?> <?php echo $this->Form->input('co_zip', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Buyer Pg3 END -->

							<!-- // Buyer Pg4 START -->
							<div class="tab-pane" id="tab4-1">
								<div class="row">
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_residence_status','Co-Residence Status:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_residence_status', array('type' => 'select', 'options' => array(
'Own' => 'Own',
'Rent' => 'Rent',
'Lease' => 'Lease',
'Parents' => 'Parents',
'Relatives' => 'Relatives',
'Other' => 'Other'
), 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_monthly_mortgage','Co-Mortgage Month Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_monthly_mortgage', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_apt_num','Co-Apt Num#'); ?> <?php echo $this->Form->input('cobuyer_apt_num', array('type' => 'text','label'=>false,'div'=>false,  'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_residence_length','Co-Residence Length:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_residence_length', array('type' => 'select', 'options' =>  $options_1_20,'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_retired','Co-Are you retired?'); ?> <?php echo $this->Form->input('cobuyer_retired', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_income_yearly','Co-Income Yearly:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_income_yearly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_income_monthly','Co-Income Monthly:'); ?> <?php echo $this->Form->input('cobuyer_income_monthly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_main_job','Co-Main Occupation:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_main_job', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_employer','Co-Main Employer:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('cobuyer_job_length','Co-Job Length:'); ?> <?php echo $this->Form->input('cobuyer_job_length', array('type' => 'select', 'options' => $years, 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator bottom"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_work_phone','Co-Work Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_work_phone', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('co_previous_employer','Co-Previous Employer:', array('class'=>'strong')); ?> <?php echo $this->Form->input('co_previous_employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('co_previous_employer_length','Co-Previous Job Length', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('co_previous_employer_length', array('type' => 'select', 'options' => $years, 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('co_previous_employer_number','Co-Previous Work#', array('class'=>'strong')); ?> <?php echo $this->Form->input('co_previous_employer_number', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_other_income','Co-Other Income:'); ?> <?php echo $this->Form->input('cobuyer_other_income', array('type' => 'select', 'options' => array(
'Yes' => 'Yes',
'No' => 'No'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_other_employer','Co-Other Employer:'); ?> <?php echo $this->Form->input('cobuyer_other_employer', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><?php echo $this->Form->label('cobuyer_other_income_yearly','Co-Other Yearly:'); ?> <?php echo $this->Form->input('cobuyer_other_income_yearly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_other_income_monthly','Co-Other Monthly:', array('class'=>'strong')); ?> <?php echo $this->Form->input('cobuyer_other_income_monthly', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('cobuyer_relationship','Co-Buyer Relationship:', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('cobuyer_relationship', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Buyer Pg4 END -->

							<!-- // Buyer Pg5 START -->
							<div class="tab-pane" id="tab5-1">
								<div class="row">
									<div class="col-md-3">  <?php echo $this->Form->label('ref1_name','Ref #1 Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref1_name', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref1_phone','Ref #1 Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref1_phone', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref1_city','Ref #1 City:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref1_city', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref1_state','Ref #1 State:', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('ref1_state', array('type' => 'select', 'options' => array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('ref1_type','Ref #1 Type:'); ?>
										<?php
echo $this->Form->input('ref1_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref2_name','Ref #2 Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref2_name', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref2_phone','Ref #2 Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref2_phone', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref2_city','Ref #2 City:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref2_city', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref2_state','Ref #2 State:', array('class'=>'strong')); ?>
										<?php
echo $this->Form->input('ref2_state', array('type' => 'select', 'options' => array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'
), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('ref2_type','Ref #2 Type:'); ?>
										<?php echo $this->Form->input('ref2_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other' ), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref3_name','Ref #3 Name:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref3_name', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref3_phone','Ref #3 Phone:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref3_phone', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref3_city','Ref #3 City:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ref3_city', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">  <?php echo $this->Form->label('ref3_state','Ref #3 State:', array('class'=>'strong')); ?>
										<?php echo $this->Form->input('ref3_state', array('type' => 'select', 'options' => array(
'AL' => 'AL',
'AK' => 'AK',
'AZ' => 'AZ',
'AR' => 'AR',
'CA' => 'CA',
'CO' => 'CO',
'CT' => 'CT',
'DE' => 'DE',
'FL' => 'FL',
'GA' => 'GA',
'HI' => 'HI',
'ID' => 'ID',
'IL' => 'IL',
'IN' => 'IN',
'IA' => 'IA',
'KS' => 'KS',
'KY' => 'KY',
'LA' => 'LA',
'ME' => 'ME',
'MD' => 'MD',
'MA' => 'MA',
'MI' => 'MI',
'MN' => 'MN',
'MS' => 'MS',
'MO' => 'MO',
'MT' => 'MT',
'NE' => 'NE',
'NV' => 'NV',
'NH' => 'NH',
'NJ' => 'NJ',
'NM' => 'NM',
'NY' => 'NY',
'NC' => 'NC',
'ND' => 'ND',
'OH' => 'OH',
'OK' => 'OK',
'OR' => 'OR',
'PA' => 'PA',
'RI' => 'RI',
'SC' => 'SC',
'SD' => 'SD',
'TN' => 'TN',
'TX' => 'TX',
'UT' => 'UT',
'VT' => 'VT',
'VA' => 'VA',
'WA' => 'WA',
'WV' => 'WV',
'WI' => 'WI',
'WY' => 'WY',
'AS' => 'AS',
'DC' => 'DC',
'PR' => 'PR',
'VI' => 'VI'  ), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('ref3_type','Ref #3 Type:'); ?>
										<?php echo $this->Form->input('ref3_type', array('type' => 'select', 'options' => array(
'Father' => 'Father',
'Mother' => 'Mother',
'Brother' => 'Brother',
'Sister' => 'Sister',
'Relative' => 'Relative',
'Friend' => 'Friend',
'Co-Worker' => 'Co-Worker',
'Other' => 'Other'  ), 'empty' => 'Select', 'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // References Pg5 END -->

							<!-- Vechicle Pg6 Start -->
							<div class="tab-pane" id="tab6-1">

								<div class="row">
									<div class="col-md-3">
										<font color='red'>*</font> <?php echo $this->Form->label('category','Type:'); ?>
										<?php echo $this->Form->input('category', array('type' => 'select', 'options' => $d_type_options,'value'=>$category, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('type','Category:'); ?>
										<?php echo $this->Form->input('type', array('type' => 'select', 'options' => $body_type, 'empty' => 'Select', 'label'=>false,'div'=>false, 'value'=>$type, 'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('make','Make:'); ?>
										<?php echo $this->Form->input('make', array('type' => 'select', 'options' => $mk_options, 'empty' => 'Select','value'=>$make,'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('year','Year:'); ?><br />
										<?php echo $this->Form->input('year', array('type' => 'select', 'options' => $year_opt, 'empty' => 'selected','value'=>$year,'label'=>false,'div'=>false,  'class' => 'form-control','style'=>'width: 80%'));?>
										<button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row">



									<div class="col-md-3">
										<font color='red'>*</font>
										<?php echo $this->Form->label('model_id','Model:'); ?><br />
										<?php
										$display_model_id = ( $contact_info['Contact']['model_id'] != '')? "inline-block" : 'none';
										echo $this->Form->input('model_id', array('type' => 'select', 'value'=>$model_id, 'options'=>$model_opt, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id));
										?>

										<?php
										$display_model_txt = ( $contact_info['Contact']['model_id'] == '')? "inline-block" : 'none';
										echo $this->Form->input('model', array('type' => 'text', 'value'=>$model,  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt));
										?>
										<button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<font color='red'>*</font> <?php echo $this->Form->label('class','Class:'); ?>
										<?php echo $this->Form->input('class', array('type' => 'select', 'options'=>$body_sub_type_options, 'value'=>$class,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('unit_value','Value/Unit:'); ?>
										<?php echo $this->Form->input('unit_value', array('type' => 'text', 'value'=>$unitvalue, 'label'=>false,'div'=>false,'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3"><?php echo $this->Form->label('stock_num','Stock#'); ?>
										<?php echo $this->Form->input('stock_num', array('type' => 'text','value'=>$stocknum,'label'=>false,'div'=>false,'class' => 'form-control'));?>
										<div class="separator"></div>
									</div>

								</div>


								<div class="row">
									<div class="col-md-2"><?php echo $this->Form->label('condition','Condition:'); ?>
										<?php echo $this->Form->input('condition', array('type' => 'select', 'options' => array('New' => 'New','Used' => 'Used','Rental' => 'Rental','Demo' => 'Demo'), 'empty' => 'Select','value'=>$condition,'label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('engine','Engine:'); ?>
										<?php echo $this->Form->input('engine', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2"> <?php echo $this->Form->label('vin','Vin Number #:'); ?>
									<?php echo $this->Form->input('vin', array('type' => 'text', 'value'=>$vin, 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-2">
										<?php echo $this->Form->label('odometer','Miles:'); ?>
										<?php echo $this->Form->input('odometer', array('type' => 'text', 'value'=>$miles, 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-4"> <?php echo $this->Form->label('unit_color','Color:'); ?>
										<?php echo $this->Form->input('unit_color', array('type' => 'text', 'value'=>$color, 'label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>


								</div>

								<div class="row">

									<div class="col-md-3">
										<?php echo $this->Form->label('category_trade','(Trade) Type:'); ?>
										<?php echo $this->Form->input('category_trade', array('type' => 'select', 'value'=>$category_trade, 'options' => $d_type_options, 'empty' => 'Select', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
										<div class="separator"></div>
									</div>


									<div class="col-md-3">
										<?php echo $this->Form->label('type_trade','(Trade) Category:'); ?>
										<?php echo $this->Form->input('type_trade', array('type' => 'select', 'value'=>$typet, 'options'=>$body_type_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3"> <?php echo $this->Form->label('make_trade','(Trade) Make:'); ?>
										<?php echo $this->Form->input('make_trade', array('type' => 'select', 'value'=>$maket, 'options' => $mk_options_trade, 'empty' => 'Select','label'=>false,'div'=>false,'style'=>'width: 100%','class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('year_trade','(Trade) Year:'); ?> <br />
										<?php echo $this->Form->input('year_trade', array('type' => 'select', 'options' => $year_opt_trade, 'empty' => 'Select','value'=>$yeart,'label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control'));?>
										<button id="btn_year_trade_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>
								</div>


								<div class="row">

									<div class="col-md-3">
										<?php
										echo $this->Form->label('model_id_trade','(Trade) Model:'); ?><br />
										<?php
										$display_model_id_trade = ( $contact_info['Contact']['model_id_trade'] != '' || $contact_info['Contact']['model_trade'] == '' )? "inline-block" : 'none';
										echo $this->Form->input('model_id_trade', array('type' => 'select', 'value'=>$model_id_trade, 'options'=>$model_opt_trade, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id_trade));
										?>

										<?php
										$display_model_txt_trade = ( $contact_info['Contact']['model_id_trade'] == '' && $contact_info['Contact']['model_trade'] != '')? "inline-block" : 'none';
										echo $this->Form->input('model_trade', array('type' => 'text','value'=>$modelt,  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt_trade));
										?>
										<button id="btn_models_edit_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('class_trade','Class:'); ?>
										<?php echo $this->Form->input('class_trade', array('type' => 'select', 'value'=>$class_trade, 'options'=>$body_sub_type_options_trade,  'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('trade_value','(Trade) Value:'); ?>
										<?php echo $this->Form->input('trade_value', array('type' => 'text','value'=>$tradevalue,'label'=>false,'div'=>false,'id' => 'ContactTradeValue', 'class' => 'form-control money_amount')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('stock_num_trade','(Trade) Stock#'); ?>
										<?php echo $this->Form->input('stock_num_trade', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>

								<div class="row">

									<div class="col-md-3"> <?php echo $this->Form->label('condition_trade','(Trade) Condition:'); ?>
										<?php echo $this->Form->input('condition_trade', array('type' => 'select', 'value'=>$conditiont, 'options' => array('Used' => 'Used','Rental' => 'Rental','Demo' => 'Demo'), 'empty' => 'Select', 'label'=>false,'div'=>false,'style'=>'width: 100%','class' => 'form-control'));?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3"> <?php echo $this->Form->label('vin_trade','(Trade) Vin Number:'); ?>
										<?php echo $this->Form->input('vin_trade', array('type' => 'text','value'=>$vint,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3"> <?php echo $this->Form->label('odometer_trade','(Trade) Miles:'); ?>
										<?php echo $this->Form->input('odometer_trade', array('type' => 'text','value'=>$milest,'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-3">
										<?php echo $this->Form->label('usedunit_color','(Trade) Color:'); ?>
										<?php echo $this->Form->input('usedunit_color', array('type' => 'text','value'=>$colort, 'label'=>false,'div'=>false,'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Vechicle Pg6 end -->

							<!-- // Fixed Fee Starts -->
							<div class="tab-pane" id="tab7-1">
								<div class="row">
									<div class="col-md-3">  <?php echo $this->Form->label('fee_type','FIXED FEE / PAYMENT:', array('class'=>'strong')); ?>
										<?php //echo $this->Form->input('fee_type', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control'));
										echo $this->Form->input('fee_type', array(
												'id' => "edit_options_type_condition",
												'type' => 'select',
												'options' => $selected_type_condition,
												'empty' => "Select",
												//'selected' => $this->request->data['DealFixedfee']['id'],
												//'selected' => $,
												'class' => 'form-control',
												'label' => false,
												'div' => false,
												'style' =>'width: 100%'
											));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('unit_value','Unit Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('unit_value', array('type' => 'text','label'=>false,'id' => 'DealerUnitValue','div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('down_payment','Down Payment:', array('class'=>'strong')); ?> <?php echo $this->Form->input('down_payment', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('trade_value','Trade Value:', array('class'=>'strong')); ?> <?php echo $this->Form->input('trade_value', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('trade_payoff','Trade Payoff:', array('class'=>'strong')); ?> <?php echo $this->Form->input('trade_payoff', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('tag_fee','Tags:', array('class'=>'strong')); ?> <?php echo $this->Form->input('tag_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('title_fee','Title:', array('class'=>'strong')); ?> <?php echo $this->Form->input('title_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('doc_fee','Doc:', array('class'=>'strong')); ?> <?php echo $this->Form->input('doc_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('freight_fee','Freight:', array('class'=>'strong')); ?> <?php echo $this->Form->input('freight_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('prep_fee','Prep:', array('class'=>'strong')); ?> <?php echo $this->Form->input('prep_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('ppm_fee','PPM:', array('class'=>'strong')); ?> <?php echo $this->Form->input('ppm_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('hazard_fee','Hazard:', array('class'=>'strong')); ?> <?php echo $this->Form->input('hazard_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('esp_fee','ESP:', array('class'=>'strong')); ?> <?php echo $this->Form->input('esp_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('gap_fee','GAP:', array('class'=>'strong')); ?> <?php echo $this->Form->input('gap_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('tire_wheel_fee','Tire/W:', array('class'=>'strong')); ?> <?php echo $this->Form->input('tire_wheel_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('licreg_fee','R:', array('class'=>'strong')); ?> <?php echo $this->Form->input('licreg_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('vsc_fee','VSC:', array('class'=>'strong')); ?> <?php echo $this->Form->input('vsc_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('roadside_fee','Roadside:', array('class'=>'strong')); ?> <?php echo $this->Form->input('roadside_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('theft_fee','Theft:', array('class'=>'strong')); ?> <?php echo $this->Form->input('theft_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('parts_fee','Parts:', array('class'=>'strong')); ?> <?php echo $this->Form->input('parts_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('service_fee','Service:', array('class'=>'strong')); ?> <?php echo $this->Form->input('service_fee', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control input-mini money_amount')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('tax_fee','Tax:', array('class'=>'strong')); ?> <?php echo $this->Form->input('tax_fee', array('type' => 'select', 'label'=>false,'div'=>false, 'options' => array(
'1' => '1%',
'2' => '2%',
'3' => '3%',
'4' => '4%'
, '5' => '5%',
'6' => '6%',
'7' => '7%',
'8' => '8%',
'9' => '9%',
'10' => '10%',
'11' => '11%',
'12' => '12%',
'13' => '13%',
'14' => '14%',
'15' => '15%',
'16' => '16%',
), 'empty' => 'Select', 'id' => 'DealTaxFee', 'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3">
										<input type=button value="Totals" id="calculate_total" style='height: 25px;margin-top: 27px;width: 100%;'>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('amount','Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('amount', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control','id' => 'Dealeramount', 'onchange' => 'calculate();')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('loan_apr','APR:', array('class'=>'strong')); ?> <?php echo $this->Form->input('loan_apr', array('type' => 'select', 'label'=>false,'div'=>false, 'options' => array(
'1' => '1%',
'2' => '2%',
'3' => '3%',
'4' => '4%',
'5' => '5%',
'6' => '6%',
'7' => '7%',
'8' => '8%',
'9' => '9%',
'10' => '10%',
'11' => '11%',
'12' => '12%',
'13' => '13%',
'14' => '14%',
'15' => '15%',
'16' => '16%',
'17' => '17%',
'18' => '18%',
'19' => '19%',
'20' => '20%',
'21' => '21%'
), 'empty' => 'Select', 'id' => 'apr', 'class' => 'form-control','style'=>'width: 100%')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Fixed Fee  END -->

							<!-- // Fixed Fee Pg2 Starts -->

<style>
.label-32{
	height:32px;
	width:100%
}
.row-tab9{
	padding-left:12px;
	padding-right:12px;
}
</style>
							<div class="tab-pane" id="tab9-1">
								<div class="row">
									<div class="row row-tab9">
									<div class="col-md-4"><label class="strong label-32">For <select name="data[Deal][payment_option1]" class="form-control price_options" style="width:30%;" id="payment_option1"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[1])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:</label><?php /*?><?php echo $this->Form->label('payment_12months','For 12 Months: Payment Amount:', array('class'=>'strong')); ?> <?php */?>
									<?php echo $this->Form->input('option1_price', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor1')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor1')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalinterestFor1')); ?>
										<div class="separator"></div>
									</div>
                                    </div>
                                   <div class="row row-tab9">
									<div class="col-md-4"><label class="strong label-32" >For <select name="data[Deal][payment_option2]" class="form-control price_options" style="width:30%;" id="payment_option2"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[2])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:</label> <?php //echo $this->Form->label('payment_24months','For 24 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('option2_price', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor2')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor2')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalinterestFor2')); ?>
										<div class="separator"></div>
									</div>
                                     </div>
                                   <div class="row row-tab9">
									<div class="col-md-4"><label class="strong label-32">For <select name="data[Deal][payment_option3]" class="form-control price_options" style="width:30%;" id="payment_option3"><?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[3])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:</label> <?php //echo $this->Form->label('payment_36months','For 36 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('option3_price', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor3')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor3')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalinterestFor3')); ?>
										<div class="separator"></div>
									</div>
                                     </div>
                                   <div class="row row-tab9">
									<div class="col-md-4"><label class="strong label-32">For <select name="data[Deal][payment_option4]" class="form-control price_options" style="width:30%;" id="payment_option4"> <?php foreach($months as $key=>$value){ ?>
			<option value="<?php echo $key; ?>" <?php echo ($value==$selected_months[4])?'selected="selected"':''; ?>><?php echo $value; ?></option>
			<?php } ?></select> Months: Payment Amount:</label> <?php //echo $this->Form->label('payment_48months','For 48 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('option4_price', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor4')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor4')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong label-32')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control', 'id'=>'totalinterestFor4')); ?>
										<div class="separator"></div>
									</div>
                                     </div>
                                   <?php /*?><div class="row">
									<div class="col-md-4"> <?php echo $this->Form->label('payment_60months','For 60 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('payment_60months', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor5')); ?>
										<div class="separator"></div>
									</div>

									<div class="col-md-4"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor5')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-4"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalinterestFor5')); ?>
										<div class="separator"></div>
									</div>
                                    </div><?php */?>
									<?php /*?><div class="col-md-3"> <?php echo $this->Form->label('payment_72months','For 72 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('payment_72months', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor6')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor6')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalinterestFor6')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('payment_84months','For 84 Months: Payment Amount:', array('class'=>'strong')); ?> <?php echo $this->Form->input('payment_84months', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'paymentFor7')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('paymentTOtal','Total/Payments:', array('class'=>'strong')); ?> <?php echo $this->Form->input('paymentTOtal', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control money_amount', 'id'=>'totalFor7')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"> <?php echo $this->Form->label('totalwinterest','Total w/interest:', array('class'=>'strong')); ?> <?php echo $this->Form->input('totalwinterest', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control', 'id'=>'totalinterestFor7')); ?>
										<div class="separator"></div>
									</div><?php */?>
									<?php /*?><div class="col-md-4"> <?php echo $this->Form->label('mgr_signoff','MGR Sign-off:', array('class'=>'strong')); ?> <?php echo $this->Form->input('mgr_signoff', array('type' => 'password','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<div class="separator"></div>
									</div><?php */?>
                                    <div class="col-md-3">
										<button id="calculate_payment"  type="button" style="text-align:center;margin-top: 25px;">Calculate Payments</button>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- // Fixed Fee Pg2 END -->

							<!-- History Starts -->
							<div class="tab-pane" id="tab8-1">
								<div class="row">
									<div class="col-md-3">
										History
										<!-- Hidden start -->
										<?php echo $this->Form->input('contact_id', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$id)); ?>
										<?php echo $this->Form->input('ref_num', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$id)); ?>
										<?php echo $this->Form->input('company_id', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$cid)); ?>
										<?php echo $this->Form->input('company', array('type' => 'hidden', 'class' => 'input-mini', 'readonly' => 'true','value'=>$dealer)); ?>
										<?php echo $this->Form->input('sperson', array('type' => 'hidden', 'class' => 'input-medium','value'=>$sperson)); ?>
										<?php echo $this->Form->input('status', array('type' => 'hidden', 'class' => 'input-medium','value'=>$status)); ?>
										<?php echo $this->Form->input('source', array('type' => 'hidden', 'class' => 'input-medium','value'=>$source)); ?>
										<?php echo $this->Form->input('deal_status_id', array('type' => 'hidden',  'class' => 'input-medium','value'=>4)); ?>
										<?php echo $this->Form->input('date', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>
										<?php echo $this->Form->input('created', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>
										<?php echo $this->Form->input('created_long', array('type' => 'hidden', 'class' => 'input-medium','value'=>$datetimefullview)); ?>
										<?php echo $this->Form->input('modified', array('type' => 'hidden', 'class' => 'input-medium','value'=>$expectedt)); ?>
										<?php echo $this->Form->input('modified_long', array('type' => 'hidden', 'class' => 'input-medium','value'=>$datetimefullview)); ?>
										<?php echo $this->Form->input('owner', array('type' => 'hidden','value' => $sperson)); ?>
										<!-- Hidden end -->
									</div>
								</div>
							</div>
							<!-- History END -->


							<!-- History Starts -->
							<div class="tab-pane" id="tab10-1">
								<div class="row">
									<div class="col-md-6">
										 <font color="red">*</font> <?php echo $this->Form->label('notes','Deal Notes:', array('class'=>'strong')); ?>
										<?php echo $this->Form->textarea('notes', array('type' => 'text','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
										<?php echo $this->Form->hidden('notes_tab_num', array('value' => '9')); ?>
										<div class="separator"></div>
									</div>
								</div>
							</div>
							<!-- History END -->



						</div>

						<div class="row">
							<div class="col-md-6">
								<?php
								$selected_lead_type = "";
								if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
									$selected_lead_type = $this->request->params['named']['selected_lead_type'];
								}
								?>
								<a href="<?php echo $this->Html->url(array('action'=>'deals_main', $selected_lead_type )); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
							</div>
							<div class="col-md-6">
								<div class="pagination pull-right margin-none" >
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
										<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
                                        <li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>

										<li class="next finish primary" style="display:none;">
											<button class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
										</li>
									</ul>
									<!-- // Wizard pagination controls END -->
								</div>
							</div>

						</div>

						<?php echo $this->Form->end(); ?>

						<?php echo $this->element('sql_dump'); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>


//"use strict"; // Use ECMAScript 5 strict mode in browsers that support it

function calculate() {
	// Look up the input and output elements in the document
	//var amount = document.getElementById("amount");//
	//var apr = document.getElementById("apr");
	//var tax = document.getElementById("DealTaxFee");
	//var years = document.getElementById("years");
	//Outgoing var
	//var payment = document.getElementById("payment");
	//var total = document.getElementById("total");
	//var taxamount = document.getElementById("DealTaxFee");
	//var totalinterest = document.getElementById("totalinterest");
	//var principal = parseFloat(amount.value);
	//var interest = parseFloat(apr.value) / 100 / 12;
	var validationForCal = validate();
	if(validationForCal)
	{
		for(var i=1;i<=4;i++)
		{
			var amount = document.getElementById("Dealeramount");
			var apr = document.getElementById("apr");
			var taxamount = document.getElementById("DealTaxFee");
			var principal = parseFloat(amount.value);
			var interest = parseFloat(apr.value) / 100 / 12;
			var payment = document.getElementById(("paymentFor"+i).toString());
			var total = document.getElementById(("totalFor"+i).toString());
			var totalinterest = document.getElementById(("totalinterestFor"+i).toString());
			//var payments = parseFloat(years.value) * 12;
			var p_option=document.getElementById(("payment_option"+i).toString());
			var payments = parseInt(p_option.value);
			// Now compute the monthly payment figure.

			var x = Math.pow(1 + interest, payments, taxamount);   // Math.pow() computes powers
			var monthly = (principal * x * interest) / (x - 1);
			// If the result is a finite number, the user's input was good and
			// we have meaningful results to display

			if (isFinite(monthly)) {
			// Fill in the output fields, rounding to 2 decimal places
			payment.value = monthly.toFixed(2);
			total.value = (monthly * payments).toFixed(2);
			totalinterest.value = ((monthly * payments) - principal).toFixed(2);
			}
			else {
			// Result was Not-a-Number or infinite, which means the input was
			// incomplete or invalid. Clear any previously displayed output.
				payment.value = "";        // Erase the content of these elements
				total.value = ""
				totalinterest.value = "";
				chart();                       // With no arguments, clears the chart
			}
		}
 	}
  }

function validate()
{
	var amount = $("#Dealeramount").val();
	var apr = $("#apr").val();
	var taxamount = $("#DealTaxFee").val();
	if(amount == "" || amount == null || apr == "" || apr == null || taxamount == "" || taxamount == null){
	   alert("Please enter the required fields to calculate payment");
	   return false;
	}else{
	   return true;
	}
}

function applyTax() {
	var inputAmount = document.getElementById('amount').value;
	var salesTax = (inputAmount / 100 * document.getElementById('DealTaxFee').value);
	var totalAmount = (inputAmount * 1) + (salesTax * 1);
	document.getElementById('requestedTax').innerHTML = salesTax;
}

function add() {
	var sum = 0;
	var valid = true;
	var validation = true;
	//var inputs = document.getElementsByClassName("input-mini");

	if($("#DealDownPayment").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealDownPayment").val(0);
	if($("#DealTradeValue").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealTradeValue").val(0);
	if($("#DealTradePayoff").val() == "" || $("#DealDownPayment").val() == null)
	$("#DealTradePayoff").val(0);

	//var inputs = $("div[id='fixed-fee']").find(".input-mini");
	var inputs = $("div[id='tab7-1']").find(".input-mini");
	var validation = validateFields();
	if(validation){
	inputs.each(function()
		{
			var val = $(this).val();
			if(/^\d*\.?\d{0,2}$/.test(val))
			{
				sum += parseFloat(val);
			}
			else
			{
				valid = false;
				return false;
			}
		});
	};
	if (valid && validation) {
		//document.getElementById('amount').value = sum - document.getElementById('DealTradeValue').value - document.getElementById('DealDownPayment').value + sum / 100 * document.getElementById('DealTaxFee').value;
		var dealTradeVal = $("#DealTradeValue").val();
		var dealDownPay = $("#DealDownPayment").val();
		var dealTaxFee = $("#DealTaxFee").val();
			sum = sum - (2*parseFloat(dealTradeVal)) - (2*parseFloat(dealDownPay));
		var amount = sum + ((sum/100)*dealTaxFee);
		$("#Dealeramount").val(amount.toFixed(2));
	}
	else {
		if(!valid)
		alert("Please enter valid numbers only");
	}
}

function validateFields(){
	var inputs = $("div[id='tab7-1']").find(".input-mini").add("#DealTaxFee");
	var missing = false;
	inputs.each(function(){
		var val = $(this).val();
		if(val == "" || val == null)
		{
			alert("Please enter all the required fields");
			missing = true;
						return false;
		}

	});
	if(missing)
		return false;
	else
		return true;
}

$script.ready('bundle', function() {


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$('#calculate_total').click(function(){
		add();
	});

	$('#calculate_payment').click(function(){
		calculate();
	});


	//load fixed fees
	$('#edit_options_type_condition').change(function(){
		$.ajax({
			type: "GET",
			cache: false,
			dataType: "json",
			url:  "<?php echo $this->Html->url(array('controller'=>'deal_fixedfees','action'=>'get_fees')); ?>/"+$('#edit_options_type_condition').val(),
			success: function(data){
				$("#DealTagFee").val(data.tag_fee);
				$("#DealTmgr_signoffitleFee").val(data.title_fee);
				$("#DealDocFee").val(data.doc_fee);
				$("#DealFreightFee").val(data.freight_fee);
				$("#DealPrepFee").val(data.prep_fee);
				$("#DealPpmFee").val(data.ppm_fee);
				$("#DealHazardFee").val(data.hazard_fee);
				$("#DealEspFee").val(data.esp_fee);
				$("#DealGapFee").val(data.gap_fee);
				$("#DealTireWheelFee").val(data.tire_wheel_fee);
				$("#DealLicregFee").val(data.licreg_fee);
				$("#DealVscFee").val(data.vsc_fee);
				$("#DealRoadsideFee").val(data.roadside_fee);
				$("#DealTheftFee").val(data.theft_fee);
				$("#DealPartsFee").val(data.parts_fee);
				$("#DealServiceFee").val(data.service_fee);
				$("#DealTaxFee").val(Math.round(data.tax_fee));
			}
		});
		return false;
	});


	//inventory model
	$.inventory({
		input_type: "#DealCategory",
		input_category:"#DealType",
		input_make:"#DealMake",
		input_year:"#DealYear",
		input_yearedit:"#btn_year_edit",

	 	input_model_id:"#DealModelId",
		input_model:"#DealModel",
		btn_edit_model:"#btn_models_edit",

		input_class:"#DealClass",


		input_unitColor_id:"#DealUnitColor",
		input_unitColor_fieldname:"data[Deal][unit_color]",

		input_UnitValue:"#DealUnitValue",
		input_Engine:"#DealEngine",
	});

	//inventory trade
	$.inventory({
		input_type: "#DealCategoryTrade",
		input_category:"#DealTypeTrade",
		input_make:"#DealMakeTrade",
		input_year:"#DealYearTrade",
		input_yearedit:"#btn_year_trade_edit",

	 	input_model_id:"#DealModelIdTrade",
		input_model:"#DealModelTrade",
		input_class:"#DealClassTrade",
		btn_edit_model:"#btn_models_edit_trade",

		input_unitColor_id:"#DealUsedunitColor",
		input_unitColor_fieldname:"data[Deal][usedunit_color]",

		input_condition:"#DealConditionTrade",
		input_UnitValue:"#ContactTradeValue",
	});



















	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
