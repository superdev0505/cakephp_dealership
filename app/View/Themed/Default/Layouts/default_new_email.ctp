<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-discover"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 sidebar sidebar-discover"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 sidebar sidebar-discover"> <![endif]-->
<!--[if gt IE 8]> <html class="ie sidebar sidebar-discover"> <![endif]-->
<!--[if !IE]><!--><html class="sidebar sidebar-discover"><!-- <![endif]-->
<head>
	<title>Dealership Performance 360 CRM</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	<!-- 
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="/app/View/Themed/Default/webroot/assets/less/admin/module.admin.stylesheet-complete.less" />
	-->
		

		<!--[if lt IE 9]><link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
		<link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/css/admin/module.admin.stylesheet-complete.min.css" />
		
		
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


	<script src="/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/script.min.js?v=v1.0.2&sv=v0.0.1"></script>

<script>var App = {};</script>

<script data-id="App.Scripts">
App.Scripts = {

	/* CORE scripts always load first; */
	core: [
		'/app/View/Themed/Default/webroot/assets/components/library/jquery/jquery.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/library/modernizr/modernizr.js?v=v1.0.2&sv=v0.0.1',
		<?php if($hide_side_menu == 'On'){ ?>
	'/app/View/Themed/Default/webroot/js/menu_hide.js?v=v1.0.2&sv=v0.0.8'
<?php } ?>
	],

	/* PLUGINS_DEPENDENCY always load after CORE but before PLUGINS; */
	plugins_dependency: [
		'/app/View/Themed/Default/webroot/assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/library/jquery/jquery-migrate.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/maps/vector/assets/lib/jquery-jvectormap-1.2.2.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v1.0.2&sv=v0.0.1'
	],

	/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
	plugins: [
		'/app/View/Themed/Default/webroot/assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/davis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/jquery.lazyjaxdavis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/preload/pace/pace.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/lib/jquery.bootstrap.wizard.js?v=v1.0.3-rc2&sv=v0.0.1.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1',
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1',
	//	'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v1.0.2&sv=v0.0.1', 
	//	'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v1.0.2&sv=v0.0.1', 
	//	'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/sparkline/jquery.sparkline.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/maps/vector/assets/lib/maps/jquery-jvectormap-world-mill-en.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/less-js/less.min.js?v=v1.0.2&sv=v0.0.1', 
	//	'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.2&sv=v0.0.1'
	],
	

	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
	bundle: [
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/ajaxify.init.js?v=v1.0.2&sv=v0.0.1.2', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/core/js/animations.init.js?v=v1.0.2', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/custom/js/form-wizards.init.js?v=v1.0.3-rc2&sv=v0.0.1.1', 
		//'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-line-2.init.js?v=v1.0.2&sv=v0.0.1', 
		//'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-mixed-1.init.js?v=v1.0.2&sv=v0.0.1', 
		//'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-bars-horizontal.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/sparkline/sparkline.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/maps/vector/assets/custom/maps-vector.world-map-markers.init.js?v=v1.0.2&sv=v0.0.1', 
		<?php if($hide_side_menu == 'On'){ ?>
'/app/View/Themed/Default/webroot/assets/components/core/js/sidebar.main.init.js?v=v1.0.288',
<?php }else{ ?>
'/app/View/Themed/Default/webroot/assets/components/core/js/sidebar.main_s.init.js?v=v1.0.288',
<?php } ?> 
		'/app/View/Themed/Default/webroot/assets/components/core/js/sidebar.discover.init.js?v=v1.0.2', 
		<?php if($hide_side_menu == 'On'){ ?>
		'/app/View/Themed/Default/webroot/assets/components/core/js/core.init.js?v=v1.0.4889'
<?php }else{ ?>
	'/app/View/Themed/Default/webroot/assets/components/core/js/core_s.init.js?v=v1.0.4889'
<?php } ?>
	]

};
</script>

<script>
$script(App.Scripts.core, 'core');

$script.ready(['core'], function(){
	$script(App.Scripts.plugins_dependency, 'plugins_dependency');
});
$script.ready(['core', 'plugins_dependency'], function(){
	$script(App.Scripts.plugins, 'plugins');
});
$script.ready(['core', 'plugins_dependency', 'plugins'], function(){
	$script(App.Scripts.bundle, 'bundle');
});
</script>
	<script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>
	
</head>
<body class="scripts-async" >
	
	<!-- Main Container Fluid -->
	<div class="container-fluid menu-hidden">
		
				<!-- Sidebar Menu -->
		<div id="menu" class="hidden-print hidden-xs">

			<div id="sidebar-discover-wrapper">
				<ul class="list-unstyled">
				
					<li class="active">
						 
						<a href="#sidebar-discover-social" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Dashboard</span></a>
						<div id="sidebar-discover-social" class="sidebar-discover-menu">
<ul>					
	<li><a href="<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'main')); ?>"><i class="fa fa-home"></i>Home</a></li></ul>
						
						</div>
					</li>
			
					<li>
						<a href="#sidebar-discover-media" class="glyphicons group" data-toggle="sidebar-discover"><i></i><span>Leads</span></a>
						<div id="sidebar-discover-media" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Leads</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input')); ?>"><i class="fa fa-user"></i>New Lead</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>Work Lead</a></li>					
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>View Web</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>View Phone</a></li>					
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>View Showroom</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main')); ?>"><i class="fa fa-user"></i>View Mobile</a></li>
										
							</ul>
						</div>
					</li>
			
					<li>
						<a href="#sidebar-discover-email" class="glyphicons envelope" data-toggle="sidebar-discover"><i></i><span>Email</span></a>
						<div id="sidebar-discover-email" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Email</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li><a href="<?php echo $this->Html->url(array('controller'=>'email','action'=>'inbox')); ?>"><i class="fa fa-envelope"></i>Inbox</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'email','action'=>'compose')); ?>"><i class="fa fa-pencil"></i> Compose New</a></li>
													
								<li><a href="email_compose.html?lang=en"><i class="fa fa-pencil"></i>Email Settings</a></li>
							</ul>
						</div>
					</li>
			
					<li>
						<a href="#sidebar-discover-courses" class="glyphicons calendar" data-toggle="sidebar-discover"><i></i><span>Events</span></a>
						<div id="sidebar-discover-courses" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Events</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								
<li><a href="<?php echo $this->Html->url(array('controller'=>'full_calendar','action'=>'index')); ?>"><i class="fa fa-circle-o"></i>Calendar</a></li>
</ul>
</div>
</li>
			
					<li>
						<a href="#sidebar-discover-support" data-toggle="sidebar-discover" class="glyphicons calculator"><i></i><span>Deals</span></a>
						<div id="sidebar-discover-support" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Deals</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
						<ul class="animated fadeIn">
								<li><a href="<?php echo $this->Html->url(array('controller'=>'deals','action'=>'deals_main')); ?>"><i class="fa fa-file-text-o"></i>Work Deal</a></li>

							</ul>
						</div>
					</li>
			<li>
						<a href="#sidebar-discover-medical" data-toggle="sidebar-discover" class="glyphicons stats"><i></i><span>Reports</span></a>
						<div id="sidebar-discover-medical" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Reports</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
						<ul class="animated fadeIn">
								<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-file-text-o"></i>Master Report</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-legal"></i>Sales Pipe Line</a></li>
								<li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-ticket"></i>Staff Detail</a></li>
												   <li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-ticket"></i>Drop-Downs</a></li>
												   <li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-ticket"></i>Vehicle Stats</a></li>
												   <li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-ticket"></i>Eblast Stats</a></li>
												   <li><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-ticket"></i>Dealership Stats</a></li>
			
			
							</ul>
						</div>
					</li>
			
					<li>
						<a href="#sidebar-discover-learning" data-toggle="sidebar-discover" class="glyphicons message_out"><i></i><span>Eblast</span></a>
						<div id="sidebar-discover-learning" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Eblast</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li class="">
									<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'index')); ?>"><i class="fa fa-medkit"></i> Overview</a>
								</li>
						
							</ul>
						</div>
					</li>
			
					<li>
						<a href="#sidebar-discover-maps" class="glyphicons life_preserver" data-toggle="sidebar-discover"><i></i><span>Support</span></a>
						<div id="sidebar-discover-maps" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Support</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li><a href="<?php echo $this->Html->url(array('controller'=>'support','action'=>'index')); ?>"><i class="fa fa-ticket"></i><span>Support Main</span></a></li>
												</ul>
						</div>
					</li>
			
				
			
					<li>
						<a href="#sidebar-discover-financial" data-toggle="sidebar-discover" class="glyphicons adjust_alt"><i></i><span>Settings</span></a>
						<div id="sidebar-discover-financial" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Settings</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li><a href="invoice.html?lang=en"><i class="fa fa-file-text-o"></i>Dealer Settings</a></li>
								<li><a href="finances.html?lang=en"><i class="fa fa-legal"></i>Leads Rules</a></li>
								<li><a href="bookings.html?lang=en"><i class="fa fa-ticket"></i>Inventory feed</a></li>
	<li><a href="employees.html?lang=en"><i class="fa fa-user"></i>Employees</a></li>
												   <li><a href="employees.html?lang=en"><i class="fa fa-user"></i>Site Access</a></li>
							</ul>
						</div>
					</li>
			<li>
						<a href="#sidebar-discover-account" data-toggle="sidebar-discover" class="glyphicons user"><i></i><span>Account</span></a>
						<div id="sidebar-discover-account" class="sidebar-discover-menu">
							<div class="innerAll text-center border-bottom text-muted-dark">
								<strong>Account</strong>
								<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
							</div>
							<ul class="animated fadeIn">
								<li><a href="profile_resume.html?lang=en"><i class="fa fa-user"></i> Profile / CV</a></li>
								<li><a href="my_account.html?lang=en"><i class="fa fa-user"></i>Edit Account</a></li>
								<li><a href="login.html?lang=en" class="no-ajaxify"><i class="fa fa-lock"></i> Logout</a></li>
								
							</ul>
						</div>
					</li>
			
					
								
							</ul>
			</div>
		</div>
		<!-- // Sidebar Menu END -->
		
				
		<!-- Content -->
		<div id="content">

			<div class="navbar hidden-print main" role="navigation">
				<div class="user-action user-action-btn-navbar pull-left border-right">
					<button class="btn btn-sm btn-navbar btn-inverse btn-stroke"><i class="fa fa-bars fa-2x"></i></button>
				</div>
				<ul class="main pull-right">
					<li class="dropdown notif notifications hidden-xs">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell-fill"></i> <span class="label label-danger">5</span></a>
					</li>
					<li class="dropdown username">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Html->image('/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png',array('class'=>"img-circle",'width'=>"30")); ?><?php echo AuthComponent::user('full_name'); ?><span class="caret"></span></a>
			
						<ul class="dropdown-menu pull-right">
							<li><a href="my_account.html?lang=en" class="glyphicons user"><i></i> Account</a></li>
							<li><a href="messages.html?lang=en" class="glyphicons envelope"><i></i>Messages</a></li>
							<li><a href="index.html?lang=en" class="glyphicons settings"><i></i>Settings</a></li>
							<li><a href="/users/logout" class="glyphicons lock no-ajaxify"><i></i>Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

<!-- // END navbar -->

		
		 
		<?php echo $this->fetch('content'); ?>
		
		
				</div>
		<!-- // Content END -->
		
		
		 
		 <div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2016 - Dealership Performance CRM - All Rights Reserved.</div>
			<!--  End Copyright Line -->
	
		</div>
		
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	

	<!-- Global -->
	<script data-id="App.Config">
		var basePath = '',
		commonPath = '../assets/',
		rootPath = '../',
		DEV = false,
		componentsPath = '../assets/components/';
	
	var primaryColor = '#3695d5',
		dangerColor = '#b55151',
		successColor = '#609450',
		infoColor = '#4a8bc2',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;

		App.Config = {
		ajaxify_menu_selectors: ['#menu'],
		ajaxify_layout_app: true	};
		</script>
</body>
</html>
