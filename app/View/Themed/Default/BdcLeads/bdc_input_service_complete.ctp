<?php //pr($this->data); die;
$dealer = AuthComponent::user('dealer');
// echo $dealer;
$cid = AuthComponent::user('dealer_id');
$uid = AuthComponent::user('id');
// echo $cid;
$sperson = AuthComponent::user('full_name');
// echo $sperson;
$zone = AuthComponent::user('zone');
//echo $zone;

$id = $contact_info['ServiceLeadsDms']['id'];
$cid = $contact_info['ServiceLeadsDms']['dealer_id'];
//$cid = $contact_info['Contact']['company_id'];
//$dealer = $contact_info['Contact']['company'];
$email = $contact_info['ServiceLeadsDms']['email'];
$name = $contact_info['ServiceLeadsDms']['name'];

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
$mobile = $contact_info['ServiceLeadsDms']['home_phone'];
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$phone = $contact_info['ServiceLeadsDms']['work_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number);

/*$work = $contact_info['BdcLead']['work_number'];
$work_number = preg_replace('/[^0-9]+/', '', $work); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $work_number);*/
$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');
?>

<br />
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget">
					<!-- Widget heading -->
					<div class="widget-head" style="height:137px;padding-left:5px;">
                    <a href="#" class="btn btn-danger BdcInvalidLead pull-right no-ajaxify" data-id="<?php echo $contact_info['ServiceLeadsDms']['id']; ?>" style="margin-top:5px;">Invalid Lead</a> 
                    <strong>Service Complete CSI:</strong><?php echo  $contact_info['BdcLead']['full_name'];?>
                        <?php /*?>&nbsp;&nbsp;<strong>Status:<?php echo $contact_info['BdcLead']['status']; ?><br /><strong><span><i class="fa fa-mobile"></i>&nbsp;Mobile :</span></strong><?php echo $cleaned ?>&nbsp;&nbsp;&nbsp;<strong><?php */?><strong><span><i class="fa fa-phone"></i>&nbsp;Phone :</span></strong><?php echo $cleaned ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Work :</span></strong><?php echo $cleaned1 ?>
                         <strong>Attempt : </strong> <?php echo $total_attempt; ?><br />
                    &nbsp;&nbsp;<strong><span><?php if(in_array($contact_info['ServiceLeadsDms']['dnc_status'],array('not_call','no_call_email')))
					{
						echo '<i class="fa fa-ban" style="color:#F00;" ></i>';
					}else
					{
						echo '<i class="fa fa-circle" style="color:#8bbf61;" ></i>';
					}
					 ?>&nbsp;DNC Status :</span></strong> <?php echo $dnc_statuses[$contact_info['ServiceLeadsDms']['dnc_status']] ;?>&nbsp;&nbsp;
<?php 		if(!empty($last_call))
			{
				echo '<br/><strong>CSR Status:</strong>'.ucfirst($last_call['BdcSurvey']['status']).'&nbsp;&nbsp;<strong> Customer Status :</strong>'.$bdc_statuses[$last_call['BdcSurvey']['status']][$last_call['BdcSurvey']['c_status']];
			}else{
				echo '<br/><strong>No Service Complete CSI Survey taken yet</strong>';
			} ?>

                        
                    </div>
					<div class="widget-body"> 
                    <?php echo $this->element('other_location_bdc_leads'); ?>
						<?php echo $this->Form->create('SurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'BdcLeads','action'=>'service_leadsurvey'),'id'=>'SurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('ServiceLead.id',array('value'=>$id)); ?>
						
							

							<div class="row">
                            <div class="col-md-10">
                                    <label>CSR Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.status',array('options'=>array('contact'=>'Contact','no contact'=>'No Contact','bad number'=>'Bad Number','voicemail'=>'Voicemail','call back'=>'Call Back','no number'=>'No Number'),'class'=>'form-control','empty'=>'select','required'=>'required'));
								echo $this->Form->hidden('BdcSurvey.survey_id',array('value'=>5));
								echo $this->Form->hidden('BdcSurvey.dealer_id',array('value'=>$cid));
								echo $this->Form->hidden('BdcSurvey.user_id',array('value'=>$uid));
								echo $this->Form->hidden('BdcSurvey.service_lead_id',array('value'=>$id));
								//echo $this->Form->hidden('BdcSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
								echo $this->Form->hidden('BdcSurvey.duration');
								
									?><div class="separator"></div>
                                	</div>
                                    
									<div class="col-md-10">
										<label>	Hello, I’m calling to see if <i style="font-size: 14px;"><?php echo $name; ?></i> is available?  My name is <i style="font-size: 14px;"><?php echo  $sperson; ?></i> calling on behalf of <i style="font-size: 14px;"><?php echo $dealer; ?></i> customer service, how are you?  If you have a moment I would like to ask some quick questions about your recent service visit? </label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>1.	Were you taken care of promptly when you came in?</label>
										<?php echo $this->Form->input('SurveyAnswer.57.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.57.question_id',array('value'=>'57'));
										echo $this->Form->hidden('SurveyAnswer.57.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	Did the Service Adviser go over the vehicle with you before work was performed?</label>
										<?php echo $this->Form->input('SurveyAnswer.58.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.58.question_id',array('value'=>'58'));
										echo $this->Form->hidden('SurveyAnswer.58.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	Were you told how long the work would take?</label>
										<?php echo $this->Form->input('SurveyAnswer.59.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.59.question_id',array('value'=>'59'));
										echo $this->Form->hidden('SurveyAnswer.59.bdc_survey_id',array('value'=>''));
										?>
                                        <div class="separator"></div>
                                        </div>
                                        <div class="col-md-10">
										<label>4.Was it done under a Pre-Paid Service Plan</label>
										<?php echo $this->Form->input('SurveyAnswer.60.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										
										echo $this->Form->hidden('SurveyAnswer.60.question_id',array('value'=>'60'));
										echo $this->Form->hidden('SurveyAnswer.60.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	Were they friendly and courteous throughout the service process?</label>
										<?php echo $this->Form->input('SurveyAnswer.61.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										
										echo $this->Form->hidden('SurveyAnswer.61.question_id',array('value'=>'61'));
										echo $this->Form->hidden('SurveyAnswer.61.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Did the Service Adviser go over the work that was done with you when you picked it up? If no, do you have any questions?</label>
										<?php echo $this->Form->input('SurveyAnswer.62.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->input('62.1', array('type' => 'textarea','class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.62.question_id',array('value'=>'62'));
										echo $this->Form->hidden('SurveyAnswer.62.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>7.	Was it clean when you picked it up?</label>
										<?php echo $this->Form->input('SurveyAnswer.63.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.63.question_id',array('value'=>'63'));
										echo $this->Form->hidden('SurveyAnswer.63.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>8.	Have you had any problems? (If Yes - is this related to the service you received)</label>
										<?php echo $this->Form->input('SurveyAnswer.64.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); ?>
										<?php echo $this->Form->input('64.1', array('type' => 'textarea','class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.64.question_id',array('value'=>'64'));
										echo $this->Form->hidden('SurveyAnswer.64.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>9.	Will you continue to use the dealership for your service needs?</label>
										<?php echo $this->Form->input('SurveyAnswer.65.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										
										echo $this->Form->hidden('SurveyAnswer.65.question_id',array('value'=>'65'));
										echo $this->Form->hidden('SurveyAnswer.65.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>10.	Would you recommend the dealership to a friend?</label>
										<?php echo $this->Form->input('SurveyAnswer.66.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.66.question_id',array('value'=>'66'));
										echo $this->Form->hidden('SurveyAnswer.66.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('SurveyAnswer.67.answer','11.	On a scale of 1 to 10, If 10 were the best... how satisfied were you with the professionalism of your Service Adviser?'); ?> <?php echo $this->Form->input('SurveyAnswer.67.answer', array('type' => 'select', 'options' => array(
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
										echo $this->Form->hidden('SurveyAnswer.67.question_id',array('value'=>'67'));
										echo $this->Form->hidden('SurveyAnswer.67.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<?php echo $this->Form->label('SurveyAnswer.68.answer','12.	Using that same scale, how would you rate your overall service experience?'); ?> <?php echo $this->Form->input('SurveyAnswer.68.answer', array('type' => 'select', 'options' => array(
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
										echo $this->Form->hidden('SurveyAnswer.68.question_id',array('value'=>'68'));
										echo $this->Form->hidden('SurveyAnswer.68.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>13.	My notes are forwarded to the management team at the dealership is there anything you would like to add?</label>
										<?php echo $this->Form->input('SurveyAnswer.69.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.69.question_id',array('value'=>'69'));
										echo $this->Form->hidden('SurveyAnswer.69.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>14.	Would you like to receive information on any upcoming special events or special promotions the dealership may have? If yes, may I have your email address please?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.78.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>''))?>
                                        <?php echo $this->Form->input('78.1', array('type' => 'email','class' => 'form-control','value'=>$email)); 
										echo $this->Form->hidden('SurveyAnswer.78.question_id',array('value'=>'78'));
										echo $this->Form->hidden('SurveyAnswer.78.bdc_survey_id',array('value'=>''));
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>Thank you for your time today and for giving the dealership your business.  Have a great day.</label>
										<div class="separator"></div>
									</div>
                                    <div class="col-md-10">
                                    <label>Customer Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.c_status',array('options'=>array(),'class'=>'form-control bdc_status','empty'=>'select','id'=>'customer_status','required'=>'required'));	
									?>
                                    <div class="separator"></div>
                                    </div>
                                    <div class="col-md-10">
                                    <label>DNC Status  &nbsp;</label><?php
									echo $this->Form->hidden('ServiceLeadsDms.dnc_status_old',array('value'=>$contact_info['ServiceLeadsDms']['dnc_status']));
									echo $this->Form->input('ServiceLeadsDms.dnc_status',array('options'=>array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email'),'class'=>'form-control bdc_status','empty'=>'select','required'=>'required','value'=>$contact_info['ServiceLeadsDms']['dnc_status']));	
									?>
                                    <div class="separator"></div>
                                    </div>
                                    <div id="callBackDiv" style="display:none;">
                                           <div class="col-md-10">
                                        <label>Call Back Date  &nbsp;</label>
										<div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
										<?php 
                                        
                                        echo $this->Form->input('BdcSurvey.call_back_date',array('type'=>'text','class'=>'form-control novalidate','placeholder'=>'Select Date'));	
                                        ?></div>
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
                                <input type="checkbox" name="alert_sales_group" id ="AlertSalesGroup" style="display:none;"  value="yes" />
                                    </div>
                                       <?php //if(in_array(AuthComponent::user('dealer_id'),array(2501,5000))){ ?>
                                  
                                    <div class="col-md-10">
                                <input type="checkbox" name="send_email" id ="SendEmail" style="display:none;"  value="yes" <?php echo ($dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />
                                    <div class="separator"></div>
                                    </div>
                                    <?php //} ?>
								</div>

							

							
								
							

							
							
						
						
						<div class="row">
							<div class="col-md-5">
								<a href="<?php echo $this->Html->url(array('action'=>'deals_main', $selected_lead_type )); ?>" class="btn btn-danger no-ajaxify" id="btn-cancel-survey" ><i class="fa fa-reply"></i> Cancel</a> <a class="btn btn-inverse" id="skip_lead" lead_id="<?php echo $this->request->params['pass']['0'];  ?>">Skip Lead</a>
							</div>
							<div class="col-md-7">
								<div class="pagination pull-right margin-none" >
									<!-- Wizard pagination controls -->
									<ul class="pagination margin-bottom-none margin-none">
										<!--<li class="primary previous first"><a href="#" class="no-ajaxify">First</a></li>
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
var search_all2;
var search_all;
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
		
$(".BdcInvalidLead").on('click',function(e){
		e.preventDefault();
		
		lead_id=$(this).attr('data-id');
		//$(this).parent().parent().remove();
		bootbox.confirm('Are you sure you want to make this lead invalid?',function(result){
		if(result){
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/bdc_leads/service_invalid_lead/"+lead_id,
			success: function(data){
				next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
				$("div[lead_row_id="+lead_id+"]").remove();
				$("#lead_details_content").html('');
				
				if(next_id){
				$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'service_lead_details')); ?>/"+next_id,
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
					url: "/bdc_leads/bdc_input_service_complete/"+next_id,
					success: function(data){
						
						$("#lead_details_content").html(data);
						var percentageToScroll = 100;
						var percentage = percentageToScroll/100;
						var height = $(document).scrollTop();
						var scrollAmount = height * (1 - percentage);
						$('#lead_details_content').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
						$('html,body').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
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
			url: "/bdc_leads/service_lead_details/selected_lead_type:/<?php echo $this->request->params['pass']['0'] ?>",
			success: function(data){
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
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert("Please enter a valid Email in Q14");
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
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert("Please enter a valid Email in Q14");
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
		
		if($("#SurveyAnswer62AnswerYes").is(':checked'))
		{
			$("#621").addClass('novalidate');
		}
		if($("#SurveyAnswer64AnswerNo").is(':checked'))
		{
			$("#641").addClass('novalidate');
		}
		if($("#SurveyAnswer78AnswerNo").is(':checked'))
		{
			$("#781").addClass('novalidate');
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
		value=$('#781').val();
		if($.trim(value)!='')
		{
			if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
				{
					
					$('#781').focus();
					validate=false;
				}
		}
		return validate;
	}
	
function submit_s_form()
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
	url: "/bdc_leads/service_leadsurvey",
	success: function(){
		  $.ajax({
		  type: "GET",
		  cache: false,
		  url: "/bdc_leads/service_search_result/load_first/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
		  success: function(data){
			  $("#search-result-content").html(data);
			  $('.ajax-loading').addClass('hide');
			  $("#BdcMainDiv").prepend('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Survey form submitted successfully</div>');
			  removeAlert();
			  
		  }
	  });
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
  url: "/bdc_leads/service_leadsurvey",
	success: function(){
	$.ajax({
	type: "GET",
	cache: false,
	url: "/bdc_leads/bdc_input_service_complete/"+next_id,
	success: function(data){
		
		$("#lead_details_content").html(data);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/bdc_leads/service_search_result/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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
	}
	});
	}
 });
  
}

function alert_email_confirm($fun)
{
	
	bootbox.alert({	message : '<input type="checkbox" id="AlertSalesEmail"  value="yes" <?php echo (						$dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />&nbsp;Send Email to Sales Group <br/><br/><input type="checkbox"  id ="AlertSendEmail" value="yes" <?php echo ($dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />&nbsp;Send Email to Service Group',
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
		if($("#AlertSalesEmail").is(":checked"))
		{
			$("#AlertSalesGroup").attr('checked','checked');
		}else
		{
			$("#AlertSalesGroup").removeAttr('checked');
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
	
});



</script>