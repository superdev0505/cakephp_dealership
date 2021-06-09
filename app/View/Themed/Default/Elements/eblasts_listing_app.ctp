<?php 
$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
$options_status = array ('not_sent' => 'Not sent', 'sent' => 'Sent');
?>
<!-- Products table -->
<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
    <thead>
        <tr>
            <th style="width: 1%;" class="center">Ref#</th>
            <th style="width: 20%;" >Campaign Name</th>
            <th>Recipient List</th>
            <th>Type</th>
			<th>Created On</th>
            <th>Schedule</th>
			<th>Time</th>
            <th>Status</th>
			<th width="230">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($eblasts as $eblast) {
			 	
			 	if($eblast['EblastApp']['scheduled'] == '1'){
			 		$status = '<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i> Sent';	
			 	}else{
			 		$status = 'Not Sent';
			 	}
				 
			
			
			
			if( $eblast['EblastApp']['template_type']=='M' ){
				$schedule = $this->Time->format('M d, Y', $eblast['EblastApp']['date_start']);
			}else if( $eblast['EblastApp']['template_type']=='N' ){

				$schedule = $this->Time->format('M d, Y', $eblast['EblastApp']['last_scheduled_at']);

			}else{
				
				$schedule_options = array(
					'daily' => 'Daily',
					'weekly' => 'Weekly',
					'monthly' => 'Monthly',
					'yearly' => 'Yearly'
				);
				$schedule = $schedule_options[$eblast['EblastApp']['schedule_at']];
				$schedule_other = '';
				if($eblast['EblastApp']['schedule_at']=='yearly'){
					$schedule_other = $eblast['EblastApp']['month'].", Day-".$eblast['EblastApp']['day_no'];
				}elseif($eblast['EblastApp']['schedule_at']=='monthly'){
					$schedule_other = "Day-".$eblast['EblastApp']['day_no'];
				}elseif($eblast['EblastApp']['schedule_at']=='weekly'){
					$schedule_other = "Every ".$eblast['EblastApp']['week_day'];
				}
				if($schedule_other!=''){
					$schedule .=' ( '.$schedule_other.' )';
				}
			}
			unset($form_filters);
            if($eblast['EblastApp']['form_filters']!='') {
                $form_filters = json_decode( $eblast['EblastApp']['form_filters'] );
            }
        ?>
        <tr class="selectable" style="">
            <td class="center" style="width: 41px;"><?php echo $eblast['EblastApp']['id']; ?></td>
            <td class="important" style="width: 130px;">
				<?php echo $eblast['EblastApp']['campaign_name']; ?>
			</td>
			<td>
				<?php if($eblast['List']['list_name'] != ''){ ?>

					<?php echo $this->Html->link($eblast['List']['list_name']." ({$eblast['List']['total_recipient']})", array('controller'=>'recipients', 'action'=>'add', '?'=>array('key'=>base64_encode($eblast['List']['id']))) ); ?>

				<?php }else{ ?>

					Contact

				<?php } ?>


				
			</td>
            <td><?php echo $eblast_types[$eblast['EblastApp']['template_type']]; ?></td>
            <td><?php echo $this->Time->format('M d, Y', $eblast['EblastApp']['created_date']); ?></td>
            <td>
            		
            	<?php 
            	if($eblast['EblastApp']['template_type'] == 'N'){
            		echo $this->Time->format('M d, Y', $eblast['EblastApp']['last_scheduled_at']); 
            	}else{
            		echo $this->Time->format('M d, Y', $eblast['EblastApp']['date_start']); 	
            	}	
            	

            	?>

            </td>
			<td><?php echo date("h:i A",strtotime($eblast['EblastApp']['schedule_time'])); ?></td>
            <td><?php echo $status; ?></td>
			<td>
				<div class="make-switch" style="" data-on="success" data-off="default">
				<input class="active_eblast" name="active_eblast_<?php echo $eblast['EblastApp']['id'];?>" id="active_eblast_<?php echo $eblast['EblastApp']['id'];?>" type="checkbox"  <?php if(isset($eblast['EblastApp']['active']) && $eblast['EblastApp']['active'] == 1)  echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $eblast['EblastApp']['id'];?>"    />
				</div>
				&nbsp;
				<?php echo $this->Html->link("Full Stats", 
					array('controller'=>'marketing_apps','action'=>'statistics', $eblast['EblastApp']['id']), 
					array('class'=>'no-ajaxify btn btn-primary','escape'=>false)); 
				?>

			</td>

			
			
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- // Products table END -->
<!-- Options -->
<div class=""><a href="<?php echo $this->Html->url(array('controller' => 'marketing', 'action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
    <div class="pull-right">
        <ul class="pagination margin-none">
            <?php echo $this->Paginator->prev('<<'); ?>
            <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
            <?php echo $this->Paginator->next('>>'); ?>
        </ul>
    </div>
    <div class="clearfix"></div>
<!-- // Pagination END -->
</div>
<!-- // Options END -->
<script>
$script.ready('bundle', function() {
	$('.active_eblast').change(function(){
		$.ajax({
			type: "get",
			cache: false,
			dataType: 'json',
			data: {'active': $(this).is(":checked"),'id':$(this).val()},
			url:  "/marketing_apps/activate_eblasts/",
			success: function(data){
				
			}
		});
		
	});
});
</script>