 <span class="results"><?php echo $lead_count; ?> Leads Found <i class="icon-circle-arrow-down"></i></span>

<?php 
$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="wizard">
	<div class="widget widget-tabs widget-tabs-responsive">
		<!-- Widget heading -->
		<div class="widget-head" style="padding:0;">
									<ul style="font-weight:bold;">
										<li class="active"><a href="#tab-new"  data-toggle="tab" style="padding:0 3px;"><i></i>New(<?php echo count($contacts['new']); ?>)</a></li>
                                        <li><a href="#tab-callback"  data-toggle="tab" style="padding:0 3px;"><i></i>Call Back(<?php echo count($contacts['call_back']); ?>)</a></li>
                                        <li><a href="#tab-no-contact"  data-toggle="tab" style="padding:0 3px;"><i></i>No Contact(<?php echo count($contacts['no_contact']); ?>)</a></li>
                                         <li><a href="#tab-voicemail"  data-toggle="tab" style="padding:0 3px;"><i></i>VM(<?php echo count($contacts['voicemail']); ?>)</a></li>
                                        <li><a href="#tab-contact"  data-toggle="tab" style="padding:0 3px;"><i></i>Contact(<?php echo count($contacts['contact']); ?>)</a></li>
										
										<li><a href="#tab-bad-number"  data-toggle="tab" style="padding:0 3px;"><i></i>Bad #(<?php echo count($contacts['bad_number']); ?>)</a></li>
                                       
                                        
									</ul>
				</div>
                <div class="widget-body"> 
									<div class="tab-content">
										
										<div class="tab-pane active" id="tab-new">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php 
//New contact list

$count = 0;	foreach ($contacts['new'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>
<?php // contact leads  ?>

<div class="tab-pane" id="tab-contact">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['contact'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // call back leads tab ?>

<div class="tab-pane" id="tab-callback">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['call_back'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // No Contact Leads ?>

<div class="tab-pane" id="tab-no-contact">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['no_contact'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // Bad Number leads   ?>

<div class="tab-pane" id="tab-bad-number">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['bad_number'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // Voicemail Leads  ?>

<div class="tab-pane" id="tab-voicemail">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['voicemail'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['PartLeadsDms']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
			
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['PartLeadsDms']['name'] ;  ?></u></font>
					<?php			
						echo '<span class="label label-info label-stroke">Part Lead</span>';
								
					?>&nbsp; #<?php echo $contact['PartLeadsDms']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?> 
			</span>	

			<span class="muted">
				 <?php echo $contact['ServiceLeadsDms']['taxable_sales']; ?>  &nbsp;
			</span>
			
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['PartLeadsDms']['modified']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays;
				
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo date('D -M d,Y h:i A',strtotime($contact['PartLeadsDms']['modified'])); ?>
			</span>
			
			
		
			
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Cashier:</strong>&nbsp;<?php echo $contact['PartLeadsDms']['cashier'] ?>&nbsp;</span> 
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // End leads ?>
</div>
</div>
</div>
</div>

<?php //echo $this->element('sql_dump'); ?>
<script>


$(function() {
	
	<?php if(isset($this->request->params['named']['search_all'])&& in_array($this->request->params['named']['search_all'],array('today_callback'))){?>
	$('a[href="#tab-callback"]').trigger('click');
	<?php } ?>
	
	$(".lnk_merge_all_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				});			
			}
		});
	});
	
	
	$(".lnk_merge_partial_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				});			
			}
		});
	});
	

	<?php 
	//Load First Lead
	$id='';
		if(!empty($contacts['new']))
		{
			$id=$contacts['new'][0]['PartLeadsDms']['id'];
		}
		elseif(!empty($contacts['contact']))
		 {
			 $id=$contacts['contact'][0]['PartLeadsDms']['id'];  
		 }
		 elseif(!empty($contacts['no_contact']))
		 {
			 $id=$contacts['no_contact'][0]['PartLeadsDms']['id'];  
		 }
		 elseif(!empty($contacts['bad_number']))
		 {
			 $id=$contacts['bad_number'][0]['PartLeadsDms']['id'];  
		 }
		 elseif(!empty($contacts['voicemail']))
		 {
			 $id=$contacts['voicemail'][0]['PartLeadsDms']['id'];  
		 }
		 elseif(!empty($contacts['call_back']))
		 {
			 $id=$contacts['call_back'][0]['PartLeadsDms']['id'];  
		 }
	if(isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'load_first' && !empty($contacts)&& $id!=''){
	?>
	$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php 
		
		echo $this->Html->url(array('action' => 'part_lead_details',$id)); ?>",
		success: function(data){
			$("#lead_details_content").html(data);
			$("#lead_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>

    $(".list_search_result").click(function() {

		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'part_lead_details', 'selected_lead_type'=>$selected_lead_type)); ?>/"+$(this).attr('lead_row_id'),
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		
    });
});



</script>
	