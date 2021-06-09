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
		<link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/css/admin/module.admin.stylesheet-complete.min.email.css?v=8" />
		
		
	
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
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v1.0.2&sv=v0.0.1',
		'/app/View/Themed/Default/webroot/assets/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.3-rc2&sv=v0.0.1.1'
	],

	/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
	plugins: [
		'/app/View/Themed/Default/webroot/assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/breakpoints/breakpoints.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/davis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/ajaxify/jquery.lazyjaxdavis.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/plugins/preload/pace/pace.min.js?v=v1.0.2&sv=v0.0.1', 
		'/app/View/Themed/Default/webroot/assets/components/common/forms/wizards/assets/lib/jquery.bootstrap.wizard.js?v=v1.0.3-rc2&sv=v0.0.1.1', 
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
		'/app/View/Themed/Default/webroot/assets/components/modules/admin/email/assets/js/email.init.js?v=v1.0.3-rc2', 
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
		
		<?php echo $this->element('sidebar_menu'); ?>
				
	<!-- Content -->
		<div id="content">
			<?php echo $this->element('layout_top_area'); ?>

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
