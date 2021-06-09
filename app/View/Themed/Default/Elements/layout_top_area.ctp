<?php

	//echo $this->Html->css(array('Chat.chat.css','Chat.jquery-ui.min.css'));
	//echo $this->Html->script(array('Chat.chat.js','Chat.jquery-ui.min.js'));
	if(empty($team_members_floor)){
		$team_members_floor = array();
	}

?>
<style>

@media (max-width: 650px) {
	.modal-footer button { width: 90%; margin-bottom: 5px !important; }
}
.sidebar.sidebar-discover #menu>div>ul>li>a>span {
	position: absolute;
	left: 50px;
	top: 0;
}

.m-notification{
	color: #fff !important;
	margin-right: 10px;
	border: none;
}
.m-notification:hover{
	color: #525252 !important;
}
.sidebar.sidebar-discover #menu>div>ul>li.active>a{
	background: #353535;
	border-left: 4px solid #353535;
	border-right: 4px solid #353535;
}

.notification_modal_list li{
	border-bottom:  1px solid #e2e1e1;
	padding-bottom: 5px;

}

@media (max-width:1484px) {
	.condensed {display:none;}
}
@media (max-width: 1200px) {
	.navbar > ul.main {
    width: 36%;
    height: auto;
	}
}
</style>

<div class="navbar hidden-print main" role="navigation">

	<span id="default_d_type" d_type = "<?php echo (AuthComponent::user('d_type')!='')? AuthComponent::user('d_type') : "Powersports"; ?>" ></span>

	<div class="pull-left">


		<div class="user-action user-action-btn-navbar pull-left border-right" style='display: none;'>
			<button class="btn btn-sm btn-navbar btn-default"><i class="fa fa-bars fa-2x"></i></button>
		</div>

		<span id="refresh_stat" style='float: left; display: none'>.</span>
	</div>
	<div class="pull-left header-logo">
		<a class="pull-left" href="/dashboards/main"><img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM" /></a>
		<div class="pull-left header-text">
			<strong>For Support:</strong>
			(800) 516-1768 Ext. 2
			<br>
			Email: <a href="/supports/add">support@dp360crm.com</a>
	</div>
	</div>


	<ul class="main pull-right">

    <?php /* if(isset($bdc_rep_webleads)){ ?>

	<li class="dropdown notif notifications hidden-xs" id='show-bdc-notification'>
		<a href="/contacts/leads_main/?quick_lead_search=bdc_rep_webleads&stat_type=Dealer" class="dropdown-toggle" ><i class="icon-note-pad" style="font-size: 16px;"></i>  BDC. <span class="label label-danger" id="show-bdc-notification-count"><?php echo count($bdc_rep_webleads); ?></span></a>
	</li>
	<?php } */

	?>

		<?php if($vehicle_match_settings == 'On'){ ?>
		<li class="dropdown notif notifications hidden-xs" id="ntf_vehicle_match_alerts">
			<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i>    Vehicle Match
				<span class="label label-inverse">0</span>
			</a>
		</li>
		<?php } ?>

		<li class="dropdown notif notifications hidden-xs" id="ntf_push_lead_alerts">
			<a href="" class="notification_modal_top no-ajaxify" modal_title="Push" ><i class="icon-bell-fill"></i>    Push
				<span class="label label-inverse">0</span>
			</a>
		</li>

		<li class="dropdown notif notifications hidden-xs" id="ntf_weblead_arrived">
			<a href="" class="notification_modal_top no-ajaxify" ><i class="icon-bell-fill"></i>  Web Lead
				<span class="label label-<?php echo count($web_lead_arrived) == 0 ? "inverse" : "danger"; ?>"><?php echo count($web_lead_arrived); ?></span>
			</a>
			<?php if(!empty($web_lead_arrived)){ ?>
			<ul class="dropdown-menu chat media-list pull-right"  style="width: 300px;">
				<?php foreach($web_lead_arrived as $web_lead_a){ ?>
				<li class="media">

					<a href="/contacts/leads_main/view/<?php echo $web_lead_a['Contact']['id']; ?>" style="float: left">
						<i class="fa fa-fw icon-bell-fill"></i>
					</a>

					<div class="media-body">
						<a href="/contacts/leads_main/view/<?php echo $web_lead_a['Contact']['id']; ?>">
						<span class="label label-default pull-right"><?php echo date("m/d/Y g:i A",strtotime($web_lead_a['Contact']['modified'])); ?></span>
						<h5 class="media-heading"><u class="text-primary"><?php echo $web_lead_a['Contact']['first_name']; ?> <?php echo $web_lead_a['Contact']['last_name']; ?> #<?php echo $web_lead_a['Contact']['id']; ?></u></h5>
						</a>
						<p class="margin-none">
							<a href="/contacts/leads_main/view/<?php echo $web_lead_a['Contact']['id']; ?>" style="font-weight: normal;">
							Source: <?php echo $web_lead_a['Contact']['source']; ?>,
							Status: <?php echo $web_lead_a['Contact']['status']; ?>, Step: <?php echo $web_lead_a['Contact']['sales_step']; ?>
							</a>
						</p>
					</div>

				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>

		<li class="dropdown notif notifications hidden-xs"  id="tf_int_lead_appointment">
			<a href="" class="notification_modal_top no-ajaxify" modal_title="Internet Appt."><i class="icon-note-pad" style="font-size: 16px;"></i> Internet Appt.
				<span class="label label-inverse" id="int_apt_log_show_count">0</span>
			</a>
		</li>
		<?php $bdc_lead_appointments = array(); ?>
		<li class="dropdown notif notifications hidden-xs"  id="tf_lead_appointment">
			<a href="" class="notification_modal_top no-ajaxify" modal_title="BDC Appt." ><i class="icon-note-pad" style="font-size: 16px;"></i> BDC Appt.
				<span class="label label-<?php echo count($bdc_lead_appointments) == 0 ? "inverse" : "danger"; ?>" id="apt_log_show_count"><?php echo count($bdc_lead_appointments); ?></span>
			</a>
			<?php if(!empty($bdc_lead_appointments)){ ?>
            <ul class="dropdown-menu chat media-list pull-right">
				<?php foreach($bdc_lead_appointments as $lead_appointment){ ?>
				<li class="media" id="lead_appt_li_<?php echo $lead_appointment['Event']['id']; ?>">

					<div class="media-body">
						<a  href="/events">
						<span class="label label-default pull-right"><?php echo date("m/d/Y g:i A",strtotime($lead_appointment['Event']['created'])); ?></span>
						<h5 class="media-heading">  <?php echo $lead_appointment['Event']['first_name'].' '.$lead_appointment['Event']['last_name']; ?> #<?php echo $lead_appointment['Event']['contact_id']; ?></h5>
						</a>
						<p class="margin-none">
							<span class="muted"><i class="fa fa-calendar"></i> <span <?php if ($is_overdue == true) echo "style='color: #CC3A3A'";  ?> > <?php echo date('m/d/Y h:iA', strtotime($lead_appointment['Event']['start'])); ?> -
														<?php echo date('m/d/Y h:iA', strtotime($lead_appointment['Event']['end'])); ?></span></span>
														<span class="muted">
															<span><strong>Title:</strong>&nbsp;<?php echo $lead_appointment['Event']['title'] ?>&nbsp;</span>
															<span><strong>Event Notes:</strong>&nbsp;<?php echo $lead_appointment['Event']['details'] ?>&nbsp;</span>
														</span>
						</p>
                        <a href="#" class="pull-right no-ajaxify hide_lead_appointment" data-id="<?php echo $lead_appointment['Event']['id']; ?>"><span class="label label-info pull-right">Hide</span></a>
					</div>

				</li>
				<?php } ?>
			</ul>

			<?php } ?>
		</li>


		<li class="dropdown notif notifications hidden-xs" id="tf_manager_message">
			<a href="" class="notification_modal_top no-ajaxify"><i class="fa fa-comment"></i>  MGR Message
				<span class="label label-<?php echo count($manager_messages) == 0 ? "inverse" : "danger"; ?>" id="mgr_msg_show_count"><?php echo count($manager_messages); ?></span>
			</a>
			<?php if(!empty($manager_messages)){ ?>
			<ul class="dropdown-menu chat media-list pull-right">
				<?php foreach($manager_messages as $manager_message){ ?>
				<li class="media" id="mgr_msg_li_<?php echo $manager_message['ManagerMessage']['id']; ?>">

					<div class="media-body">
						<a class="compose_manager_message no-ajaxify" href="/manager_messages/reply/<?php echo $manager_message['ManagerMessage']['contact_id']; ?>/<?php echo $manager_message['ManagerMessage']['id']; ?>">
						<span class="label label-default pull-right"><?php echo date("m/d/Y g:i A",strtotime($manager_message['ManagerMessage']['created'])); ?></span>
						<h5 class="media-heading"><i class="fa fa-comment"></i>  <?php echo $manager_message['ManagerMessage']['sender_name']; ?> #<?php echo $manager_message['ManagerMessage']['id']; ?></h5>
						</a>
						<p class="margin-none">
							<a class="compose_manager_message no-ajaxify" href="/manager_messages/reply/<?php echo $manager_message['ManagerMessage']['contact_id']; ?>/<?php echo $manager_message['ManagerMessage']['id']; ?>" style="font-weight: normal;">
								<u class="text-primary"><?php echo $manager_message['Contact']['first_name']; ?> <?php echo $manager_message['Contact']['last_name']; ?></u><br />
								<span style=" font-size: 13px; "><?php echo $manager_message['ManagerMessage']['message']; ?></span>
							</a>
						</p>
                        <a href="#" class="pull-right no-ajaxify hide_mgr_msg" data-id="<?php echo $manager_message['ManagerMessage']['id']; ?>"><span class="label label-info pull-right">Hide</span></a>
					</div>

				</li>
				<?php } ?>
			</ul>
			<?php } ?>

		</li>
		<li class="dropdown notif notifications hidden-xs"  id="tf_Log_changes">
			<a href="" class="notification_modal_top no-ajaxify" modal_title="Log Changes" ><i class="icon-note-pad" style="font-size: 16px;"></i>  Log Changes
				<span class="label label-<?php echo count($change_log) == 0 ? "inverse" : "danger"; ?>" id="change_log_show_count"><?php echo count($change_log); ?></span>
			</a>
			<?php if(!empty($change_log)){ ?>
			<ul class="dropdown-menu chat media-list pull-right">
				<?php foreach($change_log as $change_l){ ?>
				<li class="media" id='change_log_id_<?php echo $change_l['History']['id']; ?>' >

					<?php if(strpos($change_l['History']['field_changed'],"Lead Type: Web Lead") !== false){  ?>
					<a href="/contacts/leads_main/view/<?php echo $change_l['History']['contact_id']; ?>" style="float: left">
						<i class="fa fa-fw icon-bell-fill"></i>
					</a>
					<?php }  ?>

					<div class="media-body">
						<a href="/contacts/leads_main/view/<?php echo $change_l['History']['contact_id']; ?>">
						<span class="label label-default pull-right"><?php echo date("m/d/Y g:i A",strtotime($change_l['History']['created'])); ?></span>
						<h5 class="media-heading"><?php echo $change_l['User']['first_name']; ?> <?php echo $change_l['User']['last_name']; ?></h5>
						</a>
						<p class="margin-none">
							<a href="/contacts/leads_main/view/<?php echo $change_l['History']['contact_id']; ?>" style="font-weight: normal;">
								<u class="text-primary"><?php echo $change_l['Contact']['first_name']; ?> <?php echo $change_l['Contact']['last_name']; ?> # <?php echo $change_l['Contact']['id']; ?></u>
								<br />
								<?php echo $change_l['History']['field_changed']; ?>
							</a>
						</p>
						<a href="#" class="pull-right no-ajaxify hide_change_log" log_id="<?php echo $change_l['History']['id']; ?>"><span class="label label-info pull-right">Hide</span></a>
					</div>

				</li>
				<?php } ?>
			</ul>
			<?php } ?>

		</li>

		<?php if( in_array(AuthComponent::user('dealer_id'),array(5000,2501,1370)) && false ){ ?>
<!--		<li>-->

        <?php
				//$SupportStaffChatId=Configure::read('SupportStaffChatId');
				//$d_user_chat = $SupportStaffChatId.'_'.AuthComponent::user('id'); ?>
<!--<a href="javascript:void(0)" class="user_chat_key" data-key="chat_<?php //echo $d_user_chat; ?>" data-name="DP 360 Support" data-id="<?php //echo $SupportStaffChatId; ?>">-->
                                          <?php //echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/1423012961_Messages-32.png'); ?>

<!--</a>

        </li>-->
		<?php } ?>



		<li class="username">
			<a href="javascript:" class="user_menu_popup" >
				<u><?php echo AuthComponent::user('full_name'); ?></u>
			</a>
		</li>






	</ul>

</div>





<!-- Modal -->
<div class="modal fade" id="modal-2-user_settings" style="z-index: 20000">

	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<div>
					 <center>
						Default Search Lead Range Two Years: <div class="make-switch" data-on="success" data-off="default">
							<input name="default_search_lead_range" id="default_search_lead_range"
							 type="checkbox"  <?php if($default_search_lead_range == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
						</div>
	 					<br><br>

	 					Daily Events Reminder Email:
	 					<div class="make-switch" data-on="success" data-off="default">
							<input name="event_reminder_email" id="event_reminder_email"
							 type="checkbox"  <?php if($event_reminder_email == 'On') echo 'checked="checked"'; else echo ''; ?>   />
						</div>

						<br><br>

						Open Workload after login:
	 					<div class="make-switch" data-on="success" data-off="default">
							<input name="login_redirect_workload" id="login_redirect_workload"
							 type="checkbox"  <?php if($login_redirect_workload == 'On') echo 'checked="checked"'; else echo ''; ?>   />
						</div>

					</center>

				</div>


			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
			</div>


		</div>
	</div>

</div>
<!-- // Modal END -->










<script>

function dateformat(datestr){
	var t = datestr.split(/[- :]/);
	var date = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
	d = date.toLocaleTimeString().replace(/:\d+ /, ' ');
	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear() + " "+d;
}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


		$(".user_menu_popup").click(function(){


			var menu_html = ''+
			''+

				<?php if ($_SESSION['Auth']['User']['group_id'] == 1  ) { ?>
					'<a href="/adminhome/" class="glyphicons user"><i></i> Admin Home</a> &nbsp;'+
				<?php } ?>


				'<a href="#modal-2-user_settings" data-toggle="modal" class="btn btn-primary no-ajaxify"><i class="fa fa-gears"></i> Settings</a> &nbsp;'+
				'<a href="/user_emails/inbox" class="btn btn-primary no-ajaxify"><i class="fa fa-envelope-o"></i> Messages</a> &nbsp;'+
				'<a href="/supports/add" class="btn btn-primary no-ajaxify"><i class="fa fa-question-circle"></i> Support</a> &nbsp;'+
				'<a href="/users/logout" class="btn btn-danger no-ajaxify"><i class="fa fa-sign-out"></i> Logout</a> &nbsp;'+
			'';



			bootbox.dialog({
				message: menu_html,
				title: "<?php echo AuthComponent::user('full_name'); ?>",
				buttons: {
					success: {
						label: "Ok",
						className: "btn-success",
						callback: function() {
						}
					},
				}
			});


		});

















	$("#default_search_lead_range").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings_user_id/default_search_lead_range/",
			success: function(data){
				alert('Plese refresh to see chnages');
			}
		});

	});

	$("#event_reminder_email").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings_user_id/event_reminder_email/",
			success: function(data){
				//alert('Plese refresh to see chnages');
			}
		});

	});

	$("#login_redirect_workload").change(function(){

		$.ajax({
			type: "post",
			cache: false,
			dataType: 'json',
			data: {'value': $(this).is(":checked")},
			url:  "/crmgroup/save_settings_user_id/login_redirect_workload/",
			success: function(data){
				//alert('Plese refresh to see chnages');
			}
		});

	});






	//console.log(' <?php echo $this->Session->read('stat_user'); ?>   ');
	//console.log(' <?php echo $this->Session->read('stats_month'); ?>   ');



	stat_options = "<?php echo $this->Session->read('stat_user'); ?>";
	<?php
		$stats_month = $this->Session->read('stats_month');
		if($stats_month == null){
			$stats_month = date('m');
		}

		$stats_year = $this->Session->read('stats_year');
		//debug($stats_year);
		if($stats_year == null){
			$stats_year = date('Y');
		}

		$user_zone = "?stats_month=".$stats_month."&stats_year=".$stats_year."&zone=".AuthComponent::user('zone');

		$team_members_floor_ids = implode(",", $team_members_floor);

	?>
	if(stat_options == 'Dealer_day' || stat_options == 'Dealer_month' || stat_options == '' ){
		stat_options = 	'Dealer';
	}

	function call_notification(notification_type){

		// console.log(notification_type);

		return $.ajax({
            url: '/notifications/index/<?php echo AuthComponent::user('id'); ?>/<?php echo AuthComponent::user('dealer_id'); ?>/<?php echo AuthComponent::user('group_id'); ?>/<?php echo $user_zone; ?>',
			type: 'get',
			cache: false,
			data: {'notification_type':notification_type, 'stat_options': stat_options, 'team_members_floor_ids' : '<?php echo $team_members_floor_ids; ?>'},
			dataType: 'json',
            success: function (response) {

				<?php  if($this->request->params['controller'] == 'dashboards' && $this->request->params['action'] == 'main'){ ?>

					//Refresh dashboard stat with clearing cache if return all zeros
					if(notification_type == 'first' && response.dashboard_stats.open_lead_count == '0' ){
						setTimeout(function() {
					    	call_notification('Refresh');
						}, 2000)
					}


					$("#current_date_time").html(response.current_date_time);
					$("#phone_dormant_48hrs").html(response.dashboard_stats.phone_dormant_48hrs);

					// $("#web_email_sent").html(response.dashboard_stats.web_email_sent);
					// $("#web_appointment").html(response.dashboard_stats.web_appointment);
					// $("#web_closed_today").html(response.dashboard_stats.web_closed_today);
					// $("#web_sold_today").html(response.dashboard_stats.web_sold_today);
					// $("#web_missed_event").html(response.dashboard_stats.web_missed_event);
					// $("#web_noteupdate_today").html(response.dashboard_stats.web_noteupdate_today);
					// $("#web_sms_text").html(response.dashboard_stats.web_sms_text);

					// $("#mobile_email_sent").html(response.dashboard_stats.mobile_email_sent);
					// $("#mobile_appointment").html(response.dashboard_stats.mobile_appointment);
					// $("#mobile_closed_today").html(response.dashboard_stats.mobile_closed_today);
					// $("#mobile_sold_today").html(response.dashboard_stats.mobile_sold_today);
					// $("#mobile_missed_event").html(response.dashboard_stats.mobile_missed_event);
					// $("#mobile_noteupdate_today").html(response.dashboard_stats.mobile_noteupdate_today);
					// $("#mobile_sms_text").html(response.dashboard_stats.mobile_sms_text);

					// $("#phone_email_sent").html(response.dashboard_stats.phone_email_sent);
					// $("#phone_appointment").html(response.dashboard_stats.phone_appointment);
					// $("#phone_closed_today").html(response.dashboard_stats.phone_closed_today);
					// $("#phone_sold_today").html("response.dashboard_stats.phone_sold_today");
					// $("#phone_missed_event").html(response.dashboard_stats.phone_missed_event);
					// $("#phone_noteupdate_today").html(response.dashboard_stats.phone_noteupdate_today);
					// $("#phone_sms_text").html(response.dashboard_stats.phone_sms_text);

					$("#open_lead_count").html(response.dashboard_stats.open_lead_count);
					$("#closed_lead_count").html(response.dashboard_stats.closed_lead_count);
					$("#pending_lead_count").html(response.dashboard_stats.pending_lead_count);

					$("#sold_lead_count").html(response.dashboard_stats.sold_lead_count);
					$("#dormant_lead_count").html(response.dashboard_stats.dormant_lead_count);
					$("#today_event_count").html(response.dashboard_stats.today_event_count);

					if( response.dashboard_stats.overdue_event_count != '0' )
						$("#overdue_event_count").addClass('text-danger');
					$("#overdue_event_count").html(response.dashboard_stats.overdue_event_count);

					if( response.dashboard_stats.today_lead_count < 5 )
						$("#today_lead_count").addClass('text-danger');
					$("#today_lead_count").html(response.dashboard_stats.today_lead_count);


					/* stats */
					if( response.webleads.length != 0 ){
						$(".web_just_arrived_icon").removeClass("bg-success");
						$(".web_just_arrived_icon").addClass("bg-danger");
					}else{
						$(".web_just_arrived_icon").removeClass("bg-danger");
						$(".web_just_arrived_icon").addClass("bg-success");
					}
					$("#web_just_arrived").html(response.dashboard_stats.web_just_arrived);
					$("#web_worked_today").html(response.dashboard_stats.web_worked_today);
					$("#web_still_pending").html(response.dashboard_stats.web_still_pending);
					$("#web_dormant_48hrs").html(response.dashboard_stats.web_dormant_48hrs);

					$("#mobile_just_arrived").html(response.dashboard_stats.mobile_just_arrived);
					$("#mobile_worked_today").html(response.dashboard_stats.mobile_worked_today);
					$("#mobile_still_pending").html(response.dashboard_stats.mobile_still_pending);
					$("#mobile_dormant_48hrs").html(response.dashboard_stats.mobile_dormant_48hrs);

					$("#showroom_new_visit").html(response.dashboard_stats.showroom_new_visit);
					$("#web_visit").html(response.dashboard_stats.web_visit);
					$("#showroom_existing_visit").html(response.dashboard_stats.showroom_existing_visit);
					$("#showroom_dormant_48hrs").html(response.dashboard_stats.showroom_dormant_48hrs);

					$("#showroom_worksheet").html(response.dashboard_stats.showroom_worksheet);






					$("#new_inbound").html(response.dashboard_stats.new_inbound);
					$("#new_outbound").html(response.dashboard_stats.new_outbound);
					//$("#existing_in").html(response.dashboard_stats.existing_in);
					//$("#existing_out").html(response.dashboard_stats.existing_out);


				<?php }	?>

 				//weblead update
				la = "";
				var bdc_appt_length = response.bdc_lead_appointments.length + response.bdc_r_c.length
				la_icon_color = (bdc_appt_length == 0)? "inverse" : "danger";
				la += '<a href="" class="notification_modal_top no-ajaxify" modal_title="BDC Appt." ><i class="icon-note-pad" style="font-size: 16px;"></i>  <span class="condensed">BDC Appt.</span> <span class="label label-'+la_icon_color+'" id="apt_log_show_count">'+ bdc_appt_length +'</span></a>';
				if(bdc_appt_length > 0){
					la += ' <ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.bdc_lead_appointments, function(key, appt){
								la +='<li class="media" id="lead_appt_li_'+appt.Event.id+'">'+

						'<div class="media-body">'+
						'<a class="no-ajaxify"  href="/contacts/leads_main/view/'+appt.Event.contact_id+'" >'+
						'<span class="label label-default pull-right">'+dateformat(appt.Event.created)+'</span>'+
						'<h5 class="media-heading">'+appt.Event.first_name  +' '+appt.Event.last_name+' #'+appt.Event.contact_id+'</h5>'+
						'</a>'+
						'<p class="margin-none">'+
							'<span class="muted"><i class="fa fa-calendar"></i> <span>'+dateformat(appt.Event.start)+' - '+dateformat(appt.Event.end)+'</span></span>'+
														'<span class="muted">'+
															'<span><strong>Title:</strong>&nbsp;'+appt.Event.title+'&nbsp;</span>'+
															'<span><strong>Event Notes:</strong>&nbsp;'+appt.Event.details+'&nbsp;</span>'+
														'</span>'+
							'</p>'+
	                        '<a href="#" class="pull-right no-ajaxify hide_lead_appointment" data-id="'+appt.Event.id+'"><span class="label label-info pull-right">Hide</span></a>'+
						'</div>'+

					'</li>';
					});


					jQuery.each(response.bdc_r_c, function(key, appt){
								la +='<li class="media" id="lead_appt_bdcrcc_li_'+appt.Contact.id+'">'+

							'<a class="no-ajaxify" href="/contacts/leads_main/view/'+appt.Contact.id+'" style="float: left">'+
								'<i class="fa fa-fw icon-bell-fill"></i>'+
							'</a>'+
							'<div class="media-body">'+
								'<a class="no-ajaxify" href="/contacts/leads_main/view/'+appt.Contact.id+'">'+
								'<span class="label label-default pull-right">'+dateformat(appt.Contact.modified)+'</span>'+
								'<h5 class="media-heading"><u class="text-primary">'+appt.Contact.first_name+' '+appt.Contact.last_name+' #'+appt.Contact.id+'</u></h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a class="no-ajaxify" href="/contacts/leads_main/view/'+appt.Contact.id+'" style="font-weight: normal;">'+
									'Source: '+appt.Contact.source+', '+
									'Status: '+appt.Contact.status+
									'</a>'+
								'</p>'+
							'</div>'+

					'</li>';
					});






				la += '</ul>';
				}
				$("#tf_lead_appointment").html(la);


				//internet sales manger appt.


				inter_apt = "";
				inter_apt_icon_color = (response.int_sales_manager_appointments.length == 0)? "inverse" : "danger";
				inter_apt += '<a href="" class="notification_modal_top no-ajaxify" modal_title="Internet Appt." ><i class="icon-note-pad" style="font-size: 16px;"></i> <span class="condensed">Internet Appt.</span> <span class="label label-'+inter_apt_icon_color+'" id="int_apt_log_show_count">'+response.int_sales_manager_appointments.length+'</span></a>';
				if(response.int_sales_manager_appointments.length > 0){
					inter_apt += ' <ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.int_sales_manager_appointments, function(key, appt){
								inter_apt +='<li class="media" id="int_lead_appt_li_'+appt.Event.id+'">'+

					'<div class="media-body">'+
						'<a class="no-ajaxify" href="/contacts/leads_main/view/'+appt.Event.contact_id+'">'+
						'<span class="label label-default pull-right">'+dateformat(appt.Event.created)+'</span>'+
						'<h5 class="media-heading">'+appt.Event.first_name  +' '+appt.Event.last_name+' #'+appt.Event.contact_id+'</h5>'+
						'</a>'+
						'<p class="margin-none">'+
							'<span class="muted"><i class="fa fa-calendar"></i> <span>'+dateformat(appt.Event.start)+' - '+dateformat(appt.Event.end)+'</span></span>'+
														'<span class="muted">'+
															'<span><strong>Title:</strong>&nbsp;'+appt.Event.title+'&nbsp;</span>'+
															'<span><strong>Event Notes:</strong>&nbsp;'+appt.Event.details+'&nbsp;</span>'+
														'</span>'+
						'</p>'+
                        '<a href="#" class="pull-right no-ajaxify hide_int_lead_appointment"  data-dealerid = "'+appt.Event.dealer_id+'"  data-id="'+appt.Event.id+'"><span class="label label-info pull-right">Hide</span></a>'+
					'</div>'+

				'</li>';
				});
				inter_apt += '</ul>';
				}
				$("#tf_int_lead_appointment").html(inter_apt);



				wc="";
				web_lead_icon_color = (response.webleads.length == 0)? "inverse" : "danger";
				wc += '<a href="" modal_title="Web Lead" class="notification_modal_top no-ajaxify" ><i class="icon-bell-fill"></i>  <span class="condensed">Web Lead</span> <span class="label label-'+web_lead_icon_color+'">'+response.webleads.length+'</span></a>';
				
				if(response.webleads.length > 0){
					wc += '<ul class="dropdown-menu chat media-list pull-right"  style="width: 300px;">';
					jQuery.each(response.webleads, function(key, wb){
						wc += '<li class="media">'+
							'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'" style="float: left">'+
								'<i class="fa fa-fw icon-bell-fill"></i>'+
							'</a>'+
							'<div class="media-body">'+
								'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'">'+
								'<span class="label label-default pull-right">'+dateformat(wb.Contact.modified)+'</span>'+
								'<h5 class="media-heading"><u class="text-primary">'+wb.Contact.first_name+' '+wb.Contact.last_name+' #'+wb.Contact.id+'</u></h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'" style="font-weight: normal;">'+
									'Source: '+wb.Contact.source+', '+
									'Status: '+wb.Contact.status+', Step: '+wb.Contact.sales_step+
									'</a>'+
								'</p>'+
							'</div>'+

						'</li>';
					});
				   wc += '</ul>';
				}
				$("#ntf_weblead_arrived").html(wc);

				//MGR Message
				wm = "";
				wm_icon_color = (response.managerMessages.length == 0)? "inverse" : "danger";
				wm += '<a href="" modal_title="MGR Message" class="notification_modal_top no-ajaxify" ><i class="fa fa-comment"></i>  <span class="condensed">MGR Message</span> <span class="label label-'+wm_icon_color+'" id="mgr_msg_show_count">'+response.managerMessages.length+'</span></a>';
				if(response.managerMessages.length > 0){
					wm += '<ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.managerMessages, function(key, wb){
						wm += ''+
						'<li class="media" id="mgr_msg_li_'+wb.ManagerMessage.id+'">'+
							'<div class="media-body">'+
								'<a class="compose_manager_message no-ajaxify"  href="/manager_messages/reply/'+wb.ManagerMessage.contact_id+'/'+wb.ManagerMessage.id+'">'+
								'<span class="label label-default pull-right">'+dateformat(wb.ManagerMessage.created)+'</span>'+
								'<h5 class="media-heading"><i class="fa fa-comment"></i>  '+wb.ManagerMessage.sender_name+' #'+wb.ManagerMessage.id+'</h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a class="compose_manager_message no-ajaxify"  href="/manager_messages/reply/'+wb.ManagerMessage.contact_id+'/'+wb.ManagerMessage.id+'" style="font-weight: normal;">'+
										'<u class="text-primary">'+wb.Contact.first_name+' '+wb.Contact.last_name+'</u><br />'+
										'<span style=" font-size: 13px; ">'+wb.ManagerMessage.message+'</span>'+
									'</a>'+
								'</p>'+
							'<a href="#" class="pull-right no-ajaxify hide_mgr_msg" data-id="'+wb.ManagerMessage.id+'"><span class="label label-info pull-right">Hide</span></a></div>'+
						'</li>';
					});
					wm += '</ul>';
				}
				$("#tf_manager_message").html(wm);

				<?php if($vehicle_match_settings == 'On'){ ?>
				//Vehicle match notification
				v_match = "";
				v_match_icon_color = (response.vehicle_match_alerts.length == 0)? "inverse" : "danger";
				v_match += '<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i>  <span class="condensed">Vehicle Match</span> <span class="label label-'+v_match_icon_color+'" id="v_match_show_count">'+response.vehicle_match_alerts.length+'</span></a>';
				if(response.vehicle_match_alerts.length > 0){
					v_match += '<ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.vehicle_match_alerts, function(key, wb){
						v_match += ''+
						'<li class="media" id="v_match_li_'+wb.vehicle_match_alerts.id+'">'+
							'<div class="media-body">'+
								'<a class="no-ajaxify"  href="/contacts/leads_main/view/'+wb.vehicle_match_alerts.contact_id+'">'+
								'<span class="label label-default pull-right">'+dateformat(wb.vehicle_match_alerts.created)+'</span>'+
								'<h5 class="media-heading"><i class="fa fa-user"></i> #'+wb.vehicle_match_alerts.contact_id+'</h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a class="no-ajaxify"  href="/contacts/leads_main/view/'+wb.vehicle_match_alerts.contact_id+'" style="font-weight: normal;">'+
										'<u class="text-primary">'+wb.vehicle_match_alerts.year+', '+wb.vehicle_match_alerts.make+', '+   wb.vehicle_match_alerts.model    +'</u><br />'+
									'</a>'+
								'</p>'+
							'<a href="#" class="pull-right no-ajaxify hide_v_match" data-id="'+wb.vehicle_match_alerts.id+'"><span class="label label-info pull-right">Hide</span></a></div>'+
						'</li>';
					});
					v_match += '</ul>';
				}
				$("#ntf_vehicle_match_alerts").html(v_match);
				<?php } ?>


	
				v_lead_push_alert = "";
				v_lead_push_alert_icon_color = (response.lead_push_cnt.length == 0)? "inverse" : "danger";
				v_lead_push_alert += '<a href="" class="notification_modal_top no-ajaxify" modal_title="Push" ><i class="icon-bell-fill"></i>  <span class="condensed">Push</span> <span class="label label-'+v_lead_push_alert_icon_color+'" id="v_lead_push_alert_show_count">'+response.lead_push_cnt.length+'</span></a>';
				if(response.lead_push_cnt.length > 0){
					v_lead_push_alert += '<ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.lead_push_cnt, function(key, wb){
						//console.log(wb.Contact.id);
						v_lead_push_alert += '<li class="media">'+
							'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'" style="float: left">'+
								'<i class="fa fa-fw icon-bell-fill"></i>'+
							'</a>'+
							'<div class="media-body">'+
								'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'">'+
								'<span class="label label-default pull-right">'+dateformat(wb.Contact.modified)+'</span>'+
								'<h5 class="media-heading"><u class="text-primary">'+wb.Contact.first_name+' '+wb.Contact.last_name+' #'+wb.Contact.id+'</u></h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a class="no-ajaxify" href="/contacts/leads_main/view/'+wb.Contact.id+'" style="font-weight: normal;">'+
									'Source: '+wb.Contact.source+', '+
									'Status: '+wb.Contact.status+
									'</a>'+
								'</p>'+
							'</div>'+

						'</li>';
					});
					v_lead_push_alert += '</ul>';
				}
				$("#ntf_push_lead_alerts").html(v_lead_push_alert);





				//Log Changes
				lc = "";
				lc_icon_color = (response.histories.length == 0)? "inverse" : "danger";
				lc += '<a href="" class="notification_modal_top no-ajaxify" modal_title="Log Changes" ><i class="icon-note-pad" style="font-size: 16px;"></i>  <span class="condensed">Log Changes</span> <span class="label label-'+lc_icon_color+'" id="change_log_show_count">'+response.histories.length+'</span></a>';
				if(response.histories.length > 0){
					lc += '<ul class="dropdown-menu chat media-list pull-right">';
					jQuery.each(response.histories, function(key, wb){
						fieldchange = "";
						if(wb.History.field_changed != null){
							fieldchange = wb.History.field_changed;
						}
						lc += ''+
						'<li class="media" id="change_log_id_'+wb.History.id+'"  >'+
							'<a href="/contacts/leads_main/view/'+wb.History.contact_id+'" style="float: left">'+
								'<i class="fa fa-fw icon-bell-fill"></i>'+
							'</a>'+
							'<div class="media-body">'+
								'<a href="/contacts/leads_main/view/'+wb.History.contact_id+'">'+
								'<span class="label label-default pull-right">'+dateformat(wb.History.created)+'</span>'+
								'<h5 class="media-heading">'+wb.User.first_name+' '+wb.User.last_name+'</h5>'+
								'</a>'+
								'<p class="margin-none">'+
									'<a href="/contacts/leads_main/view/'+wb.History.contact_id+'" style="font-weight: normal;">'+
										'<u class="text-primary">'+wb.Contact.first_name+' '+wb.Contact.last_name+' # '+wb.Contact.id+'</u>'+
										'<br />'+
										fieldchange +
									'</a>'+
								'</p>'+
								'<a href="#" class="pull-right no-ajaxify hide_change_log" log_id="'+wb.History.id+'"><span class="label label-info pull-right">Hide</span></a>'+

							'</div>'+

						'</li>';
					});
					lc += '</ul>';
				}
				$("#tf_Log_changes").html(lc);

            },
            complete: function () {
              // setTimeout(refresh_notification, 180000);
            }
        });

	}


	function refresh_notification(notification_type){

		var jqxhr = call_notification(notification_type);

		jqxhr.complete(function(){
			setTimeout(function() {
    			refresh_notification('auto');
			}, 300000)
		});

	}

	//Call More Stat
	$("#btn_more_stat_web").click(function(event){
		if( $("#collapse_stat_web").attr("class") == 'collapse' ){
			$.ajax({
	            url: '/notifications/more_stat_web/<?php echo AuthComponent::user('id'); ?>/<?php echo AuthComponent::user('dealer_id'); ?>/<?php echo AuthComponent::user('group_id'); ?>/<?php echo $user_zone; ?>',
				type: 'get',
				cache: false,
				data: {'notification_type':'auto', 'stat_options': stat_options, 'team_members_floor_ids' : '<?php echo $team_members_floor_ids; ?>'},
				dataType: 'json',
	            success: function (response) {
	            	// console.log( response );
	            	$("#web_visit").html(response.more_email_appointment.web_visit);
	            	$("#web_email_sent").html(response.more_email_appointment.email_sent);
					$("#web_appointment").html(response.more_email_appointment.appointment);
					$("#web_closed_today").html(response.more_email_appointment.closed_today);
					$("#web_sold_today").html(response.more_email_appointment.sold_today);
					$("#web_missed_event").html(response.more_email_appointment.more_missed_event_ar);
					$("#web_noteupdate_today").html(response.more_email_appointment.note_update);
					$("#web_sms_text").html(response.more_email_appointment.sms_text);
	            }
        	});
		}
	});

	$("#btn_more_stat_phone").click(function(event){
		if( $("#collapse_stat_phone").attr("class") == 'collapse' ){
			$.ajax({
	            url: '/notifications/more_stat_phone/<?php echo AuthComponent::user('id'); ?>/<?php echo AuthComponent::user('dealer_id'); ?>/<?php echo AuthComponent::user('group_id'); ?>/<?php echo $user_zone; ?>',
				type: 'get',
				cache: false,
				data: {'notification_type':'auto', 'stat_options': stat_options, 'team_members_floor_ids' : '<?php echo $team_members_floor_ids; ?>'},
				dataType: 'json',
	            success: function (response) {

	            	$("#existing_in").html(response.more_email_appointment.existing_in);
	            	$("#existing_out").html(response.more_email_appointment.existing_out);
	            	
	            	$("#phone_email_sent").html(response.more_email_appointment.email_sent);
					$("#phone_appointment").html(response.more_email_appointment.appointment);
					$("#phone_closed_today").html(response.more_email_appointment.closed_today);
					$("#phone_sold_today").html(response.more_email_appointment.sold_today);
					$("#phone_missed_event").html(response.more_email_appointment.more_missed_event_ar);
					$("#phone_noteupdate_today").html(response.more_email_appointment.note_update);
					$("#phone_sms_text").html(response.more_email_appointment.sms_text);
	            }
        	});
		}
	});

	$("#btn_more_stat_showroom").click(function(event){
		if( $("#collapse_stat_showroom").attr("class") == 'collapse' ){

			$.ajax({
	            url: '/notifications/more_stat_showroom/<?php echo AuthComponent::user('id'); ?>/<?php echo AuthComponent::user('dealer_id'); ?>/<?php echo AuthComponent::user('group_id'); ?>/<?php echo $user_zone; ?>',
				type: 'get',
				cache: false,
				data: {'notification_type':'auto', 'stat_options': stat_options, 'team_members_floor_ids' : '<?php echo $team_members_floor_ids; ?>'},
				dataType: 'json',
	            success: function (response) {

		            $("#showroom_new_visit").html(response.more_email_appointment.showroom_new_visit);
		            $("#showroom_email_sent").html(response.more_email_appointment.email_sent);
					$("#showroom_appointment").html(response.more_email_appointment.appointment);
					$("#showroom_closed_today").html(response.more_email_appointment.closed_today);
					$("#showroom_sold_today").html(response.more_email_appointment.sold_today);
					$("#showroom_missed_appt").html(response.more_email_appointment.more_missed_event_ar);
					$("#showroom_noteupdate_today").html(response.more_email_appointment.note_update);
					$("#showroom_sms_text").html(response.more_email_appointment.sms_text);

	            }
        	});
		}
	});

	$("#btn_more_stat_mobile").click(function(event){
		if( $("#collapse_stat_mobile").attr("class") == 'collapse' ){

			$.ajax({
	            url: '/notifications/more_stat_mobile/<?php echo AuthComponent::user('id'); ?>/<?php echo AuthComponent::user('dealer_id'); ?>/<?php echo AuthComponent::user('group_id'); ?>/<?php echo $user_zone; ?>',
				type: 'get',
				cache: false,
				data: {'notification_type':'auto', 'stat_options': stat_options, 'team_members_floor_ids' : '<?php echo $team_members_floor_ids; ?>'},
				dataType: 'json',
	            success: function (response) {

	            	// console.log( response );
	            	$("#mobile_email_sent").html(response.more_email_appointment.email_sent);
					$("#mobile_appointment").html(response.more_email_appointment.appointment);
					$("#mobile_closed_today").html(response.more_email_appointment.closed_today);
					$("#mobile_sold_today").html(response.more_email_appointment.sold_today);
					$("#mobile_missed_event").html(response.more_email_appointment.more_missed_event_ar);
					$("#mobile_noteupdate_today").html(response.more_email_appointment.note_update);
					$("#mobile_sms_text").html(response.more_email_appointment.sms_text);
	            }
        	});
		}
	});



	function hide_footer(){
		$("#footer").fadeOut('slow');
	}

	setTimeout(function() {
    	refresh_notification('first');
	}, 1000)


	if(!window.notification_udpate_start){
		//setTimeout(refresh_notification, 1000);
		window.notification_udpate_start = 1;
		//refresh_notification();

		$(document).on('click', ".compose_manager_message", function(event){
		event.preventDefault();

			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){

					bootbox.dialog({
						message: data,
						title: "Instance Message",
						buttons: {
							success: {
								label: "Ok",
								className: "btn-success",
								callback: function() {

									if( $("#ManagerMessageMessage").val() != '' ){

										$("#message_eror").html('');
										$.ajax({
											type: "POST",
											data: $("#ManagerMessageReplyForm").serialize(),
											url: "/manager_messages/send/",
											success: function(data){
												//console.log(data);
												location.href = "/contacts/leads_main?search_source=left_menu";
											}
										});

									}else{
										 $("#message_eror").html('Please enter message');
										 return false;
									}
								}
							},
						}
					});


				}
			});


		});

	}

	setTimeout(hide_footer, 3000);

	$("#refresh_stat").click(function(){

		call_notification('auto');

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

	$("a.hide_mgr_msg").live('click',function(e){
											e.preventDefault();
											msg_id=$(this).attr('data-id');
											$.ajax({
												type: "GET",
												cache: false,
												url: '/notifications/hide_message/'+msg_id,
												success: function(data)
												   {
													   $("span#mgr_msg_show_count").text(data);
													   if(data=='0')
													   {
														   $("li#mgr_msg_li_"+msg_id).parent().remove();

														   $("span#mgr_msg_show_count").removeClass('label-danger');
															$("span#mgr_msg_show_count").addClass('label-inverse');


													   }else
													   {
													  		$("li#mgr_msg_li_"+msg_id).remove();

													  		$("span#mgr_msg_show_count").addClass('label-danger');
															$("span#mgr_msg_show_count").removeClass('label-inverse');

													   }
													  //console.log( $(this).parent().attr('class'));
												   }
												   });


											});


	$("a.hide_change_log").live('click',function(e){
		e.preventDefault();
		msg_id=$(this).attr('log_id');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/notifications/hide_change_log/'+msg_id,
			success: function(data){
				$("span#change_log_show_count").text(data);
				if(data=='0'){
					$("li#change_log_id_"+msg_id).parent().remove();

					$("span#change_log_show_count").removeClass('label-danger');
					$("span#change_log_show_count").addClass('label-inverse');

				}else{
					$("li#change_log_id_"+msg_id).remove();

					$("span#change_log_show_count").addClass('label-danger');
					$("span#change_log_show_count").removeClass('label-inverse');
				}
			}
		});

	});

	$("a.hide_lead_appointment").live('click',function(e){
		e.preventDefault();
		msg_id=$(this).attr('data-id');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/notifications/hide_lead_appt/'+msg_id,
			success: function(data){
				$("span#apt_log_show_count").text(data);
				if(data=='0'){
					$("li#lead_appt_li_"+msg_id).parent().remove();

					$("span#apt_log_show_count").removeClass('label-danger');
					$("span#apt_log_show_count").addClass('label-inverse');
				}else{
					$("li#lead_appt_li_"+msg_id).remove();

					$("span#apt_log_show_count").addClass('label-danger');
					$("span#apt_log_show_count").removeClass('label-inverse');
				}
			}
		});

	});


	$("a.hide_int_lead_appointment").live('click',function(e){
		e.preventDefault();
		msg_id=$(this).attr('data-id');
		dealer_id=$(this).attr('data-dealerid');

		$.ajax({
			type: "GET",
			cache: false,
			url: '/notifications/hide_int_lead_appt/'+msg_id+"/"+dealer_id,
			success: function(data){
				$("span#int_apt_log_show_count").text(data);
				if(data=='0'){
					$("li#int_lead_appt_li_"+msg_id).parent().remove();

					$("span#int_apt_log_show_count").removeClass('label-danger');
					$("span#int_apt_log_show_count").addClass('label-inverse');
				}else{
					$("li#int_lead_appt_li_"+msg_id).remove();

					$("span#int_apt_log_show_count").addClass('label-danger');
					$("span#int_apt_log_show_count").removeClass('label-inverse');
				}
			}
		});

	});





	$("a.hide_v_match").live('click',function(e){
		e.preventDefault();
		msg_id=$(this).attr('data-id');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/notifications/hide_v_match/'+msg_id,
			success: function(data){
				$("span#v_match_show_count").text(data);
				if(data=='0'){
					$("li#v_match_li_"+msg_id).parent().remove();

					$("span#v_match_show_count").removeClass('label-danger');
					$("span#v_match_show_count").addClass('label-inverse');
				}else{
					$("li#v_match_li_"+msg_id).remove();

					$("span#v_match_show_count").addClass('label-danger');
					$("span#v_match_show_count").removeClass('label-inverse');
				}
			}
		});

	});






});

</script>

<?php /*?><?php $logged_name = AuthComponent::user('first_name').' '.AuthComponent::user('last_name').' #'.AuthComponent::user('dealer_id'). ' '.AuthComponent::user('dealer'); ?>
<script type="text/javascript">
var $chat_panel = '<?php echo $this->element('chat_form_div',array('from_name' =>$logged_name , 'from_id' =>AuthComponent::user('id'))); ?>';
$(document).ready(function(){

// $(".user_chat_key").on('click',function(e){
// 	e.preventDefault();
// 	$chat_key = $(this).attr('data-key');
// 	$to_id = $(this).attr('data-id');
// 	$to_name = $(this).attr('data-name');
// 	if($("#chat_panel #"+$chat_key).length == 0)
// 	{
// 		$chat_html = $chat_panel.replace(/#####/g , $chat_key);
// 		$("#chat_panel").append($chat_html);
// 		$("#"+$chat_key+"ChatToId").val($to_id);
// 		$("#"+$chat_key+"ChatToName").val($to_name);
// 		chat("#"+$chat_key);
// 	}

// 	$("#ChatSystemWindow .chat_main_div").hide();
// 	$("#"+$chat_key).show();
// 	$("#ChatSystemWindow").show();

// 	});

// $("#ChatClose").on('click',function(e){
// 	e.preventDefault();
// 	$("#ChatSystemWindow").hide();
// 	});
// $("#ChatSystemWindow").draggable();
// $("#ChatSystemWindow").resizable();

// $("#EndChatSession").on('click',function(e){
// 	e.preventDefault();
// 	$chat_key = $(this).attr('data-id');
// 	$message= "This chat Session will be ended. Are you sure you want to end chat";
// 	bootbox.confirm($message,function($result){
// 	if($result){
// 		$interval =$("#"+$chat_key).attr('data-interval');
// 		clearInterval($interval);
// 		$("#ChatSystemWindow").hide();
// 		$("#"+$chat_key).remove();
// 		$.ajax(
// 		{
// 			url : '/chat/chats/end_chat_session/'+$chat_key,
// 			success: function(data){}
// 		});
// 	}
// 	});

// 	});

});

</script>


<div id="ChatSystemWindow" style="width:36%;position:fixed;top:48%;left:64%;z-index:99999;display:none;">
<div class="panel panel-primary" id="chat_panel">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <a href="javascript:void(0)" id="ChatClose" class="pull-right"><span class="badge badge-warning">Hide</span></a>
                    <a href="javascript:void(0)" id="EndChatSession" style="margin-right:5px;" data-id="chat_<?php echo $d_user_chat; ?>" class="pull-right"><span class="badge badge-danger">End Chat</span></a>


                </div>


            </div>
</div><?php */?>
