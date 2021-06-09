<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}

</style>
</br>
</br>
</br>
</br>

<div class="innerLR">
	<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
	
		<i class="fa fa-bar-chart-o"></i> Select Report
		&nbsp;<select name="report_table" class="form-control input-sm" id="select_report" style="width: 175px; display: inline-block">
				<option value="" selected="selected">Select Report</option>
				<option value="master_report">Master Report</option>
                <option value="garage_report">Garage Report</option>
             
                <option value="weblead_response_time_report">Weblead Response Report</option>
				
				<option value="lead_source">Lead Source</option>
				<option value="sales_person">Sales Person Open/Close</option>
				
			<!--	<option value="lead_type">Lead Type</option>
				<option value="lead_visits">Lead Visits</option>-->
				
				<option value="lead_calls"> Leads Calls In/Out</option>
				
				<!--<option value="lead_update_satus">Lead Update Satus</option>-->
				
				<option value="lead_closed_deals">Closed Deals</option>
				<option value="lead_appointments">Lead Appointments</option>
				<!--<option value="lead_steps">Lead Steps Sperson</option>-->
				<option value="lead_appointments_event">Leads Step Detail</option>
				<option value="leads_detail">Events Status</option>
               <!-- <option value="bdc_survey_report">Bdc Survey Report</option>-->
				
			</select>


			<input type="hidden" id="startDate" name="startDate" value="<?php echo $s_date;?>">
			<input type="hidden" id="endDate" name="endDate" value="<?php echo $e_date;?>">

			Period: 
			<div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
				<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
				<span><a href="javascript:void(0)" onclick="PopulateDatePicker();">
				<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span> <b class="caret"></b>
				</a>
			</div>


			

			
			
            
 <?php
	 if($dealer_info['DealerName']['dealer_group']) {
	 $dealer_names['all_builds']='All Group';
	echo $this->Form->input('dealer_group'.$label,array('class'=>'form-control pull-right','id'=>'LeadGroupStat','options'=>$dealer_names,'value'=>$group,'label'=>false,'div'=>false,'style'=>'max-width:22%!important;display:none;')); 
	//echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> Group Stats',array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'data-id'=>'dealership')); 
	 }
	?>
	<div class="export-xls" style="float:right;display:none;"><input type="button" name="export" value="Export to XLS" onclick="return ExportToXLS()" class="btn btn-primary" /><a href="javascript:void()" id="print_daily_recap" class="btn btn-inverse"><i class="fa fa-print"></i></a></div> 
	
	</h4>
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
			<div id="report_data_container">
			
			
			
			
			
			</div>
		</div>

	</div>

	<!-- // Widget END -->

<script>
$print_css = '<style>#report_data_container{width:1100px;} tr{border:1px solid #e2e1e1;} td{text-align:center;}#report_data_container div{padding:0px!important;} div.widget{margin:0 auto 24px;} h3.text-primary{font-size:20px;color:#3695d5;margin:0 0 5px;}}</style>';
function ExportToXLS(){
	if($("#select_report").val()!=''){
	var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('report_data_container');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    var a = document.createElement('a');
    a.href = data_type + ', ' + table_html;
    a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
    a.click();
	}
}

function load_report(){
	var start_date = $("#startDate").val();
	var endDate = $("#endDate").val();


	if($("#select_report").val() == 'lead_source'){
		$(".export-xls").show();
	}
	else {
		$(".export-xls").css("display","none");
	}
	$("#report_data_container").html("");
	$("#LeadGroupStat").hide();
	switch_mode();

	if($("#select_report").val() != ""){
		if( $("#select_report").val() == 'master_report' ){
			var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_report_allsteps')); ?>?start_date="+start_date+"&end_date="+endDate;
		}
		else if( $("#select_report").val() == 'garage_report' ){
			var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_garage_report')); ?>?start_date="+start_date+"&end_date="+endDate;
		}
		else if( $("#select_report").val() == 'weblead_response_time_report' ){
			var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'weblead_response_time_report')); ?>?start_date="+start_date+"&end_date="+endDate;
		}
		else{
			var url = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>/"+$("#select_report").val()+"?start_date="+start_date+"&end_date="+endDate;
		}
		action=$("#select_report").val();
		$.ajax({
			type: "POST",
			cache: false,
			url:  url,
			success: function(data){
				$("#report_data_container").html($print_css+data);
				<?php if($dealer_info['DealerName']['dealer_group']) {?>
				
				$("#LeadGroupStat").show();
				
				<?php } ?>
			}
		});
	}


}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	


		
	
		$("#select_report").change(function(){

			load_report();
			
			/*
			if($(this).val() == 'lead_source'){
	  			$(".export-xls").show();
			}
			else {
				$(".export-xls").css("display","none");
			}
			$("#report_data_container").html("");
			$("#LeadGroupStat").hide();
			switch_mode();
			if($(this).val() != ""){
				if( $(this).val() == 'master_report' ){
					var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_report_allsteps')); ?>?stat_year="+$("#stats_year").val();
				}
				else if( $(this).val() == 'garage_report' ){
					var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_garage_report')); ?>?stat_year="+$("#stats_year").val();
				}
				else if( $(this).val() == 'weblead_response_time_report' ){
					var url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'weblead_response_time_report')); ?>?stat_year="+$("#stats_year").val();
				}
				else{
					var url = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>/"+$(this).val()+"?report_year="+$("#stats_year").val();
				}
				action=$(this).val();
				$.ajax({
					type: "POST",
					cache: false,
					url:  url,
					success: function(data){
						$("#report_data_container").html($print_css+data);
						<?php if($dealer_info['DealerName']['dealer_group']) {?>
						
						$("#LeadGroupStat").show();
						
						<?php } ?>
					}
				});
			}
			*/
		});
		
		// $("#stats_monthMonth").change(function(event){
		// 	location.href = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>/"+$("#stats_monthMonth").val()+"/"+$("#stats_year").val();
		// });
		// $("#stats_year").change(function(event){
		// 	location.href = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>/"+$("#stats_monthMonth").val()+"/"+$("#stats_year").val();
		// });
		
		<?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#LeadGroupStat").on('change',function(e){
						//e.preventDefault();
						//data_id=$(this).attr('data-id');
						group=$(this).val(); 
						action=$("#select_report").val();
						if(action =='master_report')
						{
							action='master_report_allsteps';
						}
						/*if(data_id=='dealership')
						{
							group='all_builds';
							$(this).html('<i class="fa fa-bar-chart-o"></i> Dealership Stats');
							$(this).attr('data-id','group');
						}else
						{
							$(this).html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
							$(this).attr('data-id','dealership');
						}*/
						
						if(action == 'master_report_allsteps')
						{
							url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_report_allsteps')); ?>/"+group;
						}
						else if(action == 'garage_report')
						{
							url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'master_garage_report')); ?>/"+group;
						}else if(action == 'weblead_response_time_report')
						{
							url = "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'weblead_response_time_report')); ?>/"+group;
						}
						else
						{
							url = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>/"+action+'/'+group;
						}
						
						$("#report_data_container").html('');	
						show_group_stats(url);
								
													
			});
	
	<?php } ?>
	
		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
	
	
});
$("#print_daily_recap").on('click',function(e){
		e.preventDefault();
		$("#report_data_container").printThis();		
		});
function switch_mode()
{
		$("#LeadGroupStat").val('<?php echo AuthComponent::user('dealer_id'); ?>');
	//$("#LeadGroupStat").html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
	//$("#LeadGroupStat").attr('data-id','dealership');
}
function show_group_stats(url)
{
	
	$.ajax({
					type: "POST",
					cache: false,
					url:  url,
					success: function(data){
						$("#report_data_container").html($print_css+data);
						<?php if($dealer_info['DealerName']['dealer_group']) {?>
						$("#LeadGroupStat").show();
						<?php } ?>
					}
		});
}






function PopulateDatePicker() {

	var selReport = $("#select_report").val();

	var cb = function(start, end, label) {
	 	// console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
		$("#startDate").val(start.format('YYYY-MM-DD'));
		$("#endDate").val(end.format('YYYY-MM-DD'));
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

		load_report();

		// if($("#select_report").val()!=''){
			// $.ajax({
			// 	type: "GET",
			// 	cache: false,
			// 	url: "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+"/"+ $("#user_id").val()+"/" +    start.format('YYYY-MM-DD')+"/"+ end.format('YYYY-MM-DD'),
			// 	success: function(data){
			// 		$('#report_data_container').html($print_css+data);
			// 		$("#startDate").val(start.format('YYYY-MM-DD'));
			// 		$("#endDate").val(end.format('YYYY-MM-DD'));
				
			// 	}
			// });
		// }

	}

	 var optionSet1 = {
           startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
           endDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
            minDate: '01/01/2000',
            maxDate: '12/31/<?php echo date('Y'); ?>',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
               'Last 7 Days': [moment().subtract('days', 6), moment()],
               'Last 30 Days': [moment().subtract('days', 29), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
          };


	 $('#reportrange').daterangepicker(optionSet1, cb);
}
		








</script>

</div>

<script type="text/javascript">
$script.ready(['core', 'plugins_dependency', 'plugins'], function(){




});
</script>
