<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Survey Report Detail</h4>
		</div>
		<div class="widget-body innerAll">
        <!-- Table -->
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Next Day Follow-up</th>
						<th>Bad Number</th>
                        <th>No Number</th>
                        <th>Bad # %</th>
                        <th>No # %</th>
                        <th>Minus Bad & No #</th>
                        <th>Contacts</th>
                        <th>Call/Contacts %</th>
                        <th>In</th>
                        <th>In/Contacts %</th>
                        <th>Sold</th>
                        <th>Sold/Contacts %</th>	
                    </tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					$in_ids=implode(',',$total_count['in_ids']);
					$bad_ids=implode(',',$total_count['bad_ids']);
					$no_ids=implode(',',$total_count['no_ids']);
					$sold_ids=implode(',',$total_count['sold_ids']);
					$contact_ids=implode(',',$total_count['contact_ids']);
					$all_ids=implode(',',$all_leads);
					$no_bad_ids=implode(',',array_diff($all_leads,$total_count['bad_ids'],$total_count['no_ids']));
					?>
					
					<tr class="text-primary">
						<td><?php echo $this->Html->link($total_count['total_ndf'],'',array('class'=>'no-ajaxify show_logs','leads'=>$all_ids)); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['bad_number'],'',array('class'=>'no-ajaxify show_logs','leads'=>$bad_ids)); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['no_number'],'',array('class'=>'no-ajaxify show_logs','leads'=>$no_ids)); ?>&nbsp;</td>
                        <td><?php echo $total_count['bad_per']; ?>%&nbsp;</td>
                        <td><?php echo $total_count['no_number_per']; ?>%&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['contact_bad'],'',array('class'=>'no-ajaxify show_logs','leads'=>$no_bad_ids));?>&nbsp;</td>
						<td><?php echo $this->Html->link($total_count['contacts'],'',array('class'=>'no-ajaxify show_logs','leads'=>$contact_ids)); ?>&nbsp;</td>
						<td><?php echo $total_count['contact_per']; ?>%&nbsp;</td>
						<td><?php echo $this->Html->link($total_count['in'],'',array('class'=>'no-ajaxify show_logs','leads'=>$in_ids)); ?>&nbsp;</td>
						<td><?php echo $total_count['contact_in']; ?>%&nbsp;</td>
						<td><?php echo $this->Html->link(count($bdc_sold_leads),'',array('class'=>'no-ajaxify show_logs','leads'=>implode(',',$bdc_sold_leads))); ?>&nbsp;</td>
                        <td><?php echo round((count($bdc_sold_leads)/$total_count['in'])*100); ?>%&nbsp;</td>
					</tr>
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
		
	<form id="leadsForm" action="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'lead_logs')); ?>">
    <input type="hidden" name="leads" id="totalLeads" value="" />
    
    </form>
	<?php 
	//debug($total_count);
	//echo $this->element('sql_dump'); 
	?>
    <style>
.midWidth {
    margin: 0 auto;
    width: 80%;
	
}
.modalBody {
    height:600px;
	overflow-y:scroll;
	
}
</style>
<script type="text/javascript">
$(document).ready(function(){
						 
	$("a.show_logs").on('click',function(e){
		 e.preventDefault();
		 leads=$(this).attr('leads');
		 $("#totalLeads").val(leads);
		 $.ajax({
			type: "POST",
			cache: false,
			url: $("#leadsForm").attr('action'),
			data:$("#leadsForm").serialize(),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Lead Logs",
				}).find("div.modal-dialog").addClass("midWidth").find("div.modal-body").addClass('modalBody');
			}
		});
															 
 });
						   
});
</script>
			
			


          </div>
	</div>
<?php $user_names=array(); ?>
<!-- Table -->
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Sales Person Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Sales Person:</th>
						<th>Called By BDC</th>
                        <th>Bad # By Staff</th>
                        <th>No # By Staff</th>
                        <th>Bad # %</th>
                        <th>No # %</th>
                        <th>Good # By Staff</th>
                        <th>Contacts By BDC</th>
                        <th>Call/Contacts % By BDC</th>
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php foreach($report_results as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA">
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['Contact']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						<td><?php echo $row_data['no_lead']; ?></td>
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						<td><?php echo round(($row_data['no_lead']/$row_data['source_count'])*100); ?> %</td>
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); ?> %</td>
						
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Customer Status Count(All)</h4>
		</div>
		<div class="widget-body innerAll">
        <div style="height:450px;overflow-y:scroll">
        <table class="dynamicTable tableTools table table-bordered checkboxs"  >
        		<thead>
					<tr>
						<th>Status</th>
						<th>Total Count</th>
                        
					</tr>				
				</thead>
                <tbody>
                <?php foreach($status_result as $s_res){ ?>
                <tr>
                <td><?php echo $s_res['BdcStatus']['name']; ?></td>
                <td><?php echo $s_res[0]['status_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
        </table>
        </div>
        
                 </div>
	</div>
    
     <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Top 5 Customer Statuses Count</h4>
		</div>
		<div class="widget-body innerAll" style="text-align:center">
        <div id="top_status_json_data" style="display:none;"><?php echo json_encode($top_status_json); ?></div>
        <div id="status_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
        </div>
     </div>
     
      <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Contacted Survey Result</h4>
		</div>
		<div class="widget-body innerAll">
         <table class="dynamicTable tableTools table table-bordered checkboxs"  >
        		<thead>
					<tr>
						<th>Question</th>
						<th>Yes %</th>
                        <th>No %</th>
                        <th>N/A %</th>
                        
					</tr>				
				</thead>
                <tbody>
                 <?php foreach($question_dealer_count['yes_no'] as $ans_res){ ?>
                <tr>
                <td><?php echo $ans_res['Question']['name']; ?></td>
                <td><?php echo round(($ans_res[0]['yes_count']/count($bdc_survey_ids))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['no_count']/count($bdc_survey_ids))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['na_count']/count($bdc_survey_ids))*100); ?>%</td>
                </tr>
                <?php } ?>
                <tr class="text-primary">
                <td colspan="3"><?php echo $question_dealer_count['avg'][0]['Question']['name']; ?></td>
                <td><?php echo round($question_dealer_count['avg'][0][0]['scale'],2); ?></td>
               
                </tr>
                </tbody>
        </table>
        </div>
     </div>
     <?php foreach($user_question_per as $user_id=>$survey_answers) { ?>
     <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Contacted Survey Result For <?php echo $user_names[$user_id]; ?></h4>
		</div>
		<div class="widget-body innerAll">
         <table class="dynamicTable tableTools table table-bordered checkboxs"  >
        		<thead>
					<tr>
						<th>Question</th>
						<th>Yes %</th>
                        <th>No %</th>
                        <th>N/A %</th>
                        
					</tr>				
				</thead>
                <tbody>
                 <?php foreach($survey_answers['yes_no'] as $ans_res){ ?>
                <tr>
                <td><?php echo $ans_res['Question']['name']; ?></td>
                <td><?php echo round(($ans_res[0]['yes_count']/count($user_wise_survey[$user_id]))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['no_count']/count($user_wise_survey[$user_id]))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['na_count']/count($user_wise_survey[$user_id]))*100); ?>%</td>
                </tr>
                <?php } ?>
                <tr class="text-primary">
                <td colspan="3"><?php echo $survey_answers['avg'][0]['Question']['name']; ?></td>
                <td><?php echo round($survey_answers['avg'][0][0]['scale'],2); ?></td>
               
                </tr>
                </tbody>
        </table>
        </div>
     </div>
     
	 <?php }?>
	 