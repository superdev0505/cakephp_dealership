<?php //pr($this->data); die;
$dealer = AuthComponent::user('dealer');
// echo $dealer;
//$cid = AuthComponent::user('dealer_id');
$uid = AuthComponent::user('id');
// echo $cid;
$sperson = AuthComponent::user('full_name');
// echo $sperson;
$zone = AuthComponent::user('zone');
//echo $zone;

$id = $contact_info['BdcLead']['id'];
$cid = $contact_info['BdcLead']['company_id'];
//$dealer = $contact_info['Contact']['company'];
$fname = $contact_info['BdcLead']['first_name'];
$lname = $contact_info['BdcLead']['last_name'];
$email = $contact_info['BdcLead']['email'];
$fromSperson = $contact_info['BdcLead']['sperson'];
/*$address = $contact_info['Contact']['address'];
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
$source = $contact_info['Contact']['source'];*/

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
<?php 
$contactStatuses = array(5 => 'Web Lead' , 6 => 'Phone Lead', 7 => 'Showroom' , 12 => 'Mobile Lead' );
$mobile = $contact_info['BdcLead']['mobile'];
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$phone = $contact_info['BdcLead']['phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number);

$work = $contact_info['BdcLead']['work_number'];
$work_number = preg_replace('/[^0-9]+/', '', $work); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $work_number);
$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');

$switch_survey_id =0;
if(!empty($this->request->params['named']['switch_survey_id']))
$switch_survey_id =$this->request->params['named']['switch_survey_id'];

?>
<br />
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget  widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head" style="min-height:140px;height:auto;padding-left:5px;font-size:12px;line-height:25px;">
                    <a href="#" class="btn btn-danger BdcInvalidLead pull-right no-ajaxify" data-id="<?php echo $contact_info['BdcLead']['id']; ?>" style="margin-top:5px;" >Invalid Lead</a>
						<strong>Next Day Follow-Up: </strong><?php echo  $contact_info['BdcLead']['full_name'];?>-
                        
						&nbsp;<strong>Status: </strong><?php echo $contact_info['BdcLead']['status']; ?>&nbsp;&nbsp;<strong>Lead type: </strong><?php echo $contactStatuses[$contact_info['BdcLead']['contact_status_id']]; ?>
                        <br /><strong><span><i class="fa fa-mobile"></i>&nbsp;Mobile :</span></strong><?php echo $cleaned ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Phone :</span></strong><?php echo $cleaned1 ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Work :</span></strong><?php echo $cleaned2 ?>&nbsp;&nbsp; <strong>Attempt : </strong> <?php echo $total_attempt; ?><br />
                            <a href="<?php echo $this->Html->url(array('controller' =>'bdc_leads','action' => 'bdc_input_14day','switch_survey_id' => 2,$id)); ?>" class="btn btn-info pull-right no-ajaxify switch_bdc_survey" data-id="<?php echo $contact_info['BdcLead']['id']; ?>" style="margin-bottom:5px;" >Switch to CSI-Survey</a>
						  
                    &nbsp;&nbsp;<strong><span><?php if(in_array($contact_info['BdcLead']['dnc_status'],array('not_call','no_call_email')))
					{
						echo '<i class="fa fa-ban" style="color:#F00;" ></i>';
					}else
					{
						echo '<i class="fa fa-circle" style="color:#8bbf61;" ></i>';
					}
					 ?>&nbsp;DNC Status :</span></strong><span style="font-size:12px;"> <?php echo $dnc_statuses[$contact_info['BdcLead']['dnc_status']] ;?></span>&nbsp;&nbsp;  


						<?php 		if(!empty($last_call))
			{
				echo '<br/><strong>CSR Status:</strong>'.ucfirst($last_call['BdcSurvey']['status']).'&nbsp;&nbsp;<strong> Customer Status :</strong>'.$bdc_statuses[$last_call['BdcSurvey']['status']][$last_call['BdcSurvey']['c_status']];
			}else{
				echo '<br/><strong>No Pre-Purchase Survey taken yet</strong>';
			}
			if(isset($last_survey_answer))
			{
				echo '<br /><strong>CSR Notes : </strong><span>'.$last_survey_answer['SurveyAnswer']['answer'].'</span>';
			}
			?>
            <strong>Note : </strong><span style="font-size:12px;"><?php echo $this->Text->truncate(strip_tags($contact_info['BdcLead']['notes']),250); ?> </span> 
            
        
					</div>
					<div class="widget-body"> 
                    <?php echo $this->element('other_location_bdc_leads'); ?>
						<?php echo $this->Form->create('SurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'BdcLeads','action'=>'add_survey'),'id'=>'SurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('BdcLead.id',array('value'=>$id)); ?>
						

								<div class="row">
                            <div class="col-md-10">
                                    <label>CSR Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.status',array('options'=>array('contact'=>'Contact','no contact'=>'No Contact','bad number'=>'Bad Number','voicemail'=>'Voicemail','call back'=>'Call Back','no number'=>'No Number'),'class'=>'form-control','empty'=>'select','required'=>'required'));
								echo $this->Form->hidden('BdcLead.modified',array('value'=>$contact_info['BdcLead']['modified']));
								echo $this->Form->hidden('BdcSurvey.switch_survey_id',array('value'=>$switch_survey_id));
								echo $this->Form->hidden('BdcSurvey.event_id',array('value'=>0));
								echo $this->Form->hidden('BdcSurvey.survey_id',array('value'=>2));
								echo $this->Form->hidden('BdcSurvey.dealer_id',array('value'=>$cid));
								echo $this->Form->hidden('BdcSurvey.user_id',array('value'=>$uid));
								echo $this->Form->hidden('BdcSurvey.bdc_lead_id',array('value'=>$id));
								echo $this->Form->hidden('BdcSurvey.duration');
								echo $this->Form->hidden('BdcSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
								echo $this->Form->hidden('BdcLead.oldemail',array('value'=>$email));
									?>
                                     <div class="separator"></div>
                                    </div>
                        <div class="col-md-10" id="VoicemailScript" style="display:none">
                                  <h5><strong><i>VOICE MAIL SCRIPT PRE PURCHASE CALLS</i></strong></h5>
                                <label>  Hi this message is for <i style="font-size: 14px;color:#4193d0;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i> <br/>

<i style="font-size: 14px;color:#4193d0;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i> my name is <i style="font-size: 14px;color:#4193d0;"><?php echo  $sperson; ?></i> and I am calling on behalf of

 <i style="font-size: 14px;color:#4193d0;"><?php echo $dealer; ?></i> CUSTOMER SERVICE DEPARTMENT! <br /><br />

No reason for a call back!! I am just calling to ask you a few quick questions about your recent contact with the dealership.<br /><br />

I will try you back at a more convenient time. Thanks, and have a great day!!</label>

 <div class="separator"></div>
 <hr />
                                  </div>

							<?php // Style section for this and only Dealer's choice of appearance: ?>
									<style>
										.question-label {
											display: inline;
											word-wrap: break-word;
										}
									</style>
							<?php // End of styles^^?>
									<div class="col-md-3"><h4 class = "question-label"><strong>1. VERIFY: </strong></h4></div>
									<div class="col-md-9">
										<label>	Hello, may I speak with <i style="font-size: 14px;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i>?&nbsp;</label>
											<?php /*echo $this->Form->input('SurveyAnswer.18.answer', array('type' => 'select', 'options' => array(
													'Yes' => 'Yes',
													'No' => 'No'
													), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
												echo $this->Form->hidden('SurveyAnswer.18.question_id',array('value'=>'18'));
												echo $this->Form->hidden('SurveyAnswer.18.bdc_survey_id',array('value'=>''));*/
											?>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><h4 class = "question-label"><strong>2. VERBAL CONTACT: </strong></h4></div>
									<div class="col-md-7">
										<label>  I hope I didn't get you at a bad time?&nbsp;</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><h4 class = "question-label"><strong>3. INTRODUCTION: </strong></h4></div>
									<div class="col-md-7">
										<label>	This is <i style="font-size: 14px;"><?php echo  $sperson; ?></i>
											from Customer Care Center at <i style="font-size: 14px;"><?php echo $dealer; ?></i>.
											The reason I'm calling is, I Understand you came by the dealership yesterday
											and had a chance to look at some of our boats.
											I'm just making sure you were taken care of properly.&nbsp;</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-3"><h4 class = "question-label"><strong>3. REASON FOR CALL: </strong></h4></div>
									<div class="col-md-7">
										<label>	I see you spoke with <i style="font-size: 14px;"><?php echo  $fromSperson; ?></i>,
											Were you able to get all of the info you were looking for? <?php echo $this->Form->input('SurveyAnswer.155.answer',
													array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>&nbsp;</label>
										<?php
											echo $this->Form->hidden('SurveyAnswer.155.question_id',array('value'=>'155'));
											echo $this->Form->hidden('SurveyAnswer.155.bdc_survey_id',array('value'=>''));
										?>
											<label>Great, what boats did you get to look at?&nbsp;</label>
										<?php echo $this->Form->input('SurveyAnswer.156.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.156.question_id',array('value'=>'156'));
											echo $this->Form->hidden('SurveyAnswer.156.bdc_survey_id',array('value'=>''));
										?>
										<label> Did you find one you'd like to own?<?php echo $this->Form->input('SurveyAnswer.157.answer',
													array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>&nbsp;</label><br>
										<?php
											echo $this->Form->hidden('SurveyAnswer.157.question_id',array('value'=>'157'));
											echo $this->Form->hidden('SurveyAnswer.157.bdc_survey_id',array('value'=>''));
										?>
										<div class="col-md-1"></div><div class="col-md-11"><label> if yes - What’s preventing you from owning the boat?&nbsp;</label></div>
										<div class="col-md-1"></div><div class="col-md-11">
											<?php echo $this->Form->input('SurveyAnswer.158.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
												echo $this->Form->hidden('SurveyAnswer.158.question_id',array('value'=>'158'));
												echo $this->Form->hidden('SurveyAnswer.158.bdc_survey_id',array('value'=>''));
											?>
										</div>
										<div class="col-md-1"></div><div class="col-md-11"><label> If no – Of all the makes and models, what else are you considering?&nbsp;</label></div>
										<div class="col-md-1"></div><div class="col-md-11">
											<?php echo $this->Form->input('SurveyAnswer.159.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
												echo $this->Form->hidden('SurveyAnswer.159.question_id',array('value'=>'159'));
												echo $this->Form->hidden('SurveyAnswer.159.bdc_survey_id',array('value'=>''));
											?>
										</div>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<strong>Move on to questions </strong><label> - transition:&nbsp;</label>
										<label>  I am part of the customer Care team, and we do want to make sure
											we help you out as much as We can! [ then move on to the following questions: ]&nbsp;</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>1.	What is your price range? </label>
										<?php echo $this->Form->input('SurveyAnswer.160.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.160.question_id',array('value'=>'160'));
											echo $this->Form->hidden('SurveyAnswer.160.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<div class="col-md-12">
											<label>2.	Do you have a trade in? <?php echo $this->Form->input('SurveyAnswer.161.answer',
														array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
											<?php
												echo $this->Form->hidden('SurveyAnswer.161.question_id',array('value'=>'161'));
												echo $this->Form->hidden('SurveyAnswer.161.bdc_survey_id',array('value'=>''));
											?>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-11"><label>A. Year:Size: and Make</label>
										<?php echo $this->Form->input('SurveyAnswer.162.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.162.question_id',array('value'=>'162'));
											echo $this->Form->hidden('SurveyAnswer.162.bdc_survey_id',array('value'=>''));
										?>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-11"><label>B. How much do they want for it?</label>
										<?php echo $this->Form->input('SurveyAnswer.163.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.163.question_id',array('value'=>'163'));
											echo $this->Form->hidden('SurveyAnswer.163.bdc_survey_id',array('value'=>''));
										?>
											</div>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<div class="col-md-12">
										<label>3.	Will you be financing or paying cash?<?php echo $this->Form->input('SurveyAnswer.164.answer',
													array('options' => array('Financing'=>'Financing', 'Cash'=>'Cash'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?></label>
										<?php
											echo $this->Form->hidden('SurveyAnswer.164.question_id',array('value'=>'164'));
											echo $this->Form->hidden('SurveyAnswer.164.bdc_survey_id',array('value'=>''));
										?>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-11">
										<label>If financing: What monthly payment do you want to stay around?</label>
										<?php echo $this->Form->input('SurveyAnswer.165.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.165.question_id',array('value'=>'165'));
											echo $this->Form->hidden('SurveyAnswer.165.bdc_survey_id',array('value'=>''));
										?>
										</div>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4. Do you have a time frame for purchase?</label>
										<?php echo $this->Form->input('SurveyAnswer.166.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.166.question_id',array('value'=>'166'));
											echo $this->Form->hidden('SurveyAnswer.166.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	When do you see yourself having time to stop by the dealership again?</label>
										<?php echo $this->Form->input('SurveyAnswer.167.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.167.question_id',array('value'=>'167'));
											echo $this->Form->hidden('SurveyAnswer.167.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>Again, we just want to make sure everything goes smoothly in your search.  Please don’t hesitate to call if you need anything else.</label>
									</div>
									<div class="col-md-10">
										<div class="col-md-12"><strong>6. If Bought Elsewhere:</strong><?php echo $this->Form->input('SurveyAnswer.171.answer',
											array('options' => array('Negative'=>'Negative', 'Positive'=>'Positive'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										</div>
										<?php
											echo $this->Form->hidden('SurveyAnswer.171.question_id',array('value'=>'171'));
											echo $this->Form->hidden('SurveyAnswer.171.bdc_survey_id',array('value'=>''));
										?>
										<div class="col-md-2"></div>
										<div class="col-md-10">
										<label>-Oh congratulations…What did you get?</label>
										<?php echo $this->Form->input('SurveyAnswer.168.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.168.question_id',array('value'=>'168'));
											echo $this->Form->hidden('SurveyAnswer.168.bdc_survey_id',array('value'=>''));
										?>
											</div>
										<div class="col-md-2"></div>
										<div class="col-md-10">
											<label>Great, where did you get it?</label>
										<?php echo $this->Form->input('SurveyAnswer.169.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
											echo $this->Form->hidden('SurveyAnswer.169.question_id',array('value'=>'169'));
											echo $this->Form->hidden('SurveyAnswer.169.bdc_survey_id',array('value'=>''));
										?>
											</div>
										<div class="col-md-2"></div>
										<div class="col-md-10">
										<label>Those are some great guys …<br>
											Let me ask you, what could we have done differently to earn your business?
										</label>
										<?php echo $this->Form->input('SurveyAnswer.170.answer', array('type' => 'textarea','class' => 'form-control','value'=>'', 'allowEmpty' => 'true'));
											echo $this->Form->hidden('SurveyAnswer.170.question_id',array('value'=>'170'));
											echo $this->Form->hidden('SurveyAnswer.170.bdc_survey_id',array('value'=>''));
										?>
											</div>
										<div class="separator"></div>
									</div>

									<?php// debug($contact_info); ?>

									<div class="col-md-10">
										<label>	Thank you for your time today and have a great day!</label>
										<div class="separator"></div>
									</div>
                                    <div class="col-md-10">
                                    <label>Customer Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.c_status',array('options'=>array(),'class'=>'form-control bdc_status','empty'=>'select','id'=>'customer_status','required'=>'required'));
									?>
                                    <div class="separator"></div>
                                    </div>
                                    <div class="col-md-10">
                                    <label>DNC Status  &nbsp;</label><?php
									echo $this->Form->hidden('BdcLead.dnc_status_old',array('value'=>$contact_info['BdcLead']['dnc_status']));
									echo $this->Form->input('BdcLead.dnc_status',array('options'=>array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email'),'class'=>'form-control bdc_status','empty'=>'select','required'=>'required','value'=>$contact_info['BdcLead']['dnc_status']));
									?>
                                    <div class="separator"></div>
                                    </div>
                                    <div id="callBackDiv" style="display:none;">
                                           <div class="col-md-10">
                                        <label class="col-md-10">Call Back Date  &nbsp;</label>
                                        <div class="col-md-6">
										<div class="input-group date " ><span class="input-group-addon"><i class="fa fa-th"></i></span>
										<?php

                                        echo $this->Form->input('BdcSurvey.call_back_date',array('type'=>'text','class'=>'form-control novalidate','placeholder'=>'Select Date'));
                                        ?></div></div>
                                        <div class="col-md-6">
                                           <div class="input-group bootstrap-timepicker " style="margin-right:15px;">
															<?php echo $this->Form->input('BdcSurvey.call_back_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control novalidate')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div></div>
                                        <div class="separator"></div>
                                        </div>
                                              <div class="col-md-10">
                                        <label>Message  &nbsp;</label><?php

                                        echo $this->Form->input('BdcSurvey.call_back_msg',array('class'=>'form-control novalidate','type'=>'textarea'));
                                        ?>
                                        <div class="separator"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                 <?php echo $this->Html->link('BDC Appointment',array('controller'=>'events','action'=>'lead_appointment',$contact_info['BdcLead']['id']),array('id'=>'lead_appointment','class'=>'btn btn-primary no-ajaxify'));
									?>
                                    <div class="separator"></div>
                                    </div>
                                      <?php //if(in_array(AuthComponent::user('dealer_id'),array(2501,5000))){ ?>

                                    <div class="col-md-10">
                                <input type="checkbox" name="send_email" id ="SendEmail" style="display:none;" value="yes" <?php echo ($dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />
                                    <div class="separator"></div>
                                    </div>
                                    <?php //} ?>
								</div>

						<div class="row">
							<div class="col-md-5">
								<a href="<?php echo $this->Html->url(array('action'=>'leads_main', $selected_lead_type )); ?>" class="btn btn-danger no-ajaxify" id="btn-cancel-survey" ><i class="fa fa-reply"></i> Cancel</a>
                                <a class="btn btn-inverse" id="skip_lead" lead_id="<?php echo $this->request->params['pass']['0'];  ?>">Skip Lead</a>
							</div>
							<div class="col-md-7">
								<div class="pagination pull-right margin-none" >
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
									<!--	<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
										<li class="primary previous"><a href="#" class="no-ajaxify">Previous</a></li>
										<li class="last primary"><a href="#" class="no-ajaxify">Last</a></li>-->

										<li class="next primary"><a href="#" class="no-ajaxify" id="next_lead" lead_id="<?php echo $this->request->params['pass']['0'];  ?>">Submit & Next</a></li>

										<li class="next finish primary">
											<button id="submit" class="btn btn-success" style="border-top-left-radius: 0; border-bottom-left-radius: 0; font-weight: 700; border: 1px solid #DDD;"  type="submit">Submit</button>
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
<?php
echo $this->Form->input('BdcSurvey.c_status',array('options'=>array(),'class'=>'form-control bdc_status','empty'=>'select','id'=>'no_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['contact'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'contact_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['no_contact'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'no_contact_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['bad_number'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'bad_number_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['voicemail'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'voicemail_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['call_back'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'call_back_status','style'=>'display:none;'));
echo $this->Form->input('BdcSurvey.c_status',array('options'=>$bdc_statuses['no_number'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'no_number_status','style'=>'display:none;'));


?>

<script>
var start;
var lead_appt_dialog;
var search_all2;
var search_all;
var check_appoinment = false;
var appoinment_set = false;
$(function(){
		    minutes=1000*60;
			start = new Date()
			starttime=start.getTime();
			search_all2=$("#BdcLeadSearchAll2").val();
			search_all=$("#ContactSearchAll").val();
			
			$("#BdcSurveyCallBackDate").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "<?php echo date('Y-m-d'); ?>"
		});
	$("#BdcSurveyCallBackTime").timepicker();	
	$(".switch_bdc_survey").on('click',function(e){
			e.preventDefault();
			url = $(this).attr('href');
			if(confirm('Are you sure you want to switch to CSI Sold Survey?')){
			$.ajax({
				type: 'GET',
				url:url,
				success: function(data){
					$("#lead_details_content").html(data);
					}
				
				});
			}
		
		
		});		
		
	$(".BdcInvalidLead").on('click',function(e){
		e.preventDefault();
		
		lead_id=$(this).attr('data-id');
		//$(this).parent().parent().remove();
		bootbox.confirm('Are you sure you want to make this lead invalid?',function(result){
		if(result){
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'bdc_invalid_lead')); ?>/"+lead_id,
			success: function(data){
				next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
				$("div[lead_row_id="+lead_id+"]").remove();
				$("#lead_details_content").html('');
				
				if(next_id){
				$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'lead_details')); ?>/"+next_id,
				success: function(data){
						$("#lead_details_content").html(data);
							}
						});
				}
			}
		});
		}});
		
		});
		
		
		
	$("#BdcSurveyStatus").live('change',function(){
							$("#customer_status").html('');
							$("#callBackDiv").hide();
							$("#VoicemailScript").hide();
							if($(this).val()=='contact')
							{
								$("#customer_status").html($("select#contact_status").html());
							}
							else if($(this).val()=='no contact')
							{
								$("#customer_status").html($("select#no_contact_status").html());
							}
							else if($(this).val()=='bad number')
							{
								$("#customer_status").html($("select#bad_number_status").html());
							}
							else if($(this).val()=='voicemail')
							{
								$("#VoicemailScript").slideDown();
								$("#customer_status").html($("select#voicemail_status").html());
							}
							else if($(this).val()=='call back')
							{
								$("#customer_status").html($("select#call_back_status").html());
								$("#callBackDiv").slideDown('slow');
							}
							else if($(this).val()=='no number')
							{
								$("#customer_status").html($("select#no_number_status").html());
							}
							else
							{
								$("#customer_status").html($("select#no_status").html());
							}
								
						});
	$("a#skip_lead").click(function(event)
	{
		event.preventDefault();
		lead_id=$(this).attr('lead_id');
		next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
		if(next_id)
		{
			$.ajax({
					type: "GET",
					cache: false,
					url: "<?php  echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'bdc_input_ndf')); ?>/"+next_id,
					success: function(data){
						
							
						bootbox.hideAll();
						scr_mode=$("#surveyViewToggle").attr('data-id');
						var percentageToScroll = 100;
						var percentage = percentageToScroll/100;
						var height = $(document).scrollTop();
						var scrollAmount = height * (1 - percentage);
						if(scr_mode=='full_screen'){
							
							$("#lead_details_content").html(data);
							
							$('#lead_details_content').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							$('html,body').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							}else
							{
									bootbox.dialog({
									message: data,
									title: survey_title,
									animate: false
								}).find("div.modal-dialog").addClass("maxWidth");
							$('div.maxWidth').parent().animate({ scrollTop: scrollAmount }, 'slow', function () { 
						 	 });
							}
							
					}
					});
		}
		else
		{
			alert('There is no further lead.');
		}
		
	});
	
	
	$("a#btn-cancel-survey").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'lead_details')); ?>/selected_lead_type:/<?php echo $this->request->params['pass']['0'] ?>",
			success: function(data){
				bootbox.hideAll();
				$("#lead_details_content").html(data);
			}
		});
		
	});
	
	
	$("a#next_lead").click(function(event)
	{
		event.preventDefault();
		if($("#BdcSurveyStatus").val()=='')
		{
			alert('Please Select Survey Status');
			return false;
		}
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6'&&$("#customer_status").val()!='29' && $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert('Please enter a valid Email in Q14');
				return false;
			}
		}
		if($("#customer_status").val=='')
		{
			alert('Please Select Customer Status');
			return false;
		}
		
		lead_id=$(this).attr('lead_id');
		next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
		if(next_id)
			{
				$(this).attr('disabled','disabled');
				if($("#BdcSurveyStatus").val()=='contact'||$("#BdcSurveyStatus").val()=='bad number')
				{
					alert_email_confirm(2);
				}else
				{
					submit_next();
				}
			}
			else
			{
				alert('There is no further record. Please click submit');
			}
	});
	
	$("form#SurveyAnswer").submit(function(event){
		event.preventDefault();
		if($("#BdcSurveyStatus").val()=='')
		{
			alert('Please Select Survey Status');
			return false;
		}
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' &&$("#customer_status").val()!='29' && $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert('Please enter a valid Email in Q14');
				return false;
			}
		}
		if($("#customer_status").val=='')
		{
			alert('Please Select Customer Status');
			return false;
		}
		$(this).attr('disabled','disabled');
		if($("#BdcSurveyStatus").val()=='contact'||$("#BdcSurveyStatus").val()=='bad number')
		{
			alert_email_confirm(1);
		}else
		{
			submit_s_form();
		}
	});
	
	function validateForm()
	{
		validate=true;
		/*if($("#SurveyAnswer26AnswerYes").is(':checked'))
		{
			$("#Q26").addClass('novalidate');
		}*/
		/*else if($("#SurveyAnswer26AnswerNothing").is(':checked'))
		{
			$("#Q26").addClass('novalidate');
		}*/
		
		if($("#SurveyAnswer171AnswerNegative").is(':checked'))
		{
			$("#SurveyAnswer170Answer").addClass('novalidate');
			$("#SurveyAnswer169Answer").addClass('novalidate');
			$("#SurveyAnswer168Answer").addClass('novalidate');
		} else if($("#SurveyAnswer171AnswerPositive").is(':checked'))
				{
					$("#SurveyAnswer170Answer").removeClass('novalidate');
					$("#SurveyAnswer169Answer").removeClass('novalidate');
					$("#SurveyAnswer168Answer").removeClass('novalidate');
				}
		
		if($("#SurveyAnswer164AnswerCash").is(':checked'))
		{
			$("#SurveyAnswer165Answer").addClass('novalidate');
		} else if ($("#SurveyAnswer164AnswerFinancing").is(':checked'))
				{
					$("#SurveyAnswer165Answer").removeClass('novalidate');
				}
		
		if($("#SurveyAnswer161AnswerNo").is(':checked'))
		{
			$("#SurveyAnswer162Answer").addClass('novalidate');
			$("#SurveyAnswer163Answer").addClass('novalidate');
		} else if($("#SurveyAnswer161AnswerYes").is(':checked'))
				{
					$("#SurveyAnswer162Answer").removeClass('novalidate');
					$("#SurveyAnswer163Answer").removeClass('novalidate');
				}
		if($("#SurveyAnswer157AnswerYes").is(':checked'))
		{
			$("#SurveyAnswer159Answer").addClass('novalidate');
			$("#SurveyAnswer158Answer").removeClass('novalidate');
		} else if($("#SurveyAnswer157AnswerNo").is(':checked')) {
			$("#SurveyAnswer158Answer").addClass('novalidate');
			$("#SurveyAnswer159Answer").removeClass('novalidate');
		}
		$("#SurveyAnswer .form-control").not('.novalidate').each(function(){
										 if($.trim($(this).val())=='')
										 {
											 $(this).focus();
											
											 validate=false;
										 }
										 
										 });
				
				fields=[];
				$("#SurveyAnswer input[type=radio]").each(function(){
										name=$(this).attr('name');
										number=name.match(/[0-9]+/);
										check='no';
										if($(this).is(':checked'))
										{
											check='yes'
										}
										if(fields[number])
										{
											if(fields[number]=='no'&&check=='no')
											{
												$(this).focus();
												validate=false;
											}
										}
										else
										{
											fields[number]=check;
										}
										
										
										 
										 });
				
		return validate;
	}
	
	function validEmail()
	{
		validate=true;
		value=$('#321').val();
		if($.trim(value)!='')
		{
			//if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
			if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w)+)+)+$/i))
				{
					
					$('#321').focus();
					validate=false;
				}
		}
		return validate;
	}
$("a#lead_appointment").on('click',function(event){
		   event.preventDefault();
			$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Appointment - <?php echo $contact_info['BdcLead']['first_name'] . "&nbsp;" . $contact_info['BdcLead']['last_name'].' '.$cleaned.'  Sperson:'.$contact_info['BdcLead']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
				
			}
		});
										  
										  
										  });	
	


function alert_email_confirm($fun)
{
	
	bootbox.alert({	message : '<input type="checkbox" id="AlertSendEmail" name="send_email" value="yes" <?php echo (						$dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />&nbsp;Send Email to Manager',
		title  : 'BDC Send Email Alert',
		callback : function($result)
		{
		if($("#AlertSendEmail").is(":checked"))
			{
				$("#SendEmail").attr('checked','checked');
			}else
			{
				$("#SendEmail").removeAttr('checked');
			}	
			if($fun==1)
			{
				submit_s_form();
			}else
			{
				submit_next();
			}
		}
		});
	

}
function submit_next()
{
			
			$('.ajax-loading').removeClass('hide');
			end = new Date();
			endtime=end.getTime();
			duration= endtime-starttime;
			duration=duration/minutes;
			duration=duration.toFixed(2);
			$("#BdcSurveyDuration").val(duration);
			$.ajax({
			type: "POST",
			cache: false,
			data:$("#SurveyAnswer").serialize(),
			url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'add_survey')); ?>",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'bdc_input_ndf')); ?>/"+next_id,
					success: function(data){
						$load_first='';
						bootbox.hideAll();
						
						scr_mode=$("#surveyViewToggle").attr('data-id');
						if(scr_mode=='full_screen'){
						$("#lead_details_content").html(data);
						}else{
							$load_first ='load_first';
							bootbox.dialog({
									message: data,
									title: survey_title,
									animate: false
								}).find("div.modal-dialog").addClass("maxWidth");
						}
						
						$.ajax({
							type: "GET",
							cache: false,
							url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/"+$load_first +"/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
							success: function(data){
							$("#search-result-content").html(data);
							$('.ajax-loading').addClass('hide');
							}
						});
						
						$("#BdcMainDiv").prepend('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Survey form submitted successfully</div>');
						removeAlert();
						
							var percentageToScroll = 100;
							var percentage = percentageToScroll/100;
							var height = $(document).scrollTop();
							var scrollAmount = height * (1 - percentage);
						
							
							$('html,body').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							$('#lead_details_content').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							$('div.maxWidth').parent().animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							
					}
				});
			}
			
			
			});
			
}

function submit_s_form()
{
	
	$(this).attr('disabled','disabled');
	$('.ajax-loading').removeClass('hide');
	end = new Date();
	endtime=end.getTime();
	duration= endtime-starttime;
	duration=duration/minutes;
	duration=duration.toFixed(2);
	$("#BdcSurveyDuration").val(duration);
		$.ajax({
			type: "POST",
			cache: false,
			data:$("#SurveyAnswer").serialize(),
			url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'add_survey')); ?>",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
					success: function(data){
						bootbox.hideAll();
						$("#search-result-content").html(data);
						$('.ajax-loading').addClass('hide');
						$("#BdcMainDiv").prepend('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Survey form submitted successfully</div>');
						removeAlert();
						
					}
				});
			}
		});
		
}



});

</script>