<div class="widget widget-tabs widget-tabs-responsive">
	<!-- Tabs Heading -->
	<div class="widget-head">
		<ul>
			<li  ><a class="glyphicons coffe_cup" href="#tab-log" data-toggle="tab"><i></i>Log Mode</a></li>
			<?php if(!empty($xmlInventories['XmlInventory']['description'])){ ?>
			<li><a  class="glyphicons active check text-green" href="#tab-2" data-toggle="tab"><i></i>Description</a></li>
			<?php  } ?>
			
			<?php  if($contact['Contact']['contact_status_id'] == 5){ ?>
				<li><a class="glyphicons share_alt text-red" href="#tab-weblead" data-toggle="tab"><i></i>Web Selction: <?php  echo $contact['Contact']['web_selection']; ?></a></li>
			<?php  } ?>
			
			<?php  if($contact['Contact']['import'] == "Y"){ ?>
				<li><a class="glyphicons share_alt text-red" href="#tab-initial" data-toggle="tab"><i></i>Vehicle Initial Section: 
						<?php  echo $contact['Contact']['type']; ?> ,
						<?php  echo $contact['Contact']['class']; ?> ,
						<?php  echo $contact['Contact']['condition']; ?> ,
						<?php  echo $contact['Contact']['year']; ?>,
						<?php  echo $contact['Contact']['make']; ?>,
						<?php  echo $contact['Contact']['model']; ?>
					</a>
				</li>
			<?php  } ?>
			
			
		</ul>
	</div>
	<!-- // Tabs Heading END -->
	<div class="widget-body">
		<div class="tab-content">
			<!-- Tab content -->
			<div class="tab-pane  animated fadeInUp" id="tab-log">
				<p>
				</p>
			</div>
			<!-- // Tab content END -->
			<?php if(!empty($xmlInventories['XmlInventory']['description'])){ ?>
			<!-- Tab content -->
			<div class="tab-pane active animated fadeInUp" id="tab-2">
				<p>
					<?php 
						echo $xmlInventories['XmlInventory']['description'];
					?>
				</p>
			</div>
				<!-- // Tab content END -->
				<?php  } ?>
		</div>
	</div>
</div>