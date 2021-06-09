	<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>
	<?php echo $this->element('header_recap_report', array('s_date'=>$s_date,'e_date'=>$e_date,'export'=>$export)); ?>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sold(<?php echo count($sold_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$sold_results,'export'=>$export)); ?>
		</div>
	</div>
	
	
	