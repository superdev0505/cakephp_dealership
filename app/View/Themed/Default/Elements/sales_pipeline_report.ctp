
	<div class="innerB">
	
	</div>
	<div class="row">
		<div class="col-md-12">
			Month: <?php echo $this->Form->month('stats_month', array('class'=>"form-control input-sm", 'style'=>"width: 175px; display: inline-block", 'empty'=>false, 'value'=>$stats_month)); ?>
            <?php 
	if($dealer_info['DealerName']['dealer_group']) {
		$label='Group Stats';
		$mode='dealership';
		if($group=='all_builds')
		{
			$label='Dealership Stats';
			$mode='group';
		}
	echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> '.$label,array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'data-id'=>$mode)); 
	}?>
			<div class="separator"></div>
		</div>
	</div>
	<!-- row -->
	<div class="row">
		<!-- col -->
		<div class="col-md-3">
			<div class="widget">
				<div class="widget-head">	
					<h4 class="heading">Metrics</h4>
					<i class="innerT half fa fa-fw fa-bar-chart-o text-primary pull-right"></i> 
					<div class="clearfix"></div>
				</div>
				<div class="widget-body padding-none">	
					<div id="metrics">
					
					</div>
				</div>
			</div>

			<div class="widget widget-body-gray">
				<div class="widget-body">
					<div class="innerAll text-center">
						
						<div id="transactions_value">
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- // END col -->

		<!-- col -->
		<div class="col-md-9">
			<div class="widget">
				<div class="widget-head height-auto ">
					<div class="innerAll">
						<h4 class="margin-none innerT half  pull-left"><i class="fa fa-fw fa-shield text-primary"></i> Transactions</h4>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="widget-body">
					<div class="col-app">
						<div id="chart_metrics"></div>
					</div>
				</div>
				
				
	<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
		
	$("#stats_monthMonth").change(function(event){
		location.href = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'sales_pipeline_reports')); ?>/"+$("#stats_monthMonth").val();
	});
		
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	url1="<?php echo $this->Html->url(array('controller'=>'reports5','action'=>'lead_unit_value',0,$group)); ?>";
	url2="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'pipeline_reports_data')); ?>/"+$("#stats_monthMonth").val()+"/<?php echo $group; ?>";
 allCharts(url1,url2);
 
 <?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#LeadGroupStat").on('click',function(e){
						e.preventDefault();
						data_id=$(this).attr('data-id');
						group='null'; 
						
						
						if(data_id=='dealership')
						{
							group='all_builds';
							
						}
						location.href = "<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'reports')); ?>/"+$("#stats_monthMonth").val()+"/"+group;
						
						//$("#report_data_container").html('');	
						//allCharts(rurl1,rurl2);
								
													
			});
	
	<?php } ?>
	

});



</script>