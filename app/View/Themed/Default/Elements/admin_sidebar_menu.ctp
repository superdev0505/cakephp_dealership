<!-- Sidebar Menu -->
<?php //debug($this->request->params); ?>
<?php //debug($this->request->here); ?>

<div id="menu" class="hidden-print hidden-xs">
	<div id="sidebar-discover-wrapper">
		<ul class="list-unstyled">

			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-dashboard" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Dashboard</span></a>
				<div id="sidebar-discover-dashboard" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'index')); ?>"><i class="fa fa-home"></i>Home</a></li>
					</ul>
				</div>
			</li>

			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-inventory" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Inventory</span></a>
				<div id="sidebar-discover-inventory" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'categories','action'=>'list_trims')); ?>"><i class="fa fa-home"></i>Trims</a></li>
					</ul>
				</div>
			</li>

			<li <?php echo ($this->request->params['controller'] == 'users')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-users" class="glyphicons user " data-toggle="sidebar-discover"><i></i><span>Users</span></a>
				<div id="sidebar-discover-users" class="sidebar-discover-menu">
					<ul>
					<li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'user_list')); ?>"><i class="fa fa-user"></i>Users</a></li>
					<li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add_new_master')); ?>"  ><i class="fa fa-plus"></i> New Master User</a></li>
					</ul>
				</div>
			</li>

			<li <?php echo ($this->request->params['controller'] == 'supports')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-support" class="glyphicons life_preserver" data-toggle="sidebar-discover"><i></i><span>Support</span></a>
				<div id="sidebar-discover-support" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Support</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'supports/adminindex'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'adminindex')); ?>"><i class="fa fa-medkit"></i><span>Admin Tickets</span></a></li>
					</ul>
				</div>
			</li>

                        <li <?php echo ($this->request->params['controller'] == 'devteamdaily')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-devteamdaily" class="glyphicons factory" data-toggle="sidebar-discover"><i></i><span>Devteam Daily</span></a>
				<div id="sidebar-discover-devteamdaily" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Devteam Daily</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'projects/adminindex'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'projects','action'=>'adminindex')); ?>"><i class="fa fa-medkit"></i><span>Project list</span></a></li>
						<li <?php echo ($this->request->url == 'developers/adminindex'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'developers','action'=>'adminindex')); ?>"><i class="fa fa-group"></i><span>View Devteam</span></a></li>
					</ul>
				</div>
			</li>

                        <li <?php echo ($this->request->params['controller'] == 'adminhome' && $this->request->params['action'] == 'active_vendors')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-activevendors" class="glyphicons charts" data-toggle="sidebar-discover"><i></i><span>Active Vendors</span></a>
				<div id="sidebar-discover-activevendors" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Active Vendors</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'adminhome/active_vendors'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'active_vendors')); ?>"><i class="fa fa-medkit"></i><span>Active Vendors</span></a></li>
					</ul>
				</div>
			</li>


			<li <?php echo ($this->request->params['controller'] == 'smtp_imap')? 'class="active"' : ""; ?> >
				<a href="#sidebar-discover-smtpimap" class="glyphicons envelope" data-toggle="sidebar-discover"><i></i><span>Email Settings</span></a>
				<div id="sidebar-discover-smtpimap" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>SMTP/IMAP</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'smtp_imap/smtp'  )? 'class="active"' : ""; ?> >
							<a href="<?php echo $this->Html->url(array('controller'=>'smtp_imap','action'=>'smtp')); ?>"><i class="fa fa-medkit"></i><span>SMTP Servers</span></a>
						</li>
						<li <?php echo ($this->request->url == 'smtp_imap/adminindex'  )? 'class="active"' : ""; ?> >
							<a href="<?php echo $this->Html->url(array('controller'=>'smtp_imap','action'=>'imap')); ?>"><i class="fa fa-medkit"></i><span>IMAP Servers</span></a>
						</li>

					</ul>
				</div>
			</li>




			<li <?php
				if(
				$this->request->url == 'contacts/used_vehicle_input' ||
				$this->request->url == 'contacts/oem_vehicle_input' ||
				$this->request->url == 'users/index_new_userlisting/0' ||
				$this->request->url == 'deal_fixedfees/add' ||
				$this->request->url == 'deal_fixedfees/edit/1' ||
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
						<li <?php echo ($this->request->url == 'contacts/oem_vehicle_input'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'oem_vehicle_input')); ?>"><i class="fa fa-ticket"></i>Vehicle Info - OEM</a></li>

                   	</ul>
				</div>
			</li>

		 	<li <?php echo ($this->request->params['controller'] == 'adminhome' && $this->request->params['action'] == 'add_alert')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-alert" class="glyphicons life_preserver" data-toggle="sidebar-discover"><i></i><span>Update Alert</span></a>
				<div id="sidebar-discover-alert" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Update Alert</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'adminhome/add_alert'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'all_alerts')); ?>"><i class="fa fa-medkit"></i><span>All Alerts</span></a></li>
                        <li <?php echo ($this->request->url == 'adminhome/add_alert'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'add_alert')); ?>"><i class="fa fa-medkit"></i><span>Add Alerts</span></a></li>
					</ul>
				</div>
			</li>



			<li <?php echo ($this->request->params['controller'] == 'step_definitions')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-edit_step_definition" class="glyphicons user " data-toggle="sidebar-discover"><i></i><span>Step Definition</span></a>
				<div id="sidebar-discover-edit_step_definition" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'step_definitions','action'=>'edit')); ?>"><i class="fa fa-user"></i>Edit</a></li>
					</ul>
				</div>
			</li>

                        <li <?php echo ($this->request->params['controller'] == 'accesslogs' && $this->request->params['action'] == 'adminindex')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-accesslogs" class="glyphicons list" data-toggle="sidebar-discover"><i></i><span>Access Logs</span></a>
				<div id="sidebar-discover-accesslogs" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Access Logs</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'accesslogs/adminindex'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'accesslogs','action'=>'adminindex')); ?>"><i class="fa fa-list"></i><span>Access Logs</span></a></li>
					</ul>
				</div>
			</li>

                        <li <?php echo ($this->request->params['controller'] == 'adminhome' && $this->request->params['action'] == 'non_use')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-nonuse"  data-toggle="sidebar-discover"><i class="fa fa-exclamation-circle fa-10x"></i><span>Non-Use Report</span></a>
				<div id="sidebar-discover-nonuse" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Non-Use Report</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'adminhome/non_use'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'non_use')); ?>"><i class="fa fa-exclamation-circle"></i><span>Non-Use Report</span></a></li>
					</ul>
				</div>
			</li>

			<li>
				<a href="#sidebar-discover-edit_svn_debug" class="glyphicons user " data-toggle="sidebar-discover"><i></i><span>SVN  Debug</span></a>
				<div id="sidebar-discover-edit_svn_debug" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'devs','action'=>'index')); ?>"><i class="fa fa-user"></i>SVN  Debug</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a href="#sidebar-discover-unparsed" class="glyphicons list" data-toggle="sidebar-discover"><i></i><span>Unparsed Leads</span></a>
				<div id="sidebar-discover-unparsed" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'Adminhome','action'=>'unparsed_weblead')); ?>"><i class="fa fa-user"></i>Unparsed Leads</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'Adminhome','action'=>'unparsed_weblead_client')); ?>"><i class="fa fa-user"></i>Unparsed (Client)</a></li>
					</ul>
				</div>
			</li>

		<li <?php echo ($this->request->params['controller'] == 'dataimport')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-data-import" class="glyphicons table " data-toggle="sidebar-discover"><i></i><span>Data Import</span></a>
				<div id="sidebar-discover-data-import" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'db_pools','action'=>'transfer')); ?>"><i class="fa fa-user"></i>DB Pool</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'dataimport','action'=>'devteam_uploadfile')); ?>"><i class="fa fa-user"></i>Upload Dump</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'dataimport','action'=>'file_status')); ?>"><i class="fa fa-user"></i>Import Status</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'dataimport','action'=>'duplicate_upload')); ?>"><i class="fa fa-user"></i>Duplicate Upload</a></li>
					</ul>
				</div>
			</li>

         	 <li <?php echo ($this->request->params['controller'] == 'adminhome' && $this->request->params['action'] == 'cdk_dealers' )? 'class="active"' : ""; ?> > <a href="#sidebar-discover-dms-integration" class="glyphicons table " data-toggle="sidebar-discover"><i></i><span>DMS Integration</span></a>
				<div id="sidebar-discover-dms-integration" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'cdk_dealers')); ?>"><i class="fa fa-user"></i>CDK Integration</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'dealertrack_dealers')); ?>"><i class="fa fa-user"></i>Dealer Track</a></li>
					</ul>
				</div>
			</li>

			<li> <a href="#sidebar-discover-email-sync-status" class="glyphicons envelope" data-toggle="sidebar-discover"><i></i><span>Email Sync Status</span></a>
				<div id="sidebar-discover-email-sync-status" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'email_sync_status','action'=>'index')); ?>"><i class="fa fa-user"></i>Email Sync Status</a></li>
					</ul>
				</div>
			</li>



		</ul>
	</div>
</div>
<!-- // Sidebar Menu END -->
