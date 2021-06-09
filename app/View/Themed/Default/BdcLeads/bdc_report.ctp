</br>
</br>
</br>
</br>
<style>
.ajax-loading {
    background: none repeat scroll 0 0 rgba(255, 255, 255, 0.9);
    bottom: 0;
    left: 1px;
    position: absolute;
    right: 0;
    text-align: center;
    top: 0;
    z-index: 2;
}
.hide {
    display: none !important;
}
</style>
<div class="innerLR">
	<!-- col-table -->
    <div class="ajax-loading hide">
		<i class="icon-spinner icon-spin icon-4x"></i>
	</div>
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
    <input type='hidden' name='s_d_range' value='<?php echo $s_date; ?>' id = 's_d_range'>
	<input type='hidden' name='e_d_range' value='<?php echo $e_date; ?>' id = 'e_d_range'>

	
		<i class="fa fa-bar-chart-o"></i> Select Report
		&nbsp;<select name="report_table" class="form-control input-sm" id="select_report" style="width: 175px; display: inline-block">
				<option value="" selected="selected">Select Report</option>
                <option value="bdc_survey_report">Survey Report Detail</option>
                <option value="sales_person_report">BDC Sales Staff Report</option>
                <option value="bdc_rep_report">BDC CSR Report</option>
                <option value="lead_score_report">Lead Score Report</option>
                <option value="bdc_email_update">BDC Email Report</option>
                 <option value="customer_status_report">Customer Status Report</option>	
							
			</select>
			

			
			Period: 
			<div id="bdc_reportrange" class=""  style="display:inline-block;background: #fff; cursor: pointer; padding: 1px 10px; border: 1px solid #ccc; margin-right: 25px; margin-bottom: 4px;color:#000;">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                <span style="font-size:14px;"><?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span> 
                <b class="caret"></b>	
			</div>
			<?php //echo $this->Form->month('stats_month', array('class'=>"form-control input-sm", 'style'=>"width: 175px; display: inline-block", 'empty'=>false, 'value'=>$stats_month)); ?>
	 <?php //echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> Group Stats',array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'style'=>'display:none;','data-id'=>'dealership')); ?>
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
function showStatusChart(data,div_id){

		
			var glacier = JSON.parse(data);
			var data = [];
			var i = 0;
			$.each(glacier[0], function(s, t) {
				data[i] = { label: '"'+t[0]+'"', data:t[1]};
							 i++;
	
			});
			// GRAPH 5
			$.plot($(div_id), data, 
			{
				series: {
					pie: { 
						show: true,
						radius: 3/4,
						label: {
							show: true,
							radius: 3/4,
							formatter: function(label, series){
								return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
							},
							background: { 
								opacity: 0.5,
								color: '#000'
							}
						}
					}
				},
				legend: {
					show: false
				}
			});
					  
		
	}
$script.ready('bundle', function() {




	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
		$("#select_report").change(function(){
											
			$("#LeadGroupStat").hide();
			$("#report_data_container").html("");
			switch_mode();
			if($(this).val() != ""){
				
					var url = "/bdc_leads/"+$(this).val();
					action=$(this).val();
				<?php if($dealer_info['DealerName']['dealer_group']) {?>
				
					$("#LeadGroupStat").show();
					
				
				<?php }?>
				$('.ajax-loading').removeClass('hide');
				$.ajax({
					type: "GET",
					cache: false,
					url:  url,
					success: function(data){
						$('.ajax-loading').addClass('hide');
						$("#report_data_container").html(data);
						if(action=='sales_person_report'||action=='bdc_rep_report')
						{
							jsonRes=$("div#top_status_json_data").text();
							showStatusChart(jsonRes,"#status_piechart");
						}else if(action=='lead_score_report'){
							
							jsonRes=$("div#top_source_json_data").text();
							showStatusChart(jsonRes,"#status_piechart");
							jsonRes=$("div#top_crm_status_json_data").text();
							showStatusChart(jsonRes,"#l_crm_piechart");
							jsonRes=$("div#top_score_json_data").text();
							showStatusChart(jsonRes,"#lead_score_piechart");
							jsonRes=$("div#top_crm_sources_json").text();
							showStatusChart(jsonRes,"#crm_sources_piechart");
							jsonRes=$("div#lead_source_json_data").text();
							showStatusChart(jsonRes,"#lead_source_piechart");
							
						}
					}
				});
			}
		});
		
		$("#stats_monthMonth").change(function(event){
			location.href = "/bdc_leads/bdc_report/"+$(this).val();
		});
		
		$('body').on('click','#print-dealership-report',function(e){
			e.preventDefault();
			$("#report_data_container").printThis();
			});
		
	<?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#LeadGroupStat").on('click',function(e){
						e.preventDefault();
						data_id=$(this).attr('data-id');
						group='null'; 
						if(data_id=='dealership')
						{
							group='all_builds';
							$(this).html('<i class="fa fa-bar-chart-o"></i> Dealership Stats');
							$(this).attr('data-id','group');
						}else
						{
							$(this).html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
							$(this).attr('data-id','dealership');
						}
					$("#report_data_container").html('');	
					load_lead_score_report(group,20);
								
													
			});
			
<?php } ?>


	 var bdc_range_cb = function(start, end, label) {
        console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#bdc_reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );
		
		location.href = "/bdc_leads/bdc_report/start_date:"+start.format('YYYY-MM-DD')+"/end_date:"+end.format('YYYY-MM-DD');
       
      }

	// $(".modal-title").replaceWith('');

	 var optionSet1 = {
            startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
           endDate: '<?php echo date("m/d/Y",strtotime($e_date)); ?>',
            minDate: '01/01/2012',
            maxDate: '<?php echo date("m/d/Y"); ?>',
            dateLimit: { days: 90 },
            showDropdowns: true,
            timePicker12Hour: true,
            ranges: {
               'Today': [moment(), moment()],
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
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

	// $('#bdc_reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

	 $('#bdc_reportrange').daterangepicker(optionSet1, bdc_range_cb);



		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

function switch_mode()
{
	$("#LeadGroupStat").html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
	$("#LeadGroupStat").attr('data-id','dealership');
}

function load_lead_score_report(group,limit)
{
	action=$("#select_report").val();
	if(action=='lead_score_report')
	url='/bdc_leads/'+action+'/'+group+'/'+limit;
	else
	url='/bdc_leads/'+action+'/'+group;
					$('.ajax-loading').removeClass('hide');
					$.ajax({
					type: "GET",
					cache: false,
					url:  url,
					success: function(data){
						$("#report_data_container").html(data);
							$('.ajax-loading').addClass('hide');					
							if(action=='sales_person_report'||action=='bdc_rep_report')
						{
							jsonRes=$("div#top_status_json_data").text();
							showStatusChart(jsonRes,"#status_piechart");
						}else if(action=='lead_score_report'){
							
							jsonRes=$("div#top_source_json_data").text();
							showStatusChart(jsonRes,"#status_piechart");
							jsonRes=$("div#top_crm_status_json_data").text();
							showStatusChart(jsonRes,"#l_crm_piechart");
							jsonRes=$("div#top_score_json_data").text();
							showStatusChart(jsonRes,"#lead_score_piechart");
							jsonRes=$("div#top_crm_sources_json").text();
							showStatusChart(jsonRes,"#crm_sources_piechart");
							jsonRes=$("div#lead_source_json_data").text();
							showStatusChart(jsonRes,"#lead_source_piechart");
							
						}
							
						
					}
				});				
}
</script>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






</div>

<script type="text/javascript">
$script.ready(['core', 'plugins_dependency', 'plugins'], function(){




});
</script>
