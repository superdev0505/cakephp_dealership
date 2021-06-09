<!-- Sidebar Menu -->

<div id="menu" class="hidden-print hidden-xs">
	<div id="sidebar-discover-wrapper">
		<ul class="list-unstyled">
			<li id="main_dashboard"> <a href="#sidebar-discover-dashboard" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Dashboard</span></a>
				<div id="sidebar-discover-dashboard" class="sidebar-discover-menu">
					<ul>
						<li id="sub_"><a href="<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'main')); ?>"><i class="fa fa-home"></i>Home</a></li>
					</ul>
				</div>
			</li>
			<li id="main_leads"> <a href="#sidebar-discover-leads" class="glyphicons group" data-toggle="sidebar-discover"><i></i><span>Leads</span></a>
				<div id="sidebar-discover-leads" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Leads</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li id="sub_new_lead"><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input')); ?>"><i class="fa fa-user"></i>New Lead</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>Work Lead</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',5)); ?>"><i class="fa fa-user"></i>View Web</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',6)); ?>"><i class="fa fa-user"></i>View Phone</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',7)); ?>"><i class="fa fa-user"></i>View Showroom</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',12)); ?>"><i class="fa fa-user"></i>View Mobile</a></li>
					</ul>
				</div>
			</li>
			<li id="main_email"> <a href="#sidebar-discover-email" class="glyphicons envelope" data-toggle="sidebar-discover"><i></i><span>Email</span></a>
				<div id="sidebar-discover-email" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Email</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox')); ?>"><i class="fa fa-envelope"></i>Inbox</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'compose')); ?>"><i class="fa fa-pencil"></i> Compose New</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'setting')); ?>"><i class="fa fa-pencil"></i>Email Settings</a></li>
					</ul>
				</div>
			</li>
			<li  id="main_event"> <a href="#sidebar-discover-event" class="glyphicons alarm" data-toggle="sidebar-discover"><i></i><span>Events</span></a>
				<div id="sidebar-discover-event" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Events</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="<?php echo $this->Html->url(array('controller'=>'events','action'=>'index')); ?>"><i class="fa fa-calendar"></i>Calendar</a></li>
					</ul>
				</div>
			</li>
			
			<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1 || $_SESSION['Auth']['User']['Group']['id'] == 2 ) { ?>
			<li  id="main_deals"> <a href="#sidebar-discover-deals" data-toggle="sidebar-discover" class="glyphicons keys"><i></i><span>Deals</span></a>
				<div id="sidebar-discover-deals" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Deals</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="<?php echo $this->Html->url(array('controller'=>'deals','action'=>'deals_main')); ?>"><i class="fa fa-briefcase"></i>Work Deal</a></li>	
					</ul>
				</div>
			</li>
			<?php } ?> 
			<li id="main_reports"> <a href="#sidebar-discover-reports" data-toggle="sidebar-discover" class="glyphicons stats"><i></i><span>Reports</span></a>
				<div id="sidebar-discover-reports" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Reports</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-file-text-o"></i>Master Report</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'drop_reports')); ?>"><i class="fa fa-ticket"></i>Drop-Downs</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'unit_reports')); ?>"><i class="fa fa-ticket"></i>Vehicle Stats</a></li>
						<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1 || $_SESSION['Auth']['User']['Group']['id'] == 2 ) {?>					
						<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'sales_pipeline_reports')); ?>"><i class="fa fa-legal"></i>Sales Pipe Line</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'eblast_reports')); ?>"><i class="fa fa-ticket"></i>Eblast Stats</a></li>
						<?php } ?> 
					</ul>
				</div>
			</li>
			<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1 || $_SESSION['Auth']['User']['Group']['id'] == 2 ) { ?>
			<li id="main_eblast"> <a href="#sidebar-discover-eblast" data-toggle="sidebar-discover" class="glyphicons message_out"><i></i><span>Eblast</span></a>
				<div id="sidebar-discover-eblast" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Eblast</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li class=""> <a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'index')); ?>"><i class="fa fa-envelope-o"></i> Overview</a> </li>
	
					</ul>
				</div>
			</li>
			<?php } ?>
			<li id="main_support"> <a href="#sidebar-discover-support" class="glyphicons life_preserver" data-toggle="sidebar-discover"><i></i><span>Support</span></a>
				<div id="sidebar-discover-support" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Support</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'add')); ?>"><i class="fa fa-medkit"></i><span>Add New Ticket</span></a></li>
						<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1) {?>
							<li><a href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'adminindex')); ?>"><i class="fa fa-medkit"></i><span>Admin Tickets</span></a></li>
						<?php } ?> 
					</ul>
				</div>
			</li>
			<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1 || $_SESSION['Auth']['User']['Group']['id'] == 2 ) { ?>
			<li  id="main_settings"> <a href="#sidebar-discover-settings" data-toggle="sidebar-discover" class="glyphicons adjust_alt"><i></i><span>Settings</span></a>
				<div id="sidebar-discover-settings" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Settings</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li><a href="invoice.html?lang=en"><i class="fa fa-file-text-o"></i>Dealer Settings</a></li>
						<li><a href="finances.html?lang=en"><i class="fa fa-legal"></i>Leads Rules</a></li>
						
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'used_vehicle_input')); ?>"><i class="fa fa-ticket"></i>Vehicle info - Used</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'oem_vehicle_input')); ?>"><i class="fa fa-ticket"></i>Vehicle Info - OEM</a></li>
						
					     <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Employees</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'deal_fixedfees','action'=>'add')); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Deals Add Fee(s)</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'deal_fixedfees','action'=>'edit',1)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Deals Edit Fee(s)</a></li>
						
						<li><a href="<?php echo $this->Html->url(array('controller'=>'lead_statuses','action'=>'index')); ?>" ><i class="fa fa-group"></i> Status Add</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'lead_sources','action'=>'index')); ?>" ><i class="fa fa-group"></i> Source Add</a></li>
                   	</ul>
				</div>
			</li>
		 <?php }else if ($_SESSION['Auth']['User']['Group']['id'] == 3 || $_SESSION['Auth']['User']['Group']['id'] == 4 ) { ?>
		 	
			<li id="main_settings"> <a href="#sidebar-discover-settings" data-toggle="sidebar-discover" class="glyphicons adjust_alt"><i></i><span>Settings</span></a>
				<div id="sidebar-discover-settings" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Settings</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
					    <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Employees</a></li>
                   	</ul>
				</div>
			</li>
		 
		 
		 <?php } ?>
		 
		 
		 
		 
		 
		</ul>
	</div>
</div>
<!-- // Sidebar Menu END -->
