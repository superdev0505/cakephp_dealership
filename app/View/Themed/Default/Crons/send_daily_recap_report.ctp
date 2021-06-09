<!DOCTYPE html>
<body>
	<head>
		
Dear Dealer,

Please find below the report as on (<?php echo date("F j, Y",strtotime($s_date))." to ".date("F j, Y",strtotime($e_date)); ?>)
<br/>
<br/>
<br/>

<?php echo $this->element('header_recap_report', array('s_date'=>$s_date,'e_date'=>$e_date,'export'=>$export)); ?>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Showroom Leads(<?php echo count($step_log_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array('step_log_results'=>$step_log_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sold(<?php echo count($sold_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('sold', array('sold_results'=>$sold_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Web Leads(<?php echo count($web_lead_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('web_leads', array('web_lead_results'=>$web_lead_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Email (Open)(<?php echo count($email_open_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('email_open', array('email_open_results'=>$email_open_results,'export'=>$export)); ?>
		</div>
	</div>
	<!--
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Note Update (Open)(<?php echo count($note_update_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php //echo $this->element('note_updates', array('note_update_results'=>$note_update_results,'export'=>$export)); ?>
		</div>
	</div> -->
	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">New Inbound/Outbound Phone Calls(<?php echo count($new_inbound_phone_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('new_inbound_phones', array('new_inbound_phone_results'=>$new_inbound_phone_results,'export'=>$export)); ?>
		</div>
	</div>
	
	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Existing Inbound/Outbound Phone Calls(<?php echo count($exiting_outbound_phone_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('existing_outbound_phones', array('exiting_outbound_phone_results'=>$exiting_outbound_phone_results,'export'=>$export)); ?>
		</div>
	</div>
	
	</body>
</html>