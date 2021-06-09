<?php 
$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' ,'T'=>'Mail Template');
$options_status = array ('not_sent' => 'Not sent', 'sent' => 'Sent');

$form_filters = json_decode( $eblast['Eblast']['form_filters'] );

//debug($form_filters);

$search_option_array = array(
	'search_lead_status'=>'Open/Close',
	'search_contact_status_id'=>'Lead Type',
	'search_sales_step'=>'Step',
	'search_status'=>'Status',
	'search_gender'=>'Gender',
	'search_best_time'=>'Best Time',
	'search_buying_time'=>'Buying Time',
	'search_source'=>'Source',
	'stock_num'=>'Stock',
	'stock_num_trade'=>'Stock#/T',
	'search_id'=>'Ref#',
	'search_first_name'=>'First Name',
	'search_last_name'=>'Last Name',
	'search_phone'=>'Phone',
	'search_mobile'=>'Mobile',
	'search_email'=>'Email',
	'search_condition'=>'Unit Condtion',
	'search_year'=>'Year',
	'search_make'=>'Make',
	'search_model'=>'Model',
	'search_type'=>'Unit Type',
	'search_condition_trade'=>'Trade Condition',
	'search_year_trade'=>'Trade Year',
	'search_make_trade'=>'Trade Make',
	'search_model_trade'=>'Trade Model',
	'search_trade_type'=>'Trade Type',
	'search_unit_color'=>'Unit Color',
	'search_usedunit_color'=>'Trade Color',
	'search_created'=>'Search Start Date',
	'search_modified'=>'Search End Date',
);
$contact_statuses = 	array(
		'12' => 'Mobile Lead',
		'5' => 'Web Lead',
		'6' => 'Phone Lead',
		'7' => 'Showroom',
		'8' => 'Parts',
		'9' => 'Service',
		'10' => 'Call Center',
		'11' => 'Rental'
	);
	$hr['0']= 'One Time Only';
	$hr['1']= 'Every Hour';
	$hr['3']= '3 Hrs';
	$hr['5']= '5 Hrs';
	$hr['8']= '8 Hrs';
	$hr['12']= '12 Hrs';
	$hr['18']= '18 Hrs';
	$hr['24']= 'Every day';
	$hr['48']= '2 Days';
	$hr['72']= '3 Days';
	$hr['120']= '5 Days';
	$hr['168']= '1 Week';
	$hr['336']= '2 Weeks';
	$hr['672']= '4 Weeks';
	$hr['720']= '1 Month';
	$hr['2880']= '3 Months';
	$hr['4320']= '6 Months';
	$hr['8760']= 'Every Year';
?>
<!-- Widget -->
<div class="widget widget-body-white">
	<!-- Widget heading -->

	<!-- // Widget heading END -->
	<div class="widget-body">
		<div class="separator bottom"></div>
			
			<div class="row">
				<div class="col-md-12">
					<ul class="list-unstyled list-group-1">
						<li><span class="strong">Campaign Name:</span> <?php echo $eblast['Eblast']['campaign_name'] ?></li>
						<li><span class="strong">Type:</span> <?php echo $eblast_types[$eblast['Eblast']['template_type']]; ?></li>
						<li><span class="strong">Created On:</span> <?php echo $this->Time->format('M d, Y', $eblast['Eblast']['created_date']); ?></li>
						<li><span class="strong">Created By:</span> <?php echo $eblast['User']['first_name'] ?> <?php echo $eblast['User']['last_name'] ?></li>
						<li><span class="strong">Template:</span> 
							<?php echo $this->Html->link("<u>".$eblast['Template']['template_title']."</u>",
								array('controller'=>'eblasts','action'=>'templates_create',$eblast['Template']['template_id']),array('class'=>'no-ajaxify','style'=>"display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5",'escape'=>false,'target'=>'_blank')); 
							?>
						</li>
						
						
						
						
					</ul>
				</div>
			</div>
	</div>
</div>
<!-- // Widget END -->

