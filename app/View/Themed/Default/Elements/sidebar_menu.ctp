
<!-- Sidebar Menu -->
<?php //debug($this->request->params); ?>
<?php //debug($this->request->here);

//debug( $_SESSION );

?>
<style>
.system_update_alert{
	width:900px;
	max-height:600px;
	overflow:scroll;
}
</style>

<div id="menu" class="hidden-print hidden-xs">
	<div id="sidebar-discover-wrapper">

		<?php //debug($activate_lite_version);  ?>

		<ul class="list-unstyled">
			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-dashboard" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Dashboard</span></a>
				<div id="sidebar-discover-dashboard" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'main')); ?>" class="no-ajaxify"><i class="fa fa-home"></i>Home</a></li>
					</ul>
				</div>
			</li>
			<li <?php echo ($this->request->params['controller'] == 'contacts')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-leads" class="glyphicons group" data-toggle="sidebar-discover">

				<i></i><span>Leads</span>
			</a>
				<div id="sidebar-discover-leads" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Leads</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'contacts/leads_main'  )? 'class="active "' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main','?'=>array('search_source'=>'left_menu') )); ?>"><i class="fa fa-user"></i>Work Lead</a></li>

						<?php //if($activate_lite_version == 'Off'){  ?>
						<li <?php echo ($this->request->url == 'contacts/leads_main/5'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('search_source'=>'left_menu','quick_lead_search'=>'contactstatus_search_5'))); ?>"><i class="fa fa-user"></i>View Web</a></li>
						<li <?php echo ($this->request->url == 'contacts/leads_main/6'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('search_source'=>'left_menu','quick_lead_search'=>'contactstatus_search_6'))); ?>"><i class="fa fa-user"></i>View Phone</a></li>
						<li <?php echo ($this->request->url == 'contacts/leads_main/7'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('search_source'=>'left_menu','quick_lead_search'=>'contactstatus_search_7'))); ?>"><i class="fa fa-user"></i>View Showroom</a></li>
						<li <?php echo ($this->request->url == 'contacts/leads_main/12'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('search_source'=>'left_menu','quick_lead_search'=>'contactstatus_search_12'))); ?>"><i class="fa fa-user"></i>View Mobile</a></li>
						<li><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contact_accounts','action'=>'index')); ?>"><i class="fa fa-file-text-o"></i>Accounts</a></li>
						<?php //}  ?>

					</ul>
				</div>
			</li>
			<li <?php echo ($this->request->params['controller'] == 'user_emails')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-email" class="glyphicons envelope" data-toggle="sidebar-discover"><i></i><span>Email</span></a>
				<div id="sidebar-discover-email" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Email</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'user_emails/inbox'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox')); ?>" class='no-ajaxify'><i class="fa fa-envelope"></i>Inbox</a></li>
						<li <?php echo ($this->request->url == 'user_emails/compose'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'compose')); ?>" class='no-ajaxify'><i class="fa fa-pencil"></i> Internal Email</a></li>
						<li <?php echo ($this->request->url == 'user_emails/setting'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'setting')); ?>"><i class="fa fa-pencil"></i> Email Settings</a></li>
						<li <?php echo ($this->request->url == 'user_templates/index'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'user_templates','action'=>'index')); ?>"><i class="fa fa-pencil"></i> Email Template </a></li>

					</ul>
				</div>
			</li>
			<li  <?php echo ($this->request->params['controller'] == 'events')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-event" class="glyphicons alarm" data-toggle="sidebar-discover"><i></i><span>Events</span>


				<?php  if(isset($lead_push_cnt)){ ?>
				<span onclick='location.href = "/contacts/leads_main/?quick_lead_search=new_lead_pushed&stat_type=Dealer"' class="badge pull-right badge-danger hidden-md m-notification" style='background: yellow; color: #000 !important;'>PUSH - <?php echo $lead_push_cnt; ?></span>
				<?php }  ?>


			</a>
				<div id="sidebar-discover-event" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Events</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li  <?php echo ($this->request->params['controller'] == 'events' && $this->request->params['action'] == 'index')? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'events','action'=>'index')); ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
					</ul>
				</div>
			</li>

			<?php //if($activate_lite_version == 'Off'){  ?>
			<li <?php echo ($this->request->params['controller'] == 'deals'||$this->request->params['controller'] == 'deal_fixedfees')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-deals" data-toggle="sidebar-discover" class="glyphicons keys"><i></i><span>Deals</span></a>
				<div id="sidebar-discover-deals" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Deals</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'deals/deals_main'  )? 'class="active"' : ""; ?>  ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'deals','action'=>'deals_main')); ?>"><i class="fa fa-briefcase"></i>Work Deal</a></li>
                        <li <?php echo ($this->request->url == 'deal_fixedfees/'  )? 'class="active"' : ""; ?> ><a  href="<?php echo $this->Html->url(array('controller'=>'deal_fixedfees','action'=>'index')); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Deal Fixed Fee</a></li>
					</ul>
				</div>
			</li>
			<?php //}  ?>

			<?php //if($activate_lite_version == 'Off'){  ?>

			<li <?php echo ($this->request->params['controller'] == 'reports')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-reports" data-toggle="sidebar-discover" class="glyphicons stats"><i></i><span>Reports</span></a>
				<div id="sidebar-discover-reports" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Reports</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
          
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'reports/main_reports'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-file-text-o"></i>Master Report</a></li>
						<?php if($_SESSION['Auth']['User']['dealer_id'] == '1370'){ ?>
              <li <?php echo ($this->request->url == 'reports/coaching_report'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'coaching_report')); ?>"><i class="fa fa-file-text-o"></i>Coaching Report</a></li>
            <?php } ?>
						<li <?php echo ($this->request->url == 'reports/drop_reports'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'drop_reports')); ?>"><i class="fa fa-ticket"></i>Drop-Downs</a></li>
						<li <?php echo ($this->request->url == 'reports/unit_reports'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'unit_reports')); ?>"><i class="fa fa-ticket"></i>Vehicle Stats</a></li>
						<?php if ($_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2  || $_SESSION['Auth']['User']['group_id'] == 9 ) {?>
						<li <?php echo ($this->request->url == 'reports/sales_pipeline_reports'  )? 'class="active"' : ""; ?> ><a class="no-ajaxify" href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'sales_pipeline_reports')); ?>"><i class="fa fa-legal"></i>Sales Pipe Line</a></li>
						<!-- <li <?php echo ($this->request->url == 'reports/eblast_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'eblast_reports')); ?>"><i class="fa fa-ticket"></i>Eblast Stats</a></li> -->
						<?php } ?>
						<li <?php echo ($this->request->url == 'reports/dailyrecap_reports'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'dailyrecap_reports')); ?>"><i class="fa fa-ticket"></i>Daily Recap</a></li>


                        <li <?php echo ($this->request->url == 'reports/new_logs_report'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'new_logs_report')); ?>"><i class="fa fa-ticket"></i>New Logs</a></li>

                          <li <?php echo ($this->request->url == 'reports/source_stat_report'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'source_stat_report')); ?>"><i class="fa fa-ticket"></i>Source Stats</a></li>


						<?php if (in_array($_SESSION['Auth']['User']['group_id'], array('2','6','12','13'))  ) {  ?>

						<li <?php echo ($this->request->url == 'manage_web_lead/not_worked_leads'  )? 'class="active"' : ""; ?> >
							<a class='no-ajaxify'  href="<?php echo $this->Html->url(array('controller'=>'manage_web_lead','action'=>'not_worked_leads')); ?>"><i class="fa fa-ticket"></i>Not Worked Leads</a>
						</li>
						<?php }?>


						 <?php
						$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640);
						 if(in_array(AuthComponent::user('dealer_id'),$freedom_group)){ ?>
                        <li <?php echo ($this->request->url == '/reports/dms_sales_feed'  )? 'class="active"' : ""; ?> >
							<a class='no-ajaxify'  href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'dms_sales_feed')); ?>"><i class="fa fa-ticket"></i>Daily Solds</a>
						</li>
                         <?php }?>

                         <?php if(in_array(AuthComponent::user('group_id'),array(1,2,6,9,12,7))){ ?>

                         <li <?php echo ($this->request->url == 'reports/export_contact'  )? 'class="active"' : ""; ?> >
							<a class='no-ajaxify'  href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'export_contact')); ?>"><i class="fa fa-ticket"></i>Export Tool</a>
						</li>
                <?php } ?>

						<li <?php echo ($this->request->url == 'alert_new_leads/report'  )? 'class="active"' : ""; ?> >
							<a class='no-ajaxify'  href="<?php echo $this->Html->url(array('controller'=>'alert_new_leads','action'=>'report')); ?>"><i class="fa fa-ticket"></i>New Lead Alert Report</a>
						</li>





					</ul>
				</div>
			</li>
			<?php //}  ?>


			<?php //if($activate_lite_version == 'Off'){  ?>

			<li <?php echo ($this->request->params['controller'] == 'eblasts' && $this->request->params['action'] != 'test_cron' )? 'class="active"' : ""; ?> > <a href="#sidebar-discover-eblast" data-toggle="sidebar-discover" class="glyphicons message_out"><i></i><span>Marketing</span></a>
				<div id="sidebar-discover-eblast" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Eblast</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">

						<li>
							<a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'marketing','action'=>'index')); ?>">
								<i class="fa fa-envelope-o"></i> Eblast/Newsletter</a>
						</li>

						<?php if ($_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2 || $_SESSION['Auth']['User']['group_id'] == 9 || $_SESSION['Auth']['User']['group_id'] == 7 || $_SESSION['Auth']['User']['group_id'] == 6 || $_SESSION['Auth']['User']['group_id'] == 12   ) {  ?>

						<li  <?php echo ($this->request->params['controller'] == 'eblasts')? 'class="active"' : ""; ?> >
							<a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'index')); ?>">
								<i class="fa fa-envelope-o"></i> Auto Responder</a>
						</li>

						<li>
							<a href='/email/download' class='no-ajaxify'  > <i class="fa fa-download"></i> Email Download</a>
						</li>
						<?php } ?>

					</ul>
				</div>
			</li>

			<?php //}  ?>


			<?php //if($activate_lite_version == 'Off'){  ?>

			<?php if ( ! in_array($_SESSION['Auth']['User']['group_id'], array(3))) { ?>

			<li <?php echo ($this->request->params['controller'] == 'bdc_leads')? 'class="active"' : ""; ?> >
				<a href="#sidebar-discover-bdc" class="glyphicons group" data-toggle="sidebar-discover"><i></i><span>Inhouse-BDC</span></a>
				<div id="sidebar-discover-bdc" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Inhouse-BDC</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'bdc_leads/leads_main'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main')); ?>" class="no-ajaxify" ><i class="fa fa-user"></i>Inhouse-BDC</a></li>
                        <li <?php echo ($this->request->url == 'bdc_leads/bdc_report'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'bdc_report')); ?>"><i class="fa fa-user"></i>BDC-Reports</a></li>
                         <li <?php echo ($this->request->url == 'bdc_leads/event_survey_report'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'event_survey_report')); ?>"><i class="fa fa-user"></i>Event Survey</a></li>
                         <?php if(AuthComponent::user('dealer_id') == 40013){ ?>
                        <li <?php echo ($this->request->url == 'bdc_leads/freedom_marketing_report'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'freedom_marketing_report')); ?>"><i class="fa fa-user"></i>Resposne Report</a></li>

					   <?php } ?>
					</ul>
				</div>
			</li>

			<?php } ?>

			<?php //}  ?>



			<li <?php echo ($this->request->params['controller'] == 'supports')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-support" class="glyphicons life_preserver" data-toggle="sidebar-discover">

            <?php  if(isset($system_update_alert)&&!empty($system_update_alert)){ ?>

				<span id="system_update_alert" onclick="view_leads();" class="badge pull-right badge-danger hidden-md m-notification" style='background: #A94442;'>Update-<?php echo $system_update_alert; ?></span>
				<?php }  ?>

            <i></i><span>Support</span></a>
				<div id="sidebar-discover-support" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Support</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'supports/add'  )? 'class="active"' : ""; ?> ><a  class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'add')); ?>"><i class="fa fa-medkit"></i><span>Add New Ticket</span></a></li>


                        			<li <?php echo ($this->request->url == 'supports/all_alerts'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'all_alerts')); ?>"><i class="fa fa-rocket"></i><span>Update alert</span></a></li>


					</ul>
				</div>

			<?php //debug( $_SESSION['Auth'] ); ?>

			</li>
			<?php
				// Condition $_SESSION['Auth']['User']['group_id'] == 4
				// removed from below IF condition,
				// So that group id 4 i.e. 'floor manager' does not have access to settings menu.
				// this is done in order to fix card : 950-change-floor-manager-credentials
			?>
			<?php if ($_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2 || $_SESSION['Auth']['User']['group_id'] == 9  || $_SESSION['Auth']['User']['group_id'] == 6  ||  $_SESSION['Auth']['User']['group_id'] == 13 ||  $_SESSION['Auth']['User']['group_id'] == 12     ) { ?>
			<li <?php
				if(
				$this->request->url == 'contacts/used_vehicle_input' ||
				$this->request->url == 'contacts/oem_vehicle_input' ||
				$this->request->url == 'users/index_new_userlisting/0' ||
				$this->request->url == 'lead_statuses' ||
				$this->request->url == 'lead_sources' ||
				$this->request->url == 'eblast_unsubscribes/opt_outs'  ||
				$this->request->url == 'rules'  ||

				$this->request->url == 'contacts_manage/lead_transfer_mass'
				)
				echo 'class="active"';


			?>  > <a href="#sidebar-discover-settings" data-toggle="sidebar-discover" class="glyphicons adjust_alt"><i></i><span>Settings</span></a>
				<div id="sidebar-discover-settings" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Settings</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'dealer_settings','action'=>'index')); ?>"><i class="fa fa-file-text-o"></i>Dealer Settings</a></li>


						<?php if ($_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2 || $_SESSION['Auth']['User']['group_id'] == 9  || $_SESSION['Auth']['User']['group_id'] == 6 || $_SESSION['Auth']['User']['group_id'] == 12 ) { ?>
						<li <?php echo ($this->request->url == 'rules'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'rules','action'=>'index')); ?>" class='no-ajaxify' ><i class="fa fa-legal"></i>Leads Rules</a></li>
						<?php } ?>

						<!-- <li <?php echo ($this->request->url == 'contacts/used_vehicle_input'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'used_vehicle_input')); ?>"><i class="fa fa-ticket"></i>Vehicle info - Floor</a></li> -->

					     <li <?php echo ($this->request->url == 'users/index_new_userlisting/0'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Employees</a></li>




						<?php /*?><li <?php echo ($this->request->url == 'lead_statuses'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'lead_statuses','action'=>'index')); ?>" ><i class="fa fa-group"></i> Status Add</a></li><?php */?>
						<li <?php echo ($this->request->url == 'lead_sources'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'lead_sources','action'=>'index')); ?>" class='no-ajaxify' ><i class="fa fa-group"></i> Source Add</a></li>
						<?php if ($_SESSION['Auth']['User']['group_id'] == 1  ) { ?>
						<li <?php echo ($this->request->url == 'eblast_unsubscribes/opt_outs'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'eblast_unsubscribes','action'=>'opt_outs')); ?>" class='no-ajaxify' ><i class="fa fa-group"></i> Opt Out</a></li>
						<li <?php echo ($this->request->url == 'eblasts/test_cron'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'test_cron',date('Y-m-d'))); ?>" class='no-ajaxify' ><i class="fa fa-group"></i> Eblast Test</a></li>
                       <?php } ?>

						<?php if ($_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2  || $_SESSION['Auth']['User']['group_id']== 9 || $_SESSION['Auth']['User']['group_id']== 6 ) { ?>
						<li <?php echo ($this->request->url == 'contacts_manage/lead_transfer_mass'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer_mass')); ?>" ><i class="fa fa-group"></i> Lead Transfer</a></li>
						<?php } ?>

						<?php if ( $_SESSION['Auth']['User']['group_id'] == 4 ||   $_SESSION['Auth']['User']['group_id'] == 1 || $_SESSION['Auth']['User']['group_id'] == 2  || $_SESSION['Auth']['User']['group_id']== 9 || $_SESSION['Auth']['User']['group_id']== 6 ) { ?>
						<li <?php echo ($this->request->url == 'contacts_manage/lead_distribution'  )? 'class="active"' : ""; ?> ><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_distribution')); ?>" ><i class="fa fa-group"></i> Lead Distribution</a></li>

						<?php } ?>

						<?php if ($qr_code_activation =='On' ) { ?>
						<li><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'dealer_settings','action'=>'list_xmlinventory')); ?>"><i class="fa fa-file-text-o"></i>QR Codes INV</a></li>
						<?php } ?>


						<?php if ($team_breakdown_settings =='On' ) { ?>

							<?php if ($_SESSION['Auth']['User']['group_id'] =='2' || $_SESSION['Auth']['User']['group_id'] =='6' || $_SESSION['Auth']['User']['group_id'] =='9' ) { ?>
								<li><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'manage_teams','action'=>'index')); ?>"><i class="fa fa-file-text-o"></i>Manage Team</a></li>
							<?php } ?>

						<?php } ?>




                   	</ul>
				</div>
			</li>
		 <?php } ?>







		</ul>
	</div>
</div>
<!-- // Sidebar Menu END -->
<script>
function view_leads()
{
	$.ajax({
		type: "GET",
		cache: false,
		url: '/supports/view_alerts',
		success: function(data){
		if(data != ''){
			bootbox.dialog({
			message: data,
			backdrop: true,
			title: "Update Alerts",
			}).find("div.modal-dialog").addClass("system_update_alert");
		}
		//$("span#system_update_alert").remove();
		}
	});
}
$(document).ready(function(){

<?php
$referer = $this->request->referer();
if(preg_match('/users\/login/',$referer)){
?>
view_leads();
<?php } ?>
});
</script>
