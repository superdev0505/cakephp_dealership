<?php $user_names=array(); ?>
<h2 align="center"><?php echo $dealer_names[$user_id].'-'.$user_id; ?></h2>
	<h4 align="center">Survey Report Detail</h4>
	     <!-- Table -->
			<table border="1" cellpadding="5">
			
				
				
					<tr bgcolor="#F7F7F7">
						<th><font size="-6">Next Day Follow-up</font></th>
						<th><font size="-6">Bad Number</font></th>
                        <?php /*?><th><font size="-6">No Number</font></th><?php */?>
                        <th><font size="-6">Bad # %</font></th>
                       <?php /*?> <th><font size="-6">No # %</font></th><?php */?>
                        <th><font size="-6">Minus Bad & No #</font></th>
                        <th><font size="-6">Contacts</font></th>
                        <th><font size="-6">Call vs Contacts %</font></th>
                        <th><font size="-6">In</font></th>
                        <th><font size="-6">In/Contacts %</font></th>
                        <th><font size="-6">Sold</font></th>
                        <th><font size="-6">Sold%</font></th>	
                    </tr>
				
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
						<td><?php echo $total_count['total_ndf']; ?>&nbsp;</td>
                        <td><?php echo $total_count['bad_number']; ?>&nbsp;</td>
                       <?php /*?> <td><?php echo $total_count['no_number']; ?>&nbsp;</td><?php */?>
                        <td><?php echo $total_count['bad_per']; ?>%&nbsp;</td>
                    <?php /*?>    <td><?php echo $total_count['no_number_per']; ?>%&nbsp;</td><?php */?>
                        <td><?php echo $total_count['contact_bad'];?>&nbsp;</td>
						<td><?php echo $total_count['contacts']; ?>&nbsp;</td>
						<td><?php echo $total_count['contact_per']; ?>%&nbsp;</td>
						<td><?php echo $total_count['in']; ?>&nbsp;</td>
						<td><?php echo $total_count['contact_in']; ?>%&nbsp;</td>
						<td><?php echo count($bdc_sold_leads); ?>&nbsp;</td>
                        <td><?php echo round((count($bdc_sold_leads)/$total_count['in'])*100); ?>%&nbsp;</td>					</tr>
				</tbody>
			</table>
<br />
<br />
	<h4 align="center">Sales Person Report</h4>
			<table border="1" cellpadding="5"  >
			
				<!-- Table heading -->
				
					<tr bgcolor="#F7F7F7">
						<th><font size="-6">Sales Person</font></th>
						<th><font size="-6">Called By BDC</font></th>
                        <th><font size="-6">Bad # By Staff</font></th>
                        <th><font size="-6">No # By Staff</font></th>
                        <th><font size="-6">Bad # %</font></th>
                        <th><font size="-6">No # %</font></th>
                        <th><font size="-6">Good # By Staff</font></th>
                        <th><font size="-6">Contacts By BDC</font></th>
                        <th><font size="-6">Call/Contacts % By BDC</font></th>
					</tr>
					
				
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
                        <td><?php
						$c_ts=$row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead']);
						if($c_ts!=0)
						{
						$c_ts=round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100);
						}
						echo $c_ts; ?> %</td>
						
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   <?php echo "############################"; ?>
    <h4 align="center">Customer Statuses Count</h4>
        <table border="1" cellpadding="5">
        		
					<tr bgcolor="#F7F7F7">
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
       
			<h4 align="center">Top 5 Customer Statuses Count</h4>
	
      <?php echo "############################"; ?>
			<h4 align="center">Dealership Contacted Survey Result</h4>
		
         <table border="1" cellpadding="5">
        		
					<tr bgcolor="#F7F7F7">
						<th>Question</th>
						<th>Yes %</th>
                        <th>No %</th>
                        <th>N/A %</th>
                        
					</tr>				
				
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
       <?php echo "############################"; ?>
     <?php foreach($user_question_per as $user_id=>$survey_answers) { ?>
   
			<h4 align="center">Contacted Survey Result For <?php echo $user_names[$user_id]; ?></h4>
		
         <table border="1" cellpadding="5">
        		
					<tr bgcolor="#F7F7F7">
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