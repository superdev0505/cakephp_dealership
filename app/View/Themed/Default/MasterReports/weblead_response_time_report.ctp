
	<div class='clearfix'>


		<div class="row">

			<div class="col-md-6">
				<h3 class="text-primary">Weblead Response Report - <?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></h3>
			</div>
			<div class="col-md-4">




			</div>
			<div class="col-md-2 text-right">
				<a class="btn btn-inverse print_btn no-ajaxify"
				onclick='javascript: window.open("<?php echo $this->Html->url(array('controller' => $this->request->params['controller'], 'action' => $this->request->params['action'], 'view_type'=>'print',  '?' =>  $this->request->query));?>");'
				href="javascript:"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>




	</div>
	<div class="separator"></div>


    <h3 class="text-primary">Salesperson Weblead Response Time Report  </h3>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs">
			<thead>
                <tr>
                    <th>Worked Within Combined Dealer</th>
                    <th>Average : <?php echo ($dealer_avg_time[0][0]['ww_avg_min'] >59)?round($dealer_avg_time[0][0]['ww_avg_min']/60,1).' hr':round($dealer_avg_time[0][0]['ww_avg_min'],0).'minutes'; ?></th>
                </tr>
                <tr>
                    <th>Unassigned Leads:</th>
                    <th><?php echo $unassigned_lead_cnt[0][0]['count']; ?></th>
                </tr>
            </thead>
        </table>
		</div>
	</div>

     <h3 class="text-primary">Web Leads Time to Modifed By Sales</h3>
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Total</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs">
		<!-- Table heading -->
                <thead>
                    <tr>
                    <th>Salesperson</th>
                    <th style="background-color:#00c4ff;color:#000;">Not Worked</th>
                    <th style="background-color:#70AD47;color:#000;">WW 5min</th>
                    <th style="background-color:#A9D18D;color:#000;">WW 10min</th>
                    <th style="background-color:#C5E0B2;color:#000;">WW 15min</th>
                    <th style="background-color:#E2EFD9;color:#000;">WW 20min</th>
                    <th style="background-color:#FFF3CB;color:#000;">WW 30min</th>
                    <th style="background-color:#FFCCCC;color:#000;">WW 45min</th>
                    <th style="background-color:#FF9999;color:#000;">WW 60min</th>
                    <th style="background-color:#FF6666;color:#000;">WW 1.5hr</th>
                    <th style="background-color:#FF3333;color:#000;">WW 2hr</th>
                    <th style="background-color:#FF0000;color:#000;">WW 3hr</th>
                    <th style="background-color:#A0A0A0;color:#000;">Over 3hr</th>
                    <th>Average WW Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($webtime_result_data as  $web_result){ ?>
                    <tr>
                        <td><?php echo $web_result['Contact']['sperson']; ?></td>
                        <td><a href ='/master_reports/all_lead_details?filter=1' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result['Contact2']['ww_notworked']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=2' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_5min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=3' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_10min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=4' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_15min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=5' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_20min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=6' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_30min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=7' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_45min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=8' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_60min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=9' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_90min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=10' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_120min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=11' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_180min']; ?></a></td>
                        <td><a href ='/master_reports/all_lead_details?filter=12' class='popup_details no-ajaxify' ref='<?php echo $web_result['Contact']['user_id']; ?>'><?php echo $web_result[0]['ww_200min']; ?></a></td>
                       <th><?php echo ($web_result[0]['ww_avg_min'] >59)?round($web_result[0]['ww_avg_min']/60,1).'hr':round($web_result[0]['ww_avg_min'],0).' minutes'; ?></th>
                    </tr>
                <?php } ?>

                </tbody>


          </table>
		</div>
	</div>




	<?php //debug($deal_registers); ?>

<script>
$(function(){
    var s_date = '';
    var e_date = '';
	 var cb = function(start, end, label) {
        //console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );

        $.ajax({
			type: "GET",
			cache: false,
			url: "/master_reports/weblead_response_time_report?start_date="+start.format('YYYY-MM-DD')+"&end_date="+ end.format('YYYY-MM-DD'),
			success: function(data){
        		$('#report_data_container').html(data);

			}
		});



      }


	var optionSet1 = {
        startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
       endDate: '<?php echo date("m/d/Y",strtotime($e_date)); ?>',
       // minDate: '19/08/2016',
        maxDate: '<?php echo date("m/d/Y"); ?>',
        <?php if($report_limit == 'On'){ ?>
        dateLimit: { days: 60 },
        <?php }else{ ?>
        	dateLimit: { days: 365 },
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
	// $('#reportrange').daterangepicker(optionSet1, cb);




	$(".realtime_stat_details").click(function(e){
		e.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});

	});



	$(".popup_details").click(function(e){
		e.preventDefault();
        //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var start = $("#startDate").val();
        var end = $("#endDate").val();
        var user_id = $(this).attr('ref');
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href')+"&start_date="+start+"&end_date="+end+'&user_id='+user_id,
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});

	});


	$("#master_report_type_s").change(function(event){
		if( $(this).val() == 'index'){
			//data_id=$("#LeadGroupStat").attr('data-id');
			//group=$("#LeadGroupStat").val();
			/*if(data_id!='dealership')
			{
				group='all_builds';
			}*/
			$.ajax({
				type: "POST",
				cache: false,
				url:  "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'index')) ?>/index/",
				success: function(data){
					$("#report_data_container").html(data);
				}
			});

		}

	});

	$(".popup").click(function(event){

		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Report",
				});
			}
		});

	});


});

</script>
