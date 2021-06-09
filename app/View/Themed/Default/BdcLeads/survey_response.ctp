<div id="SurveyPrint">
<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;width:100%">
<tr>
<td colspan="2" align="center" style="background-color:#CCC"><strong>Customer Information</strong></td>
</tr>
<tr><td>Customer</td><td><?php echo $lead_data['BdcLead']['first_name'].' '.$lead_data['BdcLead']['last_name']; ?></td></tr>
<tr><td>Dealership</td><td><?php echo $lead_data['BdcLead']['company']; ?></td></tr>
<tr><td>Dealership #</td><td><?php echo $lead_data['BdcLead']['company_id']; ?></td></tr>
<tr><td>Email Address</td><td><?php echo $lead_data['BdcLead']['email']; ?></td></tr>
<tr><td>City</td><td><?php echo $lead_data['BdcLead']['city']; ?></td></tr>
<tr><td>State</td><td><?php echo $lead_data['BdcLead']['state']; ?></td></tr>
<tr><td>Phone</td><td><?php echo $lead_data['BdcLead']['phone']; ?></td></tr>
<tr><td>Mobile</td><td><?php echo $lead_data['BdcLead']['mobile']; ?></td></tr>
<tr><td>Year</td><td><?php echo $lead_data['BdcLead']['year']; ?></td></tr>
<tr><td>Model</td><td><?php echo $lead_data['BdcLead']['model']; ?></td></tr>
<tr><td>Make</td><td><?php echo $lead_data['BdcLead']['make']; ?></td></tr>
<tr><td>Type</td><td><?php echo $lead_data['BdcLead']['type']; ?></td></tr>
<tr><td>Lead Source</td><td><?php echo $lead_data['BdcLead']['source']; ?></td></tr>
<tr><td>Lead Id</td><td><?php echo $lead_data['BdcLead']['id']; ?></td></tr>
<tr><td>Sales Person</td><td><?php echo $lead_data['BdcLead']['sperson']; ?></td></tr>
<tr><td>CSR</td><td><?php echo $csr_info['User']['full_name']; ?></td></tr>
<tr style="background-color:#CCC"><td><strong>Customer Status</strong></td><td valign="top"><strong><?php echo $customer_status; ?></strong></td>
<tr><td><br /></td><td><br /></td></tr>
<?php if(!empty($event_data)){ ?>
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong>Appointment Information</strong></td></tr>
<tr><td>Appoinment Title</td><td><?php echo $event_data['Event']['title']; ?></td></tr>
<tr><td>Start time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['start'])); ?></td></tr>
<tr><td>End time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['end'])); ?></td></tr>
<tr><td>Appoinment Details</td><td><?php echo $event_data['Event']['details']; ?></td></tr>
<tr><td><br /></td><td><br /></td></tr>

<?php } ?>
<?php if(empty($survey_response)){ ?>
<tr><td colspan="2"><p>No Survey Response</p><tr><td>
<?php }else{ ?> 
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong><?php echo $survey_name; ?></strong></td></tr>
<?php 
$i=1;
foreach ($survey_response as $response){ ?>
<tr><td colspan="2">Q. <?php echo $response['Question']['name']; ?></td></tr>
<tr><td colspan="2"><strong>A#<?php echo $i.' - '.$response['SurveyAnswer']['answer']; ?></strong></td></tr>
<?php 
$i++;
}}?>


</table>
</div>
<br />
<br />
<div class="dontprint">
<div>
<h3>Send Response to individual</h3><br />
<input type="text" id="email_address" placeholder="Enter Email" /><?php echo $this->Html->link('Email Response',array('controller'=>'bdc_leads','action'=>'email_response',$bdc_survey_id),array('class'=>'btn btn-success no-ajaxify','id'=>'indiv_response')); ?></div>
<br />
		<button type="button" id="btn_print"  class="btn btn-primary">Print Survey</button>
        <?php echo $this->Html->link('Send Response To Group',array('controller'=>'bdc_leads','action'=>'email_response',$bdc_survey_id),array('class'=>'btn btn-success no-ajaxify','id'=>'send_response')); ?>
        
		<button class="btn btn-inverse"  data-dismiss="modal" type="button" id="close_child_modal_dialog" >Close</button>
		
</div>
<script>
$("#btn_print").click(function(){
		$( "#SurveyPrint" ).printThis();
	});

$("#send_response").click(function(e){
				e.preventDefault();
				
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				
				<?php
				/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */ 
				if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
				?>
					$("#close_child_modal_dialog").click();
				<?php
				}else{
				?>
					bootbox.hideAll();
				<?php
				}
				?>
			}
		});
	});

$("#indiv_response").click(function(e){
			e.preventDefault();
			email=$.trim($("#email_address").val());
			if(!email.match(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i))
			{
				alert('Please enter a valid email');
				$("#email_address").focus();
				return false;
			}
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href')+'/'+email,
			success: function(data){
				<?php
				/* Amarjit: Since we are using the same code for Workload-Followup functionality. Here we have popup on a popup, hence below code is required */ 
				if(isset($this->request->params['named']['workload']) && $this->request->params['named']['workload']=='workload'){
				?>
					$("#close_child_modal_dialog").click();
				<?php
				}else{
				?>
					bootbox.hideAll();
				<?php
				}
				?>
			}
		});
	});
	
</script>