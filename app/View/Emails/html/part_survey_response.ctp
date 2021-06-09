<?php 


$phone = $lead_data['PartLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number);

$work = $lead_data['PartLeadsDms']['work_phone'];
$work_number = preg_replace('/[^0-9]+/', '', $work); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $work_number);
?>
<table style="font-family:Arial, Helvetica, sans-serif;">
<tr>
<td colspan="2" align="center" style="background-color:#CCC"><strong>Customer Information</strong></td>
</tr>
<tr><td>Customer</td><td><?php echo $lead_data['PartLeadsDms']['name']; ?></td></tr>
<tr><td>Dealership</td><td><?php  echo AuthComponent::user('dealer'); ?></td></tr>
<tr><td>Dealership #</td><td><?php echo $lead_data['PartLeadsDms']['dealer_id']; ?></td></tr>
<tr><td>Email Address</td><td><?php echo $lead_data['PartLeadsDms']['email']; ?></td></tr>
<tr><td>City</td><td><?php echo $lead_data['PartLeadsDms']['city']; ?></td></tr>
<tr><td>State</td><td><?php echo $lead_data['PartLeadsDms']['state']; ?></td></tr>

<tr><td>Phone</td><td><?php echo $cleaned1; ?></td></tr>
<tr><td>Work</td><td><?php echo  $cleaned2; ?></td></tr>
<tr><td>Invoice No</td><td><?php echo $lead_data['PartLeadsDms']['invoice_no']; ?></td></tr>
<tr><td>Invoice Date</td><td><?php echo $lead_data['PartLeadsDms']['invoice_date']; ?></td></tr>

<tr><td>Lead Id</td><td><?php echo $lead_data['PartLeadsDms']['id']; ?></td></tr>
<tr><td>Sales Person</td><td><?php echo $lead_data['PartLeadsDms']['sperson']; ?></td></tr>
<tr><td>CSR</td><td><?php echo AuthComponent::user('full_name'); ?></td></tr>
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
<tr><td colspan="2"><strong>A#<?php echo $i.' - '.$response['SurveyAnswer']['answer']; ?></strong></td></tr>
<?php 
$i++;
}}?>


</table>
