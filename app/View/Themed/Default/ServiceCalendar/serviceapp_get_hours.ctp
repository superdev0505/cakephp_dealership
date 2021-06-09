<tbody><tr>
<td class="fc-widget-header fc-agenda-axis" style="width: 59px;text-align:left;border:0px;">Hours</td>
<?php 
$total_dates=count($date_array);
$td_width='110px';
if($total_dates==1)
{
	$td_width='766px';
}
$i= 1;
foreach($date_array as $date){ 
$css_style = " ";
//if($i == 1)
//$css_style = "width:90px;text-align:left;";
?>
	<td align="center" style=" <?php echo $css_style; ?>"><?php 
		$class='label-info';
		$b_hours=0;
	if(isset($hours_array[$date])){ 
		$b_hours=$hours_array[$date];
	}
	if(isset($tech_hours_array[$date]))
	{
		$b_hours+=$tech_hours_array[$date];
	}
	//$b_hours += $dealer_breaks[0]['break_time'];
	$per=(($b_hours/$max_hours)*100);
	if($per>50 && $per<80){
	$class='label-warning';
	}elseif($per>=80){
		$class='label-danger';
	}
	echo '<label class="label '.$class.'">'.round($b_hours,2).'</label>'.' / '.'<label class="label label-default">'.round($max_hours,2).'</label>';
	?></td>
<?php 
$i++;
}?>
<th class="fc-widget-header fc-agenda-gutter" style="width: 17px;">&nbsp;</th></tr>
</tbody>



<?php //echo $this->element('sql_dump'); ?>