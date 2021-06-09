<p>
Stats For  Question :-  Have you been contacted by your sales person since taking delivery of your vehicle?
</p>
<table border="1" cellpadding="3">
<tr>
<th>Dealer</th>

<th>Yes count </th>
<th>No Count </th>
<th>NA count </th>
<th>Total</th>
<th>Yes %</th>
</tr>
<?php
 
foreach($data as $key => $d)
{?>
<tr>
<td><?php echo $dealer_names[$key] .'#'.$key; ?> </td>
<td><?php echo $d['stats'][0][0]['yes_count']; ?></td>
<td><?php echo $d['stats'][0][0]['no_count']; ?></td>
<td><?php echo $d['stats'][0][0]['na_count']; ?></td>
<td><?php echo $d['all_survey']; ?></td>
<td><?php echo round(($d['stats'][0][0]['yes_count']/$d['all_survey'])*100); ?>%</td>
</tr>	
<?php }
?>
</table>