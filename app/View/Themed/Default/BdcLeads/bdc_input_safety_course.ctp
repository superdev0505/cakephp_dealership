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
$email = $contact_info['BdcLead']['email'];
$fname = $contact_info['BdcLead']['first_name'];
$lname = $contact_info['BdcLead']['last_name'];
$id = $contact_info['BdcLead']['id'];
/*$id = $contact_info['Contact']['id'];
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
$mobile = $contact_info['BdcLead']['mobile'];
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$phone = $contact_info['BdcLead']['phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number);

$work = $contact_info['BdcLead']['work_number'];
$work_number = preg_replace('/[^0-9]+/', '', $work); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $work_number);
?>
<br />
<div class="innerLR">
	<!-- row -->
	<div class="row">
		<div class="col-md-12">
			<div class="wizard">
				<div class="widget ">
					<!-- Widget heading -->
					<div class="widget-head" style="height:70px;padding-left:5px;">
						Riders Safety Course:<strong><?php echo  $contact_info['BdcLead']['full_name'];?></strong>
                        &nbsp;&nbsp;<strong>Status:<?php echo $contact_info['BdcLead']['status']; ?><br /><strong><span><i class="fa fa-mobile"></i>&nbsp;Mobile :</span></strong><?php echo $cleaned ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Phone :</span></strong><?php echo $cleaned1 ?>&nbsp;&nbsp;&nbsp;<strong><span><i class="fa fa-phone"></i>&nbsp;Work :</span></strong><?php echo $cleaned2 ?>
					</div>
					<div class="widget-body"> 
						<?php echo $this->Form->create('SurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'BdcLeads','action'=>'add_survey'),'id'=>'SurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('BdcLead.id',array('value'=>$id)); ?>
						<div class="tab-content">
							

							<div class="row">
                            <div class="col-md-10">
                                    <label>CSR Status  &nbsp;</label><?php echo $this->Form->input('BdcSurvey.status',array('options'=>array('contact'=>'Contact','no contact'=>'No Contact','bad number'=>'Bad Number','voicemail'=>'Voicemail','call back'=>'Call Back','no number'=>'No Number'),'class'=>'form-control','empty'=>'select','required'=>'required'));
									echo $this->Form->hidden('BdcSurvey.dealer_id',array('value'=>$cid));
									echo $this->Form->hidden('BdcSurvey.user_id',array('value'=>$uid));
									echo $this->Form->hidden('BdcSurvey.bdc_lead_id',array('value'=>$id));
									echo $this->Form->hidden('BdcSurvey.survey_id',array('value'=>6));
									echo $this->Form->hidden('BdcSurvey.duration');
									echo $this->Form->hidden('BdcSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
									
									?><div class="separator"></div>
                                	</div>
                                    
									<div class="col-md-10">
										<label>Hello, I???m calling to see if <i style="font-size: 14px;"><?php echo $fname.' '.$lname; ?></i> is available?  Hi <i style="font-size: 14px;"><?php echo $fname.' '.$lname; ?></i>, my name is <i style="font-size: 14px;"><?php echo  $sperson; ?></i> calling on behalf of <i style="font-size: 14px;"><?php echo $dealer; ?></i>???s customer service.  If you have a moment, I would like to ask you a few quick questions regarding your recent completion of the Rider???s Safety course.</label>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>1.	How did you hear about the Rider???s Safety course?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.70.answer', array('type' => 'textarea','class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.70.question_id',array('value'=>'70'));
										echo $this->Form->hidden('SurveyAnswer.70.bdc_survey_id',array('value'=>''));					
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>2.	Was the class enjoyable for you? If no why not </label>
                                        <?php echo $this->Form->input('SurveyAnswer.71.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>''));
										echo $this->Form->input('71.1', array('type' => 'textarea','class' => 'form-control','value'=>'')); 
									echo $this->Form->hidden('SurveyAnswer.71.question_id',array('value'=>'71'));
										echo $this->Form->hidden('SurveyAnswer.71.bdc_survey_id',array('value'=>''));						
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>3.	Now that you have completed the course and have your license, do you have any plans to purchase a new or used motorcycle?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.72.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));  
										echo $this->Form->hidden('SurveyAnswer.72.question_id',array('value'=>'72'));
										echo $this->Form->hidden('SurveyAnswer.72.bdc_survey_id',array('value'=>''));					
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>4.	If yes, is there a particular time frame you are planning to purchase?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.73.answer', array('type' => 'select', 'options' => array(
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
), 'empty' => 'Select', 'selected' => '','label'=>false,'div'=>false, 'class' => 'form-control'));
					
										echo $this->Form->hidden('SurveyAnswer.73.question_id',array('value'=>'73'));
										echo $this->Form->hidden('SurveyAnswer.73.bdc_survey_id',array('value'=>''));					
?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>5.	Do you know what type of bike you would be interested in?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.74.answer', array('type' => 'textarea','class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.74.question_id',array('value'=>'74'));
										echo $this->Form->hidden('SurveyAnswer.74.bdc_survey_id',array('value'=>''));					
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>6.	Would you like to be notified of any upcoming special events or promotions the dealership may have?  If yes, may I have your email address please?</label>
                                        <?php echo $this->Form->input('SurveyAnswer.75.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>''));
										echo $this->Form->input('75.1', array('type' => 'email','class' => 'form-control','value'=>$email,'id'=>'Q75')); 
										echo $this->Form->hidden('SurveyAnswer.75.question_id',array('value'=>'75'));
										echo $this->Form->hidden('SurveyAnswer.75.bdc_survey_id',array('value'=>''));					
										
										?>
										<div class="separator"></div>
									</div>
									<div class="col-md-10">
										<label>	Thank you for your time.  Congratulations on the completion of the course and I hope you have a wonderful day.</label>
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
                                        
                                        echo $this->Form->input('BdcSurvey.call_back_date',array('class'=>'form-control novalidate','placeholder'=>'Select Date'));	
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
                                     <?php if(in_array(AuthComponent::user('dealer_id'),array(2501,5000))){ ?>
                                    <?php if ($dealer_info['DealerName']['bdc_alert']=='0'){ ?>
                                    <div class="col-md-10">
                                <input type="checkbox" name="send_email" value="yes" />&nbsp;Send Email to Manager
                                    <div class="separator"></div>
                                    </div>
                                    <?php }} ?>
								</div>
							

							

							
								
							
							
						</div>
						
						<div class="row">
							<div class="col-md-5">
								<a href="<?php echo $this->Html->url(array('action'=>'leads_main', $selected_lead_type )); ?>" class="btn btn-danger no-ajaxify" id="btn-cancel-survey" ><i class="fa fa-reply"></i> Cancel</a><a class="btn btn-inverse" id="skip_lead" lead_id="<?php echo $this->request->params['pass']['0'];  ?>">Skip Lead</a>
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
	
	$("a#skip_lead").on('click'function(event)
	{
		event.preventDefault();
		lead_id=$(this).attr('lead_id');
		next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
		if(next_id)
		{
			$.ajax({
					type: "GET",
					cache: false,
					url: "/bdc_leads/bdc_input_safety_course/"+next_id,
					success: function(data){
						
							
						bootbox.hideAll();
						scr_mode=$("#surveyViewToggle").attr('data-id');
						if(scr_mode=='full_screen'){
							
							$("#lead_details_content").html(data);
							var percentageToScroll = 100;
							var percentage = percentageToScroll/100;
							var height = $(document).scrollTop();
							var scrollAmount = height * (1 - percentage);
							$('#lead_details_content').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							$('html,body').animate({ scrollTop: scrollAmount }, 'slow', function () {
												    });
							}else
							{
									bootbox.dialog({
									message: data,
									title: survey_title
								}).find("div.modal-dialog").addClass("maxWidth");
							}
							
					}
					});
		}
		else
		{
			alert('There is no further lead.');
		}
		
	});
	
	$("a#btn-cancel-survey").on('click'function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/bdc_leads/lead_details/selected_lead_type:/<?php echo $this->request->params['pass']['0'] ?>",
			success: function(data){
				bootbox.hideAll();
				$("#lead_details_content").html(data);
			}
		});
		
	});
	
	$("a#next_lead").on('click'function(event)
	{
		event.preventDefault();
		if($("#BdcSurveyStatus").val()=='')
		{
			alert('Please Select Survey Status');
			return false;
		}
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29'&& $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert("Please Enter valid Email address in Q6");
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
			url: "/bdc_leads/add_survey",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "/bdc_leads/bdc_input_safety_course/"+next_id,
					success: function(data){
						bootbox.hideAll();
						
						scr_mode=$("#surveyViewToggle").attr('data-id');
						if(scr_mode=='full_screen'){
						$("#lead_details_content").html(data);
						}else{
							bootbox.dialog({
									message: data,
									title: survey_title
								}).find("div.modal-dialog").addClass("maxWidth");
						}
						$.ajax({
							type: "GET",
							cache: false,
							url:  "/bdc_leads/search_result/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29'&& $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert("Please Enter valid Email address in Q6");
				return false;
			}
		}
		if($("#customer_status").val=='')
		{
			alert('Please Select Customer Status');
			return false;
		}
		$('.ajax-loading').removeClass('hide');
		$(this).attr('disabled','disabled');
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
			url: "/bdc_leads/add_survey",
			success: function(){
					$.ajax({
					type: "GET",
					cache: false,
					url: "/bdc_leads/search_result/load_first/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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
		
	});
	
	function validateForm()
	{
		validate=true;
		if($("#SurveyAnswer75AnswerNo").is(':checked'))
		{
			$("#Q75").addClass('novalidate');
		}
		if($("#SurveyAnswer71AnswerYes").is(':checked'))
		{
			$("#711").addClass('novalidate');
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
		value=$('#Q75').val();
		if($.trim(value)!='')
		{
			if(!value.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
				{
					
					$('#Q75').focus();
					validate=false;
				}
		}
		return validate;
	}

	
});
</script>