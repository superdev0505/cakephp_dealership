<?php $user_names=array(); ?>
<!-- Table -->
<style>
table.alternate_color tr:nth-child(even){
background:#E1EFF8;
}
</style>
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Monthly CSR Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs alternate_color"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>CSR</th>
						<th>Calls</th>
                        <th>Bad Numbers</th>
                        <th>No Numbers</th>
                        <th>Bad # %</th>
                        <th>No # %</th>
                        <th>Contacts</th>
                        <th>Call/Contacts %</th>
                        <th>In</th>
                        <th>Contact/In%</th>
                        <th>Sold</th>
                        <th>In/Sold%</th>
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					foreach($report_results as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						<td><?php echo $row_data['no_lead']; ?></td>
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						<td><?php echo round(($row_data['no_lead']/$row_data['source_count'])*100); ?> %</td>
						<td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); ?> %</td>
                        <td><?php echo $row_data['in_leads']; ?></td>
                        <td><?php echo round(($row_data['in_leads']/$row_data['contact_lead'])*100); ?> %</td>
                      	<td><?php echo $row_data['sold_leads']; ?></td>
                          <td><?php echo round(($row_data['sold_leads']/$row_data['contact_lead'])*100); ?> %</td>
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
   <?php /*?> <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Top 5 Customer Status Count</h4>
		</div>
		<div class="widget-body innerAll">
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
    
     <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Top Customer Statuses</h4>
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
                <td><?php echo round(($ans_res[0]['yes_count']/count($survy_ids))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['no_count']/count($survy_ids))*100); ?>%</td>
                <td><?php echo round(($ans_res[0]['na_count']/count($survy_ids))*100); ?>%</td>
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
	 <?php */?>