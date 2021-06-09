<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>
	<?php
	if($export){
	?>
		
		<table width="100%"><tr><td colspan="12" style="font-size:24px;background-color:#3695d5;color:white;align:center;">Dealership Performance 360 CRM (<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?> - BDC/Sales Appts Sold Report) </td></tr></table>
	<?php
	}else{
	?>
		<h3 class="text-primary">Dealership Performance 360 CRM (<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?> - BDC/Sales Appts Sold Report) </h3>
	<?php
	}
	?>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Leads(<?php echo count($all_contacts);?>)</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array('step_log_results'=>$all_contacts,'export'=>$export,'appt_report' => true)); ?>
		</div>
	</div>
	
	