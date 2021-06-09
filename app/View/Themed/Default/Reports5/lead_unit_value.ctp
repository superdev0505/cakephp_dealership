<p class="lead margin-none"> 
	<span class="text-large text-regular">
		<?php	
		if($report_results[0][0]['sold_vehicle'] == '')
			echo "0";
		else
			echo $report_results[0][0]['sold_vehicle'];
	 	?>
	</span> 
</p>
<p class="lead"> 
	<span class="text-primary">transactions</span> this month
</p>
<div class="progress progress-mini">
	<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
</div>
<p class="margin-none">
	<?php echo $month_year; ?>
</p>
