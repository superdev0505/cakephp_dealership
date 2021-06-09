<?php 
$mobile = $lead_data['BdcLead']['mobile'];
$mobile_number = preg_replace('/[^0-9]+/', '', $mobile); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it

$phone = $lead_data['BdcLead']['phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number);

$work = $lead_data['BdcLead']['work_number'];
$work_number = preg_replace('/[^0-9]+/', '', $work); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $work_number);
?>
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
<tr><td>Mobile</td><td><?php echo  $cleaned; ?></td></tr>
<tr><td>Phone</td><td><?php echo $cleaned1; ?></td></tr>
<tr><td>Work</td><td><?php echo  $cleaned2; ?></td></tr>
<tr><td>Year</td><td><?php echo $lead_data['BdcLead']['year']; ?></td></tr>
<tr><td>Model</td><td><?php echo $lead_data['BdcLead']['model']; ?></td></tr>
<tr><td>Make</td><td><?php echo $lead_data['BdcLead']['make']; ?></td></tr>
<tr><td>Type</td><td><?php echo $lead_data['BdcLead']['type']; ?></td></tr>
<tr><td>Lead Source</td><td><?php echo $lead_data['BdcLead']['source']; ?></td></tr>
<tr><td>Lead Id</td><td><?php echo $lead_data['BdcLead']['id']; ?></td></tr>
<tr><td>Sales Person</td><td><?php echo $lead_data['BdcLead']['sperson']; ?></td></tr>

<tr style="background-color:#CCC"><td><strong>Customer Status</strong></td><td><strong><?php echo $customer_status; ?></strong></td></tr>
<tr><td></td><td><br /></td></tr>
<br/>
<?php if(empty($survey_response)){ ?>
<tr><td colspan="2"><p>This lead has bad contact number hence not able to contact with the customer</p><tr><td>
<?php }else{ ?> 
<tr><td colspan="2" align="center" style="background-color:#CCC"><strong><?php echo $survey_name; ?></strong></td></tr>
<?php 
$i=1;
foreach ($survey_response as $response){ ?>
<tr><td colspan="2">Q. <?php echo $response['Question']['name']; ?></td></tr>
<tr><td colspan="2"><strong>A#<?php echo $i.' - '.$response['EmailSurveyAnswer']['answer']; ?></strong></td></tr>
<?php 
$i++;
}}?>


</table>
