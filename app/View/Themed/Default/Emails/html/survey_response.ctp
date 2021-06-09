<table style="font-family:Arial, Helvetica, sans-serif;">
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
<tr><td>Sales Step</td><td><?php echo $lead_data['BdcLead']['sales_step']; ?></td></tr>
<tr><td>Lead Id</td><td><?php echo $lead_data['BdcLead']['id']; ?></td></tr>
<tr><td>Sales Person</td><td><?php echo $lead_data['BdcLead']['sperson']; ?></td></tr>
<tr><td>Notes</td><td><?php echo $lead_data['BdcLead']['notes']; ?></td></tr>
<tr><td>Modified Date/Time</td><td><?php echo date('d/m/Y H:i A',strtotime($lead_data['BdcLead']['modified'])); ?></td></tr>
<tr><td>CSR</td><td><?php echo $csr; ?></td></tr>
<tr style="background-color:#CCC"><td><strong>Customer Status</strong></td><td><strong><?php echo $customer_status; ?></strong></td></tr>
<tr><td></td><td><br /></td></tr>
<?php if(!empty($event_data)){ ?>
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong>Appointment Information</strong></td></tr>
<tr><td>Appoinment Title</td><td><?php echo $event_data['Event']['title']; ?></td></tr>
<tr><td>Start time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['start'])); ?></td></tr>
<tr><td>End time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['end'])); ?></td></tr>
<tr><td>Appoinment Details</td><td><?php echo $event_data['Event']['details']; ?></td></tr>
<tr><td><br /></td><td><br /></td></tr>

<?php } ?>

<br/>
<?php if(empty($survey_response)){ ?>
<tr><td colspan="2"><p>This lead has bad contact number hence not able to contact with the customer</p><tr><td>
<?php }else{ ?> 
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong><?php echo $survey_name; ?></strong></td></tr>
<?php foreach ($survey_response as $response){ ?>
<tr><td colspan="2">Q. <?php echo $response['Question']['name']; ?></td></tr>
<tr><td colspan="2"><strong><?php echo $response['SurveyAnswer']['answer']; ?></strong></td></tr>
<?php }}?>


</table>
