<table style="font-family:Arial, Helvetica, sans-serif;width:100%">
<tr>
<td colspan="2" align="center" style="background-color:#CCC"><strong>Customer Information</strong></td>
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
<tr><td>Sales Person</td><td><?php echo $lead_data['Contact']['sperson']; ?></td></tr>
<tr><td>Lead Source</td><td><?php echo $lead_data['Contact']['source']; ?></td></tr>
<tr><td>Lead Id</td><td><?php echo $lead_data['Contact']['id']; ?></td></tr>
<tr><td>CSR</td><td><?php echo $csr; ?></td></tr>
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong>Appointment Information</strong></td></tr>
<tr><td>Appoinment Title</td><td><?php echo $event_data['Event']['title']; ?></td></tr>
<tr><td>Start time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['start'])); ?></td></tr>
<tr><td>End time</td><td><?php echo date('m/d/Y h:i A',strtotime($event_data['Event']['end'])); ?></td></tr>
<tr><td>Appoinment Details</td><td><?php echo $event_data['Event']['details']; ?></td></tr>

</table>
