<style>
.legend table{
	top: initial !important;
	/* right: 36px !important; */
	left: -200px !important;
	text-align: left;
}
</style>
</br></br></br></br>
<div class="innerLR">
	<!-- col-table -->
			<div class="col-table">
		
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-bar-chart-o"></i> Select Leads Drop-Down(s) Graphs</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

<!-- Simple chart -->
<div class="widget widget-heading-simple widget-body-gray">
<!-- Widget heading -->
<div class="widget-head">

<div class="piechart-drop-head">
</div>
</div>
<!--  Widget heading END -->
<div class="widget-body" style="text-align: center;">
<div>
	<select name="piecharts" id="piecharts"  class="form-control input-sm"  style="width: 175px; display: inline-block">
	<option value="getLeadsPieData" selected>Leads Type (ALL)</option>
	<option value="getStatusPieData">Leads Status (Top 5)</option>
	<option value="getSourcePieData">Leads Source (Top 5)</option>
	<option value="getBuyingTimePieData">Buying Time (Top 5)</option>
	<option value="getGenderPieData">Gender (ALL)</option>
	<option value="getBestTimePieData">Best Time (ALL)</option>
	<option value="getStepsPieData">Sales Steps (Top 5)</option>
	<option value="getLeadStatusPieData">Logs Open / Closed (ALL)</option>
	</select>
	
	Month: <?php echo $this->Form->month('stats_month', array('class'=>"form-control input-sm", 'style'=>"width: 175px; display: inline-block", 'empty'=>false, 'value'=>$stats_month)); ?>
	<?php 
	if($dealer_info['DealerName']['dealer_group']) {
	 $dealer_names['all_builds']='All Group';
	echo $this->Form->input('dealer_group'.$label,array('class'=>'form-control pull-right','id'=>'LeadGroupStat','options'=>$dealer_names,'value'=>$group,'label'=>false,'div'=>false,'style'=>'max-width:22%!important;')); 
	//echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> Group Stats',array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'style'=>'display:none;','data-id'=>'dealership')); 
	 }?>
</div>
<!-- Simple Chart -->
<div style='margin-top: 10px'></div>

<div id="leads_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>

</div>
</div>
<!--  Simple chart END -->
<script type="text/javascript">
$script.ready('bundle', function() {
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>
	setTimeout(function(){
	showpiechart('<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>/getLeadsPieData');
						},100);
	
	$('#piecharts').on('change', function() {
			 url="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>"+"/"+this.value;
			 switch_mode();
			 showpiechart(url); // or $(this).val()
	});
	
	$("#stats_monthMonth").change(function(event){
		location.href = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'drop_reports')); ?>/"+$(this).val();
	});
	
	<?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#LeadGroupStat").on('change',function(e){
						//e.preventDefault();
						//data_id=$(this).attr('data-id');
						group=$(this).val();  
						action=$("#piecharts").val();
						
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
						url = "<?php echo $this->Html->url(array('controller'=>'reports','action'=>'index')); ?>/"+action+'/'+group;
						
						//$("#report_data_container").html('');	
						showpiechart(url);
								
													
			});
	
	<?php } ?>
	
			<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
});
function switch_mode()
{
	$("#LeadGroupStat").val('<?php echo AuthComponent::user('dealer_id'); ?>');
}
function showpiechart(url){

		var dataPath = url;
	
		$.get(dataPath, function(data) {

			var glacier = JSON.parse(data);
			var data = [];
			var i = 0;
			$.each(glacier[0], function(s, t) {
				data[i] = { label: '"'+t[0]+'"', data:t[1]};
							 i++;
	
			});
			// GRAPH 5
			$.plot($("#leads_piechart"), data, 
			{
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


					  
		});
	}

	
	



</script>


