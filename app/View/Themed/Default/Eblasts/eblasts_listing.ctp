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
                
                if($eblast['Eblast']['scheduled'] == '1'){
                    $status = '<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i> Sent'; 
                }else{
                    $status = 'Not Sent';
                }
                 
            
            
            
            if( $eblast['Eblast']['template_type']=='M' ){
                $schedule = $this->Time->format('M d, Y', $eblast['Eblast']['date_start']);
            }else if( $eblast['Eblast']['template_type']=='N' ){

                $schedule = $this->Time->format('M d, Y', $eblast['Eblast']['last_scheduled_at']);

            }else{
                
                $schedule_options = array(
                    'daily' => 'Daily',
                    'weekly' => 'Weekly',
                    'monthly' => 'Monthly',
                    'yearly' => 'Yearly'
                );
                $schedule = $schedule_options[$eblast['Eblast']['schedule_at']];
                $schedule_other = '';
                if($eblast['Eblast']['schedule_at']=='yearly'){
                    $schedule_other = $eblast['Eblast']['month'].", Day-".$eblast['Eblast']['day_no'];
                }elseif($eblast['Eblast']['schedule_at']=='monthly'){
                    $schedule_other = "Day-".$eblast['Eblast']['day_no'];
                }elseif($eblast['Eblast']['schedule_at']=='weekly'){
                    $schedule_other = "Every ".$eblast['Eblast']['week_day'];
                }
                if($schedule_other!=''){
                    $schedule .=' ( '.$schedule_other.' )';
                }
            }
            unset($form_filters);
            if($eblast['Eblast']['form_filters']!='') {
                $form_filters = json_decode( $eblast['Eblast']['form_filters'] );
            }
        ?>
        <tr class="selectable" style="">
            <td class="center" style="width: 41px;"><?php echo $eblast['Eblast']['eblasts_id']; ?></td>
            <td class="important" style="width: 130px;">
                <?php echo $this->Html->link("<u>".$eblast['Eblast']['campaign_name']."</u>",array('controller'=>'Eblasts','action'=>'details',$eblast['Eblast']['eblasts_id']), 
                array('class'=>'no-ajaxify lnk_campaign_details','escape'=>false)); ?>
            </td>
            <td><?php echo $eblast_types[$eblast['Eblast']['template_type']]; ?></td>
            <td><?php echo $this->Time->format('M d, Y', $eblast['Eblast']['created_date']); ?></td>
            <td>
                    
                <?php 
                if($eblast['Eblast']['template_type'] == 'N'){
                    echo $this->Time->format('M d, Y', $eblast['Eblast']['last_scheduled_at']); 
                }else{
                    echo $this->Time->format('M d, Y', $eblast['Eblast']['date_start']);    
                }   
                

                ?>

            </td>
            <td><?php echo date("h:i A",strtotime($eblast['Eblast']['schedule_time'])); ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <div class="make-switch" style="" data-on="success" data-off="default">
                <input class="active_eblast" name="active_eblast_<?php echo $eblast['Eblast']['eblasts_id'];?>" id="active_eblast_<?php echo $eblast['Eblast']['eblasts_id'];?>" type="checkbox"  <?php if(isset($eblast['Eblast']['active']) && $eblast['Eblast']['active'] == 1)  echo 'checked="checked"'; else echo ''; ?>  value="<?php echo $eblast['Eblast']['eblasts_id'];?>"    />
                </div>
                &nbsp;
                <?php echo $this->Html->link("Full Stats", 
                    array('controller'=>'Eblasts','action'=>'statistics'), 
                    array('class'=>'no-ajaxify btn btn-primary','escape'=>false)); 
                ?>

            </td>

            
            
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- // Products table END -->
<!-- Options -->
<div class=""><a href="<?php echo $this->Html->url(array('action'=>'/')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
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
            url:  "/eblasts/activate_eblasts/",
            success: function(data){
                
            }
        });
        
    });
});
</script>