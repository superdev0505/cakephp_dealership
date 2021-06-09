<!-- Sidebar Menu -->
<?php //debug($this->request->params); ?>
<?php //debug($this->request->here); ?>

<div id="menu" class="hidden-print hidden-xs">
	<div id="sidebar-discover-wrapper">
		<ul class="list-unstyled">
			
			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-dashboard" class="glyphicons home " data-toggle="sidebar-discover"><i></i><span>Dashboard</span></a>
				<div id="sidebar-discover-dashboard" class="sidebar-discover-menu">
					<ul>
						<li><a href="<?php echo $this->Html->url(array('controller'=>'marketing','action'=>'index')); ?>"><i class="fa fa-home"></i>Home</a></li>
					</ul>
				</div>
			</li>
			
			<li <?php echo ($this->request->params['controller'] == 'dashboards')? 'class="active"' : ""; ?> > <a href="#sidebar-discover-inventory" class="glyphicons group" data-toggle="sidebar-discover"><i></i><span>Recipients</span></a>
				<div id="sidebar-discover-inventory" class="sidebar-discover-menu">
					<ul>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'lists','action'=>'index')); ?>"><i class="fa fa-home"></i>Manage</a>
						</li>
					</ul>
				</div>
			</li>


			<li><a href="#sidebar-discover-eblast_list" class="glyphicons inbox_out" data-toggle="sidebar-discover"><i></i><span>Eblast</span></a>
				<div id="sidebar-discover-eblast_list" class="sidebar-discover-menu">
					<ul>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'marketing_apps','action'=>'eblasts_list','M')); ?>"><i class="fa fa-home"></i>Manage</a>
						</li>
					</ul>
				</div>
			</li>

			<li><a href="#sidebar-discover-newsletter" class="glyphicons notes" data-toggle="sidebar-discover"><i></i><span>Newsletter</span></a>
				<div id="sidebar-discover-newsletter" class="sidebar-discover-menu">
					<ul>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'marketing_apps','action'=>'eblasts_list','N')); ?>"><i class="fa fa-home"></i>Manage</a>
						</li>
					</ul>
				</div>
			</li>

			<!-- <li><a href="#sidebar-discover-autoresponder" class="glyphicons log_book" data-toggle="sidebar-discover"><i></i><span>Autoresponders</span></a>
				<div id="sidebar-discover-autoresponder" class="sidebar-discover-menu">
					<ul>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'setup_autoresponder')); ?>"><i class="fa fa-home"></i>Manage</a>
						</li>
					</ul>
				</div>
			</li> -->

			<li><a href="#sidebar-discover-template_list" class="glyphicons folder_new" data-toggle="sidebar-discover"><i></i><span>Templates</span></a>
				<div id="sidebar-discover-template_list" class="sidebar-discover-menu">
					<ul>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'marketing_apps','action'=>'templates_list')); ?>"><i class="fa fa-home"></i>Manage</a>
						</li>
					</ul>
				</div>
			</li>

			
			
			
			
		 
		 
		 
		 
		</ul>
	</div>
</div>
<!-- // Sidebar Menu END -->
