<style>
.midWidth {
    margin: 0 auto;
    width: 700px;
}
.maxWidth {
    margin: 0 auto;
    width: 850px;
}
.history-icon.glyphicons i:before {
	font-size: 14px;
}

.history-icon {
	margin-top: -18px;
	padding-left: 22px;
}
</style>
<?php
$dnc_statuses=array('ok_call_email'=>'OK To Call & Email','not_call'=>'Do not Call','not_email'=>'Do not Email','no_call_email'=>'Do Not Call & Email');
$group_id = AuthComponent::user('group_id');
$dealer_id = AuthComponent::user('dealer_id');
$ridenow_group = array(263);
$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640,2309,1370);
//echo $timezone;

$selected_lead_type = "";
$customer_name =  $contact['BdcLead']['first_name'] . " " . $contact['BdcLead']['last_name'];

if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-8">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /> </div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></h3>
                    <h3>
						<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?>

                   </h3>
                   <strong>Company:</strong> <?php echo $contact['BdcLead']['company_work']; ?>
				</div>

			</div>
			<div class="col-md-4 ">


							<?php //echo $this->Html->link('<i class="fa fa-plus"></i> In-Bound', array('controller'=>'bdc_leads','action'=>'bdc_input_in_bound', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'1'));  ?>
                	 <?php $event_lead_type = 'no';
				 if(isset($this->request->params['named']['event_solds']))
					$event_lead_type = $this->request->params['named']['event_solds'];
				if($event_lead_type  == 'no'){
					if($show_survey_button){
				  ?>
                <div class="btn-group pull-right" >

					<button type="button" class="btn  btn-inverse dropdown-toggle" data-toggle="dropdown">
						Start Survey
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">

                  <li>
				<?php
				if(!in_array($contact['BdcLead']['status'],array('Sold/Rolled',' Sold/Rolled-Multi Vehicle')) && !($is_sold_leads))
				{

					echo $this->Html->link('<i class="fa fa-plus"></i> Next Day', array('controller'=>'bdc_leads','action'=>'bdc_input_ndf', $contact['BdcLead']['id']), array('class'=>" no-ajaxify  btn-load-survey",'escape'=>false,'survey-id'=>'2','survey-title'=>'Next Day Follow up survey'));
					echo '</li>';

					if($dealer_id == 5000){
					?>
					 <li><?php echo $this->Html->link('<i class="fa fa-plus"></i> Send Survey', array('controller'=>'email_surveys','action'=>'send_survey_email', $contact['BdcLead']['id'],2), array('class'=>"no-ajaxify btn-email-survey",'escape'=>false,'survey-id'=>'2','survey-title'=>'Send Survey Email'));  ?> </li>
			<?php
					}
					
					if(in_array($dealer_id,$freedom_group) && $show_vm_email && !empty($contact['BdcLead']['email']))
					{
						?>
                    
                     	<li><?php echo $this->Html->link('<i class="fa fa-plus"></i> Send Follow-up Email', array('controller'=>'bdc_leads','action'=>'bdc_vm_followup'), array('class'=>"no-ajaxify",'escape'=>false,'id' =>'send_vm_email','dealer' => $contact['BdcLead']['company'],'cust-email'=>$contact['BdcLead']['email'],'lead-id' => $contact['BdcLead']['id'],'cust-name' => $customer_name));  ?> </li>						
		    	 
			<?php }
					
			}?>
				<?php
				if(/*$contact['BdcLead']['sales_step']=='Sold'&&*/ in_array($contact['BdcLead']['status'],array('Sold/Rolled',' Sold/Rolled-Multi Vehicle'))||$is_sold_leads)
				{?>
                <?php
				echo $this->Html->link('<i class="fa fa-plus"></i> 14 Day', array('controller'=>'bdc_leads','action'=>'bdc_input_14day', $contact['BdcLead']['id']), array('class'=>" no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'3','survey-title'=>'14 Day CSI'));  ?></li><li>

				<?php
				if(!in_array($dealer_id,$ridenow_group)){
				echo $this->Html->link('<i class="fa fa-plus"></i> CSI 17', array('controller'=>'bdc_leads','action'=>'bdc_input_17_month', $contact['BdcLead']['id']), array('class'=>"no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'4','survey-title'=>'17 Day CSI'));
				}
				?></li>

                <?php if(AuthComponent::user('dealer_id')==5000){ ?>
                <li><?php echo $this->Html->link('<i class="fa fa-plus"></i> Send Survey', array('controller'=>'email_surveys','action'=>'send_survey_email', $contact['BdcLead']['id'],3), array('class'=>"no-ajaxify btn-email-survey",'escape'=>false,'survey-id'=>'4','survey-title'=>'Send Survey Email'));  ?> </li>
                <li>
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> P&A Discount', array('controller'=>'bdc_leads','action'=>'bdc_pa_nod_7', $contact['BdcLead']['id']), array('class'=>"no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'7','survey-title'=>'Welcome to the dealership family P&A Needs offer discount (Call 1) - 10 days')); ?></li>
                  <li>
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> First Tune & Service ', array('controller'=>'bdc_leads','action'=>'bdc_f_tune_8', $contact['BdcLead']['id']), array('class'=>"no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'8','survey-title'=>'First tune and Service Appointment (Call 2) - 14 days')); ?></li>
                 <li>
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Tune & Service Time ', array('controller'=>'bdc_leads','action'=>'bdc_tune_service_9', $contact['BdcLead']['id']), array('class'=>"no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'9','survey-title'=>'Did you get your tune and service? (Call 5) - 60 days' )); ?></li>
                <li>
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Dealership Care ', array('controller'=>'bdc_leads','action'=>'bdc_deal_care_10', $contact['BdcLead']['id']), array('class'=>"no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'10','survey-title'=>'Has the dealership taken care of your needs? (Call 6) - 6 months')); ?></li>
                <?php } ?>

				<?php }?>
                <li><a href="javascript:void(0);">&nbsp;</a></li>
                 <li><a href="#" class="BdcInvalidLead no-ajaxify" data-id="<?php echo $contact['BdcLead']['id']; ?>" style="margin-right:5px;" >Invalid Lead</a></li>
                 </ul>
				</div>
				<?php  }}else{
					if($event_lead_type  == 'event_leads')
					{
					echo $this->Html->link('<i class="fa fa-plus"></i> Start Event Call',array('controller'=>'bdc_leads','action'=>'dealer_event_survey', $contact['BdcLead']['id'],'14') , array('class'=>"btn btn-warning no-ajaxify pull-right btn-load-survey",'escape'=>false,'survey-id'=>'14'));
					}elseif($event_lead_type  == 'event_solds'){
					 echo $this->Html->link('<i class="fa fa-plus"></i> Start Event Call',array('controller'=>'bdc_leads','action'=>'dealer_event_survey', $contact['BdcLead']['id'],13) , array('class'=>"btn btn-warning no-ajaxify pull-right btn-load-survey",'escape'=>false,'survey-id'=>'13'));
					}elseif($event_lead_type  == 'equity_search'){
						if($dealer_id == 2344)
						{
							echo $this->Html->link('<i class="fa fa-plus"></i> CSI 17', array('controller'=>'bdc_leads','action'=>'bdc_input_17_month', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify pull-right btn-load-survey",'escape'=>false,'survey-id'=>'4','survey-title'=>'17 Day CSI'));
							
						}else{
							 echo $this->Html->link('<i class="fa fa-plus"></i> Start Equity Call',array('controller'=>'bdc_leads','action'=>'dealer_event_survey', $contact['BdcLead']['id'],15) , array('class'=>"btn btn-warning no-ajaxify pull-right btn-load-survey",'escape'=>false,'survey-id'=>'15'));
						}
					}

					 } ?>
                <div class="separator"></div>
				<?php //echo $this->Html->link('<i class="fa fa-plus"></i> Service', array('controller'=>'bdc_leads','action'=>'bdc_input_service_complete', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'5'));  ?>
				<?php //echo $this->Html->link('<i class="fa fa-plus"></i> Safety', array('controller'=>'bdc_leads','action'=>'bdc_input_safety_course', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'6'));  ?>




			 </div>
		</div>

        <div class="row">
			<div class="col-md-12">

				<ul class="list-unstyled list-group-1">

					<li> <strong>Customer at</strong> (<?php echo $contact['BdcLead']['company']; ?>) </li>

					<li><i class="fa fa-home"></i> <strong>Address:</strong> <?php echo $contact['BdcLead']['address']; ?>,
						<strong>City:</strong> <?php echo $contact['BdcLead']['city']; ?>,
                        <?php
						$state_label = 'State';
						if(empty($contact['BdcLead']['country'])|| $contact['BdcLead']['country'] == 'United States'){
						?>
                        <strong>County:</strong> <?php echo $contact['BdcLead']['county']; ?>,
						<?php } else{
						$state_label = $this->App->getStateLabels($contact['BdcLead']['country']);
						} ?>
                         <strong><?php echo $state_label; ?>:</strong> <?php echo $contact['BdcLead']['state']; ?>,

						<strong>Zip:</strong> <?php echo $contact['BdcLead']['zip']; ?>

					</li>

					<li>
<?php
	$phone_dnc = '';
	if(in_array($contact['BdcLead']['dnc_status'],array('no_call','no_call_email'))){
	$phone_dnc = "<i title='{$contact['BdcLead']['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
	}

	 if(in_array($contact['BdcLead']['dnc_status'],array('no_email','no_call_email'))){
	echo "<i title='{$contact['BdcLead']['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
	}
	?>
						<i class="fa fa-envelope"></i> <strong>Email:</strong> <span style="/* word-break: break-all; */ ">
							<a style="display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5"  href="/user_emails/compose/contact/<?php echo $contact['BdcLead']['id']; ?>"><u><?php echo $contact['BdcLead']['email']; ?></u></a>

						<?php echo $phone_dnc; ?>
						<i class="fa fa-mobile"></i> <strong>Mobil:</strong> <?php $phone = $contact['BdcLead']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;?>

<?php echo $phone_dnc; ?>

<i class="fa fa-phone"></i> <strong>Phone:</strong>
						<?php $phone1 = $contact['BdcLead']['phone'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						echo $cleaned1;?>

							<?php echo $phone_dnc; ?>
						<i class="fa fa-phone"></i> <strong>Work:</strong>
						<?php $phone1 = $contact['BdcLead']['work_number'];
						$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
						$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
						echo $cleaned1;?>

					</li>

					<li>
						<strong>Step:</strong> <?php echo $sales_step_options[ $contact['BdcLead']['sales_step'] ]; ?>,
	 					<strong>Status:</strong> <?php echo $contact['BdcLead']['status']; ?>

						<strong>Originator:</strong>  <?php echo $contact['BdcLead']['owner']; ?>, 
						<strong>Sales Person:</strong> <?php echo ($contact['BdcLead']['sperson'] != '')?  $contact['BdcLead']['sperson'] : "Please Transfer" ; ?>


					</li>



				<li style="font-size: 15px;">
						<?php if( $contact['BdcLead']['spouse_first_name'] != '' ||  $contact['BdcLead']['spouse_last_name'] != ''){ ?>
					<span style='color:  #101010'>Spouse:</span> <?php echo $contact['BdcLead']['spouse_first_name']; ?> <?php echo $contact['BdcLead']['spouse_last_name']; ?>
						<?php } ?>
					</li>
				</ul>
                  <a href="javascript:void(0)" id="LeadDetailsToggle" class="label label-info pull-left" ><i class="fa fa-plus"></i> See Details</a>
			</div>

		</div>


	</div>
	<hr/>
	<div class="body">

		<div class="row" id="LeadDetailBody" style="display:none">
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Unit Value:</span> <?php echo $contact['BdcLead']['unit_value']; ?></li>
					<li><span class="strong">Condition:</span> <?php echo $contact['BdcLead']['condition']; ?></li>
					<li><span class="strong">Year:</span> <?php echo ($contact['BdcLead']['year'] != '0')? $contact['BdcLead']['year'] : "Any Year" ; ?></li>
					<li><span class="strong">Make:</span> <?php echo $contact['BdcLead']['make']; ?></li>
					<li><span class="strong">Model:</span> <?php echo $contact['BdcLead']['model']; ?></li>
					<li><span class="strong">Unit Type:</span> <?php echo $contact['BdcLead']['type']; ?></li>
					<li><span class="strong">Class:</span> <?php echo $class; ?></li>
					<li><span class="strong">Stock Number:</span> <?php echo $contact['BdcLead']['stock_num']; ?></li>
					<li><span class="strong">Buying Time:</span> <?php echo $contact['BdcLead']['buying_time']; ?></li>
					<li><span class="strong">Best Time:</span> <?php echo $contact['BdcLead']['best_time']; ?></li>
				</ul>

			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">T/Value:</span> <?php echo $contact['BdcLead']['trade_value']; ?></li>
					<li><span class="strong">T/Used:</span> <?php echo $contact['BdcLead']['condition_trade']; ?></li>
					<li><span class="strong">T/Year:</span> <?php echo ($contact['BdcLead']['year_trade'] != '0')? $contact['BdcLead']['year_trade'] : "Any Year" ; ?></li>
					<li><span class="strong">T/Make:</span> <?php echo $contact['BdcLead']['make_trade']; ?></li>
					<li><span class="strong">T/Model:</span> <?php echo $contact['BdcLead']['model_trade']; ?></li>
					<li><span class="strong">T/Type:</span> <?php echo $contact['BdcLead']['category_trade']; ?></li>
					<li><span class="strong">T/Class:</span> <?php echo $class_trade; ?></li>
					<li><span class="strong">T/Stock#</span> <?php echo $contact['BdcLead']['stock_num_trade']; ?></li>

					<li><span><strong>Lead Age: </strong>
					<?php
					$startTimeStamp1 = strtotime($contact['BdcLead']['created']);
					$endTimeStamp1 = strtotime("now");
					$timeDiff1 = abs($endTimeStamp1 - $startTimeStamp1);
					$numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
					$numberDays1 = intval($numberDays1);
					echo $numberDays1
					?> Day(s)&nbsp;</span></li>

				</ul>

			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Lead ID:</span>&nbsp; <span class="label label-primary label-stroke">#<?php echo $contact['BdcLead']['id']; ?></span></li>
					<li><span class="strong">This Lead is:</span> <?php echo $contact['BdcLead']['lead_status']; ?></li>
				    <li><span class="strong">Source</span> <?php echo $contact['BdcLead']['source']; ?></li>
					<li><span class="strong">Gender:</span> <?php echo $contact['BdcLead']['gender']; ?></li>
					<li><span class="strong">Second Face: </span> <?php echo $second_face; ?></li>
					<li><span class="strong">Created:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['BdcLead']['created']); ?></li>
					<li><span class="strong">Modified:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['BdcLead']['modified']); ?></li>
					<li><span class="strong">DNC Status:</span> <?php echo ($contact['BdcLead']['dnc_status'] != '')? $dnc_statuses[$contact['BdcLead']['dnc_status']] : ""  ; ?></li>
					<li><span class="strong">Event:</span>
						<?php  if(!empty($appointment)){ ?>
							<a style="display: inline; color: blue; padding: 0; font-weight: normal;"
							 href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $contact['BdcLead']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>"  class='no-ajaxify status_note_update'  ><u><?php echo date('m/d/Y g:i A', strtotime($appointment['Event']['start'])); ?></u></a>
						<?php } ?>

					</li>
						<li><span><strong>Dormant: </strong><?php

				$event_start = 0;
				if(!empty($appointment)){
					$event_start = strtotime($appointment['Event']['start']);
				}
				 $startTimeStamp = strtotime($contact['BdcLead']['modified']);
				if($event_start > $startTimeStamp){
					$startTimeStamp = $event_start;
				}
				$endTimeStamp = strtotime("now");

				if($startTimeStamp > $endTimeStamp){
					$numberDays = 0;
				}else{
					$timeDiff = abs($endTimeStamp - $startTimeStamp);
					$numberDays = $timeDiff/86400;  // 86400 seconds in one day
					$numberDays = intval($numberDays);
				}
				echo $numberDays
				?> Day(s)&nbsp;</span></li>

				</ul>

			</div>

		</div>

        <div class="row">
			<div class="col-md-12">

				<hr>
				<span class="strong"><i class="fa fa-book"></i> <span style='font-size: 15px;'>Current Notes:</span></span>

						<?php
						echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
						$contact['BdcLead']['id'].'" >Read more</a>'));
						?>

					<hr>
				<div class="separator bottom"></div>

			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

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

	<div class="widget-body">
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
		</div>
	</div>
</div>
<?php //debug($contact);   ?>
<script>
var scr_mode;
$(function(){
	var survey={};
	survey[1]='<?php echo (in_array(1,$recipients))?'yes':'no'; ?>';
	survey[2]='<?php echo (in_array(2,$recipients))?'yes':'no'; ?>';
	survey[3]='<?php echo (in_array(3,$recipients))?'yes':'no'; ?>';
	survey[4]='<?php echo (in_array(4,$recipients))?'yes':'no'; ?>';
	survey[5]='<?php echo (in_array(5,$recipients))?'yes':'no'; ?>';
	survey[6]='<?php echo (in_array(6,$recipients))?'yes':'no'; ?>';
	survey[7]='<?php echo (in_array(7,$recipients))?'yes':'no'; ?>';
	survey[8]='<?php echo (in_array(8,$recipients))?'yes':'no'; ?>';
	survey[9]='<?php echo (in_array(9,$recipients))?'yes':'no'; ?>';
	survey[10]='<?php echo (in_array(10,$recipients))?'yes':'no'; ?>';
	survey[11]='<?php echo (in_array(11,$recipients))?'yes':'no'; ?>';
	survey[13]='<?php echo (in_array(13,$recipients))?'yes':'no'; ?>';
	survey[14]='<?php echo (in_array(14,$recipients))?'yes':'no'; ?>';
	survey[15]='<?php echo (in_array(15,$recipients))?'yes':'no'; ?>';
	$(".btn-load-survey").click(function(event){
		event.preventDefault();
		$survey_id=$(this).attr('survey-id');
		//alert(survey[$survey_id]);
		//alert($survey_id);

		if(survey[$survey_id]=='no')
		{
			alert('Please have Sales Manager add Emails to the SURVEY GROUP LIST for this survey. It is located in the "Settings" section and then try again.');
			return false;
		}

		scr_mode=$("#surveyViewToggle").attr('data-id');
		survey_title=$(this).attr('survey-title');
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(scr_mode=='full_screen'){
				$("#lead_details_content").html(data);
				}else
				{


					bootbox.dialog({
					message: data,
					title: survey_title,
					animate: false
				}).find("div.modal-dialog").addClass("maxWidth");
					var percentageToScroll = 100;
					var percentage = percentageToScroll/100;
					var height = $(document).scrollTop();
					var scrollAmount = height * (1 - percentage);
						//alert(scrollAmount);
							$('div.maxWidth').parent().animate({ scrollTop: scrollAmount}, 'fast', function () {
												    });
				}
			}
		});

	});

	$(".BdcInvalidLead").on('click',function(e){
		e.preventDefault();

		lead_id=$(this).attr('data-id');
		//$(this).parent().parent().remove();
		if(confirm('Are you sure you want to make this lead BDC Invalid')){
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
		}

		});


	$("#transfer_lead_link").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Move Lead",
				});
			}
		});

	});


	//instant message

	$("#send_manager_message").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "Instance Message",
					buttons: {
						success: {
							label: "Ok",
							className: "btn-success",
							callback: function() {

								if( $("#ManagerMessageMessage").val() != '' ){

									$("#message_eror").html('');
									$.ajax({
										type: "POST",
										data: $("#ManagerMessageComposeForm").serialize(),
										url: "<?php echo $this->Html->url(array('controller' => 'manager_messages','action' => 'send')); ?>",
										success: function(data){
											return true;
										}
									});

								}else{
									 $("#message_eror").html('Please enter message');
									 return false;
								}
							}
						},
					}
				});


			}
		});


	});


$(".show_survey_response").click(function(e){
		e.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Survey",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});

	});


	$(".read_more_history_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller' => 'contacts_manage','action' => 'history_comment')); ?>",
			data: {'history_id':$(this).attr('history_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "History Notes",
				});
			}
		});

	});



$(".view_lead_score").click(function(e){
		e.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Score Lead - <?php echo str_replace('"','',$contact['BdcLead']['first_name']) . "&nbsp;" . $contact['BdcLead']['last_name'].' '.$cleaned.'  Sperson:'.$contact['BdcLead']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
				}
			}
		});

	});

	$(".read_more_contact_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller' =>'contacts_manage','action' => 'contact_comment')); ?>",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});

	$("#LeadDetailsToggle").on('click',function(e){
		e.preventDefault();
		$("#LeadDetailBody").slideToggle();

		});
	$(".btn-email-survey").on('click',function(e){
			e.preventDefault();
			url =$(this).attr('href');
			$.ajax({
				type:'GET',
				url:url,
				success: function(data){
					data = $.parseJSON(data);
					if(data.status ==1)
					{
						$class = 'alert-success';
					}else{
						$class = 'alert-danger';
					}
					$("#BdcMainDiv").prepend('<div class="alert '+$class+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+data.msg+'</div>');
					removeAlert();
				}

				});

		});
		
		$("#send_vm_email").on('click',function(e){
			e.preventDefault();
			url =$(this).attr('href');
			$.ajax({
				type:'POST',
				url:url,
				data:{'lead_id':$(this).attr('lead-id'),'cust_email':$(this).attr('cust-email'),'dealer':$(this).attr('dealer'),'cust_name':$(this).attr('cust-name')},
				success: function(data){
					
					$msg = 'Follow up email sent to customer';
					if(data =='email sent')
					{
						$class = 'alert-success';						
					}else{
						$class = 'alert-danger';
						$msg = 'Sorry! We are not able to send email please try again.';
					}
					$("#BdcMainDiv").prepend('<div class="alert '+$class+'"><button type="button" class="close" data-dismiss="alert">&times;</button>'+$msg+'</div>');
					removeAlert();
				}

				});

		});

});
</script>
