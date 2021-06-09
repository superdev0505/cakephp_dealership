
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
		<li <?php echo ($this->request->params['controller'] == 'bdc_leads' && $this->request->params['action'] == 'bdcapp_leads_main')? 'class="active"' : ""; ?> > 
            <?php echo $this->Html->link('<i></i><span>BDC Home</span>',array('controller'=>'bdc_leads','action'=>'leads_main','bdcapp'=>true),array('escape'=>false,'class'=>'glyphicons home no-ajaxify')); ?>
            </li>
            
         <li <?php echo ($this->request->params['controller'] == 'users')? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0,'bdcapp' => true)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Employees</a></li>  
           <li <?php echo ($this->request->params['controller'] == 'bdc_leads' && $this->request->params['action'] == 'bdcapp_bdc_report')? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'bdc_report','bdcapp' => true)); ?>" class="glyphicons stats no-ajaxify"><i></i> <span>BDC Reports</span></a></li> 
           
           <li <?php echo ($this->request->params['controller'] == 'supports')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-support" class="glyphicons life_preserver" data-toggle="sidebar-discover">
      
            
            <i></i><span>Support</span></a>
				<div id="sidebar-discover-support" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Support</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
					<ul class="animated fadeIn">
						<li <?php echo ($this->request->url == 'supports/add'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'supports','action'=>'add')); ?>"><i class="fa fa-medkit"></i><span>Add New Ticket</span></a></li>
					</ul>
				</div>
				
			<?php //debug( $_SESSION['Auth'] ); ?>
				
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