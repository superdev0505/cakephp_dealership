<?php if(!empty($contacts)){  $count = 0;	foreach ($contacts as $contact){ 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['Contact']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['Contact']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo ucwords(strtolower($contact['Contact']['first_name'])) . "&nbsp;" . ucwords(strtolower($contact['Contact']['last_name']));  ?></u></font>
					<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?>&nbsp; #<?php echo $contact['Contact']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['Contact']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['Contact']['condition']; ?> &nbsp; <?php echo $contact['Contact']['year']; ?>  &nbsp;<?php echo $contact['Contact']['make']; ?> &nbsp;<?php echo $contact['Contact']['model']; ?>
			<?php echo $contact['Contact']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['Contact']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['Contact']['modified_full_date']; ?>
			</span>
			
			<span class="muted">
				<?php if($contact['Contact']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['Contact']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['Contact']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['Contact']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			<span class="muted">
				Lead Step: <?php echo $contact['Contact']['sales_step']; ?>
			</span>
			<span class="muted">
				Source: <?php echo $contact['Contact']['source']; ?>
			</span>
			<span class="muted">
				Notes: <?php echo $contact['Contact']['notes']; ?>
			</span>
			
		</div>
</div>
<?php $count++; } }else{ ?>
No Lead Found
<?php } ?>


<script>
$(function(){
	
	$(".list_search_result").click(function(event){
		location.href = "/contacts/leads_main/view/"+$(this).attr('lead_row_id');
	});


});

</script>
	