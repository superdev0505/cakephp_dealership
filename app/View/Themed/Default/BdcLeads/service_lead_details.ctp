<style>
.midWidth {
    margin: 0 auto;
    width: 700px;
}
.maxWidth {
    margin: 0 auto;
    width: 850px;
}
</style>
<?php 
$group_id = AuthComponent::user('group_id');
//echo $timezone;

$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-7">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /> </div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $contact['ServiceLeadsDms']['name'];  ?></h3>
                 
						<?php
				
						echo '<span class="label label-info label-stroke">Service Lead</span>';
					?>
                
				</div>
				<ul class="list-unstyled list-group-1">
					<li><i class="fa fa-home"></i> <?php echo $contact['ServiceLeadsDms']['address']; ?>&nbsp;<?php echo $contact['ServiceLeadsDms']['city']; ?>&nbsp;<?php echo $contact['ServiceLeadsDms']['state']; ?>&nbsp;<?php echo $contact['ServiceLeadsDms']['zip']; ?>
						<div class="row"></div>
						<i class="fa fa-mobile"></i>
						<?php $phone = $contact['ServiceLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;?>
						&nbsp; <i class="fa fa-phone"></i>
						<?php $phone1 = $contact['ServiceLeadsDms']['work_phone'];
$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
echo $cleaned1;?>
						&nbsp; <i class="fa fa-envelope"></i> <span style="word-break: break-all;">
							
						</span></li>
				</ul>
			</div>
			<div class="col-md-5 "> 

				
							<?php //echo $this->Html->link('<i class="fa fa-plus"></i> In-Bound', array('controller'=>'bdc_leads','action'=>'bdc_input_in_bound', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'1'));  ?>
                  
				
				
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Service', array('controller'=>'bdc_leads','action'=>'bdc_input_service_complete', $contact['ServiceLeadsDms']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey pull-right",'escape'=>false,'survey-id'=>'5'));  ?>
				<?php //echo $this->Html->link('<i class="fa fa-plus"></i> Safety', array('controller'=>'bdc_leads','action'=>'bdc_input_safety_course', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'6'));  ?>
				<a href="#" class="btn btn-inverse BdcInvalidLead pull-right no-ajaxify" data-id="<?php echo $contact['ServiceLeadsDms']['id']; ?>" style="margin-right:5px;">Invalid Lead</a> 

				
				
				
			 </div>
		</div>
	</div>
	<hr/>
	<div class="body">
		<div class="row">
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Dealer:</span> <?php echo AuthComponent::user('dealer'); ?></li>
					<li><span class="strong">Service Writer:</span> <?php echo $contact['ServiceLeadsDms']['service_writer']; ?></li>
                   
<li><span><strong>Dormant: </strong><?php 
				$startTimeStamp = strtotime($contact['ServiceLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</span></li>
                <li><span class="strong">Address:</span> <?php echo $contact['ServiceLeadsDms']['address']; ?></li>
                <li><span class="strong">City:</span> <?php echo $contact['ServiceLeadsDms']['city']; ?></li>
                <li><span class="strong">Zip:</span> <?php echo $contact['ServiceLeadsDms']['zip']; ?></li>
                <li><span class="strong">Created:</span><?php echo $this->Time->format('n/j/Y g:i A', $contact['ServiceLeadsDms']['created']); ?> </li>
					<li><span class="strong">Modified:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['ServiceLeadsDms']['modified']); ?></li>



				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Customer Code:</span> <?php echo $contact['ServiceLeadsDms']['cust_code']; ?></li>
					 <li><span class="strong">Order No:</span> <?php echo $contact['ServiceLeadsDms']['order_no']; ?></li>
					
<li><span><strong>Lead Age: </strong>
<?php 
				$startTimeStamp1 = strtotime($contact['ServiceLeadsDms']['created']);
				$endTimeStamp1 = strtotime("now");
				$timeDiff1 = abs($endTimeStamp1 - $startTimeStamp1);
				$numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
				$numberDays1 = intval($numberDays1);
				echo $numberDays1
				?> Day(s)&nbsp;</span></li>
                   
					<li><span class="strong">Year:</span> <?php echo $contact['ServiceLeadsDms']['unit_year']; ?></li>
					<li><span class="strong">Make:</span> <?php echo $contact['ServiceLeadsDms']['unit_umake']; ?></li>
					<li><span class="strong">Model:</span> <?php echo $contact['ServiceLeadsDms']['unit_model']; ?></li>
					<li><span class="strong">Date Cashiered:</span> <?php echo $contact['ServiceLeadsDms']['date_cash']; ?></li>
                    <li><span class="strong">End Customer:</span> <?php echo $contact['ServiceLeadsDms']['end_customer']; ?></li>
					
				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
                <li><span class="strong">Job title:</span> <?php echo $contact['ServiceLeadsDms']['job_title']; ?></li>
                    <li><span class="strong">Total Cost:</span> <?php echo $contact['ServiceLeadsDms']['order_total']; ?></li>
					 <li><span class="strong">Job Description:</span> <?php echo $contact['ServiceLeadsDms']['job_description']; ?></li>
					
					


				</ul>
				<div class="separator bottom"></div>
			</div>
			
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<!-- Table -->
		
                
                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
					<!-- Table heading -->
					<thead>
						<tr>
							<th>History</th>
							<th>Service Writer</th>
							<th>Job</th>
							<th>Details</th>
							<th>Vehicle</th>
							<th>Notes</th>
							<th style="width:150px;" >Date</th>
						</tr>
					</thead>
					<!-- // Table heading END -->
					<!-- Table body -->
					<tbody>
						<!-- Table row -->
						<?php foreach ($history as $entry) { ?>
						<tr class="text-primary">
							<td><?php echo $entry['ServiceHistoryLead']['h_type']; ?>&nbsp;</td>
							<td><?php echo ($entry['ServiceHistoryLead']['service_writer'] != '')?  $entry['ServiceHistoryLead']['service_writer'] : "Service Manager" ; ?>&nbsp;</td>
							<td><?php echo $entry['ServiceHistoryLead']['job_title']; ?>&nbsp;</td>
							<td><?php echo $entry['ServiceHistoryLead']['job_description']; ?>&nbsp;</td>
							<td><?php  
						
							
							
							?>&nbsp;<?php echo $entry['ServiceHistoryLead']['unit_year']; ?>&nbsp;<?php echo $entry['ServiceHistoryLead']['unit_make']; ?>&nbsp;<?php echo $entry['ServiceHistoryLead']['unit_model']; ?></td>
							<td style="word-break:break-all;"><?php 
							if($entry['ServiceHistoryLead']['h_type']=='BDC Survey'&& !empty($entry['ServiceHistoryLead']['cust_code'])&& $entry['ServiceHistoryLead']['job_description']=='contact')
							{
								echo $this->Html->link("<i class='fa fa-fw icon-checkmark-thick'></i> ".$entry['ServiceHistoryLead']['job_title'],array('controller'=>'bdc_leads','action'=>'survey_response',$entry['ServiceHistoryLead']['cust_code']),array('class'=>'show_survey_response no-ajaxify','style'=>"text-decoration:underline",'escape'=>false));
							}else{
								echo $entry['ServiceHistoryLead']['comment'];
							}
							?>&nbsp;
                            </td>
                            <td><?php echo $this->Time->format('n/j/Y g:i A', $entry['ServiceHistoryLead']['modified']); ?>&nbsp;</td>
						</tr>
						<?php } ?>
						<!-- // Table row END -->
					</tbody>
					<!-- // Table body END -->
				</table>
				<!-- // Table END -->
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
										url: "/manager_messages/send/",
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
					title: "Score Lead - <?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'].' '.$cleaned.'  Sperson:'.$contact['BdcLead']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
				}
			}
		});
		
	});
	
});
</script>