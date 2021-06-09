<br><br><br><br>

<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}
.chart_container{
	position:  relative;
}
.legend table{
	top: initial !important;
	/* right: 36px !important; */
	left: 265px !important;
	text-align: left;
}
</style>


<div class='innerLR'>


<?php 
//debug($report_data);
foreach($report_data as $key=>$value){ 
?>

<!-- Direct leads start -->
<div class="widget widget-body-white">
	<div class="widget-head">
		
		<div class='row'>
			<div class='col-md-6'>
				<h4 class="heading"><?php echo $value['dealer']; ?> | Sold Percentage: <?php  echo $value['stat']['sold_percentage']; ?>%</h4>
			</div>
			<div class='col-md-6 text-right'>
				Last Refresh: <?php echo $value['last_refresh']; ?> 
				<button class='btn btn-inverse btn-xs cache_refresh' data-zone = '<?php echo $value['zone']; ?>'   data-dealer_id = '<?php echo $value['dealer_id']; ?>' > <i class="fa fa-refresh"></i> Refresh</button>
			</div>
		</div>

	</div>
	<div class="widget-body">
		<div class="row">
			<div class="col-md-12">
				<h4><?php echo $today_label; ?></h4>
				<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main"
				 style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
					<!-- Table heading -->
					<thead>
					<tr class='bg-primary'>
						<th>Open</th>
						<th>Closed</th>
						<th>Sold</th>
						<th>Pending</th>
						<th>Today (Events)</th>
						<th>Todays New Leads</th>
					</tr>
					</thead>
					<tbody>
					<tr class="gradeA">
						<td><strong><?php echo $value['stat']['report_data']['open_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['closed_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['today_sold_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['pending_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['today_event_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['today_lead_count']; ?></strong></td>
					</tr>
					</tbody>
				</table>

				<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main"
				 style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
					<!-- Table heading -->
					<thead>
					<tr class='bg-primary'>
						<th>New Inbound</th>
						<th>New Outbound</th>
						<th>MGR Message</th>
						<th>Existing In</th>
						<th>Existing Out</th>
					</tr>
					</thead>
					<tbody>
					<tr class="gradeA">
						<td><strong><?php echo $value['stat']['report_data']['new_inbound_day']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['new_outbound_day']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['msgr_day']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['existing_inbound_day']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['existing_outbound_day']; ?></strong></td>
					</tr>
					</tbody>
				</table>


				 

				<br>
				<h4><?php echo $month_label; ?></h4>
				<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main"
				 style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
					
					<thead>
					<tr class='bg-inverse'>
						<th>Open</th>
						<th>Closed</th>
						<th>Sold</th>
						<th>Pending</th>
						<th>Dormant (48 Hrs)</th>
						<th>Overdue (Events)</th>
					</tr>
					</thead>
					<tbody>
					<tr class="gradeA">
						<td><strong><?php echo $value['stat']['report_data']['month_open_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['month_closed_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['sold_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['month_pending_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['dormant_lead_count']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['over_due_events']; ?></strong></td>
					</tr>
					</tbody>
				</table>

				<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main"
				 style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
					<!-- Table heading -->
					<thead>
					<tr class='bg-inverse'>
						<th>New Inbound</th>
						<th>New Outbound</th>
						<th>MGR Message</th>
						<th>Existing In</th>
						<th>Existing Out</th>
					</tr>
					</thead>
					<tbody>
					<tr class="gradeA">
						<td><strong><?php echo $value['stat']['report_data']['new_inbound_month']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['new_outbound_month']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['msgr_month']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['existing_inbound_month']; ?></strong></td>
						<td><strong><?php echo $value['stat']['report_data']['existing_outbound_month']; ?></strong></td>
					</tr>
					</tbody>
				</table>


				

				<br>
				<br>
				<br>
				<div class='row'>	
					<div class='col-md-4'>
						<div id="<?php echo $key; ?>_vendor_piechart" class='chart_container' style="display: inline-block;	width:300px;	height:300px;"></div>
					</div>
					<div class='col-md-4'>
						<div id="<?php echo $key; ?>_leadtype_piechart" class='chart_container' style="display: inline-block;	width:300px;	height:300px;"></div>
					</div>
					<div class='col-md-4'>
						<div id="<?php echo $key; ?>_steps_piechart" class='chart_container' style="display: inline-block;	width:300px;	height:300px;"></div>
					</div>
				</div>








				

			</div>	
		</div>
	</div>
</div>
<!-- Direct leads ends -->

<?php } ?>









<?php 
	//debug($report_data);
	//debug($total_percentage_vendor);
	echo $this->element('sql_dump');
?>




</div>


<script type="text/javascript">

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".cache_refresh").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/manage_cache/refresh_main_report_cache",
			data: {'dealer_id': $(this).attr('data-dealer_id'), 'zone': $(this).attr('data-zone')},
			success: function(data){
				location.reload();
			}
		});


	});





<?php foreach($report_data as $key1=>$value1){ ?>

	// Vendor graph
	var data = [<?php foreach($value1['stat']['total_percentage_vendor'] as $key=>$value){ echo "{data: $value, label : '$key'}," ; }; ?>];
	console.log(data);
	$.plot( $("#<?php echo $key1; ?>_vendor_piechart"), data, {
		series: {
			pie: { 
				show: true,
				radius: 3/4,
				label: {
					show: false,
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
			show: true, backgroundOpacity: 0,
			labelFormatter: function(label, series){
				return ''+label+' '+Math.round(series.percent)+'%';
			}

		}
	});

	// lead graph
	var data = [<?php foreach($value1['stat']['total_percentage_lead_type'] as $key=>$value){ echo "{data: $value, label : '$key'}," ; }; ?>];
	console.log(data);
	$.plot( $("#<?php echo $key1; ?>_leadtype_piechart"), data, {
		series: {
			pie: { 
				show: true,
				radius: 3/4,
				label: {
					show: false,
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
			show: true, backgroundOpacity: 0,
			labelFormatter: function(label, series){
				return ''+label+' '+Math.round(series.percent)+'%';
			}

		}
	});


	// steps graph
	var data = [<?php foreach($value1['stat']['total_percentage_steps'] as $key=>$value){ echo (strpos($key, 'Sold') === 0) ?  "{color: 'green', data: $value, label : '$key'},"  :       "{data: $value, label : '$key'}," ; }; ?>];
	console.log(data);
	$.plot( $("#<?php echo $key1; ?>_steps_piechart"), data, {
		series: {
			pie: { 
				show: true,
				radius: 3/4,
				label: {
					show: false,
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
			show: true, backgroundOpacity: 0,
			labelFormatter: function(label, series){
				return ''+label+' '+Math.round(series.percent)+'%';
			}

		}
	});

	<?php } ?>
	
	


		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});




</script>






















