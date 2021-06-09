<?php

	//echo $this->Html->css(array('Chat.chat.css','Chat.jquery-ui.min.css'));
	//echo $this->Html->script(array('Chat.chat.js','Chat.jquery-ui.min.js'));

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


</style>

<div class="navbar hidden-print main" role="navigation">

	<span id="default_d_type" d_type = "<?php echo (AuthComponent::user('d_type')!='')? AuthComponent::user('d_type') : "Powersports"; ?>" ></span>

	<div class="pull-left">
		<a href="/"><img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM" /></a>

		<div class="user-action user-action-btn-navbar pull-left border-right" style='display: none;'>
			<button class="btn btn-sm btn-navbar btn-default"><i class="fa fa-bars fa-2x"></i></button>
		</div>

		<span id="refresh_stat" style='float: left; display: none'>.</span>
	</div>



	<ul class="main pull-right">

   		<?php /* if(count($dealer_ids) > 1){ ?>

   		<li class="username">
			<a href="javascript:" id="user_menu_popup" >
				<u><?php echo AuthComponent::user('full_name'); ?></u>
			</a>
		</li>

		<?php }  */?>
		<?php  if(count($dealer_ids) > 1){

			//debug($_SESSION['eblat_app_multiple']);
		?>
		<li class="dropdown notif notifications hidden-xs">

			<?php if($_SESSION['eblat_app_multiple'] == null){ ?>
			<a href="" class="notification_modal_top no-ajaxify" title="Switch Location" modal_title="Switch Location">
				<i class="icon-horizontal-switch" style="font-size: 16px;"></i> <u><?php echo AuthComponent::user('dealer'); ?></u>
			</a>
			<?php }else{ ?>
			<a href="" class="notification_modal_top no-ajaxify" title="Switch Location" modal_title="Switch Location">
				<i class="icon-horizontal-switch" style="font-size: 16px;"></i> <u>All Group (<?php echo implode(",", $_SESSION['eblat_app_multiple']); ?>)</u>
			</a>
			<?php } ?>

			<ul class="dropdown-menu chat media-list pull-right">
				<?php
				$all_dealer_ids = array_keys($dealer_ids);
				foreach($dealer_ids as $key=>$value){
					if($_SESSION['eblat_app_multiple'] == null){
						if($key == AuthComponent::user('dealer_id')) continue;
					}
				?>
				<li class="media">
					<a class="no-ajaxify" href="/marketing/switch_location/<?php echo $key; ?>"><?php echo $value; ?></a>
				</li>
				<?php } ?>
				<?php if($_SESSION['eblat_app_multiple'] == null){ ?>
				<li class="media">
					<a class="no-ajaxify" href="/marketing/switch_location/<?php echo implode(",", $all_dealer_ids); ?>">All Group</a>
				</li>
				<?php } ?>

			</ul>
		</li>
		<?php }else{  ?>
		<li class="dropdown notif notifications hidden-xs">
			<a href="" class=" no-ajaxify" modal_title="Switch Location">
				<i class="icon-user-2" style="font-size: 16px;"></i> <?php echo AuthComponent::user('dealer'); ?>
			</a>
		</li>

		<?php }  ?>

		<li class="username dropdown notif notifications hidden-xs">
			<a href="javascript:" id="user_menu_popup" >
				<i class="icon-user-1" style="font-size: 16px;"></i>
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

	 					Daily Events Reminder Email: <div class="make-switch" data-on="success" data-off="default">
							<input name="event_reminder_email" id="event_reminder_email"
							 type="checkbox"  <?php if($event_reminder_email == 'On') echo 'checked="checked"'; else echo ''; ?>   />
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


		$("#user_menu_popup").click(function(){


			var menu_html = ''+
			''+

				<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1  ) { ?>
					'<a href="/adminhome/" class="glyphicons user"><i></i> Admin Home</a> &nbsp;'+
				<?php } ?>

				// '<a href="/users/edit_new/<?php echo AuthComponent::user('id'); ?>" class="btn btn-primary no-ajaxify"><i class="fa fa-user"></i> Account</a> &nbsp;'+
				// '<a href="#modal-2-user_settings" data-toggle="modal" class="btn btn-primary no-ajaxify"><i class="fa fa-gears"></i> Settings</a> &nbsp;'+
				// '<a href="/user_emails/inbox" class="btn btn-primary no-ajaxify"><i class="fa fa-envelope-o"></i> Messages</a> &nbsp;'+
				// '<a href="/supports/add" class="btn btn-primary no-ajaxify"><i class="fa fa-question-circle"></i> Support</a> &nbsp;'+
				'<a href="/marketing/logout" class="btn btn-danger no-ajaxify"><i class="fa fa-sign-out"></i> Logout</a> &nbsp;'+
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

























	function hide_footer(){
		$("#footer").fadeOut('slow');
	}



	setTimeout(hide_footer, 3000);


	//refresh_notification();


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>




});

</script>
