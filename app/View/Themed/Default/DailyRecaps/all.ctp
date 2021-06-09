<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>

<?php echo $this->element('header_recap_report', array('s_date'=>$s_date,'e_date'=>$e_date,'export'=>$export)); ?>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Showroom Leads(<?php echo count($step_log_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$step_log_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Closed(<?php echo count($closed_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$closed_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sold(<?php echo count($sold_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$sold_results,'export'=>$export)); ?>
		</div>
	</div>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Web Leads(<?php echo count($web_lead_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$web_lead_results,'export'=>$export)); ?>
		</div>
	</div>

	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Phone Leads(<?php echo count($phone_lead_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$phone_lead_results,'export'=>$export)); ?>
		</div>
	</div>

	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Mobile Leads(<?php echo count($mobile_lead_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$mobile_lead_results,'export'=>$export)); ?>
		</div>
	</div>


	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Email (Open)(<?php echo count($email_open_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$email_open_results,'export'=>$export)); ?>
		</div>
	</div>
	<!-- <div class="widget">
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
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$new_inbound_phone_results,'export'=>$export)); ?>
		</div>
	</div>
	
	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Existing Inbound/Outbound Phone Calls(<?php echo count($exiting_outbound_phone_results);?>): All Sales People</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php echo $this->element('step_logs', array( 'next_act'=>$next_acvt,  'step_log_results'=>$exiting_outbound_phone_results,'export'=>$export)); ?>
		</div>
	</div>
        <!-- 
        <div class="widget">
		<div class="widget-head">
			<h4 class="heading">BDC Survey(<?php echo count($bdc_results);?>)</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php //echo $this->element('bdc', array('bdc_results'=>$bdc_results,'export'=>$export)); ?>
		</div>
	</div> 

        <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Events(<?php echo count($events_results);?>)</h4>
		</div>
		<div class="widget-body innerAll">	
			<?php //echo $this->element('events', array('events_results'=>$events_results,'export'=>$export)); ?>
		</div>
	</div>
        -->

   <script >

$(function(){


	$(".read_more_contact_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});




})



   </script>
