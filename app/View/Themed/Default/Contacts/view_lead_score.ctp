<table style="font-family:Arial, Helvetica, sans-serif;" align="center" width="100%">
<tr>
<td colspan="2" align="center" style="background-color:#CCC"><strong>Lead Information</strong></td>
</tr>
<tr><td>Customer</td><td><?php echo $lead_data['Contact']['first_name'].' '.$lead_data['Contact']['last_name']; ?></td></tr>
<tr><td>Dealership</td><td><?php echo $lead_data['Contact']['company']; ?></td></tr>
<tr><td>Dealership #</td><td><?php echo $lead_data['Contact']['company_id']; ?></td></tr>
<tr><td>Email Address</td><td><?php echo $lead_data['Contact']['email']; ?></td></tr>
<tr><td>City</td><td><?php echo $lead_data['Contact']['city']; ?></td></tr>
<tr><td>State</td><td><?php echo $lead_data['Contact']['state']; ?></td></tr>
<tr><td>Phone</td><td><?php echo $lead_data['Contact']['phone']; ?></td></tr>
<tr><td>Mobile</td><td><?php echo $lead_data['Contact']['mobile']; ?></td></tr>
<tr><td>Year</td><td><?php echo $lead_data['Contact']['year']; ?></td></tr>
<tr><td>Model</td><td><?php echo $lead_data['Contact']['model']; ?></td></tr>
<tr><td>Make</td><td><?php echo $lead_data['Contact']['make']; ?></td></tr>
<tr><td>Type</td><td><?php echo $lead_data['Contact']['type']; ?></td></tr>
<tr><td>Lead Source</td><td><?php echo $lead_data['Contact']['source']; ?></td></tr>
<tr><td>Lead Id</td><td><?php echo $lead_data['Contact']['id']; ?></td></tr>
<tr><td>Sales Person</td><td><?php echo $lead_data['Contact']['sperson']; ?></td></tr>
<tr style="background-color:#CCC"><td colspan="2" align="center"><strong>Score Lead </strong></td></tr>
<tr><td></td><td><br /></td></tr>
<tr><td>Source</td><td><?php echo $source['ScoreSource']['name']; ?> </td></tr>
<tr><td>Week</td><td><?php echo $score['LeadScore']['week']; ?> </td></tr>
<tr><td>Grade</td><td><?php echo $score['LeadScore']['score']; ?> </td></tr>
<tr><td>Location</td><td><?php echo $score['LeadScore']['location']; ?> </td></tr>
<tr><td>CS Agent</td><td><?php echo $score['LeadScore']['cs_agent']; ?> </td></tr>
<tr><td>Logged CRM</td><td><?php echo $score['LeadScore']['logged_crm']; ?> </td></tr>
<tr><td>CRM Source Correct?</td><td><?php echo $score['LeadScore']['crm_source_correct']; ?> </td></tr>
<tr><td>DMS Source Correct?</td><td><?php echo $score['LeadScore']['dms_source_correct']; ?> </td></tr>
<tr><td>Ask For Email?</td><td><?php echo $score['LeadScore']['ask_for_email']; ?> </td></tr>
<tr><td>Details</td><td><?php echo $score['LeadScore']['details']; ?> </td></tr>

</table>


