
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
			<li <?php echo ($this->request->params['controller'] == 'service_calendar' && $this->request->params['action'] == 'serviceapp_index' )? 'class="active"' : ""; ?> > 
            	<?php echo $this->Html->link('<i></i><span>Service Home</span>',array('controller'=>'ServiceCalendar','action'=>'index','serviceapp'=>true),array('escape'=>false,
            	'class'=>'glyphicons home no-ajaxify')); ?>
			</li>

			<li <?php echo ($this->request->params['controller'] == '' && $this->request->params['action'] == 'serviceapp_main')? 'class="active"' : ""; ?> > 
            	<?php echo $this->Html->link('<i></i><span>Service Leads</span>',array('controller'=>'service_calendar','action'=>'main','serviceapp'=>true),array('escape'=>false,
            	'class'=>'glyphicons calendar no-ajaxify')); ?>
			</li>
            <li <?php echo ($this->request->params['controller'] == '' && $this->request->params['action'] == 'serviceapp_service_report')? 'class="active"' : ""; ?> > 
            	<?php echo $this->Html->link('<i></i><span>Service Reports</span>',array('controller'=>'service_calendar','action'=>'service_report','serviceapp'=>true),array('escape'=>false,
            	'class'=>'glyphicons calendar no-ajaxify')); ?>
			</li>
            <li <?php echo ($this->request->params['controller'] == 'ServiceSettings')? 'class="active"' : ""; ?> > 
            	<?php echo $this->Html->link('<i></i><span> Settings</span>',"#servie_app_setting",array('escape'=>false,
            	'class'=>'glyphicons  adjust_alt no-ajaxify','data-toggle' =>"sidebar-discover")); ?>
              <div id="servie_app_setting" class="sidebar-discover-menu">
					<div class="innerAll text-center border-bottom text-muted-dark"> <strong>Settings</strong>
						<button class="btn btn-xs btn-default close-discover"><i class="fa fa-fw fa-times"></i></button>
					</div>
                    <ul class="animated fadeIn">
					
                    <li><a class='no-ajaxify' href="<?php echo $this->Html->url(array('controller'=>'service_settings','action'=>'index','serviceapp' => true)); ?>"><i class="fa fa-file-text-o"></i>Service Settings</a></li>
                  	<li <?php echo ($this->request->url == 'serviceapp/users/index_new_userlisting/0'  )? 'class="active"' : ""; ?> ><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index_new_userlisting',0,'serviceapp' => true)); ?>" class="no-ajaxify"><i class="fa fa-group"></i> Employees</a></li>
                     </ul>
               </div>
                
			</li>
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