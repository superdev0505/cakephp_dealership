<?php
    $report_label_array = array(
        '21' =>array('report_name' => 'BDC Appt Report','button_name' =>'Sales Appt','toggle_data_id'=>20),
        '20' =>array('report_name' => 'Sales Appt Report','button_name' =>'BDC Appt','toggle_data_id'=>21)
    );
    $report_label = $report_label_array[$event_type_id];
?>
</br>
</br>
</br>
</br>

<div class="innerLR">
	<!-- col-table -->
    <div class="ajax-loading hide">
		<i class="icon-spinner icon-spin icon-4x"></i>
	</div>

	<div class="widget widget-body-white" style="margin:0px;">
		<div class="widget-body bg-primary">
        	<div class="row">
                <div class="col-md-3">
        		    <h3 style="text-align:center"><?php echo $report_label['report_name']; ?></h3>
                </div>

                <div class="col-md-3" style="width:17% !important">
        			<label style="width:20%;float:left;">From</label>
                    <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
        			    <?php echo $this->Form->input('dms_feed_date_from', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_first_date)))); ?>

        			</div>
                </div>

                <div class="col-md-3" style="width:17% !important">
                 	<input type="hidden" id="event_type_id" value="<?php echo $event_type_id; ?>" />
        			<label style="width:20%;float:left;">To</label>
                    <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
        				<?php echo $this->Form->input('dms_feed_date_to', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_last_date)))); ?>
        			</div>
                </div>

                <div class="col-md-1" style="width:16%">
                    <?php echo $this->Form->select('appt_user_id',$stat_options,array('class' => 'form-control','value' => $selected_user_id)); ?>
                </div>

                <div class="col-md-1">
                   <a href="javascript:void(0)" id="make_search" class="btn btn-inverse">Search</a>
                </div>

                <div class="col-md-2">
                   <a href="javascript:void(0)" id="report_toggle" data-id="<?php echo $report_label['toggle_data_id']; ?>" class="btn btn-success"><?php echo $report_label['button_name']; ?></a>
                   <a href="javascript:void()" class="btn btn-inverse pull-right" id="print_appt_report"><i class="fa fa-print"></i></a>
                </div>

        	</div>
	    </div>
    </div>

	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

	<div class="widget-body" id="main-print-body">

<style>
@media print {
	.no-print{display:none;}
}
</style>
            <h3><?php echo $report_label['report_name']; ?> from date <?php echo date('m/d/Y',strtotime($feed_first_date)); ?> to <?php echo date('m/d/Y',strtotime($feed_last_date)); echo ' ('.count($bdc_appts).')'; ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >

				<!-- Table heading -->
				<thead>
					<tr class="bg-inverse">
                    	<th width="12%" class="no-print">Customer Showed</th>
                    	<th width="5%">ID</th>
						<th width="20%">Name</th>
                        <th width="20%">Phone #s</th>
                        <th width="20%">Email</th>
                        <th width="20%">Salesperson</th>
                        <th width="30%">Vehicle</th>
                        <th width="20%">Source</th>
                        <th width="8%">Appt Title</th>
                        <th width="9%">Start</th>
                        <th width="4%">Details</th>
                        <th width="4%">Appt Status</th>
                        <th width="4%" class="no-print">Action</th>
                    </tr>
				</thead>
                <tbody>
                <?php
				$mobile_array = array();
				$phone_array = array();
				$email_array = array();
				foreach($bdc_appts as $lead){
				?>
                <tr>
                	<td class="no-print">
                    <?php
					if($lead['Event']['customer_showed']) {
					    echo '<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;"></i>&nbsp;Yes';
					}else{
						echo $this->Html->link('Mark Showed','javascript:void(0)',array('class' => 'btn btn-inverse mark_cust_showed no-ajaxify no-print','data-id' => $lead['Event']['id']));
					}
					?>
                    </td>
					<td id="BdcLead_<?php echo $lead['BdcLead']['id']; ?>">
                        <?php
    					if($lead['Event']['status'] != 'Scheduled') {
    					    echo '<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;"></i>&nbsp;';
    					}
    					echo $lead['BdcLead']['id'];
                        ?>
                    </td>
                    <td><?php echo $lead['BdcLead']['first_name']. ' '.$lead['BdcLead']['last_name']; ?></td>
                    <td>
                        <?php
                            echo "Mobile :" .$this->App->phone_no_format($lead['BdcLead']['mobile']);
							echo "<br /> ";
							echo "Phone : ".$this->App->phone_no_format($lead['BdcLead']['phone']);
                        ?>
                    </td>
                    <td style = "width:200px;"><?php echo $lead['BdcLead']['email']; ?></td>
                    <td><?php echo $lead['BdcLead']['sperson']; ?></td>
                    <td><?php echo $lead['BdcLead']['condition'].' '.$lead['BdcLead']['year'].' ',$lead['BdcLead']['make'].' '.$lead['BdcLead']['model']; ?></td>
                    <td><?php echo $lead['BdcLead']['source']; ?></td>
                    <td><?php echo $lead['Event']['title']; ?></td>
                    <td><?php echo date('m/d/Y H:i A',strtotime($lead['Event']['start'])); ?></td>
                    <td><?php echo $lead['Event']['details']; ?></td>
                    <td><?php echo $lead['Event']['status']; ?></td>
                    <td class="no-print">
                    <?php
                        if($this->request->params['prefix'] != 'bdcapp'){
					        echo $this->Html->link('View',array('controller' => 'contacts','action'=>'leads_main','view',$lead['BdcLead']['id']),array('class' => 'btn btn-info'));
					    }
                    ?>
                    </td>

                </tr>
				<?php } ?>
                </tbody>
                </table>
		</div>
	</div>
 </div>

<script type="text/javascript">

function make_search() {
	$to_feed_date = $("#dms_feed_date_to").val();
	$from_feed_date = $("#dms_feed_date_from").val();
	$event_type_id = $("#event_type_id").val();
	$appt_user_id = $("#appt_user_id").val();
	window.location.href = '<?php echo $this->Html->url(array('controller'=>'bdc_leads','action' => 'bdc_appt_report')); ?>/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date+'/event_type_id:'+$event_type_id+'/appt_user_id:'+$appt_user_id ;
}

$script.ready('bundle', function() {

	$("#dms_feed_date_from").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#dms_feed_date_to').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});

	$("#dms_feed_date_to").bdatepicker({
			format: 'yyyy-mm-dd',

		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#dms_feed_date_from').bdatepicker('setEndDate', startDate);
		 $(this).bdatepicker('hide');
	});

	$("#make_search").on('click',function(){
		make_search();
	});

	$("#report_toggle").on('click',function(e){
		e.preventDefault();
		$data_id = $(this).attr('data-id');
		$("#event_type_id").val($data_id);
		make_search();
	});

	$("#appt_user_id").on('change',function(){
		make_search();
	});

	$("#print_appt_report").on('click',function(e){
		e.preventDefault();
		$("#main-print-body").printThis();
	});

	$(".mark_cust_showed").on('click',function(e){
		e.preventDefault();
		data_id = $(this).attr('data-id');
		$obj = $(this);
		$.ajax({
			type:'GET',
			url:'<?php echo $this->Html->url(array('controller' =>'events','action' => 'customer_showed')); ?>/'+data_id,
			success: function(data){
			    $obj.replaceWith('<span><i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;"></i>&nbsp;Yes</span>');
			}
		});
	});

});
</script>
