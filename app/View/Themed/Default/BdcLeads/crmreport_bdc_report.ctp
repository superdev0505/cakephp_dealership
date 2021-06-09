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
<?php $ridenow_dealers = array(200100);
$dealer_id = AuthComponent::user('dealer_id');
 ?>
<div class="innerLR">
	<!-- col-table -->
    <div class="ajax-loading hide">
		<i class="icon-spinner icon-spin icon-4x"></i>
	</div>
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
	
		<i class="fa fa-bar-chart-o"></i> Select Report
		&nbsp;<select name="report_table" class="form-control input-sm" id="select_report" style="width: 175px; display: inline-block">
				<option value="" selected="selected">Select Report</option>
                <option value="bdc_survey_report">Survey Report Detail</option>
              	 <option value="bdc_rep_report">BDC CSR Report</option>
               <?php if(!in_array($dealer_id,$ridenow_dealers)){ ?>
                <option value="sales_person_report">BDC Sales Staff Report</option>
                <option value="lead_score_report">Lead Score Report</option> 
                 <option value="bdc_email_update">BDC Email Report</option>
                
				<?php } ?>
                 <option value="customer_status_report">Customer Status Report</option>				
			</select>
			

			
			Month: <?php echo $this->Form->month('stats_month', array('class'=>"form-control input-sm", 'style'=>"width: 175px; display: inline-block", 'empty'=>false, 'value'=>$stats_month)); ?>
	
    
     <?php
	 if($dealer_info['DealerName']['dealer_group']) {
	 $dealer_names['all_builds']='All Group';
	echo $this->Form->input('dealer_group'.$label,array('class'=>'form-control pull-right','id'=>'LeadGroupStat','options'=>$dealer_names,'value'=>$group,'label'=>false,'div'=>false,'style'=>'max-width:22%!important;display:none;')); 
	//echo $this->Html->link('<i class="fa fa-bar-chart-o"></i> Group Stats',array(),array('class'=>'btn btn-inverse pull-right','id'=>'LeadGroupStat','escape'=>false,'style'=>'display:none;','data-id'=>'dealership')); 
	 }
	?>
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
				
					var url = "/<?php echo $this->params['prefix']; ?>/bdc_leads/"+$(this).val();
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
			location.href = "/<?php echo $this->params['prefix']; ?>/bdc_leads/bdc_report/"+$(this).val();
		});
		
		$('body').on('click','#print-dealership-report',function(e){
			e.preventDefault();
			$("#report_data_container").printThis();
			});
		
		
	<?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#LeadGroupStat").on('change',function(e){
						//e.preventDefault();
						group=$(this).val();
						/*<!--group='null'; 
						if(data_id=='dealership')
						{
							group='all_builds';
							$(this).html('<i class="fa fa-bar-chart-o"></i> Dealership Stats');
							$(this).attr('data-id','group');
						}else
						{
							$(this).html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
							$(this).attr('data-id','dealership');
						}-->*/
					$("#report_data_container").html('');	
					load_lead_score_report(group,20);
								
													
			});
	
	<?php } ?>
		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

function switch_mode()
{
	$("#LeadGroupStat").val('<?php echo AuthComponent::user('dealer_id'); ?>');
	//$("#LeadGroupStat").html('<i class="fa fa-bar-chart-o"></i> Group Stats');
							
	//$("#LeadGroupStat").attr('data-id','dealership');
}
function load_lead_score_report(group,limit)
{
	action=$("#select_report").val();
	if(action=='lead_score_report')
	url='/<?php echo $this->params['prefix']; ?>/bdc_leads/'+action+'/'+group+'/'+limit;
	else
	url='/<?php echo $this->params['prefix']; ?>/bdc_leads/'+action+'/'+group;
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
