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
	-->
    <?php 
	echo $this->Html->css(array('/app/webroot/css/bootstrap.min','/app/webroot/css/font-awesome.min'));
	echo $this->Html->script(array('/app/webroot/js/jquery-2.1.4.min','/app/webroot/js/bootstrap.min'));
	 ?>




<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->


</head>
<body class="scripts-async" >
	
	<!-- Main Container Fluid -->
	<div class="container">
		
		
		<!-- Content -->
		<div id="content">
		

		<!-- // END navbar -->
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('sql_dump'); ?>
	
		</div>
		<!-- // Content END -->
	
		 <div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
		<div id="footer" class="footer">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; ealership Performance CRM LLC - All Rights Reserved.</div>
			<!--  End Copyright Line -->
	
		</div>
		
		<!-- // Footer END -->
		
	</div>
	<!-- // Main Container Fluid END -->
	<!-- Global -->

</body>
</html>