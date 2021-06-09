<?php $custom_form_dealer_ids=array(5000,1224, 829, 830);
$dealer_id=AuthComponent::user('dealer_id');
if(!in_array($dealer_id,$custom_form_dealer_ids))
{
?>
<span class="results"><?php echo $deal_count; ?> Deals Found <i class="icon-circle-arrow-down"></i></span>

<ul class="list unstyled" id="list_lead_search_result" style="top: 20px;">

<?php $count = 0;	foreach ($deals as $deal): 	?>
	<li <?php echo ($count%2)? 'class="active"' : ""  ?> lead_row_id = "<?php echo $deal['Deal']['id'];  ?>" >
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $deal['Deal']['first_name']; ?> <?php echo $deal['Deal']['last_name']; ?></u></font>
					&nbsp; #<?php echo $deal['Deal']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $deal['Deal']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					
					//echo $cleaned;

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process, 
					$deal['Contact']['dnc_status'], 
					$cleaned, 
					$deal['Contact']['modified'],
				 	$deal['Contact']['sales_step']);

					?>
						&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $deal['Deal']['city']; ?> 

				<span class="muted">
				<?php echo $deal['Deal']['condition']; ?> &nbsp; <?php echo $deal['Deal']['year']; ?>  &nbsp;<?php echo $deal['Deal']['make']; ?> &nbsp;<?php echo $deal['Deal']['model']; ?>
			
			</span><?php echo $deal['Deal']['type']; ?> &nbsp;
			<strong>Dorment: <?php 
				$startTimeStamp = strtotime($deal['Deal']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</strong>
			
			</span>
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $deal['Deal']['modified']; ?></a>
			</span>
			<span class="muted">
				<?php if($deal['Deal']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $deal['Deal']['email']; ?> <?php } ?>	
			</span> 
			
		</div>
	</li>
<?php $count++; endforeach; ?>
</ul>


<script>


$(function() {

	<?php 
	//Load First Lead
	if(isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'load_first' && !empty($contacts)){
	?>
	$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php echo $this->Html->url(array('action' => 'deal_details', $deal[0]['Deal']['id'])); ?>",
		success: function(data){
			$("#lead_details_content").html(data);
			$("#lead_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>

    $("ul#list_lead_search_result").on('click', 'li', function() {

		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'deal_details', 'selected_lead_type'=>$selected_lead_type)); ?>/"+$(this).attr('lead_row_id'),
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		
    });
});



</script>
<?php }else{ ?>

<span class="results"><?php echo $deal_count; ?> Deals Found <i class="icon-circle-arrow-down"></i></span>

<div class="wizard">
	<div class="widget widget-tabs widget-tabs-responsive">
    	<div class="widget-head" style="padding:0;">
									<ul style="font-weight:bold;">
										<li class="active"><a href="#tab-progress"  data-toggle="tab" style="padding:0 3px;"><i></i>In Progress(<?php echo count($deals['in_progress']); ?>)</a></li>
                                        <li><a href="#tab-accepted"  data-toggle="tab" style="padding:0 3px;"><i></i>Accepted(<?php echo count($deals['accepted']); ?>)</a></li>
                                        <li><a href="#tab-rejected"  data-toggle="tab" style="padding:0 3px;"><i></i>Rejected(<?php echo count($deals['rejected']); ?>)</a></li>
                                   </ul>
				</div>
                <div class="widget-body"> 
									<div class="tab-content list_lead_search_result">
										
										<div class="tab-pane active" id="tab-progress">
                                        <div class=" unstyled"  style="max-height: 500px; overflow: auto">



<?php $count = 0;	foreach ($deals['in_progress'] as $deal): 	?>
<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $deal['Deal']['id'];  ?>" style="cursor: pointer">
    
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $deal['Deal']['first_name']; ?> <?php echo $deal['Deal']['last_name']; ?></u></font>
					&nbsp; #<?php echo $deal['Deal']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $deal['Deal']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					//echo $cleaned;

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process, 
					$deal['Contact']['dnc_status'], 
					$cleaned, 
					$deal['Contact']['modified'],
				 	$deal['Contact']['sales_step']);


					?>
						&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $deal['Deal']['city']; ?> 

				<span class="muted">
				<?php echo $deal['Deal']['condition']; ?> &nbsp; <?php echo $deal['Deal']['year']; ?>  &nbsp;<?php echo $deal['Deal']['make']; ?> &nbsp;<?php echo $deal['Deal']['model']; ?>
			
			</span><?php echo $deal['Deal']['type']; ?> &nbsp;
			<strong>Dorment: <?php 
				$startTimeStamp = strtotime($deal['Deal']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</strong>
			
			</span>
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $deal['Deal']['modified']; ?></a>
			</span>
			<span class="muted">
				<?php if($deal['Deal']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $deal['Deal']['email']; ?> <?php } ?>	
			</span> 
			
		</div>
	</div>
<?php $count++; endforeach; ?>
</div>
</div>

<?php // Accepted Deals ?>

<div class="tab-pane" id="tab-accepted">
    <div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($deals['accepted'] as $deal): 	?>
<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $deal['Deal']['id'];  ?>" style="cursor: pointer">
    
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $deal['Deal']['first_name']; ?> <?php echo $deal['Deal']['last_name']; ?></u></font>
					&nbsp; #<?php echo $deal['Deal']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $deal['Deal']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					//echo $cleaned;

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process, 
					$deal['Contact']['dnc_status'], 
					$cleaned, 
					$deal['Contact']['modified'],
				 	$deal['Contact']['sales_step']);

					?>
						&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $deal['Deal']['city']; ?> 

				<span class="muted">
				<?php echo $deal['Deal']['condition']; ?> &nbsp; <?php echo $deal['Deal']['year']; ?>  &nbsp;<?php echo $deal['Deal']['make']; ?> &nbsp;<?php echo $deal['Deal']['model']; ?>
			
			</span><?php echo $deal['Deal']['type']; ?> &nbsp;
			<strong>Dorment: <?php 
				$startTimeStamp = strtotime($deal['Deal']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</strong>
			
			</span>
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $deal['Deal']['modified']; ?></a>
			</span>
			<span class="muted">
				<?php if($deal['Deal']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $deal['Deal']['email']; ?> <?php } ?>	
			</span> 
			
		</div>
	</div>
<?php $count++; endforeach; ?>
</div>
</div>

<?php // Rejected Deals ?>

<div class="tab-pane" id="tab-rejected">
    <div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($deals['rejected'] as $deal): 	?>
<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $deal['Deal']['id'];  ?>" style="cursor: pointer">
    
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $deal['Deal']['first_name']; ?> <?php echo $deal['Deal']['last_name']; ?></u></font>
					&nbsp; #<?php echo $deal['Deal']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $deal['Deal']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					//echo $cleaned;

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process, 
					$deal['Contact']['dnc_status'], 
					$cleaned, 
					$deal['Contact']['modified'],
				 	$deal['Contact']['sales_step']);

					?>
						&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $deal['Deal']['city']; ?> 

				<span class="muted">
				<?php echo $deal['Deal']['condition']; ?> &nbsp; <?php echo $deal['Deal']['year']; ?>  &nbsp;<?php echo $deal['Deal']['make']; ?> &nbsp;<?php echo $deal['Deal']['model']; ?>
			
			</span><?php echo $deal['Deal']['type']; ?> &nbsp;
			<strong>Dorment: <?php 
				$startTimeStamp = strtotime($deal['Deal']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</strong>
			
			</span>
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $deal['Deal']['modified']; ?></a>
			</span>
			<span class="muted">
				<?php if($deal['Deal']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $deal['Deal']['email']; ?> <?php } ?>	
			</span> 
			
		</div>
	</div>
<?php $count++; endforeach; ?>
</div>
</div>

<?php // End deals ?>
</div>
</div>
</div>
</div>

<script>


$(function() {

	<?php 
	//Load First Lead
	if(isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'load_first' && !empty($contacts)){
	?>
	$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php echo $this->Html->url(array('action' => 'deal_details', $deal[0]['Deal']['id'])); ?>",
		success: function(data){
			$("#lead_details_content").html(data);
			$("#lead_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>

    $("div.list_lead_search_result").on('click', 'div.list_search_result', function() {

		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'deal_details', 'selected_lead_type'=>$selected_lead_type)); ?>/"+$(this).attr('lead_row_id'),
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		
    });
});



</script>

<?php } ?>





