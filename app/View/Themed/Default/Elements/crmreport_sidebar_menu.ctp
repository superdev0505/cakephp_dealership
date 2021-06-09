
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
		<ul class="list-unstyled">
			
			
		
			
			
			
			
			
			
			
			
			
			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > 
            <?php echo $this->Html->link('<i></i><span>Reports Home</span>',array('controller'=>'dashboards','action'=>'reports','crmreport'=>true),array('escape'=>false,'class'=>'glyphicons home no-ajaxify')); ?>
            </li>
			
			<li <?php echo ($this->request->params['controller'] == 'bdc_leads')? 'class="active"' : ""; ?> > 
				<a href="#sidebar-discover-bdc" class="glyphicons group" data-toggle="sidebar-discover"><i></i><span>BDC Reporting</span></a>
				<div id="sidebar-discover-bdc" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>BDC Reporting</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						
                        <li <?php echo ($this->request->url == 'bdc_leads/bdc_report'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'bdc_report')); ?>"><i class="fa fa-user"></i>BDC-Reports</a></li>
					</ul>
				</div>
			</li>
            <li <?php echo ($this->request->params['controller'] == 'reports')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-reports" data-toggle="sidebar-discover" class="glyphicons stats"><i></i><span>CRM Reports</span></a>
				<div id="sidebar-discover-reports" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Reports</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'reports/main_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>"><i class="fa fa-file-text-o"></i>Master Report</a></li>
						<li <?php echo ($this->request->url == 'reports/drop_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'drop_reports')); ?>"><i class="fa fa-ticket"></i>Drop-Downs</a></li>
                       
						<li <?php echo ($this->request->url == 'reports/unit_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'unit_reports')); ?>"><i class="fa fa-ticket"></i>Vehicle Stats</a></li>
								
						<li <?php echo ($this->request->url == 'reports/sales_pipeline_reports'  )? 'class="active"' : ""; ?> ><a class="no-ajaxify" href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'sales_pipeline_reports')); ?>"><i class="fa fa-legal"></i>Sales Pipe Line</a></li>
						 <?php /*?>	<li <?php echo ($this->request->url == 'reports/eblast_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'eblast_reports')); ?>"><i class="fa fa-ticket"></i>Eblast Stats</a></li><?php */?>
						
						<li <?php echo ($this->request->url == 'reports/dailyrecap_reports'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'dailyrecap_reports')); ?>"><i class="fa fa-ticket"></i>Daily Recap</a></li>
					</ul>
				</div>
			</li>
			
		
			
			
			
			
			
			
			
		
		 
		 
		 
		 
		 
		</ul>
	</div>
</div>
<!-- // Sidebar Menu END -->
<script>
/*function view_leads()
{
	$.ajax({
		type: "GET",
		cache: false,
		url: '/supports/view_alerts',
		success: function(data){
		bootbox.dialog({
		message: data,
		backdrop: true,
		title: "Update Alerts",
		}).find("div.modal-dialog").addClass("system_update_alert");
		//$("span#system_update_alert").remove();													
		}
	});
}*/
</script>