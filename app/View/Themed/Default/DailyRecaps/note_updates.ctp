	<?php echo $this->element('header_recap_report', array('s_date'=>$s_date,'e_date'=>$e_date,'export'=>$export)); ?>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Note Update (Open)(<?php echo count($note_update_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('note_updates', array('note_update_results'=>$note_update_results,'export'=>$export)); ?>
		</div>
	</div>
	
	<?php
	if(!$export){
	?>
		<script src="/app/View/Themed/Default/webroot/assets/components/library/readmore/readmore.js?v=v1.0.2&sv=v0.0.1"></script>
		<script> $('notes').readmore({maxHeight: <?php echo $ReadmoreHeight;?>}); </script>
	<?php
	}
	?>