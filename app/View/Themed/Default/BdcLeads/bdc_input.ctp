</br>
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
$unitvalue = $contact_info['Contact']['unit_value'];
$condition = $contact_info['Contact']['condition'];
$year = $contact_info['Contact']['year'];
$make = $contact_info['Contact']['make'];
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
							<li class="active"><a href="#tab1-1" class="glyphicons" data-toggle="tab"><i></i>Next Day Follow-Up</a></li>
							<li><a href="#tab2-1" class="glyphicons" data-toggle="tab"><i></i>14 Day Post Purchase “Sales” CSI</a></li>
							<li><a href="#tab3-1" class="glyphicons" data-toggle="tab"><i></i>CSI 17 Month Post Purchase </a></li>
							<li><a href="#tab4-1" class="glyphicons user" data-toggle="tab"><i></i>Service Complete CSI</a></li>
							<li><a href="#tab5-1" class="glyphicons group" data-toggle="tab"><i></i>Riders Safety Course</a></li>
						</ul>
					</div>
					<div class="widget-body">
						<?php echo $this->Form->create('BDC', array('class' => 'form-inline apply-nolazy')); ?>
						<div class="tab-content">
							<div class="tab-pane active" id="tab1-1">
								<div class="row">
									<div class="col-md-10">
										<?php echo $this->Form->label('q1','1.	Hello, I am calling to see if (customer name) is available?'); ?> <?php echo $this->Form->input('q1', array('type' => 'select', 'options' => array(
											'0' => 'Yes',
											'1' => 'No'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	Hello, my name is <?php echo $this->Form->input('q2_1', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100px')); ?>
										calling on behalf of <?php echo $this->Form->input('q2_2', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100px')); ?> how are you today?  Good.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	The reason for the call is to ask some quick questions about your visit to the dealership if you have a moment.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	Thank you</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	How did you hear about (dealerships name)?</label>
										<?php echo $this->Form->input('q5', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Were you greeted promptly?</label>
										<?php echo $this->Form->input('q6_1', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<?php echo $this->Form->input('q6_2', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Were you treated courteously?  Good. </label>
										<?php echo $this->Form->input('q7', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	Did they have what you were looking for in stock?</label>
										<?php echo $this->Form->input('q8', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>9.	Is there any particular model, color or year you are interested in?</label>
										<?php echo $this->Form->input('q9', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>10.	If you were to purchase would you be interested in adding any particular accessories?  If yes, what would that be?</label>
										<?php echo $this->Form->input('q10_1', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<?php echo $this->Form->input('q10_2', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>11.	Would you have the accessories added on by the dealership?</label>
										<?php echo $this->Form->input('q11', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>12.	What can the dealership do to earn your business right now or within the next 30 days?</label>
										<?php echo $this->Form->input('q12', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>13.	(If the customer answers with “nothing” or appears not to have an answer to the question.
Ask him/her if they are in the market and if yes, what time frame.</label>
										<?php echo $this->Form->input('q13', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>14.	When do you plan to return to the dealership?</label>
									</div>
									<div class="col-md-10">
										<label>15.	Would you refer a friend?</label>
										<?php echo $this->Form->input('q15', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('q16','16.	On a scale of one to ten, ten being the best how would you rate your overall experience?'); ?> <?php echo $this->Form->input('q16', array('type' => 'select', 'options' => array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
											'6' => '6',
											'7' => '7',
											'8' => '8',
											'9' => '9',
											'10' => '10'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>17.	Did anyone mention financing to you?</label>
										<?php echo $this->Form->input('q17', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>18.	Did you speak with a manager or anyone else before you left?</label>
										<?php echo $this->Form->input('q18', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>19.	Would you like to receive information on any upcoming special events or special promotions the dealership may have?</label>
										<?php echo $this->Form->input('q19', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
										<label>If yes, may I have your email address in order for you to be notified?</label>
									</div>
									<div class="col-md-10">
										<label>20.	My notes are forwarded to the management team at the dealership is there anything you would like to add?</label>
										<?php echo $this->Form->input('q20', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>21.	Thank you for your time today and have a great day!</label>
										<div class="separator"></div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab2-1">
								<div class="row">
									<div class="col-md-10">
										<label>1.	Hello.  May I speak with (customer name)?  My name is <?php echo $this->Form->input('a1', array('type' => 'text','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100px')); ?>,   I’m calling on behalf of (dealerships name)customer service.  How are you today?  If you have a moment, I’d like to ask you a few quick questions regarding your recent purchase experience. Thank you.
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('a2','2.	Was this a new or used vehicle?'); ?> <?php echo $this->Form->input('a2', array('type' => 'select', 'options' => array(
											'0' => 'New',
											'1' => 'Used',
											'2' => 'Demo'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	Have you had a chance to ride your new vehicle?<?php echo $this->Form->input('a3', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>  How is everything going?  (if customer is unhappy, send IAR to store.)</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	Do you have any questions about the features? <?php echo $this->Form->input('a4', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?> If yes, tell them the store will contact them.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	Was the vehicle clean with no damage upon delivery?<?php echo $this->Form->input('a5', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?> (If it was dirty, damaged, or not running properly, sent IAR to store, inform customer store will contact them.)</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Have you been contacted by your sales person since taking delivery of your vehicle?<?php echo $this->Form->input('a6', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Were you offered an extended warranty for your bike?<?php echo $this->Form->input('a7', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>If no are you interested in one?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	Do you plan to use the dealership for your service needs?<?php echo $this->Form->input('a8', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('a9','9.	On a scale of 1 to 10 where 10 is the best, how satisfied were you with the professionalism of your salesperson? '); ?> <?php echo $this->Form->input('a9', array('type' => 'select', 'options' => array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
											'6' => '6',
											'7' => '7',
											'8' => '8',
											'9' => '9',
											'10' => '10'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('a10','10.	On this same scale, how would you rate your overall buying experience?'); ?> <?php echo $this->Form->input('a10', array('type' => 'select', 'options' => array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
											'6' => '6',
											'7' => '7',
											'8' => '8',
											'9' => '9',
											'10' => '10'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>11.	Would you refer a friend to the dealership?<?php echo $this->Form->input('a11', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>12.	Based on this purchase, would you purchase from this dealership again?<?php echo $this->Form->input('a12', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>(if no or unsure, find out why, send IAR.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>13.	You comments will be forwarded to the management team at the dealership.  Are there any other comments you would like to include?</label>
										<?php echo $this->Form->input('a13', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>14.	Would you like to receive information on upcoming special events or promotions the dealership may have?<?php echo $this->Form->input('a14', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>15.	I would like to thank you for giving (dealerships name) the opportunity to earn your business.  Congratulations on your purchase and ride safe.</label>
										<div class="separator"></div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab3-1">
								<div class="row">
									<div class="col-md-10">
										<label>1.	Hello, I’m calling to see if (customer’s name) is available?  Hello (customer).  My name is (CSR Rep (user))and I’m calling on behalf of (dealership) customer service.  How are you today?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	Actually, this is just a follow-up call on the (vehicle) you purchased (give date/Sold) - Modified in DB).  If you have a moment, I would like to ask you a couple of quick questions.  Thank you.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	How did you hear about (dealerships name)?</label>
										<?php echo $this->Form->input('b3', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	How is everything going with the bike?</label>
										<?php echo $this->Form->input('b4_1', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<label>Have you had any problems or issues?</label>
										<?php echo $this->Form->input('b4_2', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	Have you been back to the dealership for maintenance or service at all?</label>
										<?php echo $this->Form->input('b5', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	How did the service visits go for you?</label>
										<?php echo $this->Form->input('b6', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Are you in the market for a new vehicle or considering upgrading any time in the near future?</label>
										<?php echo $this->Form->input('b7', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	Would you refer a friend to the dealership?</label>
										<?php echo $this->Form->input('b8', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>9.	And, on a scale of 1 to 10, with 10 being the best, how would you rate your overall experience?</label>
										<?php echo $this->Form->input('b9', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>10.	Your comments get forwarded to the management team at the dealership.  Are there any other comments or suggestions you would like me to include?</label>
										<?php echo $this->Form->input('b10', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>11.	I appreciate your time, thank you and have a great day!</label>
										<div class="separator"></div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab4-1">
								<div class="row">
									<div class="col-md-10">
										<label>1.	Hello, I’m calling to see if (customer’s nameis available?  My name is (CSR Rep (user)calling on behalf of (dealership) customer service, how are you?  If you have a moment I would like to ask some quick questions about your recent service visit? Thank you.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	Were you taken care of promptly when you came in?</label>
										<?php echo $this->Form->input('c2', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	Did the Service Adviser go over the bike with you before work was performed?</label>
										<?php echo $this->Form->input('c3', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	Were you told how long the work would take?</label>
										<?php echo $this->Form->input('c4_1', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<label>Was it done under a Service Plan</label>
										<?php echo $this->Form->input('c4_2', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	Were they friendly and courteous throughout the service process?</label>
										<?php echo $this->Form->input('c5', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Did the Service Advisor go over the work that was done with you when you picked it up? If no, do you have any questions?</label>
										<?php echo $this->Form->input('c6', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Was it clean when you picked it up?(</label>
										<?php echo $this->Form->input('c7', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	How is everything going for you? Have you had any problems? Are you satisfied with the quality of work?</label>
										<?php echo $this->Form->input('c8_1', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<?php echo $this->Form->input('c8_2', array('type' => 'textarea','class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>9.	Will you continue to use the dealership for your service needs?</label>
										<?php echo $this->Form->input('c9', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>10.	Would you recommend the dealership to a friend?(</label>
										<?php echo $this->Form->input('c10', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('c11','11.	On a scale of 1 to 10, If 10 were the best... how satisfied were you with the professionalism of your Service Adviser?'); ?> <?php echo $this->Form->input('c11', array('type' => 'select', 'options' => array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
											'6' => '6',
											'7' => '7',
											'8' => '8',
											'9' => '9',
											'10' => '10'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('c12','12.	Using that same scale, how would you rate your overall service experience?'); ?> <?php echo $this->Form->input('c12', array('type' => 'select', 'options' => array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
											'6' => '6',
											'7' => '7',
											'8' => '8',
											'9' => '9',
											'10' => '10'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>13.	My notes are forwarded to the management team at the dealership is there anything you would like to add?</label>
										<?php echo $this->Form->input('c13', array('options' => array('Yes', 'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>14.	Would you like to receive information on any upcoming special events or special promotions the dealership may have? If yes, may I have your email address please?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>15.	Thank you for your time today and for giving the dealership your business.  Have a great day.</label>
										<div class="separator"></div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab5-1">
								<div class="row">
									<div class="col-md-10">
										<label>Hello, I’m calling to see if (customer) is available?  Hi (customer), my name is (rep) calling on behalf of (dealership)’s customer service.  If you have a moment, I would like to ask you a few quick questions regarding your recent completion of the Rider’s Safety course.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	How did you hear about the Rider’s Safety course?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	Was the class enjoyable for you?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	Now that you have completed the course and have your license, do you have any plans to purchase a new or used motorcycle?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	If yes, is there a particular time frame you are planning to purchase?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Do you know what type of bike you would be interested in?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Would you like to be notified of any upcoming special events or promotions the dealership may have?  If yes, may I have your email address please?</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	Thank you for your time.  Congratulations on the completion of the course and I hope you have a wonderful day.</label>
										<div class="separator"></div>
									</div>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-6">
								<a href="<?php echo $this->Html->url(array('action'=>'deals_main', $selected_lead_type )); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
							</div>
							<div class="col-md-6">
								<div class="pagination pull-right margin-none" >
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
										<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>
										<li class="next primary"><a href="#" class="no-ajaxify">Next</a></li>
										<li class="next finish primary" style="display:none;">
											<button class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Complete</button>
										</li>
									</ul>
									<!-- // Wizard pagination controls END -->
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
