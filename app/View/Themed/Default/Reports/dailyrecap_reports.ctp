<?php
if($layout=='yes'){
?>
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/css/daterangepicker-bs3.css?v=2" />
</br>
</br>
</br>
</br>
<?php
}
?>
<div class="innerLR">
	<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
	<?php 
	if($dealer_info['DealerName']['dealer_group']) {
	 $dealer_names['all_builds']='All Group';
	
	echo $this->Form->input('dealer_group'.$label,array('class'=>'form-control','id'=>'LeadGroupStat','options'=>$dealer_names,'value'=>$show_group,'label'=>false,'div'=>false,'style'=>'max-width:22%!important;display:initial;')); 
	 echo '<br/><br />';
	//echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> Group Stats',array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'style'=>'display:none;','data-id'=>'dealership')); 
	 }?>
		<i class="fa fa-bar-chart-o"></i> Select Report
		&nbsp;<select name="report_table" class="form-control input-sm" id="select_report" style="width: 175px; display: inline-block">
				<option value="" selected="selected">Select Report</option>
				<option selected="selected" value="all">All</option>
				<option value="step_logs">Showroom Leads</option>
				<option value="closed">Closed</option>
				<option value="sold">Sold</option>
				<option value="web_leads">Web Leads</option>
				<option value="email_open">Email (Open)</option>
				<!-- <option value="note_updates">Note Update (Open)</option> -->
				<option value="new_inbound_phone_calls">New Inbound/Outbound Phone Calls </option>
				<option value="existing_outbound_phone_calls">Existing Inbound/Outbound Phone Calls</option>
                                <!-- <option value="bdc">BDC Survey</option> 
                                <option value="events">Events</option> -->
			</select>
			<input type="hidden" id="startDate" name="startDate" value="<?php echo $s_date;?>">
			<input type="hidden" id="endDate" name="endDate" value="<?php echo $e_date;?>">
			
&nbsp;&nbsp;&nbsp;
			Period: <div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
		<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
		<span><a href="javascript:void(0)" onclick="PopulateDatePicker();">
		<?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span> <b class="caret"></b>
		</a>
		
		</div>
		
		&nbsp;&nbsp;&nbsp;
		
		<?php 
								
		
			echo $this->Form->select('user_id', $stat_options, array('value'=>$selected_stats, 'empty' => false, 'style'=>"display: inline-block;width: auto;")); 
		
		?>
		
		
		
		
	<div style="float:right"><input type="button" name="export" value="Export to XLS" onclick="return ExportToXLS()" class="btn btn-primary" /><a href="javascript:void()" id="print_daily_recap" class="btn btn-inverse"><i class="fa fa-print"></i></a> </div> 
    
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


</div>

<script>

$print_css = '<style>@media print {.no-print{display:none;}#report_data_container{width: 1100px; margin:0 auto;}.pagination>li.current{display:none;}.pagination>li.disabled{display:none;}.print-auto-width{width:auto;}table.table-striped{border :1px solid #e2e1e1;}#report_data_container>div{padding:0px!important;}	h3.text-primary{font-size:20px;}}</style>';
function ExportToXLS(){
	if($("#select_report").val()!=''){
		var url = "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+  "/"   +$("#user_id").val() +    "/"+$("#startDate").val()+"/"+$("#endDate").val()+"/export";
		window.open(url, '_blank');
	}
}
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
		$("#select_report").change(function(){
			$("#report_data_container").html("");
			if($(this).val() != ""){
				var url = "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$(this).val()+"/" +$("#user_id").val()+"/"   +$("#startDate").val()+"/"+$("#endDate").val();
				if(url!=''){
					$.ajax({
						type: "POST",
						cache: false,
						url:  url,
						success: function(data){
							$("#report_data_container").html($print_css+data);
						}
					});
				}
			}
		});


	$("#print_daily_recap").on('click',function(e){
		e.preventDefault();
		$("#report_data_container").printThis();		
		});

	$("#user_id").change(function(){
			$("#report_data_container").html("");
			if($(this).val() != ""){
				var url = "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+"/" +$("#user_id").val()+"/"   +$("#startDate").val()+"/"+$("#endDate").val();
				if(url!=''){
					$.ajax({
						type: "POST",
						cache: false,
						url:  url,
						success: function(data){
							$("#report_data_container").html($print_css+data);
						}
					});
				}
			}
		});

		
		
		$("#stats_monthMonth").change(function(event){
			location.href = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'main_reports')); ?>/"+$(this).val();
		});
	
		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
	<?php if($dealer_info['DealerName']['dealer_group']) {?>
	
			$("#LeadGroupStat").on('change',function(e){
						/*e.preventDefault();
						data_id=$(this).attr('data-id');*/
						group=$(this).val(); 
						action=$("#select_report").val();
						
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
				$("#report_data_container").html("");
				var url = "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+"/" +$("#user_id").val()+"/"   +$("#startDate").val()+"/"+$("#endDate").val();
				if(url!=''){
					$.ajax({
						type: "POST",
						cache: false,
						url:  url,
						data:{show_group:group},
						success: function(data){
							$("#report_data_container").html($print_css+data);
						}
					});
				}
								
													
			});
	
	<?php } ?>
	
});


</script>

<script type="text/javascript">
// $script.ready(['core', 'plugins_dependency', 'plugins'], function(){

// });
</script>

<script>

function PopulateDatePicker() {

	
		
		//moment().tz("America/Los_Angeles");
		//var zone = "America/Los_Angeles";	
		// moment().tz("America/Los_Angeles").format();
		var selReport = $("#select_report").val();

	 var cb = function(start, end, label) {
      //  console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		if($("#select_report").val()!=''){
			$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+"/"+ $("#user_id").val()+"/" +    start.format('YYYY-MM-DD')+"/"+ end.format('YYYY-MM-DD'),
				success: function(data){
					$('#report_data_container').html($print_css+data);
					$("#startDate").val(start.format('YYYY-MM-DD'));
					$("#endDate").val(end.format('YYYY-MM-DD'));
				
				}
			});
		}


        
      }

	 var optionSet1 = {
            startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
           endDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
            minDate: '01/01/2000',
            maxDate: '12/31/<?php echo date('Y'); ?>',
            <?php if($report_limit == 'On'){ ?>
            dateLimit: { days: 60 },
            <?php } ?>
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

	// $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

	 $('#reportrange').daterangepicker(optionSet1, cb);

	 

	
	


}
		



	
	$("#report_data_container").html("");
	if($("#select_report").val() != ""){
		var url = "<?php echo $this->Html->url(array('controller'=>'daily_recaps','action'=>'index')); ?>/"+$("#select_report").val()+"/" +$("#user_id").val()+"/" +$("#startDate").val()+"/"+$("#endDate").val();
		if(url!=''){
			$.ajax({
				type: "POST",
				cache: false,
				url:  url,
				success: function(data){
					$("#report_data_container").html($print_css+data);
				}
			});
		}
	}
	

</script>
