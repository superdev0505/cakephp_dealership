<!-- Products table -->
<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
    <thead>
        <tr>
            <th style="width: 1%;" class="center">Ref#</th>
            <th>Campaign Name</th>
            <th>Created On</th>
            <th>Type</th>
            <th>Step</th>
            <th>Status</th>
            <th class="center" style="width: 100px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($eblasts as $eblast) : 
            if(strtotime($eblast['Eblasts']['date_end']) < time() ) {
                $status = 'Close';
            } else {
                $status = 'Open';
            }

            unset($form_filters);
            if($eblast['Eblasts']['form_filters']!='') {
                $form_filters = json_decode( $eblast['Eblasts']['form_filters'] );
            }
        ?>
        <tr class="selectable" style="">
            <td class="center" style="width: 41px;">&nbsp;</td>
            <td class="important" style="width: 130px;"><?php echo $eblast['Eblasts']['campaign_name']; ?></td>
            <td><?php echo $this->Time->format('M d, Y', $eblast['Eblasts']['created_date']); ?></td>
            <td>
            <?php

                echo ($eblast['Eblasts']['date_end']=='0000-00-00 00:00:00') ? '<i class="fa fa-arrow-right"></i> ' .'One Time' : '';

                if( is_object($form_filters) && $eblast['Eblasts']['date_end'] != '0000-00-00 00:00:00') {
                    $hr['0']= 'One Time Only';
                    $hr['1']= 'Every Hour';
                    $hr['3']= '3 Hrs';
                    $hr['5']= '5 Hrs';
                    $hr['8']= '8 Hrs';
                    $hr['12']= '12 Hrs';
                    $hr['18']= '18 Hrs';
                    $hr['24']= 'Every day';
                    $hr['48']= '2 Days';
                    $hr['72']= '3 Days';
                    $hr['120']= '5 Days';
                    $hr['168']= '1 Week';
                    $hr['336']= '2 Weeks';
                    $hr['672']= '4 Weeks';
                    $hr['720']= '1 Month';
                    $hr['2880']= '3 Months';
                    $hr['4320']= '6 Months';
                    $hr['8760']= 'Every Year';
                    echo '<i class="fa fa-refresh"></i> ' . $hr[$form_filters->send_every];
                }
            ?>
            </td>
            <td><?php echo $eblast['Eblasts']['sales_step']; ?></td>
            <td><?php echo $status; ?></td>
            <td class="center" style="width: 100px;">
                <a href="<?php echo $this->Html->url(array('action'=>'delete',$eblast['Eblasts']['eblasts_id'])); ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
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

<script type="text/javascript">
$(function(){
	$(".pagination a").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				$("#search-result-content").html(data);
			}
		});
		return false;
	});
});
</script>