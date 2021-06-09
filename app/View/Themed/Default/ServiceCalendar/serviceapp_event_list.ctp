<?php ?>

<span class="results"><?php echo count($events); ?> Events Found <i class="icon-circle-arrow-down"></i></span>



<div class="wizard">
	<div class="widget widget-tabs widget-tabs-responsive">
		<!-- Widget heading -->
		<div class="widget-head">
			<ul>
				<li class="active"><a href="#tab-not-completed"  data-toggle="tab"><i></i>Not Completed (<?php echo $Not_Completed_count; ?>)</a></li>
				<li><a href="#tab-completed"  data-toggle="tab"><i></i>Completed (<?php echo $completed_count; ?>)</a></li>
				<li><a href="#tab-Canceled"  data-toggle="tab"><i></i>Canceled (<?php echo $canceled_count; ?>)</a></li>
			</ul>
		</div>
		<div class="widget-body"> 
			<div class="tab-content">
				
				<div class="tab-pane active" id="tab-not-completed">
				
					<ul class=" unstyled" id="list_event_search_result" style="max-height: 500px; overflow: auto">
					<?php $count = 0; 
					//debug($events);
					foreach($events as $event){ 
						if($event['ServiceEventStatus']['name'] == "Completed" || $event['ServiceEventStatus']['name'] == "Canceled") continue;
					?>

						<li <?php echo ($count%2)? 'class="active"' : ""  ?> event_contact_id = "<?php echo $event['ServiceEvent']['contact_id'];  ?>"  event_row_id = "<?php echo $event['ServiceEvent']['id'];  ?>" class="border-bottom" style="cursor: pointer" >
							<?php
							$completed = $event['ServiceEventStatus']['name'];
							//echo $completed;
							$dump = ($completed == "Completed");
							//echo $dump;
							$is_overdue = ( strtotime('now') > strtotime($event['ServiceEvent']['start']) &&  $event['ServiceEventStatus']['name'] != 'Completed' )? true : false;
							?>
							<div class="media innerAll">
								
								<div class="media-object pull-left thumb animated fadeInDown" style="visibility: visible;">
									<?php if ($is_overdue == true) { ?>
									<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php } else{  if($dump == 1){ ?>
								   
								 <i style="color: #8BBF61;" class="fa fa-fw fa-check"></i>
								 <?php }?>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php }	?>
									
								</div>
								<div class="media-body">
									<span class="strong muted">
										<font color="blue"><u><?php echo $event['ServiceEvent']['first_name'] . "&nbsp;" . $event['ServiceEvent']['last_name']; ?>&nbsp;</u></font>&nbsp; #<?php echo $event['ServiceLead']['id']; ?>
									</span>
								</div>
								
								<span class="muted">
									<i class="fa fa-mobile"></i>
										<?php $phone = $event['ServiceEvent']['mobile'];
										$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
										$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
										echo $cleaned;?>&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $event['ServiceLead']['city'] ?>
								</span>
								<span class="muted">
									<span class="label label-inverse label-stroke"><?php echo $event['ServiceEventType']['name'] ?>&nbsp;</span>
									<span class="label label-primary label-stroke"><?php echo $event['ServiceEventStatus']['name']; ?>&nbsp;</span>
									
									<?php
									if ($dump == 1) {
										echo '<span class="label label-success  label-stroke">Completed</span>';
									} else if ($dump == 0) {
										echo '<span class="label label-danger label-stroke">Not Completed</span>';
									}
									?>
								</span>
								<span class="muted">
									<?php echo $event['ServiceLead']['condition']; ?>&nbsp;
									<?php echo $event['ServiceLead']['year']; ?>&nbsp;
									<?php echo $event['ServiceLead']['make']; ?>&nbsp;
									<?php echo $event['ServiceLead']['model']; ?>&nbsp;
								</span>
								<span class="muted"><i class="fa fa-calendar"></i> <span <?php if ($is_overdue == true) echo "style='color: #CC3A3A'";  ?> > <?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['start'])); ?> - 
								<?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['end'])); ?></span></span>
								<span class="muted">
									<span><strong>Title:</strong>&nbsp;<?php echo $event['ServiceEvent']['title'] ?>&nbsp;</span>
									<span><strong>Notes:</strong>&nbsp;<?php echo $event['ServiceEvent']['details'] ?>&nbsp;</span> 
								</span>
								<div>
									<span><strong>Sales Person:</strong>&nbsp;<?php echo $event['ServiceLead']['sperson'] ?>&nbsp;</span>
									<span><strong>Comment:</strong>&nbsp;<?php echo $event['ServiceLead']['notes'] ?>&nbsp;</span>
								</div>
								
								
								
							</div>
						</li>
						<?php } ?>	
					</ul>



				</div>
				<div class="tab-pane" id="tab-completed">
					
					<ul class=" unstyled" id="list_event_search_result1" style="max-height: 500px; overflow: auto"  >
					<?php $count = 0; foreach($events as $event){ 
						if($event['ServiceEventStatus']['name'] != "Completed") continue;
					?>

						<li <?php echo ($count%2)? 'class="active"' : ""  ?> event_contact_id = "<?php echo $event['ServiceEvent']['contact_id'];  ?>"  event_row_id = "<?php echo $event['ServiceEvent']['id'];  ?>" class="border-bottom" style="cursor: pointer" >
							<?php
							$completed = $event['ServiceEventStatus']['name'];
							//echo $completed;
							$dump = ($completed == "Completed");
							//echo $dump;
							$is_overdue = ( strtotime('now') > strtotime($event['ServiceEvent']['start']) &&  $event['ServiceEventStatus']['name'] != 'Completed' )? true : false;
							?>
							<div class="media innerAll">
								
								<div class="media-object pull-left thumb animated fadeInDown" style="visibility: visible;">
									<?php if ($is_overdue == true) { ?>
									<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php } else{  if($dump == 1){ ?>
								   
								 <i style="color: #8BBF61;" class="fa fa-fw fa-check"></i>
								 <?php }?>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php }	?>
									
								</div>
								<div class="media-body">
									<span class="strong muted">
										<font color="blue"><u><?php echo $event['ServiceEvent']['first_name'] . "&nbsp;" . $event['ServiceEvent']['last_name']; ?>&nbsp;</u></font>&nbsp; #<?php echo $event['ServiceLead']['id']; ?>
									</span>
								</div>
								
								<span class="muted">
									<i class="fa fa-mobile"></i>
										<?php $phone = $event['ServiceEvent']['mobile'];
										$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
										$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
										echo $cleaned;?>&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $event['ServiceLead']['city'] ?>
								</span>
								<span class="muted">
									<span class="label label-inverse label-stroke"><?php echo $event['ServiceEventType']['name'] ?>&nbsp;</span>
									<span class="label label-primary label-stroke"><?php echo $event['ServiceEventStatus']['name'] ?>&nbsp;</span>
									
									<?php
									if ($dump == 1) {
										echo '<span class="label label-success  label-stroke">Completed</span>';
									} else if ($dump == 0) {
										echo '<span class="label label-danger label-stroke">Not Completed</span>';
									}
									?>
								</span>
								<span class="muted">
									<?php echo $event['ServiceLead']['condition']; ?>&nbsp;
									<?php echo $event['ServiceLead']['year']; ?>&nbsp;
									<?php echo $event['ServiceLead']['make']; ?>&nbsp;
									<?php echo $event['ServiceLead']['model']; ?>&nbsp;
								</span>
								<span class="muted"><i class="fa fa-calendar"></i> <span <?php if ($is_overdue == true) echo "style='color: #CC3A3A'";  ?> > <?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['start'])); ?> - 
								<?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['end'])); ?></span></span>
								<span class="muted">
<span><strong>Title:</strong>&nbsp;<?php echo $event['ServiceEvent']['title'] ?>&nbsp;</span>
<span><strong>Notes:</strong>&nbsp;<?php echo $event['ServiceEvent']['details'] ?>&nbsp;</span> </span>
								<div>
									<span><strong>Sales Person:</strong>&nbsp;<?php echo $event['ServiceLead']['sperson'] ?>&nbsp;</span>
									<span><strong>Comment:</strong>&nbsp;<?php echo $event['ServiceLead']['notes'] ?>&nbsp;</span>
								</div>
							</div>
						</li>
						<?php } ?>	
					</ul>
				
					
				</div>
				<div class="tab-pane" id="tab-Canceled">
					
					<ul class=" unstyled" id="list_event_search_result2" style="max-height: 500px; overflow: auto"  >
					<?php $count = 0; foreach($events as $event){ 
						if($event['ServiceEventStatus']['name'] != "Canceled") continue;
					?>

						<li <?php echo ($count%2)? 'class="active"' : ""  ?> event_contact_id = "<?php echo $event['ServiceEvent']['contact_id'];  ?>"  event_row_id = "<?php echo $event['ServiceEvent']['id'];  ?>" class="border-bottom" style="cursor: pointer" >
							<?php
							$completed = $event['ServiceEventStatus']['name'];
							//echo $completed;
							$dump = ($completed == "Completed");
							//echo $dump;
							$is_overdue = ( strtotime('now') > strtotime($event['ServiceEvent']['start']) &&  $event['ServiceEvent']['status'] != 'Completed' )? true : false;
							?>
							<div class="media innerAll">
								
								<div class="media-object pull-left thumb animated fadeInDown" style="visibility: visible;">
									<?php if ($is_overdue == true) { ?>
									<i style="color: #CC3A3A;" class="fa fa-fw fa-exclamation-circle "></i>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php } else{  if($dump == 1){ ?>
								   
								 <i style="color: #8BBF61;" class="fa fa-fw fa-check"></i>
								 <?php }?>
										<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image">
									<?php }	?>
									
								</div>
								<div class="media-body">
									<span class="strong muted">
										<font color="blue"><u><?php echo $event['ServiceEvent']['first_name'] . "&nbsp;" . $event['ServiceEvent']['last_name']; ?>&nbsp;</u></font>&nbsp; #<?php echo $event['ServiceLead']['id']; ?>
									</span>
								</div>
								
								<span class="muted">
									<i class="fa fa-mobile"></i>
										<?php $phone = $event['ServiceEvent']['mobile'];
										$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
										$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
										echo $cleaned;?>&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $event['ServiceLead']['city'] ?>
								</span>
								<span class="muted">
									<span class="label label-inverse label-stroke"><?php echo $event['ServiceEventType']['name'] ?>&nbsp;</span>
									<span class="label label-primary label-stroke"><?php echo $event['ServiceEventStatus']['name'] ?>&nbsp;</span>
									
									<?php
									if ($dump == 1) {
										echo '<span class="label label-success  label-stroke">Completed</span>';
									} else if ($dump == 0) {
										echo '<span class="label label-danger label-stroke">Not Completed</span>';
									}
									?>
								</span>
								<span class="muted">
									<?php echo $event['ServiceLead']['condition']; ?>&nbsp;
									<?php echo $event['ServiceLead']['year']; ?>&nbsp;
									<?php echo $event['ServiceLead']['make']; ?>&nbsp;
									<?php echo $event['ServiceLead']['model']; ?>&nbsp;
								</span>
								<span class="muted"><i class="fa fa-calendar"></i> <span <?php if ($is_overdue == true) echo "style='color: #CC3A3A'";  ?> > <?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['start'])); ?> - 
								<?php echo date('m/d/Y h:iA', strtotime($event['ServiceEvent']['end'])); ?></span></span>
								<span class="muted"></span>
								<span><strong>Title:</strong>&nbsp;<?php echo $event['ServiceEvent']['title'] ?>&nbsp;</span>
								<span><strong>Notes:</strong>&nbsp;<?php echo $event['ServiceEvent']['details'] ?>&nbsp;</span> </span>
								<div>
									<span><strong>Sales Person:</strong>&nbsp;<?php echo $event['ServiceLead']['sperson'] ?>&nbsp;</span>
									<span><strong>Comment:</strong>&nbsp;<?php echo $event['ServiceLead']['notes'] ?>&nbsp;</span>
								</div>
							</div>
						</li>
						<?php } ?>	
					</ul>
				
					
				</div>
			</div>
		</div>
	</div>
</div>
		

