<style>
@media print {
	.no-print{display:none;}
	}
</style>

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
		<h3 style="text-align:center">Source/Make/Model Stats</h3>
      </div>
      <div class="col-md-3" style="width:17% !important">
						<label style="width:20%;float:left;">From</label>
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_from', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_first_date))));

								?>

							</div>
                            </div>
         			<div class="col-md-3" style="width:17% !important">
         				<input type="hidden" id="event_type_id" value="<?php echo $event_type_id; ?>" />
						<label style="width:20%;float:left;">To</label>
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_to', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_last_date))));

								?>

							</div>
                    </div>
                    <div class="col-md-1">
                    <label style="width:60%;display:inline;"> Records</label>
                    <?php
					$limit_options = array(30 => 30, 50 => 50,100 => 100);
					echo $this->Form->select('limit',$limit_options,array('class' => 'form-control','value' => $rec_limit,'style' => 'width:40%;display:inline;'));
					 ?>
                    </div>
                   <div class="col-md-1">
                   	<a href="javascript:void(0)" id="make_search" class="btn btn-inverse">Search</a>
                   </div>
                   <div class="col-md-2">

                   	<a href="javascript:void()" class="btn btn-inverse pull-right" id="print_appt_report"><i class="fa fa-print"></i></a>

                   	<button id="btn-csv-export" class="btn btn-warning btn-sm" type="button">
						<i class="fa fa-download"></i> CSV Export
					</button>


                   </div>
						</div>
	</div></div>

	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body" id="main-print-body">

            <h3>Source/Make/Model Stats from date <?php echo date('m/d/Y',strtotime($feed_first_date)); ?> to <?php echo date('m/d/Y',strtotime($feed_last_date));  ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >

				<!-- Table heading -->
				<thead>
					<tr class="bg-inverse">
                    	<th>Source</th>
						<th>Make</th>
                        <th>Model</th>
                        <th>Lead Count</th>
                    </tr>
				</thead>
                <tbody>
                <?php foreach($source_stats as $lead): ?>
                    <tr>
                        <td><?php echo $lead['Contact']['source']; ?></td>
                        <td><?php echo $lead['Contact']['make']; ?></td>
                        <td><?php echo $lead['Contact']['model']; ?></td>
                        <td class="text-primary"><?php echo $lead['0']['st_lead_count']; ?></td>
                    </tr>
    			<?php endforeach; ?>
                </tbody>
            </table>

		</div>

	</div>
 </div>
<script type="text/javascript">

function make_search()
{
	$to_feed_date = $("#dms_feed_date_to").val();
	$from_feed_date = $("#dms_feed_date_from").val();
	$limit = $("#limit").val();
	window.location.href = '<?php echo $this->Html->url(array('controller'=>'reports','action' => 'source_stat_report')); ?>/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date+'/limit:'+$limit;
}

$script.ready('bundle', function()
{
	$("#btn-csv-export").click(function(){
		$to_feed_date = $("#dms_feed_date_to").val();
		$from_feed_date = $("#dms_feed_date_from").val();
		$limit = $("#limit").val();
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'reports','action' => 'source_stat_report_export')); ?>/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date+'/limit:'+$limit;
	});

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

	$("#limit").on('change',function(){
		make_search();
	});

	$("#print_appt_report").on('click',function(e){
		e.preventDefault();
		$("#main-print-body").printThis();
	});

});
</script>
