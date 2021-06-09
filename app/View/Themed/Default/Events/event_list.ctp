<ul class="list unstyled" id="list_event_search_result" style="top: 0px;">
<?php $count = 0; foreach($events as $event){ ?>
	<li <?php echo ($count%2)? 'class="active"' : ""  ?> event_row_id = "<?php echo $event['Event']['id'];  ?>" >
		<?php
		$completed = $event['Event']['status'];
		//echo $completed;
		$dump = ($completed == "Completed");
		//echo $dump;
		$is_overdue = ( strtotime('now') > strtotime($event['Event']['start']) &&  $event['Event']['status'] != 'Completed' )? true : false;
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
					<font color="blue"><u><?php echo $event['Event']['first_name'] . "&nbsp;" . $event['Event']['last_name']; ?>&nbsp;</u></font>&nbsp; #<?php echo $event['Contact']['id']; ?>
				</span>
			</div>
			
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $event['Event']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $event['Contact']['city'] ?>
			</span>
			<span class="muted">
				<span class="label label-inverse label-stroke"><?php echo $event['EventType']['name'] ?>&nbsp;</span>
				<span class="label label-primary label-stroke"><?php echo $event['Event']['status'] ?>&nbsp;</span>
				
				<?php
				if ($dump == 1) {
					echo '<span class="label label-success  label-stroke">Completed</span>';
				} else if ($dump == 0) {
					echo '<span class="label label-danger label-stroke">Not Completed</span>';
				}
				?>
			</span>
			<span class="muted">
				<?php echo $event['Contact']['condition']; ?>&nbsp;
				<?php echo $event['Contact']['year']; ?>&nbsp;
				<?php echo $event['Contact']['make']; ?>&nbsp;
				<?php echo $event['Contact']['model']; ?>&nbsp;
			</span>
			<span class="muted"><i class="fa fa-calendar"></i> <span <?php if ($is_overdue == true) echo "style='color: #CC3A3A'";  ?> > <?php echo date('m/d/Y h:iA', strtotime($event['Event']['start'])); ?> - 
			<?php echo date('m/d/Y h:iA', strtotime($event['Event']['end'])); ?></span></span>
			<span class="muted">
<span><strong>Title:</strong>&nbsp;<?php echo $event['Event']['title'] ?>&nbsp;</span>
<span><strong>Notes:</strong>&nbsp;<?php echo $event['Event']['details'] ?>&nbsp;</span> </span>
		</div>
	</li>
	<?php } ?>	
</ul>

<script>
$(function() {

	$("ul#list_event_search_result").on('click', 'li', function() {
		location.href = "/events/index/edit/" + $(this).attr('event_row_id');
	});


});
</script>

