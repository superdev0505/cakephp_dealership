<?php $user_names=array(); ?>
<!-- Table -->
<br /><br /><br /><br /><br />
<h2 align="center"><?php echo $dealer_names[$user_id].'-'.$user_id; ?></h2>
			<h4 align="center">BDC CSR Report</h4>
		
			<table border="1" cellpadding="5">
			
				<!-- Table heading -->
				
					<tr>
						<th width="80"><font size="-5">Sales Person</font></th>
						<th width="50"><font size="-5">Total Call Attempts</font></th>
                        <th width="50"><font size="-5">Bad Numbers</font></th>
                    
                        <th width="50"><font size="-5">Bad # %</font></th>
                       
                        <th width="50"><font size="-5">Good Numbers</font></th>
                        <th width="50"><font size="-5">Contacts</font></th>
                        <th width="55"><font size="-5">Contacts %</font></th>
                        <th width="60"><font size="-5">Avg Time Spent on Contacts</font></th>
                        <th width="50"><font size="-5">Daily Avg Call attempts</font></th>
                        <th width="50"><font size="-5">Avg Per lead Call attempts</font></th>
					</tr>
					
				
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
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                        <td><?php if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{echo round($row_data['avg_time']/$row_data['contact_lead'],2);} ?> mins</td>
						<td><?php echo round($row_data['source_count']/$total_days); ?></td>
                        <td><?php echo round($row_data['source_count']/$row_data['unique_leads']); ?></td>
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   <?php echo "############################"; ?>
			<h4 align="center">Customer Status Count</h4>
		
        <table border="1" cellpadding="5">
        		
					<tr>
						<th>Status</th>
						<th>Total Count</th>
                        
					</tr>				
				
                <tbody>
                <?php foreach($status_result as $s_res){ ?>
                <tr>
                <td><?php echo $s_res['BdcStatus']['name']; ?></td>
                <td><?php echo $s_res[0]['status_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
        </table>
    <?php echo "############################"; ?>
    <br /><br /><br />
			<h4 align="center">Top 5 Customer Statuses</h4>
	
     
      <?php echo "############################"; ?>
			<h4 class="heading">Dealership Contacted Survey Result</h4>
		
         <table border="1" cellpadding="5">
        		
					<tr>
						<th>Question</th>
						<th>Yes %</th>
                        <th>No %</th>
                        <th>N/A %</th>
                        
					</tr>				
				
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
      <?php echo "############################"; ?>
     <?php foreach($user_question_per as $user_id=>$survey_answers) { ?>
    
			<h4 align="center">Contacted Survey Result For <?php echo $user_names[$user_id]; ?></h4>
		
         <table border="1" cellpadding="5">
        		
					<tr>
						<th>Question</th>
						<th>Yes %</th>
                        <th>No %</th>
                        <th>N/A %</th>
                        
					</tr>				
				
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
       <?php echo "############################"; ?>
<?php }?>