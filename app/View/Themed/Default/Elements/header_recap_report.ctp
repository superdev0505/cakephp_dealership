<?php
	if($export){
	?>
		
		<table width="100%"><tr><td colspan="12" style="font-size:24px;background-color:#3695d5;color:white;align:center;">Dealership Performance 360 CRM (<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?> - Recap Report) </td></tr></table>
	<?php
	}else{
	?>
		<h3 class="text-primary">Dealership Performance 360 CRM (<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?> - Recap Report) </h3>
	<?php
	}
	?>