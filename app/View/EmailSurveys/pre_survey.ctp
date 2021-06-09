<?php 
$id = $contact_info['BdcLead']['id'];
$cid = $contact_info['BdcLead']['company_id'];
$fname = $contact_info['BdcLead']['first_name'];
$lname = $contact_info['BdcLead']['last_name'];
$email = $contact_info['BdcLead']['email'];
$dealer = $contact_info['BdcLead']['company'];
$uid = $contact_info['BdcLead']['user_id'];

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

<div class="page-header">
    <h1><?php echo $dealer; ?>  <small>Feedback Survey</small></h1>
</div>
<div class="container" id="cnt1">
    <div class="col-md-1">
    </div>
<div class="col-md-10">    
<div class="panel panel-primary">
	<!-- row -->
	<div class="panel-heading">  <h3 class="panel-title">
                    <span class="fa fa-question-circle"></span>&nbsp;Dealership Feedback Survey</h3></div>
					<div class="panel-body"> 
                   	<?php echo $this->Form->create('EmailSurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'email_surveys','action'=>'save_survey',$link),'id'=>'EmailSurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('BdcLead.id',array('value'=>$id)); ?>
						

								<div class="row">
                               
                                 <?php echo $this->Form->hidden('EmailSurvey.status',array('value' => 'contact'));
								echo $this->Form->hidden('BdcLead.modified',array('value'=>$contact_info['BdcLead']['modified']));						
							
								echo $this->Form->hidden('EmailSurvey.survey_id',array('value'=>$survey_id));
								echo $this->Form->hidden('EmailSurvey.dealer_id',array('value'=>$cid));
								echo $this->Form->hidden('EmailSurvey.user_id',array('value'=>$uid));
								echo $this->Form->hidden('EmailSurvey.bdc_lead_id',array('value'=>$id));
								echo $this->Form->hidden('EmailSurvey.duration');
								echo $this->Form->hidden('EmailSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
								echo $this->Form->hidden('BdcLead.oldemail',array('value'=>$email));
									?>
                                  
                           
                                   
                                	
									<div class="col-md-10">
									<label>	Hello  <i style="font-size: 14px;"><?php echo  $contact_info['BdcLead']['full_name']; ?></i> ,<br/><br/>
                    Please answer some quick questions about your visit to the dealership if you have a moment.                
                                    
                                    </label>
										<div class="separator"></div>
									</div>
																
									<?php 
									$i=1;
									foreach($survey_questions as $question){ 
									$question_id = $question['Question']['id'];
									echo $this->Form->hidden('EmailSurveyAnswer.'.$question_id.'.question_id',array('value'=>$question_id));
									echo $this->Form->hidden('EmailSurveyAnswer.'.$question_id.'.email_survey_id',array('value'=>''));
									
									?>
                                    <div class="col-md-10">
                                    <label><?php echo $i." ".$question['Question']['name']; ?></label>
                                    <?php if($question['Question']['question_type']=='textarea'){ 
									echo $this->Form->input('EmailSurveyAnswer.'.$question_id.'.answer', array('type' => 'textarea','class' => 'form-control','value'=>'')); 
									}elseif($question['Question']['question_type']=='radio'){
										$q_options = explode(',',$question['Question']['q_options']);
										$q_options = array_combine($q_options,$q_options);
										echo $this->Form->input('EmailSurveyAnswer.'.$question_id.'.answer', array('options' => $q_options, 'type' => 'radio', 'class' => 'form-control','value'=>''));
									}elseif($question['Question']['question_type'] == 'radio&textarea'){
										$q_options = explode(',',$question['Question']['q_options']);
										$q_options = array_combine($q_options,$q_options);
										echo $this->Form->input('EmailSurveyAnswer.'.$question_id.'.answer', array('options' => $q_options, 'type' => 'radio', 'class' => 'form-control','value'=>''));
										if(!empty($question['Question']['csr_notes']))
										{
											echo '<label> &nbsp;'.$question['Question']['csr_notes'].'</label>';
										}
										echo $this->Form->input($question_id.'.1', array('type' => 'textarea','class' => 'form-control','value'=>'')); 
										 }elseif($question['Question']['question_type'] == 'select'){
										$q_options = explode(',',$question['Question']['q_options']);
										$q_options = array_combine($q_options,$q_options);
										echo $this->Form->input('EmailSurveyAnswer.'.$question_id.'.answer', array('options' => $q_options, 'type' => 'select', 'class' => 'form-control', 'empty' => 'Select','label' =>false,'div' => false));
										 }
										
										 ?>
                                    
									
                                    <div class="separator"></div>
                                    </div>
                                    <?php 
									$i++;
									} ?>					
									
									
									
									
									
									
									
									<div class="col-md-10">
										<label>	Thank you for your time today and have a great day!</label>
										<div class="separator"></div>
									</div>
                                    <div class="col-md-10">
                                    <label>Customer Status  &nbsp;</label><?php echo $this->Form->input('EmailSurvey.c_status',array('options'=>$bdc_statuses['contact'],'class'=>'form-control bdc_status','empty'=>'select','id'=>'customer_status','required'=>'required'));	
									?>
                                    <div class="separator"></div>
                                    </div>
                                    
                                    </div>
                                    
                               </div>
                              <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-4">
                                   
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" style="font-size:20px;" class="btn btn-success btn-sm btn-block">
                                        <span class="fa fa-send"></span>&nbsp;Submit</button>
                                </div>
                            </div>
            </div>  		
						
						<?php echo $this->Form->end(); ?>
					</div>
				</div>	
			</div>
			</div>



<style>
#cnt1 {
    background-color: #d9edf7;
    margin-bottom: 70px;
}
.separator {
  padding: 14px 0 3px 0;
  display: block;
}
.form-inline .form-control {
  display: inline-block;
  width:100%;
}

</style>