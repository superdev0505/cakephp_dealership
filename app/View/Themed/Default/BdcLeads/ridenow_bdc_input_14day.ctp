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
$cid = $contact_info['BdcLead']['company_id'];
//$dealer = $contact_info['Contact']['company'];
$email = $contact_info['BdcLead']['email'];
$fname = $contact_info['BdcLead']['first_name'];
$lname = $contact_info['BdcLead']['last_name'];
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
<style>
.borderless td, .borderless th {
    border: none!important;
	border-top:none!important;
}
table.alternate_color tr:nth-child(even){
background:#E1EFF8;
}
</style>
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
					<div class="widget-head bg-primary" style="padding-left:5px;">          
        			<span style="font-weight:200;font-size:18px;">Log Customer Call</span>
                    <small class="pull-right">Today's Date: <?php echo date('F d, Y,h:i A'); ?></small>
					</div>
					<div class="widget-body"> 
                    <div class="row">
                       <table class="table borderless">
                       <tr>
                       <td colspan="4"><strong>Log Information:</strong></td>
                       </tr>
                       <tr><td><label>CSI Date</label></td>
                       <td><?php echo date('F d, Y,h:i A',strtotime($sold_date['LeadSold']['modified'])); ?></td>
                       <td><label>DealerShip Staff:</label></td><td><?php echo $contact_info['BdcLead']['sperson']; ?></td>
                       </tr>
                       <tr>
                       <td><label>Logged Date:</label></td><td><?php echo date('F d, Y,h:i A',strtotime($contact_info['BdcLead']['created'])); ?></td>
                       <td><label>Lead Id # :</label></td><td><?php echo $contact_info['BdcLead']['id']; ?></td>
                       </tr>
                       <tr>
                       <td><label>Location:</label></td><td><?php echo $dealer; ?></td>
                        
                       </tr>
                       </table>
                      	<table class="table borderless">
                       <tr>
                       <td colspan="4" class="bg-primary"><strong>Purchaser:</strong></td>
                       </tr>
                       <tr>
                       <td><label>First Name:</label></td><td><input type="text"  value="<?php echo $contact_info['BdcLead']['first_name']; ?>" /></td>
                        <td><label>Last Name:</label></td><td><input type="text"  value="<?php echo $contact_info['BdcLead']['last_name']; ?>" /></td>
                       </tr>
                       <tr>
                       <td><label>Phone1:</label></td><td><input type="text"  value="<?php echo $cleaned; ?>" /></td>
                        <td><label>Phone2:</label></td><td><input type="text"  value="<?php echo $cleaned1; ?>" /></td>
                       </tr>
                        <tr>
                       <td><label>Phone3:</label></td><td><input type="text"  value="<?php echo $cleaned2; ?>" /></td>
                        <td><label>Email:</label></td><td><input type="text" style="width:250px;"  value="<?php echo $contact_info['BdcLead']['email']; ?>" /></td>
                       </tr>
                      
                       
                        <tr>
                       <td colspan="4" class="bg-primary"><strong>Product Information:</strong></td>
                       </tr>
                         <tr>
                       <td><label>Model:</label></td><td><input type="text"  value="<?php echo $contact_info['BdcLead']['model']; ?>" /></td>
                        <td><label>Final Step :</label></td><td><input type="text"  value="<?php echo $contact_info['BdcLead']['sales_step']; ?>" /></td>
                       </tr>
                       <tr>
                       <td><label>Store Comments:</label></td>
                       <td colspan="3"><textarea style="width:80%" rows="4"><?php echo $contact_info['BdcLead']['notes']; ?></textarea></td>
                       </tr>
                       </table>	
                            
                      </div>
                      <div class="row">
			<div class="col-md-12">
<h3>Log History</h3>
<?php if(!empty($history_ar)){ ?>

<!-- Widget -->
<div class="widget widget-tabs widget-tabs-responsive history_tabs">

	<!-- Widget heading -->
	<div class="widget-head ">
		<ul>
			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>
			<li  <?php echo ($cnt == 1)? 'class="active"' : '' ;  ?>         >
				<a class="glyphicons <?php echo $value;  ?>" href="#content_<?php echo preg_replace("/\s|\(|\)/", "_", $key);  ?>" data-toggle="tab">
					<i></i><span><?php echo $key;  ?> (<?php echo count($history_ar[$key]);  ?>) </span>
				</a>
			</li>	
			<?php $cnt++; } }  ?>

			<?php
			$history_others = array(); 
			foreach ($history_ar as $key => $value) { 
				if(!isset($history_types[$key])){
					foreach($value as $v){
						$history_others[] = $v;	
					}
			 	}
			 }

			 if(!empty($history_others)){
			?>
			<li >
				<a class="glyphicons log_book" href="#content_others" data-toggle="tab">
					<i></i><span>Others (<?php echo count($history_others);  ?>) </span>
				</a>
			</li>

			<?php  } ?>


		</ul>
	</div>
	<!-- // Widget heading END -->
	
	<div class="widget-body"  style="max-height:400px;overflow-y:auto;">
		<div class="tab-content">
		
				

			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>	
			<div id="content_<?php echo  preg_replace("/\s|\(|\)/", "_", $key);  ?>" class="tab-pane <?php echo ($cnt == 1)? 'active' : '' ;  ?>">
				<?php echo $this->element('history_content', array('htype' => $key,'history'=>$history_ar[$key])); ?>
			</div>
			<?php $cnt++; } }  ?>

			<?php
			 if(!empty($history_others)){
			?>
			<div id="content_others" class="tab-pane">
				<?php echo $this->element('history_content', array('htype' => "",'history'=>$history_others)); ?>
			</div>
			<?php  } ?>
			
		</div>
	</div>
</div>
<!-- // Widget END -->
<?php  }else{ ?>

<h3>History not available</h3>
<?php  } ?>


			</div>
             <div class="separator"></div>
		</div>
                    
                    
						<?php echo $this->Form->create('SurveyAnswer', array('class' => 'form-inline apply-nolazy','url'=>array('controller'=>'BdcLeads','action'=>'add_survey'),'id'=>'SurveyAnswer')); ?>
                        <?php echo $this->Form->hidden('BdcLead.id',array('value'=>$id));
							echo $this->Form->hidden('BdcSurvey.switch_survey_id',array('value'=>$switch_survey_id));
							echo $this->Form->hidden('BdcSurvey.survey_id',array('value'=>3));
							echo $this->Form->hidden('BdcSurvey.dealer_id',array('value'=>$cid));
							echo $this->Form->hidden('BdcSurvey.user_id',array('value'=>$uid));
							echo $this->Form->hidden('BdcSurvey.bdc_lead_id',array('value'=>$id));
							echo $this->Form->hidden('BdcSurvey.duration');
							echo $this->Form->hidden('BdcSurvey.lead_sales_step',array('value'=>$contact_info['BdcLead']['sales_step']));
						
						 ?>

							


								<div class="row">
                                <table class="table borderless">
                               <tr class="bg-primary">
                                <td colspan="3"><strong>Call Center Information:</strong></td>
                                <td colspan="3"><strong>Logged In As:</strong> &nbsp; <?php echo AuthComponent::user('full_name');  ?></td>
                               </tr>
                               <tr>
                               <td><strong class="text-primary">CSR Planner</strong></td>
                                <td><strong>CallBack</strong></td>
                                <td><div class="input-group date" style="width:200px" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
										<?php 
                                        
                                        echo $this->Form->input('BdcSurvey.call_back_date',array('type' =>'text','class'=>'form-control novalidate','placeholder'=>'Select Date'));	
                                        ?></div></td>
                              
                               
                                  <td> <div class="input-group bootstrap-timepicker" style="margin-left:15px;width:200px;">
															<?php echo $this->Form->input('BdcSurvey.call_back_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
															<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														</div>	</td>
                                                          
                               </tr>
                               </table>
                               
                             <table class="table borderless">
                             <tr style="background:#E1EFF8;">
                             <td><label>CSR Status</label></td>
                             <td><?php echo $this->Form->input('BdcSurvey.status',array('options'=>array('contact'=>'Contact','no contact'=>'No Contact','bad number'=>'Bad Number','voicemail'=>'Voicemail','call back'=>'Call Back','no number'=>'No Number'),'class'=>'form-control','empty'=>'select','required'=>'required'));
								
									?></td>
                               <td ><label>Customer Status</label></td>
                               <td><?php echo $this->Form->input('BdcSurvey.c_status',array('options'=>array(),'class'=>'form-control bdc_status','empty'=>'select','id'=>'customer_status','required'=>'required'));	
									?></td>
                                    <td><label>Call Attempt</label></td>
                                     <td><?php
									 $range = range(1,6);
									 $range = array_combine($range,$range);
									 echo $this->Form->input('call_attempts',array('type' => 'select','options' => $range,'label' => false,'div' =>false,'value' => $total_attempt));
									  ?></td>
                             </tr>  
                              </table>
                             <table class="border borderless alternate_color">
                             <tr>
                             <td colspan="2"><?php echo '<label>1.	Overall how satisfied are you with your purchase experience with '. $dealer .' (CSI)</label>';
							 echo $this->Form->hidden('SurveyAnswer.103.question_id',array('value'=>'103'));
							echo $this->Form->hidden('SurveyAnswer.103.bdc_survey_id',array('value'=>''));
							  ?><?php echo $this->Form->input('SurveyAnswer.103.answer', array('type' => 'textarea', 'empty' => 'Select','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
                                
                              </td>
                             </tr>
                             <tr>
                             <td colspan="2"><label>2.	The quality of your <?php echo $contact_info['BdcLead']['model']; ?></label>
                             <?php echo $this->Form->input('SurveyAnswer.104.answer', array('type' => 'textarea', 'class' => 'form-control'));
										echo $this->Form->hidden('SurveyAnswer.104.question_id',array('value'=>'104'));
										echo $this->Form->hidden('SurveyAnswer.104.bdc_survey_id',array('value'=>''));
										?>
                                          
                             </td>
                             </tr>
                             <tr>
                             <td ><label>3.	Based on your experience at <?php echo $dealer; ?> (CSI),how likely  would you be to return to the dealership to purchase a vehicle</label></td><td>
                             <?php echo $this->Form->input('SurveyAnswer.105.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'select', 'class' => 'form-control','empty'=>'Select')); 
										
										echo $this->Form->hidden('SurveyAnswer.105.question_id',array('value'=>'105'));
										echo $this->Form->hidden('SurveyAnswer.105.bdc_survey_id',array('value'=>''));
										?> 
                                         
                             </td>
                             </tr>
                             <tr>
                             <td><label>4.	Recomment the dealership to a friend </label>
							 </td><td>
							 <?php echo $this->Form->input('SurveyAnswer.106.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No','Maybe' =>'Maybe'), 'type' => 'select', 'class' => 'form-control','empty'=>'Select')); 
										echo $this->Form->hidden('SurveyAnswer.106.question_id',array('value'=>'106'));
										echo $this->Form->hidden('SurveyAnswer.106.bdc_survey_id',array('value'=>''));
										?> 
                                          
                                        </td>
                             </tr>
                             <tr>
                             <td><label>5.	Service your new vehicle at this dealership</label>
							 </td><td>
							 <?php
							  echo $this->Form->input('SurveyAnswer.107.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No','Maybe' =>'Maybe'), 'type' => 'select', 'class' => 'form-control','empty'=>'Select'));
							 echo $this->Form->hidden('SurveyAnswer.107.question_id',array('value'=>'107'));
							 echo $this->Form->hidden('SurveyAnswer.107.bdc_survey_id',array('value'=>''));
										
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td colspan="2"><label>6. Why did you decided to purchase your vehicle at <?php echo $dealer ?>(CSI)?</label><?php echo $this->Form->input('SurveyAnswer.108.answer', array( 'type' => 'textarea', 'class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.108.question_id',array('value'=>'108'));
										echo $this->Form->hidden('SurveyAnswer.108.bdc_survey_id',array('value'=>''));
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td><label>7.	Have you purchased from <?php echo $dealer; ?> before?</label></td>
							 <td>
							 <?php echo $this->Form->input('SurveyAnswer.109.answer', array('options' => array('Yes'=>'Yes', 'No'=>'No'), 'type' => 'radio', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.109.question_id',array('value'=>'109'));
										echo $this->Form->hidden('SurveyAnswer.109.bdc_survey_id',array('value'=>''));
										
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td colspan="2"><label>8.	If yes, how did this compare to your previous purchase experince?</label><?php echo $this->Form->input('SurveyAnswer.110.answer', array( 'type' => 'textarea', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.110.question_id',array('value'=>'110'));
										echo $this->Form->hidden('SurveyAnswer.110.bdc_survey_id',array('value'=>''));
										
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td><?php echo '<label>9.	What is your rating of the dealership? </label>'; ?></td>
                             <td><?php echo $this->Form->input('SurveyAnswer.111.answer', array('type' => 'select', 'options' => array(
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
										
										echo $this->Form->hidden('SurveyAnswer.111.question_id',array('value'=>'111'));
										echo $this->Form->hidden('SurveyAnswer.111.bdc_survey_id',array('value'=>''));
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td><?php echo '<label>10.	What is your rating of the salesperson?</label>'; ?>
							 </td><td>
							 <?php echo $this->Form->input('SurveyAnswer.112.answer', array('type' => 'select', 'options' => array(
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
										echo $this->Form->hidden('SurveyAnswer.112.question_id',array('value'=>'112'));
										echo $this->Form->hidden('SurveyAnswer.112.bdc_survey_id',array('value'=>''));
										?>
                                         
                                        </td>
                             </tr>
                             <tr>
                             <td><label>11.	What is your rating of the purchase transaction process?</label></td>
							 <td><?php echo $this->Form->input('SurveyAnswer.113.answer', array('options' =>  array(
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
											), 'type' => 'select', 'class' => 'form-control','empty'=>'Select')); 
										echo $this->Form->hidden('SurveyAnswer.113.question_id',array('value'=>'113'));
										echo $this->Form->hidden('SurveyAnswer.113.bdc_survey_id',array('value'=>''));
										
										?>
                                        
                                        </td>
                             </tr>
                             <tr>
                             <td><label>12.	What is your rating of the delivery process?</label></td>
							 <td><?php echo $this->Form->input('SurveyAnswer.114.answer', array('options' => array(
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
											), 'type' => 'select',  'class' => 'form-control','empty'=>'Select')); 
										echo $this->Form->hidden('SurveyAnswer.114.question_id',array('value'=>'114'));
										echo $this->Form->hidden('SurveyAnswer.114.bdc_survey_id',array('value'=>''));
										?>
                                         
                                        </td>
                             </tr>
                            <tr>
                            <td colspan="2"><label>13.	At any point were there any concern which need or needed to be addressed?</label><?php echo $this->Form->input('SurveyAnswer.115.answer', array('type' => 'textarea','class' => 'form-control','value'=>''));
										echo $this->Form->hidden('SurveyAnswer.115.question_id',array('value'=>'115'));
										echo $this->Form->hidden('SurveyAnswer.115.bdc_survey_id',array('value'=>''));
										
										?>
                                          
                                        </td>
                            </tr> 
                            <tr>
                            <td colspan="2"><label>14.	If yes how would you rate the following:</label></td>
                            </tr>
                            <tr>
                            <td><label>Efforts of the dealership to resolve concern?</label></td>
                            <td>
							<?php echo $this->Form->input('SurveyAnswer.116.answer', array('options' => array(
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
											), 'type' => 'select',  'class' => 'form-control novalidate','empty'=>'Select'));
									
										echo $this->Form->hidden('SurveyAnswer.116.question_id',array('value'=>'116'));
										echo $this->Form->hidden('SurveyAnswer.116.bdc_survey_id',array('value'=>''));
										
										?>
                                         
                                        </td>
                            </tr>
                            <tr>
                            <td><label>Outcome of concern</label></td>
                            <td> 
							<?php echo $this->Form->input('SurveyAnswer.117.answer', array('options' => array(
											'resolved' => 'Resolved',
											'Not Resolved' => 'Not Resolved',
											
											), 'type' => 'select',  'class' => 'form-control novalidate','empty'=>'Select'));
									
										echo $this->Form->hidden('SurveyAnswer.117.question_id',array('value'=>'117'));
										echo $this->Form->hidden('SurveyAnswer.117.bdc_survey_id',array('value'=>''));
										
										?>
                                        
                                        </td>
                            </tr>
                            <tr>
                            <td colspan="2"><label>15.	What aspects of your purchase experience did you like most?</label>			<?php echo $this->Form->input('SurveyAnswer.118.answer', array( 'type' => 'textarea', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.118.question_id',array('value'=>'118'));
										echo $this->Form->hidden('SurveyAnswer.118.bdc_survey_id',array('value'=>''));
										
										?>
                                         
                                        </td>
                            </tr>
                            <tr>
                            <td colspan="2"><label>16.	What aspects of your purchase experience could have been improved?</label>
							<?php echo $this->Form->input('SurveyAnswer.119.answer', array( 'type' => 'textarea', 'class' => 'form-control','value'=>'')); 
										echo $this->Form->hidden('SurveyAnswer.119.question_id',array('value'=>'119'));
										echo $this->Form->hidden('SurveyAnswer.119.bdc_survey_id',array('value'=>''));
										
										?>
                                        
                                       </td>
                            </tr>
                             
                             </table>   
                                          			                       
                   						
							
                                    
                                       
                                    
                                    
									 <div class="separator"></div>
                                    
                                    <div class="col-md-10">
                                    <label>DNC Status  &nbsp;</label><?php 
									echo $this->Form->hidden('BdcLead.dnc_status_old',array('value'=>$contact_info['BdcLead']['dnc_status']));
									echo $this->Form->input('BdcLead.dnc_status',array('options'=>array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email'),'class'=>'form-control bdc_status','empty'=>'select','required'=>'required','value'=>$contact_info['BdcLead']['dnc_status']));	
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
								<a href="<?php echo $this->Html->url(array('action'=>'leads_main', $selected_lead_type )); ?>" class="btn btn-danger no-ajaxify" id="btn-cancel-survey" ><i class="fa fa-reply"></i> Cancel</a> <a class="btn btn-inverse" id="skip_lead" lead_id="<?php echo $this->request->params['pass']['0'];  ?>">Skip Lead</a>
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
	$("#BdcSurveyCallBackTime").timepicker();		
	$(".switch_bdc_survey").on('click',function(e){
			e.preventDefault();
			if(confirm('Are you sure you want to switch to Pre-Purchase Survey?')){
			url = $(this).attr('href');
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
					url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'bdc_input_14day')); ?>/"+next_id,
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
								$('div.maxWidth').animate({ scrollTop: scrollAmount }, 'slow', function () {
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
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29'&& $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert('Please enter a valid Email in Q13');
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
		else if($("#BdcSurveyStatus").val()=='contact' && $("#customer_status").val()!='6' && $("#customer_status").val()!='29'&& $("#customer_status").val()!='15')
		{
			if(!validateForm())
			{
				alert('Please fill all fields in the form');
				return false;
			}
			else if(!validEmail())
			{
				alert('Please enter a valid Email in Q13');
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
		if($("#SurveyAnswer47AnswerNo").is(':checked'))
		{
			$("#471").addClass('novalidate');
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
		value=$('#471').val();
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
		url: "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'bdc_input_14day')); ?>/"+next_id,
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
				url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/"+$load_first+"/search_all2:"+search_all2+"/search_all:"+search_all+"/search_all_value:/selected_lead_type",
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
				$('div.maxWidth').animate({ scrollTop: scrollAmount }, 'slow', function () {
										});
		}
	});
  }
  });
  
  
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