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

$id = $contact_info['BdcLead']['id'];
//$cid = $contact_info['Contact']['company_id'];
//$dealer = $contact_info['Contact']['company'];
$fname = $contact_info['BdcLead']['first_name'];
$lname = $contact_info['BdcLead']['last_name'];
$email = $contact_info['BdcLead']['email'];


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
?>
<br />
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget  widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head" style="height:140px;padding-left:5px;font-size:12px;line-height:25px;">
                   <?php /*?> <a href="#" class="btn btn-danger BdcInvalidLead pull-right no-ajaxify" data-id="<?php echo $contact_info['BdcLead']['id']; ?>" style="margin-top:5px;" >Invalid Lead</a><?php */?>
						<strong>Event Script: </strong><?php echo  $contact_info['BdcLead']['full_name'];?>-
                        
						&nbsp;<strong>Status: </strong><?php echo $contact_info['BdcLead']['status']; ?>&nbsp;&nbsp;<strong>Lead type: </strong><?php echo $contactStatuses[$contact_info['BdcLead']['contact_status_id']]; ?>
                        <br /><strong><span><i class="fa fa-mobile"></i>&nbsp;Mobile :</span></strong><?php echo $cleaned ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Phone :</span></strong><?php echo $cleaned1 ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Work :</span></strong><?php echo $cleaned2 ?>&nbsp;&nbsp; <strong>Attempt : </strong> <?php echo $total_attempt; ?><br />
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
				echo '<br/><strong>No Event Call Survey taken yet</strong>';
			}
			/*if(isset($last_survey_answer))
			{
				echo '<br /><strong>CSR Notes : </strong><span>'.$last_survey_answer['SurveyAnswer']['answer'].'</span>';
			}*/
			?><br/>
            <strong>Note : </strong><span style="font-size:12px;"><?php echo $this->Text->truncate(strip_tags($contact_info['BdcLead']['notes']),250); ?> </span> 
					</div>
					<div class="widget-body"> 
                    <?php echo $this->element('other_location_bdc_leads'); ?>
						<?php echo $this->Form->create('SurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'BdcLeads','action'=>'event_survey_add'),'id'=>'SurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('BdcLead.id',array('value'=>$id)); ?>
						

								<div class="row">
                               
                            <div class="col-md-10">
                                    <label>CSR Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.status',array('options'=>array('contact'=>'Contact','no contact'=>'No Contact','bad number'=>'Bad Number','voicemail'=>'Voicemail','call back'=>'Call Back','no number'=>'No Number'),'class'=>'form-control','empty'=>'select','required'=>'required'));
								echo $this->Form->hidden('BdcLead.modified',array('value'=>$contact_info['BdcLead']['modified']));
								echo $this->Form->hidden('BdcSurvey.survey_id',array('value'=>13));
								echo $this->Form->hidden('BdcSurvey.dealer_id',array('value'=>$cid));
								echo $this->Form->hidden('BdcSurvey.user_id',array('value'=>$uid));
								echo $this->Form->hidden('BdcSurvey.bdc_lead_id',array('value'=>$id));
								echo $this->Form->hidden('BdcSurvey.duration');
								echo $this->Form->hidden('BdcSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
									?>
                                     <div class="separator"></div>
                                    </div>
                           <?php // Voicemail Script ?>
                           <div class="col-md-10" id="VoicemailScript" style="display:none">
                                  <h5><strong><i>VOICE MAIL SCRIPT EVENT SURVEY CALLS</i></strong></h5>
                                <label>  Hi this message is for <i style="font-size: 14px;color:#4193d0;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i>.  My name is <i style="font-size: 14px;color:#4193d0;"><?php echo  $sperson; ?></i> and I am calling on behalf of

 <i style="font-size: 14px;color:#4193d0;"><?php echo $dealer; ?></i> . <br />

 We wanted to make sure you received an invite down to the Christmas Open House this December 12th from 9am-5pm. There will be plenty of great activities going on. Spin the wheel for prizes including a chance inside the Cash Machine! Pic's with Santa, Food is being served and benefits the Salvation Army. Receive 20% almost everything in motorclothes and 15% off all parts and accessories, and a 110 ci bolt on kit included with every new 2016 H-D  Big Twin in stock. 
<br/>
</label>

 <div class="separator"></div>
 <hr />
                                  </div>
                           
                                   
                                	
									<div class="col-md-10">
									<label>Hello, I am calling to see if <i style="font-size: 14px;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i> is available?</label> <?php /*echo $this->Form->input('SurveyAnswer.18.answer', array('type' => 'select', 'options' => array(
											'Yes' => 'Yes',
											'No' => 'No'
											), 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control'));
										echo $this->Form->hidden('SurveyAnswer.18.question_id',array('value'=>'18'));
										echo $this->Form->hidden('SurveyAnswer.18.bdc_survey_id',array('value'=>''));*/
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>	Hi <i style="font-size: 14px;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i>, my name is <i style="font-size: 14px;"><?php echo  $sperson; ?></i> and I am
										calling on behalf of <i style="font-size: 14px;"><?php echo $dealer; ?></i>.</label>             
              <br />
              <label> We wanted to make sure you received an invite down to the Christmas Open House this December 12th from 9am-5pm. There will be plenty of great activities going on. Spin the wheel for prizes including a chance inside the Cash Machine! Pic's with Santa, Food is being served and benefits the Salvation Army. Receive 20% almost everything in motorclothes and 15% off all parts and accessories, and a 110 ci bolt on kit included with every new 2016 H-D  Big Twin in stock.
               </label>   
                         
										<div class="separator"></div>
									</div>
									
									
									<div class="col-md-10">
										<label> Does this sound like something you might want to attend?
										<?php echo $this->Form->input('SurveyAnswer.97.answer', array('type' => 'select','class' => 'form-control','options' => array('maybe' => 'Maybe','yes' => 'Yes','no' => 'No','maybe' => 'Maybe'),'empty'=>'select')); 
										
										echo $this->Form->hidden('SurveyAnswer.97.question_id',array('value'=>'97'));
										echo $this->Form->hidden('SurveyAnswer.97.bdc_survey_id',array('value'=>''));
										?>
                                        </label> 
										<div class="separator"></div>
									</div>
									
					
									<div class="col-md-10">
										<label>Comments
										<?php //echo $this->Form->input('SurveyAnswer.98.answer', array('options' => array('n/a' => 'N/A','yes' => 'Yes','no' => 'No','maybe' => 'Maybe'), 'type' => 'select', 'class' => 'form-control'));?></label>
                                        <?php
										echo $this->Form->input('SurveyAnswer.98.answer', array('type' => 'textarea','class' => 'form-control novalidate'));
										echo $this->Form->hidden('SurveyAnswer.98.question_id',array('value'=>'98'));
										echo $this->Form->hidden('SurveyAnswer.98.bdc_survey_id',array('value'=>''));
										
										?>
										<div class="separator"></div>
										
									</div>
									
									<div class="col-md-10">
                                   	<label>CSR if yes: GREAT! We look forward to seeing you down there!
                                 <br />                           
CSR if No: Well, we are sorry to hear that but hope to see you another time!  <br />                    
                                        
                                         </label>
                                                    <label>Dealership hours and info:<br />

Lacrosse Area Harley-Davidson <br />

1116 Oak Forest Drive, Onalaska, WI 54650<br />
PH: 608-783-6112<br />
Hours: Tuesday - Friday 10-7 / Saturday <br/>
SERVICE OPEN AT 8:30 AM (WALK-IN ONLY)</label>
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
                                        <label>Call Back Date  &nbsp;</label>
										<div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
										<?php 
                                        
                                        echo $this->Form->input('BdcSurvey.call_back_date',array('type' =>'text','class'=>'form-control novalidate','placeholder'=>'Select Date'));	
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
                                 <?php //echo $this->Html->link('Lead Appointment',array('controller'=>'events','action'=>'lead_appointment',$contact_info['BdcLead']['id']),array('id'=>'lead_appointment','class'=>'btn btn-primary no-ajaxify'));	
									?>
                                    
                                    </div>
                                      <?php //if(in_array(AuthComponent::user('dealer_id'),array(2501,5000))){ ?>
                                  
                                    <div class="col-md-10">
                               <label> <input type="checkbox" name="send_email" id ="SendEmail" value="yes" />
                               Send Email to Sales Group
                               </label>
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
$bdc_statuses['contact'] = array(79 => 'Customer Attending',80 => 'Customer Not Attending',81 => 'Customer Unsure');
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
		
	$("#SurveyAnswer97Answer").on('change',function(){
		$res= $(this).val();
		$c_val = '';
		if($res == 'yes')
		{
			$c_val = '79'
		}else if($res == 'no')
		{
			$c_val = '80'
		}else if($res == 'maybe')
		{
			$c_val = '81'
		}
		
		$("#customer_status").val($c_val);
		
		});
		
	$("#SurveyAnswer98Answer").on('change',function(){
		$("#981").slideUp();
		$val = $(this).val();
		if($val == 'yes')
		{
			$("#981").slideDown();
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
			url:  "/bdc_leads/bdc_invalid_lead/"+lead_id,
			success: function(data){
				next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
				$("div[lead_row_id="+lead_id+"]").remove();
				$("#lead_details_content").html('');
				
				if(next_id){
				$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'lead_details','event_solds' => 'yes')); ?>/"+next_id,
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
							$("#SurveyAnswer94Answer").val('');
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
								$("#customer_status").val(41);
								$("#SurveyAnswer94Answer").val('n/a');
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
					url: "/bdc_leads/dealer_event_survey/"+next_id+"/13",
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
			url: "/bdc_leads/lead_details/event_solds:yes/selected_lead_type:/<?php echo $this->request->params['pass']['0'] ?>",
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
			if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
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
					title: "Lead Appointment - <?php echo $contact_info['BdcLead']['first_name'] . "&nbsp;" . $contact_info['BdcLead']['last_name'].' '.$cleaned.'  Sperson:'.$contact_info['BdcLead']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
				
			}
		});
										  
										  
										  });	
	


function alert_email_confirm($fun)
{
			if($fun==1)
			{
				submit_s_form();
			}else
			{
				submit_next();
			}
	/*bootbox.alert({	message : '<input type="checkbox" id="AlertSendEmail" name="send_email" value="yes" <?php echo (						$dealer_info['DealerName']['bdc_alert']==0)?'checked="checked"':''; ?> />&nbsp;Send Email to Manager',
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
		});*/
	

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
			url: "/bdc_leads/event_survey_add",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "/bdc_leads/dealer_event_survey/"+next_id+"/13",
					success: function(data){
						
						bootbox.hideAll();
						$load_first = '';
						scr_mode=$("#surveyViewToggle").attr('data-id');
						if(scr_mode=='full_screen'){
						$("#lead_details_content").html(data);
						}else{
							$load_first = 'load_first';
							bootbox.dialog({
									message: data,
									title: survey_title,
									animate: false
								}).find("div.modal-dialog").addClass("maxWidth");
						}
						
						$.ajax({
							type: "GET",
							cache: false,
							url:  "/bdc_leads/event_sold_result/"+$load_first+"/lead_action:event_solds/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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
			url: "/bdc_leads/event_survey_add",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "/bdc_leads/event_sold_result/lead_action:event_solds/load_first/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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