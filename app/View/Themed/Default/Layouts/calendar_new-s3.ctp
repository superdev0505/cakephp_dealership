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
		<link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/css/admin/module.admin.stylesheet-complete.min.css?v=18" />
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/css/theme.css?v=14" />
		
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


	<script src="/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/script.min.js?v=v1.0.2&sv=v0.0.1"></script>

<script>var App = {};</script>

<script data-id="App.Scripts">
App.Scripts = {

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
		'/app/View/Themed/Default/webroot/assets/components/library/jquery-ui/js/jquery-ui.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/library/jquery/jquery-migrate.min.js?v=v1.0.2&sv=v0.0.1'
	],

	/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
	plugins: [
		'/app/View/Themed/Default/webroot/assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/davis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/jquery.lazyjaxdavis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/preload/pace/pace.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-timepicker/assets/lib/js/bootstrap-timepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/lib/jquery.bootstrap.wizard.js?v=v1.0.3-rc2&sv=v0.0.1.1', 
		
		
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/uniform/assets/lib/js/jquery.uniform.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/calendar/assets/lib/js/fullcalendar.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/fuelux-checkbox/fuelux-checkbox.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/less-js/less.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v1.0.2&sv=v0.0.1',
		'/app/View/Themed/Default/webroot/js/jquery.qtip-1.0.0-rc3.min.js'
	],

	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
	bundle: [
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/ajaxify.init.js?v=v1.0.2&sv=v0.0.1.2', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/core/js/animations.init.js?v=v1.0.2', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/custom/js/form-wizards-event.init.js?v=v1.0.3-rc2&sv=v0.0.1.1.25',
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-timepicker/assets/custom/js/bootstrap-timepicker.init.js?v=v1.0.3-rc2&sv=v0.0.1.1.25', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/uniform/assets/custom/js/uniform.init.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/calendar/assets/custom/js/calendar.init.js?v=v1.0.2&sv=v0.0.1.38', 
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
		
		<?php echo $this->element('sidebar_menu'); ?>
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
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo $this->Html->image('avatar-36x36.jpg',array('class'=>"img-circle",'width'=>"30")); ?><?php echo AuthComponent::user('full_name'); ?>
						<span class="caret"></span></a>
			
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
